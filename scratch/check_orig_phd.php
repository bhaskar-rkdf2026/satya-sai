<?php
$orig = __DIR__ . '/../assets/images/sssutms.co.in/cms/Website/Download/NotificationOfPhdAward.html';
if (file_exists($orig)) {
    echo file_get_contents($orig);
} else {
    echo "Not found";
}
