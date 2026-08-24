<!-- Top Notification & Quick Help Bar (Website.html Replicated Style) -->
<div class="top-notice-bar py-1">
  <div class="container-fluid px-lg-5">
    <div class="row align-items-center gy-1">
      
      <!-- Live Announcements Marquee (Left) -->
      <div class="col-lg-6 col-md-5 d-flex align-items-center">
        <div class="top-marquee-container flex-grow-1">
          <div class="top-marquee">
            <span class="text-white"><i class="fa fa-bullhorn text-warning me-2"></i>Welcome to Sri Satya Sai University of Technology and Medical Sciences the Premier University in Madhya Pradesh.</span>
            <span class="text-white ms-4"><i class="fa fa-circle-info text-warning me-2"></i>Online Admissions Open for Session 2026-27 (UG / PG / Ph.D.)</span>
            <!-- Seamless continuous loop -->
            <span class="text-white ms-4"><i class="fa fa-bullhorn text-warning me-2"></i>Welcome to Sri Satya Sai University of Technology and Medical Sciences the Premier University in Madhya Pradesh.</span>
          </div>
        </div>
      </div>

      <!-- Right Quick Access Badges & Logins -->
      <div class="col-lg-6 col-md-7 d-flex justify-content-md-end justify-content-between align-items-center top-quick-links flex-wrap">
        <a href="https://wa.me/917748900028" target="_blank" rel="noopener" class="top-helpline-badge text-decoration-none me-2">
          <i class="fa-brands fa-whatsapp me-1"></i> For Admission: <strong><?php echo ADMISSION_HELPLINE; ?></strong>
        </a>
        <div class="d-flex align-items-center gap-3 top-social-nav">
          <a href="https://outlook.office.com/" target="_blank" rel="noopener" title="Webmail"><i class="fa fa-envelope text-info"></i> <span>Webmail</span></a>
          <a href="<?php echo BASE_URL; ?>erp-login.php" title="Student & Staff ERP"><i class="fa fa-user-lock text-warning"></i> <span>Office Login</span></a>
          <a href="<?php echo BASE_URL; ?>admin/login.php" class="text-warning fw-semibold" title="Admin Portal"><i class="fa fa-shield-halved"></i> <span>Admin</span></a>
          <div class="d-none d-xl-flex align-items-center gap-2 border-start border-white border-opacity-25 ps-2">
            <a href="https://www.facebook.com/sehoresssutms" target="_blank" rel="noopener" class="text-white-50 hover-white"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="https://www.youtube.com/@srisatyasaiuniversityoftec815" target="_blank" rel="noopener" class="text-white-50 hover-white"><i class="fa-brands fa-youtube"></i></a>
            <a href="https://www.instagram.com/srisatyasai_universitysehore/" target="_blank" rel="noopener" class="text-white-50 hover-white"><i class="fa-brands fa-instagram"></i></a>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<!-- Header Middle (Brand Logo + Quick Fast Link Matrix from Website.html) -->
<header class="brand-header py-2 bg-white">
  <div class="container-fluid px-lg-5">
    <div class="row align-items-center gy-2">
      
      <!-- Col 1: University Official Logo Banner -->
      <div class="col-xl-5 col-lg-5 col-md-12 text-center text-lg-start">
        <a href="<?php echo BASE_URL; ?>index.php" class="d-inline-block text-decoration-none">
          <img src="<?php echo BASE_URL; ?>assets/images/logo21.png" alt="Sri Satya Sai University of Technology & Medical Sciences" class="brand-logo-img" onerror="this.src='<?php echo BASE_URL; ?>assets/images/logo/logo21.png'">
        </a>
      </div>

      <!-- Col 2: Quick Links Column 1 -->
      <div class="col-xl-4 col-lg-4 col-md-6 d-none d-md-block">
        <ul class="header-fast-links mb-0 ps-0 list-unstyled">
          <li>
            <a href="<?php echo BASE_URL; ?>erp-login.php">
              <i class="fa fa-users text-primary me-2 animated-flash"></i>Student/Admin Login
            </a>
          </li>
          <li>
            <a href="<?php echo BASE_URL; ?>Examination/EntranceExamAlert.php">
              <i class="fa fa-book text-warning me-2 animated-flash"></i>Entrance Exam (2026-2027)
            </a>
          </li>
          <li>
            <a href="<?php echo BASE_URL; ?>Download/Alumni.php">
              <i class="fa fa-graduation-cap text-success me-2 animated-flash"></i>Alumni Registration Form
            </a>
          </li>
          <li>
            <a href="<?php echo BASE_URL; ?>About/ApprovalsAndOrdinances/Approvals.php">
              <i class="fa fa-download text-danger me-2 animated-flash"></i>Proposal for Off Campus Centre
            </a>
          </li>
        </ul>
      </div>

      <!-- Col 3: Quick Links Column 2 & Enquiry Trigger -->
      <div class="col-xl-3 col-lg-3 col-md-6 d-none d-md-block">
        <ul class="header-fast-links mb-0 ps-0 list-unstyled">
          <li>
            <a href="<?php echo BASE_URL; ?>Admission/AdmissionRegistration.php">
              <i class="fa fa-square-plus text-danger me-2 animated-flash"></i>E-Pravesh (2026-2027)
            </a>
          </li>
          <li>
            <a href="<?php echo BASE_URL; ?>About/Public_Self_Disclosure.php">
              <i class="fa fa-book text-info me-2 animated-flash"></i>Public Self Disclosure
            </a>
          </li>
          <li>
            <a href="<?php echo BASE_URL; ?>verify-marksheet.php">
              <i class="fa fa-square-check text-success me-2 animated-flash"></i>Document Verification
            </a>
          </li>
          <li>
            <a href="#" data-bs-toggle="modal" data-bs-target="#enquiryModal" class="d-inline-flex align-items-center gap-1">
              <i class="fa fa-square-check text-warning me-2 animated-flash"></i>Admission 2026-27 Enquiry
              <img src="<?php echo BASE_URL; ?>assets/images/click-here.gif" class="header-click-here-img" alt="Click Here" onerror="this.style.display='none'">
            </a>
          </li>
        </ul>
      </div>

    </div>
  </div>
</header>
