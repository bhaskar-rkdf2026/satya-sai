<?php
$page_title = 'Notification Of Phd Award - SSSUTMS';
$banner_title = 'Notification Of Ph.D. Award & Research';
$banner_category = 'Download';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?>

<style>
.syl-card {
  background: #ffffff;
  border-radius: 16px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
  border: 1px solid #e2e8f0;
  overflow: hidden;
  margin-bottom: 2rem;
}
.syl-card-header {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 1.25rem 1.75rem;
  position: relative;
}
.syl-card-header::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.syl-card-title {
  font-size: 1.3rem;
  font-weight: 700;
  margin: 0;
  display: flex;
  align-items: center;
  gap: 12px;
  color: #ffffff;
}
.syl-card-body {
  padding: 1.75rem;
}
.syl-table {
  width: 100%;
  margin-bottom: 0;
  vertical-align: middle;
  border-collapse: separate;
  border-spacing: 0;
}
.syl-table th {
  background: #f1f5f9;
  color: #0f172a;
  font-weight: 700;
  font-size: 0.88rem;
  text-transform: uppercase;
  letter-spacing: 0.05em;
  padding: 14px 18px;
  border-top: none;
  border-bottom: 2px solid #cbd5e1;
}
.syl-table td {
  padding: 14px 18px;
  border-bottom: 1px solid #e2e8f0;
  color: #334155;
  font-size: 0.95rem;
  vertical-align: middle;
}
.syl-table tbody tr:hover {
  background-color: #f8fafc;
}
.syl-btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  background: #0b2545;
  color: #ffffff !important;
  font-weight: 700;
  font-size: 0.85rem;
  padding: 8px 18px;
  border-radius: 8px;
  text-decoration: none !important;
  transition: all 0.25s ease;
  box-shadow: 0 2px 6px rgba(11, 37, 69, 0.2);
  border: 1px solid #0b2545;
  white-space: nowrap;
}
.syl-btn:hover {
  background: #d97706;
  border-color: #d97706;
  color: #ffffff !important;
  transform: translateY(-2px);
  box-shadow: 0 6px 14px rgba(217, 119, 6, 0.35);
}
.department-heading {
  background: #f8fafc;
  border-left: 4px solid #0b2545;
  padding: 10px 16px;
  margin-top: 2rem;
  margin-bottom: 1rem;
  font-size: 1.05rem;
  font-weight: 700;
  color: #0b2545;
  display: flex;
  align-items: center;
  gap: 10px;
  border-radius: 0 8px 8px 0;
}
</style>

<section class="subpage-main-section py-4 bg-light">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="syl-card">
          <div class="syl-card-header">
            <h2 class="syl-card-title">
              <i class="fa fa-graduation-cap text-warning"></i>
              Notification Of Ph.D. Award &amp; Research Downloads
            </h2>
          </div>
          
          <div class="syl-card-body">
            
            <!-- Live Search Filter -->
            <div class="row g-3 align-items-center mb-4 p-3 bg-white rounded-3 border shadow-sm">
              <div class="col-md-7">
                <div class="input-group">
                  <span class="input-group-text bg-light border-end-0"><i class="fa fa-search text-muted"></i></span>
                  <input type="text" id="tableSearchInput" class="form-control border-start-0" placeholder="Search notification by keyword, title..." onkeyup="filterTable()">
                  <button class="btn btn-outline-secondary" type="button" onclick="clearSearch()" title="Clear search"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="col-md-5 text-md-end text-muted small">
                <span id="resultsCount">Showing all notifications</span>
              </div>
            </div>

            <!-- Ph.D. Award & Research Notifications -->
            <div class="department-heading mt-0">
              <i class="fa fa-scroll"></i> Ph.D. Award, Course Work &amp; Research Notifications
            </div>
            
            <div class="table-responsive rounded-3 border mb-4">
              <table class="syl-table" id="phdTable">
                <thead>
                  <tr>
                    <th style="width: 70px;" class="text-center">S.No.</th>
                    <th>Document / Notification Title</th>
                    <th style="width: 140px;" class="text-center">Category</th>
                    <th style="width: 180px;" class="text-center">Download Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-center fw-bold text-secondary">01</td>
                    <td class="fw-bold text-dark">Ph.D. Admission &amp; Award Notification</td>
                    <td class="text-center"><span class="badge bg-primary px-2 py-1">Notification</span></td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>assets/images/Files/Widget/Download/PHD_NOTIFICATION.pdf" target="_blank" rel="noopener" class="syl-btn">
                        <i class="fa fa-file-pdf"></i> Download PDF
                      </a>
                    </td>
                  </tr>

                  <tr>
                    <td class="text-center fw-bold text-secondary">02</td>
                    <td class="fw-bold text-dark">Notification Ph.D. Course Work Examination (December Batch)</td>
                    <td class="text-center"><span class="badge bg-info text-dark px-2 py-1">Course Work</span></td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamNotifications/notification cw phd Dec.pdf" target="_blank" rel="noopener" class="syl-btn">
                        <i class="fa fa-file-pdf"></i> Download PDF
                      </a>
                    </td>
                  </tr>

                  <tr>
                    <td class="text-center fw-bold text-secondary">03</td>
                    <td class="fw-bold text-dark">Notification Ph.D. Course Work Examination (June Batch)</td>
                    <td class="text-center"><span class="badge bg-info text-dark px-2 py-1">Course Work</span></td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamNotifications/notification cw phd June.pdf" target="_blank" rel="noopener" class="syl-btn">
                        <i class="fa fa-file-pdf"></i> Download PDF
                      </a>
                    </td>
                  </tr>

                  <tr>
                    <td class="text-center fw-bold text-secondary">04</td>
                    <td class="fw-bold text-dark">Ph.D. Ordinance &amp; University Research Regulations</td>
                    <td class="text-center"><span class="badge bg-success px-2 py-1">Ordinance</span></td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>assets/pdf/phd/pHD_ORDINA_29092025_1128.pdf" target="_blank" rel="noopener" class="syl-btn">
                        <i class="fa fa-file-pdf"></i> Download PDF
                      </a>
                    </td>
                  </tr>

                  <tr>
                    <td class="text-center fw-bold text-secondary">05</td>
                    <td class="fw-bold text-dark">Ph.D. Thesis Submission Format &amp; Layout Template</td>
                    <td class="text-center"><span class="badge bg-warning text-dark px-2 py-1">Guidelines</span></td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>assets/pdf/phd/PHDTHFORMAT_RR_16072026_0355.pdf" target="_blank" rel="noopener" class="syl-btn">
                        <i class="fa fa-file-pdf"></i> Download PDF
                      </a>
                    </td>
                  </tr>

                  <tr>
                    <td class="text-center fw-bold text-secondary">06</td>
                    <td class="fw-bold text-dark">Ph.D. Research Guide &amp; Thesis Preparation Manual</td>
                    <td class="text-center"><span class="badge bg-warning text-dark px-2 py-1">Guidelines</span></td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>assets/pdf/phd/PHDTHGUIDE_RRev_16072026_0356.pdf" target="_blank" rel="noopener" class="syl-btn">
                        <i class="fa fa-file-pdf"></i> Download PDF
                      </a>
                    </td>
                  </tr>

                  <tr>
                    <td class="text-center fw-bold text-secondary">07</td>
                    <td class="fw-bold text-dark">Ph.D. Pre-Submission Evaluation Form</td>
                    <td class="text-center"><span class="badge bg-secondary px-2 py-1">Form</span></td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>assets/pdf/phd/Phd_Pre_submission_Form_2.pdf" target="_blank" rel="noopener" class="syl-btn">
                        <i class="fa fa-file-pdf"></i> Download PDF
                      </a>
                    </td>
                  </tr>

                  <tr>
                    <td class="text-center fw-bold text-secondary">08</td>
                    <td class="fw-bold text-dark">Ph.D. Final Thesis Submission Form</td>
                    <td class="text-center"><span class="badge bg-secondary px-2 py-1">Form</span></td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>assets/pdf/phd/Phd_Final_submission_Form_2.pdf" target="_blank" rel="noopener" class="syl-btn">
                        <i class="fa fa-file-pdf"></i> Download PDF
                      </a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div id="noResultsMessage" class="alert alert-warning text-center d-none my-4">
              <i class="fa fa-search me-2"></i> No matching notifications found. Please try a different search term.
            </div>

          </div>
        </div>
      </div>

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<script>
function filterTable() {
  const query = document.getElementById('tableSearchInput').value.toLowerCase().trim();
  const rows = document.querySelectorAll('#phdTable tbody tr');
  let visibleCount = 0;

  rows.forEach(row => {
    const text = row.innerText.toLowerCase();
    if (text.includes(query)) {
      row.style.display = '';
      visibleCount++;
    } else {
      row.style.display = 'none';
    }
  });

  const counter = document.getElementById('resultsCount');
  const noResults = document.getElementById('noResultsMessage');

  if (query === '') {
    counter.textContent = 'Showing all notifications';
    if (noResults) noResults.classList.add('d-none');
  } else {
    counter.textContent = `Showing ${visibleCount} result${visibleCount === 1 ? '' : 's'}`;
    if (noResults) {
      if (visibleCount === 0) {
        noResults.classList.remove('d-none');
      } else {
        noResults.classList.add('d-none');
      }
    }
  }
}

function clearSearch() {
  const input = document.getElementById('tableSearchInput');
  if (input) {
    input.value = '';
    filterTable();
    input.focus();
  }
}
</script>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>