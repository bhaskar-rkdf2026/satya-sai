<?php

$pdf_list = [
    '5.1.1' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria 5/5.1.1/5.1.1.pdf',
    '5.1.2' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria 5/5.1.2/5.1.2/5.1.2.pdf',
    '5.1.3' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria 5/5.1.3/5.1.3.pdf',
    '5.1.4_policy' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria 5/5.1.4 - Policy %26 Rules regulation %26 Committee.pdf',
    '5.1.4_minutes' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria 5/5.1.4 Minutes.pdf',
    '5.2.1' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria 5/5.2.1 Score Card.pdf',
    '5.2.2' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria 5/5.2.2 offerlatter .pdf',
    '5.2.3' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria 5/5.2.3.pdf',
    '5.3.1' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria 5/5.3.1.pdf',
    '5.3.2_regulation' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria 5/5.3.2/Counsil Regulation.pdf',
    '5.3.2_formation' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria 5/5.3.2/Student Counsil formation.pdf',
    '5.3.2_activities' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria 5/5.3.2/Student Council and its Activities.pdf',
    '5.3.3' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria 5/5.3.3/5.3.3.pdf',
    '5.4.1' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria 5/5.4.1/Final 5.4.1.pdf',
    '5.4.2' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria 5/5.4.2/Final 5.4.2.pdf'
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

echo "All Criteria 5 PDFs checked and downloaded!\n";

PHP;

file_put_contents('scratch/download_and_rebuild_criteria_five.php', $code);

