<?php
$page_title = 'Standing Committee - SSSUTMS';
$banner_title = 'Standing Committee';
$banner_category = 'About';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
.sc-page-section {
  background-color: #f8fafc;
}
.sc-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
  overflow: hidden;
}
.sc-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2rem;
  position: relative;
}
.sc-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #ea580c, #f97316);
}
.sc-notification-box {
  background: #f8fafc;
  border-left: 4px solid #0b2545;
  border-radius: 12px;
  padding: 1.25rem 1.5rem;
  margin-bottom: 1.5rem;
  box-shadow: 0 2px 10px rgba(0,0,0,0.02);
}
.sc-notification-box p {
  font-size: 0.95rem;
  line-height: 1.65;
  color: #334155;
}
.sc-table-wrapper {
  background: #ffffff;
  border-radius: 14px;
  border: 1px solid #e2e8f0;
  overflow: hidden;
  box-shadow: 0 4px 16px rgba(0,0,0,0.03);
}
.sc-table {
  margin-bottom: 0;
}
.sc-table thead th {
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
.sc-table tbody td {
  padding: 14px 16px;
  vertical-align: middle;
  font-size: 0.92rem;
  color: #334155;
  border-color: #f1f5f9;
}
.sc-table tbody tr:nth-of-type(even) {
  background-color: #f8fafc;
}
.sc-table tbody tr:hover {
  background-color: #f1f5f9;
}
.sc-role-pill {
  display: inline-flex;
  align-items: center;
  gap: 5px;
  padding: 4px 12px;
  border-radius: 50px;
  font-size: 0.82rem;
  font-weight: 600;
}
.sc-role-vc { background: #e0f2fe; color: #0369a1; border: 1px solid #bae6fd; }
.sc-role-registrar { background: #f3e8ff; color: #6b21a8; border: 1px solid #e9d5ff; }
.sc-role-member { background: #ccfbf1; color: #115e59; border: 1px solid #99f6e4; }
</style>

<section class="subpage-main-section sc-page-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        
        <!-- Main Card Wrapper -->
        <div class="sc-main-card mb-4">
          
          <!-- Banner Header -->
          <div class="sc-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge bg-warning text-dark fw-bold uppercase mb-2 px-3 py-2 rounded-pill">
                <i class="fa-solid fa-users-viewfinder me-1"></i> Executive Administrative Body
              </span>
              <h3 class="fw-bold text-white mb-0 fs-3">STANDING COMMITTEE</h3>
            </div>
          </div>

          <!-- Body Container -->
          <div class="p-4">
            
            <!-- Statutory Notification Text -->
            <div class="sc-notification-box">
              <div class="d-flex align-items-start gap-3">
                <div class="text-primary fs-4 mt-1">
                  <i class="fa-solid fa-circle-info"></i>
                </div>
                <div>
                  <h6 class="fw-bold text-dark mb-1">Statutory Constitution</h6>
                  <p class="mb-0 text-justify">
                    As per <strong>University Statute-13</strong>, the Standing Committee of <strong>Sri Satya Sai University of Technology and Medical Sciences, Sehore</strong>, comprises of the following members:
                  </p>
                </div>
              </div>
            </div>

            <!-- Responsive Members Table -->
            <div class="sc-table-wrapper table-responsive">
              <table class="table sc-table align-middle">
                <thead>
                  <tr>
                    <th class="text-center" style="width: 80px;">S. No.</th>
                    <th style="width: 280px;">Name</th>
                    <th>Profession / Capacity</th>
                  </tr>
                </thead>
                <tbody>
                  
                  <!-- Member 1 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">1</td>
                    <td><strong class="text-dark fs-6">Dr. Mukesh Tiwari</strong></td>
                    <td>
                      <span class="sc-role-pill sc-role-vc">
                        <i class="fa-solid fa-user-graduate me-1"></i> Vice-Chancellor &amp; Chairman
                      </span>
                    </td>
                  </tr>

                  <!-- Member 2 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">2</td>
                    <td><strong class="text-dark fs-6">Dr. Hemant Sharma</strong></td>
                    <td>
                      <span class="sc-role-pill sc-role-registrar">
                        <i class="fa-solid fa-user-gear me-1"></i> Registrar &amp; Member Secretary
                      </span>
                    </td>
                  </tr>

                  <!-- Member 3 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">3</td>
                    <td><strong class="text-dark fs-6">Shri Vimal Nath</strong></td>
                    <td>
                      <span class="sc-role-pill sc-role-member">
                        <i class="fa-solid fa-user-check me-1"></i> Member
                      </span>
                    </td>
                  </tr>

                  <!-- Member 4 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">4</td>
                    <td><strong class="text-dark fs-6">Dr. Neelesh Choubey</strong></td>
                    <td>
                      <span class="sc-role-pill sc-role-member">
                        <i class="fa-solid fa-user-check me-1"></i> Member
                      </span>
                    </td>
                  </tr>

                  <!-- Member 5 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">5</td>
                    <td><strong class="text-dark fs-6">Dr. Minakshi Pathak</strong></td>
                    <td>
                      <span class="sc-role-pill sc-role-member">
                        <i class="fa-solid fa-user-check me-1"></i> Member
                      </span>
                    </td>
                  </tr>

                  <!-- Member 6 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">6</td>
                    <td><strong class="text-dark fs-6">Dr. Kanchan Shrivastave</strong></td>
                    <td>
                      <span class="sc-role-pill sc-role-member">
                        <i class="fa-solid fa-user-check me-1"></i> Member
                      </span>
                    </td>
                  </tr>

                  <!-- Member 7 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">7</td>
                    <td><strong class="text-dark fs-6">Dr. Sanjay Rathore</strong></td>
                    <td>
                      <span class="sc-role-pill sc-role-member">
                        <i class="fa-solid fa-user-check me-1"></i> Member
                      </span>
                    </td>
                  </tr>

                  <!-- Member 8 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">8</td>
                    <td><strong class="text-dark fs-6">Dr. Rajendra Singh Kushwah</strong></td>
                    <td>
                      <span class="sc-role-pill sc-role-member">
                        <i class="fa-solid fa-user-check me-1"></i> Member
                      </span>
                    </td>
                  </tr>

                  <!-- Member 9 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">9</td>
                    <td><strong class="text-dark fs-6">Mr. Narendra Sharma</strong></td>
                    <td>
                      <span class="sc-role-pill sc-role-member">
                        <i class="fa-solid fa-user-check me-1"></i> Member
                      </span>
                    </td>
                  </tr>

                  <!-- Member 10 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">10</td>
                    <td><strong class="text-dark fs-6">Dr. Syed Shahab Ahmed</strong></td>
                    <td>
                      <span class="sc-role-pill sc-role-member">
                        <i class="fa-solid fa-user-check me-1"></i> Member
                      </span>
                    </td>
                  </tr>

                  <!-- Member 11 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">11</td>
                    <td><strong class="text-dark fs-6">Dr. C.K. Tyagi</strong></td>
                    <td>
                      <span class="sc-role-pill sc-role-member">
                        <i class="fa-solid fa-user-check me-1"></i> Member
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