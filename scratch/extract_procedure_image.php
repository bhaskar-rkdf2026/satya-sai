<?php
$file = 'C:/Users/Admin/.gemini/antigravity-ide/brain/d204b681-b7ec-4539-8458-d57d758e2f25/.system_generated/steps/165/content.md';
$html = file_get_contents($file);

if (preg_match('/src="data:image\/([^;]+);base64,([^"]+)"/i', $html, $matches)) {
    $ext = $matches[1];
    $data = base64_decode($matches[2]);
    $dest = __DIR__ . '/../assets/images/admission/admission_procedure_flowchart.' . $ext;
    if (!is_dir(dirname($dest))) {
        mkdir(dirname($dest), 0777, true);
    }
    file_put_contents($dest, $data);
    echo "Saved base64 image to " . $dest . " (" . strlen($data) . " bytes)" . PHP_EOL;
} else {
    echo "No base64 image found";
}
