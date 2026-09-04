<?php
$page_title = 'Official Announcements & Academic Calendars - SSSUTMS';
$banner_title = 'Official Announcements';
$banner_category = 'Download';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';

// Fetch notices from data/notices.json
$notices = function_exists('get_notices') ? get_notices('all', 15) : [];
?>

<section class="subpage-main-section py-4 bg-light">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="content-card shadow-sm border-0 rounded-4 bg-white p-4 mb-4">
          
          <!-- Card Header -->
          <div class="d-flex flex-wrap justify-content-between align-items-center pb-3 mb-4 border-bottom">
            <div>
              <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-2 rounded-pill fw-semibold mb-2">
                <i class="fa fa-bullhorn me-1"></i> University Gazette &amp; Notices
              </span>
              <h3 class="fw-bold text-navy mb-1" style="color: #002B5B;">Official Announcements &amp; Calendars</h3>
              <p class="text-muted small mb-0">Sri Satya Sai University of Technology &amp; Medical Sciences, Sehore</p>
            </div>
            <div class="mt-2 mt-md-0">
              <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-3 py-2 rounded-pill animate-pulse">
                <i class="fa fa-circle-dot me-1"></i> Academic Session 2026-27
              </span>
            </div>
          </div>

          <!-- Section 1: Official Department Academic Calendars -->
          <h5 class="fw-bold text-navy mb-3" style="color: #002B5B;">
            <i class="fa fa-calendar-alt text-primary me-2"></i>Faculty &amp; College Academic Calendars
          </h5>

          <div class="row g-4 mb-5">
            
            <!-- Faculty of Education -->
            <div class="col-md-6 col-lg-4">
              <div class="card h-100 border rounded-4 p-3 shadow-sm hover-shadow transition">
                <div class="d-flex align-items-center mb-3">
                  <div class="avatar-md p-2 bg-primary-subtle text-primary rounded-3 me-3">
                    <i class="fa fa-chalkboard-user fa-2x"></i>
                  </div>
                  <div>
                    <h6 class="fw-bold text-dark mb-0">Faculty of Education</h6>
                    <small class="text-muted">B.Ed / B.A. B.Ed / B.P.Ed</small>
                  </div>
                </div>
                <p class="small text-secondary mb-3">Official academic terms, teaching schedule, practical training, and semester calendar.</p>
                <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Announcements/Faculty of Education.pdf" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill w-100 mt-auto">
                  <i class="fa fa-file-pdf me-1"></i> Download Calendar
                </a>
              </div>
            </div>

            <!-- College of Pharmacy -->
            <div class="col-md-6 col-lg-4">
              <div class="card h-100 border rounded-4 p-3 shadow-sm hover-shadow transition">
                <div class="d-flex align-items-center mb-3">
                  <div class="avatar-md p-2 bg-success-subtle text-success rounded-3 me-3">
                    <i class="fa fa-prescription-bottle-medical fa-2x"></i>
                  </div>
                  <div>
                    <h6 class="fw-bold text-dark mb-0">College of Pharmacy</h6>
                    <small class="text-muted">B.Pharm &amp; M.Pharm</small>
                  </div>
                </div>
                <p class="small text-secondary mb-3">PCI aligned sessional examinations, lab schedules, and academic session calendar.</p>
                <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Announcements/College of Pharmacy.pdf" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill w-100 mt-auto">
                  <i class="fa fa-file-pdf me-1"></i> Download Calendar
                </a>
              </div>
            </div>

            <!-- School of Engineering -->
            <div class="col-md-6 col-lg-4">
              <div class="card h-100 border rounded-4 p-3 shadow-sm hover-shadow transition">
                <div class="d-flex align-items-center mb-3">
                  <div class="avatar-md p-2 bg-warning-subtle text-dark rounded-3 me-3">
                    <i class="fa fa-compass-drafting fa-2x"></i>
                  </div>
                  <div>
                    <h6 class="fw-bold text-dark mb-0">School of Engineering</h6>
                    <small class="text-muted">B.Tech &amp; Polytechnic</small>
                  </div>
                </div>
                <p class="small text-secondary mb-3">AICTE semester timelines, mid-term evaluations, project reviews, and examination calendar.</p>
                <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Curriculum/BE_AE.pdf" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill w-100 mt-auto">
                  <i class="fa fa-file-pdf me-1"></i> View Calendar
                </a>
              </div>
            </div>

          </div>

          <!-- Section 2: Recent Official University Notices Table -->
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold text-navy mb-0" style="color: #002B5B;">
              <i class="fa fa-scroll text-primary me-2"></i>Recent Circulars &amp; Official Notifications
            </h5>
            <span class="small text-muted">Latest University Updates</span>
          </div>

          <div class="table-responsive rounded-3 border">
            <table class="table table-hover align-middle mb-0">
              <thead style="background: linear-gradient(135deg, #002B5B 0%, #0d47a1 100%); color: #fff;">
                <tr>
                  <th style="width: 60px;" class="text-center">#</th>
                  <th>Announcement / Notification Title</th>
                  <th>Department / Category</th>
                  <th class="text-center" style="width: 140px;">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-center fw-bold text-muted">1</td>
                  <td>
                    <div class="fw-bold text-dark">University Entrance Exam Alert (CEET) 2026-2027</div>
                    <small class="text-muted">Notification for Common Entrance Exam registration for professional &amp; doctoral programs</small>
                  </td>
                  <td><span class="badge bg-primary-subtle text-primary border">Admissions</span></td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>Admission/AdmissionNotice.php" class="btn btn-sm btn-outline-primary rounded-pill px-3 py-1">
                      <i class="fa fa-eye me-1"></i> View Notice
                    </a>
                  </td>
                </tr>

                <tr>
                  <td class="text-center fw-bold text-muted">2</td>
                  <td>
                    <div class="fw-bold text-dark">Ph.D. Course Work Examination Schedule &amp; Results</div>
                    <small class="text-muted">Notification regarding Research Methodology and Course Work examinations</small>
                  </td>
                  <td><span class="badge bg-warning-subtle text-dark border">Research</span></td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>Download/NotificationOfPhdAward.php" class="btn btn-sm btn-outline-primary rounded-pill px-3 py-1">
                      <i class="fa fa-eye me-1"></i> View Notice
                    </a>
                  </td>
                </tr>

                <tr>
                  <td class="text-center fw-bold text-muted">3</td>
                  <td>
                    <div class="fw-bold text-dark">Examination Schedule for Professional &amp; Paramedical Courses</div>
                    <small class="text-muted">Semester examination timetable for medical, ayurveda, and paramedical disciplines</small>
                  </td>
                  <td><span class="badge bg-danger-subtle text-danger border">Examination</span></td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>Examination/ExamSchedule.php" class="btn btn-sm btn-outline-primary rounded-pill px-3 py-1">
                      <i class="fa fa-eye me-1"></i> View Notice
                    </a>
                  </td>
                </tr>

                <tr>
                  <td class="text-center fw-bold text-muted">4</td>
                  <td>
                    <div class="fw-bold text-dark">Enrollment &amp; University Registration Form Submission Notice</div>
                    <small class="text-muted">Mandatory enrolment deadlines and guidelines for newly admitted students</small>
                  </td>
                  <td><span class="badge bg-info-subtle text-info border">Enrolment</span></td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>Download/Forms.php" class="btn btn-sm btn-outline-primary rounded-pill px-3 py-1">
                      <i class="fa fa-download me-1"></i> Get Form
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
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