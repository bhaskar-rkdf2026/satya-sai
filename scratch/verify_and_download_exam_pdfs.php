<?php

$fpath = 'd:/xampp/htdocs/sssu/satya-sai/Examination/ExamSchedule.php';
$content = file_get_contents($fpath);

$base_dir = 'd:/xampp/htdocs/sssu/satya-sai/';

// Find all href links
preg_match_all('/href=["\']([^"\']+)["\']/i', $content, $matches);
$links = array_unique($matches[1]);

echo "Total unique links found: " . count($links) . "\n";

$downloaded = 0;
$missing = 0;
$valid = 0;

foreach ($links as $raw_link) {
    if (empty($raw_link) || $raw_link === '#') continue;

    // Convert PHP BASE_URL tag or relative path to local disk path
    $clean_link = str_replace('<?php echo BASE_URL; ?>', '', $raw_link);
    $clean_link = ltrim($clean_link, '/');
    $local_path = $base_dir . urldecode($clean_link);

    // Normalize path separators
    $local_path = str_replace('/', DIRECTORY_SEPARATOR, $local_path);

    if (file_exists($local_path) && filesize($local_path) > 100) {
        $valid++;
    } else {
        $missing++;
        echo "Missing local file: $local_path\n";

        // Try downloading from live site
        // Construct remote URLs to try
        $filename = basename(urldecode($clean_link));
        $remote_urls = [
            'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/ExamSchedules/' . rawurlencode($filename),
            'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/' . rawurlencode($filename),
            'https://sssutms.co.in/cms/Website/Files/Link/ExamSchedules/' . rawurlencode($filename),
            'https://sssutms.co.in/cms/Website/Files/Link/' . rawurlencode($filename)
        ];

        $dir = dirname($local_path);
        if (!is_dir($dir)) mkdir($dir, 0777, true);

        $success = false;
        foreach ($remote_urls as $url) {
            echo "  Attempting download from: $url\n";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, 12);
            $data = curl_exec($ch);
            $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            if ($code == 200 && strlen($data) > 500) {
                file_put_contents($local_path, $data);
                echo "  [SUCCESS] Saved " . filesize($local_path) . " bytes\n";
                $downloaded++;
                $success = true;
                break;
            }
        }

        if (!$success) {
            echo "  [FAILED] Could not download $filename from any live URL.\n";
        }
    }
}

echo "\nSummary:\n";
echo "  Valid Local Files: $valid\n";
echo "  Missing Files: $missing\n";
echo "  Successfully Downloaded: $downloaded\n";

