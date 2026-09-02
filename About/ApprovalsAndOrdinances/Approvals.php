<?php
$page_title = 'Approvals - SSSUTMS';
$banner_title = 'Approvals';
$banner_category = 'About';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
.app-page-section {
  background-color: #f8fafc;
}
.app-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
  overflow: hidden;
}
.app-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2rem;
  position: relative;
}
.app-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #2563eb, #3b82f6);
}
.app-notification-box {
  background: #f8fafc;
  border-left: 4px solid #0b2545;
  border-radius: 12px;
  padding: 1.25rem 1.5rem;
  margin-bottom: 1.5rem;
  box-shadow: 0 2px 10px rgba(0,0,0,0.02);
}
.app-notification-box p {
  font-size: 0.95rem;
  line-height: 1.65;
  color: #334155;
}
.app-category-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 16px;
  padding: 1.25rem 1.5rem;
  margin-bottom: 1.25rem;
  box-shadow: 0 4px 16px rgba(0,0,0,0.02);
}
.app-category-header {
  display: flex;
  align-items: center;
  gap: 10px;
  border-bottom: 2px solid #f1f5f9;
  padding-bottom: 0.75rem;
  margin-bottom: 1rem;
}
.app-category-icon {
  width: 36px;
  height: 36px;
  border-radius: 10px;
  background: rgba(37, 99, 235, 0.1);
  color: #2563eb;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.1rem;
  flex-shrink: 0;
}
.app-pdf-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
  gap: 12px;
}
.app-pdf-item {
  display: flex;
  align-items: center;
  justify-content: space-between;
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 10px;
  padding: 10px 14px;
  text-decoration: none;
  color: #1e293b;
  transition: all 0.2s ease;
}
.app-pdf-item:hover {
  background: #ffffff;
  border-color: #cbd5e1;
  box-shadow: 0 4px 12px rgba(37, 99, 235, 0.08);
  color: #2563eb;
  transform: translateY(-2px);
}
.app-pdf-item .doc-title {
  font-size: 0.88rem;
  font-weight: 600;
  line-height: 1.3;
}
.app-pdf-item .pdf-badge {
  display: inline-flex;
  align-items: center;
  gap: 4px;
  padding: 4px 10px;
  background: #dc2626;
  color: #ffffff;
  font-size: 0.75rem;
  font-weight: 700;
  border-radius: 6px;
  flex-shrink: 0;
}
</style>

<section class="subpage-main-section app-page-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        
        <!-- Main Card Wrapper -->
        <div class="app-main-card mb-4">
          
          <!-- Banner Header -->
          <div class="app-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge bg-primary text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill">
                <i class="fa-solid fa-stamp me-1"></i> Government Gazette &amp; Statutory Approvals
              </span>
              <h3 class="fw-bold text-white mb-0 fs-3">STATUTORY &amp; REGULATORY APPROVALS</h3>
            </div>
          </div>

          <!-- Body Container -->
          <div class="p-4">
            
            <!-- Statutory Notification Text -->
            <div class="app-notification-box">
              <div class="d-flex align-items-start gap-3">
                <div class="text-primary fs-4 mt-1">
                  <i class="fa-solid fa-circle-info"></i>
                </div>
                <div>
                  <h6 class="fw-bold text-dark mb-1">State Government Gazette Notification</h6>
                  <p class="mb-0 text-justify">
                    On recommendations of Madhya Pradesh Niji Vishwavidyalaya Niyamak Aayog, the State Legislature of Madhya Pradesh has accorded approval to Sri Satya Sai University of Technology &amp; Medical Sciences (SSSUTMS) as State Private University with main campus at Sehore from Academic session 2014-15 vide Gazette Notification of State Government of M.P., Act no. 06 No.80 dated 12th February 2014 {The Madhya Pradesh Niji Vishwavidyalaya (Sthapana &amp; Sanchalan) Sansodhan Adhiniyam 2014}.
                  </p>
                </div>
              </div>
            </div>

            <!-- Group 1: General & Commission Approvals -->
            <div class="app-category-card">
              <div class="app-category-header">
                <div class="app-category-icon"><i class="fa-solid fa-building-columns"></i></div>
                <h5 class="fw-bold text-dark mb-0 fs-5">Regulatory Commissions &amp; Councils (UGC, MPPURC, Paramedical)</h5>
              </div>
              <div class="app-pdf-grid">
                <a href="<?php echo BASE_URL; ?>assets/pdf/IMG_0002.pdf" target="_blank" rel="noopener" class="app-pdf-item">
                  <span class="doc-title">MPPURC 22/06/2023</span>
                  <span class="pdf-badge"><i class="fa-solid fa-file-pdf"></i> PDF</span>
                </a>
                <a href="<?php echo BASE_URL; ?>assets/pdf/MPPURC.pdf" target="_blank" rel="noopener" class="app-pdf-item">
                  <span class="doc-title">MPPURC 22/09/2014</span>
                  <span class="pdf-badge"><i class="fa-solid fa-file-pdf"></i> PDF</span>
                </a>
                <a href="<?php echo BASE_URL; ?>assets/pdf/Sri_Satya_Sai_MBBS_9_B__05022025_0432.pdf" target="_blank" rel="noopener" class="app-pdf-item">
                  <span class="doc-title">MPPURC 21/01/2025</span>
                  <span class="pdf-badge"><i class="fa-solid fa-file-pdf"></i> PDF</span>
                </a>
                <a href="<?php echo BASE_URL; ?>assets/pdf/451_Sri_Satya_Sai_Uni_BALLB_23.02.26_28022026_0252.pdf" target="_blank" rel="noopener" class="app-pdf-item">
                  <span class="doc-title">MPPURC 23/02/2026</span>
                  <span class="pdf-badge"><i class="fa-solid fa-file-pdf"></i> PDF</span>
                </a>
                <a href="<?php echo BASE_URL; ?>assets/pdf/DOC-20250414-WA0000._11072025_0504.pdf" target="_blank" rel="noopener" class="app-pdf-item">
                  <span class="doc-title">MP Paramedical Council</span>
                  <span class="pdf-badge"><i class="fa-solid fa-file-pdf"></i> PDF</span>
                </a>
                <a href="<?php echo BASE_URL; ?>assets/pdf/2024_25_06082025_0351.pdf" target="_blank" rel="noopener" class="app-pdf-item">
                  <span class="doc-title">MP Paramedical Council 2024-25</span>
                  <span class="pdf-badge"><i class="fa-solid fa-file-pdf"></i> PDF</span>
                </a>
                <a href="<?php echo BASE_URL; ?>assets/pdf/affiliation_order_2025-26_shri_satya_sai_university_of_paramedical_sehore_1023_16052026_0213.pdf" target="_blank" rel="noopener" class="app-pdf-item">
                  <span class="doc-title">MP Paramedical Council 2025-26</span>
                  <span class="pdf-badge"><i class="fa-solid fa-file-pdf"></i> PDF</span>
                </a>
                <a href="<?php echo BASE_URL; ?>assets/pdf/ugcn.pdf" target="_blank" rel="noopener" class="app-pdf-item">
                  <span class="doc-title">UGC Recognition</span>
                  <span class="pdf-badge"><i class="fa-solid fa-file-pdf"></i> PDF</span>
                </a>
                <a href="<?php echo BASE_URL; ?>assets/pdf/8-26_Sri_Satya_Sai_University_of_Technology___Medical_Sciences_0001_12022025_0351.pdf" target="_blank" rel="noopener" class="app-pdf-item">
                  <span class="doc-title">UGC 12-B Status</span>
                  <span class="pdf-badge"><i class="fa-solid fa-file-pdf"></i> PDF</span>
                </a>
                <a href="<?php echo BASE_URL; ?>assets/pdf/AIUN.PDF" target="_blank" rel="noopener" class="app-pdf-item">
                  <span class="doc-title">AIU Membership</span>
                  <span class="pdf-badge"><i class="fa-solid fa-file-pdf"></i> PDF</span>
                </a>
                <a href="<?php echo BASE_URL; ?>assets/pdf/NEP_2020_27_university_14-compressed.pdf" target="_blank" rel="noopener" class="app-pdf-item">
                  <span class="doc-title">NEP 2020 - 2027</span>
                  <span class="pdf-badge"><i class="fa-solid fa-file-pdf"></i> PDF</span>
                </a>
              </div>
            </div>

            <!-- Group 2: AICTE Approvals -->
            <div class="app-category-card">
              <div class="app-category-header">
                <div class="app-category-icon"><i class="fa-solid fa-laptop-code"></i></div>
                <h5 class="fw-bold text-dark mb-0 fs-5">AICTE Approvals (2026-27 Reports)</h5>
              </div>
              <div class="app-pdf-grid">
                <a href="<?php echo BASE_URL; ?>assets/pdf/SOD_EOA_Report_2026-27.PDF" target="_blank" rel="noopener" class="app-pdf-item">
                  <span class="doc-title">School of Design</span>
                  <span class="pdf-badge"><i class="fa-solid fa-file-pdf"></i> PDF</span>
                </a>
                <a href="<?php echo BASE_URL; ?>assets/pdf/SOE_EOA_Report_2026-27.PDF" target="_blank" rel="noopener" class="app-pdf-item">
                  <span class="doc-title">School of Engineering</span>
                  <span class="pdf-badge"><i class="fa-solid fa-file-pdf"></i> PDF</span>
                </a>
                <a href="<?php echo BASE_URL; ?>assets/pdf/SOCA_EOA_Report_2026-27.PDF" target="_blank" rel="noopener" class="app-pdf-item">
                  <span class="doc-title">School of Computer Application</span>
                  <span class="pdf-badge"><i class="fa-solid fa-file-pdf"></i> PDF</span>
                </a>
                <a href="<?php echo BASE_URL; ?>assets/pdf/HM_EOA_Report_2026-27.PDF" target="_blank" rel="noopener" class="app-pdf-item">
                  <span class="doc-title">School of Hotel Management</span>
                  <span class="pdf-badge"><i class="fa-solid fa-file-pdf"></i> PDF</span>
                </a>
                <a href="<?php echo BASE_URL; ?>assets/pdf/SOMS_EOA_2026-27.PDF" target="_blank" rel="noopener" class="app-pdf-item">
                  <span class="doc-title">School of Management Studies</span>
                  <span class="pdf-badge"><i class="fa-solid fa-file-pdf"></i> PDF</span>
                </a>
                <a href="<?php echo BASE_URL; ?>assets/pdf/Poly_Engg_EOA_Report_2026-27.PDF" target="_blank" rel="noopener" class="app-pdf-item">
                  <span class="doc-title">Polytechnic (Engineering)</span>
                  <span class="pdf-badge"><i class="fa-solid fa-file-pdf"></i> PDF</span>
                </a>
                <a href="<?php echo BASE_URL; ?>assets/pdf/FOE_EOA_Report_2026-27.PDF" target="_blank" rel="noopener" class="app-pdf-item">
                  <span class="doc-title">Faculty of Education (BBA &amp; BCA)</span>
                  <span class="pdf-badge"><i class="fa-solid fa-file-pdf"></i> PDF</span>
                </a>
              </div>
            </div>

            <!-- Group 3: NCTE Approvals -->
            <div class="app-category-card">
              <div class="app-category-header">
                <div class="app-category-icon"><i class="fa-solid fa-person-chalkboard"></i></div>
                <h5 class="fw-bold text-dark mb-0 fs-5">NCTE Approvals (Teacher Education)</h5>
              </div>
              <div class="app-pdf-grid">
                <a href="<?php echo BASE_URL; ?>assets/pdf/SOE_NCTE.pdf" target="_blank" rel="noopener" class="app-pdf-item">
                  <span class="doc-title">School of Education</span>
                  <span class="pdf-badge"><i class="fa-solid fa-file-pdf"></i> PDF</span>
                </a>
                <a href="<?php echo BASE_URL; ?>assets/pdf/SOTE_NCTE.pdf" target="_blank" rel="noopener" class="app-pdf-item">
                  <span class="doc-title">School Teachers Education</span>
                  <span class="pdf-badge"><i class="fa-solid fa-file-pdf"></i> PDF</span>
                </a>
                <a href="<?php echo BASE_URL; ?>assets/pdf/SPE_NCTE.pdf" target="_blank" rel="noopener" class="app-pdf-item">
                  <span class="doc-title">School of Physical Education</span>
                  <span class="pdf-badge"><i class="fa-solid fa-file-pdf"></i> PDF</span>
                </a>
                <a href="<?php echo BASE_URL; ?>assets/pdf/FEDU2017.pdf" target="_blank" rel="noopener" class="app-pdf-item">
                  <span class="doc-title">Faculty of Education (2017)</span>
                  <span class="pdf-badge"><i class="fa-solid fa-file-pdf"></i> PDF</span>
                </a>
              </div>
            </div>

            <!-- Group 4: PCI Approvals -->
            <div class="app-category-card">
              <div class="app-category-header">
                <div class="app-category-icon"><i class="fa-solid fa-capsules"></i></div>
                <h5 class="fw-bold text-dark mb-0 fs-5">PCI Approvals (Pharmacy Council of India)</h5>
              </div>
              <div class="app-pdf-grid">
                <a href="<?php echo BASE_URL; ?>assets/pdf/PCI_APPROVAL_2025-26.pdf" target="_blank" rel="noopener" class="app-pdf-item">
                  <span class="doc-title">College of Pharmacy 2025-26</span>
                  <span class="pdf-badge"><i class="fa-solid fa-file-pdf"></i> PDF</span>
                </a>
                <a href="<?php echo BASE_URL; ?>assets/pdf/decision_letter__7__25082025_1249.pdf" target="_blank" rel="noopener" class="app-pdf-item">
                  <span class="doc-title">School of Pharmacy</span>
                  <span class="pdf-badge"><i class="fa-solid fa-file-pdf"></i> PDF</span>
                </a>
                <a href="<?php echo BASE_URL; ?>assets/pdf/Decision_Acadmic_Session_2025-2026_26082025_0140.pdf" target="_blank" rel="noopener" class="app-pdf-item">
                  <span class="doc-title">Polytechnic (Pharmacy) 2025-26</span>
                  <span class="pdf-badge"><i class="fa-solid fa-file-pdf"></i> PDF</span>
                </a>
                <a href="<?php echo BASE_URL; ?>assets/pdf/decision_letter__1__20082025_0123.pdf" target="_blank" rel="noopener" class="app-pdf-item">
                  <span class="doc-title">SRK Memorial School of Pharmacy</span>
                  <span class="pdf-badge"><i class="fa-solid fa-file-pdf"></i> PDF</span>
                </a>
              </div>
            </div>

            <!-- Group 5: Professional Councils (COA, BCI, AYUSH, ICAR) -->
            <div class="app-category-card">
              <div class="app-category-header">
                <div class="app-category-icon"><i class="fa-solid fa-gavel"></i></div>
                <h5 class="fw-bold text-dark mb-0 fs-5">Professional &amp; Specialized Councils (COA, BCI, AYUSH, ICAR)</h5>
              </div>
              <div class="app-pdf-grid">
                <a href="<?php echo BASE_URL; ?>assets/pdf/MP17_20250708134217_09072025_0151.pdf" target="_blank" rel="noopener" class="app-pdf-item">
                  <span class="doc-title">COA - School of Design</span>
                  <span class="pdf-badge"><i class="fa-solid fa-file-pdf"></i> PDF</span>
                </a>
                <a href="<?php echo BASE_URL; ?>assets/pdf/SCHOOL_OF_LAW__SRI_SATYA_SAI_UNIVERSITY_OF_TECHNOLOGY_AND_MEDICAL_SCIENCES__SEHORE__MADHYA_PRADESH-MP-BCIApproval-2026-2027_22072026_0310.pdf" target="_blank" rel="noopener" class="app-pdf-item">
                  <span class="doc-title">BCI - School of Law (B.A. LL.B)</span>
                  <span class="pdf-badge"><i class="fa-solid fa-file-pdf"></i> PDF</span>
                </a>
                <a href="<?php echo BASE_URL; ?>assets/pdf/Sri_Satya_Sai_Uni_of_Tech._and_Medical_Science_-_23.6.25_0001_0001_09072025_0150.pdf" target="_blank" rel="noopener" class="app-pdf-item">
                  <span class="doc-title">AYUSH - School of Homoeopathy</span>
                  <span class="pdf-badge"><i class="fa-solid fa-file-pdf"></i> PDF</span>
                </a>
                <a href="<?php echo BASE_URL; ?>assets/pdf/School_of_Ayurveda_Conditional_Permssion_MP.pdf" target="_blank" rel="noopener" class="app-pdf-item">
                  <span class="doc-title">AYUSH - School of Ayurveda</span>
                  <span class="pdf-badge"><i class="fa-solid fa-file-pdf"></i> PDF</span>
                </a>
                <a href="<?php echo BASE_URL; ?>assets/pdf/notification_12022025_0448.pdf" target="_blank" rel="noopener" class="app-pdf-item">
                  <span class="doc-title">ICAR - School of Agriculture</span>
                  <span class="pdf-badge"><i class="fa-solid fa-file-pdf"></i> PDF</span>
                </a>
              </div>
            </div>

            <!-- Group 6: MP Nurses Registration Council -->
            <div class="app-category-card">
              <div class="app-category-header">
                <div class="app-category-icon"><i class="fa-solid fa-user-nurse"></i></div>
                <h5 class="fw-bold text-dark mb-0 fs-5">MP Nurses Registration Council Approvals</h5>
              </div>
              <div class="app-pdf-grid">
                <a href="<?php echo BASE_URL; ?>assets/pdf/IMG_18102025_0117.pdf" target="_blank" rel="noopener" class="app-pdf-item">
                  <span class="doc-title">School of Nursing 2025-26</span>
                  <span class="pdf-badge"><i class="fa-solid fa-file-pdf"></i> PDF</span>
                </a>
                <a href="<?php echo BASE_URL; ?>assets/pdf/IMG_22022025_0434.pdf" target="_blank" rel="noopener" class="app-pdf-item">
                  <span class="doc-title">School of Nursing 2024-25</span>
                  <span class="pdf-badge"><i class="fa-solid fa-file-pdf"></i> PDF</span>
                </a>
                <a href="<?php echo BASE_URL; ?>assets/pdf/MPNRC_22-23.pdf" target="_blank" rel="noopener" class="app-pdf-item">
                  <span class="doc-title">School of Nursing 2022-23</span>
                  <span class="pdf-badge"><i class="fa-solid fa-file-pdf"></i> PDF</span>
                </a>
                <a href="<?php echo BASE_URL; ?>assets/pdf/Nursing_2021-22.pdf" target="_blank" rel="noopener" class="app-pdf-item">
                  <span class="doc-title">School of Nursing 2021-22</span>
                  <span class="pdf-badge"><i class="fa-solid fa-file-pdf"></i> PDF</span>
                </a>
                <a href="<?php echo BASE_URL; ?>assets/pdf/Nursing_2020_21_22072022_0121.pdf" target="_blank" rel="noopener" class="app-pdf-item">
                  <span class="doc-title">School of Nursing 2020-21</span>
                  <span class="pdf-badge"><i class="fa-solid fa-file-pdf"></i> PDF</span>
                </a>
                <a href="<?php echo BASE_URL; ?>assets/pdf/Nursing_2019_20_22072022_0121.pdf" target="_blank" rel="noopener" class="app-pdf-item">
                  <span class="doc-title">School of Nursing 2019-20</span>
                  <span class="pdf-badge"><i class="fa-solid fa-file-pdf"></i> PDF</span>
                </a>
              </div>
            </div>

          </div>
        </div>

      </div>

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>