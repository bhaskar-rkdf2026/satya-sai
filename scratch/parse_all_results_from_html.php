<?php

$html_path = 'd:/xampp/htdocs/sssu/satya-sai/assets/images/sssutms.co.in/cms/Website/Examination/Results.html';
$base_dir = 'd:/xampp/htdocs/sssu/satya-sai/';

if (!file_exists($html_path)) {
    die("Results.html not found!\n");
}

$html = file_get_contents($html_path);
$dom = new DOMDocument();
@$dom->loadHTML('<?xml encoding="utf-8" ?>' . $html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
$xpath = new DOMXPath($dom);

$tables = $xpath->query('//table');
echo "Found " . $tables->length . " tables in Results.html\n";

function clean_text($t) {
    $t = strip_tags($t);
    $t = html_entity_decode($t, ENT_QUOTES, 'UTF-8');
    $t = preg_replace('/\s+/', ' ', $t);
    return trim($t);
}

$groups = [];

foreach ($tables as $tIdx => $table) {
    $rows = $xpath->query('.//tr', $table);
    if ($rows->length == 0) continue;

    $dateHeader = '';
    $rowItems = [];

    foreach ($rows as $rIdx => $tr) {
        $rText = clean_text($tr->textContent);
        
        // Check if row is a date header
        if (preg_match('/(\d{1,2}\s*(Jan|Feb|Mar|Apr|May|Jun|July|Aug|Sep|Oct|Nov|Dec)[a-z]*\s*\d{4})/i', $rText, $m) ||
            preg_match('/Result\s*Declared\s*on\s*(.*)/i', $rText, $m)) {
            $dateHeader = clean_text($rText);
            continue;
        }

        if (strpos(strtolower($rText), 's.no') !== false || strpos(strtolower($rText), 'declare') !== false) {
            if (empty($dateHeader)) {
                $dateHeader = $rText;
            }
            continue;
        }

        $anchors = $xpath->query('.//a', $tr);
        $link = 'https://www.universitymanagementsystem.in/SatyaSai';
        $title = $rText;

        foreach ($anchors as $a) {
            $href = trim($a->getAttribute('href'));
            $atxt = clean_text($a->textContent);
            if (!empty($href) && $href !== '#') {
                $link = $href;
            }
            if (!empty($atxt) && strlen($atxt) > 3) {
                $title = $atxt;
            }
        }

        $title = preg_replace('/^(Link|Click here|Check Result|View|S\.No\.\s*\d+)/i', '', $title);
        $title = preg_replace('/^\d+\s+/', '', $title);
        $title = trim($title);

        if (!empty($title) && strlen($title) > 3) {
            $rowItems[] = [
                'title' => $title,
                'link' => $link
            ];
        }
    }

    if (!empty($rowItems)) {
        if (empty($dateHeader)) {
            $dateHeader = "Result Declarations (Table " . ($tIdx+1) . ")";
        }
        $groups[] = [
            'date' => $dateHeader,
            'items' => $rowItems
        ];
    }
}

echo "Extracted " . count($groups) . " result groups!\n";
file_put_contents('scratch/parsed_results.json', json_encode($groups, JSON_PRETTY_PRINT));
echo "Saved to scratch/parsed_results.json\n";

