<?php
/**
 * Global Configuration & Data Helper
 * Sri Satya Sai University of Technology & Medical Sciences (SSSUTMS)
 */

if (session_status() === PHP_SESSION_NONE && !headers_sent()) {
    session_start();
}

// Base Paths & URLs
define('BASE_DIR', __DIR__);
define('ROOT_DIR', __DIR__);
define('DATA_DIR', __DIR__ . '/data');
define('UPLOAD_DIR', __DIR__ . '/assets/uploads');

/**
 * Get JSON Data with error handling
 */
function get_json_data($filename, $default = []) {
    $filePath = DATA_DIR . '/' . $filename;
    if (file_exists($filePath)) {
        $content = file_get_contents($filePath);
        $data = json_decode($content, true);
        if (json_last_error() === JSON_ERROR_NONE && is_array($data)) {
            return $data;
        }
    }
    return $default;
}

/**
 * Global Setting getter with fallback
 */
function get_setting($key, $default = null) {
    static $settings = null;
    if ($settings === null) {
        $settings = get_json_data('settings.json', []);
    }
    return $settings[$key] ?? $default;
}

// Global Site Constants (Dynamic with Fallbacks)
define('SITE_NAME', get_setting('site_name', 'Sri Satya Sai University of Technology and Medical Sciences'));
define('SITE_SHORT_NAME', get_setting('site_short_name', 'SSSUTMS, Sehore'));
define('SITE_TAGLINE', get_setting('site_tagline', 'Premier University in Madhya Pradesh | Accredited & Approved'));
define('CAMPUS_ADDRESS', get_setting('campus_address', 'Opp. Oilfed Plant, Bhopal-Indore Road, Sehore (M.P.) - 466001'));
define('ADMISSION_HELPLINE', get_setting('admission_helpline', '+91-7748900028'));
define('OFFICIAL_EMAIL', get_setting('official_email', 'info@sssutms.co.in'));
define('EXAM_EMAIL', get_setting('exam_email', 'exam@sssutms.co.in'));
// Universal Base URL auto-detection
$dir = str_replace('\\', '/', __DIR__);
if (preg_match('#/htdocs(/.*)$#i', $dir, $m)) {
    define('BASE_URL', rtrim($m[1], '/') . '/');
} elseif (preg_match('#/(sssutms/satya-sai|sssutms/sssutms-portal|satya-sai)/?#i', $dir, $m)) {
    define('BASE_URL', '/' . trim($m[1], '/') . '/');
} else {
    define('BASE_URL', '/sssutms/satya-sai/');
}

/**
 * Base URL helper function
 * Returns full base URL with optional appended path
 */
function base_url($path = '') {
    return BASE_URL . ltrim($path, '/');
}

// Ensure upload directories exist
$uploadDirs = [
    UPLOAD_DIR,
    UPLOAD_DIR . '/notices',
    UPLOAD_DIR . '/events',
    UPLOAD_DIR . '/schemes',
    UPLOAD_DIR . '/documents',
    UPLOAD_DIR . '/home',
    UPLOAD_DIR . '/about',
    UPLOAD_DIR . '/faculties',
];
foreach ($uploadDirs as $ud) {
    if (!is_dir($ud)) {
        @mkdir($ud, 0777, true);
    }
}

/**
 * Save JSON Data safely
 */
function save_json_data($filename, $data) {
    $filePath = DATA_DIR . '/' . $filename;
    if (!is_dir(DATA_DIR)) {
        mkdir(DATA_DIR, 0777, true);
    }
    return file_put_contents($filePath, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
}

/**
 * Helper to get home page section data with fallback
 */
function get_home_section($section_key, $default = [], $forceReload = false) {
    static $homeData = null;
    if ($homeData === null || $forceReload) {
        $homeData = get_json_data('home_sections.json', []);
    }
    return $homeData[$section_key] ?? $default;
}

/**
 * Helper to save a single home page section
 */
function save_home_section($section_key, $section_data) {
    $homeData = get_json_data('home_sections.json', []);
    $homeData[$section_key] = $section_data;
    $res = save_json_data('home_sections.json', $homeData);
    get_home_section($section_key, [], true); // Reset static cache
    return $res;
}

/**
 * Helper to save all home sections at once
 */
function save_all_home_sections($all_data) {
    $res = save_json_data('home_sections.json', $all_data);
    get_home_section('', [], true); // Reset static cache
    return $res;
}

/**
 * Helper to get an About Page configuration
 */
function get_about_page($slug, $default = [], $forceReload = false) {
    static $aboutPages = null;
    if ($aboutPages === null || $forceReload) {
        $aboutPages = get_json_data('about_pages.json', []);
    }
    return $aboutPages[$slug] ?? $default;
}

/**
 * Helper to get all About Pages, optionally filtered by group
 */
function get_all_about_pages($group = 'all') {
    $pages = get_json_data('about_pages.json', []);
    if ($group === 'all' || empty($group)) {
        return $pages;
    }
    return array_filter($pages, fn($p) => ($p['group'] ?? '') === $group);
}

/**
 * Helper to save an About Page configuration
 */
function save_about_page($slug, $data) {
    $pages = get_json_data('about_pages.json', []);
    if (isset($pages[$slug])) {
        $pages[$slug] = array_merge($pages[$slug], $data);
    } else {
        $pages[$slug] = $data;
    }
    $pages[$slug]['updated_at'] = date('Y-m-d H:i:s');
    $res = save_json_data('about_pages.json', $pages);
    get_about_page('', [], true); // Reset cache
    return $res;
}

/**
 * Helper to get Public Disclosure Categories & Items
 */
function get_public_disclosures($forceReload = false) {
    static $disclosureData = null;
    if ($disclosureData === null || $forceReload) {
        $disclosureData = get_json_data('public_disclosure.json', []);
    }
    return $disclosureData;
}

/**
 * Helper to save Public Disclosure Categories & Items
 */
function save_public_disclosures($data) {
    $res = save_json_data('public_disclosure.json', $data);
    get_public_disclosures(true); // Reset cache
    return $res;
}

/**
 * Helper to get a specific Faculty/Department page data
 */
function get_faculty_page($slug, $default = [], $forceReload = false) {
    static $facultiesData = null;
    if ($facultiesData === null || $forceReload) {
        $facultiesData = get_json_data('academic_faculties.json', []);
    }
    if (empty($slug)) {
        return $facultiesData;
    }
    return $facultiesData[$slug] ?? $default;
}

/**
 * Helper to get all Faculty/Department pages
 */
function get_all_faculty_pages($forceReload = false) {
    return get_faculty_page('', [], $forceReload);
}

/**
 * Helper to save a Faculty/Department page
 */
function save_faculty_page($slug, $data) {
    $faculties = get_json_data('academic_faculties.json', []);
    if (isset($faculties[$slug])) {
        $faculties[$slug] = array_merge($faculties[$slug], $data);
    } else {
        $faculties[$slug] = $data;
    }
    $faculties[$slug]['updated_at'] = date('Y-m-d H:i:s');
    $res = save_json_data('academic_faculties.json', $faculties);
    get_faculty_page('', [], true); // Reset cache
    return $res;
}

/**
 * Helper to get all notices
 */
function get_notices($category = 'all', $limit = 0) {
    $legacyNotices = get_json_data('notices.json', []);
    $examNotifs = get_page_documents('ExamNotifications');
    $alerts = get_page_documents('EntranceExamAlert');

    $combined = [];
    $seen = [];

    // 1. Prioritize active Examination Notifications
    foreach ($examNotifs as $en) {
        $t = trim($en['title'] ?? '');
        if (empty($t) || isset($seen[strtolower($t)])) continue;
        $seen[strtolower($t)] = true;

        $fileUrl = $en['file'] ?? '#';
        if (strpos($fileUrl, 'http') !== 0 && strpos($fileUrl, 'ftp') !== 0 && $fileUrl !== '#') {
            $fileUrl = BASE_URL . ltrim($fileUrl, '/');
        }

        $combined[] = [
            'id' => $en['id'] ?? uniqid(),
            'title' => $t,
            'category' => $en['category'] ?? 'notices',
            'date' => $en['date'] ?? date('Y-m-d'),
            'file' => $fileUrl,
            'link' => $fileUrl,
            'is_new' => (isset($en['status']) && strtolower($en['status']) === 'new') || (count($combined) < 4)
        ];
    }

    // 2. Prioritize Entrance Exam Alerts
    foreach ($alerts as $al) {
        $t = trim($al['title'] ?? '');
        if (empty($t) || isset($seen[strtolower($t)])) continue;
        $seen[strtolower($t)] = true;

        $fileUrl = $al['file'] ?? '#';
        if (strpos($fileUrl, 'http') !== 0 && strpos($fileUrl, 'ftp') !== 0 && $fileUrl !== '#') {
            $fileUrl = BASE_URL . ltrim($fileUrl, '/');
        }

        $combined[] = [
            'id' => $al['id'] ?? uniqid(),
            'title' => $t,
            'category' => 'admission',
            'date' => $al['date'] ?? date('Y-m-d'),
            'file' => $fileUrl,
            'link' => $fileUrl,
            'is_new' => true
        ];
    }

    // 3. Merge legacy notices
    foreach ($legacyNotices as $ln) {
        $t = trim($ln['title'] ?? '');
        if (empty($t) || isset($seen[strtolower($t)])) continue;
        $seen[strtolower($t)] = true;

        $fileUrl = $ln['link'] ?? '';
        if (empty($fileUrl) || $fileUrl === '#') {
            if (!empty($ln['file'])) {
                if (file_exists(BASE_DIR . '/assets/uploads/notices/' . $ln['file'])) {
                    $fileUrl = BASE_URL . 'assets/uploads/notices/' . $ln['file'];
                } elseif (file_exists(BASE_DIR . '/assets/images/Files/Widget/Download/' . $ln['file'])) {
                    $fileUrl = BASE_URL . 'assets/images/Files/Widget/Download/' . $ln['file'];
                } elseif (file_exists(BASE_DIR . '/assets/images/Files/Notices/' . $ln['file'])) {
                    $fileUrl = BASE_URL . 'assets/images/Files/Notices/' . $ln['file'];
                }
            }
        }

        $combined[] = [
            'id' => $ln['id'] ?? uniqid(),
            'title' => $t,
            'category' => $ln['category'] ?? 'notices',
            'date' => $ln['date'] ?? date('Y-m-d'),
            'file' => $fileUrl ?: BASE_URL . 'Examination/ExamNotifications.php',
            'link' => $fileUrl ?: BASE_URL . 'Examination/ExamNotifications.php',
            'is_new' => !empty($ln['is_new'])
        ];
    }

    if ($category !== 'all') {
        $combined = array_filter($combined, function($n) use ($category) {
            return strcasecmp($n['category'] ?? '', $category) === 0;
        });
    }

    // Sort newest first
    usort($combined, function($a, $b) {
        return strtotime($b['date'] ?? '2026-01-01') - strtotime($a['date'] ?? '2026-01-01');
    });

    if ($limit > 0) {
        return array_slice($combined, 0, $limit);
    }
    return $combined;
}

/**
 * Helper to get upcoming events
 */
function get_events($limit = 0) {
    $events = get_json_data('events.json', []);
    if ($limit > 0) {
        return array_slice($events, 0, $limit);
    }
    return $events;
}

/**
 * Helper to get curriculum schemes
 */
function get_schemes($faculty = 'all') {
    $schemes = get_json_data('schemes.json', []);
    if ($faculty !== 'all') {
        $schemes = array_filter($schemes, function($s) use ($faculty) {
            return isset($s['faculty']) && stripos($s['faculty'], $faculty) !== false;
        });
    }
    return $schemes;
}

/**
 * Helper to get documents for a specific page
 * $page_key: e.g. 'Approvals', 'ExamSchedule', 'Ordinances', 'FeesStructure', 'Patents'
 */
function get_page_documents($page_key, $category = 'all') {
    $allDocs = get_json_data('page_documents.json', []);
    if (isset($allDocs[$page_key]['documents']) && is_array($allDocs[$page_key]['documents'])) {
        $pageDocs = $allDocs[$page_key]['documents'];
    } elseif (isset($allDocs[$page_key]) && is_array($allDocs[$page_key])) {
        $pageDocs = $allDocs[$page_key];
    } else {
        $pageDocs = [];
    }
    if ($category !== 'all' && !empty($category)) {
        $pageDocs = array_filter($pageDocs, function($d) use ($category) {
            return isset($d['category']) && (strcasecmp($d['category'], $category) === 0 || stripos($d['category'], $category) !== false);
        });
    }
    return $pageDocs;
}

/**
 * Helper to get all registered page keys in page_documents
 */
function get_all_document_pages() {
    return get_json_data('page_documents.json', []);
}

/**
 * Save a document entry to a page
 */
function save_page_document($page_key, $docData, $section = 'General', $pageTitle = '') {
    $allDocs = get_json_data('page_documents.json', []);
    if (!isset($allDocs[$page_key])) {
        $allDocs[$page_key] = [
            'title' => !empty($pageTitle) ? $pageTitle : ucwords(str_replace(['_', '-'], ' ', $page_key)),
            'section' => $section,
            'documents' => []
        ];
    }
    if (!empty($pageTitle)) {
        $allDocs[$page_key]['title'] = $pageTitle;
    }
    if (!empty($section)) {
        $allDocs[$page_key]['section'] = $section;
    }

    $existingIndex = -1;
    if (isset($docData['id'])) {
        foreach ($allDocs[$page_key]['documents'] as $idx => $d) {
            if ($d['id'] == $docData['id']) {
                $existingIndex = $idx;
                break;
            }
        }
    } else {
        $docData['id'] = time() . rand(100, 999);
    }

    if ($existingIndex >= 0) {
        $allDocs[$page_key]['documents'][$existingIndex] = array_merge($allDocs[$page_key]['documents'][$existingIndex], $docData);
    } else {
        array_unshift($allDocs[$page_key]['documents'], $docData);
    }

    return save_json_data('page_documents.json', $allDocs);
}

/**
 * Delete a document entry from a page
 */
function delete_page_document($page_key, $docId) {
    $allDocs = get_json_data('page_documents.json', []);
    if (isset($allDocs[$page_key]['documents'])) {
        $allDocs[$page_key]['documents'] = array_values(array_filter(
            $allDocs[$page_key]['documents'],
            fn($d) => ($d['id'] != $docId)
        ));
        return save_json_data('page_documents.json', $allDocs);
    }
    return false;
}

/**
 * Sanitize User Input
 */
function clean_input($data) {
    return htmlspecialchars(stripslashes(trim($data ?? '')), ENT_QUOTES, 'UTF-8');
}

/**
 * Check if Admin is logged in
 */
function is_admin_logged_in() {
    return isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;
}

/**
 * Require Admin Auth
 */
function require_admin_auth() {
    if (!is_admin_logged_in()) {
        header('Location: ' . BASE_URL . 'admin/login.php');
        exit;
    }
}
