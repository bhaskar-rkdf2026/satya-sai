<?php
require_once __DIR__ . '/../config.php';

$examPages = [
    'EntranceExamAlert' => 'Examination/Examinations/EntranceExamAlert.php',
    'ExamNotifications' => 'Examination/Examinations/ExamNotifications.php',
    'ExamSchedule' => 'Examination/Examinations/ExamSchedule.php',
    'Results' => 'Examination/Examinations/Results.php',
    'Interface' => 'Examination/Examinations/Interface.php'
];

$summary = [];

foreach ($examPages as $key => $relPath) {
    $fullPath = __DIR__ . '/../' . $relPath;
    if (!file_exists($fullPath)) continue;
    $content = file_get_contents($fullPath);
    
    // Match hrefs
    preg_match_all('/<a\s+[^>]*href=["\']?([^"\'>\s]+)["\']?[^>]*>(.*?)<\/a>/is', $content, $matches, PREG_SET_ORDER);
    
    $docs = [];
    foreach ($matches as $m) {
        $href = trim($m[1]);
        $text = trim(preg_replace('/\s+/', ' ', strip_tags($m[2])));
        if (empty($text) || strlen($text) < 3) continue;
        if (strpos($href, 'javascript') !== false || $href === '#' || empty($href)) continue;
        if (in_array(strtolower($text), ['home', 'about', 'academic', 'examination', 'research', 'admission', 'download', 'career', 'contact', 'itep', 'gallery'])) continue;

        // Check if file exists locally
        $localExists = false;
        $localPath = '';

        // Clean href
        $cleanHref = str_replace(['https://www.sssutms.co.in/', 'https://sssutms.co.in/', 'http://www.sssutms.co.in/', 'http://sssutms.co.in/'], '', $href);
        $cleanHref = ltrim($cleanHref, '/');

        // Check relative paths in workspace
        $candidates = [
            __DIR__ . '/../' . $cleanHref,
            __DIR__ . '/../assets/' . $cleanHref,
            __DIR__ . '/../assets/images/' . $cleanHref,
            __DIR__ . '/../assets/uploads/documents/' . basename($cleanHref),
            __DIR__ . '/../assets/images/Files/Link/' . basename($cleanHref),
            __DIR__ . '/../assets/images/Files/Widget/Download/' . basename($cleanHref)
        ];

        foreach ($candidates as $c) {
            if (file_exists($c) && !is_dir($c)) {
                $localExists = true;
                $localPath = $c;
                break;
            }
        }

        $docs[] = [
            'title' => $text,
            'original_href' => $href,
            'clean_href' => $cleanHref,
            'local_exists' => $localExists,
            'local_path' => $localPath
        ];
    }
    $summary[$key] = $docs;
}

foreach ($summary as $pageKey => $docs) {
    echo "========================================\n";
    echo "PAGE: $pageKey (Total docs: " . count($docs) . ")\n";
    echo "========================================\n";
    $existCount = 0;
    $missingCount = 0;
    foreach ($docs as $d) {
        if ($d['local_exists']) $existCount++;
        else $missingCount++;
    }
    echo "Local exists: $existCount | Missing/Remote: $missingCount\n";
    foreach (array_slice($docs, 0, 10) as $i => $d) {
        echo "  [" . ($i+1) . "] " . $d['title'] . "\n";
        echo "      Link: " . $d['original_href'] . "\n";
        echo "      Local: " . ($d['local_exists'] ? "EXISTS (" . basename($d['local_path']) . ")" : "MISSING") . "\n";
    }
}
