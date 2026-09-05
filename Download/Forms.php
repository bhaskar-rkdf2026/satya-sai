<?php
$page_title = 'Official Downloadable Forms - SSSUTMS';
$banner_title = 'Official University Forms';
$banner_category = 'Download';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?>

<style>
.btn-standard-doc:hover {
  background: #0b2545 !important;
  color: #ffffff !important;
  border-color: #0b2545 !important;
}
.btn-standard-doc:hover i {
  color: #ffffff !important;
}
</style>
<section class="subpage-main-section py-4 style="background-color: #f8fafc;"">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="content-card shadow-sm border-0 rounded-4 bg-white p-4 mb-4">
          
          <!-- Header Banner inside Content Card -->
          <div class="d-flex flex-wrap justify-content-between align-items-center pb-3 mb-4 border-bottom">
            <div>
              <span class="badge bg-light text-secondary border px-3 py-2 rounded-pill fw-semibold mb-2">
                <i class="fa fa-folder-open me-1"></i> Student &amp; Academic Services
              </span>
              <h3 class="fw-bold text-navy mb-1" style="color: #002B5B;">Downloadable University Application Forms</h3>
              <p class="text-muted small mb-0">Official application, enrollment, examination, and certificate request forms.</p>
            </div>
            <div class="mt-2 mt-md-0">
              <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded-pill">
                <i class="fa fa-check-circle me-1"></i> Verified &amp; Current (2026-27)
              </span>
            </div>
          </div>

          <!-- Quick Search Filter -->
          <div class="row g-3 mb-4 align-items-center">
            <div class="col-md-6 col-lg-5">
              <div class="input-group">
                <span class="input-group-text border-end-0 rounded-start-pill ps-3" style="background: #ffffff; border-color: #cbd5e1;"><i class="fa fa-search" style="color: #0b2545;"></i></span><input type="text" id="formSearchInput" class="form-control border-start-0 rounded-end-pill" style="border-color: #cbd5e1; font-size: 0.9rem;" placeholder="Search form by name (e.g. Migration, Degree, Reval)...">
              </div>
            </div>
            <div class="col-md-6 col-lg-7 text-md-end text-muted small">
              <i class="fa fa-circle-info text-primary me-1"></i> All forms are downloadable in printable PDF format.
            </div>
          </div>

          <!-- Forms Table -->
          <div class="table-responsive rounded-3 border">
            <table class="table table-hover align-middle mb-0" id="formsTable">
              <thead style="background: #0b2545; color: #fff;">
                <tr>
                  <th style="width: 70px;" class="text-center">S.No.</th>
                  <th>Form Title &amp; Purpose</th>
                  <th>Category</th>
                  <th class="text-center" style="width: 170px;">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-center fw-bold text-muted">1</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="avatar-sm me-3 text-danger"><i class="fa fa-file-pdf fa-2x"></i></div>
                      <div>
                        <div class="fw-bold text-dark">University Registration Form</div>
                        <small class="text-muted">Student admission registration form for all undergraduate &amp; postgraduate courses</small>
                      </div>
                    </div>
                  </td>
                  <td><span class="badge bg-light text-secondary border">Admissions</span></td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Forms/af1.pdf" target="_blank" class="btn-standard-doc text-nowrap" style="background: #ffffff; color: #0b2545; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.84rem; font-weight: 500; padding: 5px 12px; text-decoration: none; display: inline-flex; align-items: center; gap: 5px;">
                      <i class="fa fa-download me-1"></i> Download PDF
                    </a>
                  </td>
                </tr>

                <tr>
                  <td class="text-center fw-bold text-muted">2</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="avatar-sm me-3 text-danger"><i class="fa fa-file-pdf fa-2x"></i></div>
                      <div>
                        <div class="fw-bold text-dark">University Enrolment Form</div>
                        <small class="text-muted">Mandatory enrolment application form for newly admitted students</small>
                      </div>
                    </div>
                  </td>
                  <td><span class="badge bg-light text-secondary border">Enrolment</span></td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Forms/University_Enrollment.PDF" target="_blank" class="btn-standard-doc text-nowrap" style="background: #ffffff; color: #0b2545; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.84rem; font-weight: 500; padding: 5px 12px; text-decoration: none; display: inline-flex; align-items: center; gap: 5px;">
                      <i class="fa fa-download me-1"></i> Download PDF
                    </a>
                  </td>
                </tr>

                <tr>
                  <td class="text-center fw-bold text-muted">3</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="avatar-sm me-3 text-danger"><i class="fa fa-file-pdf fa-2x"></i></div>
                      <div>
                        <div class="fw-bold text-dark">Hostel Accommodation Form</div>
                        <small class="text-muted">Hostel admission request and rules declaration form for boys &amp; girls hostels</small>
                      </div>
                    </div>
                  </td>
                  <td><span class="badge bg-secondary-subtle text-dark border">Campus Life</span></td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Forms/HOSTEL.PDF" target="_blank" class="btn-standard-doc text-nowrap" style="background: #ffffff; color: #0b2545; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.84rem; font-weight: 500; padding: 5px 12px; text-decoration: none; display: inline-flex; align-items: center; gap: 5px;">
                      <i class="fa fa-download me-1"></i> Download PDF
                    </a>
                  </td>
                </tr>

                <tr>
                  <td class="text-center fw-bold text-muted">4</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="avatar-sm me-3 text-danger"><i class="fa fa-file-pdf fa-2x"></i></div>
                      <div>
                        <div class="fw-bold text-dark">Ph.D. Entrance Examination Form</div>
                        <small class="text-muted">Doctoral research entrance exam (CEET) registration form</small>
                      </div>
                    </div>
                  </td>
                  <td><span class="badge bg-warning-subtle text-dark border border-warning-subtle">Research / Ph.D.</span></td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Forms/ENTRANCEFORM.pdf" target="_blank" class="btn-standard-doc text-nowrap" style="background: #ffffff; color: #0b2545; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.84rem; font-weight: 500; padding: 5px 12px; text-decoration: none; display: inline-flex; align-items: center; gap: 5px;">
                      <i class="fa fa-download me-1"></i> Download PDF
                    </a>
                  </td>
                </tr>

                <tr>
                  <td class="text-center fw-bold text-muted">5</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="avatar-sm me-3 text-danger"><i class="fa fa-file-pdf fa-2x"></i></div>
                      <div>
                        <div class="fw-bold text-dark">University Examination Form</div>
                        <small class="text-muted">Main/supplementary semester end examination application form</small>
                      </div>
                    </div>
                  </td>
                  <td><span class="badge bg-danger-subtle text-danger border border-danger-subtle">Examination</span></td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Forms/EXAMFORM.pdf" target="_blank" class="btn-standard-doc text-nowrap" style="background: #ffffff; color: #0b2545; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.84rem; font-weight: 500; padding: 5px 12px; text-decoration: none; display: inline-flex; align-items: center; gap: 5px;">
                      <i class="fa fa-download me-1"></i> Download PDF
                    </a>
                  </td>
                </tr>

                <tr>
                  <td class="text-center fw-bold text-muted">6</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="avatar-sm me-3 text-danger"><i class="fa fa-file-pdf fa-2x"></i></div>
                      <div>
                        <div class="fw-bold text-dark">Revaluation &amp; Retotalling Form</div>
                        <small class="text-muted">Application form for revaluation / scrutiny of answer booklets</small>
                      </div>
                    </div>
                  </td>
                  <td><span class="badge bg-danger-subtle text-danger border border-danger-subtle">Examination</span></td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Forms/REVAL.pdf" target="_blank" class="btn-standard-doc text-nowrap" style="background: #ffffff; color: #0b2545; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.84rem; font-weight: 500; padding: 5px 12px; text-decoration: none; display: inline-flex; align-items: center; gap: 5px;">
                      <i class="fa fa-download me-1"></i> Download PDF
                    </a>
                  </td>
                </tr>

                <tr>
                  <td class="text-center fw-bold text-muted">7</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="avatar-sm me-3 text-danger"><i class="fa fa-file-pdf fa-2x"></i></div>
                      <div>
                        <div class="fw-bold text-dark">Degree Certificate Application (English)</div>
                        <small class="text-muted">Application for issue of official University Degree in Convocation / Absentia</small>
                      </div>
                    </div>
                  </td>
                  <td><span class="badge bg-success-subtle text-success border border-success-subtle">Certification</span></td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Forms/DEGREE_Eng.pdf" target="_blank" class="btn-standard-doc text-nowrap" style="background: #ffffff; color: #0b2545; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.84rem; font-weight: 500; padding: 5px 12px; text-decoration: none; display: inline-flex; align-items: center; gap: 5px;">
                      <i class="fa fa-download me-1"></i> Download PDF
                    </a>
                  </td>
                </tr>

                <tr>
                  <td class="text-center fw-bold text-muted">8</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="avatar-sm me-3 text-danger"><i class="fa fa-file-pdf fa-2x"></i></div>
                      <div>
                        <div class="fw-bold text-dark">Degree Certificate Form (Regional / Hindi Format)</div>
                        <small class="text-muted">Degree verification and certificate issuance requisition form</small>
                      </div>
                    </div>
                  </td>
                  <td><span class="badge bg-success-subtle text-success border border-success-subtle">Certification</span></td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Forms/DEGREE_FORM_R.pdf" target="_blank" class="btn-standard-doc text-nowrap" style="background: #ffffff; color: #0b2545; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.84rem; font-weight: 500; padding: 5px 12px; text-decoration: none; display: inline-flex; align-items: center; gap: 5px;">
                      <i class="fa fa-download me-1"></i> Download PDF
                    </a>
                  </td>
                </tr>

                <tr>
                  <td class="text-center fw-bold text-muted">9</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="avatar-sm me-3 text-danger"><i class="fa fa-file-pdf fa-2x"></i></div>
                      <div>
                        <div class="fw-bold text-dark">Migration Certificate Form (English)</div>
                        <small class="text-muted">Application form for obtaining Inter-University Migration Certificate</small>
                      </div>
                    </div>
                  </td>
                  <td><span class="badge bg-info-subtle text-info border border-info-subtle">Student Services</span></td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Forms/MIGRATION_Eng.pdf" target="_blank" class="btn-standard-doc text-nowrap" style="background: #ffffff; color: #0b2545; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.84rem; font-weight: 500; padding: 5px 12px; text-decoration: none; display: inline-flex; align-items: center; gap: 5px;">
                      <i class="fa fa-download me-1"></i> Download PDF
                    </a>
                  </td>
                </tr>

                <tr>
                  <td class="text-center fw-bold text-muted">10</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="avatar-sm me-3 text-danger"><i class="fa fa-file-pdf fa-2x"></i></div>
                      <div>
                        <div class="fw-bold text-dark">Migration Certificate Form (Standard)</div>
                        <small class="text-muted">Standard migration application with clearance certificate instructions</small>
                      </div>
                    </div>
                  </td>
                  <td><span class="badge bg-info-subtle text-info border border-info-subtle">Student Services</span></td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Forms/MIGRATION FORM.pdf" target="_blank" class="btn-standard-doc text-nowrap" style="background: #ffffff; color: #0b2545; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.84rem; font-weight: 500; padding: 5px 12px; text-decoration: none; display: inline-flex; align-items: center; gap: 5px;">
                      <i class="fa fa-download me-1"></i> Download PDF
                    </a>
                  </td>
                </tr>

                <tr>
                  <td class="text-center fw-bold text-muted">11</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="avatar-sm me-3 text-danger"><i class="fa fa-file-pdf fa-2x"></i></div>
                      <div>
                        <div class="fw-bold text-dark">Alumni Registration Form</div>
                        <small class="text-muted">Lifetime alumni association membership enrollment form</small>
                      </div>
                    </div>
                  </td>
                  <td><span class="badge bg-secondary-subtle text-dark border">Alumni</span></td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Forms/alumni-form.PDF" target="_blank" class="btn-standard-doc text-nowrap" style="background: #ffffff; color: #0b2545; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.84rem; font-weight: 500; padding: 5px 12px; text-decoration: none; display: inline-flex; align-items: center; gap: 5px;">
                      <i class="fa fa-download me-1"></i> Download PDF
                    </a>
                  </td>
                </tr>

                <tr>
                  <td class="text-center fw-bold text-muted">12</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="avatar-sm me-3 text-danger"><i class="fa fa-file-pdf fa-2x"></i></div>
                      <div>
                        <div class="fw-bold text-dark">Transfer Certificate (TC) Application</div>
                        <small class="text-muted">Application form for issuing College Leaving / Transfer Certificate</small>
                      </div>
                    </div>
                  </td>
                  <td><span class="badge bg-info-subtle text-info border border-info-subtle">Student Services</span></td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Forms/TC.pdf" target="_blank" class="btn-standard-doc text-nowrap" style="background: #ffffff; color: #0b2545; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.84rem; font-weight: 500; padding: 5px 12px; text-decoration: none; display: inline-flex; align-items: center; gap: 5px;">
                      <i class="fa fa-download me-1"></i> Download PDF
                    </a>
                  </td>
                </tr>

                <tr>
                  <td class="text-center fw-bold text-muted">13</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="avatar-sm me-3 text-danger"><i class="fa fa-file-pdf fa-2x"></i></div>
                      <div>
                        <div class="fw-bold text-dark">Registration Form for Higher Semester / Year</div>
                        <small class="text-muted">Semester re-registration &amp; term promotion application form</small>
                      </div>
                    </div>
                  </td>
                  <td><span class="badge bg-light text-secondary border">Academic</span></td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Forms/Registration_higher_Sem_year_form.pdf" target="_blank" class="btn-standard-doc text-nowrap" style="background: #ffffff; color: #0b2545; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.84rem; font-weight: 500; padding: 5px 12px; text-decoration: none; display: inline-flex; align-items: center; gap: 5px;">
                      <i class="fa fa-download me-1"></i> Download PDF
                    </a>
                  </td>
                </tr>

                <tr>
                  <td class="text-center fw-bold text-muted">14</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="avatar-sm me-3 text-danger"><i class="fa fa-file-pdf fa-2x"></i></div>
                      <div>
                        <div class="fw-bold text-dark">Official Transcript Request Form</div>
                        <small class="text-muted">Application for official sealed transcript copies for higher studies abroad / WES</small>
                      </div>
                    </div>
                  </td>
                  <td><span class="badge bg-success-subtle text-success border border-success-subtle">Certification</span></td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Forms/Transcript.pdf" target="_blank" class="btn-standard-doc text-nowrap" style="background: #ffffff; color: #0b2545; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.84rem; font-weight: 500; padding: 5px 12px; text-decoration: none; display: inline-flex; align-items: center; gap: 5px;">
                      <i class="fa fa-download me-1"></i> Download PDF
                    </a>
                  </td>
                </tr>

                <tr>
                  <td class="text-center fw-bold text-muted">15</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="avatar-sm me-3 text-danger"><i class="fa fa-file-pdf fa-2x"></i></div>
                      <div>
                        <div class="fw-bold text-dark">Marksheet Correction / Duplicate Marksheet Form</div>
                        <small class="text-muted">Application form for name correction or duplicate marksheet issuance</small>
                      </div>
                    </div>
                  </td>
                  <td><span class="badge bg-danger-subtle text-danger border border-danger-subtle">Examination</span></td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Download/Marksheet_Correction_Form.pdf" target="_blank" class="btn-standard-doc text-nowrap" style="background: #ffffff; color: #0b2545; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.84rem; font-weight: 500; padding: 5px 12px; text-decoration: none; display: inline-flex; align-items: center; gap: 5px;">
                      <i class="fa fa-download me-1"></i> Download PDF
                    </a>
                  </td>
                </tr>

              </tbody>
            </table>
          </div>

          <!-- Submission Instruction Alert -->
          <div class="alert alert-info border-0 rounded-4 mt-4 d-flex align-items-start shadow-sm" style="background: #eef5fc;">
            <div class="me-3 text-primary mt-1"><i class="fa fa-circle-info fa-2x"></i></div>
            <div>
              <h6 class="fw-bold text-dark mb-1">Important Instructions for Form Submission:</h6>
              <ul class="mb-0 ps-3 small text-secondary">
                <li>Download and print the respective form on standard A4 size paper.</li>
                <li>Fill in all required details legibly in block letters along with required documentary proofs.</li>
                <li>Submit the completed form along with the prescribed fee receipt to the Registrar / Academic Section counters on campus.</li>
              </ul>
            </div>
          </div>

        </div>
      </div>

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const searchInput = document.getElementById('formSearchInput');
  const table = document.getElementById('formsTable');
  if (searchInput && table) {
    searchInput.addEventListener('keyup', function() {
      const query = this.value.toLowerCase().trim();
      const rows = table.querySelectorAll('tbody tr');
      rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(query) ? '' : 'none';
      });
    });
  }
});
</script>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>