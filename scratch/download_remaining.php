<?php
$urls = [
    'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Admission/admission%20notification%20II%202021_22R.pdf',
    'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Admission/admission%20notification%20III%202021_22.pdf'
];

foreach ($urls as $u) {
    $ch = curl_init($u);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
    $d = curl_exec($ch);
    $c = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    $f = basename($u);
    $dest = 'assets/documents/admission_notices/' . urldecode($f);
    file_put_contents($dest, $d);
    echo $f . ' => code: ' . $c . ', size: ' . strlen($d) . PHP_EOL;
}
