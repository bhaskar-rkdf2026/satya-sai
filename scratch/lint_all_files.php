<?php
// Lint all PHP files in repo
$dir = new RecursiveDirectoryIterator(dirname(__DIR__));
$iter = new RecursiveIteratorIterator($dir);
$error_count = 0;
$total = 0;

foreach ($iter as $file) {
    if ($file->isFile() && $file->getExtension() === 'php') {
        $path = $file->getPathname();
        if (strpos($path, 'vendor') !== false || strpos($path, '.git') !== false) continue;
        
        $total++;
        $cmd = "d:\\xampp\\php\\php.exe -l \"" . addslashes($path) . "\" 2>&1";
        $out = shell_exec($cmd);
        if (strpos($out, 'No syntax errors detected') === false) {
            echo "ERROR in $path: $out\n";
            $error_count++;
        }
    }
}

echo "\nLint check complete: $total files checked, $error_count syntax errors found.\n";
