<?php
ob_start();
include __DIR__ . '/../gallery.php';
$html = ob_get_clean();

preg_match_all('/<img[^>]+src=["\']([^"\']+)["\']/', $html, $m);
echo "Total rendered images in gallery: " . count($m[1]) . "\n";
$missing = 0;
foreach ($m[1] as $src) {
    if (strpos($src, 'http://localhost/satya-sai/') === 0) {
        $rel = substr($src, strlen('http://localhost/satya-sai/'));
        if (!file_exists(__DIR__ . '/../' . $rel)) {
            echo "Missing: " . $rel . "\n";
            $missing++;
        }
    }
}
echo "Missing images: $missing\n";
