<?php
$urls = [
    'http://localhost/satya-sai/Download/OutcomeBasedCurriculum/Engineering.php',
    'http://localhost/satya-sai/Download/Scheme/BE.php',
    'http://localhost/satya-sai/Download/Syllabus/BE.php',
    'http://localhost/satya-sai/Download/Forms.php',
    'http://localhost/satya-sai/Download/NotificationOfPhdAward.php',
    'http://localhost/satya-sai/Download/E-Content.php'
];

foreach ($urls as $u) {
    $h = @get_headers($u);
    echo basename($u) . ' => ' . ($h ? $h[0] : 'Failed') . "\n";
}
