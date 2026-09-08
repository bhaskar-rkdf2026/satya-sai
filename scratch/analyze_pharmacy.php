<?php
$html = file_get_contents(__DIR__ . '/live_pharmacy.html');

// Find all tables and their links
preg_match_all('/<table[^>]*>(.*?)<\/table>/si', $html, $tables);

echo "Found " . count($tables[0]) . " tables on live Pharmacy page.\n\n";

foreach ($tables[0] as $idx => $tbl) {
    echo "=== TABLE " . ($idx + 1) . " ===\n";
    preg_match_all('/<a[^>]*href=["\'](.*?)["\'][^>]*>(.*?)<\/a>/si', $tbl, $links, PREG_SET_ORDER);
    foreach ($links as $l) {
        $text = trim(strip_tags($l[2]));
        $url = $l[1];
        echo "  - Link Text: '$text' | URL: $url\n";
    }
    echo "\n";
}
