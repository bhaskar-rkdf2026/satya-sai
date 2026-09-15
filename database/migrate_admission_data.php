<?php
/**
 * Database Migration Script for Admission Cell
 * Migrates data/admission_data.json into MySQL `satya_sai_db`
 */

require_once __DIR__ . '/../config.php';

echo "=== SSSUTMS Admission Cell Database Migration ===\n";

$dbHost = 'localhost';
$dbName = 'satya_sai_db';
$dbUser = 'root';
$dbPass = '';

try {
    // 1. Connect and Ensure Database Exists
    $pdo = new PDO("mysql:host=$dbHost;charset=utf8mb4", $dbUser, $dbPass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `$dbName` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    $pdo->exec("USE `$dbName`");
    echo "✓ Database `$dbName` connected.\n";

    // 2. Create Schema Tables
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS `admission_pages` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `page_key` VARCHAR(100) UNIQUE NOT NULL,
            `page_title` VARCHAR(255) NULL,
            `heading` VARCHAR(255) NULL,
            `subheading` VARCHAR(255) NULL,
            `lead_title` VARCHAR(255) NULL,
            `description` LONGTEXT NULL,
            `primary_file_url` VARCHAR(500) NULL,
            `primary_file_label` VARCHAR(255) NULL,
            `image_url` VARCHAR(500) NULL,
            `bank_name` VARCHAR(255) NULL,
            `account_name` VARCHAR(255) NULL,
            `account_number` VARCHAR(100) NULL,
            `ifsc_code` VARCHAR(50) NULL,
            `branch` VARCHAR(255) NULL,
            `online_banking_url` VARCHAR(500) NULL,
            `contact_email` VARCHAR(255) NULL,
            `contact_address` TEXT NULL,
            `contact_timings` VARCHAR(255) NULL,
            `contact_phones` TEXT NULL,
            `instructions` LONGTEXT NULL,
            `extra_data` LONGTEXT NULL,
            `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
    ");
    echo "✓ Table `admission_pages` created/verified.\n";

    $pdo->exec("
        CREATE TABLE IF NOT EXISTS `admission_notices` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `title` VARCHAR(500) NOT NULL,
            `url` VARCHAR(500) NOT NULL,
            `notice_date` DATE NULL,
            `is_new` TINYINT(1) NOT NULL DEFAULT 0,
            `session` VARCHAR(50) NOT NULL DEFAULT '2026-27',
            `category` VARCHAR(100) NOT NULL DEFAULT 'Admission',
            `display_order` INT NOT NULL DEFAULT 0,
            `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
    ");
    echo "✓ Table `admission_notices` created/verified.\n";

    $pdo->exec("
        CREATE TABLE IF NOT EXISTS `admission_fees` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `sno` INT NOT NULL DEFAULT 0,
            `course` VARCHAR(255) NOT NULL,
            `tuition` VARCHAR(100) NOT NULL,
            `eligibility` TEXT NULL,
            `duration` VARCHAR(100) NULL,
            `display_order` INT NOT NULL DEFAULT 0,
            `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
    ");
    echo "✓ Table `admission_fees` created/verified.\n";

    $pdo->exec("
        CREATE TABLE IF NOT EXISTS `admission_bank_charges` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `instrument` VARCHAR(255) NOT NULL,
            `charges` VARCHAR(255) NOT NULL,
            `display_order` INT NOT NULL DEFAULT 0
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
    ");
    echo "✓ Table `admission_bank_charges` created/verified.\n";

    $pdo->exec("
        CREATE TABLE IF NOT EXISTS `admission_brochures` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `title` VARCHAR(255) NOT NULL,
            `department` VARCHAR(255) NOT NULL DEFAULT 'General',
            `file_url` VARCHAR(500) NOT NULL,
            `file_type` VARCHAR(50) NOT NULL DEFAULT 'PDF',
            `thumbnail_url` VARCHAR(500) NULL,
            `is_featured` TINYINT(1) NOT NULL DEFAULT 0,
            `display_order` INT NOT NULL DEFAULT 0,
            `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
    ");
    echo "✓ Table `admission_brochures` created/verified.\n";

    $pdo->exec("
        CREATE TABLE IF NOT EXISTS `admission_enquiries` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `lead_id` VARCHAR(50) NULL,
            `name` VARCHAR(255) NOT NULL,
            `phone` VARCHAR(50) NOT NULL,
            `email` VARCHAR(255) NOT NULL,
            `city` VARCHAR(255) NULL,
            `school` VARCHAR(255) NULL,
            `course` VARCHAR(255) NULL,
            `message` TEXT NULL,
            `status` VARCHAR(50) NOT NULL DEFAULT 'New',
            `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
    ");
    echo "✓ Table `admission_enquiries` created/verified.\n";

    // 3. Load existing JSON Data
    $jsonFile = __DIR__ . '/../data/admission_data.json';
    if (!file_exists($jsonFile)) {
        throw new Exception("admission_data.json file not found at $jsonFile");
    }
    $jsonData = json_decode(file_get_contents($jsonFile), true);
    if (!is_array($jsonData)) {
        throw new Exception("Failed to parse admission_data.json");
    }

    // A. Migrate Page Settings (`admission_pages`)
    $pagesStmt = $pdo->prepare("
        INSERT INTO `admission_pages` (
            `page_key`, `page_title`, `heading`, `subheading`, `lead_title`, `description`,
            `primary_file_url`, `primary_file_label`, `image_url`, `bank_name`, `account_name`,
            `account_number`, `ifsc_code`, `branch`, `online_banking_url`, `contact_email`,
            `contact_address`, `contact_timings`, `contact_phones`, `instructions`, `extra_data`
        ) VALUES (
            :page_key, :page_title, :heading, :subheading, :lead_title, :description,
            :primary_file_url, :primary_file_label, :image_url, :bank_name, :account_name,
            :account_number, :ifsc_code, :branch, :online_banking_url, :contact_email,
            :contact_address, :contact_timings, :contact_phones, :instructions, :extra_data
        ) ON DUPLICATE KEY UPDATE
            `page_title` = VALUES(`page_title`),
            `heading` = VALUES(`heading`),
            `subheading` = VALUES(`subheading`),
            `lead_title` = VALUES(`lead_title`),
            `description` = VALUES(`description`),
            `primary_file_url` = VALUES(`primary_file_url`),
            `primary_file_label` = VALUES(`primary_file_label`),
            `image_url` = VALUES(`image_url`),
            `bank_name` = VALUES(`bank_name`),
            `account_name` = VALUES(`account_name`),
            `account_number` = VALUES(`account_number`),
            `ifsc_code` = VALUES(`ifsc_code`),
            `branch` = VALUES(`branch`),
            `online_banking_url` = VALUES(`online_banking_url`),
            `contact_email` = VALUES(`contact_email`),
            `contact_address` = VALUES(`contact_address`),
            `contact_timings` = VALUES(`contact_timings`),
            `contact_phones` = VALUES(`contact_phones`),
            `instructions` = VALUES(`instructions`),
            `extra_data` = VALUES(`extra_data`)
    ");

    // 1) AdmissionProcedure
    $ap = $jsonData['AdmissionProcedure'] ?? [];
    $pagesStmt->execute([
        ':page_key' => 'AdmissionProcedure',
        ':page_title' => $ap['page_title'] ?? 'Admission Procedure',
        ':heading' => 'Admission Procedure',
        ':subheading' => 'Guidelines & Admission Regulations',
        ':lead_title' => $ap['lead_title'] ?? 'Admission Procedure',
        ':description' => $ap['description'] ?? '',
        ':primary_file_url' => $ap['pdf_link'] ?? '',
        ':primary_file_label' => $ap['pdf_label'] ?? 'Admission Procedure (Click Here)',
        ':image_url' => $ap['image'] ?? 'assets/images/admission/AdmissionProcedure_img_0.jpg',
        ':bank_name' => null, ':account_name' => null, ':account_number' => null, ':ifsc_code' => null,
        ':branch' => null, ':online_banking_url' => null, ':contact_email' => null, ':contact_address' => null,
        ':contact_timings' => null, ':contact_phones' => null, ':instructions' => null, ':extra_data' => null
    ]);

    // 2) AdmissionNotice Page Metadata
    $an = $jsonData['AdmissionNotice'] ?? [];
    $pagesStmt->execute([
        ':page_key' => 'AdmissionNotice',
        ':page_title' => $an['page_title'] ?? 'Admission Notice',
        ':heading' => $an['heading'] ?? 'Admission Notice (2026-27)',
        ':subheading' => $an['subtitle'] ?? 'Official Notifications, Circulars & Entrance Exam Schedules',
        ':lead_title' => null, ':description' => null,
        ':primary_file_url' => null, ':primary_file_label' => null, ':image_url' => null,
        ':bank_name' => null, ':account_name' => null, ':account_number' => null, ':ifsc_code' => null,
        ':branch' => null, ':online_banking_url' => null, ':contact_email' => null, ':contact_address' => null,
        ':contact_timings' => null, ':contact_phones' => null, ':instructions' => null, ':extra_data' => null
    ]);

    // 3) FeesStructure Page Metadata
    $fs = $jsonData['FeesStructure'] ?? [];
    $pagesStmt->execute([
        ':page_key' => 'FeesStructure',
        ':page_title' => $fs['page_title'] ?? 'Fee Structure and Fees Refund Policy',
        ':heading' => 'Fee Structure and Fees Refund Policy',
        ':subheading' => $fs['subtitle'] ?? 'Eligibility Criteria & Fees Structure',
        ':lead_title' => null, ':description' => null,
        ':primary_file_url' => $fs['refund_policy_pdf'] ?? '',
        ':primary_file_label' => $fs['refund_policy_label'] ?? 'Download Official Fees Refund Policy (PDF)',
        ':image_url' => null,
        ':bank_name' => null, ':account_name' => null, ':account_number' => null, ':ifsc_code' => null,
        ':branch' => null, ':online_banking_url' => null, ':contact_email' => null, ':contact_address' => null,
        ':contact_timings' => null, ':contact_phones' => null, ':instructions' => null, ':extra_data' => null
    ]);

    // 4) UniversityAccountDetail
    $uad = $jsonData['UniversityAccountDetail'] ?? [];
    $pagesStmt->execute([
        ':page_key' => 'UniversityAccountDetail',
        ':page_title' => $uad['page_title'] ?? 'University Account Detail',
        ':heading' => $uad['bank_title'] ?? 'Bank Detail',
        ':subheading' => 'Fee Payment & Banking Details',
        ':lead_title' => null,
        ':description' => $uad['bank_desc'] ?? '',
        ':primary_file_url' => null, ':primary_file_label' => null,
        ':image_url' => $uad['qr_image'] ?? '',
        ':bank_name' => $uad['bank_name'] ?? 'Punjab National Bank',
        ':account_name' => $uad['account_name'] ?? 'SSSUTMS',
        ':account_number' => $uad['account_number'] ?? '7162002100000506',
        ':ifsc_code' => $uad['ifsc_code'] ?? 'PUNB0716200',
        ':branch' => $uad['branch'] ?? 'SSSUTMS Campus, Sehore (M.P.)',
        ':online_banking_url' => $uad['online_banking_url'] ?? 'https://sssutms.payjix.com/',
        ':contact_email' => null, ':contact_address' => null,
        ':contact_timings' => null, ':contact_phones' => null, ':instructions' => null, ':extra_data' => null
    ]);

    // 5) Brochures
    $br = $jsonData['Brochures'] ?? [];
    $pagesStmt->execute([
        ':page_key' => 'Brochures',
        ':page_title' => $br['page_title'] ?? 'Brochures',
        ':heading' => $br['heading'] ?? 'ADMISSION BROCHURE',
        ':subheading' => 'Download Official Prospectus & Program Brochures',
        ':lead_title' => null, ':description' => null,
        ':primary_file_url' => $br['prospectus_pdf'] ?? '',
        ':primary_file_label' => $br['prospectus_label'] ?? 'Prospectus (Click Here)',
        ':image_url' => $br['cover_image'] ?? 'assets/images/admission/Brochures_img_2.png',
        ':bank_name' => null, ':account_name' => null, ':account_number' => null, ':ifsc_code' => null,
        ':branch' => null, ':online_banking_url' => null, ':contact_email' => null, ':contact_address' => null,
        ':contact_timings' => null, ':contact_phones' => null, ':instructions' => null,
        ':extra_data' => json_encode([
            'folder_icon' => $br['folder_icon'] ?? 'assets/images/admission/Brochures_img_0.png',
            'arrow_icon' => $br['arrow_icon'] ?? 'assets/images/admission/Brochures_img_1.png'
        ])
    ]);

    // 6) AdmissionRegistration
    $ar = $jsonData['AdmissionRegistration'] ?? [];
    $instructionsText = is_array($ar['instructions'] ?? null) ? implode("\n", $ar['instructions']) : ($ar['instructions'] ?? '');
    $pagesStmt->execute([
        ':page_key' => 'AdmissionRegistration',
        ':page_title' => $ar['page_title'] ?? 'Admission Registration',
        ':heading' => $ar['heading'] ?? 'Admission Registration (Session 2026-27)',
        ':subheading' => 'Online Registration & Candidate Application Flow',
        ':lead_title' => null, ':description' => null,
        ':primary_file_url' => $ar['epravesh_url'] ?? 'https://www.sssutms.co.in/erp/Student/Registration/Index/ojdZaOYsXtpmswGfjiVVww%3d%3d',
        ':primary_file_label' => $ar['epravesh_label'] ?? 'E-Pravesh 2026 (Online Registration & Enquiry Form)',
        ':image_url' => null,
        ':bank_name' => null, ':account_name' => null, ':account_number' => null, ':ifsc_code' => null,
        ':branch' => null, ':online_banking_url' => null, ':contact_email' => null, ':contact_address' => null,
        ':contact_timings' => null, ':contact_phones' => null,
        ':instructions' => $instructionsText,
        ':extra_data' => null
    ]);

    // 7) Admission_Enquiry
    $ae = $jsonData['Admission_Enquiry'] ?? [];
    $phonesText = is_array($ae['phone_numbers'] ?? null) ? implode("\n", $ae['phone_numbers']) : ($ae['phone_numbers'] ?? '');
    $pagesStmt->execute([
        ':page_key' => 'Admission_Enquiry',
        ':page_title' => $ae['page_title'] ?? 'Admission Enquiry',
        ':heading' => $ae['contact_heading'] ?? 'For Admission 2026-27 Enquiry Please Contact',
        ':subheading' => 'Get Guidance, Counseling & Course Information from Academic Experts',
        ':lead_title' => null, ':description' => null,
        ':primary_file_url' => null, ':primary_file_label' => null, ':image_url' => null,
        ':bank_name' => null, ':account_name' => null, ':account_number' => null, ':ifsc_code' => null,
        ':branch' => null, ':online_banking_url' => null,
        ':contact_email' => $ae['email'] ?? 'info@sssutms.co.in',
        ':contact_address' => $ae['address'] ?? 'Opp. Oilfed Plant, Bhopal-Indore Road, Sehore (M.P), Pin - 466001',
        ':contact_timings' => $ae['timings'] ?? 'From 10:00 AM to 5:00 PM only',
        ':contact_phones' => $phonesText,
        ':instructions' => null,
        ':extra_data' => null
    ]);
    echo "✓ 7 Page configurations migrated into `admission_pages`.\n";

    // B. Migrate Notices (`admission_notices`)
    $pdo->exec("TRUNCATE TABLE `admission_notices`");
    $notices = $jsonData['AdmissionNotice']['notices'] ?? [];
    $noticeStmt = $pdo->prepare("
        INSERT INTO `admission_notices` (`id`, `title`, `url`, `notice_date`, `is_new`, `session`, `category`, `display_order`)
        VALUES (:id, :title, :url, :notice_date, :is_new, :session, :category, :display_order)
    ");
    $nCount = 0;
    foreach ($notices as $idx => $n) {
        $noticeStmt->execute([
            ':id' => $n['id'] ?? ($idx + 1000),
            ':title' => $n['title'] ?? '',
            ':url' => $n['url'] ?? '#',
            ':notice_date' => !empty($n['date']) ? $n['date'] : date('Y-m-d'),
            ':is_new' => !empty($n['is_new']) ? 1 : 0,
            ':session' => $n['session'] ?? '2026-27',
            ':category' => $n['category'] ?? 'Admission',
            ':display_order' => $idx + 1
        ]);
        $nCount++;
    }
    echo "✓ $nCount Notices migrated into `admission_notices`.\n";

    // C. Migrate Fees (`admission_fees`)
    $pdo->exec("TRUNCATE TABLE `admission_fees`");
    $fees = $jsonData['FeesStructure']['fees'] ?? [];
    $feeStmt = $pdo->prepare("
        INSERT INTO `admission_fees` (`id`, `sno`, `course`, `tuition`, `eligibility`, `duration`, `display_order`)
        VALUES (:id, :sno, :course, :tuition, :eligibility, :duration, :display_order)
    ");
    $fCount = 0;
    foreach ($fees as $idx => $f) {
        $feeStmt->execute([
            ':id' => $f['id'] ?? ($idx + 3000),
            ':sno' => $f['sno'] ?? ($idx + 1),
            ':course' => $f['course'] ?? '',
            ':tuition' => $f['tuition'] ?? '',
            ':eligibility' => $f['eligibility'] ?? '',
            ':duration' => $f['duration'] ?? '',
            ':display_order' => $idx + 1
        ]);
        $fCount++;
    }
    echo "✓ $fCount Fee rows migrated into `admission_fees`.\n";

    // D. Migrate Bank Charges (`admission_bank_charges`)
    $pdo->exec("TRUNCATE TABLE `admission_bank_charges`");
    $charges = $jsonData['UniversityAccountDetail']['charges'] ?? [];
    $chargeStmt = $pdo->prepare("
        INSERT INTO `admission_bank_charges` (`instrument`, `charges`, `display_order`)
        VALUES (:instrument, :charges, :display_order)
    ");
    $cCount = 0;
    foreach ($charges as $idx => $c) {
        $chargeStmt->execute([
            ':instrument' => $c['instrument'] ?? '',
            ':charges' => $c['charges'] ?? '',
            ':display_order' => $idx + 1
        ]);
        $cCount++;
    }
    echo "✓ $cCount Bank charge rows migrated into `admission_bank_charges`.\n";

    // E. Migrate Brochures (`admission_brochures`)
    $pdo->exec("TRUNCATE TABLE `admission_brochures`");
    $brochuresStmt = $pdo->prepare("
        INSERT INTO `admission_brochures` (`title`, `department`, `file_url`, `file_type`, `thumbnail_url`, `is_featured`, `display_order`)
        VALUES (:title, :department, :file_url, :file_type, :thumbnail_url, :is_featured, :display_order)
    ");
    
    // Main Prospectus
    $brochuresStmt->execute([
        ':title' => 'University Information & Admission Prospectus (2026-27)',
        ':department' => 'University Central',
        ':file_url' => $br['prospectus_pdf'] ?? 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/MAIN_19112025_0435.pdf',
        ':file_type' => 'PDF',
        ':thumbnail_url' => $br['cover_image'] ?? 'assets/images/admission/Brochures_img_2.png',
        ':is_featured' => 1,
        ':display_order' => 1
    ]);

    // Add key faculty brochures
    $facultyBrochures = [
        ['Engineering & Technology Programs Brochure', 'Faculty of Engineering & Technology', 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Admission/adm_procedure.pdf', 'assets/images/logo/logo.jpg'],
        ['Ayurvedic (BAMS) & Homeopathic (BHMS) Medical Brochure', 'Medical & Ayush Sciences', 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Fees_Refund_Policy_04012025_0322.pdf', 'assets/images/logo/logo.jpg'],
        ['Pharmacy & Paramedical Sciences Course Prospectus', 'School of Pharmacy', 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/MAIN_19112025_0435.pdf', 'assets/images/logo/logo.jpg']
    ];
    $bCount = 1;
    foreach ($facultyBrochures as $fb) {
        $bCount++;
        $brochuresStmt->execute([
            ':title' => $fb[0],
            ':department' => $fb[1],
            ':file_url' => $fb[2],
            ':file_type' => 'PDF',
            ':thumbnail_url' => $fb[3],
            ':is_featured' => 0,
            ':display_order' => $bCount
        ]);
    }
    echo "✓ $bCount Brochures seeded into `admission_brochures`.\n";

    echo "\n=== MIGRATION COMPLETED SUCCESSFULLY! ===\n";
} catch (Exception $e) {
    echo "MIGRATION ERROR: " . $e->getMessage() . "\n";
    exit(1);
}
