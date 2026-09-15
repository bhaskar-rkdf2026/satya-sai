<?php
$page_title = 'Quick Links & Direct Access - SSSUTMS';
$banner_title = 'Quick Links';
$banner_category = 'SSSUTMS';

require_once __DIR__ . '/./config.php';
require_once __DIR__ . '/./includes/header.php';
require_once __DIR__ . '/./includes/topbar.php';
require_once __DIR__ . '/./includes/navbar.php';
require_once __DIR__ . '/./includes/page-banner.php';

$rawQuickLinks = [
    ['title' => 'Ph.D Entrance Examination 2026', 'href' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Notification%20exam%20dec2025/notificationentance.pdf', 'badge' => 'PDF Notice', 'icon' => 'fa-solid fa-file-pdf'],
    ['title' => 'SUPPLEMENTRY EXAMINATION –FEBRUARY -2026', 'href' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/MBBS_FIRST_PROFESSIONAL_FEB-2026_17022026_0824.pdf', 'badge' => 'PDF Notice', 'icon' => 'fa-solid fa-file-pdf'],
    ['title' => 'NIRF', 'href' => 'https://sssutms.co.in/cms/Website/Research/NIRF', 'badge' => 'Rankings', 'icon' => 'fa-solid fa-chart-line'],
    ['title' => 'EXAMINATION RESULTS DECLARED', 'href' => 'https://www.sssutms.co.in/cms/Website/Examination/Results', 'badge' => 'Results Portal', 'icon' => 'fa-solid fa-square-poll-vertical'],
    ['title' => 'ACT & ORDINANCE', 'href' => 'https://www.sssutms.co.in/cms/Website/About/ApprovalsAndOrdinances/Ordinances', 'badge' => 'Statutory', 'icon' => 'fa-solid fa-scale-balanced'],
    ['title' => 'Approvals', 'href' => 'https://sssutms.co.in/cms/Website/About/ApprovalsAndOrdinances/Approvals', 'badge' => 'Approvals', 'icon' => 'fa-solid fa-stamp'],
    ['title' => 'Alumni Registration', 'href' => 'https://www.sssutms.ac.in/alumini-form', 'badge' => 'Registration', 'icon' => 'fa-solid fa-user-graduate'],
    ['title' => 'नारी शक्ति वंदन सम्मेलन', 'href' => 'https://pmindiawebcast.nic.in/', 'badge' => 'National Event', 'icon' => 'fa-solid fa-video'],
    ['title' => 'Bachelor of Vocation in Building & Construction Technology , Post Graduate Diploma in Construction Technology', 'href' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Draft-Admission_Notice_Sri_Satya_Sai_University_12092025_0417.pdf', 'badge' => 'PDF Notice', 'icon' => 'fa-solid fa-file-pdf'],
    ['title' => 'APPOINTMENT (School of Homoeopathy)', 'href' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Appointment_Add_BHMS_PG_04102023_0923.pdf', 'badge' => 'Career Notice', 'icon' => 'fa-solid fa-user-tie'],
    ['title' => 'FEE Pay Online', 'href' => 'https://www.sssutms.co.in/cms/Website/Admission/UniversityAccountDetail', 'badge' => 'Fee Payment', 'icon' => 'fa-solid fa-credit-card'],
    ['title' => 'Result', 'href' => 'https://sssutms.co.in/cms/Website/Examination/Results', 'badge' => 'Results Portal', 'icon' => 'fa-solid fa-square-poll-vertical'],
    ['title' => 'Entrance Exam', 'href' => 'https://www.sssutms.co.in/erp/Student/ceet', 'badge' => 'Online Portal', 'icon' => 'fa-solid fa-laptop-code'],
];

$quickLinks = [];
foreach ($rawQuickLinks as $item) {
    $cleanTitle = html_entity_decode($item['title'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $quickLinks[] = [
        'title' => $cleanTitle,
        'href' => $item['href'],
        'badge' => $item['badge'],
        'icon' => $item['icon']
    ];
}
?>

<style>
/* ==========================================================================
   QUICK LINKS PAGE DESIGN SYSTEM
   ========================================================================== */

.ql-main-card {
  background: #ffffff;
  border-radius: 18px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 8px 30px rgba(11, 37, 69, 0.06);
  overflow: hidden;
  margin-bottom: 2rem;
}

.ql-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #065f46 100%);
  color: #ffffff;
  padding: 2.2rem 2.2rem;
  position: relative;
}

.ql-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #10b981, #34d399);
}

.ql-pill-badge {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  padding: 5px 14px;
  border-radius: 50px;
  font-size: 0.78rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.04em;
  background: rgba(16, 185, 129, 0.22);
  border: 1px solid rgba(16, 185, 129, 0.45);
  color: #d1fae5;
}

.ql-counter-chip {
  background: #10b981;
  color: #ffffff;
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

.ql-body-area {
  padding: 2rem 2.2rem;
  background: #f8fafc;
}

/* Search Box */
.ql-search-group {
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

.ql-search-group:focus-within {
  border-color: #10b981;
  box-shadow: 0 4px 16px rgba(16, 185, 129, 0.15);
}

.ql-search-input {
  border: none;
  outline: none;
  width: 100%;
  font-size: 0.95rem;
  color: #0f172a;
  background: transparent;
}

.ql-search-input::placeholder {
  color: #94a3b8;
}

/* Links List */
.ql-list-group {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.ql-item-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-left: 4px solid #10b981;
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

.ql-item-card:hover {
  transform: translateY(-2px);
  box-shadow: 0 10px 25px rgba(11, 37, 69, 0.08);
  border-color: #cbd5e1;
  border-left-color: #059669;
}

.ql-icon-badge {
  width: 46px;
  height: 46px;
  border-radius: 12px;
  background: rgba(16, 185, 129, 0.12);
  color: #059669;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.35rem;
  flex-shrink: 0;
  transition: all 0.22s ease;
}

.ql-item-card:hover .ql-icon-badge {
  background: #059669;
  color: #ffffff;
  transform: scale(1.05);
}

.ql-title-text {
  font-size: 0.98rem;
  font-weight: 700;
  color: #0f172a;
  line-height: 1.45;
  margin-bottom: 6px;
  transition: color 0.2s ease;
}

.ql-item-card:hover .ql-title-text {
  color: #065f46;
}

.ql-badge-pill {
  display: inline-flex;
  align-items: center;
  gap: 5px;
  font-size: 0.74rem;
  font-weight: 600;
  padding: 3px 10px;
  border-radius: 6px;
  background: rgba(16, 185, 129, 0.1);
  color: #059669;
  border: 1px solid rgba(16, 185, 129, 0.2);
}

.ql-action-btn {
  background: linear-gradient(135deg, #0b2545 0%, #065f46 100%);
  color: #ffffff !important;
  font-size: 0.85rem;
  font-weight: 700;
  padding: 9px 18px;
  border-radius: 8px;
  border: 1px solid rgba(16, 185, 129, 0.35);
  text-decoration: none !important;
  display: inline-flex;
  align-items: center;
  gap: 8px;
  white-space: nowrap;
  box-shadow: 0 2px 6px rgba(11, 37, 69, 0.15);
  transition: all 0.22s ease;
  flex-shrink: 0;
}

.ql-action-btn i {
  color: #34d399;
  transition: transform 0.2s ease;
}

.ql-action-btn:hover {
  background: linear-gradient(135deg, #059669 0%, #10b981 100%);
  color: #ffffff !important;
  border-color: #10b981;
  box-shadow: 0 4px 14px rgba(16, 185, 129, 0.35);
  transform: translateY(-1px);
}

.ql-action-btn:hover i {
  color: #ffffff;
  transform: translateX(3px);
}

@media (max-width: 767.98px) {
  .ql-header-banner { padding: 1.5rem 1.25rem; }
  .ql-body-area { padding: 1.25rem 1rem; }
  .ql-item-card {
    flex-direction: column;
    align-items: flex-start;
    gap: 1rem;
    padding: 1.1rem 1.25rem;
  }
  .ql-action-btn {
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
        <div class="ql-main-card">

          <!-- Header Banner -->
          <div class="ql-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="ql-pill-badge mb-2">
                <i class="fa-solid fa-bolt"></i> Instant Portal Access
              </span>
              <h2 class="fw-bold text-white mb-1 fs-3" style="font-family: var(--font-heading);">QUICK LINKS &amp; DIRECT ACCESS</h2>
              <p class="text-white-50 mb-0 small">Direct access to examination results, ordinances, NIRF rankings, online fee payment, and active portals</p>
            </div>
            <div>
              <span class="ql-counter-chip">
                <i class="fa-solid fa-link"></i> <?php echo count($quickLinks); ?> Quick Links
              </span>
            </div>
          </div>

          <!-- Body Content Area -->
          <div class="ql-body-area">

            <!-- Search Container -->
            <div class="bg-white p-3 rounded-4 border shadow-sm mb-4">
              <div class="ql-search-group">
                <i class="fa-solid fa-magnifying-glass text-muted fs-5"></i>
                <input type="text" id="qlSearchInput" class="ql-search-input" placeholder="Search quick links, portals, examination results, fee payment..." onkeyup="filterQlLinks()">
                <button type="button" class="btn btn-sm btn-link text-muted p-0 text-decoration-none" onclick="document.getElementById('qlSearchInput').value=''; filterQlLinks();" title="Clear Search">
                  <i class="fa-solid fa-xmark fs-5"></i>
                </button>
              </div>
            </div>

            <!-- Links List Group -->
            <div class="ql-list-group" id="qlListGroup">
              <?php foreach ($quickLinks as $idx => $doc): ?>
                <div class="ql-item-card ql-item-row" data-title="<?php echo strtolower(htmlspecialchars($doc['title'], ENT_QUOTES, 'UTF-8')); ?>">
                  <div class="d-flex align-items-start gap-3 flex-grow-1">
                    <div class="ql-icon-badge">
                      <i class="<?php echo htmlspecialchars($doc['icon']); ?>"></i>
                    </div>
                    <div>
                      <div class="d-flex flex-wrap align-items-center gap-2 mb-2">
                        <span class="ql-badge-pill">
                          <i class="fa-solid fa-tag"></i> <?php echo htmlspecialchars($doc['badge']); ?>
                        </span>
                      </div>
                      <h3 class="ql-title-text mb-0">
                        <?php echo htmlspecialchars($doc['title'], ENT_QUOTES, 'UTF-8'); ?>
                      </h3>
                    </div>
                  </div>
                  <div>
                    <a href="<?php echo htmlspecialchars($doc['href']); ?>" target="_blank" rel="noopener noreferrer" class="ql-action-btn" title="Open Link">
                      <span>Visit Link</span> <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    </a>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>

            <!-- No Results Alert -->
            <div id="noQlResultsAlert" class="alert alert-warning text-center py-4 mt-3" style="display:none; border-radius: 14px;">
              <i class="fa-solid fa-magnifying-glass fa-2x mb-2 text-warning d-block"></i>
              <h5 class="fw-bold mb-1">No matching links found</h5>
              <p class="small text-muted mb-0">Try adjusting your search query.</p>
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
function filterQlLinks() {
  const query = (document.getElementById('qlSearchInput').value || '').toLowerCase().trim();
  const rows = document.querySelectorAll('.ql-item-row');
  let count = 0;

  rows.forEach(el => {
    const title = el.getAttribute('data-title') || '';
    if (!query || title.includes(query)) {
      el.style.display = 'flex';
      count++;
    } else {
      el.style.display = 'none';
    }
  });

  const alertBox = document.getElementById('noQlResultsAlert');
  if (alertBox) {
    alertBox.style.display = (count === 0) ? 'block' : 'none';
  }
}
</script>

<?php require_once __DIR__ . '/./includes/footer.php'; ?>