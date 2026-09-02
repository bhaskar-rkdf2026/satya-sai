<?php
$page_title = 'Chief Vigilance Officer - SSSUTMS';
$banner_title = 'Chief Vigilance Officer';
$banner_category = 'About';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
.cvo-page-section {
  background-color: #f8fafc;
}
.cvo-profile-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
  overflow: hidden;
}
.cvo-card-header {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  padding: 1.5rem;
  color: #ffffff;
  position: relative;
}
.cvo-card-header::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #2563eb, #3b82f6);
}
.cvo-img-container {
  position: relative;
  border-radius: 16px;
  overflow: hidden;
  box-shadow: 0 10px 20px rgba(11, 37, 69, 0.12);
  border: 4px solid #ffffff;
  background: #f1f5f9;
  transition: transform 0.3s ease;
}
.cvo-img-container:hover {
  transform: translateY(-3px);
}
.cvo-img-container img {
  width: 100%;
  max-height: 350px;
  object-fit: cover;
  object-position: top center;
  display: block;
}
.cvo-role-badge {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  padding: 5px 14px;
  background: #dbeafe;
  color: #1e40af;
  font-weight: 700;
  font-size: 0.78rem;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  border-radius: 50px;
  border: 1px solid #bfdbfe;
}
.cvo-stat-chip {
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
.cvo-stat-chip:hover {
  background: #ffffff;
  border-color: #cbd5e1;
  box-shadow: 0 4px 12px rgba(0,0,0,0.04);
}
.cvo-stat-icon {
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
.cvo-paragraph-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 1.25rem 1.5rem;
  margin-bottom: 1rem;
  position: relative;
  transition: border-color 0.2s ease, box-shadow 0.2s ease;
}
.cvo-paragraph-card:hover {
  border-color: #cbd5e1;
  box-shadow: 0 4px 16px rgba(11, 37, 69, 0.04);
}
.cvo-paragraph-card h6 {
  font-size: 1.05rem;
  color: #0f172a;
}
.cvo-paragraph-card p {
  font-size: 0.95rem;
  line-height: 1.65;
  color: #334155;
}
.cvo-quote-banner {
  background: linear-gradient(135deg, #0b2545 0%, #1e3a8a 100%);
  color: #ffffff;
  border-radius: 12px;
  padding: 1.25rem 1.5rem;
  position: relative;
  overflow: hidden;
  box-shadow: 0 6px 18px rgba(11, 37, 69, 0.1);
}
.cvo-quote-banner i.quote-bg {
  position: absolute;
  right: -10px;
  bottom: -20px;
  font-size: 6rem;
  opacity: 0.08;
  color: #ffffff;
}
</style>

<section class="subpage-main-section cvo-page-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        
        <!-- Header Profile Card -->
        <div class="cvo-profile-card mb-4">
          <div class="p-4">
            <div class="row g-4 align-items-center">
              
              <!-- Chief Vigilance Officer Image -->
              <div class="col-md-5 col-lg-4 text-center">
                <div class="cvo-img-container mb-3">
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/cvo_raghuvanshi.png" target="_blank" rel="noopener" title="Click to view full image">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/cvo_raghuvanshi.png" alt="Mr. H. S. Raghuvanshi - Chief Vigilance Officer, SSSUTMS" class="img-fluid" />
                  </a>
                </div>
                <span class="cvo-role-badge">
                  <i class="fa-solid fa-user-shield"></i> Vigilance &amp; Security
                </span>
              </div>
              
              <!-- Quick Info / Bio Overview -->
              <div class="col-md-7 col-lg-8">
                <div class="ps-md-2">
                  <h3 class="fw-bold text-dark mb-1 fs-3">Mr. H. S. Raghuvanshi</h3>
                  <p class="fs-6 fw-semibold text-primary mb-3">Chief Vigilance Officer (CVO)</p>
                  
                  <div class="cvo-quote-banner mb-3">
                    <i class="fa-solid fa-quote-right quote-bg"></i>
                    <p class="mb-0 small lh-base italic-text">
                      <i class="fa-solid fa-quote-left me-2 opacity-75"></i>
                      Upholding institutional integrity, administrative vigilance, and high ethical standards across all university affairs.
                    </p>
                  </div>

                  <!-- Highlights Grid -->
                  <div class="row g-2 align-items-stretch">
                    <div class="col-sm-6">
                      <div class="cvo-stat-chip h-100">
                        <div class="cvo-stat-icon">
                          <i class="fa-solid fa-shield"></i>
                        </div>
                        <div>
                          <div class="fw-bold text-dark small">Background</div>
                          <div class="text-muted extra-small" style="font-size: 0.8rem;">Retd. DSP, Indore City Police</div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="cvo-stat-chip h-100">
                        <div class="cvo-stat-icon">
                          <i class="fa-solid fa-medal"></i>
                        </div>
                        <div>
                          <div class="fw-bold text-dark small">Honors</div>
                          <div class="text-muted extra-small" style="font-size: 0.8rem;">President's Police Medal Recipient</div>
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
        <div class="cvo-details-wrapper">
          
          <!-- Paragraph Card 1 -->
          <div class="cvo-paragraph-card">
            <div class="d-flex align-items-start gap-3">
              <div class="cvo-stat-icon mt-1">
                <i class="fa-solid fa-user-shield"></i>
              </div>
              <div>
                <h6 class="fw-bold mb-2">Chief Vigilance Officer</h6>
                <p class="text-justify mb-0">
                  <strong>Mr. H. S. Raghuvanshi</strong>, retired as an Deputy Superintendent of Police, Indore City, and served in various capacities in the police department, including Traffic police. During his tenure, he successfully completed specialized training programs. He has also performed high-profile duties, including assignments for the President, Prime Minister, and other international VVIPs. In recognition of his exemplary service; During the posting at the Police Training College, Indore, the Excellent Service Medal for 2021 was awarded by the Union Home Minister. He has been also awarded the President's Police Medal for his meritorious service during his entire tenure, which was presented by the Chief Minister of Madhya Pradesh on August 15, 2022, in Bhopal. and a total of 550 appreciation letter with cash reward. His entire service record is free from any punishments.
                </p>
              </div>
            </div>
          </div>

          <!-- Signature Block -->
          <div class="cvo-paragraph-card bg-light border-0 shadow-sm">
            <div>
              <p class="fw-bold text-dark mb-1">Chief Vigilance Officer,</p>
              <h5 class="fw-bold text-primary mb-0">Mr. H. S. Raghuvanshi</h5>
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