<?php
$page_title = 'Exposition - SSSUTMS';
$banner_title = 'Exposition';
$banner_category = 'Research';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?>

<style>
.exp-section { background-color: #f8fafc; }
.exp-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15,23,42,0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}
.exp-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2.2rem 2rem;
  position: relative;
}
.exp-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.exp-stat-chip {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 16px 14px;
  display: flex; align-items: center; gap: 12px;
  height: 100%;
  transition: all 0.25s ease;
  box-shadow: 0 4px 12px rgba(0,0,0,0.02);
}
.exp-stat-chip:hover {
  border-color: #cbd5e1;
  box-shadow: 0 6px 18px rgba(11,37,69,0.07);
  transform: translateY(-2px);
}
.exp-stat-icon {
  width: 48px; height: 48px;
  border-radius: 12px;
  background: rgba(245,158,11,0.12);
  color: #d97706;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.35rem; flex-shrink: 0;
}
.exp-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 16px;
  padding: 1.5rem;
  box-shadow: 0 4px 16px rgba(0,0,0,0.02);
  margin-bottom: 1.75rem;
}
.exp-card-header {
  display: flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 1.2rem;
  padding-bottom: 0.85rem;
  border-bottom: 2px solid #f1f5f9;
}
.exp-card-header i {
  color: #f59e0b;
  font-size: 1.3rem;
}
.exp-feature-box {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 16px;
  transition: all 0.2s ease;
}
.exp-feature-box:hover {
  background: #ffffff;
  box-shadow: 0 4px 14px rgba(11,37,69,0.06);
}
</style>

<section class="subpage-main-section exp-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="exp-main-card">

          <!-- Header Banner -->
          <div class="exp-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-wand-magic-sparkles me-1"></i> Annual Student Innovation Fest
              </span>
              <h3 class="fw-bold text-white mb-1 fs-3">EXPOSITION: A CARNIVAL OF INNOVATION</h3>
              <p class="text-white-50 mb-0 small">Annual Mega Exhibition of Student Creativity, Robotics, Drones &amp; Project Innovations</p>
            </div>
          </div>

          <!-- Content Body -->
          <div class="p-4">

            <!-- Stat Chips -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-sm-6 col-md-3">
                <div class="exp-stat-chip">
                  <div class="exp-stat-icon"><i class="fa-solid fa-users"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Footfall</div>
                    <div class="fw-bold text-dark fs-6">20,000+ Students</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="exp-stat-chip">
                  <div class="exp-stat-icon"><i class="fa-solid fa-school"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Participation</div>
                    <div class="fw-bold text-dark fs-6">300+ Institutes</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="exp-stat-chip">
                  <div class="exp-stat-icon"><i class="fa-solid fa-store"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Display</div>
                    <div class="fw-bold text-dark fs-6">250+ Project Stalls</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="exp-stat-chip">
                  <div class="exp-stat-icon"><i class="fa-solid fa-robot"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Events</div>
                    <div class="fw-bold text-dark fs-6">Robo-War &amp; Drones</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- About Exposition Card -->
            <div class="exp-card">
              <div class="exp-card-header">
                <i class="fa-solid fa-fire text-warning"></i>
                <h5 class="fw-bold text-dark mb-0">The Legacy of Exposition</h5>
              </div>
              <div class="lh-lg text-dark" style="text-align: justify;">
                <p><strong>Exposition</strong> – The mega fest of energy and ideas of 20,000 students from more than 300 schools and colleges in Madhya Pradesh is hosted at the SSSUTMS University campus, Sehore. The seeds of Exposition were sown in the year 2017, and since then there has been no turning back.</p>

                <p>Exposition, as the name suggests, is an amalgamation of Creation and Exposure. Young minds use their inventiveness and fervor to create new projects that find solutions to real life issues. Exposition is fundamental to research innovation, economic vitality, and a healthy environment, rooted in inter-disciplinary efforts.</p>

                <p class="mb-0">Faculties and students from various schools and colleges of Madhya Pradesh participate in this three-day event, displaying projects covering science, technology, arts, law, and commerce.</p>
              </div>
            </div>

            <!-- Event Highlights Grid -->
            <div class="exp-card mb-0">
              <div class="exp-card-header">
                <i class="fa-solid fa-star text-warning"></i>
                <h5 class="fw-bold text-dark mb-0">Key Highlights of Exposition</h5>
              </div>

              <div class="row g-3">
                <div class="col-md-6">
                  <div class="exp-feature-box h-100">
                    <h6 class="fw-bold text-primary mb-2"><i class="fa-solid fa-masks-theater text-warning me-2"></i> Nukkad Nataks (Street Plays)</h6>
                    <p class="small text-muted mb-0">Street performances highlighting social causes like Beti Bachao Beti Padhao, harmful effects of plastic, ground water depletion, and pollution awareness.</p>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="exp-feature-box h-100">
                    <h6 class="fw-bold text-primary mb-2"><i class="fa-solid fa-robot text-warning me-2"></i> Robotics &amp; Robo-Wars</h6>
                    <p class="small text-muted mb-0">Action-packed competitions including Robo-War, Robo-Race, and autonomous robot challenges intriguing thousands of visitors.</p>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="exp-feature-box h-100">
                    <h6 class="fw-bold text-primary mb-2"><i class="fa-solid fa-plane text-warning me-2"></i> War of Wings &amp; Drone Competitions</h6>
                    <p class="small text-muted mb-0">Aerial drone racing, aerodynamic model testing, and aerial photography challenges showcasing cutting-edge drone technology.</p>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="exp-feature-box h-100">
                    <h6 class="fw-bold text-primary mb-2"><i class="fa-solid fa-lightbulb text-warning me-2"></i> Project Innovations &amp; Stalls</h6>
                    <p class="small text-muted mb-0">Over 250 interactive stalls featuring scientific prototypes, green energy solutions, and interdisciplinary engineering projects.</p>
                  </div>
                </div>
              </div>

              <div class="mt-4 p-3 bg-light border border-warning rounded-3 text-center">
                <h6 class="fw-bold text-dark mb-0"><i class="fa-solid fa-quote-left me-2 text-warning"></i> Exposition is in true sense the carnival of innovations. <i class="fa-solid fa-quote-right ms-2 text-warning"></i></h6>
              </div>
            </div>

          </div>
        </div><!-- end exp-main-card -->
      </div><!-- end col-lg-8 -->

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>