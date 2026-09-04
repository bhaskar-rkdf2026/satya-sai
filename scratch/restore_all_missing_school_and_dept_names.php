<?php

$files = glob('d:/xampp/htdocs/sssu/satya-sai/Academic/NAAC/Criteria*.php');

foreach ($files as $fpath) {
    echo "Restoring missing School/Dept names in $fpath...\n";
    $content = file_get_contents($fpath);

    // 1. Computer Application empty School Name cell
    $content = str_replace(
        '<td colspan="2" rowspan="3"></td>' . "\n" . '<td rowspan="3">Computer Application  </td>',
        '<td colspan="2" rowspan="3"><strong>School of Computer Application</strong></td>' . "\n" . '<td rowspan="3"><strong>Computer Application</strong></td>',
        $content
    );
    $content = str_replace(
        '<td colspan="2" rowspan="3"></td>' . "\n" . '<td rowspan="3">Computer Application</td>',
        '<td colspan="2" rowspan="3"><strong>School of Computer Application</strong></td>' . "\n" . '<td rowspan="3"><strong>Computer Application</strong></td>',
        $content
    );

    // 2. Hotel Management empty School Name cell
    $content = str_replace(
        '<td colspan="2"></td>' . "\n" . '<td>HOTEL MANAGEMENT AND CATERING</td>',
        '<td colspan="2"><strong>School of Hotel Management</strong></td>' . "\n" . '<td><strong>Hotel Management & Catering</strong></td>',
        $content
    );

    // 3. Homeopathy empty School Name cell
    $content = str_replace(
        '<td colspan="2"></td>' . "\n" . '<td>Homeopathy</td>',
        '<td colspan="2"><strong>School of Homeopathy</strong></td>' . "\n" . '<td><strong>Homeopathy</strong></td>',
        $content
    );

    // 4. Agriculture empty School Name & Dept cell
    $content = str_replace(
        '<td colspan="2"></td>' . "\n" . '<td></td>' . "\n" . '<td>Bachelor of Agriculture</td>',
        '<td colspan="2"><strong>School of Agriculture</strong></td>' . "\n" . '<td><strong>Agriculture</strong></td>' . "\n" . '<td>Bachelor of Agriculture</td>',
        $content
    );

    // 5. Paramedical (B.P.T) empty School Name & Dept cell
    $content = str_replace(
        '<td colspan="2"></td>' . "\n" . '<td></td>' . "\n" . '<td>B.P.T</td>',
        '<td colspan="2"><strong>School of Paramedical Sciences</strong></td>' . "\n" . '<td><strong>Paramedical Sciences</strong></td>' . "\n" . '<td>B.P.T</td>',
        $content
    );

    // 6. Fix legacy MSO non-breaking space tags on Faculty of Education
    $content = str_replace('<td colspan="2"><strong style="box-sizing: border-box; font-weight: bold;">&nbsp;</strong>Faculty of Education</td>', '<td colspan="2"><strong>Faculty of Education</strong></td>', $content);
    $content = str_replace('<td colspan="2"><strong>&nbsp;</strong>Faculty of Education</td>', '<td colspan="2"><strong>Faculty of Education</strong></td>', $content);

    file_put_contents($fpath, $content);
    echo "  [DONE] Restored $fpath\n";
}

echo "All missing School & Department names restored across all Criteria pages!\n";

