<?php $page_title = 'Criteria 6 - Governance, Leadership and Management - SSSUTMS';
$banner_title = 'Criteria 6 – Governance, Leadership and Management';
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

/* Merged Faculty / School Name Columns Centering */
.naac-custom-table td[colspan],
.naac-custom-table td[rowspan] {
  font-weight: 600 !important;
  color: #0b2545 !important;
  text-align: center !important;
  vertical-align: middle !important;
  background-color: #ffffff !important;
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
          <div class="naac-header-banner">
            <h3 class="fw-bold mb-1">Criteria 6 – Governance, Leadership and Management</h3>
            <p class="mb-0 text-white-50">Sri Satya Sai University of Technology and Medical Sciences</p>
          </div>
          
          <div class="naac-card-body">
            <article class="fs-5 lh-lg text-secondary">

              <div class="naac-metric-box">
                <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                  <div class="d-flex align-items-start gap-3">
                    <span class="naac-metric-badge">Metric 6.1.1</span>
                    <div class="naac-metric-content">
                      The institution has a clearly stated vision and mission which are reflected in its academic and administrative governance.
                    </div>
                  </div>
                  <div>
                    <a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 6/6.1.1 vision mission merge.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a>
                  </div>
                </div>
              </div>

              <div class="naac-metric-box">
                <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                  <div class="d-flex align-items-start gap-3">
                    <span class="naac-metric-badge">Metric 6.1.2</span>
                    <div class="naac-metric-content">
                      Effective Leadership is reflected in various Institutional Practices such as Decentralization and Participative Management.
                    </div>
                  </div>
                  <div>
                    <a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 6/6.1.2 organizational chart upload.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a>
                  </div>
                </div>
              </div>

              <div class="naac-metric-box">
                <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                  <div class="d-flex align-items-start gap-3">
                    <span class="naac-metric-badge">Metric 6.2.1</span>
                    <div class="naac-metric-content">
                      The institutional Strategic plan is effectively deployed.
                    </div>
                  </div>
                  <div>
                    <a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 6/6.2.1 AC_compressed short new_compressed (2).pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a>
                  </div>
                </div>
              </div>

              <div class="naac-metric-box">
                <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                  <div class="d-flex align-items-start gap-3">
                    <span class="naac-metric-badge">Metric 6.2.2</span>
                    <div class="naac-metric-content">
                      The functioning of the institutional bodies is effective and efficient as visible from policies, administrative setup, appointment, service rules and procedures.
                    </div>
                  </div>
                  <div>
                    <a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 6/6.2.2 website upload_compressed.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a>
                  </div>
                </div>
              </div>

              <div class="naac-metric-box">
                <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                  <div class="d-flex align-items-start gap-3">
                    <span class="naac-metric-badge">Metric 6.2.3</span>
                    <div class="naac-metric-content">
                      Institution Implements e-governance covering areas of operation.
                    </div>
                  </div>
                  <div>
                    <a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 6/6.2.3 ERP link upload.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a>
                  </div>
                </div>
              </div>

              <div class="naac-metric-box">
                <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                  <div class="d-flex align-items-start gap-3">
                    <span class="naac-metric-badge">Metric 6.3.1</span>
                    <div class="naac-metric-content">
                      The institution has a performance appraisal system, promotional avenues and effective welfare measures for teaching and non-teaching staff.
                    </div>
                  </div>
                  <div>
                    <a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 6/6.3.1 Employee welfare upload.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a>
                  </div>
                </div>
              </div>

              <div class="naac-metric-box">
                <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                  <div class="d-flex align-items-start gap-3">
                    <span class="naac-metric-badge">Metric 6.3.2</span>
                    <div class="naac-metric-content">
                      Average percentage of teachers provided with financial support to attend conferences / workshops and towards membership fee of professional bodies during the last five years.
                    </div>
                  </div>
                  <div>
                    <a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 6/6.3.2 FDP fund website upload.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a>
                  </div>
                </div>
              </div>

              <div class="naac-metric-box">
                <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                  <div class="d-flex align-items-start gap-3">
                    <span class="naac-metric-badge">Metric 6.4.1</span>
                    <div class="naac-metric-content">
                      Institutional strategies for mobilisation of funds and the optimal utilisation of resources.
                    </div>
                  </div>
                  <div>
                    <a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 6/6.4.1 MOBILISATION OF FUND UPLOAD.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a>
                  </div>
                </div>
              </div>

              <div class="naac-metric-box">
                <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                  <div class="d-flex align-items-start gap-3">
                    <span class="naac-metric-badge">Metric 6.4.2</span>
                    <div class="naac-metric-content">
                      Funds / Grants received from government bodies during the last five years for development and maintenance of infrastructure.
                    </div>
                  </div>
                  <div>
                    <a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 6/6.4.2 AUDIT REPORT UPLOAD.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a>
                  </div>
                </div>
              </div>

              <div class="naac-metric-box">
                <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                  <div class="d-flex align-items-start gap-3">
                    <span class="naac-metric-badge">Metric 6.5.1</span>
                    <div class="naac-metric-content">
                      Internal Quality Assurance Cell (IQAC) has contributed significantly for institutionalizing the quality assurance strategies and processes by constantly reviewing the teaching learning process, structures &amp; methodologies of operations and learning outcomes at periodic intervals.
                    </div>
                  </div>
                  <div>
                    <a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 6/6.5.1 IQAC UPLOAD.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a>
                  </div>
                </div>
              </div>

              <div class="naac-metric-box">
                <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                  <div class="d-flex align-items-start gap-3">
                    <span class="naac-metric-badge">Metric 6.5.2</span>
                    <div class="naac-metric-content">
                      Institution has adopted the following for Quality assurance.
                    </div>
                  </div>
                  <div>
                    <a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 6/6.5.2 COLLABORATION UPLOAD.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a>
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