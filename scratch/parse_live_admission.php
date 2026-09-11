<?php
$files = [
    'Admission_Enquiry' => __DIR__ . '/scratch/live_admission/Admission_Enquiry.html',
    'AdmissionNotice' => __DIR__ . '/scratch/live_admission/AdmissionNotice.html',
    'AdmissionProcedure' => __DIR__ . '/scratch/live_admission/AdmissionProcedure.html',
    'FeesStructure' => __DIR__ . '/scratch/live_admission/FeesStructure.html',
    'UniversityAccountDetail' => __DIR__ . '/scratch/live_admission/UniversityAccountDetail.html',
    'Brochures' => __DIR__ . '/scratch/live_admission/Brochures.html',
    'AdmissionRegistration' => __DIR__ . '/scratch/live_admission/AdmissionRegistration.html'
];

$summary = [];

foreach ($files as $key => $path) {
    if (!file_exists($path)) continue;
    $html = file_get_contents($path);

    // Extract title
    preg_match('/<title>(.*?)<\/title>/is', $html, $mTitle);
    $title = trim($mTitle[1] ?? '');

    // Extract main-content
    $mainContent = '';
    if (preg_match('/<div class="main-content">(.*?)<\/footer>/is', $html, $mMain)) {
        $mainContent = $mMain[1];
    } elseif (preg_match('/<section[^>]*>(.*?)<\/section>/is', $html, $mMain)) {
        $mainContent = $mMain[0];
    }

    // Strip scripts and styles
    $clean = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', '', $mainContent);
    $clean = preg_replace('/<style\b[^>]*>(.*?)<\/style>/is', '', $clean);

    // Find links to PDFs or files
    preg_match_all('/href="([^"]+\.(?:pdf|docx?|xlsx?))"/i', $clean, $mPdfs);

    // Find images
    preg_match_all('/<img[^>]+src="([^">]+)"/i', $clean, $mImgs);

    // Headings
    preg_match_all('/<h[1-4][^>]*>(.*?)<\/h[1-4]>/is', $clean, $mHeadings);
    $headings = array_map(function($h) { return trim(strip_tags($h)); }, $mHeadings[1] ?? []);

    // Text snippet
    $textOnly = trim(preg_replace('/\s+/', ' ', strip_tags($clean)));
    $textSnippet = substr($textOnly, 0, 400);

    $summary[$key] = [
        'page_title' => $title,
        'headings' => array_values(array_filter($headings)),
        'pdf_links' => array_unique($mPdfs[1] ?? []),
        'images_count' => count($mImgs[1] ?? []),
        'text_snippet' => $textSnippet,
        'raw_clean_preview' => substr($clean, 0, 1500)
    ];
}

file_put_contents('scratch/admission_audit.json', json_encode($summary, JSON_PRETTY_PRINT));
echo "SUCCESS_AUDITED\n";
