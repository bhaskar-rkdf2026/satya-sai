<?php
$files = glob("Download/Syllabus/*.php");
foreach ($files as $f) {
    $content = file_get_contents($f);
    echo "=== " . basename($f) . " ===\n";
    preg_match_all('/class=[\'"]([^\'"]*btn[^\'"]*)[\'"]/i', $content, $m);
    if (!empty($m[1])) {
        $classes = array_unique($m[1]);
        foreach ($classes as $c) {
            echo "  - $c\n";
        }
    }
}
