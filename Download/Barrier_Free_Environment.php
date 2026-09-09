<?php
$page_title = 'Barrier Free Environment - SSSUTMS';
$banner_title = 'Barrier Free Environment & Divyangjan Facilities';
$banner_category = 'Download';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?>

<style>
.syl-card {
  background: #ffffff;
  border-radius: 16px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
  border: 1px solid #e2e8f0;
  overflow: hidden;
  margin-bottom: 2rem;
}
.syl-card-header {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 1.25rem 1.75rem;
  position: relative;
}
.syl-card-header::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.syl-card-title {
  font-size: 1.3rem;
  font-weight: 700;
  margin: 0;
  display: flex;
  align-items: center;
  gap: 12px;
  color: #ffffff;
}
.syl-card-body {
  padding: 1.75rem;
}
.syl-btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  background: #0b2545;
  color: #ffffff !important;
  font-weight: 700;
  font-size: 0.85rem;
  padding: 8px 18px;
  border-radius: 8px;
  text-decoration: none !important;
  transition: all 0.25s ease;
  box-shadow: 0 2px 6px rgba(11, 37, 69, 0.2);
  border: 1px solid #0b2545;
  white-space: nowrap;
}
.syl-btn:hover {
  background: #d97706;
  border-color: #d97706;
  color: #ffffff !important;
  transform: translateY(-2px);
  box-shadow: 0 6px 14px rgba(217, 119, 6, 0.35);
}
.facility-card {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  overflow: hidden;
  display: flex;
  flex-direction: column;
  height: 100%;
  transition: transform 0.25s ease, box-shadow 0.25s ease;
}
.facility-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
}
.facility-img-wrapper {
  position: relative;
  overflow: hidden;
  background: #e2e8f0;
  height: 240px;
}
.facility-img-wrapper img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.3s ease;
}
.facility-card:hover .facility-img-wrapper img {
  transform: scale(1.05);
}
.facility-badge {
  position: absolute;
  top: 12px;
  left: 12px;
  background: rgba(11, 37, 69, 0.85);
  backdrop-filter: blur(4px);
  color: #ffffff;
  padding: 4px 10px;
  border-radius: 6px;
  font-size: 0.75rem;
  font-weight: 600;
}
</style>

<section class="subpage-main-section py-4 bg-light">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="syl-card">
          <div class="syl-card-header">
            <h2 class="syl-card-title">
              <i class="fa fa-wheelchair text-warning"></i>
              Barrier Free Campus &amp; Divyangjan Accessibility Features
            </h2>
          </div>
          
          <div class="syl-card-body">
            <p class="text-secondary lead fs-6 mb-4">
              Sri Satya Sai University of Technology &amp; Medical Sciences is committed to providing an inclusive, accessible, and barrier-free learning environment for persons with disabilities (Divyangjan). All academic blocks, laboratories, libraries, administrative buildings, and hostels are equipped with barrier-free physical infrastructure.
            </p>

            <div class="row g-4 mb-4">
              
              <!-- 1. Ramps and Handrails -->
              <div class="col-md-6">
                <div class="facility-card">
                  <div class="facility-img-wrapper">
                    <span class="facility-badge"><i class="fa fa-person-walking-arrow-right me-1"></i> Physical Access</span>
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/DSC_0445_07012025_0447.jpg" alt="Ramps with Handrails">
                  </div>
                  <div class="p-3 d-flex flex-column justify-content-between flex-grow-1">
                    <div>
                      <h6 class="fw-bold text-dark mb-1">Ramps &amp; Non-Slip Walkways with Railings</h6>
                      <p class="text-secondary small mb-3">Smooth slope ramps and sturdy handrails at all building entrances for unobstructed wheelchair mobility.</p>
                    </div>
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/DSC_0445_07012025_0447.jpg" target="_blank" rel="noopener" class="syl-btn align-self-start">
                      <i class="fa fa-expand"></i> View Full Photo
                    </a>
                  </div>
                </div>
              </div>

              <!-- 2. Academic Block Access -->
              <div class="col-md-6">
                <div class="facility-card">
                  <div class="facility-img-wrapper">
                    <span class="facility-badge"><i class="fa fa-building-columns me-1"></i> Block Entrances</span>
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/DEC01_(7)_07012025_0448.jpg" alt="Academic Block Ramp Access">
                  </div>
                  <div class="p-3 d-flex flex-column justify-content-between flex-grow-1">
                    <div>
                      <h6 class="fw-bold text-dark mb-1">Dedicated Departmental Ramps</h6>
                      <p class="text-secondary small mb-3">Dedicated accessible ramps connecting classrooms, auditoriums, and administrative offices.</p>
                    </div>
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/DEC01_(7)_07012025_0448.jpg" target="_blank" rel="noopener" class="syl-btn align-self-start">
                      <i class="fa fa-expand"></i> View Full Photo
                    </a>
                  </div>
                </div>
              </div>

              <!-- 3. Accessible Signboards & Guidance -->
              <div class="col-md-6">
                <div class="facility-card">
                  <div class="facility-img-wrapper">
                    <span class="facility-badge"><i class="fa fa-signs-post me-1"></i> Signage</span>
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/disb3_08012025_1148.jpg" alt="Divyangjan Signage">
                  </div>
                  <div class="p-3 d-flex flex-column justify-content-between flex-grow-1">
                    <div>
                      <h6 class="fw-bold text-dark mb-1">Display Signage &amp; Tactile Paths</h6>
                      <p class="text-secondary small mb-3">High-contrast directional signboards, tactile pathways, and dedicated assistance counters.</p>
                    </div>
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/disb3_08012025_1148.jpg" target="_blank" rel="noopener" class="syl-btn align-self-start">
                      <i class="fa fa-expand"></i> View Full Photo
                    </a>
                  </div>
                </div>
              </div>

              <!-- 4. Elevators & Lifts -->
              <div class="col-md-6">
                <div class="facility-card">
                  <div class="facility-img-wrapper">
                    <span class="facility-badge"><i class="fa fa-elevator me-1"></i> Vertical Transit</span>
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/Lift_(2)_08012025_0341.jpg" alt="Wheelchair Accessible Elevators">
                  </div>
                  <div class="p-3 d-flex flex-column justify-content-between flex-grow-1">
                    <div>
                      <h6 class="fw-bold text-dark mb-1">Wheelchair-Friendly Elevators &amp; Lifts</h6>
                      <p class="text-secondary small mb-3">Spacious passenger lifts with low-height control panels and voice assistance across multi-story buildings.</p>
                    </div>
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Lift_(2)_08012025_0341.jpg" target="_blank" rel="noopener" class="syl-btn align-self-start">
                      <i class="fa fa-expand"></i> View Full Photo
                    </a>
                  </div>
                </div>
              </div>

              <!-- 5. Disabled Friendly Washrooms -->
              <div class="col-12">
                <div class="facility-card">
                  <div class="facility-img-wrapper" style="height: 280px;">
                    <span class="facility-badge"><i class="fa fa-restroom me-1"></i> Sanitation &amp; Restrooms</span>
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/disb4_08012025_0453.jpg" alt="Disabled Friendly Washroom">
                  </div>
                  <div class="p-3 d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div>
                      <h6 class="fw-bold text-dark mb-1">Special Disabled-Friendly Restrooms</h6>
                      <p class="text-secondary small mb-0">Specially designed washrooms with grab rails, wide doors, anti-skid flooring, and emergency assist bells.</p>
                    </div>
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/disb4_08012025_0453.jpg" target="_blank" rel="noopener" class="syl-btn">
                      <i class="fa fa-expand"></i> View Full Photo
                    </a>
                  </div>
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