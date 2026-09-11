<?php
require_once __DIR__ . '/../config.php';
require_admin_auth();

$msg = '';
$error = '';

$allFaculties = get_all_faculty_pages();
$editSlug = $_GET['edit'] ?? '';

// Helper for file uploads
function handle_faculty_upload($fileKey, $defaultPath = '') {
    if (isset($_FILES[$fileKey]) && $_FILES[$fileKey]['error'] === UPLOAD_ERR_OK) {
        $allowed = ['jpg', 'jpeg', 'png', 'webp', 'svg', 'gif', 'pdf'];
        $ext = strtolower(pathinfo($_FILES[$fileKey]['name'], PATHINFO_EXTENSION));
        if (in_array($ext, $allowed)) {
            $filename = 'fac_' . time() . '_' . rand(100, 999) . '.' . $ext;
            $dest = UPLOAD_DIR . '/faculties/' . $filename;
            if (move_uploaded_file($_FILES[$fileKey]['tmp_name'], $dest)) {
                return 'assets/uploads/faculties/' . $filename;
            }
        }
    }
    return $defaultPath;
}

// POST Handling
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    // 1. Save Faculty Details
    if ($action === 'save_faculty') {
        $slug = clean_input($_POST['slug'] ?? '');
        if (isset($allFaculties[$slug])) {
            $facData = $allFaculties[$slug];

            $facData['title'] = clean_input($_POST['title'] ?? $facData['title']);
            $facData['banner_title'] = clean_input($_POST['banner_title'] ?? $facData['banner_title']);
            $facData['banner_category'] = clean_input($_POST['banner_category'] ?? ($facData['banner_category'] ?? 'Academic'));
            $facData['faculty_name'] = clean_input($_POST['faculty_name'] ?? $facData['faculty_name']);
            $facData['institute_name'] = clean_input($_POST['institute_name'] ?? $facData['institute_name']);

            // Dean Profile
            $facData['dean_name'] = clean_input($_POST['dean_name'] ?? ($facData['dean_name'] ?? ''));
            $facData['dean_designation'] = clean_input($_POST['dean_designation'] ?? ($facData['dean_designation'] ?? ''));
            $photoPath = handle_faculty_upload('dean_photo_file', trim($_POST['dean_photo_text'] ?? ($facData['dean_photo'] ?? '')));
            $facData['dean_photo'] = $photoPath;

            // Stat Chips
            $stats = [];
            for ($i = 0; $i < 4; $i++) {
                $lbl = clean_input($_POST['stat_label'][$i] ?? '');
                $val = clean_input($_POST['stat_value'][$i] ?? '');
                $ico = clean_input($_POST['stat_icon'][$i] ?? 'fa-graduation-cap');
                if (!empty($lbl) || !empty($val)) {
                    $stats[] = ['label' => $lbl, 'value' => $val, 'icon' => $ico];
                }
            }
            if (!empty($stats)) {
                $facData['stats'] = $stats;
            }

            // Custom Content / Overview
            if (isset($_POST['content_html'])) {
                $facData['content_html'] = trim($_POST['content_html']);
            }

            // SEO & Meta Details
            $facData['meta_title'] = clean_input($_POST['meta_title'] ?? ($facData['meta_title'] ?? ''));
            $facData['meta_description'] = clean_input($_POST['meta_description'] ?? ($facData['meta_description'] ?? ''));
            $facData['meta_keywords'] = clean_input($_POST['meta_keywords'] ?? ($facData['meta_keywords'] ?? ''));
            $facData['canonical_url'] = clean_input($_POST['canonical_url'] ?? ($facData['canonical_url'] ?? ''));
            $facData['og_image'] = clean_input($_POST['og_image'] ?? ($facData['og_image'] ?? ''));

            save_faculty_page($slug, $facData);
            $allFaculties = get_all_faculty_pages(true);
            $msg = 'Faculty "' . htmlspecialchars($facData['faculty_name']) . '" updated successfully! Live page updated.';
            $editSlug = $slug;
        }
    }

    // 2. Attach PDF Document (Syllabus, Curriculum, Brochure)
    if ($action === 'add_document') {
        $slug = clean_input($_POST['slug'] ?? '');
        $docTitle = clean_input($_POST['doc_title'] ?? '');
        $docCategory = clean_input($_POST['doc_category'] ?? 'Syllabus');

        $docFile = handle_faculty_upload('doc_file');
        if (empty($docFile)) {
            $docFile = trim($_POST['doc_file_url'] ?? '');
        }

        if (!empty($slug) && !empty($docTitle) && !empty($docFile)) {
            $docKey = 'faculty_' . $slug;
            $docData = [
                'id' => time() . rand(100, 999),
                'title' => $docTitle,
                'category' => $docCategory,
                'file' => $docFile,
                'date' => date('Y-m-d'),
                'status' => 'Active'
            ];

            save_page_document($docKey, $docData, 'Academic', $allFaculties[$slug]['faculty_name'] ?? $slug);
            $msg = 'Document "' . htmlspecialchars($docTitle) . '" attached successfully!';
            $editSlug = $slug;
        } else {
            $error = 'Document Title and a valid PDF file/URL are required.';
            $editSlug = $slug;
        }
    }

    // 3. Delete Attached Document
    if ($action === 'delete_document') {
        $slug = clean_input($_POST['slug'] ?? '');
        $docId = clean_input($_POST['doc_id'] ?? '');
        if (!empty($slug) && !empty($docId)) {
            $docKey = 'faculty_' . $slug;
            delete_page_document($docKey, $docId);
            $msg = 'Document deleted successfully!';
            $editSlug = $slug;
        }
    }
}

// Calculate total attached docs across all faculties
$totalDocsCount = 0;
foreach ($allFaculties as $s => $f) {
    $totalDocsCount += count(get_page_documents('faculty_' . $s));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Faculties &amp; Departments Manager - SSSUTMS Admin</title>
  <link rel="icon" type="image/jpeg" href="../assets/images/logo/logo.jpg">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/admin.css">
  <style>
    /* ===== DARK BLUE JUNGLE THEME - Faculties Manager ===== */
    :root {
      --fac-primary:   #0b2545;
      --fac-deep:      #071b38;
      --fac-mid:       #134074;
      --fac-accent:    #f4a261;
      --fac-gold:      #f59e0b;
      --fac-border:    #1e3a5f;
      --fac-surface:   #0d2b4a;
      --fac-text-soft: #93c5fd;
    }

    /* ===== STAT OVERVIEW CARDS ===== */
    .fac-stat-card {
      background: linear-gradient(135deg, var(--fac-primary) 0%, var(--fac-mid) 100%);
      border: 1px solid rgba(255,255,255,0.08);
      border-radius: 16px;
      padding: 1.25rem 1.4rem;
      display: flex;
      align-items: center;
      gap: 1rem;
      color: #ffffff;
      height: 100%;
      position: relative;
      overflow: hidden;
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .fac-stat-card::before {
      content: '';
      position: absolute;
      top: -30px; right: -30px;
      width: 100px; height: 100px;
      border-radius: 50%;
      background: rgba(255,255,255,0.04);
    }
    .fac-stat-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 12px 30px rgba(11,37,69,0.35);
    }
    .fac-stat-icon {
      width: 50px; height: 50px;
      border-radius: 12px;
      background: rgba(255,255,255,0.12);
      border: 1px solid rgba(255,255,255,0.15);
      display: flex; align-items: center; justify-content: center;
      font-size: 1.3rem;
      color: var(--fac-gold);
      flex-shrink: 0;
    }
    .fac-stat-value {
      font-size: 1.75rem;
      font-weight: 800;
      line-height: 1;
      color: #ffffff;
      margin-bottom: 2px;
    }
    .fac-stat-label {
      font-size: 0.72rem;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.06em;
      color: rgba(255,255,255,0.65);
    }

    /* ===== FILTER BAR ===== */
    .fac-filter-bar {
      background: #ffffff;
      border: 1px solid #e2e8f0;
      border-radius: 14px;
      padding: 1rem 1.25rem;
    }
    .fac-badge-count {
      background: linear-gradient(135deg, var(--fac-primary), var(--fac-mid));
      color: #ffffff;
      border: none;
      font-size: 0.85rem;
      padding: 7px 16px;
      border-radius: 50px;
      font-weight: 700;
      display: inline-flex;
      align-items: center;
      gap: 6px;
    }

    /* ===== FACULTY GRID CARDS ===== */
    #facultiesContainer {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 1rem;
    }
    .faculty-card-col {
      /* override Bootstrap col for equal height grid */
    }
    .faculty-card {
      background: #ffffff;
      border: 1.5px solid #e2e8f0;
      border-radius: 16px;
      padding: 0;
      transition: all 0.22s ease;
      height: 100%;
      display: flex;
      flex-direction: column;
      overflow: hidden;
      box-shadow: 0 2px 8px rgba(11,37,69,0.04);
    }
    .faculty-card:hover {
      border-color: var(--fac-mid);
      box-shadow: 0 10px 28px rgba(11,37,69,0.13);
      transform: translateY(-3px);
    }
    .faculty-card-header {
      background: linear-gradient(135deg, var(--fac-primary) 0%, var(--fac-mid) 100%);
      padding: 1rem 1.1rem 0.85rem;
      color: #ffffff;
      position: relative;
    }
    .faculty-card-header::after {
      content: '';
      position: absolute;
      bottom: 0; left: 0; right: 0;
      height: 3px;
      background: linear-gradient(90deg, var(--fac-gold), #fbbf24);
    }
    .faculty-card-body {
      padding: 1rem 1.1rem;
      flex: 1;
      display: flex;
      flex-direction: column;
    }
    .faculty-card-footer {
      padding: 0.75rem 1.1rem;
      border-top: 1px solid #f1f5f9;
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 0.5rem;
      background: #fafbfc;
    }
    .faculty-name-title {
      font-size: 0.92rem;
      font-weight: 800;
      color: #ffffff;
      line-height: 1.3;
      margin: 0 0 2px 0;
    }
    .faculty-institute-name {
      font-size: 0.75rem;
      color: rgba(255,255,255,0.7);
      font-weight: 500;
    }
    .faculty-badge-type {
      font-size: 0.68rem;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.07em;
      background: rgba(255,255,255,0.12);
      border: 1px solid rgba(255,255,255,0.2);
      color: rgba(255,255,255,0.9);
      border-radius: 6px;
      padding: 3px 9px;
    }
    .faculty-badge-pdf {
      font-size: 0.68rem;
      font-weight: 700;
      background: rgba(244,162,97,0.18);
      border: 1px solid rgba(244,162,97,0.35);
      color: var(--fac-accent);
      border-radius: 6px;
      padding: 3px 9px;
    }
    .faculty-dean-info {
      font-size: 0.78rem;
      color: #64748b;
      margin-bottom: 0.6rem;
    }
    .faculty-dean-info strong {
      color: var(--fac-primary);
    }
    .stat-chip-pill {
      background: #eef4ff;
      border: 1px solid rgba(11,37,69,0.12);
      border-radius: 7px;
      padding: 3px 8px;
      font-size: 0.72rem;
      font-weight: 600;
      display: inline-flex;
      align-items: center;
      gap: 4px;
      color: var(--fac-primary);
    }
    .stat-chip-pill i {
      color: var(--fac-gold);
    }
    .btn-edit-faculty {
      background: linear-gradient(135deg, var(--fac-primary), var(--fac-mid));
      color: #ffffff;
      border: none;
      border-radius: 8px;
      font-size: 0.8rem;
      font-weight: 700;
      padding: 6px 14px;
      transition: all 0.2s ease;
    }
    .btn-edit-faculty:hover {
      background: linear-gradient(135deg, var(--fac-mid), #1a5276);
      color: #ffffff;
      transform: scale(1.02);
    }
    .btn-view-live {
      background: transparent;
      color: #64748b;
      border: 1px solid #e2e8f0;
      border-radius: 8px;
      font-size: 0.8rem;
      font-weight: 600;
      padding: 5px 12px;
      transition: all 0.2s ease;
    }
    .btn-view-live:hover {
      border-color: var(--fac-mid);
      color: var(--fac-primary);
    }

    /* ===== EDIT PANEL ===== */
    .fac-edit-panel {
      background: #ffffff;
      border: 1.5px solid var(--fac-mid);
      border-radius: 16px;
      overflow: hidden;
      margin-bottom: 1.5rem;
      box-shadow: 0 4px 20px rgba(11,37,69,0.1);
    }
    .fac-edit-header {
      background: linear-gradient(135deg, var(--fac-primary), var(--fac-mid));
      padding: 1rem 1.4rem;
      color: #ffffff;
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 1rem;
      flex-wrap: wrap;
    }
    .fac-edit-header .badge-editing {
      background: var(--fac-gold);
      color: #0b2545;
      font-weight: 800;
      font-size: 0.7rem;
      border-radius: 6px;
      padding: 3px 10px;
      text-transform: uppercase;
      letter-spacing: 0.07em;
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
    <li><a href="examination.php" class="nav-link"><i class="fa fa-graduation-cap"></i> Examination Cell (5)</a></li>
    <li><a href="about.php" class="nav-link"><i class="fa fa-circle-info"></i> About Pages (42)</a></li>
    <li><a href="faculties.php" class="nav-link active"><i class="fa fa-chalkboard-user"></i> Faculties & Depts (14)</a></li>
    <li><a href="documents.php" class="nav-link"><i class="fa fa-stamp"></i> Approvals & NAAC Docs</a></li>
    <li><a href="events.php" class="nav-link"><i class="fa fa-calendar-days"></i> Events & Workshops</a></li>
    <li><a href="schemes.php" class="nav-link"><i class="fa fa-book-open"></i> Curriculum Schemes</a></li>
    <li><a href="pages.php" class="nav-link"><i class="fa fa-file-lines"></i> Dynamic CMS Pages</a></li>
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
  <!-- Top Bar -->
  <header class="admin-topbar">
    <div class="d-flex align-items-center gap-3">
      <button class="sidebar-toggle-btn d-lg-none" type="button" aria-label="Toggle Sidebar">
        <i class="fa fa-bars"></i>
      </button>
      <div>
        <h5 class="fw-bold mb-0 text-dark">Faculties &amp; Departments Manager</h5>
        <small class="text-muted">Directly manage all 14 Academic Faculties, Departments, Leadership, Stat Counters &amp; Curriculum PDFs.</small>
      </div>
    </div>
    <div class="d-flex align-items-center gap-3">
      <a href="../Academic/FacultiesAndDepartments/EngineeringAndTechnology.php" target="_blank" class="btn btn-sm d-none d-md-inline-flex align-items-center gap-1" style="background:linear-gradient(135deg,#0b2545,#134074); color:#fff; border:none; border-radius:10px; font-weight:600; font-size:0.8rem; padding:7px 16px;">
        <i class="fa fa-arrow-up-right-from-square"></i> View Engineering Live
      </a>
      <div class="user-badge d-flex align-items-center gap-2">
        <div class="avatar bg-primary text-white rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 36px; height: 36px;">A</div>
        <div class="d-none d-sm-block text-start">
          <span class="d-block fw-bold small text-dark leading-none">Administrator</span>
          <span class="d-block text-muted" style="font-size: 11px;">Academic Admin</span>
        </div>
      </div>
    </div>
  </header>

  <div class="admin-content-inner p-4">

    <?php if (!empty($msg)): ?>
      <div class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-2" role="alert">
        <i class="fa fa-circle-check fs-5"></i>
        <div><strong>Success!</strong> <?php echo htmlspecialchars($msg); ?></div>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    <?php endif; ?>

    <?php if (!empty($error)): ?>
      <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center gap-2" role="alert">
        <i class="fa fa-circle-exclamation fs-5"></i>
        <div><strong>Error:</strong> <?php echo htmlspecialchars($error); ?></div>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    <?php endif; ?>

    <!-- Overview Stats Bar -->
    <div class="row g-3 mb-4">
      <div class="col-6 col-md-3">
        <div class="fac-stat-card">
          <div class="fac-stat-icon"><i class="fa fa-graduation-cap"></i></div>
          <div>
            <div class="fac-stat-value"><?php echo count($allFaculties); ?></div>
            <div class="fac-stat-label">Total Faculties &amp; Depts</div>
          </div>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="fac-stat-card">
          <div class="fac-stat-icon"><i class="fa fa-book-open"></i></div>
          <div>
            <div class="fac-stat-value">100+</div>
            <div class="fac-stat-label">UG, PG &amp; Diplomas</div>
          </div>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="fac-stat-card">
          <div class="fac-stat-icon"><i class="fa fa-user-tie"></i></div>
          <div>
            <div class="fac-stat-value">14</div>
            <div class="fac-stat-label">Deans &amp; HODs</div>
          </div>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="fac-stat-card">
          <div class="fac-stat-icon"><i class="fa fa-file-pdf"></i></div>
          <div>
            <div class="fac-stat-value"><?php echo $totalDocsCount; ?></div>
            <div class="fac-stat-label">Attached Syllabus/PDFs</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Filter & Instant Search -->
    <div class="fac-filter-bar mb-4">
      <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
          <div class="d-flex align-items-center gap-2">
            <span class="fac-badge-count">
              <i class="fa fa-building-columns"></i> Academic Faculties (14)
            </span>
            <small class="text-muted d-none d-sm-inline">Manage course tables, leadership details, stat chips &amp; curriculum downloads.</small>
          </div>
          <!-- Search Input -->
          <div class="position-relative" style="min-width: 260px;">
            <input type="text" id="facultySearch" class="form-control form-control-sm ps-4" placeholder="Search any faculty or department..." style="border-radius:10px; border-color:#e2e8f0;">
            <i class="fa fa-magnifying-glass position-absolute top-50 start-0 translate-middle-y ms-2 text-muted small"></i>
          </div>
      </div>
    </div>

    <!-- Active Faculty Edit Panel (if selected) -->
    <?php if (!empty($editSlug) && isset($allFaculties[$editSlug])): 
      $f = $allFaculties[$editSlug];
      $facDocs = get_page_documents('faculty_' . $editSlug);
    ?>
      <div class="fac-edit-panel">
        <div class="fac-edit-header">
          <div>
            <span class="badge-editing">Editing Faculty</span>
            <h5 class="fw-bold mb-0 text-white mt-1"><?php echo htmlspecialchars($f['faculty_name']); ?></h5>
            <small style="color:rgba(255,255,255,0.55); font-size:0.73rem;">Source: <code style="color:rgba(255,255,255,0.75); background:rgba(0,0,0,0.2); padding:1px 6px; border-radius:4px;"><?php echo htmlspecialchars($f['file']); ?></code></small>
          </div>
          <div class="d-flex align-items-center gap-2">
            <a href="../<?php echo htmlspecialchars($f['file']); ?>" target="_blank" class="btn-view-live">
              <i class="fa fa-arrow-up-right-from-square me-1"></i>View Live
            </a>
            <a href="faculties.php" class="btn btn-sm" style="background:rgba(255,255,255,0.15); color:#fff; border:1px solid rgba(255,255,255,0.25); border-radius:8px; padding:5px 12px;" aria-label="Close Editor">
              <i class="fa fa-xmark"></i>
            </a>
          </div>
        </div>

        <div class="card-body p-4">
          <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="action" value="save_faculty">
            <input type="hidden" name="slug" value="<?php echo htmlspecialchars($editSlug); ?>">

            <!-- Tab Navigation Header -->
            <ul class="nav nav-pills mb-4 gap-2 border-bottom pb-3" id="facultyEditTabNav" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active fw-bold px-4 py-2" id="tab-fac-general" data-bs-toggle="pill" data-bs-target="#pane-fac-general" type="button" role="tab">
                  <i class="fa-solid fa-sliders me-2"></i>General Content &amp; Tables
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link fw-bold px-4 py-2" id="tab-fac-seo" data-bs-toggle="pill" data-bs-target="#pane-fac-seo" type="button" role="tab" style="background: rgba(16,185,129,0.08); color: #047857; border: 1px solid rgba(16,185,129,0.3);">
                  <i class="fa-solid fa-magnifying-glass me-2"></i>SEO &amp; Meta Details <span class="badge bg-success ms-1">SEO</span>
                </button>
              </li>
            </ul>

            <div class="tab-content" id="facultyEditTabContent">
              <!-- TAB 1: General Content & Tables -->
              <div class="tab-pane fade show active" id="pane-fac-general" role="tabpanel">

                <!-- General Header Settings -->
                <div class="row g-3 mb-4">
                  <div class="col-md-4">
                    <label class="form-label small fw-bold">Browser Tab Title</label>
                    <input type="text" name="title" class="form-control form-control-sm" value="<?php echo htmlspecialchars($f['title']); ?>" required>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label small fw-bold">Breadcrumb Banner Title</label>
                    <input type="text" name="banner_title" class="form-control form-control-sm" value="<?php echo htmlspecialchars($f['banner_title']); ?>" required>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label small fw-bold">Banner Category</label>
                    <input type="text" name="banner_category" class="form-control form-control-sm" value="<?php echo htmlspecialchars($f['banner_category'] ?? 'Academic'); ?>" required>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label small fw-bold">Faculty Heading Title (Top Card)</label>
                    <input type="text" name="faculty_name" class="form-control" value="<?php echo htmlspecialchars($f['faculty_name']); ?>" required>
                    <small class="text-muted">e.g. SCHOOL OF ENGINEERING &amp; TECHNOLOGY</small>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label small fw-bold">Constituent Institute Name</label>
                    <input type="text" name="institute_name" class="form-control" value="<?php echo htmlspecialchars($f['institute_name']); ?>" required>
                    <small class="text-muted">e.g. School of Engineering</small>
                  </div>
                </div>

                <!-- Dean / Leadership Profile Section -->
                <div class="p-3 border rounded bg-light mb-4">
                  <h6 class="fw-bold text-dark mb-3"><i class="fa fa-user-tie text-primary me-2"></i>Faculty Leadership / Dean Profile</h6>
                  <div class="row g-3">
                    <div class="col-md-4">
                      <label class="form-label small fw-bold">Dean / Principal Name</label>
                      <input type="text" name="dean_name" class="form-control form-control-sm" value="<?php echo htmlspecialchars($f['dean_name'] ?? ''); ?>" placeholder="e.g. Dr. C. K. Tyagi">
                    </div>
                    <div class="col-md-4">
                      <label class="form-label small fw-bold">Official Designation</label>
                      <input type="text" name="dean_designation" class="form-control form-control-sm" value="<?php echo htmlspecialchars($f['dean_designation'] ?? ''); ?>" placeholder="e.g. Dean, Faculty of Engineering">
                    </div>
                    <div class="col-md-4">
                      <label class="form-label small fw-bold">Photo File (Upload to Replace)</label>
                      <input type="file" name="dean_photo_file" class="form-control form-control-sm" accept="image/*">
                      <input type="text" name="dean_photo_text" class="form-control form-control-sm mt-1" value="<?php echo htmlspecialchars($f['dean_photo'] ?? ''); ?>" placeholder="Or image path">
                    </div>
                  </div>
                </div>

                <!-- 4 Key Stat Chips -->
                <div class="p-3 border rounded bg-light mb-4">
                  <h6 class="fw-bold text-dark mb-3"><i class="fa fa-chart-simple text-warning me-2"></i>Key Highlights &amp; Stat Chips (4 Chips)</h6>
                  <div class="row g-3">
                    <?php for ($i = 0; $i < 4; $i++): 
                      $st = $f['stats'][$i] ?? ['label' => '', 'value' => '', 'icon' => 'fa-graduation-cap'];
                    ?>
                      <div class="col-md-3">
                        <div class="card p-2 bg-white border">
                          <span class="badge bg-secondary mb-2 align-self-start">Chip #<?php echo ($i+1); ?></span>
                          <label class="small fw-bold mb-1">Stat Label</label>
                          <input type="text" name="stat_label[]" class="form-control form-control-sm mb-2" value="<?php echo htmlspecialchars($st['label'] ?? ''); ?>" placeholder="e.g. UG Programs">
                          <label class="small fw-bold mb-1">Stat Value</label>
                          <input type="text" name="stat_value[]" class="form-control form-control-sm mb-2" value="<?php echo htmlspecialchars($st['value'] ?? ''); ?>" placeholder="e.g. 11 Branches">
                          <label class="small fw-bold mb-1">FontAwesome Icon</label>
                          <input type="text" name="stat_icon[]" class="form-control form-control-sm" value="<?php echo htmlspecialchars($st['icon'] ?? 'fa-graduation-cap'); ?>" placeholder="e.g. fa-microchip">
                        </div>
                      </div>
                    <?php endfor; ?>
                  </div>
                </div>

                <!-- Course Tables / Main Body Content (Dynamic HTML Editor) -->
                <div class="mb-4">
                  <div class="d-flex align-items-center justify-content-between mb-2 flex-wrap gap-2">
                    <div>
                      <label class="form-label fw-bold mb-0 text-dark"><i class="fa fa-table text-primary me-2"></i>Department Course Tables &amp; Main Body Content (HTML)</label>
                      <div class="small text-muted mt-1">This controls the <strong>Institute blocks, Course labels, and all Course tables</strong> shown on the live faculty page. Edit the full HTML here — it will be rendered exactly as-is on the public page.</div>
                    </div>
                    <div class="d-flex gap-2">
                      <button type="button" class="btn btn-outline-secondary btn-sm" onclick="toggleContentPreview(this)">
                        <i class="fa fa-eye me-1"></i> Preview HTML
                      </button>
                      <button type="button" class="btn btn-outline-warning btn-sm" onclick="expandTextarea(this)">
                        <i class="fa fa-expand me-1"></i> Expand Editor
                      </button>
                    </div>
                  </div>
                  <div class="alert alert-info py-2 px-3 small mb-2">
                    <i class="fa fa-circle-info me-1"></i>
                    <strong>Tip:</strong> The HTML here contains institute blocks and course tables from the live page. To add a new course: copy an existing <code>&lt;tr&gt;</code> row and update the course name, branch, and duration. <strong>Do not remove the wrapper <code>&lt;div class="*-table-wrapper"&gt;</code> tags</strong> — they apply the styled borders.
                  </div>
                  <textarea name="content_html" id="contentHtmlEditor" class="form-control font-monospace" rows="18" style="font-size: 12px; line-height: 1.5; resize: vertical;" spellcheck="false"><?php echo htmlspecialchars($f['content_html'] ?? ''); ?></textarea>
                  <div id="contentHtmlPreview" class="border rounded p-3 bg-white mt-2" style="display:none; max-height: 500px; overflow-y:auto;">
                    <!-- Preview renders here -->
                  </div>
                  <div class="d-flex justify-content-between align-items-center mt-1">
                    <small class="text-muted"><i class="fa fa-code me-1"></i> Raw HTML editor — changes are saved to <code>data/academic_faculties.json</code> and appear live instantly after Save.</small>
                    <small class="text-muted" id="charCount"></small>
                  </div>
                </div>

              </div><!-- end TAB 1 -->

              <!-- TAB 2: SEO & Meta Details -->
              <div class="tab-pane fade" id="pane-fac-seo" role="tabpanel">
                
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
                          <span class="text-muted ms-1" style="font-size: 12px;">https://sssutms.co.in › Academic › <?php echo htmlspecialchars($editSlug); ?></span>
                        </div>
                      </div>
                      <h5 id="seoPreviewTitle" class="fw-normal mb-1 text-primary" style="color: #1a0dab !important; font-size: 20px; line-height: 1.3; cursor: pointer;">
                        <?php echo htmlspecialchars($f['meta_title'] ?? ($f['title'] ?? 'Faculty Page - SSSUTMS')); ?>
                      </h5>
                      <p id="seoPreviewDesc" class="mb-0 text-muted" style="color: #4d5156 !important; font-size: 14px; line-height: 1.58;">
                        <?php echo htmlspecialchars(!empty($f['meta_description']) ? $f['meta_description'] : 'Explore world-class academic programs, state-of-the-art laboratories, experienced faculty, and industry-oriented degrees at Sri Satya Sai University (SSSUTMS).'); ?>
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
                      <small class="text-muted"><span id="metaTitleCount">0</span> / 60 chars <span class="badge bg-secondary ms-1">Recommended: 50-60</span></small>
                    </div>
                    <input type="text" name="meta_title" id="seoInputTitle" class="form-control" value="<?php echo htmlspecialchars($f['meta_title'] ?? ''); ?>" placeholder="e.g. Faculty of Engineering &amp; Technology - Courses &amp; Fees | SSSUTMS" oninput="updateSeoPreview()">
                    <small class="text-muted">Appears in Google search results and as the browser tab title. Keep it descriptive, relevant, and compelling.</small>
                  </div>

                  <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                      <label class="form-label small fw-bold mb-0">
                        <i class="fa-solid fa-align-left text-success me-1"></i> SEO Meta Description
                      </label>
                      <small class="text-muted"><span id="metaDescCount">0</span> / 160 chars <span class="badge bg-secondary ms-1">Recommended: 150-160</span></small>
                    </div>
                    <textarea name="meta_description" id="seoInputDesc" class="form-control" rows="3" placeholder="Write a concise 150-160 character description summarizing this faculty, courses offered, labs, and career opportunities..." oninput="updateSeoPreview()"><?php echo htmlspecialchars($f['meta_description'] ?? ''); ?></textarea>
                    <small class="text-muted">Shown beneath your title in Google search results. A compelling summary drives higher click-through rates (CTR).</small>
                  </div>

                  <div class="col-md-6">
                    <label class="form-label small fw-bold">
                      <i class="fa-solid fa-tags text-warning me-1"></i> Target SEO Keywords (Comma Separated)
                    </label>
                    <input type="text" name="meta_keywords" class="form-control" value="<?php echo htmlspecialchars($f['meta_keywords'] ?? ''); ?>" placeholder="e.g. Engineering, B.Tech, M.Tech, Polytechnic, SSSUTMS, Sehore">
                    <small class="text-muted">Comma-separated target phrases for internal indexing &amp; search robots.</small>
                  </div>

                  <div class="col-md-6">
                    <label class="form-label small fw-bold">
                      <i class="fa-solid fa-link text-info me-1"></i> Canonical URL Override (Optional)
                    </label>
                    <input type="text" name="canonical_url" class="form-control" value="<?php echo htmlspecialchars($f['canonical_url'] ?? ''); ?>" placeholder="Leave blank to auto-detect current page URL">
                    <small class="text-muted">Specifies the preferred canonical URL for Google to avoid duplicate content penalties.</small>
                  </div>

                  <div class="col-12">
                    <label class="form-label small fw-bold">
                      <i class="fa-solid fa-image text-danger me-1"></i> Social Sharing Preview Image (Open Graph Image: og:image)
                    </label>
                    <div class="input-group">
                      <span class="input-group-text bg-light"><i class="fa fa-share-nodes"></i></span>
                      <input type="text" name="og_image" class="form-control" value="<?php echo htmlspecialchars($f['og_image'] ?? 'assets/images/gallery/1/img-25.jpg'); ?>" placeholder="e.g. assets/images/gallery/1/img-25.jpg or full URL">
                    </div>
                    <small class="text-muted">This image appears when the page link is shared on WhatsApp, Facebook, LinkedIn, or Twitter.</small>
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
                <i class="fa fa-floppy-disk me-1"></i> Save Faculty Changes
              </button>
            </div>
          </form>

          <!-- Attached Curriculum / Syllabus PDFs -->
          <hr class="my-4">
          <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
            <div>
              <h6 class="fw-bold text-dark mb-0"><i class="fa-solid fa-file-pdf text-danger me-2"></i>Curriculum, Syllabus &amp; Documents (<?php echo count($facDocs); ?>)</h6>
              <small class="text-muted">Upload course syllabus, curriculum schemes, or department brochures directly to this faculty.</small>
            </div>
            <button class="btn btn-sm btn-outline-danger" type="button" data-bs-toggle="collapse" data-bs-target="#addDocCollapse">
              <i class="fa fa-plus me-1"></i> Add / Upload PDF to This Faculty
            </button>
          </div>

          <!-- Add PDF Form Collapse -->
          <div class="collapse mb-4" id="addDocCollapse">
            <div class="card card-body bg-light border">
              <h6 class="fw-bold mb-3">Attach Document to "<?php echo htmlspecialchars($f['faculty_name']); ?>"</h6>
              <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="action" value="add_document">
                <input type="hidden" name="slug" value="<?php echo htmlspecialchars($editSlug); ?>">
                <div class="row g-3">
                  <div class="col-md-5">
                    <label class="small fw-bold">Document Title</label>
                    <input type="text" name="doc_title" class="form-control form-control-sm" placeholder="e.g. B.Tech Computer Science Syllabus 2026-27" required>
                  </div>
                  <div class="col-md-3">
                    <label class="small fw-bold">Category</label>
                    <input type="text" name="doc_category" class="form-control form-control-sm" value="Syllabus" required>
                  </div>
                  <div class="col-md-4">
                    <label class="small fw-bold">PDF File (Upload)</label>
                    <input type="file" name="doc_file" class="form-control form-control-sm" accept=".pdf">
                    <input type="text" name="doc_file_url" class="form-control form-control-sm mt-1" placeholder="Or relative path e.g. assets/pdf/syllabus.pdf">
                  </div>
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-danger btn-sm px-3 fw-bold">
                    <i class="fa fa-cloud-arrow-up me-1"></i> Upload &amp; Attach PDF
                  </button>
                </div>
              </form>
            </div>
          </div>

          <!-- Documents List Table -->
          <?php if (!empty($facDocs)): ?>
            <div class="table-responsive border rounded">
              <table class="table table-hover align-middle mb-0 small">
                <thead class="table-light">
                  <tr>
                    <th>Document Title</th>
                    <th>Category</th>
                    <th>File Link</th>
                    <th>Date</th>
                    <th class="text-end">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($facDocs as $d): ?>
                    <tr>
                      <td class="fw-bold text-dark">
                        <i class="fa fa-file-pdf text-danger me-1"></i>
                        <?php echo htmlspecialchars($d['title'] ?? ''); ?>
                      </td>
                      <td><span class="badge bg-secondary"><?php echo htmlspecialchars($d['category'] ?? 'General'); ?></span></td>
                      <td>
                        <a href="../<?php echo htmlspecialchars($d['file'] ?? '#'); ?>" target="_blank" class="text-decoration-none text-truncate d-inline-block" style="max-width: 220px;">
                          <?php echo htmlspecialchars(basename($d['file'] ?? '')); ?>
                        </a>
                      </td>
                      <td><?php echo htmlspecialchars($d['date'] ?? ''); ?></td>
                      <td class="text-end">
                        <form method="POST" style="display:inline;" onsubmit="return confirm('Delete this attached document?');">
                          <input type="hidden" name="action" value="delete_document">
                          <input type="hidden" name="slug" value="<?php echo htmlspecialchars($editSlug); ?>">
                          <input type="hidden" name="doc_id" value="<?php echo htmlspecialchars($d['id'] ?? ''); ?>">
                          <button type="submit" class="btn btn-outline-danger btn-sm py-0 px-2" title="Delete">
                            <i class="fa fa-trash"></i>
                          </button>
                        </form>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          <?php else: ?>
            <p class="text-muted small mb-0 fst-italic">No dedicated curriculum or syllabus PDF documents attached directly to this faculty yet.</p>
          <?php endif; ?>

        </div>
      </div>
    <?php endif; ?>

    <!-- Grid of All 14 Faculties & Departments -->
    <div id="facultiesContainer">
      <?php foreach ($allFaculties as $slug => $fac): 
        $pDocsCount = count(get_page_documents('faculty_' . $slug));
      ?>
        <div class="faculty-card-col" data-title="<?php echo strtolower(htmlspecialchars($fac['faculty_name'] . ' ' . $fac['institute_name'] . ' ' . ($fac['dean_name'] ?? '') . ' ' . $slug)); ?>">
          <div class="faculty-card">

            <!-- Card Header: Dark Blue Banner -->
            <div class="faculty-card-header">
              <div class="d-flex justify-content-between align-items-start mb-1">
                <span class="faculty-badge-type">Academic Faculty</span>
                <?php if ($pDocsCount > 0): ?>
                  <span class="faculty-badge-pdf">
                    <i class="fa fa-file-pdf me-1"></i><?php echo $pDocsCount; ?> PDFs
                  </span>
                <?php endif; ?>
              </div>
              <div class="faculty-name-title"><?php echo htmlspecialchars($fac['faculty_name']); ?></div>
              <div class="faculty-institute-name">
                <i class="fa fa-building-columns me-1" style="font-size:0.7rem;"></i><?php echo htmlspecialchars($fac['institute_name']); ?>
              </div>
            </div>

            <!-- Card Body -->
            <div class="faculty-card-body">
              <?php if (!empty($fac['dean_name'])): ?>
                <p class="faculty-dean-info mb-2">
                  <i class="fa fa-user-tie me-1" style="color:#f59e0b;"></i>
                  <strong>Dean/Head:</strong> <?php echo htmlspecialchars($fac['dean_name']); ?>
                </p>
              <?php endif; ?>
              <?php if (!empty($fac['dean_designation'])): ?>
                <p class="faculty-dean-info mb-2" style="font-size:0.74rem; color:#94a3b8;">
                  <?php echo htmlspecialchars($fac['dean_designation']); ?>
                </p>
              <?php endif; ?>

              <!-- Stat Chips Preview -->
              <?php if (!empty($fac['stats'])): ?>
                <div class="d-flex flex-wrap gap-1 mt-auto pt-1">
                  <?php foreach (array_slice($fac['stats'], 0, 3) as $st): ?>
                    <span class="stat-chip-pill">
                      <i class="fa <?php echo htmlspecialchars($st['icon'] ?? 'fa-tag'); ?>"></i>
                      <?php echo htmlspecialchars($st['label'] . ': ' . $st['value']); ?>
                    </span>
                  <?php endforeach; ?>
                </div>
              <?php endif; ?>
            </div>

            <!-- Card Footer: Actions -->
            <div class="faculty-card-footer">
              <a href="../<?php echo htmlspecialchars($fac['file']); ?>" target="_blank" class="btn-view-live" title="View live faculty page">
                <i class="fa fa-arrow-up-right-from-square me-1"></i>Live
              </a>
              <a href="faculties.php?edit=<?php echo urlencode($slug); ?>" class="btn-edit-faculty">
                <i class="fa fa-pen-to-square me-1"></i>Edit Faculty
              </a>
            </div>

          </div>
        </div>
      <?php endforeach; ?>
    </div>

  </div><!-- /.admin-content-inner -->
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/admin.js"></script>
<script>
  // Live Instant Search Filter
  const searchInput = document.getElementById('facultySearch');
  if (searchInput) {
    searchInput.addEventListener('input', function() {
      const q = this.value.toLowerCase().trim();
      document.querySelectorAll('.faculty-card-col').forEach(card => {
        const text = card.getAttribute('data-title') || '';
        if (!q || text.includes(q)) {
          card.style.display = '';
        } else {
          card.style.display = 'none';
        }
      });
    });
  }

  // HTML Content Editor: Preview toggle
  function toggleContentPreview(btn) {
    const editor = document.getElementById('contentHtmlEditor');
    const preview = document.getElementById('contentHtmlPreview');
    if (!editor || !preview) return;
    if (preview.style.display === 'none') {
      preview.innerHTML = editor.value;
      preview.style.display = 'block';
      btn.innerHTML = '<i class="fa fa-eye-slash me-1"></i> Hide Preview';
      btn.classList.replace('btn-outline-secondary', 'btn-secondary');
    } else {
      preview.style.display = 'none';
      btn.innerHTML = '<i class="fa fa-eye me-1"></i> Preview HTML';
      btn.classList.replace('btn-secondary', 'btn-outline-secondary');
    }
  }

  // HTML Content Editor: Expand textarea
  function expandTextarea(btn) {
    const editor = document.getElementById('contentHtmlEditor');
    if (!editor) return;
    const currentRows = parseInt(editor.rows);
    if (currentRows < 40) {
      editor.rows = 40;
      btn.innerHTML = '<i class="fa fa-compress me-1"></i> Collapse Editor';
    } else {
      editor.rows = 18;
      btn.innerHTML = '<i class="fa fa-expand me-1"></i> Expand Editor';
    }
  }

  // SEO Live Preview & Counter
  function updateSeoPreview() {
    const titleInput = document.getElementById('seoInputTitle');
    const descInput = document.getElementById('seoInputDesc');
    const previewTitle = document.getElementById('seoPreviewTitle');
    const previewDesc = document.getElementById('seoPreviewDesc');
    const titleCount = document.getElementById('metaTitleCount');
    const descCount = document.getElementById('metaDescCount');

    if (titleInput && previewTitle) {
      const val = titleInput.value.trim();
      previewTitle.textContent = val ? val : 'Faculty Page - SSSUTMS';
      if (titleCount) {
        titleCount.textContent = titleInput.value.length;
        titleCount.className = (titleInput.value.length > 60) ? 'text-danger fw-bold' : 'text-success fw-bold';
      }
    }

    if (descInput && previewDesc) {
      const val = descInput.value.trim();
      previewDesc.textContent = val ? val : 'Explore world-class academic programs, state-of-the-art laboratories, and experienced faculty at Sri Satya Sai University (SSSUTMS).';
      if (descCount) {
        descCount.textContent = descInput.value.length;
        descCount.className = (descInput.value.length > 160) ? 'text-danger fw-bold' : 'text-success fw-bold';
      }
    }
  }

  // Initial call on load
  document.addEventListener('DOMContentLoaded', function() {
    updateSeoPreview();
  });
</script>
</body>
</html>
