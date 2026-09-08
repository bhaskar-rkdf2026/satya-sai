<?php
$output = [];
exec('git diff --name-only main origin/UI-Change-Ayush', $output);

$assets = array_filter($output, function($f) {
    return strpos($f, 'assets/') === 0;
});

echo "Total asset differences: " . count($assets) . "\n";
$root = dirname(__DIR__);

foreach ($assets as $rel_path) {
    $target_file = $root . '/' . str_replace('/', DIRECTORY_SEPARATOR, $rel_path);
    // If it's a critical image or css that doesn't exist locally or is different
    echo "Asset: $rel_path\n";
}
