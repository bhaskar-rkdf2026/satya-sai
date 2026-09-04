<?php

$fpath = 'd:/xampp/htdocs/sssu/satya-sai/Examination/ExamSchedule.php';
$content = file_get_contents($fpath);

// Find all links and their text or table rows
preg_match_all('/<a[^>]+href=["\']([^"\']+)["\'][^>]*>(.*?)<\/a>/is', $content, $matches, PREG_SET_ORDER);

echo "Found " . count($matches) . " links in ExamSchedule.php\n";

$items = [];
foreach ($matches as $m) {
    $url = trim($m[1]);
    $text = trim(strip_tags($m[2]));
    $text = preg_replace('/\s+/', ' ', $text);
    if (!empty($text) && $url !== '#' && $url !== '') {
        $items[] = [
            'url' => $url,
            'text' => html_entity_decode($text, ENT_QUOTES, 'UTF-8')
        ];
    }
}

echo "Filtered " . count($items) . " valid timetable items.\n";
foreach (array_slice($items, 0, 10) as $idx => $it) {
    echo ($idx+1) . ". " . $it['text'] . " => " . $it['url'] . "\n";
}

