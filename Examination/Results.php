<?php
$page_title = 'Examination Results - SSSUTMS';
$banner_title = 'Examination Results';
$banner_category = 'Examination';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';

// Fetch dynamic results from Admin / page_documents.json
$allResults = get_page_documents('Results');

// Extract unique categories
$categories = ['All'];
foreach ($allResults as $res) {
  $c = !empty($res['category']) ? trim($res['category']) : 'General';
  if (!in_array($c, $categories)) {
    $categories[] = $c;
  }
}

// Group results by date
$resultsByDate = [];
foreach ($allResults as $res) {
  $rawDate = $res['date'] ?? '';
  $dateLabel = (!empty($rawDate) && $rawDate !== '2026-09-11') ? date('d M Y', strtotime($rawDate)) : 'Recent Results';
  if (!isset($resultsByDate[$dateLabel])) {
    $resultsByDate[$dateLabel] = [];
  }
  $resultsByDate[$dateLabel][] = $res;
}
?>

<style>
.naac-section { 
  background-color: #f8fafc;
  font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
}
.naac-main-card {
  background: #ffffff;
  border-radius: 16px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 25px rgba(15,23,42,0.06);
  overflow: hidden;
  margin-bottom: 2rem;
}
.naac-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%) !important;
  color: #ffffff !important;
  padding: 1.8rem 2rem;
  position: relative;
}
.naac-header-banner h3,
.naac-header-banner h2,
.naac-header-banner h1,
.naac-header-banner p {
  color: #ffffff !important;
  text-shadow: 0 1px 2px rgba(0,0,0,0.2);
}
.naac-header-banner p {
  color: rgba(255, 255, 255, 0.85) !important;
}
.naac-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}

.naac-card-body { 
  padding: 2rem; 
  color: #1e293b !important;
  font-size: 0.975rem !important;
  line-height: 1.65 !important;
}

.res-stat-chip {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 12px 14px;
  display: flex;
  align-items: center;
  gap: 12px;
  height: 100%;
  transition: all 0.2s ease;
  box-shadow: 0 2px 6px rgba(15,23,42,0.03);
}
.res-stat-chip:hover {
  border-color: #cbd5e1;
  box-shadow: 0 4px 14px rgba(11,37,69,0.06);
  transform: translateY(-2px);
}
.res-stat-icon {
  width: 40px;
  height: 40px;
  border-radius: 10px;
  background: rgba(245,158,11,0.12);
  color: #d97706;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.15rem;
  flex-shrink: 0;
}
.res-stat-label {
  font-size: 0.75rem !important;
  font-weight: 700 !important;
  text-transform: uppercase !important;
  color: #64748b !important;
  letter-spacing: 0.3px !important;
  line-height: 1.25 !important;
  margin-bottom: 2px !important;
}
.res-stat-value {
  font-size: 0.88rem !important;
  font-weight: 700 !important;
  color: #0f172a !important;
  line-height: 1.3 !important;
}

.res-group-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 1.5rem;
  margin-bottom: 1.5rem;
  box-shadow: 0 4px 12px rgba(15,23,42,0.03);
}
.res-date-badge {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: #f1f5f9;
  color: #0b2545;
  font-weight: 700;
  font-size: 0.88rem;
  padding: 6px 14px;
  border-radius: 8px;
  border-left: 3px solid #f59e0b;
  margin-bottom: 1rem;
}
.res-item-list {
  list-style: none;
  padding: 0;
  margin: 0;
  display: flex;
  flex-direction: column;
  gap: 10px;
}
.res-item-list li {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 10px;
  padding: 12px 18px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 16px;
  transition: all 0.2s ease;
}
.res-item-list li:hover {
  background: #ffffff;
  border-color: #cbd5e1;
  box-shadow: 0 4px 12px rgba(11,37,69,0.06);
}
.res-item-title {
  display: flex;
  align-items: center;
  gap: 10px;
  flex: 1 1 auto;
  font-size: 0.935rem;
  font-weight: 700;
  color: #0f172a;
  line-height: 1.4;
}
.res-item-title i {
  color: #10b981;
  font-size: 1rem;
  flex-shrink: 0;
}

.btn-naac-portal {
  background: linear-gradient(135deg, #0b2545 0%, #173866 100%) !important;
  color: #ffffff !important;
  border: 1.5px solid #d97706 !important;
  padding: 7px 18px !important;
  border-radius: 50px !important;
  font-weight: 700 !important;
  font-size: 0.85rem !important;
  text-decoration: none !important;
  display: inline-flex !important;
  align-items: center !important;
  justify-content: center !important;
  gap: 8px !important;
  transition: all 0.25s ease-in-out !important;
  box-shadow: 0 4px 12px rgba(11, 37, 69, 0.25) !important;
  white-space: nowrap !important;
  flex-shrink: 0 !important;
}
.btn-naac-portal:hover {
  background: linear-gradient(135deg, #173866 0%, #1e4b8a 100%) !important;
  border-color: #f59e0b !important;
  color: #ffffff !important;
  transform: translateY(-2px) !important;
  box-shadow: 0 6px 16px rgba(11, 37, 69, 0.35) !important;
}
.btn-naac-portal i {
  color: #f59e0b !important;
  font-size: 0.9rem !important;
}
.res-tabs-slider-wrap {
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
.res-tabs-slider-wrap:active {
  cursor: grabbing;
}
.res-tabs-slider-wrap::-webkit-scrollbar,
.res-tabs-slider-wrap::-webkit-scrollbar-thumb,
.res-tabs-slider-wrap::-webkit-scrollbar-track,
.res-tabs-slider-wrap::-webkit-scrollbar-button,
.res-tabs-slider-wrap::-webkit-scrollbar-corner {
  display: none !important;
  width: 0 !important;
  height: 0 !important;
  max-height: 0 !important;
  max-width: 0 !important;
  background: transparent !important;
  opacity: 0 !important;
  visibility: hidden !important;
}
.res-tabs-slider {
  display: flex;
  align-items: center;
  gap: 8px;
  flex-wrap: nowrap;
}
.res-cat-chip {
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
.res-cat-chip:hover {
  background: #f1f5f9;
  color: #0b2545;
  border-color: #cbd5e1;
}
.res-cat-chip.active {
  background: linear-gradient(135deg, #0b2545 0%, #1e4d8c 100%);
  color: #ffffff;
  border-color: #0b2545;
  box-shadow: 0 4px 12px rgba(11,37,69,0.25);
}
</style>

<section class="subpage-main-section naac-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-9 col-md-8">
        <div class="naac-main-card">
          <div class="naac-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <h3 class="fw-bold mb-1">EXAMINATION RESULTS</h3>
              <p class="mb-0 text-white-50">Sri Satya Sai University of Technology and Medical Sciences &bull; Official Result Declarations</p>
            </div>
            <div>
              <a href="https://www.sssutms.co.in/erp/Student/Registration/Result/" target="_blank" rel="noopener" class="btn btn-warning fw-bold px-4 py-2 text-dark rounded-3 shadow-sm">
                <i class="fa-solid fa-right-to-bracket me-1"></i> Student Result Portal
              </a>
            </div>
          </div>
          
          <div class="naac-card-body">
            <!-- Search & Filters -->
            <div class="bg-white p-3 rounded-4 border shadow-sm mb-4">
              <!-- Search Bar -->
              <div class="mb-3">
                <div class="input-group">
                  <span class="input-group-text bg-light border-end-0 text-muted px-3"><i class="fa-solid fa-magnifying-glass"></i></span>
                  <input type="text" id="resSearchInput" class="form-control border-start-0 py-2 fs-6" placeholder="Search result by course, semester, batch or keyword..." onkeyup="filterResults()">
                  <button class="btn btn-outline-secondary px-3" type="button" onclick="document.getElementById('resSearchInput').value=''; filterResults();" title="Clear Search"><i class="fa fa-times"></i></button>
                </div>
              </div>

              <!-- Category Tabs (Single Line Horizontal Scroll) -->
              <div class="res-tabs-slider-wrap">
                <div class="res-tabs-slider">
                  <?php foreach ($categories as $idx => $cat): ?>
                    <button type="button" class="res-cat-chip <?php echo $idx === 0 ? 'active' : ''; ?>" onclick="setResCat('<?php echo htmlspecialchars($cat); ?>', this)">
                      <?php echo htmlspecialchars($cat); ?>
                    </button>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>

            <!-- Results List Grouped by Date -->
            <div id="resultsContainer">
              <?php if (empty($allResults)): ?>
                <div class="alert alert-info text-center py-4">
                  <i class="fa-solid fa-circle-info fa-2x mb-2 text-primary d-block"></i>
                  <h6 class="fw-bold">No examination results published at the moment.</h6>
                  <p class="small text-muted mb-0">Please check back soon or visit the ERP Portal.</p>
                </div>
              <?php else: ?>
                <?php foreach ($resultsByDate as $dateHeading => $items): ?>
                  <div class="res-group-card res-date-section" data-date="<?php echo htmlspecialchars($dateHeading); ?>">
                    <div class="res-date-badge"><i class="fa-solid fa-calendar-day text-warning"></i> <?php echo htmlspecialchars($dateHeading); ?></div>
                    <ul class="res-item-list">
                      <?php foreach ($items as $doc): 
                        $title = $doc['title'] ?? 'Examination Result';
                        $cat = !empty($doc['category']) ? $doc['category'] : 'General';
                        $link = !empty($doc['file']) ? $doc['file'] : 'https://www.sssutms.co.in/erp/Student/Registration/Result/';
                        if (strpos($link, 'http') !== 0 && strpos($link, 'ftp') !== 0 && $link !== '#') {
                          $link = BASE_URL . ltrim($link, '/');
                        }
                      ?>
                        <li class="result-item" data-title="<?php echo strtolower(htmlspecialchars($title)); ?>" data-category="<?php echo htmlspecialchars($cat); ?>">
                          <div class="res-item-title">
                            <i class="fa-solid fa-circle-check"></i> 
                            <div>
                              <span><?php echo htmlspecialchars($title); ?></span>
                              <span class="badge bg-light text-muted border ms-2 small fw-normal"><?php echo htmlspecialchars($cat); ?></span>
                            </div>
                          </div>
                          <a href="<?php echo htmlspecialchars($link); ?>" target="_blank" rel="noopener" class="btn-naac-portal">
                            <i class="fa-solid fa-arrow-right-to-bracket"></i> Check Result
                          </a>
                        </li>
                      <?php endforeach; ?>
                    </ul>
                  </div>
                <?php endforeach; ?>
              <?php endif; ?>
            </div>

            <div id="noResAlert" class="alert alert-warning text-center py-4 mt-3" style="display:none;">
              <i class="fa-solid fa-magnifying-glass fa-2x mb-2 text-warning d-block"></i>
              <h6 class="fw-bold">No results match your search query or filter.</h6>
              <p class="small text-muted mb-0">Try clearing the search box or selecting another category.</p>
            </div>

          </div>
        </div>
      </div>
      
      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-3 col-md-4 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<script>
let currentResCat = 'All';

function setResCat(cat, btn) {
  currentResCat = cat;
  document.querySelectorAll('.res-cat-chip').forEach(b => b.classList.remove('active'));
  if (btn) btn.classList.add('active');
  filterResults();
}

function filterResults() {
  const q = (document.getElementById('resSearchInput')?.value || '').toLowerCase().trim();
  const dateSections = document.querySelectorAll('.res-date-section');
  let totalVisible = 0;

  dateSections.forEach(sec => {
    const items = sec.querySelectorAll('.result-item');
    let secVisible = 0;

    items.forEach(item => {
      const title = (item.getAttribute('data-title') || '').toLowerCase();
      const cat = item.getAttribute('data-category') || '';

      const matchesQuery = !q || title.includes(q);
      const matchesCat = currentResCat === 'All' || cat.toLowerCase() === currentResCat.toLowerCase();

      if (matchesQuery && matchesCat) {
        item.style.display = 'flex';
        secVisible++;
        totalVisible++;
      } else {
        item.style.display = 'none';
      }
    });

    sec.style.display = (secVisible > 0) ? 'block' : 'none';
  });

  const noRes = document.getElementById('noResAlert');
  if (noRes) {
    noRes.style.display = (totalVisible === 0 && dateSections.length > 0) ? 'block' : 'none';
  }
}

// Enable smooth mouse wheel and drag scroll for single-line category chips
document.addEventListener('DOMContentLoaded', function() {
  const slider = document.querySelector('.res-tabs-slider-wrap');
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