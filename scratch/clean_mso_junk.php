<?php

$files = ['CriteriaFour.php', 'CriteriaFive.php'];

foreach ($files as $fname) {
    $fpath = 'd:/xampp/htdocs/sssu/satya-sai/Academic/NAAC/' . $fname;
    if (file_exists($fpath)) {
        echo "Cleaning MsoXml junk in $fname...\n";
        $content = file_get_contents($fpath);

        // Strip MsoXml comments and MS Office conditional comments
        $content = preg_replace('/<!--\s*\[if\s+gte\s+mso\s+9\].*?<!\[endif\]-->/is', '', $content);
        $content = preg_replace('/<!--\s*\[if\s+supportFields\].*?<!\[endif\]-->/is', '', $content);
        $content = preg_replace('/<xml>.*?<\/xml>/is', '', $content);

        file_put_contents($fpath, $content);
        echo "  [DONE] $fname cleaned\n";
    }
}

echo "All legacy MsoXml junk removed!\n";

