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

$root = realpath(__DIR__ . '/..');

foreach ($pages as $p) {
    $path = __DIR__ . '/../Download/' . $p;
    echo "========================================\n";
    echo "FILE: $p\n";
    echo "========================================\n";
    if (!file_exists($path)) {
        echo "File not found\n";
        continue;
    }
    $content = file_get_contents($path);
    // Find all href and src
    preg_match_all('/(?:href|src)=["\']([^"\']+)["\']/', $content, $matches);
    $links = array_unique($matches[1]);
    foreach ($links as $link) {
        if (strpos($link, 'http://') === 0 || strpos($link, 'https://') === 0 || strpos($link, '#') === 0 || strpos($link, 'javascript:') === 0) {
            echo " [EXT/JS] $link\n";
            continue;
        }
        // Handle PHP echo BASE_URL
        $cleanLink = preg_replace('/<\?php echo BASE_URL; \?>/', '', $link);
        $cleanLink = ltrim($cleanLink, '/');
        // also handle urlencoded
        $filePath = $root . '/' . urldecode($cleanLink);
        $exists = file_exists($filePath);
        if ($exists) {
            echo " [OK] $link (size: " . filesize($filePath) . ")\n";
        } else {
            echo " [MISSING] $link -> Expected: $filePath\n";
        }
    }
}
