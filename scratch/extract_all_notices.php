<?php
$html = file_get_contents('d:/xampp/htdocs/satya-sai/Admission/AdmissionNotice.php');

// Extract all <a> tags
preg_match_all('/<a[^>]+href=["\']([^"\']+)["\'][^>]*>(.*?)<\/a>/is', $html, $matches);

$notices = [];
$seen = [];

foreach ($matches[0] as $i => $fullTag) {
    $link = $matches[1][$i];
    $rawText = trim(strip_tags($matches[2][$i]));
    $rawText = html_entity_decode(preg_replace('/\s+/', ' ', $rawText));
    
    // If text is empty or too short, look at surrounding context in HTML
    if (empty($rawText) || strlen($rawText) < 4) {
        $pos = strpos($html, $fullTag);
        $context = substr($html, max(0, $pos - 150), 300);
        $cleanContext = trim(strip_tags($context));
        $cleanContext = html_entity_decode(preg_replace('/\s+/', ' ', $cleanContext));
        if (strlen($cleanContext) > 5) {
            $rawText = $cleanContext;
        }
    }
    
    if (!empty($rawText) && strlen($rawText) > 3) {
        $key = md5($link . $rawText);
        if (!isset($seen[$key])) {
            $seen[$key] = true;
            
            // Session tagging
            $session = 'Archive Notifications';
            if (strpos($rawText, '2026-27') !== false || strpos($link, '2026') !== false) {
                $session = 'Session 2026-27';
            } elseif (strpos($rawText, '2025-26') !== false || strpos($link, '2025') !== false) {
                $session = 'Session 2025-26';
            } elseif (strpos($rawText, '2024-25') !== false || strpos($link, '2024') !== false) {
                $session = 'Session 2024-25';
            } elseif (strpos($rawText, '2023-24') !== false || strpos($link, '2023') !== false) {
                $session = 'Session 2023-24';
            } elseif (strpos($rawText, '2022-23') !== false || strpos($link, '2022') !== false) {
                $session = 'Session 2022-23';
            } elseif (strpos($rawText, '2021-22') !== false || strpos($link, '2021') !== false) {
                $session = 'Session 2021-22';
            }
            
            $notices[] = [
                'title' => $rawText,
                'link' => $link,
                'session' => $session
            ];
        }
    }
}

echo "Extracted " . count($notices) . " notices.\n";
foreach (array_slice($notices, 0, 10) as $n) {
    echo "• [{$n['session']}] {$n['title']} -> {$n['link']}\n";
}
