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

$missing = [];
$found = [];

foreach ($files as $f) {
    echo "======================================================================\n";
    echo "FILE: $f\n";
    echo "======================================================================\n";
    $content = file_get_contents($f);
    
    preg_match_all('/(href=[\'"]([^\'"]+)[\'"]|base_url\([\'"]([^\'"]+)[\'"]\))/i', $content, $matches);
    
    $raw_urls = [];
    foreach ($matches[2] as $u) { if ($u) $raw_urls[] = $u; }
    foreach ($matches[3] as $u) { if ($u) $raw_urls[] = $u; }
    $raw_urls = array_unique($raw_urls);
    
    foreach ($raw_urls as $u) {
        if ($u === '#' || strpos($u, 'javascript') !== false) continue;
        
        // Convert to local relative path
        $clean = preg_replace('#^https?://[^/]+/cms/Areas/Website/#i', '', $u);
        $clean = preg_replace('#^<\?php\s+echo\s+BASE_URL;\s*\?>#i', '', $clean);
        $clean = ltrim($clean, '/');
        
        // If it starts with assets/
        $candidates = [
            __DIR__ . '/../' . $clean,
            __DIR__ . '/../assets/images/' . $clean,
            __DIR__ . '/../assets/images/Files/Link/' . basename($clean),
            __DIR__ . '/../assets/images/Files/Link/SYLLABUS/' . basename($clean),
            __DIR__ . '/../assets/images/Files/Link/SYLLABUS2021/' . basename($clean),
            __DIR__ . '/../assets/images/Files/Link/UTD Syllabus/' . basename($clean),
            __DIR__ . '/../assets/images/Files/Link/NEP/' . basename($clean),
            __DIR__ . '/../assets/images/Files/Link/SYLLABUS/NEP/' . basename($clean),
        ];
        
        $local_found = null;
        foreach ($candidates as $cand) {
            if (file_exists($cand)) {
                $local_found = str_replace('\\', '/', substr(realpath($cand), strlen(realpath(__DIR__ . '/../')) + 1));
                break;
            }
        }
        
        if ($local_found) {
            echo "  [FOUND] $u\n          -> $local_found\n";
            $found[] = ['orig' => $u, 'local' => $local_found];
        } else {
            echo "  [MISSING] $u (Clean: $clean)\n";
            $missing[] = ['file' => $f, 'url' => $u, 'clean' => $clean];
        }
    }
}

echo "\n==================== SUMMARY ====================\n";
echo "Found: " . count($found) . "\n";
echo "Missing: " . count($missing) . "\n";
if (!empty($missing)) {
    echo "Missing list:\n";
    foreach ($missing as $m) {
        echo "  - [" . basename($m['file']) . "] " . $m['url'] . "\n";
    }
}
