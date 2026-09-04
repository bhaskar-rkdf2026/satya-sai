<?php

$files = glob('d:/xampp/htdocs/sssu/satya-sai/Academic/NAAC/Criteria*.php');

foreach ($files as $fpath) {
    echo "Fixing HTML structure in $fpath...\n";
    $content = file_get_contents($fpath);

    // 1. Remove global <div class="table-responsive"> that wrapped entire article
    $content = preg_replace('/<div class="table-responsive">\s*<article[^>]*>/is', '<article class="fs-5 lh-lg text-secondary">', $content);
    
    // 2. Wrap each <table ...> </table> inside its own <div class="table-responsive">
    // Remove any nested table-responsive first
    $content = preg_replace('/<div class="table-responsive">\s*(<table[^>]*>.*?<\/table>)\s*<\/div>/is', '$1', $content);
    $content = preg_replace('/<table class="table table-bordered table-hover align-middle naac-custom-table">(.*?)<\/table>/is', '<div class="table-responsive"><table class="table table-bordered table-hover align-middle naac-custom-table">$1</table></div>', $content);

    // 3. Fix closing tags before sidebar
    $content = preg_replace('/<\/article>\s*<\/div>\s*<\/div>\s*<\/div>\s*<\/div>/is', "</article>\n</div>\n</div>", $content);
    $content = preg_replace('/<\/article>\s*<\/div>\s*<\/div>\s*<\/div>/is', "</article>\n</div>\n</div>", $content);

    file_put_contents($fpath, $content);
    echo "  [DONE] Fixed $fpath\n";
}

echo "All Criteria HTML structures fixed!\n";

