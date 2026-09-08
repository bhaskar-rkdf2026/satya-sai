<?php
$page_title = 'Admission Enquiry - SSSUTMS';
$banner_title = 'Admission Enquiry';
$banner_category = 'Admission';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?>

<style>
.ae-section { 
  background-color: #f8fafc;
  font-family: 'Inter', system-ui, -apple-system, sans-serif;
}

.ae-main-wrapper {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}

.ae-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2.2rem 2rem;
  position: relative;
}
.ae-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}

.ae-stat-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 10px 14px;
  display: flex; 
  align-items: center; 
  gap: 12px;
  height: 100%;
  transition: all 0.25s ease;
  box-shadow: 0 2px 8px rgba(0,0,0,0.02);
}
.ae-stat-card:hover {
  border-color: #f59e0b;
  box-shadow: 0 6px 16px rgba(11,37,69,0.08);
  transform: translateY(-2px);
}
.ae-stat-icon {
  width: 40px; 
  height: 40px;
  border-radius: 10px;
  background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%);
  color: #d97706;
  border: 1px solid #fde68a;
  display: flex; 
  align-items: center; 
  justify-content: center;
  font-size: 1.15rem; 
  flex-shrink: 0;
}

.ae-reg-btn {
  background: linear-gradient(135deg, #0b2545 0%, #1e4d8c 100%);
  color: #ffffff !important;
  font-weight: 700;
  font-size: 0.9rem;
  padding: 10px 20px;
  border-radius: 12px;
  display: inline-flex;
  align-items: center;
  gap: 8px;
  text-decoration: none !important;
  box-shadow: 0 4px 14px rgba(11,37,69,0.15);
  transition: all 0.25s ease;
}
.ae-reg-btn:hover {
  background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
  color: #ffffff !important;
  transform: translateY(-2px);
  box-shadow: 0 6px 20px rgba(217,119,6,0.3);
}

.ae-school-badge {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 1rem 1.25rem;
  height: 100%;
  transition: all 0.25s ease;
}
.ae-school-badge:hover {
  background: #ffffff;
  border-color: #bfdbfe;
  box-shadow: 0 4px 14px rgba(11, 37, 69, 0.05);
  transform: translateY(-2px);
}

/* Attached Enquiry Form Card Styling */
.ae-form-card {
  background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
  border: 2px solid #e2e8f0;
  border-top: 4px solid #f59e0b;
  border-radius: 20px;
  padding: 2rem;
  box-shadow: 0 10px 30px rgba(11, 37, 69, 0.08);
}
.ae-form-title {
  display: flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 1.5rem;
  padding-bottom: 1rem;
  border-bottom: 2px solid #f1f5f9;
}
.ae-form-title i {
  color: #f59e0b;
  font-size: 1.5rem;
}
</style>

<section class="subpage-main-section ae-section py-4 py-md-5">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="ae-main-wrapper">

          <!-- Header Banner -->
          <div class="ae-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-graduation-cap me-1"></i> Admission Desk 2026-27
              </span>
              <h3 class="fw-bold text-white mb-1 fs-3">ADMISSION ENQUIRY</h3>
              <p class="text-white-50 mb-0 small">Get Guidance, Counseling &amp; Course Information from Academic Experts</p>
            </div>
            <div>
              <a href="<?php echo BASE_URL; ?>Admission/AdmissionRegistration.php" class="ae-reg-btn">
                <i class="fa-solid fa-user-plus me-1"></i> Online Admission Registration
              </a>
            </div>
          </div>

          <!-- Content Body -->
          <div class="p-3.5 p-md-4">

            <!-- Stat Chips -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-sm-6 col-md-3">
                <div class="ae-stat-card">
                  <div class="ae-stat-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                  <div>
                    <span class="text-muted extra-small uppercase fw-bold d-block">Academic Session</span>
                    <strong class="text-dark fs-6">2026 – 2027</strong>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="ae-stat-card">
                  <div class="ae-stat-icon"><i class="fa-solid fa-building-columns"></i></div>
                  <div>
                    <span class="text-muted extra-small uppercase fw-bold d-block">Constituent Units</span>
                    <strong class="text-dark fs-6">15 Schools</strong>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="ae-stat-card">
                  <div class="ae-stat-icon"><i class="fa-solid fa-headset"></i></div>
                  <div>
                    <span class="text-muted extra-small uppercase fw-bold d-block">Counseling Support</span>
                    <strong class="text-dark fs-6">Central Desk</strong>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="ae-stat-card">
                  <div class="ae-stat-icon"><i class="fa-solid fa-clock"></i></div>
                  <div>
                    <span class="text-muted extra-small uppercase fw-bold d-block">Desk Hours</span>
                    <strong class="text-dark fs-6">9:00 AM – 6:00 PM</strong>
                  </div>
                </div>
              </div>
            </div>

            <!-- Schools & Programs Covered Grid -->
            <div class="mb-4">
              <h5 class="fw-bold text-dark mb-3"><i class="fa-solid fa-layer-group text-warning me-2"></i>Schools &amp; Programs Open for Admission 2026-27</h5>
              <div class="row g-3">
                <div class="col-md-6 col-lg-4">
                  <div class="ae-school-badge">
                    <i class="fa-solid fa-gears text-warning fs-4 mb-2"></i>
                    <h6 class="fw-bold text-dark mb-1">School of Engineering</h6>
                    <p class="mb-0 extra-small text-muted">B.E. / B.Tech (Aeronautical, CSE, Civil, Mech, EE, EC, IT, Mining) &amp; M.Tech</p>
                  </div>
                </div>
                <div class="col-md-6 col-lg-4">
                  <div class="ae-school-badge">
                    <i class="fa-solid fa-pills text-warning fs-4 mb-2"></i>
                    <h6 class="fw-bold text-dark mb-1">School of Pharmacy</h6>
                    <p class="mb-0 extra-small text-muted">B.Pharm, D.Pharm, M.Pharm (Pharmaceutics / Pharmacology) &amp; D.Pharm (Ayurveda)</p>
                  </div>
                </div>
                <div class="col-md-6 col-lg-4">
                  <div class="ae-school-badge">
                    <i class="fa-solid fa-briefcase text-warning fs-4 mb-2"></i>
                    <h6 class="fw-bold text-dark mb-1">Management &amp; IT</h6>
                    <p class="mb-0 extra-small text-muted">MBA (Business Administration), BBA, MCA &amp; BCA (Computer Applications)</p>
                  </div>
                </div>
                <div class="col-md-6 col-lg-4">
                  <div class="ae-school-badge">
                    <i class="fa-solid fa-user-doctor text-warning fs-4 mb-2"></i>
                    <h6 class="fw-bold text-dark mb-1">Ayush &amp; Medical College</h6>
                    <p class="mb-0 extra-small text-muted">BAMS (Ayurveda) &amp; BHMS (Homeopathy) Medical Degree Programs</p>
                  </div>
                </div>
                <div class="col-md-6 col-lg-4">
                  <div class="ae-school-badge">
                    <i class="fa-solid fa-user-nurse text-warning fs-4 mb-2"></i>
                    <h6 class="fw-bold text-dark mb-1">Nursing &amp; Paramedical</h6>
                    <p class="mb-0 extra-small text-muted">B.Sc. Nursing, GNM, Post Basic Nursing, MPT, BPT, BMLT, DMLT &amp; X-Ray</p>
                  </div>
                </div>
                <div class="col-md-6 col-lg-4">
                  <div class="ae-school-badge">
                    <i class="fa-solid fa-scale-balanced text-warning fs-4 mb-2"></i>
                    <h6 class="fw-bold text-dark mb-1">Law, Agriculture &amp; Education</h6>
                    <p class="mb-0 extra-small text-muted">BA LLB, B.Com LLB, LLB, LLM, B.Sc (Hons) Ag, B.Sc, M.Sc, B.Ed &amp; M.Ed</p>
                  </div>
                </div>
              </div>
            </div>

            <!-- STANDARD ADMISSION ENQUIRY FORM -->
            <div class="ae-form-card" id="enquiryFormSection">
              <div class="ae-form-title">
                <i class="fa-solid fa-paper-plane text-warning"></i>
                <div>
                  <h4 class="fw-bold text-dark mb-0 fs-5">Admission Enquiry Form 2026-27</h4>
                  <span class="small text-muted">Fill out the form below to get direct callback &amp; fee structure guidance from our central admission desk</span>
                </div>
              </div>

              <form id="aeDirectForm" method="POST" action="<?php echo BASE_URL; ?>submit-handler.php">
                <input type="hidden" name="action" value="submit_inquiry">
                
                <div class="row g-3 mb-3">
                  <div class="col-md-6">
                    <label class="form-label fw-bold small text-dark">Student Full Name *</label>
                    <div class="input-group">
                      <span class="input-group-text bg-light border-end-0"><i class="fa-solid fa-user text-primary"></i></span>
                      <input type="text" name="name" class="form-control border-start-0" placeholder="Enter student's full name" required>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <label class="form-label fw-bold small text-dark">Mobile / WhatsApp Number *</label>
                    <div class="input-group">
                      <span class="input-group-text bg-light border-end-0"><i class="fa-solid fa-phone text-primary"></i></span>
                      <input type="tel" name="phone" class="form-control border-start-0" placeholder="+91-9876543210" pattern="[0-9]{10}" title="Ten digit mobile number" required>
                    </div>
                  </div>
                </div>

                <div class="row g-3 mb-3">
                  <div class="col-md-6">
                    <label class="form-label fw-bold small text-dark">Email Address *</label>
                    <div class="input-group">
                      <span class="input-group-text bg-light border-end-0"><i class="fa-solid fa-envelope text-primary"></i></span>
                      <input type="email" name="email" class="form-control border-start-0" placeholder="student@example.com" required>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <label class="form-label fw-bold small text-dark">City / State *</label>
                    <div class="input-group">
                      <span class="input-group-text bg-light border-end-0"><i class="fa-solid fa-location-dot text-primary"></i></span>
                      <input type="text" name="city" class="form-control border-start-0" placeholder="e.g. Bhopal, Madhya Pradesh" required>
                    </div>
                  </div>
                </div>

                <div class="row g-3 mb-3">
                  <div class="col-md-6">
                    <label class="form-label fw-bold small text-dark">Select Faculty / School *</label>
                    <select name="school" class="form-select" required>
                      <option value="">Select Faculty / School</option>
                      <option value="School of Engineering">School of Engineering (B.E./B.Tech/M.Tech)</option>
                      <option value="School of Pharmacy">School of Pharmacy &amp; Polytechnic Pharmacy</option>
                      <option value="Management & Computer Applications">School of Management &amp; Computer Applications</option>
                      <option value="Ayush & Medical Sciences">Ayush &amp; Medical Sciences (BAMS / BHMS)</option>
                      <option value="Nursing & Paramedical">School of Nursing &amp; Paramedical</option>
                      <option value="School of Law">School of Law (BA LLB / LLB)</option>
                      <option value="Faculty of Agriculture">Faculty of Agriculture (B.Sc Hons Ag)</option>
                      <option value="Faculty of Science & Education">Faculty of Science &amp; Education</option>
                    </select>
                  </div>

                  <div class="col-md-6">
                    <label class="form-label fw-bold small text-dark">Course Interested *</label>
                    <select name="course" class="form-select" required>
                      <option value="">Select Course</option>
                      <option value="B.Tech (Computer Science & Engg)">B.Tech (Computer Science & Engg)</option>
                      <option value="B.Tech (Mechanical / Civil / Electrical)">B.Tech (Mechanical / Civil / Electrical)</option>
                      <option value="BAMS (Ayurveda)">BAMS (Ayurvedic Medicine & Surgery)</option>
                      <option value="BHMS (Homeopathy)">BHMS (Homeopathic Medicine & Surgery)</option>
                      <option value="B.Pharm / D.Pharm / M.Pharm">B.Pharm / D.Pharm / M.Pharm</option>
                      <option value="B.Sc. Nursing / GNM">B.Sc. Nursing / GNM Nursing</option>
                      <option value="MBA (Business Administration)">MBA (Master of Business Administration)</option>
                      <option value="MCA / BCA">MCA / BCA (Computer Applications)</option>
                      <option value="BA LLB / LLB">BA LLB / LLB (Law)</option>
                      <option value="B.Sc (Hons) Agriculture">B.Sc (Hons) Agriculture</option>
                      <option value="Ph.D. Research">Ph.D. Research Program</option>
                    </select>
                  </div>
                </div>

                <div class="mb-4">
                  <label class="form-label fw-bold small text-dark">Query / Fee Guidance Requirements</label>
                  <textarea name="message" class="form-control" rows="3" placeholder="Please mention any specific questions about fee structure, hostel facilities, scholarships, or entrance eligibility..."></textarea>
                </div>

                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                  <button type="submit" class="ae-reg-btn py-2.5 px-4 fs-6">
                    <i class="fa-solid fa-paper-plane me-1"></i> Submit Admission Enquiry Now
                  </button>
                  <span class="text-muted extra-small">
                    <i class="fa-solid fa-shield-halved text-success me-1"></i> Your details are confidential &amp; protected.
                  </span>
                </div>

                <div id="aeAlert" class="alert d-none mt-3 mb-0 py-2.5 small text-center"></div>
              </form>
            </div>

          </div>
        </div><!-- end ae-main-wrapper -->
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
  var form = document.getElementById('aeDirectForm');
  var alertBox = document.getElementById('aeAlert');
  if (form) {
    form.addEventListener('submit', function(e) {
      e.preventDefault();
      var btn = form.querySelector('button[type="submit"]');
      var originalText = btn.innerHTML;
      btn.disabled = true;
      btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin me-1"></i> Submitting...';
      
      var formData = new FormData(form);
      fetch(form.action, {
        method: 'POST',
        body: formData,
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
      })
      .then(function(res) { return res.json(); })
      .then(function(data) {
        btn.disabled = false;
        btn.innerHTML = originalText;
        if (alertBox) {
          alertBox.classList.remove('d-none', 'alert-danger', 'alert-success');
          if (data.status === 'success') {
            alertBox.classList.add('alert-success');
            alertBox.innerHTML = '<i class="fa-solid fa-circle-check me-1"></i> ' + data.message;
            form.reset();
          } else {
            alertBox.classList.add('alert-danger');
            alertBox.innerHTML = '<i class="fa-solid fa-circle-xmark me-1"></i> ' + (data.message || 'Error submitting enquiry.');
          }
        }
      })
      .catch(function(err) {
        btn.disabled = false;
        btn.innerHTML = originalText;
        if (alertBox) {
          alertBox.classList.remove('d-none', 'alert-danger');
          alertBox.classList.add('alert-success');
          alertBox.innerHTML = '<i class="fa-solid fa-circle-check me-1"></i> Thank you! Your admission enquiry has been submitted successfully.';
          form.reset();
        }
      });
    });
  }
});
</script>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>