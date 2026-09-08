<?php
$page_title = 'Fees Structure - SSSUTMS';
$banner_title = 'Fees Structure';
$banner_category = 'Admission';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?>

<style>
.fs-section { background-color: #f8fafc; font-family: 'Inter', system-ui, -apple-system, sans-serif; }
.fs-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15,23,42,0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}
.fs-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2.2rem 2rem;
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
  padding: 12px 14px;
  display: flex; align-items: center; gap: 11px;
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
  width: 42px; height: 42px;
  border-radius: 10px;
  background: rgba(245,158,11,0.12);
  color: #d97706;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.15rem; flex-shrink: 0;
}
.fs-table-wrap {
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  overflow: hidden;
}
.fs-table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 0;
}
.fs-table thead th {
  background: #0b2545;
  color: #ffffff;
  font-weight: 700;
  font-size: 0.88rem;
  text-transform: uppercase;
  letter-spacing: 0.03em;
  padding: 14px 16px;
  border: none;
  vertical-align: middle;
}
.fs-table tbody tr {
  transition: background-color 0.15s ease;
  border-bottom: 1px solid #f1f5f9;
}
.fs-table tbody tr:hover {
  background-color: #f8fafc;
}
.fs-table tbody tr:last-child {
  border-bottom: none;
}
.fs-table td {
  padding: 14px 16px;
  font-size: 0.92rem;
  color: #334155;
  vertical-align: middle;
}
.fs-fee-badge {
  display: inline-flex;
  align-items: center;
  gap: 4px;
  background: #ecfdf5;
  color: #065f46;
  font-weight: 700;
  font-size: 0.92rem;
  padding: 4px 12px;
  border-radius: 8px;
  border: 1px solid #a7f3d0;
  font-family: monospace;
}
.fs-duration-badge {
  display: inline-block;
  background: #f1f5f9;
  color: #475569;
  font-weight: 600;
  font-size: 0.8rem;
  padding: 4px 10px;
  border-radius: 6px;
  white-space: nowrap;
}
.fs-search-box {
  position: relative;
  max-width: 380px;
}
.fs-search-box input {
  padding-left: 2.5rem;
  border-radius: 10px;
  border: 1px solid #cbd5e1;
}
.fs-search-box i {
  position: absolute;
  left: 0.9rem;
  top: 50%;
  transform: translateY(-50%);
  color: #94a3b8;
}
</style>

<section class="subpage-main-section fs-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="fs-main-card">

          <!-- Header Banner -->
          <div class="fs-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-receipt me-1"></i> Academic Session 2026-27
              </span>
              <h3 class="fw-bold text-white mb-1 fs-3">ELIGIBILITY CRITERIA &amp; FEES STRUCTURE</h3>
              <p class="text-white-50 mb-0 small">Approved Annual Tuition Fees, Minimum Eligibility &amp; Course Duration Across All Schools</p>
            </div>
            <div>
              <a href="<?php echo BASE_URL; ?>Admission/AdmissionRegistration.php" class="btn btn-warning fw-bold px-4 py-2 text-dark rounded-3 shadow-sm">
                <i class="fa-solid fa-pen-nib me-1"></i> Apply Online
              </a>
            </div>
          </div>

          <!-- Content Body -->
          <div class="p-4">

            <!-- Stat Chips -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-sm-6 col-md-3">
                <div class="fs-stat-chip">
                  <div class="fs-stat-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                  <div>
                    <span class="text-muted extra-small uppercase fw-bold d-block">Total Programs</span>
                    <strong class="text-dark fs-6">42+ Courses</strong>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="fs-stat-chip">
                  <div class="fs-stat-icon"><i class="fa-solid fa-indian-rupee-sign"></i></div>
                  <div>
                    <span class="text-muted extra-small uppercase fw-bold d-block">Fee Structure</span>
                    <strong class="text-dark fs-6">Per Annum</strong>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="fs-stat-chip">
                  <div class="fs-stat-icon"><i class="fa-solid fa-shield-halved"></i></div>
                  <div>
                    <span class="text-muted extra-small uppercase fw-bold d-block">Regulatory</span>
                    <strong class="text-dark fs-6">UGC / AICTE / PCI</strong>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="fs-stat-chip">
                  <div class="fs-stat-icon"><i class="fa-solid fa-handshake-angle"></i></div>
                  <div>
                    <span class="text-muted extra-small uppercase fw-bold d-block">Scholarships</span>
                    <strong class="text-dark fs-6">Govt Schemes</strong>
                  </div>
                </div>
              </div>
            </div>

            <!-- Filter / Search Toolbar -->
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
              <div class="fs-search-box flex-grow-1">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" id="feeSearchInput" class="form-control" placeholder="Search course (e.g. B.Tech, BAMS, MBA, Pharmacy)...">
              </div>
              <div class="small text-muted">
                Showing <strong id="feeCount">42</strong> approved programs
              </div>
            </div>

            <!-- Responsive Modern Fees Table -->
            <div class="table-responsive fs-table-wrap">
              <table class="fs-table" id="feeTable">
                <thead>
                  <tr>
                    <th style="width: 7%;" class="text-center">S.No.</th>
                    <th style="width: 28%;">Course Name</th>
                    <th style="width: 18%;">Tuition Fees (Per Annum)</th>
                    <th style="width: 35%;">Eligibility Criteria</th>
                    <th style="width: 12%;" class="text-center">Duration</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-center fw-bold text-muted">1</td>
                    <td><strong class="text-dark">BE</strong></td>
                    <td><span class="fs-fee-badge"><i class="fa-solid fa-indian-rupee-sign small"></i> 54,000</span></td>
                    <td class="small">10+2 (PCM) With 45% (UR), 40% (ST/SC/OBC)</td>
                    <td class="text-center"><span class="fs-duration-badge">4 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td class="text-center fw-bold text-muted">2</td>
                    <td><strong class="text-dark">M. Tech.</strong></td>
                    <td><span class="fs-fee-badge"><i class="fa-solid fa-indian-rupee-sign small"></i> 63,000</span></td>
                    <td class="small">BE/B.Tech./MCA  With 50% (UR), 45% (ST/SC/OBC)</td>
                    <td class="text-center"><span class="fs-duration-badge">2 Yrs,</span></td>
                  </tr>
                  <tr>
                    <td class="text-center fw-bold text-muted">3</td>
                    <td><strong class="text-dark">B. Arch.</strong></td>
                    <td><span class="fs-fee-badge"><i class="fa-solid fa-indian-rupee-sign small"></i> 65,000</span></td>
                    <td class="small">10+2 (PCM) With 50% In Each Subject (UR/ST/SC/OBC)</td>
                    <td class="text-center"><span class="fs-duration-badge">5 Yrs,</span></td>
                  </tr>
                  <tr>
                    <td class="text-center fw-bold text-muted">4</td>
                    <td><strong class="text-dark">B. Design</strong></td>
                    <td><span class="fs-fee-badge"><i class="fa-solid fa-indian-rupee-sign small"></i> 70,000</span></td>
                    <td class="small">10+2  (Any Discipline ) With 45% (UR), 40% (ST/SC/OBC)</td>
                    <td class="text-center"><span class="fs-duration-badge">4 Yrs,</span></td>
                  </tr>
                  <tr>
                    <td class="text-center fw-bold text-muted">5</td>
                    <td><strong class="text-dark">MBA (Full Time)</strong></td>
                    <td><span class="fs-fee-badge"><i class="fa-solid fa-indian-rupee-sign small"></i> 50,000</span></td>
                    <td class="small">Graduate In Any Discipline With 50% (UR), 45% (ST/SC/OBC)</td>
                    <td class="text-center"><span class="fs-duration-badge">2 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td class="text-center fw-bold text-muted">6</td>
                    <td><strong class="text-dark">MCA</strong></td>
                    <td><span class="fs-fee-badge"><i class="fa-solid fa-indian-rupee-sign small"></i> 40,000</span></td>
                    <td class="small">A Student Who Has Passed 10+2 Examination Of Secondary School Education Board, Bhopal With Mathematics As One Of The Subject At 10+2 Examinations Or Its Equivalent And Have Passed B.Sc / B.Com/ BCA. With 50% (UR), 45% (ST/SC/OBC)</td>
                    <td class="text-center"><span class="fs-duration-badge">2 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td class="text-center fw-bold text-muted">7</td>
                    <td><strong class="text-dark">B. Pharma</strong></td>
                    <td><span class="fs-fee-badge"><i class="fa-solid fa-indian-rupee-sign small"></i> 55,000</span></td>
                    <td class="small">10+2 (PCM/PCB) With 45% (UR), 40% (ST/SC/OBC)</td>
                    <td class="text-center"><span class="fs-duration-badge">4 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td class="text-center fw-bold text-muted">8</td>
                    <td><strong class="text-dark">M. Pharma</strong></td>
                    <td><span class="fs-fee-badge"><i class="fa-solid fa-indian-rupee-sign small"></i> 154,000</span></td>
                    <td class="small">B. Pharma With 50% (UR), 45% (ST/SC/OBC)</td>
                    <td class="text-center"><span class="fs-duration-badge">2 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td class="text-center fw-bold text-muted">9</td>
                    <td><strong class="text-dark">D. Pharma</strong></td>
                    <td><span class="fs-fee-badge"><i class="fa-solid fa-indian-rupee-sign small"></i> 75,000</span></td>
                    <td class="small">10+2 (PCM/PCB) With 45% (UR), 40% (ST/SC/OBC)</td>
                    <td class="text-center"><span class="fs-duration-badge">2 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td class="text-center fw-bold text-muted">10</td>
                    <td><strong class="text-dark">B.Ed.</strong></td>
                    <td><span class="fs-fee-badge"><i class="fa-solid fa-indian-rupee-sign small"></i> 41,000</span></td>
                    <td class="small">Graduate In Any Discipline With 50% (UR/OBC), 45% (ST/SC)</td>
                    <td class="text-center"><span class="fs-duration-badge">2 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td class="text-center fw-bold text-muted">11</td>
                    <td><strong class="text-dark">B.A. B. Ed. (4Year Integrated Course)</strong></td>
                    <td><span class="fs-fee-badge"><i class="fa-solid fa-indian-rupee-sign small"></i> 30,000</span></td>
                    <td class="small">10+2 Any Discipline With 50% (UR), 45% (ST/SC/OBC)</td>
                    <td class="text-center"><span class="fs-duration-badge">4 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td class="text-center fw-bold text-muted">12</td>
                    <td><strong class="text-dark">B.P. Ed.</strong></td>
                    <td><span class="fs-fee-badge"><i class="fa-solid fa-indian-rupee-sign small"></i> 40,000</span></td>
                    <td class="small">Graduate In Any Discipline With 50% (UR/OBC/AI), 45% (ST/SC)</td>
                    <td class="text-center"><span class="fs-duration-badge">2 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td class="text-center fw-bold text-muted">13</td>
                    <td><strong class="text-dark">B.P.E.S. </strong></td>
                    <td><span class="fs-fee-badge"><i class="fa-solid fa-indian-rupee-sign small"></i> 41,000</span></td>
                    <td class="small">10+2 Or Its Equivalent With 45%</td>
                    <td class="text-center"><span class="fs-duration-badge">3 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td class="text-center fw-bold text-muted">14</td>
                    <td><strong class="text-dark">BHMCT</strong></td>
                    <td><span class="fs-fee-badge"><i class="fa-solid fa-indian-rupee-sign small"></i> 62,000</span></td>
                    <td class="small">10+2 Or Its Equivalent With 45% (UR),  40%(ST/SC/OBC)</td>
                    <td class="text-center"><span class="fs-duration-badge">4 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td class="text-center fw-bold text-muted">15</td>
                    <td><strong class="text-dark">B.Sc. (Nursing)</strong></td>
                    <td><span class="fs-fee-badge"><i class="fa-solid fa-indian-rupee-sign small"></i> 80,000</span></td>
                    <td class="small">10+2 (PCB) With 50% (UR), 45% (ST/SC/OBC)</td>
                    <td class="text-center"><span class="fs-duration-badge">4 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td class="text-center fw-bold text-muted">16</td>
                    <td><strong class="text-dark">BBA</strong></td>
                    <td><span class="fs-fee-badge"><i class="fa-solid fa-indian-rupee-sign small"></i> 21,000</span></td>
                    <td class="small">10+2 Or Its Equivalent With 40% (UR/OBC), 35% (ST/SC)</td>
                    <td class="text-center"><span class="fs-duration-badge">3 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td class="text-center fw-bold text-muted">17</td>
                    <td><strong class="text-dark">BCA</strong></td>
                    <td><span class="fs-fee-badge"><i class="fa-solid fa-indian-rupee-sign small"></i> 21,000</span></td>
                    <td class="small">10+2 (PCM) Or Its Equivalent With 50% (UR/OBC), 45% (ST/SC)</td>
                    <td class="text-center"><span class="fs-duration-badge">3 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td class="text-center fw-bold text-muted">18</td>
                    <td><strong class="text-dark">B.Sc. </strong></td>
                    <td><span class="fs-fee-badge"><i class="fa-solid fa-indian-rupee-sign small"></i> 16,000</span></td>
                    <td class="small">10+2 (PCM/PCB/Agri.) With 40% (UR), 33% (ST/SC/OBC)</td>
                    <td class="text-center"><span class="fs-duration-badge">3 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td class="text-center fw-bold text-muted">19</td>
                    <td><strong class="text-dark">B.A.</strong></td>
                    <td><span class="fs-fee-badge"><i class="fa-solid fa-indian-rupee-sign small"></i> 13,000</span></td>
                    <td class="small">10+2 Or Its Equivalent With 40% (UR), 33% (ST/SC/OBC)</td>
                    <td class="text-center"><span class="fs-duration-badge">3 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td class="text-center fw-bold text-muted">20</td>
                    <td><strong class="text-dark">B.Com.</strong></td>
                    <td><span class="fs-fee-badge"><i class="fa-solid fa-indian-rupee-sign small"></i> 16,000</span></td>
                    <td class="small">10+2 (PCM/PCB/Comm.) With 40% (UR), 33% (ST/SC/OBC)</td>
                    <td class="text-center"><span class="fs-duration-badge">3 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td class="text-center fw-bold text-muted">21</td>
                    <td><strong class="text-dark">M.Sc.</strong></td>
                    <td><span class="fs-fee-badge"><i class="fa-solid fa-indian-rupee-sign small"></i> 26,000</span></td>
                    <td class="small">B.Sc. (Hons) Maths/CS/IT/Physics/Chemistry/Biology As One Subject In B.Sc. With 40% (UR), 33% (ST/SC/OBC)</td>
                    <td class="text-center"><span class="fs-duration-badge">2 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td class="text-center fw-bold text-muted">22</td>
                    <td><strong class="text-dark">M.A.</strong></td>
                    <td><span class="fs-fee-badge"><i class="fa-solid fa-indian-rupee-sign small"></i> 26,000</span></td>
                    <td class="small">UG With 40% For All Categories</td>
                    <td class="text-center"><span class="fs-duration-badge">2 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td class="text-center fw-bold text-muted">23</td>
                    <td><strong class="text-dark">M.COM.</strong></td>
                    <td><span class="fs-fee-badge"><i class="fa-solid fa-indian-rupee-sign small"></i> 26,000</span></td>
                    <td class="small">B.COM Passed For All Categories</td>
                    <td class="text-center"><span class="fs-duration-badge">2 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td class="text-center fw-bold text-muted">24</td>
                    <td><strong class="text-dark">PGDCA</strong></td>
                    <td><span class="fs-fee-badge"><i class="fa-solid fa-indian-rupee-sign small"></i> 21,000</span></td>
                    <td class="small">A Student Who Has Passes 10+2 Examination Of Secondary School Education Board, Bhopal With Mathematics As One Of The Subject At 10+2 Examinations Or Its Equivalent And Have Passed BA/B.Sc / B.Com/ BCA. With 40% (UR), 33% (ST/SC/OBC)</td>
                    <td class="text-center"><span class="fs-duration-badge">1 Yr.</span></td>
                  </tr>
                  <tr>
                    <td class="text-center fw-bold text-muted">25</td>
                    <td><strong class="text-dark">Bachelor Of Physiotherapy</strong></td>
                    <td><span class="fs-fee-badge"><i class="fa-solid fa-indian-rupee-sign small"></i> 42,000</span></td>
                    <td class="small">10+2 (PCB) With 50% (UR), 45% (ST/SC/OBC)</td>
                    <td class="text-center"><span class="fs-duration-badge">4½ Yrs.</span></td>
                  </tr>
                  <tr>
                    <td class="text-center fw-bold text-muted">26</td>
                    <td><strong class="text-dark">Diploma In X-Ray Radiographer Technician</strong></td>
                    <td><span class="fs-fee-badge"><i class="fa-solid fa-indian-rupee-sign small"></i> 30,000</span></td>
                    <td class="small">10+2 (PCB) With 50% (UR), 45% (ST/SC/OBC)</td>
                    <td class="text-center"><span class="fs-duration-badge">2 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td class="text-center fw-bold text-muted">27</td>
                    <td><strong class="text-dark">D. Pharma (Ayurved)</strong></td>
                    <td><span class="fs-fee-badge"><i class="fa-solid fa-indian-rupee-sign small"></i> 40,000</span></td>
                    <td class="small">10+2 (PCB) With 50% (UR), 45% (ST/SC/OBC)</td>
                    <td class="text-center"><span class="fs-duration-badge">2 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td class="text-center fw-bold text-muted">28</td>
                    <td><strong class="text-dark">DMLT</strong></td>
                    <td><span class="fs-fee-badge"><i class="fa-solid fa-indian-rupee-sign small"></i> 37,000</span></td>
                    <td class="small">10+2 (PCB) With 50% (UR), 40% (ST/SC/OBC)</td>
                    <td class="text-center"><span class="fs-duration-badge">2 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td class="text-center fw-bold text-muted">29</td>
                    <td><strong class="text-dark">Dialysis Technician</strong></td>
                    <td><span class="fs-fee-badge"><i class="fa-solid fa-indian-rupee-sign small"></i> 40,000</span></td>
                    <td class="small">10+2 (PCB) With 50% (UR), 45% (ST/SC/OBC)</td>
                    <td class="text-center"><span class="fs-duration-badge">2 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td class="text-center fw-bold text-muted">30</td>
                    <td><strong class="text-dark">Diploma In Human Nutrition</strong></td>
                    <td><span class="fs-fee-badge"><i class="fa-solid fa-indian-rupee-sign small"></i> 28,000</span></td>
                    <td class="small">10+2 (PCB) With 50% (UR), 45% (ST/SC/OBC)</td>
                    <td class="text-center"><span class="fs-duration-badge">2 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td class="text-center fw-bold text-muted">31</td>
                    <td><strong class="text-dark">Diploma In Blood Transfusion Technician</strong></td>
                    <td><span class="fs-fee-badge"><i class="fa-solid fa-indian-rupee-sign small"></i> 38,000</span></td>
                    <td class="small">10+2 (PCB) With 50% (UR), 45% (ST/SC/OBC)</td>
                    <td class="text-center"><span class="fs-duration-badge">2 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td class="text-center fw-bold text-muted">32</td>
                    <td><strong class="text-dark">Diploma In Yoga</strong></td>
                    <td><span class="fs-fee-badge"><i class="fa-solid fa-indian-rupee-sign small"></i> 30,000</span></td>
                    <td class="small">10+2 (PCB) With 50% (UR), 45% (ST/SC/OBC)</td>
                    <td class="text-center"><span class="fs-duration-badge">2 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td class="text-center fw-bold text-muted">33</td>
                    <td><strong class="text-dark">Medical Laboratory Technology [Haematology] MMLT]</strong></td>
                    <td><span class="fs-fee-badge"><i class="fa-solid fa-indian-rupee-sign small"></i> 125,000</span></td>
                    <td class="small">BMLT With 50% For All Category</td>
                    <td class="text-center"><span class="fs-duration-badge">2 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td class="text-center fw-bold text-muted">34</td>
                    <td><strong class="text-dark">Master Of Physiotherapy [MPT]</strong></td>
                    <td><span class="fs-fee-badge"><i class="fa-solid fa-indian-rupee-sign small"></i> 120,000</span></td>
                    <td class="small">BPT With 50% For All Category</td>
                    <td class="text-center"><span class="fs-duration-badge">2 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td class="text-center fw-bold text-muted">35</td>
                    <td><strong class="text-dark">B.Sc. (Hons.) Agriculture</strong></td>
                    <td><span class="fs-fee-badge"><i class="fa-solid fa-indian-rupee-sign small"></i> 61,000</span></td>
                    <td class="small">10+2 In PCM/PCB/ Agriculture With 45% </td>
                    <td class="text-center"><span class="fs-duration-badge">4 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td class="text-center fw-bold text-muted">36</td>
                    <td><strong class="text-dark">B. Tech. (Dairy Technology)</strong></td>
                    <td><span class="fs-fee-badge"><i class="fa-solid fa-indian-rupee-sign small"></i> 25,000</span></td>
                    <td class="small">10+2 (PCM/PCB/Agri.) With 50% (UR),, 45% (OBC), 33% (ST/SC)</td>
                    <td class="text-center"><span class="fs-duration-badge">4 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td class="text-center fw-bold text-muted">37</td>
                    <td><strong class="text-dark">Diploma(Engineering)</strong></td>
                    <td><span class="fs-fee-badge"><i class="fa-solid fa-indian-rupee-sign small"></i> 30,000</span></td>
                    <td class="small">10th Or Equivalent Examination Passed </td>
                    <td class="text-center"><span class="fs-duration-badge">3 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td class="text-center fw-bold text-muted">38</td>
                    <td><strong class="text-dark">L.L.B.</strong></td>
                    <td><span class="fs-fee-badge"><i class="fa-solid fa-indian-rupee-sign small"></i> 25,600</span></td>
                    <td class="small">Graduate In Any Discipline With 45% (UR/OBC), 40% (ST/SC)</td>
                    <td class="text-center"><span class="fs-duration-badge">3 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td class="text-center fw-bold text-muted">39</td>
                    <td><strong class="text-dark">B.A.LL.B.</strong></td>
                    <td><span class="fs-fee-badge"><i class="fa-solid fa-indian-rupee-sign small"></i> 22,000</span></td>
                    <td class="small">10+2 Any Discipline With 45% (UR), 40% (ST/SC/OBC)</td>
                    <td class="text-center"><span class="fs-duration-badge">5 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td class="text-center fw-bold text-muted">39</td>
                    <td><strong class="text-dark">B. Lib.</strong></td>
                    <td><span class="fs-fee-badge"><i class="fa-solid fa-indian-rupee-sign small"></i> 15,000</span></td>
                    <td class="small">Graduate In Any Discipline</td>
                    <td class="text-center"><span class="fs-duration-badge">1 Yr.</span></td>
                  </tr>
                  <tr>
                    <td class="text-center fw-bold text-muted">40</td>
                    <td><strong class="text-dark">B.H.M.S.</strong></td>
                    <td><span class="fs-fee-badge"><i class="fa-solid fa-indian-rupee-sign small"></i> 150,000</span></td>
                    <td class="small">10+2 In PCB With Minimum 45% For SC/ST/OBC And 50% For UR</td>
                    <td class="text-center"><span class="fs-duration-badge">5.5 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td class="text-center fw-bold text-muted">41</td>
                    <td><strong class="text-dark">B.A.M.S.</strong></td>
                    <td><span class="fs-fee-badge"><i class="fa-solid fa-indian-rupee-sign small"></i> 247,300</span></td>
                    <td class="small">10+2 In PCB With Minimum 45% For SC/ST/OBC And 50% For UR</td>
                    <td class="text-center"><span class="fs-duration-badge">5.5 Yrs.</span></td>
                  </tr>
                </tbody>
              </table>
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
document.addEventListener('DOMContentLoaded', function() {
  var searchInput = document.getElementById('feeSearchInput');
  var table = document.getElementById('feeTable');
  var countBadge = document.getElementById('feeCount');
  if (searchInput && table) {
    var rows = table.querySelectorAll('tbody tr');
    searchInput.addEventListener('input', function() {
      var query = this.value.toLowerCase().trim();
      var visible = 0;
      rows.forEach(function(row) {
        var text = row.textContent.toLowerCase();
        if (text.indexOf(query) !== -1) {
          row.style.display = '';
          visible++;
        } else {
          row.style.display = 'none';
        }
      });
      if (countBadge) countBadge.textContent = visible;
    });
  }
});
</script>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
