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

<div class="page-banner py-4 mb-4">
  <div class="container-fluid px-lg-5">
    <div class="row align-items-center gy-3">
      
      <!-- Title & Category Badge -->
      <div class="col-lg-8">
        <div class="d-flex align-items-center gap-2 mb-2">
          <span class="badge bg-warning text-dark fw-bold px-3 py-1 rounded-pill" style="font-size: 11px; letter-spacing: 0.5px;">
            <i class="fa fa-university me-1"></i> <?php echo htmlspecialchars($banner_category); ?>
          </span>
          <?php if (isset($banner_badge) && !empty($banner_badge)): ?>
            <span class="badge bg-light text-dark fw-semibold px-2 py-1 rounded-pill" style="font-size: 11px;">
              <?php echo htmlspecialchars($banner_badge); ?>
            </span>
          <?php endif; ?>
        </div>
        <h1 class="page-banner-title fw-bold text-white mb-0"><?php echo htmlspecialchars($banner_title); ?></h1>
        <?php if (isset($banner_subtitle) && !empty($banner_subtitle)): ?>
          <p class="text-white-50 small mb-0 mt-1"><?php echo htmlspecialchars($banner_subtitle); ?></p>
        <?php endif; ?>
      </div>

      <!-- Breadcrumbs Trail -->
      <div class="col-lg-4 text-lg-end">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 justify-content-lg-end bg-transparent p-0">
            <li class="breadcrumb-item"><a href="<?php echo BASE_URL; ?>index.php" class="text-white-50 text-decoration-none"><i class="fa fa-home me-1"></i> Home</a></li>
            <?php if (isset($breadcrumbs) && is_array($breadcrumbs)): ?>
              <?php foreach ($breadcrumbs as $crumb_name => $crumb_url): ?>
                <?php if (!empty($crumb_url)): ?>
                  <li class="breadcrumb-item"><a href="<?php echo $crumb_url; ?>" class="text-white-50 text-decoration-none"><?php echo htmlspecialchars($crumb_name); ?></a></li>
                <?php else: ?>
                  <li class="breadcrumb-item active text-warning fw-semibold" aria-current="page"><?php echo htmlspecialchars($crumb_name); ?></li>
                <?php endif; ?>
              <?php endforeach; ?>
            <?php else: ?>
              <li class="breadcrumb-item"><a href="<?php echo BASE_URL; ?>About/Background.php" class="text-white-50 text-decoration-none"><?php echo htmlspecialchars($banner_category); ?></a></li>
              <li class="breadcrumb-item active text-warning fw-semibold" aria-current="page"><?php echo htmlspecialchars($banner_title); ?></li>
            <?php endif; ?>
          </ol>
        </nav>
      </div>

    </div>
  </div>
</div>
