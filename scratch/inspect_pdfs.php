<?php
$base = 'd:/xampp/htdocs/satya-sai';
require 'scratch/count_pages.php';

$allPdfs = [];
foreach ($partially_dynamic as $p) {
    $content = file_get_contents($base . '/' . $p);
    preg_match_all('/(?:href|src)=["\']([^"\']+\.pdf)["\']/i', $content, $m);
    foreach ($m[1] as $pdf) {
        $clean = preg_replace('/^<\?php.*?\?>\s*/', '', $pdf);
        $clean = trim(str_replace(['../', './', '<?php echo BASE_URL; ?>', 'assets/'], '', $clean));
        $allPdfs[] = $clean;
    }
}

$uniquePdfs = array_unique($allPdfs);
sort($uniquePdfs);

echo "Total unique PDF paths referenced across 227 pages: " . count($uniquePdfs) . "\n";
echo "Sample 15 PDFs:\n";
foreach (array_slice($uniquePdfs, 0, 15) as $pdf) {
    echo " - " . $pdf . "\n";
}
