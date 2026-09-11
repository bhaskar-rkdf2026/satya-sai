<?php
$pages = ['AdmissionProcedure', 'AdmissionNotice', 'Brochures'];
foreach ($pages as $p) {
    $c = file_get_contents("scratch/scratch/live_admission/$p.html");
    echo "$p has <article>: " . (strpos($c, '<article') !== false ? 'YES' : 'NO') . "\n";
    echo "$p has </article>: " . (strpos($c, '</article>') !== false ? 'YES' : 'NO') . "\n";
    if (strpos($c, '<article') !== false) {
        $pos1 = strpos($c, '<article');
        $pos2 = strpos($c, '</article>');
        echo " - len between: " . ($pos2 - $pos1) . "\n";
    }
}
