<?php
$page_title = 'Engineering & Technology - SSSUTMS';
$banner_title = 'Engineering & Technology';
$banner_category = 'Academic';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
.eng-page-section {
  background-color: #f8fafc;
}
.eng-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}
.eng-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2rem;
  position: relative;
}
.eng-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.eng-stat-chip {
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
.eng-stat-chip:hover {
  border-color: #cbd5e1;
  box-shadow: 0 4px 14px rgba(0,0,0,0.04);
}
.eng-stat-icon {
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


/* === Institute Section Header === */
.eng-institute-block {
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
.eng-institute-icon {
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
.eng-institute-block-title {
  font-size: 0.78rem;
  font-weight: 700;
  letter-spacing: 0.08em;
  text-transform: uppercase;
  color: #94a3b8;
  margin-bottom: 2px;
}
.eng-institute-block-name {
  font-size: 1.05rem;
  font-weight: 800;
  color: #0b2545;
  line-height: 1.2;
}

/* === Course Type Label === */
.eng-course-label {
  display: flex;
  align-items: center;
  gap: 0;
  margin: 1rem 0 0.6rem 0;
}
.eng-course-label-pill {
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
.eng-course-label-duration {
  background: #f59e0b;
  color: #ffffff;
  font-size: 0.78rem;
  font-weight: 800;
  letter-spacing: 0.04em;
  padding: 6px 14px;
  border-radius: 0 8px 8px 0;
  white-space: nowrap;
}

/* === Course Table === */
.eng-course-table {
  width: 100%;
  border-collapse: collapse;
  font-size: 0.92rem;
  margin-bottom: 0;
}
.eng-course-table thead th {
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
.eng-course-table tbody tr:nth-child(even) {
  background: #f0f4f9;
}
.eng-course-table tbody tr:nth-child(odd) {
  background: #ffffff;
}
.eng-course-table tbody tr:hover {
  background: #e8f0fb;
  transition: background 0.15s ease;
}
.eng-course-table tbody td {
  padding: 10px 14px;
  border-bottom: 1px solid #e2e8f0;
  color: #334155;
  vertical-align: middle;
}
.eng-course-table tbody td:first-child {
  font-weight: 600;
  color: #0b2545;
}
.eng-badge-duration {
  display: inline-block;
  background: rgba(245, 158, 11, 0.12);
  color: #b45309;
  font-weight: 700;
  font-size: 0.82rem;
  border-radius: 6px;
  padding: 3px 10px;
  border: 1px solid rgba(245, 158, 11, 0.25);
}
.eng-table-wrapper {
  border-radius: 12px;
  overflow: hidden;
  border: 1px solid #e2e8f0;
  box-shadow: 0 4px 16px rgba(0,0,0,0.03);
}
</style>

<section class="subpage-main-section eng-page-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        
        <!-- Main Card Wrapper -->
        <div class="eng-main-card">
          
          <!-- Banner Header -->
          <div class="eng-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-gear me-1"></i> Faculties &amp; Departments
              </span>
              <h3 class="fw-bold text-white mb-0 fs-3">SCHOOL OF ENGINEERING &amp; TECHNOLOGY</h3>
            </div>
          </div>

          <!-- Body Container -->
          <div class="p-4">

            <!-- Highlights Grid -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-sm-6 col-md-3">
                <div class="eng-stat-chip">
                  <div class="eng-stat-icon"><i class="fa-solid fa-microchip"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">UG Programs</div>
                    <div class="fw-bold text-dark fs-6">11 Branches</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="eng-stat-chip">
                  <div class="eng-stat-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">PG Programs</div>
                    <div class="fw-bold text-dark fs-6">11 Branches</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="eng-stat-chip">
                  <div class="eng-stat-icon"><i class="fa-solid fa-screwdriver-wrench"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Diploma</div>
                    <div class="fw-bold text-dark fs-6">5 Branches</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="eng-stat-chip">
                  <div class="eng-stat-icon"><i class="fa-solid fa-flask"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">State-of-Art</div>
                    <div class="fw-bold text-dark fs-6">Labs &amp; Infra</div>
                  </div>
                </div>
              </div>
            </div>



            <!-- ===== SCHOOL OF ENGINEERING ===== -->
            <div class="eng-institute-block">
              <div class="eng-institute-icon">
                <i class="fa-solid fa-school"></i>
              </div>
              <div>
                <div class="eng-institute-block-title">Institute Name</div>
                <div class="eng-institute-block-name">School of Engineering</div>
              </div>
            </div>

            <!-- Bachelor of Engineering Label + Table -->
            <div class="eng-course-label">
              <div class="eng-course-label-pill">
                <i class="fa-solid fa-layer-group"></i>
                Bachelor of Engineering (B.E.)
              </div>
              <div class="eng-course-label-duration">4 Years</div>
            </div>
            <div class="eng-table-wrapper mb-4">
              <table class="eng-course-table">
                <thead>
                  <tr>
                    <th style="width:50%;">Course Name</th>
                    <th style="width:35%;">Branch / Specialization</th>
                    <th style="width:15%;">Duration</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Bachelor of Engineering</td>
                    <td>Aeronautical Engineering</td>
                    <td><span class="eng-badge-duration">4 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td>Bachelor of Engineering</td>
                    <td>Chemical Engineering</td>
                    <td><span class="eng-badge-duration">4 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td>Bachelor of Engineering</td>
                    <td>Civil Engineering</td>
                    <td><span class="eng-badge-duration">4 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td>Bachelor of Engineering</td>
                    <td>Computer Science and Engineering</td>
                    <td><span class="eng-badge-duration">4 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td>Bachelor of Engineering</td>
                    <td>Electrical and Electronics Engineering</td>
                    <td><span class="eng-badge-duration">4 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td>Bachelor of Engineering</td>
                    <td>Electrical Engineering</td>
                    <td><span class="eng-badge-duration">4 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td>Bachelor of Engineering</td>
                    <td>Electronic &amp; Communication Engineering</td>
                    <td><span class="eng-badge-duration">4 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td>Bachelor of Engineering</td>
                    <td>Electronics &amp; Instrumentation Engineering</td>
                    <td><span class="eng-badge-duration">4 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td>Bachelor of Engineering</td>
                    <td>Information Technology</td>
                    <td><span class="eng-badge-duration">4 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td>Bachelor of Engineering</td>
                    <td>Mechanical Engineering</td>
                    <td><span class="eng-badge-duration">4 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td>Bachelor of Engineering</td>
                    <td>Mining Engineering</td>
                    <td><span class="eng-badge-duration">4 Yrs.</span></td>
                  </tr>
                </tbody>
              </table>
            </div>

            <!-- Master of Technology Label + Table -->
            <div class="eng-course-label">
              <div class="eng-course-label-pill">
                <i class="fa-solid fa-layer-group"></i>
                Master of Technology (M.Tech.)
              </div>
              <div class="eng-course-label-duration">2 Years</div>
            </div>
            <div class="eng-table-wrapper mb-4">
              <table class="eng-course-table">
                <thead>
                  <tr>
                    <th style="width:50%;">Course Name</th>
                    <th style="width:35%;">Branch / Specialization</th>
                    <th style="width:15%;">Duration</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Master of Technology</td>
                    <td>Computer Science and Engineering</td>
                    <td><span class="eng-badge-duration">2 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td>Master of Technology</td>
                    <td>Computer Technology &amp; Applications</td>
                    <td><span class="eng-badge-duration">2 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td>Master of Technology</td>
                    <td>Digital Communication</td>
                    <td><span class="eng-badge-duration">2 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td>Master of Technology</td>
                    <td>Electrical Power System</td>
                    <td><span class="eng-badge-duration">2 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td>Master of Technology</td>
                    <td>Industrial Design</td>
                    <td><span class="eng-badge-duration">2 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td>Master of Technology</td>
                    <td>Information Technology</td>
                    <td><span class="eng-badge-duration">2 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td>Master of Technology</td>
                    <td>Power Electronics</td>
                    <td><span class="eng-badge-duration">2 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td>Master of Technology</td>
                    <td>Software Engineering</td>
                    <td><span class="eng-badge-duration">2 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td>Master of Technology</td>
                    <td>Structural Design</td>
                    <td><span class="eng-badge-duration">2 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td>Master of Technology</td>
                    <td>Thermal Engineering</td>
                    <td><span class="eng-badge-duration">2 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td>Master of Technology</td>
                    <td>VLSI</td>
                    <td><span class="eng-badge-duration">2 Yrs.</span></td>
                  </tr>
                </tbody>
              </table>
            </div>

            <!-- ===== POLYTECHNIC ENGINEERING ===== -->
            <div class="eng-institute-block">
              <div class="eng-institute-icon">
                <i class="fa-solid fa-school-flag"></i>
              </div>
              <div>
                <div class="eng-institute-block-title">Institute Name</div>
                <div class="eng-institute-block-name">Polytechnic Engineering</div>
              </div>
            </div>

            <!-- Diploma Engineering Label + Table -->
            <div class="eng-course-label">
              <div class="eng-course-label-pill">
                <i class="fa-solid fa-layer-group"></i>
                Diploma Engineering
              </div>
              <div class="eng-course-label-duration">3 Years</div>
            </div>
            <div class="eng-table-wrapper mb-2">
              <table class="eng-course-table">
                <thead>
                  <tr>
                    <th style="width:50%;">Institute Name</th>
                    <th style="width:35%;">Branch / Specialization</th>
                    <th style="width:15%;">Duration</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Diploma Engineering</td>
                    <td>Computer Science &amp; Engineering</td>
                    <td><span class="eng-badge-duration">3 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td>Diploma Engineering</td>
                    <td>Electrical Engineering</td>
                    <td><span class="eng-badge-duration">3 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td>Diploma Engineering</td>
                    <td>Civil Engineering</td>
                    <td><span class="eng-badge-duration">3 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td>Diploma Engineering</td>
                    <td>Mechanical Engineering</td>
                    <td><span class="eng-badge-duration">3 Yrs.</span></td>
                  </tr>
                  <tr>
                    <td>Diploma Engineering</td>
                    <td>Chemical Engineering</td>
                    <td><span class="eng-badge-duration">3 Yrs.</span></td>
                  </tr>
                </tbody>
              </table>
            </div>

          </div>
        </div><!-- end eng-main-card -->

      </div><!-- end col-lg-8 -->

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
