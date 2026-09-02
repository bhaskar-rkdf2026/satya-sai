<?php
$page_title = 'Governing Body - SSSUTMS';
$banner_title = 'Governing Body';
$banner_category = 'About';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
.gb-page-section {
  background-color: #f8fafc;
}
.gb-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
  overflow: hidden;
}
.gb-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2rem;
  position: relative;
}
.gb-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #d97706, #f59e0b);
}
.gb-notification-box {
  background: #f8fafc;
  border-left: 4px solid #0b2545;
  border-radius: 12px;
  padding: 1.25rem 1.5rem;
  margin-bottom: 1.5rem;
  box-shadow: 0 2px 10px rgba(0,0,0,0.02);
}
.gb-notification-box p {
  font-size: 0.95rem;
  line-height: 1.65;
  color: #334155;
}
.gb-pdf-btn {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 8px 18px;
  background: #dc2626;
  color: #ffffff;
  font-weight: 600;
  font-size: 0.88rem;
  border-radius: 8px;
  text-decoration: none;
  transition: all 0.2s ease;
  box-shadow: 0 4px 12px rgba(220, 38, 38, 0.2);
}
.gb-pdf-btn:hover {
  background: #b91c1c;
  color: #ffffff;
  transform: translateY(-2px);
  box-shadow: 0 6px 16px rgba(220, 38, 38, 0.3);
}
.gb-table-wrapper {
  background: #ffffff;
  border-radius: 14px;
  border: 1px solid #e2e8f0;
  overflow: hidden;
  box-shadow: 0 4px 16px rgba(0,0,0,0.03);
}
.gb-table {
  margin-bottom: 0;
}
.gb-table thead th {
  background: #0b2545;
  color: #ffffff;
  font-size: 0.88rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  padding: 14px 16px;
  border: none;
  vertical-align: middle;
}
.gb-table tbody td {
  padding: 14px 16px;
  vertical-align: middle;
  font-size: 0.92rem;
  color: #334155;
  border-color: #f1f5f9;
}
.gb-table tbody tr:nth-of-type(even) {
  background-color: #f8fafc;
}
.gb-table tbody tr:hover {
  background-color: #f1f5f9;
}
.gb-statute-badge {
  display: inline-block;
  padding: 3px 10px;
  background: #e2e8f0;
  color: #475569;
  font-size: 0.8rem;
  font-weight: 600;
  border-radius: 6px;
  font-family: monospace;
}
.gb-role-pill {
  display: inline-flex;
  align-items: center;
  gap: 5px;
  padding: 4px 12px;
  border-radius: 50px;
  font-size: 0.82rem;
  font-weight: 600;
}
.gb-role-chancellor { background: #fef3c7; color: #92400e; border: 1px solid #fde68a; }
.gb-role-vc { background: #e0f2fe; color: #0369a1; border: 1px solid #bae6fd; }
.gb-role-sponsor { background: #e0e7ff; color: #3730a3; border: 1px solid #c7d2fe; }
.gb-role-visitor { background: #d1fae5; color: #065f46; border: 1px solid #a7f3d0; }
.gb-role-govt { background: #f3e8ff; color: #6b21a8; border: 1px solid #e9d5ff; }
.gb-role-registrar { background: #ccfbf1; color: #115e59; border: 1px solid #99f6e4; }
</style>

<section class="subpage-main-section gb-page-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        
        <!-- Main Card Wrapper -->
        <div class="gb-main-card mb-4">
          
          <!-- Banner Header -->
          <div class="gb-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge bg-warning text-dark fw-bold uppercase mb-2 px-3 py-2 rounded-pill">
                <i class="fa-solid fa-building-columns me-1"></i> Apex Executive Body
              </span>
              <h3 class="fw-bold text-white mb-0 fs-3">GOVERNING BODY OF THE UNIVERSITY</h3>
            </div>
            <div>
              <a href="<?php echo BASE_URL; ?>assets/pdf/governance_13062024_0218.pdf" target="_blank" rel="noopener" class="gb-pdf-btn">
                <i class="fa-solid fa-file-pdf fs-5"></i>
                <span>Download Official Gazette (PDF)</span>
              </a>
            </div>
          </div>

          <!-- Body Container -->
          <div class="p-4">
            
            <!-- Statutory Notification Text -->
            <div class="gb-notification-box">
              <div class="d-flex align-items-start gap-3">
                <div class="text-primary fs-4 mt-1">
                  <i class="fa-solid fa-circle-info"></i>
                </div>
                <div>
                  <h6 class="fw-bold text-dark mb-1">Statutory Notification &amp; Ordinance Provisions</h6>
                  <p class="mb-0 text-justify">
                    As per letter no. <strong>1022/508/cc/17/38 dated 01/12/2022</strong> the following three members are nominated as per the provision of <strong>Niji Vishwavidyalaya (Sthapana &amp; Sanchalan) act 2007 para 22(1) (d)</strong> viz 1. Dr. Vinod Krishan Sethi, 2. Dr. Ajay Singh Parihar, and 3. Dr. B.M. Mane, and also as per the provision of <strong>Niji Vishwavidyalaya (Sthapana &amp; Sanchalan) act 2007 para 22(1) (e)</strong> Dr. Sapan Patel are nominated in the Governing Body of <strong>Sri Satya Sai University of Technology and Medical Sciences, Sehore</strong>. Presently the Composition of Governing Body is as follows:
                  </p>
                </div>
              </div>
            </div>

            <!-- Responsive Members Table -->
            <div class="gb-table-wrapper table-responsive">
              <table class="table gb-table align-middle">
                <thead>
                  <tr>
                    <th class="text-center" style="width: 70px;">S. No.</th>
                    <th style="width: 140px;">Statute Ref.</th>
                    <th style="width: 200px;">Name</th>
                    <th style="width: 220px;">Profession / Capacity</th>
                    <th>Full Postal Address</th>
                  </tr>
                </thead>
                <tbody>
                  
                  <!-- Member 1 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">1</td>
                    <td><span class="gb-statute-badge">09 (I) (i)</span></td>
                    <td><strong class="text-dark">Mr. Sidharth Kapoor</strong></td>
                    <td>
                      <span class="gb-role-pill gb-role-chancellor">
                        <i class="fa-solid fa-crown me-1"></i> Chancellor &amp; Ex. Officio Chairman
                      </span>
                    </td>
                    <td>E3/4 Arera Colony Bhopal (MP)</td>
                  </tr>

                  <!-- Member 2 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">2</td>
                    <td><span class="gb-statute-badge">09 (I) (ii)</span></td>
                    <td><strong class="text-dark">Dr. Mukesh Tiwari</strong></td>
                    <td>
                      <span class="gb-role-pill gb-role-vc">
                        <i class="fa-solid fa-user-graduate me-1"></i> Vice Chancellor
                      </span>
                    </td>
                    <td>123 Amrit Enclave, Ayodhya By Pass Road, Bhopal (MP)</td>
                  </tr>

                  <!-- Member 3 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">3</td>
                    <td><span class="gb-statute-badge">09 (I) (iii)</span></td>
                    <td><strong class="text-dark">Dr. Gopal Panda</strong></td>
                    <td>
                      <span class="gb-role-pill gb-role-sponsor">
                        <i class="fa-solid fa-building me-1"></i> Nominee of Sponsoring Body
                      </span>
                    </td>
                    <td>SRK University Bhopal (MP)</td>
                  </tr>

                  <!-- Member 4 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">4</td>
                    <td><span class="gb-statute-badge">09 (I) (iii)</span></td>
                    <td><strong class="text-dark">Mr. Gulshan Kapoor</strong></td>
                    <td>
                      <span class="gb-role-pill gb-role-sponsor">
                        <i class="fa-solid fa-building me-1"></i> Nominee of Sponsoring Body
                      </span>
                    </td>
                    <td>Vill No. 435, Omex City near regent Hotel Magaliya, Indore (MP)</td>
                  </tr>

                  <!-- Member 5 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">5</td>
                    <td><span class="gb-statute-badge">09 (I) (iii)</span></td>
                    <td><strong class="text-dark">Dr. (Mrs.) Ruchi Choubey</strong></td>
                    <td>
                      <span class="gb-role-pill gb-role-sponsor">
                        <i class="fa-solid fa-building me-1"></i> Nominee of Sponsoring Body
                      </span>
                    </td>
                    <td>DK-4, 289/A Danishkunj, Opp. Shaktidam Mandir Bhoapl (MP)</td>
                  </tr>

                  <!-- Member 6 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">6</td>
                    <td><span class="gb-statute-badge">09 (I) (iv)</span></td>
                    <td><strong class="text-dark">Dr. Vinod Krishan Sehti</strong></td>
                    <td>
                      <span class="gb-role-pill gb-role-visitor">
                        <i class="fa-solid fa-user-tie me-1"></i> Visitor Nominee
                      </span>
                    </td>
                    <td>Ex Rector and Director, RGPV, Bhopal (MP)</td>
                  </tr>

                  <!-- Member 7 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">7</td>
                    <td><span class="gb-statute-badge">09 (I) (iv)</span></td>
                    <td><strong class="text-dark">Dr. Ajay Singh Parihar</strong></td>
                    <td>
                      <span class="gb-role-pill gb-role-visitor">
                        <i class="fa-solid fa-user-tie me-1"></i> Visitor Nominee
                      </span>
                    </td>
                    <td>Govt. Homoeopathy College, Bhopal (MP)</td>
                  </tr>

                  <!-- Member 8 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">8</td>
                    <td><span class="gb-statute-badge">09 (I) (iv)</span></td>
                    <td><strong class="text-dark">Dr. B.M. Mane</strong></td>
                    <td>
                      <span class="gb-role-pill gb-role-visitor">
                        <i class="fa-solid fa-user-tie me-1"></i> Visitor Nominee
                      </span>
                    </td>
                    <td>Bhakti Paradise First Floor, Block &ndash; 7 link Road, Chinchvad, Pune (MS)</td>
                  </tr>

                  <!-- Member 9 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">9</td>
                    <td><span class="gb-statute-badge">09 (I) (v)</span></td>
                    <td><strong class="text-dark">Dr. Sapan Patel</strong></td>
                    <td>
                      <span class="gb-role-pill gb-role-govt">
                        <i class="fa-solid fa-landmark me-1"></i> M.P. State Govt. Representative
                      </span>
                    </td>
                    <td>Officr on Special Duty, Higher Education, Satpura Bhavan, Bhopal (MP)</td>
                  </tr>

                  <!-- Member 10 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">10</td>
                    <td><span class="gb-statute-badge">09 (I) (vi)</span></td>
                    <td><strong class="text-dark">Dr. Hemant Sharma</strong></td>
                    <td>
                      <span class="gb-role-pill gb-role-registrar">
                        <i class="fa-solid fa-user-gear me-1"></i> Registrar and Member Secretary
                      </span>
                    </td>
                    <td>42 Janki Residency, Kolar Road, Bhopal (MP)</td>
                  </tr>

                </tbody>
              </table>
            </div>

          </div>
        </div>

      </div>

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>