<?php
$baseDir = "d:/xampp/htdocs/sssu/satya-sai/assets/images/Files/Link/";

$files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($baseDir));
$badFiles = [];
$totalChecked = 0;

foreach ($files as $file) {
    if ($file->isDir() || strtolower($file->getExtension()) !== 'pdf') {
        continue;
    }

    $filePath = $file->getRealPath();
    $size = filesize($filePath);
    $totalChecked++;

    $fp = fopen($filePath, 'rb');
    $head = fread($fp, 10);
    fseek($fp, max(0, $size - 1024));
    $tail = fread($fp, 1024);
    fclose($fp);

    $isPdfHead = (strpos($head, "%PDF") !== false);
    $isPdfTail = (strpos($tail, "%%EOF") !== false);

    if (!$isPdfHead || !$isPdfTail) {
        $badFiles[] = [
            'path' => $filePath,
            'size' => $size,
            'has_head' => $isPdfHead,
            'has_tail' => $isPdfTail
        ];
        echo "INCOMPLETE / INVALID: $filePath (Size: $size bytes | Head: " . ($isPdfHead ? "YES" : "NO") . " | Tail: " . ($isPdfTail ? "YES" : "NO") . ")\n";
    } else {
        echo "VALID: " . basename($filePath) . " ($size bytes)\n";
    }
}

echo "\nSummary: $totalChecked PDFs checked. " . count($badFiles) . " corrupted/incomplete files found.\n";
