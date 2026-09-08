<?php
/**
 * Script to extract ALL PDF links from the saved live HTML of CriteriaOne page
 * and produce an ordered map: criterion section -> live PDF URL -> local file path
 */

$htmlFile = 'C:/Users/Admin/.gemini/antigravity-ide/brain/1d65a721-44b1-4961-9451-41c3ad8495e7/.system_generated/steps/272/content.md';
$repoRoot = 'd:/xampp/htdocs/satya-sai';

$content = file_get_contents($htmlFile);

// Extract all PDF links with context (10 chars of surrounding text before the href)
preg_match_all('/href=["\']([^"\']+\.(?:pdf|PDF)[^"\']*)["\']/', $content, $matches);

$liveLinks = array_unique($matches[1]);
$liveLinks = array_filter($liveLinks, function($url) {
    return strpos($url, 'sssutms.co.in') !== false;
});

echo "=== LIVE CriteriaOne PDF Links (" . count($liveLinks) . " total) ===\n\n";

$i = 1;
$localMap = [];

foreach ($liveLinks as $liveUrl) {
    // Convert live URL to local relative path
    // e.g. https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/... -> assets/images/Files/Link/IQAC/NAAC/...
    $localPath = preg_replace('|https?://(?:www\.)?sssutms\.co\.in/cms/Areas/Website/|', '', $liveUrl);
    $localPath = urldecode($localPath);
    // "Files/..." maps to "assets/images/Files/..."
    if (strpos($localPath, 'Files/') === 0) {
        $localPath = 'assets/images/' . $localPath;
    }
    
    $diskPath = $repoRoot . '/' . $localPath;
    $exists = file_exists($diskPath);
    $size = $exists ? filesize($diskPath) : 0;
    
    $status = $exists ? ($size > 500 ? 'OK' : 'LFS_POINTER') : 'MISSING';
    
    echo "$i. [$status] $liveUrl\n";
    echo "   -> Local: $localPath\n";
    echo "   -> Size: $size\n\n";
    
    $localMap[] = [
        'live_url' => $liveUrl,
        'local_path' => $localPath,
        'disk_path' => $diskPath,
        'exists' => $exists,
        'size' => $size,
        'status' => $status
    ];
    $i++;
}

file_put_contents($repoRoot . '/scratch/criteria_one_live_map.json', json_encode($localMap, JSON_PRETTY_PRINT));
echo "\nMap saved to scratch/criteria_one_live_map.json\n";
