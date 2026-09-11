<?php
$page_title = 'NPTEL - SSSUTMS';
$banner_title = 'NPTEL';
$banner_category = 'Research';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';

// Fetch dynamic NPTEL data from Admin
$nptelData = function_exists('get_page_documents') ? get_page_documents('NPTEL') : [];
$nptel = !empty($nptelData[0]) ? $nptelData[0] : [];
$nptelTitle = !empty($nptel['title']) ? $nptel['title'] : 'NATIONAL PROGRAMME ON TECHNOLOGY ENHANCED LEARNING (NPTEL)';
$nptelSubtitle = !empty($nptel['subtitle']) ? $nptel['subtitle'] : 'SSSUTMS Local Chapter for IIT Online Certification Courses & FDPs';
$nptelPortalUrl = !empty($nptel['portal_url']) ? $nptel['portal_url'] : 'https://onlinecourses.nptel.ac.in/';
$nptelAbout = !empty($nptel['about_text']) ? $nptel['about_text'] : '<p>The National Programme on Technology Enhanced Learning (NPTEL) is a project initiated and handled by seven Indian Institute of Technology (IIT-Bombay, Delhi, Kanpur, Kharagpur, Madras, Roorkee and Guwahati) and Indian Institute of Science, Bangalore. It is a project funded by MHRD, Government of India, to develop and promote multimedia and web technology-based learning open for all.</p><p>Currently more than 940 courses are available on web portal http://nptel.ac.in for viewing and downloading. NPTEL has also initiated open online courses with certification where courses in different domains are regularly launched. Courses are free to enroll and are available at http://onlinecourses.nptel.ac.in. At the end of the course a certification exam (optional) is held on specific dates at specific centers. Certificate from IIT is awarded to those who register and appear for the examination. These exams have nominal fees with facility of scholarship and partial fee waiver for SC/ST candidates.</p>';
$nptelGuidelines = !empty($nptel['guidelines']) && is_array($nptel['guidelines']) ? $nptel['guidelines'] : [
    'Use a unique email id throughout the course run.',
    'Select \'Yes\' to the query - Are you a part of NPTEL Local Chapter.',
    'Choose the correct Local Chapter from the drop-down list while enrolling.',
    'Students - Enter college roll number (college id number).',
    'Faculty - Enter college Employee id no.'
];
$nptelLinks = !empty($nptel['links']) && is_array($nptel['links']) ? $nptel['links'] : [
    ['title' => 'Video on How to Enroll to the NPTEL Online Courses', 'url' => 'http://nptel.ac.in/LocalChapter/videos.php'],
    ['title' => 'Link for NPTEL Brochures and Booklet', 'url' => 'http://nptel.ac.in/Brochures/'],
    ['title' => 'How do students select their mentors', 'url' => 'https://drive.google.com/file/d/1JFS3yGPkMSeQZ3UHIZo8vrq9Z1LI6UCp/view'],
    ['title' => 'Guidelines for Mentors', 'url' => 'https://drive.google.com/file/d/1RukTlxUWN-XmBXCeVzP4o20b5fo1gGOe/view'],
    ['title' => 'Mentors flow in NPTEL Local Chapters', 'url' => 'https://drive.google.com/file/d/1NTIlO45DtQtJBCWZeDx9oWFHMZD2m9Wq/view']
];
?>

<style>
.nptel-section { background-color: #f8fafc; }
.nptel-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15,23,42,0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}
.nptel-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2.2rem 2rem;
  position: relative;
}
.nptel-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}

.nptel-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 16px;
  padding: 1.5rem;
  box-shadow: 0 4px 16px rgba(0,0,0,0.02);
  margin-bottom: 1.75rem;
}
.nptel-card-header {
  display: flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 1.2rem;
  padding-bottom: 0.85rem;
  border-bottom: 2px solid #f1f5f9;
}
.nptel-card-header i {
  color: #f59e0b;
  font-size: 1.3rem;
}
.nptel-link-btn {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 10px;
  padding: 12px 16px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 12px;
  color: #0b2545;
  font-weight: 600;
  text-decoration: none !important;
  transition: all 0.2s ease;
  margin-bottom: 0.75rem;
}
.nptel-link-btn:hover {
  background: #ffffff;
  border-color: #cbd5e1;
  color: #d97706;
  box-shadow: 0 4px 14px rgba(11,37,69,0.06);
}
</style>

<section class="subpage-main-section nptel-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="nptel-main-card">

          <!-- Header Banner -->
          <div class="nptel-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-laptop-file me-1"></i> IIT &amp; IISc E-Learning Initiative
              </span>
              <h3 class="fw-bold text-white mb-1 fs-3"><?php echo htmlspecialchars($nptelTitle); ?></h3>
              <p class="text-white-50 mb-0 small"><?php echo htmlspecialchars($nptelSubtitle); ?></p>
            </div>
            <div>
              <a href="<?php echo htmlspecialchars($nptelPortalUrl); ?>" target="_blank" rel="noopener" class="btn btn-warning fw-bold px-4 py-2 text-dark rounded-3">
                <i class="fa-solid fa-arrow-right-from-bracket me-1"></i> SWAYAM NPTEL Portal
              </a>
            </div>
          </div>

          <!-- Content Body -->
          <div class="p-4">

            <!-- About NPTEL Section -->
            <div class="nptel-card">
              <div class="nptel-card-header">
                <i class="fa-solid fa-circle-info text-warning"></i>
                <h5 class="fw-bold text-dark mb-0">About NPTEL</h5>
              </div>
              <div class="lh-lg text-dark" style="text-align: justify;">
                <?php echo $nptelAbout; ?>
              </div>
            </div>

            <!-- Enrollment Guidelines Section -->
            <div class="nptel-card">
              <div class="nptel-card-header">
                <i class="fa-solid fa-list-check text-warning"></i>
                <h5 class="fw-bold text-dark mb-0">Important Guidelines While Enrolling</h5>
              </div>
              <ul class="list-group list-group-flush border rounded-3">
                <?php foreach ($nptelGuidelines as $gLine): ?>
                  <li class="list-group-item p-3"><i class="fa-solid fa-check text-success me-2"></i> <?php echo htmlspecialchars($gLine); ?></li>
                <?php endforeach; ?>
              </ul>
            </div>

            <!-- Links & Resources Section -->
            <div class="nptel-card mb-0">
              <div class="nptel-card-header">
                <i class="fa-solid fa-link text-warning"></i>
                <h5 class="fw-bold text-dark mb-0">Important NPTEL Links &amp; Guides</h5>
              </div>

              <?php foreach ($nptelLinks as $lIdx => $lnk): ?>
                <a href="<?php echo htmlspecialchars($lnk['url'] ?? '#'); ?>" target="_blank" rel="noopener" class="nptel-link-btn <?php echo ($lIdx === count($nptelLinks) - 1) ? 'mb-0' : ''; ?>">
                  <span><i class="fa-solid fa-arrow-up-right-from-square text-primary me-2"></i> <?php echo htmlspecialchars($lnk['title'] ?? 'NPTEL Link'); ?></span>
                  <i class="fa-solid fa-arrow-right-from-bracket"></i>
                </a>
              <?php endforeach; ?>
            </div>

          </div>
        </div><!-- end nptel-main-card -->
      </div><!-- end col-lg-8 -->

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>