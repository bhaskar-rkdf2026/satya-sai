<?php
$files = [
    "Download/Syllabus/BHMCT.php",
    "Download/Syllabus/MBA.php",
    "Download/Syllabus/MCA.php",
    "Download/Syllabus/PhysicalEducation.php"
];
foreach ($files as $f) {
    echo "==================== $f ====================\n";
    if (file_exists($f)) {
        echo file_get_contents($f) . "\n\n";
    } else {
        echo "NOT FOUND\n";
    }
}
