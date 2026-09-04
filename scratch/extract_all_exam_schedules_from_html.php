<?php

$html_path = 'd:/xampp/htdocs/sssu/satya-sai/assets/images/sssutms.co.in/cms/Website/Examination/ExamSchedule.html';
$base_dir = 'd:/xampp/htdocs/sssu/satya-sai/';

if (!file_exists($html_path)) {
    die("ExamSchedule.html not found!\n");
}

$html = file_get_contents($html_path);

// Load DOM
$dom = new DOMDocument();
@$dom->loadHTML('<?xml encoding="utf-8" ?>' . $html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
$xpath = new DOMXPath($dom);

$tables = $xpath->query('//table');
echo "Found " . $tables->length . " tables in ExamSchedule.html\n";

function clean_text($t) {
    $t = strip_tags($t);
    $t = html_entity_decode($t, ENT_QUOTES, 'UTF-8');
    $t = preg_replace('/\s+/', ' ', $t);
    return trim($t);
}

$sections = [];

foreach ($tables as $tIdx => $table) {
    $rows = $xpath->query('.//tr', $table);
    if ($rows->length == 0) continue;

    $headerText = clean_text($rows->item(0)->textContent);

    // Filter section headers
    $secTitle = "Exam Schedule & Time Tables";
    if (preg_match('/(September|Aug|August|July|June|May|April|March|Feb|Jan|Dec|December|Nov|November|Oct|October)\s*[\r\n\t–\-]*\s*(202[0-9])/i', $headerText, $m)) {
        $secTitle = "Examination " . ucfirst($m[1]) . " – " . $m[2];
    } elseif (preg_match('/NEP/i', $headerText)) {
        $secTitle = "NEP Annual Scheme Examinations";
    } elseif (preg_match('/Time Table/i', $headerText)) {
        $secTitle = clean_text($headerText);
    }

    $secRows = [];
    $sNo = 1;

    for ($i = 0; $i < $rows->length; $i++) {
        $tr = $rows->item($i);
        $rowText = clean_text($tr->textContent);
        if ($i === 0 && (strpos(strtolower($rowText), 's.no') !== false || strpos(strtolower($rowText), 'time table') !== false)) {
            continue;
        }

        $anchors = $xpath->query('.//a', $tr);
        $linkUrl = '';
        $linkText = '';

        foreach ($anchors as $a) {
            $href = trim($a->getAttribute('href'));
            $atxt = clean_text($a->textContent);
            if (!empty($href) && $href !== '#' && strpos($href, 'javascript') === false) {
                $linkUrl = $href;
                if (!empty($atxt) && strlen($atxt) > strlen($linkText)) {
                    $linkText = $atxt;
                }
            }
        }

        if (empty($linkText)) {
            $linkText = $rowText;
        }

        // Clean link text
        $linkText = preg_replace('/^(Link|Click here|Download|S\.No\.\s*\d+)/i', '', $linkText);
        $linkText = preg_replace('/^\d+\s+/', '', $linkText); // remove leading serial number
        $linkText = trim($linkText);

        if (!empty($linkText) && strlen($linkText) > 2) {
            $secRows[] = [
                'sno' => $sNo++,
                'title' => $linkText,
                'raw_link' => $linkUrl
            ];
        }
    }

    if (!empty($secRows)) {
        $sections[] = [
            'header' => $secTitle,
            'rows' => $secRows
        ];
    }
}

echo "Extracted " . count($sections) . " sections from ExamSchedule.html\n";

// Download missing PDFs and resolve local paths
$validLinks = 0;
$downloadedPdfs = 0;

foreach ($sections as &$sec) {
    foreach ($sec['rows'] as &$r) {
        $raw_link = $r['raw_link'];
        if (empty($raw_link)) {
            $r['final_link'] = '#';
            continue;
        }

        // Normalize relative path
        // e.g. ../../../../../cms/Areas/Website/Files/Link/ExamSchedules/abc.pdf
        $clean_path = preg_replace('#^(\.\./)+#', '', $raw_link);
        $clean_path = str_replace('cms/Areas/Website/', 'assets/images/', $clean_path);
        $clean_path = str_replace('cms/Website/', 'assets/images/', $clean_path);

        if (strpos($clean_path, 'assets/images/') === false) {
            $clean_path = 'assets/images/Files/Link/ExamSchedules/' . basename($clean_path);
        }

        $local_file = $base_dir . urldecode($clean_path);
        $local_file = str_replace('/', DIRECTORY_SEPARATOR, $local_file);

        if (file_exists($local_file) && filesize($local_file) > 100) {
            $r['final_link'] = '<?php echo BASE_URL; ?>' . ltrim(str_replace('\\', '/', $clean_path), '/');
            $validLinks++;
        } else {
            // Try downloading
            $fname = basename(urldecode($clean_path));
            $remote_urls = [
                'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/ExamSchedules/' . rawurlencode($fname),
                'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/' . rawurlencode($fname),
                'https://sssutms.co.in/cms/Website/Files/Link/ExamSchedules/' . rawurlencode($fname),
                'https://sssutms.co.in/cms/Website/Files/Link/' . rawurlencode($fname)
            ];

            $dir = dirname($local_file);
            if (!is_dir($dir)) mkdir($dir, 0777, true);

            $got = false;
            foreach ($remote_urls as $u) {
                $ch = curl_init($u);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($ch, CURLOPT_TIMEOUT, 10);
                $d = curl_exec($ch);
                $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                curl_close($ch);

                if ($code == 200 && strlen($d) > 500) {
                    file_put_contents($local_file, $d);
                    echo "Downloaded PDF: $fname (" . strlen($d) . " bytes)\n";
                    $r['final_link'] = '<?php echo BASE_URL; ?>' . ltrim(str_replace('\\', '/', $clean_path), '/');
                    $downloadedPdfs++;
                    $got = true;
                    break;
                }
            }

            if (!$got) {
                $r['final_link'] = '#';
            }
        }
    }
}

file_put_contents('scratch/extracted_sections.json', json_encode($sections, JSON_PRETTY_PRINT));
echo "Saved extracted sections to scratch/extracted_sections.json\n";

