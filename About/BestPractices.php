<?php
$page_title = 'Best Practices - SSSUTMS';
$banner_title = 'Best Practices';
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
            <h4 style="text-align: center;"><span style="color: #ff9c00;"><strong>Best Practices</strong></span></h4>
<table class="table table-bordered" style="border-collapse: collapse; width: 100%; border-color: #000000; border-style: solid;">
<tbody>
<tr>
<td style="text-align: center;"><strong>S.No.</strong></td>
<td style="text-align: left;"><strong>Best Practices</strong></td>
</tr>
<tr>
<td style="text-align: center;">1</td>
<td style="text-align: left;"><a href="https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Academic/ERP_report.pdf" target="_blank" rel="noopener">Enterprise Resources Planning (ERP)</a></td>
</tr>
<tr>
<td style="text-align: center;">2</td>
<td style="text-align: left;">Activity Based Continuous Assessment (ABCA) System</td>
</tr>
</tbody>
</table>
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