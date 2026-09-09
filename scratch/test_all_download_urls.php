<?php
$urls = [
    'http://localhost/satya-sai/Download/EVENTS.php',
    'http://localhost/satya-sai/EVENTS.php',
    'http://localhost/satya-sai/Download/Announcements.php',
    'http://localhost/satya-sai/Announcements.php',
    'http://localhost/satya-sai/Download/NotificationOfPhdAward.php',
    'http://localhost/satya-sai/NotificationOfPhdAward.php',
    'http://localhost/satya-sai/Download/Forms.php',
    'http://localhost/satya-sai/Forms.php',
    'http://localhost/satya-sai/Download/E-Content.php',
    'http://localhost/satya-sai/E-Content.php',
    'http://localhost/satya-sai/Download/Alumni.php',
    'http://localhost/satya-sai/Alumni.php',
    'http://localhost/satya-sai/Download/RTI.php',
    'http://localhost/satya-sai/RTI.php',
    'http://localhost/satya-sai/Download/Barrier_Free_Environment.php',
    'http://localhost/satya-sai/Barrier_Free_Environment.php',
    'http://localhost/satya-sai/Download/NBADCS.php',
    'http://localhost/satya-sai/NBADCS.php'
];

foreach ($urls as $u) {
    $h = @get_headers($u);
    if ($h && strpos($h[0], '200') !== false) {
        echo "[200 OK] $u\n";
    } else {
        echo "[FAIL: " . ($h ? $h[0] : 'NO RESPONSE') . "] $u\n";
    }
}
