import re
import glob

files = glob.glob('d:/xampp/htdocs/sssu/satya-sai/Academic/NAAC/Criteria*.php')

for fpath in files:
    print(f"Refining {fpath}...")
    with open(fpath, 'r', encoding='utf-8') as f:
        content = f.read()

    # 1. Remove style="height:..." or style="width:..." or align="..." from tr and td
    content = re.sub(r'<tr\s+[^>]*>', '<tr>', content)
    content = re.sub(r'<td\s+style=["\'][^"\']*["\']', '<td', content)
    content = re.sub(r'<td\s+align=["\'][^"\']*["\']', '<td', content)
    content = re.sub(r'<td\s+valign=["\'][^"\']*["\']', '<td', content)

    # 2. Clean multiple &nbsp;
    content = re.sub(r'(&nbsp;\s*){2,}', ' ', content)

    # 3. Clean raw live PDF links that were missed
    def fix_pdf_link(m):
        full_a = m.group(0)
        href = m.group(1)
        if '.pdf' in href.lower() or '.pd' in href.lower():
            # extract path relative to Files
            rel_path = ''
            if 'Files/' in href:
                rel_path = 'assets/images/Files/' + href.split('Files/')[1]
            else:
                filename = href.split('/')[-1]
                rel_path = 'assets/images/Files/Link/IQAC/NAAC/' + filename
            
            # clean url encoding
            rel_path = rel_path.replace('%20', ' ').replace('\\', '/')
            # check extension
            if rel_path.endswith('.pd'):
                rel_path += 'f'
            
            return f'<a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>{rel_path}" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a>'
        return full_a

    content = re.sub(r'<a\s+[^>]*href=["\']([^"\']+)["\'][^>]*>(.*?)<\/a>', fix_pdf_link, content)

    # 4. Criteria 1 BOM & BOG explicit replacement
    if 'CriteriaOne.php' in fpath:
        content = re.sub(
            r'(Board of Governance.*?<a\s+[^>]*class="btn btn-sm btn-naac-pdf"\s+href=")[^"]+(")',
            r'\1<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/BOG FINAL.pdf\2',
            content,
            flags=re.DOTALL
        )
        content = re.sub(
            r'(Board of Management.*?<a\s+[^>]*class="btn btn-sm btn-naac-pdf"\s+href=")[^"]+(")',
            r'\1<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/BOM FINAL.pdf\2',
            content,
            flags=re.DOTALL
        )

    # 5. Inject comprehensive CSS for table blocks and typography consistency
    css_enhancement = """
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
"""

    if '/* Comprehensive Table Typography' not in content:
        content = content.replace('</style>', css_enhancement + '\n</style>')

    with open(fpath, 'w', encoding='utf-8') as f:
        f.write(content)

    print(f"  [DONE] Refined {fpath}")

print("All Criteria files refined successfully!")
