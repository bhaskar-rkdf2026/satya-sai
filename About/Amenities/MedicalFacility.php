<?php
$page_title = 'Medical Facility - SSSUTMS';
$banner_title = 'Medical Facility';
$banner_category = 'About';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
.med-page-section {
  background-color: #f8fafc;
}
.med-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
  overflow: hidden;
}
.med-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2rem;
  position: relative;
}
.med-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #ef4444, #f87171);
}
.med-stat-chip {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 10px;
  padding: 12px 16px;
  display: flex;
  align-items: center;
  gap: 12px;
  height: 100%;
}
.med-stat-icon {
  width: 40px;
  height: 40px;
  border-radius: 10px;
  background: rgba(239, 68, 68, 0.1);
  color: #ef4444;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.15rem;
  flex-shrink: 0;
}
.med-info-box {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 1.5rem;
  box-shadow: 0 4px 16px rgba(0,0,0,0.02);
  margin-bottom: 1.25rem;
}
.med-img-card {
  border-radius: 16px;
  overflow: hidden;
  border: 1px solid #e2e8f0;
  box-shadow: 0 6px 20px rgba(0,0,0,0.06);
  height: 100%;
}
.med-img-card img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}
</style>

<section class="subpage-main-section med-page-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        
        <!-- Main Card Wrapper -->
        <div class="med-main-card mb-4">
          
          <!-- Banner Header -->
          <div class="med-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge bg-danger text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill">
                <i class="fa-solid fa-notes-medical me-1"></i> Campus Healthcare &amp; Wellness
              </span>
              <h3 class="fw-bold text-white mb-0 fs-3">MEDICAL &amp; HOSPITAL FACILITIES</h3>
            </div>
          </div>

          <!-- Body Container -->
          <div class="p-4">
            
            <!-- Highlights Grid -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-md-4">
                <div class="med-stat-chip">
                  <div class="med-stat-icon"><i class="fa-solid fa-hospital"></i></div>
                  <div>
                    <div class="fw-bold text-dark small">Hospital Facilities</div>
                    <div class="text-secondary small">OT, Labor Room, OPD &amp; IPD</div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="med-stat-chip">
                  <div class="med-stat-icon"><i class="fa-solid fa-kit-medical"></i></div>
                  <div>
                    <div class="fw-bold text-dark small">First-Aid Coverage</div>
                    <div class="text-secondary small">Colleges, Hostels, Buses &amp; Quarters</div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="med-stat-chip">
                  <div class="med-stat-icon"><i class="fa-solid fa-user-doctor"></i></div>
                  <div>
                    <div class="fw-bold text-dark small">Beneficiaries</div>
                    <div class="text-secondary small">Students, Staff &amp; Public</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Narrative Card 1 -->
            <div class="med-info-box">
              <div class="d-flex align-items-start gap-3">
                <div class="med-stat-icon mt-1">
                  <i class="fa-solid fa-truck-medical"></i>
                </div>
                <div>
                  <h5 class="fw-bold text-dark mb-2">Hospital Services &amp; Clinical Facilities</h5>
                  <p class="text-secondary lh-base text-justify mb-0" style="font-size: 0.95rem;">
                    Our University provides hospital facilities for the Staff, Student and Outsiders, that include OT, Labor Room, OPD and IPD Facilities.
                  </p>
                </div>
              </div>
            </div>

            <!-- Narrative Card 2 -->
            <div class="med-info-box">
              <div class="d-flex align-items-start gap-3">
                <div class="med-stat-icon mt-1">
                  <i class="fa-solid fa-suitcase-medical"></i>
                </div>
                <div>
                  <h5 class="fw-bold text-dark mb-2">Campus First-Aid Infrastructure</h5>
                  <p class="text-secondary lh-base text-justify mb-0" style="font-size: 0.95rem;">
                    First-aid kits are available in all Colleges, Hostel, Buses, Guest house, Staff quarter for primary treatment.
                  </p>
                </div>
              </div>
            </div>

            <!-- Photo Showcase Grid -->
            <h5 class="fw-bold text-dark mb-3"><i class="fa-solid fa-images text-danger me-2"></i>Medical Infrastructure Showcase</h5>
            <div class="row g-3">
              <div class="col-md-6">
                <div class="med-img-card">
                  <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/c_f_08012025_1227.jpg" alt="SSSUTMS Medical Center Facility 1" class="img-fluid" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="med-img-card">
                  <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/IMG_20231201_123819_08012025_1230.jpg" alt="SSSUTMS Medical Center Facility 2" class="img-fluid" />
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