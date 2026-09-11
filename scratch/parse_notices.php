<?php
$html = file_get_contents('scratch/live_AdmissionNotice_clean.html');
preg_match_all('/<a[^>]+href="([^"]+\.pdf[^"]*)"[^>]*>(.*?)<\/a>/is', $html, $matches, PREG_SET_ORDER);

$notices = [];
$seen = [];
foreach ($matches as $m) {
    $url = $m[1];
    $title = trim(preg_replace('/\s+/', ' ', strip_tags($m[2])));
    if (empty($title) || strlen($title) < 3) continue;
    if (isset($seen[$url])) continue;
    $seen[$url] = true;
    $notices[] = [
        'title' => $title,
        'url' => $url
    ];
}

echo "Total distinct PDF notices extracted: " . count($notices) . "\n";
foreach (array_slice($notices, 0, 15) as $i => $n) {
    echo ($i+1) . ". {$n['title']} -> {$n['url']}\n";
}

file_put_contents('scratch/parsed_admission_notices.json', json_encode($notices, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
