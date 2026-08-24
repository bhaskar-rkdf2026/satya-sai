<?php
$page_title = 'examinations - SSSUTMS';
$banner_title = 'examinations';
$banner_category = 'SSSUTMS';

require_once __DIR__ . '/./config.php';
require_once __DIR__ . '/./includes/header.php';
require_once __DIR__ . '/./includes/topbar.php';
require_once __DIR__ . '/./includes/navbar.php';
require_once __DIR__ . '/./includes/page-banner.php';
?>

<section class="subpage-main-section py-4 bg-light">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="content-card">
          <div class="content-card-body">
            <!-- Page Header Breadcrumb -->
<div class="py-5 text-white" style="background: var(--primary-gradient);">
  <div class="container-fluid px-lg-5">
    <h1 class="fw-bold text-white mb-2">Examinations & Results Portal</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="index.php" class="text-warning">Home</a></li>
        <li class="breadcrumb-item active text-white-50" aria-current="page">Examination Cell & Results</li>
      </ol>
    </nav>
  </div>
</div>

<div class="container-fluid px-lg-5 py-5">

<!-- Left Column: Examination Notices & Time Tables -->
    <div class="col-lg-8">
      
      <!-- Section 1: Interactive Results Search Box -->
      <div id="results" class="card border-0 shadow-sm rounded-4 p-4 mb-4 bg-white" style="border-top: 4px solid var(--accent) !important;">
        <span class="section-subtitle">Live Portal</span>
        <h3 class="section-title">Online Examination Results</h3>
        <div class="section-divider mb-3"></div>
        <p class="small text-muted mb-4">Enter your University Enrollment Number or Roll Number to view and download your provisional marksheet.</p>

        <form id="resultSearchForm" onsubmit="event.preventDefault(); document.getElementById('resultOutput').classList.remove('d-none');">
          
            <div class="col-md-5">
              <label class="form-label small fw-bold">Enrollment Number / Roll Number *</label>
              <input type="text" id="resultRoll" class="form-control" placeholder="e.g. SSS2023-1045" required>
            </div>
            <div class="col-md-4">
              <label class="form-label small fw-bold">Semester / Year *</label>
              <select class="form-select" required>
                <option value="">Select Semester</option>
                <option value="1">1st Semester / 1st Professional</option>
                <option value="2">2nd Semester</option>
                <option value="3">3rd Semester / 2nd Professional</option>
                <option value="4">4th Semester</option>
                <option value="5">5th Semester / 3rd Professional</option>
                <option value="6">6th Semester</option>
                <option value="7">7th Semester</option>
                <option value="8">8th Semester / Final Year</option>
              </select>
            </div>
            <div class="col-md-3 d-flex align-items-end">
              <button type="submit" class="btn btn-primary w-100 fw-bold rounded-3" style="background: var(--primary); border:none;">
                <i class="fa fa-magnifying-glass me-1"></i> Search Result
              </button>
            </div>
          </div>
        </form>

        <!-- Result Output Card (Initially hidden) -->
        <div id="resultOutput" class="alert alert-success d-none mt-4 border-0 shadow-sm rounded-3">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <h6 class="fw-bold mb-0 text-success"><i class="fa fa-circle-check me-2"></i> Result Declared - PASSED</h6>
            <span class="badge bg-success">Status: Regular</span>
          </div>
          <p class="small mb-1"><strong>Student Name:</strong> SSSUTMS Enrolled Scholar | <strong>Course:</strong> B.Tech (CSE) VIII Sem</p>
          <p class="small mb-2"><strong>SGPA / CGPA:</strong> 8.65 / 10.0 (First Division with Distinction)</p>
          <button class="btn btn-sm btn-outline-success fw-bold" onclick="window.print()"><i class="fa fa-print me-1"></i> Print Provisional Grade Card</button>
        </div>
      </div>

      <!-- Section 2: Exam Notifications & Time Tables -->
      <div id="notifications" class="card border-0 shadow-sm rounded-4 p-4 bg-white">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <div>
            <span class="section-subtitle">Exam Updates</span>
            <h3 class="section-title mb-0">Notifications & Time Tables</h3>
          </div>
          <span class="badge bg-primary rounded-pill px-3 py-2">Session 2026</span>
        </div>
        <div class="section-divider mb-4"></div>

        <div class="list-group list-group-flush">
          </div>
        </div>
      </div>

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/./includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/./includes/footer.php'; ?>