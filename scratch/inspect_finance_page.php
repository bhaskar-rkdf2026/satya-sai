<?php
$html = file_get_contents("https://sssutms.co.in/cms/Website/About/UniversityOfficials/Finance_Officer");
if ($html === false) {
    echo "Failed to load live page\n";
    exit;
}

// Find all img tags in the page
preg_match_all('/<img[^>]+src=["\']([^"\']+)["\'][^>]*>/i', $html, $matches);
foreach ($matches[0] as $i => $imgTag) {
    $src = $matches[1][$i];
    if (strpos($src, 'data:image') === 0) {
        echo "IMG " . ($i+1) . ": Base64 Image (length: " . strlen($src) . ")\n";
        echo "Tag: " . substr($imgTag, 0, 150) . "...\n\n";
    } else {
        echo "IMG " . ($i+1) . ": " . $src . "\n";
        echo "Tag: " . $imgTag . "\n\n";
    }
}

// Let's also print the structure/surrounding HTML around the image
if (preg_match('/<div[^>]*class=["\'][^"\']*content[^"\']*["\'][^>]*>(.*?)<\/div>/is', $html, $m)) {
    echo "Content snippet:\n" . substr(strip_tags($m[0], '<img><p><div><h2><h3><h4><h5><h6><br><strong>'), 0, 1000) . "\n";
}
