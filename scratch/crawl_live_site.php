<?php
$visited = [];
$toVisit = ["https://sssutms.co.in/"];
$found = [];

$ctx = stream_context_create([
    'ssl' => ['verify_peer' => false, 'verify_peer_name' => false],
    'http' => ['header' => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64)\r\n", 'timeout' => 10]
]);

while (!empty($toVisit) && count($visited) < 100) {
    $url = array_shift($toVisit);
    if (isset($visited[$url])) continue;
    $visited[$url] = true;
    
    echo "Crawling: {$url}\n";
    $html = @file_get_contents($url, false, $ctx);
    if (!$html) continue;
    
    preg_match_all('/<a[^>]+href=["\']?([^"\' >]+)["\']?[^>]*>(.*?)<\/a>/is', $html, $matches);
    
    foreach ($matches[1] as $idx => $href) {
        $text = trim(strip_tags($matches[2][$idx]));
        
        // Resolve relative URL
        if (strpos($href, 'http') !== 0) {
            if (strpos($href, '/') === 0) {
                $fullUrl = "https://sssutms.co.in" . $href;
            } else {
                $fullUrl = "https://sssutms.co.in/" . $href;
            }
        } else {
            $fullUrl = $href;
        }
        
        if (strpos($fullUrl, 'sssutms.co.in') !== false) {
            if (preg_match('/brochure|prospectus|download|admission|pdf/i', $fullUrl) || preg_match('/brochure|prospectus|download|admission|pdf/i', $text)) {
                $found[] = ["url" => $fullUrl, "text" => $text, "found_on" => $url];
            }
            if (!isset($visited[$fullUrl]) && count($visited) + count($toVisit) < 150) {
                $toVisit[] = $fullUrl;
            }
        }
    }
}

echo "\n\n=== RESULTS FOUND ===\n";
foreach ($found as $f) {
    echo "Text: {$f['text']} | URL: {$f['url']} | Page: {$f['found_on']}\n";
}
