<?php
$dir = "assets/images/Files/Link/SYLLABUS/POLYTECHNIC/";
$files = scandir($dir);
echo "=== Files in $dir ===\n";
foreach ($files as $f) {
    if ($f === '.' || $f === '..') continue;
    echo "  $f\n";
}

$poly_schemes = glob("assets/images/Files/Link/SCHEME/DIPLOMA*/*.*");
echo "=== Schemes ===\n";
foreach ($poly_schemes as $s) {
    echo "  $s\n";
}
