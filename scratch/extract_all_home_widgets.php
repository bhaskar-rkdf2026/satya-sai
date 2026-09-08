<?php
$html = file_get_contents('scratch/live_home_raw.html');

$dom = new DOMDocument();
libxml_use_internal_errors(true);
$dom->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));
libxml_clear_errors();

$xpath = new DOMXPath($dom);

// Extract Important Links
$imp_links = [];
foreach ($xpath->query('//div[contains(@class, "panel-importantlink")]//a') as $a) {
    $imp_links[] = [
        'title' => trim($a->textContent),
        'href'  => trim($a->getAttribute('href'))
    ];
}

// Extract Quick Links
$quick_links = [];
foreach ($xpath->query('//div[contains(@class, "panel-quicklink")]//a') as $a) {
    $quick_links[] = [
        'title' => trim($a->textContent),
        'href'  => trim($a->getAttribute('href'))
    ];
}

// Extract Download Links
$download_links = [];
foreach ($xpath->query('//div[contains(@class, "panel-download")]//a') as $a) {
    $download_links[] = [
        'title' => trim($a->textContent),
        'href'  => trim($a->getAttribute('href'))
    ];
}

echo "Important Links (" . count($imp_links) . "):\n";
print_r($imp_links);

echo "\nQuick Links (" . count($quick_links) . "):\n";
print_r($quick_links);

echo "\nDownload Links (" . count($download_links) . "):\n";
print_r($download_links);
