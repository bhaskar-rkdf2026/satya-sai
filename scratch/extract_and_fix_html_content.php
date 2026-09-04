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

function processHtmlContent($htmlPath, $baseDir) {
    if (!file_exists($htmlPath)) return '';

    $rawHtml = file_get_contents($htmlPath);

    // Load DOM to find the main content area (usually <div class="col-md-9..."> or inside section)
    $dom = new DOMDocument();
    @$dom->loadHTML($rawHtml);
    $xpath = new DOMXPath($dom);

    // Look for content container
    $nodes = $xpath->query('//div[contains(@class, "col-md-9") or contains(@class, "col-sm-8") or contains(@class, "section-content")]');
    $contentHtml = '';

    if ($nodes->length > 0) {
        $node = $nodes->item(0);
        foreach ($node->childNodes as $child) {
            $contentHtml .= $dom->saveHTML($child);
        }
    } else {
        // Fallback to body
        $body = $dom->getElementsByTagName('body')->item(0);
        if ($body) {
            foreach ($body->childNodes as $child) {
                $contentHtml .= $dom->saveHTML($child);
            }
        }
    }

    // Clean up hrefs to use BASE_URL and local assets
    // Pattern to match all hrefs
    $contentHtml = preg_replace_callback('/href=["\']([^"\']+)["\']/i', function($matches) use ($baseDir) {
        $href = trim($matches[1]);
        if (empty($href) || $href === '#' || strpos($href, 'javascript:') === 0) {
            return 'href="#"';
        }

        // If it's a PDF link
        if (stripos($href, '.pdf') !== false) {
            // Normalize path to local assets
            $relPath = '';
            if (preg_match('/Files\/(Link\/IQAC\/NAAC\/.*\.pdf)/i', $href, $m)) {
                $relPath = 'assets/images/Files/' . $m[1];
            } elseif (preg_match('/Files\/(Widget\/Download\/.*\.pdf)/i', $href, $m)) {
                $relPath = 'assets/images/Files/' . $m[1];
            } elseif (preg_match('/Files\/(.*\.pdf)/i', $href, $m)) {
                $relPath = 'assets/images/Files/' . $m[1];
            } else {
                $filename = basename(parse_url($href, PHP_URL_PATH));
                $relPath = 'assets/images/Files/Link/IQAC/NAAC/' . rawurldecode($filename);
            }

            // Clean up spaces & backslashes
            $relPath = str_replace('\\', '/', $relPath);
            $relPath = rawurldecode($relPath);

            // Verify if local file exists
            $fullLocal = "$baseDir/$relPath";
            if (!file_exists($fullLocal)) {
                // Check if alternative exists in assets/images/Files/Link/IQAC/NAAC/Criteria 1/...
                $altFilename = basename($relPath);
                // Try searching for file recursively or check common dirs
            }

            return 'href="<?php echo BASE_URL; ?>' . $relPath . '" target="_blank" rel="noopener"';
        }

        return 'href="' . $href . '"';
    }, $contentHtml);

    return $contentHtml;
}

foreach ($pages as $key => $info) {
    echo "Updating {$info['php']} ...\n";
    $bodyContent = processHtmlContent($info['html'], $baseDir);
    if (empty($bodyContent)) {
        echo "WARNING: Could not extract body content for $key\n";
        continue;
    }

    $phpTemplate = <<<PHP
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
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15,23,42,0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}
.naac-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2.2rem 2rem;
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
.naac-card-body table {
  width: 100% !important;
  margin-bottom: 1.5rem;
}
.naac-card-body td, .naac-card-body th {
  padding: 10px 14px;
}
.naac-card-body a {
  color: #0284c7;
  font-weight: 600;
  text-decoration: none;
}
.naac-card-body a:hover {
  text-decoration: underline;
  color: #0369a1;
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
              {$bodyContent}
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

    file_put_contents($info['php'], $phpTemplate);
    echo "  -> Updated {$info['php']} successfully!\n";
}

echo "\nAll Criteria pages updated!\n";

