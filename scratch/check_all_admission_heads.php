<?php
$files = glob('Admission/*.php');
foreach ($files as $f) {
    echo "=== $f ===\n";
    $content = file_get_contents($f);
    $first50 = substr($content, 0, 80);
    echo $first50 . "\n";
    if (substr(trim($content), 0, 5) !== '<?php') {
        echo ">>> ERROR: Missing <?php at start of $f!\n";
    }
}
