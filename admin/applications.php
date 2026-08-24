<?php
require_once __DIR__ . '/../config.php';
require_admin_auth();

$registrations = get_json_data('registrations.json', []);
$msg = '';

// Handle Status Change
if (isset($_GET['action']) && $_GET['action'] === 'status' && isset($_GET['reg']) && isset($_GET['val'])) {
    $targetReg = $_GET['reg'];
    $newStatus = clean_input($_GET['val']);

    foreach ($registrations as &$r) {
        if (($r['reg_no'] ?? '') === $targetReg) {
            $r['status'] = $newStatus;
            break;
        }
    }
    save_json_data('registrations.json', $registrations);
    $msg = 'Registration ' . htmlspecialchars($targetReg) . ' status updated to ' . htmlspecialchars($newStatus) . '.';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Registrations - SSSUTMS Admin</title>
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
    <li><a href="applications.php" class="nav-link active"><i class="fa fa-user-graduate"></i> Student Registrations</a></li>
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
      <h5 class="fw-bold text-dark mb-0">E-Pravesh Student Registrations (2026-27)</h5>
      <small class="text-muted">Review, verify and approve online student admission forms</small>
    </div>
    <span class="badge bg-primary rounded-pill px-3 py-2">Total Applications: <?php echo count($registrations); ?></span>
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
            <th>Reg Number</th>
            <th>Candidate Details</th>
            <th>Program Applied</th>
            <th>Category & State</th>
            <th>Applied Date</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($registrations as $r): ?>
            <tr>
              <td><code><?php echo htmlspecialchars($r['reg_no']); ?></code></td>
              <td>
                <strong class="text-dark"><?php echo htmlspecialchars($r['name']); ?></strong>
                <div class="small text-muted">Father: <?php echo htmlspecialchars($r['father_name']); ?></div>
                <div class="small text-muted"><i class="fa fa-phone me-1"></i> <?php echo htmlspecialchars($r['phone']); ?></div>
              </td>
              <td><span class="badge bg-light text-primary border"><?php echo htmlspecialchars($r['course']); ?></span></td>
              <td>
                <span class="badge bg-secondary-subtle text-dark border"><?php echo htmlspecialchars($r['category'] ?? 'General'); ?></span>
                <div class="small text-muted mt-1"><?php echo htmlspecialchars(($r['district'] ?? '') . ', ' . ($r['state'] ?? '')); ?></div>
              </td>
              <td class="small text-muted"><?php echo htmlspecialchars($r['applied_date'] ?? date('Y-m-d')); ?></td>
              <td>
                <?php 
                $st = $r['status'] ?? 'Submitted';
                $badge = ($st === 'Approved') ? 'bg-success' : (($st === 'Verified') ? 'bg-info' : (($st === 'Pending') ? 'bg-warning text-dark' : 'bg-primary'));
                ?>
                <span class="badge <?php echo $badge; ?>"><?php echo htmlspecialchars($st); ?></span>
              </td>
              <td>
                <div class="dropdown">
                  <button class="btn btn-outline-secondary btn-sm dropdown-toggle rounded-pill" type="button" data-bs-toggle="dropdown">
                    Update Status
                  </button>
                  <ul class="dropdown-menu shadow">
                    <li><a class="dropdown-item small" href="applications.php?action=status&reg=<?php echo $r['reg_no']; ?>&val=Verified">Mark Verified</a></li>
                    <li><a class="dropdown-item small" href="applications.php?action=status&reg=<?php echo $r['reg_no']; ?>&val=Approved">Approve Admission</a></li>
                    <li><a class="dropdown-item small" href="applications.php?action=status&reg=<?php echo $r['reg_no']; ?>&val=Pending">Set Pending</a></li>
                  </ul>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
