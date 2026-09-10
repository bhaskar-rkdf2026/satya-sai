<?php
$base = 'd:/xampp/htdocs/satya-sai';
require 'scratch/count_pages.php';

$subfolderStats = [];
$pdfReferences = [];
$contentTypes = [
    'has_pdf_links' => 0,
    'has_table' => 0,
    'has_text_content' => 0,
    'has_images' => 0
];

$pagePdfMap = [];

foreach ($partially_dynamic as $p) {
    $fullPath = $base . '/' . $p;
    $content = file_get_contents($fullPath);
    $parts = explode('/', $p);
    $folder = $parts[0];
    
    if (!isset($subfolderStats[$folder])) {
        $subfolderStats[$folder] = [
            'count' => 0,
            'pages' => [],
            'pdfs' => 0
        ];
    }
    
    $subfolderStats[$folder]['count']++;
    $subfolderStats[$folder]['pages'][] = $p;
    
    // Find all PDF links
    preg_match_all('/(?:href|src)=["\']([^"\']+\.pdf)["\']/i', $content, $pdfMatches);
    $pdfsInPage = array_unique($pdfMatches[1] ?? []);
    
    if (!empty($pdfsInPage)) {
        $contentTypes['has_pdf_links']++;
        $subfolderStats[$folder]['pdfs'] += count($pdfsInPage);
        $pagePdfMap[$p] = $pdfsInPage;
    }
    
    if (strpos($content, '<table') !== false) {
        $contentTypes['has_table']++;
    }
    if (strpos($content, '<img') !== false) {
        $contentTypes['has_images']++;
    }
}

echo "=== BREAKDOWN OF 227 PARTIALLY DYNAMIC PAGES BY FOLDER ===\n\n";
foreach ($subfolderStats as $f => $data) {
    echo "Folder: " . str_pad($f, 15) . " | Pages: " . str_pad($data['count'], 4) . " | PDF References: " . $data['pdfs'] . "\n";
}

echo "\n=== CONTENT TYPE ANALYSIS ===\n";
echo "Pages with PDF Links: " . $contentTypes['has_pdf_links'] . "\n";
echo "Pages with HTML Tables: " . $contentTypes['has_table'] . "\n";
echo "Pages with Images: " . $contentTypes['has_images'] . "\n";

echo "\n=== SAMPLE PAGES WITH PDF LINKS (Top 10) ===\n";
$i = 0;
foreach ($pagePdfMap as $page => $pdfs) {
    echo "Page: $page (" . count($pdfs) . " PDFs)\n";
    foreach (array_slice($pdfs, 0, 3) as $pdf) {
        echo "   - $pdf\n";
    }
    if (++$i >= 10) break;
}
