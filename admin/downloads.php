<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/download_helper.php';
require_admin_auth();

$catalog = get_download_catalog();
$msg = '';
$error = '';

// Handle Add / Edit Document
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'save_doc') {
    $pageKey = clean_input($_POST['page_key'] ?? '');
    $docId = !empty($_POST['doc_id']) ? clean_input($_POST['doc_id']) : ('dl_' . time() . '_' . rand(100, 999));
    $title = clean_input($_POST['title'] ?? '');
    $category = clean_input($_POST['category'] ?? 'General');
    $status = clean_input($_POST['status'] ?? 'Active');
    $fileUrl = trim($_POST['file_url'] ?? '');

    // Handle File Upload if provided
    if (isset($_FILES['doc_file']) && $_FILES['doc_file']['error'] === UPLOAD_ERR_OK) {
        $allowed = ['pdf', 'doc', 'docx', 'xls', 'xlsx', 'zip'];
        $origName = $_FILES['doc_file']['name'];
        $ext = strtolower(pathinfo($origName, PATHINFO_EXTENSION));

        if (in_array($ext, $allowed)) {
            $newFileName = 'dl_' . preg_replace('/[^a-zA-Z0-9_-]/', '_', pathinfo($origName, PATHINFO_FILENAME)) . '_' . time() . '.' . $ext;
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
                'title'    => $title,
                'category' => $category,
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
$activeSection = clean_input($_GET['sec'] ?? 'Outcome Based Curriculum');
if (!isset($catalog[$activeSection])) {
    $activeSection = 'Outcome Based Curriculum';
}

$sectionPages = $catalog[$activeSection]['pages'] ?? [];
$firstPageKey = array_key_first($sectionPages);
$selectedPage = clean_input($_GET['page'] ?? $firstPageKey);
if (!isset($sectionPages[$selectedPage])) {
    $selectedPage = $firstPageKey;
}

// Fetch documents for the selected page
$pageItems = get_download_page_data($selectedPage, []);
$selectedPageInfo = $sectionPages[$selectedPage] ?? ['title' => 'Downloads', 'file' => 'index.php'];

// Load full data for stats
$allDownloadsData = get_json_data('download_documents.json', []);
$totalAllDocs = 0;
foreach ($allDownloadsData as $p) {
    if (isset($p['data']) && is_array($p['data'])) {
        $totalAllDocs += count($p['data']);
    }
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
      <a href="../<?php echo htmlspecialchars($selectedPageInfo['file']); ?>" target="_blank" class="btn btn-outline-primary btn-sm rounded-pill px-3 shadow-sm">
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
    <div class="row g-3 mb-4">
      <div class="col-xl-3 col-sm-6">
        <div class="admin-stat-card">
          <div>
            <span class="stat-label">Managed Pages</span>
            <h3 class="stat-value text-dark mb-1">52</h3>
            <span class="badge bg-primary-subtle text-primary fw-bold">4 Major Categories</span>
          </div>
          <div class="stat-icon bg-primary-subtle text-primary">
            <i class="fa fa-network-wired"></i>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-sm-6">
        <div class="admin-stat-card">
          <div>
            <span class="stat-label">Active Section</span>
            <h4 class="fw-bold text-dark mb-1 fs-5"><?php echo htmlspecialchars($activeSection); ?></h4>
            <span class="badge bg-success-subtle text-success fw-bold"><?php echo count($sectionPages); ?> Programs Linked</span>
          </div>
          <div class="stat-icon bg-success-subtle text-success">
            <i class="fa <?php echo $catalog[$activeSection]['icon'] ?? 'fa-folder'; ?>"></i>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-sm-6">
        <div class="admin-stat-card">
          <div>
            <span class="stat-label">Current Page Docs</span>
            <h3 class="stat-value text-dark mb-1"><?php echo count($pageItems); ?></h3>
            <span class="badge bg-info-subtle text-info fw-bold"><?php echo htmlspecialchars($selectedPageInfo['title']); ?></span>
          </div>
          <div class="stat-icon bg-info-subtle text-info">
            <i class="fa fa-file-pdf"></i>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-sm-6">
        <div class="admin-stat-card">
          <div>
            <span class="stat-label">Total Documents</span>
            <h3 class="stat-value text-dark mb-1"><?php echo $totalAllDocs; ?></h3>
            <span class="badge bg-warning-subtle text-warning fw-bold">Live Dynamic Storage</span>
          </div>
          <div class="stat-icon bg-warning-subtle text-warning">
            <i class="fa fa-database"></i>
          </div>
        </div>
      </div>
    </div>

    <!-- 4 Section Selector Navigation Tabs -->
    <div class="card border-0 shadow-sm rounded-4 mb-4 bg-white">
      <div class="card-body p-3">
        <ul class="nav nav-pills nav-fill gap-2 flex-column flex-md-row">
          <?php foreach ($catalog as $secTitle => $secMeta): 
            $isActive = ($secTitle === $activeSection);
          ?>
            <li class="nav-item">
              <a class="nav-link text-start text-md-center py-2 px-3 fw-bold rounded-3 <?php echo $isActive ? 'active bg-primary text-white shadow-sm' : 'text-secondary bg-light'; ?>" 
                 href="downloads.php?sec=<?php echo urlencode($secTitle); ?>">
                <i class="fa <?php echo $secMeta['icon']; ?> me-2"></i>
                <span><?php echo htmlspecialchars($secTitle); ?></span>
                <span class="badge <?php echo $isActive ? 'bg-light text-primary' : 'bg-secondary text-white'; ?> ms-2"><?php echo count($secMeta['pages']); ?></span>
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
            <a href="../<?php echo htmlspecialchars($selectedPageInfo['file']); ?>" target="_blank" class="btn btn-outline-primary" title="View Public Page">
              <i class="fa fa-arrow-up-right-from-square"></i>
            </a>
          </div>
        </div>

        <div class="col-lg-6 text-lg-end">
          <span class="badge bg-light text-dark border px-3 py-2 me-2">
            <i class="fa fa-folder text-warning me-1"></i> Path: <code><?php echo htmlspecialchars($selectedPageInfo['file']); ?></code>
          </span>
          <button type="button" class="btn btn-sm btn-primary rounded-pill px-3 shadow-sm fw-bold" data-bs-toggle="modal" data-bs-target="#addDocModal">
            <i class="fa fa-plus me-1"></i> Add New Document
          </button>
        </div>
      </div>

      <!-- Live Search & Filter Bar for this page's documents -->
      <div class="d-flex flex-wrap justify-content-between align-items-center mb-3 gap-2">
        <div class="input-group" style="max-width: 380px;">
          <span class="input-group-text bg-light border-end-0"><i class="fa fa-search text-muted"></i></span>
          <input type="text" id="docSearchInput" class="form-control border-start-0" placeholder="Search title, branch, semester..." onkeyup="filterDocsTable()">
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
              <th>Document Title / Description</th>
              <th>Course / Branch / Category</th>
              <th>File Name &amp; Link</th>
              <th class="text-center" style="width: 110px;">Status</th>
              <th class="text-center" style="width: 140px;">Actions</th>
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
                $fileUrl = $doc['url'] ?? $doc['file'] ?? '#';
                if (strpos($fileUrl, 'http') !== 0 && strpos($fileUrl, '/') !== 0) {
                    $fileUrl = BASE_URL . ltrim($fileUrl, '/');
                }
              ?>
                <tr>
                  <td class="text-center fw-bold text-muted"><?php echo $idx + 1; ?></td>
                  <td>
                    <div class="fw-bold text-dark"><?php echo htmlspecialchars($doc['title'] ?? 'Document'); ?></div>
                    <?php if (!empty($doc['date'])): ?>
                      <small class="text-muted"><i class="fa fa-calendar-day me-1"></i> <?php echo htmlspecialchars($doc['date']); ?></small>
                    <?php endif; ?>
                  </td>
                  <td>
                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2 py-1">
                      <?php echo htmlspecialchars($doc['category'] ?? 'General'); ?>
                    </span>
                    <?php if (!empty($doc['badge'])): ?>
                      <span class="badge bg-secondary px-2 py-1"><?php echo htmlspecialchars($doc['badge']); ?></span>
                    <?php endif; ?>
                  </td>
                  <td>
                    <a href="<?php echo htmlspecialchars($fileUrl); ?>" target="_blank" class="text-decoration-none small text-truncate d-inline-block" style="max-width: 250px;">
                      <i class="fa fa-file-pdf text-danger me-1"></i> <?php echo htmlspecialchars($doc['file'] ?? basename($fileUrl)); ?>
                    </a>
                  </td>
                  <td class="text-center">
                    <span class="badge bg-success-subtle text-success px-2 py-1 fw-bold">
                      <i class="fa fa-check-circle me-1"></i> Live
                    </span>
                  </td>
                  <td class="text-center">
                    <div class="btn-group btn-group-sm">
                      <a href="<?php echo htmlspecialchars($fileUrl); ?>" target="_blank" class="btn btn-outline-secondary" title="View Document">
                        <i class="fa fa-eye"></i>
                      </a>
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

<!-- Add / Edit Document Modal -->
<div class="modal fade" id="addDocModal" tabindex="-1" aria-labelledby="addDocModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content border-0 shadow-lg rounded-4">
      
      <div class="modal-header bg-primary text-white border-0 py-3">
        <h5 class="modal-title fw-bold" id="addDocModalLabel">
          <i class="fa fa-file-circle-plus me-2"></i> Upload / Add Dynamic Document
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
              <label class="form-label fw-bold small text-dark">Course / Branch / Category Tag</label>
              <input type="text" name="category" class="form-control" placeholder="e.g. Computer Science, III Sem, CBCS" value="General">
            </div>

            <div class="col-12">
              <label class="form-label fw-bold small text-dark">Document Title / Circular Label <span class="text-danger">*</span></label>
              <input type="text" name="title" class="form-control" placeholder="e.g. B.E. Computer Science Scheme & Syllabus (Session 2026-27)" required>
            </div>

            <div class="col-md-6">
              <label class="form-label fw-bold small text-dark">Upload PDF / Document File</label>
              <input type="file" name="doc_file" class="form-control" accept=".pdf,.doc,.docx,.xls,.xlsx,.zip">
              <small class="text-muted">Max file size: 25MB (PDF recommended)</small>
            </div>

            <div class="col-md-6">
              <label class="form-label fw-bold small text-dark">OR Existing File Path / URL</label>
              <input type="text" name="file_url" class="form-control" placeholder="e.g. assets/images/Files/Link/SCHEME/BE_CSE.pdf">
              <small class="text-muted">Enter URL if not uploading a new file</small>
            </div>

            <div class="col-md-6">
              <label class="form-label fw-bold small text-dark">Status</label>
              <select name="status" class="form-select">
                <option value="Active" selected>Active &bull; Live on Public Page</option>
                <option value="Draft">Draft &bull; Hide from Public Page</option>
              </select>
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
</script>
</body>
</html>
