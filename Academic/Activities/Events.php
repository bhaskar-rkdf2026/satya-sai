<?php
$page_title = 'Events - SSSUTMS';
$banner_title = 'Events';
$banner_category = 'Academic';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
.event-section { background-color: #f8fafc; }
.event-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15,23,42,0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}
.event-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2rem;
  position: relative;
}
.event-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.event-stat-chip {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 14px 12px;
  display: flex; align-items: center; gap: 10px;
  height: 100%;
  transition: all 0.2s ease;
  overflow: hidden;
}
.event-stat-chip:hover {
  border-color: #cbd5e1;
  box-shadow: 0 4px 14px rgba(0,0,0,0.04);
}
.event-stat-icon {
  width: 44px; height: 44px;
  border-radius: 10px;
  background: rgba(245,158,11,0.1);
  color: #d97706;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.25rem; flex-shrink: 0;
}
.event-grid-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 16px;
  overflow: hidden;
  box-shadow: 0 4px 20px rgba(15,23,42,0.04);
  transition: all 0.25s ease;
  height: 100%;
  display: flex;
  flex-direction: column;
}
.event-grid-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 12px 30px rgba(15,23,42,0.09);
  border-color: #cbd5e1;
}
.event-img-wrapper {
  position: relative;
  width: 100%;
  height: 230px;
  overflow: hidden;
  background: #0b2545;
}
.event-img-wrapper img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.3s ease;
}
.event-grid-card:hover .event-img-wrapper img {
  transform: scale(1.05);
}
.event-date-pill {
  position: absolute;
  top: 12px; left: 12px;
  background: rgba(11, 37, 69, 0.88);
  backdrop-filter: blur(4px);
  color: #ffffff;
  font-size: 0.78rem;
  font-weight: 700;
  padding: 5px 12px;
  border-radius: 20px;
  border: 1px solid rgba(245,158,11,0.4);
}
.event-category-pill {
  position: absolute;
  top: 12px; right: 12px;
  background: rgba(245, 158, 11, 0.95);
  color: #0b2545;
  font-size: 0.78rem;
  font-weight: 800;
  padding: 5px 12px;
  border-radius: 20px;
  box-shadow: 0 2px 6px rgba(0,0,0,0.15);
}
.event-card-body {
  padding: 1.25rem;
  display: flex;
  flex-direction: column;
  flex: 1;
}
.event-card-title {
  font-size: 1.08rem;
  font-weight: 700;
  color: #0b2545;
  margin-bottom: 0.5rem;
  line-height: 1.4;
}
.event-card-desc {
  font-size: 0.88rem;
  color: #64748b;
  margin-bottom: 0;
  line-height: 1.5;
}
</style>

<section class="subpage-main-section event-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="event-main-card">

          <!-- Banner Header -->
          <div class="event-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-calendar-days me-1"></i> Academic Activities
              </span>
              <h3 class="fw-bold text-white mb-0 fs-3">UNIVERSITY EVENTS &amp; CELEBRATIONS</h3>
            </div>
          </div>

          <!-- Body -->
          <div class="p-4">

            <!-- Stat Chips -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-sm-6 col-md-3">
                <div class="event-stat-chip">
                  <div class="event-stat-icon"><i class="fa-solid fa-star"></i></div>
                  <div style="min-width: 0; flex: 1;">
                    <div class="text-muted extra-small uppercase fw-bold">Events</div>
                    <div class="fw-bold text-dark fs-6">National &amp; Academic</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="event-stat-chip">
                  <div class="event-stat-icon"><i class="fa-solid fa-bullhorn"></i></div>
                  <div style="min-width: 0; flex: 1;">
                    <div class="text-muted extra-small uppercase fw-bold">Focus</div>
                    <div class="fw-bold text-dark fs-6">Youth &amp; Leadership</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="event-stat-chip">
                  <div class="event-stat-icon"><i class="fa-solid fa-calendar-check"></i></div>
                  <div style="min-width: 0; flex: 1;">
                    <div class="text-muted extra-small uppercase fw-bold">Timeline</div>
                    <div class="fw-bold text-dark fs-6">2021 &ndash; Present</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="event-stat-chip">
                  <div class="event-stat-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                  <div style="min-width: 0; flex: 1;">
                    <div class="text-muted extra-small uppercase fw-bold">Participants</div>
                    <div class="fw-bold text-dark fs-6">All University Students</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Events Visual Card Grid (NO BUTTONS AT ALL) -->
            <div class="row g-4 align-items-stretch">

              <!-- Event 1: Dr. Vivek Bindra -->
              <div class="col-md-6">
                <div class="event-grid-card">
                  <div class="event-img-wrapper">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/Vivek_Bindra_06052022_0354.jpg" alt="Dr. Vivek Bindra Campus-Preneur Masterclass">
                    <span class="event-date-pill"><i class="fa-regular fa-clock me-1"></i> 07 May 2022</span>
                    <span class="event-category-pill">Masterclass</span>
                  </div>
                  <div class="event-card-body">
                    <h5 class="event-card-title">Dr. Vivek Bindra Presents CAMPUS-PRENEUR Masterclass</h5>
                    <p class="event-card-desc">Exclusive leadership and entrepreneurship masterclass for students of Sri Satya Sai University of Technology &amp; Medical Sciences (1:00 PM – 3:00 PM).</p>
                  </div>
                </div>
              </div>

              <!-- Event 2: 60th National Pharmacy Week -->
              <div class="col-md-6">
                <div class="event-grid-card">
                  <div class="event-img-wrapper">
                    <img src="<?php echo BASE_URL; ?>assets/images/Document/Activities/event_pharmacy_week.jpg" alt="60th National Pharmacy Week">
                    <span class="event-date-pill"><i class="fa-regular fa-clock me-1"></i> 23–27 Nov 2021</span>
                    <span class="event-category-pill">Academic Week</span>
                  </div>
                  <div class="event-card-body">
                    <h5 class="event-card-title">60th National Pharmacy Week Celebrations</h5>
                    <p class="event-card-desc">Organized by Faculty &amp; College of Pharmacy, SSSUTMS featuring student seminars, healthcare awareness drives, and technical competitions.</p>
                  </div>
                </div>
              </div>

              <!-- Event 3: Environmental Youth Forum 2021 -->
              <div class="col-md-6">
                <div class="event-grid-card">
                  <div class="event-img-wrapper">
                    <img src="<?php echo BASE_URL; ?>assets/images/Document/Activities/event_youth_forum.jpg" alt="Environmental Youth Forum">
                    <span class="event-date-pill"><i class="fa-regular fa-clock me-1"></i> 12 Jan 2021</span>
                    <span class="event-category-pill">Youth Forum</span>
                  </div>
                  <div class="event-card-body">
                    <h5 class="event-card-title">Environmental Youth Forum 2021</h5>
                    <p class="event-card-desc">National forum focused on environmental protection, green energy initiatives, and sustainable development goals led by youth leaders.</p>
                  </div>
                </div>
              </div>

              <!-- Event 4: National Environment Youth Parliament 2022 -->
              <div class="col-md-6">
                <div class="event-grid-card">
                  <div class="event-img-wrapper">
                    <img src="<?php echo BASE_URL; ?>assets/images/Document/Activities/event_environment_parliament.jpg" alt="National Environment Youth Parliament">
                    <span class="event-date-pill"><i class="fa-regular fa-clock me-1"></i> 12 Jan 2022</span>
                    <span class="event-category-pill">Parliament</span>
                  </div>
                  <div class="event-card-body">
                    <h5 class="event-card-title">National Environment Youth Parliament 2022</h5>
                    <p class="event-card-desc">Theme: Nurturing Environment. Inter-university parliamentary debates and resolutions for climate conservation and ecological preservation.</p>
                  </div>
                </div>
              </div>

              <!-- Event 5: मद्य निषेध संकल्प दिवस -->
              <div class="col-md-6">
                <div class="event-grid-card">
                  <div class="event-img-wrapper">
                    <img src="<?php echo BASE_URL; ?>assets/images/Document/Activities/event_social_pledge.jpg" alt="मद्य निषेध संकल्प दिवस">
                    <span class="event-date-pill"><i class="fa-regular fa-clock me-1"></i> 30 Jan 2022</span>
                    <span class="event-category-pill">Social Pledge</span>
                  </div>
                  <div class="event-card-body">
                    <h5 class="event-card-title">मद्य निषेध संकल्प दिवस (Pledge Against Alcohol &amp; Addiction)</h5>
                    <p class="event-card-desc">University-wide social awareness and de-addiction pledge assembly inspiring healthy lifestyle choices among students and faculty members.</p>
                  </div>
                </div>
              </div>

              <!-- Event 6: Amrit Mahotsav Independence Day -->
              <div class="col-md-6">
                <div class="event-grid-card">
                  <div class="event-img-wrapper">
                    <img src="<?php echo BASE_URL; ?>assets/images/Document/Activities/event_amrit_mahotsav.jpg" alt="Amrit Mahotsav 75th Independence Day">
                    <span class="event-date-pill"><i class="fa-regular fa-clock me-1"></i> 13 Aug 2021</span>
                    <span class="event-category-pill">National Day</span>
                  </div>
                  <div class="event-card-body">
                    <h5 class="event-card-title">Amrit Mahotsav on 75th Independence Day</h5>
                    <p class="event-card-desc">Patriotic celebrations featuring poster presentation, essay writing competitions, and cultural performances by SSSUTMS students.</p>
                  </div>
                </div>
              </div>

              <!-- Event 7: International Yoga Day -->
              <div class="col-md-6">
                <div class="event-grid-card">
                  <div class="event-img-wrapper">
                    <img src="<?php echo BASE_URL; ?>assets/images/Document/Activities/event_yoga_day.jpg" alt="International Yoga Day">
                    <span class="event-date-pill"><i class="fa-regular fa-clock me-1"></i> 21 June 2021</span>
                    <span class="event-category-pill">Health &amp; Wellness</span>
                  </div>
                  <div class="event-card-body">
                    <h5 class="event-card-title">International Yoga Day Special Assembly</h5>
                    <p class="event-card-desc">Virtual meditation, prānāyāma, and yogic wellness session conducted for physical and mental wellbeing during the academic session.</p>
                  </div>
                </div>
              </div>

              <!-- Event 8: EDP Program by NIESBUD -->
              <div class="col-md-6">
                <div class="event-grid-card">
                  <div class="event-img-wrapper">
                    <img src="<?php echo BASE_URL; ?>assets/images/Document/Activities/event_edp_niesbud.jpg" alt="EDP Program by NIESBUD">
                    <span class="event-date-pill"><i class="fa-regular fa-clock me-1"></i> 03 Feb 2021</span>
                    <span class="event-category-pill">Entrepreneurship</span>
                  </div>
                  <div class="event-card-body">
                    <h5 class="event-card-title">EDP Program by NIESBUD</h5>
                    <p class="event-card-desc">Entrepreneurship Development Program in collaboration with the National Institute for Entrepreneurship and Small Business Development.</p>
                  </div>
                </div>
              </div>

            </div><!-- end row -->

          </div>
        </div><!-- end event-main-card -->
      </div><!-- end col-lg-8 -->

      <!-- Sticky Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>