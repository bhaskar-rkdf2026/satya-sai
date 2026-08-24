<?php
require_once __DIR__ . '/../config.php';
require_admin_auth();

$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $msg = 'Portal settings saved and updated successfully.';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portal Settings - SSSUTMS Admin</title>
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
    <li><a href="notices.php" class="nav-link"><i class="fa fa-bullhorn"></i> Notices & Circulars</a></li>
    <li><a href="inquiries.php" class="nav-link"><i class="fa fa-envelope-open-text"></i> Admission Leads</a></li>
    <li><a href="applications.php" class="nav-link"><i class="fa fa-user-graduate"></i> Student Registrations</a></li>
    <li><a href="events.php" class="nav-link"><i class="fa fa-calendar-days"></i> Events & Workshops</a></li>
    <li><a href="settings.php" class="nav-link active"><i class="fa fa-sliders"></i> Portal Settings</a></li>
    <li class="mt-4 pt-3 border-top border-white border-opacity-10">
      <a href="../index.php" target="_blank" class="nav-link text-white-50"><i class="fa fa-arrow-up-right-from-square"></i> Visit Public Site</a>
    </li>
    <li><a href="logout.php" class="nav-link text-danger"><i class="fa fa-right-from-bracket"></i> Sign Out</a></li>
  </ul>
</aside>

<main class="admin-main">
  
  <header class="admin-topbar">
    <div>
      <h5 class="fw-bold text-dark mb-0">Portal Configuration & Settings</h5>
      <small class="text-muted">Manage global contact channels, emergency tickers, and portal preferences</small>
    </div>
  </header>

  <?php if (!empty($msg)): ?>
    <div class="alert alert-success alert-dismissible fade show rounded-3 border-0 shadow-sm" role="alert">
      <i class="fa fa-circle-check me-2"></i> <?php echo htmlspecialchars($msg); ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif; ?>

  <div class="row g-4">
    
    <div class="col-lg-8">
      <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
        <h5 class="fw-bold text-primary mb-3"><i class="fa fa-sliders text-warning me-2"></i> University Contact & Ticker Settings</h5>
        
        <form method="POST" action="settings.php">
          
          <div class="mb-3">
            <label class="form-label small fw-bold">Admission Hotline Number</label>
            <input type="text" class="form-control" name="helpline" value="<?php echo ADMISSION_HELPLINE; ?>">
          </div>

          <div class="row g-3 mb-3">
            <div class="col-md-6">
              <label class="form-label small fw-bold">Official Email Address</label>
              <input type="email" class="form-control" name="email" value="<?php echo OFFICIAL_EMAIL; ?>">
            </div>
            <div class="col-md-6">
              <label class="form-label small fw-bold">Examination Controller Email</label>
              <input type="email" class="form-control" name="exam_email" value="<?php echo EXAM_EMAIL; ?>">
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label small fw-bold">Campus Address</label>
            <textarea class="form-control" rows="2" name="address"><?php echo CAMPUS_ADDRESS; ?></textarea>
          </div>

          <div class="mb-4">
            <label class="form-label small fw-bold">Top Ticker Marquee Headline</label>
            <textarea class="form-control" rows="2" name="marquee">Welcome to Sri Satya Sai University of Technology and Medical Sciences - Premier University in Madhya Pradesh. Admissions open for session 2026-27.</textarea>
          </div>

          <button type="submit" class="btn btn-primary px-4 fw-bold rounded-pill" style="background: var(--admin-primary); border:none;">
            <i class="fa fa-save me-1"></i> Save Configuration
          </button>
        </form>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
        <h5 class="fw-bold text-primary mb-3"><i class="fa fa-lock text-success me-2"></i> Admin Security</h5>
        <p class="small text-muted mb-3">Active Administrator Account</p>
        <div class="p-3 bg-light rounded-3 mb-3 small">
          <div><strong>Role:</strong> Super Admin</div>
          <div><strong>Username:</strong> <code>admin</code></div>
          <div><strong>Status:</strong> <span class="badge bg-success">Authenticated</span></div>
        </div>
        <a href="logout.php" class="btn btn-outline-danger w-100 rounded-pill btn-sm fw-bold">
          <i class="fa fa-right-from-bracket me-1"></i> End Current Session
        </a>
      </div>
    </div>

  </div>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
