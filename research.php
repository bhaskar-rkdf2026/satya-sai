<?php
$page_title = 'research - SSSUTMS';
$banner_title = 'research';
$banner_category = 'SSSUTMS';

require_once __DIR__ . '/./config.php';
require_once __DIR__ . '/./includes/header.php';
require_once __DIR__ . '/./includes/topbar.php';
require_once __DIR__ . '/./includes/navbar.php';
require_once __DIR__ . '/./includes/page-banner.php';
?>

<section class="subpage-main-section py-4 bg-light">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="content-card">
          <div class="content-card-body">
            <!-- Page Header Breadcrumb -->
<div class="py-5 text-white" style="background: var(--primary-gradient);">
  <div class="container-fluid px-lg-5">
    <h1 class="fw-bold text-white mb-2">Research, Innovation & Collaborations</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="index.php" class="text-warning">Home</a></li>
        <li class="breadcrumb-item active text-white-50" aria-current="page">R & D Cell & Patents</li>
      </ol>
    </nav>
  </div>
</div>

<div class="container-fluid px-lg-5 py-5">

<!-- Left Column: Research Content -->
    <div class="col-lg-8">
      
      <!-- Section 1: R&D Cell Overview -->
      <div id="rd-cell" class="card border-0 shadow-sm rounded-4 p-4 mb-4 bg-white">
        <span class="section-subtitle">Discovery & Science</span>
        <h3 class="section-title">Research & Development Cell</h3>
        <div class="section-divider mb-4"></div>
        <p class="text-muted">
          The Research and Development (R&D) Cell at Sri Satya Sai University provides an ecosystem for high-impact interdisciplinary investigations across Engineering, Pharmaceutical Sciences, Ayurvedic Medicine, Clinical Healthcare, and Artificial Intelligence.
        </p>
        <p class="text-muted">
          Our research policy encourages faculty and scholars through seed funding, international conference sponsorship, journal publication incentives, and comprehensive patent filing assistance through the University Innovation & IPR Cell.
        </p>
      </div>

      <!-- Section 2: Patents Published & Granted -->
      <div id="patents" class="card border-0 shadow-sm rounded-4 p-4 mb-4 bg-white">
        <span class="section-subtitle">Intellectual Property</span>
        <h3 class="section-title">Patents & Innovation Highlights</h3>
        <div class="section-divider mb-4"></div>

        <div class="table-responsive">
          <table class="table table-hover table-bordered align-middle">
            <thead class="table-light">
              <tr>
                <th>Patent Title</th>
                <th>Inventor(s) / Faculty</th>
                <th>Application / Patent No.</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><strong>Smart IoT-Based Automated Herbal Extraction & Quality Monitoring System</strong></td>
                <td>Department of Pharmacy & CSE</td>
                <td>202521045982 A</td>
                <td><span class="badge bg-success">Published</span></td>
              </tr>
              <tr>
                <td><strong>Novel Phytochemical Formulation for Anti-Inflammatory Ayurvedic Delivery</strong></td>
                <td>School of Ayurveda & Medical Sciences</td>
                <td>202521034821 A</td>
                <td><span class="badge bg-success">Published</span></td>
              </tr>
              <tr>
                <td><strong>Solar-Powered Hybrid Irrigation & Soil Moisture Sensor for Agricultural Automation</strong></td>
                <td>Faculty of Engineering & Tech</td>
                <td>202421019842 A</td>
                <td><span class="badge bg-primary">Granted</span></td>
              </tr>
              <tr>
                <td><strong>AI-Powered Diagnostic Assistance System for Diagnostic Radiography</strong></td>
                <td>Department of Computer Applications</td>
                <td>202421008712 A</td>
                <td><span class="badge bg-success">Published</span></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Section 3: Collaborations & MoUs -->
      <div id="mous" class="card border-0 shadow-sm rounded-4 p-4 bg-white">
        <span class="section-subtitle">Global Connect</span>
        <h3 class="section-title">Institutional MoUs & Collaborations</h3>
        <div class="section-divider mb-4"></div>

<div class="col-md-6">
            <div class="p-3 border rounded-3 bg-light">
              <h6 class="fw-bold text-primary mb-1"><i class="fa fa-handshake me-2"></i> Industrial MoUs</h6>
              <p class="small text-muted mb-0">Collaborations with multinational corporations for student internships, live technical projects, and industrial visits.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="p-3 border rounded-3 bg-light">
              <h6 class="fw-bold text-primary mb-1"><i class="fa fa-hospital me-2"></i> Clinical & Healthcare MoUs</h6>
              <p class="small text-muted mb-0">MoUs with leading government & private hospitals for rotatory clinical training of BAMS, BHMS, and Nursing students.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="p-3 border rounded-3 bg-light">
              <h6 class="fw-bold text-primary mb-1"><i class="fa fa-shield me-2"></i> NCC & Youth Development</h6>
              <p class="small text-muted mb-0">Active NCC Unit and NSS Youth Forums conducting disaster relief camps and social hygiene drives.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="p-3 border rounded-3 bg-light">
              <h6 class="fw-bold text-primary mb-1"><i class="fa fa-graduation-cap me-2"></i> Academic MoUs</h6>
              <p class="small text-muted mb-0">Faculty exchange, joint international conferences, and NPTEL local chapter e-learning resources.</p>
          </div>
        </div>
      </div>

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/./includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/./includes/footer.php'; ?>