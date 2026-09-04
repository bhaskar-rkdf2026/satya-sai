<?php
$page_title = 'NPTEL - SSSUTMS';
$banner_title = 'NPTEL';
$banner_category = 'Research';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?>

<style>
.nptel-section { background-color: #f8fafc; }
.nptel-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15,23,42,0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}
.nptel-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2.2rem 2rem;
  position: relative;
}
.nptel-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.nptel-stat-chip {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 16px 14px;
  display: flex; align-items: center; gap: 12px;
  height: 100%;
  transition: all 0.25s ease;
  box-shadow: 0 4px 12px rgba(0,0,0,0.02);
}
.nptel-stat-chip:hover {
  border-color: #cbd5e1;
  box-shadow: 0 6px 18px rgba(11,37,69,0.07);
  transform: translateY(-2px);
}
.nptel-stat-icon {
  width: 48px; height: 48px;
  border-radius: 12px;
  background: rgba(245,158,11,0.12);
  color: #d97706;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.35rem; flex-shrink: 0;
}
.nptel-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 16px;
  padding: 1.5rem;
  box-shadow: 0 4px 16px rgba(0,0,0,0.02);
  margin-bottom: 1.75rem;
}
.nptel-card-header {
  display: flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 1.2rem;
  padding-bottom: 0.85rem;
  border-bottom: 2px solid #f1f5f9;
}
.nptel-card-header i {
  color: #f59e0b;
  font-size: 1.3rem;
}
.nptel-link-btn {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 10px;
  padding: 12px 16px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 12px;
  color: #0b2545;
  font-weight: 600;
  text-decoration: none !important;
  transition: all 0.2s ease;
  margin-bottom: 0.75rem;
}
.nptel-link-btn:hover {
  background: #ffffff;
  border-color: #cbd5e1;
  color: #d97706;
  box-shadow: 0 4px 14px rgba(11,37,69,0.06);
}
</style>

<section class="subpage-main-section nptel-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="nptel-main-card">

          <!-- Header Banner -->
          <div class="nptel-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-laptop-file me-1"></i> IIT &amp; IISc E-Learning Initiative
              </span>
              <h3 class="fw-bold text-white mb-1 fs-3">NATIONAL PROGRAMME ON TECHNOLOGY ENHANCED LEARNING (NPTEL)</h3>
              <p class="text-white-50 mb-0 small">SSSUTMS Local Chapter for IIT Online Certification Courses &amp; FDPs</p>
            </div>
            <div>
              <a href="https://onlinecourses.nptel.ac.in/" target="_blank" rel="noopener" class="btn btn-warning fw-bold px-4 py-2 text-dark rounded-3">
                <i class="fa-solid fa-arrow-right-from-bracket me-1"></i> SWAYAM NPTEL Portal
              </a>
            </div>
          </div>

          <!-- Content Body -->
          <div class="p-4">

            <!-- Stat Chips -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-sm-6 col-md-3">
                <div class="nptel-stat-chip">
                  <div class="nptel-stat-icon"><i class="fa-solid fa-building-columns"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Initiated By</div>
                    <div class="fw-bold text-dark fs-6">7 IITs &amp; IISc</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="nptel-stat-chip">
                  <div class="nptel-stat-icon"><i class="fa-solid fa-book-open"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Courses</div>
                    <div class="fw-bold text-dark fs-6">940+ E-Courses</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="nptel-stat-chip">
                  <div class="nptel-stat-icon"><i class="fa-solid fa-hand-holding-hand"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Waivers</div>
                    <div class="fw-bold text-dark fs-6">SC/ST Scholarship</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="nptel-stat-chip">
                  <div class="nptel-stat-icon"><i class="fa-solid fa-certificate"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Certificates</div>
                    <div class="fw-bold text-dark fs-6">IIT Certification</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- About NPTEL Section -->
            <div class="nptel-card">
              <div class="nptel-card-header">
                <i class="fa-solid fa-circle-info text-warning"></i>
                <h5 class="fw-bold text-dark mb-0">About NPTEL</h5>
              </div>
              <div class="lh-lg text-dark" style="text-align: justify;">
                <p>The National Programme on Technology Enhanced Learning (NPTEL) is a project initiated and handled by seven Indian Institutes of Technology (IIT Bombay, Delhi, Kanpur, Kharagpur, Madras, Roorkee, and Guwahati) and Indian Institute of Science, Bangalore. It is funded by MHRD, Government of India, to develop and promote multimedia and web technology-based learning open for all.</p>

                <p class="mb-0">Currently more than 940 courses are available on the portal for viewing and downloading. NPTEL online courses offer optional certification exams held at specific centers with nominal fees, SC/ST fee waiver, and university credit transfer options. Certificates from IITs are awarded to candidates passing the proctored examination.</p>
              </div>
            </div>

            <!-- Enrollment Guidelines Section -->
            <div class="nptel-card">
              <div class="nptel-card-header">
                <i class="fa-solid fa-list-check text-warning"></i>
                <h5 class="fw-bold text-dark mb-0">Important Guidelines While Enrolling</h5>
              </div>
              <ul class="list-group list-group-flush border rounded-3">
                <li class="list-group-item p-3"><i class="fa-solid fa-check text-success me-2"></i> Use a unique, permanent email ID throughout the course run.</li>
                <li class="list-group-item p-3"><i class="fa-solid fa-check text-success me-2"></i> Select <strong>'Yes'</strong> to the query: <em>Are you a part of NPTEL Local Chapter?</em></li>
                <li class="list-group-item p-3"><i class="fa-solid fa-check text-success me-2"></i> Choose <strong>Sri Satya Sai University of Technology and Medical Sciences</strong> from the drop-down list.</li>
                <li class="list-group-item p-3"><i class="fa-solid fa-check text-success me-2"></i> <strong>Students:</strong> Enter your official college enrollment / roll number.</li>
                <li class="list-group-item p-3"><i class="fa-solid fa-check text-success me-2"></i> <strong>Faculty:</strong> Enter your official college Employee ID number.</li>
              </ul>
            </div>

            <!-- Links & Resources Section -->
            <div class="nptel-card mb-0">
              <div class="nptel-card-header">
                <i class="fa-solid fa-link text-warning"></i>
                <h5 class="fw-bold text-dark mb-0">Important NPTEL Links &amp; Guides</h5>
              </div>

              <a href="http://nptel.ac.in/LocalChapter/videos.php" target="_blank" rel="noopener" class="nptel-link-btn">
                <span><i class="fa-solid fa-video text-primary me-2"></i> Video on How to Enroll to NPTEL Online Courses</span>
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
              </a>

              <a href="http://nptel.ac.in/Brochures/" target="_blank" rel="noopener" class="nptel-link-btn">
                <span><i class="fa-solid fa-book text-primary me-2"></i> Link for NPTEL Brochures and Booklet</span>
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
              </a>

              <a href="https://drive.google.com/file/d/1JFS3yGPkMSeQZ3UHIZo8vrq9Z1LI6UCp/view" target="_blank" rel="noopener" class="nptel-link-btn">
                <span><i class="fa-solid fa-user-check text-primary me-2"></i> How Students Select Their Mentors</span>
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
              </a>

              <a href="https://drive.google.com/file/d/1RukTlxUWN-XmBXCeVzP4o20b5fo1gGOe/view" target="_blank" rel="noopener" class="nptel-link-btn">
                <span><i class="fa-solid fa-file-lines text-primary me-2"></i> Guidelines for Mentors</span>
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
              </a>

              <a href="https://drive.google.com/file/d/1NTIlO45DtQtJBCWZeDx9oWFHMZD2m9Wq/view" target="_blank" rel="noopener" class="nptel-link-btn mb-0">
                <span><i class="fa-solid fa-diagram-project text-primary me-2"></i> Mentors Flow in NPTEL Local Chapters</span>
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
              </a>
            </div>

          </div>
        </div><!-- end nptel-main-card -->
      </div><!-- end col-lg-8 -->

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>