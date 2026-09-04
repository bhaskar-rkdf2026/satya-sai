<?php

$fpath = 'd:/xampp/htdocs/sssu/satya-sai/Examination/Results.php';
$content = file_get_contents($fpath);

// Replace href="https://www.universitymanagementsystem.in/SatyaSai" inside li tags with href="#"
$content = preg_replace(
    '/(<a\s+href=")[^"]+("\s+target="_blank"\s+rel="noopener"\s+class="btn btn-sm btn-naac-portal">)/i',
    '$1#$2',
    $content
);

// Also remove target="_blank" rel="noopener" when href="#" so page doesn't open new tab on #
$content = preg_replace('/href="#"\s+target="_blank"\s+rel="noopener"/i', 'href="#"', $content);

file_put_contents($fpath, $content);
echo "Successfully updated all result list buttons to href='#' in Examination/Results.php!\n";

