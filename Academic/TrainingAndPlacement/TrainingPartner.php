<?php
$page_title = 'Training Partners - SSSUTMS';
$banner_title = 'Training Partner';
$banner_category = 'Academic';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
.tp-partner-section { background-color: #f8fafc; }
.tp-partner-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15,23,42,0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}
.tp-partner-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2.2rem 2rem;
  position: relative;
}
.tp-partner-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.tp-main-poster {
  background: #ffffff;
  border: 1px solid #cbd5e1;
  border-radius: 16px;
  padding: 1.25rem;
  box-shadow: 0 4px 20px rgba(0,0,0,0.04);
  text-align: center;
  margin-bottom: 2rem;
}
.tp-main-poster img {
  max-width: 100%;
  height: auto;
  border-radius: 12px;
  box-shadow: 0 4px 14px rgba(0,0,0,0.08);
}
.tp-item-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 16px;
  padding: 1.5rem;
  margin-bottom: 1.25rem;
  box-shadow: 0 4px 16px rgba(15,23,42,0.03);
  transition: all 0.25s ease;
}
.tp-item-card:hover {
  border-color: #cbd5e1;
  box-shadow: 0 8px 24px rgba(11,37,69,0.08);
  transform: translateY(-2px);
}
.tp-logo-box {
  width: 140px;
  height: 85px;
  min-width: 140px;
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  box-shadow: 0 2px 8px rgba(15,23,42,0.04);
  overflow: hidden;
}
.tp-logo-box img {
  max-width: 100% !important;
  max-height: 100% !important;
  width: auto !important;
  height: auto !important;
  object-fit: contain;
}
.tp-download-btn {
  background: linear-gradient(135deg, #0b2545 0%, #1e4d8c 100%) !important;
  color: #ffffff !important;
  font-size: 0.85rem;
  font-weight: 700;
  padding: 10px 20px;
  border-radius: 10px;
  border: 1px solid rgba(245,158,11,0.35);
  text-decoration: none !important;
  display: inline-flex;
  align-items: center;
  gap: 8px;
  white-space: nowrap;
  box-shadow: 0 2px 6px rgba(11,37,69,0.15);
  transition: all 0.2s ease;
}
.tp-download-btn i {
  color: #fbbf24 !important;
}
.tp-download-btn:hover {
  background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%) !important;
  color: #ffffff !important;
  border-color: #d97706;
  box-shadow: 0 4px 12px rgba(217,119,6,0.35);
  transform: translateY(-1px);
}
.tp-visit-btn {
  background: #f8fafc;
  color: #0b2545 !important;
  border: 1px solid #cbd5e1;
  font-size: 0.85rem;
  font-weight: 700;
  padding: 10px 18px;
  border-radius: 10px;
  text-decoration: none !important;
  display: inline-flex;
  align-items: center;
  gap: 8px;
  white-space: nowrap;
  transition: all 0.2s ease;
}
.tp-visit-btn:hover {
  background: #0b2545;
  color: #ffffff !important;
  border-color: #0b2545;
  box-shadow: 0 4px 12px rgba(11,37,69,0.18);
}
.tp-badge-tag {
  background: rgba(245,158,11,0.12);
  color: #d97706;
  font-weight: 600;
  font-size: 0.78rem;
  padding: 4px 10px;
  border-radius: 6px;
  display: inline-block;
  margin-bottom: 6px;
}
</style>

<section class="subpage-main-section tp-partner-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="tp-partner-card">

          <!-- Header Banner -->
          <div class="tp-partner-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-handshake me-1"></i> Industry Collaborations
              </span>
              <h3 class="fw-bold text-white mb-1 fs-3">TRAINING PARTNERS</h3>
              <p class="text-white-50 mb-0 small">Our Valued Industrial &amp; Corporate Training Partners</p>
            </div>
          </div>

          <!-- Body Content -->
          <div class="p-4">

            <!-- 1. Main Industrial & Corporate Partners Banner -->
            <div class="tp-main-poster">
              <h5 class="fw-bold text-dark mb-3 text-start"><i class="fa-solid fa-building-columns text-warning me-2"></i>Valued Industrial &amp; Corporate Training Partners</h5>
              <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/WhatsApp_Image_2023-10-10_at_10.41.49_129a2bd1_10102023_0513.jpg" alt="SSSUTMS Training Partners Overview" class="img-fluid">
            </div>

            <!-- Section Heading -->
            <div class="d-flex align-items-center gap-2 mb-4 pb-2 border-bottom">
              <i class="fa-solid fa-award fs-4 text-warning"></i>
              <h4 class="fw-bold text-dark mb-0 fs-5">Key Institutional &amp; Sector Skill Council Partners</h4>
            </div>

            <!-- 2. Life Sciences Sector Skill Development Council (LSSSDC) -->
            <div class="tp-item-card">
              <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-3">
                <div class="d-flex align-items-center gap-3">
                  <div class="tp-logo-box">
                    <i class="fa-solid fa-dna fs-1 text-primary"></i>
                  </div>
                  <div>
                    <span class="tp-badge-tag">Government Sector Skill Council</span>
                    <h5 class="fw-bold text-dark mb-1 fs-6">LIFE SCIENCES SECTOR SKILL DEVELOPMENT COUNCIL (LSSSDC)</h5>
                    <p class="text-secondary small mb-0">Skill development, vocational certification, and industry alignment in pharmaceutical and life sciences sectors.</p>
                  </div>
                </div>
                <div class="flex-shrink-0 text-md-end ms-auto ms-md-0">
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/LFM-2022-94-Sri_Satya_Sai_University_of_Technology_and_Medical_Sciences___(1)_24032022_0516.pdf" target="_blank" rel="noopener" class="tp-download-btn">
                    <i class="fa-solid fa-file-pdf fs-6"></i>
                    <span>View Membership Document (PDF)</span>
                  </a>
                </div>
              </div>
            </div>

            <!-- 3. Logistics Sector Skill Council (LSC) -->
            <div class="tp-item-card">
              <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-3">
                <div class="d-flex align-items-center gap-3">
                  <div class="tp-logo-box">
                    <img src="<?php echo BASE_URL; ?>assets/images/partners/lsc.png" alt="Logistics Sector Skill Council">
                  </div>
                  <div>
                    <span class="tp-badge-tag">MSDE &amp; NSDC Govt. Initiative</span>
                    <h5 class="fw-bold text-dark mb-1 fs-6">LOGISTICS SECTOR SKILL COUNCIL (LSC)</h5>
                    <p class="text-secondary small mb-0">Established by the Ministry of Skill Development and Entrepreneurship (MSDE) through National Skill Development Corporation of India (NSDC).</p>
                  </div>
                </div>
              </div>
            </div>

            <!-- 4. Redwings Aerotechnique Pvt Ltd -->
            <div class="tp-item-card">
              <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-3">
                <div class="d-flex align-items-center gap-3">
                  <div class="tp-logo-box">
                    <img src="<?php echo BASE_URL; ?>assets/images/partners/REDWINGS LOGO.png" alt="Redwings Aerotechnique">
                  </div>
                  <div>
                    <span class="tp-badge-tag">DGCA (Govt. of India) Approved</span>
                    <h5 class="fw-bold text-dark mb-1 fs-6">REDWINGS AEROTECHNIQUE PVT LTD</h5>
                    <p class="text-secondary small mb-0">Aeronautical technical training, aircraft maintenance engineering, and aviation skills partner.</p>
                  </div>
                </div>
                <div class="flex-shrink-0 ms-auto ms-md-0">
                  <a href="https://www.redwingsgroup.org/" target="_blank" rel="noopener" class="tp-visit-btn">
                    <i class="fa-solid fa-arrow-up-right-from-square me-1"></i> Visit Official Site
                  </a>
                </div>
              </div>
            </div>

            <!-- 5. Pearson Education -->
            <div class="tp-item-card">
              <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-3">
                <div class="d-flex align-items-center gap-3">
                  <div class="tp-logo-box">
                    <img src="<?php echo BASE_URL; ?>assets/images/partners/image_9.png" alt="Pearson">
                  </div>
                  <div>
                    <span class="tp-badge-tag">Global Certification &amp; Testing</span>
                    <h5 class="fw-bold text-dark mb-1 fs-6">PEARSON VUE / PEARSON EDUCATION</h5>
                    <p class="text-secondary small mb-0">Authorized computer-based testing, assessments, and undergraduate entrance examination partner.</p>
                  </div>
                </div>
                <div class="flex-shrink-0 text-md-end ms-auto ms-md-0">
                  <a href="https://www.undergraduateexam.in/general/" target="_blank" rel="noopener" class="d-inline-block">
                    <img src="<?php echo BASE_URL; ?>assets/images/partners/image_10.png" alt="Pearson Undergraduate Exam Portal" class="rounded-3 border shadow-sm" style="max-height: 52px; width: auto;">
                  </a>
                </div>
              </div>
            </div>

          </div><!-- end p-4 -->

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