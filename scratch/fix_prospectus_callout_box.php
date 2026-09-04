<?php

$files = glob('d:/xampp/htdocs/sssu/satya-sai/Academic/NAAC/Criteria*.php');

foreach ($files as $fpath) {
    echo "Refining prospectus in $fpath...\n";
    $content = file_get_contents($fpath);

    // Replace raw Prospectus paragraph with sleek document box
    $content = preg_replace_callback(
        '/<p>\s*<span[^>]*>\s*<strong>\s*Prospectus.*?<\/strong>\s*<\/span>\s*<strong>\s*<a class="btn btn-sm btn-naac-pdf" href="([^"]+)".*?><i[^>]*><\/i>\s*View PDF<\/a>\s*<\/strong>\s*<\/p>/is',
        function($matches) {
            $pdfUrl = $matches[1];
            return <<<HTML

<div class="naac-metric-box">
  <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
    <div class="d-flex align-items-center gap-3">
      <span class="naac-metric-badge">Document</span>
      <div class="naac-metric-content fw-bold text-dark fs-5 mb-0">
        University Prospectus
      </div>
    </div>
    <div>
      <a class="btn btn-sm btn-naac-pdf" href="{$pdfUrl}" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a>
    </div>
  </div>
</div>

HTML;
        },
        $content
    );

    file_put_contents($fpath, $content);
    echo "  [DONE] Refined $fpath\n";
}

echo "All Prospectus standalone links converted to sleek callout cards!\n";

