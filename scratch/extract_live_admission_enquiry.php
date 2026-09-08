<?php
$html = file_get_contents('C:/Users/Admin/.gemini/antigravity-ide/brain/1d65a721-44b1-4961-9451-41c3ad8495e7/.system_generated/steps/847/content.md');

$dom = new DOMDocument();
libxml_use_internal_errors(true);
$dom->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));
libxml_clear_errors();

$xpath = new DOMXPath($dom);

// Let's find sections inside main-content
$main = $xpath->query('//div[contains(@class, "main-content")]');
if ($main->length > 0) {
    echo "Main content text:\n";
    echo substr($main->item(0)->textContent, 0, 3000) . "\n";
} else {
    // Search for all text inside body
    echo "Body content:\n";
    $body = $dom->getElementsByTagName('body')->item(0);
    echo substr($body->textContent, 0, 3000);
}
