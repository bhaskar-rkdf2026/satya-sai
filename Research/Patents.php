<?php
$page_title = 'Patents - SSSUTMS';
$banner_title = 'Patents';
$banner_category = 'Research';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?>

<style>
.pat-section { background-color: #f8fafc; font-family: 'Inter', system-ui, -apple-system, sans-serif; }
.pat-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15,23,42,0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}
.pat-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2.2rem 2rem;
  position: relative;
}
.pat-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.pat-stat-chip {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 16px 14px;
  display: flex; align-items: center; gap: 12px;
  height: 100%;
  transition: all 0.25s ease;
  box-shadow: 0 4px 12px rgba(0,0,0,0.02);
}
.pat-stat-chip:hover {
  border-color: #cbd5e1;
  box-shadow: 0 6px 18px rgba(11,37,69,0.07);
  transform: translateY(-2px);
}
.pat-stat-icon {
  width: 48px; height: 48px;
  border-radius: 12px;
  background: rgba(245,158,11,0.12);
  color: #d97706;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.35rem; flex-shrink: 0;
}
.pat-objective-box {
  background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
  border: 1px solid #e2e8f0;
  border-left: 4px solid #f59e0b;
  border-radius: 12px;
  padding: 1.25rem 1.5rem;
  margin-bottom: 2rem;
}
.pat-year-badge {
  background: linear-gradient(135deg, #0b2545 0%, #1e4d8c 100%);
  color: #ffffff;
  padding: 6px 18px;
  border-radius: 50px;
  font-weight: 700;
  font-size: 0.95rem;
  display: inline-flex;
  align-items: center;
  gap: 8px;
  box-shadow: 0 3px 10px rgba(11,37,69,0.15);
}
.pat-modern-table {
  width: 100%;
  border-collapse: separate;
  border-spacing: 0;
  border-radius: 12px;
  overflow: hidden;
  border: 1px solid #e2e8f0;
  margin-bottom: 2.5rem;
  background: #ffffff;
  box-shadow: 0 4px 14px rgba(15,23,42,0.03);
}
.pat-modern-table thead th {
  background: #0b2545 !important;
  color: #ffffff !important;
  font-weight: 700 !important;
  font-size: 0.85rem !important;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  padding: 14px 16px !important;
  border: none !important;
  vertical-align: middle;
}
.pat-modern-table tbody td {
  padding: 14px 16px !important;
  border-bottom: 1px solid #f1f5f9 !important;
  border-right: 1px solid #f1f5f9 !important;
  font-size: 0.9rem;
  color: #334155;
  vertical-align: middle;
}
.pat-modern-table tbody tr:last-child td {
  border-bottom: none !important;
}
.pat-modern-table tbody tr:hover td {
  background-color: #f8fafc;
}
.pat-badge-status {
  padding: 5px 12px;
  border-radius: 6px;
  font-size: 0.78rem;
  font-weight: 700;
  display: inline-flex;
  align-items: center;
  gap: 5px;
  white-space: nowrap;
}
.pat-badge-published {
  background: #eff6ff;
  color: #1d4ed8;
  border: 1px solid #bfdbfe;
}
.pat-badge-granted {
  background: #ecfdf5;
  color: #047857;
  border: 1px solid #a7f3d0;
}
</style>

<section class="subpage-main-section pat-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="pat-main-card">

          <!-- Header Banner -->
          <div class="pat-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-lightbulb me-1"></i> Intellectual Property Rights (IPR)
              </span>
              <h3 class="fw-bold text-white mb-1 fs-3">PATENTS – FROM FILING TO GRANT</h3>
              <p class="text-white-50 mb-0 small">Patented Innovations &amp; Granted Technological Rights by SSSUTMS Researchers</p>
            </div>
          </div>

          <!-- Content Body -->
          <div class="p-4 pat-content-body">

            <!-- Stat Chips -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-sm-6 col-md-3">
                <div class="pat-stat-chip">
                  <div class="pat-stat-icon"><i class="fa-solid fa-certificate"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Innovations</div>
                    <div class="fw-bold text-dark fs-6">28+ Filed/Granted</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="pat-stat-chip">
                  <div class="pat-stat-icon"><i class="fa-solid fa-microchip"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Domains</div>
                    <div class="fw-bold text-dark fs-6">IoT &amp; Engineering</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="pat-stat-chip">
                  <div class="pat-stat-icon"><i class="fa-solid fa-pills"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Pharma</div>
                    <div class="fw-bold text-dark fs-6">Medical Devices</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="pat-stat-chip">
                  <div class="pat-stat-icon"><i class="fa-solid fa-file-signature"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">IPR Cell</div>
                    <div class="fw-bold text-dark fs-6">Filing Support</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Objective Box -->
            <div class="pat-objective-box">
              <h6 class="fw-bold text-dark mb-1 d-flex align-items-center gap-2">
                <i class="fa-solid fa-bullseye text-warning"></i> Objective: Patent – From Filing to Grant
              </h6>
              <p class="mb-0 text-muted small leading-relaxed">
                The main objective is to impart greater awareness about the issue of Intellectual Property Rights (IPR), which has gained special importance for all domains of socio-economic and technological development. It aids in understanding patentability criteria in detail and the commercial and viable aspects of patent filing.
              </p>
            </div>

            <!-- Search Filter -->
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-4">
              <div class="position-relative flex-grow-1" style="max-width: 380px;">
                <i class="fa-solid fa-magnifying-glass position-absolute text-muted" style="left: 14px; top: 50%; transform: translateY(-50%); font-size: 0.9rem;"></i>
                <input type="text" id="patentSearchInput" class="form-control ps-5 py-2 rounded-pill border" placeholder="Search by inventor, title, or patent no...">
              </div>
              <span class="text-muted extra-small">
                <i class="fa-solid fa-shield-check text-success me-1"></i> Verified Official Records
              </span>
            </div>

            <!-- Year Section: 2023 -->
            <div class="pat-year-group mb-4" data-year="2023">
              <div class="d-flex align-items-center gap-3 mb-3">
                <span class="pat-year-badge">
                  <i class="fa-regular fa-calendar-check"></i> Year 2023
                </span>
                <span class="text-muted extra-small fw-semibold">8 Patent Records</span>
              </div>

              <div class="table-responsive">
                <table class="pat-modern-table table mb-0">
                  <thead>
                    <tr>
                      <th class="text-center" style="width: 70px;">S. No.</th>
                      <th style="width: 24%;">Name of Inventors</th>
                      <th style="width: 42%;">Title of Invention</th>
                      <th style="width: 18%;">Application / Patent No.</th>
                      <th class="text-center" style="width: 16%;">Granted / Published</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="patent-row">
                      <td class="text-center fw-bold text-muted">1</td>
                      <td class="fw-semibold text-dark">Dr. Mukesh Tiwari</td>
                      <td>
                        <strong class="text-primary-emphasis d-block">Adjustable Laptop Table</strong>
                      </td>
                      <td>
                        <code class="text-dark bg-light px-2 py-1 rounded border small fw-bold">391559-001</code>
                      </td>
                      <td class="text-center">
                        <span class="pat-badge-status pat-badge-published"><i class="fa-solid fa-file-lines"></i> Filed &amp; Published</span>
                      </td>
                    </tr>
                    <tr class="patent-row">
                      <td class="text-center fw-bold text-muted">2</td>
                      <td class="fw-semibold text-dark">Dr. Mukesh Tiwari</td>
                      <td>
                        <strong class="text-primary-emphasis d-block">An intelligent waste /garbage disposal system based on internet of things (IOT)</strong>
                      </td>
                      <td>
                        <code class="text-dark bg-light px-2 py-1 rounded border small fw-bold">202221065208</code>
                      </td>
                      <td class="text-center">
                        <span class="pat-badge-status pat-badge-published"><i class="fa-solid fa-file-lines"></i> Filed &amp; Published</span>
                      </td>
                    </tr>
                    <tr class="patent-row">
                      <td class="text-center fw-bold text-muted">3</td>
                      <td class="fw-semibold text-dark">Dr. Mukesh Tiwari</td>
                      <td>
                        <strong class="text-primary-emphasis d-block">Energy management in microgrid with dynamic distributed generation via Deep Neural Network</strong>
                      </td>
                      <td>
                        <code class="text-dark bg-light px-2 py-1 rounded border small fw-bold">202321013444</code>
                      </td>
                      <td class="text-center">
                        <span class="pat-badge-status pat-badge-published"><i class="fa-solid fa-file-lines"></i> Filed &amp; Published</span>
                      </td>
                    </tr>
                    <tr class="patent-row">
                      <td class="text-center fw-bold text-muted">4</td>
                      <td class="fw-semibold text-dark">Dr. R.P. Singh</td>
                      <td>
                        <strong class="text-primary-emphasis d-block">Smart waste management in IoT</strong>
                      </td>
                      <td>
                        <code class="text-dark bg-light px-2 py-1 rounded border small fw-bold">202321013446</code>
                      </td>
                      <td class="text-center">
                        <span class="pat-badge-status pat-badge-published"><i class="fa-solid fa-file-lines"></i> Filed &amp; Published</span>
                      </td>
                    </tr>
                    <tr class="patent-row">
                      <td class="text-center fw-bold text-muted">5</td>
                      <td class="fw-semibold text-dark">Dr. R.P. Singh</td>
                      <td>
                        <strong class="text-primary-emphasis d-block">Automated sorting and identification with optimal scheduling for smart logistics</strong>
                      </td>
                      <td>
                        <code class="text-dark bg-light px-2 py-1 rounded border small fw-bold">202321013445</code>
                      </td>
                      <td class="text-center">
                        <span class="pat-badge-status pat-badge-published"><i class="fa-solid fa-file-lines"></i> Filed &amp; Published</span>
                      </td>
                    </tr>
                    <tr class="patent-row">
                      <td class="text-center fw-bold text-muted">6</td>
                      <td class="fw-semibold text-dark">Dr. Jiterndra Sheetlani</td>
                      <td>
                        <strong class="text-primary-emphasis d-block">Advanced and secure wireless transaction method</strong>
                      </td>
                      <td>
                        <code class="text-dark bg-light px-2 py-1 rounded border small fw-bold">202321013454</code>
                      </td>
                      <td class="text-center">
                        <span class="pat-badge-status pat-badge-published"><i class="fa-solid fa-file-lines"></i> Filed &amp; Published</span>
                      </td>
                    </tr>
                    <tr class="patent-row">
                      <td class="text-center fw-bold text-muted">7</td>
                      <td class="fw-semibold text-dark">Dr. Jiterndra Sheetlani</td>
                      <td>
                        <strong class="text-primary-emphasis d-block">A smart agriculture vehicle utilizing multi sensor data fusion based on hybrid model</strong>
                      </td>
                      <td>
                        <code class="text-dark bg-light px-2 py-1 rounded border small fw-bold">202321013453</code>
                      </td>
                      <td class="text-center">
                        <span class="pat-badge-status pat-badge-published"><i class="fa-solid fa-file-lines"></i> Filed &amp; Published</span>
                      </td>
                    </tr>
                    <tr class="patent-row">
                      <td class="text-center fw-bold text-muted">8</td>
                      <td class="fw-semibold text-dark">Dr. Prabodh Kumar Khampariya</td>
                      <td>
                        <strong class="text-primary-emphasis d-block">Power line communications using high speed digital subscriber lines</strong>
                      </td>
                      <td>
                        <code class="text-dark bg-light px-2 py-1 rounded border small fw-bold">202321013452</code>
                      </td>
                      <td class="text-center">
                        <span class="pat-badge-status pat-badge-published"><i class="fa-solid fa-file-lines"></i> Filed &amp; Published</span>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- Year Section: 2022 -->
            <div class="pat-year-group mb-4" data-year="2022">
              <div class="d-flex align-items-center gap-3 mb-3">
                <span class="pat-year-badge">
                  <i class="fa-regular fa-calendar-check"></i> Year 2022
                </span>
                <span class="text-muted extra-small fw-semibold">3 Patent Records</span>
              </div>

              <div class="table-responsive">
                <table class="pat-modern-table table mb-0">
                  <thead>
                    <tr>
                      <th class="text-center" style="width: 70px;">S. No.</th>
                      <th style="width: 24%;">Name of Inventors</th>
                      <th style="width: 42%;">Title of Invention</th>
                      <th style="width: 18%;">Application / Patent No.</th>
                      <th class="text-center" style="width: 16%;">Granted / Published</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="patent-row">
                      <td class="text-center fw-bold text-muted">1</td>
                      <td class="fw-semibold text-dark">Dr. Neelesh Choubey</td>
                      <td>
                        <strong class="text-primary-emphasis d-block">Formulation and Evaluation of topical Herbal preparation as Antipsoriatics Activity</strong>
                      </td>
                      <td>
                        <code class="text-dark bg-light px-2 py-1 rounded border small fw-bold">202221008082</code>
                      </td>
                      <td class="text-center">
                        <span class="pat-badge-status pat-badge-published"><i class="fa-solid fa-file-lines"></i> Filed &amp; Published</span>
                      </td>
                    </tr>
                    <tr class="patent-row">
                      <td class="text-center fw-bold text-muted">2</td>
                      <td class="fw-semibold text-dark">Dr. C.K. Tyagi</td>
                      <td>
                        <strong class="text-primary-emphasis d-block">Formulation and Evaluation of floating in-situ gel of an Anti-hypertensive Drug</strong>
                      </td>
                      <td>
                        <code class="text-dark bg-light px-2 py-1 rounded border small fw-bold">202221008083</code>
                      </td>
                      <td class="text-center">
                        <span class="pat-badge-status pat-badge-published"><i class="fa-solid fa-file-lines"></i> Filed &amp; Published</span>
                      </td>
                    </tr>
                    <tr class="patent-row">
                      <td class="text-center fw-bold text-muted">3</td>
                      <td class="fw-semibold text-dark">Dr. Prabodh Kumar Khampariya</td>
                      <td>
                        <strong class="text-primary-emphasis d-block">A Process of Manufacturing of Highly Porous and Bio-Degradable Carbon Hybrid Nano-Materials using Plant and Waste Extracts</strong>
                      </td>
                      <td>
                        <code class="text-dark bg-light px-2 py-1 rounded border small fw-bold">202221008084</code>
                      </td>
                      <td class="text-center">
                        <span class="pat-badge-status pat-badge-published"><i class="fa-solid fa-file-lines"></i> Filed &amp; Published</span>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- Year Section: 2021 -->
            <div class="pat-year-group mb-4" data-year="2021">
              <div class="d-flex align-items-center gap-3 mb-3">
                <span class="pat-year-badge">
                  <i class="fa-regular fa-calendar-check"></i> Year 2021
                </span>
                <span class="text-muted extra-small fw-semibold">13 Patent Records</span>
              </div>

              <div class="table-responsive">
                <table class="pat-modern-table table mb-0">
                  <thead>
                    <tr>
                      <th class="text-center" style="width: 70px;">S. No.</th>
                      <th style="width: 24%;">Name of Inventors</th>
                      <th style="width: 42%;">Title of Invention</th>
                      <th style="width: 18%;">Application / Patent No.</th>
                      <th class="text-center" style="width: 16%;">Granted / Published</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="patent-row">
                      <td class="text-center fw-bold text-muted">1</td>
                      <td class="fw-semibold text-dark">Dr. Jitendra Sheetlani</td>
                      <td>
                        <strong class="text-primary-emphasis d-block">A hybrid machine learning based data transmission in distributed sensor network</strong>
                      </td>
                      <td>
                        <code class="text-dark bg-light px-2 py-1 rounded border small fw-bold">202111003460</code>
                      </td>
                      <td class="text-center">
                        <span class="pat-badge-status pat-badge-published"><i class="fa-solid fa-file-lines"></i> Filed &amp; Published</span>
                      </td>
                    </tr>
                    <tr class="patent-row">
                      <td class="text-center fw-bold text-muted">2</td>
                      <td class="fw-semibold text-dark">Dr. Jitendra Sheetlani</td>
                      <td>
                        <strong class="text-primary-emphasis d-block">Automatic Detection of the presence of humans/animals trapped inside a moving vehicle/School bus using deep learning</strong>
                      </td>
                      <td>
                        <code class="text-dark bg-light px-2 py-1 rounded border small fw-bold">202141011409</code>
                      </td>
                      <td class="text-center">
                        <span class="pat-badge-status pat-badge-published"><i class="fa-solid fa-file-lines"></i> Filed &amp; Published</span>
                      </td>
                    </tr>
                    <tr class="patent-row">
                      <td class="text-center fw-bold text-muted">3</td>
                      <td class="fw-semibold text-dark">Dr. G.R. Selokar</td>
                      <td>
                        <strong class="text-primary-emphasis d-block">Anti-smuggling alarming unit for trees in forest</strong>
                      </td>
                      <td>
                        <code class="text-dark bg-light px-2 py-1 rounded border small fw-bold">202141011413</code>
                      </td>
                      <td class="text-center">
                        <span class="pat-badge-status pat-badge-published"><i class="fa-solid fa-file-lines"></i> Filed &amp; Published</span>
                      </td>
                    </tr>
                    <tr class="patent-row">
                      <td class="text-center fw-bold text-muted">4</td>
                      <td class="fw-semibold text-dark">Dr. Prabodh Kumar Khampariya</td>
                      <td>
                        <strong class="text-primary-emphasis d-block">An automated medical diagnostic machine for smart remote health monitoring with thermal imaging</strong>
                      </td>
                      <td>
                        <code class="text-dark bg-light px-2 py-1 rounded border small fw-bold">202141011411</code>
                      </td>
                      <td class="text-center">
                        <span class="pat-badge-status pat-badge-published"><i class="fa-solid fa-file-lines"></i> Filed &amp; Published</span>
                      </td>
                    </tr>
                    <tr class="patent-row">
                      <td class="text-center fw-bold text-muted">5</td>
                      <td class="fw-semibold text-dark">Dr. Jitendra Sheetlani</td>
                      <td>
                        <strong class="text-primary-emphasis d-block">Predictive health care tracking system for rural/tribal using machine learning and internet of things</strong>
                      </td>
                      <td>
                        <code class="text-dark bg-light px-2 py-1 rounded border small fw-bold">202141011412</code>
                      </td>
                      <td class="text-center">
                        <span class="pat-badge-status pat-badge-published"><i class="fa-solid fa-file-lines"></i> Filed &amp; Published</span>
                      </td>
                    </tr>
                    <tr class="patent-row">
                      <td class="text-center fw-bold text-muted">6</td>
                      <td class="fw-semibold text-dark">Dr. R.P. Singh</td>
                      <td>
                        <strong class="text-primary-emphasis d-block">Cloud computing enabled internet of things framework for effective control in high penetration renewable energy resources in smart city</strong>
                      </td>
                      <td>
                        <code class="text-dark bg-light px-2 py-1 rounded border small fw-bold">202141011414</code>
                      </td>
                      <td class="text-center">
                        <span class="pat-badge-status pat-badge-published"><i class="fa-solid fa-file-lines"></i> Filed &amp; Published</span>
                      </td>
                    </tr>
                    <tr class="patent-row">
                      <td class="text-center fw-bold text-muted">7</td>
                      <td class="fw-semibold text-dark">Dr. Hemant Sharma</td>
                      <td>
                        <strong class="text-primary-emphasis d-block">A smart and automated vehicle breakdown safety mechanism for road safety using internet of things and big data</strong>
                      </td>
                      <td>
                        <code class="text-dark bg-light px-2 py-1 rounded border small fw-bold">202141011415</code>
                      </td>
                      <td class="text-center">
                        <span class="pat-badge-status pat-badge-published"><i class="fa-solid fa-file-lines"></i> Filed &amp; Published</span>
                      </td>
                    </tr>
                    <tr class="patent-row">
                      <td class="text-center fw-bold text-muted">8</td>
                      <td class="fw-semibold text-dark">Dr. Neelesh Choubey</td>
                      <td>
                        <strong class="text-primary-emphasis d-block">A novel topical gel composition for treating diabetes using herbal extracts and method of preparation thereof</strong>
                      </td>
                      <td>
                        <code class="text-dark bg-light px-2 py-1 rounded border small fw-bold">202121013725</code>
                      </td>
                      <td class="text-center">
                        <span class="pat-badge-status pat-badge-published"><i class="fa-solid fa-file-lines"></i> Filed &amp; Published</span>
                      </td>
                    </tr>
                    <tr class="patent-row">
                      <td class="text-center fw-bold text-muted">9</td>
                      <td class="fw-semibold text-dark">Dr. C.K. Tyagi</td>
                      <td>
                        <strong class="text-primary-emphasis d-block">A novel herbal based anthelmintic syrup and method of preparation thereof</strong>
                      </td>
                      <td>
                        <code class="text-dark bg-light px-2 py-1 rounded border small fw-bold">202121013726</code>
                      </td>
                      <td class="text-center">
                        <span class="pat-badge-status pat-badge-published"><i class="fa-solid fa-file-lines"></i> Filed &amp; Published</span>
                      </td>
                    </tr>
                    <tr class="patent-row">
                      <td class="text-center fw-bold text-muted">10</td>
                      <td class="fw-semibold text-dark">Dr. G. R. Selokar</td>
                      <td>
                        <strong class="text-primary-emphasis d-block">System for continuous measurement and visualization of tool wear in high speed cutting using IOT and Machine learning</strong>
                      </td>
                      <td>
                        <code class="text-dark bg-light px-2 py-1 rounded border small fw-bold">202141011408</code>
                      </td>
                      <td class="text-center">
                        <span class="pat-badge-status pat-badge-published"><i class="fa-solid fa-file-lines"></i> Filed &amp; Published</span>
                      </td>
                    </tr>
                    <tr class="patent-row">
                      <td class="text-center fw-bold text-muted">11</td>
                      <td class="fw-semibold text-dark">Dr. Mukesh Tiwari</td>
                      <td>
                        <strong class="text-primary-emphasis d-block">Smart dustbin with trash compactor and fill level indicator</strong>
                      </td>
                      <td>
                        <code class="text-dark bg-light px-2 py-1 rounded border small fw-bold">202141001894</code>
                      </td>
                      <td class="text-center">
                        <span class="pat-badge-status pat-badge-published"><i class="fa-solid fa-file-lines"></i> Filed &amp; Published</span>
                      </td>
                    </tr>
                    <tr class="patent-row">
                      <td class="text-center fw-bold text-muted">12</td>
                      <td class="fw-semibold text-dark">Dr. Mukesh Tiwari</td>
                      <td>
                        <strong class="text-primary-emphasis d-block">Development of multi-sensor data fusion based intelligent autonomous robotic vehicle</strong>
                      </td>
                      <td>
                        <code class="text-dark bg-light px-2 py-1 rounded border small fw-bold">202141001895</code>
                      </td>
                      <td class="text-center">
                        <span class="pat-badge-status pat-badge-published"><i class="fa-solid fa-file-lines"></i> Filed &amp; Published</span>
                      </td>
                    </tr>
                    <tr class="patent-row">
                      <td class="text-center fw-bold text-muted">13</td>
                      <td class="fw-semibold text-dark">Dr. Prabodh Kumar Khampariya</td>
                      <td>
                        <strong class="text-primary-emphasis d-block">Solar Powered Escalator</strong>
                      </td>
                      <td>
                        <code class="text-dark bg-light px-2 py-1 rounded border small fw-bold">202141017941</code>
                      </td>
                      <td class="text-center">
                        <span class="pat-badge-status pat-badge-published"><i class="fa-solid fa-file-lines"></i> Filed &amp; Published</span>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- Year Section: 2020 -->
            <div class="pat-year-group mb-4" data-year="2020">
              <div class="d-flex align-items-center gap-3 mb-3">
                <span class="pat-year-badge">
                  <i class="fa-regular fa-calendar-check"></i> Year 2020
                </span>
                <span class="text-muted extra-small fw-semibold">4 Patent Records</span>
              </div>

              <div class="table-responsive">
                <table class="pat-modern-table table mb-0">
                  <thead>
                    <tr>
                      <th class="text-center" style="width: 70px;">S. No.</th>
                      <th style="width: 24%;">Name of Inventors</th>
                      <th style="width: 42%;">Title of Invention</th>
                      <th style="width: 18%;">Application / Patent No.</th>
                      <th class="text-center" style="width: 16%;">Granted / Published</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="patent-row">
                      <td class="text-center fw-bold text-muted">1</td>
                      <td class="fw-semibold text-dark">Dr. G. R. Selokar</td>
                      <td>
                        <strong class="text-primary-emphasis d-block">Non-Conventional grooved stepped shoe ribs</strong>
                      </td>
                      <td>
                        <code class="text-dark bg-light px-2 py-1 rounded border small fw-bold">202021003931</code>
                      </td>
                      <td class="text-center">
                        <span class="pat-badge-status pat-badge-published"><i class="fa-solid fa-file-lines"></i> Filed &amp; Published</span>
                      </td>
                    </tr>
                    <tr class="patent-row">
                      <td class="text-center fw-bold text-muted">2</td>
                      <td class="fw-semibold text-dark">Dr. Jitendra Sheetlani</td>
                      <td>
                        <strong class="text-primary-emphasis d-block">Night Patrol System Based On IoT And Radio Frequency Identification</strong>
                      </td>
                      <td>
                        <code class="text-dark bg-light px-2 py-1 rounded border small fw-bold">202021039031</code>
                      </td>
                      <td class="text-center">
                        <span class="pat-badge-status pat-badge-published"><i class="fa-solid fa-file-lines"></i> Filed &amp; Published</span>
                      </td>
                    </tr>
                    <tr class="patent-row">
                      <td class="text-center fw-bold text-muted">3</td>
                      <td class="fw-semibold text-dark">Dr. Neelesh Choubey</td>
                      <td>
                        <strong class="text-primary-emphasis d-block">A Poly herbal formulation for treatment of liver disorder and method of preparation</strong>
                      </td>
                      <td>
                        <code class="text-dark bg-light px-2 py-1 rounded border small fw-bold">202021051557</code>
                      </td>
                      <td class="text-center">
                        <span class="pat-badge-status pat-badge-published"><i class="fa-solid fa-file-lines"></i> Filed &amp; Published</span>
                      </td>
                    </tr>
                    <tr class="patent-row">
                      <td class="text-center fw-bold text-muted">4</td>
                      <td class="fw-semibold text-dark">Dr. C. K. Tyagi</td>
                      <td>
                        <strong class="text-primary-emphasis d-block">A pharmaceutical composition comprising a compressed polyherbal tablets for the treatment of infections caused by helminthes</strong>
                      </td>
                      <td>
                        <code class="text-dark bg-light px-2 py-1 rounded border small fw-bold">202021042927</code>
                      </td>
                      <td class="text-center">
                        <span class="pat-badge-status pat-badge-published"><i class="fa-solid fa-file-lines"></i> Filed &amp; Published</span>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div><!-- end pat-content-body -->
        </div><!-- end pat-main-card -->
      </div><!-- end col-lg-8 -->

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
  var searchInput = document.getElementById('patentSearchInput');
  if (searchInput) {
    searchInput.addEventListener('input', function() {
      var query = this.value.toLowerCase().trim();
      var groups = document.querySelectorAll('.pat-year-group');
      
      groups.forEach(function(group) {
        var rows = group.querySelectorAll('.patent-row');
        var groupVisibleCount = 0;
        
        rows.forEach(function(row) {
          var text = row.textContent.toLowerCase();
          if (!query || text.indexOf(query) !== -1) {
            row.style.display = '';
            groupVisibleCount++;
          } else {
            row.style.display = 'none';
          }
        });
        
        if (groupVisibleCount === 0) {
          group.style.display = 'none';
        } else {
          group.style.display = '';
        }
      });
    });
  }
});
</script>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
