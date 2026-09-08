<?php
$content = file_get_contents('Research/Patents.php');
preg_match_all('/<table[^>]*>.*?<\/table>/is', $content, $matches);
echo "Total tables found: " . count($matches[0]) . "\n";
foreach ($matches[0] as $idx => $t) {
    echo "Table $idx length: " . strlen($t) . "\n";
    // Show first 300 chars of table
    echo substr($t, 0, 300) . "\n-------------------\n";
}
