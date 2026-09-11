<?php
$pages = [
    'AdmissionNotice' => 'scratch/scratch/live_admission/AdmissionNotice.html',
    'Brochures' => 'scratch/scratch/live_admission/Brochures.html',
    'AdmissionRegistration' => 'scratch/scratch/live_admission/AdmissionRegistration.html'
];

foreach ($pages as $title => $file) {
    echo "\n=== $title ===\n";
    $c = file_get_contents($file);
    // Find card-header or h2
    preg_match_all('/<h[1-4][^>]*>(.*?)<\/h[1-4]>/is', $c, $headings);
    foreach ($headings[1] as $h) {
        echo "Heading: " . trim(strip_tags($h)) . "\n";
    }
    
    // Find all <a> tags with href
    preg_match_all('/<a[^>]+href="([^"]+)"[^>]*>(.*?)<\/a>/is', $c, $links, PREG_SET_ORDER);
    echo "Links count: " . count($links) . "\n";
    foreach ($links as $l) {
        if (strpos($l[1], '.pdf') !== false || strpos($l[1], 'Registration') !== false || strpos($l[1], 'ojdZa') !== false) {
            echo " - Target: " . $l[1] . " | Text: " . trim(strip_tags($l[2])) . "\n";
        }
    }
    
    // Check for images
    preg_match_all('/<img[^>]+src="([^"]+)"[^>]*>/is', $c, $imgs);
    echo "Images count: " . count($imgs[1]) . "\n";
    foreach ($imgs[1] as $src) {
        if (strpos($src, 'logo') === false && strpos($src, 'icon') === false) {
            echo " - Img: " . substr($src, 0, 80) . "\n";
        }
    }
}
