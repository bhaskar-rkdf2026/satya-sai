<?php
$urls = [
    "http://localhost/satya-sai/Download/Syllabus/BHMCT.php",
    "http://localhost/satya-sai/Download/Syllabus/MBA.php",
    "http://localhost/satya-sai/Download/Syllabus/MCA.php",
    "http://localhost/satya-sai/Download/Syllabus/PhysicalEducation.php"
];

foreach ($urls as $u) {
    $ctx = stream_context_create(["http" => ["timeout" => 5]]);
    $res = @file_get_contents($u, false, $ctx);
    if ($res !== false) {
        $len = strlen($res);
        $has_fatal = (stripos($res, "Fatal error") !== false || stripos($res, "Parse error") !== false);
        echo "[HTTP 200 OK] $u (Size: $len bytes, Fatal/Parse Error: " . ($has_fatal ? "YES" : "NO") . ")\n";
    } else {
        echo "[FAILED] $u\n";
    }
}
