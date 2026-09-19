<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/itep_helper.php';

$page_info = get_itep_page_info();
$announcements = get_itep_announcements(true);

$page_title = 'ITEP Announcements & NCTE Disclosures - SSSUTMS';
$banner_title = 'ITEP Announcements';
$banner_category = 'I T E P';

require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?>

<style>
.syl-card {
  background: #ffffff;
  border-radius: 16px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
  border: 1px solid #e2e8f0;
  overflow: hidden;
  margin-bottom: 2rem;
}
.syl-card-header {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 1.25rem 1.75rem;
  position: relative;
}
.syl-card-header::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.syl-card-title {
  font-size: 1.3rem;
  font-weight: 700;
  margin: 0;
  display: flex;
  align-items: center;
  gap: 12px;
  color: #ffffff;
}
.syl-card-body {
  padding: 1.75rem;
}
.syl-btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  background: #0b2545;
  color: #ffffff !important;
  font-weight: 700;
  font-size: 0.85rem;
  padding: 8px 18px;
  border-radius: 8px;
  text-decoration: none !important;
  transition: all 0.25s ease;
  box-shadow: 0 2px 6px rgba(11, 37, 69, 0.2);
  border: 1px solid #0b2545;
  white-space: nowrap;
}
.syl-btn:hover {
  background: #d97706;
  border-color: #d97706;
  color: #ffffff !important;
  transform: translateY(-2px);
  box-shadow: 0 6px 14px rgba(217, 119, 6, 0.35);
}
.ann-card {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 1.25rem;
  margin-bottom: 1rem;
  transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.ann-card:hover {
  transform: translateY(-3px);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
}
</style>

<section class="subpage-main-section py-4 bg-light">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="syl-card">
          <div class="syl-card-header">
            <h2 class="syl-card-title">
              <i class="fa fa-bullhorn text-warning"></i>
              ITEP Announcements &amp; NCTE Notifications
            </h2>
          </div>
          
          <div class="syl-card-body">
            
            <div class="alert alert-primary bg-light border-primary border-start border-4 rounded-3 p-3 mb-4">
              <div class="d-flex align-items-start gap-3">
                <i class="fa fa-info-circle text-primary fa-2x mt-1"></i>
                <div>
                  <h6 class="fw-bold text-dark mb-1">Integrated Teacher Education Programme (ITEP) Updates</h6>
                  <p class="text-secondary small mb-0">
                    Find updated disclosures, NCTE statutory approvals, curriculum guidelines, and admission notices for the 4-Year Integrated Teacher Education Programme.
                  </p>
                </div>
              </div>
            </div>

            <?php if (empty($announcements)): ?>
              <div class="text-center py-5 text-muted">
                <i class="fa fa-bullhorn fa-3x mb-3 text-secondary opacity-50"></i>
                <h6>No ITEP Announcements at This Time</h6>
                <p class="small">Check back regularly for updates regarding teacher education admissions and curriculum.</p>
              </div>
            <?php else: ?>
              <div class="announcements-list">
                <?php foreach ($announcements as $ann): 
                  $fileUrl = !empty($ann['file']) ? base_url($ann['file']) : '';
                ?>
                  <div class="ann-card d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                    <div>
                      <div class="d-flex align-items-center gap-2 mb-1">
                        <span class="badge bg-primary-subtle text-primary border border-primary fw-bold">
                          <?php echo htmlspecialchars($ann['category'] ?? 'Notice'); ?>
                        </span>
                        <?php if (!empty($ann['date'])): ?>
                          <span class="text-muted small"><i class="fa fa-calendar-day me-1"></i><?php echo htmlspecialchars($ann['date']); ?></span>
                        <?php endif; ?>
                      </div>
                      <h6 class="fw-bold text-dark mb-0"><?php echo htmlspecialchars($ann['title']); ?></h6>
                    </div>
                    <?php if (!empty($fileUrl)): ?>
                      <div>
                        <a href="<?php echo htmlspecialchars($fileUrl); ?>" target="_blank" rel="noopener" class="syl-btn">
                          <i class="fa fa-arrow-up-right-from-square"></i> View Document / Details
                        </a>
                      </div>
                    <?php endif; ?>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>

            <div class="mt-4 pt-3 border-top d-flex justify-content-between align-items-center">
              <a href="<?php echo base_url('ITEP/index.php'); ?>" class="btn btn-outline-secondary btn-sm rounded-pill px-3">
                <i class="fa fa-arrow-left me-1"></i> Back to ITEP Home
              </a>
            </div>

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