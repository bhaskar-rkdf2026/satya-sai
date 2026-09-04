<?php $page_title = 'NIRF - National Institutional Ranking Framework - SSSUTMS';
$banner_title = 'National Institutional Ranking Framework (NIRF)';
$banner_category = 'Research';

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

/* Year Section Header Card */
.nirf-year-header {
  background: #f1f5f9;
  border-left: 4px solid #0b2545;
  border-radius: 10px;
  padding: 1rem 1.25rem;
  margin-top: 1.75rem;
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
            <h3 class="fw-bold mb-1">National Institutional Ranking Framework (NIRF)</h3>
            <p class="mb-0 text-white-50">Ministry of Education | Government of India &bull; Data Capturing System (DCS)</p>
          </div>
          
          <div class="naac-card-body">
            <article class="fs-5 lh-lg text-secondary">
              
              <div class="p-3 bg-light rounded-3 border mb-4 text-center">
                <h5 class="fw-bold text-dark mb-1">SRI SATYA SAI UNIVERSITY OF TECHNOLOGY &amp; MEDICAL SCIENCES, SEHORE</h5>
                <span class="badge bg-primary fs-6 px-3 py-2">Institute Code: IR-O-U-0728</span>
              </div>

              <!-- NIRF 2026 SECTION -->
              <div class="nirf-year-header d-flex align-items-center justify-content-between">
                <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-file-invoice text-primary me-2"></i> Submitted Institute Data for NIRF 2026</h5>
                <span class="badge bg-dark">NIRF '26</span>
              </div>
              <div class="table-responsive">
                <table class="table align-middle naac-custom-table">
                  <thead>
                    <tr class="naac-table-header">
                      <th style="width: 60%;">Discipline / Category</th>
                      <th style="width: 40%;">Submitted Report</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="fw-bold text-dark">ENGINEERING</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/NIRF/SRI SATYA SAI UNIVERSITY OF TECHNOLOGY %26 MEDICAL SCIENCES%2C SEHORE NIRF 2026 Engineering.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">PHARMACY</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/NIRF/SRI SATYA SAI UNIVERSITY OF TECHNOLOGY %26 MEDICAL SCIENCES%2C SEHORE NIRF 2026 Pharmacy.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">AGRICULTURE AND ALLIED SECTORS</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/NIRF/SRI SATYA SAI UNIVERSITY OF TECHNOLOGY %26 MEDICAL SCIENCES%2C SEHORE AGRICULTURE AND ALLIED SECTORS.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">OVERALL</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/NIRF/NIRF Overall.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- NIRF 2025 SECTION -->
              <div class="nirf-year-header d-flex align-items-center justify-content-between">
                <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-file-invoice text-primary me-2"></i> Submitted Institute Data for NIRF 2025</h5>
                <span class="badge bg-dark">NIRF '25</span>
              </div>
              <div class="table-responsive">
                <table class="table align-middle naac-custom-table">
                  <thead>
                    <tr class="naac-table-header">
                      <th style="width: 60%;">Discipline / Category</th>
                      <th style="width: 40%;">Submitted Report</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="fw-bold text-dark">ENGINEERING</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/NIRF25/ENGINEERING.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">PHARMACY</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/NIRF25/PHARMACY.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">AGRICULTURE AND ALLIED SECTORS</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/NIRF25/AGRICULTURE AND ALLIED SECTORS.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">OVERALL</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/NIRF25/OVERALL.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- NIRF 2024 SECTION -->
              <div class="nirf-year-header d-flex align-items-center justify-content-between">
                <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-file-invoice text-primary me-2"></i> Submitted Institute Data for NIRF 2024</h5>
                <span class="badge bg-dark">NIRF '24</span>
              </div>
              <div class="table-responsive">
                <table class="table align-middle naac-custom-table">
                  <thead>
                    <tr class="naac-table-header">
                      <th style="width: 60%;">Discipline / Category</th>
                      <th style="width: 40%;">Submitted Report</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="fw-bold text-dark">ENGINEERING</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/SRI_SATYA_SAI_UNIVERSITY_OF_TECHNOLOGY_%26_MEDICAL_SCIENCES%2C_SEHORE20240131-_2024_19032024_0326.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">PHARMACY</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/SRI_SATYA_SAI_UNIVERSITY_OF_TECHNOLOGY_%26_MEDICAL_SCIENCES%2C_SEHORE20240306-_(1)_06032024_0227.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
                    </tr>
                    <tr>
                      <td class="fw-bold text-dark">AGRICULTURE AND ALLIED SECTORS</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/SRI_SATYA_SAI_UNIVERSITY_OF_TECHNOLOGY_%26_MEDICAL_SCIENCES%2C_SEHORE20240306-_(2)_06032024_0232.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
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