<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/itep_helper.php';

$page_info = get_itep_page_info();
$events = get_itep_events(true);

$page_title = 'ITEP Events & Teacher Workshops - SSSUTMS';
$banner_title = 'ITEP Events & Workshops';
$banner_category = 'I T E P';

require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?>

<style>
.syl-card {
  background: #ffffff;
  border-radius: 16px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
  border: 1px solid #e2e8f0;
  overflow: hidden;
  margin-bottom: 2rem;
}
.syl-card-header {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 1.25rem 1.75rem;
  position: relative;
}
.syl-card-header::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.syl-card-title {
  font-size: 1.3rem;
  font-weight: 700;
  margin: 0;
  display: flex;
  align-items: center;
  gap: 12px;
  color: #ffffff;
}
.syl-card-body {
  padding: 1.75rem;
}
.event-drive-card {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 1.5rem;
  margin-bottom: 1.25rem;
  border-left: 4px solid #0b2545;
  transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.event-drive-card:hover {
  transform: translateY(-3px);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
}
</style>

<section class="subpage-main-section py-4 bg-light">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="syl-card">
          <div class="syl-card-header">
            <h2 class="syl-card-title">
              <i class="fa fa-calendar-check text-warning"></i>
              Teacher Education Workshops &amp; Events
            </h2>
          </div>
          
          <div class="syl-card-body">
            
            <div class="alert alert-primary bg-light border-primary border-start border-4 rounded-3 p-3 mb-4">
              <div class="d-flex align-items-start gap-3">
                <i class="fa fa-info-circle text-primary fa-2x mt-1"></i>
                <div>
                  <h6 class="fw-bold text-dark mb-1">Pedagogical Sessions &amp; Training Schedules</h6>
                  <p class="text-secondary small mb-0">
                    Find schedule dates, seminar topics, and venue details for faculty development workshops and ITEP student teacher activities.
                  </p>
                </div>
              </div>
            </div>

            <?php if (empty($events)): ?>
              <div class="text-center py-5 text-muted">
                <i class="fa fa-calendar-xmark fa-3x mb-3 text-secondary opacity-50"></i>
                <h6>No Workshops or Events Currently Scheduled</h6>
                <p class="small">Stay tuned to this page for updates on upcoming ITEP teacher training sessions.</p>
              </div>
            <?php else: ?>
              <div class="events-list">
                <?php foreach ($events as $ev): ?>
                  <div class="event-drive-card">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-2">
                      <h5 class="fw-bold text-dark mb-0"><?php echo htmlspecialchars($ev['title']); ?></h5>
                      <span class="badge bg-primary text-white px-3 py-2">
                        <i class="fa fa-calendar-day me-1"></i> <?php echo htmlspecialchars($ev['date']); ?>
                      </span>
                    </div>
                    <?php if (!empty($ev['venue'])): ?>
                      <div class="text-secondary small mb-2">
                        <i class="fa fa-location-dot me-1 text-danger"></i> <strong>Venue:</strong> <?php echo htmlspecialchars($ev['venue']); ?>
                      </div>
                    <?php endif; ?>
                    <?php if (!empty($ev['description'])): ?>
                      <p class="text-muted small mb-0">
                        <?php echo nl2br(htmlspecialchars($ev['description'])); ?>
                      </p>
                    <?php endif; ?>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>

            <div class="mt-4 pt-3 border-top d-flex justify-content-between align-items-center">
              <a href="<?php echo base_url('ITEP/index.php'); ?>" class="btn btn-outline-secondary btn-sm rounded-pill px-3">
                <i class="fa fa-arrow-left me-1"></i> Back to ITEP Home
              </a>
            </div>

          </div>
        </div>
      </div>

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>