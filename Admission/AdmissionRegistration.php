<?php
$page_title = 'Admission Registration - SSSUTMS';
$banner_title = 'Admission Registration';
$banner_category = 'Admission';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';

$registration_url = 'https://www.sssutms.co.in/erp/Student/Registration/Index/ojdZaOYsXtpmswGfjiVVww%3d%3d';
?>

<style>
.ar-section { background-color: #f8fafc; }
.ar-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15,23,42,0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}
.ar-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2.2rem 2rem;
  position: relative;
}
.ar-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.ar-stat-chip {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 12px 14px;
  display: flex; align-items: center; gap: 11px;
  height: 100%;
  transition: all 0.25s ease;
  box-shadow: 0 3px 10px rgba(0,0,0,0.02);
}
.ar-stat-chip:hover {
  border-color: #cbd5e1;
  box-shadow: 0 6px 16px rgba(11,37,69,0.07);
  transform: translateY(-2px);
}
.ar-stat-icon {
  width: 42px; height: 42px;
  border-radius: 10px;
  background: rgba(245,158,11,0.12);
  color: #d97706;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.15rem; flex-shrink: 0;
}
.ar-chip-label {
  font-size: 0.72rem;
  text-transform: uppercase;
  font-weight: 700;
  color: #64748b;
  line-height: 1.2;
}
.ar-chip-val {
  font-size: 0.9rem;
  font-weight: 700;
  color: #1e293b;
  line-height: 1.25;
}
.ar-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 16px;
  padding: 1.75rem;
  box-shadow: 0 4px 16px rgba(0,0,0,0.02);
  margin-bottom: 0;
}
.ar-portal-btn {
  background: linear-gradient(135deg, #0b2545 0%, #1e4d8c 100%) !important;
  color: #ffffff !important;
  font-size: 1.1rem;
  font-weight: 700;
  padding: 16px 32px;
  border-radius: 12px;
  border: 1px solid rgba(245,158,11,0.4);
  text-decoration: none !important;
  display: inline-flex;
  align-items: center;
  gap: 12px;
  box-shadow: 0 6px 20px rgba(11,37,69,0.18);
  transition: all 0.25s ease;
}
.ar-portal-btn i {
  color: #fbbf24 !important;
}
.ar-portal-btn:hover {
  background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%) !important;
  color: #ffffff !important;
  border-color: #d97706;
  box-shadow: 0 8px 24px rgba(217,119,6,0.35);
  transform: translateY(-3px);
}
</style>

<section class="subpage-main-section ar-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="ar-main-card">

          <!-- Header Banner -->
          <div class="ar-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-user-pen me-1"></i> E-Pravesh Online Portal
              </span>
              <h3 class="fw-bold text-white mb-1 fs-3">ADMISSION REGISTRATION 2026-27</h3>
              <p class="text-white-50 mb-0 small">Direct Application Portal for Undergraduate, Postgraduate &amp; Diploma Courses</p>
            </div>
          </div>

          <!-- Content Body -->
          <div class="p-4">

            <!-- Compact Stat Chips -->
            <div class="row g-2 align-items-stretch mb-4">
              <div class="col-sm-6 col-md-3">
                <div class="ar-stat-chip">
                  <div class="ar-stat-icon"><i class="fa-solid fa-laptop-code"></i></div>
                  <div>
                    <div class="ar-chip-label">Portal</div>
                    <div class="ar-chip-val">E-Pravesh 2026</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="ar-stat-chip">
                  <div class="ar-stat-icon"><i class="fa-solid fa-bolt"></i></div>
                  <div>
                    <div class="ar-chip-label">Registration</div>
                    <div class="ar-chip-val">Instant Application</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="ar-stat-chip">
                  <div class="ar-stat-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                  <div>
                    <div class="ar-chip-label">Scope</div>
                    <div class="ar-chip-val">All Disciplines</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="ar-stat-chip">
                  <div class="ar-stat-icon"><i class="fa-solid fa-shield-halved"></i></div>
                  <div>
                    <div class="ar-chip-label">Security</div>
                    <div class="ar-chip-val">Encrypted ERP Portal</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Portal Access Card -->
            <div class="ar-card text-center py-5">
              <div class="mb-3">
                <span class="badge bg-warning text-dark fw-bold px-3 py-2 fs-6 rounded-pill mb-2"><i class="fa-solid fa-pen-to-square me-1"></i> E-Pravesh 2026 (Online Enquiry &amp; Registration Form)</span>
                <h4 class="fw-bold text-dark mb-2">Apply Online for Session 2026-27</h4>
                <p class="text-muted small max-w-lg mx-auto mb-4">Click below to access the University's official student registration ERP portal for course selection and document submission.</p>
              </div>

              <div>
                <a href="<?php echo $registration_url; ?>" target="_blank" rel="noopener" class="ar-portal-btn">
                  <i class="fa-solid fa-right-to-bracket fs-4"></i> Proceed to Online Registration Portal
                </a>
              </div>
            </div>

          </div>
        </div><!-- end ar-main-card -->
      </div><!-- end col-lg-8 -->

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>