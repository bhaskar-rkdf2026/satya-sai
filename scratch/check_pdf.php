<?php
$filePath = "d:/xampp/htdocs/sssu/satya-sai/assets/images/Files/Link/IQAC/NAAC/Criteria 1/AC FINAL.pdf";
if (!file_exists($filePath)) {
    echo "FILE DOES NOT EXIST!\n";
    exit;
}
$size = filesize($filePath);
echo "File size: " . $size . " bytes\n";
$fp = fopen($filePath, 'rb');
$head = fread($fp, 200);
echo "Head: " . bin2hex(substr($head, 0, 16)) . "\n";
echo "Text Head: " . substr($head, 0, 100) . "\n";
fseek($fp, max(0, $size - 200));
$tail = fread($fp, 200);
echo "Tail: " . substr($tail, -100) . "\n";
fclose($fp);
