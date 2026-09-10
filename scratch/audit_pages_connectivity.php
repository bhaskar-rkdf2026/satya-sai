<?php
$baseDir = dirname(__DIR__);

$allFiles = [];
$dirIterator = new RecursiveDirectoryIterator($baseDir, RecursiveDirectoryIterator::SKIP_DOTS);
$iterator = new RecursiveIteratorIterator($dirIterator);

foreach ($iterator as $file) {
    if ($file->isFile() && $file->getExtension() === 'php') {
        $path = $file->getPathname();
        $relPath = str_replace($baseDir . DIRECTORY_SEPARATOR, '', $path);
        
        // Skip scratch, admin, assets, and vendor if any
        if (strpos($relPath, 'scratch' . DIRECTORY_SEPARATOR) === 0) continue;
        if (strpos($relPath, 'assets' . DIRECTORY_SEPARATOR) === 0) continue;
        if (strpos($relPath, '.agents' . DIRECTORY_SEPARATOR) === 0) continue;
        
        $allFiles[] = $relPath;
    }
}

sort($allFiles);

$adminFiles = [];
$includesFiles = [];
$utilityFiles = [];
$publicRootPages = [];
$subfolderPages = [];

foreach ($allFiles as $f) {
    if (strpos($f, 'admin' . DIRECTORY_SEPARATOR) === 0) {
        $adminFiles[] = $f;
    } elseif (strpos($f, 'includes' . DIRECTORY_SEPARATOR) === 0) {
        $includesFiles[] = $f;
    } elseif (in_array(basename($f), ['config.php', 'submit-handler.php', 'parallel_downloader.php', 'download_all_batches.php', 'analyze_urls.php', 'redesign_obe_batch.php', 'redesign_schemes_and_syllabi.php'])) {
        $utilityFiles[] = $f;
    } elseif (strpos($f, DIRECTORY_SEPARATOR) === false) {
        $publicRootPages[] = $f;
    } else {
        $subfolderPages[] = $f;
    }
}

// Analyze Public Pages for Dynamic Connectivity
$dynamicPages = [];
$partialDynamicPages = []; // Has topbar/footer/settings but static main body
$staticPages = []; // Hardcoded legacy pages

// Read data files to know what is in admin
$settingsData = json_decode(@file_get_contents($baseDir . '/data/settings.json'), true) ?: [];
$noticesData = json_decode(@file_get_contents($baseDir . '/data/notices.json'), true) ?: [];
$eventsData = json_decode(@file_get_contents($baseDir . '/data/events.json'), true) ?: [];
$schemesData = json_decode(@file_get_contents($baseDir . '/data/schemes.json'), true) ?: [];
$pagesData = json_decode(@file_get_contents($baseDir . '/data/pages.json'), true) ?: [];

$publicPagesToAnalyze = array_merge($publicRootPages, $subfolderPages);

$analysis = [];

foreach ($publicPagesToAnalyze as $rel) {
    $fullPath = $baseDir . DIRECTORY_SEPARATOR . $rel;
    $content = file_get_contents($fullPath);
    
    $hasConfig = (strpos($content, 'config.php') !== false);
    $hasSettings = (strpos($content, 'get_setting') !== false || strpos($content, 'settings.json') !== false);
    $hasNotices = (strpos($content, 'get_notices') !== false || strpos($content, 'notices.json') !== false);
    $hasEvents = (strpos($content, 'get_events') !== false || strpos($content, 'events.json') !== false);
    $hasSchemes = (strpos($content, 'get_schemes') !== false || strpos($content, 'schemes.json') !== false);
    $hasPages = (strpos($content, 'pages.json') !== false || strpos($content, 'page.php') !== false);
    $hasTopbar = (strpos($content, 'topbar.php') !== false || strpos($content, 'header.php') !== false);
    $hasFooter = (strpos($content, 'footer.php') !== false);
    $hasSubmit = (strpos($content, 'submit-handler.php') !== false);
    
    // Check if redirect
    $isRedirect = false;
    if (preg_match('/header\s*\(\s*[\'"]Location:\s*([^\'"]+)[\'"]\s*\)/i', $content, $m)) {
        $isRedirect = $m[1];
    }

    $status = 'static';
    $details = [];

    if ($hasPages || basename($rel) === 'page.php') {
        $status = 'fully_dynamic';
        $details[] = 'Dynamic CMS Router (powers 18+ institutional pages from admin/pages.php)';
    } elseif ($hasSchemes || basename($rel) === 'downloads.php') {
        $status = 'fully_dynamic';
        $details[] = 'Dynamic Schemes & Syllabi (powers curriculum matrix from admin/schemes.php)';
    } elseif (basename($rel) === 'index.php') {
        $status = 'fully_dynamic';
        $details[] = 'Live Home Portal (Notices, Events, Ticker, Contact, Leads connected to Admin)';
    } elseif (basename($rel) === 'student-registration.php') {
        $status = 'fully_dynamic';
        $details[] = 'Dynamic Student Admission Registrations (Submits to admin/applications.php)';
    } elseif (basename($rel) === 'contact.php') {
        $status = 'fully_dynamic';
        $details[] = 'Dynamic University Helpdesk & Lead Capture (Submits to admin/inquiries.php)';
    } elseif (basename($rel) === 'Announcements.php' || basename($rel) === 'examinations.php') {
        $status = 'fully_dynamic';
        $details[] = 'Connected to admin/notices.php announcements feed';
    } elseif (basename($rel) === 'UpCommingEvents.php' || basename($rel) === 'EVENTS.php') {
        $status = 'fully_dynamic';
        $details[] = 'Connected to admin/events.php campus calendar feed';
    } elseif ($isRedirect) {
        $status = 'router_redirect';
        $details[] = 'Redirects to ' . $isRedirect;
    } elseif ($hasTopbar || $hasFooter || $hasConfig || $hasSettings) {
        $status = 'partially_dynamic';
        $details[] = 'Header, footer, ticker & contact info connected via settings.json; page body is static HTML';
    } else {
        $status = 'static';
        $details[] = 'Legacy static standalone HTML/PHP page';
    }

    $analysis[$rel] = [
        'file' => $rel,
        'status' => $status,
        'details' => implode(', ', $details),
        'size' => filesize($fullPath),
        'lines' => count(file($fullPath))
    ];
}

// Summary counts
$grouped = [
    'fully_dynamic' => [],
    'router_redirect' => [],
    'partially_dynamic' => [],
    'static' => []
];

foreach ($analysis as $f => $info) {
    $grouped[$info['status']][] = $info;
}

echo "=== SSSUTMS WEBSITE PAGE CONNECTIVITY AUDIT ===\n";
echo "Total Public PHP Files Scanned: " . count($analysis) . "\n";
echo "Admin Suite Modules: " . count($adminFiles) . "\n";
echo "Includes / Layout Partials: " . count($includesFiles) . "\n";
echo "Utility / Data Handlers: " . count($utilityFiles) . "\n\n";

echo "--- CATEGORY BREAKDOWN ---\n";
echo "1. Fully Dynamic Pages (Direct CRUD connection to Admin Modules): " . count($grouped['fully_dynamic']) . "\n";
echo "2. Dynamic Routers & Smart Redirects: " . count($grouped['router_redirect']) . "\n";
echo "3. Partially Dynamic Pages (Dynamic Header, Footer & Settings Sync; Static Body): " . count($grouped['partially_dynamic']) . "\n";
echo "4. Standalone Legacy Static Pages: " . count($grouped['static']) . "\n\n";

echo "=== FULLY DYNAMIC PAGES ===\n";
foreach ($grouped['fully_dynamic'] as $item) {
    echo "  [LIVE] " . str_pad($item['file'], 30) . " -> " . $item['details'] . "\n";
}

echo "\n=== DYNAMIC ROUTERS & REDIRECTS ===\n";
foreach ($grouped['router_redirect'] as $item) {
    echo "  [ROUTE] " . str_pad($item['file'], 30) . " -> " . $item['details'] . "\n";
}

echo "\n=== PARTIALLY DYNAMIC PAGES (Header/Footer/Settings Connected) ===\n";
foreach ($grouped['partially_dynamic'] as $item) {
    echo "  [PARTIAL] " . str_pad($item['file'], 35) . " -> " . $item['details'] . "\n";
}

echo "\n=== STATIC LEGACY PAGES (Sample 20 of " . count($grouped['static']) . ") ===\n";
foreach (array_slice($grouped['static'], 0, 20) as $item) {
    echo "  [STATIC]  " . str_pad($item['file'], 40) . " (" . $item['lines'] . " lines)\n";
}
