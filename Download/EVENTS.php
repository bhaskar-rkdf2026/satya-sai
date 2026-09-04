<?php
$page_title = 'University Events & Activities - SSSUTMS';
$banner_title = 'University Events';
$banner_category = 'Download';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';

// Fetch events from data/events.json if available
$events = function_exists('get_events') ? get_events(10) : [];
?>

<section class="subpage-main-section py-4 bg-light">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="content-card shadow-sm border-0 rounded-4 bg-white p-4 mb-4">
          
          <!-- Header Banner -->
          <div class="d-flex flex-wrap justify-content-between align-items-center pb-3 mb-4 border-bottom">
            <div>
              <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-2 rounded-pill fw-semibold mb-2">
                <i class="fa fa-calendar-check me-1"></i> Campus Life &amp; Highlights
              </span>
              <h3 class="fw-bold text-navy mb-1" style="color: #002B5B;">University Events &amp; Conclaves</h3>
              <p class="text-muted small mb-0">Academic symposiums, motivational masterclasses, youth festivals, and community outreach.</p>
            </div>
            <div class="mt-2 mt-md-0">
              <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded-pill">
                <i class="fa fa-award me-1"></i> Active Campus
              </span>
            </div>
          </div>

          <!-- Featured Event Spotlight: Dr. Vivek Bindra Masterclass -->
          <div class="card border-0 rounded-4 overflow-hidden mb-5 shadow-sm" style="background: linear-gradient(135deg, #002B5B 0%, #0d47a1 100%); color: #fff;">
            <div class="row g-0 align-items-center">
              <div class="col-md-5">
                <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/Vivek_Bindra_06052022_0354.jpg" 
                     alt="Dr. Vivek Bindra Campus-Preneur Masterclass" 
                     class="img-fluid w-100 h-100" 
                     style="object-fit: cover; min-height: 240px;">
              </div>
              <div class="col-md-7 p-4">
                <span class="badge bg-warning text-dark fw-bold mb-2">Featured Masterclass</span>
                <h4 class="fw-bold text-white mb-2">CAMPUS-PRENEUR Leadership Series</h4>
                <p class="text-white-50 small mb-3">
                  Delivered exclusively for students of Sri Satya Sai University of Technology &amp; Medical Sciences by renowned motivational speaker and business coach <strong>Dr. Vivek Bindra</strong>.
                </p>
                <div class="d-flex flex-wrap gap-2 text-white-50 small mb-3">
                  <span><i class="fa fa-location-dot text-warning me-1"></i> University Central Auditorium</span>
                  <span><i class="fa fa-users text-warning me-1"></i> 2,500+ Scholars Attended</span>
                </div>
                <a href="https://youtu.be/rxOK274A2SE" target="_blank" class="btn btn-warning rounded-pill px-4 py-2 text-dark fw-semibold shadow-sm">
                  <i class="fa fa-circle-play me-1"></i> Watch Video Session
                </a>
              </div>
            </div>
          </div>

          <!-- Events Category Grid -->
          <h5 class="fw-bold text-navy mb-3" style="color: #002B5B;">
            <i class="fa fa-star text-primary me-2"></i>Major University Events &amp; Highlights
          </h5>

          <div class="row g-4 mb-4">
            
            <!-- Event Card 1 -->
            <div class="col-md-6">
              <div class="card h-100 border rounded-4 p-3 shadow-sm hover-shadow transition">
                <div class="d-flex justify-content-between align-items-start mb-2">
                  <span class="badge bg-primary text-white">Annual Conclave</span>
                  <small class="text-muted"><i class="fa fa-calendar-day me-1"></i> Annual Series</small>
                </div>
                <h6 class="fw-bold text-dark mb-1">National Environmental Youth Forum</h6>
                <p class="small text-secondary mb-3">Inter-university youth symposium focusing on sustainable ecology, renewable energy research, and environmental conservation.</p>
                <a href="<?php echo BASE_URL; ?>Academic/Activities/Events.php" class="btn btn-sm btn-outline-primary rounded-pill mt-auto">
                  <i class="fa fa-images me-1"></i> View Event Summary
                </a>
              </div>
            </div>

            <!-- Event Card 2 -->
            <div class="col-md-6">
              <div class="card h-100 border rounded-4 p-3 shadow-sm hover-shadow transition">
                <div class="d-flex justify-content-between align-items-start mb-2">
                  <span class="badge bg-success text-white">Social Welfare</span>
                  <small class="text-muted"><i class="fa fa-calendar-day me-1"></i> Regular Camps</small>
                </div>
                <h6 class="fw-bold text-dark mb-1">Mega Blood Donation &amp; Free Medical Camp</h6>
                <p class="small text-secondary mb-3">Organized by SSSUTMS Paramedical &amp; Medical Sciences faculties in collaboration with district health authorities.</p>
                <a href="<?php echo BASE_URL; ?>Academic/Activities/Events.php" class="btn btn-sm btn-outline-primary rounded-pill mt-auto">
                  <i class="fa fa-images me-1"></i> View Event Summary
                </a>
              </div>
            </div>

            <!-- Event Card 3 -->
            <div class="col-md-6">
              <div class="card h-100 border rounded-4 p-3 shadow-sm hover-shadow transition">
                <div class="d-flex justify-content-between align-items-start mb-2">
                  <span class="badge bg-warning text-dark">Technical Fest</span>
                  <small class="text-muted"><i class="fa fa-calendar-day me-1"></i> National Meet</small>
                </div>
                <h6 class="fw-bold text-dark mb-1">Tech-O-Mania University Tech Fest</h6>
                <p class="small text-secondary mb-3">Hackathons, robotics championships, paper presentations, and code wars organized across Engineering &amp; Computer Science departments.</p>
                <a href="<?php echo BASE_URL; ?>Academic/Activities/Events.php" class="btn btn-sm btn-outline-primary rounded-pill mt-auto">
                  <i class="fa fa-images me-1"></i> View Event Summary
                </a>
              </div>
            </div>

            <!-- Event Card 4 -->
            <div class="col-md-6">
              <div class="card h-100 border rounded-4 p-3 shadow-sm hover-shadow transition">
                <div class="d-flex justify-content-between align-items-start mb-2">
                  <span class="badge bg-info text-white">Sports Olympiad</span>
                  <small class="text-muted"><i class="fa fa-calendar-day me-1"></i> Inter-Collegiate</small>
                </div>
                <h6 class="fw-bold text-dark mb-1">Spardha Annual University Sports Meet</h6>
                <p class="small text-secondary mb-3">Comprehensive athletic tournaments covering cricket, football, volleyball, athletics, badminton, and indoor championships.</p>
                <a href="<?php echo BASE_URL; ?>Academic/Activities/Events.php" class="btn btn-sm btn-outline-primary rounded-pill mt-auto">
                  <i class="fa fa-images me-1"></i> View Event Summary
                </a>
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