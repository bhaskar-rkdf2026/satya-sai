<?php
$page_title = 'Vice Chancellor - SSSUTMS';
$banner_title = 'Vice Chancellor';
$banner_category = 'About';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
.vc-page-section {
  background-color: #f8fafc;
}
.vc-profile-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
  overflow: hidden;
}
.vc-card-header {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  padding: 1.5rem;
  color: #ffffff;
  position: relative;
}
.vc-card-header::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #0284c7, #38bdf8);
}
.vc-img-container {
  position: relative;
  border-radius: 16px;
  overflow: hidden;
  box-shadow: 0 10px 20px rgba(11, 37, 69, 0.12);
  border: 4px solid #ffffff;
  background: #f1f5f9;
  transition: transform 0.3s ease;
}
.vc-img-container:hover {
  transform: translateY(-3px);
}
.vc-img-container img {
  width: 100%;
  max-height: 350px;
  object-fit: cover;
  object-position: top center;
  display: block;
}
.vc-role-badge {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  padding: 5px 14px;
  background: #e0f2fe;
  color: #0369a1;
  font-weight: 700;
  font-size: 0.78rem;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  border-radius: 50px;
  border: 1px solid #bae6fd;
}
.vc-stat-chip {
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
.vc-stat-chip:hover {
  background: #ffffff;
  border-color: #cbd5e1;
  box-shadow: 0 4px 12px rgba(0,0,0,0.04);
}
.vc-stat-icon {
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
.vc-paragraph-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 1.25rem 1.5rem;
  margin-bottom: 1rem;
  position: relative;
  transition: border-color 0.2s ease, box-shadow 0.2s ease;
}
.vc-paragraph-card:hover {
  border-color: #cbd5e1;
  box-shadow: 0 4px 16px rgba(11, 37, 69, 0.04);
}
.vc-paragraph-card h6 {
  font-size: 1.05rem;
  color: #0f172a;
}
.vc-paragraph-card p {
  font-size: 0.95rem;
  line-height: 1.65;
  color: #334155;
}
.vc-quote-banner {
  background: linear-gradient(135deg, #0b2545 0%, #1e3a8a 100%);
  color: #ffffff;
  border-radius: 12px;
  padding: 1.25rem 1.5rem;
  position: relative;
  overflow: hidden;
  box-shadow: 0 6px 18px rgba(11, 37, 69, 0.1);
}
.vc-quote-banner i.quote-bg {
  position: absolute;
  right: -10px;
  bottom: -20px;
  font-size: 6rem;
  opacity: 0.08;
  color: #ffffff;
}
</style>

<section class="subpage-main-section vc-page-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        
        <!-- Header Profile Card -->
        <div class="vc-profile-card mb-4">
          <div class="p-4">
            <div class="row g-4 align-items-center">
              
              <!-- VC Image -->
              <div class="col-md-5 col-lg-4 text-center">
                <div class="vc-img-container mb-3">
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/vc_sir_13052024_0517.jpg" target="_blank" rel="noopener" title="Click to view full image">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/vc_sir_13052024_0517.jpg" alt="Dr Mukesh Tiwari - Vice Chancellor, SSSUTMS" class="img-fluid" />
                  </a>
                </div>
                <span class="vc-role-badge">
                  <i class="fa-solid fa-user-graduate"></i> Executive Leadership
                </span>
              </div>
              
              <!-- Quick Info / Bio Overview -->
              <div class="col-md-7 col-lg-8">
                <div class="ps-md-2">
                  <h3 class="fw-bold text-dark mb-1 fs-3">Dr Mukesh Tiwari</h3>
                  <p class="fs-6 fw-semibold text-primary mb-3">Vice Chancellor, SSSUTMS</p>
                  
                  <div class="vc-quote-banner mb-3">
                    <i class="fa-solid fa-quote-right quote-bg"></i>
                    <p class="mb-0 small lh-base italic-text">
                      <i class="fa-solid fa-quote-left me-2 opacity-75"></i>
                      We continuously aspire to be a breeding ground for positive ideas, celebrating unity in diversity and nurturing scholars of high caliber.
                    </p>
                  </div>

                  <!-- Highlights Grid -->
                  <div class="row g-2 align-items-stretch">
                    <div class="col-sm-6">
                      <div class="vc-stat-chip h-100">
                        <div class="vc-stat-icon">
                          <i class="fa-solid fa-building-columns"></i>
                        </div>
                        <div>
                          <div class="fw-bold text-dark small">Established</div>
                          <div class="text-muted extra-small" style="font-size: 0.8rem;">Multi-Disciplinary Institution (Est. 2013)</div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="vc-stat-chip h-100">
                        <div class="vc-stat-icon">
                          <i class="fa-solid fa-award"></i>
                        </div>
                        <div>
                          <div class="fw-bold text-dark small">Focus Area</div>
                          <div class="text-muted extra-small" style="font-size: 0.8rem;">Teaching, Research & Nation Building</div>
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
        <div class="vc-details-wrapper">
          
          <!-- Paragraph 1 -->
          <div class="vc-paragraph-card">
            <div class="d-flex align-items-start gap-3">
              <div class="vc-stat-icon mt-1">
                <i class="fa-solid fa-university"></i>
              </div>
              <div>
                <h6 class="fw-bold mb-2">Message from VC&rsquo;s Desk</h6>
                <p class="text-justify mb-0">
                  Since its founding in 2013 by merging several multi-disciplinary institutions, <strong>Sri Satya Sai University of Technology and Medical Sciences, Sehore (MP)</strong> is acclaimed for its outstanding contribution to teaching, research, and service in nation building. Today, the University stands to meet the enormous aspirations and expectations of society. Society wants us to nurture professionals and scholars of high caliber, who can offer solutions to a broad range of issues. This requires excellence in teaching and research at par with the best in the world.
                </p>
              </div>
            </div>
          </div>

          <!-- Paragraph 2 -->
          <div class="vc-paragraph-card">
            <div class="d-flex align-items-start gap-3">
              <div class="vc-stat-icon mt-1">
                <i class="fa-solid fa-lightbulb"></i>
              </div>
              <div>
                <h6 class="fw-bold mb-2">Inclusivity, Values & Cultural Pluralism</h6>
                <p class="text-justify mb-0">
                  We continuously aspire to be a breeding ground for positive ideas and emerge as a symbol of openness of thoughts, cultural pluralism, and celebrating the unity in diversity of India. We endeavour to touch the lives of every student by inculcating prudence, efficiency, creativity, and compassion to work for the betterment of marginalized sections of society. We attempt to kindle their sense of responsibility, honesty, conscience, justice, and above all commitment to human values.
                </p>
              </div>
            </div>
          </div>

          <!-- Paragraph 3 -->
          <div class="vc-paragraph-card">
            <div class="d-flex align-items-start gap-3">
              <div class="vc-stat-icon mt-1">
                <i class="fa-solid fa-globe"></i>
              </div>
              <div>
                <h6 class="fw-bold mb-2">Digital Reach & Knowledge Expansion</h6>
                <p class="text-justify mb-0">
                  We aim to expand our reach to inaccessible regions through virtual presence and become a center of knowledge osmosis. We seek to empower every inquisitive soul with the best available human resources. We intend to intensify our endeavors to mobilize more resources and create a conducive ambience for our faculty, students, and staff to actualize their potential.
                </p>
              </div>
            </div>
          </div>

          <!-- Signature Block -->
          <div class="vc-paragraph-card bg-light border-0 shadow-sm">
            <div>
              <p class="fw-bold text-dark mb-1">Best Wishes,</p>
              <h5 class="fw-bold text-primary mb-0">Dr Mukesh Tiwari</h5>
              <small class="text-muted">Vice Chancellor, SSSUTMS</small>
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