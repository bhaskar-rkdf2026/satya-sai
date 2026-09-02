<?php
$page_title = 'Faculty Development Program (FDP) - SSSUTMS';
$banner_title = 'Faculty Development Program (FDP)';
$banner_category = 'Academic';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
.fdp-section { background-color: #f8fafc; }
.fdp-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15,23,42,0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}
.fdp-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2.2rem 2rem;
  position: relative;
}
.fdp-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.fdp-stat-chip {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 16px 14px;
  display: flex; align-items: center; gap: 12px;
  height: 100%;
  transition: all 0.25s ease;
  overflow: hidden;
}
.fdp-stat-chip:hover {
  border-color: #cbd5e1;
  box-shadow: 0 4px 16px rgba(11,37,69,0.06);
  transform: translateY(-2px);
}
.fdp-stat-icon {
  width: 48px; height: 48px;
  border-radius: 12px;
  background: rgba(245,158,11,0.12);
  color: #d97706;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.35rem; flex-shrink: 0;
}
.fdp-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 16px;
  padding: 1.5rem;
  box-shadow: 0 4px 16px rgba(0,0,0,0.02);
  margin-bottom: 1.75rem;
}
.fdp-card-header {
  display: flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 1.2rem;
  padding-bottom: 0.85rem;
  border-bottom: 2px solid #f1f5f9;
}
.fdp-card-header i {
  color: #f59e0b;
  font-size: 1.3rem;
}
.fdp-table-wrapper {
  border-radius: 12px;
  overflow: hidden;
  border: 1px solid #e2e8f0;
  box-shadow: 0 4px 16px rgba(0,0,0,0.03);
  margin-bottom: 1rem;
}
.fdp-table {
  width: 100%;
  border-collapse: collapse;
  font-size: 0.93rem;
  margin-bottom: 0;
}
.fdp-table thead th {
  background: #1e3a5f;
  color: #ffffff;
  font-weight: 600;
  padding: 14px 16px;
  border: none;
  text-align: left;
  font-size: 0.9rem;
  letter-spacing: 0.03em;
  text-transform: uppercase;
}
.fdp-table tbody tr:nth-child(even) { background: #f8fafc; }
.fdp-table tbody tr:nth-child(odd)  { background: #ffffff; }
.fdp-table tbody tr:hover {
  background: #f1f5f9;
  transition: background 0.15s ease;
}
.fdp-table tbody td {
  padding: 14px 16px;
  border-bottom: 1px solid #e2e8f0;
  color: #334155;
  vertical-align: middle;
  line-height: 1.5;
}
.fdp-table tbody td:first-child {
  font-weight: 700;
  color: #0b2545;
  white-space: nowrap;
}
.badge-sponsor {
  background: linear-gradient(135deg, #0b2545 0%, #1e4d8c 100%);
  color: #ffffff;
  font-size: 0.8rem;
  font-weight: 700;
  padding: 6px 12px;
  border-radius: 6px;
  display: inline-block;
}
.section-title-underline {
  color: #f59e0b;
  font-weight: 800;
  text-decoration: underline;
  text-underline-offset: 6px;
  text-decoration-thickness: 3px;
}
</style>

<section class="subpage-main-section fdp-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="fdp-main-card">

          <!-- Banner Header -->
          <div class="fdp-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-chalkboard-user me-1"></i> Academic Activities
              </span>
              <h3 class="fw-bold text-white mb-1 fs-3">FACULTY DEVELOPMENT PROGRAM (FDP)</h3>
            </div>
          </div>

          <!-- Body Content -->
          <div class="p-4">

            <!-- Stat Chips -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-sm-6 col-md-3">
                <div class="fdp-stat-chip">
                  <div class="fdp-stat-icon"><i class="fa-solid fa-award"></i></div>
                  <div style="min-width: 0; flex: 1;">
                    <div class="text-muted extra-small uppercase fw-bold">Sponsor</div>
                    <div class="fw-bold text-dark fs-6">AICTE - ISTE</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="fdp-stat-chip">
                  <div class="fdp-stat-icon"><i class="fa-solid fa-layer-group"></i></div>
                  <div style="min-width: 0; flex: 1;">
                    <div class="text-muted extra-small uppercase fw-bold">Program Type</div>
                    <div class="fw-bold text-dark fs-6">Induction / Refresher</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="fdp-stat-chip">
                  <div class="fdp-stat-icon"><i class="fa-solid fa-building-columns"></i></div>
                  <div style="min-width: 0; flex: 1;">
                    <div class="text-muted extra-small uppercase fw-bold">Departments</div>
                    <div class="fw-bold text-dark fs-6">ECE, CSE, Mech</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="fdp-stat-chip">
                  <div class="fdp-stat-icon"><i class="fa-solid fa-calendar-days"></i></div>
                  <div style="min-width: 0; flex: 1;">
                    <div class="text-muted extra-small uppercase fw-bold">Phases</div>
                    <div class="fw-bold text-dark fs-6">Phase I, II &amp; III</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Page Main Content Card -->
            <div class="fdp-card mb-0">
              <div class="text-center my-3">
                <h4 class="section-title-underline fs-4 mb-2">FACULTY DEVELOPMENT PROGRAM (FDP)</h4>
                <h6 class="fw-bold text-dark text-uppercase letter-spacing-1 mb-0" style="letter-spacing: 1px;">INDUCTION/ REFRESHER PROGRAMME</h6>
              </div>
              
              <div class="fdp-table-wrapper mt-4">
                <table class="fdp-table">
                  <thead>
                    <tr>
                      <th style="width:22%;">Date</th>
                      <th style="width:28%;">Department</th>
                      <th style="width:18%;">Sponsored</th>
                      <th style="width:32%;">Topic</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>9 March- 15 March 2021</td>
                      <td><strong>Electronics &amp; Communication Engineering</strong></td>
                      <td><span class="badge-sponsor">AICTE- ISTE</span></td>
                      <td>The Impact of Faculty Development on Teaching Skills and Research Scholars for Technical Perspectives (Phase I)</td>
                    </tr>
                    <tr>
                      <td>23 March - 31 March 2021</td>
                      <td><strong>Computer Sciences &amp; Engineering</strong></td>
                      <td><span class="badge-sponsor">AICTE- ISTE</span></td>
                      <td>The Impact of Faculty Development on Teaching Skills and Research Scholars for Technical Perspectives (Phase II)</td>
                    </tr>
                    <tr>
                      <td>20 April - 26 April 2021</td>
                      <td><strong>Mechanical Engineering</strong></td>
                      <td><span class="badge-sponsor">AICTE- ISTE</span></td>
                      <td>The Impact of Faculty Development on Teaching Skills and Research Scholars for Technical Perspectives (Phase III)</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

          </div>
        </div><!-- end fdp-main-card -->
      </div><!-- end col-lg-8 -->

      <!-- Sticky Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
