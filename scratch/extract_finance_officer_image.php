<?php
/**
 * Extract base64 image from live Finance Officer page and save as file
 */

$htmlFile = 'C:/Users/Admin/.gemini/antigravity-ide/brain/1d65a721-44b1-4961-9451-41c3ad8495e7/.system_generated/steps/382/content.md';
$outputPath = 'd:/xampp/htdocs/satya-sai/assets/images/Files/Link/finance_officer_vimal_nath.png';

$content = file_get_contents($htmlFile);

// Extract base64 image
if (preg_match('/src="data:image\/png;base64,([^"]+)"/', $content, $matches)) {
    $base64Data = $matches[1];
    $imageData = base64_decode($base64Data);
    
    if ($imageData !== false) {
        file_put_contents($outputPath, $imageData);
        echo "SUCCESS: Image saved to $outputPath\n";
        echo "Size: " . filesize($outputPath) . " bytes\n";
    } else {
        echo "ERROR: Failed to decode base64 data\n";
    }
} else {
    echo "ERROR: No base64 image found in HTML\n";
}
