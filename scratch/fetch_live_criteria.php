<?php
$pages = [
    "CriteriaOne" => "https://sssutms.co.in/cms/Website/Academic/NAAC/CriteriaOne.html",
    "CriteriaTwo" => "https://sssutms.co.in/cms/Website/Academic/NAAC/CriteriaTwo.html",
    "CriteriaThree" => "https://sssutms.co.in/cms/Website/Academic/NAAC/CriteriaThree.html",
    "CriteriaFour" => "https://sssutms.co.in/cms/Website/Academic/NAAC/CriteriaFour.html",
    "CriteriaFive" => "https://sssutms.co.in/cms/Website/Academic/NAAC/CriteriaFive.html",
    "CriteriaSix" => "https://sssutms.co.in/cms/Website/Academic/NAAC/CriteriaSix.html",
    "CriteriaSeven" => "https://sssutms.co.in/cms/Website/Academic/NAAC/CriteriaSeven.html",
    "SSR" => "https://sssutms.co.in/cms/Website/Academic/NAAC/SSR.html",
    "IQACCell" => "https://sssutms.co.in/cms/Website/Academic/IQACCell.html"
];

foreach ($pages as $name => $url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64)");
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);
    $html = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    echo "Fetched $name (HTTP $httpCode, " . strlen($html) . " bytes)\n";
    if ($httpCode == 200 && strlen($html) > 500) {
        file_put_contents("d:/xampp/htdocs/sssu/satya-sai/scratch/live_{$name}.html", $html);
    }
}
