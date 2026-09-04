<?php

$files = glob('d:/xampp/htdocs/sssu/satya-sai/Academic/NAAC/Criteria*.php');
$files[] = 'd:/xampp/htdocs/sssu/satya-sai/Research/NIRF.php';
$files[] = 'd:/xampp/htdocs/sssu/satya-sai/Academic/NIRF.php';

$nirf_code = file_get_contents('d:/xampp/htdocs/sssu/satya-sai/Research/NIRF.php');
preg_match('/(\/\* Refined Row Hover Effects.*<\/style>)/s', $nirf_code, $m);
$target_css_block = $m[1];

foreach ($files as $fpath) {
    if (!file_exists($fpath)) continue;
    $content = file_get_contents($fpath);

    if (preg_match('/(\/\* Refined Row Hover Effects.*<\/style>)/s', $content, $m_old)) {
        $content = str_replace($m_old[1], $target_css_block, $content);
        file_put_contents($fpath, $content);
        echo "Updated $fpath\n";
    }
}

echo "All pages updated with high-specificity hover CSS!\n";

