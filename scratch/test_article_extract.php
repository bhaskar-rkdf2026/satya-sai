<?php
$html = file_get_contents('d:/xampp/htdocs/sssu/satya-sai/assets/images/sssutms.co.in/cms/Website/Academic/NAAC/CriteriaOne.html');
$dom = new DOMDocument();
@$dom->loadHTML($html);
$xp = new DOMXPath($dom);
$articles = $xp->query('//article');
if ($articles->length > 0) {
    $content = $dom->saveHTML($articles->item(0));
    echo "Length of article content: " . strlen($content) . "\n";
    echo "First 300 chars:\n" . substr($content, 0, 300) . "\n";
}
