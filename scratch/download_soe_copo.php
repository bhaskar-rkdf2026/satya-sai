<?php

$urls = [
    'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/COPO%20mapping/CO-PO%20MAPPING-(SOE)/co%20po%20combine%20file%20final.pdf',
    'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/COPO%20mapping/co-po-engineering-final.pdf',
    'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/COPO%20mapping/co-po%20engineering%20final.pdf',
    'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/COPO%20mapping/SOE%20COPO%20FINAL.pdf'
];

$targetPath = 'd:/xampp/htdocs/sssu/satya-sai/assets/images/Files/Link/IQAC/NAAC/COPO mapping/co-po-engineering-final.pdf';
$dir = dirname($targetPath);
if (!is_dir($dir)) mkdir($dir, 0777, true);

foreach ($urls as $u) {
    echo "Trying $u ...\n";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $u);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);
    $data = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    echo "  -> Code $code, len: " . strlen($data) . "\n";
    if ($code == 200 && strlen($data) > 1000) {
        file_put_contents($targetPath, $data);
        echo "SUCCESS! Saved " . filesize($targetPath) . " bytes\n";
        break;
    }
}

