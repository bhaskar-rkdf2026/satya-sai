<?php
$page_title = 'Incubation Cell - SSSUTMS';
$banner_title = 'Incubation Cell';
$banner_category = 'Academic';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
.incub-section { background-color: #f8fafc; }
.incub-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15,23,42,0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}
.incub-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2rem;
  position: relative;
}
.incub-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.incub-stat-chip {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 14px 12px;
  display: flex; align-items: center; gap: 10px;
  height: 100%;
  transition: all 0.2s ease;
  overflow: hidden;
}
.incub-stat-chip:hover {
  border-color: #cbd5e1;
  box-shadow: 0 4px 14px rgba(0,0,0,0.04);
}
.incub-stat-icon {
  width: 44px; height: 44px;
  border-radius: 10px;
  background: rgba(245,158,11,0.1);
  color: #d97706;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.25rem; flex-shrink: 0;
}
.incub-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 1.5rem;
  box-shadow: 0 4px 16px rgba(0,0,0,0.02);
  margin-bottom: 1.5rem;
}
.incub-card-header {
  display: flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 1rem;
  padding-bottom: 0.75rem;
  border-bottom: 2px solid #f1f5f9;
}
.incub-card-header i {
  color: #f59e0b;
  font-size: 1.25rem;
}
.incub-obj-list {
  list-style: none;
  padding: 0;
  margin: 0;
}
.incub-obj-item {
  display: flex;
  align-items: flex-start;
  gap: 14px;
  padding: 12px 16px;
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 10px;
  margin-bottom: 10px;
}
.incub-obj-num {
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
.incub-obj-text {
  color: #334155;
  font-size: 0.95rem;
  line-height: 1.5;
}
.incub-table-wrapper {
  border-radius: 12px;
  overflow: hidden;
  border: 1px solid #e2e8f0;
  box-shadow: 0 4px 16px rgba(0,0,0,0.03);
  margin-bottom: 1.5rem;
}
.incub-table {
  width: 100%;
  border-collapse: collapse;
  font-size: 0.92rem;
  margin-bottom: 0;
}
.incub-table thead th {
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
.incub-table tbody tr:nth-child(even) { background: #f0f4f9; }
.incub-table tbody tr:nth-child(odd)  { background: #ffffff; }
.incub-table tbody tr:hover {
  background: #e8f0fb;
  transition: background 0.15s ease;
}
.incub-table tbody td {
  padding: 10px 14px;
  border-bottom: 1px solid #e2e8f0;
  color: #334155;
  vertical-align: middle;
}
.incub-table tbody td:first-child {
  font-weight: 700;
  color: #0b2545;
  text-align: center;
}
</style>

<section class="subpage-main-section incub-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="incub-main-card">

          <!-- Banner Header -->
          <div class="incub-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-seedling me-1"></i> Statutory Committees
              </span>
              <h3 class="fw-bold text-white mb-0 fs-3">INCUBATION CELL</h3>
            </div>
          </div>

          <!-- Body -->
          <div class="p-4">

            <!-- Stat Chips -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-sm-6 col-md-3">
                <div class="incub-stat-chip">
                  <div class="incub-stat-icon"><i class="fa-solid fa-flask"></i></div>
                  <div style="min-width: 0; flex: 1;">
                    <div class="text-muted extra-small uppercase fw-bold">Cell</div>
                    <div class="fw-bold text-dark fs-6">Innovation Center</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="incub-stat-chip">
                  <div class="incub-stat-icon"><i class="fa-solid fa-user-tie"></i></div>
                  <div style="min-width: 0; flex: 1;">
                    <div class="text-muted extra-small uppercase fw-bold">Chairperson</div>
                    <div class="fw-bold text-dark fs-6">Dr. Mukesh Tiwari</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="incub-stat-chip">
                  <div class="incub-stat-icon"><i class="fa-solid fa-lightbulb"></i></div>
                  <div style="min-width: 0; flex: 1;">
                    <div class="text-muted extra-small uppercase fw-bold">Focus</div>
                    <div class="fw-bold text-dark fs-6">Product &amp; R&amp;D</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="incub-stat-chip">
                  <div class="incub-stat-icon"><i class="fa-solid fa-users"></i></div>
                  <div style="min-width: 0; flex: 1;">
                    <div class="text-muted extra-small uppercase fw-bold">Committee</div>
                    <div class="fw-bold text-dark fs-6">7 Members</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Objectives Card -->
            <div class="incub-card">
              <div class="incub-card-header">
                <i class="fa-solid fa-bullseye"></i>
                <h5 class="fw-bold text-dark mb-0">Objectives of the Cell</h5>
              </div>
              <ul class="incub-obj-list">
                <li class="incub-obj-item">
                  <span class="incub-obj-num">1</span>
                  <span class="incub-obj-text">To have a center for the development of products and innovations which will be working efficiently even after Institute timings.</span>
                </li>
                <li class="incub-obj-item">
                  <span class="incub-obj-num">2</span>
                  <span class="incub-obj-text">To encourage the students to target National and International Competitions and win such events.</span>
                </li>
                <li class="incub-obj-item">
                  <span class="incub-obj-num">3</span>
                  <span class="incub-obj-text">To have seminars from renowned personalities frequently without disturbing the institute infrastructure and curricular activities.</span>
                </li>
                <li class="incub-obj-item">
                  <span class="incub-obj-num">4</span>
                  <span class="incub-obj-text">To develop solutions for industrial problems so that the Institute Industry interaction strengthens which would create more Placement Opportunities.</span>
                </li>
                <li class="incub-obj-item">
                  <span class="incub-obj-num">5</span>
                  <span class="incub-obj-text">To attract and encourage more and more student exchange programmes through MoUs with reputed Universities.</span>
                </li>
              </ul>
            </div>

            <!-- Table: COMMITTEE MEMBERS OF THE CELL -->
            <div class="incub-card mb-0">
              <div class="incub-card-header">
                <i class="fa-solid fa-users-gear"></i>
                <h5 class="fw-bold text-dark mb-0">Committee Members of the Cell</h5>
              </div>
              <div class="incub-table-wrapper">
                <table class="incub-table">
                  <thead>
                    <tr>
                      <th style="width:12%;">S.No.</th>
                      <th style="width:53%;">Name</th>
                      <th style="width:35%;">Designation</th>
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
                      <td>Dr. Rajendra Singh Kushwah</td>
                      <td>Member</td>
                    </tr>
                    <tr>
                      <td>6</td>
                      <td>Dr. Kanchan Shrivastav</td>
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
        </div><!-- end incub-main-card -->
      </div><!-- end col-lg-8 -->

      <!-- Sticky Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>