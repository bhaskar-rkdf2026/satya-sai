<?php
$urls = [
    'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/SYLLABUS/BCom_Sy.zip' => 'assets/images/Files/Link/SYLLABUS/BCom_Sy.zip',
    'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/SYLLABUS/M.COM_IV_SEM.pdf' => 'assets/images/Files/Link/SYLLABUS/M.COM_IV_SEM.pdf'
];

foreach ($urls as $url => $dest) {
    echo "Downloading $url ...\n";
    $ctx = stream_context_create([
        "http" => ["timeout" => 10],
        "ssl" => ["verify_peer" => false, "verify_peer_name" => false]
    ]);
    $data = @file_get_contents($url, false, $ctx);
    if ($data !== false && strlen($data) > 500) {
        @mkdir(dirname($dest), 0777, true);
        file_put_contents($dest, $data);
        echo "  [SUCCESS] Saved to $dest (" . strlen($data) . " bytes)\n";
    } else {
        echo "  [FAILED] Could not download from live server.\n";
    }
}
