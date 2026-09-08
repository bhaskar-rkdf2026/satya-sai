<?php
// Script to restore any file from HEAD if HEAD was already clean and had no broken links
$files = [
    'Academic/AcademicCalendar.php',
    'Academic/PHD.php',
    'Academic/NAAC/CriteriaFive.php',
    'About/EVENTS.php',
    'Academic/Activities/EVENTS-2.php',
    'Academic/EVENTS.php',
    'Admission/EVENTS.php',
    'Download/EVENTS.php',
    'Examination/EVENTS.php',
    'Research/EVENTS.php'
];

foreach ($files as $f) {
    exec("git checkout HEAD -- \"$f\"");
    echo "Restored from HEAD: $f\n";
}
