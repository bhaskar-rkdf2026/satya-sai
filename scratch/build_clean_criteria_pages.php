<?php

$baseDir = 'd:/xampp/htdocs/sssu/satya-sai';

$pages = [
    'CriteriaOne' => [
        'php' => "$baseDir/Academic/NAAC/CriteriaOne.php",
        'html' => "$baseDir/assets/images/sssutms.co.in/cms/Website/Academic/NAAC/CriteriaOne.html",
        'title' => 'Criteria 1 - Curriculum Design & Development',
        'banner_title' => 'Criteria 1 &ndash; Curriculum Design & Development'
    ],
    'CriteriaTwo' => [
        'php' => "$baseDir/Academic/NAAC/CriteriaTwo.php",
        'html' => "$baseDir/assets/images/sssutms.co.in/cms/Website/Academic/NAAC/CriteriaTwo.html",
        'title' => 'Criteria 2 - Teaching-Learning and Evaluation',
        'banner_title' => 'Criteria 2 &ndash; Teaching-Learning and Evaluation'
    ],
    'CriteriaThree' => [
        'php' => "$baseDir/Academic/NAAC/CriteriaThree.php",
        'html' => "$baseDir/assets/images/sssutms.co.in/cms/Website/Academic/NAAC/CriteriaThree.html",
        'title' => 'Criteria 3 - Research, Innovations and Extension',
        'banner_title' => 'Criteria 3 &ndash; Research, Innovations and Extension'
    ],
    'CriteriaFour' => [
        'php' => "$baseDir/Academic/NAAC/CriteriaFour.php",
        'html' => "$baseDir/assets/images/sssutms.co.in/cms/Website/Academic/NAAC/CriteriaFour.html",
        'title' => 'Criteria 4 - Infrastructure and Learning Resources',
        'banner_title' => 'Criteria 4 &ndash; Infrastructure and Learning Resources'
    ],
    'CriteriaFive' => [
        'php' => "$baseDir/Academic/NAAC/CriteriaFive.php",
        'html' => "$baseDir/assets/images/sssutms.co.in/cms/Website/Academic/NAAC/CriteriaFive.html",
        'title' => 'Criteria 5 - Student Support and Progression',
        'banner_title' => 'Criteria 5 &ndash; Student Support and Progression'
    ],
    'CriteriaSix' => [
        'php' => "$baseDir/Academic/NAAC/CriteriaSix.php",
        'html' => "$baseDir/assets/images/sssutms.co.in/cms/Website/Academic/NAAC/CriteriaSix.html",
        'title' => 'Criteria 6 - Governance, Leadership and Management',
        'banner_title' => 'Criteria 6 &ndash; Governance, Leadership and Management'
    ],
    'CriteriaSeven' => [
        'php' => "$baseDir/Academic/NAAC/CriteriaSeven.php",
        'html' => "$baseDir/assets/images/sssutms.co.in/cms/Website/Academic/NAAC/CriteriaSeven.html",
        'title' => 'Criteria 7 - Institutional Values and Best Practices',
        'banner_title' => 'Criteria 7 &ndash; Institutional Values and Best Practices'
    ]
];

function convertHrefToLocalPhp($href) {
    $href = trim($href);
    if (empty($href) || $href === '#' || strpos($href, 'javascript:') === 0) {
        return 'href="#"';
    }

    // Extract relative PDF path from URL
    // e.g. https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria 1/BOG FINAL.pdf
    // or ../../../Areas/Website/Files/Link/IQAC/NAAC/...
    $relPath = '';

    if (preg_match('/Files\/(Link\/IQAC\/NAAC\/.*\.pdf)/i', $href, $m)) {
        $relPath = 'assets/images/Files/' . $m[1];
    } elseif (preg_match('/Files\/(Widget\/Download\/.*\.pdf)/i', $href, $m)) {
        $relPath = 'assets/images/Files/' . $m[1];
    } elseif (preg_match('/Files\/(.*\.pdf)/i', $href, $m)) {
        $relPath = 'assets/images/Files/' . $m[1];
    } elseif (stripos($href, '.pdf') !== false) {
        $filename = basename(parse_url($href, PHP_URL_PATH));
        $relPath = 'assets/images/Files/Link/IQAC/NAAC/' . $filename;
    } else {
        return 'href="' . $href . '"';
    }

    // Replace %20 with actual spaces in path or clean url
    $relPath = rawurldecode($relPath);
    $relPath = str_replace('\\', '/', $relPath);

    return 'href="<?php echo BASE_URL; ?>' . $relPath . '" target="_blank" rel="noopener"';
}

function processContent($htmlPath) {
    if (!file_exists($htmlPath)) return '';

    $rawHtml = file_get_contents($htmlPath);

    $dom = new DOMDocument();
    @$dom->loadHTML('<?xml encoding="utf-8"?>' . $rawHtml, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    $xpath = new DOMXPath($dom);

    // Extract nodes from main content div
    $targetNode = null;
    $queries = [
        '//div[contains(@class, "col-md-9")]',
        '//div[contains(@class, "col-sm-8")]',
        '//div[contains(@class, "section-content")]',
        '//body'
    ];

    foreach ($queries as $q) {
        $nodes = $xpath->query($q);
        if ($nodes->length > 0) {
            $targetNode = $nodes->item(0);
            break;
        }
    }

    if (!$targetNode) return '';

    $html = '';
    foreach ($targetNode->childNodes as $child) {
        // Skip header/footer elements inside html snapshot
        $nodeName = strtolower($child->nodeName);
        if (in_array($nodeName, ['header', 'footer', 'script', 'style', 'nav'])) {
            continue;
        }
        $html .= $dom->saveHTML($child);
    }

    // Clean up inline table styling and add modern CSS classes
    $html = preg_replace('/<table[^>]*>/i', '<table class="table table-bordered table-striped table-hover align-middle custom-naac-table">', $html);

    // Convert PDF links
    $html = preg_replace_callback('/href=["\']([^"\']+)["\']/i', function($m) {
        return convertHrefToLocalPhp($m[1]);
    }, $html);

    // Clean up empty paragraphs or weird artifacts
    $html = preg_replace('/<p>&nbsp;<\/p>/i', '', $html);

    return $html;
}

foreach ($pages as $key => $info) {
    echo "Processing $key ...\n";
    $content = processContent($info['html']);
    if (empty($content)) {
        echo "  [ERROR] Empty content for $key\n";
        continue;
    }

    $template = <<<PHP
<?php
\$page_title = '{$info['title']} - SSSUTMS';
\$banner_title = '{$info['banner_title']}';
\$banner_category = 'Academic';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
.naac-section { background-color: #f8fafc; }
.naac-main-card {
  background: #ffffff;
  border-radius: 16px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15,23,42,0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}
.naac-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2rem 2rem;
  position: relative;
}
.naac-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.naac-card-body { padding: 2rem; }
.custom-naac-table {
  border: 1px solid #e2e8f0 !important;
  border-radius: 8px;
  overflow: hidden;
  margin-bottom: 1.5rem;
  font-size: 0.95rem;
}
.custom-naac-table th {
  background-color: #0b2545 !important;
  color: #ffffff !important;
  font-weight: 600;
  text-align: center;
  vertical-align: middle;
}
.custom-naac-table td {
  vertical-align: middle;
  padding: 12px 14px;
}
.custom-naac-table a {
  display: inline-block;
  background: #0284c7;
  color: #ffffff !important;
  padding: 6px 14px;
  border-radius: 6px;
  font-weight: 500;
  font-size: 0.875rem;
  text-decoration: none !important;
  transition: all 0.2s ease;
}
.custom-naac-table a:hover {
  background: #0369a1;
  transform: translateY(-1px);
  box-shadow: 0 4px 10px rgba(2,132,199,0.3);
}
</style>

<section class="subpage-main-section naac-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-9 col-md-8">
        <div class="naac-main-card">
          <div class="naac-header-banner">
            <h3 class="fw-bold mb-1">{$info['banner_title']}</h3>
            <p class="mb-0 text-white-50">Sri Satya Sai University of Technology and Medical Sciences</p>
          </div>
          
          <div class="naac-card-body">
            <div class="table-responsive">
              {$content}
            </div>
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

    file_put_contents($info['php'], $template);
    echo "  [SUCCESS] Updated {$info['php']}\n";
}

echo "All Criteria pages cleanly built!\n";

