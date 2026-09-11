<?php
require_once __DIR__ . '/../config.php';

// Load dynamic data from JSON
$admissionData = get_json_data('admission_data.json', []);
$noticePageData = $admissionData['AdmissionNotice'] ?? [];
$notices = $noticePageData['notices'] ?? [];

$page_title = ($noticePageData['page_title'] ?? 'Admission Notice') . ' - SSSUTMS';
$banner_title = $noticePageData['page_title'] ?? 'Admission Notice';
$banner_category = 'Admission';

require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?>

<!-- Bootstrap Icons CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

<style>
/* Card Container */
.adm-card {
  background: #ffffff;
  border-radius: 16px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
  overflow: hidden;
}

/* Card Header */
.adm-card-header {
  background: linear-gradient(135deg, #0b2545 0%, #173d72 100%);
  padding: 1.6rem 2rem;
  border-top-left-radius: 16px;
  border-top-right-radius: 16px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  position: relative;
}
.adm-card-header::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.adm-card-header h2,
.adm-card-header h2 i {
  color: #ffffff !important;
  font-size: 1.4rem;
  font-weight: 700;
  letter-spacing: -0.01em;
}
.adm-card-header span,
.adm-card-header small {
  color: rgba(255, 255, 255, 0.85) !important;
}

/* Filter Navigation Tabs */
.notice-filter-tabs {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
  margin-bottom: 1.5rem;
  padding-bottom: 1rem;
  border-bottom: 1px solid #eef2f6;
}
.filter-tab-btn {
  background: #f8fafc;
  color: #475569;
  border: 1px solid #e2e8f0;
  padding: 0.5rem 1.1rem;
  border-radius: 30px;
  font-size: 0.88rem;
  font-weight: 600;
  cursor: pointer;
  display: inline-flex;
  align-items: center;
  gap: 8px;
  transition: all 0.2s ease;
  user-select: none;
}
.filter-tab-btn:hover {
  background: #f1f5f9;
  color: #0b2545;
  border-color: #cbd5e1;
}
.filter-tab-btn.active {
  background: #0b2545;
  color: #ffffff;
  border-color: #0b2545;
  box-shadow: 0 4px 12px rgba(11, 37, 69, 0.2);
}
.filter-tab-btn .tab-count {
  font-size: 0.75rem;
  padding: 2px 7px;
  border-radius: 20px;
  background: rgba(0, 0, 0, 0.08);
}
.filter-tab-btn.active .tab-count {
  background: #f59e0b;
  color: #0b2545;
  font-weight: 700;
}

/* Search Bar */
.notice-search-box {
  position: relative;
  margin-bottom: 1.5rem;
}
.notice-search-input {
  width: 100%;
  padding: 0.8rem 1rem 0.8rem 2.8rem;
  border-radius: 12px;
  border: 1.5px solid #e2e8f0;
  font-size: 0.95rem;
  transition: all 0.2s ease;
  background: #ffffff;
}
.notice-search-input:focus {
  outline: none;
  border-color: #0b2545;
  box-shadow: 0 0 0 4px rgba(11, 37, 69, 0.08);
}
.search-icon-pos {
  position: absolute;
  left: 1rem;
  top: 50%;
  transform: translateY(-50%);
  color: #94a3b8;
  pointer-events: none;
}
.search-clear-btn {
  position: absolute;
  right: 1rem;
  top: 50%;
  transform: translateY(-50%);
  color: #94a3b8;
  cursor: pointer;
  display: none;
  border: none;
  background: transparent;
  padding: 4px;
}
.search-clear-btn:hover {
  color: #475569;
}

/* Notice Cards */
.notice-item-card {
  background: #ffffff;
  border: 1px solid #eef2f6;
  border-radius: 12px;
  padding: 1.15rem 1.35rem;
  margin-bottom: 0.85rem;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 16px;
  transition: all 0.25s ease;
  position: relative;
}
.notice-item-card:hover {
  border-color: #cbd5e1;
  background-color: #fcfdfe;
  transform: translateY(-2px);
  box-shadow: 0 6px 20px rgba(15, 23, 42, 0.06);
}
.notice-item-card.is-current-session {
  border-left: 4px solid #0b2545;
}
.notice-item-card.is-new-notice {
  border-left: 4px solid #0b2545;
}

/* Notice Icon Box - Dark Blue Theme */
.notice-icon-box {
  width: 44px;
  height: 44px;
  min-width: 44px;
  border-radius: 10px;
  background: #e8eff8;
  color: #0b2545;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.25rem;
  transition: all 0.25s ease;
}
.notice-item-card:hover .notice-icon-box {
  background: #0b2545;
  color: #ffffff;
  transform: scale(1.05);
}

/* Notice Title & Meta */
.notice-title-link {
  color: #0b2545;
  font-size: 0.98rem;
  font-weight: 600;
  line-height: 1.45;
  text-decoration: none;
  display: inline-block;
  transition: color 0.15s ease;
}
.notice-title-link:hover {
  color: #173d72;
}
.notice-meta-tags {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  gap: 8px;
  margin-top: 6px;
}
.meta-tag {
  font-size: 0.76rem;
  font-weight: 600;
  padding: 2px 8px;
  border-radius: 6px;
  display: inline-flex;
  align-items: center;
  gap: 4px;
}
.meta-tag-date {
  background: #f1f5f9;
  color: #64748b;
}
.meta-tag-session {
  background: #e0f2fe;
  color: #0369a1;
}
.meta-tag-category {
  background: #fef3c7;
  color: #92400e;
}
.meta-tag-new {
  background: #0b2545;
  color: #ffffff;
  font-weight: 700;
  padding: 2px 7px;
  letter-spacing: 0.02em;
}

/* Download Button - University Dark Blue Theme */
.btn-notice-download {
  display: inline-flex;
  align-items: center;
  gap: 7px;
  background: #ffffff;
  color: #0b2545;
  border: 1.5px solid #0b2545;
  padding: 0.48rem 1.05rem;
  border-radius: 8px;
  font-size: 0.83rem;
  font-weight: 600;
  text-decoration: none;
  white-space: nowrap;
  transition: all 0.2s ease;
}
.btn-notice-download:hover {
  background: #0b2545;
  color: #ffffff;
  border-color: #0b2545;
  box-shadow: 0 4px 12px rgba(11, 37, 69, 0.25);
  transform: translateY(-1px);
}

/* Empty / No Results State */
.notices-empty-state {
  display: none;
  padding: 3rem 1.5rem;
  text-align: center;
  background: #f8fafc;
  border-radius: 12px;
  border: 1px dashed #cbd5e1;
}

@keyframes pulse-badge {
  0% { transform: scale(1); opacity: 1; }
  50% { transform: scale(1.06); opacity: 0.9; }
  100% { transform: scale(1); opacity: 1; }
}

@media (max-width: 768px) {
  .notice-item-card {
    flex-direction: column;
    align-items: flex-start;
  }
  .notice-item-card .btn-notice-download {
    width: 100%;
    justify-content: center;
  }
}
</style>

<section class="py-5 bg-light">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content (Left Column) -->
      <div class="col-lg-8 col-xl-9">
        <div class="adm-card">
          
          <!-- Card Header -->
          <div class="adm-card-header">
            <div>
              <h2 class="fs-4 mb-0 fw-bold d-flex align-items-center">
                <i class="fa-solid fa-bullhorn me-2 text-warning"></i> <?php echo htmlspecialchars($noticePageData['page_title'] ?? 'Admission Notice'); ?>
              </h2>
              <span class="text-white-50 extra-small">Official Session Circulars, Counseling Schedules &amp; Entrance Notifications</span>
            </div>
            <span class="badge bg-warning text-dark fw-bold px-3 py-2 rounded-pill shadow-sm">
              <i class="fa-regular fa-file-lines me-1"></i> <span id="totalNoticesCounter"><?php echo count($notices); ?></span> Notifications
            </span>
          </div>

          <div class="card-body p-4 p-md-5">

            <!-- Filter Navigation Tabs -->
            <div class="notice-filter-tabs">
              <button type="button" class="filter-tab-btn active" data-filter="all">
                <i class="fa-solid fa-layer-group"></i> All Circulars
                <span class="tab-count"><?php echo count($notices); ?></span>
              </button>
              <button type="button" class="filter-tab-btn" data-filter="2026-27">
                <i class="fa-solid fa-circle text-success" style="font-size: 8px;"></i> Session 2026-27
                <span class="tab-count">5</span>
              </button>
              <button type="button" class="filter-tab-btn" data-filter="2025-26">
                Session 2025-26
                <span class="tab-count">5</span>
              </button>
              <button type="button" class="filter-tab-btn" data-filter="2024-25">
                Session 2024-25
                <span class="tab-count">4</span>
              </button>
              <button type="button" class="filter-tab-btn" data-filter="Paramedical">
                <i class="fa-solid fa-user-doctor" style="font-size: 11px;"></i> Paramedical
                <span class="tab-count">7</span>
              </button>
              <button type="button" class="filter-tab-btn" data-filter="archived">
                <i class="fa-solid fa-box-archive" style="font-size: 11px;"></i> Archived
                <span class="tab-count">24</span>
              </button>
            </div>

            <!-- Search Bar & Results Counter Bar -->
            <div class="row align-items-center g-3 mb-4">
              <div class="col-md-8">
                <div class="notice-search-box">
                  <i class="fa-solid fa-magnifying-glass search-icon-pos"></i>
                  <input type="text" id="noticeSearchInput" class="notice-search-input" placeholder="Search notices by keyword, session (e.g. 2026-27, B.Ed, Entrance)...">
                  <button type="button" id="searchClearBtn" class="search-clear-btn" title="Clear search">
                    <i class="fa-solid fa-xmark"></i>
                  </button>
                </div>
              </div>
              <div class="col-md-4 text-md-end">
                <span class="text-muted small fw-medium">
                  Showing <strong id="visibleCount" class="text-dark"><?php echo count($notices); ?></strong> of <?php echo count($notices); ?> circulars
                </span>
              </div>
            </div>

            <!-- Notices List Container -->
            <div id="noticesContainer">
              <?php if (!empty($notices)): ?>
                <?php foreach ($notices as $idx => $n): 
                  $sessionTag = $n['session'] ?? 'Archived';
                  $isCurrent = ($sessionTag === '2026-27');
                  $isNew = !empty($n['is_new']) || $isCurrent;
                  $category = $n['category'] ?? 'Admission';
                ?>
                  <div class="notice-item-card notice-entry <?php echo $isCurrent ? 'is-current-session' : ''; ?> <?php echo $isNew ? 'is-new-notice' : ''; ?>"
                       data-session="<?php echo htmlspecialchars($sessionTag); ?>"
                       data-category="<?php echo htmlspecialchars($category); ?>">
                    
                    <div class="d-flex align-items-center gap-3 flex-grow-1">
                      <div class="notice-icon-box flex-shrink-0">
                        <i class="fa-solid fa-file-pdf"></i>
                      </div>
                      <div>
                        <a href="<?php echo htmlspecialchars($n['url']); ?>" target="_blank" rel="noopener" class="notice-title-link">
                          <?php echo htmlspecialchars($n['title']); ?>
                        </a>
                        <div class="notice-meta-tags">
                          <span class="meta-tag meta-tag-date">
                            <i class="fa-regular fa-calendar-days"></i> <?php echo htmlspecialchars($n['date']); ?>
                          </span>
                          
                          <?php if ($sessionTag !== 'Archived'): ?>
                            <span class="meta-tag meta-tag-session">
                              <i class="fa-solid fa-graduation-cap"></i> <?php echo htmlspecialchars($sessionTag); ?>
                            </span>
                          <?php else: ?>
                            <span class="meta-tag bg-light text-muted">
                              <i class="fa-solid fa-box-archive"></i> Archive
                            </span>
                          <?php endif; ?>

                          <?php if ($category !== 'Admission'): ?>
                            <span class="meta-tag meta-tag-category">
                              <?php echo htmlspecialchars($category); ?>
                            </span>
                          <?php endif; ?>

                          <?php if ($isNew): ?>
                            <span class="meta-tag meta-tag-new">
                              <i class="fa-solid fa-sparkles"></i> NEW
                            </span>
                          <?php endif; ?>
                        </div>
                      </div>
                    </div>

                    <div class="flex-shrink-0">
                      <a href="<?php echo htmlspecialchars($n['url']); ?>" target="_blank" rel="noopener" class="btn-notice-download">
                        <i class="fa-solid fa-arrow-down-to-line"></i> Download PDF
                      </a>
                    </div>
                  </div>
                <?php endforeach; ?>
              <?php else: ?>
                <div class="p-5 text-center text-muted">
                  <i class="fa-regular fa-folder-open fs-1 text-muted mb-3 d-block"></i>
                  No admission notices available at this moment.
                </div>
              <?php endif; ?>

              <!-- No Results State (Hidden by default) -->
              <div id="noticesEmptyState" class="notices-empty-state">
                <i class="fa-solid fa-file-circle-question fs-1 text-muted mb-2 d-block"></i>
                <h5 class="fw-bold text-dark mb-1">No Matching Circulars Found</h5>
                <p class="text-muted small mb-3">Try adjusting your keyword search or select a different session tab.</p>
                <button type="button" id="resetFiltersBtn" class="btn btn-sm btn-outline-primary rounded-pill px-4 fw-semibold">
                  <i class="fa-solid fa-rotate-left me-1"></i> Reset Filters
                </button>
              </div>
            </div>

          </div>
        </div>
      </div>

      <!-- Right Column: Reusable Admission Sidebar -->
      <?php require_once __DIR__ . '/includes/admission_sidebar.php'; ?>

    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const searchInput = document.getElementById('noticeSearchInput');
  const searchClearBtn = document.getElementById('searchClearBtn');
  const tabButtons = document.querySelectorAll('.filter-tab-btn');
  const noticeCards = document.querySelectorAll('.notice-entry');
  const visibleCountEl = document.getElementById('visibleCount');
  const emptyStateEl = document.getElementById('noticesEmptyState');
  const resetFiltersBtn = document.getElementById('resetFiltersBtn');

  let currentTab = 'all';

  function filterNotices() {
    const query = searchInput ? searchInput.value.toLowerCase().trim() : '';
    let visibleCount = 0;

    // Show/hide clear button
    if (searchClearBtn) {
      searchClearBtn.style.display = query.length > 0 ? 'block' : 'none';
    }

    noticeCards.forEach(card => {
      const session = card.getAttribute('data-session') || '';
      const text = card.textContent.toLowerCase();
      
      // Check tab filter
      let matchesTab = false;
      if (currentTab === 'all') {
        matchesTab = true;
      } else if (currentTab === 'archived') {
        matchesTab = (session === 'Archived' || session === '2023-24' || session === '2022-23' || session === '2021-22');
      } else {
        matchesTab = (session === currentTab);
      }

      // Check search filter
      const matchesSearch = query === '' || text.includes(query);

      if (matchesTab && matchesSearch) {
        card.style.display = 'flex';
        visibleCount++;
      } else {
        card.style.display = 'none';
      }
    });

    if (visibleCountEl) {
      visibleCountEl.textContent = visibleCount;
    }

    if (emptyStateEl) {
      emptyStateEl.style.display = (visibleCount === 0) ? 'block' : 'none';
    }
  }

  // Search input listener
  if (searchInput) {
    searchInput.addEventListener('input', filterNotices);
  }

  // Search clear button listener
  if (searchClearBtn) {
    searchClearBtn.addEventListener('click', function() {
      searchInput.value = '';
      searchInput.focus();
      filterNotices();
    });
  }

  // Tab click listeners
  tabButtons.forEach(btn => {
    btn.addEventListener('click', function() {
      tabButtons.forEach(b => b.classList.remove('active'));
      this.classList.add('active');
      currentTab = this.getAttribute('data-filter');
      filterNotices();
    });
  });

  // Reset filters listener
  if (resetFiltersBtn) {
    resetFiltersBtn.addEventListener('click', function() {
      if (searchInput) searchInput.value = '';
      currentTab = 'all';
      tabButtons.forEach(b => {
        b.classList.toggle('active', b.getAttribute('data-filter') === 'all');
      });
      filterNotices();
    });
  }
});
</script>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
