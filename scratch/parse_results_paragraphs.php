<?php

$html_path = 'd:/xampp/htdocs/sssu/satya-sai/assets/images/sssutms.co.in/cms/Website/Examination/Results.html';

if (!file_exists($html_path)) {
    die("Results.html not found!\n");
}

$html = file_get_contents($html_path);
$dom = new DOMDocument();
@$dom->loadHTML('<?xml encoding="utf-8" ?>' . $html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
$xpath = new DOMXPath($dom);

$article = $xpath->query('//article');
if ($article->length == 0) {
    die("No article container found!\n");
}

$pNodes = $xpath->query('.//p', $article->item(0));

function clean_txt($t) {
    $t = strip_tags($t);
    $t = html_entity_decode($t, ENT_QUOTES, 'UTF-8');
    $t = preg_replace('/\s+/', ' ', $t);
    return trim($t);
}

$groups = [];
$currentDate = '';
$currentItems = [];

foreach ($pNodes as $p) {
    $txt = clean_txt($p->textContent);
    if (empty($txt) || $txt === 'RESULT') continue;

    // Check if paragraph is a date header
    if (preg_match('/(\d{1,2}\s*(Jan|Feb|Mar|Apr|May|Jun|June|Jul|July|Aug|August|Sep|Sept|October|Nov|Dec)[a-z]*\s*\d{4})/i', $txt, $m) ||
        preg_match('/Result\s*Declared\s*on\s*(.*)/i', $txt, $m)) {

        if (!empty($currentDate) && !empty($currentItems)) {
            $groups[] = [
                'date' => $currentDate,
                'items' => $currentItems
            ];
            $currentItems = [];
        }
        $currentDate = $txt;
        continue;
    }

    // Otherwise it's a course result line
    if (strlen($txt) > 3) {
        $aNodes = $xpath->query('.//a', $p);
        $link = 'https://www.universitymanagementsystem.in/SatyaSai';
        if ($aNodes->length > 0) {
            $href = trim($aNodes->item(0)->getAttribute('href'));
            if (!empty($href) && $href !== '#') {
                $link = $href;
            }
        }
        $currentItems[] = [
            'title' => $txt,
            'link' => $link
        ];
    }
}

if (!empty($currentDate) && !empty($currentItems)) {
    $groups[] = [
        'date' => $currentDate,
        'items' => $currentItems
    ];
}

echo "Extracted " . count($groups) . " result date groups!\n";

$totalCourseCount = 0;
foreach ($groups as $idx => $g) {
    $c = count($g['items']);
    $totalCourseCount += $c;
    echo ($idx+1) . ". Date: " . $g['date'] . " (" . $c . " courses)\n";
}

echo "Total Course Results Extracted: $totalCourseCount\n";

file_put_contents('scratch/parsed_result_groups.json', json_encode($groups, JSON_PRETTY_PRINT));

