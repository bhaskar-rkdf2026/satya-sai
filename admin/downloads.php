<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/download_helper.php';
require_admin_auth();

$catalog = get_download_catalog();
$msg = '';
$error = '';

// Handle Save Page Info (Headings, Badges, Vision, Mission)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'save_page_info') {
    $pageKey = clean_input($_POST['page_key'] ?? '');
    if (!empty($pageKey)) {
        $infoData = [
            'heading'        => clean_input($_POST['heading'] ?? ''),
            'subheading'     => clean_input($_POST['subheading'] ?? ''),
            'badge_obe'      => clean_input($_POST['badge_obe'] ?? ''),
            'badge_approval' => clean_input($_POST['badge_approval'] ?? ''),
            'vision_title'   => clean_input($_POST['vision_title'] ?? 'VISION'),
            'vision_text'    => trim($_POST['vision_text'] ?? ''),
            'mission_title'  => clean_input($_POST['mission_title'] ?? 'MISSION'),
            'mission_text'   => trim($_POST['mission_text'] ?? ''),
        ];
        save_obe_page_info($pageKey, $infoData);
        $msg = "Page details and Vision/Mission statements updated successfully!";
    }
}

// Handle Add / Edit Document
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'save_doc') {
    $pageKey = clean_input($_POST['page_key'] ?? '');
    $docId = !empty($_POST['doc_id']) ? clean_input($_POST['doc_id']) : ('obc_' . substr(md5(uniqid(rand(), true)), 0, 10));
    $title = clean_input($_POST['title'] ?? '');
    $category = clean_input($_POST['category'] ?? 'General');
    $badge = clean_input($_POST['badge'] ?? '');
    $status = clean_input($_POST['status'] ?? 'Active');
    $fileUrl = trim($_POST['file_url'] ?? '');

    // Auto calculate badge if not given
    if (empty($badge)) {
        if (stripos($category, 'bachelor') !== false || stripos($category, 'b.e') !== false) $badge = 'B.E.';
        elseif (stripos($category, 'master') !== false || stripos($category, 'm.tech') !== false) $badge = 'M.Tech.';
        elseif (stripos($category, 'diploma') !== false) $badge = 'Diploma';
        else $badge = 'Course';
    }

    $filter = '';
    if (stripos($category, 'bachelor') !== false || stripos($category, 'b.e') !== false) $filter = 'be';
    elseif (stripos($category, 'master') !== false || stripos($category, 'm.tech') !== false) $filter = 'mtech';
    elseif (stripos($category, 'diploma') !== false) $filter = 'diploma';
    else $filter = preg_replace('/[^a-z0-9]/', '', strtolower($category));

    // Handle File Upload if provided
    if (isset($_FILES['doc_file']) && $_FILES['doc_file']['error'] === UPLOAD_ERR_OK) {
        $allowed = ['pdf', 'doc', 'docx', 'xls', 'xlsx', 'zip'];
        $origName = $_FILES['doc_file']['name'];
        $ext = strtolower(pathinfo($origName, PATHINFO_EXTENSION));

        if (in_array($ext, $allowed)) {
            $newFileName = 'curriculum_' . preg_replace('/[^a-zA-Z0-9_-]/', '_', pathinfo($origName, PATHINFO_FILENAME)) . '_' . time() . '.' . $ext;
            $uploadPath = __DIR__ . '/../assets/uploads/documents/' . $newFileName;
            
            if (!is_dir(dirname($uploadPath))) {
                mkdir(dirname($uploadPath), 0777, true);
            }

            if (move_uploaded_file($_FILES['doc_file']['tmp_name'], $uploadPath)) {
                $fileUrl = 'assets/uploads/documents/' . $newFileName;
            } else {
                $error = 'Failed to upload document file. Check directory permissions.';
            }
        } else {
            $error = 'Invalid file type. Allowed formats: PDF, DOC, DOCX, XLS, XLSX, ZIP.';
        }
    }

    if (empty($error)) {
        if (!empty($pageKey) && !empty($title) && !empty($fileUrl)) {
            $itemData = [
                'id'       => $docId,
                'category' => $category,
                'badge'    => $badge,
                'filter'   => $filter,
                'title'    => $title,
                'file'     => basename($fileUrl),
                'url'      => $fileUrl,
                'status'   => $status,
                'date'     => date('Y-m-d')
            ];

            // Find section name from catalog
            $sectionName = 'Downloads';
            $pageTitle = $pageKey;
            foreach ($catalog as $secName => $secInfo) {
                if (isset($secInfo['pages'][$pageKey])) {
                    $sectionName = $secName;
                    $pageTitle = $secInfo['pages'][$pageKey]['title'];
                    break;
                }
            }

            save_download_page_item($pageKey, $itemData, $pageTitle, $sectionName);
            $msg = "Document \"$title\" saved successfully and is now active on the public page!";
        } else {
            $error = 'Please provide Page Key, Title, and either upload a file or specify a valid file URL.';
        }
    }
}

// Handle Delete Document
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['page']) && isset($_GET['id'])) {
    $delPage = clean_input($_GET['page']);
    $delId = clean_input($_GET['id']);
    if (delete_download_page_item($delPage, $delId)) {
        $msg = 'Document removed successfully!';
    } else {
        $error = 'Could not remove document.';
    }
}

// Active Tab & Page selection
$rawSec = trim($_GET['sec'] ?? 'Outcome Based Curriculum');
$activeSection = html_entity_decode($rawSec, ENT_QUOTES, 'UTF-8');
if (!isset($catalog[$activeSection])) {
    $activeSection = 'Outcome Based Curriculum';
}

$sectionPages = $catalog[$activeSection]['pages'] ?? [];
$firstPageKey = array_key_first($sectionPages);
$rawPage = trim($_GET['page'] ?? $firstPageKey);
$selectedPage = html_entity_decode($rawPage, ENT_QUOTES, 'UTF-8');
if (!isset($sectionPages[$selectedPage])) {
    $selectedPage = $firstPageKey;
}

// Fetch documents and page_info for the selected page
$pageItems = get_download_page_data($selectedPage, []);
$pageInfo = get_obe_page_info($selectedPage, [
    'heading'        => 'FACULTY OF ENGINEERING & TECHNOLOGY',
    'subheading'     => 'Program Educational Objectives, Program Outcomes & Course Curricula.',
    'badge_obe'      => 'Outcome Based Education (OBE)',
    'badge_approval' => 'UGC & AICTE Approved',
    'vision_title'   => 'VISION',
    'vision_text'    => 'To emerge as a "Centre for Excellence" offering Technical Education and Research Opportunities of very high standards to students, develop the total personality of the individual, and in still high levels of discipline and strive to set global standards, making our students technologically superior and ethically strong, who in turn shall contribute to the advancement of society and humankind.',
    'mission_title'  => 'MISSION',
    'mission_text'   => 'We dedicate and commit ourselves to achieve, sustain and faster unmatched excellence in Technical Education. To this end, we will pursue continuous development of infrastructure and enhance state-of-the art Equipment to provide our students a technologically up-to-date and intellectually inspiring environment of learning, research creativity, innovation and professional activity and inculcate in them ethical and moral values.'
]);
$selectedPageInfo = $sectionPages[$selectedPage] ?? ['title' => 'Downloads', 'file' => 'index.php'];

// Load full data for stats
$allDownloadsData = get_json_data('download_documents.json', []);
$totalAllDocs = 0;
foreach ($allDownloadsData as $p) {
    if (isset($p['data']) && is_array($p['data'])) {
        $totalAllDocs += count($p['data']);
    }
}

// Unique Categories currently in this page for fast selection in Add/Edit modals
$existingCategories = [];
foreach ($pageItems as $it) {
    if (!empty($it['category'])) {
        $existingCategories[$it['category']] = $it['badge'] ?? '';
    }
}
if (empty($existingCategories)) {
    $existingCategories = [
        'Bachelor of Engineering (B.E.)' => 'B.E.',
        'Master of Technology (M.Tech.)' => 'M.Tech.',
        'Diploma Engineering' => 'Diploma'
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Curriculum & Downloads Management (52) - SSSUTMS Admin</title>
  <link rel="icon" type="image/jpeg" href="../assets/images/logo/logo.jpg">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/admin.css">
  <style>
    .obe-content-card {
      background: #f8fafc;
      border: 1px solid #e2e8f0;
      border-radius: 12px;
      padding: 1.25rem;
      margin-bottom: 1.5rem;
    }
    .badge-filter-btn {
      cursor: pointer;
      transition: all 0.2s;
    }
    .badge-filter-btn:hover {
      opacity: 0.85;
      transform: translateY(-1px);
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
      <i class="fa fa-times"></i>
    </button>
  </div>

  <ul class="admin-nav">
    <li><a href="index.php" class="nav-link"><i class="fa fa-gauge"></i> Dashboard</a></li>
    <li><a href="home.php" class="nav-link"><i class="fa fa-house-chimney-window"></i> Home Page Editor</a></li>
    <li><a href="admission.php" class="nav-link"><i class="fa fa-user-graduate"></i> Admission Cell (7)</a></li>
    <li><a href="examination.php" class="nav-link"><i class="fa fa-graduation-cap"></i> Examination Cell (5)</a></li>
    <li><a href="research.php" class="nav-link"><i class="fa fa-flask"></i> Research Cell (12)</a></li>
    <li><a href="about.php" class="nav-link"><i class="fa fa-circle-info"></i> About Pages (42)</a></li>
    <li><a href="faculties.php" class="nav-link"><i class="fa fa-chalkboard-user"></i> Faculties &amp; Depts (14)</a></li>
    <li><a href="documents.php" class="nav-link"><i class="fa fa-stamp"></i> Approvals &amp; NAAC Docs</a></li>
    <li><a href="events.php" class="nav-link"><i class="fa fa-calendar-days"></i> Events &amp; Workshops</a></li>
    <li><a href="downloads.php" class="nav-link active"><i class="fa fa-folder-arrow-down"></i> Curriculum &amp; Downloads (52)</a></li>
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
        <h5 class="fw-bold text-dark mb-0">Curriculum &amp; Downloads Dynamic Manager</h5>
        <small class="text-muted d-none d-md-inline">Manage all 52 official curriculum schemes, syllabi, outcome-based guidelines &amp; downloadable forms</small>
      </div>
    </div>
    
    <div class="d-flex align-items-center gap-2">
      <a href="<?php echo htmlspecialchars(base_url($selectedPageInfo['file'])); ?>" target="_blank" class="btn btn-outline-primary btn-sm rounded-pill px-3 shadow-sm">
        <i class="fa fa-arrow-up-right-from-square me-1"></i> Preview Live Page
      </a>
      <button type="button" class="btn btn-primary btn-sm rounded-pill px-3 shadow-sm fw-bold" data-bs-toggle="modal" data-bs-target="#addDocModal">
        <i class="fa fa-plus me-1"></i> Upload / Add Document
      </button>
    </div>
  </header>

  <div class="admin-content">
    
    <?php if (!empty($msg)): ?>
      <div class="alert alert-success alert-dismissible fade show rounded-4 border-0 shadow-sm" role="alert">
        <i class="fa fa-circle-check me-2"></i> <?php echo htmlspecialchars($msg); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>

    <?php if (!empty($error)): ?>
      <div class="alert alert-danger alert-dismissible fade show rounded-4 border-0 shadow-sm" role="alert">
        <i class="fa fa-circle-exclamation me-2"></i> <?php echo htmlspecialchars($error); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>

    <!-- Stat Metric Cards -->
    <div class="row g-3 mb-4 align-items-stretch">
      <div class="col-xl-3 col-sm-6">
        <div class="admin-stat-card h-100 d-flex flex-column justify-content-between">
          <div class="d-flex align-items-start justify-content-between w-100 mb-2">
            <div>
              <span class="stat-label">Managed Pages</span>
              <h3 class="stat-value text-dark mb-0">52</h3>
            </div>
            <div class="stat-icon bg-primary-subtle text-primary flex-shrink-0">
              <i class="fa fa-network-wired"></i>
            </div>
          </div>
          <div>
            <span class="badge bg-primary-subtle text-primary fw-bold">4 Major Categories</span>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-sm-6">
        <div class="admin-stat-card h-100 d-flex flex-column justify-content-between">
          <div class="d-flex align-items-start justify-content-between w-100 mb-2">
            <div class="pe-2">
              <span class="stat-label">Active Section</span>
              <h4 class="fw-bold text-dark mb-0 fs-6" style="line-height: 1.3;"><?php echo htmlspecialchars($activeSection); ?></h4>
            </div>
            <div class="stat-icon bg-success-subtle text-success flex-shrink-0">
              <i class="fa <?php echo $catalog[$activeSection]['icon'] ?? 'fa-folder'; ?>"></i>
            </div>
          </div>
          <div>
            <span class="badge bg-success-subtle text-success fw-bold"><?php echo count($sectionPages); ?> Programs Linked</span>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-sm-6">
        <div class="admin-stat-card h-100 d-flex flex-column justify-content-between">
          <div class="d-flex align-items-start justify-content-between w-100 mb-2">
            <div>
              <span class="stat-label">Current Page Docs</span>
              <h3 class="stat-value text-dark mb-0"><?php echo count($pageItems); ?></h3>
            </div>
            <div class="stat-icon bg-info-subtle text-info flex-shrink-0">
              <i class="fa fa-file-pdf"></i>
            </div>
          </div>
          <div>
            <span class="badge bg-info-subtle text-info fw-bold text-truncate d-inline-block" style="max-width: 100%;" title="<?php echo htmlspecialchars($selectedPageInfo['title']); ?>"><?php echo htmlspecialchars($selectedPageInfo['title']); ?></span>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-sm-6">
        <div class="admin-stat-card h-100 d-flex flex-column justify-content-between">
          <div class="d-flex align-items-start justify-content-between w-100 mb-2">
            <div>
              <span class="stat-label">Total Documents</span>
              <h3 class="stat-value text-dark mb-0"><?php echo $totalAllDocs; ?></h3>
            </div>
            <div class="stat-icon bg-warning-subtle text-warning flex-shrink-0">
              <i class="fa fa-database"></i>
            </div>
          </div>
          <div>
            <span class="badge bg-warning-subtle text-warning fw-bold">Live Dynamic Storage</span>
          </div>
        </div>
      </div>
    </div>

    <!-- 4 Section Selector Navigation Tabs -->
    <div class="card border-0 shadow-sm rounded-4 mb-4 bg-white">
      <div class="card-body p-2 p-md-3">
        <ul class="nav nav-pills gap-2 flex-wrap align-items-center">
          <?php foreach ($catalog as $secTitle => $secMeta): 
            $isActive = ($secTitle === $activeSection);
          ?>
            <li class="nav-item">
              <a class="nav-link py-2 px-3 fw-semibold rounded-pill d-inline-flex align-items-center <?php echo $isActive ? 'active bg-primary text-white shadow-sm' : 'text-secondary bg-light border border-light-subtle'; ?>" 
                 style="font-size: 0.84rem;"
                 href="downloads.php?sec=<?php echo urlencode($secTitle); ?>">
                <i class="fa <?php echo $secMeta['icon']; ?> me-2"></i>
                <span><?php echo htmlspecialchars($secTitle); ?></span>
                <span class="badge <?php echo $isActive ? 'bg-white text-primary' : 'bg-secondary-subtle text-secondary'; ?> ms-2 rounded-pill fw-bold" style="font-size: 0.72rem;"><?php echo count($secMeta['pages']); ?></span>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>

    <!-- Page Selector and Document Management Area -->
    <div class="card border-0 shadow-sm rounded-4 bg-white p-4">
      
      <!-- Sub-page Selector Dropdown & Filter Header -->
      <div class="row g-3 align-items-center mb-4 pb-3 border-bottom">
        <div class="col-lg-6">
          <label class="form-label small fw-bold text-muted mb-1"><i class="fa fa-file-lines me-1"></i> Select Program / Page to Manage:</label>
          <div class="input-group">
            <select class="form-select fw-bold text-dark border-primary" onchange="location.href='downloads.php?sec=<?php echo urlencode($activeSection); ?>&page=' + encodeURIComponent(this.value)">
              <?php foreach ($sectionPages as $pKey => $pMeta): 
                $cnt = count($allDownloadsData[$pKey]['data'] ?? []);
              ?>
                <option value="<?php echo htmlspecialchars($pKey); ?>" <?php echo ($pKey === $selectedPage) ? 'selected' : ''; ?>>
                  <?php echo htmlspecialchars($pMeta['title']); ?> (<?php echo $cnt; ?> docs) &mdash; [<?php echo basename($pMeta['file']); ?>]
                </option>
              <?php endforeach; ?>
            </select>
            <a href="<?php echo htmlspecialchars(base_url($selectedPageInfo['file'])); ?>" target="_blank" class="btn btn-outline-primary" title="View Public Page">
              <i class="fa fa-arrow-up-right-from-square"></i>
            </a>
          </div>
        </div>

        <div class="col-lg-6 text-lg-end">
          <span class="badge bg-light text-dark border px-3 py-2 me-2">
            <i class="fa fa-folder text-warning me-1"></i> Path: <code><?php echo htmlspecialchars($selectedPageInfo['file']); ?></code>
          </span>
          <button type="button" class="btn btn-sm btn-primary rounded-pill px-3 shadow-sm fw-bold" data-bs-toggle="modal" data-bs-target="#addDocModal">
            <i class="fa fa-plus me-1"></i> Add New Document / PDF
          </button>
        </div>
      </div>

      <!-- Page Content & Header / Vision Settings -->
      <div class="accordion mb-4" id="accordionPageSettings">
        <div class="accordion-item border rounded-3 overflow-hidden">
          <h2 class="accordion-header" id="headingPageSettings">
            <button class="accordion-button collapsed fw-bold text-dark bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePageSettings" aria-expanded="false" aria-controls="collapsePageSettings">
              <i class="fa fa-pen-to-square text-primary me-2"></i> Page Header &amp; Content Settings for "<?php echo htmlspecialchars($selectedPageInfo['title']); ?>"
            </button>
          </h2>
          <div id="collapsePageSettings" class="accordion-collapse collapse" aria-labelledby="headingPageSettings" data-bs-parent="#accordionPageSettings">
            <div class="accordion-body p-4 bg-white">
              <form method="POST" action="downloads.php?sec=<?php echo urlencode($activeSection); ?>&page=<?php echo urlencode($selectedPage); ?>">
                <input type="hidden" name="action" value="save_page_info">
                <input type="hidden" name="page_key" value="<?php echo htmlspecialchars($selectedPage); ?>">

                <div class="row g-3">
                  <div class="col-md-6">
                    <label class="form-label fw-bold small text-dark">Faculty / Page Heading</label>
                    <input type="text" name="heading" class="form-control" value="<?php echo htmlspecialchars($pageInfo['heading'] ?? ('FACULTY OF ' . strtoupper($selectedPageInfo['title']))); ?>" required>
                  </div>

                  <div class="col-md-6">
                    <label class="form-label fw-bold small text-dark">Subheading / Description</label>
                    <input type="text" name="subheading" class="form-control" value="<?php echo htmlspecialchars($pageInfo['subheading'] ?? 'Teaching, Examination Schemes & Detailed Course Curriculum.'); ?>" required>
                  </div>

                  <div class="col-md-6">
                    <label class="form-label fw-bold small text-dark">Top Badge 1 (e.g. Faculties &amp; Depts / OBE)</label>
                    <input type="text" name="badge_obe" class="form-control" value="<?php echo htmlspecialchars($pageInfo['badge_obe'] ?? 'Faculties & Departments'); ?>">
                  </div>

                  <div class="col-md-6">
                    <label class="form-label fw-bold small text-dark">Top Badge 2 (Approval Status)</label>
                    <input type="text" name="badge_approval" class="form-control" value="<?php echo htmlspecialchars($pageInfo['badge_approval'] ?? 'UGC Approved'); ?>">
                  </div>

                  <?php if ($activeSection === 'Outcome Based Curriculum' || !empty($pageInfo['vision_text']) || !empty($pageInfo['mission_text'])): ?>
                    <div class="col-md-6">
                      <label class="form-label fw-bold small text-dark">Vision Title</label>
                      <input type="text" name="vision_title" class="form-control" value="<?php echo htmlspecialchars($pageInfo['vision_title'] ?? 'VISION'); ?>">
                      <label class="form-label fw-bold small text-dark mt-2">Vision Statement Text</label>
                      <textarea name="vision_text" class="form-control" rows="4"><?php echo htmlspecialchars($pageInfo['vision_text'] ?? ''); ?></textarea>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label fw-bold small text-dark">Mission Title</label>
                      <input type="text" name="mission_title" class="form-control" value="<?php echo htmlspecialchars($pageInfo['mission_title'] ?? 'MISSION'); ?>">
                      <label class="form-label fw-bold small text-dark mt-2">Mission Statement Text</label>
                      <textarea name="mission_text" class="form-control" rows="4"><?php echo htmlspecialchars($pageInfo['mission_text'] ?? ''); ?></textarea>
                    </div>
                  <?php endif; ?>

                  <div class="col-12 text-end mt-3">
                    <button type="submit" class="btn btn-primary rounded-pill px-4 fw-bold shadow-sm">
                      <i class="fa fa-save me-1"></i> Update Page Details &amp; Headers
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Live Search & Filter Bar for this page's documents -->
      <div class="d-flex flex-wrap justify-content-between align-items-center mb-3 gap-2">
        <div class="input-group" style="max-width: 380px;">
          <span class="input-group-text bg-light border-end-0"><i class="fa fa-search text-muted"></i></span>
          <input type="text" id="docSearchInput" class="form-control border-start-0" placeholder="Search branch or specialization..." onkeyup="filterDocsTable()">
        </div>
        <div class="text-muted small">
          Showing <strong><?php echo count($pageItems); ?></strong> documents for <em><?php echo htmlspecialchars($selectedPageInfo['title']); ?></em>
        </div>
      </div>

      <!-- Documents Table -->
      <div class="table-responsive">
        <table class="table table-hover align-middle mb-0" id="docsTable">
          <thead class="table-light">
            <tr>
              <th style="width: 60px;" class="text-center">#</th>
              <th>Branch / Document Title</th>
              <th>Course / Category</th>
              <th>File Name &amp; Link</th>
              <th class="text-center" style="width: 110px;">Status</th>
              <th class="text-center" style="width: 160px;">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php if (empty($pageItems)): ?>
              <tr>
                <td colspan="6" class="text-center py-5">
                  <i class="fa fa-folder-open fa-3x text-muted mb-3 opacity-50"></i>
                  <h6 class="text-muted fw-bold">No custom documents added yet for this page</h6>
                  <p class="small text-muted mb-3">The public page is currently serving its verified default curriculum content seamlessly.</p>
                  <button type="button" class="btn btn-sm btn-outline-primary rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#addDocModal">
                    <i class="fa fa-plus me-1"></i> Add First Dynamic Document
                  </button>
                </td>
              </tr>
            <?php else: ?>
              <?php foreach ($pageItems as $idx => $doc): 
                $fileUrl = get_document_download_url($doc);
                $docCategory = $doc['category'] ?? 'General';
                $docBadge = $doc['badge'] ?? '';
                $docStatus = $doc['status'] ?? 'Active';
                $rawFile = $doc['url'] ?? $doc['file'] ?? '';
              ?>
                <tr id="doc-row-<?php echo htmlspecialchars($doc['id'] ?? $idx); ?>">
                  <td class="text-center fw-bold text-muted"><?php echo $idx + 1; ?></td>
                  <td>
                    <div class="fw-bold text-dark doc-title-text"><?php echo htmlspecialchars($doc['title'] ?? 'Document'); ?></div>
                    <?php if (!empty($doc['date'])): ?>
                      <small class="text-muted"><i class="fa fa-calendar-day me-1"></i> <?php echo htmlspecialchars($doc['date']); ?></small>
                    <?php endif; ?>
                  </td>
                  <td>
                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2 py-1 doc-badge-text">
                      <?php echo htmlspecialchars($docBadge ?: $docCategory); ?>
                    </span>
                    <span class="small text-secondary d-none d-md-inline ms-1 doc-category-text">
                      <?php echo htmlspecialchars($docCategory); ?>
                    </span>
                  </td>
                  <td>
                    <a href="<?php echo htmlspecialchars($fileUrl); ?>" target="_blank" class="text-decoration-none small text-truncate d-inline-block" style="max-width: 250px;">
                      <i class="fa fa-file-pdf text-danger me-1"></i> <?php echo htmlspecialchars($doc['file'] ?? basename($fileUrl)); ?>
                    </a>
                  </td>
                  <td class="text-center">
                    <?php if ($docStatus === 'Active'): ?>
                      <span class="badge bg-success-subtle text-success px-2 py-1 fw-bold">
                        <i class="fa fa-check-circle me-1"></i> Live
                      </span>
                    <?php else: ?>
                      <span class="badge bg-secondary-subtle text-secondary px-2 py-1 fw-bold">
                        <i class="fa fa-eye-slash me-1"></i> Draft
                      </span>
                    <?php endif; ?>
                  </td>
                  <td class="text-center">
                    <div class="btn-group btn-group-sm">
                      <a href="<?php echo htmlspecialchars($fileUrl); ?>" target="_blank" class="btn btn-outline-secondary" title="View Document">
                        <i class="fa fa-eye"></i>
                      </a>
                      <button type="button" class="btn btn-outline-primary btn-edit-doc" title="Edit Document" 
                              data-id="<?php echo htmlspecialchars($doc['id'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                              data-title="<?php echo htmlspecialchars($doc['title'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                              data-category="<?php echo htmlspecialchars($docCategory, ENT_QUOTES, 'UTF-8'); ?>"
                              data-badge="<?php echo htmlspecialchars($docBadge, ENT_QUOTES, 'UTF-8'); ?>"
                              data-fileurl="<?php echo htmlspecialchars($rawFile, ENT_QUOTES, 'UTF-8'); ?>"
                              data-status="<?php echo htmlspecialchars($docStatus, ENT_QUOTES, 'UTF-8'); ?>">
                        <i class="fa fa-pencil"></i>
                      </button>
                      <a href="downloads.php?action=delete&sec=<?php echo urlencode($activeSection); ?>&page=<?php echo urlencode($selectedPage); ?>&id=<?php echo urlencode($doc['id'] ?? ''); ?>" 
                         onclick="return confirm('Are you sure you want to delete this document?')" class="btn btn-outline-danger" title="Delete Document">
                        <i class="fa fa-trash"></i>
                      </a>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>

    </div>

  </div>

</main>

<!-- Add Document Modal -->
<div class="modal fade" id="addDocModal" tabindex="-1" aria-labelledby="addDocModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content border-0 shadow-lg rounded-4">
      
      <div class="modal-header bg-primary text-white border-0 py-3">
        <h5 class="modal-title fw-bold" id="addDocModalLabel">
          <i class="fa fa-file-circle-plus me-2"></i> Upload / Add New Dynamic Document
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form method="POST" action="downloads.php?sec=<?php echo urlencode($activeSection); ?>&page=<?php echo urlencode($selectedPage); ?>" enctype="multipart/form-data">
        <input type="hidden" name="action" value="save_doc">

        <div class="modal-body p-4">
          
          <div class="row g-3">
            
            <div class="col-md-6">
              <label class="form-label fw-bold small text-dark">Target Program / Page <span class="text-danger">*</span></label>
              <select name="page_key" class="form-select" required>
                <?php foreach ($catalog as $secTitle => $secMeta): ?>
                  <optgroup label="<?php echo htmlspecialchars($secTitle); ?>">
                    <?php foreach ($secMeta['pages'] as $pk => $pm): ?>
                      <option value="<?php echo htmlspecialchars($pk); ?>" <?php echo ($pk === $selectedPage) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($pm['title']); ?>
                      </option>
                    <?php endforeach; ?>
                  </optgroup>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="col-md-6">
              <label class="form-label fw-bold small text-dark">Course / Program Category <span class="text-danger">*</span></label>
              <input type="text" name="category" list="categoryOptions" class="form-control" placeholder="e.g. Bachelor of Engineering (B.E.)" required>
              <datalist id="categoryOptions">
                <?php foreach ($existingCategories as $catName => $catBadge): ?>
                  <option value="<?php echo htmlspecialchars($catName); ?>"><?php echo htmlspecialchars($catBadge); ?></option>
                <?php endforeach; ?>
              </datalist>
            </div>

            <div class="col-md-6">
              <label class="form-label fw-bold small text-dark">Badge Tag (e.g. B.E., M.Tech., Diploma)</label>
              <input type="text" name="badge" class="form-control" placeholder="e.g. B.E.">
            </div>

            <div class="col-md-6">
              <label class="form-label fw-bold small text-dark">Status</label>
              <select name="status" class="form-select">
                <option value="Active" selected>Active &bull; Live on Public Page</option>
                <option value="Draft">Draft &bull; Hide from Public Page</option>
              </select>
            </div>

            <div class="col-12">
              <label class="form-label fw-bold small text-dark">Branch / Specialization / Document Title <span class="text-danger">*</span></label>
              <input type="text" name="title" class="form-control" placeholder="e.g. Aeronautical Engineering or Computer Science" required>
            </div>

            <div class="col-md-6">
              <label class="form-label fw-bold small text-dark">Upload PDF Document File</label>
              <input type="file" name="doc_file" class="form-control" accept=".pdf,.doc,.docx,.xls,.xlsx,.zip">
              <small class="text-muted">Max file size: 25MB (PDF recommended)</small>
            </div>

            <div class="col-md-6">
              <label class="form-label fw-bold small text-dark">OR Existing File Path / URL</label>
              <input type="text" name="file_url" class="form-control" placeholder="e.g. https://www.sssutms.co.in/cms/.../BE_AE.pdf">
              <small class="text-muted">Enter URL if not uploading a new file</small>
            </div>

          </div>

        </div>

        <div class="modal-footer bg-light border-0 py-3">
          <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary rounded-pill px-4 fw-bold shadow-sm">
            <i class="fa fa-cloud-arrow-up me-1"></i> Save &amp; Publish Document
          </button>
        </div>
      </form>

    </div>
  </div>
</div>

<!-- Edit Document Modal -->
<div class="modal fade" id="editDocModal" tabindex="-1" aria-labelledby="editDocModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content border-0 shadow-lg rounded-4">
      
      <div class="modal-header bg-dark text-white border-0 py-3">
        <h5 class="modal-title fw-bold" id="editDocModalLabel">
          <i class="fa fa-pencil me-2 text-warning"></i> Edit Curriculum Document
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form method="POST" action="downloads.php?sec=<?php echo urlencode($activeSection); ?>&page=<?php echo urlencode($selectedPage); ?>" enctype="multipart/form-data">
        <input type="hidden" name="action" value="save_doc">
        <input type="hidden" name="page_key" value="<?php echo htmlspecialchars($selectedPage); ?>">
        <input type="hidden" name="doc_id" id="edit_doc_id" value="">

        <div class="modal-body p-4">
          
          <div class="row g-3">
            
            <div class="col-md-6">
              <label class="form-label fw-bold small text-dark">Course / Program Category <span class="text-danger">*</span></label>
              <input type="text" name="category" id="edit_category" list="editCategoryOptions" class="form-control" required>
              <datalist id="editCategoryOptions">
                <?php foreach ($existingCategories as $catName => $catBadge): ?>
                  <option value="<?php echo htmlspecialchars($catName); ?>"><?php echo htmlspecialchars($catBadge); ?></option>
                <?php endforeach; ?>
              </datalist>
            </div>

            <div class="col-md-6">
              <label class="form-label fw-bold small text-dark">Badge Tag</label>
              <input type="text" name="badge" id="edit_badge" class="form-control" placeholder="e.g. B.E., M.Tech., Diploma">
            </div>

            <div class="col-12">
              <label class="form-label fw-bold small text-dark">Branch / Specialization / Title <span class="text-danger">*</span></label>
              <input type="text" name="title" id="edit_title" class="form-control" required>
            </div>

            <div class="col-md-6">
              <label class="form-label fw-bold small text-dark">Replace PDF File (Optional)</label>
              <input type="file" name="doc_file" class="form-control" accept=".pdf,.doc,.docx,.xls,.xlsx,.zip">
              <small class="text-muted">Select new file only if replacing</small>
            </div>

            <div class="col-md-6">
              <label class="form-label fw-bold small text-dark">Current File Path / URL <span class="text-danger">*</span></label>
              <input type="text" name="file_url" id="edit_file_url" class="form-control" required>
            </div>

            <div class="col-md-6">
              <label class="form-label fw-bold small text-dark">Status</label>
              <select name="status" id="edit_status" class="form-select">
                <option value="Active">Active &bull; Live on Public Page</option>
                <option value="Draft">Draft &bull; Hide from Public Page</option>
              </select>
            </div>

          </div>

        </div>

        <div class="modal-footer bg-light border-0 py-3">
          <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary rounded-pill px-4 fw-bold shadow-sm">
            <i class="fa fa-save me-1"></i> Save Changes
          </button>
        </div>
      </form>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/admin.js"></script>
<script>
function filterDocsTable() {
  const query = document.getElementById('docSearchInput').value.toLowerCase();
  const rows = document.querySelectorAll('#docsTable tbody tr');
  rows.forEach(row => {
    const text = row.innerText.toLowerCase();
    row.style.display = text.includes(query) ? '' : 'none';
  });
}

document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('.btn-edit-doc').forEach(btn => {
    btn.addEventListener('click', function () {
      document.getElementById('edit_doc_id').value = this.dataset.id || '';
      document.getElementById('edit_title').value = this.dataset.title || '';
      document.getElementById('edit_category').value = this.dataset.category || '';
      document.getElementById('edit_badge').value = this.dataset.badge || '';
      document.getElementById('edit_file_url').value = this.dataset.fileurl || '';
      document.getElementById('edit_status').value = this.dataset.status || 'Active';
      
      const modalEl = document.getElementById('editDocModal');
      const modal = new bootstrap.Modal(modalEl);
      modal.show();
    });
  });
});
</script>
</body>
</html>
