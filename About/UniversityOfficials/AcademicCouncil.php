<?php
$page_title = 'Academic Council - SSSUTMS';
$banner_title = 'Academic Council';
$banner_category = 'About';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
.ac-page-section {
  background-color: #f8fafc;
}
.ac-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
  overflow: hidden;
}
.ac-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2rem;
  position: relative;
}
.ac-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #059669, #10b981);
}
.ac-notification-box {
  background: #f8fafc;
  border-left: 4px solid #0b2545;
  border-radius: 12px;
  padding: 1.25rem 1.5rem;
  margin-bottom: 1.5rem;
  box-shadow: 0 2px 10px rgba(0,0,0,0.02);
}
.ac-notification-box p {
  font-size: 0.95rem;
  line-height: 1.65;
  color: #334155;
}
.ac-table-wrapper {
  background: #ffffff;
  border-radius: 14px;
  border: 1px solid #e2e8f0;
  overflow: hidden;
  box-shadow: 0 4px 16px rgba(0,0,0,0.03);
}
.ac-table {
  margin-bottom: 0;
}
.ac-table thead th {
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
.ac-table tbody td {
  padding: 14px 16px;
  vertical-align: middle;
  font-size: 0.92rem;
  color: #334155;
  border-color: #f1f5f9;
}
.ac-table tbody tr:nth-of-type(even) {
  background-color: #f8fafc;
}
.ac-table tbody tr:hover {
  background-color: #f1f5f9;
}
.ac-statute-badge {
  display: inline-block;
  padding: 3px 10px;
  background: #e2e8f0;
  color: #475569;
  font-size: 0.8rem;
  font-weight: 600;
  border-radius: 6px;
  font-family: monospace;
}
.ac-role-pill {
  display: inline-flex;
  align-items: center;
  gap: 5px;
  padding: 4px 12px;
  border-radius: 50px;
  font-size: 0.82rem;
  font-weight: 600;
}
.ac-role-vc { background: #e0f2fe; color: #0369a1; border: 1px solid #bae6fd; }
.ac-role-registrar { background: #f3e8ff; color: #6b21a8; border: 1px solid #e9d5ff; }
.ac-role-dean { background: #fef3c7; color: #92400e; border: 1px solid #fde68a; }
.ac-role-prof { background: #ccfbf1; color: #115e59; border: 1px solid #99f6e4; }
.ac-role-external { background: #d1fae5; color: #065f46; border: 1px solid #a7f3d0; }
</style>

<section class="subpage-main-section ac-page-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        
        <!-- Main Card Wrapper -->
        <div class="ac-main-card mb-4">
          
          <!-- Banner Header -->
          <div class="ac-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge bg-success text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill">
                <i class="fa-solid fa-graduation-cap me-1"></i> Academic Decision Authority
              </span>
              <h3 class="fw-bold text-white mb-0 fs-3">CONSTITUTION OF ACADEMIC COUNCIL OF SSSUTMS</h3>
            </div>
          </div>

          <!-- Body Container -->
          <div class="p-4">
            
            <!-- Statutory Notification Text -->
            <div class="ac-notification-box">
              <div class="d-flex align-items-start gap-3">
                <div class="text-primary fs-4 mt-1">
                  <i class="fa-solid fa-circle-info"></i>
                </div>
                <div>
                  <h6 class="fw-bold text-dark mb-1">Statutory Ordinance &amp; Authority</h6>
                  <p class="mb-0 text-justify">
                    As per <strong>Niji Vishwavidyalaya (Sthapana &amp; Sanchalan) act 2007 para 21 (1) (C)</strong> and <strong>University Statute 11 of 2014</strong>, the Academic Council of <strong>Sri Satya Sai University of Technology &amp; Medical Sciences, Sehore</strong>, presently comprises of the following members:
                  </p>
                </div>
              </div>
            </div>

            <!-- Responsive Members Table -->
            <div class="ac-table-wrapper table-responsive">
              <table class="table ac-table align-middle">
                <thead>
                  <tr>
                    <th class="text-center" style="width: 70px;">S. No.</th>
                    <th style="width: 130px;">Statute Ref.</th>
                    <th style="width: 240px;">Name &amp; Address</th>
                    <th>Profession / Capacity</th>
                  </tr>
                </thead>
                <tbody>
                  
                  <!-- Member 1 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">1</td>
                    <td><span class="ac-statute-badge">11(2) (a)</span></td>
                    <td><strong class="text-dark fs-6">Dr. Mukesh Tiwari</strong></td>
                    <td>
                      <span class="ac-role-pill ac-role-vc">
                        <i class="fa-solid fa-user-graduate me-1"></i> The Vice Chancellor &amp; Chairman
                      </span>
                    </td>
                  </tr>

                  <!-- Member 2 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">2</td>
                    <td><span class="ac-statute-badge">11(2) (b)</span></td>
                    <td><strong class="text-dark fs-6">Dr. H.K. Sharma</strong></td>
                    <td>
                      <span class="ac-role-pill ac-role-registrar">
                        <i class="fa-solid fa-user-gear me-1"></i> Registrar &amp; Member Secretary
                      </span>
                    </td>
                  </tr>

                  <!-- Member 3 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">3</td>
                    <td><span class="ac-statute-badge">11(2) (c)</span></td>
                    <td><strong class="text-dark fs-6">Dr. Neelesh Choubey</strong></td>
                    <td>
                      <span class="ac-role-pill ac-role-dean">
                        <i class="fa-solid fa-prescription-bottle-medical me-1"></i> Dean Pharmacy &amp; Member
                      </span>
                    </td>
                  </tr>

                  <!-- Member 4 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">4</td>
                    <td><span class="ac-statute-badge">11(2) (c)</span></td>
                    <td><strong class="text-dark fs-6">Dr. Rajendra Singh Kushwah</strong></td>
                    <td>
                      <span class="ac-role-pill ac-role-dean">
                        <i class="fa-solid fa-laptop-code me-1"></i> Dean Engineering &amp; Member
                      </span>
                    </td>
                  </tr>

                  <!-- Member 5 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">5</td>
                    <td><span class="ac-statute-badge">11(2) (c)</span></td>
                    <td><strong class="text-dark fs-6">Dr. Kanchan Shrivastav</strong></td>
                    <td>
                      <span class="ac-role-pill ac-role-dean">
                        <i class="fa-solid fa-users me-1"></i> Dean Social Science &amp; Member
                      </span>
                    </td>
                  </tr>

                  <!-- Member 6 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">6</td>
                    <td><span class="ac-statute-badge">11(2) (c)</span></td>
                    <td><strong class="text-dark fs-6">Dr. Sanjay Rathore</strong></td>
                    <td>
                      <span class="ac-role-pill ac-role-dean">
                        <i class="fa-solid fa-atom me-1"></i> Dean Science &amp; Member
                      </span>
                    </td>
                  </tr>

                  <!-- Member 7 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">7</td>
                    <td><span class="ac-statute-badge">11(2) (d)</span></td>
                    <td><strong class="text-dark fs-6">Dr. Shahab Ahmad</strong></td>
                    <td>
                      <span class="ac-role-pill ac-role-prof">
                        <i class="fa-solid fa-chalkboard-user me-1"></i> Senior Professor &amp; Member
                      </span>
                    </td>
                  </tr>

                  <!-- Member 8 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">8</td>
                    <td><span class="ac-statute-badge">11(2) (d)</span></td>
                    <td><strong class="text-dark fs-6">Dr. C.K. Tyagi</strong></td>
                    <td>
                      <span class="ac-role-pill ac-role-prof">
                        <i class="fa-solid fa-chalkboard-user me-1"></i> Senior Professor &amp; Member
                      </span>
                    </td>
                  </tr>

                  <!-- Member 9 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">9</td>
                    <td><span class="ac-statute-badge">11(2) (e)</span></td>
                    <td>
                      <strong class="text-dark fs-6">Prof. Vinod Kumar</strong><br />
                      <small class="text-muted">Zoology Deptt., Delhi University, New Delhi 110007</small><br />
                      <small class="text-primary"><i class="fa-regular fa-envelope me-1"></i>drvkumar11@gmail.com</small>
                    </td>
                    <td>
                      <span class="ac-role-pill ac-role-external">
                        <i class="fa-solid fa-award me-1"></i> Nominated by Chairman MPNVVVA Bhopal
                      </span>
                    </td>
                  </tr>

                  <!-- Member 10 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">10</td>
                    <td><span class="ac-statute-badge">11(2) (f)</span></td>
                    <td>
                      <strong class="text-dark fs-6">Mr. Vikas Chouhan</strong><br />
                      <small class="text-muted">Web Point Solution, S-74, Mata Mandir Market, BDA Complex, Bhopal 462051</small><br />
                      <small class="text-primary"><i class="fa-regular fa-envelope me-1"></i>vikas.ab2002@gmail.com</small>
                    </td>
                    <td>
                      <span class="ac-role-pill ac-role-external">
                        <i class="fa-solid fa-building-columns me-1"></i> Educationist (Nominated by Chancellor)
                      </span>
                    </td>
                  </tr>

                  <!-- Member 11 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">11</td>
                    <td><span class="ac-statute-badge">11(2) (f)</span></td>
                    <td>
                      <strong class="text-dark fs-6">Dr. R.C. Dhawan</strong><br />
                      <small class="text-muted">74 DK Devsthali, E-8 Extension, Arera Colony Bhopal (MP)</small>
                    </td>
                    <td>
                      <span class="ac-role-pill ac-role-external">
                        <i class="fa-solid fa-industry me-1"></i> Industrialist (Nominated by Chancellor)
                      </span>
                    </td>
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