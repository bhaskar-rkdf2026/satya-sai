<?php
$pdfNames = [
    'paramedical_notification_11082026_0116.pdf',
    'Whatsapp_Scan_7_August_2026_at_14.01.56_07082026_0206.pdf',
    'Adobe_Scan_24_Jul_2026_24072026_0129.pdf',
    'Adobe_Scan_24_Jul_2026_(1)_24072026_0124.pdf',
    'NOTIFICATION_JUNE_2026_BHMS_2_ND_YEAR_14042026_0307.pdf',
    'imp_notice_09042026_1231.pdf',
    'UTD_NOTIFICATION_12032026_1120.pdf',
    'JUNE26_10032026_0148.pdf',
    'new_updated_12022026_0453.pdf',
    'exam_notification_12022026_1247.pdf',
    'Dec_2025_Ph_D_Admission_Notification_03122025_0400.pdf',
    'Ph.D._Entrance_Exam._2023.pdf',
    'Phd_Entrance_R.pdf',
    'Admission_Entrance_Exam_2021_22.pdf',
    'New_Doc_06-02-2026_14.37_02062026_0434.pdf'
];

foreach ($pdfNames as $name) {
    // Search recursively in assets
    $cmd = 'powershell -Command "Get-ChildItem -Path d:\\xampp\\htdocs\\satya-sai\\assets -Recurse -File -Filter \'' . $name . '\' | Select-Object -ExpandProperty FullName"';
    $res = trim(shell_exec($cmd));
    if (!empty($res)) {
        echo "FOUND: $name => $res\n";
    } else {
        echo "NOT FOUND LOCALLY: $name\n";
    }
}
