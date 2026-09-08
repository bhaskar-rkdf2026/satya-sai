<?php
$html = file_get_contents('d:/xampp/htdocs/satya-sai/Admission/AdmissionNotice.php');

// Extract all notifications cleanly
preg_match_all('/<tr[^>]*>(.*?)<\/tr>/is', $html, $rows);

$notices = [];
foreach ($rows[1] as $rHtml) {
    if (preg_match('/<a[^>]+href=["\']([^"\']+)["\'][^>]*>(.*?)<\/a>/is', $rHtml, $m)) {
        $link = trim($m[1]);
        $title = trim(strip_tags($m[2]));
        if (empty($title) || $title == '&nbsp;') {
            // try to get all text in the row
            $title = trim(preg_replace('/\s+/', ' ', strip_tags($rHtml)));
        }
        if (!empty($title) && strlen($title) > 3) {
            $notices[] = [
                'title' => $title,
                'link' => $link
            ];
        }
    }
}

echo "Extracted " . count($notices) . " notices.\n";
foreach (array_slice($notices, 0, 5) as $n) {
    print_r($n);
}
