<?php
$page_title = 'Brochures & Prospectus - SSSUTMS';
$banner_title = 'Brochures & Prospectus';
$banner_category = 'Admission';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';

$prospectus_pdf = BASE_URL . 'assets/images/Files/Link/IQAC/NAAC/Criteria%201/prospectus%20%20Final.pdf';
?>

<style>
.br-section { background-color: #f8fafc; font-family: 'Inter', system-ui, -apple-system, sans-serif; }
.br-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15,23,42,0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}
.br-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2.2rem 2rem;
  position: relative;
}
.br-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.br-stat-chip {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 12px 14px;
  display: flex; align-items: center; gap: 11px;
  height: 100%;
  transition: all 0.25s ease;
  box-shadow: 0 2px 8px rgba(0,0,0,0.02);
}
.br-stat-chip:hover {
  border-color: #f59e0b;
  box-shadow: 0 6px 16px rgba(11,37,69,0.08);
  transform: translateY(-2px);
}
.br-stat-icon {
  width: 42px; height: 42px;
  border-radius: 10px;
  background: rgba(245,158,11,0.12);
  color: #d97706;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.15rem; flex-shrink: 0;
}
.br-featured-box {
  background: linear-gradient(135deg, #0b2545 0%, #1e4d8c 100%);
  color: #ffffff;
  border-radius: 16px;
  padding: 2rem;
  box-shadow: 0 8px 24px rgba(11,37,69,0.15);
  margin-bottom: 2rem;
}
.br-card-item {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 1.5rem;
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  box-shadow: 0 4px 14px rgba(0,0,0,0.02);
  transition: all 0.25s ease;
}
.br-card-item:hover {
  border-color: #cbd5e1;
  box-shadow: 0 8px 24px rgba(11,37,69,0.08);
  transform: translateY(-3px);
}
.br-card-icon {
  width: 48px; height: 48px;
  border-radius: 12px;
  background: #f1f5f9;
  color: #0b2545;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.35rem;
  margin-bottom: 1rem;
}
.br-btn-download {
  background: linear-gradient(135deg, #0b2545 0%, #1e4d8c 100%) !important;
  color: #ffffff !important;
  font-size: 0.88rem;
  font-weight: 700;
  padding: 8px 16px;
  border-radius: 8px;
  border: 1px solid rgba(245,158,11,0.4);
  text-decoration: none !important;
  display: inline-flex;
  align-items: center;
  gap: 8px;
  box-shadow: 0 2px 8px rgba(11,37,69,0.15);
  transition: all 0.2s ease;
}
.br-btn-download i {
  color: #fbbf24 !important;
}
.br-btn-download:hover {
  background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%) !important;
  color: #ffffff !important;
  border-color: #d97706;
  box-shadow: 0 4px 12px rgba(217,119,6,0.3);
  transform: translateY(-1px);
}
</style>

<section class="subpage-main-section br-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="br-main-card">

          <!-- Header Banner -->
          <div class="br-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-book-open me-1"></i> Information &amp; Academic Guides
              </span>
              <h3 class="fw-bold text-white mb-1 fs-3">UNIVERSITY PROSPECTUS &amp; BROCHURES</h3>
              <p class="text-white-50 mb-0 small">Download Official Course Curriculum Brochures, Prospectus &amp; Institute Guides for Session 2026-27</p>
            </div>
          </div>

          <!-- Content Body -->
          <div class="p-4">

            <!-- Stat Chips -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-sm-6 col-md-3">
                <div class="br-stat-chip">
                  <div class="br-stat-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                  <div>
                    <span class="text-muted extra-small uppercase fw-bold d-block">Academic Session</span>
                    <strong class="text-dark fs-6">2026 – 2027</strong>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="br-stat-chip">
                  <div class="br-stat-icon"><i class="fa-solid fa-building-columns"></i></div>
                  <div>
                    <span class="text-muted extra-small uppercase fw-bold d-block">Constituent Units</span>
                    <strong class="text-dark fs-6">15 Institutes</strong>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="br-stat-chip">
                  <div class="br-stat-icon"><i class="fa-solid fa-file-pdf"></i></div>
                  <div>
                    <span class="text-muted extra-small uppercase fw-bold d-block">Main Prospectus</span>
                    <strong class="text-dark fs-6">Full University Guide</strong>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="br-stat-chip">
                  <div class="br-stat-icon"><i class="fa-solid fa-download"></i></div>
                  <div>
                    <span class="text-muted extra-small uppercase fw-bold d-block">Digital Format</span>
                    <strong class="text-dark fs-6">Free PDF Download</strong>
                  </div>
                </div>
              </div>
            </div>

            <!-- Featured Master Prospectus Box -->
            <div class="br-featured-box">
              <div class="row align-items-center g-4">
                <div class="col-md-8">
                  <span class="badge bg-warning text-dark fw-bold px-3 py-1 mb-2 rounded-pill"><i class="fa-solid fa-star me-1"></i> Official Publication</span>
                  <h4 class="fw-bold text-white mb-2">Sri Satya Sai University Master Prospectus 2026-27</h4>
                  <p class="text-white-50 small mb-0 lh-base">Comprehensive handbook containing complete details on university infrastructure, constituent schools, programs offered, admission criteria, fee structure, hostel amenities, and career placements.</p>
                </div>
                <div class="col-md-4 text-md-end">
                  <a href="<?php echo $prospectus_pdf; ?>" target="_blank" rel="noopener" class="btn btn-warning fw-bold px-4 py-2.5 text-dark rounded-3 shadow">
                    <i class="fa-solid fa-file-pdf me-1"></i> Download Prospectus
                  </a>
                </div>
              </div>
            </div>

            <!-- Departmental Brochures Grid -->
            <h5 class="fw-bold text-dark mb-3"><i class="fa-solid fa-layer-group text-warning me-2"></i>Faculty &amp; School Information Guides</h5>
            <div class="row g-3">
              
              <!-- 1. Engineering -->
              <div class="col-md-6 col-lg-4">
                <div class="br-card-item">
                  <div>
                    <div class="br-card-icon"><i class="fa-solid fa-gears text-primary"></i></div>
                    <h5 class="fw-bold text-dark mb-1 fs-6">Faculty of Engineering &amp; Tech</h5>
                    <p class="text-muted small mb-3">B.E. / B.Tech (Aeronautical, CSE, Civil, Mech, EE, EC, IT) &amp; M.Tech programs guide.</p>
                  </div>
                  <div>
                    <a href="<?php echo $prospectus_pdf; ?>" target="_blank" rel="noopener" class="br-btn-download w-100 justify-content-center">
                      <i class="fa-solid fa-file-pdf"></i> View Information
                    </a>
                  </div>
                </div>
              </div>

              <!-- 2. Pharmacy -->
              <div class="col-md-6 col-lg-4">
                <div class="br-card-item">
                  <div>
                    <div class="br-card-icon"><i class="fa-solid fa-pills text-success"></i></div>
                    <h5 class="fw-bold text-dark mb-1 fs-6">School of Pharmacy</h5>
                    <p class="text-muted small mb-3">B.Pharm, D.Pharm, M.Pharm (Pharmaceutics / Pharmacology) detailed curriculum.</p>
                  </div>
                  <div>
                    <a href="<?php echo $prospectus_pdf; ?>" target="_blank" rel="noopener" class="br-btn-download w-100 justify-content-center">
                      <i class="fa-solid fa-file-pdf"></i> View Information
                    </a>
                  </div>
                </div>
              </div>

              <!-- 3. Medical Sciences -->
              <div class="col-md-6 col-lg-4">
                <div class="br-card-item">
                  <div>
                    <div class="br-card-icon"><i class="fa-solid fa-heart-pulse text-danger"></i></div>
                    <h5 class="fw-bold text-dark mb-1 fs-6">Ayush &amp; Medical Sciences</h5>
                    <p class="text-muted small mb-3">BAMS (Ayurveda) &amp; BHMS (Homeopathy) hospital training and clinical facilities.</p>
                  </div>
                  <div>
                    <a href="<?php echo $prospectus_pdf; ?>" target="_blank" rel="noopener" class="br-btn-download w-100 justify-content-center">
                      <i class="fa-solid fa-file-pdf"></i> View Information
                    </a>
                  </div>
                </div>
              </div>

              <!-- 4. Management & IT -->
              <div class="col-md-6 col-lg-4">
                <div class="br-card-item">
                  <div>
                    <div class="br-card-icon"><i class="fa-solid fa-briefcase text-warning"></i></div>
                    <h5 class="fw-bold text-dark mb-1 fs-6">Management &amp; Computer Apps</h5>
                    <p class="text-muted small mb-3">MBA, BBA, MCA &amp; BCA industry-aligned corporate specialization tracks.</p>
                  </div>
                  <div>
                    <a href="<?php echo $prospectus_pdf; ?>" target="_blank" rel="noopener" class="br-btn-download w-100 justify-content-center">
                      <i class="fa-solid fa-file-pdf"></i> View Information
                    </a>
                  </div>
                </div>
              </div>

              <!-- 5. Nursing & Paramedical -->
              <div class="col-md-6 col-lg-4">
                <div class="br-card-item">
                  <div>
                    <div class="br-card-icon"><i class="fa-solid fa-user-nurse text-info"></i></div>
                    <h5 class="fw-bold text-dark mb-1 fs-6">Nursing &amp; Paramedical</h5>
                    <p class="text-muted small mb-3">B.Sc. Nursing, GNM, Post Basic, MPT, BPT, BMLT &amp; DMLT healthcare certifications.</p>
                  </div>
                  <div>
                    <a href="<?php echo $prospectus_pdf; ?>" target="_blank" rel="noopener" class="br-btn-download w-100 justify-content-center">
                      <i class="fa-solid fa-file-pdf"></i> View Information
                    </a>
                  </div>
                </div>
              </div>

              <!-- 6. Law & Humanities -->
              <div class="col-md-6 col-lg-4">
                <div class="br-card-item">
                  <div>
                    <div class="br-card-icon"><i class="fa-solid fa-scale-balanced text-primary"></i></div>
                    <h5 class="fw-bold text-dark mb-1 fs-6">School of Law &amp; Agriculture</h5>
                    <p class="text-muted small mb-3">BA LLB, B.Com LLB, LLB, LLM, B.Sc (Hons) Ag &amp; Education programs prospectus.</p>
                  </div>
                  <div>
                    <a href="<?php echo $prospectus_pdf; ?>" target="_blank" rel="noopener" class="br-btn-download w-100 justify-content-center">
                      <i class="fa-solid fa-file-pdf"></i> View Information
                    </a>
                  </div>
                </div>
              </div>

            </div>

          </div>
        </div><!-- end br-main-card -->
      </div><!-- end col-lg-8 -->

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
