<?php
$page_title = 'Admission Brochure & Prospectus - Sri Satya Sai University of Technology & Medical Sciences';
$banner_title = 'Brochures';
$banner_category = 'Admission';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';

// Local PDF path
$main_prospectus_pdf = BASE_URL . 'assets/pdf/MAIN_19112025_0435.pdf';
?>

<style>
.br-page {
  background-color: #f8fafc;
  font-family: 'Inter', system-ui, -apple-system, sans-serif;
}

.br-main-card {
  background: #ffffff;
  border-radius: 16px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 4px 20px rgba(11, 37, 69, 0.04);
  overflow: hidden;
  margin-bottom: 2rem;
}

/* Header Banner */
.br-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  padding: 2.25rem 2rem;
  color: #ffffff;
  position: relative;
}

.br-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}

.br-badge {
  background: rgba(255, 255, 255, 0.12);
  border: 1px solid rgba(255, 255, 255, 0.25);
  color: #fbbf24;
  font-weight: 700;
  font-size: 0.75rem;
  letter-spacing: 0.5px;
  text-transform: uppercase;
  padding: 6px 14px;
  border-radius: 30px;
  display: inline-flex;
  align-items: center;
  gap: 6px;
}

/* Hero Showcase Card */
.br-hero-card {
  background: linear-gradient(135deg, #0b2545 0%, #1e3a8a 100%);
  border-radius: 16px;
  padding: 2.25rem;
  color: #ffffff;
  box-shadow: 0 10px 30px rgba(11, 37, 69, 0.15);
  position: relative;
  overflow: hidden;
  border: 1px solid rgba(255, 255, 255, 0.1);
}

.br-hero-card::before {
  content: '';
  position: absolute;
  top: -50%; right: -20%;
  width: 350px; height: 350px;
  background: radial-gradient(circle, rgba(245, 158, 11, 0.15) 0%, rgba(255, 255, 255, 0) 70%);
  border-radius: 50%;
  pointer-events: none;
}

.br-btn-primary {
  background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
  color: #ffffff !important;
  font-weight: 700;
  font-size: 0.95rem;
  padding: 12px 24px;
  border-radius: 10px;
  border: none;
  display: inline-flex;
  align-items: center;
  gap: 10px;
  text-decoration: none !important;
  box-shadow: 0 4px 14px rgba(245, 158, 11, 0.35);
  transition: all 0.25s ease;
}

.br-btn-primary:hover {
  background: linear-gradient(135deg, #d97706 0%, #b45309 100%);
  transform: translateY(-2px);
  box-shadow: 0 6px 18px rgba(245, 158, 11, 0.45);
}

.br-btn-secondary {
  background: rgba(255, 255, 255, 0.12);
  color: #ffffff !important;
  border: 1px solid rgba(255, 255, 255, 0.25);
  font-weight: 600;
  font-size: 0.95rem;
  padding: 12px 20px;
  border-radius: 10px;
  display: inline-flex;
  align-items: center;
  gap: 8px;
  text-decoration: none !important;
  transition: all 0.25s ease;
}

.br-btn-secondary:hover {
  background: rgba(255, 255, 255, 0.22);
  border-color: rgba(255, 255, 255, 0.4);
  transform: translateY(-2px);
}

/* Helpdesk Box */
.br-helpdesk {
  background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
  border: 1px solid #cbd5e1;
  border-radius: 14px;
  padding: 1.5rem;
}
</style>

<section class="subpage-main-section br-page py-4 py-md-5">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="br-main-card">

          <!-- Header Banner -->
          <div class="br-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="br-badge mb-2">
                <i class="fa-solid fa-book-open"></i> Admission Documents
              </span>
              <h1 class="fw-bold text-white mb-1 fs-3">ADMISSION BROCHURE &amp; PROSPECTUS</h1>
              <p class="text-white-50 mb-0 small">Official University General Information Prospectus &amp; Academic Guide (Session 2026-27)</p>
            </div>
            <div>
              <a href="<?php echo $main_prospectus_pdf; ?>" target="_blank" rel="noopener" class="br-btn-primary">
                <i class="fa-solid fa-download"></i> Prospectus (Click Here)
              </a>
            </div>
          </div>

          <!-- Content Body -->
          <div class="p-3.5 p-md-4">

            <!-- Featured Prospectus Hero Box -->
            <div class="br-hero-card mb-4">
              <div class="row align-items-center g-4">
                <div class="col-lg-8">
                  <span class="badge bg-warning text-dark fw-bold uppercase px-3 py-1.5 rounded-pill mb-3" style="font-size:0.75rem;">
                    <i class="fa-solid fa-star me-1"></i> Official Publication
                  </span>
                  <h2 class="fw-bold text-white mb-2 fs-4">Official General Information Prospectus (2026-27)</h2>
                  <p class="text-white-50 small mb-4 lh-base">
                    Comprehensive admission guide detailing Sri Satya Sai University degree offerings, Ayushmati Superspecialty Hospital facilities, research labs, scholarship criteria, and enrollment guidelines.
                  </p>
                  <div class="d-flex flex-wrap gap-3">
                    <a href="<?php echo $main_prospectus_pdf; ?>" target="_blank" rel="noopener" class="br-btn-primary">
                      <i class="fa-solid fa-file-pdf"></i> Prospectus (Click Here)
                    </a>
                    <a href="<?php echo BASE_URL; ?>Admission/AdmissionRegistration.php" class="br-btn-secondary">
                      <i class="fa-solid fa-user-plus"></i> Online Registration
                    </a>
                  </div>
                </div>
                <div class="col-lg-4 text-center">
                  <div class="p-4 rounded-4" style="background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.18);">
                    <i class="fa-solid fa-file-pdf display-2 text-warning mb-2 d-block"></i>
                    <strong class="text-white d-block fs-6">SSSUTMS Prospectus</strong>
                    <span class="text-white-50 extra-small">Digital PDF Download</span>
                  </div>
                </div>
              </div>
            </div>

            <!-- Contact Admission Helpdesk -->
            <div class="br-helpdesk d-flex align-items-center justify-content-between flex-wrap gap-3">
              <div class="d-flex align-items-center gap-3">
                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width:50px; height:50px;">
                  <i class="fa-solid fa-headset fs-4"></i>
                </div>
                <div>
                  <strong class="text-dark d-block">Have queries regarding admissions or eligibility?</strong>
                  <span class="text-muted extra-small">Contact the Central Admission Cell helpline or visit the campus office.</span>
                </div>
              </div>
              <a href="<?php echo BASE_URL; ?>contact.php" class="btn btn-primary fw-bold rounded-pill px-4 py-2">
                Contact Admission Cell
              </a>
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