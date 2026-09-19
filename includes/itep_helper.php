<?php
/**
 * Sri Satya Sai University of Technology & Medical Sciences
 * ITEP (Integrated Teacher Education Programme) Helper Functions
 */

if (!defined('BASE_URL')) {
    require_once __DIR__ . '/../config.php';
}

/**
 * Get all ITEP data from JSON
 */
function get_itep_data() {
    return get_json_data('itep_data.json', [
        'page_info' => [],
        'announcements' => [],
        'events' => []
    ]);
}

/**
 * Save all ITEP data to JSON
 */
function save_itep_data($data) {
    return save_json_data('itep_data.json', $data);
}

/**
 * Get ITEP Page Info & Settings
 */
function get_itep_page_info() {
    $data = get_itep_data();
    return $data['page_info'] ?? [
        'page_title' => 'ITEP - SSSUTMS',
        'banner_title' => 'Integrated Teacher Education Programme (ITEP)',
        'banner_category' => 'I T E P',
        'card_title' => 'ITEP',
        'card_icon' => 'fa-graduation-cap',
        'program_heading' => 'Integrated Teacher Education Programme',
        'program_description' => 'Access detailed academic information, curriculum, regulatory disclosures, and institutional details under the Faculty of Education.',
        'button_label' => 'Faculty of Education',
        'button_url' => 'About/Faculty_of_Education.php',
        'button_icon' => 'fa-link',
        'center_icon' => 'fa-university'
    ];
}

/**
 * Save ITEP Page Info
 */
function save_itep_page_info($info) {
    $data = get_itep_data();
    $data['page_info'] = array_merge($data['page_info'] ?? [], $info);
    return save_itep_data($data);
}

/**
 * Get ITEP Announcements
 */
function get_itep_announcements($onlyActive = false) {
    $data = get_itep_data();
    $ann = $data['announcements'] ?? [];
    if ($onlyActive) {
        return array_values(array_filter($ann, function($a) {
            return ($a['status'] ?? 'Active') === 'Active';
        }));
    }
    return $ann;
}

/**
 * Save or update an ITEP announcement
 */
function save_itep_announcement($item) {
    $data = get_itep_data();
    $ann = $data['announcements'] ?? [];
    $id = $item['id'] ?? ('itep_ann_' . time());
    $item['id'] = $id;
    $found = false;

    foreach ($ann as &$a) {
        if (($a['id'] ?? '') === $id) {
            $a = array_merge($a, $item);
            $found = true;
            break;
        }
    }

    if (!$found) {
        array_unshift($ann, $item);
    }

    $data['announcements'] = array_values($ann);
    return save_itep_data($data);
}

/**
 * Delete an ITEP announcement
 */
function delete_itep_announcement($id) {
    $data = get_itep_data();
    $ann = $data['announcements'] ?? [];
    $filtered = array_filter($ann, function($a) use ($id) {
        return ($a['id'] ?? '') !== $id;
    });
    $data['announcements'] = array_values($filtered);
    return save_itep_data($data);
}

/**
 * Get ITEP Events
 */
function get_itep_events($onlyActive = false) {
    $data = get_itep_data();
    $events = $data['events'] ?? [];
    if ($onlyActive) {
        return array_values(array_filter($events, function($e) {
            return ($e['status'] ?? 'Active') === 'Active';
        }));
    }
    return $events;
}

/**
 * Save or update an ITEP event
 */
function save_itep_event($item) {
    $data = get_itep_data();
    $events = $data['events'] ?? [];
    $id = $item['id'] ?? ('itep_ev_' . time());
    $item['id'] = $id;
    $found = false;

    foreach ($events as &$e) {
        if (($e['id'] ?? '') === $id) {
            $e = array_merge($e, $item);
            $found = true;
            break;
        }
    }

    if (!$found) {
        array_unshift($events, $item);
    }

    $data['events'] = array_values($events);
    return save_itep_data($data);
}

/**
 * Delete an ITEP event
 */
function delete_itep_event($id) {
    $data = get_itep_data();
    $events = $data['events'] ?? [];
    $filtered = array_filter($events, function($e) use ($id) {
        return ($e['id'] ?? '') !== $id;
    });
    $data['events'] = array_values($filtered);
    return save_itep_data($data);
}
