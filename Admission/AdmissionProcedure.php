<?php
require_once __DIR__ . '/../config.php';

// Load dynamic data from JSON
$admissionData = get_json_data('admission_data.json', []);
$procData = $admissionData['AdmissionProcedure'] ?? [
    'page_title' => 'Admission Procedure',
    'lead_title' => 'Admission Procedure',
    'description' => 'Admissions to various Technical, Professional & General Courses will be made in accordance with the guidelines provided by University Regulatory Authority, M.P. & State Government of Madhya Pradesh, as amended or suggested from time to time. The fees charged for all the courses will be as per approval accorded by Madhya Pradesh Niji Vishwavidyalaya Niyamak Aayog , Bhopal (Madhya Pradesh)',
    'pdf_link' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Admission/adm_procedure.pdf',
    'pdf_label' => 'Admission Procedure(Click Here)',
    'image' => 'assets/images/admission/AdmissionProcedure_img_0.jpg'
];

$page_title = ($procData['page_title'] ?? 'Admission Procedure') . ' - SSSUTMS';
$banner_title = $procData['page_title'] ?? 'Admission Procedure';
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
.adm-pdf-btn {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: #e03e2d;
  color: #ffffff !important;
  padding: 10px 20px;
  border-radius: 8px;
  font-weight: 700;
  font-size: 1rem;
  text-decoration: none;
  transition: all 0.25s ease;
  box-shadow: 0 4px 12px rgba(224, 62, 45, 0.25);
}
.adm-pdf-btn:hover {
  background: #c03223;
  transform: translateY(-2px);
  box-shadow: 0 6px 18px rgba(224, 62, 45, 0.35);
}
.adm-banner-img {
  width: 100%;
  max-width: 980px;
  border-radius: 12px;
  box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
  border: 1px solid #e2e8f0;
  transition: transform 0.3s ease;
}
.adm-banner-img:hover {
  transform: scale(1.005);
}
</style>

<section class="py-5 bg-light">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content (Left Column) -->
      <div class="col-lg-8 col-xl-9">
        <div class="adm-card">
          <div class="adm-card-header">
            <h2 class="fs-4 mb-0 fw-bold d-flex align-items-center">
              <i class="bi bi-journal-text me-2"></i> <?php echo htmlspecialchars($procData['page_title'] ?? 'Admission Procedure'); ?>
            </h2>
            <a href="<?php echo htmlspecialchars($procData['pdf_link'] ?? '#'); ?>" target="_blank" rel="noopener" class="adm-pdf-btn d-none d-sm-inline-flex">
              <i class="fa-solid fa-file-pdf"></i> Download PDF
            </a>
          </div>

          <div class="card-body p-4 p-md-5">
            <article class="fs-5 lh-lg text-secondary">
              
              <!-- Section Lead Title -->
              <h4 class="text-center fw-bold text-dark mb-4 pb-2 border-bottom border-warning d-inline-block mx-auto" style="border-width: 3px !important;">
                <?php echo htmlspecialchars($procData['lead_title'] ?? 'Admission Procedure'); ?>
              </h4>

              <!-- Statutory / Regulatory Approval Text -->
              <div class="p-4 rounded-3 mb-4 bg-light border border-slate-200">
                <p class="text-dark mb-0 fs-6 lh-base text-justify" style="text-align: justify;">
                  <?php echo nl2br(htmlspecialchars($procData['description'] ?? '')); ?>
                </p>
              </div>

              <!-- Official PDF Action Link -->
              <div class="mb-4 text-center text-md-start">
                <a href="<?php echo htmlspecialchars($procData['pdf_link'] ?? '#'); ?>" target="_blank" rel="noopener" class="adm-pdf-btn">
                  <i class="fa-solid fa-file-arrow-down"></i>
                  <em><strong><?php echo htmlspecialchars($procData['pdf_label'] ?? 'Admission Procedure(Click Here)'); ?></strong></em>
                </a>
              </div>

              <!-- Official Step-by-Step Flowchart Image -->
              <?php if (!empty($procData['image'])): ?>
                <div class="text-center my-4">
                  <img src="../<?php echo htmlspecialchars($procData['image']); ?>" 
                       alt="Admission Procedure Diagram" 
                       class="adm-banner-img img-fluid"
                       onerror="this.src='https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Admission/Adm_Adv.jpg'">
                </div>
              <?php endif; ?>

              <!-- Quick Links Footer within Card -->
              <div class="pt-4 mt-4 border-top d-flex justify-content-between align-items-center flex-wrap gap-2">
                <span class="small text-muted">
                  <i class="fa-solid fa-shield-halved text-success me-1"></i> Approved by M.P. Niji Vishwavidyalaya Niyamak Aayog
                </span>
                <a href="FeesStructure.php" class="btn btn-outline-primary btn-sm rounded-pill fw-bold">
                  View Fee Structure <i class="fa-solid fa-arrow-right ms-1"></i>
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
