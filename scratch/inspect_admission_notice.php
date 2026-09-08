<?php
$html = file_get_contents('d:/xampp/htdocs/satya-sai/Admission/AdmissionNotice.php');

// Remove base64 data to inspect text
$cleanHtml = preg_replace('/src="data:image\/[^;]+;base64,[^"]+"/', 'src="[BASE64_IMAGE]"', $html);

// Find all links in AdmissionNotice
preg_match_all('/<a[^>]+href=["\']([^"\']+)["\'][^>]*>(.*?)<\/a>/is', $html, $links);
echo "Total links in AdmissionNotice: " . count($links[0]) . "\n";
foreach ($links[0] as $i => $link) {
    echo ($i+1) . ". Text: " . trim(strip_tags($links[2][$i])) . "\n   HREF: " . $links[1][$i] . "\n\n";
}
