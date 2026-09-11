<?php
$urls = [
    'Admission_Enquiry' => 'https://sssutms.co.in/cms/Website/Admission/Admission_Enquiry',
    'AdmissionNotice' => 'https://sssutms.co.in/cms/Website/Admission/AdmissionNotice',
    'AdmissionProcedure' => 'https://sssutms.co.in/cms/Website/Admission/AdmissionProcedure',
    'FeesStructure' => 'https://sssutms.co.in/cms/Website/Admission/FeesStructure',
    'UniversityAccountDetail' => 'https://sssutms.co.in/cms/Website/Admission/UniversityAccountDetail',
    'Brochures' => 'https://sssutms.co.in/cms/Website/Admission/Brochures',
    'AdmissionRegistration' => 'https://sssutms.co.in/cms/Website/Admission/AdmissionRegistration'
];

if (!is_dir(__DIR__ . '/scratch/live_admission')) {
    mkdir(__DIR__ . '/scratch/live_admission', 0777, true);
}

foreach ($urls as $name => $url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)');
    $html = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    file_put_contents(__DIR__ . '/scratch/live_admission/' . $name . '.html', $html);
    echo $name . ' => Status ' . $code . ', Length: ' . strlen($html) . PHP_EOL;
}
