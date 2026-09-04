<?php

$fpath = 'd:/xampp/htdocs/sssu/satya-sai/Examination/Results.php';
$content = file_get_contents($fpath);

// Replace href="https://www.universitymanagementsystem.in/SatyaSai" with href="#" for all item buttons
// Keep top header portal button as is or also hash? Let's hash all item buttons.
$content = str_replace(
    'class="btn btn-sm btn-naac-portal"',
    'href="#" class="btn btn-sm btn-naac-portal"',
    preg_replace('/href="https:\/\/www\.universitymanagementsystem\.in\/SatyaSai"\s+target="_blank"\s+rel="noopener"\s+class="btn btn-sm btn-naac-portal"/', 'class="btn btn-sm btn-naac-portal"', $content)
);

// Clean up any double hrefs if any
$content = preg_replace('/href="#"\s+href="#"/', 'href="#"', $content);

file_put_contents($fpath, $content);
echo "All result buttons updated to href='#' in Examination/Results.php!\n";

PHP;

file_put_contents('scratch/update_results_buttons_to_hash.php', $code);

