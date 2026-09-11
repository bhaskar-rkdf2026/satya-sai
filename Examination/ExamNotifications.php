<?php
$page_title = 'Exam Notifications - SSSUTMS';
$banner_title = 'Exam Notifications';
$banner_category = 'Examination';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';

// Fetch dynamic notifications from Admin / page_documents.json
$allNotifs = get_page_documents('ExamNotifications');

// Extract unique categories
$categories = ['All'];
foreach ($allNotifs as $n) {
  $cat = !empty($n['category']) ? trim($n['category']) : 'General';
  if (!in_array($cat, $categories)) {
    $categories[] = $cat;
  }
}
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
  text-wrap: nowrap;

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
.en-tabs-slider-wrap {
  width: 100%;
  overflow-x: auto !important;
  overflow-y: hidden !important;
  white-space: nowrap;
  -webkit-overflow-scrolling: touch;
  scrollbar-width: none !important;
  -ms-overflow-style: none !important;
  padding-bottom: 2px;
  touch-action: pan-x;
  cursor: grab;
}
.en-tabs-slider-wrap:active {
  cursor: grabbing;
}
.en-tabs-slider-wrap::-webkit-scrollbar,
.en-tabs-slider-wrap::-webkit-scrollbar-thumb,
.en-tabs-slider-wrap::-webkit-scrollbar-track,
.en-tabs-slider-wrap::-webkit-scrollbar-button,
.en-tabs-slider-wrap::-webkit-scrollbar-corner {
  display: none !important;
  width: 0 !important;
  height: 0 !important;
  max-height: 0 !important;
  max-width: 0 !important;
  background: transparent !important;
  opacity: 0 !important;
  visibility: hidden !important;
}
.en-tabs-slider {
  display: flex;
  align-items: center;
  gap: 8px;
  flex-wrap: nowrap;
}
.en-cat-btn {
  border-radius: 50px;
  padding: 8px 18px;
  font-size: 0.84rem;
  font-weight: 600;
  border: 1px solid #e2e8f0;
  background: #ffffff;
  color: #475569;
  cursor: pointer;
  white-space: nowrap;
  flex-shrink: 0;
  transition: all 0.2s ease;
  box-shadow: 0 1px 3px rgba(0,0,0,0.03);
}
.en-cat-btn:hover {
  background: #f1f5f9;
  color: #0b2545;
  border-color: #cbd5e1;
}
.en-cat-btn.active {
  background: linear-gradient(135deg, #0b2545 0%, #1e4d8c 100%);
  color: #ffffff;
  border-color: #0b2545;
  box-shadow: 0 4px 12px rgba(11,37,69,0.25);
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
            <div>
              <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold fs-6">
                <i class="fa-solid fa-bullhorn me-1"></i> <?php echo count($allNotifs); ?> Notifications
              </span>
            </div>
          </div>

          <!-- Content Body -->
          <div class="p-4">

            <!-- Search & Category Filters (Search on top, Single Line Tabs below) -->
            <div class="bg-white p-3 rounded-4 border shadow-sm mb-4">
              <!-- Search Bar -->
              <div class="mb-3">
                <div class="input-group">
                  <span class="input-group-text bg-light border-end-0 text-muted px-3"><i class="fa-solid fa-magnifying-glass"></i></span>
                  <input type="text" id="notifSearchInput" class="form-control border-start-0 py-2 fs-6" placeholder="Search notifications by course, batch, semester or keyword..." onkeyup="filterNotifications()">
                  <button class="btn btn-outline-secondary px-3" type="button" onclick="document.getElementById('notifSearchInput').value=''; filterNotifications();" title="Clear Search"><i class="fa fa-times"></i></button>
                </div>
              </div>

              <!-- Category Tabs (Single Line Horizontal Scroll) -->
              <div class="en-tabs-slider-wrap">
                <div class="en-tabs-slider">
                  <?php foreach ($categories as $idx => $cat): ?>
                    <button type="button" class="en-cat-btn <?php echo $idx === 0 ? 'active' : ''; ?>" onclick="setCategoryFilter('<?php echo htmlspecialchars($cat); ?>', this)">
                      <?php echo htmlspecialchars($cat); ?>
                    </button>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>

            <!-- Notifications List -->
            <div class="en-list-group" id="notifListContainer">
              <?php if (empty($allNotifs)): ?>
                <div class="alert alert-info text-center py-4">
                  <i class="fa-solid fa-circle-info fa-2x mb-2 text-primary d-block"></i>
                  <h6 class="fw-bold">No exam notifications published at the moment.</h6>
                  <p class="small text-muted mb-0">Please check back soon for circular updates or contact the Examination Cell.</p>
                </div>
              <?php else: ?>
                <?php foreach ($allNotifs as $idx => $doc): 
                  $title = $doc['title'] ?? 'Notification';
                  $cat = !empty($doc['category']) ? $doc['category'] : 'General';
                  $date = !empty($doc['date']) ? date('d M Y', strtotime($doc['date'])) : '';
                  $file = $doc['file'] ?? '#';
                  $fileUrl = $file;
                  if (strpos($file, 'http') !== 0 && strpos($file, 'ftp') !== 0 && $file !== '#') {
                    $fileUrl = BASE_URL . ltrim($file, '/');
                  }
                  $isNew = (isset($doc['status']) && strtolower($doc['status']) === 'new') || ($idx < 5);
                ?>
                  <div class="en-item-card notif-card-item" data-title="<?php echo strtolower(htmlspecialchars($title)); ?>" data-category="<?php echo htmlspecialchars($cat); ?>">
                    <div class="d-flex align-items-start gap-3">
                      <div class="mt-1">
                        <?php if ($isNew): ?>
                          <span class="en-badge-new"><i class="fa-solid fa-bolt me-1"></i> New</span>
                        <?php else: ?>
                          <span class="badge bg-light text-secondary border fw-bold"><?php echo htmlspecialchars($cat); ?></span>
                        <?php endif; ?>
                      </div>
                      <div>
                        <h5 class="fw-bold text-dark mb-1 fs-6"><?php echo htmlspecialchars($title); ?></h5>
                        <div class="d-flex flex-wrap align-items-center gap-2 text-muted small">
                          <?php if (!empty($date)): ?>
                            <span><i class="fa-regular fa-calendar-days text-warning me-1"></i> <?php echo htmlspecialchars($date); ?></span>
                            <span>&bull;</span>
                          <?php endif; ?>
                          <span class="badge bg-primary-subtle text-primary fw-medium"><?php echo htmlspecialchars($cat); ?></span>
                        </div>
                      </div>
                    </div>
                    <div>
                      <a href="<?php echo htmlspecialchars($fileUrl); ?>" target="_blank" rel="noopener" class="en-download-btn">
                        <i class="fa-solid fa-file-pdf"></i> Download PDF
                      </a>
                    </div>
                  </div>
                <?php endforeach; ?>
              <?php endif; ?>
            </div><!-- end en-list-group -->

            <div id="noResultsAlert" class="alert alert-warning text-center py-4 mt-3" style="display:none;">
              <i class="fa-solid fa-magnifying-glass fa-2x mb-2 text-warning d-block"></i>
              <h6 class="fw-bold">No notifications match your search query or filter.</h6>
              <p class="small text-muted mb-0">Try clearing the search box or selecting another category.</p>
            </div>

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

<script>
let currentCatFilter = 'All';

function setCategoryFilter(category, btn) {
  currentCatFilter = category;
  document.querySelectorAll('.en-cat-btn').forEach(b => b.classList.remove('active'));
  if (btn) btn.classList.add('active');
  filterNotifications();
}

function filterNotifications() {
  const q = (document.getElementById('notifSearchInput')?.value || '').toLowerCase().trim();
  const items = document.querySelectorAll('.notif-card-item');
  let visibleCount = 0;

  items.forEach(item => {
    const title = (item.getAttribute('data-title') || '').toLowerCase();
    const cat = item.getAttribute('data-category') || '';

    const matchesQuery = !q || title.includes(q);
    const matchesCat = currentCatFilter === 'All' || cat.toLowerCase() === currentCatFilter.toLowerCase();

    if (matchesQuery && matchesCat) {
      item.style.display = 'flex';
      visibleCount++;
    } else {
      item.style.display = 'none';
    }
  });

  const noRes = document.getElementById('noResultsAlert');
  if (noRes) {
    noRes.style.display = (visibleCount === 0 && items.length > 0) ? 'block' : 'none';
  }
}

// Enable smooth mouse wheel and drag scroll for single-line category chips
document.addEventListener('DOMContentLoaded', function() {
  const slider = document.querySelector('.en-tabs-slider-wrap');
  if (!slider) return;

  // Convert vertical mouse wheel to horizontal scroll smoothly
  slider.addEventListener('wheel', function(e) {
    if (e.deltaY !== 0) {
      e.preventDefault();
      slider.scrollLeft += (e.deltaY * 1.5);
    }
  }, { passive: false });

  // Mouse drag to scroll
  let isDown = false;
  let startX = 0;
  let scrollLeft = 0;
  let dragged = false;

  slider.addEventListener('mousedown', function(e) {
    isDown = true;
    dragged = false;
    startX = e.pageX - slider.offsetLeft;
    scrollLeft = slider.scrollLeft;
  });

  window.addEventListener('mouseup', function() {
    isDown = false;
  });

  slider.addEventListener('mouseleave', function() {
    isDown = false;
  });

  slider.addEventListener('mousemove', function(e) {
    if (!isDown) return;
    const x = e.pageX - slider.offsetLeft;
    const walk = (x - startX);
    if (Math.abs(walk) > 5) {
      dragged = true;
    }
    slider.scrollLeft = scrollLeft - walk;
  });

  // Prevent accidental button clicks when user was dragging
  slider.addEventListener('click', function(e) {
    if (dragged) {
      e.stopPropagation();
      e.preventDefault();
      dragged = false;
    }
  }, true);
});
</script>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>