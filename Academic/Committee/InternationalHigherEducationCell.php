<?php
$page_title = 'International Higher Education Cell - SSSUTMS';
$banner_title = 'International Higher Education Cell';
$banner_category = 'Academic';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
.ihec-section { background-color: #f8fafc; }
.ihec-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15,23,42,0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}
.ihec-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2rem;
  position: relative;
}
.ihec-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.ihec-stat-chip {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 14px 12px;
  display: flex; align-items: center; gap: 10px;
  height: 100%;
  transition: all 0.2s ease;
  overflow: hidden;
}
.ihec-stat-chip:hover {
  border-color: #cbd5e1;
  box-shadow: 0 4px 14px rgba(0,0,0,0.04);
}
.ihec-stat-icon {
  width: 44px; height: 44px;
  border-radius: 10px;
  background: rgba(245,158,11,0.1);
  color: #d97706;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.25rem; flex-shrink: 0;
}
.ihec-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 1.5rem;
  box-shadow: 0 4px 16px rgba(0,0,0,0.02);
  margin-bottom: 1.5rem;
}
.ihec-card-header {
  display: flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 1rem;
  padding-bottom: 0.75rem;
  border-bottom: 2px solid #f1f5f9;
}
.ihec-card-header i {
  color: #f59e0b;
  font-size: 1.25rem;
}
.ihec-table-wrapper {
  border-radius: 12px;
  overflow: hidden;
  border: 1px solid #e2e8f0;
  box-shadow: 0 4px 16px rgba(0,0,0,0.03);
  margin-bottom: 1.5rem;
}
.ihec-table {
  width: 100%;
  border-collapse: collapse;
  font-size: 0.92rem;
  margin-bottom: 0;
}
.ihec-table thead th {
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
.ihec-table tbody tr:nth-child(even) { background: #f0f4f9; }
.ihec-table tbody tr:nth-child(odd)  { background: #ffffff; }
.ihec-table tbody tr:hover {
  background: #e8f0fb;
  transition: background 0.15s ease;
}
.ihec-table tbody td {
  padding: 10px 14px;
  border-bottom: 1px solid #e2e8f0;
  color: #334155;
  vertical-align: middle;
}
.ihec-table tbody td:first-child {
  font-weight: 700;
  color: #0b2545;
  text-align: center;
}
</style>

<section class="subpage-main-section ihec-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="ihec-main-card">

          <!-- Banner Header -->
          <div class="ihec-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-globe me-1"></i> Statutory Committees
              </span>
              <h3 class="fw-bold text-white mb-0 fs-3">CENTRALIZED INTERNATIONAL HIGHER EDUCATION CELL</h3>
            </div>
          </div>

          <!-- Body -->
          <div class="p-4">

            <!-- Stat Chips -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-sm-6 col-md-3">
                <div class="ihec-stat-chip">
                  <div class="ihec-stat-icon"><i class="fa-solid fa-earth-americas"></i></div>
                  <div style="min-width: 0; flex: 1;">
                    <div class="text-muted extra-small uppercase fw-bold">Cell</div>
                    <div class="fw-bold text-dark fs-6">Global Academics</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="ihec-stat-chip">
                  <div class="ihec-stat-icon"><i class="fa-solid fa-user-tie"></i></div>
                  <div style="min-width: 0; flex: 1;">
                    <div class="text-muted extra-small uppercase fw-bold">Chairperson</div>
                    <div class="fw-bold text-dark fs-6">Dr. R.S. Kushwaha</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="ihec-stat-chip">
                  <div class="ihec-stat-icon"><i class="fa-solid fa-building-columns"></i></div>
                  <div style="min-width: 0; flex: 1;">
                    <div class="text-muted extra-small uppercase fw-bold">Scope</div>
                    <div class="fw-bold text-dark fs-6">International Cell</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="ihec-stat-chip">
                  <div class="ihec-stat-icon"><i class="fa-solid fa-users"></i></div>
                  <div style="min-width: 0; flex: 1;">
                    <div class="text-muted extra-small uppercase fw-bold">Committee</div>
                    <div class="fw-bold text-dark fs-6">7 Members</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Overview Card -->
            <div class="ihec-card">
              <div class="ihec-card-header">
                <i class="fa-solid fa-circle-info"></i>
                <h5 class="fw-bold text-dark mb-0">About International Higher Education Cell</h5>
              </div>
              <p class="text-secondary lh-base mb-0" style="font-size: 0.95rem;">
                The Centralized International Higher Education Cell at Sri Satya Sai University of Technology &amp; Medical Sciences oversees global academic partnerships, international student exchanges, foreign university collaborations, and higher education initiatives to foster global academic excellence.
              </p>
            </div>

            <!-- Table: MEMBERS OF CENTRALIZED INTERNATIONAL HIGHER EDUCATION -->
            <div class="ihec-card mb-0">
              <div class="ihec-card-header">
                <i class="fa-solid fa-users-gear"></i>
                <h5 class="fw-bold text-dark mb-0">Members of Centralized International Higher Education</h5>
              </div>
              <div class="ihec-table-wrapper">
                <table class="ihec-table">
                  <thead>
                    <tr>
                      <th style="width:12%;">S.No.</th>
                      <th style="width:53%;">Name</th>
                      <th style="width:35%;">Post</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Dr. Rajendra Singh Kushwaha</td>
                      <td><strong>Chairperson</strong></td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Dr. Dheeraj Shinde</td>
                      <td>Member</td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Dr. Hemant Sharma</td>
                      <td>Member</td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>Dr. Syed Shahab Ahmed</td>
                      <td>Member</td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td>Dr. Rajesh Sharma</td>
                      <td>Member</td>
                    </tr>
                    <tr>
                      <td>6</td>
                      <td>Dr. Sujata Kushwaha</td>
                      <td>Member</td>
                    </tr>
                    <tr>
                      <td>7</td>
                      <td>Mrs. Priyanka Jhawar</td>
                      <td>Member</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

          </div>
        </div><!-- end ihec-main-card -->
      </div><!-- end col-lg-8 -->

      <!-- Sticky Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>