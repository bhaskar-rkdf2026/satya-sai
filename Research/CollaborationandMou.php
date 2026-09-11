<?php
$page_title = 'Collaboration & MoU - SSSUTMS';
$banner_title = 'Collaboration & MoU';
$banner_category = 'Research';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';

// Fetch dynamic Collaboration & MoU data from Admin
$mouData = function_exists('get_page_documents') ? get_page_documents('CollaborationandMou') : [];
$mou = !empty($mouData[0]) ? $mouData[0] : [];
$mouOverview = !empty($mou['overview']) ? $mou['overview'] : '<p>Sri Satya Sai University of Technology and Medical Sciences (SSSUTMS) actively collaborates with leading national and international universities, research organizations, corporate houses, and government agencies to bridge academic theory with industry practice.</p><p>These strategic alliances aim to facilitate joint research projects, exchange of academic materials, student and faculty exchange programs, industrial training, joint organization of conferences, and technology transfer for community benefit.</p>';
$mouJointRd = !empty($mou['joint_rd']) ? $mou['joint_rd'] : 'Collaborative scientific investigation and sponsored research projects with government funding bodies and industrial partners.';
$mouIndustrial = !empty($mou['industrial_training']) ? $mou['industrial_training'] : 'Providing real-world exposure, practical skill development, and industry mentor-guided internships for undergraduate and postgraduate scholars.';
$mouFaculty = !empty($mou['faculty_exchange']) ? $mou['faculty_exchange'] : 'Academic exchange programs enabling faculty members and research scholars to share expertise and utilize specialized laboratories.';
$mouTechComm = !empty($mou['tech_comm']) ? $mou['tech_comm'] : 'Translating laboratory patent innovations into market-ready commercial products through corporate licensing agreements.';
?>

<style>
.mou-section { background-color: #f8fafc; }
.mou-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15,23,42,0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}
.mou-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2.2rem 2rem;
  position: relative;
}
.mou-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}

.mou-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 16px;
  padding: 1.5rem;
  box-shadow: 0 4px 16px rgba(0,0,0,0.02);
  margin-bottom: 1.75rem;
}
.mou-card-header {
  display: flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 1.2rem;
  padding-bottom: 0.85rem;
  border-bottom: 2px solid #f1f5f9;
}
.mou-card-header i {
  color: #f59e0b;
  font-size: 1.3rem;
}
</style>

<section class="subpage-main-section mou-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="mou-main-card">

          <!-- Header Banner -->
          <div class="mou-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-handshake me-1"></i> Strategic Institutional Alliances
              </span>
              <h3 class="fw-bold text-white mb-1 fs-3">COLLABORATIONS &amp; MEMORANDUMS OF UNDERSTANDING</h3>
              <p class="text-white-50 mb-0 small">Fostering National &amp; International Academic, Research, and Industrial Synergies</p>
            </div>
          </div>

          <!-- Content Body -->
          <div class="p-4">

            <!-- Overview Section -->
            <div class="mou-card">
              <div class="mou-card-header">
                <i class="fa-solid fa-handshake-simple"></i>
                <h5 class="fw-bold text-dark mb-0">Collaboration &amp; MoU Objectives</h5>
              </div>
              <div class="lh-lg text-dark" style="text-align: justify;">
                <?php echo $mouOverview; ?>
              </div>
            </div>

            <!-- Key Collaboration Areas -->
            <div class="mou-card mb-0">
              <div class="mou-card-header">
                <i class="fa-solid fa-layer-group"></i>
                <h5 class="fw-bold text-dark mb-0">Key Areas of Collaboration</h5>
              </div>
              <div class="row g-3">
                <div class="col-md-6">
                  <div class="p-3 bg-light border rounded-3 h-100">
                    <h6 class="fw-bold text-primary mb-1"><i class="fa-solid fa-microscope text-warning me-2"></i> Joint R&amp;D Projects</h6>
                    <p class="small text-muted mb-0"><?php echo htmlspecialchars($mouJointRd); ?></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="p-3 bg-light border rounded-3 h-100">
                    <h6 class="fw-bold text-primary mb-1"><i class="fa-solid fa-user-gear text-warning me-2"></i> Industrial Training &amp; Internships</h6>
                    <p class="small text-muted mb-0"><?php echo htmlspecialchars($mouIndustrial); ?></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="p-3 bg-light border rounded-3 h-100">
                    <h6 class="fw-bold text-primary mb-1"><i class="fa-solid fa-graduation-cap text-warning me-2"></i> Faculty &amp; Scholar Exchange</h6>
                    <p class="small text-muted mb-0"><?php echo htmlspecialchars($mouFaculty); ?></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="p-3 bg-light border rounded-3 h-100">
                    <h6 class="fw-bold text-primary mb-1"><i class="fa-solid fa-lightbulb text-warning me-2"></i> Technology Commercialization</h6>
                    <p class="small text-muted mb-0"><?php echo htmlspecialchars($mouTechComm); ?></p>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div><!-- end mou-main-card -->
      </div><!-- end col-lg-8 -->

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>