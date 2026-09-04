<?php
$files = [
    'd:/xampp/htdocs/sssu/satya-sai/assets/pdf/MAIN_19112025_0435.pdf',
    'd:/xampp/htdocs/sssu/satya-sai/assets/pdf/NEP_2020_27_university_14-compressed.pdf',
    'd:/xampp/htdocs/sssu/satya-sai/assets/pdf/Final_Regulations_admission_04022026_0252.pdf',
    'd:/xampp/htdocs/sssu/satya-sai/assets/pdf/Fees_Refund_Policy_04012025_0322.pdf',
    'd:/xampp/htdocs/sssu/satya-sai/assets/pdf/INTERNATIONAL_ADMISSION_05_07122024_0637.pdf',
    'd:/xampp/htdocs/sssu/satya-sai/assets/pdf/Strategic_Vision_07122024_0233.pdf'
];
foreach($files as $f) {
    echo basename($f) . ': ' . (file_exists($f) ? 'EXISTS (' . filesize($f) . ' bytes)' : 'MISSING') . "\n";
}
