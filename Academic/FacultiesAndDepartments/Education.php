<?php
$page_title = 'Education - SSSUTMS';
$banner_title = 'Education';
$banner_category = 'Academic';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
.edu-page-section {
  background-color: #f8fafc;
}
.edu-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}
.edu-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2rem;
  position: relative;
}
.edu-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.edu-stat-chip {
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
.edu-stat-chip:hover {
  border-color: #cbd5e1;
  box-shadow: 0 4px 14px rgba(0,0,0,0.04);
}
.edu-stat-icon {
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
.edu-institute-block {
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
.edu-institute-icon {
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
.edu-institute-block-title {
  font-size: 0.78rem;
  font-weight: 700;
  letter-spacing: 0.08em;
  text-transform: uppercase;
  color: #94a3b8;
  margin-bottom: 2px;
}
.edu-institute-block-name {
  font-size: 1.05rem;
  font-weight: 800;
  color: #0b2545;
  line-height: 1.2;
}
/* Course Label */
.edu-course-label {
  display: flex;
  align-items: center;
  margin: 1rem 0 0.6rem 0;
}
.edu-course-label-pill {
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
.edu-course-label-duration {
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
.edu-course-table {
  width: 100%;
  border-collapse: collapse;
  font-size: 0.92rem;
  margin-bottom: 0;
}
.edu-course-table thead th {
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
.edu-course-table tbody tr:nth-child(even) {
  background: #f0f4f9;
}
.edu-course-table tbody tr:nth-child(odd) {
  background: #ffffff;
}
.edu-course-table tbody tr:hover {
  background: #e8f0fb;
  transition: background 0.15s ease;
}
.edu-course-table tbody td {
  padding: 10px 14px;
  border-bottom: 1px solid #e2e8f0;
  color: #334155;
  vertical-align: middle;
}
.edu-course-table tbody td:first-child {
  font-weight: 600;
  color: #0b2545;
}
.edu-badge-duration {
  display: inline-block;
  background: rgba(245, 158, 11, 0.12);
  color: #b45309;
  font-weight: 700;
  font-size: 0.82rem;
  border-radius: 6px;
  padding: 3px 10px;
  border: 1px solid rgba(245, 158, 11, 0.25);
}
.edu-table-wrapper {
  border-radius: 12px;
  overflow: hidden;
  border: 1px solid #e2e8f0;
  box-shadow: 0 4px 16px rgba(0,0,0,0.03);
}
</style>

<section class="subpage-main-section edu-page-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">

        <div class="edu-main-card">

          <!-- Banner Header -->
          <div class="edu-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-chalkboard-teacher me-1"></i> Faculties &amp; Departments
              </span>
              <h3 class="fw-bold text-white mb-0 fs-3">FACULTY OF EDUCATION</h3>
            </div>
          </div>

          <!-- Body -->
          <div class="p-4">

            <!-- Stat Chips -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-sm-6 col-md-3">
                <div class="edu-stat-chip">
                  <div class="edu-stat-icon"><i class="fa-solid fa-book-open"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Program</div>
                    <div class="fw-bold text-dark fs-6">B.Ed.</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="edu-stat-chip">
                  <div class="edu-stat-icon"><i class="fa-solid fa-person-running"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Program</div>
                    <div class="fw-bold text-dark fs-6">B.P.Ed.</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="edu-stat-chip">
                  <div class="edu-stat-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Program</div>
                    <div class="fw-bold text-dark fs-6">B.A.B.Ed.</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="edu-stat-chip">
                  <div class="edu-stat-icon"><i class="fa-solid fa-school"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Institutes</div>
                    <div class="fw-bold text-dark fs-6">4 Schools</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- ===== INSTITUTE 1: SCHOOL OF EDUCATION ===== -->
            <div class="edu-institute-block">
              <div class="edu-institute-icon"><i class="fa-solid fa-school"></i></div>
              <div>
                <div class="edu-institute-block-title">Institute Name</div>
                <div class="edu-institute-block-name">Faculty Of Education &mdash; (School Of Education)</div>
              </div>
            </div>

            <div class="edu-course-label">
              <div class="edu-course-label-pill">
                <i class="fa-solid fa-layer-group"></i>
                Bachelor of Education (B.Ed.)
              </div>
              <div class="edu-course-label-duration">2 Years</div>
            </div>
            <div class="edu-table-wrapper mb-4">
              <table class="edu-course-table">
                <thead>
                  <tr>
                    <th style="width:70%;">Course</th>
                    <th style="width:30%;">Duration</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Bachelor of Education (B.Ed.)</td>
                    <td><span class="edu-badge-duration">2 Yrs.</span></td>
                  </tr>
                </tbody>
              </table>
            </div>

            <!-- ===== INSTITUTE 2: SCHOOL OF TEACHER EDUCATION ===== -->
            <div class="edu-institute-block">
              <div class="edu-institute-icon"><i class="fa-solid fa-chalkboard-teacher"></i></div>
              <div>
                <div class="edu-institute-block-title">Institute Name</div>
                <div class="edu-institute-block-name">Faculty Of Education &mdash; (School Of Teacher Education)</div>
              </div>
            </div>

            <div class="edu-course-label">
              <div class="edu-course-label-pill">
                <i class="fa-solid fa-layer-group"></i>
                Bachelor of Education (B.Ed.)
              </div>
              <div class="edu-course-label-duration">2 Years</div>
            </div>
            <div class="edu-table-wrapper mb-4">
              <table class="edu-course-table">
                <thead>
                  <tr>
                    <th style="width:70%;">Course</th>
                    <th style="width:30%;">Duration</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Bachelor of Education (B.Ed.)</td>
                    <td><span class="edu-badge-duration">2 Yrs.</span></td>
                  </tr>
                </tbody>
              </table>
            </div>

            <!-- ===== INSTITUTE 3: SCHOOL OF PHYSICAL EDUCATION ===== -->
            <div class="edu-institute-block">
              <div class="edu-institute-icon"><i class="fa-solid fa-dumbbell"></i></div>
              <div>
                <div class="edu-institute-block-title">Institute Name</div>
                <div class="edu-institute-block-name">Faculty Of Education &mdash; (School Of Physical Education)</div>
              </div>
            </div>

            <div class="edu-course-label">
              <div class="edu-course-label-pill">
                <i class="fa-solid fa-layer-group"></i>
                Bachelor of Physical Education (B.P.Ed.)
              </div>
              <div class="edu-course-label-duration">2 Years</div>
            </div>
            <div class="edu-table-wrapper mb-4">
              <table class="edu-course-table">
                <thead>
                  <tr>
                    <th style="width:70%;">Course</th>
                    <th style="width:30%;">Duration</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Bachelor of Physical Education (B.P.Ed.)</td>
                    <td><span class="edu-badge-duration">2 Yrs.</span></td>
                  </tr>
                </tbody>
              </table>
            </div>

            <!-- ===== INSTITUTE 4: FACULTY OF EDUCATION ===== -->
            <div class="edu-institute-block">
              <div class="edu-institute-icon"><i class="fa-solid fa-building-columns"></i></div>
              <div>
                <div class="edu-institute-block-title">Institute Name</div>
                <div class="edu-institute-block-name">Faculty Of Education</div>
              </div>
            </div>

            <div class="edu-course-label">
              <div class="edu-course-label-pill">
                <i class="fa-solid fa-layer-group"></i>
                Bachelor of Arts Bachelor of Education (B.A.B.Ed.)
              </div>
              <div class="edu-course-label-duration">4 Years</div>
            </div>
            <div class="edu-table-wrapper mb-2">
              <table class="edu-course-table">
                <thead>
                  <tr>
                    <th style="width:70%;">Course</th>
                    <th style="width:30%;">Duration</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Bachelor of Arts Bachelor of Education (B.A.B.Ed.)</td>
                    <td><span class="edu-badge-duration">4 Yrs.</span></td>
                  </tr>
                </tbody>
              </table>
            </div>

          </div>
        </div><!-- end edu-main-card -->

      </div><!-- end col-lg-8 -->

      <!-- Sticky Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
