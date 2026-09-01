<?php
$page_title = 'Dean / Principal - SSSUTMS';
$banner_title = 'Dean / Principal';
$banner_category = 'About';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
.dean-page-section {
  background-color: #f8fafc;
}
.dean-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
  overflow: hidden;
}
.dean-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2rem;
  position: relative;
}
.dean-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #06b6d4, #0891b2);
}
.dean-table-wrapper {
  background: #ffffff;
  border-radius: 14px;
  border: 1px solid #e2e8f0;
  overflow: hidden;
  box-shadow: 0 4px 16px rgba(0,0,0,0.03);
}
.dean-table {
  margin-bottom: 0;
}
.dean-table thead th {
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
.dean-table tbody td {
  padding: 14px 16px;
  vertical-align: middle;
  font-size: 0.92rem;
  color: #334155;
  border-color: #f1f5f9;
}
.dean-table tbody tr:nth-of-type(even) {
  background-color: #f8fafc;
}
.dean-table tbody tr:hover {
  background-color: #f1f5f9;
}
.dean-inst-pill {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  font-weight: 600;
  color: #0f172a;
}
.dean-inst-icon {
  width: 32px;
  height: 32px;
  border-radius: 8px;
  background: rgba(6, 182, 212, 0.1);
  color: #0891b2;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 0.95rem;
  flex-shrink: 0;
}
.dean-name-badge {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  padding: 4px 14px;
  background: #e0f2fe;
  color: #0369a1;
  border: 1px solid #bae6fd;
  border-radius: 50px;
  font-weight: 600;
  font-size: 0.88rem;
}
</style>

<section class="subpage-main-section dean-page-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        
        <!-- Main Card Wrapper -->
        <div class="dean-main-card mb-4">
          
          <!-- Banner Header -->
          <div class="dean-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge bg-info text-dark fw-bold uppercase mb-2 px-3 py-2 rounded-pill">
                <i class="fa-solid fa-graduation-cap me-1"></i> Academic Leadership
              </span>
              <h3 class="fw-bold text-white mb-0 fs-3">DEAN / PRINCIPAL OF UNIVERSITY</h3>
            </div>
          </div>

          <!-- Body Container -->
          <div class="p-4">
            
            <!-- Table Wrapper -->
            <div class="dean-table-wrapper table-responsive">
              <table class="table dean-table align-middle">
                <thead>
                  <tr>
                    <th class="text-center" style="width: 70px;">S. No.</th>
                    <th style="width: 320px;">Institute / School</th>
                    <th>Dean / Principal</th>
                  </tr>
                </thead>
                <tbody>
                  
                  <!-- Entry 1 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">1</td>
                    <td>
                      <div class="dean-inst-pill">
                        <div class="dean-inst-icon"><i class="fa-solid fa-laptop-code"></i></div>
                        <span>School of Engineering</span>
                      </div>
                    </td>
                    <td>
                      <span class="dean-name-badge">
                        <i class="fa-solid fa-user-graduate me-1"></i> Dr. Rajendra Singh Kushwah
                      </span>
                    </td>
                  </tr>

                  <!-- Entry 2 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">2</td>
                    <td>
                      <div class="dean-inst-pill">
                        <div class="dean-inst-icon"><i class="fa-solid fa-prescription-bottle-medical"></i></div>
                        <span>Faculty of Pharmacy</span>
                      </div>
                    </td>
                    <td>
                      <span class="dean-name-badge">
                        <i class="fa-solid fa-user-graduate me-1"></i> Dr. Neelesh Chaubey
                      </span>
                    </td>
                  </tr>

                  <!-- Entry 3 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">3</td>
                    <td>
                      <div class="dean-inst-pill">
                        <div class="dean-inst-icon"><i class="fa-solid fa-chart-line"></i></div>
                        <span>School of Management Studies</span>
                      </div>
                    </td>
                    <td>
                      <span class="dean-name-badge">
                        <i class="fa-solid fa-user-graduate me-1"></i> Dr. Rajesh Sharma
                      </span>
                    </td>
                  </tr>

                  <!-- Entry 4 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">4</td>
                    <td>
                      <div class="dean-inst-pill">
                        <div class="dean-inst-icon"><i class="fa-solid fa-network-wired"></i></div>
                        <span>School of Computer Application</span>
                      </div>
                    </td>
                    <td>
                      <span class="dean-name-badge">
                        <i class="fa-solid fa-user-graduate me-1"></i> Dr. Jitendra Sheetlani
                      </span>
                    </td>
                  </tr>

                  <!-- Entry 5 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">5</td>
                    <td>
                      <div class="dean-inst-pill">
                        <div class="dean-inst-icon"><i class="fa-solid fa-utensils"></i></div>
                        <span>School of Hotel Management</span>
                      </div>
                    </td>
                    <td>
                      <span class="dean-name-badge">
                        <i class="fa-solid fa-user-graduate me-1"></i> Dr. S. Shahab Ahmed
                      </span>
                    </td>
                  </tr>

                  <!-- Entry 6 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">6</td>
                    <td>
                      <div class="dean-inst-pill">
                        <div class="dean-inst-icon"><i class="fa-solid fa-person-chalkboard"></i></div>
                        <span>Faculty of Education</span>
                      </div>
                    </td>
                    <td>
                      <span class="dean-name-badge">
                        <i class="fa-solid fa-user-graduate me-1"></i> Dr. Meenakshi Pathak
                      </span>
                    </td>
                  </tr>

                  <!-- Entry 7 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">7</td>
                    <td>
                      <div class="dean-inst-pill">
                        <div class="dean-inst-icon"><i class="fa-solid fa-scale-balanced"></i></div>
                        <span>School of LAW</span>
                      </div>
                    </td>
                    <td>
                      <span class="dean-name-badge">
                        <i class="fa-solid fa-user-graduate me-1"></i> Dr. Bharat Pal
                      </span>
                    </td>
                  </tr>

                  <!-- Entry 8 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">8</td>
                    <td>
                      <div class="dean-inst-pill">
                        <div class="dean-inst-icon"><i class="fa-solid fa-notes-medical"></i></div>
                        <span>School of Homeopathy</span>
                      </div>
                    </td>
                    <td>
                      <span class="dean-name-badge">
                        <i class="fa-solid fa-user-graduate me-1"></i> Dr. Umesh Pandey
                      </span>
                    </td>
                  </tr>

                  <!-- Entry 9 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">9</td>
                    <td>
                      <div class="dean-inst-pill">
                        <div class="dean-inst-icon"><i class="fa-solid fa-gears"></i></div>
                        <span>Polytechnic (Engineering)</span>
                      </div>
                    </td>
                    <td>
                      <span class="dean-name-badge">
                        <i class="fa-solid fa-user-graduate me-1"></i> Mrs. Priyanka Jhawar
                      </span>
                    </td>
                  </tr>

                  <!-- Entry 10 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">10</td>
                    <td>
                      <div class="dean-inst-pill">
                        <div class="dean-inst-icon"><i class="fa-solid fa-heart-pulse"></i></div>
                        <span>School of Paramedical</span>
                      </div>
                    </td>
                    <td>
                      <span class="dean-name-badge">
                        <i class="fa-solid fa-user-graduate me-1"></i> Dr. Sunil Man
                      </span>
                    </td>
                  </tr>

                  <!-- Entry 11 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">11</td>
                    <td>
                      <div class="dean-inst-pill">
                        <div class="dean-inst-icon"><i class="fa-solid fa-pen-ruler"></i></div>
                        <span>School of Design</span>
                      </div>
                    </td>
                    <td>
                      <span class="dean-name-badge">
                        <i class="fa-solid fa-user-graduate me-1"></i> Ar. G.Venkatesh
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