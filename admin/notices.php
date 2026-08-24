<?php
require_once __DIR__ . '/../config.php';
require_admin_auth();

$notices = get_json_data('notices.json', []);
$msg = '';

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
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'save_notice') {
    $title = clean_input($_POST['title'] ?? '');
    $category = clean_input($_POST['category'] ?? 'notices');
    $date = clean_input($_POST['date'] ?? date('Y-m-d'));
    $is_new = isset($_POST['is_new']) ? true : false;
    
    if (!empty($title)) {
        $newNotice = [
            'id' => time(),
            'title' => $title,
            'category' => $category,
            'date' => $date,
            'file' => 'circular_' . time() . '.pdf',
            'is_new' => $is_new,
            'link' => '#'
        ];
        array_unshift($notices, $newNotice);
        save_json_data('notices.json', $notices);
        $msg = 'Notice saved & published successfully!';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Notices - SSSUTMS Admin</title>
  <link rel="icon" type="image/jpeg" href="../assets/images/logo/logo.jpg">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>

<aside class="admin-sidebar">
  <div class="sidebar-brand">
    <img src="../assets/images/logo/logo.jpg" alt="Logo" width="38" height="38" class="rounded-circle border">
    <div>
      <h6 class="text-white fw-bold mb-0">SSSUTMS Admin</h6>
      <small class="text-warning">Management Portal</small>
    </div>
  </div>

  <ul class="admin-nav">
    <li><a href="index.php" class="nav-link"><i class="fa fa-gauge"></i> Dashboard</a></li>
    <li><a href="notices.php" class="nav-link active"><i class="fa fa-bullhorn"></i> Notices & Circulars</a></li>
    <li><a href="inquiries.php" class="nav-link"><i class="fa fa-envelope-open-text"></i> Admission Leads</a></li>
    <li><a href="applications.php" class="nav-link"><i class="fa fa-user-graduate"></i> Student Registrations</a></li>
    <li><a href="events.php" class="nav-link"><i class="fa fa-calendar-days"></i> Events & Workshops</a></li>
    <li><a href="settings.php" class="nav-link"><i class="fa fa-sliders"></i> Portal Settings</a></li>
    <li class="mt-4 pt-3 border-top border-white border-opacity-10">
      <a href="../index.php" target="_blank" class="nav-link text-white-50"><i class="fa fa-arrow-up-right-from-square"></i> Visit Public Site</a>
    </li>
    <li><a href="logout.php" class="nav-link text-danger"><i class="fa fa-right-from-bracket"></i> Sign Out</a></li>
  </ul>
</aside>

<main class="admin-main">
  
  <header class="admin-topbar">
    <div>
      <h5 class="fw-bold text-dark mb-0">Notices & Circulars Manager</h5>
      <small class="text-muted">Publish, edit, and organize university circulars and examination notifications</small>
    </div>
    <button class="btn btn-primary btn-sm fw-bold rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#addNoticeModal" style="background: var(--admin-primary); border:none;">
      <i class="fa fa-plus me-1"></i> Add New Circular
    </button>
  </header>

  <?php if (!empty($msg)): ?>
    <div class="alert alert-success alert-dismissible fade show rounded-3 border-0 shadow-sm" role="alert">
      <i class="fa fa-circle-check me-2"></i> <?php echo htmlspecialchars($msg); ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif; ?>

  <div class="admin-table">
    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0">
        <thead>
          <tr>
            <th>Date</th>
            <th>Circular Title</th>
            <th>Category</th>
            <th>Badge</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($notices as $nt): ?>
            <tr>
              <td class="text-muted fw-semibold" style="min-width: 110px;">
                <?php echo date('d-M-Y', strtotime($nt['date'] ?? date('Y-m-d'))); ?>
              </td>
              <td>
                <span class="fw-bold text-dark"><?php echo htmlspecialchars($nt['title']); ?></span>
              </td>
              <td>
                <span class="badge bg-light text-primary border text-capitalize"><?php echo htmlspecialchars($nt['category'] ?? 'notices'); ?></span>
              </td>
              <td>
                <?php if (!empty($nt['is_new'])): ?>
                  <span class="badge bg-danger">NEW</span>
                <?php else: ?>
                  <span class="badge bg-secondary-subtle text-muted">Archived</span>
                <?php endif; ?>
              </td>
              <td>
                <a href="notices.php?action=delete&id=<?php echo $nt['id']; ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure you want to delete this circular?');" title="Delete">
                  <i class="fa fa-trash"></i>
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

</main>

<!-- Add Notice Modal -->
<div class="modal fade" id="addNoticeModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg rounded-4">
      <div class="modal-header text-white" style="background: var(--admin-primary);">
        <h5 class="modal-title fw-bold">Publish New Notice / Time Table</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="notices.php">
        <input type="hidden" name="action" value="save_notice">
        <div class="modal-body p-4">
          <div class="mb-3">
            <label class="form-label small fw-bold">Notice Title *</label>
            <textarea name="title" class="form-control" rows="3" placeholder="Enter circular title..." required></textarea>
          </div>

          <div class="row g-3 mb-3">
            <div class="col-md-6">
              <label class="form-label small fw-bold">Category *</label>
              <select name="category" class="form-select" required>
                <option value="notices">Exam Notices</option>
                <option value="timetable">Exam Time Tables</option>
                <option value="admission">Admissions Notice</option>
                <option value="results">Results Announcement</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label small fw-bold">Publish Date *</label>
              <input type="date" name="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
            </div>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="is_new" id="isNewCheck" checked>
            <label class="form-check-label small fw-bold text-muted" for="isNewCheck">
              Highlight with flashing "NEW" badge on homepage
            </label>
          </div>
        </div>
        <div class="modal-footer bg-light">
          <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary btn-sm fw-bold px-4" style="background: var(--admin-primary); border:none;">Publish Notice</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
