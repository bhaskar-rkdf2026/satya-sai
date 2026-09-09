<?php
$files = [
    'Download/Syllabus/BHMS.php',
    'Download/Syllabus/BLibISc.php',
    'Download/Syllabus/BScHMCS.php',
    'Download/Syllabus/BScHonsAG.php',
    'Download/Syllabus/Bacheloroflaws_Llb.php',
    'Download/Syllabus/Paramedical.php',
    'Download/Syllabus/Polytechnic_Engineering.php',
    'Download/Syllabus/UTD.php',
    'Download/Syllabus/Announcements.php',
    'Download/Syllabus/EVENTS.php'
];

foreach ($files as $f) {
    echo "==================================== $f ====================================\n";
    if (file_exists($f)) {
        $content = file_get_contents($f);
        echo substr($content, 0, 1000) . "\n...\n";
    }
}
