<?php
$html = file_get_contents('d:/xampp/htdocs/sssu/satya-sai/assets/images/sssutms.co.in/cms/Website/Admission/Brochures.html');

// Find position of "Brochures" heading in main content
$pos = strpos($html, '<i class="bi bi-journal-text me-2"></i> Brochures');
if ($pos !== false) {
    echo "=== MAIN CONTENT CUTOUT (10000 chars) ===\n";
    echo substr($html, $pos, 10000);
} else {
    echo "Heading not found!\n";
}
