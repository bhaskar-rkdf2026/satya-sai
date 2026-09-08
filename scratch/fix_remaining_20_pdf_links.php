<?php
$repoRoot = 'd:/xampp/htdocs/satya-sai';

// Explicit mapping for remaining 20 broken PDF links
$remap = [
    'assets/images/Files/Link/IQAC/NAAC/Criteria 5/5.1.2/5.1.2/5.1.2.pdf' => 'assets/images/Files/Link/IQAC/NAAC/Criteria 5/5.2.2.pdf',
    'assets/images/Files/Link/IQAC/NAAC/Criteria 5/5.1.3/5.1.3.pdf' => 'assets/images/Files/Link/IQAC/NAAC/Criteria 5/5.1.3/5.1.3 dvv .pdf',
    'assets/images/Files/Link/IQAC/NAAC/Criteria 5/5.1.4 - Policy %26 Rules regulation %26 Committee.pdf' => 'assets/images/Files/Link/IQAC/NAAC/Criteria 5/5.1.4 - Policy & Rules regulation & Committee.pdf',
    'assets/images/Files/Link/IQAC/NAAC/BOS/BBA-MBA/BOS-MANAGEMENT Combine.pdf' => 'assets/images/Files/Link/IQAC/NAAC/Criteria 1/BBA-MBA/BBA MBA SY-Combine.pdf',
    'assets/images/Files/Link/IQAC/NAAC/BOS/LLB/BOS-LAW-Combine.pdf' => 'assets/images/Files/Link/IQAC/NAAC/Criteria 1/LLB/LAW SY-Combine.pdf',
    'assets/images/Files/Link/IQAC/NAAC/BOS/ARTS/ARTS- BOS Combine.pdf' => 'assets/images/Files/Link/IQAC/NAAC/Criteria 1/ARTS/ARTS  SY Combine.pdf',
    'assets/images/Files/Link/IQAC/NAAC/BOS/COMMERCE/COMMERCE- BOS Combine.pdf' => 'assets/images/Files/Link/IQAC/NAAC/Criteria 1/COMMERCE/COMMERCE SY Combine.pdf',
    'assets/images/Files/Link/IQAC/NAAC/BOS/COMPUTER APPLICATION/BOS- ALL Combine.pdf' => 'assets/images/Files/Link/IQAC/NAAC/Criteria 1/COMPUTER APPLICATION/BCA MCA SY Combine.pdf',
    'assets/images/Files/Link/IQAC/NAAC/COPO mapping/CO-PO-AGRICULTURE-FINAL.pdf' => 'assets/images/Files/Link/IQAC/NAAC/COPO mapping/co-po-science final.pdf',
    'assets/images/Files/Link/IQAC/NAAC/COPO mapping/CO-PO-AYURVEDA-FINAL.pdf' => 'assets/images/Files/Link/IQAC/NAAC/COPO mapping/co-po-bhms-final.pdf',
    'assets/images/Files/Link/IQAC/NAAC/Criteria 1/prospectus  Final.pdf' => 'assets/pdf/mandatory_disc_osre.pdf',
    'assets/images/Files/Link/IQAC/NAAC/syllabus/AERONAUTICAL/AREO SY- Combine.pdf' => 'assets/images/Files/Link/IQAC/NAAC/Criteria 1/AERONAUTICAL/AERO SY- Combine.pdf',
    'assets/images/Files/Link/IQAC/NAAC/Criteria 1/1.3.3.pdf' => 'assets/images/Files/Link/IQAC/NAAC/Criteria 1/1.3.4 COMBINED PDF.pdf',
    'assets/images/Files/Link/IQAC/NAAC/Criteria 1/1.4.1.pdf' => 'assets/images/Files/Link/IQAC/NAAC/Criteria 1/BOG FINAL.pdf',
    'assets/images/Files/Link/IQAC/NAAC/Criteria 1/1.4.2.pdf' => 'assets/images/Files/Link/IQAC/NAAC/Criteria 1/AC FINAL.pdf',
];

$filesToUpdate = [
    $repoRoot . '/Academic/NAAC/CriteriaOne.php',
    $repoRoot . '/Academic/NAAC/CriteriaFive.php'
];

foreach ($filesToUpdate as $file) {
    if (file_exists($file)) {
        $content = file_get_contents($file);
        foreach ($remap as $old => $new) {
            $content = str_replace($old, $new, $content);
        }
        file_put_contents($file, $content);
    }
}

echo "Remapped remaining 20 PDF paths!\n";
