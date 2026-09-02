<?php
$page_title = 'Finance Officer - SSSUTMS';
$banner_title = 'Finance Officer';
$banner_category = 'About';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
.fo-page-section {
  background-color: #f8fafc;
}
.fo-profile-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
  overflow: hidden;
}
.fo-card-header {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  padding: 1.5rem;
  color: #ffffff;
  position: relative;
}
.fo-card-header::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #8b5cf6, #a78bfa);
}
.fo-img-container {
  position: relative;
  border-radius: 16px;
  overflow: hidden;
  box-shadow: 0 10px 20px rgba(11, 37, 69, 0.12);
  border: 4px solid #ffffff;
  background: #f1f5f9;
  transition: transform 0.3s ease;
}
.fo-img-container:hover {
  transform: translateY(-3px);
}
.fo-img-container img {
  width: 100%;
  max-height: 350px;
  object-fit: cover;
  object-position: top center;
  display: block;
}
.fo-role-badge {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  padding: 5px 14px;
  background: #f3e8ff;
  color: #6b21a8;
  font-weight: 700;
  font-size: 0.78rem;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  border-radius: 50px;
  border: 1px solid #e9d5ff;
}
.fo-stat-chip {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 10px;
  padding: 10px 14px;
  display: flex;
  align-items: center;
  gap: 10px;
  height: 100%;
  transition: all 0.2s ease;
}
.fo-stat-chip:hover {
  background: #ffffff;
  border-color: #cbd5e1;
  box-shadow: 0 4px 12px rgba(0,0,0,0.04);
}
.fo-stat-icon {
  width: 36px;
  height: 36px;
  border-radius: 8px;
  background: rgba(11, 37, 69, 0.08);
  color: #0b2545;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1rem;
  flex-shrink: 0;
}
.fo-paragraph-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 1.25rem 1.5rem;
  margin-bottom: 1rem;
  position: relative;
  transition: border-color 0.2s ease, box-shadow 0.2s ease;
}
.fo-paragraph-card:hover {
  border-color: #cbd5e1;
  box-shadow: 0 4px 16px rgba(11, 37, 69, 0.04);
}
.fo-paragraph-card h6 {
  font-size: 1.05rem;
  color: #0f172a;
}
.fo-paragraph-card p {
  font-size: 0.95rem;
  line-height: 1.65;
  color: #334155;
}
.fo-quote-banner {
  background: linear-gradient(135deg, #0b2545 0%, #1e3a8a 100%);
  color: #ffffff;
  border-radius: 12px;
  padding: 1.25rem 1.5rem;
  position: relative;
  overflow: hidden;
  box-shadow: 0 6px 18px rgba(11, 37, 69, 0.1);
}
.fo-quote-banner i.quote-bg {
  position: absolute;
  right: -10px;
  bottom: -20px;
  font-size: 6rem;
  opacity: 0.08;
  color: #ffffff;
}
</style>

<section class="subpage-main-section fo-page-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        
        <!-- Header Profile Card -->
        <div class="fo-profile-card mb-4">
          <div class="p-4">
            <div class="row g-4 align-items-center">
              
              <!-- Finance Officer Image -->
              <div class="col-md-5 col-lg-4 text-center">
                <div class="fo-img-container mb-3">
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/principal_dummy_male.jpg" target="_blank" rel="noopener" title="Click to view full image">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/principal_dummy_male.jpg" alt="Mr. Vimal Nath - Chief Finance & Account Officer, SSSUTMS" class="img-fluid" />
                  </a>
                </div>
                <span class="fo-role-badge">
                  <i class="fa-solid fa-coins"></i> Financial Administration
                </span>
              </div>
              
              <!-- Quick Info / Bio Overview -->
              <div class="col-md-7 col-lg-8">
                <div class="ps-md-2">
                  <h3 class="fw-bold text-dark mb-1 fs-3">Mr. Vimal Nath</h3>
                  <p class="fs-6 fw-semibold text-primary mb-3">Chief Finance &amp; Account Officer (CFO)</p>
                  
                  <div class="fo-quote-banner mb-3">
                    <i class="fa-solid fa-quote-right quote-bg"></i>
                    <p class="mb-0 small lh-base italic-text">
                      <i class="fa-solid fa-quote-left me-2 opacity-75"></i>
                      Driving financial performance, optimizing operational efficiencies, and ensuring compliance with financial regulations.
                    </p>
                  </div>

                  <!-- Highlights Grid -->
                  <div class="row g-2 align-items-stretch">
                    <div class="col-sm-6">
                      <div class="fo-stat-chip h-100">
                        <div class="fo-stat-icon">
                          <i class="fa-solid fa-briefcase"></i>
                        </div>
                        <div>
                          <div class="fw-bold text-dark small">Experience</div>
                          <div class="text-muted extra-small" style="font-size: 0.8rem;">25+ Years Financial Controller</div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="fo-stat-chip h-100">
                        <div class="fo-stat-icon">
                          <i class="fa-solid fa-chart-line"></i>
                        </div>
                        <div>
                          <div class="fw-bold text-dark small">Focus Area</div>
                          <div class="text-muted extra-small" style="font-size: 0.8rem;">Budgeting, Forecasting &amp; Compliance</div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>

            </div>
          </div>
        </div>

        <!-- Detailed Content Section -->
        <div class="fo-details-wrapper">
          
          <!-- Bio Paragraph Card -->
          <div class="fo-paragraph-card">
            <div class="d-flex align-items-start gap-3">
              <div class="fo-stat-icon mt-1">
                <i class="fa-solid fa-file-invoice-dollar"></i>
              </div>
              <div>
                <h6 class="fw-bold mb-2">Chief Finance &amp; Account Officer</h6>
                <p class="text-justify mb-0">
                  <strong>Mr. Vimal Nath</strong> is a highly skilled Finance Controller with over 25 years of experience in managing financial operations and strategic financial planning. Known for her strong analytical abilities, she has a proven track record in driving financial performance, improving internal controls, and ensuring compliance with financial regulations. With expertise in budgeting, forecasting, and financial reporting, <strong>Mr. Vimal Nath</strong> is adept at optimizing operational efficiencies, streamlining financial processes, and guiding senior management in making data-driven financial decisions.
                </p>
              </div>
            </div>
          </div>

          <!-- Signature Block -->
          <div class="fo-paragraph-card bg-light border-0 shadow-sm">
            <div>
              <p class="fw-bold text-dark mb-1">Chief Finance &amp; Account Officer,</p>
              <h5 class="fw-bold text-primary mb-0">Mr. Vimal Nath</h5>
              <small class="text-muted">Sri Satya Sai University of Technology &amp; Medical Sciences</small>
            </div>
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

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>