<?php
/**
 * Sri Satya Sai University of Technology & Medical Sciences
 * Career & Faculty Recruitment Helper Functions
 */

if (!defined('BASE_URL')) {
    require_once __DIR__ . '/../config.php';
}

/**
 * Get all Career data from JSON
 */
function get_career_data() {
    return get_json_data('career_data.json', [
        'page_info' => [],
        'openings' => [],
        'announcements' => [],
        'events' => []
    ]);
}

/**
 * Save all Career data to JSON
 */
function save_career_data($data) {
    return save_json_data('career_data.json', $data);
}

/**
 * Get Career page information & alert settings
 */
function get_career_page_info() {
    $data = get_career_data();
    return $data['page_info'] ?? [
        'page_title' => 'Career & Faculty Recruitment - SSSUTMS',
        'banner_title' => 'Career & Recruitment',
        'banner_category' => 'Career',
        'heading' => 'Career Opportunities & Faculty Recruitment',
        'intro_title' => 'Join Sri Satya Sai University of Technology & Medical Sciences',
        'intro_text' => 'SSSUTMS invites dynamic, visionary, and qualified academic and administrative professionals to join our distinguished faculty team. We follow the reservation policy for staff recruitment in accordance with the guidelines set by the Government of Madhya Pradesh.',
        'section_heading' => 'Current Recruitment Notices & Job Advertisements'
    ];
}

/**
 * Save Career page information
 */
function save_career_page_info($info) {
    $data = get_career_data();
    $data['page_info'] = array_merge($data['page_info'] ?? [], $info);
    return save_career_data($data);
}

/**
 * Get all career openings
 */
function get_career_openings($onlyActive = false) {
    $data = get_career_data();
    $openings = $data['openings'] ?? [];
    if ($onlyActive) {
        return array_values(array_filter($openings, function($o) {
            return ($o['status'] ?? 'Active') === 'Active';
        }));
    }
    return $openings;
}

/**
 * Save or update a career opening
 */
function save_career_opening($item) {
    $data = get_career_data();
    $openings = $data['openings'] ?? [];
    $found = false;
    $id = $item['id'] ?? ('job_' . time());
    $item['id'] = $id;

    foreach ($openings as &$op) {
        if (($op['id'] ?? '') === $id) {
            $op = array_merge($op, $item);
            $found = true;
            break;
        }
    }

    if (!$found) {
        array_unshift($openings, $item);
    }

    $data['openings'] = array_values($openings);
    return save_career_data($data);
}

/**
 * Delete a career opening
 */
function delete_career_opening($id) {
    $data = get_career_data();
    $openings = $data['openings'] ?? [];
    $filtered = array_filter($openings, function($o) use ($id) {
        return ($o['id'] ?? '') !== $id;
    });
    $data['openings'] = array_values($filtered);
    return save_career_data($data);
}

/**
 * Get career announcements
 */
function get_career_announcements($onlyActive = false) {
    $data = get_career_data();
    $ann = $data['announcements'] ?? [];
    if ($onlyActive) {
        return array_values(array_filter($ann, function($a) {
            return ($a['status'] ?? 'Active') === 'Active';
        }));
    }
    return $ann;
}

/**
 * Save career announcement
 */
function save_career_announcement($item) {
    $data = get_career_data();
    $ann = $data['announcements'] ?? [];
    $id = $item['id'] ?? ('ca_' . time());
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
    return save_career_data($data);
}

/**
 * Delete career announcement
 */
function delete_career_announcement($id) {
    $data = get_career_data();
    $ann = $data['announcements'] ?? [];
    $filtered = array_filter($ann, function($a) use ($id) {
        return ($a['id'] ?? '') !== $id;
    });
    $data['announcements'] = array_values($filtered);
    return save_career_data($data);
}

/**
 * Get career recruitment events / drives
 */
function get_career_events($onlyActive = false) {
    $data = get_career_data();
    $events = $data['events'] ?? [];
    if ($onlyActive) {
        return array_values(array_filter($events, function($e) {
            return ($e['status'] ?? 'Active') === 'Active';
        }));
    }
    return $events;
}

/**
 * Save career event
 */
function save_career_event($item) {
    $data = get_career_data();
    $events = $data['events'] ?? [];
    $id = $item['id'] ?? ('ce_' . time());
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
    return save_career_data($data);
}

/**
 * Delete career event
 */
function delete_career_event($id) {
    $data = get_career_data();
    $events = $data['events'] ?? [];
    $filtered = array_filter($events, function($e) use ($id) {
        return ($e['id'] ?? '') !== $id;
    });
    $data['events'] = array_values($filtered);
    return save_career_data($data);
}
