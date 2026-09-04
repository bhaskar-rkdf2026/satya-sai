<?php
$page_title = 'Admission Procedure - Sri Satya Sai University of Technology & Medical Sciences';
$banner_title = 'Admission Procedure';
$banner_category = 'Admission';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';

$pdf_path = BASE_URL . 'assets/documents/admission_notices/adm_procedure.pdf';
$chart_img_path = BASE_URL . 'assets/images/admission/admission_procedure_flowchart.jpeg';
?>

<style>
.ap-section {
  background-color: #f8fafc;
  font-family: 'Inter', system-ui, -apple-system, sans-serif;
}

.ap-main-card {
  background: #ffffff;
  border-radius: 16px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 4px 20px rgba(11, 37, 69, 0.04);
  overflow: hidden;
  margin-bottom: 2rem;
}

.ap-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2.25rem 2rem;
  position: relative;
}
.ap-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}

.ap-stat-chip {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 12px 16px;
  display: flex;
  align-items: center;
  gap: 12px;
  height: 100%;
  transition: all 0.25s ease;
  box-shadow: 0 2px 8px rgba(0,0,0,0.02);
}
.ap-stat-chip:hover {
  border-color: #f59e0b;
  box-shadow: 0 6px 16px rgba(11,37,69,0.08);
  transform: translateY(-2px);
}
.ap-stat-icon {
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

.ap-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 1.5rem;
  box-shadow: 0 2px 10px rgba(0,0,0,0.02);
  margin-bottom: 1.75rem;
}
.ap-card-header {
  display: flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 1.2rem;
  padding-bottom: 0.85rem;
  border-bottom: 2px solid #f1f5f9;
}
.ap-card-header i {
  color: #d97706;
  font-size: 1.25rem;
}

.ap-pdf-btn {
  background: #0b2545;
  color: #ffffff !important;
  font-weight: 700;
  font-size: 0.88rem;
  padding: 10px 20px;
  border-radius: 8px;
  display: inline-flex;
  align-items: center;
  gap: 8px;
  text-decoration: none !important;
  border: 1px solid #134074;
  transition: all 0.2s ease;
}
.ap-pdf-btn:hover {
  background: #f59e0b;
  color: #0b2545 !important;
  border-color: #d97706;
  transform: translateY(-1px);
}

.ap-step-num {
  width: 36px;
  height: 36px;
  border-radius: 50%;
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #fbbf24;
  font-weight: 700;
  font-size: 1rem;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  border: 2px solid #fde68a;
}

.ap-flowchart-box {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 1rem;
  text-align: center;
  overflow: hidden;
}
.ap-flowchart-img {
  max-width: 100%;
  height: auto;
  border-radius: 8px;
  box-shadow: 0 4px 14px rgba(0,0,0,0.06);
  border: 1px solid #e2e8f0;
  transition: transform 0.3s ease;
}
.ap-flowchart-img:hover {
  transform: scale(1.01);
}

.ap-cta-banner {
  background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%);
  border: 1px solid #fde68a;
  border-radius: 12px;
  padding: 1.25rem 1.5rem;
}
</style>

<section class="subpage-main-section ap-section py-4 py-md-5">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="ap-main-card">

          <!-- Header Banner -->
          <div class="an-header-banner ap-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-1.5 rounded-pill" style="background:rgba(255,255,255,0.15); border:1px solid rgba(255,255,255,0.3);">
                <i class="fa-solid fa-list-check me-1"></i> Official Admission Guidelines &amp; Directives
              </span>
              <h1 class="fw-bold text-white mb-1 fs-3">ADMISSION PROCEDURE 2026-27</h1>
              <p class="text-white-50 mb-0 small">Guidelines &amp; Approval by State Regulatory Authorities (MP PURC &amp; UGC)</p>
            </div>
            <div class="d-flex flex-wrap gap-2">
              <a href="<?php echo $pdf_path; ?>" target="_blank" rel="noopener" class="ap-pdf-btn">
                <i class="fa-solid fa-file-pdf text-warning"></i> Admission Procedure (Click Here)
              </a>
              <a href="<?php echo BASE_URL; ?>Admission/AdmissionRegistration.php" class="ap-pdf-btn" style="background: #f59e0b; color: #0b2545 !important; border-color: #d97706;">
                <i class="fa-solid fa-user-plus"></i> Online Registration
              </a>
            </div>
          </div>

          <!-- Content Body -->
          <div class="p-3.5 p-md-4">

            <!-- Stat Chips -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-sm-6 col-md-3">
                <div class="ap-stat-chip">
                  <div class="ap-stat-icon"><i class="fa-solid fa-building-columns"></i></div>
                  <div>
                    <span class="text-muted extra-small uppercase fw-bold d-block">Regulatory Authority</span>
                    <strong class="text-dark fs-6">MP PURC &amp; UGC</strong>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="ap-stat-chip">
                  <div class="ap-stat-icon"><i class="fa-solid fa-gavel"></i></div>
                  <div>
                    <span class="text-muted extra-small uppercase fw-bold d-block">Fee Approval</span>
                    <strong class="text-dark fs-6">Niyamak Aayog</strong>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="ap-stat-chip">
                  <div class="ap-stat-icon"><i class="fa-solid fa-user-plus"></i></div>
                  <div>
                    <span class="text-muted extra-small uppercase fw-bold d-block">Admission Mode</span>
                    <strong class="text-dark fs-6">Online &amp; Direct</strong>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="ap-stat-chip">
                  <div class="ap-stat-icon"><i class="fa-solid fa-shield-halved"></i></div>
                  <div>
                    <span class="text-muted extra-small uppercase fw-bold d-block">Verification</span>
                    <strong class="text-dark fs-6">Transparent &amp; Merit</strong>
                  </div>
                </div>
              </div>
            </div>

            <!-- Overview Section (Exact Live Content) -->
            <div class="ap-card">
              <div class="ap-card-header">
                <i class="fa-solid fa-circle-info"></i>
                <h5 class="fw-bold text-dark mb-0">Admission Procedure</h5>
              </div>
              <div class="text-dark" style="text-align: justify; line-height: 1.8;">
                <p class="mb-3">
                  Admissions to various Technical, Professional &amp; General Courses will be made in accordance with the guidelines provided by University Regulatory Authority, M.P. &amp; State Government of Madhya Pradesh, as amended or suggested from time to time. The fees charged for all the courses will be as per approval accorded by <strong>Madhya Pradesh Niji Vishwavidyalaya Niyamak Aayog, Bhopal (Madhya Pradesh)</strong>.
                </p>

                <div class="ap-cta-banner d-flex align-items-center justify-content-between flex-wrap gap-3 mt-3">
                  <div class="d-flex align-items-center gap-3">
                    <i class="fa-solid fa-file-pdf fs-2 text-danger"></i>
                    <div>
                      <strong class="text-dark d-block">Official Admission Procedure Document (PDF)</strong>
                      <span class="text-muted extra-small">Detailed guidelines, ordinance references, eligibility &amp; fee regulations</span>
                    </div>
                  </div>
                  <a href="<?php echo $pdf_path; ?>" target="_blank" rel="noopener" class="ap-pdf-btn">
                    <i class="fa-solid fa-download"></i> Admission Procedure (Click Here)
                  </a>
                </div>
              </div>
            </div>

            <!-- Official Admission Flowchart / Advertisement (Local Image) -->
            <div class="ap-card">
              <div class="ap-card-header">
                <i class="fa-solid fa-image"></i>
                <h5 class="fw-bold text-dark mb-0">Admission Advertisement &amp; Course Flowchart</h5>
              </div>
              <div class="ap-flowchart-box">
                <img src="<?php echo $chart_img_path; ?>" alt="Admission Procedure Flowchart" class="ap-flowchart-img" loading="lazy">
                <div class="mt-2 text-muted extra-small">
                  <i class="fa-solid fa-magnifying-glass me-1"></i> Official SSSUTMS Admission Advertisement &amp; Flowchart
                </div>
              </div>
            </div>

            <!-- Step-by-Step Procedure Cards -->
            <div class="ap-card mb-0">
              <div class="ap-card-header">
                <i class="fa-solid fa-diagram-project"></i>
                <h5 class="fw-bold text-dark mb-0">Step-by-Step Admission Process</h5>
              </div>

              <div class="d-flex flex-column gap-3">
                <div class="p-3 bg-light border rounded-3 d-flex align-items-start gap-3">
                  <span class="ap-step-num">1</span>
                  <div>
                    <h6 class="fw-bold text-dark mb-1">Online Registration / E-Pravesh Application</h6>
                    <p class="extra-small text-muted mb-0">Submit the official online admission form with personal credentials, preferred program/discipline choice, and qualifying academic marks.</p>
                  </div>
                </div>

                <div class="p-3 bg-light border rounded-3 d-flex align-items-start gap-3">
                  <span class="ap-step-num">2</span>
                  <div>
                    <h6 class="fw-bold text-dark mb-1">Merit Assessment &amp; Counseling Seat Allotment</h6>
                    <p class="extra-small text-muted mb-0">Seats are allocated based on qualifying merit scores or national/state-level entrance examination rank in accordance with MP PURC regulations.</p>
                  </div>
                </div>

                <div class="p-3 bg-light border rounded-3 d-flex align-items-start gap-3">
                  <span class="ap-step-num">3</span>
                  <div>
                    <h6 class="fw-bold text-dark mb-1">Document Verification at Central Cell</h6>
                    <p class="extra-small text-muted mb-0">Original academic marksheets (10th/12th/Graduation), Transfer Certificate (TC), Migration, Category Proof, and Domicile are verified by university scrutiny team.</p>
                  </div>
                </div>

                <div class="p-3 bg-light border rounded-3 d-flex align-items-start gap-3">
                  <span class="ap-step-num">4</span>
                  <div>
                    <h6 class="fw-bold text-dark mb-1">Tuition Fee Deposit &amp; Enrollment Confirmation</h6>
                    <p class="extra-small text-muted mb-0">Deposit prescribed regulatory fees through central bank counter / online payment portal to obtain final Admission Receipt and Enrollment Number.</p>
                  </div>
                </div>
              </div>

            </div>

          </div>
        </div><!-- end ap-main-card -->
      </div><!-- end col-lg-8 -->

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>