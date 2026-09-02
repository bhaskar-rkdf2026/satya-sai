<?php
$page_title = 'Academic Calendar - SSSUTMS';
$banner_title = 'Academic Calendar';
$banner_category = 'Academic';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?>

<style>
.acad-cal-section { background-color: #f8fafc; }
.acad-cal-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15,23,42,0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}
.acad-cal-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2rem;
  position: relative;
}
.acad-cal-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.acad-cal-stat-chip {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 14px 18px;
  display: flex; align-items: center; gap: 14px;
  height: 100%;
  transition: all 0.2s ease;
}
.acad-cal-stat-chip:hover {
  border-color: #cbd5e1;
  box-shadow: 0 4px 14px rgba(0,0,0,0.04);
}
.acad-cal-stat-icon {
  width: 44px; height: 44px;
  border-radius: 10px;
  background: rgba(245,158,11,0.1);
  color: #d97706;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.25rem; flex-shrink: 0;
}
.acad-cal-year-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 1.5rem;
  box-shadow: 0 4px 16px rgba(0,0,0,0.02);
  margin-bottom: 1.5rem;
}
.acad-cal-year-title {
  display: flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 1.25rem;
  padding-bottom: 0.75rem;
  border-bottom: 2px solid #f1f5f9;
}
.acad-cal-year-title i {
  color: #f59e0b;
  font-size: 1.25rem;
}
.acad-cal-list {
  list-style: none;
  padding: 0;
  margin: 0;
}
.acad-cal-item {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 14px;
  border-radius: 8px;
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  margin-bottom: 8px;
  gap: 12px;
  transition: all 0.2s ease;
}
.acad-cal-item:hover {
  background: #f1f5f9;
  border-color: #cbd5e1;
}
.acad-cal-item-title {
  color: #0b2545;
  font-weight: 600;
  font-size: 0.9rem;
  display: flex;
  align-items: center;
  gap: 8px;
}
.acad-cal-badge-btn {
  background: linear-gradient(135deg, #0b2545 0%, #1e4d8c 100%) !important;
  color: #ffffff !important;
  font-size: 0.82rem;
  font-weight: 700;
  padding: 7px 10px;
  border-radius: 8px;
  border: 1px solid rgba(245,158,11,0.35);
  text-decoration: none !important;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 7px;
  white-space: nowrap;
  width: 195px;
  flex-shrink: 0;
  box-shadow: 0 2px 6px rgba(11,37,69,0.15);
  transition: all 0.25s ease;
}
.acad-cal-badge-btn i {
  color: #fbbf24 !important;
  transition: color 0.2s ease;
}
.acad-cal-badge-btn:hover {
  background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%) !important;
  color: #ffffff !important;
  border-color: #d97706;
  box-shadow: 0 4px 12px rgba(217,119,6,0.35);
  transform: translateY(-1px);
}
.acad-cal-badge-btn:hover i {
  color: #ffffff !important;
}
.acad-cal-no-link {
  color: #64748b;
  font-size: 0.82rem;
  font-weight: 600;
  font-style: italic;
  padding: 7px 10px;
}
</style>

<section class="subpage-main-section acad-cal-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="acad-cal-main-card">

          <!-- Banner Header -->
          <div class="acad-cal-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-calendar-days me-1"></i> Academic Schedules
              </span>
              <h3 class="fw-bold text-white mb-0 fs-3">ACADEMIC CALENDAR</h3>
            </div>
          </div>

          <!-- Body -->
          <div class="p-4">

            <!-- Stat Chips -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-sm-6 col-md-3">
                <div class="acad-cal-stat-chip">
                  <div class="acad-cal-stat-icon"><i class="fa-solid fa-calendar-check"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Session</div>
                    <div class="fw-bold text-dark fs-6">2026 - 2027</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="acad-cal-stat-chip">
                  <div class="acad-cal-stat-icon"><i class="fa-solid fa-clock-rotate-left"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Session</div>
                    <div class="fw-bold text-dark fs-6">2025 - 2026</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="acad-cal-stat-chip">
                  <div class="acad-cal-stat-icon"><i class="fa-solid fa-folder-open"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Session</div>
                    <div class="fw-bold text-dark fs-6">2024 - 2025</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="acad-cal-stat-chip">
                  <div class="acad-cal-stat-icon"><i class="fa-solid fa-box-archive"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Archive</div>
                    <div class="fw-bold text-dark fs-6">2023 &amp; Prior</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- ===== Academic Calendar 2026-27 ===== -->
            <div class="acad-cal-year-card">
              <div class="acad-cal-year-title">
                <i class="fa-solid fa-calendar-days"></i>
                <h5 class="fw-bold text-dark mb-0">Academic Calendar for the Year 2026-27</h5>
              </div>
              <ul class="acad-cal-list">
                <li class="acad-cal-item">
                  <div class="acad-cal-item-title">
                    <i class="fa-solid fa-file-pdf text-danger me-1"></i>
                    DIPLOMA ENGG./B. E./M.TECH/MCA/MBA/M. Pharma/B. Pharma/BHMCT (First Year)
                  </div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/academic_calendar/FIRST%20YEAR.pdf" target="_blank" rel="noopener" class="acad-cal-badge-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </li>
                <li class="acad-cal-item">
                  <div class="acad-cal-item-title">
                    <i class="fa-solid fa-file-pdf text-danger me-1"></i>
                    DIPLOMA ENGG./B. E./M.TECH/MCA/MBA/M. Pharma/B. Pharma/BHMCT (Second Year)
                  </div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/academic_calendar/SECOND%20YEAR.pdf" target="_blank" rel="noopener" class="acad-cal-badge-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </li>
                <li class="acad-cal-item">
                  <div class="acad-cal-item-title">
                    <i class="fa-solid fa-file-pdf text-danger me-1"></i>
                    DIPLOMA ENGG. (Third Year) /B. E./B. Pharma/BHMCT (Third &amp; Fourth Year)
                  </div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/academic_calendar/third%20and%20forth%20year.pdf" target="_blank" rel="noopener" class="acad-cal-badge-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </li>
                <li class="acad-cal-item">
                  <div class="acad-cal-item-title">
                    <i class="fa-solid fa-file-pdf text-danger me-1"></i>
                    UTD/EDUCATION/PHYSICAL EDUCATION/AGRICULTURE/LIBRARY SCIENCE (2026-27)
                  </div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/academic_calendar/acadmic_clan_09072026_0139.pdf" target="_blank" rel="noopener" class="acad-cal-badge-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </li>
                <li class="acad-cal-item">
                  <div class="acad-cal-item-title">
                    <i class="fa-solid fa-file-pdf text-danger me-1"></i>
                    Academic Calendar for the year 2026-27 (School of Law)
                  </div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/academic_calendar/academic_calendar_09072026_0224.pdf" target="_blank" rel="noopener" class="acad-cal-badge-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </li>
              </ul>
            </div>

            <!-- ===== Academic Calendar 2025-26 ===== -->
            <div class="acad-cal-year-card">
              <div class="acad-cal-year-title">
                <i class="fa-solid fa-calendar-days"></i>
                <h5 class="fw-bold text-dark mb-0">Academic Calendar for the Year 2025-26</h5>
              </div>
              <ul class="acad-cal-list">
                <li class="acad-cal-item">
                  <div class="acad-cal-item-title">
                    <i class="fa-solid fa-file-pdf text-danger me-1"></i>
                    Academic Calendar for the year 2025-2026 B.A.B.Ed /B.Ed/B.P.Ed
                  </div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/academic_calendar/Adobe_Scan_19_Aug_2025_(1)_21082025_1254.pdf" target="_blank" rel="noopener" class="acad-cal-badge-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </li>
                <li class="acad-cal-item">
                  <div class="acad-cal-item-title">
                    <i class="fa-solid fa-file-pdf text-danger me-1"></i>
                    ACADEMIC CALENDAR FOR I &amp; II YEAR 2025-26 FOR D.PHARMA
                  </div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/academic_calendar/Adobe_Scan_19_Aug_2025_21082025_1256.pdf" target="_blank" rel="noopener" class="acad-cal-badge-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </li>
                <li class="acad-cal-item">
                  <div class="acad-cal-item-title">
                    <i class="fa-solid fa-file-pdf text-danger me-1"></i>
                    Academic Calendar for the year 2025-26 for B.P.E.S PROGRAMME I ,II &amp; III Year
                  </div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/academic_calendar/bpes1-3_23082025_0420.pdf" target="_blank" rel="noopener" class="acad-cal-badge-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </li>
                <li class="acad-cal-item">
                  <div class="acad-cal-item-title">
                    <i class="fa-solid fa-file-pdf text-danger me-1"></i>
                    Academic Calendar for the year 2025-26 (School of Law)
                  </div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/academic_calendar/Adobe_Scan_21_Aug_2025_(2)_23082025_0422.pdf" target="_blank" rel="noopener" class="acad-cal-badge-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </li>
                <li class="acad-cal-item">
                  <div class="acad-cal-item-title">
                    <i class="fa-solid fa-file-pdf text-danger me-1"></i>
                    DIPLOMA ENGG./B. E./M.TECH/MCA/MBA/M. Pharma/B. Pharma/BHMCT (First Year)
                  </div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/academic_calendar/IMG_29092025_1027.pdf" target="_blank" rel="noopener" class="acad-cal-badge-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </li>
                <li class="acad-cal-item">
                  <div class="acad-cal-item-title">
                    <i class="fa-solid fa-file-pdf text-danger me-1"></i>
                    DIPLOMA ENGG./B. E./M.TECH/MCA/MBA/M. Pharma/B. Pharma/BHMCT (Second Year)
                  </div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/academic_calendar/BPHARMA_BE2YEAR_23082025_0427.pdf" target="_blank" rel="noopener" class="acad-cal-badge-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </li>
                <li class="acad-cal-item">
                  <div class="acad-cal-item-title">
                    <i class="fa-solid fa-file-pdf text-danger me-1"></i>
                    DIPLOMA ENGG. (Third Year) /B. E./B. Pharma/BHMCT (Third &amp; Fourth Year)
                  </div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/academic_calendar/BEDIPLOMA_BPHARMA_23082025_0426.pdf" target="_blank" rel="noopener" class="acad-cal-badge-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </li>
                <li class="acad-cal-item">
                  <div class="acad-cal-item-title">
                    <i class="fa-solid fa-file-pdf text-danger me-1"></i>
                    ACADEMIC CALENDAR FOR THE YEAR 2025-26 (MBBS)
                  </div>
                  <a href="#" class="acad-cal-badge-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </li>
                <li class="acad-cal-item">
                  <div class="acad-cal-item-title">
                    <i class="fa-solid fa-file-pdf text-danger me-1"></i>
                    ACADEMIC CALENDAR FOR THE YEAR 2025-26 (BAMS)
                  </div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/academic_calendar/BAMS_23082025_0424.pdf" target="_blank" rel="noopener" class="acad-cal-badge-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </li>
                <li class="acad-cal-item">
                  <div class="acad-cal-item-title">
                    <i class="fa-solid fa-file-pdf text-danger me-1"></i>
                    ACADEMIC CALENDAR FOR THE YEAR 2025-26 (BHMS-UG)
                  </div>
                  <a href="#" class="acad-cal-badge-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </li>
                <li class="acad-cal-item">
                  <div class="acad-cal-item-title">
                    <i class="fa-solid fa-file-pdf text-danger me-1"></i>
                    ACADEMIC CALENDAR FOR THE YEAR 2025-26 (BHMS -PG)
                  </div>
                  <a href="#" class="acad-cal-badge-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </li>
                <li class="acad-cal-item">
                  <div class="acad-cal-item-title">
                    <i class="fa-solid fa-file-pdf text-danger me-1"></i>
                    ACADEMIC CALENDAR FOR THE YEAR 2025-26 (UTD)
                  </div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/academic_calendar/UTD_23082025_0429.pdf" target="_blank" rel="noopener" class="acad-cal-badge-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </li>
              </ul>
            </div>

            <!-- ===== Academic Calendar 2024-25 ===== -->
            <div class="acad-cal-year-card">
              <div class="acad-cal-year-title">
                <i class="fa-solid fa-calendar-days"></i>
                <h5 class="fw-bold text-dark mb-0">Academic Calendar for the Year 2024-25</h5>
              </div>
              <ul class="acad-cal-list">
                <li class="acad-cal-item">
                  <div class="acad-cal-item-title">
                    <i class="fa-solid fa-file-pdf text-danger me-1"></i>
                    ACADEMIC CALENDAR FOR THE YEAR 2024-25 (MBBS)
                  </div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/academic_calendar/MBBS.pdf" target="_blank" rel="noopener" class="acad-cal-badge-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </li>
                <li class="acad-cal-item">
                  <div class="acad-cal-item-title">
                    <i class="fa-solid fa-file-pdf text-danger me-1"></i>
                    ACADEMIC CALENDAR FOR THE YEAR 2024-25 (BAMS)
                  </div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/academic_calendar/BAMS%20CALENDER.pdf" target="_blank" rel="noopener" class="acad-cal-badge-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </li>
                <li class="acad-cal-item">
                  <div class="acad-cal-item-title">
                    <i class="fa-solid fa-file-pdf text-danger me-1"></i>
                    ACADEMIC CALENDAR FOR THE YEAR 2024-25 (BHMS-UG)
                  </div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/academic_calendar/BHMS%20UG.pdf" target="_blank" rel="noopener" class="acad-cal-badge-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </li>
                <li class="acad-cal-item">
                  <div class="acad-cal-item-title">
                    <i class="fa-solid fa-file-pdf text-danger me-1"></i>
                    ACADEMIC CALENDAR FOR THE YEAR 2024-25 (BHMS -PG)
                  </div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/academic_calendar/BHMS%20PG.pdf" target="_blank" rel="noopener" class="acad-cal-badge-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </li>
                <li class="acad-cal-item">
                  <div class="acad-cal-item-title">
                    <i class="fa-solid fa-file-pdf text-danger me-1"></i>
                    ACADEMIC CALENDAR FOR THE YEAR 2024-25 (UTD)
                  </div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/academic_calendar/ACADEMIC%20CALENDAR%202024-2025.pdf" target="_blank" rel="noopener" class="acad-cal-badge-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </li>
                <li class="acad-cal-item">
                  <div class="acad-cal-item-title">
                    <i class="fa-solid fa-file-pdf text-danger me-1"></i>
                    Academic Calendar for the year 2024-2025 B.A.B.Ed /B.Ed/B.P.Ed
                  </div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/academic_calendar/Academic%20calender%202024-25.pdf" target="_blank" rel="noopener" class="acad-cal-badge-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </li>
                <li class="acad-cal-item">
                  <div class="acad-cal-item-title">
                    <i class="fa-solid fa-file-pdf text-danger me-1"></i>
                    ACADEMIC CALENDAR FOR I &amp; II YEAR 2024-25 FOR D.PHARMA
                  </div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/academic_calendar/Acadmic%20Calendra%20for%20Diploma%20in%20Pharmacy%202024-25.pdf" target="_blank" rel="noopener" class="acad-cal-badge-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </li>
                <li class="acad-cal-item">
                  <div class="acad-cal-item-title">
                    <i class="fa-solid fa-file-pdf text-danger me-1"></i>
                    Paramedical UG/PG/DIPLOMA Course (Yearly System)
                  </div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/academic_calendar/ACADEMIC%20CALENDAR%20OF%20PARAMEDICAL%20COURSES%20FOR%20SESSION%202024-25.pdf" target="_blank" rel="noopener" class="acad-cal-badge-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </li>
                <li class="acad-cal-item">
                  <div class="acad-cal-item-title">
                    <i class="fa-solid fa-file-pdf text-danger me-1"></i>
                    DIPLOMA ENGG./B. E./M.TECH/MCA/MBA/M. Pharma/B. Pharma/BHMCT (First Year)
                  </div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/academic_calendar/Academic%20Calander%202024-25%20(SOE).pdf" target="_blank" rel="noopener" class="acad-cal-badge-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </li>
                <li class="acad-cal-item">
                  <div class="acad-cal-item-title">
                    <i class="fa-solid fa-file-pdf text-danger me-1"></i>
                    DIPLOMA ENGG./B. E./M.TECH/MCA/MBA/M. Pharma/B. Pharma/BHMCT (Second Year)
                  </div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/academic_calendar/ACADEMIC%20CALENDAR%20FOR%20THE%20FIRST%20YEAR%202024-25%202year.pdf" target="_blank" rel="noopener" class="acad-cal-badge-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </li>
                <li class="acad-cal-item">
                  <div class="acad-cal-item-title">
                    <i class="fa-solid fa-file-pdf text-danger me-1"></i>
                    DIPLOMA ENGG. (Third Year) /B. E./B. Pharma/BHMCT (Third &amp; Fourth Year)
                  </div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/academic_calendar/ACADEMIC%20CALENDAR%20FOR%20THE%20FIRST%20YEAR%202024-25%203-4%20year.pdf" target="_blank" rel="noopener" class="acad-cal-badge-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </li>
                <li class="acad-cal-item">
                  <div class="acad-cal-item-title">
                    <i class="fa-solid fa-file-pdf text-danger me-1"></i>
                    Academic Calendar for the year 2024-25 (School of Law)
                  </div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/academic_calendar/Academic%20calendar%2024%20(1).pdf" target="_blank" rel="noopener" class="acad-cal-badge-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </li>
              </ul>
            </div>

            <!-- ===== Academic Calendar Previous Years ===== -->
            <div class="acad-cal-year-card">
              <div class="acad-cal-year-title">
                <i class="fa-solid fa-clock-rotate-left"></i>
                <h5 class="fw-bold text-dark mb-0">Academic Calendar for the Year 2023-24 &amp; Previous</h5>
              </div>
              <ul class="acad-cal-list">
                <li class="acad-cal-item">
                  <div class="acad-cal-item-title">
                    <i class="fa-solid fa-file-pdf text-danger me-1"></i>
                    Academic Calendar for Session 2023-24 (Yearly &amp; Semester System) UTD
                  </div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/academic_calendar/UTD.pdf" target="_blank" rel="noopener" class="acad-cal-badge-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </li>
                <li class="acad-cal-item">
                  <div class="acad-cal-item-title">
                    <i class="fa-solid fa-file-pdf text-danger me-1"></i>
                    Academic Calendar for All Paramedical 2023-24
                  </div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/academic_calendar/Paramedical.pdf" target="_blank" rel="noopener" class="acad-cal-badge-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </li>
                <li class="acad-cal-item">
                  <div class="acad-cal-item-title">
                    <i class="fa-solid fa-file-pdf text-danger me-1"></i>
                    Academic Calendar for Nursing Session 2023-24 (Yearly &amp; Semester System)
                  </div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/academic_calendar/Nursing.pdf" target="_blank" rel="noopener" class="acad-cal-badge-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </li>
                <li class="acad-cal-item">
                  <div class="acad-cal-item-title">
                    <i class="fa-solid fa-file-pdf text-danger me-1"></i>
                    Academic Calendar for the year 2023-24 (School of Law)
                  </div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/academic_calendar/Academic%20Calendar%202023-24%20(01)_LAW.pdf" target="_blank" rel="noopener" class="acad-cal-badge-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </li>
                <li class="acad-cal-item">
                  <div class="acad-cal-item-title">
                    <i class="fa-solid fa-file-pdf text-danger me-1"></i>
                    Academic Calendar for the year 2023-24 (Semester System B.A.B.Ed/ B.Ed/B.P.Ed)
                  </div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/academic_calendar/Academic%20Calendar%202023-24%20bed%20babed.pdf" target="_blank" rel="noopener" class="acad-cal-badge-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </li>
                <li class="acad-cal-item">
                  <div class="acad-cal-item-title">
                    <i class="fa-solid fa-file-pdf text-danger me-1"></i>
                    Academic Calendar 2023-24 DIPLOMA ENGG./B. E./M.TECH/MCA/MBA/M. Pharma/B. Pharma/BHMCT (First Year)
                  </div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/academic_calendar/FIRST%20YEAR%20.pdf" target="_blank" rel="noopener" class="acad-cal-badge-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </li>
                <li class="acad-cal-item">
                  <div class="acad-cal-item-title">
                    <i class="fa-solid fa-file-pdf text-danger me-1"></i>
                    Academic Calendar 2023-24 DIPLOMA ENGG./B. E./M.TECH/MCA/MBA/M. Pharma/B. Pharma/BHMCT (Second Year)
                  </div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/academic_calendar/Eng.pdf" target="_blank" rel="noopener" class="acad-cal-badge-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </li>
                <li class="acad-cal-item">
                  <div class="acad-cal-item-title">
                    <i class="fa-solid fa-file-pdf text-danger me-1"></i>
                    Academic Calendar 2023-24 DIPLOMA ENGG. (Third Year) /B. E./B. Pharma/BHMCT (Third &amp; Fourth Year)
                  </div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/academic_calendar/Academic%20Calendar%202023-24%20(01)_6.pdf" target="_blank" rel="noopener" class="acad-cal-badge-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </li>
                <li class="acad-cal-item">
                  <div class="acad-cal-item-title">
                    <i class="fa-solid fa-file-pdf text-danger me-1"></i>
                    Academic Calendar for the year 2022-23 (School of Homoeopathy)
                  </div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/academic_calendar/School%20of%20Homoeopathy.pdf" target="_blank" rel="noopener" class="acad-cal-badge-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </li>
                <li class="acad-cal-item">
                  <div class="acad-cal-item-title">
                    <i class="fa-solid fa-file-pdf text-danger me-1"></i>
                    Academic Calendar B.A.M.S. First Year 2023 - 24 (18 Months)
                  </div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/academic_calendar/BAMS.pdf" target="_blank" rel="noopener" class="acad-cal-badge-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </li>
                <li class="acad-cal-item">
                  <div class="acad-cal-item-title">
                    <i class="fa-solid fa-file-pdf text-danger me-1"></i>
                    Academic Calendar 2022-2023 B.E. Diploma/UG/PG/MBA/MCA/BHMCT (First &amp; Second Semester)
                  </div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/academic_calendar/IMG_0001_16022023_0256.pdf" target="_blank" rel="noopener" class="acad-cal-badge-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </li>
                <li class="acad-cal-item">
                  <div class="acad-cal-item-title">
                    <i class="fa-solid fa-file-pdf text-danger me-1"></i>
                    Academic Calendar 2022-2023 Pharmacy UG and PG Semester system (First &amp; Second Semester)
                  </div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/academic_calendar/IMG_16022023_0253.pdf" target="_blank" rel="noopener" class="acad-cal-badge-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </li>
                <li class="acad-cal-item">
                  <div class="acad-cal-item-title">
                    <i class="fa-solid fa-file-pdf text-danger me-1"></i>
                    Academic Calendar for Session 2022-23 (Yearly System-I, II &amp; III Year)
                  </div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/academic_calendar/Yearly%20System.pdf" target="_blank" rel="noopener" class="acad-cal-badge-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </li>
                <li class="acad-cal-item">
                  <div class="acad-cal-item-title">
                    <i class="fa-solid fa-file-pdf text-danger me-1"></i>
                    Academic Calendar 2022-23 (Semester System All UG, PG &amp; Diploma Engg.- III Semester Onward)
                  </div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/academic_calendar/All%20UG%20PG%20Diploma%20Semester.pdf" target="_blank" rel="noopener" class="acad-cal-badge-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </li>
                <li class="acad-cal-item">
                  <div class="acad-cal-item-title">
                    <i class="fa-solid fa-file-pdf text-danger me-1"></i>
                    Academic Calendar 2022-23 (Semester System B.A.B.Ed/ B.Ed/B.P.Ed)
                  </div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/academic_calendar/B.A.B.ED%20B.P.ED%20Semester.pdf" target="_blank" rel="noopener" class="acad-cal-badge-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </li>
                <li class="acad-cal-item">
                  <div class="acad-cal-item-title">
                    <i class="fa-solid fa-file-pdf text-danger me-1"></i>
                    Academic Calendar B.A.M.S. First Year 2021-22 to 2023 (18 Months)
                  </div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/academic_calendar/B.A.M.S..pdf" target="_blank" rel="noopener" class="acad-cal-badge-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </li>
                <li class="acad-cal-item">
                  <div class="acad-cal-item-title">
                    <i class="fa-solid fa-file-pdf text-danger me-1"></i>
                    Academic Calendar for the Year 2022-23 (Post Graduate Course)
                  </div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/academic_calendar/PG%20Yearly.pdf" target="_blank" rel="noopener" class="acad-cal-badge-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </li>
                <li class="acad-cal-item">
                  <div class="acad-cal-item-title">
                    <i class="fa-solid fa-file-pdf text-danger me-1"></i>
                    Academic Calendar B.A.M.S. First Year 2022 - 23 (18 Months)
                  </div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/academic_calendar/acdmic%20calendar%20bams%202022-23.pdf" target="_blank" rel="noopener" class="acad-cal-badge-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </li>
                <li class="acad-cal-item">
                  <div class="acad-cal-item-title">
                    <i class="fa-solid fa-file-pdf text-danger me-1"></i>
                    Academic Calendar for All Paramedical 2019-20
                  </div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/academic_calendar/Academic_Calender_for_Yearly_Paramedical_2019-20.pdf" target="_blank" rel="noopener" class="acad-cal-badge-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </li>
              </ul>
            </div>

          </div>
        </div><!-- end acad-cal-main-card -->
      </div><!-- end col-lg-8 -->

      <!-- Sticky Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>