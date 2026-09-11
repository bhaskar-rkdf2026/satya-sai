<?php
$files = glob(__DIR__ . '/../admin/*.php');
foreach ($files as $f) {
    if (in_array(basename($f), ['research.php', 'login.php', 'logout.php'])) continue;
    $code = file_get_contents($f);
    if (strpos($code, 'href="research.php"') === false) {
        if (preg_match('/<li><a href="examination\.php"[^>]*>.*?<\/li>/s', $code, $m)) {
            $insert = $m[0] . "\n    <li><a href=\"research.php\" class=\"nav-link\"><i class=\"fa fa-flask\"></i> Research Cell (12)</a></li>";
            $code = str_replace($m[0], $insert, $code);
            file_put_contents($f, $code);
            echo "Updated: " . basename($f) . "\n";
        }
    }
}
echo "ADMIN SIDEBAR UPDATE COMPLETE.\n";
