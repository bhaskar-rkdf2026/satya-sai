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
        'name' => 'Campus & Buildings',
        'dir' => 'assets/images/gallery/1',
        'badge' => 'Infrastructure'
    ],
    'hostel' => [
        'name' => 'Hostels & Accommodation',
        'dir' => 'assets/images/gallery/2',
        'badge' => 'Campus Life'
    ],
    'labs' => [
        'name' => 'Laboratories & Workshops',
        'dir' => 'assets/images/gallery/3',
        'badge' => 'Academic Facilities'
    ],
    'library' => [
        'name' => 'Central Library & Reading Halls',
        'dir' => 'assets/images/gallery/4',
        'badge' => 'Learning Resources'
    ],
    'events' => [
        'name' => 'Rojgar Mela & Placement Drive',
        'dir' => 'assets/images/gallery/6',
        'badge' => 'Placements & Events'
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

<section class="subpage-main-section py-4 bg-light">
  <div class="container-fluid px-lg-5">
    
    <!-- Gallery Category Filter Tabs -->
    <div class="gallery-filter-nav mb-4 text-center">
      <button type="button" class="gallery-filter-btn active" onclick="filterGallery('all', this)">
        <i class="fa fa-th-large me-1"></i> All Photos (<?php echo count($all_photos); ?>)
      </button>
      <?php foreach ($categories as $catKey => $catData): ?>
        <?php 
          $count = count(array_filter($all_photos, function($p) use ($catKey) { return $p['cat'] === $catKey; }));
        ?>
        <button type="button" class="gallery-filter-btn" onclick="filterGallery('<?php echo $catKey; ?>', this)">
          <?php echo $catData['name']; ?> (<?php echo $count; ?>)
        </button>
      <?php endforeach; ?>
    </div>

    <!-- Gallery Grid with Real Photos -->
    <div class="row g-3 g-md-4" id="galleryGrid">
      <?php foreach ($all_photos as $index => $item): ?>
        <div class="col-xl-3 col-lg-4 col-md-6 gallery-item-col" data-cat="<?php echo $item['cat']; ?>">
          <div class="gallery-card shadow-sm rounded-3 overflow-hidden bg-white position-relative" style="height: 240px;">
            <a href="<?php echo $item['url']; ?>" target="_blank" rel="noopener" class="d-block w-100 h-100">
              <img src="<?php echo $item['url']; ?>" loading="lazy" decoding="async" alt="<?php echo htmlspecialchars($item['title']); ?>" class="w-100 h-100 object-fit-cover">
            </a>
            <div class="gallery-overlay p-3">
              <span class="badge bg-warning text-dark mb-1" style="font-size: 10px;"><?php echo $item['badge']; ?></span>
              <h6 class="text-white fw-bold mb-0" style="font-size: 13px;"><?php echo htmlspecialchars($item['title']); ?></h6>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<script>
function filterGallery(category, btn) {
  document.querySelectorAll('.gallery-filter-btn').forEach(b => b.classList.remove('active'));
  btn.classList.add('active');
  
  const items = document.querySelectorAll('.gallery-item-col');
  items.forEach(item => {
    if (category === 'all' || item.getAttribute('data-cat') === category) {
      item.style.display = 'block';
    } else {
      item.style.display = 'none';
    }
  });
}
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>