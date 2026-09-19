<?php
/**
 * Events & Workshops Dynamic Helper for SSSUTMS
 * Manages SEO metadata, page information, and synchronization for Events & Workshops pages
 */

if (!defined('SITE_NAME')) {
    require_once __DIR__ . '/../config.php';
}

/**
 * Returns the catalog of all Events & Workshops public pages
 */
function get_events_page_catalog() {
    return [
        'EVENTS' => [
            'key'         => 'EVENTS',
            'title'       => 'Official University Events & Circulars',
            'slug'        => 'EVENTS.php',
            'public_url'  => 'EVENTS.php',
            'category'    => 'University Events',
            'icon'        => 'fa-calendar-check',
            'badge'       => 'Main Portal',
            'description' => 'Official notifications, schedules, circulars, and details for national seminars, conferences, cultural festivals, and university events at SSSUTMS.',
            'keywords'    => 'sssutms events, university circulars, national conference, college fest, annual day, notifications'
        ],
        'UpCommingEvents' => [
            'key'         => 'UpCommingEvents',
            'title'       => 'Upcoming Events & Campus Life',
            'slug'        => 'UpCommingEvents.php',
            'public_url'  => 'UpCommingEvents.php',
            'category'    => 'Campus Life',
            'icon'        => 'fa-bullhorn',
            'badge'       => 'Campus Feed',
            'description' => 'Explore upcoming campus events, national symposiums, workshops, placement drives, sports meets, and student initiatives at SSSUTMS.',
            'keywords'    => 'upcoming events, campus life, student achievements, sssutms workshops, symposiums'
        ],
        'Academic_Events' => [
            'key'         => 'Academic_Events',
            'title'       => 'Campus Events & Extracurricular Activities',
            'slug'        => 'Academic/Activities/Events.php',
            'public_url'  => 'Academic/Activities/Events.php',
            'category'    => 'Academic Activities',
            'icon'        => 'fa-calendar-days',
            'badge'       => 'Activities',
            'description' => 'Comprehensive showcase of co-curricular events, technical competitions, guest lectures, and campus festivals organized across all university faculties.',
            'keywords'    => 'academic events, college activities, technical fest, cultural events, student activities sssutms'
        ],
        'Academic_WorkshopAndSeminars' => [
            'key'         => 'Academic_WorkshopAndSeminars',
            'title'       => 'Workshops, Seminars & Conclaves',
            'slug'        => 'Academic/Activities/WorkshopAndSeminars.php',
            'public_url'  => 'Academic/Activities/WorkshopAndSeminars.php',
            'category'    => 'Academic Activities',
            'icon'        => 'fa-chalkboard-user',
            'badge'       => 'Skill Workshops',
            'description' => 'Hands-on technical workshops, national seminars, research conclaves, and faculty development programs conducted at SSSUTMS.',
            'keywords'    => 'workshops, national seminars, faculty development, technical conclaves, sssutms skill development'
        ]
    ];
}

/**
 * Retrieve SEO and page info for an Events & Workshops page
 */
function get_events_page_info($pageKey) {
    $catalog = get_events_page_catalog();
    $default = $catalog[$pageKey] ?? [
        'key'         => $pageKey,
        'title'       => 'Events & Workshops | SSSUTMS',
        'slug'        => 'EVENTS.php',
        'public_url'  => 'EVENTS.php',
        'category'    => 'Events',
        'icon'        => 'fa-calendar-days',
        'badge'       => 'Events',
        'description' => 'Official events, workshops, and campus activities at Sri Satya Sai University of Technology & Medical Sciences.',
        'keywords'    => 'sssutms events, workshops, seminars, campus activities'
    ];

    $allData = get_json_data('page_documents.json', []);
    $saved = [];

    // Check multiple possible keys
    if (isset($allData['Events_' . $pageKey]['page_info'])) {
        $saved = $allData['Events_' . $pageKey]['page_info'];
    } elseif (isset($allData[$pageKey]['page_info'])) {
        $saved = $allData[$pageKey]['page_info'];
    } elseif (isset($allData['Academic_' . str_replace('Academic_', '', $pageKey)]['page_info'])) {
        $saved = $allData['Academic_' . str_replace('Academic_', '', $pageKey)]['page_info'];
    }

    return [
        'page_title'       => $saved['page_title'] ?? $default['title'],
        'meta_title'       => !empty($saved['meta_title']) ? $saved['meta_title'] : ($default['title'] . ' | SSSUTMS'),
        'meta_description' => !empty($saved['meta_description']) ? $saved['meta_description'] : $default['description'],
        'meta_keywords'    => !empty($saved['meta_keywords']) ? $saved['meta_keywords'] : $default['keywords'],
        'canonical_url'    => $saved['canonical_url'] ?? '',
        'og_image'         => $saved['og_image'] ?? 'assets/images/logo/logo.jpg',
        'banner_title'     => $saved['banner_title'] ?? $default['title'],
        'banner_category'  => $saved['banner_category'] ?? $default['category'],
        'slug'             => $default['slug'] ?? 'EVENTS.php',
        'public_url'       => $default['public_url'] ?? 'EVENTS.php',
        'icon'             => $default['icon'] ?? 'fa-calendar-days',
        'badge'            => $default['badge'] ?? 'Events'
    ];
}

/**
 * Save SEO and page info for an Events & Workshops page
 */
function save_events_page_info($pageKey, $info) {
    $allData = get_json_data('page_documents.json', []);
    $catalog = get_events_page_catalog();
    $meta = $catalog[$pageKey] ?? [];
    $title = $meta['title'] ?? $pageKey;

    $sanitized = [
        'page_title'       => trim($info['page_title'] ?? $title),
        'meta_title'       => trim($info['meta_title'] ?? ($title . ' | SSSUTMS')),
        'meta_description' => trim($info['meta_description'] ?? ''),
        'meta_keywords'    => trim($info['meta_keywords'] ?? ''),
        'canonical_url'    => trim($info['canonical_url'] ?? ''),
        'og_image'         => trim($info['og_image'] ?? 'assets/images/logo/logo.jpg'),
        'banner_title'     => trim($info['banner_title'] ?? $title),
        'banner_category'  => trim($info['banner_category'] ?? ($meta['category'] ?? 'Events')),
        'updated_at'       => date('Y-m-d H:i:s')
    ];

    // Save in primary Events key
    $fullKey = 'Events_' . $pageKey;
    if (!isset($allData[$fullKey])) {
        $allData[$fullKey] = [
            'title'     => $title,
            'section'   => 'Events',
            'documents' => []
        ];
    }
    $allData[$fullKey]['page_info'] = $sanitized;

    // Mirror to standard key for direct resolution
    if (!isset($allData[$pageKey])) {
        $allData[$pageKey] = [
            'title'     => $title,
            'section'   => 'Events',
            'documents' => []
        ];
    }
    $allData[$pageKey]['page_info'] = $sanitized;

    // Also mirror if this is an academic activity key
    if (strpos($pageKey, 'Academic_') === 0) {
        $acadSubKey = str_replace('Academic_', '', $pageKey);
        if (!isset($allData['Academic_' . $acadSubKey])) {
            $allData['Academic_' . $acadSubKey] = [
                'title'     => $title,
                'section'   => 'Academic',
                'documents' => []
            ];
        }
        $allData['Academic_' . $acadSubKey]['page_info'] = $sanitized;
        $allData[$acadSubKey]['page_info'] = $sanitized;
    }

    return save_json_data('page_documents.json', $allData);
}
