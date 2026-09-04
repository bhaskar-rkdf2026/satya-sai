<?php
$f = 'd:/xampp/htdocs/sssu/satya-sai/Academic/NAAC/CriteriaOne.php';
$c = file_get_contents($f);
$c = preg_replace('/<td colspan="2" rowspan="2"><\/td>\s*<td rowspan="2"><\/td>/i', '<td colspan="2" rowspan="2">School of Management Studies</td>' . "\n" . '<td rowspan="2">Management</td>', $c);
file_put_contents($f, $c);
echo "Replaced empty Management cells successfully!\n";
