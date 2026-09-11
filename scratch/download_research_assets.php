<?php
$assets = [
    'assets/images/research/h.k.SHARMA_05042022_1258.jpg' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/h.k.SHARMA_05042022_1258.jpg',
    'assets/images/research/iic/certificate_06072023_1205.jpg' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/certificate_06072023_1205.jpg',
    'assets/images/research/iic/inno_06072023_1207.jpg' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/inno_06072023_1207.jpg',
    'assets/images/research/iic/entr_06072023_1209.jpg' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/entr_06072023_1209.jpg',
    'assets/images/research/iic/WhatsApp_Image_2023-09-26_at_15.01.28_26092023_0425.jpg' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/WhatsApp_Image_2023-09-26_at_15.01.28_26092023_0425.jpg',
    'assets/images/research/iic/COMSOL_Workshop_10072023_1027.jpg' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/COMSOL_Workshop_10072023_1027.jpg',
    'assets/images/research/iic/NIPAM_workshop_10072023_1029.jpg' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/NIPAM_workshop_10072023_1029.jpg',
    'assets/images/research/iic/NIPAM_10072023_1029.jpg' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/NIPAM_10072023_1029.jpg',
    'assets/images/research/iic/certificate_uit_10072023_1033.jpg' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/certificate_uit_10072023_1033.jpg',
    'assets/images/research/nptel-Logo.png' => 'https://nptel.ac.in/assets/nptel_assets/images/nptel-logo.png'
];

foreach ($assets as $relPath => $url) {
    $fullPath = __DIR__ . '/../' . $relPath;
    $dir = dirname($fullPath);
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }

    if (!file_exists($fullPath) || filesize($fullPath) < 500) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
        $data = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode === 200 && strlen($data) > 500) {
            file_put_contents($fullPath, $data);
            echo "Downloaded: $relPath (" . strlen($data) . " bytes)\n";
        } else {
            echo "Failed or fallback for: $relPath (HTTP $httpCode)\n";
        }
    } else {
        echo "Already exists: $relPath\n";
    }
}
echo "ASSETS DOWNLOAD COMPLETE.\n";
