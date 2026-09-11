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

$allPassed = true;
foreach ($pages as $p) {
    $url = "http://localhost/satya-sai/Admission/" . $p;
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 6);
    $html = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    // Check for raw code leak
    $hasRawCode = (strpos($html, 'require_once') !== false || strpos($html, '$admissionData') !== false || strpos($html, '<?php') !== false);
    // Check for PHP warnings or fatal errors
    $hasPhpError = (strpos($html, 'Fatal error') !== false || strpos($html, 'Parse error') !== false || strpos($html, 'Warning:') !== false);
    
    echo "========================================\n";
    echo "PAGE: $p\n";
    echo "HTTP Status: $code\n";
    echo "Length: " . strlen($html) . " bytes\n";
    echo "Raw PHP code leak: " . ($hasRawCode ? 'FAILED!' : 'NONE (Clean)') . "\n";
    echo "PHP Errors: " . ($hasPhpError ? 'FAILED!' : 'NONE (Clean)') . "\n";
    
    if ($code !== 200 || $hasRawCode || $hasPhpError) {
        $allPassed = false;
    }
}

echo "========================================\n";
echo "OVERALL VERIFICATION: " . ($allPassed ? 'ALL 7 PAGES PERFECT!' : 'ISSUES DETECTED!') . "\n";
