<?php
$repoRoot = 'd:/xampp/htdocs/satya-sai';
$criteriaOnePath = $repoRoot . '/Academic/NAAC/CriteriaOne.php';

$remap = [
    'assets/images/Files/Link/IQAC/NAAC/Criteria 1/LLB/LAW SY-Combine.pdf' => 'assets/images/Files/Link/IQAC/NAAC/Criteria 1/LLB/LLB SY-Combine.pdf',
    'assets/images/Files/Link/IQAC/NAAC/Criteria 1/ARTS/ARTS  SY Combine.pdf' => 'assets/images/Files/Link/IQAC/NAAC/Criteria 1/ARTS/ARTS SY- Combine (1) - Copy.pdf',
    'assets/images/Files/Link/IQAC/NAAC/Criteria 1/COMMERCE/COMMERCE SY Combine.pdf' => 'assets/images/Files/Link/IQAC/NAAC/Criteria 1/COMMERCE/edited pdf commerce.pdf',
    'assets/images/Files/Link/IQAC/NAAC/Criteria 1/COMPUTER APPLICATION/BCA MCA SY Combine.pdf' => 'assets/images/Files/Link/IQAC/NAAC/Criteria 1/COMPUTER APPLICATION/mca Combine.pdf',
    'assets/images/Files/Link/IQAC/NAAC/Criteria 1/AERONAUTICAL/AERO SY- Combine.pdf' => 'assets/images/Files/Link/IQAC/NAAC/Criteria 1/AERONAUTICAL/AREO SY- Combine FINAL.pdf',
];

if (file_exists($criteriaOnePath)) {
    $content = file_get_contents($criteriaOnePath);
    foreach ($remap as $old => $new) {
        $content = str_replace($old, $new, $content);
    }
    file_put_contents($criteriaOnePath, $content);
}

echo "Fixed final 9 PDF links in CriteriaOne.php!\n";
