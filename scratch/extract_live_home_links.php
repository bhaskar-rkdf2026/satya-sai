<?php
$ch = curl_init('https://sssutms.co.in/cms/Website');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)');
$html = curl_exec($ch);
curl_close($ch);

file_put_contents('scratch/live_home_raw.html', $html);
echo "Live HTML downloaded: " . strlen($html) . " bytes.\n";

// Let's search for "Quick Link" or "Download Link" or widgets
preg_match_all('/(Quick\s*Link[s]?|Download\s*Link[s]?|Useful\s*Link[s]?|Important\s*Link[s]?)/i', $html, $m, PREG_OFFSET_CAPTURE);
print_r($m[0]);
