<?php
require_once __DIR__ . '/../config.php';
require_admin_auth();

$dataPath = __DIR__ . '/../data/admission_data.json';
$admissionData = file_exists($dataPath) ? json_decode(file_get_contents($dataPath), true) : [];
if (!is_array($admissionData)) {
    $admissionData = [];
}

$msg = '';
$error = '';

$validTabs = [
    'AdmissionProcedure' => 'Admission Procedure',
    'AdmissionNotice' => 'Admission Notice',
    'FeesStructure' => 'Fees Structure',
    'UniversityAccountDetail' => 'University Account Detail',
    'Brochures' => 'Brochures',
    'AdmissionRegistration' => 'Admission Registration',
    'Admission_Enquiry' => 'Admission Enquiry'
];

$frontendPageMap = [
    'AdmissionProcedure' => '../Admission/AdmissionProcedure.php',
    'AdmissionNotice' => '../Admission/AdmissionNotice.php',
    'FeesStructure' => '../Admission/FeesStructure.php',
    'UniversityAccountDetail' => '../Admission/UniversityAccountDetail.php',
    'Brochures' => '../Admission/Brochures.php',
    'AdmissionRegistration' => '../Admission/AdmissionRegistration.php',
    'Admission_Enquiry' => '../Admission/Admission_Enquiry.php'
];

$tabIcons = [
    'AdmissionProcedure' => 'fa-route',
    'AdmissionNotice' => 'fa-bullhorn',
    'FeesStructure' => 'fa-receipt',
    'UniversityAccountDetail' => 'fa-building-columns',
    'Brochures' => 'fa-book-open-reader',
    'AdmissionRegistration' => 'fa-user-pen',
    'Admission_Enquiry' => 'fa-headset'
];

$tab = clean_input($_GET['tab'] ?? 'AdmissionProcedure');
if (!array_key_exists($tab, $validTabs)) {
    $tab = 'AdmissionProcedure';
}
$activeFrontend = $frontendPageMap[$tab] ?? '../Admission/AdmissionProcedure.php';

// Handle POST actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = clean_input($_POST['action'] ?? '');
    
    // 1. AdmissionProcedure Save
    if ($action === 'save_procedure') {
        $admissionData['AdmissionProcedure']['page_title'] = clean_input($_POST['page_title'] ?? 'Admission Procedure');
        $admissionData['AdmissionProcedure']['lead_title'] = clean_input($_POST['lead_title'] ?? 'Admission Procedure');
        $admissionData['AdmissionProcedure']['description'] = clean_input($_POST['description'] ?? '');
        $admissionData['AdmissionProcedure']['pdf_label'] = clean_input($_POST['pdf_label'] ?? 'Admission Procedure (Click Here)');
        
        // PDF link
        if (!empty($_POST['pdf_link'])) {
            $admissionData['AdmissionProcedure']['pdf_link'] = clean_input($_POST['pdf_link']);
        }
        if (isset($_FILES['pdf_file']) && $_FILES['pdf_file']['error'] === UPLOAD_ERR_OK) {
            $up = upload_file($_FILES['pdf_file'], 'assets/pdf/admission/', ['pdf']);
            if ($up['success']) {
                $admissionData['AdmissionProcedure']['pdf_link'] = $up['path'];
            }
        }
        
        // Image
        if (!empty($_POST['image_url'])) {
            $admissionData['AdmissionProcedure']['image'] = clean_input($_POST['image_url']);
        }
        if (isset($_FILES['image_file']) && $_FILES['image_file']['error'] === UPLOAD_ERR_OK) {
            $up = upload_file($_FILES['image_file'], 'assets/images/admission/', ['jpg', 'jpeg', 'png', 'webp']);
            if ($up['success']) {
                $admissionData['AdmissionProcedure']['image'] = $up['path'];
            }
        }
        
        file_put_contents($dataPath, json_encode($admissionData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        $msg = 'Admission Procedure details updated successfully!';
    }
    
    // 2. AdmissionNotice Actions
    elseif ($action === 'add_notice') {
        $title = clean_input($_POST['title'] ?? '');
        $url = clean_input($_POST['url'] ?? '');
        $date = clean_input($_POST['date'] ?? date('Y-m-d'));
        $is_new = isset($_POST['is_new']) ? true : false;
        
        if (isset($_FILES['notice_file']) && $_FILES['notice_file']['error'] === UPLOAD_ERR_OK) {
            $up = upload_file($_FILES['notice_file'], 'assets/pdf/admission/', ['pdf', 'doc', 'docx']);
            if ($up['success']) {
                $url = $up['path'];
            }
        }
        
        if (!empty($title) && !empty($url)) {
            $newId = time();
            $admissionData['AdmissionNotice']['notices'][] = [
                'id' => $newId,
                'title' => $title,
                'url' => $url,
                'date' => $date,
                'is_new' => $is_new,
                'category' => 'Admission'
            ];
            file_put_contents($dataPath, json_encode($admissionData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            $msg = 'Admission Notice added successfully!';
        } else {
            $error = 'Notice Title and PDF URL/File are required!';
        }
    }
    
    elseif ($action === 'edit_notice') {
        $id = (int)$_POST['id'];
        $title = clean_input($_POST['title'] ?? '');
        $url = clean_input($_POST['url'] ?? '');
        $date = clean_input($_POST['date'] ?? date('Y-m-d'));
        $is_new = isset($_POST['is_new']) ? true : false;
        
        if (isset($_FILES['notice_file']) && $_FILES['notice_file']['error'] === UPLOAD_ERR_OK) {
            $up = upload_file($_FILES['notice_file'], 'assets/pdf/admission/', ['pdf', 'doc', 'docx']);
            if ($up['success']) {
                $url = $up['path'];
            }
        }
        
        if (isset($admissionData['AdmissionNotice']['notices'])) {
            foreach ($admissionData['AdmissionNotice']['notices'] as &$nt) {
                if ($nt['id'] == $id) {
                    $nt['title'] = $title;
                    if (!empty($url)) $nt['url'] = $url;
                    $nt['date'] = $date;
                    $nt['is_new'] = $is_new;
                    break;
                }
            }
            file_put_contents($dataPath, json_encode($admissionData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            $msg = 'Admission Notice updated successfully!';
        }
    }
    
    elseif ($action === 'delete_notice') {
        $id = (int)$_POST['id'];
        if (isset($admissionData['AdmissionNotice']['notices'])) {
            $admissionData['AdmissionNotice']['notices'] = array_values(array_filter($admissionData['AdmissionNotice']['notices'], function($n) use ($id) {
                return $n['id'] != $id;
            }));
            file_put_contents($dataPath, json_encode($admissionData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            $msg = 'Admission Notice removed successfully!';
        }
    }
    
    // 3. FeesStructure Actions
    elseif ($action === 'save_fee_policy') {
        $admissionData['FeesStructure']['page_title'] = clean_input($_POST['page_title'] ?? 'Fee Structure and Fees Refund Policy');
        $admissionData['FeesStructure']['subtitle'] = clean_input($_POST['subtitle'] ?? 'Eligibility Criteria & Fees Structure');
        $admissionData['FeesStructure']['refund_policy_label'] = clean_input($_POST['refund_policy_label'] ?? 'Download Official Fees Refund Policy (PDF)');
        
        if (!empty($_POST['refund_policy_pdf'])) {
            $admissionData['FeesStructure']['refund_policy_pdf'] = clean_input($_POST['refund_policy_pdf']);
        }
        if (isset($_FILES['refund_policy_file']) && $_FILES['refund_policy_file']['error'] === UPLOAD_ERR_OK) {
            $up = upload_file($_FILES['refund_policy_file'], 'assets/pdf/admission/', ['pdf']);
            if ($up['success']) {
                $admissionData['FeesStructure']['refund_policy_pdf'] = $up['path'];
            }
        }
        
        file_put_contents($dataPath, json_encode($admissionData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        $msg = 'Fee Policy details updated successfully!';
    }
    
    elseif ($action === 'add_fee_row') {
        $course = clean_input($_POST['course'] ?? '');
        $tuition = clean_input($_POST['tuition'] ?? '');
        $eligibility = clean_input($_POST['eligibility'] ?? '');
        $duration = clean_input($_POST['duration'] ?? '');
        
        if (!empty($course) && !empty($tuition)) {
            $sno = count($admissionData['FeesStructure']['fees'] ?? []) + 1;
            $admissionData['FeesStructure']['fees'][] = [
                'id' => time(),
                'sno' => $sno,
                'course' => $course,
                'tuition' => $tuition,
                'eligibility' => $eligibility,
                'duration' => $duration
            ];
            file_put_contents($dataPath, json_encode($admissionData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            $msg = 'Course Fee row added successfully!';
        } else {
            $error = 'Course Name and Tuition Fee are required!';
        }
    }
    
    elseif ($action === 'edit_fee_row') {
        $id = (int)$_POST['id'];
        $course = clean_input($_POST['course'] ?? '');
        $tuition = clean_input($_POST['tuition'] ?? '');
        $eligibility = clean_input($_POST['eligibility'] ?? '');
        $duration = clean_input($_POST['duration'] ?? '');
        
        if (isset($admissionData['FeesStructure']['fees'])) {
            foreach ($admissionData['FeesStructure']['fees'] as &$f) {
                if ($f['id'] == $id) {
                    $f['course'] = $course;
                    $f['tuition'] = $tuition;
                    $f['eligibility'] = $eligibility;
                    $f['duration'] = $duration;
                    break;
                }
            }
            file_put_contents($dataPath, json_encode($admissionData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            $msg = 'Course Fee row updated successfully!';
        }
    }
    
    elseif ($action === 'delete_fee_row') {
        $id = (int)$_POST['id'];
        if (isset($admissionData['FeesStructure']['fees'])) {
            $admissionData['FeesStructure']['fees'] = array_values(array_filter($admissionData['FeesStructure']['fees'], function($f) use ($id) {
                return $f['id'] != $id;
            }));
            // re-index sno
            foreach ($admissionData['FeesStructure']['fees'] as $k => &$f) {
                $f['sno'] = $k + 1;
            }
            file_put_contents($dataPath, json_encode($admissionData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            $msg = 'Course Fee row deleted successfully!';
        }
    }
    
    // 4. UniversityAccountDetail Actions
    elseif ($action === 'save_account_detail') {
        $admissionData['UniversityAccountDetail']['page_title'] = clean_input($_POST['page_title'] ?? 'University Account Detail');
        $admissionData['UniversityAccountDetail']['bank_title'] = clean_input($_POST['bank_title'] ?? 'Bank Detail');
        $admissionData['UniversityAccountDetail']['bank_desc'] = clean_input($_POST['bank_desc'] ?? '');
        $admissionData['UniversityAccountDetail']['bank_name'] = clean_input($_POST['bank_name'] ?? 'Punjab National Bank');
        $admissionData['UniversityAccountDetail']['account_name'] = clean_input($_POST['account_name'] ?? 'SSSUTMS');
        $admissionData['UniversityAccountDetail']['account_number'] = clean_input($_POST['account_number'] ?? '7162002100000506');
        $admissionData['UniversityAccountDetail']['ifsc_code'] = clean_input($_POST['ifsc_code'] ?? 'PUNB0716200');
        $admissionData['UniversityAccountDetail']['branch'] = clean_input($_POST['branch'] ?? 'SSSUTMS Campus, Sehore (M.P.)');
        $admissionData['UniversityAccountDetail']['online_banking_url'] = clean_input($_POST['online_banking_url'] ?? 'https://sssutms.payjix.com/');
        
        if (!empty($_POST['qr_image_url'])) {
            $admissionData['UniversityAccountDetail']['qr_image'] = clean_input($_POST['qr_image_url']);
        }
        if (isset($_FILES['qr_image_file']) && $_FILES['qr_image_file']['error'] === UPLOAD_ERR_OK) {
            $up = upload_file($_FILES['qr_image_file'], 'assets/images/admission/', ['jpg', 'jpeg', 'png', 'webp']);
            if ($up['success']) {
                $admissionData['UniversityAccountDetail']['qr_image'] = $up['path'];
            }
        }
        
        file_put_contents($dataPath, json_encode($admissionData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        $msg = 'University Account Details updated successfully!';
    }
    
    // 5. Brochures Save
    elseif ($action === 'save_brochures') {
        $admissionData['Brochures']['page_title'] = clean_input($_POST['page_title'] ?? 'Brochures');
        $admissionData['Brochures']['heading'] = clean_input($_POST['heading'] ?? 'ADMISSION BROCHURE');
        $admissionData['Brochures']['prospectus_label'] = clean_input($_POST['prospectus_label'] ?? 'Prospectus (Click Here)');
        
        if (!empty($_POST['prospectus_pdf'])) {
            $admissionData['Brochures']['prospectus_pdf'] = clean_input($_POST['prospectus_pdf']);
        }
        if (isset($_FILES['prospectus_file']) && $_FILES['prospectus_file']['error'] === UPLOAD_ERR_OK) {
            $up = upload_file($_FILES['prospectus_file'], 'assets/pdf/admission/', ['pdf']);
            if ($up['success']) {
                $admissionData['Brochures']['prospectus_pdf'] = $up['path'];
            }
        }
        
        if (!empty($_POST['cover_image_url'])) {
            $admissionData['Brochures']['cover_image'] = clean_input($_POST['cover_image_url']);
        }
        if (isset($_FILES['cover_image_file']) && $_FILES['cover_image_file']['error'] === UPLOAD_ERR_OK) {
            $up = upload_file($_FILES['cover_image_file'], 'assets/images/admission/', ['jpg', 'jpeg', 'png', 'webp']);
            if ($up['success']) {
                $admissionData['Brochures']['cover_image'] = $up['path'];
            }
        }
        
        file_put_contents($dataPath, json_encode($admissionData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        $msg = 'Brochures & Prospectus updated successfully!';
    }
    
    // 6. AdmissionRegistration Save
    elseif ($action === 'save_registration') {
        $admissionData['AdmissionRegistration']['page_title'] = clean_input($_POST['page_title'] ?? 'Admission Registration');
        $admissionData['AdmissionRegistration']['heading'] = clean_input($_POST['heading'] ?? 'Admission Registration (Session 2026-27)');
        $admissionData['AdmissionRegistration']['epravesh_label'] = clean_input($_POST['epravesh_label'] ?? 'E-Pravesh 2026 (Online Registration & Enquiry Form)');
        $admissionData['AdmissionRegistration']['epravesh_url'] = clean_input($_POST['epravesh_url'] ?? '');
        
        // Instructions
        $instText = clean_input($_POST['instructions_raw'] ?? '');
        $lines = array_filter(array_map('trim', explode("\n", $instText)));
        $admissionData['AdmissionRegistration']['instructions'] = array_values($lines);
        
        file_put_contents($dataPath, json_encode($admissionData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        $msg = 'Admission Registration details updated successfully!';
    }
    
    // 7. Admission_Enquiry Save
    elseif ($action === 'save_enquiry') {
        $admissionData['Admission_Enquiry']['page_title'] = clean_input($_POST['page_title'] ?? 'Admission Enquiry');
        $admissionData['Admission_Enquiry']['contact_heading'] = clean_input($_POST['contact_heading'] ?? 'For Admission 2026-27 Enquiry Please Contact');
        $admissionData['Admission_Enquiry']['timings'] = clean_input($_POST['timings'] ?? 'From 10:00 AM to 5:00 PM only');
        $admissionData['Admission_Enquiry']['email'] = clean_input($_POST['email'] ?? 'info@sssutms.co.in');
        $admissionData['Admission_Enquiry']['address'] = clean_input($_POST['address'] ?? 'Opp. Oilfed Plant, Bhopal-Indore Road, Sehore (M.P), Pin - 466001');
        
        $phonesText = clean_input($_POST['phones_raw'] ?? '');
        $phones = array_filter(array_map('trim', explode("\n", $phonesText)));
        $admissionData['Admission_Enquiry']['phone_numbers'] = array_values($phones);
        
        file_put_contents($dataPath, json_encode($admissionData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        $msg = 'Admission Enquiry details updated successfully!';
    }
}

// Current tab data
$currData = $admissionData[$tab] ?? [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admission Cell Management (7 Pages) - SSSUTMS Admin</title>
  <link rel="icon" type="image/jpeg" href="../assets/images/logo/logo.jpg">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/admin.css">
  <style>
    .admission-tab-nav {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
      margin-bottom: 24px;
      border-bottom: 1px solid #e2e8f0;
      padding-bottom: 16px;
    }
    .admission-tab-link {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 10px 18px;
      border-radius: 12px;
      font-size: 0.88rem;
      font-weight: 600;
      color: #334155;
      background: #ffffff;
      text-decoration: none;
      transition: all 0.2s ease;
      border: 1px solid #e2e8f0;
      box-shadow: 0 1px 3px rgba(0,0,0,0.02);
    }
    .admission-tab-link:hover {
      background: #f8fafc;
      border-color: #cbd5e1;
      color: #0b2545;
      transform: translateY(-2px);
    }
    .admission-tab-link.active {
      background: linear-gradient(135deg, #0b2545 0%, #1e4d8c 100%);
      color: #ffffff;
      border-color: #0b2545;
      box-shadow: 0 4px 12px rgba(11, 37, 69, 0.2);
    }
    .admission-card {
      border: 1px solid #e2e8f0;
      border-radius: 14px;
      background: #ffffff;
      box-shadow: 0 4px 16px rgba(0,0,0,0.03);
      overflow: hidden;
      margin-bottom: 24px;
    }
    .admission-card-header {
      background: #f8fafc;
      border-bottom: 1px solid #e2e8f0;
      padding: 16px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .badge-live {
      background: #22c55e;
      color: white;
      font-size: 0.72rem;
      padding: 4px 8px;
      border-radius: 6px;
      text-transform: uppercase;
      font-weight: 700;
    }
  </style>
</head>
<body>

<!-- Admin Sidebar -->
<aside class="admin-sidebar">
  <div class="sidebar-brand">
    <div class="d-flex align-items-center gap-2">
      <img src="../assets/images/logo/logo.jpg" alt="Logo" width="38" height="38" class="rounded-circle border">
      <div>
        <h6 class="text-white fw-bold mb-0">SSSUTMS Admin</h6>
        <small class="text-warning">Management Portal</small>
      </div>
    </div>
    <button class="sidebar-close-btn d-lg-none" type="button" aria-label="Close Navigation">
      <i class="fa fa-xmark"></i>
    </button>
  </div>

  <ul class="admin-nav">
    <li><a href="index.php" class="nav-link"><i class="fa fa-gauge"></i> Dashboard</a></li>
    <li><a href="home.php" class="nav-link"><i class="fa fa-house-chimney-window"></i> Home Page Editor</a></li>
    <li><a href="admission.php" class="nav-link active"><i class="fa fa-user-graduate"></i> Admission Cell (7)</a></li>
    <li><a href="examination.php" class="nav-link"><i class="fa fa-graduation-cap"></i> Examination Cell (5)</a></li>
    <li><a href="research.php" class="nav-link"><i class="fa fa-flask"></i> Research Cell (12)</a></li>
    <li><a href="about.php" class="nav-link"><i class="fa fa-circle-info"></i> About Pages (42)</a></li>
    <li><a href="faculties.php" class="nav-link"><i class="fa fa-chalkboard-user"></i> Faculties &amp; Depts (14)</a></li>
    <li><a href="documents.php" class="nav-link"><i class="fa fa-stamp"></i> Approvals &amp; NAAC Docs</a></li>
    <li><a href="events.php" class="nav-link"><i class="fa fa-calendar-days"></i> Events &amp; Workshops</a></li>
    <li><a href="schemes.php" class="nav-link"><i class="fa fa-book-open"></i> Curriculum Schemes</a></li>
    <li><a href="pages.php" class="nav-link"><i class="fa fa-file-lines"></i> Dynamic CMS Pages</a></li>
    <li><a href="applications.php" class="nav-link"><i class="fa fa-user-graduate"></i> Student Registrations</a></li>
    <li><a href="inquiries.php" class="nav-link"><i class="fa fa-envelope-open-text"></i> Admission Leads</a></li>
    <li><a href="settings.php" class="nav-link"><i class="fa fa-sliders"></i> Portal Settings</a></li>
    <li class="mt-4 pt-3 border-top border-white border-opacity-10">
      <a href="../index.php" target="_blank" class="nav-link text-white-50"><i class="fa fa-arrow-up-right-from-square"></i> Visit Public Site</a>
    </li>
    <li><a href="logout.php" class="nav-link text-danger"><i class="fa fa-right-from-bracket"></i> Sign Out</a></li>
  </ul>
</aside>

<!-- Main Admin Content Area -->
<main class="admin-main">
  <header class="admin-topbar">
    <div class="d-flex align-items-center gap-3">
      <button class="admin-sidebar-toggle d-lg-none" type="button" aria-label="Toggle Navigation">
        <i class="fa fa-bars"></i>
      </button>
      <div>
        <h5 class="fw-bold text-dark mb-0">Admission Cell Management (All 7 Pages)</h5>
        <small class="text-muted d-none d-md-inline">Manage all 7 live Admission pages dynamically with zero dummy content</small>
      </div>
    </div>
    <div class="d-flex gap-2">
      <a href="<?php echo htmlspecialchars($activeFrontend); ?>" target="_blank" class="btn btn-outline-secondary rounded-pill px-3">
        <i class="fa fa-arrow-up-right-from-square me-1"></i> View Live Page
      </a>
    </div>
  </header>

    <div class="container-fluid p-4">
      <?php if (!empty($msg)): ?>
        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-2" role="alert">
          <i class="fa fa-circle-check fs-5"></i>
          <div><?php echo htmlspecialchars($msg); ?></div>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>
      <?php if (!empty($error)): ?>
        <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center gap-2" role="alert">
          <i class="fa fa-circle-exclamation fs-5"></i>
          <div><?php echo htmlspecialchars($error); ?></div>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>

      <!-- Tabs Navigation -->
      <nav class="admission-tab-nav" aria-label="Admission Tabs">
        <?php foreach ($validTabs as $tabKey => $tabLabel): ?>
          <a href="admission.php?tab=<?php echo $tabKey; ?>" 
             class="admission-tab-link <?php echo $tab === $tabKey ? 'active' : ''; ?>">
            <i class="fa-solid <?php echo $tabIcons[$tabKey] ?? 'fa-file'; ?>"></i>
            <?php echo htmlspecialchars($tabLabel); ?>
            <?php if ($tabKey === 'AdmissionNotice'): ?>
              <span class="badge bg-primary ms-1"><?php echo count($admissionData['AdmissionNotice']['notices'] ?? []); ?></span>
            <?php elseif ($tabKey === 'FeesStructure'): ?>
              <span class="badge bg-secondary ms-1"><?php echo count($admissionData['FeesStructure']['fees'] ?? []); ?></span>
            <?php endif; ?>
          </a>
        <?php endforeach; ?>
      </nav>

      <!-- ========================================== -->
      <!-- TAB 1: Admission Procedure -->
      <!-- ========================================== -->
      <?php if ($tab === 'AdmissionProcedure'): ?>
        <?php $pData = $admissionData['AdmissionProcedure'] ?? []; ?>
        <div class="admission-card">
          <div class="admission-card-header">
            <div>
              <h5 class="fw-bold mb-0 text-dark"><i class="fa-solid fa-route text-primary me-2"></i>Admission Procedure Page Editor</h5>
              <span class="text-muted small">Matches live <code>sssutms.co.in/cms/Website/Admission/AdmissionProcedure</code></span>
            </div>
            <span class="badge-live"><i class="fa-solid fa-check me-1"></i> Live Matched</span>
          </div>
          <div class="p-4">
            <form method="POST" enctype="multipart/form-data">
              <input type="hidden" name="action" value="save_procedure">
              <div class="row g-3">
                <div class="col-md-6">
                  <label class="form-label fw-bold">Page Header Title</label>
                  <input type="text" name="page_title" class="form-control" value="<?php echo htmlspecialchars($pData['page_title'] ?? 'Admission Procedure'); ?>" required>
                </div>
                <div class="col-md-6">
                  <label class="form-label fw-bold">Article Main Heading</label>
                  <input type="text" name="lead_title" class="form-control" value="<?php echo htmlspecialchars($pData['lead_title'] ?? 'Admission Procedure'); ?>" required>
                </div>
                <div class="col-12">
                  <label class="form-label fw-bold">Official Statutory Paragraph (M.P. Regulatory Authority &amp; Niji Vishwavidyalaya Niyamak Aayog Approval)</label>
                  <textarea name="description" class="form-control" rows="4" required><?php echo htmlspecialchars($pData['description'] ?? ''); ?></textarea>
                </div>
                <div class="col-md-6">
                  <label class="form-label fw-bold">Official Procedure PDF Button Label</label>
                  <input type="text" name="pdf_label" class="form-control" value="<?php echo htmlspecialchars($pData['pdf_label'] ?? 'Admission Procedure(Click Here)'); ?>" required>
                </div>
                <div class="col-md-6">
                  <label class="form-label fw-bold">PDF Link / URL</label>
                  <input type="text" name="pdf_link" class="form-control" value="<?php echo htmlspecialchars($pData['pdf_link'] ?? ''); ?>" placeholder="https://... or upload below">
                  <div class="mt-2">
                    <label class="small text-muted">Or upload new PDF:</label>
                    <input type="file" name="pdf_file" class="form-control form-control-sm" accept=".pdf">
                  </div>
                </div>
                <div class="col-12">
                  <label class="form-label fw-bold">Admission Flowchart / Banner Image (Adm_Adv.jpg)</label>
                  <input type="text" name="image_url" class="form-control" value="<?php echo htmlspecialchars($pData['image'] ?? ''); ?>">
                  <div class="mt-2">
                    <label class="small text-muted">Or upload replacement image:</label>
                    <input type="file" name="image_file" class="form-control form-control-sm" accept="image/*">
                  </div>
                  <?php if (!empty($pData['image'])): ?>
                    <div class="mt-3 border p-2 rounded bg-light">
                      <div class="small fw-bold text-muted mb-1">Current Banner Image Preview:</div>
                      <img src="../<?php echo htmlspecialchars($pData['image']); ?>" alt="Banner Preview" style="max-height: 250px; max-width: 100%; border-radius: 8px;">
                    </div>
                  <?php endif; ?>
                </div>
                <div class="col-12 text-end mt-4">
                  <button type="submit" class="btn btn-primary px-4 py-2 fw-bold">
                    <i class="fa-solid fa-floppy-disk me-1"></i> Save Admission Procedure Changes
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>

      <!-- ========================================== -->
      <!-- TAB 2: Admission Notice -->
      <!-- ========================================== -->
      <?php elseif ($tab === 'AdmissionNotice'): ?>
        <?php $notices = $admissionData['AdmissionNotice']['notices'] ?? []; ?>
        <div class="d-flex justify-content-between align-items-center mb-3">
          <div>
            <h5 class="fw-bold mb-0 text-dark">Admission Notices &amp; Circulars (<?php echo count($notices); ?> Total)</h5>
            <span class="text-muted small">All 45 official session notices, entrance exam circulars, and counselling schedules from live site</span>
          </div>
          <button class="btn btn-primary btn-sm rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#addNoticeModal">
            <i class="fa fa-plus me-1"></i> Add New Notice
          </button>
        </div>

        <div class="admission-card">
          <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
              <thead class="table-light">
                <tr>
                  <th style="width: 60px;">#</th>
                  <th>Notification Title</th>
                  <th style="width: 140px;">Date</th>
                  <th style="width: 100px;">Status</th>
                  <th style="width: 180px;">Download</th>
                  <th style="width: 120px;" class="text-end">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($notices as $idx => $n): ?>
                  <tr>
                    <td><?php echo $idx + 1; ?></td>
                    <td>
                      <span class="fw-bold text-dark d-block"><?php echo htmlspecialchars($n['title']); ?></span>
                      <span class="text-muted extra-small"><?php echo htmlspecialchars($n['category'] ?? 'Admission'); ?></span>
                    </td>
                    <td><span class="badge bg-light text-dark border"><?php echo htmlspecialchars($n['date']); ?></span></td>
                    <td>
                      <?php if (!empty($n['is_new'])): ?>
                        <span class="badge bg-danger">NEW</span>
                      <?php else: ?>
                        <span class="badge bg-secondary">Archived</span>
                      <?php endif; ?>
                    </td>
                    <td>
                      <a href="<?php echo htmlspecialchars($n['url']); ?>" target="_blank" class="btn btn-outline-danger btn-sm">
                        <i class="fa-solid fa-file-pdf me-1"></i> View PDF
                      </a>
                    </td>
                    <td class="text-end">
                      <button class="btn btn-sm btn-light border me-1" 
                              data-bs-toggle="modal" 
                              data-bs-target="#editNoticeModal<?php echo $n['id']; ?>">
                        <i class="fa fa-pen-to-square text-primary"></i>
                      </button>
                      <form method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this notice?');">
                        <input type="hidden" name="action" value="delete_notice">
                        <input type="hidden" name="id" value="<?php echo $n['id']; ?>">
                        <button type="submit" class="btn btn-sm btn-light border text-danger">
                          <i class="fa fa-trash"></i>
                        </button>
                      </form>
                    </td>
                  </tr>

                  <!-- Edit Modal -->
                  <div class="modal fade" id="editNoticeModal<?php echo $n['id']; ?>" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <form method="POST" enctype="multipart/form-data">
                          <input type="hidden" name="action" value="edit_notice">
                          <input type="hidden" name="id" value="<?php echo $n['id']; ?>">
                          <div class="modal-header">
                            <h5 class="modal-title fw-bold">Edit Notice</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                          </div>
                          <div class="modal-body">
                            <div class="mb-3">
                              <label class="form-label fw-bold">Notice Title</label>
                              <input type="text" name="title" class="form-control" value="<?php echo htmlspecialchars($n['title']); ?>" required>
                            </div>
                            <div class="mb-3">
                              <label class="form-label fw-bold">PDF URL</label>
                              <input type="text" name="url" class="form-control" value="<?php echo htmlspecialchars($n['url']); ?>">
                            </div>
                            <div class="mb-3">
                              <label class="form-label fw-bold">Or Upload New PDF</label>
                              <input type="file" name="notice_file" class="form-control form-control-sm" accept=".pdf">
                            </div>
                            <div class="row g-2 mb-3">
                              <div class="col-6">
                                <label class="form-label fw-bold">Notice Date</label>
                                <input type="date" name="date" class="form-control" value="<?php echo htmlspecialchars($n['date']); ?>">
                              </div>
                              <div class="col-6 d-flex align-items-center pt-4">
                                <div class="form-check">
                                  <input type="checkbox" name="is_new" value="1" class="form-check-input" id="isNew<?php echo $n['id']; ?>" <?php echo !empty($n['is_new']) ? 'checked' : ''; ?>>
                                  <label class="form-check-label fw-bold" for="isNew<?php echo $n['id']; ?>">Highlight as New</label>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary btn-sm fw-bold">Save Changes</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Add Notice Modal -->
        <div class="modal fade" id="addNoticeModal" tabindex="-1">
          <div class="modal-dialog">
            <div class="modal-content">
              <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="action" value="add_notice">
                <div class="modal-header">
                  <h5 class="modal-title fw-bold">Add New Admission Notice</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                  <div class="mb-3">
                    <label class="form-label fw-bold">Notice Title</label>
                    <input type="text" name="title" class="form-control" placeholder="e.g. Admission Notification 2026-27" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label fw-bold">PDF URL</label>
                    <input type="text" name="url" class="form-control" placeholder="https://... or upload below">
                  </div>
                  <div class="mb-3">
                    <label class="form-label fw-bold">Or Upload PDF File</label>
                    <input type="file" name="notice_file" class="form-control" accept=".pdf">
                  </div>
                  <div class="row g-2 mb-3">
                    <div class="col-6">
                      <label class="form-label fw-bold">Date</label>
                      <input type="date" name="date" class="form-control" value="<?php echo date('Y-m-d'); ?>">
                    </div>
                    <div class="col-6 d-flex align-items-center pt-4">
                      <div class="form-check">
                        <input type="checkbox" name="is_new" value="1" class="form-check-input" id="addNewNotice" checked>
                        <label class="form-check-label fw-bold" for="addNewNotice">Mark as NEW</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary btn-sm fw-bold">Add Notice</button>
                </div>
              </form>
            </div>
          </div>
        </div>

      <!-- ========================================== -->
      <!-- TAB 3: Fees Structure -->
      <!-- ========================================== -->
      <?php elseif ($tab === 'FeesStructure'): ?>
        <?php 
        $fData = $admissionData['FeesStructure'] ?? []; 
        $courses = $fData['fees'] ?? [];
        ?>
        <!-- Fee Policy Banner Box -->
        <div class="admission-card mb-4">
          <div class="admission-card-header">
            <h5 class="fw-bold mb-0 text-dark"><i class="fa-solid fa-file-pdf text-danger me-2"></i>Official Fees Refund Policy &amp; Header Settings</h5>
            <span class="badge-live"><i class="fa-solid fa-check me-1"></i> Live Regulatory Policy</span>
          </div>
          <div class="p-4">
            <form method="POST" enctype="multipart/form-data">
              <input type="hidden" name="action" value="save_fee_policy">
              <div class="row g-3">
                <div class="col-md-6">
                  <label class="form-label fw-bold">Page Header Title</label>
                  <input type="text" name="page_title" class="form-control" value="<?php echo htmlspecialchars($fData['page_title'] ?? 'Fee Structure and Fees Refund Policy'); ?>" required>
                </div>
                <div class="col-md-6">
                  <label class="form-label fw-bold">Table Subheading</label>
                  <input type="text" name="subtitle" class="form-control" value="<?php echo htmlspecialchars($fData['subtitle'] ?? 'Eligibility Criteria & Fees Structure'); ?>" required>
                </div>
                <div class="col-md-6">
                  <label class="form-label fw-bold">Fees Refund Policy Download Label</label>
                  <input type="text" name="refund_policy_label" class="form-control" value="<?php echo htmlspecialchars($fData['refund_policy_label'] ?? 'Download Official Fees Refund Policy (PDF)'); ?>" required>
                </div>
                <div class="col-md-6">
                  <label class="form-label fw-bold">Fees Refund Policy PDF Link</label>
                  <input type="text" name="refund_policy_pdf" class="form-control" value="<?php echo htmlspecialchars($fData['refund_policy_pdf'] ?? ''); ?>" placeholder="https://...">
                  <div class="mt-2">
                    <label class="small text-muted">Or upload new Refund Policy PDF:</label>
                    <input type="file" name="refund_policy_file" class="form-control form-control-sm" accept=".pdf">
                  </div>
                </div>
                <div class="col-12 text-end">
                  <button type="submit" class="btn btn-primary btn-sm fw-bold px-4">
                    <i class="fa fa-floppy-disk me-1"></i> Save Fee Policy Details
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>

        <!-- 42 Courses Fee Table -->
        <div class="d-flex justify-content-between align-items-center mb-3">
          <div>
            <h5 class="fw-bold mb-0 text-dark">Approved Courses &amp; Annual Tuition Fees (<?php echo count($courses); ?> Courses)</h5>
            <span class="text-muted small">Approved by Madhya Pradesh Niji Vishwavidyalaya Niyamak Aayog</span>
          </div>
          <button class="btn btn-primary btn-sm rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#addFeeModal">
            <i class="fa fa-plus me-1"></i> Add New Course Fee
          </button>
        </div>

        <div class="admission-card">
          <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
              <thead class="table-light">
                <tr>
                  <th style="width: 50px;">S.No</th>
                  <th style="width: 220px;">Course Name</th>
                  <th style="width: 150px;">Tuition Fee (Per Annum)</th>
                  <th>Eligibility Criteria</th>
                  <th style="width: 120px;">Duration</th>
                  <th style="width: 110px;" class="text-end">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($courses as $c): ?>
                  <tr>
                    <td class="fw-bold"><?php echo $c['sno']; ?></td>
                    <td class="fw-bold text-dark"><?php echo htmlspecialchars($c['course']); ?></td>
                    <td>
                      <span class="badge bg-success-subtle text-success fs-6 fw-bold px-2 py-1">
                        ₹<?php echo htmlspecialchars($c['tuition']); ?>
                      </span>
                    </td>
                    <td><small class="text-muted"><?php echo htmlspecialchars($c['eligibility']); ?></small></td>
                    <td><span class="badge bg-light text-dark border"><?php echo htmlspecialchars($c['duration']); ?></span></td>
                    <td class="text-end">
                      <button class="btn btn-sm btn-light border me-1" 
                              data-bs-toggle="modal" 
                              data-bs-target="#editFeeModal<?php echo $c['id']; ?>">
                        <i class="fa fa-pen-to-square text-primary"></i>
                      </button>
                      <form method="POST" class="d-inline" onsubmit="return confirm('Delete this course fee row?');">
                        <input type="hidden" name="action" value="delete_fee_row">
                        <input type="hidden" name="id" value="<?php echo $c['id']; ?>">
                        <button type="submit" class="btn btn-sm btn-light border text-danger">
                          <i class="fa fa-trash"></i>
                        </button>
                      </form>
                    </td>
                  </tr>

                  <!-- Edit Fee Modal -->
                  <div class="modal fade" id="editFeeModal<?php echo $c['id']; ?>" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <form method="POST">
                          <input type="hidden" name="action" value="edit_fee_row">
                          <input type="hidden" name="id" value="<?php echo $c['id']; ?>">
                          <div class="modal-header">
                            <h5 class="modal-title fw-bold">Edit Course Fee Row</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                          </div>
                          <div class="modal-body">
                            <div class="mb-3">
                              <label class="form-label fw-bold">Course Name</label>
                              <input type="text" name="course" class="form-control" value="<?php echo htmlspecialchars($c['course']); ?>" required>
                            </div>
                            <div class="mb-3">
                              <label class="form-label fw-bold">Tuition Fees Per Annum (₹)</label>
                              <input type="text" name="tuition" class="form-control" value="<?php echo htmlspecialchars($c['tuition']); ?>" required>
                            </div>
                            <div class="mb-3">
                              <label class="form-label fw-bold">Eligibility Criteria</label>
                              <textarea name="eligibility" class="form-control" rows="3" required><?php echo htmlspecialchars($c['eligibility']); ?></textarea>
                            </div>
                            <div class="mb-3">
                              <label class="form-label fw-bold">Duration in Years</label>
                              <input type="text" name="duration" class="form-control" value="<?php echo htmlspecialchars($c['duration']); ?>" required>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary btn-sm fw-bold">Save Changes</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Add Fee Modal -->
        <div class="modal fade" id="addFeeModal" tabindex="-1">
          <div class="modal-dialog">
            <div class="modal-content">
              <form method="POST">
                <input type="hidden" name="action" value="add_fee_row">
                <div class="modal-header">
                  <h5 class="modal-title fw-bold">Add Course Fee Row</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                  <div class="mb-3">
                    <label class="form-label fw-bold">Course Name</label>
                    <input type="text" name="course" class="form-control" placeholder="e.g. B.Tech Computer Science" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label fw-bold">Tuition Fees Per Annum (₹)</label>
                    <input type="text" name="tuition" class="form-control" placeholder="e.g. 54000" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label fw-bold">Eligibility Criteria</label>
                    <textarea name="eligibility" class="form-control" rows="3" placeholder="e.g. 10+2 with PCM 45%"></textarea>
                  </div>
                  <div class="mb-3">
                    <label class="form-label fw-bold">Duration in Years</label>
                    <input type="text" name="duration" class="form-control" placeholder="e.g. 4 Yrs." required>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary btn-sm fw-bold">Add Row</button>
                </div>
              </form>
            </div>
          </div>
        </div>

      <!-- ========================================== -->
      <!-- TAB 4: University Account Detail -->
      <!-- ========================================== -->
      <?php elseif ($tab === 'UniversityAccountDetail'): ?>
        <?php $accData = $admissionData['UniversityAccountDetail'] ?? []; ?>
        <div class="admission-card">
          <div class="admission-card-header">
            <div>
              <h5 class="fw-bold mb-0 text-dark"><i class="fa-solid fa-building-columns text-primary me-2"></i>University Account &amp; Banking Details</h5>
              <span class="text-muted small">Live Punjab National Bank, BHIM UPI Scan &amp; Pay, and Online Gateway configuration</span>
            </div>
            <span class="badge-live"><i class="fa-solid fa-check me-1"></i> Live Verified</span>
          </div>
          <div class="p-4">
            <form method="POST" enctype="multipart/form-data">
              <input type="hidden" name="action" value="save_account_detail">
              <div class="row g-3">
                <div class="col-md-6">
                  <label class="form-label fw-bold">Page Header Title</label>
                  <input type="text" name="page_title" class="form-control" value="<?php echo htmlspecialchars($accData['page_title'] ?? 'University Account Detail'); ?>" required>
                </div>
                <div class="col-md-6">
                  <label class="form-label fw-bold">Section Heading</label>
                  <input type="text" name="bank_title" class="form-control" value="<?php echo htmlspecialchars($accData['bank_title'] ?? 'Bank Detail'); ?>" required>
                </div>
                <div class="col-12">
                  <label class="form-label fw-bold">Bank Description (Campus PNB Branch &amp; ATM Details)</label>
                  <textarea name="bank_desc" class="form-control" rows="3"><?php echo htmlspecialchars($accData['bank_desc'] ?? ''); ?></textarea>
                </div>

                <div class="col-12"><hr class="my-2"></div>
                <h6 class="fw-bold text-primary mb-0"><i class="fa-solid fa-money-check-dollar me-1"></i> Core Bank Account Particulars</h6>

                <div class="col-md-4">
                  <label class="form-label fw-bold">Bank Name</label>
                  <input type="text" name="bank_name" class="form-control" value="<?php echo htmlspecialchars($accData['bank_name'] ?? 'Punjab National Bank'); ?>" required>
                </div>
                <div class="col-md-4">
                  <label class="form-label fw-bold">Beneficiary / Account Name</label>
                  <input type="text" name="account_name" class="form-control" value="<?php echo htmlspecialchars($accData['account_name'] ?? 'SSSUTMS'); ?>" required>
                </div>
                <div class="col-md-4">
                  <label class="form-label fw-bold">Account Number</label>
                  <input type="text" name="account_number" class="form-control" value="<?php echo htmlspecialchars($accData['account_number'] ?? '7162002100000506'); ?>" required>
                </div>
                <div class="col-md-6">
                  <label class="form-label fw-bold">IFSC Code</label>
                  <input type="text" name="ifsc_code" class="form-control" value="<?php echo htmlspecialchars($accData['ifsc_code'] ?? 'PUNB0716200'); ?>" required>
                </div>
                <div class="col-md-6">
                  <label class="form-label fw-bold">Branch Name</label>
                  <input type="text" name="branch" class="form-control" value="<?php echo htmlspecialchars($accData['branch'] ?? 'SSSUTMS Campus, Sehore (M.P.)'); ?>" required>
                </div>

                <div class="col-12"><hr class="my-2"></div>
                <h6 class="fw-bold text-primary mb-0"><i class="fa-solid fa-qrcode me-1"></i> Online Banking &amp; BHIM UPI QR Code</h6>

                <div class="col-md-6">
                  <label class="form-label fw-bold">Online Payment Portal URL</label>
                  <input type="text" name="online_banking_url" class="form-control" value="<?php echo htmlspecialchars($accData['online_banking_url'] ?? 'https://sssutms.payjix.com/'); ?>" required>
                </div>
                <div class="col-md-6">
                  <label class="form-label fw-bold">UPI QR Code Image URL</label>
                  <input type="text" name="qr_image_url" class="form-control" value="<?php echo htmlspecialchars($accData['qr_image'] ?? ''); ?>">
                  <div class="mt-2">
                    <label class="small text-muted">Or upload replacement QR code:</label>
                    <input type="file" name="qr_image_file" class="form-control form-control-sm" accept="image/*">
                  </div>
                  <?php if (!empty($accData['qr_image'])): ?>
                    <div class="mt-2">
                      <img src="<?php echo htmlspecialchars($accData['qr_image']); ?>" alt="QR Preview" style="max-height: 140px; border-radius: 8px; border: 1px solid #ddd;">
                    </div>
                  <?php endif; ?>
                </div>

                <div class="col-12 text-end mt-4">
                  <button type="submit" class="btn btn-primary px-4 py-2 fw-bold">
                    <i class="fa fa-floppy-disk me-1"></i> Save Account Details
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>

      <!-- ========================================== -->
      <!-- TAB 5: Brochures -->
      <!-- ========================================== -->
      <?php elseif ($tab === 'Brochures'): ?>
        <?php $broData = $admissionData['Brochures'] ?? []; ?>
        <div class="admission-card">
          <div class="admission-card-header">
            <div>
              <h5 class="fw-bold mb-0 text-dark"><i class="fa-solid fa-book-open-reader text-primary me-2"></i>Admission Brochure &amp; Prospectus Editor</h5>
              <span class="text-muted small">Live brochure PDF download &amp; School of Design preview</span>
            </div>
            <span class="badge-live"><i class="fa-solid fa-check me-1"></i> Live Verified</span>
          </div>
          <div class="p-4">
            <form method="POST" enctype="multipart/form-data">
              <input type="hidden" name="action" value="save_brochures">
              <div class="row g-3">
                <div class="col-md-6">
                  <label class="form-label fw-bold">Page Header Title</label>
                  <input type="text" name="page_title" class="form-control" value="<?php echo htmlspecialchars($broData['page_title'] ?? 'Brochures'); ?>" required>
                </div>
                <div class="col-md-6">
                  <label class="form-label fw-bold">Main Banner Heading</label>
                  <input type="text" name="heading" class="form-control" value="<?php echo htmlspecialchars($broData['heading'] ?? 'ADMISSION BROCHURE'); ?>" required>
                </div>
                <div class="col-md-6">
                  <label class="form-label fw-bold">Prospectus Download Button Text</label>
                  <input type="text" name="prospectus_label" class="form-control" value="<?php echo htmlspecialchars($broData['prospectus_label'] ?? 'Prospectus (Click Here)'); ?>" required>
                </div>
                <div class="col-md-6">
                  <label class="form-label fw-bold">Prospectus PDF Link</label>
                  <input type="text" name="prospectus_pdf" class="form-control" value="<?php echo htmlspecialchars($broData['prospectus_pdf'] ?? ''); ?>" placeholder="https://...">
                  <div class="mt-2">
                    <label class="small text-muted">Or upload new Prospectus PDF:</label>
                    <input type="file" name="prospectus_file" class="form-control form-control-sm" accept=".pdf">
                  </div>
                </div>
                <div class="col-12">
                  <label class="form-label fw-bold">Brochure Preview Cover Image (SOD.png)</label>
                  <input type="text" name="cover_image_url" class="form-control" value="<?php echo htmlspecialchars($broData['cover_image'] ?? ''); ?>">
                  <div class="mt-2">
                    <label class="small text-muted">Or upload replacement image:</label>
                    <input type="file" name="cover_image_file" class="form-control form-control-sm" accept="image/*">
                  </div>
                  <?php if (!empty($broData['cover_image'])): ?>
                    <div class="mt-3 border p-2 rounded bg-light">
                      <div class="small fw-bold text-muted mb-1">Current Preview:</div>
                      <img src="../<?php echo htmlspecialchars($broData['cover_image']); ?>" alt="Cover Preview" style="max-height: 250px; border-radius: 8px;">
                    </div>
                  <?php endif; ?>
                </div>
                <div class="col-12 text-end mt-4">
                  <button type="submit" class="btn btn-primary px-4 py-2 fw-bold">
                    <i class="fa fa-floppy-disk me-1"></i> Save Brochure Details
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>

      <!-- ========================================== -->
      <!-- TAB 6: Admission Registration -->
      <!-- ========================================== -->
      <?php elseif ($tab === 'AdmissionRegistration'): ?>
        <?php $regData = $admissionData['AdmissionRegistration'] ?? []; ?>
        <div class="admission-card">
          <div class="admission-card-header">
            <div>
              <h5 class="fw-bold mb-0 text-dark"><i class="fa-solid fa-user-pen text-primary me-2"></i>Admission Registration (E-Pravesh) Settings</h5>
              <span class="text-muted small">Live link to official ERP Registration form and aspirant guidance</span>
            </div>
            <span class="badge-live"><i class="fa-solid fa-check me-1"></i> Live Verified</span>
          </div>
          <div class="p-4">
            <form method="POST">
              <input type="hidden" name="action" value="save_registration">
              <div class="row g-3">
                <div class="col-md-6">
                  <label class="form-label fw-bold">Page Header Title</label>
                  <input type="text" name="page_title" class="form-control" value="<?php echo htmlspecialchars($regData['page_title'] ?? 'Admission Registration'); ?>" required>
                </div>
                <div class="col-md-6">
                  <label class="form-label fw-bold">Section Heading</label>
                  <input type="text" name="heading" class="form-control" value="<?php echo htmlspecialchars($regData['heading'] ?? 'Admission Registration (Session 2026-27)'); ?>" required>
                </div>
                <div class="col-md-6">
                  <label class="form-label fw-bold">E-Pravesh Link Text</label>
                  <input type="text" name="epravesh_label" class="form-control" value="<?php echo htmlspecialchars($regData['epravesh_label'] ?? 'E-Pravesh 2026(Online Enquiry Form)'); ?>" required>
                </div>
                <div class="col-md-6">
                  <label class="form-label fw-bold">Official E-Pravesh Portal URL</label>
                  <input type="text" name="epravesh_url" class="form-control" value="<?php echo htmlspecialchars($regData['epravesh_url'] ?? 'https://www.sssutms.co.in/erp/Student/Registration/Index/ojdZaOYsXtpmswGfjiVVww%3d%3d'); ?>" required>
                </div>
                <div class="col-12">
                  <label class="form-label fw-bold">Candidate Instructions (One per line)</label>
                  <textarea name="instructions_raw" class="form-control" rows="5"><?php 
                    echo htmlspecialchars(implode("\n", $regData['instructions'] ?? [])); 
                  ?></textarea>
                </div>
                <div class="col-12 text-end mt-4">
                  <button type="submit" class="btn btn-primary px-4 py-2 fw-bold">
                    <i class="fa fa-floppy-disk me-1"></i> Save Registration Settings
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>

      <!-- ========================================== -->
      <!-- TAB 7: Admission Enquiry -->
      <!-- ========================================== -->
      <?php elseif ($tab === 'Admission_Enquiry'): ?>
        <?php $enqData = $admissionData['Admission_Enquiry'] ?? []; ?>
        <div class="admission-card">
          <div class="admission-card-header">
            <div>
              <h5 class="fw-bold mb-0 text-dark"><i class="fa-solid fa-headset text-primary me-2"></i>Admission Enquiry Helplines &amp; Contacts</h5>
              <span class="text-muted small">Live admission contact phone lines, counselling cell timings &amp; incoming leads</span>
            </div>
            <div>
              <a href="inquiries.php" class="btn btn-outline-primary btn-sm fw-bold">
                <i class="fa fa-list me-1"></i> View Submitted Inquiries
              </a>
            </div>
          </div>
          <div class="p-4">
            <form method="POST">
              <input type="hidden" name="action" value="save_enquiry">
              <div class="row g-3">
                <div class="col-md-6">
                  <label class="form-label fw-bold">Page Header Title</label>
                  <input type="text" name="page_title" class="form-control" value="<?php echo htmlspecialchars($enqData['page_title'] ?? 'Admission Enquiry'); ?>" required>
                </div>
                <div class="col-md-6">
                  <label class="form-label fw-bold">Notice / Contact Heading</label>
                  <input type="text" name="contact_heading" class="form-control" value="<?php echo htmlspecialchars($enqData['contact_heading'] ?? 'For Admission 2026-27 Enquiry Please Contact'); ?>" required>
                </div>
                <div class="col-md-6">
                  <label class="form-label fw-bold">Helpline Phone Numbers (One per line)</label>
                  <textarea name="phones_raw" class="form-control" rows="6"><?php 
                    echo htmlspecialchars(implode("\n", $enqData['phone_numbers'] ?? [])); 
                  ?></textarea>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label fw-bold">Operating Hours / Timings</label>
                    <input type="text" name="timings" class="form-control" value="<?php echo htmlspecialchars($enqData['timings'] ?? 'From 10:00 AM to 5:00 PM only'); ?>" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label fw-bold">Official Admission Email</label>
                    <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($enqData['email'] ?? 'info@sssutms.co.in'); ?>" required>
                  </div>
                  <div>
                    <label class="form-label fw-bold">Campus Address</label>
                    <input type="text" name="address" class="form-control" value="<?php echo htmlspecialchars($enqData['address'] ?? 'Opp. Oilfed Plant, Bhopal-Indore Road, Sehore (M.P), Pin - 466001'); ?>" required>
                  </div>
                </div>
                <div class="col-12 text-end mt-4">
                  <button type="submit" class="btn btn-primary px-4 py-2 fw-bold">
                    <i class="fa fa-floppy-disk me-1"></i> Save Enquiry Settings
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </main>

  <div class="sidebar-backdrop" id="sidebarBackdrop"></div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const sidebar = document.querySelector('.admin-sidebar');
    const toggleBtn = document.querySelector('.admin-sidebar-toggle');
    const closeBtn = document.querySelector('.sidebar-close-btn');
    const backdrop = document.getElementById('sidebarBackdrop');

    function openSidebar() {
      sidebar?.classList.add('show');
      backdrop?.classList.add('show');
      document.body.classList.add('sidebar-open');
    }

    function closeSidebar() {
      sidebar?.classList.remove('show');
      backdrop?.classList.remove('show');
      document.body.classList.remove('sidebar-open');
    }

    toggleBtn?.addEventListener('click', openSidebar);
    closeBtn?.addEventListener('click', closeSidebar);
    backdrop?.addEventListener('click', closeSidebar);
  </script>
</body>
</html>
