import glob
import re

files = glob.glob('d:/xampp/htdocs/sssu/satya-sai/Academic/NAAC/Criteria*.php')

for fpath in files:
    print(f"Auditing shifted headers in {fpath}...")
    with open(fpath, 'r', encoding='utf-8') as f:
        content = f.read()

    # 1. Replace empty <td></td> at the start of header rows
    content = re.sub(
        r'<tr[^>]*>\s*<td[^>]*>\s*<\/td>\s*<td[^>]*>\s*<strong[^>]*>Department<\/strong>\s*<\/td>\s*<td[^>]*>\s*<strong[^>]*>Program<\/strong>\s*<\/td>\s*<td[^>]*>\s*<strong[^>]*>Session[^<]*<\/strong>\s*<\/td>\s*<\/tr>',
        '<tr class="naac-table-header"><th colspan="2">School Name</th><th>Department</th><th>Program</th><th colspan="2">Session (2017-18 To 2021-22) / Report</th></tr>',
        content,
        flags=re.IGNORECASE
    )

    # 2. Fix any other shifted header rows
    content = re.sub(
        r'<tr[^>]*>\s*<th[^>]*>\s*<\/th>\s*<th[^>]*>\s*<strong[^>]*>Department<\/strong>\s*<\/th>\s*<th[^>]*>\s*<strong[^>]*>Program<\/strong>\s*<\/th>\s*<th[^>]*>\s*<strong[^>]*>Session[^<]*<\/strong>\s*<\/th>\s*<\/tr>',
        '<tr class="naac-table-header"><th colspan="2">School Name</th><th>Department</th><th>Program</th><th colspan="2">Session (2017-18 To 2021-22) / Report</th></tr>',
        content,
        flags=re.IGNORECASE
    )

    # 3. Fix any table header missing colspan="2" on the last column or School Name column
    content = re.sub(
        r'<tr class="naac-table-header">\s*<th colspan="2">\s*<strong>School Name<\/strong>\s*<\/th>\s*<th>\s*<strong>Department\s*<\/strong>\s*<\/th>\s*<th>\s*<strong>Program\s*<\/strong>\s*<\/th>\s*<th>\s*<strong>Session[^<]*<\/strong>\s*<\/th>\s*<\/tr>',
        '<tr class="naac-table-header"><th colspan="2">School Name</th><th>Department</th><th>Program</th><th colspan="2">Session (2017-18 To 2021-22) / Report</th></tr>',
        content,
        flags=re.IGNORECASE
    )

    # 4. Clean up any leftover empty td/th header tags
    content = re.sub(r'<tr>\s*<td><\/td>\s*<td><strong>Department<\/strong><\/td>', '<tr class="naac-table-header"><th colspan="2">School Name</th><th>Department</th>', content)

    # 5. Fix empty cells under School of Management / Hotel / Homeopathy / Agriculture in Table 3
    content = content.replace('<td colspan="2" rowspan="2"></td>\n<td rowspan="2"></td>', '<td colspan="2" rowspan="2">School of Management Studies</td>\n<td rowspan="2">Management</td>')
    content = content.replace('<td colspan="2"></td>\n<td>HOTEL MANAGEMENT AND CATERING</td>', '<td colspan="2">School of Hotel Management</td>\n<td>Hotel Management</td>')
    content = content.replace('<td colspan="2"></td>\n<td>Homeopathy</td>', '<td colspan="2">Faculty of Homeopathy</td>\n<td>Homeopathy</td>')

    with open(fpath, 'w', encoding='utf-8') as f:
        f.write(content)

    print(f"  [DONE] Fixed {fpath}")

print("All Criteria shifted headers fixed!")
