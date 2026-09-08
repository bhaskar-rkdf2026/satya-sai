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
.an-section { background-color: #f8fafc; font-family: 'Inter', system-ui, -apple-system, sans-serif; }
.an-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15,23,42,0.05);
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
.an-stat-chip {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 12px 14px;
  display: flex; align-items: center; gap: 11px;
  height: 100%;
  transition: all 0.25s ease;
  box-shadow: 0 2px 8px rgba(0,0,0,0.02);
}
.an-stat-chip:hover {
  border-color: #f59e0b;
  box-shadow: 0 6px 16px rgba(11,37,69,0.08);
  transform: translateY(-2px);
}
.an-stat-icon {
  width: 42px; height: 42px;
  border-radius: 10px;
  background: rgba(245,158,11,0.12);
  color: #d97706;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.15rem; flex-shrink: 0;
}
.an-session-block {
  margin-bottom: 2rem;
}
.an-session-title {
  display: flex;
  align-items: center;
  gap: 10px;
  font-weight: 700;
  font-size: 1.1rem;
  color: #0b2545;
  padding-bottom: 0.6rem;
  border-bottom: 2px solid #e2e8f0;
  margin-bottom: 1rem;
}
.an-session-title i {
  color: #f59e0b;
}
.an-item-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 1rem 1.25rem;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 1rem;
  margin-bottom: 0.75rem;
  transition: all 0.2s ease;
  box-shadow: 0 2px 6px rgba(0,0,0,0.02);
}
.an-item-card:hover {
  border-color: #cbd5e1;
  box-shadow: 0 6px 18px rgba(11,37,69,0.07);
  transform: translateY(-2px);
}
.an-item-title {
  font-weight: 600;
  font-size: 0.95rem;
  color: #1e293b;
  margin-bottom: 0;
}
.an-badge-new {
  background: #fee2e2;
  color: #dc2626;
  font-size: 0.72rem;
  font-weight: 700;
  padding: 3px 8px;
  border-radius: 5px;
  text-transform: uppercase;
  border: 1px solid #fca5a5;
  margin-right: 8px;
}
.an-btn {
  background: linear-gradient(135deg, #0b2545 0%, #1e4d8c 100%) !important;
  color: #ffffff !important;
  font-size: 0.82rem;
  font-weight: 700;
  padding: 7px 15px;
  border-radius: 8px;
  border: 1px solid rgba(245,158,11,0.35);
  text-decoration: none !important;
  display: inline-flex;
  align-items: center;
  gap: 6px;
  white-space: nowrap;
  box-shadow: 0 2px 6px rgba(11,37,69,0.12);
  transition: all 0.2s ease;
}
.an-btn i {
  color: #fbbf24 !important;
}
.an-btn:hover {
  background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%) !important;
  color: #ffffff !important;
  border-color: #d97706;
  box-shadow: 0 4px 12px rgba(217,119,6,0.3);
  transform: translateY(-1px);
}
.an-search-box {
  position: relative;
  max-width: 380px;
}
.an-search-box input {
  padding-left: 2.5rem;
  border-radius: 10px;
  border: 1px solid #cbd5e1;
}
.an-search-box i {
  position: absolute;
  left: 0.9rem;
  top: 50%;
  transform: translateY(-50%);
  color: #94a3b8;
}
</style>

<section class="subpage-main-section an-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="an-main-card">

          <!-- Header Banner -->
          <div class="an-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-bullhorn me-1"></i> Official Admission Circulars
              </span>
              <h3 class="fw-bold text-white mb-1 fs-3">ADMISSION NOTICES &amp; COUNSELING SCHEDULES</h3>
              <p class="text-white-50 mb-0 small">Official Announcements, Eligibility Criteria &amp; Admission Counseling Notifications</p>
            </div>
            <div>
              <a href="<?php echo BASE_URL; ?>Admission/AdmissionRegistration.php" class="btn btn-warning fw-bold px-4 py-2 text-dark rounded-3 shadow-sm">
                <i class="fa-solid fa-pen-nib me-1"></i> Apply Online
              </a>
            </div>
          </div>

          <!-- Content Body -->
          <div class="p-4">

            <!-- Stat Chips -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-sm-6 col-md-3">
                <div class="an-stat-chip">
                  <div class="an-stat-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                  <div>
                    <span class="text-muted extra-small uppercase fw-bold d-block">Active Session</span>
                    <strong class="text-dark fs-6">2026 – 2027</strong>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="an-stat-chip">
                  <div class="an-stat-icon"><i class="fa-solid fa-bell"></i></div>
                  <div>
                    <span class="text-muted extra-small uppercase fw-bold d-block">Total Notices</span>
                    <strong class="text-dark fs-6">50 Circulars</strong>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="an-stat-chip">
                  <div class="an-stat-icon"><i class="fa-solid fa-stethoscope"></i></div>
                  <div>
                    <span class="text-muted extra-small uppercase fw-bold d-block">Specialized</span>
                    <strong class="text-dark fs-6">Medical &amp; Allied</strong>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="an-stat-chip">
                  <div class="an-stat-icon"><i class="fa-solid fa-file-pdf"></i></div>
                  <div>
                    <span class="text-muted extra-small uppercase fw-bold d-block">Format</span>
                    <strong class="text-dark fs-6">Official PDF</strong>
                  </div>
                </div>
              </div>
            </div>

            <!-- Search Toolbar -->
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
              <div class="an-search-box flex-grow-1">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" id="noticeSearchInput" class="form-control" placeholder="Search notices (e.g. 2026, Enrollment, B.Tech, NRI)...">
              </div>
              <div class="small text-muted">
                Showing <strong id="noticeCount">50</strong> notifications
              </div>
            </div>

            <!-- Notices Grouped by Session -->
            <div id="noticeContainer">
              <div class="an-session-block">
                <h5 class="an-session-title">
                  <i class="fa-solid fa-calendar-check"></i> Session 2026-27
                </h5>
                <div class="an-items-list">
                  <div class="an-item-card">
                    <div class="d-flex align-items-center">
                      <span class="an-badge-new"><i class="fa-solid fa-bolt me-1"></i> New</span>
                      <p class="an-item-title">Enrollment form Open (2026-27) </p>
                    </div>
                    <div>
                      <a href="https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Adobe_Scan_21_Jul_2026__1__21072026_0937.pdf" target="_blank" rel="noopener" class="an-btn">
                        <i class="fa-solid fa-file-pdf"></i> Download PDF
                      </a>
                    </div>
                  </div>
                  <div class="an-item-card">
                    <div class="d-flex align-items-center">
                      <span class="an-badge-new"><i class="fa-solid fa-bolt me-1"></i> New</span>
                      <p class="an-item-title">प्रवेश अधिसूचना - 3 (2026-27) </p>
                    </div>
                    <div>
                      <a href="https://www.sssutms.co.in/cms/Areas/Website/Files/Link/प्रवेश_अधिसूचना_-_3_(2026-27)_08072026_0226.pdf" target="_blank" rel="noopener" class="an-btn">
                        <i class="fa-solid fa-file-pdf"></i> Download PDF
                      </a>
                    </div>
                  </div>
                  <div class="an-item-card">
                    <div class="d-flex align-items-center">
                      <span class="an-badge-new"><i class="fa-solid fa-bolt me-1"></i> New</span>
                      <p class="an-item-title">प्रवेश अधिसूचना - 2 (2026-27)</p>
                    </div>
                    <div>
                      <a href="https://www.sssutms.co.in/cms/Areas/Website/Files/Link/प्रवेश_अधिसूचना_-_2_(2026-27)_08072026_0225.pdf" target="_blank" rel="noopener" class="an-btn">
                        <i class="fa-solid fa-file-pdf"></i> Download PDF
                      </a>
                    </div>
                  </div>
                  <div class="an-item-card">
                    <div class="d-flex align-items-center">
                      <span class="an-badge-new"><i class="fa-solid fa-bolt me-1"></i> New</span>
                      <p class="an-item-title">आवश्यक सुचना</p>
                    </div>
                    <div>
                      <a href="https://www.sssutms.co.in/cms/Areas/Website/Files/Link/imp_notice_16032026_0424.pdf" target="_blank" rel="noopener" class="an-btn">
                        <i class="fa-solid fa-file-pdf"></i> Download PDF
                      </a>
                    </div>
                  </div>
                  <div class="an-item-card">
                    <div class="d-flex align-items-center">
                      <span class="an-badge-new"><i class="fa-solid fa-bolt me-1"></i> New</span>
                      <p class="an-item-title">admission notification 01 (2026-27)</p>
                    </div>
                    <div>
                      <a href="https://www.sssutms.co.in/cms/Areas/Website/Files/Link/WhatsApp_Image_2026-02-14_at_1.44_14022026_1125.pdf" target="_blank" rel="noopener" class="an-btn">
                        <i class="fa-solid fa-file-pdf"></i> Download PDF
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="an-session-block">
                <h5 class="an-session-title">
                  <i class="fa-solid fa-calendar-check"></i> Session 2025-26
                </h5>
                <div class="an-items-list">
                  <div class="an-item-card">
                    <div class="d-flex align-items-center">
                      
                      <p class="an-item-title">SSSUTMS-CIDC Draft Admission Notice (Session 2025-26)</p>
                    </div>
                    <div>
                      <a href="https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Draft-Admission_Notice_Sri_Satya_Sai_University_12092025_0417.pdf" target="_blank" rel="noopener" class="an-btn">
                        <i class="fa-solid fa-file-pdf"></i> Download PDF
                      </a>
                    </div>
                  </div>
                  <div class="an-item-card">
                    <div class="d-flex align-items-center">
                      
                      <p class="an-item-title">admission notification 01 (2025-26)</p>
                    </div>
                    <div>
                      <a href="https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Adobe_Scan_01_Aug_2025_(1)_01082025_0412.pdf" target="_blank" rel="noopener" class="an-btn">
                        <i class="fa-solid fa-file-pdf"></i> Download PDF
                      </a>
                    </div>
                  </div>
                  <div class="an-item-card">
                    <div class="d-flex align-items-center">
                      
                      <p class="an-item-title">प्रवेश अधिसूचना - 2 (2025-26)</p>
                    </div>
                    <div>
                      <a href="https://www.sssutms.co.in/cms/Areas/Website/Files/Link/AD2_01082025_0419.pdf" target="_blank" rel="noopener" class="an-btn">
                        <i class="fa-solid fa-file-pdf"></i> Download PDF
                      </a>
                    </div>
                  </div>
                  <div class="an-item-card">
                    <div class="d-flex align-items-center">
                      
                      <p class="an-item-title">प्रवेश अधिसूचना - 3 (2025-26)</p>
                    </div>
                    <div>
                      <a href="https://www.sssutms.co.in/cms/Areas/Website/Files/Link/03_01082025_0411.pdf" target="_blank" rel="noopener" class="an-btn">
                        <i class="fa-solid fa-file-pdf"></i> Download PDF
                      </a>
                    </div>
                  </div>
                  <div class="an-item-card">
                    <div class="d-flex align-items-center">
                      
                      <p class="an-item-title">admission notification 01 (2025-26) </p>
                    </div>
                    <div>
                      <a href="https://www.sssutms.co.in/cms/Areas/Website/Files/Link/ADMISSION_NOTIFICATION_1_31072025_0425.pdf" target="_blank" rel="noopener" class="an-btn">
                        <i class="fa-solid fa-file-pdf"></i> Download PDF
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="an-session-block">
                <h5 class="an-session-title">
                  <i class="fa-solid fa-calendar-check"></i> Archive Notifications
                </h5>
                <div class="an-items-list">
                  <div class="an-item-card">
                    <div class="d-flex align-items-center">
                      
                      <p class="an-item-title">NOTIFICATION (Registration &amp; Enrollment) </p>
                    </div>
                    <div>
                      <a href="&lt;?php echo BASE_URL; ?&gt;assets/images/Files/Widget/Download/Notifica.pdf" target="_blank" rel="noopener" class="an-btn">
                        <i class="fa-solid fa-file-pdf"></i> Download PDF
                      </a>
                    </div>
                  </div>
                  <div class="an-item-card">
                    <div class="d-flex align-items-center">
                      
                      <p class="an-item-title">notification  </p>
                    </div>
                    <div>
                      <a href="&lt;?php echo BASE_URL; ?&gt;assets/images/Files/Widget/Download/IMG.pdf" target="_blank" rel="noopener" class="an-btn">
                        <i class="fa-solid fa-file-pdf"></i> Download PDF
                      </a>
                    </div>
                  </div>
                  <div class="an-item-card">
                    <div class="d-flex align-items-center">
                      
                      <p class="an-item-title">iploma Engineering)</p>
                    </div>
                    <div>
                      <a href="https://www.sssutms.co.in/cms/Areas/Website/Files/Widget/Download/Admission_notification.pdf" target="_blank" rel="noopener" class="an-btn">
                        <i class="fa-solid fa-file-pdf"></i> Download PDF
                      </a>
                    </div>
                  </div>
                  <div class="an-item-card">
                    <div class="d-flex align-items-center">
                      
                      <p class="an-item-title">Student Login 2021</p>
                    </div>
                    <div>
                      <a href="https://www.universitymanagementsystem.in/SatyaSai" target="_blank" rel="noopener" class="an-btn">
                        <i class="fa-solid fa-file-pdf"></i> Download PDF
                      </a>
                    </div>
                  </div>
                  <div class="an-item-card">
                    <div class="d-flex align-items-center">
                      
                      <p class="an-item-title">Notice for Student Enrollment</p>
                    </div>
                    <div>
                      <a href="https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Notice/AAA_ENROLLMENT_NUR.pdf" target="_blank" rel="noopener" class="an-btn">
                        <i class="fa-solid fa-file-pdf"></i> Download PDF
                      </a>
                    </div>
                  </div>
                  <div class="an-item-card">
                    <div class="d-flex align-items-center">
                      
                      <p class="an-item-title">Admission Counseling Schedule 2020-21</p>
                    </div>
                    <div>
                      <a href="https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Admission/Admission1.pdf" target="_blank" rel="noopener" class="an-btn">
                        <i class="fa-solid fa-file-pdf"></i> Download PDF
                      </a>
                    </div>
                  </div>
                  <div class="an-item-card">
                    <div class="d-flex align-items-center">
                      
                      <p class="an-item-title">tification for Entrance Examination -2020 </p>
                    </div>
                    <div>
                      <a href="https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Admission/Entrance_20_21.pdf" target="_blank" rel="noopener" class="an-btn">
                        <i class="fa-solid fa-file-pdf"></i> Download PDF
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="an-session-block">
                <h5 class="an-session-title">
                  <i class="fa-solid fa-calendar-check"></i> Session 2024-25
                </h5>
                <div class="an-items-list">
                  <div class="an-item-card">
                    <div class="d-flex align-items-center">
                      
                      <p class="an-item-title">प्रवेश अधिसूचना - 3 (2024-25)</p>
                    </div>
                    <div>
                      <a href="https://www.sssutms.co.in/cms/Areas/Website/Files/Widget/Download/TapScanner_08-21-2024-11꞉49.pdf" target="_blank" rel="noopener" class="an-btn">
                        <i class="fa-solid fa-file-pdf"></i> Download PDF
                      </a>
                    </div>
                  </div>
                  <div class="an-item-card">
                    <div class="d-flex align-items-center">
                      
                      <p class="an-item-title">admission notification 01 (2024-25) </p>
                    </div>
                    <div>
                      <a href="https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IMG_0001_31032024_1157.pdf" target="_blank" rel="noopener" class="an-btn">
                        <i class="fa-solid fa-file-pdf"></i> Download PDF
                      </a>
                    </div>
                  </div>
                  <div class="an-item-card">
                    <div class="d-flex align-items-center">
                      
                      <p class="an-item-title">प्रवेश अधिसूचना - 2 (2024-25)</p>
                    </div>
                    <div>
                      <a href="https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IMG_0002_31032024_1151.pdf" target="_blank" rel="noopener" class="an-btn">
                        <i class="fa-solid fa-file-pdf"></i> Download PDF
                      </a>
                    </div>
                  </div>
                  <div class="an-item-card">
                    <div class="d-flex align-items-center">
                      
                      <p class="an-item-title">NRI ADMISSION  NOTIFICATION (2024-25)</p>
                    </div>
                    <div>
                      <a href="https://www.sssutms.co.in/cms/Areas/Website/Files/Link/INTERNATIONAL_ADMISSION_05_07122024_0637.pdf" target="_blank" rel="noopener" class="an-btn">
                        <i class="fa-solid fa-file-pdf"></i> Download PDF
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="an-session-block">
                <h5 class="an-session-title">
                  <i class="fa-solid fa-calendar-check"></i> Session 2023-24
                </h5>
                <div class="an-items-list">
                  <div class="an-item-card">
                    <div class="d-flex align-items-center">
                      
                      <p class="an-item-title">Admission Notification- 2 (2023-24)  (B.E/B.PHARMA/D.PHARMA/M.TECH/M.PHARMA/MBA/MCA/BHMCT/ B. Arch. / B. Design/D</p>
                    </div>
                    <div>
                      <a href="https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Admission_Notification_2023-24_01_04112023_0304.pdf" target="_blank" rel="noopener" class="an-btn">
                        <i class="fa-solid fa-file-pdf"></i> Download PDF
                      </a>
                    </div>
                  </div>
                  <div class="an-item-card">
                    <div class="d-flex align-items-center">
                      
                      <p class="an-item-title">iploma Engineering)</p>
                    </div>
                    <div>
                      <a href="https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Admission_Notification_2023-24_01_04112023_0304.pdf" target="_blank" rel="noopener" class="an-btn">
                        <i class="fa-solid fa-file-pdf"></i> Download PDF
                      </a>
                    </div>
                  </div>
                  <div class="an-item-card">
                    <div class="d-flex align-items-center">
                      
                      <p class="an-item-title">NOTIFICATION (Enrollment)</p>
                    </div>
                    <div>
                      <a href="https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IMG_0001_29082023_1156.pdf" target="_blank" rel="noopener" class="an-btn">
                        <i class="fa-solid fa-file-pdf"></i> Download PDF
                      </a>
                    </div>
                  </div>
                  <div class="an-item-card">
                    <div class="d-flex align-items-center">
                      
                      <p class="an-item-title">Admission Notification -01 (2023-24)</p>
                    </div>
                    <div>
                      <a href="https://www.sssutms.co.in/cms/Areas/Website/Files/Link/admission 2023-24/IMG.pdf" target="_blank" rel="noopener" class="an-btn">
                        <i class="fa-solid fa-file-pdf"></i> Download PDF
                      </a>
                    </div>
                  </div>
                  <div class="an-item-card">
                    <div class="d-flex align-items-center">
                      
                      <p class="an-item-title">Admission Notification (2023-24) </p>
                    </div>
                    <div>
                      <a href="https://www.sssutms.co.in/cms/Areas/Website/Files/Widget/Download/IMG_0001.pdf" target="_blank" rel="noopener" class="an-btn">
                        <i class="fa-solid fa-file-pdf"></i> Download PDF
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="an-session-block">
                <h5 class="an-session-title">
                  <i class="fa-solid fa-calendar-check"></i> Session 2022-23
                </h5>
                <div class="an-items-list">
                  <div class="an-item-card">
                    <div class="d-flex align-items-center">
                      
                      <p class="an-item-title">Admission Notification- 2 (2022-23)  (B.E/B.PHARMA/D.PHARMA/M.TECH/M.PHARMA/MBA/MCA/BHMCT/ B. Arch. / B. Design/D</p>
                    </div>
                    <div>
                      <a href="https://www.sssutms.co.in/cms/Areas/Website/Files/Widget/Download/Admission_notification.pdf" target="_blank" rel="noopener" class="an-btn">
                        <i class="fa-solid fa-file-pdf"></i> Download PDF
                      </a>
                    </div>
                  </div>
                  <div class="an-item-card">
                    <div class="d-flex align-items-center">
                      
                      <p class="an-item-title">Admission Notification for NRI Candidate (2022-23)</p>
                    </div>
                    <div>
                      <a href="https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Con_NRI_2022-23_20082022_0446.pdf" target="_blank" rel="noopener" class="an-btn">
                        <i class="fa-solid fa-file-pdf"></i> Download PDF
                      </a>
                    </div>
                  </div>
                  <div class="an-item-card">
                    <div class="d-flex align-items-center">
                      
                      <p class="an-item-title">Admission Notification- I (2022-23)</p>
                    </div>
                    <div>
                      <a href="https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Admission/2022-23/admission_notification_2022-23.pdf" target="_blank" rel="noopener" class="an-btn">
                        <i class="fa-solid fa-file-pdf"></i> Download PDF
                      </a>
                    </div>
                  </div>
                  <div class="an-item-card">
                    <div class="d-flex align-items-center">
                      
                      <p class="an-item-title">  Notification For Online Entrance Examination 2022-23</p>
                    </div>
                    <div>
                      <a href="https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Admission/2022-23/Entrance_Exam_Admission notification.pdf" target="_blank" rel="noopener" class="an-btn">
                        <i class="fa-solid fa-file-pdf"></i> Download PDF
                      </a>
                    </div>
                  </div>
                  <div class="an-item-card">
                    <div class="d-flex align-items-center">
                      
                      <p class="an-item-title">Admission Counseling Schedule 2021-22 (Notification-3 )</p>
                    </div>
                    <div>
                      <a href="https://www.sssutms.co.in/cms/Areas/Website/Files/Link/ad_notificaron3_05022022_1245.pdf" target="_blank" rel="noopener" class="an-btn">
                        <i class="fa-solid fa-file-pdf"></i> Download PDF
                      </a>
                    </div>
                  </div>
                  <div class="an-item-card">
                    <div class="d-flex align-items-center">
                      
                      <p class="an-item-title">Admission Counseling Schedule 2021-22 (Notification 2)</p>
                    </div>
                    <div>
                      <a href="https://www.sssutms.co.in/cms/Areas/Website/Files/Link/ad_notification2_05022022_1241.pdf" target="_blank" rel="noopener" class="an-btn">
                        <i class="fa-solid fa-file-pdf"></i> Download PDF
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="an-session-block">
                <h5 class="an-session-title">
                  <i class="fa-solid fa-calendar-check"></i> Session 2021-22
                </h5>
                <div class="an-items-list">
                  <div class="an-item-card">
                    <div class="d-flex align-items-center">
                      
                      <p class="an-item-title">Enrollment form Open (2021-22)</p>
                    </div>
                    <div>
                      <a href="https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Notice/Enrollment_Notification21_22.pdf" target="_blank" rel="noopener" class="an-btn">
                        <i class="fa-solid fa-file-pdf"></i> Download PDF
                      </a>
                    </div>
                  </div>
                  <div class="an-item-card">
                    <div class="d-flex align-items-center">
                      
                      <p class="an-item-title">Notice for Student Enrollment (Pharmacy ) (2021-22)</p>
                    </div>
                    <div>
                      <a href="https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Notice/FOP.pdf" target="_blank" rel="noopener" class="an-btn">
                        <i class="fa-solid fa-file-pdf"></i> Download PDF
                      </a>
                    </div>
                  </div>
                  <div class="an-item-card">
                    <div class="d-flex align-items-center">
                      
                      <p class="an-item-title">(2021-22) For B.Sc.(Nursing  </p>
                    </div>
                    <div>
                      <a href="https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Notice/AAA_ENROLLMENT_NUR.pdf" target="_blank" rel="noopener" class="an-btn">
                        <i class="fa-solid fa-file-pdf"></i> Download PDF
                      </a>
                    </div>
                  </div>
                  <div class="an-item-card">
                    <div class="d-flex align-items-center">
                      
                      <p class="an-item-title">Notice for Student Enrollment (2021-22) For B.Ed. </p>
                    </div>
                    <div>
                      <a href="https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Notice/AAA_ENROLLMENT_BEd.pdf" target="_blank" rel="noopener" class="an-btn">
                        <i class="fa-solid fa-file-pdf"></i> Download PDF
                      </a>
                    </div>
                  </div>
                  <div class="an-item-card">
                    <div class="d-flex align-items-center">
                      
                      <p class="an-item-title">Admission Notice for Technical Courses (2021-22)</p>
                    </div>
                    <div>
                      <a href="https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Admission/AAdmission_Notice_technical_courses.pdf" target="_blank" rel="noopener" class="an-btn">
                        <i class="fa-solid fa-file-pdf"></i> Download PDF
                      </a>
                    </div>
                  </div>
                  <div class="an-item-card">
                    <div class="d-flex align-items-center">
                      
                      <p class="an-item-title">Admission Notice for NRI (2021-22)</p>
                    </div>
                    <div>
                      <a href="https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Admission/NRI admission.pdf" target="_blank" rel="noopener" class="an-btn">
                        <i class="fa-solid fa-file-pdf"></i> Download PDF
                      </a>
                    </div>
                  </div>
                  <div class="an-item-card">
                    <div class="d-flex align-items-center">
                      
                      <p class="an-item-title">Admission Counseling Schedule 2021-22</p>
                    </div>
                    <div>
                      <a href="https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Admission/admission notification II 2021_22R.pdf" target="_blank" rel="noopener" class="an-btn">
                        <i class="fa-solid fa-file-pdf"></i> Download PDF
                      </a>
                    </div>
                  </div>
                  <div class="an-item-card">
                    <div class="d-flex align-items-center">
                      
                      <p class="an-item-title">Admission Counseling Schedule 2021-22</p>
                    </div>
                    <div>
                      <a href="https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Admission/admission notification III 2021_22.pdf" target="_blank" rel="noopener" class="an-btn">
                        <i class="fa-solid fa-file-pdf"></i> Download PDF
                      </a>
                    </div>
                  </div>
                  <div class="an-item-card">
                    <div class="d-flex align-items-center">
                      
                      <p class="an-item-title">Admission Counseling Schedule 2021-22</p>
                    </div>
                    <div>
                      <a href="https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Admission/Admission_utd_2021_22.pdf" target="_blank" rel="noopener" class="an-btn">
                        <i class="fa-solid fa-file-pdf"></i> Download PDF
                      </a>
                    </div>
                  </div>
                  <div class="an-item-card">
                    <div class="d-flex align-items-center">
                      
                      <p class="an-item-title">B. Design. Admission Open 2021-22 Session</p>
                    </div>
                    <div>
                      <a href="&lt;?php echo BASE_URL; ?&gt;assets/images/Files/Link/Admission/SOD.jpg" target="_blank" rel="noopener" class="an-btn">
                        <i class="fa-solid fa-file-pdf"></i> Download PDF
                      </a>
                    </div>
                  </div>
                  <div class="an-item-card">
                    <div class="d-flex align-items-center">
                      
                      <p class="an-item-title">Notification For Online Entrance Examination 2021-22</p>
                    </div>
                    <div>
                      <a href="https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Admission/Admission_Entrance_Exam_2021_22.pdf" target="_blank" rel="noopener" class="an-btn">
                        <i class="fa-solid fa-file-pdf"></i> Download PDF
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="an-session-block">
                <h5 class="an-session-title">
                  <i class="fa-solid fa-calendar-check"></i> Paramedical Counseling Schedules
                </h5>
                <div class="an-items-list">
                  <div class="an-item-card">
                    <div class="d-flex align-items-center">
                      
                      <p class="an-item-title">Download Paramedical Admission Form</p>
                    </div>
                    <div>
                      <a href="https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Download/Para_Admission_Form_New.pdf" target="_blank" rel="noopener" class="an-btn">
                        <i class="fa-solid fa-file-pdf"></i> Download PDF
                      </a>
                    </div>
                  </div>
                  <div class="an-item-card">
                    <div class="d-flex align-items-center">
                      
                      <p class="an-item-title">Paramedical Admission Counseling Schedule 2019-20</p>
                    </div>
                    <div>
                      <a href="https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Admission/paramedical_2019.pdf" target="_blank" rel="noopener" class="an-btn">
                        <i class="fa-solid fa-file-pdf"></i> Download PDF
                      </a>
                    </div>
                  </div>
                  <div class="an-item-card">
                    <div class="d-flex align-items-center">
                      
                      <p class="an-item-title">Paramedical Admission Counseling Schedule 2018-19</p>
                    </div>
                    <div>
                      <a href="https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Admission/Para_2018_19N.pdf" target="_blank" rel="noopener" class="an-btn">
                        <i class="fa-solid fa-file-pdf"></i> Download PDF
                      </a>
                    </div>
                  </div>
                  <div class="an-item-card">
                    <div class="d-flex align-items-center">
                      
                      <p class="an-item-title">Paramedical Admission Counseling Schedule 2017-18</p>
                    </div>
                    <div>
                      <a href="https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Admission/Para_2017_18.pdf" target="_blank" rel="noopener" class="an-btn">
                        <i class="fa-solid fa-file-pdf"></i> Download PDF
                      </a>
                    </div>
                  </div>
                  <div class="an-item-card">
                    <div class="d-flex align-items-center">
                      
                      <p class="an-item-title">Paramedical Admission Counseling Schedule 2016-17</p>
                    </div>
                    <div>
                      <a href="https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Admission/Para_2016_17.pdf" target="_blank" rel="noopener" class="an-btn">
                        <i class="fa-solid fa-file-pdf"></i> Download PDF
                      </a>
                    </div>
                  </div>
                  <div class="an-item-card">
                    <div class="d-flex align-items-center">
                      
                      <p class="an-item-title">Paramedical Admission Counseling Schedule 2015-16</p>
                    </div>
                    <div>
                      <a href="https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Admission/Para_2015_16.pdf" target="_blank" rel="noopener" class="an-btn">
                        <i class="fa-solid fa-file-pdf"></i> Download PDF
                      </a>
                    </div>
                  </div>
                  <div class="an-item-card">
                    <div class="d-flex align-items-center">
                      
                      <p class="an-item-title">Paramedical Admission Counseling Schedule 2014-15</p>
                    </div>
                    <div>
                      <a href="https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Admission/Para_2014_15.pdf" target="_blank" rel="noopener" class="an-btn">
                        <i class="fa-solid fa-file-pdf"></i> Download PDF
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div><!-- end an-main-card -->
      </div><!-- end col-lg-8 -->

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
  var searchInput = document.getElementById('noticeSearchInput');
  var container = document.getElementById('noticeContainer');
  var countBadge = document.getElementById('noticeCount');
  if (searchInput && container) {
    var cards = container.querySelectorAll('.an-item-card');
    var blocks = container.querySelectorAll('.an-session-block');
    searchInput.addEventListener('input', function() {
      var query = this.value.toLowerCase().trim();
      var visible = 0;
      cards.forEach(function(card) {
        var text = card.textContent.toLowerCase();
        if (text.indexOf(query) !== -1) {
          card.style.display = '';
          visible++;
        } else {
          card.style.display = 'none';
        }
      });
      // Hide empty session blocks
      blocks.forEach(function(b) {
        var visibleCards = b.querySelectorAll('.an-item-card[style=""]');
        if (visibleCards.length === 0 && query !== '') {
          b.style.display = 'none';
        } else {
          b.style.display = '';
        }
      });
      if (countBadge) countBadge.textContent = visible;
    });
  }
});
</script>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
