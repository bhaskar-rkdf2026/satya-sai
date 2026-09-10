<?php
require_once __DIR__ . '/../config.php';
require_admin_auth();

$notices = get_json_data('notices.json', []);
$msg = '';
$error = '';

// Handle Delete Notice
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $delId = (int)$_GET['id'];
    $notices = array_filter($notices, function($n) use ($delId) {
        return ($n['id'] ?? 0) !== $delId;
    });
    save_json_data('notices.json', array_values($notices));
    $msg = 'Notice deleted successfully.';
}

// Handle Add / Edit Notice
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $noticeId = !empty($_POST['notice_id']) ? (int)$_POST['notice_id'] : time();
    $title = clean_input($_POST['title'] ?? '');
    $category = clean_input($_POST['category'] ?? 'notices');
    $date = clean_input($_POST['date'] ?? date('Y-m-d'));
    $is_new = isset($_POST['is_new']) ? true : false;
    $filePath = clean_input($_POST['existing_file'] ?? '');

    // Handle File Upload if provided
    if (isset($_FILES['notice_file']) && $_FILES['notice_file']['error'] === UPLOAD_ERR_OK) {
        $tmpName = $_FILES['notice_file']['tmp_name'];
        $origName = preg_replace('/[^a-zA-Z0-9_\.-]/', '_', $_FILES['notice_file']['name']);
        $ext = strtolower(pathinfo($origName, PATHINFO_EXTENSION));
        
        $allowed = ['pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg'];
        if (in_array($ext, $allowed)) {
            $newName = 'notice_' . time() . '_' . $origName;
            $dest = UPLOAD_DIR . '/notices/' . $newName;
            if (move_uploaded_file($tmpName, $dest)) {
                $filePath = $newName;
            } else {
                $error = 'Failed to upload document to server.';
            }
        } else {
            $error = 'Invalid file format. Allowed formats: PDF, DOC, DOCX, JPG, PNG.';
        }
    } elseif (!empty($_POST['custom_link'])) {
        $filePath = clean_input($_POST['custom_link']);
    }

    if (empty($error)) {
        if (!empty($title)) {
            $updated = false;
            foreach ($notices as &$n) {
                if (($n['id'] ?? 0) === $noticeId) {
                    $n['title'] = $title;
                    $n['category'] = $category;
                    $n['date'] = $date;
                    $n['file'] = $filePath ?: ($n['file'] ?? '');
                    $n['is_new'] = $is_new;
                    $n['link'] = $filePath ?: ($n['link'] ?? '#');
                    $updated = true;
                    break;
                }
            }

            if (!$updated) {
                $newNotice = [
                    'id' => $noticeId,
                    'title' => $title,
                    'category' => $category,
                    'date' => $date,
                    'file' => $filePath ?: 'circular_' . time() . '.pdf',
                    'is_new' => $is_new,
                    'link' => $filePath ?: '#'
                ];
                array_unshift($notices, $newNotice);
                $msg = 'New notice created & published successfully!';
            } else {
                $msg = 'Notice updated successfully!';
            }

            save_json_data('notices.json', $notices);
        } else {
            $error = 'Notice title is required.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Notices & Circulars - SSSUTMS Admin</title>
  <link rel="icon" type="image/jpeg" href="../assets/images/logo/logo.jpg">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>

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
    <li><a href="documents.php" class="nav-link"><i class="fa fa-folder-open"></i> Documents & Page PDFs</a></li>
    <li><a href="notices.php" class="nav-link active"><i class="fa fa-bullhorn"></i> Notices & Circulars</a></li>
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

<main class="admin-main">
  
  <header class="admin-topbar">
    <div class="d-flex align-items-center gap-3">
      <button class="admin-sidebar-toggle d-lg-none" type="button" aria-label="Toggle Navigation">
        <i class="fa fa-bars"></i>
      </button>
      <div>
        <h5 class="fw-bold text-dark mb-0">University Notices, Circulars & Announcements</h5>
        <small class="text-muted d-none d-md-inline">Directly powers the live announcements on the public portal and examination pages</small>
      </div>
    </div>
    <div>
      <button class="btn btn-primary fw-bold rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#noticeModal" onclick="resetNoticeForm()">
        <i class="fa fa-plus me-1"></i> Add New Notice
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

  <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-4">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
      <div class="d-flex align-items-center gap-2">
        <h5 class="fw-bold text-dark mb-0">Published Notices (<?php echo count($notices); ?>)</h5>
        <span class="badge bg-success-subtle text-success fw-bold">Live Synchronized</span>
      </div>
      <div class="d-flex gap-2">
        <input type="text" id="noticeSearch" class="form-control form-control-sm" placeholder="Search notices..." style="width: 250px;">
        <select id="noticeCatFilter" class="form-select form-select-sm" style="width: 170px;">
          <option value="all">All Categories</option>
          <option value="notices">Notices</option>
          <option value="circulars">Circulars</option>
          <option value="exam">Examination</option>
          <option value="admission">Admission</option>
          <option value="general">General</option>
        </select>
      </div>
    </div>

    <div class="d-block d-md-none text-muted small mb-2">
      <i class="fa fa-arrows-left-right me-1 text-primary"></i> <span class="fw-semibold">Swipe table horizontally</span> to see full content & actions.
    </div>

    <div class="table-responsive">
      <table class="table table-hover align-middle">
        <thead class="table-light">
          <tr>
            <th style="width: 50px;">#</th>
            <th>Title & Attachment</th>
            <th>Category</th>
            <th>Publish Date</th>
            <th>Status</th>
            <th class="text-end">Actions</th>
          </tr>
        </thead>
        <tbody id="noticesTableBody">
          <?php if (empty($notices)): ?>
            <tr><td colspan="6" class="text-center py-4 text-muted">No notices found. Click "Add New Notice" above to create one.</td></tr>
          <?php else: ?>
            <?php foreach ($notices as $idx => $n): 
              $file = $n['file'] ?? $n['link'] ?? '';
              $fileUrl = '#';
              if (!empty($file)) {
                if (strpos($file, 'http') === 0) {
                  $fileUrl = $file;
                } elseif (file_exists(UPLOAD_DIR . '/notices/' . $file)) {
                  $fileUrl = BASE_URL . 'assets/uploads/notices/' . $file;
                } else {
                  $fileUrl = BASE_URL . 'assets/images/Files/Link/' . $file;
                }
              }
            ?>
              <tr class="notice-item" data-title="<?php echo strtolower(htmlspecialchars($n['title'] ?? '')); ?>" data-cat="<?php echo strtolower(htmlspecialchars($n['category'] ?? '')); ?>">
                <td><small class="text-muted fw-bold"><?php echo $idx + 1; ?></small></td>
                <td>
                  <div class="fw-bold text-dark mb-1"><?php echo htmlspecialchars($n['title'] ?? ''); ?></div>
                  <?php if (!empty($file) && $file !== '#'): ?>
                    <a href="<?php echo htmlspecialchars($fileUrl); ?>" target="_blank" class="small text-primary text-decoration-none">
                      <i class="fa fa-paperclip me-1"></i> <?php echo htmlspecialchars(basename($file)); ?>
                    </a>
                  <?php else: ?>
                    <span class="small text-muted">No document attachment</span>
                  <?php endif; ?>
                </td>
                <td>
                  <span class="badge bg-secondary-subtle text-secondary fw-semibold text-uppercase">
                    <?php echo htmlspecialchars($n['category'] ?? 'General'); ?>
                  </span>
                </td>
                <td>
                  <small class="text-muted"><i class="fa fa-calendar-day me-1"></i> <?php echo htmlspecialchars($n['date'] ?? date('Y-m-d')); ?></small>
                </td>
                <td>
                  <?php if (!empty($n['is_new'])): ?>
                    <span class="badge bg-danger-subtle text-danger fw-bold"><i class="fa fa-star me-1"></i> New</span>
                  <?php else: ?>
                    <span class="badge bg-light text-muted border">Standard</span>
                  <?php endif; ?>
                </td>
                <td class="text-end">
                  <button class="btn btn-sm btn-outline-primary rounded-pill px-3 me-1" 
                    onclick='editNotice(<?php echo json_encode($n); ?>)'>
                    <i class="fa fa-pen-to-square"></i> Edit
                  </button>
                  <a href="notices.php?action=delete&id=<?php echo $n['id'] ?? 0; ?>" 
                     class="btn btn-sm btn-outline-danger rounded-pill px-2"
                     onclick="return confirm('Are you sure you want to permanently delete this notice?');">
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

<!-- Notice Add/Edit Modal -->
<div class="modal fade" id="noticeModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content border-0 shadow-lg rounded-4">
      <div class="modal-header border-0 pb-0">
        <h5 class="modal-title fw-bold text-dark" id="modalTitle">Publish Official Notice</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form method="POST" action="notices.php" enctype="multipart/form-data">
        <div class="modal-body p-4">
          <input type="hidden" name="action" value="save_notice">
          <input type="hidden" name="notice_id" id="formNoticeId" value="">
          <input type="hidden" name="existing_file" id="formExistingFile" value="">

          <div class="mb-3">
            <label class="form-label small fw-bold">Notice Title / Circular Heading *</label>
            <textarea name="title" id="formTitle" rows="2" class="form-control" placeholder="e.g. Schedule for B.Tech Semester End Examination (Dec-Jan 2026)" required></textarea>
          </div>

          <div class="row g-3 mb-3">
            <div class="col-md-6">
              <label class="form-label small fw-bold">Target Category</label>
              <select name="category" id="formCategory" class="form-select" required>
                <option value="notices">Notices & General Circulars</option>
                <option value="exam">Examinations & Results</option>
                <option value="admission">Admissions & Intake</option>
                <option value="circulars">Statutory & Council Circulars</option>
                <option value="general">University Life & Campus</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label small fw-bold">Publish Date</label>
              <input type="date" name="date" id="formDate" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label small fw-bold">Upload PDF Document / Circular Attachment</label>
            <input type="file" name="notice_file" class="form-control" accept=".pdf,.doc,.docx,.jpg,.png">
            <small class="text-muted">Upload a new PDF to store on the server, or leave blank to keep current file.</small>
          </div>

          <div class="mb-3">
            <label class="form-label small fw-bold">Or External Document Link (Optional)</label>
            <input type="text" name="custom_link" id="formCustomLink" class="form-control" placeholder="https://... or relative assets/ path">
          </div>

          <div class="form-check form-switch mt-3">
            <input class="form-check-input" type="checkbox" name="is_new" id="formIsNew" value="1" checked>
            <label class="form-check-label fw-bold text-dark small" for="formIsNew">
              Highlight with "NEW" flashing badge on public homepage
            </label>
          </div>
        </div>
        <div class="modal-footer border-0 pt-0">
          <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary rounded-pill px-4 fw-bold">Save & Publish Notice</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/admin.js"></script>
<script>
function resetNoticeForm() {
  document.getElementById('modalTitle').textContent = 'Publish Official Notice';
  document.getElementById('formNoticeId').value = '';
  document.getElementById('formExistingFile').value = '';
  document.getElementById('formTitle').value = '';
  document.getElementById('formCategory').value = 'notices';
  document.getElementById('formDate').value = '<?php echo date('Y-m-d'); ?>';
  document.getElementById('formCustomLink').value = '';
  document.getElementById('formIsNew').checked = true;
}

function editNotice(notice) {
  document.getElementById('modalTitle').textContent = 'Edit Notice';
  document.getElementById('formNoticeId').value = notice.id || '';
  document.getElementById('formExistingFile').value = notice.file || '';
  document.getElementById('formTitle').value = notice.title || '';
  document.getElementById('formCategory').value = notice.category || 'notices';
  document.getElementById('formDate').value = notice.date || '<?php echo date('Y-m-d'); ?>';
  document.getElementById('formCustomLink').value = notice.link && notice.link !== '#' ? notice.link : '';
  document.getElementById('formIsNew').checked = Boolean(notice.is_new);
  
  const modal = new bootstrap.Modal(document.getElementById('noticeModal'));
  modal.show();
}

// Instant Filter
document.addEventListener('DOMContentLoaded', function() {
  const search = document.getElementById('noticeSearch');
  const cat = document.getElementById('noticeCatFilter');
  const rows = document.querySelectorAll('.notice-item');

  function filterTable() {
    const q = (search.value || '').toLowerCase().trim();
    const c = (cat.value || 'all').toLowerCase();

    rows.forEach(r => {
      const title = r.getAttribute('data-title') || '';
      const rowCat = r.getAttribute('data-cat') || '';
      const matchSearch = !q || title.includes(q);
      const matchCat = c === 'all' || rowCat === c;

      if (matchSearch && matchCat) {
        r.style.display = '';
      } else {
        r.style.display = 'none';
      }
    });
  }

  if (search) search.addEventListener('input', filterTable);
  if (cat) cat.addEventListener('change', filterTable);
});
</script>

</body>
</html>
