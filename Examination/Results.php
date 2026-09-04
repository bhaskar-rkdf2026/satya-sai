<?php $page_title = 'Examination Results - SSSUTMS';
$banner_title = 'Examination Results';
$banner_category = 'Examination';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?><style>
.naac-section { 
  background-color: #f8fafc;
  font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
}
.naac-main-card {
  background: #ffffff;
  border-radius: 16px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 25px rgba(15,23,42,0.06);
  overflow: hidden;
  margin-bottom: 2rem;
}
.naac-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%) !important;
  color: #ffffff !important;
  padding: 1.8rem 2rem;
  position: relative;
}
.naac-header-banner h3,
.naac-header-banner h2,
.naac-header-banner h1,
.naac-header-banner p {
  color: #ffffff !important;
  text-shadow: 0 1px 2px rgba(0,0,0,0.2);
}
.naac-header-banner p {
  color: rgba(255, 255, 255, 0.85) !important;
}
.naac-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}

/* Card Body & Typography Enhancements */
.naac-card-body { 
  padding: 2rem; 
  color: #1e293b !important;
  font-size: 0.975rem !important;
  line-height: 1.65 !important;
}
.naac-card-body p {
  color: #1e293b !important;
  font-size: 0.975rem !important;
  line-height: 1.65 !important;
  margin-bottom: 1rem;
}
.naac-card-body strong,
.naac-card-body b {
  color: #0f172a !important;
  font-weight: 700 !important;
}

/* Stat Chips (Medium Sized & Balanced) */
.res-stat-chip,
.es-stat-chip {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 12px 14px;
  display: flex;
  align-items: center;
  gap: 12px;
  height: 100%;
  transition: all 0.2s ease;
  box-shadow: 0 2px 6px rgba(15,23,42,0.03);
}
.res-stat-chip:hover,
.es-stat-chip:hover {
  border-color: #cbd5e1;
  box-shadow: 0 4px 14px rgba(11,37,69,0.06);
  transform: translateY(-2px);
}
.res-stat-icon,
.es-stat-icon {
  width: 38px;
  height: 38px;
  border-radius: 9px;
  background: rgba(245,158,11,0.12);
  color: #d97706;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.05rem;
  flex-shrink: 0;
}
.res-stat-label,
.es-stat-label {
  font-size: 0.75rem !important;
  font-weight: 700 !important;
  text-transform: uppercase !important;
  color: #64748b !important;
  letter-spacing: 0.3px !important;
  line-height: 1.25 !important;
  margin-bottom: 2px !important;
}
.res-stat-value,
.es-stat-value {
  font-size: 0.88rem !important;
  font-weight: 700 !important;
  color: #0f172a !important;
  line-height: 1.3 !important;
}

/* Date Group Card Component */
.res-group-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 1.25rem 1.5rem;
  box-shadow: 0 4px 14px rgba(15, 23, 42, 0.03);
  margin-bottom: 1.5rem;
}
.res-date-badge {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  font-weight: 700;
  padding: 6px 16px;
  border-radius: 8px;
  display: inline-flex;
  align-items: center;
  gap: 8px;
  font-size: 0.88rem;
  margin-bottom: 1rem;
  border-left: 3px solid #f59e0b;
}
.res-item-list {
  list-style: none;
  padding: 0; margin: 0;
  display: flex;
  flex-direction: column;
  gap: 0.75rem;
}
.res-item-list li {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 10px;
  padding: 12px 18px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 16px;
  transition: all 0.2s ease;
}
.res-item-list li:hover {
  background: #f1f5f9;
  border-color: #cbd5e1;
  box-shadow: 0 4px 12px rgba(11,37,69,0.05);
}
.res-item-title {
  display: flex;
  align-items: center;
  gap: 10px;
  flex: 1 1 auto;
  font-size: 0.935rem;
  font-weight: 700;
  color: #0f172a;
  line-height: 1.4;
}
.res-item-title i {
  color: #10b981;
  font-size: 1rem;
  flex-shrink: 0;
}

/* Exact Button Styling (Dark Navy Pill + Golden Border + Yellow Icon) */
.btn-naac-portal {
  background: linear-gradient(135deg, #0b2545 0%, #173866 100%) !important;
  color: #ffffff !important;
  border: 1.5px solid #d97706 !important;
  padding: 7px 18px !important;
  border-radius: 50px !important;
  font-weight: 700 !important;
  font-size: 0.85rem !important;
  text-decoration: none !important;
  display: inline-flex !important;
  align-items: center !important;
  justify-content: center !important;
  gap: 8px !important;
  transition: all 0.25s ease-in-out !important;
  box-shadow: 0 4px 12px rgba(11, 37, 69, 0.25) !important;
  white-space: nowrap !important;
  flex-shrink: 0 !important;
}
.btn-naac-portal:hover {
  background: linear-gradient(135deg, #173866 0%, #1e4b8a 100%) !important;
  border-color: #f59e0b !important;
  color: #ffffff !important;
  transform: translateY(-2px) !important;
  box-shadow: 0 6px 16px rgba(11, 37, 69, 0.35) !important;
}
.btn-naac-portal i {
  color: #f59e0b !important;
  font-size: 0.9rem !important;
}
.btn-naac-portal:hover i {
  color: #fbbf24 !important;
}
</style>

<section class="subpage-main-section naac-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-9 col-md-8">
        <div class="naac-main-card">
          <div class="naac-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <h3 class="fw-bold mb-1">EXAMINATION RESULTS</h3>
              <p class="mb-0 text-white-50">Sri Satya Sai University of Technology and Medical Sciences &bull; Official Result Declarations</p>
            </div>
            <div>
              <a href="#" class="btn btn-warning fw-bold px-4 py-2 text-dark rounded-3 shadow-sm">
                <i class="fa-solid fa-right-to-bracket me-1"></i> Student Result Portal
              </a>
            </div>
          </div>
          
          <div class="naac-card-body">
            <article class="fs-5 lh-lg text-secondary">

              <!-- Stat Chips (Medium) -->
              <div class="row g-2 align-items-stretch mb-4">
                <div class="col-sm-6 col-md-3">
                  <div class="res-stat-chip">
                    <div class="res-stat-icon"><i class="fa-solid fa-square-poll-vertical"></i></div>
                    <div>
                      <div class="res-stat-label">Declarations</div>
                      <div class="res-stat-value">Session 2026-24</div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="res-stat-chip">
                    <div class="res-stat-icon"><i class="fa-solid fa-laptop-medical"></i></div>
                    <div>
                      <div class="res-stat-label">Medical / Ayush</div>
                      <div class="res-stat-value">MBBS / BAMS / BHMS</div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="res-stat-chip">
                    <div class="res-stat-icon"><i class="fa-solid fa-gears"></i></div>
                    <div>
                      <div class="res-stat-label">Engineering / Tech</div>
                      <div class="res-stat-value">BE / BCA / MCA</div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="res-stat-chip">
                    <div class="res-stat-icon"><i class="fa-solid fa-briefcase"></i></div>
                    <div>
                      <div class="res-stat-label">Management / Arts</div>
                      <div class="res-stat-value">MBA / BBA / BA</div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- DATE GROUP 0 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 10 Aug 2026</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Bachelor of Engineering III Semester (Ex) June 2026</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Bachelor of Engineering IV Semester (Ex) June 2026</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 1 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 05 Aug 2026</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.A. V Semester (Ex) June 2026</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.A. VI Semester (Regular/Ex) June 2026</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 2 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 29 July 2026</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>MBA I Semester (Ex) June 2026</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>MBA II Semester (Regular/Ex) June 2026</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 3 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 27 July 2026</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B. Com. V Semester (Ex) June 2026</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B. Com. VI Semester (Regular/Ex) June 2026</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 4 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 18 July 2026</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.B.A. V Semester (Ex) June 2026</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.B.A. VI Semester (Regular) June 2026</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.C.A. VI Semester (Regular) June 2026</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 5 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 15 July 2026</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.A. (Sociology) IV Semester (Regular) June 2026</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.A. (Economics) IV Semester (Regular) June 2026</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.A. (English) IV Semester (Regular) June 2026</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.A. (Hindi) IV Semester (Regular) June 2026</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.A. (History) IV Semester (Regular) June 2026</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.A. (Political Science) IV Semester (Regular) June 2026</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.A. (Psychology) IV Semester (Regular) June 2026</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Sc. (Hons) Agriculture VI Semester (Regular) June 2026</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 6 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 14 July 2026</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.A. B. Ed VII Semester (Ex) June 2026</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.A. B. Ed VIII Semester (Regular) June 2026</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.H.M.S. 2nd Year December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 7 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 07 July 2026</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Bachelor of Engineering V Semester (Ex) June 2026</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Bachelor of Engineering VI Semester (Regular/Ex) June 2026</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>BHMCT IV Semester (Regular) June 2026</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.P.Ed. I Semester (Ex) June 2026</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.P.Ed. II Semester (Regular/Ex) June 2026</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>MBA III Semester (Ex) June 2026</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>MBA IV Semester (Regular/Ex) June 2026</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 8 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 06 July 2026</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Ed. IV Semester (Regular) June 2026</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Ed. III Semester (EX) June 2026</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 9 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 01 July 2026</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Diploma in Engineering V Semester (Ex) June 2026</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Diploma in Engineering VI Semester (Regular) June 2026</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 10 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 27 June 2026</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>BHMCT V Semester (Ex) June 2026</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>BHMCT VI Semester (Regular) June 2026</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 11 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 20 June 2026</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Bachelor of Physical Education III Semester (Ex) June 2026</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Bachelor of Physical Education IV Semester (Regular) June 2026</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Masters in Computer Application IV Semester (Regular) June 2026</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 12 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 18 June 2026</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B A M S First Professional Examination March 2026</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 13 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 16 June 2026</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Bachelor of Physical Education &amp; Sports II Year April 2026</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Bachelor of Physical Education &amp; Sports I Year April 2026</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Diploma Pharmacy I Year April 2026</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 14 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 13 June 2026</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Bachelor of Physical Education &amp; Sports III Year April 2026</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Diploma Pharmacy II Year April 2026</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Bachelor of Pharmacy VII Semester (Ex) June 2026</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Bachelor of Pharmacy VIII Semester (Regular) June 2026</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Bachelor of Law V Semester (Ex) June 2026</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Bachelor of Law VI Semester (Regular) June 2026</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 15 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 09 June 2026</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Bachelor of Engineering VII Semester (Ex) June 2026</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Bachelor of Engineering VIII Semester (Regular) June 2026</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 16 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 19 May 2026</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>MBBS supplementary result Feb -2026</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 17 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 01 May 2026</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B. Design I Semester (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B. Arch I Semester (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B. Arch III Semester (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B. Arch V Semester (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 18 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 25 April 2026</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Bachelor of Pharmacy I Semester (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Bachelor of Pharmacy III Semester (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 19 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 24 April 2026</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Bachelor of Engineering I Semester (Ex) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Bachelor of Engineering II Semester (Ex) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 20 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 21 April 2026</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Bachelor of Engineering VI Semester (Ex) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Bachelor of Engineering V Semester (Ex) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Bachelor of Engineering IV Semester (Ex) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Bachelor of Engineering III Semester (Ex) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 21 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 18 April 2026</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Sc. (Hons) Agriculture III Semester (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Sc. (Hons) Agriculture V Semester (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B. Pharma V Semester (Regular/Ex) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 22 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 15 April 2026</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Ph D Coursework Result 1 &amp; 2 sem (Regular/Ex) Dec.- 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 23 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 14 April 2026</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.H.M.S. 3rd Year (Supplementary) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 24 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 11 April 2026</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.A. I Semester (Ex) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.A. II Semester (Ex) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 25 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 08 April 2026</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.E. I Semester (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Sc. (Nursing) V Semester (Regular/Ex) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Sc. (Nursing) IV Semester (Ex) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Sc. (Nursing) I Semester (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Sc. (Nursing) VI Semester (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 26 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 04 April 2026</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Diploma Engineering III Semester (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.Tech I Semester (Regular/Ex) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.Tech II Semester (Ex) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 27 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 03 April 2026</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.A. V Semester (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.A. III Semester (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.A. I Semester (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 28 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 01 April 2026</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.E. III Semester (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 29 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 31 March 2026</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Com VI Semester (Ex) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Com IV Semester (Ex) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Com II Semester (Ex) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Com I Semester (Ex) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Sc. V Semester (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Sc. III Semester (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Sc. II Semester (Ex) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Sc. I Semester (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 30 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 25 March 2026</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.C.A. I Semester (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.C.A. II Semester (Ex) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 31 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 23 March 2026</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.A. I Semester (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.A. III Semester (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.Pharma III Semester (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.Tech. III Semester (Regular/Ex) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 32 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 19 March 2026</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Com. I Semester (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.Sc. III Semester (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.Sc. I Semester (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 33 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 17 March 2026</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Bachelor of Engineering V Semester (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.B.A. I Semester (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.C.A. V Semester (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.C.A. III Semester (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 34 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 15 March 2026</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Diploma Engineering V Semester (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.C.A. III Semester (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M Pharma I Semester (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 35 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 12 March 2026</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.A.M.S. 2nd Prof.(Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 36 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 10 March 2026</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.A.M.S. 2nd (Supplementary) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 37 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 05 March 2026</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B. Lib I Semester (Regular/Ex) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B. Lib II Semester (Ex) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B. Ed. I Semester (Ex) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B. Ed. II Semester (Ex) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B. Ed. IV Semester (Ex) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.B.A. I Semester (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.B.A. II Semester (Ex) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.B.A. III Semester (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.B.A. IV Semester (Ex) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 38 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 28 Feb 2026</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.A. B.Ed. III Semester (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.A. B.Ed. I Semester (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.A.L.L.B. I Semester (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 39 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 23 Feb 2026</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.A. B.Ed. V Semester (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.B.A. V Semester (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.B.A. III Semester (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Com. V Semester (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Com. III Semester (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Ed. I Semester (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 40 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 18 Feb 2026</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.E. VII Semester (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 41 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 17 Feb 2026</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>BHMCT IV Semester (Ex) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>BHMCT II Semester (Ex) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>BHMCT I Semester (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Diploma Medical Lab Technician II Year (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Diploma Medical Lab Technician I Year (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Diploma Ophthalmic Assistant I Year (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Diploma X-Ray Technician I Year (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>BPT IV Year (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>BPT I Year (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>MPT (Orthopaedic) I Year (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>LLB I Semester (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>LLB I Semester (Ex) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 42 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 12 Feb 2026</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.B.B.S. I Year Regular Exam September 2025 Retotaling results</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 43 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 11 Feb 2026</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.P.Ed. III Semester (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.P.Ed. I Semester (Ex) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 44 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 09 Feb 2026</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.H.M.C.T. V Semester (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 45 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 20 Jan 2026</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>L.L.B. II Semester (Ex) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>L.L.B. IV Semester (Ex) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>L.L.B. V Semester (Regular/Ex) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>L.L.B. VI Semester (Ex) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Ed. III Semester (Regular/Ex) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.A. B.Ed. VII Semester (Regular/Ex) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B. Pharma VII Semester (Regular/Ex) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B. Pharma VIII Semester (Ex) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.E. VIII Semester (Ex) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 46 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 13 Jan 2026</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>BHMCT VIII Semester (Ex) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>BHMCT VII Semester (Regular/Ex) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>BHMCT III Semester (Regular) December 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 47 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 02 Jan 2026</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.A.M.S. 1st Prof. (Supplementary) November 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 48 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 15 Dec 2025</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>DIPLOMA PHARMACY (AYURVED) I &amp; II Year September 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 49 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 05 Dec 2025</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.B.B.S. 1st Prof. (Regular) September 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.H.M.S. III Year (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 50 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 22 Nov 2025</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Diploma Pharmacy I Year (Supplementary) September 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Diploma Pharmacy II Year (Supplementary) September 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>BPES II Year (Supplementary) September 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>BPES I Year (Supplementary) September 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Diploma X-Ray Technician II Year (Regular) September 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Diploma X-Ray Technician I Year (Regular) September 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Diploma YOGA II Year (Regular) September 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Diploma YOGA I Year (Regular) September 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Diploma Homoeopathy II Year (Regular) September 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Diploma Homoeopathy I Year (Regular) September 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Diploma Opthalmic Assistant I Year (Regular) September 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Diploma Medical Lab Technician II Year (Regular) September 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Diploma Medical Lab Technician I Year (Regular) September 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.P.T. II Year (Regular) September 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.P.T. I Year (Regular) September 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 51 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 21 Nov 2025</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Bachelor of Engineering I Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Bachelor of Engineering II Semester (Regular/Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 52 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 20 Nov 2025</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Diploma Engineering I Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Diploma Engineering II Semester (Regular/Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 53 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 13 Nov 2025</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Diploma Engineering III Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Diploma Engineering IV Semester (Regular/Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>30 Oct 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>29 Oct 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B. E. IV Semester (Regular/ Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Sc.(Nursing) IV - V Semester (Regular/ Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>28 Oct 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.C.A. I Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.C.A. II Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.E. III Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>25 Oct 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.B.A. NEP I Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.B.A. NEP II Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>24 Oct 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.A. NEP I Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.A. NEP II Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>18 Oct 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Com NEP I Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Com NEP II Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Sc. NEP I Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Sc. NEP II Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>14 Oct 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Sc. (Hons) Agriculture I Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Sc. (Hons) Agriculture II Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>10 Oct 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>MA (Economics) II Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>MA (English) II Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>MA (Hindi) II Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>MA (History) II Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>MA (Political Science) II Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>MA (Psychology) II Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>MA (Sociology) II Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>08 Oct 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>BA NEP III Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>BA NEP IV Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>BHMS IV Year (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>MA (English) I Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>MA (Hindi) I Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>MA (Political Science) I Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>MA (Psychology) I Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>04 Oct 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.A. B.Ed. I Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.A. B.Ed. II Semester (Regular/Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.Sc. (Botany) II Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.Sc. (Chemistry) II Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.Sc. (Computer Science) II Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.Sc. (Mathematics) II Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.Sc. (Microbiology) II Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.Sc. (Physics) II Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.Sc. (Zoology) II Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>01 Oct 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.B.A. I Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.B.A. II Semester (Regular/Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.Sc. (Botany) I Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.Sc. (Chemistry) I Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.Sc. (Mathematics) I Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.Sc. (Microbiology) I Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.Sc. (Physics) I Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.Sc. (Zoology) I Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 54 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 30 Sep 2025</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B. Lib I Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B. Lib II Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Ed. II Semester (Regular/Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.P. Ed. I Semester (Regular/Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.P. Ed. II Semester (Regular/Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Arch. II Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 55 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 27 Sep 2025</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Ed. I Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.Com. II Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.C.A. I Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.C.A. II Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M. Pharma I Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M. Pharma II Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 56 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 26 Sep 2025</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Com. NEP III Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Com. NEP IV Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Sc. NEP III Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Sc. NEP IV Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.B.A. NEP III Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.B.A. NEP IV Semester (Regular/Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.H.M.C.T. I Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.H.M.C.T. II Semester (Regular/Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>L.L.B. I Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>L.L.B. II Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 57 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 23 Sep 2025</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B. Pharmacy I Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B. Pharmacy II Semester (Regular/Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.C.A. NEP IV Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Com. NEP IV Semester (Regular/Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Sc. NEP IV Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 58 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 12 Sep 2025</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B. ARCH III Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B. ARCH IV Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 59 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 11 Sep 2025</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.E. VI Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 60 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 08 Sep 2025</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B. Pharmacy IV Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Sc. (Hons) Agriculture III Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Sc. (Hons) Agriculture IV Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Sc. (Hons) Agriculture V Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Sc. (Hons) Agriculture VI Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 61 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 05 Sep 2025</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B. Pharmacy III Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B. Pharmacy IV Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.E. VI Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 62 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 02 Sep 2025</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.E. V Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 63 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 30 Aug 2025</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.A. B.Ed. III Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.A. B.Ed. IV Semester (Regular/Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 64 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 22 Aug 2025</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.A. B.Ed. V Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.A. B.Ed. VI Semester (Regular/Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 65 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 13 Aug 2025</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>L.L.B II Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>L.L.B III Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>L.L.B IV Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>L.L.B V Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B. Pharmacy V Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B. Pharmacy VI Semester (Regular/Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 66 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 01 Aug 2025</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.A.M.S. I Year (Regular) March - 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 67 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 30 July 2025</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.H.M.C.T. IV Semester (Regular/Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.H.M.C.T. VII Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.H.M.C.T. VI Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.A. (English) III Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.A. (Psychology) III Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.A. (Economics) IV Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.A. (English) IV Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.A. (Hindi) IV Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.A. (History) IV Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.A. (Political Science) IV Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 68 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 28 July 2025</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Diploma Pharmacy I Year (Regular) April 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>BPES I Year (Regular) April 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 69 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 26 July 2025</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.A. (NEP) VI Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Diploma Engineering VI Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Sc. (NEP) V Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Sc. (NEP) VI Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Diploma Engineering V Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M. Com IV Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>MBA IV Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.B.A. (NEP) V Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.B.A. (NEP) VI Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.C.A. (NEP) VI Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Com (NEP) VI Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.Sc. (Mathematics) III Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.Sc. (Zoology) III Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.Sc. (Botany) IV Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.Sc. (Chemistry) IV Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.Sc. (Computer Science) IV Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.Sc. (Mathematics) IV Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.Sc. (Microbiology) IV Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.Sc. (Physics) IV Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.Sc. (Zoology) IV Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.A. B.Ed VIII Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B. Pharmacy VII Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B. Pharmacy VIII Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>MCA IV Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.H.M.C.T. VIII Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.E. VII Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.E. VIII Semester (Ex) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>L.L.B. VI Semester (Regular) June 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.A.M.S. I Year (Supplementary) March - 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.P.Ed. IV Semester (Regular) June - 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Sc. (Hons) Agriculture VIII Semester (Regular) June - 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Ed. III Semester (Ex) June - 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Ed. IV Semester (Regular) June - 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>BPES III Year (Regular) April - 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>BPES II Year (Regular) April - 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.H.M.S. I Year (Regular) September 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.A.M.S. II Year (Regular) Jan 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Diploma Pharmacy II Year (Regular) April 2025</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Diploma Engineering III Semester (Ex) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Diploma Engineering II Semester (Ex) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.E. I Semester (Ex) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.E. II Semester (Ex) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B. Pharmacy. II Semester (Ex) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.C.A. (NEP) IV Semester (Ex) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Sc. (NEP) IV Semester (Ex) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Com. (NEP) IV Semester (Ex) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.A. B.Ed. I Semester (Ex) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Ed. I Semester (Ex) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.P.Ed. I Semester (Ex) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.P.Ed. II Semester (Ex) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.P.Ed. III Semester (Ex) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.P.Ed. IV Semester (Ex) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.A (English) III Semester (Regular) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B. E. III Semester (Ex) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B. E. IV Semester (Ex) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>Diploma Engineering I Semester (Ex) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B. Pharmacy III Semester (Regular/Ex) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B. Pharmacy IV Semester (Ex) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B. Arch. III Semester (Regular) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B. Arch. IX Semester (Regular) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.H.M.S. II Year (Supplementary) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Sc. (Hons) Agriculture VI Semester (Ex) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Sc. (Hons) Agriculture IV Semester (Ex) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Sc. (Hons) Agriculture III Semester (Ex) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Sc. (Hons) Agriculture II Semester (Ex) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M. Tech. I Semester (Ex) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M. Tech. I Semester (Ex) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M. Pharma III Semester (Regular) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 70 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 23 April 2025</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Ed. II Semester (Ex) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Ed. III Semester (Ex) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Ed. IV Semester (Ex) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 71 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 22 April 2025</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B. Pharmacy V Semester (Regular/Ex) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B. Pharmacy VI Semester (Ex) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M. Pharma I Semester (Ex) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M. Pharma II Semester (Ex) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 72 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 21 April 2025</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Sc. (Hons) Agriculture V Semester (Regular) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Sc. (Hons) Agriculture III Semester (Regular) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>MBA I Semester (Ex) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>MBA II Semester (Ex) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>MBA III Semester (Ex) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 73 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 15 April 2025</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B. Pharmacy VII Semester (Regular) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.A. (NEP) III Semester (Regular) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.C.A. (NEP) III Semester (Regular) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.B.A. (NEP) III Semester (Regular) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Com. (NEP) III Semester (Regular) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Sc. (NEP) III Semester (Regular) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.A. (NEP) V Semester (Regular) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.C.A. (NEP) V Semester (Regular) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.Sc. (NEP) V Semester (Regular) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.C.A. I Semester (Ex) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.A. (Psychology) IV Semester (Ex) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.Sc. (Botany) III Semester (Regular) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.Sc. (Chemistry) III Semester (Regular) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.Sc. (Computer Science) III Semester (Regular) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.Sc. (Mathematics) III Semester (Regular) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.Sc. (Microbiology) III Semester (Regular) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.Sc. (Physics) III Semester (Regular) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.Sc. (Zoology) III Semester (Regular) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.Sc. (Botany) IV Semester (Ex) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.Sc. (Computer Science) IV Semester (Ex) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

              <!-- DATE GROUP 74 -->
              <div class="res-group-card">
                <div class="res-date-badge"><i class="fa-solid fa-calendar-day"></i> 05 March 2025</div>
                <ul class="res-item-list">
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.H.M.C.T. II Semester (Ex) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.H.M.C.T. IV Semester (Ex) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.H.M.C.T. VI Semester (Ex) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>B.E. VIII Semester (Ex) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                  <li>
                    <div class="res-item-title"><i class="fa-solid fa-circle-check"></i> <span>M.B.A. III Semester (Regular) December 2024</span></div>
                    <a href="#" class="btn btn-sm btn-naac-portal"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Check Result</a>
                  </li>
                </ul>
              </div>

            </article>
          </div>
        </div>
      </div>
      
      <!-- Sidebar (Right) -->
      <div class="col-lg-3 col-md-4">
        <?php require_once __DIR__ . '/../includes/sidebar.php'; ?>
      </div>
      
    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>