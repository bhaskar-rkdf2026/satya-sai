<?php
$urls = [
    'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/SCHEME/IT_V_SCHEME%20NEW.pdf',
    'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/SCHEME/AAICTE_BE_IT_VI_SC%20updated.pdf',
    'https://sssutms.co.in/cms/Areas/Website/Files/Link/SCHEME/IT_V_SCHEME%20NEW.pdf',
    'https://sssutms.co.in/cms/Areas/Website/Files/Link/SCHEME/AAICTE_BE_IT_VI_SC%20updated.pdf',
];

foreach ($urls as $url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $type = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
    curl_close($ch);
    echo "$url => Code: $code, Type: $type\n";
}
