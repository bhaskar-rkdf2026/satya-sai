<?php
$needles = [
    'SYBLIB', 'BLIBC',
    'SYHMCS', 'HMCSC',
    'SY_AG', 'SYAG', 'AG4SEM', 'AGSYV', 'AG_VISYL', 'AG_VIII',
    'SYLLBC', 'LLBC', 'SYLLB', 'SYBALLBC', 'BALLBC',
    'bpt_', 'bmlt', 'dmlt'
];

foreach ($needles as $n) {
    echo "=== Searching: $n ===\n";
    $cmd = 'dir /s /b "d:\\xampp\\htdocs\\satya-sai\\assets\\images\\*' . $n . '*"';
    exec($cmd, $out);
    foreach ($out as $l) {
        echo "  " . str_replace('d:\\xampp\\htdocs\\satya-sai\\', '', $l) . "\n";
    }
    $out = [];
}
