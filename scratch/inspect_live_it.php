<?php
$live_url = 'https://sssutms.co.in/cms/Website/Download/Scheme/BE';
$html = file_get_contents($live_url);

if ($html) {
    preg_match_all('/<tr[^>]*>.*?Information Technology.*?<\/tr>/si', $html, $matches);
    print_r($matches[0]);
} else {
    echo "Could not fetch live page.\n";
}
