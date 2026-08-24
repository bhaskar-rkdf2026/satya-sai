<!-- Main Navigation Bar (100% Exact Menuzord Tree with Clean Single Arrow & Sleek Dropdowns) -->
<nav class="navbar navbar-expand-lg main-navbar sticky-top">
  <div class="container-fluid px-lg-5">
    
    <!-- Mobile Brand Display (Visible on small screens) -->
    <a class="navbar-brand text-white fw-bold d-lg-none d-flex align-items-center gap-2 py-1" href="<?php echo BASE_URL; ?>index.php">
      <img src="<?php echo BASE_URL; ?>assets/images/logo/logo.jpg" alt="SSSUTMS" height="28" class="rounded-circle border border-light">
      <span style="font-size: 13.5px; letter-spacing: 0.5px;">SSSUTMS PORTAL</span>
    </a>

    <!-- Hamburger Mobile Toggler Button -->
    <button class="navbar-toggler text-white border-0 py-1 px-2" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbarContent" aria-controls="mainNavbarContent" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fa fa-bars fs-5 text-white"></i>
    </button>

    <div class="collapse navbar-collapse" id="mainNavbarContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 menuzord-menu">
        
        <!-- 1. Home -->
        <li class="nav-item">
          <a class="nav-link <?php echo ($current_page == 'index' || $current_page == '') ? 'active' : ''; ?>" href="<?php echo BASE_URL; ?>index.php">
            Home
          </a>
        </li>

        <!-- 2. About Dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            About <span class="indicator"><i class="fa fa-angle-down"></i></span>
          </a>
          <ul class="dropdown-menu shadow border-0">
            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>About/Background.php">Background</a></li>
            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>About/Institutes.php">Institutes</a></li>
            
            <!-- University Officials Submenu -->
            <li class="dropdown-submenu">
              <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">
                <span>University Officials</span> <i class="fa fa-angle-right ms-2"></i>
              </a>
              <ul class="dropdown-menu dropdown-submenu-menu shadow border-0">
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>About/UniversityOfficials/Chancellor.php">Chancellor</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>About/UniversityOfficials/ViceChancellor.php">Vice Chancellor</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>About/UniversityOfficials/Registrar.php">Registrar</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>About/UniversityOfficials/Finance_Officer.php">Finance Officer</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>About/UniversityOfficials/DeputyRegistrar.php">Deputy Registrar</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>About/UniversityOfficials/Exam_Controller.php">Exam Controller</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>About/UniversityOfficials/Chief_Vigilance_Officer.php">Chief Vigilance Officer</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>About/UniversityOfficials/GoverningBody.php">Governing Body</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>About/UniversityOfficials/BoardOfManagement.php">Board Of Management</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>About/UniversityOfficials/Board_Of_Studies.php">Board of Studies</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>About/UniversityOfficials/AcademicCouncil.php">Academic Council</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>About/UniversityOfficials/FinanceCommittee.php">Finance Committee</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>About/UniversityOfficials/StandingCommittee.php">Standing Committee</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>About/UniversityOfficials/STATUTES.php">STATUTES</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>About/UniversityOfficials/Audit_Report.php">AUDIT REPORT</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>About/UniversityOfficials/Dean.php">Dean</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>About/UniversityOfficials/HeadOfTheDepartment.php">Head Of The Department</a></li>
              </ul>
            </li>

            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>About/PromotingSociety.php">Promoting Society</a></li>

            <!-- Approvals & Ordinances Submenu -->
            <li class="dropdown-submenu">
              <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">
                <span>Approvals &amp; Ordinances</span> <i class="fa fa-angle-right ms-2"></i>
              </a>
              <ul class="dropdown-menu dropdown-submenu-menu shadow border-0">
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>About/ApprovalsAndOrdinances/Approvals.php">Approvals</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>About/ApprovalsAndOrdinances/Ordinances.php">Ordinances</a></li>
              </ul>
            </li>

            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>About/VisionAndMission.php">Vision &amp; Mission</a></li>
            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>About/CoreValues.php">Core Values</a></li>
            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>About/BestPractices.php">Best Practices</a></li>

            <!-- Amenities Submenu -->
            <li class="dropdown-submenu">
              <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">
                <span>Amenities</span> <i class="fa fa-angle-right ms-2"></i>
              </a>
              <ul class="dropdown-menu dropdown-submenu-menu shadow border-0">
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>About/Amenities/Transportation.php">Transportation</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>About/Amenities/Hostel.php">Hostel</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>About/Amenities/Library.php">Library</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>About/Amenities/MedicalFacility.php">Medical Facility</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>About/Amenities/GuestHouse.php">Guest House</a></li>
              </ul>
            </li>

            <!-- MOU Submenu -->
            <li class="dropdown-submenu">
              <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">
                <span>MOU</span> <i class="fa fa-angle-right ms-2"></i>
              </a>
              <ul class="dropdown-menu dropdown-submenu-menu shadow border-0">
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>About/NCC/MOU.php">NCC MOU</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>About/NCC/Activity.php">Activity</a></li>
              </ul>
            </li>

            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>About/Public_Self_Disclosure.php">Public Self Disclosure</a></li>
            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>About/Central_Facilities.php">Central Facilities</a></li>
            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>About/Institutional_Development_Plan.php">Institutional Development Plan</a></li>
            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>About/Annual_Reports.php">Annual Reports</a></li>
            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>About/NSS.php">NSS</a></li>
          </ul>
        </li>

        <!-- 3. Academic Dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Academic <span class="indicator"><i class="fa fa-angle-down"></i></span>
          </a>
          <ul class="dropdown-menu shadow border-0">
            
            <!-- Faculties Submenu -->
            <li class="dropdown-submenu">
              <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">
                <span>Faculties And Departments</span> <i class="fa fa-angle-right ms-2"></i>
              </a>
              <ul class="dropdown-menu dropdown-submenu-menu shadow border-0">
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Academic/FacultiesAndDepartments/EngineeringAndTechnology.php">Engineering And Technology</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Academic/FacultiesAndDepartments/Pharmacy.php">Pharmacy</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Academic/FacultiesAndDepartments/Education.php">Education</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Academic/FacultiesAndDepartments/Management.php">Management</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Academic/FacultiesAndDepartments/Design.php">Design</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Academic/FacultiesAndDepartments/HumanitiesAndLanguages.php">Humanities And Languages</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Academic/FacultiesAndDepartments/ComputerScienceAndApplication.php">Computer Science And Application</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Academic/FacultiesAndDepartments/Commerce.php">Commerce</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Academic/FacultiesAndDepartments/Science.php">Science</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Academic/FacultiesAndDepartments/Ayurveda.php">Ayurveda</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Academic/FacultiesAndDepartments/Law.php">Law</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Academic/FacultiesAndDepartments/Homeopathy.php">Homeopathy</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Academic/FacultiesAndDepartments/Paramedical.php">Paramedical</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Academic/FacultiesAndDepartments/Nursing.php">Nursing</a></li>
              </ul>
            </li>

            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Academic/PHD.php">PHD</a></li>
            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Academic/AcademicCalendar.php">Academic Calendar</a></li>

            <!-- Committee Submenu -->
            <li class="dropdown-submenu">
              <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">
                <span>Committee</span> <i class="fa fa-angle-right ms-2"></i>
              </a>
              <ul class="dropdown-menu dropdown-submenu-menu shadow border-0">
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Academic/Committee/AntiRagging.php">Anti Ragging</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Academic/Committee/ProctorialBoard.php">Proctorial Board</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Academic/Committee/InternalComplaintCommittee.php">Internal Complaint</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Academic/Committee/GrievanceRedressal.php">Grievance Redressal</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Academic/Committee/ForSCST.php">For SC-ST</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Academic/Committee/EDC.php">EDC</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Academic/Committee/InternationalHigherEducationCell.php">International Higher Education Cell</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Academic/Committee/IncubationCell.php">Incubation Cell</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Academic/Committee/Equal_Opportunity_Cell.php">Equal Opportunity Cell</a></li>
              </ul>
            </li>

            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Academic/Scholarship.php">Scholarship</a></li>
            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Academic/ConstituentUnits.php">Constituent Units</a></li>

            <!-- Activities Submenu -->
            <li class="dropdown-submenu">
              <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">
                <span>Activities</span> <i class="fa fa-angle-right ms-2"></i>
              </a>
              <ul class="dropdown-menu dropdown-submenu-menu shadow border-0">
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Academic/Activities/ExpertLectures.php">Expert Lectures</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Academic/Activities/Webinar.php">Webinar</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Academic/Activities/IndustrialVisits.php">Industrial Visits</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Academic/Activities/Events.php">Events</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Academic/Activities/FDP.php">FDP</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Academic/Activities/WorkshopAndSeminars.php">Workshop &amp; Seminars</a></li>
              </ul>
            </li>

            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Academic/HEIHandbook.php">HEI Handbook</a></li>

            <!-- Training & Placement Submenu -->
            <li class="dropdown-submenu">
              <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">
                <span>Training &amp; Placement</span> <i class="fa fa-angle-right ms-2"></i>
              </a>
              <ul class="dropdown-menu dropdown-submenu-menu shadow border-0">
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Academic/TrainingAndPlacement/TrainingAndPlacementCell.php">Training And Placement Cell</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Academic/TrainingAndPlacement/TrainingPartner.php">Training Partner</a></li>
              </ul>
            </li>

            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Academic/IQACCell.php">IQAC Cell</a></li>
            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Academic/MandatoryDisclosures.php">Mandatory Disclosures</a></li>

            <!-- NAAC Submenu -->
            <li class="dropdown-submenu">
              <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">
                <span>NAAC</span> <i class="fa fa-angle-right ms-2"></i>
              </a>
              <ul class="dropdown-menu dropdown-submenu-menu shadow border-0">
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Academic/NAAC/SSR.php">SSR</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Academic/NAAC/CriteriaOne.php">Criteria-1</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Academic/NAAC/CriteriaTwo.php">Criteria-2</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Academic/NAAC/CriteriaThree.php">Criteria-3</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Academic/NAAC/CriteriaFour.php">Criteria-4</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Academic/NAAC/CriteriaFive.php">Criteria-5</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Academic/NAAC/CriteriaSix.php">Criteria-6</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Academic/NAAC/CriteriaSeven.php">Criteria-7</a></li>
              </ul>
            </li>

            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Academic/NIRF.php">NIRF</a></li>
            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Academic/Faculty_Staff_Details.php">Faculty Staff Details</a></li>
          </ul>
        </li>

        <!-- 4. Examination Dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Examination <span class="indicator"><i class="fa fa-angle-down"></i></span>
          </a>
          <ul class="dropdown-menu shadow border-0">
            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Examination/EntranceExamAlert.php">Entrance Exam Alert</a></li>
            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Examination/ExamNotifications.php">Exam Notifications</a></li>
            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Examination/ExamSchedule.php">Exam Schedule</a></li>
            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Examination/Results.php">Results</a></li>
            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Examination/Interface.php">Interface</a></li>
          </ul>
        </li>

        <!-- 5. Research Dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Research <span class="indicator"><i class="fa fa-angle-down"></i></span>
          </a>
          <ul class="dropdown-menu shadow border-0">
            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Research/Director_Research_And_Development.php">Director (R&amp;D)</a></li>
            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Research/RAndDCell.php">R &amp; D Cell</a></li>
            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Research/CouncilForResearch.php">Council For Research</a></li>
            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Research/ResearchPromotionPolicy.php">Research Promotion Policy</a></li>
            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Research/ConsultancyServices.php">Consultancy Services</a></li>
            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Research/Patents.php">Patents</a></li>
            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Research/CollaborationandMou.php">Collaboration &amp; Mou</a></li>
            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Research/Iic_Cell.php">IIC Cell</a></li>
            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Research/E-Resources.php">E-Resources</a></li>
            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Research/Exposition.php">Exposition</a></li>
            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Research/UGAndPGScholarsProject.php">UG &amp; PG Scholars Project</a></li>
            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Research/NPTEL.php">NPTEL</a></li>
          </ul>
        </li>

        <!-- 6. Admission Dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Admission <span class="indicator"><i class="fa fa-angle-down"></i></span>
          </a>
          <ul class="dropdown-menu shadow border-0">
            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Admission/Admission_Enquiry.php">Admission Enquiry</a></li>
            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Admission/AdmissionNotice.php">Admission Notice</a></li>
            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Admission/AdmissionProcedure.php">Admission Procedure</a></li>
            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Admission/FeesStructure.php">Fees Structure</a></li>
            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Admission/UniversityAccountDetail.php">University Account Detail</a></li>
            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Admission/Brochures.php">Brochures</a></li>
            <li><a class="dropdown-item fw-bold text-primary" href="<?php echo BASE_URL; ?>Admission/AdmissionRegistration.php">Admission Registration</a></li>
          </ul>
        </li>

        <!-- 7. Download Dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Download <span class="indicator"><i class="fa fa-angle-down"></i></span>
          </a>
          <ul class="dropdown-menu shadow border-0">
            
            <!-- Outcome Based Curriculum Submenu -->
            <li class="dropdown-submenu">
              <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">
                <span>Outcome Based Curriculum</span> <i class="fa fa-angle-right ms-2"></i>
              </a>
              <ul class="dropdown-menu dropdown-submenu-menu shadow border-0">
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Download/OutcomeBasedCurriculum/Engineering.php">Engineering</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Download/OutcomeBasedCurriculum/Pharma.php">Pharmacy</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Download/OutcomeBasedCurriculum/Education.php">Education</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Download/OutcomeBasedCurriculum/Physical_Education.php">Physical Education</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Download/OutcomeBasedCurriculum/Management.php">Management</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Download/OutcomeBasedCurriculum/Computer_Application.php">Computer Application</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Download/OutcomeBasedCurriculum/BHMCT.php">BHMCT</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Download/OutcomeBasedCurriculum/Science.php">Science</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Download/OutcomeBasedCurriculum/Life_Science.php">Life Science</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Download/OutcomeBasedCurriculum/Arts_And_Humanities.php">Arts And Humanities</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Download/OutcomeBasedCurriculum/Commerce.php">Commerce</a></li>
              </ul>
            </li>

            <!-- Scheme Submenu -->
            <li class="dropdown-submenu">
              <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">
                <span>Scheme</span> <i class="fa fa-angle-right ms-2"></i>
              </a>
              <ul class="dropdown-menu dropdown-submenu-menu shadow border-0">
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Download/Scheme/BE.php">BE</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Download/Scheme/Pharmacy.php">Pharmacy</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Download/Scheme/MTech.php">MTech</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Download/Scheme/BHMCT.php">BHMCT</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Download/Scheme/MBA.php">MBA</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Download/Scheme/MCA.php">MCA</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Download/Scheme/Education.php">Education</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Download/Scheme/Physical_Education.php">Physical Education</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Download/Scheme/BScHonsAG.php">B.Sc.(Hons.) (Ag)</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Download/Scheme/BHMS.php">BHMS</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Download/Scheme/UTD.php">UTD</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Download/Scheme/Paramedical.php">Paramedical</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Download/Scheme/Polytechnic_Engineering.php">POLYTECHNIC (ENGINEERING)</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Download/Scheme/BLibISc.php">B.Lib.I.Sc.</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Download/Scheme/Bachelor_Of_Laws_Llb.php">Bachelor of Laws (LL.B.)</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Download/Scheme/BScHMCS.php">B.Sc. [HMCS]</a></li>
              </ul>
            </li>

            <!-- Syllabus Submenu -->
            <li class="dropdown-submenu">
              <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">
                <span>Syllabus</span> <i class="fa fa-angle-right ms-2"></i>
              </a>
              <ul class="dropdown-menu dropdown-submenu-menu shadow border-0">
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Download/Syllabus/BE.php">B.E.</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Download/Syllabus/Pharmacy.php">pharmacy</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Download/Syllabus/MTech.php">M.Tech</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Download/Syllabus/Education.php">Education</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Download/Syllabus/BHMCT.php">B.H.M.C.T.</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Download/Syllabus/MBA.php">MBA</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Download/Syllabus/MCA.php">MCA</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Download/Syllabus/PhysicalEducation.php">Physical Education</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Download/Syllabus/BScHonsAG.php">B.Sc.(Hons.) (Ag)</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Download/Syllabus/BHMS.php">BHMS</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Download/Syllabus/UTD.php">UTD</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Download/Syllabus/Paramedical.php">Paramedical</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Download/Syllabus/Polytechnic_Engineering.php">Polytechnic (Engineering)</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Download/Syllabus/BLibISc.php">B.Lib.I.Sc.</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Download/Syllabus/Bacheloroflaws_Llb.php">Bachelor Of Laws (LL.B.)</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Download/Syllabus/BScHMCS.php">B.Sc. [HMCS]</a></li>
              </ul>
            </li>

            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Download/NotificationOfPhdAward.php">Notification Of Phd Award</a></li>
            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Download/Forms.php">Forms</a></li>
            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Download/E-Content.php">E-Content</a></li>
            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Download/Alumni.php">Alumni</a></li>
            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Download/RTI.php">RTI</a></li>
            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Download/Barrier_Free_Environment.php">Barrier Free Environment</a></li>
            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>EVENTS.php">EVENTS</a></li>
            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Announcements.php">Announcements</a></li>
            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>Download/NBADCS.php">NBADCS</a></li>
          </ul>
        </li>

        <!-- 8. Career -->
        <li class="nav-item">
          <a class="nav-link" href="<?php echo BASE_URL; ?>Career/index.php">
            Career
          </a>
        </li>

        <!-- 9. Contact -->
        <li class="nav-item">
          <a class="nav-link" href="<?php echo BASE_URL; ?>Contact.php">
            Contact
          </a>
        </li>

        <!-- 10. ITEP -->
        <li class="nav-item">
          <a class="nav-link" href="<?php echo BASE_URL; ?>ITEP/index.php">
            ITEP
          </a>
        </li>

        <!-- 11. Gallery -->
        <li class="nav-item">
          <a class="nav-link" href="<?php echo BASE_URL; ?>gallery.php">
            Gallery
          </a>
        </li>

      </ul>

      <!-- Right Action Button -->
      <div class="d-flex align-items-center gap-2 py-1 py-lg-0">
        <button type="button" class="btn btn-warning btn-sm fw-bold px-3 py-1 text-dark rounded-pill shadow-sm" style="font-size: 12px; background:#f4a261; border:none;" data-bs-toggle="modal" data-bs-target="#enquiryModal">
          <i class="fa fa-paper-plane me-1"></i> Quick Enquiry
        </button>
      </div>

    </div>
  </div>
</nav>
