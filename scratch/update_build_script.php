<?php
$fix = file_get_contents('scratch/fix_utd_paths.php');
preg_match('/\$utd_body\s*=\s*<<<\'PHP\'(.*?)\nPHP;/s', $fix, $m);
$new_utd = $m[1];

$build = file_get_contents('scratch/build_all_remaining_syllabus.php');
$pattern = '/\$utd_body\s*=\s*<<<\'PHP\'.*?\nPHP;/s';
$replacement = "\$utd_body = <<<'PHP'" . $new_utd . "\nPHP;";

$build = preg_replace($pattern, $replacement, $build);
file_put_contents('scratch/build_all_remaining_syllabus.php', $build);
echo "build_all_remaining_syllabus.php updated successfully.\n";
