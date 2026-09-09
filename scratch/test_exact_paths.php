<?php
$links = [
    'assets/images/Files/Link/SYLLABUS/BLIB_MLIB SYL/BLISISYLL.pdf',
    'assets/images/Files/Link/SYLLABUS/BLIB_MLIB SYL/BLISIISYL.pdf',
    'assets/images/Files/Link/SYLLABUS/BSc HSCS _Syllabus_I_Sem_F.pdf',
    'assets/images/Files/Link/SYLLABUS/BSc HSCS _Syllabus_II_Sem_F.pdf',
    'assets/images/Files/Link/SYLLABUS/BSc HSCS _Syllabus_III_Sem_F.pdf',
    'assets/images/Files/Link/SYLLABUS/BSc HSCS _Syllabus_IV_Sem_F.pdf',
    'assets/images/Files/Link/SYLLABUS/BSc HSCS _Syllabus_V_Sem_F.pdf',
    'assets/images/Files/Link/SYLLABUS/BSc HSCS _Syllabus_VI_Sem_F.pdf',
    'assets/images/Files/Link/SYLLABUS/BSCAG/I_Sem_Fifth_Dean_Syllabus.pdf',
    'assets/images/Files/Link/SYLLABUS/BSC(AG)In.pdf',
    'assets/images/Files/Link/SYLLABUS/BSCAG/II_Sem_Fifth_Dean_Syllabus.pdf',
    'assets/images/Files/Link/SYLLABUS/BSC(AG)II.pdf',
    'assets/images/Files/Link/SYLLABUS/BSCAG/III_Sem_Fifth_Dean_Syllabus.pdf',
    'assets/images/Files/Link/SCHEMES/BSCAG/SYBAG_IIIrr.pdf',
    'assets/images/Files/Link/SYLLABUS/BSCAG/IV_Sem_Fifth_Dean_Syllabus.pdf',
    'assets/images/Files/Link/SYLLABUS/syllsbus_iv_sem/BSC_AG_IV.pdf',
    'assets/images/Files/Link/SYLLABUS/BSCAG/V_Sem_Fifth_Dean_Syllabus.pdf',
    'assets/images/Files/Link/SYLLABUS/SYBAG_V.pdf',
    'assets/images/Files/Link/SYLLABUS/BSCAG/VI_Sem_Fifth_Dean_Syllabus.pdf',
    'assets/images/Files/Link/SYLLABUS/SYBAG_VI.pdf',
    'assets/images/Files/Link/SYLLABUS/BSCAG/VII_Sem_Fifth_Dean_Syllabus.pdf',
    'assets/images/Files/Link/SYLLABUS/SYBSc(Agri)_7th_ semN-CBCS.pdf',
    'assets/images/Files/Link/SYLLABUS/BSCAG/VIII_Sem_Fifth_Dean_Syllabus.pdf',
    'assets/images/Files/Link/SYLLABUS/SYAScAg_NonCBCS_8.pdf',
    'assets/images/Files/Link/SYLLABUS/LLB/LL.B 1SEM SYLLABUS.pdf',
    'assets/images/Files/Link/LLB/NEW 2026/LL.B. 2nd sem syllabus (New).pdf',
    'assets/images/Files/Link/3_semester_syllabus_09072026_0229.pdf',
    'assets/images/Files/Link/BALLB/1 sem.pdf',
    'assets/images/Files/Link/BALLB/2 sem.pdf',
    'assets/images/Files/Link/SYLLABUS/LLB/LLB_IYEAR.pdf',
    'assets/images/Files/Link/SYLLABUS/LLB/LLB_IIYEAR.pdf',
    'assets/images/Files/Link/SYLLABUS/LLB/SYLLB_IIIRD YEAR DETAILED  SYLLABUS.pdf',
    'assets/images/Files/Link/SYLLABUS/PARAMEDICAL/First Year 2016-17 (2).zip',
    'assets/images/Files/Link/SYLLABUS/PARAMEDICAL/Syllabus Dialysis_I_II_Year.zip'
];

$all_found = true;
foreach ($links as $l) {
    $path = __DIR__ . '/../' . $l;
    if (file_exists($path)) {
        echo "  [OK] $l (" . number_format(filesize($path)/1024, 1) . " KB)\n";
    } else {
        echo "  [MISSING] $l\n";
        $all_found = false;
    }
}

if ($all_found) {
    echo "\nALL 34 DISK PATHS ARE 100% VALID AND PRESENT!\n";
}
