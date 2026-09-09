<?php
$files = glob("Download/Syllabus/*.php");

$all_ok = true;
$total_links = 0;
$file_count = 0;

foreach ($files as $f) {
    if (basename($f) === 'Announcements.php' || basename($f) === 'EVENTS.php') continue;
    $file_count++;
    
    echo "==================== Checking $f ====================\n";
    $content = file_get_contents($f);
    
    // Check syntax
    exec("d:\\xampp\\php\\php.exe -l \"$f\"", $output, $return_var);
    if ($return_var !== 0) {
        echo "SYNTAX ERROR in $f: " . implode("\n", $output) . "\n";
        $all_ok = false;
    } else {
        echo "Syntax OK\n";
    }

    // Extract all base_url(...) links
    preg_match_all('/base_url\([\'"]([^\'"]+)[\'"]\)/i', $content, $matches);
    $links = array_unique($matches[1]);
    echo "Found " . count($links) . " unique links.\n";
    $total_links += count($links);

    foreach ($links as $link) {
        $real_path = __DIR__ . '/../' . $link;
        if (!file_exists($real_path)) {
            echo "  [BROKEN] $link -> $real_path NOT FOUND!\n";
            $all_ok = false;
        } else {
            $sz = filesize($real_path);
            echo "  [OK] $link (" . number_format($sz / 1024, 1) . " KB)\n";
        }
    }
    echo "\n";
}

echo "==================== SUMMARY ====================\n";
echo "Total syllabus files tested: $file_count\n";
echo "Total verified download files tested: $total_links\n";
if ($all_ok) {
    echo "ALL SYLLABUS PAGES ARE 100% VALID WITH ZERO BROKEN LINKS!\n";
} else {
    echo "SOME ISSUES WERE FOUND!\n";
}
