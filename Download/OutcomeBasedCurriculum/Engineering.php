<?php
require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/download_helper.php';

$pageKey = 'obc_Engineering';

$page_info = get_obe_page_info($pageKey, [
    'page_title'     => 'Engineering - Outcome Based Curriculum - SSSUTMS',
    'banner_title'   => 'Engineering',
    'banner_category'=> 'Outcome Based Curriculum',
    'heading'        => 'FACULTY OF ENGINEERING & TECHNOLOGY',
    'subheading'     => 'Program Educational Objectives, Program Outcomes & Course Curricula.',
    'badge_obe'      => 'Outcome Based Education (OBE)',
    'badge_approval' => 'UGC & AICTE Approved',
    'vision_title'   => 'VISION',
    'vision_text'    => 'To emerge as a \"Centre for Excellence\" offering Technical Education and Research Opportunities of very high standards to students, develop the total personality of the individual, and in still high levels of discipline and strive to set global standards, making our students technologically superior and ethically strong, who in turn shall contribute to the advancement of society and humankind.',
    'mission_title'  => 'MISSION',
    'mission_text'   => 'We dedicate and commit ourselves to achieve, sustain and faster unmatched excellence in Technical Education. To this end, we will pursue continuous development of infrastructure and enhance state-of-the art Equipment to provide our students a technologically up-to-date and intellectually inspiring environment of learning, research creativity, innovation and professional activity and inculcate in them ethical and moral values.'
]);

$page_data = $page_info;
$page_title = $page_info['meta_title'] ?? ($page_info['page_title'] ?? 'Engineering - Outcome Based Curriculum - SSSUTMS');
$banner_title = $page_info['banner_title'] ?? 'Engineering';
$banner_category = $page_info['banner_category'] ?? 'Outcome Based Curriculum';
$meta_description = $page_info['meta_description'] ?? '';
$meta_keywords = $page_info['meta_keywords'] ?? '';
$canonical_url = $page_info['canonical_url'] ?? '';
$og_image = $page_info['og_image'] ?? '';

require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';

$curricula = get_obe_curricula_grouped($pageKey, []);

// Total active items count
$totalItemsCount = 0;
foreach ($curricula as $grp) {
    $totalItemsCount += count($grp['items'] ?? []);
}
?>

<style>
.eng-page-container {
  background: #ffffff;
  border-radius: 16px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 4px 20px rgba(11, 37, 69, 0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}

.eng-header-card {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 1.75rem 2rem;
  position: relative;
}

.eng-header-card::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 3px;
  background: linear-gradient(90deg, #1d4ed8, #60a5fa);
}

.eng-vm-card {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 1.25rem 1.5rem;
  height: 100%;
  transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.eng-vm-card.vision-card {
  border-left: 4px solid #0b2545 !important;
}

.eng-vm-card.mission-card {
  border-left: 4px solid #134074 !important;
}

.eng-vm-card:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 16px rgba(11, 37, 69, 0.06);
}

.eng-vm-title {
  color: #0b2545;
  font-size: 1.05rem;
  font-weight: 700;
  margin-bottom: 0.6rem;
  display: flex;
  align-items: center;
  gap: 8px;
}

.eng-vm-text {
  color: #475569;
  font-size: 0.9rem;
  line-height: 1.65;
  margin-bottom: 0;
}

.eng-tab-btn {
  background: #f1f5f9;
  color: #0b2545;
  border: 1px solid #cbd5e1;
  font-weight: 600;
  font-size: 0.85rem;
  padding: 6px 16px;
  border-radius: 20px;
  transition: all 0.2s ease;
  cursor: pointer;
}

.eng-tab-btn:hover,
.eng-tab-btn.active {
  background: #0b2545;
  color: #ffffff;
  border-color: #0b2545;
}

.eng-search-box {
  position: relative;
  width: 100%;
  max-width: 340px;
}

.eng-search-box input {
  padding-left: 2.4rem;
  border-radius: 8px;
  border: 1px solid #cbd5e1;
  font-size: 0.88rem;
}

.eng-search-box input:focus {
  border-color: #0b2545;
  box-shadow: 0 0 0 0.2rem rgba(11, 37, 69, 0.15);
}

.eng-search-box i {
  position: absolute;
  left: 0.85rem;
  top: 50%;
  transform: translateY(-50%);
  color: #64748b;
  font-size: 0.9rem;
}

.eng-table-wrapper {
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  overflow: hidden;
}

.eng-table {
  width: 100%;
  margin-bottom: 0;
  border-collapse: collapse;
}

.eng-table thead th {
  background: #0b2545 !important;
  color: #ffffff !important;
  font-weight: 700;
  font-size: 0.88rem;
  text-transform: uppercase;
  letter-spacing: 0.03em;
  padding: 13px 16px;
  border: none;
  vertical-align: middle;
}

.eng-table tbody tr {
  border-bottom: 1px solid #f1f5f9;
  transition: background-color 0.15s ease;
}

.eng-table tbody tr:hover {
  background-color: #f8fafc;
}

.eng-table tbody tr:last-child {
  border-bottom: none;
}

.eng-table td {
  padding: 13px 16px;
  font-size: 0.92rem;
  color: #334155;
  vertical-align: middle;
}

.eng-course-chip {
  display: inline-flex;
  align-items: center;
  background: #e2e8f0;
  color: #0b2545;
  font-weight: 700;
  font-size: 0.78rem;
  padding: 3px 10px;
  border-radius: 6px;
  border: 1px solid #cbd5e1;
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
  border: 1px solid #0b2545;
  border-radius: 6px;
  font-size: 0.82rem;
  font-weight: 600;
  padding: 6px 14px;
  text-decoration: none;
  transition: all 0.2s ease;
}

.eng-download-btn:hover {
  background: #134074;
  border-color: #134074;
  color: #ffffff !important;
  transform: translateY(-1px);
  box-shadow: 0 4px 10px rgba(11, 37, 69, 0.2);
}
</style>

<section class="subpage-main-section py-4 bg-light">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="content-card shadow-sm border-0 rounded-4 bg-white p-4 mb-4">
          
          <!-- Header Banner -->
          <div class="d-flex flex-wrap justify-content-between align-items-center pb-3 mb-4 border-bottom">
            <div>
              <?php if (!empty($page_info['badge_obe'])): ?>
                <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-2 rounded-pill fw-semibold mb-2">
                  <i class="fa fa-graduation-cap me-1"></i> <?php echo htmlspecialchars($page_info['badge_obe']); ?>
                </span>
              <?php endif; ?>
              <h3 class="fw-bold mb-1" style="color: #002B5B;"><?php echo htmlspecialchars($page_info['heading'] ?? 'FACULTY OF ENGINEERING & TECHNOLOGY'); ?></h3>
              <p class="text-muted small mb-0"><?php echo htmlspecialchars($page_info['subheading'] ?? 'Program Educational Objectives, Program Outcomes & Course Curricula.'); ?></p>
            </div>
            <?php if (!empty($page_info['badge_approval'])): ?>
              <div class="mt-2 mt-md-0">
                <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded-pill">
                  <i class="fa fa-certificate me-1"></i> <?php echo htmlspecialchars($page_info['badge_approval']); ?>
                </span>
              </div>
            <?php endif; ?>
          </div>

          <!-- Vision & Mission Cards -->
          <div class="row g-3 mb-4">
            <div class="col-md-6">
              <div class="card h-100 border-0 rounded-4 p-4 shadow-sm" style="background: linear-gradient(135deg, #f0f7ff 0%, #e6f0fa 100%); border-left: 5px solid #002B5B !important;">
                <h5 class="fw-bold mb-2" style="color: #002B5B;">
                  <i class="fa fa-eye text-primary me-2"></i><?php echo htmlspecialchars($page_info['vision_title'] ?? 'VISION'); ?>
                </h5>
                <p class="small text-secondary mb-0 lh-base">
                  <?php echo nl2br(htmlspecialchars($page_info['vision_text'] ?? '')); ?>
                </p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card h-100 border-0 rounded-4 p-4 shadow-sm" style="background: linear-gradient(135deg, #fffbf0 0%, #fff6e6 100%); border-left: 5px solid #e67e23 !important;">
                <h5 class="fw-bold mb-2" style="color: #002B5B;">
                  <i class="fa fa-bullseye text-warning me-2"></i><?php echo htmlspecialchars($page_info['mission_title'] ?? 'MISSION'); ?>
                </h5>
                <p class="small text-secondary mb-0 lh-base">
                  <?php echo nl2br(htmlspecialchars($page_info['mission_text'] ?? '')); ?>
                </p>
              </div>
            </div>
          </div>

          <!-- Controls: Category Filter Tabs & Search -->
          <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-3">
            <div class="d-flex flex-wrap align-items-center gap-2" id="categoryFilters">
              <button type="button" class="eng-tab-btn active" data-filter="all">All Programs (<?php echo $totalItemsCount; ?>)</button>
              <?php foreach ($curricula as $cGroup): ?>
                <button type="button" class="eng-tab-btn" data-filter="<?php echo htmlspecialchars($cGroup['filter']); ?>">
                  <?php echo htmlspecialchars($cGroup['badge']); ?> (<?php echo count($cGroup['items']); ?>)
                </button>
              <?php endforeach; ?>
            </div>
            <div class="eng-search-box">
              <i class="fa fa-search"></i>
              <input type="text" class="form-control obe-filter-input" placeholder="Search branch or specialization...">
            </div>
          </div>

          <!-- Curriculum Matrix Table -->
          <div class="table-responsive eng-table-wrapper">
            <table class="eng-table obe-table">
              <thead>
                <tr>
                  <th style="width: 75px;" class="text-center">Sr. No.</th>
                  <th style="width: 220px;">Course / Program</th>
                  <th>Branch / Specialization</th>
                  <th class="text-center" style="width: 160px;">Curriculum PDF</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $sno = 1;
                foreach ($curricula as $group): 
                  foreach ($group['items'] as $item):
                    $targetUrl = get_document_download_url($item);
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
                        <i class="fa fa-file-pdf"></i> Download PDF
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

        </div>
      </div>

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const searchInput = document.querySelector('.obe-filter-input');
  const filterButtons = document.querySelectorAll('#categoryFilters .eng-tab-btn');
  const tableRows = document.querySelectorAll('.obe-table tbody tr');
  
  let currentFilter = 'all';

  function filterTable() {
    const query = searchInput ? searchInput.value.toLowerCase().trim() : '';
    
    tableRows.forEach(row => {
      const rowCat = row.getAttribute('data-category');
      const text = row.textContent.toLowerCase();
      
      const matchesCategory = (currentFilter === 'all' || rowCat === currentFilter);
      const matchesSearch = (!query || text.includes(query));
      
      if (matchesCategory && matchesSearch) {
        row.style.display = '';
      } else {
        row.style.display = 'none';
      }
    });
  }

  if (searchInput) {
    searchInput.addEventListener('input', filterTable);
  }

  filterButtons.forEach(btn => {
    btn.addEventListener('click', function() {
      filterButtons.forEach(b => b.classList.remove('active'));
      this.classList.add('active');
      currentFilter = this.getAttribute('data-filter');
      filterTable();
    });
  });
});
</script>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>