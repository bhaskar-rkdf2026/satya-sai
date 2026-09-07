<?php
$page_title = 'Equal Opportunity Cell - SSSUTMS';
$banner_title = 'Equal Opportunity Cell';
$banner_category = 'Academic';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
.eoc-section { background-color: #f8fafc; }
.eoc-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15,23,42,0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}
.eoc-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2rem;
  position: relative;
}
.eoc-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.eoc-stat-chip {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 14px 12px;
  display: flex; align-items: center; gap: 10px;
  height: 100%;
  transition: all 0.2s ease;
  overflow: hidden;
}
.eoc-stat-chip:hover {
  border-color: #cbd5e1;
  box-shadow: 0 4px 14px rgba(0,0,0,0.04);
}
.eoc-stat-icon {
  width: 44px; height: 44px;
  border-radius: 10px;
  background: rgba(245,158,11,0.1);
  color: #d97706;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.25rem; flex-shrink: 0;
}
.eoc-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 1.5rem;
  box-shadow: 0 4px 16px rgba(0,0,0,0.02);
  margin-bottom: 1.5rem;
}
.eoc-card-header {
  display: flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 1rem;
  padding-bottom: 0.75rem;
  border-bottom: 2px solid #f1f5f9;
}
.eoc-card-header i {
  color: #f59e0b;
  font-size: 1.25rem;
}
.eoc-download-callout {
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
.eoc-badge-btn {
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
.eoc-badge-btn i {
  color: #fbbf24 !important;
  transition: color 0.2s ease;
}
.eoc-badge-btn:hover {
  background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%) !important;
  color: #ffffff !important;
  border-color: #d97706;
  box-shadow: 0 4px 12px rgba(217,119,6,0.35);
  transform: translateY(-1px);
}
.eoc-badge-btn:hover i {
  color: #ffffff !important;
}
.eoc-table-wrapper {
  border-radius: 12px;
  overflow: hidden;
  border: 1px solid #e2e8f0;
  box-shadow: 0 4px 16px rgba(0,0,0,0.03);
  margin-bottom: 1.5rem;
}
.eoc-table {
  width: 100%;
  border-collapse: collapse;
  font-size: 0.92rem;
  margin-bottom: 0;
}
.eoc-table thead th {
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
.eoc-table tbody tr:nth-child(even) { background: #f0f4f9; }
.eoc-table tbody tr:nth-child(odd)  { background: #ffffff; }
.eoc-table tbody tr:hover {
  background: #e8f0fb;
  transition: background 0.15s ease;
}
.eoc-table tbody td {
  padding: 10px 14px;
  border-bottom: 1px solid #e2e8f0;
  color: #334155;
  vertical-align: middle;
}
.eoc-table tbody td:first-child {
  font-weight: 700;
  color: #0b2545;
  text-align: center;
}
</style>

<section class="subpage-main-section eoc-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="eoc-main-card">

          <!-- Banner Header -->
          <div class="eoc-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-hand-holding-heart me-1"></i> Statutory Committees
              </span>
              <h3 class="fw-bold text-white mb-0 fs-3">EQUAL OPPORTUNITY CELL (EOC) / SEDGs</h3>
            </div>
          </div>

          <!-- Body -->
          <div class="p-4">

            <!-- Stat Chips -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-sm-6 col-md-3">
                <div class="eoc-stat-chip">
                  <div class="eoc-stat-icon"><i class="fa-solid fa-scale-balanced"></i></div>
                  <div style="min-width: 0; flex: 1;">
                    <div class="text-muted extra-small uppercase fw-bold">Cell</div>
                    <div class="fw-bold text-dark fs-6">EOC &amp; SEDGs Cell</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="eoc-stat-chip">
                  <div class="eoc-stat-icon"><i class="fa-solid fa-user-tie"></i></div>
                  <div style="min-width: 0; flex: 1;">
                    <div class="text-muted extra-small uppercase fw-bold">Chairperson</div>
                    <div class="fw-bold text-dark fs-6">Dr. Hemant Sharma</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="eoc-stat-chip">
                  <div class="eoc-stat-icon"><i class="fa-solid fa-user-check"></i></div>
                  <div style="min-width: 0; flex: 1;">
                    <div class="text-muted extra-small uppercase fw-bold">Member Secretary</div>
                    <div class="fw-bold text-dark fs-6">Mr. C.S. Verma</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="eoc-stat-chip">
                  <div class="eoc-stat-icon"><i class="fa-solid fa-users"></i></div>
                  <div style="min-width: 0; flex: 1;">
                    <div class="text-muted extra-small uppercase fw-bold">Committee</div>
                    <div class="fw-bold text-dark fs-6">9 EOC Members</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Overview Card -->
            <div class="eoc-card">
              <div class="eoc-card-header">
                <i class="fa-solid fa-circle-info"></i>
                <h5 class="fw-bold text-dark mb-0">Overview &amp; Mandate</h5>
              </div>
              <p class="text-secondary lh-base mb-0" style="font-size: 0.95rem;">
                Sri Satya Sai University of Technology and Medical Sciences, Sehore (MP) is pleased to constitute the &quot;Equal Opportunity Cell (EOC)/Socio-Economically Disadvantaged Groups (SEDGs)&quot; which will be committed for providing equal opportunities and creating an inclusive environment and culture in which all will be treated with respect and dignity.
              </p>

              <div class="eoc-download-callout">
                <div class="d-flex align-items-center gap-3">
                  <div class="eoc-stat-icon" style="background:#f59e0b; color:#fff;">
                    <i class="fa-solid fa-file-pdf"></i>
                  </div>
                  <div>
                    <h6 class="fw-bold text-dark mb-1">Official Equal Opportunity Cell Document</h6>
                    <span class="text-muted small">Download the official university document for the Equal Opportunity Cell.</span>
                  </div>
                </div>
                <a href="<?php echo BASE_URL; ?>assets/pdf/committee/Equal_Opportunity_Cell_07122024.pdf" target="_blank" rel="noopener" class="eoc-badge-btn">
                  <i class="fa-solid fa-file-pdf"></i> Download PDF
                </a>
              </div>
            </div>

            <!-- Table: EQUAL OPPORTUNITY CELL MEMBERS -->
            <div class="eoc-card mb-0">
              <div class="eoc-card-header">
                <i class="fa-solid fa-users-gear"></i>
                <h5 class="fw-bold text-dark mb-0">Equal Opportunity Cell Members</h5>
              </div>
              <div class="eoc-table-wrapper">
                <table class="eoc-table">
                  <thead>
                    <tr>
                      <th style="width:10%;">S.No.</th>
                      <th style="width:35%;">Name</th>
                      <th style="width:25%;">Role</th>
                      <th style="width:30%;">Designation</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td><strong>Dr. Hemant Sharma</strong></td>
                      <td><strong>Chairperson</strong></td>
                      <td>Registrar</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td><strong>Dr. Rajendra Singh Kushwaha</strong></td>
                      <td><strong>Advisor</strong></td>
                      <td>Director, IQAC Cell</td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td><strong>Dr. Neelesh Choubey</strong></td>
                      <td>Member</td>
                      <td>Dean, Pharmacy</td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td><strong>Dr. Dhiraj Shinde</strong></td>
                      <td>Member</td>
                      <td>Dean, Education</td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td><strong>Dr. Kanchan Shrivastava</strong></td>
                      <td>Member</td>
                      <td>Deputy Registrar / Incharge Internal Complaint Committee</td>
                    </tr>
                    <tr>
                      <td>6</td>
                      <td><strong>Dr. Rajesh Sharma</strong></td>
                      <td>Member</td>
                      <td>Dean, Management</td>
                    </tr>
                    <tr>
                      <td>7</td>
                      <td><strong>Mrs. Priyanka Jhawar</strong></td>
                      <td>Member</td>
                      <td>Principal (Polytechnic Engineering)</td>
                    </tr>
                    <tr>
                      <td>8</td>
                      <td><strong>Mr. C.S. Verma</strong></td>
                      <td><strong>Member Secretary</strong></td>
                      <td>Assistant Registrar</td>
                    </tr>
                    <tr>
                      <td>9</td>
                      <td><strong>Mr. Ansh Indoriya</strong></td>
                      <td>Member</td>
                      <td>Student Representative</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

          </div>
        </div><!-- end eoc-main-card -->
      </div><!-- end col-lg-8 -->

      <!-- Sticky Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>