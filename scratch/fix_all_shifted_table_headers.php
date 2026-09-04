<?php

$files = glob('d:/xampp/htdocs/sssu/satya-sai/Academic/NAAC/Criteria*.php');

foreach ($files as $fpath) {
    echo "Auditing shifted headers in $fpath...\n";
    $content = file_get_contents($fpath);

    // 1. Replace empty <td></td> at the start of header rows
    $content = preg_replace(
        '/<tr[^>]*>\s*<td[^>]*>\s*<\/td>\s*<td[^>]*>\s*<strong[^>]*>Department<\/strong>\s*<\/td>\s*<td[^>]*>\s*<strong[^>]*>Program<\/strong>\s*<\/td>\s*<td[^>]*>\s*<strong[^>]*>Session[^<]*<\/strong>\s*<\/td>\s*<\/tr>/is',
        '<tr class="naac-table-header"><th colspan="2">School Name</th><th>Department</th><th>Program</th><th colspan="2">Session (2017-18 To 2021-22) / Report</th></tr>',
        $content
    );

    // 2. Fix any other shifted header rows
    $content = preg_replace(
        '/<tr[^>]*>\s*<th[^>]*>\s*<\/th>\s*<th[^>]*>\s*<strong[^>]*>Department<\/strong>\s*<\/th>\s*<th[^>]*>\s*<strong[^>]*>Program<\/strong>\s*<\/th>\s*<th[^>]*>\s*<strong[^>]*>Session[^<]*<\/strong>\s*<\/th>\s*<\/tr>/is',
        '<tr class="naac-table-header"><th colspan="2">School Name</th><th>Department</th><th>Program</th><th colspan="2">Session (2017-18 To 2021-22) / Report</th></tr>',
        $content
    );

    // 3. Fix any table header missing colspan="2" on the last column or School Name column
    $content = preg_replace(
        '/<tr class="naac-table-header">\s*<th colspan="2">\s*<strong>School Name<\/strong>\s*<\/th>\s*<th>\s*<strong>Department\s*<\/strong>\s*<\/th>\s*<th>\s*<strong>Program\s*<\/strong>\s*<\/th>\s*<th>\s*<strong>Session[^<]*<\/strong>\s*<\/th>\s*<\/tr>/is',
        '<tr class="naac-table-header"><th colspan="2">School Name</th><th>Department</th><th>Program</th><th colspan="2">Session (2017-18 To 2021-22) / Report</th></tr>',
        $content
    );

    // 4. Clean up any leftover empty td/th header tags
    $content = str_replace('<tr><td></td><td><strong>Department</strong></td>', '<tr class="naac-table-header"><th colspan="2">School Name</th><th>Department</th>', $content);

    file_put_contents($fpath, $content);
    echo "  [DONE] Fixed $fpath\n";
}

echo "All Criteria shifted headers fixed!\n";

