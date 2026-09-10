<?php
$pages = [
    'Download/Forms.php',
    'About/ApprovalsAndOrdinances/Approvals.php',
    'About/ApprovalsAndOrdinances/Ordinances.php',
    'Examination/ExamSchedule.php',
    'Academic/NAAC/SSR.php',
    'admin/documents.php',
    'admin/index.php',
    'admin/pages.php'
];

foreach ($pages as $p) {
    $url = 'http://localhost/satya-sai/' . $p;
    $headers = @get_headers($url);
    $status = $headers ? $headers[0] : 'Error';
    echo str_pad($p, 45) . " => " . $status . "\n";
}
