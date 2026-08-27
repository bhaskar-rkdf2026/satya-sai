<!-- Interactive Admission Enquiry Modal -->
<div class="modal fade" id="enquiryModal" tabindex="-1" aria-labelledby="enquiryModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg" style="border-radius: var(--radius-lg); overflow: hidden;">
      
      <!-- Modal Header -->
      <div class="modal-header text-white" style="background: var(--primary-gradient);">
        <div class="d-flex align-items-center gap-2">
          <i class="fa fa-graduation-cap fs-4 text-warning"></i>
          <div>
            <h5 class="modal-title fw-bold text-white mb-0" id="enquiryModalLabel">Admission Enquiry 2026-27</h5>
            <small class="text-white-50">Speak with our academic counselors today</small>
          </div>
        </div>
        <button type="button" class="btn-close btn-close-white" data-bs-target="#enquiryModal" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Modal Body -->
      <div class="modal-body p-4 bg-light">
        <form id="enquiryForm" method="POST" action="<?php echo BASE_URL; ?>submit-handler.php">
          <!-- Hidden field ensures the action is set even without JavaScript -->
          <input type="hidden" name="action" value="submit_inquiry">
          <div class="mb-3">
            <label class="form-label fw-bold small text-muted">Full Name *</label>
            <div class="input-group">
              <span class="input-group-text bg-white border-end-0"><i class="fa fa-user text-primary"></i></span>
              <input type="text" name="name" class="form-control border-start-0" placeholder="Enter student's full name" required>
            </div>
          </div>

          <div class="row g-2 mb-3">
            <div class="col-md-6">
              <label class="form-label fw-bold small text-muted">Mobile Number *</label>
              <div class="input-group">
                <span class="input-group-text bg-white border-end-0"><i class="fa fa-phone text-primary"></i></span>
                <input type="tel" name="phone" class="form-control border-start-0" placeholder="+91-9876543210" required>
              </div>
            </div>
            <div class="col-md-6">
              <label class="form-label fw-bold small text-muted">Email Address *</label>
              <div class="input-group">
                <span class="input-group-text bg-white border-end-0"><i class="fa fa-envelope text-primary"></i></span>
                <input type="email" name="email" class="form-control border-start-0" placeholder="student@example.com" required>
              </div>
            </div>
          </div>

          <div class="row g-2 mb-3">
            <div class="col-md-6">
              <label class="form-label fw-bold small text-muted">Course Interested *</label>
              <select name="course" class="form-select" required>
                <option value="">Select Course</option>
                <option value="B.Tech (Computer Science & Engg)">B.Tech (Computer Science & Engg)</option>
                <option value="B.Tech (Mechanical / Civil / EE)">B.Tech (Mechanical / Civil / EE)</option>
                <option value="BAMS (Ayurveda)">BAMS (Ayurveda)</option>
                <option value="BHMS (Homeopathy)">BHMS (Homeopathy)</option>
                <option value="B.Pharm / M.Pharm">B.Pharm / M.Pharm</option>
                <option value="B.Sc. Nursing">B.Sc. Nursing</option>
                <option value="MBA (Management)">MBA (Management)</option>
                <option value="MCA (Computer Applications)">MCA (Computer Applications)</option>
                <option value="LL.B. (Law)">LL.B. (Law)</option>
                <option value="Ph.D. Research">Ph.D. Research Program</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label fw-bold small text-muted">City / State *</label>
              <input type="text" name="city" class="form-control" placeholder="e.g. Bhopal, MP" required>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label fw-bold small text-muted">Any Query / Comments</label>
            <textarea name="message" class="form-control" rows="2" placeholder="Fee structure, hostel, eligibility questions..."></textarea>
          </div>

          <button type="submit" class="btn btn-primary w-100 py-2 fw-bold text-white rounded-pill shadow-sm" style="background: var(--accent-gradient); border: none;">
            <i class="fa fa-paper-plane me-1"></i> Submit Admission Enquiry
          </button>

          <div id="enquiryAlert" class="alert d-none mt-3 mb-0 py-2 small text-center"></div>
        </form>
      </div>

      <div class="modal-footer bg-white py-2 justify-content-between">
        <small class="text-muted"><i class="fa fa-lock text-success me-1"></i> Your information is 100% secure.</small>
        <small class="fw-bold text-primary"><i class="fa fa-headset me-1"></i> Hotline: +91-7748900028</small>
      </div>

    </div>
  </div>
</div>
