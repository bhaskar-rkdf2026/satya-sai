<?php
$live_url = 'https://sssutms.co.in/cms/Website/Download/Scheme/Pharmacy';
$html = file_get_contents($live_url);

if ($html) {
    echo "Fetched " . strlen($html) . " bytes from live Pharmacy page.\n";
    // Let's strip script and style tags to see text structure
    $clean = preg_replace('/<(script|style)[^>]*?>.*?<\/\\1>/si', '', $html);
    file_put_contents(__DIR__ . '/live_pharmacy.html', $html);
    echo "Saved to scratch/live_pharmacy.html\n";
} else {
    echo "Failed to fetch live pharmacy.\n";
}
