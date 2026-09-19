<?php
require_once __DIR__ . '/../config.php';
require_admin_auth();

$catalog = get_academic_page_catalog();
$categories = [
    'faculties' => ['label' => 'Faculties & Departments', 'count' => 14, 'icon' => 'fa-chalkboard-user'],
    'committee' => ['label' => 'Statutory Committees', 'count' => 9, 'icon' => 'fa-users-gear'],
    'core' => ['label' => 'Core Academic Programs', 'count' => 9, 'icon' => 'fa-book-bookmark'],
    'activities' => ['label' => 'Academic Activities', 'count' => 6, 'icon' => 'fa-calendar-check'],
    'tp' => ['label' => 'Training & Placement', 'count' => 2, 'icon' => 'fa-briefcase'],
    'naac' => ['label' => 'NAAC & Accreditations', 'count' => 8, 'icon' => 'fa-medal'],
];

// Determine active category and active page tab
$cat = clean_input($_GET['cat'] ?? 'core');
if (!array_key_exists($cat, $categories)) {
    $cat = 'core';
}

// Filter pages in this category
$pagesInCat = [];
foreach ($catalog as $k => $item) {
    if (($item['cat_key'] ?? '') === $cat) {
        $pagesInCat[$k] = $item;
    }
}

$tab = clean_input($_GET['tab'] ?? (array_key_first($pagesInCat) ?: 'PHD'));
if (!array_key_exists($tab, $catalog)) {
    $tab = array_key_first($pagesInCat) ?: 'PHD';
}

$pageMeta = $catalog[$tab] ?? [
    'title' => $tab,
    'category' => 'Academic',
    'slug' => 'Academic/' . $tab . '.php',
    'icon' => 'fa-graduation-cap'
];

$msg = '';
$error = '';

// Handle SEO Update Form Submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'save_seo') {
    $seoData = [
        'page_title' => clean_input($_POST['page_title'] ?? ''),
        'meta_title' => clean_input($_POST['meta_title'] ?? ''),
        'meta_description' => clean_input($_POST['meta_description'] ?? ''),
        'meta_keywords' => clean_input($_POST['meta_keywords'] ?? ''),
        'canonical_url' => trim($_POST['canonical_url'] ?? ''),
        'og_image' => trim($_POST['og_image'] ?? 'assets/images/logo/logo.jpg'),
        'banner_title' => clean_input($_POST['banner_title'] ?? ''),
        'banner_category' => clean_input($_POST['banner_category'] ?? ($pageMeta['category'] ?? 'Academic')),
        'page_schema' => clean_schema_json($_POST['page_schema'] ?? '')
    ];

    if (save_academic_page_info($tab, $seoData)) {
        if (!empty($pageMeta['slug']) && function_exists('save_page_schema')) {
            save_page_schema($pageMeta['slug'], $seoData['page_schema']);
        }
        $msg = 'SEO Meta & Page Schema saved successfully for ' . htmlspecialchars($pageMeta['title']) . '! Changes are now live on the public site.';
    } else {
        $error = 'Failed to save SEO settings. Please verify data permissions.';
    }
}

// Handle Add/Upload Attached Document
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'save_doc') {
    $docTitle = clean_input($_POST['title'] ?? '');
    $docCategory = clean_input($_POST['category'] ?? 'Circular');
    $docDate = clean_input($_POST['date'] ?? date('Y-m-d'));
    $docStatus = clean_input($_POST['status'] ?? 'Active');
    $fileUrl = trim($_POST['file_url'] ?? '');

    // Handle Document Upload if provided
    if (isset($_FILES['doc_file']) && $_FILES['doc_file']['error'] === UPLOAD_ERR_OK) {
        $allowed = ['pdf', 'doc', 'docx', 'xls', 'xlsx', 'zip', 'jpg', 'png'];
        $origName = $_FILES['doc_file']['name'];
        $ext = strtolower(pathinfo($origName, PATHINFO_EXTENSION));

        if (in_array($ext, $allowed)) {
            $newFileName = 'acad_' . strtolower(preg_replace('/[^a-zA-Z0-9_-]/', '_', $tab)) . '_' . time() . '.' . $ext;
            $destDir = UPLOAD_DIR . '/documents';
            if (!is_dir($destDir)) {
                @mkdir($destDir, 0777, true);
            }
            $destPath = $destDir . '/' . $newFileName;
            
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
        if (!empty($docTitle) && !empty($fileUrl)) {
            $docData = [
                'id' => time() . rand(100, 999),
                'title' => $docTitle,
                'category' => $docCategory,
                'file_path' => $fileUrl,
                'url' => $fileUrl,
                'date' => $docDate,
                'status' => $docStatus
            ];
            if (save_academic_document($tab, $docData)) {
                $msg = 'Document attached successfully! It is now visible on the public page.';
            } else {
                $error = 'Could not save document record.';
            }
        } else {
            $error = 'Document title and valid file or link URL are required.';
        }
    }
}

// Handle Delete Document
if (isset($_GET['action']) && $_GET['action'] === 'delete' && !empty($_GET['id'])) {
    $delId = $_GET['id'];
    if (delete_academic_document($tab, $delId)) {
        $msg = 'Document removed successfully.';
    } else {
        $error = 'Could not remove document or document not found.';
    }
}

// Fetch current page info & documents
$currentSeo = get_academic_page_info($tab);
$attachedDocs = get_academic_documents($tab);
$publicUrl = BASE_URL . ltrim($pageMeta['slug'] ?? '', '/');

// Calculate total academic pages
$totalAcademicPages = count($catalog);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Academic Management Console (46 Pages) - SSSUTMS Admin</title>
  <link rel="icon" type="image/jpeg" href="../assets/images/logo/logo.jpg">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/admin.css">
  <style>
    .acad-category-pill {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 10px 16px;
      background: #ffffff;
      color: #334155;
      font-weight: 600;
      font-size: 0.88rem;
      border: 1px solid #e2e8f0;
      border-radius: 12px;
      text-decoration: none !important;
      transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
      box-shadow: 0 2px 4px rgba(0,0,0,0.02);
    }
    .acad-category-pill:hover {
      border-color: #0b2545;
      color: #0b2545;
      transform: translateY(-2px);
      box-shadow: 0 6px 14px rgba(11,37,69,0.08);
    }
    .acad-category-pill.active {
      background: linear-gradient(135deg, #0b2545 0%, #1e4d8c 100%);
      color: #ffffff;
      border-color: #0b2545;
      box-shadow: 0 6px 16px rgba(11,37,69,0.22);
    }
    .acad-category-pill .badge {
      font-size: 0.72rem;
      padding: 3px 8px;
      border-radius: 20px;
    }
    .acad-category-pill.active .badge {
      background: rgba(255,255,255,0.22) !important;
      color: #ffffff !important;
    }

    .acad-page-pill {
      display: inline-flex;
      align-items: center;
      gap: 7px;
      padding: 8px 14px;
      background: #ffffff;
      color: #475569;
      font-weight: 600;
      font-size: 0.83rem;
      border: 1px solid #e2e8f0;
      border-radius: 10px;
      text-decoration: none !important;
      transition: all 0.2s ease;
      white-space: nowrap;
    }
    .acad-page-pill:hover {
      border-color: #0b2545;
      color: #0b2545;
      background: #f8fafc;
      transform: translateY(-1px);
    }
    .acad-page-pill.active {
      background: linear-gradient(135deg, #d97706 0%, #f59e0b 100%);
      color: #ffffff;
      font-weight: 700;
      border-color: #d97706;
      box-shadow: 0 4px 12px rgba(217,119,6,0.25);
    }
    .acad-page-pill.active i {
      color: #ffffff !important;
    }

    /* Google SERP Live Snippet Box */
    .serp-preview-box {
      background: #ffffff;
      border: 1px solid #dfe1e5;
      border-radius: 14px;
      padding: 18px 22px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.04);
      margin-bottom: 22px;
    }
    .serp-preview-box.mobile-mode {
      max-width: 420px;
      border-radius: 18px;
      padding: 16px;
      box-shadow: 0 4px 14px rgba(0,0,0,0.06);
    }
    .serp-url {
      color: #202124;
      font-size: 0.82rem;
      display: flex;
      align-items: center;
      gap: 6px;
      margin-bottom: 4px;
      font-family: Arial, sans-serif;
    }
    .serp-url .globe-icon {
      color: #5f6368;
      font-size: 0.8rem;
    }
    .serp-url .domain {
      color: #202124;
      font-weight: 500;
    }
    .serp-url .breadcrumb-path {
      color: #5f6368;
    }
    .serp-title {
      color: #1a0dab;
      font-size: 1.18rem;
      font-weight: 500;
      line-height: 1.3;
      margin-bottom: 5px;
      text-decoration: none;
      display: block;
      cursor: pointer;
      font-family: Arial, sans-serif;
    }
    .serp-title:hover {
      text-decoration: underline;
    }
    .serp-snippet {
      color: #4d5156;
      font-size: 0.88rem;
      line-height: 1.48;
      margin-bottom: 0;
      font-family: Arial, sans-serif;
    }
    .char-badge {
      font-size: 0.75rem;
      font-weight: 700;
      padding: 3px 8px;
      border-radius: 6px;
    }

    /* Custom Inner Tabs */
    .nav-tabs-custom {
      border-bottom: 2px solid #e2e8f0;
      gap: 8px;
    }
    .nav-tabs-custom .nav-link {
      border: none;
      border-bottom: 3px solid transparent;
      color: #64748b;
      font-weight: 700;
      font-size: 0.92rem;
      padding: 10px 18px;
      border-radius: 0;
      background: transparent;
      transition: all 0.2s ease;
    }
    .nav-tabs-custom .nav-link:hover {
      color: #0b2545;
    }
    .nav-tabs-custom .nav-link.active {
      color: #0b2545;
      border-bottom-color: #f59e0b;
      background: transparent;
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
    <li><a href="academic.php" class="nav-link active"><i class="fa fa-graduation-cap"></i> Academic Cell (46)</a></li>
    <li><a href="examination.php" class="nav-link"><i class="fa fa-file-signature"></i> Examination Cell (5)</a></li>
    <li><a href="research.php" class="nav-link"><i class="fa fa-flask"></i> Research Cell (12)</a></li>
    <li><a href="about.php" class="nav-link"><i class="fa fa-circle-info"></i> About Pages (42)</a></li>
    <li><a href="faculties.php" class="nav-link"><i class="fa fa-chalkboard-user"></i> Faculties &amp; Depts (14)</a></li>
    <li><a href="committee.php" class="nav-link"><i class="fa fa-users-gear"></i> Statutory Committees (9)</a></li>
    <li><a href="documents.php" class="nav-link"><i class="fa fa-stamp"></i> Approvals &amp; NAAC Docs</a></li>
    <li><a href="events.php" class="nav-link"><i class="fa fa-calendar-days"></i> Events &amp; Workshops</a></li>
    <li><a href="seo.php" class="nav-link"><i class="fa fa-globe"></i> Global SEO &amp; Indexing</a></li>
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
  
  <!-- Header Topbar -->
  <header class="admin-topbar">
    <div class="d-flex align-items-center gap-3">
      <button class="admin-sidebar-toggle d-lg-none" type="button" aria-label="Toggle Sidebar">
        <i class="fa fa-bars"></i>
      </button>
      <div>
        <h5 class="fw-bold text-dark mb-0">Unified Academic Management Console</h5>
        <small class="text-muted d-none d-md-inline">Dynamic Management for All 46 Academic Pages, Faculties, Committees, NAAC &amp; SEO Suite</small>
      </div>
    </div>
    <div class="d-flex align-items-center gap-2">
      <a href="<?php echo htmlspecialchars($publicUrl); ?>" target="_blank" class="btn btn-sm btn-outline-primary fw-bold rounded-pill px-3 d-inline-flex align-items-center gap-1">
        <i class="fa fa-arrow-up-right-from-square"></i> Preview Public Page
      </a>
      <div class="d-none d-sm-flex align-items-center gap-2 ps-2 border-start">
        <div class="avatar bg-primary text-white rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 34px; height: 34px; font-size: 13px;">A</div>
        <div class="text-start d-none d-md-block">
          <span class="d-block fw-bold small text-dark leading-none">Admin User</span>
          <span class="d-block text-muted" style="font-size: 11px;">Academic Cell</span>
        </div>
      </div>
    </div>
  </header>

  <!-- Alerts -->
  <?php if (!empty($msg)): ?>
    <div class="alert alert-success alert-dismissible fade show rounded-3 border-0 shadow-sm mb-4" role="alert">
      <i class="fa fa-circle-check me-2"></i> <?php echo htmlspecialchars($msg); ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  <?php endif; ?>
  <?php if (!empty($error)): ?>
    <div class="alert alert-danger alert-dismissible fade show rounded-3 border-0 shadow-sm mb-4" role="alert">
      <i class="fa fa-circle-exclamation me-2"></i> <?php echo htmlspecialchars($error); ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  <?php endif; ?>

  <div class="admin-content-inner">
    
    <!-- Primary Category Selector Bar -->
    <div class="mb-4">
      <div class="d-flex align-items-center justify-content-between mb-2">
        <h6 class="fw-bold text-dark small text-uppercase mb-0">
          <i class="fa fa-layer-group me-1 text-primary"></i> Academic Sections (46 Pages Total)
        </h6>
        <span class="badge bg-light text-muted border">6 Categories</span>
      </div>
      <div class="d-flex flex-wrap gap-2">
        <?php foreach ($categories as $ck => $cData): 
          $isCatActive = ($ck === $cat);
        ?>
          <a href="academic.php?cat=<?php echo $ck; ?>" class="acad-category-pill <?php echo $isCatActive ? 'active' : ''; ?>">
            <i class="fa <?php echo $cData['icon']; ?>"></i>
            <span><?php echo htmlspecialchars($cData['label']); ?></span>
            <span class="badge bg-secondary-subtle text-secondary"><?php echo $cData['count']; ?></span>
          </a>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Secondary Page Navigation Selector with Live Filter -->
    <div class="bg-white p-3 rounded-4 border shadow-sm mb-4">
      <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
        <div class="fw-bold text-dark small d-flex align-items-center gap-2">
          <i class="fa fa-file-lines text-warning"></i>
          <span>Select Page in <strong><?php echo htmlspecialchars($categories[$cat]['label']); ?></strong></span>
          <span class="badge bg-primary-subtle text-primary fw-bold"><?php echo count($pagesInCat); ?> Pages</span>
        </div>
        <div class="d-flex align-items-center gap-2">
          <div class="input-group input-group-sm" style="max-width: 240px;">
            <span class="input-group-text bg-light border-end-0"><i class="fa fa-search text-muted small"></i></span>
            <input type="text" id="pageFilterInput" class="form-control bg-light border-start-0" placeholder="Filter pages...">
          </div>
        </div>
      </div>
      <div class="d-flex flex-wrap gap-2" id="pagePillsContainer">
        <?php foreach ($pagesInCat as $pk => $pData): 
          $isPageActive = ($pk === $tab);
        ?>
          <a href="academic.php?cat=<?php echo $cat; ?>&tab=<?php echo $pk; ?>" 
             class="acad-page-pill <?php echo $isPageActive ? 'active' : ''; ?>" 
             data-name="<?php echo strtolower(htmlspecialchars($pData['title'])); ?>">
            <i class="fa <?php echo $pData['icon'] ?? 'fa-file-lines'; ?>"></i>
            <span><?php echo htmlspecialchars($pData['title']); ?></span>
          </a>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Current Page Banner & Quick Details -->
    <div class="card border-0 rounded-4 shadow-sm mb-4" style="background: linear-gradient(135deg, #0b2545 0%, #1e4d8c 100%); color: #ffffff;">
      <div class="card-body p-4 d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
        <div class="d-flex align-items-center gap-3">
          <div style="width: 52px; height: 52px; min-width: 52px; background: rgba(245,158,11,0.2); border: 1px solid rgba(245,158,11,0.4); border-radius: 14px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; color: #fbbf24;">
            <i class="fa <?php echo $pageMeta['icon'] ?? 'fa-graduation-cap'; ?>"></i>
          </div>
          <div>
            <span class="badge bg-warning text-dark fw-bold mb-1"><?php echo htmlspecialchars($pageMeta['category']); ?></span>
            <h4 class="fw-bold text-white mb-0"><?php echo htmlspecialchars($pageMeta['title']); ?></h4>
            <small class="text-white-50"><i class="fa fa-link me-1"></i> <?php echo htmlspecialchars($pageMeta['slug']); ?></small>
          </div>
        </div>
        <div class="d-flex align-items-center flex-wrap gap-2">
          <?php if ($cat === 'faculties'): ?>
            <a href="faculties.php?tab=<?php echo $tab; ?>" class="btn btn-light fw-bold text-primary rounded-pill px-3">
              <i class="fa fa-sliders me-1"></i> Open Faculty Course Editor
            </a>
          <?php elseif ($cat === 'committee'): ?>
            <a href="committee.php?tab=<?php echo $tab; ?>" class="btn btn-light fw-bold text-primary rounded-pill px-3">
              <i class="fa fa-users-gear me-1"></i> Open Committee Console
            </a>
          <?php endif; ?>
          <a href="<?php echo htmlspecialchars($publicUrl); ?>" target="_blank" class="btn btn-outline-light fw-bold rounded-pill px-3">
            <i class="fa fa-arrow-up-right-from-square me-1"></i> View Live Page
          </a>
        </div>
      </div>
    </div>

    <!-- Active Page Inner Tabs (Documents / SEO) -->
    <ul class="nav nav-tabs nav-tabs-custom mb-4" id="academicInnerTabs" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="tab-seo-btn" data-bs-toggle="tab" data-bs-target="#tab-seo" type="button" role="tab">
          <i class="fa fa-magnifying-glass-chart text-success me-1"></i> SEO &amp; Meta Details [SEO]
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="tab-docs-btn" data-bs-toggle="tab" data-bs-target="#tab-docs" type="button" role="tab">
          <i class="fa fa-folder-open text-warning me-1"></i> Attached Documents &amp; Circulars
          <span class="badge bg-primary ms-1"><?php echo count($attachedDocs); ?></span>
        </button>
      </li>
    </ul>

    <div class="tab-content" id="academicInnerTabsContent">
      
      <!-- TAB 1: SEO & META DETAILS -->
      <div class="tab-pane fade show active" id="tab-seo" role="tabpanel">
        
        <!-- Live Google SERP Preview Box -->
        <div class="serp-preview-box" id="serpPreviewBox">
          <div class="d-flex align-items-center justify-content-between mb-3">
            <div class="d-flex align-items-center gap-2">
              <small class="fw-bold text-muted text-uppercase" style="letter-spacing: 0.5px;">
                <i class="fa-brands fa-google text-primary me-1"></i> Google Search Live SERP Preview
              </small>
              <span class="badge bg-success-subtle text-success fw-bold">Live Simulation</span>
            </div>
            <div class="btn-group btn-group-sm" role="group" aria-label="SERP Mode">
              <button type="button" class="btn btn-outline-secondary active" id="serpDesktopBtn"><i class="fa fa-desktop me-1"></i> Desktop</button>
              <button type="button" class="btn btn-outline-secondary" id="serpMobileBtn"><i class="fa fa-mobile-screen me-1"></i> Mobile</button>
            </div>
          </div>
          <div class="serp-url">
            <i class="fa fa-globe globe-icon"></i>
            <span class="domain">https://www.sssutms.ac.in</span>
            <span class="breadcrumb-path">&rsaquo; <?php echo htmlspecialchars($pageMeta['slug']); ?></span>
          </div>
          <a href="javascript:void(0)" class="serp-title" id="serpTitlePreview">
            <?php echo htmlspecialchars(!empty($currentSeo['meta_title']) ? $currentSeo['meta_title'] : $pageMeta['title'] . ' - SSSUTMS'); ?>
          </a>
          <p class="serp-snippet" id="serpDescPreview">
            <?php echo htmlspecialchars(!empty($currentSeo['meta_description']) ? $currentSeo['meta_description'] : 'Official academic information, curriculum, regulatory compliance, and resources at Sri Satya Sai University of Technology & Medical Sciences.'); ?>
          </p>
        </div>

        <!-- SEO Edit Form -->
        <div class="card border-0 rounded-4 shadow-sm mb-4">
          <div class="card-header bg-white p-4 border-bottom">
            <div class="d-flex align-items-center justify-content-between">
              <div>
                <h5 class="fw-bold text-dark mb-1"><i class="fa fa-magnifying-glass-chart text-success me-2"></i> Page SEO Meta Configuration</h5>
                <small class="text-muted">Manage meta tags, description, keywords, canonical URLs, and social sharing image.</small>
              </div>
              <span class="badge bg-success text-white px-3 py-2 fw-bold"><i class="fa fa-bolt me-1"></i> Instant Public Sync</span>
            </div>
          </div>
          <div class="card-body p-4">
            <form method="POST" action="academic.php?cat=<?php echo $cat; ?>&tab=<?php echo $tab; ?>">
              <input type="hidden" name="action" value="save_seo">

              <!-- SEO Meta Title -->
              <div class="mb-4">
                <div class="d-flex align-items-center justify-content-between mb-1">
                  <label class="form-label fw-bold text-dark mb-0">
                    SEO Meta Title (Title Tag) <span class="text-danger">*</span>
                  </label>
                  <span id="metaTitleCountAcad" class="char-badge bg-secondary-subtle text-secondary">0 / 60 chars</span>
                </div>
                <input type="text" name="meta_title" id="metaTitleInputAcad" class="form-control form-control-lg fs-6" 
                       value="<?php echo htmlspecialchars($currentSeo['meta_title'] ?? ''); ?>" 
                       placeholder="e.g. <?php echo htmlspecialchars($pageMeta['title']); ?> | SSSUTMS Official" required>
                <small class="text-muted">Recommended length: 50-60 characters for optimal Google search ranking.</small>
              </div>

              <!-- SEO Meta Description -->
              <div class="mb-4">
                <div class="d-flex align-items-center justify-content-between mb-1">
                  <label class="form-label fw-bold text-dark mb-0">
                    SEO Meta Description <span class="text-danger">*</span>
                  </label>
                  <span id="metaDescCountAcad" class="char-badge bg-secondary-subtle text-secondary">0 / 160 chars</span>
                </div>
                <textarea name="meta_description" id="metaDescInputAcad" class="form-control" rows="3" 
                          placeholder="Provide a compelling 150-160 character summary of this academic page..." required><?php echo htmlspecialchars($currentSeo['meta_description'] ?? ''); ?></textarea>
                <small class="text-muted">Recommended length: 140-160 characters for maximum search engine CTR.</small>
              </div>

              <div class="row g-3 mb-4">
                <!-- Keywords -->
                <div class="col-md-6">
                  <label class="form-label fw-bold text-dark">Target SEO Keywords</label>
                  <input type="text" name="meta_keywords" class="form-control" 
                         value="<?php echo htmlspecialchars($currentSeo['meta_keywords'] ?? ''); ?>" 
                         placeholder="e.g. sssutms, academic, <?php echo strtolower(htmlspecialchars($pageMeta['title'])); ?>, admission, syllabus">
                  <small class="text-muted">Comma separated key terms for search engines.</small>
                </div>

                <!-- Canonical URL Override -->
                <div class="col-md-6">
                  <label class="form-label fw-bold text-dark">Canonical URL Override</label>
                  <input type="url" name="canonical_url" class="form-control" 
                         value="<?php echo htmlspecialchars($currentSeo['canonical_url'] ?? ''); ?>" 
                         placeholder="https://www.sssutms.ac.in/<?php echo htmlspecialchars($pageMeta['slug']); ?>">
                  <small class="text-muted">Leave blank to use default canonical URL.</small>
                </div>
              </div>

              <div class="row g-3 mb-4">
                <!-- Page Title / Heading -->
                <div class="col-md-6">
                  <label class="form-label fw-bold text-dark">Page Heading / Display Title</label>
                  <input type="text" name="page_title" class="form-control" 
                         value="<?php echo htmlspecialchars($currentSeo['page_title'] ?? $pageMeta['title']); ?>">
                </div>

                <!-- Banner Category -->
                <div class="col-md-6">
                  <label class="form-label fw-bold text-dark">Banner Breadcrumb Category</label>
                  <input type="text" name="banner_category" class="form-control" 
                         value="<?php echo htmlspecialchars($currentSeo['banner_category'] ?? $pageMeta['category']); ?>">
                </div>
              </div>

              <!-- Social Sharing Image Preview -->
              <div class="mb-4">
                <label class="form-label fw-bold text-dark">Social Graph / OpenGraph Image URL (`og:image`)</label>
                <div class="input-group mb-2">
                  <span class="input-group-text bg-white"><i class="fa fa-image text-primary"></i></span>
                  <input type="text" name="og_image" id="ogImageInputAcad" class="form-control" 
                         value="<?php echo htmlspecialchars($currentSeo['og_image'] ?? 'assets/images/logo/logo.jpg'); ?>" 
                         placeholder="assets/images/logo/logo.jpg">
                </div>
                <div class="d-flex align-items-center gap-3 mt-2">
                  <img src="../<?php echo htmlspecialchars(ltrim($currentSeo['og_image'] ?? 'assets/images/logo/logo.jpg', '/')); ?>" 
                       id="ogImagePreviewAcad" alt="OG Preview" width="100" height="55" class="rounded border object-fit-cover">
                  <small class="text-muted">Preview of thumbnail displayed when sharing page link on WhatsApp, LinkedIn, or Facebook.</small>
                </div>
              </div>

              <!-- Page Schema (JSON-LD) -->
              <div class="mb-4">
                <label class="form-label fw-bold text-dark">
                  <i class="fa-solid fa-code text-success me-1"></i> Page Schema Structured Data (JSON-LD)
                </label>
                <textarea name="page_schema" class="form-control font-monospace" rows="5" placeholder="Optional custom JSON-LD schema (leave blank for smart default)..." style="font-size: 0.85rem; background: #fafafa;"><?php echo htmlspecialchars($currentSeo['page_schema'] ?? (function_exists('get_page_schema') ? get_page_schema($pageMeta['slug']) : '')); ?></textarea>
                <small class="text-muted">Optional custom schema markup. Automatically embedded inside <code>&lt;script type="application/ld+json"&gt;</code> on this page.</small>
              </div>

              <div class="d-flex align-items-center justify-content-end gap-2 pt-3 border-top">
                <button type="submit" class="btn btn-primary px-4 py-2 fw-bold rounded-pill shadow-sm" style="background: linear-gradient(135deg, #0b2545 0%, #1e4d8c 100%); border: none;">
                  <i class="fa-floppy-disk me-1"></i> Save SEO &amp; Schema Details
                </button>
              </div>

            </form>
          </div>
        </div>

      </div>

      <!-- TAB 2: ATTACHED DOCUMENTS & ORDERS -->
      <div class="tab-pane fade" id="tab-docs" role="tabpanel">
        
        <div class="card border-0 rounded-4 shadow-sm mb-4">
          <div class="card-header bg-white p-4 border-bottom d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div>
              <h5 class="fw-bold text-dark mb-1"><i class="fa fa-folder-open text-warning me-2"></i> Attached Documents &amp; Circulars</h5>
              <small class="text-muted">Manage PDF circulars, official orders, metric reports, and guidelines attached to <?php echo htmlspecialchars($pageMeta['title']); ?>.</small>
            </div>
            <button type="button" class="btn btn-primary rounded-pill px-3 fw-bold" data-bs-toggle="modal" data-bs-target="#addDocModal">
              <i class="fa fa-plus me-1"></i> Attach New Document
            </button>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                  <tr>
                    <th style="width: 5%;">#</th>
                    <th style="width: 45%;">Document Title</th>
                    <th style="width: 15%;">Category</th>
                    <th style="width: 12%;">Date</th>
                    <th style="width: 10%;">Status</th>
                    <th style="width: 13%; text-align: right;">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (empty($attachedDocs)): ?>
                    <tr>
                      <td colspan="6" class="text-center py-5 text-muted">
                        <i class="fa fa-folder-open fs-1 text-secondary opacity-50 d-block mb-2"></i>
                        No dynamic documents attached yet. Click <strong>"Attach New Document"</strong> to upload PDF files or external links.
                      </td>
                    </tr>
                  <?php else: ?>
                    <?php foreach ($attachedDocs as $idx => $doc): 
                      $dPath = !empty($doc['file_path']) ? $doc['file_path'] : (!empty($doc['url']) ? $doc['url'] : '#');
                      if ($dPath !== '#' && !preg_match('/^https?:\/\//i', $dPath)) {
                        $dPath = '../' . ltrim($dPath, '/');
                      }
                    ?>
                      <tr>
                        <td><?php echo $idx + 1; ?></td>
                        <td>
                          <div class="fw-bold text-dark"><?php echo htmlspecialchars($doc['title'] ?? 'Untitled Document'); ?></div>
                          <small class="text-muted"><i class="fa fa-file-pdf text-danger me-1"></i> <?php echo htmlspecialchars($doc['file_path'] ?? $doc['url'] ?? ''); ?></small>
                        </td>
                        <td><span class="badge bg-info-subtle text-info fw-bold"><?php echo htmlspecialchars($doc['category'] ?? 'General'); ?></span></td>
                        <td><small class="text-muted"><?php echo htmlspecialchars($doc['date'] ?? '-'); ?></small></td>
                        <td>
                          <?php if (($doc['status'] ?? 'Active') === 'Active'): ?>
                            <span class="badge bg-success-subtle text-success fw-bold">Active</span>
                          <?php else: ?>
                            <span class="badge bg-secondary-subtle text-secondary fw-bold">Draft</span>
                          <?php endif; ?>
                        </td>
                        <td class="text-end">
                          <a href="<?php echo htmlspecialchars($dPath); ?>" target="_blank" class="btn btn-sm btn-outline-primary" title="View Document">
                            <i class="fa fa-arrow-up-right-from-square"></i>
                          </a>
                          <a href="academic.php?cat=<?php echo $cat; ?>&tab=<?php echo $tab; ?>&action=delete&id=<?php echo urlencode($doc['id'] ?? ''); ?>" 
                             class="btn btn-sm btn-outline-danger" 
                             onclick="return confirm('Are you sure you want to remove this attached document?');" title="Delete Document">
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

  </div>
</main>

<!-- Modal: Attach Document -->
<div class="modal fade" id="addDocModal" tabindex="-1" aria-labelledby="addDocModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
      <div class="modal-header text-white" style="background: linear-gradient(135deg, #0b2545 0%, #1e4d8c 100%);">
        <h6 class="modal-title fw-bold" id="addDocModalLabel">
          <i class="fa fa-file-circle-plus me-1 text-warning"></i> Attach Document to <?php echo htmlspecialchars($pageMeta['title']); ?>
        </h6>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <form method="POST" action="academic.php?cat=<?php echo $cat; ?>&tab=<?php echo $tab; ?>" enctype="multipart/form-data">
        <input type="hidden" name="action" value="save_doc">
        <div class="modal-body p-4 bg-light">
          
          <div class="mb-3">
            <label class="form-label fw-bold small text-muted">Document Title <span class="text-danger">*</span></label>
            <input type="text" name="title" class="form-control" placeholder="e.g. Academic Calendar Session 2026-27 (PDF)" required>
          </div>

          <div class="row g-2 mb-3">
            <div class="col-6">
              <label class="form-label fw-bold small text-muted">Category</label>
              <select name="category" class="form-select">
                <option value="Notification">Notification</option>
                <option value="Order">Order / Circular</option>
                <option value="Curriculum">Curriculum / Syllabus</option>
                <option value="Report">Report / Metric</option>
                <option value="General" selected>General</option>
              </select>
            </div>
            <div class="col-6">
              <label class="form-label fw-bold small text-muted">Date</label>
              <input type="date" name="date" class="form-control" value="<?php echo date('Y-m-d'); ?>">
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label fw-bold small text-muted">Upload Document (PDF / DOC / Image)</label>
            <input type="file" name="doc_file" class="form-control" accept=".pdf,.doc,.docx,.xls,.xlsx,.zip,.jpg,.png">
            <small class="text-muted">Or enter external file URL below if hosted elsewhere.</small>
          </div>

          <div class="mb-3">
            <label class="form-label fw-bold small text-muted">Direct File Link / URL</label>
            <input type="text" name="file_url" class="form-control" placeholder="assets/documents/sample.pdf or https://...">
          </div>

          <div class="mb-2">
            <label class="form-label fw-bold small text-muted">Status</label>
            <select name="status" class="form-select">
              <option value="Active" selected>Active (Live on Website)</option>
              <option value="Draft">Draft (Hidden)</option>
            </select>
          </div>

        </div>
        <div class="modal-footer bg-white">
          <button type="button" class="btn btn-light rounded-pill px-3" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary rounded-pill px-4 fw-bold" style="background: linear-gradient(135deg, #0b2545 0%, #1e4d8c 100%); border: none;">
            <i class="fa fa-upload me-1"></i> Attach Document
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/admin.js"></script>
<script>
  // Real-time SEO Snippet & Character Counters
  const titleInput = document.getElementById('metaTitleInputAcad');
  const descInput = document.getElementById('metaDescInputAcad');
  const serpTitle = document.getElementById('serpTitlePreview');
  const serpDesc = document.getElementById('serpDescPreview');
  const titleCount = document.getElementById('metaTitleCountAcad');
  const descCount = document.getElementById('metaDescCountAcad');
  const ogInput = document.getElementById('ogImageInputAcad');
  const ogPreview = document.getElementById('ogImagePreviewAcad');
  const serpBox = document.getElementById('serpPreviewBox');
  const desktopBtn = document.getElementById('serpDesktopBtn');
  const mobileBtn = document.getElementById('serpMobileBtn');
  const pageFilterInput = document.getElementById('pageFilterInput');
  const pagePills = document.querySelectorAll('#pagePillsContainer .acad-page-pill');

  // Quick Live Filter for Page Pills
  if (pageFilterInput) {
    pageFilterInput.addEventListener('input', function() {
      const q = this.value.trim().toLowerCase();
      pagePills.forEach(pill => {
        const name = pill.getAttribute('data-name') || '';
        if (name.includes(q)) {
          pill.style.display = 'inline-flex';
        } else {
          pill.style.display = 'none';
        }
      });
    });
  }

  // Desktop / Mobile SERP View Switcher
  if (desktopBtn && mobileBtn && serpBox) {
    desktopBtn.addEventListener('click', () => {
      desktopBtn.classList.add('active');
      mobileBtn.classList.remove('active');
      serpBox.classList.remove('mobile-mode');
    });
    mobileBtn.addEventListener('click', () => {
      mobileBtn.classList.add('active');
      desktopBtn.classList.remove('active');
      serpBox.classList.add('mobile-mode');
    });
  }

  function updateSeoPreview() {
    if (titleInput && serpTitle) {
      const len = titleInput.value.trim().length;
      serpTitle.textContent = titleInput.value.trim() || '<?php echo addslashes($pageMeta['title']); ?> - SSSUTMS';
      if (titleCount) {
        titleCount.textContent = `${len} / 60 chars`;
        if (len >= 45 && len <= 65) {
          titleCount.className = 'char-badge bg-success-subtle text-success';
        } else if (len > 65) {
          titleCount.className = 'char-badge bg-danger-subtle text-danger';
        } else {
          titleCount.className = 'char-badge bg-secondary-subtle text-secondary';
        }
      }
    }

    if (descInput && serpDesc) {
      const len = descInput.value.trim().length;
      serpDesc.textContent = descInput.value.trim() || 'Official academic information, curriculum, regulatory compliance, and resources at Sri Satya Sai University of Technology & Medical Sciences.';
      if (descCount) {
        descCount.textContent = `${len} / 160 chars`;
        if (len >= 130 && len <= 165) {
          descCount.className = 'char-badge bg-success-subtle text-success';
        } else if (len > 165) {
          descCount.className = 'char-badge bg-danger-subtle text-danger';
        } else {
          descCount.className = 'char-badge bg-secondary-subtle text-secondary';
        }
      }
    }

    if (ogInput && ogPreview) {
      const url = ogInput.value.trim();
      if (url) {
        ogPreview.src = url.startsWith('http') ? url : ('../' + url.replace(/^\//, ''));
      }
    }
  }

  if (titleInput) titleInput.addEventListener('input', updateSeoPreview);
  if (descInput) descInput.addEventListener('input', updateSeoPreview);
  if (ogInput) ogInput.addEventListener('input', updateSeoPreview);

  updateSeoPreview();
</script>

</body>
</html>
