<?php
/**
 * Sri Satya Sai University of Technology & Medical Sciences
 * Examination Cell Dynamic Helper & SEO Manager
 * Manages all Examination pages with live admin editing and SEO capabilities.
 */

if (!defined('BASE_URL')) {
    require_once __DIR__ . '/../config.php';
}

/**
 * Returns the master catalog for all Examination pages
 */
function get_examination_page_catalog() {
    return [
        'ExamNotifications' => [
            'title' => 'Exam Notifications',
            'file' => 'Examination/ExamNotifications.php',
            'icon' => 'fa-bell',
            'meta_title' => 'Exam Notifications & Circulars | Examination Cell | SSSUTMS',
            'meta_description' => 'Stay updated with the latest university examination notifications, circulars, urgent academic announcements, and re-evaluation notices at SSSUTMS.',
            'meta_keywords' => 'SSSUTMS Exam Notifications, Examination Circulars Bhopal, SSSUTMS Exam Alerts, University Exam Notice Sehore, Examination Cell',
            'canonical_url' => '',
            'og_image' => 'assets/images/logo/logo.jpg'
        ],
        'EntranceExamAlert' => [
            'title' => 'Entrance Exam Alerts',
            'file' => 'Examination/EntranceExamAlert.php',
            'icon' => 'fa-graduation-cap',
            'meta_title' => 'Entrance Exam Alerts & Admission Tests | SSSUTMS',
            'meta_description' => 'Get latest updates and alerts on university entrance examinations, Ph.D. entrance tests (PET), eligibility criteria, and admission schedules at SSSUTMS.',
            'meta_keywords' => 'SSSUTMS Entrance Exam, Ph.D. Entrance Test SSSUTMS, PET Exam Bhopal, University Admission Entrance Test Sehore, Entrance Alert',
            'canonical_url' => '',
            'og_image' => 'assets/images/logo/logo.jpg'
        ],
        'ExamSchedule' => [
            'title' => 'Exam Schedule & Timetables',
            'file' => 'Examination/ExamSchedule.php',
            'icon' => 'fa-clock',
            'meta_title' => 'Exam Schedule & Time Tables | Semester Timetable | SSSUTMS',
            'meta_description' => 'Download official semester exam schedules, theoretical and practical examination timetables, and date sheets for all courses at SSSUTMS.',
            'meta_keywords' => 'SSSUTMS Exam Schedule, University Timetable Bhopal, Semester Date Sheet SSSUTMS, Exam Timetable Sehore, Theory Exam Date Sheet',
            'canonical_url' => '',
            'og_image' => 'assets/images/logo/logo.jpg'
        ],
        'Results' => [
            'title' => 'Examination Results',
            'file' => 'Examination/Results.php',
            'icon' => 'fa-square-poll-vertical',
            'meta_title' => 'Examination Results & Marksheet Portal | SSSUTMS',
            'meta_description' => 'Check and download university semester examination results, provisional scorecards, re-totaling results, and grading lists online at SSSUTMS.',
            'meta_keywords' => 'SSSUTMS Results, University Exam Result Bhopal, SSSUTMS Marksheet, Semester Results Sehore, Online Scorecard SSSUTMS',
            'canonical_url' => '',
            'og_image' => 'assets/images/logo/logo.jpg'
        ],
        'Interface' => [
            'title' => 'Interface & Portals',
            'file' => 'Examination/Interface.php',
            'icon' => 'fa-network-wired',
            'meta_title' => 'Examination Interface & Student ERP Portals | SSSUTMS',
            'meta_description' => 'Access examination management systems, student result portals, admit card download links, and online examination form interface at SSSUTMS.',
            'meta_keywords' => 'SSSUTMS Exam Portal, Student Examination Interface, Admit Card Download, Result Interface SSSUTMS, Exam ERP Login',
            'canonical_url' => '',
            'og_image' => 'assets/images/logo/logo.jpg'
        ],
        'examinations' => [
            'title' => 'Examinations Hub',
            'file' => 'examinations.php',
            'icon' => 'fa-graduation-cap',
            'meta_title' => 'Examinations & Results Hub | SSSUTMS',
            'meta_description' => 'Official examination and result portal of Sri Satya Sai University of Technology and Medical Sciences (SSSUTMS), Sehore (M.P.).',
            'meta_keywords' => 'SSSUTMS Examination Hub, Exam Portal, Results, Timetables, Notifications, Sehore, Bhopal',
            'canonical_url' => '',
            'og_image' => 'assets/images/logo/logo.jpg'
        ]
    ];
}

/**
 * Get Page Info and SEO Metadata for any Examination Page
 */
function get_examination_page_info($pageKey, $defaultOverrides = []) {
    $catalog = get_examination_page_catalog();
    $catInfo = $catalog[$pageKey] ?? [
        'title' => ucwords(str_replace(['_', '-'], ' ', $pageKey)),
        'file' => "Examination/{$pageKey}.php",
        'meta_title' => ucwords(str_replace(['_', '-'], ' ', $pageKey)) . ' - Examination | SSSUTMS',
        'meta_description' => 'Explore official examination notifications, timetables, and results at Sri Satya Sai University (SSSUTMS), Sehore.',
        'meta_keywords' => 'SSSUTMS, Examination, ' . ucwords(str_replace(['_', '-'], ' ', $pageKey)),
        'canonical_url' => '',
        'og_image' => 'assets/images/logo/logo.jpg'
    ];

    $allData = get_json_data('page_documents.json', []);
    $stored = [];

    // Check if stored under 'page_info'
    if (isset($allData[$pageKey]['page_info']) && is_array($allData[$pageKey]['page_info'])) {
        $stored = $allData[$pageKey]['page_info'];
    } elseif (isset($allData[$pageKey]['meta_title']) || isset($allData[$pageKey]['title'])) {
        $stored = $allData[$pageKey];
    }

    $final = [
        'page_title'       => !empty($stored['page_title']) ? $stored['page_title'] : ($defaultOverrides['page_title'] ?? $catInfo['title']),
        'meta_title'       => !empty($stored['meta_title']) ? $stored['meta_title'] : ($defaultOverrides['meta_title'] ?? $catInfo['meta_title']),
        'meta_description' => !empty($stored['meta_description']) ? $stored['meta_description'] : ($defaultOverrides['meta_description'] ?? $catInfo['meta_description']),
        'meta_keywords'    => !empty($stored['meta_keywords']) ? $stored['meta_keywords'] : ($defaultOverrides['meta_keywords'] ?? $catInfo['meta_keywords']),
        'canonical_url'    => !empty($stored['canonical_url']) ? $stored['canonical_url'] : ($defaultOverrides['canonical_url'] ?? $catInfo['canonical_url']),
        'og_image'         => !empty($stored['og_image']) ? $stored['og_image'] : ($defaultOverrides['og_image'] ?? $catInfo['og_image']),
    ];

    return array_merge($catInfo, $final);
}

/**
 * Save Page Info & SEO Metadata for any Examination Page
 */
function save_examination_page_info($pageKey, $info) {
    $allData = get_json_data('page_documents.json', []);
    
    // Ensure entry exists
    if (!isset($allData[$pageKey])) {
        $allData[$pageKey] = [
            'title' => $info['page_title'] ?? $pageKey,
            'section' => 'Examination',
            'documents' => []
        ];
    }

    $cleanSeo = [
        'page_title'       => clean_input($info['page_title'] ?? ''),
        'meta_title'       => clean_input($info['meta_title'] ?? ''),
        'meta_description' => clean_input($info['meta_description'] ?? ''),
        'meta_keywords'    => clean_input($info['meta_keywords'] ?? ''),
        'canonical_url'    => clean_input($info['canonical_url'] ?? ''),
        'og_image'         => clean_input($info['og_image'] ?? 'assets/images/logo/logo.jpg'),
        'updated_at'       => date('Y-m-d H:i:s')
    ];

    $allData[$pageKey]['page_info'] = $cleanSeo;
    if (!empty($cleanSeo['page_title'])) {
        $allData[$pageKey]['title'] = $cleanSeo['page_title'];
    }

    return save_json_data('page_documents.json', $allData);
}
