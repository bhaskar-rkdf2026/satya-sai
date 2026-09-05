<?php
$page_title   = 'Polytechnic (Diploma in Engineering) - Course Syllabus - SSSUTMS';
$banner_title = 'Polytechnic (Diploma in Engineering)';
$banner_category = 'Course Syllabus';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/scheme_helper.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';

$groups = array (
  0 => 
  array (
    'title' => 'First Year — Common to All Disciplines (AICTE Scheme)',
    'icon' => 'fa-shapes',
    'items' => 
    array (
      0 => 
      array (
        'name' => 'First Semester (Common to All)',
        'badge' => 'AICTE',
        'desc' => 'Diploma Engineering First Semester Syllabus',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/POLY(ENGINEERING)/SYLPOLY_I.pdf',
      ),
      1 => 
      array (
        'name' => 'Second Semester (Common to All)',
        'badge' => 'AICTE',
        'desc' => 'Diploma Engineering Second Semester Syllabus',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/POLY(ENGINEERING)/SYLPOLY_I.pdf',
      ),
    ),
  ),
  1 => 
  array (
    'title' => 'Civil Engineering (CE)',
    'icon' => 'fa-trowel-bricks',
    'items' => 
    array (
      0 => 
      array (
        'name' => 'Third Semester',
        'badge' => 'Diploma',
        'desc' => 'Polytechnic CE Semester III Syllabus',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/POLY(ENGINEERING)/schme%20aicte/SYLPOLY(CE)_III%20sem.pdf',
      ),
      1 => 
      array (
        'name' => 'Fourth Semester',
        'badge' => 'Diploma',
        'desc' => 'Polytechnic CE Semester IV Syllabus',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/POLY(ENGINEERING)/schme%20aicte/SYLPOLY(CE)%20_IV%20sem.pdf',
      ),
      2 => 
      array (
        'name' => 'Fifth Semester',
        'badge' => 'Diploma',
        'desc' => 'Polytechnic CE Semester V Syllabus',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/POLY(ENGINEERING)/schme%20aicte/V_Semester%20New%20CE.pdf',
      ),
      3 => 
      array (
        'name' => 'Sixth Semester',
        'badge' => 'Diploma',
        'desc' => 'Polytechnic CE Semester VI Syllabus',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/POLY(ENGINEERING)/DEngg%20VI/VI%20CE%20Scheme.pdf',
      ),
    ),
  ),
  2 => 
  array (
    'title' => 'Computer Science & Engineering (CSE)',
    'icon' => 'fa-laptop-code',
    'items' => 
    array (
      0 => 
      array (
        'name' => 'Third Semester',
        'badge' => 'Diploma',
        'desc' => 'Polytechnic CSE Semester III Syllabus',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/POLY(ENGINEERING)/schme%20aicte/SYLPOLY(CS)_III%20sem.pdf',
      ),
      1 => 
      array (
        'name' => 'Fourth Semester',
        'badge' => 'Diploma',
        'desc' => 'Polytechnic CSE Semester IV Syllabus',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/POLY(ENGINEERING)/schme%20aicte/SYLPOLY(CS)%20_IV%20sem.pdf',
      ),
      2 => 
      array (
        'name' => 'Fifth Semester',
        'badge' => 'Diploma',
        'desc' => 'Polytechnic CSE Semester V Syllabus',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/POLY(ENGINEERING)/schme%20aicte/V_Semester%20New%20Cs.pdf',
      ),
      3 => 
      array (
        'name' => 'Sixth Semester',
        'badge' => 'Diploma',
        'desc' => 'Polytechnic CSE Semester VI Syllabus',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/VI_Semester_New_Cs_14042026_0355.pdf',
      ),
    ),
  ),
  3 => 
  array (
    'title' => 'Electrical Engineering (EE)',
    'icon' => 'fa-bolt',
    'items' => 
    array (
      0 => 
      array (
        'name' => 'Third Semester',
        'badge' => 'Diploma',
        'desc' => 'Polytechnic EE Semester III Syllabus',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/POLY(ENGINEERING)/schme%20aicte/SYLPOLY%20(EE)_III%20sem.pdf',
      ),
      1 => 
      array (
        'name' => 'Fourth Semester',
        'badge' => 'Diploma',
        'desc' => 'Polytechnic EE Semester IV Syllabus',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/POLY(ENGINEERING)/schme%20aicte/SYLPOLY(EE)%20_IV%20sem.pdf',
      ),
      2 => 
      array (
        'name' => 'Fifth Semester',
        'badge' => 'Diploma',
        'desc' => 'Polytechnic EE Semester V Syllabus',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Poly_Ee_V__sem_Scheme_16102025_0221.pdf',
      ),
      3 => 
      array (
        'name' => 'Sixth Semester',
        'badge' => 'Diploma',
        'desc' => 'Polytechnic EE Semester VI Syllabus',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/VI_EE_scheme_15022026_1251.pdf',
      ),
    ),
  ),
  4 => 
  array (
    'title' => 'Mechanical Engineering (ME)',
    'icon' => 'fa-gear',
    'items' => 
    array (
      0 => 
      array (
        'name' => 'Third Semester',
        'badge' => 'Diploma',
        'desc' => 'Polytechnic ME Semester III Syllabus',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/POLY(ENGINEERING)/schme%20aicte/SYLPOLY%20(ME)_III%20sem.pdf',
      ),
      1 => 
      array (
        'name' => 'Fourth Semester',
        'badge' => 'Diploma',
        'desc' => 'Polytechnic ME Semester IV Syllabus',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/POLY(ENGINEERING)/schme%20aicte/SYLPOLY(ME)%20_IV%20sem.pdf',
      ),
      2 => 
      array (
        'name' => 'Fifth Semester',
        'badge' => 'Diploma',
        'desc' => 'Polytechnic ME Semester V Syllabus',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/POLY(ENGINEERING)/schme%20aicte/V_Semester%20New%20ME.pdf',
      ),
      3 => 
      array (
        'name' => 'Sixth Semester',
        'badge' => 'Diploma',
        'desc' => 'Polytechnic ME Semester VI Syllabus',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/POLY(ENGINEERING)/DEngg%20VI/VI%20ME%20scheme.pdf',
      ),
    ),
  ),
  5 => 
  array (
    'title' => 'Chemical Engineering (CM)',
    'icon' => 'fa-flask',
    'items' => 
    array (
      0 => 
      array (
        'name' => 'Third Semester',
        'badge' => 'Diploma',
        'desc' => 'Polytechnic CM Semester III Syllabus',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/POLY(ENGINEERING)/schme%20aicte/SYLPOLY(CM)_III%20sem.pdf',
      ),
      1 => 
      array (
        'name' => 'Fourth Semester',
        'badge' => 'Diploma',
        'desc' => 'Polytechnic CM Semester IV Syllabus',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/POLY(ENGINEERING)/schme%20aicte/SYLPOLY(CM)%20_IV%20sem.pdf',
      ),
      2 => 
      array (
        'name' => 'Fifth Semester',
        'badge' => 'Diploma',
        'desc' => 'Polytechnic CM Semester V Syllabus',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/POLY(ENGINEERING)/schme%20aicte/V_Semester%20New%20CM.pdf',
      ),
      3 => 
      array (
        'name' => 'Sixth Semester',
        'badge' => 'Diploma',
        'desc' => 'Polytechnic CM Semester VI Syllabus',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/POLY(ENGINEERING)/DEngg%20VI/VI%20CM%20scheme.pdf',
      ),
    ),
  ),
);
?>

<style>
  .academic-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(11, 37, 69, 0.04);
  }
  .btn-standard-doc {
    background: #ffffff;
    color: #0b2545;
    border: 1px solid #cbd5e1;
    border-radius: 6px;
    font-size: 0.84rem;
    font-weight: 500;
    padding: 5px 12px;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: all 0.2s ease;
    text-decoration: none;
    white-space: nowrap;
  }
  .btn-standard-doc:hover {
    background: #0b2545;
    color: #ffffff;
    border-color: #0b2545;
    transform: translateY(-1px);
    box-shadow: 0 2px 6px rgba(11, 37, 69, 0.15);
  }
  .btn-standard-doc:hover i {
    color: #ffffff !important;
  }
  .standard-table {
    width: 100%;
    margin-bottom: 0;
    border-collapse: collapse;
  }
  .standard-table th {
    background: #0b2545;
    color: #ffffff;
    font-weight: 600;
    font-size: 0.85rem;
    padding: 12px 14px;
    letter-spacing: 0.3px;
    border: none;
  }
  .standard-table td {
    padding: 12px 14px;
    vertical-align: middle;
    border-color: #f1f5f9;
    color: #334155;
    font-size: 0.88rem;
  }
  .standard-table tbody tr:hover td {
    background: #f8fafc;
  }
  .standard-badge {
    background: #f1f5f9;
    color: #475569;
    border: 1px solid #e2e8f0;
    font-weight: 500;
    font-size: 0.76rem;
    padding: 3px 8px;
    border-radius: 4px;
    display: inline-block;
  }
  .group-row td {
    background: #eef4fa !important;
    color: #0b2545 !important;
    font-weight: 700 !important;
    font-size: 0.85rem !important;
    letter-spacing: 0.4px;
    padding: 10px 14px !important;
    border-top: 1px solid #cbd5e1 !important;
    border-bottom: 1px solid #cbd5e1 !important;
  }
  .group-row td i {
    color: #0b2545;
  }
  .filter-input {
    font-size: 0.85rem;
    border-color: #cbd5e1;
    border-radius: 8px;
  }
  .filter-input:focus {
    border-color: #0b2545;
    box-shadow: 0 0 0 3px rgba(11, 37, 69, 0.1);
  }
</style>

<section class="subpage-main-section py-4" style="background-color: #f8fafc;">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area -->
      <div class="col-lg-8 col-xl-9">
        <div class="academic-card bg-white p-4">

          <!-- Standard Document Header -->
          <div class="d-flex flex-wrap justify-content-between align-items-center pb-3 mb-4 border-bottom" style="border-color: #e2e8f0 !important;">
            <div>
              <span class="standard-badge mb-2 d-inline-block">
                <i class="fa fa-book-open-reader me-1 text-secondary"></i> Course Syllabus
              </span>
              <h3 class="fw-bold mb-1" style="color: #0b2545; font-size: 1.45rem;"><?= htmlspecialchars($banner_title) ?></h3>
              <p class="text-muted small mb-0"><?= htmlspecialchars($banner_desc ?? 'Official Course Curricula, Teaching Modules & Examination Content.') ?></p>
            </div>
            <div class="mt-2 mt-md-0">
              <span class="standard-badge text-dark">
                <i class="fa fa-check-circle text-success me-1"></i> Active Syllabus
              </span>
            </div>
          </div>

          <!-- Search & Filter Bar -->
          <div class="row g-2 mb-3 align-items-center">
            <div class="col-md-6 col-lg-5">
              <div class="input-group">
                <span class="input-group-text bg-white border-end-0" style="border-color:#cbd5e1;"><i class="fa fa-search text-muted"></i></span>
                <input type="text" id="schemeFilter" class="form-control border-start-0 ps-0 filter-input" placeholder="Search subject or semester...">
              </div>
            </div>
            <div class="col text-md-end text-muted small">
              <i class="fa fa-file-pdf text-danger me-1"></i> Click to view &amp; download PDF in new tab
            </div>
          </div>

          <!-- Schemes Table -->
          <div class="table-responsive rounded-2 border overflow-hidden">
            <table class="table standard-table" id="schemeTable">
              <thead>
                <tr>
                  <th style="width: 6%;" class="text-center">#</th>
                  <th style="width: 32%;">Programme / Semester</th>
                  <th style="width: 44%;">Details &amp; Subject Modules</th>
                  <th style="width: 18%;" class="text-center">Download</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($groups as $grp): ?>
                <!-- Section Header Row -->
                <tr class="group-row">
                  <td colspan="4">
                    <i class="fa <?= $grp['icon'] ?? 'fa-book' ?> me-2"></i>
                    <?= htmlspecialchars($grp['title']) ?>
                  </td>
                </tr>

                <?php 
                $sno = 1;
                foreach ($grp['items'] as $item): 
                ?>
                <tr class="scheme-row">
                  <td class="text-center text-muted fw-semibold"><?= $sno++ ?></td>
                  <td class="fw-bold text-dark"><?= htmlspecialchars($item['name']) ?></td>
                  <td>
                    <span class="standard-badge me-2"><?= htmlspecialchars($item['badge'] ?? 'Syllabus') ?></span>
                    <span class="text-muted small"><?= htmlspecialchars($item['desc'] ?? '') ?></span>
                  </td>
                  <td class="text-center">
                    <a href="<?= scheme_local_path($item['url']) ?>" target="_blank" rel="noopener noreferrer" class="btn-standard-doc">
                      <i class="fa fa-file-pdf text-danger"></i>
                      <span>View PDF</span>
                    </a>
                  </td>
                </tr>
                <?php endforeach; ?>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>

        </div>
      </div>

      <!-- Right Sidebar Column -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top:20px;z-index:10;">
        <?php require_once __DIR__ . '/../../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const filterInput = document.getElementById('schemeFilter');
  if (!filterInput) return;

  filterInput.addEventListener('input', function () {
    const q = this.value.toLowerCase().trim();
    document.querySelectorAll('#schemeTable tbody tr.scheme-row').forEach(function (row) {
      const text = row.textContent.toLowerCase();
      row.style.display = text.includes(q) ? '' : 'none';
    });
  });
});
</script>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>