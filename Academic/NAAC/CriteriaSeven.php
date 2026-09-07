<?php $page_title = 'Criteria 7 - Institutional Values and Best Practices - SSSUTMS';
$banner_title = 'Criteria 7 – Institutional Values and Best Practices';
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
            <h3 class="fw-bold mb-1">Criteria 7 – Institutional Values and Best Practices</h3>
            <p class="mb-0 text-white-50">Sri Satya Sai University of Technology and Medical Sciences</p>
          </div>
          
          <div class="naac-card-body">
            <article class="fs-5 lh-lg text-secondary">

              <div class="naac-metric-box">
                <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                  <div class="d-flex align-items-start gap-3">
                    <span class="naac-metric-badge">Metric 7.1</span>
                    <div class="naac-metric-content">
                      <strong>Institutional Values and Social Responsibilities:</strong> The University organizes gender equity promotion programs, environmental consciousness initiatives, solar energy harnessing, waste management practices, green campus audits, and barrier-free environment for persons with disabilities.
                    </div>
                  </div>
                  <div>
                    <a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/MPUNGN104030_SSR_MODIFIED.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View SSR Report</a>
                  </div>
                </div>
              </div>

              <div class="naac-metric-box">
                <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                  <div class="d-flex align-items-start gap-3">
                    <span class="naac-metric-badge">Metric 7.2</span>
                    <div class="naac-metric-content">
                      <strong>Best Practices:</strong> Implementation of two institutional best practices focused on holistic healthcare education, value-added skill development, community outreach medical camps, and eco-friendly digital campus governance.
                    </div>
                  </div>
                  <div>
                    <a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/MPUNGN104030_SSR_MODIFIED.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View SSR Report</a>
                  </div>
                </div>
              </div>

              <div class="naac-metric-box">
                <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                  <div class="d-flex align-items-start gap-3">
                    <span class="naac-metric-badge">Metric 7.3</span>
                    <div class="naac-metric-content">
                      <strong>Institutional Distinctiveness:</strong> Showcasing the University's unique performance in providing affordable quality technical, medical, and higher education in rural and semi-urban regions of Madhya Pradesh.
                    </div>
                  </div>
                  <div>
                    <a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/MPUNGN104030_SSR_MODIFIED.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View SSR Report</a>
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