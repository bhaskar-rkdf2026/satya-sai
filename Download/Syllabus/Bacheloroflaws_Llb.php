<?php
$page_title = 'Faculty of Law (LL.B. & B.A. LL.B.) Syllabus - SSSUTMS';
$banner_title = 'Faculty of Law';
$banner_category = 'Syllabus';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/download_helper.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';

$page_key = 'syllabus_Bacheloroflaws_Llb';

// Dynamic Page Info
$page_info = get_obe_page_info($page_key, [
    'heading'        => 'FACULTY OF LAW (LL.B. & B.A. LL.B.) SYLLABUS',
    'subheading'     => 'BCI Recognized Syllabi for 3-Year LL.B. and 5-Year Integrated B.A. LL.B. Programs',
    'badge_obe'      => 'Faculty of Law',
    'badge_approval' => 'BCI & UGC Approved',
    'vision_title'   => 'VISION',
    'vision_text'    => 'To foster ethical legal professionals, advocates of justice, and constitutional scholars.',
    'mission_title'  => 'MISSION',
    'mission_text'   => 'Provide rigorous jurisprudence education, moot court training, and clinical legal experience.'
]);

// Dynamic Curricula Items Grouped
$curricula = get_obe_curricula_grouped($page_key, []);

$totalCourses = 0;
foreach ($curricula as $g) {
    $totalCourses += count($g['items']);
}
?>

<style>
  .eng-page-container {
    background: #ffffff;
    border-radius: 14px;
    border: 1px solid #e2e8f0;
    box-shadow: 0 4px 20px rgba(11, 37, 69, 0.05);
    overflow: hidden;
    margin-bottom: 2rem;
  }
  .eng-header-banner {
    background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
    color: #ffffff;
    padding: 2rem 2.25rem;
    position: relative;
    border-radius: 14px;
    margin-bottom: 1.5rem;
    box-shadow: 0 8px 24px rgba(11, 37, 69, 0.15);
  }
  .eng-header-banner::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #f59e0b, #fbbf24);
    border-bottom-left-radius: 14px;
    border-bottom-right-radius: 14px;
  }
  .eng-vm-card {
    border-radius: 12px;
    border: 1px solid #e2e8f0;
    background: #ffffff;
    padding: 1.5rem;
    height: 100%;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
  }
  .eng-vm-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(11, 37, 69, 0.08);
  }
  .eng-vm-title {
    font-size: 1.05rem;
    font-weight: 700;
    color: #0b2545;
    margin-bottom: 0.75rem;
    display: flex;
    align-items: center;
    gap: 8px;
  }
  .eng-vm-title i {
    color: #f59e0b;
    font-size: 1.2rem;
  }
  .eng-vm-text {
    color: #475569;
    font-size: 0.9rem;
    line-height: 1.6;
    margin: 0;
  }
  .eng-filter-tabs {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-bottom: 1.25rem;
  }
  .eng-filter-btn {
    border: 1px solid #cbd5e1;
    background: #f8fafc;
    color: #334155;
    font-weight: 600;
    font-size: 0.84rem;
    padding: 8px 16px;
    border-radius: 50px;
    transition: all 0.2s ease;
    cursor: pointer;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 6px;
  }
  .eng-filter-btn:hover,
  .eng-filter-btn.active {
    background: #0b2545;
    color: #ffffff;
    border-color: #0b2545;
    box-shadow: 0 4px 10px rgba(11, 37, 69, 0.2);
  }
  .eng-search-box {
    position: relative;
    max-width: 420px;
    width: 100%;
  }
  .eng-search-box input {
    padding-left: 2.75rem;
    padding-right: 2.5rem;
    height: 44px;
    border-radius: 50px;
    border: 1.5px solid #cbd5e1;
    font-size: 0.9rem;
    transition: all 0.2s ease;
  }
  .eng-search-box input:focus {
    border-color: #0b2545;
    box-shadow: 0 0 0 4px rgba(11, 37, 69, 0.12);
  }
  .eng-search-box .search-icon {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: #64748b;
    font-size: 0.95rem;
  }
  .eng-search-box .clear-btn {
    position: absolute;
    right: 1rem;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    color: #94a3b8;
    font-size: 0.9rem;
    cursor: pointer;
    display: none;
    padding: 0;
  }
  .eng-table {
    border-collapse: collapse;
    width: 100%;
    margin-bottom: 0;
  }
  .eng-table thead th {
    background: #0b2545;
    color: #ffffff;
    font-weight: 600;
    font-size: 0.82rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    padding: 12px 16px;
    border: none;
    vertical-align: middle;
  }
  .eng-table tbody tr {
    transition: background 0.15s ease;
    border-bottom: 1px solid #f1f5f9;
  }
  .eng-table tbody tr:hover {
    background-color: #f8fafc;
  }
  .eng-table td {
    padding: 12px 16px;
    vertical-align: middle;
    font-size: 0.88rem;
    color: #334155;
  }
  .eng-branch-name {
    font-weight: 600;
    color: #0b2545;
  }
  .eng-download-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: #0b2545;
    color: #ffffff !important;
    font-weight: 600;
    font-size: 0.8rem;
    padding: 6px 14px;
    border-radius: 6px;
    text-decoration: none !important;
    transition: all 0.2s ease;
    white-space: nowrap;
  }
  .eng-download-btn:hover {
    background: #d97706;
    color: #ffffff !important;
    transform: translateY(-1px);
    box-shadow: 0 4px 10px rgba(217, 119, 6, 0.3);
  }
  .eng-sidebar-widget {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    padding: 1.25rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
  }
  .eng-sidebar-title {
    font-size: 0.95rem;
    font-weight: 700;
    color: #0b2545;
    margin-bottom: 0.85rem;
    padding-bottom: 0.5rem;
    border-bottom: 2px solid #e2e8f0;
    display: flex;
    align-items: center;
    gap: 8px;
  }
  .eng-sidebar-link {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 8px 12px;
    border-radius: 8px;
    color: #334155;
    font-size: 0.84rem;
    font-weight: 500;
    text-decoration: none;
    transition: all 0.2s ease;
    margin-bottom: 4px;
    background: #f8fafc;
  }
  .eng-sidebar-link:hover,
  .eng-sidebar-link.active {
    background: #0b2545;
    color: #ffffff;
    font-weight: 600;
  }
  .no-results-box {
    display: none;
    padding: 3rem 1rem;
    text-align: center;
    color: #64748b;
  }
</style>

<section class="py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Column (Left) -->
      <div class="col-lg-8 col-xl-9">

        <!-- Header Banner -->
        <div class="eng-header-banner">
          <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
            <div>
              <?php if (!empty($page_info['badge_obe'])): ?>
                <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-2 rounded-pill fw-semibold mb-2">
                  <i class="fa fa-book-open me-1"></i> <?php echo htmlspecialchars($page_info['badge_obe']); ?>
                </span>
              <?php endif; ?>
              <h1 class="h3 text-white fw-bold mb-1"><?php echo htmlspecialchars($page_info['heading']); ?></h1>
              <p class="text-white-50 mb-0 small"><?php echo htmlspecialchars($page_info['subheading']); ?></p>
            </div>
            <?php if (!empty($page_info['badge_approval'])): ?>
              <div class="text-end">
                <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded-pill">
                  <i class="fa fa-certificate me-1"></i> <?php echo htmlspecialchars($page_info['badge_approval']); ?>
                </span>
              </div>
            <?php endif; ?>
          </div>
        </div>

        <!-- Vision & Mission Cards -->
        <?php if (!empty($page_info['vision_text']) || !empty($page_info['mission_text'])): ?>
          <div class="row g-3 mb-4" id="vision-mission-sec">
            <?php if (!empty($page_info['vision_text'])): ?>
              <div class="col-md-6">
                <div class="eng-vm-card">
                  <h3 class="eng-vm-title">
                    <i class="fa fa-eye"></i> <?php echo htmlspecialchars($page_info['vision_title'] ?? 'VISION'); ?>
                  </h3>
                  <p class="eng-vm-text"><?php echo nl2br(htmlspecialchars($page_info['vision_text'])); ?></p>
                </div>
              </div>
            <?php endif; ?>
            <?php if (!empty($page_info['mission_text'])): ?>
              <div class="col-md-6">
                <div class="eng-vm-card">
                  <h3 class="eng-vm-title">
                    <i class="fa fa-bullseye"></i> <?php echo htmlspecialchars($page_info['mission_title'] ?? 'MISSION'); ?>
                  </h3>
                  <p class="eng-vm-text"><?php echo nl2br(htmlspecialchars($page_info['mission_text'])); ?></p>
                </div>
              </div>
            <?php endif; ?>
          </div>
        <?php endif; ?>

        <!-- Category Filter Tabs & Quick Search -->
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-3">
          <div class="eng-filter-tabs">
            <button class="eng-filter-btn active" data-filter="all">
              <i class="fa fa-list"></i> All Syllabi (<?php echo $totalCourses; ?>)
            </button>
            <?php foreach ($curricula as $cGroup): ?>
              <button class="eng-filter-btn" data-filter="<?php echo htmlspecialchars($cGroup['filter']); ?>">
                <?php echo htmlspecialchars($cGroup['category']); ?> (<?php echo count($cGroup['items']); ?>)
              </button>
            <?php endforeach; ?>
          </div>

          <div class="eng-search-box">
            <i class="fa fa-search search-icon"></i>
            <input type="text" id="curriculumSearch" class="form-control" placeholder="Search branch, semester, or course...">
            <button class="clear-btn" id="clearSearch" title="Clear search"><i class="fa fa-times"></i></button>
          </div>
        </div>

        <!-- Curricula Data Table -->
        <div class="eng-page-container">
          <div class="table-responsive">
            <table class="table eng-table" id="curriculumTable">
              <thead>
                <tr>
                  <th style="width: 75px;" class="text-center">Sr. No.</th>
                  <th style="width: 220px;">Category / Regulation</th>
                  <th>Course / Branch Title</th>
                  <th class="text-center" style="width: 170px;">Syllabus File</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $sno = 1;
                foreach ($curricula as $group): 
                  foreach ($group['items'] as $item):
                    $targetUrl = get_document_download_url($item);
                    $isZip = (strtolower(pathinfo($item['file'] ?? '', PATHINFO_EXTENSION)) === 'zip');
                ?>
                <tr data-category="<?php echo htmlspecialchars($group['filter']); ?>">
                  <td class="text-center fw-bold text-muted"><?php echo $sno; ?></td>
                  <td>
                    <span class="fw-semibold text-secondary"><?php echo htmlspecialchars(!empty($group['category']) ? $group['category'] : $group['badge']); ?></span>
                  </td>
                  <td>
                    <span class="eng-branch-name">
                      <i class="fa fa-graduation-cap text-muted me-1"></i><?php echo htmlspecialchars($item['title']); ?>
                    </span>
                  </td>
                  <td class="text-center">
                    <?php if ($targetUrl !== '#'): ?>
                      <a href="<?php echo htmlspecialchars($targetUrl); ?>" target="_blank" class="eng-download-btn">
                        <i class="fa <?php echo $isZip ? 'fa-file-zipper' : 'fa-file-pdf'; ?>"></i> <?php echo $isZip ? 'Download ZIP' : 'Download PDF'; ?>
                      </a>
                    <?php else: ?>
                      <span class="badge bg-secondary-subtle text-secondary px-3 py-2">
                        <i class="fa fa-clock me-1"></i> Available Soon
                      </span>
                    <?php endif; ?>
                  </td>
                </tr>
                <?php 
                  $sno++;
                  endforeach; 
                endforeach; 
                ?>
              </tbody>
            </table>
          </div>

          <!-- Empty Search State -->
          <div class="no-results-box" id="noResultsBox">
            <i class="fa fa-folder-open fa-3x mb-3 text-muted"></i>
            <h5 class="fw-bold">No Syllabus Found</h5>
            <p class="mb-0 text-muted small">No branch syllabus matches your current search/filter criteria.</p>
          </div>
        </div>

      </div>

      <!-- Sidebar Navigation (Right) -->
      <div class="col-lg-4 col-xl-3">
        <div class="sticky-top" style="top: 90px;">
          
          <!-- Quick Actions Widget -->
          <div class="eng-sidebar-widget">
            <h3 class="eng-sidebar-title"><i class="fa fa-compass text-primary"></i> Quick Navigation</h3>
            <a href="#curriculumTable" class="eng-sidebar-link">
              <span><i class="fa fa-table me-2 text-primary"></i> All Syllabi Table</span>
              <span class="badge bg-primary text-white rounded-pill"><?php echo $totalCourses; ?></span>
            </a>
            <?php if (!empty($page_info['vision_text'])): ?>
              <a href="#vision-mission-sec" class="eng-sidebar-link">
                <span><i class="fa fa-eye me-2 text-warning"></i> Vision &amp; Mission</span>
              </a>
            <?php endif; ?>
            <a href="<?php echo base_url('Download/OutcomeBasedCurriculum/' . 'Bacheloroflaws_Llb.php'); ?>" class="eng-sidebar-link">
              <span><i class="fa fa-layer-group me-2 text-info"></i> Outcome Based Curriculum</span>
              <i class="fa fa-arrow-right small text-muted"></i>
            </a>
            <a href="<?php echo base_url('Download/Scheme/' . 'Bacheloroflaws_Llb.php'); ?>" class="eng-sidebar-link">
              <span><i class="fa fa-book me-2 text-success"></i> Curriculum Schemes</span>
              <i class="fa fa-arrow-right small text-muted"></i>
            </a>
          </div>

          <!-- Other Syllabus Subpages Widget -->
          <div class="eng-sidebar-widget">
            <h3 class="eng-sidebar-title"><i class="fa fa-graduation-cap text-warning"></i> Other Syllabi</h3>
            <?php 
            $otherPages = [
                'BE.php'                        => 'Bachelor of Engineering (B.E.)',
                'Pharmacy.php'                  => 'Faculty of Pharmacy',
                'MTech.php'                     => 'Master of Technology (M.Tech.)',
                'Education.php'                 => 'Faculty of Education',
                'BHMCT.php'                     => 'BHMCT Syllabus',
                'MBA.php'                       => 'MBA Syllabus',
                'MCA.php'                       => 'MCA Syllabus',
                'PhysicalEducation.php'         => 'Physical Education',
                'BScHonsAG.php'                 => 'B.Sc. (Hons.) Agriculture',
                'BHMS.php'                      => 'BHMS Syllabus',
                'UTD.php'                       => 'University Teaching Depts (UTD)',
                'Paramedical.php'               => 'Faculty of Paramedical',
                'Polytechnic_Engineering.php'   => 'Polytechnic Engineering',
                'BLibISc.php'                   => 'B.Lib.I.Sc. Syllabus',
                'Bacheloroflaws_Llb.php'        => 'Bachelor of Laws (LL.B.)',
                'BScHMCS.php'                   => 'B.Sc. [HMCS] Syllabus'
            ];
            $currentFile = 'Bacheloroflaws_Llb.php';
            foreach ($otherPages as $f => $name):
            ?>
              <a href="<?php echo base_url('Download/Syllabus/' . $f); ?>" class="eng-sidebar-link <?php echo ($currentFile === $f) ? 'active' : ''; ?>">
                <span><i class="fa fa-file-text me-2"></i> <?php echo htmlspecialchars($name); ?></span>
                <?php if ($currentFile === $f): ?>
                  <i class="fa fa-check-circle"></i>
                <?php endif; ?>
              </a>
            <?php endforeach; ?>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const searchInput = document.getElementById('curriculumSearch');
  const clearBtn = document.getElementById('clearSearch');
  const filterBtns = document.querySelectorAll('.eng-filter-btn');
  const tableRows = document.querySelectorAll('#curriculumTable tbody tr');
  const noResultsBox = document.getElementById('noResultsBox');
  const tableWrap = document.querySelector('.table-responsive');

  let activeFilter = 'all';

  function applyFilters() {
    const query = searchInput.value.toLowerCase().trim();
    let visibleCount = 0;

    tableRows.forEach(row => {
      const rowCategory = row.getAttribute('data-category') || '';
      const text = row.textContent.toLowerCase();
      
      const matchesFilter = (activeFilter === 'all' || rowCategory === activeFilter);
      const matchesSearch = (!query || text.includes(query));

      if (matchesFilter && matchesSearch) {
        row.style.display = '';
        visibleCount++;
        // Re-number visible rows
        const snoCell = row.querySelector('td:first-child');
        if (snoCell) snoCell.textContent = visibleCount;
      } else {
        row.style.display = 'none';
      }
    });

    if (visibleCount === 0) {
      if (noResultsBox) noResultsBox.style.display = 'block';
      if (tableWrap) tableWrap.style.display = 'none';
    } else {
      if (noResultsBox) noResultsBox.style.display = 'none';
      if (tableWrap) tableWrap.style.display = '';
    }

    if (clearBtn) {
      clearBtn.style.display = query.length > 0 ? 'block' : 'none';
    }
  }

  filterBtns.forEach(btn => {
    btn.addEventListener('click', function () {
      filterBtns.forEach(b => b.classList.remove('active'));
      this.classList.add('active');
      activeFilter = this.getAttribute('data-filter');
      applyFilters();
    });
  });

  if (searchInput) {
    searchInput.addEventListener('input', applyFilters);
  }

  if (clearBtn) {
    clearBtn.addEventListener('click', function () {
      searchInput.value = '';
      applyFilters();
      searchInput.focus();
    });
  }
});
</script>

<?php 
require_once __DIR__ . '/../../includes/footer.php';
?>
