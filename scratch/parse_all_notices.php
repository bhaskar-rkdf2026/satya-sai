<?php
$file = 'C:/Users/Admin/.gemini/antigravity-ide/brain/d204b681-b7ec-4539-8458-d57d758e2f25/.system_generated/steps/19/content.md';
$html = file_get_contents($file);

$start = strpos($html, '<div class="card-body');
$end = strpos($html, '<div class="col-lg-3', $start);
if ($end === false) {
    $end = strpos($html, '<footer', $start);
}
$section = substr($html, $start, $end - $start);

// Match all headers (h2, h3, h4, h5, p) with links or text
preg_match_all('/<(h[1-6]|p)[^>]*>(.*?)<\/\1>/is', $section, $blocks, PREG_SET_ORDER);

$results = [];
foreach ($blocks as $b) {
    $tag = $b[1];
    $inner = $b[2];
    
    // Check if there is a link
    if (preg_match('/<a\s+[^>]*href=["\']([^"\']*)["\'][^>]*>(.*?)<\/a>/is', $inner, $l)) {
        $href = trim($l[1]);
        $text = trim(strip_tags($l[2]));
        // If text is empty, get the rest of text in block
        if (empty($text)) {
            $text = trim(strip_tags($inner));
        }
        $results[] = [
            'type' => 'link',
            'href' => $href,
            'text' => $text,
            'raw' => trim(strip_tags($inner))
        ];
    } else {
        $text = trim(strip_tags($inner));
        // ignore purely whitespace or xml comments
        $text = preg_replace('/\s+/', ' ', $text);
        if (!empty($text) && $text !== '&nbsp;' && !str_starts_with($text, '/*')) {
            $results[] = [
                'type' => 'text',
                'text' => $text
            ];
        }
    }
}

file_put_contents('scratch/live_notices_parsed.json', json_encode($results, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
echo "Parsed " . count($results) . " items." . PHP_EOL;
foreach ($results as $i => $r) {
    if ($r['type'] === 'link') {
        echo ($i+1) . " [LINK] " . $r['text'] . " => " . $r['href'] . PHP_EOL;
    } else {
        echo ($i+1) . " [TEXT] " . $r['text'] . PHP_EOL;
    }
}
