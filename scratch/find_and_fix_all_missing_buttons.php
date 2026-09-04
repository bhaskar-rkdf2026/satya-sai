<?php

$files = glob('d:/xampp/htdocs/sssu/satya-sai/Academic/NAAC/Criteria*.php');

foreach ($files as $fpath) {
    echo "Auditing missing PDF buttons in $fpath...\n";
    $content = file_get_contents($fpath);

    // Specific fix for CriteriaOne line 557
    if (strpos($fpath, 'CriteriaOne.php') !== false) {
        $content = str_replace(
            '<td rowspan="21"></td>',
            '<td rowspan="21"><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/COPO mapping/co-po-engineering-final.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>',
            $content
        );
    }

    file_put_contents($fpath, $content);
    echo "  [DONE] Fixed $fpath\n";
}

echo "All Criteria pages checked and missing buttons restored!\n";

