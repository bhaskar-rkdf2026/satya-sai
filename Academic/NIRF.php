<?php
require_once __DIR__ . '/../config.php';

$pageSeo = function_exists('get_academic_page_info') ? get_academic_page_info('NIRF') : [];
$page_data = $pageSeo;
$meta_title = !empty($pageSeo['meta_title']) ? $pageSeo['meta_title'] : 'National Institutional Ranking Framework (NIRF) - SSSUTMS';
$page_title = $meta_title;
$meta_description = $pageSeo['meta_description'] ?? '';
$meta_keywords = $pageSeo['meta_keywords'] ?? '';
$canonical_url = $pageSeo['canonical_url'] ?? '';
$og_image = $pageSeo['og_image'] ?? 'assets/images/logo/logo.jpg';
$banner_title = $pageSeo['banner_title'] ?? ($pageSeo['page_title'] ?? 'NIRF');
$banner_category = $pageSeo['banner_category'] ?? 'Academic';
$academicDocs = function_exists('get_academic_documents') ? get_academic_documents('NIRF') : [];

require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?>

<style>
.nirf-section { background-color: #f8fafc; }
.nirf-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15,23,42,0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}
.nirf-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2.2rem 2rem;
  position: relative;
}
.nirf-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.nirf-stat-chip {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 16px 14px;
  display: flex; align-items: center; gap: 12px;
  height: 100%;
  box-shadow: 0 2px 8px rgba(0,0,0,0.02);
  transition: all 0.25s ease;
}
.nirf-stat-chip:hover {
  transform: translateY(-2px);
  border-color: #cbd5e1;
  box-shadow: 0 6px 16px rgba(0,0,0,0.06);
}
.nirf-stat-icon {
  width: 46px; height: 46px;
  border-radius: 12px;
  background: rgba(245,158,11,0.12);
  color: #d97706;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.3rem; flex-shrink: 0;
}
.nirf-doc-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 18px 20px;
  margin-bottom: 1.25rem;
  box-shadow: 0 2px 6px rgba(0,0,0,0.02);
}
.nirf-download-btn {
  background: linear-gradient(135deg, #0b2545 0%, #1e4d8c 100%) !important;
  color: #ffffff !important;
  font-size: 0.82rem;
  font-weight: 700;
  padding: 8px 16px;
  border-radius: 8px;
  border: 1px solid rgba(245,158,11,0.35);
  text-decoration: none !important;
  display: inline-flex;
  align-items: center;
  gap: 7px;
  white-space: nowrap;
  transition: all 0.25s ease;
}
.nirf-download-btn:hover {
  background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%) !important;
  transform: translateY(-1px);
  box-shadow: 0 4px 12px rgba(217,119,6,0.35);
}
</style>

<section class="nirf-section py-5">
  <div class="container">
    <div class="row g-4">

      <!-- Main Content Area -->
      <div class="col-lg-8 col-xl-9">
        <div class="nirf-main-card">
          
          <!-- Header Banner -->
          <div class="nirf-header-banner">
            <span class="badge bg-warning text-dark fw-bold px-3 py-1 mb-2 rounded-pill">
              <i class="fa-solid fa-ranking-star me-1"></i> Institutional Ranking
            </span>
            <h2 class="fw-bold text-white mb-1">National Institutional Ranking Framework (NIRF)</h2>
            <p class="text-white-50 mb-0">Ministry of Education, Government of India Disclosures &amp; Ranking Reports</p>
          </div>

          <div class="p-4">
            
            <!-- Quick KPI Stat Chips -->
            <div class="row g-3 mb-4">
              <div class="col-sm-4">
                <div class="nirf-stat-chip">
                  <div class="nirf-stat-icon"><i class="fa-solid fa-building-columns"></i></div>
                  <div>
                    <span class="d-block text-muted small fw-bold">Overall Data</span>
                    <strong class="text-dark">All Disciplines</strong>
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="nirf-stat-chip">
                  <div class="nirf-stat-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                  <div>
                    <span class="d-block text-muted small fw-bold">Academic Scope</span>
                    <strong class="text-dark">UG / PG / Ph.D.</strong>
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="nirf-stat-chip">
                  <div class="nirf-stat-icon"><i class="fa-solid fa-file-circle-check"></i></div>
                  <div>
                    <span class="d-block text-muted small fw-bold">Verification</span>
                    <strong class="text-dark">Public Data</strong>
                  </div>
                </div>
              </div>
            </div>

            <!-- NIRF Overview Box -->
            <div class="nirf-doc-card mb-4" style="background:#f8fafc; border-left:4px solid #0b2545;">
              <h5 class="fw-bold text-dark mb-2"><i class="fa-solid fa-circle-info text-primary me-2"></i> About NIRF Rankings</h5>
              <p class="text-secondary mb-0" style="font-size:0.95rem; line-height:1.6;">
                The National Institutional Ranking Framework (NIRF) has been launched by the Ministry of Education, Government of India to rank institutions across the country. Sri Satya Sai University of Technology &amp; Medical Sciences participates in NIRF across Engineering, Management, Pharmacy, and Overall categories.
              </p>
            </div>

            <!-- Dynamic Attached Orders & Documents from Admin Panel -->
            <?php if (!empty($academicDocs)): ?>
            <div style="background:#f8fafc; border:1px solid #e2e8f0; border-radius:12px; padding:20px; margin-top:24px;">
              <h5 style="color:#0b2545; font-weight:700; font-size:1.05rem; margin-bottom:14px; display:flex; align-items:center; gap:8px;">
                <i class="fa fa-folder-open text-warning"></i> NIRF Data Reports &amp; Submissions
              </h5>
              <div class="row g-2">
                <?php foreach ($academicDocs as $doc): 
                  $dTitle = !empty($doc['title']) ? $doc['title'] : 'NIRF Report';
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
            <?php else: ?>
            <div class="alert alert-light border rounded-3 p-4 text-center">
              <i class="fa fa-file-pdf text-warning fs-3 mb-2 d-block"></i>
              <h6 class="fw-bold text-dark mb-1">Official NIRF Submissions</h6>
              <p class="text-muted small mb-0">Annual NIRF ranking submissions and DCS data reports will appear here dynamically.</p>
            </div>
            <?php endif; ?>

          </div>
        </div><!-- end nirf-main-card -->
      </div><!-- end col-lg-8 -->

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
