<?php
$page_title = 'University Events - SSSUTMS';
$banner_title = 'University Events';
$banner_category = 'Download';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?>

<style>
  .events-main-card {
    background: #ffffff;
    border-radius: 16px;
    border: 1px solid #e2e8f0;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(11, 37, 69, 0.06);
    transition: all 0.3s ease;
  }
  .events-card-header {
    background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
    padding: 20px 28px;
    position: relative;
  }
  .events-gold-line {
    height: 3px;
    background: linear-gradient(90deg, #f3752c 0%, #f6a935 50%, #f3752c 100%);
    width: 100%;
  }
  .event-item-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 14px;
    overflow: hidden;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    margin-bottom: 24px;
  }
  .event-item-card:hover {
    border-color: #cbd5e1;
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(11, 37, 69, 0.08);
  }
  .event-date-badge {
    background: linear-gradient(135deg, #f3752c 0%, #e0580a 100%);
    color: #ffffff;
    font-size: 0.78rem;
    font-weight: 600;
    padding: 4px 12px;
    border-radius: 50px;
    display: inline-flex;
    align-items: center;
    gap: 5px;
    margin-bottom: 8px;
  }
  .event-title {
    color: #0b2545;
    font-family: 'Montserrat', sans-serif;
    font-weight: 700;
    font-size: 1.15rem;
    line-height: 1.4;
    margin-bottom: 8px;
  }
  .event-media-container {
    background: #f8fafc;
    height: 200px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    border-radius: 12px;
    border: 1px solid #e2e8f0;
  }
  .event-media-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
  }
  .event-item-card:hover .event-media-container img {
    transform: scale(1.04);
  }
  .event-icon-avatar {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    background: #f0f7ff;
    border: 2px solid #dbeafe;
    color: #0b2545;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2.2rem;
  }
  .video-responsive-wrapper {
    position: relative;
    padding-bottom: 56.25%;
    height: 0;
    overflow: hidden;
    border-radius: 12px;
    background: #000;
    width: 100%;
  }
  .video-responsive-wrapper iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: 0;
  }
  .btn-event-action {
    background: #ffffff;
    color: #0b2545 !important;
    border: 1px solid #cbd5e1;
    font-weight: 600;
    font-size: 0.84rem;
    padding: 6px 14px;
    border-radius: 50px;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: all 0.2s ease;
    text-decoration: none !important;
  }
  .btn-event-action:hover {
    background: linear-gradient(135deg, #f3752c 0%, #e0580a 100%);
    color: #ffffff !important;
    border-color: #f3752c;
    box-shadow: 0 4px 10px rgba(243, 117, 44, 0.3);
    transform: translateY(-1px);
  }
  .btn-event-action:hover i {
    color: #ffffff !important;
  }
  .btn-event-primary {
    background: linear-gradient(135deg, #f3752c 0%, #e0580a 100%);
    color: #ffffff !important;
    font-weight: 600;
    font-size: 0.84rem;
    padding: 7px 18px;
    border-radius: 50px;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    border: none;
    box-shadow: 0 4px 12px rgba(243, 117, 44, 0.25);
    transition: all 0.2s ease;
    text-decoration: none !important;
  }
  .btn-event-primary:hover {
    background: linear-gradient(135deg, #e0580a 0%, #c94c07 100%);
    box-shadow: 0 6px 16px rgba(243, 117, 44, 0.4);
    transform: translateY(-2px);
  }
</style>

<section class="subpage-main-section py-4 bg-light">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="events-main-card mb-4">
          
          <!-- Card Header styled with Homepage Gradient -->
          <div class="events-card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
            <h2 class="h5 fw-bold text-white mb-0 d-flex align-items-center gap-2">
              <i class="bi bi-journal-text me-2" style="color: #f6a935;"></i> EVENTS
            </h2>
            <span class="badge rounded-pill px-3 py-2 small" style="background: rgba(255, 255, 255, 0.15); color: #ffffff; font-weight: 500;">
              <i class="fa fa-calendar-check text-success me-1"></i> Official Events Archive
            </span>
          </div>
          <div class="events-gold-line"></div>

          <!-- Card Body -->
          <div class="card-body p-4 p-md-5">

            <!-- 1. Dr. Vivek Bindra Masterclass -->
            <div class="event-item-card p-4">
              <div class="row g-4 align-items-center">
                <div class="col-md-4">
                  <div class="event-media-container">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/Vivek_Bindra_06052022_0354.jpg" alt="Dr. Vivek Bindra Masterclass">
                  </div>
                </div>
                <div class="col-md-8">
                  <span class="event-date-badge">
                    <i class="fa fa-calendar-days"></i> 7th May • 1:00 PM – 3:00 PM
                  </span>
                  <h4 class="event-title">Dr. Vivek Bindra PRESENTS CAMPUS-PRENEUR Masterclass</h4>
                  <p class="text-secondary small mb-3">
                    Exclusively organized for students of <strong>Sri Satya Sai University of Technology and Medical Sciences</strong>.
                  </p>
                  <a href="https://youtu.be/rxOK274A2SE" target="_blank" rel="noopener" class="btn-event-primary">
                    <i class="fa fa-circle-play"></i> Watch Video Session
                  </a>
                </div>
              </div>
            </div>

            <!-- 2. मद्य निषेध संकल्प दिवस -->
            <div class="event-item-card p-4">
              <div class="row g-4 align-items-center">
                <div class="col-md-4">
                  <div class="event-media-container">
                    <img src="<?php echo BASE_URL; ?>assets/images/events/madya_nishedh.png" alt="मद्य निषेध संकल्प दिवस">
                  </div>
                </div>
                <div class="col-md-8">
                  <span class="event-date-badge">
                    <i class="fa fa-calendar-days"></i> 30-Jan-2022
                  </span>
                  <h4 class="event-title">मद्य निषेध संकल्प दिवस</h4>
                  <p class="text-secondary small mb-3">
                    University pledge campaign and awareness program on substance abuse prevention and healthy living.
                  </p>
                  <a href="https://youtu.be/rxOK274A2SE" target="_blank" rel="noopener" class="btn-event-primary">
                    <i class="fa fa-circle-play"></i> Watch Video Link
                  </a>
                </div>
              </div>
            </div>

            <!-- 3. National Environment Youth Parliament 2022 -->
            <div class="event-item-card p-4">
              <div class="row g-4 align-items-center">
                <div class="col-md-4">
                  <div class="event-media-container">
                    <img src="<?php echo BASE_URL; ?>assets/images/events/youth_parliament_2022.jpg" alt="National Environment Youth Parliament 2022">
                  </div>
                </div>
                <div class="col-md-8">
                  <span class="event-date-badge">
                    <i class="fa fa-calendar-days"></i> 12-Jan-2022
                  </span>
                  <h4 class="event-title">National Environment Youth Parliament 2022</h4>
                  <p class="text-secondary small mb-3">
                    <strong>Nurturing Environment</strong> — National inter-collegiate youth forum focusing on ecological sustainability and environmental leadership.
                  </p>
                  <div class="d-flex flex-wrap gap-2">
                    <span class="badge bg-primary-subtle text-primary border px-3 py-2 rounded-pill">
                      <i class="fa fa-circle-info me-1"></i> Youth Parliament
                    </span>
                    <span class="badge bg-success-subtle text-success border px-3 py-2 rounded-pill">
                      <i class="fa fa-check me-1"></i> Annual Convention
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <!-- 4. 60th NATIONAL PHARMACY WEEK, 2021 (Icon applied as no image exists on live site) -->
            <div class="event-item-card p-4">
              <div class="row g-4 align-items-center">
                <div class="col-md-4">
                  <div class="event-media-container">
                    <div class="event-icon-avatar">
                      <i class="fa fa-prescription-bottle-medical text-primary"></i>
                    </div>
                  </div>
                </div>
                <div class="col-md-8">
                  <span class="event-date-badge">
                    <i class="fa fa-calendar-days"></i> 23-27 Nov. 2021
                  </span>
                  <h4 class="event-title">60th NATIONAL PHARMACY WEEK, 2021</h4>
                  <p class="text-secondary small mb-3">
                    Celebrated with scientific symposiums, pharmacist patient counseling workshops, and community health outreach.
                  </p>
                  <a href="http://web.sssutms.co.in//Document/Activities/WhatsApp%20Image%202021-11-20%20at%205.44.10%20PM.jpeg" target="_blank" rel="noopener" class="btn-event-action">
                    <i class="fa fa-image text-danger"></i> More Info
                  </a>
                </div>
              </div>
            </div>

            <!-- 5. AMRIT MAHOTSAV ON THE OCCASION OF 75TH INDEPENDENCE DAY -->
            <div class="event-item-card p-4">
              <div class="row g-4 align-items-center">
                <div class="col-md-4">
                  <div class="event-media-container">
                    <img src="<?php echo BASE_URL; ?>assets/images/events/amrit_mahotsav_aug2021.jpg" alt="Amrit Mahotsav 75th Independence Day">
                  </div>
                </div>
                <div class="col-md-8">
                  <span class="event-date-badge">
                    <i class="fa fa-calendar-days"></i> 13 August 2021 • 12:00 to 12:30 PM
                  </span>
                  <h4 class="event-title">AMRIT MAHOTSAV ON THE OCCASION OF 75TH INDEPENDENCE DAY</h4>
                  <p class="text-secondary small mb-3">
                    COMPETITION ON POSTER PRESENTATION &amp; ESSAY WRITING on national development and Indian independence heritage.
                  </p>
                  <span class="badge bg-light text-dark border px-3 py-2 rounded-pill">
                    <i class="fa fa-award text-warning me-1"></i> Student Competition
                  </span>
                </div>
              </div>
            </div>

            <!-- 6. International Yoga Day -->
            <div class="event-item-card p-4">
              <div class="row g-4 align-items-center">
                <div class="col-md-5">
                  <div class="video-responsive-wrapper">
                    <iframe src="https://www.youtube.com/embed/DW6ApxPdCHM" title="International Yoga Day SSSUTMS" allowfullscreen></iframe>
                  </div>
                </div>
                <div class="col-md-7">
                  <span class="event-date-badge">
                    <i class="fa fa-calendar-days"></i> Monday, June 21 • 7:00 – 8:00 AM
                  </span>
                  <h4 class="event-title">International Yoga Day</h4>
                  <p class="text-secondary small mb-3">
                    Mass yoga demonstration, pranayama and meditation session conducted by faculty and students of the School of Ayurveda &amp; Homoeopathy.
                  </p>
                  <a href="https://www.youtube.com/watch?v=DW6ApxPdCHM" target="_blank" rel="noopener" class="btn-event-primary">
                    <i class="fa fa-circle-play"></i> Watch Full Session
                  </a>
                </div>
              </div>
            </div>

            <!-- 7. स्वतंत्रता की 75वीं वर्षगांठ के अवसर पर - आजादी का अमृत महोत्सव -->
            <div class="event-item-card p-4">
              <div class="row g-4 align-items-center">
                <div class="col-md-5">
                  <div class="video-responsive-wrapper">
                    <iframe src="https://www.youtube.com/embed/dGPJD6T_0Z8" title="आजादी का अमृत महोत्सव" allowfullscreen></iframe>
                  </div>
                </div>
                <div class="col-md-7">
                  <span class="event-date-badge">
                    <i class="fa fa-calendar-days"></i> 05 अप्रैल 2021
                  </span>
                  <h4 class="event-title">स्वतंत्रता की 75वीं वर्षगांठ — ‘‘आजादी का अमृत महोत्सव’’</h4>
                  <p class="text-secondary small mb-3">
                    University commemorative cultural program and lectures on the freedom struggle and nation building.
                  </p>
                  <div class="d-flex flex-wrap gap-2">
                    <a href="https://youtu.be/dGPJD6T_0Z8" target="_blank" rel="noopener" class="btn-event-action">
                      <i class="fa fa-video text-danger"></i> Video Vol 1
                    </a>
                    <a href="http://sssutms-soh.in/Video/Vol%202.mp4" target="_blank" rel="noopener" class="btn-event-action">
                      <i class="fa fa-file-video text-primary"></i> Video Vol 2
                    </a>
                    <a href="https://youtu.be/pQ9ssvssm3w" target="_blank" rel="noopener" class="btn-event-action">
                      <i class="fa fa-video text-danger"></i> Video Vol 3
                    </a>
                  </div>
                </div>
              </div>
            </div>

            <!-- 8. EDP Program by NIESBUD -->
            <div class="event-item-card p-4">
              <div class="row g-4 align-items-center">
                <div class="col-md-4">
                  <div class="event-media-container">
                    <img src="<?php echo BASE_URL; ?>assets/images/events/edp_niesbud.jpg" alt="EDP Program by NIESBUD">
                  </div>
                </div>
                <div class="col-md-8">
                  <span class="event-date-badge">
                    <i class="fa fa-calendar-days"></i> 3 February 2021
                  </span>
                  <h4 class="event-title">EDP Program by NIESBUD</h4>
                  <p class="text-secondary small mb-3">
                    <strong>National Institute For Entrepreneurship And Small Business Development</strong> — Entrepreneurship development programme for university scholars and aspiring innovators.
                  </p>
                  <span class="badge bg-primary-subtle text-primary border px-3 py-2 rounded-pill">
                    <i class="fa fa-briefcase me-1"></i> Entrepreneurship Development
                  </span>
                </div>
              </div>
            </div>

            <!-- 9. Environmental Youth Forum 2021 -->
            <div class="event-item-card p-4 mb-0">
              <div class="row g-4 align-items-center">
                <div class="col-md-4">
                  <div class="event-media-container">
                    <img src="<?php echo BASE_URL; ?>assets/images/events/environmental_youth_forum_2021.jpg" alt="Environmental Youth Forum 2021">
                  </div>
                </div>
                <div class="col-md-8">
                  <span class="event-date-badge">
                    <i class="fa fa-calendar-days"></i> 12 Jan 2021
                  </span>
                  <h4 class="event-title">Environmental Youth Forum 2021</h4>
                  <p class="text-secondary small mb-3">
                    Annual youth forum on sustainable development, ecological conservation, and youth leadership.
                  </p>
                  <div class="d-flex flex-wrap gap-2">
                    <a href="http://web.sssutms.co.in//Document/Activities/Environmental_Youth_Forum_2021.jpg" target="_blank" rel="noopener" class="btn-event-action">
                      <i class="fa fa-image text-danger"></i> More Info
                    </a>
                    <a href="http://web.sssutms.co.in//Document/Activities/Environmental_Youth_Forum_2021_Report.pdf" target="_blank" rel="noopener" class="btn-event-action">
                      <i class="fa fa-file-pdf text-danger"></i> View Report
                    </a>
                  </div>
                </div>
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