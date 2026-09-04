<?php
$filesToDownload = [
    "d:/xampp/htdocs/sssu/satya-sai/assets/images/Files/Link/IQAC/NAAC/Criteria 1/1.3.4 COMBINED PDF.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria%201/1.3.4%20COMBINED%20PDF.pdf",
    "d:/xampp/htdocs/sssu/satya-sai/assets/images/Files/Link/SCHEME2021/feedback reports  Combine.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/SCHEME2021/feedback%20reports%20%20Combine.pdf"
];

foreach ($filesToDownload as $target => $url) {
    if (file_exists($target)) {
        unlink($target);
    }

    echo "\nDownloading " . basename($target) . " ...\n";
    $dir = dirname($target);
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }

    $fp = fopen($target, 'w+b');
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) Chrome/120.0.0.0");
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch, CURLOPT_TIMEOUT, 600);
    curl_setopt($ch, CURLOPT_BUFFERSIZE, 128 * 1024);
    
    $result = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    fclose($fp);

    $size = filesize($target);
    echo "Completed: " . basename($target) . " ($size bytes, HTTP $httpCode)\n";

    // Validate PDF
    $fp = fopen($target, 'rb');
    $head = fread($fp, 10);
    fseek($fp, max(0, $size - 500));
    $tail = fread($fp, 500);
    fclose($fp);

    if (strpos($head, "%PDF") !== false && strpos($tail, "%%EOF") !== false) {
        echo "VALID PDF: " . basename($target) . "\n";
    } else {
        echo "WARNING: Incomplete PDF " . basename($target) . "\n";
    }
}
echo "\nALL FINISHED!\n";
