<?php
$root = realpath(__DIR__ . '/..');
$rii = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($root . '/assets'));
foreach ($rii as $file) {
    if ($file->isDir()) continue;
    $filename = $file->getFilename();
    if (stripos($filename, 'phd') !== false || stripos($filename, 'award') !== false) {
        $rel = str_replace($root . DIRECTORY_SEPARATOR, '', $file->getPathname());
        $rel = str_replace('\\', '/', $rel);
        echo $rel . " (" . $file->getSize() . " bytes)\n";
    }
}
