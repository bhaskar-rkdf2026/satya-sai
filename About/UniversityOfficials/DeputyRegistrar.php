<?php
$page_title = 'Deputy Registrar - SSSUTMS';
$banner_title = 'Deputy Registrar';
$banner_category = 'About';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
.dr-page-section {
  background-color: #f8fafc;
}
.dr-profile-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
  overflow: hidden;
}
.dr-card-header {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  padding: 1.5rem;
  color: #ffffff;
  position: relative;
}
.dr-card-header::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #ec4899, #f472b6);
}
.dr-img-container {
  position: relative;
  border-radius: 16px;
  overflow: hidden;
  box-shadow: 0 10px 20px rgba(11, 37, 69, 0.12);
  border: 4px solid #ffffff;
  background: #f1f5f9;
  transition: transform 0.3s ease;
}
.dr-img-container:hover {
  transform: translateY(-3px);
}
.dr-img-container img {
  width: 100%;
  max-height: 350px;
  object-fit: cover;
  object-position: top center;
  display: block;
}
.dr-role-badge {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  padding: 5px 14px;
  background: #fce7f3;
  color: #9d174d;
  font-weight: 700;
  font-size: 0.78rem;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  border-radius: 50px;
  border: 1px solid #fbcfe8;
}
.dr-stat-chip {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 10px;
  padding: 10px 14px;
  display: flex;
  align-items: center;
  gap: 10px;
  height: 100%;
  transition: all 0.2s ease;
}
.dr-stat-chip:hover {
  background: #ffffff;
  border-color: #cbd5e1;
  box-shadow: 0 4px 12px rgba(0,0,0,0.04);
}
.dr-stat-icon {
  width: 36px;
  height: 36px;
  border-radius: 8px;
  background: rgba(11, 37, 69, 0.08);
  color: #0b2545;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1rem;
  flex-shrink: 0;
}
.dr-paragraph-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 1.25rem 1.5rem;
  margin-bottom: 1rem;
  position: relative;
  transition: border-color 0.2s ease, box-shadow 0.2s ease;
}
.dr-paragraph-card:hover {
  border-color: #cbd5e1;
  box-shadow: 0 4px 16px rgba(11, 37, 69, 0.04);
}
.dr-paragraph-card h6 {
  font-size: 1.05rem;
  color: #0f172a;
}
.dr-paragraph-card p {
  font-size: 0.95rem;
  line-height: 1.65;
  color: #334155;
}
.dr-quote-banner {
  background: linear-gradient(135deg, #0b2545 0%, #1e3a8a 100%);
  color: #ffffff;
  border-radius: 12px;
  padding: 1.25rem 1.5rem;
  position: relative;
  overflow: hidden;
  box-shadow: 0 6px 18px rgba(11, 37, 69, 0.1);
}
.dr-quote-banner i.quote-bg {
  position: absolute;
  right: -10px;
  bottom: -20px;
  font-size: 6rem;
  opacity: 0.08;
  color: #ffffff;
}
</style>

<section class="subpage-main-section dr-page-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        
        <!-- Header Profile Card -->
        <div class="dr-profile-card mb-4">
          <div class="p-4">
            <div class="row g-4 align-items-center">
              
              <!-- Deputy Registrar Image -->
              <div class="col-md-5 col-lg-4 text-center">
                <div class="dr-img-container mb-3">
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/WhatsApp_Image_2024-06-14_at_12.47.35_deae5da7_14062024_0132.jpg" target="_blank" rel="noopener" title="Click to view full image">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/WhatsApp_Image_2024-06-14_at_12.47.35_deae5da7_14062024_0132.jpg" alt="Dr. Kanchan Shrivastava - Deputy Registrar, SSSUTMS" class="img-fluid" />
                  </a>
                </div>
                <span class="dr-role-badge">
                  <i class="fa-solid fa-user-shield"></i> University Administration
                </span>
              </div>
              
              <!-- Quick Info / Bio Overview -->
              <div class="col-md-7 col-lg-8">
                <div class="ps-md-2">
                  <h3 class="fw-bold text-dark mb-1 fs-3">Dr. Kanchan Shrivastava</h3>
                  <p class="fs-6 fw-semibold text-primary mb-3">Deputy Registrar, SSSUTMS</p>
                  
                  <div class="dr-quote-banner mb-3">
                    <i class="fa-solid fa-quote-right quote-bg"></i>
                    <p class="mb-0 small lh-base italic-text">
                      <i class="fa-solid fa-quote-left me-2 opacity-75"></i>
                      Our objective is to improve standards to achieve excellence in higher education and provide high worth education filled with human values.
                    </p>
                  </div>

                  <!-- Highlights Grid -->
                  <div class="row g-2 align-items-stretch">
                    <div class="col-sm-6">
                      <div class="dr-stat-chip h-100">
                        <div class="dr-stat-icon">
                          <i class="fa-solid fa-graduation-cap"></i>
                        </div>
                        <div>
                          <div class="fw-bold text-dark small">Qualification</div>
                          <div class="text-muted extra-small" style="font-size: 0.8rem;">Ph.D. Economics (Bundelkhand Univ)</div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="dr-stat-chip h-100">
                        <div class="dr-stat-icon">
                          <i class="fa-solid fa-award"></i>
                        </div>
                        <div>
                          <div class="fw-bold text-dark small">Experience</div>
                          <div class="text-muted extra-small" style="font-size: 0.8rem;">Joined 2013 | Dean &amp; Admin Leader</div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>

            </div>
          </div>
        </div>

        <!-- Detailed Content Section -->
        <div class="dr-details-wrapper">
          
          <!-- Paragraph 1 -->
          <div class="dr-paragraph-card">
            <div class="d-flex align-items-start gap-3">
              <div class="dr-stat-icon mt-1">
                <i class="fa-solid fa-user-graduate"></i>
              </div>
              <div>
                <h6 class="fw-bold mb-2">Deputy Registrar Desk</h6>
                <p class="text-justify mb-0">
                  <strong>Dr. Kanchan Shrivastava</strong>, Deputy Registrar, joined this university in September 2013 and has been diligently working for the improvement and all-round development of the university. She was awarded Ph.D.(Economics) on 17 Feb 2003 by Bundelkhand UNIVERSITY, JHANSI (UP). Since long she has been a teacher and administrator par excellence. During her long-time experience stint as Dean,and Examination in charge, etc. She made her definitive mark and was able to transform the institutions wherever she worked.
                </p>
              </div>
            </div>
          </div>

          <!-- Paragraph 2 -->
          <div class="dr-paragraph-card">
            <div class="d-flex align-items-start gap-3">
              <div class="dr-stat-icon mt-1">
                <i class="fa-solid fa-handshake-angle"></i>
              </div>
              <div>
                <h6 class="fw-bold mb-2">Welcome &amp; Academic Excellence</h6>
                <p class="text-justify mb-0">
                  I welcome you all to Sri Satya Sai University of Technology and Medical Sciences (SSSUTMS), Sehore (M.P). My dear shining students already enrolled and many more aspirant meritorious on security policy violation, cordially invited to join one of the best University Campuses. Our objective is to improve the standards to achieve excellence in higher education and provide high worth education to students from different Countries, Religion, and Culture at economical fee.
                </p>
              </div>
            </div>
          </div>

          <!-- Paragraph 3 & 4 -->
          <div class="dr-paragraph-card">
            <div class="d-flex align-items-start gap-3">
              <div class="dr-stat-icon mt-1">
                <i class="fa-solid fa-chart-line"></i>
              </div>
              <div>
                <h6 class="fw-bold mb-2">Visionary Planning &amp; Campus Environment</h6>
                <p class="text-justify mb-2">
                  With the Management encouraging point of view and visionary planning and dynamism of our President, we envisage the University to steadily grow into a leading multi-disciplinary centre for advanced learning. Our earnest objective is to provide quality service to current and future students as well as faculty and staff.
                </p>
                <p class="text-justify mb-0">
                  I assure you that your life on campus as a student would be highly worthwhile regarding academic pursuit and filled with good human values.
                </p>
              </div>
            </div>
          </div>

          <!-- Signature Block -->
          <div class="dr-paragraph-card bg-light border-0 shadow-sm">
            <div>
              <p class="fw-bold text-dark mb-1">Deputy Registrar,</p>
              <h5 class="fw-bold text-primary mb-0">Dr. Kanchan Shrivastava</h5>
              <small class="text-muted">Sri Satya Sai University of Technology &amp; Medical Sciences</small>
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