<?php
$files = glob('d:/xampp/htdocs/sssu/satya-sai/Academic/NAAC/Criteria*.php');
foreach ($files as $f) {
    $c = file_get_contents($f);
    $c = str_replace('target="_blank" rel="noopener" target="_blank" rel="noopener"', 'target="_blank" rel="noopener"', $c);
    file_put_contents($f, $c);
}
echo "Cleaned duplicate attributes across " . count($files) . " files.\n";
