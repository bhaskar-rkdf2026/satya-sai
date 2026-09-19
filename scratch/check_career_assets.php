<?php
$root = 'd:/xampp/htdocs/satya-sai';

$careerAssets = [
    'assets/images/Files/Link/SCHOOL_OF_PHARMACY_23052026_0320.jpeg',
    'assets/images/Files/Link/last_updated_27052026_1224.png',
    'assets/images/Files/Link/job_08012025_0348.jpg',
    'assets/images/Files/Link/Appointment_Add_BHMS_PG_04102023_0923.pdf',
    'assets/images/Files/Link/WhatsApp_Image_2026-04-09_at_12.57.59_PM_09042026_0117.jpg',
    'assets/images/Files/Link/ad_06072023_1203.jpg',
    'assets/images/Files/Link/career.pdf',
    'assets/images/Files/Link/Appointment_of_Vice-Chancellor_16082023_0445.jpg'
];

echo "========================================================\n";
echo "CHECKING CAREER ASSETS ON DISK\n";
echo "========================================================\n";

foreach ($careerAssets as $asset) {
    $fullPath = $root . '/' . $asset;
    if (file_exists($fullPath)) {
        $size = filesize($fullPath);
        $formatted = ($size >= 1048576) ? round($size / 1048576, 2) . ' MB' : round($size / 1024, 2) . ' KB';
        echo "  [FOUND] $asset ($formatted)\n";
    } else {
        echo "  [MISSING] $asset\n";
    }
}
