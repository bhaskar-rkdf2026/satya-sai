<?php
$page_title = 'Best Practices - SSSUTMS';
$banner_title = 'Best Practices';
$banner_category = 'About';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?>

<style>
.bp-page-section {
  background-color: #f8fafc;
}
.bp-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
  overflow: hidden;
}
.bp-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2rem;
  position: relative;
}
.bp-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #0d9488, #14b8a6);
}
.bp-item-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 16px;
  padding: 1.5rem;
  margin-bottom: 1.25rem;
  box-shadow: 0 4px 16px rgba(0,0,0,0.02);
  transition: all 0.25s ease;
}
.bp-item-card:hover {
  border-color: #cbd5e1;
  box-shadow: 0 8px 24px rgba(15, 23, 42, 0.06);
  transform: translateY(-2px);
}
.bp-icon-box {
  width: 46px;
  height: 46px;
  border-radius: 12px;
  background: rgba(13, 148, 136, 0.1);
  color: #0d9488;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.2rem;
  flex-shrink: 0;
}
.bp-pdf-btn {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 9px 20px;
  background: #dc2626;
  color: #ffffff;
  font-weight: 700;
  font-size: 0.88rem;
  border-radius: 10px;
  text-decoration: none;
  transition: all 0.2s ease;
  box-shadow: 0 3px 10px rgba(220, 38, 38, 0.25);
}
.bp-pdf-btn:hover {
  background: #b91c1c;
  color: #ffffff;
  transform: translateY(-2px);
  box-shadow: 0 5px 14px rgba(220, 38, 38, 0.35);
}
</style>

<section class="subpage-main-section bp-page-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        
        <!-- Main Card Wrapper -->
        <div class="bp-main-card mb-4">
          
          <!-- Banner Header -->
          <div class="bp-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge bg-teal text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background-color: #0d9488 !important;">
                <i class="fa-solid fa-star me-1"></i> Quality Excellence &amp; Governance
              </span>
              <h3 class="fw-bold text-white mb-0 fs-3">INSTITUTIONAL BEST PRACTICES</h3>
            </div>
          </div>

          <!-- Body Container -->
          <div class="p-4">
            
            <!-- Item 1: ERP -->
            <div class="bp-item-card d-flex align-items-center justify-content-between flex-wrap gap-3">
              <div class="d-flex align-items-center gap-3">
                <div class="bp-icon-box">
                  <i class="fa-solid fa-network-wired"></i>
                </div>
                <div>
                  <h5 class="fw-bold text-dark mb-1 fs-6">Enterprise Resources Planning (ERP)</h5>
                  <p class="text-secondary small mb-0">Unified digital governance &amp; automated administrative management system.</p>
                </div>
              </div>
              <div>
                <a href="<?php echo BASE_URL; ?>assets/pdf/ERP_report.pdf" target="_blank" rel="noopener" class="bp-pdf-btn">
                  <i class="fa-solid fa-file-pdf fs-6"></i>
                  <span>Download ERP Report (PDF)</span>
                </a>
              </div>
            </div>

            <!-- Item 2: ABCA System -->
            <div class="bp-item-card d-flex align-items-center justify-content-between flex-wrap gap-3">
              <div class="d-flex align-items-center gap-3">
                <div class="bp-icon-box">
                  <i class="fa-solid fa-chart-line"></i>
                </div>
                <div>
                  <h5 class="fw-bold text-dark mb-1 fs-6">Activity Based Continuous Assessment (ABCA) System</h5>
                  <p class="text-secondary small mb-0">Structured student evaluation system focusing on continuous learning &amp; practical activities.</p>
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