<?php
$page_title = 'R & D Cell - SSSUTMS';
$banner_title = 'R & D Cell';
$banner_category = 'Research';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';

// Fetch dynamic R&D Cell data from Admin Panel
$rdCellData = function_exists('get_page_documents') ? get_page_documents('RAndDCell') : [];
$rdCell = !empty($rdCellData[0]) ? $rdCellData[0] : [
    'title' => 'RESEARCH & DEVELOPMENT (R&D) CELL',
    'preamble' => "<p>Research, which is a scholarly and creative endeavor of faculty leading to innovations and development, is a major pillar of strength in a University system. Advancement achieved through research and development contributes significantly to academic excellence. However, in a multi-disciplinary and diversified university organizational set up, nurturing and promoting scientific & technological excellence through faculty-driven research is a vital task. In this regard, the Council for Research (CFR) of SSSUTMS plays a key role in providing focused attention in guiding and coordinating research activities of various departments and centers.</p><p>The mission of the council is to provide an encouraging ecosystem for promotion of research excellence. This is achieved through multifaceted tasks including facilitating the initiation, organization, and monitoring of research projects and student research. The Council also plays a major role in encouraging faculty to attract extramural funding support by providing linkages, collaborative support, and streamlining procedural guidelines.</p><p class=\"mb-0\">The Council is transforming into a single-window operating system for timely and effective action with the sole aim of encouraging and promoting quality research. With marked growth in student enrollment for Ph.D. programs, the Council for Research is committed to providing a platform for solving procedural issues associated with research. Within the established framework of the University system, the Council strives to transform the University into a leading destination for quality research and education in the country.</p>",
    'objectives' => [
        'Promote and facilitate collaborative and interdisciplinary research while enhancing research networking capacity and infrastructure.',
        'Effectively manage resources and research support for all members and throughout the University community.',
        'Provide education and training in research and related skills, especially for postgraduate and undergraduate scholars, augmenting constituent academic programs.',
        "Contribute effectively to the University's strategic educational and research missions, supporting synergies between research, teaching, and learning.",
        'Transfer and disseminate knowledge gained through research for societal benefit through various practical mechanisms.',
        'Enhance the reputation of members, constituent academic units, and the University through high-quality research outputs.',
        'Ensure strict integrity, quality, and ethical standards across all research activities.'
    ]
];
?>

<style>
.rdcell-section { background-color: #f8fafc; }
.rdcell-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15,23,42,0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}
.rdcell-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2.2rem 2rem;
  position: relative;
}
.rdcell-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.rdcell-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 16px;
  padding: 1.5rem;
  box-shadow: 0 4px 16px rgba(0,0,0,0.02);
  margin-bottom: 1.75rem;
}
.rdcell-card-header {
  display: flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 1.2rem;
  padding-bottom: 0.85rem;
  border-bottom: 2px solid #f1f5f9;
}
.rdcell-card-header i {
  color: #f59e0b;
  font-size: 1.3rem;
}
.rdcell-obj-list {
  list-style: none;
  padding: 0; margin: 0;
  display: flex;
  flex-direction: column;
  gap: 0.85rem;
}
.rdcell-obj-list li {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 14px 16px;
  display: flex;
  align-items: flex-start;
  gap: 12px;
  font-size: 0.95rem;
  color: #334155;
}
.rdcell-obj-num {
  width: 28px; height: 28px;
  border-radius: 50%;
  background: #0b2545;
  color: #fbbf24;
  font-weight: 700;
  font-size: 0.82rem;
  display: flex; align-items: center; justify-content: center;
  flex-shrink: 0;
  margin-top: 2px;
}
</style>

<section class="subpage-main-section rdcell-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="rdcell-main-card">

          <!-- Header Banner -->
          <div class="rdcell-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-atom me-1"></i> Scientific &amp; Technological Excellence
              </span>
              <h3 class="fw-bold text-white mb-1 fs-3">RESEARCH &amp; DEVELOPMENT (R&amp;D) CELL</h3>
              <p class="text-white-50 mb-0 small">Nurturing Innovation, Extramural Research Funding &amp; Interdisciplinary Collaboration</p>
            </div>
          </div>

          <!-- Content Body -->
          <div class="p-4">

            <!-- Overview Section -->
            <div class="rdcell-card">
              <div class="rdcell-card-header">
                <i class="fa-solid fa-circle-info"></i>
                <h5 class="fw-bold text-dark mb-0">Overview of R&amp;D Operations</h5>
              </div>
              <div class="lh-lg text-dark" style="text-align: justify;">
                <?php echo $rdCell['preamble'] ?? ''; ?>
              </div>
            </div>

            <!-- Objectives Section -->
            <div class="rdcell-card mb-0">
              <div class="rdcell-card-header">
                <i class="fa-solid fa-bullseye"></i>
                <h5 class="fw-bold text-dark mb-0">Objectives of the R&amp;D Cell</h5>
              </div>
              <ul class="rdcell-obj-list">
                <?php if (!empty($rdCell['objectives']) && is_array($rdCell['objectives'])): ?>
                  <?php foreach ($rdCell['objectives'] as $oIdx => $obj): ?>
                    <li>
                      <span class="rdcell-obj-num"><?php echo $oIdx + 1; ?></span>
                      <div><?php echo htmlspecialchars($obj); ?></div>
                    </li>
                  <?php endforeach; ?>
                <?php endif; ?>
              </ul>
            </div>

          </div>
        </div><!-- end rdcell-main-card -->
      </div><!-- end col-lg-8 -->

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>