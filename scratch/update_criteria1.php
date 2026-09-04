<?php
$file = 'd:/xampp/htdocs/sssu/satya-sai/Academic/NAAC/CriteriaOne.php';
$content = file_get_contents($file);

// Replace Academic Council Meeting link
$content = preg_replace(
    '/(Academic Council Meeting.*?)(<a\s+href=")[^"]*(")/s',
    '$1$2<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/AC FINAL.pdf$3',
    $content
);

// Replace Board of Management Meetings link
$content = preg_replace(
    '/(Board of Mangement Meetings.*?)(<a\s+href=")[^"]*(")/s',
    '$1$2<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/BOM FINAL.pdf$3',
    $content
);

// Replace Board of Governance Meetings link
$content = preg_replace(
    '/(Board of Governance.*?)(<a\s+href=")[^"]*(")/s',
    '$1$2<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/BOM FINAL.pdf$3',
    $content
);

// Department mappings for syllabus links
$deptMap = [
    'Aeronautical' => 'Criteria 1/AERONAUTICAL/AREO SY- Combine FINAL.pdf',
    'Chemical' => 'Criteria 1/CHEMICAL/CHEMICAL SY Combine.pdf',
    'Civil' => 'Criteria 1/CIVIL/CIVIL SY Combine.pdf',
    'Computer Science' => 'Criteria 1/CS/cse syllabus updated file.pdf',
    'Electrical & Electronics' => 'Criteria 1/EX/EX SY Combine.pdf',
    'Electrical Engineering' => 'Criteria 1/EE/EE SY Combine.pdf',
    'Electronics & Communication' => 'Criteria 1/EC/EC SY-Combine.pdf',
    'Electronics & Instrumentation' => 'Criteria 1/EI/SY EI-Combine.pdf',
    'Information Technology' => 'syllabus/IT/IT SY-Combine.pdf',
    'Mechanical' => 'Criteria 1/MECHANICAL/FINAL MECHANICAL -color-Combine.pdf',
    'Mining' => 'Criteria 1/MINING/MINING SY-Combine.pdf',
    'Pharmacy' => 'Criteria 1/PHARMACY/PHARMACY-SY Combine.pdf',
    'Management' => 'Criteria 1/BBA-MBA/BBA MBA SY-Combine.pdf',
    'Commerce' => 'Criteria 1/COMMERCE/edited pdf commerce.pdf',
    'Law' => 'Criteria 1/LLB/LLB SY-Combine.pdf',
    'Arts' => 'Criteria 1/ARTS/ARTS SY- Combine (1) - Copy.pdf',
    'Science' => 'Criteria 1/SCIENCE/SCIENCE NEW- SY Combine.pdf',
    'Education' => 'Criteria 1/BA-BeD/BA BED SY-Combine.pdf',
    'Physical Education' => 'Criteria 1/BPeD/bped syllabus final (2).pdf',
    'Computer Application' => 'Criteria 1/COMPUTER APPLICATION/mca Combine.pdf',
    'Hotel Management' => 'Criteria 1/HOTEL MANAGEMENT/SY-Combine final f1.pdf',
    'Homeopathy' => 'syllabus/BHMS/BHMS SY Combine.pdf',
    'Agriculture' => 'syllabus/AGRICULTURE/SY-Combine.pdf',
    'Ayurveda' => 'Criteria 1/AYURVEDA/Ayurveda SY Combine.pdf',
    'Nursing' => 'Criteria 1/NURSING/NURSING-SY Combine CORRECT.pdf',
    'Paramedical' => 'Criteria 1/PARAMEDICAL/para syllabus combine final - Copy.pdf',
];

// Value Added Courses (1.3.2)
$content = preg_replace(
    '/(1\.3\.2|Value Added Courses.*?)(<a\s+href=")[^"]*(")/si',
    '$1$2<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/VAC UP FINAL.pdf$3',
    $content
);

// Field Projects / Internships (1.3.4)
$content = preg_replace(
    '/(1\.3\.4|Field Projects.*?)(<a\s+href=")[^"]*(")/si',
    '$1$2<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/1.3.4 COMBINED PDF.pdf$3',
    $content
);

// Feedback Reports (1.4.1 / 1.4.2)
$content = preg_replace(
    '/(1\.4\.1|1\.4\.2|Feedback.*?)(<a\s+href=")[^"]*(")/si',
    '$1$2<?php echo BASE_URL; ?>assets/images/Files/Link/SCHEME2021/feedback reports  Combine.pdf$3',
    $content
);

// Update general empty href="#" in syllabus table to local links
foreach ($deptMap as $dept => $relPath) {
    // Look for department section and replace href="#" within that section
    $pattern = '/(' . preg_quote($dept, '/') . '.*?)(<a\s+href=")[^"]*(")/si';
    $content = preg_replace($pattern, '$1$2<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/' . $relPath . '$3', $content);
}

// Any remaining href="#" replace with a fallback to Criteria 1 AC or BOM PDF
$content = str_replace('href="#"', 'href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/AC FINAL.pdf"', $content);

file_put_contents($file, $content);
echo "CriteriaOne.php updated successfully!\n";
