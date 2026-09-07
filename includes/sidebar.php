<?php
/**
 * Universal Modern Sidebar Component
 * Auto-detects current section (About, Academic, Examination, Research, Admission, Download)
 */
$current_uri = $_SERVER['PHP_SELF'];
$section = 'About';

if (strpos($current_uri, '/Academic/') !== false) {
    $section = 'Academic';
} elseif (strpos($current_uri, '/Examination/') !== false) {
    $section = 'Examination';
} elseif (strpos($current_uri, '/Research/') !== false) {
    $section = 'Research';
} elseif (strpos($current_uri, '/Admission/') !== false) {
    $section = 'Admission';
} elseif (strpos($current_uri, '/Download/') !== false) {
    $section = 'Download';
} elseif (strpos($current_uri, '/About/') !== false) {
    $section = 'About';
}

$sidebar_menus = [
    'About' => [
        'title' => 'About SSSUTMS',
        'icon' => 'fa-university',
        'links' => [
            'Background' => 'About/Background.php',
            'Institutes' => 'About/Institutes.php',
            'University Officials' => 'About/UniversityOfficials/Chancellor.php',
            'Promoting Society' => 'About/PromotingSociety.php',
            'Statutory Approvals' => 'About/ApprovalsAndOrdinances/Approvals.php',
            'Ordinances' => 'About/ApprovalsAndOrdinances/Ordinances.php',
            'Vision & Mission' => 'About/VisionAndMission.php',
            'Core Values' => 'About/CoreValues.php',
            'Best Practices' => 'About/BestPractices.php',
            'Campus Amenities' => 'About/Amenities/Transportation.php',
            'Central Facilities' => 'About/Central_Facilities.php',
            'Public Self Disclosure' => 'About/Public_Self_Disclosure.php',
            'Annual Reports' => 'About/Annual_Reports.php'
        ]
    ],
    'Academic' => [
        'title' => 'Academic Portals',
        'icon' => 'fa-graduation-cap',
        'links' => [
            'Faculties & Departments' => 'Academic/FacultiesAndDepartments/EngineeringAndTechnology.php',
            'Ph.D. Research Program' => 'Academic/PHD.php',
            'Academic Calendar' => 'Academic/AcademicCalendar.php',
            'Statutory Committees' => 'Academic/Committee/AntiRagging.php',
            'Scholarships & Aid' => 'Academic/Scholarship.php',
            'Constituent Units' => 'Academic/ConstituentUnits.php',
            'Academic Activities' => 'Academic/Activities/ExpertLectures.php',
            'Training & Placement' => 'Academic/TrainingAndPlacement/TrainingAndPlacementCell.php',
            'IQAC Quality Cell' => 'Academic/IQACCell.php',
            'Mandatory Disclosures' => 'Academic/MandatoryDisclosures.php',
            'NAAC SSR & Criteria' => 'Academic/NAAC/SSR.php',
            'NIRF Ranking' => 'Academic/NIRF.php',
            'Faculty & Staff Details' => 'Academic/Faculty_Staff_Details.php'
        ]
    ],
    'Examination' => [
        'title' => 'Examination Cell',
        'icon' => 'fa-file-lines',
        'links' => [
            'Entrance Exam Alert (CEET)' => 'Examination/EntranceExamAlert.php',
            'Exam Notifications' => 'Examination/ExamNotifications.php',
            'Examination Schedule' => 'Examination/ExamSchedule.php',
            'Semester Results' => 'Examination/Results.php',
            'Marksheet Verification' => 'verify-marksheet.php',
            'Examination Interface' => 'Examination/Interface.php'
        ]
    ],
    'Research' => [
        'title' => 'Research & Innovation',
        'icon' => 'fa-flask',
        'links' => [
            'Director (R&D)' => 'Research/Director_Research_And_Development.php',
            'R & D Cell' => 'Research/RAndDCell.php',
            'Council For Research' => 'Research/CouncilForResearch.php',
            'Research Promotion Policy' => 'Research/ResearchPromotionPolicy.php',
            'Consultancy Services' => 'Research/ConsultancyServices.php',
            'Patents & Publications' => 'Research/Patents.php',
            'Collaborations & MoUs' => 'Research/CollaborationandMou.php',
            'Institution Innovation Council (IIC)' => 'Research/Iic_Cell.php',
            'E-Resources Portal' => 'Research/E-Resources.php',
            'UG/PG Scholars Projects' => 'Research/UGAndPGScholarsProject.php',
            'NPTEL Local Chapter' => 'Research/NPTEL.php'
        ]
    ],
    'Admission' => [
        'title' => 'Admissions 2026-27',
        'icon' => 'fa-id-card',
        'links' => [
            'Online Registration (E-Pravesh)' => 'Admission/AdmissionRegistration.php',
            'Admission Notice' => 'Admission/AdmissionNotice.php',
            'Admission Procedure' => 'AdmissionProcedure.php',
            'Fee Structure' => 'Admission/FeesStructure.php',
            'Bank Account Details' => 'Admission/UniversityAccountDetail.php',
            'Information Brochure' => 'Admission/Brochures.php',
            'Admission Enquiry Form' => 'Admission/Admission_Enquiry.php'
        ]
    ],
    'Download' => [
        'title' => 'Downloads & Syllabus',
        'icon' => 'fa-download',
        'links' => [
            'Outcome Based Curriculum (OBE)' => 'Download/OutcomeBasedCurriculum/Engineering.php',
            'Curriculum Schemes' => 'Download/Scheme/BE.php',
            'Course Syllabus' => 'Download/Syllabus/BE.php',
            'Ph.D. Award Notifications' => 'Download/NotificationOfPhdAward.php',
            'Downloadable Forms' => 'Download/Forms.php',
            'E-Content Portal' => 'Download/E-Content.php',
            'Alumni Association' => 'Download/Alumni.php',
            'Right to Information (RTI)' => 'Download/RTI.php',
            'Barrier Free Environment' => 'Download/Barrier_Free_Environment.php',
            'University Events' => 'EVENTS.php'
        ]
    ]
];

$active_menu = isset($sidebar_menus[$section]) ? $sidebar_menus[$section] : $sidebar_menus['About'];
?>

<div class="sidebar-wrapper sticky-top" style="top: 80px; z-index: 10;">
  
  <!-- Category Navigation Card -->
  <div class="card border-0 shadow-sm rounded-3 mb-4 overflow-hidden">
    <div class="card-header text-white py-3" style="background: var(--primary-gradient) !important;">
      <h6 class="mb-0 fw-bold d-flex align-items-center gap-2">
        <i class="fa <?php echo $active_menu['icon']; ?>" style="color: var(--gold);"></i> <?php echo $active_menu['title']; ?>
      </h6>
    </div>
    <div class="list-group list-group-flush sidebar-nav-list p-2">
      <?php foreach ($active_menu['links'] as $label => $link): ?>
        <?php
          $is_active = (strpos($current_uri, basename($link)) !== false);
        ?>
        <a href="<?php echo BASE_URL . $link; ?>" class="list-group-item list-group-item-action border-0 rounded-2 py-2 px-3 d-flex align-items-center justify-content-between <?php echo $is_active ? 'active fw-bold' : 'text-dark'; ?>">
          <span style="font-size: 13px;"><?php echo htmlspecialchars($label); ?></span>
          <i class="fa fa-angle-right small opacity-75"></i>
        </a>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- Admission Fast Enquiry Card -->
  <div class="card border-0 shadow-sm rounded-3 mb-4 overflow-hidden" style="background: var(--primary-gradient); color: #fff;">
    <div class="card-body p-4 text-center">
      <div class="mb-2">
        <span class="badge px-3 py-1 rounded-pill fw-bold" style="font-size: 11px; background: rgba(255,118,38,0.15); border: 1px solid rgba(255,118,38,0.4); color: var(--gold);">ADMISSION OPEN 2026-27</span>
      </div>
      <h5 class="fw-bold text-white mb-2">Need Guidance?</h5>
      <p class="small text-white-50 mb-3">Speak with our academic counseling team for course eligibility & fee details.</p>

      <div class="p-2 rounded bg-white bg-opacity-10 mb-3">
        <div class="small fw-bold" style="color: var(--gold);"><i class="fa fa-phone-volume me-1"></i> Admission Helpline</div>
        <div class="fw-bold fs-6 text-white">+91-7748900028 / 07562-292740</div>
      </div>

      <button type="button" class="btn w-100 fw-bold rounded-pill py-2 shadow-sm border-0" style="background: var(--accent-gradient); color: #241503;" data-bs-toggle="modal" data-bs-target="#enquiryModal">
        <i class="fa fa-comments me-1"></i> Quick Enquiry
      </button>
    </div>
  </div>

  <!-- Quick ERP Login Strip -->
  <div class="card border-0 shadow-sm rounded-3 p-3 bg-light d-flex flex-row align-items-center justify-content-between">
    <div>
      <h6 class="fw-bold text-dark mb-0" style="font-size: 13px;"><i class="fa fa-user-lock text-primary me-2"></i>ERP Student Portal</h6>
      <small class="text-muted">Attendance, Marks & Fees</small>
    </div>
    <a href="<?php echo BASE_URL; ?>erp-login.php" class="btn btn-sm btn-outline-primary rounded-pill px-3 fw-semibold">Login</a>
  </div>

</div>
