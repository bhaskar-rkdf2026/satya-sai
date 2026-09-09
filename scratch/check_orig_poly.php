<?php
$cmd = 'git show HEAD:Download/Syllabus/Polytechnic_Engineering.php';
exec($cmd, $out);
echo implode("\n", array_slice($out, 0, 50)) . "\n";

preg_match_all('/href=[\'"]([^\'"]+)[\'"]/i', implode("\n", $out), $matches);
echo "=== Original Links in Polytechnic_Engineering.php ===\n";
foreach ($matches[1] as $m) {
    echo "  $m\n";
}
