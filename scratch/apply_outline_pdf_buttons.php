<?php

$files = glob('d:/xampp/htdocs/sssu/satya-sai/Academic/NAAC/Criteria*.php');

foreach ($files as $fpath) {
    echo "Updating to minimal outline button in $fpath...\n";
    $content = file_get_contents($fpath);

    $outline_button_css = <<<CSS
/* Minimalist Clean Outline PDF Button Styling */
.btn-naac-pdf {
  background-color: #ffffff !important;
  color: #0284c7 !important;
  border: 1.5px solid #0284c7 !important;
  padding: 5px 14px !important;
  border-radius: 6px !important;
  font-weight: 600 !important;
  font-size: 0.825rem !important;
  text-decoration: none !important;
  display: inline-flex !important;
  align-items: center !important;
  justify-content: center !important;
  gap: 6px !important;
  transition: all 0.2s ease-in-out !important;
  white-space: nowrap !important;
  box-shadow: none !important;
}
.btn-naac-pdf:hover {
  background-color: #0284c7 !important;
  border-color: #0284c7 !important;
  color: #ffffff !important;
  box-shadow: 0 4px 12px rgba(2, 132, 199, 0.2) !important;
  transform: translateY(-1px) !important;
}
.btn-naac-pdf i {
  color: #0284c7 !important;
  font-size: 0.85rem !important;
  transition: color 0.2s ease-in-out !important;
}
.btn-naac-pdf:hover i {
  color: #ffffff !important;
}
CSS;

    // Replace .btn-naac-pdf styling
    $content = preg_replace('/\/\* Simple, Clean & Elegant Blue PDF Button Styling \*\/.*?\/\* Simple, Clean & Elegant Blue PDF Button Styling \*\/.*?\}/is', $outline_button_css, $content);
    $content = preg_replace('/\.btn-naac-pdf\s*\{.*?\}/is', $outline_button_css, $content);

    file_put_contents($fpath, $content);
    echo "  [DONE] Updated $fpath\n";
}

echo "All Criteria pages updated with minimalist outline PDF buttons!\n";

