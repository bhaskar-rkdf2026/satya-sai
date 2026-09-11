<?php
$html = file_get_contents('http://localhost/satya-sai/Admission/FeesStructure.php');
echo 'Has page-banner-v2: ' . (strpos($html, 'page-banner-v2') !== false ? 'YES' : 'NO') . "\n";
$pos = strpos($html, 'page-banner-v2');
if ($pos !== false) {
    echo substr($html, $pos, 300) . "\n";
} else {
    echo "No page-banner-v2 found\n";
}
