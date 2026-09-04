<?php
$file = 'C:/Users/Admin/.gemini/antigravity-ide/brain/d204b681-b7ec-4539-8458-d57d758e2f25/.system_generated/steps/19/content.md';
$html = file_get_contents($file);

$start = strpos($html, '<div class="card-body');
if ($start !== false) {
    // Find next sidebar or footer
    $end = strpos($html, '<div class="col-lg-3', $start);
    if ($end === false) {
        $end = strpos($html, '<footer', $start);
    }
    $section = substr($html, $start, $end - $start);
    
    // Find all links
    preg_match_all('/<a\s+[^>]*href=["\']([^"\']*)["\'][^>]*>(.*?)<\/a>/is', $section, $links, PREG_SET_ORDER);
    echo "=== FOUND LINKS IN LIVE ADMISSION NOTICE ===" . PHP_EOL;
    foreach ($links as $idx => $link) {
        $clean_text = trim(strip_tags($link[2]));
        echo ($idx + 1) . ". HREF: " . $link[1] . PHP_EOL;
        echo "   TEXT: " . $clean_text . PHP_EOL;
    }
    
    echo PHP_EOL . "=== SECTION TEXT/HTML (WITH BASE64 SHORTENED) ===" . PHP_EOL;
    $clean_section = preg_replace('/data:image\/[^;]+;base64,[A-Za-z0-9+\/=\s]{50,}/', '[BASE64_IMAGE]', $section);
    // Remove mso xml comments if any
    $clean_section = preg_replace('/<!--\[if gte mso.*?<!\[endif\]-->/s', '', $clean_section);
    echo $clean_section;
} else {
    echo "card-body not found";
}
