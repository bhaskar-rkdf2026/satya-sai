<?php
$page_title = 'Entrance Exam Alert - SSSUTMS';
$banner_title = 'Entrance Exam Alert';
$banner_category = 'Examination';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?>

<style>
.exam-section { background-color: #f8fafc; }
.exam-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15,23,42,0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}
.exam-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2.2rem 2rem;
  position: relative;
}
.exam-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.exam-stat-chip {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 16px 14px;
  display: flex; align-items: center; gap: 12px;
  height: 100%;
  transition: all 0.25s ease;
  box-shadow: 0 4px 12px rgba(0,0,0,0.02);
}
.exam-stat-chip:hover {
  border-color: #cbd5e1;
  box-shadow: 0 6px 18px rgba(11,37,69,0.07);
  transform: translateY(-2px);
}
.exam-stat-icon {
  width: 48px; height: 48px;
  border-radius: 12px;
  background: rgba(245,158,11,0.12);
  color: #d97706;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.35rem; flex-shrink: 0;
}
.exam-alert-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-left: 5px solid #f59e0b;
  border-radius: 14px;
  padding: 1.5rem;
  box-shadow: 0 4px 16px rgba(0,0,0,0.03);
  transition: all 0.25s ease;
}
.exam-alert-card:hover {
  box-shadow: 0 8px 24px rgba(11,37,69,0.08);
  transform: translateY(-2px);
}
.exam-btn {
  background: linear-gradient(135deg, #0b2545 0%, #1e4d8c 100%) !important;
  color: #ffffff !important;
  font-weight: 700;
  padding: 10px 22px;
  border-radius: 10px;
  border: 1px solid rgba(245,158,11,0.4);
  text-decoration: none !important;
  display: inline-flex;
  align-items: center;
  gap: 8px;
  box-shadow: 0 4px 12px rgba(11,37,69,0.15);
  transition: all 0.25s ease;
}
.exam-btn:hover {
  background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%) !important;
  color: #ffffff !important;
  border-color: #d97706;
  box-shadow: 0 6px 18px rgba(217,119,6,0.35);
  transform: translateY(-2px);
}
</style>

<section class="subpage-main-section exam-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="exam-main-card">

          <!-- Header Banner -->
          <div class="exam-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-bullhorn me-1"></i> Examination Cell Updates
              </span>
              <h3 class="fw-bold text-white mb-1 fs-3">ENTRANCE EXAM ALERTS</h3>
              <p class="text-white-50 mb-0 small">Official Announcements, Schedules &amp; Application Guidelines for Entrance Tests</p>
            </div>
          </div>

          <!-- Content Body -->
          <div class="p-4">

            <!-- Stat Chips -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-sm-6 col-md-3">
                <div class="exam-stat-chip">
                  <div class="exam-stat-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Admission Test</div>
                    <div class="fw-bold text-dark fs-6">Ph.D Entrance</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="exam-stat-chip">
                  <div class="exam-stat-icon"><i class="fa-solid fa-calendar-check"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Academic Session</div>
                    <div class="fw-bold text-dark fs-6">Session 2026</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="exam-stat-chip">
                  <div class="exam-stat-icon"><i class="fa-solid fa-clock-rotate-left"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Status</div>
                    <div class="fw-bold text-dark fs-6">Extended Dates</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="exam-stat-chip">
                  <div class="exam-stat-icon"><i class="fa-solid fa-file-pdf"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Notification</div>
                    <div class="fw-bold text-dark fs-6">Official PDF</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Entrance Exam Alert Item Card -->
            <div class="exam-alert-card d-flex align-items-center justify-content-between flex-wrap gap-3">
              <div>
                <span class="badge bg-danger mb-2 px-3 py-1 fw-bold text-uppercase">
                  <i class="fa-solid fa-beat-fade fa-circle me-1"></i> Latest Alert
                </span>
                <h4 class="fw-bold text-dark mb-1 fs-5">Extended Entrance Exam (Ph.D Entrance Examination 2026)</h4>
                <p class="text-muted mb-0 small">Official notification regarding the extension of Ph.D. Entrance Examination 2026 application deadlines and guidelines.</p>
              </div>
              <div>
                <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/New_Doc_06-02-2026_14.37_02062026_0434.pdf" target="_blank" rel="noopener" class="exam-btn">
                  <i class="fa-solid fa-file-pdf text-warning fs-5"></i> View Official Notice
                </a>
              </div>
            </div>

          </div>
        </div><!-- end exam-main-card -->
      </div><!-- end col-lg-8 -->

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>