<?php
$files = [
    'Download/E-Content.php',
    'Download/NotificationOfPhdAward.php',
    'Download/Syllabus/Paramedical.php',
    'Download/Syllabus/Polytechnic_Engineering.php'
];

foreach ($files as $f) {
    if (!file_exists($f)) continue;
    $content = file_get_contents($f);
    // Replace new.gif or newAni.gif with a badge <span class="badge bg-danger">NEW</span> or similar
    $content = preg_replace('/<img[^>]+(?:new\.gif|newAni\.gif)[^>]*>/i', '<span class="badge bg-danger ms-1 text-uppercase" style="font-size: 10px; padding: 2px 6px;">New</span>', $content);
    // Remove broken placeholder clipart/temp images
    $content = preg_replace('/<img[^>]+(?:clip_image|thumb-1920-862737)[^>]*>/i', '', $content);
    file_put_contents($f, $content);
    echo "Cleaned images in: $f\n";
}
