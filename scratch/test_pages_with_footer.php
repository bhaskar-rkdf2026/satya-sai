<?php
$test_pages = [
    'http://localhost/satya-sai/index.php',
    'http://localhost/satya-sai/Career/index.php',
    'http://localhost/satya-sai/Contact.php',
    'http://localhost/satya-sai/ITEP/index.php',
    'http://localhost/satya-sai/gallery.php',
    'http://localhost/satya-sai/Download/EVENTS.php',
    'http://localhost/satya-sai/Download/Forms.php'
];

foreach ($test_pages as $url) {
    $h = @get_headers($url);
    if ($h && strpos($h[0], '200') !== false) {
        echo "[200 OK] $url\n";
    } else {
        echo "[FAIL] $url -> " . ($h ? $h[0] : 'NO RESPONSE') . "\n";
    }
}
