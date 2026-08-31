<?php
$page_title = 'Vision & Mission - SSSUTMS';
$banner_title = 'Vision &amp; Mission';
$banner_category = 'About Us';
$banner_subtitle = 'The guiding philosophy, aspirations and commitment shaping education and societal empowerment at SSSUTMS.';

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
        
        <!-- Header Overview Card -->
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4 bg-white about-hero-card">
          <div class="p-4 p-md-5 position-relative about-hero-header">
            <span class="hm-label-pill mb-2"><i class="fa fa-compass me-1"></i> Institutional Purpose</span>
            <h2 class="section-title-v2 mb-3">Our <span class="text-gradient-accent">Vision &amp; Mission</span></h2>
            <p class="lead mb-0 text-secondary" style="font-size: 1.05rem; line-height: 1.8;">
              At <strong>Sri Satya Sai University of Technology &amp; Medical Sciences</strong>, our institutional compass is anchored in academic excellence, ethical grounding, cutting-edge research, and compassionate community outreach.
            </p>
          </div>
        </div>

        <div class="row g-4 mb-4">
          
          <!-- Vision Card -->
          <div class="col-md-6 d-flex">
            <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white flex-grow-1" style="border-top: 4px solid var(--accent) !important;">
              <div class="d-flex align-items-center gap-3 mb-4 pb-3 border-bottom">
                <div class="about-section-icon icon-amber">
                  <i class="fa fa-eye"></i>
                </div>
                <div>
                  <span class="text-uppercase fw-bold text-warning small letter-spacing-1">Future Aspirations</span>
                  <h3 class="section-title-v2 mb-0" style="font-size: 1.5rem;">Our Vision</h3>
                </div>
              </div>
              <div class="position-relative ps-3" style="border-left: 3px solid rgba(243,117,44,0.3);">
                <p class="lead text-dark mb-0 fst-italic" style="font-size: 1.1rem; line-height: 1.8; color: #1e293b;">
                  &ldquo;To emerge as World&rsquo;s one of the finest Universities in the field of Higher, Technical and Medical Education to develop Professionals who are Technically competent, ethically sensitive and environment friendly, for the betterment of society.&rdquo;
                </p>
              </div>
            </div>
          </div>

          <!-- Mission Card -->
          <div class="col-md-6 d-flex">
            <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white flex-grow-1" style="border-top: 4px solid var(--primary) !important;">
              <div class="d-flex align-items-center gap-3 mb-4 pb-3 border-bottom">
                <div class="about-section-icon icon-blue">
                  <i class="fa fa-bullseye"></i>
                </div>
                <div>
                  <span class="text-uppercase fw-bold text-primary small letter-spacing-1">Action &amp; Roadmap</span>
                  <h3 class="section-title-v2 mb-0" style="font-size: 1.5rem;">Our Mission</h3>
                </div>
              </div>
              <div class="position-relative ps-3" style="border-left: 3px solid rgba(11,37,69,0.3);">
                <p class="lead text-dark mb-0 fst-italic" style="font-size: 1.1rem; line-height: 1.8; color: #1e293b;">
                  &ldquo;Accomplish stimulating learning environment for students through quality teaching, research and outreach activity by providing state of the art facilities, industry exposure and guidance of dedicated faculty.&rdquo;
                </p>
              </div>
            </div>
          </div>

        </div>

        <!-- Quick Navigation Cards -->
        <div class="row g-3">
          <div class="col-md-4">
            <a href="<?php echo BASE_URL; ?>About/Background.php" class="about-nav-card text-decoration-none">
              <div class="d-flex align-items-center gap-3">
                <div class="nav-card-icon icon-blue">
                  <i class="fa fa-landmark"></i>
                </div>
                <div>
                  <h6 class="fw-bold text-dark mb-0">Background</h6>
                  <small class="text-muted">University evolution</small>
                </div>
              </div>
            </a>
          </div>
          <div class="col-md-4">
            <a href="<?php echo BASE_URL; ?>About/CoreValues.php" class="about-nav-card text-decoration-none">
              <div class="d-flex align-items-center gap-3">
                <div class="nav-card-icon icon-amber">
                  <i class="fa fa-gem"></i>
                </div>
                <div>
                  <h6 class="fw-bold text-dark mb-0">Core Values</h6>
                  <small class="text-muted">Institutional ethics</small>
                </div>
              </div>
            </a>
          </div>
          <div class="col-md-4">
            <a href="<?php echo BASE_URL; ?>About/Institutes.php" class="about-nav-card text-decoration-none">
              <div class="d-flex align-items-center gap-3">
                <div class="nav-card-icon icon-emerald">
                  <i class="fa fa-building-columns"></i>
                </div>
                <div>
                  <h6 class="fw-bold text-dark mb-0">Our Institutes</h6>
                  <small class="text-muted">14+ constituent units</small>
                </div>
              </div>
            </a>
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