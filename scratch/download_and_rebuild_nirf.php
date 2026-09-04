<?php

$pdf_list = [
    '2026_eng' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/NIRF/SRI SATYA SAI UNIVERSITY OF TECHNOLOGY %26 MEDICAL SCIENCES%2C SEHORE NIRF 2026 Engineering.pdf',
    '2026_pharm' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/NIRF/SRI SATYA SAI UNIVERSITY OF TECHNOLOGY %26 MEDICAL SCIENCES%2C SEHORE NIRF 2026 Pharmacy.pdf',
    '2026_agri' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/NIRF/SRI SATYA SAI UNIVERSITY OF TECHNOLOGY %26 MEDICAL SCIENCES%2C SEHORE AGRICULTURE AND ALLIED SECTORS.pdf',
    '2026_overall' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/NIRF/NIRF Overall.pdf',

    '2025_eng' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/NIRF25/ENGINEERING.pdf',
    '2025_pharm' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/NIRF25/PHARMACY.pdf',
    '2025_agri' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/NIRF25/AGRICULTURE AND ALLIED SECTORS.pdf',
    '2025_overall' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/NIRF25/OVERALL.pdf',

    '2024_eng' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/SRI_SATYA_SAI_UNIVERSITY_OF_TECHNOLOGY_&_MEDICAL_SCIENCES,_SEHORE20240131-_2024_19032024_0326.pdf',
    '2024_pharm' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/SRI_SATYA_SAI_UNIVERSITY_OF_TECHNOLOGY_&_MEDICAL_SCIENCES,_SEHORE20240306-_(1)_06032024_0227.pdf',
    '2024_agri' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/SRI_SATYA_SAI_UNIVERSITY_OF_TECHNOLOGY_&_MEDICAL_SCIENCES,_SEHORE20240306-_(2)_06032024_0232.pdf'
];

$base_dir = 'd:/xampp/htdocs/sssu/satya-sai/';

foreach ($pdf_list as $key => $remote_url) {
    $parsed_path = parse_url($remote_url, PHP_URL_PATH);
    $relative_path = str_replace('/cms/Areas/Website/', 'assets/images/', $parsed_path);
    $local_path = $base_dir . urldecode($relative_path);

    $dir = dirname($local_path);
    if (!is_dir($dir)) mkdir($dir, 0777, true);

    if (!file_exists($local_path) || filesize($local_path) == 0) {
        echo "Downloading $key -> $local_path...\n";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, str_replace(' ', '%20', $remote_url));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);
        $data = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($code == 200 && strlen($data) > 100) {
            file_put_contents($local_path, $data);
            echo "  [SUCCESS] Saved " . filesize($local_path) . " bytes\n";
        } else {
            echo "  [FAIL] HTTP $code\n";
        }
    }
}

echo "All NIRF PDFs checked and downloaded!\n";

