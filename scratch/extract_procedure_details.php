<?php
$file = 'C:/Users/Admin/.gemini/antigravity-ide/brain/d204b681-b7ec-4539-8458-d57d758e2f25/.system_generated/steps/165/content.md';
$html = file_get_contents($file);

$start = strpos($html, '<div class="main-content">');
if ($start !== false) {
    $sub = substr($html, $start, 500000);
    $end = strpos($sub, '<footer');
    if ($end !== false) {
        $sub = substr($sub, 0, $end);
    }
    
    // Clean out base64 images if any
    $clean = preg_replace('/data:image\/[^;]+;base64,[A-Za-z0-9+\/=\s]{50,}/', '[BASE64_IMAGE]', $sub);
    echo $clean;
} else {
    echo "main-content not found in steps/165/content.md";
}
