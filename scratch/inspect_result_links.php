<?php

$groups = json_decode(file_get_contents('scratch/parsed_result_groups.json'), true);

$pdfCount = 0;
$portalCount = 0;

foreach ($groups as $g) {
    foreach ($g['items'] as $item) {
        if (strpos(strtolower($item['link']), '.pdf') !== false) {
            $pdfCount++;
        } else {
            $portalCount++;
        }
    }
}

echo "Total PDF Results: $pdfCount\n";
echo "Total Portal Results: $portalCount\n";

