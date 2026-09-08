<?php
$repoRoot = 'd:/xampp/htdocs/satya-sai';

// Index all PDF files on disk by lowercased basename and stripped basename
$pdfDiskMap = [];
$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($repoRoot . '/assets'));
foreach ($iterator as $file) {
    if ($file->isFile() && strtolower($file->getExtension()) === 'pdf') {
        $relPath = str_replace('\\', '/', str_replace($repoRoot . '/', '', $file->getPathname()));
        $basename = strtolower($file->getBasename());
        $pdfDiskMap[$basename] = $relPath;
        
        // Strip numbers, spaces, specials for fuzzy matching
        $cleanKey = preg_replace('/[^a-z0-9]/', '', $basename);
        if ($cleanKey) {
            $pdfDiskMap[$cleanKey] = $relPath;
        }
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
            
            // Fix web.sssutms.co.in old links
            $newContent = str_replace(
                'http://web.sssutms.co.in//Document/Activities/Environmental_Youth_Forum_2021_Report.pdf',
                '<?php echo BASE_URL; ?>About/Environmental_Youth_Forum_2021.php',
                $content
            );
            
            $newContent = preg_replace_callback('/href=["\']([^"\']+\.(?:pdf|PDF)[^"\']*)["\']/i', function($m) use ($repoRoot, $pdfDiskMap, &$correctedCount, $filePath) {
                $rawHref = $m[1];
                
                // Skip external URLs
                if (strpos($rawHref, 'http://') === 0 || strpos($rawHref, 'https://') === 0) {
                    return $m[0];
                }
                
                $cleanHref = preg_replace('/<\?php.*?\?>/i', '', $rawHref);
                $cleanHref = ltrim($cleanHref, '/');
                $cleanHref = urldecode($cleanHref);
                $localPath = $repoRoot . '/' . $cleanHref;
                
                if (!file_exists($localPath)) {
                    $basename = strtolower(basename($cleanHref));
                    $cleanKey = preg_replace('/[^a-z0-9]/', '', $basename);
                    
                    if (isset($pdfDiskMap[$basename])) {
                        $correctRel = $pdfDiskMap[$basename];
                        $correctedCount++;
                        return 'href="<?php echo BASE_URL; ?>' . $correctRel . '"';
                    } else if (isset($pdfDiskMap[$cleanKey])) {
                        $correctRel = $pdfDiskMap[$cleanKey];
                        $correctedCount++;
                        return 'href="<?php echo BASE_URL; ?>' . $correctRel . '"';
                    }
                }
                return $m[0];
            }, $newContent);
            
            if ($newContent !== $content) {
                file_put_contents($filePath, $newContent);
            }
        }
    }
}

echo "Auto-corrected $correctedCount PDF links using intelligent filename matching!\n";
