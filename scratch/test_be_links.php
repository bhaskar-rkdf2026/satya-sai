<?php
$be_file = __DIR__ . '/../Download/Scheme/BE.php';
$content = file_get_contents($be_file);
$base_dir = realpath(__DIR__ . '/..');

preg_match_all('/href=["\'](?:<\?=\s*base_url\([\'"](.*?)[\'"]\)\s*\?>|(#))["\']/', $content, $matches, PREG_SET_ORDER);

$count_total = count($matches);
$count_hash = 0;
$count_valid_file = 0;
$count_missing_file = 0;

foreach ($matches as $m) {
    if (isset($m[2]) && $m[2] === '#') {
        $count_hash++;
        continue;
    }
    
    $rel = $m[1];
    $local = $base_dir . '/' . str_replace('/', DIRECTORY_SEPARATOR, $rel);
    if (file_exists($local)) {
        $count_valid_file++;
    } else {
        $count_missing_file++;
        echo "Missing: $rel\n";
    }
}

echo "PDF links report:\n";
echo "Total PDF buttons: $count_total\n";
echo "Valid local files: $count_valid_file\n";
echo "Missing local files: $count_missing_file\n";
echo "Set to #: $count_hash\n";
