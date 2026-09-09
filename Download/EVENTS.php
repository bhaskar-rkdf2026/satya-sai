<?php
$page_title = 'Events & Celebrations - SSSUTMS';
$banner_title = 'University Events & Celebrations';
$banner_category = 'Download';

require_once __DIR__ . '/../config.php';
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
.syl-btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  background: #0b2545;
  color: #ffffff !important;
  font-weight: 700;
  font-size: 0.85rem;
  padding: 8px 18px;
  border-radius: 8px;
  text-decoration: none !important;
  transition: all 0.25s ease;
  box-shadow: 0 2px 6px rgba(11, 37, 69, 0.2);
  border: 1px solid #0b2545;
  white-space: nowrap;
}
.syl-btn:hover {
  background: #d97706;
  border-color: #d97706;
  color: #ffffff !important;
  transform: translateY(-2px);
  box-shadow: 0 6px 14px rgba(217, 119, 6, 0.35);
}
.event-item-card {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  overflow: hidden;
  height: 100%;
  display: flex;
  flex-direction: column;
  transition: transform 0.25s ease, box-shadow 0.25s ease;
}
.event-item-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
}
.event-media-wrapper {
  position: relative;
  background: #000;
  overflow: hidden;
}
.event-media-wrapper img {
  width: 100%;
  height: 220px;
  object-fit: cover;
}
.event-media-wrapper iframe {
  width: 100%;
  height: 220px;
  border: 0;
}
.event-date-badge {
  position: absolute;
  top: 12px;
  right: 12px;
  background: #0b2545;
  color: #ffffff;
  padding: 4px 10px;
  border-radius: 6px;
  font-size: 0.75rem;
  font-weight: 700;
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
              <i class="fa fa-calendar-star text-warning"></i>
              University Events, Webinars &amp; Highlights
            </h2>
          </div>
          
          <div class="syl-card-body">
            
            <!-- Live Search Filter -->
            <div class="row g-3 align-items-center mb-4 p-3 bg-white rounded-3 border shadow-sm">
              <div class="col-md-7">
                <div class="input-group">
                  <span class="input-group-text bg-light border-end-0"><i class="fa fa-search text-muted"></i></span>
                  <input type="text" id="tableSearchInput" class="form-control border-start-0" placeholder="Search events by title, speaker, keyword..." onkeyup="filterEvents()">
                  <button class="btn btn-outline-secondary" type="button" onclick="clearSearch()" title="Clear search"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="col-md-5 text-md-end text-muted small">
                <span id="resultsCount">Showing all events</span>
              </div>
            </div>

            <div class="row g-4" id="eventsContainer">
              
              <!-- 1. Dr. Vivek Bindra Motivation Session -->
              <div class="col-md-6 event-card-col">
                <div class="event-item-card">
                  <div class="event-media-wrapper">
                    <span class="event-date-badge"><i class="fa fa-calendar-alt me-1"></i> Special Event</span>
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/Vivek_Bindra_06052022_0354.jpg" alt="Dr. Vivek Bindra Session">
                  </div>
                  <div class="p-3 d-flex flex-column justify-content-between flex-grow-1">
                    <div>
                      <h5 class="fw-bold text-dark mb-2">Motivational &amp; Leadership Keynote: Dr. Vivek Bindra</h5>
                      <p class="text-secondary small mb-3">Special national leadership and student empowerment keynote session at SSSUTMS campus.</p>
                    </div>
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Vivek_Bindra_06052022_0354.jpg" target="_blank" rel="noopener" class="syl-btn align-self-start">
                      <i class="fa fa-image"></i> View Event Poster
                    </a>
                  </div>
                </div>
              </div>

              <!-- 2. Nasha Mukti Abhiyan -->
              <div class="col-md-6 event-card-col">
                <div class="event-item-card">
                  <div class="event-media-wrapper">
                    <span class="event-date-badge"><i class="fa fa-calendar-alt me-1"></i> Awareness Campaign</span>
                    <img src="<?php echo BASE_URL; ?>assets/images/events/madya_nishedh.png" alt="Nasha Mukti Abhiyan">
                  </div>
                  <div class="p-3 d-flex flex-column justify-content-between flex-grow-1">
                    <div>
                      <h5 class="fw-bold text-dark mb-2">Nasha Mukti &amp; Madya Nishedh Awareness Campaign</h5>
                      <p class="text-secondary small mb-3">Community health and social welfare outreach campaign organized by SSSUTMS volunteers.</p>
                    </div>
                    <a href="<?php echo BASE_URL; ?>assets/images/events/madya_nishedh.png" target="_blank" rel="noopener" class="syl-btn align-self-start">
                      <i class="fa fa-image"></i> View Poster
                    </a>
                  </div>
                </div>
              </div>

              <!-- 3. Youth Parliament Festival -->
              <div class="col-md-6 event-card-col">
                <div class="event-item-card">
                  <div class="event-media-wrapper">
                    <span class="event-date-badge"><i class="fa fa-calendar-alt me-1"></i> National Event</span>
                    <img src="<?php echo BASE_URL; ?>assets/images/events/youth_parliament_2022.jpg" alt="National Youth Parliament Festival">
                  </div>
                  <div class="p-3 d-flex flex-column justify-content-between flex-grow-1">
                    <div>
                      <h5 class="fw-bold text-dark mb-2">National Youth Parliament Festival 2022</h5>
                      <p class="text-secondary small mb-3">Democratic debate and parliamentary presentation by university delegates and youth parliamentarians.</p>
                    </div>
                    <a href="<?php echo BASE_URL; ?>assets/images/events/youth_parliament_2022.jpg" target="_blank" rel="noopener" class="syl-btn align-self-start">
                      <i class="fa fa-image"></i> View Event Details
                    </a>
                  </div>
                </div>
              </div>

              <!-- 4. Azadi Ka Amrit Mahotsav -->
              <div class="col-md-6 event-card-col">
                <div class="event-item-card">
                  <div class="event-media-wrapper">
                    <span class="event-date-badge"><i class="fa fa-calendar-alt me-1"></i> Celebration</span>
                    <img src="<?php echo BASE_URL; ?>assets/images/events/amrit_mahotsav_aug2021.jpg" alt="Azadi Ka Amrit Mahotsav">
                  </div>
                  <div class="p-3 d-flex flex-column justify-content-between flex-grow-1">
                    <div>
                      <h5 class="fw-bold text-dark mb-2">Azadi Ka Amrit Mahotsav Celebrations</h5>
                      <p class="text-secondary small mb-3">75 Years of Indian Independence commemorative cultural programmes, parades, and historical exhibitions.</p>
                    </div>
                    <a href="<?php echo BASE_URL; ?>assets/images/events/amrit_mahotsav_aug2021.jpg" target="_blank" rel="noopener" class="syl-btn align-self-start">
                      <i class="fa fa-image"></i> View Event Details
                    </a>
                  </div>
                </div>
              </div>

              <!-- 5. Entrepreneurship Development Programme (NIESBUD) -->
              <div class="col-md-6 event-card-col">
                <div class="event-item-card">
                  <div class="event-media-wrapper">
                    <span class="event-date-badge"><i class="fa fa-calendar-alt me-1"></i> Skill Programme</span>
                    <img src="<?php echo BASE_URL; ?>assets/images/events/edp_niesbud.jpg" alt="EDP NIESBUD Programme">
                  </div>
                  <div class="p-3 d-flex flex-column justify-content-between flex-grow-1">
                    <div>
                      <h5 class="fw-bold text-dark mb-2">Entrepreneurship Development Programme (NIESBUD)</h5>
                      <p class="text-secondary small mb-3">Skill development, startup creation, and MSME incubation workshop in collaboration with NIESBUD.</p>
                    </div>
                    <a href="<?php echo BASE_URL; ?>assets/images/events/edp_niesbud.jpg" target="_blank" rel="noopener" class="syl-btn align-self-start">
                      <i class="fa fa-image"></i> View Details
                    </a>
                  </div>
                </div>
              </div>

              <!-- 6. Environmental Youth Forum -->
              <div class="col-md-6 event-card-col">
                <div class="event-item-card">
                  <div class="event-media-wrapper">
                    <span class="event-date-badge"><i class="fa fa-calendar-alt me-1"></i> Environmental Forum</span>
                    <img src="<?php echo BASE_URL; ?>assets/images/events/environmental_youth_forum_2021.jpg" alt="Environmental Youth Forum 2021">
                  </div>
                  <div class="p-3 d-flex flex-column justify-content-between flex-grow-1">
                    <div>
                      <h5 class="fw-bold text-dark mb-2">Environmental Youth Forum 2021</h5>
                      <p class="text-secondary small mb-3">Ecological sustainability, renewable energy awareness, and student environmental protection initiative.</p>
                    </div>
                    <a href="<?php echo BASE_URL; ?>assets/images/events/environmental_youth_forum_2021.jpg" target="_blank" rel="noopener" class="syl-btn align-self-start">
                      <i class="fa fa-image"></i> View Details
                    </a>
                  </div>
                </div>
              </div>

              <!-- 7. Video Highlight: Expert Session (YouTube) -->
              <div class="col-md-6 event-card-col">
                <div class="event-item-card">
                  <div class="event-media-wrapper">
                    <iframe src="https://www.youtube.com/embed/DW6ApxPdCHM" title="SSSUTMS Event Video 1" allowfullscreen loading="lazy"></iframe>
                  </div>
                  <div class="p-3 d-flex flex-column justify-content-between flex-grow-1">
                    <div>
                      <h5 class="fw-bold text-dark mb-2">University Convocation &amp; Keynote Video</h5>
                      <p class="text-secondary small mb-3">Watch the live video coverage of university convocations and keynote sessions.</p>
                    </div>
                    <a href="https://www.youtube.com/watch?v=DW6ApxPdCHM" target="_blank" rel="noopener" class="syl-btn align-self-start">
                      <i class="fa-brands fa-youtube"></i> Watch on YouTube
                    </a>
                  </div>
                </div>
              </div>

              <!-- 8. Video Highlight: Technical Workshop (YouTube) -->
              <div class="col-md-6 event-card-col">
                <div class="event-item-card">
                  <div class="event-media-wrapper">
                    <iframe src="https://www.youtube.com/embed/dGPJD6T_0Z8" title="SSSUTMS Event Video 2" allowfullscreen loading="lazy"></iframe>
                  </div>
                  <div class="p-3 d-flex flex-column justify-content-between flex-grow-1">
                    <div>
                      <h5 class="fw-bold text-dark mb-2">Technical Workshop &amp; Seminar Highlights</h5>
                      <p class="text-secondary small mb-3">Video recording of student symposiums, expert technical talks, and campus celebrations.</p>
                    </div>
                    <a href="https://youtu.be/dGPJD6T_0Z8" target="_blank" rel="noopener" class="syl-btn align-self-start">
                      <i class="fa-brands fa-youtube"></i> Watch on YouTube
                    </a>
                  </div>
                </div>
              </div>

            </div>

            <div id="noResultsMessage" class="alert alert-warning text-center d-none my-4">
              <i class="fa fa-search me-2"></i> No matching events found. Please try a different search term.
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

<script>
function filterEvents() {
  const query = document.getElementById('tableSearchInput').value.toLowerCase().trim();
  const cards = document.querySelectorAll('.event-card-col');
  let visibleCount = 0;

  cards.forEach(card => {
    const text = card.innerText.toLowerCase();
    if (text.includes(query)) {
      card.style.display = '';
      visibleCount++;
    } else {
      card.style.display = 'none';
    }
  });

  const counter = document.getElementById('resultsCount');
  const noResults = document.getElementById('noResultsMessage');

  if (query === '') {
    counter.textContent = 'Showing all events';
    if (noResults) noResults.classList.add('d-none');
  } else {
    counter.textContent = `Showing ${visibleCount} event${visibleCount === 1 ? '' : 's'}`;
    if (noResults) {
      if (visibleCount === 0) {
        noResults.classList.remove('d-none');
      } else {
        noResults.classList.add('d-none');
      }
    }
  }
}

function clearSearch() {
  const input = document.getElementById('tableSearchInput');
  if (input) {
    input.value = '';
    filterEvents();
    input.focus();
  }
}
</script>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>