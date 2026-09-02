<?php
$page_title = 'Industrial Visits - SSSUTMS';
$banner_title = 'Industrial Visits';
$banner_category = 'Academic';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
.ind-section { background-color: #f8fafc; }
.ind-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15,23,42,0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}
.ind-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2rem;
  position: relative;
}
.ind-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.ind-stat-chip {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 14px 12px;
  display: flex; align-items: center; gap: 10px;
  height: 100%;
  transition: all 0.2s ease;
  overflow: hidden;
}
.ind-stat-chip:hover {
  border-color: #cbd5e1;
  box-shadow: 0 4px 14px rgba(0,0,0,0.04);
}
.ind-stat-icon {
  width: 44px; height: 44px;
  border-radius: 10px;
  background: rgba(245,158,11,0.1);
  color: #d97706;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.25rem; flex-shrink: 0;
}
.ind-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 1.5rem;
  box-shadow: 0 4px 16px rgba(0,0,0,0.02);
  margin-bottom: 1.5rem;
}
.ind-card-header {
  display: flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 1rem;
  padding-bottom: 0.75rem;
  border-bottom: 2px solid #f1f5f9;
}
.ind-card-header i {
  color: #f59e0b;
  font-size: 1.25rem;
}
.ind-badge-btn {
  background: linear-gradient(135deg, #0b2545 0%, #1e4d8c 100%) !important;
  color: #ffffff !important;
  font-size: 0.82rem;
  font-weight: 700;
  padding: 7px 12px;
  border-radius: 8px;
  border: 1px solid rgba(245,158,11,0.35);
  text-decoration: none !important;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 7px;
  white-space: nowrap;
  width: 150px;
  flex-shrink: 0;
  box-shadow: 0 2px 6px rgba(11,37,69,0.15);
  transition: all 0.2s ease;
}
.ind-badge-btn i {
  color: #fbbf24 !important;
  transition: color 0.2s ease;
}
.ind-badge-btn:hover {
  background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%) !important;
  color: #ffffff !important;
  border-color: #d97706;
  box-shadow: 0 4px 12px rgba(217,119,6,0.35);
  transform: translateY(-1px);
}
.ind-badge-btn:hover i {
  color: #ffffff !important;
}
.ind-table-wrapper {
  border-radius: 12px;
  overflow: hidden;
  border: 1px solid #e2e8f0;
  box-shadow: 0 4px 16px rgba(0,0,0,0.03);
  margin-bottom: 1rem;
}
.ind-table {
  width: 100%;
  border-collapse: collapse;
  font-size: 0.92rem;
  margin-bottom: 0;
}
.ind-table thead th {
  background: #1e3a5f;
  color: #ffffff;
  font-weight: 600;
  padding: 12px 14px;
  border: none;
  text-align: left;
  font-size: 0.88rem;
  letter-spacing: 0.03em;
  text-transform: uppercase;
}
.ind-table tbody tr:nth-child(even) { background: #f0f4f9; }
.ind-table tbody tr:nth-child(odd)  { background: #ffffff; }
.ind-table tbody tr:hover {
  background: #e8f0fb;
  transition: background 0.15s ease;
}
.ind-table tbody td {
  padding: 12px 14px;
  border-bottom: 1px solid #e2e8f0;
  color: #334155;
  vertical-align: middle;
}
.ind-table tbody td:first-child {
  font-weight: 700;
  color: #0b2545;
}
</style>

<section class="subpage-main-section ind-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="ind-main-card">

          <!-- Banner Header -->
          <div class="ind-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-industry me-1"></i> Academic Activities
              </span>
              <h3 class="fw-bold text-white mb-0 fs-3">INDUSTRIAL TRAINING &amp; VISITS</h3>
            </div>
          </div>

          <!-- Body -->
          <div class="p-4">

            <!-- Stat Chips -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-sm-6 col-md-3">
                <div class="ind-stat-chip">
                  <div class="ind-stat-icon"><i class="fa-solid fa-industry"></i></div>
                  <div style="min-width: 0; flex: 1;">
                    <div class="text-muted extra-small uppercase fw-bold">Activities</div>
                    <div class="fw-bold text-dark fs-6">Industrial Visits</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="ind-stat-chip">
                  <div class="ind-stat-icon"><i class="fa-solid fa-briefcase"></i></div>
                  <div style="min-width: 0; flex: 1;">
                    <div class="text-muted extra-small uppercase fw-bold">Training</div>
                    <div class="fw-bold text-dark fs-6">Practical Exposure</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="ind-stat-chip">
                  <div class="ind-stat-icon"><i class="fa-solid fa-calendar-check"></i></div>
                  <div style="min-width: 0; flex: 1;">
                    <div class="text-muted extra-small uppercase fw-bold">Timeline</div>
                    <div class="fw-bold text-dark fs-6">2018 &ndash; Present</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="ind-stat-chip">
                  <div class="ind-stat-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                  <div style="min-width: 0; flex: 1;">
                    <div class="text-muted extra-small uppercase fw-bold">Faculties</div>
                    <div class="fw-bold text-dark fs-6">Engg, Pharma, Mgmt</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Industrial Training / Visit Card -->
            <div class="ind-card">
              <div class="ind-card-header">
                <i class="fa-solid fa-building-user"></i>
                <h5 class="fw-bold text-dark mb-0">Industrial Training &amp; Visits</h5>
              </div>
              <div class="ind-table-wrapper">
                <table class="ind-table">
                  <thead>
                    <tr>
                      <th style="width:18%;">Date</th>
                      <th style="width:30%;">Department</th>
                      <th style="width:32%;">Topic / Industrial Unit</th>
                      <th style="width:20%; text-align:center;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><strong>29/11/2019</strong></td>
                      <td>Dept. of Civil Engineering, SOE</td>
                      <td>SUPER MAX RMC, NIC CONSTRUCTION (INDIA) PVT. LTD. BHOPAL</td>
                      <td style="text-align:center;">
                        <a href="#" class="ind-badge-btn">
                          <i class="fa-solid fa-circle-info"></i> More Info
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>26/11/2019</strong></td>
                      <td>Dept. of Mechanical Engineering, SOE</td>
                      <td>CRISP BHOPAL, M.P.</td>
                      <td style="text-align:center;">
                        <a href="#" class="ind-badge-btn">
                          <i class="fa-solid fa-circle-info"></i> More Info
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>25/11/2019</strong></td>
                      <td>Dept. of Mechanical Engineering, SOE</td>
                      <td>Cattle Feed Factory Pachama Sehore, M.P.</td>
                      <td style="text-align:center;">
                        <a href="#" class="ind-badge-btn">
                          <i class="fa-solid fa-circle-info"></i> More Info
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>25/06/2018 &ndash; 30/06/2018</strong></td>
                      <td>Dept. of Mechanical Engineering, SOE</td>
                      <td>Solar and Other Renewable Energy Sources</td>
                      <td style="text-align:center;">
                        <a href="#" class="ind-badge-btn">
                          <i class="fa-solid fa-circle-info"></i> More Info
                        </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <!-- Internship / Project Work Card -->
            <div class="ind-card mb-0">
              <div class="ind-card-header">
                <i class="fa-solid fa-user-gear"></i>
                <h5 class="fw-bold text-dark mb-0">Internship &amp; Project Work</h5>
              </div>
              <div class="ind-table-wrapper">
                <table class="ind-table">
                  <thead>
                    <tr>
                      <th style="width:13%;">Year</th>
                      <th style="width:35%;">Department</th>
                      <th style="width:32%;">Details / List</th>
                      <th style="width:20%; text-align:center;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><strong>2019</strong></td>
                      <td>Polytechnic Pharmacy</td>
                      <td>Industrial Internship &amp; Project List</td>
                      <td style="text-align:center;">
                        <a href="#" class="ind-badge-btn">
                          <i class="fa-solid fa-circle-info"></i> More Info
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>2019</strong></td>
                      <td>Pharmacy</td>
                      <td>Industrial Internship &amp; Project List</td>
                      <td style="text-align:center;">
                        <a href="#" class="ind-badge-btn">
                          <i class="fa-solid fa-circle-info"></i> More Info
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>2019</strong></td>
                      <td>MBA</td>
                      <td>Industrial Internship &amp; Project List</td>
                      <td style="text-align:center;">
                        <a href="#" class="ind-badge-btn">
                          <i class="fa-solid fa-circle-info"></i> More Info
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>2019</strong></td>
                      <td>MCA</td>
                      <td>Industrial Internship &amp; Project List</td>
                      <td style="text-align:center;">
                        <a href="#" class="ind-badge-btn">
                          <i class="fa-solid fa-circle-info"></i> More Info
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>2019</strong></td>
                      <td>BHMS</td>
                      <td>Clinical Internship &amp; Project List</td>
                      <td style="text-align:center;">
                        <a href="#" class="ind-badge-btn">
                          <i class="fa-solid fa-circle-info"></i> More Info
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>2018</strong></td>
                      <td>BHMS</td>
                      <td>Clinical Internship &amp; Project List</td>
                      <td style="text-align:center;">
                        <a href="#" class="ind-badge-btn">
                          <i class="fa-solid fa-circle-info"></i> More Info
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>2019</strong></td>
                      <td>Polytechnic Engineering</td>
                      <td>Industrial Internship &amp; Project List</td>
                      <td style="text-align:center;">
                        <a href="#" class="ind-badge-btn">
                          <i class="fa-solid fa-circle-info"></i> More Info
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>2018</strong></td>
                      <td>Polytechnic Engineering</td>
                      <td>Industrial Internship &amp; Project List</td>
                      <td style="text-align:center;">
                        <a href="#" class="ind-badge-btn">
                          <i class="fa-solid fa-circle-info"></i> More Info
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>2019</strong></td>
                      <td>Electrical Engineering</td>
                      <td>Industrial Internship &amp; Project List</td>
                      <td style="text-align:center;">
                        <a href="#" class="ind-badge-btn">
                          <i class="fa-solid fa-circle-info"></i> More Info
                        </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

          </div>
        </div><!-- end ind-main-card -->
      </div><!-- end col-lg-8 -->

      <!-- Sticky Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>