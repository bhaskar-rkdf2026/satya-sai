<?php
$aboutFile = 'd:/xampp/htdocs/satya-sai/data/about_pages.json';
$facFile = 'd:/xampp/htdocs/satya-sai/data/faculty_pages.json';

$aboutData = json_decode(file_get_contents($aboutFile), true) ?: [];
$facData = json_decode(file_get_contents($facFile), true) ?: [];

echo "Loaded " . count($aboutData) . " about pages.\n";
echo "Loaded " . count($facData) . " faculty pages.\n";
