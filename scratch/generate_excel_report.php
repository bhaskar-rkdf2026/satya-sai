<?php
// Script to generate today's task report in Excel (.xls XML Spreadsheet) and CSV formats
$reportsDir = 'd:/xampp/htdocs/satya-sai/reports';
if (!is_dir($reportsDir)) {
    mkdir($reportsDir, 0777, true);
}

$date = '10-09-2026';

$tasks = [
    [
        'sno' => 1,
        'date' => $date,
        'module' => 'Core Architecture',
        'task_name' => 'Project Audit & Migration Setup',
        'description' => 'Audited workspace structure, verified data stores, and established dynamic page routing for SSSUTMS portal.',
        'deliverables' => 'Config files, directory routes, base architecture',
        'status' => 'Completed',
        'priority' => 'High'
    ],
    [
        'sno' => 2,
        'date' => $date,
        'module' => 'Bug Fix / Frontend',
        'task_name' => 'Character Entity & Symbol Encoding Fix',
        'description' => 'Resolved raw &amp; character entity issues across diploma/degree course names and template outputs for clean typographical rendering.',
        'deliverables' => 'Clean typography, proper &amp; decoding in templates',
        'status' => 'Completed',
        'priority' => 'High'
    ],
    [
        'sno' => 3,
        'date' => $date,
        'module' => 'Content Sync',
        'task_name' => 'Diploma & Institute Name Restoration',
        'description' => 'Fixed missing institute names in Diploma courses to strictly match the live web portal layout.',
        'deliverables' => 'Accurate Diploma course listings with institute names',
        'status' => 'Completed',
        'priority' => 'Medium'
    ],
    [
        'sno' => 4,
        'date' => $date,
        'module' => 'Feature / SEO',
        'task_name' => 'Dynamic SEO & Meta Details System',
        'description' => 'Implemented complete dynamic SEO system (meta title, description, keywords, canonical URL, OG social tags) across all pages.',
        'deliverables' => 'Dynamic meta tag engine in includes/header.php',
        'status' => 'Completed',
        'priority' => 'High'
    ],
    [
        'sno' => 5,
        'date' => $date,
        'module' => 'Admin Portal',
        'task_name' => 'SEO Tab Integration in Admin Editors',
        'description' => 'Integrated dynamic SEO & Meta Details tabs with live Google SERP preview and character counters in admin/about.php & admin/faculties.php.',
        'deliverables' => 'SEO editor tabs in Admin panel for all pages',
        'status' => 'Completed',
        'priority' => 'High'
    ],
    [
        'sno' => 6,
        'date' => $date,
        'module' => 'Compliance',
        'task_name' => 'Public Self Disclosure (45 Parameters) Sync',
        'description' => 'Audited all 45 statutory parameters for UGC/NAAC Public Self Disclosure, connecting active live documents and internal routes.',
        'deliverables' => 'data/public_disclosure.json, Public_Self_Disclosure.php',
        'status' => 'Completed',
        'priority' => 'High'
    ],
    [
        'sno' => 7,
        'date' => $date,
        'module' => 'Academic Section',
        'task_name' => 'Faculties & Departments (14 Units) Full Sync',
        'description' => 'Created and synced all 14 Faculty pages with dean profiles, department structures, stat counters, and syllabus PDF attachments.',
        'deliverables' => '14 Academic faculty files, data/faculty_pages.json',
        'status' => 'Completed',
        'priority' => 'High'
    ],
    [
        'sno' => 8,
        'date' => $date,
        'module' => 'About Section',
        'task_name' => 'About Pages (42 Pages) Audit & Live Sync',
        'description' => 'Verified and connected all 42 sub-pages and nested pages under About menu, ensuring zero broken links and 100% HTTP 200 responses.',
        'deliverables' => '42 About pages, data/about_pages.json, admin/about.php',
        'status' => 'Completed',
        'priority' => 'High'
    ],
    [
        'sno' => 9,
        'date' => $date,
        'module' => 'Institutes',
        'task_name' => 'Institutes Page Live Link Alignment',
        'description' => 'Synced About/Institutes.php with live site. Only live-linked pages have anchor tags; unlinked units remain clean static cards.',
        'deliverables' => 'Authentic link structure for 14 institutes + 4 pharmacy units',
        'status' => 'Completed',
        'priority' => 'High'
    ],
    [
        'sno' => 10,
        'date' => $date,
        'module' => 'UI / Layout',
        'task_name' => 'Institutes 2-Column Responsive Grid',
        'description' => 'Converted Institutes page cards from single-column vertical list to modern 2-column balanced responsive grid.',
        'deliverables' => 'Bootstrap 2-column grid layout in About/Institutes.php',
        'status' => 'Completed',
        'priority' => 'Medium'
    ],
    [
        'sno' => 11,
        'date' => $date,
        'module' => 'UI / Layout',
        'task_name' => 'Institutes Card Height & Width Uniformity',
        'description' => 'Engineered .institute-grid-card CSS rules (min-height: 62px, width: 100%, height: 100%) to ensure strictly identical card dimensions.',
        'deliverables' => 'Uniform card dimensions in assets/css/style.css',
        'status' => 'Completed',
        'priority' => 'High'
    ],
    [
        'sno' => 12,
        'date' => $date,
        'module' => 'Content Cleanup',
        'task_name' => 'Removal of Dummy Banners & Extra Subtitles',
        'description' => 'Removed extra dark blue top banner card and all 18 dummy subtitles, retaining strictly the authentic live portal content.',
        'deliverables' => 'Clean live text in data/about_pages.json & fallback',
        'status' => 'Completed',
        'priority' => 'High'
    ],
    [
        'sno' => 13,
        'date' => $date,
        'module' => 'CSS Bug Fix',
        'task_name' => 'Heading Accent Underline Center Alignment Fix',
        'description' => 'Fixed CSS bug where centered headings (e.g. INSTITUTE) had orange underline stuck at left: 0. Added left: 50% with translateX(-50%).',
        'deliverables' => 'Symmetric heading underline centering in style.css',
        'status' => 'Completed',
        'priority' => 'Medium'
    ],
    [
        'sno' => 14,
        'date' => $date,
        'module' => 'Admin Styling',
        'task_name' => 'Admin Button Brand Color Harmonization',
        'description' => 'Styled admin primary buttons with portal dark navy gradient (#0b2545 to #134074) and gold hover accents (#f59e0b).',
        'deliverables' => 'Brand color button system in assets/css/admin.css',
        'status' => 'Completed',
        'priority' => 'Medium'
    ],
    [
        'sno' => 15,
        'date' => $date,
        'module' => 'Admin Portal',
        'task_name' => 'Admin About Pages Cards Redesign (Equal Height)',
        'description' => 'Redesigned all 42 page cards in admin/about.php with d-flex stretch, fixed slot heights for badges/titles/paths/desc, and fixed stat icon contrast.',
        'deliverables' => '100% equal height grid cards in admin/about.php',
        'status' => 'Completed',
        'priority' => 'High'
    ]
];

// 1. GENERATE CSV WITH UTF-8 BOM
$csvFile = $reportsDir . '/Today_Task_Report_' . date('Y-m-d') . '.csv';
$fp = fopen($csvFile, 'w');
// Write UTF-8 BOM for Microsoft Excel auto-detect
fwrite($fp, "\xEF\xBB\xBF");
fputcsv($fp, ['S.No.', 'Date', 'Module / Category', 'Task Name', 'Description', 'Deliverables', 'Priority', 'Status']);

foreach ($tasks as $t) {
    fputcsv($fp, [
        $t['sno'],
        $t['date'],
        $t['module'],
        $t['task_name'],
        $t['description'],
        $t['deliverables'],
        $t['priority'],
        $t['status']
    ]);
}
fclose($fp);
echo "CSV generated: $csvFile\n";

// 2. GENERATE RICH EXCEL XML SPREADSHEET (.xls)
$xlsFile = $reportsDir . '/Today_Task_Report_' . date('Y-m-d') . '.xls';

$xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
$xml .= '<?mso-application progid="Excel.Sheet"?>' . "\n";
$xml .= '<Workbook xmlns="urn:schemas-microsoft-com:office:spreadsheet"' . "\n";
$xml .= ' xmlns:o="urn:schemas-microsoft-com:office:office"' . "\n";
$xml .= ' xmlns:x="urn:schemas-microsoft-com:office:excel"' . "\n";
$xml .= ' xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet"' . "\n";
$xml .= ' xmlns:html="http://www.w3.org/TR/REC-html40">' . "\n";

// Styles
$xml .= ' <Styles>' . "\n";
// Default style
$xml .= '  <Style ss:ID="Default" ss:Name="Normal">' . "\n";
$xml .= '   <Alignment ss:Vertical="Center"/>' . "\n";
$xml .= '   <Font ss:FontName="Segoe UI" ss:Size="10" ss:Color="#334155"/>' . "\n";
$xml .= '  </Style>' . "\n";

// Title Banner Style
$xml .= '  <Style ss:ID="TitleStyle">' . "\n";
$xml .= '   <Alignment ss:Horizontal="Center" ss:Vertical="Center"/>' . "\n";
$xml .= '   <Font ss:FontName="Segoe UI" ss:Size="16" ss:Bold="1" ss:Color="#FFFFFF"/>' . "\n";
$xml .= '   <Interior ss:Color="#0B2545" ss:Pattern="Solid"/>' . "\n";
$xml .= '  </Style>' . "\n";

// Subtitle Style
$xml .= '  <Style ss:ID="SubTitleStyle">' . "\n";
$xml .= '   <Alignment ss:Horizontal="Center" ss:Vertical="Center"/>' . "\n";
$xml .= '   <Font ss:FontName="Segoe UI" ss:Size="10" ss:Italic="1" ss:Color="#F59E0B"/>' . "\n";
$xml .= '   <Interior ss:Color="#07192F" ss:Pattern="Solid"/>' . "\n";
$xml .= '  </Style>' . "\n";

// Header Row Style
$xml .= '  <Style ss:ID="HeaderStyle">' . "\n";
$xml .= '   <Alignment ss:Horizontal="Center" ss:Vertical="Center" ss:WrapText="1"/>' . "\n";
$xml .= '   <Borders>' . "\n";
$xml .= '    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="2" ss:Color="#0B2545"/>' . "\n";
$xml .= '    <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#CBD5E1"/>' . "\n";
$xml .= '    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#CBD5E1"/>' . "\n";
$xml .= '    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#CBD5E1"/>' . "\n";
$xml .= '   </Borders>' . "\n";
$xml .= '   <Font ss:FontName="Segoe UI" ss:Size="11" ss:Bold="1" ss:Color="#FFFFFF"/>' . "\n";
$xml .= '   <Interior ss:Color="#134074" ss:Pattern="Solid"/>' . "\n";
$xml .= '  </Style>' . "\n";

// Data Row Normal
$xml .= '  <Style ss:ID="DataRow">' . "\n";
$xml .= '   <Alignment ss:Vertical="Center" ss:WrapText="1"/>' . "\n";
$xml .= '   <Borders>' . "\n";
$xml .= '    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#E2E8F0"/>' . "\n";
$xml .= '    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#E2E8F0"/>' . "\n";
$xml .= '    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#E2E8F0"/>' . "\n";
$xml .= '   </Borders>' . "\n";
$xml .= '   <Font ss:FontName="Segoe UI" ss:Size="9.5" ss:Color="#1E293B"/>' . "\n";
$xml .= '  </Style>' . "\n";

// Data Row Center (for Sno, Date, Module)
$xml .= '  <Style ss:ID="DataRowCenter">' . "\n";
$xml .= '   <Alignment ss:Horizontal="Center" ss:Vertical="Center"/>' . "\n";
$xml .= '   <Borders>' . "\n";
$xml .= '    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#E2E8F0"/>' . "\n";
$xml .= '    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#E2E8F0"/>' . "\n";
$xml .= '    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#E2E8F0"/>' . "\n";
$xml .= '   </Borders>' . "\n";
$xml .= '   <Font ss:FontName="Segoe UI" ss:Size="9.5" ss:Color="#1E293B"/>' . "\n";
$xml .= '  </Style>' . "\n";

// Status Completed Badge Style (Green)
$xml .= '  <Style ss:ID="StatusCompleted">' . "\n";
$xml .= '   <Alignment ss:Horizontal="Center" ss:Vertical="Center"/>' . "\n";
$xml .= '   <Borders>' . "\n";
$xml .= '    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#E2E8F0"/>' . "\n";
$xml .= '    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#E2E8F0"/>' . "\n";
$xml .= '    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#E2E8F0"/>' . "\n";
$xml .= '   </Borders>' . "\n";
$xml .= '   <Font ss:FontName="Segoe UI" ss:Size="9.5" ss:Bold="1" ss:Color="#047857"/>' . "\n";
$xml .= '   <Interior ss:Color="#D1FAE5" ss:Pattern="Solid"/>' . "\n";
$xml .= '  </Style>' . "\n";

// Priority High Style
$xml .= '  <Style ss:ID="PriorityHigh">' . "\n";
$xml .= '   <Alignment ss:Horizontal="Center" ss:Vertical="Center"/>' . "\n";
$xml .= '   <Borders>' . "\n";
$xml .= '    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#E2E8F0"/>' . "\n";
$xml .= '    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#E2E8F0"/>' . "\n";
$xml .= '    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#E2E8F0"/>' . "\n";
$xml .= '   </Borders>' . "\n";
$xml .= '   <Font ss:FontName="Segoe UI" ss:Size="9.5" ss:Bold="1" ss:Color="#B91C1C"/>' . "\n";
$xml .= '   <Interior ss:Color="#FEE2E2" ss:Pattern="Solid"/>' . "\n";
$xml .= '  </Style>' . "\n";

// Priority Medium Style
$xml .= '  <Style ss:ID="PriorityMedium">' . "\n";
$xml .= '   <Alignment ss:Horizontal="Center" ss:Vertical="Center"/>' . "\n";
$xml .= '   <Borders>' . "\n";
$xml .= '    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#E2E8F0"/>' . "\n";
$xml .= '    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#E2E8F0"/>' . "\n";
$xml .= '    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#E2E8F0"/>' . "\n";
$xml .= '   </Borders>' . "\n";
$xml .= '   <Font ss:FontName="Segoe UI" ss:Size="9.5" ss:Bold="1" ss:Color="#B45309"/>' . "\n";
$xml .= '   <Interior ss:Color="#FEF3C7" ss:Pattern="Solid"/>' . "\n";
$xml .= '  </Style>' . "\n";

// Summary Row Style
$xml .= '  <Style ss:ID="SummaryStyle">' . "\n";
$xml .= '   <Alignment ss:Horizontal="Center" ss:Vertical="Center"/>' . "\n";
$xml .= '   <Borders>' . "\n";
$xml .= '    <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="2" ss:Color="#0B2545"/>' . "\n";
$xml .= '    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="2" ss:Color="#0B2545"/>' . "\n";
$xml .= '   </Borders>' . "\n";
$xml .= '   <Font ss:FontName="Segoe UI" ss:Size="10.5" ss:Bold="1" ss:Color="#0B2545"/>' . "\n";
$xml .= '   <Interior ss:Color="#E2E8F0" ss:Pattern="Solid"/>' . "\n";
$xml .= '  </Style>' . "\n";

$xml .= ' </Styles>' . "\n";

// Worksheet
$xml .= ' <Worksheet ss:Name="Today Task Report">' . "\n";
$xml .= '  <Table ss:DefaultRowHeight="20">' . "\n";
$xml .= '   <Column ss:Width="45"/>' . "\n";  // S.No.
$xml .= '   <Column ss:Width="85"/>' . "\n";  // Date
$xml .= '   <Column ss:Width="130"/>' . "\n"; // Module
$xml .= '   <Column ss:Width="230"/>' . "\n"; // Task Name
$xml .= '   <Column ss:Width="360"/>' . "\n"; // Description
$xml .= '   <Column ss:Width="230"/>' . "\n"; // Deliverables
$xml .= '   <Column ss:Width="75"/>' . "\n";  // Priority
$xml .= '   <Column ss:Width="95"/>' . "\n";  // Status

// Title Row
$xml .= '   <Row ss:Height="36">' . "\n";
$xml .= '    <Cell ss:MergeAcross="7" ss:StyleID="TitleStyle"><Data ss:Type="String">SRI SATYA SAI UNIVERSITY (SSSUTMS) - DAILY TASK REPORT</Data></Cell>' . "\n";
$xml .= '   </Row>' . "\n";

// Subtitle Row
$xml .= '   <Row ss:Height="22">' . "\n";
$xml .= '    <Cell ss:MergeAcross="7" ss:StyleID="SubTitleStyle"><Data ss:Type="String">Date: ' . $date . ' | Execution Status: All 15 Tasks Completed Successfully</Data></Cell>' . "\n";
$xml .= '   </Row>' . "\n";

// Empty Spacer Row
$xml .= '   <Row ss:Height="8"/>' . "\n";

// Header Row
$xml .= '   <Row ss:Height="28">' . "\n";
$xml .= '    <Cell ss:StyleID="HeaderStyle"><Data ss:Type="String">S.No.</Data></Cell>' . "\n";
$xml .= '    <Cell ss:StyleID="HeaderStyle"><Data ss:Type="String">Date</Data></Cell>' . "\n";
$xml .= '    <Cell ss:StyleID="HeaderStyle"><Data ss:Type="String">Module / Category</Data></Cell>' . "\n";
$xml .= '    <Cell ss:StyleID="HeaderStyle"><Data ss:Type="String">Task Name</Data></Cell>' . "\n";
$xml .= '    <Cell ss:StyleID="HeaderStyle"><Data ss:Type="String">Task Details / Description</Data></Cell>' . "\n";
$xml .= '    <Cell ss:StyleID="HeaderStyle"><Data ss:Type="String">Deliverables / Affected Files</Data></Cell>' . "\n";
$xml .= '    <Cell ss:StyleID="HeaderStyle"><Data ss:Type="String">Priority</Data></Cell>' . "\n";
$xml .= '    <Cell ss:StyleID="HeaderStyle"><Data ss:Type="String">Status</Data></Cell>' . "\n";
$xml .= '   </Row>' . "\n";

// Data Rows
foreach ($tasks as $t) {
    $pStyle = ($t['priority'] === 'High') ? 'PriorityHigh' : 'PriorityMedium';

    $xml .= '   <Row ss:Height="38">' . "\n";
    $xml .= '    <Cell ss:StyleID="DataRowCenter"><Data ss:Type="Number">' . $t['sno'] . '</Data></Cell>' . "\n";
    $xml .= '    <Cell ss:StyleID="DataRowCenter"><Data ss:Type="String">' . htmlspecialchars($t['date']) . '</Data></Cell>' . "\n";
    $xml .= '    <Cell ss:StyleID="DataRow"><Data ss:Type="String">' . htmlspecialchars($t['module']) . '</Data></Cell>' . "\n";
    $xml .= '    <Cell ss:StyleID="DataRow"><Data ss:Type="String">' . htmlspecialchars($t['task_name']) . '</Data></Cell>' . "\n";
    $xml .= '    <Cell ss:StyleID="DataRow"><Data ss:Type="String">' . htmlspecialchars($t['description']) . '</Data></Cell>' . "\n";
    $xml .= '    <Cell ss:StyleID="DataRow"><Data ss:Type="String">' . htmlspecialchars($t['deliverables']) . '</Data></Cell>' . "\n";
    $xml .= '    <Cell ss:StyleID="' . $pStyle . '"><Data ss:Type="String">' . htmlspecialchars($t['priority']) . '</Data></Cell>' . "\n";
    $xml .= '    <Cell ss:StyleID="StatusCompleted"><Data ss:Type="String">' . htmlspecialchars($t['status']) . '</Data></Cell>' . "\n";
    $xml .= '   </Row>' . "\n";
}

// Summary Row
$xml .= '   <Row ss:Height="26">' . "\n";
$xml .= '    <Cell ss:MergeAcross="5" ss:StyleID="SummaryStyle"><Data ss:Type="String">TOTAL TASKS: 15 | COMPLETED: 15 | IN PROGRESS: 0 | PENDING: 0</Data></Cell>' . "\n";
$xml .= '    <Cell ss:MergeAcross="1" ss:StyleID="SummaryStyle"><Data ss:Type="String">100% COMPLETED</Data></Cell>' . "\n";
$xml .= '   </Row>' . "\n";

$xml .= '  </Table>' . "\n";
$xml .= ' </Worksheet>' . "\n";
$xml .= '</Workbook>' . "\n";

file_put_contents($xlsFile, $xml);
echo "XLS generated: $xlsFile\n";
