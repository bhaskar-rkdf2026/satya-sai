<?php
$page_title = 'Career & Faculty Recruitment - SSSUTMS';
$banner_title = 'Career & Recruitment';
$banner_category = 'Career';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?>

<style>
.syl-card {
  background: #ffffff;
  border-radius: 16px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
  border: 1px solid #e2e8f0;
  overflow: hidden;
  margin-bottom: 2rem;
}
.syl-card-header {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 1.25rem 1.75rem;
  position: relative;
}
.syl-card-header::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.syl-card-title {
  font-size: 1.3rem;
  font-weight: 700;
  margin: 0;
  display: flex;
  align-items: center;
  gap: 12px;
  color: #ffffff;
}
.syl-card-body {
  padding: 1.75rem;
}
.syl-btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  background: #0b2545;
  color: #ffffff !important;
  font-weight: 700;
  font-size: 0.85rem;
  padding: 8px 18px;
  border-radius: 8px;
  text-decoration: none !important;
  transition: all 0.25s ease;
  box-shadow: 0 2px 6px rgba(11, 37, 69, 0.2);
  border: 1px solid #0b2545;
  white-space: nowrap;
}
.syl-btn:hover {
  background: #d97706;
  border-color: #d97706;
  color: #ffffff !important;
  transform: translateY(-2px);
  box-shadow: 0 6px 14px rgba(217, 119, 6, 0.35);
}
.job-card {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  overflow: hidden;
  height: 100%;
  display: flex;
  flex-direction: column;
  transition: transform 0.25s ease, box-shadow 0.25s ease;
}
.job-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
}
.job-img-wrapper {
  position: relative;
  background: #f1f5f9;
  border-bottom: 1px solid #e2e8f0;
  text-align: center;
  overflow: hidden;
}
.job-img-wrapper img {
  max-width: 100%;
  height: auto;
  max-height: 380px;
  object-fit: contain;
  transition: transform 0.3s ease;
}
.job-card:hover .job-img-wrapper img {
  transform: scale(1.02);
}
.department-heading {
  background: #f8fafc;
  border-left: 4px solid #0b2545;
  padding: 10px 16px;
  margin-top: 1.5rem;
  margin-bottom: 1.25rem;
  font-size: 1.05rem;
  font-weight: 700;
  color: #0b2545;
  display: flex;
  align-items: center;
  gap: 10px;
  border-radius: 0 8px 8px 0;
}
.department-heading:first-of-type {
  margin-top: 0;
}
</style>

<section class="subpage-main-section py-4 bg-light">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="syl-card">
          <div class="syl-card-header">
            <h2 class="syl-card-title">
              <i class="fa fa-briefcase text-warning"></i>
              Career Opportunities &amp; Faculty Recruitment
            </h2>
          </div>
          
          <div class="syl-card-body">
            
            <!-- Recruitment Introduction -->
            <div class="alert alert-primary bg-light border-primary border-start border-4 rounded-3 p-3 mb-4">
              <div class="d-flex align-items-start gap-3">
                <i class="fa fa-info-circle text-primary fa-2x mt-1"></i>
                <div>
                  <h6 class="fw-bold text-dark mb-1">Join Sri Satya Sai University of Technology &amp; Medical Sciences</h6>
                  <p class="text-secondary small mb-0">
                    SSSUTMS invites dynamic, visionary, and qualified academic and administrative professionals to join our distinguished faculty team. We follow the reservation policy for staff recruitment in accordance with the guidelines set by the Government of Madhya Pradesh.
                  </p>
                </div>
              </div>
            </div>

            <!-- 1. Latest Recruitment Notifications -->
            <div class="department-heading">
              <i class="fa fa-bullhorn"></i> Current Recruitment Notices &amp; Job Advertisements
            </div>

            <div class="row g-4 mb-4">
              
              <!-- School of Pharmacy Recruitment -->
              <div class="col-md-6">
                <div class="job-card">
                  <div class="job-img-wrapper p-2">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/SCHOOL_OF_PHARMACY_23052026_0320.jpeg" alt="School of Pharmacy Recruitment">
                  </div>
                  <div class="p-3 d-flex flex-column justify-content-between flex-grow-1">
                    <div>
                      <span class="badge bg-success mb-2">Faculty Position</span>
                      <h6 class="fw-bold text-dark mb-1">School of Pharmacy – Faculty Recruitment</h6>
                      <p class="text-secondary small mb-3">Applications invited for Professors, Associate Professors &amp; Assistant Professors in Pharmaceutics, Pharmacology, Pharmacognosy &amp; Chemistry.</p>
                    </div>
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/SCHOOL_OF_PHARMACY_23052026_0320.jpeg" target="_blank" rel="noopener" class="syl-btn align-self-start">
                      <i class="fa fa-expand"></i> View Full Advertisement
                    </a>
                  </div>
                </div>
              </div>

              <!-- General Faculty & Staff Openings -->
              <div class="col-md-6">
                <div class="job-card">
                  <div class="job-img-wrapper p-2">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/last_updated_27052026_1224.png" alt="Faculty Recruitment Openings">
                  </div>
                  <div class="p-3 d-flex flex-column justify-content-between flex-grow-1">
                    <div>
                      <span class="badge bg-primary mb-2">Teaching &amp; Admin</span>
                      <h6 class="fw-bold text-dark mb-1">Faculty &amp; Technical Staff Positions</h6>
                      <p class="text-secondary small mb-3">Openings across Engineering, Computer Applications, Management, Nursing, Paramedical &amp; Basic Sciences.</p>
                    </div>
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/last_updated_27052026_1224.png" target="_blank" rel="noopener" class="syl-btn align-self-start">
                      <i class="fa fa-expand"></i> View Full Advertisement
                    </a>
                  </div>
                </div>
              </div>

              <!-- School of Homoeopathy Appointment -->
              <div class="col-md-6">
                <div class="job-card">
                  <div class="job-img-wrapper p-2">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/job_08012025_0348.jpg" alt="School of Homoeopathy Recruitment">
                  </div>
                  <div class="p-3 d-flex flex-column justify-content-between flex-grow-1">
                    <div>
                      <span class="badge bg-danger mb-2">Medical Faculty</span>
                      <h6 class="fw-bold text-dark mb-1">School of Homoeopathy &amp; Hospital (BHMS / MD)</h6>
                      <p class="text-secondary small mb-3">Recruitment of Senior Consultants, Professors, Readers &amp; Lecturers for Homoeopathic Medical College.</p>
                    </div>
                    <div class="d-flex flex-wrap gap-2">
                      <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Appointment_Add_BHMS_PG_04102023_0923.pdf" target="_blank" rel="noopener" class="syl-btn">
                        <i class="fa fa-file-pdf"></i> Download PDF
                      </a>
                      <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/job_08012025_0348.jpg" target="_blank" rel="noopener" class="syl-btn">
                        <i class="fa fa-image"></i> View Poster
                      </a>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Medical Sciences Recruitment -->
              <div class="col-md-6">
                <div class="job-card">
                  <div class="job-img-wrapper p-2">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/WhatsApp_Image_2026-04-09_at_12.57.59_PM_09042026_0117.jpg" alt="Medical Sciences Requirement">
                  </div>
                  <div class="p-3 d-flex flex-column justify-content-between flex-grow-1">
                    <div>
                      <span class="badge bg-info text-dark mb-2">Clinical &amp; Non-Clinical</span>
                      <h6 class="fw-bold text-dark mb-1">Requirement: School of Medical Sciences</h6>
                      <p class="text-secondary small mb-3">Positions for Medical Officers, Clinical Tutors, Resident Doctors, Nursing Staff &amp; Lab Technicians.</p>
                    </div>
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/WhatsApp_Image_2026-04-09_at_12.57.59_PM_09042026_0117.jpg" target="_blank" rel="noopener" class="syl-btn align-self-start">
                      <i class="fa fa-expand"></i> View Full Advertisement
                    </a>
                  </div>
                </div>
              </div>

              <!-- Ombudsperson Appointment -->
              <div class="col-md-6">
                <div class="job-card">
                  <div class="job-img-wrapper p-2">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/ad_06072023_1203.jpg" alt="Ombudsperson Appointment">
                  </div>
                  <div class="p-3 d-flex flex-column justify-content-between flex-grow-1">
                    <div>
                      <span class="badge bg-warning text-dark mb-2">Statutory Position</span>
                      <h6 class="fw-bold text-dark mb-1">Appointment of University OMBUDSPERSON (Part Time)</h6>
                      <p class="text-secondary small mb-3">Applications invited for the post of Ombudsperson in compliance with UGC Student Grievance Redressal Regulations.</p>
                    </div>
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/career.pdf" target="_blank" rel="noopener" class="syl-btn align-self-start">
                      <i class="fa fa-file-pdf"></i> Download Notification PDF
                    </a>
                  </div>
                </div>
              </div>

              <!-- Vice Chancellor Appointment Notice -->
              <div class="col-md-6">
                <div class="job-card">
                  <div class="job-img-wrapper p-2">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/Appointment_of_Vice-Chancellor_16082023_0445.jpg" alt="Vice Chancellor Appointment">
                  </div>
                  <div class="p-3 d-flex flex-column justify-content-between flex-grow-1">
                    <div>
                      <span class="badge bg-secondary mb-2">Leadership</span>
                      <h6 class="fw-bold text-dark mb-1">Appointment of Vice-Chancellor</h6>
                      <p class="text-secondary small mb-3">Official search committee notification for the appointment of Vice-Chancellor at SSSUTMS.</p>
                    </div>
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Appointment_of_Vice-Chancellor_16082023_0445.jpg" target="_blank" rel="noopener" class="syl-btn align-self-start">
                      <i class="fa fa-expand"></i> View Full Advertisement
                    </a>
                  </div>
                </div>
              </div>

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