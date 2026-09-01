<?php
$page_title = 'Faculty of Education - SSSUTMS';
$banner_title = 'Faculty of Education';
$banner_category = 'About';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?>

<style>
.inst-hero-badge {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: linear-gradient(135deg, #1a3c6e 0%, #2563a8 100%);
  color: #fff;
  font-size: 0.78rem;
  font-weight: 600;
  letter-spacing: 0.08em;
  text-transform: uppercase;
  padding: 6px 18px;
  border-radius: 50px;
  margin-bottom: 14px;
}
.inst-title-bar {
  position: relative;
  padding-bottom: 14px;
  margin-bottom: 8px;
}
.inst-title-bar::after {
  content: '';
  display: block;
  width: 60px;
  height: 4px;
  background: linear-gradient(90deg, #e87722, #f4a942);
  border-radius: 2px;
  margin: 12px auto 0;
}
.principal-card {
  background: #fff;
  border-radius: 20px;
  box-shadow: 0 8px 32px rgba(26,60,110,0.10);
  overflow: hidden;
  border: none;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.principal-card:hover { transform: translateY(-4px); box-shadow: 0 16px 48px rgba(26,60,110,0.16); }
.principal-img-wrap {
  position: relative;
  background: #fff;
  padding: 28px 28px 0;
  text-align: center;
}
.principal-img-wrap img {
  width: 180px;
  height: 220px;
  object-fit: cover;
  border-radius: 14px;
  box-shadow: 0 6px 24px rgba(26,60,110,0.18);
  border: 4px solid #fff;
}
.principal-info {
  padding: 18px 20px 22px;
  text-align: center !important;
  background: #fff;
}
.principal-info h5 { font-size: 1.05rem; font-weight: 700; color: #1a3c6e; margin-bottom: 6px; text-align: center !important; padding-bottom: 0 !important; margin-top: 0 !important; }
.principal-info h5::after { display: none !important; }
.orange-line {
  width: 36px;
  height: 3px;
  background: linear-gradient(90deg, #e87722, #f4a942);
  border-radius: 2px;
  margin: 0 auto 10px;
}
.principal-info p { font-size: 0.82rem; color: #6b7280; margin: 0; text-align: center !important; }
.principal-info a { color: #2563a8; text-decoration: none; }
.principal-info a:hover { text-decoration: underline; }
.message-card {
  background: #fff;
  border-radius: 20px;
  box-shadow: 0 8px 32px rgba(26,60,110,0.10);
  border: none;
  padding: 32px 36px;
  height: 100%;
}
.message-card .quote-icon {
  width: 44px; height: 44px;
  background: linear-gradient(135deg, #e87722, #f4a942);
  border-radius: 12px;
  display: flex; align-items: center; justify-content: center;
  margin-bottom: 18px;
}
.message-card .quote-icon i { color: #fff; font-size: 1.2rem; }
.message-card h4 { font-size: 0.92rem; font-weight: 700; color: #1a3c6e; margin-bottom: 16px; }
.message-card p { color: #4b5563; line-height: 1.8; font-size: 0.95rem; text-align: justify; }
.section-card {
  background: #fff;
  border-radius: 20px;
  box-shadow: 0 8px 32px rgba(26,60,110,0.10);
  border: none;
  padding: 32px 32px;
  margin-bottom: 24px;
}
.section-card-title {
  font-size: 0.92rem;
  font-weight: 700;
  color: #1a3c6e;
  text-align: center;
  margin-bottom: 24px;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 10px;
}
.section-card-title i { color: #e87722; font-size: 1.3rem; }
.course-card {
  background: #fff;
  border-radius: 20px;
  box-shadow: 0 4px 24px rgba(26,60,110,0.08);
  padding: 32px 20px 24px;
  text-align: center;
  border: none;
  transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
  position: relative;
  overflow: hidden;
  height: 100%;
}
.course-card::before {
  content: '';
  position: absolute;
  top: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #e87722, #f4a942);
  border-radius: 0;
}
.course-card.blue-accent::before { background: linear-gradient(90deg, #2563a8, #60a5fa); }
.course-card.green-accent::before { background: linear-gradient(90deg, #16a34a, #4ade80); }
.course-card.purple-accent::before { background: linear-gradient(90deg, #7c3aed, #c084fc); }
.course-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 24px 48px rgba(26,60,110,0.16);
}
.course-icon-circle {
  width: 72px;
  height: 72px;
  border-radius: 50%;
  background: linear-gradient(135deg, #1a3c6e, #2563a8);
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto 18px;
  box-shadow: 0 8px 20px rgba(37,99,168,0.25);
  transition: transform 0.35s ease;
}
.course-card.blue-accent .course-icon-circle { background: linear-gradient(135deg, #2563a8, #3b82f6); }
.course-card.green-accent .course-icon-circle { background: linear-gradient(135deg, #16a34a, #22c55e); box-shadow: 0 8px 20px rgba(22,163,74,0.25); }
.course-card.purple-accent .course-icon-circle { background: linear-gradient(135deg, #7c3aed, #9f67fa); box-shadow: 0 8px 20px rgba(124,58,237,0.25); }
.course-card:hover .course-icon-circle { transform: scale(1.1); }
.course-icon-circle i { color: #fff; font-size: 1.6rem; }
.course-card h6 {
  font-size: 1rem !important;
  font-weight: 700 !important;
  color: #1a3c6e !important;
  margin-bottom: 6px !important;
  line-height: 1.4 !important;
  text-align: center !important;
  padding-bottom: 0 !important;
  margin-top: 0 !important;
}
.course-card h6::after { display: none !important; }
.course-card .course-spec {
  font-size: 0.82rem;
  color: #6b7280;
  margin-bottom: 14px;
  text-align: center;
}
.course-tag {
  display: inline-block;
  font-size: 0.72rem;
  font-weight: 600;
  padding: 4px 14px;
  border-radius: 50px;
  margin: 3px;
  letter-spacing: 0.03em;
}
.course-tag.orange { background: rgba(232,119,34,0.10); color: #c05b0a; border: 1.5px solid rgba(232,119,34,0.2); }
.course-tag.blue   { background: rgba(37,99,168,0.10);  color: #1a4d8f; border: 1.5px solid rgba(37,99,168,0.2); }
.course-tag.green  { background: rgba(22,163,74,0.10);  color: #166534; border: 1.5px solid rgba(22,163,74,0.2); }
.course-tag.purple { background: rgba(124,58,237,0.10); color: #5b21b6; border: 1.5px solid rgba(124,58,237,0.2); }
.course-badge.purple { background: linear-gradient(135deg, #7c3aed, #9f67fa); }
.doc-link-list {
  list-style: none !important;
  padding: 0 !important;
  margin: 0 !important;
}
.doc-link-list li {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 12px 16px !important;
  border-radius: 10px;
  margin-bottom: 8px !important;
  background: linear-gradient(135deg, #f8faff 0%, #eef4ff 100%);
  border: 1.5px solid #dce8f8;
  transition: all 0.25s ease;
}
.doc-link-list li::before {
  display: none !important;
  content: none !important;
}
.doc-link-list li:hover {
  background: linear-gradient(135deg, #eef4ff 0%, #dce8f8 100%);
  border-color: #2563a8;
  transform: translateX(4px);
}
.doc-link-list li .doc-arrow {
  width: 32px; height: 32px;
  background: linear-gradient(135deg, #e87722, #f4a942);
  border-radius: 8px;
  display: flex; align-items: center; justify-content: center;
  flex-shrink: 0;
}
.doc-link-list li .doc-arrow i { color: #fff; font-size: 0.85rem; }
.doc-link-list li a {
  color: #1a3c6e;
  font-weight: 600;
  font-size: 0.93rem;
  text-decoration: none;
  transition: color 0.2s;
}
.doc-link-list li a:hover { color: #e87722; }
</style>

<section class="subpage-main-section py-4 bg-light">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="content-card">
          <div class="content-card-body">

            <!-- Page Header -->
            <div class="text-center mb-4">
              <div class="inst-hero-badge"><i class="fa fa-book-open"></i> Faculty of Education</div>
              <h1 class="h2 fw-bold inst-title-bar" style="color:#1a3c6e;">Faculty of Education</h1>
              <p class="text-secondary mb-0" style="font-size:0.97rem; text-align: center !important;">Sri Satya Sai University of Technology and Medical Sciences</p>
            </div>

            <!-- Principal & Message -->
            <div class="row g-4 mb-4 align-items-stretch">
              <div class="col-md-4">
                <div class="principal-card h-100">
                  <div class="principal-img-wrap">
                    <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/WhatsApp_Image_2026-02-10_at_12.55.44_PM_10022026_0101.jpg"
                         alt="Principal Ã¢â‚¬â€œ Faculty of Education"
                         onerror="this.src='<?php echo BASE_URL; ?>assets/images/Files/Link/principal_dummy_male.jpg'">
                  </div>
                  <div class="principal-info">
                    <h5>Principal</h5>
                    <div class="orange-line"></div>
                    <p><a href="<?php echo BASE_URL; ?>assets/pdf/193" target="_blank" rel="noopener">Faculty of Education</a></p>
                  </div>
                </div>
              </div>

              <div class="col-md-8">
                <div class="message-card">
                  <div class="quote-icon"><i class="fa fa-quote-left"></i></div>
                  <h4>Message from the Principal</h4>
                  <p>At the Faculty of Education, our goal is to prepare future educators who can shape young minds and contribute positively to society.</p>
                  <p>We believe that teaching is a noble profession that requires knowledge, patience, ethics, and dedication. Our B.A. B.Ed. integrated program is designed to provide strong academic foundations along with practical teaching skills.</p>
                  <p>We focus on modern teaching methodologies, classroom management, and value-based education so that our students become confident and capable teachers.</p>
                  <p>With experienced faculty, practical training, and a supportive learning environment, we are committed to developing skilled educators who can meet the demands of today's education system.</p>
                  <p class="mb-0">Our mission is to create passionate teachers who inspire learning and bring positive change in the field of education.</p>
                </div>
              </div>
            </div>

            <!-- Courses Offered -->
            <div class="section-card">
              <div class="section-card-title">
                <i class="fa fa-graduation-cap"></i> Courses Offered
              </div>
              <div class="row g-4 justify-content-center">
                <div class="col-sm-6 col-lg-5">
                  <div class="course-card">
                    <div class="course-icon-circle"><i class="fa fa-book-open"></i></div>
                    <h6>Bachelor of Arts Bachelor of Education</h6>
                    <p class="course-spec">B. A. B. Ed</p>
                    <span class="course-tag orange">4 Years</span>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-5">
                  <div class="course-card purple-accent">
                    <div class="course-icon-circle"><i class="fa fa-atom"></i></div>
                    <h6>Research</h6>
                    <p class="course-spec">Doctoral Programs</p>
                    <span class="course-tag purple">Ph.D.</span>
                  </div>
                </div>
              </div>
            </div>

            <!-- NCTE Regulation 2014 Clause 7(14) -->
            <div class="section-card">
              <div class="section-card-title">
                <i class="fa fa-file-alt"></i>
                <span style="text-decoration:underline; color:#240ae2;">NCTE Regulation 2014 Clause 7(14)</span>
              </div>
              <ul class="doc-link-list">
                <li>
                  <div class="doc-arrow"><i class="fa fa-arrow-right"></i></div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/intake.pdf" target="_blank" rel="noopener">Annual Intake</a>
                </li>
                <li>
                  <div class="doc-arrow"><i class="fa fa-arrow-right"></i></div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/BABED_ITEP_STAFF_LIST_2026_final_19052026_0207.pdf" target="_blank" rel="noopener">Teaching Faculty</a>
                </li>
                <li>
                  <div class="doc-arrow"><i class="fa fa-arrow-right"></i></div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/BABED_ITEP_STAFF_LIST_2026_final_-_join_last_quterly_23052026_1116.xlsx" target="_blank" rel="noopener">Join in the last Quarter</a>
                </li>
                <li>
                  <div class="doc-arrow"><i class="fa fa-arrow-right"></i></div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/students_list__22052026_0410.pdf" target="_blank" rel="noopener">Students Admitted</a>
                </li>
                <li>
                  <div class="doc-arrow"><i class="fa fa-arrow-right"></i></div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/fee_structure.pdf" target="_blank" rel="noopener">Fee Structure</a>
                </li>
                <li>
                  <div class="doc-arrow"><i class="fa fa-arrow-right"></i></div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/NCTE_Regulation_2014_Clouse_7_14_F_infra_.pdf" target="_blank" rel="noopener">Infrastructural Facilities</a>
                </li>
                <li>
                  <div class="doc-arrow"><i class="fa fa-arrow-right"></i></div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/Library_Information_18052026_0134.pdf" target="_blank" rel="noopener">Library Information</a>
                </li>
                <li>
                  <div class="doc-arrow"><i class="fa fa-arrow-right"></i></div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/Affidavit__22052026_0411.pdf" target="_blank" rel="noopener">Affidavit</a>
                </li>
                <li>
                  <div class="doc-arrow"><i class="fa fa-arrow-right"></i></div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/mandatory_disc_osre.pdf" target="_blank" rel="noopener">Mandatory Disclosure</a>
                </li>
                <li>
                  <div class="doc-arrow"><i class="fa fa-arrow-right"></i></div>
                  <a href="<?php echo BASE_URL; ?>assets/pdf/audit_report.pdf" target="_blank" rel="noopener">Audit Report</a>
                </li>
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

<?php require_once __DIR__ . '/../includes/footer.php'; ?>




