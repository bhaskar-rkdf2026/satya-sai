<?php
/**
 * Page Banner Component
 * Usage: $banner_title (string), $banner_subtitle (string), $breadcrumbs (array: title => url)
 */
if (!isset($banner_title) || empty($banner_title)) {
    $banner_title = isset($page_title) ? str_replace(' - SSSUTMS', '', $page_title) : 'University Information';
}
if (!isset($banner_category)) {
    // Auto-detect category from directory or path
    $dir = basename(dirname($_SERVER['PHP_SELF']));
    $banner_category = ($dir != 'satya-sai' && $dir != 'sssutms-portal') ? ucfirst($dir) : 'SSSUTMS';
}
?>

<div class="page-banner-v2 mb-4">
  <div class="page-banner-v2-bg" style="background-image:url('<?php echo BASE_URL; ?>assets/images/gallery/1/img-25.jpg');"></div>
  <div class="page-banner-v2-overlay"></div>
  <div class="page-banner-v2-shape shape-a"></div>
  <div class="page-banner-v2-shape shape-b"></div>

  <div class="container-fluid px-lg-5 position-relative">
    <div class="row align-items-center gy-3">

      <!-- Title & Category Badge -->
      <div class="col-lg-8">
        <span class="page-banner-v2-badge">
          <span class="dot"></span> <i class="fa fa-university"></i> <?php echo htmlspecialchars($banner_category); ?>
          <?php if (isset($banner_badge) && !empty($banner_badge)): ?>
            <em><?php echo htmlspecialchars($banner_badge); ?></em>
          <?php endif; ?>
        </span>
        <h1 class="page-banner-v2-title"><?php echo htmlspecialchars($banner_title); ?></h1>
        <?php if (isset($banner_subtitle) && !empty($banner_subtitle)): ?>
          <p class="page-banner-v2-subtitle"><?php echo htmlspecialchars($banner_subtitle); ?></p>
        <?php endif; ?>
      </div>

      <!-- Breadcrumbs Trail -->
      <div class="col-lg-4 text-lg-end">
        <nav aria-label="breadcrumb">
          <ol class="page-banner-v2-crumbs">
            <li><a href="<?php echo BASE_URL; ?>index.php"><i class="fa fa-house"></i> Home</a></li>
            <?php if (isset($breadcrumbs) && is_array($breadcrumbs)): ?>
              <?php foreach ($breadcrumbs as $crumb_name => $crumb_url): ?>
                <?php if (!empty($crumb_url)): ?>
                  <li><i class="fa fa-angle-right sep"></i><a href="<?php echo $crumb_url; ?>"><?php echo htmlspecialchars($crumb_name); ?></a></li>
                <?php else: ?>
                  <li><i class="fa fa-angle-right sep"></i><span class="active" aria-current="page"><?php echo htmlspecialchars($crumb_name); ?></span></li>
                <?php endif; ?>
              <?php endforeach; ?>
            <?php else: ?>
              <li><i class="fa fa-angle-right sep"></i><a href="<?php echo BASE_URL; ?>About/Background.php"><?php echo htmlspecialchars($banner_category); ?></a></li>
              <li><i class="fa fa-angle-right sep"></i><span class="active" aria-current="page"><?php echo htmlspecialchars($banner_title); ?></span></li>
            <?php endif; ?>
          </ol>
        </nav>
      </div>

    </div>
  </div>
</div>
