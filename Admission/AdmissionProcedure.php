<?php
$page_title = 'Admission Procedure - SSSUTMS';
$banner_title = 'Admission Procedure';
$banner_category = 'Admission';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?>

<style>
.ap-section { background-color: #f8fafc; font-family: 'Inter', system-ui, -apple-system, sans-serif; }
.ap-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15,23,42,0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}
.ap-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2.2rem 2rem;
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
  padding: 12px 14px;
  display: flex; align-items: center; gap: 11px;
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
  width: 42px; height: 42px;
  border-radius: 10px;
  background: rgba(245,158,11,0.12);
  color: #d97706;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.15rem; flex-shrink: 0;
}
.ap-step-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-left: 4px solid #0b2545;
  border-radius: 14px;
  padding: 1.5rem;
  margin-bottom: 1.25rem;
  box-shadow: 0 4px 14px rgba(0,0,0,0.02);
  transition: all 0.25s ease;
}
.ap-step-card:hover {
  border-left-color: #f59e0b;
  box-shadow: 0 8px 24px rgba(11,37,69,0.08);
  transform: translateY(-2px);
}
.ap-step-num {
  width: 36px; height: 36px;
  border-radius: 50%;
  background: linear-gradient(135deg, #0b2545 0%, #1e4d8c 100%);
  color: #fbbf24;
  display: flex; align-items: center; justify-content: center;
  font-weight: 800; font-size: 1rem;
  flex-shrink: 0;
}
.ap-doc-item {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 10px;
  padding: 12px 16px;
  display: flex; align-items: center; gap: 12px;
  font-size: 0.92rem;
  color: #334155;
  transition: all 0.2s ease;
}
.ap-doc-item:hover {
  background: #ffffff;
  border-color: #cbd5e1;
  box-shadow: 0 4px 12px rgba(11,37,69,0.05);
}
.ap-doc-item i {
  color: #10b981;
  font-size: 1.1rem;
}
.ap-pdf-btn {
  background: linear-gradient(135deg, #0b2545 0%, #1e4d8c 100%) !important;
  color: #ffffff !important;
  font-weight: 700;
  font-size: 0.95rem;
  padding: 12px 24px;
  border-radius: 10px;
  border: 1px solid rgba(245,158,11,0.4);
  text-decoration: none !important;
  display: inline-flex; align-items: center; gap: 10px;
  box-shadow: 0 4px 14px rgba(11,37,69,0.15);
  transition: all 0.25s ease;
}
.ap-pdf-btn i {
  color: #fbbf24 !important;
}
.ap-pdf-btn:hover {
  background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%) !important;
  color: #ffffff !important;
  border-color: #d97706;
  box-shadow: 0 6px 18px rgba(217,119,6,0.35);
  transform: translateY(-2px);
}
</style>

<section class="subpage-main-section ap-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="ap-main-card">

          <!-- Header Banner -->
          <div class="ap-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-route me-1"></i> Step-by-Step Admission Guide
              </span>
              <h3 class="fw-bold text-white mb-1 fs-3">ADMISSION PROCEDURE 2026-27</h3>
              <p class="text-white-50 mb-0 small">Guidelines, Eligibility Norms, Verification Process &amp; Required Documents</p>
            </div>
            <div>
              <a href="https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Admission/adm_procedure.pdf" target="_blank" rel="noopener" class="ap-pdf-btn">
                <i class="fa-solid fa-file-pdf fs-5"></i> Official Procedure PDF
              </a>
            </div>
          </div>

          <!-- Content Body -->
          <div class="p-4">

            <!-- Stat Chips -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-sm-6 col-md-3">
                <div class="ap-stat-chip">
                  <div class="ap-stat-icon"><i class="fa-solid fa-clipboard-check"></i></div>
                  <div>
                    <span class="text-muted extra-small uppercase fw-bold d-block">Process</span>
                    <strong class="text-dark fs-6">4 Simple Steps</strong>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="ap-stat-chip">
                  <div class="ap-stat-icon"><i class="fa-solid fa-building-columns"></i></div>
                  <div>
                    <span class="text-muted extra-small uppercase fw-bold d-block">Regulatory Norms</span>
                    <strong class="text-dark fs-6">MP Purv Niyamak</strong>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="ap-stat-chip">
                  <div class="ap-stat-icon"><i class="fa-solid fa-laptop-code"></i></div>
                  <div>
                    <span class="text-muted extra-small uppercase fw-bold d-block">Mode</span>
                    <strong class="text-dark fs-6">Online &amp; Campus</strong>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="ap-stat-chip">
                  <div class="ap-stat-icon"><i class="fa-solid fa-headset"></i></div>
                  <div>
                    <span class="text-muted extra-small uppercase fw-bold d-block">Help Desk</span>
                    <strong class="text-dark fs-6">Counseling Cell</strong>
                  </div>
                </div>
              </div>
            </div>

            <!-- Regulatory Statement -->
            <div class="p-3.5 p-md-4 rounded-3 mb-4 bg-light border border-slate-200">
              <h5 class="fw-bold text-dark mb-2"><i class="fa-solid fa-scale-balanced text-warning me-2"></i>Regulatory Framework &amp; Fee Norms</h5>
              <p class="text-dark mb-0 lh-lg" style="text-align: justify;">
                Admissions to various Technical, Professional, Medical &amp; General Courses are conducted strictly in accordance with guidelines provided by the <strong>University Regulatory Authority, M.P.</strong> and the <strong>State Government of Madhya Pradesh</strong>, as amended or suggested from time to time. The fees charged for all programs conform to the approvals accorded by <em>Madhya Pradesh Niji Vishwavidyalaya Niyamak Aayog, Bhopal (M.P.)</em>.
              </p>
            </div>

            <!-- 4-Step Roadmap -->
            <h5 class="fw-bold text-dark mb-3"><i class="fa-solid fa-stairs text-warning me-2"></i>Admission Steps for Aspirants</h5>

            <!-- Step 1 -->
            <div class="ap-step-card">
              <div class="d-flex align-items-start gap-3">
                <div class="ap-step-num">1</div>
                <div>
                  <h5 class="fw-bold text-dark mb-1">Online / Offline Registration</h5>
                  <p class="text-muted small mb-0">Fill out the online application form via E-Pravesh portal or submit the registration form at the University Admission Cell with basic academic details and chosen course stream.</p>
                </div>
              </div>
            </div>

            <!-- Step 2 -->
            <div class="ap-step-card">
              <div class="d-flex align-items-start gap-3">
                <div class="ap-step-num">2</div>
                <div>
                  <h5 class="fw-bold text-dark mb-1">Counseling &amp; Merit Seat Allocation</h5>
                  <p class="text-muted small mb-0">Merit list and counseling schedules are published on the website. Candidates participate in counseling sessions based on qualifying exam scores (or entrance test ranks for Ph.D./BAMS/BHMS).</p>
                </div>
              </div>
            </div>

            <!-- Step 3 -->
            <div class="ap-step-card">
              <div class="d-flex align-items-start gap-3">
                <div class="ap-step-num">3</div>
                <div>
                  <h5 class="fw-bold text-dark mb-1">Document Verification</h5>
                  <p class="text-muted small mb-0">Verification of original certificates, transfer/migration documents, category certificates, and eligibility proofs at the central verification counter.</p>
                </div>
              </div>
            </div>

            <!-- Step 4 -->
            <div class="ap-step-card">
              <div class="d-flex align-items-start gap-3">
                <div class="ap-step-num">4</div>
                <div>
                  <h5 class="fw-bold text-dark mb-1">Fee Payment &amp; Enrollment Confirmation</h5>
                  <p class="text-muted small mb-0">Payment of approved tuition &amp; college fees through online gateway / PNB on-campus bank branch, followed by generation of official student ID and enrollment number.</p>
                </div>
              </div>
            </div>

            <!-- Mandatory Documents Checklist -->
            <div class="mt-4 pt-2">
              <h5 class="fw-bold text-dark mb-3"><i class="fa-solid fa-folder-open text-warning me-2"></i>Mandatory Documents Required at Admission</h5>
              <div class="row g-2.5 g-md-3">
                <div class="col-md-6">
                  <div class="ap-doc-item"><i class="fa-solid fa-circle-check"></i> 10th (High School) Marksheet &amp; Certificate</div>
                </div>
                <div class="col-md-6">
                  <div class="ap-doc-item"><i class="fa-solid fa-circle-check"></i> 12th (Higher Secondary) Marksheet</div>
                </div>
                <div class="col-md-6">
                  <div class="ap-doc-item"><i class="fa-solid fa-circle-check"></i> Graduation Marksheets &amp; Degree (for PG/Ph.D.)</div>
                </div>
                <div class="col-md-6">
                  <div class="ap-doc-item"><i class="fa-solid fa-circle-check"></i> Transfer Certificate (TC) in Original</div>
                </div>
                <div class="col-md-6">
                  <div class="ap-doc-item"><i class="fa-solid fa-circle-check"></i> Migration Certificate in Original</div>
                </div>
                <div class="col-md-6">
                  <div class="ap-doc-item"><i class="fa-solid fa-circle-check"></i> Character Certificate from Last Institution</div>
                </div>
                <div class="col-md-6">
                  <div class="ap-doc-item"><i class="fa-solid fa-circle-check"></i> Caste &amp; Domicile Certificate (if applicable)</div>
                </div>
                <div class="col-md-6">
                  <div class="ap-doc-item"><i class="fa-solid fa-circle-check"></i> Recent Passport Size Color Photographs (6 Copies)</div>
                </div>
                <div class="col-md-6">
                  <div class="ap-doc-item"><i class="fa-solid fa-circle-check"></i> Aadhaar Card Copy of Candidate &amp; Parents</div>
                </div>
                <div class="col-md-6">
                  <div class="ap-doc-item"><i class="fa-solid fa-circle-check"></i> Income Certificate (for Scholarship / Reserved)</div>
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
