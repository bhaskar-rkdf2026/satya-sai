<?php
$page_title = 'Workshop & Seminars - SSSUTMS';
$banner_title = 'Workshop & Seminars';
$banner_category = 'Academic';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
.ws-section { background-color: #f8fafc; }
.ws-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15,23,42,0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}
.ws-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2.2rem 2rem;
  position: relative;
}
.ws-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.ws-stat-chip {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 16px 14px;
  display: flex; align-items: center; gap: 12px;
  height: 100%;
  transition: all 0.25s ease;
  box-shadow: 0 4px 12px rgba(0,0,0,0.02);
}
.ws-stat-chip:hover {
  border-color: #cbd5e1;
  box-shadow: 0 6px 18px rgba(11,37,69,0.07);
  transform: translateY(-2px);
}
.ws-stat-icon {
  width: 48px; height: 48px;
  border-radius: 12px;
  background: rgba(245,158,11,0.12);
  color: #d97706;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.35rem; flex-shrink: 0;
}
.ws-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 16px;
  padding: 1.5rem;
  box-shadow: 0 4px 16px rgba(0,0,0,0.02);
  margin-bottom: 1.75rem;
}
.ws-card-header {
  display: flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 1.2rem;
  padding-bottom: 0.85rem;
  border-bottom: 2px solid #f1f5f9;
}
.ws-card-header i {
  color: #f59e0b;
  font-size: 1.3rem;
}
.ws-table-wrapper {
  border-radius: 12px;
  overflow: hidden;
  border: 1px solid #e2e8f0;
  box-shadow: 0 4px 16px rgba(0,0,0,0.03);
  margin-bottom: 1rem;
}
.ws-table {
  width: 100%;
  border-collapse: collapse;
  font-size: 0.93rem;
  margin-bottom: 0;
}
.ws-table thead th {
  background: #1e3a5f;
  color: #ffffff;
  font-weight: 600;
  padding: 14px 16px;
  border: none;
  text-align: left;
  font-size: 0.9rem;
  letter-spacing: 0.03em;
  text-transform: uppercase;
}
.ws-table tbody tr:nth-child(even) { background: #f8fafc; }
.ws-table tbody tr:nth-child(odd)  { background: #ffffff; }
.ws-table tbody tr:hover {
  background: #f1f5f9;
  transition: background 0.15s ease;
}
.ws-table tbody td {
  padding: 14px 16px;
  border-bottom: 1px solid #e2e8f0;
  color: #334155;
  vertical-align: middle;
}
.ws-badge {
  font-size: 0.78rem;
  font-weight: 700;
  padding: 5px 12px;
  border-radius: 6px;
  text-transform: uppercase;
  letter-spacing: 0.04em;
  display: inline-block;
}
.ws-badge-workshop { background: #e0f2fe; color: #0369a1; border: 1px solid #bae6fd; }
.ws-badge-seminar  { background: #fef3c7; color: #b45309; border: 1px solid #fde68a; }
.ws-badge-lecture  { background: #f3e8ff; color: #6b21a8; border: 1px solid #e9d5ff; }
.ws-badge-conf     { background: #dcfce7; color: #15803d; border: 1px solid #bbf7d0; }
.ws-download-btn {
  background: linear-gradient(135deg, #0b2545 0%, #1e4d8c 100%) !important;
  color: #ffffff !important;
  font-size: 0.82rem;
  font-weight: 700;
  padding: 6px 13px;
  border-radius: 8px;
  border: 1px solid rgba(245,158,11,0.35);
  text-decoration: none !important;
  display: inline-flex;
  align-items: center;
  gap: 6px;
  white-space: nowrap;
  box-shadow: 0 2px 6px rgba(11,37,69,0.15);
  transition: all 0.2s ease;
}
.ws-download-btn i {
  color: #fbbf24 !important;
}
.ws-download-btn:hover {
  background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%) !important;
  color: #ffffff !important;
  border-color: #d97706;
  box-shadow: 0 4px 12px rgba(217,119,6,0.35);
  transform: translateY(-1px);
}
</style>

<section class="subpage-main-section ws-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="ws-main-card">

          <!-- Banner Header -->
          <div class="ws-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-chalkboard-user me-1"></i> Academic Activities &amp; Knowledge Dissemination
              </span>
              <h3 class="fw-bold text-white mb-1 fs-3">WORKSHOPS &amp; SEMINARS</h3>
              <p class="text-white-50 mb-0 small">Conferences, Symposia, Technical Workshops &amp; Skill Development Sessions</p>
            </div>
          </div>

          <!-- Body Content -->
          <div class="p-4">

            <!-- Stat Chips -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-sm-6 col-md-3">
                <div class="ws-stat-chip">
                  <div class="ws-stat-icon"><i class="fa-solid fa-laptop-code"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Workshops</div>
                    <div class="fw-bold text-dark fs-6">Hands-on Training</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="ws-stat-chip">
                  <div class="ws-stat-icon"><i class="fa-solid fa-people-group"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Seminars</div>
                    <div class="fw-bold text-dark fs-6">National Forums</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="ws-stat-chip">
                  <div class="ws-stat-icon"><i class="fa-solid fa-globe"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Conferences</div>
                    <div class="fw-bold text-dark fs-6">ICAMET &amp; ICCTS</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="ws-stat-chip">
                  <div class="ws-stat-icon"><i class="fa-solid fa-certificate"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Development</div>
                    <div class="fw-bold text-dark fs-6">Skill Upgradation</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Upcoming Events Table -->
            <div class="ws-card">
              <div class="ws-card-header">
                <i class="fa-solid fa-calendar-days"></i>
                <h5 class="fw-bold text-dark mb-0">Upcoming Events &amp; Workshops</h5>
              </div>
              <div class="ws-table-wrapper">
                <table class="ws-table">
                  <thead>
                    <tr>
                      <th style="width:8%; text-align:center;">S.No.</th>
                      <th style="width:28%;">Department</th>
                      <th style="width:18%;">Event Type</th>
                      <th style="width:46%;">Title</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td style="text-align:center;"><strong>1</strong></td>
                      <td><strong>Physical Education</strong></td>
                      <td><span class="ws-badge ws-badge-workshop">Workshop</span></td>
                      <td>Statistical Analysis of Research Methodology</td>
                    </tr>
                    <tr>
                      <td style="text-align:center;"><strong>2</strong></td>
                      <td><strong>Management</strong></td>
                      <td><span class="ws-badge ws-badge-seminar">Seminar</span></td>
                      <td>Practical Applications of Geeta in Present Scenario</td>
                    </tr>
                    <tr>
                      <td style="text-align:center;"><strong>3</strong></td>
                      <td><strong>Management</strong></td>
                      <td><span class="ws-badge ws-badge-workshop">Workshop</span></td>
                      <td>New Trends in Thesis Writing</td>
                    </tr>
                    <tr>
                      <td style="text-align:center;"><strong>4</strong></td>
                      <td><strong>School of Pharmacy</strong></td>
                      <td><span class="ws-badge ws-badge-workshop">E-Workshop</span></td>
                      <td>National E-Workshop on "Advanced Instrumentation"</td>
                    </tr>
                    <tr>
                      <td style="text-align:center;"><strong>5</strong></td>
                      <td><strong>Diploma Engineering</strong></td>
                      <td><span class="ws-badge ws-badge-lecture">Expert Lecture</span></td>
                      <td>Entrepreneurship Skill Development Among Students</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <!-- Academic Session 2021-22 Event Highlights -->
            <div class="ws-card">
              <div class="ws-card-header">
                <i class="fa-solid fa-star"></i>
                <h5 class="fw-bold text-dark mb-0">Academic Session 2021-22 Highlights</h5>
              </div>
              <div class="ws-table-wrapper">
                <table class="ws-table">
                  <thead>
                    <tr>
                      <th style="width:8%; text-align:center;">S.No.</th>
                      <th style="width:22%;">Date / Schedule</th>
                      <th style="width:30%;">Department</th>
                      <th style="width:18%;">Event</th>
                      <th style="width:22%;">Title &amp; Details</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td style="text-align:center;"><strong>1</strong></td>
                      <td><strong>2 May 2022 &ndash;<br>7 May 2022</strong></td>
                      <td>Computer Science Engineering / MCA</td>
                      <td><span class="ws-badge ws-badge-workshop">5 Days Workshop</span></td>
                      <td>
                        <span class="d-block fw-bold mb-1">SQL Using Oracle</span>
                        <a href="<?php echo BASE_URL; ?>assets/images/Files/Notices/WorkshoponSQL.pdf" target="_blank" rel="noopener" class="ws-download-btn">
                          <i class="fa-solid fa-file-pdf"></i> More Info
                        </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <!-- Historical Workshops Summary Table (2014-15 to 2019-20) -->
            <div class="ws-card">
              <div class="ws-card-header">
                <i class="fa-solid fa-clock-rotate-left"></i>
                <h5 class="fw-bold text-dark mb-0">Historical Workshops Summary (2014-15 to 2019-20)</h5>
              </div>
              <div class="ws-table-wrapper">
                <table class="ws-table">
                  <thead>
                    <tr>
                      <th style="width:8%; text-align:center;">S.No.</th>
                      <th style="width:20%;">Academic Year</th>
                      <th style="width:15%; text-align:center;">Count</th>
                      <th style="width:57%;">Workshop Titles</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td style="text-align:center;"><strong>1</strong></td>
                      <td><strong>2014 - 2015</strong></td>
                      <td style="text-align:center;"><span class="badge bg-secondary px-3 py-1">01</span></td>
                      <td>ROBOTRYST</td>
                    </tr>
                    <tr>
                      <td style="text-align:center;"><strong>2</strong></td>
                      <td><strong>2015 - 2016</strong></td>
                      <td style="text-align:center;"><span class="badge bg-secondary px-3 py-1">02</span></td>
                      <td>Workshop on Impact of Mental Health on Academics; Workshop on MATLAB Programming for Image Processing</td>
                    </tr>
                    <tr>
                      <td style="text-align:center;"><strong>3</strong></td>
                      <td><strong>2016 - 2017</strong></td>
                      <td style="text-align:center;"><span class="badge bg-secondary px-3 py-1">01</span></td>
                      <td>Workshop on Hydraulic and Pneumatic System</td>
                    </tr>
                    <tr>
                      <td style="text-align:center;"><strong>4</strong></td>
                      <td><strong>2017 - 2018</strong></td>
                      <td style="text-align:center;"><span class="badge bg-secondary px-3 py-1">02</span></td>
                      <td>Workshop on Integrity &amp; Civility in Leadership; Hands-on Workshop on Embedded System Design with IoT</td>
                    </tr>
                    <tr>
                      <td style="text-align:center;"><strong>5</strong></td>
                      <td><strong>2018 - 2019</strong></td>
                      <td style="text-align:center;"><span class="badge bg-secondary px-3 py-1">03</span></td>
                      <td>AWS Cloud Computing; Workshop on Athletic Performance Enhancement; Ansys Fluent Workshop</td>
                    </tr>
                    <tr>
                      <td style="text-align:center;"><strong>6</strong></td>
                      <td><strong>2019 - 2020</strong></td>
                      <td style="text-align:center;"><span class="badge bg-secondary px-3 py-1">03</span></td>
                      <td>Innovating Student Leadership; Building Planning Design &amp; Analysis; Hazard Identification of Process Plants</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <!-- International Conferences Summary Table (2014-15 to 2019-20) -->
            <div class="ws-card mb-0">
              <div class="ws-card-header">
                <i class="fa-solid fa-earth-americas"></i>
                <h5 class="fw-bold text-dark mb-0">International Conferences Summary (2014-15 to 2019-20)</h5>
              </div>
              <div class="ws-table-wrapper">
                <table class="ws-table">
                  <thead>
                    <tr>
                      <th style="width:8%; text-align:center;">S.No.</th>
                      <th style="width:20%;">Academic Year</th>
                      <th style="width:15%; text-align:center;">Count</th>
                      <th style="width:57%;">Conference Titles</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td style="text-align:center;"><strong>1</strong></td>
                      <td><strong>2014 - 2015</strong></td>
                      <td style="text-align:center;"><span class="badge bg-success px-3 py-1">01</span></td>
                      <td>International Conference on Advances in Mathematics, Engineering &amp; Technology (ICAMET-15)</td>
                    </tr>
                    <tr>
                      <td style="text-align:center;"><strong>2</strong></td>
                      <td><strong>2015 - 2016</strong></td>
                      <td style="text-align:center;"><span class="badge bg-success px-3 py-1">02</span></td>
                      <td>International Conference on Information and Education Innovations (ICIEI-16); International Conference on Engineering &amp; Technology (ICET-16)</td>
                    </tr>
                    <tr>
                      <td style="text-align:center;"><strong>3</strong></td>
                      <td><strong>2016 - 2017</strong></td>
                      <td style="text-align:center;"><span class="badge bg-success px-3 py-1">01</span></td>
                      <td>International Conference on Advance Studies in Engineering and Sciences (ICASES-16)</td>
                    </tr>
                    <tr>
                      <td style="text-align:center;"><strong>4</strong></td>
                      <td><strong>2017 - 2018</strong></td>
                      <td style="text-align:center;"><span class="badge bg-success px-3 py-1">02</span></td>
                      <td>International Conference on Advance Studies in Engineering and Sciences (ICASES-17); International Conference on Current Trends in STEAM (ICCTS-2018)</td>
                    </tr>
                    <tr>
                      <td style="text-align:center;"><strong>5</strong></td>
                      <td><strong>2018 - 2019</strong></td>
                      <td style="text-align:center;"><span class="badge bg-success px-3 py-1">01</span></td>
                      <td>International Conference on Current Trends in STEAM (ICCTS-2019)</td>
                    </tr>
                    <tr>
                      <td style="text-align:center;"><strong>6</strong></td>
                      <td><strong>2019 - 2020</strong></td>
                      <td style="text-align:center;"><span class="badge bg-success px-3 py-1">01</span></td>
                      <td>International Conference on Current Trends in STEAM (ICCTS-2020)</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

          </div>
        </div><!-- end ws-main-card -->
      </div><!-- end col-lg-8 -->

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>