<?php
$root = realpath(__DIR__ . '/..');
$rii = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($root . '/assets/images/sssutms.co.in'));
foreach ($rii as $file) {
    if (stripos($file->getFilename(), 'itep') !== false || stripos($file->getPathname(), 'ITEP') !== false) {
        echo $file->getPathname() . "\n";
    }
}
