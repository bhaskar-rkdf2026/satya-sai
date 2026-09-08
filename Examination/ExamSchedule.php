<?php $page_title = 'Exam Schedule - SSSUTMS';
$banner_title = 'Exam Schedule & Time Tables';
$banner_category = 'Examination';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?><style>
.naac-section { 
  background-color: #f8fafc;
  font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
}
.naac-main-card {
  background: #ffffff;
  border-radius: 16px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 25px rgba(15,23,42,0.06);
  overflow: hidden;
  margin-bottom: 2rem;
}
.naac-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%) !important;
  color: #ffffff !important;
  padding: 1.8rem 2rem;
  position: relative;
}
.naac-header-banner h3,
.naac-header-banner h2,
.naac-header-banner h1,
.naac-header-banner p {
  color: #ffffff !important;
  text-shadow: 0 1px 2px rgba(0,0,0,0.2);
}
.naac-header-banner p {
  color: rgba(255, 255, 255, 0.85) !important;
}
.naac-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}

/* Card Body & Typography Enhancements */
.naac-card-body { 
  padding: 2rem; 
  color: #1e293b !important;
  font-size: 0.975rem !important;
  line-height: 1.65 !important;
}
.naac-card-body p {
  color: #1e293b !important;
  font-size: 0.975rem !important;
  line-height: 1.65 !important;
  margin-bottom: 1rem;
}
.naac-card-body strong,
.naac-card-body b {
  color: #0f172a !important;
  font-weight: 700 !important;
}

/* Stat Chips (Medium Sized & Balanced) */
.res-stat-chip,
.es-stat-chip {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 12px 14px;
  display: flex;
  align-items: center;
  gap: 12px;
  height: 100%;
  transition: all 0.2s ease;
  box-shadow: 0 2px 6px rgba(15,23,42,0.03);
}
.res-stat-chip:hover,
.es-stat-chip:hover {
  border-color: #cbd5e1;
  box-shadow: 0 4px 14px rgba(11,37,69,0.06);
  transform: translateY(-2px);
}
.res-stat-icon,
.es-stat-icon {
  width: 38px;
  height: 38px;
  border-radius: 9px;
  background: rgba(245,158,11,0.12);
  color: #d97706;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.05rem;
  flex-shrink: 0;
}
.res-stat-label,
.es-stat-label {
  font-size: 0.75rem !important;
  font-weight: 700 !important;
  text-transform: uppercase !important;
  color: #64748b !important;
  letter-spacing: 0.3px !important;
  line-height: 1.25 !important;
  margin-bottom: 2px !important;
}
.res-stat-value,
.es-stat-value {
  font-size: 0.88rem !important;
  font-weight: 700 !important;
  color: #0f172a !important;
  line-height: 1.3 !important;
}

/* Section Header Bar */
.exam-session-header {
  background: #f1f5f9;
  border-left: 4px solid #0b2545;
  border-radius: 10px;
  padding: 1rem 1.25rem;
  margin-top: 2rem;
  margin-bottom: 1rem;
  box-shadow: 0 2px 6px rgba(15, 23, 42, 0.03);
}

/* Custom Table Container */
.table-responsive {
  border-radius: 12px;
  overflow-x: auto;
  border: 1px solid #cbd5e1;
  margin-top: 0.5rem;
  margin-bottom: 1.5rem;
}
.naac-custom-table {
  margin-bottom: 0 !important;
  width: 100% !important;
  border-collapse: collapse !important;
}

/* Unified Dark Navy Header Bar */
.naac-custom-table tr.naac-table-header,
.naac-custom-table thead tr {
  background-color: #0b2545 !important;
}
.naac-custom-table th,
.naac-custom-table tr.naac-table-header td,
.naac-custom-table tr.naac-table-header th {
  background-color: #0b2545 !important;
  color: #ffffff !important;
  font-weight: 700 !important;
  font-size: 0.88rem !important;
  text-transform: uppercase !important;
  letter-spacing: 0.5px !important;
  text-align: center !important;
  vertical-align: middle !important;
  padding: 15px 16px !important;
  border: 1px solid #134074 !important;
  border-right: 1px solid rgba(255, 255, 255, 0.15) !important;
}
.naac-custom-table th *,
.naac-custom-table tr.naac-table-header td *,
.naac-custom-table tr.naac-table-header th * {
  color: #ffffff !important;
  font-weight: 700 !important;
  background: transparent !important;
}

/* 100% Center Alignment for ALL Cells, Rows, Headers & Buttons */
.naac-custom-table th,
.naac-custom-table td,
.naac-custom-table tr td,
.naac-custom-table tr th {
  text-align: center !important;
  vertical-align: middle !important;
}
.naac-custom-table td * {
  text-align: center !important;
}
.naac-custom-table td {
  padding: 14px 18px !important;
  border: 1px solid #e2e8f0 !important;
  font-size: 0.925rem !important;
  color: #334155 !important;
  line-height: 1.5 !important;
  font-family: inherit !important;
}

/* Refined Row Hover Effects - Preserve Dark Text & Solid Dark Navy Button */
.naac-custom-table tbody tr:nth-child(even) td {
  background-color: #f8fafc !important;
}
.naac-custom-table tbody tr:hover td {
  background-color: #f1f5f9 !important;
  transition: background-color 0.15s ease-in-out !important;
}
.naac-custom-table tbody tr:hover td,
.naac-custom-table tbody tr:hover td span,
.naac-custom-table tbody tr:hover td div,
.naac-custom-table tbody tr:hover td p,
.naac-custom-table tbody tr:hover td strong {
  color: #0f172a !important;
  background-color: transparent !important;
}

/* Exact Button Styling (Dark Navy Pill + Golden Border + Yellow Icon) - Locked Against Row Hover Overrides */
.btn-naac-pdf,
.naac-custom-table tbody tr td .btn-naac-pdf,
.naac-custom-table tbody tr:hover td .btn-naac-pdf,
.naac-custom-table tbody tr:hover td a.btn-naac-pdf {
  background: linear-gradient(135deg, #0b2545 0%, #173866 100%) !important;
  color: #ffffff !important;
  border: 1.5px solid #d97706 !important;
  padding: 7px 18px !important;
  border-radius: 50px !important;
  font-weight: 700 !important;
  font-size: 0.85rem !important;
  text-decoration: none !important;
  display: inline-flex !important;
  align-items: center !important;
  justify-content: center !important;
  gap: 8px !important;
  transition: all 0.25s ease-in-out !important;
  box-shadow: 0 4px 12px rgba(11, 37, 69, 0.25) !important;
  white-space: nowrap !important;
}
.btn-naac-pdf i,
.naac-custom-table tbody tr td .btn-naac-pdf i,
.naac-custom-table tbody tr:hover td .btn-naac-pdf i,
.naac-custom-table tbody tr:hover td a.btn-naac-pdf i {
  color: #f59e0b !important;
  font-size: 0.9rem !important;
}

/* Direct Button Hover State */
.btn-naac-pdf:hover,
.naac-custom-table tbody tr td .btn-naac-pdf:hover,
.naac-custom-table tbody tr:hover td .btn-naac-pdf:hover,
.naac-custom-table tbody tr:hover td a.btn-naac-pdf:hover {
  background: linear-gradient(135deg, #173866 0%, #1e4b8a 100%) !important;
  border-color: #f59e0b !important;
  color: #ffffff !important;
  transform: translateY(-2px) !important;
  box-shadow: 0 6px 16px rgba(11, 37, 69, 0.35) !important;
}
.btn-naac-pdf:hover i,
.naac-custom-table tbody tr td .btn-naac-pdf:hover i,
.naac-custom-table tbody tr:hover td .btn-naac-pdf:hover i,
.naac-custom-table tbody tr:hover td a.btn-naac-pdf:hover i {
  color: #fbbf24 !important;
}
</style>

<section class="subpage-main-section naac-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-9 col-md-8">
        <div class="naac-main-card">
          <div class="naac-header-banner text-center text-md-start">
            <h3 class="fw-bold mb-1">EXAMINATION SCHEDULE &amp; TIME TABLES</h3>
            <p class="mb-0 text-white-50">Sri Satya Sai University of Technology and Medical Sciences &bull; Examination Cell</p>
          </div>
          
          <div class="naac-card-body">
            <article class="fs-5 lh-lg text-secondary">

              <!-- Stat Chips (Compact) -->
              <div class="row g-2 align-items-stretch mb-4">
                <div class="col-sm-6 col-md-3">
                  <div class="es-stat-chip">
                    <div class="es-stat-icon"><i class="fa-solid fa-calendar-days"></i></div>
                    <div>
                      <div class="es-stat-label">Session</div>
                      <div class="es-stat-value">2026 - 2024</div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="es-stat-chip">
                    <div class="es-stat-icon"><i class="fa-solid fa-notes-medical"></i></div>
                    <div>
                      <div class="es-stat-label">Medical</div>
                      <div class="es-stat-value">BAMS / BHMS</div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="es-stat-chip">
                    <div class="es-stat-icon"><i class="fa-solid fa-laptop-code"></i></div>
                    <div>
                      <div class="es-stat-label">Technical</div>
                      <div class="es-stat-value">BE / BCA / MCA</div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="es-stat-chip">
                    <div class="es-stat-icon"><i class="fa-solid fa-file-pdf"></i></div>
                    <div>
                      <div class="es-stat-label">Downloads</div>
                      <div class="es-stat-value">PDF Timetables</div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- SECTION 0 -->
              <div class="exam-session-header d-flex align-items-center justify-content-between">
                <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-clock text-primary me-2"></i> S.No. Time Table -2026</h5>
                <span class="badge bg-dark">Schedule</span>
              </div>
              <div class="table-responsive">
                <table class="table align-middle naac-custom-table">
                  <thead>
                    <tr class="naac-table-header">
                      <th style="width: 12%;">S.No.</th>
                      <th style="width: 68%;">Examination Schedule / Timetable Title</th>
                      <th style="width: 20%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="fw-bold text-dark">1</td>
                      <td class="fw-bold text-dark text-start text-md-center">First Professional Supplementary BAMS (2024–25 Batch) Examination September – 2026</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/Whatsapp_Scan_7_August_2026_at_14.03.58_07082026_0225.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">2</td>
                      <td class="fw-bold text-dark text-start text-md-center">B A M S (Second Professional) Reg. and Suppl. Examination Sep – 2026</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/Whatsapp_Scan_7_August_2026_at_14.49.17_%281%29_10082026_1251.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- SECTION 1 -->
              <div class="exam-session-header d-flex align-items-center justify-content-between">
                <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-clock text-primary me-2"></i> S.No. Time Table -2026</h5>
                <span class="badge bg-dark">Schedule</span>
              </div>
              <div class="table-responsive">
                <table class="table align-middle naac-custom-table">
                  <thead>
                    <tr class="naac-table-header">
                      <th style="width: 12%;">S.No.</th>
                      <th style="width: 68%;">Examination Schedule / Timetable Title</th>
                      <th style="width: 20%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="fw-bold text-dark">1</td>
                      <td class="fw-bold text-dark text-start text-md-center">Supplementary BHMS [Second Year] (2022-23 Batch) Aug–2026</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/SUPPLEMENTARY_EXAM_BHMS_2ND_YEAR_07082026_0105.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- SECTION 2 -->
              <div class="exam-session-header d-flex align-items-center justify-content-between">
                <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-clock text-primary me-2"></i> Examination July – 2026</h5>
                <span class="badge bg-dark">Schedule</span>
              </div>
              <div class="table-responsive">
                <table class="table align-middle naac-custom-table">
                  <thead>
                    <tr class="naac-table-header">
                      <th style="width: 12%;">S.No.</th>
                      <th style="width: 68%;">Examination Schedule / Timetable Title</th>
                      <th style="width: 20%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="fw-bold text-dark">1</td>
                      <td class="fw-bold text-dark text-start text-md-center">B A M S  3  Year  Professional </td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BAMS_3RD_YEAR_JULY_2026_30062026_0347.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- SECTION 3 -->
              <div class="exam-session-header d-flex align-items-center justify-content-between">
                <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-clock text-primary me-2"></i> Time Table</h5>
                <span class="badge bg-dark">Schedule</span>
              </div>
              <div class="table-responsive">
                <table class="table align-middle naac-custom-table">
                  <thead>
                    <tr class="naac-table-header">
                      <th style="width: 12%;">S.No.</th>
                      <th style="width: 68%;">Examination Schedule / Timetable Title</th>
                      <th style="width: 20%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="fw-bold text-dark">1</td>
                      <td class="fw-bold text-dark text-start text-md-center">B.Sc. (Hons.) Agriculture II Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BSC_%28HONS%29_II_SEM_JUNE_2026_03072026_1236.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">2</td>
                      <td class="fw-bold text-dark text-start text-md-center"> B A  LLB (HONS) I  Semester (Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="#" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">3</td>
                      <td class="fw-bold text-dark text-start text-md-center">BHMS III Year (2021-22)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BHMS_III_YEAR_JUNE_2026_23062026_0348.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">4</td>
                      <td class="fw-bold text-dark text-start text-md-center">IV Semester (Regular/Ex) As Per AICTE Scheme</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BCA_AICTE_IV_JUNE_2026_REVISED_12062026_1126.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">5</td>
                      <td class="fw-bold text-dark text-start text-md-center">IV Semester (Regular/Ex) As Per AICTE Scheme</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BBA_AICTE_IV_SEM_JUNE_2026_REVISED_TIME_TABLE_12062026_1123.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">6</td>
                      <td class="fw-bold text-dark text-start text-md-center">B.Sc.(Hons.)Agriculture III - IV Semester [Regular/Ex] </td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BSC%20%28HONS%29%20III-IV%20SEM%20JUNE%202026%20REVISED.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">7</td>
                      <td class="fw-bold text-dark text-start text-md-center">As Per AICTE Scheme</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BBA%20AICTE%20I-II%20SEM%20JUNE%202026.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">8</td>
                      <td class="fw-bold text-dark text-start text-md-center">As Per AICTE Scheme</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BBA_AICTE_III_SEM_JUNE_2026_14062026_0623.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">9</td>
                      <td class="fw-bold text-dark text-start text-md-center">As per AICTE Scheme</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BCA_AICTE__I-3_SEM_JUNE_2026_14062026_0624.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">10</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Arts (NEP) I -  IV Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BA%20NEP%20I-%20IV%20SEM%20JUNE%20%202026%20Time%20Table.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">11</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Science (NEP) I - IV Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BSC%20I%20-IV%20SEM%20NEP%20JUNE%202026%20Time%20Table.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">12</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Commerce (NEP) I - II Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BCOM%20NEP%20I%20II%20SEM%20JUNE%202026.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">13</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Commerce (NEP) III - IV Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BCOM%20NEP%20III%20IV%20SEM%20JUNE%202026.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- SECTION 4 -->
              <div class="exam-session-header d-flex align-items-center justify-content-between">
                <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-clock text-primary me-2"></i>  Time Table</h5>
                <span class="badge bg-dark">Schedule</span>
              </div>
              <div class="table-responsive">
                <table class="table align-middle naac-custom-table">
                  <thead>
                    <tr class="naac-table-header">
                      <th style="width: 12%;">S.No.</th>
                      <th style="width: 68%;">Examination Schedule / Timetable Title</th>
                      <th style="width: 20%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="fw-bold text-dark">1</td>
                      <td class="fw-bold text-dark text-start text-md-center">Ph.D. Course Work I  - II Semester June -2026</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/DocScanner_27_May_2026_1-42%E2%80%AFpm_27052026_0342.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">2</td>
                      <td class="fw-bold text-dark text-start text-md-center">As per AICTE Scheme (REVISED)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BE%20AICTE%20I-II%20SEM%20June%202026.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">3</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor Of  Interior Design I - II Semester[Regular/EX] </td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/Bachelor%20of%20Interior%20Design%20%20I-II%20Sem%20JUNE%202026.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">4</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Physiotherapy [First Year] Supplementary</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BPT%20I%20YEAR%20June%202026%20TIME%20TABLE.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">5</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Physiotherapy [Second Year]</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BPT%20II%20YEAR%20June%202026%20TIME%20TABLE.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">6</td>
                      <td class="fw-bold text-dark text-start text-md-center">Diploma Courses All [Second Year] Supplementary</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/DIPLOMA%20PARAMEDICAL%20II%20YEAR%20ALL%20JUNE-2026%20SUPP.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">7</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Arts Bachelor of Education II Semester (Regular/Ex) New Scheme</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BABED%20I%20TO%20II%20SEM%20JUNE%202026.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">8</td>
                      <td class="fw-bold text-dark text-start text-md-center">achelor of Law II Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/LLB%20II%20SEM%20JUNE%202026%20TIME%20TABLE.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">9</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Law I Semester (Ex) New Scheme  (Revised)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/LAW_I_SEM_JUNE_2026_TIME_TABLE_NEW_SCHEME_REVISED_%281%29_25062026_1247.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">10</td>
                      <td class="fw-bold text-dark text-start text-md-center">(Old Scheme)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/LAW%20I-II%20SEM%20JUNE%202026%20OLD%20SCHEME%20TIME%20TABLE.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">11</td>
                      <td class="fw-bold text-dark text-start text-md-center">As Per Sixth Dean Committee</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BSC%20%28HONS%29%20I-SEM%20JUNE%202026.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">12</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Physical Education I Semester (Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BPED%20I%20SEM%20JUNE%202026%20TIME%20TABLE.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">13</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Pharmacy I -II (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/B%20PHARMA%20I%20%26%20II%20SEM%20june%202026.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">14</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Pharmacy III - IV Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/B%20PHARMA%20IV%20%26%20III%20SEM%20June%202026.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">15</td>
                      <td class="fw-bold text-dark text-start text-md-center">BA LLB (HONS) I –II Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BA%20LLB%20I%20%26%20II%20SEM%20HONS%20JUNE%202026.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">16</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Engineering I &amp; II (Regular/Ex) Semester As per AICTE Scheme</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BE%20AICTE%20I-II%20SEM%20June%202026.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">17</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Hotel Management &amp; Catering Technology I- II Sem (Regular/EX)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BHMCT%20I%20II%20SEM%20June%202026.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">18</td>
                      <td class="fw-bold text-dark text-start text-md-center">Diploma in Engineering I -II Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/DIPLOMA%20ENGG%20SEM%20I%20II%20AICTE%20June%202026.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">19</td>
                      <td class="fw-bold text-dark text-start text-md-center">B.Sc. (Nursing) I - VII Semester [Regular/Ex]</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BSC%20NURSING%20I-II-VI-VII%20SEM%20updated%20JUNE%202026.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">20</td>
                      <td class="fw-bold text-dark text-start text-md-center">B.Sc. (Nursing) III - V Semester [Regular/Ex]</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BSC%20NURSING%20III-IV-V%20SEM%20JUNE%202026.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">21</td>
                      <td class="fw-bold text-dark text-start text-md-center">M D Homoeopathy I-YEAR</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="#" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">22</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Education I Semester(Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BED%20I%20SEM%20JUNE%202026%20TIME%20TABLE.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">23</td>
                      <td class="fw-bold text-dark text-start text-md-center">Master  of  Science I - II  Semester   (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MSC%20I%20II%20%20SEM%20JUNE%202026.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">24</td>
                      <td class="fw-bold text-dark text-start text-md-center">Master of Commerce I - II Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MCOM%20I%20II%20%20SEM%20JUNE%202026.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">25</td>
                      <td class="fw-bold text-dark text-start text-md-center">Master of Arts I - II Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MA%20I-II%20SEM%20JUNE%202026%20time%20table.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">26</td>
                      <td class="fw-bold text-dark text-start text-md-center">Master of Technology I Semester [Ex]</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MTECH%20I%20SEM%20June%202026.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">27</td>
                      <td class="fw-bold text-dark text-start text-md-center">Master of Physiotherapy (Orthopedic) First Year[Supplementary]</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/M-PHYSIOTHERAPY-ORTHOPEDIC%20I-YEAR%20JUNE%202026.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">28</td>
                      <td class="fw-bold text-dark text-start text-md-center"> Masters in Computer Application I Semester [Ex] New Scheme</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MCA%20I%20SEM%20JUNE%202026%20TIME%20TABLE.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">29</td>
                      <td class="fw-bold text-dark text-start text-md-center">Master of Business Administration I Semester(Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/Master%20of%20Business%20Administration%20I%20Semester%28Ex%29%20.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">30</td>
                      <td class="fw-bold text-dark text-start text-md-center">Master of Pharmacy I Semester (Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/M%20PHARMA%20I%20SEM%20JUNE%202026.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- SECTION 5 -->
              <div class="exam-session-header d-flex align-items-center justify-content-between">
                <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-clock text-primary me-2"></i>  Time Table     </h5>
                <span class="badge bg-dark">Schedule</span>
              </div>
              <div class="table-responsive">
                <table class="table align-middle naac-custom-table">
                  <thead>
                    <tr class="naac-table-header">
                      <th style="width: 12%;">S.No.</th>
                      <th style="width: 68%;">Examination Schedule / Timetable Title</th>
                      <th style="width: 20%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="fw-bold text-dark">1</td>
                      <td class="fw-bold text-dark text-start text-md-center">B. H. M. S. 1 YEAR AND 2 YEAR JUNE 2026</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BHMS%20I-II%20YEAR.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">2</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Hotel Management &amp; Catering Technology V- VIII  Semester (Reg/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BHMCT%20V%20VI%20VII%20VIII%20May%20June%202026%20Time%20Table.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">3</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Engineering V -VI  Semester (Regular/Ex) As per AICTE Scheme</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BE%20AICTE%20V%20VISEM%20MAY%20JUNE%202026.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">4</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Pharmacy V - VI  Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/B%20PHARMA%20V%20VI%20SEM%20May%20June%202026%20Time%20Table.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">5</td>
                      <td class="fw-bold text-dark text-start text-md-center">  B.Sc. (Hons.) Agriculture V -  VI Semester [Regular/Ex]</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BSC%20AG%20V%20VI%20May%20June%202026%20TIME%20TABLE.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">6</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Commerce (NEP) V - VI Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BCOM%20NEP%20V%20VI%20SEM%20May%20June%202026.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">7</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Business Administration (NEP) V - VI Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BBA%20NEP%20V%20VI%20SEM%20May%20June%202026.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">8</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Computer Application (NEP) V- VI Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BCA%20NEP%20V%20VI%20SEM%20May%20June%202026.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">9</td>
                      <td class="fw-bold text-dark text-start text-md-center">Diploma In Engineering III-IV Semester (Regular/ Ex)  As per AICTE Scheme</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/DIPLOMA%20ENGG%20SEM%20III%20IV%20AICTE%20May%20June%202026.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">10</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Library and Information Science I -II Semester (Regular/Ex</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BLIB%20I%20and%20II%20SEM%20May%20June%202026.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">11</td>
                      <td class="fw-bold text-dark text-start text-md-center">Master of Science IV Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MSC%20IV%20SEM%20MAY%20JUNE%202026%20TIME%20TABLE%20REVISED.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">12</td>
                      <td class="fw-bold text-dark text-start text-md-center">Post-Graduation Diploma in Computer Application I- II Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/PGDCA%20I%20II%20SEM%20May%20June%202026.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">13</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Arts (NEP) V - VI Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BA%20NEP%20V%20VI%20SEM%20May%20June%20%202026.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">14</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Science V To VI Semester (NEP) (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BSC%20V%20VI%20SEM%20NEP%20SEM%20May%20June%202026.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- SECTION 6 -->
              <div class="exam-session-header d-flex align-items-center justify-content-between">
                <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-clock text-primary me-2"></i> Time Table</h5>
                <span class="badge bg-dark">Schedule</span>
              </div>
              <div class="table-responsive">
                <table class="table align-middle naac-custom-table">
                  <thead>
                    <tr class="naac-table-header">
                      <th style="width: 12%;">S.No.</th>
                      <th style="width: 68%;">Examination Schedule / Timetable Title</th>
                      <th style="width: 20%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="fw-bold text-dark">1</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Arts Bachelor of Education III- VI Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BABED%20III-VI%20SEM%20JUNE%202026%20TIME%20TABLE%20new%20scheme.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">2</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Education II Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BED%20II%20SEM%20JUNE%202026%20TIME%20TABLE.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">3</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Hotel Management &amp; Catering Technology IV Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BHMCT%20IV%20SEM%20JUNE%202026.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">4</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor In Medical Lab Technician (First Year) Supplementary</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BMLT%20I%20YEAR%20SUPPLEMENTARY%20EXAM%20JUNE%2026.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">5</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Physical Education II Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BPED%20II%20SEM%20JUNE%202026%20TIME%20TABLE.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">6</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor Of Physiotherapy (Fourth Year)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BPT%20FOURTH%20YEAR%20JUNE%202026.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">7</td>
                      <td class="fw-bold text-dark text-start text-md-center">B.Sc.(Hons.)Agriculture III - IV Semester [Regular/Ex]</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BSC%20%28HONS%29%20III-IV%20SEM%20JUNE%202026.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">8</td>
                      <td class="fw-bold text-dark text-start text-md-center">Diploma in  Engineering IV  Semester (Regular /Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/DIP%20ENGG%20III%20IV%20SEM%20JUNE%202026%20TIME%20TABLE.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">9</td>
                      <td class="fw-bold text-dark text-start text-md-center">Diploma Courses All [First Year]</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/DIPLOMA%20COURSES%20ALL%20FIRST%20YEAR%20JUNE%202026.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">10</td>
                      <td class="fw-bold text-dark text-start text-md-center">Diploma Medical Lab Technician (Second Year)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/DMLT%20II%20YEAR%20JUNE%202026%20TIME%20TABLE.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">11</td>
                      <td class="fw-bold text-dark text-start text-md-center">Master of Pharmacy II Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/M%20PHARMA%20II%20SEM%20JUNE%20%202026%20Time%20Table.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">12</td>
                      <td class="fw-bold text-dark text-start text-md-center">Master of Business Administration II Semester [Regular/Ex]</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MBA%20II%20SEM%20%20JUNE%202026.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">13</td>
                      <td class="fw-bold text-dark text-start text-md-center">Masters in Computer Application II Semester [Regular/Ex] New Scheme</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MCA%20II%20SEM%20JUNE%202026%20TIME%20TABLE.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">14</td>
                      <td class="fw-bold text-dark text-start text-md-center">Master of Technology II Semester [Regular/Ex]</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MTECH%20II%20TO%20III%20SEM%20JUNE%202026.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- SECTION 7 -->
              <div class="exam-session-header d-flex align-items-center justify-content-between">
                <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-clock text-primary me-2"></i> Examination Dec – 2025</h5>
                <span class="badge bg-dark">Schedule</span>
              </div>
              <div class="table-responsive">
                <table class="table align-middle naac-custom-table">
                  <thead>
                    <tr class="naac-table-header">
                      <th style="width: 12%;">S.No.</th>
                      <th style="width: 68%;">Examination Schedule / Timetable Title</th>
                      <th style="width: 20%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="fw-bold text-dark">1</td>
                      <td class="fw-bold text-dark text-start text-md-center">(Regular)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BSC%20NURSING%20IV%20YEAR%20DEC%202025.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- SECTION 8 -->
              <div class="exam-session-header d-flex align-items-center justify-content-between">
                <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-clock text-primary me-2"></i>   S. No.                                   Time Table     </h5>
                <span class="badge bg-dark">Schedule</span>
              </div>
              <div class="table-responsive">
                <table class="table align-middle naac-custom-table">
                  <thead>
                    <tr class="naac-table-header">
                      <th style="width: 12%;">S.No.</th>
                      <th style="width: 68%;">Examination Schedule / Timetable Title</th>
                      <th style="width: 20%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="fw-bold text-dark">1</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Engineering 7 - 8  Semester (Regular/Ex) As per AICTE Scheme</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BE%20AICTE%20VII%20VIII%20SEM%20MAY%20JUNE%202026%20TIME%20TABLE.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">2</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Pharmacy 7 - 8 Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BPHARMA%208%207%20SEM%20MAY%20JUNE2026.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">3</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Physical Education (3 - 4 Sem) (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BPED%20III-IV%20SEM%20MAY%20JUNE%20TIME%20TABLE%202026.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">4</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of  Law  ( 5 - 6 Sem) (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/LAW_6___5_SEM_MAY_JUNE_2026.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">5</td>
                      <td class="fw-bold text-dark text-start text-md-center">Master of Business Administration (3 -  4 Semester) (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MBA%203%204%20SEM%20MAY%20JUNE-2026.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">6</td>
                      <td class="fw-bold text-dark text-start text-md-center">Master of Arts III to IV Semester [Regular/Ex]</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MA%20III-IV%20SEM%20MAY%20JUNE%202026%20time%20table.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">7</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Arts Bachelor of Education 7 - 8 Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BABED%20VII%20VIII%20SEM%20MAY%20JUNE%202026%20TIME%20TABLE.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">8</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Education (3 - 4  Sem) (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BED%20III%20IV%20SEM%20MAY%20JUNE%202026%20TIME%20TABLE.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">9</td>
                      <td class="fw-bold text-dark text-start text-md-center">Masters in Computer Application   III to IV Semester [Regular/Ex]</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MCA%20III-IV%20SEM%20MAY%20JUNE%202026%20TIME%20TABLE.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">10</td>
                      <td class="fw-bold text-dark text-start text-md-center">Diploma In Engineering V -VI Semester (Regular/ Ex)  As per AICTE Scheme</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/DIPLOMA%20IN%20ENGG%20V%20VI%20SEM%20AICTE%20MAY%20JUNE%202026%20TIME%20TABLE.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">11</td>
                      <td class="fw-bold text-dark text-start text-md-center">Diploma in Engineering V - VI Semester (Regular/Ex) (Old Scheme)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/DIP-ENGG%20V%20VI%20SEM%20MAY%20JUNE%202026%20TIME%20TABLE.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">12</td>
                      <td class="fw-bold text-dark text-start text-md-center">Master of Science III - IV Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MSC%20III-IV%20SEM%20MAY%20JUNE%202026%20TIME%20TABLE.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">13</td>
                      <td class="fw-bold text-dark text-start text-md-center">Master of Commerce III - IV Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MCOM%20III-IV%20MAY%20JUNE%202026.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- SECTION 9 -->
              <div class="exam-session-header d-flex align-items-center justify-content-between">
                <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-clock text-primary me-2"></i> Examination April – 2026</h5>
                <span class="badge bg-dark">Schedule</span>
              </div>
              <div class="table-responsive">
                <table class="table align-middle naac-custom-table">
                  <thead>
                    <tr class="naac-table-header">
                      <th style="width: 12%;">S.No.</th>
                      <th style="width: 68%;">Examination Schedule / Timetable Title</th>
                      <th style="width: 20%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="fw-bold text-dark">1</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Physical Education and Sports ( I - III ) Year (Regular)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BPES%20I%20-III%20YEAR%20APRIL%202026%20%282%29.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">2</td>
                      <td class="fw-bold text-dark text-start text-md-center">Diploma in Pharmacy ( I - II ) Year (Regular)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/D-PHARMA%20I-II%20year%202026.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- SECTION 10 -->
              <div class="exam-session-header d-flex align-items-center justify-content-between">
                <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-clock text-primary me-2"></i> Examination March – 2026</h5>
                <span class="badge bg-dark">Schedule</span>
              </div>
              <div class="table-responsive">
                <table class="table align-middle naac-custom-table">
                  <thead>
                    <tr class="naac-table-header">
                      <th style="width: 12%;">S.No.</th>
                      <th style="width: 68%;">Examination Schedule / Timetable Title</th>
                      <th style="width: 20%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="fw-bold text-dark">1</td>
                      <td class="fw-bold text-dark text-start text-md-center">B. A. M. S.  First Professional Examination (2024-25 Batch)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/First_Professional_Examination_%282024-25_Batch%29_20022026_1027.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- SECTION 11 -->
              <div class="exam-session-header d-flex align-items-center justify-content-between">
                <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-clock text-primary me-2"></i> Examination Feb – 2026</h5>
                <span class="badge bg-dark">Schedule</span>
              </div>
              <div class="table-responsive">
                <table class="table align-middle naac-custom-table">
                  <thead>
                    <tr class="naac-table-header">
                      <th style="width: 12%;">S.No.</th>
                      <th style="width: 68%;">Examination Schedule / Timetable Title</th>
                      <th style="width: 20%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="fw-bold text-dark">1</td>
                      <td class="fw-bold text-dark text-start text-md-center">SUPPLEMENTRY EXAMINATION –FEBRUARY -2026</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MBBS_FIRST_PROFESSIONAL_FEB-2026_17022026_0824.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- SECTION 12 -->
              <div class="exam-session-header d-flex align-items-center justify-content-between">
                <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-clock text-primary me-2"></i> Examination Dec – 2025</h5>
                <span class="badge bg-dark">Schedule</span>
              </div>
              <div class="table-responsive">
                <table class="table align-middle naac-custom-table">
                  <thead>
                    <tr class="naac-table-header">
                      <th style="width: 12%;">S.No.</th>
                      <th style="width: 68%;">Examination Schedule / Timetable Title</th>
                      <th style="width: 20%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="fw-bold text-dark">1</td>
                      <td class="fw-bold text-dark text-start text-md-center">Fourth Year]</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/updated_BHMS_II-IV_YEAR_JANUARY_2026_19022026_0214.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">2</td>
                      <td class="fw-bold text-dark text-start text-md-center">B.Sc. (Hons.) Agriculture II Semester [Ex</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/bsc_ag_2nd_sem_30012026_0957.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">3</td>
                      <td class="fw-bold text-dark text-start text-md-center">Diploma Medical Lab Technician (Second Year)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/DMLT_II_YEAR_DEC_2025_01012026_1106.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">4</td>
                      <td class="fw-bold text-dark text-start text-md-center">B.Sc. (Hons.) Agriculture I Semester [Regular]</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BSC_%28HONS%29_I-SEM_DEC_2025_AS_PER_SIXTH_DEAN_COMMITTEE_28122025_0932.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">5</td>
                      <td class="fw-bold text-dark text-start text-md-center">Master of Physiotherapy (Orthopedic) First Year</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/M-PHYSIOTHERAPY-ORTHOPEDIC_I-YEAR_28122025_0934.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">6</td>
                      <td class="fw-bold text-dark text-start text-md-center">B.Sc. (Nursing) II - VI SEM [Regular/Ex] </td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BSC_NURSING_II_-_VI_SEM_DEC_2025_26122025_1024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">7</td>
                      <td class="fw-bold text-dark text-start text-md-center">Ph.D Course Work Examination I-II Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/PHD_COURSE_WORK__I_II_SEM_DEC_2025_TIME_TABLE_DATE_UPDATE_24122025_0426.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">8</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor In Medical Lab Technician [First Year]</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/Bachelor%20In%20Lab%20Technician%20I%20YEAR%20DEC%202025.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">9</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Physiotherapy [Fourth Year]</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BPT%204%20YEAR%20DEC%202025%20TIME%20TABLE.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">10</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Physiotherapy [First Year]</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BPT%20I%20YEAR%20DEC%202025%20TIME%20TABLE.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">11</td>
                      <td class="fw-bold text-dark text-start text-md-center">Diploma Courses All [First Year]</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/PARAMEDICAL%20DIPLOMA%201%20YEAR%20ALL%20DEC%202025.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">12</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Pharmacy V Semester (Regular/Ex) </td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/B_PHARMA_V_SEM_Nov_Dec_2025_Revised_13122025_1230.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">13</td>
                      <td class="fw-bold text-dark text-start text-md-center">B H M S  I &amp; III Year Supplementary Exam</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BHMS%20I-III%20YEAR%20DEC%202025.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">14</td>
                      <td class="fw-bold text-dark text-start text-md-center">B.A.L.L.B. (HONS) I-SEMESTER REGULAR</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="#" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">15</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor Of Interior Design I Semester[Regular/Ex]</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/Bachelor%20of%20Interior%20Design%20%20I%20Sem%20NOV%20DEC%202025.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">16</td>
                      <td class="fw-bold text-dark text-start text-md-center">B A M S Regular Exam [Second Year] Professional </td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BAMS_II_YEAR_DEC_2025_REVISED_DATE_UPDATE_02122025_1116.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">17</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor Of  Interior Design  I  Semester[Regular/Ex]</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/Bachelor_of_Interior_Design__I_Sem_NOV_DEC_2025_06122025_0323.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">18</td>
                      <td class="fw-bold text-dark text-start text-md-center">M B A  I - II Semester [Reg/Ex]</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MBA_II_SEM__Nov-Dec-_2025_REVISED_04122025_1158.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">19</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Architecture I - V Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/Bachelor_of_Architecture_I-V_Sem_NOV_DEC_2025_04122025_0144.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">20</td>
                      <td class="fw-bold text-dark text-start text-md-center">B. Lib  I - II Semester (Regular/Ex) </td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BLIB_I_and_II_SEM_Nov-Dec_2025_REVISED_04122025_0143.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">21</td>
                      <td class="fw-bold text-dark text-start text-md-center">(Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MSC_I__SEM_NOV_DEC_2025_REVISED_03122025_0328.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">22</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Law I Semester (Regular/Ex) New Scheme</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/LAW%20I%20SEM%20NOV%20DEC%202025%20TIME%20TABLE%20NEW%20SCHEME.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">23</td>
                      <td class="fw-bold text-dark text-start text-md-center">Master of Science  II Semester   (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MSC_2_SEM_NOV_DEC_2025_03122025_0330.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">24</td>
                      <td class="fw-bold text-dark text-start text-md-center">Master of Commerce I - II Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MCOM%20I%20II%20%20SEM%20NOV%20DEC%202025.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">25</td>
                      <td class="fw-bold text-dark text-start text-md-center">B H M C T   I - II Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BHMCT%20I%20II%20SEM%20NOV%20DEC%202025.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">26</td>
                      <td class="fw-bold text-dark text-start text-md-center"> P G D C A I –II Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/PGDCA%20I%20II%20SEM%20NOV%20DEC%202025.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">27</td>
                      <td class="fw-bold text-dark text-start text-md-center"> B.Sc.(Hons.)Agriculture III -VI Semester [Regular\Ex]</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BSC_HONS_I-VI_SEM_NOV_DEC_2025_27112025_1028_16122025_0404_30012026_1006.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">28</td>
                      <td class="fw-bold text-dark text-start text-md-center">Diploma in Engineering I -II Semester (Reg / Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/DIPLOMA_ENGG_SEM_I_II_AICTE_NOV_DEC_2025_27112025_0241.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">29</td>
                      <td class="fw-bold text-dark text-start text-md-center">Diploma in Engineering III - IV Semester(Reg / Ex)As pe</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/DIPLOMA_ENGG_SEM_III_IV_AICTE_NOV_DEC_2025_28112025_1200.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">30</td>
                      <td class="fw-bold text-dark text-start text-md-center">Diploma in Engineering  V Semester(Reg / Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/DIP_ENGG_AICTE_V_SEM_NOV_DEC_2025_28112025_1201.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- SECTION 13 -->
              <div class="exam-session-header d-flex align-items-center justify-content-between">
                <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-clock text-primary me-2"></i> Time Table (As per AICTE Scheme)  </h5>
                <span class="badge bg-dark">Schedule</span>
              </div>
              <div class="table-responsive">
                <table class="table align-middle naac-custom-table">
                  <thead>
                    <tr class="naac-table-header">
                      <th style="width: 12%;">S.No.</th>
                      <th style="width: 68%;">Examination Schedule / Timetable Title</th>
                      <th style="width: 20%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="fw-bold text-dark">1</td>
                      <td class="fw-bold text-dark text-start text-md-center">S. No. Course First Year Second Year</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="#" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">2</td>
                      <td class="fw-bold text-dark text-start text-md-center">I sem 2 sem 3 Sem</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="#" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- SECTION 14 -->
              <div class="exam-session-header d-flex align-items-center justify-content-between">
                <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-clock text-primary me-2"></i> NEP Annual Scheme Examinations</h5>
                <span class="badge bg-dark">Schedule</span>
              </div>
              <div class="table-responsive">
                <table class="table align-middle naac-custom-table">
                  <thead>
                    <tr class="naac-table-header">
                      <th style="width: 12%;">S.No.</th>
                      <th style="width: 68%;">Examination Schedule / Timetable Title</th>
                      <th style="width: 20%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="fw-bold text-dark">1</td>
                      <td class="fw-bold text-dark text-start text-md-center">S. No. Course First Year Second Year Third Year </td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="#" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">2</td>
                      <td class="fw-bold text-dark text-start text-md-center">I sem 2 sem 3 sem 4 sem 5 sem 6 sem</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="#" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">3</td>
                      <td class="fw-bold text-dark text-start text-md-center">   Link</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BBA%20VI.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- SECTION 15 -->
              <div class="exam-session-header d-flex align-items-center justify-content-between">
                <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-clock text-primary me-2"></i> Examination Dec – 2025</h5>
                <span class="badge bg-dark">Schedule</span>
              </div>
              <div class="table-responsive">
                <table class="table align-middle naac-custom-table">
                  <thead>
                    <tr class="naac-table-header">
                      <th style="width: 12%;">S.No.</th>
                      <th style="width: 68%;">Examination Schedule / Timetable Title</th>
                      <th style="width: 20%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="fw-bold text-dark">1</td>
                      <td class="fw-bold text-dark text-start text-md-center">Diploma in Engineering III - IV Semester(Reg / Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/DIPLOMA_ENGG_SEM_III_IV_AICTE_NOV_DEC_2025_27112025_0239.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">2</td>
                      <td class="fw-bold text-dark text-start text-md-center">B.SC. NURSING I Semester (Regular) Batch-2024-25</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BSC_NURSING_I_SEM_BATCH_24-25_27112025_0240.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">3</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Engineering V (Regular/Ex) Semester</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BE%20AICTE%20V%20SEM%20NOV%20DEC%202025%20Revised.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">4</td>
                      <td class="fw-bold text-dark text-start text-md-center">Diploma in  Engineering I  to IV  Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/DIP%20ENGG%20I%20IV%20SEM%20NOV%20DEC%202025%20TIME%20TABLE.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">5</td>
                      <td class="fw-bold text-dark text-start text-md-center">Diploma in  Engineering V  to VI  Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/DIP%20ENGG%20V%20VI%20SEM%20NOV%20DEC%202025%20TIME%20TABLE.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">6</td>
                      <td class="fw-bold text-dark text-start text-md-center">Master of Technology ( I  to  III) Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MTECH%20I%20TO%20III%20SEM%20Nov%20Dec%202025.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">7</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Pharmacy I  to II Semester (Regular/Ex</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/B%20PHARMA%20I%20%20%20II%20SEM%20Nov%20Dec%202025%20Revised%2015-11-2025.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">8</td>
                      <td class="fw-bold text-dark text-start text-md-center">Master of Pharmacy I  to  II Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/M%20PHARMA%20I%20II%20SEM%20Nov%20Dec%20%202025.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">9</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Engineering I &amp; II (Regular/Ex) Semester</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BE%20AICTE%20I-II%20SEM%20NOV%20DEC%202025%20Revised.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">10</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Law II Semester (Ex)  Revised</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/LAW%20II%20SEM%20NOV%20DEC%202025%20REVISED.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">11</td>
                      <td class="fw-bold text-dark text-start text-md-center"> IV  Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MCOM%20III-IV%20NOV%20DEC%202025%20%281%29.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">12</td>
                      <td class="fw-bold text-dark text-start text-md-center">Master of Science III To IV Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MSC%20III-IV%20SEM%20Nov%20Dec%202025%20%281%29.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- SECTION 16 -->
              <div class="exam-session-header d-flex align-items-center justify-content-between">
                <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-clock text-primary me-2"></i> Examination Dec – 2025</h5>
                <span class="badge bg-dark">Schedule</span>
              </div>
              <div class="table-responsive">
                <table class="table align-middle naac-custom-table">
                  <thead>
                    <tr class="naac-table-header">
                      <th style="width: 12%;">S.No.</th>
                      <th style="width: 68%;">Examination Schedule / Timetable Title</th>
                      <th style="width: 20%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="fw-bold text-dark">1</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Pharmacy III To  VIII  Semester (Regular/EX)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/B%20PHARMACY%20I-VIII%20SEM%20NOV-DEC%202025%20TIME%20TABLE.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">2</td>
                      <td class="fw-bold text-dark text-start text-md-center">(Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BE%20I-8%20SEM%20AICTE%20NOV-DEC%202025%20TIME%20TABLE.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">3</td>
                      <td class="fw-bold text-dark text-start text-md-center">Masters in Business Administration  III  To IV Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MBA_III-IV_SEM_NOVDEC-2025_05122025_1204.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">4</td>
                      <td class="fw-bold text-dark text-start text-md-center">(Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BED%20I-IV%20SEM%20NOV-DEC-2025%20TIME%20TABLE.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">5</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Physical Education I To  IV  Sem (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BPED%20I-IV%20SEM%20NOV-DEC%202025%20TIME%20TABLE.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">6</td>
                      <td class="fw-bold text-dark text-start text-md-center">Master of Arts  I to  IV Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MA%20I-IV%20SEM%20Nov%20Dec%202025%20time%20table.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">7</td>
                      <td class="fw-bold text-dark text-start text-md-center">ters in Computer Application I - IV Semester [Regular/Ex]</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MCA%20I-IV%20SEM%20NOV%20DEC%202025%20TIME%20TABLE.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">8</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Arts Bachelor of Education 1 To 8 Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BABED_ALL_SEM_DEC_2025.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">9</td>
                      <td class="fw-bold text-dark text-start text-md-center">BACHELOR OF AYURVEDIC MEDICINE AND SURGERY I  YEAR </td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BAMSS_27112025_0259.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">10</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Law  ( I &amp; VI Sem) (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/LAW%20I-VI%20SEM%20NOV%20DEC%202025%20TIME%20TABLE%20OLD%20SCHEME.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">11</td>
                      <td class="fw-bold text-dark text-start text-md-center"> Bachelor of Hotel Management &amp; Catering Technology  III  To  VII Semester [Reg/ EX]</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BHMCT%20%203-8%20%20NOV-DEC-2025%20TIME%20TABLE.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- SECTION 17 -->
              <div class="exam-session-header d-flex align-items-center justify-content-between">
                <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-clock text-primary me-2"></i> S. No. Time Table</h5>
                <span class="badge bg-dark">Schedule</span>
              </div>
              <div class="table-responsive">
                <table class="table align-middle naac-custom-table">
                  <thead>
                    <tr class="naac-table-header">
                      <th style="width: 12%;">S.No.</th>
                      <th style="width: 68%;">Examination Schedule / Timetable Title</th>
                      <th style="width: 20%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="fw-bold text-dark">1</td>
                      <td class="fw-bold text-dark text-start text-md-center">MBBS First Professional Examination</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MBBS12_01102025_0945.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- SECTION 18 -->
              <div class="exam-session-header d-flex align-items-center justify-content-between">
                <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-clock text-primary me-2"></i> Examination Aug – 2025</h5>
                <span class="badge bg-dark">Schedule</span>
              </div>
              <div class="table-responsive">
                <table class="table align-middle naac-custom-table">
                  <thead>
                    <tr class="naac-table-header">
                      <th style="width: 12%;">S.No.</th>
                      <th style="width: 68%;">Examination Schedule / Timetable Title</th>
                      <th style="width: 20%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="fw-bold text-dark">1</td>
                      <td class="fw-bold text-dark text-start text-md-center">Master of Physiotherapy (Orthopedic) First Year</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MPT__YEAR_SUPPL_JUNE_2025_21062025_0743.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">2</td>
                      <td class="fw-bold text-dark text-start text-md-center">Master of Medical Lab Technology (Haematology)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MMLT__YEAR_SUPPL_JUNE_2025_21062025_0740.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">3</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Physiotherapy [First Year]  Supplementary</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BPT_I_YEAR_SUPPL_JUNE_2025_21062025_0742.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">4</td>
                      <td class="fw-bold text-dark text-start text-md-center">Paramedical</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/DIPLOMA_all_NEELAM_SHARMA_06092025_0311.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">5</td>
                      <td class="fw-bold text-dark text-start text-md-center">Paramedical Diploma Courses First Year [Regular]</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/DIPLOMA_ALL_I_YEAR_SUPPL_JUNE_2025_21062025_0737.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">6</td>
                      <td class="fw-bold text-dark text-start text-md-center">Diploma in Pharmacy First &amp; Second Year(Supplementary)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/Diploma_Pharmacy_I___II_YEAR%20SEPTEMBER_2024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">7</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Physical Education and Sports (I To III Year ) Supplementary</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/bpes.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">8</td>
                      <td class="fw-bold text-dark text-start text-md-center">Supplementary</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/bpt%202.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">9</td>
                      <td class="fw-bold text-dark text-start text-md-center">Second Year</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MPT_II_YEAR_SEP_2025_04092025_1113.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">10</td>
                      <td class="fw-bold text-dark text-start text-md-center">Second Year</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MMLT_II_YEAR_SEP_2025_04092025_1112.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- SECTION 19 -->
              <div class="exam-session-header d-flex align-items-center justify-content-between">
                <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-clock text-primary me-2"></i> Examination June – 2024</h5>
                <span class="badge bg-dark">Schedule</span>
              </div>
              <div class="table-responsive">
                <table class="table align-middle naac-custom-table">
                  <thead>
                    <tr class="naac-table-header">
                      <th style="width: 12%;">S.No.</th>
                      <th style="width: 68%;">Examination Schedule / Timetable Title</th>
                      <th style="width: 20%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="fw-bold text-dark">1</td>
                      <td class="fw-bold text-dark text-start text-md-center">  (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BBA.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">2</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Arts I To IV Semester (NEP) (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BA.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">3</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Science I To IV Semester (NEP) (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BSC.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">4</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Commerce I To IV Semester (NEP) (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BCOM.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">5</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Computer Application I To IV Semester (NEP) (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BCA.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">6</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Pharmacy I Semester (Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/b.pharma1ex.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- SECTION 20 -->
              <div class="exam-session-header d-flex align-items-center justify-content-between">
                <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-clock text-primary me-2"></i> S. No. Time Table</h5>
                <span class="badge bg-dark">Schedule</span>
              </div>
              <div class="table-responsive">
                <table class="table align-middle naac-custom-table">
                  <thead>
                    <tr class="naac-table-header">
                      <th style="width: 12%;">S.No.</th>
                      <th style="width: 68%;">Examination Schedule / Timetable Title</th>
                      <th style="width: 20%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="fw-bold text-dark">1</td>
                      <td class="fw-bold text-dark text-start text-md-center">Ph.D Course Work Examination ( I Semester)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/Time_Table_PhD_CW_June_2025_17082025_0208.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- SECTION 21 -->
              <div class="exam-session-header d-flex align-items-center justify-content-between">
                <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-clock text-primary me-2"></i> Examination June – 2025</h5>
                <span class="badge bg-dark">Schedule</span>
              </div>
              <div class="table-responsive">
                <table class="table align-middle naac-custom-table">
                  <thead>
                    <tr class="naac-table-header">
                      <th style="width: 12%;">S.No.</th>
                      <th style="width: 68%;">Examination Schedule / Timetable Title</th>
                      <th style="width: 20%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="fw-bold text-dark">1</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Arts I Semester (Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BA_NEP_I_SEM_EX_JUNE_2025_DATE_REVISED_19062025_0210_17082025_0149.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">2</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Business Administration I Semester (Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BBA_NEP_1_AICTE_SEM_JUNE_2025_16062025_0202_830_17082025_0151.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">3</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Computer Application  I Semester (Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BCAA_1_11062025_0401_aicte_17082025_0147.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">4</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of commerce I Semester (Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/B_COM_1_11062025_0335_17082025_0152.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">5</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Science I Semester (Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BSC_NEP_1_SEM_JUNE_2025_16062025_1234_%281%292025_17082025_0153.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- SECTION 22 -->
              <div class="exam-session-header d-flex align-items-center justify-content-between">
                <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-clock text-primary me-2"></i> S. No. Time Table   Supplementary Exam</h5>
                <span class="badge bg-dark">Schedule</span>
              </div>
              <div class="table-responsive">
                <table class="table align-middle naac-custom-table">
                  <thead>
                    <tr class="naac-table-header">
                      <th style="width: 12%;">S.No.</th>
                      <th style="width: 68%;">Examination Schedule / Timetable Title</th>
                      <th style="width: 20%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="fw-bold text-dark">1</td>
                      <td class="fw-bold text-dark text-start text-md-center">Paramedical Diploma Courses First Year [Supplementary Exam]</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/DIPLOMA_ALL_I_YEAR_SUPPL_JUNE_2025_21062025_0737.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">2</td>
                      <td class="fw-bold text-dark text-start text-md-center">First Year</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MMLT__YEAR_SUPPL_JUNE_2025_21062025_0740.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">3</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Physiotherapy [First Year]</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BPT_I_YEAR_SUPPL_JUNE_2025_21062025_0742.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">4</td>
                      <td class="fw-bold text-dark text-start text-md-center">Master of Physiotherapy (Orthopaedic) First Year</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MPT__YEAR_SUPPL_JUNE_2025_21062025_0743.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">5</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Physiotherapy [Second Year]</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/PDF_Scanner_210625_4.46.40_21062025_0744.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">6</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Hotel Management &amp; Catering Technology VII Semester [EX]</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BHMCT_VII_EX_TIME_TABLE_2025_27062025_0307.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">7</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Homoeopathic Medicine &amp; Surgery I YEAR</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BHMS_I_YEAR_2025_TIME_TABLE_29062025_0112.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">8</td>
                      <td class="fw-bold text-dark text-start text-md-center">Revised</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BPED_I_SEM_2025_REVISED_09072025_0106.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- SECTION 23 -->
              <div class="exam-session-header d-flex align-items-center justify-content-between">
                <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-clock text-primary me-2"></i> S. No. Time Table   </h5>
                <span class="badge bg-dark">Schedule</span>
              </div>
              <div class="table-responsive">
                <table class="table align-middle naac-custom-table">
                  <thead>
                    <tr class="naac-table-header">
                      <th style="width: 12%;">S.No.</th>
                      <th style="width: 68%;">Examination Schedule / Timetable Title</th>
                      <th style="width: 20%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="fw-bold text-dark">1</td>
                      <td class="fw-bold text-dark text-start text-md-center">Masters in Computer Application I Semester |Ex] New Scheme</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/mca_1st_19062025_1200.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">2</td>
                      <td class="fw-bold text-dark text-start text-md-center">Masters in Computer Application II Semester (Regular/Ex] New Scheme</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/mca_2nd_19062025_1201.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">3</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Homoeopathic Medicine &amp; Surgery III YEAR</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BHMS_III_YEAR_2025_TIME_TABLE_29062025_0112.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- SECTION 24 -->
              <div class="exam-session-header d-flex align-items-center justify-content-between">
                <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-clock text-primary me-2"></i> Time Table (As per AICTE Scheme)</h5>
                <span class="badge bg-dark">Schedule</span>
              </div>
              <div class="table-responsive">
                <table class="table align-middle naac-custom-table">
                  <thead>
                    <tr class="naac-table-header">
                      <th style="width: 12%;">S.No.</th>
                      <th style="width: 68%;">Examination Schedule / Timetable Title</th>
                      <th style="width: 20%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="fw-bold text-dark">1</td>
                      <td class="fw-bold text-dark text-start text-md-center">S. No. Course First Year</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="#" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">2</td>
                      <td class="fw-bold text-dark text-start text-md-center">I sem 2 sem</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="#" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- SECTION 25 -->
              <div class="exam-session-header d-flex align-items-center justify-content-between">
                <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-clock text-primary me-2"></i> NEP Annual Scheme Examinations</h5>
                <span class="badge bg-dark">Schedule</span>
              </div>
              <div class="table-responsive">
                <table class="table align-middle naac-custom-table">
                  <thead>
                    <tr class="naac-table-header">
                      <th style="width: 12%;">S.No.</th>
                      <th style="width: 68%;">Examination Schedule / Timetable Title</th>
                      <th style="width: 20%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="fw-bold text-dark">1</td>
                      <td class="fw-bold text-dark text-start text-md-center">S. No. Course First Year Second Year Third Year </td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="#" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">2</td>
                      <td class="fw-bold text-dark text-start text-md-center">I sem 2 sem 3 sem 4 sem 5 sem 6sem</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="#" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- SECTION 26 -->
              <div class="exam-session-header d-flex align-items-center justify-content-between">
                <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-clock text-primary me-2"></i> S. No. Time Table   </h5>
                <span class="badge bg-dark">Schedule</span>
              </div>
              <div class="table-responsive">
                <table class="table align-middle naac-custom-table">
                  <thead>
                    <tr class="naac-table-header">
                      <th style="width: 12%;">S.No.</th>
                      <th style="width: 68%;">Examination Schedule / Timetable Title</th>
                      <th style="width: 20%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="fw-bold text-dark">1</td>
                      <td class="fw-bold text-dark text-start text-md-center">B.Sc. (Nursing) I - V Semester [Regular/Ex]</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BSC_NURSING_JUNE_2025_03062025_0351.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">2</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Education I Semester (Ex) Revised</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BED_IST_SEM_REVISED_JUNE_2025_06062025_0209.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">3</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Law III Semester (Ex) Revised</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/LLB_3RD_REVISED_06062025_0430.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">4</td>
                      <td class="fw-bold text-dark text-start text-md-center">Regular]</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/PB_BSC_NURSING_ALL_DEC_2023_10062025_0259.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">5</td>
                      <td class="fw-bold text-dark text-start text-md-center">Master of Science   I  - II Semester ( Reg/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MSC_I_II_SEM_JUNE_2025_DATE_REVISED_%281%29_12062025_1058.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- SECTION 27 -->
              <div class="exam-session-header d-flex align-items-center justify-content-between">
                <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-clock text-primary me-2"></i> S. No. Time Table   </h5>
                <span class="badge bg-dark">Schedule</span>
              </div>
              <div class="table-responsive">
                <table class="table align-middle naac-custom-table">
                  <thead>
                    <tr class="naac-table-header">
                      <th style="width: 12%;">S.No.</th>
                      <th style="width: 68%;">Examination Schedule / Timetable Title</th>
                      <th style="width: 20%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="fw-bold text-dark">1</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Engineering I to II Semester (Regular/Ex) As per AICTE Scheme  Revised</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BE_AICTE_ALL_SEM_DEC_2025_1ST_TO_II_REvised_11062025_0201.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">2</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Pharmacy I to II Semester (Regular/Ex) Revised</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/B.PHARMA_I_TO_II_SEM_MAY-_JUNE_2025_Revised_11062025_0158.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">3</td>
                      <td class="fw-bold text-dark text-start text-md-center">B.Sc. (Hons.) Agriculture I to II Semester [Regular/Ex]  </td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/bsc_AG_16052025_1129.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">4</td>
                      <td class="fw-bold text-dark text-start text-md-center">Master of Arts  I to  IV Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MA_ALL_SEM_%28correct%29_time_table_2025_16052025_1139.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">5</td>
                      <td class="fw-bold text-dark text-start text-md-center">(REVISED)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/law_I_II_sem_June_2025_Subject_revised_12062025_1229.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">6</td>
                      <td class="fw-bold text-dark text-start text-md-center">Diploma in  Engineering I  to II  Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/DIPLOMA_ENGG_I-II_SEM_AICTE_JUNE_2025__1__11062025_0200.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">7</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Hotel Management &amp; Catering Technology I  to II Semester [Regular/EX]</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BHMCT_I_TO_VI_SEM_JUNE_2024_16052025_1132.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">8</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Education (2  Sem) (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BED_II_SEM_JUNE_2024_16052025_1133_06062025_0214.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">9</td>
                      <td class="fw-bold text-dark text-start text-md-center">Master of Pharmacy  I - II Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MPHARMA_I_II_JUNE_2025_I_OR_II_SEM_revised_update3_17052025_1223.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">10</td>
                      <td class="fw-bold text-dark text-start text-md-center">Master of Technology I - II Semester [Regular/Ex] Revised</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MTECH_I_TO_II_SEM_JUNE_2025_revised_update4_17052025_1221_25062025_0320.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">11</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Physical Education  2 Sem (Regular/Ex) </td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BPED_II_SEM_JUNE_2025_16052025_1134_09072025_0105.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">12</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Pharmacy III-IV Semester [Regular/Ex] Revised</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/B.PHARMA_III_OR_IV_SEM_JUNE_2025_Revised_Update2_17052025_1220.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">13</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Engineering III - IV Semester Regular/Ex As per AICTE Scheme</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BE_AICTE_III_OR_IV_SEM_JUNE_2025_REVISED_UPDATE1_17052025_1220.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">14</td>
                      <td class="fw-bold text-dark text-start text-md-center">Masters in Computer Application III - IV Semester [Regular/Ex] </td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MCA_4_%26_3_SEM_MAY_JUNE_2024_19052025_1027.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">15</td>
                      <td class="fw-bold text-dark text-start text-md-center">Master of Business Administration I - II Semester [Regular/Ex]</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MBA_I%26II_SEM__MAY-_JUNE_2025_19052025_1040.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">16</td>
                      <td class="fw-bold text-dark text-start text-md-center">Post-Graduation Diploma in Computer Application I Semester (Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/PGDCA__1_SEM_MAY_JUNE_2025_Update_19-5-2025_20052025_1021.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">17</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Arts Bachelor of Education 6 Semester (Regular/Ex) Revised</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BABEDVISEM_JUNE_2025_26052025_1103.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">18</td>
                      <td class="fw-bold text-dark text-start text-md-center">Master of Commerce I - II Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/Master_of_Commerce_26052025_1108.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">19</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Homoeopathic Medicine &amp; Surgery II &amp; IV YEAR</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BHMS_II_and_iv_Time_Table_June_28062025_0143.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">20</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Architecture I - II Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/Bachelor_of_Architecture_I-II_Semester__JUNE_2025_29052025_0153.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">21</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Physiotherapy III - IV   (Supplementary Exam)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BPT_III-IV_June_2025_supp._29052025_0157.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">22</td>
                      <td class="fw-bold text-dark text-start text-md-center">Diploma Dialysis Technician [Second Year]  (Supplementary Exam)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/DIPLOMA_DIALYSIS_june_2025_supp._29052025_0212.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">23</td>
                      <td class="fw-bold text-dark text-start text-md-center">Diploma in  Engineering III -IV  Semester (Ex/Regular)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/DIPLOMA_ENGG_III-IV_SEM_MAY-JUNE_2025_29052025_0200.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">24</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor  of Architecture III -IV Semester (Ex/Regular)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/Bachelor_of_Architecture_III-IV_Semester__JUNE_2025_29052025_1138.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- SECTION 28 -->
              <div class="exam-session-header d-flex align-items-center justify-content-between">
                <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-clock text-primary me-2"></i>   S. No.                                   Time Table     </h5>
                <span class="badge bg-dark">Schedule</span>
              </div>
              <div class="table-responsive">
                <table class="table align-middle naac-custom-table">
                  <thead>
                    <tr class="naac-table-header">
                      <th style="width: 12%;">S.No.</th>
                      <th style="width: 68%;">Examination Schedule / Timetable Title</th>
                      <th style="width: 20%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="fw-bold text-dark">1</td>
                      <td class="fw-bold text-dark text-start text-md-center">Scheme</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BE_AICTE_8___7_SEM_JUNE_2025.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">2</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Pharmacy 7 - 8 Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BPHARMA_8___7_SEM_MAY_JUNE_2025%20%281%29.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">3</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Physical Education (3 - 4 Sem) (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BPED_4___3_SEM_MAY_JUNE_2025.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">4</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of  Law  ( 5 - 6 Sem) (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/LAW_6___5_SEM_MAY_JUNE_2025.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">5</td>
                      <td class="fw-bold text-dark text-start text-md-center">ar/Ex]  </td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/AG_V_To_VI_SEM_JUNE_2025.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">6</td>
                      <td class="fw-bold text-dark text-start text-md-center">Master of Business Administration (3 -  4 Semester) (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MBA_4___3_SEM_MAY_JUNE_2025%20%281%29.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">7</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Arts Bachelor of Education 8 Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BABED_8_SEM_MAY_JUNE_2025.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">8</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Education (3 - 4  Sem) (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BED_4___3_SEM_MAY_JUNE_2025.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">9</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Arts Bachelor of Education 3 to 5 Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BABED_III_TO_VI_SEM_JUNE_2025_25052025_0240.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">10</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Engineering 5 to 6 Semester (Regular/Ex) As per AICTE Scheme</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BE_AICTE_V_TO_VI_SEM_JUNE_2025.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">11</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Pharmacy  5 to 6 Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/B.PHARMA_V_TO_VI_SEM_JUNE_2025_19052025_1035.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">12</td>
                      <td class="fw-bold text-dark text-start text-md-center">Master of Technology I to III Semester [Regular/Ex]  Revised</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/m_tech_1_to_3_rd_15052025_0333.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">13</td>
                      <td class="fw-bold text-dark text-start text-md-center">Master of Science III - IV Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MSC_4___3_SEM_MAY_JUNE_2025_Corrected_.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">14</td>
                      <td class="fw-bold text-dark text-start text-md-center">Diploma in Engineering III-VI Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/DIPLOMA_ENGG_ALL_SEM_DEC_2025_Corrected_.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">15</td>
                      <td class="fw-bold text-dark text-start text-md-center">B H M CT ( IV-VI ) Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BHMCT_IV_TO_VI_SEM_JUNE_2025_Corrected_.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">16</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Engineering 3 to 4 Semester (Regular/Ex) As per AICTE Scheme</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BE_AICTE_III_OR_IV_SEM_JUNE_2025_REVISED_UPDATE1_15052025_0436.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">17</td>
                      <td class="fw-bold text-dark text-start text-md-center">Master of Pharmacy II Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MPHARMA_I_II_JUNE_2025_I_OR_II_SEM_revised_update3_15052025_0437.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">18</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Law  IV Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/LAWIV_SEM_JUNE_2024_06062025_0429.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">19</td>
                      <td class="fw-bold text-dark text-start text-md-center">Revised</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BLIB_I_and_II_SEM_MAY_JUNE_2025_update_19-5-2025_20052025_1023.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">20</td>
                      <td class="fw-bold text-dark text-start text-md-center">Post-Graduation Diploma in Computer Application  II Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/PGDCA_2___1_SEM_MAY_JUNE_2024_22052025_0937.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">21</td>
                      <td class="fw-bold text-dark text-start text-md-center">B.Sc. (Hons.) Agriculture III  -  IV Semester [Regular/Ex]</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/AG_III_or_IV_SEM_JUNE_2025.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">22</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Arts Bachelor of Education VII Semester (Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BA_BED_7_SEM_NEW_SCHEME_JUNE_2025_29052025_0141.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">23</td>
                      <td class="fw-bold text-dark text-start text-md-center">Master of Commerce III - IV Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MCOM_4___3_SEM_MAY_JUNE_2025_26052025_1109.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- SECTION 29 -->
              <div class="exam-session-header d-flex align-items-center justify-content-between">
                <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-clock text-primary me-2"></i> NEP Annual Scheme Examinations</h5>
                <span class="badge bg-dark">Schedule</span>
              </div>
              <div class="table-responsive">
                <table class="table align-middle naac-custom-table">
                  <thead>
                    <tr class="naac-table-header">
                      <th style="width: 12%;">S.No.</th>
                      <th style="width: 68%;">Examination Schedule / Timetable Title</th>
                      <th style="width: 20%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="fw-bold text-dark">1</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Arts Third Year (NEP Annual)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BA_III_YEAR_SEPTEMBER_2024_NEP_ANNUAL00000.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">2</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Business Administration Third Year (NEP Annual)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BBA_III_YEAR_SEPTEMBER_2024_NEP_ANNUAL.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">3</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Computer Application Third Year (NEP Annual)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BCA_III_YEAR_SEPTEMBER_2024_NEP_ANNUAL.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">4</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of commerce Third Year (NEP Annual)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BCOM_III_YEAR_SEPTEMBER_2024_NEP_ANNUAL.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">5</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Science Third Year (NEP Annual)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BSC_III_YEAR_SEPTEMBER_2024_NEP_ANNUAL.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- SECTION 30 -->
              <div class="exam-session-header d-flex align-items-center justify-content-between">
                <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-clock text-primary me-2"></i>   S. No.   Time Table</h5>
                <span class="badge bg-dark">Schedule</span>
              </div>
              <div class="table-responsive">
                <table class="table align-middle naac-custom-table">
                  <thead>
                    <tr class="naac-table-header">
                      <th style="width: 12%;">S.No.</th>
                      <th style="width: 68%;">Examination Schedule / Timetable Title</th>
                      <th style="width: 20%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="fw-bold text-dark">1</td>
                      <td class="fw-bold text-dark text-start text-md-center">Diploma in Pharmacy (I &amp; II Year) Regular</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/Diploma_Pharmacy_I___II_YEAR_April_-_2025%20%282%29.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">2</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Physical Education and Sports (I To III Year ) Regular</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BPES_I-III_YEAR_April_-2025%20%281%29.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- SECTION 31 -->
              <div class="exam-session-header d-flex align-items-center justify-content-between">
                <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-clock text-primary me-2"></i>   S. No.   Time Table</h5>
                <span class="badge bg-dark">Schedule</span>
              </div>
              <div class="table-responsive">
                <table class="table align-middle naac-custom-table">
                  <thead>
                    <tr class="naac-table-header">
                      <th style="width: 12%;">S.No.</th>
                      <th style="width: 68%;">Examination Schedule / Timetable Title</th>
                      <th style="width: 20%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="fw-bold text-dark">1</td>
                      <td class="fw-bold text-dark text-start text-md-center">Revised</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/march%202025.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- SECTION 32 -->
              <div class="exam-session-header d-flex align-items-center justify-content-between">
                <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-clock text-primary me-2"></i>   S. No.   Time Table</h5>
                <span class="badge bg-dark">Schedule</span>
              </div>
              <div class="table-responsive">
                <table class="table align-middle naac-custom-table">
                  <thead>
                    <tr class="naac-table-header">
                      <th style="width: 12%;">S.No.</th>
                      <th style="width: 68%;">Examination Schedule / Timetable Title</th>
                      <th style="width: 20%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="fw-bold text-dark">1</td>
                      <td class="fw-bold text-dark text-start text-md-center">Revised</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/bams%20jan2025.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- SECTION 33 -->
              <div class="exam-session-header d-flex align-items-center justify-content-between">
                <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-clock text-primary me-2"></i> Examination Dec – 2024</h5>
                <span class="badge bg-dark">Schedule</span>
              </div>
              <div class="table-responsive">
                <table class="table align-middle naac-custom-table">
                  <thead>
                    <tr class="naac-table-header">
                      <th style="width: 12%;">S.No.</th>
                      <th style="width: 68%;">Examination Schedule / Timetable Title</th>
                      <th style="width: 20%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="fw-bold text-dark">1</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Arts (NEP) II To V Semester (Regular/EX)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BA%20NEP%20ALL%20SEM%20DEC%202024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">2</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Business Administration (NEP) II To V Semester (Regular/EX)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BBA%20NEP%20ALL%20SEM%20DEC%202024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">3</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Computer Application (NEP) II To V Semester (Regular/EX)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BCA%20NEP%20ALL%20SEM%20DEC%202024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">4</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Commerce (NEP) II To V Semester (Regular/EX)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BCOM%20NEP%20ALL%20SEM%20DEC%202024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">5</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Science (NEP) II To V Semester (Regular/EX)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BSC%20NEP%20ALL%20SEM%20DEC%202024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">6</td>
                      <td class="fw-bold text-dark text-start text-md-center">B.Sc. (Nursing) Third Year [Supplementary] Dec- 2024</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/B.Sc._%28Nursing%29_Third_Year_%5BSupplementary%5D_02012025_0512.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">7</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Engineering VII To VIII Semester (Regular/Ex) As per CBCS Scheme</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BE%20CBCS%20ALL%20SEM%20DEC%202024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- SECTION 34 -->
              <div class="exam-session-header d-flex align-items-center justify-content-between">
                <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-clock text-primary me-2"></i>   S. No.   Time Table</h5>
                <span class="badge bg-dark">Schedule</span>
              </div>
              <div class="table-responsive">
                <table class="table align-middle naac-custom-table">
                  <thead>
                    <tr class="naac-table-header">
                      <th style="width: 12%;">S.No.</th>
                      <th style="width: 68%;">Examination Schedule / Timetable Title</th>
                      <th style="width: 20%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="fw-bold text-dark">1</td>
                      <td class="fw-bold text-dark text-start text-md-center">II To IV YEAR</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BHMS%20ALL%20SEM%20DEC%202024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">2</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Engineering IV To VIII Semester (Regular/Ex)As per AICTE Scheme</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BE%20AICTE%20ALL%20SEM%20DEC%202024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">3</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Education 2 To 4  Sem (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BED%20ALL%20SEM%20DEC%202024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">4</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Arts Bachelor of Education VII Semester (Regular)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BA%20BED%207%20SEM%20NEW%20SCHEME%20DEC%202024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">5</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Physiotherapy  Third &amp; Fourth Year</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BPT%20ALL%20DEC%202024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">6</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Pharmacy II To VIII Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BPHARMA%20ALL%20SEM%20DEC%202024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">7</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Law  II To VI Sem (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/LAW%20ALL%20SEM%20DEC%202024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">8</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Hotel Management &amp; Catering Technology  II &amp; VIII Sem (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BHMCT%20ALL%20SEM%20DEC%202024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">9</td>
                      <td class="fw-bold text-dark text-start text-md-center">Masters in Business Administration  II  To IV Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MBA%20ALL%20SEM%20DEC%202024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">10</td>
                      <td class="fw-bold text-dark text-start text-md-center">Masters in Computer Application II To IV Semester [Regular/Ex]</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MCA%20ALL%20SEM%20DEC%202022.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">11</td>
                      <td class="fw-bold text-dark text-start text-md-center">Master of Technology II &amp; III Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MTECH%20ALL%20SEM%20DEC%202024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">12</td>
                      <td class="fw-bold text-dark text-start text-md-center">Diploma in Engineering II To VI Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/DIPLOMA%20ENGG%20ALL%20SEM%20DEC%202024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">13</td>
                      <td class="fw-bold text-dark text-start text-md-center">Master of Arts II To IV Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MA%20ALL%20SEM%20DEC%202024%20.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">14</td>
                      <td class="fw-bold text-dark text-start text-md-center">B.Sc. (Hons.) Agriculture II To VI Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/AG%20ALL%20SEM%20DEC%202024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">15</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Arts Bachelor of Education II To VI Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="#" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">16</td>
                      <td class="fw-bold text-dark text-start text-md-center">Master of Commerce II To IV Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MCOM%20ALL%20SEM%20DEC%202024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">17</td>
                      <td class="fw-bold text-dark text-start text-md-center">Master of Science II To IV Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MSC%20ALL%20SEM%20DEC%202024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">18</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Library and Information Science II Semester (Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BLIB%20ALL%20SEM%20DEC%202024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">19</td>
                      <td class="fw-bold text-dark text-start text-md-center">B.Sc. (Nursing) 1 To 4 th Semester  [Regular/Ex]</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BSC%20NURSING%20ALL%20DEC%202024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">20</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Physical Education 2 To  4 Sem (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BPED%20ALL%20SEM%20DEC%202024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">21</td>
                      <td class="fw-bold text-dark text-start text-md-center">Diploma Dialysis Technician [Second Year]</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/DIPLOMA%20DIALYSIS%20DEC%202024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">22</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Architecture III Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/Bachelor%20of%20Architecture%20III%20Semester%20%28RegularEx%29.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- SECTION 35 -->
              <div class="exam-session-header d-flex align-items-center justify-content-between">
                <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-clock text-primary me-2"></i> S. No. Time Table</h5>
                <span class="badge bg-dark">Schedule</span>
              </div>
              <div class="table-responsive">
                <table class="table align-middle naac-custom-table">
                  <thead>
                    <tr class="naac-table-header">
                      <th style="width: 12%;">S.No.</th>
                      <th style="width: 68%;">Examination Schedule / Timetable Title</th>
                      <th style="width: 20%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="fw-bold text-dark">1</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Homoeopathic Medicine &amp; Surgery [1 Professional As per 2022 New Scheme] 1 Year</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BHMSTT.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- SECTION 36 -->
              <div class="exam-session-header d-flex align-items-center justify-content-between">
                <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-clock text-primary me-2"></i> NEP Annual Scheme Examinations</h5>
                <span class="badge bg-dark">Schedule</span>
              </div>
              <div class="table-responsive">
                <table class="table align-middle naac-custom-table">
                  <thead>
                    <tr class="naac-table-header">
                      <th style="width: 12%;">S.No.</th>
                      <th style="width: 68%;">Examination Schedule / Timetable Title</th>
                      <th style="width: 20%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="fw-bold text-dark">1</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Arts Third Year (NEP Annual)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BA_III_YEAR_SEPTEMBER_2024_NEP_ANNUAL.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">2</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Business Administration Third Year (NEP Annual)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BBA_III_YEAR_SEPTEMBER_2024_NEP_ANNUAL.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">3</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Computer Application Third Year (NEP Annual)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BCA_III_YEAR_SEPTEMBER_2024_NEP_ANNUAL.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">4</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of commerce Third Year (NEP Annual)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BCOM_III_YEAR_SEPTEMBER_2024_NEP_ANNUAL.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">5</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Science Third Year (NEP Annual)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BSC_III_YEAR_SEPTEMBER_2024_NEP_ANNUAL.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">6</td>
                      <td class="fw-bold text-dark text-start text-md-center">Ph.D Course Work Examination (I-II) Examination June – 2024</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/PHD_CW_JUNE_2024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">7</td>
                      <td class="fw-bold text-dark text-start text-md-center">Examination Sept. – 2024</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/Diploma_Pharmacy_I___II_YEAR_SEPTEMBER_2024__1_.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">8</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Physical Education and Sports (I-III Year) SupplementaryExamination Sept. – 2024</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BPES_I-III_YEAR_SEPTEMBER.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- SECTION 37 -->
              <div class="exam-session-header d-flex align-items-center justify-content-between">
                <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-clock text-primary me-2"></i> Examination Aug – 2024</h5>
                <span class="badge bg-dark">Schedule</span>
              </div>
              <div class="table-responsive">
                <table class="table align-middle naac-custom-table">
                  <thead>
                    <tr class="naac-table-header">
                      <th style="width: 12%;">S.No.</th>
                      <th style="width: 68%;">Examination Schedule / Timetable Title</th>
                      <th style="width: 20%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="fw-bold text-dark">1</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor in Medical Lab Technician (I -III Year)  Supplementary</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BMLT_ALL_SUPPLY_AUG_2024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">2</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Physiotherapy [First Year]</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BPT_1_YEAR_AUG_2024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">3</td>
                      <td class="fw-bold text-dark text-start text-md-center">(I - IV Year)  Supplementary</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BPT_ALL_SUPPLY_AUG_2024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">4</td>
                      <td class="fw-bold text-dark text-start text-md-center">Master of Medical Lab Technology (Haemotology) First Year</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MMLT_1_YEAR_AUG_2024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">5</td>
                      <td class="fw-bold text-dark text-start text-md-center"> Master of Physiotherapy (Orthopaedic) First Year</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MPT_1_YEAR_AUG_2024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">6</td>
                      <td class="fw-bold text-dark text-start text-md-center">PARAMEDICAL Diploma Courses All [First Year]</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/PARAMEDICAL_DIPLOMA_1_YEAR_ALL_AUG_2024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">7</td>
                      <td class="fw-bold text-dark text-start text-md-center"> PARAMEDICAL Diploma Courses All [First &amp;  Second Year] Supplementary</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/diploma%20sup.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">8</td>
                      <td class="fw-bold text-dark text-start text-md-center">B. Tech. (Dairy Technology) I to  VIII Semester (Regular/Ex) </td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/DAIRY%20TECH%20ALL%20SEM%20JUNE%202022.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- SECTION 38 -->
              <div class="exam-session-header d-flex align-items-center justify-content-between">
                <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-clock text-primary me-2"></i> Examination June – 2024</h5>
                <span class="badge bg-dark">Schedule</span>
              </div>
              <div class="table-responsive">
                <table class="table align-middle naac-custom-table">
                  <thead>
                    <tr class="naac-table-header">
                      <th style="width: 12%;">S.No.</th>
                      <th style="width: 68%;">Examination Schedule / Timetable Title</th>
                      <th style="width: 20%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="fw-bold text-dark">1</td>
                      <td class="fw-bold text-dark text-start text-md-center">  (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BBA.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">2</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Arts I To IV Semester (NEP) (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BA.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">3</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Science I To IV Semester (NEP) (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BSC.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">4</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Commerce I To IV Semester (NEP) (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BCOM.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">5</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Computer Application I To IV Semester (NEP) (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BCA.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">6</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Pharmacy I Semester (Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/b.pharma1ex.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- SECTION 39 -->
              <div class="exam-session-header d-flex align-items-center justify-content-between">
                <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-clock text-primary me-2"></i> Examination June – 2024</h5>
                <span class="badge bg-dark">Schedule</span>
              </div>
              <div class="table-responsive">
                <table class="table align-middle naac-custom-table">
                  <thead>
                    <tr class="naac-table-header">
                      <th style="width: 12%;">S.No.</th>
                      <th style="width: 68%;">Examination Schedule / Timetable Title</th>
                      <th style="width: 20%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="fw-bold text-dark">1</td>
                      <td class="fw-bold text-dark text-start text-md-center">(Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BARCH1SEM.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">2</td>
                      <td class="fw-bold text-dark text-start text-md-center">(Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BARCH2SEM.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">3</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Physical Education (1 &amp; 2 Sem) (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BPED_I_II_SEM_JUNE_2024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">4</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Pharmacy II to IV Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/B.PHARMA_I_TO_VI_SEM_JUNE_2024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">5</td>
                      <td class="fw-bold text-dark text-start text-md-center"> B.Sc. (Hons.) Agriculture I to VI Semester [Regular/Ex]  Revised</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/AG_ALL_SEM_JUNE_2024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">6</td>
                      <td class="fw-bold text-dark text-start text-md-center">Master of Business Administration I to  II Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MBA_I_II_SEM_JUNE_2024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">7</td>
                      <td class="fw-bold text-dark text-start text-md-center">Master of Arts  I to  II Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MA_I_II_SEM_JUNE-2024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">8</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Law I to  IV Semester  (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/LAW_I_TO_IV_SEM_JUNE_2024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">9</td>
                      <td class="fw-bold text-dark text-start text-md-center">Diploma in  Engineering I  to IV  Semester (Regular/Ex) Revised  </td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/DIPLOMA_ENGG_4__TO_1_SEM_JUNE-_2023.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">10</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Hotel Management &amp; Catering Technology I  to VI Semester [Regular/EX]</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BHMCT_I_TO_VI_SEM_JUNE_2024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">11</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Arts Bachelor of Education I to VI Semester (Regular/Ex) Revised</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BABED_I_TO_IV_SEM_JUNE_2024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">12</td>
                      <td class="fw-bold text-dark text-start text-md-center">Master of Technology I to III Semester [Regular/Ex]</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MTECH_I_TO_III_SEM_JUNE_2024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">13</td>
                      <td class="fw-bold text-dark text-start text-md-center">Master of Pharmacy I &amp; II Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MPHARMA_I_II_JUNE_2024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">14</td>
                      <td class="fw-bold text-dark text-start text-md-center">Master of Commerce I &amp; II Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MCOM_I_II_SEM_JUNE_2024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">15</td>
                      <td class="fw-bold text-dark text-start text-md-center">Master of Science I &amp; II Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MSC_I_II_SEM_JUNE_2024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">16</td>
                      <td class="fw-bold text-dark text-start text-md-center">Masters in Computer Application I &amp; II Semester [Regular/Ex] New Scheme</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/MCA_I_II_SEM_JUNE_2024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">17</td>
                      <td class="fw-bold text-dark text-start text-md-center">Diploma in Engineering I &amp; II Semester (Regular/Ex) As per AICTE Scheme</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/DIPLOMA%20ENGG%20I-II%20SEM%20AICTE%20JUNE%202024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">18</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Education (1 &amp; 2  Sem) (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BED_I_II_SEM_JUNE_2024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">19</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Engineering I to VI Semester (Regular/Ex) As per AICTE Scheme</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BE_AICTE_I_TO_VI_SEM_JUNE_2024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- SECTION 40 -->
              <div class="exam-session-header d-flex align-items-center justify-content-between">
                <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-clock text-primary me-2"></i> Examination June – 2024</h5>
                <span class="badge bg-dark">Schedule</span>
              </div>
              <div class="table-responsive">
                <table class="table align-middle naac-custom-table">
                  <thead>
                    <tr class="naac-table-header">
                      <th style="width: 12%;">S.No.</th>
                      <th style="width: 68%;">Examination Schedule / Timetable Title</th>
                      <th style="width: 20%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="fw-bold text-dark">1</td>
                      <td class="fw-bold text-dark text-start text-md-center">BACHELOR OF AYURVEDIC MEDICINE AND SURGERY I YEAR (Regular)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BAMS%201%20YEAR%20JUNE%202024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">2</td>
                      <td class="fw-bold text-dark text-start text-md-center">BACHELOR OF HOMOEOPATHIC MEDICINE &amp; SURGERY 2 nd to 4 th Year (Regular)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BHMS%20JUNE%202024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- SECTION 41 -->
              <div class="exam-session-header d-flex align-items-center justify-content-between">
                <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-clock text-primary me-2"></i> S. No. Time Table</h5>
                <span class="badge bg-dark">Schedule</span>
              </div>
              <div class="table-responsive">
                <table class="table align-middle naac-custom-table">
                  <thead>
                    <tr class="naac-table-header">
                      <th style="width: 12%;">S.No.</th>
                      <th style="width: 68%;">Examination Schedule / Timetable Title</th>
                      <th style="width: 20%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="fw-bold text-dark">1</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Arts Bachelor of Education (8 th Sem)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BABED%208%20SEM%20MAY%20JUNE%202024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">2</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Education (3 &amp; 4  Sem)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="#" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">3</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Physical Education (3 &amp; 4 Sem)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="#" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">4</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Pharmacy VII &amp; VIII Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BPHARMA%208%20%2526%207%20SEM%20MAY%20JUNE%202024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">5</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Law  ( V &amp; VI Sem) (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="#" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">6</td>
                      <td class="fw-bold text-dark text-start text-md-center">Scheme</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BE%20AICTE%208%20%2526%207%20SEM%20JUNE%202024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">7</td>
                      <td class="fw-bold text-dark text-start text-md-center">Masters in Business Administration  lII &amp;IV Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="#" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">8</td>
                      <td class="fw-bold text-dark text-start text-md-center">Masters in Computer Application III &amp; IV Semester [Regular/Ex]</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="#" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">9</td>
                      <td class="fw-bold text-dark text-start text-md-center">Diploma in Engineering V &amp; VI Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/DIPLOMA%20ENGG%206%20%2526%205SEM%20MAY%20JUNE%202024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">10</td>
                      <td class="fw-bold text-dark text-start text-md-center">Master of Arts IIl &amp; IV Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="#" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">11</td>
                      <td class="fw-bold text-dark text-start text-md-center">Master of Science III &amp; IV Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="#" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">12</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Library and Information Science (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="#" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">13</td>
                      <td class="fw-bold text-dark text-start text-md-center">Master Of Commerce III &amp; IV Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="#" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">14</td>
                      <td class="fw-bold text-dark text-start text-md-center">Post-Graduation Diploma in Computer Application 1 to 2  Sem (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="#" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">15</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Hotel Management &amp; Catering Technology  VII &amp; VIII Sem (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="#" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">16</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelor of Architecture VII &amp;VIII Semester (Regular/Ex)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="#" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">17</td>
                      <td class="fw-bold text-dark text-start text-md-center">Scheme</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BE%20CBCS%20ALL%20SEM%20MAY%20JUNE%202024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- SECTION 42 -->
              <div class="exam-session-header d-flex align-items-center justify-content-between">
                <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-clock text-primary me-2"></i> S. No.   Time Table (YEARLY SCHME OLD)</h5>
                <span class="badge bg-dark">Schedule</span>
              </div>
              <div class="table-responsive">
                <table class="table align-middle naac-custom-table">
                  <thead>
                    <tr class="naac-table-header">
                      <th style="width: 12%;">S.No.</th>
                      <th style="width: 68%;">Examination Schedule / Timetable Title</th>
                      <th style="width: 20%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="fw-bold text-dark">1</td>
                      <td class="fw-bold text-dark text-start text-md-center">B A CA III YEAR</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BA_CA.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">2</td>
                      <td class="fw-bold text-dark text-start text-md-center">B A PLAIN III YEAR</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BA_Plain.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">3</td>
                      <td class="fw-bold text-dark text-start text-md-center">B B A III YEAR</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BBA.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">4</td>
                      <td class="fw-bold text-dark text-start text-md-center">B C A III YEAR</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BCA.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">5</td>
                      <td class="fw-bold text-dark text-start text-md-center">B COM CA III</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BCOM_CA.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">6</td>
                      <td class="fw-bold text-dark text-start text-md-center">B COM PLAIN III</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BCOM_Plain.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">7</td>
                      <td class="fw-bold text-dark text-start text-md-center">B SC BIO III YEAR</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BSC_BIO.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">8</td>
                      <td class="fw-bold text-dark text-start text-md-center">B SC CS III YEAR</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BSC_CS.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">9</td>
                      <td class="fw-bold text-dark text-start text-md-center">B SC MATH III YEAR</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BSC_MATHS.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">10</td>
                      <td class="fw-bold text-dark text-start text-md-center">B SC MICRO III YEAR</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BSC_MICROBIO.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- SECTION 43 -->
              <div class="exam-session-header d-flex align-items-center justify-content-between">
                <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-clock text-primary me-2"></i> NEP Annual Scheme Examinations</h5>
                <span class="badge bg-dark">Schedule</span>
              </div>
              <div class="table-responsive">
                <table class="table align-middle naac-custom-table">
                  <thead>
                    <tr class="naac-table-header">
                      <th style="width: 12%;">S.No.</th>
                      <th style="width: 68%;">Examination Schedule / Timetable Title</th>
                      <th style="width: 20%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="fw-bold text-dark">1</td>
                      <td class="fw-bold text-dark text-start text-md-center">S. No. Course Second Year Third Year </td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="#" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- SECTION 44 -->
              <div class="exam-session-header d-flex align-items-center justify-content-between">
                <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-clock text-primary me-2"></i>   S. No.   Time Table</h5>
                <span class="badge bg-dark">Schedule</span>
              </div>
              <div class="table-responsive">
                <table class="table align-middle naac-custom-table">
                  <thead>
                    <tr class="naac-table-header">
                      <th style="width: 12%;">S.No.</th>
                      <th style="width: 68%;">Examination Schedule / Timetable Title</th>
                      <th style="width: 20%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="fw-bold text-dark">1</td>
                      <td class="fw-bold text-dark text-start text-md-center">Diploma in Pharmacy First Year &amp; Second Year Exam April – 2024</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/Diploma_Pharmacy_I___II_YEAR%20SEPTEMBER_2024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">2</td>
                      <td class="fw-bold text-dark text-start text-md-center">Bachelorof Physical Education and Sports ( I - III ) Year Exam April – 2024</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BPES_I-III_YEAR_April_-2025%20%281%29.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- SECTION 45 -->
              <div class="exam-session-header d-flex align-items-center justify-content-between">
                <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-clock text-primary me-2"></i> S. No. Time Table</h5>
                <span class="badge bg-dark">Schedule</span>
              </div>
              <div class="table-responsive">
                <table class="table align-middle naac-custom-table">
                  <thead>
                    <tr class="naac-table-header">
                      <th style="width: 12%;">S.No.</th>
                      <th style="width: 68%;">Examination Schedule / Timetable Title</th>
                      <th style="width: 20%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="fw-bold text-dark">1</td>
                      <td class="fw-bold text-dark text-start text-md-center"> B.Sc. (Nursing) I-III Semester(Ex/Reg)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/BSC_NURtime_table_april_2024_21032024_1055.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- SECTION 46 -->
              <div class="exam-session-header d-flex align-items-center justify-content-between">
                <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-clock text-primary me-2"></i> S. No. Time Table</h5>
                <span class="badge bg-dark">Schedule</span>
              </div>
              <div class="table-responsive">
                <table class="table align-middle naac-custom-table">
                  <thead>
                    <tr class="naac-table-header">
                      <th style="width: 12%;">S.No.</th>
                      <th style="width: 68%;">Examination Schedule / Timetable Title</th>
                      <th style="width: 20%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="fw-bold text-dark">1</td>
                      <td class="fw-bold text-dark text-start text-md-center">  [Supplementary Examination - First Year]</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="#" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- SECTION 47 -->
              <div class="exam-session-header d-flex align-items-center justify-content-between">
                <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-clock text-primary me-2"></i> S. No. Time Table</h5>
                <span class="badge bg-dark">Schedule</span>
              </div>
              <div class="table-responsive">
                <table class="table align-middle naac-custom-table">
                  <thead>
                    <tr class="naac-table-header">
                      <th style="width: 12%;">S.No.</th>
                      <th style="width: 68%;">Examination Schedule / Timetable Title</th>
                      <th style="width: 20%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="fw-bold text-dark">1</td>
                      <td class="fw-bold text-dark text-start text-md-center">Ph.D Course Work Examination ( I- II Semester)</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/PHD%20CW%20Feb%202024.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>

            </article>
          </div>
        </div>
      </div>
      
      <!-- Sidebar (Right) -->
      <div class="col-lg-3 col-md-4">
        <?php require_once __DIR__ . '/../includes/sidebar.php'; ?>
      </div>
      
    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>