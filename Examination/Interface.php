<?php
$page_title = 'Examination Interface & Portals - SSSUTMS';
$banner_title = 'Interface';
$banner_category = 'Examination';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';

// Fetch dynamic interface portals from Admin / page_documents.json
$portals = get_page_documents('Interface');
?>

<style>
.if-section { background-color: #f8fafc; }
.if-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15,23,42,0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}
.if-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2.2rem 2rem;
  position: relative;
}
.if-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.if-stat-chip {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 16px 14px;
  display: flex; align-items: center; gap: 12px;
  height: 100%;
  transition: all 0.25s ease;
  box-shadow: 0 4px 12px rgba(0,0,0,0.02);
}
.if-stat-chip:hover {
  border-color: #cbd5e1;
  box-shadow: 0 6px 18px rgba(11,37,69,0.07);
  transform: translateY(-2px);
}
.if-stat-icon {
  width: 48px; height: 48px;
  border-radius: 12px;
  background: rgba(245,158,11,0.12);
  color: #d97706;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.35rem; flex-shrink: 0;
}
.if-portal-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 16px;
  padding: 1.5rem;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 1.25rem;
  box-shadow: 0 4px 16px rgba(0,0,0,0.03);
  transition: all 0.25s ease;
  margin-bottom: 1.25rem;
}
.if-portal-card:hover {
  border-color: #cbd5e1;
  box-shadow: 0 8px 24px rgba(11,37,69,0.08);
  transform: translateY(-2px);
}
.if-portal-icon {
  width: 52px; height: 52px;
  border-radius: 14px;
  background: linear-gradient(135deg, #0b2545 0%, #1e4d8c 100%);
  color: #fbbf24;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.4rem; flex-shrink: 0;
  box-shadow: 0 4px 12px rgba(11,37,69,0.15);
}
.if-login-btn {
  background: linear-gradient(135deg, #0b2545 0%, #1e4d8c 100%) !important;
  color: #ffffff !important;
  font-size: 0.88rem;
  font-weight: 700;
  padding: 10px 20px;
  border-radius: 10px;
  border: 1px solid rgba(245,158,11,0.4);
  text-decoration: none !important;
  display: inline-flex;
  align-items: center;
  gap: 8px;
  white-space: nowrap;
  box-shadow: 0 4px 12px rgba(11,37,69,0.15);
  transition: all 0.25s ease;
}
.if-login-btn i {
  color: #fbbf24 !important;
}
.if-login-btn:hover {
  background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%) !important;
  color: #ffffff !important;
  border-color: #d97706;
  box-shadow: 0 6px 18px rgba(217,119,6,0.35);
  transform: translateY(-2px);
}
</style>

<section class="subpage-main-section if-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="if-main-card">

          <!-- Header Banner -->
          <div class="if-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-laptop-code me-1"></i> University Management System
              </span>
              <h3 class="fw-bold text-white mb-1 fs-3">EXAMINATION INTERFACE &amp; PORTALS</h3>
              <p class="text-white-50 mb-0 small">Direct Access to Student Registration, Examination Forms &amp; Result Portals</p>
            </div>
            <div>
              <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold fs-6">
                <i class="fa-solid fa-network-wired me-1"></i> <?php echo count($portals); ?> Official Gateways
              </span>
            </div>
          </div>

          <!-- Content Body -->
          <div class="p-4">

            <!-- Portal Links List (Dynamically rendered from Admin) -->
            <div class="if-portals-list">
              <?php if (empty($portals)): ?>
                <div class="alert alert-info text-center py-4">
                  <i class="fa-solid fa-circle-info fa-2x mb-2 text-primary d-block"></i>
                  <h6 class="fw-bold">No examination interfaces configured.</h6>
                </div>
              <?php else: ?>
                <?php foreach ($portals as $p): 
                  $title = $p['title'] ?? 'Portal Link';
                  $cat = $p['category'] ?? 'General';
                  $url = $p['file'] ?? '#';
                  if (strpos($url, 'http') !== 0 && strpos($url, 'ftp') !== 0 && $url !== '#') {
                    $url = BASE_URL . ltrim($url, '/');
                  }
                  $desc = $p['desc'] ?? 'Access official university examination and academic services.';
                  
                  // Pick icon based on category or title
                  $icon = 'fa-arrow-up-right-from-square';
                  if (stripos($title, 'Registration') !== false || stripos($cat, 'Registration') !== false) {
                    $icon = 'fa-user-pen';
                  } elseif (stripos($title, 'Archive') !== false) {
                    $icon = 'fa-box-archive';
                  } elseif (stripos($title, 'Verification') !== false) {
                    $icon = 'fa-shield-halved';
                  } elseif (stripos($title, 'Ph.D.') !== false || stripos($title, 'Entrance') !== false) {
                    $icon = 'fa-graduation-cap';
                  } elseif (stripos($title, 'Student Login') !== false || stripos($cat, 'Login') !== false) {
                    $icon = 'fa-id-card';
                  }
                ?>
                  <div class="if-portal-card">
                    <div class="d-flex align-items-center gap-3">
                      <div class="if-portal-icon"><i class="fa-solid <?php echo $icon; ?>"></i></div>
                      <div>
                        <div class="d-flex align-items-center gap-2 mb-1">
                          <h5 class="fw-bold text-dark mb-0 fs-6"><?php echo htmlspecialchars($title); ?></h5>
                          <span class="badge bg-primary-subtle text-primary border small"><?php echo htmlspecialchars($cat); ?></span>
                        </div>
                        <p class="text-muted mb-0 small"><?php echo htmlspecialchars($desc); ?></p>
                      </div>
                    </div>
                    <div>
                      <a href="<?php echo htmlspecialchars($url); ?>" target="_blank" rel="noopener" class="if-login-btn">
                        <i class="fa-solid fa-right-to-bracket"></i> Access Portal
                      </a>
                    </div>
                  </div>
                <?php endforeach; ?>
              <?php endif; ?>
            </div>

          </div>
        </div><!-- end if-main-card -->
      </div><!-- end col-lg-8 -->

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>