<?php
$page_title = 'Pharmacy - SSSUTMS';
$banner_title = 'Pharmacy';
$banner_category = 'Academic';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
.pharm-page-section {
  background-color: #f8fafc;
}
.pharm-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}
.pharm-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2rem;
  position: relative;
}
.pharm-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.pharm-stat-chip {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 14px 18px;
  display: flex;
  align-items: center;
  gap: 14px;
  height: 100%;
  transition: all 0.2s ease;
}
.pharm-stat-chip:hover {
  border-color: #cbd5e1;
  box-shadow: 0 4px 14px rgba(0,0,0,0.04);
}
.pharm-stat-icon {
  width: 44px;
  height: 44px;
  border-radius: 10px;
  background: rgba(245, 158, 11, 0.1);
  color: #d97706;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.25rem;
  flex-shrink: 0;
}
/* Institute Block Header */
.pharm-institute-block {
  position: relative;
  margin: 2rem 0 1.25rem 0;
  padding: 1.1rem 1.5rem;
  background: #f8fafc;
  border-radius: 14px;
  border: 1px solid #e2e8f0;
  border-left: 5px solid #f59e0b;
  display: flex;
  align-items: center;
  gap: 14px;
}
.pharm-institute-icon {
  width: 46px;
  height: 46px;
  border-radius: 10px;
  background: linear-gradient(135deg, #0b2545, #1e4d8c);
  color: #fbbf24;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.2rem;
  flex-shrink: 0;
  box-shadow: 0 4px 12px rgba(11,37,69,0.18);
}
.pharm-institute-block-title {
  font-size: 0.78rem;
  font-weight: 700;
  letter-spacing: 0.08em;
  text-transform: uppercase;
  color: #94a3b8;
  margin-bottom: 2px;
}
.pharm-institute-block-name {
  font-size: 1.05rem;
  font-weight: 800;
  color: #0b2545;
  line-height: 1.2;
}
/* Course Label */
.pharm-course-label {
  display: flex;
  align-items: center;
  margin: 1rem 0 0.6rem 0;
}
.pharm-course-label-pill {
  background: linear-gradient(90deg, #0b2545, #1e4d8c);
  color: #fbbf24;
  font-size: 0.78rem;
  font-weight: 800;
  letter-spacing: 0.06em;
  text-transform: uppercase;
  padding: 6px 16px 6px 14px;
  border-radius: 8px 0 0 8px;
  display: flex;
  align-items: center;
  gap: 7px;
  white-space: nowrap;
}
.pharm-course-label-duration {
  background: #f59e0b;
  color: #ffffff;
  font-size: 0.78rem;
  font-weight: 800;
  letter-spacing: 0.04em;
  padding: 6px 14px;
  border-radius: 0 8px 8px 0;
  white-space: nowrap;
}
/* Course Table */
.pharm-course-table {
  width: 100%;
  border-collapse: collapse;
  font-size: 0.92rem;
  margin-bottom: 0;
}
.pharm-course-table thead th {
  background: #1e3a5f;
  color: #ffffff;
  font-weight: 600;
  padding: 11px 14px;
  border: none;
  text-align: left;
  font-size: 0.88rem;
  letter-spacing: 0.03em;
  text-transform: uppercase;
}
.pharm-course-table tbody tr:nth-child(even) {
  background: #f0f4f9;
}
.pharm-course-table tbody tr:nth-child(odd) {
  background: #ffffff;
}
.pharm-course-table tbody tr:hover {
  background: #e8f0fb;
  transition: background 0.15s ease;
}
.pharm-course-table tbody td {
  padding: 10px 14px;
  border-bottom: 1px solid #e2e8f0;
  color: #334155;
  vertical-align: middle;
}
.pharm-course-table tbody td:first-child {
  font-weight: 600;
  color: #0b2545;
}
.pharm-badge-duration {
  display: inline-block;
  background: rgba(245, 158, 11, 0.12);
  color: #b45309;
  font-weight: 700;
  font-size: 0.82rem;
  border-radius: 6px;
  padding: 3px 10px;
  border: 1px solid rgba(245, 158, 11, 0.25);
}
.pharm-table-wrapper {
  border-radius: 12px;
  overflow: hidden;
  border: 1px solid #e2e8f0;
  box-shadow: 0 4px 16px rgba(0,0,0,0.03);
}
</style>

<section class="subpage-main-section pharm-page-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">

        <div class="pharm-main-card">

          <!-- Banner Header -->
          <div class="pharm-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-capsules me-1"></i> Faculties &amp; Departments
              </span>
              <h3 class="fw-bold text-white mb-0 fs-3">FACULTY OF PHARMACY</h3>
            </div>
          </div>

          <!-- Body -->
          <div class="p-4">

            <!-- Stat Chips -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-sm-6 col-md-4">
                <div class="pharm-stat-chip">
                  <div class="pharm-stat-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">UG Programs</div>
                    <div class="fw-bold text-dark fs-6">B.Pharm</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-4">
                <div class="pharm-stat-chip">
                  <div class="pharm-stat-icon"><i class="fa-solid fa-microscope"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">PG Programs</div>
                    <div class="fw-bold text-dark fs-6">M.Pharm</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-4">
                <div class="pharm-stat-chip">
                  <div class="pharm-stat-icon"><i class="fa-solid fa-pills"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Diploma</div>
                    <div class="fw-bold text-dark fs-6">D.Pharm</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- ===== INSTITUTE 1: SCHOOL OF PHARMACY ===== -->
            <div class="pharm-institute-block">
              <div class="pharm-institute-icon">
                <i class="fa-solid fa-school"></i>
              </div>
              <div>
                <div class="pharm-institute-block-title">Institute Name</div>
                <div class="pharm-institute-block-name">Faculty of Pharmacy (School of Pharmacy)</div>
              </div>
            </div>

            <div class="pharm-course-label">
              <div class="pharm-course-label-pill">
                <i class="fa-solid fa-layer-group"></i>
                Bachelor of Pharmacy
              </div>
              <div class="pharm-course-label-duration">4 Years</div>
            </div>
            <div class="pharm-table-wrapper mb-4">
              <table class="pharm-course-table">
                <thead>
                  <tr>
                    <th style="width:50%;">Course</th>
                    <th style="width:35%;">Branch</th>
                    <th style="width:15%;">Duration</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Bachelor of Pharmacy</td>
                    <td>Pharmacy</td>
                    <td><span class="pharm-badge-duration">4 Yrs.</span></td>
                  </tr>
                </tbody>
              </table>
            </div>

            <!-- ===== INSTITUTE 2: COLLEGE OF PHARMACY ===== -->
            <div class="pharm-institute-block">
              <div class="pharm-institute-icon">
                <i class="fa-solid fa-school-flag"></i>
              </div>
              <div>
                <div class="pharm-institute-block-title">Institute Name</div>
                <div class="pharm-institute-block-name">Faculty of Pharmacy (College of Pharmacy)</div>
              </div>
            </div>

            <div class="pharm-course-label">
              <div class="pharm-course-label-pill">
                <i class="fa-solid fa-layer-group"></i>
                Bachelor of Pharmacy
              </div>
              <div class="pharm-course-label-duration">4 Years</div>
            </div>
            <div class="pharm-table-wrapper mb-3">
              <table class="pharm-course-table">
                <thead>
                  <tr>
                    <th style="width:50%;">Course</th>
                    <th style="width:35%;">Branch</th>
                    <th style="width:15%;">Duration</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Bachelor of Pharmacy</td>
                    <td>Pharmacy</td>
                    <td><span class="pharm-badge-duration">4 Yrs.</span></td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="pharm-course-label">
              <div class="pharm-course-label-pill">
                <i class="fa-solid fa-layer-group"></i>
                Master of Pharmacy
              </div>
              <div class="pharm-course-label-duration">2 Years</div>
            </div>
            <div class="pharm-table-wrapper mb-4">
              <table class="pharm-course-table">
                <thead>
                  <tr>
                    <th style="width:50%;">Course</th>
                    <th style="width:35%;">Branch</th>
                    <th style="width:15%;">Duration</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Master of Pharmacy</td>
                    <td>Pharmaceutics</td>
                    <td><span class="pharm-badge-duration">2 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td>Master of Pharmacy</td>
                    <td>Pharmacology</td>
                    <td><span class="pharm-badge-duration">2 Yrs.</span></td>
                  </tr>
                </tbody>
              </table>
            </div>

            <!-- ===== INSTITUTE 3: POLYTECHNIC PHARMACY ===== -->
            <div class="pharm-institute-block">
              <div class="pharm-institute-icon">
                <i class="fa-solid fa-building"></i>
              </div>
              <div>
                <div class="pharm-institute-block-title">Institute Name</div>
                <div class="pharm-institute-block-name">Polytechnic Pharmacy</div>
              </div>
            </div>

            <div class="pharm-course-label">
              <div class="pharm-course-label-pill">
                <i class="fa-solid fa-layer-group"></i>
                Diploma Pharmacy
              </div>
              <div class="pharm-course-label-duration">2 Years</div>
            </div>
            <div class="pharm-table-wrapper mb-2">
              <table class="pharm-course-table">
                <thead>
                  <tr>
                    <th style="width:50%;">Course</th>
                    <th style="width:35%;">Branch</th>
                    <th style="width:15%;">Duration</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Diploma Pharmacy</td>
                    <td>Pharmacy</td>
                    <td><span class="pharm-badge-duration">2 Yrs.</span></td>
                  </tr>
                </tbody>
              </table>
            </div>

          </div>
        </div><!-- end pharm-main-card -->

      </div><!-- end col-lg-8 -->

      <!-- Sticky Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
