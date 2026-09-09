<?php
$c = file_get_contents(__DIR__ . '/../Download/E-Content.php');
echo "Length: " . strlen($c) . "\n";
// count tables or sections
preg_match_all('/<div class="department-heading">([\s\S]*?)<\/div>/i', $c, $m);
echo "Sections found:\n";
foreach ($m[1] as $s) {
    echo " - " . strip_tags(trim($s)) . "\n";
}
