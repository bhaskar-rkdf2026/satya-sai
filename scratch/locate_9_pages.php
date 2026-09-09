<?php
$sidebar_content = file_exists('includes/sidebar.php') ? file_get_contents('includes/sidebar.php') : '';
echo "=== sidebar.php ===\n";
echo substr($sidebar_content, 0, 2000) . "\n...\n";

$keywords = [
    'Notification Of Phd Award',
    'Forms',
    'E-Content',
    'Alumni',
    'RTI',
    'Barrier Free Environment',
    'EVENTS',
    'Announcements',
    'NBADCS',
    'Notification_Of_Phd_Award',
    'Barrier_Free_Environment'
];

echo "=== Searching for files ===\n";
$all_files = glob("Download/*/*.php");
$all_files = array_merge($all_files, glob("Download/*.php"));
$all_files = array_merge($all_files, glob("*/*.php"));
$all_files = array_merge($all_files, glob("*/*/*.php"));

foreach ($keywords as $kw) {
    echo "Query: $kw\n";
    foreach ($all_files as $f) {
        if (stripos($f, str_replace(' ', '_', $kw)) !== false || stripos($f, str_replace(' ', '', $kw)) !== false || stripos(basename($f, '.php'), $kw) !== false) {
            echo "  Matched File: $f\n";
        }
    }
}
