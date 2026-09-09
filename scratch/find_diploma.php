<?php
$needles = ['SY_DCE', 'SY_DME', 'SY_DIPLOMA', 'SY_DCSE', 'SY_DCHE', 'DIPLOMA'];
foreach ($needles as $n) {
    echo "=== Searching: $n ===\n";
    $cmd = 'dir /s /b "d:\\xampp\\htdocs\\satya-sai\\assets\\images\\*' . $n . '*"';
    exec($cmd, $out);
    foreach ($out as $l) {
        echo "  " . str_replace('d:\\xampp\\htdocs\\satya-sai\\', '', $l) . "\n";
    }
    $out = [];
}
