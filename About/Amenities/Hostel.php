<?php
$page_title = 'Hostel - SSSUTMS';
$banner_title = 'Hostel';
$banner_category = 'About';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
.hs-page-section {
  background-color: #f8fafc;
}
.hs-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
  overflow: hidden;
}
.hs-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2rem;
  position: relative;
}
.hs-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #2563eb, #3b82f6);
}
.hs-stat-chip {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 10px;
  padding: 12px 16px;
  display: flex;
  align-items: center;
  gap: 12px;
  height: 100%;
}
.hs-stat-icon {
  width: 40px;
  height: 40px;
  border-radius: 10px;
  background: rgba(37, 99, 235, 0.1);
  color: #2563eb;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.15rem;
  flex-shrink: 0;
}
.hs-info-box {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 1.5rem;
  box-shadow: 0 4px 16px rgba(0,0,0,0.02);
  margin-bottom: 1.25rem;
}
.hs-img-container {
  border-radius: 16px;
  overflow: hidden;
  border: 1px solid #e2e8f0;
  box-shadow: 0 6px 20px rgba(0,0,0,0.06);
}
.hs-img-container img {
  width: 100%;
  height: auto;
  display: block;
}
</style>

<section class="subpage-main-section hs-page-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        
        <!-- Main Card Wrapper -->
        <div class="hs-main-card mb-4">
          
          <!-- Banner Header -->
          <div class="hs-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge bg-primary text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill">
                <i class="fa-solid fa-hotel me-1"></i> Residential Campus Life
              </span>
              <h3 class="fw-bold text-white mb-0 fs-3">HOSTEL ACCOMMODATION</h3>
            </div>
          </div>

          <!-- Body Container -->
          <div class="p-4">
            
            <!-- Highlights Grid -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-md-4">
                <div class="hs-stat-chip">
                  <div class="hs-stat-icon"><i class="fa-solid fa-person-shelter"></i></div>
                  <div>
                    <div class="fw-bold text-dark small">Boys Hostel</div>
                    <div class="text-secondary small">Capacity: 252 Students</div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="hs-stat-chip">
                  <div class="hs-stat-icon"><i class="fa-solid fa-person-dress-burst"></i></div>
                  <div>
                    <div class="fw-bold text-dark small">Girls Hostel</div>
                    <div class="text-secondary small">Capacity: 100 Girls</div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="hs-stat-chip">
                  <div class="hs-stat-icon"><i class="fa-solid fa-utensils"></i></div>
                  <div>
                    <div class="fw-bold text-dark small">Dining &amp; Mess</div>
                    <div class="text-secondary small">Cooperative Mess &amp; AC Rooms</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Narrative Card 1 -->
            <div class="hs-info-box">
              <div class="d-flex align-items-start gap-3">
                <div class="hs-stat-icon mt-1">
                  <i class="fa-solid fa-house-user"></i>
                </div>
                <div>
                  <h5 class="fw-bold text-dark mb-2">In-Campus Residential Facilities</h5>
                  <p class="text-secondary lh-base text-justify mb-0" style="font-size: 0.95rem;">
                    For resident students a boy&rsquo;s hostel and a girl&rsquo;s hostel is available in the campus. Each Hostel is self-contained with amenities such as a reading room, an indoor games room, a lounge and a dining hall with mess, a computer room and TV in common room. The Board for Hostel Management coordinates the various hostel activities. At present, Boys Hostel has capacity of accommodating 252 students and Girls Hostel has capacity of 100 girls. The mess of both Hostels is run on cooperative basis. Provision of separate rooms with air-conditioners is available.
                  </p>
                </div>
              </div>
            </div>

            <!-- Narrative Card 2 -->
            <div class="hs-info-box">
              <div class="d-flex align-items-start gap-3">
                <div class="hs-stat-icon mt-1">
                  <i class="fa-solid fa-user-shield"></i>
                </div>
                <div>
                  <h5 class="fw-bold text-dark mb-2">Hostel Administration &amp; Governance</h5>
                  <p class="text-secondary lh-base text-justify mb-0" style="font-size: 0.95rem;">
                    For the working of hostels, representatives from the hostels take decisions on all policies of common interest. The administrative head of each hostel is Warden, who is a faculty member.
                  </p>
                </div>
              </div>
            </div>

            <!-- Photo Showcase Container -->
            <div class="hs-img-container">
              <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/hostel_facility.jpg" alt="SSSUTMS Hostel Facility" class="img-fluid" />
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