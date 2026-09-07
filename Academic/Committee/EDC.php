<?php
$page_title = 'Entrepreneurship Development Cell - SSSUTMS';
$banner_title = 'EDC';
$banner_category = 'Academic';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
.edc-section { background-color: #f8fafc; }
.edc-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15,23,42,0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}
.edc-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2rem;
  position: relative;
}
.edc-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.edc-stat-chip {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 14px 12px;
  display: flex; align-items: center; gap: 10px;
  height: 100%;
  transition: all 0.2s ease;
  overflow: hidden;
}
.edc-stat-chip:hover {
  border-color: #cbd5e1;
  box-shadow: 0 4px 14px rgba(0,0,0,0.04);
}
.edc-stat-icon {
  width: 44px; height: 44px;
  border-radius: 10px;
  background: rgba(245,158,11,0.1);
  color: #d97706;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.25rem; flex-shrink: 0;
}
.edc-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 1.5rem;
  box-shadow: 0 4px 16px rgba(0,0,0,0.02);
  margin-bottom: 1.5rem;
}
.edc-card-header {
  display: flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 1rem;
  padding-bottom: 0.75rem;
  border-bottom: 2px solid #f1f5f9;
}
.edc-card-header i {
  color: #f59e0b;
  font-size: 1.25rem;
}
.edc-obj-list {
  list-style: none;
  padding: 0;
  margin: 0;
}
.edc-obj-item {
  display: flex;
  align-items: flex-start;
  gap: 14px;
  padding: 12px 16px;
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 10px;
  margin-bottom: 10px;
}
.edc-obj-num {
  width: 28px; height: 28px;
  border-radius: 50%;
  background: #0b2545;
  color: #fbbf24;
  font-weight: 700;
  font-size: 0.85rem;
  display: flex; align-items: center; justify-content: center;
  flex-shrink: 0;
  margin-top: 2px;
}
.edc-obj-text {
  color: #334155;
  font-size: 0.95rem;
  line-height: 1.5;
}
.edc-table-wrapper {
  border-radius: 12px;
  overflow: hidden;
  border: 1px solid #e2e8f0;
  box-shadow: 0 4px 16px rgba(0,0,0,0.03);
  margin-bottom: 1.5rem;
}
.edc-table {
  width: 100%;
  border-collapse: collapse;
  font-size: 0.92rem;
  margin-bottom: 0;
}
.edc-table thead th {
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
.edc-table tbody tr:nth-child(even) { background: #f0f4f9; }
.edc-table tbody tr:nth-child(odd)  { background: #ffffff; }
.edc-table tbody tr:hover {
  background: #e8f0fb;
  transition: background 0.15s ease;
}
.edc-table tbody td {
  padding: 10px 14px;
  border-bottom: 1px solid #e2e8f0;
  color: #334155;
  vertical-align: middle;
}
.edc-table tbody td:first-child {
  font-weight: 700;
  color: #0b2545;
  text-align: center;
}
</style>

<section class="subpage-main-section edc-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="edc-main-card">

          <!-- Banner Header -->
          <div class="edc-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-lightbulb me-1"></i> Statutory Committees
              </span>
              <h3 class="fw-bold text-white mb-0 fs-3">ENTREPRENEURSHIP DEVELOPMENT CELL (EDC)</h3>
            </div>
          </div>

          <!-- Body -->
          <div class="p-4">

            <!-- Stat Chips -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-sm-6 col-md-3">
                <div class="edc-stat-chip">
                  <div class="edc-stat-icon"><i class="fa-solid fa-rocket"></i></div>
                  <div style="min-width: 0; flex: 1; overflow: hidden;">
                    <div class="text-muted extra-small uppercase fw-bold">Cell</div>
                    <div class="fw-bold text-dark fs-6">EDC</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="edc-stat-chip">
                  <div class="edc-stat-icon"><i class="fa-solid fa-user-tie"></i></div>
                  <div style="min-width: 0; flex: 1;">
                    <div class="text-muted extra-small uppercase fw-bold">Chairperson</div>
                    <div class="fw-bold text-dark fs-6" style="word-wrap: break-word;">Dr. Mukesh Tiwari</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="edc-stat-chip">
                  <div class="edc-stat-icon"><i class="fa-solid fa-user-check"></i></div>
                  <div style="min-width: 0; flex: 1;">
                    <div class="text-muted extra-small uppercase fw-bold">Member Secretary</div>
                    <div class="fw-bold text-dark fs-6" style="word-wrap: break-word;">Dr. Santosh Rai</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="edc-stat-chip">
                  <div class="edc-stat-icon"><i class="fa-solid fa-users"></i></div>
                  <div style="min-width: 0; flex: 1;">
                    <div class="text-muted extra-small uppercase fw-bold">Committee</div>
                    <div class="fw-bold text-dark fs-6" style="word-wrap: break-word;">7 EDC Members</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Objectives Card -->
            <div class="edc-card">
              <div class="edc-card-header">
                <i class="fa-solid fa-bullseye"></i>
                <h5 class="fw-bold text-dark mb-0">Objectives of EDC</h5>
              </div>
              <p class="text-secondary mb-3" style="font-size: 0.95rem;">
                Entrepreneurship Development Cell (EDC) is established in the Campus. The objectives of EDC are &ndash;
              </p>
              <ul class="edc-obj-list">
                <li class="edc-obj-item">
                  <span class="edc-obj-num">1</span>
                  <span class="edc-obj-text">Developing entrepreneurship among students and Faculty.</span>
                </li>
                <li class="edc-obj-item">
                  <span class="edc-obj-num">2</span>
                  <span class="edc-obj-text">Organizing Training / Development / Awareness in students and Teachers.</span>
                </li>
                <li class="edc-obj-item">
                  <span class="edc-obj-num">3</span>
                  <span class="edc-obj-text">Acting as interface between Institution and Industry as well as financial / Technical Institution.</span>
                </li>
              </ul>
            </div>

            <!-- Table: COMMITTEE MEMBERS OF THE EDC -->
            <div class="edc-card mb-0">
              <div class="edc-card-header">
                <i class="fa-solid fa-users-gear"></i>
                <h5 class="fw-bold text-dark mb-0">Committee Members of the EDC</h5>
              </div>
              <div class="edc-table-wrapper">
                <table class="edc-table">
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
                      <td>Dr. Mukesh Tiwari</td>
                      <td><strong>Chairperson</strong></td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Dr. Minakshi Pathak</td>
                      <td>Member</td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Dr. Neelesh Chaubey</td>
                      <td>Member</td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>Dr. Rajesh Sharma</td>
                      <td>Member</td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td>Dr. Santosh Rai</td>
                      <td><strong>Member Secretary</strong></td>
                    </tr>
                    <tr>
                      <td>6</td>
                      <td>Dr. Kanchan Shrivastava</td>
                      <td>Member</td>
                    </tr>
                    <tr>
                      <td>7</td>
                      <td>Dr. Syed Shahab Ahmed</td>
                      <td>Member</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

          </div>
        </div><!-- end edc-main-card -->
      </div><!-- end col-lg-8 -->

      <!-- Sticky Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>