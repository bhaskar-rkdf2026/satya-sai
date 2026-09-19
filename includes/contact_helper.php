<?php
/**
 * Sri Satya Sai University of Technology & Medical Sciences
 * Contact Page Helper Functions
 */

if (!defined('BASE_URL')) {
    require_once __DIR__ . '/../config.php';
}

/**
 * Get all Contact data from JSON
 */
function get_contact_data() {
    return get_json_data('contact_data.json', [
        'page_info' => [],
        'info_cards' => [],
        'officers_directory' => [],
        'inquiry_settings' => []
    ]);
}

/**
 * Save all Contact data to JSON
 */
function save_contact_data($data) {
    return save_json_data('contact_data.json', $data);
}

/**
 * Get Contact page info (titles, headings, map embed URL)
 */
function get_contact_page_info() {
    $data = get_contact_data();
    return $data['page_info'] ?? [
        'page_title' => 'Contact Us - SSSUTMS',
        'banner_title' => 'Contact Us',
        'banner_category' => 'Contact',
        'heading' => 'Get In Touch with SSSUTMS',
        'directory_heading' => 'University Authorities & Key Officers Directory',
        'form_heading' => 'Send Us an Inquiry / Feedback Message',
        'map_heading' => 'Campus Location on Map',
        'map_embed_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4423.9559848803465!2d77.12371640709164!3d23.21561474176524!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x397cf4c949567e4d%3A0xc7649cfdfe73a024!2sSri%20Satya%20Sai%20University%20of%20Technology%20%26%20Medical%20Sciences%2C%20Sehore!5e0!3m2!1sen!2sin!4v1700721177302!5m2!1sen!2sin'
    ];
}

/**
 * Save Contact page info
 */
function save_contact_page_info($info) {
    $data = get_contact_data();
    $data['page_info'] = array_merge($data['page_info'] ?? [], $info);
    return save_contact_data($data);
}

/**
 * Get Contact Info Cards data
 */
function get_contact_info_cards() {
    $data = get_contact_data();
    return $data['info_cards'] ?? [];
}

/**
 * Save Contact Info Cards data
 */
function save_contact_info_cards($cards) {
    $data = get_contact_data();
    $data['info_cards'] = array_merge($data['info_cards'] ?? [], $cards);
    return save_contact_data($data);
}

/**
 * Get Key Officers Directory list
 */
function get_contact_officers($onlyActive = false) {
    $data = get_contact_data();
    $officers = $data['officers_directory'] ?? [];
    if ($onlyActive) {
        return array_values(array_filter($officers, function($o) {
            return ($o['status'] ?? 'Active') === 'Active';
        }));
    }
    return $officers;
}

/**
 * Save or update an officer entry
 */
function save_contact_officer($officer) {
    $data = get_contact_data();
    $officers = $data['officers_directory'] ?? [];
    $id = $officer['id'] ?? ('off_' . time());
    $officer['id'] = $id;
    $found = false;

    foreach ($officers as &$o) {
        if (($o['id'] ?? '') === $id) {
            $o = array_merge($o, $officer);
            $found = true;
            break;
        }
    }

    if (!$found) {
        // Auto assign S.No if not given
        if (empty($officer['sno'])) {
            $officer['sno'] = str_pad(count($officers) + 1, 2, '0', STR_PAD_LEFT);
        }
        $officers[] = $officer;
    }

    $data['officers_directory'] = array_values($officers);
    return save_contact_data($data);
}

/**
 * Delete an officer entry
 */
function delete_contact_officer($id) {
    $data = get_contact_data();
    $officers = $data['officers_directory'] ?? [];
    $filtered = array_filter($officers, function($o) use ($id) {
        return ($o['id'] ?? '') !== $id;
    });
    $data['officers_directory'] = array_values($filtered);
    return save_contact_data($data);
}

/**
 * Get Inquiry settings
 */
function get_contact_inquiry_settings() {
    $data = get_contact_data();
    return $data['inquiry_settings'] ?? [
        'enabled' => true,
        'recipient_email' => 'info@sssutms.co.in',
        'success_message' => 'Thank you for contacting us! Our team will get back to you shortly.'
    ];
}

/**
 * Save Inquiry settings
 */
function save_contact_inquiry_settings($settings) {
    $data = get_contact_data();
    $data['inquiry_settings'] = array_merge($data['inquiry_settings'] ?? [], $settings);
    return save_contact_data($data);
}
