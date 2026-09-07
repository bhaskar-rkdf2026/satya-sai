<?php
/**
 * Scheme Page Template Helper
 * Renders the standard scheme table layout used across all Scheme pages.
 * 
 * Usage: include this after setting $scheme_data array and $scheme_title.
 * 
 * $scheme_data = [
 *   'groups' => [        // optional: for pages with branch groups (like BE)
 *     [
 *       'label' => 'B.E.',
 *       'icon'  => 'fa-graduation-cap',
 *       'courses' => [
 *         ['name'=>'...', 'I'=>url, 'II'=>url, 'III'=>url, 'IV'=>url, 'V'=>url, 'VI'=>url, 'VII'=>url, 'VIII'=>url],
 *       ]
 *     ]
 *   ],
 *   'note' => 'As per AICTE Curriculum...'
 * ]
 */

// Helper: convert live URL to local path
function scheme_local_path($url) {
    if (empty($url)) return '';
    $base = 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/';
    $rel  = str_replace($base, '', $url);
    $rel  = urldecode($rel);
    return BASE_URL . 'assets/images/Files/Link/' . $rel;
}

// Helper: render a single download link
function scheme_link($url, $label = '') {
    if (empty($url)) return '';
    $href = scheme_local_path($url);
    $lbl  = htmlspecialchars($label ?: basename(urldecode($url)));
    return '<a href="' . htmlspecialchars($href) . '" target="_blank" class="sem-pill" title="' . $lbl . '">' . $lbl . '</a>';
}
