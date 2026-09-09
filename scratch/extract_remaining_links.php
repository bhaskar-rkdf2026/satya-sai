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
    echo "======================================================================\n";
    echo "FILE: $f\n";
    echo "======================================================================\n";
    $content = file_get_contents($f);
    
    // Extract links
    preg_match_all('/<a\s+[^>]*href=[\'"]([^\'"]+)[\'"][^>]*>(.*?)<\/a>/is', $content, $matches);
    for ($i = 0; $i < count($matches[0]); $i++) {
        $href = $matches[1][$i];
        $text = strip_tags($matches[2][$i]);
        $text = trim(preg_replace('/\s+/', ' ', $text));
        echo "  - Link: \"$text\" => $href\n";
    }
    echo "\n";
}
