<?php
$htmlFile = 'C:/Users/Admin/.gemini/antigravity-ide/brain/1d65a721-44b1-4961-9451-41c3ad8495e7/.system_generated/steps/382/content.md';
$content = file_get_contents($htmlFile);

if (preg_match('/src="data:image\/png;base64,([^"]+)"/', $content, $matches)) {
    $imgData = base64_decode($matches[1]);
    $dest1 = 'd:/xampp/htdocs/satya-sai/assets/images/Files/Link/cfa_vimal_nath.png';
    $dest2 = 'd:/xampp/htdocs/satya-sai/assets/images/Files/Link/finance_officer_vimal_nath.png';
    file_put_contents($dest1, $imgData);
    file_put_contents($dest2, $imgData);
    echo "Successfully extracted and saved " . strlen($imgData) . " bytes to $dest1 and $dest2\n";
    $info = getimagesize($dest1);
    echo "Image size: " . $info[0] . "x" . $info[1] . "\n";
} else {
    echo "Regex did not match base64 image\n";
}
