<?php
$files = [
    'd:/xampp/htdocs/satya-sai/assets/images/sssutms.co.in/cms/Website/ITEP/index.html',
    'd:/xampp/htdocs/satya-sai/assets/images/sssutms.co.in/cms/Website/About/Faculty_of_Education.html',
    'd:/xampp/htdocs/satya-sai/About/Faculty_of_Education.php'
];

foreach ($files as $f) {
    echo "========================================\n";
    echo "FILE: $f\n";
    echo "========================================\n";
    if (file_exists($f)) {
        echo file_get_contents($f) . "\n\n";
    } else {
        echo "NOT FOUND\n\n";
    }
}
