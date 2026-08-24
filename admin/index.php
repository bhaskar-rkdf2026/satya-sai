<?php
require_once __DIR__ . '/../config.php';
require_admin_auth();

$notices = get_notices('all');
$inquiries = get_json_data('inquiries.json', []);
$registrations = get_json_data('registrations.json', []);
$events = get_events();

// Handle quick notice add
$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'quick_notice') {
    $title = clean_input($_POST['title'] ?? '');
    $category = clean_input($_POST['category'] ?? 'notices');
    
    if (!empty($title)) {
        $newNotice = [
            'id' => time(),
            'title' => $title,
            'category' => $category,
            'date' => date('Y-m-d'),
            'file' => 'circular_' . time() . '.pdf',
            'is_new' => true,
            'link' => '#'
        ];
        array_unshift($notices, $newNotice);
        save_json_data('notices.json', $notices);
        $msg = 'Notice published successfully to public website!';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard - SSSUTMS</title>
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
    <img src="../assets/images/logo/logo.jpg" alt="Logo" width="38" height="38" class="rounded-circle border">
    <div>
      <h6 class="text-white fw-bold mb-0">SSSUTMS Admin</h6>
      <small class="text-warning">Management Portal</small>
    </div>
  </div>

  <ul class="admin-nav">
    <li><a href="index.php" class="nav-link active"><i class="fa fa-gauge"></i> Dashboard</a></li>
    <li><a href="notices.php" class="nav-link"><i class="fa fa-bullhorn"></i> Notices & Circulars</a></li>
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

<!-- Main Admin Content Area -->
<main class="admin-main">
  
  <!-- Admin Topbar -->
  <header class="admin-topbar">
    <div>
      <h5 class="fw-bold text-dark mb-0">University Administration Overview</h5>
      <small class="text-muted">Academic Session 2026-27 | Live Management Console</small>
    </div>
    <div class="d-flex align-items-center gap-3">
      <span class="badge bg-success-subtle text-success fw-bold px-3 py-2"><i class="fa fa-circle me-1 small"></i> System Active</span>
      <div class="d-flex align-items-center gap-2">
        <img src="../assets/images/logo/logo.jpg" alt="Admin" width="34" height="34" class="rounded-circle border">
        <span class="small fw-bold text-dark d-none d-sm-inline"><?php echo htmlspecialchars($_SESSION['admin_user'] ?? 'Admin'); ?></span>
      </div>
    </div>
  </header>

  <?php if (!empty($msg)): ?>
    <div class="alert alert-success alert-dismissible fade show rounded-3 border-0 shadow-sm" role="alert">
      <i class="fa fa-circle-check me-2"></i> <?php echo htmlspecialchars($msg); ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif; ?>

  <!-- KPI Metric Cards Grid -->
  <div class="row g-3 mb-4">
    
    <!-- Total Inquiries -->
    <div class="col-xl-3 col-sm-6">
      <div class="admin-stat-card">
        <div>
          <small class="text-muted fw-bold">ADMISSION LEADS</small>
          <h3 class="fw-bold text-primary mb-0 mt-1"><?php echo count($inquiries); ?></h3>
          <small class="text-success fw-bold"><i class="fa fa-arrow-trend-up me-1"></i> Active Enquiries</small>
        </div>
        <div class="stat-icon-box bg-primary-subtle text-primary">
          <i class="fa fa-envelope-open-text"></i>
        </div>
      </div>
    </div>

    <!-- Student Applications -->
    <div class="col-xl-3 col-sm-6">
      <div class="admin-stat-card">
        <div>
          <small class="text-muted fw-bold">ONLINE APPLICATIONS</small>
          <h3 class="fw-bold text-success mb-0 mt-1"><?php echo count($registrations); ?></h3>
          <small class="text-success fw-bold"><i class="fa fa-user-check me-1"></i> E-Pravesh (2026-27)</small>
        </div>
        <div class="stat-icon-box bg-success-subtle text-success">
          <i class="fa fa-graduation-cap"></i>
        </div>
      </div>
    </div>

    <!-- Active Circulars -->
    <div class="col-xl-3 col-sm-6">
      <div class="admin-stat-card">
        <div>
          <small class="text-muted fw-bold">ACTIVE CIRCULARS</small>
          <h3 class="fw-bold text-warning mb-0 mt-1"><?php echo count($notices); ?></h3>
          <small class="text-muted fw-bold">Notices & Time Tables</small>
        </div>
        <div class="stat-icon-box bg-warning-subtle text-warning">
          <i class="fa fa-bullhorn"></i>
        </div>
      </div>
    </div>

    <!-- Campus Events -->
    <div class="col-xl-3 col-sm-6">
      <div class="admin-stat-card">
        <div>
          <small class="text-muted fw-bold">PUBLISHED EVENTS</small>
          <h3 class="fw-bold text-info mb-0 mt-1"><?php echo count($events); ?></h3>
          <small class="text-muted fw-bold">Symposiums & Drives</small>
        </div>
        <div class="stat-icon-box bg-info-subtle text-info">
          <i class="fa fa-calendar-check"></i>
        </div>
      </div>
    </div>

  </div>

  <div class="row g-4 mb-4">
    
    <!-- Left Column: Quick Notice Publisher -->
    <div class="col-lg-5">
      <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
        <h5 class="fw-bold text-primary mb-3"><i class="fa fa-feather-pointed text-warning me-2"></i> Quick Publish Notice</h5>
        
        <form method="POST" action="index.php">
          <input type="hidden" name="action" value="quick_notice">
          <div class="mb-3">
            <label class="form-label small fw-bold">Circular Title *</label>
            <textarea name="title" class="form-control form-control-sm" rows="3" placeholder="e.g. Supplementary Examination BHMS Aug-2026 Notification" required></textarea>
          </div>

          <div class="mb-3">
            <label class="form-label small fw-bold">Category</label>
            <select name="category" class="form-select form-select-sm">
              <option value="notices">Exam Notices</option>
              <option value="timetable">Exam Time Tables</option>
              <option value="admission">Admissions Alert</option>
              <option value="results">Results Announced</option>
            </select>
          </div>

          <button type="submit" class="btn btn-primary w-100 fw-bold rounded-pill" style="background: var(--admin-primary); border:none;">
            <i class="fa fa-paper-plane me-1"></i> Publish Immediately
          </button>
        </form>
      </div>
    </div>

    <!-- Right Column: Recent Admission Inquiries -->
    <div class="col-lg-7">
      <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h5 class="fw-bold text-primary mb-0"><i class="fa fa-clock-rotate-left text-info me-2"></i> Recent Admission Enquiries</h5>
          <a href="inquiries.php" class="btn btn-outline-primary btn-sm rounded-pill px-3">View CRM <i class="fa fa-arrow-right ms-1"></i></a>
        </div>

        <div class="table-responsive">
          <table class="table table-hover align-middle small mb-0">
            <thead class="table-light">
              <tr>
                <th>Lead ID</th>
                <th>Candidate</th>
                <th>Course</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach (array_slice($inquiries, 0, 5) as $inq): ?>
                <tr>
                  <td><code><?php echo htmlspecialchars($inq['id']); ?></code></td>
                  <td>
                    <strong><?php echo htmlspecialchars($inq['name']); ?></strong>
                    <div class="text-muted" style="font-size: 11px;"><?php echo htmlspecialchars($inq['phone']); ?></div>
                  </td>
                  <td><span class="badge bg-light text-dark border"><?php echo htmlspecialchars($inq['course']); ?></span></td>
                  <td>
                    <?php 
                    $st = $inq['status'] ?? 'New';
                    $badgeClass = ($st === 'New') ? 'bg-danger' : (($st === 'Contacted') ? 'bg-warning text-dark' : 'bg-success');
                    ?>
                    <span class="badge <?php echo $badgeClass; ?>"><?php echo htmlspecialchars($st); ?></span>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>

      </div>
    </div>

  </div>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
