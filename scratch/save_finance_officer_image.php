<?php
$html = file_get_contents("https://sssutms.co.in/cms/Website/About/UniversityOfficials/Finance_Officer");
if ($html === false) {
    die("Failed to fetch live page");
}

if (preg_match('/<img[^>]+src=["\']data:image\/(png|jpeg|jpg);base64,([^"\']+)["\']/i', $html, $matches)) {
    $ext = $matches[1] === 'jpeg' ? 'jpg' : $matches[1];
    $imageData = base64_decode($matches[2]);
    $targetPath = __DIR__ . '/../assets/images/Files/Link/finance_officer_vimal_nath.png';
    file_put_contents($targetPath, $imageData);
    echo "Saved image to: $targetPath (" . strlen($imageData) . " bytes)\n";
    
    // Also check image dimensions
    $size = getimagesize($targetPath);
    echo "Dimensions: " . $size[0] . "x" . $size[1] . " (" . $size['mime'] . ")\n";
} else {
    echo "No base64 image found\n";
}
