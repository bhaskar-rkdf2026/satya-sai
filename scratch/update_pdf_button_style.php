<?php

$files = glob('d:/xampp/htdocs/sssu/satya-sai/Academic/NAAC/Criteria*.php');

foreach ($files as $fpath) {
    echo "Updating PDF button styling in $fpath...\n";
    $content = file_get_contents($fpath);

    $new_button_css = <<<CSS
/* Simple, Clean & Elegant Blue PDF Button Styling */
.btn-naac-pdf {
  background-color: #0284c7 !important;
  color: #ffffff !important;
  border: 1px solid #0284c7 !important;
  padding: 6px 14px !important;
  border-radius: 6px !important;
  font-weight: 500 !important;
  font-size: 0.85rem !important;
  text-decoration: none !important;
  display: inline-flex !important;
  align-items: center !important;
  justify-content: center !important;
  gap: 6px !important;
  transition: all 0.2s ease-in-out !important;
  box-shadow: 0 2px 6px rgba(2, 132, 199, 0.15) !important;
  white-space: nowrap !important;
}
.btn-naac-pdf:hover {
  background-color: #0369a1 !important;
  border-color: #0369a1 !important;
  color: #ffffff !important;
  transform: translateY(-1px) !important;
  box-shadow: 0 4px 12px rgba(2, 132, 199, 0.25) !important;
}
.btn-naac-pdf i {
  color: #ffffff !important;
  font-size: 0.85rem !important;
}
CSS;

    // Replace .btn-naac-pdf styling
    $content = preg_replace('/\/\* Red PDF Download Button Styling.*?\*\/\s*\.btn-naac-pdf.*?\}/is', $new_button_css, $content);
    $content = preg_replace('/\.btn-naac-pdf\s*\{.*?\}/is', $new_button_css, $content);

    file_put_contents($fpath, $content);
    echo "  [DONE] Updated $fpath\n";
}

echo "All Criteria pages updated with simple, elegant blue PDF buttons!\n";

