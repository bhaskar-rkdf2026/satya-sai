<?php
$page_title = 'Download Links & Notifications - SSSUTMS';
$banner_title = 'Download Links';
$banner_category = 'SSSUTMS';

require_once __DIR__ . '/./config.php';
require_once __DIR__ . '/./includes/header.php';
require_once __DIR__ . '/./includes/topbar.php';
require_once __DIR__ . '/./includes/navbar.php';
require_once __DIR__ . '/./includes/page-banner.php';

$rawLinks = [
    ['title' => 'Supplementary Examination Notification (D. Pharma. & BPES Yearly Courses) Sep – 2026', 'href' => 'https://sssutms.co.in/cms/Website/DownloadLinks/File/2465', 'category' => 'Paramedical & Pharmacy', 'is_new' => true],
    ['title' => 'First Professional Supplementary BAMS (2024–25 Batch) Examination September – 2026', 'href' => 'https://sssutms.co.in/cms/Website/DownloadLinks/File/2463', 'category' => 'Medical & AYUSH', 'is_new' => true],
    ['title' => 'Supplementary Examination BHMS Aug–2026 (Time Table)', 'href' => 'https://sssutms.co.in/cms/Website/DownloadLinks/File/2461', 'category' => 'Medical & AYUSH', 'is_new' => true],
    ['title' => 'Examination Notification of BHMS II Year Supplementary Exam – Aug 2026', 'href' => 'https://sssutms.co.in/cms/Website/DownloadLinks/File/2459', 'category' => 'Medical & AYUSH', 'is_new' => true],
    ['title' => 'आवश्यक सुचना', 'href' => 'https://sssutms.co.in/cms/Website/DownloadLinks/File/2457', 'category' => 'General Circulars', 'is_new' => true],
    ['title' => 'प्रवेश अधिसूचना - 2 (2026-27)', 'href' => 'https://sssutms.co.in/cms/Website/DownloadLinks/File/2455', 'category' => 'Admissions & Enrollment', 'is_new' => true],
    ['title' => 'BACHELOR OF HOMOEOPATHIC MEDICINE AND SURGERY III Year (2021-22)', 'href' => 'https://sssutms.co.in/cms/Website/DownloadLinks/File/2452', 'category' => 'Medical & AYUSH', 'is_new' => false],
    ['title' => 'Ph.D. Course Work I - II Semester June -2026', 'href' => 'https://sssutms.co.in/cms/Website/DownloadLinks/File/2450', 'category' => 'Ph.D', 'is_new' => false],
    ['title' => 'Examination Notification BAMS III Professional (2021–2022 Batch)', 'href' => 'https://sssutms.co.in/cms/Website/DownloadLinks/File/2448', 'category' => 'Medical & AYUSH', 'is_new' => false],
    ['title' => 'Notification Ph.D. Course Work Examination June-2026 (Dec-2025 admitted )', 'href' => 'https://sssutms.co.in/cms/Website/DownloadLinks/File/2446', 'category' => 'Ph.D', 'is_new' => false],
    ['title' => 'Examination Notification for June- 2026 (BHMS – 2 nd year)', 'href' => 'https://sssutms.co.in/cms/Website/DownloadLinks/File/2440', 'category' => 'Medical & AYUSH', 'is_new' => false],
    ['title' => 'B.H.M.S And M.D Examination Form Notification – June- 2026', 'href' => 'https://sssutms.co.in/cms/Website/DownloadLinks/File/2434', 'category' => 'Examinations', 'is_new' => false],
    ['title' => 'MBBS SUPPLEMENTARY NOTIFICATION FEB -2026', 'href' => 'https://sssutms.co.in/cms/Website/DownloadLinks/File/2427', 'category' => 'Medical & AYUSH', 'is_new' => false],
    ['title' => 'Examination Form Notification April - 2026', 'href' => 'https://sssutms.co.in/cms/Website/DownloadLinks/File/2425', 'category' => 'Examinations', 'is_new' => false],
    ['title' => 'Notification Ph.D. Admission December - 2025', 'href' => 'https://sssutms.co.in/cms/Website/DownloadLinks/File/2415', 'category' => 'Ph.D', 'is_new' => false],
    ['title' => 'NOTIFICATION (Registration & Enrollment)', 'href' => 'https://sssutms.co.in/cms/Website/DownloadLinks/File/2404', 'category' => 'Admissions & Enrollment', 'is_new' => false],
    ['title' => 'अति आवश्यक सुचना', 'href' => 'https://sssutms.co.in/cms/Website/DownloadLinks/File/1389', 'category' => 'General Circulars', 'is_new' => false],
    ['title' => 'Diploma Dialysis Technician [First Year]', 'href' => 'https://sssutms.co.in/cms/Website/DownloadLinks/File/1316', 'category' => 'Paramedical & Pharmacy', 'is_new' => false],
    ['title' => 'School of Design', 'href' => 'https://sssutms.co.in/cms/Website/DownloadLinks/File/34', 'category' => 'General Circulars', 'is_new' => false],
    ['title' => 'MID SEM Answer Book', 'href' => 'https://sssutms.co.in/cms/Website/DownloadLinks/File/32', 'category' => 'Forms & Statutes', 'is_new' => false],
    ['title' => 'SSSUTMS Statute', 'href' => 'https://sssutms.co.in/cms/Website/DownloadLinks/File/29', 'category' => 'Forms & Statutes', 'is_new' => false],
    ['title' => 'Anti ragging Affidavit', 'href' => 'https://sssutms.co.in/cms/Website/DownloadLinks/File/26', 'category' => 'Forms & Statutes', 'is_new' => false],
    ['title' => 'Examination Notification (Paramedical Courses) Sep- 2026', 'href' => 'https://sssutms.co.in/cms/Website/DownloadLinks/File/2464', 'category' => 'Paramedical & Pharmacy', 'is_new' => false],
    ['title' => 'Examination Notification BAMS II Professional (2023–24 Batch)', 'href' => 'https://sssutms.co.in/cms/Website/DownloadLinks/File/2462', 'category' => 'Medical & AYUSH', 'is_new' => false],
    ['title' => 'Examination Notification of BAMS I Professional Supplementary Exam – Aug 2026', 'href' => 'https://sssutms.co.in/cms/Website/DownloadLinks/File/2460', 'category' => 'Medical & AYUSH', 'is_new' => false],
    ['title' => 'Enrollment form Open (2026-27)', 'href' => 'https://sssutms.co.in/cms/Website/DownloadLinks/File/2458', 'category' => 'Admissions & Enrollment', 'is_new' => false],
    ['title' => 'प्रवेश अधिसूचना - 3 (2026-27)', 'href' => 'https://sssutms.co.in/cms/Website/DownloadLinks/File/2456', 'category' => 'Admissions & Enrollment', 'is_new' => false],
    ['title' => 'B A M S 3 Year Professional Exam -July 2026', 'href' => 'https://sssutms.co.in/cms/Website/DownloadLinks/File/2454', 'category' => 'Examinations', 'is_new' => false],
    ['title' => 'Extended Entrance Exam (Ph.D Entrance Examination 2026)', 'href' => 'https://sssutms.co.in/cms/Website/DownloadLinks/File/2451', 'category' => 'Ph.D', 'is_new' => false],
    ['title' => 'Paramedical Supplementary Examination Notification June – 2026', 'href' => 'https://sssutms.co.in/cms/Website/DownloadLinks/File/2449', 'category' => 'Paramedical & Pharmacy', 'is_new' => false],
    ['title' => 'Notification Ph.D. Course Work Examination June-2026 (June-2025 admitted )', 'href' => 'https://sssutms.co.in/cms/Website/DownloadLinks/File/2447', 'category' => 'Ph.D', 'is_new' => false],
    ['title' => 'Ph.D Entrance Examination 2026', 'href' => 'https://sssutms.co.in/cms/Website/DownloadLinks/File/2445', 'category' => 'Ph.D', 'is_new' => false],
    ['title' => 'आवश्यक सूचना परीक्षा आवेदन जून- 2026', 'href' => 'https://sssutms.co.in/cms/Website/DownloadLinks/File/2438', 'category' => 'Examinations', 'is_new' => false],
    ['title' => 'Admission Notification 01 (2026-27)', 'href' => 'https://sssutms.co.in/cms/Website/DownloadLinks/File/2428', 'category' => 'Admissions & Enrollment', 'is_new' => false],
    ['title' => 'Examination Form Notification JUNE - 2026', 'href' => 'https://sssutms.co.in/cms/Website/DownloadLinks/File/2426', 'category' => 'Examinations', 'is_new' => false],
    ['title' => 'Examination Form Notification March - 2026 (B.A.M.S.)', 'href' => 'https://sssutms.co.in/cms/Website/DownloadLinks/File/2424', 'category' => 'Examinations', 'is_new' => false],
    ['title' => 'Notification Ph.D. Course Work Examination', 'href' => 'https://sssutms.co.in/cms/Website/DownloadLinks/File/2414', 'category' => 'Ph.D', 'is_new' => false],
    ['title' => 'NEP 2020-27', 'href' => 'https://sssutms.co.in/cms/Website/DownloadLinks/File/2401', 'category' => 'General Circulars', 'is_new' => false],
    ['title' => 'Coming soon new website www.sssutms.ac.in', 'href' => 'https://sssutms.co.in/cms/Website/DownloadLinks/File/1331', 'category' => 'General Circulars', 'is_new' => false],
    ['title' => 'Requirement School of Medical Sciences', 'href' => 'https://sssutms.co.in/cms/Website/DownloadLinks/File/107', 'category' => 'General Circulars', 'is_new' => false],
    ['title' => 'Main Exam Answer Book', 'href' => 'https://sssutms.co.in/cms/Website/DownloadLinks/File/33', 'category' => 'Forms & Statutes', 'is_new' => false],
    ['title' => 'ICT initiatives of MHRD', 'href' => 'https://sssutms.co.in/cms/Website/DownloadLinks/File/31', 'category' => 'General Circulars', 'is_new' => false],
    ['title' => 'Fees Structure & Eligibility', 'href' => 'https://sssutms.co.in/cms/Website/DownloadLinks/File/27', 'category' => 'Admissions & Enrollment', 'is_new' => false],
];

// Clean HTML entities cleanly
$downloadLinks = [];
foreach ($rawLinks as $item) {
    $cleanTitle = html_entity_decode($item['title'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $downloadLinks[] = [
        'title' => $cleanTitle,
        'href' => $item['href'],
        'category' => $item['category'],
        'is_new' => $item['is_new']
    ];
}

$categories = [
    'All' => 'All',
    'Examinations' => 'Examinations',
    'Medical & AYUSH' => 'Medical & AYUSH',
    'Ph.D' => 'Ph.D',
    'Paramedical & Pharmacy' => 'Paramedical',
    'Admissions & Enrollment' => 'Admissions',
    'Forms & Statutes' => 'Forms & Statutes',
    'General Circulars' => 'Circulars'
];
?>

<style>
/* ==========================================================================
   DOWNLOAD LINKS PAGE DESIGN SYSTEM
   ========================================================================== */

.dl-main-card {
  background: #ffffff;
  border-radius: 18px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 8px 30px rgba(11, 37, 69, 0.06);
  overflow: hidden;
  margin-bottom: 2rem;
}

.dl-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2.2rem 2.2rem;
  position: relative;
}

.dl-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f3752c, #f6a935);
}

.dl-pill-badge {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  padding: 5px 14px;
  border-radius: 50px;
  font-size: 0.78rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.04em;
  background: rgba(243, 117, 44, 0.22);
  border: 1px solid rgba(243, 117, 44, 0.45);
  color: #ffedd5;
}

.dl-counter-chip {
  background: #f59e0b;
  color: #0b2545;
  font-size: 0.88rem;
  font-weight: 800;
  padding: 8px 18px;
  border-radius: 50px;
  box-shadow: 0 4px 14px rgba(0, 0, 0, 0.15);
  white-space: nowrap;
  display: inline-flex;
  align-items: center;
  gap: 8px;
}

.dl-body-area {
  padding: 2rem 2.2rem;
  background: #f8fafc;
}

/* Search Box */
.dl-search-group {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 0.65rem 1.1rem;
  box-shadow: 0 2px 8px rgba(11, 37, 69, 0.04);
  display: flex;
  align-items: center;
  gap: 12px;
  transition: all 0.25s ease;
}

.dl-search-group:focus-within {
  border-color: #f3752c;
  box-shadow: 0 4px 16px rgba(243, 117, 44, 0.15);
}

.dl-search-input {
  border: none;
  outline: none;
  width: 100%;
  font-size: 0.95rem;
  color: #0f172a;
  background: transparent;
}

.dl-search-input::placeholder {
  color: #94a3b8;
}

/* Category Slider Tabs */
/* Category Select Dropdown */
.dl-cat-select {
  border-radius: 12px;
  border: 1px solid #cbd5e1;
  padding: 0.65rem 1rem;
  font-size: 0.9rem;
  font-weight: 600;
  color: #1e293b;
  background-color: #ffffff;
  box-shadow: 0 2px 6px rgba(11, 37, 69, 0.03);
  transition: all 0.25s ease;
  height: 100%;
}

.dl-cat-select:focus {
  border-color: #f3752c;
  box-shadow: 0 4px 16px rgba(243, 117, 44, 0.15);
}

/* Category Filter Tabs - Simple Wrapping, Never Cut Off */
.dl-tabs-wrap {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
  align-items: center;
}

.dl-tab-btn {
  border-radius: 50px !important;
  padding: 6px 14px !important;
  font-size: 0.82rem !important;
  font-weight: 600 !important;
  border: 1px solid #cbd5e1 !important;
  background: #ffffff !important;
  color: #475569 !important;
  cursor: pointer !important;
  transition: all 0.2s ease !important;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.03) !important;
  display: inline-flex;
  align-items: center;
  gap: 4px;
}

.dl-tab-btn:hover {
  background: #f1f5f9 !important;
  color: #0b2545 !important;
  border-color: #94a3b8 !important;
}

.dl-tab-btn.active {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%) !important;
  color: #ffffff !important;
  border-color: #0b2545 !important;
  box-shadow: 0 3px 10px rgba(11, 37, 69, 0.2) !important;
}

/* Documents List Cards */
.dl-list-group {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.dl-item-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-left: 4px solid #f3752c;
  border-radius: 14px;
  padding: 1.25rem 1.5rem;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 1.25rem;
  box-shadow: 0 2px 8px rgba(11, 37, 69, 0.03);
  transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
  text-decoration: none !important;
}

.dl-item-card:hover {
  transform: translateY(-2px);
  box-shadow: 0 10px 25px rgba(11, 37, 69, 0.08);
  border-color: #cbd5e1;
  border-left-color: #ea580c;
}

.dl-icon-badge {
  width: 46px;
  height: 46px;
  border-radius: 12px;
  background: rgba(243, 117, 44, 0.12);
  color: #ea580c;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.35rem;
  flex-shrink: 0;
  transition: all 0.22s ease;
}

.dl-item-card:hover .dl-icon-badge {
  background: #ea580c;
  color: #ffffff;
  transform: scale(1.05);
}

.dl-title-text {
  font-size: 0.98rem;
  font-weight: 700;
  color: #0f172a;
  line-height: 1.45;
  margin-bottom: 6px;
  transition: color 0.2s ease;
}

.dl-item-card:hover .dl-title-text {
  color: #0b2545;
}

.dl-cat-pill {
  display: inline-flex;
  align-items: center;
  gap: 5px;
  font-size: 0.74rem;
  font-weight: 600;
  padding: 3px 10px;
  border-radius: 6px;
  background: #f1f5f9;
  color: #475569;
  border: 1px solid #e2e8f0;
}

.dl-badge-new {
  background: #fee2e2;
  color: #dc2626;
  border: 1px solid #fca5a5;
  font-size: 0.72rem;
  font-weight: 700;
  padding: 3px 8px;
  border-radius: 6px;
  display: inline-flex;
  align-items: center;
  gap: 4px;
  text-transform: uppercase;
  letter-spacing: 0.03em;
}

.dl-action-btn {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff !important;
  font-size: 0.85rem;
  font-weight: 700;
  padding: 9px 18px;
  border-radius: 8px;
  border: 1px solid rgba(245, 158, 11, 0.35);
  text-decoration: none !important;
  display: inline-flex;
  align-items: center;
  gap: 8px;
  white-space: nowrap;
  box-shadow: 0 2px 6px rgba(11, 37, 69, 0.15);
  transition: all 0.22s ease;
  flex-shrink: 0;
}

.dl-action-btn i {
  color: #f59e0b;
  transition: transform 0.2s ease;
}

.dl-action-btn:hover {
  background: linear-gradient(135deg, #f3752c 0%, #ea580c 100%);
  color: #ffffff !important;
  border-color: #ea580c;
  box-shadow: 0 4px 14px rgba(234, 88, 12, 0.35);
  transform: translateY(-1px);
}

.dl-action-btn:hover i {
  color: #ffffff;
  transform: translateY(2px);
}

@media (max-width: 767.98px) {
  .dl-header-banner {
    padding: 1.5rem 1.25rem;
  }
  .dl-body-area {
    padding: 1.25rem 1rem;
  }
  .dl-item-card {
    flex-direction: column;
    align-items: flex-start;
    gap: 1rem;
    padding: 1.1rem 1.25rem;
  }
  .dl-action-btn {
    width: 100%;
    justify-content: center;
  }
}
</style>

<section class="subpage-main-section py-4 bg-light">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="dl-main-card">

          <!-- Header Banner -->
          <div class="dl-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="dl-pill-badge mb-2">
                <i class="fa-solid fa-cloud-arrow-down"></i> Official Document Repository
              </span>
              <h2 class="fw-bold text-white mb-1 fs-3" style="font-family: var(--font-heading);">DOWNLOAD LINKS &amp; NOTIFICATIONS</h2>
              <p class="text-white-50 mb-0 small">Official circulars, examination schedules, admission guidelines, time tables, and statutes</p>
            </div>
            <div>
              <span class="dl-counter-chip">
                <i class="fa-solid fa-file-lines"></i> <?php echo count($downloadLinks); ?> Documents Available
              </span>
            </div>
          </div>

          <!-- Body Content Area -->
          <div class="dl-body-area">

            <!-- Search & Filters Container -->
            <div class="bg-white p-3 rounded-4 border shadow-sm mb-4">
              <!-- Search & Category Dropdown in one responsive line -->
              <div class="row g-2 align-items-center mb-3">
                <div class="col-md-7 col-lg-8">
                  <div class="dl-search-group">
                    <i class="fa-solid fa-magnifying-glass text-muted fs-5"></i>
                    <input type="text" id="dlSearchInput" class="dl-search-input" placeholder="Search by notification title, course, batch, or keyword..." onkeyup="filterDlLinks()">
                    <button type="button" class="btn btn-sm btn-link text-muted p-0 text-decoration-none" onclick="document.getElementById('dlSearchInput').value=''; filterDlLinks();" title="Clear Search">
                      <i class="fa-solid fa-xmark fs-5"></i>
                    </button>
                  </div>
                </div>
                <div class="col-md-5 col-lg-4">
                  <select id="dlCatSelect" class="form-select dl-cat-select" onchange="onCategorySelectChange(this.value)">
                    <?php foreach ($categories as $catKey => $catLabel): ?>
                      <option value="<?php echo htmlspecialchars($catKey); ?>">
                        <?php echo htmlspecialchars($catKey === 'All' ? 'All Categories (43)' : $catKey); ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <!-- Category Filter Tabs (Simple Wrapped, Never Cut Off) -->
              <div class="dl-tabs-wrap">
                <span class="text-muted small fw-bold me-1 d-none d-sm-inline">
                  <i class="fa-solid fa-filter me-1"></i> Quick Filter:
                </span>
                <?php $isFirst = true; foreach ($categories as $catKey => $catLabel): ?>
                  <button type="button" class="dl-tab-btn <?php echo $isFirst ? 'active' : ''; ?>" data-cat="<?php echo htmlspecialchars($catKey); ?>" onclick="setDlCategory('<?php echo htmlspecialchars($catKey); ?>')">
                    <?php echo htmlspecialchars($catLabel); ?>
                  </button>
                <?php $isFirst = false; endforeach; ?>
              </div>
            </div>

            <!-- Documents List Group -->
            <div class="dl-list-group" id="dlListGroup">
              <?php foreach ($downloadLinks as $idx => $doc): ?>
                <div class="dl-item-card dl-item-row" data-title="<?php echo strtolower(htmlspecialchars($doc['title'], ENT_QUOTES, 'UTF-8')); ?>" data-category="<?php echo htmlspecialchars($doc['category'], ENT_QUOTES, 'UTF-8'); ?>">
                  <div class="d-flex align-items-start gap-3 flex-grow-1">
                    <div class="dl-icon-badge">
                      <i class="fa-solid fa-file-pdf"></i>
                    </div>
                    <div>
                      <div class="d-flex flex-wrap align-items-center gap-2 mb-2">
                        <span class="dl-cat-pill">
                          <i class="fa-solid fa-tag text-muted"></i> <?php echo htmlspecialchars($doc['category']); ?>
                        </span>
                        <span class="dl-cat-pill text-danger bg-danger-subtle border-danger-subtle">
                          <i class="fa-solid fa-file-pdf"></i> PDF
                        </span>
                        <?php if ($doc['is_new']): ?>
                          <span class="dl-badge-new">
                            <i class="fa-solid fa-bolt"></i> NEW
                          </span>
                        <?php endif; ?>
                      </div>
                      <h3 class="dl-title-text mb-0">
                        <?php echo htmlspecialchars($doc['title'], ENT_QUOTES, 'UTF-8'); ?>
                      </h3>
                    </div>
                  </div>
                  <div>
                    <a href="<?php echo htmlspecialchars($doc['href']); ?>" target="_blank" rel="noopener noreferrer" class="dl-action-btn" title="Download Document">
                      <i class="fa-solid fa-download"></i> Download PDF
                    </a>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>

            <!-- No Results Alert -->
            <div id="noDlResultsAlert" class="alert alert-warning text-center py-4 mt-3" style="display:none; border-radius: 14px;">
              <i class="fa-solid fa-magnifying-glass fa-2x mb-2 text-warning d-block"></i>
              <h5 class="fw-bold mb-1">No matching documents found</h5>
              <p class="small text-muted mb-0">Try adjusting your search query or selecting "All" in the category tabs.</p>
            </div>

          </div>
        </div>
      </div>

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/./includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<script>
let currentDlCat = 'All';

function setDlCategory(cat) {
  currentDlCat = cat;
  
  // Sync tab buttons
  document.querySelectorAll('.dl-tab-btn').forEach(b => {
    if (b.getAttribute('data-cat') === cat) {
      b.classList.add('active');
    } else {
      b.classList.remove('active');
    }
  });

  // Sync select dropdown
  const select = document.getElementById('dlCatSelect');
  if (select) select.value = cat;

  filterDlLinks();
}

function onCategorySelectChange(cat) {
  setDlCategory(cat);
}

function filterDlLinks() {
  const query = (document.getElementById('dlSearchInput').value || '').toLowerCase().trim();
  const rows = document.querySelectorAll('.dl-item-row');
  let count = 0;

  rows.forEach(el => {
    const title = el.getAttribute('data-title') || '';
    const cat = el.getAttribute('data-category') || '';
    const matchesCat = (currentDlCat === 'All' || cat === currentDlCat);
    const matchesQuery = (!query || title.includes(query) || cat.toLowerCase().includes(query));

    if (matchesCat && matchesQuery) {
      el.style.display = 'flex';
      count++;
    } else {
      el.style.display = 'none';
    }
  });

  const alertBox = document.getElementById('noDlResultsAlert');
  if (alertBox) {
    alertBox.style.display = (count === 0) ? 'block' : 'none';
  }
}
</script>

<?php require_once __DIR__ . '/./includes/footer.php'; ?>