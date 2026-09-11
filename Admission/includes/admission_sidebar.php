<?php
$currentAdmissionPage = basename($_SERVER['PHP_SELF']);
$admissionMenu = [
    'Admission_Enquiry.php' => ['label' => 'Admission Enquiry', 'icon' => 'fa-headset'],
    'AdmissionNotice.php' => ['label' => 'Admission Notice', 'icon' => 'fa-bullhorn'],
    'AdmissionProcedure.php' => ['label' => 'Admission Procedure', 'icon' => 'fa-route'],
    'FeesStructure.php' => ['label' => 'Fees Structure', 'icon' => 'fa-receipt'],
    'UniversityAccountDetail.php' => ['label' => 'University Account Detail', 'icon' => 'fa-building-columns'],
    'Brochures.php' => ['label' => 'Brochures', 'icon' => 'fa-book-open-reader'],
    'AdmissionRegistration.php' => ['label' => 'Admission Registration', 'icon' => 'fa-user-pen']
];
?>
<div class="col-lg-4 col-xl-3">
  <!-- Admission Quick Navigation Menu -->
  <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
    <div class="card-header bg-gradient bg-primary text-white py-3 px-4">
      <h5 class="mb-0 fw-bold fs-6"><i class="fa-solid fa-graduation-cap me-2"></i>Admission Navigation</h5>
    </div>
    <div class="list-group list-group-flush p-2">
      <?php foreach ($admissionMenu as $file => $item): ?>
        <a href="<?php echo $file; ?>" 
           class="list-group-item list-group-item-action d-flex align-items-center justify-content-between rounded-3 mb-1 border-0 py-2.5 px-3 <?php echo ($currentAdmissionPage === $file) ? 'active bg-primary text-white fw-bold shadow-sm' : 'text-secondary fw-semibold'; ?>">
          <div class="d-flex align-items-center gap-2">
            <i class="fa-solid <?php echo $item['icon']; ?> <?php echo ($currentAdmissionPage === $file) ? 'text-white' : 'text-primary'; ?>" style="width: 20px;"></i>
            <span><?php echo $item['label']; ?></span>
          </div>
          <i class="fa-solid fa-chevron-right extra-small opacity-75"></i>
        </a>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- Admission Open Guidance Card -->
  <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4 text-white" style="background: linear-gradient(145deg, #0b2545 0%, #134074 100%);">
    <div class="card-body p-4 text-center">
      <span class="badge bg-warning text-dark fw-bold px-3 py-1.5 rounded-pill mb-3 uppercase" style="letter-spacing: 0.5px;">
        <i class="fa-solid fa-fire me-1"></i> ADMISSION OPEN 2026-27
      </span>
      <h5 class="fw-bold text-white mb-2">Need Guidance?</h5>
      <p class="text-white-50 small mb-4">Speak with our academic counseling team for course eligibility &amp; fee details.</p>
      
      <div class="p-3 rounded-3 mb-3 text-start" style="background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.12);">
        <div class="d-flex align-items-center gap-3 mb-2">
          <div class="rounded-circle d-flex align-items-center justify-content-center bg-warning text-dark fw-bold" style="width: 36px; height: 36px; flex-shrink: 0;">
            <i class="fa-solid fa-phone"></i>
          </div>
          <div>
            <span class="text-white-50 extra-small d-block fw-semibold">Admission Helpline</span>
            <strong class="text-white small">+91-7748900028</strong>
          </div>
        </div>
        <div class="d-flex align-items-center gap-3">
          <div class="rounded-circle d-flex align-items-center justify-content-center bg-warning text-dark fw-bold" style="width: 36px; height: 36px; flex-shrink: 0;">
            <i class="fa-solid fa-phone-volume"></i>
          </div>
          <div>
            <span class="text-white-50 extra-small d-block fw-semibold">Campus Landline</span>
            <strong class="text-white small">07562-292740 / 720</strong>
          </div>
        </div>
      </div>

      <a href="Admission_Enquiry.php" class="btn btn-warning w-100 fw-bold py-2 text-dark shadow-sm">
        <i class="fa-solid fa-paper-plane me-1"></i> Quick Online Enquiry
      </a>
    </div>
  </div>

  <!-- E-Pravesh Online Portal Link -->
  <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-light p-3 border">
    <div class="d-flex align-items-center gap-3">
      <div class="rounded-circle bg-success text-white d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; flex-shrink: 0;">
        <i class="fa-solid fa-laptop-code fs-5"></i>
      </div>
      <div>
        <h6 class="fw-bold text-dark mb-0 fs-6">E-Pravesh Portal</h6>
        <span class="text-muted extra-small">Online Application &amp; Registration</span>
      </div>
    </div>
    <a href="https://www.sssutms.co.in/erp/Student/Registration/Index/ojdZaOYsXtpmswGfjiVVww%3d%3d" target="_blank" rel="noopener" class="btn btn-outline-success btn-sm w-100 fw-bold mt-3">
      Register Online <i class="fa-solid fa-arrow-up-right-from-square ms-1"></i>
    </a>
  </div>
</div>
