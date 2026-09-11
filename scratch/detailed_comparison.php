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

$summary = [];

foreach ($pages as $p) {
    $htmlFile = __DIR__ . '/live_research/' . $p . '.html';
    $html = file_exists($htmlFile) ? file_get_contents($htmlFile) : '';

    // Extract central content area
    // The live site wraps subpage main content in <div class="col-lg-9"> or similar, before sidebar
    $contentArea = '';
    if (preg_match('/<div class="col-lg-9">(.*?)<\/div>\s*<!-- Sidebar Widget -->/s', $html, $m)) {
        $contentArea = $m[1];
    } elseif (preg_match('/<section class="py-5 bg-light">\s*<div class="row g-4 px-3">\s*<div class="col-lg-9">(.*?)<\/div>\s*<div class="col-lg-3">/s', $html, $m)) {
        $contentArea = $m[1];
    } else {
        // fallback
        if (preg_match('/<div class="main-content">(.*?)<\/footer>/s', $html, $m)) {
            $contentArea = $m[1];
        }
    }

    // Extract all PDF links
    preg_match_all('/<a[^>]+href=["\']([^"\']+\.pdf[^"\']*)["\'][^>]*>(.*?)<\/a>/si', $contentArea, $pdfMatches);
    $pdfs = [];
    for ($i = 0; $i < count($pdfMatches[1]); $i++) {
        $pdfs[] = [
            'title' => trim(strip_tags($pdfMatches[2][$i])),
            'url' => trim($pdfMatches[1][$i])
        ];
    }

    // Extract all other non-nav links
    preg_match_all('/<a[^>]+href=["\']([^"\']+)["\'][^>]*>(.*?)<\/a>/si', $contentArea, $otherLinks);
    $actionLinks = [];
    for ($i = 0; $i < count($otherLinks[1]); $i++) {
        $href = trim($otherLinks[1][$i]);
        $text = trim(strip_tags($otherLinks[2][$i]));
        if (!preg_match('/\.pdf/i', $href) && !empty($text) && !in_array($text, ['Home', 'Research', 'About', 'Contact'])) {
            $actionLinks[] = ['text' => $text, 'href' => $href];
        }
    }

    // Extract images
    preg_match_all('/<img[^>]+src=["\']([^"\']+)["\'][^>]*>/si', $contentArea, $imgMatches);
    $images = array_map('trim', $imgMatches[1]);

    // Extract tables
    preg_match_all('/<table[^>]*>(.*?)<\/table>/si', $contentArea, $tbls);
    $tables = [];
    foreach ($tbls[0] as $t) {
        preg_match_all('/<tr[^>]*>(.*?)<\/tr>/si', $t, $trs);
        $rows = [];
        foreach ($trs[0] as $r) {
            preg_match_all('/<(td|th)[^>]*>(.*?)<\/(td|th)>/si', $r, $cells);
            $rows[] = array_map('trim', array_map('strip_tags', $cells[2]));
        }
        $tables[] = [
            'total_rows' => count($rows),
            'sample_headers' => $rows[0] ?? []
        ];
    }

    // Clean plain text summary
    $cleanText = trim(strip_tags($contentArea));
    $cleanText = preg_replace('/\s+/', ' ', $cleanText);

    // Local file
    $localFile = __DIR__ . '/../Research/' . $p . '.php';
    $localExists = file_exists($localFile);
    $localCode = $localExists ? file_get_contents($localFile) : '';

    $summary[$p] = [
        'page' => $p,
        'live_text_length' => strlen($cleanText),
        'live_text_preview' => substr($cleanText, 0, 300),
        'live_pdfs' => $pdfs,
        'live_links' => $actionLinks,
        'live_images' => $images,
        'live_tables' => $tables,
        'local_exists' => $localExists,
        'local_size' => strlen($localCode)
    ];
}

file_put_contents(__DIR__ . '/detailed_research_comparison.json', json_encode($summary, JSON_PRETTY_PRINT));
echo "SAVED detailed_research_comparison.json\n";
