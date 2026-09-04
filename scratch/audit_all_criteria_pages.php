<?php

$files = glob('d:/xampp/htdocs/sssu/satya-sai/Academic/NAAC/Criteria*.php');

foreach ($files as $fpath) {
    $content = file_get_contents($fpath);
    echo basename($fpath) . ":\n";
    echo "  - Total lines: " . substr_count($content, "\n") . "\n";
    echo "  - Has MsoXml junk: " . (strpos($content, 'OfficeDocumentSettings') !== false ? 'YES' : 'NO') . "\n";
    echo "  - Has unparsed &ndash;: " . (strpos($content, '&ndash;') !== false ? 'YES' : 'NO') . "\n";
}

