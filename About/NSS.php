<?php
$page_title = 'NSS - National Service Scheme - SSSUTMS';
$banner_title = 'NSS';
$banner_category = 'About';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?>

<style>
.nss-page-section {
  background-color: #f8fafc;
}
.nss-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
  overflow: hidden;
}
.nss-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2rem;
  position: relative;
}
.nss-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #2563eb, #3b82f6);
}
.nss-content-box {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 16px;
  padding: 1.75rem;
  margin-bottom: 1.5rem;
  box-shadow: 0 4px 16px rgba(0,0,0,0.02);
}

/* Equal Size Interactive Gallery Image Cards */
.nss-img-card {
  position: relative;
  border-radius: 14px;
  overflow: hidden;
  border: 1px solid #e2e8f0;
  box-shadow: 0 4px 14px rgba(15, 23, 42, 0.05);
  background: #f8fafc;
  display: block;
  text-decoration: none;
  height: 260px;
  transition: all 0.3s ease;
}
.nss-img-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 10px 25px rgba(15, 23, 42, 0.12);
  border-color: #2563eb;
}
.nss-img-card img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center;
  transition: transform 0.4s ease;
}
.nss-img-card:hover img {
  transform: scale(1.05);
}
.nss-img-overlay {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(11, 37, 69, 0.65);
  display: flex;
  align-items: center;
  justify-content: center;
  opacity: 0;
  transition: opacity 0.3s ease;
  color: #ffffff;
  font-weight: 600;
  font-size: 0.9rem;
  gap: 8px;
}
.nss-img-card:hover .nss-img-overlay {
  opacity: 1;
}
</style>

<section class="subpage-main-section nss-page-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        
        <!-- Main Card Wrapper -->
        <div class="nss-main-card mb-4">
          
          <!-- Banner Header -->
          <div class="nss-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge bg-primary text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill">
                <i class="fa-solid fa-hands-holding-child me-1"></i> National Service Scheme
              </span>
              <h3 class="fw-bold text-white mb-0 fs-3">National Service Scheme (NSS)</h3>
            </div>
          </div>

          <!-- Body Container -->
          <div class="p-4">
            
            <!-- Exact Text Content Box -->
            <div class="nss-content-box">
              <h4 class="fw-bold text-dark mb-3 pb-2 border-bottom">National Service Scheme (NSS)</h4>
              
              <p class="text-dark fs-6 lh-base mb-3">
                National Service Scheme (NSS) is a Central Sector Scheme of Government of India, Ministry of Youth Affairs &amp; Sports,Rashtriya Seva Yojana celebrated World Environment Day with Jan Seva Mitras  Participate volenteers with program.
              </p>
              
              <p class="text-dark fs-6 lh-base mb-0">
                The 55th Foundation Day program of NSS was celebrated in the university by the NSS unit of Rashtriya Seva Yojana Sri Sathya Sai University of Technology and Medical Sciences, Pachama Sehore. Participate volenteers with program.
              </p>
            </div>

            <!-- Event 1: Gram Lasudiya Parihar Rally -->
            <div class="nss-content-box">
              <h5 class="fw-bold text-primary mb-3">
                <i class="fa-solid fa-person-walking-arrow-right me-2"></i>ग्राम लसूड़िया परिहार में जगरूकता रैली  (21/03/2023)
              </h5>
              <div class="row g-3">
                <div class="col-md-6 col-lg-4">
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/nss_base64_0.png" target="_blank" class="nss-img-card" title="Click for Full Size View">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/nss_base64_0.png" alt="NSS Event Photo 1" />
                    <div class="nss-img-overlay">
                      <i class="fa-solid fa-magnifying-glass-plus"></i> View Full Image
                    </div>
                  </a>
                </div>
                <div class="col-md-6 col-lg-4">
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/nss3_15012025_0344.jpg" target="_blank" class="nss-img-card" title="Click for Full Size View">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/nss3_15012025_0344.jpg" alt="NSS Event Photo 2" />
                    <div class="nss-img-overlay">
                      <i class="fa-solid fa-magnifying-glass-plus"></i> View Full Image
                    </div>
                  </a>
                </div>
                <div class="col-md-6 col-lg-4">
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/nss4_15012025_0342.jpg" target="_blank" class="nss-img-card" title="Click for Full Size View">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/nss4_15012025_0342.jpg" alt="NSS Event Photo 3" />
                    <div class="nss-img-overlay">
                      <i class="fa-solid fa-magnifying-glass-plus"></i> View Full Image
                    </div>
                  </a>
                </div>
                <div class="col-md-6 col-lg-4">
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/WhatsApp_Image_2025-01-15_at_15.29.48_4f9f1f2c_15012025_0346.jpg" target="_blank" class="nss-img-card" title="Click for Full Size View">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/WhatsApp_Image_2025-01-15_at_15.29.48_4f9f1f2c_15012025_0346.jpg" alt="NSS Event Photo 4" />
                    <div class="nss-img-overlay">
                      <i class="fa-solid fa-magnifying-glass-plus"></i> View Full Image
                    </div>
                  </a>
                </div>
                <div class="col-md-6 col-lg-4">
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/IMG-20250116-WA0076_16012025_0119.jpg" target="_blank" class="nss-img-card" title="Click for Full Size View">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/IMG-20250116-WA0076_16012025_0119.jpg" alt="NSS Rally Photo" />
                    <div class="nss-img-overlay">
                      <i class="fa-solid fa-magnifying-glass-plus"></i> View Full Image
                    </div>
                  </a>
                </div>
                <div class="col-md-6 col-lg-4">
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/IMG-20250116-WA0077_16012025_0120.jpg" target="_blank" class="nss-img-card" title="Click for Full Size View">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/IMG-20250116-WA0077_16012025_0120.jpg" alt="Lasudiya Parihar Rally Photo" />
                    <div class="nss-img-overlay">
                      <i class="fa-solid fa-magnifying-glass-plus"></i> View Full Image
                    </div>
                  </a>
                </div>
              </div>
            </div>

            <!-- Event 2: Nukkad Natak -->
            <div class="nss-content-box">
              <h5 class="fw-bold text-primary mb-3">
                <i class="fa-solid fa-masks-theater me-2"></i>गोदग्राम लसुड़िया परिहार में प्रदूषण के प्रति जागरुकता के लिए नुक्कड़ नाटक का आयोजन(05/04/2023)
              </h5>
              <div class="row g-3">
                <div class="col-md-6">
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/IMG-20250116-WA0074_16012025_0121.jpg" target="_blank" class="nss-img-card" title="Click for Full Size View">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/IMG-20250116-WA0074_16012025_0121.jpg" alt="Nukkad Natak Photo 1" />
                    <div class="nss-img-overlay">
                      <i class="fa-solid fa-magnifying-glass-plus"></i> View Full Image
                    </div>
                  </a>
                </div>
                <div class="col-md-6">
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/IMG-20250116-WA0069_16012025_0122.jpg" target="_blank" class="nss-img-card" title="Click for Full Size View">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/IMG-20250116-WA0069_16012025_0122.jpg" alt="Nukkad Natak Photo 2" />
                    <div class="nss-img-overlay">
                      <i class="fa-solid fa-magnifying-glass-plus"></i> View Full Image
                    </div>
                  </a>
                </div>
              </div>
            </div>

            <!-- Event 3: Talab Cleanliness -->
            <div class="nss-content-box">
              <h5 class="fw-bold text-primary mb-3">
                <i class="fa-solid fa-broom me-2"></i>तालाब की स्वच्छता अभियान
              </h5>
              <div class="row g-3">
                <div class="col-12">
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/IMG-20250116-WA0081_16012025_0123.jpg" target="_blank" class="nss-img-card" title="Click for Full Size View">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/IMG-20250116-WA0081_16012025_0123.jpg" alt="Pond Cleanliness Drive Photo" />
                    <div class="nss-img-overlay">
                      <i class="fa-solid fa-magnifying-glass-plus"></i> View Full Image
                    </div>
                  </a>
                </div>
              </div>
            </div>

            <!-- Event 4: Mental Health Awareness Rally -->
            <div class="nss-content-box mb-0">
              <h5 class="fw-bold text-primary mb-0">
                <i class="fa-solid fa-brain me-2"></i>मानसिक स्वास्थ्य जगरूकता रैली
              </h5>
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