<?php
require_once __DIR__ . '/../config.php';
$about_page = get_about_page('Institutional_Development_Plan');
$page_title = (!empty($about_page['title']) ? $about_page['title'] : 'Institutional Development Plan - SSSUTMS');
$banner_title = $about_page['banner_title'] ?? 'Institutional Development Plan';
$banner_category = $about_page['banner_category'] ?? 'About';

require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';

$dynamicDocs = get_page_documents('Institutional_Development_Plan');
?>

<style>
.idp-page-section {
  background-color: #f8fafc;
}
.idp-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
  overflow: hidden;
}
.idp-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2rem;
  position: relative;
}
.idp-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #2563eb, #3b82f6);
}
.idp-doc-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 16px;
  padding: 1.75rem;
  box-shadow: 0 4px 16px rgba(0,0,0,0.02);
  transition: all 0.25s ease;
}
.idp-doc-card:hover {
  border-color: #cbd5e1;
  box-shadow: 0 8px 24px rgba(15, 23, 42, 0.06);
}
</style>

<section class="subpage-main-section idp-page-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        
        <!-- Main Card Wrapper -->
        <div class="idp-main-card mb-4">
          
          <!-- Banner Header -->
          <div class="idp-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge bg-primary text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill">
                <i class="fa-solid fa-file-contract me-1"></i> Institutional Plan
              </span>
              <h3 class="fw-bold text-white mb-0 fs-3">INSTITUTIONAL DEVELOPMENT PLAN</h3>
            </div>
          </div>

          <!-- Body Container -->
          <div class="p-4">
            
          <?php if (!empty($dynamicDocs)): ?>
            <?php foreach ($dynamicDocs as $doc): 
              $fileUrl = $doc['file'];
              if (strpos($fileUrl, 'http') !== 0 && strpos($fileUrl, 'ftp') !== 0) {
                $fileUrl = BASE_URL . ltrim($fileUrl, '/');
              }
            ?>
              <!-- Exact Original Document Content Card -->
              <div class="idp-doc-card mb-3">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                  <div class="d-flex align-items-center gap-3">
                    <div class="rounded-3 bg-primary bg-opacity-10 text-primary p-3 fs-3">
                      <i class="fa-solid fa-file-pdf"></i>
                    </div>
                    <div>
                      <h5 class="fw-bold text-dark mb-1"><?php echo htmlspecialchars($doc['title']); ?></h5>
                      <p class="text-secondary small mb-0"><?php echo htmlspecialchars($doc['category'] ?? 'Official Institutional Development Plan Document'); ?></p>
                    </div>
                  </div>
                  <div>
                    <a href="<?php echo htmlspecialchars($fileUrl); ?>" target="_blank" rel="noopener" class="btn btn-danger rounded-pill px-4 py-2.5 fw-bold shadow-sm d-inline-flex align-items-center gap-2">
                      <i class="fa-solid fa-file-pdf"></i> Download PDF
                    </a>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <!-- Exact Original Document Content Card Fallback -->
            <div class="idp-doc-card">
              <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                <div class="d-flex align-items-center gap-3">
                  <div class="rounded-3 bg-primary bg-opacity-10 text-primary p-3 fs-3">
                    <i class="fa-solid fa-file-pdf"></i>
                  </div>
                  <div>
                    <h5 class="fw-bold text-dark mb-1">Strategic Vision (2024–2027)</h5>
                    <p class="text-secondary small mb-0">Official Institutional Development Plan Document</p>
                  </div>
                </div>
                <div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/Strategic_Vision_07122024_0233.pdf" target="_blank" class="btn btn-danger rounded-pill px-4 py-2.5 fw-bold shadow-sm d-inline-flex align-items-center gap-2">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </div>
              </div>
            </div>
          <?php endif; ?>

          </div>
        </div>

      </div>

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
