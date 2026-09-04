<?php
$file = 'C:/Users/Admin/.gemini/antigravity-ide/brain/d204b681-b7ec-4539-8458-d57d758e2f25/.system_generated/steps/165/content.md';
$html = file_get_contents($file);

$start = strpos($html, '<div class="card-body');
$end = strpos($html, '<div class="col-lg-3', $start);
if ($end === false) {
    $end = strpos($html, '<footer', $start);
}
$section = substr($html, $start, $end - $start);

$clean = preg_replace('/data:image\/[^;]+;base64,[A-Za-z0-9+\/=\s]{50,}/', '[IMAGE_EXTRACTED_LOCALLY]', $section);
echo $clean;
