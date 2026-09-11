<?php
require_once __DIR__ . '/../config.php';

// Load dynamic data from JSON
$admissionData = get_json_data('admission_data.json', []);
$broData = $admissionData['Brochures'] ?? [
    'page_title' => 'Brochures',
    'heading' => 'ADMISSION BROCHURE',
    'prospectus_pdf' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/MAIN_19112025_0435.pdf',
    'prospectus_label' => 'Prospectus (Click Here)',
    'cover_image' => 'assets/images/admission/Brochures_img_2.png'
];

$page_title = ($broData['page_title'] ?? 'Brochures') . ' - SSSUTMS';
$banner_title = $broData['page_title'] ?? 'Brochures';
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
.brochure-download-box {
  background: #f8fafc;
  border: 2px dashed #cbd5e1;
  border-radius: 14px;
  padding: 2rem;
  text-align: center;
  transition: all 0.3s ease;
}
.brochure-download-box:hover {
  border-color: #0b2545;
  background: #ffffff;
  box-shadow: 0 10px 25px rgba(11, 37, 69, 0.08);
}
.brochure-btn {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  background: linear-gradient(135deg, #085294 0%, #0b2545 100%);
  color: #ffffff !important;
  font-size: 1.2rem;
  font-weight: 700;
  padding: 14px 28px;
  border-radius: 50px;
  text-decoration: none;
  box-shadow: 0 6px 18px rgba(8, 82, 148, 0.3);
  transition: all 0.25s ease;
}
.brochure-btn:hover {
  transform: translateY(-3px);
  box-shadow: 0 10px 24px rgba(8, 82, 148, 0.4);
  color: #ffbe0b !important;
}
.cover-img-preview {
  max-width: 550px;
  width: 100%;
  border-radius: 12px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease;
}
.cover-img-preview:hover {
  transform: scale(1.02);
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
              <i class="bi bi-journal-text me-2"></i> <?php echo htmlspecialchars($broData['page_title'] ?? 'Brochures'); ?>
            </h2>
            <a href="<?php echo htmlspecialchars($broData['prospectus_pdf'] ?? '#'); ?>" target="_blank" rel="noopener" class="btn btn-warning btn-sm rounded-pill fw-bold px-3">
              <i class="fa-solid fa-file-arrow-down me-1"></i> Download Prospectus
            </a>
          </div>

          <div class="card-body p-4 p-md-5">
            <article class="fs-5 lh-lg text-secondary">

              <!-- Heading with Icon -->
              <div class="text-center mb-4">
                <h3 class="fw-bold d-inline-flex align-items-center gap-2" style="color: #e79439;">
                  <i class="fa-solid fa-folder-open text-warning fs-3"></i>
                  <span><?php echo htmlspecialchars($broData['heading'] ?? 'ADMISSION BROCHURE'); ?></span>
                </h3>
                <p class="text-muted small mt-1">Official University Information Brochure &amp; Academic Prospectus</p>
              </div>

              <!-- Prospectus Download Box -->
              <div class="brochure-download-box my-4">
                <div class="mb-3">
                  <i class="fa-solid fa-book-bookmark text-primary" style="font-size: 3rem;"></i>
                </div>
                <h4 class="fw-bold text-dark mb-3">Comprehensive Admissions Prospectus</h4>
                <p class="text-muted small mb-4 mx-auto" style="max-width: 600px;">
                  Explore faculties, degree programs, intake capacity, campus facilities, training and placement records, and examination regulations in the official prospectus.
                </p>
                <a href="<?php echo htmlspecialchars($broData['prospectus_pdf'] ?? '#'); ?>" target="_blank" rel="noopener" class="brochure-btn">
                  <i class="fa-solid fa-file-pdf"></i>
                  <span><?php echo htmlspecialchars($broData['prospectus_label'] ?? 'Prospectus (Click Here)'); ?></span>
                </a>
              </div>

              <!-- Brochure Cover / Preview Image -->
              <?php if (!empty($broData['cover_image'])): ?>
                <div class="text-center mt-5 mb-4">
                  <div class="small fw-bold text-muted uppercase mb-3 letter-spacing-1">
                    <i class="fa-solid fa-image me-1"></i> Program Brochure Highlights
                  </div>
                  <img src="../<?php echo htmlspecialchars($broData['cover_image']); ?>" 
                       alt="University Brochure Cover" 
                       class="cover-img-preview img-fluid">
                </div>
              <?php endif; ?>

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
