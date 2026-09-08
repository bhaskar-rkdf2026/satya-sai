<?php
$html = file_get_contents('d:/xampp/htdocs/satya-sai/Admission/AdmissionNotice.php');

// Find all paragraphs containing links
preg_match_all('/<p[^>]*>(.*?)<\/p>/is', $html, $paras);

$notices = [];
$currentSession = 'General / Recent';

foreach ($paras[1] as $pHtml) {
    $textOnly = trim(strip_tags($pHtml));
    
    // Check if paragraph is a session heading
    if (preg_match('/(202[0-9]-[0-9]{2}|Session|Paramedical)/i', $textOnly) && !preg_match('/<a/i', $pHtml)) {
        $currentSession = $textOnly;
        continue;
    }
    
    // Check for links
    if (preg_match_all('/<a[^>]+href=["\']([^"\']+)["\'][^>]*>(.*?)<\/a>/is', $pHtml, $links)) {
        foreach ($links[0] as $i => $linkTag) {
            $link = $links[1][$i];
            $title = trim(strip_tags($links[2][$i]));
            if (empty($title) || $title === '&nbsp;' || strlen($title) < 4) {
                $title = $textOnly;
            }
            if (!empty($title) && strlen($title) > 3) {
                // Determine session
                $session = 'Session 2026-27';
                if (strpos($title, '2026-27') !== false || strpos($currentSession, '2026') !== false) {
                    $session = 'Session 2026-27';
                } elseif (strpos($title, '2025-26') !== false || strpos($currentSession, '2025') !== false) {
                    $session = 'Session 2025-26';
                } elseif (strpos($title, '2024-25') !== false || strpos($currentSession, '2024') !== false) {
                    $session = 'Session 2024-25';
                } elseif (strpos($title, '2023-24') !== false || strpos($currentSession, '2023') !== false) {
                    $session = 'Session 2023-24';
                } elseif (strpos($title, '2022-23') !== false || strpos($currentSession, '2022') !== false) {
                    $session = 'Session 2022-23';
                } elseif (strpos($title, '2021-22') !== false || strpos($currentSession, '2021') !== false) {
                    $session = 'Session 2021-22';
                } else {
                    $session = 'Archive Notifications';
                }
                
                $notices[] = [
                    'title' => html_entity_decode(trim(preg_replace('/\s+/', ' ', $title))),
                    'link' => $link,
                    'session' => $session
                ];
            }
        }
    }
}

echo "Extracted " . count($notices) . " notices.\n";
foreach (array_slice($notices, 0, 5) as $n) {
    print_r($n);
}
