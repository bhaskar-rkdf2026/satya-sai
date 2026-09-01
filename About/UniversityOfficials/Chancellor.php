<?php
$page_title = 'Chancellor - SSSUTMS';
$banner_title = 'Chancellor';
$banner_category = 'About';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
.chancellor-page-section {
  background-color: #f8fafc;
}
.chancellor-profile-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
  overflow: hidden;
}
.chancellor-card-header {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  padding: 1.5rem;
  color: #ffffff;
  position: relative;
}
.chancellor-card-header::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #d97706, #f59e0b);
}
.chancellor-img-container {
  position: relative;
  border-radius: 16px;
  overflow: hidden;
  box-shadow: 0 10px 20px rgba(11, 37, 69, 0.12);
  border: 4px solid #ffffff;
  background: #f1f5f9;
  transition: transform 0.3s ease;
}
.chancellor-img-container:hover {
  transform: translateY(-3px);
}
.chancellor-img-container img {
  width: 100%;
  max-height: 350px;
  object-fit: cover;
  object-position: top center;
  display: block;
}
.chancellor-role-badge {
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
.chancellor-stat-chip {
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
.chancellor-stat-chip:hover {
  background: #ffffff;
  border-color: #cbd5e1;
  box-shadow: 0 4px 12px rgba(0,0,0,0.04);
}
.chancellor-stat-icon {
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
.chancellor-paragraph-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 1.25rem 1.5rem;
  margin-bottom: 1rem;
  position: relative;
  transition: border-color 0.2s ease, box-shadow 0.2s ease;
}
.chancellor-paragraph-card:hover {
  border-color: #cbd5e1;
  box-shadow: 0 4px 16px rgba(11, 37, 69, 0.04);
}
.chancellor-paragraph-card h6 {
  font-size: 1.05rem;
  color: #0f172a;
}
.chancellor-paragraph-card p {
  font-size: 0.95rem;
  line-height: 1.65;
  color: #334155;
}
.chancellor-quote-banner {
  background: linear-gradient(135deg, #0b2545 0%, #1e3a8a 100%);
  color: #ffffff;
  border-radius: 12px;
  padding: 1.25rem 1.5rem;
  position: relative;
  overflow: hidden;
  box-shadow: 0 6px 18px rgba(11, 37, 69, 0.1);
}
.chancellor-quote-banner i.quote-bg {
  position: absolute;
  right: -10px;
  bottom: -20px;
  font-size: 6rem;
  opacity: 0.08;
  color: #ffffff;
}
</style>

<section class="subpage-main-section chancellor-page-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        
        <!-- Header Profile Card -->
        <div class="chancellor-profile-card mb-4">
          <div class="p-4">
            <div class="row g-4 align-items-center">
              
              <!-- Chancellor Image -->
              <div class="col-md-5 col-lg-4 text-center">
                <div class="chancellor-img-container mb-3">
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/chancellor_17022025_1245.jpg" target="_blank" rel="noopener" title="Click to view full image">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/chancellor_17022025_1245.jpg" alt="Mr. Siddharth Kapoor - Chancellor, SSSUTMS" class="img-fluid" />
                  </a>
                </div>
                <span class="chancellor-role-badge">
                  <i class="fa-solid fa-user-tie"></i> University Leadership
                </span>
              </div>
              
              <!-- Quick Info / Bio Overview -->
              <div class="col-md-7 col-lg-8">
                <div class="ps-md-2">
                  <h3 class="fw-bold text-dark mb-1 fs-3">Mr. Siddharth Kapoor</h3>
                  <p class="fs-6 fw-semibold text-primary mb-3">Chancellor, SSSUTMS</p>
                  
                  <div class="chancellor-quote-banner mb-3">
                    <i class="fa-solid fa-quote-right quote-bg"></i>
                    <p class="mb-0 small lh-base italic-text">
                      <i class="fa-solid fa-quote-left me-2 opacity-75"></i>
                      Under his visionary guidance, Sri Satya Sai University continues to fulfill the dreams and aspirations of the young generation.
                    </p>
                  </div>

                  <!-- Highlights Grid -->
                  <div class="row g-2 align-items-stretch">
                    <div class="col-sm-6">
                      <div class="chancellor-stat-chip h-100">
                        <div class="chancellor-stat-icon">
                          <i class="fa-solid fa-graduation-cap"></i>
                        </div>
                        <div>
                          <div class="fw-bold text-dark small">Education</div>
                          <div class="text-muted extra-small" style="font-size: 0.8rem;">FMBA (SP Jain) | MBA (Temple Univ, USA)</div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="chancellor-stat-chip h-100">
                        <div class="chancellor-stat-icon">
                          <i class="fa-solid fa-briefcase"></i>
                        </div>
                        <div>
                          <div class="fw-bold text-dark small">Experience</div>
                          <div class="text-muted extra-small" style="font-size: 0.8rem;">14+ Years Educational Leadership</div>
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
        <div class="chancellor-details-wrapper">
          
          <!-- Paragraph 1 -->
          <div class="chancellor-paragraph-card">
            <div class="d-flex align-items-start gap-3">
              <div class="chancellor-stat-icon mt-1">
                <i class="fa-solid fa-university"></i>
              </div>
              <div>
                <h6 class="fw-bold mb-2">Academic Credentials & Background</h6>
                <p class="text-justify mb-0">
                  Young &amp; Dynamic Chancellor of <strong>Sri Satya Sai University of Technology &amp; Medical Sciences</strong>, Honourable Mr. Siddharth Kapoor holds a Degree in Family Management Business Administration (FMBA) from SP Jain, Mumbai. He also completed his Masters of Business Administration (Finance) from Temple University, Fox School of Business, Philadelphia, after earning his Bachelor of Business Administration (Finance) from the same institution.
                </p>
              </div>
            </div>
          </div>

          <!-- Paragraph 2 -->
          <div class="chancellor-paragraph-card">
            <div class="d-flex align-items-start gap-3">
              <div class="chancellor-stat-icon mt-1">
                <i class="fa-solid fa-chart-line"></i>
              </div>
              <div>
                <h6 class="fw-bold mb-2">Industry & Media Leadership</h6>
                <p class="text-justify mb-0">
                  Mr. Kapoor has been associated with the Largest Educational Group of Central India for the past 14 years and is also Project Head of Radio Popcorn. He has led analysis, design, and development of FM Station projects and is actively associated with Total Diagnosis Pvt. Ltd., Bhopal, for over a decade.
                </p>
              </div>
            </div>
          </div>

          <!-- Paragraph 3 -->
          <div class="chancellor-paragraph-card">
            <div class="d-flex align-items-start gap-3">
              <div class="chancellor-stat-icon mt-1">
                <i class="fa-solid fa-medal"></i>
              </div>
              <div>
                <h6 class="fw-bold mb-2">Professional Affiliations & Achievements</h6>
                <p class="text-justify mb-0">
                  He is an analyst of Financial Management and Accountancy Systems, a member of Ascend (SPO) &mdash; an association for Finance and Accounting Majors, and a member of SOS Village Society, one of India&rsquo;s largest societies for orphans. He has also qualified and won state-level swimming and football competitions.
                </p>
              </div>
            </div>
          </div>

          <!-- Paragraph 4 -->
          <div class="chancellor-paragraph-card">
            <div class="d-flex align-items-start gap-3">
              <div class="chancellor-stat-icon mt-1">
                <i class="fa-solid fa-award"></i>
              </div>
              <div>
                <h6 class="fw-bold mb-2">Gubernatorial Approval & Vision</h6>
                <p class="text-justify mb-0">
                  Honourable Governor of Madhya Pradesh Shri Ram Naresh Yadav approved the appointment of Shri Siddharth Kapoor as Chancellor of the University. Under his guidance, the University continues to fulfil the dreams and aspirations of the young generation.
                </p>
              </div>
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