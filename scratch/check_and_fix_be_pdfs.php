<?php
$be_file = __DIR__ . '/../Download/Scheme/BE.php';
$content = file_get_contents($be_file);
$base_dir = realpath(__DIR__ . '/..');

preg_match_all('/href=["\']<\?=\s*base_url\([\'"](.*?)[\'"]\)\s*\?>["\']/', $content, $matches);

$unique_links = array_unique($matches[1]);
echo "Total unique PDF links in BE.php: " . count($unique_links) . "\n\n";

$live_base = 'https://sssutms.co.in/';
$missing = [];
$found_local = [];
$downloaded = [];
$broken_everywhere = [];

foreach ($unique_links as $rel_path) {
    $decoded_path = urldecode($rel_path);
    $local_path = $base_dir . '/' . str_replace('/', DIRECTORY_SEPARATOR, $decoded_path);
    
    if (file_exists($local_path)) {
        $found_local[] = $rel_path;
    } else {
        // Try looking in assets/images/Files/Link directly with basename
        $basename = basename($rel_path);
        $candidates = glob($base_dir . '/assets/images/Files/Link/**/' . $basename);
        if (empty($candidates)) {
            $candidates = glob($base_dir . '/assets/images/Files/Link/' . $basename);
        }
        
        if (!empty($candidates)) {
            $matched_local = $candidates[0];
            $rel_from_base = str_replace($base_dir . DIRECTORY_SEPARATOR, '', $matched_local);
            $rel_from_base = str_replace('\\', '/', $rel_from_base);
            echo "[LOCATED ELSEWHERE] {$rel_path} -> {$rel_from_base}\n";
            $content = str_replace($rel_path, $rel_from_base, $content);
            $found_local[] = $rel_from_base;
            continue;
        }

        echo "[MISSING LOCALLY] {$rel_path}\n";
        
        // Check live website
        $live_url = $live_base . str_replace('assets/images/Files/Link/', 'assets/images/Files/Link/', $rel_path);
        // Also try standard live path:
        // usually on live it's: https://sssutms.co.in/cms/assets/images/Files/Link/... or https://sssutms.co.in/assets/images/Files/Link/...
        $urls_to_try = [
            'https://sssutms.co.in/' . $rel_path,
            'https://sssutms.co.in/cms/' . $rel_path,
            'https://sssutms.co.in/assets/images/Files/Link/' . $basename,
            'https://sssutms.co.in/cms/assets/images/Files/Link/' . $basename,
            'https://sssutms.co.in/assets/images/Files/Link/SCHEME/' . $basename,
            'https://sssutms.co.in/cms/assets/images/Files/Link/SCHEME/' . $basename,
        ];
        
        $download_success = false;
        foreach ($urls_to_try as $url) {
            $url_encoded = str_replace(' ', '%20', $url);
            $ch = curl_init($url_encoded);
            curl_setopt($ch, CURLOPT_NOBODY, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, 5);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_exec($ch);
            $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $content_type = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
            curl_close($ch);
            
            if ($http_code == 200 && (stripos($content_type, 'pdf') !== false || stripos($content_type, 'application') !== false || stripos($content_type, 'octet-stream') !== false)) {
                echo "  -> Found on live: {$url_encoded} (downloading...)\n";
                $dir = dirname($local_path);
                if (!is_dir($dir)) {
                    mkdir($dir, 0777, true);
                }
                file_put_contents($local_path, file_get_contents($url_encoded));
                $downloaded[] = $rel_path;
                $download_success = true;
                break;
            }
        }
        
        if (!$download_success) {
            echo "  -> NOT FOUND ON LIVE EITHER! Marking as broken (#)\n";
            $broken_everywhere[] = $rel_path;
        }
    }
}

echo "\n================ SUMMARY ================\n";
echo "Found locally: " . count($found_local) . "\n";
echo "Downloaded from live: " . count($downloaded) . "\n";
echo "Broken everywhere (set to #): " . count($broken_everywhere) . "\n";
foreach ($broken_everywhere as $b) {
    echo "  - {$b}\n";
}
