<?php
$page_title = 'E-Resources - SSSUTMS';
$banner_title = 'E-Resources';
$banner_category = 'Research';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
// Fetch E-Resources from Admin Page Documents
$allEResources = [];
if (function_exists('get_page_documents')) {
    $allEResources = get_page_documents('ResearchEResources');
}

// Fallback if empty
if (empty($allEResources)) {
    $allEResources = [
        ['title' => 'Project Gutenberg', 'file_path' => 'http://www.gutenberg.org/', 'category' => 'Free Domain Books', 'document_no' => 'www.gutenberg.org'],
        ['title' => 'ManyBooks', 'file_path' => 'http://www.manybooks.net/', 'category' => 'Free Domain Books', 'document_no' => 'www.manybooks.net'],
        ['title' => 'BooksInMyPhone', 'file_path' => 'http://www.booksinmyphone.com/', 'category' => 'Free Domain Books', 'document_no' => 'www.booksinmyphone.com'],
        ['title' => 'Planet eBook', 'file_path' => 'http://www.planetebook.com/', 'category' => 'Free Domain Books', 'document_no' => 'www.planetebook.com'],
        ['title' => 'Book Depository Free', 'file_path' => 'http://www.bookdepository.com/free', 'category' => 'Free Domain Books', 'document_no' => 'www.bookdepository.com/free'],
        ['title' => 'Feedbooks Public Domain', 'file_path' => 'http://www.feedbooks.com/publicdomin', 'category' => 'Free Domain Books', 'document_no' => 'www.feedbooks.com/publicdomin'],
        ['title' => 'New Free Books', 'file_path' => 'http://newfreebooks.com/', 'category' => 'Free Domain Books', 'document_no' => 'http://newfreebooks.com'],
        ['title' => 'Scribd', 'file_path' => 'http://www.scribd.com/', 'category' => 'Free Domain Books', 'document_no' => 'www.scribd.com'],
        ['title' => 'Open Culture Free eBooks', 'file_path' => 'http://www.openculture.com/free_ebooks', 'category' => 'Free Domain Books', 'document_no' => 'www.openculture.com/free_ebooks'],
        ['title' => 'Authorama', 'file_path' => 'http://www.authorama.com/', 'category' => 'Free Domain Books', 'document_no' => 'www.authorama.com'],
        ['title' => 'Alison Free Courses', 'file_path' => 'http://alison.com/', 'category' => 'Free Domain Books', 'document_no' => 'http://alison.com/'],
        ['title' => 'NPTEL IIT Madras', 'file_path' => 'http://nptel.iitm.ac.in/', 'category' => 'Academic E-Content', 'document_no' => 'http://nptel.iitm.ac.in/'],
        ['title' => 'INDEST Core Members Brochure', 'file_path' => 'http://paniit.iitd.ac.in/indest/downloads/brochureforcoremembers.pdf', 'category' => 'Academic E-Content', 'document_no' => 'brochureforcoremembers.pdf'],
        ['title' => 'INDEST Consortium IIT Delhi', 'file_path' => 'http://www.indest.iitd.ac.in/', 'category' => 'Academic E-Content', 'document_no' => 'www.indest.iitd.ac.in'],
        ['title' => 'Indira Gandhi National Centre for Arts', 'file_path' => 'http://www.ignca.gov.in/', 'category' => 'Academic E-Content', 'document_no' => 'www.ignca.gov.in'],
        ['title' => 'Vidyanidhi Indian Theses Repository', 'file_path' => 'http://www.vidyanidhi.org.in/', 'category' => 'Academic E-Content', 'document_no' => 'www.vidyanidhi.org.in'],
        ['title' => 'Digital Library of India (ERNET)', 'file_path' => 'http://www.digitallibrary.ernet.in/', 'category' => 'Academic E-Content', 'document_no' => 'http://www.digitallibrary.ernet.in'],
        ['title' => 'INFLIBNET Centre', 'file_path' => 'http://www.inflibnet.ac.in/', 'category' => 'Academic E-Content', 'document_no' => 'www.inflibnet.ac.in'],
        ['title' => 'NISCAIR CSIR', 'file_path' => 'http://www.niscair.res.in/', 'category' => 'Academic E-Content', 'document_no' => 'http://www.niscair.res.in'],
        ['title' => 'VVGNLI Ministry of Labour', 'file_path' => 'http://www.vvgnli.org/', 'category' => 'Academic E-Content', 'document_no' => 'www.vvgnli.org'],
        ['title' => 'Google Scholar (All Subjects Search)', 'file_path' => 'https://scholar.google.co.in/', 'category' => 'Academic E-Content', 'document_no' => 'http://scholar.google.co.in']
    ];
}

$freeBooks = array_filter($allEResources, function($r) {
    return (isset($r['category']) && (stripos($r['category'], 'Free') !== false || stripos($r['category'], 'Book') !== false || stripos($r['category'], 'Domain') !== false));
});
if (empty($freeBooks)) $freeBooks = $allEResources;

$eContent = array_filter($allEResources, function($r) {
    return (isset($r['category']) && (stripos($r['category'], 'Academic') !== false || stripos($r['category'], 'Content') !== false || stripos($r['category'], 'Brochure') !== false));
});
?>

<style>
.er-section { background-color: #f8fafc; }
.er-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15,23,42,0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}
.er-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2.2rem 2rem;
  position: relative;
}
.er-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}

.er-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 16px;
  padding: 1.5rem;
  box-shadow: 0 4px 16px rgba(0,0,0,0.02);
  margin-bottom: 1.75rem;
}
.er-card-header {
  display: flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 1.2rem;
  padding-bottom: 0.85rem;
  border-bottom: 2px solid #f1f5f9;
}
.er-card-header i {
  color: #f59e0b;
  font-size: 1.3rem;
}
.er-link-item {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 10px;
  padding: 12px 16px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 12px;
  transition: all 0.2s ease;
  margin-bottom: 0.75rem;
}
.er-link-item:hover {
  background: #ffffff;
  border-color: #cbd5e1;
  box-shadow: 0 4px 14px rgba(11,37,69,0.06);
}
.er-access-btn {
  background: linear-gradient(135deg, #0b2545 0%, #1e4d8c 100%) !important;
  color: #ffffff !important;
  font-size: 0.8rem;
  font-weight: 700;
  padding: 6px 14px;
  border-radius: 6px;
  text-decoration: none !important;
  display: inline-flex;
  align-items: center;
  gap: 6px;
  white-space: nowrap;
}
.er-access-btn:hover {
  background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%) !important;
  color: #ffffff !important;
}
</style>

<section class="subpage-main-section er-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="er-main-card">

          <!-- Header Banner -->
          <div class="er-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-book-bookmark me-1"></i> Digital Library &amp; Knowledge Repositories
              </span>
              <h3 class="fw-bold text-white mb-1 fs-3">RESEARCH E-RESOURCES</h3>
              <p class="text-white-50 mb-0 small">Access Copyright-Free Books, Open Access E-Content &amp; Academic Databases</p>
            </div>
          </div>

          <!-- Content Body -->
          <div class="p-4">

            <!-- Public Domain Books Section -->
            <div class="er-card">
              <div class="er-card-header">
                <i class="fa-solid fa-book text-warning"></i>
                <h5 class="fw-bold text-dark mb-0">Places for Access copyright Free or Public Domain Books Link</h5>
              </div>

              <?php if (!empty($freeBooks)): ?>
                <?php foreach ($freeBooks as $item): 
                  $url = !empty($item['file_path']) ? $item['file_path'] : (!empty($item['url']) ? $item['url'] : '#');
                  $title = !empty($item['title']) ? $item['title'] : 'Free Book Portal';
                  $label = !empty($item['document_no']) ? $item['document_no'] : preg_replace('#^https?://#', '', rtrim($url, '/'));
                ?>
                  <div class="er-link-item">
                    <span class="fw-bold text-dark"><i class="fa-solid fa-book-open-reader text-primary me-2"></i> <?php echo htmlspecialchars($title); ?></span>
                    <a href="<?php echo htmlspecialchars($url); ?>" target="_blank" rel="noopener noreferrer" class="er-access-btn">
                      <?php echo htmlspecialchars($label); ?> <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    </a>
                  </div>
                <?php endforeach; ?>
              <?php else: ?>
                <p class="text-muted p-3">No public domain links found.</p>
              <?php endif; ?>
            </div>

            <!-- E-Content & Repositories Section -->
            <div class="er-card mb-0">
              <div class="er-card-header">
                <i class="fa-solid fa-database text-warning"></i>
                <h5 class="fw-bold text-dark mb-0">E-Content</h5>
              </div>

              <?php if (!empty($eContent)): ?>
                <?php foreach ($eContent as $item): 
                  $url = !empty($item['file_path']) ? $item['file_path'] : (!empty($item['url']) ? $item['url'] : '#');
                  $title = !empty($item['title']) ? $item['title'] : 'Academic Portal';
                  $label = !empty($item['document_no']) ? $item['document_no'] : preg_replace('#^https?://#', '', rtrim($url, '/'));
                  $isPdf = stripos($url, '.pdf') !== false;
                ?>
                  <div class="er-link-item">
                    <span class="fw-bold text-dark">
                      <i class="fa-solid <?php echo $isPdf ? 'fa-file-pdf text-danger' : 'fa-building-columns text-warning'; ?> me-2"></i> 
                      <?php echo htmlspecialchars($title); ?>
                    </span>
                    <a href="<?php echo htmlspecialchars($url); ?>" target="_blank" rel="noopener noreferrer" class="er-access-btn">
                      <?php echo htmlspecialchars($label); ?> <i class="fa-solid <?php echo $isPdf ? 'fa-download' : 'fa-arrow-up-right-from-square'; ?>"></i>
                    </a>
                  </div>
                <?php endforeach; ?>
              <?php else: ?>
                <p class="text-muted p-3">No e-content links found.</p>
              <?php endif; ?>
            </div>

          </div>
        </div><!-- end er-main-card -->
      </div><!-- end col-lg-8 -->

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>