<?php
$pages = [
    'Career/index.php',
    'Career.php',
    'Contact.php',
    'ITEP/index.php',
    'ITEP.php',
    'gallery.php'
];

$urls = [
    'http://localhost/satya-sai/Career/index.php',
    'http://localhost/satya-sai/Career.php',
    'http://localhost/satya-sai/Contact.php',
    'http://localhost/satya-sai/ITEP/index.php',
    'http://localhost/satya-sai/ITEP.php',
    'http://localhost/satya-sai/gallery.php'
];

$root = realpath(__DIR__ . '/..');

echo "=========================================================\n";
echo "1. PHP LINT (SYNTAX) AUDIT\n";
echo "=========================================================\n";
foreach ($pages as $p) {
    $filePath = $root . '/' . $p;
    $cmd = "\"d:\\xampp\\php\\php.exe\" -l \"$filePath\"";
    $res = exec($cmd, $output, $returnVar);
    if ($returnVar === 0) {
        echo "[LINT OK] $p\n";
    } else {
        echo "[LINT FAIL] $p: $res\n";
    }
}

echo "\n=========================================================\n";
echo "2. ASSET & LINK AUDIT\n";
echo "=========================================================\n";
$missing_count = 0;
foreach ($pages as $p) {
    $filePath = $root . '/' . $p;
    $content = file_get_contents($filePath);
    preg_match_all('/(?:href|src)=["\']([^"\']+)["\']/', $content, $matches);
    $links = array_unique($matches[1]);
    foreach ($links as $link) {
        if (strpos($link, 'http://') === 0 || strpos($link, 'https://') === 0 || strpos($link, '#') === 0 || strpos($link, 'mailto:') === 0 || strpos($link, 'tel:') === 0) {
            continue;
        }
        $clean = preg_replace('/<\?php echo BASE_URL; \?>/', '', $link);
        $clean = ltrim($clean, '/');
        $target = $root . '/' . urldecode($clean);
        if (!file_exists($target)) {
            echo "[MISSING ASSET] in $p -> $link ($target)\n";
            $missing_count++;
        }
    }
}
echo "Total Missing Assets: $missing_count\n";

echo "\n=========================================================\n";
echo "3. HTTP SERVER GET TEST (HTTP 200 OK)\n";
echo "=========================================================\n";
foreach ($urls as $u) {
    $h = @get_headers($u);
    if ($h && strpos($h[0], '200') !== false) {
        echo "[HTTP 200 OK] $u\n";
    } else {
        echo "[HTTP ERROR: " . ($h ? $h[0] : 'NO RESPONSE') . "] $u\n";
    }
}
