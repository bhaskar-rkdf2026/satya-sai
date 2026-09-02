<?php
$page_title = 'Finance Committee - SSSUTMS';
$banner_title = 'Finance Committee';
$banner_category = 'About';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
.fc-page-section {
  background-color: #f8fafc;
}
.fc-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
  overflow: hidden;
}
.fc-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2rem;
  position: relative;
}
.fc-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #7c3aed, #a855f7);
}
.fc-table-wrapper {
  background: #ffffff;
  border-radius: 14px;
  border: 1px solid #e2e8f0;
  overflow: hidden;
  box-shadow: 0 4px 16px rgba(0,0,0,0.03);
}
.fc-table {
  margin-bottom: 0;
}
.fc-table thead th {
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
.fc-table tbody td {
  padding: 14px 16px;
  vertical-align: middle;
  font-size: 0.92rem;
  color: #334155;
  border-color: #f1f5f9;
}
.fc-table tbody tr:nth-of-type(even) {
  background-color: #f8fafc;
}
.fc-table tbody tr:hover {
  background-color: #f1f5f9;
}
.fc-role-pill {
  display: inline-flex;
  align-items: center;
  gap: 5px;
  padding: 4px 12px;
  border-radius: 50px;
  font-size: 0.82rem;
  font-weight: 600;
}
.fc-role-chancellor { background: #fef3c7; color: #92400e; border: 1px solid #fde68a; }
.fc-role-vc { background: #e0f2fe; color: #0369a1; border: 1px solid #bae6fd; }
.fc-role-registrar { background: #f3e8ff; color: #6b21a8; border: 1px solid #e9d5ff; }
.fc-role-cfo { background: #fae8ff; color: #86198f; border: 1px solid #f5d0fe; }
.fc-role-gb { background: #d1fae5; color: #065f46; border: 1px solid #a7f3d0; }
.fc-role-sponsor { background: #e0e7ff; color: #3730a3; border: 1px solid #c7d2fe; }

/* Officer Profile Card */
.cfo-profile-card {
  background: #ffffff;
  border-radius: 16px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 4px 20px rgba(15, 23, 42, 0.04);
  overflow: hidden;
}
.cfo-img-container {
  position: relative;
  border-radius: 14px;
  overflow: hidden;
  box-shadow: 0 8px 16px rgba(11, 37, 69, 0.1);
  border: 4px solid #ffffff;
  background: #f1f5f9;
  transition: transform 0.3s ease;
}
.cfo-img-container:hover {
  transform: translateY(-3px);
}
.cfo-img-container img {
  width: 100%;
  max-height: 320px;
  object-fit: cover;
  object-position: top center;
  display: block;
}
.cfo-stat-chip {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 10px;
  padding: 10px 14px;
  display: flex;
  align-items: center;
  gap: 10px;
  height: 100%;
  transition: all 0.2s ease;
}
.cfo-stat-chip:hover {
  background: #ffffff;
  border-color: #cbd5e1;
  box-shadow: 0 4px 12px rgba(0,0,0,0.04);
}
.cfo-stat-icon {
  width: 36px;
  height: 36px;
  border-radius: 8px;
  background: rgba(124, 58, 237, 0.1);
  color: #7c3aed;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1rem;
  flex-shrink: 0;
}
</style>

<section class="subpage-main-section fc-page-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        
        <!-- Main Card Wrapper -->
        <div class="fc-main-card mb-4">
          
          <!-- Banner Header -->
          <div class="fc-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge bg-purple text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background-color: #7c3aed;">
                <i class="fa-solid fa-calculator me-1"></i> Financial Oversight &amp; Audit Body
              </span>
              <h3 class="fw-bold text-white mb-0 fs-3">FINANCE COMMITTEE</h3>
            </div>
          </div>

          <!-- Body Container -->
          <div class="p-4">
            
            <!-- Committee Members Table -->
            <div class="fc-table-wrapper table-responsive mb-4">
              <table class="table fc-table align-middle">
                <thead>
                  <tr>
                    <th class="text-center" style="width: 80px;">S. No.</th>
                    <th style="width: 280px;">Name</th>
                    <th>Profession</th>
                  </tr>
                </thead>
                <tbody>
                  
                  <!-- Member 1 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">1</td>
                    <td><strong class="text-dark fs-6">Mr. Sidharth Kapoor</strong></td>
                    <td>
                      <span class="fc-role-pill fc-role-chancellor">
                        <i class="fa-solid fa-crown me-1"></i> Chancellor
                      </span>
                    </td>
                  </tr>

                  <!-- Member 2 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">2</td>
                    <td><strong class="text-dark fs-6">Dr. Mukesh Tiwari</strong></td>
                    <td>
                      <span class="fc-role-pill fc-role-vc">
                        <i class="fa-solid fa-user-graduate me-1"></i> Vice-Chancellor
                      </span>
                    </td>
                  </tr>

                  <!-- Member 3 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">3</td>
                    <td><strong class="text-dark fs-6">Dr. Hemant Sharma</strong></td>
                    <td>
                      <span class="fc-role-pill fc-role-registrar">
                        <i class="fa-solid fa-user-gear me-1"></i> Registrar
                      </span>
                    </td>
                  </tr>

                  <!-- Member 4 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">4</td>
                    <td><strong class="text-dark fs-6">Mr. Vimal Nath</strong></td>
                    <td>
                      <span class="fc-role-pill fc-role-cfo">
                        <i class="fa-solid fa-calculator me-1"></i> Chief Finance &amp; Account Officer
                      </span>
                    </td>
                  </tr>

                  <!-- Member 5 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">5</td>
                    <td><strong class="text-dark fs-6">Mr. Vijay Sharda</strong></td>
                    <td>
                      <span class="fc-role-pill fc-role-gb">
                        <i class="fa-solid fa-building-columns me-1"></i> Member of Governing Body
                      </span>
                    </td>
                  </tr>

                  <!-- Member 6 -->
                  <tr>
                    <td class="text-center fw-bold text-dark">6</td>
                    <td><strong class="text-dark fs-6">Ms. Deepika Pathak</strong></td>
                    <td>
                      <span class="fc-role-pill fc-role-sponsor">
                        <i class="fa-solid fa-building me-1"></i> Nominated By Sponsoring Body
                      </span>
                    </td>
                  </tr>

                </tbody>
              </table>
            </div>

            <!-- Chief Finance & Account Officer Profile Section -->
            <div class="cfo-profile-card p-4">
              <div class="row g-4 align-items-center">
                
                <!-- Officer Image -->
                <div class="col-md-5 col-lg-4 text-center">
                  <div class="cfo-img-container mb-3">
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/cfa_vimal_nath.png" target="_blank" rel="noopener" title="Click to view full image">
                      <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/cfa_vimal_nath.png" alt="Mr. Vimal Nath - Chief Finance & Account Officer, SSSUTMS" class="img-fluid" />
                    </a>
                  </div>
                </div>

                <!-- Officer Overview & Bio -->
                <div class="col-md-7 col-lg-8">
                  <div class="ps-md-2">
                    <h4 class="fw-bold text-dark mb-1">Mr. Vimal Nath</h4>
                    <p class="fs-6 fw-semibold text-purple mb-3" style="color: #7c3aed;">Chief Finance &amp; Account Officer</p>

                    <!-- Stat Chips -->
                    <div class="row g-2 align-items-stretch mb-3">
                      <div class="col-sm-6">
                        <div class="cfo-stat-chip h-100">
                          <div class="cfo-stat-icon">
                            <i class="fa-solid fa-briefcase"></i>
                          </div>
                          <div>
                            <div class="fw-bold text-dark small">Experience</div>
                            <div class="text-muted extra-small" style="font-size: 0.8rem;">25+ Years Financial Management</div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="cfo-stat-chip h-100">
                          <div class="cfo-stat-icon">
                            <i class="fa-solid fa-chart-line"></i>
                          </div>
                          <div>
                            <div class="fw-bold text-dark small">Expertise</div>
                            <div class="text-muted extra-small" style="font-size: 0.8rem;">Budgeting &amp; Strategic Planning</div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Profile Bio Paragraph -->
                    <p class="text-secondary small lh-base text-justify mb-0">
                      <strong>Mr. Vimal Nath</strong> is a highly skilled Finance Controller with over 25 years of experience in managing financial operations and strategic financial planning. Known for her strong analytical abilities, she has a proven track record in driving financial performance, improving internal controls, and ensuring compliance with financial regulations. With expertise in budgeting, forecasting, and financial reporting, <strong>Mr. Vimal Nath</strong> is adept at optimizing operational efficiencies, streamlining financial processes, and guiding senior management in making data-driven financial decisions.
                    </p>

                  </div>
                </div>

              </div>
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