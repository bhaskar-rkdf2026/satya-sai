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

.ae-schools-section {
  margin-bottom: 2.5rem;
}
.ae-school-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 16px;
  padding: 1.4rem;
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  position: relative;
  overflow: hidden;
  transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
  cursor: pointer;
  box-shadow: 0 2px 8px rgba(15, 23, 42, 0.03);
}
.ae-school-card::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 3.5px;
  background: var(--card-accent, #2563eb);
  opacity: 0.85;
  transition: height 0.25s ease;
}
.ae-school-card:hover {
  transform: translateY(-4px);
  border-color: #cbd5e1;
  box-shadow: 0 14px 28px -6px rgba(15, 23, 42, 0.1), 0 4px 10px -2px rgba(15, 23, 42, 0.04);
}
.ae-school-card:hover::before {
  height: 5px;
}
.ae-school-icon-wrap {
  width: 46px;
  height: 46px;
  border-radius: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.25rem;
  margin-bottom: 1rem;
  flex-shrink: 0;
  transition: transform 0.25s ease;
}
.ae-school-card:hover .ae-school-icon-wrap {
  transform: scale(1.08);
}
.ae-school-card-title {
  font-size: 1.05rem;
  font-weight: 700;
  color: #0f172a;
  margin-bottom: 0.45rem;
  line-height: 1.35;
}
.ae-school-tags {
  display: flex;
  flex-wrap: wrap;
  gap: 5px;
  margin-top: 0.6rem;
  margin-bottom: 1rem;
}
.ae-prog-tag {
  font-size: 0.72rem;
  font-weight: 600;
  padding: 3px 8px;
  border-radius: 6px;
  background: #f1f5f9;
  color: #475569;
  border: 1px solid #e2e8f0;
  line-height: 1.3;
}
.ae-card-footer-action {
  font-size: 0.8rem;
  font-weight: 700;
  color: var(--card-accent, #2563eb);
  display: inline-flex;
  align-items: center;
  gap: 5px;
  margin-top: auto;
  transition: gap 0.2s ease;
}
.ae-school-card:hover .ae-card-footer-action {
  gap: 8px;
}

/* Discipline Card Theme Variants */
.ae-theme-eng {
  --card-accent: #2563eb;
}
.ae-theme-eng .ae-school-icon-wrap {
  background: #eff6ff;
  color: #2563eb;
  border: 1px solid #bfdbfe;
}
.ae-theme-pharm {
  --card-accent: #0d9488;
}
.ae-theme-pharm .ae-school-icon-wrap {
  background: #f0fdfa;
  color: #0d9488;
  border: 1px solid #99f6e4;
}
.ae-theme-mgmt {
  --card-accent: #7c3aed;
}
.ae-theme-mgmt .ae-school-icon-wrap {
  background: #f5f3ff;
  color: #7c3aed;
  border: 1px solid #ddd6fe;
}
.ae-theme-med {
  --card-accent: #059669;
}
.ae-theme-med .ae-school-icon-wrap {
  background: #ecfdf5;
  color: #059669;
  border: 1px solid #a7f3d0;
}
.ae-theme-nurs {
  --card-accent: #e11d48;
}
.ae-theme-nurs .ae-school-icon-wrap {
  background: #fff1f2;
  color: #e11d48;
  border: 1px solid #fecdd3;
}
.ae-theme-law {
  --card-accent: #d97706;
}
.ae-theme-law .ae-school-icon-wrap {
  background: #fffbeb;
  color: #d97706;
  border: 1px solid #fde68a;
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
            <div class="ae-schools-section">
              <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
                <div>
                  <h5 class="fw-bold text-dark mb-1">
                    <i class="fa-solid fa-layer-group text-warning me-2"></i>Schools &amp; Programs Open for Admission 2026–27
                  </h5>
                  <p class="text-muted extra-small mb-0">Select any discipline below to enquire or get customized admission guidance</p>
                </div>
                <span class="badge bg-light text-secondary border px-3 py-1.5 rounded-pill extra-small fw-semibold">
                  <i class="fa-solid fa-check-circle text-success me-1"></i> Admissions Live
                </span>
              </div>

              <div class="row g-3">
                <!-- 1. Engineering -->
                <div class="col-md-6 col-lg-4">
                  <div class="ae-school-card ae-theme-eng" onclick="selectSchoolAndScroll('School of Engineering')">
                    <div>
                      <div class="ae-school-icon-wrap">
                        <i class="fa-solid fa-gears"></i>
                      </div>
                      <h6 class="ae-school-card-title">School of Engineering</h6>
                      <p class="mb-2 extra-small text-muted">Aeronautical, CSE, Civil, Mechanical, Electrical, Electronics, IT, Mining &amp; M.Tech</p>
                      <div class="ae-school-tags">
                        <span class="ae-prog-tag">B.Tech</span>
                        <span class="ae-prog-tag">M.Tech</span>
                        <span class="ae-prog-tag">Diploma</span>
                      </div>
                    </div>
                    <div class="ae-card-footer-action">
                      <span>Enquire Program</span> <i class="fa-solid fa-arrow-right extra-small"></i>
                    </div>
                  </div>
                </div>

                <!-- 2. Pharmacy -->
                <div class="col-md-6 col-lg-4">
                  <div class="ae-school-card ae-theme-pharm" onclick="selectSchoolAndScroll('School of Pharmacy')">
                    <div>
                      <div class="ae-school-icon-wrap">
                        <i class="fa-solid fa-pills"></i>
                      </div>
                      <h6 class="ae-school-card-title">School of Pharmacy</h6>
                      <p class="mb-2 extra-small text-muted">Pharmaceutics, Pharmacology, Quality Assurance, Industrial Pharmacy &amp; Ayurveda</p>
                      <div class="ae-school-tags">
                        <span class="ae-prog-tag">B.Pharm</span>
                        <span class="ae-prog-tag">D.Pharm</span>
                        <span class="ae-prog-tag">M.Pharm</span>
                      </div>
                    </div>
                    <div class="ae-card-footer-action">
                      <span>Enquire Program</span> <i class="fa-solid fa-arrow-right extra-small"></i>
                    </div>
                  </div>
                </div>

                <!-- 3. Management & IT -->
                <div class="col-md-6 col-lg-4">
                  <div class="ae-school-card ae-theme-mgmt" onclick="selectSchoolAndScroll('Management & Computer Applications')">
                    <div>
                      <div class="ae-school-icon-wrap">
                        <i class="fa-solid fa-briefcase"></i>
                      </div>
                      <h6 class="ae-school-card-title">Management &amp; IT</h6>
                      <p class="mb-2 extra-small text-muted">Business Administration, Marketing, Finance, HR, Computer Applications &amp; AI</p>
                      <div class="ae-school-tags">
                        <span class="ae-prog-tag">MBA</span>
                        <span class="ae-prog-tag">BBA</span>
                        <span class="ae-prog-tag">MCA</span>
                        <span class="ae-prog-tag">BCA</span>
                      </div>
                    </div>
                    <div class="ae-card-footer-action">
                      <span>Enquire Program</span> <i class="fa-solid fa-arrow-right extra-small"></i>
                    </div>
                  </div>
                </div>

                <!-- 4. Ayush & Medical -->
                <div class="col-md-6 col-lg-4">
                  <div class="ae-school-card ae-theme-med" onclick="selectSchoolAndScroll('Ayush & Medical Sciences')">
                    <div>
                      <div class="ae-school-icon-wrap">
                        <i class="fa-solid fa-user-doctor"></i>
                      </div>
                      <h6 class="ae-school-card-title">Ayush &amp; Medical College</h6>
                      <p class="mb-2 extra-small text-muted">Integrated Ayurvedic Medicine &amp; Homeopathic Medical Sciences Programs</p>
                      <div class="ae-school-tags">
                        <span class="ae-prog-tag">BAMS</span>
                        <span class="ae-prog-tag">BHMS</span>
                        <span class="ae-prog-tag">MD / MS</span>
                      </div>
                    </div>
                    <div class="ae-card-footer-action">
                      <span>Enquire Program</span> <i class="fa-solid fa-arrow-right extra-small"></i>
                    </div>
                  </div>
                </div>

                <!-- 5. Nursing & Paramedical -->
                <div class="col-md-6 col-lg-4">
                  <div class="ae-school-card ae-theme-nurs" onclick="selectSchoolAndScroll('Nursing & Paramedical')">
                    <div>
                      <div class="ae-school-icon-wrap">
                        <i class="fa-solid fa-user-nurse"></i>
                      </div>
                      <h6 class="ae-school-card-title">Nursing &amp; Paramedical</h6>
                      <p class="mb-2 extra-small text-muted">General Nursing, Post Basic Nursing, Physiotherapy, Lab &amp; Radio-imaging Tech</p>
                      <div class="ae-school-tags">
                        <span class="ae-prog-tag">B.Sc Nursing</span>
                        <span class="ae-prog-tag">GNM</span>
                        <span class="ae-prog-tag">BPT/MPT</span>
                        <span class="ae-prog-tag">BMLT</span>
                      </div>
                    </div>
                    <div class="ae-card-footer-action">
                      <span>Enquire Program</span> <i class="fa-solid fa-arrow-right extra-small"></i>
                    </div>
                  </div>
                </div>

                <!-- 6. Law, Ag & Education -->
                <div class="col-md-6 col-lg-4">
                  <div class="ae-school-card ae-theme-law" onclick="selectSchoolAndScroll('School of Law')">
                    <div>
                      <div class="ae-school-icon-wrap">
                        <i class="fa-solid fa-scale-balanced"></i>
                      </div>
                      <h6 class="ae-school-card-title">Law, Agriculture &amp; Education</h6>
                      <p class="mb-2 extra-small text-muted">Integrated Law, Agricultural Sciences, Natural Sciences &amp; Teacher Education</p>
                      <div class="ae-school-tags">
                        <span class="ae-prog-tag">BA LLB</span>
                        <span class="ae-prog-tag">B.Sc (Ag)</span>
                        <span class="ae-prog-tag">B.Ed/M.Ed</span>
                        <span class="ae-prog-tag">M.Sc</span>
                      </div>
                    </div>
                    <div class="ae-card-footer-action">
                      <span>Enquire Program</span> <i class="fa-solid fa-arrow-right extra-small"></i>
                    </div>
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
function selectSchoolAndScroll(schoolName) {
  var schoolSelect = document.querySelector('select[name="school"]');
  if (schoolSelect) {
    schoolSelect.value = schoolName;
    // Dispatch change event in case any chained listeners exist
    schoolSelect.dispatchEvent(new Event('change'));
  }
  var formSection = document.getElementById('enquiryFormSection');
  if (formSection) {
    formSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
    // Highlight the select field gently
    if (schoolSelect) {
      schoolSelect.classList.add('is-valid');
      setTimeout(function() {
        schoolSelect.classList.remove('is-valid');
      }, 2000);
    }
  }
}

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