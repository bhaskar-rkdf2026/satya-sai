<?php
$page_title = 'Admission Notice - Sri Satya Sai University of Technology & Medical Sciences';
$banner_title = 'Admission Notice';
$banner_category = 'Admission';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';

// Complete dataset of all official Admission Notices & Circulars exactly as on live SSSUTMS website
$admission_notices = [
    // Session 2026-27
    [
        'session' => '2026-27',
        'title' => 'Enrollment form Open (2026-27)',
        'hindi_title' => '',
        'category' => 'Enrollment',
        'badge' => 'Latest',
        'file' => 'assets/documents/admission_notices/Adobe_Scan_21_Jul_2026__1__21072026_0937.pdf',
        'type' => 'pdf',
        'date' => 'July 2026'
    ],
    [
        'session' => '2026-27',
        'title' => 'Admission Notification - 03 (2026-27)',
        'hindi_title' => 'प्रवेश अधिसूचना - 3 (2026-27)',
        'category' => 'Admission Notice',
        'badge' => 'New',
        'file' => 'assets/documents/admission_notices/प्रवेश_अधिसूचना_-_3_(2026-27)_08072026_0226.pdf',
        'type' => 'pdf',
        'date' => 'July 2026'
    ],
    [
        'session' => '2026-27',
        'title' => 'Admission Notification - 02 (2026-27)',
        'hindi_title' => 'प्रवेश अधिसूचना - 2 (2026-27)',
        'category' => 'Admission Notice',
        'badge' => 'New',
        'file' => 'assets/documents/admission_notices/प्रवेश_अधिसूचना_-_2_(2026-27)_08072026_0225.pdf',
        'type' => 'pdf',
        'date' => 'July 2026'
    ],
    [
        'session' => '2026-27',
        'title' => 'Important Notice (Session 2026-27)',
        'hindi_title' => 'आवश्यक सुचना (सत्र 2026-27)',
        'category' => 'Important Circular',
        'badge' => 'New',
        'file' => 'assets/documents/admission_notices/imp_notice_16032026_0424.pdf',
        'type' => 'pdf',
        'date' => 'March 2026'
    ],
    [
        'session' => '2026-27',
        'title' => 'Admission Notification 01 (2026-27)',
        'hindi_title' => 'प्रवेश अधिसूचना - 1 (2026-27)',
        'category' => 'Admission Notice',
        'badge' => 'New',
        'file' => 'assets/documents/admission_notices/WhatsApp_Image_2026-02-14_at_1.44_14022026_1125.pdf',
        'type' => 'pdf',
        'date' => 'February 2026'
    ],

    // Session 2025-26
    [
        'session' => '2025-26',
        'title' => 'SSSUTMS-CIDC Draft Admission Notice (Session 2025-26)',
        'hindi_title' => '',
        'category' => 'CIDC Collaboration',
        'badge' => '',
        'file' => 'assets/documents/admission_notices/Draft-Admission_Notice_Sri_Satya_Sai_University_12092025_0417.pdf',
        'type' => 'pdf',
        'date' => 'September 2025'
    ],
    [
        'session' => '2025-26',
        'title' => 'Notification (Registration & Enrollment 2025-26)',
        'hindi_title' => 'अधिसूचना (पंजीकरण एवं नामांकन)',
        'category' => 'Enrollment',
        'badge' => '',
        'file' => 'assets/documents/admission_notices/Notifica.pdf',
        'type' => 'pdf',
        'date' => 'August 2025'
    ],
    [
        'session' => '2025-26',
        'title' => 'Admission Notification 01 (2025-26)',
        'hindi_title' => 'प्रवेश अधिसूचना - 1 (2025-26)',
        'category' => 'Admission Notice',
        'badge' => '',
        'file' => 'assets/documents/admission_notices/Adobe_Scan_01_Aug_2025_(1)_01082025_0412.pdf',
        'type' => 'pdf',
        'date' => 'August 2025'
    ],
    [
        'session' => '2025-26',
        'title' => 'Admission Notification - 02 (2025-26)',
        'hindi_title' => 'प्रवेश अधिसूचना - 2 (2025-26)',
        'category' => 'Admission Notice',
        'badge' => '',
        'file' => 'assets/documents/admission_notices/AD2_01082025_0419.pdf',
        'type' => 'pdf',
        'date' => 'August 2025'
    ],
    [
        'session' => '2025-26',
        'title' => 'Admission Notification - 03 (2025-26)',
        'hindi_title' => 'प्रवेश अधिसूचना - 3 (2025-26)',
        'category' => 'Admission Notice',
        'badge' => '',
        'file' => 'assets/documents/admission_notices/03_01082025_0411.pdf',
        'type' => 'pdf',
        'date' => 'August 2025'
    ],
    [
        'session' => '2025-26',
        'title' => 'Admission Notification 01 (Direct Admission 2025-26)',
        'hindi_title' => 'प्रवेश अधिसूचना - 1',
        'category' => 'Admission Notice',
        'badge' => '',
        'file' => 'assets/documents/admission_notices/ADMISSION_NOTIFICATION_1_31072025_0425.pdf',
        'type' => 'pdf',
        'date' => 'July 2025'
    ],
    [
        'session' => '2025-26',
        'title' => 'Admission Notification Guidelines (2025-26)',
        'hindi_title' => 'प्रवेश अधिसूचना मार्गदर्शिका',
        'category' => 'Guidelines',
        'badge' => '',
        'file' => 'assets/documents/admission_notices/IMG.pdf',
        'type' => 'pdf',
        'date' => 'July 2025'
    ],

    // Session 2024-25
    [
        'session' => '2024-25',
        'title' => 'Admission Notification - 03 (2024-25)',
        'hindi_title' => 'प्रवेश अधिसूचना - 3 (2024-25)',
        'category' => 'Admission Notice',
        'badge' => '',
        'file' => 'assets/documents/admission_notices/TapScanner_08-21-2024-11_49.pdf',
        'type' => 'pdf',
        'date' => 'August 2024'
    ],
    [
        'session' => '2024-25',
        'title' => 'Admission Notification 01 (2024-25)',
        'hindi_title' => 'प्रवेश अधिसूचना - 1 (2024-25)',
        'category' => 'Admission Notice',
        'badge' => '',
        'file' => 'assets/documents/admission_notices/IMG_0001_31032024_1157.pdf',
        'type' => 'pdf',
        'date' => 'March 2024'
    ],
    [
        'session' => '2024-25',
        'title' => 'Admission Notification - 02 (2024-25)',
        'hindi_title' => 'प्रवेश अधिसूचना - 2 (2024-25)',
        'category' => 'Admission Notice',
        'badge' => '',
        'file' => 'assets/documents/admission_notices/IMG_0002_31032024_1151.pdf',
        'type' => 'pdf',
        'date' => 'March 2024'
    ],
    [
        'session' => '2024-25',
        'title' => 'NRI Admission Notification (2024-25)',
        'hindi_title' => 'एनआरआई प्रवेश अधिसूचना (2024-25)',
        'category' => 'NRI Quota',
        'badge' => '',
        'file' => 'assets/documents/admission_notices/INTERNATIONAL_ADMISSION_05_07122024_0637.pdf',
        'type' => 'pdf',
        'date' => 'July 2024'
    ],

    // Session 2023-24
    [
        'session' => '2023-24',
        'title' => 'Admission Notification - 02 (2023-24) [B.E / B.Pharma / D.Pharma / M.Tech / M.Pharma / MBA / MCA / BHMCT / B.Arch / B.Design / Diploma Engineering]',
        'hindi_title' => '',
        'category' => 'Technical & Professional',
        'badge' => '',
        'file' => 'assets/documents/admission_notices/Admission_Notification_2023-24_01_04112023_0304.pdf',
        'type' => 'pdf',
        'date' => 'November 2023'
    ],
    [
        'session' => '2023-24',
        'title' => 'Notification (Student Enrollment 2023-24)',
        'hindi_title' => 'अधिसूचना (नामांकन सत्र 2023-24)',
        'category' => 'Enrollment',
        'badge' => '',
        'file' => 'assets/documents/admission_notices/IMG_0001_29082023_1156.pdf',
        'type' => 'pdf',
        'date' => 'August 2023'
    ],
    [
        'session' => '2023-24',
        'title' => 'Admission Notification - 01 (2023-24)',
        'hindi_title' => 'प्रवेश अधिसूचना - 01 (2023-24)',
        'category' => 'Admission Notice',
        'badge' => '',
        'file' => 'assets/documents/admission_notices/IMG.pdf',
        'type' => 'pdf',
        'date' => 'July 2023'
    ],
    [
        'session' => '2023-24',
        'title' => 'Centralized Admission Notification (2023-24)',
        'hindi_title' => 'प्रवेश अधिसूचना (2023-24)',
        'category' => 'General Admission',
        'badge' => '',
        'file' => 'assets/documents/admission_notices/IMG_0001.pdf',
        'type' => 'pdf',
        'date' => 'July 2023'
    ],

    // Session 2022-23
    [
        'session' => '2022-23',
        'title' => 'Admission Notification - 02 (2022-23) [B.E / B.Pharma / D.Pharma / M.Tech / M.Pharma / MBA / MCA / BHMCT / B.Arch / B.Design / Diploma Engineering]',
        'hindi_title' => '',
        'category' => 'Technical & Professional',
        'badge' => '',
        'file' => 'assets/documents/admission_notices/Admission_notification.pdf',
        'type' => 'pdf',
        'date' => 'August 2022'
    ],
    [
        'session' => '2022-23',
        'title' => 'Admission Notification for NRI Candidates (2022-23)',
        'hindi_title' => '',
        'category' => 'NRI Quota',
        'badge' => '',
        'file' => 'assets/documents/admission_notices/Con_NRI_2022-23_20082022_0446.pdf',
        'type' => 'pdf',
        'date' => 'August 2022'
    ],
    [
        'session' => '2022-23',
        'title' => 'Admission Notification - I (2022-23)',
        'hindi_title' => 'प्रवेश अधिसूचना - 1 (2022-23)',
        'category' => 'Admission Notice',
        'badge' => '',
        'file' => 'assets/documents/admission_notices/admission_notification_2022-23.pdf',
        'type' => 'pdf',
        'date' => 'July 2022'
    ],
    [
        'session' => '2022-23',
        'title' => 'Notification For Online Entrance Examination 2022-23',
        'hindi_title' => 'ऑनलाइन प्रवेश परीक्षा अधिसूचना 2022-23',
        'category' => 'Entrance Exam',
        'badge' => '',
        'file' => 'assets/documents/admission_notices/Entrance_Exam_Admission_notification.pdf',
        'type' => 'pdf',
        'date' => 'June 2022'
    ],

    // Session 2021-22
    [
        'session' => '2021-22',
        'title' => 'Enrollment Form Open (2021-22)',
        'hindi_title' => '',
        'category' => 'Enrollment',
        'badge' => '',
        'file' => 'assets/documents/admission_notices/Enrollment_Notification21_22.pdf',
        'type' => 'pdf',
        'date' => 'Session 2021-22'
    ],
    [
        'session' => '2021-22',
        'title' => 'Student Login Portal (Session 2021)',
        'hindi_title' => 'छात्र लॉगिन पोर्टल',
        'category' => 'Portal Login',
        'badge' => 'Online Portal',
        'file' => '#',
        'type' => 'link',
        'date' => 'Session 2021-22'
    ],
    [
        'session' => '2021-22',
        'title' => 'Notice for Student Enrollment - Faculty of Pharmacy (2021-22)',
        'hindi_title' => '',
        'category' => 'Pharmacy',
        'badge' => '',
        'file' => 'assets/documents/admission_notices/FOP.pdf',
        'type' => 'pdf',
        'date' => 'Session 2021-22'
    ],
    [
        'session' => '2021-22',
        'title' => 'Notice for Student Enrollment (2021-22) [For B.Sc. Nursing]',
        'hindi_title' => '',
        'category' => 'Nursing',
        'badge' => '',
        'file' => 'assets/documents/admission_notices/AAA_ENROLLMENT_NUR.pdf',
        'type' => 'pdf',
        'date' => 'Session 2021-22'
    ],
    [
        'session' => '2021-22',
        'title' => 'Notice for Student Enrollment (2021-22) [For B.Ed.]',
        'hindi_title' => '',
        'category' => 'Education',
        'badge' => '',
        'file' => 'assets/documents/admission_notices/AAA_ENROLLMENT_BEd.pdf',
        'type' => 'pdf',
        'date' => 'Session 2021-22'
    ],
    [
        'session' => '2021-22',
        'title' => 'Admission Notice for Technical Courses (2021-22)',
        'hindi_title' => '',
        'category' => 'Technical',
        'badge' => '',
        'file' => 'assets/documents/admission_notices/AAdmission_Notice_technical_courses.pdf',
        'type' => 'pdf',
        'date' => 'Session 2021-22'
    ],
    [
        'session' => '2021-22',
        'title' => 'Admission Notice for NRI Candidates (2021-22)',
        'hindi_title' => '',
        'category' => 'NRI Quota',
        'badge' => '',
        'file' => 'assets/documents/admission_notices/NRI_admission.pdf',
        'type' => 'pdf',
        'date' => 'Session 2021-22'
    ],
    [
        'session' => '2021-22',
        'title' => 'Admission Counseling Schedule 2021-22 (Notification-3)',
        'hindi_title' => '',
        'category' => 'Counseling Schedule',
        'badge' => '',
        'file' => 'assets/documents/admission_notices/ad_notificaron3_05022022_1245.pdf',
        'type' => 'pdf',
        'date' => 'February 2022'
    ],
    [
        'session' => '2021-22',
        'title' => 'Admission Counseling Schedule 2021-22 (Notification-2)',
        'hindi_title' => '',
        'category' => 'Counseling Schedule',
        'badge' => '',
        'file' => 'assets/documents/admission_notices/ad_notification2_05022022_1241.pdf',
        'type' => 'pdf',
        'date' => 'February 2022'
    ],
    [
        'session' => '2021-22',
        'title' => 'Admission Counseling Schedule 2021-22 (Round-II Revised)',
        'hindi_title' => '',
        'category' => 'Counseling Schedule',
        'badge' => '',
        'file' => 'assets/documents/admission_notices/admission notification II 2021_22R.pdf',
        'type' => 'pdf',
        'date' => 'Session 2021-22'
    ],
    [
        'session' => '2021-22',
        'title' => 'Admission Counseling Schedule 2021-22 (Round-III)',
        'hindi_title' => '',
        'category' => 'Counseling Schedule',
        'badge' => '',
        'file' => 'assets/documents/admission_notices/admission notification III 2021_22.pdf',
        'type' => 'pdf',
        'date' => 'Session 2021-22'
    ],
    [
        'session' => '2021-22',
        'title' => 'Admission Counseling Schedule 2021-22 (UTD Departments)',
        'hindi_title' => '',
        'category' => 'UTD Departments',
        'badge' => '',
        'file' => 'assets/documents/admission_notices/Admission_utd_2021_22.pdf',
        'type' => 'pdf',
        'date' => 'Session 2021-22'
    ],
    [
        'session' => '2021-22',
        'title' => 'Bachelor of Design (B.Des) Admission Open 2021-22 Session',
        'hindi_title' => '',
        'category' => 'School of Design',
        'badge' => 'Brochure',
        'file' => 'assets/documents/admission_notices/SOD.jpeg',
        'type' => 'image',
        'date' => 'Session 2021-22'
    ],
    [
        'session' => '2021-22',
        'title' => 'Notification For Online Entrance Examination 2021-22',
        'hindi_title' => '',
        'category' => 'Entrance Exam',
        'badge' => '',
        'file' => 'assets/documents/admission_notices/Admission_Entrance_Exam_2021_22.pdf',
        'type' => 'pdf',
        'date' => 'Session 2021-22'
    ],

    // Session 2020-21
    [
        'session' => '2020-21',
        'title' => 'Admission Counseling Schedule 2020-21',
        'hindi_title' => '',
        'category' => 'Counseling Schedule',
        'badge' => '',
        'file' => 'assets/documents/admission_notices/Admission1.pdf',
        'type' => 'pdf',
        'date' => 'Session 2020-21'
    ],
    [
        'session' => '2020-21',
        'title' => 'Notification for Entrance Examination - 2020',
        'hindi_title' => '',
        'category' => 'Entrance Exam',
        'badge' => '',
        'file' => 'assets/documents/admission_notices/Entrance_20_21.pdf',
        'type' => 'pdf',
        'date' => 'Session 2020-21'
    ],

    // Session 2019-20
    [
        'session' => '2019-20',
        'title' => 'Paramedical Admission Counseling Schedule 2019-20',
        'hindi_title' => '',
        'category' => 'Paramedical',
        'badge' => '',
        'file' => 'assets/documents/admission_notices/paramedical_2019.pdf',
        'type' => 'pdf',
        'date' => 'Session 2019-20'
    ],

    // Session 2018-19
    [
        'session' => '2018-19',
        'title' => 'Paramedical Admission Counseling Schedule 2018-19',
        'hindi_title' => '',
        'category' => 'Paramedical',
        'badge' => '',
        'file' => 'assets/documents/admission_notices/Para_2018_19N.pdf',
        'type' => 'pdf',
        'date' => 'Session 2018-19'
    ],

    // Session 2017-18
    [
        'session' => '2017-18',
        'title' => 'Paramedical Admission Counseling Schedule 2017-18',
        'hindi_title' => '',
        'category' => 'Paramedical',
        'badge' => '',
        'file' => 'assets/documents/admission_notices/Para_2017_18.pdf',
        'type' => 'pdf',
        'date' => 'Session 2017-18'
    ],

    // Session 2016-17
    [
        'session' => '2016-17',
        'title' => 'Paramedical Admission Counseling Schedule 2016-17',
        'hindi_title' => '',
        'category' => 'Paramedical',
        'badge' => '',
        'file' => 'assets/documents/admission_notices/Para_2016_17.pdf',
        'type' => 'pdf',
        'date' => 'Session 2016-17'
    ],

    // Session 2015-16
    [
        'session' => '2015-16',
        'title' => 'Paramedical Admission Counseling Schedule 2015-16',
        'hindi_title' => '',
        'category' => 'Paramedical',
        'badge' => '',
        'file' => 'assets/documents/admission_notices/Para_2015_16.pdf',
        'type' => 'pdf',
        'date' => 'Session 2015-16'
    ],

    // Session 2014-15
    [
        'session' => '2014-15',
        'title' => 'Paramedical Admission Counseling Schedule 2014-15',
        'hindi_title' => '',
        'category' => 'Paramedical',
        'badge' => '',
        'file' => 'assets/documents/admission_notices/Para_2014_15.pdf',
        'type' => 'pdf',
        'date' => 'Session 2014-15'
    ],
];
?>

<style>
.an-section {
  background-color: #f8fafc;
  font-family: 'Inter', system-ui, -apple-system, sans-serif;
}

.an-main-wrapper {
  background: #ffffff;
  border-radius: 16px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 4px 20px rgba(11, 37, 69, 0.04);
  overflow: hidden;
  margin-bottom: 2rem;
}

.an-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2.25rem 2rem;
  position: relative;
}
.an-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}

.an-stat-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 12px 16px;
  display: flex;
  align-items: center;
  gap: 12px;
  height: 100%;
  transition: all 0.25s ease;
  box-shadow: 0 2px 8px rgba(0,0,0,0.02);
}
.an-stat-card:hover {
  border-color: #f59e0b;
  box-shadow: 0 6px 16px rgba(11,37,69,0.08);
  transform: translateY(-2px);
}
.an-stat-icon {
  width: 44px;
  height: 44px;
  border-radius: 10px;
  background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%);
  color: #d97706;
  border: 1px solid #fde68a;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.25rem;
  flex-shrink: 0;
}

.an-reg-btn {
  background: #0b2545;
  color: #ffffff !important;
  font-weight: 700;
  font-size: 0.88rem;
  padding: 10px 20px;
  border-radius: 8px;
  display: inline-flex;
  align-items: center;
  gap: 8px;
  text-decoration: none !important;
  border: 1px solid #134074;
  transition: all 0.2s ease;
}
.an-reg-btn:hover {
  background: #f59e0b;
  color: #0b2545 !important;
  border-color: #d97706;
  transform: translateY(-1px);
}

.an-filter-nav {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
  padding: 4px;
  background: #f1f5f9;
  border-radius: 10px;
  margin-bottom: 1.25rem;
}
.an-filter-btn {
  border: none;
  background: transparent;
  color: #475569;
  font-weight: 600;
  font-size: 0.82rem;
  padding: 8px 16px;
  border-radius: 8px;
  cursor: pointer;
  transition: all 0.2s ease;
}
.an-filter-btn.active, .an-filter-btn:hover {
  background: #0b2545;
  color: #ffffff;
  box-shadow: 0 2px 6px rgba(11,37,69,0.15);
}

.an-search-box {
  position: relative;
  max-width: 320px;
  width: 100%;
}
.an-search-box input {
  width: 100%;
  padding: 8px 14px 8px 36px;
  font-size: 0.88rem;
  border: 1px solid #cbd5e1;
  border-radius: 8px;
  outline: none;
  transition: all 0.2s ease;
}
.an-search-box input:focus {
  border-color: #0b2545;
  box-shadow: 0 0 0 3px rgba(11,37,69,0.1);
}
.an-search-box i {
  position: absolute;
  left: 12px;
  top: 50%;
  transform: translateY(-50%);
  color: #94a3b8;
  font-size: 0.85rem;
}

.an-table {
  width: 100%;
  border-collapse: collapse;
  border-radius: 10px;
  overflow: hidden;
  border: 1px solid #e2e8f0;
}
.an-table th {
  background: #0b2545;
  color: #ffffff;
  padding: 14px 16px;
  font-weight: 700;
  font-size: 0.88rem;
  border: 1px solid #134074;
  white-space: nowrap;
}
.an-table td {
  padding: 14px 16px;
  border: 1px solid #e2e8f0;
  color: #334155;
  font-size: 0.88rem;
  vertical-align: middle;
}
.an-table tbody tr:nth-child(even) {
  background-color: #f8fafc;
}
.an-table tbody tr:hover {
  background-color: #f1f5f9;
}

.an-download-btn {
  background: #0b2545;
  border: 1px solid #0b2545;
  color: #ffffff !important;
  font-weight: 600;
  font-size: 0.82rem;
  padding: 7px 16px;
  border-radius: 6px;
  text-decoration: none !important;
  display: inline-flex;
  align-items: center;
  gap: 6px;
  transition: all 0.2s ease;
  white-space: nowrap;
}
.an-download-btn:hover {
  background: #f59e0b;
  color: #0b2545 !important;
  border-color: #d97706;
  transform: translateY(-1px);
}

.an-badge-tag {
  background: #e2e8f0;
  color: #0b2545;
  border: 1px solid #cbd5e1;
  font-size: 0.75rem;
  font-weight: 600;
  padding: 4px 10px;
  border-radius: 6px;
  display: inline-block;
}

.an-badge-new {
  background: #0b2545;
  color: #f59e0b;
  border: 1px solid #f59e0b;
  font-size: 0.68rem;
  font-weight: 700;
  padding: 2px 7px;
  border-radius: 4px;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

.an-badge-session {
  background: #fffbeb;
  color: #b45309;
  border: 1px solid #fde68a;
  font-weight: 700;
  font-size: 0.75rem;
  padding: 3px 8px;
  border-radius: 6px;
  display: inline-block;
}

.an-card-notice {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-left: 4px solid #0b2545;
  border-radius: 10px;
  padding: 1.25rem;
  margin-bottom: 1rem;
}

.arrow-icon-indicator {
  color: #d97706;
  font-size: 0.95rem;
  flex-shrink: 0;
}
</style>

<section class="subpage-main-section an-section py-4 py-md-5">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="an-main-wrapper">

          <!-- Header Banner -->
          <div class="an-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-1.5 rounded-pill" style="background:rgba(255,255,255,0.15); border:1px solid rgba(255,255,255,0.3);">
                <i class="fa-solid fa-bullhorn me-1"></i> Official Admission Circulars &amp; Archives
              </span>
              <h1 class="fw-bold text-white mb-1 fs-3">ADMISSION NOTICES &amp; DIRECTIVES</h1>
              <p class="text-white-50 mb-0 small">Comprehensive Archive of Official Notifications, Enrollment Guidelines &amp; Counseling Circulars</p>
            </div>
            <div class="d-flex flex-wrap gap-2">
              <a href="<?php echo BASE_URL; ?>Admission/AdmissionRegistration.php" class="an-reg-btn">
                <i class="fa-solid fa-user-plus"></i> Online Registration
              </a>
              <a href="<?php echo BASE_URL; ?>Admission/Admission_Enquiry.php" class="an-reg-btn" style="background: #f59e0b; color: #0b2545 !important; border-color: #d97706;">
                <i class="fa-solid fa-headset"></i> Admission Enquiry
              </a>
            </div>
          </div>

          <!-- Content Body -->
          <div class="p-3.5 p-md-4">

            <!-- Stat Chips -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-sm-6 col-md-3">
                <div class="an-stat-card">
                  <div class="an-stat-icon"><i class="fa-solid fa-calendar-check"></i></div>
                  <div>
                    <span class="text-muted extra-small uppercase fw-bold d-block">Current Session</span>
                    <strong class="text-dark fs-6">2026 – 2027</strong>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="an-stat-card">
                  <div class="an-stat-icon"><i class="fa-solid fa-file-shield"></i></div>
                  <div>
                    <span class="text-muted extra-small uppercase fw-bold d-block">Total Notices</span>
                    <strong class="text-dark fs-6"><?php echo count($admission_notices); ?> Circulars</strong>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="an-stat-card">
                  <div class="an-stat-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                  <div>
                    <span class="text-muted extra-small uppercase fw-bold d-block">Admissions Open</span>
                    <strong class="text-dark fs-6">UG / PG / Diploma</strong>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="an-stat-card">
                  <div class="an-stat-icon"><i class="fa-solid fa-building-columns"></i></div>
                  <div>
                    <span class="text-muted extra-small uppercase fw-bold d-block">Statutory Body</span>
                    <strong class="text-dark fs-6">UGC &amp; MP PURC</strong>
                  </div>
                </div>
              </div>
            </div>

            <!-- Notice Table Controls & Filter -->
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
              <div>
                <h5 class="fw-bold text-dark mb-0">
                  <i class="fa-solid fa-list-check me-2" style="color: #0b2545;"></i>All Official Admission Notices &amp; Schedules
                </h5>
                <span class="text-muted extra-small">Exact records synchronized with University Archives</span>
              </div>
              
              <!-- Quick Search Input -->
              <div class="an-search-box">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" id="noticeSearchInput" placeholder="Search circulars, course, year...">
              </div>
            </div>

            <!-- Session Filter Pills -->
            <div class="an-filter-nav" id="sessionFilterContainer">
              <button type="button" class="an-filter-btn active" data-filter="all">All (<?php echo count($admission_notices); ?>)</button>
              <button type="button" class="an-filter-btn" data-filter="2026-27">2026-27</button>
              <button type="button" class="an-filter-btn" data-filter="2025-26">2025-26</button>
              <button type="button" class="an-filter-btn" data-filter="2024-25">2024-25</button>
              <button type="button" class="an-filter-btn" data-filter="2023-24">2023-24</button>
              <button type="button" class="an-filter-btn" data-filter="2022-23">2022-23</button>
              <button type="button" class="an-filter-btn" data-filter="2021-22">2021-22</button>
              <button type="button" class="an-filter-btn" data-filter="archive">Archive (2014-2020)</button>
            </div>

            <!-- Notifications Table -->
            <div class="table-responsive mb-4">
              <table class="an-table" id="admissionNoticesTable">
                <thead>
                  <tr>
                    <th style="width: 8%;" class="text-center">S.No</th>
                    <th style="width: 14%;">Session / Date</th>
                    <th style="width: 50%;">Notice Title &amp; Description</th>
                    <th style="width: 14%;">Category</th>
                    <th class="text-center" style="width: 14%;">Document</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($admission_notices as $index => $notice): 
                    $is_archive = in_array($notice['session'], ['2020-21', '2019-20', '2018-19', '2017-18', '2016-17', '2015-16', '2014-15']);
                    $filter_group = $is_archive ? 'archive' : $notice['session'];
                    
                    // Build local download URL or external link
                    if ($notice['type'] === 'link') {
                        $doc_url = $notice['file'];
                        $is_external = true;
                    } else {
                        $doc_url = BASE_URL . $notice['file'];
                        $is_external = false;
                    }
                  ?>
                  <tr class="notice-row" data-session="<?php echo htmlspecialchars($filter_group); ?>">
                    <td class="text-center text-muted fw-bold small"><?php echo ($index + 1); ?></td>
                    <td>
                      <span class="an-badge-session mb-1"><?php echo htmlspecialchars($notice['session']); ?></span>
                      <?php if (!empty($notice['date'])): ?>
                        <span class="d-block extra-small text-muted"><?php echo htmlspecialchars($notice['date']); ?></span>
                      <?php endif; ?>
                    </td>
                    <td>
                      <div class="d-flex align-items-start gap-2">
                        <i class="fa-solid fa-arrow-right-long arrow-icon-indicator mt-1"></i>
                        <div>
                          <div class="d-flex align-items-center flex-wrap gap-2 mb-1">
                            <strong class="text-dark"><?php echo htmlspecialchars($notice['title']); ?></strong>
                            <?php if (!empty($notice['badge'])): ?>
                              <span class="an-badge-new"><?php echo htmlspecialchars($notice['badge']); ?></span>
                            <?php endif; ?>
                          </div>
                          <?php if (!empty($notice['hindi_title'])): ?>
                            <div class="text-secondary fw-semibold small mb-0">
                              <i class="fa-solid fa-language text-muted me-1"></i><?php echo htmlspecialchars($notice['hindi_title']); ?>
                            </div>
                          <?php endif; ?>
                        </div>
                      </div>
                    </td>
                    <td>
                      <span class="an-badge-tag"><?php echo htmlspecialchars($notice['category']); ?></span>
                    </td>
                    <td class="text-center">
                      <a href="<?php echo htmlspecialchars($doc_url); ?>" <?php if ($doc_url !== '#') echo 'target="_blank" rel="noopener"'; ?> class="an-download-btn">
                        <?php if ($notice['type'] === 'image'): ?>
                          <i class="fa-solid fa-image"></i> View Image
                        <?php elseif ($notice['type'] === 'link'): ?>
                          <i class="fa-solid fa-arrow-up-right-from-square"></i> Open Portal
                        <?php else: ?>
                          <i class="fa-solid fa-file-pdf"></i> Download PDF
                        <?php endif; ?>
                      </a>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>

            <!-- Helpdesk & Guidelines Information Callouts -->
            <div class="row g-3">
              <div class="col-md-6">
                <div class="an-card-notice h-100">
                  <h6 class="fw-bold text-dark mb-2">
                    <i class="fa-solid fa-shield-halved me-2" style="color:#0b2545;"></i>Key Admission Rules &amp; Verification
                  </h6>
                  <ul class="extra-small text-muted ps-3 mb-0">
                    <li class="mb-1.5">All admissions are processed strictly as per guidelines of UGC, MP PURC &amp; Statutory Regulatory Councils (AICTE, PCI, BCI, NCTE, AYUSH).</li>
                    <li class="mb-1.5">Candidates must submit original documents for verification at the University Central Counseling Cell.</li>
                    <li class="mb-0">Enrollment forms must be submitted online within the deadline notified in official circulars.</li>
                  </ul>
                </div>
              </div>
              <div class="col-md-6">
                <div class="an-card-notice h-100" style="border-left-color: #f59e0b;">
                  <h6 class="fw-bold text-dark mb-2">
                    <i class="fa-solid fa-headset me-2" style="color:#d97706;"></i>Admission Helpdesk &amp; Verification
                  </h6>
                  <p class="extra-small text-muted mb-2">For any clarification regarding counseling rounds, document eligibility, or fee schedules, connect with the admission desk.</p>
                  <div class="d-flex flex-wrap gap-2">
                    <a href="<?php echo BASE_URL; ?>Admission/Admission_Enquiry.php" class="an-reg-btn py-1.5 px-3 extra-small">
                      <i class="fa-solid fa-paper-plane me-1"></i> Submit Online Enquiry Form
                    </a>
                    <a href="tel:+917748900028" class="an-download-btn py-1.5 px-3 extra-small" style="background:#25d366; border-color:#25d366; color:#ffffff !important;">
                      <i class="fa-brands fa-whatsapp me-1"></i> +91-7748900028
                    </a>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div><!-- end an-main-wrapper -->
      </div><!-- end col-lg-8 -->

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<!-- Filter & Search JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  const filterButtons = document.querySelectorAll('.an-filter-btn');
  const searchInput = document.getElementById('noticeSearchInput');
  const rows = document.querySelectorAll('#admissionNoticesTable .notice-row');

  function filterNotices() {
    const activeFilter = document.querySelector('.an-filter-btn.active').getAttribute('data-filter');
    const query = searchInput.value.toLowerCase().trim();

    rows.forEach(row => {
      const session = row.getAttribute('data-session');
      const text = row.textContent.toLowerCase();

      const matchesFilter = (activeFilter === 'all') || 
                            (activeFilter === 'archive' && session === 'archive') || 
                            (session === activeFilter);
      const matchesSearch = query === '' || text.includes(query);

      if (matchesFilter && matchesSearch) {
        row.style.display = '';
      } else {
        row.style.display = 'none';
      }
    });
  }

  filterButtons.forEach(btn => {
    btn.addEventListener('click', function() {
      filterButtons.forEach(b => b.classList.remove('active'));
      this.classList.add('active');
      filterNotices();
    });
  });

  searchInput.addEventListener('input', filterNotices);
});
</script>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>