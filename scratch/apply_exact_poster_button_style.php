<?php

$files = glob('d:/xampp/htdocs/sssu/satya-sai/Academic/NAAC/Criteria*.php');

foreach ($files as $fpath) {
    echo "Updating PDF button styling in $fpath...\n";
    $content = file_get_contents($fpath);

    $exact_poster_button_css = <<<CSS
/* Exact Button Styling Matched to Reference Image (Dark Navy Pill + Golden Border + Yellow Icon) */
.btn-naac-pdf {
  background: linear-gradient(135deg, #0b2545 0%, #173866 100%) !important;
  color: #ffffff !important;
  border: 1.5px solid #d97706 !important;
  padding: 7px 18px !important;
  border-radius: 50px !important;
  font-weight: 700 !important;
  font-size: 0.85rem !important;
  text-decoration: none !important;
  display: inline-flex !important;
  align-items: center !important;
  justify-content: center !important;
  gap: 8px !important;
  transition: all 0.25s ease-in-out !important;
  box-shadow: 0 4px 12px rgba(11, 37, 69, 0.25) !important;
  white-space: nowrap !important;
}
.btn-naac-pdf:hover {
  background: linear-gradient(135deg, #173866 0%, #1e4b8a 100%) !important;
  border-color: #f59e0b !important;
  color: #ffffff !important;
  transform: translateY(-2px) !important;
  box-shadow: 0 6px 16px rgba(11, 37, 69, 0.35) !important;
}
.btn-naac-pdf i {
  color: #f59e0b !important;
  font-size: 0.9rem !important;
}
.btn-naac-pdf:hover i {
  color: #fbbf24 !important;
}
CSS;

    // Replace .btn-naac-pdf styling
    $content = preg_replace('/\/\* Minimalist Clean Outline PDF Button Styling \*\/.*?\/\* Minimalist Clean Outline PDF Button Styling \*\/.*?\}/is', $exact_poster_button_css, $content);
    $content = preg_replace('/\.btn-naac-pdf\s*\{.*?\}/is', $exact_poster_button_css, $content);

    file_put_contents($fpath, $content);
    echo "  [DONE] Updated $fpath\n";
}

echo "All Criteria pages updated with exact Dark Navy + Golden Border + Yellow Icon Pill Buttons!\n";

