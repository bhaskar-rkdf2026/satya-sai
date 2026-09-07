<?php
$page_title = 'Internal Complaint Committee - SSSUTMS';
$banner_title = 'Internal Complaint Committee';
$banner_category = 'Academic';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
.icc-section { background-color: #f8fafc; }
.icc-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15,23,42,0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}
.icc-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2rem;
  position: relative;
}
.icc-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.icc-stat-chip {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 14px 18px;
  display: flex; align-items: center; gap: 14px;
  height: 100%;
  transition: all 0.2s ease;
}
.icc-stat-chip:hover {
  border-color: #cbd5e1;
  box-shadow: 0 4px 14px rgba(0,0,0,0.04);
}
.icc-stat-icon {
  width: 44px; height: 44px;
  border-radius: 10px;
  background: rgba(245,158,11,0.1);
  color: #d97706;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.25rem; flex-shrink: 0;
}
.icc-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 1.5rem;
  box-shadow: 0 4px 16px rgba(0,0,0,0.02);
  margin-bottom: 1.5rem;
}
.icc-card-header {
  display: flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 1rem;
  padding-bottom: 0.75rem;
  border-bottom: 2px solid #f1f5f9;
}
.icc-card-header i {
  color: #f59e0b;
  font-size: 1.25rem;
}
.icc-download-callout {
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
.icc-badge-btn {
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
.icc-badge-btn i {
  color: #fbbf24 !important;
  transition: color 0.2s ease;
}
.icc-badge-btn:hover {
  background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%) !important;
  color: #ffffff !important;
  border-color: #d97706;
  box-shadow: 0 4px 12px rgba(217,119,6,0.35);
  transform: translateY(-1px);
}
.icc-badge-btn:hover i {
  color: #ffffff !important;
}
.icc-table-wrapper {
  border-radius: 12px;
  overflow: hidden;
  border: 1px solid #e2e8f0;
  box-shadow: 0 4px 16px rgba(0,0,0,0.03);
  margin-bottom: 1.5rem;
}
.icc-table {
  width: 100%;
  border-collapse: collapse;
  font-size: 0.92rem;
  margin-bottom: 0;
}
.icc-table thead th {
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
.icc-table tbody tr:nth-child(even) { background: #f0f4f9; }
.icc-table tbody tr:nth-child(odd)  { background: #ffffff; }
.icc-table tbody tr:hover {
  background: #e8f0fb;
  transition: background 0.15s ease;
}
.icc-table tbody td {
  padding: 10px 14px;
  border-bottom: 1px solid #e2e8f0;
  color: #334155;
  vertical-align: middle;
}
.icc-table tbody td:first-child {
  font-weight: 700;
  color: #0b2545;
  text-align: center;
}
</style>

<section class="subpage-main-section icc-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="icc-main-card">

          <!-- Banner Header -->
          <div class="icc-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-person-shelter me-1"></i> Statutory Committees
              </span>
              <h3 class="fw-bold text-white mb-0 fs-3">INTERNAL COMPLAINT COMMITTEE RELATING TO SEXUAL HARASSMENT OF WORKING WOMEN</h3>
            </div>
          </div>

          <!-- Body -->
          <div class="p-4">

            <!-- Stat Chips -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-sm-6 col-md-3">
                <div class="icc-stat-chip">
                  <div class="icc-stat-icon"><i class="fa-solid fa-scale-balanced"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Framework</div>
                    <div class="fw-bold text-dark fs-6">UGC Reg. 2015</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="icc-stat-chip">
                  <div class="icc-stat-icon"><i class="fa-solid fa-user-check"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Presiding Officer</div>
                    <div class="fw-bold text-dark fs-6">Dr. K. Shrivastava</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="icc-stat-chip">
                  <div class="icc-stat-icon"><i class="fa-solid fa-users"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Committee</div>
                    <div class="fw-bold text-dark fs-6">9 Members</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="icc-stat-chip">
                  <div class="icc-stat-icon"><i class="fa-solid fa-people-roof"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Members</div>
                    <div class="fw-bold text-dark fs-6">Faculty &amp; Students</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Overview Card -->
            <div class="icc-card">
              <div class="icc-card-header">
                <i class="fa-solid fa-circle-info"></i>
                <h5 class="fw-bold text-dark mb-0">Regulations &amp; Constitution</h5>
              </div>
              <p class="text-secondary lh-base mb-0" style="font-size: 0.95rem;">
                As per the University Grants Commission (Prevention, Prohibition and redressal of sexual harassment of women employees and students in higher education institutions) Regulations, 2015. Sri Satya Sai University of Technology and Medical Sciences, Sehore hereby constituted the &quot;INTERNAL COMPLAINT COMMITTEE&quot; comprises of the following members :-
              </p>

              <div class="icc-download-callout">
                <div class="d-flex align-items-center gap-3">
                  <div class="icc-stat-icon" style="background:#f59e0b; color:#fff;">
                    <i class="fa-solid fa-file-pdf"></i>
                  </div>
                  <div>
                    <h6 class="fw-bold text-dark mb-1">Official Internal Complaint Committee Document</h6>
                    <span class="text-muted small">Download the official university document for the Internal Complaint Committee.</span>
                  </div>
                </div>
                <a href="<?php echo BASE_URL; ?>assets/pdf/committee/InternalComplaintCommittee_01062024.pdf" target="_blank" rel="noopener" class="icc-badge-btn">
                  <i class="fa-solid fa-file-pdf"></i> Download PDF
                </a>
              </div>
            </div>

            <!-- Table: INTERNAL COMPLAINT COMMITTEE MEMBERS -->
            <div class="icc-card mb-0">
              <div class="icc-card-header">
                <i class="fa-solid fa-users-gear"></i>
                <h5 class="fw-bold text-dark mb-0">Internal Complaint Committee Members</h5>
              </div>
              <div class="icc-table-wrapper">
                <table class="icc-table">
                  <thead>
                    <tr>
                      <th style="width:10%;">S.No.</th>
                      <th style="width:50%;">Name of Member</th>
                      <th style="width:40%;">Designation</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td><strong>Dr. Kanchan Shrivastava</strong></td>
                      <td>Presiding Officer</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td><strong>Ms. Shobha Vyas</strong></td>
                      <td>Women Faculty Representative (Teaching)</td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td><strong>Mrs. Priyanka Jhawar</strong></td>
                      <td>Women Faculty Representative (Teaching)</td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td><strong>Mrs. Asha Verma</strong></td>
                      <td>Women Faculty Representative (Teaching)</td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td><strong>Mrs. Rachna Sharma</strong></td>
                      <td>Women Faculty Representative (Teaching)</td>
                    </tr>
                    <tr>
                      <td>6</td>
                      <td><strong>Miss. Shurbhi Sharm</strong></td>
                      <td>Girls Student Representative</td>
                    </tr>
                    <tr>
                      <td>7</td>
                      <td><strong>Miss. Sweta Rani</strong></td>
                      <td>Girls Student Representative</td>
                    </tr>
                    <tr>
                      <td>8</td>
                      <td><strong>Miss. Nikita Pawer</strong></td>
                      <td>Girls Student Representative</td>
                    </tr>
                    <tr>
                      <td>9</td>
                      <td>
                        <strong>Dr. Abhijat Krishan Tripathi</strong><br />
                        <span class="text-muted small">Principal, Shri Janki Raman Mahavidyalaya, Jabalpur</span>
                      </td>
                      <td>External Member</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

          </div>
        </div><!-- end icc-main-card -->
      </div><!-- end col-lg-8 -->

      <!-- Sticky Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>