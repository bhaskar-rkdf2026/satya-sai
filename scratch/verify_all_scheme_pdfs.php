<?php
$scheme_dir = realpath(__DIR__ . '/../Download/Scheme');
$base_dir = realpath(__DIR__ . '/..');

$files = glob($scheme_dir . '/*.php');
$total_broken = [];
$total_downloaded = [];

foreach ($files as $file) {
    $filename = basename($file);
    $content = file_get_contents($file);
    $modified = false;
    
    // Find all PDF links or base_url links
    preg_match_all('/href=["\'](<\?=\s*base_url\([\'"](.*?)[\'"]\)\s*\?>|[^"\']+\.pdf)["\']/', $content, $matches, PREG_SET_ORDER);
    
    foreach ($matches as $m) {
        $full_match = $m[0];
        $rel_path = isset($m[2]) && !empty($m[2]) ? $m[2] : $m[1];
        
        // Skip if already '#'
        if ($rel_path === '#' || strpos($rel_path, 'base_url') !== false && empty($m[2])) {
            continue;
        }
        
        $decoded_path = urldecode($rel_path);
        // Normalize slashes
        $local_path = $base_dir . '/' . str_replace('\\', '/', $decoded_path);
        
        if (file_exists($local_path)) {
            continue;
        }
        
        // Try looking in assets/images/Files/Link with glob
        $basename = basename($decoded_path);
        $candidates = glob($base_dir . '/assets/images/Files/Link/**/' . $basename);
        if (empty($candidates)) {
            $candidates = glob($base_dir . '/assets/images/Files/Link/' . $basename);
        }
        
        if (!empty($candidates)) {
            $found_rel = str_replace($base_dir . '/', '', str_replace('\\', '/', $candidates[0]));
            echo "[$filename] Path corrected: $rel_path -> $found_rel\n";
            $content = str_replace($rel_path, $found_rel, $content);
            $modified = true;
            continue;
        }
        
        // Try downloading from live
        $live_urls = [
            'https://sssutms.co.in/cms/Areas/Website/Files/Link/' . str_replace('assets/images/Files/Link/', '', $rel_path),
            'https://sssutms.co.in/cms/' . $rel_path,
            'https://sssutms.co.in/' . $rel_path,
            'https://sssutms.co.in/cms/Areas/Website/Files/Link/SCHEME/' . $basename,
            'https://sssutms.co.in/assets/images/Files/Link/SCHEME/' . $basename,
        ];
        
        $downloaded = false;
        foreach ($live_urls as $l_url) {
            $l_url_enc = str_replace(' ', '%20', $l_url);
            $ch = curl_init($l_url_enc);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, 4);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            $data = curl_exec($ch);
            $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $content_type = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
            curl_close($ch);
            
            if ($http_code == 200 && (stripos($content_type, 'pdf') !== false || stripos($content_type, 'octet-stream') !== false || strlen($data) > 500)) {
                $save_path = $base_dir . '/' . str_replace('\\', '/', $decoded_path);
                $dir = dirname($save_path);
                if (!is_dir($dir)) mkdir($dir, 0777, true);
                file_put_contents($save_path, $data);
                echo "[$filename] Downloaded from live: $l_url_enc -> $decoded_path\n";
                $total_downloaded[] = $decoded_path;
                $downloaded = true;
                break;
            }
        }
        
        if (!$downloaded) {
            echo "[$filename] BROKEN ON BOTH! Setting to #: $rel_path\n";
            $total_broken[] = "$filename: $rel_path";
            // Replace this specific href with href="#"
            $content = str_replace($full_match, 'href="#"', $content);
            $modified = true;
        }
    }
    
    if ($modified) {
        file_put_contents($file, $content);
        echo "[$filename] Updated file.\n";
    }
}

echo "\n--- Summary ---\n";
echo "Total Downloaded: " . count($total_downloaded) . "\n";
echo "Total Set to #: " . count($total_broken) . "\n";
foreach ($total_broken as $tb) {
    echo " - $tb\n";
}
