<?php
$url = "https://sssutms.co.in/";
$ctx = stream_context_create([
    'ssl' => ['verify_peer' => false, 'verify_peer_name' => false],
    'http' => ['header' => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64)\r\n"]
]);

$html = @file_get_contents($url, false, $ctx);
if ($html === false) {
    die("Failed to fetch home page\n");
}

preg_match_all('/<a[^>]+href=["\']?([^"\' >]+)["\']?[^>]*>(.*?)<\/a>/is', $html, $matches);

echo "=== ALL MATCHING LINKS FROM HOME PAGE ===\n";
foreach ($matches[1] as $idx => $link) {
    $text = trim(strip_tags($matches[2][$idx]));
    if (preg_match('/brochure|prospectus|admission|download|notice|regulation/i', $link) || preg_match('/brochure|prospectus|admission|download|notice|regulation/i', $text)) {
        echo "Text: {$text} | Link: {$link}\n";
    }
}
