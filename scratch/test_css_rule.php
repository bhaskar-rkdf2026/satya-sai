<?php
$css = file_get_contents('d:/xampp/htdocs/satya-sai/assets/css/style.css');
if (strpos($css, 'transform: translateX(-50%) !important;') !== false && strpos($css, '.content-card-body .text-center h4::after') !== false) {
    echo "CSS RULE VERIFIED: Center-aligned headings now have centered underline!\n";
} else {
    echo "CSS RULE MISSING!\n";
}
