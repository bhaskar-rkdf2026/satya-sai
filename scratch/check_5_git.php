<?php
$files = [
    'Download/Syllabus/BLibISc.php',
    'Download/Syllabus/BScHMCS.php',
    'Download/Syllabus/BScHonsAG.php',
    'Download/Syllabus/Bacheloroflaws_Llb.php',
    'Download/Syllabus/Paramedical.php'
];

foreach ($files as $f) {
    echo "==================================== $f ====================================\n";
    $cmd = "git show HEAD:$f";
    exec($cmd, $out);
    preg_match_all('/href=[\'"]([^\'"]+)[\'"]/i', implode("\n", $out), $matches);
    foreach ($matches[1] as $m) {
        echo "  - $m\n";
    }
    $out = [];
}
