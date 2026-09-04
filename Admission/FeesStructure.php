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
.fs-section { background-color: #f8fafc; }
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
  border-radius: 14px;
  padding: 16px 14px;
  display: flex; align-items: center; gap: 12px;
  height: 100%;
  transition: all 0.25s ease;
  box-shadow: 0 4px 12px rgba(0,0,0,0.02);
}
.fs-stat-chip:hover {
  border-color: #cbd5e1;
  box-shadow: 0 6px 18px rgba(11,37,69,0.07);
  transform: translateY(-2px);
}
.fs-stat-icon {
  width: 48px; height: 48px;
  border-radius: 12px;
  background: rgba(245,158,11,0.12);
  color: #d97706;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.35rem; flex-shrink: 0;
}
.fs-content-body table {
  width: 100% !important;
  border-collapse: collapse !important;
  margin-bottom: 2rem !important;
  border-radius: 12px !important;
  overflow: hidden !important;
  border: 1px solid #e2e8f0 !important;
  box-shadow: 0 4px 16px rgba(0,0,0,0.03) !important;
}
.fs-content-body table td, .fs-content-body table th {
  padding: 12px 14px !important;
  border: 1px solid #e2e8f0 !important;
}
.fs-content-body table tr:first-child td, .fs-content-body table tr:first-child th {
  background: #0b2545 !important;
  color: #ffffff !important;
  font-weight: 700 !important;
}
.fs-content-body table tr:nth-child(even) td {
  background-color: #f8fafc !important;
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
                <i class="fa-solid fa-indian-rupee-sign me-1"></i> MP Niji Vishwavidyalaya Approved Fees
              </span>
              <h3 class="fw-bold text-white mb-1 fs-3">ELIGIBILITY CRITERIA &amp; FEES STRUCTURE</h3>
              <p class="text-white-50 mb-0 small">Official Tuition Fees Per Annum, Course Duration &amp; Eligibility for All Programs</p>
            </div>
            <div>
              <a href="<?php echo BASE_URL; ?>Admission/UniversityAccountDetail.php" class="btn btn-warning fw-bold px-4 py-2 text-dark rounded-3">
                <i class="fa-solid fa-building-columns me-1"></i> Bank Account Details
              </a>
            </div>
          </div>

          <!-- Content Body -->
          <div class="p-4 fs-content-body">

            <!-- Stat Chips -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-sm-6 col-md-3">
                <div class="fs-stat-chip">
                  <div class="fs-stat-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Programs</div>
                    <div class="fw-bold text-dark fs-6">UG, PG &amp; Diploma</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="fs-stat-chip">
                  <div class="fs-stat-icon"><i class="fa-solid fa-shield-halved"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Fee Status</div>
                    <div class="fw-bold text-dark fs-6">Approved Fees</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="fs-stat-chip">
                  <div class="fs-stat-icon"><i class="fa-solid fa-clock"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Payment Cycle</div>
                    <div class="fw-bold text-dark fs-6">Per Annum (Yearly)</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="fs-stat-chip">
                  <div class="fs-stat-icon"><i class="fa-solid fa-percent"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Relaxation</div>
                    <div class="fw-bold text-dark fs-6">As Per MP Govt Norms</div>
                  </div>
                </div>
              </div>
            </div>
<p class="MsoNormal" style=" margin-bottom: .0001pt; text-align: center; line-height: normal;" align="center"><strong><span style="font-size: 13.5pt; font-family: 'Arial','sans-serif';  color: #ff9c00; "><br />&nbsp;Eligibility Criteria &amp; Fees Structure</span></strong></p>
<p class="MsoNormal" style="  text-align: center; line-height: normal;" align="center"><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';  ">&nbsp;</span></p>
<div align="center">
<table class="MsoTableMediumShading1Accent1" style="width: 100.385%; border: medium; height: 2156.43px;" border="1" width="104%" cellspacing="0" cellpadding="0">
<tbody>
<tr style="height: 58px;">
<td style="width: 7.28667%; border-width: 1pt; border-color: windowtext; border-image: initial; background: #4f81bd; padding: 0cm 5.4pt; height: 58px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; text-align: center; line-height: normal; " align="center"><strong><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';  color: #632523; ">S. No.</span></strong></p>
</td>
<td style="width: 25.3116%; border-width: 1pt 1pt 1pt medium; border-color: windowtext windowtext windowtext currentcolor; border-image: initial; border-left: medium; background: #4f81bd; padding: 0cm 5.4pt; height: 58px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; text-align: center; line-height: normal; " align="center"><strong><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';  color: #632523; ">Course</span></strong></p>
</td>
<td style="width: 10.0671%; border-width: 1pt 1pt 1pt medium; border-color: windowtext windowtext windowtext currentcolor; border-image: initial; border-left: medium; background: #4f81bd; padding: 0cm 5.4pt; height: 58px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; text-align: center; line-height: normal; " align="center"><strong><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';  color: #632523; ">Tution Fees Per Annum</span></strong></p>
</td>
<td style="width: 44.1984%; border-width: 1pt 1pt 1pt medium; border-color: windowtext windowtext windowtext currentcolor; border-image: initial; border-left: medium; background: #4f81bd; padding: 0cm 5.4pt; height: 58px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; text-align: center; line-height: normal; " align="center"><strong><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';  color: #632523; ">Eligibility</span></strong></p>
</td>
<td style="width: 13.1362%; border-width: 1pt 1pt 1pt medium; border-color: windowtext windowtext windowtext currentcolor; border-image: initial; border-left: medium; background: #4f81bd; padding: 0cm 5.4pt; height: 58px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; text-align: center; line-height: normal; " align="center"><strong><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';  color: #632523; ">Duration In Year</span></strong></p>
</td>
</tr>
<tr style="height: 38px;">
<td style="width: 7.28667%; border-width: medium 1pt 1pt; border-color: currentcolor windowtext windowtext; border-image: initial; border-top: medium; background: #d3dfee; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">1.</span></strong></p>
</td>
<td style="width: 25.3116%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">BE</span></strong></p>
</td>
<td style="width: 10.0671%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">54000</span></p>
</td>
<td style="width: 44.1984%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">10+2 (PCM) With 45% (UR), 40% (ST/SC/OBC)</span></p>
</td>
<td style="width: 13.1362%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">4 Yrs.</span></p>
</td>
</tr>
<tr style="height: 38px;">
<td style="width: 7.28667%; border-width: medium 1pt 1pt; border-color: currentcolor windowtext windowtext; border-image: initial; border-top: medium; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">2.</span></strong></p>
</td>
<td style="width: 25.3116%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">M. Tech.</span></strong></p>
</td>
<td style="width: 10.0671%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">63000</span></p>
</td>
<td style="width: 44.1984%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">BE/B.Tech./MCA&nbsp; With 50% (UR), 45% (ST/SC/OBC)</span></p>
</td>
<td style="width: 13.1362%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">2 Yrs,</span></p>
</td>
</tr>
<tr style="height: 38px;">
<td style="width: 7.28667%; border-width: medium 1pt 1pt; border-color: currentcolor windowtext windowtext; border-image: initial; border-top: medium; background: #d3dfee; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">3.</span></strong></p>
</td>
<td style="width: 25.3116%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">B. Arch.</span></strong></p>
</td>
<td style="width: 10.0671%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">65000</span></p>
</td>
<td style="width: 44.1984%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">10+2 (PCM) With 50% In Each Subject&nbsp;(UR/ST/SC/OBC)</span></p>
</td>
<td style="width: 13.1362%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">5 Yrs,</span></p>
</td>
</tr>
<tr style="height: 38px;">
<td style="width: 7.28667%; border-width: medium 1pt 1pt; border-color: currentcolor windowtext windowtext; border-image: initial; border-top: medium; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">4.</span></strong></p>
</td>
<td style="width: 25.3116%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">B. Design</span></strong></p>
</td>
<td style="width: 10.0671%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">70000</span></p>
</td>
<td style="width: 44.1984%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">10+2&nbsp; (Any Discipline )&nbsp;With 45% (UR), 40% (ST/SC/OBC)</span></p>
</td>
<td style="width: 13.1362%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">4 Yrs,</span></p>
</td>
</tr>
<tr style="height: 38px;">
<td style="width: 7.28667%; border-width: medium 1pt 1pt; border-color: currentcolor windowtext windowtext; border-image: initial; border-top: medium; background: #d3dfee; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">5.</span></strong></p>
</td>
<td style="width: 25.3116%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">MBA (Full Time)</span></strong></p>
</td>
<td style="width: 10.0671%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">50000</span></p>
</td>
<td style="width: 44.1984%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">Graduate In Any Discipline With 50% (UR), 45% (ST/SC/OBC)</span></p>
</td>
<td style="width: 13.1362%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">2 Yrs.</span></p>
</td>
</tr>
<tr style="height: 121px;">
<td style="width: 7.28667%; border-width: medium 1pt 1pt; border-color: currentcolor windowtext windowtext; border-image: initial; border-top: medium; padding: 0cm 5.4pt; height: 121px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">6.</span></strong></p>
</td>
<td style="width: 25.3116%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 121px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">MCA</span></strong></p>
</td>
<td style="width: 10.0671%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 121px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">40000</span></p>
</td>
<td style="width: 44.1984%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 121px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">A Student Who Has Passed 10+2 Examination Of Secondary School Education Board, Bhopal With Mathematics As One Of The Subject At 10+2 Examinations Or Its Equivalent And Have Passed B.Sc / B.Com/ BCA. With 50% (UR), 45% (ST/SC/OBC)</span></p>
</td>
<td style="width: 13.1362%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 121px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">2 Yrs.</span></p>
</td>
</tr>
<tr style="height: 38px;">
<td style="width: 7.28667%; border-width: medium 1pt 1pt; border-color: currentcolor windowtext windowtext; border-image: initial; border-top: medium; background: #d3dfee; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">7.</span></strong></p>
</td>
<td style="width: 25.3116%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">B. Pharma</span></strong></p>
</td>
<td style="width: 10.0671%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">55000</span></p>
</td>
<td style="width: 44.1984%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">10+2 (PCM/PCB) With 45% (UR), 40% (ST/SC/OBC)</span></p>
</td>
<td style="width: 13.1362%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">4 Yrs.</span></p>
</td>
</tr>
<tr style="height: 38px;">
<td style="width: 7.28667%; border-width: medium 1pt 1pt; border-color: currentcolor windowtext windowtext; border-image: initial; border-top: medium; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">8.</span></strong></p>
</td>
<td style="width: 25.3116%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">M. Pharma</span></strong></p>
</td>
<td style="width: 10.0671%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">154000</span></p>
</td>
<td style="width: 44.1984%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">B. Pharma With 50% (UR), 45% (ST/SC/OBC)</span></p>
</td>
<td style="width: 13.1362%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">2 Yrs.</span></p>
</td>
</tr>
<tr style="height: 38px;">
<td style="width: 7.28667%; border-width: medium 1pt 1pt; border-color: currentcolor windowtext windowtext; border-image: initial; border-top: medium; background: #d3dfee; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">9.</span></strong></p>
</td>
<td style="width: 25.3116%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">D. Pharma</span></strong></p>
</td>
<td style="width: 10.0671%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">75000</span></p>
</td>
<td style="width: 44.1984%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">10+2 (PCM/PCB) With 45% (UR), 40% (ST/SC/OBC)</span></p>
</td>
<td style="width: 13.1362%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">2 Yrs.</span></p>
</td>
</tr>
<tr style="height: 38px;">
<td style="width: 7.28667%; border-width: medium 1pt 1pt; border-color: currentcolor windowtext windowtext; border-image: initial; border-top: medium; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">10.</span></strong></p>
</td>
<td style="width: 25.3116%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">B.Ed.</span></strong></p>
</td>
<td style="width: 10.0671%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">41000</span></p>
</td>
<td style="width: 44.1984%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">Graduate In Any Discipline With 50% (UR/OBC), 45% (ST/SC)</span></p>
</td>
<td style="width: 13.1362%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">2 Yrs.</span></p>
</td>
</tr>
<tr style="height: 74px;">
<td style="width: 7.28667%; border-width: medium 1pt 1pt; border-color: currentcolor windowtext windowtext; border-image: initial; border-top: medium; background: #d3dfee; padding: 0cm 5.4pt; height: 74px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">11.</span></strong></p>
</td>
<td style="width: 25.3116%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 74px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">B.A. B. Ed.</span></strong></p>
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">(4Year Integrated Course)</span></strong></p>
</td>
<td style="width: 10.0671%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 74px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">30000</span></p>
</td>
<td style="width: 44.1984%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 74px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">10+2 Any Discipline With 50% (UR), 45% (ST/SC/OBC)</span></p>
</td>
<td style="width: 13.1362%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 74px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">4 Yrs.</span></p>
</td>
</tr>
<tr style="height: 58px;">
<td style="width: 7.28667%; border-width: medium 1pt 1pt; border-color: currentcolor windowtext windowtext; border-image: initial; border-top: medium; padding: 0cm 5.4pt; height: 58px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">12.</span></strong></p>
</td>
<td style="width: 25.3116%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 58px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">B.P. Ed.</span></strong></p>
</td>
<td style="width: 10.0671%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 58px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">40000</span></p>
</td>
<td style="width: 44.1984%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 58px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">Graduate In Any Discipline With 50% (UR/OBC/AI), 45% (ST/SC)</span></p>
</td>
<td style="width: 13.1362%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 58px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">2 Yrs.</span></p>
</td>
</tr>
<tr style="height: 38px;">
<td style="width: 7.28667%; border-width: medium 1pt 1pt; border-color: currentcolor windowtext windowtext; border-image: initial; border-top: medium; background: #d3dfee; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">13.</span></strong></p>
</td>
<td style="width: 25.3116%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">B.P.E.S.&nbsp;</span></strong></p>
</td>
<td style="width: 10.0671%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">41000</span></p>
</td>
<td style="width: 44.1984%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">10+2 Or Its Equivalent With 45%</span></p>
</td>
<td style="width: 13.1362%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">3 Yrs.</span></p>
</td>
</tr>
<tr style="height: 38px;">
<td style="width: 7.28667%; border-width: medium 1pt 1pt; border-color: currentcolor windowtext windowtext; border-image: initial; border-top: medium; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">14.</span></strong></p>
</td>
<td style="width: 25.3116%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">BHMCT</span></strong></p>
</td>
<td style="width: 10.0671%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">62000</span></p>
</td>
<td style="width: 44.1984%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">10+2 Or Its Equivalent With 45% (UR),&nbsp; 40%(ST/SC/OBC)</span></p>
</td>
<td style="width: 13.1362%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">4 Yrs.</span></p>
</td>
</tr>
<tr style="height: 38px;">
<td style="width: 7.28667%; border-width: medium 1pt 1pt; border-color: currentcolor windowtext windowtext; border-image: initial; border-top: medium; background: #d3dfee; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">15.</span></strong></p>
</td>
<td style="width: 25.3116%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">B.Sc. (Nursing)</span></strong></p>
</td>
<td style="width: 10.0671%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">80000</span></p>
</td>
<td style="width: 44.1984%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">10+2 (PCB) With 50% (UR), 45% (ST/SC/OBC)</span></p>
</td>
<td style="width: 13.1362%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">4 Yrs.</span></p>
</td>
</tr>
<tr style="height: 38px;">
<td style="width: 7.28667%; border-width: medium 1pt 1pt; border-color: currentcolor windowtext windowtext; border-image: initial; border-top: medium; background: #d3dfee; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">16.</span></strong></p>
</td>
<td style="width: 25.3116%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">BBA</span></strong></p>
</td>
<td style="width: 10.0671%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">21000</span></p>
</td>
<td style="width: 44.1984%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">10+2 Or Its Equivalent With 40% (UR/OBC), 35% (ST/SC)</span></p>
</td>
<td style="width: 13.1362%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">3 Yrs.</span></p>
</td>
</tr>
<tr style="height: 58px;">
<td style="width: 7.28667%; border-width: medium 1pt 1pt; border-color: currentcolor windowtext windowtext; border-image: initial; border-top: medium; padding: 0cm 5.4pt; height: 58px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">17.</span></strong></p>
</td>
<td style="width: 25.3116%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 58px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">BCA</span></strong></p>
</td>
<td style="width: 10.0671%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 58px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">21000</span></p>
</td>
<td style="width: 44.1984%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 58px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">10+2 (PCM) Or Its Equivalent With 50% (UR/OBC), 45% (ST/SC)</span></p>
</td>
<td style="width: 13.1362%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 58px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">3 Yrs.</span></p>
</td>
</tr>
<tr style="height: 38px;">
<td style="width: 7.28667%; border-width: medium 1pt 1pt; border-color: currentcolor windowtext windowtext; border-image: initial; border-top: medium; background: #d3dfee; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">18.</span></strong></p>
</td>
<td style="width: 25.3116%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">B.Sc.&nbsp;</span></strong></p>
</td>
<td style="width: 10.0671%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">16000</span></p>
</td>
<td style="width: 44.1984%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">10+2 (PCM/PCB/Agri.) With 40% (UR), 33% (ST/SC/OBC)</span></p>
</td>
<td style="width: 13.1362%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">3 Yrs.</span></p>
</td>
</tr>
<tr style="height: 52.7167px;">
<td style="width: 7.28667%; border-width: medium 1pt 1pt; border-color: currentcolor windowtext windowtext; border-image: initial; border-top: medium; padding: 0cm 5.4pt; height: 52.7167px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">19.</span></strong></p>
</td>
<td style="width: 25.3116%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 52.7167px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">B.A.</span></strong></p>
</td>
<td style="width: 10.0671%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 52.7167px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">13000</span></p>
</td>
<td style="width: 44.1984%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 52.7167px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">10+2 Or Its Equivalent With 40% (UR), 33% (ST/SC/OBC)</span></p>
</td>
<td style="width: 13.1362%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 52.7167px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">3 Yrs.</span></p>
</td>
</tr>
<tr style="height: 37px;">
<td style="width: 7.28667%; border-width: medium 1pt 1pt; border-color: currentcolor windowtext windowtext; border-image: initial; border-top: medium; background: #d3dfee; padding: 0cm 5.4pt; height: 37px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">20.</span></strong></p>
</td>
<td style="width: 25.3116%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 37px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">B.Com.</span></strong></p>
</td>
<td style="width: 10.0671%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 37px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">16000</span></p>
</td>
<td style="width: 44.1984%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 37px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">10+2 (PCM/PCB/Comm.) With 40% (UR), 33% (ST/SC/OBC)</span></p>
</td>
<td style="width: 13.1362%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 37px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">3 Yrs.</span></p>
</td>
</tr>
<tr style="height: 58px;">
<td style="width: 7.28667%; border-width: medium 1pt 1pt; border-color: currentcolor windowtext windowtext; border-image: initial; border-top: medium; padding: 0cm 5.4pt; height: 58px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">21.</span></strong></p>
</td>
<td style="width: 25.3116%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 58px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">M.Sc.</span></strong></p>
</td>
<td style="width: 10.0671%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 58px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">26000</span></p>
</td>
<td style="width: 44.1984%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 58px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">B.Sc. (Hons) Maths/CS/IT/Physics/Chemistry/Biology As One Subject In B.Sc. With 40% (UR), 33% (ST/SC/OBC)</span></p>
</td>
<td style="width: 13.1362%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 58px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">2 Yrs.</span></p>
</td>
</tr>
<tr style="height: 50.65px;">
<td style="width: 7.28667%; border-width: medium 1pt 1pt; border-color: currentcolor windowtext windowtext; border-image: initial; border-top: medium; background: #d3dfee; padding: 0cm 5.4pt; height: 50.65px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">22.</span></strong></p>
</td>
<td style="width: 25.3116%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 50.65px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">M.A.</span></strong></p>
</td>
<td style="width: 10.0671%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 50.65px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">26000</span></p>
</td>
<td style="width: 44.1984%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 50.65px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">UG With 40% For All Categories</span></p>
</td>
<td style="width: 13.1362%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 50.65px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">2 Yrs.</span></p>
</td>
</tr>
<tr style="height: 53px;">
<td style="width: 7.28667%; border-width: medium 1pt 1pt; border-color: currentcolor windowtext windowtext; border-image: initial; border-top: medium; padding: 0cm 5.4pt; height: 53px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">23.</span></strong></p>
</td>
<td style="width: 25.3116%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 53px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">M.COM.</span></strong></p>
</td>
<td style="width: 10.0671%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 53px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">26000</span></p>
</td>
<td style="width: 44.1984%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 53px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">B.COM Passed For All Categories</span></p>
</td>
<td style="width: 13.1362%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 53px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">2 Yrs.</span></p>
</td>
</tr>
<tr style="height: 112px;">
<td style="width: 7.28667%; border-width: medium 1pt 1pt; border-color: currentcolor windowtext windowtext; border-image: initial; border-top: medium; background: #d3dfee; padding: 0cm 5.4pt; height: 112px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">24.</span></strong></p>
</td>
<td style="width: 25.3116%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 112px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">PGDCA</span></strong></p>
</td>
<td style="width: 10.0671%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 112px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">21000</span></p>
</td>
<td style="width: 44.1984%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 112px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">A Student Who Has Passes 10+2 Examination Of Secondary School Education Board, Bhopal With Mathematics As One Of The Subject At 10+2 Examinations Or Its Equivalent And Have Passed BA/B.Sc / B.Com/ BCA. With 40% (UR), 33% (ST/SC/OBC)</span></p>
</td>
<td style="width: 13.1362%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 112px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">1 Yr.</span></p>
</td>
</tr>
<tr style="height: 53px;">
<td style="width: 7.28667%; border-width: medium 1pt 1pt; border-color: currentcolor windowtext windowtext; border-image: initial; border-top: medium; padding: 0cm 5.4pt; height: 53px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">25.</span></strong></p>
</td>
<td style="width: 25.3116%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 53px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">Bachelor Of Physiotherapy</span></strong></p>
</td>
<td style="width: 10.0671%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 53px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">42000</span></p>
</td>
<td style="width: 44.1984%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 53px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">10+2 (PCB) With 50% (UR), 45% (ST/SC/OBC)</span></p>
</td>
<td style="width: 13.1362%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 53px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">4&frac12; Yrs.</span></p>
</td>
</tr>
<tr style="height: 58px;">
<td style="width: 7.28667%; border-width: medium 1pt 1pt; border-color: currentcolor windowtext windowtext; border-image: initial; border-top: medium; background: #d3dfee; padding: 0cm 5.4pt; height: 58px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">26.</span></strong></p>
</td>
<td style="width: 25.3116%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 58px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">Diploma In X-Ray Radiographer Technician</span></strong></p>
</td>
<td style="width: 10.0671%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 58px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">30000</span></p>
</td>
<td style="width: 44.1984%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 58px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">10+2 (PCB) With 50% (UR), 45% (ST/SC/OBC)</span></p>
</td>
<td style="width: 13.1362%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 58px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">2 Yrs.</span></p>
</td>
</tr>
<tr style="height: 59.0667px;">
<td style="width: 7.28667%; border-width: medium 1pt 1pt; border-color: currentcolor windowtext windowtext; border-image: initial; border-top: medium; padding: 0cm 5.4pt; height: 59.0667px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">27.</span></strong></p>
</td>
<td style="width: 25.3116%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 59.0667px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">D. Pharma (Ayurved)</span></strong></p>
</td>
<td style="width: 10.0671%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 59.0667px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">40000</span></p>
</td>
<td style="width: 44.1984%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 59.0667px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">10+2 (PCB) With 50% (UR), 45% (ST/SC/OBC)</span></p>
</td>
<td style="width: 13.1362%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 59.0667px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">2 Yrs.</span></p>
</td>
</tr>
<tr style="height: 53px;">
<td style="width: 7.28667%; border-width: medium 1pt 1pt; border-color: currentcolor windowtext windowtext; border-image: initial; border-top: medium; background: #d3dfee; padding: 0cm 5.4pt; height: 53px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">28.</span></strong></p>
</td>
<td style="width: 25.3116%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 53px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">DMLT</span></strong></p>
</td>
<td style="width: 10.0671%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 53px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';  ">37000</span></p>
</td>
<td style="width: 44.1984%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 53px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">10+2 (PCB) With 50% (UR), 40% (ST/SC/OBC)</span></p>
</td>
<td style="width: 13.1362%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 53px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';  ">2 Yrs.</span></p>
</td>
</tr>
<tr style="height: 53px;">
<td style="width: 7.28667%; border-width: medium 1pt 1pt; border-color: currentcolor windowtext windowtext; border-image: initial; border-top: medium; padding: 0cm 5.4pt; height: 53px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">29.</span></strong></p>
</td>
<td style="width: 25.3116%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 53px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">Dialysis Technician</span></strong></p>
</td>
<td style="width: 10.0671%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 53px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">40000</span></p>
</td>
<td style="width: 44.1984%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 53px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">10+2 (PCB) With 50% (UR), 45% (ST/SC/OBC)</span></p>
</td>
<td style="width: 13.1362%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 53px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">2 Yrs.</span></p>
</td>
</tr>
<tr style="height: 53px;">
<td style="width: 7.28667%; border-width: medium 1pt 1pt; border-color: currentcolor windowtext windowtext; border-image: initial; border-top: medium; background: #d3dfee; padding: 0cm 5.4pt; height: 53px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">30.</span></strong></p>
</td>
<td style="width: 25.3116%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 53px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">Diploma In Human Nutrition</span></strong></p>
</td>
<td style="width: 10.0671%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 53px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">28000</span></p>
</td>
<td style="width: 44.1984%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 53px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">10+2 (PCB) With 50% (UR), 45% (ST/SC/OBC)</span></p>
</td>
<td style="width: 13.1362%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 53px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">2 Yrs.</span></p>
</td>
</tr>
<tr style="height: 58px;">
<td style="width: 7.28667%; border-width: medium 1pt 1pt; border-color: currentcolor windowtext windowtext; border-image: initial; border-top: medium; padding: 0cm 5.4pt; height: 58px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">31.</span></strong></p>
</td>
<td style="width: 25.3116%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 58px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">Diploma In Blood Transfusion Technician</span></strong></p>
</td>
<td style="width: 10.0671%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 58px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">38000</span></p>
</td>
<td style="width: 44.1984%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 58px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">10+2 (PCB) With 50% (UR), 45% (ST/SC/OBC)</span></p>
</td>
<td style="width: 13.1362%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 58px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">2 Yrs.</span></p>
</td>
</tr>
<tr style="height: 53px;">
<td style="width: 7.28667%; border-width: medium 1pt 1pt; border-color: currentcolor windowtext windowtext; border-image: initial; border-top: medium; background: #d3dfee; padding: 0cm 5.4pt; height: 53px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">32.</span></strong></p>
</td>
<td style="width: 25.3116%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 53px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">Diploma In Yoga</span></strong></p>
</td>
<td style="width: 10.0671%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 53px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">30000</span></p>
</td>
<td style="width: 44.1984%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 53px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">10+2 (PCB) With 50% (UR), 45% (ST/SC/OBC)</span></p>
</td>
<td style="width: 13.1362%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 53px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">2 Yrs.</span></p>
</td>
</tr>
<tr style="height: 58px;">
<td style="width: 7.28667%; border-width: medium 1pt 1pt; border-color: currentcolor windowtext windowtext; border-image: initial; border-top: medium; padding: 0cm 5.4pt; height: 58px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">33.</span></strong></p>
</td>
<td style="width: 25.3116%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 58px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">Medical Laboratory Technology [Haematology] MMLT]</span></strong></p>
</td>
<td style="width: 10.0671%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 58px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">125000</span></p>
</td>
<td style="width: 44.1984%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 58px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">BMLT With 50% For All Category</span></p>
</td>
<td style="width: 13.1362%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 58px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">2 Yrs.</span></p>
</td>
</tr>
<tr style="height: 53px;">
<td style="width: 7.28667%; border-width: medium 1pt 1pt; border-color: currentcolor windowtext windowtext; border-image: initial; border-top: medium; background: #d3dfee; padding: 0cm 5.4pt; height: 53px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">34.</span></strong></p>
</td>
<td style="width: 25.3116%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 53px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">Master Of Physiotherapy [MPT]</span></strong></p>
</td>
<td style="width: 10.0671%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 53px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">120000</span></p>
</td>
<td style="width: 44.1984%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 53px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">BPT With 50% For All Category</span></p>
</td>
<td style="width: 13.1362%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 53px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">2 Yrs.</span></p>
</td>
</tr>
<tr style="height: 53px;">
<td style="width: 7.28667%; border-width: medium 1pt 1pt; border-color: currentcolor windowtext windowtext; border-image: initial; border-top: medium; padding: 0cm 5.4pt; height: 53px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">35.</span></strong></p>
</td>
<td style="width: 25.3116%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 53px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">B.Sc. (Hons.) Agriculture</span></strong></p>
</td>
<td style="width: 10.0671%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 53px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">61000</span></p>
</td>
<td style="width: 44.1984%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 53px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">10+2 In PCM/PCB/ Agriculture With 45%&nbsp;</span></p>
</td>
<td style="width: 13.1362%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 53px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">4 Yrs.</span></p>
</td>
</tr>
<tr style="height: 58px;">
<td style="width: 7.28667%; border-width: medium 1pt 1pt; border-color: currentcolor windowtext windowtext; border-image: initial; border-top: medium; background: #d3dfee; padding: 0cm 5.4pt; height: 58px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">36.</span></strong></p>
</td>
<td style="width: 25.3116%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 58px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">B. Tech. (Dairy Technology)</span></strong></p>
</td>
<td style="width: 10.0671%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 58px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">25000</span></p>
</td>
<td style="width: 44.1984%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 58px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">10+2 (PCM/PCB/Agri.) With 50% (UR),, 45% (OBC), 33% (ST/SC)</span></p>
</td>
<td style="width: 13.1362%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 58px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">4 Yrs.</span></p>
</td>
</tr>
<tr style="height: 38px;">
<td style="width: 7.28667%; border-width: medium 1pt 1pt; border-color: currentcolor windowtext windowtext; border-image: initial; border-top: medium; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">37.</span></strong></p>
</td>
<td style="width: 25.3116%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">Diploma(Engineering)</span></strong></p>
</td>
<td style="width: 10.0671%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">30000</span></p>
</td>
<td style="width: 44.1984%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">10th Or Equivalent Examination Passed&nbsp;</span></p>
</td>
<td style="width: 13.1362%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">3 Yrs.</span></p>
</td>
</tr>
<tr style="height: 38px;">
<td style="width: 7.28667%; border-width: medium 1pt 1pt; border-color: currentcolor windowtext windowtext; border-image: initial; border-top: medium; background: #d3dfee; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">38.</span></strong></p>
</td>
<td style="width: 25.3116%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">L.L.B.</span></strong></p>
</td>
<td style="width: 10.0671%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">25600</span></p>
</td>
<td style="width: 44.1984%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">Graduate In Any Discipline With 45% (UR/OBC), 40% (ST/SC)</span></p>
</td>
<td style="width: 13.1362%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">3 Yrs.</span></p>
</td>
</tr>
<tr>
<td style="width: 7.28667%; border-width: medium 1pt 1pt; border-color: currentcolor windowtext windowtext; border-image: initial; border-top: medium; background: #d3dfee; padding: 0cm 5.4pt;">
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">39</span></strong></p>
</td>
<td style="width: 25.3116%; border-width: medium 1pt 1pt medium; border-top-style: none; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt;">
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">B.A.LL.B.</span></strong></p>
</td>
<td style="width: 10.0671%; border-width: medium 1pt 1pt medium; border-top-style: none; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt;">
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">22000</span></p>
</td>
<td style="width: 44.1984%; border-width: medium 1pt 1pt medium; border-top-style: none; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt;">
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">10+2 Any Discipline With 45% (UR), 40% (ST/SC/OBC)</span></p>
</td>
<td style="width: 13.1362%; border-width: medium 1pt 1pt medium; border-top-style: none; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt;">
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">5 Yrs.</span></p>
</td>
</tr>
<tr style="height: 38px;">
<td style="width: 7.28667%; border-width: medium 1pt 1pt; border-color: currentcolor windowtext windowtext; border-image: initial; border-top: medium; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">39.</span></strong></p>
</td>
<td style="width: 25.3116%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">B. Lib.</span></strong></p>
</td>
<td style="width: 10.0671%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">15000</span></p>
</td>
<td style="width: 44.1984%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">Graduate In Any Discipline</span></p>
</td>
<td style="width: 13.1362%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 38px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">1 Yr.</span></p>
</td>
</tr>
<tr style="height: 58px;">
<td style="width: 7.28667%; border-width: medium 1pt 1pt; border-color: currentcolor windowtext windowtext; border-image: initial; border-top: medium; background: #d3dfee; padding: 0cm 5.4pt; height: 58px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">40.</span></strong></p>
</td>
<td style="width: 25.3116%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 58px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">B.H.M.S.</span></strong></p>
</td>
<td style="width: 10.0671%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 58px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">150000</span></p>
</td>
<td style="width: 44.1984%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 58px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">10+2 In PCB&nbsp;With Minimum 45% For SC/ST/OBC And 50% For UR</span></p>
</td>
<td style="width: 13.1362%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; background: #d3dfee; padding: 0cm 5.4pt; height: 58px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">5.5 Yrs.</span></p>
</td>
</tr>
<tr style="height: 58px;">
<td style="width: 7.28667%; border-width: medium 1pt 1pt; border-color: currentcolor windowtext windowtext; border-image: initial; border-top: medium; padding: 0cm 5.4pt; height: 58px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">41.</span></strong></p>
</td>
<td style="width: 25.3116%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 58px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><strong><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">B.A.M.S.</span></strong></p>
</td>
<td style="width: 10.0671%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 58px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">247300</span></p>
</td>
<td style="width: 44.1984%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 58px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">10+2 In PCB&nbsp;With Minimum 45% For SC/ST/OBC And 50% For UR</span></p>
</td>
<td style="width: 13.1362%; border-width: medium 1pt 1pt medium; border-top: medium; border-left: medium; border-color: currentcolor windowtext windowtext currentcolor; padding: 0cm 5.4pt; height: 58px;" valign="top" >
<p class="MsoNormal" style=" margin-bottom: .0001pt; line-height: normal; "><span style="font-size: 12pt; font-family: 'Times New Roman', 'serif';">5.5 Yrs.</span></p>
</td>
</tr>
</tbody>
</table>
</div>
<p class="MsoNormal" style=" margin-bottom: .0001pt; text-align: center; line-height: normal;" align="center"><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';  ">&nbsp;&nbsp;</span></p>

<p class="MsoNormal"><span style="font-family: 'arial black', sans-serif; color: #e67e23; font-size: 14pt;"><strong>Fees Refund Policy <a href="https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Fees_Refund_Policy_04012025_0322.pdf" target="_blank" rel="noopener"><span style="color: #e03e2d;"><em><span style="font-family: 'times new roman', times, serif;">Click Here</span></em></span></a></strong></span></p>
          </div><!-- end fs-content-body -->
        </div><!-- end fs-main-card -->
      </div><!-- end col-lg-8 -->

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>