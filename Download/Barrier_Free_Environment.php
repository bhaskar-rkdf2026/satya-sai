<?php
$page_title = 'Barrier Free Environment - SSSUTMS';
$banner_title = 'Barrier Free Environment';
$banner_category = 'Download';

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
            <p><img src="<?php echo BASE_URL; ?>assets/images/Files/Link/DSC_0445_07012025_0447.jpg" alt=""  height="400" /></p>
<p><img src="<?php echo BASE_URL; ?>assets/images/Files/Link/DEC01_(7)_07012025_0448.jpg" alt=""  height="247" /></p>
<p><img src="<?php echo BASE_URL; ?>assets/images/Files/Link/disb3_08012025_1148.jpg" alt=""  height="293" /></p>

<p><img src="<?php echo BASE_URL; ?>assets/images/Files/Link/Lift_(2)_08012025_0341.jpg" alt=""  height="798" /></p>

<p><img src="<?php echo BASE_URL; ?>assets/images/Files/Link/disb4_08012025_0453.jpg" alt=""  height="313" /></p>
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