<?php
/**
 * Global Configuration & Data Helper
 * Sri Satya Sai University of Technology & Medical Sciences (SSSUTMS)
 */

if (session_status() === PHP_SESSION_NONE && !headers_sent()) {
    session_start();
}

// Global Site Constants
define('SITE_NAME', 'Sri Satya Sai University of Technology and Medical Sciences');
define('SITE_SHORT_NAME', 'SSSUTMS, Sehore');
define('SITE_TAGLINE', 'Premier University in Madhya Pradesh | Accredited & Approved');
define('CAMPUS_ADDRESS', 'Opp. Oilfed Plant, Bhopal-Indore Road, Sehore (M.P.) - 466001');
define('ADMISSION_HELPLINE', '+91-7748900028');
define('OFFICIAL_EMAIL', 'info@sssutms.co.in');
define('EXAM_EMAIL', 'exam@sssutms.co.in');

// Base Paths & URLs
define('BASE_DIR', __DIR__);
define('DATA_DIR', __DIR__ . '/data');

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
