<?php
$html = file_get_contents('d:/xampp/htdocs/satya-sai/Admission/FeesStructure.php');

// Extract rows from table
preg_match_all('/<tr[^>]*>(.*?)<\/tr>/is', $html, $rows);

$courses = [];
foreach ($rows[1] as $idx => $rowHtml) {
    if ($idx == 0) continue; // skip header
    preg_match_all('/<td[^>]*>(.*?)<\/td>/is', $rowHtml, $cells);
    if (count($cells[1]) >= 5) {
        $sno = trim(strip_tags($cells[1][0]));
        $course = trim(preg_replace('/\s+/', ' ', strip_tags($cells[1][1])));
        $fee = trim(preg_replace('/\s+/', ' ', strip_tags($cells[1][2])));
        $eligibility = trim(preg_replace('/\s+/', ' ', strip_tags($cells[1][3])));
        $duration = trim(preg_replace('/\s+/', ' ', strip_tags($cells[1][4])));
        
        if (!empty($course) && is_numeric(str_replace('.', '', $sno))) {
            $courses[] = [
                'sno' => $sno,
                'course' => $course,
                'fee' => $fee,
                'eligibility' => $eligibility,
                'duration' => $duration
            ];
        }
    }
}

echo "Extracted " . count($courses) . " courses.\n";
foreach (array_slice($courses, 0, 5) as $c) {
    print_r($c);
}
