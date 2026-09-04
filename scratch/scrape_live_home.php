<?php
$pages = [
    "https://www.sssutms.co.in/Home/IQAC_Cell",
    "https://www.sssutms.co.in/Home/IQAC",
    "https://www.sssutms.co.in/Home/NAAC",
    "https://www.sssutms.co.in/Home/BOG",
    "https://www.sssutms.co.in/Home/BOM",
    "https://www.sssutms.co.in/Home/AcademicCouncil",
    "https://www.sssutms.co.in/Home/About_University",
    "https://www.sssutms.co.in/Home/Authorities",
    "https://www.sssutms.co.in/Home/Governance",
    "https://www.sssutms.co.in/Home/Statutory_Bodies",
];

foreach ($pages as $p) {
    $ch = curl_init($p);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    $res = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    echo "$p => Code $code (" . strlen($res) . " bytes)\n";
    if ($code == 200 && strlen($res) > 2000) {
        $slug = preg_replace('/[^a-zA-Z0-9]/', '_', $p);
        file_put_contents("d:/xampp/htdocs/sssu/satya-sai/scratch/live_{$slug}.html", $res);
    }
}
