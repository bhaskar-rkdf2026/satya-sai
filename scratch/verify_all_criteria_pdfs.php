<?php

$baseDir = 'd:/xampp/htdocs/sssu/satya-sai';

function downloadFile($remoteUrl, $localPath) {
    $dir = dirname($localPath);
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }

    // Encoded URL handling
    $urlParts = parse_url($remoteUrl);
    $pathSegments = explode('/', $urlParts['path']);
    $encodedSegments = array_map('rawurlencode', $pathSegments);
    $encodedPath = implode('/', $encodedSegments);
    $finalUrl = $urlParts['scheme'] . '://' . $urlParts['host'] . $encodedPath;
    if (isset($urlParts['query'])) {
        $finalUrl .= '?' . $urlParts['query'];
    }

    echo "Downloading: $remoteUrl\n";
    echo "  -> To: $localPath\n";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $finalUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)');
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    $data = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($code == 200 && strlen($data) > 100) {
        file_put_contents($localPath, $data);
        echo "  [SUCCESS] Saved " . strlen($data) . " bytes\n";
        return true;
    } else {
        echo "  [FAILED] HTTP $code (len: " . strlen($data) . ")\n";
        return false;
    }
}

$criterias = [
    'CriteriaOne' => [
        'html' => "$baseDir/assets/images/sssutms.co.in/cms/Website/Academic/NAAC/CriteriaOne.html",
        'php' => "$baseDir/Academic/NAAC/CriteriaOne.php",
    ],
    'CriteriaTwo' => [
        'html' => "$baseDir/assets/images/sssutms.co.in/cms/Website/Academic/NAAC/CriteriaTwo.html",
        'php' => "$baseDir/Academic/NAAC/CriteriaTwo.php",
    ],
    'CriteriaThree' => [
        'html' => "$baseDir/assets/images/sssutms.co.in/cms/Website/Academic/NAAC/CriteriaThree.html",
        'php' => "$baseDir/Academic/NAAC/CriteriaThree.php",
    ],
    'CriteriaFour' => [
        'html' => "$baseDir/assets/images/sssutms.co.in/cms/Website/Academic/NAAC/CriteriaFour.html",
        'php' => "$baseDir/Academic/NAAC/CriteriaFour.php",
    ],
    'CriteriaFive' => [
        'html' => "$baseDir/assets/images/sssutms.co.in/cms/Website/Academic/NAAC/CriteriaFive.html",
        'php' => "$baseDir/Academic/NAAC/CriteriaFive.php",
    ],
    'CriteriaSix' => [
        'html' => "$baseDir/assets/images/sssutms.co.in/cms/Website/Academic/NAAC/CriteriaSix.html",
        'php' => "$baseDir/Academic/NAAC/CriteriaSix.php",
    ],
    'CriteriaSeven' => [
        'html' => "$baseDir/assets/images/sssutms.co.in/cms/Website/Academic/NAAC/CriteriaSeven.html",
        'php' => "$baseDir/Academic/NAAC/CriteriaSeven.php",
    ]
];

$allReport = [];

foreach ($criterias as $key => $files) {
    echo "\n=======================================================\n";
    echo "Processing $key ...\n";
    echo "=======================================================\n";

    if (!file_exists($files['html'])) {
        echo "HTML file not found: {$files['html']}\n";
        continue;
    }

    $content = file_get_contents($files['html']);
    $dom = new DOMDocument();
    @$dom->loadHTML($content);
    $xpath = new DOMXPath($dom);

    $aNodes = $xpath->query('//a[@href]');
    $pdfList = [];

    foreach ($aNodes as $a) {
        $href = trim($a->getAttribute('href'));
        if (stripos($href, '.pdf') !== false) {
            $text = trim($a->textContent);
            $tr = $a;
            while ($tr && strtolower($tr->nodeName) !== 'tr') {
                $tr = $tr->parentNode;
            }
            $rowContext = '';
            if ($tr) {
                $cells = $tr->getElementsByTagName('td');
                $cText = [];
                foreach ($cells as $c) {
                    $cText[] = preg_replace('/\s+/', ' ', trim($c->textContent));
                }
                $rowContext = implode(" | ", $cText);
            }

            // Resolve URL
            $remoteUrl = $href;
            if (strpos($href, 'http') !== 0) {
                if (strpos($href, '/') === 0) {
                    $remoteUrl = 'https://www.sssutms.co.in' . $href;
                } else {
                    // relative to html path
                    $remoteUrl = 'https://www.sssutms.co.in/cms/Areas/Website/Files/' . ltrim($href, '/.');
                }
            }

            // Determine local relative path
            // Example href: https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria 1/BOG FINAL.pdf
            // Or ../../../Areas/Website/Files/Link/IQAC/NAAC/...
            $relPath = '';
            if (preg_match('/Files\/(Link\/IQAC\/NAAC\/.*\.pdf)/i', $href, $matches)) {
                $relPath = 'assets/images/Files/' . $matches[1];
            } elseif (preg_match('/Files\/(Widget\/Download\/.*\.pdf)/i', $href, $matches)) {
                $relPath = 'assets/images/Files/' . $matches[1];
            } elseif (preg_match('/Files\/(.*\.pdf)/i', $href, $matches)) {
                $relPath = 'assets/images/Files/' . $matches[1];
            } else {
                $relPath = 'assets/images/Files/Link/IQAC/NAAC/' . basename(parse_url($href, PHP_URL_PATH));
            }

            $localPath = "$baseDir/$relPath";

            $pdfList[] = [
                'raw_href' => $href,
                'remoteUrl' => $remoteUrl,
                'relPath' => $relPath,
                'localPath' => $localPath,
                'rowContext' => $rowContext,
                'text' => $text
            ];
        }
    }

    echo "Found " . count($pdfList) . " PDF links in $key HTML\n";

    // Download missing PDFs
    $downloaded = 0;
    foreach ($pdfList as &$item) {
        if (!file_exists($item['localPath']) || filesize($item['localPath']) < 100) {
            $res = downloadFile($item['remoteUrl'], $item['localPath']);
            if ($res) {
                $downloaded++;
            }
        }
    }

    $allReport[$key] = [
        'pdfList' => $pdfList,
        'downloaded' => $downloaded
    ];
}

file_put_contents("$baseDir/scratch/all_criteria_pdf_report.json", json_encode($allReport, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
echo "\nCheck completed! Saved report to scratch/all_criteria_pdf_report.json\n";

