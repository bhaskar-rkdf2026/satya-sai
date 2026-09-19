<?php
require_once __DIR__ . '/../config.php';
require_admin_auth();

$db = get_db();
if (!$db) {
    die("Database connection failed. Please ensure MySQL service is running in XAMPP.");
}

$msg = '';
$error = '';

$validTabs = [
    'AdmissionProcedure' => 'Admission Procedure',
    'AdmissionNotice' => 'Admission Notice',
    'FeesStructure' => 'Fees Structure & Refund Policy',
    'UniversityAccountDetail' => 'University Account Detail',
    'Brochures' => 'Brochures',
    'AdmissionRegistration' => 'Admission Registration',
    'Admission_Enquiry' => 'Admission Enquiry Desk'
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

// ============================================================================
// HANDLE POST ACTIONS (Pure MySQL Database Operations via PDO)
// ============================================================================
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = clean_input($_POST['action'] ?? '');
    
    // ------------------------------------------------------------------------
    // 1. AdmissionProcedure Save
    // ------------------------------------------------------------------------
    if ($action === 'save_procedure') {
        $page_title = clean_input($_POST['page_title'] ?? 'Admission Procedure');
        $lead_title = clean_input($_POST['lead_title'] ?? 'Admission Procedure');
        $description = clean_input($_POST['description'] ?? '');
        $pdf_label = clean_input($_POST['pdf_label'] ?? 'Admission Procedure (Click Here)');
        $pdf_link = clean_input($_POST['pdf_link'] ?? '');
        $image = clean_input($_POST['image_url'] ?? '');
        
        $meta_title = clean_input($_POST['meta_title'] ?? '');
        $meta_description = clean_input($_POST['meta_description'] ?? '');
        $meta_keywords = clean_input($_POST['meta_keywords'] ?? '');
        $canonical_url = clean_input($_POST['canonical_url'] ?? '');
        $og_image = clean_input($_POST['og_image'] ?? 'assets/images/logo/logo.jpg');
        
        // Handle PDF upload
        if (isset($_FILES['pdf_file']) && $_FILES['pdf_file']['error'] === UPLOAD_ERR_OK) {
            $up = upload_file($_FILES['pdf_file'], 'assets/pdf/admission/', ['pdf']);
            if ($up['success']) {
                $pdf_link = $up['path'];
            }
        }
        
        // Handle Image upload
        if (isset($_FILES['image_file']) && $_FILES['image_file']['error'] === UPLOAD_ERR_OK) {
            $up = upload_file($_FILES['image_file'], 'assets/images/admission/', ['jpg', 'jpeg', 'png', 'webp']);
            if ($up['success']) {
                $image = $up['path'];
            }
        }
        
        try {
            $stmt = $db->prepare("
                UPDATE `admission_pages` 
                SET `page_title` = :pt, `lead_title` = :lt, `description` = :desc,
                    `primary_file_label` = :pfl, `primary_file_url` = :pfu, `image_url` = :img,
                    `meta_title` = :mt, `meta_description` = :md, `meta_keywords` = :mk,
                    `canonical_url` = :can, `og_image` = :ogi,
                    `updated_at` = NOW()
                WHERE `page_key` = 'AdmissionProcedure'
            ");
            $stmt->execute([
                ':pt' => $page_title,
                ':lt' => $lead_title,
                ':desc' => $description,
                ':pfl' => $pdf_label,
                ':pfu' => $pdf_link,
                ':img' => $image,
                ':mt' => $meta_title,
                ':md' => $meta_description,
                ':mk' => $meta_keywords,
                ':can' => $canonical_url,
                ':ogi' => $og_image
            ]);
            $msg = 'Admission Procedure details and SEO metadata successfully updated in MySQL Database!';
        } catch (Exception $e) {
            $error = 'Database Error: ' . $e->getMessage();
        }
    }
    
    // ------------------------------------------------------------------------
    // 2. AdmissionNotice Settings & SEO Save
    // ------------------------------------------------------------------------
    elseif ($action === 'save_notice_settings') {
        $page_title = clean_input($_POST['page_title'] ?? 'Admission Notice');
        $heading = clean_input($_POST['heading'] ?? 'Admission Notice (2026-27)');
        $subheading = clean_input($_POST['subheading'] ?? 'Official Notifications, Circulars & Entrance Exam Schedules');
        $meta_title = clean_input($_POST['meta_title'] ?? '');
        $meta_description = clean_input($_POST['meta_description'] ?? '');
        $meta_keywords = clean_input($_POST['meta_keywords'] ?? '');
        $canonical_url = clean_input($_POST['canonical_url'] ?? '');
        $og_image = clean_input($_POST['og_image'] ?? 'assets/images/logo/logo.jpg');
        
        try {
            $stmt = $db->prepare("
                UPDATE `admission_pages` 
                SET `page_title` = :pt, `heading` = :hd, `subheading` = :sub,
                    `meta_title` = :mt, `meta_description` = :md, `meta_keywords` = :mk,
                    `canonical_url` = :can, `og_image` = :ogi,
                    `updated_at` = NOW()
                WHERE `page_key` = 'AdmissionNotice'
            ");
            $stmt->execute([
                ':pt' => $page_title,
                ':hd' => $heading,
                ':sub' => $subheading,
                ':mt' => $meta_title,
                ':md' => $meta_description,
                ':mk' => $meta_keywords,
                ':can' => $canonical_url,
                ':ogi' => $og_image
            ]);
            $msg = 'Admission Notice settings and SEO metadata updated successfully in MySQL Database!';
        } catch (Exception $e) {
            $error = 'Database Error: ' . $e->getMessage();
        }
    }
    
    // ------------------------------------------------------------------------
    // Notice Item Actions
    // ------------------------------------------------------------------------
    elseif ($action === 'add_notice') {
        $title = clean_input($_POST['title'] ?? '');
        $url = clean_input($_POST['url'] ?? '');
        $notice_date = clean_input($_POST['date'] ?? date('Y-m-d'));
        $session = clean_input($_POST['session'] ?? '2026-27');
        $is_new = isset($_POST['is_new']) ? 1 : 0;
        
        if (isset($_FILES['notice_file']) && $_FILES['notice_file']['error'] === UPLOAD_ERR_OK) {
            $up = upload_file($_FILES['notice_file'], 'assets/pdf/admission/', ['pdf', 'doc', 'docx']);
            if ($up['success']) {
                $url = $up['path'];
            }
        }
        
        if (!empty($title) && !empty($url)) {
            try {
                $stmt = $db->prepare("
                    INSERT INTO `admission_notices` (`title`, `url`, `notice_date`, `is_new`, `session`, `category`, `display_order`)
                    VALUES (:title, :url, :notice_date, :is_new, :session, 'Admission', 1)
                ");
                $stmt->execute([
                    ':title' => $title,
                    ':url' => $url,
                    ':notice_date' => $notice_date,
                    ':is_new' => $is_new,
                    ':session' => $session
                ]);
                $msg = 'New Admission Notice published successfully to MySQL Database!';
            } catch (Exception $e) {
                $error = 'Database Error: ' . $e->getMessage();
            }
        } else {
            $error = 'Notice Title and PDF URL or uploaded file are required!';
        }
    }
    
    elseif ($action === 'edit_notice') {
        $id = (int)($_POST['id'] ?? 0);
        $title = clean_input($_POST['title'] ?? '');
        $url = clean_input($_POST['url'] ?? '');
        $notice_date = clean_input($_POST['date'] ?? date('Y-m-d'));
        $session = clean_input($_POST['session'] ?? '2026-27');
        $is_new = isset($_POST['is_new']) ? 1 : 0;
        
        if (isset($_FILES['notice_file']) && $_FILES['notice_file']['error'] === UPLOAD_ERR_OK) {
            $up = upload_file($_FILES['notice_file'], 'assets/pdf/admission/', ['pdf', 'doc', 'docx']);
            if ($up['success']) {
                $url = $up['path'];
            }
        }
        
        if ($id > 0 && !empty($title)) {
            try {
                $sql = "UPDATE `admission_notices` SET `title` = :title, `notice_date` = :notice_date, `session` = :session, `is_new` = :is_new";
                $params = [
                    ':title' => $title,
                    ':notice_date' => $notice_date,
                    ':session' => $session,
                    ':is_new' => $is_new,
                    ':id' => $id
                ];
                if (!empty($url)) {
                    $sql .= ", `url` = :url";
                    $params[':url'] = $url;
                }
                $sql .= " WHERE `id` = :id";
                $stmt = $db->prepare($sql);
                $stmt->execute($params);
                $msg = 'Admission Notice updated successfully in MySQL Database!';
            } catch (Exception $e) {
                $error = 'Database Error: ' . $e->getMessage();
            }
        }
    }
    
    elseif ($action === 'delete_notice') {
        $id = (int)($_POST['id'] ?? 0);
        if ($id > 0) {
            try {
                $stmt = $db->prepare("DELETE FROM `admission_notices` WHERE `id` = :id");
                $stmt->execute([':id' => $id]);
                $msg = 'Admission Notice deleted successfully from MySQL Database!';
            } catch (Exception $e) {
                $error = 'Database Error: ' . $e->getMessage();
            }
        }
    }
    
    // ------------------------------------------------------------------------
    // 3. FeesStructure Actions
    // ------------------------------------------------------------------------
    elseif ($action === 'save_fee_policy') {
        $page_title = clean_input($_POST['page_title'] ?? 'Fee Structure and Fees Refund Policy');
        $subtitle = clean_input($_POST['subtitle'] ?? 'Eligibility Criteria & Fees Structure');
        $refund_policy_label = clean_input($_POST['refund_policy_label'] ?? 'Download Official Fees Refund Policy (PDF)');
        $refund_policy_pdf = clean_input($_POST['refund_policy_pdf'] ?? '');
        
        $meta_title = clean_input($_POST['meta_title'] ?? '');
        $meta_description = clean_input($_POST['meta_description'] ?? '');
        $meta_keywords = clean_input($_POST['meta_keywords'] ?? '');
        $canonical_url = clean_input($_POST['canonical_url'] ?? '');
        $og_image = clean_input($_POST['og_image'] ?? 'assets/images/logo/logo.jpg');
        
        if (isset($_FILES['refund_policy_file']) && $_FILES['refund_policy_file']['error'] === UPLOAD_ERR_OK) {
            $up = upload_file($_FILES['refund_policy_file'], 'assets/pdf/admission/', ['pdf']);
            if ($up['success']) {
                $refund_policy_pdf = $up['path'];
            }
        }
        
        try {
            $stmt = $db->prepare("
                UPDATE `admission_pages` 
                SET `page_title` = :pt, `subheading` = :sub, `primary_file_label` = :pfl,
                    `primary_file_url` = :pfu,
                    `meta_title` = :mt, `meta_description` = :md, `meta_keywords` = :mk,
                    `canonical_url` = :can, `og_image` = :ogi,
                    `updated_at` = NOW()
                WHERE `page_key` = 'FeesStructure'
            ");
            $stmt->execute([
                ':pt' => $page_title,
                ':sub' => $subtitle,
                ':pfl' => $refund_policy_label,
                ':pfu' => $refund_policy_pdf,
                ':mt' => $meta_title,
                ':md' => $meta_description,
                ':mk' => $meta_keywords,
                ':can' => $canonical_url,
                ':ogi' => $og_image
            ]);
            $msg = 'Fee Policy details and SEO metadata updated successfully in MySQL Database!';
        } catch (Exception $e) {
            $error = 'Database Error: ' . $e->getMessage();
        }
    }
    
    elseif ($action === 'add_fee_row') {
        $course = clean_input($_POST['course'] ?? '');
        $tuition = clean_input($_POST['tuition'] ?? '');
        $eligibility = clean_input($_POST['eligibility'] ?? '');
        $duration = clean_input($_POST['duration'] ?? '');
        
        if (!empty($course) && !empty($tuition)) {
            try {
                $maxSnoStmt = $db->query("SELECT MAX(`sno`) AS max_sno FROM `admission_fees`");
                $maxRow = $maxSnoStmt->fetch();
                $nextSno = ($maxRow && $maxRow['max_sno']) ? ((int)$maxRow['max_sno'] + 1) : 1;
                
                $stmt = $db->prepare("
                    INSERT INTO `admission_fees` (`sno`, `course`, `tuition`, `eligibility`, `duration`, `display_order`)
                    VALUES (:sno, :course, :tuition, :eligibility, :duration, :disp)
                ");
                $stmt->execute([
                    ':sno' => $nextSno,
                    ':course' => $course,
                    ':tuition' => $tuition,
                    ':eligibility' => $eligibility,
                    ':duration' => $duration,
                    ':disp' => $nextSno
                ]);
                $msg = 'Course Fee record added successfully to MySQL Database!';
            } catch (Exception $e) {
                $error = 'Database Error: ' . $e->getMessage();
            }
        } else {
            $error = 'Course Name and Tuition Fee are required!';
        }
    }
    
    elseif ($action === 'edit_fee_row') {
        $id = (int)($_POST['id'] ?? 0);
        $sno = (int)($_POST['sno'] ?? 1);
        $course = clean_input($_POST['course'] ?? '');
        $tuition = clean_input($_POST['tuition'] ?? '');
        $eligibility = clean_input($_POST['eligibility'] ?? '');
        $duration = clean_input($_POST['duration'] ?? '');
        
        if ($id > 0 && !empty($course) && !empty($tuition)) {
            try {
                $stmt = $db->prepare("
                    UPDATE `admission_fees` 
                    SET `sno` = :sno, `course` = :course, `tuition` = :tuition, `eligibility` = :eligibility, `duration` = :duration
                    WHERE `id` = :id
                ");
                $stmt->execute([
                    ':sno' => $sno,
                    ':course' => $course,
                    ':tuition' => $tuition,
                    ':eligibility' => $eligibility,
                    ':duration' => $duration,
                    ':id' => $id
                ]);
                $msg = 'Course Fee record updated successfully in MySQL Database!';
            } catch (Exception $e) {
                $error = 'Database Error: ' . $e->getMessage();
            }
        }
    }
    
    elseif ($action === 'delete_fee_row') {
        $id = (int)($_POST['id'] ?? 0);
        if ($id > 0) {
            try {
                $stmt = $db->prepare("DELETE FROM `admission_fees` WHERE `id` = :id");
                $stmt->execute([':id' => $id]);
                $msg = 'Course Fee row deleted successfully from MySQL Database!';
            } catch (Exception $e) {
                $error = 'Database Error: ' . $e->getMessage();
            }
        }
    }
    
    // ------------------------------------------------------------------------
    // 4. UniversityAccountDetail Actions
    // ------------------------------------------------------------------------
    elseif ($action === 'save_account_detail') {
        $page_title = clean_input($_POST['page_title'] ?? 'University Account Detail');
        $bank_title = clean_input($_POST['bank_title'] ?? 'Bank Detail');
        $bank_desc = clean_input($_POST['bank_desc'] ?? '');
        $bank_name = clean_input($_POST['bank_name'] ?? 'Punjab National Bank');
        $account_name = clean_input($_POST['account_name'] ?? 'SSSUTMS');
        $account_number = clean_input($_POST['account_number'] ?? '7162002100000506');
        $ifsc_code = clean_input($_POST['ifsc_code'] ?? 'PUNB0716200');
        $branch = clean_input($_POST['branch'] ?? 'SSSUTMS Campus, Sehore (M.P.)');
        $online_banking_url = clean_input($_POST['online_banking_url'] ?? 'https://sssutms.payjix.com/');
        $qr_image = clean_input($_POST['qr_image_url'] ?? '');
        
        $meta_title = clean_input($_POST['meta_title'] ?? '');
        $meta_description = clean_input($_POST['meta_description'] ?? '');
        $meta_keywords = clean_input($_POST['meta_keywords'] ?? '');
        $canonical_url = clean_input($_POST['canonical_url'] ?? '');
        $og_image = clean_input($_POST['og_image'] ?? 'assets/images/logo/logo.jpg');
        
        if (isset($_FILES['qr_image_file']) && $_FILES['qr_image_file']['error'] === UPLOAD_ERR_OK) {
            $up = upload_file($_FILES['qr_image_file'], 'assets/images/admission/', ['jpg', 'jpeg', 'png', 'webp']);
            if ($up['success']) {
                $qr_image = $up['path'];
            }
        }
        
        try {
            $stmt = $db->prepare("
                UPDATE `admission_pages` 
                SET `page_title` = :pt, `heading` = :bt, `description` = :desc,
                    `bank_name` = :bn, `account_name` = :an, `account_number` = :acn,
                    `ifsc_code` = :ifsc, `branch` = :br, `online_banking_url` = :url,
                    `image_url` = :qr,
                    `meta_title` = :mt, `meta_description` = :md, `meta_keywords` = :mk,
                    `canonical_url` = :can, `og_image` = :ogi,
                    `updated_at` = NOW()
                WHERE `page_key` = 'UniversityAccountDetail'
            ");
            $stmt->execute([
                ':pt' => $page_title,
                ':bt' => $bank_title,
                ':desc' => $bank_desc,
                ':bn' => $bank_name,
                ':an' => $account_name,
                ':acn' => $account_number,
                ':ifsc' => $ifsc_code,
                ':br' => $branch,
                ':url' => $online_banking_url,
                ':qr' => $qr_image,
                ':mt' => $meta_title,
                ':md' => $meta_description,
                ':mk' => $meta_keywords,
                ':can' => $canonical_url,
                ':ogi' => $og_image
            ]);
            $msg = 'University Account Details and SEO metadata updated successfully in MySQL Database!';
        } catch (Exception $e) {
            $error = 'Database Error: ' . $e->getMessage();
        }
    }
    
    elseif ($action === 'add_charge') {
        $instrument = clean_input($_POST['instrument'] ?? '');
        $charges = clean_input($_POST['charges'] ?? '');
        if (!empty($instrument) && !empty($charges)) {
            try {
                $stmt = $db->prepare("INSERT INTO `admission_bank_charges` (`instrument`, `charges`) VALUES (:inst, :ch)");
                $stmt->execute([':inst' => $instrument, ':ch' => $charges]);
                $msg = 'Payment Instrument Charge added to MySQL Database!';
            } catch (Exception $e) {
                $error = 'Database Error: ' . $e->getMessage();
            }
        }
    }
    
    elseif ($action === 'delete_charge') {
        $id = (int)($_POST['id'] ?? 0);
        if ($id > 0) {
            try {
                $stmt = $db->prepare("DELETE FROM `admission_bank_charges` WHERE `id` = :id");
                $stmt->execute([':id' => $id]);
                $msg = 'Payment charge row removed from MySQL Database!';
            } catch (Exception $e) {
                $error = 'Database Error: ' . $e->getMessage();
            }
        }
    }
    
    // ------------------------------------------------------------------------
    // 5. Brochures Actions
    // ------------------------------------------------------------------------
    elseif ($action === 'save_brochures') {
        $page_title = clean_input($_POST['page_title'] ?? 'Brochures');
        $heading = clean_input($_POST['heading'] ?? 'ADMISSION BROCHURE');
        $prospectus_label = clean_input($_POST['prospectus_label'] ?? 'Prospectus (Click Here)');
        $prospectus_pdf = clean_input($_POST['prospectus_pdf'] ?? '');
        $cover_image = clean_input($_POST['cover_image_url'] ?? '');
        
        $meta_title = clean_input($_POST['meta_title'] ?? '');
        $meta_description = clean_input($_POST['meta_description'] ?? '');
        $meta_keywords = clean_input($_POST['meta_keywords'] ?? '');
        $canonical_url = clean_input($_POST['canonical_url'] ?? '');
        $og_image = clean_input($_POST['og_image'] ?? 'assets/images/logo/logo.jpg');
        
        if (isset($_FILES['prospectus_file']) && $_FILES['prospectus_file']['error'] === UPLOAD_ERR_OK) {
            $up = upload_file($_FILES['prospectus_file'], 'assets/pdf/admission/', ['pdf']);
            if ($up['success']) {
                $prospectus_pdf = $up['path'];
            }
        }
        if (isset($_FILES['cover_image_file']) && $_FILES['cover_image_file']['error'] === UPLOAD_ERR_OK) {
            $up = upload_file($_FILES['cover_image_file'], 'assets/images/admission/', ['jpg', 'jpeg', 'png', 'webp']);
            if ($up['success']) {
                $cover_image = $up['path'];
            }
        }
        
        try {
            $stmt = $db->prepare("
                UPDATE `admission_pages` 
                SET `page_title` = :pt, `heading` = :hd, `primary_file_label` = :pfl,
                    `primary_file_url` = :pfu, `image_url` = :img,
                    `meta_title` = :mt, `meta_description` = :md, `meta_keywords` = :mk,
                    `canonical_url` = :can, `og_image` = :ogi,
                    `updated_at` = NOW()
                WHERE `page_key` = 'Brochures'
            ");
            $stmt->execute([
                ':pt' => $page_title,
                ':hd' => $heading,
                ':pfl' => $prospectus_label,
                ':pfu' => $prospectus_pdf,
                ':img' => $cover_image,
                ':mt' => $meta_title,
                ':md' => $meta_description,
                ':mk' => $meta_keywords,
                ':can' => $canonical_url,
                ':ogi' => $og_image
            ]);
            
            $msg = 'Brochures page details and SEO metadata updated successfully in MySQL Database!';
        } catch (Exception $e) {
            $error = 'Database Error: ' . $e->getMessage();
        }
    }
    
    // ------------------------------------------------------------------------
    // 6. AdmissionRegistration Save
    // ------------------------------------------------------------------------
    elseif ($action === 'save_registration') {
        $page_title = clean_input($_POST['page_title'] ?? 'Admission Registration');
        $heading = clean_input($_POST['heading'] ?? 'Admission Registration (Session 2026-27)');
        $epravesh_label = clean_input($_POST['epravesh_label'] ?? 'E-Pravesh 2026 (Online Registration & Enquiry Form)');
        $epravesh_url = clean_input($_POST['epravesh_url'] ?? '');
        $instructions = clean_input($_POST['instructions_raw'] ?? '');
        
        $meta_title = clean_input($_POST['meta_title'] ?? '');
        $meta_description = clean_input($_POST['meta_description'] ?? '');
        $meta_keywords = clean_input($_POST['meta_keywords'] ?? '');
        $canonical_url = clean_input($_POST['canonical_url'] ?? '');
        $og_image = clean_input($_POST['og_image'] ?? 'assets/images/logo/logo.jpg');
        
        try {
            $stmt = $db->prepare("
                UPDATE `admission_pages` 
                SET `page_title` = :pt, `heading` = :hd, `primary_file_label` = :pfl,
                    `primary_file_url` = :pfu, `instructions` = :inst,
                    `meta_title` = :mt, `meta_description` = :md, `meta_keywords` = :mk,
                    `canonical_url` = :can, `og_image` = :ogi,
                    `updated_at` = NOW()
                WHERE `page_key` = 'AdmissionRegistration'
            ");
            $stmt->execute([
                ':pt' => $page_title,
                ':hd' => $heading,
                ':pfl' => $epravesh_label,
                ':pfu' => $epravesh_url,
                ':inst' => $instructions,
                ':mt' => $meta_title,
                ':md' => $meta_description,
                ':mk' => $meta_keywords,
                ':can' => $canonical_url,
                ':ogi' => $og_image
            ]);
            $msg = 'Admission Registration details and SEO metadata updated successfully in MySQL Database!';
        } catch (Exception $e) {
            $error = 'Database Error: ' . $e->getMessage();
        }
    }
    
    // ------------------------------------------------------------------------
    // 7. Admission_Enquiry Save
    // ------------------------------------------------------------------------
    elseif ($action === 'save_enquiry') {
        $page_title = clean_input($_POST['page_title'] ?? 'Admission Enquiry');
        $contact_heading = clean_input($_POST['contact_heading'] ?? 'For Admission 2026-27 Enquiry Please Contact');
        $timings = clean_input($_POST['timings'] ?? 'From 10:00 AM to 5:00 PM only');
        $email = clean_input($_POST['email'] ?? 'info@sssutms.co.in');
        $address = clean_input($_POST['address'] ?? 'Opp. Oilfed Plant, Bhopal-Indore Road, Sehore (M.P), Pin - 466001');
        $phones = clean_input($_POST['phones_raw'] ?? '');
        
        $meta_title = clean_input($_POST['meta_title'] ?? '');
        $meta_description = clean_input($_POST['meta_description'] ?? '');
        $meta_keywords = clean_input($_POST['meta_keywords'] ?? '');
        $canonical_url = clean_input($_POST['canonical_url'] ?? '');
        $og_image = clean_input($_POST['og_image'] ?? 'assets/images/logo/logo.jpg');
        
        try {
            $stmt = $db->prepare("
                UPDATE `admission_pages` 
                SET `page_title` = :pt, `heading` = :hd, `contact_timings` = :tm,
                    `contact_email` = :em, `contact_address` = :ad, `contact_phones` = :ph,
                    `meta_title` = :mt, `meta_description` = :md, `meta_keywords` = :mk,
                    `canonical_url` = :can, `og_image` = :ogi,
                    `updated_at` = NOW()
                WHERE `page_key` = 'Admission_Enquiry'
            ");
            $stmt->execute([
                ':pt' => $page_title,
                ':hd' => $contact_heading,
                ':tm' => $timings,
                ':em' => $email,
                ':ad' => $address,
                ':ph' => $phones,
                ':mt' => $meta_title,
                ':md' => $meta_description,
                ':mk' => $meta_keywords,
                ':can' => $canonical_url,
                ':ogi' => $og_image
            ]);
            $msg = 'Admission Enquiry Desk details and SEO metadata updated successfully in MySQL Database!';
        } catch (Exception $e) {
            $error = 'Database Error: ' . $e->getMessage();
        }
    }
    
    // Update Lead Status
    elseif ($action === 'update_lead_status') {
        $lead_id = (int)($_POST['lead_id'] ?? 0);
        $new_status = clean_input($_POST['new_status'] ?? 'New');
        if ($lead_id > 0) {
            try {
                $stmt = $db->prepare("UPDATE `admission_enquiries` SET `status` = :st WHERE `id` = :id");
                $stmt->execute([':st' => $new_status, ':id' => $lead_id]);
                $msg = 'Enquiry lead status updated to ' . htmlspecialchars($new_status);
            } catch (Exception $e) {
                $error = 'Database Error: ' . $e->getMessage();
            }
        }
    }
}

// ============================================================================
// LOAD ACTIVE TAB DATA FROM MYSQL DATABASE
// ============================================================================
$pageMeta = get_admission_page($tab);
$totalNotices = (int)$db->query("SELECT COUNT(*) FROM `admission_notices`")->fetchColumn();
$totalFees = (int)$db->query("SELECT COUNT(*) FROM `admission_fees`")->fetchColumn();
$totalBrochures = (int)$db->query("SELECT COUNT(*) FROM `admission_brochures`")->fetchColumn();
$totalEnquiries = (int)$db->query("SELECT COUNT(*) FROM `admission_enquiries`")->fetchColumn();

// Default SEO values fallback
$defaultMetaTitle = !empty($pageMeta['meta_title']) ? $pageMeta['meta_title'] : (($pageMeta['page_title'] ?? $validTabs[$tab]) . ' - SSSUTMS');
$defaultMetaDesc = !empty($pageMeta['meta_description']) ? $pageMeta['meta_description'] : ('Explore ' . ($pageMeta['page_title'] ?? $validTabs[$tab]) . ' at Sri Satya Sai University of Technology & Medical Sciences (SSSUTMS), Sehore (M.P.).');
$defaultKeywords = !empty($pageMeta['meta_keywords']) ? $pageMeta['meta_keywords'] : ('SSSUTMS, ' . ($pageMeta['page_title'] ?? $validTabs[$tab]) . ', Admission 2026-27, Sehore University');
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
    .badge-db-active {
      background: #10b981;
      color: white;
      font-size: 0.72rem;
      padding: 4px 10px;
      border-radius: 6px;
      text-transform: uppercase;
      font-weight: 700;
      display: inline-flex;
      align-items: center;
      gap: 5px;
    }
    .table-modern {
      margin-bottom: 0;
    }
    .table-modern thead th {
      background: #f1f5f9;
      color: #334155;
      font-size: 0.8rem;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      border-bottom: 2px solid #e2e8f0;
      padding: 12px 14px;
    }
    .table-modern tbody td {
      padding: 12px 14px;
      vertical-align: middle;
      font-size: 0.875rem;
      border-bottom: 1px solid #f1f5f9;
    }
    .nav-pills-custom .nav-link {
      border-radius: 8px;
      padding: 8px 16px;
      font-size: 0.88rem;
      font-weight: 600;
      color: #475569;
      border: 1px solid #e2e8f0;
      background: #ffffff;
      transition: all 0.2s;
    }
    .nav-pills-custom .nav-link:hover {
      background: #f8fafc;
      color: #0b2545;
    }
    .nav-pills-custom .nav-link.active {
      background: #0b2545;
      color: #ffffff;
      border-color: #0b2545;
      box-shadow: 0 2px 6px rgba(11, 37, 69, 0.2);
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
    <li><a href="academic.php" class="nav-link"><i class="fa fa-graduation-cap"></i> Academic Cell (46)</a></li>
    <li><a href="examination.php" class="nav-link"><i class="fa fa-file-signature"></i> Examination Cell (5)</a></li>
    <li><a href="research.php" class="nav-link"><i class="fa fa-flask"></i> Research Cell (12)</a></li>
    <li><a href="about.php" class="nav-link"><i class="fa fa-circle-info"></i> About Pages (42)</a></li>
    <li><a href="faculties.php" class="nav-link"><i class="fa fa-chalkboard-user"></i> Faculties &amp; Depts (14)</a></li>
    <li><a href="committee.php" class="nav-link"><i class="fa fa-users-gear"></i> Statutory Committees (9)</a></li>
    <li><a href="documents.php" class="nav-link"><i class="fa fa-stamp"></i> Approvals &amp; NAAC Docs</a></li>
    <li><a href="events.php" class="nav-link"><i class="fa fa-calendar-days"></i> Events &amp; Workshops</a></li>
    <li><a href="seo.php" class="nav-link"><i class="fa fa-globe"></i> Global SEO &amp; Indexing</a></li>
    <li><a href="career.php" class="nav-link"><i class="fa fa-briefcase"></i> Career &amp; Recruitment</a></li>
    <li><a href="contact.php" class="nav-link"><i class="fa fa-phone-volume"></i> Contact &amp; Helpdesk</a></li>
    <li><a href="itep.php" class="nav-link"><i class="fa fa-graduation-cap"></i> ITEP Cell</a></li>
    <li><a href="gallery.php" class="nav-link"><i class="fa fa-camera-retro"></i> Photo &amp; Video Gallery</a></li>
    <li><a href="downloads.php" class="nav-link"><i class="fa fa-folder-arrow-down"></i> Curriculum &amp; Downloads (52)</a></li>
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
        <h5 class="fw-bold text-dark mb-0">Admission Cell Administration</h5>
        <small class="text-muted d-none d-md-inline">Manage All 7 Admission Pages — 100% Dynamic MySQL Database Engine &amp; Full SEO Suite</small>
      </div>
    </div>
    <div class="d-flex align-items-center gap-3">
      <span class="badge-db-active">
        <i class="fa-solid fa-database"></i> MySQL: satya_sai_db
      </span>
      <a href="<?php echo htmlspecialchars($activeFrontend); ?>" target="_blank" class="btn btn-sm btn-outline-primary fw-bold">
        <i class="fa-solid fa-arrow-up-right-from-square me-1"></i> Preview Active Page
      </a>
    </div>
  </header>

  <div class="p-3 p-md-4">
    
    <!-- Top Alert Messages -->
    <?php if (!empty($msg)): ?>
      <div class="alert alert-success alert-dismissible fade show rounded-3 border-0 shadow-sm mb-4" role="alert">
        <i class="fa-solid fa-circle-check me-2"></i> <?php echo htmlspecialchars($msg); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    <?php endif; ?>
    <?php if (!empty($error)): ?>
      <div class="alert alert-danger alert-dismissible fade show rounded-3 border-0 shadow-sm mb-4" role="alert">
        <i class="fa-solid fa-circle-exclamation me-2"></i> <?php echo htmlspecialchars($error); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    <?php endif; ?>

    <!-- Navigation Tabs for All 7 Admission Pages -->
    <div class="admission-tab-nav">
      <?php foreach ($validTabs as $tabKey => $tabLabel): ?>
        <a href="?tab=<?php echo $tabKey; ?>" class="admission-tab-link <?php echo $tab === $tabKey ? 'active' : ''; ?>">
          <i class="fa-solid <?php echo $tabIcons[$tabKey] ?? 'fa-file'; ?>"></i>
          <span><?php echo htmlspecialchars($tabLabel); ?></span>
          <?php if ($tabKey === 'AdmissionNotice'): ?>
            <span class="badge bg-secondary rounded-pill ms-1"><?php echo $totalNotices; ?></span>
          <?php elseif ($tabKey === 'FeesStructure'): ?>
            <span class="badge bg-secondary rounded-pill ms-1"><?php echo $totalFees; ?></span>
          <?php elseif ($tabKey === 'Admission_Enquiry' && $totalEnquiries > 0): ?>
            <span class="badge bg-warning text-dark rounded-pill ms-1"><?php echo $totalEnquiries; ?></span>
          <?php endif; ?>
        </a>
      <?php endforeach; ?>
    </div>

    <!-- ==================================================================== -->
    <!-- TAB 1: ADMISSION PROCEDURE -->
    <!-- ==================================================================== -->
    <?php if ($tab === 'AdmissionProcedure'): ?>
      <div class="row g-4">
        <!-- Main Procedure Settings Form with Sub-tabs -->
        <div class="col-lg-7">
          <div class="admission-card">
            <div class="admission-card-header">
              <div>
                <h6 class="fw-bold mb-0 text-dark"><i class="fa-solid fa-route me-2 text-primary"></i> Page 1: Admission Procedure Settings</h6>
                <small class="text-muted">Dynamic Regulatory Guidelines, Official Flowchart, PDF &amp; SEO Engine</small>
              </div>
              <span class="badge bg-primary-subtle text-primary fw-bold">Live in Database</span>
            </div>
            <div class="p-3 p-md-4">
              <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="action" value="save_procedure">

                <!-- Sub-Pill Navigation: General vs SEO -->
                <ul class="nav nav-pills nav-pills-custom gap-2 mb-4" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pill-proc-general-tab" data-bs-toggle="pill" data-bs-target="#pill-proc-general" type="button" role="tab">
                      <i class="fa-solid fa-sliders me-1.5"></i> General Content &amp; Media
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pill-proc-seo-tab" data-bs-toggle="pill" data-bs-target="#pill-proc-seo" type="button" role="tab">
                      <i class="fa-solid fa-magnifying-glass me-1.5 text-info"></i> SEO &amp; Meta Details <span class="badge bg-info-subtle text-info ms-1">SEO</span>
                    </button>
                  </li>
                </ul>

                <div class="tab-content">
                  <!-- SUB-TAB 1: General Content -->
                  <div class="tab-pane fade show active" id="pill-proc-general" role="tabpanel">
                    <div class="row g-3 mb-3">
                      <div class="col-md-6">
                        <label class="form-label fw-bold small text-dark">Page Title (Browser &amp; Header)</label>
                        <input type="text" name="page_title" class="form-control" value="<?php echo htmlspecialchars($pageMeta['page_title'] ?? 'Admission Procedure'); ?>" required>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label fw-bold small text-dark">Lead Heading / Title</label>
                        <input type="text" name="lead_title" class="form-control" value="<?php echo htmlspecialchars($pageMeta['lead_title'] ?? 'Admission Procedure'); ?>" required>
                      </div>
                    </div>

                    <div class="mb-3">
                      <label class="form-label fw-bold small text-dark">Procedure &amp; Regulatory Guidelines Text</label>
                      <textarea name="description" class="form-control" rows="5" required><?php echo htmlspecialchars($pageMeta['description'] ?? ''); ?></textarea>
                      <small class="text-muted">Regulatory references to MP Niji Vishwavidyalaya Niyamak Aayog and state admission norms.</small>
                    </div>

                    <div class="row g-3 mb-3">
                      <div class="col-md-6">
                        <label class="form-label fw-bold small text-dark">PDF Download Link Label</label>
                        <input type="text" name="pdf_label" class="form-control" value="<?php echo htmlspecialchars($pageMeta['primary_file_label'] ?? 'Admission Procedure(Click Here)'); ?>" required>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label fw-bold small text-dark">PDF Document Link (URL or Upload)</label>
                        <div class="input-group mb-2">
                          <input type="text" name="pdf_link" class="form-control" value="<?php echo htmlspecialchars($pageMeta['primary_file_url'] ?? ''); ?>" placeholder="https://...">
                          <?php if (!empty($pageMeta['primary_file_url'])): ?>
                            <a href="<?php echo htmlspecialchars($pageMeta['primary_file_url']); ?>" target="_blank" class="btn btn-outline-secondary" title="View PDF"><i class="fa-solid fa-eye"></i></a>
                          <?php endif; ?>
                        </div>
                        <input type="file" name="pdf_file" class="form-control form-control-sm" accept=".pdf">
                      </div>
                    </div>

                    <div class="mb-4">
                      <label class="form-label fw-bold small text-dark">Procedure Flowchart / Diagram Image</label>
                      <div class="input-group mb-2">
                        <input type="text" name="image_url" class="form-control" value="<?php echo htmlspecialchars($pageMeta['image_url'] ?? ''); ?>" placeholder="assets/images/admission/...">
                        <?php if (!empty($pageMeta['image_url'])): ?>
                          <a href="../<?php echo htmlspecialchars($pageMeta['image_url']); ?>" target="_blank" class="btn btn-outline-secondary" title="View Image"><i class="fa-solid fa-eye"></i></a>
                        <?php endif; ?>
                      </div>
                      <input type="file" name="image_file" class="form-control form-control-sm" accept="image/*">
                    </div>
                  </div>

                  <!-- SUB-TAB 2: SEO & Meta Details -->
                  <div class="tab-pane fade" id="pill-proc-seo" role="tabpanel">
                    <!-- Google SERP Snippet Preview -->
                    <div class="card mb-4 border-0 shadow-sm" style="background: #f8fafc; border: 1.5px solid #e2e8f0; border-radius: 14px;">
                      <div class="card-body p-4">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                          <h6 class="fw-bold text-dark mb-0"><i class="fa-brands fa-google text-danger me-2"></i>Google Search Result (SERP Live Preview)</h6>
                          <span class="badge bg-light text-secondary border px-3 py-1">Desktop &amp; Mobile SERP</span>
                        </div>
                        <div class="p-3 bg-white rounded border" style="max-width: 650px; font-family: arial, sans-serif;">
                          <div class="d-flex align-items-center gap-2 mb-1" style="font-size: 13px; color: #202124;">
                            <img src="../assets/images/logo/logo.jpg" alt="Google Favicon" width="18" height="18" class="rounded-circle border">
                            <div>
                              <span class="fw-semibold">Sri Satya Sai University</span>
                              <span class="text-muted ms-1" style="font-size: 12px;">https://sssutms.co.in › Admission › AdmissionProcedure</span>
                            </div>
                          </div>
                          <h5 id="seoPreviewTitleAdm" class="fw-normal mb-1 text-primary" style="color: #1a0dab !important; font-size: 20px; line-height: 1.3; cursor: pointer;">
                            <?php echo htmlspecialchars($defaultMetaTitle); ?>
                          </h5>
                          <p id="seoPreviewDescAdm" class="mb-0 text-muted" style="color: #4d5156 !important; font-size: 14px; line-height: 1.58;">
                            <?php echo htmlspecialchars($defaultMetaDesc); ?>
                          </p>
                        </div>
                      </div>
                    </div>

                    <!-- SEO Input Fields -->
                    <div class="row g-3">
                      <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                          <label class="form-label small fw-bold mb-0">
                            <i class="fa-solid fa-heading text-primary me-1"></i> SEO Meta Title (Title Tag)
                          </label>
                          <small class="text-muted"><span id="metaTitleCountAdm">0</span> / 60 chars <span class="badge bg-secondary ms-1">Recommended: 50-60</span></small>
                        </div>
                        <input type="text" name="meta_title" id="seoInputTitleAdm" class="form-control" value="<?php echo htmlspecialchars($pageMeta['meta_title'] ?? ''); ?>" placeholder="e.g. Admission Procedure 2026-27 | Sri Satya Sai University (SSSUTMS)" oninput="updateSeoPreviewAdm()">
                        <small class="text-muted">Displayed as the main clickable headline in Google search results and browser tab.</small>
                      </div>

                      <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                          <label class="form-label small fw-bold mb-0">
                            <i class="fa-solid fa-align-left text-success me-1"></i> SEO Meta Description
                          </label>
                          <small class="text-muted"><span id="metaDescCountAdm">0</span> / 160 chars <span class="badge bg-secondary ms-1">Recommended: 150-160</span></small>
                        </div>
                        <textarea name="meta_description" id="seoInputDescAdm" class="form-control" rows="3" placeholder="Provide a compelling 150-160 character description of this admission page for Google search snippets..." oninput="updateSeoPreviewAdm()"><?php echo htmlspecialchars($pageMeta['meta_description'] ?? ''); ?></textarea>
                        <small class="text-muted">Google snippet description to entice prospective students to click.</small>
                      </div>

                      <div class="col-md-6">
                        <label class="form-label small fw-bold">
                          <i class="fa-solid fa-tags text-warning me-1"></i> Target SEO Keywords (Comma Separated)
                        </label>
                        <input type="text" name="meta_keywords" class="form-control" value="<?php echo htmlspecialchars($pageMeta['meta_keywords'] ?? ''); ?>" placeholder="e.g. SSSUTMS Admission Procedure, Admission Process Sehore, MP Private University">
                        <small class="text-muted">Target keywords for search engine discovery and category relevance.</small>
                      </div>

                      <div class="col-md-6">
                        <label class="form-label small fw-bold">
                          <i class="fa-solid fa-link text-info me-1"></i> Canonical URL Override (Optional)
                        </label>
                        <input type="text" name="canonical_url" class="form-control" value="<?php echo htmlspecialchars($pageMeta['canonical_url'] ?? ''); ?>" placeholder="Leave blank for automatic canonical URL">
                        <small class="text-muted">Preferred canonical page link for duplicate prevention.</small>
                      </div>

                      <div class="col-12">
                        <label class="form-label small fw-bold">
                          <i class="fa-solid fa-image text-danger me-1"></i> Social Sharing Preview Image (og:image)
                        </label>
                        <div class="input-group">
                          <span class="input-group-text bg-light"><i class="fa fa-share-nodes"></i></span>
                          <input type="text" name="og_image" class="form-control" value="<?php echo htmlspecialchars($pageMeta['og_image'] ?? 'assets/images/logo/logo.jpg'); ?>" placeholder="e.g. assets/images/logo/logo.jpg">
                        </div>
                        <small class="text-muted">Image shown when admission page link is shared on WhatsApp, Facebook, LinkedIn, Twitter.</small>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="d-flex align-items-center justify-content-between pt-3 border-top mt-4 flex-wrap gap-2">
                  <div class="small text-muted">
                    <i class="fa fa-circle-check text-success me-1"></i> Changes will immediately update the live public website and Google search metadata.
                  </div>
                  <button type="submit" class="btn btn-primary px-5 py-2 fw-bold shadow-sm">
                    <i class="fa-solid fa-floppy-disk me-1"></i> Save Changes to MySQL
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <!-- Live Website Preview Box -->
        <div class="col-lg-5">
          <div class="admission-card">
            <div class="admission-card-header">
              <h6 class="fw-bold mb-0 text-dark"><i class="fa-solid fa-desktop me-2 text-primary"></i> Live Website Preview</h6>
              <span class="badge bg-success-subtle text-success fw-bold">Live Output</span>
            </div>
            <div class="p-4 bg-light text-center">
              <div class="p-3 bg-white rounded-3 shadow-sm border mb-3 text-start">
                <p class="text-center fw-bold text-dark mb-2" style="font-size: 15px;">
                  <?php echo htmlspecialchars($pageMeta['lead_title'] ?? 'Admission Procedure'); ?>
                </p>
                <p class="small text-muted mb-3" style="text-align: justify; line-height: 1.5;">
                  <?php 
                  $descPreview = $pageMeta['description'] ?? '';
                  echo htmlspecialchars(mb_substr($descPreview, 0, 150)) . (mb_strlen($descPreview) > 150 ? '...' : ''); 
                  ?>
                </p>
                <div class="mb-3">
                  <a href="<?php echo htmlspecialchars($pageMeta['primary_file_url'] ?? '#'); ?>" target="_blank" style="color: #e03e2d; font-size: 0.95rem; text-decoration: underline;" class="fw-bold fst-italic">
                    <?php echo htmlspecialchars($pageMeta['primary_file_label'] ?? 'Admission Procedure(Click Here)'); ?>
                  </a>
                </div>
                <?php if (!empty($pageMeta['image_url'])): ?>
                  <div class="mt-2 text-center">
                    <img src="../<?php echo htmlspecialchars($pageMeta['image_url']); ?>" alt="Procedure Flowchart" class="img-fluid rounded border shadow-sm" style="max-height: 250px;">
                  </div>
                <?php endif; ?>
              </div>
              <a href="../Admission/AdmissionProcedure.php" target="_blank" class="btn btn-outline-primary w-100 fw-bold">
                <i class="fa-solid fa-arrow-up-right-from-square me-1"></i> View Live Admission Procedure Page
              </a>
            </div>
          </div>
        </div>
      </div>

    <!-- ==================================================================== -->
    <!-- TAB 2: ADMISSION NOTICE -->
    <!-- ==================================================================== -->
    <?php elseif ($tab === 'AdmissionNotice'): ?>
      <?php
      $notices = $db->query("SELECT * FROM `admission_notices` ORDER BY `is_new` DESC, `notice_date` DESC, `id` DESC")->fetchAll();
      ?>

      <!-- Page Settings & SEO Configuration Card -->
      <div class="admission-card mb-4">
        <div class="admission-card-header">
          <div>
            <h6 class="fw-bold mb-0 text-dark"><i class="fa-solid fa-gear me-2 text-primary"></i> Page 2: Admission Notice Page Settings &amp; SEO Engine</h6>
            <small class="text-muted">Manage Header Titles, Breadcrumbs &amp; Search Engine Optimization Metadata</small>
          </div>
          <span class="badge bg-primary-subtle text-primary fw-bold">Live in Database</span>
        </div>
        <div class="p-3 p-md-4">
          <form method="POST">
            <input type="hidden" name="action" value="save_notice_settings">

            <!-- Sub-Pill Navigation -->
            <ul class="nav nav-pills nav-pills-custom gap-2 mb-4" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pill-notice-general-tab" data-bs-toggle="pill" data-bs-target="#pill-notice-general" type="button" role="tab">
                  <i class="fa-solid fa-sliders me-1.5"></i> General Page Titles
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="pill-notice-seo-tab" data-bs-toggle="pill" data-bs-target="#pill-notice-seo" type="button" role="tab">
                  <i class="fa-solid fa-magnifying-glass me-1.5 text-info"></i> SEO &amp; Meta Details <span class="badge bg-info-subtle text-info ms-1">SEO</span>
                </button>
              </li>
            </ul>

            <div class="tab-content">
              <!-- SUB-TAB 1: General Settings -->
              <div class="tab-pane fade show active" id="pill-notice-general" role="tabpanel">
                <div class="row g-3">
                  <div class="col-md-4">
                    <label class="form-label fw-bold small text-dark">Page Title (Browser &amp; Banner)</label>
                    <input type="text" name="page_title" class="form-control" value="<?php echo htmlspecialchars($pageMeta['page_title'] ?? 'Admission Notice'); ?>" required>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label fw-bold small text-dark">Section Main Heading</label>
                    <input type="text" name="heading" class="form-control" value="<?php echo htmlspecialchars($pageMeta['heading'] ?? 'Admission Notice (2026-27)'); ?>" required>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label fw-bold small text-dark">Subheading / Badge Text</label>
                    <input type="text" name="subheading" class="form-control" value="<?php echo htmlspecialchars($pageMeta['subheading'] ?? 'Official Notifications, Circulars & Entrance Exam Schedules'); ?>" required>
                  </div>
                </div>
              </div>

              <!-- SUB-TAB 2: SEO Settings -->
              <div class="tab-pane fade" id="pill-notice-seo" role="tabpanel">
                <!-- Google SERP Snippet Preview -->
                <div class="card mb-4 border-0 shadow-sm" style="background: #f8fafc; border: 1.5px solid #e2e8f0; border-radius: 14px;">
                  <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                      <h6 class="fw-bold text-dark mb-0"><i class="fa-brands fa-google text-danger me-2"></i>Google Search Result (SERP Live Preview)</h6>
                      <span class="badge bg-light text-secondary border px-3 py-1">Desktop &amp; Mobile SERP</span>
                    </div>
                    <div class="p-3 bg-white rounded border" style="max-width: 650px; font-family: arial, sans-serif;">
                      <div class="d-flex align-items-center gap-2 mb-1" style="font-size: 13px; color: #202124;">
                        <img src="../assets/images/logo/logo.jpg" alt="Google Favicon" width="18" height="18" class="rounded-circle border">
                        <div>
                          <span class="fw-semibold">Sri Satya Sai University</span>
                          <span class="text-muted ms-1" style="font-size: 12px;">https://sssutms.co.in › Admission › AdmissionNotice</span>
                        </div>
                      </div>
                      <h5 id="seoPreviewTitleAdm" class="fw-normal mb-1 text-primary" style="color: #1a0dab !important; font-size: 20px; line-height: 1.3; cursor: pointer;">
                        <?php echo htmlspecialchars($defaultMetaTitle); ?>
                      </h5>
                      <p id="seoPreviewDescAdm" class="mb-0 text-muted" style="color: #4d5156 !important; font-size: 14px; line-height: 1.58;">
                        <?php echo htmlspecialchars($defaultMetaDesc); ?>
                      </p>
                    </div>
                  </div>
                </div>

                <div class="row g-3">
                  <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                      <label class="form-label small fw-bold mb-0">
                        <i class="fa-solid fa-heading text-primary me-1"></i> SEO Meta Title (Title Tag)
                      </label>
                      <small class="text-muted"><span id="metaTitleCountAdm">0</span> / 60 chars <span class="badge bg-secondary ms-1">Recommended: 50-60</span></small>
                    </div>
                    <input type="text" name="meta_title" id="seoInputTitleAdm" class="form-control" value="<?php echo htmlspecialchars($pageMeta['meta_title'] ?? ''); ?>" placeholder="e.g. Admission Notices & Notifications 2026-27 | SSSUTMS" oninput="updateSeoPreviewAdm()">
                  </div>

                  <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                      <label class="form-label small fw-bold mb-0">
                        <i class="fa-solid fa-align-left text-success me-1"></i> SEO Meta Description
                      </label>
                      <small class="text-muted"><span id="metaDescCountAdm">0</span> / 160 chars <span class="badge bg-secondary ms-1">Recommended: 150-160</span></small>
                    </div>
                    <textarea name="meta_description" id="seoInputDescAdm" class="form-control" rows="3" placeholder="Provide a compelling 150-160 character description of admission notices for search engines..." oninput="updateSeoPreviewAdm()"><?php echo htmlspecialchars($pageMeta['meta_description'] ?? ''); ?></textarea>
                  </div>

                  <div class="col-md-6">
                    <label class="form-label small fw-bold">
                      <i class="fa-solid fa-tags text-warning me-1"></i> Target SEO Keywords (Comma Separated)
                    </label>
                    <input type="text" name="meta_keywords" class="form-control" value="<?php echo htmlspecialchars($pageMeta['meta_keywords'] ?? ''); ?>" placeholder="e.g. SSSUTMS Admission Notice, Enrollment Schedule, Entrance Notifications">
                  </div>

                  <div class="col-md-6">
                    <label class="form-label small fw-bold">
                      <i class="fa-solid fa-link text-info me-1"></i> Canonical URL Override (Optional)
                    </label>
                    <input type="text" name="canonical_url" class="form-control" value="<?php echo htmlspecialchars($pageMeta['canonical_url'] ?? ''); ?>" placeholder="Leave blank for automatic canonical URL">
                  </div>

                  <div class="col-12">
                    <label class="form-label small fw-bold">
                      <i class="fa-solid fa-image text-danger me-1"></i> Social Sharing Preview Image (og:image)
                    </label>
                    <div class="input-group">
                      <span class="input-group-text bg-light"><i class="fa fa-share-nodes"></i></span>
                      <input type="text" name="og_image" class="form-control" value="<?php echo htmlspecialchars($pageMeta['og_image'] ?? 'assets/images/logo/logo.jpg'); ?>" placeholder="e.g. assets/images/logo/logo.jpg">
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="d-flex align-items-center justify-content-between pt-3 border-top mt-4 flex-wrap gap-2">
              <div class="small text-muted">
                <i class="fa fa-circle-check text-success me-1"></i> Page settings &amp; SEO tags update the live Admission Notice page instantly.
              </div>
              <button type="submit" class="btn btn-primary px-5 py-2 fw-bold shadow-sm">
                <i class="fa-solid fa-floppy-disk me-1"></i> Update Page Settings &amp; SEO
              </button>
            </div>
          </form>
        </div>
      </div>

      <div class="row g-4">
        <!-- Add Notice Form -->
        <div class="col-lg-4">
          <div class="admission-card">
            <div class="admission-card-header">
              <h6 class="fw-bold mb-0 text-dark"><i class="fa-solid fa-plus-circle me-2 text-success"></i> Add New Notice</h6>
            </div>
            <div class="p-3">
              <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="action" value="add_notice">

                <div class="mb-3">
                  <label class="form-label fw-bold small text-dark">Notice Title *</label>
                  <textarea name="title" class="form-control" rows="3" placeholder="e.g. Enrollment Form Open Notification (Session 2026-27)" required></textarea>
                </div>

                <div class="mb-3">
                  <label class="form-label fw-bold small text-dark">Notice Date *</label>
                  <input type="date" name="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
                </div>

                <div class="mb-3">
                  <label class="form-label fw-bold small text-dark">Academic Session</label>
                  <input type="text" name="session" class="form-control" value="2026-27" required>
                </div>

                <div class="mb-3">
                  <label class="form-label fw-bold small text-dark">PDF Document Link (URL)</label>
                  <input type="text" name="url" class="form-control mb-2" placeholder="https://...">
                  <label class="form-label fw-bold small text-dark">Or Upload PDF File</label>
                  <input type="file" name="notice_file" class="form-control form-control-sm" accept=".pdf,.doc,.docx">
                </div>

                <div class="form-check form-switch mb-3">
                  <input class="form-check-input" type="checkbox" name="is_new" id="isNewNotice" checked>
                  <label class="form-check-label fw-bold small text-dark" for="isNewNotice">Mark with "NEW" Badge</label>
                </div>

                <button type="submit" class="btn btn-success w-100 fw-bold">
                  <i class="fa-solid fa-paper-plane me-1"></i> Publish Notice to MySQL
                </button>
              </form>
            </div>
          </div>
        </div>

        <!-- Notices List Table -->
        <div class="col-lg-8">
          <div class="admission-card">
            <div class="admission-card-header">
              <div>
                <h6 class="fw-bold mb-0 text-dark"><i class="fa-solid fa-bullhorn me-2 text-primary"></i> Live Admission Notices (<?php echo count($notices); ?> Total)</h6>
                <small class="text-muted">Dynamic circulars, schedules, and notifications in MySQL database</small>
              </div>
            </div>
            <div class="table-responsive" style="max-height: 650px; overflow-y: auto;">
              <table class="table table-hover table-modern align-middle">
                <thead>
                  <tr>
                    <th style="width: 50px;">ID</th>
                    <th>Notice Title</th>
                    <th style="width: 110px;">Date</th>
                    <th style="width: 70px;">Status</th>
                    <th style="width: 110px;" class="text-end">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (empty($notices)): ?>
                    <tr><td colspan="5" class="text-center py-4 text-muted">No admission notices found in database.</td></tr>
                  <?php else: ?>
                    <?php foreach ($notices as $n): ?>
                      <tr>
                        <td class="text-muted fw-bold">#<?php echo $n['id']; ?></td>
                        <td>
                          <div class="fw-bold text-dark"><?php echo htmlspecialchars($n['title']); ?></div>
                          <div class="small text-muted">
                            <span class="badge bg-light text-secondary border me-1"><?php echo htmlspecialchars($n['session'] ?? '2026-27'); ?></span>
                            <a href="<?php echo htmlspecialchars($n['url']); ?>" target="_blank" class="text-decoration-none text-primary">
                              <i class="fa-solid fa-file-pdf me-1"></i> View Document
                            </a>
                          </div>
                        </td>
                        <td class="small text-nowrap"><?php echo date('d M Y', strtotime($n['notice_date'])); ?></td>
                        <td>
                          <?php if (!empty($n['is_new'])): ?>
                            <span class="badge bg-danger">NEW</span>
                          <?php else: ?>
                            <span class="badge bg-secondary-subtle text-secondary">ARCHIVE</span>
                          <?php endif; ?>
                        </td>
                        <td class="text-end text-nowrap">
                          <!-- Edit Modal Trigger -->
                          <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editNoticeModal<?php echo $n['id']; ?>">
                            <i class="fa-solid fa-pen"></i>
                          </button>
                          <!-- Delete Form -->
                          <form method="POST" class="d-inline" onsubmit="return confirm('Delete notice #<?php echo $n['id']; ?> permanently from database?');">
                            <input type="hidden" name="action" value="delete_notice">
                            <input type="hidden" name="id" value="<?php echo $n['id']; ?>">
                            <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                          </form>
                        </td>
                      </tr>

                      <!-- Edit Notice Modal -->
                      <div class="modal fade" id="editNoticeModal<?php echo $n['id']; ?>" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <form method="POST" enctype="multipart/form-data">
                              <input type="hidden" name="action" value="edit_notice">
                              <input type="hidden" name="id" value="<?php echo $n['id']; ?>">
                              <div class="modal-header">
                                <h6 class="modal-title fw-bold">Edit Notice #<?php echo $n['id']; ?></h6>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                              </div>
                              <div class="modal-body">
                                <div class="mb-3">
                                  <label class="form-label fw-bold small">Notice Title *</label>
                                  <textarea name="title" class="form-control" rows="3" required><?php echo htmlspecialchars($n['title']); ?></textarea>
                                </div>
                                <div class="mb-3">
                                  <label class="form-label fw-bold small">Date *</label>
                                  <input type="date" name="date" class="form-control" value="<?php echo htmlspecialchars($n['notice_date']); ?>" required>
                                </div>
                                <div class="mb-3">
                                  <label class="form-label fw-bold small">Session</label>
                                  <input type="text" name="session" class="form-control" value="<?php echo htmlspecialchars($n['session'] ?? '2026-27'); ?>">
                                </div>
                                <div class="mb-3">
                                  <label class="form-label fw-bold small">PDF URL</label>
                                  <input type="text" name="url" class="form-control mb-2" value="<?php echo htmlspecialchars($n['url']); ?>">
                                  <label class="form-label fw-bold small">Replace File</label>
                                  <input type="file" name="notice_file" class="form-control form-control-sm" accept=".pdf,.doc,.docx">
                                </div>
                                <div class="form-check form-switch">
                                  <input class="form-check-input" type="checkbox" name="is_new" id="editNew<?php echo $n['id']; ?>" <?php echo !empty($n['is_new']) ? 'checked' : ''; ?>>
                                  <label class="form-check-label fw-bold small" for="editNew<?php echo $n['id']; ?>">Display "NEW" Badge</label>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary btn-sm fw-bold">Update in MySQL</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    <!-- ==================================================================== -->
    <!-- TAB 3: FEES STRUCTURE -->
    <!-- ==================================================================== -->
    <?php elseif ($tab === 'FeesStructure'): ?>
      <?php
      $feesList = get_admission_fees();
      ?>
      <!-- Fee Policy Details Card with Sub-tabs -->
      <div class="admission-card mb-4">
        <div class="admission-card-header">
          <div>
            <h6 class="fw-bold mb-0 text-dark"><i class="fa-solid fa-file-invoice me-2 text-primary"></i> Page 3: Official Fees Refund Policy &amp; SEO Engine</h6>
            <small class="text-muted">Configure Policy PDF, Subtitle, and Search Engine Metadata</small>
          </div>
          <span class="badge bg-primary-subtle text-primary fw-bold">Live in Database</span>
        </div>
        <div class="p-3 p-md-4">
          <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="action" value="save_fee_policy">

            <!-- Sub-Pill Navigation -->
            <ul class="nav nav-pills nav-pills-custom gap-2 mb-4" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pill-fee-general-tab" data-bs-toggle="pill" data-bs-target="#pill-fee-general" type="button" role="tab">
                  <i class="fa-solid fa-sliders me-1.5"></i> Policy Settings &amp; PDF
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="pill-fee-seo-tab" data-bs-toggle="pill" data-bs-target="#pill-fee-seo" type="button" role="tab">
                  <i class="fa-solid fa-magnifying-glass me-1.5 text-info"></i> SEO &amp; Meta Details <span class="badge bg-info-subtle text-info ms-1">SEO</span>
                </button>
              </li>
            </ul>

            <div class="tab-content">
              <!-- SUB-TAB 1: Policy General -->
              <div class="tab-pane fade show active" id="pill-fee-general" role="tabpanel">
                <div class="row g-3 mb-3">
                  <div class="col-md-6">
                    <label class="form-label fw-bold small text-dark">Page Title</label>
                    <input type="text" name="page_title" class="form-control" value="<?php echo htmlspecialchars($pageMeta['page_title'] ?? 'Fee Structure and Fees Refund Policy'); ?>" required>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label fw-bold small text-dark">Subtitle</label>
                    <input type="text" name="subtitle" class="form-control" value="<?php echo htmlspecialchars($pageMeta['subheading'] ?? 'Eligibility Criteria & Fees Structure'); ?>" required>
                  </div>
                </div>
                <div class="row g-3">
                  <div class="col-md-6">
                    <label class="form-label fw-bold small text-dark">Refund Policy Button Label</label>
                    <input type="text" name="refund_policy_label" class="form-control" value="<?php echo htmlspecialchars($pageMeta['primary_file_label'] ?? 'Download Official Fees Refund Policy (PDF)'); ?>">
                  </div>
                  <div class="col-md-6">
                    <label class="form-label fw-bold small text-dark">Refund Policy PDF URL / Upload</label>
                    <div class="input-group mb-2">
                      <input type="text" name="refund_policy_pdf" class="form-control" value="<?php echo htmlspecialchars($pageMeta['primary_file_url'] ?? ''); ?>">
                      <?php if (!empty($pageMeta['primary_file_url'])): ?>
                        <a href="<?php echo htmlspecialchars($pageMeta['primary_file_url']); ?>" target="_blank" class="btn btn-outline-secondary"><i class="fa-solid fa-eye"></i></a>
                      <?php endif; ?>
                    </div>
                    <input type="file" name="refund_policy_file" class="form-control form-control-sm" accept=".pdf">
                  </div>
                </div>
              </div>

              <!-- SUB-TAB 2: SEO Settings -->
              <div class="tab-pane fade" id="pill-fee-seo" role="tabpanel">
                <!-- Google SERP Snippet Preview -->
                <div class="card mb-4 border-0 shadow-sm" style="background: #f8fafc; border: 1.5px solid #e2e8f0; border-radius: 14px;">
                  <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                      <h6 class="fw-bold text-dark mb-0"><i class="fa-brands fa-google text-danger me-2"></i>Google Search Result (SERP Live Preview)</h6>
                      <span class="badge bg-light text-secondary border px-3 py-1">Desktop &amp; Mobile SERP</span>
                    </div>
                    <div class="p-3 bg-white rounded border" style="max-width: 650px; font-family: arial, sans-serif;">
                      <div class="d-flex align-items-center gap-2 mb-1" style="font-size: 13px; color: #202124;">
                        <img src="../assets/images/logo/logo.jpg" alt="Google Favicon" width="18" height="18" class="rounded-circle border">
                        <div>
                          <span class="fw-semibold">Sri Satya Sai University</span>
                          <span class="text-muted ms-1" style="font-size: 12px;">https://sssutms.co.in › Admission › FeesStructure</span>
                        </div>
                      </div>
                      <h5 id="seoPreviewTitleAdm" class="fw-normal mb-1 text-primary" style="color: #1a0dab !important; font-size: 20px; line-height: 1.3; cursor: pointer;">
                        <?php echo htmlspecialchars($defaultMetaTitle); ?>
                      </h5>
                      <p id="seoPreviewDescAdm" class="mb-0 text-muted" style="color: #4d5156 !important; font-size: 14px; line-height: 1.58;">
                        <?php echo htmlspecialchars($defaultMetaDesc); ?>
                      </p>
                    </div>
                  </div>
                </div>

                <div class="row g-3">
                  <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                      <label class="form-label small fw-bold mb-0">
                        <i class="fa-solid fa-heading text-primary me-1"></i> SEO Meta Title (Title Tag)
                      </label>
                      <small class="text-muted"><span id="metaTitleCountAdm">0</span> / 60 chars <span class="badge bg-secondary ms-1">Recommended: 50-60</span></small>
                    </div>
                    <input type="text" name="meta_title" id="seoInputTitleAdm" class="form-control" value="<?php echo htmlspecialchars($pageMeta['meta_title'] ?? ''); ?>" placeholder="e.g. Fees Structure & Refund Policy 2026-27 | SSSUTMS" oninput="updateSeoPreviewAdm()">
                  </div>

                  <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                      <label class="form-label small fw-bold mb-0">
                        <i class="fa-solid fa-align-left text-success me-1"></i> SEO Meta Description
                      </label>
                      <small class="text-muted"><span id="metaDescCountAdm">0</span> / 160 chars <span class="badge bg-secondary ms-1">Recommended: 150-160</span></small>
                    </div>
                    <textarea name="meta_description" id="seoInputDescAdm" class="form-control" rows="3" placeholder="Provide a detailed fee structure description for search engines..." oninput="updateSeoPreviewAdm()"><?php echo htmlspecialchars($pageMeta['meta_description'] ?? ''); ?></textarea>
                  </div>

                  <div class="col-md-6">
                    <label class="form-label small fw-bold">
                      <i class="fa-solid fa-tags text-warning me-1"></i> Target SEO Keywords
                    </label>
                    <input type="text" name="meta_keywords" class="form-control" value="<?php echo htmlspecialchars($pageMeta['meta_keywords'] ?? ''); ?>" placeholder="e.g. SSSUTMS Fee Structure, B.Tech Fees, MBA Fees Sehore">
                  </div>

                  <div class="col-md-6">
                    <label class="form-label small fw-bold">
                      <i class="fa-solid fa-link text-info me-1"></i> Canonical URL Override
                    </label>
                    <input type="text" name="canonical_url" class="form-control" value="<?php echo htmlspecialchars($pageMeta['canonical_url'] ?? ''); ?>" placeholder="Leave blank for automatic canonical URL">
                  </div>

                  <div class="col-12">
                    <label class="form-label small fw-bold">
                      <i class="fa-solid fa-image text-danger me-1"></i> Social Sharing Preview Image (og:image)
                    </label>
                    <div class="input-group">
                      <span class="input-group-text bg-light"><i class="fa fa-share-nodes"></i></span>
                      <input type="text" name="og_image" class="form-control" value="<?php echo htmlspecialchars($pageMeta['og_image'] ?? 'assets/images/logo/logo.jpg'); ?>">
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="d-flex align-items-center justify-content-between pt-3 border-top mt-4 flex-wrap gap-2">
              <div class="small text-muted">
                <i class="fa fa-circle-check text-success me-1"></i> Policy &amp; SEO settings are updated in MySQL immediately.
              </div>
              <button type="submit" class="btn btn-primary px-5 py-2 fw-bold shadow-sm">
                <i class="fa-solid fa-floppy-disk me-1"></i> Update Policy &amp; SEO Settings
              </button>
            </div>
          </form>
        </div>
      </div>

      <!-- Add New Course Fee Row -->
      <div class="row g-4 mb-4">
        <div class="col-12">
          <div class="admission-card">
            <div class="admission-card-header">
              <h6 class="fw-bold mb-0 text-dark"><i class="fa-solid fa-circle-plus me-2 text-success"></i> Add Course Fee Record</h6>
            </div>
            <div class="p-3">
              <form method="POST">
                <input type="hidden" name="action" value="add_fee_row">
                <div class="row g-3">
                  <div class="col-md-3">
                    <label class="form-label fw-bold small text-dark">Course / Degree *</label>
                    <input type="text" name="course" class="form-control" placeholder="e.g. B.Tech (Computer Science)" required>
                  </div>
                  <div class="col-md-2">
                    <label class="form-label fw-bold small text-dark">Tuition Fee (₹) *</label>
                    <input type="text" name="tuition" class="form-control" placeholder="e.g. 54000" required>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label fw-bold small text-dark">Eligibility Criteria</label>
                    <input type="text" name="eligibility" class="form-control" placeholder="e.g. 10+2 (PCM) With 45% (UR), 40% (ST/SC/OBC)">
                  </div>
                  <div class="col-md-2">
                    <label class="form-label fw-bold small text-dark">Duration</label>
                    <input type="text" name="duration" class="form-control" placeholder="e.g. 4 Yrs.">
                  </div>
                  <div class="col-md-1 d-flex align-items-end">
                    <button type="submit" class="btn btn-success w-100 fw-bold"><i class="fa-solid fa-plus"></i> Add</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Course Fees Table -->
      <div class="admission-card">
        <div class="admission-card-header">
          <div>
            <h6 class="fw-bold mb-0 text-dark"><i class="fa-solid fa-receipt me-2 text-primary"></i> Course Fees Table (<?php echo count($feesList); ?> Courses in MySQL)</h6>
            <small class="text-muted">Dynamic fee structures queried live from `admission_fees` table</small>
          </div>
        </div>
        <div class="table-responsive" style="max-height: 600px; overflow-y: auto;">
          <table class="table table-hover table-modern align-middle">
            <thead>
              <tr>
                <th style="width: 60px;">S.No</th>
                <th style="width: 250px;">Course Name</th>
                <th style="width: 140px;">Tuition Fee (₹)</th>
                <th>Eligibility Criteria</th>
                <th style="width: 110px;">Duration</th>
                <th style="width: 100px;" class="text-end">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($feesList as $f): ?>
                <tr>
                  <td class="fw-bold text-center text-muted"><?php echo htmlspecialchars($f['sno']); ?></td>
                  <td class="fw-bold text-dark"><?php echo htmlspecialchars($f['course']); ?></td>
                  <td>
                    <span class="badge bg-success-subtle text-success fw-bold fs-6">
                      ₹<?php echo is_numeric($f['tuition']) ? number_format((float)$f['tuition']) : htmlspecialchars($f['tuition']); ?>
                    </span>
                  </td>
                  <td class="small text-secondary"><?php echo htmlspecialchars($f['eligibility']); ?></td>
                  <td class="small fw-semibold"><?php echo htmlspecialchars($f['duration']); ?></td>
                  <td class="text-end text-nowrap">
                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editFeeModal<?php echo $f['id']; ?>">
                      <i class="fa-solid fa-pen"></i>
                    </button>
                    <form method="POST" class="d-inline" onsubmit="return confirm('Delete course <?php echo htmlspecialchars($f['course']); ?>?');">
                      <input type="hidden" name="action" value="delete_fee_row">
                      <input type="hidden" name="id" value="<?php echo $f['id']; ?>">
                      <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                    </form>
                  </td>
                </tr>

                <!-- Edit Fee Modal -->
                <div class="modal fade" id="editFeeModal<?php echo $f['id']; ?>" tabindex="-1">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form method="POST">
                        <input type="hidden" name="action" value="edit_fee_row">
                        <input type="hidden" name="id" value="<?php echo $f['id']; ?>">
                        <div class="modal-header">
                          <h6 class="modal-title fw-bold">Edit Course Fee (#<?php echo $f['id']; ?>)</h6>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                          <div class="row g-2 mb-3">
                            <div class="col-4">
                              <label class="form-label fw-bold small">S.No</label>
                              <input type="number" name="sno" class="form-control" value="<?php echo htmlspecialchars($f['sno']); ?>" required>
                            </div>
                            <div class="col-8">
                              <label class="form-label fw-bold small">Tuition Fee (₹) *</label>
                              <input type="text" name="tuition" class="form-control" value="<?php echo htmlspecialchars($f['tuition']); ?>" required>
                            </div>
                          </div>
                          <div class="mb-3">
                            <label class="form-label fw-bold small">Course Name *</label>
                            <input type="text" name="course" class="form-control" value="<?php echo htmlspecialchars($f['course']); ?>" required>
                          </div>
                          <div class="mb-3">
                            <label class="form-label fw-bold small">Eligibility Criteria</label>
                            <textarea name="eligibility" class="form-control" rows="2"><?php echo htmlspecialchars($f['eligibility']); ?></textarea>
                          </div>
                          <div class="mb-3">
                            <label class="form-label fw-bold small">Duration</label>
                            <input type="text" name="duration" class="form-control" value="<?php echo htmlspecialchars($f['duration']); ?>">
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                          <button type="submit" class="btn btn-primary btn-sm fw-bold">Update in MySQL</button>
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

    <!-- ==================================================================== -->
    <!-- TAB 4: UNIVERSITY ACCOUNT DETAIL -->
    <!-- ==================================================================== -->
    <?php elseif ($tab === 'UniversityAccountDetail'): ?>
      <?php
      $charges = get_admission_charges();
      ?>
      <div class="row g-4">
        <!-- Bank Information Form with Sub-tabs -->
        <div class="col-lg-7">
          <div class="admission-card">
            <div class="admission-card-header">
              <div>
                <h6 class="fw-bold mb-0 text-dark"><i class="fa-solid fa-building-columns me-2 text-primary"></i> Page 4: Official Bank Account Information &amp; SEO</h6>
                <small class="text-muted">Direct RTGS/NEFT Credentials, QR Code, Portal Link &amp; SEO</small>
              </div>
              <span class="badge bg-primary-subtle text-primary fw-bold">Live in Database</span>
            </div>
            <div class="p-3 p-md-4">
              <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="action" value="save_account_detail">

                <!-- Sub-Pill Navigation -->
                <ul class="nav nav-pills nav-pills-custom gap-2 mb-4" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pill-bank-general-tab" data-bs-toggle="pill" data-bs-target="#pill-bank-general" type="button" role="tab">
                      <i class="fa-solid fa-sliders me-1.5"></i> Bank Account Information
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pill-bank-seo-tab" data-bs-toggle="pill" data-bs-target="#pill-bank-seo" type="button" role="tab">
                      <i class="fa-solid fa-magnifying-glass me-1.5 text-info"></i> SEO &amp; Meta Details <span class="badge bg-info-subtle text-info ms-1">SEO</span>
                    </button>
                  </li>
                </ul>

                <div class="tab-content">
                  <!-- SUB-TAB 1: Bank Information -->
                  <div class="tab-pane fade show active" id="pill-bank-general" role="tabpanel">
                    <div class="row g-3 mb-3">
                      <div class="col-md-6">
                        <label class="form-label fw-bold small text-dark">Page Title</label>
                        <input type="text" name="page_title" class="form-control" value="<?php echo htmlspecialchars($pageMeta['page_title'] ?? 'University Account Detail'); ?>" required>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label fw-bold small text-dark">Bank Title</label>
                        <input type="text" name="bank_title" class="form-control" value="<?php echo htmlspecialchars($pageMeta['heading'] ?? 'Bank Detail'); ?>" required>
                      </div>
                    </div>

                    <div class="mb-3">
                      <label class="form-label fw-bold small text-dark">Bank Description / Info</label>
                      <textarea name="bank_desc" class="form-control" rows="3"><?php echo htmlspecialchars($pageMeta['description'] ?? ''); ?></textarea>
                    </div>

                    <div class="row g-3 mb-3">
                      <div class="col-md-6">
                        <label class="form-label fw-bold small text-dark">Bank Name</label>
                        <input type="text" name="bank_name" class="form-control" value="<?php echo htmlspecialchars($pageMeta['bank_name'] ?? 'Punjab National Bank'); ?>" required>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label fw-bold small text-dark">Account Holder Name</label>
                        <input type="text" name="account_name" class="form-control" value="<?php echo htmlspecialchars($pageMeta['account_name'] ?? 'SSSUTMS'); ?>" required>
                      </div>
                    </div>

                    <div class="row g-3 mb-3">
                      <div class="col-md-6">
                        <label class="form-label fw-bold small text-dark">Account Number</label>
                        <input type="text" name="account_number" class="form-control font-monospace fw-bold" value="<?php echo htmlspecialchars($pageMeta['account_number'] ?? '7162002100000506'); ?>" required>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label fw-bold small text-dark">IFSC Code</label>
                        <input type="text" name="ifsc_code" class="form-control font-monospace fw-bold" value="<?php echo htmlspecialchars($pageMeta['ifsc_code'] ?? 'PUNB0716200'); ?>" required>
                      </div>
                    </div>

                    <div class="row g-3 mb-3">
                      <div class="col-md-6">
                        <label class="form-label fw-bold small text-dark">Branch</label>
                        <input type="text" name="branch" class="form-control" value="<?php echo htmlspecialchars($pageMeta['branch'] ?? 'SSSUTMS Campus, Sehore (M.P.)'); ?>">
                      </div>
                      <div class="col-md-6">
                        <label class="form-label fw-bold small text-dark">Online Fee Payment Portal URL</label>
                        <input type="text" name="online_banking_url" class="form-control" value="<?php echo htmlspecialchars($pageMeta['online_banking_url'] ?? 'https://sssutms.payjix.com/'); ?>">
                      </div>
                    </div>

                    <div class="mb-4">
                      <label class="form-label fw-bold small text-dark">Official Payment QR Code Image</label>
                      <div class="input-group mb-2">
                        <input type="text" name="qr_image_url" class="form-control" value="<?php echo htmlspecialchars($pageMeta['image_url'] ?? ''); ?>">
                        <?php if (!empty($pageMeta['image_url'])): ?>
                          <a href="<?php echo htmlspecialchars($pageMeta['image_url']); ?>" target="_blank" class="btn btn-outline-secondary"><i class="fa-solid fa-eye"></i></a>
                        <?php endif; ?>
                      </div>
                      <input type="file" name="qr_image_file" class="form-control form-control-sm" accept="image/*">
                    </div>
                  </div>

                  <!-- SUB-TAB 2: SEO Settings -->
                  <div class="tab-pane fade" id="pill-bank-seo" role="tabpanel">
                    <!-- Google SERP Snippet Preview -->
                    <div class="card mb-4 border-0 shadow-sm" style="background: #f8fafc; border: 1.5px solid #e2e8f0; border-radius: 14px;">
                      <div class="card-body p-4">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                          <h6 class="fw-bold text-dark mb-0"><i class="fa-brands fa-google text-danger me-2"></i>Google Search Result (SERP Live Preview)</h6>
                          <span class="badge bg-light text-secondary border px-3 py-1">Desktop &amp; Mobile SERP</span>
                        </div>
                        <div class="p-3 bg-white rounded border" style="max-width: 650px; font-family: arial, sans-serif;">
                          <div class="d-flex align-items-center gap-2 mb-1" style="font-size: 13px; color: #202124;">
                            <img src="../assets/images/logo/logo.jpg" alt="Google Favicon" width="18" height="18" class="rounded-circle border">
                            <div>
                              <span class="fw-semibold">Sri Satya Sai University</span>
                              <span class="text-muted ms-1" style="font-size: 12px;">https://sssutms.co.in › Admission › UniversityAccountDetail</span>
                            </div>
                          </div>
                          <h5 id="seoPreviewTitleAdm" class="fw-normal mb-1 text-primary" style="color: #1a0dab !important; font-size: 20px; line-height: 1.3; cursor: pointer;">
                            <?php echo htmlspecialchars($defaultMetaTitle); ?>
                          </h5>
                          <p id="seoPreviewDescAdm" class="mb-0 text-muted" style="color: #4d5156 !important; font-size: 14px; line-height: 1.58;">
                            <?php echo htmlspecialchars($defaultMetaDesc); ?>
                          </p>
                        </div>
                      </div>
                    </div>

                    <div class="row g-3">
                      <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                          <label class="form-label small fw-bold mb-0">
                            <i class="fa-solid fa-heading text-primary me-1"></i> SEO Meta Title (Title Tag)
                          </label>
                          <small class="text-muted"><span id="metaTitleCountAdm">0</span> / 60 chars <span class="badge bg-secondary ms-1">Recommended: 50-60</span></small>
                        </div>
                        <input type="text" name="meta_title" id="seoInputTitleAdm" class="form-control" value="<?php echo htmlspecialchars($pageMeta['meta_title'] ?? ''); ?>" placeholder="e.g. University Bank Account Details | SSSUTMS" oninput="updateSeoPreviewAdm()">
                      </div>

                      <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                          <label class="form-label small fw-bold mb-0">
                            <i class="fa-solid fa-align-left text-success me-1"></i> SEO Meta Description
                          </label>
                          <small class="text-muted"><span id="metaDescCountAdm">0</span> / 160 chars <span class="badge bg-secondary ms-1">Recommended: 150-160</span></small>
                        </div>
                        <textarea name="meta_description" id="seoInputDescAdm" class="form-control" rows="3" placeholder="Provide verified university bank details and online fee payment instructions..." oninput="updateSeoPreviewAdm()"><?php echo htmlspecialchars($pageMeta['meta_description'] ?? ''); ?></textarea>
                      </div>

                      <div class="col-md-6">
                        <label class="form-label small fw-bold">
                          <i class="fa-solid fa-tags text-warning me-1"></i> Target SEO Keywords
                        </label>
                        <input type="text" name="meta_keywords" class="form-control" value="<?php echo htmlspecialchars($pageMeta['meta_keywords'] ?? ''); ?>" placeholder="e.g. SSSUTMS Bank Account, PNB Account SSSUTMS, Fee Payment Online">
                      </div>

                      <div class="col-md-6">
                        <label class="form-label small fw-bold">
                          <i class="fa-solid fa-link text-info me-1"></i> Canonical URL Override
                        </label>
                        <input type="text" name="canonical_url" class="form-control" value="<?php echo htmlspecialchars($pageMeta['canonical_url'] ?? ''); ?>" placeholder="Leave blank for automatic canonical URL">
                      </div>

                      <div class="col-12">
                        <label class="form-label small fw-bold">
                          <i class="fa-solid fa-image text-danger me-1"></i> Social Sharing Preview Image (og:image)
                        </label>
                        <div class="input-group">
                          <span class="input-group-text bg-light"><i class="fa fa-share-nodes"></i></span>
                          <input type="text" name="og_image" class="form-control" value="<?php echo htmlspecialchars($pageMeta['og_image'] ?? 'assets/images/logo/logo.jpg'); ?>">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="d-flex align-items-center justify-content-between pt-3 border-top mt-4 flex-wrap gap-2">
                  <div class="small text-muted">
                    <i class="fa fa-circle-check text-success me-1"></i> Updates bank credentials &amp; SEO tags in real-time.
                  </div>
                  <button type="submit" class="btn btn-primary px-5 py-2 fw-bold shadow-sm">
                    <i class="fa-solid fa-floppy-disk me-1"></i> Save Bank Details in MySQL
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <!-- Payment Instrument Charges -->
        <div class="col-lg-5">
          <div class="admission-card mb-4">
            <div class="admission-card-header">
              <h6 class="fw-bold mb-0 text-dark"><i class="fa-solid fa-credit-card me-2 text-primary"></i> Payment Instrument Charges</h6>
            </div>
            <div class="p-3">
              <form method="POST" class="mb-3">
                <input type="hidden" name="action" value="add_charge">
                <div class="mb-2">
                  <label class="form-label fw-bold small">Instrument Name</label>
                  <input type="text" name="instrument" class="form-control form-control-sm" placeholder="e.g. Credit Card" required>
                </div>
                <div class="mb-2">
                  <label class="form-label fw-bold small">Charges</label>
                  <input type="text" name="charges" class="form-control form-control-sm" placeholder="e.g. 1.1% per transaction" required>
                </div>
                <button type="submit" class="btn btn-success btn-sm w-100 fw-bold"><i class="fa-solid fa-plus me-1"></i> Add Charge Row</button>
              </form>

              <table class="table table-sm table-modern">
                <thead>
                  <tr>
                    <th>Instrument</th>
                    <th>Charges</th>
                    <th class="text-end">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($charges as $c): ?>
                    <tr>
                      <td class="fw-semibold text-dark"><?php echo htmlspecialchars($c['instrument']); ?></td>
                      <td class="small text-secondary"><?php echo htmlspecialchars($c['charges']); ?></td>
                      <td class="text-end">
                        <form method="POST" class="d-inline" onsubmit="return confirm('Delete charge for <?php echo htmlspecialchars($c['instrument']); ?>?');">
                          <input type="hidden" name="action" value="delete_charge">
                          <input type="hidden" name="id" value="<?php echo $c['id']; ?>">
                          <button type="submit" class="btn btn-sm btn-outline-danger py-0 px-1.5"><i class="fa-solid fa-xmark"></i></button>
                        </form>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    <!-- ==================================================================== -->
    <!-- TAB 5: BROCHURES -->
    <!-- ==================================================================== -->
    <?php elseif ($tab === 'Brochures'): ?>
      <div class="row g-4">
        <!-- Main Brochures Settings Form with Sub-tabs -->
        <div class="col-lg-7">
          <div class="admission-card">
            <div class="admission-card-header">
              <div>
                <h6 class="fw-bold mb-0 text-dark"><i class="fa-solid fa-book-open me-2 text-primary"></i> Page 5: Brochures Settings &amp; SEO</h6>
                <small class="text-muted">Dynamic Brochure Heading, Prospectus PDF, Cover Image &amp; SEO Engine</small>
              </div>
              <span class="badge bg-primary-subtle text-primary fw-bold">Live in Database</span>
            </div>
            <div class="p-3 p-md-4">
              <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="action" value="save_brochures">

                <!-- Sub-Pill Navigation -->
                <ul class="nav nav-pills nav-pills-custom gap-2 mb-4" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pill-brochure-general-tab" data-bs-toggle="pill" data-bs-target="#pill-brochure-general" type="button" role="tab">
                      <i class="fa-solid fa-sliders me-1.5"></i> General Content &amp; Media
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pill-brochure-seo-tab" data-bs-toggle="pill" data-bs-target="#pill-brochure-seo" type="button" role="tab">
                      <i class="fa-solid fa-magnifying-glass me-1.5 text-info"></i> SEO &amp; Meta Details <span class="badge bg-info-subtle text-info ms-1">SEO</span>
                    </button>
                  </li>
                </ul>

                <div class="tab-content">
                  <!-- SUB-TAB 1: General Content -->
                  <div class="tab-pane fade show active" id="pill-brochure-general" role="tabpanel">
                    <div class="mb-3">
                      <label class="form-label fw-bold small text-dark">Page Title (Browser Tab &amp; Header)</label>
                      <input type="text" name="page_title" class="form-control" value="<?php echo htmlspecialchars($pageMeta['page_title'] ?? 'Brochures'); ?>" required>
                    </div>

                    <div class="mb-3">
                      <label class="form-label fw-bold small text-dark">Section Heading</label>
                      <input type="text" name="heading" class="form-control" value="<?php echo htmlspecialchars($pageMeta['heading'] ?? 'ADMISSION BROCHURE'); ?>" required>
                      <small class="text-muted">Heading displayed in orange next to the folder icon.</small>
                    </div>

                    <div class="mb-3">
                      <label class="form-label fw-bold small text-dark">Prospectus Link Label</label>
                      <input type="text" name="prospectus_label" class="form-control" value="<?php echo htmlspecialchars($pageMeta['primary_file_label'] ?? 'Prospectus (Click Here)'); ?>" required>
                      <small class="text-muted">Anchor text displayed in red bold italic next to the arrow icon.</small>
                    </div>

                    <div class="mb-3">
                      <label class="form-label fw-bold small text-dark">Prospectus PDF URL / Upload File</label>
                      <div class="input-group mb-2">
                        <input type="text" name="prospectus_pdf" class="form-control" value="<?php echo htmlspecialchars($pageMeta['primary_file_url'] ?? ''); ?>" placeholder="https://...">
                        <?php if (!empty($pageMeta['primary_file_url'])): ?>
                          <a href="<?php echo htmlspecialchars($pageMeta['primary_file_url']); ?>" target="_blank" class="btn btn-outline-secondary" title="View Current PDF"><i class="fa-solid fa-eye"></i></a>
                        <?php endif; ?>
                      </div>
                      <input type="file" name="prospectus_file" class="form-control form-control-sm" accept=".pdf">
                      <small class="text-muted">Enter direct PDF URL or choose a new .pdf file from your computer to upload.</small>
                    </div>

                    <div class="mb-4">
                      <label class="form-label fw-bold small text-dark">Prospectus Cover Image</label>
                      <div class="input-group mb-2">
                        <input type="text" name="cover_image_url" class="form-control" value="<?php echo htmlspecialchars($pageMeta['image_url'] ?? ''); ?>" placeholder="assets/images/admission/...">
                        <?php if (!empty($pageMeta['image_url'])): ?>
                          <a href="../<?php echo htmlspecialchars($pageMeta['image_url']); ?>" target="_blank" class="btn btn-outline-secondary" title="View Image"><i class="fa-solid fa-eye"></i></a>
                        <?php endif; ?>
                      </div>
                      <input type="file" name="cover_image_file" class="form-control form-control-sm" accept="image/*">
                    </div>
                  </div>

                  <!-- SUB-TAB 2: SEO Settings -->
                  <div class="tab-pane fade" id="pill-brochure-seo" role="tabpanel">
                    <!-- Google SERP Snippet Preview -->
                    <div class="card mb-4 border-0 shadow-sm" style="background: #f8fafc; border: 1.5px solid #e2e8f0; border-radius: 14px;">
                      <div class="card-body p-4">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                          <h6 class="fw-bold text-dark mb-0"><i class="fa-brands fa-google text-danger me-2"></i>Google Search Result (SERP Live Preview)</h6>
                          <span class="badge bg-light text-secondary border px-3 py-1">Desktop &amp; Mobile SERP</span>
                        </div>
                        <div class="p-3 bg-white rounded border" style="max-width: 650px; font-family: arial, sans-serif;">
                          <div class="d-flex align-items-center gap-2 mb-1" style="font-size: 13px; color: #202124;">
                            <img src="../assets/images/logo/logo.jpg" alt="Google Favicon" width="18" height="18" class="rounded-circle border">
                            <div>
                              <span class="fw-semibold">Sri Satya Sai University</span>
                              <span class="text-muted ms-1" style="font-size: 12px;">https://sssutms.co.in › Admission › Brochures</span>
                            </div>
                          </div>
                          <h5 id="seoPreviewTitleAdm" class="fw-normal mb-1 text-primary" style="color: #1a0dab !important; font-size: 20px; line-height: 1.3; cursor: pointer;">
                            <?php echo htmlspecialchars($defaultMetaTitle); ?>
                          </h5>
                          <p id="seoPreviewDescAdm" class="mb-0 text-muted" style="color: #4d5156 !important; font-size: 14px; line-height: 1.58;">
                            <?php echo htmlspecialchars($defaultMetaDesc); ?>
                          </p>
                        </div>
                      </div>
                    </div>

                    <div class="row g-3">
                      <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                          <label class="form-label small fw-bold mb-0">
                            <i class="fa-solid fa-heading text-primary me-1"></i> SEO Meta Title (Title Tag)
                          </label>
                          <small class="text-muted"><span id="metaTitleCountAdm">0</span> / 60 chars <span class="badge bg-secondary ms-1">Recommended: 50-60</span></small>
                        </div>
                        <input type="text" name="meta_title" id="seoInputTitleAdm" class="form-control" value="<?php echo htmlspecialchars($pageMeta['meta_title'] ?? ''); ?>" placeholder="e.g. Admission Brochures & Prospectus 2026-27 | SSSUTMS" oninput="updateSeoPreviewAdm()">
                      </div>

                      <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                          <label class="form-label small fw-bold mb-0">
                            <i class="fa-solid fa-align-left text-success me-1"></i> SEO Meta Description
                          </label>
                          <small class="text-muted"><span id="metaDescCountAdm">0</span> / 160 chars <span class="badge bg-secondary ms-1">Recommended: 150-160</span></small>
                        </div>
                        <textarea name="meta_description" id="seoInputDescAdm" class="form-control" rows="3" placeholder="Download official admission brochure, university prospectus, and program details..." oninput="updateSeoPreviewAdm()"><?php echo htmlspecialchars($pageMeta['meta_description'] ?? ''); ?></textarea>
                      </div>

                      <div class="col-md-6">
                        <label class="form-label small fw-bold">
                          <i class="fa-solid fa-tags text-warning me-1"></i> Target SEO Keywords
                        </label>
                        <input type="text" name="meta_keywords" class="form-control" value="<?php echo htmlspecialchars($pageMeta['meta_keywords'] ?? ''); ?>" placeholder="e.g. SSSUTMS Brochure, Prospectus PDF, University Information Booklet">
                      </div>

                      <div class="col-md-6">
                        <label class="form-label small fw-bold">
                          <i class="fa-solid fa-link text-info me-1"></i> Canonical URL Override
                        </label>
                        <input type="text" name="canonical_url" class="form-control" value="<?php echo htmlspecialchars($pageMeta['canonical_url'] ?? ''); ?>" placeholder="Leave blank for automatic canonical URL">
                      </div>

                      <div class="col-12">
                        <label class="form-label small fw-bold">
                          <i class="fa-solid fa-image text-danger me-1"></i> Social Sharing Preview Image (og:image)
                        </label>
                        <div class="input-group">
                          <span class="input-group-text bg-light"><i class="fa fa-share-nodes"></i></span>
                          <input type="text" name="og_image" class="form-control" value="<?php echo htmlspecialchars($pageMeta['og_image'] ?? 'assets/images/logo/logo.jpg'); ?>">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="d-flex align-items-center justify-content-between pt-3 border-top mt-4 flex-wrap gap-2">
                  <div class="small text-muted">
                    <i class="fa fa-circle-check text-success me-1"></i> Changes will immediately update the live public website and Google search metadata.
                  </div>
                  <button type="submit" class="btn btn-primary px-5 py-2 fw-bold shadow-sm">
                    <i class="fa-solid fa-floppy-disk me-1"></i> Save Changes to MySQL
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <!-- Live Website Preview Box -->
        <div class="col-lg-5">
          <div class="admission-card">
            <div class="admission-card-header">
              <h6 class="fw-bold mb-0 text-dark"><i class="fa-solid fa-desktop me-2 text-primary"></i> Live Website Preview</h6>
              <span class="badge bg-success-subtle text-success fw-bold">Live Output</span>
            </div>
            <div class="p-4 bg-light text-center">
              <div class="p-3 bg-white rounded-3 shadow-sm border mb-3 text-center">
                <h5 class="fw-bold mb-3 d-flex align-items-center justify-content-center gap-2" style="color: #e79439; font-size: 1.1rem;">
                  <img src="../assets/images/admission/Brochures_img_0.png" style="width: 26px; height: 26px;" alt="Folder">
                  <span><?php echo htmlspecialchars($pageMeta['heading'] ?? 'ADMISSION BROCHURE'); ?></span>
                </h5>
                <div class="mb-3">
                  <img src="../assets/images/admission/Brochures_img_1.png" style="width: 24px; height: 18px;" alt="Arrow">
                  <a href="<?php echo htmlspecialchars($pageMeta['primary_file_url'] ?? '#'); ?>" target="_blank" style="color: red; font-size: 0.95rem; text-decoration: underline;" class="fw-bold fst-italic">
                    <?php echo htmlspecialchars($pageMeta['primary_file_label'] ?? 'Prospectus (Click Here)'); ?>
                  </a>
                </div>
                <?php if (!empty($pageMeta['image_url'])): ?>
                  <div class="mt-2 text-center">
                    <img src="../<?php echo htmlspecialchars($pageMeta['image_url']); ?>" alt="Prospectus Cover" class="img-fluid rounded border shadow-sm" style="max-height: 280px;">
                  </div>
                <?php endif; ?>
              </div>
              <a href="../Admission/Brochures.php" target="_blank" class="btn btn-outline-primary w-100 fw-bold">
                <i class="fa-solid fa-arrow-up-right-from-square me-1"></i> View Live Brochures Page
              </a>
            </div>
          </div>
        </div>
      </div>

    <!-- ==================================================================== -->
    <!-- TAB 6: ADMISSION REGISTRATION -->
    <!-- ==================================================================== -->
    <?php elseif ($tab === 'AdmissionRegistration'): ?>
      <div class="admission-card">
        <div class="admission-card-header">
          <div>
            <h6 class="fw-bold mb-0 text-dark"><i class="fa-solid fa-user-pen me-2 text-primary"></i> Page 6: Admission Registration &amp; E-Pravesh Portal Settings &amp; SEO</h6>
            <small class="text-muted">Dynamic Portal Link, Registration Instructions &amp; SEO Engine</small>
          </div>
          <span class="badge bg-primary-subtle text-primary fw-bold">Live in Database</span>
        </div>
        <div class="p-3 p-md-4">
          <form method="POST">
            <input type="hidden" name="action" value="save_registration">

            <!-- Sub-Pill Navigation -->
            <ul class="nav nav-pills nav-pills-custom gap-2 mb-4" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pill-reg-general-tab" data-bs-toggle="pill" data-bs-target="#pill-reg-general" type="button" role="tab">
                  <i class="fa-solid fa-sliders me-1.5"></i> Registration Portal &amp; Steps
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="pill-reg-seo-tab" data-bs-toggle="pill" data-bs-target="#pill-reg-seo" type="button" role="tab">
                  <i class="fa-solid fa-magnifying-glass me-1.5 text-info"></i> SEO &amp; Meta Details <span class="badge bg-info-subtle text-info ms-1">SEO</span>
                </button>
              </li>
            </ul>

            <div class="tab-content">
              <!-- SUB-TAB 1: General Content -->
              <div class="tab-pane fade show active" id="pill-reg-general" role="tabpanel">
                <div class="row g-3 mb-3">
                  <div class="col-md-6">
                    <label class="form-label fw-bold small text-dark">Page Title</label>
                    <input type="text" name="page_title" class="form-control" value="<?php echo htmlspecialchars($pageMeta['page_title'] ?? 'Admission Registration'); ?>" required>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label fw-bold small text-dark">Heading</label>
                    <input type="text" name="heading" class="form-control" value="<?php echo htmlspecialchars($pageMeta['heading'] ?? 'Admission Registration (Session 2026-27)'); ?>" required>
                  </div>
                </div>

                <div class="row g-3 mb-3">
                  <div class="col-md-6">
                    <label class="form-label fw-bold small text-dark">E-Pravesh Registration Button Label</label>
                    <input type="text" name="epravesh_label" class="form-control" value="<?php echo htmlspecialchars($pageMeta['primary_file_label'] ?? 'E-Pravesh 2026 (Online Registration & Enquiry Form)'); ?>" required>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label fw-bold small text-dark">E-Pravesh Official Portal URL</label>
                    <div class="input-group">
                      <input type="url" name="epravesh_url" class="form-control" value="<?php echo htmlspecialchars($pageMeta['primary_file_url'] ?? 'https://www.sssutms.co.in/erp/Student/Registration/Index/ojdZaOYsXtpmswGfjiVVww%3d%3d'); ?>" required>
                      <a href="<?php echo htmlspecialchars($pageMeta['primary_file_url'] ?? '#'); ?>" target="_blank" class="btn btn-outline-secondary"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                    </div>
                  </div>
                </div>

                <div class="mb-4">
                  <label class="form-label fw-bold small text-dark">Step-by-Step Registration Instructions (One per line)</label>
                  <textarea name="instructions_raw" class="form-control font-monospace" rows="6"><?php echo htmlspecialchars($pageMeta['instructions'] ?? ''); ?></textarea>
                  <small class="text-muted">Enter each instruction or guideline on a new line. They will be formatted as numbered action steps on the website.</small>
                </div>
              </div>

              <!-- SUB-TAB 2: SEO Settings -->
              <div class="tab-pane fade" id="pill-reg-seo" role="tabpanel">
                <!-- Google SERP Snippet Preview -->
                <div class="card mb-4 border-0 shadow-sm" style="background: #f8fafc; border: 1.5px solid #e2e8f0; border-radius: 14px;">
                  <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                      <h6 class="fw-bold text-dark mb-0"><i class="fa-brands fa-google text-danger me-2"></i>Google Search Result (SERP Live Preview)</h6>
                      <span class="badge bg-light text-secondary border px-3 py-1">Desktop &amp; Mobile SERP</span>
                    </div>
                    <div class="p-3 bg-white rounded border" style="max-width: 650px; font-family: arial, sans-serif;">
                      <div class="d-flex align-items-center gap-2 mb-1" style="font-size: 13px; color: #202124;">
                        <img src="../assets/images/logo/logo.jpg" alt="Google Favicon" width="18" height="18" class="rounded-circle border">
                        <div>
                          <span class="fw-semibold">Sri Satya Sai University</span>
                          <span class="text-muted ms-1" style="font-size: 12px;">https://sssutms.co.in › Admission › AdmissionRegistration</span>
                        </div>
                      </div>
                      <h5 id="seoPreviewTitleAdm" class="fw-normal mb-1 text-primary" style="color: #1a0dab !important; font-size: 20px; line-height: 1.3; cursor: pointer;">
                        <?php echo htmlspecialchars($defaultMetaTitle); ?>
                      </h5>
                      <p id="seoPreviewDescAdm" class="mb-0 text-muted" style="color: #4d5156 !important; font-size: 14px; line-height: 1.58;">
                        <?php echo htmlspecialchars($defaultMetaDesc); ?>
                      </p>
                    </div>
                  </div>
                </div>

                <div class="row g-3">
                  <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                      <label class="form-label small fw-bold mb-0">
                        <i class="fa-solid fa-heading text-primary me-1"></i> SEO Meta Title (Title Tag)
                      </label>
                      <small class="text-muted"><span id="metaTitleCountAdm">0</span> / 60 chars <span class="badge bg-secondary ms-1">Recommended: 50-60</span></small>
                    </div>
                    <input type="text" name="meta_title" id="seoInputTitleAdm" class="form-control" value="<?php echo htmlspecialchars($pageMeta['meta_title'] ?? ''); ?>" placeholder="e.g. Online Admission Registration & E-Pravesh 2026-27 | SSSUTMS" oninput="updateSeoPreviewAdm()">
                  </div>

                  <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                      <label class="form-label small fw-bold mb-0">
                        <i class="fa-solid fa-align-left text-success me-1"></i> SEO Meta Description
                      </label>
                      <small class="text-muted"><span id="metaDescCountAdm">0</span> / 160 chars <span class="badge bg-secondary ms-1">Recommended: 150-160</span></small>
                    </div>
                    <textarea name="meta_description" id="seoInputDescAdm" class="form-control" rows="3" placeholder="Register online for admission 2026-27 at Sri Satya Sai University through E-Pravesh portal..." oninput="updateSeoPreviewAdm()"><?php echo htmlspecialchars($pageMeta['meta_description'] ?? ''); ?></textarea>
                  </div>

                  <div class="col-md-6">
                    <label class="form-label small fw-bold">
                      <i class="fa-solid fa-tags text-warning me-1"></i> Target SEO Keywords
                    </label>
                    <input type="text" name="meta_keywords" class="form-control" value="<?php echo htmlspecialchars($pageMeta['meta_keywords'] ?? ''); ?>" placeholder="e.g. SSSUTMS E-Pravesh, Admission Registration, Online Form Sehore">
                  </div>

                  <div class="col-md-6">
                    <label class="form-label small fw-bold">
                      <i class="fa-solid fa-link text-info me-1"></i> Canonical URL Override
                    </label>
                    <input type="text" name="canonical_url" class="form-control" value="<?php echo htmlspecialchars($pageMeta['canonical_url'] ?? ''); ?>" placeholder="Leave blank for automatic canonical URL">
                  </div>

                  <div class="col-12">
                    <label class="form-label small fw-bold">
                      <i class="fa-solid fa-image text-danger me-1"></i> Social Sharing Preview Image (og:image)
                    </label>
                    <div class="input-group">
                      <span class="input-group-text bg-light"><i class="fa fa-share-nodes"></i></span>
                      <input type="text" name="og_image" class="form-control" value="<?php echo htmlspecialchars($pageMeta['og_image'] ?? 'assets/images/logo/logo.jpg'); ?>">
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="d-flex align-items-center justify-content-between pt-3 border-top mt-4 flex-wrap gap-2">
              <div class="small text-muted">
                <i class="fa fa-circle-check text-success me-1"></i> Changes will immediately update the live registration portal links &amp; metadata.
              </div>
              <button type="submit" class="btn btn-primary px-5 py-2 fw-bold shadow-sm">
                <i class="fa-solid fa-floppy-disk me-1"></i> Save Registration Settings in MySQL
              </button>
            </div>
          </form>
        </div>
      </div>

    <!-- ==================================================================== -->
    <!-- TAB 7: ADMISSION ENQUIRY DESK -->
    <!-- ==================================================================== -->
    <?php elseif ($tab === 'Admission_Enquiry'): ?>
      <?php
      $enquiriesList = $db->query("SELECT * FROM `admission_enquiries` ORDER BY `id` DESC LIMIT 20")->fetchAll();
      ?>
      <div class="row g-4">
        <!-- Desk Settings Form with Sub-tabs -->
        <div class="col-lg-6">
          <div class="admission-card">
            <div class="admission-card-header">
              <div>
                <h6 class="fw-bold mb-0 text-dark"><i class="fa-solid fa-headset me-2 text-primary"></i> Page 7: Official Admission Enquiry Desk &amp; SEO</h6>
                <small class="text-muted">Helpline numbers, Campus Address, Contact Timing &amp; SEO Engine</small>
              </div>
              <span class="badge bg-primary-subtle text-primary fw-bold">Live in Database</span>
            </div>
            <div class="p-3 p-md-4">
              <form method="POST">
                <input type="hidden" name="action" value="save_enquiry">

                <!-- Sub-Pill Navigation -->
                <ul class="nav nav-pills nav-pills-custom gap-2 mb-4" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pill-enq-general-tab" data-bs-toggle="pill" data-bs-target="#pill-enq-general" type="button" role="tab">
                      <i class="fa-solid fa-sliders me-1.5"></i> Contact &amp; Desk Info
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pill-enq-seo-tab" data-bs-toggle="pill" data-bs-target="#pill-enq-seo" type="button" role="tab">
                      <i class="fa-solid fa-magnifying-glass me-1.5 text-info"></i> SEO &amp; Meta Details <span class="badge bg-info-subtle text-info ms-1">SEO</span>
                    </button>
                  </li>
                </ul>

                <div class="tab-content">
                  <!-- SUB-TAB 1: General Desk Info -->
                  <div class="tab-pane fade show active" id="pill-enq-general" role="tabpanel">
                    <div class="mb-3">
                      <label class="form-label fw-bold small text-dark">Page Title</label>
                      <input type="text" name="page_title" class="form-control" value="<?php echo htmlspecialchars($pageMeta['page_title'] ?? 'Admission Enquiry'); ?>" required>
                    </div>

                    <div class="mb-3">
                      <label class="form-label fw-bold small text-dark">Contact Heading</label>
                      <input type="text" name="contact_heading" class="form-control" value="<?php echo htmlspecialchars($pageMeta['heading'] ?? 'For Admission 2026-27 Enquiry Please Contact'); ?>" required>
                    </div>

                    <div class="mb-3">
                      <label class="form-label fw-bold small text-dark">Official Contact Numbers (One per line)</label>
                      <textarea name="phones_raw" class="form-control font-monospace" rows="5" required><?php echo htmlspecialchars($pageMeta['contact_phones'] ?? ''); ?></textarea>
                      <small class="text-muted">Enter each telephone or helpline number on a separate line.</small>
                    </div>

                    <div class="row g-3 mb-3">
                      <div class="col-md-6">
                        <label class="form-label fw-bold small text-dark">Office Timings</label>
                        <input type="text" name="timings" class="form-control" value="<?php echo htmlspecialchars($pageMeta['contact_timings'] ?? 'From 10:00 AM to 5:00 PM only'); ?>" required>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label fw-bold small text-dark">Official Enquiry Email</label>
                        <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($pageMeta['contact_email'] ?? 'info@sssutms.co.in'); ?>" required>
                      </div>
                    </div>

                    <div class="mb-4">
                      <label class="form-label fw-bold small text-dark">Campus Address</label>
                      <textarea name="address" class="form-control" rows="2" required><?php echo htmlspecialchars($pageMeta['contact_address'] ?? 'Opp. Oilfed Plant, Bhopal-Indore Road, Sehore (M.P), Pin - 466001'); ?></textarea>
                    </div>
                  </div>

                  <!-- SUB-TAB 2: SEO Settings -->
                  <div class="tab-pane fade" id="pill-enq-seo" role="tabpanel">
                    <!-- Google SERP Snippet Preview -->
                    <div class="card mb-4 border-0 shadow-sm" style="background: #f8fafc; border: 1.5px solid #e2e8f0; border-radius: 14px;">
                      <div class="card-body p-4">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                          <h6 class="fw-bold text-dark mb-0"><i class="fa-brands fa-google text-danger me-2"></i>Google Search Result (SERP Live Preview)</h6>
                          <span class="badge bg-light text-secondary border px-3 py-1">Desktop &amp; Mobile SERP</span>
                        </div>
                        <div class="p-3 bg-white rounded border" style="max-width: 650px; font-family: arial, sans-serif;">
                          <div class="d-flex align-items-center gap-2 mb-1" style="font-size: 13px; color: #202124;">
                            <img src="../assets/images/logo/logo.jpg" alt="Google Favicon" width="18" height="18" class="rounded-circle border">
                            <div>
                              <span class="fw-semibold">Sri Satya Sai University</span>
                              <span class="text-muted ms-1" style="font-size: 12px;">https://sssutms.co.in › Admission › Admission_Enquiry</span>
                            </div>
                          </div>
                          <h5 id="seoPreviewTitleAdm" class="fw-normal mb-1 text-primary" style="color: #1a0dab !important; font-size: 20px; line-height: 1.3; cursor: pointer;">
                            <?php echo htmlspecialchars($defaultMetaTitle); ?>
                          </h5>
                          <p id="seoPreviewDescAdm" class="mb-0 text-muted" style="color: #4d5156 !important; font-size: 14px; line-height: 1.58;">
                            <?php echo htmlspecialchars($defaultMetaDesc); ?>
                          </p>
                        </div>
                      </div>
                    </div>

                    <div class="row g-3">
                      <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                          <label class="form-label small fw-bold mb-0">
                            <i class="fa-solid fa-heading text-primary me-1"></i> SEO Meta Title (Title Tag)
                          </label>
                          <small class="text-muted"><span id="metaTitleCountAdm">0</span> / 60 chars <span class="badge bg-secondary ms-1">Recommended: 50-60</span></small>
                        </div>
                        <input type="text" name="meta_title" id="seoInputTitleAdm" class="form-control" value="<?php echo htmlspecialchars($pageMeta['meta_title'] ?? ''); ?>" placeholder="e.g. Admission Enquiry & Helpline Desk | SSSUTMS" oninput="updateSeoPreviewAdm()">
                      </div>

                      <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                          <label class="form-label small fw-bold mb-0">
                            <i class="fa-solid fa-align-left text-success me-1"></i> SEO Meta Description
                          </label>
                          <small class="text-muted"><span id="metaDescCountAdm">0</span> / 160 chars <span class="badge bg-secondary ms-1">Recommended: 150-160</span></small>
                        </div>
                        <textarea name="meta_description" id="seoInputDescAdm" class="form-control" rows="3" placeholder="Get in touch with SSSUTMS Admission Helpdesk for counseling, admissions queries, and assistance..." oninput="updateSeoPreviewAdm()"><?php echo htmlspecialchars($pageMeta['meta_description'] ?? ''); ?></textarea>
                      </div>

                      <div class="col-md-6">
                        <label class="form-label small fw-bold">
                          <i class="fa-solid fa-tags text-warning me-1"></i> Target SEO Keywords
                        </label>
                        <input type="text" name="meta_keywords" class="form-control" value="<?php echo htmlspecialchars($pageMeta['meta_keywords'] ?? ''); ?>" placeholder="e.g. SSSUTMS Admission Helpline, Admission Contact Number, Sehore University Enquiry">
                      </div>

                      <div class="col-md-6">
                        <label class="form-label small fw-bold">
                          <i class="fa-solid fa-link text-info me-1"></i> Canonical URL Override
                        </label>
                        <input type="text" name="canonical_url" class="form-control" value="<?php echo htmlspecialchars($pageMeta['canonical_url'] ?? ''); ?>" placeholder="Leave blank for automatic canonical URL">
                      </div>

                      <div class="col-12">
                        <label class="form-label small fw-bold">
                          <i class="fa-solid fa-image text-danger me-1"></i> Social Sharing Preview Image (og:image)
                        </label>
                        <div class="input-group">
                          <span class="input-group-text bg-light"><i class="fa fa-share-nodes"></i></span>
                          <input type="text" name="og_image" class="form-control" value="<?php echo htmlspecialchars($pageMeta['og_image'] ?? 'assets/images/logo/logo.jpg'); ?>">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="d-flex align-items-center justify-content-between pt-3 border-top mt-4 flex-wrap gap-2">
                  <div class="small text-muted">
                    <i class="fa fa-circle-check text-success me-1"></i> Helpline details &amp; SEO tags update instantly on the public website.
                  </div>
                  <button type="submit" class="btn btn-primary px-5 py-2 fw-bold shadow-sm">
                    <i class="fa-solid fa-floppy-disk me-1"></i> Save Enquiry Desk Info in MySQL
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <!-- Live Submissions from Enquiry Form -->
        <div class="col-lg-6">
          <div class="admission-card">
            <div class="admission-card-header">
              <div>
                <h6 class="fw-bold mb-0 text-dark"><i class="fa-solid fa-users me-2 text-primary"></i> Real-Time Online Leads (<?php echo count($enquiriesList); ?> Recent)</h6>
                <small class="text-muted">Submitted via public Admission Enquiry form into `admission_enquiries` table</small>
              </div>
            </div>
            <div class="table-responsive" style="max-height: 620px; overflow-y: auto;">
              <table class="table table-modern table-sm align-middle">
                <thead>
                  <tr>
                    <th>Lead Details</th>
                    <th>Course &amp; City</th>
                    <th style="width: 90px;">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (empty($enquiriesList)): ?>
                    <tr><td colspan="3" class="text-center py-4 text-muted">No student enquiries recorded yet. Test submissions will appear here instantly!</td></tr>
                  <?php else: ?>
                    <?php foreach ($enquiriesList as $lead): ?>
                      <tr>
                        <td>
                          <div class="fw-bold text-dark"><?php echo htmlspecialchars($lead['name']); ?></div>
                          <div class="small text-muted"><i class="fa-solid fa-phone me-1"></i> <?php echo htmlspecialchars($lead['phone']); ?></div>
                          <div class="extra-small text-muted"><i class="fa-solid fa-envelope me-1"></i> <?php echo htmlspecialchars($lead['email']); ?></div>
                        </td>
                        <td>
                          <div class="small fw-semibold text-primary"><?php echo htmlspecialchars($lead['course']); ?></div>
                          <div class="extra-small text-muted"><?php echo htmlspecialchars($lead['city'] ?? ''); ?></div>
                        </td>
                        <td>
                          <form method="POST">
                            <input type="hidden" name="action" value="update_lead_status">
                            <input type="hidden" name="lead_id" value="<?php echo $lead['id']; ?>">
                            <select name="new_status" class="form-select form-select-sm py-0 px-1 font-monospace" style="font-size: 0.75rem;" onchange="this.form.submit()">
                              <option value="New" <?php echo $lead['status'] === 'New' ? 'selected' : ''; ?>>New</option>
                              <option value="Contacted" <?php echo $lead['status'] === 'Contacted' ? 'selected' : ''; ?>>Contacted</option>
                              <option value="Enrolled" <?php echo $lead['status'] === 'Enrolled' ? 'selected' : ''; ?>>Enrolled</option>
                              <option value="Closed" <?php echo $lead['status'] === 'Closed' ? 'selected' : ''; ?>>Closed</option>
                            </select>
                          </form>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>

  </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
function updateSeoPreviewAdm() {
  const titleInput = document.getElementById('seoInputTitleAdm');
  const descInput = document.getElementById('seoInputDescAdm');
  const previewTitle = document.getElementById('seoPreviewTitleAdm');
  const previewDesc = document.getElementById('seoPreviewDescAdm');
  const titleCount = document.getElementById('metaTitleCountAdm');
  const descCount = document.getElementById('metaDescCountAdm');

  if (titleInput && previewTitle) {
    const val = titleInput.value.trim();
    previewTitle.textContent = val || titleInput.placeholder || 'Admission - Sri Satya Sai University (SSSUTMS)';
    if (titleCount) {
      titleCount.textContent = titleInput.value.length;
      titleCount.className = titleInput.value.length > 60 ? 'text-danger fw-bold' : (titleInput.value.length >= 40 ? 'text-success fw-bold' : 'text-muted');
    }
  }

  if (descInput && previewDesc) {
    const val = descInput.value.trim();
    previewDesc.textContent = val || descInput.placeholder || 'Explore Admission at Sri Satya Sai University of Technology and Medical Sciences (SSSUTMS), Sehore.';
    if (descCount) {
      descCount.textContent = descInput.value.length;
      descCount.className = descInput.value.length > 160 ? 'text-danger fw-bold' : (descInput.value.length >= 120 ? 'text-success fw-bold' : 'text-muted');
    }
  }
}
document.addEventListener('DOMContentLoaded', updateSeoPreviewAdm);
</script>
</body>
</html>
