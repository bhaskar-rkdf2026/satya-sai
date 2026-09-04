<?php

$files = glob('d:/xampp/htdocs/sssu/satya-sai/Academic/NAAC/Criteria*.php');

foreach ($files as $fpath) {
    echo "Enforcing 100% center alignment in $fpath...\n";
    $content = file_get_contents($fpath);

    $css_center_alignment = <<<CSS
/* 100% Center Alignment for ALL Cells, Rows, Headers & Buttons */
.naac-custom-table th,
.naac-custom-table td,
.naac-custom-table tr td,
.naac-custom-table tr th {
  text-align: center !important;
  vertical-align: middle !important;
}
.naac-custom-table td * {
  text-align: center !important;
}
.naac-custom-table td {
  padding: 14px 18px !important;
  border: 1px solid #e2e8f0 !important;
  font-size: 0.925rem !important;
  color: #334155 !important;
  line-height: 1.5 !important;
  font-family: inherit !important;
}
CSS;

    // Update cell alignment rules in CSS
    $content = preg_replace('/\.naac-custom-table td\s*\{[^}]*text-align:\s*left[^}]*\}/is', $css_center_alignment, $content);
    
    if (strpos($content, '/* 100% Center Alignment') === false) {
        $content = str_replace('</style>', $css_center_alignment . "\n</style>", $content);
    }

    file_put_contents($fpath, $content);
    echo "  [DONE] Updated $fpath\n";
}

echo "All Criteria pages updated with 100% center alignment across all rows and cells!\n";

