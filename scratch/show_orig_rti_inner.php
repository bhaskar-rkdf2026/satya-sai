<?php
$c = file_get_contents(__DIR__ . '/../assets/images/sssutms.co.in/cms/Website/Download/RTI.html');
preg_match('/<div class="col-lg-9">[\s\S]*?<\/div>\s*<\/div>\s*<\/div>\s*<\/section>/i', $c, $m);
if ($m) {
    echo $m[0];
} else {
    // find index of "RTI"
    $pos = strpos($c, '<div class="col-lg-9">');
    echo substr($c, $pos, 2500);
}
