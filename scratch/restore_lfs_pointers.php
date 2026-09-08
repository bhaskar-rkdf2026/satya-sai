<?php
// Scratch script to restore LFS pointer files under assets/ to real binary files from git history

function getLfsPointerFiles($dir) {
    $pointers = [];
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
    foreach ($iterator as $file) {
        if ($file->isFile()) {
            $path = $file->getPathname();
            if ($file->getSize() < 500) {
                $content = @file_get_contents($path);
                if ($content && strpos($content, 'version https://git-lfs.github.com/spec/v1') !== false) {
                    $pointers[] = $path;
                }
            }
        }
    }
    return $pointers;
}

$repoRoot = 'd:/xampp/htdocs/satya-sai';
$assetsDir = $repoRoot . '/assets';

echo "Searching for LFS pointer files in assets...\n";
$pointerFiles = getLfsPointerFiles($assetsDir);
echo "Found " . count($pointerFiles) . " LFS pointer files.\n";

$restoredCount = 0;
$failedCount = 0;

foreach ($pointerFiles as $absPath) {
    $relPath = str_replace('\\', '/', str_replace($repoRoot . '/', '', $absPath));
    
    // Find git commits that modified this file and had real content
    $cmd = "git log --all --format=\"%H\" -- \"$relPath\"";
    $commits = array_filter(explode("\n", trim(shell_exec($cmd))));
    
    $restored = false;
    foreach ($commits as $commit) {
        // Check size of file in that commit
        $sizeCmd = "git cat-file -s \"$commit:$relPath\" 2>NUL";
        $size = trim(shell_exec($sizeCmd));
        if (is_numeric($size) && (int)$size > 500) {
            // Restore from this commit!
            $checkoutCmd = "git checkout $commit -- \"$relPath\"";
            shell_exec($checkoutCmd);
            echo "[RESTORED] $relPath (Size: $size bytes from commit $commit)\n";
            $restored = true;
            $restoredCount++;
            break;
        }
    }
    
    if (!$restored) {
        echo "[FAILED] $relPath (No binary commit found)\n";
        $failedCount++;
    }
}

echo "\nSummary: Restored $restoredCount files. Failed $failedCount files.\n";
