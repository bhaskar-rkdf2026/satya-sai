<?php
$page_title = 'Council For Research - SSSUTMS';
$banner_title = 'Council For Research';
$banner_category = 'Research';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?>

<?php
// Fetch dynamic council members from Admin
$allMembers = get_page_documents('CouncilForResearch');
$committeeMembers = [];
$advisoryMembers = [];

foreach ($allMembers as $m) {
  if (($m['category'] ?? '') === 'Advisory Board') {
    $advisoryMembers[] = $m;
  } else {
    $committeeMembers[] = $m;
  }
}
?>

<style>
.cfr-section { background-color: #f8fafc; }
.cfr-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15,23,42,0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}
.cfr-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2.2rem 2rem;
  position: relative;
}
.cfr-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.cfr-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 16px;
  overflow: hidden;
  margin-bottom: 2rem;
  box-shadow: 0 4px 14px rgba(0,0,0,0.03);
}
.cfr-card-header {
  background: #f8fafc;
  padding: 16px 20px;
  border-bottom: 1px solid #e2e8f0;
  display: flex;
  align-items: center;
  gap: 10px;
}
.cfr-table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 0;
}
.cfr-table th {
  background: #0b2545;
  color: #ffffff;
  padding: 14px 18px;
  font-size: 0.88rem;
  font-weight: 700;
  text-transform: uppercase;
}
.cfr-table td {
  padding: 14px 18px;
  border-bottom: 1px solid #f1f5f9;
  font-size: 0.92rem;
  color: #334155;
}
.cfr-table tr:hover {
  background-color: #f8fafc;
}
</style>

<section class="subpage-main-section cfr-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="cfr-main-card">

          <!-- Header Banner -->
          <div class="cfr-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-users-gear me-1"></i> Academic Apex Research Body
              </span>
              <h3 class="fw-bold text-white mb-1 fs-3">COUNCIL FOR RESEARCH (CFR)</h3>
              <p class="text-white-50 mb-0 small">Guiding Committee Members &amp; Focused Research Specializations at SSSUTMS</p>
            </div>
            <div>
              <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold fs-6">
                <i class="fa-solid fa-users me-1"></i> <?php echo count($allMembers); ?> Total Members
              </span>
            </div>
          </div>

          <!-- Content Body -->
          <div class="p-4">

            <!-- Committee Members Table Section -->
            <div class="cfr-card">
              <div class="cfr-card-header justify-content-between">
                <div class="d-flex align-items-center gap-2">
                  <i class="fa-solid fa-users text-warning"></i>
                  <h5 class="fw-bold text-dark mb-0">Council For Research Committee Members</h5>
                </div>
                <span class="badge bg-primary rounded-pill"><?php echo count($committeeMembers); ?> Members</span>
              </div>
              <div class="table-responsive">
                <table class="cfr-table">
                  <thead>
                    <tr>
                      <th class="text-center" style="width: 10%;">S.No.</th>
                      <th style="width: 90%;">Name &amp; Designation</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (empty($committeeMembers)): ?>
                      <tr><td colspan="2" class="text-center py-4 text-muted">No committee members configured.</td></tr>
                    <?php else: ?>
                      <?php foreach ($committeeMembers as $idx => $m): 
                        $name = $m['title'] ?? 'Member';
                        $role = $m['role'] ?? '';
                        $isChairman = stripos($name, 'Chairman') !== false || stripos($role, 'Chairman') !== false;
                        $isConvenor = stripos($name, 'Convenor') !== false || stripos($role, 'Convenor') !== false;
                      ?>
                        <tr>
                          <td class="text-center fw-bold text-primary"><?php echo $idx + 1; ?></td>
                          <td class="<?php echo ($isChairman || $isConvenor) ? 'fw-bold' : ''; ?>">
                            <?php echo htmlspecialchars($name); ?>
                            <?php if ($isChairman): ?>
                              <span class="badge bg-warning text-dark ms-2">Chairman</span>
                            <?php elseif ($isConvenor): ?>
                              <span class="badge bg-primary ms-2">Convenor</span>
                            <?php endif; ?>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </tbody>
                </table>
              </div>
            </div>

            <!-- Focused Research Areas / Advisory Board Table Section -->
            <div class="cfr-card mb-0">
              <div class="cfr-card-header justify-content-between">
                <div class="d-flex align-items-center gap-2">
                  <i class="fa-solid fa-lightbulb text-warning"></i>
                  <h5 class="fw-bold text-dark mb-0">Focused Research Areas &amp; Subject Experts at SSSUTMS</h5>
                </div>
                <span class="badge bg-primary rounded-pill"><?php echo count($advisoryMembers); ?> Specializations</span>
              </div>
              <div class="table-responsive">
                <table class="cfr-table">
                  <thead>
                    <tr>
                      <th class="text-center" style="width: 10%;">S.No.</th>
                      <th style="width: 90%;">Research Specialization &amp; Domain</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (empty($advisoryMembers)): ?>
                      <tr><td colspan="2" class="text-center py-4 text-muted">No specializations configured.</td></tr>
                    <?php else: ?>
                      <?php foreach ($advisoryMembers as $idx => $m): ?>
                        <tr>
                          <td class="text-center fw-bold text-primary"><?php echo $idx + 1; ?></td>
                          <td><?php echo htmlspecialchars($m['title'] ?? ''); ?></td>
                        </tr>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </tbody>
                </table>
              </div>
            </div>

          </div>
        </div><!-- end cfr-main-card -->
      </div><!-- end col-lg-8 -->

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>