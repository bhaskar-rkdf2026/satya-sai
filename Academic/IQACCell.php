<?php
$page_title = 'IQAC Cell - Sri Satya Sai University of Technology & Medical Sciences';
$banner_title = 'Internal Quality Assurance Cell (IQAC)';
$banner_category = 'Academic';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?>

<style>
.iqac-section {
  background-color: #f8fafc;
}
.iqac-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15,23,42,0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}
.iqac-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2.5rem 2rem;
  position: relative;
}
.iqac-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.iqac-nav-pills {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
  padding: 12px 18px;
  background: #f1f5f9;
  border-bottom: 1px solid #e2e8f0;
}
.iqac-nav-pill {
  font-size: 0.82rem;
  font-weight: 600;
  color: #334155;
  background: #ffffff;
  border: 1px solid #cbd5e1;
  padding: 6px 14px;
  border-radius: 20px;
  text-decoration: none !important;
  transition: all 0.2s ease;
  display: inline-flex;
  align-items: center;
  gap: 6px;
}
.iqac-nav-pill:hover {
  background: #0b2545;
  color: #ffffff !important;
  border-color: #0b2545;
  transform: translateY(-1px);
}
.iqac-stat-chip {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 16px 14px;
  display: flex; align-items: center; gap: 12px;
  height: 100%;
  transition: all 0.25s ease;
  box-shadow: 0 4px 12px rgba(0,0,0,0.02);
}
.iqac-stat-chip:hover {
  border-color: #cbd5e1;
  box-shadow: 0 6px 18px rgba(11,37,69,0.07);
  transform: translateY(-2px);
}
.iqac-stat-icon {
  width: 48px; height: 48px;
  border-radius: 12px;
  background: rgba(245,158,11,0.12);
  color: #d97706;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.35rem; flex-shrink: 0;
}
.iqac-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 16px;
  padding: 1.6rem;
  box-shadow: 0 4px 16px rgba(0,0,0,0.02);
  margin-bottom: 1.75rem;
  scroll-margin-top: 90px;
}
.iqac-card-header {
  display: flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 1.25rem;
  padding-bottom: 0.85rem;
  border-bottom: 2px solid #f1f5f9;
}
.iqac-card-header i {
  color: #f59e0b;
  font-size: 1.3rem;
}
.iqac-list-icon {
  color: #d97706;
  font-size: 0.85rem;
  margin-right: 8px;
  flex-shrink: 0;
  margin-top: 4px;
}
.iqac-table-wrapper {
  border-radius: 12px;
  overflow-x: auto;
  border: 1px solid #e2e8f0;
  box-shadow: 0 4px 16px rgba(0,0,0,0.03);
  margin-bottom: 1rem;
}
.iqac-table {
  width: 100%;
  border-collapse: collapse;
  font-size: 0.93rem;
  margin-bottom: 0;
}
.iqac-table thead th {
  background: #0b2545;
  color: #ffffff;
  font-weight: 600;
  padding: 14px 16px;
  border: none;
  text-align: left;
  font-size: 0.88rem;
  letter-spacing: 0.03em;
  text-transform: uppercase;
}
.iqac-table tbody tr:nth-child(even) { background: #f8fafc; }
.iqac-table tbody tr:nth-child(odd)  { background: #ffffff; }
.iqac-table tbody tr:hover {
  background: #f1f5f9;
  transition: background 0.15s ease;
}
.iqac-table tbody td {
  padding: 13px 16px;
  border-bottom: 1px solid #e2e8f0;
  color: #334155;
  vertical-align: middle;
}
.iqac-download-btn {
  background: linear-gradient(135deg, #0b2545 0%, #1e4d8c 100%) !important;
  color: #ffffff !important;
  font-size: 0.82rem;
  font-weight: 700;
  padding: 6px 14px;
  border-radius: 8px;
  border: 1px solid rgba(245,158,11,0.35);
  text-decoration: none !important;
  display: inline-flex;
  align-items: center;
  gap: 7px;
  white-space: nowrap;
  box-shadow: 0 2px 6px rgba(11,37,69,0.12);
  transition: all 0.2s ease;
}
.iqac-download-btn i {
  color: #fbbf24 !important;
}
.iqac-download-btn:hover {
  background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%) !important;
  color: #ffffff !important;
  border-color: #d97706;
  box-shadow: 0 4px 12px rgba(217,119,6,0.3);
  transform: translateY(-1px);
}
.naac-link-chip {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 13px 16px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  text-decoration: none !important;
  color: #0b2545;
  font-weight: 600;
  font-size: 0.9rem;
  transition: all 0.2s ease;
}
.naac-link-chip:hover {
  border-color: #d97706;
  background: #fdf8f0;
  color: #d97706;
  transform: translateY(-2px);
  box-shadow: 0 4px 12px rgba(217,119,6,0.12);
}
.outcome-badge-card {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 14px 16px;
  display: flex;
  align-items: center;
  gap: 12px;
  height: 100%;
  transition: all 0.2s ease;
}
.outcome-badge-card:hover {
  background: #ffffff;
  border-color: #d97706;
  box-shadow: 0 4px 12px rgba(11,37,69,0.06);
  transform: translateY(-2px);
}
.outcome-icon {
  width: 36px;
  height: 36px;
  border-radius: 8px;
  background: rgba(11,37,69,0.08);
  color: #0b2545;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1rem;
  flex-shrink: 0;
}
.outcome-badge-card:hover .outcome-icon {
  background: rgba(245,158,11,0.15);
  color: #d97706;
}
.sop-step-box {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 14px 18px;
  margin-bottom: 12px;
  display: flex;
  align-items: flex-start;
  gap: 14px;
  transition: all 0.2s ease;
}
.sop-step-box:hover {
  border-color: #cbd5e1;
  box-shadow: 0 4px 12px rgba(0,0,0,0.03);
}
.sop-number {
  width: 30px;
  height: 30px;
  border-radius: 50%;
  background: #0b2545;
  color: #ffffff;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 0.85rem;
  font-weight: 700;
  flex-shrink: 0;
  margin-top: 2px;
}
.sop-step-box:hover .sop-number {
  background: #d97706;
}
.user-avatar-sm {
  width: 34px;
  height: 34px;
  border-radius: 50%;
  object-fit: cover;
  flex-shrink: 0;
}
</style>

<section class="subpage-main-section iqac-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="iqac-main-card">

          <!-- Banner Header -->
          <div class="iqac-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-award me-1"></i> Quality Assurance &amp; NAAC Sustenance
              </span>
              <h3 class="fw-bold text-white mb-1 fs-3">INTERNAL QUALITY ASSURANCE CELL (IQAC)</h3>
              <p class="text-white-50 mb-0 small">Established on 8th Oct 2018 at Sri Satya Sai University of Technology &amp; Medical Sciences, Sehore (MP)</p>
            </div>
          </div>

          <!-- Quick Navigation Bar -->
          <div class="iqac-nav-pills">
            <a href="#about" class="iqac-nav-pill"><i class="fa-solid fa-circle-info"></i> About</a>
            <a href="#vision-policy" class="iqac-nav-pill"><i class="fa-solid fa-eye"></i> Vision &amp; Policy</a>
            <a href="#objectives" class="iqac-nav-pill"><i class="fa-solid fa-bullseye"></i> Objectives</a>
            <a href="#strategies" class="iqac-nav-pill"><i class="fa-solid fa-chess-knight"></i> Strategies</a>
            <a href="#functions" class="iqac-nav-pill"><i class="fa-solid fa-gears"></i> Functions</a>
            <a href="#benefits" class="iqac-nav-pill"><i class="fa-solid fa-hand-holding-heart"></i> Benefits</a>
            <a href="#outcomes" class="iqac-nav-pill"><i class="fa-solid fa-chart-line"></i> Outcomes</a>
            <a href="#constitution" class="iqac-nav-pill"><i class="fa-solid fa-users"></i> Constitution</a>
            <a href="#sop" class="iqac-nav-pill"><i class="fa-solid fa-file-lines"></i> SOP</a>
            <a href="#minutes" class="iqac-nav-pill"><i class="fa-solid fa-file-pdf"></i> Minutes (2018-24)</a>
            <a href="#naac-ssr" class="iqac-nav-pill"><i class="fa-solid fa-layer-group"></i> NAAC SSR</a>
          </div>

          <!-- Body Content -->
          <div class="p-4">

            <!-- Stat Chips -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-sm-6 col-md-3">
                <div class="iqac-stat-chip">
                  <div class="iqac-stat-icon"><i class="fa-solid fa-calendar-check"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Established</div>
                    <div class="fw-bold text-dark fs-6">8th Oct 2018</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="iqac-stat-chip">
                  <div class="iqac-stat-icon"><i class="fa-solid fa-shield-halved"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Framework</div>
                    <div class="fw-bold text-dark fs-6">NAAC Guidelines</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="iqac-stat-chip">
                  <div class="iqac-stat-icon"><i class="fa-solid fa-square-poll-vertical"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Audit</div>
                    <div class="fw-bold text-dark fs-6">Academic &amp; Admin</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="iqac-stat-chip">
                  <div class="iqac-stat-icon"><i class="fa-solid fa-file-contract"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Reports</div>
                    <div class="fw-bold text-dark fs-6">AQAR &amp; NIRF</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- About IQAC -->
            <div class="iqac-card" id="about">
              <div class="iqac-card-header">
                <i class="fa-solid fa-circle-info"></i>
                <h5 class="fw-bold text-dark mb-0">About Internal Quality Assurance Cell (IQAC)</h5>
              </div>
              <p class="text-secondary leading-relaxed mb-0" style="line-height: 1.8;">
                The Internal Quality Assurance Cell (IQAC) was established in 8<sup>th</sup> Oct 2018 at Sri Satya Sai University of Technology &amp; Medical Science, Sehore (MP) as a accreditation quality sustenance measure. The IQAC has been constituted as per the recommendations of the National Assessment and Accreditation Council (NAAC). The IQAC ensures the effective implementation of quality initiatives through continuous reviews and periodic meetings. The IQAC works towards attaining excellence in all academic and administrative endeavors of the institution.
              </p>
            </div>

            <!-- Vision & Quality Policy Grid -->
            <div class="row g-4 mb-4" id="vision-policy">
              <div class="col-md-6">
                <div class="iqac-card h-100 mb-0">
                  <div class="iqac-card-header">
                    <i class="fa-solid fa-eye"></i>
                    <h5 class="fw-bold text-dark mb-0">Vision</h5>
                  </div>
                  <p class="text-secondary small mb-0" style="line-height: 1.7;">
                    To ensure quality culture as the prime concern for Sri Satya Sai University of Technology &amp; Medical Science, Sehore (MP) through institutionalizing and internalizing all the initiatives taken with internal and external support.
                  </p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="iqac-card h-100 mb-0">
                  <div class="iqac-card-header">
                    <i class="fa-solid fa-bullseye"></i>
                    <h5 class="fw-bold text-dark mb-0">Quality Policy</h5>
                  </div>
                  <p class="text-secondary small mb-0" style="line-height: 1.7;">
                    To establish a system of Quality Enhancement, which would on a continuous basis evaluate and enhance the quality of teaching &ndash; learning, research and extension activities of the institution, leading to improvements in all processes, enabling the institution to attain excellence.
                  </p>
                </div>
              </div>
            </div>

            <!-- Objectives of IQAC -->
            <div class="iqac-card" id="objectives">
              <div class="iqac-card-header">
                <i class="fa-solid fa-bullseye"></i>
                <h5 class="fw-bold text-dark mb-0">Objectives</h5>
              </div>
              <ul class="list-unstyled text-secondary small mb-0 ms-1" style="line-height: 1.8;">
                <li class="mb-2 d-flex align-items-start">
                  <i class="fa-solid fa-circle-check iqac-list-icon"></i>
                  <span>To develop a system for conscious, consistent and catalytic action to improve the academic and administrative performance of the institution.</span>
                </li>
                <li class="mb-0 d-flex align-items-start">
                  <i class="fa-solid fa-circle-check iqac-list-icon"></i>
                  <span>To promote measures for institutional functioning towards quality enhancement through internalization of quality culture and institutionalization of best practices.</span>
                </li>
              </ul>
            </div>

            <!-- Strategies of IQAC -->
            <div class="iqac-card" id="strategies">
              <div class="iqac-card-header">
                <i class="fa-solid fa-chess-knight"></i>
                <h5 class="fw-bold text-dark mb-0">Strategies</h5>
              </div>
              <p class="text-dark fw-bold small mb-2">Shall evolve mechanisms and procedures for:</p>
              <ul class="list-unstyled text-secondary small mb-0 ms-1" style="line-height: 1.8;">
                <li class="mb-2 d-flex align-items-start">
                  <i class="fa-solid fa-circle-dot iqac-list-icon"></i>
                  <span>Ensuring timely, efficient and progressive performance of academic, administrative and financial tasks</span>
                </li>
                <li class="mb-2 d-flex align-items-start">
                  <i class="fa-solid fa-circle-dot iqac-list-icon"></i>
                  <span>Relevant and quality academic/ research programmes</span>
                </li>
                <li class="mb-2 d-flex align-items-start">
                  <i class="fa-solid fa-circle-dot iqac-list-icon"></i>
                  <span>Equitable access to and affordability of academic programmes for various sections of society</span>
                </li>
                <li class="mb-2 d-flex align-items-start">
                  <i class="fa-solid fa-circle-dot iqac-list-icon"></i>
                  <span>Optimization and integration of modern methods of teaching and learning</span>
                </li>
                <li class="mb-2 d-flex align-items-start">
                  <i class="fa-solid fa-circle-dot iqac-list-icon"></i>
                  <span>The credibility of assessment and evaluation process</span>
                </li>
                <li class="mb-2 d-flex align-items-start">
                  <i class="fa-solid fa-circle-dot iqac-list-icon"></i>
                  <span>Ensuring the adequacy, maintenance and proper allocation of support structure and services best</span>
                </li>
                <li class="mb-0 d-flex align-items-start">
                  <i class="fa-solid fa-circle-dot iqac-list-icon"></i>
                  <span>Sharing of research findings and networking with other institutions in India and abroad</span>
                </li>
              </ul>
            </div>

            <!-- Functions of IQAC -->
            <div class="iqac-card" id="functions">
              <div class="iqac-card-header">
                <i class="fa-solid fa-gears"></i>
                <h5 class="fw-bold text-dark mb-0">Functions</h5>
              </div>
              <p class="text-dark fw-bold small mb-3"><u>Some of the functions expected of the IQAC are:</u></p>
              <ul class="list-unstyled text-secondary small mb-0 ms-1" style="line-height: 1.8;">
                <li class="mb-2 d-flex align-items-start">
                  <i class="fa-solid fa-angle-right iqac-list-icon"></i>
                  <span>Development and application of quality benchmarks</span>
                </li>
                <li class="mb-2 d-flex align-items-start">
                  <i class="fa-solid fa-angle-right iqac-list-icon"></i>
                  <span>Parameters for various academic and administrative activities of the institution;</span>
                </li>
                <li class="mb-2 d-flex align-items-start">
                  <i class="fa-solid fa-angle-right iqac-list-icon"></i>
                  <span>Facilitating the creation of a learner-centric environment conducive to quality education and faculty maturation to adopt the required knowledge and technology for participatory teaching and learning process;</span>
                </li>
                <li class="mb-2 d-flex align-items-start">
                  <i class="fa-solid fa-angle-right iqac-list-icon"></i>
                  <span>Collection and analysis of feedback from all stakeholders on quality-related institutional processes; Dissemination of information on various quality parameters to all stakeholders;</span>
                </li>
                <li class="mb-2 d-flex align-items-start">
                  <i class="fa-solid fa-angle-right iqac-list-icon"></i>
                  <span>Organization of inter and intra institutional workshops, seminars on quality related themes and promotion of quality circles;</span>
                </li>
                <li class="mb-2 d-flex align-items-start">
                  <i class="fa-solid fa-angle-right iqac-list-icon"></i>
                  <span>Documentation of the various programmes/activities leading to quality improvement;</span>
                </li>
                <li class="mb-2 d-flex align-items-start">
                  <i class="fa-solid fa-angle-right iqac-list-icon"></i>
                  <span>Acting as a nodal agency of the Institution for coordinating quality-related activities, including adoption and dissemination of best practices;</span>
                </li>
                <li class="mb-2 d-flex align-items-start">
                  <i class="fa-solid fa-angle-right iqac-list-icon"></i>
                  <span>Development and maintenance of institutional database through MIS for the purpose of maintaining /enhancing the institutional quality;</span>
                </li>
                <li class="mb-2 d-flex align-items-start">
                  <i class="fa-solid fa-angle-right iqac-list-icon"></i>
                  <span>Periodical conduct of Academic and Administrative Audit and its follow-up</span>
                </li>
                <li class="mb-0 d-flex align-items-start">
                  <i class="fa-solid fa-angle-right iqac-list-icon"></i>
                  <span>Preparation and submission of the Annual Quality Assurance Report (AQAR) as per guidelines and parameters of NAAC.</span>
                </li>
              </ul>
            </div>

            <!-- Benefits / Facilitation -->
            <div class="iqac-card" id="benefits">
              <div class="iqac-card-header">
                <i class="fa-solid fa-hand-holding-heart"></i>
                <h5 class="fw-bold text-dark mb-0">Benefits</h5>
              </div>
              <p class="text-dark fw-bold small mb-3"><u>Will facilitate / contribute to:</u></p>
              <div class="row g-3">
                <div class="col-md-6">
                  <div class="p-3 border rounded-3 bg-light h-100">
                    <i class="fa-solid fa-circle-check text-primary me-2"></i>
                    <span class="text-secondary small">Ensure clarity and focus in institutional functioning towards quality enhancement</span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="p-3 border rounded-3 bg-light h-100">
                    <i class="fa-solid fa-circle-check text-primary me-2"></i>
                    <span class="text-secondary small">Ensure internalization of the quality culture</span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="p-3 border rounded-3 bg-light h-100">
                    <i class="fa-solid fa-circle-check text-primary me-2"></i>
                    <span class="text-secondary small">Ensure enhancement and coordination among various activities of the institution and institutionalize all good practices</span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="p-3 border rounded-3 bg-light h-100">
                    <i class="fa-solid fa-circle-check text-primary me-2"></i>
                    <span class="text-secondary small">Provide a sound basis for decision-making to improve institutional functioning</span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="p-3 border rounded-3 bg-light h-100">
                    <i class="fa-solid fa-circle-check text-primary me-2"></i>
                    <span class="text-secondary small">Act as a dynamic system for quality changes in HEIs</span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="p-3 border rounded-3 bg-light h-100">
                    <i class="fa-solid fa-circle-check text-primary me-2"></i>
                    <span class="text-secondary small">Build an organised methodology of documentation and internal communication</span>
                  </div>
                </div>
              </div>
            </div>

            <!-- Outcomes of IQAC Activities at SSSUTSM -->
            <div class="iqac-card" id="outcomes">
              <div class="iqac-card-header">
                <i class="fa-solid fa-chart-line"></i>
                <h5 class="fw-bold text-dark mb-0">Outcomes of IQAC Activities at SSSUTSM</h5>
              </div>
              <div class="row g-3">
                <div class="col-sm-6 col-md-6 col-lg-3">
                  <div class="outcome-badge-card">
                    <div class="outcome-icon"><i class="fa-solid fa-award"></i></div>
                    <div class="text-dark fw-bold small">NAAC Accreditation</div>
                  </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                  <div class="outcome-badge-card">
                    <div class="outcome-icon"><i class="fa-solid fa-ranking-star"></i></div>
                    <div class="text-dark fw-bold small">Ranking by NIRF</div>
                  </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                  <div class="outcome-badge-card">
                    <div class="outcome-icon"><i class="fa-solid fa-file-invoice"></i></div>
                    <div class="text-dark fw-bold small">Annual reports of the University</div>
                  </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                  <div class="outcome-badge-card">
                    <div class="outcome-icon"><i class="fa-solid fa-arrow-trend-up"></i></div>
                    <div class="text-dark fw-bold small">Continous improvement in activities</div>
                  </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                  <div class="outcome-badge-card">
                    <div class="outcome-icon"><i class="fa-solid fa-comments"></i></div>
                    <div class="text-dark fw-bold small">Stakeholder Feedback Analysis</div>
                  </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                  <div class="outcome-badge-card">
                    <div class="outcome-icon"><i class="fa-solid fa-building-columns"></i></div>
                    <div class="text-dark fw-bold small">MHRD AISHE Survey</div>
                  </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                  <div class="outcome-badge-card">
                    <div class="outcome-icon"><i class="fa-solid fa-hand-sparkles"></i></div>
                    <div class="text-dark fw-bold small">Swachh Bharat Internship</div>
                  </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                  <div class="outcome-badge-card">
                    <div class="outcome-icon"><i class="fa-solid fa-trophy"></i></div>
                    <div class="text-dark fw-bold small">Swachhta Ranking</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Constitution of IQAC Cell Table -->
            <div class="iqac-card" id="constitution">
              <div class="iqac-card-header">
                <i class="fa-solid fa-users-gear"></i>
                <h5 class="fw-bold text-dark mb-0">Constitution of IQAC Cell</h5>
              </div>
              <div class="iqac-table-wrapper">
                <table class="iqac-table">
                  <thead>
                    <tr>
                      <th style="width:8%; text-align:center;">S. No.</th>
                      <th style="width:42%;">Name</th>
                      <th style="width:30%;">Designation</th>
                      <th style="width:20%;">Post</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td style="text-align:center;"><strong>1</strong></td>
                      <td>
                        <div class="d-flex align-items-center gap-2">
                          <img src="<?php echo BASE_URL; ?>assets/images/dummy-avatar.svg" alt="Prof. Mukesh Tiwari" class="user-avatar-sm" />
                          <strong>Prof. Mukesh Tiwari</strong>
                        </div>
                      </td>
                      <td>Vice-Chancellor</td>
                      <td><span class="badge bg-primary px-3 py-1">Chairperson</span></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;"><strong>2</strong></td>
                      <td>
                        <div class="d-flex align-items-center gap-2">
                          <img src="<?php echo BASE_URL; ?>assets/images/dummy-avatar.svg" alt="Prof. Hemant Sharma" class="user-avatar-sm" />
                          <span>Prof. Hemant Sharma</span>
                        </div>
                      </td>
                      <td>Professor</td>
                      <td><span class="badge bg-light text-dark border">Member</span></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;"><strong>3</strong></td>
                      <td>
                        <div class="d-flex align-items-center gap-2">
                          <img src="<?php echo BASE_URL; ?>assets/images/dummy-avatar.svg" alt="Prof. Sanjay Rathor" class="user-avatar-sm" />
                          <span>Prof. Sanjay Rathor</span>
                        </div>
                      </td>
                      <td>Professor</td>
                      <td><span class="badge bg-light text-dark border">Member</span></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;"><strong>4</strong></td>
                      <td>
                        <div class="d-flex align-items-center gap-2">
                          <img src="<?php echo BASE_URL; ?>assets/images/dummy-avatar.svg" alt="Prof. S.B. Tambe" class="user-avatar-sm" />
                          <span>Prof. S.B. Tambe</span>
                        </div>
                      </td>
                      <td>Professor</td>
                      <td><span class="badge bg-light text-dark border">Member</span></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;"><strong>5</strong></td>
                      <td>
                        <div class="d-flex align-items-center gap-2">
                          <img src="<?php echo BASE_URL; ?>assets/images/dummy-avatar.svg" alt="Prof. A.K. Dubey" class="user-avatar-sm" />
                          <span>Prof. A.K. Dubey</span>
                        </div>
                      </td>
                      <td>Professor</td>
                      <td><span class="badge bg-light text-dark border">Member</span></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;"><strong>6</strong></td>
                      <td>
                        <div class="d-flex align-items-center gap-2">
                          <img src="<?php echo BASE_URL; ?>assets/images/dummy-avatar.svg" alt="Prof. Tabhessum Khan" class="user-avatar-sm" />
                          <span>Prof. Tabhessum Khan</span>
                        </div>
                      </td>
                      <td>Professor</td>
                      <td><span class="badge bg-light text-dark border">Member</span></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;"><strong>7</strong></td>
                      <td>
                        <div class="d-flex align-items-center gap-2">
                          <img src="<?php echo BASE_URL; ?>assets/images/dummy-avatar.svg" alt="Prof. C.K. Tyagi" class="user-avatar-sm" />
                          <span>Prof. C.K. Tyagi</span>
                        </div>
                      </td>
                      <td>Professor</td>
                      <td><span class="badge bg-light text-dark border">Member</span></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;"><strong>8</strong></td>
                      <td>
                        <div class="d-flex align-items-center gap-2">
                          <img src="<?php echo BASE_URL; ?>assets/images/dummy-avatar.svg" alt="Prof. Priyanka Jhawar" class="user-avatar-sm" />
                          <span>Prof. Priyanka Jhawar</span>
                        </div>
                      </td>
                      <td>Professor</td>
                      <td><span class="badge bg-light text-dark border">Member</span></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;"><strong>9</strong></td>
                      <td>
                        <div class="d-flex align-items-center gap-2">
                          <img src="<?php echo BASE_URL; ?>assets/images/dummy-avatar.svg" alt="Prof. Minakshi Pathak" class="user-avatar-sm" />
                          <span>Prof. Minakshi Pathak</span>
                        </div>
                      </td>
                      <td>Professor</td>
                      <td><span class="badge bg-light text-dark border">Member</span></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;"><strong>10</strong></td>
                      <td>
                        <div class="d-flex align-items-center gap-2">
                          <img src="<?php echo BASE_URL; ?>assets/images/dummy-avatar.svg" alt="Prof. Manoj Singh Raghuwanshi" class="user-avatar-sm" />
                          <span>Prof. Manoj Singh Raghuwanshi</span>
                        </div>
                      </td>
                      <td>Professor</td>
                      <td><span class="badge bg-light text-dark border">Member</span></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;"><strong>11</strong></td>
                      <td>
                        <div class="d-flex align-items-center gap-2">
                          <img src="<?php echo BASE_URL; ?>assets/images/dummy-avatar.svg" alt="Prof. Dheeraj Agarwal" class="user-avatar-sm" />
                          <span>Prof. Dheeraj Agarwal</span>
                        </div>
                      </td>
                      <td>External Member</td>
                      <td><span class="badge bg-light text-dark border">Member</span></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;"><strong>12</strong></td>
                      <td>
                        <div class="d-flex align-items-center gap-2">
                          <img src="<?php echo BASE_URL; ?>assets/images/dummy-avatar.svg" alt="Mr. Anil Kumar" class="user-avatar-sm" />
                          <span>Mr. Anil Kumar</span>
                        </div>
                      </td>
                      <td>External Member</td>
                      <td><span class="badge bg-light text-dark border">Member</span></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;"><strong>13</strong></td>
                      <td>
                        <div class="d-flex align-items-center gap-2">
                          <img src="<?php echo BASE_URL; ?>assets/images/dummy-avatar.svg" alt="Prof. Manoj Shukla" class="user-avatar-sm" />
                          <span>Prof. Manoj Shukla</span>
                        </div>
                      </td>
                      <td>External Member</td>
                      <td><span class="badge bg-light text-dark border">Member</span></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;"><strong>14</strong></td>
                      <td>
                        <div class="d-flex align-items-center gap-2">
                          <img src="<?php echo BASE_URL; ?>assets/images/dummy-avatar.svg" alt="Prof. Rajendra Singh Kushwah" class="user-avatar-sm" />
                          <strong>Prof. Rajendra Singh Kushwah</strong>
                        </div>
                      </td>
                      <td>Professor &amp; Director IQAC</td>
                      <td><span class="badge bg-warning text-dark px-3 py-1">Member Secretary</span></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <!-- Standard Operation Procedures (SOP) -->
            <div class="iqac-card" id="sop">
              <div class="iqac-card-header">
                <i class="fa-solid fa-file-shield"></i>
                <h5 class="fw-bold text-dark mb-0">Standard Operation Procedures (SOP)</h5>
              </div>

              <div class="sop-step-box">
                <div class="sop-number">1</div>
                <div class="text-secondary small">The tenure of IQAC will be for a continuous period of 2 years from the date of appointment.</div>
              </div>

              <div class="sop-step-box">
                <div class="sop-number">2</div>
                <div class="text-secondary small">The Meeting of the IQAC will be conducted quarterly. The quorum for the meeting shall be two-third of the total number of members. Additional meetings may be held as and when required.</div>
              </div>

              <div class="sop-step-box">
                <div class="sop-number">3</div>
                <div class="text-secondary small">Director/Secretary in consultation with the chairperson will decide the agenda and send communication to all members. The date, time, venue and agenda of the meeting will be communicated to the members at least one week in advance.</div>
              </div>

              <div class="sop-step-box">
                <div class="sop-number">4</div>
                <div class="text-secondary small">Minutes of the meeting will be uploaded to institutional website also.</div>
              </div>

              <div class="sop-step-box">
                <div class="sop-number">5</div>
                <div class="text-secondary small">The agenda, minutes and action taken reports will be documented in hard and soft copy formats.</div>
              </div>

              <div class="sop-step-box">
                <div class="sop-number">6</div>
                <div class="text-secondary small">Academic and Administrative audits will be done after completion of the academic year. The Schedule of the audit will be finalized by the Chairperson after discussion with the members during the IQAC meeting. Audit reports submitted by the auditors will be sent to the departments for corrective action.</div>
              </div>

              <div class="sop-step-box">
                <div class="sop-number">7</div>
                <div class="text-secondary small">AQAR will be prepared and discussed during the IQAC meeting. Finalized AQAR will be placed before College Council for the approval and the approved AQAR will be submitted to the NAAC after Cycle 1 of accreditation.</div>
              </div>

              <div class="sop-step-box">
                <div class="sop-number">8</div>
                <div class="text-secondary small">
                  <div class="fw-bold text-dark mb-2">The composition of IQAC shall be as follows:</div>
                  <ul class="list-unstyled mb-0 ms-1" style="line-height: 1.7;">
                    <li class="mb-1"><i class="fa-solid fa-chevron-right text-warning me-2"></i><strong>Chairperson:</strong> Head of the Institution</li>
                    <li class="mb-1"><i class="fa-solid fa-chevron-right text-warning me-2"></i>Teachers to represent all level (Three to eight)</li>
                    <li class="mb-1"><i class="fa-solid fa-chevron-right text-warning me-2"></i>One member from the Management</li>
                    <li class="mb-1"><i class="fa-solid fa-chevron-right text-warning me-2"></i>Few senior administrative officers</li>
                    <li class="mb-1"><i class="fa-solid fa-chevron-right text-warning me-2"></i>One nominee each from local society, Students, and Alumni</li>
                    <li class="mb-1"><i class="fa-solid fa-chevron-right text-warning me-2"></i>One nominee each from Employers/Industrialists/Stakeholders</li>
                    <li class="mb-0"><i class="fa-solid fa-chevron-right text-warning me-2"></i>One of the senior teachers as the coordinator/Director of the IQAC</li>
                  </ul>
                </div>
              </div>
            </div>

            <!-- IQAC Meeting Minutes & Reports (2018 - 2024) -->
            <div class="iqac-card" id="minutes">
              <div class="iqac-card-header">
                <i class="fa-solid fa-file-pdf"></i>
                <h5 class="fw-bold text-dark mb-0">Minutes of the Meeting Internal Quality Assurance Cell (IQAC)</h5>
              </div>
              <p class="text-secondary small mb-3">Official records of all IQAC Meetings and Action Taken Reports (2018 to 2024):</p>
              
              <div class="iqac-table-wrapper">
                <table class="iqac-table">
                  <thead>
                    <tr>
                      <th style="width:15%; text-align:center;">Year</th>
                      <th style="width:55%;">Minutes of Meeting / Date</th>
                      <th style="width:30%; text-align:center;">Download Document</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- 2024 -->
                    <tr>
                      <td style="text-align:center; vertical-align:middle;"><span class="badge bg-primary fs-6 px-3 py-1">2024</span></td>
                      <td><strong>IQAC Meeting (28 Feb 2024)</strong></td>
                      <td style="text-align:center;">
                        <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/SSSUTMS_IQAC_Meeting_28_Feb_2024.pdf" target="_blank" rel="noopener" class="iqac-download-btn">
                          <i class="fa-solid fa-file-arrow-down"></i> Download PDF
                        </a>
                      </td>
                    </tr>

                    <!-- 2023 -->
                    <tr>
                      <td rowspan="4" style="text-align:center; vertical-align:middle; background:#f8fafc;"><span class="badge bg-dark fs-6 px-3 py-1">2023</span></td>
                      <td><strong>IQAC Meeting (09 Dec 2023)</strong></td>
                      <td style="text-align:center;">
                        <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/IQAC_MEETING_2023_09_Dec.pdf" target="_blank" rel="noopener" class="iqac-download-btn">
                          <i class="fa-solid fa-file-arrow-down"></i> Download PDF
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>IQAC Minutes of Meeting (20 Sep 2023)</strong></td>
                      <td style="text-align:center;">
                        <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/IQAC_Minutes_of_Meeting_20_September_2023.pdf" target="_blank" rel="noopener" class="iqac-download-btn">
                          <i class="fa-solid fa-file-arrow-down"></i> Download PDF
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>IQAC Minutes of Meeting (12 May 2023)</strong></td>
                      <td style="text-align:center;">
                        <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/IQAC_Minutes_of_Meeting_12_May_23.pdf" target="_blank" rel="noopener" class="iqac-download-btn">
                          <i class="fa-solid fa-file-arrow-down"></i> Download PDF
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>IQAC Minutes of Meeting (28 Feb 2023)</strong></td>
                      <td style="text-align:center;">
                        <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/M19_28_Feb_2023.pdf" target="_blank" rel="noopener" class="iqac-download-btn">
                          <i class="fa-solid fa-file-arrow-down"></i> Download PDF
                        </a>
                      </td>
                    </tr>

                    <!-- 2022 -->
                    <tr>
                      <td rowspan="4" style="text-align:center; vertical-align:middle; background:#f8fafc;"><span class="badge bg-secondary fs-6 px-3 py-1">2022</span></td>
                      <td><strong>IQAC Minutes of Meeting (30 Nov 2022)</strong></td>
                      <td style="text-align:center;">
                        <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/M18_30_Nov_2022.pdf" target="_blank" rel="noopener" class="iqac-download-btn">
                          <i class="fa-solid fa-file-arrow-down"></i> Download PDF
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>IQAC Minutes of Meeting (20 Aug 2022)</strong></td>
                      <td style="text-align:center;">
                        <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/M17_20_Aug_2022.pdf" target="_blank" rel="noopener" class="iqac-download-btn">
                          <i class="fa-solid fa-file-arrow-down"></i> Download PDF
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>IQAC Minutes of Meeting (07 May 2022)</strong></td>
                      <td style="text-align:center;">
                        <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/M16_07_May_2022.pdf" target="_blank" rel="noopener" class="iqac-download-btn">
                          <i class="fa-solid fa-file-arrow-down"></i> Download PDF
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>IQAC Minutes of Meeting (19 Feb 2022)</strong></td>
                      <td style="text-align:center;">
                        <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/M15_19_Feb_2022.pdf" target="_blank" rel="noopener" class="iqac-download-btn">
                          <i class="fa-solid fa-file-arrow-down"></i> Download PDF
                        </a>
                      </td>
                    </tr>

                    <!-- 2021 -->
                    <tr>
                      <td rowspan="4" style="text-align:center; vertical-align:middle; background:#f8fafc;"><span class="badge bg-secondary fs-6 px-3 py-1">2021</span></td>
                      <td><strong>IQAC Minutes of Meeting (04 Oct 2021)</strong></td>
                      <td style="text-align:center;">
                        <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/M14_04_Oct_2021.pdf" target="_blank" rel="noopener" class="iqac-download-btn">
                          <i class="fa-solid fa-file-arrow-down"></i> Download PDF
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>IQAC Minutes of Meeting (09 Jun 2021)</strong></td>
                      <td style="text-align:center;">
                        <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/M13_09_Jun_2021.pdf" target="_blank" rel="noopener" class="iqac-download-btn">
                          <i class="fa-solid fa-file-arrow-down"></i> Download PDF
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>IQAC Minutes of Meeting (05 Apr 2021)</strong></td>
                      <td style="text-align:center;">
                        <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/M12_05_Apr_2021.pdf" target="_blank" rel="noopener" class="iqac-download-btn">
                          <i class="fa-solid fa-file-arrow-down"></i> Download PDF
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>IQAC Minutes of Meeting (08 Feb 2021)</strong></td>
                      <td style="text-align:center;">
                        <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/M11_08_Feb_2021.pdf" target="_blank" rel="noopener" class="iqac-download-btn">
                          <i class="fa-solid fa-file-arrow-down"></i> Download PDF
                        </a>
                      </td>
                    </tr>

                    <!-- 2020 -->
                    <tr>
                      <td rowspan="4" style="text-align:center; vertical-align:middle; background:#f8fafc;"><span class="badge bg-secondary fs-6 px-3 py-1">2020</span></td>
                      <td><strong>IQAC Minutes of Meeting (21 Dec 2020)</strong></td>
                      <td style="text-align:center;">
                        <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/M10_21_Dec_2020.pdf" target="_blank" rel="noopener" class="iqac-download-btn">
                          <i class="fa-solid fa-file-arrow-down"></i> Download PDF
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>IQAC Minutes of Meeting (22 Jul 2020)</strong></td>
                      <td style="text-align:center;">
                        <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/M9_22_Jul_2020.pdf" target="_blank" rel="noopener" class="iqac-download-btn">
                          <i class="fa-solid fa-file-arrow-down"></i> Download PDF
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>IQAC Minutes of Meeting (16 Apr 2020)</strong></td>
                      <td style="text-align:center;">
                        <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/M8_16_Apr_2020.pdf" target="_blank" rel="noopener" class="iqac-download-btn">
                          <i class="fa-solid fa-file-arrow-down"></i> Download PDF
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>IQAC Minutes of Meeting (15 Jan 2020)</strong></td>
                      <td style="text-align:center;">
                        <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/M7_15_Jan_2020.pdf" target="_blank" rel="noopener" class="iqac-download-btn">
                          <i class="fa-solid fa-file-arrow-down"></i> Download PDF
                        </a>
                      </td>
                    </tr>

                    <!-- 2019 -->
                    <tr>
                      <td rowspan="4" style="text-align:center; vertical-align:middle; background:#f8fafc;"><span class="badge bg-secondary fs-6 px-3 py-1">2019</span></td>
                      <td><strong>IQAC Minutes of Meeting (17 Dec 2019)</strong></td>
                      <td style="text-align:center;">
                        <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/M6_17_Dec_2019.pdf" target="_blank" rel="noopener" class="iqac-download-btn">
                          <i class="fa-solid fa-file-arrow-down"></i> Download PDF
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>IQAC Minutes of Meeting (12 Sep 2019)</strong></td>
                      <td style="text-align:center;">
                        <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/M5_12_Sep_2019.pdf" target="_blank" rel="noopener" class="iqac-download-btn">
                          <i class="fa-solid fa-file-arrow-down"></i> Download PDF
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>IQAC Minutes of Meeting (28 May 2019)</strong></td>
                      <td style="text-align:center;">
                        <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/M4_28_May_2019.pdf" target="_blank" rel="noopener" class="iqac-download-btn">
                          <i class="fa-solid fa-file-arrow-down"></i> Download PDF
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>IQAC Minutes of Meeting (17 Feb 2019)</strong></td>
                      <td style="text-align:center;">
                        <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/M3_17_Feb_2019.pdf" target="_blank" rel="noopener" class="iqac-download-btn">
                          <i class="fa-solid fa-file-arrow-down"></i> Download PDF
                        </a>
                      </td>
                    </tr>

                    <!-- 2018 -->
                    <tr>
                      <td rowspan="2" style="text-align:center; vertical-align:middle; background:#f8fafc;"><span class="badge bg-secondary fs-6 px-3 py-1">2018</span></td>
                      <td><strong>IQAC Minutes of Meeting (24 Nov 2018)</strong></td>
                      <td style="text-align:center;">
                        <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/M2_24_Nov_2018.pdf" target="_blank" rel="noopener" class="iqac-download-btn">
                          <i class="fa-solid fa-file-arrow-down"></i> Download PDF
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td><strong>IQAC Minutes of Meeting (18 Aug 2018)</strong></td>
                      <td style="text-align:center;">
                        <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/M1_18_Aug_2018.pdf" target="_blank" rel="noopener" class="iqac-download-btn">
                          <i class="fa-solid fa-file-arrow-down"></i> Download PDF
                        </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <!-- NAAC SSR & Criteria Quick Access -->
            <div class="iqac-card mb-0" id="naac-ssr">
              <div class="iqac-card-header">
                <i class="fa-solid fa-layer-group"></i>
                <h5 class="fw-bold text-dark mb-0">NAAC SSR &amp; Criteria Documentation</h5>
              </div>
              <p class="text-secondary small mb-3">Access comprehensive NAAC Assessment Criteria reports and Self Study Report (SSR):</p>
              <div class="row g-3">
                <div class="col-sm-6 col-md-4">
                  <a href="<?php echo BASE_URL; ?>Academic/NAAC/SSR.php" class="naac-link-chip">
                    <span><i class="fa-solid fa-file-contract text-warning me-2"></i>NAAC SSR</span>
                    <i class="fa-solid fa-arrow-right"></i>
                  </a>
                </div>
                <div class="col-sm-6 col-md-4">
                  <a href="<?php echo BASE_URL; ?>Academic/NAAC/CriteriaOne.php" class="naac-link-chip">
                    <span><i class="fa-solid fa-list-check text-warning me-2"></i>Criteria - 1</span>
                    <i class="fa-solid fa-arrow-right"></i>
                  </a>
                </div>
                <div class="col-sm-6 col-md-4">
                  <a href="<?php echo BASE_URL; ?>Academic/NAAC/CriteriaTwo.php" class="naac-link-chip">
                    <span><i class="fa-solid fa-chalkboard-user text-warning me-2"></i>Criteria - 2</span>
                    <i class="fa-solid fa-arrow-right"></i>
                  </a>
                </div>
                <div class="col-sm-6 col-md-4">
                  <a href="<?php echo BASE_URL; ?>Academic/NAAC/CriteriaThree.php" class="naac-link-chip">
                    <span><i class="fa-solid fa-vial-circle-check text-warning me-2"></i>Criteria - 3</span>
                    <i class="fa-solid fa-arrow-right"></i>
                  </a>
                </div>
                <div class="col-sm-6 col-md-4">
                  <a href="<?php echo BASE_URL; ?>Academic/NAAC/CriteriaFour.php" class="naac-link-chip">
                    <span><i class="fa-solid fa-building-columns text-warning me-2"></i>Criteria - 4</span>
                    <i class="fa-solid fa-arrow-right"></i>
                  </a>
                </div>
                <div class="col-sm-6 col-md-4">
                  <a href="<?php echo BASE_URL; ?>Academic/NAAC/CriteriaFive.php" class="naac-link-chip">
                    <span><i class="fa-solid fa-user-graduate text-warning me-2"></i>Criteria - 5</span>
                    <i class="fa-solid fa-arrow-right"></i>
                  </a>
                </div>
                <div class="col-sm-6 col-md-4">
                  <a href="<?php echo BASE_URL; ?>Academic/NAAC/CriteriaSix.php" class="naac-link-chip">
                    <span><i class="fa-solid fa-landmark text-warning me-2"></i>Criteria - 6</span>
                    <i class="fa-solid fa-arrow-right"></i>
                  </a>
                </div>
                <div class="col-sm-6 col-md-4">
                  <a href="<?php echo BASE_URL; ?>Academic/NAAC/CriteriaSeven.php" class="naac-link-chip">
                    <span><i class="fa-solid fa-leaf text-warning me-2"></i>Criteria - 7</span>
                    <i class="fa-solid fa-arrow-right"></i>
                  </a>
                </div>
              </div>
            </div>

          </div>
        </div><!-- end iqac-main-card -->
      </div><!-- end col-lg-8 -->

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>