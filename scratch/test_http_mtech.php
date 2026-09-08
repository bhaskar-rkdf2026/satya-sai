<?php
$html = file_get_contents('http://localhost/satya-sai/Download/Scheme/MTech.php');
preg_match_all('/href=["\']([^"\']+\.pdf|#)["\']/', $html, $matches);

$base_dir = realpath(__DIR__ . '/..');
$valid = 0;
$missing = 0;
$hash = 0;

foreach ($matches[1] as $url) {
    if ($url === '#') {
        $hash++;
        continue;
    }
    
    $path = parse_url($url, PHP_URL_PATH);
    $rel = str_replace('/satya-sai/', '', $path);
    $rel = urldecode($rel);
    $local = $base_dir . '/' . str_replace('/', DIRECTORY_SEPARATOR, $rel);
    if (file_exists($local)) {
        $valid++;
    } else {
        $missing++;
        echo "Missing: $url -> $local\n";
    }
}

echo "=== MTech Scheme Live Check ===\n";
echo "Valid local PDFs: $valid\n";
echo "Missing local PDFs: $missing\n";
echo "Disabled (#) buttons: $hash\n";
