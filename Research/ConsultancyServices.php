<?php
$page_title = 'Consultancy Services - SSSUTMS';
$banner_title = 'Consultancy Services';
$banner_category = 'Research';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?>

<style>
.cs-section { 
  background-color: #f8fafc;
  font-family: 'Inter', system-ui, -apple-system, sans-serif;
}

.cs-main-wrapper {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}

.cs-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2.2rem 2rem;
  position: relative;
}
.cs-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}

.cs-stat-card {
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
.cs-stat-card:hover {
  border-color: #f59e0b;
  box-shadow: 0 6px 16px rgba(11,37,69,0.08);
  transform: translateY(-2px);
}
.cs-stat-icon {
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

/* Nav Tabs Styling */
.cs-nav-pills {
  border-bottom: 2px solid #e2e8f0;
  gap: 6px;
  margin-bottom: 1.25rem;
  padding-bottom: 4px;
}
.cs-nav-pills .nav-link {
  color: #475569;
  font-weight: 600;
  font-size: 0.88rem;
  padding: 8px 14px;
  border-radius: 10px;
  border: 1px solid transparent;
  transition: all 0.2s ease;
}
.cs-nav-pills .nav-link:hover {
  color: #0b2545;
  background: #f1f5f9;
}
.cs-nav-pills .nav-link.active {
  background: #0b2545;
  color: #ffffff;
  box-shadow: 0 4px 12px rgba(11, 37, 69, 0.18);
}

/* Feature Item Row */
.cs-feature-row {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 0.9rem 1.1rem;
  margin-bottom: 0.75rem;
  transition: all 0.25s ease;
}
.cs-feature-row:hover {
  background: #ffffff;
  border-color: #bfdbfe;
  box-shadow: 0 4px 12px rgba(11, 37, 69, 0.05);
}

.cs-tag-badge {
  min-width: 30px;
  height: 30px;
  border-radius: 8px;
  background: #0b2545;
  color: #ffffff;
  font-weight: 700;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 0.85rem;
  flex-shrink: 0;
}

/* Ratio Callout Banner */
.cs-ratio-callout {
  background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%);
  border: 1px solid #fde68a;
  border-left: 4px solid #f59e0b;
  border-radius: 12px;
  padding: 1.1rem;
}

/* Partner Pill Badges */
.cs-partner-badge {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  color: #0b2545;
  font-weight: 600;
  font-size: 0.85rem;
  padding: 8px 14px;
  border-radius: 10px;
  display: inline-flex;
  align-items: center;
  gap: 8px;
  transition: all 0.2s ease;
  box-shadow: 0 2px 6px rgba(0,0,0,0.02);
}
.cs-partner-badge:hover {
  background: #0b2545;
  color: #ffffff;
  border-color: #0b2545;
  transform: translateY(-2px);
  box-shadow: 0 4px 12px rgba(11, 37, 69, 0.15);
}
.cs-partner-badge:hover i {
  color: #f59e0b !important;
}
</style>

<section class="subpage-main-section cs-section py-4 py-md-5">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Left Column -->
      <div class="col-lg-8 col-xl-9">
        <div class="cs-main-wrapper">

          <!-- Header Banner -->
          <div class="cs-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-briefcase me-1"></i> R&amp;D Consultancy Services
              </span>
              <h3 class="fw-bold text-white mb-1 fs-3">CONSULTANCY SERVICES</h3>
              <p class="text-white-50 mb-0 small">Transferring Academic Knowledge &amp; Infrastructure for Industrial Solutions</p>
            </div>
          </div>

          <!-- Content Outer Body -->
          <div class="p-3.5 p-md-4">

            <!-- Stat Chips Row -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-sm-6 col-md-3">
                <div class="cs-stat-card">
                  <div class="cs-stat-icon"><i class="fa-solid fa-percent"></i></div>
                  <div>
                    <span class="text-muted extra-small uppercase fw-bold d-block">Revenue Share</span>
                    <strong class="text-dark fs-6">60% Staff : 40% Univ</strong>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="cs-stat-card">
                  <div class="cs-stat-icon"><i class="fa-solid fa-building"></i></div>
                  <div>
                    <span class="text-muted extra-small uppercase fw-bold d-block">Partnerships</span>
                    <strong class="text-dark fs-6">11 Active Clients</strong>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="cs-stat-card">
                  <div class="cs-stat-icon"><i class="fa-solid fa-sitemap"></i></div>
                  <div>
                    <span class="text-muted extra-small uppercase fw-bold d-block">Nodal Agency</span>
                    <strong class="text-dark fs-6">R&amp;D Department</strong>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="cs-stat-card">
                  <div class="cs-stat-icon"><i class="fa-solid fa-chart-line"></i></div>
                  <div>
                    <span class="text-muted extra-small uppercase fw-bold d-block">Appraisal</span>
                    <strong class="text-dark fs-6">Performance Index</strong>
                  </div>
                </div>
              </div>
            </div>

            <!-- Interactive Pill Navigation Tabs -->
            <ul class="nav nav-pills cs-nav-pills flex-column flex-sm-row" id="csTabs" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="policy-tab" data-bs-toggle="pill" data-bs-target="#tab-policy" type="button" role="tab" aria-controls="tab-policy" aria-selected="true">
                  <i class="fa-solid fa-landmark me-2"></i>Policy &amp; Vision
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="activities-tab" data-bs-toggle="pill" data-bs-target="#tab-activities" type="button" role="tab" aria-controls="tab-activities" aria-selected="false">
                  <i class="fa-solid fa-layer-group me-2"></i>Consultation Activities
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="process-tab" data-bs-toggle="pill" data-bs-target="#tab-process" type="button" role="tab" aria-controls="tab-process" aria-selected="false">
                  <i class="fa-solid fa-diagram-project me-2"></i>Process &amp; Revenue Share
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="objectives-tab" data-bs-toggle="pill" data-bs-target="#tab-objectives" type="button" role="tab" aria-controls="tab-objectives" aria-selected="false">
                  <i class="fa-solid fa-bullseye me-2"></i>Objectives &amp; Partners
                </button>
              </li>
            </ul>

            <!-- Tab Content Panes -->
            <div class="tab-content" id="csTabsContent">

              <!-- TAB 1: POLICY & VISION -->
              <div class="tab-pane fade show active" id="tab-policy" role="tabpanel" aria-labelledby="policy-tab">
                <div class="p-4 mb-4 rounded-3" style="background: #f8fafc; border: 1px solid #e2e8f0; border-left: 4px solid #f59e0b;">
                  <h6 class="fw-bold text-dark mb-2 fs-6">
                    <i class="fa-solid fa-compass text-warning me-2"></i>Institutional Vision &amp; Background
                  </h6>
                  <p class="mb-0 text-secondary small lh-base" style="font-size: 0.925rem;">
                    SSSUTMS University has strong focus on meaningful research activities which should benefit society. It also believes that expertise gained by the university should not only be used in improving teaching - learning and research system within the university but also should be used to benefit larger part of the society. In order to motivate university staff to share their knowledge and expertise for betterment of Society, University shall permit consultancy and project/work in industry, corporate sectors and other organisations by the university staff. The staff may use material resources of the University for such Consultancy Work. The university shall share the monitoring benefits occurring out of such work/association/assignments with the concerned staff.
                  </p>
                </div>

                <div class="row g-3">
                  <div class="col-md-6">
                    <div class="cs-feature-row h-100">
                      <div class="d-flex align-items-center gap-2 mb-2">
                        <i class="fa-solid fa-hand-holding-hand text-warning fs-5"></i>
                        <h6 class="fw-bold text-dark mb-0">Resource Sharing</h6>
                      </div>
                      <p class="mb-0 small text-muted lh-base">
                        University permits staff to utilize academic facilities, physical infrastructure, and specialized laboratories for consultancy assignments.
                      </p>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="cs-feature-row h-100">
                      <div class="d-flex align-items-center gap-2 mb-2">
                        <i class="fa-solid fa-scale-balanced text-warning fs-5"></i>
                        <h6 class="fw-bold text-dark mb-0">Proportional Benefit Split</h6>
                        </div>
                      <p class="mb-0 small text-muted lh-base">
                        Monetary benefits occurring from industry associations are shared systematically between working staff and university development funds.
                      </p>
                    </div>
                  </div>
                </div>
              </div>

              <!-- TAB 2: CONSULTATION ACTIVITIES (A to F) -->
              <div class="tab-pane fade" id="tab-activities" role="tabpanel" aria-labelledby="activities-tab">
                <p class="small text-muted mb-3">Following activities fall under the scope of University Consultancy Services:</p>

                <div class="cs-feature-row d-flex align-items-start gap-3">
                  <span class="cs-tag-badge">A</span>
                  <div>
                    <h6 class="fw-bold text-dark mb-1">Product &amp; Services Development</h6>
                    <p class="mb-0 small text-muted lh-base">
                      For development of a product/part of product or services for any individual industry or organisation external to the university shall fall under consultancy where one or more university staff works for such development for a pre agreed cost and period.
                    </p>
                  </div>
                </div>

                <div class="cs-feature-row d-flex align-items-start gap-3">
                  <span class="cs-tag-badge">B</span>
                  <div>
                    <h6 class="fw-bold text-dark mb-1">Product Modification &amp; Augmentation</h6>
                    <p class="mb-0 small text-muted lh-base">
                      For modification, augmentation or alteration of any product or process or services where one or more university staff extend their active participation for such job.
                    </p>
                  </div>
                </div>

                <div class="cs-feature-row d-flex align-items-start gap-3">
                  <span class="cs-tag-badge">C</span>
                  <div>
                    <h6 class="fw-bold text-dark mb-1">Professional Advisory Services</h6>
                    <p class="mb-0 small text-muted lh-base">
                      Any kind of professional advice given by one or more staff of the university to external organisation/firm/individual for a pre decided cost and time.
                    </p>
                  </div>
                </div>

                <div class="cs-feature-row d-flex align-items-start gap-3">
                  <span class="cs-tag-badge">D</span>
                  <div>
                    <h6 class="fw-bold text-dark mb-1">Commissioned External Research</h6>
                    <p class="mb-0 small text-muted lh-base">
                      Any research work undertaken by one or more staff of the university for any external individual or organisation to develop product or process or services.
                    </p>
                  </div>
                </div>

                <div class="cs-feature-row d-flex align-items-start gap-3">
                  <span class="cs-tag-badge">E</span>
                  <div>
                    <h6 class="fw-bold text-dark mb-1">Special Courses &amp; Expert Discourse</h6>
                    <p class="mb-0 small text-muted lh-base">
                      Conduct of any special courses, chairing/participation in organised activities, delivery expert advice/discourse for a fee to any outside organisation/individual.
                    </p>
                  </div>
                </div>

                <div class="cs-feature-row d-flex align-items-start gap-3">
                  <span class="cs-tag-badge">F</span>
                  <div>
                    <h6 class="fw-bold text-dark mb-1">IP Royalty &amp; Licensing</h6>
                    <p class="mb-0 small text-muted lh-base">
                      Any royalty of fees received for any Intellectual Property by a staff and any fees received from outside.
                    </p>
                  </div>
                </div>
              </div>

              <!-- TAB 3: PROCESS & REVENUE SHARING -->
              <div class="tab-pane fade" id="tab-process" role="tabpanel" aria-labelledby="process-tab">
                
                <div class="cs-feature-row mb-3">
                  <div class="d-flex align-items-center gap-2 mb-2">
                    <i class="fa-solid fa-sitemap text-warning fs-5"></i>
                    <h6 class="fw-bold text-dark mb-0">Consultancy Process &amp; Nodal Agency</h6>
                  </div>
                  <p class="mb-2 small text-dark lh-base">
                    Research &amp; Development Department (RDD) in the university will be the nodal agency for any consultancy activity in the university RDD. It will be the custodian of all documents for consultancy. Any staff, department or faculty may initiate the ground work and explore such possibilities. After the basic ground work it should be reported to RDD who will put it on their record. RDD will do the initial survey/preliminary inquiry and put up the matter to the DIRECTOR, who may form a team for further discussion with the client or he may himself discuss it with the client.
                  </p>
                  <p class="mb-2 small text-dark lh-base">
                    After the negotiation and on arrival on agreement an Agreement Form will be initiated as per the format of the RDD. The format gives just the guidelines. It may be changed at the discretion of the DIRECTOR. It will be signed by the client and Registrar on behalf of the university. The payment received for consultancy will be deposited by the client/RDD in university bank account as per terms of the agreement.
                  </p>
                  <p class="mb-0 small text-dark lh-base">
                    In case of faculty and/or university staff going for chairing an expert session, expert discourse on behalf of the university agreement form will not be raised. Money received from such consultancy event will be deposited in the university Account Section.
                  </p>
                </div>

                <!-- 60:40 Ratio Callout -->
                <div class="cs-ratio-callout mb-3">
                  <div class="d-flex align-items-center gap-2 mb-2">
                    <i class="fa-solid fa-coins text-warning fs-5"></i>
                    <h6 class="fw-bold text-dark mb-0">Sharing Policy (60:40 Ratio)</h6>
                  </div>
                  <p class="mb-0 small text-dark lh-base">
                    The net gain as worked out (Money Received from the client minus all incidental charges incurred for the consultation work) will be divided in ratio of <strong>60:40</strong> i.e. <strong>60% of the gain will be paid to the faculty/staff</strong> who worked for the project and <strong>40% will be retained by the university</strong>. University will plough back the share received by it in developing facilities to improve consultancy infrastructure.
                  </p>
                </div>

                <div class="row g-3">
                  <div class="col-md-4">
                    <div class="cs-feature-row h-100">
                      <h6 class="fw-bold text-dark mb-1">Contingency Expenses</h6>
                      <p class="mb-0 extra-small text-muted lh-base">
                        Any contingency expenses incurred in respect of consultancy project will be met from project funds.
                      </p>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="cs-feature-row h-100">
                      <h6 class="fw-bold text-dark mb-1">Appraisal Report Credit</h6>
                      <p class="mb-0 extra-small text-muted lh-base">
                        Entered in staff Appraisal Report with extra weightage in arriving Performance Index.
                      </p>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="cs-feature-row h-100">
                      <h6 class="fw-bold text-dark mb-1">Closing Report Requirement</h6>
                      <p class="mb-0 extra-small text-muted lh-base">
                        Detailed written report submitted to Director R&amp;D post completion with results and feedback.
                      </p>
                    </div>
                  </div>
                </div>

              </div>

              <!-- TAB 4: OBJECTIVES & PARTNERS -->
              <div class="tab-pane fade" id="tab-objectives" role="tabpanel" aria-labelledby="objectives-tab">
                
                <h6 class="fw-bold text-dark mb-3"><i class="fa-solid fa-bullseye text-warning me-2"></i>Objectives of Consultancy Services</h6>

                <div class="d-flex flex-column gap-2 mb-4">
                  <div class="cs-feature-row d-flex align-items-start gap-3 mb-0">
                    <div class="rounded-circle bg-warning bg-opacity-10 text-warning d-flex align-items-center justify-content-center flex-shrink-0 mt-0.5" style="width: 32px; height: 32px; border: 1px solid #fde68a;">
                      <i class="fa-solid fa-check fs-6 fw-bold"></i>
                    </div>
                    <p class="mb-0 text-dark small lh-base" style="font-size: 0.92rem;">
                      To effectively utilize the University’s academic facilities, physical infrastructure including the engineering and scientific infrastructure, the available expertise to enter into an arrangement / interaction with the industry, other institutions or the bodies as the University may deem fit, in a manner consistent with the primary mission of teaching, research and public service;
                    </p>
                  </div>

                  <div class="cs-feature-row d-flex align-items-start gap-3 mb-0">
                    <div class="rounded-circle bg-warning bg-opacity-10 text-warning d-flex align-items-center justify-content-center flex-shrink-0 mt-0.5" style="width: 32px; height: 32px; border: 1px solid #fde68a;">
                      <i class="fa-solid fa-check fs-6 fw-bold"></i>
                    </div>
                    <p class="mb-0 text-dark small lh-base" style="font-size: 0.92rem;">
                      To enrich the experience and knowledge of the Professionals in the knowledge sphere and provide an opportunity of finding solutions to the problems of industries / enterprises.
                    </p>
                  </div>

                  <div class="cs-feature-row d-flex align-items-start gap-3 mb-0">
                    <div class="rounded-circle bg-warning bg-opacity-10 text-warning d-flex align-items-center justify-content-center flex-shrink-0 mt-0.5" style="width: 32px; height: 32px; border: 1px solid #fde68a;">
                      <i class="fa-solid fa-check fs-6 fw-bold"></i>
                    </div>
                    <p class="mb-0 text-dark small lh-base" style="font-size: 0.92rem;">
                      To provide opportunities to the Professionals to apply their knowledge and skill in real work situations.
                    </p>
                  </div>

                  <div class="cs-feature-row d-flex align-items-start gap-3 mb-0">
                    <div class="rounded-circle bg-warning bg-opacity-10 text-warning d-flex align-items-center justify-content-center flex-shrink-0 mt-0.5" style="width: 32px; height: 32px; border: 1px solid #fde68a;">
                      <i class="fa-solid fa-check fs-6 fw-bold"></i>
                    </div>
                    <p class="mb-0 text-dark small lh-base" style="font-size: 0.92rem;">
                      To supplement the University’s financial resources to the possible extent.
                    </p>
                  </div>
                </div>

                <h6 class="fw-bold text-dark mb-3"><i class="fa-solid fa-handshake text-warning me-2"></i>Agencies / Organisations Involved in Consultancy Services</h6>
                <p class="small text-muted mb-3">Key external firms and healthcare/industrial partners collaborating with SSSUTMS:</p>

                <div class="d-flex flex-wrap gap-2.5">
                  <span class="cs-partner-badge"><i class="fa-solid fa-hospital-user text-warning"></i> Total Diagnosis Pvt. Ltd.</span>
                  <span class="cs-partner-badge"><i class="fa-solid fa-photo-film text-warning"></i> Shruti media Services</span>
                  <span class="cs-partner-badge"><i class="fa-solid fa-compass-drafting text-warning"></i> Siddhart Kapoor Infrastructure Pvt. Ltd.</span>
                  <span class="cs-partner-badge"><i class="fa-solid fa-hashtag text-warning"></i> Double Tick Media Pvt. Ltd.</span>
                  <span class="cs-partner-badge"><i class="fa-solid fa-vial-circle-check text-warning"></i> New Life Laboratories Pvt. Ltd.</span>
                  <span class="cs-partner-badge"><i class="fa-solid fa-capsules text-warning"></i> Aran Pharmaceuticals</span>
                  <span class="cs-partner-badge"><i class="fa-solid fa-shirt text-warning"></i> Sunrise Textiles, Mandideep, Raisen</span>
                  <span class="cs-partner-badge"><i class="fa-solid fa-scale-balanced text-warning"></i> LUNIA Law Associate, Bhopal</span>
                  <span class="cs-partner-badge"><i class="fa-solid fa-square-h text-warning"></i> Noble Hospital, Bhopal</span>
                  <span class="cs-partner-badge"><i class="fa-solid fa-hospital text-warning"></i> Ganga Hospital, Bhopal</span>
                  <span class="cs-partner-badge"><i class="fa-solid fa-user-gear text-warning"></i> Konark Consultancy, Bhopal</span>
                </div>

              </div>

            </div><!-- end tab-content -->

          </div>
        </div><!-- end cs-main-wrapper -->
      </div><!-- end col-lg-8 -->

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>