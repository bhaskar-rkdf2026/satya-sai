<?php
$dirs = ['Career', 'Contact', 'ITEP', 'Gallery'];
$files = ['Career.php', 'contact.php', 'Contact.php', 'gallery.php', 'Gallery.php', 'ITEP.php', 'Career/index.php', 'ITEP/index.php', 'Contact/index.php', 'Gallery/index.php'];

$root = realpath(__DIR__ . '/..');

echo "=== CHECKING PATHS ===\n";
foreach ($dirs as $d) {
    $p = $root . '/' . $d;
    echo "DIR $d: " . (is_dir($p) ? 'EXISTS' : 'NO') . "\n";
    if (is_dir($p)) {
        $sub = scandir($p);
        echo "  Contents: " . implode(', ', array_diff($sub, ['.', '..'])) . "\n";
    }
}

foreach ($files as $f) {
    $p = $root . '/' . $f;
    echo "FILE $f: " . (file_exists($p) ? 'EXISTS (' . filesize($p) . ' bytes)' : 'NO') . "\n";
}
