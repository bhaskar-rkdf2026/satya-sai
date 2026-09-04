<?php

$files = glob('d:/xampp/htdocs/sssu/satya-sai/Academic/NAAC/Criteria*.php');

foreach ($files as $fpath) {
    echo "Fixing banner, button and header colors in $fpath...\n";
    $content = file_get_contents($fpath);

    // 1. Remove redundant inline "Criteria 1", "Criteria 2" paragraph headings inside body
    $content = preg_replace('/<p>\s*<span[^>]*>\s*<span[^>]*>\s*<strong>\s*<span[^>]*>Criteria\s*\d+<\/span>\s*<\/strong>\s*<\/span>\s*<\/span>\s*<\/p>/i', '', $content);
    $content = preg_replace('/<p>\s*<strong>\s*Criteria\s*\d+\s*<\/strong>\s*<\/p>/i', '', $content);
    $content = preg_replace('/<p>&nbsp;<\/p>/i', '', $content);

    // 2. Comprehensive CSS for crisp white text in banner, white text in table headers, and red PDF download buttons matching site standard
    $css_replacement = <<<CSS
<style>
.naac-section { 
  background-color: #f8fafc;
  font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
}
.naac-main-card {
  background: #ffffff;
  border-radius: 16px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 25px rgba(15,23,42,0.06);
  overflow: hidden;
  margin-bottom: 2rem;
}
.naac-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%) !important;
  color: #ffffff !important;
  padding: 1.8rem 2rem;
  position: relative;
}
.naac-header-banner h3,
.naac-header-banner h2,
.naac-header-banner h1,
.naac-header-banner p {
  color: #ffffff !important;
  text-shadow: 0 1px 2px rgba(0,0,0,0.2);
}
.naac-header-banner p {
  color: rgba(255, 255, 255, 0.8) !important;
}
.naac-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.naac-card-body { 
  padding: 2rem; 
  color: #334155;
  font-size: 0.95rem;
}

/* Custom Table Styling */
.table-responsive {
  border-radius: 12px;
  overflow-x: auto;
  border: 1px solid #cbd5e1;
  margin-top: 0.5rem;
  margin-bottom: 1.5rem;
}
.naac-custom-table {
  margin-bottom: 0 !important;
  width: 100% !important;
  border-collapse: collapse;
}
.naac-custom-table th,
.naac-custom-table tr:first-child td {
  background: #0b2545 !important;
  color: #ffffff !important;
  font-weight: 700 !important;
  font-size: 0.88rem !important;
  text-transform: uppercase !important;
  letter-spacing: 0.5px !important;
  text-align: center !important;
  vertical-align: middle !important;
  padding: 14px 16px !important;
  border: 1px solid #134074 !important;
}
.naac-custom-table th *,
.naac-custom-table tr:first-child td * {
  color: #ffffff !important;
  font-weight: 700 !important;
  background: transparent !important;
}

.naac-custom-table td {
  vertical-align: middle !important;
  padding: 14px 18px !important;
  border: 1px solid #e2e8f0 !important;
  font-size: 0.925rem !important;
  color: #334155 !important;
  line-height: 1.5 !important;
  font-family: inherit !important;
}
.naac-custom-table td * {
  color: #334155;
}
.naac-custom-table tr:nth-child(even) td {
  background-color: #f8fafc !important;
}
.naac-custom-table tr:hover td {
  background-color: #f1f5f9 !important;
}
.naac-custom-table td[colspan],
.naac-custom-table td[rowspan] {
  font-weight: 600 !important;
  color: #0b2545 !important;
}
.naac-custom-table td:last-child {
  text-align: center !important;
}

/* Red PDF Download Button Styling matching site standard */
.btn-naac-pdf {
  background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%) !important;
  color: #ffffff !important;
  border: none !important;
  padding: 7px 16px !important;
  border-radius: 8px !important;
  font-weight: 600 !important;
  font-size: 0.85rem !important;
  text-decoration: none !important;
  display: inline-flex !important;
  align-items: center !important;
  justify-content: center !important;
  gap: 6px !important;
  transition: all 0.25s ease !important;
  box-shadow: 0 4px 10px rgba(220, 38, 38, 0.25) !important;
  white-space: nowrap !important;
}
.btn-naac-pdf:hover {
  background: linear-gradient(135deg, #b91c1c 0%, #991b1b 100%) !important;
  color: #ffffff !important;
  transform: translateY(-2px) !important;
  box-shadow: 0 6px 14px rgba(220, 38, 38, 0.35) !important;
}
.btn-naac-pdf i {
  color: #ffffff !important;
}
</style>
CSS;

    // Replace <style>...</style> block
    $content = preg_replace('/<style>.*?<\/style>/is', $css_replacement, $content);

    file_put_contents($fpath, $content);
    echo "  [DONE] Fixed colors for $fpath\n";
}

echo "All Criteria pages updated with crisp white header text and red PDF buttons!\n";

