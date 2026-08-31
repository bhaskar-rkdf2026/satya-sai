<?php
$page_title = 'College of Pharmacy - SSSUTMS';
$banner_title = 'College of Pharmacy';
$banner_category = 'About';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?>

<section class="subpage-main-section py-4 bg-light">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="content-card">
          <div class="content-card-body">
            
            <div class="text-center mb-4">
              <h1 class="h2 fw-bold text-primary mb-2">College of Pharmacy</h1>
              <p class="lead text-secondary mb-0">Sri Satya Sai University of Technology and Medical Sciences</p>
              <hr class="my-4">
            </div>

            <!-- Principal & Message Card Grid -->
            <div class="row g-4 mb-4 align-items-stretch">
              
              <!-- Principal Card -->
              <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm rounded-4 text-center p-4 bg-white">
                  <div class="mb-3">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/WhatsApp_Image_2026-01-27_at_3.03.48_PM_28012026_1120.jpeg" alt="Principal" class="rounded-3 shadow-sm img-fluid" style="max-height: 220px; width: auto; object-fit: cover;">
                  </div>
                  <h5 class="fw-bold text-dark mb-1">Principal</h5>
                  <p class="text-muted small mb-0">College of Pharmacy</p>
                </div>
              </div>

              <!-- Principal Message -->
              <div class="col-md-8">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-4 p-md-4 bg-white">
                  <h4 class="fw-bold text-primary mb-3"><i class="fa fa-quote-left me-2 text-accent"></i> Message from the Principal</h4>
                  <p class="text-secondary mb-3" style="line-height: 1.7;">
                    Today the role of a college is not only to pursue academic excellence, but also to motivate and empower its students to be lifelong learners and productive members of an ever-changing global society.
                  </p>
                  <p class="text-secondary mb-3" style="line-height: 1.7;">
                    Our ambition is to ignite the flame of success so that future challenges can be encountered with motivation, determination, and commitment.
                  </p>
                  <p class="text-secondary mb-0" style="line-height: 1.7;">
                    We truly have a fantastic group with dedicated and highly skilled staff, excellent resources, strong infrastructure, and bright students to work with.
                  </p>
                </div>
              </div>

            </div>

            <!-- Courses Offered Card -->
            <div class="card border-0 shadow-sm rounded-4 p-4 mb-4 bg-white">
              <h4 class="fw-bold text-center text-primary mb-4"><i class="fa fa-graduation-cap me-2 text-accent"></i> Courses Offered</h4>
              <div class="row g-3">
                <div class="col-sm-6 col-lg-3">
                  <div class="p-3 border rounded-3 text-center bg-light h-100">
                    <h6 class="fw-bold text-dark mb-1">Bachelor of Pharmacy</h6>
                    <p class="text-muted small mb-0">B. Pharmacy</p>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                  <div class="p-3 border rounded-3 text-center bg-light h-100">
                    <h6 class="fw-bold text-dark mb-1">M. Pharmacy</h6>
                    <p class="text-muted small mb-0">Pharmacology</p>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                  <div class="p-3 border rounded-3 text-center bg-light h-100">
                    <h6 class="fw-bold text-dark mb-1">M. Pharmacy</h6>
                    <p class="text-muted small mb-0">Pharmaceutics</p>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                  <div class="p-3 border rounded-3 text-center bg-light h-100">
                    <h6 class="fw-bold text-dark mb-1">Research</h6>
                    <p class="text-muted small mb-0">Ph.D. Programs</p>
                  </div>
                </div>
              </div>
            </div>

            <!-- Campus Photos Grid -->
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
              <h4 class="fw-bold text-center text-primary mb-4"><i class="fa fa-images me-2 text-accent"></i> Campus &amp; Infrastructure</h4>
              <div class="row g-3 justify-content-center">
                <div class="col-md-4 col-sm-6">
                  <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/college_450_3_28012026_1140.jpg" alt="College Campus" class="img-fluid rounded-3 shadow-sm w-100" style="height: 220px; object-fit: cover;">
                </div>
                <div class="col-md-4 col-sm-6">
                  <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/college_450_2_28012026_1141.jpg" alt="College Building" class="img-fluid rounded-3 shadow-sm w-100" style="height: 220px; object-fit: cover;" onerror="this.src='<?php echo BASE_URL; ?>assets/images/Files/Link/college_450_3_28012026_1140.jpg'">
                </div>
                <div class="col-md-4 col-sm-6">
                  <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/college_450_1_28012026_1142.jpg" alt="College Facility" class="img-fluid rounded-3 shadow-sm w-100" style="height: 220px; object-fit: cover;">
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
