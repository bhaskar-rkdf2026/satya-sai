<?php
$pages = [
    'Career/index.php',
    'contact.php',
    'ITEP/index.php',
    'gallery.php'
];

foreach ($pages as $p) {
    $path = __DIR__ . '/../' . $p;
    echo "========================================\n";
    echo "CURRENT FILE: $p\n";
    echo "========================================\n";
    if (file_exists($path)) {
        echo file_get_contents($path) . "\n\n";
    } else {
        echo "NOT FOUND\n\n";
    }
}
