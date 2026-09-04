<?php
require_once __DIR__ . '/parallel_downloader.php';

function extractAllHrefs($dir) {
    $urls = [];
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
    foreach ($iterator as $file) {
        if ($file->isFile() && $file->getExtension() === 'php') {
            $content = file_get_contents($file->getPathname());
            if (preg_match_all('/(?:href|src)=["\']([^"\']+)["\']/i', $content, $m)) {
                foreach ($m[1] as $u) {
                    $u = trim($u);
                    if (empty($u)) continue;
                    if (stripos($u, 'sssutms.co.in') !== false || preg_match('/\.(pdf|jpg|png|jpeg|gif|doc|docx|rar|zip|mp4)$/i', $u)) {
                        // ignore local php references
                        if (stripos($u, '.php') === false && stripos($u, 'localhost') === false) {
                            $urls[] = $u;
                        }
                    }
                }
            }
        }
    }
    return array_values(array_unique($urls));
}

$allUrls = extractAllHrefs(__DIR__ . '/Download');
echo "Found " . count($allUrls) . " unique full hrefs across all Download pages.\n";

file_put_contents(__DIR__ . '/all_hrefs_found.txt', implode("\n", $allUrls));

// Generate mapping
$map = [];
foreach ($allUrls as $u) {
    $cleanU = explode('?', $u)[0];
    $localUrl = getLocalUrlForUrl($u);
    $map[$u] = $localUrl;
}
file_put_contents(__DIR__ . '/url_map.json', json_encode($map, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
echo "Generated url_map.json with " . count($map) . " mappings.\n";

// Now run parallel download
echo "Starting multi-curl download of all files...\n";
downloadBatch($allUrls, 15, 30);
