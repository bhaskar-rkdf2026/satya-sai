<?php
$c = file_get_contents('scratch/scratch/live_admission/AdmissionRegistration.html');
$pos1 = strpos($c, '<article');
$pos2 = strpos($c, '</article>');
if ($pos1 !== false && $pos2 !== false) {
    $art = substr($c, $pos1, $pos2 - $pos1 + 10);
    $cleanArt = preg_replace('/src="data:image\/[^;]+;base64,[^"]+"/', 'src="[BASE64_IMAGE]"', $art);
    file_put_contents("scratch/live_AdmissionRegistration_clean.html", $cleanArt);
    echo "Saved AdmissionRegistration_clean.html, length: " . strlen($cleanArt) . "\n";
    echo $cleanArt . "\n";
}
