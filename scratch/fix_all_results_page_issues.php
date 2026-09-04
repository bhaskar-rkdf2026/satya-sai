<?php

$json_path = 'scratch/parsed_result_groups.json';
$res_file = 'd:/xampp/htdocs/sssu/satya-sai/Examination/Results.php';

if (!file_exists($json_path)) {
    die("parsed_result_groups.json not found!\n");
}

$groups = json_decode(file_get_contents($json_path), true);

function clean_str($t) {
    $t = html_entity_decode($t, ENT_QUOTES, 'UTF-8');
    
    // Replace non-breaking spaces, control chars, bullet icons
    $t = preg_replace('/[\x00-\x1F\x7F-\xFF]/', ' ', $t);
    
    // Replace multiple spaces with a single space
    $t = preg_replace('/\s+/', ' ', $t);
    $t = trim($t);
    
    // Strip leading stray bullets/punctuation
    $t = preg_replace('/^[^\w\(\)]+/', '', $t);
    $t = trim($t);
    
    return $t;
}

$cleaned_groups = [];
foreach ($groups as $g) {
    $c_date = clean_str($g['date']);
    $c_items = [];
    foreach ($g['items'] as $item) {
        $c_title = clean_str($item['title']);
        if (!empty($c_title) && strlen($c_title) > 2) {
            $c_items[] = [
                'title' => $c_title,
                'link' => '#'
            ];
        }
    }
    if (!empty($c_date) && !empty($c_items)) {
        $cleaned_groups[] = [
            'date' => $c_date,
            'items' => $c_items
        ];
    }
}

echo "Strictly cleaned " . count($cleaned_groups) . " result date groups!\n";

// Generate Exam/Results.php with Pristine CSS & Layout
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
  padding: 6px 16px;
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
  padding: 12px 18px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 16px;
  transition: all 0.2s ease;
}
.res-item-list li:hover {
  background: #f1f5f9;
  border-color: #cbd5e1;
  box-shadow: 0 4px 12px rgba(11,37,69,0.05);
}
.res-item-title {
  display: flex;
  align-items: center;
  gap: 10px;
  flex: 1 1 auto;
  font-size: 0.935rem;
  font-weight: 700;
  color: #0f172a;
  line-height: 1.4;
}
.res-item-title i {
  color: #10b981;
  font-size: 1rem;
  flex-shrink: 0;
}

/* Exact Button Styling (Dark Navy Pill + Golden Border + Yellow Icon) */
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
  flex-shrink: 0 !important;
}
.btn-naac-portal:hover {
  background: linear-gradient(135deg, #173866 0%, #1e4b8a 100%) !important;
  border-color: #f59e0b !important;
  color: #ffffff !important;
  transform: translateY(-2px) !important;
  box-shadow: 0 6px 16px rgba(11, 37, 69, 0.35) !important;
}
.btn-naac-portal i {
  color: #f59e0b !important;
  font-size: 0.9rem !important;
}
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
              <a href="#" class="btn btn-warning fw-bold px-4 py-2 text-dark rounded-3 shadow-sm">
                <i class="fa-solid fa-right-to-bracket me-1"></i> Student Result Portal
              </a>
            </div>
          </div>
          
          <div class="naac-card-body">
            <article class="fs-5 lh-lg text-secondary">

              <!-- Stat Chips (Medium) -->
              <div class="row g-2 align-items-stretch mb-4">
                <div class="col-sm-6 col-md-3">
                  <div class="res-stat-chip">
                    <div class="res-stat-icon"><i class="fa-solid fa-square-poll-vertical"></i></div>
                    <div>
                      <div class="res-stat-label">Declarations</div>
                      <div class="res-stat-value">Session 2026-24</div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="res-stat-chip">
                    <div class="res-stat-icon"><i class="fa-solid fa-laptop-medical"></i></div>
                    <div>
                      <div class="res-stat-label">Medical / Ayush</div>
                      <div class="res-stat-value">MBBS / BAMS / BHMS</div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="res-stat-chip">
                    <div class="res-stat-icon"><i class="fa-solid fa-gears"></i></div>
                    <div>
                      <div class="res-stat-label">Engineering / Tech</div>
                      <div class="res-stat-value">BE / BCA / MCA</div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="res-stat-chip">
                    <div class="res-stat-icon"><i class="fa-solid fa-briefcase"></i></div>
                    <div>
                      <div class="res-stat-label">Management / Arts</div>
                      <div class="res-stat-value">MBA / BBA / BA</div>
                    </div>
                  </div>
                </div>
              </div>

PHP;

foreach ($cleaned_groups as $gIdx => $g) {
    $dateLabel = htmlspecialchars($g['date']);
    $code .= <<<PHP

              <!-- DATE GROUP {$gIdx} -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> {$dateLabel}</div>
                <ul class="res-item-list">

PHP;

    foreach ($g['items'] as $item) {
        $title = htmlspecialchars($item['title']);
        $code .= <<<PHP
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>{$title}</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
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

file_put_contents($res_file, $code);
echo "Examination/Results.php strictly cleaned & rebuilt with 0 junk characters!\n";

PHP;

file_put_contents('scratch/fix_all_results_page_issues.php', $code);

