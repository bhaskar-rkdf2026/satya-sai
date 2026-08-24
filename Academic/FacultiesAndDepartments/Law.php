<?php
$page_title = 'Law - SSSUTMS';
$banner_title = 'Law';
$banner_category = 'Academic';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<section class="subpage-main-section py-4 bg-light">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="content-card">
          <div class="content-card-body">
            <p><b>Faculty of Law</b></p><table class="table table-bordered" style="width: 743px; background-color: rgba(0, 0, 0, 0.03);"><tbody><tr><td colspan="3" style="text-align: center;">L.L.B.</td></tr><tr><td><span style="font-weight: bolder;">Branch</span></td><td><span style="font-weight: bolder;">Duration in Year</span></td><td><span style="font-weight: bolder;">Intake</span></td></tr><tr><td <br=""><span style="font-family: Arial, Helvetica, sans-serif; font-size: 16px;">Bachelor of Law</span></td><td>&nbsp;3&nbsp;Years</td><td><span style="font-family: Arial, Helvetica, sans-serif; font-size: 16px;">120</span></td></tr><tr><td <br=""><br></td><td></td><td></td></tr></tbody></table>
          </div>
        </div>
      </div>

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>