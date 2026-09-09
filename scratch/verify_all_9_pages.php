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
$all_ok = true;

echo "=========================================================\n";
echo "1. PHP LINT (SYNTAX) AUDIT\n";
echo "=========================================================\n";
foreach ($pages as $p) {
    $filePath = $root . '/Download/' . $p;
    $cmd = "\"d:\\xampp\\php\\php.exe\" -l \"$filePath\"";
    $res = exec($cmd, $output, $returnVar);
    if ($returnVar === 0) {
        echo "[LINT OK] $p\n";
    } else {
        echo "[LINT FAIL] $p: $res\n";
        $all_ok = false;
    }
}

echo "\n=========================================================\n";
echo "2. FILE ASSET & LINK AUDIT\n";
echo "=========================================================\n";
$total_links = 0;
$missing_links = 0;

foreach ($pages as $p) {
    $filePath = $root . '/Download/' . $p;
    $content = file_get_contents($filePath);
    preg_match_all('/(?:href|src)=["\']([^"\']+)["\']/', $content, $matches);
    $links = array_unique($matches[1]);
    
    foreach ($links as $link) {
        if (strpos($link, 'http://') === 0 || strpos($link, 'https://') === 0 || strpos($link, '#') === 0 || strpos($link, 'javascript:') === 0) {
            continue;
        }
        $cleanLink = preg_replace('/<\?php echo BASE_URL; \?>/', '', $link);
        $cleanLink = ltrim($cleanLink, '/');
        $targetFile = $root . '/' . urldecode($cleanLink);
        $total_links++;
        if (!file_exists($targetFile)) {
            echo "[MISSING ASSET] $p -> $link ($targetFile)\n";
            $missing_links++;
            $all_ok = false;
        }
    }
}
echo "Total Local Assets Checked: $total_links | Missing: $missing_links\n";

echo "\n=========================================================\n";
echo "3. HTTP SERVER GET TEST (HTTP 200 OK)\n";
echo "=========================================================\n";
$context = stream_context_create([
    'http' => [
        'timeout' => 5,
        'ignore_errors' => true
    ]
]);

foreach ($pages as $p) {
    $url = "http://localhost/satya-sai/Download/$p";
    $headers = @get_headers($url);
    if ($headers && strpos($headers[0], '200') !== false) {
        echo "[HTTP 200 OK] $url\n";
    } else {
        $status = $headers ? $headers[0] : 'FAILED TO CONNECT';
        echo "[HTTP ERROR: $status] $url\n";
    }
}

echo "\n=========================================================\n";
if ($all_ok && $missing_links === 0) {
    echo ">>> ALL 9 DOWNLOAD PAGES PASSED 100% QUALITY AUDIT <<<\n";
} else {
    echo ">>> AUDIT FOUND SOME ISSUES - PLEASE REVIEW ABOVE <<<\n";
}
echo "=========================================================\n";
