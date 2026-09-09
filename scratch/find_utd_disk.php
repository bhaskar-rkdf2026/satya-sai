<?php
$needles = [
    'MSc Botany 1 Semester 22 SY',
    'M.Sc. Chemistry',
    'PHY I SEM',
    'Microbiology',
    'Zoology',
    'msc cs 1st sem',
    'BA 1 ST SEM Mjr',
    'NEP_Major_BA_I_R',
    'B.COM IST SEM MAJOR',
    'NEP_Major_BCOM_I_R',
    'major i sem',
    'NEP_Major_BSC_I_R',
    'MAJOR BCA I Sem Syllabus',
    'NEP_Major_BCA_I_R'
];

foreach ($needles as $n) {
    echo "=== Searching for: $n ===\n";
    $cmd = 'dir /s /b "d:\\xampp\\htdocs\\satya-sai\\assets\\images\\*' . $n . '*"';
    exec($cmd, $out);
    foreach ($out as $line) {
        echo "  " . str_replace('d:\\xampp\\htdocs\\satya-sai\\', '', $line) . "\n";
    }
    $out = [];
}
