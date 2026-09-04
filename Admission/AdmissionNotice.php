<?php
$page_title = 'Admission Notice - SSSUTMS';
$banner_title = 'Admission Notice';
$banner_category = 'Admission';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?>

<style>
.an-section { 
  background-color: #f8fafc;
  font-family: 'Inter', system-ui, -apple-system, sans-serif;
}

.an-main-wrapper {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}

.an-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2.2rem 2rem;
  position: relative;
}
.an-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}

.an-stat-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 10px 14px;
  display: flex; 
  align-items: center; 
  gap: 12px;
  height: 100%;
  transition: all 0.25s ease;
  box-shadow: 0 2px 8px rgba(0,0,0,0.02);
}
.an-stat-card:hover {
  border-color: #f59e0b;
  box-shadow: 0 6px 16px rgba(11,37,69,0.08);
  transform: translateY(-2px);
}
.an-stat-icon {
  width: 40px; 
  height: 40px;
  border-radius: 10px;
  background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%);
  color: #d97706;
  border: 1px solid #fde68a;
  display: flex; 
  align-items: center; 
  justify-content: center;
  font-size: 1.15rem; 
  flex-shrink: 0;
}

.an-reg-btn {
  background: linear-gradient(135deg, #0b2545 0%, #1e4d8c 100%);
  color: #ffffff !important;
  font-weight: 700;
  font-size: 0.88rem;
  padding: 8px 18px;
  border-radius: 10px;
  display: inline-flex;
  align-items: center;
  gap: 8px;
  text-decoration: none !important;
  box-shadow: 0 4px 12px rgba(11,37,69,0.12);
  transition: all 0.25s ease;
}
.an-reg-btn:hover {
  background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
  color: #ffffff !important;
  transform: translateY(-2px);
  box-shadow: 0 6px 18px rgba(217,119,6,0.3);
}

.an-table {
  width: 100%;
  border-collapse: collapse;
  border-radius: 12px;
  overflow: hidden;
  border: 1px solid #e2e8f0;
}
.an-table th {
  background: #0b2545;
  color: #ffffff;
  padding: 12px 16px;
  font-weight: 700;
  font-size: 0.88rem;
  border: 1px solid #1e3a5f;
}
.an-table td {
  padding: 12px 16px;
  border: 1px solid #e2e8f0;
  color: #334155;
  font-size: 0.9rem;
  vertical-align: middle;
}
.an-table tbody tr {
  transition: background-color 0.15s ease;
}
.an-table tbody tr:hover {
  background-color: #f8fafc;
}

.an-download-btn {
  background: #ffffff;
  border: 1px solid #cbd5e1;
  color: #0b2545 !important;
  font-weight: 700;
  font-size: 0.82rem;
  padding: 6px 12px;
  border-radius: 8px;
  text-decoration: none !important;
  display: inline-flex;
  align-items: center;
  gap: 6px;
  transition: all 0.2s ease;
}
.an-download-btn:hover {
  background: #0b2545;
  color: #ffffff !important;
  border-color: #0b2545;
}

.an-badge-new {
  background: #ef4444;
  color: #ffffff;
  font-size: 0.7rem;
  font-weight: 700;
  padding: 2px 8px;
  border-radius: 6px;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  animation: pulse-badge 2s infinite;
}

@keyframes pulse-badge {
  0% { opacity: 1; }
  50% { opacity: 0.7; }
  100% { opacity: 1; }
}

.an-card-notice {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-left: 4px solid #0b2545;
  border-radius: 12px;
  padding: 1.25rem;
  margin-bottom: 1rem;
  transition: all 0.25s ease;
}
.an-card-notice:hover {
  border-left-color: #f59e0b;
  box-shadow: 0 6px 18px rgba(15, 23, 42, 0.06);
  transform: translateY(-2px);
}
</style>

<section class="subpage-main-section an-section py-4 py-md-5">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="an-main-wrapper">

          <!-- Header Banner -->
          <div class="an-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-bullhorn me-1"></i> Official Circulars &amp; Directives
              </span>
              <h3 class="fw-bold text-white mb-1 fs-3">ADMISSION NOTICES 2026-27</h3>
              <p class="text-white-50 mb-0 small">Official Notifications, Guidelines &amp; Registration Circulars for Session 2026-27</p>
            </div>
            <div>
              <a href="<?php echo BASE_URL; ?>Admission/AdmissionRegistration.php" class="an-reg-btn">
                <i class="fa-solid fa-user-plus me-1"></i> Online Admission Registration
              </a>
            </div>
          </div>

          <!-- Content Body -->
          <div class="p-3.5 p-md-4">

            <!-- Stat Chips -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-sm-6 col-md-3">
                <div class="an-stat-card">
                  <div class="an-stat-icon"><i class="fa-solid fa-calendar-days"></i></div>
                  <div>
                    <span class="text-muted extra-small uppercase fw-bold d-block">Academic Session</span>
                    <strong class="text-dark fs-6">2026 – 2027</strong>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="an-stat-card">
                  <div class="an-stat-icon"><i class="fa-solid fa-file-circle-check"></i></div>
                  <div>
                    <span class="text-muted extra-small uppercase fw-bold d-block">Latest Circular</span>
                    <strong class="text-dark fs-6">Notice 03 / 2026</strong>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="an-stat-card">
                  <div class="an-stat-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                  <div>
                    <span class="text-muted extra-small uppercase fw-bold d-block">Admission Desk</span>
                    <strong class="text-dark fs-6">UG / PG / Ph.D Open</strong>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="an-stat-card">
                  <div class="an-stat-icon"><i class="fa-solid fa-landmark"></i></div>
                  <div>
                    <span class="text-muted extra-small uppercase fw-bold d-block">Regulatory Body</span>
                    <strong class="text-dark fs-6">UGC &amp; MP PURC</strong>
                  </div>
                </div>
              </div>
            </div>

            <!-- Active Admission Notifications Table -->
            <div class="mb-4">
              <div class="d-flex align-items-center justify-content-between mb-3">
                <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-list-check text-warning me-2"></i>Official Admission Notifications 2026-27</h5>
                <span class="badge bg-light text-dark border">Updated August 2026</span>
              </div>

              <div class="table-responsive">
                <table class="an-table">
                  <thead>
                    <tr>
                      <th style="width: 12%;">Date</th>
                      <th style="width: 58%;">Notice Title &amp; Description</th>
                      <th style="width: 15%;">Category</th>
                      <th class="text-center" style="width: 15%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="fw-bold text-dark small"><i class="fa-solid fa-clock text-warning me-1"></i> Aug 2026</td>
                      <td>
                        <div class="d-flex align-items-center gap-2 mb-1">
                          <strong class="text-dark">Enrollment &amp; Registration Notification (Session 2026-27)</strong>
                          <span class="an-badge-new">NEW</span>
                        </div>
                        <p class="mb-0 extra-small text-muted">Official enrollment form submission open for all admitted students across Engineering, Pharmacy, Management, Ayush &amp; Paramedical courses.</p>
                      </td>
                      <td><span class="badge bg-primary text-white">Enrollment</span></td>
                      <td class="text-center">
                        <a href="<?php echo BASE_URL; ?>Admission/AdmissionRegistration.php" class="an-download-btn"><i class="fa-solid fa-arrow-right text-warning"></i> Apply Now</a>
                      </td>
                    </tr>

                    <tr>
                      <td class="fw-bold text-dark small"><i class="fa-solid fa-clock text-warning me-1"></i> Aug 2026</td>
                      <td>
                        <div class="d-flex align-items-center gap-2 mb-1">
                          <strong class="text-dark">Admission Notification 03 (Session 2026-27) / प्रवेश अधिसूचना - 3</strong>
                          <span class="an-badge-new">NEW</span>
                        </div>
                        <p class="mb-0 extra-small text-muted">Direct admission &amp; counseling schedule for B.Tech, B.Pharm, D.Pharm, MBA, MCA, BAMS, BHMS &amp; Nursing programs.</p>
                      </td>
                      <td><span class="badge bg-warning text-dark">Notice 03</span></td>
                      <td class="text-center">
                        <a href="<?php echo BASE_URL; ?>Admission/Admission_Enquiry.php" class="an-download-btn"><i class="fa-solid fa-phone text-warning"></i> Enquiry</a>
                      </td>
                    </tr>

                    <tr>
                      <td class="fw-bold text-dark small"><i class="fa-solid fa-clock text-muted me-1"></i> July 2026</td>
                      <td>
                        <div class="d-flex align-items-center gap-2 mb-1">
                          <strong class="text-dark">Admission Notification 02 (Session 2026-27) / प्रवेश अधिसूचना - 2</strong>
                        </div>
                        <p class="mb-0 extra-small text-muted">Counseling guidelines and seat availability for Diploma, Undergraduate and Postgraduate faculties.</p>
                      </td>
                      <td><span class="badge bg-secondary text-white">Notice 02</span></td>
                      <td class="text-center">
                        <a href="<?php echo BASE_URL; ?>Admission/Admission_Enquiry.php" class="an-download-btn"><i class="fa-solid fa-circle-info text-primary"></i> Details</a>
                      </td>
                    </tr>

                    <tr>
                      <td class="fw-bold text-dark small"><i class="fa-solid fa-clock text-muted me-1"></i> June 2026</td>
                      <td>
                        <div class="d-flex align-items-center gap-2 mb-1">
                          <strong class="text-dark">Admission Notification 01 (Session 2026-27) / प्रवेश अधिसूचना - 1</strong>
                        </div>
                        <p class="mb-0 extra-small text-muted">First official admission call and eligibility criteria for Academic Year 2026-27.</p>
                      </td>
                      <td><span class="badge bg-secondary text-white">Notice 01</span></td>
                      <td class="text-center">
                        <a href="<?php echo BASE_URL; ?>Admission/Admission_Enquiry.php" class="an-download-btn"><i class="fa-solid fa-circle-info text-primary"></i> Details</a>
                      </td>
                    </tr>

                    <tr>
                      <td class="fw-bold text-dark small"><i class="fa-solid fa-clock text-muted me-1"></i> June 2026</td>
                      <td>
                        <div class="d-flex align-items-center gap-2 mb-1">
                          <strong class="text-dark">Ph.D Entrance Examination 2026 &amp; Extended Dates</strong>
                        </div>
                        <p class="mb-0 extra-small text-muted">Doctor of Philosophy entrance exam notification, eligibility test syllabus, and interview schedules for 2026 research scholars.</p>
                      </td>
                      <td><span class="badge bg-info text-dark">Ph.D Research</span></td>
                      <td class="text-center">
                        <a href="<?php echo BASE_URL; ?>Academic/PHD.php" class="an-download-btn"><i class="fa-solid fa-microscope text-warning"></i> Ph.D Portal</a>
                      </td>
                    </tr>

                    <tr>
                      <td class="fw-bold text-dark small"><i class="fa-solid fa-clock text-muted me-1"></i> May 2026</td>
                      <td>
                        <div class="d-flex align-items-center gap-2 mb-1">
                          <strong class="text-dark">NEP 2020 Outcome-Based Curriculum Guidelines (2020-27)</strong>
                        </div>
                        <p class="mb-0 extra-small text-muted">University National Education Policy implementation directives for Engineering, Management, Science &amp; Humanities.</p>
                      </td>
                      <td><span class="badge bg-success text-white">Policy / NEP</span></td>
                      <td class="text-center">
                        <a href="<?php echo BASE_URL; ?>About/ApprovalsAndOrdinances/Ordinances.php" class="an-download-btn"><i class="fa-solid fa-book text-success"></i> Ordinances</a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <!-- Admission Guidelines & Process Callout Card -->
            <div class="row g-3">
              <div class="col-md-6">
                <div class="an-card-notice h-100">
                  <h6 class="fw-bold text-dark mb-2"><i class="fa-solid fa-circle-check text-success me-2"></i>Key Admission Rules &amp; Verification</h6>
                  <ul class="extra-small text-muted ps-3 mb-0">
                    <li class="mb-1.5">Admissions are granted as per norms of UGC, MP PURC &amp; respective Statutory Councils.</li>
                    <li class="mb-1.5">Candidates must submit verified marksheets, migration certificate, caste certificate &amp; domicile proof.</li>
                    <li class="mb-0">Fee structure and hostel allotment are processed strictly through central counseling desk.</li>
                  </ul>
                </div>
              </div>
              <div class="col-md-6">
                <div class="an-card-notice h-100" style="border-left-color: #f59e0b;">
                  <h6 class="fw-bold text-dark mb-2"><i class="fa-solid fa-headset text-warning me-2"></i>Admission Helpdesk &amp; Verification</h6>
                  <p class="extra-small text-muted mb-2">For any queries regarding admission status, counseling dates, or document verification, feel free to submit an online enquiry.</p>
                  <a href="<?php echo BASE_URL; ?>Admission/Admission_Enquiry.php" class="btn btn-warning text-dark fw-bold btn-sm rounded-pill px-3">
                    <i class="fa-solid fa-paper-plane me-1"></i> Submit Online Enquiry Form
                  </a>
                </div>
              </div>
            </div>

          </div>
        </div><!-- end an-main-wrapper -->
      </div><!-- end col-lg-8 -->

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>