<?php

if (!file_exists('scratch/extracted_sections.json')) {
    die("Not ready yet\n");
}

$json = json_decode(file_get_contents('scratch/extracted_sections.json'), true);

echo "Total Sections: " . count($json) . "\n";
$totalRows = 0;
$withLinks = 0;

foreach ($json as $s) {
    $totalRows += count($s['rows']);
    foreach ($s['rows'] as $r) {
        if ($r['final_link'] !== '#') {
            $withLinks++;
        }
    }
}

echo "Total Timetable Rows: $totalRows\n";
echo "Timetables with Active PDF Links: $withLinks\n";

