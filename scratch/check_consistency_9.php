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
    $content = file_get_contents($path);
    echo "=== Page: $p ===\n";
    echo "Has syl-card: " . (strpos($content, 'syl-card') !== false ? 'YES' : 'NO') . "\n";
    echo "Has syl-btn: " . (strpos($content, 'syl-btn') !== false ? 'YES' : 'NO') . "\n";
    echo "Has tableSearchInput: " . (strpos($content, 'tableSearchInput') !== false ? 'YES' : 'NO') . "\n";
    echo "Has sidebar: " . (strpos($content, 'sidebar.php') !== false ? 'YES' : 'NO') . "\n";
    echo "Has #0b2545: " . (strpos($content, '#0b2545') !== false ? 'YES' : 'NO') . "\n";
    echo "Has #d97706: " . (strpos($content, '#d97706') !== false ? 'YES' : 'NO') . "\n\n";
}
