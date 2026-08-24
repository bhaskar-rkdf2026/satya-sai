<?php
$page_title = 'Online Marksheet & Document Verification - SSSUTMS';
$page_desc = 'Verify degrees, diplomas, and grade marksheets issued by Sri Satya Sai University of Technology & Medical Sciences.';

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/topbar.php';
require_once __DIR__ . '/includes/navbar.php';
?>

<!-- Page Header Breadcrumb -->
<div class="py-5 text-white" style="background: var(--primary-gradient);">
  <div class="container-fluid px-lg-5">
    <h1 class="fw-bold text-white mb-2">Online Document & Marksheet Verification</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="index.php" class="text-warning">Home</a></li>
        <li class="breadcrumb-item active text-white-50" aria-current="page">Marksheet Verification</li>
      </ol>
    </nav>
  </div>
</div>

<div class="container-fluid px-lg-5 py-5">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      
      <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white">
        <div class="text-center mb-4">
          <div class="p-3 bg-success-subtle text-success rounded-circle d-inline-flex fs-1 mb-2">
            <i class="fa fa-shield-halved"></i>
          </div>
          <h3 class="fw-bold text-primary mb-1">University Marksheet Verification Portal</h3>
          <p class="small text-muted">Authorized document verification service for organizations, recruiters, and scholars</p>
        </div>

        <form id="verifyForm" onsubmit="event.preventDefault(); document.getElementById('verifyResult').classList.remove('d-none');">
          <div class="row g-3 mb-4">
            <div class="col-md-6">
              <label class="form-label small fw-bold">Enrollment Number *</label>
              <input type="text" class="form-control" placeholder="e.g. SSS2023-1045" required>
            </div>
            <div class="col-md-6">
              <label class="form-label small fw-bold">Roll Number / Certificate Serial *</label>
              <input type="text" class="form-control" placeholder="e.g. 2023-BTECH-045" required>
            </div>
            <div class="col-md-6">
              <label class="form-label small fw-bold">Year of Passing *</label>
              <select class="form-select" required>
                <option value="">Select Year</option>
                <option value="2026">2026</option>
                <option value="2025">2025</option>
                <option value="2024">2024</option>
                <option value="2023">2023</option>
                <option value="2022">2022</option>
                <option value="2021">2021</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label small fw-bold">Program / Faculty *</label>
              <select class="form-select" required>
                <option value="">Select Faculty</option>
                <option value="engg">Engineering & Technology</option>
                <option value="pharma">Pharmacy</option>
                <option value="medical">Ayurveda / Medical</option>
                <option value="mgmt">Management / MCA</option>
              </select>
            </div>
          </div>

          <button type="submit" class="btn btn-success w-100 py-3 fw-bold rounded-pill shadow-sm">
            <i class="fa fa-magnifying-glass me-2"></i> Verify Academic Record
          </button>
        </form>

        <!-- Digital Verification Seal Card -->
        <div id="verifyResult" class="card border-success border-2 shadow-sm rounded-4 p-4 mt-5 d-none bg-light">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <span class="badge bg-success px-3 py-2 fs-6"><i class="fa fa-circle-check me-1"></i> RECORD VERIFIED & GENUINE</span>
            <small class="text-muted"><i class="fa fa-clock me-1"></i> Verified on <?php echo date('d-M-Y H:i'); ?></small>
          </div>

          <div class="row g-2 small mb-3">
            <div class="col-sm-6"><strong>Student Name:</strong> SSSUTMS Enrolled Scholar</div>
            <div class="col-sm-6"><strong>Enrollment No:</strong> SSS2023-1045</div>
            <div class="col-sm-6"><strong>Program:</strong> Bachelor of Technology (CSE)</div>
            <div class="col-sm-6"><strong>Division:</strong> First Class with Distinction</div>
            <div class="col-sm-6"><strong>Institute:</strong> Sri Satya Sai University, Sehore</div>
            <div class="col-sm-6"><strong>Verification Ref:</strong> VRF-2026-981240</div>
          </div>

          <div class="p-3 bg-white rounded-3 border d-flex justify-content-between align-items-center">
            <div class="small text-muted">
              <i class="fa fa-lock text-success me-1"></i> Digitally sealed by the Controller of Examinations, SSSUTMS.
            </div>
            <button class="btn btn-sm btn-outline-primary" onclick="window.print()"><i class="fa fa-print me-1"></i> Print Verification</button>
          </div>
        </div>

      </div>

    </div>
  </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
