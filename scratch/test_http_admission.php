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
    $url = "http://localhost/satya-sai/Admission/" . $p;
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    $res = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    echo "$p => HTTP $httpCode, Length: " . strlen($res) . "\n";
}

// Test admin
$adminUrl = "http://localhost/satya-sai/admin/admission.php";
$ch = curl_init($adminUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 5);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
$res = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);
echo "admin/admission.php => HTTP $httpCode (302 expected if unauthenticated redirect to login)\n";
