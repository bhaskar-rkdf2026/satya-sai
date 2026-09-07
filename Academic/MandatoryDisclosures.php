<?php
$page_title = 'Mandatory Disclosures - SSSUTMS';
$banner_title = 'Mandatory Disclosures';
$banner_category = 'Academic';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?>

<style>
.md-section { background-color: #f8fafc; }
.md-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15,23,42,0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}
.md-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2.2rem 2rem;
  position: relative;
}
.md-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.md-stat-chip {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 16px 14px;
  display: flex; align-items: center; gap: 12px;
  height: 100%;
  transition: all 0.25s ease;
  box-shadow: 0 4px 12px rgba(0,0,0,0.02);
}
.md-stat-chip:hover {
  border-color: #cbd5e1;
  box-shadow: 0 6px 18px rgba(11,37,69,0.07);
  transform: translateY(-2px);
}
.md-stat-icon {
  width: 48px; height: 48px;
  border-radius: 12px;
  background: rgba(245,158,11,0.12);
  color: #d97706;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.35rem; flex-shrink: 0;
}
.md-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 16px;
  padding: 1.5rem;
  box-shadow: 0 4px 16px rgba(0,0,0,0.02);
  margin-bottom: 1.75rem;
}
.md-card-header {
  display: flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 1.2rem;
  padding-bottom: 0.85rem;
  border-bottom: 2px solid #f1f5f9;
}
.md-card-header i {
  color: #f59e0b;
  font-size: 1.3rem;
}
.md-doc-list {
  list-style: none;
  padding: 0;
  margin: 0;
}
.md-doc-item {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 14px 18px;
  margin-bottom: 0.85rem;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 15px;
  transition: all 0.2s ease;
}
.md-doc-item:last-child { margin-bottom: 0; }
.md-doc-item:hover {
  background: #ffffff;
  border-color: #cbd5e1;
  box-shadow: 0 4px 14px rgba(11,37,69,0.05);
}
.md-doc-title {
  font-weight: 600;
  color: #0b2545;
  font-size: 0.95rem;
  display: flex;
  align-items: center;
  gap: 10px;
}
.md-doc-title i {
  color: #d97706;
  font-size: 1.1rem;
}
.md-download-btn {
  background: linear-gradient(135deg, #0b2545 0%, #1e4d8c 100%) !important;
  color: #ffffff !important;
  font-size: 0.82rem;
  font-weight: 700;
  padding: 7px 14px;
  border-radius: 8px;
  border: 1px solid rgba(245,158,11,0.35);
  text-decoration: none !important;
  display: inline-flex;
  align-items: center;
  gap: 7px;
  white-space: nowrap;
  box-shadow: 0 2px 6px rgba(11,37,69,0.15);
  transition: all 0.2s ease;
}
.md-download-btn i {
  color: #fbbf24 !important;
}
.md-download-btn:hover {
  background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%) !important;
  color: #ffffff !important;
  border-color: #d97706;
  box-shadow: 0 4px 12px rgba(217,119,6,0.35);
  transform: translateY(-1px);
}
.md-disabled-btn {
  background: #e2e8f0 !important;
  color: #64748b !important;
  font-size: 0.82rem;
  font-weight: 600;
  padding: 7px 14px;
  border-radius: 8px;
  display: inline-flex;
  align-items: center;
  gap: 7px;
  white-space: nowrap;
  border: 1px solid #cbd5e1;
}
</style>

<section class="subpage-main-section md-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="md-main-card">

          <!-- Banner Header -->
          <div class="md-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-clipboard-check me-1"></i> AICTE &amp; Statutory Compliance
              </span>
              <h3 class="fw-bold text-white mb-1 fs-3">MANDATORY DISCLOSURES</h3>
              <p class="text-white-50 mb-0 small">Public Regulatory Disclosures &amp; Approval Documents for Constituent Schools</p>
            </div>
          </div>

          <!-- Body Content -->
          <div class="p-4">

            <!-- Stat Chips -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-sm-6 col-md-3">
                <div class="md-stat-chip">
                  <div class="md-stat-icon"><i class="fa-solid fa-shield-cat"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Compliance</div>
                    <div class="fw-bold text-dark fs-6">AICTE &amp; UGC</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="md-stat-chip">
                  <div class="md-stat-icon"><i class="fa-solid fa-building-columns"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Institutions</div>
                    <div class="fw-bold text-dark fs-6">Constituent Schools</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="md-stat-chip">
                  <div class="md-stat-icon"><i class="fa-solid fa-file-shield"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Session</div>
                    <div class="fw-bold text-dark fs-6">2022 - 2023</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="md-stat-chip">
                  <div class="md-stat-icon"><i class="fa-solid fa-scale-balanced"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Governance</div>
                    <div class="fw-bold text-dark fs-6">Public Disclosures</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Mandatory Disclosures Document List -->
            <div class="md-card mb-0">
              <div class="md-card-header">
                <i class="fa-solid fa-folder-open"></i>
                <h5 class="fw-bold text-dark mb-0">Institutional Mandatory Disclosure Documents</h5>
              </div>

              <ul class="md-doc-list">
                <li class="md-doc-item">
                  <div class="md-doc-title">
                    <i class="fa-solid fa-file-pdf"></i> School of Engineering
                  </div>
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/approval/SOE_MD2022_23.pdf" target="_blank" rel="noopener" class="md-download-btn">
                    <i class="fa-solid fa-file-arrow-down"></i> Download PDF
                  </a>
                </li>
                <li class="md-doc-item">
                  <div class="md-doc-title">
                    <i class="fa-solid fa-graduation-cap"></i> Faculty of Pharmacy &ndash; (College of Pharmacy)
                  </div>
                  <span class="md-disabled-btn"><i class="fa-solid fa-clock"></i> Reference</span>
                </li>
                <li class="md-doc-item">
                  <div class="md-doc-title">
                    <i class="fa-solid fa-graduation-cap"></i> Faculty of Pharmacy &ndash; (School of Pharmacy)
                  </div>
                  <span class="md-disabled-btn"><i class="fa-solid fa-clock"></i> Reference</span>
                </li>
                <li class="md-doc-item">
                  <div class="md-doc-title">
                    <i class="fa-solid fa-graduation-cap"></i> Faculty of Pharmacy &ndash; (Polytechnic (Pharmacy))
                  </div>
                  <span class="md-disabled-btn"><i class="fa-solid fa-clock"></i> Reference</span>
                </li>
                <li class="md-doc-item">
                  <div class="md-doc-title">
                    <i class="fa-solid fa-pen-ruler"></i> School of Design
                  </div>
                  <span class="md-disabled-btn"><i class="fa-solid fa-clock"></i> Reference</span>
                </li>
                <li class="md-doc-item">
                  <div class="md-doc-title">
                    <i class="fa-solid fa-file-pdf"></i> School of Computer Application
                  </div>
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/approval/SOCA_MD2022_23.pdf" target="_blank" rel="noopener" class="md-download-btn">
                    <i class="fa-solid fa-file-arrow-down"></i> Download PDF
                  </a>
                </li>
                <li class="md-doc-item">
                  <div class="md-doc-title">
                    <i class="fa-solid fa-hotel"></i> School of Hotel Management
                  </div>
                  <span class="md-disabled-btn"><i class="fa-solid fa-clock"></i> Reference</span>
                </li>
                <li class="md-doc-item">
                  <div class="md-doc-title">
                    <i class="fa-solid fa-chart-pie"></i> School of Management Studies
                  </div>
                  <span class="md-disabled-btn"><i class="fa-solid fa-clock"></i> Reference</span>
                </li>
                <li class="md-doc-item">
                  <div class="md-doc-title">
                    <i class="fa-solid fa-gears"></i> Polytechnic (Engineering)
                  </div>
                  <span class="md-disabled-btn"><i class="fa-solid fa-clock"></i> Reference</span>
                </li>
              </ul>
            </div>

          </div>
        </div><!-- end md-main-card -->
      </div><!-- end col-lg-8 -->

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>