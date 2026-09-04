<?php
/**
 * Automated Redesign Transformer for Outcome Based Curriculum (OBE) Pages
 */

$urlMap = json_decode(file_get_contents(__DIR__ . '/url_map.json'), true);

function mapLiveUrlToLocal($href, $urlMap) {
    $trimmed = trim($href);
    if (empty($trimmed) || $trimmed === '#') return '#';
    
    if (isset($urlMap[$trimmed])) {
        return '<?php echo BASE_URL; ?>' . $urlMap[$trimmed];
    }
    
    $decoded = urldecode($trimmed);
    if (isset($urlMap[$decoded])) {
        return '<?php echo BASE_URL; ?>' . $urlMap[$decoded];
    }
    
    foreach ($urlMap as $live => $local) {
        if (urldecode($live) === $decoded || basename(urldecode($live)) === basename($decoded)) {
            return '<?php echo BASE_URL; ?>' . $local;
        }
    }
    
    if (preg_match('#/cms/Areas/Website/Files/Link/(.*)$#i', $decoded, $m)) {
        $parts = explode('/', str_replace('\\', '/', $m[1]));
        $cleanParts = array_map(function($p) { return preg_replace('/[<>:"\/\\\\|?*]/', '_', $p); }, $parts);
        return '<?php echo BASE_URL; ?>assets/images/Files/Link/' . implode('/', $cleanParts);
    }
    
    return $trimmed;
}

function transformObeContent($rawHtml, $pageTitle, $urlMap) {
    // 1. Extract Vision if present
    $visionText = "";
    if (preg_match('/VISION.*?<\/p>\s*<p[^>]*>(.*?)<\/p>/is', $rawHtml, $m)) {
        $visionText = trim(strip_tags($m[1]));
    } elseif (preg_match('/VISION[\s\S]*?(?:“|")(.*?)(?:”|")/is', $rawHtml, $m)) {
        $visionText = trim($m[1]);
    }

    // 2. Extract Mission if present
    $missionText = "";
    if (preg_match('/MISSION.*?<\/p>\s*<p[^>]*>(.*?)<\/p>/is', $rawHtml, $m)) {
        $missionText = trim(strip_tags($m[1]));
    } elseif (preg_match('/MISSION[\s\S]*?(?:“|")(.*?)(?:”|")/is', $rawHtml, $m)) {
        $missionText = trim($m[1]);
    }
    
    // 3. Extract all links and their labels from table rows
    $items = [];
    if (preg_match_all('/<tr[^>]*>([\s\S]*?)<\/tr>/i', $rawHtml, $trMatches)) {
        foreach ($trMatches[1] as $tr) {
            if (preg_match_all('/<a\s+[^>]*href=["\']([^"\']+)["\'][^>]*>([\s\S]*?)<\/a>/i', $tr, $aMatches)) {
                for ($i = 0; $i < count($aMatches[0]); $i++) {
                    $href = $aMatches[1][$i];
                    $label = trim(strip_tags($aMatches[2][$i]));
                    if (empty($label)) $label = basename($href);
                    
                    $courseName = "";
                    if (preg_match_all('/<td[^>]*>([\s\S]*?)<\/td>/i', $tr, $tdMatches)) {
                        foreach ($tdMatches[1] as $td) {
                            if (strpos($td, $href) === false) {
                                $t = trim(strip_tags($td));
                                if (!empty($t) && !is_numeric($t) && stripos($t, 'sr') === false && stripos($t, 'course') === false && stripos($t, 'file') === false) {
                                    $courseName = $t;
                                }
                            }
                        }
                    }
                    
                    $localUrl = mapLiveUrlToLocal($href, $urlMap);
                    $items[] = [
                        'course' => !empty($courseName) ? $courseName : $label,
                        'title' => $label,
                        'url' => $localUrl
                    ];
                }
            }
        }
    }
    
    // Clean duplicates based on URL
    $unique = [];
    $filteredItems = [];
    foreach ($items as $it) {
        if (!isset($unique[$it['url']])) {
            $unique[$it['url']] = true;
            $filteredItems[] = $it;
        }
    }
    
    $safeTitle = htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8');
    
    $out = "<" . "?php\n";
    $out .= "\$page_title = '{$safeTitle} - Outcome Based Curriculum - SSSUTMS';\n";
    $out .= "\$banner_title = '{$safeTitle}';\n";
    $out .= "\$banner_category = 'Outcome Based Curriculum';\n\n";
    $out .= "require_once __DIR__ . '/../../config.php';\n";
    $out .= "require_once __DIR__ . '/../../includes/header.php';\n";
    $out .= "require_once __DIR__ . '/../../includes/topbar.php';\n";
    $out .= "require_once __DIR__ . '/../../includes/navbar.php';\n";
    $out .= "require_once __DIR__ . '/../../includes/page-banner.php';\n";
    $out .= "?" . ">\n\n";
    
    $out .= <<<HTML
<section class="subpage-main-section py-4 bg-light">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="content-card shadow-sm border-0 rounded-4 bg-white p-4 mb-4">
          
          <!-- Header Banner -->
          <div class="d-flex flex-wrap justify-content-between align-items-center pb-3 mb-4 border-bottom">
            <div>
              <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-2 rounded-pill fw-semibold mb-2">
                <i class="fa fa-graduation-cap me-1"></i> Outcome Based Education (OBE)
              </span>
              <h3 class="fw-bold text-navy mb-1" style="color: #002B5B;">{$safeTitle}</h3>
              <p class="text-muted small mb-0">Program Educational Objectives, Program Outcomes &amp; Course Curricula.</p>
            </div>
            <div class="mt-2 mt-md-0">
              <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded-pill">
                <i class="fa fa-certificate me-1"></i> UGC &amp; Statutory Approved
              </span>
            </div>
          </div>

HTML;

    if (!empty($visionText) || !empty($missionText)) {
        $out .= "          <!-- Vision & Mission Cards -->\n";
        $out .= "          <div class=\"row g-3 mb-4\">\n";
        if (!empty($visionText)) {
            $safeVision = htmlspecialchars($visionText, ENT_QUOTES, 'UTF-8');
            $out .= <<<HTML
            <div class="col-md-6">
              <div class="card h-100 border-0 rounded-4 p-4 shadow-sm" style="background: linear-gradient(135deg, #f0f7ff 0%, #e6f0fa 100%); border-left: 5px solid #002B5B !important;">
                <h5 class="fw-bold text-navy mb-2" style="color: #002B5B;">
                  <i class="fa fa-eye text-primary me-2"></i>Department Vision
                </h5>
                <p class="small text-secondary mb-0 lh-base">
                  "{$safeVision}"
                </p>
              </div>
            </div>
HTML;
        }
        if (!empty($missionText)) {
            $safeMission = nl2br(htmlspecialchars($missionText, ENT_QUOTES, 'UTF-8'));
            $out .= <<<HTML
            <div class="col-md-6">
              <div class="card h-100 border-0 rounded-4 p-4 shadow-sm" style="background: linear-gradient(135deg, #fffbf0 0%, #fff6e6 100%); border-left: 5px solid #e67e23 !important;">
                <h5 class="fw-bold text-navy mb-2" style="color: #002B5B;">
                  <i class="fa fa-bullseye text-warning me-2"></i>Department Mission
                </h5>
                <div class="small text-secondary mb-0 lh-base">
                  {$safeMission}
                </div>
              </div>
            </div>
HTML;
        }
        $out .= "          </div>\n";
    }

    $out .= <<<HTML

          <!-- Search Filter Box -->
          <div class="row g-3 mb-3 align-items-center">
            <div class="col-md-6 col-lg-5">
              <div class="input-group">
                <span class="input-group-text bg-light border-end-0"><i class="fa fa-search text-muted"></i></span>
                <input type="text" class="form-control border-start-0 ps-0 obe-filter-input" placeholder="Search branch, curriculum, course...">
              </div>
            </div>
            <div class="col-md-6 col-lg-7 text-md-end text-muted small">
              <i class="fa fa-file-pdf text-danger me-1"></i> Direct access to official syllabus &amp; OBE framework files
            </div>
          </div>

          <!-- Curriculum Matrix Table -->
          <div class="table-responsive rounded-3 border">
            <table class="table table-hover align-middle mb-0 obe-table">
              <thead style="background: linear-gradient(135deg, #002B5B 0%, #0d47a1 100%); color: #fff;">
                <tr>
                  <th style="width: 70px;" class="text-center">S.No.</th>
                  <th>Program / Specialization</th>
                  <th>Curriculum Document (OBE)</th>
                  <th class="text-center" style="width: 170px;">Action</th>
                </tr>
              </thead>
              <tbody>

HTML;

    if (empty($filteredItems)) {
        $out .= <<<HTML
                <tr>
                  <td colspan="4" class="text-center py-4 text-muted">No specific OBE documents uploaded yet. Please check the Schemes &amp; Syllabus section.</td>
                </tr>
HTML;
    } else {
        $sno = 1;
        foreach ($filteredItems as $item) {
            $safeCourse = htmlspecialchars($item['course'], ENT_QUOTES, 'UTF-8');
            $safeDocTitle = htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8');
            $itemUrl = $item['url'];
            
            $out .= <<<HTML
                <tr>
                  <td class="text-center fw-bold text-muted">{$sno}</td>
                  <td class="fw-semibold text-dark">{$safeCourse}</td>
                  <td>
                    <span class="badge bg-light text-dark border me-2"><i class="fa fa-book me-1 text-primary"></i> Curriculum</span>
                    <span class="text-secondary small">{$safeDocTitle}</span>
                  </td>
                  <td class="text-center">
                    <a href="{$itemUrl}" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-3 py-1">
                      <i class="fa fa-file-pdf text-danger me-1"></i> Download PDF
                    </a>
                  </td>
                </tr>

HTML;
            $sno++;
        }
    }

    $out .= <<<HTML
              </tbody>
            </table>
          </div>

        </div>
      </div>

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const searchInput = document.querySelector('.obe-filter-input');
  const table = document.querySelector('.obe-table');
  if (searchInput && table) {
    searchInput.addEventListener('keyup', function() {
      const query = this.value.toLowerCase().trim();
      const rows = table.querySelectorAll('tbody tr');
      rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(query) ? '' : 'none';
      });
    });
  }
});
</script>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
HTML;

    return $out;
}

$obeList = [
    'Engineering.php' => 'Faculty of Engineering & Technology',
    'Pharma.php' => 'Faculty of Pharmacy',
    'Education.php' => 'Faculty of Education',
    'Physical_Education.php' => 'Faculty of Physical Education',
    'Management.php' => 'Faculty of Management Studies',
    'Computer_Application.php' => 'Faculty of Computer Applications',
    'BHMCT.php' => 'Faculty of Hotel Management & Catering Technology',
    'Science.php' => 'Faculty of Basic & Applied Sciences',
    'Life_Science.php' => 'Faculty of Life Sciences',
    'Arts_And_Humanities.php' => 'Faculty of Arts & Humanities',
    'Commerce.php' => 'Faculty of Commerce'
];

foreach ($obeList as $filename => $title) {
    $path = __DIR__ . '/Download/OutcomeBasedCurriculum/' . $filename;
    if (file_exists($path)) {
        $raw = file_get_contents($path);
        $redesigned = transformObeContent($raw, $title, $urlMap);
        file_put_contents($path, $redesigned);
        echo "Successfully redesigned: $filename\n";
    }
}
