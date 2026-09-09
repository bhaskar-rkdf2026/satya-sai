<?php
$pages = [
    'Download/NotificationOfPhdAward.php',
    'Download/Forms.php',
    'Download/E-Content.php',
    'Download/Alumni.php',
    'Download/RTI.php',
    'Download/Barrier_Free_Environment.php',
    'Download/EVENTS.php',
    'Download/Announcements.php',
    'Download/NBADCS.php'
];

foreach ($pages as $p) {
    echo "================================================================================\n";
    echo "PAGE: $p\n";
    echo "================================================================================\n";
    if (file_exists($p)) {
        echo file_get_contents($p) . "\n\n";
    } else {
        echo "NOT FOUND\n";
    }
}
