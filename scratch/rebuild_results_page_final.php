<?php

$groups = json_decode(file_get_contents('scratch/parsed_result_groups.json'), true);
$fpath = 'd:/xampp/htdocs/sssu/satya-sai/Examination/Results.php';

function clean_date($d) {
    $d = strip_tags($d);
    $d = html_entity_decode($d, ENT_QUOTES, 'UTF-8');
    $d = preg_replace('/\s+/', ' ', $d);
    return trim($d);
}

$code = <<<'PHP'
<?php $page_title = 'Examination Results - SSSUTMS';
$banner_title = 'Examination Results';
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

/* Stat Chips */
.res-stat-chip {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 14px 16px;
  display: flex; align-items: center; gap: 12px;
  height: 100%;
  transition: all 0.25s ease;
  box-shadow: 0 2px 6px rgba(15,23,42,0.03);
}
.res-stat-chip:hover {
  border-color: #cbd5e1;
  box-shadow: 0 6px 16px rgba(11,37,69,0.08);
  transform: translateY(-2px);
}
.res-stat-icon {
  width: 44px; height: 44px;
  border-radius: 10px;
  background: rgba(245,158,11,0.12);
  color: #d97706;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.25rem; flex-shrink: 0;
}

/* Date Group Card Component */
.res-group-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 1.25rem 1.5rem;
  box-shadow: 0 4px 14px rgba(15, 23, 42, 0.03);
  margin-bottom: 1.5rem;
}
.res-date-badge {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  font-weight: 700;
  padding: 6px 14px;
  border-radius: 8px;
  display: inline-flex;
  align-items: center;
  gap: 8px;
  font-size: 0.88rem;
  margin-bottom: 1rem;
  border-left: 3px solid #f59e0b;
}
.res-item-list {
  list-style: none;
  padding: 0; margin: 0;
  display: flex;
  flex-direction: column;
  gap: 0.75rem;
}
.res-item-list li {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 10px;
  padding: 12px 16px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 12px;
  transition: all 0.2s ease;
}
.res-item-list li:hover {
  background: #f1f5f9;
  border-color: #cbd5e1;
  box-shadow: 0 4px 12px rgba(11,37,69,0.05);
}

/* Exact Button Styling (Dark Navy Pill + Golden Border + Yellow Icon) */
.btn-naac-pdf,
.btn-naac-portal {
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
.btn-naac-pdf:hover,
.btn-naac-portal:hover {
  background: linear-gradient(135deg, #173866 0%, #1e4b8a 100%) !important;
  border-color: #f59e0b !important;
  color: #ffffff !important;
  transform: translateY(-2px) !important;
  box-shadow: 0 6px 16px rgba(11, 37, 69, 0.35) !important;
}
.btn-naac-pdf i,
.btn-naac-portal i {
  color: #f59e0b !important;
  font-size: 0.9rem !important;
}
.btn-naac-pdf:hover i,
.btn-naac-portal:hover i {
  color: #fbbf24 !important;
}
</style>

<section class="subpage-main-section naac-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-9 col-md-8">
        <div class="naac-main-card">
          <div class="naac-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <h3 class="fw-bold mb-1">EXAMINATION RESULTS</h3>
              <p class="mb-0 text-white-50">Sri Satya Sai University of Technology and Medical Sciences &bull; Official Result Declarations</p>
            </div>
            <div>
              <a href="https://www.universitymanagementsystem.in/SatyaSai" target="_blank" rel="noopener" class="btn btn-warning fw-bold px-4 py-2 text-dark rounded-3 shadow-sm">
                <i class="fa-solid fa-right-to-bracket me-1"></i> Student Result Portal
              </a>
            </div>
          </div>
          
          <div class="naac-card-body">
            <article class="fs-5 lh-lg text-secondary">

              <!-- Stat Chips -->
              <div class="row g-3 align-items-stretch mb-4">
                <div class="col-sm-6 col-md-3">
                  <div class="res-stat-chip">
                    <div class="res-stat-icon"><i class="fa-solid fa-square-poll-vertical"></i></div>
                    <div>
                      <div class="text-muted extra-small uppercase fw-bold">Declarations</div>
                      <div class="fw-bold text-dark fs-6">Session 2026-2024</div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="res-stat-chip">
                    <div class="res-stat-icon"><i class="fa-solid fa-laptop-medical"></i></div>
                    <div>
                      <div class="text-muted extra-small uppercase fw-bold">Medical / Ayush</div>
                      <div class="fw-bold text-dark fs-6">MBBS / BAMS / BHMS</div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="res-stat-chip">
                    <div class="res-stat-icon"><i class="fa-solid fa-gears"></i></div>
                    <div>
                      <div class="text-muted extra-small uppercase fw-bold">Engineering / Tech</div>
                      <div class="fw-bold text-dark fs-6">BE / BCA / MCA</div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="res-stat-chip">
                    <div class="res-stat-icon"><i class="fa-solid fa-briefcase"></i></div>
                    <div>
                      <div class="text-muted extra-small uppercase fw-bold">Management &amp; Arts</div>
                      <div class="fw-bold text-dark fs-6">MBA / BBA / BA</div>
                    </div>
                  </div>
                </div>
              </div>

PHP;

foreach ($groups as $gIdx => $g) {
    $dateLabel = clean_date($g['date']);
    $code .= <<<PHP

              <!-- DATE GROUP {$gIdx} -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> {$dateLabel}</div>
                <ul class="res-item-list">

PHP;

    foreach ($g['items'] as $item) {
        $title = htmlspecialchars($item['title']);
        $link = htmlspecialchars($item['link']);
        $code .= <<<PHP
                  <li>
                    <span class="fw-bold text-dark"><i class="fa-solid fa-circle-check text-success me-2"></i> {$title}</span>
                    <a href="{$link}" target="_blank" rel="noopener" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>

PHP;
    }

    $code .= <<<PHP
                </ul>
              </div>

PHP;
}

$code .= <<<'PHP'

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
PHP;

file_put_contents($fpath, $code);
echo "Examination/Results.php successfully rebuilt with all 404 result declarations!\n";

PHP;

file_put_contents('scratch/rebuild_results_page_final.php', $code);

