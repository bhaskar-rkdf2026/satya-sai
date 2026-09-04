<?php
$page_title = 'Admission Brochures & Prospectus - Sri Satya Sai University of Technology & Medical Sciences';
$banner_title = 'Brochures';
$banner_category = 'Admission';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';

// Local PDF paths
$main_prospectus_pdf = BASE_URL . 'assets/pdf/MAIN_19112025_0435.pdf';
$nep_policy_pdf = BASE_URL . 'assets/pdf/NEP_2020_27_university_14-compressed.pdf';
$admission_reg_pdf = BASE_URL . 'assets/pdf/Final_Regulations_admission_04022026_0252.pdf';
$refund_policy_pdf = BASE_URL . 'assets/pdf/Fees_Refund_Policy_04012025_0322.pdf';
$international_adm_pdf = BASE_URL . 'assets/pdf/INTERNATIONAL_ADMISSION_05_07122024_0637.pdf';
$strategic_vision_pdf = BASE_URL . 'assets/pdf/Strategic_Vision_07122024_0233.pdf';

$brochures_list = [
    [
        'title' => 'Official General Prospectus (2026-27)',
        'category' => 'University Prospectus',
        'icon' => 'fa-book-open',
        'badge' => 'Main Prospectus',
        'desc' => 'Comprehensive information handbook covering all UG, PG, Diploma, and Ph.D. programs, campus facilities, faculty profile, and admission guidelines for session 2026-27.',
        'file' => $main_prospectus_pdf,
        'tag' => 'Official PDF',
        'size' => '2.0 MB'
    ],
    [
        'title' => 'NEP 2020-27 Policy & Credit System Booklet',
        'category' => 'Academic Policy',
        'icon' => 'fa-graduation-cap',
        'badge' => 'NEP 2020 Guidelines',
        'desc' => 'Detailed booklet explaining Choice Based Credit System (CBCS), multidisciplinary curriculum structure, and academic credit regulations under NEP 2020.',
        'file' => $nep_policy_pdf,
        'tag' => 'Academic Handbook',
        'size' => '45 MB'
    ],
    [
        'title' => 'International Student Admission Guide',
        'category' => 'Global Admissions',
        'icon' => 'fa-earth-americas',
        'badge' => 'NRI & Foreign Students',
        'desc' => 'Special admission guide for international applicants detailing eligibility verification, visa documentation, equivalence certification, and residential facilities.',
        'file' => $international_adm_pdf,
        'tag' => 'International',
        'size' => '600 KB'
    ],
    [
        'title' => 'University Admission Regulations & Ordinances',
        'category' => 'Statutory Rules',
        'icon' => 'fa-gavel',
        'badge' => 'Official Regulations',
        'desc' => 'Official university admission rules, reservation policies, document verification procedures, and MP PURC compliance directives.',
        'file' => $admission_reg_pdf,
        'tag' => 'Regulations',
        'size' => '200 KB'
    ],
    [
        'title' => 'Fees Refund Policy & Fee Regulations',
        'category' => 'Fee Directives',
        'icon' => 'fa-file-shield',
        'badge' => 'Refund Directives',
        'desc' => 'Complete guidelines regarding fee payment schedules, cancellation timelines, security deposit refunds, and regulatory fee structures.',
        'file' => $refund_policy_pdf,
        'tag' => 'Fee Policy',
        'size' => '2.3 MB'
    ],
    [
        'title' => 'University Strategic Vision & Campus Handbook',
        'category' => 'University Overview',
        'icon' => 'fa-building-columns',
        'badge' => 'Campus Profile',
        'desc' => 'Overview of Sri Satya Sai University campus, Ayushmati Hospital, advanced research laboratories, sports infrastructure, and placement records.',
        'file' => $strategic_vision_pdf,
        'tag' => 'Overview',
        'size' => '1.7 MB'
    ]
];
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

.br-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2.25rem 2rem;
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
  padding: 14px 16px;
  display: flex;
  align-items: center;
  gap: 12px;
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
  width: 44px;
  height: 44px;
  border-radius: 10px;
  background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%);
  color: #d97706;
  border: 1px solid #fde68a;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.25rem;
  flex-shrink: 0;
}

.br-hero-prospectus {
  background: linear-gradient(135deg, #0b2545 0%, #1d4ed8 100%);
  border-radius: 16px;
  color: #ffffff;
  padding: 2rem;
  position: relative;
  overflow: hidden;
  box-shadow: 0 10px 25px rgba(11, 37, 69, 0.15);
}
.br-hero-prospectus::before {
  content: '';
  position: absolute;
  top: -50px; right: -50px;
  width: 200px; height: 200px;
  background: rgba(255,255,255,0.05);
  border-radius: 50%;
}

.br-action-btn {
  background: #f59e0b;
  color: #0b2545 !important;
  font-weight: 700;
  font-size: 0.92rem;
  padding: 12px 24px;
  border-radius: 10px;
  display: inline-flex;
  align-items: center;
  gap: 10px;
  text-decoration: none !important;
  border: 1px solid #d97706;
  transition: all 0.25s ease;
  box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);
}
.br-action-btn:hover {
  background: #d97706;
  color: #ffffff !important;
  transform: translateY(-2px);
  box-shadow: 0 6px 18px rgba(217, 119, 6, 0.4);
}

.br-secondary-btn {
  background: rgba(255,255,255,0.15);
  color: #ffffff !important;
  font-weight: 600;
  font-size: 0.9rem;
  padding: 12px 20px;
  border-radius: 10px;
  display: inline-flex;
  align-items: center;
  gap: 8px;
  text-decoration: none !important;
  border: 1px solid rgba(255,255,255,0.3);
  transition: all 0.25s ease;
}
.br-secondary-btn:hover {
  background: rgba(255,255,255,0.3);
  color: #ffffff !important;
  transform: translateY(-2px);
}

.br-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 1.5rem;
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  transition: all 0.25s ease;
  box-shadow: 0 2px 10px rgba(0,0,0,0.02);
}
.br-card:hover {
  border-color: #cbd5e1;
  box-shadow: 0 8px 24px rgba(11, 37, 69, 0.08);
  transform: translateY(-3px);
}

.br-card-badge {
  background: #f1f5f9;
  color: #0b2545;
  font-weight: 700;
  font-size: 0.75rem;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  padding: 4px 10px;
  border-radius: 6px;
  display: inline-block;
}

.br-card-icon {
  width: 48px;
  height: 48px;
  border-radius: 12px;
  background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
  color: #1d4ed8;
  border: 1px solid #bfdbfe;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.35rem;
  margin-bottom: 1rem;
}

.br-download-link {
  color: #0b2545;
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  font-weight: 700;
  font-size: 0.88rem;
  padding: 10px 16px;
  border-radius: 8px;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  text-decoration: none !important;
  transition: all 0.2s ease;
  width: 100%;
}
.br-download-link:hover {
  background: #0b2545;
  color: #ffffff !important;
  border-color: #0b2545;
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
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-1.5 rounded-pill" style="background:rgba(255,255,255,0.15); border:1px solid rgba(255,255,255,0.3);">
                <i class="fa-solid fa-book-open me-1"></i> Information Handbooks &amp; Prospectus
              </span>
              <h1 class="fw-bold text-white mb-1 fs-3">ADMISSION BROCHURE &amp; PROSPECTUS</h1>
              <p class="text-white-50 mb-0 small">Official University Information Handbooks &amp; Discipline-Wise Admission Guides (2026-27)</p>
            </div>
            <div class="d-flex flex-wrap gap-2">
              <a href="<?php echo $main_prospectus_pdf; ?>" target="_blank" rel="noopener" class="br-action-btn">
                <i class="fa-solid fa-file-pdf"></i> Prospectus (Click Here)
              </a>
            </div>
          </div>

          <!-- Content Body -->
          <div class="p-3.5 p-md-4">

            <!-- Stat Chips -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-sm-6 col-md-3">
                <div class="br-stat-chip">
                  <div class="br-stat-icon"><i class="fa-solid fa-book"></i></div>
                  <div>
                    <span class="text-muted extra-small uppercase fw-bold d-block">Main Prospectus</span>
                    <strong class="text-dark fs-6">Session 2026-27</strong>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="br-stat-chip">
                  <div class="br-stat-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                  <div>
                    <span class="text-muted extra-small uppercase fw-bold d-block">Academic Policy</span>
                    <strong class="text-dark fs-6">NEP 2020-27</strong>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="br-stat-chip">
                  <div class="br-stat-icon"><i class="fa-solid fa-earth-americas"></i></div>
                  <div>
                    <span class="text-muted extra-small uppercase fw-bold d-block">Global Admissions</span>
                    <strong class="text-dark fs-6">NRI &amp; Foreign</strong>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="br-stat-chip">
                  <div class="br-stat-icon"><i class="fa-solid fa-file-shield"></i></div>
                  <div>
                    <span class="text-muted extra-small uppercase fw-bold d-block">Format</span>
                    <strong class="text-dark fs-6">Digital PDF Downloads</strong>
                  </div>
                </div>
              </div>
            </div>

            <!-- Featured Prospectus Hero Section (Exact Live Content Preserved) -->
            <div class="br-hero-prospectus mb-4">
              <div class="row align-items-center g-4">
                <div class="col-md-8">
                  <span class="badge text-warning uppercase fw-bold mb-2 px-3 py-1.5 rounded-pill" style="background:rgba(245,158,11,0.2); border:1px solid rgba(245,158,11,0.4);">
                    <i class="fa-solid fa-star me-1"></i> Featured Publication
                  </span>
                  <h3 class="fw-bold text-white mb-2 fs-4">Official University Admission Prospectus (2026-27)</h3>
                  <p class="text-white-50 small mb-3">
                    Download the complete official Sri Satya Sai University of Technology &amp; Medical Sciences Prospectus containing degree details, UTD facilities, Ayushmati Hospital profile, scholarship rules, and enrollment process.
                  </p>
                  <div class="d-flex flex-wrap gap-2">
                    <a href="<?php echo $main_prospectus_pdf; ?>" target="_blank" rel="noopener" class="br-action-btn">
                      <i class="fa-solid fa-download"></i> Prospectus (Click Here)
                    </a>
                    <a href="<?php echo BASE_URL; ?>Admission/AdmissionRegistration.php" class="br-secondary-btn">
                      <i class="fa-solid fa-user-plus"></i> Online Registration
                    </a>
                  </div>
                </div>
                <div class="col-md-4 text-center">
                  <div class="p-3 rounded-4" style="background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2);">
                    <i class="fa-solid fa-file-pdf display-3 text-warning mb-2 d-block"></i>
                    <strong class="text-white d-block small">SSSUTMS General Prospectus</strong>
                    <span class="text-white-50 extra-small">PDF Format &bull; 2.0 MB</span>
                  </div>
                </div>
              </div>
            </div>

            <!-- Discipline & Category Handbooks Grid -->
            <h5 class="fw-bold text-dark mb-3">
              <i class="fa-solid fa-folder-open text-warning me-2"></i> University Handbooks &amp; Information Guides
            </h5>

            <div class="row g-3">
              <?php foreach ($brochures_list as $item): ?>
              <div class="col-md-6 col-xl-4">
                <div class="br-card">
                  <div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                      <span class="br-card-badge"><?php echo htmlspecialchars($item['badge']); ?></span>
                      <span class="text-muted extra-small"><i class="fa-solid fa-paperclip me-1"></i><?php echo htmlspecialchars($item['size']); ?></span>
                    </div>
                    <div class="br-card-icon">
                      <i class="fa-solid <?php echo htmlspecialchars($item['icon']); ?>"></i>
                    </div>
                    <h6 class="fw-bold text-dark mb-2"><?php echo htmlspecialchars($item['title']); ?></h6>
                    <p class="text-muted extra-small mb-3" style="line-height: 1.6;">
                      <?php echo htmlspecialchars($item['desc']); ?>
                    </p>
                  </div>
                  <div>
                    <a href="<?php echo htmlspecialchars($item['file']); ?>" target="_blank" rel="noopener" class="br-download-link">
                      <i class="fa-solid fa-download text-warning"></i> Download <?php echo htmlspecialchars($item['tag']); ?>
                    </a>
                  </div>
                </div>
              </div>
              <?php endforeach; ?>
            </div>

            <!-- Helpdesk CTA Note -->
            <div class="p-3 border rounded-3 bg-light mt-4 d-flex align-items-center justify-content-between flex-wrap gap-3">
              <div class="d-flex align-items-center gap-3">
                <i class="fa-solid fa-headset fs-2 text-primary"></i>
                <div>
                  <strong class="text-dark d-block">Need printed copies or program-specific counseling?</strong>
                  <span class="text-muted extra-small">Contact the Central Admission Cell at campus or call official helpline numbers.</span>
                </div>
              </div>
              <a href="<?php echo BASE_URL; ?>contact.php" class="btn btn-outline-primary fw-bold btn-sm rounded-pill px-3 py-1.5">
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