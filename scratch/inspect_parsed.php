<?php

$json = json_decode(file_get_contents('scratch/parsed_exam_tables.json'), true);

echo "Total tables: " . count($json) . "\n";

foreach ($json as $idx => $table) {
    echo "--- Table " . ($idx + 1) . " (" . count($table) . " rows) ---\n";
    foreach ($table as $rIdx => $row) {
        $cTexts = [];
        $links = [];
        foreach ($row as $cell) {
            $cTexts[] = $cell['text'];
            foreach ($cell['links'] as $l) {
                $links[] = $l['url'];
            }
        }
        $rowSummary = implode(' | ', array_slice($cTexts, 0, 3));
        if (count($links) > 0) {
            $rowSummary .= " [Link: " . $links[0] . "]";
        }
        echo "  Row " . ($rIdx + 1) . ": " . mb_substr($rowSummary, 0, 100) . "\n";
    }
}

