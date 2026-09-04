<?php

$files = glob('d:/xampp/htdocs/sssu/satya-sai/Academic/NAAC/Criteria*.php');
$files[] = 'd:/xampp/htdocs/sssu/satya-sai/Research/NIRF.php';
$files[] = 'd:/xampp/htdocs/sssu/satya-sai/Academic/NIRF.php';

foreach ($files as $fpath) {
    if (!file_exists($fpath)) continue;
    echo "Fixing first row navy override in $fpath...\n";
    $content = file_get_contents($fpath);

    // Replace tr:first-child td from header styling
    $content = str_replace(
        ".naac-custom-table th,\n.naac-custom-table tr.naac-table-header td,\n.naac-custom-table tr.naac-table-header th,\n.naac-custom-table tr:first-child td {",
        ".naac-custom-table th,\n.naac-custom-table tr.naac-table-header td,\n.naac-custom-table tr.naac-table-header th {",
        $content
    );

    $content = str_replace(
        ".naac-custom-table th *,\n.naac-custom-table tr.naac-table-header td *,\n.naac-custom-table tr.naac-table-header th *,\n.naac-custom-table tr:first-child td * {",
        ".naac-custom-table th *,\n.naac-custom-table tr.naac-table-header td *,\n.naac-custom-table tr.naac-table-header th * {",
        $content
    );

    file_put_contents($fpath, $content);
    echo "  [DONE] $fpath\n";
}

echo "First row navy override removed across all files!\n";

