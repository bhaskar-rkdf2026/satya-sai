<?php
require_once __DIR__ . '/../config.php';
require_admin_auth();

$allData = get_json_data('page_documents.json', []);
$msg = '';
$error = '';

// Handle Add / Edit Document
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'save_doc') {
    $pageKey = clean_input($_POST['page_key'] ?? '');
    $section = clean_input($_POST['section'] ?? 'General');
    $pageTitle = clean_input($_POST['page_title'] ?? '');
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
            $msg = 'Document saved successfully! It is now live on the public page.';
            $allData = get_json_data('page_documents.json', []);
        } else {
            $error = 'Page key, document title, and a valid file or link URL are required.';
        }
    }
}

// Handle Delete Document
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['page']) && isset($_GET['id'])) {
    $delPage = $_GET['page'];
    $delId = $_GET['id'];
    if (delete_page_document($delPage, $delId)) {
        $msg = 'Document removed successfully from page repository.';
        $allData = get_json_data('page_documents.json', []);
    } else {
        $error = 'Document not found or could not be removed.';
    }
}

// Get selected section filter
$selectedSection = clean_input($_GET['sec'] ?? 'all');
$selectedPage = clean_input($_GET['page'] ?? 'all');

// Build flattened list of documents with metadata
$flattened = [];
$uniqueSections = [];
$pagesBySection = [];

foreach ($allData as $pKey => $col) {
    $sec = $col['section'] ?? 'General';
    if (!in_array($sec, $uniqueSections)) {
        $uniqueSections[] = $sec;
    }
    if (!isset($pagesBySection[$sec])) {
        $pagesBySection[$sec] = [];
    }
    $pagesBySection[$sec][$pKey] = [
        'title' => $col['title'] ?? $pKey,
        'count' => count($col['documents'] ?? []),
        'source_file' => $col['source_file'] ?? ''
    ];

    // Filter documents
    if ($selectedSection !== 'all' && strcasecmp($sec, $selectedSection) !== 0) {
        continue;
    }
    if ($selectedPage !== 'all' && $pKey !== $selectedPage) {
        continue;
    }

    foreach ($col['documents'] ?? [] as $doc) {
        $flattened[] = [
            'page_key' => $pKey,
            'page_title' => $col['title'] ?? $pKey,
            'section' => $sec,
            'source_file' => $col['source_file'] ?? '',
            'doc' => $doc
        ];
    }
}

// Calculate total documents
$totalDocsInSystem = 0;
foreach ($allData as $col) {
    $totalDocsInSystem += count($col['documents'] ?? []);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document & Page PDF Repository - SSSUTMS Admin</title>
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
      <i class="fa fa-xmark"></i>
    </button>
  </div>

  <ul class="admin-nav">
    <li><a href="index.php" class="nav-link"><i class="fa fa-gauge"></i> Dashboard</a></li>
    <li><a href="home.php" class="nav-link"><i class="fa fa-house-chimney-window"></i> Home Page Editor</a></li>
    <li><a href="about.php" class="nav-link"><i class="fa fa-circle-info"></i> About Pages (42)</a></li>
    <li><a href="faculties.php" class="nav-link"><i class="fa fa-graduation-cap"></i> Faculties &amp; Depts (14)</a></li>
    <li><a href="documents.php" class="nav-link active"><i class="fa fa-folder-open"></i> Documents & Page PDFs</a></li>
    <li><a href="notices.php" class="nav-link"><i class="fa fa-bullhorn"></i> Notices & Circulars</a></li>
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
  
  <header class="admin-topbar">
    <div class="d-flex align-items-center gap-3">
      <button class="admin-sidebar-toggle d-lg-none" type="button" aria-label="Toggle Navigation">
        <i class="fa fa-bars"></i>
      </button>
      <div>
        <h5 class="fw-bold text-dark mb-0">Documents & Page PDF Repository</h5>
        <small class="text-muted d-none d-md-inline">Live management of 1,200+ PDF notifications, exam schedules, ordinances, approvals & research papers</small>
      </div>
    </div>
    <div>
      <button class="btn btn-primary fw-bold rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#docModal" onclick="resetDocForm()">
        <i class="fa fa-cloud-arrow-up me-1"></i> Upload / Add Document
      </button>
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

  <!-- Metric Overview Cards -->
  <div class="row g-3 mb-4">
    <div class="col-xl-3 col-sm-6">
      <div class="admin-stat-card">
        <div>
          <span class="stat-label">Total Indexed PDFs</span>
          <h3 class="stat-value text-dark mb-1"><?php echo $totalDocsInSystem; ?></h3>
          <span class="badge bg-success-subtle text-success fw-bold"><i class="fa fa-circle-check me-1"></i> 100% Live Synced</span>
        </div>
        <div class="stat-icon bg-primary-subtle text-primary">
          <i class="fa fa-file-pdf"></i>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-sm-6">
      <div class="admin-stat-card">
        <div>
          <span class="stat-label">Connected Pages</span>
          <h3 class="stat-value text-dark mb-1"><?php echo count($allData); ?></h3>
          <span class="badge bg-info-subtle text-info fw-bold"><i class="fa fa-layer-group me-1"></i> Sub-page Hubs</span>
        </div>
        <div class="stat-icon bg-info-subtle text-info">
          <i class="fa fa-file-lines"></i>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-sm-6">
      <div class="admin-stat-card">
        <div>
          <span class="stat-label">Exam Schedules & Alerts</span>
          <h3 class="stat-value text-dark mb-1">
            <?php 
              $examDocs = 0;
              foreach ($allData as $col) {
                if (stripos($col['section'] ?? '', 'Exam') !== false) $examDocs += count($col['documents'] ?? []);
              }
              echo $examDocs;
            ?>
          </h3>
          <span class="badge bg-warning-subtle text-dark fw-bold"><i class="fa fa-clock me-1"></i> Real-time Feeds</span>
        </div>
        <div class="stat-icon bg-warning-subtle text-warning">
          <i class="fa fa-calendar-check"></i>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-sm-6">
      <div class="admin-stat-card">
        <div>
          <span class="stat-label">Statutory & Research</span>
          <h3 class="stat-value text-dark mb-1">
            <?php 
              $statDocs = 0;
              foreach ($allData as $col) {
                if (in_array($col['section'] ?? '', ['About', 'Research', 'Academic'])) $statDocs += count($col['documents'] ?? []);
              }
              echo $statDocs;
            ?>
          </h3>
          <span class="badge bg-secondary-subtle text-secondary fw-bold">UGC &bull; AICTE &bull; Patents</span>
        </div>
        <div class="stat-icon bg-success-subtle text-success">
          <i class="fa fa-stamp"></i>
        </div>
      </div>
    </div>
  </div>

  <!-- Document Repository Explorer Card -->
  <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-4">
    
    <!-- Section Navigation Tabs -->
    <div class="d-flex flex-wrap gap-2 pb-3 mb-3 border-bottom">
      <a href="documents.php?sec=all" class="btn btn-sm <?php echo ($selectedSection === 'all') ? 'btn-primary fw-bold' : 'btn-light text-muted'; ?> rounded-pill px-3">
        All Sections (<?php echo $totalDocsInSystem; ?>)
      </a>
      <?php foreach ($uniqueSections as $sec): 
        $secCount = 0;
        foreach ($allData as $c) {
          if (($c['section'] ?? '') === $sec) $secCount += count($c['documents'] ?? []);
        }
      ?>
        <a href="documents.php?sec=<?php echo urlencode($sec); ?>" class="btn btn-sm <?php echo ($selectedSection === $sec) ? 'btn-primary fw-bold' : 'btn-light text-muted'; ?> rounded-pill px-3">
          <?php echo htmlspecialchars($sec); ?> (<?php echo $secCount; ?>)
        </a>
      <?php endforeach; ?>
    </div>

    <!-- Filters & Search Toolbar -->
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
      <div class="d-flex align-items-center gap-2">
        <h5 class="fw-bold text-dark mb-0">Documents List (<?php echo count($flattened); ?>)</h5>
        <span class="badge bg-success-subtle text-success fw-bold">Live Synced</span>
      </div>

      <div class="d-flex gap-2">
        <!-- Page Filter Dropdown -->
        <select id="pageFilterSelect" class="form-select form-select-sm" style="min-width: 200px;" onchange="filterByPage(this.value)">
          <option value="all">All Pages in Section</option>
          <?php foreach ($allData as $pk => $col): 
            if ($selectedSection !== 'all' && strcasecmp($col['section'] ?? '', $selectedSection) !== 0) continue;
          ?>
            <option value="<?php echo htmlspecialchars($pk); ?>" <?php echo ($selectedPage === $pk) ? 'selected' : ''; ?>>
              <?php echo htmlspecialchars($col['title'] ?? $pk); ?> (<?php echo count($col['documents'] ?? []); ?>)
            </option>
          <?php endforeach; ?>
        </select>

        <input type="text" id="docSearch" class="form-control form-control-sm" placeholder="Search title, category, or file..." style="min-width: 240px;">
      </div>
    </div>

    <div class="d-block d-md-none text-muted small mb-2">
      <i class="fa fa-arrows-left-right me-1 text-primary"></i> <span class="fw-semibold">Swipe table horizontally</span> to see full content & actions.
    </div>

    <!-- Documents Data Table -->
    <div class="table-responsive">
      <table class="table table-hover align-middle">
        <thead class="table-light">
          <tr>
            <th style="width: 50px;">#</th>
            <th>Document Title & Attachment</th>
            <th>Belongs To Page</th>
            <th>Category / Tag</th>
            <th>Date</th>
            <th>Status</th>
            <th class="text-end">Actions</th>
          </tr>
        </thead>
        <tbody id="docsTableBody">
          <?php if (empty($flattened)): ?>
            <tr><td colspan="7" class="text-center py-5 text-muted">No documents found matching this filter. Click "Upload / Add Document" above.</td></tr>
          <?php else: ?>
            <?php foreach ($flattened as $idx => $item): 
              $doc = $item['doc'];
              $file = $doc['file'] ?? '';
              $fileUrl = $file;
              if (strpos($file, 'http') !== 0 && strpos($file, 'ftp') !== 0) {
                $fileUrl = BASE_URL . ltrim($file, '/');
              }
            ?>
              <tr class="doc-row" data-title="<?php echo strtolower(htmlspecialchars($doc['title'] ?? '')); ?>" data-cat="<?php echo strtolower(htmlspecialchars($doc['category'] ?? '')); ?>" data-file="<?php echo strtolower(htmlspecialchars($file)); ?>">
                <td><small class="text-muted fw-bold"><?php echo $idx + 1; ?></small></td>
                <td>
                  <div class="fw-bold text-dark mb-1"><?php echo htmlspecialchars($doc['title'] ?? ''); ?></div>
                  <a href="<?php echo htmlspecialchars($fileUrl); ?>" target="_blank" class="small text-primary text-decoration-none d-inline-flex align-items-center gap-1">
                    <i class="fa fa-file-pdf text-danger"></i> 
                    <span style="max-width: 260px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; display: inline-block;">
                      <?php echo htmlspecialchars(basename($file)); ?>
                    </span>
                    <i class="fa fa-arrow-up-right-from-square small text-muted ms-1"></i>
                  </a>
                </td>
                <td>
                  <span class="badge bg-primary-subtle text-primary fw-semibold"><?php echo htmlspecialchars($item['page_title']); ?></span>
                  <div><small class="text-muted font-monospace"><?php echo htmlspecialchars($item['section']); ?></small></div>
                </td>
                <td>
                  <span class="badge bg-light text-dark border fw-semibold"><?php echo htmlspecialchars($doc['category'] ?? 'General'); ?></span>
                </td>
                <td><small class="text-muted"><?php echo htmlspecialchars($doc['date'] ?? date('Y-m-d')); ?></small></td>
                <td>
                  <span class="badge bg-success-subtle text-success fw-semibold"><?php echo htmlspecialchars($doc['status'] ?? 'Active'); ?></span>
                </td>
                <td class="text-end">
                  <a href="<?php echo htmlspecialchars($fileUrl); ?>" target="_blank" class="btn btn-sm btn-outline-secondary rounded-pill px-3 me-1" title="View / Download PDF">
                    <i class="fa fa-eye"></i>
                  </a>
                  <button class="btn btn-sm btn-outline-primary rounded-pill px-3 me-1" onclick='editDoc(<?php echo json_encode($item); ?>)'>
                    <i class="fa fa-pen-to-square"></i> Edit
                  </button>
                  <a href="documents.php?action=delete&page=<?php echo urlencode($item['page_key']); ?>&id=<?php echo urlencode($doc['id']); ?>" 
                     class="btn btn-sm btn-outline-danger rounded-pill px-2"
                     onclick="return confirm('Remove this document from the page?');">
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

</main>

<!-- Document Upload / Edit Modal -->
<div class="modal fade" id="docModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content border-0 shadow-lg rounded-4">
      <div class="modal-header border-0 pb-0">
        <h5 class="modal-title fw-bold text-dark" id="modalTitle">Upload / Add Document</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form method="POST" action="documents.php" enctype="multipart/form-data">
        <div class="modal-body p-4">
          <input type="hidden" name="action" value="save_doc">
          <input type="hidden" name="doc_id" id="formDocId" value="">

          <div class="row g-3 mb-3">
            <div class="col-md-6">
              <label class="form-label small fw-bold">Section *</label>
              <select name="section" id="formSection" class="form-select" onchange="updatePageOptions(this.value)" required>
                <?php foreach ($uniqueSections as $s): ?>
                  <option value="<?php echo htmlspecialchars($s); ?>"><?php echo htmlspecialchars($s); ?></option>
                <?php endforeach; ?>
                <option value="Custom">+ Other Custom Section</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label small fw-bold">Target Page *</label>
              <select name="page_key" id="formPageKey" class="form-select" onchange="onPageSelected(this)" required>
                <?php foreach ($allData as $pk => $c): ?>
                  <option value="<?php echo htmlspecialchars($pk); ?>" data-section="<?php echo htmlspecialchars($c['section'] ?? ''); ?>" data-title="<?php echo htmlspecialchars($c['title'] ?? $pk); ?>">
                    <?php echo htmlspecialchars($c['title'] ?? $pk); ?> (<?php echo htmlspecialchars($c['section'] ?? ''); ?>)
                  </option>
                <?php endforeach; ?>
              </select>
              <input type="hidden" name="page_title" id="formPageTitle" value="">
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label small fw-bold">Document Title *</label>
            <input type="text" name="title" id="formTitle" class="form-control" placeholder="e.g. Schedule of B.Tech VIII Semester Examinations Dec 2024" required>
          </div>

          <div class="row g-3 mb-3">
            <div class="col-md-6">
              <label class="form-label small fw-bold">Category / Tag / Batch</label>
              <input type="text" name="category" id="formCategory" class="form-control" placeholder="e.g. Exam Schedule, AICTE Approvals, 2024-25">
            </div>
            <div class="col-md-6">
              <label class="form-label small fw-bold">Publish Date</label>
              <input type="date" name="date" id="formDate" class="form-control" value="<?php echo date('Y-m-d'); ?>">
            </div>
          </div>

          <div class="card bg-light border p-3 rounded-3 mb-3">
            <label class="form-label small fw-bold mb-2"><i class="fa fa-file-pdf text-danger me-1"></i> Document Source (Choose File OR Link)</label>
            <div class="mb-2">
              <label class="small text-muted mb-1">Option A: Upload PDF / Word File</label>
              <input type="file" name="doc_file" class="form-control" accept=".pdf,.doc,.docx,.xls,.xlsx,.zip">
            </div>
            <div>
              <label class="small text-muted mb-1">Option B: External File URL or Existing Asset Path</label>
              <input type="text" name="file_url" id="formFileUrl" class="form-control" placeholder="e.g. assets/pdf/time_table.pdf or https://...">
            </div>
          </div>

          <div class="mb-2">
            <label class="form-label small fw-bold">Publication Status</label>
            <select name="status" id="formStatus" class="form-select">
              <option value="Active">Active</option>
              <option value="New">New (Highlighted)</option>
              <option value="Archived">Archived</option>
            </select>
          </div>

        </div>
        <div class="modal-footer border-0 pt-0">
          <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary rounded-pill px-4 fw-bold shadow-sm">Save Document</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/admin.js"></script>
<script>
function filterByPage(pageKey) {
  const currentUrl = new URL(window.location.href);
  if (pageKey === 'all') {
    currentUrl.searchParams.delete('page');
  } else {
    currentUrl.searchParams.set('page', pageKey);
  }
  window.location.href = currentUrl.toString();
}

function onPageSelected(sel) {
  const opt = sel.options[sel.selectedIndex];
  if (opt) {
    document.getElementById('formPageTitle').value = opt.getAttribute('data-title') || '';
  }
}

function resetDocForm() {
  document.getElementById('modalTitle').textContent = 'Upload / Add Document';
  document.getElementById('formDocId').value = '';
  document.getElementById('formTitle').value = '';
  document.getElementById('formCategory').value = 'General';
  document.getElementById('formFileUrl').value = '';
  document.getElementById('formStatus').value = 'Active';
  document.getElementById('formDate').value = '<?php echo date('Y-m-d'); ?>';
  onPageSelected(document.getElementById('formPageKey'));
}

function editDoc(item) {
  document.getElementById('modalTitle').textContent = 'Edit Document: ' + item.doc.title;
  document.getElementById('formDocId').value = item.doc.id || '';
  document.getElementById('formSection').value = item.section || 'General';
  document.getElementById('formPageKey').value = item.page_key || '';
  document.getElementById('formPageTitle').value = item.page_title || '';
  document.getElementById('formTitle').value = item.doc.title || '';
  document.getElementById('formCategory').value = item.doc.category || 'General';
  document.getElementById('formFileUrl').value = item.doc.file || '';
  document.getElementById('formStatus').value = item.doc.status || 'Active';
  document.getElementById('formDate').value = item.doc.date || '<?php echo date('Y-m-d'); ?>';

  const modal = new bootstrap.Modal(document.getElementById('docModal'));
  modal.show();
}

// Instant Table Search Filter
document.addEventListener('DOMContentLoaded', function() {
  const search = document.getElementById('docSearch');
  const rows = document.querySelectorAll('.doc-row');

  if (search) {
    search.addEventListener('input', function() {
      const q = (search.value || '').toLowerCase().trim();
      rows.forEach(r => {
        const title = r.getAttribute('data-title') || '';
        const cat = r.getAttribute('data-cat') || '';
        const file = r.getAttribute('data-file') || '';
        if (!q || title.includes(q) || cat.includes(q) || file.includes(q)) {
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
