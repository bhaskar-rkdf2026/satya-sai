<?php
$files = [
    'Download/Syllabus/BHMS.php',
    'Download/Syllabus/BLibISc.php',
    'Download/Syllabus/BScHMCS.php',
    'Download/Syllabus/BScHonsAG.php',
    'Download/Syllabus/Bacheloroflaws_Llb.php',
    'Download/Syllabus/Paramedical.php',
    'Download/Syllabus/Polytechnic_Engineering.php',
    'Download/Syllabus/UTD.php'
];

foreach ($files as $f) {
    echo "==================== $f ====================\n";
    echo file_get_contents($f) . "\n\n";
}
