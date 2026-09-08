<?php
// Script to inspect differences between UI-Change-Ayush and main
$files = [];
exec('git diff --name-only main origin/UI-Change-Ayush', $files);

$categories = [
    'Admission' => [],
    'Examination' => [],
    'Research' => [],
    'About' => [],
    'Academic' => [],
    'Download' => [],
    'Galleries' => [],
    'Root/Includes' => [],
    'Assets' => []
];

foreach ($files as $f) {
    if (strpos($f, 'scratch/') === 0) continue;
    $matched = false;
    foreach ($categories as $cat => &$list) {
        if ($cat === 'Root/Includes') {
            if (strpos($f, 'includes/') === 0 || in_array($f, ['index.php', 'about.php', 'contact.php', 'gallery.php', 'EVENTS.php', 'Announcements.php'])) {
                $list[] = $f;
                $matched = true;
                break;
            }
        } elseif (strpos($f, $cat . '/') === 0) {
            $list[] = $f;
            $matched = true;
            break;
        } elseif (strpos($f, 'assets/') === 0 && $cat === 'Assets') {
            $list[] = $f;
            $matched = true;
            break;
        }
    }
    if (!$matched) {
        $categories['Root/Includes'][] = $f;
    }
}

foreach ($categories as $cat => $list) {
    echo "=== $cat (" . count($list) . " files) ===\n";
    foreach ($list as $file) {
        echo "  - $file\n";
    }
    echo "\n";
}
