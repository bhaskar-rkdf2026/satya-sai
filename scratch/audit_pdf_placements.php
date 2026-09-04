<?php

$baseDir = 'd:/xampp/htdocs/sssu/satya-sai';

$pages = [
    'CriteriaOne' => [
        'php' => "$baseDir/Academic/NAAC/CriteriaOne.php",
        'html' => "$baseDir/assets/images/sssutms.co.in/cms/Website/Academic/NAAC/CriteriaOne.html"
    ],
    'CriteriaTwo' => [
        'php' => "$baseDir/Academic/NAAC/CriteriaTwo.php",
        'html' => "$baseDir/assets/images/sssutms.co.in/cms/Website/Academic/NAAC/CriteriaTwo.html"
    ],
    'CriteriaThree' => [
        'php' => "$baseDir/Academic/NAAC/CriteriaThree.php",
        'html' => "$baseDir/assets/images/sssutms.co.in/cms/Website/Academic/NAAC/CriteriaThree.html"
    ],
    'CriteriaFour' => [
        'php' => "$baseDir/Academic/NAAC/CriteriaFour.php",
        'html' => "$baseDir/assets/images/sssutms.co.in/cms/Website/Academic/NAAC/CriteriaFour.html"
    ],
    'CriteriaFive' => [
        'php' => "$baseDir/Academic/NAAC/CriteriaFive.php",
        'html' => "$baseDir/assets/images/sssutms.co.in/cms/Website/Academic/NAAC/CriteriaFive.html"
    ],
    'CriteriaSix' => [
        'php' => "$baseDir/Academic/NAAC/CriteriaSix.php",
        'html' => "$baseDir/assets/images/sssutms.co.in/cms/Website/Academic/NAAC/CriteriaSix.html"
    ],
    'CriteriaSeven' => [
        'php' => "$baseDir/Academic/NAAC/CriteriaSeven.php",
        'html' => "$baseDir/assets/images/sssutms.co.in/cms/Website/Academic/NAAC/CriteriaSeven.html"
    ]
];

function extractPdfLinksFromHtml($filePath) {
    if (!file_exists($filePath)) return [];
    $dom = new DOMDocument();
    @$dom->loadHTML(file_get_contents($filePath));
    $xpath = new DOMXPath($dom);
    $nodes = $xpath->query('//a[@href]');
    $list = [];
    foreach ($nodes as $a) {
        $href = trim($a->getAttribute('href'));
        if (stripos($href, '.pdf') !== false) {
            $tr = $a;
            while ($tr && strtolower($tr->nodeName) !== 'tr') {
                $tr = $tr->parentNode;
            }
            $context = '';
            if ($tr) {
                $tds = $tr->getElementsByTagName('td');
                $texts = [];
                foreach ($tds as $td) {
                    $texts[] = preg_replace('/\s+/', ' ', trim($td->textContent));
                }
                $context = implode(" | ", $texts);
            }
            $list[] = [
                'href' => $href,
                'text' => trim($a->textContent),
                'context' => $context
            ];
        }
    }
    return $list;
}

$auditResults = [];

foreach ($pages as $name => $paths) {
    $htmlPdfs = extractPdfLinksFromHtml($paths['html']);
    $phpPdfs  = extractPdfLinksFromHtml($paths['php']);

    $auditResults[$name] = [
        'html_count' => count($htmlPdfs),
        'php_count'  => count($phpPdfs),
        'htmlPdfs'   => $htmlPdfs,
        'phpPdfs'    => $phpPdfs
    ];
}

file_put_contents("$baseDir/scratch/criteria_placement_audit.json", json_encode($auditResults, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
echo "Audit complete! Saved to scratch/criteria_placement_audit.json\n";

