<?php
$page_title = 'IIC Cell - SSSUTMS';
$banner_title = 'IIC Cell';
$banner_category = 'Research';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';

// Fetch dynamic IIC Cell data from Admin
$iicData = function_exists('get_page_documents') ? get_page_documents('Iic_Cell') : [];
$iic = !empty($iicData[0]) ? $iicData[0] : [];
$iicVision = !empty($iic['vision']) ? $iic['vision'] : 'To promote innovation, entrepreneurial skills, and the growth of student start-ups.';
$iicMissions = !empty($iic['missions']) && is_array($iic['missions']) ? $iic['missions'] : [
    'To nurture a culture of innovation among students.',
    'To instill and cultivate entrepreneurial abilities and competencies among students.',
    'To encourage the progress and advancement of student-led startups.'
];
$iicGallery = !empty($iic['gallery']) && is_array($iic['gallery']) ? $iic['gallery'] : [
    ['title' => 'IIC Establishment Certificate', 'image' => 'assets/images/research/iic/certificate_06072023_1205.jpg'],
    ['title' => 'Innovation Cell Initiative', 'image' => 'assets/images/research/iic/inno_06072023_1207.jpg'],
    ['title' => 'Entrepreneurship Development', 'image' => 'assets/images/research/iic/entr_06072023_1209.jpg'],
    ['title' => 'IIC Workshop Event', 'image' => 'assets/images/research/iic/WhatsApp_Image_2023-09-26_at_15.01.28_26092023_0425.jpg'],
    ['title' => 'COMSOL Multiphysics Workshop', 'image' => 'assets/images/research/iic/COMSOL_Workshop_10072023_1027.jpg'],
    ['title' => 'National IP Awareness Mission (NIPAM)', 'image' => 'assets/images/research/iic/NIPAM_workshop_10072023_1029.jpg'],
    ['title' => 'NIPAM Intellectual Property Program', 'image' => 'assets/images/research/iic/NIPAM_10072023_1029.jpg'],
    ['title' => 'UIT Innovation Appreciation Certificate', 'image' => 'assets/images/research/iic/certificate_uit_10072023_1033.jpg']
];
?>

<style>
.iic-section { background-color: #f8fafc; }
.iic-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15,23,42,0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}
.iic-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2.2rem 2rem;
  position: relative;
}
.iic-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}

.iic-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 16px;
  padding: 1.5rem;
  box-shadow: 0 4px 16px rgba(0,0,0,0.02);
  margin-bottom: 1.75rem;
}
.iic-card-header {
  display: flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 1.2rem;
  padding-bottom: 0.85rem;
  border-bottom: 2px solid #f1f5f9;
}
.iic-card-header i {
  color: #f59e0b;
  font-size: 1.3rem;
}
.iic-img-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 12px;
  box-shadow: 0 4px 14px rgba(0,0,0,0.03);
  text-align: center;
  margin-bottom: 1.5rem;
  transition: all 0.25s ease;
}
.iic-img-card:hover {
  border-color: #cbd5e1;
  box-shadow: 0 8px 24px rgba(11,37,69,0.08);
  transform: translateY(-2px);
}
.iic-img-card img {
  max-width: 100%;
  height: auto;
  border-radius: 10px;
}
</style>

<section class="subpage-main-section iic-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="iic-main-card">

          <!-- Header Banner -->
          <div class="iic-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-rocket me-1"></i> MoE's Innovation Cell Initiative
              </span>
              <h3 class="fw-bold text-white mb-1 fs-3">INSTITUTION'S INNOVATION COUNCIL (IIC) CELL</h3>
              <p class="text-white-50 mb-0 small">Fostering Entrepreneurship, Student Start-ups &amp; Intellectual Property Awareness</p>
            </div>
          </div>

          <!-- Content Body -->
          <div class="p-4">

            <!-- Vision & Mission Card -->
            <div class="iic-card">
              <div class="iic-card-header">
                <i class="fa-solid fa-eye text-warning"></i>
                <h5 class="fw-bold text-dark mb-0">Vision &amp; Mission</h5>
              </div>
              <div class="mb-4">
                <h6 class="fw-bold text-primary mb-2"><i class="fa-solid fa-bullseye me-2"></i> Vision</h6>
                <p class="text-dark fs-6 mb-0 ps-3 border-start border-3 border-warning" style="text-align: justify;">
                  <?php echo htmlspecialchars($iicVision); ?>
                </p>
              </div>
              <div>
                <h6 class="fw-bold text-primary mb-2"><i class="fa-solid fa-compass me-2"></i> Mission</h6>
                <ul class="list-group list-group-flush border rounded-3">
                  <?php foreach ($iicMissions as $msn): ?>
                    <li class="list-group-item p-3"><i class="fa-solid fa-circle-check text-success me-2"></i> <?php echo htmlspecialchars($msn); ?></li>
                  <?php endforeach; ?>
                </ul>
              </div>
            </div>

            <!-- IIC Achievements & Workshops Gallery -->
            <div class="iic-card mb-0">
              <div class="iic-card-header">
                <i class="fa-solid fa-images text-warning"></i>
                <h5 class="fw-bold text-dark mb-0">IIC Certificates, Workshops &amp; Events</h5>
              </div>

              <div class="row g-3">
                <?php foreach ($iicGallery as $item): 
                  $imgSrc = !empty($item['image']) ? $item['image'] : '';
                  if (!preg_match('#^https?://#i', $imgSrc)) {
                    $imgSrc = BASE_URL . ltrim($imgSrc, '/');
                  }
                  $itemTitle = $item['title'] ?? 'IIC Gallery Event';
                ?>
                  <div class="col-md-6">
                    <div class="iic-img-card">
                      <a href="<?php echo htmlspecialchars($imgSrc); ?>" target="_blank" title="Click to view full size">
                        <img src="<?php echo htmlspecialchars($imgSrc); ?>" alt="<?php echo htmlspecialchars($itemTitle); ?>" class="img-fluid rounded">
                      </a>
                      <div class="mt-2 fw-bold text-dark small"><?php echo htmlspecialchars($itemTitle); ?></div>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>

            </div>

          </div>
        </div><!-- end iic-main-card -->
      </div><!-- end col-lg-8 -->

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>