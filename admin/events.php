<?php
require_once __DIR__ . '/../config.php';
require_admin_auth();

$events = get_events();
$msg = '';
$error = '';

$catalog = get_events_page_catalog();
$view = clean_input($_GET['view'] ?? 'events'); // 'events' or 'seo'
$tab = clean_input($_GET['tab'] ?? 'EVENTS');

if (!array_key_exists($tab, $catalog)) {
    $tab = 'EVENTS';
}

$pageMeta = $catalog[$tab];
$currentSeo = get_events_page_info($tab);
$publicUrl = BASE_URL . ltrim($pageMeta['slug'] ?? '', '/');

// Handle Delete Event
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $delId = (int)$_GET['id'];
    $events = array_filter($events, function($e) use ($delId) {
        return ($e['id'] ?? 0) !== $delId;
    });
    save_json_data('events.json', array_values($events));
    $msg = 'Event removed successfully.';
}

// Handle Save SEO & Meta Settings
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'save_seo') {
    $targetKey = clean_input($_POST['page_key'] ?? $tab);
    $seoData = [
        'page_title'       => clean_input($_POST['page_title'] ?? ''),
        'meta_title'       => clean_input($_POST['meta_title'] ?? ''),
        'meta_description' => clean_input($_POST['meta_description'] ?? ''),
        'meta_keywords'    => clean_input($_POST['meta_keywords'] ?? ''),
        'canonical_url'    => clean_input($_POST['canonical_url'] ?? ''),
        'banner_title'     => clean_input($_POST['banner_title'] ?? ''),
        'banner_category'  => clean_input($_POST['banner_category'] ?? ''),
        'og_image'         => clean_input($_POST['og_image'] ?? 'assets/images/logo/logo.jpg')
    ];

    if (save_events_page_info($targetKey, $seoData)) {
        $msg = 'SEO & Meta Details for ' . htmlspecialchars($catalog[$targetKey]['title'] ?? $targetKey) . ' saved successfully! Public search tags and preview updated.';
        $currentSeo = get_events_page_info($targetKey);
        $tab = $targetKey;
        $view = 'seo';
    } else {
        $error = 'Failed to save SEO metadata. Please check file permissions.';
    }
}

// Handle Add / Edit Event
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add_event') {
    $eventId = !empty($_POST['event_id']) ? (int)$_POST['event_id'] : time();
    $title = clean_input($_POST['title'] ?? '');
    $category = clean_input($_POST['category'] ?? 'Workshop');
    $date = clean_input($_POST['date'] ?? date('Y-m-d'));
    $desc = clean_input($_POST['description'] ?? '');
    $loc = clean_input($_POST['location'] ?? 'SSSUTMS Campus');
    $image = clean_input($_POST['existing_image'] ?? 'assets/images/events/scienceday.jpg');

    // Handle Image Upload
    if (isset($_FILES['event_image']) && $_FILES['event_image']['error'] === UPLOAD_ERR_OK) {
        $tmpName = $_FILES['event_image']['tmp_name'];
        $origName = preg_replace('/[^a-zA-Z0-9_\.-]/', '_', $_FILES['event_image']['name']);
        $ext = strtolower(pathinfo($origName, PATHINFO_EXTENSION));
        
        $allowed = ['jpg', 'jpeg', 'png', 'webp'];
        if (in_array($ext, $allowed)) {
            $newName = 'event_' . time() . '_' . $origName;
            $dest = UPLOAD_DIR . '/events/' . $newName;
            if (!is_dir(dirname($dest))) {
                mkdir(dirname($dest), 0777, true);
            }
            if (move_uploaded_file($tmpName, $dest)) {
                $image = 'assets/uploads/events/' . $newName;
            } else {
                $error = 'Failed to upload event photo to server.';
            }
        } else {
            $error = 'Invalid image format. Allowed: JPG, JPEG, PNG, WEBP.';
        }
    }

    if (empty($error)) {
        if (!empty($title)) {
            $updated = false;
            foreach ($events as &$e) {
                if (($e['id'] ?? 0) === $eventId) {
                    $e['title'] = $title;
                    $e['category'] = $category;
                    $e['date'] = $date;
                    $e['description'] = $desc;
                    $e['location'] = $loc;
                    $e['image'] = $image;
                    $updated = true;
                    break;
                }
            }

            if (!$updated) {
                $newEvent = [
                    'id' => $eventId,
                    'title' => $title,
                    'category' => $category,
                    'date' => $date,
                    'description' => $desc,
                    'location' => $loc,
                    'image' => $image
                ];
                array_unshift($events, $newEvent);
                $msg = 'New event created & published successfully!';
            } else {
                $msg = 'Event details updated successfully!';
            }

            save_json_data('events.json', $events);
        } else {
            $error = 'Event title is mandatory.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Events & Workshops - SSSUTMS Admin</title>
  <link rel="icon" type="image/jpeg" href="../assets/images/logo/logo.jpg">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/admin.css">
  <style>
    .events-nav-tabs {
      border-bottom: 2px solid #e2e8f0;
      gap: 10px;
    }
    .events-nav-tabs .nav-link {
      border: none;
      border-bottom: 3px solid transparent;
      color: #64748b;
      font-weight: 700;
      font-size: 0.95rem;
      padding: 12px 20px;
      border-radius: 0;
      background: transparent;
      transition: all 0.2s ease;
      display: inline-flex;
      align-items: center;
      gap: 8px;
    }
    .events-nav-tabs .nav-link:hover {
      color: #0b2545;
    }
    .events-nav-tabs .nav-link.active {
      color: #0b2545;
      border-bottom-color: #f59e0b;
      background: transparent;
    }

    .events-page-pill {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 9px 16px;
      background: #ffffff;
      color: #475569;
      font-weight: 600;
      font-size: 0.85rem;
      border: 1px solid #e2e8f0;
      border-radius: 10px;
      text-decoration: none !important;
      transition: all 0.2s ease;
      white-space: nowrap;
    }
    .events-page-pill:hover {
      border-color: #0b2545;
      color: #0b2545;
      background: #f8fafc;
      transform: translateY(-1px);
    }
    .events-page-pill.active {
      background: linear-gradient(135deg, #0b2545 0%, #1e4d8c 100%);
      color: #ffffff;
      font-weight: 700;
      border-color: #0b2545;
      box-shadow: 0 4px 12px rgba(11,37,69,0.22);
    }
    .events-page-pill.active i {
      color: #fbbf24 !important;
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
    <li><a href="examination.php" class="nav-link"><i class="fa fa-file-signature"></i> Examination Cell (5)</a></li>
    <li><a href="research.php" class="nav-link"><i class="fa fa-flask"></i> Research Cell (12)</a></li>
    <li><a href="about.php" class="nav-link"><i class="fa fa-circle-info"></i> About Pages (42)</a></li>
    <li><a href="faculties.php" class="nav-link"><i class="fa fa-chalkboard-user"></i> Faculties &amp; Depts (14)</a></li>
    <li><a href="committee.php" class="nav-link"><i class="fa fa-users-gear"></i> Statutory Committees (9)</a></li>
    <li><a href="documents.php" class="nav-link"><i class="fa fa-stamp"></i> Approvals &amp; NAAC Docs</a></li>
    <li><a href="events.php" class="nav-link active"><i class="fa fa-calendar-days"></i> Events &amp; Workshops</a></li>
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
        <h5 class="fw-bold text-dark mb-0">Events, Seminars &amp; Workshops Console</h5>
        <small class="text-muted d-none d-md-inline">Live synchronization with Homepage 'News &amp; Events' and all public Event Portals</small>
      </div>
    </div>
    <div class="d-flex align-items-center gap-2">
      <button class="btn btn-primary fw-bold rounded-pill px-4 shadow-sm" data-bs-toggle="modal" data-bs-target="#eventModal" onclick="resetEventForm()" style="background: linear-gradient(135deg, #0b2545 0%, #1e4d8c 100%); border: none;">
        <i class="fa fa-plus me-1"></i> Add New Event
      </button>
      <a href="../EVENTS.php" target="_blank" class="btn btn-outline-primary fw-bold rounded-pill px-3 d-none d-sm-inline-flex align-items-center gap-1">
        <i class="fa fa-arrow-up-right-from-square"></i> View Live Events
      </a>
    </div>
  </header>

  <?php if (!empty($msg)): ?>
    <div class="alert alert-success alert-dismissible fade show rounded-3 border-0 shadow-sm mb-4" role="alert">
      <i class="fa fa-circle-check me-2"></i> <?php echo htmlspecialchars($msg); ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  <?php endif; ?>

  <?php if (!empty($error)): ?>
    <div class="alert alert-danger alert-dismissible fade show rounded-3 border-0 shadow-sm mb-4" role="alert">
      <i class="fa fa-triangle-exclamation me-2"></i> <?php echo htmlspecialchars($error); ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  <?php endif; ?>

  <div class="admin-content-inner">

    <!-- Top Primary Mode Navigation Tabs -->
    <ul class="nav events-nav-tabs mb-4" role="tablist">
      <li class="nav-item">
        <a class="nav-link <?php echo ($view === 'events') ? 'active' : ''; ?>" href="events.php?view=events">
          <i class="fa fa-calendar-days text-primary"></i> Campus Events &amp; Workshops Directory
          <span class="badge bg-primary-subtle text-primary rounded-pill ms-1"><?php echo count($events); ?></span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php echo ($view === 'seo') ? 'active' : ''; ?>" href="events.php?view=seo&tab=<?php echo $tab; ?>">
          <i class="fa fa-magnifying-glass-chart text-success"></i> SEO &amp; Meta Details [SEO]
          <span class="badge bg-success-subtle text-success rounded-pill ms-1"><?php echo count($catalog); ?> Pages</span>
        </a>
      </li>
    </ul>

    <?php if ($view === 'seo'): ?>
      <!-- ========================================================================= -->
      <!-- VIEW: SEO & META DETAILS SUITE -->
      <!-- ========================================================================= -->

      <!-- Events Subpage Selector Pills -->
      <div class="bg-white p-3 rounded-4 border shadow-sm mb-4">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
          <div class="fw-bold text-dark small d-flex align-items-center gap-2">
            <i class="fa fa-layer-group text-warning"></i>
            <span>Select Events / Workshop Page for SEO Configuration:</span>
          </div>
          <span class="badge bg-light text-muted border"><?php echo count($catalog); ?> Public Portals</span>
        </div>
        <div class="d-flex flex-wrap gap-2">
          <?php foreach ($catalog as $pk => $pData): 
            $isPageActive = ($pk === $tab);
          ?>
            <a href="events.php?view=seo&tab=<?php echo $pk; ?>" class="events-page-pill <?php echo $isPageActive ? 'active' : ''; ?>">
              <i class="fa <?php echo $pData['icon']; ?>"></i>
              <span><?php echo htmlspecialchars($pData['title']); ?></span>
              <span class="badge bg-light text-dark ms-1"><?php echo htmlspecialchars($pData['badge']); ?></span>
            </a>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Current Page Banner Card -->
      <div class="card border-0 rounded-4 shadow-sm mb-4" style="background: linear-gradient(135deg, #0b2545 0%, #1e4d8c 100%); color: #ffffff;">
        <div class="card-body p-4 d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
          <div class="d-flex align-items-center gap-3">
            <div style="width: 52px; height: 52px; min-width: 52px; background: rgba(245,158,11,0.2); border: 1px solid rgba(245,158,11,0.4); border-radius: 14px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; color: #fbbf24;">
              <i class="fa <?php echo $pageMeta['icon']; ?>"></i>
            </div>
            <div>
              <span class="badge bg-warning text-dark fw-bold mb-1"><?php echo htmlspecialchars($pageMeta['category']); ?></span>
              <h4 class="fw-bold text-white mb-0"><?php echo htmlspecialchars($pageMeta['title']); ?></h4>
              <small class="text-white-50"><i class="fa fa-link me-1"></i> <?php echo htmlspecialchars($pageMeta['slug']); ?></small>
            </div>
          </div>
          <div class="d-flex align-items-center flex-wrap gap-2">
            <a href="<?php echo htmlspecialchars($publicUrl); ?>" target="_blank" class="btn btn-outline-light fw-bold rounded-pill px-3">
              <i class="fa fa-arrow-up-right-from-square me-1"></i> View Live Page
            </a>
          </div>
        </div>
      </div>

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
          <?php echo htmlspecialchars(!empty($currentSeo['meta_title']) ? $currentSeo['meta_title'] : $pageMeta['title'] . ' | SSSUTMS'); ?>
        </a>
        <p class="serp-snippet" id="serpDescPreview">
          <?php echo htmlspecialchars(!empty($currentSeo['meta_description']) ? $currentSeo['meta_description'] : $pageMeta['description']); ?>
        </p>
      </div>

      <!-- SEO Meta Configuration Form Card -->
      <div class="card border-0 rounded-4 shadow-sm mb-4">
        <div class="card-header bg-white p-4 border-bottom">
          <div class="d-flex align-items-center justify-content-between">
            <div>
              <h5 class="fw-bold text-dark mb-1"><i class="fa fa-magnifying-glass-chart text-success me-2"></i> Events &amp; Workshops SEO Meta Configuration</h5>
              <small class="text-muted">Manage search engine title tags, meta description, keywords, canonical URLs, and social sharing image thumbnail.</small>
            </div>
            <span class="badge bg-success text-white px-3 py-2 fw-bold"><i class="fa fa-bolt me-1"></i> Instant Public Sync</span>
          </div>
        </div>
        <div class="card-body p-4">
          <form method="POST" action="events.php?view=seo&tab=<?php echo $tab; ?>">
            <input type="hidden" name="action" value="save_seo">
            <input type="hidden" name="page_key" value="<?php echo htmlspecialchars($tab); ?>">

            <!-- SEO Meta Title -->
            <div class="mb-4">
              <div class="d-flex align-items-center justify-content-between mb-1">
                <label class="form-label fw-bold text-dark mb-0">
                  SEO Meta Title (Title Tag) <span class="text-danger">*</span>
                </label>
                <span id="metaTitleCount" class="char-badge bg-secondary-subtle text-secondary">0 / 60 chars</span>
              </div>
              <input type="text" name="meta_title" id="metaTitleInput" class="form-control form-control-lg fs-6" 
                     value="<?php echo htmlspecialchars($currentSeo['meta_title'] ?? ''); ?>" 
                     placeholder="e.g. <?php echo htmlspecialchars($pageMeta['title']); ?> | SSSUTMS" required>
              <small class="text-muted">Recommended length: 50-60 characters for optimal Google search click-through rate.</small>
            </div>

            <!-- SEO Meta Description -->
            <div class="mb-4">
              <div class="d-flex align-items-center justify-content-between mb-1">
                <label class="form-label fw-bold text-dark mb-0">
                  SEO Meta Description <span class="text-danger">*</span>
                </label>
                <span id="metaDescCount" class="char-badge bg-secondary-subtle text-secondary">0 / 160 chars</span>
              </div>
              <textarea name="meta_description" id="metaDescInput" class="form-control" rows="3" 
                        placeholder="Provide a compelling 150-160 character summary of this events and workshops page..." required><?php echo htmlspecialchars($currentSeo['meta_description'] ?? ''); ?></textarea>
              <small class="text-muted">Recommended length: 140-160 characters for maximum search engine CTR.</small>
            </div>

            <div class="row g-3 mb-4">
              <!-- Target Keywords -->
              <div class="col-md-6">
                <label class="form-label fw-bold text-dark">Target SEO Keywords</label>
                <input type="text" name="meta_keywords" class="form-control" 
                       value="<?php echo htmlspecialchars($currentSeo['meta_keywords'] ?? ''); ?>" 
                       placeholder="e.g. sssutms events, workshops, symposiums, tech fest, cultural">
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
                <input type="text" name="og_image" id="ogImageInput" class="form-control" 
                       value="<?php echo htmlspecialchars($currentSeo['og_image'] ?? 'assets/images/logo/logo.jpg'); ?>" 
                       placeholder="assets/images/logo/logo.jpg">
              </div>
              <div class="d-flex align-items-center gap-3 mt-2">
                <img src="../<?php echo htmlspecialchars(ltrim($currentSeo['og_image'] ?? 'assets/images/logo/logo.jpg', '/')); ?>" 
                     id="ogImagePreview" alt="OG Preview" width="100" height="55" class="rounded border object-fit-cover">
                <small class="text-muted">Preview of thumbnail displayed when sharing this page link on WhatsApp, LinkedIn, or Facebook.</small>
              </div>
            </div>

            <div class="d-flex align-items-center justify-content-end gap-2 pt-3 border-top">
              <button type="submit" class="btn btn-primary px-4 py-2 fw-bold rounded-pill shadow-sm" style="background: linear-gradient(135deg, #0b2545 0%, #1e4d8c 100%); border: none;">
                <i class="fa fa-floppy-disk me-1"></i> Save SEO &amp; Meta Details
              </button>
            </div>

          </form>
        </div>
      </div>

    <?php else: ?>
      <!-- ========================================================================= -->
      <!-- VIEW: CAMPUS EVENTS & WORKSHOPS DIRECTORY (DEFAULT) -->
      <!-- ========================================================================= -->

      <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-4">
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
          <div class="d-flex align-items-center gap-2">
            <h5 class="fw-bold text-dark mb-0">Upcoming &amp; Past Events (<?php echo count($events); ?>)</h5>
            <span class="badge bg-success-subtle text-success fw-bold">Active Public Grid</span>
          </div>
          <div class="d-flex gap-2">
            <input type="text" id="eventSearch" class="form-control form-control-sm" placeholder="Search events..." style="width: 260px;">
          </div>
        </div>

        <div class="row g-4" id="eventsGrid">
          <?php if (empty($events)): ?>
            <div class="col-12 text-center py-5 text-muted">No events currently scheduled. Click "Add New Event" above to create one.</div>
          <?php else: ?>
            <?php foreach ($events as $ev): 
              $img = $ev['image'] ?? 'assets/images/events/scienceday.jpg';
              $imgUrl = (strpos($img, 'http') === 0) ? $img : BASE_URL . $img;
            ?>
              <div class="col-md-6 col-xl-4 event-card-item" data-title="<?php echo strtolower(htmlspecialchars($ev['title'] ?? '')); ?>" data-cat="<?php echo strtolower(htmlspecialchars($ev['category'] ?? '')); ?>">
                <div class="card h-100 border rounded-4 overflow-hidden shadow-sm">
                  <div style="height: 180px; overflow: hidden; position: relative; background: #e2e8f0;">
                    <img src="<?php echo htmlspecialchars($imgUrl); ?>" alt="<?php echo htmlspecialchars($ev['title'] ?? ''); ?>" style="width: 100%; height: 100%; object-fit: cover;" onerror="this.src='<?php echo BASE_URL; ?>assets/images/slider/HorizonsofAyurved.jpg'">
                    <span class="badge bg-primary text-white position-absolute top-0 start-0 m-3 fw-bold">
                      <?php echo htmlspecialchars($ev['category'] ?? 'Event'); ?>
                    </span>
                  </div>
                  <div class="card-body p-4 d-flex flex-column justify-content-between">
                    <div>
                      <div class="text-muted small mb-1">
                        <i class="fa fa-calendar-day me-1 text-warning"></i> <?php echo date('d M Y', strtotime($ev['date'] ?? 'now')); ?>
                        <span class="mx-2">&bull;</span>
                        <i class="fa fa-location-dot me-1 text-danger"></i> <?php echo htmlspecialchars($ev['location'] ?? 'Campus'); ?>
                      </div>
                      <h6 class="fw-bold text-dark mb-2"><?php echo htmlspecialchars($ev['title'] ?? ''); ?></h6>
                      <p class="text-secondary small mb-3" style="line-height: 1.6;">
                        <?php echo htmlspecialchars(mb_strimwidth($ev['description'] ?? '', 0, 110, '...')); ?>
                      </p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center pt-2 border-top">
                      <button class="btn btn-sm btn-outline-primary rounded-pill px-3" 
                        onclick='editEvent(<?php echo json_encode($ev); ?>)'>
                        <i class="fa fa-pen-to-square me-1"></i> Edit
                      </button>
                      <a href="events.php?action=delete&id=<?php echo $ev['id'] ?? 0; ?>" 
                         class="btn btn-sm btn-outline-danger rounded-pill px-3"
                         onclick="return confirm('Delete this event?');">
                        <i class="fa fa-trash-can me-1"></i> Delete
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </div>

    <?php endif; ?>

  </div>

</main>

<!-- Event Add/Edit Modal -->
<div class="modal fade" id="eventModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content border-0 shadow-lg rounded-4">
      <div class="modal-header border-0 pb-0">
        <h5 class="modal-title fw-bold text-dark" id="modalTitle">Publish Campus Event</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form method="POST" action="events.php?view=events" enctype="multipart/form-data">
        <div class="modal-body p-4">
          <input type="hidden" name="action" value="add_event">
          <input type="hidden" name="event_id" id="formEventId" value="">
          <input type="hidden" name="existing_image" id="formExistingImage" value="">

          <div class="mb-3">
            <label class="form-label small fw-bold">Event Title *</label>
            <input type="text" name="title" id="formTitle" class="form-control" placeholder="e.g. National Symposium on AI in Healthcare" required>
          </div>

          <div class="row g-3 mb-3">
            <div class="col-md-6">
              <label class="form-label small fw-bold">Category Badge</label>
              <select name="category" id="formCategory" class="form-select" required>
                <option value="Workshop">Workshop</option>
                <option value="Symposium">Symposium</option>
                <option value="FDP">FDP</option>
                <option value="Placement">Placement Drive</option>
                <option value="Conference">Conference</option>
                <option value="Sports">Sports</option>
                <option value="Cultural">Cultural</option>
                <option value="General">General</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label small fw-bold">Event Date</label>
              <input type="date" name="date" id="formDate" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label small fw-bold">Location / Venue</label>
            <input type="text" name="location" id="formLocation" class="form-control" placeholder="e.g. University Central Auditorium" value="SSSUTMS Campus">
          </div>

          <div class="mb-3">
            <label class="form-label small fw-bold">Description / Details</label>
            <textarea name="description" id="formDescription" class="form-control" rows="3" placeholder="Summary of the event, key speakers, participant guidelines..."></textarea>
          </div>

          <div class="mb-3">
            <label class="form-label small fw-bold">Upload Event Banner / Photograph</label>
            <input type="file" name="event_image" class="form-control" accept="image/*">
            <small class="text-muted">High resolution JPG/PNG recommended. Leave empty to retain current banner.</small>
          </div>
        </div>
        <div class="modal-footer border-0 pt-0">
          <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary rounded-pill px-4 fw-bold" style="background: linear-gradient(135deg, #0b2545 0%, #1e4d8c 100%); border: none;">Save &amp; Publish Event</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/admin.js"></script>
<script>
function resetEventForm() {
  document.getElementById('modalTitle').textContent = 'Publish Campus Event';
  document.getElementById('formEventId').value = '';
  document.getElementById('formExistingImage').value = 'assets/images/events/scienceday.jpg';
  document.getElementById('formTitle').value = '';
  document.getElementById('formCategory').value = 'Workshop';
  document.getElementById('formDate').value = '<?php echo date('Y-m-d'); ?>';
  document.getElementById('formLocation').value = 'SSSUTMS Campus';
  document.getElementById('formDescription').value = '';
}

function editEvent(ev) {
  document.getElementById('modalTitle').textContent = 'Edit Event Details';
  document.getElementById('formEventId').value = ev.id || '';
  document.getElementById('formExistingImage').value = ev.image || '';
  document.getElementById('formTitle').value = ev.title || '';
  document.getElementById('formCategory').value = ev.category || 'Workshop';
  document.getElementById('formDate').value = ev.date || '<?php echo date('Y-m-d'); ?>';
  document.getElementById('formLocation').value = ev.location || 'SSSUTMS Campus';
  document.getElementById('formDescription').value = ev.description || '';
  
  const modal = new bootstrap.Modal(document.getElementById('eventModal'));
  modal.show();
}

// Instant Filter for Event Cards
document.addEventListener('DOMContentLoaded', function() {
  const search = document.getElementById('eventSearch');
  const cards = document.querySelectorAll('.event-card-item');

  if (search) {
    search.addEventListener('input', function() {
      const q = (search.value || '').toLowerCase().trim();
      cards.forEach(c => {
        const title = c.getAttribute('data-title') || '';
        const cat = c.getAttribute('data-cat') || '';
        if (!q || title.includes(q) || cat.includes(q)) {
          c.style.display = '';
        } else {
          c.style.display = 'none';
        }
      });
    });
  }

  // Real-time SEO Snippet & Character Counters
  const titleInput = document.getElementById('metaTitleInput');
  const descInput = document.getElementById('metaDescInput');
  const serpTitle = document.getElementById('serpTitlePreview');
  const serpDesc = document.getElementById('serpDescPreview');
  const titleCount = document.getElementById('metaTitleCount');
  const descCount = document.getElementById('metaDescCount');
  const ogInput = document.getElementById('ogImageInput');
  const ogPreview = document.getElementById('ogImagePreview');
  const serpBox = document.getElementById('serpPreviewBox');
  const desktopBtn = document.getElementById('serpDesktopBtn');
  const mobileBtn = document.getElementById('serpMobileBtn');

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
      serpTitle.textContent = titleInput.value.trim() || '<?php echo addslashes($pageMeta['title'] ?? 'Events'); ?> | SSSUTMS';
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
      serpDesc.textContent = descInput.value.trim() || 'Official events, workshops, and campus activities at Sri Satya Sai University of Technology & Medical Sciences.';
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
});
</script>

</body>
</html>
