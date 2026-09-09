<?php
$root = realpath(__DIR__ . '/..');
$rii = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($root . '/assets'));
foreach ($rii as $file) {
    if (stripos($file->getFilename(), 'itep') !== false) {
        echo $file->getPathname() . "\n";
    }
}
