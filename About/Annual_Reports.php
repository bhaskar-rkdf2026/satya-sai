<?php
$page_title = 'Annual Reports - SSSUTMS';
$banner_title = 'Annual Reports';
$banner_category = 'About';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?>

<style>
.ar-page-section {
  background-color: #f8fafc;
}
.ar-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
  overflow: hidden;
}
.ar-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2rem;
  position: relative;
}
.ar-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #2563eb, #3b82f6);
}
.ar-doc-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 16px;
  padding: 1.75rem;
  box-shadow: 0 4px 16px rgba(0,0,0,0.02);
  transition: all 0.25s ease;
}
.ar-doc-card:hover {
  border-color: #cbd5e1;
  box-shadow: 0 8px 24px rgba(15, 23, 42, 0.06);
}
</style>

<section class="subpage-main-section ar-page-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        
        <!-- Main Card Wrapper -->
        <div class="ar-main-card mb-4">
          
          <!-- Banner Header -->
          <div class="ar-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge bg-primary text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill">
                <i class="fa-solid fa-file-invoice me-1"></i> Statutory Publications
              </span>
              <h3 class="fw-bold text-white mb-0 fs-3">ANNUAL REPORTS</h3>
            </div>
          </div>

          <!-- Body Container -->
          <div class="p-4">
            
            <!-- Document Card -->
            <div class="ar-doc-card">
              <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                <div class="d-flex align-items-center gap-3">
                  <div class="rounded-3 bg-danger bg-opacity-10 text-danger p-3 fs-3">
                    <i class="fa-solid fa-file-pdf"></i>
                  </div>
                  <div>
                    <h5 class="fw-bold text-dark mb-1">Annual Report (Academic Year: 2023–2024)</h5>
                    <p class="text-secondary small mb-0">Official Statutory Annual Progress &amp; Performance Report</p>
                  </div>
                </div>
                <div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/ANNUAL_REPORT.pdf" target="_blank" class="btn btn-danger rounded-pill px-4 py-2.5 fw-bold shadow-sm d-inline-flex align-items-center gap-2">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
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