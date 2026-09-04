<?php

$files = glob('d:/xampp/htdocs/sssu/satya-sai/Academic/NAAC/Criteria*.php');

foreach ($files as $fpath) {
    echo "Refining $fpath...\n";
    $content = file_get_contents($fpath);

    // 1. Remove style="height:..." or style="width:..." or align="..." from tr and td
    $content = preg_replace('/<tr\s+[^>]*>/i', '<tr>', $content);
    $content = preg_replace('/<td\s+style=["\'][^"\']*["\']/i', '<td', $content);
    $content = preg_replace('/<td\s+align=["\'][^"\']*["\']/i', '<td', $content);
    $content = preg_replace('/<td\s+valign=["\'][^"\']*["\']/i', '<td', $content);

    // 2. Clean multiple &nbsp;
    $content = preg_replace('/(&nbsp;\s*){2,}/i', ' ', $content);

    // 3. Clean raw live PDF links that were missed
    $content = preg_replace_callback('/<a\s+[^>]*href=["\']([^"\']+)["\'][^>]*>(.*?)<\/a>/is', function($matches) {
        $full_a = $matches[0];
        $href = $matches[1];
        if (stripos($href, '.pdf') !== false || stripos($href, '.pd') !== false) {
            $rel_path = '';
            if (stripos($href, 'Files/') !== false) {
                $parts = explode('Files/', $href);
                $rel_path = 'assets/images/Files/' . $parts[1];
            } else {
                $filename = basename(parse_url($href, PHP_URL_PATH));
                $rel_path = 'assets/images/Files/Link/IQAC/NAAC/' . $filename;
            }

            $rel_path = str_replace('%20', ' ', $rel_path);
            $rel_path = str_replace('\\', '/', $rel_path);

            if (substr($rel_path, -3) === '.pd') {
                $rel_path .= 'f';
            }

            return '<a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>' . $rel_path . '" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a>';
        }
        return $full_a;
    }, $content);

    // 4. Criteria 1 BOM & BOG explicit replacement
    if (strpos($fpath, 'CriteriaOne.php') !== false) {
        $content = preg_replace(
            '/(Board of Governance.*?<a\s+[^>]*class="btn btn-sm btn-naac-pdf"\s+href=")[^"]+(")/is',
            '$1<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/BOG FINAL.pdf$2',
            $content
        );
        $content = preg_replace(
            '/(Board of Management.*?<a\s+[^>]*class="btn btn-sm btn-naac-pdf"\s+href=")[^"]+(")/is',
            '$1<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/BOM FINAL.pdf$2',
            $content
        );
    }

    // 5. Inject comprehensive CSS for table blocks and typography consistency
    $css_enhancement = <<<CSS

/* Comprehensive Table Typography & Block Placement Fix */
.naac-card-body table.naac-custom-table {
  width: 100% !important;
  border-collapse: separate !important;
  border-spacing: 0 !important;
  border-radius: 10px !important;
  overflow: hidden !important;
  border: 1px solid #cbd5e1 !important;
  margin-top: 1rem !important;
  margin-bottom: 2rem !important;
  box-shadow: 0 4px 12px rgba(15, 23, 42, 0.03) !important;
}
.naac-card-body table.naac-custom-table tr:first-child td,
.naac-card-body table.naac-custom-table th {
  background: linear-gradient(135deg, #0b2545 0%, #1e3a8a 100%) !important;
  color: #ffffff !important;
  font-weight: 700 !important;
  font-size: 0.925rem !important;
  text-transform: uppercase !important;
  letter-spacing: 0.5px !important;
  text-align: center !important;
  vertical-align: middle !important;
  padding: 16px !important;
  border: 1px solid #1e3a8a !important;
}
.naac-card-body table.naac-custom-table td {
  padding: 14px 18px !important;
  border: 1px solid #e2e8f0 !important;
  vertical-align: middle !important;
  font-size: 0.925rem !important;
  color: #334155 !important;
  line-height: 1.5 !important;
  font-family: inherit !important;
}
.naac-card-body table.naac-custom-table tr:nth-child(even) td {
  background-color: #f8fafc !important;
}
.naac-card-body table.naac-custom-table tr:hover td {
  background-color: #f1f5f9 !important;
}
.naac-card-body table.naac-custom-table td[colspan],
.naac-card-body table.naac-custom-table td[rowspan] {
  font-weight: 600 !important;
  color: #0b2545 !important;
  background-color: #f8fafc;
}
.naac-card-body table.naac-custom-table td:last-child {
  text-align: center !important;
}
CSS;

    if (strpos($content, '/* Comprehensive Table Typography') === false) {
        $content = str_replace('</style>', $css_enhancement . "\n</style>", $content);
    }

    file_put_contents($fpath, $content);
    echo "  [DONE] Refined $fpath\n";
}

echo "All Criteria files refined successfully!\n";

