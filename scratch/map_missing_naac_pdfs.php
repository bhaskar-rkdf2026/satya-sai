<?php
$repoRoot = 'd:/xampp/htdocs/satya-sai';

// Index all PDF files on disk by basename (lowercased, normalized)
$pdfDiskMap = [];
$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($repoRoot . '/assets'));
foreach ($iterator as $file) {
    if ($file->isFile() && strtolower($file->getExtension()) === 'pdf') {
        $relPath = str_replace('\\', '/', str_replace($repoRoot . '/', '', $file->getPathname()));
        $basename = strtolower($file->getBasename());
        $pdfDiskMap[$basename] = $relPath;
        // Also map without spaces
        $noSpaceBasename = str_replace(' ', '', $basename);
        $pdfDiskMap[$noSpaceBasename] = $relPath;
    }
}

echo "Indexed " . count($pdfDiskMap) . " PDF variations on disk.\n";

$dirs = [$repoRoot . '/About', $repoRoot . '/Academic'];
$correctedCount = 0;

foreach ($dirs as $dir) {
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
    foreach ($iterator as $file) {
        if ($file->isFile() && strtolower($file->getExtension()) === 'php') {
            $filePath = $file->getPathname();
            $content = file_get_contents($filePath);
            
            $newContent = preg_replace_callback('/href=["\']([^"\']+\.(?:pdf|PDF)[^"\']*)["\']/i', function($m) use ($repoRoot, $pdfDiskMap, &$correctedCount, $filePath) {
                $rawHref = $m[1];
                
                // Skip full external URLs
                if (strpos($rawHref, 'http://') === 0 || strpos($rawHref, 'https://') === 0) {
                    return $m[0];
                }
                
                $cleanHref = preg_replace('/<\?php.*?\?>/i', '', $rawHref);
                $cleanHref = ltrim($cleanHref, '/');
                $cleanHref = urldecode($cleanHref);
                $localPath = $repoRoot . '/' . $cleanHref;
                
                if (!file_exists($localPath)) {
                    $basename = strtolower(basename($cleanHref));
                    $noSpaceBasename = str_replace(' ', '', $basename);
                    
                    if (isset($pdfDiskMap[$basename])) {
                        $correctRel = $pdfDiskMap[$basename];
                        $correctedCount++;
                        return 'href="<?php echo BASE_URL; ?>' . $correctRel . '"';
                    } else if (isset($pdfDiskMap[$noSpaceBasename])) {
                        $correctRel = $pdfDiskMap[$noSpaceBasename];
                        $correctedCount++;
                        return 'href="<?php echo BASE_URL; ?>' . $correctRel . '"';
                    }
                }
                return $m[0];
            }, $content);
            
            if ($newContent !== $content) {
                file_put_contents($filePath, $newContent);
            }
        }
    }
}

echo "Auto-corrected $correctedCount PDF links using fuzzy filename match!\n";
