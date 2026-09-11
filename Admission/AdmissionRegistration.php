<?php
require_once __DIR__ . '/../config.php';

// Load dynamic data from JSON
$admissionData = get_json_data('admission_data.json', []);
$regData = $admissionData['AdmissionRegistration'] ?? [
    'page_title' => 'Admission Registration',
    'heading' => 'Admission Registration (Session 2026-27)',
    'epravesh_label' => 'E-Pravesh 2026(Online Enquiry Form)',
    'epravesh_url' => 'https://www.sssutms.co.in/erp/Student/Registration/Index/ojdZaOYsXtpmswGfjiVVww%3d%3d',
    'instructions' => [
        'Click on the official E-Pravesh registration portal link above.',
        'Select your desired Course / Faculty / Department.',
        'Fill in candidate details, qualifications, and upload required credentials.',
        'Submit the form and retain the generated application number for counselling.'
    ]
];

$page_title = ($regData['page_title'] ?? 'Admission Registration') . ' - SSSUTMS';
$banner_title = $regData['page_title'] ?? 'Admission Registration';
$banner_category = 'Admission';

require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?>

<!-- Bootstrap Icons CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

<style>
.adm-card {
  background: #ffffff;
  border-radius: 16px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 8px 24px rgba(15, 23, 42, 0.04);
  overflow: hidden;
}
.adm-card-header {
  background: linear-gradient(135deg, #0b2545 0%, #1e4d8c 100%);
  padding: 1.5rem 2rem;
  border-top-left-radius: 16px;
  border-top-right-radius: 16px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  position: relative;
}
.adm-card-header::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.adm-card-header h2,
.adm-card-header h2 i {
  color: #ffffff !important;
  font-size: 1.45rem;
  font-weight: 700;
  letter-spacing: -0.02em;
}
.adm-card-header span,
.adm-card-header small {
  color: rgba(255, 255, 255, 0.85) !important;
}
.epravesh-box {
  background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
  border: 2px solid #86efac;
  border-radius: 14px;
  padding: 2rem;
  text-align: center;
  box-shadow: 0 4px 16px rgba(34, 197, 94, 0.1);
  margin-bottom: 2rem;
}
.epravesh-btn {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  background: #16a34a;
  color: #ffffff !important;
  font-size: 1.25rem;
  font-weight: 800;
  padding: 14px 32px;
  border-radius: 50px;
  text-decoration: none;
  box-shadow: 0 6px 20px rgba(22, 163, 74, 0.35);
  transition: all 0.25s ease;
}
.epravesh-btn:hover {
  background: #15803d;
  transform: translateY(-3px);
  box-shadow: 0 10px 24px rgba(22, 163, 74, 0.45);
}
.instruction-step {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-left: 4px solid #0b2545;
  border-radius: 10px;
  padding: 1rem 1.25rem;
  margin-bottom: 0.75rem;
  display: flex;
  align-items: center;
  gap: 12px;
}
</style>

<section class="py-5 bg-light">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content (Left Column) -->
      <div class="col-lg-8 col-xl-9">
        <div class="adm-card">
          <div class="adm-card-header">
            <div>
              <h2 class="fs-4 mb-0 fw-bold d-flex align-items-center">
                <i class="bi bi-journal-text me-2"></i> <?php echo htmlspecialchars($regData['page_title'] ?? 'Admission Registration'); ?>
              </h2>
              <span class="text-white-50 extra-small">Online Application, Seat Reservation &amp; Document Submission</span>
            </div>
            <span class="badge bg-success text-white fw-bold px-3 py-1.5 rounded-pill">
              <i class="fa-solid fa-circle-check me-1"></i> Open for 2026-27
            </span>
          </div>

          <div class="card-body p-4 p-md-5">
            <article class="fs-5 lh-lg text-secondary">

              <!-- Heading -->
              <div class="text-center mb-4">
                <h3 class="fw-bold mb-1" style="color: #ff9c00;">
                  <?php echo htmlspecialchars($regData['heading'] ?? 'Admission Registration'); ?>
                </h3>
                <p class="text-muted small">Centralized Online Admission Registration via E-Pravesh Portal</p>
              </div>

              <!-- Live E-Pravesh Box -->
              <div class="epravesh-box">
                <div class="mb-3">
                  <i class="fa-solid fa-graduation-cap text-success" style="font-size: 3.2rem;"></i>
                </div>
                <h4 class="fw-bold text-dark mb-2">Online Registration &amp; Admission Enquiry Portal</h4>
                <p class="text-muted small mb-4 mx-auto" style="max-width: 620px;">
                  Prospective applicants seeking admission to Undergraduate, Postgraduate, Diploma, and Ph.D. programs can submit applications directly online.
                </p>
                <a href="<?php echo htmlspecialchars($regData['epravesh_url'] ?? 'https://www.sssutms.co.in/erp/Student/Registration/Index/ojdZaOYsXtpmswGfjiVVww%3d%3d'); ?>" target="_blank" rel="noopener" class="epravesh-btn">
                  <i class="fa-solid fa-arrow-up-right-from-square"></i>
                  <span><?php echo htmlspecialchars($regData['epravesh_label'] ?? 'E-Pravesh 2026(Online Enquiry Form)'); ?></span>
                </a>
              </div>

              <!-- Application Instructions -->
              <h5 class="fw-bold text-dark mb-3">
                <i class="fa-solid fa-list-check text-primary me-2"></i>Step-by-Step Registration Instructions
              </h5>
              <div class="mb-4">
                <?php 
                $instructions = $regData['instructions'] ?? [];
                foreach ($instructions as $idx => $inst): 
                ?>
                  <div class="instruction-step">
                    <div class="badge rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="width: 28px; height: 28px; flex-shrink: 0;">
                      <?php echo $idx + 1; ?>
                    </div>
                    <span class="text-dark small fw-semibold"><?php echo htmlspecialchars($inst); ?></span>
                  </div>
                <?php endforeach; ?>
              </div>

              <!-- Support Help -->
              <div class="p-3.5 p-md-4 rounded-3 bg-light border border-slate-200 d-flex align-items-center justify-content-between flex-wrap gap-3">
                <div>
                  <h6 class="fw-bold text-dark mb-1">Facing technical issues during registration?</h6>
                  <p class="text-muted small mb-0">Our admission counseling team is available Monday to Saturday (10 AM - 5 PM).</p>
                </div>
                <a href="Admission_Enquiry.php" class="btn btn-outline-primary btn-sm rounded-pill fw-bold px-3">
                  <i class="fa-solid fa-headset me-1"></i> Contact Helpline
                </a>
              </div>

            </article>
          </div>
        </div>
      </div>

      <!-- Right Column: Reusable Admission Sidebar -->
      <?php require_once __DIR__ . '/includes/admission_sidebar.php'; ?>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>