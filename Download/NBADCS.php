<?php
$page_title = 'NBA-DCS - SSSUTMS';
$banner_title = 'NBA-DCS';
$banner_category = 'Download';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?>

<style>
  .nba-main-card {
    background: #ffffff;
    border-radius: 16px;
    border: 1px solid #e2e8f0;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(11, 37, 69, 0.06);
    transition: all 0.3s ease;
  }
  .nba-card-header {
    background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
    padding: 20px 28px;
    position: relative;
  }
  .nba-gold-line {
    height: 3px;
    background: linear-gradient(90deg, #f3752c 0%, #f6a935 50%, #f3752c 100%);
    width: 100%;
  }
  .master-download-box {
    background: linear-gradient(135deg, #f8fafc 0%, #edf4fc 100%);
    border: 1px solid #dbeafe;
    border-left: 4px solid #f3752c;
    transition: all 0.25s ease;
  }
  .master-download-box:hover {
    box-shadow: 0 6px 18px rgba(11, 37, 69, 0.08);
  }
  .master-icon-avatar {
    width: 52px;
    height: 52px;
    border-radius: 12px;
    background: #ffffff;
    color: #ef4444;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 1.6rem;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
    flex-shrink: 0;
  }
  .btn-accent-cta {
    background: linear-gradient(135deg, #f3752c 0%, #e0580a 100%);
    color: #ffffff !important;
    font-weight: 600;
    font-size: 0.9rem;
    padding: 11px 24px;
    border-radius: 50px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    box-shadow: 0 4px 14px rgba(243, 117, 44, 0.3);
    transition: all 0.25s ease;
    text-decoration: none !important;
  }
  .btn-accent-cta:hover {
    background: linear-gradient(135deg, #e0580a 0%, #c94c07 100%);
    box-shadow: 0 6px 20px rgba(243, 117, 44, 0.45);
    transform: translateY(-2px);
  }
  .nba-dept-box {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 14px;
    padding: 24px 20px;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  }
  .nba-dept-box:hover {
    border-color: #cbd5e1;
    transform: translateY(-5px);
    box-shadow: 0 12px 28px rgba(11, 37, 69, 0.1);
  }
  .dept-avatar {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: #f0f7ff;
    color: #0b2545;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    margin-bottom: 16px;
    border: 1px solid #dbeafe;
    transition: all 0.3s ease;
  }
  .nba-dept-box:hover .dept-avatar {
    background: #0b2545;
    color: #f6a935;
    transform: scale(1.08);
  }
  .btn-dept-download {
    background: #ffffff;
    color: #0b2545 !important;
    border: 1px solid #cbd5e1;
    font-weight: 600;
    font-size: 0.86rem;
    padding: 9px 18px;
    border-radius: 50px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    width: 100%;
    transition: all 0.25s ease;
    text-decoration: none !important;
    margin-top: auto;
  }
  .btn-dept-download:hover {
    background: #0b2545;
    color: #ffffff !important;
    border-color: #0b2545;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(11, 37, 69, 0.15);
  }
  .btn-dept-download:hover .text-danger {
    color: #f6a935 !important;
  }
</style>

<section class="subpage-main-section py-4 bg-light">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="nba-main-card mb-4">
          
          <!-- Card Header styled with Homepage Gradient -->
          <div class="nba-card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
            <h2 class="h5 fw-bold text-white mb-0 d-flex align-items-center gap-2">
              <i class="fa fa-award" style="color: #f6a935;"></i> NBA-DCS
            </h2>
            <span class="badge rounded-pill px-3 py-2 small" style="background: rgba(255, 255, 255, 0.15); color: #ffffff; font-weight: 500;">
              <i class="fa fa-shield-check text-success me-1"></i> Quality &amp; Accreditation
            </span>
          </div>
          <div class="nba-gold-line"></div>

          <!-- Card Body -->
          <div class="card-body p-4 p-md-5">
            
            <!-- Master Download Callout: "Click here to download" -->
            <div class="master-download-box p-4 rounded-3 mb-5">
              <div class="row align-items-center g-3">
                <div class="col-md-7 d-flex align-items-center gap-3">
                  <div class="master-icon-avatar">
                    <i class="fa fa-file-pdf"></i>
                  </div>
                  <div>
                    <span class="badge mb-1" style="background: #e0f2fe; color: #0284c7; font-weight: 600; font-size: 0.75rem;">
                      Institutional Master Document
                    </span>
                    <h5 class="fw-bold mb-1" style="color: #0b2545; font-family: 'Montserrat', sans-serif;">
                      NBA-DCS Master Report
                    </h5>
                    <p class="text-muted small mb-0">Official institutional Data Capturing System document</p>
                  </div>
                </div>
                <div class="col-md-5 text-md-end">
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/DCS_ME_08012026_0254.pdf" target="_blank" rel="noopener" class="btn-accent-cta w-100 w-md-auto">
                    <i class="fa fa-download"></i> Click here to download
                  </a>
                </div>
              </div>
            </div>

            <!-- Section Heading: Departmental Reports -->
            <div class="d-flex align-items-center justify-content-between mb-4">
              <h5 class="fw-bold mb-0" style="color: #0b2545; font-family: 'Montserrat', sans-serif;">
                <i class="fa fa-layer-group text-primary me-2"></i>Departmental NBA-DCS Portfolios
              </h5>
              <span class="text-muted small">
                <i class="fa fa-file-pdf text-danger me-1"></i> Official PDF Files
              </span>
            </div>

            <!-- 3 Clean Department Cards (Homepage Theme) -->
            <div class="row g-4">
              
              <!-- 1. Computer Science and Engineering -->
              <div class="col-md-4">
                <div class="nba-dept-box">
                  <div class="dept-avatar">
                    <i class="fa fa-laptop-code"></i>
                  </div>
                  <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-1 small fw-semibold mb-2">
                    B.Tech CSE
                  </span>
                  <h6 class="fw-bold mb-3" style="color: #0b2545; font-family: 'Montserrat', sans-serif; font-size: 0.98rem; line-height: 1.4;">
                    Computer Science and Engineering
                  </h6>
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/DCS_CSE_10012026_0307.pdf" target="_blank" rel="noopener" class="btn-dept-download">
                    <i class="fa fa-file-pdf text-danger"></i> Download DCS (PDF)
                  </a>
                </div>
              </div>

              <!-- 2. Electronics & Communication Engineering -->
              <div class="col-md-4">
                <div class="nba-dept-box">
                  <div class="dept-avatar">
                    <i class="fa fa-microchip"></i>
                  </div>
                  <span class="badge bg-info-subtle text-info rounded-pill px-3 py-1 small fw-semibold mb-2">
                    B.Tech ECE
                  </span>
                  <h6 class="fw-bold mb-3" style="color: #0b2545; font-family: 'Montserrat', sans-serif; font-size: 0.98rem; line-height: 1.4;">
                    Electronics &amp; Communication Engineering
                  </h6>
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/DCS_ECE_10012026_0308.pdf" target="_blank" rel="noopener" class="btn-dept-download">
                    <i class="fa fa-file-pdf text-danger"></i> Download DCS (PDF)
                  </a>
                </div>
              </div>

              <!-- 3. Mechanical Engineering -->
              <div class="col-md-4">
                <div class="nba-dept-box">
                  <div class="dept-avatar">
                    <i class="fa fa-gears" style="color: #d97706;"></i>
                  </div>
                  <span class="badge bg-warning-subtle text-warning rounded-pill px-3 py-1 small fw-semibold mb-2" style="color: #b45309 !important;">
                    B.Tech ME
                  </span>
                  <h6 class="fw-bold mb-3" style="color: #0b2545; font-family: 'Montserrat', sans-serif; font-size: 0.98rem; line-height: 1.4;">
                    Mechanical Engineering
                  </h6>
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/DCS_ME_10012026_0308.pdf" target="_blank" rel="noopener" class="btn-dept-download">
                    <i class="fa fa-file-pdf text-danger"></i> Download DCS (PDF)
                  </a>
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