<?php
$f = __DIR__ . '/../assets/images/sssutms.co.in/cms/Website/Download/RTI.html';
if (file_exists($f)) {
    echo file_get_contents($f);
} else {
    echo "RTI.html not found, checking other files...\n";
    $rii = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(__DIR__ . '/../assets'));
    foreach ($rii as $file) {
        if (stripos($file->getFilename(), 'rti') !== false) {
            echo $file->getPathname() . "\n";
        }
    }
}
