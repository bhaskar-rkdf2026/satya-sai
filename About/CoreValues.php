<?php
$page_title = 'Core Values - SSSUTMS';
$banner_title = 'Core Values';
$banner_category = 'About';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?>

<style>
.cv-page-section {
  background-color: #f8fafc;
}
.cv-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
  overflow: hidden;
}
.cv-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2rem;
  position: relative;
}
.cv-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #059669, #10b981);
}
.cv-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 16px;
  padding: 1.5rem;
  height: 100%;
  box-shadow: 0 4px 16px rgba(0,0,0,0.02);
  transition: all 0.25s ease;
}
.cv-card:hover {
  transform: translateY(-3px);
  box-shadow: 0 8px 24px rgba(15, 23, 42, 0.07);
}
.cv-card-blue { border-top: 4px solid #0284c7; }
.cv-card-amber { border-top: 4px solid #d97706; }
.cv-card-emerald { border-top: 4px solid #059669; }

.cv-icon-blue {
  width: 42px; height: 42px; border-radius: 10px;
  background: rgba(2, 132, 199, 0.1); color: #0284c7;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.1rem; flex-shrink: 0;
}
.cv-icon-amber {
  width: 42px; height: 42px; border-radius: 10px;
  background: rgba(217, 119, 6, 0.1); color: #d97706;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.1rem; flex-shrink: 0;
}
.cv-icon-emerald {
  width: 42px; height: 42px; border-radius: 10px;
  background: rgba(5, 150, 105, 0.1); color: #059669;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.1rem; flex-shrink: 0;
}

.cv-nav-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 1rem 1.25rem;
  transition: all 0.2s ease;
  text-decoration: none;
  display: block;
}
.cv-nav-card:hover {
  border-color: #cbd5e1;
  box-shadow: 0 4px 12px rgba(0,0,0,0.05);
  transform: translateY(-2px);
}
</style>

<section class="subpage-main-section cv-page-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        
        <!-- Main Card Wrapper -->
        <div class="cv-main-card mb-4">
          
          <!-- Banner Header -->
          <div class="cv-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge bg-success text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill">
                <i class="fa-solid fa-gem me-1"></i> Ethical Foundations
              </span>
              <h3 class="fw-bold text-white mb-0 fs-3">INSTITUTIONAL CORE VALUES</h3>
            </div>
          </div>

          <!-- Body Container -->
          <div class="p-4">
            
            <!-- Intro Paragraph -->
            <p class="text-secondary lh-base mb-4" style="font-size: 0.98rem;">
              The culture of <strong>Sri Satya Sai University of Technology &amp; Medical Sciences</strong> is rooted in nine foundational values that cultivate character, professional competence, and social commitment among all stakeholders.
            </p>

            <!-- 9 Core Values Grid -->
            <div class="row g-4 mb-4">

              <!-- 1. Discipline -->
              <div class="col-md-6 col-xl-4 d-flex">
                <div class="cv-card cv-card-blue flex-grow-1">
                  <div class="d-flex align-items-center gap-3 mb-3">
                    <div class="cv-icon-blue"><i class="fa-solid fa-shield-halved"></i></div>
                    <h5 class="fw-bold text-dark mb-0 fs-6">1. Discipline</h5>
                  </div>
                  <p class="text-secondary mb-0 small lh-base">
                    It is the practice of training people to obey rules or a code of behaviour, using punishment to correct disobedience.
                  </p>
                </div>
              </div>

              <!-- 2. Punctuality -->
              <div class="col-md-6 col-xl-4 d-flex">
                <div class="cv-card cv-card-amber flex-grow-1">
                  <div class="d-flex align-items-center gap-3 mb-3">
                    <div class="cv-icon-amber"><i class="fa-solid fa-clock-rotate-left"></i></div>
                    <h5 class="fw-bold text-dark mb-0 fs-6">2. Punctuality &amp; Time</h5>
                  </div>
                  <p class="text-secondary mb-0 small lh-base">
                    We promote punctuality and Time Management among Stake Holders.
                  </p>
                </div>
              </div>

              <!-- 3. Freedom of Thought -->
              <div class="col-md-6 col-xl-4 d-flex">
                <div class="cv-card cv-card-emerald flex-grow-1">
                  <div class="d-flex align-items-center gap-3 mb-3">
                    <div class="cv-icon-emerald"><i class="fa-solid fa-dove"></i></div>
                    <h5 class="fw-bold text-dark mb-0 fs-6">3. Freedom of Thought</h5>
                  </div>
                  <p class="text-secondary mb-0 small lh-base">
                    We believe that Freedom of Thought and Expression is necessary, as without this overall development of individual cannot be completed.
                  </p>
                </div>
              </div>

              <!-- 4. Honesty & Integrity -->
              <div class="col-md-6 col-xl-4 d-flex">
                <div class="cv-card cv-card-blue flex-grow-1">
                  <div class="d-flex align-items-center gap-3 mb-3">
                    <div class="cv-icon-blue"><i class="fa-solid fa-handshake-angle"></i></div>
                    <h5 class="fw-bold text-dark mb-0 fs-6">4. Honesty &amp; Integrity</h5>
                  </div>
                  <p class="text-secondary mb-0 small lh-base">
                    We are committed to practices that are fair, honest and objective in dealing with students, faculty members, staff and stake holders at all levels of Institution.
                  </p>
                </div>
              </div>

              <!-- 5. Quality Excellence -->
              <div class="col-md-6 col-xl-4 d-flex">
                <div class="cv-card cv-card-amber flex-grow-1">
                  <div class="d-flex align-items-center gap-3 mb-3">
                    <div class="cv-icon-amber"><i class="fa-solid fa-award"></i></div>
                    <h5 class="fw-bold text-dark mb-0 fs-6">5. Quality Excellence</h5>
                  </div>
                  <p class="text-secondary mb-0 small lh-base">
                    We promote Excellence in whatever constructive and productive work / activity Students /Faculties do.
                  </p>
                </div>
              </div>

              <!-- 6. Accountability -->
              <div class="col-md-6 col-xl-4 d-flex">
                <div class="cv-card cv-card-emerald flex-grow-1">
                  <div class="d-flex align-items-center gap-3 mb-3">
                    <div class="cv-icon-emerald"><i class="fa-solid fa-file-shield"></i></div>
                    <h5 class="fw-bold text-dark mb-0 fs-6">6. Accountability</h5>
                  </div>
                  <p class="text-secondary mb-0 small lh-base">
                    We believe in having complete transparency at all levels of hierarchy to promote a healthier working atmosphere to all. We believe in Accountability for and Transparency in, all my deeds and actions.
                  </p>
                </div>
              </div>

              <!-- 7. Perseverance -->
              <div class="col-md-6 col-xl-4 d-flex">
                <div class="cv-card cv-card-blue flex-grow-1">
                  <div class="d-flex align-items-center gap-3 mb-3">
                    <div class="cv-icon-blue"><i class="fa-solid fa-mountain-sun"></i></div>
                    <h5 class="fw-bold text-dark mb-0 fs-6">7. Perseverance</h5>
                  </div>
                  <p class="text-secondary mb-0 small lh-base">
                    We encourage Perseverance in doing something despite difficulty or delay in achieving success.
                  </p>
                </div>
              </div>

              <!-- 8. Encouragement -->
              <div class="col-md-6 col-xl-4 d-flex">
                <div class="cv-card cv-card-amber flex-grow-1">
                  <div class="d-flex align-items-center gap-3 mb-3">
                    <div class="cv-icon-amber"><i class="fa-solid fa-lightbulb"></i></div>
                    <h5 class="fw-bold text-dark mb-0 fs-6">8. Encouragement</h5>
                  </div>
                  <p class="text-secondary mb-0 small lh-base">
                    Encouragement is provided for critical and quantitative thinking, effective communication, ethical decision making and social obligation in our students.
                  </p>
                </div>
              </div>

              <!-- 9. Social Responsibility -->
              <div class="col-md-6 col-xl-4 d-flex">
                <div class="cv-card cv-card-emerald flex-grow-1">
                  <div class="d-flex align-items-center gap-3 mb-3">
                    <div class="cv-icon-emerald"><i class="fa-solid fa-hands-holding-child"></i></div>
                    <h5 class="fw-bold text-dark mb-0 fs-6">9. Social Responsibility</h5>
                  </div>
                  <p class="text-secondary mb-0 small lh-base">
                    We are focused on promoting the sense of social responsibilities in students by involving them in various social activities that gives them a broader perspective of understanding the causes and possible solutions related to various social issues.
                  </p>
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