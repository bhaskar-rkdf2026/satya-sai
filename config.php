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
 * Helper to get all notices
 */
function get_notices($category = 'all', $limit = 0) {
    $notices = get_json_data('notices.json', []);
    if ($category !== 'all') {
        $notices = array_filter($notices, function($n) use ($category) {
            return isset($n['category']) && $n['category'] === $category;
        });
    }
    // Sort newest first
    usort($notices, function($a, $b) {
        return strtotime($b['date'] ?? '2026-01-01') - strtotime($a['date'] ?? '2026-01-01');
    });
    if ($limit > 0) {
        return array_slice($notices, 0, $limit);
    }
    return $notices;
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
    $pageDocs = $allDocs[$page_key]['documents'] ?? [];
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
