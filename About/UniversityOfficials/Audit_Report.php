<?php
$page_title = 'Audit Report - SSSUTMS';
$banner_title = 'Audit Report';
$banner_category = 'About';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
.ar-page-section {
  background-color: #f8fafc;
}
.ar-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
  overflow: hidden;
}
.ar-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2rem;
  position: relative;
}
.ar-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #059669, #10b981);
}
.ar-table-wrapper {
  background: #ffffff;
  border-radius: 14px;
  border: 1px solid #e2e8f0;
  overflow: hidden;
  box-shadow: 0 4px 16px rgba(0,0,0,0.03);
}
.ar-table {
  margin-bottom: 0;
}
.ar-table thead th {
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
.ar-table tbody td {
  padding: 16px;
  vertical-align: middle;
  font-size: 0.95rem;
  color: #334155;
  border-color: #f1f5f9;
}
.ar-table tbody tr:nth-of-type(even) {
  background-color: #f8fafc;
}
.ar-table tbody tr:hover {
  background-color: #f1f5f9;
}
.ar-year-badge {
  display: inline-block;
  padding: 6px 14px;
  background: #0b2545;
  color: #ffffff;
  font-size: 0.9rem;
  font-weight: 700;
  border-radius: 8px;
}
.ar-pdf-btn-red {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 8px 16px;
  background: #dc2626;
  color: #ffffff;
  font-weight: 600;
  font-size: 0.85rem;
  border-radius: 8px;
  text-decoration: none;
  transition: all 0.2s ease;
  box-shadow: 0 2px 8px rgba(220, 38, 38, 0.2);
}
.ar-pdf-btn-red:hover {
  background: #b91c1c;
  color: #ffffff;
  transform: translateY(-2px);
  box-shadow: 0 4px 12px rgba(220, 38, 38, 0.3);
}
.ar-pdf-btn-blue {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 8px 16px;
  background: #2563eb;
  color: #ffffff;
  font-weight: 600;
  font-size: 0.85rem;
  border-radius: 8px;
  text-decoration: none;
  transition: all 0.2s ease;
  box-shadow: 0 2px 8px rgba(37, 99, 235, 0.2);
}
.ar-pdf-btn-blue:hover {
  background: #1d4ed8;
  color: #ffffff;
  transform: translateY(-2px);
  box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
}
</style>

<section class="subpage-main-section ar-page-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        
        <!-- Main Card Wrapper -->
        <div class="ar-main-card mb-4">
          
          <!-- Banner Header -->
          <div class="ar-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge bg-success text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill">
                <i class="fa-solid fa-file-invoice-dollar me-1"></i> Public Financial Disclosure
              </span>
              <h3 class="fw-bold text-white mb-0 fs-3">ANNUAL AUDIT REPORTS &amp; BALANCE SHEETS</h3>
            </div>
          </div>

          <!-- Body Container -->
          <div class="p-4">
            
            <!-- Table Wrapper -->
            <div class="ar-table-wrapper table-responsive">
              <table class="table ar-table align-middle">
                <thead>
                  <tr>
                    <th class="text-center" style="width: 140px;">Academic Year</th>
                    <th class="text-center" style="width: 250px;">Audit Report (PDF)</th>
                    <th class="text-center">Balance Sheet (PDF)</th>
                  </tr>
                </thead>
                <tbody>
                  
                  <!-- Row 2023-24 -->
                  <tr>
                    <td class="text-center">
                      <span class="ar-year-badge">2023-24</span>
                    </td>
                    <td class="text-center">
                      <a href="https://www.sssutms.co.in/cms/Areas/Website/Files/Link/About/University Officials/AUDIT REPORT 2023-24.pdf" target="_blank" rel="noopener" class="ar-pdf-btn-red">
                        <i class="fa-solid fa-file-pdf fs-6"></i>
                        <span>Audit Report 2023-24</span>
                      </a>
                    </td>
                    <td class="text-center">
                      <a href="https://www.sssutms.co.in/cms/Areas/Website/Files/Link/About/University Officials/BALANCE SHEET 2023-24.pdf" target="_blank" rel="noopener" class="ar-pdf-btn-blue">
                        <i class="fa-solid fa-file-pdf fs-6"></i>
                        <span>Balance Sheet 2023-24</span>
                      </a>
                    </td>
                  </tr>

                  <!-- Row 2022-23 -->
                  <tr>
                    <td class="text-center">
                      <span class="ar-year-badge">2022-23</span>
                    </td>
                    <td class="text-center">
                      <a href="https://www.sssutms.co.in/cms/Areas/Website/Files/Link/About/University Officials/AUDIT REPORT-AYUSHMATI 2023.pdf" target="_blank" rel="noopener" class="ar-pdf-btn-red">
                        <i class="fa-solid fa-file-pdf fs-6"></i>
                        <span>Audit Report 2022-23</span>
                      </a>
                    </td>
                    <td class="text-center">
                      <a href="https://www.sssutms.co.in/cms/Areas/Website/Files/Link/About/University Officials/Balance Sheet 2022-23 Ayushmati.pdf" target="_blank" rel="noopener" class="ar-pdf-btn-blue">
                        <i class="fa-solid fa-file-pdf fs-6"></i>
                        <span>Balance Sheet 2022-23</span>
                      </a>
                    </td>
                  </tr>

                  <!-- Row 2021-22 -->
                  <tr>
                    <td class="text-center">
                      <span class="ar-year-badge">2021-22</span>
                    </td>
                    <td class="text-center">
                      <a href="#" class="ar-pdf-btn-red">
                        <i class="fa-solid fa-file-pdf fs-6"></i>
                        <span>Audit Report 2021-22</span>
                      </a>
                    </td>
                    <td class="text-center">
                      <a href="https://www.sssutms.co.in/cms/Areas/Website/Files/Link/About/University Officials/Balance Sheet 2021-22 Ayushmati.pdf" target="_blank" rel="noopener" class="ar-pdf-btn-blue">
                        <i class="fa-solid fa-file-pdf fs-6"></i>
                        <span>Balance Sheet 2021-22</span>
                      </a>
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