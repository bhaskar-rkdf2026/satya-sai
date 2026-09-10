<?php
$root = realpath(__DIR__ . '/..');
$links = [
    'About/ApprovalsAndOrdinances/Approvals.php',
    'About/ApprovalsAndOrdinances/PublicSelfDisclosure.php',
    'Admission/UniversityAccountDetail.php',
    'Examination/Interface.php',
    'Career/index.php',
    'Examination/Results.php',
    'Research/NIRF.php',
    'Download/NBADCS.php',
    'erp-login.php',
    'verify-marksheet.php',
    'Admission/AdmissionRegistration.php',
    'Download/Forms.php',
    'Download/Alumni.php',
    'Academic/Committee/GrievanceRedressal.php'
];

foreach ($links as $l) {
    $p = $root . '/' . $l;
    echo $l . ' -> ' . (file_exists($p) ? 'OK' : 'MISSING') . "\n";
    if (!file_exists($p)) {
        // search for file by basename
        $base = basename($l);
        $rii = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($root));
        foreach ($rii as $f) {
            if ($f->getFilename() === $base) {
                echo "   Found at: " . str_replace($root . DIRECTORY_SEPARATOR, '', $f->getPathname()) . "\n";
            }
        }
    }
}
