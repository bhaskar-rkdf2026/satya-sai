<?php
$page_title = 'Faculty of Basic & Applied Sciences - Outcome Based Curriculum - SSSUTMS';
$banner_title = 'Faculty of Basic & Applied Sciences';
$banner_category = 'Outcome Based Curriculum';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
  .academic-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    transition: border-color 0.2s ease, box-shadow 0.2s ease;
  }
  .btn-standard-doc {
    background: #ffffff;
    color: #0b2545;
    border: 1px solid #cbd5e1;
    border-radius: 6px;
    font-size: 0.84rem;
    font-weight: 500;
    padding: 5px 12px;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: all 0.2s ease;
    text-decoration: none;
  }
  .btn-standard-doc:hover {
    background: #0b2545;
    color: #ffffff;
    border-color: #0b2545;
  }
  .btn-standard-doc:hover i {
    color: #ffffff !important;
  }
  .standard-table th {
    background: #0b2545;
    color: #ffffff;
    font-weight: 600;
    font-size: 0.85rem;
    padding: 12px 14px;
    letter-spacing: 0.3px;
    border: none;
  }
  .standard-table td {
    padding: 12px 14px;
    vertical-align: middle;
    border-color: #f1f5f9;
    color: #334155;
    font-size: 0.9rem;
  }
  .standard-badge {
    background: #f1f5f9;
    color: #475569;
    border: 1px solid #e2e8f0;
    font-weight: 500;
    font-size: 0.78rem;
    padding: 3px 8px;
    border-radius: 4px;
  }
</style>

<section class="subpage-main-section py-4" style="background-color: #f8fafc;">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="academic-card bg-white p-4 mb-4">
          
          <!-- Standard Document Header -->
          <div class="d-flex flex-wrap justify-content-between align-items-center pb-3 mb-4 border-bottom" style="border-color: #e2e8f0 !important;">
            <div>
              <span class="standard-badge mb-2 d-inline-block">
                <i class="fa fa-graduation-cap me-1 text-secondary"></i> Outcome Based Education (OBE)
              </span>
              <h3 class="fw-bold mb-1" style="color: #0b2545; font-size: 1.5rem;">Faculty of Basic & Applied Sciences</h3>
              <p class="text-muted small mb-0">Department Vision, Mission, Program Outcomes &amp; Course Curricula.</p>
            </div>
            <div class="mt-2 mt-md-0">
              <span class="standard-badge text-dark">
                <i class="fa fa-check-circle text-success me-1"></i> Active Framework
              </span>
            </div>
          </div>

          <!-- Vision & Mission Showcase (Standard Academic Layout) -->
          <div class="row g-3 mb-4">
            
            <!-- Department Vision -->
            <div class="col-md-6">
              <div class="p-3 rounded-2 h-100" style="background: #ffffff; border: 1px solid #e2e8f0; border-left: 4px solid #0b2545;">
                <div class="d-flex align-items-center gap-2 mb-2">
                  <i class="fa fa-eye text-primary"></i>
                  <h6 class="fw-bold mb-0" style="color: #0b2545; font-size: 0.95rem;">Department Vision</h6>
                </div>
                <p class="text-secondary small mb-0 lh-base" style="font-style: italic;">
                  "The Science envisions itself as a dynamic community of science and mathematics faculty and students engaged in innovative research and learning with global impact, recognizing our special role as a leader in this binational community."
                </p>
              </div>
            </div>

            <!-- Department Mission -->
            <div class="col-md-6">
              <div class="p-3 rounded-2 h-100" style="background: #ffffff; border: 1px solid #e2e8f0; border-left: 4px solid #475569;">
                <div class="d-flex align-items-center gap-2 mb-2">
                  <i class="fa fa-bullseye text-secondary"></i>
                  <h6 class="fw-bold mb-0" style="color: #0b2545; font-size: 0.95rem;">Department Mission</h6>
                </div>
                <ul class="list-unstyled mb-0 d-flex flex-column gap-2" style="font-size: 0.84rem; color: #475569;">
                  <li class="d-flex align-items-start gap-2">
                    <i class="fa fa-angle-right text-muted mt-1" style="font-size: 0.75rem;"></i>
                    <span class="lh-sm">1. To recruit, inspire, and develop a new generation of scientists and mathematicians, dedicated to the highest principles of Science, and educated in the environmental, health and economic challenges.</span>
                  </li>
                  <li class="d-flex align-items-start gap-2">
                    <i class="fa fa-angle-right text-muted mt-1" style="font-size: 0.75rem;"></i>
                    <span class="lh-sm">2. To lead by example, promoting effective and self-sustaining research programs, encouraging student participation, and providing a national forum for addressing special challenges.</span>
                  </li>
                  <li class="d-flex align-items-start gap-2">
                    <i class="fa fa-angle-right text-muted mt-1" style="font-size: 0.75rem;"></i>
                    <span class="lh-sm">3. To work to educate all university students and the community at large, increasing the level of awareness of scientific issues, and providing a knowledge resource to citizens and government alike.</span>
                  </li>
                </ul>
              </div>
            </div>

          </div>

          <!-- Quick Search Filter Box -->
          <div class="row g-3 mb-3 align-items-center">
            <div class="col-md-6 col-lg-5">
              <div class="input-group">
                <span class="input-group-text bg-white border-end-0" style="border-color: #cbd5e1;"><i class="fa fa-search text-muted"></i></span>
                <input type="text" class="form-control border-start-0 ps-0 obe-filter-input" style="border-color: #cbd5e1; font-size: 0.88rem;" placeholder="Search course or curriculum...">
              </div>
            </div>
            <div class="col-md-6 col-lg-7 text-md-end text-muted small">
              <i class="fa fa-file-pdf text-danger me-1"></i> Official PDF documents
            </div>
          </div>

          <!-- Curriculum Matrix Table (Standard Academic Style) -->
          <div class="table-responsive rounded-2 border overflow-hidden">
            <table class="table table-hover align-middle mb-0 standard-table obe-table">
              <thead>
                <tr>
                  <th style="width: 60px;" class="text-center">S.No.</th>
                  <th>Program / Specialization</th>
                  <th>Curriculum Document (OBE)</th>
                  <th class="text-center" style="width: 150px;">Document</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-center text-muted fw-semibold">1</td>
                  <td class="fw-semibold text-dark">B.Sc. (Mathematics)</td>
                  <td>
                    <span class="standard-badge me-2">Curriculum</span>
                    <span class="text-secondary small">B.Sc. Mathematics Outcome Based Curriculum</span>
                  </td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Curriculum/BSc_Mat.pdf" target="_blank" class="btn-standard-doc text-nowrap">
                      <i class="fa fa-file-pdf text-danger"></i> Download PDF
                    </a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center text-muted fw-semibold">2</td>
                  <td class="fw-semibold text-dark">B.Sc. (Computer Science)</td>
                  <td>
                    <span class="standard-badge me-2">Curriculum</span>
                    <span class="text-secondary small">B.Sc. Computer Science Outcome Based Curriculum</span>
                  </td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Curriculum/BSc_CS.pdf" target="_blank" class="btn-standard-doc text-nowrap">
                      <i class="fa fa-file-pdf text-danger"></i> Download PDF
                    </a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center text-muted fw-semibold">3</td>
                  <td class="fw-semibold text-dark">M.Sc. (Chemistry)</td>
                  <td>
                    <span class="standard-badge me-2">Curriculum</span>
                    <span class="text-secondary small">M.Sc. Chemistry Outcome Based Curriculum</span>
                  </td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Curriculum/MSc_Che.pdf" target="_blank" class="btn-standard-doc text-nowrap">
                      <i class="fa fa-file-pdf text-danger"></i> Download PDF
                    </a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center text-muted fw-semibold">4</td>
                  <td class="fw-semibold text-dark">M.Sc. (Computer Science)</td>
                  <td>
                    <span class="standard-badge me-2">Curriculum</span>
                    <span class="text-secondary small">M.Sc. Computer Science Outcome Based Curriculum</span>
                  </td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Curriculum/MSc_CS.pdf" target="_blank" class="btn-standard-doc text-nowrap">
                      <i class="fa fa-file-pdf text-danger"></i> Download PDF
                    </a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center text-muted fw-semibold">5</td>
                  <td class="fw-semibold text-dark">M.Sc. (Mathematics)</td>
                  <td>
                    <span class="standard-badge me-2">Curriculum</span>
                    <span class="text-secondary small">M.Sc. Mathematics Outcome Based Curriculum</span>
                  </td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Curriculum/MSc_Math.pdf" target="_blank" class="btn-standard-doc text-nowrap">
                      <i class="fa fa-file-pdf text-danger"></i> Download PDF
                    </a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center text-muted fw-semibold">6</td>
                  <td class="fw-semibold text-dark">M.Sc. (Physics)</td>
                  <td>
                    <span class="standard-badge me-2">Curriculum</span>
                    <span class="text-secondary small">M.Sc. Physics Outcome Based Curriculum</span>
                  </td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Curriculum/MSc_Phy.pdf" target="_blank" class="btn-standard-doc text-nowrap">
                      <i class="fa fa-file-pdf text-danger"></i> Download PDF
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

        </div>
      </div>

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const searchInput = document.querySelector('.obe-filter-input');
  const table = document.querySelector('.obe-table');
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

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>