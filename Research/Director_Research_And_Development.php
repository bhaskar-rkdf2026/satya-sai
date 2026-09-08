<?php
$page_title = 'Director (R&D) - SSSUTMS';
$banner_title = 'Director (R&D)';
$banner_category = 'Research';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?>

<style>
.rd-section { background-color: #f8fafc; }
.rd-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15,23,42,0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}
.rd-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2.2rem 2rem;
  position: relative;
}
.rd-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.rd-stat-chip {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 16px 14px;
  display: flex; align-items: center; gap: 12px;
  height: 100%;
  transition: all 0.25s ease;
  box-shadow: 0 4px 12px rgba(0,0,0,0.02);
}
.rd-stat-chip:hover {
  border-color: #cbd5e1;
  box-shadow: 0 6px 18px rgba(11,37,69,0.07);
  transform: translateY(-2px);
}
.rd-stat-icon {
  width: 48px; height: 48px;
  border-radius: 12px;
  background: rgba(245,158,11,0.12);
  color: #d97706;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.35rem; flex-shrink: 0;
}
.rd-profile-card {
  background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
  border: 1px solid #e2e8f0;
  border-radius: 16px;
  padding: 1.75rem;
  margin-bottom: 1.75rem;
}
.rd-director-img {
  width: 190px;
  height: 230px;
  object-fit: cover;
  border-radius: 14px;
  border: 4px solid #ffffff;
  box-shadow: 0 8px 20px rgba(11,37,69,0.12);
}
</style>

<section class="subpage-main-section rd-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="rd-main-card">

          <!-- Header Banner -->
          <div class="rd-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-flask-vial me-1"></i> Directorate of Research &amp; Development
              </span>
              <h3 class="fw-bold text-white mb-1 fs-3">DIRECTOR (R&amp;D) MESSAGE</h3>
              <p class="text-white-50 mb-0 small">Fostering Scientific Excellence, Academic Research &amp; Innovation Partnerships</p>
            </div>
          </div>

          <!-- Content Body -->
          <div class="p-4">

            <!-- Stat Chips -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-sm-6 col-md-3">
                <div class="rd-stat-chip">
                  <div class="rd-stat-icon"><i class="fa-solid fa-newspaper"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Publications</div>
                    <div class="fw-bold text-dark fs-6">1500+ Papers</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="rd-stat-chip">
                  <div class="rd-stat-icon"><i class="fa-solid fa-microscope"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Focus</div>
                    <div class="fw-bold text-dark fs-6">Multi-Disciplinary</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="rd-stat-chip">
                  <div class="rd-stat-icon"><i class="fa-solid fa-handshake-simple"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Linkages</div>
                    <div class="fw-bold text-dark fs-6">Industry MoUs</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="rd-stat-chip">
                  <div class="rd-stat-icon"><i class="fa-solid fa-award"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Programs</div>
                    <div class="fw-bold text-dark fs-6">Ph.D. &amp; FDPs</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Profile Banner Card -->
            <div class="rd-profile-card d-flex align-items-center flex-column flex-md-row gap-4">
              <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/h.k.SHARMA_05042022_1258.jpg" alt="Dr. Hemant Kumar Sharma" class="rd-director-img">
              <div>
                <span class="badge bg-primary px-3 py-1 mb-2 fw-bold">Director (R &amp; D)</span>
                <h4 class="fw-bold text-dark mb-1">Dr. Hemant Kumar Sharma</h4>
                <p class="text-muted small mb-3"><i class="fa-solid fa-building-columns me-1 text-warning"></i> Sri Satya Sai University of Technology &amp; Medical Sciences</p>
                <p class="text-dark mb-0 fs-6 lh-base" style="text-align: justify;">
                  "Our endeavor is to make our system effective and sensitive to the requirements of all stakeholders by undertaking collaborations with industry and fostering engineering, pharmacy, science, and medical research as an integral part of quality education."
                </p>
              </div>
            </div>

            <!-- Detailed Message Body -->
            <div class="lh-lg text-dark" style="text-align: justify;">
              <p>Sri Satya Sai University of Technology and Medical Sciences (SSSUTMS) is a multi-disciplinary University comprising various disciplines of Technology as well as Medical Sciences, established in 2013 to offer quality education among the deserving youth of India and abroad.</p>

              <p>It has immense Research potential, as evident from the spontaneous Research activities performed by the Students and the Faculties. So far more than 1500 Research Papers have been published by research aspirants in reputed Foreign and Indian Journals. We intend to form an R &amp; D unit of International standing by striving continuously in pursuit of excellence in education, research, entrepreneurship, technology implementation, and other related fields for the services of society. We promise to provide high quality education in all our Constituent schools/units of our University from undergraduate to doctoral levels through a creative balance of academic, professional, as well as extracurricular programs.</p>

              <p>The SSSUTMS Research and Development Cell operates with an objective to promote research activities among faculty members to achieve academic excellence. In our endeavor to make our system effective and sensitive to the requirements of all stakeholders, we undertake collaboration with industry to foster Engineering, Pharmacy, Science, and Medical research which is an integral part of quality education.</p>

              <p class="mb-0">We conduct research-oriented workshops, seminars, and development programs to augment the quality of research being conducted by various faculties of SSSUTMS.</p>
            </div>

          </div>
        </div><!-- end rd-main-card -->
      </div><!-- end col-lg-8 -->

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>