<?php

$pdf_list = [
    '3.1.2' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria 3/3.1.2 additional uploading.pdf',
    '3.1.3' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria 3/3.1.3 additional uploading final.pdf',
    '3.1.5' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria 3/3.1.5/3.1.5 final.pdf',
    '3.2.1' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria 3/3.2.1.pdf',
    '3.2.2' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria 3/industry projects 3.1.6/3.2.2.pdf',
    '3.2.3' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria 3/industry projects 3.1.6/3.2.3.pdf',
    '3.3.1_2017' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria 3/3.3/final teaching 2017-18.pdf',
    '3.3.1_2018' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria 3/3.3/final teaching 2018-19.pdf',
    '3.3.1_2019' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria 3/3.3/final teaching2019-20.pdf',
    '3.3.1_2020' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria 3/3.3/final teaching2020-21.pdf',
    '3.3.1_2021' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria 3/3.3/final teaching2021-22.pdf',
    '3.3.2' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria 3/3.3.2  final.pdf',
    '3.4.1' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria 3/3.4.1/3.4.1 final.pdf',
    '3.4.2' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria 3/3.4.2.pdf',
    '3.4.3.1' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria 3/3.4.3/3.4.3.1final.pdf',
    '3.4.4' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria 3/3.4.4/final 3.4.4.pdf',
    '3.4.5' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria 3/3.4.5/3.4.5 front page.pdf',
    '3.5.1' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria 3/3.5.1/3.5.1.pdf',
    '3.5.2' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria 3/3.5.2/final.pdf',
    '3.6.3' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria 3/3.6.3/3.6.3 final.pdf',
    '3.7.1' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria 3/3.7.1/3.7.1 combine final.pdf',
    '3.7.2' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria 3/3.7.2/3.7.2 final MoU.pdf'
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

echo "All Criteria 3 PDFs checked and downloaded!\n";

