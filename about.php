<?php
$page_title = 'about - SSSUTMS';
$banner_title = 'about';
$banner_category = 'SSSUTMS';

require_once __DIR__ . '/./config.php';
require_once __DIR__ . '/./includes/header.php';
require_once __DIR__ . '/./includes/topbar.php';
require_once __DIR__ . '/./includes/navbar.php';
require_once __DIR__ . '/./includes/page-banner.php';
?>

<section class="subpage-main-section py-4 bg-light">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="content-card">
          <div class="content-card-body">
            <!-- Page Header Breadcrumb -->
<div class="py-5 text-white" style="background: var(--primary-gradient);">
  <div class="container-fluid px-lg-5">
    <h1 class="fw-bold text-white mb-2">About SSSUTMS</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="index.php" class="text-warning">Home</a></li>
        <li class="breadcrumb-item active text-white-50" aria-current="page">About University</li>
      </ol>
    </nav>
  </div>
</div>

<div class="container-fluid px-lg-5 py-5">

<!-- Sidebar Navigation -->
          </div>
        </div>
      </div>

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/./includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/./includes/footer.php'; ?>