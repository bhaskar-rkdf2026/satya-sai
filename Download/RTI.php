<?php
$page_title = 'RTI - SSSUTMS';
$banner_title = 'RTI';
$banner_category = 'Download';

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
  padding: 2rem;
}
.rti-title-text {
  font-size: 1.25rem;
  font-weight: 700;
  color: #0b2545;
  margin-bottom: 1.5rem;
  line-height: 1.5;
}
.rti-img {
  max-width: 100%;
  height: auto;
  border-radius: 8px;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
  border: 1px solid #e2e8f0;
}
.appellate-text {
  font-size: 1.15rem;
  font-weight: 600;
  color: #1e293b;
  margin-top: 1.5rem;
  margin-bottom: 0;
}
.appellate-details {
  font-size: 1.1rem;
  color: #334155;
  margin-top: 0.5rem;
  padding-left: 1.5rem;
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
</style>

<section class="subpage-main-section py-4 bg-light">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="syl-card">
          <div class="syl-card-header d-flex flex-wrap align-items-center justify-content-between gap-3">
            <h2 class="syl-card-title">
              <i class="fa fa-scale-balanced text-warning"></i>
              RTI
            </h2>
            <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/urn_aaid_sc_AP_5fcee33d-b4d4-47de-8089-87e32ce00785_29072025_0258.jpg" target="_blank" rel="noopener" class="syl-btn">
              <i class="fa fa-expand"></i> View Full Image
            </a>
          </div>
          
          <div class="syl-card-body">
            
            <div class="rti-title-text">
              RTI &nbsp;: &nbsp;Details of Central Public Information Officer (CPIO) and Appellate Authority
            </div>
            
            <div class="text-center mb-4">
              <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/urn_aaid_sc_AP_5fcee33d-b4d4-47de-8089-87e32ce00785_29072025_0258.jpg" target="_blank" rel="noopener">
                <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/urn_aaid_sc_AP_5fcee33d-b4d4-47de-8089-87e32ce00785_29072025_0258.jpg" alt="RTI Details" class="rti-img" style="max-height: 900px;">
              </a>
            </div>

            <div class="appellate-text">
              Appellate Authority :
            </div>
            <div class="appellate-details">
              <strong>Dr Hemant Sharma</strong> &nbsp;&ndash;&nbsp; Registrar
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