<?php
$pages = [
    'NotificationOfPhdAward.php',
    'Forms.php',
    'E-Content.php',
    'Alumni.php',
    'RTI.php',
    'Barrier_Free_Environment.php',
    'EVENTS.php',
    'Announcements.php',
    'NBADCS.php'
];

foreach ($pages as $p) {
    $path = __DIR__ . '/../Download/' . $p;
    echo "========================================\n";
    echo "FILE: $p\n";
    echo "========================================\n";
    if (file_exists($path)) {
        echo file_get_contents($path) . "\n\n";
    } else {
        echo "NOT FOUND: $path\n\n";
    }
}
