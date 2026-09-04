<?php
$files = glob('d:/xampp/htdocs/sssu/satya-sai/assets/images/sssutms.co.in/cms/Website/Academic/NAAC/Criteria*.html');
foreach ($files as $f) {
    $dom = new DOMDocument();
    @$dom->loadHTML(file_get_contents($f));
    $xp = new DOMXPath($dom);
    $articles = $xp->query('//article');
    $cardBodies = $xp->query('//div[contains(@class, "card-body")]');
    echo basename($f) . " -> Articles: " . $articles->length . ", CardBodies: " . $cardBodies->length . "\n";
}
