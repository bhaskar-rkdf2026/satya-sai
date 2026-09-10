<?php
$page_title = 'Commerce - SSSUTMS';
$banner_title = 'Commerce';
$banner_category = 'Academic';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
.com-page-section { background-color: #f8fafc; }
.com-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15,23,42,0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}
.com-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2rem;
  position: relative;
}
.com-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.com-stat-chip {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 14px 18px;
  display: flex; align-items: center; gap: 14px;
  height: 100%;
  transition: all 0.2s ease;
}
.com-stat-chip:hover {
  border-color: #cbd5e1;
  box-shadow: 0 4px 14px rgba(0,0,0,0.04);
}
.com-stat-icon {
  width: 44px; height: 44px;
  border-radius: 10px;
  background: rgba(245,158,11,0.1);
  color: #d97706;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.25rem; flex-shrink: 0;
}
.com-course-label {
  display: flex; align-items: center;
  margin: 1.5rem 0 0.6rem 0;
}
.com-course-label-pill {
  background: linear-gradient(90deg, #0b2545, #1e4d8c);
  color: #fbbf24;
  font-size: 0.78rem; font-weight: 800;
  letter-spacing: 0.06em; text-transform: uppercase;
  padding: 6px 16px 6px 14px;
  border-radius: 8px 0 0 8px;
  display: flex; align-items: center; gap: 7px;
  white-space: nowrap;
}
.com-course-label-duration {
  background: #f59e0b;
  color: #ffffff;
  font-size: 0.78rem; font-weight: 800;
  padding: 6px 14px;
  border-radius: 0 8px 8px 0;
  white-space: nowrap;
}
.com-course-table {
  width: 100%; border-collapse: collapse;
  font-size: 0.92rem; margin-bottom: 0;
}
.com-course-table thead th {
  background: #1e3a5f; color: #ffffff;
  font-weight: 600; padding: 11px 14px;
  border: none; text-align: left;
  font-size: 0.88rem; letter-spacing: 0.03em;
  text-transform: uppercase;
}
.com-course-table tbody tr:nth-child(even) { background: #f0f4f9; }
.com-course-table tbody tr:nth-child(odd)  { background: #ffffff; }
.com-course-table tbody tr:hover {
  background: #e8f0fb;
  transition: background 0.15s ease;
}
.com-course-table tbody td {
  padding: 10px 14px;
  border-bottom: 1px solid #e2e8f0;
  color: #334155; vertical-align: middle;
}
.com-course-table tbody td:first-child { font-weight: 600; color: #0b2545; }
.com-badge-duration {
  display: inline-block;
  background: rgba(245,158,11,0.12);
  color: #b45309; font-weight: 700; font-size: 0.82rem;
  border-radius: 6px; padding: 3px 10px;
  border: 1px solid rgba(245,158,11,0.25);
}
.com-table-wrapper {
  border-radius: 12px; overflow: hidden;
  border: 1px solid #e2e8f0;
  box-shadow: 0 4px 16px rgba(0,0,0,0.03);
}
</style>

<section class="subpage-main-section com-page-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="com-main-card">

          <!-- Banner Header -->
          <div class="com-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-coins me-1"></i> Faculties &amp; Departments
              </span>
              <h3 class="fw-bold text-white mb-0 fs-3">FACULTY OF COMMERCE</h3>
            </div>
          </div>

          <!-- Body -->
          <div class="p-4">

            <!-- Stat Chips -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-sm-6 col-md-3">
                <div class="com-stat-chip">
                  <div class="com-stat-icon"><i class="fa-solid fa-user-graduate"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">PG Program</div>
                    <div class="fw-bold text-dark fs-6">M.Com.</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="com-stat-chip">
                  <div class="com-stat-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">UG Program</div>
                    <div class="fw-bold text-dark fs-6">B.Com.</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="com-stat-chip">
                  <div class="com-stat-icon"><i class="fa-solid fa-clock"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">M.Com Duration</div>
                    <div class="fw-bold text-dark fs-6">2 Years</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="com-stat-chip">
                  <div class="com-stat-icon"><i class="fa-solid fa-list-check"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">B.Com Branches</div>
                    <div class="fw-bold text-dark fs-6">2 Courses</div>
                  </div>
                </div>
              </div>
            </div>

            <?php if (!empty($faculty_page['content_html'])): ?>
            <?php echo $faculty_page['content_html']; ?>
            <?php endif; ?>

            <?php if (!empty($facultyDocs)): ?>
            <!-- Attached Downloads & Documents -->
            <div class="mt-4 pt-3 border-top">
              <h5 class="fw-bold text-dark mb-3"><i class="fa-solid fa-file-pdf text-danger me-2"></i>Curriculum, Syllabus &amp; Documents</h5>
              <div class="list-group shadow-sm">
                <?php foreach ($facultyDocs as $doc): ?>
                  <a href="<?php echo BASE_URL . htmlspecialchars($doc['file'] ?? '#'); ?>" target="_blank" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-2 px-3">
                    <div class="d-flex align-items-center gap-2">
                      <i class="fa-solid fa-file-pdf text-danger fs-5"></i>
                      <div>
                        <span class="fw-bold text-dark d-block"><?php echo htmlspecialchars($doc['title'] ?? ''); ?></span>
                        <small class="text-muted"><?php echo htmlspecialchars($doc['category'] ?? 'Academic'); ?> &bull; <?php echo htmlspecialchars($doc['date'] ?? ''); ?></small>
                      </div>
                    </div>
                    <span class="badge bg-danger rounded-pill px-3 py-2"><i class="fa fa-download me-1"></i> Download</span>
                  </a>
                <?php endforeach; ?>
              </div>
            </div>
            <?php endif; ?>

          </div><!-- close body p-4 -->
        </div><!-- end com-main-card -->
      </div><!-- end col-lg-8 -->

      <!-- Sticky Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
