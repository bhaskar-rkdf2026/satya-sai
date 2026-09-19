<?php
require_once __DIR__ . '/../config.php';
require_admin_auth();

$allData = get_json_data('page_documents.json', []);
$msg = '';
$error = '';

$tab = clean_input($_GET['tab'] ?? 'ExamNotifications');
$validTabs = [
    'ExamNotifications' => 'Exam Notifications',
    'EntranceExamAlert' => 'Entrance Exam Alerts',
    'ExamSchedule' => 'Exam Schedule & Timetables',
    'Results' => 'Examination Results',
    'Interface' => 'Interface & Portals'
];

if (!array_key_exists($tab, $validTabs)) {
    $tab = 'ExamNotifications';
}

// Handle Save SEO & Meta Settings
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'save_page_seo') {
    $pageKey = clean_input($_POST['page_key'] ?? $tab);
    $seoData = [
        'page_title'       => clean_input($_POST['page_title'] ?? ''),
        'meta_title'       => clean_input($_POST['meta_title'] ?? ''),
        'meta_description' => clean_input($_POST['meta_description'] ?? ''),
        'meta_keywords'    => clean_input($_POST['meta_keywords'] ?? ''),
        'canonical_url'    => clean_input($_POST['canonical_url'] ?? ''),
        'og_image'         => clean_input($_POST['og_image'] ?? 'assets/images/logo/logo.jpg')
    ];

    if (function_exists('save_examination_page_info')) {
        save_examination_page_info($pageKey, $seoData);
        $msg = 'SEO & Meta Details for ' . htmlspecialchars($validTabs[$pageKey] ?? $pageKey) . ' saved successfully! Public search tags and preview updated.';
        $allData = get_json_data('page_documents.json', []);
    }
}

// Handle Add / Edit Document
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'save_doc') {
    $pageKey = clean_input($_POST['page_key'] ?? $tab);
    $section = 'Examination';
    $pageTitle = $validTabs[$pageKey] ?? $pageKey;
    $docId = !empty($_POST['doc_id']) ? $_POST['doc_id'] : (time() . rand(100, 999));
    $title = clean_input($_POST['title'] ?? '');
    $category = clean_input($_POST['category'] ?? 'General');
    $status = clean_input($_POST['status'] ?? 'Active');
    $date = clean_input($_POST['date'] ?? date('Y-m-d'));
    $fileUrl = trim($_POST['file_url'] ?? '');

    // Handle File Upload if provided
    if (isset($_FILES['doc_file']) && $_FILES['doc_file']['error'] === UPLOAD_ERR_OK) {
        $allowed = ['pdf', 'doc', 'docx', 'xls', 'xlsx', 'zip', 'jpg', 'png'];
        $origName = $_FILES['doc_file']['name'];
        $ext = strtolower(pathinfo($origName, PATHINFO_EXTENSION));

        if (in_array($ext, $allowed)) {
            $newFileName = preg_replace('/[^a-zA-Z0-9_-]/', '_', pathinfo($origName, PATHINFO_FILENAME)) . '_' . time() . '.' . $ext;
            $destPath = UPLOAD_DIR . '/documents/' . $newFileName;
            if (!is_dir(dirname($destPath))) {
                mkdir(dirname($destPath), 0777, true);
            }
            if (move_uploaded_file($_FILES['doc_file']['tmp_name'], $destPath)) {
                $fileUrl = 'assets/uploads/documents/' . $newFileName;
            } else {
                $error = 'Failed to upload document file. Please check folder permissions.';
            }
        } else {
            $error = 'Invalid file type. Allowed: PDF, Word (DOC/DOCX), Excel, ZIP, JPG, PNG.';
        }
    }

    if (empty($error)) {
        if (!empty($pageKey) && !empty($title) && !empty($fileUrl)) {
            $docData = [
                'id' => $docId,
                'title' => $title,
                'category' => $category,
                'file' => $fileUrl,
                'date' => $date,
                'status' => $status
            ];
            
            save_page_document($pageKey, $docData, $section, $pageTitle);

            // Also keep notices.json synchronized if this is an Exam Notification or Entrance Alert
            if ($pageKey === 'ExamNotifications' || $pageKey === 'EntranceExamAlert') {
                $notices = get_json_data('notices.json', []);
                $found = false;
                foreach ($notices as &$n) {
                    if (trim(strtolower($n['title'])) === trim(strtolower($title))) {
                        $n['date'] = $date;
                        $n['file'] = basename($fileUrl);
                        $n['link'] = $fileUrl;
                        $n['is_new'] = ($status === 'New');
                        $found = true;
                        break;
                    }
                }
                if (!$found) {
                    $notices[] = [
                        'id' => time(),
                        'title' => $title,
                        'category' => ($pageKey === 'EntranceExamAlert') ? 'admission' : 'notices',
                        'date' => $date,
                        'file' => basename($fileUrl),
                        'link' => $fileUrl,
                        'is_new' => true
                    ];
                }
                save_json_data('notices.json', $notices);
            }

            $msg = 'Examination document saved successfully! It is now live on the Home Page and public Examination portal.';
            $allData = get_json_data('page_documents.json', []);
        } else {
            $error = 'Document title and a valid file or link URL are required.';
        }
    }
}

// Handle Delete Document
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $delId = $_GET['id'];
    if (delete_page_document($tab, $delId)) {
        $msg = 'Document removed successfully.';
        $allData = get_json_data('page_documents.json', []);
    } else {
        $error = 'Document could not be removed.';
    }
}

// Current tab's documents & SEO info
$currentDocs = $allData[$tab]['documents'] ?? [];
$activeTabSeo = function_exists('get_examination_page_info') ? get_examination_page_info($tab) : [];

// Counts for each tab
$counts = [];
foreach ($validTabs as $k => $v) {
    $counts[$k] = count($allData[$k]['documents'] ?? []);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Examination Management - SSSUTMS Admin</title>
  <link rel="icon" type="image/jpeg" href="../assets/images/logo/logo.jpg">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/admin.css">
  <style>
    .exam-nav-pill {
      border: 1px solid #e2e8f0;
      border-radius: 12px;
      padding: 12px 18px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 12px;
      background: #ffffff;
      color: #334155;
      text-decoration: none;
      font-weight: 600;
      transition: all 0.2s ease;
    }
    .exam-nav-pill:hover {
      background: #f8fafc;
      border-color: #cbd5e1;
      transform: translateY(-2px);
      color: #0b2545;
    }
    .exam-nav-pill.active {
      background: linear-gradient(135deg, #0b2545 0%, #1e4d8c 100%);
      color: #ffffff;
      border-color: #0b2545;
      box-shadow: 0 4px 12px rgba(11,37,69,0.2);
    }
    .exam-nav-pill.active .badge {
      background: #f59e0b !important;
      color: #000000 !important;
    }
    .nav-pills-custom .nav-link {
      color: #475569;
      font-weight: 600;
      padding: 10px 20px;
      border-radius: 10px;
      border: 1px solid #e2e8f0;
      background: #ffffff;
      transition: all 0.2s;
    }
    .nav-pills-custom .nav-link:hover {
      background: #f1f5f9;
      color: #0f172a;
    }
    .nav-pills-custom .nav-link.active {
      background: #0b2545;
      color: #ffffff;
      border-color: #0b2545;
      box-shadow: 0 4px 10px rgba(11,37,69,0.15);
    }
  </style>
</head>
<body>

<!-- Admin Sidebar -->
<aside class="admin-sidebar">
  <div class="sidebar-brand">
    <div class="d-flex align-items-center gap-2">
      <img src="../assets/images/logo/logo.jpg" alt="Logo" width="38" height="38" class="rounded-circle border">
      <div>
        <h6 class="text-white fw-bold mb-0">SSSUTMS Admin</h6>
        <small class="text-warning">Management Portal</small>
      </div>
    </div>
    <button class="sidebar-close-btn d-lg-none" type="button" aria-label="Close Navigation">
      <i class="fa fa-xmark"></i>
    </button>
  </div>

  <ul class="admin-nav">
    <li><a href="index.php" class="nav-link"><i class="fa fa-gauge"></i> Dashboard</a></li>
    <li><a href="home.php" class="nav-link"><i class="fa fa-house-chimney-window"></i> Home Page Editor</a></li>
    <li><a href="admission.php" class="nav-link"><i class="fa fa-user-graduate"></i> Admission Cell (7)</a></li>
    <li><a href="academic.php" class="nav-link"><i class="fa fa-graduation-cap"></i> Academic Cell (46)</a></li>
    <li><a href="examination.php" class="nav-link active"><i class="fa fa-file-signature"></i> Examination Cell (5)</a></li>
    <li><a href="research.php" class="nav-link"><i class="fa fa-flask"></i> Research Cell (12)</a></li>
    <li><a href="about.php" class="nav-link"><i class="fa fa-circle-info"></i> About Pages (42)</a></li>
    <li><a href="faculties.php" class="nav-link"><i class="fa fa-chalkboard-user"></i> Faculties & Depts (14)</a></li>
    <li><a href="committee.php" class="nav-link"><i class="fa fa-users-gear"></i> Statutory Committees (9)</a></li>
    <li><a href="documents.php" class="nav-link"><i class="fa fa-stamp"></i> Approvals & NAAC Docs</a></li>
    <li><a href="events.php" class="nav-link"><i class="fa fa-calendar-days"></i> Events & Workshops</a></li>
    <li><a href="career.php" class="nav-link"><i class="fa fa-briefcase"></i> Career &amp; Recruitment</a></li>
    <li><a href="contact.php" class="nav-link"><i class="fa fa-phone-volume"></i> Contact &amp; Helpdesk</a></li>
    <li><a href="itep.php" class="nav-link"><i class="fa fa-graduation-cap"></i> ITEP Cell</a></li>
    <li><a href="gallery.php" class="nav-link"><i class="fa fa-camera-retro"></i> Photo &amp; Video Gallery</a></li>
    <li><a href="downloads.php" class="nav-link"><i class="fa fa-folder-arrow-down"></i> Curriculum &amp; Downloads (52)</a></li>
    <li><a href="applications.php" class="nav-link"><i class="fa fa-user-graduate"></i> Student Registrations</a></li>
    <li><a href="inquiries.php" class="nav-link"><i class="fa fa-envelope-open-text"></i> Admission Leads</a></li>
    <li><a href="settings.php" class="nav-link"><i class="fa fa-sliders"></i> Portal Settings</a></li>
    <li class="mt-4 pt-3 border-top border-white border-opacity-10">
      <a href="../index.php" target="_blank" class="nav-link text-white-50"><i class="fa fa-arrow-up-right-from-square"></i> Visit Public Site</a>
    </li>
    <li><a href="logout.php" class="nav-link text-danger"><i class="fa fa-right-from-bracket"></i> Sign Out</a></li>
  </ul>
</aside>

<!-- Main Admin Content Area -->
<main class="admin-main">
  
  <header class="admin-topbar">
    <div class="d-flex align-items-center gap-3">
      <button class="admin-sidebar-toggle d-lg-none" type="button" aria-label="Toggle Navigation">
        <i class="fa fa-bars"></i>
      </button>
      <div>
        <h5 class="fw-bold text-dark mb-0">Examination Management Portal</h5>
        <small class="text-muted d-none d-md-inline">One-stop control: updates here immediately reflect on the <strong>Home Page Notice Board</strong> &amp; <strong>Examination Sub-pages</strong></small>
      </div>
    </div>
    <div class="d-flex gap-2">
      <a href="../Examination/<?php echo $tab; ?>.php" target="_blank" class="btn btn-outline-secondary rounded-pill px-3">
        <i class="fa fa-arrow-up-right-from-square me-1"></i> View Live Page
      </a>
      <button class="btn btn-primary fw-bold rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#examDocModal" onclick="resetExamDocForm()">
        <i class="fa fa-plus me-1"></i> Add / Upload to <?php echo htmlspecialchars($validTabs[$tab]); ?>
      </button>
    </div>
  </header>

  <div class="admin-content p-4">

    <?php if (!empty($msg)): ?>
      <div class="alert alert-success alert-dismissible fade show rounded-3 border-0 shadow-sm" role="alert">
        <i class="fa fa-circle-check me-2"></i> <?php echo htmlspecialchars($msg); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    <?php endif; ?>

    <?php if (!empty($error)): ?>
      <div class="alert alert-danger alert-dismissible fade show rounded-3 border-0 shadow-sm" role="alert">
        <i class="fa fa-triangle-exclamation me-2"></i> <?php echo htmlspecialchars($error); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    <?php endif; ?>

    <!-- Alert Banner: Live Home Page Sync -->
    <div class="alert alert-primary bg-primary-subtle border-0 rounded-4 d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4 p-3 px-4">
      <div class="d-flex align-items-center gap-3">
        <span class="badge bg-primary fs-6 p-2 rounded-circle"><i class="fa fa-bolt text-warning"></i></span>
        <div>
          <h6 class="fw-bold text-primary mb-0">Automatic Home Page Notice Board Synchronization Active</h6>
          <small class="text-muted">Notifications and circulars published under <strong>Exam Notifications</strong> automatically appear directly on the <strong>Home Page Notice Board</strong> with NEW badges and direct PDF buttons. You don't need to add them anywhere else!</small>
        </div>
      </div>
      <span class="badge bg-success fw-bold px-3 py-2 rounded-pill">100% Unified</span>
    </div>

    <!-- Examination Sub-Pages Navigation Cards -->
    <div class="row g-3 mb-4">
      <?php foreach ($validTabs as $k => $label): 
        $isActive = ($tab === $k);
        $icon = 'fa-file-lines';
        if ($k === 'ExamNotifications') $icon = 'fa-bell';
        elseif ($k === 'EntranceExamAlert') $icon = 'fa-graduation-cap';
        elseif ($k === 'ExamSchedule') $icon = 'fa-clock';
        elseif ($k === 'Results') $icon = 'fa-square-poll-vertical';
        elseif ($k === 'Interface') $icon = 'fa-network-wired';
      ?>
        <div class="col-md-4 col-lg">
          <a href="examination.php?tab=<?php echo $k; ?>" class="exam-nav-pill <?php echo $isActive ? 'active' : ''; ?>">
            <div class="d-flex align-items-center gap-2 text-truncate">
              <i class="fa <?php echo $icon; ?> <?php echo $isActive ? 'text-warning' : 'text-primary'; ?>"></i>
              <span class="text-truncate"><?php echo htmlspecialchars($label); ?></span>
            </div>
            <span class="badge <?php echo $isActive ? 'bg-warning text-dark' : 'bg-light text-muted border'; ?> rounded-pill">
              <?php echo $counts[$k]; ?>
            </span>
          </a>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- Main Card with Sub-Pills: Documents vs SEO -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white mb-4">
      <div class="card-header bg-white py-3 px-4 d-flex flex-wrap align-items-center justify-content-between gap-3 border-bottom">
        <div>
          <h5 class="fw-bold text-dark mb-0">
            <i class="fa-solid fa-graduation-cap text-primary me-2"></i> <?php echo htmlspecialchars($validTabs[$tab]); ?> Control Center
          </h5>
          <small class="text-muted">Public URL: <code>Examination/<?php echo $tab; ?>.php</code></small>
        </div>
        <div class="d-flex align-items-center gap-2">
          <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill fw-semibold">
            <?php echo count($currentDocs); ?> Documents Active
          </span>
        </div>
      </div>

      <div class="card-body p-4">
        <!-- Sub-Pill Navigation -->
        <ul class="nav nav-pills nav-pills-custom gap-2 mb-4" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pill-exam-docs-tab" data-bs-toggle="pill" data-bs-target="#pill-exam-docs" type="button" role="tab">
              <i class="fa-solid fa-file-lines me-2"></i> Documents &amp; Notices (<?php echo count($currentDocs); ?>)
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="pill-exam-seo-tab" data-bs-toggle="pill" data-bs-target="#pill-exam-seo" type="button" role="tab">
              <i class="fa-solid fa-magnifying-glass me-2 text-info"></i> SEO &amp; Meta Details <span class="badge bg-info-subtle text-info ms-1">SEO</span>
            </button>
          </li>
        </ul>

        <div class="tab-content">
          <!-- SUB-TAB 1: Document & Notice Records -->
          <div class="tab-pane fade show active" id="pill-exam-docs" role="tabpanel">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-3">
              <div>
                <h6 class="fw-bold text-dark mb-0">Published Circulars &amp; Documents</h6>
                <small class="text-muted">Directly manage files, dates, and badges for this examination tab</small>
              </div>
              <div>
                <input type="text" id="examSearchInput" class="form-control form-control-sm" placeholder="Search by title, category, date..." style="min-width: 260px;">
              </div>
            </div>

            <!-- Data Table -->
            <div class="table-responsive">
              <table class="table table-hover align-middle">
                <thead class="table-light">
                  <tr>
                    <th style="width: 50px;">#</th>
                    <th>Title &amp; Attachment</th>
                    <th>Category</th>
                    <th>Publish Date</th>
                    <th>Status</th>
                    <th class="text-end">Actions</th>
                  </tr>
                </thead>
                <tbody id="examTableBody">
                  <?php if (empty($currentDocs)): ?>
                    <tr><td colspan="6" class="text-center py-5 text-muted">No documents found in this section. Click "+ Add / Upload" above.</td></tr>
                  <?php else: ?>
                    <?php foreach ($currentDocs as $idx => $doc): 
                      $file = $doc['file'] ?? '';
                      $fileUrl = $file;
                      if (strpos($file, 'http') !== 0 && strpos($file, 'ftp') !== 0 && $file !== '#') {
                        $fileUrl = BASE_URL . ltrim($file, '/');
                      }
                    ?>
                      <tr class="exam-row" data-title="<?php echo strtolower(htmlspecialchars($doc['title'] ?? '')); ?>" data-cat="<?php echo strtolower(htmlspecialchars($doc['category'] ?? '')); ?>">
                        <td><small class="text-muted fw-bold"><?php echo $idx + 1; ?></small></td>
                        <td>
                          <div class="fw-bold text-dark mb-1"><?php echo htmlspecialchars($doc['title'] ?? ''); ?></div>
                          <?php if (!empty($file) && $file !== '#'): ?>
                            <a href="<?php echo htmlspecialchars($fileUrl); ?>" target="_blank" class="small text-primary text-decoration-none d-inline-flex align-items-center gap-1">
                              <i class="fa fa-file-pdf text-danger"></i> 
                              <span style="max-width: 320px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; display: inline-block;">
                                <?php echo htmlspecialchars(basename($file)); ?>
                              </span>
                              <i class="fa fa-arrow-up-right-from-square small text-muted ms-1"></i>
                            </a>
                          <?php else: ?>
                            <span class="small text-muted">No attachment</span>
                          <?php endif; ?>
                        </td>
                        <td>
                          <span class="badge bg-light text-dark border fw-semibold"><?php echo htmlspecialchars($doc['category'] ?? 'General'); ?></span>
                        </td>
                        <td><small class="text-muted"><?php echo htmlspecialchars($doc['date'] ?? date('Y-m-d')); ?></small></td>
                        <td>
                          <?php if (isset($doc['status']) && strtolower($doc['status']) === 'new'): ?>
                            <span class="badge bg-danger text-white fw-bold">NEW</span>
                          <?php else: ?>
                            <span class="badge bg-success-subtle text-success fw-semibold">Active</span>
                          <?php endif; ?>
                        </td>
                        <td class="text-end">
                          <?php if (!empty($file) && $file !== '#'): ?>
                            <a href="<?php echo htmlspecialchars($fileUrl); ?>" target="_blank" class="btn btn-sm btn-outline-secondary rounded-pill px-3 me-1" title="View / Open File">
                              <i class="fa fa-eye"></i>
                            </a>
                          <?php endif; ?>
                          <button class="btn btn-sm btn-outline-primary rounded-pill px-3 me-1" onclick='editExamDoc(<?php echo json_encode($doc); ?>)'>
                            <i class="fa fa-pen-to-square"></i> Edit
                          </button>
                          <a href="examination.php?tab=<?php echo $tab; ?>&action=delete&id=<?php echo urlencode($doc['id']); ?>" 
                             class="btn btn-sm btn-outline-danger rounded-pill px-2"
                             onclick="return confirm('Remove this examination document?');">
                            <i class="fa fa-trash-can"></i>
                          </a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div>

          <!-- SUB-TAB 2: SEO & Meta Details -->
          <div class="tab-pane fade" id="pill-exam-seo" role="tabpanel">
            <form method="POST" action="examination.php?tab=<?php echo $tab; ?>">
              <input type="hidden" name="action" value="save_page_seo">
              <input type="hidden" name="page_key" value="<?php echo $tab; ?>">

              <!-- Google SERP Snippet Preview Box -->
              <div class="card mb-4 border-0 shadow-sm" style="background: #f8fafc; border: 1.5px solid #e2e8f0; border-radius: 14px;">
                <div class="card-body p-4">
                  <div class="d-flex align-items-center justify-content-between mb-3">
                    <h6 class="fw-bold text-dark mb-0">
                      <i class="fa-brands fa-google text-danger me-2"></i>Google Search Result (SERP Live Preview)
                    </h6>
                    <span class="badge bg-light text-secondary border px-3 py-1">Desktop &amp; Mobile SERP</span>
                  </div>
                  <div class="p-3 bg-white rounded border" style="max-width: 650px; font-family: arial, sans-serif;">
                    <div class="d-flex align-items-center gap-2 mb-1" style="font-size: 13px; color: #202124;">
                      <img src="../assets/images/logo/logo.jpg" alt="Google Favicon" width="18" height="18" class="rounded-circle border">
                      <div>
                        <span class="fw-semibold">Sri Satya Sai University</span>
                        <span class="text-muted ms-1" style="font-size: 12px;">https://sssutms.co.in › Examination › <?php echo htmlspecialchars($tab); ?></span>
                      </div>
                    </div>
                    <h5 id="seoPreviewTitleExam" class="fw-normal mb-1 text-primary" style="color: #1a0dab !important; font-size: 20px; line-height: 1.3; cursor: pointer;">
                      <?php echo htmlspecialchars($activeTabSeo['meta_title']); ?>
                    </h5>
                    <p id="seoPreviewDescExam" class="mb-0 text-muted" style="color: #4d5156 !important; font-size: 14px; line-height: 1.58;">
                      <?php echo htmlspecialchars($activeTabSeo['meta_description']); ?>
                    </p>
                  </div>
                </div>
              </div>

              <!-- SEO Meta Form Fields -->
              <div class="row g-3">
                <div class="col-md-6">
                  <label class="form-label small fw-bold">
                    <i class="fa-solid fa-heading text-secondary me-1"></i> Public Page &amp; Banner Title
                  </label>
                  <input type="text" name="page_title" class="form-control" value="<?php echo htmlspecialchars($activeTabSeo['page_title'] ?? $validTabs[$tab]); ?>" placeholder="e.g. <?php echo htmlspecialchars($validTabs[$tab]); ?>">
                </div>

                <div class="col-md-6">
                  <div class="d-flex justify-content-between align-items-center mb-1">
                    <label class="form-label small fw-bold mb-0">
                      <i class="fa-solid fa-title text-primary me-1"></i> SEO Meta Title (Title Tag)
                    </label>
                    <small class="text-muted"><span id="metaTitleCountExam">0</span> / 60 chars <span class="badge bg-secondary ms-1">Rec: 50-60</span></small>
                  </div>
                  <input type="text" name="meta_title" id="seoInputTitleExam" class="form-control" value="<?php echo htmlspecialchars($activeTabSeo['meta_title'] ?? ''); ?>" placeholder="e.g. <?php echo htmlspecialchars($validTabs[$tab]); ?> | SSSUTMS" oninput="updateSeoPreviewExam()">
                </div>

                <div class="col-12">
                  <div class="d-flex justify-content-between align-items-center mb-1">
                    <label class="form-label small fw-bold mb-0">
                      <i class="fa-solid fa-align-left text-success me-1"></i> SEO Meta Description
                    </label>
                    <small class="text-muted"><span id="metaDescCountExam">0</span> / 160 chars <span class="badge bg-secondary ms-1">Rec: 150-160</span></small>
                  </div>
                  <textarea name="meta_description" id="seoInputDescExam" class="form-control" rows="3" placeholder="Provide a compelling 150-160 character description of this Examination page..." oninput="updateSeoPreviewExam()"><?php echo htmlspecialchars($activeTabSeo['meta_description'] ?? ''); ?></textarea>
                </div>

                <div class="col-md-6">
                  <label class="form-label small fw-bold">
                    <i class="fa-solid fa-tags text-warning me-1"></i> Target SEO Keywords (Comma Separated)
                  </label>
                  <input type="text" name="meta_keywords" class="form-control" value="<?php echo htmlspecialchars($activeTabSeo['meta_keywords'] ?? ''); ?>" placeholder="e.g. SSSUTMS Exam Notifications, Examination Circulars Bhopal, SSSUTMS Exam Alerts">
                </div>

                <div class="col-md-6">
                  <label class="form-label small fw-bold">
                    <i class="fa-solid fa-link text-info me-1"></i> Canonical URL Override (Optional)
                  </label>
                  <input type="text" name="canonical_url" class="form-control" value="<?php echo htmlspecialchars($activeTabSeo['canonical_url'] ?? ''); ?>" placeholder="Leave blank for automatic canonical URL">
                </div>

                <div class="col-12">
                  <label class="form-label small fw-bold">
                    <i class="fa-solid fa-image text-danger me-1"></i> Social Sharing Preview Image (og:image)
                  </label>
                  <div class="input-group">
                    <span class="input-group-text bg-light"><i class="fa fa-share-nodes"></i></span>
                    <input type="text" name="og_image" class="form-control" value="<?php echo htmlspecialchars($activeTabSeo['og_image'] ?? 'assets/images/logo/logo.jpg'); ?>" placeholder="e.g. assets/images/logo/logo.jpg">
                  </div>
                </div>
              </div>

              <div class="mt-4 pt-3 border-top d-flex align-items-center gap-2">
                <button type="submit" class="btn btn-primary fw-bold px-4 py-2 rounded-pill shadow-sm">
                  <i class="fa fa-save me-1"></i> Save SEO Settings
                </button>
                <a href="../Examination/<?php echo $tab; ?>.php" target="_blank" class="btn btn-outline-secondary rounded-pill px-3">
                  <i class="fa fa-arrow-up-right-from-square me-1"></i> View Live Page
                </a>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>

  </div>

</main>

<!-- Modal: Add / Edit Examination Document -->
<div class="modal fade" id="examDocModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content border-0 shadow-lg rounded-4">
      <div class="modal-header border-0 pb-0">
        <h5 class="modal-title fw-bold text-dark" id="modalTitle">Upload / Add to <?php echo htmlspecialchars($validTabs[$tab]); ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form method="POST" action="examination.php?tab=<?php echo $tab; ?>" enctype="multipart/form-data">
        <div class="modal-body p-4">
          <input type="hidden" name="action" value="save_doc">
          <input type="hidden" name="doc_id" id="formDocId" value="">
          <input type="hidden" name="page_key" id="formPageKey" value="<?php echo $tab; ?>">

          <div class="mb-3">
            <label class="form-label small fw-bold">Target Examination Section *</label>
            <select class="form-select" onchange="document.getElementById('formPageKey').value = this.value; document.getElementById('modalTitle').textContent = 'Upload / Add to ' + this.options[this.selectedIndex].text;">
              <?php foreach ($validTabs as $k => $lbl): ?>
                <option value="<?php echo $k; ?>" <?php echo ($k === $tab) ? 'selected' : ''; ?>><?php echo htmlspecialchars($lbl); ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="mb-3">
            <label class="form-label small fw-bold">Title / Circular Heading *</label>
            <input type="text" name="title" id="formTitle" class="form-control" placeholder="e.g. Examination Notification BAMS II Professional (2023–24 Batch)" required>
          </div>

          <div class="row g-3 mb-3">
            <div class="col-md-6">
              <label class="form-label small fw-bold">Category / Course Tag</label>
              <input type="text" name="category" id="formCategory" class="form-control" placeholder="e.g. Medical & Ayush, Engineering, Research">
            </div>
            <div class="col-md-6">
              <label class="form-label small fw-bold">Publish Date</label>
              <input type="date" name="date" id="formDate" class="form-control" value="<?php echo date('Y-m-d'); ?>">
            </div>
          </div>

          <div class="card bg-light border p-3 rounded-3 mb-3">
            <label class="form-label small fw-bold mb-2"><i class="fa fa-file-pdf text-danger me-1"></i> Document Attachment / Portal URL *</label>
            <div class="mb-2">
              <label class="small text-muted mb-1">Option A: Upload New PDF File</label>
              <input type="file" name="doc_file" class="form-control" accept=".pdf,.doc,.docx,.xls,.xlsx,.zip,.jpg,.png">
            </div>
            <div>
              <label class="small text-muted mb-1">Option B: Existing File Path or Link URL</label>
              <input type="text" name="file_url" id="formFileUrl" class="form-control" placeholder="e.g. assets/uploads/documents/notification.pdf or https://...">
            </div>
          </div>

          <div class="mb-2">
            <label class="form-label small fw-bold">Publication Status</label>
            <select name="status" id="formStatus" class="form-select">
              <option value="Active">Active</option>
              <option value="New">New (Highlight with Red NEW Badge)</option>
              <option value="Archived">Archived</option>
            </select>
          </div>

        </div>
        <div class="modal-footer border-0 pt-0">
          <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary rounded-pill px-4 fw-bold shadow-sm">Save &amp; Publish</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/admin.js"></script>
<script>
function resetExamDocForm() {
  document.getElementById('modalTitle').textContent = 'Upload / Add to <?php echo addslashes($validTabs[$tab]); ?>';
  document.getElementById('formDocId').value = '';
  document.getElementById('formTitle').value = '';
  document.getElementById('formCategory').value = 'General';
  document.getElementById('formFileUrl').value = '';
  document.getElementById('formStatus').value = 'Active';
  document.getElementById('formDate').value = '<?php echo date('Y-m-d'); ?>';
  document.getElementById('formPageKey').value = '<?php echo $tab; ?>';
}

function editExamDoc(doc) {
  document.getElementById('modalTitle').textContent = 'Edit: ' + (doc.title || '');
  document.getElementById('formDocId').value = doc.id || '';
  document.getElementById('formTitle').value = doc.title || '';
  document.getElementById('formCategory').value = doc.category || 'General';
  document.getElementById('formFileUrl').value = doc.file || '';
  document.getElementById('formStatus').value = doc.status || 'Active';
  document.getElementById('formDate').value = doc.date || '<?php echo date('Y-m-d'); ?>';
  document.getElementById('formPageKey').value = '<?php echo $tab; ?>';

  const modal = new bootstrap.Modal(document.getElementById('examDocModal'));
  modal.show();
}

// Real-time SEO SERP Live Preview & Character Counters
function updateSeoPreviewExam() {
  const titleInput = document.getElementById('seoInputTitleExam');
  const descInput = document.getElementById('seoInputDescExam');
  const titlePreview = document.getElementById('seoPreviewTitleExam');
  const descPreview = document.getElementById('seoPreviewDescExam');
  const titleCount = document.getElementById('metaTitleCountExam');
  const descCount = document.getElementById('metaDescCountExam');

  if (titleInput && titlePreview && titleCount) {
    const val = titleInput.value || '<?php echo addslashes($activeTabSeo['meta_title']); ?>';
    titlePreview.textContent = val;
    titleCount.textContent = val.length;
    if (val.length >= 50 && val.length <= 60) {
      titleCount.className = 'text-success fw-bold';
    } else if (val.length > 60) {
      titleCount.className = 'text-danger fw-bold';
    } else {
      titleCount.className = 'text-muted';
    }
  }

  if (descInput && descPreview && descCount) {
    const val = descInput.value || '<?php echo addslashes($activeTabSeo['meta_description']); ?>';
    descPreview.textContent = val;
    descCount.textContent = val.length;
    if (val.length >= 150 && val.length <= 160) {
      descCount.className = 'text-success fw-bold';
    } else if (val.length > 160) {
      descCount.className = 'text-danger fw-bold';
    } else {
      descCount.className = 'text-muted';
    }
  }
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
  updateSeoPreviewExam();

  // Instant Table Search
  const search = document.getElementById('examSearchInput');
  const rows = document.querySelectorAll('.exam-row');

  if (search) {
    search.addEventListener('input', function() {
      const q = (search.value || '').toLowerCase().trim();
      rows.forEach(r => {
        const title = r.getAttribute('data-title') || '';
        const cat = r.getAttribute('data-cat') || '';
        if (!q || title.includes(q) || cat.includes(q)) {
          r.style.display = '';
        } else {
          r.style.display = 'none';
        }
      });
    });
  }
});
</script>

</body>
</html>
