<?php
require_once __DIR__ . '/../config.php';
require_admin_auth();

$msg = '';
$error = '';

// Load all about pages
$allPages = get_all_about_pages('all');
$groups = [
    'all'                     => 'All About Pages',
    'Overview & History'      => 'Overview & History',
    'Constituent Institutes'  => 'Constituent Institutes',
    'University Officials'    => 'University Officials (Inner Pages)',
    'Approvals & Ordinances'  => 'Approvals & Ordinances',
    'Amenities'               => 'Campus Amenities',
    'MOU & Activities'        => 'MOU & Activities',
    'Compliance & Portals'    => 'Compliance & Portals'
];

$activeGroup = $_GET['group'] ?? 'all';
$editSlug = $_GET['edit'] ?? '';

// Helper for image / PDF uploads
function handle_about_upload($fileKey, $defaultPath = '') {
    if (isset($_FILES[$fileKey]) && $_FILES[$fileKey]['error'] === UPLOAD_ERR_OK) {
        $allowed = ['jpg', 'jpeg', 'png', 'webp', 'svg', 'gif', 'pdf'];
        $ext = strtolower(pathinfo($_FILES[$fileKey]['name'], PATHINFO_EXTENSION));
        if (in_array($ext, $allowed)) {
            $filename = 'about_' . time() . '_' . rand(100, 999) . '.' . $ext;
            $dest = UPLOAD_DIR . '/about/' . $filename;
            if (move_uploaded_file($_FILES[$fileKey]['tmp_name'], $dest)) {
                return 'assets/uploads/about/' . $filename;
            }
        }
    }
    return $defaultPath;
}

// POST Handling
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    // 1. Save Page Content / Profile
    if ($action === 'save_page') {
        $slug = clean_input($_POST['slug'] ?? '');
        if (isset($allPages[$slug])) {
            $pageData = $allPages[$slug];

            $pageData['title'] = clean_input($_POST['title'] ?? $pageData['title']);
            $pageData['banner_title'] = clean_input($_POST['banner_title'] ?? $pageData['banner_title']);
            $pageData['banner_category'] = clean_input($_POST['banner_category'] ?? $pageData['banner_category']);

            if (isset($_POST['content_html'])) {
                $pageData['content_html'] = trim($_POST['content_html']);
            }

            // Profile specific fields
            if (in_array($pageData['type'] ?? '', ['profile', 'institute_profile'])) {
                $pageData['name'] = clean_input($_POST['name'] ?? $pageData['name']);
                $pageData['designation'] = clean_input($_POST['designation'] ?? $pageData['designation']);
                $pageData['education'] = clean_input($_POST['education'] ?? $pageData['education']);
                $pageData['experience'] = clean_input($_POST['experience'] ?? $pageData['experience']);
                $pageData['quote'] = clean_input($_POST['quote'] ?? ($pageData['quote'] ?? ''));
                $pageData['bio'] = trim($_POST['bio'] ?? ($pageData['bio'] ?? ''));

                $photoPath = handle_about_upload('photo_file', trim($_POST['photo_text'] ?? ($pageData['photo'] ?? '')));
                $pageData['photo'] = $photoPath;
            }

            // Vision & Mission specific fields
            if (($pageData['type'] ?? '') === 'vision_mission') {
                $pageData['vision'] = trim($_POST['vision'] ?? ($pageData['vision'] ?? ''));
                $pageData['mission'] = trim($_POST['mission'] ?? ($pageData['mission'] ?? ''));
            }

            // SEO & Meta Details
            $pageData['meta_title'] = clean_input($_POST['meta_title'] ?? ($pageData['meta_title'] ?? ''));
            $pageData['meta_description'] = clean_input($_POST['meta_description'] ?? ($pageData['meta_description'] ?? ''));
            $pageData['meta_keywords'] = clean_input($_POST['meta_keywords'] ?? ($pageData['meta_keywords'] ?? ''));
            $pageData['canonical_url'] = clean_input($_POST['canonical_url'] ?? ($pageData['canonical_url'] ?? ''));
            $pageData['og_image'] = clean_input($_POST['og_image'] ?? ($pageData['og_image'] ?? ''));

            save_about_page($slug, $pageData);
            $allPages = get_all_about_pages('all');
            $msg = 'Page "' . htmlspecialchars($pageData['banner_title']) . '" saved successfully! Reflection is live on the website.';
            $editSlug = $slug;
        }
    }

    // 2. Add PDF Document to this page
    if ($action === 'add_document') {
        $slug = clean_input($_POST['slug'] ?? '');
        $docTitle = clean_input($_POST['doc_title'] ?? '');
        $docCategory = clean_input($_POST['doc_category'] ?? 'General');
        
        $docFile = handle_about_upload('doc_file');
        if (empty($docFile)) {
            $docFile = trim($_POST['doc_file_url'] ?? '');
        }

        if (!empty($slug) && !empty($docTitle) && !empty($docFile)) {
            $pageData = $allPages[$slug] ?? [];
            $docKey = $pageData['doc_key'] ?? str_replace('/', '_', $pageData['file'] ?? $slug);
            $docKey = str_replace('.php', '', $docKey);

            $docData = [
                'id' => time() . rand(100, 999),
                'title' => $docTitle,
                'category' => $docCategory,
                'file' => $docFile,
                'date' => date('Y-m-d'),
                'status' => 'Active'
            ];

            save_page_document($docKey, $docData, 'About', $pageData['banner_title'] ?? $slug);
            $msg = 'Document "' . htmlspecialchars($docTitle) . '" successfully attached to page!';
            $editSlug = $slug;
        } else {
            $error = 'Document Title and a valid PDF File or URL are required.';
            $editSlug = $slug;
        }
    }

    // 3. Delete PDF Document from this page
    if ($action === 'delete_document') {
        $slug = clean_input($_POST['slug'] ?? '');
        $docId = clean_input($_POST['doc_id'] ?? '');
        $pageData = $allPages[$slug] ?? [];
        $docKey = $pageData['doc_key'] ?? str_replace('/', '_', $pageData['file'] ?? $slug);
        $docKey = str_replace('.php', '', $docKey);

        if (!empty($docKey) && !empty($docId)) {
            delete_page_document($docKey, $docId);
            $msg = 'Document removed successfully from this page!';
            $editSlug = $slug;
        }
    }

    // 4. Save Public Disclosure Parameter
    if ($action === 'save_disclosure_item') {
        $itemId = clean_input($_POST['item_id'] ?? '');
        $catCode = clean_input($_POST['category_code'] ?? 'A');
        $catTitle = clean_input($_POST['category_title'] ?? 'General Compliance');
        $paramName = clean_input($_POST['param_name'] ?? '');
        $url = trim($_POST['link_url'] ?? '');
        $linkText = clean_input($_POST['link_text'] ?? 'View Details');
        $isNa = isset($_POST['is_na']) && $_POST['is_na'] === '1';

        $pdfUpload = handle_about_upload('pdf_upload');
        if (!empty($pdfUpload)) {
            $url = $pdfUpload;
        }

        $allDisclosures = get_public_disclosures(true);
        if (!isset($allDisclosures[$catCode])) {
            $allDisclosures[$catCode] = [
                'code' => $catCode,
                'title' => $catTitle,
                'items' => []
            ];
        }

        $found = false;
        if (!empty($itemId)) {
            foreach ($allDisclosures as &$c) {
                foreach ($c['items'] as &$itm) {
                    if (($itm['id'] ?? '') === $itemId) {
                        $itm['category_title'] = $catTitle;
                        $itm['param_text'] = $paramName;
                        $itm['param_html'] = $paramName;
                        $itm['is_na'] = $isNa;
                        $itm['buttons'] = [];
                        if ($isNa) {
                            $itm['buttons'][] = ['type' => 'na', 'text' => 'N/A', 'url' => ''];
                        } else {
                            $bType = (stripos($url, '.pdf') !== false || stripos($linkText, 'PDF') !== false) ? 'danger' : 'primary';
                            $bIcon = (stripos($url, '.pdf') !== false || stripos($linkText, 'PDF') !== false) ? 'fa-file-pdf' : (stripos($linkText, 'Profile') !== false ? 'fa-user' : (strpos($url, 'http') === 0 ? 'fa-arrow-up-right-from-square' : 'fa-arrow-right-long'));
                            $itm['buttons'][] = [
                                'type' => $bType,
                                'text' => $linkText,
                                'url' => $url,
                                'icon' => $bIcon
                            ];
                        }
                        $found = true;
                        break 2;
                    }
                }
            }
        }

        if (!$found && !empty($paramName)) {
            $newItemId = $catCode . '_' . (count($allDisclosures[$catCode]['items']) + 1);
            $buttons = [];
            if ($isNa) {
                $buttons[] = ['type' => 'na', 'text' => 'N/A', 'url' => ''];
            } else {
                $bType = (stripos($url, '.pdf') !== false || stripos($linkText, 'PDF') !== false) ? 'danger' : 'primary';
                $bIcon = (stripos($url, '.pdf') !== false || stripos($linkText, 'PDF') !== false) ? 'fa-file-pdf' : (stripos($linkText, 'Profile') !== false ? 'fa-user' : (strpos($url, 'http') === 0 ? 'fa-arrow-up-right-from-square' : 'fa-arrow-right-long'));
                $buttons[] = [
                    'type' => $bType,
                    'text' => $linkText,
                    'url' => $url,
                    'icon' => $bIcon
                ];
            }
            $allDisclosures[$catCode]['items'][] = [
                'id' => $newItemId,
                'category_code' => $catCode,
                'category_title' => $catTitle,
                'param_html' => $paramName,
                'param_text' => $paramName,
                'link' => $url,
                'link_clean' => $url,
                'link_text' => $linkText,
                'is_na' => $isNa,
                'buttons' => $buttons
            ];
        }

        save_public_disclosures($allDisclosures);
        $msg = 'Public Self Disclosure parameter updated successfully!';
        $editSlug = 'Public_Self_Disclosure';
    }

    // 5. Delete Public Disclosure Item
    if ($action === 'delete_disclosure_item') {
        $itemId = clean_input($_POST['item_id'] ?? '');
        $allDisclosures = get_public_disclosures(true);
        foreach ($allDisclosures as &$c) {
            $c['items'] = array_values(array_filter($c['items'], fn($itm) => ($itm['id'] ?? '') !== $itemId));
        }
        save_public_disclosures($allDisclosures);
        $msg = 'Disclosure parameter deleted successfully!';
        $editSlug = 'Public_Self_Disclosure';
    }
}

// Calculate group counts
$groupCounts = ['all' => count($allPages)];
foreach ($allPages as $p) {
    $grp = $p['group'] ?? 'Overview & History';
    $groupCounts[$grp] = ($groupCounts[$grp] ?? 0) + 1;
}

// Filtered list
$filteredPages = $allPages;
if ($activeGroup !== 'all' && isset($groups[$activeGroup])) {
    $filteredPages = array_filter($allPages, fn($p) => ($p['group'] ?? '') === $activeGroup);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Section Pages Manager - SSSUTMS Admin</title>
  <link rel="icon" type="image/jpeg" href="../assets/images/logo/logo.jpg">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/admin.css">
  <style>
    /* Stat Cards */
    .stat-icon-wrap {
      width: 50px;
      height: 50px;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 12px;
      flex-shrink: 0;
    }
    .stat-icon-wrap.stat-primary {
      background: rgba(11, 37, 69, 0.08) !important;
      color: #0b2545 !important;
    }
    .stat-icon-wrap.stat-success {
      background: rgba(16, 185, 129, 0.12) !important;
      color: #059669 !important;
    }
    .stat-icon-wrap.stat-warning {
      background: rgba(245, 158, 11, 0.15) !important;
      color: #d97706 !important;
    }
    .stat-icon-wrap.stat-info {
      background: rgba(6, 182, 212, 0.15) !important;
      color: #0891b2 !important;
    }

    /* Page Item Grid Cards - STRICTLY IDENTICAL HEIGHT & WIDTH */
    .page-item-card {
      background: #ffffff;
      border: 1px solid #e2e8f0;
      border-radius: 14px;
      padding: 1.15rem 1.25rem 1rem;
      transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
      width: 100% !important;
      height: 100% !important;
      min-height: 220px;
      display: flex !important;
      flex-direction: column !important;
      justify-content: space-between !important;
      box-shadow: 0 2px 6px rgba(11, 37, 69, 0.03);
      position: relative;
      overflow: hidden;
      box-sizing: border-box;
    }
    .page-item-card:hover {
      border-color: #cbd5e1;
      box-shadow: 0 10px 25px rgba(11, 37, 69, 0.09);
      transform: translateY(-3px);
    }
    .page-item-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 3px;
      background: linear-gradient(90deg, #0b2545 0%, #134074 100%);
      opacity: 0;
      transition: opacity 0.25s ease;
    }
    .page-item-card:hover::before {
      opacity: 1;
    }

    /* Fixed uniform slot heights */
    .card-top-badges {
      height: 26px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 0.55rem;
    }
    .page-card-title {
      font-size: 0.98rem;
      font-weight: 700;
      color: #0b2545;
      line-height: 1.35;
      height: 42px;
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
      overflow: hidden;
      margin-bottom: 0.35rem;
    }
    .page-card-path {
      height: 24px;
      display: flex;
      align-items: center;
      margin-bottom: 0.65rem;
      font-size: 0.75rem;
    }
    .page-card-desc {
      font-size: 0.82rem;
      color: #64748b;
      line-height: 1.45;
      height: 38px;
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
      overflow: hidden;
      margin-bottom: 0.75rem;
    }
    .page-card-footer {
      padding-top: 0.75rem;
      border-top: 1px solid #f1f5f9;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 0.5rem;
      margin-top: auto;
    }

    /* Group Filter Pills */
    .group-pill-btn {
      padding: 0.5rem 1rem;
      font-weight: 600;
      border-radius: 20px;
      font-size: 0.85rem;
      text-decoration: none;
      transition: all 0.2s;
      white-space: nowrap;
      display: inline-flex;
      align-items: center;
      gap: 6px;
    }
    .group-pill-btn.active {
      background: #0b2545;
      color: #ffffff;
      box-shadow: 0 4px 12px rgba(11, 37, 69, 0.2);
    }
    .group-pill-btn:not(.active) {
      background: #f1f5f9;
      color: #475569;
    }
    .group-pill-btn:not(.active):hover {
      background: #e2e8f0;
      color: #0b2545;
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
    <li><a href="about.php" class="nav-link active"><i class="fa fa-circle-info"></i> About Pages (42)</a></li>
    <li><a href="faculties.php" class="nav-link"><i class="fa fa-graduation-cap"></i> Faculties &amp; Depts (14)</a></li>
    <li><a href="documents.php" class="nav-link"><i class="fa fa-folder-open"></i> Documents & Page PDFs</a></li>
    <li><a href="notices.php" class="nav-link"><i class="fa fa-bullhorn"></i> Notices & Circulars</a></li>
    <li><a href="events.php" class="nav-link"><i class="fa fa-calendar-days"></i> Events & Workshops</a></li>
    <li><a href="schemes.php" class="nav-link"><i class="fa fa-book-open"></i> Curriculum Schemes</a></li>
    <li><a href="pages.php" class="nav-link"><i class="fa fa-file-lines"></i> Dynamic CMS Pages</a></li>
    <li><a href="applications.php" class="nav-link"><i class="fa fa-user-graduate"></i> Student Registrations</a></li>
    <li><a href="inquiries.php" class="nav-link"><i class="fa fa-envelope-open-text"></i> Admission Leads</a></li>
    <li><a href="settings.php" class="nav-link"><i class="fa fa-sliders"></i> Portal Settings</a></li>
    <li class="mt-4 pt-3 border-top border-white border-opacity-10">
      <a href="../About/Background.php" target="_blank" class="nav-link text-white-50"><i class="fa fa-arrow-up-right-from-square"></i> Visit About Section</a>
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
        <h5 class="fw-bold mb-0 text-dark">About Section Pages Manager</h5>
        <small class="text-muted">Directly manage all <?php echo count($allPages); ?> sub-pages and inner nested pages under the About menu.</small>
      </div>
    </div>
    <div class="d-flex align-items-center gap-3">
      <a href="../About/Background.php" target="_blank" class="btn btn-outline-primary btn-sm rounded-pill d-none d-md-inline-flex align-items-center gap-1">
        <i class="fa fa-arrow-up-right-from-square"></i> Preview Public About
      </a>
      <div class="user-badge d-flex align-items-center gap-2">
        <div class="avatar bg-primary text-white rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 36px; height: 36px;">A</div>
        <div class="d-none d-sm-block text-start">
          <span class="d-block fw-bold small text-dark leading-none">Administrator</span>
          <span class="d-block text-muted" style="font-size: 11px;">About Section Admin</span>
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
    <div class="row g-3 mb-4 align-items-stretch">
      <div class="col-6 col-md-3 d-flex">
        <div class="card border-0 shadow-sm p-3 bg-white w-100 rounded-3">
          <div class="d-flex align-items-center gap-3">
            <div class="stat-icon-wrap stat-primary">
              <i class="fa fa-file-lines fs-4"></i>
            </div>
            <div>
              <h3 class="fw-bold mb-0 text-dark"><?php echo count($allPages); ?></h3>
              <small class="text-muted fw-semibold">Total About Pages</small>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6 col-md-3 d-flex">
        <div class="card border-0 shadow-sm p-3 bg-white w-100 rounded-3">
          <div class="d-flex align-items-center gap-3">
            <div class="stat-icon-wrap stat-success">
              <i class="fa fa-user-tie fs-4"></i>
            </div>
            <div>
              <h3 class="fw-bold mb-0 text-dark">17</h3>
              <small class="text-muted fw-semibold">University Officials</small>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6 col-md-3 d-flex">
        <div class="card border-0 shadow-sm p-3 bg-white w-100 rounded-3">
          <div class="d-flex align-items-center gap-3">
            <div class="stat-icon-wrap stat-warning">
              <i class="fa fa-stamp fs-4"></i>
            </div>
            <div>
              <h3 class="fw-bold mb-0 text-dark">2</h3>
              <small class="text-muted fw-semibold">Approvals &amp; Ordinances</small>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6 col-md-3 d-flex">
        <div class="card border-0 shadow-sm p-3 bg-white w-100 rounded-3">
          <div class="d-flex align-items-center gap-3">
            <div class="stat-icon-wrap stat-info">
              <i class="fa fa-hotel fs-4"></i>
            </div>
            <div>
              <h3 class="fw-bold mb-0 text-dark">5</h3>
              <small class="text-muted fw-semibold">Campus Amenities</small>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Category Group Filter Pills & Search -->
    <div class="card border-0 shadow-sm mb-4">
      <div class="card-body p-3">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
          <!-- Group Filter Pills -->
          <div class="d-flex flex-nowrap overflow-x-auto gap-2 pb-2 pb-md-0" style="scrollbar-width: thin;">
            <?php foreach ($groups as $gKey => $gLabel): 
              $isActive = ($activeGroup === $gKey);
              $cnt = $groupCounts[$gKey] ?? 0;
            ?>
              <a href="about.php?group=<?php echo urlencode($gKey); ?>" class="group-pill-btn <?php echo $isActive ? 'active' : ''; ?>">
                <?php echo htmlspecialchars($gLabel); ?>
                <span class="badge <?php echo $isActive ? 'bg-light text-dark' : 'bg-white text-muted border'; ?>"><?php echo $cnt; ?></span>
              </a>
            <?php endforeach; ?>
          </div>

          <!-- Instant Search Box -->
          <div class="position-relative" style="min-width: 250px;">
            <input type="text" id="aboutPageSearch" class="form-control form-control-sm ps-4" placeholder="Search any about page...">
            <i class="fa fa-magnifying-glass position-absolute top-50 start-0 translate-middle-y ms-2 text-muted small"></i>
          </div>
        </div>
      </div>
    </div>

    <!-- Active Page Edit Form (if selected) -->
    <?php if (!empty($editSlug) && isset($allPages[$editSlug])): 
      $p = $allPages[$editSlug];
      $docKey = $p['doc_key'] ?? str_replace(['/', '.php'], ['_', ''], $p['file']);
      $pageDocs = get_page_documents($docKey);
    ?>
      <div class="card border-0 shadow-sm mb-4 border-start border-4 border-primary">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center flex-wrap gap-2">
          <div>
            <span class="badge bg-primary text-white mb-1"><?php echo htmlspecialchars($p['group']); ?></span>
            <h5 class="fw-bold mb-0 text-dark">Editing Page: <?php echo htmlspecialchars($p['banner_title']); ?></h5>
            <small class="text-muted">Source: <code><?php echo htmlspecialchars($p['file']); ?></code></small>
          </div>
          <div class="d-flex align-items-center gap-2">
            <a href="../<?php echo htmlspecialchars($p['file']); ?>" target="_blank" class="btn btn-outline-secondary btn-sm">
              <i class="fa fa-arrow-up-right-from-square me-1"></i> View Live Page
            </a>
            <a href="about.php?group=<?php echo urlencode($activeGroup); ?>" class="btn btn-close" aria-label="Close Editor"></a>
          </div>
        </div>

        <div class="card-body p-4">
          <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="action" value="save_page">
            <input type="hidden" name="slug" value="<?php echo htmlspecialchars($editSlug); ?>">

            <!-- Tab Navigation Header -->
            <ul class="nav nav-pills mb-4 gap-2 border-bottom pb-3" id="aboutEditTabNav" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active fw-bold px-4 py-2" id="tab-abt-general" data-bs-toggle="pill" data-bs-target="#pane-abt-general" type="button" role="tab">
                  <i class="fa-solid fa-sliders me-2"></i>General Content &amp; Media
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link fw-bold px-4 py-2" id="tab-abt-seo" data-bs-toggle="pill" data-bs-target="#pane-abt-seo" type="button" role="tab" style="background: rgba(16,185,129,0.08); color: #047857; border: 1px solid rgba(16,185,129,0.3);">
                  <i class="fa-solid fa-magnifying-glass me-2"></i>SEO &amp; Meta Details <span class="badge bg-success ms-1">SEO</span>
                </button>
              </li>
            </ul>

            <div class="tab-content" id="aboutEditTabContent">
              <!-- TAB 1: General Content & Media -->
              <div class="tab-pane fade show active" id="pane-abt-general" role="tabpanel">

                <div class="row g-3 mb-4">
                  <div class="col-md-4">
                    <label class="form-label small fw-bold">Page Title (Browser Tab Title)</label>
                    <input type="text" name="title" class="form-control" value="<?php echo htmlspecialchars($p['title']); ?>" required>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label small fw-bold">Banner Heading Title</label>
                    <input type="text" name="banner_title" class="form-control" value="<?php echo htmlspecialchars($p['banner_title']); ?>" required>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label small fw-bold">Banner Breadcrumb Category</label>
                    <input type="text" name="banner_category" class="form-control" value="<?php echo htmlspecialchars($p['banner_category'] ?? 'About'); ?>" required>
                  </div>
                </div>

                <!-- Profile Specific Fields (Chancellor, VC, Registrar, Principals, etc.) -->
                <?php if (in_array($p['type'] ?? '', ['profile', 'institute_profile'])): ?>
                  <div class="p-3 border rounded bg-light mb-4">
                    <h6 class="fw-bold text-dark mb-3"><i class="fa fa-user-tie text-primary me-2"></i>Official Leadership Profile Details</h6>
                    <div class="row g-3">
                      <div class="col-md-6">
                        <label class="form-label small fw-bold">Official Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($p['name'] ?? ''); ?>">
                      </div>
                      <div class="col-md-6">
                        <label class="form-label small fw-bold">Official Designation</label>
                        <input type="text" name="designation" class="form-control" value="<?php echo htmlspecialchars($p['designation'] ?? ''); ?>">
                      </div>
                      <div class="col-md-6">
                        <label class="form-label small fw-bold">Photo File (Upload to Replace)</label>
                        <input type="file" name="photo_file" class="form-control form-control-sm" accept="image/*">
                        <input type="text" name="photo_text" class="form-control form-control-sm mt-1" value="<?php echo htmlspecialchars($p['photo'] ?? ''); ?>" placeholder="Or image path">
                      </div>
                      <div class="col-md-6">
                        <label class="form-label small fw-bold">Education / Qualifications</label>
                        <input type="text" name="education" class="form-control" value="<?php echo htmlspecialchars($p['education'] ?? ''); ?>">
                      </div>
                      <div class="col-md-6">
                        <label class="form-label small fw-bold">Experience / Leadership</label>
                        <input type="text" name="experience" class="form-control" value="<?php echo htmlspecialchars($p['experience'] ?? ''); ?>">
                      </div>
                      <div class="col-md-6">
                        <label class="form-label small fw-bold">Highlighted Quote / Banner Tagline</label>
                        <input type="text" name="quote" class="form-control" value="<?php echo htmlspecialchars($p['quote'] ?? ''); ?>">
                      </div>
                      <div class="col-12">
                        <label class="form-label small fw-bold">Biography & Credentials Summary</label>
                        <textarea name="bio" class="form-control" rows="3"><?php echo htmlspecialchars($p['bio'] ?? ''); ?></textarea>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>

                <!-- Vision & Mission Specific Fields -->
                <?php if (($p['type'] ?? '') === 'vision_mission'): ?>
                  <div class="p-3 border rounded bg-light mb-4">
                    <h6 class="fw-bold text-dark mb-3"><i class="fa fa-compass text-warning me-2"></i>Institutional Vision & Mission</h6>
                    <div class="row g-3">
                      <div class="col-md-6">
                        <label class="form-label small fw-bold">Vision Statement</label>
                        <textarea name="vision" class="form-control" rows="4"><?php echo htmlspecialchars($p['vision'] ?? ''); ?></textarea>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label small fw-bold">Mission Statement</label>
                        <textarea name="mission" class="form-control" rows="4"><?php echo htmlspecialchars($p['mission'] ?? ''); ?></textarea>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>

                <!-- Standard Narrative HTML Content -->
                <?php if (isset($p['content_html']) || in_array($p['type'] ?? '', ['content', 'table_members', 'documents'])): ?>
                  <div class="mb-4">
                    <label class="form-label small fw-bold">Main Page Content (HTML & Text)</label>
                    <textarea name="content_html" class="form-control font-monospace small" rows="8"><?php echo htmlspecialchars($p['content_html'] ?? ''); ?></textarea>
                    <small class="text-muted">You can write structured HTML paragraphs, bold headings, lists, or tables.</small>
                  </div>
                <?php endif; ?>

              </div><!-- end TAB 1 -->

              <!-- TAB 2: SEO & Meta Details -->
              <div class="tab-pane fade" id="pane-abt-seo" role="tabpanel">

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
                          <span class="text-muted ms-1" style="font-size: 12px;">https://sssutms.co.in › About › <?php echo htmlspecialchars($editSlug); ?></span>
                        </div>
                      </div>
                      <h5 id="seoPreviewTitleAbt" class="fw-normal mb-1 text-primary" style="color: #1a0dab !important; font-size: 20px; line-height: 1.3; cursor: pointer;">
                        <?php echo htmlspecialchars($p['meta_title'] ?? ($p['title'] ?? 'About Page - SSSUTMS')); ?>
                      </h5>
                      <p id="seoPreviewDescAbt" class="mb-0 text-muted" style="color: #4d5156 !important; font-size: 14px; line-height: 1.58;">
                        <?php echo htmlspecialchars(!empty($p['meta_description']) ? $p['meta_description'] : 'Discover comprehensive institutional details, leadership, background, and governance at Sri Satya Sai University (SSSUTMS).'); ?>
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
                      <small class="text-muted"><span id="metaTitleCountAbt">0</span> / 60 chars <span class="badge bg-secondary ms-1">Recommended: 50-60</span></small>
                    </div>
                    <input type="text" name="meta_title" id="seoInputTitleAbt" class="form-control" value="<?php echo htmlspecialchars($p['meta_title'] ?? ''); ?>" placeholder="e.g. <?php echo htmlspecialchars($p['title']); ?>" oninput="updateSeoPreviewAbt()">
                    <small class="text-muted">Displayed as the main clickable headline in Google search results and browser tab.</small>
                  </div>

                  <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                      <label class="form-label small fw-bold mb-0">
                        <i class="fa-solid fa-align-left text-success me-1"></i> SEO Meta Description
                      </label>
                      <small class="text-muted"><span id="metaDescCountAbt">0</span> / 160 chars <span class="badge bg-secondary ms-1">Recommended: 150-160</span></small>
                    </div>
                    <textarea name="meta_description" id="seoInputDescAbt" class="form-control" rows="3" placeholder="Provide a compelling 150-160 character description of this page for Google search snippets..." oninput="updateSeoPreviewAbt()"><?php echo htmlspecialchars($p['meta_description'] ?? ''); ?></textarea>
                    <small class="text-muted">Google snippet description to entice prospective students and researchers to click.</small>
                  </div>

                  <div class="col-md-6">
                    <label class="form-label small fw-bold">
                      <i class="fa-solid fa-tags text-warning me-1"></i> Target SEO Keywords (Comma Separated)
                    </label>
                    <input type="text" name="meta_keywords" class="form-control" value="<?php echo htmlspecialchars($p['meta_keywords'] ?? ''); ?>" placeholder="e.g. SSSUTMS, <?php echo htmlspecialchars($p['banner_title']); ?>, Higher Education MP">
                    <small class="text-muted">Target keywords for search engine discovery and category relevance.</small>
                  </div>

                  <div class="col-md-6">
                    <label class="form-label small fw-bold">
                      <i class="fa-solid fa-link text-info me-1"></i> Canonical URL Override (Optional)
                    </label>
                    <input type="text" name="canonical_url" class="form-control" value="<?php echo htmlspecialchars($p['canonical_url'] ?? ''); ?>" placeholder="Leave blank for automatic canonical URL">
                    <small class="text-muted">Preferred canonical page link for duplicate prevention.</small>
                  </div>

                  <div class="col-12">
                    <label class="form-label small fw-bold">
                      <i class="fa-solid fa-image text-danger me-1"></i> Social Sharing Preview Image (og:image)
                    </label>
                    <div class="input-group">
                      <span class="input-group-text bg-light"><i class="fa fa-share-nodes"></i></span>
                      <input type="text" name="og_image" class="form-control" value="<?php echo htmlspecialchars($p['og_image'] ?? 'assets/images/logo/logo.jpg'); ?>" placeholder="e.g. assets/images/logo/logo.jpg">
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

          <?php if ($editSlug === 'Public_Self_Disclosure'): 
            $disclosureCats = get_public_disclosures();
          ?>
            <!-- Public Self Disclosure 67-Parameter Matrix Manager -->
            <hr class="my-4">
            <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
              <div>
                <h6 class="fw-bold text-dark mb-0"><i class="fa-solid fa-file-shield text-primary me-2"></i>Public Disclosure Statutory Matrix (67 Parameters Across Categories A to J)</h6>
                <small class="text-muted">Directly manage, edit target URLs, upload PDFs, or add new parameters to Categories A through J.</small>
              </div>
              <button class="btn btn-sm btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#addDisclosureCollapse">
                <i class="fa fa-plus me-1"></i> Add / Edit Parameter
              </button>
            </div>

            <!-- Add / Edit Parameter Form -->
            <div class="collapse mb-4" id="addDisclosureCollapse">
              <div class="card card-body bg-light border">
                <h6 class="fw-bold mb-3" id="disclosureFormTitle">Add New Parameter to Public Disclosure</h6>
                <form method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="action" value="save_disclosure_item">
                  <input type="hidden" name="item_id" id="disc_item_id" value="">
                  <div class="row g-3">
                    <div class="col-md-3">
                      <label class="form-label small fw-bold">Category Code</label>
                      <select name="category_code" id="disc_cat_code" class="form-select form-select-sm" required>
                        <option value="A">A: About HEI &amp; Accreditations</option>
                        <option value="B">B: Administration &amp; Officers</option>
                        <option value="C">C: Academics</option>
                        <option value="D">D: Admissions &amp; Fee</option>
                        <option value="E">E: Research</option>
                        <option value="F">F: Student Life &amp; Amenities</option>
                        <option value="G">G: Alumni</option>
                        <option value="H">H: Information Corner</option>
                        <option value="I">I: Picture Gallery</option>
                        <option value="J">J: Contact Us</option>
                      </select>
                    </div>
                    <div class="col-md-3">
                      <label class="form-label small fw-bold">Subheading Title</label>
                      <input type="text" name="category_title" id="disc_cat_title" class="form-control form-control-sm" placeholder="e.g. About HEI" required>
                    </div>
                    <div class="col-md-6">
                      <label class="form-label small fw-bold">Parameter Name / Description</label>
                      <input type="text" name="param_name" id="disc_param_name" class="form-control form-control-sm" placeholder="e.g. Overview &amp; Background" required>
                    </div>
                    <div class="col-md-5">
                      <label class="form-label small fw-bold">Target Link / Page URL</label>
                      <input type="text" name="link_url" id="disc_link_url" class="form-control form-control-sm" placeholder="e.g. About/Background.php or https://...">
                    </div>
                    <div class="col-md-3">
                      <label class="form-label small fw-bold">Or Upload PDF</label>
                      <input type="file" name="pdf_upload" class="form-control form-control-sm" accept=".pdf">
                    </div>
                    <div class="col-md-2">
                      <label class="form-label small fw-bold">Button Label</label>
                      <input type="text" name="link_text" id="disc_link_text" class="form-control form-control-sm" value="View Details">
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                      <div class="form-check mb-1">
                        <input class="form-check-input" type="checkbox" name="is_na" value="1" id="disc_is_na">
                        <label class="form-check-label small fw-bold" for="disc_is_na">Mark as N/A</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button type="submit" class="btn btn-primary btn-sm px-4 fw-bold">
                        <i class="fa fa-save me-1"></i> Save Parameter
                      </button>
                      <button type="button" class="btn btn-secondary btn-sm px-3 ms-2" onclick="resetDisclosureForm()">Cancel</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>

            <!-- Disclosure Parameters Table -->
            <div class="table-responsive bg-white border rounded mb-4" style="max-height: 450px; overflow-y: auto;">
              <table class="table table-hover table-sm align-middle mb-0" style="font-size: 0.88rem;">
                <thead class="table-dark sticky-top">
                  <tr>
                    <th style="width: 50px;" class="text-center">Cat</th>
                    <th style="width: 180px;">Category Group</th>
                    <th>Parameter Name</th>
                    <th>Target Link / Button</th>
                    <th style="width: 100px;" class="text-center">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($disclosureCats as $cCode => $cData): ?>
                    <?php foreach ($cData['items'] as $itm): 
                      $firstBtn = $itm['buttons'][0] ?? null;
                      $btnTxt = $firstBtn['text'] ?? ($itm['is_na'] ? 'N/A' : 'View');
                      $btnUrl = $firstBtn['url'] ?? $itm['link_clean'];
                    ?>
                      <tr>
                        <td class="text-center fw-bold"><span class="badge bg-primary"><?php echo htmlspecialchars($cCode); ?></span></td>
                        <td class="small fw-semibold"><?php echo htmlspecialchars($itm['category_title']); ?></td>
                        <td><?php echo htmlspecialchars($itm['param_text']); ?></td>
                        <td>
                          <?php if ($itm['is_na']): ?>
                            <span class="badge bg-secondary">N/A</span>
                          <?php else: ?>
                            <span class="badge bg-info text-dark me-1"><?php echo htmlspecialchars($btnTxt); ?></span>
                            <code class="small text-truncate d-inline-block" style="max-width: 250px;"><?php echo htmlspecialchars($btnUrl); ?></code>
                          <?php endif; ?>
                        </td>
                        <td class="text-center">
                          <button type="button" class="btn btn-outline-primary btn-xs py-0 px-2" onclick='editDisclosureParam(<?php echo json_encode($itm, JSON_HEX_TAG|JSON_HEX_APOS|JSON_HEX_QUOT|JSON_HEX_AMP); ?>)'>
                            <i class="fa fa-pen"></i>
                          </button>
                          <form method="POST" class="d-inline" onsubmit="return confirm('Delete this disclosure parameter?');">
                            <input type="hidden" name="action" value="delete_disclosure_item">
                            <input type="hidden" name="item_id" value="<?php echo htmlspecialchars($itm['id']); ?>">
                            <button type="submit" class="btn btn-outline-danger btn-xs py-0 px-2 ms-1">
                              <i class="fa fa-trash"></i>
                            </button>
                          </form>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          <?php endif; ?>

          <!-- Attached Documents / PDFs on this Page (Approvals, Statutes, Reports, etc.) -->
          <hr class="my-4">
          <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
            <div>
              <h6 class="fw-bold text-dark mb-0"><i class="fa fa-file-pdf text-danger me-2"></i>Attached Documents & PDFs on this Page (<?php echo count($pageDocs); ?>)</h6>
              <small class="text-muted">Directly manage PDF downloads linked to this specific About sub-page.</small>
            </div>
            <button class="btn btn-sm btn-outline-danger" type="button" data-bs-toggle="collapse" data-bs-target="#addDocCollapse">
              <i class="fa fa-plus me-1"></i> Add New PDF to This Page
            </button>
          </div>

          <!-- Add PDF Collapse -->
          <div class="collapse mb-4" id="addDocCollapse">
            <div class="card card-body bg-light border">
              <h6 class="fw-bold mb-3">Upload / Attach PDF to "<?php echo htmlspecialchars($p['banner_title']); ?>"</h6>
              <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="action" value="add_document">
                <input type="hidden" name="slug" value="<?php echo htmlspecialchars($editSlug); ?>">
                <div class="row g-3">
                  <div class="col-md-5">
                    <label class="small fw-bold">Document Title</label>
                    <input type="text" name="doc_title" class="form-control form-control-sm" placeholder="e.g. UGC Approval Order 2026" required>
                  </div>
                  <div class="col-md-3">
                    <label class="small fw-bold">Category</label>
                    <input type="text" name="doc_category" class="form-control form-control-sm" value="<?php echo htmlspecialchars($p['banner_title']); ?>">
                  </div>
                  <div class="col-md-4">
                    <label class="small fw-bold">PDF File (Upload)</label>
                    <input type="file" name="doc_file" class="form-control form-control-sm" accept=".pdf">
                    <input type="text" name="doc_file_url" class="form-control form-control-sm mt-1" placeholder="Or relative path e.g. assets/pdf/order.pdf">
                  </div>
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-danger btn-sm px-3 fw-bold">
                    <i class="fa fa-cloud-arrow-up me-1"></i> Upload & Attach Document
                  </button>
                </div>
              </form>
            </div>
          </div>

          <!-- Documents List Table -->
          <?php if (!empty($pageDocs)): ?>
            <div class="table-responsive border rounded">
              <table class="table table-hover align-middle mb-0 small">
                <thead class="table-light">
                  <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>File</th>
                    <th>Date</th>
                    <th class="text-end">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($pageDocs as $d): ?>
                    <tr>
                      <td class="fw-bold text-dark">
                        <i class="fa fa-file-pdf text-danger me-1"></i>
                        <?php echo htmlspecialchars($d['title'] ?? ''); ?>
                      </td>
                      <td><span class="badge bg-secondary"><?php echo htmlspecialchars($d['category'] ?? ''); ?></span></td>
                      <td>
                        <a href="../<?php echo htmlspecialchars($d['file'] ?? '#'); ?>" target="_blank" class="text-decoration-none text-truncate d-inline-block" style="max-width: 200px;">
                          <?php echo htmlspecialchars(basename($d['file'] ?? '')); ?>
                        </a>
                      </td>
                      <td><?php echo htmlspecialchars($d['date'] ?? ''); ?></td>
                      <td class="text-end">
                        <form method="POST" style="display:inline;" onsubmit="return confirm('Remove this document from this page?');">
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
            <p class="text-muted small mb-0 fst-italic">No dedicated PDF files currently attached directly to this page.</p>
          <?php endif; ?>

        </div>
      </div>
    <?php endif; ?>

    <!-- Grid of All About Pages (Equal Height & Width Responsive Grid) -->
    <div class="row g-3 align-items-stretch" id="aboutPagesContainer">
      <?php foreach ($filteredPages as $slug => $pg): 
        $dKey = $pg['doc_key'] ?? str_replace(['/', '.php'], ['_', ''], $pg['file']);
        $pDocsCount = count(get_page_documents($dKey));

        // Group styling
        $grp = $pg['group'] ?? 'Overview & History';
        $grpBadgeStyle = 'color: #0b2545; background: rgba(11, 37, 69, 0.08); border: 1px solid rgba(11, 37, 69, 0.15);';
        $grpIcon = 'fa-compass';
        if ($grp === 'Constituent Institutes') {
          $grpBadgeStyle = 'color: #b45309; background: rgba(245, 158, 11, 0.12); border: 1px solid rgba(245, 158, 11, 0.25);';
          $grpIcon = 'fa-building-columns';
        } elseif ($grp === 'University Officials') {
          $grpBadgeStyle = 'color: #047857; background: rgba(16, 185, 129, 0.12); border: 1px solid rgba(16, 185, 129, 0.25);';
          $grpIcon = 'fa-user-tie';
        } elseif ($grp === 'Approvals & Ordinances') {
          $grpBadgeStyle = 'color: #6d28d9; background: rgba(139, 92, 246, 0.12); border: 1px solid rgba(139, 92, 246, 0.25);';
          $grpIcon = 'fa-stamp';
        } elseif ($grp === 'Amenities') {
          $grpBadgeStyle = 'color: #0e7490; background: rgba(6, 182, 212, 0.12); border: 1px solid rgba(6, 182, 212, 0.25);';
          $grpIcon = 'fa-hotel';
        } elseif ($grp === 'MOU & Activities') {
          $grpBadgeStyle = 'color: #4338ca; background: rgba(99, 102, 241, 0.12); border: 1px solid rgba(99, 102, 241, 0.25);';
          $grpIcon = 'fa-handshake';
        } elseif ($grp === 'Compliance & Portals') {
          $grpBadgeStyle = 'color: #0f766e; background: rgba(20, 184, 166, 0.12); border: 1px solid rgba(20, 184, 166, 0.25);';
          $grpIcon = 'fa-shield-halved';
        }

        // Clean description extraction
        $desc = '';
        if (($pg['type'] ?? '') === 'profile') {
          $desc = ($pg['name'] ?? '') . ' — ' . ($pg['designation'] ?? '');
        } elseif (($pg['type'] ?? '') === 'vision_mission') {
          $desc = $pg['vision'] ?? '';
        } else {
          $desc = strip_tags($pg['content_html'] ?? '');
        }
        $desc = trim(preg_replace('/\s+/', ' ', $desc));
        if (empty($desc)) {
          $desc = 'Manage dynamic content, overview information, and documents for ' . ($pg['banner_title'] ?? 'this page') . '.';
        }
      ?>
        <div class="col-lg-4 col-md-6 d-flex page-card-col" data-title="<?php echo strtolower(htmlspecialchars($pg['banner_title'] . ' ' . $pg['group'] . ' ' . $pg['file'])); ?>">
          <div class="page-item-card">
            <div>
              <!-- 1. Top Category & PDF Badges (Fixed Height 26px) -->
              <div class="card-top-badges">
                <span class="badge d-inline-flex align-items-center gap-1 px-2 py-1 rounded-pill" style="<?php echo $grpBadgeStyle; ?> font-size: 0.72rem; font-weight: 600;">
                  <i class="fa <?php echo $grpIcon; ?>"></i> <?php echo htmlspecialchars($grp); ?>
                </span>
                <?php if ($pDocsCount > 0): ?>
                  <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 rounded-pill px-2 py-1" style="font-size: 0.72rem;" title="<?php echo $pDocsCount; ?> attached PDF documents">
                    <i class="fa fa-file-pdf me-1"></i><?php echo $pDocsCount; ?> PDFs
                  </span>
                <?php endif; ?>
              </div>

              <!-- 2. Card Title (Fixed Height 42px, 2 lines clamp) -->
              <h5 class="page-card-title fw-bold text-dark" title="<?php echo htmlspecialchars($pg['banner_title']); ?>">
                <?php echo htmlspecialchars($pg['banner_title']); ?>
              </h5>

              <!-- 3. Source Path Badge (Fixed Height 24px) -->
              <div class="page-card-path">
                <i class="fa fa-file-code text-muted me-1" style="font-size: 0.75rem;"></i>
                <code class="text-truncate"><?php echo htmlspecialchars($pg['file']); ?></code>
              </div>

              <!-- 4. Description (Fixed Height 38px, 2 lines clamp) -->
              <p class="page-card-desc mb-3" title="<?php echo htmlspecialchars($desc); ?>">
                <?php echo htmlspecialchars($desc); ?>
              </p>
            </div>

            <!-- 5. Card Footer Actions (Fixed Align at Bottom) -->
            <div class="page-card-footer">
              <a href="../<?php echo htmlspecialchars($pg['file']); ?>" target="_blank" class="btn btn-outline-secondary btn-sm px-3 py-1 fw-semibold d-inline-flex align-items-center gap-1" style="font-size: 0.8rem; border-radius: 8px;" title="View live public page">
                <i class="fa fa-arrow-up-right-from-square small"></i> Live
              </a>
              <a href="about.php?group=<?php echo urlencode($activeGroup); ?>&edit=<?php echo urlencode($slug); ?>" class="btn btn-primary btn-sm px-3 py-1 fw-bold d-inline-flex align-items-center gap-1" style="font-size: 0.8rem; border-radius: 8px;">
                <i class="fa fa-pen-to-square small"></i> Edit Page
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
  // Live Instant Filter
  const searchInput = document.getElementById('aboutPageSearch');
  if (searchInput) {
    searchInput.addEventListener('input', function() {
      const q = this.value.toLowerCase().trim();
      document.querySelectorAll('.page-card-col').forEach(card => {
        const text = card.getAttribute('data-title') || '';
        if (!q || text.includes(q)) {
          card.style.display = '';
        } else {
          card.style.display = 'none';
        }
      });
    });
  }

  // Disclosure Parameter Edit Helper
  function editDisclosureParam(item) {
    document.getElementById('disclosureFormTitle').innerText = 'Edit Parameter: ' + item.param_text;
    document.getElementById('disc_item_id').value = item.id || '';
    document.getElementById('disc_cat_code').value = item.category_code || 'A';
    document.getElementById('disc_cat_title').value = item.category_title || '';
    document.getElementById('disc_param_name').value = item.param_text || '';
    var btn = (item.buttons && item.buttons.length) ? item.buttons[0] : null;
    document.getElementById('disc_link_url').value = (btn && btn.url) ? btn.url : (item.link_clean || '');
    document.getElementById('disc_link_text').value = (btn && btn.text) ? btn.text : (item.link_text || 'View Details');
    document.getElementById('disc_is_na').checked = !!item.is_na;
    
    var collapseEl = document.getElementById('addDisclosureCollapse');
    var bsCollapse = bootstrap.Collapse.getOrCreateInstance(collapseEl);
    bsCollapse.show();
    collapseEl.scrollIntoView({ behavior: 'smooth' });
  }

  function resetDisclosureForm() {
    document.getElementById('disclosureFormTitle').innerText = 'Add New Parameter to Public Disclosure';
    document.getElementById('disc_item_id').value = '';
    document.getElementById('disc_cat_title').value = '';
    document.getElementById('disc_param_name').value = '';
    document.getElementById('disc_link_url').value = '';
    document.getElementById('disc_link_text').value = 'View Details';
    document.getElementById('disc_is_na').checked = false;
    var collapseEl = document.getElementById('addDisclosureCollapse');
    var bsCollapse = bootstrap.Collapse.getOrCreateInstance(collapseEl);
    bsCollapse.hide();
  }

  // SEO Live Preview & Counter for About Pages
  function updateSeoPreviewAbt() {
    const titleInput = document.getElementById('seoInputTitleAbt');
    const descInput = document.getElementById('seoInputDescAbt');
    const previewTitle = document.getElementById('seoPreviewTitleAbt');
    const previewDesc = document.getElementById('seoPreviewDescAbt');
    const titleCount = document.getElementById('metaTitleCountAbt');
    const descCount = document.getElementById('metaDescCountAbt');

    if (titleInput && previewTitle) {
      const val = titleInput.value.trim();
      previewTitle.textContent = val ? val : 'About Page - SSSUTMS';
      if (titleCount) {
        titleCount.textContent = titleInput.value.length;
        titleCount.className = (titleInput.value.length > 60) ? 'text-danger fw-bold' : 'text-success fw-bold';
      }
    }

    if (descInput && previewDesc) {
      const val = descInput.value.trim();
      previewDesc.textContent = val ? val : 'Discover comprehensive institutional details, leadership, background, and governance at Sri Satya Sai University (SSSUTMS).';
      if (descCount) {
        descCount.textContent = descInput.value.length;
        descCount.className = (descInput.value.length > 160) ? 'text-danger fw-bold' : 'text-success fw-bold';
      }
    }
  }

  document.addEventListener('DOMContentLoaded', function() {
    updateSeoPreviewAbt();
  });
</script>
</body>
</html>
