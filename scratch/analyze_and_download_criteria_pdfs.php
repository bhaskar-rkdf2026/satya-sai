<?php

function getUrl($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36');
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);
    $data = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    if ($code == 200 && strlen($data) > 500) {
        return $data;
    }
    return false;
}

$criterias = [
    'Criteria1' => [
        'local_file' => 'd:/xampp/htdocs/sssu/satya-sai/Academic/NAAC/CriteriaOne.php',
        'urls' => [
            'https://www.sssutms.co.in/Academic/NAAC/CriteriaOne',
            'https://www.sssutms.co.in/cms/Website/Academic/NAAC/CriteriaOne.html',
            'https://sssutms.co.in/cms/Website/Academic/NAAC/CriteriaOne.html'
        ]
    ],
    'Criteria2' => [
        'local_file' => 'd:/xampp/htdocs/sssu/satya-sai/Academic/NAAC/CriteriaTwo.php',
        'urls' => [
            'https://www.sssutms.co.in/Academic/NAAC/CriteriaTwo',
            'https://www.sssutms.co.in/cms/Website/Academic/NAAC/CriteriaTwo.html',
            'https://sssutms.co.in/cms/Website/Academic/NAAC/CriteriaTwo.html'
        ]
    ],
    'Criteria3' => [
        'local_file' => 'd:/xampp/htdocs/sssu/satya-sai/Academic/NAAC/CriteriaThree.php',
        'urls' => [
            'https://www.sssutms.co.in/Academic/NAAC/CriteriaThree',
            'https://www.sssutms.co.in/cms/Website/Academic/NAAC/CriteriaThree.html',
            'https://sssutms.co.in/cms/Website/Academic/NAAC/CriteriaThree.html'
        ]
    ],
    'Criteria4' => [
        'local_file' => 'd:/xampp/htdocs/sssu/satya-sai/Academic/NAAC/CriteriaFour.php',
        'urls' => [
            'https://www.sssutms.co.in/Academic/NAAC/CriteriaFour',
            'https://www.sssutms.co.in/cms/Website/Academic/NAAC/CriteriaFour.html',
            'https://sssutms.co.in/cms/Website/Academic/NAAC/CriteriaFour.html'
        ]
    ],
    'Criteria5' => [
        'local_file' => 'd:/xampp/htdocs/sssu/satya-sai/Academic/NAAC/CriteriaFive.php',
        'urls' => [
            'https://www.sssutms.co.in/Academic/NAAC/CriteriaFive',
            'https://www.sssutms.co.in/cms/Website/Academic/NAAC/CriteriaFive.html',
            'https://sssutms.co.in/cms/Website/Academic/NAAC/CriteriaFive.html'
        ]
    ],
    'Criteria6' => [
        'local_file' => 'd:/xampp/htdocs/sssu/satya-sai/Academic/NAAC/CriteriaSix.php',
        'urls' => [
            'https://www.sssutms.co.in/Academic/NAAC/CriteriaSix',
            'https://www.sssutms.co.in/cms/Website/Academic/NAAC/CriteriaSix.html',
            'https://sssutms.co.in/cms/Website/Academic/NAAC/CriteriaSix.html'
        ]
    ],
    'Criteria7' => [
        'local_file' => 'd:/xampp/htdocs/sssu/satya-sai/Academic/NAAC/CriteriaSeven.php',
        'urls' => [
            'https://www.sssutms.co.in/Academic/NAAC/CriteriaSeven',
            'https://www.sssutms.co.in/cms/Website/Academic/NAAC/CriteriaSeven.html',
            'https://sssutms.co.in/cms/Website/Academic/NAAC/CriteriaSeven.html'
        ]
    ]
];

$summary = [];

foreach ($criterias as $cKey => $info) {
    echo "=========================================\n";
    echo "Processing $cKey ...\n";
    $html = false;
    $workingUrl = '';
    foreach ($info['urls'] as $u) {
        $data = getUrl($u);
        if ($data !== false) {
            $html = $data;
            $workingUrl = $u;
            break;
        }
    }

    if (!$html) {
        echo "FAILED to fetch live HTML for $cKey\n";
        continue;
    }

    echo "Fetched live $cKey from $workingUrl (len: " . strlen($html) . ")\n";

    // Extract all href links in tables
    $dom = new DOMDocument();
    @$dom->loadHTML($html);
    $xpath = new DOMXPath($dom);

    $aNodes = $xpath->query('//a');
    $livePdfs = [];

    foreach ($aNodes as $a) {
        $href = trim($a->getAttribute('href'));
        $text = trim($a->textContent);

        // Find parent <tr> to get row details
        $tr = $a;
        while ($tr && strtolower($tr->nodeName) !== 'tr') {
            $tr = $tr->parentNode;
        }

        $rowText = '';
        if ($tr) {
            $cells = $tr->getElementsByTagName('td');
            $cellTexts = [];
            foreach ($cells as $c) {
                $cellTexts[] = preg_replace('/\s+/', ' ', trim($c->textContent));
            }
            $rowText = implode(" | ", $cellTexts);
        }

        if (stripos($href, '.pdf') !== false || stripos($href, 'Files/Link') !== false || stripos($text, 'Click here') !== false) {
            // Absolute URL resolution
            $fullUrl = $href;
            if (strpos($href, 'http') !== 0) {
                if (strpos($href, '/') === 0) {
                    $fullUrl = 'https://www.sssutms.co.in' . $href;
                } else {
                    $fullUrl = 'https://www.sssutms.co.in/' . $href;
                }
            }

            $livePdfs[] = [
                'text' => $text,
                'href' => $href,
                'fullUrl' => $fullUrl,
                'rowText' => $rowText
            ];
        }
    }

    echo "Found " . count($livePdfs) . " PDF/Document links on live $cKey\n";
    $summary[$cKey] = [
        'workingUrl' => $workingUrl,
        'count' => count($livePdfs),
        'links' => $livePdfs
    ];
}

file_put_contents('scratch/live_criteria_analysis.json', json_encode($summary, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
echo "Analysis complete. Saved to scratch/live_criteria_analysis.json\n";

