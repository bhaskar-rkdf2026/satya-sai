<?php
$file = __DIR__ . '/../Download/Scheme/Pharmacy.php';
$content = file_get_contents($file);
$base_dir = realpath(__DIR__ . '/..');

preg_match_all('/href=["\'](?:<\?=\s*base_url\([\'"](.*?)[\'"]\)\s*\?>|(#))["\']/', $content, $matches, PREG_SET_ORDER);

$count_total = count($matches);
$count_hash = 0;
$count_valid = 0;
$count_missing = 0;

foreach ($matches as $m) {
    if (isset($m[2]) && $m[2] === '#') {
        $count_hash++;
        continue;
    }
    
    $rel = $m[1];
    $local = $base_dir . '/' . str_replace('/', DIRECTORY_SEPARATOR, $rel);
    if (file_exists($local)) {
        $count_valid++;
    } else {
        $count_missing++;
        echo "Missing file: $rel\n";
    }
}

echo "=== Pharmacy PDF Status ===\n";
echo "Total Links: $count_total\n";
echo "Valid local files: $count_valid\n";
echo "Missing local files: $count_missing\n";
echo "Set to #: $count_hash\n";
