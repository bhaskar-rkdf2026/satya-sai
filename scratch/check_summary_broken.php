<?php
$files = glob("Download/Syllabus/*.php");
foreach ($files as $f) {
    if (basename($f) === 'Announcements.php' || basename($f) === 'EVENTS.php') continue;
    $content = file_get_contents($f);
    preg_match_all('/base_url\([\'"]([^\'"]+)[\'"]\)/i', $content, $matches);
    $links = array_unique($matches[1]);
    $broken = [];
    foreach ($links as $l) {
        $p = __DIR__ . '/../' . $l;
        if (!file_exists($p)) {
            $broken[] = $l;
        }
    }
    if (!empty($broken)) {
        echo basename($f) . " has " . count($broken) . " broken links:\n";
        foreach ($broken as $b) {
            echo "  - $b\n";
        }
    } else {
        echo sprintf("%-30s : ALL OK (%d verified links)\n", basename($f), count($links));
    }
}
