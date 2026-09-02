<?php
$page_title = 'Memorandum of Understanding (MoU) - SSSUTMS';
$banner_title = 'MOU';
$banner_category = 'About';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
.mou-page-section {
  background-color: #f8fafc;
}
.mou-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
  overflow: hidden;
}
.mou-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2rem;
  position: relative;
}
.mou-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #2563eb, #3b82f6);
}
.mou-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 16px;
  padding: 1.5rem;
  margin-bottom: 1.5rem;
  box-shadow: 0 4px 16px rgba(0,0,0,0.02);
  transition: all 0.25s ease;
}
.mou-card:hover {
  border-color: #cbd5e1;
  box-shadow: 0 8px 24px rgba(15, 23, 42, 0.06);
}
.mou-icon-wrapper {
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
.mou-pdf-btn {
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
  white-space: nowrap;
  flex-shrink: 0;
  transition: all 0.2s ease;
  box-shadow: 0 3px 10px rgba(220, 38, 38, 0.25);
}
.mou-pdf-btn:hover {
  background: #b91c1c;
  color: #ffffff;
  transform: translateY(-2px);
  box-shadow: 0 5px 14px rgba(220, 38, 38, 0.35);
}

/* Equal Size Interactive Image Card Frames */
.mou-img-card {
  position: relative;
  border-radius: 14px;
  overflow: hidden;
  border: 1px solid #e2e8f0;
  box-shadow: 0 4px 14px rgba(15, 23, 42, 0.05);
  background: #f8fafc;
  display: block;
  text-decoration: none;
  height: 260px;
  transition: all 0.3s ease;
}
.mou-img-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 10px 25px rgba(15, 23, 42, 0.12);
  border-color: #2563eb;
}
.mou-img-card img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: top center;
  transition: transform 0.4s ease;
}
.mou-img-card:hover img {
  transform: scale(1.05);
}
.mou-img-overlay {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(11, 37, 69, 0.65);
  display: flex;
  align-items: center;
  justify-content: center;
  opacity: 0;
  transition: opacity 0.3s ease;
  color: #ffffff;
  font-weight: 600;
  font-size: 0.9rem;
  gap: 8px;
}
.mou-img-card:hover .mou-img-overlay {
  opacity: 1;
}
.mou-logo-contain img {
  object-fit: contain !important;
  padding: 12px;
  background: #ffffff;
}
</style>

<section class="subpage-main-section mou-page-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        
        <!-- Main Card Wrapper -->
        <div class="mou-main-card mb-4">
          
          <!-- Banner Header -->
          <div class="mou-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge bg-primary text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill">
                <i class="fa-solid fa-handshake me-1"></i> Institutional Linkages &amp; Partnerships
              </span>
              <h3 class="fw-bold text-white mb-0 fs-3">MEMORANDUM OF UNDERSTANDING (MoU)</h3>
            </div>
          </div>

          <!-- Body Container -->
          <div class="p-4">
            
            <!-- Partnership 1: CIDC Centre -->
            <div class="mou-card">
              <div class="d-flex align-items-center gap-3 mb-3">
                <div class="mou-icon-wrapper">
                  <i class="fa-solid fa-building-user"></i>
                </div>
                <div>
                  <span class="badge bg-primary text-white fw-bold me-2">MoU Partner</span>
                  <h5 class="fw-bold text-dark mb-0 fs-6 d-inline-block">Construction Industry Development Council (CIDC) Centre</h5>
                  <p class="text-secondary small mb-0 mt-1">Sri Satya Sai University of Technology and Medical Sciences, Sehore &amp; CIDC Centre Collaboration.</p>
                </div>
              </div>
              <div class="row g-3 mt-1">
                <div class="col-md-6">
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/MOU_27052025_0518.jpg" target="_blank" class="mou-img-card" title="Click for Full Size View">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/MOU_27052025_0518.jpg" alt="MoU with CIDC Centre" />
                    <div class="mou-img-overlay">
                      <i class="fa-solid fa-magnifying-glass-plus"></i> View Full Document
                    </div>
                  </a>
                </div>
                <div class="col-md-6">
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/MOU2_(1)_15012025_0446.jpg" target="_blank" class="mou-img-card" title="Click for Full Size View">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/MOU2_(1)_15012025_0446.jpg" alt="MoU CIDC Document" />
                    <div class="mou-img-overlay">
                      <i class="fa-solid fa-magnifying-glass-plus"></i> View Full Document
                    </div>
                  </a>
                </div>
              </div>
            </div>

            <!-- Partnership 2: CRISP -->
            <div class="mou-card">
              <div class="d-flex align-items-center gap-3 mb-3">
                <div class="mou-icon-wrapper">
                  <i class="fa-solid fa-microscope"></i>
                </div>
                <div>
                  <span class="badge bg-primary text-white fw-bold me-2">MoU Partner</span>
                  <h5 class="fw-bold text-dark mb-0 fs-6 d-inline-block">CRISP - Centre for Research &amp; Industrial Staff Performance</h5>
                  <p class="text-secondary small mb-0 mt-1">SSSUTMS Sehore &amp; CRISP Technical Training &amp; Industrial Performance Collaboration.</p>
                </div>
              </div>
              <div class="row g-3 mt-1">
                <div class="col-md-6">
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/DSC12383_05082025_1141.jpg" target="_blank" class="mou-img-card" title="Click for Full Size View">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/DSC12383_05082025_1141.jpg" alt="MoU Ceremony CRISP" />
                    <div class="mou-img-overlay">
                      <i class="fa-solid fa-magnifying-glass-plus"></i> View Full Document
                    </div>
                  </a>
                </div>
                <div class="col-md-6">
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Adobe_Scan_25_Jul_2025_(1)_002_05082025_1143.jpg" target="_blank" class="mou-img-card" title="Click for Full Size View">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/Adobe_Scan_25_Jul_2025_(1)_002_05082025_1143.jpg" alt="MoU CRISP Document" />
                    <div class="mou-img-overlay">
                      <i class="fa-solid fa-magnifying-glass-plus"></i> View Full Document
                    </div>
                  </a>
                </div>
              </div>
            </div>

            <!-- Partnership 3: Olusegun Agagu University, Nigeria -->
            <div class="mou-card">
              <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div class="d-flex align-items-center gap-3">
                  <div class="mou-icon-wrapper">
                    <i class="fa-solid fa-globe"></i>
                  </div>
                  <div>
                    <span class="badge bg-primary text-white fw-bold me-2">International MoU</span>
                    <h5 class="fw-bold text-dark mb-0 fs-6 d-inline-block">Olusegun Agagu University of Science &amp; Technology, Nigeria</h5>
                    <p class="text-secondary small mb-0 mt-1">School of Engineering, SSSUTMS &amp; Olusegun Agagu University of Science and Technology, Ondo State, Nigeria.</p>
                  </div>
                </div>
                <div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/IMG_08032025_0113.pdf" target="_blank" rel="noopener" class="mou-pdf-btn">
                    <i class="fa-solid fa-file-pdf fs-6"></i>
                    <span>Download MoU (PDF)</span>
                  </a>
                </div>
              </div>
              <div class="row g-3 mt-1">
                <div class="col-md-6">
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/IMG_001_08032025_0110.jpg" target="_blank" class="mou-img-card" title="Click for Full Size View">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/IMG_001_08032025_0110.jpg" alt="International MoU Document 1" />
                    <div class="mou-img-overlay">
                      <i class="fa-solid fa-magnifying-glass-plus"></i> View Full Document
                    </div>
                  </a>
                </div>
                <div class="col-md-6">
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/IMG_002_08032025_0110.jpg" target="_blank" class="mou-img-card" title="Click for Full Size View">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/IMG_002_08032025_0110.jpg" alt="International MoU Document 2" />
                    <div class="mou-img-overlay">
                      <i class="fa-solid fa-magnifying-glass-plus"></i> View Full Document
                    </div>
                  </a>
                </div>
              </div>
            </div>

            <!-- Partnership 4: The Sahayak Trust -->
            <div class="mou-card">
              <div class="d-flex align-items-center gap-3 mb-3">
                <div class="mou-icon-wrapper">
                  <i class="fa-solid fa-apple-whole"></i>
                </div>
                <div>
                  <span class="badge bg-primary text-white fw-bold me-2">MoU Partner</span>
                  <h5 class="fw-bold text-dark mb-0 fs-6 d-inline-block">The Sahayak Trust - Institute for Nutrition Education, Mumbai</h5>
                  <p class="text-secondary small mb-0 mt-1">Institutional Collaboration for Nutrition Education &amp; Community Health Promotion.</p>
                </div>
              </div>
              <div class="row g-3 mt-1">
                <div class="col-md-6">
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/WhatsApp_Image_2024-12-07_at_16.45.00_414aea1e_15012025_0442.jpg" target="_blank" class="mou-img-card" title="Click for Full Size View">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/WhatsApp_Image_2024-12-07_at_16.45.00_414aea1e_15012025_0442.jpg" alt="Sahayak Trust MoU Photo" />
                    <div class="mou-img-overlay">
                      <i class="fa-solid fa-magnifying-glass-plus"></i> View Full Document
                    </div>
                  </a>
                </div>
                <div class="col-md-6">
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Memorandum_of_Understanding_LETTER_(1)_15012025_0449.jpg" target="_blank" class="mou-img-card" title="Click for Full Size View">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/Memorandum_of_Understanding_LETTER_(1)_15012025_0449.jpg" alt="Sahayak Trust MoU Letter" />
                    <div class="mou-img-overlay">
                      <i class="fa-solid fa-magnifying-glass-plus"></i> View Full Document
                    </div>
                  </a>
                </div>
              </div>
            </div>

            <!-- Partnership 5: ICAR - Indian Institute of Soil Science -->
            <div class="mou-card">
              <div class="d-flex align-items-center gap-3 mb-3">
                <div class="mou-icon-wrapper">
                  <i class="fa-solid fa-seedling"></i>
                </div>
                <div>
                  <span class="badge bg-primary text-white fw-bold me-2">MoU Partner</span>
                  <h5 class="fw-bold text-dark mb-0 fs-6 d-inline-block">ICAR - Indian Institute of Soil Science (IISS), Bhopal</h5>
                  <p class="text-secondary small mb-0 mt-1">School of Agriculture, SSSUTMS &amp; ICAR-IISS Research &amp; Soil Science Collaboration.</p>
                </div>
              </div>
              <div class="row g-3 mt-1">
                <div class="col-md-6">
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/WhatsApp_Image_2024-12-07_at_16.43.15_49599cb6_18012025_1112.jpg" target="_blank" class="mou-img-card" title="Click for Full Size View">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/WhatsApp_Image_2024-12-07_at_16.43.15_49599cb6_18012025_1112.jpg" alt="ICAR IISS MoU Ceremony" />
                    <div class="mou-img-overlay">
                      <i class="fa-solid fa-magnifying-glass-plus"></i> View Full Document
                    </div>
                  </a>
                </div>
                <div class="col-md-6">
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/MOU_SoA_SSSUTMS_%26_IISS_006_18012025_1114.jpg" target="_blank" class="mou-img-card" title="Click for Full Size View">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/MOU_SoA_SSSUTMS_%26_IISS_006_18012025_1114.jpg" alt="ICAR IISS MoU Document" />
                    <div class="mou-img-overlay">
                      <i class="fa-solid fa-magnifying-glass-plus"></i> View Full Document
                    </div>
                  </a>
                </div>
              </div>
            </div>

            <!-- Partnership 6: Malaysia University of Science and Technology (MUST) -->
            <div class="mou-card">
              <div class="d-flex align-items-center gap-3 mb-3">
                <div class="mou-icon-wrapper">
                  <i class="fa-solid fa-graduation-cap"></i>
                </div>
                <div>
                  <span class="badge bg-primary text-white fw-bold me-2">International MoU</span>
                  <h5 class="fw-bold text-dark mb-0 fs-6 d-inline-block">Malaysia University of Science and Technology (MUST)</h5>
                  <p class="text-secondary small mb-0 mt-1">SSSUTMS MoU with Malaysia University of Science and Technology (MUST).</p>
                </div>
              </div>
              <div class="row g-3 mt-1">
                <div class="col-md-6">
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/mou_crest_logo.jpg" target="_blank" class="mou-img-card mou-logo-contain" title="Click for Full Size View">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/mou_crest_logo.jpg" alt="SSSUTMS Crest Logo" />
                    <div class="mou-img-overlay">
                      <i class="fa-solid fa-magnifying-glass-plus"></i> View Full Size Logo
                    </div>
                  </a>
                </div>
                <div class="col-md-6">
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/download_30092024_0212.png" target="_blank" class="mou-img-card mou-logo-contain" title="Click for Full Size View">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/download_30092024_0212.png" alt="Malaysia University Logo" />
                    <div class="mou-img-overlay">
                      <i class="fa-solid fa-magnifying-glass-plus"></i> View Full Size Logo
                    </div>
                  </a>
                </div>
              </div>
            </div>

            <!-- Partnership 7: National Cadet Corps (NCC) -->
            <div class="mou-card mb-0">
              <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div class="d-flex align-items-center gap-3">
                  <div class="mou-icon-wrapper">
                    <i class="fa-solid fa-shield-halved"></i>
                  </div>
                  <div>
                    <span class="badge bg-primary text-white fw-bold me-2">Institutional MoU</span>
                    <h5 class="fw-bold text-dark mb-0 fs-6 d-inline-block">National Cadet Corps (NCC)</h5>
                    <p class="text-secondary small mb-0 mt-1">SSSUTMS MoU with National Cadet Corps (NCC).</p>
                  </div>
                </div>
                <div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/MoU_NCC.pdf" target="_blank" rel="noopener" class="mou-pdf-btn">
                    <i class="fa-solid fa-file-pdf fs-6"></i>
                    <span>Download MoU (PDF)</span>
                  </a>
                </div>
              </div>
              <div class="row g-3 mt-1">
                <div class="col-md-6">
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/NCC1_15012025_0420.jpg" target="_blank" class="mou-img-card mou-logo-contain" title="Click for Full Size View">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/NCC1_15012025_0420.jpg" alt="NCC Collaboration Photo 1" />
                    <div class="mou-img-overlay">
                      <i class="fa-solid fa-magnifying-glass-plus"></i> View Full Size Photo
                    </div>
                  </a>
                </div>
                <div class="col-md-6">
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/NCC2_15012025_0422.jpg" target="_blank" class="mou-img-card mou-logo-contain" title="Click for Full Size View">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/NCC2_15012025_0422.jpg" alt="NCC Collaboration Photo 2" />
                    <div class="mou-img-overlay">
                      <i class="fa-solid fa-magnifying-glass-plus"></i> View Full Size Photo
                    </div>
                  </a>
                </div>
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