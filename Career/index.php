<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/career_helper.php';

$page_info = get_career_page_info();
$openings = get_career_openings(true);

$page_data = $page_info;
$page_title = $page_info['meta_title'] ?? ($page_info['page_title'] ?? 'Career & Faculty Recruitment - SSSUTMS');
$banner_title = $page_info['banner_title'] ?? 'Career & Recruitment';
$banner_category = $page_info['banner_category'] ?? 'Career';
$meta_description = $page_info['meta_description'] ?? '';
$meta_keywords = $page_info['meta_keywords'] ?? '';
$canonical_url = $page_info['canonical_url'] ?? '';
$og_image = $page_info['og_image'] ?? '';

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
  padding: 1.75rem;
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
.job-card {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  overflow: hidden;
  height: 100%;
  display: flex;
  flex-direction: column;
  transition: transform 0.25s ease, box-shadow 0.25s ease;
}
.job-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
}
.job-img-wrapper {
  position: relative;
  background: #f1f5f9;
  border-bottom: 1px solid #e2e8f0;
  text-align: center;
  overflow: hidden;
}
.job-img-wrapper img {
  max-width: 100%;
  height: auto;
  max-height: 380px;
  object-fit: contain;
  transition: transform 0.3s ease;
}
.job-card:hover .job-img-wrapper img {
  transform: scale(1.02);
}
.department-heading {
  background: #f8fafc;
  border-left: 4px solid #0b2545;
  padding: 10px 16px;
  margin-top: 1.5rem;
  margin-bottom: 1.25rem;
  font-size: 1.05rem;
  font-weight: 700;
  color: #0b2545;
  display: flex;
  align-items: center;
  gap: 10px;
  border-radius: 0 8px 8px 0;
}
.department-heading:first-of-type {
  margin-top: 0;
}
</style>

<section class="subpage-main-section py-4 bg-light">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="syl-card">
          <div class="syl-card-header">
            <h2 class="syl-card-title">
              <i class="fa fa-briefcase text-warning"></i>
              <?php echo htmlspecialchars($page_info['heading'] ?? 'Career Opportunities & Faculty Recruitment'); ?>
            </h2>
          </div>
          
          <div class="syl-card-body">
            
            <!-- Recruitment Introduction -->
            <?php if (!empty($page_info['intro_text'])): ?>
            <div class="alert alert-primary bg-light border-primary border-start border-4 rounded-3 p-3 mb-4">
              <div class="d-flex align-items-start gap-3">
                <i class="fa fa-info-circle text-primary fa-2x mt-1"></i>
                <div>
                  <h6 class="fw-bold text-dark mb-1"><?php echo htmlspecialchars($page_info['intro_title'] ?? 'Join Sri Satya Sai University of Technology & Medical Sciences'); ?></h6>
                  <p class="text-secondary small mb-0">
                    <?php echo nl2br(htmlspecialchars($page_info['intro_text'])); ?>
                  </p>
                </div>
              </div>
            </div>
            <?php endif; ?>

            <!-- 1. Latest Recruitment Notifications -->
            <div class="department-heading">
              <i class="fa fa-bullhorn"></i> <?php echo htmlspecialchars($page_info['section_heading'] ?? 'Current Recruitment Notices & Job Advertisements'); ?>
            </div>

            <div class="row g-4 mb-4">
              
              <?php foreach ($openings as $op): 
                $badgeColor = $op['badge_color'] ?? 'primary';
                $buttons = $op['buttons'] ?? [];
                $imageUrl = !empty($op['image']) ? base_url($op['image']) : '';
              ?>
              <div class="col-md-6">
                <div class="job-card">
                  <?php if (!empty($imageUrl)): ?>
                  <div class="job-img-wrapper p-2">
                    <img src="<?php echo htmlspecialchars($imageUrl); ?>" alt="<?php echo htmlspecialchars($op['title']); ?>">
                  </div>
                  <?php endif; ?>
                  <div class="p-3 d-flex flex-column justify-content-between flex-grow-1">
                    <div>
                      <?php if (!empty($op['badge'])): ?>
                        <span class="badge bg-<?php echo htmlspecialchars($badgeColor); ?> mb-2"><?php echo htmlspecialchars($op['badge']); ?></span>
                      <?php endif; ?>
                      <h6 class="fw-bold text-dark mb-1"><?php echo htmlspecialchars($op['title']); ?></h6>
                      <p class="text-secondary small mb-3"><?php echo htmlspecialchars($op['description']); ?></p>
                    </div>
                    <?php if (!empty($buttons)): ?>
                      <?php if (count($buttons) > 1): ?>
                        <div class="d-flex flex-wrap gap-2">
                          <?php foreach ($buttons as $btn): ?>
                            <a href="<?php echo htmlspecialchars(base_url($btn['url'])); ?>" target="_blank" rel="noopener" class="syl-btn">
                              <i class="fa <?php echo htmlspecialchars($btn['icon'] ?? 'fa-file-pdf'); ?>"></i> <?php echo htmlspecialchars($btn['label']); ?>
                            </a>
                          <?php endforeach; ?>
                        </div>
                      <?php else: 
                        $btn = $buttons[0];
                      ?>
                        <a href="<?php echo htmlspecialchars(base_url($btn['url'])); ?>" target="_blank" rel="noopener" class="syl-btn align-self-start">
                          <i class="fa <?php echo htmlspecialchars($btn['icon'] ?? 'fa-expand'); ?>"></i> <?php echo htmlspecialchars($btn['label']); ?>
                        </a>
                      <?php endif; ?>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
              <?php endforeach; ?>

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