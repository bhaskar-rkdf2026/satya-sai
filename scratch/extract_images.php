<?php
$html = file_get_contents('d:/xampp/htdocs/sssu/satya-sai/assets/images/sssutms.co.in/cms/Website/Admission/Brochures.html');

$dom = new DOMDocument();
@$dom->loadHTML($html);

$imgs = $dom->getElementsByTagName('img');
$idx = 1;
foreach ($imgs as $img) {
    $src = $img->getAttribute('src');
    if (strpos($src, 'data:image/') === 0) {
        $parts = explode(',', $src);
        if (count($parts) == 2) {
            $data = base64_decode($parts[1]);
            $filename = "d:/xampp/htdocs/sssu/satya-sai/assets/images/brochure_icon_{$idx}.png";
            file_put_contents($filename, $data);
            echo "Saved image {$idx} to {$filename} (" . strlen($data) . " bytes)\n";
            $idx++;
        }
    }
}
