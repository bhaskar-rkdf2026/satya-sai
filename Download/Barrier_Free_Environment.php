<?php
$page_title = 'Barrier Free Environment - SSSUTMS';
$banner_title = 'Barrier Free Environment';
$banner_category = 'Download';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?>

<section class="subpage-main-section py-4 style="background-color: #f8fafc;"">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="content-card shadow-sm border-0 rounded-4 bg-white p-4 mb-4">
          
          <!-- Card Header -->
          <div class="d-flex flex-wrap justify-content-between align-items-center pb-3 mb-4 border-bottom">
            <div>
              <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-2 rounded-pill fw-semibold mb-2">
                <i class="fa fa-wheelchair me-1"></i> Campus Inclusivity &amp; Accessibility
              </span>
              <h3 class="fw-bold text-navy mb-1" style="color: #0b2545;">Barrier-Free &amp; Divyangjan-Friendly Campus</h3>
              <p class="text-muted small mb-0">Inclusive infrastructure, ramps, elevators, and assistive facilities for persons with disabilities.</p>
            </div>
            <div class="mt-2 mt-md-0">
              <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded-pill">
                <i class="fa fa-universal-access me-1"></i> RPwD Act Compliant
              </span>
            </div>
          </div>

          <!-- Policy Statement -->
          <div class="card border-0 rounded-4 p-4 mb-4" style="background: linear-gradient(135deg, #f0f7ff 0%, #e6f0fa 100%); border-left: 5px solid #0b2545 !important;">
            <h5 class="fw-bold text-navy mb-2" style="color: #0b2545;">Institutional Commitment to Accessibility</h5>
            <p class="small text-secondary mb-0">
              Sri Satya Sai University of Technology &amp; Medical Sciences is committed to providing equal educational opportunities and creating an inclusive, barrier-free physical and digital environment. 
              Our campus infrastructure conforms to the <strong>Harmonized Guidelines and Space Standards for Barrier Free Built Environment</strong> and the <strong>Rights of Persons with Disabilities (RPwD) Act, 2016</strong>.
            </p>
          </div>

          <!-- Key Barrier-Free Features -->
          <div class="row g-4 mb-4">
            
            <div class="col-md-6 col-lg-3">
              <div class="card h-100 border rounded-3 p-3 text-center hover-shadow transition">
                <div class="avatar-lg mx-auto mb-2 text-primary p-3 bg-primary-subtle rounded-circle d-inline-flex">
                  <i class="fa fa-person-walking-dashed-line-arrow-right fa-2x"></i>
                </div>
                <h6 class="fw-bold text-dark mb-1">Ramps &amp; Rails</h6>
                <p class="small text-muted mb-0">Gentle slope ramps with non-slip surfaces and double-tier handrails at all building entrances.</p>
              </div>
            </div>

            <div class="col-md-6 col-lg-3">
              <div class="card h-100 border rounded-3 p-3 text-center hover-shadow transition">
                <div class="avatar-lg mx-auto mb-2 text-success p-3 bg-success-subtle rounded-circle d-inline-flex">
                  <i class="fa fa-elevator fa-2x"></i>
                </div>
                <h6 class="fw-bold text-dark mb-1">Elevators / Lifts</h6>
                <p class="small text-muted mb-0">Spacious lifts with braille controls, voice annunciators, and emergency alarm buttons.</p>
              </div>
            </div>

            <div class="col-md-6 col-lg-3">
              <div class="card h-100 border rounded-3 p-3 text-center hover-shadow transition">
                <div class="avatar-lg mx-auto mb-2 text-warning p-3 bg-warning-subtle rounded-circle d-inline-flex">
                  <i class="fa fa-restroom fa-2x"></i>
                </div>
                <h6 class="fw-bold text-dark mb-1">Accessible Toilets</h6>
                <p class="small text-muted mb-0">Specially designed washrooms with wide doorways, grab bars, and low-height fixtures.</p>
              </div>
            </div>

            <div class="col-md-6 col-lg-3">
              <div class="card h-100 border rounded-3 p-3 text-center hover-shadow transition">
                <div class="avatar-lg mx-auto mb-2 text-danger p-3 bg-danger-subtle rounded-circle d-inline-flex">
                  <i class="fa fa-braille fa-2x"></i>
                </div>
                <h6 class="fw-bold text-dark mb-1">Assistive Devices</h6>
                <p class="small text-muted mb-0">Wheelchairs at campus entry gates, screen reading software in central library, and exam scribes.</p>
              </div>
            </div>

          </div>

          <!-- Campus Photographic Documentation -->
          <h5 class="fw-bold text-navy mb-3" style="color: #0b2545;">
            <i class="fa fa-camera text-primary me-2"></i>Photographic Evidence of Campus Infrastructure
          </h5>
          
          <div class="row g-4">
            
            <div class="col-md-6">
              <div class="card border rounded-3 overflow-hidden shadow-sm h-100">
                <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/DSC_0445_07012025_0447.jpg" alt="Wheelchair Accessible Ramp" class="img-fluid" style="height: 240px; width: 100%; object-fit: cover;">
                <div class="card-body p-3 style="background-color: #f8fafc;"">
                  <h6 class="fw-bold text-dark mb-1">Wheelchair Ramp &amp; Handrail System</h6>
                  <p class="small text-muted mb-0">Seamless ground-to-plinth access provided across administrative and academic buildings.</p>
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="card border rounded-3 overflow-hidden shadow-sm h-100">
                <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/Lift_(2)_08012025_0341.jpg" alt="Campus Elevator System" class="img-fluid" style="height: 240px; width: 100%; object-fit: cover;">
                <div class="card-body p-3 style="background-color: #f8fafc;"">
                  <h6 class="fw-bold text-dark mb-1">Passenger Elevators &amp; Vertical Transit</h6>
                  <p class="small text-muted mb-0">Multi-story blocks equipped with wide elevators for unhindered mobility between floors.</p>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card border rounded-3 overflow-hidden shadow-sm h-100">
                <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/disb3_08012025_1148.jpg" alt="Accessible Restroom" class="img-fluid" style="height: 200px; width: 100%; object-fit: cover;">
                <div class="card-body p-3 style="background-color: #f8fafc;"">
                  <h6 class="fw-bold text-dark mb-1">Divyangjan-Friendly Washroom</h6>
                  <p class="small text-muted mb-0">Support grab handles and anti-slip flooring.</p>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card border rounded-3 overflow-hidden shadow-sm h-100">
                <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/DEC01_(7)_07012025_0448.jpg" alt="Dedicated Accessible Entryway" class="img-fluid" style="height: 200px; width: 100%; object-fit: cover;">
                <div class="card-body p-3 style="background-color: #f8fafc;"">
                  <h6 class="fw-bold text-dark mb-1">Signages &amp; Walkways</h6>
                  <p class="small text-muted mb-0">Clear directional indicators and pathways.</p>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card border rounded-3 overflow-hidden shadow-sm h-100">
                <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/disb4_08012025_0453.jpg" alt="Specialized Restroom Facilities" class="img-fluid" style="height: 200px; width: 100%; object-fit: cover;">
                <div class="card-body p-3 style="background-color: #f8fafc;"">
                  <h6 class="fw-bold text-dark mb-1">Accessible Hygiene Facilities</h6>
                  <p class="small text-muted mb-0">Ergonomically placed fittings and low thresholds.</p>
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