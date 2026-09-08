<?php
$output = [];
exec('git diff --name-only main origin/UI-Change-Ayush', $output);
$php_files = array_values(array_filter($output, function($f) { 
    return substr($f, -4) === '.php' && strpos($f, 'scratch/') === false; 
}));
echo "Total differing PHP files (excluding scratch): " . count($php_files) . "\n\n";
foreach ($php_files as $f) {
    echo $f . "\n";
}
