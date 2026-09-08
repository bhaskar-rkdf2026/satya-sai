<?php
/**
 * Build exact CriteriaOne.php PDF links matching the live website's exact order and paths.
 * Source: https://sssutms.co.in/cms/Website/Academic/NAAC/CriteriaOne
 * 
 * Strategy: Read the live HTML, extract PDF links in exact order with surrounding context
 * (section headings), then rebuild CriteriaOne.php href values to match exactly.
 */

$repoRoot = 'd:/xampp/htdocs/satya-sai';
$criteriaOnePath = $repoRoot . '/Academic/NAAC/CriteriaOne.php';
$htmlFile = 'C:/Users/Admin/.gemini/antigravity-ide/brain/1d65a721-44b1-4961-9451-41c3ad8495e7/.system_generated/steps/272/content.md';

$html = file_get_contents($htmlFile);

// Extract ALL PDF links in order with context
preg_match_all('/(href=["\'])(https?://(?:www\.)?sssutms\.co\.in/cms/Areas/Website/Files/[^"\']*\.(?:pdf|PDF))(["\'])/i', $html, $matches, PREG_OFFSET_CAPTURE);

echo "Found " . count($matches[2]) . " live PDF links in order.\n\n";

// Build live URL -> local path mapping
$liveToLocal = [];
foreach ($matches[2] as $m) {
    $liveUrl = $m[0];
    $localPath = preg_replace('|https?://(?:www\.)?sssutms\.co\.in/cms/Areas/Website/|', '', $liveUrl);
    $localPath = urldecode($localPath);
    if (strpos($localPath, 'Files/') === 0) {
        $localPath = 'assets/images/' . $localPath;
    }
    $liveToLocal[$liveUrl] = $localPath;
}

// Now read current CriteriaOne.php and update all PDF hrefs to match live paths
$content = file_get_contents($criteriaOnePath);

$fixCount = 0;

// We'll do an intelligent replacement: for each live URL, find the local path and update hrefs in CriteriaOne.php
foreach ($liveToLocal as $liveUrl => $localPath) {
    $diskPath = $repoRoot . '/' . $localPath;
    
    // Extract the filename for fuzzy matching in current PHP file
    $basename = basename($localPath);
    
    // Try to find this file referenced in the PHP (by filename)
    $escapedBasename = preg_quote($basename, '/');
    
    // Pattern: find any href that contains this filename
    $pattern = '/href=["\']([^"\']*' . $escapedBasename . ')["\']/i';
    
    if (preg_match($pattern, $content, $found)) {
        $currentHref = $found[1];
        $newHref = '<?php echo BASE_URL; ?>' . $localPath;
        
        if ($currentHref !== $newHref) {
            $content = str_replace($currentHref, $newHref, $content);
            echo "[FIXED] $basename\n  Was: $currentHref\n  Now: $newHref\n\n";
            $fixCount++;
        }
    }
}

file_put_contents($criteriaOnePath, $content);
echo "Fixed $fixCount PDF href paths in CriteriaOne.php to match live website exactly!\n";
