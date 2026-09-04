<?php

$files = glob('d:/xampp/htdocs/sssu/satya-sai/Academic/NAAC/Criteria*.php');

foreach ($files as $fpath) {
    echo "Restoring empty cells via regex in $fpath...\n";
    $content = file_get_contents($fpath);

    // 1. Computer Application empty cell
    $content = preg_replace(
        '/<td colspan="2" rowspan="3">\s*<\/td>\s*<td rowspan="3">\s*Computer Application\s*<\/td>/is',
        '<td colspan="2" rowspan="3"><strong>School of Computer Application</strong></td>' . "\n" . '<td rowspan="3"><strong>Computer Application</strong></td>',
        $content
    );

    // 2. Hotel Management empty cell
    $content = preg_replace(
        '/<td colspan="2">\s*<\/td>\s*<td>\s*HOTEL MANAGEMENT AND CATERING\s*<\/td>/is',
        '<td colspan="2"><strong>School of Hotel Management</strong></td>' . "\n" . '<td><strong>Hotel Management & Catering</strong></td>',
        $content
    );

    // 3. Homeopathy empty cell
    $content = preg_replace(
        '/<td colspan="2">\s*<\/td>\s*<td>\s*Homeopathy\s*<\/td>/is',
        '<td colspan="2"><strong>School of Homeopathy</strong></td>' . "\n" . '<td><strong>Homeopathy</strong></td>',
        $content
    );

    // 4. Agriculture empty cell
    $content = preg_replace(
        '/<td colspan="2">\s*<\/td>\s*<td>\s*<\/td>\s*<td>\s*Bachelor of Agriculture\s*<\/td>/is',
        '<td colspan="2"><strong>School of Agriculture</strong></td>' . "\n" . '<td><strong>Agriculture</strong></td>' . "\n" . '<td>Bachelor of Agriculture</td>',
        $content
    );

    // 5. Paramedical (B.P.T) empty cell
    $content = preg_replace(
        '/<td colspan="2">\s*<\/td>\s*<td>\s*<\/td>\s*<td>\s*B\.P\.T\s*<\/td>/is',
        '<td colspan="2"><strong>School of Paramedical Sciences</strong></td>' . "\n" . '<td><strong>Paramedical Sciences</strong></td>' . "\n" . '<td>B.P.T</td>',
        $content
    );

    file_put_contents($fpath, $content);
    echo "  [DONE] $fpath\n";
}

echo "All empty cells replaced via regex!\n";

