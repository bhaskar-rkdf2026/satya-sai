<?php
$url = 'https://sssutms.co.in/';
$opts = [
    "http" => [
        "method" => "GET",
        "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64)\r\n"
    ]
];
$context = stream_context_create($opts);
$html = @file_get_contents($url, false, $context);

if ($html === false) {
    echo "Failed to fetch $url\n";
    exit;
}

echo "Fetched " . strlen($html) . " bytes from homepage.\n";

preg_match_all('/href=["\']([^"\']*)["\']/i', $html, $matches);
$links = array_unique($matches[1]);

echo "Admission/Procedure related links:\n";
foreach ($links as $link) {
    if (stripos($link, 'admission') !== false || stripos($link, 'procedure') !== false || stripos($link, 'adm') !== false) {
        echo " - " . $link . "\n";
    }
}
