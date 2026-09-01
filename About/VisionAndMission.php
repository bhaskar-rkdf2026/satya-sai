<?php
$page_title = 'Vision & Mission - SSSUTMS';
$banner_title = 'Vision & Mission';
$banner_category = 'About';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?>

<style>
.vm-page-section {
  background-color: #f8fafc;
}
.vm-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
  overflow: hidden;
}
.vm-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2rem;
  position: relative;
}
.vm-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #d97706, #f59e0b);
}
.vm-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 16px;
  padding: 2rem;
  height: 100%;
  box-shadow: 0 4px 20px rgba(0,0,0,0.03);
  transition: all 0.25s ease;
}
.vm-card:hover {
  transform: translateY(-3px);
  box-shadow: 0 8px 26px rgba(15, 23, 42, 0.07);
}
.vm-card-amber {
  border-top: 4px solid #d97706;
}
.vm-card-blue {
  border-top: 4px solid #2563eb;
}
.vm-icon-box-amber {
  width: 48px;
  height: 48px;
  border-radius: 12px;
  background: rgba(217, 119, 6, 0.1);
  color: #d97706;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.3rem;
  flex-shrink: 0;
}
.vm-icon-box-blue {
  width: 48px;
  height: 48px;
  border-radius: 12px;
  background: rgba(37, 99, 235, 0.1);
  color: #2563eb;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.3rem;
  flex-shrink: 0;
}
.vm-quote-box {
  background: #f8fafc;
  border-left: 4px solid #cbd5e1;
  border-radius: 10px;
  padding: 1.25rem 1.5rem;
  margin-top: 1rem;
}
.vm-nav-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 1rem 1.25rem;
  transition: all 0.2s ease;
  text-decoration: none;
  display: block;
}
.vm-nav-card:hover {
  border-color: #cbd5e1;
  box-shadow: 0 4px 12px rgba(0,0,0,0.05);
  transform: translateY(-2px);
}
</style>

<section class="subpage-main-section vm-page-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        
        <!-- Main Card Wrapper -->
        <div class="vm-main-card mb-4">
          
          <!-- Banner Header -->
          <div class="vm-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge bg-warning text-dark fw-bold uppercase mb-2 px-3 py-2 rounded-pill">
                <i class="fa-solid fa-compass me-1"></i> Institutional Purpose
              </span>
              <h3 class="fw-bold text-white mb-0 fs-3">OUR VISION &amp; MISSION</h3>
            </div>
          </div>

          <!-- Body Container -->
          <div class="p-4">
            
            <!-- Vision & Mission Grid -->
            <div class="row g-4 mb-4">
              
              <!-- Vision Card -->
              <div class="col-md-6 d-flex">
                <div class="vm-card vm-card-amber flex-grow-1">
                  <div class="d-flex align-items-center gap-3 mb-3 pb-3 border-bottom">
                    <div class="vm-icon-box-amber">
                      <i class="fa-solid fa-eye"></i>
                    </div>
                    <div>
                      <span class="text-uppercase fw-bold text-warning small letter-spacing-1">Future Aspirations</span>
                      <h4 class="fw-bold text-dark mb-0 fs-4">Our Vision</h4>
                    </div>
                  </div>
                  <div class="vm-quote-box" style="border-left-color: #d97706;">
                    <p class="lead text-dark mb-0 fst-italic text-justify" style="font-size: 1.05rem; line-height: 1.8;">
                      &ldquo;To emerge as World&rsquo;s one of the finest Universities in the field of Higher, Technical and Medical Education to develop Professionals who are Technically competent, ethically sensitive and environment friendly, for the betterment of society.&rdquo;
                    </p>
                  </div>
                </div>
              </div>

              <!-- Mission Card -->
              <div class="col-md-6 d-flex">
                <div class="vm-card vm-card-blue flex-grow-1">
                  <div class="d-flex align-items-center gap-3 mb-3 pb-3 border-bottom">
                    <div class="vm-icon-box-blue">
                      <i class="fa-solid fa-bullseye"></i>
                    </div>
                    <div>
                      <span class="text-uppercase fw-bold text-primary small letter-spacing-1">Action &amp; Roadmap</span>
                      <h4 class="fw-bold text-dark mb-0 fs-4">Our Mission</h4>
                    </div>
                  </div>
                  <div class="vm-quote-box" style="border-left-color: #2563eb;">
                    <p class="lead text-dark mb-0 fst-italic text-justify" style="font-size: 1.05rem; line-height: 1.8;">
                      &ldquo;Accomplish stimulating learning environment for students through quality teaching, research and outreach activity by providing state of the art facilities, industry exposure and guidance of dedicated faculty.&rdquo;
                    </p>
                  </div>
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