<?php
$html = file_get_contents('d:/xampp/htdocs/satya-sai/Admission/Brochures.php');

preg_match_all('/<a[^>]+href=["\']([^"\']+)["\'][^>]*>(.*?)<\/a>/is', $html, $matches);
echo "Total links in Brochures: " . count($matches[0]) . "\n";
foreach ($matches[0] as $i => $full) {
    echo ($i+1) . ". Text: " . trim(strip_tags($matches[2][$i])) . "\n   HREF: " . $matches[1][$i] . "\n\n";
}
