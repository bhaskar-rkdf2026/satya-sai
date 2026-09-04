<?php

$files = glob('d:/xampp/htdocs/sssu/satya-sai/Academic/NAAC/Criteria*.php');

foreach ($files as $fpath) {
    echo "Fixing table headers & styling in $fpath...\n";
    $content = file_get_contents($fpath);

    // 1. Fix column count on School of Studies / BOS tables where header cell was missing colspan="2"
    // e.g. <th...>Session...</th> before </tr> -> change to <th colspan="2">Session (2017-18 To 2021-22) / Action</th>
    $content = preg_replace(
        '/<th><strong>Session&nbsp; \(2017-18 To 2021-22\)<\/strong><\/th>\s*<\/tr>/i',
        '<th colspan="2"><strong>Session (2017-18 To 2021-22) / Report</strong></th></tr>',
        $content
    );
    $content = preg_replace(
        '/<th><strong>Session \(2017-18 To 2021-22\)<\/strong><\/th>\s*<\/tr>/i',
        '<th colspan="2"><strong>Session (2017-18 To 2021-22) / Report</strong></th></tr>',
        $content
    );

    // 2. Comprehensive CSS for a unified, non-patchy Dark Navy Header Bar
    $css_unified_header = <<<CSS
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
  color: rgba(255, 255, 255, 0.85) !important;
}
.naac-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}

/* Card Body & Typography Enhancements */
.naac-card-body { 
  padding: 2rem; 
  color: #1e293b !important;
  font-size: 0.975rem !important;
  line-height: 1.65 !important;
}
.naac-card-body p {
  color: #1e293b !important;
  font-size: 0.975rem !important;
  line-height: 1.65 !important;
  margin-bottom: 1rem;
}
.naac-card-body strong,
.naac-card-body b {
  color: #0f172a !important;
  font-weight: 700 !important;
}

/* Metric Callout Box Component */
.naac-metric-box {
  background: #f8fafc;
  border-left: 4px solid #0b2545;
  border-radius: 12px;
  border: 1px solid #e2e8f0;
  padding: 1.25rem 1.5rem;
  margin-top: 1.5rem;
  margin-bottom: 1.5rem;
  box-shadow: 0 2px 8px rgba(15, 23, 42, 0.04);
}
.naac-metric-badge {
  background: linear-gradient(135deg, #0b2545 0%, #1e3a8a 100%);
  color: #ffffff !important;
  font-size: 0.825rem;
  font-weight: 700;
  padding: 5px 12px;
  border-radius: 6px;
  letter-spacing: 0.5px;
  text-transform: uppercase;
  white-space: nowrap;
  box-shadow: 0 2px 4px rgba(11, 37, 69, 0.2);
}
.naac-metric-content {
  color: #1e293b !important;
  font-size: 0.975rem !important;
  font-weight: 500 !important;
  line-height: 1.6 !important;
}

/* Custom Table Container */
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
  border-collapse: collapse !important;
}

/* Unified, Seamless Dark Navy Header Bar (Fixes Patchy Cell Gradients & Gaps) */
.naac-custom-table tr.naac-table-header,
.naac-custom-table thead tr {
  background-color: #0b2545 !important;
}
.naac-custom-table th,
.naac-custom-table tr.naac-table-header td,
.naac-custom-table tr.naac-table-header th,
.naac-custom-table tr:first-child td {
  background-color: #0b2545 !important;
  color: #ffffff !important;
  font-weight: 700 !important;
  font-size: 0.88rem !important;
  text-transform: uppercase !important;
  letter-spacing: 0.5px !important;
  text-align: center !important;
  vertical-align: middle !important;
  padding: 15px 16px !important;
  border: 1px solid #134074 !important;
  border-right: 1px solid rgba(255, 255, 255, 0.15) !important;
}
.naac-custom-table th *,
.naac-custom-table tr.naac-table-header td *,
.naac-custom-table tr.naac-table-header th *,
.naac-custom-table tr:first-child td * {
  color: #ffffff !important;
  font-weight: 700 !important;
  background: transparent !important;
}

/* Uniform Cell Alignment & Typography Rules */
.naac-custom-table td {
  vertical-align: middle !important;
  padding: 14px 18px !important;
  border: 1px solid #e2e8f0 !important;
  font-size: 0.925rem !important;
  color: #334155 !important;
  line-height: 1.5 !important;
  font-family: inherit !important;
  text-align: left !important;
}
.naac-custom-table td * {
  color: #334155;
}

/* Numeric / S.No Column Centering */
.naac-custom-table tbody tr td:first-child:not([rowspan]):not([colspan]) {
  text-align: center !important;
  font-weight: 600 !important;
  color: #0b2545 !important;
}

/* Merged Faculty / School Name Columns Centering */
.naac-custom-table td[colspan],
.naac-custom-table td[rowspan] {
  font-weight: 600 !important;
  color: #0b2545 !important;
  text-align: center !important;
  vertical-align: middle !important;
  background-color: #ffffff !important;
}

/* View PDF Action Button Column Centering */
.naac-custom-table td:last-child {
  text-align: center !important;
}

/* Refined Row Hover Effects */
.naac-custom-table tr:nth-child(even) td:not([rowspan]) {
  background-color: #f8fafc !important;
}
.naac-custom-table tr:hover td:not([rowspan]) {
  background-color: #f1f5f9 !important;
  transition: background-color 0.15s ease-in-out !important;
}

/* Red PDF Download Button Styling */
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

    $content = preg_replace('/<style>.*?<\/style>/is', $css_unified_header, $content);
    file_put_contents($fpath, $content);
    echo "  [DONE] Updated $fpath\n";
}

echo "All Criteria table headers & styling fixed!\n";

