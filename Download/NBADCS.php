<?php
$page_title = 'NBA Departmental Compliance (NBA-DCS) - SSSUTMS';
$banner_title = 'NBA-DCS Accreditation Data';
$banner_category = 'Download';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?>

<style>
  /* Standard Minimal Layout Styles */
  .academic-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    transition: box-shadow 0.2s ease, border-color 0.2s ease;
  }
  .academic-card:hover {
    border-color: #cbd5e1;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
  }
  .btn-standard-doc {
    background: #ffffff;
    color: #0b2545;
    border: 1px solid #cbd5e1;
    border-radius: 6px;
    font-size: 0.84rem;
    font-weight: 500;
    padding: 6px 14px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    transition: all 0.2s ease;
    text-decoration: none;
  }
  .btn-standard-doc:hover {
    background: #0b2545;
    color: #ffffff;
    border-color: #0b2545;
  }
  .btn-standard-doc:hover .text-danger {
    color: #ffffff !important;
  }
  .standard-table th {
    background: #0b2545;
    color: #ffffff;
    font-weight: 600;
    font-size: 0.85rem;
    padding: 12px 16px;
    letter-spacing: 0.3px;
    border: none;
  }
  .standard-table td {
    padding: 14px 16px;
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
                <i class="fa fa-award me-1 text-secondary"></i> Accreditation &amp; Quality Assurance
              </span>
              <h3 class="fw-bold mb-1" style="color: #0b2545; font-size: 1.5rem;">National Board of Accreditation (NBA - DCS)</h3>
              <p class="text-muted small mb-0">Departmental Compliance Submissions &amp; Accreditation Data Sheets</p>
            </div>
            <div class="mt-2 mt-md-0">
              <span class="standard-badge text-dark">
                <i class="fa fa-check-circle text-success me-1"></i> Current Submissions
              </span>
            </div>
          </div>

          <!-- Standard Academic Notice Box (Minimalist, quiet) -->
          <div class="p-3 rounded-2 mb-4" style="background: #f8fafc; border: 1px solid #e2e8f0; border-left: 4px solid #0b2545;">
            <div class="d-flex align-items-start gap-3">
              <i class="fa fa-circle-info text-primary mt-1"></i>
              <div>
                <h6 class="fw-bold mb-1" style="color: #0b2545; font-size: 0.92rem;">Outcome-Based Education &amp; NBA Compliance Overview</h6>
                <p class="text-secondary small mb-0" style="line-height: 1.5;">
                  The National Board of Accreditation (NBA) requires participating technical departments to maintain standardized Data Capturing System (DCS) portfolios covering student outcomes, faculty cadres, curriculum processes, laboratories, and research output.
                </p>
              </div>
            </div>
          </div>

          <!-- Section Heading -->
          <h5 class="fw-bold mb-3" style="color: #0b2545; font-size: 1.05rem;">
            Departmental Data Capturing System (DCS) Reports
          </h5>

          <!-- 3 Clean Department Cards (Minimalist, Standard) -->
          <div class="row g-3 mb-4">
            
            <!-- CSE -->
            <div class="col-md-4">
              <div class="academic-card p-3 h-100 d-flex flex-column">
                <div class="d-flex justify-content-between align-items-center mb-2">
                  <span class="standard-badge">B.Tech CSE</span>
                  <i class="fa fa-laptop-code text-muted"></i>
                </div>
                <h6 class="fw-bold mb-2" style="color: #0b2545; font-size: 0.95rem;">Computer Science &amp; Engineering</h6>
                <p class="small text-muted mb-3 flex-grow-1" style="font-size: 0.82rem; line-height: 1.45;">
                  Departmental compliance report covering curriculum, faculty, laboratory infrastructure, and learning outcomes.
                </p>
                <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/DCS_CSE_10012026_0307.pdf" target="_blank" class="btn-standard-doc w-100">
                  <i class="fa fa-file-pdf text-danger"></i> Download DCS (PDF)
                </a>
              </div>
            </div>

            <!-- ECE -->
            <div class="col-md-4">
              <div class="academic-card p-3 h-100 d-flex flex-column">
                <div class="d-flex justify-content-between align-items-center mb-2">
                  <span class="standard-badge">B.Tech ECE</span>
                  <i class="fa fa-microchip text-muted"></i>
                </div>
                <h6 class="fw-bold mb-2" style="color: #0b2545; font-size: 0.95rem;">Electronics &amp; Communication</h6>
                <p class="small text-muted mb-3 flex-grow-1" style="font-size: 0.82rem; line-height: 1.45;">
                  Departmental compliance report covering educational objectives, course outcomes, and student achievements.
                </p>
                <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/DCS_ECE_10012026_0308.pdf" target="_blank" class="btn-standard-doc w-100">
                  <i class="fa fa-file-pdf text-danger"></i> Download DCS (PDF)
                </a>
              </div>
            </div>

            <!-- ME -->
            <div class="col-md-4">
              <div class="academic-card p-3 h-100 d-flex flex-column">
                <div class="d-flex justify-content-between align-items-center mb-2">
                  <span class="standard-badge">B.Tech ME</span>
                  <i class="fa fa-gears text-muted"></i>
                </div>
                <h6 class="fw-bold mb-2" style="color: #0b2545; font-size: 0.95rem;">Mechanical Engineering</h6>
                <p class="small text-muted mb-3 flex-grow-1" style="font-size: 0.82rem; line-height: 1.45;">
                  Departmental compliance report covering technical infrastructure, experimental facilities, and research.
                </p>
                <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/DCS_ME_10012026_0308.pdf" target="_blank" class="btn-standard-doc w-100">
                  <i class="fa fa-file-pdf text-danger"></i> Download DCS (PDF)
                </a>
              </div>
            </div>

          </div>

          <!-- Section Heading -->
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0" style="color: #0b2545; font-size: 1.05rem;">
              Departmental Compliance Records
            </h5>
            <span class="text-muted small">
              <i class="fa fa-file-pdf text-danger me-1"></i> PDF Reports
            </span>
          </div>

          <!-- Standard Academic Table (Clean, quiet, standard) -->
          <div class="table-responsive rounded-2 border overflow-hidden">
            <table class="table table-hover align-middle mb-0 standard-table">
              <thead>
                <tr>
                  <th style="width: 60px;" class="text-center">S.No.</th>
                  <th>Department Name</th>
                  <th style="width: 140px;">Program</th>
                  <th>Compliance Type</th>
                  <th class="text-center" style="width: 150px;">Document</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-center text-muted fw-semibold">1</td>
                  <td class="fw-semibold text-dark">Computer Science and Engineering</td>
                  <td><span class="standard-badge">B.Tech</span></td>
                  <td>NBA Tier-II DCS Portfolio</td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/DCS_CSE_10012026_0307.pdf" target="_blank" class="btn-standard-doc">
                      <i class="fa fa-file-pdf text-danger"></i> View Report
                    </a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center text-muted fw-semibold">2</td>
                  <td class="fw-semibold text-dark">Electronics &amp; Communication Engineering</td>
                  <td><span class="standard-badge">B.Tech</span></td>
                  <td>NBA Tier-II DCS Portfolio</td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/DCS_ECE_10012026_0308.pdf" target="_blank" class="btn-standard-doc">
                      <i class="fa fa-file-pdf text-danger"></i> View Report
                    </a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center text-muted fw-semibold">3</td>
                  <td class="fw-semibold text-dark">Mechanical Engineering (DCS Report - I)</td>
                  <td><span class="standard-badge">B.Tech</span></td>
                  <td>NBA Tier-II DCS Portfolio</td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/DCS_ME_10012026_0308.pdf" target="_blank" class="btn-standard-doc">
                      <i class="fa fa-file-pdf text-danger"></i> View Report
                    </a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center text-muted fw-semibold">4</td>
                  <td class="fw-semibold text-dark">Mechanical Engineering (Institutional DCS Overview)</td>
                  <td><span class="standard-badge">B.Tech</span></td>
                  <td>Institutional Summary DCS</td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/DCS_ME_08012026_0254.pdf" target="_blank" class="btn-standard-doc">
                      <i class="fa fa-file-pdf text-danger"></i> View Report
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
        <?php require_once __DIR__ . '/../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>