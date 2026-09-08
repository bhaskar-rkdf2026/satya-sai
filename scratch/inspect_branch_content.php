<?php
// Inspect differences in structure / lines between main and origin/UI-Change-Ayush for key modules
$files = [
    'Examination/ExamSchedule.php',
    'Examination/Results.php',
    'Research/Patents.php',
    'Research/NIRF.php',
    'Download/Scheme/BE.php',
    'Galleries/ImageGallery/1.php',
    'contact.php',
    'gallery.php'
];

foreach ($files as $f) {
    echo "=== File: $f ===\n";
    $cmd = "git show origin/UI-Change-Ayush:\"$f\"";
    $content = shell_exec($cmd);
    if ($content) {
        $lines = explode("\n", $content);
        echo "Line count in UI-Change-Ayush: " . count($lines) . "\n";
        echo "First 10 lines:\n" . implode("\n", array_slice($lines, 0, 10)) . "\n";
    } else {
        echo "File not found in UI-Change-Ayush!\n";
    }
    echo "----------------------------------------\n";
}
