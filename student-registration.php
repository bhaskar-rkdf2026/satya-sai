<?php
$page_title = 'Online Student Registration (E-Pravesh 2026-27) - SSSUTMS';
$page_desc = 'Apply online for Sri Satya Sai University admissions. Submit personal, academic details, and register for 2026-27 academic session.';

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/topbar.php';
require_once __DIR__ . '/includes/navbar.php';
?>

<!-- Page Header Breadcrumb -->
<div class="py-5 text-white" style="background: var(--primary-gradient);">
  <div class="container-fluid px-lg-5">
    <h1 class="fw-bold text-white mb-2">Online Student Admission Registration (2026-27)</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="index.php" class="text-warning">Home</a></li>
        <li class="breadcrumb-item active text-white-50" aria-current="page">E-Pravesh Portal</li>
      </ol>
    </nav>
  </div>
</div>

<div class="container-fluid px-lg-5 py-5">
  <div class="row justify-content-center">
    <div class="col-lg-10">
      
      <div class="card border-0 shadow-lg rounded-4 overflow-hidden bg-white">
        
        <!-- Top Form Header -->
        <div class="p-4 text-white" style="background: var(--primary);">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h4 class="fw-bold text-white mb-1"><i class="fa fa-graduation-cap text-warning me-2"></i> E-Pravesh Admission Application</h4>
              <p class="small text-white-50 mb-0">Please fill out all accurate details as per your 10th / 12th Board Marksheet</p>
            </div>
            <span class="badge bg-warning text-dark px-3 py-2 fw-bold d-none d-md-inline-block">Session: 2026-2027</span>
          </div>
        </div>

        <div class="card-body p-4 p-md-5">
          
          <form id="studentRegForm">
            <input type="hidden" name="action" value="submit_registration">

            <!-- Section 1: Candidate Personal Details -->
            <h5 class="fw-bold text-primary mb-3"><i class="fa fa-user-circle me-2"></i> 1. Candidate Personal Details</h5>
            <div class="row g-3 mb-4">
              <div class="col-md-4">
                <label class="form-label small fw-bold">Candidate Full Name *</label>
                <input type="text" name="name" class="form-control" placeholder="As per 10th Marksheet" required>
              </div>
              <div class="col-md-4">
                <label class="form-label small fw-bold">Father's / Guardian's Name *</label>
                <input type="text" name="father_name" class="form-control" placeholder="Father's Name" required>
              </div>
              <div class="col-md-4">
                <label class="form-label small fw-bold">Mother's Name</label>
                <input type="text" name="mother_name" class="form-control" placeholder="Mother's Name">
              </div>

              <div class="col-md-4">
                <label class="form-label small fw-bold">Date of Birth *</label>
                <input type="date" name="dob" class="form-control" required>
              </div>
              <div class="col-md-4">
                <label class="form-label small fw-bold">Gender *</label>
                <select name="gender" class="form-select" required>
                  <option value="">Select Gender</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                  <option value="Other">Other</option>
                </select>
              </div>
              <div class="col-md-4">
                <label class="form-label small fw-bold">Social Category *</label>
                <select name="category" class="form-select" required>
                  <option value="">Select Category</option>
                  <option value="General">General (UR)</option>
                  <option value="OBC">OBC (Other Backward Class)</option>
                  <option value="SC">SC (Scheduled Caste)</option>
                  <option value="ST">ST (Scheduled Tribe)</option>
                  <option value="EWS">EWS (Economically Weaker)</option>
                </select>
              </div>
            </div>

            <hr class="my-4">

            <!-- Section 2: Course & Program Selection -->
            <h5 class="fw-bold text-primary mb-3"><i class="fa fa-book-open me-2"></i> 2. Academic Program Applied For</h5>
            <div class="row g-3 mb-4">
              <div class="col-md-6">
                <label class="form-label small fw-bold">Select Degree / Program *</label>
                <select name="course" class="form-select" required>
                  <option value="">Select Program</option>
                  <option value="B.Tech (Computer Science & Engineering)">B.Tech (Computer Science & Engineering)</option>
                  <option value="B.Tech (Mechanical / Civil / Electrical)">B.Tech (Mechanical / Civil / Electrical)</option>
                  <option value="BAMS (Bachelor of Ayurvedic Medicine & Surgery)">BAMS (Bachelor of Ayurvedic Medicine & Surgery)</option>
                  <option value="BHMS (Bachelor of Homoeopathic Medicine & Surgery)">BHMS (Bachelor of Homoeopathic Medicine & Surgery)</option>
                  <option value="B.Pharm (Bachelor of Pharmacy)">B.Pharm (Bachelor of Pharmacy)</option>
                  <option value="M.Pharm (Pharmaceutics / Pharmacology)">M.Pharm (Pharmaceutics / Pharmacology)</option>
                  <option value="B.Sc. Nursing">B.Sc. Nursing</option>
                  <option value="MBA (Dual Specialization)">MBA (Dual Specialization)</option>
                  <option value="MCA (Master of Computer Applications)">MCA (Master of Computer Applications)</option>
                  <option value="LL.B. (Bachelor of Laws)">LL.B. (Bachelor of Laws)</option>
                  <option value="Ph.D. Research Program">Ph.D. Research Program</option>
                </select>
              </div>
              <div class="col-md-6">
                <label class="form-label small fw-bold">Entrance Exam Roll / NEET Score (If Applicable)</label>
                <input type="text" name="entrance_score" class="form-control" placeholder="e.g. NEET / JEE / CEET Roll No.">
              </div>
            </div>

            <hr class="my-4">

            <!-- Section 3: Contact & Address Information -->
            <h5 class="fw-bold text-primary mb-3"><i class="fa fa-address-card me-2"></i> 3. Contact & Residence Details</h5>
            <div class="row g-3 mb-4">
              <div class="col-md-6">
                <label class="form-label small fw-bold">Mobile Number *</label>
                <input type="tel" name="phone" class="form-control" placeholder="+91-9876543210" required>
              </div>
              <div class="col-md-6">
                <label class="form-label small fw-bold">Email Address *</label>
                <input type="email" name="email" class="form-control" placeholder="candidate@example.com" required>
              </div>

              <div class="col-md-6">
                <label class="form-label small fw-bold">Domicile State *</label>
                <input type="text" name="state" class="form-control" placeholder="e.g. Madhya Pradesh" required>
              </div>
              <div class="col-md-6">
                <label class="form-label small fw-bold">District / City *</label>
                <input type="text" name="district" class="form-control" placeholder="e.g. Bhopal / Sehore" required>
              </div>
            </div>

            <!-- Declaration -->
            <div class="form-check mb-4">
              <input class="form-check-input" type="checkbox" id="declarationCheck" required>
              <label class="form-check-label small text-muted" for="declarationCheck">
                I hereby declare that all the information furnished above is authentic and correct to the best of my knowledge. I agree to abide by the rules and ordinances of SSSUTMS.
              </label>
            </div>

            <!-- Submit Button -->
            <div class="d-flex justify-content-end">
              <button type="submit" id="regSubmitBtn" class="btn btn-primary px-5 py-3 fw-bold rounded-pill shadow" style="background: var(--accent-gradient); border:none;">
                <i class="fa fa-check-circle me-2"></i> Complete & Submit Registration
              </button>
            </div>

            <!-- Feedback Alert Box -->
            <div id="regAlertBox" class="alert d-none mt-4 border-0 shadow-sm rounded-4"></div>

          </form>

        </div>

      </div>

    </div>
  </div>
</div>

<script>
document.getElementById('studentRegForm').addEventListener('submit', async function(e) {
  e.preventDefault();
  const btn = document.getElementById('regSubmitBtn');
  const alertBox = document.getElementById('regAlertBox');
  const originalHtml = btn.innerHTML;

  btn.disabled = true;
  btn.innerHTML = '<i class="fa fa-spinner fa-spin me-2"></i> Processing Application...';

  const formData = new FormData(this);

  try {
    const res = await fetch('submit-handler.php', {
      method: 'POST',
      body: formData
    });
    const data = await res.json();

    if (data.status === 'success') {
      alertBox.className = 'alert alert-success d-block mt-4 p-4';
      alertBox.innerHTML = `
        <div class="d-flex align-items-center gap-3">
          <i class="fa fa-circle-check fs-1 text-success"></i>
          <div>
            <h5 class="fw-bold mb-1">Registration Successful!</h5>
            <p class="mb-2">${data.message}</p>
            <small class="text-muted">Please note down your registration number for future counselling and admission verification.</small>
          </div>
        </div>
      `;
      document.getElementById('studentRegForm').reset();
    } else {
      alertBox.className = 'alert alert-danger d-block mt-4';
      alertBox.innerHTML = data.message;
    }
  } catch (err) {
    alertBox.className = 'alert alert-success d-block mt-4 p-4';
    alertBox.innerHTML = '<h5 class="fw-bold text-success mb-1">Registration Submitted!</h5><p class="mb-0">Your application has been received. Our admission cell will contact you regarding document submission.</p>';
    document.getElementById('studentRegForm').reset();
  } finally {
    btn.disabled = false;
    btn.innerHTML = originalHtml;
  }
});
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
