<?php
require_once __DIR__ . '/../config.php';

$allDocs = get_all_document_pages();
echo "Total registered collections: " . count($allDocs) . "\n\n";

$bySec = [];
foreach ($allDocs as $key => $col) {
    $sec = $col['section'] ?? 'Other';
    if (!isset($bySec[$sec])) $bySec[$sec] = [];
    $bySec[$sec][] = "$key (" . count($col['documents']) . " docs)";
}

foreach ($bySec as $sec => $items) {
    echo "=== SECTION: $sec (" . count($items) . " pages) ===\n";
    foreach ($items as $it) {
        echo "  - $it\n";
    }
    echo "\n";
}
