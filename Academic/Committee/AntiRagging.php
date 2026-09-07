<?php
$page_title = 'Anti Ragging - SSSUTMS';
$banner_title = 'Anti Ragging';
$banner_category = 'Academic';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
.anti-rag-section { background-color: #f8fafc; }
.anti-rag-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15,23,42,0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}
.anti-rag-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2rem;
  position: relative;
}
.anti-rag-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.anti-rag-stat-chip {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 14px 18px;
  display: flex; align-items: center; gap: 14px;
  height: 100%;
  transition: all 0.2s ease;
}
.anti-rag-stat-chip:hover {
  border-color: #cbd5e1;
  box-shadow: 0 4px 14px rgba(0,0,0,0.04);
}
.anti-rag-stat-icon {
  width: 44px; height: 44px;
  border-radius: 10px;
  background: rgba(245,158,11,0.1);
  color: #d97706;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.25rem; flex-shrink: 0;
}
.anti-rag-policy-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 1.5rem;
  box-shadow: 0 4px 16px rgba(0,0,0,0.02);
  margin-bottom: 1.5rem;
}
.anti-rag-card-header {
  display: flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 1rem;
  padding-bottom: 0.75rem;
  border-bottom: 2px solid #f1f5f9;
}
.anti-rag-card-header i {
  color: #f59e0b;
  font-size: 1.25rem;
}
.anti-rag-affidavit-callout {
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
.anti-rag-badge-btn {
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
.anti-rag-badge-btn i {
  color: #fbbf24 !important;
  transition: color 0.2s ease;
}
.anti-rag-badge-btn:hover {
  background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%) !important;
  color: #ffffff !important;
  border-color: #d97706;
  box-shadow: 0 4px 12px rgba(217,119,6,0.35);
  transform: translateY(-1px);
}
.anti-rag-badge-btn:hover i {
  color: #ffffff !important;
}
.anti-rag-table-wrapper {
  border-radius: 12px;
  overflow: hidden;
  border: 1px solid #e2e8f0;
  box-shadow: 0 4px 16px rgba(0,0,0,0.03);
  margin-bottom: 1.5rem;
}
.anti-rag-table {
  width: 100%;
  border-collapse: collapse;
  font-size: 0.92rem;
  margin-bottom: 0;
}
.anti-rag-table thead th {
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
.anti-rag-table tbody tr:nth-child(even) { background: #f0f4f9; }
.anti-rag-table tbody tr:nth-child(odd)  { background: #ffffff; }
.anti-rag-table tbody tr:hover {
  background: #e8f0fb;
  transition: background 0.15s ease;
}
.anti-rag-table tbody td {
  padding: 10px 14px;
  border-bottom: 1px solid #e2e8f0;
  color: #334155;
  vertical-align: middle;
}
.anti-rag-table tbody td:first-child {
  font-weight: 700;
  color: #0b2545;
  text-align: center;
}
</style>

<section class="subpage-main-section anti-rag-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="anti-rag-main-card">

          <!-- Banner Header -->
          <div class="anti-rag-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-shield-halved me-1"></i> Statutory Committees
              </span>
              <h3 class="fw-bold text-white mb-0 fs-3">ANTI-RAGGING</h3>
            </div>
          </div>

          <!-- Body -->
          <div class="p-4">

            <!-- Stat Chips -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-sm-6 col-md-3">
                <div class="anti-rag-stat-chip">
                  <div class="anti-rag-stat-icon"><i class="fa-solid fa-ban"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Policy</div>
                    <div class="fw-bold text-dark fs-6">Zero Tolerance</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="anti-rag-stat-chip">
                  <div class="anti-rag-stat-icon"><i class="fa-solid fa-users"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Committee</div>
                    <div class="fw-bold text-dark fs-6">10 Members</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="anti-rag-stat-chip">
                  <div class="anti-rag-stat-icon"><i class="fa-solid fa-user-shield"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Squad</div>
                    <div class="fw-bold text-dark fs-6">10 Members</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="anti-rag-stat-chip">
                  <div class="anti-rag-stat-icon"><i class="fa-solid fa-headset"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Counseling</div>
                    <div class="fw-bold text-dark fs-6">Counselor Cell</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Anti-Ragging Policy Statement Card -->
            <div class="anti-rag-policy-card">
              <div class="anti-rag-card-header">
                <i class="fa-solid fa-circle-info"></i>
                <h5 class="fw-bold text-dark mb-0">Anti-Ragging Policy &amp; Directives</h5>
              </div>
              <p class="text-secondary lh-base mb-3" style="font-size: 0.95rem;">
                The Administration believes that Ragging is a social evil and has adopted &ldquo;Zero Tolerance&rdquo; regarding the same. The campus has one central anti-ragging committee and each constituent college has independent committees. These committees are headed by Head of Institutions, male and female faculty members and student representatives from each class. Regular meetings are called for monitoring. Complaint boxes are available in all Colleges, which are maintained regularly. Similar anti-ragging committees are functioning in Hostels. Senior and Junior Students are also counselled time to time regarding evils of ragging. Surprise checks are conducted by Anti-ragging committees. Multi-colour flexes in hindi are displayed in Campus, at prominent places for creating awareness regarding evils of Ragging.
              </p>
              
              <div class="anti-rag-affidavit-callout">
                <div class="d-flex align-items-center gap-3">
                  <div class="anti-rag-stat-icon" style="background:#f59e0b; color:#fff;">
                    <i class="fa-solid fa-scale-balanced"></i>
                  </div>
                  <div>
                    <h6 class="fw-bold text-dark mb-1">Hon&rsquo;ble Supreme Court Anti-Ragging Affidavit</h6>
                    <span class="text-muted small">During admissions all admitted regular students and their parents/guardians have to submit affidavit.</span>
                  </div>
                </div>
                <a href="<?php echo BASE_URL; ?>assets/pdf/committee/AntiRagging_Affidavit_31052024.pdf" target="_blank" rel="noopener" class="anti-rag-badge-btn">
                  <i class="fa-solid fa-file-pdf"></i> Download PDF
                </a>
              </div>
            </div>

            <!-- Table 1: ANTI-RAGGING COMMITTEE -->
            <div class="anti-rag-policy-card">
              <div class="anti-rag-card-header">
                <i class="fa-solid fa-users-gear"></i>
                <h5 class="fw-bold text-dark mb-0">ANTI-RAGGING COMMITTEE</h5>
              </div>
              <div class="anti-rag-table-wrapper">
                <table class="anti-rag-table">
                  <thead>
                    <tr>
                      <th style="width:10%;">S.No.</th>
                      <th style="width:55%;">Name</th>
                      <th style="width:35%;">Designation</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Dr. Shrikant Tambe</td>
                      <td><strong>Dean &amp; Chairman</strong></td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Dr. Dheeraj Shinde</td>
                      <td><strong>Dean &amp; Member</strong></td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Dr. Shahab Ahmad</td>
                      <td><strong>Professor &amp; Member</strong></td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>Mr. Mahesh Verma, Parents of B.Pharma I&rsquo;st Year Students</td>
                      <td><strong>Member representing Junior Student</strong></td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td>Mr. Ghanshyam Singh, Parents of M. Tech Students</td>
                      <td><strong>Member representing PG Student</strong></td>
                    </tr>
                    <tr>
                      <td>6</td>
                      <td>Mr. Ashish Mishra</td>
                      <td><strong>Member (Local Media Person)</strong></td>
                    </tr>
                    <tr>
                      <td>7</td>
                      <td>Town Inspector, Sehore (or his nominee)</td>
                      <td><strong>Member</strong></td>
                    </tr>
                    <tr>
                      <td>8</td>
                      <td>Mr. Ankit Joshi</td>
                      <td><strong>Asst. Prof Student Counselor &amp; Member</strong></td>
                    </tr>
                    <tr>
                      <td>9</td>
                      <td>Ms. Nuzhat Parveen</td>
                      <td><strong>Non-Teaching Staff &amp; Member</strong></td>
                    </tr>
                    <tr>
                      <td>10</td>
                      <td>Mr. C.S. Verma</td>
                      <td><strong>Non-Teaching Staff &amp; Member</strong></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <!-- Table 2: ANTI-RAGGING SQUAD -->
            <div class="anti-rag-policy-card">
              <div class="anti-rag-card-header">
                <i class="fa-solid fa-user-shield"></i>
                <h5 class="fw-bold text-dark mb-0">ANTI-RAGGING SQUAD</h5>
              </div>
              <div class="anti-rag-table-wrapper">
                <table class="anti-rag-table">
                  <thead>
                    <tr>
                      <th style="width:10%;">S.No.</th>
                      <th style="width:50%;">Name</th>
                      <th style="width:40%;">Department</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Ms. Shefali</td>
                      <td>MCA Department</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Mr. Narendra Patel</td>
                      <td>Pharmacy Department</td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Dr. Rajesh Sharma</td>
                      <td>MBA Department</td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>Dr. Dhiraj Shinde</td>
                      <td>Education Department</td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td>Dr. Shahab Ahmad</td>
                      <td>Hotel Mgmt. Department</td>
                    </tr>
                    <tr>
                      <td>6</td>
                      <td>Mr. Veerbal Kushwaha</td>
                      <td>Agriculture Department</td>
                    </tr>
                    <tr>
                      <td>7</td>
                      <td>Dr. Susan Thomas</td>
                      <td>Homoeopathy College</td>
                    </tr>
                    <tr>
                      <td>8</td>
                      <td>Mr. Pradeep Maheshwari</td>
                      <td>Commerce Department</td>
                    </tr>
                    <tr>
                      <td>9</td>
                      <td>Ms. Abhilasha Pathak</td>
                      <td>Sociology Department</td>
                    </tr>
                    <tr>
                      <td>10</td>
                      <td>Mr. Shailendra Thakur</td>
                      <td>Engineering Department</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <!-- Table 3: COUNSELOR -->
            <div class="anti-rag-policy-card mb-0">
              <div class="anti-rag-card-header">
                <i class="fa-solid fa-headset"></i>
                <h5 class="fw-bold text-dark mb-0">COUNSELOR</h5>
              </div>
              <div class="anti-rag-table-wrapper">
                <table class="anti-rag-table">
                  <thead>
                    <tr>
                      <th style="width:15%;">S.No.</th>
                      <th style="width:85%;">Name &amp; Designation</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Dr. Sanjay Rathore (CE)</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

          </div>
        </div><!-- end anti-rag-main-card -->
      </div><!-- end col-lg-8 -->

      <!-- Sticky Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>