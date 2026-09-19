<?php
require_once __DIR__ . '/../config.php';

// Load dynamic data from MySQL Database
$pageData = get_admission_page('AdmissionProcedure', [
    'page_title' => 'Admission Procedure',
    'lead_title' => 'Admission Procedure',
    'description' => 'Admissions to various Technical, Professional & General Courses will be made in accordance with the guidelines provided by University Regulatory Authority, M.P. & State Government of Madhya Pradesh, as amended or suggested from time to time. The fees charged for all the courses will be as per approval accorded by Madhya Pradesh Niji Vishwavidyalaya Niyamak Aayog , Bhopal (Madhya Pradesh)',
    'primary_file_url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Admission/adm_procedure.pdf',
    'primary_file_label' => 'Admission Procedure(Click Here)',
    'image_url' => 'assets/images/admission/AdmissionProcedure_img_0.jpg'
]);

$procData = [
    'page_title' => $pageData['page_title'] ?? 'Admission Procedure',
    'lead_title' => $pageData['lead_title'] ?? 'Admission Procedure',
    'description' => $pageData['description'] ?? '',
    'pdf_link' => $pageData['primary_file_url'] ?? 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Admission/adm_procedure.pdf',
    'pdf_label' => $pageData['primary_file_label'] ?? 'Admission Procedure(Click Here)',
    'image' => $pageData['image_url'] ?? 'assets/images/admission/AdmissionProcedure_img_0.jpg'
];

$page_data = $pageData;
$meta_title = !empty($pageData['meta_title']) ? $pageData['meta_title'] : (($procData['page_title'] ?? 'Admission Procedure') . ' - SSSUTMS');
$page_title = $meta_title;
$meta_description = $pageData['meta_description'] ?? '';
$meta_keywords = $pageData['meta_keywords'] ?? '';
$canonical_url = $pageData['canonical_url'] ?? '';
$og_image = $pageData['og_image'] ?? 'assets/images/logo/logo.jpg';
$banner_title = $procData['page_title'] ?? 'Admission Procedure';
$banner_category = 'Admission';

require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?>

<!-- Bootstrap Icons CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

<section class="py-5 bg-light">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left Column) -->
      <div class="col-lg-9">
        <div class="card shadow border-0 rounded-4 h-100 overflow-hidden">
          <div class="adm-card-header">
            <h2 class="fs-4 mb-0 fw-bold d-flex align-items-center">
              <i class="bi bi-journal-text me-2"></i> <?php echo htmlspecialchars($procData['page_title'] ?? 'Admission Procedure'); ?>
            </h2>
          </div>

          <div class="card-body p-4 p-md-5 bg-white">
            <article class="fs-5 lh-lg text-secondary">
              
              <p style="text-align: center; font-size: 16px; margin-bottom: 20px;">
                <span style="font-weight: bolder; color: #000;"><?php echo htmlspecialchars($procData['lead_title'] ?? 'Admission Procedure'); ?></span>&nbsp;
              </p>

              <p style="text-align: justify; color: #333; font-size: 1rem; line-height: 1.6; margin-bottom: 20px;">
                <?php 
                $cleanDesc = html_entity_decode($procData['description'] ?? '', ENT_QUOTES, 'UTF-8');
                echo nl2br(htmlspecialchars($cleanDesc, ENT_QUOTES, 'UTF-8')); 
                ?>
              </p>

              <?php
              $procImg = $procData['image'] ?? 'assets/images/admission/AdmissionProcedure_img_0.jpg';
              if (!empty($procImg) && !preg_match('#^(https?:/|/)#i', $procImg) && strpos($procImg, '../') !== 0) {
                  $procImg = '../' . $procImg;
              }
              $procPdf = $procData['pdf_link'] ?? 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Admission/adm_procedure.pdf';
              if (!empty($procPdf) && !preg_match('#^(https?:/|/)#i', $procPdf) && strpos($procPdf, '../') !== 0) {
                  $procPdf = '../' . $procPdf;
              }
              ?>
              <div class="my-4 text-center">
                <a href="<?php echo htmlspecialchars($procPdf); ?>" target="_blank" rel="noopener" class="prospectus-download-card">
                  <i class="fa-solid fa-file-pdf text-danger fs-5"></i>
                  <span class="prospectus-text"><?php echo htmlspecialchars($procData['pdf_label'] ?? 'Admission Procedure(Click Here)'); ?></span>
                  <i class="fa-solid fa-arrow-up-right-from-square text-secondary small ms-1"></i>
                </a>
              </div>

              <?php if (!empty($procImg)): ?>
                <div class="text-center my-4">
                  <div class="brochure-img-frame" style="max-width: 982px; width: 100%;">
                    <a href="<?php echo htmlspecialchars($procPdf); ?>" target="_blank" rel="noopener" title="Click to View / Download PDF">
                      <img src="<?php echo htmlspecialchars($procImg); ?>" 
                           alt="Admission Procedure" 
                           style="max-width: 982px; width: 100%; height: auto;"
                           onerror="this.src='https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Admission/Adm_Adv.jpg'">
                      <div class="brochure-overlay">
                        <i class="fa-solid fa-file-arrow-down text-warning me-1"></i> Click to open / download official procedure (PDF)
                      </div>
                    </a>
                  </div>
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
