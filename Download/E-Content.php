<?php
$page_title = 'E-Content & Digital Learning Repository - SSSUTMS';
$banner_title = 'E-Content & Learning Resources';
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
          
          <!-- Header Banner -->
          <div class="d-flex flex-wrap justify-content-between align-items-center pb-3 mb-4 border-bottom">
            <div>
              <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-2 rounded-pill fw-semibold mb-2">
                <i class="fa fa-book-bookmark me-1"></i> Digital Learning Hub
              </span>
              <h3 class="fw-bold text-navy mb-1" style="color: #0b2545;">SSSUTMS e-Knowledge &amp; E-Learning Portal</h3>
              <p class="text-muted small mb-0">University publications, periodicals, faculty lecture series, and digital courseware.</p>
            </div>
            <div class="mt-2 mt-md-0">
              <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded-pill">
                <i class="fa fa-circle-check me-1"></i> Open Academic Access
              </span>
            </div>
          </div>

          <!-- Nav Tabs for E-Content Sections -->
          <ul class="nav nav-pills nav-fill mb-4 p-1 style="background-color: #f8fafc;" rounded-pill border p-1" id="eContentTabs" style="background: #f1f5f9;" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active fw-bold py-2 rounded-pill" style="background: linear-gradient(135deg, #0b2545 0%, #134074 100%) !important; color: #ffffff !important;" id="periodicals-tab" data-bs-toggle="pill" data-bs-target="#periodicals" type="button" role="tab">
                <i class="fa fa-newspaper me-1"></i> e-Knowledge Periodicals
              </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link fw-bold py-2 rounded-pill text-dark" id="studymaterial-tab" data-bs-toggle="pill" data-bs-target="#studymaterial" type="button" role="tab">
                <i class="fa fa-book-open me-1"></i> Online Study Modules
              </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link fw-bold py-2 rounded-pill text-dark" id="videolectures-tab" data-bs-toggle="pill" data-bs-target="#videolectures" type="button" role="tab">
                <i class="fa fa-video me-1"></i> Video Lectures
              </button>
            </li>
          </ul>

          <div class="tab-content" id="eContentTabsContent">
            
            <!-- Tab 1: Periodicals & Newsletters -->
            <div class="tab-pane fade show active" id="periodicals" role="tabpanel">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="fw-bold text-dark mb-0"><i class="fa fa-scroll text-primary me-2"></i>University e-Knowledge Bulletins</h5>
                <small class="text-muted">Bi-monthly scholarly editions</small>
              </div>

              <div class="row g-3">
                
                <div class="col-md-6">
                  <div class="card border rounded-3 p-3 h-100 hover-shadow transition">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                      <span class="badge bg-primary text-white">Vol. 6 Issue 2</span>
                      <small class="text-muted">16 - 30 Nov 2023</small>
                    </div>
                    <h6 class="fw-bold text-dark mb-1">SSSUTMS e-Knowledge Bulletin</h6>
                    <p class="small text-secondary mb-3">Academic developments, technical papers, and university institutional highlights.</p>
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/e-knowldege/SSSUTMS Vol 6 Issue 2 16 to 30 November 2023.pdf" target="_blank" class="btn btn-sm text-white rounded-pill mt-auto text-nowrap" style="background: linear-gradient(135deg, #f3752c 0%, #e0580a 100%); font-weight: 600; font-size: 0.82rem; box-shadow: 0 2px 6px rgba(243, 117, 44, 0.28); border: none;">
                      <i class="fa fa-file-pdf me-1"></i> Read Bulletin (PDF)
                    </a>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="card border rounded-3 p-3 h-100 hover-shadow transition">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                      <span class="badge bg-primary text-white">Vol. 6 Issue 1</span>
                      <small class="text-muted">01 - 15 Nov 2023</small>
                    </div>
                    <h6 class="fw-bold text-dark mb-1">SSSUTMS e-Knowledge Bulletin</h6>
                    <p class="small text-secondary mb-3">Research publications, doctoral seminars, and educational initiatives.</p>
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/e-knowldege/SSSUTMS Vol 6 Issue 1 01 to 15 November 2023.pdf" target="_blank" class="btn btn-sm text-white rounded-pill mt-auto text-nowrap" style="background: linear-gradient(135deg, #f3752c 0%, #e0580a 100%); font-weight: 600; font-size: 0.82rem; box-shadow: 0 2px 6px rgba(243, 117, 44, 0.28); border: none;">
                      <i class="fa fa-file-pdf me-1"></i> Read Bulletin (PDF)
                    </a>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="card border rounded-3 p-3 h-100 hover-shadow transition">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                      <span class="badge bg-secondary text-white">Vol. 5 Issue 2</span>
                      <small class="text-muted">16 - 31 Oct 2023</small>
                    </div>
                    <h6 class="fw-bold text-dark mb-1">SSSUTMS e-Knowledge Bulletin</h6>
                    <p class="small text-secondary mb-3">Special coverage on innovations, industry collaborations, and faculty development.</p>
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/e-knowldege/elarning_opt.pdf" target="_blank" class="btn btn-sm text-white rounded-pill mt-auto text-nowrap" style="background: linear-gradient(135deg, #f3752c 0%, #e0580a 100%); font-weight: 600; font-size: 0.82rem; box-shadow: 0 2px 6px rgba(243, 117, 44, 0.28); border: none;">
                      <i class="fa fa-file-pdf me-1"></i> Read Bulletin (PDF)
                    </a>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="card border rounded-3 p-3 h-100 hover-shadow transition">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                      <span class="badge bg-secondary text-white">Vol. 5 Issue 1</span>
                      <small class="text-muted">01 - 15 Oct 2023</small>
                    </div>
                    <h6 class="fw-bold text-dark mb-1">SSSUTMS e-Knowledge Bulletin</h6>
                    <p class="small text-secondary mb-3">Highlights on pharmacy, engineering innovations, and student achievements.</p>
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/e-knowledge/SSSUTMS Vol 5 Issue 1 01 to 15 October 2023.pdf" target="_blank" class="btn btn-sm text-white rounded-pill mt-auto text-nowrap" style="background: linear-gradient(135deg, #f3752c 0%, #e0580a 100%); font-weight: 600; font-size: 0.82rem; box-shadow: 0 2px 6px rgba(243, 117, 44, 0.28); border: none;">
                      <i class="fa fa-file-pdf me-1"></i> Read Bulletin (PDF)
                    </a>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="card border rounded-3 p-3 h-100 hover-shadow transition">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                      <span class="badge bg-secondary text-white">Vol. 4 Issue 2</span>
                      <small class="text-muted">16 - 30 Sep 2023</small>
                    </div>
                    <h6 class="fw-bold text-dark mb-1">SSSUTMS e-Knowledge Bulletin</h6>
                    <p class="small text-secondary mb-3">Campus community updates, national webinars, and academic workshops.</p>
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/e-knowldege/SSSUTMS Vol 4 Issue 2 16 to 30 Sep 2023.pdf" target="_blank" class="btn btn-sm text-white rounded-pill mt-auto text-nowrap" style="background: linear-gradient(135deg, #f3752c 0%, #e0580a 100%); font-weight: 600; font-size: 0.82rem; box-shadow: 0 2px 6px rgba(243, 117, 44, 0.28); border: none;">
                      <i class="fa fa-file-pdf me-1"></i> Read Bulletin (PDF)
                    </a>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="card border rounded-3 p-3 h-100 hover-shadow transition">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                      <span class="badge bg-secondary text-white">Vol. 4 Issue 1</span>
                      <small class="text-muted">01 - 15 Sep 2023</small>
                    </div>
                    <h6 class="fw-bold text-dark mb-1">SSSUTMS e-Knowledge Bulletin</h6>
                    <p class="small text-secondary mb-3">Teachers' day special symposiums and university academic councils.</p>
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/e-knowldege/SSSUTMS Vol 4 Issue 1 01 to 15 September 2023.pdf" target="_blank" class="btn btn-sm text-white rounded-pill mt-auto text-nowrap" style="background: linear-gradient(135deg, #f3752c 0%, #e0580a 100%); font-weight: 600; font-size: 0.82rem; box-shadow: 0 2px 6px rgba(243, 117, 44, 0.28); border: none;">
                      <i class="fa fa-file-pdf me-1"></i> Read Bulletin (PDF)
                    </a>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="card border rounded-3 p-3 h-100 hover-shadow transition">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                      <span class="badge style="background-color: #f8fafc;" text-dark border">Vol. 3 Issue 2</span>
                      <small class="text-muted">16 - 31 Aug 2023</small>
                    </div>
                    <h6 class="fw-bold text-dark mb-1">SSSUTMS e-Knowledge Bulletin</h6>
                    <p class="small text-secondary mb-3">Independence day celebrations and sports tournaments overview.</p>
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/e-knowldege/SSSUTMS Vol 3 Issue 2 01 to 15 August 2023.pdf" target="_blank" class="btn btn-sm text-white rounded-pill mt-auto text-nowrap" style="background: linear-gradient(135deg, #f3752c 0%, #e0580a 100%); font-weight: 600; font-size: 0.82rem; box-shadow: 0 2px 6px rgba(243, 117, 44, 0.28); border: none;">
                      <i class="fa fa-file-pdf me-1"></i> Read Bulletin (PDF)
                    </a>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="card border rounded-3 p-3 h-100 hover-shadow transition">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                      <span class="badge style="background-color: #f8fafc;" text-dark border">Vol. 3 Issue 1</span>
                      <small class="text-muted">01 - 15 Aug 2023</small>
                    </div>
                    <h6 class="fw-bold text-dark mb-1">SSSUTMS e-Knowledge Bulletin</h6>
                    <p class="small text-secondary mb-3">New academic session orientation and pedagogical guidelines.</p>
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/e-knowldege/SSSUTMS Vol 3 Issue 1 01 to 15 August 2023.pdf" target="_blank" class="btn btn-sm text-white rounded-pill mt-auto text-nowrap" style="background: linear-gradient(135deg, #f3752c 0%, #e0580a 100%); font-weight: 600; font-size: 0.82rem; box-shadow: 0 2px 6px rgba(243, 117, 44, 0.28); border: none;">
                      <i class="fa fa-file-pdf me-1"></i> Read Bulletin (PDF)
                    </a>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="card border rounded-3 p-3 h-100 hover-shadow transition">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                      <span class="badge style="background-color: #f8fafc;" text-dark border">Vol. 2 Issue 2</span>
                      <small class="text-muted">16 - 31 Jul 2023</small>
                    </div>
                    <h6 class="fw-bold text-dark mb-1">SSSUTMS e-Knowledge Bulletin</h6>
                    <p class="small text-secondary mb-3">Campus recruitment and internship placement drives summary.</p>
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/e-knowldege/SSSUTMS Vol 2 Issue 2 16 to 31 July 2023.pdf" target="_blank" class="btn btn-sm text-white rounded-pill mt-auto text-nowrap" style="background: linear-gradient(135deg, #f3752c 0%, #e0580a 100%); font-weight: 600; font-size: 0.82rem; box-shadow: 0 2px 6px rgba(243, 117, 44, 0.28); border: none;">
                      <i class="fa fa-file-pdf me-1"></i> Read Bulletin (PDF)
                    </a>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="card border rounded-3 p-3 h-100 hover-shadow transition">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                      <span class="badge style="background-color: #f8fafc;" text-dark border">Vol. 2 Issue 1</span>
                      <small class="text-muted">01 - 15 Jul 2023</small>
                    </div>
                    <h6 class="fw-bold text-dark mb-1">SSSUTMS e-Knowledge Bulletin</h6>
                    <p class="small text-secondary mb-3">Inaugural academic research editions and university milestone reports.</p>
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/e-knowldege/SSSUTMS Vol 2 Issue 1 01 to 15 July 2023.pdf" target="_blank" class="btn btn-sm text-white rounded-pill mt-auto text-nowrap" style="background: linear-gradient(135deg, #f3752c 0%, #e0580a 100%); font-weight: 600; font-size: 0.82rem; box-shadow: 0 2px 6px rgba(243, 117, 44, 0.28); border: none;">
                      <i class="fa fa-file-pdf me-1"></i> Read Bulletin (PDF)
                    </a>
                  </div>
                </div>

              </div>
            </div>

            <!-- Tab 2: Online Study Material & Research Modules -->
            <div class="tab-pane fade" id="studymaterial" role="tabpanel">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="fw-bold text-dark mb-0"><i class="fa fa-graduation-cap text-primary me-2"></i>Curriculum E-Books &amp; Research Modules</h5>
                <small class="text-muted">Faculty curated e-learning content</small>
              </div>

              <div class="table-responsive rounded-3 border">
                <table class="table table-hover align-middle mb-0">
                  <thead style="background: linear-gradient(135deg, #0b2545 0%, #0d47a1 100%); color: #fff;">
                    <tr>
                      <th style="width: 60px;" class="text-center">#</th>
                      <th>Topic / Course Module</th>
                      <th>Subject / Discipline</th>
                      <th class="text-center" style="width: 170px;">Resource Link</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="text-center fw-bold text-muted">1</td>
                      <td class="fw-semibold text-dark">Research Methodology &amp; Theoretical Concepts</td>
                      <td><span class="badge bg-primary-subtle text-primary border">Research Studies</span></td>
                      <td class="text-center">
                        <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/e content/definitionandtypesofresearch-100801181630-phpapp02.pdf" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-3 py-1">
                          <i class="fa fa-file-pdf me-1"></i> View Module
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center fw-bold text-muted">2</td>
                      <td class="fw-semibold text-dark">Research Report Writing &amp; Thesis Formulation</td>
                      <td><span class="badge bg-primary-subtle text-primary border">Research Studies</span></td>
                      <td class="text-center">
                        <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/e content/research Report.pdf" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-3 py-1">
                          <i class="fa fa-file-pdf me-1"></i> View Module
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center fw-bold text-muted">3</td>
                      <td class="fw-semibold text-dark">Survey Research Design &amp; Methodology</td>
                      <td><span class="badge bg-primary-subtle text-primary border">Research Studies</span></td>
                      <td class="text-center">
                        <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/e content/SURVEY.pdf" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-3 py-1">
                          <i class="fa fa-file-pdf me-1"></i> View Module
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center fw-bold text-muted">4</td>
                      <td class="fw-semibold text-dark">Anatomy and Physiology Course Guide</td>
                      <td><span class="badge bg-success-subtle text-success border">Medical / Paramedical</span></td>
                      <td class="text-center">
                        <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/EContent/ANATOMY_PHYSIOLOGY.pdf" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-3 py-1">
                          <i class="fa fa-file-pdf me-1"></i> View E-Book
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center fw-bold text-muted">5</td>
                      <td class="fw-semibold text-dark">Foundation of Physical Education</td>
                      <td><span class="badge bg-info-subtle text-info border">Physical Education</span></td>
                      <td class="text-center">
                        <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/EContent/Foundation_physical_edcation.pdf" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-3 py-1">
                          <i class="fa fa-file-pdf me-1"></i> View E-Book
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center fw-bold text-muted">6</td>
                      <td class="fw-semibold text-dark">Complete Guide to Sports Training</td>
                      <td><span class="badge bg-info-subtle text-info border">Sports Science</span></td>
                      <td class="text-center">
                        <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/EContent/Complete Guide to Sports Training.pdf" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-3 py-1">
                          <i class="fa fa-file-pdf me-1"></i> View E-Book
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center fw-bold text-muted">7</td>
                      <td class="fw-semibold text-dark">Reinforced Cement Concrete (RCC) Design</td>
                      <td><span class="badge bg-warning-subtle text-dark border">Civil Engineering</span></td>
                      <td class="text-center">
                        <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/EContent/RCC.pdf" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-3 py-1">
                          <i class="fa fa-file-pdf me-1"></i> View E-Book
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center fw-bold text-muted">8</td>
                      <td class="fw-semibold text-dark">Hypothesis Testing &amp; Statistical Inferences (PPT)</td>
                      <td><span class="badge bg-secondary-subtle text-dark border">Statistics</span></td>
                      <td class="text-center">
                        <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/e content/Hypotheses PPT.pdf" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-3 py-1">
                          <i class="fa fa-file-pdf me-1"></i> View Slides
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center fw-bold text-muted">9</td>
                      <td class="fw-semibold text-dark">Sampling Methodology in Social &amp; Pure Sciences</td>
                      <td><span class="badge bg-primary-subtle text-primary border">Research Studies</span></td>
                      <td class="text-center">
                        <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/e content/SAMPLING.pdf" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-3 py-1">
                          <i class="fa fa-file-pdf me-1"></i> View Module
                        </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <!-- Tab 3: Video Lecture Repository -->
            <div class="tab-pane fade" id="videolectures" role="tabpanel">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="fw-bold text-dark mb-0"><i class="fa fa-circle-play text-danger me-2"></i>Recorded Faculty Masterclasses</h5>
                <small class="text-muted">High definition educational lectures</small>
              </div>

              <div class="row g-4">
                <div class="col-md-6">
                  <div class="card border rounded-4 overflow-hidden h-100 shadow-sm">
                    <div class="bg-dark text-white p-4 text-center d-flex flex-column align-items-center justify-content-center" style="min-height: 180px; background: linear-gradient(135deg, #1a2a6c, #b21f1f, #fdbb2d);">
                      <i class="fa fa-circle-play fa-4x text-white mb-2 opacity-75"></i>
                      <h5 class="fw-bold text-white mb-0">Special Lecture Series</h5>
                      <span class="badge bg-warning text-dark mt-2">Dr. Prabhakar Sharma</span>
                    </div>
                    <div class="card-body p-3">
                      <h6 class="fw-bold text-dark mb-1">Advanced Academic Discourse Series - Part I</h6>
                      <p class="small text-secondary mb-3">Comprehensive multimedia lecture on core pedagogical concepts and engineering methodologies.</p>
                      <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/EContent/Prabhakar-FINAL.mp4" target="_blank" class="btn btn-sm btn-primary rounded-pill w-100">
                        <i class="fa fa-play me-1"></i> Stream / Download Video Lecture
                      </a>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="card border rounded-4 overflow-hidden h-100 shadow-sm">
                    <div class="bg-dark text-white p-4 text-center d-flex flex-column align-items-center justify-content-center" style="min-height: 180px; background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);">
                      <i class="fa fa-circle-play fa-4x text-white mb-2 opacity-75"></i>
                      <h5 class="fw-bold text-white mb-0">Masterclass Series</h5>
                      <span class="badge bg-warning text-dark mt-2">Dr. Brijesh Kumar</span>
                    </div>
                    <div class="card-body p-3">
                      <h6 class="fw-bold text-dark mb-1">Advanced Academic Discourse Series - Part II</h6>
                      <p class="small text-secondary mb-3">In-depth technical lecture delivered for undergraduate and postgraduate university scholars.</p>
                      <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/EContent/Brijesh-FINAL.mp4" target="_blank" class="btn btn-sm btn-primary rounded-pill w-100">
                        <i class="fa fa-play me-1"></i> Stream / Download Video Lecture
                      </a>
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