<?php
$page_title = 'Integrated Teacher Education Programme (ITEP) - SSSUTMS';
$banner_title = 'Integrated Teacher Education Programme (ITEP)';
$banner_category = 'I T E P';

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
  margin-top: 1.75rem;
  margin-bottom: 1rem;
  font-size: 1.05rem;
  font-weight: 700;
  color: #0b2545;
  display: flex;
  align-items: center;
  gap: 10px;
  border-radius: 0 8px 8px 0;
}
.department-heading:first-of-type {
  margin-top: 0;
}
.itep-feature-box {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 1.5rem;
  height: 100%;
}
.itep-feature-icon {
  width: 44px;
  height: 44px;
  border-radius: 10px;
  background: rgba(11, 37, 69, 0.08);
  color: #0b2545;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.25rem;
  margin-bottom: 12px;
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
  padding: 12px 16px;
  border-top: none;
  border-bottom: 2px solid #cbd5e1;
}
.syl-table td {
  padding: 12px 16px;
  border-bottom: 1px solid #e2e8f0;
  color: #334155;
  font-size: 0.95rem;
  vertical-align: middle;
}
.syl-table tbody tr:hover {
  background-color: #f8fafc;
}
</style>

<section class="subpage-main-section py-4 bg-light">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="syl-card">
          <div class="syl-card-header d-flex flex-wrap align-items-center justify-content-between gap-3">
            <h2 class="syl-card-title">
              <i class="fa fa-graduation-cap text-warning"></i>
              Integrated Teacher Education Programme (ITEP)
            </h2>
            <a href="<?php echo BASE_URL; ?>assets/pdf/BABED_ITEP_STAFF_LIST_2026_final_19052026_0207.pdf" target="_blank" rel="noopener" class="syl-btn">
              <i class="fa fa-file-pdf"></i> ITEP Staff List PDF
            </a>
          </div>
          
          <div class="syl-card-body">
            
            <!-- Overview Banner -->
            <p class="text-secondary lead fs-6 mb-4">
              The <strong>Integrated Teacher Education Programme (ITEP)</strong> is a flagship 4-year dual-major holistic undergraduate teacher education degree recognized by the <strong>National Council for Teacher Education (NCTE)</strong> in accordance with the mandate of the <strong>National Education Policy (NEP) 2020</strong>.
            </p>

            <!-- ITEP Highlights -->
            <div class="row g-4 mb-4">
              <div class="col-md-4">
                <div class="itep-feature-box">
                  <div class="itep-feature-icon"><i class="fa fa-certificate"></i></div>
                  <h6 class="fw-bold text-dark mb-1">NCTE Recognized</h6>
                  <p class="text-secondary small mb-0">Fully accredited dual-major degree qualifying graduates directly for school teaching positions.</p>
                </div>
              </div>

              <div class="col-md-4">
                <div class="itep-feature-box">
                  <div class="itep-feature-icon"><i class="fa fa-calendar-check"></i></div>
                  <h6 class="fw-bold text-dark mb-1">4-Year Integrated Track</h6>
                  <p class="text-secondary small mb-0">Saves one complete academic year compared to conventional B.A./B.Sc. followed by B.Ed.</p>
                </div>
              </div>

              <div class="col-md-4">
                <div class="itep-feature-box">
                  <div class="itep-feature-icon"><i class="fa fa-chalkboard-user"></i></div>
                  <h6 class="fw-bold text-dark mb-1">Pedagogical Training</h6>
                  <p class="text-secondary small mb-0">Extensive school-based internships, micro-teaching, and multidisciplinary subject mastery.</p>
                </div>
              </div>
            </div>

            <!-- Program Offerings Table -->
            <div class="department-heading">
              <i class="fa fa-book-open-reader"></i> ITEP Programmes Offered at SSSUTMS
            </div>

            <div class="table-responsive rounded-3 border mb-4">
              <table class="syl-table">
                <thead>
                  <tr>
                    <th style="width: 70px;" class="text-center">S.No.</th>
                    <th>Programme Name</th>
                    <th>Duration</th>
                    <th>Specialization / Stage</th>
                    <th style="width: 180px;" class="text-center">Curriculum Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-center fw-bold text-secondary">01</td>
                    <td><div class="fw-bold text-dark">4-Year B.A. B.Ed. Integrated</div></td>
                    <td><span class="badge bg-primary">4 Years (8 Semesters)</span></td>
                    <td>Secondary Stage (Humanities &amp; Social Sciences)</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>Download/Syllabus/Education.php" class="syl-btn">
                        <i class="fa fa-file-lines"></i> View Syllabus
                      </a>
                    </td>
                  </tr>

                  <tr>
                    <td class="text-center fw-bold text-secondary">02</td>
                    <td><div class="fw-bold text-dark">4-Year B.Sc. B.Ed. Integrated</div></td>
                    <td><span class="badge bg-primary">4 Years (8 Semesters)</span></td>
                    <td>Secondary Stage (Science &amp; Mathematics)</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>Download/Syllabus/Education.php" class="syl-btn">
                        <i class="fa fa-file-lines"></i> View Syllabus
                      </a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>

            <!-- Faculty & Resources -->
            <div class="department-heading">
              <i class="fa fa-people-roof"></i> ITEP Academic Staff &amp; Faculty Information
            </div>

            <div class="p-4 bg-light rounded-3 border mb-4 d-flex flex-wrap align-items-center justify-content-between gap-3">
              <div>
                <h6 class="fw-bold text-dark mb-1">Official B.A. B.Ed. / ITEP Faculty &amp; Staff List</h6>
                <p class="text-secondary small mb-0">Certified list of approved teaching faculty and academic staff members under NCTE regulations.</p>
              </div>
              <a href="<?php echo BASE_URL; ?>assets/pdf/BABED_ITEP_STAFF_LIST_2026_final_19052026_0207.pdf" target="_blank" rel="noopener" class="syl-btn">
                <i class="fa fa-file-pdf"></i> Download Staff List PDF
              </a>
            </div>

            <!-- Quick Links to Faculty of Education -->
            <div class="p-3 bg-white rounded-3 border d-flex flex-wrap align-items-center justify-content-between gap-3">
              <div class="d-flex align-items-center gap-3">
                <i class="fa fa-building-columns fa-2x text-primary"></i>
                <div>
                  <h6 class="fw-bold text-dark mb-0">School of Education &amp; Physical Education</h6>
                  <p class="text-muted small mb-0">Explore complete B.Ed., M.Ed., B.P.Ed. and ITEP academic resources.</p>
                </div>
              </div>
              <a href="<?php echo BASE_URL; ?>Download/OutcomeBasedCurriculum/Education.php" class="syl-btn">
                <i class="fa fa-arrow-right"></i> Education Portal
              </a>
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

<?php require_once __DIR__ . '/../includes/footer.php'; ?>