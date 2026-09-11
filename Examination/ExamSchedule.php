<?php
$page_title = 'Exam Schedule & Time Tables - SSSUTMS';
$banner_title = 'Exam Schedule & Time Tables';
$banner_category = 'Examination';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';

// Fetch dynamic schedules from Admin / page_documents.json
$allSchedules = get_page_documents('ExamSchedule');

// Extract categories
$categories = ['All'];
foreach ($allSchedules as $s) {
  $c = !empty($s['category']) ? trim($s['category']) : 'General';
  if (!in_array($c, $categories)) {
    $categories[] = $c;
  }
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

.es-stat-chip {
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
.es-stat-chip:hover {
  border-color: #cbd5e1;
  box-shadow: 0 4px 14px rgba(11,37,69,0.06);
  transform: translateY(-2px);
}
.es-stat-icon {
  width: 42px;
  height: 42px;
  border-radius: 10px;
  background: rgba(245,158,11,0.12);
  color: #d97706;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.15rem;
  flex-shrink: 0;
}
.es-stat-label {
  font-size: 0.75rem !important;
  font-weight: 700 !important;
  text-transform: uppercase !important;
  color: #64748b !important;
  letter-spacing: 0.3px !important;
  line-height: 1.25 !important;
  margin-bottom: 2px !important;
}
.es-stat-value {
  font-size: 0.88rem !important;
  font-weight: 700 !important;
  color: #0f172a !important;
  line-height: 1.3 !important;
}

.exam-session-header {
  background: #f1f5f9;
  border-left: 4px solid #0b2545;
  border-radius: 10px;
  padding: 1rem 1.25rem;
  margin-top: 1.5rem;
  margin-bottom: 1rem;
  box-shadow: 0 2px 6px rgba(15, 23, 42, 0.03);
}

.table-responsive {
  border-radius: 12px;
  overflow-x: auto;
  border: 1px solid #cbd5e1;
  margin-top: 0.5rem;
  margin-bottom: 1.5rem;
}
.naac-custom-table {
  margin-bottom: 0 !important;
  width: 100% !important;
  border-collapse: collapse !important;
}
.naac-table-header {
  background-color: #0b2545 !important;
}
.naac-table-header th {
  color: #ffffff !important;
  font-size: 0.85rem !important;
  font-weight: 700 !important;
  padding: 12px 14px !important;
  text-align: center;
}
.naac-custom-table tbody tr {
  transition: background-color 0.15s ease;
}
.naac-custom-table tbody tr:hover {
  background-color: #f8fafc !important;
}
.naac-custom-table tbody td {
  padding: 12px 14px !important;
  font-size: 0.88rem !important;
  border-bottom: 1px solid #e2e8f0;
}

.btn-naac-pdf {
  background: linear-gradient(135deg, #0b2545 0%, #1e4d8c 100%) !important;
  color: #ffffff !important;
  font-size: 0.82rem;
  font-weight: 700;
  padding: 6px 14px;
  border-radius: 8px;
  border: 1px solid rgba(245,158,11,0.35);
  text-decoration: none !important;
  display: inline-flex;
  align-items: center;
  gap: 6px;
  white-space: nowrap;
  box-shadow: 0 2px 4px rgba(11,37,69,0.12);
  transition: all 0.2s ease;
}
.btn-naac-pdf:hover {
  background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%) !important;
  color: #ffffff !important;
  border-color: #d97706;
  box-shadow: 0 4px 10px rgba(217,119,6,0.3);
  transform: translateY(-1px);
}
.es-tabs-slider-wrap {
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
.es-tabs-slider-wrap:active {
  cursor: grabbing;
}
.es-tabs-slider-wrap::-webkit-scrollbar,
.es-tabs-slider-wrap::-webkit-scrollbar-thumb,
.es-tabs-slider-wrap::-webkit-scrollbar-track,
.es-tabs-slider-wrap::-webkit-scrollbar-button,
.es-tabs-slider-wrap::-webkit-scrollbar-corner {
  display: none !important;
  width: 0 !important;
  height: 0 !important;
  max-height: 0 !important;
  max-width: 0 !important;
  background: transparent !important;
  opacity: 0 !important;
  visibility: hidden !important;
}
.es-tabs-slider {
  display: flex;
  align-items: center;
  gap: 8px;
  flex-wrap: nowrap;
}
.es-cat-chip {
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
.es-cat-chip:hover {
  background: #f1f5f9;
  color: #0b2545;
  border-color: #cbd5e1;
}
.es-cat-chip.active {
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
      <div class="col-lg-8 col-xl-9">
        <div class="naac-main-card">

          <!-- Header Banner -->
          <div class="naac-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-calendar-check me-1"></i> Examination Cell Schedules
              </span>
              <h3 class="fw-bold text-white mb-1 fs-3">EXAMINATION SCHEDULE &amp; TIMETABLES</h3>
              <p class="text-white-50 mb-0 small">Official University Timetables, Semester Schedules &amp; Practical Exam Dates</p>
            </div>
            <div>
              <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold fs-6">
                <i class="fa-solid fa-clock me-1"></i> <?php echo count($allSchedules); ?> Schedules
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
                  <input type="text" id="scheduleSearchInput" class="form-control border-start-0 py-2 fs-6" placeholder="Search timetable title, course, semester or keyword..." onkeyup="filterSchedules()">
                  <button class="btn btn-outline-secondary px-3" type="button" onclick="document.getElementById('scheduleSearchInput').value=''; filterSchedules();" title="Clear Search"><i class="fa fa-times"></i></button>
                </div>
              </div>

              <!-- Category Tabs (Single Line Horizontal Scroll) -->
              <div class="es-tabs-slider-wrap">
                <div class="es-tabs-slider">
                  <?php foreach ($categories as $idx => $cat): ?>
                    <button type="button" class="es-cat-chip <?php echo $idx === 0 ? 'active' : ''; ?>" onclick="setScheduleCat('<?php echo htmlspecialchars($cat); ?>', this)">
                      <?php echo htmlspecialchars($cat); ?>
                    </button>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>

            <!-- Schedules Table -->
            <div class="table-responsive">
              <table class="table align-middle naac-custom-table">
                <thead>
                  <tr class="naac-table-header">
                    <th style="width: 8%;">S.No.</th>
                    <th style="width: 58%; text-align: left;">Examination Schedule / Timetable Title</th>
                    <th style="width: 18%; text-align: center;">Category</th>
                    <th style="width: 16%; text-align: center;">Action</th>
                  </tr>
                </thead>
                <tbody id="schedulesTableBody">
                  <?php if (empty($allSchedules)): ?>
                    <tr>
                      <td colspan="4" class="text-center py-4 text-muted">No examination timetables found.</td>
                    </tr>
                  <?php else: ?>
                    <?php foreach ($allSchedules as $idx => $sch): 
                      $title = $sch['title'] ?? 'Examination Timetable';
                      $cat = !empty($sch['category']) ? $sch['category'] : 'General';
                      $file = $sch['file'] ?? '#';
                      $fileUrl = $file;
                      if (strpos($file, 'http') !== 0 && strpos($file, 'ftp') !== 0 && $file !== '#') {
                        $fileUrl = BASE_URL . ltrim($file, '/');
                      }
                    ?>
                      <tr class="schedule-row" data-title="<?php echo strtolower(htmlspecialchars($title)); ?>" data-category="<?php echo htmlspecialchars($cat); ?>">
                        <td class="fw-bold text-center text-muted"><?php echo $idx + 1; ?></td>
                        <td class="fw-semibold text-dark text-start">
                          <div class="d-flex align-items-center gap-2">
                            <i class="fa-regular fa-file-lines text-primary"></i>
                            <span><?php echo htmlspecialchars($title); ?></span>
                          </div>
                        </td>
                        <td class="text-center">
                          <span class="badge bg-light text-dark border px-2 py-1"><?php echo htmlspecialchars($cat); ?></span>
                        </td>
                        <td class="text-center">
                          <a class="btn-naac-pdf" href="<?php echo htmlspecialchars($fileUrl); ?>" target="_blank" rel="noopener">
                            <i class="fa-solid fa-file-pdf"></i> View PDF
                          </a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>

            <div id="noScheduleAlert" class="alert alert-warning text-center py-4 mt-3" style="display:none;">
              <i class="fa-solid fa-magnifying-glass fa-2x mb-2 text-warning d-block"></i>
              <h6 class="fw-bold">No examination timetables match your search query or filter.</h6>
              <p class="small text-muted mb-0">Try searching with course abbreviations like BAMS, B.Tech, MBA, MCA, or clear filters.</p>
            </div>

          </div>
        </div><!-- end naac-main-card -->
      </div><!-- end col-lg-8 -->

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<script>
let currentScheduleCat = 'All';

function setScheduleCat(cat, btn) {
  currentScheduleCat = cat;
  document.querySelectorAll('.es-cat-chip').forEach(b => b.classList.remove('active'));
  if (btn) btn.classList.add('active');
  filterSchedules();
}

function filterSchedules() {
  const q = (document.getElementById('scheduleSearchInput')?.value || '').toLowerCase().trim();
  const rows = document.querySelectorAll('.schedule-row');
  let visibleCount = 0;

  rows.forEach(row => {
    const title = (row.getAttribute('data-title') || '').toLowerCase();
    const cat = row.getAttribute('data-category') || '';

    const matchesQuery = !q || title.includes(q);
    const matchesCat = currentScheduleCat === 'All' || cat.toLowerCase() === currentScheduleCat.toLowerCase();

    if (matchesQuery && matchesCat) {
      row.style.display = '';
      visibleCount++;
    } else {
      row.style.display = 'none';
    }
  });

  const noRes = document.getElementById('noScheduleAlert');
  if (noRes) {
    noRes.style.display = (visibleCount === 0 && rows.length > 0) ? 'block' : 'none';
  }
}

// Enable smooth mouse wheel and drag scroll for single-line category chips
document.addEventListener('DOMContentLoaded', function() {
  const slider = document.querySelector('.es-tabs-slider-wrap');
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