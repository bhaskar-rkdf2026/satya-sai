<?php
require_once __DIR__ . '/../config.php';

// Load dynamic data from MySQL Database
$pageData = get_admission_page('Brochures', []);

$broData = [
    'page_title' => $pageData['page_title'] ?? 'Brochures',
    'heading' => $pageData['heading'] ?? 'ADMISSION BROCHURE',
    'prospectus_pdf' => $pageData['primary_file_url'] ?? 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/MAIN_19112025_0435.pdf',
    'prospectus_label' => $pageData['primary_file_label'] ?? 'Prospectus (Click Here)',
    'cover_image' => $pageData['image_url'] ?? 'assets/images/admission/Brochures_img_2.png'
];

$page_data = $pageData;
$meta_title = !empty($pageData['meta_title']) ? $pageData['meta_title'] : (($broData['page_title'] ?? 'Brochures') . ' - SSSUTMS');
$page_title = $meta_title;
$meta_description = $pageData['meta_description'] ?? '';
$meta_keywords = $pageData['meta_keywords'] ?? '';
$canonical_url = $pageData['canonical_url'] ?? '';
$og_image = $pageData['og_image'] ?? 'assets/images/logo/logo.jpg';
$banner_title = $broData['page_title'] ?? 'Brochures';
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
              <i class="bi bi-journal-text me-2"></i> <?php echo htmlspecialchars($broData['page_title'] ?? 'Brochures'); ?>
            </h2>
          </div>

          <div class="card-body p-4 p-md-5 bg-white">
            <article class="fs-5 lh-lg text-secondary">
              
              <?php
              $coverImg = $broData['cover_image'] ?? 'assets/images/admission/Brochures_img_2.png';
              if (!empty($coverImg) && !preg_match('#^(https?:/|/)#i', $coverImg) && strpos($coverImg, '../') !== 0) {
                  $coverImg = '../' . $coverImg;
              }
              $pdfLink = $broData['prospectus_pdf'] ?? 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/MAIN_19112025_0435.pdf';
              if (!empty($pdfLink) && !preg_match('#^(https?:/|/)#i', $pdfLink) && strpos($pdfLink, '../') !== 0) {
                  $pdfLink = '../' . $pdfLink;
              }
              ?>

              <!-- Admission Brochure Heading Badge -->
              <div class="text-center mb-4">
                <div class="brochure-title-badge">
                  <img src="../assets/images/admission/Brochures_img_0.png" alt="Folder" onerror="this.style.display='none';">
                  <h3><?php echo htmlspecialchars($broData['heading'] ?? 'ADMISSION BROCHURE'); ?></h3>
                </div>
              </div>

              <!-- Prospectus Download CTA Card -->
              <div class="text-center mb-4">
                <a href="<?php echo htmlspecialchars($pdfLink); ?>" target="_blank" rel="noopener" class="prospectus-download-card">
                  <img src="../assets/images/admission/Brochures_img_1.png" alt="Arrow" onerror="this.style.display='none';">
                  <span class="prospectus-text"><?php echo htmlspecialchars($broData['prospectus_label'] ?? 'Prospectus (Click Here)'); ?></span>
                  <i class="fa-solid fa-file-pdf text-danger fs-5 ms-1"></i>
                </a>
              </div>

              <!-- Brochure Cover Image Frame -->
              <div class="text-center my-4">
                <div class="brochure-img-frame">
                  <a href="<?php echo htmlspecialchars($pdfLink); ?>" target="_blank" rel="noopener" title="Click to View Full Brochure PDF">
                    <img src="<?php echo htmlspecialchars($coverImg); ?>" 
                         alt="Admission Brochure" 
                         onerror="this.src='https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Admission/SOD.jpg'">
                    <div class="brochure-overlay">
                      <i class="fa-solid fa-file-arrow-down text-warning me-1"></i> Click to open / download official brochure (PDF)
                    </div>
                  </a>
                </div>
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
