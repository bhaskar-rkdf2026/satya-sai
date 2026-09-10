<?php
require_once __DIR__ . '/../config.php';
require_admin_auth();

$inquiries = get_json_data('inquiries.json', []);
$msg = '';

// Handle CSV Export
if (isset($_GET['action']) && $_GET['action'] === 'export_csv') {
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=sssutms_admission_leads_' . date('Y-m-d') . '.csv');
    $output = fopen('php://output', 'w');
    fputcsv($output, ['Inquiry ID', 'Name', 'Phone', 'Email', 'Course', 'City', 'Message', 'Status', 'Submitted Date']);
    foreach ($inquiries as $i) {
        fputcsv($output, [
            $i['id'] ?? '',
            $i['name'] ?? '',
            $i['phone'] ?? '',
            $i['email'] ?? '',
            $i['course'] ?? '',
            $i['city'] ?? '',
            $i['message'] ?? '',
            $i['status'] ?? 'New',
            $i['created_at'] ?? ''
        ]);
    }
    fclose($output);
    exit;
}

// Handle Status Change
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

// Handle Delete
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $delId = $_GET['id'];
    $inquiries = array_filter($inquiries, function($i) use ($delId) {
        return ($i['id'] ?? '') !== $delId;
    });
    save_json_data('inquiries.json', array_values($inquiries));
    $msg = 'Admission inquiry removed.';
}

// Metrics
$totalLeads = count($inquiries);
$newLeads = 0;
$contactedLeads = 0;
$enrolledLeads = 0;
foreach ($inquiries as $i) {
    $st = strtolower($i['status'] ?? 'new');
    if ($st === 'new') $newLeads++;
    elseif ($st === 'contacted') $contactedLeads++;
    elseif ($st === 'enrolled') $enrolledLeads++;
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
    <li><a href="documents.php" class="nav-link"><i class="fa fa-folder-open"></i> Documents & Page PDFs</a></li>
    <li><a href="notices.php" class="nav-link"><i class="fa fa-bullhorn"></i> Notices & Circulars</a></li>
    <li><a href="events.php" class="nav-link"><i class="fa fa-calendar-days"></i> Events & Workshops</a></li>
    <li><a href="schemes.php" class="nav-link"><i class="fa fa-book-open"></i> Curriculum Schemes</a></li>
    <li><a href="pages.php" class="nav-link"><i class="fa fa-file-lines"></i> Dynamic CMS Pages</a></li>
    <li><a href="applications.php" class="nav-link"><i class="fa fa-user-graduate"></i> Student Registrations</a></li>
    <li><a href="inquiries.php" class="nav-link active"><i class="fa fa-envelope-open-text"></i> Admission Leads</a></li>
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
        <h5 class="fw-bold text-dark mb-0">Admission Leads & Prospective Student Inquiries</h5>
        <small class="text-muted d-none d-md-inline">Directly captured from Homepage hero form, enquiry modal, and contact.php</small>
      </div>
    </div>
    <div class="d-flex gap-2">
      <a href="inquiries.php?action=export_csv" class="btn btn-success fw-bold rounded-pill px-4">
        <i class="fa fa-file-excel me-1"></i> Export Leads (CSV)
      </a>
    </div>
  </header>

  <?php if (!empty($msg)): ?>
    <div class="alert alert-success alert-dismissible fade show rounded-3 border-0 shadow-sm" role="alert">
      <i class="fa fa-circle-check me-2"></i> <?php echo htmlspecialchars($msg); ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  <?php endif; ?>

  <!-- Metrics Grid -->
  <div class="row g-3 mb-4">
    <div class="col-md-3">
      <div class="p-3 bg-white border rounded-3 shadow-sm d-flex align-items-center justify-content-between">
        <div>
          <small class="text-muted fw-bold">TOTAL LEADS</small>
          <h3 class="fw-bold text-dark mb-0"><?php echo $totalLeads; ?></h3>
        </div>
        <div class="p-3 rounded-circle bg-primary-subtle text-primary fs-4"><i class="fa fa-users"></i></div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="p-3 bg-white border rounded-3 shadow-sm d-flex align-items-center justify-content-between">
        <div>
          <small class="text-muted fw-bold">NEW INQUIRIES</small>
          <h3 class="fw-bold text-danger mb-0"><?php echo $newLeads; ?></h3>
        </div>
        <div class="p-3 rounded-circle bg-danger-subtle text-danger fs-4"><i class="fa fa-bell"></i></div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="p-3 bg-white border rounded-3 shadow-sm d-flex align-items-center justify-content-between">
        <div>
          <small class="text-muted fw-bold">CONTACTED</small>
          <h3 class="fw-bold text-warning mb-0"><?php echo $contactedLeads; ?></h3>
        </div>
        <div class="p-3 rounded-circle bg-warning-subtle text-warning fs-4"><i class="fa fa-phone-volume"></i></div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="p-3 bg-white border rounded-3 shadow-sm d-flex align-items-center justify-content-between">
        <div>
          <small class="text-muted fw-bold">ENROLLED</small>
          <h3 class="fw-bold text-success mb-0"><?php echo $enrolledLeads; ?></h3>
        </div>
        <div class="p-3 rounded-circle bg-success-subtle text-success fs-4"><i class="fa fa-user-check"></i></div>
      </div>
    </div>
  </div>

  <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-4">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
      <h5 class="fw-bold text-dark mb-0">Captured Inquiries (<?php echo count($inquiries); ?>)</h5>
      <div class="d-flex gap-2">
        <input type="text" id="leadSearch" class="form-control form-control-sm" placeholder="Search name, phone, course..." style="width: 260px;">
        <select id="leadStatusFilter" class="form-select form-select-sm" style="width: 170px;">
          <option value="all">All Statuses</option>
          <option value="new">New</option>
          <option value="contacted">Contacted</option>
          <option value="enrolled">Enrolled</option>
          <option value="closed">Closed</option>
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
            <th>ID</th>
            <th>Candidate Name</th>
            <th>Program of Interest</th>
            <th>Contact Channels</th>
            <th>City</th>
            <th>Status</th>
            <th class="text-end">Actions</th>
          </tr>
        </thead>
        <tbody id="inquiriesTableBody">
          <?php if (empty($inquiries)): ?>
            <tr><td colspan="7" class="text-center py-4 text-muted">No admission inquiries received yet.</td></tr>
          <?php else: ?>
            <?php foreach ($inquiries as $i): 
              $st = strtolower($i['status'] ?? 'new');
              $badgeClass = 'bg-secondary-subtle text-secondary';
              if ($st === 'new') $badgeClass = 'bg-danger-subtle text-danger fw-bold';
              elseif ($st === 'contacted') $badgeClass = 'bg-warning-subtle text-dark fw-bold';
              elseif ($st === 'enrolled') $badgeClass = 'bg-success-subtle text-success fw-bold';
              elseif ($st === 'closed') $badgeClass = 'bg-light text-muted border';
            ?>
              <tr class="inquiry-row" data-search="<?php echo strtolower(htmlspecialchars(($i['name'] ?? '') . ' ' . ($i['phone'] ?? '') . ' ' . ($i['course'] ?? '') . ' ' . ($i['city'] ?? ''))); ?>" data-status="<?php echo $st; ?>">
                <td><span class="badge bg-light text-dark border font-monospace"><?php echo htmlspecialchars($i['id'] ?? ''); ?></span></td>
                <td>
                  <div class="fw-bold text-dark"><?php echo htmlspecialchars($i['name'] ?? ''); ?></div>
                  <small class="text-muted"><i class="fa fa-clock me-1"></i> <?php echo date('d M Y, h:i A', strtotime($i['created_at'] ?? 'now')); ?></small>
                </td>
                <td>
                  <span class="badge bg-primary-subtle text-primary fw-semibold"><?php echo htmlspecialchars($i['course'] ?? ''); ?></span>
                </td>
                <td>
                  <div>
                    <a href="https://wa.me/91<?php echo preg_replace('/[^0-9]/', '', $i['phone'] ?? ''); ?>" target="_blank" class="text-success text-decoration-none fw-bold small">
                      <i class="fa-brands fa-whatsapp me-1"></i> <?php echo htmlspecialchars($i['phone'] ?? ''); ?>
                    </a>
                  </div>
                  <small class="text-muted"><i class="fa fa-envelope me-1 text-muted"></i> <?php echo htmlspecialchars($i['email'] ?? ''); ?></small>
                </td>
                <td>
                  <small class="text-muted"><i class="fa fa-location-dot me-1 text-danger"></i> <?php echo htmlspecialchars($i['city'] ?? 'N/A'); ?></small>
                </td>
                <td>
                  <div class="dropdown">
                    <button class="btn btn-sm <?php echo $badgeClass; ?> rounded-pill dropdown-toggle" type="button" data-bs-toggle="dropdown">
                      <?php echo htmlspecialchars($i['status'] ?? 'New'); ?>
                    </button>
                    <ul class="dropdown-menu shadow border-0">
                      <li><a class="dropdown-menu-item dropdown-item small text-danger fw-bold" href="inquiries.php?action=status&id=<?php echo urlencode($i['id'] ?? ''); ?>&val=New">New</a></li>
                      <li><a class="dropdown-menu-item dropdown-item small text-warning fw-bold" href="inquiries.php?action=status&id=<?php echo urlencode($i['id'] ?? ''); ?>&val=Contacted">Contacted</a></li>
                      <li><a class="dropdown-menu-item dropdown-item small text-success fw-bold" href="inquiries.php?action=status&id=<?php echo urlencode($i['id'] ?? ''); ?>&val=Enrolled">Enrolled</a></li>
                      <li><a class="dropdown-menu-item dropdown-item small text-muted" href="inquiries.php?action=status&id=<?php echo urlencode($i['id'] ?? ''); ?>&val=Closed">Closed</a></li>
                    </ul>
                  </div>
                </td>
                <td class="text-end">
                  <button class="btn btn-sm btn-outline-primary rounded-pill px-3 me-1" onclick='viewInq(<?php echo json_encode($i); ?>)'>
                    <i class="fa fa-envelope-open"></i> View
                  </button>
                  <a href="inquiries.php?action=delete&id=<?php echo urlencode($i['id'] ?? ''); ?>" 
                     class="btn btn-sm btn-outline-danger rounded-pill px-2"
                     onclick="return confirm('Delete this inquiry?');">
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

<!-- Inquiry Detail Modal -->
<div class="modal fade" id="inqModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg rounded-4">
      <div class="modal-header bg-light border-0">
        <h5 class="modal-title fw-bold text-dark"><i class="fa fa-envelope text-primary me-2"></i> Lead Details: <span id="mLeadId"></span></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body p-4">
        <div class="mb-3">
          <label class="small text-muted fw-bold">STUDENT NAME</label>
          <div class="fw-bold fs-6" id="mLeadName"></div>
        </div>
        <div class="mb-3">
          <label class="small text-muted fw-bold">COURSE OF INTEREST</label>
          <div class="fw-bold text-primary" id="mLeadCourse"></div>
        </div>
        <div class="row g-2 mb-3">
          <div class="col-6">
            <label class="small text-muted fw-bold">MOBILE PHONE</label>
            <div id="mLeadPhone"></div>
          </div>
          <div class="col-6">
            <label class="small text-muted fw-bold">CITY</label>
            <div id="mLeadCity"></div>
          </div>
        </div>
        <div class="mb-3">
          <label class="small text-muted fw-bold">EMAIL ADDRESS</label>
          <div id="mLeadEmail"></div>
        </div>
        <div class="mb-3">
          <label class="small text-muted fw-bold">STUDENT'S MESSAGE / QUERY</label>
          <div class="p-3 bg-light rounded-3 border" id="mLeadMsg" style="white-space: pre-wrap; font-size: 14px;"></div>
        </div>
        <div class="small text-muted">Received on: <span id="mLeadDate"></span></div>
      </div>
      <div class="modal-footer border-0">
        <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/admin.js"></script>
<script>
function viewInq(i) {
  document.getElementById('mLeadId').textContent = i.id || '';
  document.getElementById('mLeadName').textContent = i.name || '';
  document.getElementById('mLeadCourse').textContent = i.course || '';
  document.getElementById('mLeadPhone').textContent = i.phone || '';
  document.getElementById('mLeadCity').textContent = i.city || 'N/A';
  document.getElementById('mLeadEmail').textContent = i.email || '';
  document.getElementById('mLeadMsg').textContent = i.message || 'No additional message provided.';
  document.getElementById('mLeadDate').textContent = i.created_at || '';

  const modal = new bootstrap.Modal(document.getElementById('inqModal'));
  modal.show();
}

// Instant Filter
document.addEventListener('DOMContentLoaded', function() {
  const search = document.getElementById('leadSearch');
  const stat = document.getElementById('leadStatusFilter');
  const rows = document.querySelectorAll('.inquiry-row');

  function filterTable() {
    const q = (search.value || '').toLowerCase().trim();
    const s = (stat.value || 'all').toLowerCase();

    rows.forEach(r => {
      const searchData = r.getAttribute('data-search') || '';
      const rowStat = r.getAttribute('data-status') || '';
      const matchSearch = !q || searchData.includes(q);
      const matchStat = s === 'all' || rowStat === s;

      if (matchSearch && matchStat) {
        r.style.display = '';
      } else {
        r.style.display = 'none';
      }
    });
  }

  if (search) search.addEventListener('input', filterTable);
  if (stat) stat.addEventListener('change', filterTable);
});
</script>

</body>
</html>
