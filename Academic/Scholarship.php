<?php
$page_title = 'Scholarships & Aid - SSSUTMS';
$banner_title = 'Scholarship';
$banner_category = 'Academic';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?>

<style>
.sch-aid-section { background-color: #f8fafc; }
.sch-aid-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15,23,42,0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}
.sch-aid-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2rem;
  position: relative;
}
.sch-aid-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.sch-aid-stat-chip {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 14px 12px;
  display: flex; align-items: center; gap: 10px;
  height: 100%;
  transition: all 0.2s ease;
  overflow: hidden;
}
.sch-aid-stat-chip:hover {
  border-color: #cbd5e1;
  box-shadow: 0 4px 14px rgba(0,0,0,0.04);
}
.sch-aid-stat-icon {
  width: 44px; height: 44px;
  border-radius: 10px;
  background: rgba(245,158,11,0.1);
  color: #d97706;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.25rem; flex-shrink: 0;
}
.sch-aid-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 1.5rem;
  box-shadow: 0 4px 16px rgba(0,0,0,0.02);
  margin-bottom: 1.5rem;
}
.sch-aid-card-header {
  display: flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 1rem;
  padding-bottom: 0.75rem;
  border-bottom: 2px solid #f1f5f9;
}
.sch-aid-card-header i {
  color: #f59e0b;
  font-size: 1.25rem;
}
.sch-aid-scheme-box {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-left: 4px solid #f59e0b;
  border-radius: 10px;
  padding: 1.25rem;
  margin-bottom: 1rem;
  transition: all 0.2s ease;
}
.sch-aid-scheme-box:hover {
  border-color: #cbd5e1;
  border-left-color: #d97706;
  background: #ffffff;
  box-shadow: 0 4px 14px rgba(0,0,0,0.03);
}
.sch-aid-badge-btn {
  background: linear-gradient(135deg, #0b2545 0%, #1e4d8c 100%) !important;
  color: #ffffff !important;
  font-size: 0.82rem;
  font-weight: 700;
  padding: 7px 10px;
  border-radius: 8px;
  border: 1px solid rgba(245,158,11,0.35);
  text-decoration: none !important;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 7px;
  white-space: nowrap;
  width: 195px;
  flex-shrink: 0;
  box-shadow: 0 2px 6px rgba(11,37,69,0.15);
  transition: all 0.25s ease;
}
.sch-aid-badge-btn i {
  color: #fbbf24 !important;
  transition: color 0.2s ease;
}
.sch-aid-badge-btn:hover {
  background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%) !important;
  color: #ffffff !important;
  border-color: #d97706;
  box-shadow: 0 4px 12px rgba(217,119,6,0.35);
  transform: translateY(-1px);
}
.sch-aid-badge-btn:hover i {
  color: #ffffff !important;
}
</style>

<section class="subpage-main-section sch-aid-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="sch-aid-main-card">

          <!-- Banner Header -->
          <div class="sch-aid-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-graduation-cap me-1"></i> Student Financial Welfare
              </span>
              <h3 class="fw-bold text-white mb-0 fs-3">SCHOLARSHIP &amp; FINANCIAL AID</h3>
            </div>
          </div>

          <!-- Body -->
          <div class="p-4">

            <!-- Stat Chips -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-sm-6 col-md-3">
                <div class="sch-aid-stat-chip">
                  <div class="sch-aid-stat-icon"><i class="fa-solid fa-building-columns"></i></div>
                  <div style="min-width: 0; flex: 1;">
                    <div class="text-muted extra-small uppercase fw-bold">Schemes</div>
                    <div class="fw-bold text-dark fs-6">MP Govt &amp; National</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="sch-aid-stat-chip">
                  <div class="sch-aid-stat-icon"><i class="fa-solid fa-users"></i></div>
                  <div style="min-width: 0; flex: 1;">
                    <div class="text-muted extra-small uppercase fw-bold">Categories</div>
                    <div class="fw-bold text-dark fs-6">SC / ST / OBC / Minority</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="sch-aid-stat-chip">
                  <div class="sch-aid-stat-icon"><i class="fa-solid fa-laptop-code"></i></div>
                  <div style="min-width: 0; flex: 1;">
                    <div class="text-muted extra-small uppercase fw-bold">Portal</div>
                    <div class="fw-bold text-dark fs-6">MPTAAS &amp; Tribal</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="sch-aid-stat-chip">
                  <div class="sch-aid-stat-icon"><i class="fa-solid fa-hand-holding-hand"></i></div>
                  <div style="min-width: 0; flex: 1;">
                    <div class="text-muted extra-small uppercase fw-bold">Support</div>
                    <div class="fw-bold text-dark fs-6">Scholarship Cell</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Main Information Cards -->
            <div class="sch-aid-card">
              <div class="sch-aid-card-header">
                <i class="fa-solid fa-award"></i>
                <h5 class="fw-bold text-dark mb-0">Government Scholarship Schemes</h5>
              </div>

              <!-- Scheme 1: MP Govt SC/ST/OBC -->
              <div class="sch-aid-scheme-box">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-2">
                  <h6 class="fw-bold text-dark mb-0">
                    <i class="fa-solid fa-shield-halved text-warning me-2"></i>MP Government Post-Matric Scholarship (SC / ST / OBC)
                  </h6>
                </div>
                <p class="text-secondary lh-base mb-0" style="font-size: 0.95rem;">
                  Government of Madhya Pradesh has introduced scholarship schemes for students belonging to reserved classes i.e. Scheduled caste (SC)/ Scheduled Tribes(ST) &amp; Other Backward Castes (OBC- Non creamy Layer) pursuing higher education. For availing benefits under these schemes, candidates can apply online on web site of Adim Jati Kalyan Vibhag.
                </p>
              </div>

              <!-- Scheme 2: Minority Communities -->
              <div class="sch-aid-scheme-box">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-2">
                  <h6 class="fw-bold text-dark mb-0">
                    <i class="fa-solid fa-hands-holding-child text-warning me-2"></i>Minority Community Scholarships
                  </h6>
                </div>
                <p class="text-secondary lh-base mb-0" style="font-size: 0.95rem;">
                  Similar schemes are available for students belonging to minority Communities.
                </p>
              </div>

              <!-- Scheme 3: University Assistance -->
              <div class="sch-aid-scheme-box mb-0" style="border-left-color: #0b2545;">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-2">
                  <h6 class="fw-bold text-dark mb-0">
                    <i class="fa-solid fa-headset text-primary me-2"></i>University Dedicated Scholarship Cell
                  </h6>
                </div>
                <p class="text-secondary lh-base mb-0" style="font-size: 0.95rem;">
                  <strong>The University has committed officials in scholarship department to help students applying for scholarship schemes in &amp; outside Madhya Pradesh.</strong>
                </p>
              </div>
            </div>

          </div>
        </div><!-- end sch-aid-main-card -->
      </div><!-- end col-lg-8 -->

      <!-- Sticky Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>