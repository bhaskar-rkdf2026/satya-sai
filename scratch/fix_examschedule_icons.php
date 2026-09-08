<?php
$rootDir = 'd:/xampp/htdocs/satya-sai';
$files = ['d:/xampp/htdocs/satya-sai/Examination/ExamSchedule.php'];

foreach ($files as $file) {
    $content = file_get_contents($file);
    $orig = $content;
    
    // Replace broken new.gif paths
    $content = preg_replace(
        '/src=["\'][^"\']*registration\.telangana\.gov\.in\/resources\/img\/new\.gif["\']/i',
        'src="<?php echo BASE_URL; ?>assets/images/Files/Link/NEW_animated_04082026_0213.gif"',
        $content
    );
    
    // Replace broken ftcdn paths
    $content = preg_replace(
        '/src=["\'][^"\']*t4\.ftcdn\.net\/jpg\/[^"\']*["\']/i',
        'src="<?php echo BASE_URL; ?>assets/images/Files/Link/NEW_animated_04082026_0213.gif"',
        $content
    );
    
    if ($content !== $orig) {
        file_put_contents($file, $content);
        echo "Updated $file successfully!\n";
    } else {
        echo "No changes needed for $file\n";
    }
}
