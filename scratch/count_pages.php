<?php
$base = 'd:/xampp/htdocs/satya-sai';
$all = [];
$it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($base, RecursiveDirectoryIterator::SKIP_DOTS));
foreach ($it as $f) {
    if ($f->isFile() && $f->getExtension() === 'php') {
        $rel = str_replace($base . '/', '', str_replace('\\', '/', $f->getPathname()));
        if (strpos($rel, 'scratch/') === 0 || strpos($rel, 'assets/') === 0) continue;
        $all[] = $rel;
    }
}

$admin = array_filter($all, fn($x) => strpos($x, 'admin/') === 0);
$includes = array_filter($all, fn($x) => strpos($x, 'includes/') === 0);
$tools = ['config.php', 'submit-handler.php', 'parallel_downloader.php', 'download_all_batches.php', 'analyze_urls.php', 'redesign_obe_batch.php', 'redesign_schemes_and_syllabi.php'];
$utilities = array_filter($all, fn($x) => in_array(basename($x), $tools));

$public = array_diff($all, $admin, $includes, $utilities);

$fully_dynamic = [];
$partially_dynamic = [];
$pure_static = [];

foreach ($public as $p) {
    $content = file_get_contents($base . '/' . $p);
    
    // Check if directly connected to an admin module
    $isFully = (
        in_array(basename($p), ['index.php', 'page.php', 'downloads.php', 'student-registration.php', 'contact.php', 'UpCommingEvents.php', 'EVENTS.php', 'Announcements.php', 'examinations.php']) ||
        strpos($content, 'get_notices') !== false ||
        strpos($content, 'get_events') !== false ||
        strpos($content, 'get_schemes') !== false ||
        strpos($content, 'pages.json') !== false ||
        strpos($content, 'submit-handler.php') !== false
    );
    
    if ($isFully) {
        $fully_dynamic[] = $p;
    } else {
        $hasDynamicHeaderFooter = (
            strpos($content, 'topbar.php') !== false ||
            strpos($content, 'footer.php') !== false ||
            strpos($content, 'config.php') !== false ||
            strpos($content, 'get_setting') !== false
        );
        if ($hasDynamicHeaderFooter) {
            $partially_dynamic[] = $p;
        } else {
            $pure_static[] = $p;
        }
    }
}

$rootPages = array_filter($public, fn($x) => strpos($x, '/') === false);

echo "TOTAL_PUBLIC: " . count($public) . "\n";
echo "ROOT_PUBLIC: " . count($rootPages) . "\n";
echo "SUBFOLDER_PUBLIC: " . (count($public) - count($rootPages)) . "\n";
echo "ADMIN_MODULES: " . count($admin) . "\n";
echo "FULLY_DYNAMIC: " . count($fully_dynamic) . "\n";
echo "PARTIALLY_DYNAMIC: " . count($partially_dynamic) . "\n";
echo "PURE_STATIC: " . count($pure_static) . "\n\n";

echo "--- ROOT PUBLIC PAGES (" . count($rootPages) . ") ---\n";
foreach ($rootPages as $rp) {
    $type = in_array($rp, $fully_dynamic) ? 'FULLY DYNAMIC (Admin Controlled)' : (in_array($rp, $partially_dynamic) ? 'PARTIALLY DYNAMIC (Header/Footer/Settings)' : 'STATIC');
    echo " - " . str_pad($rp, 30) . " => " . $type . "\n";
}

echo "\n--- PURE STATIC FILES (" . count($pure_static) . ") ---\n";
foreach ($pure_static as $ps) {
    echo " - " . $ps . "\n";
}
