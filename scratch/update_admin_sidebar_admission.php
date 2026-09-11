<?php
$files = glob(__DIR__ . '/../admin/*.php');
foreach ($files as $f) {
    if (in_array(basename($f), ['admission.php', 'login.php', 'logout.php'])) continue;
    $code = file_get_contents($f);
    if (strpos($code, 'href="admission.php"') === false) {
        if (preg_match('/<li><a href="examination\.php"[^>]*>.*?<\/li>/s', $code, $m)) {
            $insert = "<li><a href=\"admission.php\" class=\"nav-link\"><i class=\"fa fa-user-graduate\"></i> Admission Cell (7)</a></li>\n    " . $m[0];
            $code = str_replace($m[0], $insert, $code);
            file_put_contents($f, $code);
            echo "Updated: " . basename($f) . "\n";
        }
    }
}
echo "ALL ADMIN SIDEBARS UPDATED WITH ADMISSION CELL.\n";
