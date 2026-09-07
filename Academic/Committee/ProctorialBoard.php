<?php
$page_title = 'Proctorial Board - SSSUTMS';
$banner_title = 'Proctorial Board';
$banner_category = 'Academic';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
.proc-board-section { background-color: #f8fafc; }
.proc-board-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15,23,42,0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}
.proc-board-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2rem;
  position: relative;
}
.proc-board-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.proc-board-stat-chip {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 14px 18px;
  display: flex; align-items: center; gap: 14px;
  height: 100%;
  transition: all 0.2s ease;
}
.proc-board-stat-chip:hover {
  border-color: #cbd5e1;
  box-shadow: 0 4px 14px rgba(0,0,0,0.04);
}
.proc-board-stat-icon {
  width: 44px; height: 44px;
  border-radius: 10px;
  background: rgba(245,158,11,0.1);
  color: #d97706;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.25rem; flex-shrink: 0;
}
.proc-board-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 1.5rem;
  box-shadow: 0 4px 16px rgba(0,0,0,0.02);
  margin-bottom: 1.5rem;
}
.proc-board-card-header {
  display: flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 1rem;
  padding-bottom: 0.75rem;
  border-bottom: 2px solid #f1f5f9;
}
.proc-board-card-header i {
  color: #f59e0b;
  font-size: 1.25rem;
}
.proc-board-download-callout {
  background: linear-gradient(135deg, #fffbe0 0%, #fff7ed 100%);
  border: 1px solid #fed7aa;
  border-radius: 12px;
  padding: 1.25rem 1.5rem;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 1rem;
  flex-wrap: wrap;
  margin-top: 1.25rem;
}
.proc-board-badge-btn {
  background: linear-gradient(135deg, #0b2545 0%, #1e4d8c 100%) !important;
  color: #ffffff !important;
  font-size: 0.82rem;
  font-weight: 700;
  padding: 7px 10px;
  border-radius: 8px;
  border: 1px solid rgba(245,158,11,0.35);
  text-decoration: none !important;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 7px;
  white-space: nowrap;
  width: 195px;
  flex-shrink: 0;
  box-shadow: 0 2px 6px rgba(11,37,69,0.15);
  transition: all 0.25s ease;
}
.proc-board-badge-btn i {
  color: #fbbf24 !important;
  transition: color 0.2s ease;
}
.proc-board-badge-btn:hover {
  background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%) !important;
  color: #ffffff !important;
  border-color: #d97706;
  box-shadow: 0 4px 12px rgba(217,119,6,0.35);
  transform: translateY(-1px);
}
.proc-board-badge-btn:hover i {
  color: #ffffff !important;
}
.proc-board-table-wrapper {
  border-radius: 12px;
  overflow: hidden;
  border: 1px solid #e2e8f0;
  box-shadow: 0 4px 16px rgba(0,0,0,0.03);
  margin-bottom: 1.5rem;
}
.proc-board-table {
  width: 100%;
  border-collapse: collapse;
  font-size: 0.92rem;
  margin-bottom: 0;
}
.proc-board-table thead th {
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
.proc-board-table tbody tr:nth-child(even) { background: #f0f4f9; }
.proc-board-table tbody tr:nth-child(odd)  { background: #ffffff; }
.proc-board-table tbody tr:hover {
  background: #e8f0fb;
  transition: background 0.15s ease;
}
.proc-board-table tbody td {
  padding: 10px 14px;
  border-bottom: 1px solid #e2e8f0;
  color: #334155;
  vertical-align: middle;
}
.proc-board-table tbody td:first-child {
  font-weight: 700;
  color: #0b2545;
  text-align: center;
}
</style>

<section class="subpage-main-section proc-board-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="proc-board-main-card">

          <!-- Banner Header -->
          <div class="proc-board-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-user-shield me-1"></i> Statutory Committees
              </span>
              <h3 class="fw-bold text-white mb-0 fs-3">PROCTORIAL BOARD</h3>
            </div>
          </div>

          <!-- Body -->
          <div class="p-4">

            <!-- Stat Chips -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-sm-6 col-md-3">
                <div class="proc-board-stat-chip">
                  <div class="proc-board-stat-icon"><i class="fa-solid fa-scale-balanced"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Objective</div>
                    <div class="fw-bold text-dark fs-6">Campus Discipline</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="proc-board-stat-chip">
                  <div class="proc-board-stat-icon"><i class="fa-solid fa-user-tie"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Board Head</div>
                    <div class="fw-bold text-dark fs-6">Vice-Chancellor</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="proc-board-stat-chip">
                  <div class="proc-board-stat-icon"><i class="fa-solid fa-shield-halved"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Chief Proctor</div>
                    <div class="fw-bold text-dark fs-6">Dr. Mukesh Tiwari</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="proc-board-stat-chip">
                  <div class="proc-board-stat-icon"><i class="fa-solid fa-users"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Board Members</div>
                    <div class="fw-bold text-dark fs-6">5 Members</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Overview Card -->
            <div class="proc-board-card">
              <div class="proc-board-card-header">
                <i class="fa-solid fa-circle-info"></i>
                <h5 class="fw-bold text-dark mb-0">Overview &amp; Purpose</h5>
              </div>
              <p class="text-secondary lh-base mb-2" style="font-size: 0.95rem;">
                To maintain the cordial atmosphere in the university campus (among the Students, faculty members and non-teaching staff).
              </p>
              <p class="text-secondary lh-base mb-0" style="font-size: 0.95rem;">
                Sri Satya Sai University of Technology &amp; Medical Sciences, Sehore hereby constituted the Proctorial Board headed by the Vice Chancellor, Chief Proctor, helps students, faculty members and non-teaching staffs from any difficulty and to see that the disciplinary rules are followed properly. Proctorial Board comprises of following members :-
              </p>

              <div class="proc-board-download-callout">
                <div class="d-flex align-items-center gap-3">
                  <div class="proc-board-stat-icon" style="background:#f59e0b; color:#fff;">
                    <i class="fa-solid fa-file-pdf"></i>
                  </div>
                  <div>
                    <h6 class="fw-bold text-dark mb-1">Official Proctorial Board Notification</h6>
                    <span class="text-muted small">Download the official university document for the Proctorial Board.</span>
                  </div>
                </div>
                <a href="<?php echo BASE_URL; ?>assets/pdf/committee/ProctorialBoard_01062024.pdf" target="_blank" rel="noopener" class="proc-board-badge-btn">
                  <i class="fa-solid fa-file-pdf"></i> Download PDF
                </a>
              </div>
            </div>

            <!-- Table: PROCTORIAL BOARD MEMBERS -->
            <div class="proc-board-card mb-0">
              <div class="proc-board-card-header">
                <i class="fa-solid fa-users-gear"></i>
                <h5 class="fw-bold text-dark mb-0">Proctorial Board Members</h5>
              </div>
              <div class="proc-board-table-wrapper">
                <table class="proc-board-table">
                  <thead>
                    <tr>
                      <th style="width:10%;">S.No.</th>
                      <th style="width:35%;">Name</th>
                      <th style="width:30%;">Designation</th>
                      <th style="width:25%;">Board Role</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Dr. Mukesh Tiwari</td>
                      <td>Vice-Chancellor</td>
                      <td><strong>Chief Proctor</strong></td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Dr. Hemant Sharma</td>
                      <td>Registrar</td>
                      <td><strong>Member</strong></td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Dr. R.S.Kushwah</td>
                      <td>Dean (Engg.)</td>
                      <td><strong>Member</strong></td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>Dr. Neelesh Choubey</td>
                      <td>Professor (Pharm.)</td>
                      <td><strong>Member</strong></td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td>Mr. H.S. Raghuvanshi</td>
                      <td>Chief Administrative Officer (CAO)</td>
                      <td><strong>Member &amp; Co-ordinator</strong></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

          </div>
        </div><!-- end proc-board-main-card -->
      </div><!-- end col-lg-8 -->

      <!-- Sticky Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>