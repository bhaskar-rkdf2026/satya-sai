<?php

$data = json_decode(file_get_contents('scratch/criteria_placement_audit.json'), true);

foreach ($data as $cName => $info) {
    echo "=== $cName ===\n";
    echo "HTML PDF Count: " . $info['html_count'] . "\n";
    echo "PHP  PDF Count: " . $info['php_count'] . "\n";

    // Compare first 5 and last 5 or any mismatches
    $mismatches = [];
    $max = max(count($info['htmlPdfs']), count($info['phpPdfs']));
    for ($i = 0; $i < $max; $i++) {
        $htmlItem = $info['htmlPdfs'][$i] ?? null;
        $phpItem  = $info['phpPdfs'][$i] ?? null;

        $hHref = $htmlItem ? basename($htmlItem['href']) : 'NONE';
        $pHref = $phpItem ? basename(parse_url($phpItem['href'], PHP_URL_PATH)) : 'NONE';

        if (rawurldecode($hHref) !== rawurldecode($pHref)) {
            $mismatches[] = [
                'index' => $i + 1,
                'context' => $htmlItem['context'] ?? $phpItem['context'] ?? '',
                'html_pdf' => $hHref,
                'php_pdf'  => $pHref
            ];
        }
    }

    echo "Mismatches / Misplacements count: " . count($mismatches) . "\n";
    if (count($mismatches) > 0) {
        echo "Sample mismatches:\n";
        for ($k = 0; $k < min(10, count($mismatches)); $k++) {
            $m = $mismatches[$k];
            echo "  Row #" . $m['index'] . ": [" . substr($m['context'], 0, 60) . "] | Live: " . $m['html_pdf'] . " vs Local: " . $m['php_pdf'] . "\n";
        }
    }
    echo "\n";
}

