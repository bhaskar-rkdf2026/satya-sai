<?php
$c = file_get_contents(__DIR__ . '/../assets/images/sssutms.co.in/cms/Website/Download/RTI.html');
preg_match('/<section class="main-content"[\s\S]*?<\/section>/i', $c, $m);
if ($m) {
    echo $m[0];
} else {
    preg_match('/<div class="main-content"[\s\S]*?<\/div>/i', $c, $m2);
    echo $m2 ? $m2[0] : "Not found";
}
