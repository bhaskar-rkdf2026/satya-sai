<?php
$pdf_url = 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Admission/adm_procedure.pdf';
$dest = __DIR__ . '/../assets/documents/admission_notices/adm_procedure.pdf';

$ch = curl_init($pdf_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
$data = curl_exec($ch);
$code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($code == 200 && !empty($data)) {
    file_put_contents($dest, $data);
    echo "adm_procedure.pdf downloaded successfully: " . strlen($data) . " bytes" . PHP_EOL;
} else {
    echo "adm_procedure.pdf download failed with code: " . $code . PHP_EOL;
}
