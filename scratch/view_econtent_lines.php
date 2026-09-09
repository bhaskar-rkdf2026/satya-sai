<?php
$lines = file(__DIR__ . '/../Download/E-Content.php');
for ($i = 50; $i < min(160, count($lines)); $i++) {
    echo ($i+1) . ": " . $lines[$i];
}
