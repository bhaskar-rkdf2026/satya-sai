<?php
$files = [
    'BHMS' => 'Download/Syllabus/BHMS.php',
    'BLibISc' => 'Download/Syllabus/BLibISc.php',
    'BScHMCS' => 'Download/Syllabus/BScHMCS.php',
    'BScHonsAG' => 'Download/Syllabus/BScHonsAG.php',
    'Bacheloroflaws_Llb' => 'Download/Syllabus/Bacheloroflaws_Llb.php',
    'Paramedical' => 'Download/Syllabus/Paramedical.php',
    'Polytechnic_Engineering' => 'Download/Syllabus/Polytechnic_Engineering.php',
    'UTD' => 'Download/Syllabus/UTD.php'
];

foreach ($files as $name => $path) {
    echo "========================================\n";
    echo "PAGE: $name ($path)\n";
    echo "========================================\n";
    $content = file_get_contents($path);
    
    // Find all tables
    preg_match_all('/<table[^>]*>(.*?)<\/table>/is', $content, $tables);
    echo "Total tables: " . count($tables[0]) . "\n";
    
    foreach ($tables[0] as $idx => $t) {
        echo "--- Table " . ($idx + 1) . " ---\n";
        preg_match_all('/<tr[^>]*>(.*?)<\/tr>/is', $t, $rows);
        foreach ($rows[0] as $r) {
            preg_match_all('/<t[dh][^>]*>(.*?)<\/t[dh]>/is', $r, $cells);
            $c_texts = [];
            foreach ($cells[1] as $c) {
                $c_clean = trim(preg_replace('/\s+/', ' ', strip_tags($c)));
                // Also check if link inside
                if (preg_match('/href=[\'"]([^\'"]+)[\'"]/i', $c, $lm)) {
                    $c_clean .= " [LINK: " . basename($lm[1]) . "]";
                }
                $c_texts[] = $c_clean;
            }
            echo "  ROW: " . implode(" | ", $c_texts) . "\n";
        }
    }
    echo "\n";
}
