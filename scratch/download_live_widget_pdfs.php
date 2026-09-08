<?php
// Script to download all PDFs from live website widgets locally
$download_map = [
    // Quick links PDFs
    'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Notification%20exam%20dec2025/notificationentance.pdf' => 'assets/images/Files/Link/Notification exam dec2025/notificationentance.pdf',
    'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/MBBS_FIRST_PROFESSIONAL_FEB-2026_17022026_0824.pdf' => 'assets/images/Files/Link/MBBS_FIRST_PROFESSIONAL_FEB-2026_17022026_0824.pdf',
    'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Draft-Admission_Notice_Sri_Satya_Sai_University_12092025_0417.pdf' => 'assets/images/Files/Link/Draft-Admission_Notice_Sri_Satya_Sai_University_12092025_0417.pdf',
    'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Appointment_Add_BHMS_PG_04102023_0923.pdf' => 'assets/images/Files/Link/Appointment_Add_BHMS_PG_04102023_0923.pdf',
    'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/NEP%202020%2027%20university%2014-compressed.pdf' => 'assets/images/Files/Link/NEP 2020 27 university 14-compressed.pdf',

    // Download Links Widget PDFs
    'https://sssutms.co.in/cms/Website/DownloadLinks/File/2465' => 'assets/images/Files/Widget/Download/2465_Whatsapp_Scan_17_August_2026.pdf',
    'https://sssutms.co.in/cms/Website/DownloadLinks/File/2464' => 'assets/images/Files/Widget/Download/2464_paramedical_notification.pdf',
    'https://sssutms.co.in/cms/Website/DownloadLinks/File/2463' => 'assets/images/Files/Widget/Download/2463_Whatsapp_Scan_7_August_2026.pdf',
    'https://sssutms.co.in/cms/Website/DownloadLinks/File/2462' => 'assets/images/Files/Widget/Download/2462_Whatsapp_Scan_7_August_2026.pdf',
    'https://sssutms.co.in/cms/Website/DownloadLinks/File/2461' => 'assets/images/Files/Widget/Download/SUPPLEMENTARY_EXAM_BHMS_2ND_YEAR.pdf',
    'https://sssutms.co.in/cms/Website/DownloadLinks/File/2460' => 'assets/images/Files/Widget/Download/2460_Adobe_Scan_24_Jul_2026.pdf',
    'https://sssutms.co.in/cms/Website/DownloadLinks/File/2459' => 'assets/images/Files/Widget/Download/2459_Adobe_Scan_24_Jul_2026.pdf'
];

$root = dirname(__DIR__);

foreach ($download_map as $url => $rel_dest) {
    $dest = $root . '/' . str_replace('/', DIRECTORY_SEPARATOR, $rel_dest);
    $dir = dirname($dest);
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
    
    if (file_exists($dest) && filesize($dest) > 1000) {
        echo "✓ Already exists: $rel_dest (" . filesize($dest) . " bytes)\n";
        continue;
    }

    echo "Downloading $url -> $rel_dest ...\n";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
    $data = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($code == 200 && strlen($data) > 500) {
        file_put_contents($dest, $data);
        echo "✓ Successfully saved: $rel_dest (" . strlen($data) . " bytes)\n";
    } else {
        echo "✗ Failed to download: $url (HTTP $code)\n";
    }
}
