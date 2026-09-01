<?php
$page_title = 'Registrar - SSSUTMS';
$banner_title = 'Registrar';
$banner_category = 'About';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
.registrar-page-section {
  background-color: #f8fafc;
}
.registrar-profile-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
  overflow: hidden;
}
.registrar-card-header {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  padding: 1.5rem;
  color: #ffffff;
  position: relative;
}
.registrar-card-header::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #10b981, #34d399);
}
.registrar-img-container {
  position: relative;
  border-radius: 16px;
  overflow: hidden;
  box-shadow: 0 10px 20px rgba(11, 37, 69, 0.12);
  border: 4px solid #ffffff;
  background: #f1f5f9;
  transition: transform 0.3s ease;
}
.registrar-img-container:hover {
  transform: translateY(-3px);
}
.registrar-img-container img {
  width: 100%;
  max-height: 350px;
  object-fit: cover;
  object-position: top center;
  display: block;
}
.registrar-role-badge {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  padding: 5px 14px;
  background: #d1fae5;
  color: #065f46;
  font-weight: 700;
  font-size: 0.78rem;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  border-radius: 50px;
  border: 1px solid #a7f3d0;
}
.registrar-stat-chip {
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
.registrar-stat-chip:hover {
  background: #ffffff;
  border-color: #cbd5e1;
  box-shadow: 0 4px 12px rgba(0,0,0,0.04);
}
.registrar-stat-icon {
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
.registrar-paragraph-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 1.25rem 1.5rem;
  margin-bottom: 1rem;
  position: relative;
  transition: border-color 0.2s ease, box-shadow 0.2s ease;
}
.registrar-paragraph-card:hover {
  border-color: #cbd5e1;
  box-shadow: 0 4px 16px rgba(11, 37, 69, 0.04);
}
.registrar-paragraph-card h6 {
  font-size: 1.05rem;
  color: #0f172a;
}
.registrar-paragraph-card p {
  font-size: 0.95rem;
  line-height: 1.65;
  color: #334155;
}
.registrar-quote-banner {
  background: linear-gradient(135deg, #0b2545 0%, #1e3a8a 100%);
  color: #ffffff;
  border-radius: 12px;
  padding: 1.25rem 1.5rem;
  position: relative;
  overflow: hidden;
  box-shadow: 0 6px 18px rgba(11, 37, 69, 0.1);
}
.registrar-quote-banner i.quote-bg {
  position: absolute;
  right: -10px;
  bottom: -20px;
  font-size: 6rem;
  opacity: 0.08;
  color: #ffffff;
}
</style>

<section class="subpage-main-section registrar-page-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        
        <!-- Header Profile Card -->
        <div class="registrar-profile-card mb-4">
          <div class="p-4">
            <div class="row g-4 align-items-center">
              
              <!-- Registrar Image -->
              <div class="col-md-5 col-lg-4 text-center">
                <div class="registrar-img-container mb-3">
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/registrar_11042026_0812.jpg" target="_blank" rel="noopener" title="Click to view full image">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/registrar_11042026_0812.jpg" alt="Dr. Rajesh Sharma - Registrar, SSSUTMS" class="img-fluid" />
                  </a>
                </div>
                <span class="registrar-role-badge">
                  <i class="fa-solid fa-user-gear"></i> University Administration
                </span>
              </div>
              
              <!-- Quick Info / Bio Overview -->
              <div class="col-md-7 col-lg-8">
                <div class="ps-md-2">
                  <h3 class="fw-bold text-dark mb-1 fs-3">Dr. Rajesh Sharma</h3>
                  <p class="fs-6 fw-semibold text-primary mb-3">Registrar, SSSUTMS</p>
                  
                  <div class="registrar-quote-banner mb-3">
                    <i class="fa-solid fa-quote-right quote-bg"></i>
                    <p class="mb-0 small lh-base italic-text">
                      <i class="fa-solid fa-quote-left me-2 opacity-75"></i>
                      Committed to ensuring transparency, efficiency, and student-centric services across all administrative processes.
                    </p>
                  </div>

                  <!-- Highlights Grid -->
                  <div class="row g-2 align-items-stretch">
                    <div class="col-sm-6">
                      <div class="registrar-stat-chip h-100">
                        <div class="registrar-stat-icon">
                          <i class="fa-solid fa-chalkboard-user"></i>
                        </div>
                        <div>
                          <div class="fw-bold text-dark small">Department</div>
                          <div class="text-muted extra-small" style="font-size: 0.8rem;">Professor, Dept. of Management</div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="registrar-stat-chip h-100">
                        <div class="registrar-stat-icon">
                          <i class="fa-solid fa-shield-halved"></i>
                        </div>
                        <div>
                          <div class="fw-bold text-dark small">Focus Area</div>
                          <div class="text-muted extra-small" style="font-size: 0.8rem;">Transparency & Administrative Excellence</div>
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
        <div class="registrar-details-wrapper">
          
          <!-- Bio Paragraph -->
          <div class="registrar-paragraph-card">
            <div class="d-flex align-items-start gap-3">
              <div class="registrar-stat-icon mt-1">
                <i class="fa-solid fa-user-graduate"></i>
              </div>
              <div>
                <h6 class="fw-bold mb-2">Registrar Desk</h6>
                <p class="text-justify mb-0">
                  Dr. Rajesh Sharma, Professor in the Department of Management of Sri Satya Sai University of Technology and Medical Sciences, Sehore is erudite professor, motivational teacher, eminent researcher and excellent institute builder for better community life.
                </p>
              </div>
            </div>
          </div>

          <!-- Message Paragraph 1 -->
          <div class="registrar-paragraph-card">
            <div class="d-flex align-items-start gap-3">
              <div class="registrar-stat-icon mt-1">
                <i class="fa-solid fa-graduation-cap"></i>
              </div>
              <div>
                <h6 class="fw-bold mb-2">Academic Excellence & Empowerment</h6>
                <p class="text-justify mb-0">
                  Our University stands as a center of excellence dedicated to academic achievement, innovation, and holistic development. We are committed to providing a supportive and dynamic environment that empowers students to realize their full potential and prepares them to meet the challenges of a rapidly evolving world.
                </p>
              </div>
            </div>
          </div>

          <!-- Message Paragraph 2 -->
          <div class="registrar-paragraph-card">
            <div class="d-flex align-items-start gap-3">
              <div class="registrar-stat-icon mt-1">
                <i class="fa-solid fa-handshake"></i>
              </div>
              <div>
                <h6 class="fw-bold mb-2">Institutional Strength & Inclusiveness</h6>
                <p class="text-justify mb-0">
                  The strength of our institution lies in the dedication of our faculty, the enthusiasm of our students, and the unwavering support of all stakeholders. Together, we continue to uphold the values of integrity, inclusiveness, and excellence in all our endeavors.
                </p>
              </div>
            </div>
          </div>

          <!-- Message Paragraph 3 & 4 -->
          <div class="registrar-paragraph-card">
            <div class="d-flex align-items-start gap-3">
              <div class="registrar-stat-icon mt-1">
                <i class="fa-solid fa-building-columns"></i>
              </div>
              <div>
                <h6 class="fw-bold mb-2">Administrative Commitment & Vision</h6>
                <p class="text-justify mb-2">
                  As Registrar, I remain committed to ensuring transparency, efficiency, and student-centric services in all administrative processes.
                </p>
                <p class="text-justify mb-0">
                  We look forward to your continued association and contribution to the growth and success of the University.
                </p>
              </div>
            </div>
          </div>

          <!-- Signature Block -->
          <div class="registrar-paragraph-card bg-light border-0 shadow-sm">
            <div>
              <p class="fw-bold text-dark mb-1">Registrar,</p>
              <h5 class="fw-bold text-primary mb-0">Dr. Rajesh Sharma</h5>
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