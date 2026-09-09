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
    echo "\n========================================\n";
    echo "FILE: $p\n";
    echo "========================================\n";
    if (file_exists($path)) {
        $lines = file($path);
        echo "Total lines: " . count($lines) . "\n";
        echo "Head 20 lines:\n";
        echo implode('', array_slice($lines, 0, 20)) . "\n";
        echo "...\n";
    }
}
