<?php
$page_title = 'Photo & Video Gallery - SSSUTMS';
$banner_title = 'Campus Photo & Video Gallery';
$banner_category = 'Campus Life';

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/topbar.php';
require_once __DIR__ . '/includes/navbar.php';
require_once __DIR__ . '/includes/page-banner.php';

// Category Definitions
$categories = [
    'campus' => [
        'name' => 'Campus & Infrastructure',
        'dir' => 'assets/images/gallery/1',
        'badge' => 'Infrastructure',
        'icon' => 'fa-building-columns'
    ],
    'hostel' => [
        'name' => 'Hostels & Accommodation',
        'dir' => 'assets/images/gallery/2',
        'badge' => 'Hostel Life',
        'icon' => 'fa-hotel'
    ],
    'labs' => [
        'name' => 'Laboratories & Workshops',
        'dir' => 'assets/images/gallery/3',
        'badge' => 'Lab Facilities',
        'icon' => 'fa-flask-vial'
    ],
    'library' => [
        'name' => 'Central Library',
        'dir' => 'assets/images/gallery/4',
        'badge' => 'Learning Resources',
        'icon' => 'fa-book-open'
    ],
    'events' => [
        'name' => 'Placement Drives & Events',
        'dir' => 'assets/images/gallery/6',
        'badge' => 'Placements & Events',
        'icon' => 'fa-award'
    ]
];

$all_photos = [];

foreach ($categories as $catKey => $catData) {
    $dirPath = __DIR__ . '/' . $catData['dir'];
    if (is_dir($dirPath)) {
        $files = scandir($dirPath);
        foreach ($files as $f) {
            if ($f != '.' && $f != '..' && preg_match('/\.(jpg|jpeg|png|gif|webp)$/i', $f)) {
                $cleanName = pathinfo($f, PATHINFO_FILENAME);
                $cleanName = preg_replace('/[_\-\(\)]+/', ' ', $cleanName);
                $all_photos[] = [
                    'cat' => $catKey,
                    'catName' => $catData['name'],
                    'badge' => $catData['badge'],
                    'title' => ucwords(trim($cleanName)),
                    'url' => BASE_URL . $catData['dir'] . '/' . $f
                ];
            }
        }
    }
}
?>

<style>
.syl-card {
  background: #ffffff;
  border-radius: 16px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
  border: 1px solid #e2e8f0;
  overflow: hidden;
  margin-bottom: 2rem;
}
.syl-card-header {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 1.25rem 1.75rem;
  position: relative;
}
.syl-card-header::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.syl-card-title {
  font-size: 1.3rem;
  font-weight: 700;
  margin: 0;
  display: flex;
  align-items: center;
  gap: 12px;
  color: #ffffff;
}
.syl-card-body {
  padding: 1.75rem;
}
.syl-btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  background: #0b2545;
  color: #ffffff !important;
  font-weight: 700;
  font-size: 0.85rem;
  padding: 8px 18px;
  border-radius: 8px;
  text-decoration: none !important;
  transition: all 0.25s ease;
  box-shadow: 0 2px 6px rgba(11, 37, 69, 0.2);
  border: 1px solid #0b2545;
  white-space: nowrap;
}
.syl-btn:hover {
  background: #d97706;
  border-color: #d97706;
  color: #ffffff !important;
  transform: translateY(-2px);
  box-shadow: 0 6px 14px rgba(217, 119, 6, 0.35);
}
.gallery-filter-btn {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  background: #ffffff;
  color: #0b2545;
  border: 1px solid #cbd5e1;
  padding: 8px 16px;
  border-radius: 50px;
  font-size: 0.88rem;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.25s ease;
  margin: 4px;
}
.gallery-filter-btn:hover,
.gallery-filter-btn.active {
  background: #0b2545;
  color: #ffffff;
  border-color: #0b2545;
  box-shadow: 0 4px 12px rgba(11, 37, 69, 0.2);
}
.photo-card {
  position: relative;
  border-radius: 12px;
  overflow: hidden;
  background: #000;
  height: 250px;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.photo-card img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.4s ease, opacity 0.3s ease;
  opacity: 0.95;
}
.photo-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
}
.photo-card:hover img {
  transform: scale(1.08);
  opacity: 1;
}
.photo-overlay {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  padding: 1.25rem 1rem 0.75rem;
  background: linear-gradient(to top, rgba(11, 37, 69, 0.92) 0%, rgba(11, 37, 69, 0.5) 70%, transparent 100%);
  color: #ffffff;
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
}
.department-heading {
  background: #f8fafc;
  border-left: 4px solid #0b2545;
  padding: 10px 16px;
  margin-top: 2rem;
  margin-bottom: 1rem;
  font-size: 1.05rem;
  font-weight: 700;
  color: #0b2545;
  display: flex;
  align-items: center;
  gap: 10px;
  border-radius: 0 8px 8px 0;
}
.department-heading:first-of-type {
  margin-top: 0;
}
</style>

<section class="subpage-main-section py-4 bg-light">
  <div class="container-fluid px-lg-5">
    
    <div class="syl-card">
      <div class="syl-card-header d-flex flex-wrap align-items-center justify-content-between gap-3">
        <h2 class="syl-card-title">
          <i class="fa fa-camera-retro text-warning"></i>
          Campus Moments, Infrastructure &amp; Life at SSSUTMS
        </h2>
        <span class="badge bg-warning text-dark px-3 py-2 fw-bold">
          <i class="fa fa-images me-1"></i> <?php echo count($all_photos); ?> Photos Available
        </span>
      </div>
          
          <div class="syl-card-body">
            
            <!-- Live Search & Filter Bar -->
            <div class="row g-3 align-items-center mb-4 p-3 bg-white rounded-3 border shadow-sm">
              <div class="col-md-7">
                <div class="input-group">
                  <span class="input-group-text bg-light border-end-0"><i class="fa fa-search text-muted"></i></span>
                  <input type="text" id="tableSearchInput" class="form-control border-start-0" placeholder="Search photos by keyword, album, facility..." onkeyup="filterPhotos()">
                  <button class="btn btn-outline-secondary" type="button" onclick="clearSearch()" title="Clear search"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="col-md-5 text-md-end text-muted small">
                <span id="resultsCount">Showing all <?php echo count($all_photos); ?> photos</span>
              </div>
            </div>

            <!-- Category Filter Pills -->
            <div class="mb-4 text-center">
              <button type="button" class="gallery-filter-btn active" onclick="setCategory('all', this)">
                <i class="fa fa-th-large"></i> All Albums (<?php echo count($all_photos); ?>)
              </button>
              <?php foreach ($categories as $catKey => $catData): ?>
                <?php 
                  $count = count(array_filter($all_photos, function($p) use ($catKey) { return $p['cat'] === $catKey; }));
                ?>
                <button type="button" class="gallery-filter-btn" onclick="setCategory('<?php echo $catKey; ?>', this)">
                  <i class="fa <?php echo $catData['icon']; ?>"></i> <?php echo $catData['name']; ?> (<?php echo $count; ?>)
                </button>
              <?php endforeach; ?>
            </div>

            <!-- Photos Grid -->
            <div class="row g-3 g-md-4" id="galleryGrid">
              <?php foreach ($all_photos as $index => $item): ?>
                <div class="col-xl-3 col-lg-4 col-md-6 photo-item-col" data-cat="<?php echo $item['cat']; ?>">
                  <div class="photo-card">
                    <a href="<?php echo $item['url']; ?>" target="_blank" rel="noopener" class="d-block w-100 h-100">
                      <img src="<?php echo $item['url']; ?>" loading="lazy" decoding="async" alt="<?php echo htmlspecialchars($item['title']); ?>">
                    </a>
                    <div class="photo-overlay">
                      <div>
                        <span class="badge bg-warning text-dark mb-1" style="font-size: 10px;"><?php echo $item['badge']; ?></span>
                      </div>
                      <h6 class="fw-bold mb-0 text-truncate" style="font-size: 13px;" title="<?php echo htmlspecialchars($item['title']); ?>">
                        <?php echo htmlspecialchars($item['title']); ?>
                      </h6>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>

            <div id="noResultsMessage" class="alert alert-warning text-center d-none my-4">
              <i class="fa fa-search me-2"></i> No photos found matching your criteria.
            </div>

            <!-- Video Highlights Section -->
            <div class="department-heading">
              <i class="fa fa-film"></i> Campus Video Tour &amp; Convocation Highlights
            </div>

            <div class="row g-4 align-items-stretch">
              <div class="col-md-6 d-flex">
                <div class="border rounded-3 overflow-hidden bg-white shadow-sm d-flex flex-column w-100 h-100">
                  <div class="ratio ratio-16x9 bg-dark flex-shrink-0">
                    <iframe src="https://www.youtube.com/embed/DW6ApxPdCHM" title="SSSUTMS Campus Event Video" allowfullscreen loading="lazy"></iframe>
                  </div>
                  <div class="p-3 bg-white border-top d-flex flex-column justify-content-between flex-grow-1">
                    <h6 class="fw-bold text-dark mb-2">University Convocation &amp; Campus Tour</h6>
                    <p class="text-secondary small mb-0 flex-grow-1">Experience the academic ambiance, lush green campus, and infrastructure of SSSUTMS.</p>
                  </div>
                </div>
              </div>

              <div class="col-md-6 d-flex">
                <div class="border rounded-3 overflow-hidden bg-white shadow-sm d-flex flex-column w-100 h-100">
                  <div class="ratio ratio-16x9 bg-dark flex-shrink-0">
                    <iframe src="https://www.youtube.com/embed/dGPJD6T_0Z8" title="SSSUTMS Student Highlights" allowfullscreen loading="lazy"></iframe>
                  </div>
                  <div class="p-3 bg-white border-top d-flex flex-column justify-content-between flex-grow-1">
                    <h6 class="fw-bold text-dark mb-2">Student Workshops &amp; Campus Activities</h6>
                    <p class="text-secondary small mb-0 flex-grow-1">Highlights from technical symposiums, youth forums, and cultural celebrations.</p>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

  </div>
</section>

<script>
let currentCategory = 'all';

function setCategory(cat, btn) {
  currentCategory = cat;
  document.querySelectorAll('.gallery-filter-btn').forEach(b => b.classList.remove('active'));
  btn.classList.add('active');
  filterPhotos();
}

function filterPhotos() {
  const query = document.getElementById('tableSearchInput').value.toLowerCase().trim();
  const items = document.querySelectorAll('.photo-item-col');
  let visibleCount = 0;

  items.forEach(item => {
    const itemCat = item.getAttribute('data-cat');
    const text = item.innerText.toLowerCase();
    
    const matchesCat = (currentCategory === 'all' || itemCat === currentCategory);
    const matchesQuery = (query === '' || text.includes(query));

    if (matchesCat && matchesQuery) {
      item.style.display = '';
      visibleCount++;
    } else {
      item.style.display = 'none';
    }
  });

  const counter = document.getElementById('resultsCount');
  const noResults = document.getElementById('noResultsMessage');

  if (query === '' && currentCategory === 'all') {
    counter.textContent = `Showing all <?php echo count($all_photos); ?> photos`;
    if (noResults) noResults.classList.add('d-none');
  } else {
    counter.textContent = `Showing ${visibleCount} photo${visibleCount === 1 ? '' : 's'}`;
    if (noResults) {
      if (visibleCount === 0) {
        noResults.classList.remove('d-none');
      } else {
        noResults.classList.add('d-none');
      }
    }
  }
}

function clearSearch() {
  const input = document.getElementById('tableSearchInput');
  if (input) {
    input.value = '';
    filterPhotos();
    input.focus();
  }
}
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>