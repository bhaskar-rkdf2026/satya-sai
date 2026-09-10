<?php
$css = file_get_contents('d:/xampp/htdocs/satya-sai/assets/css/style.css');
$lines = explode("\n", $css);
foreach ($lines as $num => $line) {
    if (preg_match('/(h4|h5|title|section-title|heading|after|before|accent|orange|line|border-bottom)/i', $line)) {
        if (preg_match('/(after|before|border-bottom|accent|content:)/i', $line)) {
            echo ($num + 1) . ": " . trim($line) . "\n";
        }
    }
}
