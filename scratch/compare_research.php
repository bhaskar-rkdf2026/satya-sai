<?php
$pages = [
    'Director_Research_And_Development',
    'RAndDCell',
    'CouncilForResearch',
    'ResearchPromotionPolicy',
    'ConsultancyServices',
    'Patents',
    'CollaborationandMou',
    'Iic_Cell',
    'E-Resources',
    'Exposition',
    'UGAndPGScholarsProject',
    'NPTEL'
];

$results = [];

if (!is_dir(__DIR__ . '/../scratch/live_research')) {
    mkdir(__DIR__ . '/../scratch/live_research', 0777, true);
}

foreach ($pages as $p) {
    $url = 'https://sssutms.co.in/cms/Website/Research/' . $p;
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
    $html = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    file_put_contents(__DIR__ . '/../scratch/live_research/' . $p . '.html', $html);

    // Look for main-content
    $mainContent = '';
    if (preg_match('/<div class=["\']main-content["\']>(.*?)<\/footer>/s', $html, $m)) {
        $mainContent = $m[1];
    } elseif (preg_match('/<section[^>]*>(.*?)<\/section>/s', $html, $m)) {
        $mainContent = $m[1];
    }

    // Extract PDF and external links
    preg_match_all('/<a[^>]+href=["\']([^"\']+)["\'][^>]*>(.*?)<\/a>/si', $mainContent, $linkMatches);
    $links = [];
    for ($i = 0; $i < count($linkMatches[1]); $i++) {
        $href = trim($linkMatches[1][$i]);
        $text = trim(strip_tags($linkMatches[2][$i]));
        if (!empty($text) && !in_array($text, ['Home', 'About', 'Academic', 'Examination', 'Research', 'Admission', 'Download', 'Career', 'Contact', 'ITEP', 'Gallery', 'Entrance Exam Alert', 'Exam Notifications', 'Exam Schedule', 'Results', 'Interface'])) {
            $links[] = [
                'text' => $text,
                'href' => $href,
                'is_pdf' => (bool)preg_match('/\.pdf(\?.*)?$/i', $href)
            ];
        }
    }

    // Extract tables
    preg_match_all('/<table[^>]*>(.*?)<\/table>/si', $mainContent, $tableMatches);
    $tableRowsCount = 0;
    if (!empty($tableMatches[0])) {
        foreach ($tableMatches[0] as $tbl) {
            preg_match_all('/<tr[^>]*>/i', $tbl, $trMatches);
            $tableRowsCount += count($trMatches[0]);
        }
    }

    // Headings
    preg_match_all('/<h[1-4][^>]*>(.*?)<\/h[1-4]>/si', $mainContent, $hMatches);
    $headings = array_values(array_filter(array_map('trim', array_map('strip_tags', $hMatches[1]))));

    // Local file info
    $localFile = __DIR__ . '/../Research/' . $p . '.php';
    $localExists = file_exists($localFile);
    $localContent = $localExists ? file_get_contents($localFile) : '';

    $results[$p] = [
        'url' => $url,
        'http_code' => $httpCode,
        'live_size' => strlen($html),
        'headings' => $headings,
        'tables_count' => count($tableMatches[0]),
        'table_rows' => $tableRowsCount,
        'links' => $links,
        'local_exists' => $localExists,
        'local_size' => strlen($localContent)
    ];
}

file_put_contents(__DIR__ . '/../scratch/research_comparison.json', json_encode($results, JSON_PRETTY_PRINT));
echo "SAVED research_comparison.json SUCCESSFULLY.\n";
