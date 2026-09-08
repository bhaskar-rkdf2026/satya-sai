<?php
$html = file_get_contents('scratch/live_home_raw.html');

// Let's extract the widgets around 170000 to 185000
$snippet = substr($html, 169000, 15000);
file_put_contents('scratch/live_widgets_snippet.html', $snippet);

// Let's parse with DOMDocument
$dom = new DOMDocument();
libxml_use_internal_errors(true);
$dom->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));
libxml_clear_errors();

$xpath = new DOMXPath($dom);

echo "=== Quick Links & Download Links live content analysis ===\n";

// Find all panels or sections with Quick Links, Download Links, Important Links
$nodes = $xpath->query('//div[contains(@class, "panel") or contains(@class, "widget") or contains(@class, "box") or contains(@class, "col")]');

foreach ($xpath->query('//h3 | //h4 | //h5 | //h2') as $heading) {
    $text = trim($heading->textContent);
    if (stripos($text, 'Quick Link') !== false || stripos($text, 'Download Link') !== false || stripos($text, 'Important Link') !== false) {
        echo "\nHEADING: " . $text . "\n";
        $parent = $heading->parentNode;
        while ($parent && $parent->nodeName !== 'div') {
            $parent = $parent->parentNode;
        }
        if ($parent) {
            $links = $xpath->query('.//a', $parent);
            echo "Found " . $links->length . " links:\n";
            foreach ($links as $link) {
                $href = $link->getAttribute('href');
                $title = trim($link->textContent);
                echo "  - Title: $title | Href: $href\n";
            }
        }
    }
}
