<?php
$content = file_get_contents('C:\Users\Admin\.gemini\antigravity-ide\brain\49dfe431-3345-447b-8514-ece12de998fd\.system_generated\steps\41\content.md');
preg_match('/<article.*?<\/article>/s', $content, $matches);
if (!empty($matches)) {
    $clean = preg_replace('/src="data:image\/[^"]+"/', 'src="BASE64_IMAGE"', $matches[0]);
    file_put_contents('scratch/article_clean.html', $clean);
    echo "Saved successfully, length: " . strlen($clean) . "\n";
} else {
    echo "No match\n";
}
