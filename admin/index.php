<?php
require_once __DIR__ . '/../config.php';
require_admin_auth();

$notices = get_notices('all');
$events = get_events();
$schemes = get_json_data('schemes.json', []);
$inquiries = get_json_data('inquiries.json', []);
$registrations = get_json_data('registrations.json', []);
$pagesData = get_json_data('pages.json', []);

$pagesCount = 0;
foreach ($pagesData as $cat => $items) {
    if (is_array($items)) $pagesCount += count($items);
}

// Calculate Metrics
$totalInquiries = count($inquiries);
$newInquiries = 0;
foreach ($inquiries as $i) {
    if (strtolower($i['status'] ?? 'new') === 'new') $newInquiries++;
}

$totalRegistrations = count($registrations);
$pendingRegistrations = 0;
foreach ($registrations as $r) {
    $st = strtolower($r['status'] ?? 'submitted');
    if ($st === 'submitted' || $st === 'under review') $pendingRegistrations++;
}

// Handle Quick Notice Add
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
        $msg = 'Quick notice published successfully to public website!';
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
    <li><a href="index.php" class="nav-link active"><i class="fa fa-gauge"></i> Dashboard</a></li>
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
        <h5 class="fw-bold text-dark mb-0">University Administration Overview</h5>
        <small class="text-muted d-none d-md-inline">Academic Session <?php echo htmlspecialchars(get_setting('admission_session', '2026-27')); ?> | Live Dynamic Management Console</small>
      </div>
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
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  <?php endif; ?>

  <!-- KPI Metric Cards Grid -->
  <div class="row g-3 mb-4">
    
    <!-- Total Inquiries -->
    <div class="col-xl-3 col-sm-6">
      <div class="admin-stat-card">
        <div>
          <span class="stat-label">Admission Leads</span>
          <h3 class="stat-value text-dark mb-1"><?php echo $totalInquiries; ?></h3>
          <span class="badge bg-danger-subtle text-danger fw-bold"><i class="fa fa-bell me-1"></i> <?php echo $newInquiries; ?> New</span>
        </div>
        <div class="stat-icon bg-primary-subtle text-primary">
          <i class="fa fa-envelope-open-text"></i>
        </div>
      </div>
    </div>

    <!-- Student Registrations -->
    <div class="col-xl-3 col-sm-6">
      <div class="admin-stat-card">
        <div>
          <span class="stat-label">Student Registrations</span>
          <h3 class="stat-value text-dark mb-1"><?php echo $totalRegistrations; ?></h3>
          <span class="badge bg-warning-subtle text-warning fw-bold"><i class="fa fa-clock me-1"></i> <?php echo $pendingRegistrations; ?> Pending</span>
        </div>
        <div class="stat-icon bg-success-subtle text-success">
          <i class="fa fa-user-graduate"></i>
        </div>
      </div>
    </div>

    <!-- Active Notices -->
    <div class="col-xl-3 col-sm-6">
      <div class="admin-stat-card">
        <div>
          <span class="stat-label">Published Notices</span>
          <h3 class="stat-value text-dark mb-1"><?php echo count($notices); ?></h3>
          <span class="badge bg-info-subtle text-info fw-bold"><i class="fa fa-rss me-1"></i> Live Feeds</span>
        </div>
        <div class="stat-icon bg-warning-subtle text-warning">
          <i class="fa fa-bullhorn"></i>
        </div>
      </div>
    </div>

    <!-- Dynamic Modules -->
    <div class="col-xl-3 col-sm-6">
      <div class="admin-stat-card">
        <div>
          <span class="stat-label">Schemes & Pages</span>
          <h3 class="stat-value text-dark mb-1"><?php echo count($schemes) + $pagesCount; ?></h3>
          <span class="badge bg-secondary-subtle text-secondary fw-bold"><?php echo count($schemes); ?> Schemes &bull; <?php echo $pagesCount; ?> Pages</span>
        </div>
        <div class="stat-icon bg-info-subtle text-info">
          <i class="fa fa-network-wired"></i>
        </div>
      </div>
    </div>

  </div>

  <div class="row g-4">
    
    <!-- Left Column: Recent Inquiries & Applications (8 cols) -->
    <div class="col-lg-8">
      
      <!-- Recent Admission Leads Table -->
      <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <div>
            <h5 class="fw-bold text-dark mb-0">Latest Admission Leads</h5>
            <small class="text-muted">Real-time enquiries from website visitors</small>
          </div>
          <a href="inquiries.php" class="btn btn-sm btn-outline-primary rounded-pill px-3">View All Leads &rarr;</a>
        </div>

        <div class="table-responsive">
          <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
              <tr>
                <th>Candidate</th>
                <th>Course Interest</th>
                <th>Contact</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php if (empty($inquiries)): ?>
                <tr><td colspan="4" class="text-center py-3 text-muted">No admission inquiries logged yet.</td></tr>
              <?php else: ?>
                <?php foreach (array_slice($inquiries, 0, 5) as $inq): 
                  $st = strtolower($inq['status'] ?? 'new');
                  $badge = 'bg-secondary-subtle text-secondary';
                  if ($st === 'new') $badge = 'bg-danger-subtle text-danger fw-bold';
                  elseif ($st === 'contacted') $badge = 'bg-warning-subtle text-dark fw-bold';
                  elseif ($st === 'enrolled') $badge = 'bg-success-subtle text-success fw-bold';
                ?>
                  <tr>
                    <td>
                      <div class="fw-bold text-dark"><?php echo htmlspecialchars($inq['name'] ?? ''); ?></div>
                      <small class="text-muted"><i class="fa fa-location-dot me-1 text-danger"></i> <?php echo htmlspecialchars($inq['city'] ?? 'N/A'); ?></small>
                    </td>
                    <td><span class="badge bg-light text-dark border"><?php echo htmlspecialchars($inq['course'] ?? ''); ?></span></td>
                    <td>
                      <a href="https://wa.me/91<?php echo preg_replace('/[^0-9]/', '', $inq['phone'] ?? ''); ?>" target="_blank" class="text-success text-decoration-none small fw-bold">
                        <i class="fa-brands fa-whatsapp me-1"></i> <?php echo htmlspecialchars($inq['phone'] ?? ''); ?>
                      </a>
                    </td>
                    <td><span class="badge <?php echo $badge; ?> rounded-pill"><?php echo htmlspecialchars($inq['status'] ?? 'New'); ?></span></td>
                  </tr>
                <?php endforeach; ?>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Recent Registrations Table -->
      <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <div>
            <h5 class="fw-bold text-dark mb-0">Recent E-Pravesh Registrations</h5>
            <small class="text-muted">Formal student admission applications</small>
          </div>
          <a href="applications.php" class="btn btn-sm btn-outline-primary rounded-pill px-3">View All Registrations &rarr;</a>
        </div>

        <div class="table-responsive">
          <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
              <tr>
                <th>Reg No</th>
                <th>Candidate Name</th>
                <th>Course</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php if (empty($registrations)): ?>
                <tr><td colspan="4" class="text-center py-3 text-muted">No student applications submitted yet.</td></tr>
              <?php else: ?>
                <?php foreach (array_slice($registrations, 0, 5) as $reg): 
                  $rst = strtolower($reg['status'] ?? 'submitted');
                  $rbadge = 'bg-secondary-subtle text-secondary';
                  if ($rst === 'submitted') $rbadge = 'bg-primary-subtle text-primary fw-bold';
                  elseif ($rst === 'approved' || $rst === 'verified') $rbadge = 'bg-success-subtle text-success fw-bold';
                  elseif ($rst === 'under review') $rbadge = 'bg-warning-subtle text-warning fw-bold';
                ?>
                  <tr>
                    <td><span class="badge bg-dark text-white font-monospace"><?php echo htmlspecialchars($reg['reg_no'] ?? ''); ?></span></td>
                    <td>
                      <div class="fw-bold text-dark"><?php echo htmlspecialchars($reg['name'] ?? ''); ?></div>
                      <small class="text-muted"><?php echo htmlspecialchars($reg['email'] ?? ''); ?></small>
                    </td>
                    <td><span class="badge bg-light text-dark border"><?php echo htmlspecialchars($reg['course'] ?? ''); ?></span></td>
                    <td><span class="badge <?php echo $rbadge; ?> rounded-pill"><?php echo htmlspecialchars($reg['status'] ?? 'Submitted'); ?></span></td>
                  </tr>
                <?php endforeach; ?>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>

    </div>

    <!-- Right Column: Quick Publisher & Status (4 cols) -->
    <div class="col-lg-4">
      
      <!-- Quick Notice Box -->
      <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-4">
        <h5 class="fw-bold text-dark mb-2"><i class="fa fa-paper-plane text-primary me-2"></i> Quick Notice Broadcast</h5>
        <p class="small text-muted mb-3">Publish an urgent circular directly to the public website home page.</p>

        <form method="POST" action="index.php">
          <input type="hidden" name="action" value="quick_notice">
          
          <div class="mb-3">
            <label class="form-label small fw-bold">Notice Title *</label>
            <textarea name="title" rows="2" class="form-control" placeholder="e.g. Schedule of B.Tech Mid Semester Examination..." required></textarea>
          </div>

          <div class="mb-3">
            <label class="form-label small fw-bold">Notice Category</label>
            <select name="category" class="form-select">
              <option value="notices">General Notice</option>
              <option value="exam">Examination Alert</option>
              <option value="admission">Admissions</option>
              <option value="circulars">Official Circular</option>
            </select>
          </div>

          <button type="submit" class="btn btn-primary w-100 fw-bold rounded-pill shadow-sm">
            <i class="fa fa-bullhorn me-1"></i> Broadcast Live Notice
          </button>
        </form>
      </div>

      <!-- Quick Navigation Card -->
      <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
        <h6 class="fw-bold text-dark mb-3"><i class="fa fa-bolt text-warning me-2"></i> Management Modules</h6>
        <div class="list-group list-group-flush small">
          <a href="notices.php" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-0">
            <span><i class="fa fa-bullhorn text-warning me-2"></i> Notices & Circulars</span>
            <span class="badge bg-light text-muted border"><?php echo count($notices); ?></span>
          </a>
          <a href="events.php" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-0">
            <span><i class="fa fa-calendar-days text-success me-2"></i> Campus Events</span>
            <span class="badge bg-light text-muted border"><?php echo count($events); ?></span>
          </a>
          <a href="schemes.php" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-0">
            <span><i class="fa fa-book-open text-primary me-2"></i> Curriculum Schemes</span>
            <span class="badge bg-light text-muted border"><?php echo count($schemes); ?></span>
          </a>
          <a href="pages.php" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-0">
            <span><i class="fa fa-file-lines text-info me-2"></i> Institutional Pages</span>
            <span class="badge bg-light text-muted border"><?php echo $pagesCount; ?></span>
          </a>
          <a href="settings.php" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-0">
            <span><i class="fa fa-sliders text-danger me-2"></i> Portal & Ticker Settings</span>
            <i class="fa fa-chevron-right text-muted"></i>
          </a>
        </div>
      </div>

    </div>

  </div>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/admin.js"></script>
</body>
</html>
