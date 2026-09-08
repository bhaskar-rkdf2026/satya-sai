<?php
$content = file_get_contents('Research/Patents.php');

// Extract top part (PHP headers, styles, banner, stat chips)
$header_part = substr($content, 0, strpos($content, '<p align="center"'));
if (!$header_part) {
    $header_part = substr($content, 0, strpos($content, '<div class="pat-content-body">') + strlen('<div class="pat-content-body">'));
}

// Let's use DOMDocument or regex to parse each year and its table rows
// Let's inspect the entire Patents.php to see the full content
file_put_contents('scratch/patents_raw.txt', $content);
echo "Patents raw length: " . strlen($content) . "\n";
