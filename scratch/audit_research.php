<?php
$pages = [
    'Director_Research_And_Development',
    'RAndDCell',
    'CouncilForResearch',
    'ResearchPromotionPolicy',
    'ConsultancyServices',
    'Patents',
    'CollaborationandMou',
    'Iic_Cell',
    'E-Resources',
    'Exposition',
    'UGAndPGScholarsProject',
    'NPTEL'
];

$report = [];

foreach ($pages as $p) {
    $localPath = __DIR__ . '/../Research/' . $p . '.php';
    $liveHtmlPath = __DIR__ . '/live_research/' . $p . '.html';

    $liveHtml = file_exists($liveHtmlPath) ? file_get_contents($liveHtmlPath) : '';
    $localPhp = file_exists($localPath) ? file_get_contents($localPath) : '';

    // Check live main content
    $liveArea = '';
    if (preg_match('/<div class="col-lg-9">(.*?)<\/div>\s*<!-- Sidebar Widget -->/s', $liveHtml, $m)) {
        $liveArea = $m[1];
    } else {
        $liveArea = $liveHtml;
    }

    // Check local main content
    $localArea = '';
    if (preg_match('/<!-- Main Content Area.*?>(.*?)<!-- Sticky Category Sidebar/s', $localPhp, $m)) {
        $localArea = $m[1];
    } else {
        $localArea = $localPhp;
    }

    $liveText = trim(strip_tags($liveArea));
    $liveText = preg_replace('/\s+/', ' ', $liveText);

    $localText = trim(strip_tags($localArea));
    $localText = preg_replace('/\s+/', ' ', $localText);

    // Live specific assets
    preg_match_all('/<a[^>]+href=["\']([^"\']+\.pdf[^"\']*)["\'][^>]*>(.*?)<\/a>/si', $liveArea, $pdfM);
    preg_match_all('/<img[^>]+src=["\']([^"\']+)["\'][^>]*>/si', $liveArea, $imgM);
    preg_match_all('/<table/i', $liveArea, $tblM);

    $livePdfs = $pdfM[1] ?? [];
    $liveImgs = $imgM[1] ?? [];
    $liveTablesCount = count($tblM[0] ?? []);

    // Check if local has PDFs
    preg_match_all('/\.pdf/i', $localArea, $localPdfM);
    $localPdfCount = count($localPdfM[0]);

    // Check if local has tables
    preg_match_all('/<table/i', $localArea, $localTblM);
    $localTblCount = count($localTblM[0]);

    // Check if local uses dynamic page_documents or hardcoded
    $isDynamic = (strpos($localPhp, "get_page_documents") !== false || strpos($localPhp, "page_documents.json") !== false);

    $report[$p] = [
        'live_text_length' => strlen($liveText),
        'local_text_length' => strlen($localText),
        'live_pdfs' => $livePdfs,
        'local_has_pdf' => $localPdfCount > 0,
        'live_tables' => $liveTablesCount,
        'local_tables' => $localTblCount,
        'live_images' => $liveImgs,
        'is_connected_to_admin' => $isDynamic
    ];
}

file_put_contents(__DIR__ . '/comparison_audit.json', json_encode($report, JSON_PRETTY_PRINT));
echo "SAVED comparison_audit.json\n";
