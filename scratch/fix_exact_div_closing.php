<?php

$files = glob('d:/xampp/htdocs/sssu/satya-sai/Academic/NAAC/Criteria*.php');

foreach ($files as $fpath) {
    echo "Cleaning closing divs in $fpath...\n";
    $content = file_get_contents($fpath);

    // Fix end div sequence before sidebar
    $content = preg_replace(
        '/<\/div>\s*<\/div>\s*<\/article>\s*<\/div>\s*<\/div>/is',
        "</div>\n</article>\n</div>\n</div>\n</div>",
        $content
    );

    file_put_contents($fpath, $content);
    echo "  [DONE] $fpath\n";
}

echo "All closing div sequences cleaned!\n";

