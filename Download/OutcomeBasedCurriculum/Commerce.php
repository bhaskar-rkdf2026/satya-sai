<?php
$page_title = 'Commerce - Outcome Based Curriculum - SSSUTMS';
$banner_title = 'Commerce';
$banner_category = 'Outcome Based Curriculum';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';

$curricula = array (
  0 => 
  array (
    'category' => 'Under Graduate Programs',
    'badge' => 'B.Com',
    'filter' => 'ug',
    'items' => 
    array (
      0 => 
      array (
        'title' => 'B.Com (Plain)',
        'file' => 'BCOM_P.pdf',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Curriculum/BCOM_P.pdf',
      ),
      1 => 
      array (
        'title' => 'B.Com (Computer Application)',
        'file' => 'BCOM_CA.pdf',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Curriculum/BCOM_CA.pdf',
      ),
    ),
  ),
  1 => 
  array (
    'category' => 'Post Graduate Programs',
    'badge' => 'M.Com',
    'filter' => 'pg',
    'items' => 
    array (
      0 => 
      array (
        'title' => 'M.Com',
        'file' => 'MCOM.pdf',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Curriculum/MCOM.pdf',
      ),
      1 => 
      array (
        'title' => 'M.Com (w.e.f. 2021)',
        'file' => 'Curr_MCOM_2021.pdf',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Curriculum/Curr_MCOM_2021.pdf',
      ),
    ),
  ),
);
?>

<style>
.com-tab-btn {
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

.com-tab-btn:hover,
.com-tab-btn.active {
  background: #0b2545;
  color: #ffffff;
  border-color: #0b2545;
}

.com-search-box {
  position: relative;
  width: 100%;
  max-width: 340px;
}

.com-search-box input {
  padding-left: 2.4rem;
  border-radius: 8px;
  border: 1px solid #cbd5e1;
  font-size: 0.88rem;
}

.com-search-box input:focus {
  border-color: #0b2545;
  box-shadow: 0 0 0 0.2rem rgba(11, 37, 69, 0.15);
}

.com-search-box i {
  position: absolute;
  left: 0.85rem;
  top: 50%;
  transform: translateY(-50%);
  color: #64748b;
  font-size: 0.9rem;
}

.com-table-wrapper {
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  overflow: hidden;
}

.com-table {
  width: 100%;
  margin-bottom: 0;
  border-collapse: collapse;
}

.com-table thead th {
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

.com-table tbody tr {
  border-bottom: 1px solid #f1f5f9;
  transition: background-color 0.15s ease;
}

.com-table tbody tr:hover {
  background-color: #f8fafc;
}

.com-table tbody tr:last-child {
  border-bottom: none;
}

.com-table td {
  padding: 13px 16px;
  font-size: 0.92rem;
  color: #334155;
  vertical-align: middle;
}

.com-course-chip {
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

.com-branch-name {
  font-weight: 600;
  color: #0b2545;
}

.com-download-btn {
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

.com-download-btn:hover {
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
              <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-2 rounded-pill fw-semibold mb-2">
                <i class="fa fa-graduation-cap me-1"></i> Outcome Based Education (OBE)
              </span>
              <h3 class="fw-bold mb-1" style="color: #002B5B;">FACULTY OF COMMERCE</h3>
              <p class="text-muted small mb-0">Program Educational Objectives, Program Outcomes &amp; Course Curricula.</p>
            </div>
            <div class="mt-2 mt-md-0">
              <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded-pill">
                <i class="fa fa-certificate me-1"></i> UGC Approved
              </span>
            </div>
          </div>

          <!-- Vision & Mission Cards -->
          <div class="row g-3 mb-4">
            <div class="col-md-6">
              <div class="card h-100 border-0 rounded-4 p-4 shadow-sm" style="background: linear-gradient(135deg, #f0f7ff 0%, #e6f0fa 100%); border-left: 5px solid #002B5B !important;">
                <h5 class="fw-bold mb-2" style="color: #002B5B;">
                  <i class="fa fa-eye text-primary me-2"></i>VISION
                </h5>
                <p class="small text-secondary mb-0 lh-base">
                  “To be an institute of academic excellence with total commitment to quality education in Commerce, management and related fields, with a holistic concern for better life, environment and society.”
                </p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card h-100 border-0 rounded-4 p-4 shadow-sm" style="background: linear-gradient(135deg, #fffbf0 0%, #fff6e6 100%); border-left: 5px solid #e67e23 !important;">
                <h5 class="fw-bold mb-2" style="color: #002B5B;">
                  <i class="fa fa-bullseye text-warning me-2"></i>MISSION
                </h5>
                <div class="small text-secondary mb-0 lh-base">
                  <p class="mb-1"><strong>1.</strong> Empowering students with all the knowledge and guidance that they need to become worthy management professionals.</p><p class="mb-1"><strong>2.</strong> Learning through Doing and imparting a global value framework.</p><p class="mb-1"><strong>3.</strong> Providing for holistic and value-based development of students to enhance employability.</p><p class="mb-0"><strong>4.</strong> Developing social consciousness among students and providing a nurturing environment.</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Controls: Category Filter Tabs & Search -->
          <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-3">
            <div class="d-flex flex-wrap align-items-center gap-2" id="categoryFilters">
              <button type="button" class="com-tab-btn active" data-filter="all">All Programs (4)</button>
              <button type="button" class="com-tab-btn" data-filter="ug">B.Com (2)</button>
              <button type="button" class="com-tab-btn" data-filter="pg">M.Com (2)</button>

            </div>
            <div class="com-search-box">
              <i class="fa fa-search"></i>
              <input type="text" class="form-control obe-filter-input" placeholder="Search program or course...">
            </div>
          </div>

          <!-- Curriculum Matrix Table -->
          <div class="table-responsive com-table-wrapper">
            <table class="com-table obe-table">
              <thead>
                <tr>
                  <th style="width: 75px;" class="text-center">Sr. No.</th>
                  <th style="width: 220px;">Course</th>
                  <th>Program / Specialization</th>
                  <th class="text-center" style="width: 150px;">Curriculum</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $sno = 1;
                foreach ($curricula as $group): 
                  foreach ($group['items'] as $item):
                    $localPath = __DIR__ . '/../../assets/images/Files/Link/Curriculum/' . $item['file'];
                    if (!empty($item['file']) && file_exists($localPath)) {
                        $targetUrl = BASE_URL . 'assets/images/Files/Link/Curriculum/' . rawurlencode($item['file']);
                    } elseif (!empty($item['url']) && $item['url'] !== '#') {
                        $targetUrl = $item['url'];
                    } else {
                        $targetUrl = '#';
                    }
                ?>
                <tr data-category="<?php echo $group['filter']; ?>">
                  <td class="text-center fw-bold text-muted"><?php echo $sno; ?></td>
                  <td>
                    <span class="com-course-chip me-1"><?php echo $group['badge']; ?></span>
                    <span class="fw-semibold text-secondary small d-none d-md-inline"><?php echo $group['category']; ?></span>
                  </td>
                  <td>
                    <span class="com-branch-name">
                      <i class="fa fa-graduation-cap text-muted me-1"></i><?php echo htmlspecialchars($item['title']); ?>
                    </span>
                  </td>
                  <td class="text-center">
                    <a href="<?php echo $targetUrl; ?>" <?php echo ($targetUrl !== '#') ? 'target="_blank"' : ''; ?> class="com-download-btn">
                      <i class="fa fa-file-pdf"></i> Download
                    </a>
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
  const filterButtons = document.querySelectorAll('#categoryFilters .com-tab-btn');
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