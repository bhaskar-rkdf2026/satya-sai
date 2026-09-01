<?php
$page_title = 'NCC Activity - SSSUTMS';
$banner_title = 'Activity';
$banner_category = 'About';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
.activity-page-section {
  background-color: #f8fafc;
}
.activity-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
  overflow: hidden;
}
.activity-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2rem;
  position: relative;
}
.activity-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #2563eb, #3b82f6);
}
.activity-header-banner .btn-outline-light {
  border-color: rgba(255, 255, 255, 0.6);
  color: #ffffff !important;
  transition: all 0.25s ease;
}
.activity-header-banner .btn-outline-light:hover {
  background-color: #ffffff !important;
  color: #0b2545 !important;
  border-color: #ffffff !important;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}
.activity-section-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 16px;
  padding: 1.5rem;
  margin-bottom: 1.5rem;
  box-shadow: 0 4px 16px rgba(0,0,0,0.02);
}
.activity-table-custom {
  margin-bottom: 0;
}
.activity-table-custom thead th {
  background-color: #0b2545;
  color: #ffffff;
  font-weight: 600;
  text-transform: uppercase;
  font-size: 0.85rem;
  letter-spacing: 0.5px;
  border: none;
  padding: 12px 16px;
}
.activity-table-custom tbody tr:nth-child(even) {
  background-color: #f8fafc;
}
.activity-table-custom tbody td {
  padding: 12px 16px;
  vertical-align: middle;
  border-color: #e2e8f0;
  color: #334155;
  font-size: 0.92rem;
}

/* Equal Size Interactive Gallery Image Cards */
.activity-img-card {
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
.activity-img-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 10px 25px rgba(15, 23, 42, 0.12);
  border-color: #2563eb;
}
.activity-img-card img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center;
  transition: transform 0.4s ease;
}
.activity-img-card:hover img {
  transform: scale(1.05);
}
.activity-img-overlay {
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
.activity-img-card:hover .activity-img-overlay {
  opacity: 1;
}
</style>

<section class="subpage-main-section activity-page-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        
        <!-- Main Card Wrapper -->
        <div class="activity-main-card mb-4">
          
          <!-- Banner Header -->
          <div class="activity-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge bg-primary text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill">
                <i class="fa-solid fa-shield-halved me-1"></i> National Cadet Corps (NCC)
              </span>
              <h3 class="fw-bold text-white mb-0 fs-3">NCC CAMPS &amp; ACTIVITIES</h3>
            </div>
            <div>
              <a href="https://indiancc.nic.in/" target="_blank" rel="noopener" class="btn btn-outline-light rounded-pill px-3 py-2 fw-bold text-white fs-6">
                <i class="fa-solid fa-arrow-up-right-from-square me-1"></i> Official NCC Portal
              </a>
            </div>
          </div>

          <!-- Body Container -->
          <div class="p-4">
            
            <!-- Section 1: NCC Camps Table -->
            <div class="activity-section-card">
              <div class="d-flex align-items-center gap-3 mb-3">
                <div class="rounded-3 bg-primary bg-opacity-10 text-primary p-2 fs-5">
                  <i class="fa-solid fa-campground"></i>
                </div>
                <div>
                  <h5 class="fw-bold text-dark mb-0">NCC Camps Organized</h5>
                  <p class="text-secondary small mb-0">List of training, yoga, and annual cadet camps.</p>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table table-bordered align-middle activity-table-custom">
                  <thead>
                    <tr>
                      <th style="width: 70px;" class="text-center">S.No.</th>
                      <th style="width: 200px;">Date</th>
                      <th style="width: 200px;">Place</th>
                      <th>Type of Camp</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="text-center fw-bold">1</td>
                      <td>24/12/2024 - 02/01/2025</td>
                      <td>ITARSI</td>
                      <td>CATC</td>
                    </tr>
                    <tr>
                      <td class="text-center fw-bold">2</td>
                      <td>04/06/2024 - 04/06/2024</td>
                      <td>NCC OFFICE BHOPAL</td>
                      <td>WPN HANDLING PRACTIC</td>
                    </tr>
                    <tr>
                      <td class="text-center fw-bold">3</td>
                      <td>04/01/2023 - 14/01/2023</td>
                      <td>SAGAR</td>
                      <td>EBSB CAMP</td>
                    </tr>
                    <tr>
                      <td class="text-center fw-bold">4</td>
                      <td>08/08/2022 - 14/08/2022</td>
                      <td>SEHORE</td>
                      <td>आज़ादी का अमृत महोत्सव</td>
                    </tr>
                    <tr>
                      <td class="text-center fw-bold">5</td>
                      <td>14/01/2020 - 23/01/2020</td>
                      <td>BIRTS, Bhopal</td>
                      <td>PRE-TRDC Camp</td>
                    </tr>
                    <tr>
                      <td class="text-center fw-bold">6</td>
                      <td>14/06/2019 - 23/06/2019</td>
                      <td>Bhopal</td>
                      <td>Combined Annual Training Camp (CATC)</td>
                    </tr>
                    <tr>
                      <td class="text-center fw-bold">7</td>
                      <td>14/06/2018 - 23/06/2018</td>
                      <td>Bansal, Bhopal</td>
                      <td>Combined Annual Training Camp (Yoga)</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <!-- Section 2: NCC Activities Table -->
            <div class="activity-section-card">
              <div class="d-flex align-items-center gap-3 mb-3">
                <div class="rounded-3 bg-success bg-opacity-10 text-success p-2 fs-5">
                  <i class="fa-solid fa-flag"></i>
                </div>
                <div>
                  <h5 class="fw-bold text-dark mb-0">NCC Social &amp; National Activities</h5>
                  <p class="text-secondary small mb-0">Community welfare, awareness rallies, and national celebrations.</p>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table table-bordered align-middle activity-table-custom">
                  <thead>
                    <tr>
                      <th style="width: 70px;" class="text-center">S.No.</th>
                      <th style="width: 200px;">Date</th>
                      <th>Activity Name</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="text-center fw-bold">1</td>
                      <td>05/08/2024</td>
                      <td>शहीदो का सम्मान</td>
                    </tr>
                    <tr>
                      <td class="text-center fw-bold">2</td>
                      <td>29/06/2024</td>
                      <td>THALASSEMIA AWARENESS CAMPAIGN</td>
                    </tr>
                    <tr>
                      <td class="text-center fw-bold">3</td>
                      <td>21/06/2024</td>
                      <td>YOGA DAY</td>
                    </tr>
                    <tr>
                      <td class="text-center fw-bold">4</td>
                      <td>21/06/2023</td>
                      <td>YOGA DAY</td>
                    </tr>
                    <tr>
                      <td class="text-center fw-bold">5</td>
                      <td>23/03/2023</td>
                      <td>ADG VISIT</td>
                    </tr>
                    <tr>
                      <td class="text-center fw-bold">6</td>
                      <td>26/09/2022</td>
                      <td>NEW ENROLLMENT TEST</td>
                    </tr>
                    <tr>
                      <td class="text-center fw-bold">7</td>
                      <td>03/09/2022</td>
                      <td>पुनीत सागर अभियान</td>
                    </tr>
                    <tr>
                      <td class="text-center fw-bold">8</td>
                      <td>01/12/2019</td>
                      <td>World AIDS Day Celebration</td>
                    </tr>
                    <tr>
                      <td class="text-center fw-bold">9</td>
                      <td>25/08/2018</td>
                      <td>Plantation Drive</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <!-- Section 3: Photo Gallery Cards Grid (Equal Size Interactive Cards) -->
            <div class="activity-section-card mb-0">
              <div class="d-flex align-items-center gap-3 mb-3">
                <div class="rounded-3 bg-warning bg-opacity-10 text-warning p-2 fs-5">
                  <i class="fa-solid fa-images"></i>
                </div>
                <div>
                  <h5 class="fw-bold text-dark mb-0">NCC Activity Photo Showcase</h5>
                  <p class="text-secondary small mb-0">Click any image to view in high resolution.</p>
                </div>
              </div>

              <div class="row g-3">
                <div class="col-md-6 col-lg-4">
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/NCC1_15012025_0420.jpg" target="_blank" class="activity-img-card" title="Click for Full Size View">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/NCC1_15012025_0420.jpg" alt="NCC Photo 1" />
                    <div class="activity-img-overlay">
                      <i class="fa-solid fa-magnifying-glass-plus"></i> View Full Image
                    </div>
                  </a>
                </div>
                <div class="col-md-6 col-lg-4">
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/NCC2_15012025_0422.jpg" target="_blank" class="activity-img-card" title="Click for Full Size View">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/NCC2_15012025_0422.jpg" alt="NCC Photo 2" />
                    <div class="activity-img-overlay">
                      <i class="fa-solid fa-magnifying-glass-plus"></i> View Full Image
                    </div>
                  </a>
                </div>
                <div class="col-md-6 col-lg-4">
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/CAMP_15012025_0423.jpg" target="_blank" class="activity-img-card" title="Click for Full Size View">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/CAMP_15012025_0423.jpg" alt="NCC Camp Photo 1" />
                    <div class="activity-img-overlay">
                      <i class="fa-solid fa-magnifying-glass-plus"></i> View Full Image
                    </div>
                  </a>
                </div>
                <div class="col-md-6 col-lg-4">
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/41fe0aa0-a83a-4bdd-82a2-de115a594393_16012025_1247.jpg" target="_blank" class="activity-img-card" title="Click for Full Size View">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/41fe0aa0-a83a-4bdd-82a2-de115a594393_16012025_1247.jpg" alt="NCC Event Photo 1" />
                    <div class="activity-img-overlay">
                      <i class="fa-solid fa-magnifying-glass-plus"></i> View Full Image
                    </div>
                  </a>
                </div>
                <div class="col-md-6 col-lg-4">
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/IMG-20220810-WA0076_16012025_1248.jpg" target="_blank" class="activity-img-card" title="Click for Full Size View">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/IMG-20220810-WA0076_16012025_1248.jpg" alt="NCC Event Photo 2" />
                    <div class="activity-img-overlay">
                      <i class="fa-solid fa-magnifying-glass-plus"></i> View Full Image
                    </div>
                  </a>
                </div>
                <div class="col-md-6 col-lg-4">
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/CAMP2_15012025_0424.jpg" target="_blank" class="activity-img-card" title="Click for Full Size View">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/CAMP2_15012025_0424.jpg" alt="NCC Camp Photo 2" />
                    <div class="activity-img-overlay">
                      <i class="fa-solid fa-magnifying-glass-plus"></i> View Full Image
                    </div>
                  </a>
                </div>
                <div class="col-md-6 col-lg-4">
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/activity_base64_0.jpg" target="_blank" class="activity-img-card" title="Click for Full Size View">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/activity_base64_0.jpg" alt="NCC Group Photo" />
                    <div class="activity-img-overlay">
                      <i class="fa-solid fa-magnifying-glass-plus"></i> View Full Image
                    </div>
                  </a>
                </div>
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