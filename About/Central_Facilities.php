<?php
$page_title = 'Central Facilities - SSSUTMS';
$banner_title = 'Central Facilities';
$banner_category = 'About';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?>

<style>
.cf-page-section {
  background-color: #f8fafc;
}
.cf-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
  overflow: hidden;
}
.cf-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2rem;
  position: relative;
}
.cf-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #2563eb, #3b82f6);
}
.cf-facility-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 16px;
  padding: 1.5rem;
  margin-bottom: 1.5rem;
  box-shadow: 0 4px 16px rgba(0,0,0,0.02);
  transition: all 0.25s ease;
}
.cf-facility-card:hover {
  border-color: #cbd5e1;
  box-shadow: 0 8px 24px rgba(15, 23, 42, 0.06);
}
.cf-icon-wrapper {
  width: 44px;
  height: 44px;
  border-radius: 12px;
  background: rgba(37, 99, 235, 0.1);
  color: #2563eb;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.2rem;
  flex-shrink: 0;
}

/* Equal Size Interactive Gallery Image Cards */
.cf-img-card {
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
.cf-img-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 10px 25px rgba(15, 23, 42, 0.12);
  border-color: #2563eb;
}
.cf-img-card img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center;
  transition: transform 0.4s ease;
}
.cf-img-card:hover img {
  transform: scale(1.05);
}
.cf-img-overlay {
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
.cf-img-card:hover .cf-img-overlay {
  opacity: 1;
}
</style>

<section class="subpage-main-section cf-page-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        
        <!-- Main Card Wrapper -->
        <div class="cf-main-card mb-4">
          
          <!-- Banner Header -->
          <div class="cf-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge bg-primary text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill">
                <i class="fa-solid fa-building-columns me-1"></i> Campus Infrastructure
              </span>
              <h3 class="fw-bold text-white mb-0 fs-3">CENTRAL FACILITIES</h3>
            </div>
          </div>

          <!-- Body Container -->
          <div class="p-4">
            
            <!-- Facility 1: Dispensary -->
            <div class="cf-facility-card">
              <div class="d-flex align-items-center gap-3 mb-3">
                <div class="cf-icon-wrapper">
                  <i class="fa-solid fa-kit-medical"></i>
                </div>
                <div>
                  <h5 class="fw-bold text-dark mb-0">Dispensary &amp; Ambulance Care</h5>
                  <p class="text-secondary small mb-0">24/7 Medical Care &amp; On-Campus Health Services</p>
                </div>
              </div>
              <p class="text-slate-600 mb-3">
                The University has an on-campus dispensary equipped with dedicated ambulance support to facilitate students, staff, and faculty with immediate first-aid, minor treatment, and emergency health support.
              </p>
              <div class="row g-3">
                <div class="col-md-6">
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/cfaisility_08012025_0104.jpg" target="_blank" class="cf-img-card" title="Click for Full Size View">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/cfaisility_08012025_0104.jpg" alt="University Dispensary Facility" />
                    <div class="cf-img-overlay">
                      <i class="fa-solid fa-magnifying-glass-plus"></i> View Full Image
                    </div>
                  </a>
                </div>
                <div class="col-md-6">
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/c_f_08012025_0105.jpg" target="_blank" class="cf-img-card" title="Click for Full Size View">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/c_f_08012025_0105.jpg" alt="University Medical Care Unit" />
                    <div class="cf-img-overlay">
                      <i class="fa-solid fa-magnifying-glass-plus"></i> View Full Image
                    </div>
                  </a>
                </div>
              </div>
            </div>

            <!-- Facility 2: Central Library -->
            <div class="cf-facility-card">
              <div class="d-flex align-items-center gap-3 mb-3">
                <div class="cf-icon-wrapper">
                  <i class="fa-solid fa-book-bookmark"></i>
                </div>
                <div>
                  <h5 class="fw-bold text-dark mb-0">Central &amp; Institutional Libraries</h5>
                  <p class="text-secondary small mb-0">Digital Knowledge Hub &amp; Extensive Reference Resources</p>
                </div>
              </div>
              <p class="text-slate-600 mb-3">
                The University hosts 1 Central Library alongside 18 constituent institute libraries housing an extensive collection of reference books, textbooks, and national &amp; international research journals. All libraries are fully digitized with e-journal subscriptions for student research and academic excellence.
              </p>
              <div class="row g-3">
                <div class="col-12">
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/central_facility_base64_0.png" target="_blank" class="cf-img-card" title="Click for Full Size View">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/central_facility_base64_0.png" alt="Central Library Resource Hub" />
                    <div class="cf-img-overlay">
                      <i class="fa-solid fa-magnifying-glass-plus"></i> View Full Image
                    </div>
                  </a>
                </div>
              </div>
            </div>

            <!-- Facility 3: Play Grounds -->
            <div class="cf-facility-card">
              <div class="d-flex align-items-center gap-3 mb-3">
                <div class="cf-icon-wrapper">
                  <i class="fa-solid fa-futbol"></i>
                </div>
                <div>
                  <h5 class="fw-bold text-dark mb-0">Lush-Green Playgrounds &amp; Sports Complex</h5>
                  <p class="text-secondary small mb-0">Outdoor Sports Courts &amp; Student Athletic Arena</p>
                </div>
              </div>
              <p class="text-slate-600 mb-3">
                The University features two expansive, lush-green open sports grounds within the campus utilized for Cricket, Football, Baseball, Volleyball, and Basketball tournaments, as well as major university functions and cultural meets.
              </p>
              <div class="row g-3">
                <div class="col-md-6">
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/central_facility_base64_1.png" target="_blank" class="cf-img-card" title="Click for Full Size View">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/central_facility_base64_1.png" alt="Sports Playground Arena 1" />
                    <div class="cf-img-overlay">
                      <i class="fa-solid fa-magnifying-glass-plus"></i> View Full Image
                    </div>
                  </a>
                </div>
                <div class="col-md-6">
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/central_facility_base64_2.png" target="_blank" class="cf-img-card" title="Click for Full Size View">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/central_facility_base64_2.png" alt="Sports Playground Arena 2" />
                    <div class="cf-img-overlay">
                      <i class="fa-solid fa-magnifying-glass-plus"></i> View Full Image
                    </div>
                  </a>
                </div>
              </div>
            </div>

            <!-- Facility 4: Rain-Water Harvesting -->
            <div class="cf-facility-card">
              <div class="d-flex align-items-center gap-3 mb-3">
                <div class="cf-icon-wrapper">
                  <i class="fa-solid fa-cloud-rain"></i>
                </div>
                <div>
                  <h5 class="fw-bold text-dark mb-0">Rainwater Harvesting System</h5>
                  <p class="text-secondary small mb-0">Sustainable Eco-Friendly Natural Water Conservation</p>
                </div>
              </div>
              <p class="text-slate-600 mb-3">
                A rainwater harvesting network with 10 dedicated rain-water harvesters is established across the University campus, marking a major initiative toward groundwater recharge and natural resource conservation.
              </p>
              <div class="row g-3">
                <div class="col-md-6">
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/central_facility_base64_3.png" target="_blank" class="cf-img-card" title="Click for Full Size View">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/central_facility_base64_3.png" alt="Rainwater Harvester Unit 1" />
                    <div class="cf-img-overlay">
                      <i class="fa-solid fa-magnifying-glass-plus"></i> View Full Image
                    </div>
                  </a>
                </div>
                <div class="col-md-6">
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/central_facility_base64_4.png" target="_blank" class="cf-img-card" title="Click for Full Size View">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/central_facility_base64_4.png" alt="Rainwater Harvester Unit 2" />
                    <div class="cf-img-overlay">
                      <i class="fa-solid fa-magnifying-glass-plus"></i> View Full Image
                    </div>
                  </a>
                </div>
              </div>
            </div>

            <!-- Facility 5: Solar Power Plant -->
            <div class="cf-facility-card">
              <div class="d-flex align-items-center gap-3 mb-3">
                <div class="cf-icon-wrapper">
                  <i class="fa-solid fa-solar-panel"></i>
                </div>
                <div>
                  <h5 class="fw-bold text-dark mb-0">Grid-Connected Rooftop Solar Power Plant</h5>
                  <p class="text-secondary small mb-0">82.55 kWp Renewable Solar Energy Installation (RESCO Model)</p>
                </div>
              </div>
              <p class="text-slate-600 mb-2">
                Under the MP Urja Vikas Nigam Ltd. (MP Govt. undertaking) &amp; MNRE Govt. of India RESCO Scheme, Sri Satya Sai University operates an 82.55 kWp Rooftop Solar PV Plant producing clean, green energy for campus power needs at an economical tariff of &#8377;2.399 / Unit.
              </p>
              <ul class="text-slate-600 small mb-3 ps-3">
                <li><strong>Project Capacity:</strong> 82.55 kWp Grid-Connected Rooftop PV System</li>
                <li><strong>Central &amp; State Subsidy:</strong> &#8377;15,46,270/-</li>
                <li><strong>Tariff Rate:</strong> &#8377;2.399 / Unit</li>
                <li><strong>Date of Commissioning:</strong> 06/12/2019</li>
              </ul>
              <div class="row g-3">
                <div class="col-12">
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/central_facility_base64_5.png" target="_blank" class="cf-img-card" title="Click for Full Size View">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/central_facility_base64_5.png" alt="Solar Rooftop Plant Campus Installation" />
                    <div class="cf-img-overlay">
                      <i class="fa-solid fa-magnifying-glass-plus"></i> View Full Image
                    </div>
                  </a>
                </div>
              </div>
            </div>

            <!-- Facility 6: Waste Management -->
            <div class="cf-facility-card">
              <div class="d-flex align-items-center gap-3 mb-3">
                <div class="cf-icon-wrapper">
                  <i class="fa-solid fa-recycle"></i>
                </div>
                <div>
                  <h5 class="fw-bold text-dark mb-0">Campus Waste Management</h5>
                  <p class="text-secondary small mb-0">Green Campus Environmental Protection &amp; Waste Recycling</p>
                </div>
              </div>
              <p class="text-slate-600 mb-3">
                Comprehensive waste segregation, composting, and environmental preservation procedures are implemented to ensure a clean, eco-friendly, and sustainable Green Campus environment.
              </p>
              <div class="row g-3">
                <div class="col-12">
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/central_facility_base64_6.png" target="_blank" class="cf-img-card" title="Click for Full Size View">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/central_facility_base64_6.png" alt="Waste Management Installation" />
                    <div class="cf-img-overlay">
                      <i class="fa-solid fa-magnifying-glass-plus"></i> View Full Image
                    </div>
                  </a>
                </div>
              </div>
            </div>

            <!-- Facility 7: Bank & ATM -->
            <div class="cf-facility-card">
              <div class="d-flex align-items-center gap-3 mb-3">
                <div class="cf-icon-wrapper">
                  <i class="fa-solid fa-building-columns"></i>
                </div>
                <div>
                  <h5 class="fw-bold text-dark mb-0">On-Campus Nationalized Bank &amp; ATM</h5>
                  <p class="text-secondary small mb-0">Punjab National Bank (PNB) Branch &amp; 24/7 ATM Services</p>
                </div>
              </div>
              <p class="text-slate-600 mb-3">
                A full-fledged Punjab National Bank (PNB) branch along with 24/7 ATM facilities is located inside the University campus for convenient banking transactions for students, faculty, and staff.
              </p>
              <div class="row g-3">
                <div class="col-12">
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/central_facility_base64_7.png" target="_blank" class="cf-img-card" title="Click for Full Size View">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/central_facility_base64_7.png" alt="PNB Bank Branch &amp; ATM" />
                    <div class="cf-img-overlay">
                      <i class="fa-solid fa-magnifying-glass-plus"></i> View Full Image
                    </div>
                  </a>
                </div>
              </div>
            </div>

            <!-- Facility 8: Transportation -->
            <div class="cf-facility-card">
              <div class="d-flex align-items-center gap-3 mb-3">
                <div class="cf-icon-wrapper">
                  <i class="fa-solid fa-bus"></i>
                </div>
                <div>
                  <h5 class="fw-bold text-dark mb-0">University Fleet Transportation</h5>
                  <p class="text-secondary small mb-0">Safe &amp; Punctual Bus Services for Day-Scholars</p>
                </div>
              </div>
              <p class="text-slate-600 mb-3">
                A fleet of 25+ university buses covers key routes across Bhopal, Sehore, and nearby stations, providing comfortable and safe commuting for day-scholars and staff members.
              </p>
              <div class="row g-3">
                <div class="col-md-6">
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/central_facility_base64_8.png" target="_blank" class="cf-img-card" title="Click for Full Size View">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/central_facility_base64_8.png" alt="University Bus Fleet 1" />
                    <div class="cf-img-overlay">
                      <i class="fa-solid fa-magnifying-glass-plus"></i> View Full Image
                    </div>
                  </a>
                </div>
                <div class="col-md-6">
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/central_facility_base64_9.png" target="_blank" class="cf-img-card" title="Click for Full Size View">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/central_facility_base64_9.png" alt="University Bus Fleet 2" />
                    <div class="cf-img-overlay">
                      <i class="fa-solid fa-magnifying-glass-plus"></i> View Full Image
                    </div>
                  </a>
                </div>
              </div>
            </div>

            <!-- Facility 9: Modern Teaching Methods -->
            <div class="cf-facility-card">
              <div class="d-flex align-items-center gap-3 mb-3">
                <div class="cf-icon-wrapper">
                  <i class="fa-solid fa-chalkboard-user"></i>
                </div>
                <div>
                  <h5 class="fw-bold text-dark mb-0">Smart Classrooms &amp; Audio-Visual Teaching</h5>
                  <p class="text-secondary small mb-0">Interactive Digital Pedagogy in All Departments</p>
                </div>
              </div>
              <p class="text-slate-600 mb-3">
                To foster interactive learning and deep conceptual understanding, Smart Classrooms equipped with modern audio-visual aids and interactive digital boards are available across all faculties and departments.
              </p>
              <div class="row g-3">
                <div class="col-12">
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/central_facility_base64_10.png" target="_blank" class="cf-img-card" title="Click for Full Size View">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/central_facility_base64_10.png" alt="Smart Classroom AV Setup" />
                    <div class="cf-img-overlay">
                      <i class="fa-solid fa-magnifying-glass-plus"></i> View Full Image
                    </div>
                  </a>
                </div>
              </div>
            </div>

            <!-- Facility 10: Facilities for Differently-Abled -->
            <div class="cf-facility-card mb-0">
              <div class="d-flex align-items-center gap-3 mb-3">
                <div class="cf-icon-wrapper">
                  <i class="fa-solid fa-wheelchair"></i>
                </div>
                <div>
                  <h5 class="fw-bold text-dark mb-0">Facilities for Differently-Abled (Barrier-Free)</h5>
                  <p class="text-secondary small mb-0">Inclusive Ramps, Lifts, Tactile Paths &amp; Accessible Restrooms</p>
                </div>
              </div>
              <p class="text-slate-600 mb-3">
                Sri Satya Sai University provides a 100% barrier-free environment with architectural ramps, elevators, specially equipped restrooms, and wheelchair assistance across all academic blocks.
              </p>
              <div class="row g-3">
                <div class="col-md-6">
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/central_facility_base64_11.png" target="_blank" class="cf-img-card" title="Click for Full Size View">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/central_facility_base64_11.png" alt="Ramp &amp; Barrier Free Ramp Facility" />
                    <div class="cf-img-overlay">
                      <i class="fa-solid fa-magnifying-glass-plus"></i> View Full Image
                    </div>
                  </a>
                </div>
                <div class="col-md-6">
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/central_facility_base64_12.png" target="_blank" class="cf-img-card" title="Click for Full Size View">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/central_facility_base64_12.png" alt="Accessible Restroom &amp; Elevator" />
                    <div class="cf-img-overlay">
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
        <?php require_once __DIR__ . '/../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>