<?php
$url = "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria%201/AC%20FINAL.pdf";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_NOBODY, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$data = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$contentLength = curl_getinfo($ch, CURLINFO_CONTENT_LENGTH_DOWNLOAD);
curl_close($ch);

echo "HTTP Code: $httpCode\n";
echo "Content-Length: $contentLength bytes (" . round($contentLength / 1024 / 1024, 2) . " MB)\n";
echo "Header:\n$data\n";
