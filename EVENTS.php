<?php
$page_title = 'The resource cannot be found. - SSSUTMS';
$banner_title = 'The resource cannot be found.';
$banner_category = 'SSSUTMS';

require_once __DIR__ . '/./config.php';
require_once __DIR__ . '/./includes/header.php';
require_once __DIR__ . '/./includes/topbar.php';
require_once __DIR__ . '/./includes/navbar.php';
require_once __DIR__ . '/./includes/page-banner.php';
?>

<section class="subpage-main-section py-4 bg-light">
  <div class="container-fluid px-lg-5">
    <div class="row g-4">
      
      <!-- Main Content Area -->
      <div class="col-lg-8 col-xl-9">
        <div class="content-card">
          <div class="content-card-body">
            <span><H1>Server Error in '/cms' Application.<hr width=100% size=1 color=silver></H1>

            <h2> <i>The resource cannot be found.</i> </h2></span>

            <font face="Arial, Helvetica, Geneva, SunSans-Regular, sans-serif ">

            <b> Description: </b>HTTP 404. The resource you are looking for (or one of its dependencies) could have been removed, had its name changed, or is temporarily unavailable. &nbsp;Please review the following URL and make sure that it is spelled correctly.
            <br><br>

            <b> Requested URL: </b><?php echo BASE_URL; ?>EVENTS<br><br>

            <hr width=100% size=1 color=silver>

            <b>Version Information:</b>&nbsp;Microsoft .NET Framework Version:4.0.30319; ASP.NET Version:4.8.4110.0

            </font>
          </div>
        </div>
      </div>

      <!-- Sticky Category Sidebar -->
      <div class="col-lg-4 col-xl-3">
        <?php require_once __DIR__ . '/./includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/./includes/footer.php'; ?>