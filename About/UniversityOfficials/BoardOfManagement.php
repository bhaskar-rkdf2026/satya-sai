<?php
$page_title = 'Board of Management - SSSUTMS';
$banner_title = 'Board of Management';
$banner_category = 'About';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
.bom-page-section {
  background-color: #f8fafc;
}
.bom-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
  overflow: hidden;
}
.bom-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2rem;
  position: relative;
}
.bom-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #0284c7, #38bdf8);
}
.bom-notification-box {
  background: #f8fafc;
  border-left: 4px solid #0b2545;
  border-radius: 12px;
  padding: 1.25rem 1.5rem;
  margin-bottom: 1.5rem;
  box-shadow: 0 2px 10px rgba(0,0,0,0.02);
}
.bom-notification-box p {
  font-size: 0.95rem;
  line-height: 1.65;
  color: #334155;
}
.bom-pdf-btn {
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
.bom-pdf-btn:hover {
  background: #b91c1c;
  color: #ffffff;
  transform: translateY(-2px);
  box-shadow: 0 6px 16px rgba(220, 38, 38, 0.3);
}
.bom-table-wrapper {
  background: #ffffff;
  border-radius: 14px;
  border: 1px solid #e2e8f0;
  overflow: hidden;
  box-shadow: 0 4px 16px rgba(0,0,0,0.03);
}
.bom-table {
  margin-bottom: 0;
}
.bom-table thead th {
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
.bom-table tbody td {
  padding: 14px 16px;
  vertical-align: middle;
  font-size: 0.92rem;
  color: #334155;
  border-color: #f1f5f9;
}
.bom-table tbody tr:nth-of-type(even) {
  background-color: #f8fafc;
}
.bom-table tbody tr:hover {
  background-color: #f1f5f9;
}
.bom-statute-badge {
  display: inline-block;
  padding: 3px 10px;
  background: #e2e8f0;
  color: #475569;
  font-size: 0.8rem;
  font-weight: 600;
  border-radius: 6px;
  font-family: monospace;
}
.bom-role-pill {
  display: inline-flex;
  align-items: center;
  gap: 5px;
  padding: 4px 12px;
  border-radius: 50px;
  font-size: 0.82rem;
  font-weight: 600;
}
.bom-role-vc { background: #e0f2fe; color: #0369a1; border: 1px solid #bae6fd; }
.bom-role-sponsor { background: #e0e7ff; color: #3730a3; border: 1px solid #c7d2fe; }
.bom-role-prof { background: #ccfbf1; color: #115e59; border: 1px solid #99f6e4; }
.bom-role-teacher { background: #d1fae5; color: #065f46; border: 1px solid #a7f3d0; }
.bom-role-registrar { background: #f3e8ff; color: #6b21a8; border: 1px solid #e9d5ff; }
</style>

<section class="subpage-main-section bom-page-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        
        <!-- Main Card Wrapper -->
        <div class="bom-main-card mb-4">
          
          <!-- Banner Header -->
          <div class="bom-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge bg-info text-dark fw-bold uppercase mb-2 px-3 py-2 rounded-pill">
                <i class="fa-solid fa-users-gear me-1"></i> Executive Board
              </span>
              <h3 class="fw-bold text-white mb-0 fs-3">BOARD OF MANAGEMENT OF THE UNIVERSITY</h3>
            </div>
            <div>
              <a href="<?php echo BASE_URL; ?>assets/pdf/BOM_14062024_0501.pdf" target="_blank" rel="noopener" class="bom-pdf-btn">
                <i class="fa-solid fa-file-pdf fs-5"></i>
                <span>Download Official Document (PDF)</span>
              </a>
            </div>
          </div>

          <!-- Body Container -->
          <div class="p-4">
            
            <!-- Statutory Notification Text -->
            <div class="bom-notification-box">
              <div class="d-flex align-items-start gap-3">
                <div class="text-primary fs-4 mt-1">
                  <i class="fa-solid fa-circle-info"></i>
                </div>
                <div>
                  <h6 class="fw-bold text-dark mb-1">Statutory Constitution &amp; Authority</h6>
                  <p class="mb-0 text-justify">
                    As per <strong>Niji Vishwavidyalaya (Sthapana &amp; Sanchalan) Act 23(1)</strong> and university <strong>Statute-10 of 2014</strong>, the Board of Management of <strong>Sri Satya Sai University of Technology and Medical Sciences, Sehore</strong>, comprises of the following members:
                  </p>
                </div>
              </div>
            </div>

            <!-- Responsive Members Table -->
            <div class="bom-table-wrapper table-responsive">
              <table class="table bom-table align-middle">
                <thead>
                  <tr>
                    <th class="text-center" style="width: 70px;">S. No.</th>
                    <th style="width: 140px;">Statute Ref.</th>
                    <th style="width: 200px;">Name</th>
                    <th style="width: 240px;">Profession / Capacity</th>
                    <th>Full Postal Address</th>
                  </tr>
                </thead>
                <tbody>
                  
                  <!-- Member 1 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">1</td>
                    <td><span class="bom-statute-badge">10(2)(i)</span></td>
                    <td><strong class="text-dark">Dr. Mukesh Tiwari</strong></td>
                    <td>
                      <span class="bom-role-pill bom-role-vc">
                        <i class="fa-solid fa-user-graduate me-1"></i> Vice Chancellor &amp; Ex Officio Chairman
                      </span>
                    </td>
                    <td>123 Amrit Enclave, Ayodhya By Pass Road, Bhopal (MP)</td>
                  </tr>

                  <!-- Member 2 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">2</td>
                    <td><span class="bom-statute-badge">10(2)(ii)</span></td>
                    <td><strong class="text-dark">Dr. Sunil Patil</strong></td>
                    <td>
                      <span class="bom-role-pill bom-role-sponsor">
                        <i class="fa-solid fa-building me-1"></i> Nominee of Sponsoring Body, Member
                      </span>
                    </td>
                    <td>E-17, Sector-3, Katara Hills Bhopal (MP)</td>
                  </tr>

                  <!-- Member 3 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">3</td>
                    <td><span class="bom-statute-badge">10(2)(ii)</span></td>
                    <td><strong class="text-dark">Mr. Anoop Singh</strong></td>
                    <td>
                      <span class="bom-role-pill bom-role-prof">
                        <i class="fa-solid fa-chalkboard-user me-1"></i> Senior most Professor - Member
                      </span>
                    </td>
                    <td>H S 319 Naya Basera, Kotra Sultanabad Road, Bhopal (MP)</td>
                  </tr>

                  <!-- Member 4 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">4</td>
                    <td><span class="bom-statute-badge">10(2)(iv)</span></td>
                    <td><strong class="text-dark">Dr. Neelam Khare</strong></td>
                    <td>
                      <span class="bom-role-pill bom-role-prof">
                        <i class="fa-solid fa-chalkboard-user me-1"></i> Senior most Professor - Member
                      </span>
                    </td>
                    <td>Manglam Enclave, lal Ghati Bhopal</td>
                  </tr>

                  <!-- Member 5 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">5</td>
                    <td><span class="bom-statute-badge">10(2)(iv)</span></td>
                    <td><strong class="text-dark">Ms. Alka Thakur</strong></td>
                    <td>
                      <span class="bom-role-pill bom-role-prof">
                        <i class="fa-solid fa-chalkboard-user me-1"></i> Senior most Professor - Member
                      </span>
                    </td>
                    <td>41/1, 42/3 Barkhedi kalan Bhadbhada, Road, Bhopal</td>
                  </tr>

                  <!-- Member 6 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">6</td>
                    <td><span class="bom-statute-badge">10(2)(iv)</span></td>
                    <td><strong class="text-dark">Mrs. Priyanka Jhawar</strong></td>
                    <td>
                      <span class="bom-role-pill bom-role-teacher">
                        <i class="fa-solid fa-person-chalkboard me-1"></i> Senior most Teacher - Member
                      </span>
                    </td>
                    <td>Nalanda School Road, Chankyapuri, Sehore</td>
                  </tr>

                  <!-- Member 7 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">7</td>
                    <td><span class="bom-statute-badge">10(2)(v)</span></td>
                    <td><strong class="text-dark">Dr. Harsh Lohiya</strong></td>
                    <td>
                      <span class="bom-role-pill bom-role-teacher">
                        <i class="fa-solid fa-person-chalkboard me-1"></i> Senior most Teacher - Member
                      </span>
                    </td>
                    <td>Shiv kripa, Sugar factory chouraha in front of mata mandir, Sehore</td>
                  </tr>

                  <!-- Member 8 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">8</td>
                    <td><span class="bom-statute-badge">10(2)(vi)</span></td>
                    <td><strong class="text-dark">Dr. Hemant Sharma</strong></td>
                    <td>
                      <span class="bom-role-pill bom-role-registrar">
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