<?php
$page_title = 'ITEP - SSSUTMS';
$banner_title = 'Integrated Teacher Education Programme (ITEP)';
$banner_category = 'I T E P';

require_once __DIR__ . '/../config.php';
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
  padding: 2.5rem 2rem;
}
.syl-btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 10px;
  background: #0b2545;
  color: #ffffff !important;
  font-weight: 700;
  font-size: 1.05rem;
  padding: 14px 28px;
  border-radius: 10px;
  text-decoration: none !important;
  transition: all 0.3s ease;
  box-shadow: 0 4px 12px rgba(11, 37, 69, 0.25);
  border: 1px solid #0b2545;
}
.syl-btn:hover {
  background: #d97706;
  border-color: #d97706;
  color: #ffffff !important;
  transform: translateY(-2px);
  box-shadow: 0 8px 20px rgba(217, 119, 6, 0.35);
}
.redirect-box {
  background: #f8fafc;
  border: 1.5px dashed #cbd5e1;
  border-radius: 14px;
  padding: 2.5rem 2rem;
  text-align: center;
}
.redirect-icon {
  width: 64px;
  height: 64px;
  line-height: 64px;
  border-radius: 50%;
  background: rgba(11, 37, 69, 0.08);
  color: #0b2545;
  font-size: 1.75rem;
  margin: 0 auto 1.25rem;
  display: flex;
  align-items: center;
  justify-content: center;
}
</style>

<section class="subpage-main-section py-5 bg-light">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="syl-card">
          <div class="syl-card-header">
            <h2 class="syl-card-title">
              <i class="fa fa-graduation-cap text-warning"></i>
              ITEP
            </h2>
          </div>
          
          <div class="syl-card-body">
            <div class="redirect-box">
              <div class="redirect-icon">
                <i class="fa fa-university"></i>
              </div>
              <h4 class="fw-bold text-dark mb-2">Integrated Teacher Education Programme</h4>
              <p class="text-secondary mb-4" style="max-width: 580px; margin: 0 auto;">
                Access detailed academic information, curriculum, regulatory disclosures, and institutional details under the Faculty of Education.
              </p>
              <div>
                <a href="<?php echo BASE_URL; ?>About/Faculty_of_Education.php" class="syl-btn w-100" style="max-width: 420px;">
                  <i class="fa fa-link"></i> Faculty of Education
                </a>
              </div>
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