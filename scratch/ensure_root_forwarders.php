<?php
$pages = [
    'NotificationOfPhdAward.php' => 'Download/NotificationOfPhdAward.php',
    'Forms.php' => 'Download/Forms.php',
    'E-Content.php' => 'Download/E-Content.php',
    'Alumni.php' => 'Download/Alumni.php',
    'RTI.php' => 'Download/RTI.php',
    'Barrier_Free_Environment.php' => 'Download/Barrier_Free_Environment.php',
    'EVENTS.php' => 'Download/EVENTS.php',
    'Announcements.php' => 'Download/Announcements.php',
    'NBADCS.php' => 'Download/NBADCS.php'
];

foreach ($pages as $rootName => $subPath) {
    $rootFile = __DIR__ . '/../' . $rootName;
    if (!file_exists($rootFile)) {
        file_put_contents($rootFile, "<?php\nrequire_once __DIR__ . '/" . $subPath . "';\n");
        echo "Created root forwarder for: $rootName\n";
    } else {
        echo "Root file already exists for: $rootName\n";
    }
}
