<?php
$page_title = 'Important Links & Statutory Portals - SSSUTMS';
$banner_title = 'Important Links';
$banner_category = 'SSSUTMS';

require_once __DIR__ . '/./config.php';
require_once __DIR__ . '/./includes/header.php';
require_once __DIR__ . '/./includes/topbar.php';
require_once __DIR__ . '/./includes/navbar.php';
require_once __DIR__ . '/./includes/page-banner.php';

$rawImportantLinks = [
    ['title' => 'NEP 2020-27', 'href' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/NEP%202020%2027%20university%2014-compressed.pdf', 'badge' => 'Policy Document', 'icon' => 'fa-solid fa-file-shield'],
    ['title' => 'B.A. B.Ed. VII Semester (Regular) December – 2023', 'href' => 'https://sssutms.co.in/erp', 'badge' => 'Examination Result', 'icon' => 'fa-solid fa-square-poll-vertical'],
    ['title' => 'Unnat Bharat Abhiyan', 'href' => 'https://unnatbharatabhiyan.gov.in:8443/new-website/', 'badge' => 'National Initiative', 'icon' => 'fa-solid fa-hands-holding-child'],
    ['title' => 'UGC (University Grants Commission)', 'href' => 'https://www.ugc.ac.in/privateuniversitylist.aspx?id=SYZtn7kEGsWB4WuypEHPLQ==&Unitype=So1CNBLvrigKjpQTxHMrAQ==', 'badge' => 'Apex Regulatory Body', 'icon' => 'fa-solid fa-building-columns'],
    ['title' => 'PCI (Pharmacy Council of India)', 'href' => 'https://www.pci.nic.in/', 'badge' => 'Statutory Council', 'icon' => 'fa-solid fa-prescription-bottle-medical'],
    ['title' => 'AICTE (All India Council for Technical Education)', 'href' => 'https://www.aicte-india.org/', 'badge' => 'Technical Education', 'icon' => 'fa-solid fa-microchip'],
    ['title' => 'MPNVVA (M.P. Niji Vishwavidyalaya Niyamak Aayog)', 'href' => 'https://mpnvva.in/', 'badge' => 'State Regulatory Body', 'icon' => 'fa-solid fa-landmark'],
    ['title' => 'MOOCs (SWAYAM MOOCs Portal)', 'href' => 'https://ugcmoocs.inflibnet.ac.in/index.php', 'badge' => 'E-Learning Portal', 'icon' => 'fa-solid fa-laptop-code'],
    ['title' => 'SWAYAM National Portal', 'href' => 'https://swayam.gov.in/', 'badge' => 'Digital Education', 'icon' => 'fa-solid fa-graduation-cap'],
    ['title' => 'UGC e-Samadhan Portal', 'href' => 'https://samadhaan.ugc.ac.in/', 'badge' => 'Grievance Portal', 'icon' => 'fa-solid fa-scale-balanced'],
    ['title' => 'E-Content & Digital Resources', 'href' => 'https://www.sssutms.co.in/cms/Website/Download/E-Content', 'badge' => 'Learning Repository', 'icon' => 'fa-solid fa-book-open-reader'],
    ['title' => 'MPBSE (Madhya Pradesh Board of Secondary Education)', 'href' => 'http://www.mpbse.nic.in/', 'badge' => 'Education Board', 'icon' => 'fa-solid fa-landmark'],
    ['title' => 'DCI (Dental Council of India)', 'href' => 'http://www.dciindia.org/', 'badge' => 'Statutory Council', 'icon' => 'fa-solid fa-tooth'],
    ['title' => 'DHE (Department of Higher Education, MP)', 'href' => 'http://highereducation.mp.gov.in/', 'badge' => 'State Government', 'icon' => 'fa-solid fa-building-flag'],
    ['title' => 'MCI (Medical Council of India / NMC)', 'href' => 'https://www.mciindia.org/CMS/', 'badge' => 'Medical Regulatory', 'icon' => 'fa-solid fa-user-doctor'],
    ['title' => 'Council of Architecture (COA)', 'href' => 'https://www.coa.gov.in/', 'badge' => 'Architecture Council', 'icon' => 'fa-solid fa-compass-drafting'],
    ['title' => 'NAD (National Academic Depository)', 'href' => 'https://cvl.nad.co.in/NAD/home.action', 'badge' => 'Academic Depository', 'icon' => 'fa-solid fa-folder-closed'],
];

$importantLinks = [];
foreach ($rawImportantLinks as $item) {
    $cleanTitle = html_entity_decode($item['title'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $importantLinks[] = [
        'title' => $cleanTitle,
        'href' => $item['href'],
        'badge' => $item['badge'],
        'icon' => $item['icon']
    ];
}
?>

<style>
/* ==========================================================================
   IMPORTANT LINKS PAGE DESIGN SYSTEM
   ========================================================================== */

.il-main-card {
  background: #ffffff;
  border-radius: 18px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 8px 30px rgba(11, 37, 69, 0.06);
  overflow: hidden;
  margin-bottom: 2rem;
}

.il-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #1d4ed8 100%);
  color: #ffffff;
  padding: 2.2rem 2.2rem;
  position: relative;
}

.il-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #3b82f6, #60a5fa);
}

.il-pill-badge {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  padding: 5px 14px;
  border-radius: 50px;
  font-size: 0.78rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.04em;
  background: rgba(59, 130, 246, 0.22);
  border: 1px solid rgba(59, 130, 246, 0.45);
  color: #dbeafe;
}

.il-counter-chip {
  background: #3b82f6;
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

.il-body-area {
  padding: 2rem 2.2rem;
  background: #f8fafc;
}

/* Search Box */
.il-search-group {
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

.il-search-group:focus-within {
  border-color: #1d4ed8;
  box-shadow: 0 4px 16px rgba(29, 78, 216, 0.15);
}

.il-search-input {
  border: none;
  outline: none;
  width: 100%;
  font-size: 0.95rem;
  color: #0f172a;
  background: transparent;
}

.il-search-input::placeholder {
  color: #94a3b8;
}

/* Links List */
.il-list-group {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.il-item-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-left: 4px solid #1d4ed8;
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

.il-item-card:hover {
  transform: translateY(-2px);
  box-shadow: 0 10px 25px rgba(11, 37, 69, 0.08);
  border-color: #cbd5e1;
  border-left-color: #1e40af;
}

.il-icon-badge {
  width: 46px;
  height: 46px;
  border-radius: 12px;
  background: rgba(29, 78, 216, 0.12);
  color: #1d4ed8;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.35rem;
  flex-shrink: 0;
  transition: all 0.22s ease;
}

.il-item-card:hover .il-icon-badge {
  background: #1d4ed8;
  color: #ffffff;
  transform: scale(1.05);
}

.il-title-text {
  font-size: 0.98rem;
  font-weight: 700;
  color: #0f172a;
  line-height: 1.45;
  margin-bottom: 6px;
  transition: color 0.2s ease;
}

.il-item-card:hover .il-title-text {
  color: #1d4ed8;
}

.il-badge-pill {
  display: inline-flex;
  align-items: center;
  gap: 5px;
  font-size: 0.74rem;
  font-weight: 600;
  padding: 3px 10px;
  border-radius: 6px;
  background: rgba(29, 78, 216, 0.08);
  color: #1d4ed8;
  border: 1px solid rgba(29, 78, 216, 0.2);
}

.il-action-btn {
  background: linear-gradient(135deg, #0b2545 0%, #1d4ed8 100%);
  color: #ffffff !important;
  font-size: 0.85rem;
  font-weight: 700;
  padding: 9px 18px;
  border-radius: 8px;
  border: 1px solid rgba(59, 130, 246, 0.35);
  text-decoration: none !important;
  display: inline-flex;
  align-items: center;
  gap: 8px;
  white-space: nowrap;
  box-shadow: 0 2px 6px rgba(11, 37, 69, 0.15);
  transition: all 0.22s ease;
  flex-shrink: 0;
}

.il-action-btn i {
  color: #93c5fd;
  transition: transform 0.2s ease;
}

.il-action-btn:hover {
  background: linear-gradient(135deg, #1d4ed8 0%, #2563eb 100%);
  color: #ffffff !important;
  border-color: #2563eb;
  box-shadow: 0 4px 14px rgba(37, 99, 235, 0.35);
  transform: translateY(-1px);
}

.il-action-btn:hover i {
  color: #ffffff;
  transform: translateX(3px);
}

@media (max-width: 767.98px) {
  .il-header-banner { padding: 1.5rem 1.25rem; }
  .il-body-area { padding: 1.25rem 1rem; }
  .il-item-card {
    flex-direction: column;
    align-items: flex-start;
    gap: 1rem;
    padding: 1.1rem 1.25rem;
  }
  .il-action-btn {
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
        <div class="il-main-card">

          <!-- Header Banner -->
          <div class="il-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="il-pill-badge mb-2">
                <i class="fa-solid fa-shield-halved"></i> Statutory &amp; Regulatory Bodies
              </span>
              <h2 class="fw-bold text-white mb-1 fs-3" style="font-family: var(--font-heading);">IMPORTANT LINKS &amp; STATUTORY PORTALS</h2>
              <p class="text-white-50 mb-0 small">Official apex regulatory councils (UGC, AICTE, PCI, DCI, MCI), government authorities, and digital learning platforms</p>
            </div>
            <div>
              <span class="il-counter-chip">
                <i class="fa-solid fa-building-columns"></i> <?php echo count($importantLinks); ?> Portals
              </span>
            </div>
          </div>

          <!-- Body Content Area -->
          <div class="il-body-area">

            <!-- Search Container -->
            <div class="bg-white p-3 rounded-4 border shadow-sm mb-4">
              <div class="il-search-group">
                <i class="fa-solid fa-magnifying-glass text-muted fs-5"></i>
                <input type="text" id="ilSearchInput" class="il-search-input" placeholder="Search apex bodies, regulatory authorities, UGC, AICTE, or government portals..." onkeyup="filterIlLinks()">
                <button type="button" class="btn btn-sm btn-link text-muted p-0 text-decoration-none" onclick="document.getElementById('ilSearchInput').value=''; filterIlLinks();" title="Clear Search">
                  <i class="fa-solid fa-xmark fs-5"></i>
                </button>
              </div>
            </div>

            <!-- Links List Group -->
            <div class="il-list-group" id="ilListGroup">
              <?php foreach ($importantLinks as $idx => $doc): ?>
                <div class="il-item-card il-item-row" data-title="<?php echo strtolower(htmlspecialchars($doc['title'], ENT_QUOTES, 'UTF-8')); ?>">
                  <div class="d-flex align-items-start gap-3 flex-grow-1">
                    <div class="il-icon-badge">
                      <i class="<?php echo htmlspecialchars($doc['icon']); ?>"></i>
                    </div>
                    <div>
                      <div class="d-flex flex-wrap align-items-center gap-2 mb-2">
                        <span class="il-badge-pill">
                          <i class="fa-solid fa-tag"></i> <?php echo htmlspecialchars($doc['badge']); ?>
                        </span>
                      </div>
                      <h3 class="il-title-text mb-0">
                        <?php echo htmlspecialchars($doc['title'], ENT_QUOTES, 'UTF-8'); ?>
                      </h3>
                    </div>
                  </div>
                  <div>
                    <a href="<?php echo htmlspecialchars($doc['href']); ?>" target="_blank" rel="noopener noreferrer" class="il-action-btn" title="Visit Portal">
                      <span>Visit Website</span> <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    </a>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>

            <!-- No Results Alert -->
            <div id="noIlResultsAlert" class="alert alert-warning text-center py-4 mt-3" style="display:none; border-radius: 14px;">
              <i class="fa-solid fa-magnifying-glass fa-2x mb-2 text-warning d-block"></i>
              <h5 class="fw-bold mb-1">No matching portals found</h5>
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
function filterIlLinks() {
  const query = (document.getElementById('ilSearchInput').value || '').toLowerCase().trim();
  const rows = document.querySelectorAll('.il-item-row');
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

  const alertBox = document.getElementById('noIlResultsAlert');
  if (alertBox) {
    alertBox.style.display = (count === 0) ? 'block' : 'none';
  }
}
</script>

<?php require_once __DIR__ . '/./includes/footer.php'; ?>