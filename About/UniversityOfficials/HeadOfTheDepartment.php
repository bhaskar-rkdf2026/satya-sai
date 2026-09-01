<?php
$page_title = 'Head of Department - SSSUTMS';
$banner_title = 'Head of Department';
$banner_category = 'About';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
.hod-page-section {
  background-color: #f8fafc;
}
.hod-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
  overflow: hidden;
}
.hod-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2rem;
  position: relative;
}
.hod-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #059669, #10b981);
}
.hod-table-wrapper {
  background: #ffffff;
  border-radius: 14px;
  border: 1px solid #e2e8f0;
  overflow: hidden;
  box-shadow: 0 4px 16px rgba(0,0,0,0.03);
}
.hod-table {
  margin-bottom: 0;
}
.hod-table thead th {
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
.hod-table tbody td {
  padding: 14px 16px;
  vertical-align: middle;
  font-size: 0.92rem;
  color: #334155;
  border-color: #f1f5f9;
}
.hod-table tbody tr:nth-of-type(even) {
  background-color: #f8fafc;
}
.hod-table tbody tr:hover {
  background-color: #f1f5f9;
}
.hod-dept-pill {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  font-weight: 600;
  color: #0f172a;
}
.hod-dept-icon {
  width: 32px;
  height: 32px;
  border-radius: 8px;
  background: rgba(5, 150, 105, 0.1);
  color: #059669;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 0.95rem;
  flex-shrink: 0;
}
.hod-name-badge {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  padding: 4px 14px;
  background: #d1fae5;
  color: #065f46;
  border: 1px solid #a7f3d0;
  border-radius: 50px;
  font-weight: 600;
  font-size: 0.88rem;
}
</style>

<section class="subpage-main-section hod-page-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        
        <!-- Main Card Wrapper -->
        <div class="hod-main-card mb-4">
          
          <!-- Banner Header -->
          <div class="hod-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge bg-success text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill">
                <i class="fa-solid fa-user-tie me-1"></i> Departmental Heads
              </span>
              <h3 class="fw-bold text-white mb-0 fs-3">HEADS OF DEPARTMENTS (HODs)</h3>
            </div>
          </div>

          <!-- Body Container -->
          <div class="p-4">
            
            <!-- Table Wrapper -->
            <div class="hod-table-wrapper table-responsive">
              <table class="table hod-table align-middle">
                <thead>
                  <tr>
                    <th class="text-center" style="width: 70px;">S. No.</th>
                    <th style="width: 340px;">Department</th>
                    <th>Head of Department</th>
                  </tr>
                </thead>
                <tbody>
                  
                  <!-- Entry 1 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">1</td>
                    <td>
                      <div class="hod-dept-pill">
                        <div class="hod-dept-icon"><i class="fa-solid fa-plane-departure"></i></div>
                        <span>Aeronautical Engineering</span>
                      </div>
                    </td>
                    <td>
                      <span class="hod-name-badge">
                        <i class="fa-solid fa-user-check me-1"></i> Dr. Prashant Singh
                      </span>
                    </td>
                  </tr>

                  <!-- Entry 2 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">2</td>
                    <td>
                      <div class="hod-dept-pill">
                        <div class="hod-dept-icon"><i class="fa-solid fa-flask"></i></div>
                        <span>Applied Sciences</span>
                      </div>
                    </td>
                    <td>
                      <span class="hod-name-badge">
                        <i class="fa-solid fa-user-check me-1"></i> Dr. Geeta Khoobchandani
                      </span>
                    </td>
                  </tr>

                  <!-- Entry 3 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">3</td>
                    <td>
                      <div class="hod-dept-pill">
                        <div class="hod-dept-icon"><i class="fa-solid fa-vial"></i></div>
                        <span>Chemical Engineering</span>
                      </div>
                    </td>
                    <td>
                      <span class="hod-name-badge">
                        <i class="fa-solid fa-user-check me-1"></i> Dr. Anuradha Devi
                      </span>
                    </td>
                  </tr>

                  <!-- Entry 4 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">4</td>
                    <td>
                      <div class="hod-dept-pill">
                        <div class="hod-dept-icon"><i class="fa-solid fa-building-user"></i></div>
                        <span>Civil Engineering</span>
                      </div>
                    </td>
                    <td>
                      <span class="hod-name-badge">
                        <i class="fa-solid fa-user-check me-1"></i> Dr. Ajay Swaroop
                      </span>
                    </td>
                  </tr>

                  <!-- Entry 5 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">5</td>
                    <td>
                      <div class="hod-dept-pill">
                        <div class="hod-dept-icon"><i class="fa-solid fa-laptop-code"></i></div>
                        <span>Computer Science Engineering</span>
                      </div>
                    </td>
                    <td>
                      <span class="hod-name-badge">
                        <i class="fa-solid fa-user-check me-1"></i> Dr. Rajendra Singh Kushwah
                      </span>
                    </td>
                  </tr>

                  <!-- Entry 6 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">6</td>
                    <td>
                      <div class="hod-dept-pill">
                        <div class="hod-dept-icon"><i class="fa-solid fa-microchip"></i></div>
                        <span>Electronics &amp; Communication Engineering</span>
                      </div>
                    </td>
                    <td>
                      <span class="hod-name-badge">
                        <i class="fa-solid fa-user-check me-1"></i> Dr. Vijay Prakash Singh
                      </span>
                    </td>
                  </tr>

                  <!-- Entry 7 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">7</td>
                    <td>
                      <div class="hod-dept-pill">
                        <div class="hod-dept-icon"><i class="fa-solid fa-bolt"></i></div>
                        <span>Electronics &amp; Electrical Engineering</span>
                      </div>
                    </td>
                    <td>
                      <span class="hod-name-badge">
                        <i class="fa-solid fa-user-check me-1"></i> Dr. Prabodh Khampariya
                      </span>
                    </td>
                  </tr>

                  <!-- Entry 8 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">8</td>
                    <td>
                      <div class="hod-dept-pill">
                        <div class="hod-dept-icon"><i class="fa-solid fa-network-wired"></i></div>
                        <span>Master of Computer Application</span>
                      </div>
                    </td>
                    <td>
                      <span class="hod-name-badge">
                        <i class="fa-solid fa-user-check me-1"></i> Dr. Jitendra Sheetlani
                      </span>
                    </td>
                  </tr>

                  <!-- Entry 9 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">9</td>
                    <td>
                      <div class="hod-dept-pill">
                        <div class="hod-dept-icon"><i class="fa-solid fa-gears"></i></div>
                        <span>Mechanical Engineering</span>
                      </div>
                    </td>
                    <td>
                      <span class="hod-name-badge">
                        <i class="fa-solid fa-user-check me-1"></i> Dr. Rashmi Dwivedi
                      </span>
                    </td>
                  </tr>

                  <!-- Entry 10 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">10</td>
                    <td>
                      <div class="hod-dept-pill">
                        <div class="hod-dept-icon"><i class="fa-solid fa-capsules"></i></div>
                        <span>School of Pharmacy</span>
                      </div>
                    </td>
                    <td>
                      <span class="hod-name-badge">
                        <i class="fa-solid fa-user-check me-1"></i> Dr. Hemant K. Sharma
                      </span>
                    </td>
                  </tr>

                  <!-- Entry 11 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">11</td>
                    <td>
                      <div class="hod-dept-pill">
                        <div class="hod-dept-icon"><i class="fa-solid fa-prescription-bottle-medical"></i></div>
                        <span>College of Pharmacy</span>
                      </div>
                    </td>
                    <td>
                      <span class="hod-name-badge">
                        <i class="fa-solid fa-user-check me-1"></i> Dr. C.K. Tyagi
                      </span>
                    </td>
                  </tr>

                  <!-- Entry 12 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">12</td>
                    <td>
                      <div class="hod-dept-pill">
                        <div class="hod-dept-icon"><i class="fa-solid fa-book-open"></i></div>
                        <span>Education</span>
                      </div>
                    </td>
                    <td>
                      <span class="hod-name-badge">
                        <i class="fa-solid fa-user-check me-1"></i> Dr. Dheeraj Shindey
                      </span>
                    </td>
                  </tr>

                  <!-- Entry 13 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">13</td>
                    <td>
                      <div class="hod-dept-pill">
                        <div class="hod-dept-icon"><i class="fa-solid fa-person-chalkboard"></i></div>
                        <span>Teachers Education</span>
                      </div>
                    </td>
                    <td>
                      <span class="hod-name-badge">
                        <i class="fa-solid fa-user-check me-1"></i> Dr. Neelam Khare
                      </span>
                    </td>
                  </tr>

                  <!-- Entry 14 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">14</td>
                    <td>
                      <div class="hod-dept-pill">
                        <div class="hod-dept-icon"><i class="fa-solid fa-chart-pie"></i></div>
                        <span>Management</span>
                      </div>
                    </td>
                    <td>
                      <span class="hod-name-badge">
                        <i class="fa-solid fa-user-check me-1"></i> Dr. Rajesh Sharma
                      </span>
                    </td>
                  </tr>

                  <!-- Entry 15 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">15</td>
                    <td>
                      <div class="hod-dept-pill">
                        <div class="hod-dept-icon"><i class="fa-solid fa-utensils"></i></div>
                        <span>Hotel &amp; Catering management</span>
                      </div>
                    </td>
                    <td>
                      <span class="hod-name-badge">
                        <i class="fa-solid fa-user-check me-1"></i> Dr. S. Shahab Ahmad
                      </span>
                    </td>
                  </tr>

                  <!-- Entry 16 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">16</td>
                    <td>
                      <div class="hod-dept-pill">
                        <div class="hod-dept-icon"><i class="fa-solid fa-atom"></i></div>
                        <span>Faculty Of Science</span>
                      </div>
                    </td>
                    <td>
                      <span class="hod-name-badge">
                        <i class="fa-solid fa-user-check me-1"></i> Dr. Sanjay Rathore
                      </span>
                    </td>
                  </tr>

                  <!-- Entry 18 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">18</td>
                    <td>
                      <div class="hod-dept-pill">
                        <div class="hod-dept-icon"><i class="fa-solid fa-users"></i></div>
                        <span>Faculty of Humanities and Social Sciences</span>
                      </div>
                    </td>
                    <td>
                      <span class="hod-name-badge">
                        <i class="fa-solid fa-user-check me-1"></i> Dr. Kanchan Shrivastava
                      </span>
                    </td>
                  </tr>

                  <!-- Entry 19 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">19</td>
                    <td>
                      <div class="hod-dept-pill">
                        <div class="hod-dept-icon"><i class="fa-solid fa-briefcase"></i></div>
                        <span>Faculty of Commerce and Management</span>
                      </div>
                    </td>
                    <td>
                      <span class="hod-name-badge">
                        <i class="fa-solid fa-user-check me-1"></i> Dr. Gajraj Singh
                      </span>
                    </td>
                  </tr>

                  <!-- Entry 20 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">20</td>
                    <td>
                      <div class="hod-dept-pill">
                        <div class="hod-dept-icon"><i class="fa-solid fa-dumbbell"></i></div>
                        <span>Physical Education</span>
                      </div>
                    </td>
                    <td>
                      <span class="hod-name-badge">
                        <i class="fa-solid fa-user-check me-1"></i> Dr. Meenakshi Pathak
                      </span>
                    </td>
                  </tr>

                  <!-- Entry 21 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">21</td>
                    <td>
                      <div class="hod-dept-pill">
                        <div class="hod-dept-icon"><i class="fa-solid fa-scale-balanced"></i></div>
                        <span>LAW</span>
                      </div>
                    </td>
                    <td>
                      <span class="hod-name-badge">
                        <i class="fa-solid fa-user-check me-1"></i> Dr. Amrita Soni
                      </span>
                    </td>
                  </tr>

                  <!-- Entry 22 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">22</td>
                    <td>
                      <div class="hod-dept-pill">
                        <div class="hod-dept-icon"><i class="fa-solid fa-compass-drafting"></i></div>
                        <span>Polytechnic (Engineering)</span>
                      </div>
                    </td>
                    <td>
                      <span class="hod-name-badge">
                        <i class="fa-solid fa-user-check me-1"></i> Ms. Priyanka Jhawar
                      </span>
                    </td>
                  </tr>

                  <!-- Entry 23 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">23</td>
                    <td>
                      <div class="hod-dept-pill">
                        <div class="hod-dept-icon"><i class="fa-solid fa-leaf"></i></div>
                        <span>Ayurveda</span>
                      </div>
                    </td>
                    <td>
                      <span class="hod-name-badge">
                        <i class="fa-solid fa-user-check me-1"></i> Dr. Arun Wankhede
                      </span>
                    </td>
                  </tr>

                  <!-- Entry 24 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">24</td>
                    <td>
                      <div class="hod-dept-pill">
                        <div class="hod-dept-icon"><i class="fa-solid fa-mortar-pestle"></i></div>
                        <span>Homoeopathy</span>
                      </div>
                    </td>
                    <td>
                      <span class="hod-name-badge">
                        <i class="fa-solid fa-user-check me-1"></i> Dr. Umesh Pandey
                      </span>
                    </td>
                  </tr>

                  <!-- Entry 25 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">25</td>
                    <td>
                      <div class="hod-dept-pill">
                        <div class="hod-dept-icon"><i class="fa-solid fa-user-nurse"></i></div>
                        <span>Nursing</span>
                      </div>
                    </td>
                    <td>
                      <span class="hod-name-badge">
                        <i class="fa-solid fa-user-check me-1"></i> Dr. Manjulata Tripathi
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