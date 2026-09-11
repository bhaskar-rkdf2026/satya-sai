<?php
require_once __DIR__ . '/../config.php';

$files = ['EntranceExamAlert.php', 'ExamNotifications.php', 'ExamSchedule.php', 'Results.php', 'Interface.php'];

foreach ($files as $f) {
    $p = __DIR__ . '/../Examination/Examinations/' . $f;
    echo "==============================\n";
    echo "PAGE: $f\n";
    echo "==============================\n";
    if (file_exists($p)) {
        $c = file_get_contents($p);
        preg_match_all('/<a\s+[^>]*href=["\']?([^"\'>\s]+)["\']?[^>]*>(.*?)<\/a>/is', $c, $matches, PREG_SET_ORDER);
        echo "Total raw links: " . count($matches) . "\n";
        $valid = [];
        foreach ($matches as $m) {
            $href = trim($m[1]);
            $text = trim(preg_replace('/\s+/', ' ', strip_tags($m[2])));
            if (empty($text) || strlen($text) < 3) continue;
            if (strpos($href, 'javascript') !== false || $href === '#') continue;
            // Ignore nav links like Home, About, etc.
            if (in_array(strtolower($text), ['home', 'about', 'academic', 'examination', 'research', 'admission', 'download', 'career', 'contact', 'itep', 'gallery'])) continue;
            $valid[] = ['text' => $text, 'href' => $href];
        }
        echo "Meaningful links found: " . count($valid) . "\n";
        foreach (array_slice($valid, 0, 15) as $idx => $v) {
            echo "  [" . ($idx + 1) . "] " . $v['text'] . " --> " . $v['href'] . "\n";
        }
    } else {
        echo "File does not exist: $p\n";
    }
}
