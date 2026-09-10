<?php
$html = file_get_contents('http://localhost/satya-sai/About/Institutes.php');
if (preg_match('/<div class="institutes-content-wrap">.*?<\/div>\s*<\/div>\s*<\/div>\s*<\/div>\s*<!-- Sticky/s', $html, $m)) {
    echo $m[0];
} else {
    echo "Pattern not matched, showing first 1200 chars after content-card-body:\n";
    $pos = strpos($html, 'content-card-body');
    echo substr($html, $pos, 1200);
}
