<?php
$page_title = 'Constituent Units - SSSUTMS';
$banner_title = 'Constituent Units';
$banner_category = 'Academic';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?>

<style>
.const-units-section { background-color: #f8fafc; }
.const-units-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15,23,42,0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}
.const-units-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2rem;
  position: relative;
}
.const-units-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.const-units-stat-chip {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 14px 12px;
  display: flex; align-items: center; gap: 10px;
  height: 100%;
  transition: all 0.2s ease;
  overflow: hidden;
}
.const-units-stat-chip:hover {
  border-color: #cbd5e1;
  box-shadow: 0 4px 14px rgba(0,0,0,0.04);
}
.const-units-stat-icon {
  width: 44px; height: 44px;
  border-radius: 10px;
  background: rgba(245,158,11,0.1);
  color: #d97706;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.25rem; flex-shrink: 0;
}
.const-units-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 1.5rem;
  box-shadow: 0 4px 16px rgba(0,0,0,0.02);
  margin-bottom: 1.5rem;
}
.const-units-card-header {
  display: flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 1rem;
  padding-bottom: 0.75rem;
  border-bottom: 2px solid #f1f5f9;
}
.const-units-card-header i {
  color: #f59e0b;
  font-size: 1.25rem;
}
.const-unit-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
  gap: 14px;
}
.const-unit-item {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 14px 16px;
  display: flex;
  align-items: center;
  gap: 12px;
  transition: all 0.2s ease;
}
.const-unit-item:hover {
  border-color: #f59e0b;
  background: #ffffff;
  box-shadow: 0 6px 16px rgba(11,37,69,0.08);
  transform: translateY(-2px);
}
.const-unit-icon {
  width: 38px; height: 38px;
  border-radius: 8px;
  background: #0b2545;
  color: #fbbf24;
  display: flex; align-items: center; justify-content: center;
  font-size: 1rem; flex-shrink: 0;
}
.const-unit-name {
  font-weight: 600;
  color: #1e293b;
  font-size: 0.93rem;
  margin: 0;
}
.const-unit-name a {
  color: #1e293b;
  text-decoration: none;
  transition: color 0.2s ease;
}
.const-unit-name a:hover {
  color: #d97706;
}
</style>

<section class="subpage-main-section const-units-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="const-units-main-card">

          <!-- Banner Header -->
          <div class="const-units-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-building-columns me-1"></i> Academic Framework
              </span>
              <h3 class="fw-bold text-white mb-0 fs-3">CONSTITUENT UNITS</h3>
            </div>
          </div>

          <!-- Body -->
          <div class="p-4">

            <!-- Stat Chips -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-sm-6 col-md-3">
                <div class="const-units-stat-chip">
                  <div class="const-units-stat-icon"><i class="fa-solid fa-school"></i></div>
                  <div style="min-width: 0; flex: 1;">
                    <div class="text-muted extra-small uppercase fw-bold">Constituent Units</div>
                    <div class="fw-bold text-dark fs-6">14+ Institutes</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="const-units-stat-chip">
                  <div class="const-units-stat-icon"><i class="fa-solid fa-book-bookmark"></i></div>
                  <div style="min-width: 0; flex: 1;">
                    <div class="text-muted extra-small uppercase fw-bold">Category</div>
                    <div class="fw-bold text-dark fs-6">Schools &amp; Faculties</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="const-units-stat-chip">
                  <div class="const-units-stat-icon"><i class="fa-solid fa-award"></i></div>
                  <div style="min-width: 0; flex: 1;">
                    <div class="text-muted extra-small uppercase fw-bold">Disciplines</div>
                    <div class="fw-bold text-dark fs-6">Engg, Ayush, Med &amp; Mgmt</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="const-units-stat-chip">
                  <div class="const-units-stat-icon"><i class="fa-solid fa-shield-halved"></i></div>
                  <div style="min-width: 0; flex: 1;">
                    <div class="text-muted extra-small uppercase fw-bold">Ordinance</div>
                    <div class="fw-bold text-dark fs-6">SSSUTMS Ordinance</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Overview Card -->
            <div class="const-units-card">
              <div class="const-units-card-header">
                <i class="fa-solid fa-circle-info"></i>
                <h5 class="fw-bold text-dark mb-0">University Ordinance &amp; Constituent Framework</h5>
              </div>
              <p class="text-secondary lh-base mb-0" style="font-size: 0.95rem;">
                As per the ordinance of <strong>Sri Satya Sai University of Technology &amp; Medical Sciences, Sehore</strong>, the following institutes and schools are constituent units of the University, established to impart higher education across engineering, healthcare, pharmacy, management, design, and allied disciplines.
              </p>
            </div>

            <!-- University Institutes -->
            <div class="const-units-card">
              <div class="const-units-card-header">
                <i class="fa-solid fa-university"></i>
                <h5 class="fw-bold text-dark mb-0">University Schools &amp; Faculties</h5>
              </div>

              <div class="const-unit-grid">
                <div class="const-unit-item">
                  <div class="const-unit-icon"><i class="fa-solid fa-gear"></i></div>
                  <h6 class="const-unit-name"><a href="<?php echo BASE_URL; ?>Academic/FacultiesAndDepartments/EngineeringAndTechnology.php">School of Engineering</a></h6>
                </div>
                <div class="const-unit-item">
                  <div class="const-unit-icon"><i class="fa-solid fa-laptop-code"></i></div>
                  <h6 class="const-unit-name"><a href="<?php echo BASE_URL; ?>Academic/FacultiesAndDepartments/ComputerScienceAndApplication.php">School of Computer Application</a></h6>
                </div>
                <div class="const-unit-item">
                  <div class="const-unit-icon"><i class="fa-solid fa-briefcase"></i></div>
                  <h6 class="const-unit-name"><a href="<?php echo BASE_URL; ?>Academic/FacultiesAndDepartments/Management.php">School of Management Studies</a></h6>
                </div>
                <div class="const-unit-item">
                  <div class="const-unit-icon"><i class="fa-solid fa-utensils"></i></div>
                  <h6 class="const-unit-name">School of Hotel Management</h6>
                </div>
                <div class="const-unit-item">
                  <div class="const-unit-icon"><i class="fa-solid fa-heart-pulse"></i></div>
                  <h6 class="const-unit-name">School of Paramedical Studies</h6>
                </div>
                <div class="const-unit-item">
                  <div class="const-unit-icon"><i class="fa-solid fa-microchip"></i></div>
                  <h6 class="const-unit-name">Polytechnic (Engineering)</h6>
                </div>
                <div class="const-unit-item">
                  <div class="const-unit-icon"><i class="fa-solid fa-scale-balanced"></i></div>
                  <h6 class="const-unit-name"><a href="<?php echo BASE_URL; ?>Academic/FacultiesAndDepartments/Law.php">School of Law</a></h6>
                </div>
                <div class="const-unit-item">
                  <div class="const-unit-icon"><i class="fa-solid fa-mortar-pestle"></i></div>
                  <h6 class="const-unit-name"><a href="<?php echo BASE_URL; ?>Academic/FacultiesAndDepartments/Homeopathy.php">School of Homoeopathy</a></h6>
                </div>
                <div class="const-unit-item">
                  <div class="const-unit-icon"><i class="fa-solid fa-chalkboard-user"></i></div>
                  <h6 class="const-unit-name"><a href="<?php echo BASE_URL; ?>Academic/FacultiesAndDepartments/Education.php">Faculty of Education</a></h6>
                </div>
                <div class="const-unit-item">
                  <div class="const-unit-icon"><i class="fa-solid fa-pen-ruler"></i></div>
                  <h6 class="const-unit-name"><a href="<?php echo BASE_URL; ?>Academic/FacultiesAndDepartments/Design.php">School of Design</a></h6>
                </div>
                <div class="const-unit-item">
                  <div class="const-unit-icon"><i class="fa-solid fa-leaf"></i></div>
                  <h6 class="const-unit-name"><a href="<?php echo BASE_URL; ?>Academic/FacultiesAndDepartments/Ayurveda.php">School of Ayurveda &amp; Siddha Studies</a></h6>
                </div>
                <div class="const-unit-item">
                  <div class="const-unit-icon"><i class="fa-solid fa-wheat-awn"></i></div>
                  <h6 class="const-unit-name">School of Agriculture</h6>
                </div>
                <div class="const-unit-item">
                  <div class="const-unit-icon"><i class="fa-solid fa-user-doctor"></i></div>
                  <h6 class="const-unit-name">School of Medical Sciences</h6>
                </div>
                <div class="const-unit-item">
                  <div class="const-unit-icon"><i class="fa-solid fa-pills"></i></div>
                  <h6 class="const-unit-name"><a href="<?php echo BASE_URL; ?>Academic/FacultiesAndDepartments/Pharmacy.php">Faculty of Pharmacy</a></h6>
                </div>
              </div>
            </div>

            <!-- Pharmacy Institutions -->
            <div class="const-units-card mb-4">
              <div class="const-units-card-header">
                <i class="fa-solid fa-prescription-bottle-medical"></i>
                <h5 class="fw-bold text-dark mb-0">Pharmacy Institutions</h5>
              </div>

              <div class="const-unit-grid">
                <div class="const-unit-item">
                  <div class="const-unit-icon" style="background:#f59e0b; color:#fff;"><i class="fa-solid fa-pills"></i></div>
                  <h6 class="const-unit-name"><a href="<?php echo BASE_URL; ?>About/College_of_pharmacy.php">College of Pharmacy</a></h6>
                </div>
                <div class="const-unit-item">
                  <div class="const-unit-icon" style="background:#f59e0b; color:#fff;"><i class="fa-solid fa-capsules"></i></div>
                  <h6 class="const-unit-name"><a href="<?php echo BASE_URL; ?>About/sop.php">School of Pharmacy</a></h6>
                </div>
                <div class="const-unit-item">
                  <div class="const-unit-icon" style="background:#f59e0b; color:#fff;"><i class="fa-solid fa-notes-medical"></i></div>
                  <h6 class="const-unit-name"><a href="<?php echo BASE_URL; ?>About/srkmsop.php">Sri Ramnath Kapoor Memorial School of Pharmacy</a></h6>
                </div>
                <div class="const-unit-item">
                  <div class="const-unit-icon" style="background:#f59e0b; color:#fff;"><i class="fa-solid fa-vial-virus"></i></div>
                  <h6 class="const-unit-name"><a href="<?php echo BASE_URL; ?>About/POLP.php">Polytechnic Pharmacy</a></h6>
                </div>
              </div>
            </div>

            <!-- Regulatory Body & Ordinance Approval Image Card -->
            <div class="const-units-card mb-0">
              <div class="const-units-card-header d-flex align-items-center justify-content-between flex-wrap gap-2">
                <div class="d-flex align-items-center gap-2">
                  <i class="fa-solid fa-file-invoice"></i>
                  <h5 class="fw-bold text-dark mb-0">Regulatory Authority Approval &amp; Ordinance List</h5>
                </div>
                <a href="<?php echo BASE_URL; ?>assets/images/Academic/constituent_units_table.png" target="_blank" rel="noopener" class="exp-lect-badge-btn" style="background: linear-gradient(135deg, #0b2545 0%, #1e4d8c 100%) !important; color: #ffffff !important; font-size: 0.82rem; font-weight: 700; padding: 7px 10px; border-radius: 8px; border: 1px solid rgba(245,158,11,0.35); text-decoration: none; display: inline-flex; align-items: center; justify-content: center; gap: 7px; white-space: nowrap; width: 195px; flex-shrink: 0;">
                  <i class="fa-solid fa-expand" style="color:#fbbf24;"></i> View Full Image
                </a>
              </div>
              <div class="text-center p-2 bg-light rounded-3 border border-slate-200">
                <img src="<?php echo BASE_URL; ?>assets/images/Academic/constituent_units_table.png" alt="Constituent Units Regulatory &amp; Ordinance List" class="img-fluid rounded-3 shadow-sm" style="max-width: 100%; height: auto;">
              </div>
            </div>

          </div>
        </div><!-- end const-units-main-card -->
      </div><!-- end col-lg-8 -->

      <!-- Sticky Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>