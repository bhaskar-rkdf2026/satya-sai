<?php
$files = glob('d:/xampp/htdocs/sssu/satya-sai/Academic/NAAC/Criteria*.php');
foreach ($files as $f) {
    $c = file_get_contents($f);
    if (strpos($c, 'LinkIQAC') !== false) {
        $c = str_replace('LinkIQAC', 'Link/IQAC', $c);
        file_put_contents($f, $c);
        echo "Fixed LinkIQAC in " . basename($f) . "\n";
    }
}
