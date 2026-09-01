<?php
$page_title = 'Statutes - SSSUTMS';
$banner_title = 'Statutes';
$banner_category = 'About';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
.st-page-section {
  background-color: #f8fafc;
}
.st-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
  overflow: hidden;
}
.st-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2rem;
  position: relative;
}
.st-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #2563eb, #3b82f6);
}
.st-pdf-box {
  background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
  border: 1px solid #bae6fd;
  border-radius: 16px;
  padding: 1.75rem;
  box-shadow: 0 4px 16px rgba(0,0,0,0.02);
}
.st-pdf-btn {
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
.st-pdf-btn:hover {
  background: #b91c1c;
  color: #ffffff;
  transform: translateY(-2px);
  box-shadow: 0 6px 18px rgba(220, 38, 38, 0.35);
}
</style>

<section class="subpage-main-section st-page-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        
        <!-- Main Card Wrapper -->
        <div class="st-main-card mb-4">
          
          <!-- Banner Header -->
          <div class="st-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge bg-primary text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill">
                <i class="fa-solid fa-scale-balanced me-1"></i> University Governance &amp; Statutes
              </span>
              <h3 class="fw-bold text-white mb-0 fs-3">UNIVERSITY STATUTES</h3>
            </div>
            <div>
              <a href="<?php echo BASE_URL; ?>assets/pdf/Fianal_Statute_12.pdf" target="_blank" rel="noopener" class="st-pdf-btn">
                <i class="fa-solid fa-file-pdf fs-4"></i>
                <span>Download Official Statutes (PDF)</span>
              </a>
            </div>
          </div>

          <!-- Body Container -->
          <div class="p-4">
            
            <!-- Notification Callout -->
            <div class="st-pdf-box d-flex align-items-center justify-content-between flex-wrap gap-3">
              <div class="d-flex align-items-center gap-3">
                <div class="text-primary fs-1">
                  <i class="fa-solid fa-file-pdf"></i>
                </div>
                <div>
                  <h5 class="fw-bold text-dark mb-1">Official University Statutes Document</h5>
                  <p class="mb-0 text-secondary">
                    Click below to view or download the complete official Statutes document for Sri Satya Sai University of Technology and Medical Sciences.
                  </p>
                </div>
              </div>
              <div>
                <a href="<?php echo BASE_URL; ?>assets/pdf/Fianal_Statute_12.pdf" target="_blank" rel="noopener" class="st-pdf-btn">
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