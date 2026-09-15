<?php
$currentAdmissionPage = basename($_SERVER['PHP_SELF']);
$admissionMenu = [
    'Admission_Enquiry.php' => 'Admission Enquiry',
    'AdmissionNotice.php' => 'Admission Notice',
    'AdmissionProcedure.php' => 'Admission Procedure',
    'FeesStructure.php' => 'Fees Structure',
    'UniversityAccountDetail.php' => 'University Account Detail',
    'Brochures.php' => 'Brochures',
    'AdmissionRegistration.php' => 'Admission Registration'
];
?>
<div class="col-lg-3">
  <div class="card shadow border-0 rounded-4 h-100 overflow-hidden">
    <div class="adm-card-header">
      <h2 class="mb-0 fw-bold fs-4 d-flex align-items-center">
        <i class="bi bi-list-task me-2"></i> Admission
      </h2>
    </div>
    <div class="card-body text-left p-4">
      <ul class="list-unstyled mb-0 d-flex flex-column gap-3">
        <?php foreach ($admissionMenu as $file => $label): ?>
          <li>
            <a href="<?php echo $file; ?>" 
               class="text-decoration-none d-flex align-items-center py-1 <?php echo ($currentAdmissionPage === $file) ? 'text-primary fw-bold' : 'text-dark'; ?>"
               style="font-size: 15px; transition: color 0.2s;">
              <i class="fa fa-globe text-secondary me-3" style="font-size: 16px; min-width: 18px;"></i> 
              <span><?php echo $label; ?></span>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</div>
