<?php
$page_title = 'Expert Lectures - SSSUTMS';
$banner_title = 'Expert Lectures';
$banner_category = 'Academic';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
.exp-lect-section { background-color: #f8fafc; }
.exp-lect-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15,23,42,0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}
.exp-lect-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2rem;
  position: relative;
}
.exp-lect-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.exp-lect-stat-chip {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 14px 12px;
  display: flex; align-items: center; gap: 10px;
  height: 100%;
  transition: all 0.2s ease;
  overflow: hidden;
}
.exp-lect-stat-chip:hover {
  border-color: #cbd5e1;
  box-shadow: 0 4px 14px rgba(0,0,0,0.04);
}
.exp-lect-stat-icon {
  width: 44px; height: 44px;
  border-radius: 10px;
  background: rgba(245,158,11,0.1);
  color: #d97706;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.25rem; flex-shrink: 0;
}
.exp-lect-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 1.5rem;
  box-shadow: 0 4px 16px rgba(0,0,0,0.02);
  margin-bottom: 1.5rem;
}
.exp-lect-card-header {
  display: flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 1rem;
  padding-bottom: 0.75rem;
  border-bottom: 2px solid #f1f5f9;
}
.exp-lect-card-header i {
  color: #f59e0b;
  font-size: 1.25rem;
}
.exp-lect-badge-btn {
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
.exp-lect-badge-btn i {
  color: #fbbf24 !important;
  transition: color 0.2s ease;
}
.exp-lect-badge-btn:hover {
  background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%) !important;
  color: #ffffff !important;
  border-color: #d97706;
  box-shadow: 0 4px 12px rgba(217,119,6,0.35);
  transform: translateY(-1px);
}
.exp-lect-badge-btn:hover i {
  color: #ffffff !important;
}
.exp-lect-table-wrapper {
  border-radius: 12px;
  overflow: hidden;
  border: 1px solid #e2e8f0;
  box-shadow: 0 4px 16px rgba(0,0,0,0.03);
  margin-bottom: 1rem;
}
.exp-lect-table {
  width: 100%;
  border-collapse: collapse;
  font-size: 0.92rem;
  margin-bottom: 0;
}
.exp-lect-table thead th {
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
.exp-lect-table tbody tr:nth-child(even) { background: #f0f4f9; }
.exp-lect-table tbody tr:nth-child(odd)  { background: #ffffff; }
.exp-lect-table tbody tr:hover {
  background: #e8f0fb;
  transition: background 0.15s ease;
}
.exp-lect-table tbody td {
  padding: 12px 14px;
  border-bottom: 1px solid #e2e8f0;
  color: #334155;
  vertical-align: middle;
}
.exp-lect-table tbody td:first-child {
  font-weight: 700;
  color: #0b2545;
}
</style>

<section class="subpage-main-section exp-lect-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="exp-lect-main-card">

          <!-- Banner Header -->
          <div class="exp-lect-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-chalkboard-user me-1"></i> Academic Activities
              </span>
              <h3 class="fw-bold text-white mb-0 fs-3">EXPERT LECTURE DETAILS</h3>
            </div>
          </div>

          <!-- Body -->
          <div class="p-4">

            <!-- Stat Chips -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-sm-6 col-md-3">
                <div class="exp-lect-stat-chip">
                  <div class="exp-lect-stat-icon"><i class="fa-solid fa-microphone-lines"></i></div>
                  <div style="min-width: 0; flex: 1;">
                    <div class="text-muted extra-small uppercase fw-bold">Events</div>
                    <div class="fw-bold text-dark fs-6">Expert Lectures</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="exp-lect-stat-chip">
                  <div class="exp-lect-stat-icon"><i class="fa-solid fa-user-graduate"></i></div>
                  <div style="min-width: 0; flex: 1;">
                    <div class="text-muted extra-small uppercase fw-bold">Speakers</div>
                    <div class="fw-bold text-dark fs-6">Industry &amp; Academic</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="exp-lect-stat-chip">
                  <div class="exp-lect-stat-icon"><i class="fa-solid fa-calendar-days"></i></div>
                  <div style="min-width: 0; flex: 1;">
                    <div class="text-muted extra-small uppercase fw-bold">Coverage</div>
                    <div class="fw-bold text-dark fs-6">2019 &ndash; Present</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="exp-lect-stat-chip">
                  <div class="exp-lect-stat-icon"><i class="fa-solid fa-building-columns"></i></div>
                  <div style="min-width: 0; flex: 1;">
                    <div class="text-muted extra-small uppercase fw-bold">Organizers</div>
                    <div class="fw-bold text-dark fs-6">All Departments</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Upcoming Events Card -->
            <div class="exp-lect-card">
              <div class="exp-lect-card-header">
                <i class="fa-solid fa-calendar-plus"></i>
                <h5 class="fw-bold text-dark mb-0">Upcoming &amp; Featured Expert Lectures</h5>
              </div>
              <div class="exp-lect-table-wrapper">
                <table class="exp-lect-table">
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
                      <td>Physical Education</td>
                      <td><span class="badge bg-primary">Expert Lecture</span></td>
                      <td><strong>Stress Management</strong></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;">2</td>
                      <td>Physical Education</td>
                      <td><span class="badge bg-primary">Expert Lecture</span></td>
                      <td><strong>Session on the Occasion of &ldquo;International Yoga&rdquo;</strong></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;">3</td>
                      <td>Diploma Engineering</td>
                      <td><span class="badge bg-primary">Expert Lecture</span></td>
                      <td><strong>Entrepreneurship Skill Development Among Students</strong></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;">4</td>
                      <td>School of Pharmacy</td>
                      <td><span class="badge bg-success">Guest Lecture</span></td>
                      <td><strong>Career Opportunity After B. Pharm.</strong></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;">5</td>
                      <td>School of Pharmacy</td>
                      <td><span class="badge bg-success">Guest Lecture</span></td>
                      <td><strong>Personality Development and Communication Skills</strong></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;">6</td>
                      <td>School of Pharmacy</td>
                      <td><span class="badge bg-success">Guest Lecture</span></td>
                      <td><strong>Quality Control and Quality Assurance</strong></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;">7</td>
                      <td>School of Pharmacy</td>
                      <td><span class="badge bg-success">Guest Lecture</span></td>
                      <td><strong>Guidance on Preparation of GPAT Exam</strong></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <!-- Session 2021-22 -->
            <div class="exp-lect-card">
              <div class="exp-lect-card-header">
                <i class="fa-solid fa-graduation-cap"></i>
                <h5 class="fw-bold text-dark mb-0">Academic Session 2021-22</h5>
              </div>
              <div class="exp-lect-table-wrapper">
                <table class="exp-lect-table">
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
                      <td><strong>19/02/2022</strong></td>
                      <td>Department of Physical Education, SSSUTMS</td>
                      <td>Expert Lecture on Yoga in Daily Routine</td>
                      <td style="text-align:center;">
                        <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Expert_Lect_Yoga_18022022_0318.jpg" target="_blank" rel="noopener" class="exp-lect-badge-btn">
                          <i class="fa-solid fa-image"></i> View Poster
                        </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <!-- Session 2020-21 -->
            <div class="exp-lect-card">
              <div class="exp-lect-card-header">
                <i class="fa-solid fa-graduation-cap"></i>
                <h5 class="fw-bold text-dark mb-0">Academic Session 2020-21</h5>
              </div>
              <div class="exp-lect-table-wrapper">
                <table class="exp-lect-table">
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
                      <td><strong>22/11/2021</strong></td>
                      <td>SSSUTMS</td>
                      <td>Financial Literacy Session (With Mr. Shamsher Singh)</td>
                      <td style="text-align:center;">
                        <a href="<?php echo BASE_URL; ?>assets/images/Document/Activities/Expert.jpeg" target="_blank" rel="noopener" class="exp-lect-badge-btn">
                          <i class="fa-solid fa-image"></i> View Poster
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>05/07/2021</strong></td>
                      <td>School of Design, SSSUTMS</td>
                      <td>&ldquo;Understanding the profession of Architecture&rdquo; (with Ar. Vijay Garg)</td>
                      <td style="text-align:center;">
                        <a href="<?php echo BASE_URL; ?>assets/images/Document/Activities/SOD_Event.jpeg" target="_blank" rel="noopener" class="exp-lect-badge-btn">
                          <i class="fa-solid fa-image"></i> View Poster
                        </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <!-- Session 2019-20 -->
            <div class="exp-lect-card mb-0">
              <div class="exp-lect-card-header">
                <i class="fa-solid fa-graduation-cap"></i>
                <h5 class="fw-bold text-dark mb-0">Academic Session 2019-20</h5>
              </div>
              <div class="exp-lect-table-wrapper">
                <table class="exp-lect-table">
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
                      <td><strong>23/12/2019</strong></td>
                      <td>Faculty of Education, SSSUTMS</td>
                      <td>Fitness Trend</td>
                      <td style="text-align:center;">
                        <a href="#" class="exp-lect-badge-btn"><i class="fa-solid fa-file-lines"></i> More Info</a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>23/12/2019</strong></td>
                      <td>Faculty of Education, SSSUTMS</td>
                      <td>Stress Management</td>
                      <td style="text-align:center;">
                        <a href="#" class="exp-lect-badge-btn"><i class="fa-solid fa-file-lines"></i> More Info</a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>14/12/2019</strong></td>
                      <td>Dept. of Applied Chemistry SOE, SSSUTMS</td>
                      <td>Polymer Composites</td>
                      <td style="text-align:center;">
                        <a href="#" class="exp-lect-badge-btn"><i class="fa-solid fa-file-lines"></i> More Info</a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>09/12/2019</strong></td>
                      <td>Faculty of Education, SSSUTMS</td>
                      <td>Technology in Education</td>
                      <td style="text-align:center;">
                        <a href="#" class="exp-lect-badge-btn"><i class="fa-solid fa-file-lines"></i> More Info</a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>09/12/2019</strong></td>
                      <td>MBA Department, SOMS, SSSUTMS</td>
                      <td>Paradigm Shift in Supply Chain Management</td>
                      <td style="text-align:center;">
                        <a href="#" class="exp-lect-badge-btn"><i class="fa-solid fa-file-lines"></i> More Info</a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>07/12/2019</strong></td>
                      <td>SSSUTME</td>
                      <td>Expert Lecture on E-governance</td>
                      <td style="text-align:center;">
                        <a href="#" class="exp-lect-badge-btn"><i class="fa-solid fa-file-lines"></i> More Info</a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>02/12/2019</strong></td>
                      <td>Dept. of Electrical Engineering, SOE</td>
                      <td>Circuit and Its Analytical Function Parameters for Lighting and Switching Impulse Generation</td>
                      <td style="text-align:center;">
                        <a href="#" class="exp-lect-badge-btn"><i class="fa-solid fa-file-lines"></i> More Info</a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>02/12/2019</strong></td>
                      <td>Dept. of Aeronautical Engineering, SOE</td>
                      <td>Industrial Application of Refrigeration System</td>
                      <td style="text-align:center;">
                        <a href="#" class="exp-lect-badge-btn"><i class="fa-solid fa-file-lines"></i> More Info</a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>02/12/2019</strong></td>
                      <td>Dept. of Mechanical Engineering, SOE</td>
                      <td>Solar and Wind Hybrid System</td>
                      <td style="text-align:center;">
                        <a href="#" class="exp-lect-badge-btn"><i class="fa-solid fa-file-lines"></i> More Info</a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>02/12/2019</strong></td>
                      <td>School of Hotel Management, SSSUTMS</td>
                      <td>Commonly Neglected Cleaning Areas in Hotel Guest Rooms</td>
                      <td style="text-align:center;">
                        <a href="#" class="exp-lect-badge-btn"><i class="fa-solid fa-file-lines"></i> More Info</a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>30/11/2019</strong></td>
                      <td>Dept. of Computer Science SOE, SSSUTMS</td>
                      <td>Entrepreneurship Talks About Software Field</td>
                      <td style="text-align:center;">
                        <a href="#" class="exp-lect-badge-btn"><i class="fa-solid fa-file-lines"></i> More Info</a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>30/11/2019</strong></td>
                      <td>MCA Department SOCA, SSSUTMS</td>
                      <td>Entrepreneurship Talks About Software Field</td>
                      <td style="text-align:center;">
                        <a href="#" class="exp-lect-badge-btn"><i class="fa-solid fa-file-lines"></i> More Info</a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>30/11/2019</strong></td>
                      <td>Dept. of Mechanical Engineering, SOE</td>
                      <td>Workshop on Hydraulics &amp; Pneumatics</td>
                      <td style="text-align:center;">
                        <a href="#" class="exp-lect-badge-btn"><i class="fa-solid fa-file-lines"></i> More Info</a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>30/11/2019</strong></td>
                      <td>School of Pharmacy, SSSUTMS</td>
                      <td>The Scope of Pharmacovigilance in Stream of Pharmacy</td>
                      <td style="text-align:center;">
                        <a href="#" class="exp-lect-badge-btn"><i class="fa-solid fa-file-lines"></i> More Info</a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>30/11/2019</strong></td>
                      <td>Dept. of Chemical Engineering, SOE</td>
                      <td>Chemical Engineering &amp; Technology Industrial Applications</td>
                      <td style="text-align:center;">
                        <a href="#" class="exp-lect-badge-btn"><i class="fa-solid fa-file-lines"></i> More Info</a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>30/11/2019</strong></td>
                      <td>Dept. of Electrical Engineering, SOE</td>
                      <td>Electronic Sensors in Daily Life Application</td>
                      <td style="text-align:center;">
                        <a href="#" class="exp-lect-badge-btn"><i class="fa-solid fa-file-lines"></i> More Info</a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>29/11/2019</strong></td>
                      <td>Botany Department</td>
                      <td>Medicinal Plants and Their Importance in Our Life</td>
                      <td style="text-align:center;">
                        <a href="#" class="exp-lect-badge-btn"><i class="fa-solid fa-file-lines"></i> More Info</a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>29/11/2019</strong></td>
                      <td>Faculty of Education, SSSUTMS</td>
                      <td>Expert Lecture on Moral Value</td>
                      <td style="text-align:center;">
                        <a href="#" class="exp-lect-badge-btn"><i class="fa-solid fa-file-lines"></i> More Info</a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>28/11/2019</strong></td>
                      <td>Dept. of Computer Science Engineering, SOE</td>
                      <td>Psychometric Skills Uses in Interview of Software Company</td>
                      <td style="text-align:center;">
                        <a href="#" class="exp-lect-badge-btn"><i class="fa-solid fa-file-lines"></i> More Info</a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>28/11/2019</strong></td>
                      <td>Dept. of Civil Engineering, SOE</td>
                      <td>Water Resource Development</td>
                      <td style="text-align:center;">
                        <a href="#" class="exp-lect-badge-btn"><i class="fa-solid fa-file-lines"></i> More Info</a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

          </div>
        </div><!-- end exp-lect-main-card -->
      </div><!-- end col-lg-8 -->

      <!-- Sticky Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>