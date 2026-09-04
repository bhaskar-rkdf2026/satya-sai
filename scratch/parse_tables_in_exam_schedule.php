<?php

$fpath = 'd:/xampp/htdocs/sssu/satya-sai/Examination/ExamSchedule.php';
$content = file_get_contents($fpath);

// Load HTML using DOMDocument
$dom = new DOMDocument();
@$dom->loadHTML('<?xml encoding="utf-8" ?>' . $content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

$xpath = new DOMXPath($dom);

// Find all section headers or tables
$tables = $xpath->query('//table');
echo "Found " . $tables->length . " tables.\n";

$data = [];
foreach ($tables as $tIdx => $table) {
    $rows = $xpath->query('.//tr', $table);
    $tableRows = [];
    foreach ($rows as $rIdx => $tr) {
        $cells = $xpath->query('.//td|.//th', $tr);
        $rowCells = [];
        foreach ($cells as $cIdx => $cell) {
            $aTags = $xpath->query('.//a', $cell);
            $links = [];
            foreach ($aTags as $a) {
                $href = $a->getAttribute('href');
                $t = trim(preg_replace('/\s+/', ' ', $a->textContent));
                if (!empty($href) && $href !== '#') {
                    $links[] = ['url' => $href, 'text' => $t];
                }
            }
            $cellText = trim(preg_replace('/\s+/', ' ', $cell->textContent));
            $rowCells[] = [
                'text' => $cellText,
                'links' => $links
            ];
        }
        if (!empty($rowCells)) {
            $tableRows[] = $rowCells;
        }
    }
    if (!empty($tableRows)) {
        $data[] = $tableRows;
    }
}

file_put_contents('scratch/parsed_exam_tables.json', json_encode($data, JSON_PRETTY_PRINT));
echo "Parsed " . count($data) . " tables into scratch/parsed_exam_tables.json\n";

