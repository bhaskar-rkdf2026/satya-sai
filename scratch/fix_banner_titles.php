<?php

$files = glob('d:/xampp/htdocs/sssu/satya-sai/Academic/NAAC/Criteria*.php');

foreach ($files as $fpath) {
    echo "Fixing banner titles in $fpath...\n";
    $content = file_get_contents($fpath);

    // Replace literal &ndash; with clean dash –
    $content = str_replace('&ndash;', '–', $content);

    file_put_contents($fpath, $content);
    echo "  [DONE] Fixed $fpath\n";
}

echo "All Criteria banner titles fixed!\n";

