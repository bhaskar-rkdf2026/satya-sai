<?php

$c1_file = 'd:/xampp/htdocs/sssu/satya-sai/Academic/NAAC/CriteriaOne.php';
$content = file_get_contents($c1_file);

// Fix empty School of Management cell
$content = str_replace(
    '<td colspan="2" rowspan="2"></td>' . "\n" . '<td></td>',
    '<td colspan="2" rowspan="2">School of Management Studies</td>' . "\n" . '<td>Management</td>',
    $content
);
$content = str_replace(
    '<td colspan="2" rowspan="2"></td>' . "\n" . '<td rowspan="2"></td>',
    '<td colspan="2" rowspan="2">School of Management Studies</td>' . "\n" . '<td rowspan="2">Management</td>',
    $content
);

// Fix any other empty Faculty cells in CriteriaOne.php
$content = str_replace('<td colspan="2"></td>' . "\n" . '<td>HOTEL MANAGEMENT AND CATERING</td>', '<td colspan="2">School of Hotel Management</td>' . "\n" . '<td>Hotel Management</td>', $content);
$content = str_replace('<td colspan="2"></td>' . "\n" . '<td>Homeopathy</td>', '<td colspan="2">Faculty of Homeopathy</td>' . "\n" . '<td>Homeopathy</td>', $content);
$content = str_replace('<td colspan="2"></td>' . "\n" . '<td></td>' . "\n" . '<td>Bachelor of Agriculture</td>', '<td colspan="2">Faculty of Agriculture</td>' . "\n" . '<td>Agriculture</td>' . "\n" . '<td>Bachelor of Agriculture</td>', $content);

// Clean duplicate links / LinkIQAC path typos in LinkIQAC -> Link/IQAC
$content = str_replace('LinkIQAC', 'Link/IQAC', $content);

file_put_contents($c1_file, $content);
echo "CriteriaOne cells fixed!\n";

