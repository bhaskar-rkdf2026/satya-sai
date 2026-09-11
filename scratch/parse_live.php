<?php
$html = file_get_contents(__DIR__ . '/clean_Iic_Cell.html');
// Strip XML/style comments
$clean = preg_replace('/<!--[\s\S]*?-->/i', '', $html);
$clean = preg_replace('/<style[\s\S]*?<\/style>/i', '', $clean);
preg_match_all('/<img[^>]+src=["\']([^"\']+)["\']/i', $clean, $imgs);
echo "Images found:\n";
print_r($imgs[1]);

echo "Clean text:\n";
echo substr(strip_tags($clean), 0, 1500);









