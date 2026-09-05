<?php
$page_title = 'E-Content - SSSUTMS';
$banner_title = 'E-Content';
$banner_category = 'Download';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';

// 1. SSSUTMS e-Knowledge issues
$eknowledge_items = [
    ['title' => 'Vol 6 Issue 2 (16 to 30 November 2023)', 'file' => 'assets/images/Files/Link/e-knowldege/SSSUTMS Vol 6 Issue 2 16 to 30 November 2023.pdf'],
    ['title' => 'Vol 6 Issue 1 (01 to 15 November 2023)', 'file' => 'assets/images/Files/Link/e-knowldege/SSSUTMS Vol 6 Issue 1 01 to 15 November 2023.pdf'],
    ['title' => 'Vol 5 Issue 2 (16 to 31 October 2023)', 'file' => 'assets/images/Files/Link/e-knowldege/elarning_opt.pdf'],
    ['title' => 'Vol 5 Issue 1 (01 to 15 October 2023)', 'file' => 'assets/images/Files/Link/e-knowledge/SSSUTMS Vol 5 Issue 1 01 to 15 October 2023.pdf'],
    ['title' => 'Vol 4 Issue 2 (16 to 30 Sep 2023)', 'file' => 'assets/images/Files/Link/e-knowldege/SSSUTMS Vol 4 Issue 2 16 to 30 Sep 2023.pdf'],
    ['title' => 'Vol 4 Issue 1 (01 to 15 September 2023)', 'file' => 'assets/images/Files/Link/e-knowldege/SSSUTMS Vol 4 Issue 1 01 to 15 September 2023.pdf'],
    ['title' => 'Vol 3 Issue 2 (16 to 31 August 2023)', 'file' => 'assets/images/Files/Link/e-knowldege/SSSUTMS Vol 3 Issue 2 01 to 15 August 2023.pdf'],
    ['title' => 'Vol 3 Issue 1 (01 to 15 August 2023)', 'file' => 'assets/images/Files/Link/e-knowldege/SSSUTMS Vol 3 Issue 1 01 to 15 August 2023.pdf'],
    ['title' => 'Vol 2 Issue 2 (16 to 31 July 2023)', 'file' => 'assets/images/Files/Link/e-knowldege/SSSUTMS Vol 2 Issue 2 16 to 31 July 2023.pdf'],
    ['title' => 'Vol 02 / Issue 1 (01 to 15 July 2023)', 'file' => 'assets/images/Files/Link/e-knowldege/SSSUTMS Vol 2 Issue 1 01 to 15 July 2023.pdf'],
    ['title' => 'Vol.01 / Issue 02 (16 to 30 June 2023)', 'file' => 'assets/images/Files/Link/e-knowldege/SSSUTMS Vol 1 Issue 2 16 to 30 June 2023.pdf'],
    ['title' => 'Vol.01 / Issue 1 (01 to 15 June 2023)', 'file' => 'assets/images/Files/Link/e-knowldege/SSSUTMS (1).pdf']
];

// 2. SSSUTMS e-Report
$ereport_items = [
    ['title' => 'Visit of NASSCOM Regional Head', 'file' => 'assets/images/Files/Link/e content/NASSCOM Visit .pdf']
];

// 3. Students Forum
$students_forum_items = [
    ['title' => 'Cultural and Technical', 'file' => 'assets/images/Files/Link/Download/Preamble 2.pdf']
];

// 4. Online Study Material for Students
$studymaterial_items = [
    ['title' => 'Research Methodology', 'file' => 'assets/images/Files/Link/e content/definitionandtypesofresearch-100801181630-phpapp02.pdf'],
    ['title' => 'Research Report Writing', 'file' => 'assets/images/Files/Link/e content/research Report.pdf'],
    ['title' => 'Survey Research', 'file' => 'assets/images/Files/Link/e content/SURVEY.pdf'],
    ['title' => 'Women in Sports', 'file' => 'assets/images/Files/Link/e content/Women.pdf'],
    ['title' => 'Physical Fitness', 'file' => 'assets/images/Files/Link/e content/3- Physical Fitness.pdf'],
    ['title' => 'Hypotheses', 'file' => 'assets/images/Files/Link/e content/Hypotheses PPT.pdf'],
    ['title' => 'SOURCES OF INVALIDITY', 'file' => 'assets/images/Files/Link/e content/SOURCES_OF_INVALIDITY12.pdf'],
    ['title' => 'SAMPLING', 'file' => 'assets/images/Files/Link/e content/SAMPLING.pdf'],
    ['title' => 'Components of Fitness', 'file' => 'assets/images/Files/Link/e content/Components of Fitness & Tests TO GO ON.pdf'],
    ['title' => 'Notes on Anatomy and Physiology', 'file' => 'assets/images/Files/Link/EContent/ANATOMY_PHYSIOLOGY.pdf'],
    ['title' => 'Notes on History, Principles & Foundation of Physical Education', 'file' => 'assets/images/Files/Link/EContent/Foundation_physical_edcation.pdf'],
    ['title' => 'Online Complete Guide to Sports Training', 'file' => 'assets/images/Files/Link/EContent/Complete Guide to Sports Training.pdf'],
    ['title' => 'Online Notes on Computer System Architecture', 'file' => 'assets/images/Files/Link/EContent/Computer  System Architecture.pdf'],
    ['title' => 'Online Notes on Digital electronics', 'file' => 'assets/images/Files/Link/EContent/Digital electronics.pdf'],
    ['title' => 'Online Notes Structural Design & Drawing-I (RCC)', 'file' => 'assets/images/Files/Link/EContent/RCC.pdf'],
    ['title' => 'Online Notes on Building Material', 'file' => 'assets/images/Files/Link/EContent/Building Material.pdf'],
    ['title' => 'SPRITUAL MANAGEMENT', 'file' => 'assets/images/Files/Link/EContent/BOOK - SPRITUAL MANAGEMENT.pdf']
];

// 5. Video Lectures
$video_items = [
    ['title' => 'Video Lecture 1', 'file' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/EContent/Prabhakar-FINAL.mp4'],
    ['title' => 'Video Lecture 2', 'file' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/EContent/Brijesh-FINAL.mp4']
];
?>

<style>
  .econtent-main-card {
    background: #ffffff;
    border-radius: 16px;
    border: 1px solid #e2e8f0;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(11, 37, 69, 0.06);
    transition: all 0.3s ease;
  }
  .econtent-card-header {
    background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
    padding: 20px 28px;
    position: relative;
  }
  .econtent-gold-line {
    height: 3px;
    background: linear-gradient(90deg, #f3752c 0%, #f6a935 50%, #f3752c 100%);
    width: 100%;
  }
  .section-badge-title {
    font-size: 1.15rem;
    font-weight: 700;
    color: #0b2545;
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 16px;
    padding-bottom: 8px;
    border-bottom: 2px solid #e2e8f0;
  }
  .section-badge-title i {
    color: #f3752c;
  }
  .custom-econtent-table {
    border: 1px solid #e2e8f0;
    border-radius: 10px;
    overflow: hidden;
  }
  .custom-econtent-table thead {
    background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
    color: #ffffff;
  }
  .custom-econtent-table th {
    font-weight: 600;
    font-size: 0.9rem;
    letter-spacing: 0.3px;
    padding: 12px 16px;
    border: none;
  }
  .custom-econtent-table td {
    padding: 12px 16px;
    vertical-align: middle;
    font-size: 0.92rem;
    border-color: #f1f5f9;
  }
  .btn-pdf-download {
    background: linear-gradient(135deg, #f3752c 0%, #e0580a 100%);
    color: #ffffff !important;
    font-weight: 600;
    font-size: 0.82rem;
    border-radius: 50px;
    padding: 6px 16px;
    border: none;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    box-shadow: 0 2px 6px rgba(243, 117, 44, 0.28);
    transition: all 0.2s ease;
    text-decoration: none;
    white-space: nowrap;
  }
  .btn-pdf-download:hover {
    background: linear-gradient(135deg, #e0580a 0%, #c94700 100%);
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(243, 117, 44, 0.38);
    color: #ffffff !important;
  }
  .video-card-box {
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 3px 12px rgba(11, 37, 69, 0.05);
    transition: transform 0.2s ease;
  }
  .video-card-box:hover {
    transform: translateY(-3px);
  }
  .video-card-box video {
    width: 100%;
    height: auto;
    max-height: 240px;
    background: #000;
    display: block;
  }
</style>

<section class="subpage-main-section py-4" style="background-color: #f8fafc;">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="econtent-main-card mb-4">
          
          <!-- Card Header with Portal Theme -->
          <div class="econtent-card-header text-white">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
              <div class="d-flex align-items-center gap-3">
                <div class="bg-white bg-opacity-10 p-2 rounded-circle d-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                  <i class="fa fa-book-open-reader text-warning fs-5"></i>
                </div>
                <div>
                  <h4 class="fw-bold mb-0 text-white">E-Content</h4>
                  <p class="small text-white-50 mb-0">Sri Satya Sai University of Technology and Medical Sciences</p>
                </div>
              </div>
              <div>
                <span class="badge rounded-pill px-3 py-2 fw-semibold" style="background: rgba(243, 117, 44, 0.2); border: 1px solid rgba(243, 117, 44, 0.4); color: #ffd5b8;">
                  <i class="fa fa-layer-group me-1"></i> Academic Resources
                </span>
              </div>
            </div>
          </div>
          <div class="econtent-gold-line"></div>

          <!-- Card Body -->
          <div class="p-4">
            
            <!-- 1. SSSUTMS e-Knowledge -->
            <div class="mb-5">
              <div class="section-badge-title">
                <i class="fa fa-newspaper"></i>
                <span>SSSUTMS e-Knowledge</span>
              </div>
              <div class="table-responsive custom-econtent-table">
                <table class="table table-hover align-middle mb-0">
                  <thead>
                    <tr>
                      <th style="width: 70px;" class="text-center">S.No.</th>
                      <th>Edition / Issue Title</th>
                      <th class="text-center" style="width: 170px;">Download</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($eknowledge_items as $index => $item): ?>
                    <tr>
                      <td class="text-center fw-bold text-muted"><?php echo $index + 1; ?></td>
                      <td class="fw-semibold text-dark">
                        <i class="fa fa-file-pdf text-danger me-2"></i>
                        <?php echo htmlspecialchars($item['title']); ?>
                      </td>
                      <td class="text-center">
                        <a href="<?php echo BASE_URL . $item['file']; ?>" target="_blank" class="btn-pdf-download">
                          <i class="fa fa-file-pdf"></i>
                          <span>View (PDF)</span>
                        </a>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>

            <!-- 2. SSSUTMS e-Report -->
            <div class="mb-5">
              <div class="section-badge-title">
                <i class="fa fa-chart-line"></i>
                <span>SSSUTMS e-Report</span>
              </div>
              <div class="table-responsive custom-econtent-table">
                <table class="table table-hover align-middle mb-0">
                  <thead>
                    <tr>
                      <th style="width: 70px;" class="text-center">S.No.</th>
                      <th>Report Title</th>
                      <th class="text-center" style="width: 170px;">Download</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($ereport_items as $index => $item): ?>
                    <tr>
                      <td class="text-center fw-bold text-muted"><?php echo $index + 1; ?></td>
                      <td class="fw-semibold text-dark">
                        <i class="fa fa-file-pdf text-danger me-2"></i>
                        <?php echo htmlspecialchars($item['title']); ?>
                      </td>
                      <td class="text-center">
                        <a href="<?php echo BASE_URL . $item['file']; ?>" target="_blank" class="btn-pdf-download">
                          <i class="fa fa-file-pdf"></i>
                          <span>View (PDF)</span>
                        </a>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>

            <!-- 3. Students Forum -->
            <div class="mb-5">
              <div class="section-badge-title">
                <i class="fa fa-users"></i>
                <span>Students Forum</span>
              </div>
              <div class="table-responsive custom-econtent-table">
                <table class="table table-hover align-middle mb-0">
                  <thead>
                    <tr>
                      <th style="width: 70px;" class="text-center">S.No.</th>
                      <th>Activity / Document Title</th>
                      <th class="text-center" style="width: 170px;">Download</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($students_forum_items as $index => $item): ?>
                    <tr>
                      <td class="text-center fw-bold text-muted"><?php echo $index + 1; ?></td>
                      <td class="fw-semibold text-dark">
                        <i class="fa fa-file-pdf text-danger me-2"></i>
                        <?php echo htmlspecialchars($item['title']); ?>
                      </td>
                      <td class="text-center">
                        <a href="<?php echo BASE_URL . $item['file']; ?>" target="_blank" class="btn-pdf-download">
                          <i class="fa fa-file-pdf"></i>
                          <span>View (PDF)</span>
                        </a>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>

            <!-- 4. Online Study Material for Students -->
            <div class="mb-5">
              <div class="section-badge-title">
                <i class="fa fa-graduation-cap"></i>
                <span>Online Study Material for Students</span>
              </div>
              <div class="table-responsive custom-econtent-table">
                <table class="table table-hover align-middle mb-0">
                  <thead>
                    <tr>
                      <th style="width: 70px;" class="text-center">S.No.</th>
                      <th>Subject / Course Material</th>
                      <th class="text-center" style="width: 170px;">Download</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($studymaterial_items as $index => $item): ?>
                    <tr>
                      <td class="text-center fw-bold text-muted"><?php echo $index + 1; ?></td>
                      <td class="fw-semibold text-dark">
                        <i class="fa fa-file-pdf text-danger me-2"></i>
                        <?php echo htmlspecialchars($item['title']); ?>
                      </td>
                      <td class="text-center">
                        <a href="<?php echo BASE_URL . $item['file']; ?>" target="_blank" class="btn-pdf-download">
                          <i class="fa fa-file-pdf"></i>
                          <span>View (PDF)</span>
                        </a>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>

            <!-- 5. Video Lectures -->
            <div>
              <div class="section-badge-title">
                <i class="fa fa-circle-play"></i>
                <span>Video Lectures</span>
              </div>
              <div class="row g-4">
                <?php foreach ($video_items as $index => $item): 
                  $video_src = (strpos($item['file'], 'http') === 0) ? $item['file'] : (BASE_URL . $item['file']);
                ?>
                <div class="col-md-6">
                  <div class="video-card-box">
                    <video controls preload="metadata" src="<?php echo $video_src; ?>" style="width: 100%; height: auto; min-height: 220px; background: #000; display: block;">
                      <source src="<?php echo $video_src; ?>" type="video/mp4">
                      Your browser does not support the video tag.
                    </video>
                    <div class="p-3 bg-white">
                      <div class="d-flex justify-content-between align-items-center">
                        <h6 class="fw-bold text-dark mb-0">
                          <i class="fa fa-circle-play text-danger me-2"></i>
                          <?php echo htmlspecialchars($item['title']); ?>
                        </h6>
                        <a href="<?php echo $video_src; ?>" target="_blank" class="btn btn-sm btn-outline-secondary rounded-pill px-3 py-1" style="font-size: 0.8rem;">
                          <i class="fa fa-arrow-up-right-from-square me-1"></i> Open Video
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                <?php endforeach; ?>
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