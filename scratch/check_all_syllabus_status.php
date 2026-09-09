<?php
$dir = "Download/Syllabus/";
$files = glob($dir . "*.php");

echo "Total syllabus files: " . count($files) . "\n";
foreach ($files as $f) {
    $content = file_get_contents($f);
    $has_modern_style = (strpos($content, 'syl-header-banner') !== false || strpos($content, 'eng-header-banner') !== false || strpos($content, 'pharm-header-banner') !== false || strpos($content, 'mtech-header-banner') !== false || strpos($content, 'edu-header-banner') !== false);
    
    preg_match('/\$banner_title\s*=\s*[\'"]([^\'"]+)[\'"]/', $content, $bt);
    $title = $bt[1] ?? 'NOT SET';
    
    preg_match_all('/(href=[\'"][^\'"]+\.pdf[\'"]|base_url\([\'"][^\'"]+\.pdf[\'"]\))/i', $content, $links);
    $link_count = count($links[0]);
    
    echo sprintf("%-30s | Modern: %-5s | Banner: %-20s | Links: %d\n", basename($f), ($has_modern_style ? "YES" : "NO"), $title, $link_count);
}
