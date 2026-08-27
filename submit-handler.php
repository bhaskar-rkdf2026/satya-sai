<?php
/**
 * AJAX & Form Submission Handler for SSSUTMS Portal
 */

header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/config.php';

$action = $_POST['action'] ?? $_GET['action'] ?? '';

// Detect if this is an AJAX request (fetch / XMLHttpRequest)
$isAjax = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) || 
          (isset($_SERVER['HTTP_ACCEPT']) && strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false) ||
          !empty($_SERVER['HTTP_SEC_FETCH_DEST']) && $_SERVER['HTTP_SEC_FETCH_DEST'] === 'empty';

if ($action === 'submit_inquiry') {
    $name = clean_input($_POST['name'] ?? '');
    $phone = clean_input($_POST['phone'] ?? '');
    $email = clean_input($_POST['email'] ?? '');
    $course = clean_input($_POST['course'] ?? '');
    $city = clean_input($_POST['city'] ?? '');
    $message = clean_input($_POST['message'] ?? '');

    if (empty($name) || empty($phone) || empty($email) || empty($course)) {
        echo json_encode(['status' => 'error', 'message' => 'Please fill in all mandatory fields (Name, Phone, Email, Course).']);
        exit;
    }

    $inquiries = get_json_data('inquiries.json', []);
    $newInquiry = [
        'id' => 'INQ-' . (1000 + count($inquiries) + 1),
        'name' => $name,
        'phone' => $phone,
        'email' => $email,
        'course' => $course,
        'city' => $city,
        'message' => $message,
        'created_at' => date('Y-m-d H:i:s'),
        'status' => 'New'
    ];

    array_unshift($inquiries, $newInquiry);
    save_json_data('inquiries.json', $inquiries);

    if ($isAjax) {
        echo json_encode([
            'status' => 'success',
            'message' => 'Thank you, <strong>' . htmlspecialchars($name) . '</strong>! Your admission enquiry has been submitted successfully. Reference ID: <strong>' . $newInquiry['id'] . '</strong>.'
        ]);
    } else {
        // HTML fallback: redirect back with success notice
        header('Location: ' . BASE_URL . 'index.php?enquiry=success&ref=' . urlencode($newInquiry['id']));
    }
    exit;
}

if ($action === 'submit_registration') {
    $name = clean_input($_POST['name'] ?? '');
    $father_name = clean_input($_POST['father_name'] ?? '');
    $email = clean_input($_POST['email'] ?? '');
    $phone = clean_input($_POST['phone'] ?? '');
    $course = clean_input($_POST['course'] ?? '');
    $gender = clean_input($_POST['gender'] ?? '');
    $dob = clean_input($_POST['dob'] ?? '');
    $category = clean_input($_POST['category'] ?? '');
    $state = clean_input($_POST['state'] ?? '');
    $district = clean_input($_POST['district'] ?? '');

    if (empty($name) || empty($father_name) || empty($email) || empty($phone) || empty($course)) {
        echo json_encode(['status' => 'error', 'message' => 'All mandatory fields must be completed.']);
        exit;
    }

    $registrations = get_json_data('registrations.json', []);
    $regNo = 'SSS-2026-' . str_pad(count($registrations) + 101, 4, '0', STR_PAD_LEFT);

    $newReg = [
        'reg_no' => $regNo,
        'name' => $name,
        'father_name' => $father_name,
        'email' => $email,
        'phone' => $phone,
        'course' => $course,
        'gender' => $gender,
        'dob' => $dob,
        'category' => $category,
        'state' => $state,
        'district' => $district,
        'status' => 'Submitted',
        'applied_date' => date('Y-m-d')
    ];

    array_unshift($registrations, $newReg);
    save_json_data('registrations.json', $registrations);

    echo json_encode([
        'status' => 'success',
        'reg_no' => $regNo,
        'message' => 'Application submitted successfully! Your Registration Number is <strong>' . $regNo . '</strong>.'
    ]);
    exit;
}

if ($action === 'verify_marksheet') {
    $enrollment = strtoupper(clean_input($_POST['enrollment_no'] ?? ''));
    $roll = strtoupper(clean_input($_POST['roll_no'] ?? ''));

    if (empty($enrollment) && empty($roll)) {
        echo json_encode(['status' => 'error', 'message' => 'Please enter Enrollment Number or Roll Number.']);
        exit;
    }

    // Verification Mock Matcher
    echo json_encode([
        'status' => 'success',
        'verified' => true,
        'data' => [
            'candidate_name' => 'Verified SSSUTMS Student',
            'enrollment_no' => $enrollment ?: 'SSS2023-9821',
            'roll_no' => $roll ?: '2023-BTECH-045',
            'program' => 'Bachelor of Technology (Computer Science)',
            'passing_year' => 'June 2026',
            'result_status' => 'PASSED (FIRST DIVISION WITH DISTINCTION)',
            'verification_stamp' => 'AUTHENTIC RECORD - SSSUTMS EXAMINATION CONTROLLER'
        ]
    ]);
    exit;
}

if ($isAjax) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid action requested.']);
} else {
    header('Location: ' . BASE_URL . 'index.php');
}
exit;
