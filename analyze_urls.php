<?php
$lines = file(__DIR__ . '/download_urls_found.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$categories = [];
$pdfCount = 0;
$imgCount = 0;
$otherCount = 0;

foreach ($lines as $url) {
    if (preg_match('/\.pdf$/i', $url)) {
        $pdfCount++;
    } elseif (preg_match('/\.(jpg|jpeg|png|gif)$/i', $url)) {
        $imgCount++;
    } else {
        $otherCount++;
    }
}

echo "Total URLs: " . count($lines) . "\n";
echo "PDF files: $pdfCount\n";
echo "Image files: $imgCount\n";
echo "Other / HTML / Dir URLs: $otherCount\n";
