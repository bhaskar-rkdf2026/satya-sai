<?php
$html = file_get_contents('d:/xampp/htdocs/sssu/satya-sai/assets/images/sssutms.co.in/cms/Website/Admission/Brochures.html');

$dom = new DOMDocument();
@$dom->loadHTML($html);

$xpath = new DOMXPath($dom);
$cards = $xpath->query('//div[contains(@class, "card-body")]');

if ($cards->length > 0) {
    $card = $cards->item(0);
    
    // Remove base64 images so output stays clean
    $imgs = $card->getElementsByTagName('img');
    for ($i = $imgs->length - 1; $i >= 0; $i--) {
        $img = $imgs->item($i);
        $src = $img->getAttribute('src');
        if (strpos($src, 'data:image') === 0) {
            $img->setAttribute('src', '[BASE64_IMAGE]');
        }
    }
    
    // Print all text elements
    $nodes = $xpath->query('.//h1 | .//h2 | .//h3 | .//h4 | .//h5 | .//h6 | .//p | .//a | .//table', $card);
    foreach ($nodes as $node) {
        if ($node->nodeName == 'a') {
            $href = $node->getAttribute('href');
            $text = trim(preg_replace('/\s+/', ' ', $node->textContent));
            echo "LINK: Text='{$text}' | Href='{$href}'\n";
        } elseif ($node->nodeName == 'table') {
            echo "--- TABLE ---\n";
            $rows = $node->getElementsByTagName('tr');
            foreach ($rows as $row) {
                $cells = [];
                foreach ($row->childNodes as $cell) {
                    if ($cell->nodeName == 'td' || $cell->nodeName == 'th') {
                        $cells[] = trim(preg_replace('/\s+/', ' ', $cell->textContent));
                    }
                }
                echo "ROW: " . implode(" | ", $cells) . "\n";
            }
        } else {
            $text = trim(preg_replace('/\s+/', ' ', $node->textContent));
            if (!empty($text)) {
                echo strtoupper($node->nodeName) . ": {$text}\n";
            }
        }
    }
}
