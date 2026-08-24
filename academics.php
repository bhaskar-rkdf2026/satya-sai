<?php
$page_title = 'academics - SSSUTMS';
$banner_title = 'academics';
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
    <h1 class="fw-bold text-white mb-2">Academics & Faculties</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="index.php" class="text-warning">Home</a></li>
        <li class="breadcrumb-item active text-white-50" aria-current="page">Academic Faculties & Departments</li>
      </ol>
    </nav>
  </div>
</div>

<div class="container-fluid px-lg-5 py-5">
  
  <!-- Section 1: All Faculties Grid -->
  <div id="faculties" class="mb-5">
    <div class="section-title-wrap text-center mb-5">
      <span class="section-subtitle">Academic Directory</span>
      <h2 class="section-title">Faculties & Departments</h2>
      
      <p class="text-muted mt-2">14 specialized academic faculties providing industry and clinical exposure</p>
    </div>

<!-- 1. Engineering -->
      <div id="engineering" class="col-lg-4 col-md-6">
        <div class="card h-100 border-0 shadow-sm rounded-4 p-4 bg-white">
          <div class="d-flex align-items-center gap-3 mb-3">
            <div class="p-3 bg-primary-subtle text-primary rounded-3 fs-3"><i class="fa fa-microchip"></i></div>
            <div>
              <h5 class="fw-bold mb-0">Faculty of Engineering & Tech</h5>
              <small class="text-muted">AICTE Approved</small>
            </div>
          </div>
          <p class="small text-muted mb-3">Programs: B.Tech, M.Tech, Polytechnic Diploma in CSE, ME, Civil, Electrical, AI & Data Science.</p>
          <ul class="list-unstyled small text-muted mb-4">
            <li><i class="fa fa-check text-success me-2"></i> Duration: 4 Years (UG) / 2 Years (PG)</li>
            <li><i class="fa fa-check text-success me-2"></i> Eligibility: 10+2 with PCM / JEE Main</li>
          </ul>
          <a href="student-registration.php" class="btn btn-outline-primary btn-sm rounded-pill fw-bold">Apply for Engineering</a>
        </div>
      </div>

      <!-- 2. Pharmacy -->
      <div id="pharmacy" class="col-lg-4 col-md-6">
        <div class="card h-100 border-0 shadow-sm rounded-4 p-4 bg-white">
          <div class="d-flex align-items-center gap-3 mb-3">
            <div class="p-3 bg-danger-subtle text-danger rounded-3 fs-3"><i class="fa fa-capsules"></i></div>
            <div>
              <h5 class="fw-bold mb-0">Faculty of Pharmacy</h5>
              <small class="text-muted">PCI Approved</small>
            </div>
          </div>
          <p class="small text-muted mb-3">Programs: B.Pharm, M.Pharm (Pharmaceutics/Pharmacology), D.Pharm.</p>
          <ul class="list-unstyled small text-muted mb-4">
            <li><i class="fa fa-check text-success me-2"></i> Duration: 4 Years (B.Pharm) / 2 Years (M.Pharm)</li>
            <li><i class="fa fa-check text-success me-2"></i> Eligibility: 10+2 with PCB/PCM (50% Min)</li>
          </ul>
          <a href="student-registration.php" class="btn btn-outline-primary btn-sm rounded-pill fw-bold">Apply for Pharmacy</a>
        </div>
      </div>

      <!-- 3. Medical & Ayurveda -->
      <div id="medical" class="col-lg-4 col-md-6">
        <div class="card h-100 border-0 shadow-sm rounded-4 p-4 bg-white">
          <div class="d-flex align-items-center gap-3 mb-3">
            <div class="p-3 bg-success-subtle text-success rounded-3 fs-3"><i class="fa fa-heart-pulse"></i></div>
            <div>
              <h5 class="fw-bold mb-0">Ayurveda (BAMS) & Homoeopathy</h5>
              <small class="text-muted">NCISM & NCH Approved</small>
            </div>
          </div>
          <p class="small text-muted mb-3">Programs: BAMS (Ayurvedic Medicine) and BHMS (Homoeopathic Medicine) with on-campus hospital internships.</p>
          <ul class="list-unstyled small text-muted mb-4">
            <li><i class="fa fa-check text-success me-2"></i> Duration: 5.5 Years (Incl. 1 Year Internship)</li>
            <li><i class="fa fa-check text-success me-2"></i> Eligibility: NEET Qualified + 10+2 PCB</li>
          </ul>
          <a href="student-registration.php" class="btn btn-outline-primary btn-sm rounded-pill fw-bold">Apply for Medical</a>
        </div>
      </div>

      <!-- 4. Management -->
      <div id="management" class="col-lg-4 col-md-6">
        <div class="card h-100 border-0 shadow-sm rounded-4 p-4 bg-white">
          <div class="d-flex align-items-center gap-3 mb-3">
            <div class="p-3 bg-warning-subtle text-warning rounded-3 fs-3"><i class="fa fa-chart-pie"></i></div>
            <div>
              <h5 class="fw-bold mb-0">Faculty of Management</h5>
              <small class="text-muted">AICTE Approved</small>
            </div>
          </div>
          <p class="small text-muted mb-3">Programs: MBA (Finance, Marketing, HR, Business Analytics), BBA, B.Com (Hons).</p>
          <ul class="list-unstyled small text-muted mb-4">
            <li><i class="fa fa-check text-success me-2"></i> Duration: 2 Years (MBA) / 3 Years (BBA)</li>
            <li><i class="fa fa-check text-success me-2"></i> Eligibility: Graduation (50% Min)</li>
          </ul>
          <a href="student-registration.php" class="btn btn-outline-primary btn-sm rounded-pill fw-bold">Apply for Management</a>
        </div>
      </div>

      <!-- 5. Computer Science & MCA -->
      <div class="col-lg-4 col-md-6">
        <div class="card h-100 border-0 shadow-sm rounded-4 p-4 bg-white">
          <div class="d-flex align-items-center gap-3 mb-3">
            <div class="p-3 bg-info-subtle text-info rounded-3 fs-3"><i class="fa fa-laptop-code"></i></div>
            <div>
              <h5 class="fw-bold mb-0">Computer Science & Application</h5>
              <small class="text-muted">UGC & AICTE Approved</small>
            </div>
          </div>
          <p class="small text-muted mb-3">Programs: MCA (2 Years), BCA, B.Sc. Computer Science.</p>
          <ul class="list-unstyled small text-muted mb-4">
            <li><i class="fa fa-check text-success me-2"></i> Duration: 2 Years (MCA) / 3 Years (BCA)</li>
            <li><i class="fa fa-check text-success me-2"></i> Eligibility: Graduation with Mathematics/BCA</li>
          </ul>
          <a href="student-registration.php" class="btn btn-outline-primary btn-sm rounded-pill fw-bold">Apply for MCA/BCA</a>
        </div>
      </div>

      <!-- 6. Nursing & Paramedical -->
      <div class="col-lg-4 col-md-6">
        <div class="card h-100 border-0 shadow-sm rounded-4 p-4 bg-white">
          <div class="d-flex align-items-center gap-3 mb-3">
            <div class="p-3 bg-danger-subtle text-danger rounded-3 fs-3"><i class="fa fa-user-nurse"></i></div>
            <div>
              <h5 class="fw-bold mb-0">Faculty of Nursing & Paramedical</h5>
              <small class="text-muted">INC & MPNRC Approved</small>
            </div>
          </div>
          <p class="small text-muted mb-3">Programs: B.Sc. Nursing, Post Basic B.Sc., Diploma in Medical Lab Tech (DMLT), Dialysis Tech.</p>
          <ul class="list-unstyled small text-muted mb-4">
            <li><i class="fa fa-check text-success me-2"></i> Duration: 4 Years (B.Sc. Nursing) / 2 Years (Diploma)</li>
            <li><i class="fa fa-check text-success me-2"></i> Eligibility: 10+2 with Biology (PCB 45% Min)</li>
          </ul>
          <a href="student-registration.php" class="btn btn-outline-primary btn-sm rounded-pill fw-bold">Apply for Nursing</a>
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