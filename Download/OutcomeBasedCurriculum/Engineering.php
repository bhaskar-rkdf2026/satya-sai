<?php
$page_title = 'Engineering - Outcome Based Curriculum - SSSUTMS';
$banner_title = 'Engineering';
$banner_category = 'Outcome Based Curriculum';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';

$curricula = [
    [
        'category' => 'Bachelor of Engineering (B.E.)',
        'badge' => 'B.E.',
        'filter' => 'be',
        'items' => [
            ['title' => 'Aeronautical Engineering', 'file' => 'BE_AE.pdf', 'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Curriculum/BE_AE.pdf'],
            ['title' => 'Chemical Engineering', 'file' => 'BE_CM.pdf', 'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Curriculum/BE_CM.pdf'],
            ['title' => 'Civil Engineering', 'file' => 'BE_CE.pdf', 'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Curriculum/BE_CE.pdf'],
            ['title' => 'Computer Science and Engineering', 'file' => 'BE_CSE.pdf', 'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Curriculum/BE_CSE.pdf'],
            ['title' => 'Electrical Engineering', 'file' => 'BE_EE.pdf', 'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Curriculum/BE_EE.pdf'],
            ['title' => 'Electrical and Electronics Engineering', 'file' => 'BE_EEE.pdf', 'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Curriculum/BE_EEE.pdf'],
            ['title' => 'Electronics and Communication', 'file' => 'BE_EC.pdf', 'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Curriculum/BE_EC.pdf'],
            ['title' => 'Electronics and Instrumentation', 'file' => 'BE_EI.pdf', 'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Curriculum/BE_EI.pdf'],
            ['title' => 'Information Technology', 'file' => 'BE_IT.pdf', 'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Curriculum/BE_IT.pdf'],
            ['title' => 'Mechanical Engineering', 'file' => 'BE_ME.pdf', 'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Curriculum/BE_ME.pdf'],
            ['title' => 'Mining Engineering', 'file' => 'BE_MI.pdf', 'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Curriculum/BE_MI.pdf'],
        ]
    ],
    [
        'category' => 'Master of Technology (M.Tech.)',
        'badge' => 'M.Tech.',
        'filter' => 'mtech',
        'items' => [
            ['title' => 'Computer Science and Engineering', 'file' => 'MTECH_CSE.pdf', 'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Curriculum/MTECH_CSE.pdf'],
            ['title' => 'Computer Technology and Application', 'file' => 'MTECH_CTA.pdf', 'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Curriculum/MTECH_CTA.pdf'],
            ['title' => 'Digital Communication', 'file' => 'MTECH_DC.pdf', 'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Curriculum/MTECH_DC.pdf'],
            ['title' => 'Electrical Power System', 'file' => 'MTECH_EPS.pdf', 'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Curriculum/MTECH_EPS.pdf'],
            ['title' => 'Industrial Design', 'file' => 'MTECH_ID.pdf', 'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Curriculum/MTECH_ID.pdf'],
            ['title' => 'Information Technology', 'file' => 'MTECH_ITE .pdf', 'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Curriculum/MTECH_ITE%20.pdf'],
            ['title' => 'Power Electronics', 'file' => 'MTECH_PE.pdf', 'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Curriculum/MTECH_PE.pdf'],
            ['title' => 'Software Engineering', 'file' => 'MTECH_SE.pdf', 'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Curriculum/MTECH_SE.pdf'],
            ['title' => 'Structural Design', 'file' => 'MTECH_SD.pdf', 'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Curriculum/MTECH_SD.pdf'],
            ['title' => 'Thermal Engineering', 'file' => 'MTECH_TE.pdf', 'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Curriculum/MTECH_TE.pdf'],
            ['title' => 'VLSI Design', 'file' => 'MTECH_VLSI.pdf', 'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Curriculum/MTECH_VLSI.pdf'],
        ]
    ],
    [
        'category' => 'Diploma Engineering',
        'badge' => 'Diploma',
        'filter' => 'diploma',
        'items' => [
            ['title' => 'Computer Science & Engineering', 'file' => 'DPE_CSE.pdf', 'url' => '#'],
            ['title' => 'Electrical Engineering', 'file' => 'DPE_EE.pdf', 'url' => '#'],
            ['title' => 'Civil Engineering', 'file' => 'DPE_CE.pdf', 'url' => '#'],
            ['title' => 'Mechanical Engineering', 'file' => 'DPE_ME.pdf', 'url' => '#'],
            ['title' => 'Chemical Engineering', 'file' => 'DPE_CM.pdf', 'url' => '#'],
        ]
    ]
];
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
              <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-2 rounded-pill fw-semibold mb-2">
                <i class="fa fa-graduation-cap me-1"></i> Outcome Based Education (OBE)
              </span>
              <h3 class="fw-bold mb-1" style="color: #002B5B;">FACULTY OF ENGINEERING &amp; TECHNOLOGY</h3>
              <p class="text-muted small mb-0">Program Educational Objectives, Program Outcomes &amp; Course Curricula.</p>
            </div>
            <div class="mt-2 mt-md-0">
              <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded-pill">
                <i class="fa fa-certificate me-1"></i> UGC &amp; AICTE Approved
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
                  To emerge as a "Centre for Excellence" offering Technical Education and Research Opportunities of very high standards to students, develop the total personality of the individual, and in still high levels of discipline and strive to set global standards, making our students technologically superior and ethically strong, who in turn shall contribute to the advancement of society and humankind.
                </p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card h-100 border-0 rounded-4 p-4 shadow-sm" style="background: linear-gradient(135deg, #fffbf0 0%, #fff6e6 100%); border-left: 5px solid #e67e23 !important;">
                <h5 class="fw-bold mb-2" style="color: #002B5B;">
                  <i class="fa fa-bullseye text-warning me-2"></i>MISSION
                </h5>
                <p class="small text-secondary mb-0 lh-base">
                  We dedicate and commit ourselves to achieve, sustain and faster unmatched excellence in Technical Education. To this end, we will pursue continuous development of infrastructure and enhance state-of-the art Equipment to provide our students a technologically up-to-date and intellectually inspiring environment of learning, research creativity, innovation and professional activity and inculcate in them ethical and moral values.
                </p>
              </div>
            </div>
          </div>

            <!-- Controls: Category Filter Tabs & Search -->
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-3">
              <div class="d-flex flex-wrap align-items-center gap-2" id="categoryFilters">
                <button type="button" class="eng-tab-btn active" data-filter="all">All Programs (27)</button>
                <button type="button" class="eng-tab-btn" data-filter="be">B.E. (11)</button>
                <button type="button" class="eng-tab-btn" data-filter="mtech">M.Tech. (11)</button>
                <button type="button" class="eng-tab-btn" data-filter="diploma">Diploma (5)</button>
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
                    <th style="width: 200px;">Course</th>
                    <th>Branch / Specialization</th>
                    <th class="text-center" style="width: 150px;">Curriculum</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $sno = 1;
                  foreach ($curricula as $group): 
                    foreach ($group['items'] as $item):
                      $localPath = __DIR__ . '/../../assets/images/Files/Link/Curriculum/' . $item['file'];
                      if (file_exists($localPath)) {
                          $targetUrl = BASE_URL . 'assets/images/Files/Link/Curriculum/' . rawurlencode($item['file']);
                          $isAvailable = true;
                      } elseif (!empty($item['url']) && $item['url'] !== '#') {
                          $targetUrl = $item['url'];
                          $isAvailable = true;
                      } else {
                          $targetUrl = '#';
                          $isAvailable = false;
                      }
                  ?>
                  <tr data-category="<?php echo $group['filter']; ?>">
                    <td class="text-center fw-bold text-muted"><?php echo $sno; ?></td>
                    <td>
                      <span class="eng-course-chip me-1"><?php echo $group['badge']; ?></span>
                      <span class="fw-semibold text-secondary small d-none d-md-inline"><?php echo $group['category']; ?></span>
                    </td>
                    <td>
                      <span class="eng-branch-name">
                        <i class="fa fa-graduation-cap text-muted me-1"></i><?php echo htmlspecialchars($item['title']); ?>
                      </span>
                    </td>
                    <td class="text-center">
                      <a href="<?php echo $targetUrl; ?>" <?php echo ($targetUrl !== '#') ? 'target="_blank"' : ''; ?> class="eng-download-btn">
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