<?php
$page_title = 'Faculty of Engineering & Technology - Outcome Based Curriculum - SSSUTMS';
$banner_title = 'Faculty of Engineering & Technology';
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
  /* Group separator row */
  .group-row td {
    background: #e8edf5 !important;
    color: #0b2545 !important;
    font-weight: 700 !important;
    font-size: 0.82rem !important;
    letter-spacing: 0.5px;
    padding: 8px 14px !important;
    border-color: #c7d2e0 !important;
  }
  .group-row td i {
    color: #0b2545;
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
              <h3 class="fw-bold mb-1" style="color: #0b2545; font-size: 1.5rem;">Faculty of Engineering &amp; Technology</h3>
              <p class="text-muted small mb-0">Department Vision, Mission, Program Outcomes &amp; Course Curricula.</p>
            </div>
            <div class="mt-2 mt-md-0">
              <span class="standard-badge text-dark">
                <i class="fa fa-check-circle text-success me-1"></i> Active Framework
              </span>
            </div>
          </div>

          <!-- Vision & Mission -->
          <div class="row g-3 mb-4">
            <div class="col-md-6">
              <div class="p-3 rounded-2 h-100" style="background:#ffffff;border:1px solid #e2e8f0;border-left:4px solid #0b2545;">
                <div class="d-flex align-items-center gap-2 mb-2">
                  <i class="fa fa-eye text-primary"></i>
                  <h6 class="fw-bold mb-0" style="color:#0b2545;font-size:0.95rem;">Department Vision</h6>
                </div>
                <p class="text-secondary small mb-0 lh-base" style="font-style:italic;">
                  "To emerge as a &quot;Centre for Excellence&quot; offering Technical Education and Research Opportunities of very high standards to students, develop the total personality of the individual, and instill high levels of discipline and strive to set global standards, making our students technologically superior and ethically strong, who in turn shall contribute to the advancement of society and humankind."
                </p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="p-3 rounded-2 h-100" style="background:#ffffff;border:1px solid #e2e8f0;border-left:4px solid #475569;">
                <div class="d-flex align-items-center gap-2 mb-2">
                  <i class="fa fa-bullseye text-secondary"></i>
                  <h6 class="fw-bold mb-0" style="color:#0b2545;font-size:0.95rem;">Department Mission</h6>
                </div>
                <ul class="list-unstyled mb-0 d-flex flex-column gap-2" style="font-size:0.84rem;color:#475569;">
                  <li class="d-flex align-items-start gap-2">
                    <i class="fa fa-angle-right text-muted mt-1" style="font-size:0.75rem;"></i>
                    <span class="lh-sm">We dedicate and commit ourselves to achieve, sustain and foster unmatched excellence in Technical Education.</span>
                  </li>
                  <li class="d-flex align-items-start gap-2">
                    <i class="fa fa-angle-right text-muted mt-1" style="font-size:0.75rem;"></i>
                    <span class="lh-sm">Pursue continuous development of infrastructure and enhance state-of-the art equipment for an inspiring learning environment.</span>
                  </li>
                  <li class="d-flex align-items-start gap-2">
                    <i class="fa fa-angle-right text-muted mt-1" style="font-size:0.75rem;"></i>
                    <span class="lh-sm">Inculcate in students ethical, moral values and social responsibility to lead technical advancements globally.</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <!-- Quick Search Filter Box -->
          <div class="row g-3 mb-3 align-items-center">
            <div class="col-md-6 col-lg-5">
              <div class="input-group">
                <span class="input-group-text bg-white border-end-0" style="border-color:#cbd5e1;"><i class="fa fa-search text-muted"></i></span>
                <input type="text" class="form-control border-start-0 ps-0 obe-filter-input" style="border-color:#cbd5e1;font-size:0.88rem;" placeholder="Search course or curriculum...">
              </div>
            </div>
            <div class="col-md-6 col-lg-7 text-md-end text-muted small">
              <i class="fa fa-file-pdf text-danger me-1"></i> Official PDF documents
            </div>
          </div>

          <!-- Curriculum Matrix Table -->
          <div class="table-responsive rounded-2 border overflow-hidden">
            <table class="table table-hover align-middle mb-0 standard-table obe-table">
              <thead>
                <tr>
                  <th style="width:60px;" class="text-center">S.No.</th>
                  <th>Program / Specialization</th>
                  <th>Curriculum Document (OBE)</th>
                  <th class="text-center" style="width:150px;">Document</th>
                </tr>
              </thead>
              <tbody>

                <!-- ── GROUP 1: B.E. ── -->
                <tr class="group-row">
                  <td colspan="4"><i class="fa fa-graduation-cap me-2"></i>B.E. — Bachelor of Engineering</td>
                </tr>
                <tr>
                  <td class="text-center text-muted fw-semibold">1</td>
                  <td class="fw-semibold text-dark">Aeronautical Engineering</td>
                  <td>
                    <span class="standard-badge me-2">Curriculum</span>
                    <span class="text-secondary small">B.E. Aeronautical Engineering Curriculum</span>
                  </td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Curriculum/BE_AE.pdf" target="_blank" class="btn-standard-doc text-nowrap">
                      <i class="fa fa-file-pdf text-danger"></i> Download PDF
                    </a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center text-muted fw-semibold">2</td>
                  <td class="fw-semibold text-dark">Chemical Engineering</td>
                  <td>
                    <span class="standard-badge me-2">Curriculum</span>
                    <span class="text-secondary small">B.E. Chemical Engineering Curriculum</span>
                  </td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Curriculum/BE_CM.pdf" target="_blank" class="btn-standard-doc text-nowrap">
                      <i class="fa fa-file-pdf text-danger"></i> Download PDF
                    </a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center text-muted fw-semibold">3</td>
                  <td class="fw-semibold text-dark">Civil Engineering</td>
                  <td>
                    <span class="standard-badge me-2">Curriculum</span>
                    <span class="text-secondary small">B.E. Civil Engineering Curriculum</span>
                  </td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Curriculum/BE_CE.pdf" target="_blank" class="btn-standard-doc text-nowrap">
                      <i class="fa fa-file-pdf text-danger"></i> Download PDF
                    </a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center text-muted fw-semibold">4</td>
                  <td class="fw-semibold text-dark">Computer Science &amp; Engineering</td>
                  <td>
                    <span class="standard-badge me-2">Curriculum</span>
                    <span class="text-secondary small">B.E. Computer Science &amp; Engineering Curriculum</span>
                  </td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Curriculum/BE_CSE.pdf" target="_blank" class="btn-standard-doc text-nowrap">
                      <i class="fa fa-file-pdf text-danger"></i> Download PDF
                    </a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center text-muted fw-semibold">5</td>
                  <td class="fw-semibold text-dark">Electrical Engineering</td>
                  <td>
                    <span class="standard-badge me-2">Curriculum</span>
                    <span class="text-secondary small">B.E. Electrical Engineering Curriculum</span>
                  </td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Curriculum/BE_EE.pdf" target="_blank" class="btn-standard-doc text-nowrap">
                      <i class="fa fa-file-pdf text-danger"></i> Download PDF
                    </a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center text-muted fw-semibold">6</td>
                  <td class="fw-semibold text-dark">Electrical &amp; Electronics Engineering</td>
                  <td>
                    <span class="standard-badge me-2">Curriculum</span>
                    <span class="text-secondary small">B.E. Electrical &amp; Electronics Engineering Curriculum</span>
                  </td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Curriculum/BE_EEE.pdf" target="_blank" class="btn-standard-doc text-nowrap">
                      <i class="fa fa-file-pdf text-danger"></i> Download PDF
                    </a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center text-muted fw-semibold">7</td>
                  <td class="fw-semibold text-dark">Electronics &amp; Communication</td>
                  <td>
                    <span class="standard-badge me-2">Curriculum</span>
                    <span class="text-secondary small">B.E. Electronics &amp; Communication Engineering Curriculum</span>
                  </td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Curriculum/BE_EC.pdf" target="_blank" class="btn-standard-doc text-nowrap">
                      <i class="fa fa-file-pdf text-danger"></i> Download PDF
                    </a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center text-muted fw-semibold">8</td>
                  <td class="fw-semibold text-dark">Electronics &amp; Instrumentation</td>
                  <td>
                    <span class="standard-badge me-2">Curriculum</span>
                    <span class="text-secondary small">B.E. Electronics &amp; Instrumentation Engineering Curriculum</span>
                  </td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Curriculum/BE_EI.pdf" target="_blank" class="btn-standard-doc text-nowrap">
                      <i class="fa fa-file-pdf text-danger"></i> Download PDF
                    </a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center text-muted fw-semibold">9</td>
                  <td class="fw-semibold text-dark">Information Technology</td>
                  <td>
                    <span class="standard-badge me-2">Curriculum</span>
                    <span class="text-secondary small">B.E. Information Technology Curriculum</span>
                  </td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Curriculum/BE_IT.pdf" target="_blank" class="btn-standard-doc text-nowrap">
                      <i class="fa fa-file-pdf text-danger"></i> Download PDF
                    </a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center text-muted fw-semibold">10</td>
                  <td class="fw-semibold text-dark">Mechanical Engineering</td>
                  <td>
                    <span class="standard-badge me-2">Curriculum</span>
                    <span class="text-secondary small">B.E. Mechanical Engineering Curriculum</span>
                  </td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Curriculum/BE_ME.pdf" target="_blank" class="btn-standard-doc text-nowrap">
                      <i class="fa fa-file-pdf text-danger"></i> Download PDF
                    </a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center text-muted fw-semibold">11</td>
                  <td class="fw-semibold text-dark">Mining Engineering</td>
                  <td>
                    <span class="standard-badge me-2">Curriculum</span>
                    <span class="text-secondary small">B.E. Mining Engineering Curriculum</span>
                  </td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Curriculum/BE_MI.pdf" target="_blank" class="btn-standard-doc text-nowrap">
                      <i class="fa fa-file-pdf text-danger"></i> Download PDF
                    </a>
                  </td>
                </tr>

                <!-- ── GROUP 2: M.Tech. ── -->
                <tr class="group-row">
                  <td colspan="4"><i class="fa fa-flask me-2"></i>M.Tech. — Master of Technology</td>
                </tr>
                <tr>
                  <td class="text-center text-muted fw-semibold">1</td>
                  <td class="fw-semibold text-dark">Computer Science &amp; Engineering</td>
                  <td>
                    <span class="standard-badge me-2">Curriculum</span>
                    <span class="text-secondary small">M.Tech. CSE Outcome Based Curriculum</span>
                  </td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Curriculum/MTECH_CSE.pdf" target="_blank" class="btn-standard-doc text-nowrap">
                      <i class="fa fa-file-pdf text-danger"></i> Download PDF
                    </a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center text-muted fw-semibold">2</td>
                  <td class="fw-semibold text-dark">Computer Technology &amp; Application</td>
                  <td>
                    <span class="standard-badge me-2">Curriculum</span>
                    <span class="text-secondary small">M.Tech. CTA Outcome Based Curriculum</span>
                  </td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Curriculum/MTECH_CTA.pdf" target="_blank" class="btn-standard-doc text-nowrap">
                      <i class="fa fa-file-pdf text-danger"></i> Download PDF
                    </a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center text-muted fw-semibold">3</td>
                  <td class="fw-semibold text-dark">Digital Communication</td>
                  <td>
                    <span class="standard-badge me-2">Curriculum</span>
                    <span class="text-secondary small">M.Tech. DC Outcome Based Curriculum</span>
                  </td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Curriculum/MTECH_DC.pdf" target="_blank" class="btn-standard-doc text-nowrap">
                      <i class="fa fa-file-pdf text-danger"></i> Download PDF
                    </a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center text-muted fw-semibold">4</td>
                  <td class="fw-semibold text-dark">Electrical Power System</td>
                  <td>
                    <span class="standard-badge me-2">Curriculum</span>
                    <span class="text-secondary small">M.Tech. EPS Outcome Based Curriculum</span>
                  </td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Curriculum/MTECH_EPS.pdf" target="_blank" class="btn-standard-doc text-nowrap">
                      <i class="fa fa-file-pdf text-danger"></i> Download PDF
                    </a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center text-muted fw-semibold">5</td>
                  <td class="fw-semibold text-dark">Industrial Design</td>
                  <td>
                    <span class="standard-badge me-2">Curriculum</span>
                    <span class="text-secondary small">M.Tech. ID Outcome Based Curriculum</span>
                  </td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Curriculum/MTECH_ID.pdf" target="_blank" class="btn-standard-doc text-nowrap">
                      <i class="fa fa-file-pdf text-danger"></i> Download PDF
                    </a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center text-muted fw-semibold">6</td>
                  <td class="fw-semibold text-dark">Information Technology</td>
                  <td>
                    <span class="standard-badge me-2">Curriculum</span>
                    <span class="text-secondary small">M.Tech. IT Outcome Based Curriculum</span>
                  </td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Curriculum/MTECH_ITE .pdf" target="_blank" class="btn-standard-doc text-nowrap">
                      <i class="fa fa-file-pdf text-danger"></i> Download PDF
                    </a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center text-muted fw-semibold">7</td>
                  <td class="fw-semibold text-dark">Power Electronics</td>
                  <td>
                    <span class="standard-badge me-2">Curriculum</span>
                    <span class="text-secondary small">M.Tech. PE Outcome Based Curriculum</span>
                  </td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Curriculum/MTECH_PE.pdf" target="_blank" class="btn-standard-doc text-nowrap">
                      <i class="fa fa-file-pdf text-danger"></i> Download PDF
                    </a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center text-muted fw-semibold">8</td>
                  <td class="fw-semibold text-dark">Software Engineering</td>
                  <td>
                    <span class="standard-badge me-2">Curriculum</span>
                    <span class="text-secondary small">M.Tech. SE Outcome Based Curriculum</span>
                  </td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Curriculum/MTECH_SE.pdf" target="_blank" class="btn-standard-doc text-nowrap">
                      <i class="fa fa-file-pdf text-danger"></i> Download PDF
                    </a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center text-muted fw-semibold">9</td>
                  <td class="fw-semibold text-dark">Structural Design</td>
                  <td>
                    <span class="standard-badge me-2">Curriculum</span>
                    <span class="text-secondary small">M.Tech. SD Outcome Based Curriculum</span>
                  </td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Curriculum/MTECH_SD.pdf" target="_blank" class="btn-standard-doc text-nowrap">
                      <i class="fa fa-file-pdf text-danger"></i> Download PDF
                    </a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center text-muted fw-semibold">10</td>
                  <td class="fw-semibold text-dark">Thermal Engineering</td>
                  <td>
                    <span class="standard-badge me-2">Curriculum</span>
                    <span class="text-secondary small">M.Tech. TE Outcome Based Curriculum</span>
                  </td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Curriculum/MTECH_TE.pdf" target="_blank" class="btn-standard-doc text-nowrap">
                      <i class="fa fa-file-pdf text-danger"></i> Download PDF
                    </a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center text-muted fw-semibold">11</td>
                  <td class="fw-semibold text-dark">VLSI Design</td>
                  <td>
                    <span class="standard-badge me-2">Curriculum</span>
                    <span class="text-secondary small">M.Tech. VLSI Outcome Based Curriculum</span>
                  </td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Curriculum/MTECH_VLSI.pdf" target="_blank" class="btn-standard-doc text-nowrap">
                      <i class="fa fa-file-pdf text-danger"></i> Download PDF
                    </a>
                  </td>
                </tr>

                <!-- ── GROUP 3: Diploma Engineering ── -->
                <tr class="group-row">
                  <td colspan="4"><i class="fa fa-certificate me-2"></i>Diploma Engineering (Polytechnic)</td>
                </tr>
                <tr>
                  <td class="text-center text-muted fw-semibold">1</td>
                  <td class="fw-semibold text-dark">Computer Science &amp; Engineering</td>
                  <td>
                    <span class="standard-badge me-2">Curriculum</span>
                    <span class="text-secondary small">Polytechnic Diploma CSE Curriculum</span>
                  </td>
                  <td class="text-center">
                    <a href="#" class="btn-standard-doc text-nowrap" style="opacity:0.5;cursor:not-allowed;" title="PDF not available">
                      <i class="fa fa-file-pdf text-muted"></i> Not Available
                    </a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center text-muted fw-semibold">2</td>
                  <td class="fw-semibold text-dark">Electrical Engineering</td>
                  <td>
                    <span class="standard-badge me-2">Curriculum</span>
                    <span class="text-secondary small">Polytechnic Diploma EE Curriculum</span>
                  </td>
                  <td class="text-center">
                    <a href="#" class="btn-standard-doc text-nowrap" style="opacity:0.5;cursor:not-allowed;" title="PDF not available">
                      <i class="fa fa-file-pdf text-muted"></i> Not Available
                    </a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center text-muted fw-semibold">3</td>
                  <td class="fw-semibold text-dark">Civil Engineering</td>
                  <td>
                    <span class="standard-badge me-2">Curriculum</span>
                    <span class="text-secondary small">Polytechnic Diploma CE Curriculum</span>
                  </td>
                  <td class="text-center">
                    <a href="#" class="btn-standard-doc text-nowrap" style="opacity:0.5;cursor:not-allowed;" title="PDF not available">
                      <i class="fa fa-file-pdf text-muted"></i> Not Available
                    </a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center text-muted fw-semibold">4</td>
                  <td class="fw-semibold text-dark">Mechanical Engineering</td>
                  <td>
                    <span class="standard-badge me-2">Curriculum</span>
                    <span class="text-secondary small">Polytechnic Diploma ME Curriculum</span>
                  </td>
                  <td class="text-center">
                    <a href="#" class="btn-standard-doc text-nowrap" style="opacity:0.5;cursor:not-allowed;" title="PDF not available">
                      <i class="fa fa-file-pdf text-muted"></i> Not Available
                    </a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center text-muted fw-semibold">5</td>
                  <td class="fw-semibold text-dark">Chemical Engineering</td>
                  <td>
                    <span class="standard-badge me-2">Curriculum</span>
                    <span class="text-secondary small">Polytechnic Diploma Chemical Engineering Curriculum</span>
                  </td>
                  <td class="text-center">
                    <a href="#" class="btn-standard-doc text-nowrap" style="opacity:0.5;cursor:not-allowed;" title="PDF not available">
                      <i class="fa fa-file-pdf text-muted"></i> Not Available
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
      const rows = table.querySelectorAll('tbody tr:not(.group-row)');
      const groups = table.querySelectorAll('tbody tr.group-row');

      rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(query) ? '' : 'none';
      });

      // Hide group headers if all rows in that group are hidden
      groups.forEach(groupRow => {
        let next = groupRow.nextElementSibling;
        let hasVisible = false;
        while (next && !next.classList.contains('group-row')) {
          if (next.style.display !== 'none') hasVisible = true;
          next = next.nextElementSibling;
        }
        groupRow.style.display = hasVisible ? '' : 'none';
      });
    });
  }
});
</script>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>