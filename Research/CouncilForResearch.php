<?php
$page_title = 'Council For Research - SSSUTMS';
$banner_title = 'Council For Research';
$banner_category = 'Research';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?>

<style>
.cfr-section { background-color: #f8fafc; }
.cfr-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15,23,42,0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}
.cfr-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2.2rem 2rem;
  position: relative;
}
.cfr-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.cfr-stat-chip {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 16px 14px;
  display: flex; align-items: center; gap: 12px;
  height: 100%;
  transition: all 0.25s ease;
  box-shadow: 0 4px 12px rgba(0,0,0,0.02);
}
.cfr-stat-chip:hover {
  border-color: #cbd5e1;
  box-shadow: 0 6px 18px rgba(11,37,69,0.07);
  transform: translateY(-2px);
}
.cfr-stat-icon {
  width: 48px; height: 48px;
  border-radius: 12px;
  background: rgba(245,158,11,0.12);
  color: #d97706;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.35rem; flex-shrink: 0;
}
.cfr-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 16px;
  padding: 1.5rem;
  box-shadow: 0 4px 16px rgba(0,0,0,0.02);
  margin-bottom: 1.75rem;
}
.cfr-card-header {
  display: flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 1.2rem;
  padding-bottom: 0.85rem;
  border-bottom: 2px solid #f1f5f9;
}
.cfr-card-header i {
  color: #f59e0b;
  font-size: 1.3rem;
}
.cfr-table {
  width: 100%;
  border-collapse: collapse;
  border-radius: 12px;
  overflow: hidden;
  border: 1px solid #e2e8f0;
}
.cfr-table th {
  background: #0b2545;
  color: #ffffff;
  padding: 14px 18px;
  font-weight: 700;
  font-size: 0.95rem;
  border: 1px solid #1e3a5f;
}
.cfr-table td {
  padding: 12px 18px;
  border: 1px solid #e2e8f0;
  color: #334155;
  font-size: 0.93rem;
}
.cfr-table tbody tr:nth-child(even) {
  background-color: #f8fafc;
}
.cfr-table tbody tr:hover {
  background-color: #f1f5f9;
}
</style>

<section class="subpage-main-section cfr-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="cfr-main-card">

          <!-- Header Banner -->
          <div class="cfr-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-users-gear me-1"></i> Academic Apex Research Body
              </span>
              <h3 class="fw-bold text-white mb-1 fs-3">COUNCIL FOR RESEARCH (CFR)</h3>
              <p class="text-white-50 mb-0 small">Guiding Committee Members &amp; Focused Research Specializations at SSSUTMS</p>
            </div>
          </div>

          <!-- Content Body -->
          <div class="p-4">

            <!-- Stat Chips -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-sm-6 col-md-3">
                <div class="cfr-stat-chip">
                  <div class="cfr-stat-icon"><i class="fa-solid fa-user-shield"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Leadership</div>
                    <div class="fw-bold text-dark fs-6">18 Committee Members</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="cfr-stat-chip">
                  <div class="cfr-stat-icon"><i class="fa-solid fa-brain"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Domains</div>
                    <div class="fw-bold text-dark fs-6">30 Focus Areas</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="cfr-stat-chip">
                  <div class="cfr-stat-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Governance</div>
                    <div class="fw-bold text-dark fs-6">Ph.D. &amp; Post-Doc</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="cfr-stat-chip">
                  <div class="cfr-stat-icon"><i class="fa-solid fa-diagram-project"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Scope</div>
                    <div class="fw-bold text-dark fs-6">Engg, Med, Arts, Sci</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Committee Members Table Section -->
            <div class="cfr-card">
              <div class="cfr-card-header">
                <i class="fa-solid fa-users text-warning"></i>
                <h5 class="fw-bold text-dark mb-0">Council For Research Committee Members</h5>
              </div>
              <div class="table-responsive">
                <table class="cfr-table">
                  <thead>
                    <tr>
                      <th class="text-center" style="width: 10%;">S.No.</th>
                      <th style="width: 90%;">Name &amp; Designation</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr><td class="text-center fw-bold text-primary">1</td><td class="fw-bold">Prof. Hemant Kumar Sharma <span class="badge bg-warning text-dark ms-2">Chairman</span></td></tr>
                    <tr><td class="text-center fw-bold text-primary">2</td><td class="fw-bold">Prof. Santosh Rai <span class="badge bg-primary ms-2">Convenor</span></td></tr>
                    <tr><td class="text-center fw-bold text-primary">3</td><td class="fw-bold">Prof. Alka Thakur <span class="badge bg-primary ms-2">Convenor</span></td></tr>
                    <tr><td class="text-center fw-bold">4</td><td>Prof. Narendra Sharma</td></tr>
                    <tr><td class="text-center fw-bold">5</td><td>Prof. Neelesh Choubey</td></tr>
                    <tr><td class="text-center fw-bold">6</td><td>Prof. Prabodh Khamparia</td></tr>
                    <tr><td class="text-center fw-bold">7</td><td>Prof. Neelu Jain</td></tr>
                    <tr><td class="text-center fw-bold">8</td><td>Prof. Geeta Khoobchandani</td></tr>
                    <tr><td class="text-center fw-bold">9</td><td>Prof. Gajraj Singh Ahirwar</td></tr>
                    <tr><td class="text-center fw-bold">10</td><td>Prof. Pradeep Maheshwari</td></tr>
                    <tr><td class="text-center fw-bold">11</td><td>Prof. Harsh Lohiya</td></tr>
                    <tr><td class="text-center fw-bold">12</td><td>Prof. Abhilasha Pathak</td></tr>
                    <tr><td class="text-center fw-bold">13</td><td>Prof. Pradeep Kumar Patra</td></tr>
                    <tr><td class="text-center fw-bold">14</td><td>Prof. Kanchan Shrivastava</td></tr>
                    <tr><td class="text-center fw-bold">15</td><td>Prof. M D Singh</td></tr>
                    <tr><td class="text-center fw-bold">16</td><td>Prof. Dhiraj Shinde</td></tr>
                    <tr><td class="text-center fw-bold">17</td><td>Prof. Rishikesh Yadav</td></tr>
                    <tr><td class="text-center fw-bold">18</td><td>Prof. Mamta Vyas</td></tr>
                  </tbody>
                </table>
              </div>
            </div>

            <!-- Focused Research Areas Table Section -->
            <div class="cfr-card mb-0">
              <div class="cfr-card-header">
                <i class="fa-solid fa-lightbulb text-warning"></i>
                <h5 class="fw-bold text-dark mb-0">Focused Research Areas Available at SSSUTMS</h5>
              </div>
              <div class="table-responsive">
                <table class="cfr-table">
                  <thead>
                    <tr>
                      <th class="text-center" style="width: 10%;">S.No.</th>
                      <th style="width: 90%;">Research Specialization &amp; Domain</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr><td class="text-center fw-bold text-primary">1</td><td>Image Processing</td></tr>
                    <tr><td class="text-center fw-bold text-primary">2</td><td>Design and Production Engineering</td></tr>
                    <tr><td class="text-center fw-bold text-primary">3</td><td>Radar, Semi-Conductor Technology, Nano technology</td></tr>
                    <tr><td class="text-center fw-bold text-primary">4</td><td>Distributed database system, IoT</td></tr>
                    <tr><td class="text-center fw-bold text-primary">5</td><td>Power System</td></tr>
                    <tr><td class="text-center fw-bold text-primary">6</td><td>Coordination chemistry, Environmental chemistry, Chemical Science</td></tr>
                    <tr><td class="text-center fw-bold text-primary">7</td><td>Cleaner production and clean technology</td></tr>
                    <tr><td class="text-center fw-bold text-primary">8</td><td>Space Science</td></tr>
                    <tr><td class="text-center fw-bold text-primary">9</td><td>Ionosphere</td></tr>
                    <tr><td class="text-center fw-bold text-primary">10</td><td>Soil Chemistry, inorganic chemistry, Applied chemistry</td></tr>
                    <tr><td class="text-center fw-bold text-primary">11</td><td>Applied Economics, Business management</td></tr>
                    <tr><td class="text-center fw-bold text-primary">12</td><td>Retail Marketing</td></tr>
                    <tr><td class="text-center fw-bold text-primary">13</td><td>Service Marketing</td></tr>
                    <tr><td class="text-center fw-bold text-primary">14</td><td>Pharmacognosy</td></tr>
                    <tr><td class="text-center fw-bold text-primary">15</td><td>Sub sociology</td></tr>
                    <tr><td class="text-center fw-bold text-primary">16</td><td>Pharmaceutics</td></tr>
                    <tr><td class="text-center fw-bold text-primary">17</td><td>Pharmacology</td></tr>
                    <tr><td class="text-center fw-bold text-primary">18</td><td>Pharmaceutical Chemistry</td></tr>
                    <tr><td class="text-center fw-bold text-primary">19</td><td>Pharmaceutical formulation and manufacturing</td></tr>
                    <tr><td class="text-center fw-bold text-primary">20</td><td>Rural-economics</td></tr>
                    <tr><td class="text-center fw-bold text-primary">21</td><td>Agronomy</td></tr>
                    <tr><td class="text-center fw-bold text-primary">22</td><td>Education contribution to society</td></tr>
                    <tr><td class="text-center fw-bold text-primary">23</td><td>Rural and Urban Education System</td></tr>
                    <tr><td class="text-center fw-bold text-primary">24</td><td>Toxicology and Pharmacology</td></tr>
                    <tr><td class="text-center fw-bold text-primary">25</td><td>Prashanik Adyyan</td></tr>
                    <tr><td class="text-center fw-bold text-primary">26</td><td>Interpersonal relationship in psychology</td></tr>
                    <tr><td class="text-center fw-bold text-primary">27</td><td>Case study method</td></tr>
                    <tr><td class="text-center fw-bold text-primary">28</td><td>Physical Education</td></tr>
                    <tr><td class="text-center fw-bold text-primary">29</td><td>Environmental education, Education Psychology</td></tr>
                    <tr><td class="text-center fw-bold text-primary">30</td><td>Special Education</td></tr>
                  </tbody>
                </table>
              </div>
            </div>

          </div>
        </div><!-- end cfr-main-card -->
      </div><!-- end col-lg-8 -->

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>