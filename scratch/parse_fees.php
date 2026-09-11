<?php
$html = file_get_contents('scratch/live_fees_table.html');
preg_match_all('/<tr[^>]*>(.*?)<\/tr>/is', $html, $rows);

$feeData = [];
foreach ($rows[1] as $r) {
    preg_match_all('/<td[^>]*>(.*?)<\/td>/is', $r, $cols);
    $c = array_map(function($val) {
        return trim(preg_replace('/\s+/', ' ', strip_tags($val)));
    }, $cols[1] ?? []);
    if (!empty($c) && count($c) >= 4) {
        $feeData[] = $c;
    }
}

echo "Total fee rows: " . count($feeData) . "\n";
foreach (array_slice($feeData, 0, 10) as $row) {
    echo implode(' | ', $row) . "\n";
}

file_put_contents('scratch/parsed_fees_structure.json', json_encode($feeData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
