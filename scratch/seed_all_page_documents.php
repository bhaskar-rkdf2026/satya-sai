<?php
/**
 * SSSUTMS - Seed All Page Documents from 227 Pages
 * Extracts all existing PDF links, titles, and categories into data/page_documents.json
 */
$base = 'd:/xampp/htdocs/satya-sai';
require 'scratch/count_pages.php';

$allDocs = [];
$docIdCounter = 1000;
$totalExtracted = 0;

foreach ($partially_dynamic as $p) {
    $fullPath = $base . '/' . $p;
    $content = file_get_contents($fullPath);
    
    // Normalize path separators
    $parts = explode('/', str_replace('\\', '/', $p));
    $section = $parts[0]; // e.g. About, Academic, Admission, Download, Examination, Research
    
    // Determine page key
    $pageName = basename($p, '.php');
    if (count($parts) > 2) {
        $pageKey = $parts[1] . '_' . $pageName;
    } else {
        $pageKey = $pageName;
    }
    
    // Human readable page title
    $pageTitle = ucwords(str_replace(['_', '-'], ' ', $pageName));
    if (preg_match('/<title>(.*?)<\/title>/i', $content, $tMatch)) {
        $extractedTitle = trim(str_replace(['- SSSUTMS', 'SSSUTMS', '| SSSUTMS', 'Sri Satya Sai University'], '', $tMatch[1]));
        if (!empty($extractedTitle)) {
            $pageTitle = $extractedTitle;
        }
    } elseif (preg_match('/\$page_title\s*=\s*[\'"]([^\'"]+)[\'"]/i', $content, $ptMatch)) {
        $extractedTitle = trim(str_replace(['- SSSUTMS', 'SSSUTMS', '| SSSUTMS', 'Sri Satya Sai University'], '', $ptMatch[1]));
        if (!empty($extractedTitle)) {
            $pageTitle = $extractedTitle;
        }
    }

    // Extract PDF links with their enclosing anchor text or table row
    // Match <a ... href="...pdf" ...>anchor text</a>
    preg_match_all('/<a\s+[^>]*href=["\']([^"\']+\.pdf)["\'][^>]*>(.*?)<\/a>/is', $content, $aMatches, PREG_SET_ORDER);
    
    $extractedDocs = [];
    $seenUrls = [];

    foreach ($aMatches as $m) {
        $rawHref = trim($m[1]);
        $rawText = trim(strip_tags($m[2]));
        
        // Clean URL
        $cleanUrl = str_replace(['<?php echo BASE_URL; ?>', '<?= BASE_URL ?>', '<?php echo base_url(); ?>'], '', $rawHref);
        $cleanUrl = trim($cleanUrl);
        if (strpos($cleanUrl, 'http') !== 0 && strpos($cleanUrl, 'ftp') !== 0) {
            $cleanUrl = ltrim($cleanUrl, '/');
            if (strpos($cleanUrl, 'assets/') !== 0 && strpos($cleanUrl, 'images/') === 0) {
                $cleanUrl = 'assets/' . $cleanUrl;
            } elseif (strpos($cleanUrl, 'pdf/') === 0) {
                $cleanUrl = 'assets/' . $cleanUrl;
            }
        }
        
        if (isset($seenUrls[$cleanUrl])) continue;
        $seenUrls[$cleanUrl] = true;
        
        // Title formatting
        $title = $rawText;
        if (empty($title) || strlen($title) < 3 || in_array(strtolower($title), ['download', 'view', 'click here', 'pdf', 'view document'])) {
            $filename = basename(parse_url($cleanUrl, PHP_URL_PATH) ?? '');
            $title = ucwords(str_replace(['_', '-', '.pdf'], [' ', ' ', ''], $filename));
            if (empty($title)) $title = $pageTitle . ' Document';
        }
        // Remove trailing or leading weird chars
        $title = preg_replace('/\s+/', ' ', trim($title));
        
        // Category inference
        $cat = 'General';
        if (stripos($title, 'approval') !== false || stripos($p, 'approv') !== false) $cat = 'Approvals';
        elseif (stripos($title, 'syllabus') !== false || stripos($p, 'syllabus') !== false) $cat = 'Syllabus';
        elseif (stripos($title, 'scheme') !== false || stripos($p, 'scheme') !== false) $cat = 'Scheme';
        elseif (stripos($title, 'exam') !== false || stripos($title, 'time table') !== false || stripos($title, 'schedule') !== false) $cat = 'Exam Schedule';
        elseif (stripos($title, 'result') !== false) $cat = 'Results';
        elseif (stripos($title, 'notification') !== false) $cat = 'Notifications';
        elseif (stripos($title, 'fee') !== false) $cat = 'Fees';
        elseif (stripos($title, 'patent') !== false) $cat = 'Patents';
        elseif (stripos($title, 'ordinance') !== false) $cat = 'Ordinances';
        elseif (stripos($title, 'report') !== false) $cat = 'Reports';
        elseif (stripos($title, 'mou') !== false) $cat = 'MoU';
        elseif (stripos($title, 'naac') !== false) $cat = 'NAAC Documents';
        else $cat = $pageTitle;

        $docIdCounter++;
        $extractedDocs[] = [
            'id' => $docIdCounter,
            'title' => $title,
            'category' => $cat,
            'file' => $cleanUrl,
            'date' => date('Y-m-d'),
            'status' => 'Active'
        ];
        $totalExtracted++;
    }

    if (!empty($extractedDocs)) {
        $allDocs[$pageKey] = [
            'key' => $pageKey,
            'section' => $section,
            'source_file' => $p,
            'title' => $pageTitle,
            'documents' => $extractedDocs
        ];
    }
}

// Save seeded page documents
$saved = file_put_contents(
    $base . '/data/page_documents.json',
    json_encode($allDocs, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)
);

echo "=== SEEDING COMPLETED ===\n";
echo "Total Page Collections Created: " . count($allDocs) . "\n";
echo "Total PDF Documents Extracted & Indexed: " . $totalExtracted . "\n";
echo "Saved to: data/page_documents.json (" . round($saved / 1024, 2) . " KB)\n\n";

echo "=== SAMPLE PAGE COLLECTIONS ===\n";
foreach (array_slice($allDocs, 0, 10) as $key => $col) {
    echo " - " . str_pad($key, 35) . " [" . str_pad($col['section'], 12) . "] : " . count($col['documents']) . " PDFs\n";
}
