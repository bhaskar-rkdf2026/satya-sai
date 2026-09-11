<?php
// Extract exact fee structure table
$feeHtml = file_get_contents('scratch/scratch/live_admission/FeesStructure.html');
if (preg_match('/<table\b[^>]*>(.*?)<\/table>/is', $feeHtml, $m)) {
    file_put_contents('scratch/live_fees_table.html', $m[0]);
    echo "Saved Fees Table, length: " . strlen($m[0]) . "\n";
}

// Extract exact university account detail
$accHtml = file_get_contents('scratch/scratch/live_admission/UniversityAccountDetail.html');
if (preg_match('/<article[^>]*>(.*?)<\/article>/is', $accHtml, $m)) {
    file_put_contents('scratch/live_account_detail.html', $m[1]);
    echo "Saved Account Detail, length: " . strlen($m[1]) . "\n";
}

// Extract brochures
$broHtml = file_get_contents('scratch/scratch/live_admission/Brochures.html');
if (preg_match('/<article[^>]*>(.*?)<\/article>/is', $broHtml, $m)) {
    file_put_contents('scratch/live_brochures.html', $m[1]);
    echo "Saved Brochures Article, length: " . strlen($m[1]) . "\n";
}

// Extract admission notice table or notices
$notHtml = file_get_contents('scratch/scratch/live_admission/AdmissionNotice.html');
if (preg_match('/<article[^>]*>(.*?)<\/article>/is', $notHtml, $m)) {
    file_put_contents('scratch/live_admission_notices.html', $m[1]);
    echo "Saved Admission Notices Article, length: " . strlen($m[1]) . "\n";
}

// Extract admission procedure
$procHtml = file_get_contents('scratch/scratch/live_admission/AdmissionProcedure.html');
if (preg_match('/<article[^>]*>(.*?)<\/article>/is', $procHtml, $m)) {
    file_put_contents('scratch/live_admission_procedure.html', $m[1]);
    echo "Saved Admission Procedure Article, length: " . strlen($m[1]) . "\n";
}
