<?php
$page_title = 'UG & PG Scholars Project - SSSUTMS';
$banner_title = 'UG & PG Scholars Project';
$banner_category = 'Research';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';

// Fetch dynamic UG & PG Scholars Project data from Admin
$ugpgData = function_exists('get_page_documents') ? get_page_documents('UGAndPGScholarsProject') : [];
$ugpg = !empty($ugpgData[0]) ? $ugpgData[0] : [];
$ugpgTitle = !empty($ugpg['title']) ? $ugpg['title'] : 'UG & PG SCHOLARS PROJECT';
$ugpgSubtitle = !empty($ugpg['subtitle']) ? $ugpg['subtitle'] : 'Nurturing Early Curiosity, Scientific Methodology & Student Research Papers';
$ugpgPhilosophy = !empty($ugpg['philosophy']) ? $ugpg['philosophy'] : '<p>SSSUTMS University aims at sculpting young creative professionals with an intellect to thoroughly know the past, critically analyze the present, and creatively shape the future. The idea of teaching is not conventional or limiting students to passive information; rather it is progressive and creative, facilitating them to think, experiment, and discover under able guidance.</p><p>Over past years, research and innovation was the forte of postgraduate students, Ph.D. scholars, and faculty members. However, competent authorities resolved to include undergraduate scholars as well, so that the spark of curiosity is inculcated at the earliest possible stage.</p><p>The University Scholars Hub includes academic rank holders from various faculties. As part of hub activities, academic research projects, short studies, and field surveys are carried out by groups of scholars under designated faculty mentors, compiling results into scientific papers.</p>';
$ugpgQuoteText = !empty($ugpg['quote_text']) ? $ugpg['quote_text'] : 'Excellence is a continuous process and not an accident.';
$ugpgQuoteAuthor = !empty($ugpg['quote_author']) ? $ugpg['quote_author'] : 'Dr. A.P.J. Abdul Kalam';
$ugpgNotice = !empty($ugpg['notice']) ? $ugpg['notice'] : 'Department-wise compilation of abstracts and research papers are published annually by the University Directorate of Research & Development.';
?>

<style>
.ugpg-section { background-color: #f8fafc; }
.ugpg-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15,23,42,0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}
.ugpg-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2.2rem 2rem;
  position: relative;
}
.ugpg-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}

.ugpg-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 16px;
  padding: 1.5rem;
  box-shadow: 0 4px 16px rgba(0,0,0,0.02);
  margin-bottom: 1.75rem;
}
.ugpg-card-header {
  display: flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 1.2rem;
  padding-bottom: 0.85rem;
  border-bottom: 2px solid #f1f5f9;
}
.ugpg-card-header i {
  color: #f59e0b;
  font-size: 1.3rem;
}
</style>

<section class="subpage-main-section ugpg-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="ugpg-main-card">

          <!-- Header Banner -->
          <div class="ugpg-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-graduation-cap me-1"></i> Student Research &amp; Innovation
              </span>
              <h3 class="fw-bold text-white mb-1 fs-3"><?php echo htmlspecialchars($ugpgTitle); ?></h3>
              <p class="text-white-50 mb-0 small"><?php echo htmlspecialchars($ugpgSubtitle); ?></p>
            </div>
          </div>

          <!-- Content Body -->
          <div class="p-4">

            <!-- About Scholars Project Card -->
            <div class="ugpg-card">
              <div class="ugpg-card-header">
                <i class="fa-solid fa-lightbulb text-warning"></i>
                <h5 class="fw-bold text-dark mb-0">Research Philosophy &amp; Objective</h5>
              </div>
              <div class="lh-lg text-dark" style="text-align: justify;">
                <?php echo $ugpgPhilosophy; ?>
              </div>

              <!-- Quote Card -->
              <div class="mt-4 p-3 bg-light border-start border-4 border-warning rounded-3">
                <p class="fst-italic text-dark mb-1 fs-6">"<?php echo htmlspecialchars($ugpgQuoteText); ?>"</p>
                <div class="fw-bold text-primary small">— <?php echo htmlspecialchars($ugpgQuoteAuthor); ?></div>
              </div>
            </div>

            <!-- Compendium Notice -->
            <div class="ugpg-card mb-0">
              <div class="ugpg-card-header">
                <i class="fa-solid fa-book-open text-warning"></i>
                <h5 class="fw-bold text-dark mb-0">Annual Research Compendium</h5>
              </div>
              <p class="text-muted mb-0 small">
                <?php echo htmlspecialchars($ugpgNotice); ?>
              </p>
            </div>

          </div>
        </div><!-- end ugpg-main-card -->
      </div><!-- end col-lg-8 -->

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>