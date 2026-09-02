<?php
$page_title = 'Management - SSSUTMS';
$banner_title = 'Management';
$banner_category = 'Academic';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
.mgmt-page-section { background-color: #f8fafc; }
.mgmt-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15,23,42,0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}
.mgmt-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2rem;
  position: relative;
}
.mgmt-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.mgmt-stat-chip {
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
.mgmt-stat-chip:hover {
  border-color: #cbd5e1;
  box-shadow: 0 4px 14px rgba(0,0,0,0.04);
}
.mgmt-stat-icon {
  width: 44px; height: 44px;
  border-radius: 10px;
  background: rgba(245,158,11,0.1);
  color: #d97706;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.25rem; flex-shrink: 0;
}
.mgmt-institute-block {
  position: relative;
  margin: 2rem 0 1.25rem 0;
  padding: 1.1rem 1.5rem;
  background: #f8fafc;
  border-radius: 14px;
  border: 1px solid #e2e8f0;
  border-left: 5px solid #f59e0b;
  display: flex; align-items: center; gap: 14px;
}
.mgmt-institute-icon {
  width: 46px; height: 46px;
  border-radius: 10px;
  background: linear-gradient(135deg, #0b2545, #1e4d8c);
  color: #fbbf24;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.2rem; flex-shrink: 0;
  box-shadow: 0 4px 12px rgba(11,37,69,0.18);
}
.mgmt-institute-block-title {
  font-size: 0.78rem; font-weight: 700;
  letter-spacing: 0.08em; text-transform: uppercase;
  color: #94a3b8; margin-bottom: 2px;
}
.mgmt-institute-block-name {
  font-size: 1.05rem; font-weight: 800;
  color: #0b2545; line-height: 1.2;
}
.mgmt-course-label {
  display: flex; align-items: center;
  margin: 1rem 0 0.6rem 0;
}
.mgmt-course-label-pill {
  background: linear-gradient(90deg, #0b2545, #1e4d8c);
  color: #fbbf24;
  font-size: 0.78rem; font-weight: 800;
  letter-spacing: 0.06em; text-transform: uppercase;
  padding: 6px 16px 6px 14px;
  border-radius: 8px 0 0 8px;
  display: flex; align-items: center; gap: 7px;
  white-space: nowrap;
}
.mgmt-course-label-duration {
  background: #f59e0b;
  color: #ffffff;
  font-size: 0.78rem; font-weight: 800;
  letter-spacing: 0.04em;
  padding: 6px 14px;
  border-radius: 0 8px 8px 0;
  white-space: nowrap;
}
.mgmt-course-table {
  width: 100%; border-collapse: collapse;
  font-size: 0.92rem; margin-bottom: 0;
}
.mgmt-course-table thead th {
  background: #1e3a5f; color: #ffffff;
  font-weight: 600; padding: 11px 14px;
  border: none; text-align: left;
  font-size: 0.88rem; letter-spacing: 0.03em;
  text-transform: uppercase;
}
.mgmt-course-table tbody tr:nth-child(even) { background: #f0f4f9; }
.mgmt-course-table tbody tr:nth-child(odd)  { background: #ffffff; }
.mgmt-course-table tbody tr:hover {
  background: #e8f0fb;
  transition: background 0.15s ease;
}
.mgmt-course-table tbody td {
  padding: 10px 14px;
  border-bottom: 1px solid #e2e8f0;
  color: #334155; vertical-align: middle;
}
.mgmt-course-table tbody td:first-child { font-weight: 600; color: #0b2545; }
.mgmt-badge-duration {
  display: inline-block;
  background: rgba(245,158,11,0.12);
  color: #b45309; font-weight: 700; font-size: 0.82rem;
  border-radius: 6px; padding: 3px 10px;
  border: 1px solid rgba(245,158,11,0.25);
}
.mgmt-table-wrapper {
  border-radius: 12px; overflow: hidden;
  border: 1px solid #e2e8f0;
  box-shadow: 0 4px 16px rgba(0,0,0,0.03);
}
</style>

<section class="subpage-main-section mgmt-page-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="mgmt-main-card">

          <!-- Banner Header -->
          <div class="mgmt-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-briefcase me-1"></i> Faculties &amp; Departments
              </span>
              <h3 class="fw-bold text-white mb-0 fs-3">FACULTY OF MANAGEMENT</h3>
            </div>
          </div>

          <!-- Body -->
          <div class="p-4">

            <!-- Stat Chips -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-sm-6 col-md-3">
                <div class="mgmt-stat-chip">
                  <div class="mgmt-stat-icon"><i class="fa-solid fa-chart-line"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Program</div>
                    <div class="fw-bold text-dark fs-6">MBA</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="mgmt-stat-chip">
                  <div class="mgmt-stat-icon"><i class="fa-solid fa-hotel"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Program</div>
                    <div class="fw-bold text-dark fs-6">BHMCT</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="mgmt-stat-chip">
                  <div class="mgmt-stat-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Program</div>
                    <div class="fw-bold text-dark fs-6">BBA</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="mgmt-stat-chip">
                  <div class="mgmt-stat-icon"><i class="fa-solid fa-school"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Institutes</div>
                    <div class="fw-bold text-dark fs-6">5 Schools</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- ===== INSTITUTE 1: School of Management Studies ===== -->
            <div class="mgmt-institute-block">
              <div class="mgmt-institute-icon"><i class="fa-solid fa-school"></i></div>
              <div>
                <div class="mgmt-institute-block-title">Institute Name</div>
                <div class="mgmt-institute-block-name">School of Management Studies</div>
              </div>
            </div>
            <div class="mgmt-course-label">
              <div class="mgmt-course-label-pill"><i class="fa-solid fa-layer-group"></i> MBA</div>
              <div class="mgmt-course-label-duration">2 Years</div>
            </div>
            <div class="mgmt-table-wrapper mb-4">
              <table class="mgmt-course-table">
                <thead>
                  <tr>
                    <th style="width:50%;">Course</th>
                    <th style="width:35%;">Branch</th>
                    <th style="width:15%;">Duration</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>MBA</td>
                    <td>Management</td>
                    <td><span class="mgmt-badge-duration">2 Yrs.</span></td>
                  </tr>
                </tbody>
              </table>
            </div>

            <!-- ===== INSTITUTE 2: School of Engineering ===== -->
            <div class="mgmt-institute-block">
              <div class="mgmt-institute-icon"><i class="fa-solid fa-gear"></i></div>
              <div>
                <div class="mgmt-institute-block-title">Institute Name</div>
                <div class="mgmt-institute-block-name">School of Engineering</div>
              </div>
            </div>
            <div class="mgmt-course-label">
              <div class="mgmt-course-label-pill"><i class="fa-solid fa-layer-group"></i> MBA</div>
              <div class="mgmt-course-label-duration">2 Years</div>
            </div>
            <div class="mgmt-table-wrapper mb-4">
              <table class="mgmt-course-table">
                <thead>
                  <tr>
                    <th style="width:50%;">Course</th>
                    <th style="width:35%;">Branch</th>
                    <th style="width:15%;">Duration</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>MBA</td>
                    <td>Management</td>
                    <td><span class="mgmt-badge-duration">2 Yrs.</span></td>
                  </tr>
                </tbody>
              </table>
            </div>

            <!-- ===== INSTITUTE 3: School of Computer Application ===== -->
            <div class="mgmt-institute-block">
              <div class="mgmt-institute-icon"><i class="fa-solid fa-desktop"></i></div>
              <div>
                <div class="mgmt-institute-block-title">Institute Name</div>
                <div class="mgmt-institute-block-name">School of Computer Application</div>
              </div>
            </div>
            <div class="mgmt-course-label">
              <div class="mgmt-course-label-pill"><i class="fa-solid fa-layer-group"></i> MBA</div>
              <div class="mgmt-course-label-duration">2 Years</div>
            </div>
            <div class="mgmt-table-wrapper mb-4">
              <table class="mgmt-course-table">
                <thead>
                  <tr>
                    <th style="width:50%;">Course</th>
                    <th style="width:35%;">Branch</th>
                    <th style="width:15%;">Duration</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>MBA</td>
                    <td>Management</td>
                    <td><span class="mgmt-badge-duration">2 Yrs.</span></td>
                  </tr>
                </tbody>
              </table>
            </div>

            <!-- ===== INSTITUTE 4: School of Hotel Management ===== -->
            <div class="mgmt-institute-block">
              <div class="mgmt-institute-icon"><i class="fa-solid fa-hotel"></i></div>
              <div>
                <div class="mgmt-institute-block-title">Institute Name</div>
                <div class="mgmt-institute-block-name">School of Hotel Management</div>
              </div>
            </div>
            <div class="mgmt-course-label">
              <div class="mgmt-course-label-pill"><i class="fa-solid fa-layer-group"></i> BHMCT</div>
              <div class="mgmt-course-label-duration">4 Years</div>
            </div>
            <div class="mgmt-table-wrapper mb-4">
              <table class="mgmt-course-table">
                <thead>
                  <tr>
                    <th style="width:50%;">Course</th>
                    <th style="width:35%;">Branch</th>
                    <th style="width:15%;">Duration</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>BHMCT</td>
                    <td>Hotel Management and Catering</td>
                    <td><span class="mgmt-badge-duration">4 Yrs.</span></td>
                  </tr>
                </tbody>
              </table>
            </div>

            <!-- ===== INSTITUTE 5: Faculty of Education ===== -->
            <div class="mgmt-institute-block">
              <div class="mgmt-institute-icon"><i class="fa-solid fa-chalkboard-teacher"></i></div>
              <div>
                <div class="mgmt-institute-block-title">Institute Name</div>
                <div class="mgmt-institute-block-name">Faculty of Education</div>
              </div>
            </div>
            <div class="mgmt-course-label">
              <div class="mgmt-course-label-pill"><i class="fa-solid fa-layer-group"></i> BBA</div>
              <div class="mgmt-course-label-duration">3 Years</div>
            </div>
            <div class="mgmt-table-wrapper mb-2">
              <table class="mgmt-course-table">
                <thead>
                  <tr>
                    <th style="width:50%;">Course</th>
                    <th style="width:35%;">Branch</th>
                    <th style="width:15%;">Duration</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>BBA</td>
                    <td>Management</td>
                    <td><span class="mgmt-badge-duration">3 Yrs.</span></td>
                  </tr>
                </tbody>
              </table>
            </div>

          </div>
        </div><!-- end mgmt-main-card -->
      </div><!-- end col-lg-8 -->

      <!-- Sticky Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
