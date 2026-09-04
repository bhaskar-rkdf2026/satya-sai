<?php
$file = 'C:/Users/Admin/.gemini/antigravity-ide/brain/d204b681-b7ec-4539-8458-d57d758e2f25/.system_generated/steps/19/content.md';
$html = file_get_contents($file);

$pos1 = strpos($html, '<div class="main-content">');
if ($pos1 !== false) {
    $sub = substr($html, $pos1, 500000);
    // Find where footer begins
    $pos2 = strpos($sub, '<footer');
    if ($pos2 !== false) {
        $sub = substr($sub, 0, $pos2);
    }
    $clean = preg_replace('/data:image\/[^;]+;base64,[A-Za-z0-9+\/=\s]{100,}/', '[BASE64_IMAGE_STRIPPED]', $sub);
    echo $clean;
} else {
    echo "main-content not found";
}
