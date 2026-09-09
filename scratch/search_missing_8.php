<?php
$keywords = ['BCom_Sy', 'M.COM_IV_SEM', 'MCOM', 'BHMS', 'Homoeo'];
foreach ($keywords as $kw) {
    echo "=== Searching for: $kw ===\n";
    $cmd = 'dir /s /b "d:\\xampp\\htdocs\\satya-sai\\assets\\images\\*' . $kw . '*"';
    exec($cmd, $out);
    foreach ($out as $line) {
        echo "  " . str_replace('d:\\xampp\\htdocs\\satya-sai\\', '', $line) . "\n";
    }
    $out = [];
}
