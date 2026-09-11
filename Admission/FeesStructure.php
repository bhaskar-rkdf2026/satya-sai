<?php
require_once __DIR__ . '/../config.php';

// Load dynamic data from JSON
$admissionData = get_json_data('admission_data.json', []);
$feePageData = $admissionData['FeesStructure'] ?? [];
$fees = $feePageData['fees'] ?? [];

$page_title = ($feePageData['page_title'] ?? 'Fee Structure and Fees Refund Policy') . ' - SSSUTMS';
$banner_title = 'Fees Structure';
$banner_category = 'Admission';

require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?>

<!-- Bootstrap Icons CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

<style>
.adm-card {
  background: #ffffff;
  border-radius: 16px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
  overflow: hidden;
}
.adm-card-header {
  background: linear-gradient(135deg, #0b2545 0%, #1e4d8c 100%);
  padding: 1.5rem 2rem;
  border-top-left-radius: 16px;
  border-top-right-radius: 16px;
  position: relative;
}
.adm-card-header::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.adm-card-header h2,
.adm-card-header h2 i {
  color: #ffffff !important;
  font-size: 1.45rem;
  font-weight: 700;
  letter-spacing: -0.02em;
}
.adm-card-header span,
.adm-card-header small,
.adm-card-header p {
  color: rgba(255, 255, 255, 0.85) !important;
}

/* Refund Policy Banner */
.refund-policy-banner {
  background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
  border: 1px solid #bfdbfe;
  border-left: 4px solid #2563eb;
  border-radius: 12px;
  padding: 14px 18px;
  transition: all 0.25s ease;
}
.refund-policy-banner:hover {
  box-shadow: 0 4px 14px rgba(37, 99, 235, 0.1);
}

/* Search Box */
.search-box-wrap {
  position: relative;
}
.search-box-wrap .form-control {
  border-radius: 50px;
  padding: 12px 20px 12px 46px;
  font-size: 0.92rem;
  border: 1px solid #cbd5e1;
  background: #ffffff;
  box-shadow: 0 2px 8px rgba(0,0,0,0.02);
  transition: all 0.2s ease;
}
.search-box-wrap .form-control:focus {
  border-color: #0b2545;
  box-shadow: 0 4px 16px rgba(11,37,69,0.12);
}
.search-box-wrap .search-icon {
  position: absolute;
  left: 18px;
  top: 50%;
  transform: translateY(-50%);
  color: #64748b;
  font-size: 1rem;
}

/* Table Styling */
.fee-table-container {
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 2px 10px rgba(0,0,0,0.02);
}
.fee-table {
  width: 100%;
  margin-bottom: 0;
  border-collapse: separate;
  border-spacing: 0;
}
.fee-table thead th {
  background: #0b2545 !important;
  color: #ffffff !important;
  font-size: 0.82rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  padding: 14px 12px;
  border: none;
  vertical-align: middle;
}
.fee-table tbody td {
  padding: 12px 14px;
  font-size: 0.88rem;
  vertical-align: middle;
  border-bottom: 1px solid #f1f5f9;
}
.fee-table tbody tr:hover {
  background-color: #f8fafc;
}
.fee-table tbody tr:last-child td {
  border-bottom: none;
}
.fee-badge {
  background: #ecfdf5;
  color: #047857;
  border: 1px solid #a7f3d0;
  font-weight: 800;
  font-size: 0.92rem;
  padding: 5px 12px;
  border-radius: 8px;
  display: inline-block;
  white-space: nowrap;
}
.duration-pill {
  background: #f1f5f9;
  color: #334155;
  border: 1px solid #e2e8f0;
  font-weight: 600;
  font-size: 0.8rem;
  padding: 4px 10px;
  border-radius: 20px;
  display: inline-block;
  white-space: nowrap;
}
.sno-badge {
  font-weight: 700;
  color: #64748b;
}
</style>

<section class="py-5 bg-light">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content (Left Column) -->
      <div class="col-lg-8 col-xl-9">
        <div class="adm-card">
          
          <!-- Card Header Banner -->
          <div class="adm-card-header d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <h2 class="mb-1 d-flex align-items-center">
                <i class="bi bi-journal-text me-2"></i> <?php echo htmlspecialchars($feePageData['page_title'] ?? 'Fee Structure and Fees Refund Policy'); ?>
              </h2>
              <span class="small d-block opacity-90">
                <i class="fa-solid fa-scale-balanced me-1 text-warning"></i> Approved by Madhya Pradesh Niji Vishwavidyalaya Niyamak Aayog, Bhopal
              </span>
            </div>
            <?php if (!empty($feePageData['refund_policy_pdf'])): ?>
              <a href="<?php echo htmlspecialchars($feePageData['refund_policy_pdf']); ?>" target="_blank" rel="noopener" class="btn btn-warning btn-sm rounded-pill fw-bold px-3 shadow-sm">
                <i class="fa-solid fa-file-pdf me-1"></i> Refund Policy
              </a>
            <?php endif; ?>
          </div>

          <!-- Card Body -->
          <div class="card-body p-4 p-md-5">
            <article>

              <!-- Sub-heading -->
              <div class="text-center mb-4 pb-2">
                <span class="badge bg-warning-subtle text-dark fw-bold px-3 py-1.5 rounded-pill mb-2 text-uppercase" style="letter-spacing: 0.5px;">
                  Academic Year 2026–27
                </span>
                <h3 class="fw-bold text-dark mb-1 fs-4">
                  <?php echo htmlspecialchars($feePageData['subtitle'] ?? 'Eligibility Criteria & Fees Structure'); ?>
                </h3>
                <p class="text-muted small mb-0">Course-wise Tuition Fees, Minimum Eligibility Norms &amp; Duration</p>
              </div>

              <!-- Refund Policy Notice Banner -->
              <?php if (!empty($feePageData['refund_policy_pdf'])): ?>
                <div class="refund-policy-banner mb-4 d-flex align-items-center justify-content-between flex-wrap gap-3">
                  <div class="d-flex align-items-center gap-3">
                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="width: 38px; height: 38px; flex-shrink: 0;">
                      <i class="fa-solid fa-circle-info fs-5"></i>
                    </div>
                    <div>
                      <strong class="text-dark d-block">Official University Fees Refund Policy Document</strong>
                      <span class="text-muted extra-small">Norms governing fee refund, withdrawal procedures &amp; timelines</span>
                    </div>
                  </div>
                  <a href="<?php echo htmlspecialchars($feePageData['refund_policy_pdf']); ?>" target="_blank" rel="noopener" class="btn btn-primary btn-sm rounded-pill px-3 fw-bold shadow-sm">
                    <i class="fa-solid fa-file-arrow-down me-1"></i> <?php echo htmlspecialchars($feePageData['refund_policy_label'] ?? 'Download Refund Policy (PDF)'); ?>
                  </a>
                </div>
              <?php endif; ?>

              <!-- Search Bar -->
              <div class="mb-4">
                <div class="search-box-wrap">
                  <i class="fa fa-search search-icon"></i>
                  <input type="text" id="courseSearchInput" class="form-control" placeholder="Search course by name or eligibility (e.g. BE, M.Tech, Pharmacy, MBA, B.Arch, Agriculture)...">
                </div>
              </div>

              <!-- Course Fees Table -->
              <div class="fee-table-container table-responsive">
                <table class="table fee-table align-middle">
                  <thead>
                    <tr>
                      <th class="text-center" style="width: 70px;">S.No.</th>
                      <th style="width: 25%;">Course Name</th>
                      <th class="text-center" style="width: 22%;">Tuition Fees<br><small class="text-white-50 text-lowercase fw-normal">(Per Annum)</small></th>
                      <th>Eligibility Criteria</th>
                      <th class="text-center" style="width: 14%;">Duration</th>
                    </tr>
                  </thead>
                  <tbody id="courseTableBody">
                    <?php if (!empty($fees)): ?>
                      <?php foreach ($fees as $f): ?>
                        <tr class="course-row">
                          <td class="text-center sno-badge"><?php echo $f['sno']; ?>.</td>
                          <td>
                            <strong class="text-dark d-block"><?php echo htmlspecialchars($f['course']); ?></strong>
                          </td>
                          <td class="text-center">
                            <span class="fee-badge">
                              ₹<?php echo htmlspecialchars($f['tuition']); ?>
                            </span>
                          </td>
                          <td>
                            <div class="text-secondary small lh-base">
                              <?php echo htmlspecialchars($f['eligibility']); ?>
                            </div>
                          </td>
                          <td class="text-center">
                            <span class="duration-pill">
                              <?php echo htmlspecialchars($f['duration']); ?>
                            </span>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    <?php else: ?>
                      <tr>
                        <td colspan="5" class="text-center py-5 text-muted">No fee records found.</td>
                      </tr>
                    <?php endif; ?>
                  </tbody>
                </table>
              </div>

              <!-- Statutory Footnote -->
              <div class="mt-4 p-3 bg-light rounded-3 border text-muted small d-flex align-items-start gap-2">
                <i class="fa-solid fa-circle-check text-success fs-6 mt-1 flex-shrink-0"></i>
                <div class="lh-base">
                  <strong>Regulatory Norms:</strong> The fees charged for all the courses are strictly in accordance with the approval accorded by <em>Madhya Pradesh Niji Vishwavidyalaya Niyamak Aayog, Bhopal (Madhya Pradesh)</em>. University enrollment, examination, and development fees apply as per standard statutory provisions.
                </div>
              </div>

            </article>
          </div>
        </div>
      </div>

      <!-- Right Column: Reusable Admission Sidebar -->
      <?php require_once __DIR__ . '/includes/admission_sidebar.php'; ?>

    </div>
  </div>
</section>

<script>
document.getElementById('courseSearchInput')?.addEventListener('input', function() {
  const query = this.value.toLowerCase().trim();
  const rows = document.querySelectorAll('#courseTableBody .course-row');
  let matchCount = 0;
  rows.forEach(row => {
    const text = row.textContent.toLowerCase();
    if (text.includes(query)) {
      row.style.display = '';
      matchCount++;
    } else {
      row.style.display = 'none';
    }
  });
});
</script>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
