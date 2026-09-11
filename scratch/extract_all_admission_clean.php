<?php
$pages = [
    'AdmissionProcedure' => 'scratch/scratch/live_admission/AdmissionProcedure.html',
    'AdmissionNotice' => 'scratch/scratch/live_admission/AdmissionNotice.html',
    'Brochures' => 'scratch/scratch/live_admission/Brochures.html'
];

foreach ($pages as $name => $path) {
    $c = file_get_contents($path);
    $pos1 = strpos($c, '<article');
    $pos2 = strpos($c, '</article>');
    if ($pos1 !== false && $pos2 !== false) {
        $art = substr($c, $pos1, $pos2 - $pos1 + 10);
        // Replace huge base64 strings
        $cleanArt = preg_replace('/src="data:image\/[^;]+;base64,[^"]+"/', 'src="[BASE64_IMAGE]"', $art);
        file_put_contents("scratch/live_{$name}_clean.html", $cleanArt);
        echo "Saved {$name}_clean.html, length without base64: " . strlen($cleanArt) . "\n";
    }
}
