<?php
$page_title = 'NAAC SSR - SSSUTMS';
$banner_title = 'NAAC SSR';
$banner_category = 'Academic';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
.naac-section { background-color: #f8fafc; }
.naac-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15,23,42,0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}
.naac-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2.2rem 2rem;
  position: relative;
}
.naac-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.naac-stat-chip {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 16px 14px;
  display: flex; align-items: center; gap: 12px;
  height: 100%;
  transition: all 0.25s ease;
  box-shadow: 0 4px 12px rgba(0,0,0,0.02);
}
.naac-stat-chip:hover {
  border-color: #cbd5e1;
  box-shadow: 0 6px 18px rgba(11,37,69,0.07);
  transform: translateY(-2px);
}
.naac-stat-icon {
  width: 48px; height: 48px;
  border-radius: 12px;
  background: rgba(245,158,11,0.12);
  color: #d97706;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.35rem; flex-shrink: 0;
}
.naac-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 16px;
  padding: 1.5rem;
  box-shadow: 0 4px 16px rgba(0,0,0,0.02);
  margin-bottom: 1.75rem;
}
.naac-card-header {
  display: flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 1.2rem;
  padding-bottom: 0.85rem;
  border-bottom: 2px solid #f1f5f9;
}
.naac-card-header i {
  color: #f59e0b;
  font-size: 1.3rem;
}
.naac-doc-item {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 16px 20px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 15px;
}
.naac-download-btn {
  background: linear-gradient(135deg, #0b2545 0%, #1e4d8c 100%) !important;
  color: #ffffff !important;
  font-size: 0.85rem;
  font-weight: 700;
  padding: 8px 18px;
  border-radius: 8px;
  border: 1px solid rgba(245,158,11,0.35);
  text-decoration: none !important;
  display: inline-flex;
  align-items: center;
  gap: 8px;
  box-shadow: 0 2px 6px rgba(11,37,69,0.15);
  transition: all 0.2s ease;
}
.naac-download-btn i {
  color: #fbbf24 !important;
}
.naac-download-btn:hover {
  background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%) !important;
  color: #ffffff !important;
  border-color: #d97706;
  box-shadow: 0 4px 12px rgba(217,119,6,0.35);
  transform: translateY(-1px);
}
</style>

<section class="subpage-main-section naac-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="naac-main-card">

          <!-- Banner Header -->
          <div class="naac-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-award me-1"></i> NAAC Accreditation
              </span>
              <h3 class="fw-bold text-white mb-1 fs-3">SELF STUDY REPORT (SSR)</h3>
              <p class="text-white-50 mb-0 small">Institutional Self Study Report Submitted to National Assessment and Accreditation Council</p>
            </div>
          </div>

          <!-- Body Content -->
          <div class="p-4">

            <!-- Stat Chips -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-sm-6 col-md-3">
                <div class="naac-stat-chip">
                  <div class="naac-stat-icon"><i class="fa-solid fa-file-invoice"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Document</div>
                    <div class="fw-bold text-dark fs-6">Self Study Report</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="naac-stat-chip">
                  <div class="naac-stat-icon"><i class="fa-solid fa-shield-halved"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Accreditation</div>
                    <div class="fw-bold text-dark fs-6">NAAC Assessment</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="naac-stat-chip">
                  <div class="naac-stat-icon"><i class="fa-solid fa-building-columns"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Institution</div>
                    <div class="fw-bold text-dark fs-6">SSSUTMS, Sehore</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="naac-stat-chip">
                  <div class="naac-stat-icon"><i class="fa-solid fa-square-check"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Status</div>
                    <div class="fw-bold text-dark fs-6">Modified &amp; Verified</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- SSR Document Card -->
            <div class="naac-card mb-0">
              <div class="naac-card-header">
                <i class="fa-solid fa-file-pdf"></i>
                <h5 class="fw-bold text-dark mb-0">NAAC Self Study Report Document</h5>
              </div>

              <div class="naac-doc-item">
                <div class="d-flex align-items-center gap-3">
                  <i class="fa-solid fa-file-pdf text-danger fs-2"></i>
                  <div>
                    <h6 class="fw-bold text-dark mb-1">SELF STUDY REPORT (SSR) - MPUNGN104030</h6>
                    <span class="text-muted small">Complete Self Study Report Document for NAAC Accreditation</span>
                  </div>
                </div>

                <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/MPUNGN104030_SSR_MODIFIED.pdf" target="_blank" rel="noopener" class="naac-download-btn">
                  <i class="fa-solid fa-file-arrow-down"></i> Download SSR PDF
                </a>
              </div>
            </div>

          </div>
        </div><!-- end naac-main-card -->
      </div><!-- end col-lg-8 -->

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>