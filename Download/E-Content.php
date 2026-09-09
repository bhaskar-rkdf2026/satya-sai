<?php
$page_title = 'E-Content & Digital Learning - SSSUTMS';
$banner_title = 'E-Content & Digital Learning';
$banner_category = 'Download';

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
.syl-table {
  width: 100%;
  margin-bottom: 0;
  vertical-align: middle;
  border-collapse: separate;
  border-spacing: 0;
}
.syl-table th {
  background: #f1f5f9;
  color: #0f172a;
  font-weight: 700;
  font-size: 0.88rem;
  text-transform: uppercase;
  letter-spacing: 0.05em;
  padding: 12px 16px;
  border-top: none;
  border-bottom: 2px solid #cbd5e1;
}
.syl-table td {
  padding: 12px 16px;
  border-bottom: 1px solid #e2e8f0;
  color: #334155;
  font-size: 0.95rem;
  vertical-align: middle;
}
.syl-table tbody tr:hover {
  background-color: #f8fafc;
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
.department-heading {
  background: #f8fafc;
  border-left: 4px solid #0b2545;
  padding: 10px 16px;
  margin-top: 2rem;
  margin-bottom: 1rem;
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
.video-card {
  background: #f8fafc;
  border-radius: 12px;
  border: 1px solid #e2e8f0;
  overflow: hidden;
  height: 100%;
  display: flex;
  flex-direction: column;
}
.video-wrapper video {
  width: 100%;
  display: block;
  max-height: 220px;
  object-fit: cover;
  background: #000;
}
</style>

<section class="subpage-main-section py-4 bg-light">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        
        <!-- Live Search Filter -->
        <div class="row g-3 align-items-center mb-4 p-3 bg-white rounded-3 border shadow-sm">
          <div class="col-md-7">
            <div class="input-group">
              <span class="input-group-text bg-light border-end-0"><i class="fa fa-search text-muted"></i></span>
              <input type="text" id="tableSearchInput" class="form-control border-start-0" placeholder="Search e-content, journals, topics, subjects..." onkeyup="filterContent()">
              <button class="btn btn-outline-secondary" type="button" onclick="clearSearch()" title="Clear search"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="col-md-5 text-md-end text-muted small">
            <span id="resultsCount">Showing all e-resources</span>
          </div>
        </div>

        <!-- 1. SSSUTMS e-Knowledge -->
        <div class="syl-card content-section" id="section-journals">
          <div class="syl-card-header">
            <h2 class="syl-card-title">
              <i class="fa fa-book-open text-warning"></i>
              SSSUTMS e-Knowledge Journals &amp; Bulletins
            </h2>
          </div>
          <div class="syl-card-body">
            <div class="table-responsive rounded-3 border">
              <table class="syl-table content-table">
                <thead>
                  <tr>
                    <th style="width: 70px;" class="text-center">S.No.</th>
                    <th>e-Knowledge Volume / Issue</th>
                    <th style="width: 180px;" class="text-center">Download Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-center fw-bold text-secondary">01</td>
                    <td class="fw-bold text-dark">
                      Vol 6 Issue 2 (16 to 30 November 2023)
                      <span class="badge bg-danger ms-2 text-uppercase" style="font-size: 10px;">New</span>
                    </td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/e-knowldege/SSSUTMS Vol 6 Issue 2 16 to 30 November 2023.pdf" target="_blank" rel="noopener" class="syl-btn">
                        <i class="fa fa-file-pdf"></i> Download PDF
                      </a>
                    </td>
                  </tr>

                  <tr>
                    <td class="text-center fw-bold text-secondary">02</td>
                    <td class="fw-bold text-dark">Vol 6 Issue 1 (01 to 15 November 2023)</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/e-knowldege/SSSUTMS Vol 6 Issue 1 01 to 15 November 2023.pdf" target="_blank" rel="noopener" class="syl-btn">
                        <i class="fa fa-file-pdf"></i> Download PDF
                      </a>
                    </td>
                  </tr>

                  <tr>
                    <td class="text-center fw-bold text-secondary">03</td>
                    <td class="fw-bold text-dark">SSSUTMS E-Learning Resource Bulletin</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/e-knowldege/elarning_opt.pdf" target="_blank" rel="noopener" class="syl-btn">
                        <i class="fa fa-file-pdf"></i> Download PDF
                      </a>
                    </td>
                  </tr>

                  <tr>
                    <td class="text-center fw-bold text-secondary">04</td>
                    <td class="fw-bold text-dark">Vol 5 Issue 1 (01 to 15 October 2023)</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/e-knowledge/SSSUTMS Vol 5 Issue 1 01 to 15 October 2023.pdf" target="_blank" rel="noopener" class="syl-btn">
                        <i class="fa fa-file-pdf"></i> Download PDF
                      </a>
                    </td>
                  </tr>

                  <tr>
                    <td class="text-center fw-bold text-secondary">05</td>
                    <td class="fw-bold text-dark">Vol 4 Issue 2 (16 to 30 September 2023)</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/e-knowldege/SSSUTMS Vol 4 Issue 2 16 to 30 Sep 2023.pdf" target="_blank" rel="noopener" class="syl-btn">
                        <i class="fa fa-file-pdf"></i> Download PDF
                      </a>
                    </td>
                  </tr>

                  <tr>
                    <td class="text-center fw-bold text-secondary">06</td>
                    <td class="fw-bold text-dark">Vol 4 Issue 1 (01 to 15 September 2023)</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/e-knowldege/SSSUTMS Vol 4 Issue 1 01 to 15 September 2023.pdf" target="_blank" rel="noopener" class="syl-btn">
                        <i class="fa fa-file-pdf"></i> Download PDF
                      </a>
                    </td>
                  </tr>

                  <tr>
                    <td class="text-center fw-bold text-secondary">07</td>
                    <td class="fw-bold text-dark">Vol 3 Issue 2 (16 to 31 August 2023)</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/e-knowldege/SSSUTMS Vol 3 Issue 2 01 to 15 August 2023.pdf" target="_blank" rel="noopener" class="syl-btn">
                        <i class="fa fa-file-pdf"></i> Download PDF
                      </a>
                    </td>
                  </tr>

                  <tr>
                    <td class="text-center fw-bold text-secondary">08</td>
                    <td class="fw-bold text-dark">Vol 3 Issue 1 (01 to 15 August 2023)</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/e-knowldege/SSSUTMS Vol 3 Issue 1 01 to 15 August 2023.pdf" target="_blank" rel="noopener" class="syl-btn">
                        <i class="fa fa-file-pdf"></i> Download PDF
                      </a>
                    </td>
                  </tr>

                  <tr>
                    <td class="text-center fw-bold text-secondary">09</td>
                    <td class="fw-bold text-dark">Vol 2 Issue 2 (16 to 31 July 2023)</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/e-knowldege/SSSUTMS Vol 2 Issue 2 16 to 31 July 2023.pdf" target="_blank" rel="noopener" class="syl-btn">
                        <i class="fa fa-file-pdf"></i> Download PDF
                      </a>
                    </td>
                  </tr>

                  <tr>
                    <td class="text-center fw-bold text-secondary">10</td>
                    <td class="fw-bold text-dark">Vol 2 Issue 1 (01 to 15 July 2023)</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/e-knowldege/SSSUTMS Vol 2 Issue 1 01 to 15 July 2023.pdf" target="_blank" rel="noopener" class="syl-btn">
                        <i class="fa fa-file-pdf"></i> Download PDF
                      </a>
                    </td>
                  </tr>

                  <tr>
                    <td class="text-center fw-bold text-secondary">11</td>
                    <td class="fw-bold text-dark">Vol 1 Issue 2 (16 to 30 June 2023)</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/e-knowldege/SSSUTMS Vol 1 Issue 2 16 to 30 June 2023.pdf" target="_blank" rel="noopener" class="syl-btn">
                        <i class="fa fa-file-pdf"></i> Download PDF
                      </a>
                    </td>
                  </tr>

                  <tr>
                    <td class="text-center fw-bold text-secondary">12</td>
                    <td class="fw-bold text-dark">Vol 1 Issue 1 (01 to 15 June 2023)</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/e-knowldege/SSSUTMS (1).pdf" target="_blank" rel="noopener" class="syl-btn">
                        <i class="fa fa-file-pdf"></i> Download PDF
                      </a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <!-- 2. Academic Lecture Notes & Research Materials -->
        <div class="syl-card content-section" id="section-notes">
          <div class="syl-card-header">
            <h2 class="syl-card-title">
              <i class="fa fa-graduation-cap text-warning"></i>
              Departmental E-Content &amp; Study Material
            </h2>
          </div>
          <div class="syl-card-body">
            
            <!-- Research & General Notes -->
            <div class="department-heading">
              <i class="fa fa-flask"></i> Research Methodology, Preamble &amp; Academic Papers
            </div>
            <div class="table-responsive rounded-3 border mb-4">
              <table class="syl-table content-table">
                <thead>
                  <tr>
                    <th style="width: 70px;" class="text-center">S.No.</th>
                    <th>Topic / Paper Title</th>
                    <th style="width: 180px;" class="text-center">Download Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-center fw-bold text-secondary">01</td>
                    <td class="fw-bold text-dark">Constitution Preamble &amp; Values</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/Download/Preamble 2.pdf" target="_blank" rel="noopener" class="syl-btn">
                        <i class="fa fa-file-pdf"></i> Download PDF
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center fw-bold text-secondary">02</td>
                    <td class="fw-bold text-dark">Definition and Types of Research</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/e content/definitionandtypesofresearch-100801181630-phpapp02.pdf" target="_blank" rel="noopener" class="syl-btn">
                        <i class="fa fa-file-pdf"></i> Download PDF
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center fw-bold text-secondary">03</td>
                    <td class="fw-bold text-dark">Research Report Writing &amp; Structure</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/e content/research Report.pdf" target="_blank" rel="noopener" class="syl-btn">
                        <i class="fa fa-file-pdf"></i> Download PDF
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center fw-bold text-secondary">04</td>
                    <td class="fw-bold text-dark">Survey Methodology &amp; Data Collection</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/e content/SURVEY.pdf" target="_blank" rel="noopener" class="syl-btn">
                        <i class="fa fa-file-pdf"></i> Download PDF
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center fw-bold text-secondary">05</td>
                    <td class="fw-bold text-dark">Women Empowerment &amp; Gender Studies</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/e content/Women.pdf" target="_blank" rel="noopener" class="syl-btn">
                        <i class="fa fa-file-pdf"></i> Download PDF
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center fw-bold text-secondary">06</td>
                    <td class="fw-bold text-dark">Hypotheses Formulation &amp; Testing PPT</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/e content/Hypotheses PPT.pdf" target="_blank" rel="noopener" class="syl-btn">
                        <i class="fa fa-file-pdf"></i> Download PDF
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center fw-bold text-secondary">07</td>
                    <td class="fw-bold text-dark">Sources of Invalidity in Research Design</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/e content/SOURCES_OF_INVALIDITY12.pdf" target="_blank" rel="noopener" class="syl-btn">
                        <i class="fa fa-file-pdf"></i> Download PDF
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center fw-bold text-secondary">08</td>
                    <td class="fw-bold text-dark">Sampling Techniques &amp; Probability</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/e content/SAMPLING.pdf" target="_blank" rel="noopener" class="syl-btn">
                        <i class="fa fa-file-pdf"></i> Download PDF
                      </a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>

            <!-- Physical Education -->
            <div class="department-heading">
              <i class="fa fa-heart-pulse"></i> Physical Education &amp; Sports Sciences
            </div>
            <div class="table-responsive rounded-3 border mb-4">
              <table class="syl-table content-table">
                <thead>
                  <tr>
                    <th style="width: 70px;" class="text-center">S.No.</th>
                    <th>Course / Subject Title</th>
                    <th style="width: 180px;" class="text-center">Download Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-center fw-bold text-secondary">01</td>
                    <td class="fw-bold text-dark">Physical Fitness &amp; Wellness</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/e content/3- Physical Fitness.pdf" target="_blank" rel="noopener" class="syl-btn">
                        <i class="fa fa-file-pdf"></i> Download PDF
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center fw-bold text-secondary">02</td>
                    <td class="fw-bold text-dark">Components of Fitness &amp; Tests</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/e content/Components of Fitness %26 Tests TO GO ON.pdf" target="_blank" rel="noopener" class="syl-btn">
                        <i class="fa fa-file-pdf"></i> Download PDF
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center fw-bold text-secondary">03</td>
                    <td class="fw-bold text-dark">Anatomy &amp; Physiology in Physical Education</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/EContent/ANATOMY_PHYSIOLOGY.pdf" target="_blank" rel="noopener" class="syl-btn">
                        <i class="fa fa-file-pdf"></i> Download PDF
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center fw-bold text-secondary">04</td>
                    <td class="fw-bold text-dark">Foundation of Physical Education</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/EContent/Foundation_physical_edcation.pdf" target="_blank" rel="noopener" class="syl-btn">
                        <i class="fa fa-file-pdf"></i> Download PDF
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center fw-bold text-secondary">05</td>
                    <td class="fw-bold text-dark">Complete Guide to Sports Training</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/EContent/Complete Guide to Sports Training.pdf" target="_blank" rel="noopener" class="syl-btn">
                        <i class="fa fa-file-pdf"></i> Download PDF
                      </a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>

            <!-- Engineering & Management -->
            <div class="department-heading">
              <i class="fa fa-laptop-code"></i> Engineering, Architecture &amp; Management Studies
            </div>
            <div class="table-responsive rounded-3 border mb-4">
              <table class="syl-table content-table">
                <thead>
                  <tr>
                    <th style="width: 70px;" class="text-center">S.No.</th>
                    <th>Subject Title</th>
                    <th style="width: 180px;" class="text-center">Download Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-center fw-bold text-secondary">01</td>
                    <td class="fw-bold text-dark">Computer System Architecture</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/EContent/Computer  System Architecture.pdf" target="_blank" rel="noopener" class="syl-btn">
                        <i class="fa fa-file-pdf"></i> Download PDF
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center fw-bold text-secondary">02</td>
                    <td class="fw-bold text-dark">Digital Electronics</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/EContent/Digital electronics.pdf" target="_blank" rel="noopener" class="syl-btn">
                        <i class="fa fa-file-pdf"></i> Download PDF
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center fw-bold text-secondary">03</td>
                    <td class="fw-bold text-dark">Reinforced Cement Concrete (RCC Design)</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/EContent/RCC.pdf" target="_blank" rel="noopener" class="syl-btn">
                        <i class="fa fa-file-pdf"></i> Download PDF
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center fw-bold text-secondary">04</td>
                    <td class="fw-bold text-dark">Building Materials &amp; Construction</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/EContent/Building Material.pdf" target="_blank" rel="noopener" class="syl-btn">
                        <i class="fa fa-file-pdf"></i> Download PDF
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center fw-bold text-secondary">05</td>
                    <td class="fw-bold text-dark">Book - Spiritual Management &amp; Human Values</td>
                    <td class="text-center">
                      <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/EContent/BOOK - SPRITUAL MANAGEMENT.pdf" target="_blank" rel="noopener" class="syl-btn">
                        <i class="fa fa-file-pdf"></i> Download PDF
                      </a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>

          </div>
        </div>

        <!-- 3. Video Lectures -->
        <div class="syl-card content-section" id="section-videos">
          <div class="syl-card-header">
            <h2 class="syl-card-title">
              <i class="fa fa-video text-warning"></i>
              Recorded Video Lectures &amp; Webinars
            </h2>
          </div>
          <div class="syl-card-body">
            <div class="row g-4">
              <div class="col-md-6 video-item">
                <div class="video-card">
                  <div class="video-wrapper">
                    <video controls preload="metadata">
                      <source src="<?php echo BASE_URL; ?>assets/images/Files/Link/EContent/Prabhakar-FINAL.mp4" type="video/mp4">
                      Your browser does not support the video tag.
                    </video>
                  </div>
                  <div class="p-3 d-flex flex-column justify-content-between flex-grow-1">
                    <h6 class="fw-bold text-dark mb-2">Expert Lecture Series: Dr. Prabhakar Sharma</h6>
                    <p class="text-secondary small mb-3">Academic Lecture on Modern Research Trends and Methodologies.</p>
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/EContent/Prabhakar-FINAL.mp4" download class="syl-btn align-self-start">
                      <i class="fa fa-download"></i> Download Video
                    </a>
                  </div>
                </div>
              </div>

              <div class="col-md-6 video-item">
                <div class="video-card">
                  <div class="video-wrapper">
                    <video controls preload="metadata">
                      <source src="<?php echo BASE_URL; ?>assets/images/Files/Link/EContent/Brijesh-FINAL.mp4" type="video/mp4">
                      Your browser does not support the video tag.
                    </video>
                  </div>
                  <div class="p-3 d-flex flex-column justify-content-between flex-grow-1">
                    <h6 class="fw-bold text-dark mb-2">Expert Lecture Series: Dr. Brijesh Kumar</h6>
                    <p class="text-secondary small mb-3">Technical Discussion &amp; Applied Engineering Concepts.</p>
                    <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/EContent/Brijesh-FINAL.mp4" download class="syl-btn align-self-start">
                      <i class="fa fa-download"></i> Download Video
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div id="noResultsMessage" class="alert alert-warning text-center d-none my-4">
          <i class="fa fa-search me-2"></i> No matching e-content found. Please try a different search term.
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
function filterContent() {
  const query = document.getElementById('tableSearchInput').value.toLowerCase().trim();
  const rows = document.querySelectorAll('.content-table tbody tr');
  const videoCards = document.querySelectorAll('.video-item');
  let visibleCount = 0;

  // Filter table rows
  rows.forEach(row => {
    const text = row.innerText.toLowerCase();
    if (text.includes(query)) {
      row.style.display = '';
      visibleCount++;
    } else {
      row.style.display = 'none';
    }
  });

  // Filter video cards
  videoCards.forEach(card => {
    const text = card.innerText.toLowerCase();
    if (text.includes(query)) {
      card.style.display = '';
      visibleCount++;
    } else {
      card.style.display = 'none';
    }
  });

  // Check section visibility
  document.querySelectorAll('.content-section').forEach(sec => {
    const visibleInSec = sec.querySelectorAll('tbody tr:not([style*="display: none"]), .video-item:not([style*="display: none"])').length;
    if (query !== '' && visibleInSec === 0) {
      sec.style.display = 'none';
    } else {
      sec.style.display = '';
    }
  });

  const counter = document.getElementById('resultsCount');
  const noResults = document.getElementById('noResultsMessage');

  if (query === '') {
    counter.textContent = 'Showing all e-resources';
    if (noResults) noResults.classList.add('d-none');
  } else {
    counter.textContent = `Showing ${visibleCount} result${visibleCount === 1 ? '' : 's'}`;
    if (noResults) {
      if (visibleCount === 0) {
        noResults.classList.remove('d-none');
      } else {
        noResults.classList.add('d-none');
      }
    }
  }
}

function clearSearch() {
  const input = document.getElementById('tableSearchInput');
  if (input) {
    input.value = '';
    filterContent();
    input.focus();
  }
}
</script>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>