<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/itep_helper.php';
require_admin_auth();

$msg = '';
$error = '';

// Handle Page Info Save
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'save_page_info') {
    $infoData = [
        'page_title'          => clean_input($_POST['page_title'] ?? 'ITEP - SSSUTMS'),
        'banner_title'        => clean_input($_POST['banner_title'] ?? 'Integrated Teacher Education Programme (ITEP)'),
        'banner_category'     => clean_input($_POST['banner_category'] ?? 'I T E P'),
        'card_title'          => clean_input($_POST['card_title'] ?? 'ITEP'),
        'card_icon'           => clean_input($_POST['card_icon'] ?? 'fa-graduation-cap'),
        'program_heading'     => clean_input($_POST['program_heading'] ?? 'Integrated Teacher Education Programme'),
        'program_description' => trim($_POST['program_description'] ?? ''),
        'button_label'        => clean_input($_POST['button_label'] ?? 'Faculty of Education'),
        'button_url'          => clean_input($_POST['button_url'] ?? 'About/Faculty_of_Education.php'),
        'button_icon'         => clean_input($_POST['button_icon'] ?? 'fa-link'),
        'center_icon'         => clean_input($_POST['center_icon'] ?? 'fa-university'),
        'meta_title'          => clean_input($_POST['meta_title'] ?? ''),
        'meta_description'    => clean_input($_POST['meta_description'] ?? ''),
        'meta_keywords'       => clean_input($_POST['meta_keywords'] ?? ''),
        'canonical_url'       => clean_input($_POST['canonical_url'] ?? ''),
        'og_image'            => clean_input($_POST['og_image'] ?? 'assets/images/logo/logo.jpg')
    ];
    if (save_itep_page_info($infoData)) {
        $msg = 'ITEP page content, SEO meta tags & program information updated successfully!';
    } else {
        $error = 'Failed to update page information.';
    }
}

// Handle Save Announcement
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'save_announcement') {
    $annId = !empty($_POST['ann_id']) ? clean_input($_POST['ann_id']) : ('itep_ann_' . date('Ymd_His'));
    $title = clean_input($_POST['title'] ?? '');
    $category = clean_input($_POST['category'] ?? 'General Notice');
    $date = clean_input($_POST['date'] ?? date('Y-m-d'));
    $status = clean_input($_POST['status'] ?? 'Active');
    $filePath = trim($_POST['existing_file'] ?? 'About/Faculty_of_Education.php');

    if (isset($_FILES['ann_file']) && $_FILES['ann_file']['error'] === UPLOAD_ERR_OK) {
        $allowed = ['pdf', 'doc', 'docx'];
        $origName = $_FILES['ann_file']['name'];
        $ext = strtolower(pathinfo($origName, PATHINFO_EXTENSION));
        if (in_array($ext, $allowed)) {
            $destDir = __DIR__ . '/../assets/uploads/documents';
            if (!is_dir($destDir)) {
                mkdir($destDir, 0777, true);
            }
            $newDocName = 'itep_doc_' . time() . '_' . preg_replace('/[^a-zA-Z0-9_-]/', '_', pathinfo($origName, PATHINFO_FILENAME)) . '.' . $ext;
            if (move_uploaded_file($_FILES['ann_file']['tmp_name'], $destDir . '/' . $newDocName)) {
                $filePath = 'assets/uploads/documents/' . $newDocName;
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
        save_itep_announcement($item);
        $msg = 'ITEP announcement / disclosure saved successfully!';
    } else {
        $error = 'Announcement Title is required.';
    }
}

// Handle Delete Announcement
if (isset($_GET['action']) && $_GET['action'] === 'delete_announcement' && isset($_GET['id'])) {
    $delId = clean_input($_GET['id']);
    delete_itep_announcement($delId);
    $msg = 'ITEP announcement removed successfully.';
}

// Handle Save Event
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'save_event') {
    $eventId = !empty($_POST['event_id']) ? clean_input($_POST['event_id']) : ('itep_ev_' . date('Ymd_His'));
    $title = clean_input($_POST['title'] ?? '');
    $date = clean_input($_POST['date'] ?? date('Y-m-d'));
    $venue = clean_input($_POST['venue'] ?? 'Faculty of Education Seminar Hall');
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
        save_itep_event($item);
        $msg = 'ITEP workshop/event saved successfully!';
    } else {
        $error = 'Event Title is required.';
    }
}

// Handle Delete Event
if (isset($_GET['action']) && $_GET['action'] === 'delete_event' && isset($_GET['id'])) {
    $delId = clean_input($_GET['id']);
    delete_itep_event($delId);
    $msg = 'ITEP event removed successfully.';
}

$pageInfo = get_itep_page_info();
$announcements = get_itep_announcements();
$events = get_itep_events();

$totalAnnouncements = count($announcements);
$totalEvents = count($events);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage ITEP Cell - SSSUTMS Admin</title>
  <link rel="icon" type="image/jpeg" href="../assets/images/logo/logo.jpg">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/admin.css">
  <style>
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
    .preview-box {
      background: #f8fafc;
      border: 1.5px dashed #cbd5e1;
      border-radius: 12px;
      padding: 2rem;
      text-align: center;
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
    <li><a href="career.php" class="nav-link"><i class="fa fa-briefcase"></i> Career &amp; Recruitment</a></li>
    <li><a href="contact.php" class="nav-link"><i class="fa fa-phone-volume"></i> Contact &amp; Helpdesk</a></li>
    <li><a href="itep.php" class="nav-link active"><i class="fa fa-graduation-cap"></i> ITEP Cell</a></li>
    <li><a href="gallery.php" class="nav-link"><i class="fa fa-camera-retro"></i> Photo &amp; Video Gallery</a></li>
    <li><a href="downloads.php" class="nav-link"><i class="fa fa-folder-arrow-down"></i> Curriculum &amp; Downloads (52)</a></li>
    <li><a href="applications.php" class="nav-link"><i class="fa fa-user-graduate"></i> Student Registrations</a></li>
    <li><a href="inquiries.php" class="nav-link"><i class="fa fa-envelope-open-text"></i> Admission Leads</a></li>
    <li><a href="settings.php" class="nav-link"><i class="fa fa-sliders"></i> Portal Settings</a></li>
    <li class="mt-4 pt-3 border-top border-white border-opacity-10">
      <a href="../ITEP/index.php" target="_blank" class="nav-link text-white-50"><i class="fa fa-arrow-up-right-from-square"></i> View Live ITEP Page</a>
    </li>
    <li><a href="logout.php" class="nav-link text-danger"><i class="fa fa-right-from-bracket"></i> Sign Out</a></li>
  </ul>
</aside>

<!-- Main Admin Content -->
<main class="admin-main">
  
  <header class="admin-topbar">
    <div class="d-flex align-items-center gap-3">
      <button class="admin-sidebar-toggle d-lg-none" type="button" aria-label="Toggle Navigation">
        <i class="fa fa-bars"></i>
      </button>
      <div>
        <h5 class="fw-bold text-dark mb-0">ITEP (Integrated Teacher Education Programme) Management</h5>
        <small class="text-muted">Dynamic Management for ITEP Program Links, NCTE Disclosures, Curriculum &amp; Pedagogical Workshops</small>
      </div>
    </div>
    <div class="d-flex align-items-center gap-2">
      <a href="../ITEP/index.php" target="_blank" class="btn btn-outline-primary btn-sm rounded-pill px-3">
        <i class="fa fa-external-link me-1"></i> Live ITEP View
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
            <span class="text-muted small fw-semibold">Program Status</span>
            <h4 class="fw-bold text-success mb-0 mt-1"><i class="fa fa-check-circle me-1"></i> NCTE Aligned</h4>
            <span class="small text-muted">NEP 2020 4-Year B.Ed.</span>
          </div>
          <div class="p-3 bg-success-subtle text-success rounded-3">
            <i class="fa fa-graduation-cap fa-2x"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card border-0 shadow-sm rounded-3 p-3 bg-white h-100">
        <div class="d-flex align-items-center justify-content-between">
          <div>
            <span class="text-muted small fw-semibold">ITEP Announcements</span>
            <h3 class="fw-bold text-warning mb-0 mt-1"><?php echo $totalAnnouncements; ?></h3>
            <span class="small text-muted">Disclosures &amp; updates</span>
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
            <span class="text-muted small fw-semibold">Teacher Workshops</span>
            <h3 class="fw-bold text-info mb-0 mt-1"><?php echo $totalEvents; ?></h3>
            <span class="small text-muted">Pedagogical events</span>
          </div>
          <div class="p-3 bg-info-subtle text-info rounded-3">
            <i class="fa fa-calendar-days fa-2x"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card border-0 shadow-sm rounded-3 p-3 bg-white h-100">
        <div class="d-flex align-items-center justify-content-between">
          <div>
            <span class="text-muted small fw-semibold">Linked Faculty</span>
            <h5 class="fw-bold text-primary mb-0 mt-1">Faculty of Education</h5>
            <a href="about.php?page=Faculty_of_Education" class="small text-decoration-none">Manage Full Page &rarr;</a>
          </div>
          <div class="p-3 bg-primary-subtle text-primary rounded-3">
            <i class="fa fa-university fa-2x"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Management Tabs -->
  <div class="card border-0 shadow-sm rounded-3">
    <div class="card-header bg-white border-bottom pt-3 pb-0">
      <ul class="nav nav-tabs border-bottom-0" id="itepTabs" role="tablist">
        <li class="nav-item">
          <button class="nav-link active" id="pageinfo-tab" data-bs-toggle="tab" data-bs-target="#pageinfo-pane" type="button" role="tab">
            <i class="fa fa-sliders me-2 text-primary"></i> Main ITEP Landing Card &amp; Redirect Link
          </button>
        </li>
        <li class="nav-item">
          <button class="nav-link" id="announcements-tab" data-bs-toggle="tab" data-bs-target="#announcements-pane" type="button" role="tab">
            <i class="fa fa-bullhorn me-2 text-warning"></i> Announcements &amp; NCTE Disclosures (<?php echo $totalAnnouncements; ?>)
          </button>
        </li>
        <li class="nav-item">
          <button class="nav-link" id="events-tab" data-bs-toggle="tab" data-bs-target="#events-pane" type="button" role="tab">
            <i class="fa fa-calendar-check me-2 text-info"></i> Teacher Workshops &amp; Events (<?php echo $totalEvents; ?>)
          </button>
        </li>
      </ul>
    </div>

    <div class="card-body p-4">
      <div class="tab-content" id="itepTabsContent">
        
        <!-- TAB 1: Page Content & Redirect Card -->
        <div class="tab-pane fade show active" id="pageinfo-pane" role="tabpanel">
          <div class="row justify-content-center">
            <div class="col-lg-11">
              <form action="itep.php" method="POST" class="card border rounded-3 p-4 shadow-sm bg-light mb-4">
                <input type="hidden" name="action" value="save_page_info">

                <!-- Tab Navigation Header for Page Info -->
                <ul class="nav nav-pills mb-4 gap-2 border-bottom pb-3" id="itepPageTabNav" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active fw-bold px-4 py-2" id="tab-itep-general" data-bs-toggle="pill" data-bs-target="#pane-itep-general" type="button" role="tab">
                      <i class="fa-solid fa-sliders me-2"></i>General Content &amp; Media
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link fw-bold px-4 py-2" id="tab-itep-seo" data-bs-toggle="pill" data-bs-target="#pane-itep-seo" type="button" role="tab" style="background: rgba(16,185,129,0.08); color: #047857; border: 1px solid rgba(16,185,129,0.3);">
                      <i class="fa-solid fa-magnifying-glass me-2"></i>SEO &amp; Meta Details <span class="badge bg-success ms-1">SEO</span>
                    </button>
                  </li>
                </ul>

                <div class="tab-content" id="itepPageTabContent">
                  <!-- TAB 1: General Content & Media -->
                  <div class="tab-pane fade show active" id="pane-itep-general" role="tabpanel">
                    
                    <h5 class="fw-bold text-dark border-bottom pb-2 mb-3">
                      <i class="fa fa-heading me-2 text-primary"></i> Page Meta Titles &amp; Top Banner
                    </h5>

                    <div class="row g-3 mb-4">
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
                        <label class="form-label fw-semibold small">Card Header Title</label>
                        <input type="text" name="card_title" class="form-control" value="<?php echo htmlspecialchars($pageInfo['card_title'] ?? 'ITEP'); ?>" required>
                      </div>
                    </div>

                    <h5 class="fw-bold text-dark border-bottom pb-2 mb-3">
                      <i class="fa fa-university me-2 text-info"></i> Central Program Card Content &amp; Action Link
                    </h5>

                    <div class="row g-3 mb-4">
                      <div class="col-md-9">
                        <label class="form-label fw-semibold small">Program Heading Title</label>
                        <input type="text" name="program_heading" class="form-control" value="<?php echo htmlspecialchars($pageInfo['program_heading'] ?? ''); ?>" required>
                      </div>
                      <div class="col-md-3">
                        <label class="form-label fw-semibold small">Center Icon (FontAwesome)</label>
                        <input type="text" name="center_icon" class="form-control" value="<?php echo htmlspecialchars($pageInfo['center_icon'] ?? 'fa-university'); ?>">
                      </div>
                      <div class="col-12">
                        <label class="form-label fw-semibold small">Program Summary Description</label>
                        <textarea name="program_description" class="form-control" rows="3" required><?php echo htmlspecialchars($pageInfo['program_description'] ?? ''); ?></textarea>
                      </div>
                      <div class="col-md-4">
                        <label class="form-label fw-semibold small">Action Button Label</label>
                        <input type="text" name="button_label" class="form-control" value="<?php echo htmlspecialchars($pageInfo['button_label'] ?? 'Faculty of Education'); ?>" required>
                      </div>
                      <div class="col-md-5">
                        <label class="form-label fw-semibold small">Target Action URL / Route</label>
                        <input type="text" name="button_url" class="form-control" value="<?php echo htmlspecialchars($pageInfo['button_url'] ?? 'About/Faculty_of_Education.php'); ?>" required>
                      </div>
                      <div class="col-md-3">
                        <label class="form-label fw-semibold small">Button Icon</label>
                        <input type="text" name="button_icon" class="form-control" value="<?php echo htmlspecialchars($pageInfo['button_icon'] ?? 'fa-link'); ?>">
                      </div>
                    </div>

                  </div><!-- end TAB 1 -->

                  <!-- TAB 2: SEO & Meta Details -->
                  <div class="tab-pane fade" id="pane-itep-seo" role="tabpanel">

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
                              <span class="text-muted ms-1" style="font-size: 12px;">https://sssutms.co.in › ITEP</span>
                            </div>
                          </div>
                          <h5 id="seoPreviewTitleItep" class="fw-normal mb-1 text-primary" style="color: #1a0dab !important; font-size: 20px; line-height: 1.3; cursor: pointer;">
                            <?php echo htmlspecialchars(!empty($pageInfo['meta_title']) ? $pageInfo['meta_title'] : ($pageInfo['page_title'] ?? 'ITEP - SSSUTMS')); ?>
                          </h5>
                          <p id="seoPreviewDescItep" class="mb-0 text-muted" style="color: #4d5156 !important; font-size: 14px; line-height: 1.58;">
                            <?php echo htmlspecialchars(!empty($pageInfo['meta_description']) ? $pageInfo['meta_description'] : 'Discover the 4-Year Integrated Teacher Education Programme (ITEP) at Sri Satya Sai University (SSSUTMS). NCTE approved dual-major educator degree.'); ?>
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
                          <small class="text-muted"><span id="metaTitleCountItep">0</span> / 60 chars <span class="badge bg-secondary ms-1">Recommended: 50-60</span></small>
                        </div>
                        <input type="text" name="meta_title" id="seoInputTitleItep" class="form-control" value="<?php echo htmlspecialchars($pageInfo['meta_title'] ?? ''); ?>" placeholder="e.g. ITEP - Integrated Teacher Education Programme | SSSUTMS" oninput="updateSeoPreviewItep()">
                        <small class="text-muted">Displayed as the main clickable headline in Google search results and browser tab.</small>
                      </div>

                      <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                          <label class="form-label small fw-bold mb-0">
                            <i class="fa-solid fa-align-left text-success me-1"></i> SEO Meta Description
                          </label>
                          <small class="text-muted"><span id="metaDescCountItep">0</span> / 160 chars <span class="badge bg-secondary ms-1">Recommended: 150-160</span></small>
                        </div>
                        <textarea name="meta_description" id="seoInputDescItep" class="form-control" rows="3" placeholder="Provide a compelling 150-160 character description of this page for Google search snippets..." oninput="updateSeoPreviewItep()"><?php echo htmlspecialchars($pageInfo['meta_description'] ?? ''); ?></textarea>
                        <small class="text-muted">Google snippet description to entice prospective education students and teacher candidates to click.</small>
                      </div>

                      <div class="col-md-6">
                        <label class="form-label small fw-bold">
                          <i class="fa-solid fa-tags text-warning me-1"></i> Target SEO Keywords (Comma Separated)
                        </label>
                        <input type="text" name="meta_keywords" class="form-control" value="<?php echo htmlspecialchars($pageInfo['meta_keywords'] ?? ''); ?>" placeholder="e.g. ITEP SSSUTMS, Integrated Teacher Education Programme, NCTE Approved BEd Sehore">
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

              <!-- Live Card Preview -->
              <div class="card border rounded-3 p-4 shadow-sm bg-white">
                <h6 class="fw-bold text-dark border-bottom pb-2 mb-3">
                  <i class="fa fa-eye me-2 text-success"></i> Live Public Card Preview
                </h6>
                <div class="preview-box">
                  <div style="width: 60px; height: 60px; line-height: 60px; border-radius: 50%; background: rgba(11,37,69,0.08); color: #0b2545; font-size: 1.6rem; margin: 0 auto 1rem; display: flex; align-items: center; justify-content: center;">
                    <i class="fa <?php echo htmlspecialchars($pageInfo['center_icon'] ?? 'fa-university'); ?>"></i>
                  </div>
                  <h5 class="fw-bold text-dark mb-2"><?php echo htmlspecialchars($pageInfo['program_heading'] ?? 'Integrated Teacher Education Programme'); ?></h5>
                  <p class="text-secondary small mb-3" style="max-width: 540px; margin: 0 auto;">
                    <?php echo htmlspecialchars($pageInfo['program_description'] ?? ''); ?>
                  </p>
                  <div>
                    <a href="<?php echo htmlspecialchars(base_url($pageInfo['button_url'] ?? 'About/Faculty_of_Education.php')); ?>" target="_blank" class="btn btn-dark fw-bold rounded-3 px-4 py-2">
                      <i class="fa <?php echo htmlspecialchars($pageInfo['button_icon'] ?? 'fa-link'); ?> me-1"></i> <?php echo htmlspecialchars($pageInfo['button_label'] ?? 'Faculty of Education'); ?>
                    </a>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>

        <!-- TAB 2: Announcements & NCTE Disclosures -->
        <div class="tab-pane fade" id="announcements-pane" role="tabpanel">
          <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
            <div>
              <h5 class="fw-bold text-dark mb-1">ITEP Announcements &amp; NCTE Disclosures</h5>
              <p class="text-muted small mb-0">Publish regulatory compliance documents, NCTE approval letters, and curriculum updates.</p>
            </div>
            <button class="btn btn-warning text-dark fw-bold rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#announcementModal" onclick="resetAnnForm()">
              <i class="fa fa-plus-circle me-1"></i> Add ITEP Announcement
            </button>
          </div>

          <div class="table-responsive">
            <table class="table table-hover align-middle custom-table mb-0 border">
              <thead>
                <tr>
                  <th>Title &amp; Subject</th>
                  <th>Category</th>
                  <th>Date</th>
                  <th>Attachment / Route</th>
                  <th>Status</th>
                  <th class="text-end" style="width: 140px;">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php if (empty($announcements)): ?>
                  <tr>
                    <td colspan="6" class="text-center py-4 text-muted">No ITEP announcements found.</td>
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
                        <a href="<?php echo htmlspecialchars($fileUrl); ?>" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-3">
                          <i class="fa fa-arrow-up-right-from-square me-1"></i> Open Link
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
                      <a href="itep.php?action=delete_announcement&id=<?php echo urlencode($ann['id']); ?>" class="btn btn-outline-danger btn-sm rounded-circle" onclick="return confirm('Delete this announcement?');">
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

        <!-- TAB 3: Workshops & Events -->
        <div class="tab-pane fade" id="events-pane" role="tabpanel">
          <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
            <div>
              <h5 class="fw-bold text-dark mb-1">Teacher Education Workshops &amp; Events</h5>
              <p class="text-muted small mb-0">Schedule pedagogical seminars, teacher training sessions, and student workshops.</p>
            </div>
            <button class="btn btn-info text-white fw-bold rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#eventModal" onclick="resetEventForm()">
              <i class="fa fa-plus-circle me-1"></i> Schedule Workshop
            </button>
          </div>

          <div class="table-responsive">
            <table class="table table-hover align-middle custom-table mb-0 border">
              <thead>
                <tr>
                  <th>Workshop / Event Title</th>
                  <th>Date</th>
                  <th>Venue</th>
                  <th>Description</th>
                  <th>Status</th>
                  <th class="text-end" style="width: 140px;">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php if (empty($events)): ?>
                  <tr>
                    <td colspan="6" class="text-center py-4 text-muted">No teacher workshops scheduled.</td>
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
                      <span class="small text-muted"><i class="fa fa-location-dot me-1 text-danger"></i><?php echo htmlspecialchars($ev['venue'] ?? 'Faculty of Education'); ?></span>
                    </td>
                    <td>
                      <div class="small text-muted" style="max-width: 260px; text-overflow: ellipsis; white-space: nowrap; overflow: hidden;">
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
                      <a href="itep.php?action=delete_event&id=<?php echo urlencode($ev['id']); ?>" class="btn btn-outline-danger btn-sm rounded-circle" onclick="return confirm('Delete this event?');">
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

<!-- Modal 1: Add / Edit Announcement -->
<div class="modal fade" id="announcementModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow">
      <form action="itep.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="action" value="save_announcement">
        <input type="hidden" name="ann_id" id="ann_id" value="">
        <input type="hidden" name="existing_file" id="ann_existing_file" value="">

        <div class="modal-header bg-warning text-dark">
          <h5 class="modal-title fw-bold" id="annModalLabel"><i class="fa fa-bullhorn me-2"></i> Add ITEP Announcement</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body p-4">
          <div class="row g-3">
            <div class="col-12">
              <label class="form-label fw-semibold small">Announcement / Disclosure Title <span class="text-danger">*</span></label>
              <input type="text" name="title" id="ann_title" class="form-control" required placeholder="e.g. NCTE Institutional Disclosures & Approvals">
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold small">Category</label>
              <input type="text" name="category" id="ann_category" class="form-control" placeholder="e.g. Regulatory Approval, Curriculum">
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold small">Date</label>
              <input type="date" name="date" id="ann_date" class="form-control" value="<?php echo date('Y-m-d'); ?>">
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold small">Upload PDF (Optional)</label>
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

<!-- Modal 2: Add / Edit Event -->
<div class="modal fade" id="eventModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow">
      <form action="itep.php" method="POST">
        <input type="hidden" name="action" value="save_event">
        <input type="hidden" name="event_id" id="ev_id" value="">

        <div class="modal-header bg-info text-white">
          <h5 class="modal-title fw-bold" id="eventModalLabel"><i class="fa fa-calendar-check me-2"></i> Schedule Teacher Workshop</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body p-4">
          <div class="row g-3">
            <div class="col-12">
              <label class="form-label fw-semibold small">Workshop Title <span class="text-danger">*</span></label>
              <input type="text" name="title" id="ev_title" class="form-control" required placeholder="e.g. National Workshop on NEP 2020 Pedagogical Practices">
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold small">Date</label>
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
              <label class="form-label fw-semibold small">Venue / Hall</label>
              <input type="text" name="venue" id="ev_venue" class="form-control" placeholder="Faculty of Education Seminar Hall, Campus">
            </div>
            <div class="col-12">
              <label class="form-label fw-semibold small">Description &amp; Highlights</label>
              <textarea name="description" id="ev_desc" class="form-control" rows="3" placeholder="Pedagogical strategies, active learning, and micro-teaching session."></textarea>
            </div>
          </div>
        </div>

        <div class="modal-footer bg-light">
          <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-info text-white fw-bold rounded-pill px-4">
            <i class="fa fa-save me-1"></i> Save Workshop
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

// Reset Announcement Modal
function resetAnnForm() {
  document.getElementById('annModalLabel').innerHTML = '<i class="fa fa-bullhorn me-2"></i> Add ITEP Announcement';
  document.getElementById('ann_id').value = '';
  document.getElementById('ann_existing_file').value = 'About/Faculty_of_Education.php';
  document.getElementById('ann_title').value = '';
  document.getElementById('ann_category').value = 'Regulatory Approval';
  document.getElementById('ann_date').value = '<?php echo date('Y-m-d'); ?>';
  document.getElementById('ann_status').value = 'Active';
}

// Edit Announcement Modal
function editAnnouncement(ann) {
  document.getElementById('annModalLabel').innerHTML = '<i class="fa fa-pencil me-2"></i> Edit ITEP Announcement';
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
  document.getElementById('eventModalLabel').innerHTML = '<i class="fa fa-calendar-check me-2"></i> Schedule Teacher Workshop';
  document.getElementById('ev_id').value = '';
  document.getElementById('ev_title').value = '';
  document.getElementById('ev_date').value = '<?php echo date('Y-m-d'); ?>';
  document.getElementById('ev_venue').value = 'Faculty of Education Seminar Hall, Campus';
  document.getElementById('ev_desc').value = '';
  document.getElementById('ev_status').value = 'Active';
}

// Edit Event Modal
function editEvent(ev) {
  document.getElementById('eventModalLabel').innerHTML = '<i class="fa fa-pencil me-2"></i> Edit Teacher Workshop';
  document.getElementById('ev_id').value = ev.id || '';
  document.getElementById('ev_title').value = ev.title || '';
  document.getElementById('ev_date').value = ev.date || '<?php echo date('Y-m-d'); ?>';
  document.getElementById('ev_venue').value = ev.venue || '';
  document.getElementById('ev_desc').value = ev.description || '';
  document.getElementById('ev_status').value = ev.status || 'Active';

  const modal = new bootstrap.Modal(document.getElementById('eventModal'));
  modal.show();
}

// SEO Live Preview & Counter for ITEP Page
function updateSeoPreviewItep() {
  const titleInput = document.getElementById('seoInputTitleItep');
  const descInput = document.getElementById('seoInputDescItep');
  const previewTitle = document.getElementById('seoPreviewTitleItep');
  const previewDesc = document.getElementById('seoPreviewDescItep');
  const titleCount = document.getElementById('metaTitleCountItep');
  const descCount = document.getElementById('metaDescCountItep');

  if (titleInput && previewTitle) {
    const val = titleInput.value.trim();
    previewTitle.textContent = val ? val : 'ITEP - Integrated Teacher Education Programme | SSSUTMS';
    if (titleCount) {
      titleCount.textContent = titleInput.value.length;
      titleCount.className = (titleInput.value.length > 60) ? 'text-danger fw-bold' : 'text-success fw-bold';
    }
  }

  if (descInput && previewDesc) {
    const val = descInput.value.trim();
    previewDesc.textContent = val ? val : 'Discover the 4-Year Integrated Teacher Education Programme (ITEP) at Sri Satya Sai University (SSSUTMS). NCTE approved dual-major educator degree.';
    if (descCount) {
      descCount.textContent = descInput.value.length;
      descCount.className = (descInput.value.length > 160) ? 'text-danger fw-bold' : 'text-success fw-bold';
    }
  }
}

document.addEventListener('DOMContentLoaded', function() {
  updateSeoPreviewItep();
});
</script>

</body>
</html>
