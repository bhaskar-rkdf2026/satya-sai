<?php
$page_title = 'Alumni Association - SSSUTMS';
$banner_title = 'Alumni Association';
$banner_category = 'Download';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?>

<section class="subpage-main-section py-4 style="background-color: #f8fafc;"">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="content-card shadow-sm border-0 rounded-4 bg-white p-4 mb-4">
          
          <!-- Card Header -->
          <div class="d-flex flex-wrap justify-content-between align-items-center pb-3 mb-4 border-bottom">
            <div>
              <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-2 rounded-pill fw-semibold mb-2">
                <i class="fa fa-users-line me-1"></i> Global Alumni Relations
              </span>
              <h3 class="fw-bold text-navy mb-1" style="color: #0b2545;">Sri Satya Sai Alumni Association (SSSA)</h3>
              <p class="text-muted small mb-0">Connecting thousands of distinguished graduates worldwide across industry and academia.</p>
            </div>
            <div class="mt-2 mt-md-0">
              <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded-pill">
                <i class="fa fa-building-columns me-1"></i> Registered Society
              </span>
            </div>
          </div>

          <!-- Hero Callout -->
          <div class="p-4 rounded-4 text-white mb-4 shadow-sm" style="background: linear-gradient(135deg, #0b2545 0%, #0d47a1 50%, #001f3f 100%);">
            <div class="row align-items-center">
              <div class="col-lg-8">
                <h4 class="fw-bold text-white mb-2">Welcome Back to Your Alma Mater</h4>
                <p class="text-white-50 mb-3 small">
                  The SSSUTMS Alumni Association serves as a lifelong bridge between the University and its alumni community. 
                  Our alumni hold leadership positions globally in multinational enterprises, government services, medical institutions, and entrepreneurial ventures.
                </p>
                <div class="d-flex flex-wrap gap-2">
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/society_rules_07122024_0515.pdf" target="_blank" class="btn rounded-pill px-4 py-2 fw-semibold text-white shadow-sm" style="background: linear-gradient(135deg, #f3752c 0%, #e0580a 100%); border: none; box-shadow: 0 4px 12px rgba(243, 117, 44, 0.3);">
                    <i class="fa fa-file-contract me-1"></i> Association By-Laws &amp; Rules (PDF)
                  </a>
                  <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Forms/alumni-form.PDF" target="_blank" class="btn btn-outline-light rounded-pill px-4 py-2 fw-semibold">
                    <i class="fa fa-id-card me-1"></i> Membership Form (PDF)
                  </a>
                </div>
              </div>
              <div class="col-lg-4 text-center mt-3 mt-lg-0 d-none d-lg-block">
                <i class="fa fa-graduation-cap fa-6x text-warning opacity-75"></i>
              </div>
            </div>
          </div>

          <!-- Alumni Highlights & Statutory Details -->
          <div class="row g-3 mb-4">
            <div class="col-md-6">
              <div class="card h-100 border rounded-3 p-3 style="background-color: #f8fafc;"">
                <h6 class="fw-bold text-navy mb-2" style="color: #0b2545;"><i class="fa fa-landmark text-primary me-2"></i>Official Registration</h6>
                <p class="small text-secondary mb-0">
                  The Sri Satya Sai Alumni Association is legally registered under the Madhya Pradesh Society Registrikaran Adhiniyam. Official constitution and by-laws govern alumni affairs, mentorship activities, and regional chapter meets.
                </p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card h-100 border rounded-3 p-3 style="background-color: #f8fafc;"">
                <h6 class="fw-bold text-navy mb-2" style="color: #0b2545;"><i class="fa fa-handshake-angle text-success me-2"></i>Alumni Mentorship Network</h6>
                <p class="small text-secondary mb-0">
                  Graduates provide mentorship, internship referrals, and industry orientation to current university students, bridging the gap between classroom academics and corporate expectations.
                </p>
              </div>
            </div>
          </div>

          <!-- Official Association Documents Table -->
          <h5 class="fw-bold text-dark mb-3"><i class="fa fa-file-lines text-primary me-2"></i>Statutory Documents &amp; Registration Forms</h5>
          <div class="table-responsive rounded-3 border mb-4">
            <table class="table table-hover align-middle mb-0">
              <thead style="background: linear-gradient(135deg, #0b2545 0%, #134074 100%); color: #fff;">
                <tr>
                  <th style="width: 70px;" class="text-center">S.No.</th>
                  <th>Document Title</th>
                  <th>Description</th>
                  <th class="text-center" style="width: 170px;">Download</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-center fw-bold text-muted">1</td>
                  <td class="fw-bold text-dark">Alumni Association Society Rules &amp; Constitution</td>
                  <td class="small text-secondary">Official Memorandum of Association, Society Rules, Objectives, and Executive Committee Structure</td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/society_rules_07122024_0515.pdf" target="_blank" class="btn btn-sm text-white rounded-pill px-3 py-1 text-nowrap" style="background: linear-gradient(135deg, #f3752c 0%, #e0580a 100%); font-weight: 600; font-size: 0.82rem; box-shadow: 0 2px 6px rgba(243, 117, 44, 0.28); border: none;">
                      <i class="fa fa-file-pdf me-1"></i> Download PDF
                    </a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center fw-bold text-muted">2</td>
                  <td class="fw-bold text-dark">Alumni Lifetime Membership Form</td>
                  <td class="small text-secondary">Application form for enrolment as an active alumni member and issue of alumni membership credentials</td>
                  <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Forms/alumni-form.PDF" target="_blank" class="btn btn-sm text-white rounded-pill px-3 py-1 text-nowrap" style="background: linear-gradient(135deg, #f3752c 0%, #e0580a 100%); font-weight: 600; font-size: 0.82rem; box-shadow: 0 2px 6px rgba(243, 117, 44, 0.28); border: none;">
                      <i class="fa fa-file-pdf me-1"></i> Download Form
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <!-- Contact Alumni Desk -->
          <div class="alert alert-light border rounded-4 p-3 d-flex align-items-center">
            <i class="fa fa-envelope-open-text fa-2x text-primary me-3"></i>
            <div>
              <div class="fw-bold text-dark">Alumni Relations Cell</div>
              <small class="text-muted">For alumni chapter registrations and reunion inquiries, write to: <a href="mailto:info@sssutms.co.in" class="fw-semibold text-primary">info@sssutms.co.in</a> or visit the Dean Student Welfare office.</small>
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

<?php require_once __DIR__ . '/../includes/footer.php'; ?>