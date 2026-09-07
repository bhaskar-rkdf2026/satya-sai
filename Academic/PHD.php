<?php
$page_title = 'PHD - SSSUTMS';
$banner_title = 'PHD';
$banner_category = 'Academic';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?>

<style>
.phd-page-section { background-color: #f8fafc; }
.phd-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15,23,42,0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}
.phd-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2rem;
  position: relative;
}
.phd-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.phd-stat-chip {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 14px 18px;
  display: flex; align-items: center; gap: 14px;
  height: 100%;
  transition: all 0.2s ease;
}
.phd-stat-chip:hover {
  border-color: #cbd5e1;
  box-shadow: 0 4px 14px rgba(0,0,0,0.04);
}
.phd-stat-icon {
  width: 44px; height: 44px;
  border-radius: 10px;
  background: rgba(245,158,11,0.1);
  color: #d97706;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.25rem; flex-shrink: 0;
}
.phd-section-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 1.5rem;
  box-shadow: 0 4px 16px rgba(0,0,0,0.02);
  margin-bottom: 1.5rem;
}
.phd-section-header {
  display: flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 1.25rem;
  padding-bottom: 0.75rem;
  border-bottom: 2px solid #f1f5f9;
}
.phd-section-header i {
  color: #f59e0b;
  font-size: 1.25rem;
}
.phd-link-list {
  list-style: none;
  padding: 0;
  margin: 0;
}
.phd-link-item {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 14px;
  border-radius: 8px;
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  margin-bottom: 8px;
  transition: all 0.2s ease;
}
.phd-link-item:hover {
  background: #f1f5f9;
  border-color: #cbd5e1;
}
.phd-link-item > span:first-child,
.phd-link-item > a:not(.phd-badge-btn) {
  color: #0b2545;
  font-weight: 600;
  font-size: 0.92rem;
  text-decoration: none;
}
.phd-link-item > a:not(.phd-badge-btn):hover {
  color: #d97706;
}
.phd-badge-btn {
  background: linear-gradient(135deg, #0b2545 0%, #1e4d8c 100%) !important;
  color: #ffffff !important;
  font-size: 0.82rem;
  font-weight: 700;
  padding: 7px 10px;
  border-radius: 8px;
  border: 1px solid rgba(245,158,11,0.35);
  text-decoration: none !important;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 7px;
  white-space: nowrap;
  width: 195px;
  flex-shrink: 0;
  box-shadow: 0 2px 6px rgba(11,37,69,0.15);
  transition: all 0.25s ease;
}
.phd-badge-btn i {
  color: #fbbf24 !important;
  transition: color 0.2s ease;
}
.phd-badge-btn:hover {
  background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%) !important;
  color: #ffffff !important;
  border-color: #d97706;
  box-shadow: 0 4px 12px rgba(217,119,6,0.35);
  transform: translateY(-1px);
}
.phd-badge-btn:hover i {
  color: #ffffff !important;
}
.phd-fee-card {
  background: linear-gradient(135deg, #fffbe0 0%, #fff7ed 100%);
  border: 1px solid #fed7aa;
  border-radius: 12px;
  padding: 1.25rem 1.5rem;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 1rem;
  flex-wrap: wrap;
  margin-bottom: 1.5rem;
}
</style>

<section class="subpage-main-section phd-page-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="phd-main-card">

          <!-- Banner Header -->
          <div class="phd-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-graduation-cap me-1"></i> Academic Research
              </span>
              <h3 class="fw-bold text-white mb-0 fs-3">DOCTOR OF PHILOSOPHY (Ph.D.)</h3>
            </div>
          </div>

          <!-- Body -->
          <div class="p-4">

            <!-- Stat Chips -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-sm-6 col-md-3">
                <div class="phd-stat-chip">
                  <div class="phd-stat-icon"><i class="fa-solid fa-book-bookmark"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Program</div>
                    <div class="fw-bold text-dark fs-6">Ph.D. Degree</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="phd-stat-chip">
                  <div class="phd-stat-icon"><i class="fa-solid fa-shield-halved"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Compliance</div>
                    <div class="fw-bold text-dark fs-6">UGC 2022</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="phd-stat-chip">
                  <div class="phd-stat-icon"><i class="fa-solid fa-file-pen"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Entrance Test</div>
                    <div class="fw-bold text-dark fs-6">Ph.D. Entrance</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="phd-stat-chip">
                  <div class="phd-stat-icon"><i class="fa-solid fa-folder-open"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Guidelines</div>
                    <div class="fw-bold text-dark fs-6">Formats &amp; Forms</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Overview Paragraph -->
            <div class="phd-section-card">
              <div class="phd-section-header">
                <i class="fa-solid fa-university"></i>
                <h5 class="fw-bold text-dark mb-0">Doctoral Programs (Ph.D.) &mdash; Overview</h5>
              </div>
              <p class="text-secondary lh-base mb-0" style="font-size: 0.95rem;">
                Sri Satya Sai University of Technology And Medical Sciences, Sehore offers Doctoral Programs (Ph.D.) in various research areas. At present, Ph.D. programme is being offered in the Faculty of Engineering &amp; Technology, Pharmacy, Management, Education, Basic &amp; Applied Sciences, Commerce, Social Sciences, Humanities, and English.
              </p>
            </div>

            <!-- Fee Structure Highlight Card -->
            <div class="phd-fee-card">
              <div class="d-flex align-items-center gap-3">
                <div class="phd-stat-icon" style="background:#f59e0b; color:#fff;">
                  <i class="fa-solid fa-indian-rupee-sign"></i>
                </div>
                <div>
                  <h6 class="fw-bold text-dark mb-1">Fees Structure of Ph.D. (Session 2025-26)</h6>
                  <span class="text-muted small">Download official fee details for the 2025-26 academic session</span>
                </div>
              </div>
              <a href="<?php echo BASE_URL; ?>assets/pdf/phd/Ph.D._fees_structure_2025_new_20092025_1147_14012026_1240.pdf" target="_blank" rel="noopener" class="phd-badge-btn">
                <i class="fa-solid fa-file-pdf"></i> Download PDF
              </a>
            </div>

            <!-- Undertaking & UGC Compliance Card -->
            <div class="phd-section-card">
              <div class="phd-section-header">
                <i class="fa-solid fa-file-signature"></i>
                <h5 class="fw-bold text-dark mb-0">Undertaking &amp; UGC Compliance</h5>
              </div>
              <p class="text-secondary small mb-3">
                I, Dr. Rajesh Sharma, Registrar, Sri Satya Sai University of Technology and Medical Sciences, Sehore MP, ensure that has compliance the recommendation of UGC Standing Committee from point 01 to 04 are as follows:
              </p>
              
              <div class="mb-3 p-3 bg-light rounded border">
                <a href="<?php echo BASE_URL; ?>assets/pdf/phd/pHD_ORDINA_29092025_1128.pdf" target="_blank" rel="noopener" class="fw-bold text-dark text-decoration-none d-flex align-items-center justify-content-between flex-wrap gap-2">
                  <span><i class="fa-solid fa-scale-balanced me-2 text-warning"></i> UGC (Minimum Standards and Procedures for Award of Ph.D. Degree) Regulation, 2022</span>
                  <span class="phd-badge-btn"><i class="fa-solid fa-arrow-up-right-from-square"></i> Ordinance PDF</span>
                </a>
              </div>

              <p class="text-secondary small mb-2 fw-bold">
                The University should upload the following information prominently on the University website at appropriate place:
              </p>

              <ul class="phd-link-list">
                <li class="phd-link-item">
                  <span>(i) Research Policy</span>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/phd/Recharch%20policy.pdf" target="_blank" rel="noopener" class="phd-badge-btn"><i class="fa-solid fa-file-pdf"></i> View PDF</a>
                </li>
                <li class="phd-link-item">
                  <span>(ii) Admission Policy for the Ph.D. Programme</span>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/phd/admissionprocedure.pdf" target="_blank" rel="noopener" class="phd-badge-btn"><i class="fa-solid fa-file-pdf"></i> View PDF</a>
                </li>
                <li class="phd-link-item">
                  <span>(iii) Fellowship/Scholarship Policy for Ph.D. Scholars</span>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/phd/fellowship.pdf" target="_blank" rel="noopener" class="phd-badge-btn"><i class="fa-solid fa-file-pdf"></i> View PDF</a>
                </li>
                <li class="phd-link-item">
                  <span>(iv) Constitution of Ethics Board to maintain Research Integrity</span>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/phd/ethics%20commitee.pdf" target="_blank" rel="noopener" class="phd-badge-btn"><i class="fa-solid fa-file-pdf"></i> View PDF</a>
                </li>
                <li class="phd-link-item">
                  <span>(v) Constitution of Research Advisory Committee (RAC) and Doctoral Research Committee (DRC)</span>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/phd/rac.pdf" target="_blank" rel="noopener" class="phd-badge-btn"><i class="fa-solid fa-file-pdf"></i> View PDF</a>
                </li>
                <li class="phd-link-item">
                  <span>(vi) Policy for Grievance Redress Mechanism of Scholars</span>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/phd/Policy%20for%20Grievance.pdf" target="_blank" rel="noopener" class="phd-badge-btn"><i class="fa-solid fa-file-pdf"></i> View PDF</a>
                </li>
                <li class="phd-link-item">
                  <span>(vii) Details about Ph.D. Scholars Currently Enrolled</span>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/phd/enrollment.pdf" target="_blank" rel="noopener" class="phd-badge-btn"><i class="fa-solid fa-file-pdf"></i> View PDF</a>
                </li>
              </ul>

              <p class="text-secondary small mt-3 mb-0">
                I also ensure that the University will follow all the UGC Regulation, 2022 for the award of Ph.D. Degree.
              </p>
              <div class="text-end mt-2">
                <span class="fw-bold text-dark">&mdash; Registrar</span>
              </div>
            </div>

            <!-- Syllabus Card -->
            <div class="phd-section-card">
              <div class="phd-section-header">
                <i class="fa-solid fa-book-open"></i>
                <h5 class="fw-bold text-dark mb-0">Ph.D. Entrance Test &amp; Course Work Syllabus</h5>
              </div>
              <p class="fw-semibold text-dark small mb-2">First Semester (w.e.f. 2021-22):</p>
              <ul class="phd-link-list">
                <li class="phd-link-item">
                  <span>Research Methodology</span>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/phd/RM_27052026_0350.pdf" target="_blank" rel="noopener" class="phd-badge-btn"><i class="fa-solid fa-file-pdf"></i> Syllabus PDF</a>
                </li>
                <li class="phd-link-item">
                  <span>Subject Specialization - I</span>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/phd/Ph.D._Course_Work_I_Semeter_Syllabus_New_27052026_0350.pdf" target="_blank" rel="noopener" class="phd-badge-btn"><i class="fa-solid fa-file-pdf"></i> Syllabus PDF</a>
                </li>
                <li class="phd-link-item">
                  <span>Research &amp; Publication Ethics</span>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/phd/CW_(RPE)_Syllabus_28052026_0420.pdf" target="_blank" rel="noopener" class="phd-badge-btn"><i class="fa-solid fa-file-pdf"></i> Syllabus PDF</a>
                </li>
              </ul>
            </div>

            <!-- Formats & Guidelines Card -->
            <div class="phd-section-card">
              <div class="phd-section-header">
                <i class="fa-solid fa-folder-open"></i>
                <h5 class="fw-bold text-dark mb-0">Formats &amp; Guidelines</h5>
              </div>
              <ul class="phd-link-list">
                <li class="phd-link-item">
                  <span>Format for RDC Synopsis</span>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/phd/RDCSYP_2.pdf" target="_blank" rel="noopener" class="phd-badge-btn"><i class="fa-solid fa-download"></i> Download</a>
                </li>
                <li class="phd-link-item">
                  <span>Format of Confidential Progress Report</span>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/phd/PHDCONFR.pdf" target="_blank" rel="noopener" class="phd-badge-btn"><i class="fa-solid fa-download"></i> Download</a>
                </li>
                <li class="phd-link-item">
                  <span>Circular: Prior to submission of Ph.D. Thesis</span>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/phd/PHDTHFORMAT_RR.pdf" target="_blank" rel="noopener" class="phd-badge-btn"><i class="fa-solid fa-file-pdf"></i> View Circular</a>
                </li>
                <li class="phd-link-item">
                  <span>Guideline for Ph.D. Pre Submission Viva Voce</span>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/phd/PHDTHGUIDE_RRev_16072026_0356.pdf" target="_blank" rel="noopener" class="phd-badge-btn"><i class="fa-solid fa-file-pdf"></i> View Guideline</a>
                </li>
                <li class="phd-link-item">
                  <span>Proforma for Pre-submission of the Thesis</span>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/phd/Phd_Pre_submission_Form_2.pdf" target="_blank" rel="noopener" class="phd-badge-btn"><i class="fa-solid fa-download"></i> Download Proforma</a>
                </li>
                <li class="phd-link-item">
                  <span>Guideline/Format for preparing Thesis / Dissertation / Summary</span>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/phd/PHDTHFORMAT_RR_16072026_0355.pdf" target="_blank" rel="noopener" class="phd-badge-btn"><i class="fa-solid fa-file-pdf"></i> View Guideline</a>
                </li>
                <li class="phd-link-item">
                  <span>Guideline/Format for preparing Thesis / Dissertation / Summary (Hindi)</span>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/phd/PHDTHFORMAT_RR_(1)_02062022_1255.pdf" target="_blank" rel="noopener" class="phd-badge-btn"><i class="fa-solid fa-file-pdf"></i> View (Hindi)</a>
                </li>
                <li class="phd-link-item">
                  <span>Proforma for Final-submission of the Thesis</span>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/phd/Phd_Final_submission_Form_2.pdf" target="_blank" rel="noopener" class="phd-badge-btn"><i class="fa-solid fa-download"></i> Download Proforma</a>
                </li>
                <li class="phd-link-item">
                  <span>Proforma for Approval of Co-Supervisor</span>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/phd/Co_supervisior.pdf" target="_blank" rel="noopener" class="phd-badge-btn"><i class="fa-solid fa-download"></i> Download Proforma</a>
                </li>
              </ul>
            </div>

          </div>
        </div><!-- end phd-main-card -->
      </div><!-- end col-lg-8 -->

      <!-- Sticky Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
