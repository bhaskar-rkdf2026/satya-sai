<?php
$repoRoot = 'd:/xampp/htdocs/satya-sai';
$dirs = [$repoRoot . '/About', $repoRoot . '/Academic'];

$fixedCount = 0;
$stillBroken = [];

foreach ($dirs as $dir) {
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
    foreach ($iterator as $file) {
        if ($file->isFile() && strtolower($file->getExtension()) === 'php') {
            $filePath = $file->getPathname();
            $content = file_get_contents($filePath);
            
            $newContent = preg_replace_callback('/href=["\']([^"\']+\.(?:pdf|PDF)[^"\']*)["\']/i', function($m) use ($repoRoot, &$fixedCount, &$stillBroken, $filePath) {
                $rawHref = $m[1];
                $cleanHref = preg_replace('/<\?php.*?\?>/i', '', $rawHref);
                $cleanHref = ltrim($cleanHref, '/');
                $localPath = $repoRoot . '/' . $cleanHref;
                
                if (!file_exists($localPath)) {
                    // Try urldecode
                    $decodedHref = urldecode($cleanHref);
                    $decodedPath = $repoRoot . '/' . $decodedHref;
                    if (file_exists($decodedPath)) {
                        $fixedCount++;
                        // Replace %20 and %26 with real spaces/chars or keep raw in href
                        $newRawHref = str_replace('%20', ' ', $rawHref);
                        return 'href="' . $newRawHref . '"';
                    }
                    
                    // Try fixing double spaces or %20%20
                    $spaceFixedHref = str_replace(['%20', '  '], [' ', ' '], $cleanHref);
                    if (file_exists($repoRoot . '/' . $spaceFixedHref)) {
                        $fixedCount++;
                        return 'href="' . str_replace(['%20', '  '], [' ', ' '], $rawHref) . '"';
                    }
                    
                    $stillBroken[] = [
                        'file' => str_replace($repoRoot . '/', '', $filePath),
                        'href' => $rawHref
                    ];
                }
                return $m[0];
            }, $content);
            
            if ($newContent !== $content) {
                file_put_contents($filePath, $newContent);
            }
        }
    }
}

echo "Fixed $fixedCount encoded PDF links in PHP files!\n";
echo "Still broken links count: " . count($stillBroken) . "\n";
foreach ($stillBroken as $b) {
    echo "BROKEN: {$b['file']} -> {$b['href']}\n";
}
