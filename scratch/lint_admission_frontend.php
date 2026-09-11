<?php
$pages = [
    'Admission_Enquiry.php',
    'AdmissionNotice.php',
    'AdmissionProcedure.php',
    'FeesStructure.php',
    'UniversityAccountDetail.php',
    'Brochures.php',
    'AdmissionRegistration.php'
];

foreach ($pages as $p) {
    $full = __DIR__ . '/../Admission/' . $p;
    $cmd = "d:\\xampp\\php\\php.exe -l \"$full\"";
    $output = shell_exec($cmd);
    echo "$p: " . trim($output) . "\n";
}
