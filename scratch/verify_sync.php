<?php
require_once __DIR__ . '/../config.php';

$pages = ['EntranceExamAlert', 'ExamNotifications', 'ExamSchedule', 'Results', 'Interface'];

foreach ($pages as $p) {
    $docs = get_page_documents($p);
    echo "PAGE $p: " . count($docs) . " documents\n";
    foreach (array_slice($docs, 0, 3) as $d) {
        echo "  - [" . $d['id'] . "] " . $d['title'] . " (" . $d['category'] . ") => " . $d['file'] . "\n";
    }
}
