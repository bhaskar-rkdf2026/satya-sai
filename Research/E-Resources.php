<?php
$page_title = 'E-Resources - SSSUTMS';
$banner_title = 'E-Resources';
$banner_category = 'Research';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
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
.er-stat-chip {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 16px 14px;
  display: flex; align-items: center; gap: 12px;
  height: 100%;
  transition: all 0.25s ease;
  box-shadow: 0 4px 12px rgba(0,0,0,0.02);
}
.er-stat-chip:hover {
  border-color: #cbd5e1;
  box-shadow: 0 6px 18px rgba(11,37,69,0.07);
  transform: translateY(-2px);
}
.er-stat-icon {
  width: 48px; height: 48px;
  border-radius: 12px;
  background: rgba(245,158,11,0.12);
  color: #d97706;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.35rem; flex-shrink: 0;
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

            <!-- Stat Chips -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-sm-6 col-md-3">
                <div class="er-stat-chip">
                  <div class="er-stat-icon"><i class="fa-solid fa-book-open-reader"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Public Domain</div>
                    <div class="fw-bold text-dark fs-6">Free E-Books</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="er-stat-chip">
                  <div class="er-stat-icon"><i class="fa-solid fa-laptop-code"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">IIT Portal</div>
                    <div class="fw-bold text-dark fs-6">NPTEL Courses</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="er-stat-chip">
                  <div class="er-stat-icon"><i class="fa-solid fa-building-columns"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Consortium</div>
                    <div class="fw-bold text-dark fs-6">INFLIBNET &amp; INDEST</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="er-stat-chip">
                  <div class="er-stat-icon"><i class="fa-solid fa-magnifying-glass"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Search</div>
                    <div class="fw-bold text-dark fs-6">Google Scholar</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Public Domain Books Section -->
            <div class="er-card">
              <div class="er-card-header">
                <i class="fa-solid fa-book text-warning"></i>
                <h5 class="fw-bold text-dark mb-0">Copyright Free &amp; Public Domain Book Links</h5>
              </div>

              <div class="er-link-item">
                <span class="fw-bold text-dark"><i class="fa-solid fa-link text-primary me-2"></i> Project Gutenberg</span>
                <a href="http://www.gutenberg.org/" target="_blank" rel="noopener" class="er-access-btn">www.gutenberg.org <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
              </div>
              <div class="er-link-item">
                <span class="fw-bold text-dark"><i class="fa-solid fa-link text-primary me-2"></i> ManyBooks</span>
                <a href="http://www.manybooks.net/" target="_blank" rel="noopener" class="er-access-btn">www.manybooks.net <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
              </div>
              <div class="er-link-item">
                <span class="fw-bold text-dark"><i class="fa-solid fa-link text-primary me-2"></i> BooksInMyPhone</span>
                <a href="http://www.booksinmyphone.com/" target="_blank" rel="noopener" class="er-access-btn">www.booksinmyphone.com <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
              </div>
              <div class="er-link-item">
                <span class="fw-bold text-dark"><i class="fa-solid fa-link text-primary me-2"></i> Planet eBook</span>
                <a href="http://www.planetebook.com/" target="_blank" rel="noopener" class="er-access-btn">www.planetebook.com <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
              </div>
              <div class="er-link-item">
                <span class="fw-bold text-dark"><i class="fa-solid fa-link text-primary me-2"></i> Book Depository Free</span>
                <a href="http://www.bookdepository.com/free" target="_blank" rel="noopener" class="er-access-btn">www.bookdepository.com/free <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
              </div>
              <div class="er-link-item">
                <span class="fw-bold text-dark"><i class="fa-solid fa-link text-primary me-2"></i> Feedbooks Public Domain</span>
                <a href="http://www.feedbooks.com/publicdomin" target="_blank" rel="noopener" class="er-access-btn">www.feedbooks.com/publicdomin <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
              </div>
              <div class="er-link-item">
                <span class="fw-bold text-dark"><i class="fa-solid fa-link text-primary me-2"></i> New Free Books</span>
                <a href="http://newfreebooks.com/" target="_blank" rel="noopener" class="er-access-btn">newfreebooks.com <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
              </div>
              <div class="er-link-item">
                <span class="fw-bold text-dark"><i class="fa-solid fa-link text-primary me-2"></i> Scribd</span>
                <a href="http://www.scribd.com/" target="_blank" rel="noopener" class="er-access-btn">www.scribd.com <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
              </div>
              <div class="er-link-item">
                <span class="fw-bold text-dark"><i class="fa-solid fa-link text-primary me-2"></i> Open Culture Free eBooks</span>
                <a href="http://www.openculture.com/free_ebooks" target="_blank" rel="noopener" class="er-access-btn">www.openculture.com/free_ebooks <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
              </div>
              <div class="er-link-item">
                <span class="fw-bold text-dark"><i class="fa-solid fa-link text-primary me-2"></i> Authorama</span>
                <a href="http://www.authorama.com/" target="_blank" rel="noopener" class="er-access-btn">www.authorama.com <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
              </div>
              <div class="er-link-item mb-0">
                <span class="fw-bold text-dark"><i class="fa-solid fa-link text-primary me-2"></i> Alison Free Courses</span>
                <a href="http://alison.com/" target="_blank" rel="noopener" class="er-access-btn">alison.com <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
              </div>
            </div>

            <!-- E-Content & Repositories Section -->
            <div class="er-card mb-0">
              <div class="er-card-header">
                <i class="fa-solid fa-database text-warning"></i>
                <h5 class="fw-bold text-dark mb-0">E-Content &amp; National Digital Repositories</h5>
              </div>

              <div class="er-link-item">
                <span class="fw-bold text-dark"><i class="fa-solid fa-graduation-cap text-warning me-2"></i> NPTEL IIT Madras</span>
                <a href="http://nptel.iitm.ac.in/" target="_blank" rel="noopener" class="er-access-btn">nptel.iitm.ac.in <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
              </div>
              <div class="er-link-item">
                <span class="fw-bold text-dark"><i class="fa-solid fa-file-pdf text-danger me-2"></i> INDEST Core Members Brochure</span>
                <a href="http://paniit.iitd.ac.in/indest/downloads/brochureforcoremembers.pdf" target="_blank" rel="noopener" class="er-access-btn">Download PDF <i class="fa-solid fa-download"></i></a>
              </div>
              <div class="er-link-item">
                <span class="fw-bold text-dark"><i class="fa-solid fa-building-columns text-warning me-2"></i> INDEST Consortium IIT Delhi</span>
                <a href="http://www.indest.iitd.ac.in/" target="_blank" rel="noopener" class="er-access-btn">www.indest.iitd.ac.in <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
              </div>
              <div class="er-link-item">
                <span class="fw-bold text-dark"><i class="fa-solid fa-landmark text-warning me-2"></i> Indira Gandhi National Centre for Arts</span>
                <a href="http://www.ignca.gov.in/" target="_blank" rel="noopener" class="er-access-btn">www.ignca.gov.in <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
              </div>
              <div class="er-link-item">
                <span class="fw-bold text-dark"><i class="fa-solid fa-scroll text-warning me-2"></i> Vidyanidhi Indian Theses Repository</span>
                <a href="http://www.vidyanidhi.org.in/" target="_blank" rel="noopener" class="er-access-btn">www.vidyanidhi.org.in <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
              </div>
              <div class="er-link-item">
                <span class="fw-bold text-dark"><i class="fa-solid fa-network-wired text-warning me-2"></i> Digital Library of India (ERNET)</span>
                <a href="http://www.digitallibrary.ernet.in/" target="_blank" rel="noopener" class="er-access-btn">digitallibrary.ernet.in <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
              </div>
              <div class="er-link-item">
                <span class="fw-bold text-dark"><i class="fa-solid fa-server text-warning me-2"></i> INFLIBNET Centre</span>
                <a href="http://www.inflibnet.ac.in/" target="_blank" rel="noopener" class="er-access-btn">www.inflibnet.ac.in <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
              </div>
              <div class="er-link-item">
                <span class="fw-bold text-dark"><i class="fa-solid fa-newspaper text-warning me-2"></i> NISCAIR CSIR</span>
                <a href="http://www.niscair.res.in/" target="_blank" rel="noopener" class="er-access-btn">www.niscair.res.in <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
              </div>
              <div class="er-link-item">
                <span class="fw-bold text-dark"><i class="fa-solid fa-user-shield text-warning me-2"></i> VVGNLI Ministry of Labour</span>
                <a href="http://www.vvgnli.org/" target="_blank" rel="noopener" class="er-access-btn">www.vvgnli.org <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
              </div>
              <div class="er-link-item mb-0">
                <span class="fw-bold text-dark"><i class="fa-solid fa-magnifying-glass text-warning me-2"></i> Google Scholar (All Subjects Search)</span>
                <a href="https://scholar.google.co.in/" target="_blank" rel="noopener" class="er-access-btn">scholar.google.co.in <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
              </div>
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