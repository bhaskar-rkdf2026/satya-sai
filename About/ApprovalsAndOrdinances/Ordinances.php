<?php
$page_title = 'Ordinances - SSSUTMS';
$banner_title = 'Ordinances';
$banner_category = 'About';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
.ord-page-section {
  background-color: #f8fafc;
}
.ord-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
  overflow: hidden;
}
.ord-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2rem;
  position: relative;
}
.ord-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #2563eb, #3b82f6);
}
.ord-item-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 1.25rem 1.5rem;
  margin-bottom: 1rem;
  transition: all 0.25 ease;
  box-shadow: 0 4px 16px rgba(0,0,0,0.02);
}
.ord-item-card:hover {
  border-color: #cbd5e1;
  box-shadow: 0 6px 20px rgba(15, 23, 42, 0.06);
  transform: translateY(-2px);
}
.ord-icon-wrapper {
  width: 44px;
  height: 44px;
  border-radius: 12px;
  background: rgba(37, 99, 235, 0.1);
  color: #2563eb;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.2rem;
  flex-shrink: 0;
}
.ord-pdf-btn {
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
.ord-pdf-btn:hover {
  background: #b91c1c;
  color: #ffffff;
  transform: translateY(-2px);
  box-shadow: 0 5px 14px rgba(220, 38, 38, 0.35);
}
</style>

<section class="subpage-main-section ord-page-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        
        <!-- Main Card Wrapper -->
        <div class="ord-main-card mb-4">
          
          <!-- Banner Header -->
          <div class="ord-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge bg-primary text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill">
                <i class="fa-solid fa-book-bookmark me-1"></i> University Governance &amp; Rules
              </span>
              <h3 class="fw-bold text-white mb-0 fs-3">ORDINANCES &amp; REGULATIONS</h3>
            </div>
          </div>

          <!-- Body Container -->
          <div class="p-4">
            
            <!-- Document Item 1: REGULATION -->
            <div class="ord-item-card d-flex align-items-center justify-content-between flex-wrap gap-3">
              <div class="d-flex align-items-center gap-3">
                <div class="ord-icon-wrapper">
                  <i class="fa-solid fa-file-signature"></i>
                </div>
                <div>
                  <h6 class="fw-bold text-dark mb-1 fs-6">REGULATION</h6>
                  <p class="text-secondary small mb-0">Official Academic &amp; Admission Regulations Document</p>
                </div>
              </div>
              <div>
                <a href="<?php echo BASE_URL; ?>assets/pdf/Final_Regulations_admission_04022026_0252.pdf" target="_blank" rel="noopener" class="ord-pdf-btn">
                  <i class="fa-solid fa-file-pdf fs-6"></i>
                  <span>Download Document (PDF)</span>
                </a>
              </div>
            </div>

            <!-- Document Item 2: AMENDED AND NEW ORDINANCE -->
            <div class="ord-item-card d-flex align-items-center justify-content-between flex-wrap gap-3">
              <div class="d-flex align-items-center gap-3">
                <div class="ord-icon-wrapper">
                  <i class="fa-solid fa-scale-balanced"></i>
                </div>
                <div>
                  <h6 class="fw-bold text-dark mb-1 fs-6">AMENDED AND NEW ORDINANCE</h6>
                  <p class="text-secondary small mb-0">Updated &amp; Newly Enacted Statutory Ordinances</p>
                </div>
              </div>
              <div>
                <a href="<?php echo BASE_URL; ?>assets/pdf/act_2.pdf" target="_blank" rel="noopener" class="ord-pdf-btn">
                  <i class="fa-solid fa-file-pdf fs-6"></i>
                  <span>Download Document (PDF)</span>
                </a>
              </div>
            </div>

            <!-- Document Item 3: ORDINANCE -->
            <div class="ord-item-card d-flex align-items-center justify-content-between flex-wrap gap-3">
              <div class="d-flex align-items-center gap-3">
                <div class="ord-icon-wrapper">
                  <i class="fa-solid fa-gavel"></i>
                </div>
                <div>
                  <h6 class="fw-bold text-dark mb-1 fs-6">ORDINANCE</h6>
                  <p class="text-secondary small mb-0">Comprehensive University Ordinances Document</p>
                </div>
              </div>
              <div>
                <a href="<?php echo BASE_URL; ?>assets/pdf/Ordinance.pdf" target="_blank" rel="noopener" class="ord-pdf-btn">
                  <i class="fa-solid fa-file-pdf fs-6"></i>
                  <span>Download Document (PDF)</span>
                </a>
              </div>
            </div>

            <!-- Document Item 4: SUBSEQUENT ORDINANCE -->
            <div class="ord-item-card d-flex align-items-center justify-content-between flex-wrap gap-3">
              <div class="d-flex align-items-center gap-3">
                <div class="ord-icon-wrapper">
                  <i class="fa-solid fa-folder-open"></i>
                </div>
                <div>
                  <h6 class="fw-bold text-dark mb-1 fs-6">SUBSEQUENT ORDINANCE</h6>
                  <p class="text-secondary small mb-0">Subsequent Academic &amp; Administrative Regulations</p>
                </div>
              </div>
              <div>
                <a href="#" class="ord-pdf-btn">
                  <i class="fa-solid fa-file-pdf fs-6"></i>
                  <span>Download Document (PDF)</span>
                </a>
              </div>
            </div>

            <!-- Document Item 5: AMENDED AND REPEALED ORDINANCE -->
            <div class="ord-item-card d-flex align-items-center justify-content-between flex-wrap gap-3">
              <div class="d-flex align-items-center gap-3">
                <div class="ord-icon-wrapper">
                  <i class="fa-solid fa-scroll"></i>
                </div>
                <div>
                  <h6 class="fw-bold text-dark mb-1 fs-6">AMENDED AND REPEALED ORDINANCE</h6>
                  <p class="text-secondary small mb-0">Historical Amended &amp; Repealed Ordinance Records</p>
                </div>
              </div>
              <div>
                <a href="#" class="ord-pdf-btn">
                  <i class="fa-solid fa-file-pdf fs-6"></i>
                  <span>Download Document (PDF)</span>
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