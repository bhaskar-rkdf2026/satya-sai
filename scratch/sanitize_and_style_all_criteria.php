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

function sanitizeTableHtml($html, $pageKey) {
    $dom = new DOMDocument();
    @$dom->loadHTML('<?xml encoding="utf-8"?>' . $html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    $xpath = new DOMXPath($dom);

    // 1. Remove unwanted outer wrappers or headers if present
    $stripQueries = [
        '//header', '//nav', '//footer', '//script', '//style',
        '//*[@id="preloader"]', '//*[@id="header"]', '//*[@class="marquebg"]'
    ];
    foreach ($stripQueries as $q) {
        $nodes = $xpath->query($q);
        foreach ($nodes as $n) {
            if ($n->parentNode) {
                $n->parentNode->removeChild($n);
            }
        }
    }

    // 2. Process all table cells (td and th) to strip legacy MSO styles & inline font/size clutter
    $cells = $xpath->query('//td | //th');
    foreach ($cells as $cell) {
        // Strip legacy attributes
        $cell->removeAttribute('style');
        $cell->removeAttribute('class');
        $cell->removeAttribute('width');
        $cell->removeAttribute('height');
        $cell->removeAttribute('align');
        $cell->removeAttribute('valign');
        $cell->removeAttribute('bgcolor');

        // Check inner content: if cell contains headings (h1, h2, h3) or p with inline styles, simplify
        $innerHtml = '';
        foreach ($cell->childNodes as $child) {
            $innerHtml .= $dom->saveHTML($child);
        }

        // Clean up MsoNormal / font / span tags inside cell
        $cleanInner = preg_replace('/<span[^>]*style=["\'][^"\']*["\'][^>]*>(.*?)<\/span>/is', '$1', $innerHtml);
        $cleanInner = preg_replace('/<p[^>]*class=["\']MsoNormal["\'][^>]*>(.*?)<\/p>/is', '$1', $cleanInner);
        $cleanInner = preg_replace('/<p[^>]*style=["\'][^"\']*["\'][^>]*>(.*?)<\/p>/is', '$1', $cleanInner);
        $cleanInner = preg_replace('/<h[1-6][^>]*>(.*?)<\/h[1-6]>/is', '<strong>$1</strong>', $cleanInner);
        $cleanInner = preg_replace('/&nbsp;/', ' ', $cleanInner);
        $cleanInner = preg_replace('/\s+/', ' ', $cleanInner);
        $cleanInner = trim($cleanInner);

        // Fix typos in text like "School of law" -> "School of Law", "School of Mangement" -> "School of Management"
        $cleanInner = str_replace('School of law', 'School of Law', $cleanInner);
        $cleanInner = str_replace('Board of Mangement', 'Board of Management', $cleanInner);
        $cleanInner = str_replace('Click hear', 'View PDF', $cleanInner);
        $cleanInner = str_replace('Click here', 'View PDF', $cleanInner);

        // Re-assign cleaned inner HTML
        if (empty($cleanInner) || $cleanInner === '<br>' || $cleanInner === '<br/>') {
            // keep empty or space
        } else {
            // Set cell inner content safely
            $fragment = $dom->createDocumentFragment();
            @$fragment->appendXML($cleanInner);
            while ($cell->hasChildNodes()) {
                $cell->removeChild($cell->firstChild);
            }
            $cell->appendChild($fragment);
        }
    }

    // 3. Process tables
    $tables = $xpath->query('//table');
    foreach ($tables as $t) {
        $t->removeAttribute('style');
        $t->removeAttribute('width');
        $t->removeAttribute('height');
        $t->removeAttribute('border');
        $t->removeAttribute('cellpadding');
        $t->removeAttribute('cellspacing');
        $t->setAttribute('class', 'table table-bordered table-hover align-middle naac-custom-table');
    }

    $cleanHtml = $dom->saveHTML();

    // 4. Transform links to PDF download buttons
    $cleanHtml = preg_replace_callback('/<a\s+[^>]*href=["\']([^"\']+)["\'][^>]*>(.*?)<\/a>/is', function($matches) {
        $href = trim($matches[1]);
        $linkText = trim(strip_tags($matches[2]));

        if (stripos($href, '.pdf') !== false) {
            // Extract local path
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

            $relPath = str_replace('\\', '/', $relPath);
            $relPath = rawurldecode($relPath);

            $hrefAttr = 'href="<?php echo BASE_URL; ?>' . $relPath . '" target="_blank" rel="noopener"';
            return '<a class="btn btn-sm btn-naac-pdf" ' . $hrefAttr . '><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a>';
        }

        return $matches[0];
    }, $cleanHtml);

    // 5. Specific BOM / BOG fix for Criteria 1
    if ($pageKey === 'CriteriaOne') {
        // Fix BOG link row
        $cleanHtml = preg_replace(
            '/(Board of Governance.*?<a\s+[^>]*class="btn btn-sm btn-naac-pdf"\s+href=")[^"]+(")/is',
            '$1<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/BOG FINAL.pdf$2',
            $cleanHtml
        );
        // Fix BOM link row
        $cleanHtml = preg_replace(
            '/(Board of Management.*?<a\s+[^>]*class="btn btn-sm btn-naac-pdf"\s+href=")[^"]+(")/is',
            '$1<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/BOM FINAL.pdf$2',
            $cleanHtml
        );
    }

    // Clean XML & HTML declaration wrappers
    $cleanHtml = str_replace('<?xml encoding="utf-8"?>', '', $cleanHtml);

    return $cleanHtml;
}

foreach ($pages as $key => $info) {
    echo "Processing $key ...\n";

    if (!file_exists($info['html'])) {
        echo "  [ERROR] Missing HTML for $key\n";
        continue;
    }

    $rawHtml = file_get_contents($info['html']);
    $dom = new DOMDocument();
    @$dom->loadHTML($rawHtml);
    $xp = new DOMXPath($dom);

    $articles = $xp->query('//article');
    if ($articles->length == 0) {
        echo "  [ERROR] No article tag found in $key HTML\n";
        continue;
    }

    $articleHtml = $dom->saveHTML($articles->item(0));
    $cleanedContent = sanitizeTableHtml($articleHtml, $key);

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
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 1.8rem 2rem;
  position: relative;
}
.naac-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.naac-card-body { 
  padding: 2rem; 
  color: #334155;
  font-size: 0.95rem;
}

/* Section Title inside Body */
.naac-card-body h4, 
.naac-card-body h5, 
.naac-card-body p strong {
  color: #0f172a;
  font-weight: 700;
}

/* Custom Table Styling */
.table-responsive {
  border-radius: 12px;
  overflow-x: auto;
  border: 1px solid #e2e8f0;
  margin-top: 1rem;
  margin-bottom: 1.5rem;
}
.naac-custom-table {
  margin-bottom: 0 !important;
  width: 100% !important;
  border-collapse: collapse;
}
.naac-custom-table tr:first-child td,
.naac-custom-table th {
  background-color: #0b2545 !important;
  color: #ffffff !important;
  font-weight: 600 !important;
  font-size: 0.9rem !important;
  text-align: center !important;
  vertical-align: middle !important;
  padding: 14px 16px !important;
  border: 1px solid #1e3a8a !important;
  letter-spacing: 0.3px;
}
.naac-custom-table td {
  vertical-align: middle !important;
  padding: 14px 18px !important;
  border: 1px solid #e2e8f0 !important;
  font-size: 0.925rem !important;
  color: #334155 !important;
  line-height: 1.5 !important;
  font-family: inherit !important;
}
.naac-custom-table tr:nth-child(even) td {
  background-color: #f8fafc !important;
}
.naac-custom-table tr:hover td {
  background-color: #f1f5f9 !important;
}
.naac-custom-table td strong {
  color: #0f172a !important;
  font-weight: 600 !important;
}

/* PDF Download Button Styling */
.btn-naac-pdf {
  background: linear-gradient(135deg, #0284c7 0%, #0369a1 100%);
  color: #ffffff !important;
  border: none;
  padding: 7px 16px;
  border-radius: 6px;
  font-weight: 500;
  font-size: 0.85rem;
  text-decoration: none !important;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  transition: all 0.25s ease;
  box-shadow: 0 2px 6px rgba(2,132,199,0.25);
  white-space: nowrap;
}
.btn-naac-pdf:hover {
  background: linear-gradient(135deg, #0369a1 0%, #075985 100%);
  color: #ffffff !important;
  transform: translateY(-2px);
  box-shadow: 0 4px 12px rgba(2,132,199,0.4);
}
.btn-naac-pdf i {
  color: #7dd3fc;
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
              {$cleanedContent}
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
    echo "  [SUCCESS] Cleaned typography & styles for {$info['php']}\n";
}

echo "\nAll Criteria pages successfully sanitized and styled!\n";

