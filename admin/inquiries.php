<?php
require_once __DIR__ . '/../config.php';
require_admin_auth();

$inquiries = get_json_data('inquiries.json', []);
$msg = '';

// Handle status change
if (isset($_GET['action']) && $_GET['action'] === 'status' && isset($_GET['id']) && isset($_GET['val'])) {
    $targetId = $_GET['id'];
    $newStatus = clean_input($_GET['val']);
    
    foreach ($inquiries as &$inq) {
        if (($inq['id'] ?? '') === $targetId) {
            $inq['status'] = $newStatus;
            break;
        }
    }
    save_json_data('inquiries.json', $inquiries);
    $msg = 'Lead status updated to ' . htmlspecialchars($newStatus) . '.';
}

// Handle delete
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $delId = $_GET['id'];
    $inquiries = array_filter($inquiries, function($i) use ($delId) {
        return ($i['id'] ?? '') !== $delId;
    });
    save_json_data('inquiries.json', array_values($inquiries));
    $msg = 'Admission inquiry removed.';
}

// Filter by status if selected
$filterStatus = $_GET['status'] ?? 'all';
$filteredInquiries = $inquiries;
if ($filterStatus !== 'all') {
    $filteredInquiries = array_filter($inquiries, function($i) use ($filterStatus) {
        return strtolower($i['status'] ?? '') === strtolower($filterStatus);
    });
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admission Enquiries CRM - SSSUTMS Admin</title>
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
    <li><a href="inquiries.php" class="nav-link active"><i class="fa fa-envelope-open-text"></i> Admission Leads</a></li>
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
      <h5 class="fw-bold text-dark mb-0">Admission Inquiries CRM</h5>
      <small class="text-muted">Track and manage student leads for Academic Session 2026-27</small>
    </div>
    <div class="d-flex gap-2">
      <a href="inquiries.php?status=all" class="btn btn-sm <?php echo $filterStatus === 'all' ? 'btn-primary' : 'btn-outline-secondary'; ?> rounded-pill">All (<?php echo count($inquiries); ?>)</a>
      <a href="inquiries.php?status=New" class="btn btn-sm <?php echo $filterStatus === 'New' ? 'btn-danger' : 'btn-outline-danger'; ?> rounded-pill">New</a>
      <a href="inquiries.php?status=Contacted" class="btn btn-sm <?php echo $filterStatus === 'Contacted' ? 'btn-warning text-dark' : 'btn-outline-warning text-dark'; ?> rounded-pill">Contacted</a>
      <a href="inquiries.php?status=Enrolled" class="btn btn-sm <?php echo $filterStatus === 'Enrolled' ? 'btn-success' : 'btn-outline-success'; ?> rounded-pill">Enrolled</a>
    </div>
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
            <th>Lead ID</th>
            <th>Candidate Name</th>
            <th>Contact Details</th>
            <th>Program Interested</th>
            <th>Location</th>
            <th>Date</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($filteredInquiries)): ?>
            <tr>
              <td colspan="8" class="text-center py-4 text-muted">No admission inquiries found for this filter.</td>
            </tr>
          <?php else: ?>
            <?php foreach ($filteredInquiries as $inq): ?>
              <tr>
                <td><code><?php echo htmlspecialchars($inq['id']); ?></code></td>
                <td>
                  <strong class="text-dark"><?php echo htmlspecialchars($inq['name']); ?></strong>
                  <?php if (!empty($inq['message'])): ?>
                    <div class="small text-muted text-truncate" style="max-width: 200px;" title="<?php echo htmlspecialchars($inq['message']); ?>">
                      "<?php echo htmlspecialchars($inq['message']); ?>"
                    </div>
                  <?php endif; ?>
                </td>
                <td>
                  <div><i class="fa fa-phone text-success me-1 small"></i> <a href="tel:<?php echo htmlspecialchars($inq['phone']); ?>"><?php echo htmlspecialchars($inq['phone']); ?></a></div>
                  <div><i class="fa fa-envelope text-primary me-1 small"></i> <?php echo htmlspecialchars($inq['email']); ?></div>
                </td>
                <td><span class="badge bg-light text-primary border"><?php echo htmlspecialchars($inq['course']); ?></span></td>
                <td><?php echo htmlspecialchars($inq['city'] ?? 'N/A'); ?></td>
                <td class="small text-muted"><?php echo date('d-M-Y', strtotime($inq['created_at'])); ?></td>
                <td>
                  <div class="dropdown">
                    <?php 
                    $st = $inq['status'] ?? 'New';
                    $btnClass = ($st === 'New') ? 'btn-danger' : (($st === 'Contacted') ? 'btn-warning text-dark' : 'btn-success');
                    ?>
                    <button class="btn <?php echo $btnClass; ?> btn-sm dropdown-toggle rounded-pill" type="button" data-bs-toggle="dropdown">
                      <?php echo htmlspecialchars($st); ?>
                    </button>
                    <ul class="dropdown-menu shadow">
                      <li><a class="dropdown-item small" href="inquiries.php?action=status&id=<?php echo $inq['id']; ?>&val=New">Mark New</a></li>
                      <li><a class="dropdown-item small" href="inquiries.php?action=status&id=<?php echo $inq['id']; ?>&val=Contacted">Mark Contacted</a></li>
                      <li><a class="dropdown-item small" href="inquiries.php?action=status&id=<?php echo $inq['id']; ?>&val=Enrolled">Mark Enrolled</a></li>
                    </ul>
                  </div>
                </td>
                <td>
                  <a href="inquiries.php?action=delete&id=<?php echo $inq['id']; ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Delete this inquiry?');" title="Delete">
                    <i class="fa fa-trash"></i>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
