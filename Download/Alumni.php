<?php
$page_title = 'Alumni Association - SSSUTMS';
$banner_title = 'Alumni Association';
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
.alumni-cert-img {
  max-width: 100%;
  height: auto;
  border-radius: 8px;
  border: 1px solid #cbd5e1;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
  transition: transform 0.3s ease;
}
.alumni-cert-img:hover {
  transform: scale(1.02);
}
.feature-box {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 1.5rem;
  text-align: center;
  height: 100%;
}
.feature-icon {
  width: 50px;
  height: 50px;
  background: rgba(11, 37, 69, 0.08);
  color: #0b2545;
  border-radius: 50%;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  font-size: 1.25rem;
  margin-bottom: 1rem;
}
</style>

<section class="subpage-main-section py-4 bg-light">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        
        <!-- Alumni Association Overview -->
        <div class="syl-card">
          <div class="syl-card-header d-flex flex-wrap align-items-center justify-content-between gap-3">
            <h2 class="syl-card-title">
              <i class="fa fa-users text-warning"></i>
              SSSUTMS Alumni Association
            </h2>
            <div class="d-flex gap-2">
              <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/society_rules_07122024_0515.pdf" target="_blank" rel="noopener" class="syl-btn">
                <i class="fa fa-file-pdf"></i> Society Rules PDF
              </a>
              <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Forms/alumni-form.PDF" target="_blank" rel="noopener" class="syl-btn">
                <i class="fa fa-file-invoice"></i> Alumni Form
              </a>
            </div>
          </div>
          
          <div class="syl-card-body">
            <p class="text-secondary lead fs-6 mb-4">
              The <strong>Sri Satya Sai University of Technology &amp; Medical Sciences (SSSUTMS) Alumni Association</strong> connects thousands of proud graduates across India and around the globe. Our alumni community fosters lifelong relationships, career mentorship, academic networking, and institutional growth.
            </p>

            <div class="row g-4 mb-4">
              <div class="col-md-4">
                <div class="feature-box">
                  <div class="feature-icon"><i class="fa fa-handshake"></i></div>
                  <h6 class="fw-bold text-dark mb-2">Global Networking</h6>
                  <p class="text-secondary small mb-0">Connect with industry leaders, researchers, and entrepreneurs worldwide.</p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="feature-box">
                  <div class="feature-icon"><i class="fa fa-chalkboard-user"></i></div>
                  <h6 class="fw-bold text-dark mb-2">Mentorship &amp; Guidance</h6>
                  <p class="text-secondary small mb-0">Provide internships, career counseling, and project mentorship to current students.</p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="feature-box">
                  <div class="feature-icon"><i class="fa fa-award"></i></div>
                  <h6 class="fw-bold text-dark mb-2">Alumni Meets &amp; Events</h6>
                  <p class="text-secondary small mb-0">Participate in annual reunions, convocations, and technical symposiums.</p>
                </div>
              </div>
            </div>

            <!-- Registration Certificate Showcase -->
            <div class="border rounded-3 p-4 bg-light mb-4">
              <div class="d-flex flex-wrap align-items-center justify-content-between mb-3">
                <div>
                  <h5 class="fw-bold text-dark mb-1">Alumni Association Registration Certificate</h5>
                  <p class="text-muted small mb-0">Official Government Registration under Firms &amp; Societies Act.</p>
                </div>
                <a href="<?php echo BASE_URL; ?>assets/images/Alumni_Registration_Certificate.png" target="_blank" rel="noopener" class="syl-btn">
                  <i class="fa fa-expand"></i> View Full Certificate
                </a>
              </div>

              <div class="text-center">
                <a href="<?php echo BASE_URL; ?>assets/images/Alumni_Registration_Certificate.png" target="_blank" rel="noopener">
                  <img src="<?php echo BASE_URL; ?>assets/images/Alumni_Registration_Certificate.png" alt="SSSUTMS Alumni Registration Certificate" class="alumni-cert-img" style="max-height: 600px;">
                </a>
              </div>
            </div>

            <!-- Society Rules Download Card -->
            <div class="p-3 bg-white rounded-3 border d-flex flex-wrap align-items-center justify-content-between gap-3">
              <div>
                <h6 class="fw-bold text-dark mb-1"><i class="fa fa-book me-2 text-primary"></i>Alumni Association Constitution &amp; By-Laws</h6>
                <p class="text-secondary small mb-0">Download the certified society rules and governing memorandum.</p>
              </div>
              <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/society_rules_07122024_0515.pdf" target="_blank" rel="noopener" class="syl-btn">
                <i class="fa fa-file-pdf"></i> Download By-Laws PDF
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