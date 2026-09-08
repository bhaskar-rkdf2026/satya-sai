<?php
$page_title = 'Research Promotion Policy - SSSUTMS';
$banner_title = 'Research Promotion Policy';
$banner_category = 'Research';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';

$pdf_path = BASE_URL . 'assets/images/Files/Link/RESEARCH_POLICIES_3.1.1_(1)_24062024_1034.pdf';
?>

<style>
:root {
  --rpp-navy: #0b2545;
  --rpp-blue: #1d4ed8;
  --rpp-amber: #f59e0b;
  --rpp-slate: #f8fafc;
  --rpp-text: #1e293b;
  --rpp-muted: #64748b;
}

.rpp-section {
  background-color: #f1f5f9;
  font-family: 'Inter', system-ui, -apple-system, sans-serif;
}

/* Hero Main Container */
.rpp-main-wrapper {
  background: #ffffff;
  border-radius: 24px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 20px 40px rgba(15, 23, 42, 0.04);
  overflow: hidden;
  margin-bottom: 2rem;
}

/* Header Banner Styling */
.rpp-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2.2rem 2rem;
  position: relative;
}
.rpp-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}

.rpp-pdf-btn {
  background: linear-gradient(135deg, #0b2545 0%, #1e4d8c 100%);
  color: #ffffff !important;
  font-weight: 700;
  font-size: 0.9rem;
  padding: 12px 22px;
  border-radius: 12px;
  display: inline-flex;
  align-items: center;
  gap: 10px;
  text-decoration: none !important;
  box-shadow: 0 4px 14px rgba(11,37,69,0.15);
  transition: all 0.25s ease;
}
.rpp-pdf-btn:hover {
  background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
  color: #ffffff !important;
  transform: translateY(-2px);
  box-shadow: 0 6px 20px rgba(217,119,6,0.3);
}

/* Stat Card Grid */
.rpp-stat-card {
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
.rpp-stat-card:hover {
  border-color: #f59e0b;
  transform: translateY(-2px);
  box-shadow: 0 6px 16px rgba(11, 37, 69, 0.08);
}
.rpp-stat-icon-wrapper {
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

/* Section Container Cards */
.rpp-content-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 20px;
  padding: 2rem;
  margin-bottom: 2rem;
  box-shadow: 0 4px 20px rgba(0,0,0,0.02);
  transition: border-color 0.2s ease;
}
.rpp-content-card:hover {
  border-color: #cbd5e1;
}

.rpp-card-title-head {
  display: flex;
  align-items: center;
  gap: 14px;
  margin-bottom: 1.5rem;
  padding-bottom: 1rem;
  border-bottom: 2px solid #f1f5f9;
}
.rpp-card-title-icon {
  width: 44px;
  height: 44px;
  border-radius: 12px;
  background: #0b2545;
  color: #f59e0b;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.25rem;
  flex-shrink: 0;
}

/* Incentive Row Cards */
.rpp-incentive-item {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-left: 5px solid #0b2545;
  border-radius: 14px;
  padding: 1.25rem 1.5rem;
  margin-bottom: 1.25rem;
  transition: all 0.25s ease;
}
.rpp-incentive-item:hover {
  background: #ffffff;
  border-left-color: #f59e0b;
  box-shadow: 0 8px 20px rgba(11, 37, 69, 0.06);
  transform: translateX(4px);
}
.rpp-item-tag {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  min-width: 36px;
  height: 32px;
  padding: 0 8px;
  border-radius: 8px;
  background: #0b2545;
  color: #ffffff;
  font-weight: 700;
  font-size: 0.85rem;
  flex-shrink: 0;
}

/* Styled Table for Publications */
.rpp-pub-table {
  width: 100%;
  border-collapse: separate;
  border-spacing: 0;
  border-radius: 14px;
  overflow: hidden;
  border: 1px solid #e2e8f0;
  margin-top: 1rem;
  margin-bottom: 1.25rem;
}
.rpp-pub-table th {
  background: linear-gradient(135deg, #0b2545 0%, #1e3a8a 100%);
  color: #ffffff;
  padding: 16px 20px;
  font-weight: 700;
  font-size: 0.95rem;
  letter-spacing: 0.3px;
}
.rpp-pub-table td {
  padding: 14px 20px;
  border-top: 1px solid #e2e8f0;
  color: #334155;
  font-size: 0.94rem;
}
.rpp-pub-table tbody tr:nth-child(even) {
  background-color: #f8fafc;
}
.rpp-pub-table tbody tr:hover {
  background-color: #eff6ff;
}

/* Money Badge */
.rpp-money-badge {
  background: #ecfdf5;
  color: #047857;
  border: 1px solid #a7f3d0;
  font-weight: 700;
  padding: 3px 10px;
  border-radius: 50px;
  font-size: 0.85rem;
  display: inline-flex;
  align-items: center;
  gap: 4px;
  vertical-align: middle;
}

/* Feature Item Row for Ph.D. & Conferences */
.rpp-feature-row {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 16px;
  padding: 1.25rem 1.5rem;
  transition: all 0.25s ease;
}
.rpp-feature-row:hover {
  background: #ffffff;
  border-color: #bfdbfe;
  box-shadow: 0 6px 18px rgba(11, 37, 69, 0.05);
}
.rpp-feature-icon {
  width: 48px;
  height: 48px;
  border-radius: 12px;
  background: linear-gradient(135deg, #0b2545 0%, #1e3a8a 100%);
  color: #f59e0b;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.3rem;
  flex-shrink: 0;
}

/* Navigation Pills for Conferences */
.rpp-conf-nav {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  margin-bottom: 1.5rem;
  background: #f1f5f9;
  padding: 8px;
  border-radius: 16px;
}
.rpp-conf-nav .nav-link {
  color: #475569;
  font-weight: 600;
  font-size: 0.9rem;
  padding: 10px 18px;
  border-radius: 12px;
  border: none;
  transition: all 0.2s ease;
  background: transparent;
}
.rpp-conf-nav .nav-link.active {
  background: #0b2545;
  color: #ffffff;
  box-shadow: 0 4px 12px rgba(11, 37, 69, 0.2);
}

/* Number Circle Badge */
.rpp-num-circle {
  width: 38px;
  height: 38px;
  border-radius: 10px;
  background: #0b2545;
  color: #ffffff;
  font-weight: 700;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  font-size: 0.95rem;
}
</style>

<section class="subpage-main-section rpp-section py-4 py-md-5">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Left Column -->
      <div class="col-lg-8 col-xl-9">
        <div class="rpp-main-wrapper">

          <!-- Header Banner -->
          <div class="rpp-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-file-contract me-1"></i> R&amp;D Policy &amp; Regulations
              </span>
              <h3 class="fw-bold text-white mb-1 fs-3">RESEARCH PROMOTION POLICY</h3>
              <p class="text-white-50 mb-0 small">Incentives, Ph.D. Financial Assistance &amp; Conference Travel Grants</p>
            </div>
            <div>
              <a href="<?php echo $pdf_path; ?>" target="_blank" rel="noopener" class="rpp-pdf-btn">
                <i class="fa-solid fa-file-pdf fs-5 text-warning"></i> Download Policy Document (PDF)
              </a>
            </div>
          </div>

          <!-- Content Outer Body -->
          <div class="p-4 p-md-5">

            <!-- Stat Chips Row -->
            <div class="row g-3 mb-4">
              <div class="col-sm-6 col-md-3">
                <div class="rpp-stat-card">
                  <div class="rpp-stat-icon-wrapper"><i class="fa-solid fa-award"></i></div>
                  <div>
                    <span class="text-muted extra-small uppercase fw-bold d-block">Paper Incentive</span>
                    <strong class="text-dark fs-6">Up to ₹2,00,000</strong>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="rpp-stat-card">
                  <div class="rpp-stat-icon-wrapper"><i class="fa-solid fa-graduation-cap"></i></div>
                  <div>
                    <span class="text-muted extra-small uppercase fw-bold d-block">Ph.D. Concession</span>
                    <strong class="text-dark fs-6">50% Tuition Fee</strong>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="rpp-stat-card">
                  <div class="rpp-stat-icon-wrapper"><i class="fa-solid fa-plane-departure"></i></div>
                  <div>
                    <span class="text-muted extra-small uppercase fw-bold d-block">Travel Assistance</span>
                    <strong class="text-dark fs-6">Up to ₹20,000</strong>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="rpp-stat-card">
                  <div class="rpp-stat-icon-wrapper"><i class="fa-solid fa-book-bookmark"></i></div>
                  <div>
                    <span class="text-muted extra-small uppercase fw-bold d-block">Indexing Support</span>
                    <strong class="text-dark fs-6">Scopus &amp; WoS</strong>
                  </div>
                </div>
              </div>
            </div>

            <!-- PDF Callout Alert -->
            <div class="p-3 mb-4 rounded-4 d-flex align-items-center justify-content-between flex-wrap gap-3" style="background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%); border: 1px solid #bfdbfe;">
              <div class="d-flex align-items-center gap-3">
                <div class="p-2.5 rounded-3 bg-white text-primary shadow-sm">
                  <i class="fa-solid fa-file-pdf fs-3 text-danger"></i>
                </div>
                <div>
                  <h6 class="fw-bold text-dark mb-0">Policies and Regulations for Conducting Research and Consultancy</h6>
                  <span class="small text-muted">Official Document Reference: RESEARCH_POLICIES_3.1.1</span>
                </div>
              </div>
              <a href="<?php echo $pdf_path; ?>" target="_blank" rel="noopener" class="btn btn-primary rounded-pill px-4 fw-bold shadow-sm">
                <i class="fa-solid fa-download me-2"></i>Open PDF
              </a>
            </div>

            <!-- Director Desk Note -->
            <div class="rpp-content-card">
              <div class="rpp-card-title-head">
                <div class="rpp-card-title-icon"><i class="fa-solid fa-quote-left"></i></div>
                <div>
                  <h4 class="fw-bold text-dark mb-0 fs-5">From the Desk of Director, Research and Development</h4>
                  <span class="small text-muted">University Guidelines &amp; Scope Overview</span>
                </div>
              </div>
              <p class="text-dark lh-lg mb-3">
                Research is an important parameter for any Institution. To promote Research and Publications by the faculty members and students of the University, the guidelines for Research promotion is categorized as:-
              </p>
              <div class="row g-3">
                <div class="col-md-4">
                  <div class="p-3 rounded-3 border bg-light h-100">
                    <div class="d-flex align-items-center gap-2 mb-1 text-primary fw-bold">
                      <span class="badge bg-primary rounded-circle px-2 py-1">1</span> Research Incentives
                    </div>
                    <p class="small text-secondary mb-0">Incentives for Research projects, publications and research related Activities.</p>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="p-3 rounded-3 border bg-light h-100">
                    <div class="d-flex align-items-center gap-2 mb-1 text-primary fw-bold">
                      <span class="badge bg-primary rounded-circle px-2 py-1">2</span> Ph.D. Assistance
                    </div>
                    <p class="small text-secondary mb-0">Financial assistance for pursuing Ph.D. in SSSUTMS.</p>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="p-3 rounded-3 border bg-light h-100">
                    <div class="d-flex align-items-center gap-2 mb-1 text-primary fw-bold">
                      <span class="badge bg-primary rounded-circle px-2 py-1">3</span> Conferences &amp; FDPs
                    </div>
                    <p class="small text-secondary mb-0">Financial assistance for attending National/International Conferences and FDPs.</p>
                  </div>
                </div>
              </div>
            </div>

            <!-- SECTION 1: INCENTIVES FOR RESEARCH PROJECTS & PUBLICATIONS -->
            <div class="rpp-content-card">
              <div class="rpp-card-title-head">
                <div class="rpp-card-title-icon"><i class="fa-solid fa-trophy"></i></div>
                <div>
                  <h4 class="fw-bold text-dark mb-0 fs-5">Incentives for Research Projects, Publications and Research Related Activities</h4>
                  <span class="small text-muted">Extramural Projects, Books, Journals &amp; Faculty Recognitions</span>
                </div>
              </div>

              <!-- i. Extramural Submission -->
              <div class="rpp-incentive-item">
                <div class="d-flex align-items-start gap-3">
                  <span class="rpp-item-tag">i</span>
                  <div>
                    <h6 class="fw-bold text-dark mb-1">Extramural Project Submission Reward</h6>
                    <p class="mb-0 text-dark small lh-base">
                      The faculty (Principal Investigator) submitting a research project for extramural funding by government / other agencies (for more than <strong>Rs. 3,00,000</strong>), priorly approved by the University Research committee / SSSUTMS Council for research, shall be awarded a monetary reward of <span class="rpp-money-badge">Rs. 5,000</span> per project.
                    </p>
                  </div>
                </div>
              </div>

              <!-- ii. Project Sanction -->
              <div class="rpp-incentive-item">
                <div class="d-flex align-items-start gap-3">
                  <span class="rpp-item-tag">ii</span>
                  <div>
                    <h6 class="fw-bold text-dark mb-1">Sanctioned Project Monetary Reward</h6>
                    <p class="mb-0 text-dark small lh-base">
                      The faculty (Principal Investigator) submitting a research project for extramural funding and getting a sanction by funding agency (government / other) shall be awarded a monetary rewards of <span class="rpp-money-badge">2% (Two Percent)</span> of the total funding.
                    </p>
                  </div>
                </div>
              </div>

              <!-- iii. Books & Chapters -->
              <div class="rpp-incentive-item">
                <div class="d-flex align-items-start gap-3">
                  <span class="rpp-item-tag">iii</span>
                  <div>
                    <h6 class="fw-bold text-dark mb-1">Book &amp; Chapter Publications</h6>
                    <p class="mb-0 text-dark small lh-base">
                      Faculty members publishing Books / Chapters in the reputed publishing house in edited volumes will be awarded a suitable cash prize <span class="rpp-money-badge">Rs. 10,000</span>.
                    </p>
                  </div>
                </div>
              </div>

              <!-- iv. Journal Publications -->
              <div class="rpp-incentive-item">
                <div class="d-flex align-items-start gap-3 mb-2">
                  <span class="rpp-item-tag">iv</span>
                  <div>
                    <h6 class="fw-bold text-dark mb-1">Journal Article Publications (SCOPUS / PUBMED / WoS / UGC)</h6>
                    <p class="mb-0 text-dark small lh-base">
                      Publication of scientific articles in SCOPUS / PUBMED / UGC indexed journals, shall be awarded as per the following:
                    </p>
                  </div>
                </div>

                <div class="table-responsive ms-0 ms-md-4">
                  <table class="rpp-pub-table">
                    <thead>
                      <tr>
                        <th>Journal Category / Indexing</th>
                        <th>Award Incentive</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><strong>Listed Journal (A* Category)</strong></td>
                        <td><span class="rpp-money-badge">Rs. 2,00,000</span> (Two Lakhs)</td>
                      </tr>
                      <tr>
                        <td><strong>Listed Journal (A Category)</strong></td>
                        <td><span class="rpp-money-badge">Rs. 1,00,000</span> (One Lakh)</td>
                      </tr>
                      <tr>
                        <td><strong>Listed Journal (B Category)</strong></td>
                        <td><span class="rpp-money-badge">Rs. 50,000</span> (Fifty Thousand)</td>
                      </tr>
                      <tr>
                        <td><strong>Scopus Indexed Journal</strong></td>
                        <td><span class="rpp-money-badge">Rs. 50,000</span> (Fifty Thousand)</td>
                      </tr>
                      <tr>
                        <td><strong>Web of Science Indexed Journal</strong></td>
                        <td><span class="rpp-money-badge">Rs. 50,000</span> (Fifty Thousand)</td>
                      </tr>
                      <tr>
                        <td><strong>UGC Approved List Journal indexed in SCOPUS / Web of Science</strong></td>
                        <td><span class="rpp-money-badge">Rs. 50,000</span> (Fifty Thousand)</td>
                      </tr>
                    </tbody>
                  </table>
                </div>

                <div class="p-3 bg-white rounded-3 border ms-0 ms-md-4">
                  <p class="mb-1 small text-dark">
                    <strong>a)</strong> The incentive applies to members of faculty who publish while remaining on rolls of the university.
                  </p>
                  <p class="mb-0 small text-dark">
                    <strong>b)</strong> In case the publication is in joint names / authorship the incentive shall be appropriately distributed to Authors of the paper as per their contribution in the article.
                  </p>
                </div>
              </div>

              <!-- v. Awards & Fellowships -->
              <div class="rpp-incentive-item">
                <div class="d-flex align-items-start gap-3">
                  <span class="rpp-item-tag">v</span>
                  <div>
                    <h6 class="fw-bold text-dark mb-1">State / National / International Awards &amp; Fellowships</h6>
                    <p class="mb-0 text-dark small lh-base">
                      Faculty members receiving state / national / International award / fellowship shall be awarded suitably.
                    </p>
                  </div>
                </div>
              </div>

              <!-- vi. Best Teacher Award -->
              <div class="rpp-incentive-item">
                <div class="d-flex align-items-start gap-3">
                  <span class="rpp-item-tag">vi</span>
                  <div>
                    <h6 class="fw-bold text-dark mb-1">Annual Best Teacher Award</h6>
                    <p class="mb-0 text-dark small lh-base">
                      Annual Best Teacher award in each faculty shall be awarded according to parameters judged by committee constituted by competent authority. The award shall include a <strong>certificate, medal and a suitably awarded cash prize</strong>.
                    </p>
                  </div>
                </div>
              </div>

              <!-- vii. Annual Assessment & KPIs -->
              <div class="rpp-incentive-item">
                <div class="d-flex align-items-start gap-3">
                  <span class="rpp-item-tag">vii</span>
                  <div>
                    <h6 class="fw-bold text-dark mb-1">Annual Assessment &amp; Key Performance Indicators (KPIs)</h6>
                    <p class="mb-0 text-dark small lh-base">
                      Every faculty member will have an annual assessment based on contribution in academic &amp; research spheres. These assessments will be given significant weightage for individual faculty member &amp; collectively for the department. Research performance and achievements are an essential part of the Key Performance Indicators (KPIs) for annual increments. For promotion to Higher post / salary increment, significant contribution in teaching, research and patient care if applicable will be awarded and given weightage in professional career advancement.
                    </p>
                  </div>
                </div>
              </div>

              <!-- viii. Facilities & Letter of Appreciation -->
              <div class="rpp-incentive-item">
                <div class="d-flex align-items-start gap-3">
                  <span class="rpp-item-tag">viii</span>
                  <div>
                    <h6 class="fw-bold text-dark mb-1">Infrastructure Access &amp; Appreciation Letter</h6>
                    <p class="mb-0 text-dark small lh-base">
                      The researcher is permitted to use the infrastructural facilities like research equipments available within the University, with prior approval through proper channel. A letter of appreciation from the Director, Research &amp; Development would be given to researcher for extraordinary research work.
                    </p>
                  </div>
                </div>
              </div>

              <!-- ix. NPTEL FDP Refund -->
              <div class="rpp-incentive-item">
                <div class="d-flex align-items-start gap-3">
                  <span class="rpp-item-tag">ix</span>
                  <div>
                    <h6 class="fw-bold text-dark mb-1">NPTEL FDP Exam Fee Refund</h6>
                    <p class="mb-0 text-dark small lh-base">
                      It has been decided that all assistant professors will do a FDP program from NPTEL and examination fee will be refunded after producing certificate of successful completion.
                    </p>
                  </div>
                </div>
              </div>

              <!-- x. Plagiarism Check -->
              <div class="rpp-incentive-item mb-0">
                <div class="d-flex align-items-start gap-3">
                  <span class="rpp-item-tag">x</span>
                  <div>
                    <h6 class="fw-bold text-dark mb-1">Free Plagiarism Check by IQAC</h6>
                    <p class="mb-0 text-dark small lh-base">
                      The Plagiarism check done by IQAC for scientific papers of students / faculty from the University shall not be charged.
                    </p>
                  </div>
                </div>
              </div>
            </div>

            <!-- SECTION 2: Ph.D. ASSISTANCE -->
            <div class="rpp-content-card">
              <div class="rpp-card-title-head">
                <div class="rpp-card-title-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                <div>
                  <h4 class="fw-bold text-dark mb-0 fs-5">Financial Assistance for Pursuing Ph.D.</h4>
                  <span class="small text-muted">Support Guidelines for Internal Faculty Doctoral Studies</span>
                </div>
              </div>

              <!-- Objective Paragraph -->
              <div class="p-3 mb-4 rounded-3 border-start border-4 border-warning bg-light">
                <div class="d-flex align-items-center gap-2 fw-bold text-dark mb-1">
                  <i class="fa-solid fa-bullseye text-warning"></i> Objective
                </div>
                <p class="mb-0 text-dark small lh-base">
                  The Objective of these guidelines is to encourage faculty members to improve their qualifications by pursuing Ph.D. programmes available in the University. Any teacher of the University can enroll for the Ph.D. programme as per the procedure laid down by the University.
                </p>
              </div>

              <!-- 3 Sleek Feature Rows -->
              <div class="d-flex flex-column gap-3">

                <!-- Row 1 -->
                <div class="rpp-feature-row d-flex align-items-center gap-3">
                  <div class="rpp-feature-icon">
                    <i class="fa-solid fa-percent"></i>
                  </div>
                  <div>
                    <h6 class="fw-bold text-dark mb-1">50% Tuition Fee Concession</h6>
                    <p class="mb-0 text-muted small lh-base">
                      A teacher who is admitted to the Ph.D. course shall be provided fee concession to the tune of <span class="rpp-money-badge">50% of the fee</span> charged for the course.
                    </p>
                  </div>
                </div>

                <!-- Row 2 -->
                <div class="rpp-feature-row d-flex align-items-center gap-3">
                  <div class="rpp-feature-icon">
                    <i class="fa-solid fa-wallet"></i>
                  </div>
                  <div>
                    <h6 class="fw-bold text-dark mb-1">Annual Contingency Fund</h6>
                    <p class="mb-0 text-muted small lh-base">
                      A teacher shall be provided <span class="rpp-money-badge">Rs. 10,000/- per annum</span> as contingency fund for stationery, travel to research institutes, purchase of books etc. (books deposited with Departmental library post Ph.D.).
                    </p>
                  </div>
                </div>

                <!-- Row 3 -->
                <div class="rpp-feature-row d-flex align-items-center gap-3">
                  <div class="rpp-feature-icon">
                    <i class="fa-solid fa-file-contract"></i>
                  </div>
                  <div>
                    <h6 class="fw-bold text-dark mb-1">Service Undertaking Requirement</h6>
                    <p class="mb-0 text-muted small lh-base">
                      The teacher will have to take an undertaking that he/she shall continue to be in the employment of the University for <strong>one year</strong> after completing Ph.D. course.
                    </p>
                  </div>
                </div>

              </div>
            </div>

            <!-- SECTION 3: CONFERENCES & FDPS -->
            <div class="rpp-content-card mb-0">
              <div class="rpp-card-title-head">
                <div class="rpp-card-title-icon"><i class="fa-solid fa-plane-departure"></i></div>
                <div>
                  <h4 class="fw-bold text-dark mb-0 fs-5">Financial Assistance for Conferences &amp; FDPs</h4>
                  <span class="small text-muted">Attending National &amp; International Conferences, Seminars &amp; Workshops</span>
                </div>
              </div>

              <!-- Interactive Tabs for Conference Section -->
              <ul class="nav rpp-conf-nav" id="confPills" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="pill-guide-tab" data-bs-toggle="pill" data-bs-target="#pill-guide" type="button" role="tab">Objective &amp; Guidelines</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pill-elig-tab" data-bs-toggle="pill" data-bs-target="#pill-elig" type="button" role="tab">Eligibility Criteria</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pill-proc-tab" data-bs-toggle="pill" data-bs-target="#pill-proc" type="button" role="tab">Application Procedure</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pill-action-tab" data-bs-toggle="pill" data-bs-target="#pill-action" type="button" role="tab">Follow-up &amp; Deputation</button>
                </li>
              </ul>

              <div class="tab-content" id="confPillsContent">
                
                <!-- Tab 1: Objective & Guidelines -->
                <div class="tab-pane fade show active" id="pill-guide" role="tabpanel">
                  <!-- Objective Callout -->
                  <div class="p-3 mb-4 rounded-3 border-start border-4 border-warning bg-light">
                    <div class="d-flex align-items-center gap-2 fw-bold text-dark mb-1">
                      <i class="fa-solid fa-bullseye text-warning"></i> Objective
                    </div>
                    <p class="mb-0 text-dark small lh-base">
                      To encourage faculty members to attend National / International conferences, seminars, symposia, workshops, and short-duration training programmes.
                    </p>
                  </div>

                  <h6 class="fw-bold text-dark mb-3">Guidelines for Financial Assistance (India or Abroad)</h6>

                  <div class="d-flex flex-column gap-3">

                    <div class="rpp-feature-row d-flex align-items-start gap-3">
                      <span class="rpp-num-circle">A</span>
                      <div>
                        <h6 class="fw-bold text-dark mb-1">Academic Leave without Financial Assistance</h6>
                        <p class="mb-0 text-muted small lh-base">
                          Academic leave up to 10 days may be granted without any financial assistance by the University if a teacher is not presenting any paper in the workshop or training programme with in India or abroad.
                        </p>
                      </div>
                    </div>

                    <div class="rpp-feature-row d-flex align-items-start gap-3">
                      <span class="rpp-num-circle">B</span>
                      <div>
                        <h6 class="fw-bold text-dark mb-1">International Collaboration Exchange Programs</h6>
                        <p class="mb-0 text-muted small lh-base">
                          Teachers going under any international collaboration exchange programme with CSIR, DST, ICSSR, ICAR, MCI, DCI and other agencies of similar reputation may be provided financial assistance up to <strong>50% of the travel expenses or Rs. 20,000/-</strong> (whichever is less) in addition to maximum 10 days academic leaves. However, the works and detailed plan of such visits should be submitted to the Director, R&amp;D of the University.
                        </p>
                      </div>
                    </div>

                    <div class="rpp-feature-row d-flex align-items-start gap-3">
                      <span class="rpp-num-circle">C</span>
                      <div>
                        <h6 class="fw-bold text-dark mb-1">National Level Conferences Support</h6>
                        <p class="mb-0 text-muted small lh-base">
                          Financial assistance to teachers for attending the conferences/seminars/symposia etc. at national level will be available <strong>once in two academic years</strong>. Limited to travel expenditure (actual train fare-AC-2 Tier or equivalent air fare and registration fee to a maximum of <span class="rpp-money-badge">Rs. 10,000/-</span>.
                        </p>
                      </div>
                    </div>

                    <div class="rpp-feature-row d-flex align-items-start gap-3">
                      <span class="rpp-num-circle">D</span>
                      <div>
                        <h6 class="fw-bold text-dark mb-1">International Conferences Abroad Support</h6>
                        <p class="mb-0 text-muted small lh-base">
                          Financial assistance to teachers for attending the conferences/seminars/symposia etc. abroad/ internationally will be available <strong>once in three academic years</strong>. Limited to travel expenditure and registration fee to a maximum of <span class="rpp-money-badge">Rs. 20,000/-</span>. Deputation to attend conference in India will not be counted for the purpose of availing such assistance.
                        </p>
                      </div>
                    </div>

                    <div class="rpp-feature-row d-flex align-items-start gap-3">
                      <span class="rpp-num-circle">E</span>
                      <div>
                        <h6 class="fw-bold text-dark mb-1">Departmental Quota &amp; Selection Preference</h6>
                        <p class="mb-0 text-muted small lh-base">
                          Only one teacher per department will be allowed to attend the same conference in India or abroad. In case of two or more applicants for attending the same conference/seminars &amp; symposium etc, the <strong>youngest teacher may be given preference</strong> over the other senior teacher to promote or update his /her knowledge and enable him/her to perform better.
                        </p>
                      </div>
                    </div>

                  </div>
                </div>

                <!-- Tab 2: Eligibility Criteria -->
                <div class="tab-pane fade" id="pill-elig" role="tabpanel">
                  <h6 class="fw-bold text-dark mb-3">Eligibility for Financial Assistance</h6>

                  <div class="d-flex flex-column gap-3">
                    <div class="rpp-feature-row">
                      <h6 class="fw-bold text-dark mb-1">a) Program Verification</h6>
                      <p class="mb-0 text-muted small lh-base">
                        The teachers who are invited to attend national/international academic conference/seminars etc. should verify that the level of programme and the Institution organizing the events is truly the national/international, professional and capable of enhancing the skills of the participants.
                      </p>
                    </div>

                    <div class="rpp-feature-row">
                      <h6 class="fw-bold text-dark mb-2">b) Order of Preferences for Financial Assistance</h6>
                      <ol class="ps-4 mb-0 text-dark small">
                        <li class="mb-1">Teachers delivering keynote address / plenary lectures</li>
                        <li class="mb-1">Teachers contributing a paper</li>
                        <li class="mb-1">Teachers invited to chair a session</li>
                        <li class="mb-1">Teachers invited under international collaboration exchange programme</li>
                        <li class="mb-0">Teacher invited to give talks / lectures</li>
                      </ol>
                    </div>

                    <div class="rpp-feature-row">
                      <h6 class="fw-bold text-dark mb-1">c) Acceptance Letter Requirement</h6>
                      <p class="mb-0 text-muted small lh-base">
                        The acceptance of papers from organizers should have been received.
                      </p>
                    </div>

                    <div class="rpp-feature-row">
                      <h6 class="fw-bold text-dark mb-1">d) Priority Criteria</h6>
                      <p class="mb-0 text-muted small lh-base">
                        Subject to all other conditions being equal, preference may be given to application who have already raised part financial support from other sources who are session Chairman/Organizing Committee Official / Award winner in addition to the paper presentation. Preference may also be given to those who have never been deputed to attend such conferences.
                      </p>
                    </div>
                  </div>
                </div>

                <!-- Tab 3: Application Procedure -->
                <div class="tab-pane fade" id="pill-proc" role="tabpanel">
                  <h6 class="fw-bold text-dark mb-3">Procedure of Applying for Financial Assistance</h6>
                  
                  <div class="d-flex flex-column gap-3">
                    <div class="rpp-feature-row">
                      <h6 class="fw-bold text-dark mb-1">a) Prescribed Application Form</h6>
                      <p class="mb-0 text-muted small lh-base">
                        The prescribed application form for conference/symposia/seminar etc. in India and abroad is to be used.
                      </p>
                    </div>

                    <div class="rpp-feature-row">
                      <h6 class="fw-bold text-dark mb-2">b) Submission Timeline &amp; Enclosed Documents</h6>
                      <p class="small text-muted mb-2">
                        Application duly forwarding by the head of the Department with their specific recommendation (regarding eligibility and amount to be given), should reach the Office of the <strong>DIRECTOR, Research and development preferably 30 days before</strong> the date of the programme (even if , the acceptance letter is not received which should be submitted as soon as it is received) along with the following document:
                      </p>
                      <ul class="ps-4 mb-0 text-dark small" style="list-style-type: upper-roman;">
                        <li class="mb-2">A soft copy of the full text of documents/papers prepared by the teacher for presentation at the National/International conference/seminars/symposia/ congress/workshops. The details of training programme, even if of short duration should be provided.</li>
                        <li class="mb-2">Brief details of the organizers, title of the programme, place and duration of the conference etc. in which the paper is proposed to be presented or participation is desired.</li>
                        <li class="mb-2">A copy of the letter of invitation from the organizers of the conference/seminar/symposium accepting the paper for presentation, immediately after it is received or a copy of the letter from the organizer inviting the teacher to chair a session/section and mentioning details of the financial support offered etc. should also be enclosed.</li>
                        <li class="mb-0">In case of conference / seminars / symposia / congress /workshops / training programme of short duration, the Invitation or other relevant documents should be attached.</li>
                      </ul>
                    </div>
                  </div>
                </div>

                <!-- Tab 4: Follow-up & Deputation -->
                <div class="tab-pane fade" id="pill-action" role="tabpanel">
                  <h6 class="fw-bold text-dark mb-3">Follow-up Action (Abroad &amp; India)</h6>
                  <div class="row g-3 mb-4">
                    <div class="col-md-6">
                      <div class="rpp-feature-row h-100">
                        <h6 class="fw-bold text-dark mb-1">a) Non-Utilization Notice</h6>
                        <p class="mb-0 small text-muted lh-base">
                          The teachers not utilizing their sanctioned amount for whatever reason should immediately inform the Director, Research &amp; Development <strong>within a week</strong> through the concerned Head to enable others to utilize the amount so released.
                        </p>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="rpp-feature-row h-100">
                        <h6 class="fw-bold text-dark mb-1">b) Bills &amp; Certificate Submission</h6>
                        <p class="mb-0 small text-muted lh-base">
                          Deputed teachers after attending conferences should provide a participation certificate and submit the bills <strong>within one month</strong> of return from the conference.
                        </p>
                      </div>
                    </div>
                  </div>

                  <h6 class="fw-bold text-dark mb-3">Deputation Without Financial Support (Abroad &amp; India)</h6>
                  <div class="d-flex flex-column gap-2">
                    <div class="rpp-feature-row">
                      <h6 class="fw-bold text-dark mb-1">a) Application Procedure</h6>
                      <p class="mb-0 small text-muted lh-base">
                        Teacher seeking permission to attend conferences/seminars/symposia/ workshop / training programme in India or abroad without financial support from the University but (academic) leave only, should also follow the same procedure as mentioned in procedure of applying for financial assistance for attending conferences/seminars/symposia etc abroad and India.
                      </p>
                    </div>
                    <div class="rpp-feature-row">
                      <h6 class="fw-bold text-dark mb-1">b) Exemption from Frequency Limit</h6>
                      <p class="mb-0 small text-muted lh-base">
                        Such teachers should fulfill all the requirements listed above, but the frequency restriction (once in 3 years only for conferences abroad and once in 2 years for conferences in India ) shall not apply to them.
                      </p>
                    </div>
                    <div class="rpp-feature-row">
                      <h6 class="fw-bold text-dark mb-1">c) Leave Sanction</h6>
                      <p class="mb-0 small text-muted lh-base">
                        Such teachers shall be granted leave as per University rules.
                      </p>
                    </div>
                    <div class="rpp-feature-row">
                      <h6 class="fw-bold text-dark mb-1">d) Vice Chancellor Discretion</h6>
                      <p class="mb-0 small text-muted lh-base">
                        For any conference /academic seminar etc., as a special case, Vice Chancellor may allow up to 50% of the Faculty member to attend such conference/training etc. without financial assistance, so that the teaching of the department should not suffer.
                      </p>
                    </div>
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