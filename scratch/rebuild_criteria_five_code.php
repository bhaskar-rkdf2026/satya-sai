<?php

$fpath = 'd:/xampp/htdocs/sssu/satya-sai/Academic/NAAC/CriteriaFive.php';

$code = <<<'PHP'
<?php $page_title = 'Criteria 5 - Student Support and Progression - SSSUTMS';
$banner_title = 'Criteria 5 – Student Support and Progression';
$banner_category = 'Academic';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
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

/* Metric Callout Box Component */
.naac-metric-box {
  background: #f8fafc;
  border-left: 4px solid #0b2545;
  border-radius: 12px;
  border: 1px solid #e2e8f0;
  padding: 1.25rem 1.5rem;
  margin-top: 1.5rem;
  margin-bottom: 1.5rem;
  box-shadow: 0 2px 8px rgba(15, 23, 42, 0.04);
}
.naac-metric-badge {
  background: linear-gradient(135deg, #0b2545 0%, #1e3a8a 100%);
  color: #ffffff !important;
  font-size: 0.825rem;
  font-weight: 700;
  padding: 5px 12px;
  border-radius: 6px;
  letter-spacing: 0.5px;
  text-transform: uppercase;
  white-space: nowrap;
  box-shadow: 0 2px 4px rgba(11, 37, 69, 0.2);
}
.naac-metric-content {
  color: #1e293b !important;
  font-size: 0.975rem !important;
  font-weight: 500 !important;
  line-height: 1.6 !important;
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
.naac-custom-table tr.naac-table-header th,
.naac-custom-table tr:first-child td {
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
.naac-custom-table tr.naac-table-header th *,
.naac-custom-table tr:first-child td * {
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

/* Merged Faculty / School Name Columns Centering */
.naac-custom-table td[colspan],
.naac-custom-table td[rowspan] {
  font-weight: 600 !important;
  color: #0b2545 !important;
  text-align: center !important;
  vertical-align: middle !important;
  background-color: #ffffff !important;
}

/* Refined Row Hover Effects */
.naac-custom-table tr:nth-child(even) td:not([rowspan]) {
  background-color: #f8fafc !important;
}
.naac-custom-table tr:hover td:not([rowspan]) {
  background-color: #f1f5f9 !important;
  transition: background-color 0.15s ease-in-out !important;
}

/* Exact Button Styling Matched to Reference Image (Dark Navy Pill + Golden Border + Yellow Icon) */
.btn-naac-pdf {
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
.btn-naac-pdf:hover {
  background: linear-gradient(135deg, #173866 0%, #1e4b8a 100%) !important;
  border-color: #f59e0b !important;
  color: #ffffff !important;
  transform: translateY(-2px) !important;
  box-shadow: 0 6px 16px rgba(11, 37, 69, 0.35) !important;
}
.btn-naac-pdf i {
  color: #f59e0b !important;
  font-size: 0.9rem !important;
}
.btn-naac-pdf:hover i {
  color: #fbbf24 !important;
}
</style>

<section class="subpage-main-section naac-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-9 col-md-8">
        <div class="naac-main-card">
          <div class="naac-header-banner">
            <h3 class="fw-bold mb-1">Criteria 5 – Student Support and Progression</h3>
            <p class="mb-0 text-white-50">Sri Satya Sai University of Technology and Medical Sciences</p>
          </div>
          
          <div class="naac-card-body">
            <article class="fs-5 lh-lg text-secondary">

              <div class="naac-metric-box">
                <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                  <div class="d-flex align-items-start gap-3">
                    <span class="naac-metric-badge">Metric 5.1.1</span>
                    <div class="naac-metric-content">
                      Average percentage of students benefited by scholarships and freeships provided by the Government during the last five years.
                    </div>
                  </div>
                  <div>
                    <a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 5/5.1.1/5.1.1.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a>
                  </div>
                </div>
              </div>

              <div class="naac-metric-box">
                <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                  <div class="d-flex align-items-start gap-3">
                    <span class="naac-metric-badge">Metric 5.1.2</span>
                    <div class="naac-metric-content">
                      Average percentage of students benefited by career counseling and guidance for competitive examinations offered by the Institution during the last five years.
                    </div>
                  </div>
                  <div>
                    <a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 5/5.1.2/5.1.2/5.1.2.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a>
                  </div>
                </div>
              </div>

              <div class="naac-metric-box">
                <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                  <div class="d-flex align-items-start gap-3">
                    <span class="naac-metric-badge">Metric 5.1.3</span>
                    <div class="naac-metric-content">
                      Capacity building and skills enhancement initiatives taken by the institution.
                    </div>
                  </div>
                  <div>
                    <a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 5/5.1.3/5.1.3.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a>
                  </div>
                </div>
              </div>

              <div class="naac-metric-box">
                <div class="d-flex align-items-start gap-3 mb-3">
                  <span class="naac-metric-badge">Metric 5.1.4</span>
                  <div class="naac-metric-content fw-bold">
                    The Institution adopts mechanism for redressal of student grievances including sexual harassment and ragging cases:
                  </div>
                </div>
                <div class="row g-3 mt-1">
                  <div class="col-md-6">
                    <div class="p-3 bg-white border rounded-3 d-flex align-items-center justify-content-between gap-2 shadow-sm">
                      <span class="fw-semibold text-dark fs-6">Policy, Rules &amp; Committees</span>
                      <a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 5/5.1.4 - Policy %26 Rules regulation %26 Committee.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="p-3 bg-white border rounded-3 d-flex align-items-center justify-content-between gap-2 shadow-sm">
                      <span class="fw-semibold text-dark fs-6">Minutes of the Meeting</span>
                      <a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 5/5.1.4 Minutes.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="naac-metric-box">
                <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                  <div class="d-flex align-items-start gap-3">
                    <span class="naac-metric-badge">Metric 5.2.1</span>
                    <div class="naac-metric-content">
                      Average percentage of placement of outgoing students during the last five years.
                    </div>
                  </div>
                  <div>
                    <a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 5/5.2.1 Score Card.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a>
                  </div>
                </div>
              </div>

              <div class="naac-metric-box">
                <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                  <div class="d-flex align-items-start gap-3">
                    <span class="naac-metric-badge">Metric 5.2.2</span>
                    <div class="naac-metric-content">
                      Percentage of student progression to higher education (Offer Letters).
                    </div>
                  </div>
                  <div>
                    <a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 5/5.2.2 offerlatter .pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a>
                  </div>
                </div>
              </div>

              <div class="naac-metric-box">
                <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                  <div class="d-flex align-items-start gap-3">
                    <span class="naac-metric-badge">Metric 5.2.3</span>
                    <div class="naac-metric-content">
                      Percentage of recently graduated students who have progressed to higher education (2017-21).
                    </div>
                  </div>
                  <div>
                    <a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 5/5.2.3.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a>
                  </div>
                </div>
              </div>

              <div class="naac-metric-box">
                <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                  <div class="d-flex align-items-start gap-3">
                    <span class="naac-metric-badge">Metric 5.3.1</span>
                    <div class="naac-metric-content">
                      Number of awards/medals won by students for outstanding performance in sports/cultural activities at inter-university/state/national/international events during the last five years.
                    </div>
                  </div>
                  <div>
                    <a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 5/5.3.1.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a>
                  </div>
                </div>
              </div>

              <div class="naac-metric-box">
                <div class="d-flex align-items-start gap-3 mb-3">
                  <span class="naac-metric-badge">Metric 5.3.2</span>
                  <div class="naac-metric-content fw-bold">
                    Presence of Student Council and its activities for institutional development:
                  </div>
                </div>
                <div class="row g-3 mt-1">
                  <div class="col-md-4">
                    <div class="p-3 bg-white border rounded-3 d-flex flex-column align-items-center text-center gap-2 shadow-sm">
                      <span class="fw-semibold text-dark fs-6">Council Regulation</span>
                      <a class="btn btn-sm btn-naac-pdf w-100 mt-1" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 5/5.3.2/Counsil Regulation.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="p-3 bg-white border rounded-3 d-flex flex-column align-items-center text-center gap-2 shadow-sm">
                      <span class="fw-semibold text-dark fs-6">Council Formation</span>
                      <a class="btn btn-sm btn-naac-pdf w-100 mt-1" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 5/5.3.2/Student Counsil formation.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="p-3 bg-white border rounded-3 d-flex flex-column align-items-center text-center gap-2 shadow-sm">
                      <span class="fw-semibold text-dark fs-6">Council Activities</span>
                      <a class="btn btn-sm btn-naac-pdf w-100 mt-1" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 5/5.3.2/Student Council and its Activities.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="naac-metric-box">
                <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                  <div class="d-flex align-items-start gap-3">
                    <span class="naac-metric-badge">Metric 5.3.3</span>
                    <div class="naac-metric-content">
                      Average number of sports and cultural events / competitions organized by the Institution per year.
                    </div>
                  </div>
                  <div>
                    <a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 5/5.3.3/5.3.3.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a>
                  </div>
                </div>
              </div>

              <div class="naac-metric-box">
                <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                  <div class="d-flex align-items-start gap-3">
                    <span class="naac-metric-badge">Metric 5.4.1</span>
                    <div class="naac-metric-content">
                      The Alumni Association / Chapters contributes significantly to the development of the institution through financial and other support services.
                    </div>
                  </div>
                  <div>
                    <a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 5/5.4.1/Final 5.4.1.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a>
                  </div>
                </div>
              </div>

              <div class="naac-metric-box">
                <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                  <div class="d-flex align-items-start gap-3">
                    <span class="naac-metric-badge">Metric 5.4.2</span>
                    <div class="naac-metric-content">
                      The Alumni Association is registered and holds regular meetings to plan its involvement and developmental activities.
                    </div>
                  </div>
                  <div>
                    <a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 5/5.4.2/Final 5.4.2.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a>
                  </div>
                </div>
              </div>

            </article>
          </div>
        </div>
      </div>
      
      <!-- Sidebar (Right) -->
      <div class="col-lg-3 col-md-4">
        <?php require_once __DIR__ . '/../../includes/sidebar.php'; ?>
      </div>
      
    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
PHP;

file_put_contents($fpath, $code);
echo "CriteriaFive.php rebuilt successfully!\n";

PHP;

file_put_contents('scratch/rebuild_criteria_five_code.php', $code);

