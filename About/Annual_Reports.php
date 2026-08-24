<?php
$page_title = 'Annual Reports - SSSUTMS';
$banner_title = 'Annual Reports';
$banner_category = 'About';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?>

<section class="subpage-main-section py-4 bg-light">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="content-card">
          <div class="content-card-body">
            <p style="text-align: center;"><span style="text-decoration: underline; font-size: 18pt;"><span style="color: #e67e23; text-decoration: underline;"><strong>Annual Report</strong></span></span></p>

<p style="text-align: left;"><span style="font-size: 14pt;"><span style="color: #e67e23;"><strong><span style="color: #236fa1;">Academic Year: 2023-2024&nbsp;</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="https://www.sssutms.co.in/cms/Areas/Website/Files/Link/About/ANNUAL REPORT.pdf" target="_blank" rel="noopener"><span style="color: #3598db;"><span style="color: #843fa1;">Click here</span></span></a></strong></span></span></p>

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