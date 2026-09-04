<?php
$page_title = 'Interface - SSSUTMS';
$banner_title = 'Interface';
$banner_category = 'Examination';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
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
  font-size: 1.5rem; flex-shrink: 0;
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
          </div>

          <!-- Content Body -->
          <div class="p-4">

            <!-- Stat Chips -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-sm-6 col-md-4">
                <div class="if-stat-chip">
                  <div class="if-stat-icon"><i class="fa-solid fa-user-plus"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Academic Portal</div>
                    <div class="fw-bold text-dark fs-6">Session 2021-22</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-4">
                <div class="if-stat-chip">
                  <div class="if-stat-icon"><i class="fa-solid fa-users"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Student Login</div>
                    <div class="fw-bold text-dark fs-6">Sessions 2016 to 2021</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-4">
                <div class="if-stat-chip">
                  <div class="if-stat-icon"><i class="fa-solid fa-clock-rotate-left"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Archive Portal</div>
                    <div class="fw-bold text-dark fs-6">Sessions 2014 to 2016</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Portal Links List -->

            <!-- 1. Registration for Academic Session 2021-22 -->
            <div class="if-portal-card">
              <div class="d-flex align-items-center gap-3">
                <div class="if-portal-icon"><i class="fa-solid fa-user-pen"></i></div>
                <div>
                  <h5 class="fw-bold text-dark mb-1 fs-6">Registration for Academic Session 2021-22</h5>
                  <p class="text-muted mb-0 small">Student enrollment, profile management &amp; course registration portal.</p>
                </div>
              </div>
              <div>
                <a href="#" class="if-login-btn">
                  <i class="fa-solid fa-right-to-bracket"></i> Access Portal
                </a>
              </div>
            </div>

            <!-- 2. Student Login for 2016-17 to 2020-21 -->
            <div class="if-portal-card">
              <div class="d-flex align-items-center gap-3">
                <div class="if-portal-icon"><i class="fa-solid fa-id-card"></i></div>
                <div>
                  <h5 class="fw-bold text-dark mb-1 fs-6">Student Login (2016-17, 2017-18, 2018-19, 2019-20 &amp; 2020-21)</h5>
                  <p class="text-muted mb-0 small">Login portal for admitted students across 2016–2021 academic sessions.</p>
                </div>
              </div>
              <div>
                <a href="#" class="if-login-btn">
                  <i class="fa-solid fa-right-to-bracket"></i> Access Portal
                </a>
              </div>
            </div>

            <!-- 3. Login for 2014-15 & 2015-16 -->
            <div class="if-portal-card mb-0">
              <div class="d-flex align-items-center gap-3">
                <div class="if-portal-icon"><i class="fa-solid fa-box-archive"></i></div>
                <div>
                  <h5 class="fw-bold text-dark mb-1 fs-6">Student Login (2014-2015 &amp; 2015-2016 Academic Sessions)</h5>
                  <p class="text-muted mb-0 small">Archival student login for 2014–15 and 2015–16 academic batches.</p>
                </div>
              </div>
              <div>
                <a href="#" class="if-login-btn">
                  <i class="fa-solid fa-right-to-bracket"></i> Access Portal
                </a>
              </div>
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