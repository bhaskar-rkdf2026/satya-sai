<?php
require_once __DIR__ . '/../config.php';
require_admin_auth();

$msg = '';
$error = '';

$globalSeo = get_global_seo_settings();
$directiveOptions = get_robots_directive_options();
$masterPages = get_master_page_catalog();

// Helper to sync homepage robots directive with home_sections.json
function sync_home_section_robots($directive) {
    $homeSections = get_json_data('home_sections.json', []);
    if (isset($homeSections['seo']) && is_array($homeSections['seo'])) {
        $homeSections['seo']['robots'] = $directive;
        save_json_data('home_sections.json', $homeSections);
    }
}

// Handle Bulk Directive Application
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'bulk_apply_indexing') {
    $selectedPages = $_POST['selected_pages'] ?? [];
    $directive = clean_input($_POST['directive'] ?? 'noindex, nofollow');

    if (!array_key_exists($directive, $directiveOptions)) {
        $directive = 'noindex, nofollow';
    }

    if (empty($selectedPages) || !is_array($selectedPages)) {
        $error = 'Please select at least one page to apply the indexing directive.';
    } else {
        $count = 0;
        foreach ($selectedPages as $pageUrl) {
            $pageUrl = trim($pageUrl);
            if (!empty($pageUrl)) {
                $globalSeo['page_rules'][$pageUrl] = $directive;
                // Sync aliases
                if ($pageUrl === 'index.php') {
                    sync_home_section_robots($directive);
                } elseif ($pageUrl === 'Career/index.php' || $pageUrl === 'career.php') {
                    $globalSeo['page_rules']['Career/index.php'] = $directive;
                    $globalSeo['page_rules']['career.php'] = $directive;
                } elseif ($pageUrl === 'ITEP/index.php' || $pageUrl === 'itep.php') {
                    $globalSeo['page_rules']['ITEP/index.php'] = $directive;
                    $globalSeo['page_rules']['itep.php'] = $directive;
                }
                $count++;
            }
        }
        save_global_seo_settings($globalSeo);
        $msg = "Successfully applied '{$directive}' indexing directive to {$count} page(s)!";
    }
}

// Handle Single Page Quick Update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'update_single_page_rule') {
    $pageUrl = trim($_POST['page_url'] ?? '');
    $directive = clean_input($_POST['directive'] ?? 'noindex, nofollow');

    if (!empty($pageUrl) && array_key_exists($directive, $directiveOptions)) {
        $globalSeo['page_rules'][$pageUrl] = $directive;
        if ($pageUrl === 'index.php') {
            sync_home_section_robots($directive);
        } elseif ($pageUrl === 'Career/index.php' || $pageUrl === 'career.php') {
            $globalSeo['page_rules']['Career/index.php'] = $directive;
            $globalSeo['page_rules']['career.php'] = $directive;
        } elseif ($pageUrl === 'ITEP/index.php' || $pageUrl === 'itep.php') {
            $globalSeo['page_rules']['ITEP/index.php'] = $directive;
            $globalSeo['page_rules']['itep.php'] = $directive;
        }
        save_global_seo_settings($globalSeo);
        $msg = "Indexing directive for '" . htmlspecialchars($pageUrl) . "' updated to '{$directive}' successfully!";
    }
}

// Handle Reset Page to Default
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'reset_page_rule') {
    $pageUrl = trim($_POST['page_url'] ?? '');
    if (!empty($pageUrl)) {
        unset($globalSeo['page_rules'][$pageUrl]);
        if ($pageUrl === 'index.php') {
            sync_home_section_robots($globalSeo['global_robots_default']);
        } elseif ($pageUrl === 'Career/index.php' || $pageUrl === 'career.php') {
            unset($globalSeo['page_rules']['Career/index.php'], $globalSeo['page_rules']['career.php']);
        } elseif ($pageUrl === 'ITEP/index.php' || $pageUrl === 'itep.php') {
            unset($globalSeo['page_rules']['ITEP/index.php'], $globalSeo['page_rules']['itep.php']);
        }
        save_global_seo_settings($globalSeo);
        $msg = "Reset page rule for '" . htmlspecialchars($pageUrl) . "' to use Global Default directive.";
    }
}

// Handle Save Global SEO Settings
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'save_global_settings') {
    $globalSeo['global_robots_default'] = clean_input($_POST['global_robots_default'] ?? 'noindex, nofollow');
    $globalSeo['google_verification']   = trim($_POST['google_verification'] ?? '');
    $globalSeo['bing_verification']     = trim($_POST['bing_verification'] ?? '');
    $globalSeo['canonical_base']        = trim($_POST['canonical_base'] ?? 'https://www.sssutms.ac.in');
    $globalSeo['meta_author']           = trim($_POST['meta_author'] ?? 'Sri Satya Sai University of Technology and Medical Sciences');
    $globalSeo['sitemap_url']           = trim($_POST['sitemap_url'] ?? 'https://www.sssutms.ac.in/sitemap.xml');
    $globalSeo['custom_robots_txt']     = trim($_POST['custom_robots_txt'] ?? '');

    save_global_seo_settings($globalSeo);
    $msg = 'Global SEO configuration, Webmaster tags, and default indexing rules updated successfully!';
}

// Handle Save Page Schema
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'save_page_schema') {
    $pageUrl = trim($_POST['page_url'] ?? '');
    $schemaJson = trim($_POST['schema_json'] ?? '');

    if (!empty($pageUrl)) {
        if (!empty($schemaJson)) {
            $cleaned = clean_schema_json($schemaJson);
            $decoded = json_decode($cleaned, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                $error = 'Invalid JSON Schema Syntax: ' . json_last_error_msg() . '. Please verify JSON structure, double quotes, and commas.';
            } else {
                save_page_schema($pageUrl, $cleaned);
                if ($pageUrl === 'index.php') {
                    $homeSections = get_json_data('home_sections.json', []);
                    if (isset($homeSections['seo']) && is_array($homeSections['seo'])) {
                        $homeSections['seo']['page_schema'] = $cleaned;
                        save_json_data('home_sections.json', $homeSections);
                    }
                }
                $globalSeo = get_global_seo_settings();
                $msg = 'Page Schema Markup (JSON-LD) for "' . htmlspecialchars($pageUrl) . '" saved successfully! It is now live in the page <head>.';
            }
        } else {
            delete_page_schema($pageUrl);
            if ($pageUrl === 'index.php') {
                $homeSections = get_json_data('home_sections.json', []);
                if (isset($homeSections['seo']['page_schema'])) {
                    unset($homeSections['seo']['page_schema']);
                    save_json_data('home_sections.json', $homeSections);
                }
            }
            $globalSeo = get_global_seo_settings();
            $msg = 'Custom Schema removed for "' . htmlspecialchars($pageUrl) . '". Page will now automatically use the Smart Default schema.';
        }
        $selectedSchemaPage = $pageUrl;
    } else {
        $error = 'Please select a page to assign the Schema markup.';
    }
}

// Handle Reset Page Schema
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'reset_page_schema') {
    $pageUrl = trim($_POST['page_url'] ?? '');
    if (!empty($pageUrl)) {
        delete_page_schema($pageUrl);
        if ($pageUrl === 'index.php') {
            $homeSections = get_json_data('home_sections.json', []);
            if (isset($homeSections['seo']['page_schema'])) {
                unset($homeSections['seo']['page_schema']);
                save_json_data('home_sections.json', $homeSections);
            }
        }
        $globalSeo = get_global_seo_settings();
        $msg = 'Schema for "' . htmlspecialchars($pageUrl) . '" reset to Smart Default schema.';
        $selectedSchemaPage = $pageUrl;
    }
}

// Count statistics
$stats = [
    'total'             => count($masterPages),
    'noindex_nofollow'  => 0,
    'index_follow'      => 0,
    'noindex_follow'    => 0,
    'index_nofollow'    => 0,
    'custom_schemas'    => !empty($globalSeo['page_schemas']) ? count($globalSeo['page_schemas']) : 0,
];

foreach ($masterPages as $url => $p) {
    $curDir = $globalSeo['page_rules'][$url] ?? $globalSeo['global_robots_default'];
    if (isset($stats[$curDir])) {
        $stats[$curDir]++;
    } elseif ($curDir === 'noindex, nofollow') {
        $stats['noindex_nofollow']++;
    } elseif ($curDir === 'index, follow') {
        $stats['index_follow']++;
    } elseif ($curDir === 'noindex, follow') {
        $stats['noindex_follow']++;
    } elseif ($curDir === 'index, nofollow') {
        $stats['index_nofollow']++;
    }
}

$categoriesList = [];
foreach ($masterPages as $url => $p) {
    $cat = $p['category'] ?? 'Other';
    if (!isset($categoriesList[$cat])) $categoriesList[$cat] = 0;
    $categoriesList[$cat]++;
}

$schemaTemplates = function_exists('get_schema_templates') ? get_schema_templates() : [];
$defaultSchemaSelectedPage = $selectedSchemaPage ?? 'index.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Global SEO &amp; Page Indexing Settings - SSSUTMS Admin</title>
  <link rel="icon" type="image/jpeg" href="../assets/images/logo/logo.jpg">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/admin.css">
  <style>
    .seo-tab-nav {
      border-bottom: 2px solid #e2e8f0;
      gap: 10px;
    }
    .seo-tab-nav .nav-link {
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
    .seo-tab-nav .nav-link:hover {
      color: #0b2545;
    }
    .seo-tab-nav .nav-link.active {
      color: #0b2545;
      border-bottom-color: #f59e0b;
      background: transparent;
    }

    .page-check-card {
      background: #ffffff;
      border: 1px solid #e2e8f0;
      border-radius: 10px;
      padding: 12px 14px;
      transition: all 0.2s ease;
      cursor: pointer;
      user-select: none;
    }
    .page-check-card:hover {
      border-color: #0b2545;
      background: #f8fafc;
      transform: translateY(-1px);
    }
    .page-check-card.selected {
      border-color: #0b2545;
      background: rgba(11, 37, 69, 0.04);
      box-shadow: 0 2px 8px rgba(11, 37, 69, 0.08);
    }
    .page-check-card input[type="checkbox"] {
      width: 18px;
      height: 18px;
      cursor: pointer;
    }

    .directive-badge {
      font-size: 0.76rem;
      font-weight: 700;
      padding: 4px 10px;
      border-radius: 20px;
      border: 1px solid;
      display: inline-flex;
      align-items: center;
      gap: 5px;
    }

    .category-filter-btn {
      font-size: 0.8rem;
      font-weight: 600;
      padding: 5px 12px;
      border-radius: 20px;
      border: 1px solid #e2e8f0;
      background: #ffffff;
      color: #475569;
      cursor: pointer;
      transition: all 0.2s ease;
    }
    .category-filter-btn:hover,
    .category-filter-btn.active {
      background: #0b2545;
      color: #ffffff;
      border-color: #0b2545;
    }

    .directive-select-custom {
      font-weight: 600;
      border-radius: 10px;
      padding: 10px 14px;
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
    <li><a href="events.php" class="nav-link"><i class="fa fa-calendar-days"></i> Events &amp; Workshops</a></li>
    <li><a href="seo.php" class="nav-link active"><i class="fa fa-globe"></i> Global SEO &amp; Indexing</a></li>
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

<!-- Main Content Area -->
<main class="admin-main">
  
  <header class="admin-topbar">
    <div class="d-flex align-items-center gap-3">
      <button class="admin-sidebar-toggle d-lg-none" type="button" aria-label="Toggle Navigation">
        <i class="fa fa-bars"></i>
      </button>
      <div>
        <h5 class="fw-bold text-dark mb-0">Global SEO &amp; Page Indexing Console</h5>
        <small class="text-muted d-none d-md-inline">Manage search engine crawler indexing rules, robots directives, and webmaster verification across <?php echo count($masterPages); ?> pages</small>
      </div>
    </div>
    <div class="d-flex align-items-center gap-2">
      <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 fw-bold d-none d-lg-inline-flex align-items-center gap-1">
        <i class="fa fa-database"></i> Storage: MySQL (sssutms_db)
      </span>
      <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-3 py-2 fw-bold d-none d-sm-inline-flex align-items-center gap-1">
        <i class="fa fa-shield-halved"></i> Default: <?php echo htmlspecialchars($globalSeo['global_robots_default']); ?>
      </span>
      <a href="../index.php" target="_blank" class="btn btn-outline-primary fw-bold rounded-pill px-3 btn-sm d-inline-flex align-items-center gap-1">
        <i class="fa fa-arrow-up-right-from-square"></i> Preview Site
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

  <!-- Top Metrics Bar -->
  <div class="row g-3 mb-4">
    <div class="col-6 col-md-3">
      <div class="card border-0 rounded-4 shadow-sm p-3 bg-white h-100">
        <div class="d-flex align-items-center justify-content-between">
          <div>
            <span class="text-muted small fw-bold">Total Pages Catalog</span>
            <h4 class="fw-bold text-dark mb-0 mt-1"><?php echo $stats['total']; ?></h4>
          </div>
          <div class="bg-primary-subtle text-primary p-3 rounded-circle">
            <i class="fa fa-layer-group fs-5"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="col-6 col-md-3">
      <div class="card border-0 rounded-4 shadow-sm p-3 bg-white h-100">
        <div class="d-flex align-items-center justify-content-between">
          <div>
            <span class="text-muted small fw-bold">Blocked (noindex, nofollow)</span>
            <h4 class="fw-bold text-danger mb-0 mt-1"><?php echo $stats['noindex_nofollow']; ?></h4>
          </div>
          <div class="bg-danger-subtle text-danger p-3 rounded-circle">
            <i class="fa fa-ban fs-5"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="col-6 col-md-3">
      <div class="card border-0 rounded-4 shadow-sm p-3 bg-white h-100">
        <div class="d-flex align-items-center justify-content-between">
          <div>
            <span class="text-muted small fw-bold">Live Indexed (index, follow)</span>
            <h4 class="fw-bold text-success mb-0 mt-1"><?php echo $stats['index_follow']; ?></h4>
          </div>
          <div class="bg-success-subtle text-success p-3 rounded-circle">
            <i class="fa fa-circle-check fs-5"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="col-6 col-md-3">
      <div class="card border-0 rounded-4 shadow-sm p-3 bg-white h-100">
        <div class="d-flex align-items-center justify-content-between">
          <div>
            <span class="text-muted small fw-bold">Partial Directives</span>
            <h4 class="fw-bold text-warning mb-0 mt-1"><?php echo ($stats['noindex_follow'] + $stats['index_nofollow']); ?></h4>
          </div>
          <div class="bg-warning-subtle text-warning p-3 rounded-circle">
            <i class="fa fa-sliders fs-5"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="admin-content-inner">

    <!-- Navigation Tabs -->
    <ul class="nav seo-tab-nav mb-4" id="seoTabs" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link <?php echo empty($selectedSchemaPage) ? 'active' : ''; ?>" id="bulk-tab-btn" data-bs-toggle="tab" data-bs-target="#bulk-tab" type="button" role="tab">
          <i class="fa fa-list-check text-primary"></i> Bulk Multi-Select Page Indexing
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="table-tab-btn" data-bs-toggle="tab" data-bs-target="#table-tab" type="button" role="tab">
          <i class="fa fa-table-list text-info"></i> Master Page Indexing Directory (<?php echo count($masterPages); ?>)
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="global-tab-btn" data-bs-toggle="tab" data-bs-target="#global-tab" type="button" role="tab">
          <i class="fa fa-sliders text-warning"></i> Global Defaults &amp; Webmaster Tags
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link <?php echo !empty($selectedSchemaPage) ? 'active' : ''; ?>" id="schema-tab-btn" data-bs-toggle="tab" data-bs-target="#schema-tab" type="button" role="tab">
          <i class="fa-solid fa-code text-success"></i> Page Schema Markup (JSON-LD) <span class="badge bg-success-subtle text-success border border-success-subtle ms-1"><?php echo $stats['custom_schemas']; ?> Custom</span>
        </button>
      </li>
    </ul>

    <div class="tab-content" id="seoTabsContent">

      <!-- ========================================================================= -->
      <!-- TAB 1: BULK MULTI-SELECT PAGE INDEXING -->
      <!-- ========================================================================= -->
      <div class="tab-pane fade <?php echo empty($selectedSchemaPage) ? 'show active' : ''; ?>" id="bulk-tab" role="tabpanel">

        <form method="POST" action="seo.php" id="bulkIndexingForm">
          <input type="hidden" name="action" value="bulk_apply_indexing">

          <!-- Action Control Bar -->
          <div class="card border-0 rounded-4 shadow-sm mb-4 bg-white">
            <div class="card-body p-4">
              <div class="row g-3 align-items-center">
                <div class="col-lg-5">
                  <label class="form-label fw-bold text-dark mb-1">
                    <i class="fa fa-shield-halved text-primary me-1"></i> Choose Robots Indexing Directive:
                  </label>
                  <select name="directive" class="form-select directive-select-custom border-2 shadow-sm" required>
                    <?php foreach ($directiveOptions as $val => $opt): 
                      // Default selection is 'noindex, nofollow' as requested
                      $isSelected = ($val === 'noindex, nofollow');
                    ?>
                      <option value="<?php echo htmlspecialchars($val); ?>" <?php echo $isSelected ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($opt['label']); ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="col-lg-4">
                  <label class="form-label fw-bold text-dark mb-1 d-block">
                    Selected Pages Action:
                  </label>
                  <button type="submit" class="btn btn-primary fw-bold rounded-pill px-4 py-2 w-100 shadow-sm" style="background: linear-gradient(135deg, #0b2545 0%, #1e4d8c 100%); border: none;">
                    <i class="fa fa-bolt me-1"></i> Apply Directive to <span id="selectedCountBadge" class="badge bg-warning text-dark ms-1">0</span> Selected Pages
                  </button>
                </div>
                <div class="col-lg-3 text-lg-end">
                  <label class="form-label text-muted small mb-1 d-block">Quick Select Controls:</label>
                  <div class="btn-group btn-group-sm">
                    <button type="button" class="btn btn-outline-secondary" id="selectAllBtn"><i class="fa fa-check-double me-1"></i> Select All</button>
                    <button type="button" class="btn btn-outline-secondary" id="deselectAllBtn"><i class="fa fa-xmark me-1"></i> Clear</button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Search & Filter Controls -->
          <div class="card border-0 rounded-4 shadow-sm mb-4 bg-white">
            <div class="card-body p-4">
              
              <div class="row g-3 align-items-center mb-3">
                <div class="col-md-6">
                  <div class="input-group">
                    <span class="input-group-text bg-light border-end-0"><i class="fa fa-search text-muted"></i></span>
                    <input type="text" id="pageSearchInput" class="form-control bg-light border-start-0" placeholder="Search pages by title, slug or path (e.g. syllabus, about, bams, phd)...">
                  </div>
                </div>
                <div class="col-md-6 text-md-end">
                  <span class="text-muted small me-2">Showing: <strong id="visiblePagesCount"><?php echo count($masterPages); ?></strong> / <?php echo count($masterPages); ?> Pages</span>
                </div>
              </div>

              <!-- Category Filter Pills -->
              <div class="d-flex flex-wrap gap-2 mb-2">
                <button type="button" class="category-filter-btn active" data-cat="all">All Sections (<?php echo count($masterPages); ?>)</button>
                <?php foreach ($categoriesList as $catName => $cnt): ?>
                  <button type="button" class="category-filter-btn" data-cat="<?php echo htmlspecialchars(strtolower($catName)); ?>">
                    <?php echo htmlspecialchars($catName); ?> (<?php echo $cnt; ?>)
                  </button>
                <?php endforeach; ?>
              </div>

            </div>
          </div>

          <!-- Multi-Select Pages Grid -->
          <div class="row g-3" id="pagesGridContainer">
            <?php foreach ($masterPages as $url => $p): 
              $curDirective = $globalSeo['page_rules'][$url] ?? $globalSeo['global_robots_default'];
              $badgeOpt = $directiveOptions[$curDirective] ?? $directiveOptions['noindex, nofollow'];
              $catLower = strtolower($p['category'] ?? 'other');
            ?>
              <div class="col-md-6 col-lg-4 page-grid-item" 
                   data-title="<?php echo strtolower(htmlspecialchars($p['title'])); ?>" 
                   data-url="<?php echo strtolower(htmlspecialchars($url)); ?>"
                   data-cat="<?php echo htmlspecialchars($catLower); ?>">
                <label class="page-check-card d-flex align-items-start gap-3 h-100">
                  <input type="checkbox" name="selected_pages[]" value="<?php echo htmlspecialchars($url); ?>" class="page-checkbox form-check-input mt-1">
                  <div class="flex-grow-1" style="overflow: hidden;">
                    <div class="d-flex align-items-center justify-content-between gap-1 mb-1">
                      <span class="badge bg-light text-muted border text-truncate" style="max-width: 140px;">
                        <?php echo htmlspecialchars($p['category']); ?>
                      </span>
                      <span class="directive-badge <?php echo $badgeOpt['badge_class']; ?>">
                        <i class="fa <?php echo $badgeOpt['icon']; ?>"></i> <?php echo htmlspecialchars($badgeOpt['short_label']); ?>
                      </span>
                    </div>
                    <h6 class="fw-bold text-dark mb-1 text-truncate" title="<?php echo htmlspecialchars($p['title']); ?>">
                      <i class="fa <?php echo $p['icon'] ?? 'fa-file'; ?> text-primary me-1"></i>
                      <?php echo htmlspecialchars($p['title']); ?>
                    </h6>
                    <small class="text-muted font-monospace d-block text-truncate" style="font-size: 0.78rem;">
                      <i class="fa fa-link me-1 opacity-75"></i><?php echo htmlspecialchars($url); ?>
                    </small>
                  </div>
                </label>
              </div>
            <?php endforeach; ?>
          </div>

        </form>

      </div>

      <!-- ========================================================================= -->
      <!-- TAB 2: MASTER PAGE INDEXING DIRECTORY (TABLE & QUICK SWITCHER) -->
      <!-- ========================================================================= -->
      <div class="tab-pane fade" id="table-tab" role="tabpanel">

        <div class="card border-0 rounded-4 shadow-sm mb-4 bg-white">
          <div class="card-header bg-white p-4 border-bottom d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div>
              <h5 class="fw-bold text-dark mb-1"><i class="fa fa-table-list text-primary me-2"></i> All Pages Indexing Registry</h5>
              <small class="text-muted">Directly inspect and modify robots directives for any individual page on the website.</small>
            </div>
            <div class="d-flex align-items-center gap-2">
              <input type="text" id="tableSearchInput" class="form-control form-control-sm" placeholder="Search registry table..." style="width: 250px;">
            </div>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-hover align-middle mb-0" id="masterSeoTable">
                <thead class="table-light">
                  <tr>
                    <th style="width: 4%;">#</th>
                    <th style="width: 38%;">Page Title &amp; URL</th>
                    <th style="width: 15%;">Section</th>
                    <th style="width: 28%;">Current Indexing Directive</th>
                    <th style="width: 15%; text-align: right;">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $idx = 1;
                  foreach ($masterPages as $url => $p): 
                    $hasCustom = isset($globalSeo['page_rules'][$url]);
                    $curDirective = $globalSeo['page_rules'][$url] ?? $globalSeo['global_robots_default'];
                    $optMeta = $directiveOptions[$curDirective] ?? $directiveOptions['noindex, nofollow'];
                  ?>
                    <tr class="seo-table-row" data-search="<?php echo strtolower(htmlspecialchars($p['title'] . ' ' . $url . ' ' . $p['category'])); ?>">
                      <td><?php echo $idx++; ?></td>
                      <td>
                        <div class="fw-bold text-dark">
                          <i class="fa <?php echo $p['icon'] ?? 'fa-file'; ?> text-primary me-1"></i>
                          <?php echo htmlspecialchars($p['title']); ?>
                        </div>
                        <small class="text-muted font-monospace"><i class="fa fa-link me-1 opacity-75"></i><?php echo htmlspecialchars($url); ?></small>
                      </td>
                      <td>
                        <span class="badge bg-light text-muted border"><?php echo htmlspecialchars($p['category']); ?></span>
                      </td>
                      <td>
                        <form method="POST" action="seo.php" class="d-flex align-items-center gap-2">
                          <input type="hidden" name="action" value="update_single_page_rule">
                          <input type="hidden" name="page_url" value="<?php echo htmlspecialchars($url); ?>">
                          <select name="directive" class="form-select form-select-sm fw-bold border-2" onchange="this.form.submit()">
                            <?php foreach ($directiveOptions as $val => $opt): 
                              $isSel = ($val === $curDirective);
                            ?>
                              <option value="<?php echo htmlspecialchars($val); ?>" <?php echo $isSel ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($opt['label']); ?>
                              </option>
                            <?php endforeach; ?>
                          </select>
                        </form>
                      </td>
                      <td class="text-end">
                        <div class="d-flex align-items-center justify-content-end gap-1">
                          <a href="../<?php echo htmlspecialchars($url); ?>" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-2" title="View Live Page">
                            <i class="fa fa-arrow-up-right-from-square"></i>
                          </a>
                          <?php if ($hasCustom): ?>
                            <form method="POST" action="seo.php" class="d-inline" onsubmit="return confirm('Reset this page rule to use global default?');">
                              <input type="hidden" name="action" value="reset_page_rule">
                              <input type="hidden" name="page_url" value="<?php echo htmlspecialchars($url); ?>">
                              <button type="submit" class="btn btn-sm btn-outline-secondary rounded-pill px-2" title="Reset to Global Default">
                                <i class="fa fa-rotate-left"></i>
                              </button>
                            </form>
                          <?php endif; ?>
                        </div>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>

      <!-- ========================================================================= -->
      <!-- TAB 3: GLOBAL DEFAULTS & WEBMASTER TAGS -->
      <!-- ========================================================================= -->
      <div class="tab-pane fade" id="global-tab" role="tabpanel">

        <div class="card border-0 rounded-4 shadow-sm mb-4 bg-white">
          <div class="card-header bg-white p-4 border-bottom">
            <h5 class="fw-bold text-dark mb-1"><i class="fa fa-sliders text-warning me-2"></i> Global Search Engine Indexing Defaults</h5>
            <small class="text-muted">Configure fallback indexing rules applied to any page without a specific override.</small>
          </div>
          <div class="card-body p-4">
            <form method="POST" action="seo.php">
              <input type="hidden" name="action" value="save_global_settings">

              <!-- Default Directive -->
              <div class="mb-4">
                <label class="form-label fw-bold text-dark">
                  Global Default Indexing Directive for All Unconfigured Pages <span class="text-danger">*</span>
                </label>
                <select name="global_robots_default" class="form-select form-select-lg fs-6 border-2" required>
                  <?php foreach ($directiveOptions as $val => $opt): 
                    $isSel = ($val === $globalSeo['global_robots_default']);
                  ?>
                    <option value="<?php echo htmlspecialchars($val); ?>" <?php echo $isSel ? 'selected' : ''; ?>>
                      <?php echo htmlspecialchars($opt['label']); ?>
                    </option>
                  <?php endforeach; ?>
                </select>
                <small class="text-muted">Default is <code>noindex, nofollow</code>. All public pages without individual rules will inherit this setting.</small>
              </div>

              <div class="row g-3 mb-4">
                <!-- Google Site Verification -->
                <div class="col-md-6">
                  <label class="form-label fw-bold text-dark">
                    <i class="fa-brands fa-google text-primary me-1"></i> Google Search Console Verification Meta Tag Content
                  </label>
                  <input type="text" name="google_verification" class="form-control" 
                         value="<?php echo htmlspecialchars($globalSeo['google_verification'] ?? ''); ?>" 
                         placeholder="e.g. aB1cD2eF3gH4iJ5kL6mN7oP8qR9sT0uV">
                  <small class="text-muted">Inserts <code>&lt;meta name="google-site-verification" content="..."&gt;</code> into site header.</small>
                </div>

                <!-- Bing Webmaster Verification -->
                <div class="col-md-6">
                  <label class="form-label fw-bold text-dark">
                    <i class="fa-brands fa-microsoft text-info me-1"></i> Bing Webmaster Verification Meta Tag Content
                  </label>
                  <input type="text" name="bing_verification" class="form-control" 
                         value="<?php echo htmlspecialchars($globalSeo['bing_verification'] ?? ''); ?>" 
                         placeholder="e.g. 1234567890ABCDEF1234567890ABCDEF">
                  <small class="text-muted">Inserts <code>&lt;meta name="msvalidate.01" content="..."&gt;</code> into site header.</small>
                </div>
              </div>

              <div class="row g-3 mb-4">
                <!-- Canonical Base Domain -->
                <div class="col-md-6">
                  <label class="form-label fw-bold text-dark">Canonical Base Domain URL</label>
                  <input type="url" name="canonical_base" class="form-control" 
                         value="<?php echo htmlspecialchars($globalSeo['canonical_base'] ?? 'https://www.sssutms.ac.in'); ?>" 
                         placeholder="https://www.sssutms.ac.in" required>
                </div>

                <!-- XML Sitemap URL -->
                <div class="col-md-6">
                  <label class="form-label fw-bold text-dark">Public XML Sitemap URL</label>
                  <input type="url" name="sitemap_url" class="form-control" 
                         value="<?php echo htmlspecialchars($globalSeo['sitemap_url'] ?? 'https://www.sssutms.ac.in/sitemap.xml'); ?>" 
                         placeholder="https://www.sssutms.ac.in/sitemap.xml" required>
                </div>
              </div>

              <!-- Meta Author -->
              <div class="mb-4">
                <label class="form-label fw-bold text-dark">Global Meta Author</label>
                <input type="text" name="meta_author" class="form-control" 
                       value="<?php echo htmlspecialchars($globalSeo['meta_author'] ?? 'Sri Satya Sai University of Technology and Medical Sciences'); ?>">
              </div>

              <!-- Custom Robots.txt Preview & Edit -->
              <div class="mb-4">
                <label class="form-label fw-bold text-dark"><i class="fa fa-robot me-1 text-primary"></i> Live Robots.txt Configuration</label>
                <textarea name="custom_robots_txt" class="form-control font-monospace" rows="5"><?php echo htmlspecialchars($globalSeo['custom_robots_txt'] ?? ''); ?></textarea>
                <small class="text-muted">Standard robots crawler instructions for search engine spiders.</small>
              </div>

              <div class="d-flex justify-content-end pt-3 border-top">
                <button type="submit" class="btn btn-primary px-4 py-2 fw-bold rounded-pill shadow-sm" style="background: linear-gradient(135deg, #0b2545 0%, #1e4d8c 100%); border: none;">
                  <i class="fa fa-floppy-disk me-1"></i> Save Global SEO &amp; Verification Settings
                </button>
              </div>

            </form>
          </div>
        </div>

      </div>

      <!-- ========================================================================= -->
      <!-- TAB 4: PAGE SCHEMA STRUCTURED DATA (JSON-LD) -->
      <!-- ========================================================================= -->
      <div class="tab-pane fade <?php echo !empty($selectedSchemaPage) ? 'show active' : ''; ?>" id="schema-tab" role="tabpanel">

        <div class="row g-4">
          <!-- Left: Schema Editor & Template Inserter -->
          <div class="col-lg-7">
            <div class="card border-0 rounded-4 shadow-sm bg-white h-100">
              <div class="card-header bg-white border-bottom p-4">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                  <div>
                    <h5 class="fw-bold text-dark mb-1">
                      <i class="fa-solid fa-code text-success me-2"></i> Page Schema Editor (JSON-LD)
                    </h5>
                    <small class="text-muted">Generate &amp; assign Google-compliant structured data schemas to boost search engine rich snippets.</small>
                  </div>
                  <div id="jsonValidationBadge">
                    <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 fw-bold">
                      <i class="fa-solid fa-check-circle me-1"></i> Valid JSON
                    </span>
                  </div>
                </div>
              </div>

              <div class="card-body p-4">
                <form method="POST" action="seo.php" id="schemaEditorForm">
                  <input type="hidden" name="action" value="save_page_schema">

                  <!-- Page Target Selector -->
                  <div class="mb-4">
                    <label class="form-label fw-bold text-dark">
                      <i class="fa-solid fa-file-lines text-primary me-1"></i> Select Target Website Page:
                    </label>
                    <select name="page_url" id="schemaPageSelect" class="form-select form-select-lg fs-6 border-2 shadow-sm" required onchange="onSchemaPageChange()">
                      <?php 
                      $currentCat = '';
                      foreach ($masterPages as $url => $p): 
                        if ($currentCat !== $p['category']) {
                          if ($currentCat !== '') echo '</optgroup>';
                          $currentCat = $p['category'];
                          echo '<optgroup label="' . htmlspecialchars($currentCat) . '">';
                        }
                        $hasCustom = !empty($globalSeo['page_schemas'][$url]);
                        $isSel = ($url === $defaultSchemaSelectedPage);
                      ?>
                        <option value="<?php echo htmlspecialchars($url); ?>" <?php echo $isSel ? 'selected' : ''; ?>>
                          <?php echo htmlspecialchars($p['title']); ?> (<?php echo htmlspecialchars($url); ?>) <?php echo $hasCustom ? ' ★ Custom Schema' : ''; ?>
                        </option>
                      <?php endforeach; ?>
                      <?php if ($currentCat !== '') echo '</optgroup>'; ?>
                    </select>
                    <small class="text-muted">Choose any page from the catalog to configure or customize its Schema.</small>
                  </div>

                  <!-- Quick Preset Templates Buttons -->
                  <div class="mb-4 p-3 rounded-3 bg-light border">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                      <span class="small fw-bold text-dark"><i class="fa-solid fa-wand-magic-sparkles text-warning me-1"></i> Quick 1-Click Schema Templates:</span>
                      <small class="text-muted">Click any template to auto-fill editor</small>
                    </div>
                    <div class="d-flex flex-wrap gap-2">
                      <button type="button" class="btn btn-sm btn-outline-primary fw-semibold rounded-pill px-3" onclick="loadSchemaPreset('EducationalOrganization')">
                        <i class="fa-solid fa-university me-1"></i> University / Organization
                      </button>
                      <button type="button" class="btn btn-sm btn-outline-success fw-semibold rounded-pill px-3" onclick="loadSchemaPreset('Course')">
                        <i class="fa-solid fa-graduation-cap me-1"></i> Course / Degree
                      </button>
                      <button type="button" class="btn btn-sm btn-outline-warning fw-semibold rounded-pill px-3" onclick="loadSchemaPreset('FAQPage')">
                        <i class="fa-solid fa-circle-question me-1"></i> FAQ Page
                      </button>
                      <button type="button" class="btn btn-sm btn-outline-info fw-semibold rounded-pill px-3" onclick="loadSchemaPreset('JobPosting')">
                        <i class="fa-solid fa-briefcase me-1"></i> Job Vacancy
                      </button>
                      <button type="button" class="btn btn-sm btn-outline-danger fw-semibold rounded-pill px-3" onclick="loadSchemaPreset('Event')">
                        <i class="fa-solid fa-calendar-days me-1"></i> Event / Workshop
                      </button>
                      <button type="button" class="btn btn-sm btn-outline-secondary fw-semibold rounded-pill px-3" onclick="loadSchemaPreset('Article')">
                        <i class="fa-solid fa-newspaper me-1"></i> Article / Press
                      </button>
                      <button type="button" class="btn btn-sm btn-outline-dark fw-semibold rounded-pill px-3" onclick="loadSchemaPreset('WebPage')">
                        <i class="fa-solid fa-file-lines me-1"></i> WebPage
                      </button>
                    </div>
                  </div>

                  <!-- JSON Code Textarea -->
                  <div class="mb-4">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                      <label class="form-label fw-bold text-dark mb-0">
                        <i class="fa-solid fa-code me-1 text-success"></i> JSON-LD Structured Data Code:
                      </label>
                      <div class="btn-group btn-group-sm">
                        <button type="button" class="btn btn-outline-secondary btn-sm" onclick="prettifySchemaJson()">
                          <i class="fa-solid fa-indent me-1"></i> Format / Prettify
                        </button>
                        <button type="button" class="btn btn-outline-secondary btn-sm" onclick="clearSchemaEditor()">
                          <i class="fa-solid fa-eraser me-1"></i> Clear
                        </button>
                      </div>
                    </div>
                    <?php 
                    $initialSchemaVal = !empty($globalSeo['page_schemas'][$defaultSchemaSelectedPage]) ? $globalSeo['page_schemas'][$defaultSchemaSelectedPage] : get_default_page_schema($defaultSchemaSelectedPage);
                    ?>
                    <textarea name="schema_json" id="schemaCodeTextarea" class="form-control font-monospace border-2 shadow-sm" rows="14" style="font-size: 0.88rem; line-height: 1.5; background: #fafafa; border-radius: 10px;" oninput="validateSchemaLive()"><?php echo htmlspecialchars($initialSchemaVal); ?></textarea>
                    <div class="d-flex align-items-center justify-content-between mt-2">
                      <small class="text-muted"><i class="fa-solid fa-shield-halved me-1 text-primary"></i> Automatically wrapped in <code>&lt;script type="application/ld+json"&gt;</code> in the <code>&lt;head&gt;</code>.</small>
                      <small id="schemaCharCounter" class="text-muted fw-bold">0 characters</small>
                    </div>
                  </div>

                  <!-- Action Buttons -->
                  <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 pt-3 border-top">
                    <button type="button" class="btn btn-outline-danger fw-semibold px-3 py-2 rounded-pill" onclick="resetCurrentSchema()">
                      <i class="fa-solid fa-rotate-left me-1"></i> Reset to Smart Default
                    </button>
                    <div class="d-flex align-items-center gap-2">
                      <button type="submit" class="btn btn-success px-4 py-2 fw-bold rounded-pill shadow-sm" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); border: none;">
                        <i class="fa-solid fa-floppy-disk me-1"></i> Save Page Schema
                      </button>
                    </div>
                  </div>

                </form>

                <!-- Hidden form for Reset action -->
                <form method="POST" action="seo.php" id="resetSchemaForm" style="display: none;">
                  <input type="hidden" name="action" value="reset_page_schema">
                  <input type="hidden" name="page_url" id="resetSchemaPageInput" value="">
                </form>
              </div>
            </div>
          </div>

          <!-- Right: Page Schema Catalog & Status Table -->
          <div class="col-lg-5">
            <div class="card border-0 rounded-4 shadow-sm bg-white h-100">
              <div class="card-header bg-white border-bottom p-4">
                <div class="d-flex align-items-center justify-content-between">
                  <h6 class="fw-bold text-dark mb-0">
                    <i class="fa-solid fa-table-list text-info me-2"></i> Page Schema Catalog (<?php echo count($masterPages); ?>)
                  </h6>
                  <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-1">
                    <?php echo $stats['custom_schemas']; ?> Custom Configured
                  </span>
                </div>
              </div>

              <div class="card-body p-3">
                <div class="mb-3">
                  <input type="text" id="schemaCatalogSearch" class="form-control form-control-sm" placeholder="Search page schema status...">
                </div>

                <div class="table-responsive" style="max-height: 580px; overflow-y: auto; scrollbar-width: thin;">
                  <table class="table table-hover align-middle mb-0 small">
                    <thead class="table-light sticky-top">
                      <tr>
                        <th>Page</th>
                        <th>Schema Status</th>
                        <th class="text-end">Action</th>
                      </tr>
                    </thead>
                    <tbody id="schemaCatalogTableBody">
                      <?php foreach ($masterPages as $url => $p): 
                        $hasCustom = !empty($globalSeo['page_schemas'][$url]);
                        $customContent = $hasCustom ? $globalSeo['page_schemas'][$url] : '';
                        $detectedType = 'Smart Default';
                        if ($hasCustom) {
                          $dec = json_decode($customContent, true);
                          $detectedType = $dec['@type'] ?? 'Custom JSON-LD';
                        }
                      ?>
                        <tr class="schema-catalog-row" data-search="<?php echo htmlspecialchars(strtolower($p['title'] . ' ' . $url . ' ' . $detectedType)); ?>">
                          <td>
                            <div class="fw-bold text-dark text-truncate" style="max-width: 170px;" title="<?php echo htmlspecialchars($p['title']); ?>">
                              <?php echo htmlspecialchars($p['title']); ?>
                            </div>
                            <code class="text-muted" style="font-size: 0.72rem;"><?php echo htmlspecialchars($url); ?></code>
                          </td>
                          <td>
                            <?php if ($hasCustom): ?>
                              <span class="badge bg-success-subtle text-success border border-success-subtle">
                                <i class="fa-solid fa-circle-check me-1"></i> <?php echo htmlspecialchars($detectedType); ?>
                              </span>
                            <?php else: ?>
                              <span class="badge bg-light text-muted border">
                                <i class="fa-solid fa-wand-magic-sparkles me-1"></i> Smart Default
                              </span>
                            <?php endif; ?>
                          </td>
                          <td class="text-end">
                            <button type="button" class="btn btn-sm btn-outline-primary rounded-pill px-2 py-1" onclick="selectPageForSchema('<?php echo htmlspecialchars($url, ENT_QUOTES); ?>')">
                              <i class="fa-solid fa-pen-to-square"></i> Edit
                            </button>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/admin.js"></script>
<script>
const allSavedSchemas = <?php echo json_encode($globalSeo['page_schemas'] ?? []); ?>;
const schemaPresets = <?php echo json_encode($schemaTemplates); ?>;

function onSchemaPageChange() {
  const select = document.getElementById('schemaPageSelect');
  const textarea = document.getElementById('schemaCodeTextarea');
  if (!select || !textarea) return;

  const url = select.value;
  if (allSavedSchemas[url]) {
    textarea.value = allSavedSchemas[url];
  } else {
    // If no custom schema, generate a default representation
    textarea.value = JSON.stringify(schemaPresets['EducationalOrganization']?.schema || {}, null, 2);
  }
  validateSchemaLive();
}

function loadSchemaPreset(presetKey) {
  const textarea = document.getElementById('schemaCodeTextarea');
  if (!textarea || !schemaPresets[presetKey]) return;

  textarea.value = JSON.stringify(schemaPresets[presetKey].schema, null, 2);
  validateSchemaLive();
}

function validateSchemaLive() {
  const textarea = document.getElementById('schemaCodeTextarea');
  const badge = document.getElementById('jsonValidationBadge');
  const counter = document.getElementById('schemaCharCounter');
  if (!textarea) return;

  const code = textarea.value.trim();
  if (counter) {
    counter.textContent = code.length + ' characters';
  }

  if (!code) {
    if (badge) badge.innerHTML = '<span class="badge bg-secondary-subtle text-secondary border px-3 py-2 fw-bold"><i class="fa-solid fa-minus me-1"></i> Empty (Uses Default)</span>';
    return;
  }

  try {
    JSON.parse(code);
    if (badge) badge.innerHTML = '<span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 fw-bold"><i class="fa-solid fa-check-circle me-1"></i> Valid JSON-LD</span>';
  } catch (err) {
    if (badge) badge.innerHTML = '<span class="badge bg-danger-subtle text-danger border border-danger-subtle px-3 py-2 fw-bold" title="' + err.message + '"><i class="fa-solid fa-triangle-exclamation me-1"></i> Invalid JSON Syntax</span>';
  }
}

function prettifySchemaJson() {
  const textarea = document.getElementById('schemaCodeTextarea');
  if (!textarea) return;
  const val = textarea.value.trim();
  if (!val) return;

  try {
    const obj = JSON.parse(val);
    textarea.value = JSON.stringify(obj, null, 2);
    validateSchemaLive();
  } catch (e) {
    alert('Cannot format invalid JSON: ' + e.message);
  }
}

function clearSchemaEditor() {
  const textarea = document.getElementById('schemaCodeTextarea');
  if (textarea) {
    textarea.value = '';
    validateSchemaLive();
  }
}

function resetCurrentSchema() {
  const select = document.getElementById('schemaPageSelect');
  if (!select) return;
  const url = select.value;
  if (!confirm('Are you sure you want to remove custom schema for "' + url + '" and revert to Smart Default?')) {
    return;
  }

  const resetForm = document.getElementById('resetSchemaForm');
  const resetInput = document.getElementById('resetSchemaPageInput');
  if (resetForm && resetInput) {
    resetInput.value = url;
    resetForm.submit();
  }
}

function selectPageForSchema(pageUrl) {
  const schemaTabBtn = document.getElementById('schema-tab-btn');
  if (schemaTabBtn) {
    const tab = new bootstrap.Tab(schemaTabBtn);
    tab.show();
  }

  const select = document.getElementById('schemaPageSelect');
  if (select) {
    select.value = pageUrl;
    onSchemaPageChange();
  }
}

document.addEventListener('DOMContentLoaded', function() {
  const checkboxes = document.querySelectorAll('.page-checkbox');
  const selectedCountBadge = document.getElementById('selectedCountBadge');
  const selectAllBtn = document.getElementById('selectAllBtn');
  const deselectAllBtn = document.getElementById('deselectAllBtn');
  const searchInput = document.getElementById('pageSearchInput');
  const catButtons = document.querySelectorAll('.category-filter-btn');
  const gridItems = document.querySelectorAll('.page-grid-item');
  const visibleCountBadge = document.getElementById('visiblePagesCount');

  function updateSelectedCount() {
    let cnt = 0;
    checkboxes.forEach(cb => {
      const card = cb.closest('.page-check-card');
      if (cb.checked) {
        cnt++;
        if (card) card.classList.add('selected');
      } else {
        if (card) card.classList.remove('selected');
      }
    });
    if (selectedCountBadge) {
      selectedCountBadge.textContent = cnt;
    }
  }

  checkboxes.forEach(cb => {
    cb.addEventListener('change', updateSelectedCount);
  });

  if (selectAllBtn) {
    selectAllBtn.addEventListener('click', function() {
      gridItems.forEach(item => {
        if (item.style.display !== 'none') {
          const cb = item.querySelector('.page-checkbox');
          if (cb) cb.checked = true;
        }
      });
      updateSelectedCount();
    });
  }

  if (deselectAllBtn) {
    deselectAllBtn.addEventListener('click', function() {
      checkboxes.forEach(cb => { cb.checked = false; });
      updateSelectedCount();
    });
  }

  let currentCat = 'all';
  function filterGrid() {
    const q = (searchInput ? searchInput.value : '').toLowerCase().trim();
    let visible = 0;

    gridItems.forEach(item => {
      const title = item.getAttribute('data-title') || '';
      const url = item.getAttribute('data-url') || '';
      const cat = item.getAttribute('data-cat') || '';

      const matchesSearch = !q || title.includes(q) || url.includes(q);
      const matchesCat = (currentCat === 'all') || (cat === currentCat);

      if (matchesSearch && matchesCat) {
        item.style.display = '';
        visible++;
      } else {
        item.style.display = 'none';
      }
    });

    if (visibleCountBadge) {
      visibleCountBadge.textContent = visible;
    }
  }

  if (searchInput) {
    searchInput.addEventListener('input', filterGrid);
  }

  catButtons.forEach(btn => {
    btn.addEventListener('click', function() {
      catButtons.forEach(b => b.classList.remove('active'));
      this.classList.add('active');
      currentCat = this.getAttribute('data-cat') || 'all';
      filterGrid();
    });
  });

  // Table Search Filter
  const tableSearch = document.getElementById('tableSearchInput');
  const tableRows = document.querySelectorAll('.seo-table-row');
  if (tableSearch) {
    tableSearch.addEventListener('input', function() {
      const q = (tableSearch.value || '').toLowerCase().trim();
      tableRows.forEach(row => {
        const text = row.getAttribute('data-search') || '';
        if (!q || text.includes(q)) {
          row.style.display = '';
        } else {
          row.style.display = 'none';
        }
      });
    });
  }

  // Schema Catalog Search Filter
  const schemaSearch = document.getElementById('schemaCatalogSearch');
  const schemaRows = document.querySelectorAll('.schema-catalog-row');
  if (schemaSearch) {
    schemaSearch.addEventListener('input', function() {
      const q = (schemaSearch.value || '').toLowerCase().trim();
      schemaRows.forEach(row => {
        const text = row.getAttribute('data-search') || '';
        if (!q || text.includes(q)) {
          row.style.display = '';
        } else {
          row.style.display = 'none';
        }
      });
    });
  }

  updateSelectedCount();
  validateSchemaLive();
});
</script>

</body>
</html>
