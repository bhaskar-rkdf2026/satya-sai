<?php
$files = [
    2465, 2464, 2463, 2462, 2461, 2460, 2459
];

foreach ($files as $id) {
    $url = "https://sssutms.co.in/cms/Website/DownloadLinks/File/$id";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
    $response = curl_exec($ch);
    $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $headers = substr($response, 0, $header_size);
    $body = substr($response, $header_size);
    $effective_url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    echo "ID: $id | HTTP $http_code | Effective URL: $effective_url | Size: " . strlen($body) . " bytes\n";
    // Check filename in header Content-Disposition
    if (preg_match('/filename=["\']?([^"\';\r\n]+)/i', $headers, $m)) {
        echo "  Filename: " . trim($m[1]) . "\n";
    }
}
