<?php
$file = __DIR__ . '/../Download/Scheme/BHMCT.php';
$content = file_get_contents($file);
$base_dir = realpath(__DIR__ . '/..');

preg_match_all('/href=["\'](?:<\?=\s*base_url\([\'"](.*?)[\'"]\)\s*\?>|([^"\']+\.pdf))["\']/', $content, $matches, PREG_SET_ORDER);

$unique_links = [];
foreach ($matches as $m) {
    $link = !empty($m[1]) ? $m[1] : $m[2];
    if ($link && $link !== '#') {
        $unique_links[] = $link;
    }
}
$unique_links = array_unique($unique_links);

echo "Total unique PDF links in BHMCT.php: " . count($unique_links) . "\n\n";

$downloaded = 0;
$missing = 0;
$valid = 0;

foreach ($unique_links as $rel) {
    $decoded = urldecode($rel);
    $local_path = $base_dir . '/' . str_replace('/', DIRECTORY_SEPARATOR, $decoded);
    
    if (file_exists($local_path)) {
        $valid++;
        echo "[EXISTS] $rel\n";
    } else {
        $basename = basename($decoded);
        $candidates = glob($base_dir . '/assets/images/Files/Link/**/' . $basename);
        if (!empty($candidates)) {
            $found_rel = str_replace($base_dir . DIRECTORY_SEPARATOR, '', $candidates[0]);
            $found_rel = str_replace('\\', '/', $found_rel);
            echo "[LOCATED AT] $rel -> $found_rel\n";
            $valid++;
            continue;
        }
        
        // Try live
        $live_urls = [
            'https://sssutms.co.in/cms/Areas/Website/Files/Link/' . str_replace('assets/images/Files/Link/', '', $rel),
            'https://sssutms.co.in/cms/' . $rel,
            'https://sssutms.co.in/' . $rel,
            'https://sssutms.co.in/cms/Areas/Website/Files/Link/SCHEME/' . $basename,
        ];
        
        $dl_success = false;
        foreach ($live_urls as $l_url) {
            $l_url_enc = str_replace(' ', '%20', $l_url);
            $ch = curl_init($l_url_enc);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, 5);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            $data = curl_exec($ch);
            $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            
            if ($code == 200 && strlen($data) > 500) {
                $dir = dirname($local_path);
                if (!is_dir($dir)) mkdir($dir, 0777, true);
                file_put_contents($local_path, $data);
                echo "[DOWNLOADED] $l_url_enc -> $rel\n";
                $downloaded++;
                $dl_success = true;
                break;
            }
        }
        
        if (!$dl_success) {
            echo "[BROKEN EVERYWHERE] $rel\n";
            $missing++;
        }
    }
}

echo "\nSummary: Valid: $valid, Downloaded: $downloaded, Broken Everywhere: $missing\n";
