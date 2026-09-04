<?php
$files = glob('d:/xampp/htdocs/sssu/satya-sai/Academic/NAAC/Criteria*.php');
foreach ($files as $f) {
    $c = file_get_contents($f);
    $c = str_replace('<?xml encoding="utf-8"?>', '', $c);
    file_put_contents($f, $c);
}
echo "Cleaned <?xml?> tags from " . count($files) . " files.\n";
