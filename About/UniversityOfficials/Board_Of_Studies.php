<?php
$page_title = 'Board of Studies - SSSUTMS';
$banner_title = 'Board of Studies';
$banner_category = 'About';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
.bos-page-section {
  background-color: #f8fafc;
}
.bos-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
  overflow: hidden;
}
.bos-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2rem;
  position: relative;
}
.bos-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #0d9488, #14b8a6);
}
.bos-pdf-box {
  background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
  border: 1px solid #bbf7d0;
  border-radius: 16px;
  padding: 1.75rem;
  box-shadow: 0 4px 16px rgba(0,0,0,0.02);
}
.bos-pdf-btn {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  padding: 10px 22px;
  background: #dc2626;
  color: #ffffff;
  font-weight: 700;
  font-size: 0.95rem;
  border-radius: 10px;
  text-decoration: none;
  transition: all 0.2s ease;
  box-shadow: 0 4px 14px rgba(220, 38, 38, 0.25);
}
.bos-pdf-btn:hover {
  background: #b91c1c;
  color: #ffffff;
  transform: translateY(-2px);
  box-shadow: 0 6px 18px rgba(220, 38, 38, 0.35);
}
</style>

<section class="subpage-main-section bos-page-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        
        <!-- Main Card Wrapper -->
        <div class="bos-main-card mb-4">
          
          <!-- Banner Header -->
          <div class="bos-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge bg-teal text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background-color: #0d9488;">
                <i class="fa-solid fa-book-open-reader me-1"></i> Board of Studies
              </span>
              <h3 class="fw-bold text-white mb-0 fs-3">BOARD OF STUDIES (BoS)</h3>
            </div>
            <div>
              <a href="<?php echo BASE_URL; ?>assets/pdf/BOS_07122024_0448.pdf" target="_blank" rel="noopener" class="bos-pdf-btn">
                <i class="fa-solid fa-file-pdf fs-4"></i>
                <span>Download Official Notification (PDF)</span>
              </a>
            </div>
          </div>

          <!-- Body Container -->
          <div class="p-4">
            
            <!-- Notification Callout -->
            <div class="bos-pdf-box d-flex align-items-center justify-content-between flex-wrap gap-3">
              <div class="d-flex align-items-center gap-3">
                <div class="text-success fs-1">
                  <i class="fa-solid fa-file-pdf"></i>
                </div>
                <div>
                  <h5 class="fw-bold text-dark mb-1">Official Board of Studies Document</h5>
                  <p class="mb-0 text-secondary">
                    Click below to view or download the official notification PDF for the Board of Studies.
                  </p>
                </div>
              </div>
              <div>
                <a href="<?php echo BASE_URL; ?>assets/pdf/BOS_07122024_0448.pdf" target="_blank" rel="noopener" class="bos-pdf-btn">
                  <i class="fa-solid fa-arrow-up-right-from-square me-1"></i> Click Here (PDF)
                </a>
              </div>
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