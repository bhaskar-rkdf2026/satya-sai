<?php
$page_title = 'Entrance Exam Alert - SSSUTMS';
$banner_title = 'Entrance Exam Alert';
$banner_category = 'Examination';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?>

<style>
.exam-section { background-color: #f8fafc; }
.exam-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15,23,42,0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}
.exam-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2.2rem 2rem;
  position: relative;
}
.exam-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.exam-stat-chip {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 16px 14px;
  display: flex; align-items: center; gap: 12px;
  height: 100%;
  transition: all 0.25s ease;
  box-shadow: 0 4px 12px rgba(0,0,0,0.02);
}
.exam-stat-chip:hover {
  border-color: #cbd5e1;
  box-shadow: 0 6px 18px rgba(11,37,69,0.07);
  transform: translateY(-2px);
}
.exam-stat-icon {
  width: 48px; height: 48px;
  border-radius: 12px;
  background: rgba(245,158,11,0.12);
  color: #d97706;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.35rem; flex-shrink: 0;
}
.exam-alert-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-left: 5px solid #f59e0b;
  border-radius: 14px;
  padding: 1.5rem;
  box-shadow: 0 4px 16px rgba(0,0,0,0.03);
  transition: all 0.25s ease;
}
.exam-alert-card:hover {
  box-shadow: 0 8px 24px rgba(11,37,69,0.08);
  transform: translateY(-2px);
}
.exam-btn {
  background: linear-gradient(135deg, #0b2545 0%, #1e4d8c 100%) !important;
  color: #ffffff !important;
  font-weight: 700;
  padding: 10px 22px;
  border-radius: 10px;
  border: 1px solid rgba(245,158,11,0.4);
  text-decoration: none !important;
  display: inline-flex;
  align-items: center;
  gap: 8px;
  box-shadow: 0 4px 12px rgba(11,37,69,0.15);
  transition: all 0.25s ease;
}
.exam-btn:hover {
  background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%) !important;
  color: #ffffff !important;
  border-color: #d97706;
  box-shadow: 0 6px 18px rgba(217,119,6,0.35);
  transform: translateY(-2px);
}
</style>

<section class="subpage-main-section exam-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="exam-main-card">

          <!-- Header Banner -->
          <div class="exam-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-bullhorn me-1"></i> Examination Cell Updates
              </span>
              <h3 class="fw-bold text-white mb-1 fs-3">ENTRANCE EXAM ALERTS</h3>
              <p class="text-white-50 mb-0 small">Official Announcements, Schedules &amp; Application Guidelines for Entrance Tests</p>
            </div>
          </div>

          <!-- Content Body -->
          <div class="p-4">

            <!-- Stat Chips -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-sm-6 col-md-3">
                <div class="exam-stat-chip">
                  <div class="exam-stat-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Admission Test</div>
                    <div class="fw-bold text-dark fs-6">Ph.D Entrance</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="exam-stat-chip">
                  <div class="exam-stat-icon"><i class="fa-solid fa-calendar-check"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Academic Session</div>
                    <div class="fw-bold text-dark fs-6">Session 2026</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="exam-stat-chip">
                  <div class="exam-stat-icon"><i class="fa-solid fa-clock-rotate-left"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Status</div>
                    <div class="fw-bold text-dark fs-6">Extended Dates</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="exam-stat-chip">
                  <div class="exam-stat-icon"><i class="fa-solid fa-file-pdf"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Notification</div>
                    <div class="fw-bold text-dark fs-6">Official PDF</div>
                  </div>
                </div>
              </div>
            </div>

            <?php
            $alerts = get_page_documents('EntranceExamAlert');
            if (empty($alerts)) {
                $alerts = [
                    [
                        'id' => 'eea_01',
                        'title' => 'Extended Entrance Exam (Ph.D Entrance Examination 2026)',
                        'category' => 'Ph.D.',
                        'file' => 'assets/images/Files/Link/New_Doc_06-02-2026_14.37_02062026_0434.pdf',
                        'date' => '2026-02-06',
                        'is_new' => true,
                        'desc' => 'Official notification regarding the extension of Ph.D. Entrance Examination 2026 application deadlines and guidelines.'
                    ]
                ];
            }
            ?>

            <!-- Search & Filter Bar -->
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4 p-3 bg-light rounded-3 border">
              <div class="d-flex align-items-center gap-2">
                <span class="badge bg-primary px-3 py-2 fs-6"><i class="fa-solid fa-list-check me-1"></i> Total Alerts: <?php echo count($alerts); ?></span>
                <span class="text-muted small">Live Synchronized with SSSUTMS Examination Cell</span>
              </div>
              <div class="input-group" style="max-width: 320px;">
                <span class="input-group-text bg-white border-end-0"><i class="fa-solid fa-magnifying-glass text-muted"></i></span>
                <input type="text" id="alertSearchInput" class="form-control border-start-0" placeholder="Search entrance alerts..." onkeyup="filterAlerts()">
              </div>
            </div>

            <!-- Entrance Exam Alerts Dynamic List -->
            <div class="d-flex flex-column gap-3" id="alertsContainer">
              <?php foreach ($alerts as $idx => $item): 
                $fileUrl = $item['file'];
                if (strpos($fileUrl, 'http') !== 0 && strpos($fileUrl, 'ftp') !== 0 && strpos($fileUrl, '#') !== 0) {
                  $fileUrl = BASE_URL . ltrim($fileUrl, '/');
                }
                $isPdf = (stripos($fileUrl, '.pdf') !== false);
                $isForm = (stripos($item['title'], 'Form') !== false || stripos($fileUrl, '.aspx') !== false);
                $isNew = !empty($item['is_new']) || ($idx < 2);
              ?>
                <div class="exam-alert-card d-flex align-items-center justify-content-between flex-wrap gap-3 alert-item-row" data-title="<?php echo htmlspecialchars(strtolower($item['title'] . ' ' . ($item['category'] ?? ''))); ?>">
                  <div style="flex: 1; min-width: 280px;">
                    <div class="d-flex align-items-center gap-2 mb-2 flex-wrap">
                      <?php if ($isNew): ?>
                        <span class="badge bg-danger px-2 py-1 fw-bold text-uppercase" style="font-size: 11px;">
                          <i class="fa-solid fa-beat-fade fa-circle me-1"></i> New
                        </span>
                      <?php endif; ?>
                      <?php if (!empty($item['category']) && $item['category'] !== 'General'): ?>
                        <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2 py-1 fw-bold" style="font-size: 11px;">
                          <i class="fa-solid fa-tag me-1"></i> <?php echo htmlspecialchars($item['category']); ?>
                        </span>
                      <?php endif; ?>
                      <?php if (!empty($item['date'])): ?>
                        <span class="text-muted small"><i class="fa-regular fa-calendar me-1"></i> <?php echo date('d M Y', strtotime($item['date'])); ?></span>
                      <?php endif; ?>
                    </div>
                    <h4 class="fw-bold text-dark mb-1 fs-5">
                      <i class="fa-solid fa-angles-right text-primary me-2"></i><?php echo htmlspecialchars($item['title']); ?>
                    </h4>
                    <?php if (!empty($item['desc'])): ?>
                      <p class="text-muted mb-0 small"><?php echo htmlspecialchars($item['desc']); ?></p>
                    <?php endif; ?>
                  </div>
                  <div>
                    <?php if ($isForm): ?>
                      <a href="<?php echo htmlspecialchars($fileUrl); ?>" target="_blank" rel="noopener" class="exam-btn" style="background: linear-gradient(135deg, #059669 0%, #047857 100%) !important; border-color: #059669;">
                        <i class="fa-solid fa-arrow-up-right-from-square text-white fs-6"></i> Open Online Form
                      </a>
                    <?php else: ?>
                      <a href="<?php echo htmlspecialchars($fileUrl); ?>" target="_blank" rel="noopener" class="exam-btn">
                        <i class="fa-solid fa-file-pdf text-warning fs-5"></i> View Official Notice
                      </a>
                    <?php endif; ?>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>

            <script>
            function filterAlerts() {
              const query = document.getElementById('alertSearchInput').value.toLowerCase().trim();
              const items = document.querySelectorAll('.alert-item-row');
              items.forEach(el => {
                const text = el.getAttribute('data-title');
                if (!query || text.includes(query)) {
                  el.style.display = 'flex';
                } else {
                  el.style.display = 'none';
                }
              });
            }
            </script>

          </div>
        </div><!-- end exam-main-card -->
      </div><!-- end col-lg-8 -->

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>