<?php
$file = 'C:/Users/Admin/.gemini/antigravity-ide/brain/d204b681-b7ec-4539-8458-d57d758e2f25/.system_generated/steps/19/content.md';
$html = file_get_contents($file);

$start = strpos($html, '<div class="card-body');
$end = strpos($html, '<div class="col-lg-3', $start);
if ($end === false) {
    $end = strpos($html, '<footer', $start);
}
$section = substr($html, $start, $end - $start);

// Strip out MS Word comments
$section = preg_replace('/<!--\[if gte mso.*?<!\[endif\]-->/s', '', $section);

// Match all h3, h4, h5, p
preg_match_all('/<(h[1-6]|p)[^>]*>(.*?)<\/\1>/is', $section, $matches);

$rows = [];
foreach ($matches[2] as $idx => $content) {
    $clean_content = trim(preg_replace('/\s+/', ' ', $content));
    if (empty($clean_content) || $clean_content === '&nbsp;' || str_starts_with($clean_content, '/*')) {
        continue;
    }
    
    // Find all links inside this block
    if (preg_match_all('/<a\s+[^>]*href=["\']([^"\']*)["\'][^>]*>(.*?)<\/a>/is', $content, $a_matches, PREG_SET_ORDER)) {
        foreach ($a_matches as $a) {
            $href = trim($a[1]);
            $raw_text = trim($a[2]);
            $text = trim(strip_tags($raw_text));
            $block_text = trim(strip_tags($content));
            
            // If text is empty or &nbsp;, use block text
            if (empty($text) || $text === '&nbsp;') {
                $text = $block_text;
            }
            // clean up &nbsp;
            $text = html_entity_decode($text, ENT_QUOTES | ENT_HTML5, 'UTF-8');
            $text = trim(preg_replace('/\s+/', ' ', str_replace("\xc2\xa0", ' ', $text)));
            
            if (empty($text)) {
                $text = "Admission Circular / Notification";
            }
            
            // Determine local file
            $filename = basename(parse_url($href, PHP_URL_PATH));
            $filename = urldecode($filename);
            $filename = preg_replace('/[^a-zA-Z0-9_\.\-\(\)\x{0900}-\x{097F}]/u', '_', $filename);
            
            $local_file = 'assets/documents/admission_notices/' . $filename;
            $full_local = __DIR__ . '/../' . $local_file;
            $has_local = file_exists($full_local) && filesize($full_local) > 0;
            
            $rows[] = [
                'title' => $text,
                'href' => $href,
                'local_file' => $has_local ? $local_file : $href,
                'is_local' => $has_local,
                'size' => $has_local ? filesize($full_local) : 0
            ];
        }
    }
}

echo "Total notice rows extracted: " . count($rows) . PHP_EOL;
file_put_contents('scratch/clean_notices.json', json_encode($rows, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));

foreach ($rows as $i => $r) {
    echo ($i+1) . ". [" . ($r['is_local'] ? 'LOCAL' : 'EXT') . "] " . $r['title'] . " => " . $r['local_file'] . PHP_EOL;
}
