<?php
$content = file_get_contents('d:/xampp/htdocs/sssu/satya-sai/Academic/Activities/Events.php');
$content = preg_replace('/data:image\/[^;]+;base64,[a-zA-Z0-9+\/=]+/', '[BASE64_IMAGE]', $content);
file_put_contents('d:/xampp/htdocs/sssu/satya-sai/scratch/events_cleaned.html', $content);
echo "Cleaned! Length: " . strlen($content) . "\n";
