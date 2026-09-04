<?php
$page_title = 'Training & Placement Cell - SSSUTMS';
$banner_title = 'Training & Placement Cell';
$banner_category = 'Academic';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
.tp-section { background-color: #f8fafc; }
.tp-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15,23,42,0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}
.tp-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2.2rem 2rem;
  position: relative;
}
.tp-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.tp-stat-chip {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 16px 14px;
  display: flex; align-items: center; gap: 12px;
  height: 100%;
  transition: all 0.25s ease;
  box-shadow: 0 4px 12px rgba(0,0,0,0.02);
}
.tp-stat-chip:hover {
  border-color: #cbd5e1;
  box-shadow: 0 6px 18px rgba(11,37,69,0.07);
  transform: translateY(-2px);
}
.tp-stat-icon {
  width: 48px; height: 48px;
  border-radius: 12px;
  background: rgba(245,158,11,0.12);
  color: #d97706;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.35rem; flex-shrink: 0;
}
.tp-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 16px;
  padding: 1.5rem;
  box-shadow: 0 4px 16px rgba(0,0,0,0.02);
  margin-bottom: 1.75rem;
}
.tp-card-header {
  display: flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 1.2rem;
  padding-bottom: 0.85rem;
  border-bottom: 2px solid #f1f5f9;
}
.tp-card-header i {
  color: #f59e0b;
  font-size: 1.3rem;
}
.tp-table-wrapper {
  border-radius: 12px;
  overflow: hidden;
  border: 1px solid #e2e8f0;
  box-shadow: 0 4px 16px rgba(0,0,0,0.03);
  margin-bottom: 1rem;
}
.tp-table {
  width: 100%;
  border-collapse: collapse;
  font-size: 0.93rem;
  margin-bottom: 0;
}
.tp-table thead th {
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
.tp-table tbody tr:nth-child(even) { background: #f8fafc; }
.tp-table tbody tr:nth-child(odd)  { background: #ffffff; }
.tp-table tbody tr:hover {
  background: #f1f5f9;
  transition: background 0.15s ease;
}
.tp-table tbody td {
  padding: 14px 16px;
  border-bottom: 1px solid #e2e8f0;
  color: #334155;
  vertical-align: middle;
}
.company-badge {
  background: #f1f5f9;
  border: 1px solid #cbd5e1;
  color: #0b2545;
  font-weight: 700;
  font-size: 0.85rem;
  padding: 6px 14px;
  border-radius: 8px;
  display: inline-block;
  margin: 4px;
}
.process-step-card {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 1rem 1.25rem;
  margin-bottom: 0.85rem;
  display: flex;
  align-items: flex-start;
  gap: 14px;
}
.process-step-num {
  width: 32px; height: 32px;
  border-radius: 50%;
  background: #0b2545;
  color: #ffffff;
  font-weight: 800;
  display: flex; align-items: center; justify-content: center;
  font-size: 0.9rem; flex-shrink: 0;
}
</style>

<section class="subpage-main-section tp-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="tp-main-card">

          <!-- Banner Header -->
          <div class="tp-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-briefcase me-1"></i> Career &amp; Campus Placements
              </span>
              <h3 class="fw-bold text-white mb-1 fs-3">TRAINING &amp; PLACEMENT CELL</h3>
              <p class="text-white-50 mb-0 small">Empowering Students with Industry Skills, Career Guidance &amp; Top Corporate Placements</p>
            </div>
          </div>

          <!-- Body Content -->
          <div class="p-4">

            <!-- Stat Chips (Placement 2023-24 Highlights) -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-sm-6 col-md-3">
                <div class="tp-stat-chip">
                  <div class="tp-stat-icon"><i class="fa-solid fa-building-user"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Companies Visited</div>
                    <div class="fw-bold text-dark fs-5">123+</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="tp-stat-chip">
                  <div class="tp-stat-icon"><i class="fa-solid fa-user-check"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Placement Rate</div>
                    <div class="fw-bold text-dark fs-5">82.1 %</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="tp-stat-chip">
                  <div class="tp-stat-icon"><i class="fa-solid fa-trophy"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Highest Package</div>
                    <div class="fw-bold text-dark fs-5">11 LPA</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="tp-stat-chip">
                  <div class="tp-stat-icon"><i class="fa-solid fa-chart-line"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Average Package</div>
                    <div class="fw-bold text-dark fs-5">2.5 LPA</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Committee Roster -->
            <div class="tp-card">
              <div class="tp-card-header">
                <i class="fa-solid fa-users-gear"></i>
                <h5 class="fw-bold text-dark mb-0">Training &amp; Placement Cell Committee</h5>
              </div>
              <div class="tp-table-wrapper">
                <table class="tp-table">
                  <thead>
                    <tr>
                      <th style="width:10%; text-align:center;">S. No.</th>
                      <th style="width:55%;">Name</th>
                      <th style="width:35%;">Post / Role</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td style="text-align:center;"><strong>1</strong></td>
                      <td><strong>Dr. Rashmi Diwedi</strong></td>
                      <td><span class="badge bg-primary px-3 py-1">Head</span></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;"><strong>2</strong></td>
                      <td>Dr. Hemant Sharma</td>
                      <td>Member</td>
                    </tr>
                    <tr>
                      <td style="text-align:center;"><strong>3</strong></td>
                      <td>Dr. Harsh Lohiya</td>
                      <td>Member</td>
                    </tr>
                    <tr>
                      <td style="text-align:center;"><strong>4</strong></td>
                      <td>Mr. Pradeep Maheswari</td>
                      <td>Member</td>
                    </tr>
                    <tr>
                      <td style="text-align:center;"><strong>5</strong></td>
                      <td>Mrs. Priyanka Jhawar</td>
                      <td>Member</td>
                    </tr>
                    <tr>
                      <td style="text-align:center;"><strong>6</strong></td>
                      <td>Dr. Kanchan Shrivastava</td>
                      <td>Member</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <!-- About T&P at SSSUTMS -->
            <div class="tp-card">
              <div class="tp-card-header">
                <i class="fa-solid fa-circle-info"></i>
                <h5 class="fw-bold text-dark mb-0">About T &amp; P at SSSUTMS</h5>
              </div>
              <p class="text-secondary leading-relaxed mb-3" style="line-height: 1.7;">
                The T&amp;P department at SSSUTMS University plays a crucial role in shaping the careers of its students by providing comprehensive support, fostering industry collaborations, and implementing rigorous training programs to equip them with the necessary skills and confidence to succeed in the competitive job market.
              </p>
              <p class="text-secondary leading-relaxed mb-0" style="line-height: 1.7;">
                The Training and Placement Department (T&amp;P) at SSSUTMS University is a dynamic hub dedicated to securing successful career outcomes for students across all disciplines. Renowned for its comprehensive support, the T&amp;P department provides dedicated guidance and resources to empower students to excel in campus placements. The department actively engages with industry leaders, inviting them to the university for recruitment drives. A robust training program, encompassing soft skills, aptitude, and technical expertise, equips students with the confidence and skills necessary to thrive in competitive interview settings. The department offers invaluable career counselling, assisting students in identifying their career paths and areas of specialization.
              </p>
            </div>

            <!-- Objectives of Placement Activities -->
            <div class="tp-card">
              <div class="tp-card-header">
                <i class="fa-solid fa-bullseye"></i>
                <h5 class="fw-bold text-dark mb-0">Objectives of Placement Activities</h5>
              </div>
              <div class="row g-3">
                <div class="col-md-6">
                  <div class="p-3 bg-light rounded border h-100">
                    <h6 class="fw-bold text-primary mb-1">1. Skill Development</h6>
                    <p class="small text-muted mb-0">Enhance both technical and non-technical competencies to make students industry-ready.</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="p-3 bg-light rounded border h-100">
                    <h6 class="fw-bold text-primary mb-1">2. Career Readiness</h6>
                    <p class="small text-muted mb-0">Provide students with insights into job roles, responsibilities, and expectations in their respective engineering fields.</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="p-3 bg-light rounded border h-100">
                    <h6 class="fw-bold text-primary mb-1">3. Industry Connect</h6>
                    <p class="small text-muted mb-0">Build strong relationships with recruiters to ensure robust placement opportunities for students.</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="p-3 bg-light rounded border h-100">
                    <h6 class="fw-bold text-primary mb-1">4. Holistic Growth</h6>
                    <p class="small text-muted mb-0">Develop communication, teamwork, problem-solving, and leadership skills through focused training programs.</p>
                  </div>
                </div>
              </div>
            </div>

            <!-- Phases of Placement Activities & Process Flow -->
            <div class="tp-card">
              <div class="tp-card-header">
                <i class="fa-solid fa-diagram-project"></i>
                <h5 class="fw-bold text-dark mb-0">Phases &amp; Process Flow of Placement Activities</h5>
              </div>
              
              <h6 class="fw-bold text-dark mb-2">Phases of Placement Activities:</h6>
              <div class="mb-4">
                <div class="process-step-card">
                  <div class="process-step-num">1</div>
                  <div>
                    <strong class="text-dark">Pre-Placement Preparation:</strong>
                    <div class="small text-muted mt-1">Technical training (coding, circuit analysis, CAD tools, AWS/MATLAB certifications), aptitude &amp; reasoning development, soft skills enhancement.</div>
                  </div>
                </div>
                <div class="process-step-card">
                  <div class="process-step-num">2</div>
                  <div>
                    <strong class="text-dark">Industry Engagement Programs:</strong>
                    <div class="small text-muted mt-1">Seminars &amp; guest lectures by industry leaders, short-term internships on live projects, and organized industrial visits.</div>
                  </div>
                </div>
                <div class="process-step-card">
                  <div class="process-step-num">3</div>
                  <div>
                    <strong class="text-dark">Placement Drives:</strong>
                    <div class="small text-muted mt-1">On-campus recruitment, pooled campus drives, and off-campus recruitment assistance.</div>
                  </div>
                </div>
              </div>

              <h6 class="fw-bold text-dark mb-2">Placement Process Flow:</h6>
              <ol class="list-group list-group-numbered mb-0">
                <li class="list-group-item d-flex justify-content-between align-items-start border-0 bg-light mb-2 rounded">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold text-dark">Student Registration</div>
                    Students enroll for placement activities through the college&rsquo;s placement portal.
                  </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start border-0 bg-light mb-2 rounded">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold text-dark">Company Orientation</div>
                    Recruiters present their company profile, job roles, and selection criteria.
                  </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start border-0 bg-light mb-2 rounded">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold text-dark">Selection Rounds</div>
                    Aptitude/Technical tests, Group Discussions, Technical Interviews, and HR Interviews.
                  </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start border-0 bg-light rounded">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold text-dark">Offer Rollout</div>
                    Successful candidates receive job offers or internship opportunities.
                  </div>
                </li>
              </ol>
            </div>

            <!-- Top Recruiting Companies & Department Wise Stats -->
            <div class="tp-card mb-0">
              <div class="tp-card-header">
                <i class="fa-solid fa-chart-pie"></i>
                <h5 class="fw-bold text-dark mb-0">Training &amp; Placement Report (Academic Year 2023-2024)</h5>
              </div>

              <h6 class="fw-bold text-dark mb-2">Top Recruiting Companies:</h6>
              <div class="mb-4">
                <span class="company-badge"><i class="fa-solid fa-building me-1 text-primary"></i> HDFC BANK</span>
                <span class="company-badge"><i class="fa-solid fa-building me-1 text-primary"></i> MASTEK LTD.</span>
                <span class="company-badge"><i class="fa-solid fa-building me-1 text-primary"></i> TATA MOTORS</span>
                <span class="company-badge"><i class="fa-solid fa-building me-1 text-primary"></i> WEB OPTIMIZATION SOFTWARE SOLUTION</span>
                <span class="company-badge"><i class="fa-solid fa-building me-1 text-primary"></i> STEEL STRIPS WHEELS LTD.</span>
                <span class="company-badge"><i class="fa-solid fa-building me-1 text-primary"></i> ISC SOFTWARE PVT LTD</span>
                <span class="company-badge"><i class="fa-solid fa-building me-1 text-primary"></i> GROUP BAYPORT</span>
                <span class="company-badge"><i class="fa-solid fa-building me-1 text-primary"></i> NETLINK SOFTWARE PVT. LTD.</span>
                <span class="company-badge"><i class="fa-solid fa-building me-1 text-primary"></i> BUSINESS INFOTECH</span>
                <span class="company-badge"><i class="fa-solid fa-building me-1 text-primary"></i> AXIS BANK</span>
              </div>

              <h6 class="fw-bold text-dark mb-2">Placement Statistics by Department (2023-2024):</h6>
              <div class="tp-table-wrapper">
                <table class="tp-table">
                  <thead>
                    <tr>
                      <th style="width:20%;">Department</th>
                      <th style="width:30%;">Students Placed (%)</th>
                      <th style="width:25%;">Highest Package</th>
                      <th style="width:25%;">Average Package</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr><td><strong>AE</strong></td><td>79%</td><td><span class="badge bg-success">5.2 LPA</span></td><td>2.5 LPA</td></tr>
                    <tr><td><strong>CSE</strong></td><td>77%</td><td><span class="badge bg-success">11 LPA</span></td><td>3.6 LPA</td></tr>
                    <tr><td><strong>CIVIL</strong></td><td>80%</td><td><span class="badge bg-success">4.5 LPA</span></td><td>2.52 LPA</td></tr>
                    <tr><td><strong>CM</strong></td><td>81%</td><td><span class="badge bg-success">4.4 LPA</span></td><td>2.2 LPA</td></tr>
                    <tr><td><strong>EC</strong></td><td>83%</td><td><span class="badge bg-success">3.6 LPA</span></td><td>2.4 LPA</td></tr>
                    <tr><td><strong>EE</strong></td><td>91%</td><td><span class="badge bg-success">5 LPA</span></td><td>3.0 LPA</td></tr>
                    <tr><td><strong>EEE</strong></td><td>87%</td><td><span class="badge bg-success">3.4 LPA</span></td><td>2.8 LPA</td></tr>
                    <tr><td><strong>EI</strong></td><td>73%</td><td><span class="badge bg-success">4.0 LPA</span></td><td>2.5 LPA</td></tr>
                    <tr><td><strong>IT</strong></td><td>85%</td><td><span class="badge bg-success">5.8 LPA</span></td><td>3.0 LPA</td></tr>
                    <tr><td><strong>ME</strong></td><td>89%</td><td><span class="badge bg-success">4.8 LPA</span></td><td>2.5 LPA</td></tr>
                    <tr><td><strong>MI</strong></td><td>67%</td><td><span class="badge bg-success">5.4 LPA</span></td><td>3.72 LPA</td></tr>
                    <tr><td><strong>MBA</strong></td><td>93%</td><td><span class="badge bg-success">5.6 LPA</span></td><td>3.5 LPA</td></tr>
                  </tbody>
                </table>
              </div>
            </div>

          </div>
        </div><!-- end tp-main-card -->
      </div><!-- end col-lg-8 -->

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>