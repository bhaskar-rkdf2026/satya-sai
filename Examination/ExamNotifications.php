<?php
$page_title = 'Exam Notifications - SSSUTMS';
$banner_title = 'Exam Notifications';
$banner_category = 'Examination';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?>

<style>
.en-section { background-color: #f8fafc; }
.en-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15,23,42,0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}
.en-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2.2rem 2rem;
  position: relative;
}
.en-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.en-stat-chip {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 16px 14px;
  display: flex; align-items: center; gap: 12px;
  height: 100%;
  transition: all 0.25s ease;
  box-shadow: 0 4px 12px rgba(0,0,0,0.02);
}
.en-stat-chip:hover {
  border-color: #cbd5e1;
  box-shadow: 0 6px 18px rgba(11,37,69,0.07);
  transform: translateY(-2px);
}
.en-stat-icon {
  width: 48px; height: 48px;
  border-radius: 12px;
  background: rgba(245,158,11,0.12);
  color: #d97706;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.35rem; flex-shrink: 0;
}
.en-list-group {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}
.en-item-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 1.25rem 1.5rem;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 1.25rem;
  box-shadow: 0 4px 14px rgba(0,0,0,0.02);
  transition: all 0.25s ease;
}
.en-item-card:hover {
  border-color: #cbd5e1;
  box-shadow: 0 8px 24px rgba(11,37,69,0.08);
  transform: translateY(-2px);
}
.en-badge-new {
  background: #fee2e2;
  color: #dc2626;
  border: 1px solid #fca5a5;
  font-size: 0.75rem;
  font-weight: 700;
  padding: 4px 10px;
  border-radius: 6px;
  text-transform: uppercase;
  letter-spacing: 0.03em;
}
.en-download-btn {
  background: linear-gradient(135deg, #0b2545 0%, #1e4d8c 100%) !important;
  color: #ffffff !important;
  font-size: 0.85rem;
  font-weight: 700;
  padding: 8px 16px;
  border-radius: 8px;
  border: 1px solid rgba(245,158,11,0.35);
  text-decoration: none !important;
  display: inline-flex;
  align-items: center;
  gap: 8px;
  white-space: nowrap;
  box-shadow: 0 2px 6px rgba(11,37,69,0.15);
  transition: all 0.2s ease;
}
.en-download-btn i {
  color: #fbbf24 !important;
}
.en-download-btn:hover {
  background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%) !important;
  color: #ffffff !important;
  border-color: #d97706;
  box-shadow: 0 4px 12px rgba(217,119,6,0.35);
  transform: translateY(-1px);
}
</style>

<section class="subpage-main-section en-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="en-main-card">

          <!-- Header Banner -->
          <div class="en-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-bell me-1"></i> Examination Cell Circulars
              </span>
              <h3 class="fw-bold text-white mb-1 fs-3">EXAM NOTIFICATIONS</h3>
              <p class="text-white-50 mb-0 small">Latest Examination Circulars, Form Dates, Supplementary Notices &amp; Guidelines</p>
            </div>
          </div>

          <!-- Content Body -->
          <div class="p-4">

            <!-- Stat Chips -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-sm-6 col-md-3">
                <div class="en-stat-chip">
                  <div class="en-stat-icon"><i class="fa-solid fa-scroll"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Notifications</div>
                    <div class="fw-bold text-dark fs-6">Official Releases</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="en-stat-chip">
                  <div class="en-stat-icon"><i class="fa-solid fa-notes-medical"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Ayush &amp; Health</div>
                    <div class="fw-bold text-dark fs-6">BAMS / BHMS</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="en-stat-chip">
                  <div class="en-stat-icon"><i class="fa-solid fa-user-graduate"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Research</div>
                    <div class="fw-bold text-dark fs-6">Ph.D. Coursework</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="en-stat-chip">
                  <div class="en-stat-icon"><i class="fa-solid fa-book-open"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Degree &amp; NEP</div>
                    <div class="fw-bold text-dark fs-6">UG / PG Courses</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Notifications List -->
            <div class="en-list-group">

              <!-- 1. Paramedical Sep 2026 -->
              <div class="en-item-card">
                <div class="d-flex align-items-start gap-3">
                  <div class="mt-1"><span class="en-badge-new"><i class="fa-solid fa-bolt me-1"></i> New</span></div>
                  <div>
                    <h5 class="fw-bold text-dark mb-1 fs-6">Examination Notification (Paramedical Courses) Sep - 2026</h5>
                    <p class="text-muted mb-0 small">Official notification for Paramedical diploma and degree examinations.</p>
                  </div>
                </div>
                <div>
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamNotifications/paramedical_notification_11082026_0116.pdf" target="_blank" rel="noopener" class="en-download-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </div>
              </div>

              <!-- 2. BAMS II Professional -->
              <div class="en-item-card">
                <div class="d-flex align-items-start gap-3">
                  <div class="mt-1"><span class="en-badge-new"><i class="fa-solid fa-bolt me-1"></i> New</span></div>
                  <div>
                    <h5 class="fw-bold text-dark mb-1 fs-6">Examination Notification BAMS II Professional (2023–2024 Batch)</h5>
                    <p class="text-muted mb-0 small">Schedule &amp; instructions for BAMS 2nd Professional Regular/Ex candidates.</p>
                  </div>
                </div>
                <div>
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamNotifications/Whatsapp_Scan_7_August_2026_at_14.01.56_07082026_0206.pdf" target="_blank" rel="noopener" class="en-download-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </div>
              </div>

              <!-- 3. BAMS I Professional Supplementary -->
              <div class="en-item-card">
                <div class="d-flex align-items-start gap-3">
                  <div class="mt-1"><span class="badge bg-secondary text-white fw-bold">Notice</span></div>
                  <div>
                    <h5 class="fw-bold text-dark mb-1 fs-6">Notification of BAMS I Professional Supplementary Exam – August 2026</h5>
                    <p class="text-muted mb-0 small">Supplementary examination form filing and dates for BAMS 1st Professional.</p>
                  </div>
                </div>
                <div>
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamNotifications/Adobe_Scan_24_Jul_2026_24072026_0129.pdf" target="_blank" rel="noopener" class="en-download-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </div>
              </div>

              <!-- 4. BHMS II Year Supplementary -->
              <div class="en-item-card">
                <div class="d-flex align-items-start gap-3">
                  <div class="mt-1"><span class="badge bg-secondary text-white fw-bold">Notice</span></div>
                  <div>
                    <h5 class="fw-bold text-dark mb-1 fs-6">Notification of BHMS II Year Supplementary Exam – August 2026</h5>
                    <p class="text-muted mb-0 small">Supplementary exam schedule for BHMS 2nd Year students.</p>
                  </div>
                </div>
                <div>
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamNotifications/Adobe_Scan_24_Jul_2026_(1)_24072026_0124.pdf" target="_blank" rel="noopener" class="en-download-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </div>
              </div>

              <!-- 5. BAMS III Professional -->
              <div class="en-item-card">
                <div class="d-flex align-items-start gap-3">
                  <div class="mt-1"><span class="badge bg-secondary text-white fw-bold">Notice</span></div>
                  <div>
                    <h5 class="fw-bold text-dark mb-1 fs-6">Examination Notification BAMS III Professional (2021–2022 Batch)</h5>
                    <p class="text-muted mb-0 small">Detailed guidelines for BAMS 3rd Professional examination.</p>
                  </div>
                </div>
                <div>
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamNotifications/bams.pdf" target="_blank" rel="noopener" class="en-download-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </div>
              </div>

              <!-- 6. Paramedical Supp June 2026 -->
              <div class="en-item-card">
                <div class="d-flex align-items-start gap-3">
                  <div class="mt-1"><span class="badge bg-secondary text-white fw-bold">Notice</span></div>
                  <div>
                    <h5 class="fw-bold text-dark mb-1 fs-6">Paramedical Supplementary Examination Notification June – 2026</h5>
                    <p class="text-muted mb-0 small">June 2026 supplementary exams for all paramedical streams.</p>
                  </div>
                </div>
                <div>
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamNotifications/paramedical.pdf" target="_blank" rel="noopener" class="en-download-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </div>
              </div>

              <!-- 7. PhD Entrance 2026 -->
              <div class="en-item-card">
                <div class="d-flex align-items-start gap-3">
                  <div class="mt-1"><span class="badge bg-primary text-white fw-bold">Ph.D.</span></div>
                  <div>
                    <h5 class="fw-bold text-dark mb-1 fs-6">Ph.D Entrance Examination 2026</h5>
                    <p class="text-muted mb-0 small">Official notification for Ph.D. Entrance Examination 2026.</p>
                  </div>
                </div>
                <div>
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamNotifications/notificationentance.pdf" target="_blank" rel="noopener" class="en-download-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </div>
              </div>

              <!-- 8. PhD Coursework Dec 2025 admitted -->
              <div class="en-item-card">
                <div class="d-flex align-items-start gap-3">
                  <div class="mt-1"><span class="badge bg-primary text-white fw-bold">Ph.D.</span></div>
                  <div>
                    <h5 class="fw-bold text-dark mb-1 fs-6">Notification Ph.D. Course Work Examination June-2026 (Dec-2025 admitted)</h5>
                    <p class="text-muted mb-0 small">Coursework exam notification for December 2025 admitted scholars.</p>
                  </div>
                </div>
                <div>
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamNotifications/notification cw phd Dec.pdf" target="_blank" rel="noopener" class="en-download-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </div>
              </div>

              <!-- 9. PhD Coursework June 2025 admitted -->
              <div class="en-item-card">
                <div class="d-flex align-items-start gap-3">
                  <div class="mt-1"><span class="badge bg-primary text-white fw-bold">Ph.D.</span></div>
                  <div>
                    <h5 class="fw-bold text-dark mb-1 fs-6">Notification Ph.D. Course Work Examination June-2026 (June-2025 admitted)</h5>
                    <p class="text-muted mb-0 small">Coursework exam notification for June 2025 admitted scholars.</p>
                  </div>
                </div>
                <div>
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamNotifications/notification cw phd June.pdf" target="_blank" rel="noopener" class="en-download-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </div>
              </div>

              <!-- 10. BHMS II Year June 2026 -->
              <div class="en-item-card">
                <div class="d-flex align-items-start gap-3">
                  <div class="mt-1"><span class="badge bg-secondary text-white fw-bold">BHMS</span></div>
                  <div>
                    <h5 class="fw-bold text-dark mb-1 fs-6">Examination Notification for June- 2026 (BHMS – IInd year)</h5>
                    <p class="text-muted mb-0 small">June 2026 examination schedule for BHMS 2nd Year candidates.</p>
                  </div>
                </div>
                <div>
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamNotifications/NOTIFICATION_JUNE_2026_BHMS_2_ND_YEAR_14042026_0307.pdf" target="_blank" rel="noopener" class="en-download-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </div>
              </div>

              <!-- 11. Important Notice June 2026 -->
              <div class="en-item-card">
                <div class="d-flex align-items-start gap-3">
                  <div class="mt-1"><span class="badge bg-warning text-dark fw-bold">Notice</span></div>
                  <div>
                    <h5 class="fw-bold text-dark mb-1 fs-6">आवश्यक सूचना: परीक्षा आवेदन जून- 2026</h5>
                    <p class="text-muted mb-0 small">Important notice regarding submission of June 2026 Examination Form.</p>
                  </div>
                </div>
                <div>
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamNotifications/imp_notice_09042026_1231.pdf" target="_blank" rel="noopener" class="en-download-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </div>
              </div>

              <!-- 12. UTD NEP June 2026 -->
              <div class="en-item-card">
                <div class="d-flex align-items-start gap-3">
                  <div class="mt-1"><span class="badge bg-info text-dark fw-bold">NEP</span></div>
                  <div>
                    <h5 class="fw-bold text-dark mb-1 fs-6">Examination Notification June – 2026 [BA / B.COM / B.SC / BBA / BCA] (NEP)</h5>
                    <p class="text-muted mb-0 small">Undergraduate NEP Semester examination notifications for UTD departments.</p>
                  </div>
                </div>
                <div>
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamNotifications/UTD_NOTIFICATION_12032026_1120.pdf" target="_blank" rel="noopener" class="en-download-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </div>
              </div>

              <!-- 13. BHMS & MD Form Notification -->
              <div class="en-item-card">
                <div class="d-flex align-items-start gap-3">
                  <div class="mt-1"><span class="badge bg-secondary text-white fw-bold">Notice</span></div>
                  <div>
                    <h5 class="fw-bold text-dark mb-1 fs-6">B.H.M.S And M.D Examination Form Notification – June- 2026</h5>
                    <p class="text-muted mb-0 small">Examination form submission schedule for BHMS and M.D courses.</p>
                  </div>
                </div>
                <div>
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/ExamNotifications/JUNE26_10032026_0148.pdf" target="_blank" rel="noopener" class="en-download-btn">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                  </a>
                </div>
              </div>

            </div><!-- end en-list-group -->

          </div>
        </div><!-- end en-main-card -->
      </div><!-- end col-lg-8 -->

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>