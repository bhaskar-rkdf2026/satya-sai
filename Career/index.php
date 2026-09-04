<?php
$page_title = 'Career & Recruitment - SSSUTMS';
$banner_title = 'Career Opportunities';
$banner_category = 'Career';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?>

<style>
  .career-main-card {
    background: #ffffff;
    border-radius: 16px;
    border: 1px solid #e2e8f0;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(11, 37, 69, 0.06);
    transition: all 0.3s ease;
  }
  .career-card-header {
    background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
    padding: 22px 28px;
    position: relative;
  }
  .career-gold-line {
    height: 3px;
    background: linear-gradient(90deg, #f3752c 0%, #f6a935 50%, #f3752c 100%);
    width: 100%;
  }
  .career-notice-item {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 14px;
    overflow: hidden;
    margin-bottom: 28px;
    box-shadow: 0 3px 12px rgba(11, 37, 69, 0.04);
    transition: all 0.25s ease;
  }
  .career-notice-item:hover {
    border-color: #cbd5e1;
    box-shadow: 0 6px 20px rgba(11, 37, 69, 0.08);
  }
  .career-notice-header {
    padding: 14px 20px;
    background: #f8fafc;
    border-bottom: 1px solid #e2e8f0;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
    gap: 10px;
  }
  .career-notice-body {
    padding: 20px;
    text-align: center;
    background: #fafbfd;
  }
  .career-img-wrapper {
    display: inline-block;
    max-width: 860px;
    width: 100%;
    margin: 0 auto;
    border-radius: 10px;
    overflow: hidden;
    border: 1px solid #e2e8f0;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
    background: #ffffff;
  }
  .career-img {
    width: 100%;
    height: auto;
    display: block;
    object-fit: contain;
    transition: transform 0.3s ease;
  }
  .career-pdf-banner {
    background: linear-gradient(135deg, #f8fafc 0%, #edf2f7 100%);
    border: 1px solid #e2e8f0;
    border-left: 5px solid #f3752c;
    border-radius: 12px;
    padding: 18px 22px;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    margin-bottom: 28px;
    box-shadow: 0 2px 10px rgba(11, 37, 69, 0.04);
  }
  .btn-career-download {
    background: linear-gradient(135deg, #f3752c 0%, #e0580a 100%);
    color: #ffffff !important;
    font-weight: 600;
    font-size: 0.88rem;
    border-radius: 50px;
    padding: 8px 22px;
    border: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    box-shadow: 0 3px 10px rgba(243, 117, 44, 0.28);
    transition: all 0.2s ease;
    text-decoration: none;
    white-space: nowrap;
  }
  .btn-career-download:hover {
    background: linear-gradient(135deg, #e0580a 0%, #c94700 100%);
    transform: translateY(-2px);
    box-shadow: 0 5px 14px rgba(243, 117, 44, 0.38);
    color: #ffffff !important;
  }
  .policy-box {
    background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
    border: 1px solid #bfdbfe;
    border-left: 5px solid #2563eb;
    border-radius: 12px;
    padding: 16px 20px;
    margin-bottom: 28px;
  }
  .info-bar-box {
    background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
    color: #ffffff;
    border-radius: 12px;
    padding: 18px 24px;
    margin-bottom: 28px;
  }
</style>

<section class="subpage-main-section py-4" style="background-color: #f8fafc;">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="career-main-card mb-4">
          
          <!-- Card Header with Portal Theme -->
          <div class="career-card-header text-white">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
              <div class="d-flex align-items-center gap-3">
                <div class="bg-white bg-opacity-10 p-2 rounded-circle d-flex align-items-center justify-content-center" style="width: 46px; height: 46px;">
                  <i class="fa fa-briefcase text-warning fs-5"></i>
                </div>
                <div>
                  <h4 class="fw-bold mb-0 text-white">Career Opportunities</h4>
                  <p class="small text-white-50 mb-0">Sri Satya Sai University of Technology and Medical Sciences</p>
                </div>
              </div>
              <div>
                <span class="badge rounded-pill px-3 py-2 fw-semibold" style="background: rgba(243, 117, 44, 0.25); border: 1px solid rgba(243, 117, 44, 0.45); color: #ffd5b8;">
                  <i class="fa fa-bullhorn me-1"></i> Current Recruitments
                </span>
              </div>
            </div>
          </div>
          <div class="career-gold-line"></div>

          <!-- Card Body -->
          <div class="p-4">

            <!-- Information Banner -->
            <div class="info-bar-box shadow-sm">
              <div class="row align-items-center">
                <div class="col-md-8">
                  <h5 class="fw-bold text-white mb-1"><i class="fa fa-graduation-cap text-warning me-2"></i>Join Our Academic Community</h5>
                  <p class="small text-white-50 mb-md-0">
                    We invite dynamic, qualified, and motivated professionals for teaching and non-teaching roles. Review the official advertisements below for qualifications and application guidelines.
                  </p>
                </div>
                <div class="col-md-4 text-md-end">
                  <a href="mailto:info@sssutms.co.in" class="btn btn-sm btn-light rounded-pill px-3 py-2 fw-semibold shadow-sm text-dark">
                    <i class="fa fa-envelope text-primary me-1"></i> Submit Resume
                  </a>
                </div>
              </div>
            </div>

            <!-- Item 1: Latest Recruitment Advertisement -->
            <div class="career-notice-item">
              <div class="career-notice-header">
                <div class="d-flex align-items-center gap-2">
                  <span class="badge bg-danger text-white rounded-pill px-3 py-1">Latest Notice</span>
                  <h6 class="fw-bold mb-0 text-dark">Recruitment Advertisement - Faculty &amp; Staff</h6>
                </div>
                <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/last_updated_27052026_1224.png" target="_blank" class="btn btn-sm btn-outline-secondary rounded-pill px-3 py-1">
                  <i class="fa fa-up-right-from-square me-1"></i> View Full Image
                </a>
              </div>
              <div class="career-notice-body">
                <div class="career-img-wrapper">
                  <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/last_updated_27052026_1224.png" alt="Recruitment Advertisement - SSSUTMS" class="career-img img-fluid">
                </div>
              </div>
            </div>

            <!-- Item 2: School of Pharmacy Recruitment -->
            <div class="career-notice-item" id="pharmacy">
              <div class="career-notice-header">
                <div class="d-flex align-items-center gap-2">
                  <span class="badge bg-primary text-white rounded-pill px-3 py-1">Pharmacy</span>
                  <h6 class="fw-bold mb-0 text-dark">Recruitment Advertisement - School of Pharmacy</h6>
                </div>
                <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/SCHOOL_OF_PHARMACY_23052026_0320.jpeg" target="_blank" class="btn btn-sm btn-outline-secondary rounded-pill px-3 py-1">
                  <i class="fa fa-up-right-from-square me-1"></i> View Full Image
                </a>
              </div>
              <div class="career-notice-body">
                <div class="career-img-wrapper">
                  <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/SCHOOL_OF_PHARMACY_23052026_0320.jpeg" alt="School of Pharmacy Recruitment - SSSUTMS" class="career-img img-fluid">
                </div>
              </div>
            </div>

            <!-- Item 3: Urgent Requirement Advertisement -->
            <div class="career-notice-item">
              <div class="career-notice-header">
                <div class="d-flex align-items-center gap-2">
                  <span class="badge bg-warning text-dark rounded-pill px-3 py-1">Urgent Opening</span>
                  <h6 class="fw-bold mb-0 text-dark">Urgent Faculty &amp; Staff Recruitment</h6>
                </div>
                <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/WhatsApp_Image_2026-04-09_at_12.57.59_PM_09042026_0117.jpg" target="_blank" class="btn btn-sm btn-outline-secondary rounded-pill px-3 py-1">
                  <i class="fa fa-up-right-from-square me-1"></i> View Full Image
                </a>
              </div>
              <div class="career-notice-body">
                <div class="career-img-wrapper">
                  <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/WhatsApp_Image_2026-04-09_at_12.57.59_PM_09042026_0117.jpg" alt="Urgent Faculty Requirement - SSSUTMS" class="career-img img-fluid">
                </div>
              </div>
            </div>

            <!-- Item 4: Teaching & Non-Teaching Openings -->
            <div class="career-notice-item">
              <div class="career-notice-header">
                <div class="d-flex align-items-center gap-2">
                  <span class="badge bg-info text-white rounded-pill px-3 py-1">Faculty &amp; Staff</span>
                  <h6 class="fw-bold mb-0 text-dark">Teaching &amp; Non-Teaching Opportunities</h6>
                </div>
                <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/WhatsApp_Image_2025-01-08_at_15.49.36_b62c16f5_08012025_0350.jpg" target="_blank" class="btn btn-sm btn-outline-secondary rounded-pill px-3 py-1">
                  <i class="fa fa-up-right-from-square me-1"></i> View Full Image
                </a>
              </div>
              <div class="career-notice-body">
                <div class="career-img-wrapper">
                  <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/WhatsApp_Image_2025-01-08_at_15.49.36_b62c16f5_08012025_0350.jpg" alt="Teaching & Non-Teaching Vacancies - SSSUTMS" class="career-img img-fluid">
                </div>
              </div>
            </div>

            <!-- Item 5: Detailed Job Notification -->
            <div class="career-notice-item">
              <div class="career-notice-header">
                <div class="d-flex align-items-center gap-2">
                  <span class="badge bg-secondary text-white rounded-pill px-3 py-1">Notice</span>
                  <h6 class="fw-bold mb-0 text-dark">Detailed Employment Notification</h6>
                </div>
                <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/job_08012025_0348.jpg" target="_blank" class="btn btn-sm btn-outline-secondary rounded-pill px-3 py-1">
                  <i class="fa fa-up-right-from-square me-1"></i> View Full Image
                </a>
              </div>
              <div class="career-notice-body">
                <div class="career-img-wrapper">
                  <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/job_08012025_0348.jpg" alt="Employment Notification - SSSUTMS" class="career-img img-fluid">
                </div>
              </div>
            </div>

            <!-- Item 6: School of Homoeopathy (BHMS PG) PDF Download -->
            <div class="career-pdf-banner" id="homoeopathy">
              <div class="d-flex align-items-center gap-3">
                <div class="p-2 bg-danger bg-opacity-10 text-danger rounded-3 fs-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                  <i class="fa fa-file-pdf"></i>
                </div>
                <div>
                  <div class="d-flex align-items-center gap-2 mb-1">
                    <span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill px-2">Homoeopathy</span>
                    <h6 class="fw-bold mb-0 text-dark">APPOINTMENT (School of Homoeopathy - BHMS PG)</h6>
                  </div>
                  <p class="small text-muted mb-0">Official appointment notification and qualifications for Homoeopathy faculty positions.</p>
                </div>
              </div>
              <div>
                <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Appointment_Add_BHMS_PG_04102023_0923.pdf" target="_blank" class="btn-career-download">
                  <i class="fa fa-file-pdf"></i>
                  <span>Download Notice (PDF)</span>
                </a>
              </div>
            </div>

            <!-- Statutory Policy Callout -->
            <div class="policy-box" id="policy">
              <div class="d-flex align-items-start gap-3">
                <div class="text-primary fs-4 mt-1">
                  <i class="fa fa-shield-halved"></i>
                </div>
                <div>
                  <h6 class="fw-bold text-primary mb-1">Statutory Reservation Policy Notice</h6>
                  <p class="small text-secondary mb-0">
                    <strong>Note:</strong> We follow the reservation policy for staff recruitment in accordance with the statutory guidelines and directives set by the Government of Madhya Pradesh.
                  </p>
                </div>
              </div>
            </div>

            <!-- Item 7: Appointment of Vice-Chancellor -->
            <div class="career-notice-item">
              <div class="career-notice-header">
                <div class="d-flex align-items-center gap-2">
                  <span class="badge bg-dark text-white rounded-pill px-3 py-1">Executive</span>
                  <h6 class="fw-bold mb-0 text-dark">Appointment of Vice-Chancellor</h6>
                </div>
                <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Appointment_of_Vice-Chancellor_16082023_0445.jpg" target="_blank" class="btn btn-sm btn-outline-secondary rounded-pill px-3 py-1">
                  <i class="fa fa-up-right-from-square me-1"></i> View Full Image
                </a>
              </div>
              <div class="career-notice-body">
                <div class="career-img-wrapper">
                  <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/Appointment_of_Vice-Chancellor_16082023_0445.jpg" alt="Appointment of Vice-Chancellor - SSSUTMS" class="career-img img-fluid">
                </div>
              </div>
            </div>

            <!-- Item 8: Ombudsperson Application PDF -->
            <div class="career-pdf-banner" id="ombudsperson">
              <div class="d-flex align-items-center gap-3">
                <div class="p-2 bg-primary bg-opacity-10 text-primary rounded-3 fs-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                  <i class="fa fa-file-pdf"></i>
                </div>
                <div>
                  <div class="d-flex align-items-center gap-2 mb-1">
                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-2">Statutory Position</span>
                    <h6 class="fw-bold mb-0 text-dark">Applications Invited for the Post of OMBUDSPERSON (PART TIME)</h6>
                  </div>
                  <p class="small text-muted mb-0">Terms of appointment, eligibility criteria, and application procedure for Ombudsperson.</p>
                </div>
              </div>
              <div>
                <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/career.pdf" target="_blank" class="btn-career-download">
                  <i class="fa fa-file-pdf"></i>
                  <span>Download Notice (PDF)</span>
                </a>
              </div>
            </div>

            <!-- Item 9: General Recruitment Advertisement -->
            <div class="career-notice-item">
              <div class="career-notice-header">
                <div class="d-flex align-items-center gap-2">
                  <span class="badge bg-secondary text-white rounded-pill px-3 py-1">Recruitment</span>
                  <h6 class="fw-bold mb-0 text-dark">Employment Notice - Various Departments</h6>
                </div>
                <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/ad_06072023_1203.jpg" target="_blank" class="btn btn-sm btn-outline-secondary rounded-pill px-3 py-1">
                  <i class="fa fa-up-right-from-square me-1"></i> View Full Image
                </a>
              </div>
              <div class="career-notice-body">
                <div class="career-img-wrapper">
                  <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/ad_06072023_1203.jpg" alt="Employment Notice - SSSUTMS" class="career-img img-fluid">
                </div>
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

<?php require_once __DIR__ . '/../includes/footer.php'; ?>