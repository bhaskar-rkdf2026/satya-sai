<?php
$page_title = 'Exam Controller - SSSUTMS';
$banner_title = 'Exam Controller';
$banner_category = 'About';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
.coe-page-section {
  background-color: #f8fafc;
}
.coe-profile-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
  overflow: hidden;
}
.coe-card-header {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  padding: 1.5rem;
  color: #ffffff;
  position: relative;
}
.coe-card-header::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #d97706, #f59e0b);
}
.coe-img-container {
  position: relative;
  border-radius: 16px;
  overflow: hidden;
  box-shadow: 0 10px 20px rgba(11, 37, 69, 0.12);
  border: 4px solid #ffffff;
  background: #f1f5f9;
  transition: transform 0.3s ease;
}
.coe-img-container:hover {
  transform: translateY(-3px);
}
.coe-img-container img {
  width: 100%;
  max-height: 350px;
  object-fit: cover;
  object-position: top center;
  display: block;
}
.coe-role-badge {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  padding: 5px 14px;
  background: #fef3c7;
  color: #92400e;
  font-weight: 700;
  font-size: 0.78rem;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  border-radius: 50px;
  border: 1px solid #fde68a;
}
.coe-stat-chip {
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
.coe-stat-chip:hover {
  background: #ffffff;
  border-color: #cbd5e1;
  box-shadow: 0 4px 12px rgba(0,0,0,0.04);
}
.coe-stat-icon {
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
.coe-paragraph-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 1.25rem 1.5rem;
  margin-bottom: 1rem;
  position: relative;
  transition: border-color 0.2s ease, box-shadow 0.2s ease;
}
.coe-paragraph-card:hover {
  border-color: #cbd5e1;
  box-shadow: 0 4px 16px rgba(11, 37, 69, 0.04);
}
.coe-paragraph-card h6 {
  font-size: 1.05rem;
  color: #0f172a;
}
.coe-paragraph-card p {
  font-size: 0.95rem;
  line-height: 1.65;
  color: #334155;
}
.coe-quote-banner {
  background: linear-gradient(135deg, #0b2545 0%, #1e3a8a 100%);
  color: #ffffff;
  border-radius: 12px;
  padding: 1.25rem 1.5rem;
  position: relative;
  overflow: hidden;
  box-shadow: 0 6px 18px rgba(11, 37, 69, 0.1);
}
.coe-quote-banner i.quote-bg {
  position: absolute;
  right: -10px;
  bottom: -20px;
  font-size: 6rem;
  opacity: 0.08;
  color: #ffffff;
}
</style>

<section class="subpage-main-section coe-page-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        
        <!-- Header Profile Card -->
        <div class="coe-profile-card mb-4">
          <div class="p-4">
            <div class="row g-4 align-items-center">
              
              <!-- Exam Controller Image -->
              <div class="col-md-5 col-lg-4 text-center">
                <div class="coe-img-container mb-3">
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/WhatsApp_Image_2024-10-26_at_16.09.30_4714b056_28102024_1200.jpg" target="_blank" rel="noopener" title="Click to view full image">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/WhatsApp_Image_2024-10-26_at_16.09.30_4714b056_28102024_1200.jpg" alt="(Prof) Dr. Sanjay Rathore - Controller of Examination, SSSUTMS" class="img-fluid" />
                  </a>
                </div>
                <span class="coe-role-badge">
                  <i class="fa-solid fa-file-signature"></i> Examination Cell
                </span>
              </div>
              
              <!-- Quick Info / Bio Overview -->
              <div class="col-md-7 col-lg-8">
                <div class="ps-md-2">
                  <h3 class="fw-bold text-dark mb-1 fs-3">(Prof) Dr. Sanjay Rathore</h3>
                  <p class="fs-6 fw-semibold text-primary mb-3">M.Sc, M.Phil (Physics), Ph.D | Controller of Examination</p>
                  
                  <div class="coe-quote-banner mb-3">
                    <i class="fa-solid fa-quote-right quote-bg"></i>
                    <p class="mb-0 small lh-base italic-text">
                      <i class="fa-solid fa-quote-left me-2 opacity-75"></i>
                      Ensuring administrative integrity, academic rigour, and fair evaluation standards across all university examinations.
                    </p>
                  </div>

                  <!-- Highlights Grid -->
                  <div class="row g-2 align-items-stretch">
                    <div class="col-sm-6">
                      <div class="coe-stat-chip h-100">
                        <div class="coe-stat-icon">
                          <i class="fa-solid fa-graduation-cap"></i>
                        </div>
                        <div>
                          <div class="fw-bold text-dark small">Qualification</div>
                          <div class="text-muted extra-small" style="font-size: 0.8rem;">B.Sc, M.Phil, Ph.D in Physics</div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="coe-stat-chip h-100">
                        <div class="coe-stat-icon">
                          <i class="fa-solid fa-clock-rotate-left"></i>
                        </div>
                        <div>
                          <div class="fw-bold text-dark small">Tenure</div>
                          <div class="text-muted extra-small" style="font-size: 0.8rem;">Controller of Exam Since 2014</div>
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
        <div class="coe-details-wrapper">
          
          <!-- Paragraph 1 -->
          <div class="coe-paragraph-card">
            <div class="d-flex align-items-start gap-3">
              <div class="coe-stat-icon mt-1">
                <i class="fa-solid fa-user-graduate"></i>
              </div>
              <div>
                <h6 class="fw-bold mb-2">Academic Standing &amp; Appointment</h6>
                <p class="text-justify mb-0">
                  Working as a controller of Examination Since 2014 <strong>Dr. Sanjay Kumar Rathore</strong> is presently the controller of examination. <strong>Dr. Rathore</strong> has good academic qualification that includes B.Sc (PCM) from Barkatullah University, M.Phil from Vinayak University and Ph.D in physics from Barkatullah University Bhopal.
                </p>
              </div>
            </div>
          </div>

          <!-- Paragraph 2 -->
          <div class="coe-paragraph-card">
            <div class="d-flex align-items-start gap-3">
              <div class="coe-stat-icon mt-1">
                <i class="fa-solid fa-atom"></i>
              </div>
              <div>
                <h6 class="fw-bold mb-2">Research &amp; Scholarly Contributions</h6>
                <p class="text-justify mb-0">
                  His area of research is Ionosphere and space Physics. He has published more than 30 papers in national and International Journals and participated in two NSSS organized by ISRO and other conferences of National and International.
                </p>
              </div>
            </div>
          </div>

          <!-- Paragraph 3 -->
          <div class="coe-paragraph-card">
            <div class="d-flex align-items-start gap-3">
              <div class="coe-stat-icon mt-1">
                <i class="fa-solid fa-list-check"></i>
              </div>
              <div>
                <h6 class="fw-bold mb-2">Examination Management Experience</h6>
                <p class="text-justify mb-0">
                  His examination related experience includes being center superintended at SSSIST Sehore of 10 year. Currently working as a Controller of Examination since 2014.
                </p>
              </div>
            </div>
          </div>

          <!-- Signature Block -->
          <div class="coe-paragraph-card bg-light border-0 shadow-sm">
            <div>
              <p class="fw-bold text-dark mb-1">Controller of Examination,</p>
              <h5 class="fw-bold text-primary mb-0">(Prof) Dr. Sanjay Rathore</h5>
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