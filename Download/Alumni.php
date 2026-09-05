<?php
$page_title = 'Alumni - SSSUTMS';
$banner_title = 'Alumni';
$banner_category = 'Download';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?>

<style>
  .alumni-main-card {
    background: #ffffff;
    border-radius: 16px;
    border: 1px solid #e2e8f0;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(11, 37, 69, 0.06);
    transition: all 0.3s ease;
  }
  .alumni-card-header {
    background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
    padding: 20px 28px;
    position: relative;
  }
  .alumni-gold-line {
    height: 3px;
    background: linear-gradient(90deg, #f3752c 0%, #f6a935 50%, #f3752c 100%);
    width: 100%;
  }
  .alumni-pdf-banner {
    background: linear-gradient(135deg, #f8fafc 0%, #edf2f7 100%);
    border: 1px solid #e2e8f0;
    border-left: 5px solid #f3752c;
    border-radius: 12px;
    padding: 16px 22px;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
  }
  .btn-alumni-download {
    background: linear-gradient(135deg, #f3752c 0%, #e0580a 100%);
    color: #ffffff;
    font-weight: 600;
    border-radius: 50px;
    padding: 10px 24px;
    font-size: 0.95rem;
    border: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    box-shadow: 0 4px 14px rgba(243, 117, 44, 0.3);
    transition: all 0.25s ease;
    text-decoration: none;
  }
  .btn-alumni-download:hover {
    background: linear-gradient(135deg, #e0580a 0%, #c94700 100%);
    color: #ffffff;
    transform: translateY(-2px);
    box-shadow: 0 6px 18px rgba(243, 117, 44, 0.4);
  }
  .cert-container {
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 14px;
    padding: 16px;
    text-align: center;
    position: relative;
  }
  .cert-img {
    max-width: 100%;
    height: auto;
    border-radius: 10px;
    box-shadow: 0 6px 20px rgba(11, 37, 69, 0.1);
    border: 1px solid #e2e8f0;
    display: inline-block;
  }
</style>

<section class="subpage-main-section py-4" style="background-color: #f8fafc;">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="alumni-main-card mb-4">
          
          <!-- Card Header with Portal Theme -->
          <div class="alumni-card-header text-white">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
              <div class="d-flex align-items-center gap-3">
                <div class="bg-white bg-opacity-10 p-2 rounded-circle d-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                  <i class="fa fa-graduation-cap text-warning fs-5"></i>
                </div>
                <div>
                  <h4 class="fw-bold mb-0 text-white">Alumni</h4>
                  <p class="small text-white-50 mb-0">Sri Satya Sai University of Technology and Medical Sciences</p>
                </div>
              </div>
              <div>
                <span class="badge rounded-pill px-3 py-2 fw-semibold" style="background: rgba(243, 117, 44, 0.2); border: 1px solid rgba(243, 117, 44, 0.4); color: #ffd5b8;">
                  <i class="fa fa-certificate me-1"></i> Registered Society
                </span>
              </div>
            </div>
          </div>
          <div class="alumni-gold-line"></div>

          <!-- Card Body -->
          <div class="p-4">
            
            <!-- Official PDF Download Link Box -->
            <div class="alumni-pdf-banner mb-4">
              <div class="d-flex align-items-center gap-3">
                <div class="p-2 bg-danger bg-opacity-10 text-danger rounded-3 fs-3 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                  <i class="fa fa-file-pdf"></i>
                </div>
                <div>
                  <h6 class="fw-bold mb-1 text-dark">Society Rules &amp; Constitution</h6>
                  <p class="small text-muted mb-0">Click here to view or download the official Alumni Association PDF document</p>
                </div>
              </div>
              <div>
                <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/society_rules_07122024_0515.pdf" target="_blank" class="btn-alumni-download">
                  <i class="fa fa-download"></i>
                  <span>Click here (PDF)</span>
                </a>
              </div>
            </div>

            <!-- Certificate Image -->
            <div class="cert-container">
              <div class="d-flex justify-content-between align-items-center mb-3 px-2">
                <span class="fw-semibold text-secondary small">
                  <i class="fa fa-award text-warning me-1"></i> समिति का पंजीयन प्रमाण पत्र (Society Registration Certificate)
                </span>
                <a href="<?php echo BASE_URL; ?>assets/images/Alumni_Registration_Certificate.png" target="_blank" class="btn btn-sm btn-outline-secondary rounded-pill px-3 py-1">
                  <i class="fa fa-up-right-from-square me-1"></i> View Full Size
                </a>
              </div>
              <img src="<?php echo BASE_URL; ?>assets/images/Alumni_Registration_Certificate.png" alt="समिति का पंजीयन प्रमाण पत्र - Sri Satya Sai Alumni Association" class="cert-img img-fluid">
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