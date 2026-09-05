<?php
$page_title = 'Photo & Video Gallery - SSSUTMS';
$banner_title = 'Campus Photo Gallery';
$banner_category = 'Campus Life';

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/topbar.php';
require_once __DIR__ . '/includes/navbar.php';
require_once __DIR__ . '/includes/page-banner.php';

// Category Definitions
$categories = [
    'campus' => [
        'name' => 'Campus & Architecture',
        'icon' => 'fa-landmark',
        'dir' => 'assets/images/gallery/1',
        'badge' => 'Infrastructure',
        'badge_class' => 'bg-primary'
    ],
    'hostel' => [
        'name' => 'Hostels & Accommodation',
        'icon' => 'fa-hotel',
        'dir' => 'assets/images/gallery/2',
        'badge' => 'Campus Life',
        'badge_class' => 'bg-success'
    ],
    'labs' => [
        'name' => 'Laboratories & Workshops',
        'icon' => 'fa-flask-vial',
        'dir' => 'assets/images/gallery/3',
        'badge' => 'Academic Facilities',
        'badge_class' => 'bg-info text-dark'
    ],
    'library' => [
        'name' => 'Central Library & Reading Halls',
        'icon' => 'fa-book-open-reader',
        'dir' => 'assets/images/gallery/4',
        'badge' => 'Learning Resources',
        'badge_class' => 'bg-warning text-dark'
    ],
    'events' => [
        'name' => 'Rojgar Mela & Placement Drive',
        'icon' => 'fa-handshake-angle',
        'dir' => 'assets/images/gallery/6',
        'badge' => 'Placement Drive',
        'badge_class' => 'bg-danger'
    ]
];

// Curated real captions for images
$custom_titles = [
    // Folder 1 - Campus
    '6.png' => 'Honorary Felicitation Ceremony by Honourable State Cabinet Minister',
    'img-24.jpg' => 'Main University Entrance Gate & Welcome Avenue',
    'img-25.jpg' => 'University Academic Block & Lush Green Lawns',
    'img-28.jpg' => 'Annual Cultural & Student Gathering at Main Campus',
    'img-31.jpg' => 'Academic Department Wings & Engineering Blocks',
    'SSSUTMS_Building(6).jpg' => 'University Academic Wing & Central Administration',
    'SSSUTMS_Building(7).jpg' => 'Campus Inner Quadrangle & Spacious Corridors',
    'SSSUTMS_Building(8).jpg' => 'Multidisciplinary College Complexes & Campus Ground',

    // Folder 2 - Hostel
    'img-27.jpg' => 'University Boys Hostel & Residential Facilities',

    // Folder 3 - Labs
    'img-20.jpg' => 'Advanced Computer Science & IT Workstation Laboratory',
    'img-22.jpg' => 'Central Computing Center & High-Speed Digital Lab',
    'img-26.jpg' => 'Faculty & Students Research Workstation Area',

    // Folder 4 - Library
    'img-10.jpg' => 'Central University Library - Reading Section',
    'img-11.jpg' => 'Reference Books & Technical Journals Repository',
    'img-12.jpg' => 'Student Self-Study Cubicles & Research Desks',
    'img-13.jpg' => 'Spacious Academic Reading Hall for Scholars',
    'img-14.jpg' => 'Digital Library Terminals & E-Resource Cataloging',
    'img-15.jpg' => 'Circulation & Book Issue Counter - Central Library',
    'img-16.jpg' => 'Periodicals, Competitive Magazines & Daily Newspapers Section',
    'img-17.jpg' => 'Quiet Study Zone for Postgraduate & PhD Scholars',
    'img-18.jpg' => 'Textbook Lending & Return Services Section',
    'img-19.jpg' => 'Central Reading Hall with Extensive Scholarly Collection',

    // Folder 6 - Rojgar Mela (Live Captions)
    '26.png' => 'Vote of Thanks Delivered by Prof.(Dr) Ranjit Kumar Puse (Incharge) Rojgar Mela',
    '25.png' => 'Memento Presentation to Mr. Dharmendra Kumar Sharma (Ads Smart City Projects) by Dr. Priyanka Jhavar',
    '24.png' => 'Memento Presentation to Ms. Sneha Marathe (Progressive Expert Consulting) by Dr. Geeta Khoobchandani',
    '23.png' => 'Memento Presentation to Mr. Ashish Rauniar (Evershine Star Pvt Ltd) by Mrs. Ruchi Chouhan',
    '22.png' => 'Memento Presentation to Mr. Arun Kumar Verma (Central Digital Control) by Dr. Harsh Lohiya',
    '21.png' => 'Memento Presentation to Mr. Prajapati Jhilkumar (Shivshakti Construction) by Dr. Alka Thakur',
    '20.png' => 'Memento Presentation to Mr. Krishan Kumar (Heinrich Corporation) by Mr. Devendra Patle',
    '18.png' => 'Memento Presentation to Mr. Satendra Singh (Zydex Industries Pvt Ltd) by Dr. R. P. Singh',
    '17.png' => 'Memento Presentation to Mr. Rohit Kumar (Yashi Infotech) by Dr. Hemant Sharma',
    '16.png' => 'Memento Presentation to Mr. Aman Sen (Vardhman Textiles) by Dr. Abhishek Rathore',
    '15.png' => 'Memento Presentation to HR Executive (Aicraft Infrastructure) by University Authorities',
    '14.png' => 'Memento Presentation to Corporate Representative by Academic Leadership',
    '13.png' => 'Interaction with Corporate Recruiters during Rojgar Mela Industry Meet',
    '12.png' => 'Job Fair Inaugural Address by University Leadership & Dignitaries',
    '11.png' => 'Lamp Lighting Ceremony by Hon\'ble Guests at Rojgar Mela 2025',
    '10.png' => 'Dignitaries on Dais during Campus Placement & Industry Summit',
    '9.png' => 'Welcome Address & University Progress Overview by Campus Leadership',
    '8.png' => 'Student Registration & Screening Desks at Mega Rojgar Mela',
    '7.png' => 'Candidate Technical Interviews Conducted by Corporate Panels',
    '5.png' => 'Recruiters Evaluating Candidate Portfolios & Resumes',
    '4.png' => 'Candidates Assembled for Pre-Placement Briefing & Orientation',
    '3.png' => 'Offer Letter Handover & Felicitations to Selected Candidates',
    '2.png' => 'Group Photo with Participating Industry Leaders & HR Dignitaries',
    '1.png' => 'Rojgar Mela 2025 - University Placement Drive Highlights'
];

$all_photos = [];

foreach ($categories as $catKey => $catData) {
    $dirPath = __DIR__ . '/' . $catData['dir'];
    if (is_dir($dirPath)) {
        $files = scandir($dirPath);
        foreach ($files as $f) {
            if ($f != '.' && $f != '..' && preg_match('/\.(jpg|jpeg|png|gif|webp)$/i', $f)) {
                $title = isset($custom_titles[$f]) ? $custom_titles[$f] : ucwords(trim(str_replace(['_', '-', '(', ')', '.jpg', '.png', '.jpeg'], ' ', $f)));
                $all_photos[] = [
                    'cat' => $catKey,
                    'catName' => $catData['name'],
                    'badge' => $catData['badge'],
                    'badge_class' => $catData['badge_class'],
                    'title' => $title,
                    'file' => $f,
                    'url' => BASE_URL . $catData['dir'] . '/' . $f
                ];
            }
        }
    }
}
?>

<style>
  .gallery-main-card {
    background: #ffffff;
    border-radius: 16px;
    border: 1px solid #e2e8f0;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(11, 37, 69, 0.06);
    transition: all 0.3s ease;
  }
  .gallery-card-header {
    background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
    padding: 24px 30px;
    position: relative;
  }
  .gallery-gold-line {
    height: 3px;
    background: linear-gradient(90deg, #f3752c 0%, #f6a935 50%, #f3752c 100%);
    width: 100%;
  }
  .gallery-filter-wrapper {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 16px;
    background: #f8fafc;
    border-radius: 50px;
    border: 1px solid #e2e8f0;
    margin: 0 auto 30px auto;
    max-width: 1080px;
  }
  .gallery-pill-btn {
    border: 1px solid transparent;
    background: #ffffff;
    color: #334155;
    font-weight: 600;
    font-size: 0.85rem;
    padding: 8px 18px;
    border-radius: 50px;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    cursor: pointer;
    box-shadow: 0 1px 4px rgba(0,0,0,0.04);
    transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
  }
  .gallery-pill-btn:hover {
    background: #f1f5f9;
    color: #0b2545;
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(11, 37, 69, 0.08);
  }
  .gallery-pill-btn.active {
    background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
    color: #ffffff;
    border-color: #0b2545;
    box-shadow: 0 4px 14px rgba(11, 37, 69, 0.22);
  }
  .gallery-pill-btn .badge-pill-count {
    background: rgba(0, 0, 0, 0.08);
    color: inherit;
    font-size: 0.72rem;
    padding: 3px 7px;
    border-radius: 50px;
  }
  .gallery-pill-btn.active .badge-pill-count {
    background: linear-gradient(135deg, #f3752c 0%, #e0580a 100%);
    color: #ffffff;
  }
  .gallery-card-item {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 14px;
    overflow: hidden;
    position: relative;
    box-shadow: 0 3px 12px rgba(11, 37, 69, 0.04);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    height: 100%;
    display: flex;
    flex-direction: column;
  }
  .gallery-card-item:hover {
    border-color: #cbd5e1;
    transform: translateY(-4px);
    box-shadow: 0 10px 25px rgba(11, 37, 69, 0.12);
  }
  .gallery-media-box {
    position: relative;
    width: 100%;
    height: 220px;
    overflow: hidden;
    background: #0f172a;
    cursor: pointer;
  }
  .gallery-media-box img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
  }
  .gallery-card-item:hover .gallery-media-box img {
    transform: scale(1.08);
  }
  .gallery-overlay-hover {
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(11, 37, 69, 0.85) 0%, rgba(11, 37, 69, 0.2) 60%, transparent 100%);
    opacity: 0;
    transition: opacity 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .gallery-card-item:hover .gallery-overlay-hover {
    opacity: 1;
  }
  .gallery-zoom-btn {
    width: 44px;
    height: 44px;
    border-radius: 50%;
    background: #ffffff;
    color: #0b2545;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.1rem;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
    transform: translateY(10px);
    transition: all 0.25s ease;
  }
  .gallery-card-item:hover .gallery-zoom-btn {
    transform: translateY(0);
  }
  .gallery-zoom-btn:hover {
    background: #f3752c;
    color: #ffffff;
    transform: scale(1.1);
  }
  .gallery-top-badge {
    position: absolute;
    top: 12px;
    left: 12px;
    z-index: 2;
  }
  .gallery-desc-wrap {
    padding: 14px 16px;
    background: #ffffff;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }
  .gallery-photo-title {
    font-size: 0.86rem;
    font-weight: 600;
    color: #1e293b;
    line-height: 1.4;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    margin-bottom: 0;
  }

  /* Custom Lightbox Modal */
  .custom-lightbox-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background: rgba(11, 37, 69, 0.94);
    backdrop-filter: blur(8px);
    z-index: 99999;
    display: none;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.25s ease;
  }
  .custom-lightbox-modal.active {
    display: flex;
    opacity: 1;
  }
  .lightbox-content-box {
    max-width: 90vw;
    max-height: 90vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    position: relative;
  }
  .lightbox-img-el {
    max-width: 85vw;
    max-height: 75vh;
    border-radius: 12px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
    border: 1px solid rgba(255, 255, 255, 0.2);
    object-fit: contain;
    background: #000;
  }
  .lightbox-caption-bar {
    margin-top: 14px;
    color: #ffffff;
    text-align: center;
    max-width: 750px;
  }
  .lightbox-btn-close {
    position: absolute;
    top: 24px;
    right: 24px;
    background: rgba(255, 255, 255, 0.15);
    border: 1px solid rgba(255, 255, 255, 0.3);
    color: #ffffff;
    width: 42px;
    height: 42px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    font-size: 1.25rem;
    transition: all 0.2s ease;
    z-index: 100000;
  }
  .lightbox-btn-close:hover {
    background: #f3752c;
    border-color: #f3752c;
    transform: rotate(90deg);
  }
  .lightbox-nav-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(255, 255, 255, 0.15);
    border: 1px solid rgba(255, 255, 255, 0.3);
    color: #ffffff;
    width: 46px;
    height: 46px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    font-size: 1.35rem;
    transition: all 0.2s ease;
    z-index: 100000;
  }
  .lightbox-nav-btn:hover {
    background: #f3752c;
    border-color: #f3752c;
    transform: translateY(-50%) scale(1.1);
  }
  .lightbox-prev {
    left: 20px;
  }
  .lightbox-next {
    right: 20px;
  }
</style>

<section class="subpage-main-section py-4" style="background-color: #f8fafc;">
  <div class="container-fluid px-lg-5">
    
    <div class="gallery-main-card mb-4">
      
      <!-- Card Header with Portal Theme -->
      <div class="gallery-card-header text-white">
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
          <div class="d-flex align-items-center gap-3">
            <div class="bg-white bg-opacity-10 p-2 rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
              <i class="fa fa-camera-retro text-warning fs-4"></i>
            </div>
            <div>
              <h4 class="fw-bold mb-0 text-white">University Photo Gallery</h4>
              <p class="small text-white-50 mb-0">Capturing academic excellence, campus infrastructure, student activities, and landmark moments.</p>
            </div>
          </div>
          <div>
            <span class="badge rounded-pill px-3 py-2 fw-semibold" style="background: rgba(243, 117, 44, 0.25); border: 1px solid rgba(243, 117, 44, 0.45); color: #ffd5b8;">
              <i class="fa fa-images me-1"></i> <?php echo count($all_photos); ?> Photos Available
            </span>
          </div>
        </div>
      </div>
      <div class="gallery-gold-line"></div>

      <!-- Card Body -->
      <div class="p-4 p-md-5">

        <!-- Category Filter Pills -->
        <div class="gallery-filter-wrapper">
          <button type="button" class="gallery-pill-btn active" onclick="filterGallery('all', this)">
            <i class="fa fa-border-all text-warning"></i>
            <span>All Albums</span>
            <span class="badge-pill-count"><?php echo count($all_photos); ?></span>
          </button>
          <?php foreach ($categories as $catKey => $catData): ?>
            <?php 
              $catCount = count(array_filter($all_photos, function($p) use ($catKey) { return $p['cat'] === $catKey; }));
            ?>
            <button type="button" class="gallery-pill-btn" onclick="filterGallery('<?php echo $catKey; ?>', this)">
              <i class="fa <?php echo $catData['icon']; ?>"></i>
              <span><?php echo $catData['name']; ?></span>
              <span class="badge-pill-count"><?php echo $catCount; ?></span>
            </button>
          <?php endforeach; ?>
        </div>

        <!-- Photos Grid -->
        <div class="row g-3 g-md-4" id="galleryGrid">
          <?php foreach ($all_photos as $index => $item): ?>
            <div class="col-xl-3 col-lg-4 col-md-6 gallery-item-col" data-cat="<?php echo $item['cat']; ?>">
              <div class="gallery-card-item">
                <div class="gallery-media-box" onclick="openLightbox(<?php echo $index; ?>)">
                  <div class="gallery-top-badge">
                    <span class="badge <?php echo $item['badge_class']; ?> rounded-pill px-2 py-1 shadow-sm" style="font-size: 0.72rem; font-weight: 600;">
                      <?php echo $item['badge']; ?>
                    </span>
                  </div>
                  <img src="<?php echo $item['url']; ?>" loading="lazy" decoding="async" alt="<?php echo htmlspecialchars($item['title']); ?>">
                  <div class="gallery-overlay-hover">
                    <div class="gallery-zoom-btn">
                      <i class="fa fa-magnifying-glass-plus"></i>
                    </div>
                  </div>
                </div>
                <div class="gallery-desc-wrap">
                  <p class="gallery-photo-title" title="<?php echo htmlspecialchars($item['title']); ?>">
                    <?php echo htmlspecialchars($item['title']); ?>
                  </p>
                  <div class="d-flex justify-content-between align-items-center mt-2 pt-2 border-top">
                    <small class="text-muted" style="font-size: 0.75rem;">
                      <i class="fa fa-folder-open me-1 text-secondary"></i> <?php echo $item['catName']; ?>
                    </small>
                    <button type="button" class="btn btn-sm btn-link p-0 text-decoration-none fw-semibold" style="font-size: 0.78rem; color: #f3752c;" onclick="openLightbox(<?php echo $index; ?>)">
                      View <i class="fa fa-angle-right ms-1"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>

      </div>

    </div>

  </div>
</section>

<!-- Lightbox Modal -->
<div class="custom-lightbox-modal" id="customLightbox">
  <button type="button" class="lightbox-btn-close" onclick="closeLightbox()" title="Close (Esc)">
    <i class="fa fa-xmark"></i>
  </button>
  <button type="button" class="lightbox-nav-btn lightbox-prev" onclick="prevLightboxPhoto()" title="Previous Photo">
    <i class="fa fa-chevron-left"></i>
  </button>
  <button type="button" class="lightbox-nav-btn lightbox-next" onclick="nextLightboxPhoto()" title="Next Photo">
    <i class="fa fa-chevron-right"></i>
  </button>

  <div class="lightbox-content-box">
    <img src="" alt="" class="lightbox-img-el" id="lightboxImg">
    <div class="lightbox-caption-bar">
      <div class="d-flex align-items-center justify-content-center gap-2 mb-1">
        <span class="badge rounded-pill bg-warning text-dark px-3 py-1" id="lightboxBadge" style="font-size: 0.75rem;"></span>
        <span class="small text-white-50" id="lightboxCounter"></span>
      </div>
      <h6 class="fw-bold mb-0 text-white" id="lightboxTitle"></h6>
    </div>
  </div>
</div>

<script>
const galleryData = <?php echo json_encode($all_photos); ?>;
let currentPhotoIndex = 0;
let activeCategory = 'all';

function filterGallery(category, btn) {
  activeCategory = category;
  document.querySelectorAll('.gallery-pill-btn').forEach(b => b.classList.remove('active'));
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

function openLightbox(index) {
  currentPhotoIndex = index;
  updateLightbox();
  const lb = document.getElementById('customLightbox');
  lb.classList.add('active');
  document.body.style.overflow = 'hidden';
}

function closeLightbox() {
  const lb = document.getElementById('customLightbox');
  lb.classList.remove('active');
  document.body.style.overflow = '';
}

function updateLightbox() {
  if (currentPhotoIndex < 0) currentPhotoIndex = galleryData.length - 1;
  if (currentPhotoIndex >= galleryData.length) currentPhotoIndex = 0;

  const photo = galleryData[currentPhotoIndex];
  document.getElementById('lightboxImg').src = photo.url;
  document.getElementById('lightboxTitle').textContent = photo.title;
  document.getElementById('lightboxBadge').textContent = photo.badge;
  document.getElementById('lightboxCounter').textContent = `Photo ${currentPhotoIndex + 1} of ${galleryData.length}`;
}

function prevLightboxPhoto() {
  currentPhotoIndex--;
  updateLightbox();
}

function nextLightboxPhoto() {
  currentPhotoIndex++;
  updateLightbox();
}

// Keyboard controls
document.addEventListener('keydown', function(e) {
  const lb = document.getElementById('customLightbox');
  if (lb && lb.classList.contains('active')) {
    if (e.key === 'Escape') closeLightbox();
    if (e.key === 'ArrowLeft') prevLightboxPhoto();
    if (e.key === 'ArrowRight') nextLightboxPhoto();
  }
});

// Click outside image to close
document.getElementById('customLightbox').addEventListener('click', function(e) {
  if (e.target === this) {
    closeLightbox();
  }
});
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>