<?php
require_once __DIR__ . '/../config.php';
require_admin_auth();

$registrations = get_json_data('registrations.json', []);
$msg = '';

// Handle CSV Export
if (isset($_GET['action']) && $_GET['action'] === 'export_csv') {
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=sssutms_registrations_' . date('Y-m-d') . '.csv');
    $output = fopen('php://output', 'w');
    fputcsv($output, ['Reg No', 'Candidate Name', 'Father Name', 'Mother Name', 'Course', 'Email', 'Phone', 'Gender', 'DOB', 'Category', 'State', 'District', 'Status', 'Applied Date']);
    foreach ($registrations as $r) {
        fputcsv($output, [
            $r['reg_no'] ?? '',
            $r['name'] ?? '',
            $r['father_name'] ?? '',
            $r['mother_name'] ?? '',
            $r['course'] ?? '',
            $r['email'] ?? '',
            $r['phone'] ?? '',
            $r['gender'] ?? '',
            $r['dob'] ?? '',
            $r['category'] ?? '',
            $r['state'] ?? '',
            $r['district'] ?? '',
            $r['status'] ?? 'Submitted',
            $r['applied_date'] ?? ''
        ]);
    }
    fclose($output);
    exit;
}

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

// Handle Delete
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['reg'])) {
    $delReg = $_GET['reg'];
    $registrations = array_filter($registrations, function($r) use ($delReg) {
        return ($r['reg_no'] ?? '') !== $delReg;
    });
    save_json_data('registrations.json', array_values($registrations));
    $msg = 'Student application record deleted.';
}

// Metrics
$totalApps = count($registrations);
$approvedCount = 0;
$pendingCount = 0;
foreach ($registrations as $r) {
    $s = strtolower($r['status'] ?? 'submitted');
    if ($s === 'approved' || $s === 'verified') $approvedCount++;
    if ($s === 'submitted' || $s === 'under review') $pendingCount++;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Admission Applications - SSSUTMS Admin</title>
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
    <li><a href="admission.php" class="nav-link"><i class="fa fa-user-graduate"></i> Admission Cell (7)</a></li>
    <li><a href="examination.php" class="nav-link"><i class="fa fa-graduation-cap"></i> Examination Cell (5)</a></li>
    <li><a href="research.php" class="nav-link"><i class="fa fa-flask"></i> Research Cell (12)</a></li>
    <li><a href="about.php" class="nav-link"><i class="fa fa-circle-info"></i> About Pages (42)</a></li>
    <li><a href="faculties.php" class="nav-link"><i class="fa fa-chalkboard-user"></i> Faculties & Depts (14)</a></li>
    <li><a href="documents.php" class="nav-link"><i class="fa fa-stamp"></i> Approvals & NAAC Docs</a></li>
    <li><a href="events.php" class="nav-link"><i class="fa fa-calendar-days"></i> Events & Workshops</a></li>
    <li><a href="schemes.php" class="nav-link"><i class="fa fa-book-open"></i> Curriculum Schemes</a></li>
    <li><a href="pages.php" class="nav-link"><i class="fa fa-file-lines"></i> Dynamic CMS Pages</a></li>
    <li><a href="applications.php" class="nav-link active"><i class="fa fa-user-graduate"></i> Student Registrations</a></li>
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
        <h5 class="fw-bold text-dark mb-0">E-Pravesh Online Admission Registrations</h5>
        <small class="text-muted d-none d-md-inline">Real-time candidate submissions from student-registration.php portal</small>
      </div>
    </div>
    <div class="d-flex gap-2">
      <a href="applications.php?action=export_csv" class="btn btn-success fw-bold rounded-pill px-4">
        <i class="fa fa-file-excel me-1"></i> Export to CSV
      </a>
    </div>
  </header>

  <?php if (!empty($msg)): ?>
    <div class="alert alert-success alert-dismissible fade show rounded-3 border-0 shadow-sm" role="alert">
      <i class="fa fa-circle-check me-2"></i> <?php echo htmlspecialchars($msg); ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  <?php endif; ?>

  <!-- Summary Row -->
  <div class="row g-3 mb-4">
    <div class="col-md-4">
      <div class="p-3 bg-white border rounded-3 shadow-sm d-flex align-items-center justify-content-between">
        <div>
          <small class="text-muted fw-bold">TOTAL APPLICATIONS</small>
          <h3 class="fw-bold text-dark mb-0"><?php echo $totalApps; ?></h3>
        </div>
        <div class="p-3 rounded-circle bg-primary-subtle text-primary fs-4"><i class="fa fa-user-graduate"></i></div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="p-3 bg-white border rounded-3 shadow-sm d-flex align-items-center justify-content-between">
        <div>
          <small class="text-muted fw-bold">PENDING / IN REVIEW</small>
          <h3 class="fw-bold text-warning mb-0"><?php echo $pendingCount; ?></h3>
        </div>
        <div class="p-3 rounded-circle bg-warning-subtle text-warning fs-4"><i class="fa fa-hourglass-half"></i></div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="p-3 bg-white border rounded-3 shadow-sm d-flex align-items-center justify-content-between">
        <div>
          <small class="text-muted fw-bold">VERIFIED / APPROVED</small>
          <h3 class="fw-bold text-success mb-0"><?php echo $approvedCount; ?></h3>
        </div>
        <div class="p-3 rounded-circle bg-success-subtle text-success fs-4"><i class="fa fa-circle-check"></i></div>
      </div>
    </div>
  </div>

  <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-4">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
      <h5 class="fw-bold text-dark mb-0">Registered Candidates (<?php echo count($registrations); ?>)</h5>
      <div class="d-flex gap-2">
        <input type="text" id="appSearch" class="form-control form-control-sm" placeholder="Search applicant, reg no, course..." style="width: 270px;">
        <select id="statusFilter" class="form-select form-select-sm" style="width: 170px;">
          <option value="all">All Statuses</option>
          <option value="submitted">Submitted</option>
          <option value="under review">Under Review</option>
          <option value="verified">Verified</option>
          <option value="approved">Approved</option>
          <option value="rejected">Rejected</option>
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
            <th>Reg No</th>
            <th>Candidate Name</th>
            <th>Course Program</th>
            <th>Contact Details</th>
            <th>Location</th>
            <th>Status</th>
            <th class="text-end">Actions</th>
          </tr>
        </thead>
        <tbody id="appsTableBody">
          <?php if (empty($registrations)): ?>
            <tr><td colspan="7" class="text-center py-4 text-muted">No student applications received yet.</td></tr>
          <?php else: ?>
            <?php foreach ($registrations as $r): 
              $st = strtolower($r['status'] ?? 'submitted');
              $badgeClass = 'bg-secondary-subtle text-secondary';
              if ($st === 'submitted') $badgeClass = 'bg-primary-subtle text-primary';
              elseif ($st === 'verified' || $st === 'approved') $badgeClass = 'bg-success-subtle text-success';
              elseif ($st === 'under review') $badgeClass = 'bg-warning-subtle text-warning';
              elseif ($st === 'rejected') $badgeClass = 'bg-danger-subtle text-danger';
            ?>
              <tr class="app-row" data-search="<?php echo strtolower(htmlspecialchars(($r['name'] ?? '') . ' ' . ($r['reg_no'] ?? '') . ' ' . ($r['course'] ?? '') . ' ' . ($r['phone'] ?? ''))); ?>" data-status="<?php echo $st; ?>">
                <td><span class="badge bg-dark text-white font-monospace"><?php echo htmlspecialchars($r['reg_no'] ?? ''); ?></span></td>
                <td>
                  <div class="fw-bold text-dark"><?php echo htmlspecialchars($r['name'] ?? ''); ?></div>
                  <small class="text-muted">Father: <?php echo htmlspecialchars($r['father_name'] ?? 'N/A'); ?></small>
                </td>
                <td>
                  <span class="badge bg-light text-dark border"><?php echo htmlspecialchars($r['course'] ?? ''); ?></span>
                </td>
                <td>
                  <div><i class="fa fa-phone me-1 text-success small"></i> <?php echo htmlspecialchars($r['phone'] ?? ''); ?></div>
                  <small class="text-muted"><i class="fa fa-envelope me-1 text-muted"></i> <?php echo htmlspecialchars($r['email'] ?? ''); ?></small>
                </td>
                <td>
                  <small class="text-muted"><?php echo htmlspecialchars(($r['district'] ?? '') . ', ' . ($r['state'] ?? '')); ?></small>
                </td>
                <td>
                  <div class="dropdown">
                    <button class="btn btn-sm <?php echo $badgeClass; ?> fw-bold rounded-pill dropdown-toggle" type="button" data-bs-toggle="dropdown">
                      <?php echo htmlspecialchars($r['status'] ?? 'Submitted'); ?>
                    </button>
                    <ul class="dropdown-menu shadow border-0">
                      <li><a class="dropdown-menu-item dropdown-item small" href="applications.php?action=status&reg=<?php echo urlencode($r['reg_no'] ?? ''); ?>&val=Submitted">Submitted</a></li>
                      <li><a class="dropdown-menu-item dropdown-item small" href="applications.php?action=status&reg=<?php echo urlencode($r['reg_no'] ?? ''); ?>&val=Under+Review">Under Review</a></li>
                      <li><a class="dropdown-menu-item dropdown-item small" href="applications.php?action=status&reg=<?php echo urlencode($r['reg_no'] ?? ''); ?>&val=Verified">Verified</a></li>
                      <li><a class="dropdown-menu-item dropdown-item small text-success fw-bold" href="applications.php?action=status&reg=<?php echo urlencode($r['reg_no'] ?? ''); ?>&val=Approved">Approved</a></li>
                      <li><a class="dropdown-menu-item dropdown-item small text-danger" href="applications.php?action=status&reg=<?php echo urlencode($r['reg_no'] ?? ''); ?>&val=Rejected">Rejected</a></li>
                    </ul>
                  </div>
                </td>
                <td class="text-end">
                  <button class="btn btn-sm btn-outline-primary rounded-pill px-3 me-1" onclick='viewApp(<?php echo json_encode($r); ?>)'>
                    <i class="fa fa-eye"></i> View
                  </button>
                  <a href="applications.php?action=delete&reg=<?php echo urlencode($r['reg_no'] ?? ''); ?>" 
                     class="btn btn-sm btn-outline-danger rounded-pill px-2"
                     onclick="return confirm('Delete this student application record?');">
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

<!-- Applicant Details Modal -->
<div class="modal fade" id="appModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content border-0 shadow-lg rounded-4">
      <div class="modal-header bg-light border-0">
        <h5 class="modal-title fw-bold text-dark"><i class="fa fa-id-card text-primary me-2"></i> Applicant Dossier: <span id="modalRegNo"></span></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body p-4">
        <div class="row g-3">
          <div class="col-md-6">
            <label class="small text-muted fw-bold">FULL NAME</label>
            <div class="fw-bold fs-6" id="mName"></div>
          </div>
          <div class="col-md-6">
            <label class="small text-muted fw-bold">PROGRAM APPLIED</label>
            <div class="fw-bold text-primary fs-6" id="mCourse"></div>
          </div>
          <div class="col-md-6">
            <label class="small text-muted fw-bold">FATHER'S NAME</label>
            <div id="mFather"></div>
          </div>
          <div class="col-md-6">
            <label class="small text-muted fw-bold">MOTHER'S NAME</label>
            <div id="mMother"></div>
          </div>
          <div class="col-md-6">
            <label class="small text-muted fw-bold">EMAIL ADDRESS</label>
            <div id="mEmail"></div>
          </div>
          <div class="col-md-6">
            <label class="small text-muted fw-bold">CONTACT PHONE</label>
            <div id="mPhone"></div>
          </div>
          <div class="col-md-4">
            <label class="small text-muted fw-bold">GENDER</label>
            <div id="mGender"></div>
          </div>
          <div class="col-md-4">
            <label class="small text-muted fw-bold">DATE OF BIRTH</label>
            <div id="mDob"></div>
          </div>
          <div class="col-md-4">
            <label class="small text-muted fw-bold">CATEGORY</label>
            <div id="mCategory"></div>
          </div>
          <div class="col-md-6">
            <label class="small text-muted fw-bold">STATE</label>
            <div id="mState"></div>
          </div>
          <div class="col-md-6">
            <label class="small text-muted fw-bold">DISTRICT</label>
            <div id="mDistrict"></div>
          </div>
          <div class="col-md-6">
            <label class="small text-muted fw-bold">APPLICATION DATE</label>
            <div id="mDate"></div>
          </div>
          <div class="col-md-6">
            <label class="small text-muted fw-bold">CURRENT STATUS</label>
            <div id="mStatus"></div>
          </div>
        </div>
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
function viewApp(r) {
  document.getElementById('modalRegNo').textContent = r.reg_no || '';
  document.getElementById('mName').textContent = r.name || '';
  document.getElementById('mCourse').textContent = r.course || '';
  document.getElementById('mFather').textContent = r.father_name || 'N/A';
  document.getElementById('mMother').textContent = r.mother_name || 'N/A';
  document.getElementById('mEmail').textContent = r.email || '';
  document.getElementById('mPhone').textContent = r.phone || '';
  document.getElementById('mGender').textContent = r.gender || 'N/A';
  document.getElementById('mDob').textContent = r.dob || 'N/A';
  document.getElementById('mCategory').textContent = r.category || 'General';
  document.getElementById('mState').textContent = r.state || 'N/A';
  document.getElementById('mDistrict').textContent = r.district || 'N/A';
  document.getElementById('mDate').textContent = r.applied_date || '';
  document.getElementById('mStatus').textContent = r.status || 'Submitted';

  const modal = new bootstrap.Modal(document.getElementById('appModal'));
  modal.show();
}

// Instant Filter
document.addEventListener('DOMContentLoaded', function() {
  const search = document.getElementById('appSearch');
  const stat = document.getElementById('statusFilter');
  const rows = document.querySelectorAll('.app-row');

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
