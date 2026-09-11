<?php
$urls = [
    'http://localhost/satya-sai/assets/css/admin.css',
    'http://localhost/satya-sai/assets/images/logo/logo.jpg'
];

foreach ($urls as $u) {
    $ch = curl_init($u);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $res = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    echo "$u => HTTP $code, length: " . strlen($res) . "\n";
}
