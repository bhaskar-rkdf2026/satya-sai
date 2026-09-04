<?php

$file1 = 'd:/xampp/htdocs/sssu/satya-sai/Examination/Interface.php';
$file2 = 'd:/xampp/htdocs/sssu/satya-sai/Examination/Examinations/Interface.php';

function update_file($f) {
    if (!file_exists($f)) return;
    $content = file_get_contents($f);
    $content = preg_replace(
        '/href="https:\/\/www\.universitymanagementsystem\.in\/SatyaSai"\s*(target="_blank"\s*rel="noopener")?/i',
        'href="#"',
        $content
    );
    file_put_contents($f, $content);
    echo "Updated $f buttons to href='#'\n";
}

update_file($file1);
update_file($file2);

