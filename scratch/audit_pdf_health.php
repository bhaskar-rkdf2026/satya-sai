<?php
$repoRoot = 'd:/xampp/htdocs/satya-sai';
$dirs = [$repoRoot . '/About', $repoRoot . '/Academic'];
$pdfLinks = [];

foreach ($dirs as $dir) {
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
    foreach ($iterator as $file) {
        if ($file->isFile() && strtolower($file->getExtension()) === 'php') {
            $content = file_get_contents($file->getPathname());
            preg_match_all('/href=["\']([^"\']+\.(?:pdf|PDF)[^"\']*)["\']/i', $content, $matches);
            if (!empty($matches[1])) {
                foreach ($matches[1] as $href) {
                    $pdfLinks[] = [
                        'page' => str_replace('\\', '/', str_replace($repoRoot . '/', '', $file->getPathname())),
                        'href' => $href
                    ];
                }
            }
        }
    }
}

echo "Found " . count($pdfLinks) . " PDF links in PHP files.\n";
$brokenCount = 0;
$validCount = 0;

foreach ($pdfLinks as $item) {
    $page = $item['page'];
    $rawHref = $item['href'];
    $cleanHref = preg_replace('/<\?php.*?\?>/i', '', $rawHref);
    $cleanHref = ltrim($cleanHref, '/');
    $localPath = $repoRoot . '/' . $cleanHref;
    
    if (!file_exists($localPath)) {
        echo "[NOT_FOUND] Page: $page -> Link: $cleanHref\n";
        $brokenCount++;
    } else {
        $size = filesize($localPath);
        $header = @file_get_contents($localPath, false, null, 0, 10);
        if ($size < 500 && strpos($header, 'git-lfs') !== false) {
            echo "[LFS_POINTER] Page: $page -> Link: $cleanHref ($size bytes)\n";
            $brokenCount++;
        } else if (substr($header, 0, 4) !== '%PDF') {
            echo "[INVALID_HEADER] Page: $page -> Link: $cleanHref (Header: $header)\n";
            $brokenCount++;
        } else {
            $validCount++;
        }
    }
}

echo "Summary: Valid PDFs = $validCount | Broken/Issue PDFs = $brokenCount\n";
