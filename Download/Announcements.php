<?php
$page_title = 'Announcements - SSSUTMS';
$banner_title = 'Announcements';
$banner_category = 'Download';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?>

<style>
  .announcement-main-card {
    background: #ffffff;
    border-radius: 16px;
    border: 1px solid #e2e8f0;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(11, 37, 69, 0.06);
    transition: all 0.3s ease;
  }
  .announcement-card-header {
    background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
    padding: 20px 28px;
    position: relative;
  }
  .announcement-gold-line {
    height: 3px;
    background: linear-gradient(90deg, #f3752c 0%, #f6a935 50%, #f3752c 100%);
    width: 100%;
  }
  .calender-hero-title {
    text-align: center;
    padding: 16px 20px;
    margin-bottom: 30px;
    background: linear-gradient(135deg, #f8fafc 0%, #edf4fc 100%);
    border: 1px solid #dbeafe;
    border-radius: 12px;
  }
  .calender-hero-title h4 {
    color: #0b2545;
    font-family: 'Montserrat', sans-serif;
    font-weight: 800;
    margin: 0;
    font-size: 1.3rem;
  }
  .calender-hero-title .badge-accent {
    background: linear-gradient(135deg, #f3752c 0%, #e0580a 100%);
    color: #ffffff;
    font-size: 0.78rem;
    padding: 4px 12px;
    border-radius: 50px;
    display: inline-block;
    margin-bottom: 6px;
    font-weight: 600;
  }
  .faculty-section {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 14px;
    padding: 22px 24px;
    margin-bottom: 22px;
    transition: all 0.25s ease;
  }
  .faculty-section:hover {
    border-color: #cbd5e1;
    box-shadow: 0 8px 24px rgba(11, 37, 69, 0.06);
  }
  .faculty-header {
    display: flex;
    align-items: center;
    gap: 12px;
    padding-bottom: 14px;
    margin-bottom: 16px;
    border-bottom: 1px solid #f1f5f9;
  }
  .faculty-header-icon {
    width: 44px;
    height: 44px;
    border-radius: 10px;
    background: #f0f7ff;
    color: #0b2545;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    flex-shrink: 0;
    border: 1px solid #dbeafe;
  }
  .faculty-header-title {
    font-family: 'Montserrat', sans-serif;
    font-size: 1.05rem;
    font-weight: 700;
    color: #0b2545;
    margin: 0;
  }
  .calendar-item {
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 10px;
    padding: 12px 18px;
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 14px;
    transition: all 0.2s ease;
  }
  .calendar-item:last-child {
    margin-bottom: 0;
  }
  .calendar-item:hover {
    background: #ffffff;
    border-color: #cbd5e1;
    transform: translateX(4px);
    box-shadow: 0 4px 12px rgba(11, 37, 69, 0.05);
  }
  .calendar-item-name {
    font-weight: 600;
    color: #1e293b;
    font-size: 0.94rem;
    display: flex;
    align-items: center;
    gap: 10px;
  }
  .calendar-item-prefix {
    width: 26px;
    height: 26px;
    border-radius: 50%;
    background: #e2e8f0;
    color: #0b2545;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 0.8rem;
    font-weight: 700;
    flex-shrink: 0;
  }
  .btn-download-pdf {
    background: #ffffff;
    color: #0b2545 !important;
    border: 1px solid #cbd5e1;
    font-weight: 600;
    font-size: 0.84rem;
    padding: 7px 16px;
    border-radius: 50px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    white-space: nowrap;
    transition: all 0.2s ease;
    text-decoration: none !important;
  }
  .btn-download-pdf:hover {
    background: linear-gradient(135deg, #f3752c 0%, #e0580a 100%);
    color: #ffffff !important;
    border-color: #f3752c;
    box-shadow: 0 4px 12px rgba(243, 117, 44, 0.3);
    transform: translateY(-1px);
  }
  .btn-download-pdf:hover .text-danger {
    color: #ffffff !important;
  }
</style>

<section class="subpage-main-section py-4 bg-light">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="announcement-main-card mb-4">
          
          <!-- Card Header styled with Homepage Gradient -->
          <div class="announcement-card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
            <h2 class="h5 fw-bold text-white mb-0 d-flex align-items-center gap-2">
              <i class="bi bi-journal-text me-2" style="color: #f6a935;"></i> Announcements
            </h2>
            <span class="badge rounded-pill px-3 py-2 small" style="background: rgba(255, 255, 255, 0.15); color: #ffffff; font-weight: 500;">
              <i class="fa fa-calendar-check text-success me-1"></i> Academic Calendars
            </span>
          </div>
          <div class="announcement-gold-line"></div>

          <!-- Card Body -->
          <div class="card-body p-4 p-md-5">

            <!-- Top Event Calendar Hero Title -->
            <div class="calender-hero-title">
              <span class="badge-accent">
                <i class="fa fa-calendar-days me-1"></i> Session 2024-25
              </span>
              <h4>Event Calender for the Year 2024-25</h4>
            </div>

            <!-- SECTION 1: FACULTY OF EDUCATION -->
            <div class="faculty-section">
              <div class="faculty-header">
                <div class="faculty-header-icon">
                  <i class="fa fa-graduation-cap"></i>
                </div>
                <div>
                  <h5 class="faculty-header-title">FACULTY OF EDUCATION FOR THE YEAR 2024-25</h5>
                  <small class="text-muted">Academic calendars for B.Ed, B.A. B.Ed, and B.P.Ed programs</small>
                </div>
              </div>

              <!-- Calendar Items (Matching live site alpha, beta, gamma) -->
              <div class="calendar-item">
                <div class="calendar-item-name">
                  <span class="calendar-item-prefix">&alpha;</span>
                  <span>B.ED Department Calendar</span>
                </div>
                <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Announcements/Faculty of Education.pdf" target="_blank" rel="noopener" class="btn-download-pdf">
                  <i class="fa fa-file-pdf text-danger"></i> Download PDF
                </a>
              </div>

              <div class="calendar-item">
                <div class="calendar-item-name">
                  <span class="calendar-item-prefix">&beta;</span>
                  <span>B.A. B.ED Department Calendar</span>
                </div>
                <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Announcements/Faculty of Education.pdf" target="_blank" rel="noopener" class="btn-download-pdf">
                  <i class="fa fa-file-pdf text-danger"></i> Download PDF
                </a>
              </div>

              <div class="calendar-item">
                <div class="calendar-item-name">
                  <span class="calendar-item-prefix">&gamma;</span>
                  <span>B.P. ED Department Calendar</span>
                </div>
                <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Announcements/Faculty of Education.pdf" target="_blank" rel="noopener" class="btn-download-pdf">
                  <i class="fa fa-file-pdf text-danger"></i> Download PDF
                </a>
              </div>
            </div>

            <!-- SECTION 2: COLLEGE OF PHARMACY -->
            <div class="faculty-section">
              <div class="faculty-header">
                <div class="faculty-header-icon">
                  <i class="fa fa-prescription-bottle-medical"></i>
                </div>
                <div>
                  <h5 class="faculty-header-title">COLLEGE OF PHARMACY FOR THE YEAR 2024-25</h5>
                  <small class="text-muted">Academic session and practical calendar for Pharmacy department</small>
                </div>
              </div>

              <!-- Pharmacy Item -->
              <div class="calendar-item">
                <div class="calendar-item-name">
                  <span class="calendar-item-prefix">&alpha;</span>
                  <span>PHARMACY DEPARTMENT</span>
                </div>
                <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Announcements/College of Pharmacy.pdf" target="_blank" rel="noopener" class="btn-download-pdf">
                  <i class="fa fa-file-pdf text-danger"></i> Download PDF
                </a>
              </div>
            </div>

            <!-- SECTION 3: SCHOOL OF ENGINEERING -->
            <div class="faculty-section mb-0">
              <div class="faculty-header">
                <div class="faculty-header-icon">
                  <i class="fa fa-laptop-code"></i>
                </div>
                <div>
                  <h5 class="faculty-header-title">SCHOOL OF ENGINEERING FOR THE YEAR 2024-2025</h5>
                  <small class="text-muted">Engineering and technological studies academic calendar</small>
                </div>
              </div>

              <!-- Engineering Item -->
              <div class="calendar-item">
                <div class="calendar-item-name">
                  <span class="calendar-item-prefix">a</span>
                  <span>Computer Sciences and Engineering</span>
                </div>
                <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Announcements/Faculty of Education.pdf" target="_blank" rel="noopener" class="btn-download-pdf">
                  <i class="fa fa-file-pdf text-danger"></i> Download PDF
                </a>
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