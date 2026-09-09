<?php
$c = file_get_contents(__DIR__ . '/../assets/images/sssutms.co.in/cms/Website/Download/NotificationOfPhdAward.html');
// extract main body
preg_match('/<body[\s\S]*?<\/body>/i', $c, $m);
if ($m) {
    // remove scripts and styles
    $clean = preg_replace('/<script[\s\S]*?<\/script>/i', '', $m[0]);
    $clean = preg_replace('/<style[\s\S]*?<\/style>/i', '', $clean);
    echo strip_tags($clean, '<table><tr><td><th><a><h1><h2><h3><h4><h5><h6><p><ul><li><div>');
}
