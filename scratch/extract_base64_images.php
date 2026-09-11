<?php
$pages = [
    'AdmissionProcedure' => 'scratch/scratch/live_admission/AdmissionProcedure.html',
    'Brochures' => 'scratch/scratch/live_admission/Brochures.html',
    'UniversityAccountDetail' => 'scratch/scratch/live_admission/UniversityAccountDetail.html'
];

if (!is_dir('assets/images/admission')) {
    mkdir('assets/images/admission', 0777, true);
}

foreach ($pages as $pName => $pPath) {
    $c = file_get_contents($pPath);
    preg_match_all('/<img[^>]+src="(data:image\/([a-zA-Z]+);base64,([^"]+))"[^>]*(?:data-filename="([^"]+)")?/i', $c, $m, PREG_SET_ORDER);
    echo "$pName: Found " . count($m) . " base64 images\n";
    foreach ($m as $i => $img) {
        $ext = $img[2] == 'jpeg' ? 'jpg' : $img[2];
        $fn = !empty($img[4]) ? $img[4] : "{$pName}_img_{$i}.{$ext}";
        $fn = preg_replace('/[^a-zA-Z0-9_\.-]/', '_', $fn);
        $data = base64_decode($img[3]);
        file_put_contents("assets/images/admission/{$fn}", $data);
        echo " - Saved assets/images/admission/{$fn} (" . strlen($data) . " bytes)\n";
    }
}
