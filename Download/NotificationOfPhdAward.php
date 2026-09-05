<?php
$page_title = 'Notification of Ph.D. Award - SSSUTMS';
$banner_title = 'Notification Of Ph.D. Award';
$banner_category = 'Download';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?>

<section class="subpage-main-section py-4 style="background-color: #f8fafc;"">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="content-card shadow-sm border-0 rounded-4 bg-white p-4 mb-4">
          
          <!-- Card Header -->
          <div class="d-flex flex-wrap justify-content-between align-items-center pb-3 mb-4 border-bottom">
            <div>
              <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-2 rounded-pill fw-semibold mb-2">
                <i class="fa fa-graduation-cap me-1"></i> Doctoral Research Wing
              </span>
              <h3 class="fw-bold text-navy mb-1" style="color: #0b2545;">Official Ph.D. Award Notifications &amp; Circulars</h3>
              <p class="text-muted small mb-0">Sri Satya Sai University of Technology &amp; Medical Sciences, Sehore (M.P.)</p>
            </div>
            <div class="mt-2 mt-md-0">
              <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded-pill">
                <i class="fa fa-shield-check me-1"></i> UGC Regulation Compliant
              </span>
            </div>
          </div>

          <!-- University Statutory Undertaking -->
          <div class="card border-0 rounded-3 mb-4 p-3" style="background: linear-gradient(135deg, #f0f7ff 0%, #e6f0fa 100%); border-left: 5px solid #0b2545 !important;">
            <div class="d-flex align-items-start">
              <div class="me-3 text-primary mt-1"><i class="fa fa-stamp fa-2x"></i></div>
              <div>
                <h5 class="fw-bold text-navy mb-1" style="color: #0b2545;">Statutory Declaration &amp; UGC Compliance</h5>
                <p class="small text-secondary mb-0">
                  The University strictly complies with the <strong>UGC (Minimum Standards and Procedures for Award of Ph.D. Degree) Regulations</strong>. 
                  All Ph.D. awards, coursework examinations, evaluation of theses, and viva-voce examinations are conducted in accordance with approved statutory ordinances and UGC guidelines.
                </p>
              </div>
            </div>
          </div>

          <!-- Quick Search Filter -->
          <div class="row g-3 mb-4 align-items-center">
            <div class="col-md-6 col-lg-5">
              <div class="input-group">
                <span class="input-group-text border-end-0 rounded-start-pill ps-3" style="background: #ffffff; border-color: #cbd5e1;"><i class="fa fa-search" style="color: #0b2545;"></i></span><input type="text" id="phdSearchInput" class="form-control border-start-0 rounded-end-pill" style="border-color: #cbd5e1; font-size: 0.9rem;" placeholder="Filter notification by title or session...">
              </div>
            </div>
            <div class="col-md-6 col-lg-7 text-md-end text-muted small">
              <i class="fa fa-circle-info text-primary me-1"></i> Official gazetted notifications issued by the Office of Registrar
            </div>
          </div>

          <!-- Ph.D. Notifications Table -->
          <div class="table-responsive rounded-3 border mb-4">
            <table class="table table-hover align-middle mb-0" id="phdTable">
              <thead style="background: linear-gradient(135deg, #0b2545 0%, #134074 100%); color: #fff;">
                <tr>
                  <th style="width: 70px;" class="text-center">S.No.</th>
                  <th>Notification Title &amp; Scope</th>
                  <th>Faculty / Subject</th>
                  <th>Date / Session</th>
                  <th class="text-center" style="width: 170px;">Official Document</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-center fw-bold text-muted">1</td>
                  <td>
                    <div class="fw-bold text-dark">Notification of Ph.D. Award &amp; Course Work Examination (December Session)</div>
                    <small class="text-muted">Official notification regarding successful defense, viva-voce, and coursework results</small>
                  </td>
                  <td><span class="badge bg-primary-subtle text-primary border">All Research Faculties</span></td>
                  <td><span class="text-secondary small fw-medium"><i class="fa fa-calendar-days me-1"></i> Dec Session</span></td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Widget/Download/notification_cw_phd_Dec.pdf" target="_blank" class="btn btn-sm text-white rounded-pill px-3 py-1 text-nowrap" style="background: linear-gradient(135deg, #f3752c 0%, #e0580a 100%); font-weight: 600; font-size: 0.82rem; box-shadow: 0 2px 6px rgba(243, 117, 44, 0.28); border: none;">
                      <i class="fa fa-file-pdf me-1"></i> View Order
                    </a>
                  </td>
                </tr>

                <tr>
                  <td class="text-center fw-bold text-muted">2</td>
                  <td>
                    <div class="fw-bold text-dark">Notification of Ph.D. Award &amp; Course Work Examination (June Session)</div>
                    <small class="text-muted">Gazette notification for award of Degree of Doctor of Philosophy and Course Work</small>
                  </td>
                  <td><span class="badge bg-primary-subtle text-primary border">All Research Faculties</span></td>
                  <td><span class="text-secondary small fw-medium"><i class="fa fa-calendar-days me-1"></i> June Session</span></td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Widget/Download/notification_cw_phd_June.pdf" target="_blank" class="btn btn-sm text-white rounded-pill px-3 py-1 text-nowrap" style="background: linear-gradient(135deg, #f3752c 0%, #e0580a 100%); font-weight: 600; font-size: 0.82rem; box-shadow: 0 2px 6px rgba(243, 117, 44, 0.28); border: none;">
                      <i class="fa fa-file-pdf me-1"></i> View Order
                    </a>
                  </td>
                </tr>

                <tr>
                  <td class="text-center fw-bold text-muted">3</td>
                  <td>
                    <div class="fw-bold text-dark">Consolidated Statutory Ph.D. Award Notification Gazette</div>
                    <small class="text-muted">Comprehensive notification of scholars awarded Ph.D. Degree upon approval of Executive Council</small>
                  </td>
                  <td><span class="badge bg-info-subtle text-dark border">Multidisciplinary</span></td>
                  <td><span class="text-secondary small fw-medium"><i class="fa fa-calendar-days me-1"></i> Annual Gazette</span></td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Widget/Download/PHD_NOTIFICATION.pdf" target="_blank" class="btn btn-sm text-white rounded-pill px-3 py-1 text-nowrap" style="background: linear-gradient(135deg, #f3752c 0%, #e0580a 100%); font-weight: 600; font-size: 0.82rem; box-shadow: 0 2px 6px rgba(243, 117, 44, 0.28); border: none;">
                      <i class="fa fa-file-pdf me-1"></i> View Order
                    </a>
                  </td>
                </tr>

                <tr>
                  <td class="text-center fw-bold text-muted">4</td>
                  <td>
                    <div class="fw-bold text-dark">Ph.D. Ordinance &amp; UGC Minimum Standards Guidelines</div>
                    <small class="text-muted">Official University Ordinance governing Doctoral admissions, RAC, DRC, evaluation, and award</small>
                  </td>
                  <td><span class="badge bg-warning-subtle text-dark border">Statutory Ordinance</span></td>
                  <td><span class="text-secondary small fw-medium"><i class="fa fa-calendar-days me-1"></i> UGC 2022</span></td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/pHD_ORDINA_29092025_1128.pdf" target="_blank" class="btn btn-sm text-white rounded-pill px-3 py-1 text-nowrap" style="background: linear-gradient(135deg, #f3752c 0%, #e0580a 100%); font-weight: 600; font-size: 0.82rem; box-shadow: 0 2px 6px rgba(243, 117, 44, 0.28); border: none;">
                      <i class="fa fa-file-pdf me-1"></i> Download PDF
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <!-- Research & Ethics Advisory Cell Info -->
          <div class="row g-3">
            <div class="col-md-6">
              <div class="card h-100 border rounded-3 p-3 style="background-color: #f8fafc;"">
                <h6 class="fw-bold text-dark mb-2"><i class="fa fa-scale-balanced text-primary me-2"></i>Research Advisory Committee (RAC)</h6>
                <p class="small text-secondary mb-0">
                  Every research scholar is assigned a Research Advisory Committee (RAC) to monitor scholar progress, review six-monthly reports, and guide dissertation preparation in adherence with UGC standards.
                </p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card h-100 border rounded-3 p-3 style="background-color: #f8fafc;"">
                <h6 class="fw-bold text-dark mb-2"><i class="fa fa-book-open-reader text-success me-2"></i>Plagiarism &amp; Research Ethics</h6>
                <p class="small text-secondary mb-0">
                  All submitted theses undergo mandatory anti-plagiarism verification using authorized software. Similarity indices must be strictly within limits prescribed by the University Academic Council.
                </p>
              </div>
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
document.addEventListener('DOMContentLoaded', function() {
  const searchInput = document.getElementById('phdSearchInput');
  const table = document.getElementById('phdTable');
  if (searchInput && table) {
    searchInput.addEventListener('keyup', function() {
      const query = this.value.toLowerCase().trim();
      const rows = table.querySelectorAll('tbody tr');
      rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(query) ? '' : 'none';
      });
    });
  }
});
</script>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>