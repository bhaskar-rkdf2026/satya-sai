<?php
$page_title = 'Public Self Disclosure - SSSUTMS';
$banner_title = 'Public Self Disclosure';
$banner_category = 'About';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?>

<style>
.disclosure-page-section {
  background-color: #f8fafc;
}
.disclosure-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
  overflow: hidden;
}
.disclosure-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2rem;
  position: relative;
}
.disclosure-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #2563eb, #3b82f6);
}
.disclosure-table {
  margin-bottom: 0;
}
.disclosure-table thead th {
  background-color: #0b2545;
  color: #ffffff;
  font-weight: 600;
  text-transform: uppercase;
  font-size: 0.85rem;
  letter-spacing: 0.5px;
  border: none;
  padding: 14px 16px;
}
.disclosure-table tbody tr:nth-child(even) {
  background-color: #f8fafc;
}
.disclosure-table tbody td {
  padding: 14px 16px;
  vertical-align: middle;
  border-color: #e2e8f0;
  color: #334155;
  font-size: 0.92rem;
}
.disclosure-cat-badge {
  display: inline-block;
  width: 32px;
  height: 32px;
  line-height: 32px;
  border-radius: 50%;
  background: #2563eb;
  color: #ffffff;
  font-weight: 700;
  text-align: center;
  font-size: 0.95rem;
}
.disclosure-btn {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  padding: 6px 14px;
  font-size: 0.82rem;
  font-weight: 600;
  border-radius: 8px;
  text-decoration: none;
  transition: all 0.2s ease;
}
.disclosure-btn-primary {
  background-color: rgba(37, 99, 235, 0.1);
  color: #2563eb;
  border: 1px solid rgba(37, 99, 235, 0.2);
}
.disclosure-btn-primary:hover {
  background-color: #2563eb;
  color: #ffffff;
}
.disclosure-btn-danger {
  background-color: rgba(220, 38, 38, 0.1);
  color: #dc2626;
  border: 1px solid rgba(220, 38, 38, 0.2);
}
.disclosure-btn-danger:hover {
  background-color: #dc2626;
  color: #ffffff;
}
</style>

<section class="subpage-main-section disclosure-page-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        
        <!-- Main Card Wrapper -->
        <div class="disclosure-main-card mb-4">
          
          <!-- Banner Header -->
          <div class="disclosure-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge bg-primary text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill">
                <i class="fa-solid fa-file-shield me-1"></i> UGC &amp; Statutory Compliance
              </span>
              <h3 class="fw-bold text-white mb-0 fs-3">PUBLIC SELF-DISCLOSURE</h3>
            </div>
          </div>

          <!-- Body Container -->
          <div class="p-4">
            
            <div class="table-responsive">
              <table class="table table-bordered align-middle disclosure-table">
                <thead>
                  <tr>
                    <th style="width: 70px;" class="text-center">Sr. No.</th>
                    <th style="width: 220px;">Category Title</th>
                    <th style="width: 320px;">Information Parameter / Subtitle</th>
                    <th style="width: 200px;" class="text-center">Action / Links</th>
                  </tr>
                </thead>
                <tbody>
                  
                  <!-- Category A: About HEI -->
                  <tr>
                    <td rowspan="11" class="text-center align-middle bg-light"><span class="disclosure-cat-badge">A</span></td>
                    <td rowspan="4" class="fw-bold text-dark align-middle">About HEI</td>
                    <td>Overview &amp; University Background</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>About/Background.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Details</span> <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>Act and Statutes or MoA</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>assets/pdf/Fianal_Statute_12.pdf" target="_blank" class="disclosure-btn disclosure-btn-danger">
                        <i class="fa-solid fa-file-pdf"></i> <span>Statute (PDF)</span>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>Institutional Development Plan (IDP)</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>About/Institutional_Development_Plan.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Details</span> <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>Constituent Units &amp; Affiliated Colleges</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>Academic/ConstituentUnits.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Details</span> <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </td>
                  </tr>

                  <tr>
                    <td rowspan="7" class="fw-bold text-dark align-middle">Accreditation / Ranking Status</td>
                    <td>NAAC Accreditation (SSR &amp; Criteria)</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>Academic/NAAC/SSR.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Details</span> <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>NBA Accreditation</td>
                    <td class="text-center text-muted fw-semibold">N/A</td>
                  </tr>
                  <tr>
                    <td>NIRF Ranking &amp; Data</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>Research/NIRF.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Details</span> <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>Recognition &amp; Approvals (UGC 2f, Statutory Bodies)</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>About/ApprovalsAndOrdinances/Approvals.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Details</span> <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>Annual Reports</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>About/Annual_Reports.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Details</span> <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>Annual Accounts &amp; Audit Reports</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>About/UniversityOfficials/Audit_Report.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Details</span> <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>Sponsoring Body / Society Details</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>About/PromotingSociety.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Details</span> <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </td>
                  </tr>

                  <!-- Category B: Administration -->
                  <tr>
                    <td rowspan="16" class="text-center align-middle bg-light"><span class="disclosure-cat-badge">B</span></td>
                    <td rowspan="16" class="fw-bold text-dark align-middle">Administration &amp; Officers Profile</td>
                    <td>
                      <strong>Chancellor:</strong> Mr. Siddharth Kapoor<br />
                      <small class="text-secondary"><i class="fa-solid fa-envelope me-1"></i>chancellor@sssutms.co.in | <i class="fa-solid fa-phone me-1"></i>07562-292203</small>
                    </td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>About/UniversityOfficials/Chancellor.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Profile</span> <i class="fa-solid fa-user me-1"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td><strong>Pro Chancellor:</strong> N/A</td>
                    <td class="text-center text-muted fw-semibold">N/A</td>
                  </tr>
                  <tr>
                    <td>
                      <strong>Vice-Chancellor:</strong> Dr. Mukesh Tiwari<br />
                      <small class="text-secondary"><i class="fa-solid fa-envelope me-1"></i>vc@sssutms.co.in | <i class="fa-solid fa-phone me-1"></i>+91-9826293590</small>
                    </td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>About/UniversityOfficials/ViceChancellor.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Profile</span> <i class="fa-solid fa-user me-1"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td><strong>Pro-Vice Chancellor:</strong> N/A</td>
                    <td class="text-center text-muted fw-semibold">N/A</td>
                  </tr>
                  <tr>
                    <td>
                      <strong>Registrar:</strong> Dr. Hemant Sharma<br />
                      <small class="text-secondary"><i class="fa-solid fa-envelope me-1"></i>registrar@sssutms.co.in | <i class="fa-solid fa-phone me-1"></i>+91-9826512726</small>
                    </td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>About/UniversityOfficials/Registrar.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Profile</span> <i class="fa-solid fa-user me-1"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <strong>Deputy Registrar:</strong> Dr. Kanchan Shrivastav<br />
                      <small class="text-secondary"><i class="fa-solid fa-envelope me-1"></i>deputyregistrar@sssutms.co.in | <i class="fa-solid fa-phone me-1"></i>+91-7477039825</small>
                    </td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>About/UniversityOfficials/DeputyRegistrar.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Profile</span> <i class="fa-solid fa-user me-1"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td><strong>Principals / Directors</strong></td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>About/UniversityOfficials/HeadOfTheDepartment.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Details</span> <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <strong>Finance Officer:</strong> Dr. Vimal Nath<br />
                      <small class="text-secondary"><i class="fa-solid fa-envelope me-1"></i>fo@sssutms.co.in | <i class="fa-solid fa-phone me-1"></i>07562-292205</small>
                    </td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>About/UniversityOfficials/Finance_Officer.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Profile</span> <i class="fa-solid fa-user me-1"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <strong>Controller of Examination:</strong> Dr. Sanjay Rathore<br />
                      <small class="text-secondary"><i class="fa-solid fa-envelope me-1"></i>exam@sssutms.co.in | <i class="fa-solid fa-phone me-1"></i>+91-9630560005</small>
                    </td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>About/UniversityOfficials/Exam_Controller.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Profile</span> <i class="fa-solid fa-user me-1"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <strong>Chief Vigilance Officer:</strong> Mr. H. S. Raghuvanshi<br />
                      <small class="text-secondary"><i class="fa-solid fa-envelope me-1"></i>info@sssutms.co.in | <i class="fa-solid fa-phone me-1"></i>+91-9425039197</small>
                    </td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>About/UniversityOfficials/Chief_Vigilance_Officer.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Profile</span> <i class="fa-solid fa-user me-1"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <strong>Ombudsperson:</strong> Prof.(Dr.) Varsha Namdeo<br />
                      <small class="text-secondary"><i class="fa-solid fa-envelope me-1"></i>info@sssutms.co.in | <i class="fa-solid fa-phone me-1"></i>07562-292204</small>
                    </td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>Academic/Committee/GrievanceRedressal.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Details</span> <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>Board of Governors / Governing Body</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>About/UniversityOfficials/GoverningBody.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Details</span> <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>Board of Management</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>About/UniversityOfficials/BoardOfManagement.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Details</span> <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>Academic Council</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>About/UniversityOfficials/AcademicCouncil.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Details</span> <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>Finance Committee</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>About/UniversityOfficials/FinanceCommittee.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Details</span> <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>Board of Studies</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>About/UniversityOfficials/Board_Of_Studies.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Details</span> <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </td>
                  </tr>

                  <!-- Category C: Academics -->
                  <tr>
                    <td rowspan="9" class="text-center align-middle bg-light"><span class="disclosure-cat-badge">C</span></td>
                    <td rowspan="9" class="fw-bold text-dark align-middle">Academics</td>
                    <td>Details of Academic Programs</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>Academic/FacultiesAndDepartments/EngineeringAndTechnology.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Details</span> <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>Academic Calendar</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>Academic/AcademicCalendar.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Details</span> <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>Statutes / Ordinances Pertaining to Academics</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>Academic/HEIHandbook.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Details</span> <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>Schools / Institutes / Departments</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>About/Institutes.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Details</span> <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>Department-wise Faculty &amp; Staff Details</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>Academic/Faculty_Staff_Details.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Details</span> <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>UGC Recognized ODL / Online Programs</td>
                    <td class="text-center text-muted fw-semibold">N/A</td>
                  </tr>
                  <tr>
                    <td>Internal Quality Assurance Cell (IQAC)</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>Academic/IQACCell.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Details</span> <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>Central Library Facilities</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>About/Amenities/Library.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Details</span> <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>Academic Collaborations &amp; MoUs</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>About/NCC/MOU.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Details</span> <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </td>
                  </tr>

                  <!-- Category D: Admissions & Fee -->
                  <tr>
                    <td rowspan="3" class="text-center align-middle bg-light"><span class="disclosure-cat-badge">D</span></td>
                    <td rowspan="3" class="fw-bold text-dark align-middle">Admissions &amp; Fee</td>
                    <td>Prospectus &amp; Fee Structure for Programs</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>Admission/Brochures.php" target="_blank" class="disclosure-btn disclosure-btn-primary mb-1">
                        <span>Prospectus</span> <i class="fa-solid fa-arrow-right-long"></i>
                      </a><br />
                      <a href="<?php echo BASE_URL; ?>Admission/FeesStructure.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>Fee Structure</span> <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>Admission Process &amp; Guidelines</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>Admission/AdmissionProcedure.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Details</span> <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>Fee Refund Policy</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>assets/pdf/Fees_Refund_Policy_04012025_0322.pdf" target="_blank" class="disclosure-btn disclosure-btn-danger">
                        <i class="fa-solid fa-file-pdf"></i> <span>Policy (PDF)</span>
                      </a>
                    </td>
                  </tr>

                  <!-- Category E: Research -->
                  <tr>
                    <td rowspan="3" class="text-center align-middle bg-light"><span class="disclosure-cat-badge">E</span></td>
                    <td rowspan="3" class="fw-bold text-dark align-middle">Research</td>
                    <td>Research &amp; Development Cell (R&amp;D)</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>Research/RAndDCell.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Details</span> <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>Incubation Centre &amp; Entrepreneurship Cell</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>Academic/Committee/IncubationCell.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Details</span> <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>Central Instrumentation &amp; Research Facilities</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>About/Central_Facilities.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Details</span> <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </td>
                  </tr>

                  <!-- Category F: Student Life -->
                  <tr>
                    <td rowspan="12" class="text-center align-middle bg-light"><span class="disclosure-cat-badge">F</span></td>
                    <td rowspan="12" class="fw-bold text-dark align-middle">Student Life &amp; Amenities</td>
                    <td>Sports &amp; Fitness Facilities</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>About/Central_Facilities.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Details</span> <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>National Cadet Corps (NCC)</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>About/NCC/Activity.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Details</span> <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>National Service Scheme (NSS)</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>About/NSS.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Details</span> <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>Hostel Facilities (Boys &amp; Girls)</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>About/Amenities/Hostel.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Details</span> <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>Training &amp; Placement Cell</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>Academic/TrainingAndPlacement/TrainingAndPlacementCell.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Details</span> <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>Student Grievance Redressal Committee (SGRC)</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>Academic/Committee/GrievanceRedressal.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Details</span> <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>Health &amp; Medical Facilities</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>About/Amenities/MedicalFacility.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Details</span> <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>Internal Complaints Committee (ICC)</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>Academic/Committee/InternalComplaintCommittee.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Details</span> <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>Anti-Ragging Cell &amp; Squad</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>Academic/Committee/AntiRagging.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Details</span> <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>Equal Opportunity Cell</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>Academic/Committee/Equal_Opportunity_Cell.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Details</span> <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>Socio-Economically Disadvantaged Groups Cell (SEDG)</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>Academic/Committee/Equal_Opportunity_Cell.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Details</span> <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>Facilities for Differently-Abled (Barrier Free)</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>Download/Barrier_Free_Environment.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Details</span> <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </td>
                  </tr>

                  <!-- Category G: Alumni -->
                  <tr>
                    <td class="text-center align-middle bg-light"><span class="disclosure-cat-badge">G</span></td>
                    <td class="fw-bold text-dark align-middle">Alumni</td>
                    <td>Alumni Association &amp; Portal</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>Download/Alumni.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Details</span> <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </td>
                  </tr>

                  <!-- Category H: Information Corner -->
                  <tr>
                    <td rowspan="9" class="text-center align-middle bg-light"><span class="disclosure-cat-badge">H</span></td>
                    <td rowspan="9" class="fw-bold text-dark align-middle">Information Corner</td>
                    <td>Right to Information (RTI) Cell &amp; CPIO</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>Download/RTI.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Details</span> <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>Circulars and Notices</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>index.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Details</span> <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>Announcements &amp; Notifications</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>index.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Details</span> <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>Newsletters &amp; Press Releases</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>index.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Details</span> <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>Events &amp; Achievements Showcase</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>index.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Details</span> <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>Job Openings &amp; Recruitment</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>Career/index.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Details</span> <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>Reservation Roster Guidelines</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>Career/index.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Details</span> <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>Study in India Portal</td>
                    <td class="text-center">
                      <a href="https://www.studyinindia.gov.in/admission/registrations" target="_blank" rel="noopener" class="disclosure-btn disclosure-btn-primary">
                        <span>Portal Link</span> <i class="fa-solid fa-arrow-up-right-from-square"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>International Students Admission Facilities</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>assets/pdf/INTERNATIONAL_ADMISSION_05_07122024_0637.pdf" target="_blank" class="disclosure-btn disclosure-btn-danger">
                        <i class="fa-solid fa-file-pdf"></i> <span>Details (PDF)</span>
                      </a>
                    </td>
                  </tr>

                  <!-- Category I: Picture Gallery -->
                  <tr>
                    <td class="text-center align-middle bg-light"><span class="disclosure-cat-badge">I</span></td>
                    <td class="fw-bold text-dark align-middle">Picture Gallery</td>
                    <td>Campus Media &amp; Image Gallery</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>index.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Gallery</span> <i class="fa-solid fa-images"></i>
                      </a>
                    </td>
                  </tr>

                  <!-- Category J: Contact Us -->
                  <tr>
                    <td rowspan="2" class="text-center align-middle bg-light"><span class="disclosure-cat-badge">J</span></td>
                    <td rowspan="2" class="fw-bold text-dark align-middle">Contact Us</td>
                    <td>Official Phone Numbers, Email &amp; Location Map</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>Contact.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>Contact Page</span> <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>University Telephone Directory</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>Contact.php" target="_blank" class="disclosure-btn disclosure-btn-primary">
                        <span>View Directory</span> <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </td>
                  </tr>

                </tbody>
              </table>
            </div>

          </div>
        </div>

      </div>

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>