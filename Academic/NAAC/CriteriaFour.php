<?php
require_once __DIR__ . '/../../config.php';

$pageSeo = function_exists('get_academic_page_info') ? get_academic_page_info('NAAC_Criteria4') : [];
$page_data = $pageSeo;
$meta_title = !empty($pageSeo['meta_title']) ? $pageSeo['meta_title'] : 'Criteria 4 - Infrastructure and Learning Resources - SSSUTMS';
$page_title = $meta_title;
$meta_description = $pageSeo['meta_description'] ?? '';
$meta_keywords = $pageSeo['meta_keywords'] ?? '';
$canonical_url = $pageSeo['canonical_url'] ?? '';
$og_image = $pageSeo['og_image'] ?? 'assets/images/logo/logo.jpg';
$banner_title = $pageSeo['banner_title'] ?? ($pageSeo['page_title'] ?? 'Criteria 4 – Infrastructure and Learning Resources');
$banner_category = $pageSeo['banner_category'] ?? 'Academic';
$academicDocs = function_exists('get_academic_documents') ? get_academic_documents('NAAC_Criteria4') : [];

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
            <h3 class="fw-bold mb-1">Criteria 4 – Infrastructure and Learning Resources</h3>
            <p class="mb-0 text-white-50">Sri Satya Sai University of Technology and Medical Sciences</p>
          </div>
          
          <div class="naac-card-body">
            <article class="fs-5 lh-lg text-secondary">

              <div class="naac-metric-box">
                <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                  <div class="d-flex align-items-start gap-3">
                    <span class="naac-metric-badge">Metric 4.1.1</span>
                    <div class="naac-metric-content">
                      Physical Facilities &amp; Facilities for Teaching - Learning.
                    </div>
                  </div>
                  <div>
                    <a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 4/sssutms.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a>
                  </div>
                </div>
              </div>

              <div class="naac-metric-box">
                <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                  <div class="d-flex align-items-start gap-3">
                    <span class="naac-metric-badge">Metric 4.1.2</span>
                    <div class="naac-metric-content">
                      Facilities for Cultural Activities, Yoga, Games and Sports.
                    </div>
                  </div>
                  <div>
                    <a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 4/4.1.2/4.1.2.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a>
                  </div>
                </div>
              </div>

              <div class="naac-metric-box">
                <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                  <div class="d-flex align-items-start gap-3">
                    <span class="naac-metric-badge">Metric 4.1.3</span>
                    <div class="naac-metric-content">
                      General Campus Facilities.
                    </div>
                  </div>
                  <div>
                    <a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 4/4.1.2/4.1.3.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a>
                  </div>
                </div>
              </div>

              <div class="naac-metric-box">
                <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                  <div class="d-flex align-items-start gap-3">
                    <span class="naac-metric-badge">Metric 4.1.4</span>
                    <div class="naac-metric-content">
                      CA Certificate &amp; Audited Income and Expenditure Statement.
                    </div>
                  </div>
                  <div>
                    <a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 4/final audit.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a>
                  </div>
                </div>
              </div>

              <div class="naac-metric-box">
                <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                  <div class="d-flex align-items-start gap-3">
                    <span class="naac-metric-badge">Metric 4.2</span>
                    <div class="naac-metric-content">
                      Number of seats earmarked for reserved category as per GOI/State Govt. Rule year-wise during last five years.
                    </div>
                  </div>
                  <div>
                    <a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 4/4.2/4.2.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a>
                  </div>
                </div>
              </div>

              <div class="naac-metric-box">
                <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                  <div class="d-flex align-items-start gap-3">
                    <span class="naac-metric-badge">Metric 4.2.1</span>
                    <div class="naac-metric-content">
                      Library as a Learning Resource.
                    </div>
                  </div>
                  <div>
                    <a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 4/LIBRARY AS A LEARNING RESOURESE.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a>
                  </div>
                </div>
              </div>

              <div class="naac-metric-box">
                <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                  <div class="d-flex align-items-start gap-3">
                    <span class="naac-metric-badge">Metric 4.2.2</span>
                    <div class="naac-metric-content">
                      Institution has subscription for e-Library resources.
                    </div>
                  </div>
                  <div>
                    <a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 4/4.2.2/4.2.2 UPLOD.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a>
                  </div>
                </div>
              </div>

              <div class="naac-metric-box">
                <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                  <div class="d-flex align-items-start gap-3">
                    <span class="naac-metric-badge">Metric 4.3.1</span>
                    <div class="naac-metric-content">
                      Percentage of classrooms and seminar halls with ICT-enabled facilities such as LCD, smart board, Wi-Fi/LAN, audio video recording facilities (Data for latest completed academic year).
                    </div>
                  </div>
                  <div>
                    <a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 4/Criteria 4.3.1.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a>
                  </div>
                </div>
              </div>

              <div class="naac-metric-box">
                <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                  <div class="d-flex align-items-start gap-3">
                    <span class="naac-metric-badge">Metric 4.3.2</span>
                    <div class="naac-metric-content">
                      IT Services Policy.
                    </div>
                  </div>
                  <div>
                    <a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 4/4.3.2/4.3.2_1682157313_9437.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a>
                  </div>
                </div>
              </div>

              <div class="naac-metric-box">
                <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                  <div class="d-flex align-items-start gap-3">
                    <span class="naac-metric-badge">Metric 4.3.3</span>
                    <div class="naac-metric-content">
                      Summary of Computer Distribution, Declaration Certificate, Computer Invoices.
                    </div>
                  </div>
                  <div>
                    <a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 4/4.3.3/computer distribution and bill.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a>
                  </div>
                </div>
              </div>

              <div class="naac-metric-box">
                <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                  <div class="d-flex align-items-start gap-3">
                    <span class="naac-metric-badge">Metric 4.3.4</span>
                    <div class="naac-metric-content">
                      Available bandwidth of internet connection in the Institution.
                    </div>
                  </div>
                  <div>
                    <a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 4/4.3.4/4.3.4.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a>
                  </div>
                </div>
              </div>

              <div class="naac-metric-box">
                <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                  <div class="d-flex align-items-start gap-3">
                    <span class="naac-metric-badge">Metric 4.3.5</span>
                    <div class="naac-metric-content">
                      Institution has Facilities for e-content development.
                    </div>
                  </div>
                  <div>
                    <a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 4/4.3.5/4.3.5 .pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a>
                  </div>
                </div>
              </div>

              <div class="naac-metric-box">
                <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                  <div class="d-flex align-items-start gap-3">
                    <span class="naac-metric-badge">Metric 4.4.2</span>
                    <div class="naac-metric-content">
                      Maintenance Policy.
                    </div>
                  </div>
                  <div>
                    <a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 4/4.4.2/4.4.2_1682159880_9437.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a>
                  </div>
                </div>
              </div>

            </article>

            <!-- Dynamic Attached Orders & Documents from Admin Panel -->
            <?php if (!empty($academicDocs)): ?>
            <div style="background:#f8fafc; border:1px solid #e2e8f0; border-radius:12px; padding:20px; margin-top:24px;">
              <h5 style="color:#0b2545; font-weight:700; font-size:1.05rem; margin-bottom:14px; display:flex; align-items:center; gap:8px;">
                <i class="fa fa-folder-open text-warning"></i> Additional Criteria 4 Supporting Documents
              </h5>
              <div class="row g-2">
                <?php foreach ($academicDocs as $doc): 
                  $dTitle = !empty($doc['title']) ? $doc['title'] : 'Criteria 4 Document';
                  $dPath = !empty($doc['file_path']) ? $doc['file_path'] : (!empty($doc['url']) ? $doc['url'] : '#');
                  if ($dPath !== '#' && !preg_match('/^https?:\/\//i', $dPath)) {
                    $dPath = $base_url . ltrim($dPath, '/');
                  }
                  $dDate = !empty($doc['date']) ? $doc['date'] : '';
                ?>
                <div class="col-md-6">
                  <div style="background:#ffffff; border:1px solid #e2e8f0; border-radius:8px; padding:12px 14px; display:flex; align-items:center; justify-content:space-between; gap:10px;">
                    <div style="overflow:hidden;">
                      <div style="font-weight:600; font-size:0.88rem; color:#1e293b; white-space:nowrap; text-overflow:ellipsis; overflow:hidden;">
                        <i class="fa fa-file-pdf text-danger me-1"></i> <?= htmlspecialchars($dTitle) ?>
                      </div>
                      <?php if ($dDate): ?>
                      <small style="color:#64748b; font-size:0.75rem;"><i class="fa fa-calendar-alt me-1"></i><?= htmlspecialchars($dDate) ?></small>
                      <?php endif; ?>
                    </div>
                    <a href="<?= htmlspecialchars($dPath) ?>" target="_blank" class="btn btn-sm btn-outline-primary" style="font-size:0.75rem; white-space:nowrap; padding:4px 10px; border-radius:6px;">
                      <i class="fa fa-download me-1"></i> View
                    </a>
                  </div>
                </div>
                <?php endforeach; ?>
              </div>
            </div>
            <?php endif; ?>

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