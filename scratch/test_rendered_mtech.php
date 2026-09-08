<?php
ob_start();
require_once __DIR__ . '/../Download/Scheme/MTech.php';
$html = ob_get_clean();

$base_dir = realpath(__DIR__ . '/..');
preg_match_all('/href=["\'](http:\/\/localhost\/satya-sai\/assets\/images\/Files\/Link\/[^"\']+|#)["\']/', $html, $matches);

$count_valid = 0;
$count_missing = 0;
$count_hash = 0;

foreach ($matches[1] as $href) {
    if ($href === '#') {
        $count_hash++;
        continue;
    }
    $rel = str_replace('http://localhost/satya-sai/', '', $href);
    $local = $base_dir . '/' . str_replace('/', DIRECTORY_SEPARATOR, $rel);
    if (file_exists($local)) {
        $count_valid++;
    } else {
        $count_missing++;
        echo "Missing: $href -> $local\n";
    }
}

echo "=== Rendered MTech Links ===\n";
echo "Total Valid PDF Links: $count_valid\n";
echo "Missing PDF Links: $count_missing\n";
echo "Set to #: $count_hash\n";
