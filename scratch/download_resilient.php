<?php
$target = "d:/xampp/htdocs/sssu/satya-sai/assets/images/Files/Link/IQAC/NAAC/Criteria 1/AC FINAL.pdf";
$url = "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria%201/AC%20FINAL.pdf";

if (file_exists($target)) {
    unlink($target);
}

echo "Downloading AC FINAL.pdf from $url ...\n";
$fp = fopen($target, 'w+b');
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36");
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
curl_setopt($ch, CURLOPT_TIMEOUT, 600); // 10 minutes
curl_setopt($ch, CURLOPT_BUFFERSIZE, 128 * 1024);
curl_setopt($ch, CURLOPT_NOPROGRESS, false);
curl_setopt($ch, CURLOPT_PROGRESSFUNCTION, function($resource, $downloadSize, $downloaded, $uploadSize, $uploaded) {
    if ($downloadSize > 0) {
        $percent = round(($downloaded / $downloadSize) * 100, 1);
        echo "Progress: $downloaded / $downloadSize bytes ($percent%)\r";
    }
});

$result = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$curlErr = curl_error($ch);
curl_close($ch);
fclose($fp);

echo "\nDownload finished. Result: " . ($result ? "OK" : "ERROR ($curlErr)") . " | HTTP: $httpCode | Size: " . filesize($target) . " bytes\n";

// Check PDF integrity
$fp = fopen($target, 'rb');
$head = fread($fp, 10);
fseek($fp, max(0, filesize($target) - 500));
$tail = fread($fp, 500);
fclose($fp);

echo "Header: " . trim($head) . "\n";
if (strpos($tail, "%%EOF") !== false) {
    echo "SUCCESS: Valid PDF EOF marker found!\n";
} else {
    echo "WARNING: %%EOF marker not found in last 500 bytes!\nTail content: " . bin2hex(substr($tail, -50)) . "\n";
}
