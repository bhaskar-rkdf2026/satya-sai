<?php
$file = 'C:/Users/Admin/.gemini/antigravity-ide/brain/d204b681-b7ec-4539-8458-d57d758e2f25/.system_generated/steps/19/content.md';
$html = file_get_contents($file);

$start = strpos($html, '<div class="card-body');
$end = strpos($html, '<div class="col-lg-3', $start);
if ($end === false) {
    $end = strpos($html, '<footer', $start);
}
$section = substr($html, $start, $end - $start);

// Match all <a> tags with their href and surrounding context
preg_match_all('/<a\s+[^>]*href=["\']([^"\']*)["\'][^>]*>(.*?)<\/a>/is', $section, $matches, PREG_SET_ORDER);

$dest_dir = __DIR__ . '/../assets/documents/admission_notices/';
if (!is_dir($dest_dir)) {
    mkdir($dest_dir, 0777, true);
}

$items = [];
foreach ($matches as $m) {
    $href = trim($m[1]);
    $raw_text = trim($m[2]);
    $text = trim(strip_tags($raw_text));
    
    // Normalize URL
    if (str_starts_with($href, '/')) {
        $full_url = 'https://www.sssutms.co.in' . $href;
    } elseif (!str_starts_with($href, 'http')) {
        $full_url = 'https://www.sssutms.co.in/cms/Website/Admission/' . $href;
    } else {
        $full_url = $href;
    }
    
    $filename = basename(parse_url($full_url, PHP_URL_PATH));
    $filename = urldecode($filename);
    $filename = preg_replace('/[^a-zA-Z0-9_\.\-\(\)\x{0900}-\x{097F}]/u', '_', $filename);
    
    $local_path = $dest_dir . $filename;
    $rel_path = 'assets/documents/admission_notices/' . $filename;
    
    $items[] = [
        'original_href' => $href,
        'full_url' => $full_url,
        'filename' => $filename,
        'local_path' => $local_path,
        'rel_path' => $rel_path,
        'text' => $text,
        'raw_text' => $raw_text
    ];
}

echo "Total links found: " . count($items) . PHP_EOL;

// Download each file if not already present
foreach ($items as $idx => $item) {
    echo ($idx + 1) . ". Processing: " . $item['filename'] . PHP_EOL;
    if (file_exists($item['local_path']) && filesize($item['local_path']) > 0) {
        echo "   Already exists locally (" . filesize($item['local_path']) . " bytes)" . PHP_EOL;
        continue;
    }
    
    // If it's an external portal link like universitymanagementsystem, skip downloading file
    if (str_contains($item['full_url'], 'universitymanagementsystem.in')) {
        echo "   External link, skipping download" . PHP_EOL;
        continue;
    }
    
    // Attempt download
    $ch = curl_init($item['full_url']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)');
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    $data = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    if ($http_code == 200 && !empty($data)) {
        file_put_contents($item['local_path'], $data);
        echo "   Downloaded successfully (" . strlen($data) . " bytes)" . PHP_EOL;
    } else {
        echo "   Download failed with HTTP code " . $http_code . " from " . $item['full_url'] . PHP_EOL;
    }
}
