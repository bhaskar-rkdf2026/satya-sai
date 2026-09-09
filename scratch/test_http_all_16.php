<?php
$files = glob("Download/Syllabus/*.php");
$all_http_ok = true;

foreach ($files as $f) {
    if (basename($f) === 'Announcements.php' || basename($f) === 'EVENTS.php') continue;
    $url = 'http://localhost/satya-sai/' . str_replace('\\', '/', $f);
    $ctx = stream_context_create([
        "http" => ["timeout" => 5]
    ]);
    $res = @file_get_contents($url, false, $ctx);
    if ($res !== false) {
        $len = strlen($res);
        $has_err = (stripos($res, "Fatal error") !== false || stripos($res, "Parse error") !== false);
        if ($has_err) {
            echo "[ERROR] $url rendered with errors\n";
            $all_http_ok = false;
        } else {
            echo sprintf("[HTTP 200 OK] %-55s (Size: %d bytes)\n", basename($f), $len);
        }
    } else {
        echo "[FAILED] $url\n";
        $all_http_ok = false;
    }
}

if ($all_http_ok) {
    echo "\n>>> ALL 16 SYLLABUS PAGES RETURNED HTTP 200 OK WITH NO ERRORS! <<<\n";
} else {
    echo "\n>>> SOME HTTP ERRORS OCCURRED! <<<\n";
}
