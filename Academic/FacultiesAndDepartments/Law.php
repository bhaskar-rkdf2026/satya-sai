<?php
$page_title = 'Law - SSSUTMS';
$banner_title = 'Law';
$banner_category = 'Academic';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
.law-page-section { background-color: #f8fafc; }
.law-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15,23,42,0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}
.law-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2rem;
  position: relative;
}
.law-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.law-stat-chip {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 14px 18px;
  display: flex; align-items: center; gap: 14px;
  height: 100%;
  transition: all 0.2s ease;
}
.law-stat-chip:hover {
  border-color: #cbd5e1;
  box-shadow: 0 4px 14px rgba(0,0,0,0.04);
}
.law-stat-icon {
  width: 44px; height: 44px;
  border-radius: 10px;
  background: rgba(245,158,11,0.1);
  color: #d97706;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.25rem; flex-shrink: 0;
}
.law-course-label {
  display: flex; align-items: center;
  margin: 1.5rem 0 0.6rem 0;
}
.law-course-label-pill {
  background: linear-gradient(90deg, #0b2545, #1e4d8c);
  color: #fbbf24;
  font-size: 0.78rem; font-weight: 800;
  letter-spacing: 0.06em; text-transform: uppercase;
  padding: 6px 16px 6px 14px;
  border-radius: 8px 0 0 8px;
  display: flex; align-items: center; gap: 7px;
  white-space: nowrap;
}
.law-course-label-duration {
  background: #f59e0b;
  color: #ffffff;
  font-size: 0.78rem; font-weight: 800;
  padding: 6px 14px;
  border-radius: 0 8px 8px 0;
  white-space: nowrap;
}
.law-course-table {
  width: 100%; border-collapse: collapse;
  font-size: 0.92rem; margin-bottom: 0;
}
.law-course-table thead th {
  background: #1e3a5f; color: #ffffff;
  font-weight: 600; padding: 11px 14px;
  border: none; text-align: left;
  font-size: 0.88rem; letter-spacing: 0.03em;
  text-transform: uppercase;
}
.law-course-table tbody tr:nth-child(even) { background: #f0f4f9; }
.law-course-table tbody tr:nth-child(odd)  { background: #ffffff; }
.law-course-table tbody tr:hover {
  background: #e8f0fb;
  transition: background 0.15s ease;
}
.law-course-table tbody td {
  padding: 10px 14px;
  border-bottom: 1px solid #e2e8f0;
  color: #334155; vertical-align: middle;
}
.law-course-table tbody td:first-child { font-weight: 600; color: #0b2545; }
.law-badge-duration {
  display: inline-block;
  background: rgba(245,158,11,0.12);
  color: #b45309; font-weight: 700; font-size: 0.82rem;
  border-radius: 6px; padding: 3px 10px;
  border: 1px solid rgba(245,158,11,0.25);
}
.law-badge-intake {
  display: inline-block;
  background: rgba(11,37,69,0.07);
  color: #1e3a5f; font-weight: 700; font-size: 0.82rem;
  border-radius: 6px; padding: 3px 10px;
  border: 1px solid rgba(11,37,69,0.15);
}
.law-table-wrapper {
  border-radius: 12px; overflow: hidden;
  border: 1px solid #e2e8f0;
  box-shadow: 0 4px 16px rgba(0,0,0,0.03);
}
</style>

<section class="subpage-main-section law-page-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="law-main-card">

          <!-- Banner Header -->
          <div class="law-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-scale-balanced me-1"></i> Faculties &amp; Departments
              </span>
              <h3 class="fw-bold text-white mb-0 fs-3">FACULTY OF LAW</h3>
            </div>
          </div>

          <!-- Body -->
          <div class="p-4">

            <!-- Stat Chips -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-sm-6 col-md-4">
                <div class="law-stat-chip">
                  <div class="law-stat-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Program</div>
                    <div class="fw-bold text-dark fs-6">L.L.B.</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-4">
                <div class="law-stat-chip">
                  <div class="law-stat-icon"><i class="fa-solid fa-clock"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Duration</div>
                    <div class="fw-bold text-dark fs-6">3 Years</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-4">
                <div class="law-stat-chip">
                  <div class="law-stat-icon"><i class="fa-solid fa-users"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Intake</div>
                    <div class="fw-bold text-dark fs-6">120 Seats</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- ===== L.L.B. ===== -->
            <div class="law-course-label">
              <div class="law-course-label-pill"><i class="fa-solid fa-layer-group"></i> L.L.B. (Bachelor of Law)</div>
              <div class="law-course-label-duration">3 Years</div>
            </div>
            <div class="law-table-wrapper mb-2">
              <table class="law-course-table">
                <thead>
                  <tr>
                    <th style="width:55%;">Branch</th>
                    <th style="width:25%;">Duration</th>
                    <th style="width:20%;">Intake</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Bachelor of Law</td>
                    <td><span class="law-badge-duration">3 Yrs.</span></td>
                    <td><span class="law-badge-intake">120</span></td>
                  </tr>
                </tbody>
              </table>
            </div>

          </div>
        </div><!-- end law-main-card -->
      </div><!-- end col-lg-8 -->

      <!-- Sticky Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
