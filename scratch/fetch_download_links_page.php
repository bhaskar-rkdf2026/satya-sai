<?php
$ch = curl_init('https://sssutms.co.in/cms/Website/DownloadLinks');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
$html = curl_exec($ch);
curl_close($ch);

$dom = new DOMDocument();
libxml_use_internal_errors(true);
$dom->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));
libxml_clear_errors();

$xpath = new DOMXPath($dom);
$rows = $xpath->query('//table//tr | //ul//li | //div[contains(@class, "item")]');
echo "DownloadLinks page rows:\n";
foreach ($xpath->query('//a') as $a) {
    $href = $a->getAttribute('href');
    $text = trim($a->textContent);
    if (strpos($href, 'DownloadLinks/File') !== false) {
        echo "Link text: $text | Href: $href\n";
    }
}
