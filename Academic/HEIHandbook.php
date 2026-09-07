<?php
$page_title = 'HEI Handbook - SSSUTMS';
$banner_title = 'HEI Handbook';
$banner_category = 'Academic';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?>

<style>
.hei-section { background-color: #f8fafc; }
.hei-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15,23,42,0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}
.hei-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2.2rem 2rem;
  position: relative;
}
.hei-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.hei-stat-chip {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 16px 14px;
  display: flex; align-items: center; gap: 12px;
  height: 100%;
  transition: all 0.25s ease;
}
.hei-stat-chip:hover {
  border-color: #cbd5e1;
  box-shadow: 0 4px 16px rgba(11,37,69,0.06);
  transform: translateY(-2px);
}
.hei-stat-icon {
  width: 46px; height: 46px;
  border-radius: 12px;
  background: rgba(245,158,11,0.12);
  color: #d97706;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.35rem; flex-shrink: 0;
}
.hei-category-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 16px;
  padding: 1.5rem;
  box-shadow: 0 4px 16px rgba(0,0,0,0.02);
  margin-bottom: 1.75rem;
}
.hei-category-header {
  display: flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 1.2rem;
  padding-bottom: 0.85rem;
  border-bottom: 2px solid #f1f5f9;
}
.hei-category-header i {
  color: #f59e0b;
  font-size: 1.3rem;
}
.hei-doc-list {
  list-style: none;
  padding: 0;
  margin: 0;
}
.hei-doc-item {
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
.hei-doc-item:last-child { margin-bottom: 0; }
.hei-doc-item:hover {
  background: #ffffff;
  border-color: #cbd5e1;
  box-shadow: 0 4px 14px rgba(11,37,69,0.05);
}
.hei-doc-title {
  font-weight: 600;
  color: #0b2545;
  font-size: 0.95rem;
  display: flex;
  align-items: center;
  gap: 10px;
}
.hei-doc-title i {
  color: #d97706;
  font-size: 1.1rem;
}
.hei-download-btn {
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
.hei-download-btn i {
  color: #fbbf24 !important;
}
.hei-download-btn:hover {
  background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%) !important;
  color: #ffffff !important;
  border-color: #d97706;
  box-shadow: 0 4px 12px rgba(217,119,6,0.35);
  transform: translateY(-1px);
}
.hei-disabled-btn {
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

<section class="subpage-main-section hei-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="hei-main-card">

          <!-- Banner Header -->
          <div class="hei-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-book-bookmark me-1"></i> Academic Governance
              </span>
              <h3 class="fw-bold text-white mb-1 fs-3">HEI HANDBOOK</h3>
              <p class="text-white-50 mb-0 small">Official Ordinances, Statutes, Acts &amp; Code of Conduct of SSSUTMS</p>
            </div>
          </div>

          <!-- Body Content -->
          <div class="p-4">

            <!-- Stat Chips -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-sm-6 col-md-3">
                <div class="hei-stat-chip">
                  <div class="hei-stat-icon"><i class="fa-solid fa-gavel"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Governance</div>
                    <div class="fw-bold text-dark fs-6">Ordinances</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="hei-stat-chip">
                  <div class="hei-stat-icon"><i class="fa-solid fa-scroll"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Regulations</div>
                    <div class="fw-bold text-dark fs-6">Statutes 1-37</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="hei-stat-chip">
                  <div class="hei-stat-icon"><i class="fa-solid fa-scale-balanced"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Ethics</div>
                    <div class="fw-bold text-dark fs-6">Code of Conduct</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="hei-stat-chip">
                  <div class="hei-stat-icon"><i class="fa-solid fa-landmark"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Legislation</div>
                    <div class="fw-bold text-dark fs-6">University ACT</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- 1. Ordinances -->
            <div class="hei-category-card">
              <div class="hei-category-header">
                <i class="fa-solid fa-gavel"></i>
                <h5 class="fw-bold text-dark mb-0">Ordinances</h5>
              </div>
              <ul class="hei-doc-list">
                <li class="hei-doc-item">
                  <div class="hei-doc-title">
                    <i class="fa-solid fa-file-pdf"></i> AMENDED AND NEW ORDINANCE
                  </div>
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Ordinance/act_2.pdf" target="_blank" rel="noopener" class="hei-download-btn">
                    <i class="fa-solid fa-file-arrow-down"></i> Download PDF
                  </a>
                </li>
                <li class="hei-doc-item">
                  <div class="hei-doc-title">
                    <i class="fa-solid fa-file-pdf"></i> ORDINANCE
                  </div>
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Ordinance/Ordinance.pdf" target="_blank" rel="noopener" class="hei-download-btn">
                    <i class="fa-solid fa-file-arrow-down"></i> Download PDF
                  </a>
                </li>
                <li class="hei-doc-item">
                  <div class="hei-doc-title">
                    <i class="fa-solid fa-file-pdf"></i> SUBSEQUENT ORDINANCE
                  </div>
                  <a href="#" class="hei-download-btn">
                    <i class="fa-solid fa-file-arrow-down"></i> Download PDF
                  </a>
                </li>
                <li class="hei-doc-item">
                  <div class="hei-doc-title">
                    <i class="fa-solid fa-file-pdf"></i> AMENDED AND REPEALED ORDINANCE
                  </div>
                  <a href="#" class="hei-download-btn">
                    <i class="fa-solid fa-file-arrow-down"></i> Download PDF
                  </a>
                </li>
              </ul>
            </div>

            <!-- 2. Statute -->
            <div class="hei-category-card">
              <div class="hei-category-header">
                <i class="fa-solid fa-scroll"></i>
                <h5 class="fw-bold text-dark mb-0">Statute</h5>
              </div>
              <ul class="hei-doc-list">
                <li class="hei-doc-item">
                  <div class="hei-doc-title">
                    <i class="fa-solid fa-file-pdf"></i> STATUTE - Statute No. 1-36
                  </div>
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Handbook/Statute.pdf" target="_blank" rel="noopener" class="hei-download-btn">
                    <i class="fa-solid fa-file-arrow-down"></i> Download PDF
                  </a>
                </li>
                <li class="hei-doc-item">
                  <div class="hei-doc-title">
                    <i class="fa-solid fa-file-pdf"></i> SUB-SEQUENT STATUTE - Statute No. 37
                  </div>
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Handbook/Sub-Sequent_Statut.pdf" target="_blank" rel="noopener" class="hei-download-btn">
                    <i class="fa-solid fa-file-arrow-down"></i> Download PDF
                  </a>
                </li>
              </ul>
            </div>

            <!-- 3. Code of Conduct -->
            <div class="hei-category-card">
              <div class="hei-category-header">
                <i class="fa-solid fa-scale-balanced"></i>
                <h5 class="fw-bold text-dark mb-0">Code of Conduct</h5>
              </div>
              <ul class="hei-doc-list">
                <li class="hei-doc-item">
                  <div class="hei-doc-title">
                    <i class="fa-solid fa-file-pdf"></i> Code of Conduct
                  </div>
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Handbook/Code_of_conduct.pdf" target="_blank" rel="noopener" class="hei-download-btn">
                    <i class="fa-solid fa-file-arrow-down"></i> Download PDF
                  </a>
                </li>
              </ul>
            </div>

            <!-- 4. ACT -->
            <div class="hei-category-card mb-0">
              <div class="hei-category-header">
                <i class="fa-solid fa-landmark"></i>
                <h5 class="fw-bold text-dark mb-0">University ACT</h5>
              </div>
              <ul class="hei-doc-list">
                <li class="hei-doc-item">
                  <div class="hei-doc-title">
                    <i class="fa-solid fa-file-pdf"></i> University ACT
                  </div>
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Ordinance/act_1.pdf" target="_blank" rel="noopener" class="hei-download-btn">
                    <i class="fa-solid fa-file-arrow-down"></i> Download PDF
                  </a>
                </li>
              </ul>
            </div>

          </div>
        </div><!-- end hei-main-card -->
      </div><!-- end col-lg-8 -->

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>