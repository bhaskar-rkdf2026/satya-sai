<?php

$files = glob('d:/xampp/htdocs/sssu/satya-sai/Academic/NAAC/Criteria*.php');

foreach ($files as $fpath) {
    echo "Refining remaining metrics & headers in $fpath...\n";
    $content = file_get_contents($fpath);

    // 1. Convert raw 1.1.3 second paragraph block into sleek metric box
    $content = preg_replace_callback('/<p>[^<]*1\.1\.3\s*&nbsp;\s*<span[^>]*>(.*?)<\/span><\/p>\s*<p><span[^>]*>(.*?)<\/span><\/p>/is', function($matches) {
        $text1 = trim(strip_tags($matches[1]));
        $text2 = trim(strip_tags($matches[2]));
        $fullText = preg_replace('/\s+/', ' ', "$text1 $text2");
        return <<<HTML

<div class="naac-metric-box">
  <div class="d-flex align-items-start gap-3">
    <span class="naac-metric-badge">Metric 1.1.3</span>
    <div class="naac-metric-content">
      {$fullText}
    </div>
  </div>
</div>

HTML;
    }, $content);

    // 2. Ensure table headers directly following metric 1.1.3 are 100% correct
    $content = preg_replace(
        '/<table class="table table-bordered table-hover align-middle naac-custom-table">\s*<tbody[^>]*>\s*<tr>\s*<td><\/td>\s*<td><strong[^>]*>Department<\/strong><\/td>\s*<td><strong[^>]*>Program<\/strong><\/td>\s*<td><strong[^>]*>Session[^<]*<\/strong><\/td>\s*<\/tr>/is',
        '<table class="table table-bordered table-hover align-middle naac-custom-table"><tbody><tr class="naac-table-header"><th colspan="2">School Name</th><th>Department</th><th>Program</th><th colspan="2">Session (2017-18 To 2021-22) / Report</th></tr>',
        $content
    );

    file_put_contents($fpath, $content);
    echo "  [DONE] Refined $fpath\n";
}

echo "All remaining metric blocks & headers refined!\n";

