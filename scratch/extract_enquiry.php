<?php
$c = file_get_contents('scratch/scratch/live_admission/Admission_Enquiry.html');
$pos1 = strpos($c, '<article');
$pos2 = strpos($c, '</article>');
if ($pos1 !== false && $pos2 !== false) {
    $art = substr($c, $pos1, $pos2 - $pos1 + 10);
    $cleanArt = preg_replace('/src="data:image\/[^;]+;base64,[^"]+"/', 'src="[BASE64_IMAGE]"', $art);
    file_put_contents("scratch/live_Admission_Enquiry_clean.html", $cleanArt);
    echo "Saved Admission_Enquiry_clean.html, length: " . strlen($cleanArt) . "\n";
    echo substr($cleanArt, 0, 1500) . "\n";
}
