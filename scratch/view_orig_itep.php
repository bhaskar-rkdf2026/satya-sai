<?php
$c = file_get_contents(__DIR__ . '/../assets/images/sssutms.co.in/cms/Website/ITEP/index.html');
preg_match('/<div class="col-lg-9">[\s\S]*?<\/div>\s*<\/div>\s*<\/div>\s*<\/section>/i', $c, $m);
if ($m) {
    echo $m[0];
} else {
    echo substr($c, strpos($c, '<body'), 2000);
}
