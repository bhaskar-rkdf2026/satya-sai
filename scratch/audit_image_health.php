<?php
$rootDir = 'd:/xampp/htdocs/satya-sai';
$phpFiles = [];

$it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($rootDir));
foreach ($it as $file) {
    if ($file->isFile() && $file->getExtension() === 'php') {
        $path = str_replace('\\', '/', $file->getPathname());
        if (strpos($path, '/scratch/') !== false || strpos($path, '/.git/') !== false) continue;
        $phpFiles[] = $path;
    }
}

$totalImages = 0;
$validImages = 0;
$missingImages = [];

foreach ($phpFiles as $phpFile) {
    $content = file_get_contents($phpFile);
    if (preg_match_all('/(?:src|href)=["\']([^"\']+\.(?:jpg|jpeg|png|gif|webp|svg))["\']/i', $content, $matches)) {
        foreach ($matches[1] as $imgSrc) {
            if (strpos($imgSrc, 'http://') === 0 || strpos($imgSrc, 'https://') === 0) {
                continue; // external
            }
            $totalImages++;
            $cleanPath = preg_replace('/<\?php.*?\?>/', '', $imgSrc);
            $cleanPath = ltrim($cleanPath, '/');
            
            $fullPath = $rootDir . '/' . $cleanPath;
            if (file_exists($fullPath) || file_exists(urldecode($fullPath))) {
                $validImages++;
            } else {
                $missingImages[] = [
                    'file' => str_replace($rootDir, '', $phpFile),
                    'src' => $imgSrc,
                    'resolved' => $fullPath
                ];
            }
        }
    }
}

echo "Audited " . count($phpFiles) . " PHP files.\n";
echo "Total image references: $totalImages\n";
echo "Valid images: $validImages\n";
echo "Missing images count: " . count($missingImages) . "\n\n";

if (count($missingImages) > 0) {
    echo "Missing Image Details:\n";
    foreach (array_slice($missingImages, 0, 20) as $m) {
        echo "File: " . $m['file'] . " => SRC: " . $m['src'] . "\n";
    }
} else {
    echo "All image references are 100% valid and present on disk!\n";
}
