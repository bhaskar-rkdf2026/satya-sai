<?php
// Load parsed notices
$noticesRaw = json_decode(file_get_contents('scratch/parsed_admission_notices.json'), true);
$notices = [];
foreach ($noticesRaw as $idx => $n) {
    $title = $n['title'];
    if (empty($title) || $title == '&nbsp;') {
        $title = "Admission Notification " . ($idx + 1);
    }
    // Clean html entities
    $title = html_entity_decode($title, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $title = trim(preg_replace('/\s+/', ' ', $title));
    
    // Check if new/urgent
    $isNew = (strpos($title, '2026-27') !== false || strpos($title, 'Open') !== false || $idx < 5);
    
    $notices[] = [
        'id' => 2000 + $idx,
        'title' => $title,
        'url' => $n['url'],
        'date' => ($idx < 5 ? '2026-07-21' : ($idx < 15 ? '2025-08-01' : '2024-03-31')),
        'is_new' => $isNew,
        'category' => 'Admission'
    ];
}

// Load parsed fee rows
$feesRaw = json_decode(file_get_contents('scratch/parsed_fees_structure.json'), true);
$fees = [];
$sno = 1;
foreach ($feesRaw as $row) {
    if ($row[0] == 'S. No.' || strpos($row[0], 'S.') !== false) continue;
    $course = html_entity_decode($row[1] ?? '', ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $tuition = html_entity_decode($row[2] ?? '', ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $eligibility = html_entity_decode($row[3] ?? '', ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $duration = html_entity_decode($row[4] ?? '', ENT_QUOTES | ENT_HTML5, 'UTF-8');
    
    if (empty($course) || empty($tuition)) continue;
    
    $fees[] = [
        'id' => 3000 + $sno,
        'sno' => $sno,
        'course' => trim($course),
        'tuition' => trim($tuition),
        'eligibility' => trim($eligibility),
        'duration' => trim($duration)
    ];
    $sno++;
}

$admissionData = [
    'AdmissionProcedure' => [
        'page_title' => 'Admission Procedure',
        'lead_title' => 'Admission Procedure',
        'description' => 'Admissions to various Technical, Professional & General Courses will be made in accordance with the guidelines provided by University Regulatory Authority, M.P. & State Government of Madhya Pradesh, as amended or suggested from time to time. The fees charged for all the courses will be as per approval accorded by Madhya Pradesh Niji Vishwavidyalaya Niyamak Aayog , Bhopal (Madhya Pradesh)',
        'pdf_link' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Admission/adm_procedure.pdf',
        'pdf_label' => 'Admission Procedure (Click Here)',
        'image' => 'assets/images/admission/AdmissionProcedure_img_0.jpg'
    ],
    'AdmissionNotice' => [
        'page_title' => 'Admission Notice',
        'heading' => 'Admission Notice (2026-27)',
        'subtitle' => 'Official Notifications, Circulars & Entrance Exam Schedules',
        'notices' => $notices
    ],
    'Brochures' => [
        'page_title' => 'Brochures',
        'heading' => 'ADMISSION BROCHURE',
        'prospectus_pdf' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/MAIN_19112025_0435.pdf',
        'prospectus_label' => 'Prospectus (Click Here)',
        'cover_image' => 'assets/images/admission/Brochures_img_2.png',
        'folder_icon' => 'assets/images/admission/Brochures_img_0.png',
        'arrow_icon' => 'assets/images/admission/Brochures_img_1.png'
    ],
    'FeesStructure' => [
        'page_title' => 'Fee Structure and Fees Refund Policy',
        'subtitle' => 'Eligibility Criteria & Fees Structure',
        'refund_policy_pdf' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Fees_Refund_Policy_04012025_0322.pdf',
        'refund_policy_label' => 'Download Official Fees Refund Policy (PDF)',
        'fees' => $fees
    ],
    'UniversityAccountDetail' => [
        'page_title' => 'University Account Detail',
        'bank_title' => 'Bank Detail',
        'bank_desc' => 'Sri Satya Sai Group of Institutions has a full-fledged branch of Punjab National Bank and its ATM in the college premises. It is a Nationalized Bank which has given all kinds of transactional facility to students and staff. The bank also provides zero balance accounts to students, helps them in procuring Education loan and promotes their students friendly schemes.',
        'bank_name' => 'Punjab National Bank',
        'account_name' => 'SSSUTMS',
        'account_number' => '7162002100000506',
        'ifsc_code' => 'PUNB0716200',
        'branch' => 'SSSUTMS Campus, Sehore (M.P.)',
        'online_banking_url' => 'https://sssutms.payjix.com/',
        'qr_image' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/WhatsApp_Image_2026-01-21_at_11.39.09_AM_21012026_1201.jpeg',
        'charges' => [
            ['instrument' => 'UPI', 'charges' => 'No Charges'],
            ['instrument' => 'Debit Card (Rupay Card)', 'charges' => 'No Charges'],
            ['instrument' => 'Debit Card (Other Cards)', 'charges' => '0.40% <= INR 2000 per transaction / 0.90% > INR 2000 per transaction'],
            ['instrument' => 'Credit Card', 'charges' => '1.1% per transaction'],
            ['instrument' => 'Netbanking', 'charges' => 'INR 15 per transaction'],
            ['instrument' => 'Wallet', 'charges' => '1.50% per transaction']
        ]
    ],
    'AdmissionRegistration' => [
        'page_title' => 'Admission Registration',
        'heading' => 'Admission Registration (Session 2026-27)',
        'epravesh_label' => 'E-Pravesh 2026 (Online Registration & Enquiry Form)',
        'epravesh_url' => 'https://www.sssutms.co.in/erp/Student/Registration/Index/ojdZaOYsXtpmswGfjiVVww%3d%3d',
        'instructions' => [
            'Click on the official E-Pravesh registration portal link above.',
            'Select your desired Course / Faculty / Department.',
            'Fill in candidate details, qualifications, and upload required credentials.',
            'Submit the form and retain the generated application number for counselling.'
        ]
    ],
    'Admission_Enquiry' => [
        'page_title' => 'Admission Enquiry',
        'contact_heading' => 'For Admission 2026-27 Enquiry Please Contact',
        'phone_numbers' => [
            '(+91) 07562-292740',
            '(+91) 07562-292720',
            '(+91) 07562-292204',
            '(+91) 07562-292205',
            '(+91) 7748900028'
        ],
        'timings' => 'From 10:00 AM to 5:00 PM only',
        'email' => 'info@sssutms.co.in',
        'address' => 'Opp. Oilfed Plant, Bhopal-Indore Road, Sehore (M.P), Pin - 466001'
    ]
];

file_put_contents('data/admission_data.json', json_encode($admissionData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
echo "Successfully generated data/admission_data.json with " . count($notices) . " notices and " . count($fees) . " fee rows!\n";
