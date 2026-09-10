<?php
// Test HTTP fetch of Institutes.php
$url = 'http://localhost/satya-sai/About/Institutes.php';
$html = @file_get_contents($url);
if ($html === false) {
    echo "ERROR: Unable to fetch $url\n";
    exit(1);
}

// Check for unwanted dummy text
$has_constituent_card = strpos($html, 'Constituent Institutes &amp; Colleges') !== false || strpos($html, 'Constituent Institutes & Colleges') !== false;
$has_dummy_sub = strpos($html, 'UG, PG &amp; Diploma Courses') !== false || strpos($html, 'UG, PG & Diploma Courses') !== false;
$has_badge = strpos($html, '14 Constituent Units') !== false;

echo "Dummy banner card present: " . ($has_constituent_card ? "YES (FAIL)" : "NO (PASS)") . "\n";
echo "Dummy subtitle present: " . ($has_dummy_sub ? "YES (FAIL)" : "NO (PASS)") . "\n";
echo "Dummy badge present: " . ($has_badge ? "YES (FAIL)" : "NO (PASS)") . "\n";

// Check exact text items
$has_intro = strpos($html, 'As per ordinance of') !== false;
$has_univ = strpos($html, 'University Institutes') !== false;
$has_pharm = strpos($html, 'Pharmacy Institutions') !== false;
$has_eng = strpos($html, 'School of Engineering') !== false;
$has_law = strpos($html, 'School of Law') !== false;
$has_cop = strpos($html, 'College of Pharmacy') !== false;
$has_regulatory = strpos($html, 'As per approval accorded by Regulatory authorities') !== false;

echo "Intro paragraph: " . ($has_intro ? "PASS" : "FAIL") . "\n";
echo "University Institutes heading: " . ($has_univ ? "PASS" : "FAIL") . "\n";
echo "Pharmacy Institutions heading: " . ($has_pharm ? "PASS" : "FAIL") . "\n";
echo "School of Engineering: " . ($has_eng ? "PASS" : "FAIL") . "\n";
echo "School of Law: " . ($has_law ? "PASS" : "FAIL") . "\n";
echo "College of Pharmacy: " . ($has_cop ? "PASS" : "FAIL") . "\n";
echo "Regulatory footer: " . ($has_regulatory ? "PASS" : "FAIL") . "\n";

// Count cards
$card_count = substr_count($html, 'institute-grid-card');
echo "Total institute cards: $card_count (expected 18)\n";
