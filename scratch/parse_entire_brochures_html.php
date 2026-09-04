<?php
$html = file_get_contents('d:/xampp/htdocs/sssu/satya-sai/assets/images/sssutms.co.in/cms/Website/Admission/Brochures.html');

$dom = new DOMDocument();
@$dom->loadHTML($html);

$xpath = new DOMXPath($dom);
$links = $xpath->query('//a');

echo "=== TOTAL LINKS FOUND IN BROCHURES.HTML: " . $links->length . " ===\n";
foreach ($links as $i => $link) {
    $href = $link->getAttribute('href');
    $text = trim(preg_replace('/\s+/', ' ', $link->textContent));
    if (strpos($href, 'MAIN_') !== false || strpos($href, 'File') !== false || strpos($href, 'pdf') !== false || strpos($text, 'Brochure') !== false || strpos($text, 'Prospectus') !== false) {
        echo "LINK [{$i}]: Text='{$text}' | Href='{$href}'\n";
    }
}
