<?php
$page_title = 'Guest House - SSSUTMS';
$banner_title = 'Guest House';
$banner_category = 'About';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
.gh-page-section {
  background-color: #f8fafc;
}
.gh-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
  overflow: hidden;
}
.gh-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2rem;
  position: relative;
}
.gh-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #d97706, #f59e0b);
}
.gh-stat-chip {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 10px;
  padding: 12px 16px;
  display: flex;
  align-items: center;
  gap: 12px;
  height: 100%;
}
.gh-stat-icon {
  width: 40px;
  height: 40px;
  border-radius: 10px;
  background: rgba(217, 119, 6, 0.1);
  color: #d97706;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.15rem;
  flex-shrink: 0;
}
.gh-info-box {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 1.5rem;
  box-shadow: 0 4px 16px rgba(0,0,0,0.02);
  margin-bottom: 1.5rem;
}
.gh-img-container {
  border-radius: 16px;
  overflow: hidden;
  border: 1px solid #e2e8f0;
  box-shadow: 0 6px 20px rgba(0,0,0,0.06);
}
.gh-img-container img {
  width: 100%;
  height: auto;
  display: block;
}
</style>

<section class="subpage-main-section gh-page-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        
        <!-- Main Card Wrapper -->
        <div class="gh-main-card mb-4">
          
          <!-- Banner Header -->
          <div class="gh-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge bg-warning text-dark fw-bold uppercase mb-2 px-3 py-2 rounded-pill">
                <i class="fa-solid fa-house-flag me-1"></i> Campus Hospitality &amp; Lodging
              </span>
              <h3 class="fw-bold text-white mb-0 fs-3">UNIVERSITY GUEST HOUSE</h3>
            </div>
          </div>

          <!-- Body Container -->
          <div class="p-4">
            
            <!-- Highlights Grid -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-md-4">
                <div class="gh-stat-chip">
                  <div class="gh-stat-icon"><i class="fa-solid fa-bed"></i></div>
                  <div>
                    <div class="fw-bold text-dark small">Hospitality</div>
                    <div class="text-secondary small">Visitor &amp; Parent Lodging</div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="gh-stat-chip">
                  <div class="gh-stat-icon"><i class="fa-solid fa-users"></i></div>
                  <div>
                    <div class="fw-bold text-dark small">Eligible Guests</div>
                    <div class="text-secondary small">Visitors &amp; Hostel Parents</div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="gh-stat-chip">
                  <div class="gh-stat-icon"><i class="fa-solid fa-user-check"></i></div>
                  <div>
                    <div class="fw-bold text-dark small">Permission</div>
                    <div class="text-secondary small">Granted by Hostel Warden</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Narrative Card -->
            <div class="gh-info-box">
              <div class="d-flex align-items-start gap-3">
                <div class="gh-stat-icon mt-1">
                  <i class="fa-solid fa-building-user"></i>
                </div>
                <div>
                  <h5 class="fw-bold text-dark mb-2">Guest House Amenities &amp; Policies</h5>
                  <p class="text-secondary lh-base text-justify mb-0" style="font-size: 0.95rem;">
                    A Guest House is available for visitors of the University as well parents of Hostel residents. For availing the benefits, permission is granted by Warden.
                  </p>
                </div>
              </div>
            </div>

            <!-- Photo Showcase Container -->
            <div class="gh-img-container">
              <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/guesthouse_facility.jpg" alt="SSSUTMS Guest House Facility" class="img-fluid" />
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