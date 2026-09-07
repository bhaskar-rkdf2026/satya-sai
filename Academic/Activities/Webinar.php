<?php
$page_title = 'Webinars - SSSUTMS';
$banner_title = 'Webinar';
$banner_category = 'Academic';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
.webinar-section { background-color: #f8fafc; }
.webinar-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15,23,42,0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}
.webinar-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2rem;
  position: relative;
}
.webinar-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.webinar-stat-chip {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 14px 12px;
  display: flex; align-items: center; gap: 10px;
  height: 100%;
  transition: all 0.2s ease;
  overflow: hidden;
}
.webinar-stat-chip:hover {
  border-color: #cbd5e1;
  box-shadow: 0 4px 14px rgba(0,0,0,0.04);
}
.webinar-stat-icon {
  width: 44px; height: 44px;
  border-radius: 10px;
  background: rgba(245,158,11,0.1);
  color: #d97706;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.25rem; flex-shrink: 0;
}
.webinar-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 1.5rem;
  box-shadow: 0 4px 16px rgba(0,0,0,0.02);
  margin-bottom: 1.5rem;
}
.webinar-card-header {
  display: flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 1rem;
  padding-bottom: 0.75rem;
  border-bottom: 2px solid #f1f5f9;
}
.webinar-card-header i {
  color: #f59e0b;
  font-size: 1.25rem;
}
.webinar-badge-btn {
  background: linear-gradient(135deg, #0b2545 0%, #1e4d8c 100%) !important;
  color: #ffffff !important;
  font-size: 0.82rem;
  font-weight: 700;
  padding: 7px 12px;
  border-radius: 8px;
  border: 1px solid rgba(245,158,11,0.35);
  text-decoration: none !important;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 7px;
  white-space: nowrap;
  width: 150px;
  flex-shrink: 0;
  box-shadow: 0 2px 6px rgba(11,37,69,0.15);
  transition: all 0.2s ease;
}
.webinar-badge-btn i {
  color: #fbbf24 !important;
  transition: color 0.2s ease;
}
.webinar-badge-btn:hover {
  background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%) !important;
  color: #ffffff !important;
  border-color: #d97706;
  box-shadow: 0 4px 12px rgba(217,119,6,0.35);
  transform: translateY(-1px);
}
.webinar-badge-btn:hover i {
  color: #ffffff !important;
}
.webinar-table-wrapper {
  border-radius: 12px;
  overflow: hidden;
  border: 1px solid #e2e8f0;
  box-shadow: 0 4px 16px rgba(0,0,0,0.03);
  margin-bottom: 1rem;
}
.webinar-table {
  width: 100%;
  border-collapse: collapse;
  font-size: 0.92rem;
  margin-bottom: 0;
}
.webinar-table thead th {
  background: #1e3a5f;
  color: #ffffff;
  font-weight: 600;
  padding: 12px 14px;
  border: none;
  text-align: left;
  font-size: 0.88rem;
  letter-spacing: 0.03em;
  text-transform: uppercase;
}
.webinar-table tbody tr:nth-child(even) { background: #f0f4f9; }
.webinar-table tbody tr:nth-child(odd)  { background: #ffffff; }
.webinar-table tbody tr:hover {
  background: #e8f0fb;
  transition: background 0.15s ease;
}
.webinar-table tbody td {
  padding: 12px 14px;
  border-bottom: 1px solid #e2e8f0;
  color: #334155;
  vertical-align: middle;
}
.webinar-table tbody td:first-child {
  font-weight: 700;
  color: #0b2545;
}
</style>

<section class="subpage-main-section webinar-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="webinar-main-card">

          <!-- Banner Header -->
          <div class="webinar-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-laptop-file me-1"></i> Academic Activities
              </span>
              <h3 class="fw-bold text-white mb-0 fs-3">WEBINAR DETAILS</h3>
            </div>
          </div>

          <!-- Body -->
          <div class="p-4">

            <!-- Stat Chips -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-sm-6 col-md-3">
                <div class="webinar-stat-chip">
                  <div class="webinar-stat-icon"><i class="fa-solid fa-video"></i></div>
                  <div style="min-width: 0; flex: 1;">
                    <div class="text-muted extra-small uppercase fw-bold">Events</div>
                    <div class="fw-bold text-dark fs-6">Virtual Webinars &amp; STTPs</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="webinar-stat-chip">
                  <div class="webinar-stat-icon"><i class="fa-solid fa-lightbulb"></i></div>
                  <div style="min-width: 0; flex: 1;">
                    <div class="text-muted extra-small uppercase fw-bold">Focus</div>
                    <div class="fw-bold text-dark fs-6">Innovation &amp; Tech</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="webinar-stat-chip">
                  <div class="webinar-stat-icon"><i class="fa-solid fa-calendar-check"></i></div>
                  <div style="min-width: 0; flex: 1;">
                    <div class="text-muted extra-small uppercase fw-bold">Timeline</div>
                    <div class="fw-bold text-dark fs-6">2019 &ndash; Present</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="webinar-stat-chip">
                  <div class="webinar-stat-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                  <div style="min-width: 0; flex: 1;">
                    <div class="text-muted extra-small uppercase fw-bold">Faculties</div>
                    <div class="fw-bold text-dark fs-6">Engg, Ayush, Med &amp; Des</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Upcoming Events Card -->
            <div class="webinar-card">
              <div class="webinar-card-header">
                <i class="fa-solid fa-calendar-plus"></i>
                <h5 class="fw-bold text-dark mb-0">Upcoming Webinars</h5>
              </div>
              <div class="webinar-table-wrapper">
                <table class="webinar-table">
                  <thead>
                    <tr>
                      <th style="width:8%; text-align:center;">S.No.</th>
                      <th style="width:27%;">Department</th>
                      <th style="width:20%;">Event Type</th>
                      <th style="width:45%;">Title</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td style="text-align:center;">1</td>
                      <td>Polytechnic (Engineering)</td>
                      <td><span class="badge bg-primary">Webinar</span></td>
                      <td><strong>Recent Trends in Supply Chain Management</strong></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;">2</td>
                      <td>Polytechnic (Engineering)</td>
                      <td><span class="badge bg-primary">Webinar</span></td>
                      <td><strong>Waste Management and Its Utilization</strong></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <!-- Session 2020-21 -->
            <div class="webinar-card">
              <div class="webinar-card-header">
                <i class="fa-solid fa-award"></i>
                <h5 class="fw-bold text-dark mb-0">Academic Session 2020-21</h5>
              </div>
              <div class="webinar-table-wrapper">
                <table class="webinar-table">
                  <thead>
                    <tr>
                      <th style="width:13%;">Date</th>
                      <th style="width:30%;">Department</th>
                      <th style="width:37%;">Topic</th>
                      <th style="width:20%; text-align:center;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><strong>05/May/2021</strong></td>
                      <td>School of Homoeopathy, SSSUTMS</td>
                      <td>Role of AYUSH System &amp; Medicines during Second Wave of COVID-19</td>
                      <td style="text-align:center;">
                        <a href="#" class="webinar-badge-btn">
                          <i class="fa-solid fa-file-pdf"></i> View Report
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>14/June/2021</strong></td>
                      <td>Faculty of Pharmacy, SSSUTMS</td>
                      <td>Webinar on Blood Donation Awareness</td>
                      <td style="text-align:center;">
                        <a href="#" class="webinar-badge-btn">
                          <i class="fa-solid fa-image"></i> View Brochure
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>19/June/2021</strong></td>
                      <td>School of Homoeopathy, SSSUTMS</td>
                      <td>Impact of Yogic Practices to Achieve Life Long Health on The Occasion of International Yoga Day</td>
                      <td style="text-align:center;">
                        <a href="#" class="webinar-badge-btn">
                          <i class="fa-solid fa-file-pdf"></i> View Report
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>05/July/2021</strong></td>
                      <td>School of Design, SSSUTMS</td>
                      <td>Understanding the Profession of Architecture</td>
                      <td style="text-align:center;">
                        <a href="#" class="webinar-badge-btn">
                          <i class="fa-solid fa-image"></i> View Brochure
                        </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <!-- Session 2019-20 -->
            <div class="webinar-card mb-0">
              <div class="webinar-card-header">
                <i class="fa-solid fa-award"></i>
                <h5 class="fw-bold text-dark mb-0">Academic Session 2019-20</h5>
              </div>
              <div class="webinar-table-wrapper">
                <table class="webinar-table">
                  <thead>
                    <tr>
                      <th style="width:13%;">Date</th>
                      <th style="width:30%;">Department</th>
                      <th style="width:37%;">Topic</th>
                      <th style="width:20%; text-align:center;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><strong>09/May/2020</strong></td>
                      <td>School of Design, SSSUTMS</td>
                      <td>Designer&rsquo;s Era: Post Covid 19</td>
                      <td style="text-align:center;">
                        <a href="#" class="webinar-badge-btn">
                          <i class="fa-solid fa-image"></i> View Brochure
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>28-29/May/2020</strong></td>
                      <td>School of Engineering, SSSUTMS</td>
                      <td>Fundamental Of MATLAB and Simulation</td>
                      <td style="text-align:center;">
                        <a href="#" class="webinar-badge-btn">
                          <i class="fa-solid fa-image"></i> View Brochure
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>01/June/2020</strong></td>
                      <td>School of Hotel Management, SSSUTMS</td>
                      <td>CAREER Management Post COVID-19</td>
                      <td style="text-align:center;">
                        <a href="#" class="webinar-badge-btn">
                          <i class="fa-solid fa-image"></i> View Brochure
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>02/June/2020</strong></td>
                      <td>School of Homoeopathy, SSSUTMS</td>
                      <td>Role of AYUSH System and Medicines in COVID-19</td>
                      <td style="text-align:center;">
                        <a href="#" class="webinar-badge-btn">
                          <i class="fa-solid fa-image"></i> View Brochure
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>05/June/2020</strong></td>
                      <td>School of Engineering, SSSUTMS</td>
                      <td>STTP on &ldquo;Web-Development Using PHP&rdquo;</td>
                      <td style="text-align:center;">
                        <a href="#" class="webinar-badge-btn">
                          <i class="fa-solid fa-image"></i> View Brochure
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>06/June/2020</strong></td>
                      <td>College of Pharmacy, SSSUTMS</td>
                      <td>Massive Open Online Course(MOOC)</td>
                      <td style="text-align:center;">
                        <a href="#" class="webinar-badge-btn">
                          <i class="fa-solid fa-image"></i> View Brochure
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>06/June/2020</strong></td>
                      <td>School of Engineering, SSSUTMS</td>
                      <td>Innovations in Solar Energy</td>
                      <td style="text-align:center;">
                        <a href="#" class="webinar-badge-btn">
                          <i class="fa-solid fa-image"></i> View Brochure
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>07/June/2020</strong></td>
                      <td>School of Pharmacy, SSSUTMS</td>
                      <td>Herbal Drugs for Boosting Immunity Against Novel CORONA Virus</td>
                      <td style="text-align:center;">
                        <a href="#" class="webinar-badge-btn">
                          <i class="fa-solid fa-file-pdf"></i> View Brochure
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>09/June/2020</strong></td>
                      <td>School of Engineering, SSSUTMS</td>
                      <td>Evolution Prospects of Technical Education</td>
                      <td style="text-align:center;">
                        <a href="#" class="webinar-badge-btn">
                          <i class="fa-solid fa-image"></i> View Brochure
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>09/June/2020</strong></td>
                      <td>School of Nursing, SSSUTMS</td>
                      <td>Holistic Nursing Approach toward COVID-19</td>
                      <td style="text-align:center;">
                        <a href="#" class="webinar-badge-btn"><i class="fa-solid fa-file-lines"></i> More Info</a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>10/June/2020</strong></td>
                      <td>School of Physical Education, SSSUTMS</td>
                      <td>International webinar on Healing &amp; Health in Pandemic</td>
                      <td style="text-align:center;">
                        <a href="#" class="webinar-badge-btn">
                          <i class="fa-solid fa-image"></i> View Brochure
                        </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

          </div>
        </div><!-- end webinar-main-card -->
      </div><!-- end col-lg-8 -->

      <!-- Sticky Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>