<?php
$testUrl = 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Dec_2025_Ph_D_Admission_Notification_03122025_0400.pdf';
$ctx = stream_context_create([
    'http' => [
        'timeout' => 15,
        'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)'
    ],
    'ssl' => [
        'verify_peer' => false,
        'verify_peer_name' => false
    ]
]);

$content = @file_get_contents($testUrl, false, $ctx);
if ($content !== false && strlen($content) > 100) {
    echo "SUCCESS: Downloaded " . strlen($content) . " bytes from live server!\n";
} else {
    echo "FAILED to download from $testUrl\n";
}
