<?php
$page_title = 'Eligibility Criteria & Fees Structure - Sri Satya Sai University of Technology & Medical Sciences';
$banner_title = 'Fees Structure';
$banner_category = 'Admission';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';

$refund_policy_pdf = BASE_URL . 'assets/pdf/Fees_Refund_Policy_04012025_0322.pdf';

// 100% Exact Live Website Data for all 42 Courses
$fee_courses = array (
  0 => array ('sno' => '1.', 'course' => 'BE', 'fee' => '54000', 'eligibility' => '10+2 (PCM) With 45% (UR), 40% (ST/SC/OBC)', 'duration' => '4 Yrs.'),
  1 => array ('sno' => '2.', 'course' => 'M. Tech.', 'fee' => '63000', 'eligibility' => 'BE/B.Tech./MCA With 50% (UR), 45% (ST/SC/OBC)', 'duration' => '2 Yrs.'),
  2 => array ('sno' => '3.', 'course' => 'B. Arch.', 'fee' => '65000', 'eligibility' => '10+2 (PCM) With 50% In Each Subject (UR/ST/SC/OBC)', 'duration' => '5 Yrs.'),
  3 => array ('sno' => '4.', 'course' => 'B. Design', 'fee' => '70000', 'eligibility' => '10+2 (Any Discipline ) With 45% (UR), 40% (ST/SC/OBC)', 'duration' => '4 Yrs.'),
  4 => array ('sno' => '5.', 'course' => 'MBA (Full Time)', 'fee' => '50000', 'eligibility' => 'Graduate In Any Discipline With 50% (UR), 45% (ST/SC/OBC)', 'duration' => '2 Yrs.'),
  5 => array ('sno' => '6.', 'course' => 'MCA', 'fee' => '40000', 'eligibility' => 'A Student Who Has Passed 10+2 Examination Of Secondary School Education Board, Bhopal With Mathematics As One Of The Subject At 10+2 Examinations Or Its Equivalent And Have Passed B.Sc / B.Com/ BCA. With 50% (UR), 45% (ST/SC/OBC)', 'duration' => '2 Yrs.'),
  6 => array ('sno' => '7.', 'course' => 'B. Pharma', 'fee' => '55000', 'eligibility' => '10+2 (PCM/PCB) With 45% (UR), 40% (ST/SC/OBC)', 'duration' => '4 Yrs.'),
  7 => array ('sno' => '8.', 'course' => 'M. Pharma', 'fee' => '154000', 'eligibility' => 'B. Pharma With 50% (UR), 45% (ST/SC/OBC)', 'duration' => '2 Yrs.'),
  8 => array ('sno' => '9.', 'course' => 'D. Pharma', 'fee' => '75000', 'eligibility' => '10+2 (PCM/PCB) With 45% (UR), 40% (ST/SC/OBC)', 'duration' => '2 Yrs.'),
  9 => array ('sno' => '10.', 'course' => 'B.Ed.', 'fee' => '41000', 'eligibility' => 'Graduate In Any Discipline With 50% (UR/OBC), 45% (ST/SC)', 'duration' => '2 Yrs.'),
  10 => array ('sno' => '11.', 'course' => 'B.A. B. Ed. (4Year Integrated Course)', 'fee' => '30000', 'eligibility' => '10+2 Any Discipline With 50% (UR), 45% (ST/SC/OBC)', 'duration' => '4 Yrs.'),
  11 => array ('sno' => '12.', 'course' => 'B.P. Ed.', 'fee' => '40000', 'eligibility' => 'Graduate In Any Discipline With 50% (UR/OBC/AI), 45% (ST/SC)', 'duration' => '2 Yrs.'),
  12 => array ('sno' => '13.', 'course' => 'B.P.E.S.', 'fee' => '41000', 'eligibility' => '10+2 Or Its Equivalent With 45%', 'duration' => '3 Yrs.'),
  13 => array ('sno' => '14.', 'course' => 'BHMCT', 'fee' => '62000', 'eligibility' => '10+2 Or Its Equivalent With 45% (UR), 40%(ST/SC/OBC)', 'duration' => '4 Yrs.'),
  14 => array ('sno' => '15.', 'course' => 'B.Sc. (Nursing)', 'fee' => '80000', 'eligibility' => '10+2 (PCB) With 50% (UR), 45% (ST/SC/OBC)', 'duration' => '4 Yrs.'),
  15 => array ('sno' => '16.', 'course' => 'BBA', 'fee' => '21000', 'eligibility' => '10+2 Or Its Equivalent With 40% (UR/OBC), 35% (ST/SC)', 'duration' => '3 Yrs.'),
  16 => array ('sno' => '17.', 'course' => 'BCA', 'fee' => '21000', 'eligibility' => '10+2 (PCM) Or Its Equivalent With 50% (UR/OBC), 45% (ST/SC)', 'duration' => '3 Yrs.'),
  17 => array ('sno' => '18.', 'course' => 'B.Sc.', 'fee' => '16000', 'eligibility' => '10+2 (PCM/PCB/Agri.) With 40% (UR), 33% (ST/SC/OBC)', 'duration' => '3 Yrs.'),
  18 => array ('sno' => '19.', 'course' => 'B.A.', 'fee' => '13000', 'eligibility' => '10+2 Or Its Equivalent With 40% (UR), 33% (ST/SC/OBC)', 'duration' => '3 Yrs.'),
  19 => array ('sno' => '20.', 'course' => 'B.Com.', 'fee' => '16000', 'eligibility' => '10+2 (PCM/PCB/Comm.) With 40% (UR), 33% (ST/SC/OBC)', 'duration' => '3 Yrs.'),
  20 => array ('sno' => '21.', 'course' => 'M.Sc.', 'fee' => '26000', 'eligibility' => 'B.Sc. (Hons) Maths/CS/IT/Physics/Chemistry/Biology As One Subject In B.Sc. With 40% (UR), 33% (ST/SC/OBC)', 'duration' => '2 Yrs.'),
  21 => array ('sno' => '22.', 'course' => 'M.A.', 'fee' => '26000', 'eligibility' => 'UG With 40% For All Categories', 'duration' => '2 Yrs.'),
  22 => array ('sno' => '23.', 'course' => 'M.COM.', 'fee' => '26000', 'eligibility' => 'B.COM Passed For All Categories', 'duration' => '2 Yrs.'),
  23 => array ('sno' => '24.', 'course' => 'PGDCA', 'fee' => '21000', 'eligibility' => 'A Student Who Has Passes 10+2 Examination Of Secondary School Education Board, Bhopal With Mathematics As One Of The Subject At 10+2 Examinations Or Its Equivalent And Have Passed BA/B.Sc / B.Com/ BCA. With 40% (UR), 33% (ST/SC/OBC)', 'duration' => '1 Yr.'),
  24 => array ('sno' => '25.', 'course' => 'Bachelor Of Physiotherapy', 'fee' => '42000', 'eligibility' => '10+2 (PCB) With 50% (UR), 45% (ST/SC/OBC)', 'duration' => '4½ Yrs.'),
  25 => array ('sno' => '26.', 'course' => 'Diploma In X-Ray Radiographer Technician', 'fee' => '30000', 'eligibility' => '10+2 (PCB) With 50% (UR), 45% (ST/SC/OBC)', 'duration' => '2 Yrs.'),
  26 => array ('sno' => '27.', 'course' => 'D. Pharma (Ayurved)', 'fee' => '40000', 'eligibility' => '10+2 (PCB) With 50% (UR), 45% (ST/SC/OBC)', 'duration' => '2 Yrs.'),
  27 => array ('sno' => '28.', 'course' => 'DMLT', 'fee' => '37000', 'eligibility' => '10+2 (PCB) With 50% (UR), 40% (ST/SC/OBC)', 'duration' => '2 Yrs.'),
  28 => array ('sno' => '29.', 'course' => 'Dialysis Technician', 'fee' => '40000', 'eligibility' => '10+2 (PCB) With 50% (UR), 45% (ST/SC/OBC)', 'duration' => '2 Yrs.'),
  29 => array ('sno' => '30.', 'course' => 'Diploma In Human Nutrition', 'fee' => '28000', 'eligibility' => '10+2 (PCB) With 50% (UR), 45% (ST/SC/OBC)', 'duration' => '2 Yrs.'),
  30 => array ('sno' => '31.', 'course' => 'Diploma In Blood Transfusion Technician', 'fee' => '38000', 'eligibility' => '10+2 (PCB) With 50% (UR), 45% (ST/SC/OBC)', 'duration' => '2 Yrs.'),
  31 => array ('sno' => '32.', 'course' => 'Diploma In Yoga', 'fee' => '30000', 'eligibility' => '10+2 (PCB) With 50% (UR), 45% (ST/SC/OBC)', 'duration' => '2 Yrs.'),
  32 => array ('sno' => '33.', 'course' => 'Medical Laboratory Technology [Haematology] MMLT]', 'fee' => '125000', 'eligibility' => 'BMLT With 50% For All Category', 'duration' => '2 Yrs.'),
  33 => array ('sno' => '34.', 'course' => 'Master Of Physiotherapy [MPT]', 'fee' => '120000', 'eligibility' => 'BPT With 50% For All Category', 'duration' => '2 Yrs.'),
  34 => array ('sno' => '35.', 'course' => 'B.Sc. (Hons.) Agriculture', 'fee' => '61000', 'eligibility' => '10+2 In PCM/PCB/ Agriculture With 45%', 'duration' => '4 Yrs.'),
  35 => array ('sno' => '36.', 'course' => 'B. Tech. (Dairy Technology)', 'fee' => '25000', 'eligibility' => '10+2 (PCM/PCB/Agri.) With 50% (UR),, 45% (OBC), 33% (ST/SC)', 'duration' => '4 Yrs.'),
  36 => array ('sno' => '37.', 'course' => 'Diploma(Engineering)', 'fee' => '30000', 'eligibility' => '10th Or Equivalent Examination Passed', 'duration' => '3 Yrs.'),
  37 => array ('sno' => '38.', 'course' => 'L.L.B.', 'fee' => '25600', 'eligibility' => 'Graduate In Any Discipline With 45% (UR/OBC), 40% (ST/SC)', 'duration' => '3 Yrs.'),
  38 => array ('sno' => '39.', 'course' => 'B.A.LL.B.', 'fee' => '22000', 'eligibility' => '10+2 Any Discipline With 45% (UR), 40% (ST/SC/OBC)', 'duration' => '5 Yrs.'),
  39 => array ('sno' => '40.', 'course' => 'B. Lib.', 'fee' => '15000', 'eligibility' => 'Graduate In Any Discipline', 'duration' => '1 Yr.'),
  40 => array ('sno' => '41.', 'course' => 'B.H.M.S.', 'fee' => '150000', 'eligibility' => '10+2 In PCB With Minimum 45% For SC/ST/OBC And 50% For UR', 'duration' => '5.5 Yrs.'),
  41 => array ('sno' => '42.', 'course' => 'B.A.M.S.', 'fee' => '247300', 'eligibility' => '10+2 In PCB With Minimum 45% For SC/ST/OBC And 50% For UR', 'duration' => '5.5 Yrs.')
);
?>

<style>
.fs-page {
  background-color: #f8fafc;
  font-family: 'Inter', system-ui, -apple-system, sans-serif;
}

.fs-main-card {
  background: #ffffff;
  border-radius: 16px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 4px 20px rgba(11, 37, 69, 0.04);
  overflow: hidden;
  margin-bottom: 2rem;
}

.fs-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2.25rem 2rem;
  position: relative;
}
.fs-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}

.fs-stat-chip {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 14px 16px;
  display: flex;
  align-items: center;
  gap: 12px;
  height: 100%;
  transition: all 0.25s ease;
  box-shadow: 0 2px 8px rgba(0,0,0,0.02);
}
.fs-stat-chip:hover {
  border-color: #f59e0b;
  box-shadow: 0 6px 16px rgba(11,37,69,0.08);
  transform: translateY(-2px);
}
.fs-stat-icon {
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

.fs-action-btn {
  background: #0b2545;
  color: #ffffff !important;
  font-weight: 700;
  font-size: 0.88rem;
  padding: 10px 18px;
  border-radius: 8px;
  display: inline-flex;
  align-items: center;
  gap: 8px;
  text-decoration: none !important;
  border: 1px solid #134074;
  transition: all 0.2s ease;
}
.fs-action-btn:hover {
  background: #f59e0b;
  color: #0b2545 !important;
  border-color: #d97706;
  transform: translateY(-1px);
}

.fs-filter-box {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 1.25rem;
  margin-bottom: 1.5rem;
  box-shadow: 0 2px 10px rgba(0,0,0,0.02);
}

.fs-search-input {
  border: 1px solid #cbd5e1;
  border-radius: 8px;
  padding: 10px 16px;
  font-size: 0.95rem;
  transition: border-color 0.2s ease;
}
.fs-search-input:focus {
  border-color: #f59e0b;
  outline: none;
  box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.15);
}

.fs-table-wrapper {
  overflow-x: auto;
  border-radius: 12px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 4px 16px rgba(0,0,0,0.03);
}

.fs-table {
  width: 100%;
  border-collapse: separate;
  border-spacing: 0;
  margin-bottom: 0;
}
.fs-table th {
  background: #0b2545;
  color: #ffffff;
  font-weight: 700;
  font-size: 0.88rem;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  padding: 14px 16px;
  border-bottom: 3px solid #f59e0b;
  white-space: nowrap;
}
.fs-table td {
  padding: 14px 16px;
  border-bottom: 1px solid #e2e8f0;
  vertical-align: middle;
  font-size: 0.92rem;
  color: #334155;
}
.fs-table tbody tr:nth-child(even) {
  background-color: #f8fafc;
}
.fs-table tbody tr:hover {
  background-color: #f1f5f9;
}

.fs-sno-badge {
  background: #e2e8f0;
  color: #0b2545;
  font-weight: 700;
  padding: 4px 10px;
  border-radius: 6px;
  font-size: 0.82rem;
  display: inline-block;
}

.fs-course-name {
  font-weight: 700;
  color: #0b2545;
}

.fs-fee-badge {
  background: #ecfdf5;
  color: #047857;
  border: 1px solid #a7f3d0;
  font-weight: 700;
  padding: 6px 12px;
  border-radius: 8px;
  display: inline-flex;
  align-items: center;
  gap: 4px;
  font-size: 0.95rem;
  white-space: nowrap;
}

.fs-duration-badge {
  background: #fef3c7;
  color: #b45309;
  border: 1px solid #fde68a;
  font-weight: 600;
  padding: 4px 10px;
  border-radius: 6px;
  font-size: 0.82rem;
  white-space: nowrap;
}

.fs-refund-card {
  background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%);
  border: 1px solid #fde68a;
  border-radius: 14px;
  padding: 1.5rem;
  margin-top: 2rem;
}
</style>

<section class="subpage-main-section fs-page py-4 py-md-5">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="fs-main-card">

          <!-- Header Banner -->
          <div class="fs-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-1.5 rounded-pill" style="background:rgba(255,255,255,0.15); border:1px solid rgba(255,255,255,0.3);">
                <i class="fa-solid fa-indian-rupee-sign me-1"></i> MP PURC Approved Fee Directives
              </span>
              <h1 class="fw-bold text-white mb-1 fs-3">ELIGIBILITY CRITERIA &amp; FEES STRUCTURE</h1>
              <p class="text-white-50 mb-0 small">Approved Annual Tuition Fees, Program Duration &amp; Minimum Eligibility Criteria (2026-27)</p>
            </div>
            <div class="d-flex flex-wrap gap-2">
              <a href="<?php echo BASE_URL; ?>Admission/UniversityAccountDetail.php" class="fs-action-btn">
                <i class="fa-solid fa-building-columns text-warning"></i> Bank Account Details
              </a>
              <a href="<?php echo $refund_policy_pdf; ?>" target="_blank" rel="noopener" class="fs-action-btn">
                <i class="fa-solid fa-file-pdf text-warning"></i> Fees Refund Policy
              </a>
            </div>
          </div>

          <!-- Content Body -->
          <div class="p-3.5 p-md-4">

            <!-- Stat Chips -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-sm-6 col-md-3">
                <div class="fs-stat-chip">
                  <div class="fs-stat-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                  <div>
                    <span class="text-muted extra-small uppercase fw-bold d-block">Academic Programs</span>
                    <strong class="text-dark fs-6">42+ Approved Courses</strong>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="fs-stat-chip">
                  <div class="fs-stat-icon"><i class="fa-solid fa-gavel"></i></div>
                  <div>
                    <span class="text-muted extra-small uppercase fw-bold d-block">Regulatory Approval</span>
                    <strong class="text-dark fs-6">MP PURC &amp; UGC</strong>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="fs-stat-chip">
                  <div class="fs-stat-icon"><i class="fa-solid fa-calendar-days"></i></div>
                  <div>
                    <span class="text-muted extra-small uppercase fw-bold d-block">Fee Structure</span>
                    <strong class="text-dark fs-6">Per Annum (Yearly)</strong>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="fs-stat-chip">
                  <div class="fs-stat-icon"><i class="fa-solid fa-user-shield"></i></div>
                  <div>
                    <span class="text-muted extra-small uppercase fw-bold d-block">Category Concession</span>
                    <strong class="text-dark fs-6">SC / ST / OBC Norms</strong>
                  </div>
                </div>
              </div>
            </div>

            <!-- Filter & Search Controls -->
            <div class="fs-filter-box">
              <div class="row g-3 align-items-center">
                <div class="col-md-7">
                  <label for="courseSearchInput" class="form-label extra-small fw-bold text-muted uppercase mb-1">
                    <i class="fa-solid fa-magnifying-glass me-1"></i> Quick Search Program / Course
                  </label>
                  <input type="text" id="courseSearchInput" class="form-control fs-search-input" placeholder="Type course name (e.g. BAMS, B.Tech, Nursing, M.Pharma)..." onkeyup="filterCourses()">
                </div>
                <div class="col-md-5 text-md-end">
                  <span class="badge bg-secondary px-3 py-2 text-white fw-bold rounded-pill" id="courseCounterBadge">
                    Showing <?php echo count($fee_courses); ?> of <?php echo count($fee_courses); ?> Programs
                  </span>
                </div>
              </div>
            </div>

            <!-- Exact Live Fees Structure Table -->
            <div class="fs-table-wrapper">
              <table class="fs-table" id="feesTable">
                <thead>
                  <tr>
                    <th style="width: 7%;">S. No.</th>
                    <th style="width: 25%;">Course</th>
                    <th style="width: 15%;">Tuition Fees Per Annum</th>
                    <th style="width: 40%;">Eligibility</th>
                    <th style="width: 13%;">Duration</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($fee_courses as $item): ?>
                  <tr>
                    <td>
                      <span class="fs-sno-badge"><?php echo htmlspecialchars($item['sno']); ?></span>
                    </td>
                    <td>
                      <span class="fs-course-name"><?php echo htmlspecialchars($item['course']); ?></span>
                    </td>
                    <td>
                      <span class="fs-fee-badge">
                        <i class="fa-solid fa-indian-rupee-sign"></i> <?php echo number_format((int)$item['fee']); ?>/-
                      </span>
                    </td>
                    <td style="text-align: justify; line-height: 1.6;">
                      <?php echo htmlspecialchars($item['eligibility']); ?>
                    </td>
                    <td>
                      <span class="fs-duration-badge"><?php echo htmlspecialchars($item['duration']); ?></span>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>

            <!-- Fees Refund Policy CTA Card -->
            <div class="fs-refund-card d-flex align-items-center justify-content-between flex-wrap gap-3">
              <div class="d-flex align-items-center gap-3">
                <i class="fa-solid fa-file-shield fs-1 text-warning"></i>
                <div>
                  <h6 class="fw-bold text-dark mb-1">Official University Fees Refund Policy</h6>
                  <p class="text-muted extra-small mb-0">Download the regulatory guidelines regarding fee cancellation, refunds &amp; deposit terms.</p>
                </div>
              </div>
              <div class="d-flex flex-wrap gap-2">
                <a href="<?php echo $refund_policy_pdf; ?>" target="_blank" rel="noopener" class="fs-action-btn" style="background:#f59e0b; color:#0b2545 !important; border-color:#d97706;">
                  <i class="fa-solid fa-download"></i> Fees Refund Policy (Click Here)
                </a>
                <a href="<?php echo BASE_URL; ?>Admission/AdmissionRegistration.php" class="fs-action-btn">
                  <i class="fa-solid fa-user-plus text-warning"></i> Apply Online Now
                </a>
              </div>
            </div>

          </div>
        </div><!-- end fs-main-card -->
      </div><!-- end col-lg-8 -->

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<script>
function filterCourses() {
  var input = document.getElementById("courseSearchInput");
  var filter = input.value.toUpperCase();
  var table = document.getElementById("feesTable");
  var tr = table.getElementsByTagName("tr");
  var count = 0;

  for (var i = 1; i < tr.length; i++) {
    var tdCourse = tr[i].getElementsByTagName("td")[1];
    var tdEligibility = tr[i].getElementsByTagName("td")[3];
    if (tdCourse || tdEligibility) {
      var courseText = tdCourse.textContent || tdCourse.innerText;
      var eligText = tdEligibility.textContent || tdEligibility.innerText;
      if (courseText.toUpperCase().indexOf(filter) > -1 || eligText.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
        count++;
      } else {
        tr[i].style.display = "none";
      }
    }
  }

  var badge = document.getElementById("courseCounterBadge");
  badge.textContent = "Showing " + count + " of <?php echo count($fee_courses); ?> Programs";
}
</script>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>