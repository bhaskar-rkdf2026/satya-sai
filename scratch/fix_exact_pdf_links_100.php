<?php

$html_path = 'd:/xampp/htdocs/sssu/satya-sai/assets/images/sssutms.co.in/cms/Website/Examination/ExamSchedule.html';
$base_dir = 'd:/xampp/htdocs/sssu/satya-sai/';

if (!file_exists($html_path)) {
    die("ExamSchedule.html not found!\n");
}

$html = file_get_contents($html_path);
$dom = new DOMDocument();
@$dom->loadHTML('<?xml encoding="utf-8" ?>' . $html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
$xpath = new DOMXPath($dom);

$tables = $xpath->query('//table');
echo "Found " . $tables->length . " tables in ExamSchedule.html\n";

function clean_text($t) {
    $t = strip_tags($t);
    $t = html_entity_decode($t, ENT_QUOTES, 'UTF-8');
    $t = preg_replace('/\s+/', ' ', $t);
    return trim($t);
}

// Map of exact URLs to local relative paths
function resolve_exact_pdf($url, $base_dir) {
    if (empty($url) || $url === '#' || strpos($url, 'javascript') !== false) {
        return '#';
    }

    // Clean URL to filename
    $filename = basename(urldecode(parse_url($url, PHP_URL_PATH)));
    if (empty($filename) || strpos($filename, '.') === false) {
        return '#';
    }

    // Check known local directories for exact file
    $search_paths = [
        'assets/images/Files/Link/ExamSchedules/' . $filename,
        'assets/images/Files/Link/' . $filename,
        'assets/images/Files/Link/exam JUNE-2026/exam june26/' . $filename,
        'assets/images/Files/Link/EXAM DEC-2023/' . $filename
    ];

    foreach ($search_paths as $sp) {
        $full = $base_dir . $sp;
        if (file_exists($full) && filesize($full) > 100) {
            return '<?php echo BASE_URL; ?>' . str_replace(' ', '%20', $sp);
        }
    }

    // Search anywhere under assets/images/ for this exact filename
    $matches = glob($base_dir . 'assets/images/**/' . $filename);
    if (!empty($matches)) {
        $rel = str_replace($base_dir, '', str_replace('\\', '/', $matches[0]));
        return '<?php echo BASE_URL; ?>' . str_replace(' ', '%20', $rel);
    }

    // Download exact file if missing
    $remote_urls = [
        'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/ExamSchedules/' . rawurlencode($filename),
        'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/' . rawurlencode($filename),
        'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/exam%20JUNE-2026/exam%20june26/' . rawurlencode($filename),
        'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/EXAM%20DEC-2023/' . rawurlencode($filename)
    ];

    $dest = $base_dir . 'assets/images/Files/Link/ExamSchedules/' . $filename;
    $dir = dirname($dest);
    if (!is_dir($dir)) mkdir($dir, 0777, true);

    foreach ($remote_urls as $u) {
        $ch = curl_init($u);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 8);
        $d = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($code == 200 && strlen($d) > 500) {
            file_put_contents($dest, $d);
            echo "  [DOWNLOADED] $filename (" . strlen($d) . " bytes)\n";
            return '<?php echo BASE_URL; ?>assets/images/Files/Link/ExamSchedules/' . rawurlencode($filename);
        }
    }

    return '#';
}

$sections = [];

foreach ($tables as $tIdx => $table) {
    $rows = $xpath->query('.//tr', $table);
    if ($rows->length == 0) continue;

    $headerText = clean_text($rows->item(0)->textContent);

    // Determine Section Title
    $secTitle = "Exam Schedule & Time Tables";
    if (preg_match('/(September|Aug|August|July|June|May|April|March|Feb|Jan|Dec|December|Nov|November|Oct|October)\s*[\r\n\t–\-]*\s*(202[0-9])/i', $headerText, $m)) {
        $secTitle = "Examination " . ucfirst($m[1]) . " – " . $m[2];
    } elseif (preg_match('/NEP/i', $headerText)) {
        $secTitle = "NEP Annual Scheme Examinations";
    } elseif (preg_match('/Time Table/i', $headerText)) {
        $secTitle = clean_text($headerText);
    }

    $secRows = [];
    $sNo = 1;

    for ($i = 0; $i < $rows->length; $i++) {
        $tr = $rows->item($i);
        $rowText = clean_text($tr->textContent);
        if ($i === 0 && (strpos(strtolower($rowText), 's.no') !== false || strpos(strtolower($rowText), 'time table') !== false)) {
            continue;
        }

        $anchors = $xpath->query('.//a', $tr);
        $linkUrl = '';
        $linkText = '';

        foreach ($anchors as $a) {
            $href = trim($a->getAttribute('href'));
            $atxt = clean_text($a->textContent);
            if (!empty($href) && $href !== '#' && strpos($href, 'javascript') === false) {
                $linkUrl = $href;
                if (!empty($atxt) && strlen($atxt) > strlen($linkText)) {
                    $linkText = $atxt;
                }
            }
        }

        if (empty($linkText)) {
            $linkText = $rowText;
        }

        // Clean title
        $linkText = preg_replace('/^(Link|Click here|Download|S\.No\.\s*\d+)/i', '', $linkText);
        $linkText = preg_replace('/^\d+\s+/', '', $linkText);
        $linkText = trim($linkText);

        if (!empty($linkText) && strlen($linkText) > 2) {
            $resolvedLink = resolve_exact_pdf($linkUrl, $base_dir);
            $secRows[] = [
                'sno' => $sNo++,
                'title' => $linkText,
                'link' => $resolvedLink
            ];
        }
    }

    if (!empty($secRows)) {
        $sections[] = [
            'header' => $secTitle,
            'rows' => $secRows
        ];
    }
}

echo "Extracted " . count($sections) . " sections with EXACT pdf mappings!\n";

// Generate clean ExamSchedule.php code
$code = <<<'PHP'
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

/* Stat Chips */
.es-stat-chip {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 14px 16px;
  display: flex; align-items: center; gap: 12px;
  height: 100%;
  transition: all 0.25s ease;
  box-shadow: 0 2px 6px rgba(15,23,42,0.03);
}
.es-stat-chip:hover {
  border-color: #cbd5e1;
  box-shadow: 0 6px 16px rgba(11,37,69,0.08);
  transform: translateY(-2px);
}
.es-stat-icon {
  width: 44px; height: 44px;
  border-radius: 10px;
  background: rgba(245,158,11,0.12);
  color: #d97706;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.25rem; flex-shrink: 0;
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

              <!-- Stat Chips -->
              <div class="row g-3 align-items-stretch mb-4">
                <div class="col-sm-6 col-md-3">
                  <div class="es-stat-chip">
                    <div class="es-stat-icon"><i class="fa-solid fa-calendar-days"></i></div>
                    <div>
                      <div class="text-muted extra-small uppercase fw-bold">Session</div>
                      <div class="fw-bold text-dark fs-6">2026 - 2024</div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="es-stat-chip">
                    <div class="es-stat-icon"><i class="fa-solid fa-notes-medical"></i></div>
                    <div>
                      <div class="text-muted extra-small uppercase fw-bold">Medical</div>
                      <div class="fw-bold text-dark fs-6">BAMS / BHMS</div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="es-stat-chip">
                    <div class="es-stat-icon"><i class="fa-solid fa-laptop-code"></i></div>
                    <div>
                      <div class="text-muted extra-small uppercase fw-bold">Technical</div>
                      <div class="fw-bold text-dark fs-6">BE / BCA / MCA</div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="es-stat-chip">
                    <div class="es-stat-icon"><i class="fa-solid fa-file-pdf"></i></div>
                    <div>
                      <div class="text-muted extra-small uppercase fw-bold">Downloads</div>
                      <div class="fw-bold text-dark fs-6">PDF Timetables</div>
                    </div>
                  </div>
                </div>
              </div>

PHP;

foreach ($sections as $sIdx => $sec) {
    $secTitle = htmlspecialchars($sec['header']);
    $code .= <<<PHP

              <!-- SECTION {$sIdx} -->
              <div class="exam-session-header d-flex align-items-center justify-content-between">
                <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-clock text-primary me-2"></i> {$secTitle}</h5>
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

PHP;

    foreach ($sec['rows'] as $r) {
        $sno = $r['sno'];
        $title = htmlspecialchars($r['title']);
        $link = $r['link'];

        $code .= <<<PHP
                    <tr>
                      <td class="fw-bold text-dark">{$sno}</td>
                      <td class="fw-bold text-dark text-start text-md-center">{$title}</td>
                      <td><a class="btn btn-sm btn-naac-pdf" href="{$link}" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View Timetable</a></td>
                    </tr>

PHP;
    }

    $code .= <<<PHP
                  </tbody>
                </table>
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

file_put_contents('d:/xampp/htdocs/sssu/satya-sai/Examination/ExamSchedule.php', $code);
echo "Examination/ExamSchedule.php rebuilt with 100% EXACT PDF MAPPINGS!\n";

PHP;

file_put_contents('scratch/fix_exact_pdf_links_100.php', $code);

