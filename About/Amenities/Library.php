<?php
$page_title = 'Library - SSSUTMS';
$banner_title = 'Library';
$banner_category = 'About';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
.lib-page-section {
  background-color: #f8fafc;
}
.lib-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
  overflow: hidden;
}
.lib-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2rem;
  position: relative;
}
.lib-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #059669, #10b981);
}
.lib-stat-chip {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 14px 18px;
  display: flex;
  align-items: center;
  gap: 14px;
  height: 100%;
  transition: all 0.2s ease;
}
.lib-stat-chip:hover {
  border-color: #cbd5e1;
  box-shadow: 0 4px 14px rgba(0,0,0,0.04);
}
.lib-stat-icon {
  width: 44px;
  height: 44px;
  border-radius: 10px;
  background: rgba(5, 150, 105, 0.1);
  color: #059669;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.25rem;
  flex-shrink: 0;
}
.lib-info-box {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 1.5rem;
  box-shadow: 0 4px 16px rgba(0,0,0,0.02);
  margin-bottom: 1.5rem;
}
.lib-pdf-btn {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 10px 22px;
  background: #dc2626;
  color: #ffffff;
  font-weight: 700;
  font-size: 0.9rem;
  border-radius: 10px;
  text-decoration: none;
  transition: all 0.2s ease;
  box-shadow: 0 3px 10px rgba(220, 38, 38, 0.25);
}
.lib-pdf-btn:hover {
  background: #b91c1c;
  color: #ffffff;
  transform: translateY(-2px);
  box-shadow: 0 5px 14px rgba(220, 38, 38, 0.35);
}
.lib-gallery-card {
  border-radius: 16px;
  overflow: hidden;
  border: 1px solid #e2e8f0;
  box-shadow: 0 6px 20px rgba(0,0,0,0.06);
  margin-bottom: 1.5rem;
}
.lib-gallery-card img {
  width: 100%;
  height: auto;
  display: block;
}
</style>

<section class="subpage-main-section lib-page-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        
        <!-- Main Card Wrapper -->
        <div class="lib-main-card mb-4">
          
          <!-- Banner Header -->
          <div class="lib-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge bg-success text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill">
                <i class="fa-solid fa-book-open-reader me-1"></i> Knowledge Repository &amp; Research
              </span>
              <h3 class="fw-bold text-white mb-0 fs-3">CENTRAL &amp; CONSTITUENT LIBRARIES</h3>
            </div>
          </div>

          <!-- Body Container -->
          <div class="p-4">
            
            <!-- Statistics Chips Grid -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-sm-6 col-md-3">
                <div class="lib-stat-chip">
                  <div class="lib-stat-icon"><i class="fa-solid fa-ruler-combined"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Covered Area</div>
                    <div class="fw-bold text-dark fs-6">5,339 m<sup>2</sup></div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="lib-stat-chip">
                  <div class="lib-stat-icon"><i class="fa-solid fa-book-bookmark"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Total Books</div>
                    <div class="fw-bold text-dark fs-6">150,980+</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="lib-stat-chip">
                  <div class="lib-stat-icon"><i class="fa-solid fa-newspaper"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">National Journals</div>
                    <div class="fw-bold text-dark fs-6">654</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="lib-stat-chip">
                  <div class="lib-stat-icon"><i class="fa-solid fa-globe"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">International Journals</div>
                    <div class="fw-bold text-dark fs-6">159</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Narrative Card -->
            <div class="lib-info-box">
              <div class="d-flex align-items-start gap-3">
                <div class="lib-stat-icon mt-1">
                  <i class="fa-solid fa-building-columns"></i>
                </div>
                <div>
                  <h5 class="fw-bold text-dark mb-2">Central &amp; Digital Library Facilities</h5>
                  <p class="text-secondary lh-base text-justify mb-3" style="font-size: 0.95rem;">
                    In our university we have one central library and eighteen constituents Library. All constituents Institutes have their library having extensive range of Reference books, textbooks, International &amp; national journals. All libraries are digital with large number of e-journal subscriptions for the benefit of students.
                  </p>
                  <div>
                    <a href="<?php echo BASE_URL; ?>assets/pdf/IMG_0002_07122024_0416.pdf" target="_blank" rel="noopener" class="lib-pdf-btn">
                      <i class="fa-solid fa-file-pdf fs-6"></i>
                      <span>Download Library &amp; Resource Center Details (PDF)</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>

            <!-- Library Gallery Showcase -->
            <h5 class="fw-bold text-dark mb-3"><i class="fa-solid fa-images text-success me-2"></i>Library Infrastructure &amp; Reading Spaces</h5>
            
            <div class="lib-gallery-card">
              <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/LIB1_07012025_0349.jpg" alt="SSSUTMS Central Library Facility 1" class="img-fluid" />
            </div>

            <div class="lib-gallery-card">
              <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/LIB2_07012025_0350.jpg" alt="SSSUTMS Central Library Facility 2" class="img-fluid" />
            </div>

            <div class="lib-gallery-card mb-0">
              <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/IMG_0759_08012025_1134.jpg" alt="SSSUTMS Central Library Reading Hall" class="img-fluid" />
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