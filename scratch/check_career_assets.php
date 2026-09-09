<?php
$root = realpath(__DIR__ . '/..');
$files = [
    'assets/images/Files/Link/last_updated_27052026_1224.png',
    'assets/images/Files/Link/SCHOOL_OF_PHARMACY_23052026_0320.jpeg',
    'assets/images/Files/Link/WhatsApp_Image_2026-04-09_at_12.57.59_PM_09042026_0117.jpg',
    'assets/images/Files/Link/WhatsApp_Image_2025-01-08_at_15.49.36_b62c16f5_08012025_0350.jpg',
    'assets/images/Files/Link/job_08012025_0348.jpg',
    'assets/images/Files/Link/Appointment_of_Vice-Chancellor_16082023_0445.jpg',
    'assets/images/Files/Link/ad_06072023_1203.jpg',
    'assets/images/Files/Link/Appointment_Add_BHMS_PG_04102023_0923.pdf',
    'assets/images/Files/Notices/career.pdf'
];

foreach ($files as $f) {
    $exists = file_exists($root . '/' . $f);
    echo ($exists ? "[EXISTS] " : "[MISSING] ") . $f . "\n";
    if (!$exists) {
        // search by basename
        $base = basename($f);
        $rii = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($root . '/assets'));
        foreach ($rii as $file) {
            if ($file->getFilename() === $base) {
                echo "   -> Found at: " . str_replace($root . DIRECTORY_SEPARATOR, '', $file->getPathname()) . "\n";
            }
        }
    }
}
