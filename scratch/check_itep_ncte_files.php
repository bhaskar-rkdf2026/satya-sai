<?php
$root = realpath(__DIR__ . '/..');
$files = [
    'assets/pdf/intake.pdf',
    'assets/pdf/BABED_ITEP_STAFF_LIST_2026_final_19052026_0207.pdf',
    'assets/pdf/BABED_ITEP_STAFF_LIST_2026_final_-_join_last_quterly_23052026_1116.xlsx',
    'assets/pdf/students_list__22052026_0410.pdf',
    'assets/pdf/fee_structure.pdf',
    'assets/pdf/NCTE_Regulation_2014_Clouse_7_14_F_infra_.pdf',
    'assets/pdf/Library_Information_18052026_0134.pdf',
    'assets/pdf/Affidavit__22052026_0411.pdf',
    'assets/pdf/mandatory_disc_osre.pdf',
    'assets/pdf/audit_report.pdf'
];

foreach ($files as $f) {
    $p = $root . '/' . $f;
    echo $f . " -> " . (file_exists($p) ? "EXISTS (" . filesize($p) . " bytes)" : "MISSING") . "\n";
}
