<?php
$page_title = 'Admission Procedure - SSSUTMS';
$banner_title = 'Admission Procedure';
$banner_category = 'Admission';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';

$pdf_path = BASE_URL . 'assets/images/Files/Link/Admission/adm_procedure.pdf';
?>

<style>
.ap-section { background-color: #f8fafc; }
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
  border-radius: 14px;
  padding: 16px 14px;
  display: flex; align-items: center; gap: 12px;
  height: 100%;
  transition: all 0.25s ease;
  box-shadow: 0 4px 12px rgba(0,0,0,0.02);
}
.ap-stat-chip:hover {
  border-color: #cbd5e1;
  box-shadow: 0 6px 18px rgba(11,37,69,0.07);
  transform: translateY(-2px);
}
.ap-stat-icon {
  width: 48px; height: 48px;
  border-radius: 12px;
  background: rgba(245,158,11,0.12);
  color: #d97706;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.35rem; flex-shrink: 0;
}
.ap-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 16px;
  padding: 1.5rem;
  box-shadow: 0 4px 16px rgba(0,0,0,0.02);
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
  color: #f59e0b;
  font-size: 1.3rem;
}
.ap-pdf-btn {
  background: linear-gradient(135deg, #0b2545 0%, #1e4d8c 100%);
  color: #ffffff !important;
  font-weight: 700;
  padding: 12px 22px;
  border-radius: 12px;
  display: inline-flex;
  align-items: center;
  gap: 10px;
  text-decoration: none !important;
  box-shadow: 0 4px 14px rgba(11,37,69,0.15);
  transition: all 0.25s ease;
}
.ap-pdf-btn:hover {
  background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
  color: #ffffff !important;
  transform: translateY(-2px);
  box-shadow: 0 6px 20px rgba(217,119,6,0.3);
}
.ap-step-num {
  width: 38px; height: 38px;
  border-radius: 50%;
  background: linear-gradient(135deg, #0b2545 0%, #1e4d8c 100%);
  color: #fbbf24;
  font-weight: 700;
  font-size: 1.1rem;
  display: flex; align-items: center; justify-content: center;
  flex-shrink: 0;
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
                <i class="fa-solid fa-list-check me-1"></i> Admission Guidelines &amp; Steps
              </span>
              <h3 class="fw-bold text-white mb-1 fs-3">ADMISSION PROCEDURE 2026-27</h3>
              <p class="text-white-50 mb-0 small">Official State Government &amp; Regulatory Commission Admission Guidelines</p>
            </div>
            <div>
              <a href="<?php echo $pdf_path; ?>" target="_blank" rel="noopener" class="ap-pdf-btn">
                <i class="fa-solid fa-file-pdf fs-5 text-warning"></i> Download Admission Procedure (PDF)
              </a>
            </div>
          </div>

          <!-- Content Body -->
          <div class="p-4">

            <!-- Stat Chips -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-sm-6 col-md-3">
                <div class="ap-stat-chip">
                  <div class="ap-stat-icon"><i class="fa-solid fa-building-columns"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Regulatory Authority</div>
                    <div class="fw-bold text-dark fs-6">MP Regulatory Body</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="ap-stat-chip">
                  <div class="ap-stat-icon"><i class="fa-solid fa-gavel"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Fee Approval</div>
                    <div class="fw-bold text-dark fs-6">Niji Vishwavidyalaya Aayog</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="ap-stat-chip">
                  <div class="ap-stat-icon"><i class="fa-solid fa-user-plus"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Mode</div>
                    <div class="fw-bold text-dark fs-6">Online &amp; Direct</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="ap-stat-chip">
                  <div class="ap-stat-icon"><i class="fa-solid fa-shield-halved"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Verification</div>
                    <div class="fw-bold text-dark fs-6">Transparent &amp; Merit-Based</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Overview Section -->
            <div class="ap-card">
              <div class="ap-card-header">
                <i class="fa-solid fa-circle-info text-warning"></i>
                <h5 class="fw-bold text-dark mb-0">Overview of Admission Process</h5>
              </div>
              <div class="lh-lg text-dark" style="text-align: justify;">
                <p>Admissions to various Technical, Professional &amp; General Courses at Sri Satya Sai University of Technology and Medical Sciences (SSSUTMS) are made in accordance with guidelines provided by the University Regulatory Authority, M.P., and the State Government of Madhya Pradesh, as amended or suggested from time to time.</p>

                <p class="mb-0">The fees charged for all courses are as per approval accorded by the <strong>Madhya Pradesh Niji Vishwavidyalaya Niyamak Aayog, Bhopal (Madhya Pradesh)</strong>.</p>
              </div>
            </div>

            <!-- Step-by-Step Procedure Cards -->
            <div class="ap-card mb-0">
              <div class="ap-card-header">
                <i class="fa-solid fa-diagram-project text-warning"></i>
                <h5 class="fw-bold text-dark mb-0">Step-by-Step Admission Process</h5>
              </div>

              <div class="d-flex flex-column gap-3">
                <div class="p-3 bg-light border rounded-3 d-flex align-items-start gap-3">
                  <span class="ap-step-num">1</span>
                  <div>
                    <h6 class="fw-bold text-primary mb-1">Online Registration / E-Pravesh Form</h6>
                    <p class="small text-muted mb-0">Fill out the official online registration form or E-Pravesh enquiry form with candidate details, course choice, and academic qualifications.</p>
                  </div>
                </div>

                <div class="p-3 bg-light border rounded-3 d-flex align-items-start gap-3">
                  <span class="ap-step-num">2</span>
                  <div>
                    <h6 class="fw-bold text-primary mb-1">Counselling &amp; Seat Allotment</h6>
                    <p class="small text-muted mb-0">Participate in university counselling based on qualifying exam marks or entrance scores. Receive provisional seat allotment letter.</p>
                  </div>
                </div>

                <div class="p-3 bg-light border rounded-3 d-flex align-items-start gap-3">
                  <span class="ap-step-num">3</span>
                  <div>
                    <h6 class="fw-bold text-primary mb-1">Document Verification</h6>
                    <p class="small text-muted mb-0">Submit original marksheets (10th/12th/Graduation), Transfer Certificate (TC), Migration, Character Certificate, and Category Certificate for verification.</p>
                  </div>
                </div>

                <div class="p-3 bg-light border rounded-3 d-flex align-items-start gap-3">
                  <span class="ap-step-num">4</span>
                  <div>
                    <h6 class="fw-bold text-primary mb-1">Fee Payment &amp; Final Admission Confirmation</h6>
                    <p class="small text-muted mb-0">Deposit prescribed tuition fee via PNB bank counter, online payment gateway (UPI/Netbanking/Debit Card), or Demand Draft to confirm enrollment.</p>
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