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

foreach ($files as $name => $path) {
    if (!file_exists($path)) {
        echo "$name: NOT FOUND\n";
        continue;
    }
    $content = file_get_contents($path);
    
    // Find <div class="card-body" or <article or main-content
    $article = '';
    if (preg_match('/<article[^>]*>(.*?)<\/article>/is', $content, $m)) {
        $article = $m[1];
    } elseif (preg_match('/<div class="card-body[^"]*">(.*?)<\/div>\s*<\/div>/is', $content, $m)) {
        $article = $m[1];
    } elseif (preg_match('/<div class="main-content">(.*?)<\/footer>/is', $content, $m)) {
        $article = $m[1];
    }
    
    // Check for tables
    preg_match_all('/<table\b[^>]*>(.*?)<\/table>/is', $article, $tables);
    // Check for pdfs
    preg_match_all('/href="([^"]+\.pdf[^"]*)"/i', $content, $pdfs);
    // Check for images
    preg_match_all('/<img[^>]+src="([^">]+)"/i', $article, $imgs);
    
    // Strip base64 image data from text preview
    $cleanArticle = preg_replace('/src="data:image\/[^;]+;base64,[^"]+"/', 'src="[BASE64_IMAGE]"', $article);
    $text = trim(preg_replace('/\s+/', ' ', strip_tags($cleanArticle)));
    
    echo "==============================\n";
    echo "PAGE: $name\n";
    echo "PDFs found: " . implode(', ', array_unique($pdfs[1])) . "\n";
    echo "Images count: " . count($imgs[1]) . "\n";
    if (count($imgs[1]) > 0) {
        foreach (array_slice($imgs[1], 0, 3) as $img) {
            echo " - Img: " . (strlen($img) > 80 ? substr($img, 0, 50) . '...[base64 len ' . strlen($img) . ']' : $img) . "\n";
        }
    }
    echo "Tables count: " . count($tables[0]) . "\n";
    echo "Text preview: " . substr($text, 0, 300) . "\n";
}
