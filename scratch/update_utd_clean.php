<?php
$content = file_get_contents('scratch/fix_utd_paths.php');
// Extract $utd_body
preg_match('/\$utd_body\s*=\s*<<<\'PHP\'(.*?)\nPHP;/s', $content, $m);
$utd_body = $m[1];

require_once 'scratch/build_all_remaining_syllabus.php';

file_put_contents('Download/Syllabus/UTD.php', get_common_head('University Teaching Departments (UTD) Syllabus - SSSUTMS', 'University Teaching Departments') . "\n" . $utd_body . "\n" . get_common_foot());
echo "UTD.php written cleanly.\n";
