<?php
$page_title = 'admissions - SSSUTMS';
$banner_title = 'admissions';
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
    <h1 class="fw-bold text-white mb-2">Admissions Session 2026-27</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="index.php" class="text-warning">Home</a></li>
        <li class="breadcrumb-item active text-white-50" aria-current="page">Admissions & Fee Structure</li>
      </ol>
    </nav>
  </div>
</div>

<div class="container-fluid px-lg-5 py-5">

<!-- Left 8 Cols: Procedures & Tables -->
    <div class="col-lg-8">
      
      <!-- Admission Notice Alert -->
      <div class="alert alert-warning border-0 shadow-sm rounded-4 p-4 mb-4 d-flex align-items-center justify-content-between">
        <div>
          <h5 class="fw-bold text-dark mb-1"><i class="fa fa-bullhorn text-danger me-2"></i> E-Pravesh Online Admissions Open</h5>
          <p class="small text-muted mb-0">Applications are currently invited for all Undergraduate, Postgraduate, and Ph.D. programs for the academic year 2026-27.</p>
        </div>
        <a href="student-registration.php" class="btn btn-primary fw-bold px-4 py-2 rounded-pill shadow-sm" style="background: var(--accent-gradient); border:none;">Register Online</a>
      </div>

      <!-- Section 1: Admission Procedure Steps -->
      <div id="procedure" class="card border-0 shadow-sm rounded-4 p-4 mb-4 bg-white">
        <span class="section-subtitle">How To Apply</span>
        <h3 class="section-title">4-Step Admission Procedure</h3>

<div class="col-md-6">
            <div class="p-3 border rounded-3 h-100 bg-light">
              <div class="badge bg-primary rounded-pill mb-2">Step 1</div>
              <h6 class="fw-bold">Online Application</h6>
              <p class="small text-muted mb-0">Fill out the online application form on our portal with your personal and qualifying examination details.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="p-3 border rounded-3 h-100 bg-light">
              <div class="badge bg-primary rounded-pill mb-2">Step 2</div>
              <h6 class="fw-bold">Document Verification</h6>
              <p class="small text-muted mb-0">Upload 10th/12th marksheets, graduation transcripts, category certificate, and government photo ID.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="p-3 border rounded-3 h-100 bg-light">
              <div class="badge bg-primary rounded-pill mb-2">Step 3</div>
              <h6 class="fw-bold">Merit / Entrance Allocation</h6>
              <p class="small text-muted mb-0">Seat allocation based on qualifying merit or CEET / NEET entrance ranks as applicable.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="p-3 border rounded-3 h-100 bg-light">
              <div class="badge bg-primary rounded-pill mb-2">Step 4</div>
              <h6 class="fw-bold">Fee Payment & Enrollment</h6>
              <p class="small text-muted mb-0">Submit the enrollment fee through online banking/NEFT to confirm your seat and receive your enrollment ID.</p>
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