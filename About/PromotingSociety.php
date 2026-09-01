<?php
$page_title = 'Promoting Society - SSSUTMS';
$banner_title = 'Promoting Society';
$banner_category = 'About';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?>

<style>
.ps-page-section {
  background-color: #f8fafc;
}
.ps-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
  overflow: hidden;
}
.ps-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2rem;
  position: relative;
}
.ps-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #d97706, #f59e0b);
}
.ps-content-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 1.5rem;
  margin-bottom: 1.5rem;
  box-shadow: 0 4px 16px rgba(0,0,0,0.02);
}
.ps-stat-chip {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 10px;
  padding: 12px 16px;
  display: flex;
  align-items: center;
  gap: 12px;
  height: 100%;
}
.ps-stat-icon {
  width: 38px;
  height: 38px;
  border-radius: 10px;
  background: rgba(217, 119, 6, 0.1);
  color: #d97706;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.1rem;
  flex-shrink: 0;
}
.ps-pdf-box {
  background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%);
  border: 1px solid #fde68a;
  border-radius: 16px;
  padding: 1.75rem;
  box-shadow: 0 4px 16px rgba(0,0,0,0.02);
}
.ps-pdf-btn {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  padding: 10px 22px;
  background: #dc2626;
  color: #ffffff;
  font-weight: 700;
  font-size: 0.95rem;
  border-radius: 10px;
  text-decoration: none;
  transition: all 0.2s ease;
  box-shadow: 0 4px 14px rgba(220, 38, 38, 0.25);
}
.ps-pdf-btn:hover {
  background: #b91c1c;
  color: #ffffff;
  transform: translateY(-2px);
  box-shadow: 0 6px 18px rgba(220, 38, 38, 0.35);
}
</style>

<section class="subpage-main-section ps-page-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        
        <!-- Main Card Wrapper -->
        <div class="ps-main-card mb-4">
          
          <!-- Banner Header -->
          <div class="ps-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge bg-warning text-dark fw-bold uppercase mb-2 px-3 py-2 rounded-pill">
                <i class="fa-solid fa-building-flag me-1"></i> Sponsoring Body
              </span>
              <h3 class="fw-bold text-white mb-0 fs-3">PROMOTING SOCIETY</h3>
            </div>
            <div>
              <a href="<?php echo BASE_URL; ?>assets/pdf/sponsoring_detail.pdf" target="_blank" rel="noopener" class="ps-pdf-btn">
                <i class="fa-solid fa-file-pdf fs-4"></i>
                <span>Sponsoring Details (PDF)</span>
              </a>
            </div>
          </div>

          <!-- Body Container -->
          <div class="p-4">
            
            <!-- Highlights Chips Grid -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-md-4">
                <div class="ps-stat-chip">
                  <div class="ps-stat-icon"><i class="fa-solid fa-calendar-check"></i></div>
                  <div>
                    <div class="fw-bold text-dark small">Established</div>
                    <div class="text-secondary small">Year 1999</div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="ps-stat-chip">
                  <div class="ps-stat-icon"><i class="fa-solid fa-landmark"></i></div>
                  <div>
                    <div class="fw-bold text-dark small">Promoting Body</div>
                    <div class="text-secondary small">Ayushmati Education &amp; Social Society</div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="ps-stat-chip">
                  <div class="ps-stat-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                  <div>
                    <div class="fw-bold text-dark small">University Founded</div>
                    <div class="text-secondary small">Academic Session 2013-14</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Main Narrative Card -->
            <div class="ps-content-card">
              <div class="d-flex align-items-start gap-3 mb-3">
                <div class="ps-stat-icon mt-1">
                  <i class="fa-solid fa-quote-left"></i>
                </div>
                <div>
                  <h5 class="fw-bold text-dark mb-2">Ayushmati Education and Social Society, Bhopal</h5>
                  <p class="text-secondary lh-base text-justify mb-3" style="font-size: 0.95rem;">
                    Ayushmati Education and Social Society, Bhopal was established in 1999 with objective to imparts Medical, Technical &amp; Higher Education in state of Madhya Pradesh. Society was established by visionaries of repute from versatile background including those from Medical, Finance, Professional &amp; social service. The decision of starting Technical Campus in interior was a debatable topic in those days. After gaining experience more than a decade of operating more than hundred Technical and Medical Institutes in the state of Madhya Pradesh, the Society established Private University at Sri Satya Campus at Sehore in year 2013.
                  </p>
                  <p class="text-secondary lh-base text-justify mb-0" style="font-size: 0.95rem;">
                    With blessings of Sri Satya Sai, Government of Madhya Pradesh on recommendations of Madhya Pradesh Niji Vishwavidyalaya Niyamak Aayog accorded permission to Sri Satya Sai University of Technology &amp; Medical Sciences at Sehore from Academic Session 2013-14.
                  </p>
                </div>
              </div>
            </div>

            <!-- PDF Callout Box -->
            <div class="ps-pdf-box d-flex align-items-center justify-content-between flex-wrap gap-3">
              <div class="d-flex align-items-center gap-3">
                <div class="text-warning fs-1">
                  <i class="fa-solid fa-file-pdf"></i>
                </div>
                <div>
                  <h5 class="fw-bold text-dark mb-1">Official Sponsoring Details</h5>
                  <p class="mb-0 text-secondary small">
                    Click below to view or download the complete official Sponsoring Details PDF for Sri Satya Sai University of Technology &amp; Medical Sciences.
                  </p>
                </div>
              </div>
              <div>
                <a href="<?php echo BASE_URL; ?>assets/pdf/sponsoring_detail.pdf" target="_blank" rel="noopener" class="ps-pdf-btn">
                  <i class="fa-solid fa-arrow-up-right-from-square me-1"></i> Click Here (PDF)
                </a>
              </div>
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