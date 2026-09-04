<?php
// Let's fetch the live IQAC cell page and search for all pdf links
$url = "https://www.sssutms.co.in/Academic/IQACCell";
$html = file_get_contents($url, false, stream_context_create([
    'ssl' => ['verify_peer' => false, 'verify_peer_name' => false],
    'http' => ['user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)']
]));

file_put_contents("d:/xampp/htdocs/sssu/satya-sai/scratch/live_iqac_full.html", $html);
echo "Fetched live IQAC: " . strlen($html) . " bytes\n";

// Let's check other NAAC pages if they exist on live website
$pages = [
    "https://www.sssutms.co.in/Academic/NAAC/CriteriaOne",
    "https://www.sssutms.co.in/Academic/NAAC/CriteriaTwo",
    "https://www.sssutms.co.in/Academic/NAAC/CriteriaThree",
    "https://www.sssutms.co.in/Academic/NAAC/CriteriaFour",
    "https://www.sssutms.co.in/Academic/NAAC/CriteriaFive",
    "https://www.sssutms.co.in/Academic/NAAC/CriteriaSix",
    "https://www.sssutms.co.in/Academic/NAAC/CriteriaSeven",
    "https://www.sssutms.co.in/Academic/NAAC/SSR",
    "https://www.sssutms.co.in/NAAC",
    "https://www.sssutms.co.in/Academic/BOG",
    "https://www.sssutms.co.in/Academic/BOM",
    "https://www.sssutms.co.in/Academic/AcademicCouncil",
];

foreach ($pages as $p) {
    $ch = curl_init($p);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    $res = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $effectiveUrl = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
    curl_close($ch);
    echo "$p => Code $code ($effectiveUrl, " . strlen($res) . " bytes)\n";
    if ($code == 200 && strlen($res) > 2000) {
        $slug = preg_replace('/[^a-zA-Z0-9]/', '_', $p);
        file_put_contents("d:/xampp/htdocs/sssu/satya-sai/scratch/live_{$slug}.html", $res);
    }
}
