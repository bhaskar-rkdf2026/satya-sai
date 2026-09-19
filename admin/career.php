<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/career_helper.php';
require_admin_auth();

$msg = '';
$error = '';

// Handle Page Info Save
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'save_page_info') {
    $infoData = [
        'page_title'      => clean_input($_POST['page_title'] ?? 'Career & Faculty Recruitment - SSSUTMS'),
        'banner_title'    => clean_input($_POST['banner_title'] ?? 'Career & Recruitment'),
        'banner_category' => clean_input($_POST['banner_category'] ?? 'Career'),
        'heading'         => clean_input($_POST['heading'] ?? 'Career Opportunities & Faculty Recruitment'),
        'intro_title'     => clean_input($_POST['intro_title'] ?? ''),
        'intro_text'      => trim($_POST['intro_text'] ?? ''),
        'section_heading' => clean_input($_POST['section_heading'] ?? 'Current Recruitment Notices & Job Advertisements'),
        'meta_title'       => clean_input($_POST['meta_title'] ?? ''),
        'meta_description' => clean_input($_POST['meta_description'] ?? ''),
        'meta_keywords'    => clean_input($_POST['meta_keywords'] ?? ''),
        'canonical_url'    => clean_input($_POST['canonical_url'] ?? ''),
        'og_image'         => clean_input($_POST['og_image'] ?? 'assets/images/logo/logo.jpg')
    ];
    if (save_career_page_info($infoData)) {
        $msg = 'Career page information and SEO meta tags updated successfully!';
    } else {
        $error = 'Failed to update page information.';
    }
}

// Handle Save Job Opening (Add / Edit)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'save_opening') {
    $opId = !empty($_POST['opening_id']) ? clean_input($_POST['opening_id']) : ('job_' . date('Ymd_His'));
    $title = clean_input($_POST['title'] ?? '');
    $badge = clean_input($_POST['badge'] ?? '');
    $badgeColor = clean_input($_POST['badge_color'] ?? 'primary');
    $desc = clean_input($_POST['description'] ?? '');
    $status = clean_input($_POST['status'] ?? 'Active');
    $date = clean_input($_POST['date'] ?? date('Y-m-d'));
    $imagePath = trim($_POST['existing_image'] ?? '');
    $filePath = trim($_POST['existing_file'] ?? '');

    // Upload Image
    if (isset($_FILES['opening_image']) && $_FILES['opening_image']['error'] === UPLOAD_ERR_OK) {
        $allowed = ['jpg', 'jpeg', 'png', 'webp'];
        $origName = $_FILES['opening_image']['name'];
        $ext = strtolower(pathinfo($origName, PATHINFO_EXTENSION));
        if (in_array($ext, $allowed)) {
            $destDir = __DIR__ . '/../assets/uploads/career';
            if (!is_dir($destDir)) {
                mkdir($destDir, 0777, true);
            }
            $newImgName = 'job_' . time() . '_' . preg_replace('/[^a-zA-Z0-9_-]/', '_', pathinfo($origName, PATHINFO_FILENAME)) . '.' . $ext;
            if (move_uploaded_file($_FILES['opening_image']['tmp_name'], $destDir . '/' . $newImgName)) {
                $imagePath = 'assets/uploads/career/' . $newImgName;
            } else {
                $error = 'Failed to upload job advertisement image.';
            }
        } else {
            $error = 'Invalid image format. Allowed formats: JPG, JPEG, PNG, WEBP.';
        }
    }

    // Upload PDF / Document
    if (isset($_FILES['opening_pdf']) && $_FILES['opening_pdf']['error'] === UPLOAD_ERR_OK) {
        $allowed = ['pdf', 'doc', 'docx'];
        $origName = $_FILES['opening_pdf']['name'];
        $ext = strtolower(pathinfo($origName, PATHINFO_EXTENSION));
        if (in_array($ext, $allowed)) {
            $destDir = __DIR__ . '/../assets/uploads/career';
            if (!is_dir($destDir)) {
                mkdir($destDir, 0777, true);
            }
            $newDocName = 'career_doc_' . time() . '_' . preg_replace('/[^a-zA-Z0-9_-]/', '_', pathinfo($origName, PATHINFO_FILENAME)) . '.' . $ext;
            if (move_uploaded_file($_FILES['opening_pdf']['tmp_name'], $destDir . '/' . $newDocName)) {
                $filePath = 'assets/uploads/career/' . $newDocName;
            } else {
                $error = 'Failed to upload attachment file.';
            }
        } else {
            $error = 'Invalid document format. Allowed format: PDF, DOC, DOCX.';
        }
    }

    // Construct Action Buttons
    $buttons = [];
    $btn1Label = clean_input($_POST['btn1_label'] ?? '');
    $btn1Url = trim($_POST['btn1_url'] ?? '');
    $btn1Icon = clean_input($_POST['btn1_icon'] ?? 'fa-expand');

    // Auto default if empty but file/image exists
    if (empty($btn1Url) && !empty($filePath)) {
        $btn1Url = $filePath;
        if (empty($btn1Label)) $btn1Label = 'Download PDF';
        $btn1Icon = 'fa-file-pdf';
    } elseif (empty($btn1Url) && !empty($imagePath)) {
        $btn1Url = $imagePath;
        if (empty($btn1Label)) $btn1Label = 'View Full Advertisement';
        $btn1Icon = 'fa-expand';
    }

    if (!empty($btn1Label) && !empty($btn1Url)) {
        $buttons[] = [
            'label' => $btn1Label,
            'url' => $btn1Url,
            'icon' => $btn1Icon,
            'target' => '_blank'
        ];
    }

    $btn2Label = clean_input($_POST['btn2_label'] ?? '');
    $btn2Url = trim($_POST['btn2_url'] ?? '');
    $btn2Icon = clean_input($_POST['btn2_icon'] ?? 'fa-image');

    if (!empty($btn2Label) && !empty($btn2Url)) {
        $buttons[] = [
            'label' => $btn2Label,
            'url' => $btn2Url,
            'icon' => $btn2Icon,
            'target' => '_blank'
        ];
    }

    if (empty($error)) {
        if (!empty($title)) {
            $item = [
                'id' => $opId,
                'title' => $title,
                'badge' => $badge,
                'badge_color' => $badgeColor,
                'description' => $desc,
                'image' => $imagePath,
                'file' => $filePath,
                'buttons' => $buttons,
                'status' => $status,
                'date' => $date
            ];
            save_career_opening($item);
            $msg = 'Job opening / advertisement saved successfully!';
        } else {
            $error = 'Job Title is required.';
        }
    }
}

// Handle Delete Job Opening
if (isset($_GET['action']) && $_GET['action'] === 'delete_opening' && isset($_GET['id'])) {
    $delId = clean_input($_GET['id']);
    delete_career_opening($delId);
    $msg = 'Job opening removed successfully.';
}

// Handle Save Announcement
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'save_announcement') {
    $annId = !empty($_POST['ann_id']) ? clean_input($_POST['ann_id']) : ('ca_' . date('Ymd_His'));
    $title = clean_input($_POST['title'] ?? '');
    $category = clean_input($_POST['category'] ?? 'General Notice');
    $date = clean_input($_POST['date'] ?? date('Y-m-d'));
    $status = clean_input($_POST['status'] ?? 'Active');
    $filePath = trim($_POST['existing_file'] ?? '');

    if (isset($_FILES['ann_file']) && $_FILES['ann_file']['error'] === UPLOAD_ERR_OK) {
        $allowed = ['pdf', 'doc', 'docx'];
        $origName = $_FILES['ann_file']['name'];
        $ext = strtolower(pathinfo($origName, PATHINFO_EXTENSION));
        if (in_array($ext, $allowed)) {
            $destDir = __DIR__ . '/../assets/uploads/career';
            if (!is_dir($destDir)) {
                mkdir($destDir, 0777, true);
            }
            $newDocName = 'ann_' . time() . '_' . preg_replace('/[^a-zA-Z0-9_-]/', '_', pathinfo($origName, PATHINFO_FILENAME)) . '.' . $ext;
            if (move_uploaded_file($_FILES['ann_file']['tmp_name'], $destDir . '/' . $newDocName)) {
                $filePath = 'assets/uploads/career/' . $newDocName;
            }
        }
    }

    if (!empty($title)) {
        $item = [
            'id' => $annId,
            'title' => $title,
            'category' => $category,
            'date' => $date,
            'file' => $filePath,
            'status' => $status
        ];
        save_career_announcement($item);
        $msg = 'Announcement saved successfully!';
    } else {
        $error = 'Announcement Title is required.';
    }
}

// Handle Delete Announcement
if (isset($_GET['action']) && $_GET['action'] === 'delete_announcement' && isset($_GET['id'])) {
    $delId = clean_input($_GET['id']);
    delete_career_announcement($delId);
    $msg = 'Announcement deleted successfully.';
}

// Handle Save Event
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'save_event') {
    $eventId = !empty($_POST['event_id']) ? clean_input($_POST['event_id']) : ('ce_' . date('Ymd_His'));
    $title = clean_input($_POST['title'] ?? '');
    $date = clean_input($_POST['date'] ?? date('Y-m-d'));
    $venue = clean_input($_POST['venue'] ?? 'SSSUTMS Campus, Sehore');
    $desc = clean_input($_POST['description'] ?? '');
    $status = clean_input($_POST['status'] ?? 'Active');

    if (!empty($title)) {
        $item = [
            'id' => $eventId,
            'title' => $title,
            'date' => $date,
            'venue' => $venue,
            'description' => $desc,
            'status' => $status
        ];
        save_career_event($item);
        $msg = 'Recruitment event/drive saved successfully!';
    } else {
        $error = 'Event Title is required.';
    }
}

// Handle Delete Event
if (isset($_GET['action']) && $_GET['action'] === 'delete_event' && isset($_GET['id'])) {
    $delId = clean_input($_GET['id']);
    delete_career_event($delId);
    $msg = 'Recruitment event removed successfully.';
}

$pageInfo = get_career_page_info();
$openings = get_career_openings();
$announcements = get_career_announcements();
$events = get_career_events();

$totalOpenings = count($openings);
$activeOpenings = count(array_filter($openings, function($o) { return ($o['status'] ?? 'Active') === 'Active'; }));
$totalAnnouncements = count($announcements);
$totalEvents = count($events);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Career & Recruitment - SSSUTMS Admin</title>
  <link rel="icon" type="image/jpeg" href="../assets/images/logo/logo.jpg">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/admin.css">
  <style>
    .job-preview-thumb {
      width: 70px;
      height: 50px;
      object-fit: cover;
      border-radius: 6px;
      border: 1px solid #e2e8f0;
      background: #f8fafc;
    }
    .custom-table th {
      background-color: #0b2545;
      color: #ffffff;
      font-weight: 600;
      font-size: 0.85rem;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }
    .nav-tabs .nav-link {
      font-weight: 600;
      color: #64748b;
      border-radius: 8px 8px 0 0;
      padding: 12px 20px;
    }
    .nav-tabs .nav-link.active {
      color: #0b2545;
      border-bottom: 3px solid #0b2545;
      background: #ffffff;
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
    <li><a href="examination.php" class="nav-link"><i class="fa fa-graduation-cap"></i> Examination Cell (5)</a></li>
    <li><a href="research.php" class="nav-link"><i class="fa fa-flask"></i> Research Cell (12)</a></li>
    <li><a href="about.php" class="nav-link"><i class="fa fa-circle-info"></i> About Pages (42)</a></li>
    <li><a href="faculties.php" class="nav-link"><i class="fa fa-chalkboard-user"></i> Faculties &amp; Depts (14)</a></li>
    <li><a href="documents.php" class="nav-link"><i class="fa fa-stamp"></i> Approvals &amp; NAAC Docs</a></li>
    <li><a href="events.php" class="nav-link"><i class="fa fa-calendar-days"></i> Events &amp; Workshops</a></li>
    <li><a href="career.php" class="nav-link active"><i class="fa fa-briefcase"></i> Career &amp; Recruitment</a></li>
    <li><a href="contact.php" class="nav-link"><i class="fa fa-phone-volume"></i> Contact &amp; Helpdesk</a></li>
    <li><a href="itep.php" class="nav-link"><i class="fa fa-graduation-cap"></i> ITEP Cell</a></li>
    <li><a href="gallery.php" class="nav-link"><i class="fa fa-camera-retro"></i> Photo &amp; Video Gallery</a></li>
    <li><a href="downloads.php" class="nav-link"><i class="fa fa-folder-arrow-down"></i> Curriculum &amp; Downloads (52)</a></li>
    <li><a href="applications.php" class="nav-link"><i class="fa fa-user-graduate"></i> Student Registrations</a></li>
    <li><a href="inquiries.php" class="nav-link"><i class="fa fa-envelope-open-text"></i> Admission Leads</a></li>
    <li><a href="settings.php" class="nav-link"><i class="fa fa-sliders"></i> Portal Settings</a></li>
    <li class="mt-4 pt-3 border-top border-white border-opacity-10">
      <a href="../Career/index.php" target="_blank" class="nav-link text-white-50"><i class="fa fa-arrow-up-right-from-square"></i> View Career Page</a>
    </li>
    <li><a href="logout.php" class="nav-link text-danger"><i class="fa fa-right-from-bracket"></i> Sign Out</a></li>
  </ul>
</aside>

<!-- Admin Main Content -->
<main class="admin-main">
  
  <header class="admin-topbar">
    <div class="d-flex align-items-center gap-3">
      <button class="admin-sidebar-toggle d-lg-none" type="button" aria-label="Toggle Navigation">
        <i class="fa fa-bars"></i>
      </button>
      <div>
        <h5 class="fw-bold text-dark mb-0">Career &amp; Faculty Recruitment Management</h5>
        <small class="text-muted">Dynamic Management for Job Openings, Recruitment Advertisements &amp; Selection Drives</small>
      </div>
    </div>
    <div class="d-flex align-items-center gap-2">
      <a href="../Career/index.php" target="_blank" class="btn btn-outline-primary btn-sm rounded-pill px-3">
        <i class="fa fa-external-link me-1"></i> Live Career View
      </a>
      <div class="d-flex align-items-center gap-2 ms-2">
        <img src="../assets/images/logo/logo.jpg" alt="Admin" width="34" height="34" class="rounded-circle border">
        <span class="small fw-bold text-dark d-none d-sm-inline"><?php echo htmlspecialchars($_SESSION['admin_user'] ?? 'Admin'); ?></span>
      </div>
    </div>
  </header>

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

  <!-- KPI Metric Cards Grid -->
  <div class="row g-3 mb-4">
    <div class="col-xl-3 col-sm-6">
      <div class="card border-0 shadow-sm rounded-3 p-3 bg-white h-100">
        <div class="d-flex align-items-center justify-content-between">
          <div>
            <span class="text-muted small fw-semibold">Total Job Openings</span>
            <h3 class="fw-bold text-dark mb-0 mt-1"><?php echo $totalOpenings; ?></h3>
            <span class="small text-muted">All active &amp; archived</span>
          </div>
          <div class="p-3 bg-primary-subtle text-primary rounded-3">
            <i class="fa fa-briefcase fa-2x"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card border-0 shadow-sm rounded-3 p-3 bg-white h-100">
        <div class="d-flex align-items-center justify-content-between">
          <div>
            <span class="text-muted small fw-semibold">Active Posts</span>
            <h3 class="fw-bold text-success mb-0 mt-1"><?php echo $activeOpenings; ?></h3>
            <span class="small text-success"><i class="fa fa-check-circle me-1"></i> Live on Public Site</span>
          </div>
          <div class="p-3 bg-success-subtle text-success rounded-3">
            <i class="fa fa-toggle-on fa-2x"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card border-0 shadow-sm rounded-3 p-3 bg-white h-100">
        <div class="d-flex align-items-center justify-content-between">
          <div>
            <span class="text-muted small fw-semibold">Announcements</span>
            <h3 class="fw-bold text-warning mb-0 mt-1"><?php echo $totalAnnouncements; ?></h3>
            <span class="small text-muted">Statutory &amp; reservation notices</span>
          </div>
          <div class="p-3 bg-warning-subtle text-warning rounded-3">
            <i class="fa fa-bullhorn fa-2x"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card border-0 shadow-sm rounded-3 p-3 bg-white h-100">
        <div class="d-flex align-items-center justify-content-between">
          <div>
            <span class="text-muted small fw-semibold">Recruitment Drives</span>
            <h3 class="fw-bold text-info mb-0 mt-1"><?php echo $totalEvents; ?></h3>
            <span class="small text-muted">Walk-In &amp; interviews</span>
          </div>
          <div class="p-3 bg-info-subtle text-info rounded-3">
            <i class="fa fa-calendar-check fa-2x"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Management Tabs -->
  <div class="card border-0 shadow-sm rounded-3">
    <div class="card-header bg-white border-bottom pt-3 pb-0">
      <ul class="nav nav-tabs border-bottom-0" id="careerTabs" role="tablist">
        <li class="nav-item">
          <button class="nav-link active" id="openings-tab" data-bs-toggle="tab" data-bs-target="#openings-pane" type="button" role="tab">
            <i class="fa fa-briefcase me-2 text-primary"></i> Job Openings &amp; Advertisements (<?php echo $totalOpenings; ?>)
          </button>
        </li>
        <li class="nav-item">
          <button class="nav-link" id="pageinfo-tab" data-bs-toggle="tab" data-bs-target="#pageinfo-pane" type="button" role="tab">
            <i class="fa fa-sliders me-2 text-dark"></i> Page Content &amp; Policy Banner
          </button>
        </li>
        <li class="nav-item">
          <button class="nav-link" id="announcements-tab" data-bs-toggle="tab" data-bs-target="#announcements-pane" type="button" role="tab">
            <i class="fa fa-bullhorn me-2 text-warning"></i> Guidelines &amp; Announcements (<?php echo $totalAnnouncements; ?>)
          </button>
        </li>
        <li class="nav-item">
          <button class="nav-link" id="events-tab" data-bs-toggle="tab" data-bs-target="#events-pane" type="button" role="tab">
            <i class="fa fa-calendar-days me-2 text-info"></i> Walk-In Drives &amp; Events (<?php echo $totalEvents; ?>)
          </button>
        </li>
      </ul>
    </div>

    <div class="card-body p-4">
      <div class="tab-content" id="careerTabsContent">
        
        <!-- TAB 1: Job Openings -->
        <div class="tab-pane fade show active" id="openings-pane" role="tabpanel">
          <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
            <div>
              <h5 class="fw-bold text-dark mb-1">Current Job Postings</h5>
              <p class="text-muted small mb-0">Manage all faculty, administrative, and clinical recruitment cards displayed on the Career page.</p>
            </div>
            <button class="btn btn-primary rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#openingModal" onclick="resetOpeningForm()">
              <i class="fa fa-plus-circle me-1"></i> Add New Job Opening
            </button>
          </div>

          <div class="table-responsive">
            <table class="table table-hover align-middle custom-table mb-0 border">
              <thead>
                <tr>
                  <th style="width: 80px;">Poster</th>
                  <th>Position Title &amp; Details</th>
                  <th>Badge / Dept</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Action Buttons</th>
                  <th class="text-end" style="width: 140px;">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php if (empty($openings)): ?>
                  <tr>
                    <td colspan="7" class="text-center py-5 text-muted">
                      <i class="fa fa-folder-open fa-3x mb-3 text-secondary opacity-50"></i>
                      <h6>No Job Openings Found</h6>
                      <p class="small">Click "Add New Job Opening" to post your first recruitment advertisement.</p>
                    </td>
                  </tr>
                <?php else: ?>
                  <?php foreach ($openings as $op): 
                    $imgUrl = !empty($op['image']) ? base_url($op['image']) : '';
                    $badgeColor = $op['badge_color'] ?? 'primary';
                    $btnCount = count($op['buttons'] ?? []);
                    $jsonData = htmlspecialchars(json_encode($op), ENT_QUOTES, 'UTF-8');
                  ?>
                  <tr>
                    <td>
                      <?php if (!empty($imgUrl)): ?>
                        <a href="<?php echo htmlspecialchars($imgUrl); ?>" target="_blank" title="View Full Poster">
                          <img src="<?php echo htmlspecialchars($imgUrl); ?>" alt="" class="job-preview-thumb">
                        </a>
                      <?php else: ?>
                        <div class="job-preview-thumb d-flex align-items-center justify-content-center text-muted">
                          <i class="fa fa-image"></i>
                        </div>
                      <?php endif; ?>
                    </td>
                    <td>
                      <div class="fw-bold text-dark"><?php echo htmlspecialchars($op['title']); ?></div>
                      <div class="text-muted small" style="max-width: 320px; text-overflow: ellipsis; white-space: nowrap; overflow: hidden;">
                        <?php echo htmlspecialchars($op['description'] ?? ''); ?>
                      </div>
                    </td>
                    <td>
                      <?php if (!empty($op['badge'])): ?>
                        <span class="badge bg-<?php echo htmlspecialchars($badgeColor); ?>-subtle text-<?php echo htmlspecialchars($badgeColor); ?> border border-<?php echo htmlspecialchars($badgeColor); ?> fw-bold">
                          <?php echo htmlspecialchars($op['badge']); ?>
                        </span>
                      <?php else: ?>
                        <span class="text-muted small">—</span>
                      <?php endif; ?>
                    </td>
                    <td>
                      <span class="small text-muted"><i class="fa fa-calendar-day me-1"></i><?php echo htmlspecialchars($op['date'] ?? '—'); ?></span>
                    </td>
                    <td>
                      <?php if (($op['status'] ?? 'Active') === 'Active'): ?>
                        <span class="badge bg-success-subtle text-success px-2 py-1"><i class="fa fa-circle-check me-1"></i> Active</span>
                      <?php else: ?>
                        <span class="badge bg-secondary-subtle text-secondary px-2 py-1"><i class="fa fa-pause me-1"></i> Inactive</span>
                      <?php endif; ?>
                    </td>
                    <td>
                      <span class="badge bg-light text-dark border">
                        <i class="fa fa-link me-1"></i> <?php echo $btnCount; ?> Action <?php echo $btnCount === 1 ? 'Link' : 'Links'; ?>
                      </span>
                    </td>
                    <td class="text-end">
                      <button class="btn btn-outline-primary btn-sm rounded-circle me-1" title="Edit Opening" onclick="editOpening(<?php echo $jsonData; ?>)">
                        <i class="fa fa-pencil"></i>
                      </button>
                      <a href="career.php?action=delete_opening&id=<?php echo urlencode($op['id']); ?>" class="btn btn-outline-danger btn-sm rounded-circle" title="Delete" onclick="return confirm('Are you sure you want to delete this job opening?');">
                        <i class="fa fa-trash"></i>
                      </a>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>

        <!-- TAB 2: Page Information & Alert Banner -->
        <div class="tab-pane fade" id="pageinfo-pane" role="tabpanel">
          <div class="row justify-content-center">
            <div class="col-lg-11">
              <form action="career.php" method="POST" class="card border rounded-3 p-4 shadow-sm bg-light">
                <input type="hidden" name="action" value="save_page_info">

                <!-- Tab Navigation Header for Page Info -->
                <ul class="nav nav-pills mb-4 gap-2 border-bottom pb-3" id="careerPageTabNav" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active fw-bold px-4 py-2" id="tab-car-general" data-bs-toggle="pill" data-bs-target="#pane-car-general" type="button" role="tab">
                      <i class="fa-solid fa-sliders me-2"></i>General Content &amp; Media
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link fw-bold px-4 py-2" id="tab-car-seo" data-bs-toggle="pill" data-bs-target="#pane-car-seo" type="button" role="tab" style="background: rgba(16,185,129,0.08); color: #047857; border: 1px solid rgba(16,185,129,0.3);">
                      <i class="fa-solid fa-magnifying-glass me-2"></i>SEO &amp; Meta Details <span class="badge bg-success ms-1">SEO</span>
                    </button>
                  </li>
                </ul>

                <div class="tab-content" id="careerPageTabContent">
                  <!-- TAB 1: General Content & Media -->
                  <div class="tab-pane fade show active" id="pane-car-general" role="tabpanel">
                    
                    <h5 class="fw-bold text-dark border-bottom pb-2 mb-3">
                      <i class="fa fa-heading me-2 text-primary"></i> Page Headings &amp; Meta Titles
                    </h5>

                    <div class="row g-3 mb-3">
                      <div class="col-md-6">
                        <label class="form-label fw-semibold small">Browser Page Title</label>
                        <input type="text" name="page_title" class="form-control" value="<?php echo htmlspecialchars($pageInfo['page_title'] ?? ''); ?>" required>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label fw-semibold small">Banner Top Title</label>
                        <input type="text" name="banner_title" class="form-control" value="<?php echo htmlspecialchars($pageInfo['banner_title'] ?? ''); ?>" required>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label fw-semibold small">Banner Category</label>
                        <input type="text" name="banner_category" class="form-control" value="<?php echo htmlspecialchars($pageInfo['banner_category'] ?? ''); ?>" required>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label fw-semibold small">Main Card Header Title</label>
                        <input type="text" name="heading" class="form-control" value="<?php echo htmlspecialchars($pageInfo['heading'] ?? ''); ?>" required>
                      </div>
                      <div class="col-12">
                        <label class="form-label fw-semibold small">Section Header Bar</label>
                        <input type="text" name="section_heading" class="form-control" value="<?php echo htmlspecialchars($pageInfo['section_heading'] ?? ''); ?>" required>
                      </div>
                    </div>

                    <h5 class="fw-bold text-dark border-bottom pb-2 mb-3 mt-4">
                      <i class="fa fa-info-circle me-2 text-info"></i> Recruitment Welcome &amp; Reservation Policy Banner
                    </h5>

                    <div class="row g-3 mb-4">
                      <div class="col-12">
                        <label class="form-label fw-semibold small">Intro Box Title</label>
                        <input type="text" name="intro_title" class="form-control" value="<?php echo htmlspecialchars($pageInfo['intro_title'] ?? ''); ?>">
                      </div>
                      <div class="col-12">
                        <label class="form-label fw-semibold small">Intro Box &amp; Reservation Policy Text</label>
                        <textarea name="intro_text" class="form-control" rows="4"><?php echo htmlspecialchars($pageInfo['intro_text'] ?? ''); ?></textarea>
                        <small class="text-muted">This notice informs candidates about recruitment guidelines and Government of Madhya Pradesh reservation policies.</small>
                      </div>
                    </div>

                  </div><!-- end TAB 1 -->

                  <!-- TAB 2: SEO & Meta Details -->
                  <div class="tab-pane fade" id="pane-car-seo" role="tabpanel">

                    <!-- Google SERP Live Snippet Preview Box -->
                    <div class="card mb-4 border-0 shadow-sm" style="background: #f8fafc; border: 1.5px solid #e2e8f0; border-radius: 14px;">
                      <div class="card-body p-4">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                          <h6 class="fw-bold text-dark mb-0"><i class="fa-brands fa-google text-danger me-2"></i>Google Search Result (SERP Live Preview)</h6>
                          <span class="badge bg-light text-secondary border px-3 py-1">Desktop &amp; Mobile SERP</span>
                        </div>

                        <div class="p-3 bg-white rounded border" style="max-width: 650px; font-family: arial, sans-serif;">
                          <div class="d-flex align-items-center gap-2 mb-1" style="font-size: 13px; color: #202124;">
                            <img src="../assets/images/logo/logo.jpg" alt="Google Favicon" width="18" height="18" class="rounded-circle border">
                            <div>
                              <span class="fw-semibold">Sri Satya Sai University</span>
                              <span class="text-muted ms-1" style="font-size: 12px;">https://sssutms.co.in › Career</span>
                            </div>
                          </div>
                          <h5 id="seoPreviewTitleCar" class="fw-normal mb-1 text-primary" style="color: #1a0dab !important; font-size: 20px; line-height: 1.3; cursor: pointer;">
                            <?php echo htmlspecialchars(!empty($pageInfo['meta_title']) ? $pageInfo['meta_title'] : ($pageInfo['page_title'] ?? 'Career Opportunities & Faculty Recruitment - SSSUTMS')); ?>
                          </h5>
                          <p id="seoPreviewDescCar" class="mb-0 text-muted" style="color: #4d5156 !important; font-size: 14px; line-height: 1.58;">
                            <?php echo htmlspecialchars(!empty($pageInfo['meta_description']) ? $pageInfo['meta_description'] : 'Explore teaching, research, administrative, and healthcare job vacancies at Sri Satya Sai University of Technology & Medical Sciences (SSSUTMS), Sehore.'); ?>
                          </p>
                        </div>
                      </div>
                    </div>

                    <!-- SEO Form Fields -->
                    <div class="row g-3">
                      <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                          <label class="form-label small fw-bold mb-0">
                            <i class="fa-solid fa-heading text-primary me-1"></i> SEO Meta Title (Title Tag)
                          </label>
                          <small class="text-muted"><span id="metaTitleCountCar">0</span> / 60 chars <span class="badge bg-secondary ms-1">Recommended: 50-60</span></small>
                        </div>
                        <input type="text" name="meta_title" id="seoInputTitleCar" class="form-control" value="<?php echo htmlspecialchars($pageInfo['meta_title'] ?? ''); ?>" placeholder="e.g. Career Opportunities &amp; Faculty Recruitment | Sri Satya Sai University (SSSUTMS)" oninput="updateSeoPreviewCar()">
                        <small class="text-muted">Displayed as the main clickable headline in Google search results and browser tab.</small>
                      </div>

                      <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                          <label class="form-label small fw-bold mb-0">
                            <i class="fa-solid fa-align-left text-success me-1"></i> SEO Meta Description
                          </label>
                          <small class="text-muted"><span id="metaDescCountCar">0</span> / 160 chars <span class="badge bg-secondary ms-1">Recommended: 150-160</span></small>
                        </div>
                        <textarea name="meta_description" id="seoInputDescCar" class="form-control" rows="3" placeholder="Provide a compelling 150-160 character description of this page for Google search snippets..." oninput="updateSeoPreviewCar()"><?php echo htmlspecialchars($pageInfo['meta_description'] ?? ''); ?></textarea>
                        <small class="text-muted">Google snippet description to entice prospective applicants and faculty candidates to click.</small>
                      </div>

                      <div class="col-md-6">
                        <label class="form-label small fw-bold">
                          <i class="fa-solid fa-tags text-warning me-1"></i> Target SEO Keywords (Comma Separated)
                        </label>
                        <input type="text" name="meta_keywords" class="form-control" value="<?php echo htmlspecialchars($pageInfo['meta_keywords'] ?? ''); ?>" placeholder="e.g. SSSUTMS Career, Faculty Recruitment, Teaching Jobs Sehore">
                        <small class="text-muted">Target keywords for search engine discovery and category relevance.</small>
                      </div>

                      <div class="col-md-6">
                        <label class="form-label small fw-bold">
                          <i class="fa-solid fa-link text-info me-1"></i> Canonical URL Override (Optional)
                        </label>
                        <input type="text" name="canonical_url" class="form-control" value="<?php echo htmlspecialchars($pageInfo['canonical_url'] ?? ''); ?>" placeholder="Leave blank for automatic canonical URL">
                        <small class="text-muted">Preferred canonical page link for duplicate prevention.</small>
                      </div>

                      <div class="col-12">
                        <label class="form-label small fw-bold">
                          <i class="fa-solid fa-image text-danger me-1"></i> Social Sharing Preview Image (og:image)
                        </label>
                        <div class="input-group">
                          <span class="input-group-text bg-light"><i class="fa fa-share-nodes"></i></span>
                          <input type="text" name="og_image" class="form-control" value="<?php echo htmlspecialchars($pageInfo['og_image'] ?? 'assets/images/logo/logo.jpg'); ?>" placeholder="e.g. assets/images/logo/logo.jpg">
                        </div>
                        <small class="text-muted">Image shown when page link is shared on WhatsApp, Facebook, LinkedIn, Twitter.</small>
                      </div>
                    </div>

                  </div><!-- end TAB 2 -->
                </div>

                <!-- Sticky / Prominent Save Bar -->
                <div class="d-flex align-items-center justify-content-between pt-3 border-top mt-4 flex-wrap gap-2">
                  <div class="small text-muted">
                    <i class="fa fa-circle-check text-success me-1"></i> Changes will immediately update the live public website and search engine tags.
                  </div>
                  <button type="submit" class="btn btn-primary px-5 py-2 fw-bold shadow-sm">
                    <i class="fa fa-floppy-disk me-1"></i> Save Page Changes
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <!-- TAB 3: Announcements & Guidelines -->
        <div class="tab-pane fade" id="announcements-pane" role="tabpanel">
          <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
            <div>
              <h5 class="fw-bold text-dark mb-1">Recruitment Announcements &amp; Guidelines</h5>
              <p class="text-muted small mb-0">General rules, eligibility criteria, and reservation policy notifications.</p>
            </div>
            <button class="btn btn-warning text-dark fw-bold rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#announcementModal" onclick="resetAnnForm()">
              <i class="fa fa-plus-circle me-1"></i> Add Announcement
            </button>
          </div>

          <div class="table-responsive">
            <table class="table table-hover align-middle custom-table mb-0 border">
              <thead>
                <tr>
                  <th>Title &amp; Subject</th>
                  <th>Category</th>
                  <th>Date</th>
                  <th>Attachment</th>
                  <th>Status</th>
                  <th class="text-end" style="width: 140px;">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php if (empty($announcements)): ?>
                  <tr>
                    <td colspan="6" class="text-center py-4 text-muted">No announcements found.</td>
                  </tr>
                <?php else: ?>
                  <?php foreach ($announcements as $ann): 
                    $annJson = htmlspecialchars(json_encode($ann), ENT_QUOTES, 'UTF-8');
                    $fileUrl = !empty($ann['file']) ? base_url($ann['file']) : '';
                  ?>
                  <tr>
                    <td>
                      <div class="fw-bold text-dark"><?php echo htmlspecialchars($ann['title']); ?></div>
                    </td>
                    <td>
                      <span class="badge bg-secondary-subtle text-secondary"><?php echo htmlspecialchars($ann['category'] ?? 'Notice'); ?></span>
                    </td>
                    <td>
                      <span class="small text-muted"><?php echo htmlspecialchars($ann['date'] ?? '—'); ?></span>
                    </td>
                    <td>
                      <?php if (!empty($fileUrl)): ?>
                        <a href="<?php echo htmlspecialchars($fileUrl); ?>" target="_blank" class="btn btn-sm btn-outline-danger rounded-pill px-3">
                          <i class="fa fa-file-pdf me-1"></i> View PDF
                        </a>
                      <?php else: ?>
                        <span class="text-muted small">—</span>
                      <?php endif; ?>
                    </td>
                    <td>
                      <?php if (($ann['status'] ?? 'Active') === 'Active'): ?>
                        <span class="badge bg-success-subtle text-success">Active</span>
                      <?php else: ?>
                        <span class="badge bg-secondary-subtle text-secondary">Inactive</span>
                      <?php endif; ?>
                    </td>
                    <td class="text-end">
                      <button class="btn btn-outline-primary btn-sm rounded-circle me-1" onclick="editAnnouncement(<?php echo $annJson; ?>)">
                        <i class="fa fa-pencil"></i>
                      </button>
                      <a href="career.php?action=delete_announcement&id=<?php echo urlencode($ann['id']); ?>" class="btn btn-outline-danger btn-sm rounded-circle" onclick="return confirm('Delete this announcement?');">
                        <i class="fa fa-trash"></i>
                      </a>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>

        <!-- TAB 4: Recruitment Events -->
        <div class="tab-pane fade" id="events-pane" role="tabpanel">
          <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
            <div>
              <h5 class="fw-bold text-dark mb-1">Walk-In Interviews &amp; Selection Drives</h5>
              <p class="text-muted small mb-0">Schedule campus interview dates, venue details, and candidate requirements.</p>
            </div>
            <button class="btn btn-info text-white fw-bold rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#eventModal" onclick="resetEventForm()">
              <i class="fa fa-plus-circle me-1"></i> Schedule Walk-In Drive
            </button>
          </div>

          <div class="table-responsive">
            <table class="table table-hover align-middle custom-table mb-0 border">
              <thead>
                <tr>
                  <th>Drive / Event Title</th>
                  <th>Date &amp; Schedule</th>
                  <th>Venue / Location</th>
                  <th>Description</th>
                  <th>Status</th>
                  <th class="text-end" style="width: 140px;">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php if (empty($events)): ?>
                  <tr>
                    <td colspan="6" class="text-center py-4 text-muted">No recruitment events scheduled.</td>
                  </tr>
                <?php else: ?>
                  <?php foreach ($events as $ev): 
                    $evJson = htmlspecialchars(json_encode($ev), ENT_QUOTES, 'UTF-8');
                  ?>
                  <tr>
                    <td>
                      <div class="fw-bold text-dark"><?php echo htmlspecialchars($ev['title']); ?></div>
                    </td>
                    <td>
                      <span class="badge bg-primary-subtle text-primary"><i class="fa fa-calendar-days me-1"></i><?php echo htmlspecialchars($ev['date'] ?? '—'); ?></span>
                    </td>
                    <td>
                      <span class="small text-muted"><i class="fa fa-location-dot me-1 text-danger"></i><?php echo htmlspecialchars($ev['venue'] ?? 'SSSUTMS Campus'); ?></span>
                    </td>
                    <td>
                      <div class="small text-muted" style="max-width: 250px; text-overflow: ellipsis; white-space: nowrap; overflow: hidden;">
                        <?php echo htmlspecialchars($ev['description'] ?? ''); ?>
                      </div>
                    </td>
                    <td>
                      <?php if (($ev['status'] ?? 'Active') === 'Active'): ?>
                        <span class="badge bg-success-subtle text-success">Active</span>
                      <?php else: ?>
                        <span class="badge bg-secondary-subtle text-secondary">Inactive</span>
                      <?php endif; ?>
                    </td>
                    <td class="text-end">
                      <button class="btn btn-outline-primary btn-sm rounded-circle me-1" onclick="editEvent(<?php echo $evJson; ?>)">
                        <i class="fa fa-pencil"></i>
                      </button>
                      <a href="career.php?action=delete_event&id=<?php echo urlencode($ev['id']); ?>" class="btn btn-outline-danger btn-sm rounded-circle" onclick="return confirm('Delete this recruitment drive?');">
                        <i class="fa fa-trash"></i>
                      </a>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>

</main>

<!-- Modal 1: Add / Edit Job Opening -->
<div class="modal fade" id="openingModal" tabindex="-1" aria-labelledby="openingModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content border-0 shadow">
      <form action="career.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="action" value="save_opening">
        <input type="hidden" name="opening_id" id="op_id" value="">
        <input type="hidden" name="existing_image" id="op_existing_image" value="">
        <input type="hidden" name="existing_file" id="op_existing_file" value="">

        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title fw-bold" id="openingModalLabel"><i class="fa fa-briefcase me-2"></i> Add Job Opening</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body p-4">
          <div class="row g-3">
            <div class="col-md-8">
              <label class="form-label fw-semibold small">Job / Recruitment Title <span class="text-danger">*</span></label>
              <input type="text" name="title" id="op_title" class="form-control" placeholder="e.g. School of Pharmacy – Faculty Recruitment" required>
            </div>
            <div class="col-md-4">
              <label class="form-label fw-semibold small">Notification Date</label>
              <input type="date" name="date" id="op_date" class="form-control" value="<?php echo date('Y-m-d'); ?>">
            </div>

            <div class="col-md-6">
              <label class="form-label fw-semibold small">Badge Label</label>
              <input type="text" name="badge" id="op_badge" class="form-control" placeholder="e.g. Faculty Position, Medical Faculty">
            </div>
            <div class="col-md-3">
              <label class="form-label fw-semibold small">Badge Color</label>
              <select name="badge_color" id="op_badge_color" class="form-select">
                <option value="primary">Primary (Blue)</option>
                <option value="success">Success (Green)</option>
                <option value="danger">Danger (Red)</option>
                <option value="warning">Warning (Orange)</option>
                <option value="info">Info (Cyan)</option>
                <option value="secondary">Secondary (Gray)</option>
                <option value="dark">Dark (Black)</option>
              </select>
            </div>
            <div class="col-md-3">
              <label class="form-label fw-semibold small">Status</label>
              <select name="status" id="op_status" class="form-select">
                <option value="Active">Active (Visible)</option>
                <option value="Inactive">Inactive (Hidden)</option>
              </select>
            </div>

            <div class="col-12">
              <label class="form-label fw-semibold small">Short Description / Eligibility Highlights</label>
              <textarea name="description" id="op_description" class="form-control" rows="2" placeholder="Applications invited for Professors, Associate Professors & Assistant Professors..."></textarea>
            </div>

            <!-- Upload Image / Poster -->
            <div class="col-md-6">
              <label class="form-label fw-semibold small">Advertisement Poster / Image</label>
              <input type="file" name="opening_image" class="form-control" accept=".jpg,.jpeg,.png,.webp">
              <small class="text-muted d-block mt-1" id="op_img_preview_text">Select image to replace existing.</small>
            </div>

            <!-- Upload PDF / Attachment -->
            <div class="col-md-6">
              <label class="form-label fw-semibold small">Full Notification PDF / Document</label>
              <input type="file" name="opening_pdf" class="form-control" accept=".pdf,.doc,.docx">
              <small class="text-muted d-block mt-1" id="op_pdf_preview_text">Select PDF if separate from image.</small>
            </div>

            <!-- Action Button 1 -->
            <div class="col-12 mt-4">
              <h6 class="fw-bold text-dark border-bottom pb-2">
                <i class="fa fa-hand-pointer me-1 text-primary"></i> Action Button 1 (Primary)
              </h6>
            </div>
            <div class="col-md-4">
              <label class="form-label small">Button 1 Label</label>
              <input type="text" name="btn1_label" id="op_btn1_label" class="form-control" placeholder="e.g. View Full Advertisement / Download PDF">
            </div>
            <div class="col-md-5">
              <label class="form-label small">Button 1 Target URL / Path</label>
              <input type="text" name="btn1_url" id="op_btn1_url" class="form-control" placeholder="assets/images/... (auto uses uploaded file if empty)">
            </div>
            <div class="col-md-3">
              <label class="form-label small">Icon</label>
              <select name="btn1_icon" id="op_btn1_icon" class="form-select">
                <option value="fa-expand">fa-expand (View/Poster)</option>
                <option value="fa-file-pdf">fa-file-pdf (PDF Document)</option>
                <option value="fa-download">fa-download (Download)</option>
                <option value="fa-arrow-right">fa-arrow-right (Link)</option>
              </select>
            </div>

            <!-- Action Button 2 -->
            <div class="col-12 mt-3">
              <h6 class="fw-bold text-dark border-bottom pb-2">
                <i class="fa fa-hand-pointer me-1 text-secondary"></i> Action Button 2 (Optional Secondary Button)
              </h6>
            </div>
            <div class="col-md-4">
              <label class="form-label small">Button 2 Label</label>
              <input type="text" name="btn2_label" id="op_btn2_label" class="form-control" placeholder="e.g. View Poster">
            </div>
            <div class="col-md-5">
              <label class="form-label small">Button 2 Target URL / Path</label>
              <input type="text" name="btn2_url" id="op_btn2_url" class="form-control" placeholder="assets/images/...">
            </div>
            <div class="col-md-3">
              <label class="form-label small">Icon</label>
              <select name="btn2_icon" id="op_btn2_icon" class="form-select">
                <option value="fa-image">fa-image (Image Poster)</option>
                <option value="fa-file-pdf">fa-file-pdf (PDF Document)</option>
                <option value="fa-expand">fa-expand (View/Poster)</option>
                <option value="fa-download">fa-download (Download)</option>
              </select>
            </div>

          </div>
        </div>

        <div class="modal-footer bg-light">
          <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary rounded-pill px-4">
            <i class="fa fa-save me-1"></i> Save Job Opening
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal 2: Add / Edit Announcement -->
<div class="modal fade" id="announcementModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow">
      <form action="career.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="action" value="save_announcement">
        <input type="hidden" name="ann_id" id="ann_id" value="">
        <input type="hidden" name="existing_file" id="ann_existing_file" value="">

        <div class="modal-header bg-warning text-dark">
          <h5 class="modal-title fw-bold" id="annModalLabel"><i class="fa fa-bullhorn me-2"></i> Add Announcement</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body p-4">
          <div class="row g-3">
            <div class="col-12">
              <label class="form-label fw-semibold small">Announcement Title <span class="text-danger">*</span></label>
              <input type="text" name="title" id="ann_title" class="form-control" required placeholder="e.g. General Instructions & Qualification Criteria">
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold small">Category</label>
              <input type="text" name="category" id="ann_category" class="form-control" placeholder="e.g. Statutory Notice, Guidelines">
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold small">Date</label>
              <input type="date" name="date" id="ann_date" class="form-control" value="<?php echo date('Y-m-d'); ?>">
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold small">Upload Notification PDF</label>
              <input type="file" name="ann_file" class="form-control" accept=".pdf,.doc,.docx">
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold small">Status</label>
              <select name="status" id="ann_status" class="form-select">
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
              </select>
            </div>
          </div>
        </div>

        <div class="modal-footer bg-light">
          <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-warning text-dark fw-bold rounded-pill px-4">
            <i class="fa fa-save me-1"></i> Save Announcement
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal 3: Add / Edit Event -->
<div class="modal fade" id="eventModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow">
      <form action="career.php" method="POST">
        <input type="hidden" name="action" value="save_event">
        <input type="hidden" name="event_id" id="ev_id" value="">

        <div class="modal-header bg-info text-white">
          <h5 class="modal-title fw-bold" id="eventModalLabel"><i class="fa fa-calendar-check me-2"></i> Schedule Walk-In Drive</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body p-4">
          <div class="row g-3">
            <div class="col-12">
              <label class="form-label fw-semibold small">Drive Title <span class="text-danger">*</span></label>
              <input type="text" name="title" id="ev_title" class="form-control" required placeholder="e.g. Walk-In Interview Drive for Clinical Faculty">
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold small">Date of Drive</label>
              <input type="date" name="date" id="ev_date" class="form-control" value="<?php echo date('Y-m-d'); ?>">
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold small">Status</label>
              <select name="status" id="ev_status" class="form-select">
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
              </select>
            </div>
            <div class="col-12">
              <label class="form-label fw-semibold small">Venue / Room / Building</label>
              <input type="text" name="venue" id="ev_venue" class="form-control" placeholder="Administrative Block, SSSUTMS Campus, Sehore">
            </div>
            <div class="col-12">
              <label class="form-label fw-semibold small">Description &amp; Candidate Guidelines</label>
              <textarea name="description" id="ev_desc" class="form-control" rows="3" placeholder="Candidates should bring original documents, copies of certificates, and 2 passport photos."></textarea>
            </div>
          </div>
        </div>

        <div class="modal-footer bg-light">
          <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-info text-white fw-bold rounded-pill px-4">
            <i class="fa fa-save me-1"></i> Save Drive Details
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Sidebar Toggle
const toggleBtn = document.querySelector('.admin-sidebar-toggle');
const closeBtn = document.querySelector('.sidebar-close-btn');
const sidebar = document.querySelector('.admin-sidebar');
if (toggleBtn && sidebar) {
  toggleBtn.addEventListener('click', () => sidebar.classList.add('show'));
}
if (closeBtn && sidebar) {
  closeBtn.addEventListener('click', () => sidebar.classList.remove('show'));
}

// Reset Opening Modal
function resetOpeningForm() {
  document.getElementById('openingModalLabel').innerHTML = '<i class="fa fa-briefcase me-2"></i> Add Job Opening';
  document.getElementById('op_id').value = '';
  document.getElementById('op_existing_image').value = '';
  document.getElementById('op_existing_file').value = '';
  document.getElementById('op_title').value = '';
  document.getElementById('op_date').value = '<?php echo date('Y-m-d'); ?>';
  document.getElementById('op_badge').value = 'Faculty Position';
  document.getElementById('op_badge_color').value = 'primary';
  document.getElementById('op_status').value = 'Active';
  document.getElementById('op_description').value = '';
  document.getElementById('op_btn1_label').value = 'View Full Advertisement';
  document.getElementById('op_btn1_url').value = '';
  document.getElementById('op_btn1_icon').value = 'fa-expand';
  document.getElementById('op_btn2_label').value = '';
  document.getElementById('op_btn2_url').value = '';
  document.getElementById('op_btn2_icon').value = 'fa-image';
  document.getElementById('op_img_preview_text').innerText = 'Select image poster to upload.';
  document.getElementById('op_pdf_preview_text').innerText = 'Select PDF attachment (optional).';
}

// Edit Opening Modal
function editOpening(op) {
  document.getElementById('openingModalLabel').innerHTML = '<i class="fa fa-pencil me-2"></i> Edit Job Opening';
  document.getElementById('op_id').value = op.id || '';
  document.getElementById('op_existing_image').value = op.image || '';
  document.getElementById('op_existing_file').value = op.file || '';
  document.getElementById('op_title').value = op.title || '';
  document.getElementById('op_date').value = op.date || '<?php echo date('Y-m-d'); ?>';
  document.getElementById('op_badge').value = op.badge || '';
  document.getElementById('op_badge_color').value = op.badge_color || 'primary';
  document.getElementById('op_status').value = op.status || 'Active';
  document.getElementById('op_description').value = op.description || '';

  if (op.image) {
    document.getElementById('op_img_preview_text').innerText = 'Current: ' + op.image;
  } else {
    document.getElementById('op_img_preview_text').innerText = 'No image currently attached.';
  }

  if (op.file) {
    document.getElementById('op_pdf_preview_text').innerText = 'Current: ' + op.file;
  } else {
    document.getElementById('op_pdf_preview_text').innerText = 'No PDF currently attached.';
  }

  const buttons = op.buttons || [];
  if (buttons.length > 0) {
    document.getElementById('op_btn1_label').value = buttons[0].label || '';
    document.getElementById('op_btn1_url').value = buttons[0].url || '';
    document.getElementById('op_btn1_icon').value = buttons[0].icon || 'fa-expand';
  } else {
    document.getElementById('op_btn1_label').value = '';
    document.getElementById('op_btn1_url').value = '';
  }

  if (buttons.length > 1) {
    document.getElementById('op_btn2_label').value = buttons[1].label || '';
    document.getElementById('op_btn2_url').value = buttons[1].url || '';
    document.getElementById('op_btn2_icon').value = buttons[1].icon || 'fa-image';
  } else {
    document.getElementById('op_btn2_label').value = '';
    document.getElementById('op_btn2_url').value = '';
  }

  const modal = new bootstrap.Modal(document.getElementById('openingModal'));
  modal.show();
}

// Reset Announcement Modal
function resetAnnForm() {
  document.getElementById('annModalLabel').innerHTML = '<i class="fa fa-bullhorn me-2"></i> Add Announcement';
  document.getElementById('ann_id').value = '';
  document.getElementById('ann_existing_file').value = '';
  document.getElementById('ann_title').value = '';
  document.getElementById('ann_category').value = 'General Notice';
  document.getElementById('ann_date').value = '<?php echo date('Y-m-d'); ?>';
  document.getElementById('ann_status').value = 'Active';
}

// Edit Announcement Modal
function editAnnouncement(ann) {
  document.getElementById('annModalLabel').innerHTML = '<i class="fa fa-pencil me-2"></i> Edit Announcement';
  document.getElementById('ann_id').value = ann.id || '';
  document.getElementById('ann_existing_file').value = ann.file || '';
  document.getElementById('ann_title').value = ann.title || '';
  document.getElementById('ann_category').value = ann.category || '';
  document.getElementById('ann_date').value = ann.date || '<?php echo date('Y-m-d'); ?>';
  document.getElementById('ann_status').value = ann.status || 'Active';

  const modal = new bootstrap.Modal(document.getElementById('announcementModal'));
  modal.show();
}

// Reset Event Modal
function resetEventForm() {
  document.getElementById('eventModalLabel').innerHTML = '<i class="fa fa-calendar-check me-2"></i> Schedule Walk-In Drive';
  document.getElementById('ev_id').value = '';
  document.getElementById('ev_title').value = '';
  document.getElementById('ev_date').value = '<?php echo date('Y-m-d'); ?>';
  document.getElementById('ev_venue').value = 'SSSUTMS Campus, Sehore';
  document.getElementById('ev_desc').value = '';
  document.getElementById('ev_status').value = 'Active';
}

// Edit Event Modal
function editEvent(ev) {
  document.getElementById('eventModalLabel').innerHTML = '<i class="fa fa-pencil me-2"></i> Edit Walk-In Drive';
  document.getElementById('ev_id').value = ev.id || '';
  document.getElementById('ev_title').value = ev.title || '';
  document.getElementById('ev_date').value = ev.date || '<?php echo date('Y-m-d'); ?>';
  document.getElementById('ev_venue').value = ev.venue || '';
  document.getElementById('ev_desc').value = ev.description || '';
  document.getElementById('ev_status').value = ev.status || 'Active';

  const modal = new bootstrap.Modal(document.getElementById('eventModal'));
  modal.show();
}

// SEO Live Preview & Counter for Career Page
function updateSeoPreviewCar() {
  const titleInput = document.getElementById('seoInputTitleCar');
  const descInput = document.getElementById('seoInputDescCar');
  const previewTitle = document.getElementById('seoPreviewTitleCar');
  const previewDesc = document.getElementById('seoPreviewDescCar');
  const titleCount = document.getElementById('metaTitleCountCar');
  const descCount = document.getElementById('metaDescCountCar');

  if (titleInput && previewTitle) {
    const val = titleInput.value.trim();
    previewTitle.textContent = val ? val : 'Career Opportunities & Faculty Recruitment - SSSUTMS';
    if (titleCount) {
      titleCount.textContent = titleInput.value.length;
      titleCount.className = (titleInput.value.length > 60) ? 'text-danger fw-bold' : 'text-success fw-bold';
    }
  }

  if (descInput && previewDesc) {
    const val = descInput.value.trim();
    previewDesc.textContent = val ? val : 'Explore teaching, research, administrative, and healthcare job vacancies at Sri Satya Sai University of Technology & Medical Sciences (SSSUTMS), Sehore.';
    if (descCount) {
      descCount.textContent = descInput.value.length;
      descCount.className = (descInput.value.length > 160) ? 'text-danger fw-bold' : 'text-success fw-bold';
    }
  }
}

document.addEventListener('DOMContentLoaded', function() {
  updateSeoPreviewCar();
});
</script>

</body>
</html>
