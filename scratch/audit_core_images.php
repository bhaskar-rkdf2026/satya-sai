<?php
$rootDir = 'd:/xampp/htdocs/satya-sai';
$modules = ['About', 'Academic', 'Examination', 'Research', 'Admission', 'Download', 'includes'];
$files = ['d:/xampp/htdocs/satya-sai/index.php'];

foreach ($modules as $mod) {
    $dir = $rootDir . '/' . $mod;
    if (!is_dir($dir)) continue;
    $it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
    foreach ($it as $f) {
        if ($f->isFile() && $f->getExtension() === 'php') {
            $path = str_replace('\\', '/', $f->getPathname());
            // Exclude nested legacy mirrors like Examination/Examinations/
            if (strpos($path, 'Examinations/ExamSchedule.php') !== false) continue;
            if (strpos($path, 'Admissions/AdmissionNotice.php') !== false) continue;
            $files[] = $path;
        }
    }
}

$missing = [];
$total = 0;
$valid = 0;

foreach ($files as $file) {
    $content = file_get_contents($file);
    if (preg_match_all('/(?:src)=["\']([^"\']+\.(?:jpg|jpeg|png|gif|webp|svg))["\']/i', $content, $matches)) {
        foreach ($matches[1] as $imgSrc) {
            if (strpos($imgSrc, 'http://') === 0 || strpos($imgSrc, 'https://') === 0) continue;
            $total++;
            $clean = preg_replace('/<\?php.*?\?>/', '', $imgSrc);
            $clean = preg_replace('/^\.\.\//', '', $clean);
            $clean = preg_replace('/^\.\.\//', '', $clean);
            $clean = ltrim($clean, '/');
            
            $full = $rootDir . '/' . $clean;
            if (file_exists($full) || file_exists(urldecode($full))) {
                $valid++;
            } else {
                $missing[] = [
                    'file' => str_replace($rootDir, '', $file),
                    'src' => $imgSrc,
                    'full' => $full
                ];
            }
        }
    }
}

echo "Total images in Main Core Subpages: $total\n";
echo "Valid: $valid\n";
echo "Missing: " . count($missing) . "\n";
if (count($missing) > 0) {
    print_r($missing);
}
