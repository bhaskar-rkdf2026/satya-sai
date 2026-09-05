<?php
$page_title   = 'Faculty of Education - Course Syllabus - SSSUTMS';
$banner_title = 'Faculty of Education';
$banner_category = 'Course Syllabus';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/scheme_helper.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';

$BASE = 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/';

$groups = [
  [
    'title' => 'Bachelor of Education (B.Ed. — 2-Year CBCS Degree)',
    'icon'  => 'fa-graduation-cap',
    'items' => [
      ['name' => 'First Semester (CBCS)',   'badge' => 'CBCS Scheme', 'desc' => 'B.Ed. First Semester Teaching Curriculum & Syllabus',  'url' => $BASE . 'SYLLABUS/CBCS%20SYLLABUS/bed_cbcs.pdf'],
      ['name' => 'Second Semester (CBCS)',  'badge' => 'CBCS Scheme', 'desc' => 'B.Ed. Second Semester Teaching Curriculum & Syllabus', 'url' => $BASE . 'SYLLABUS/CBCS%20SYLLABUS/BEDCII17SYL.pdf'],
      ['name' => 'Third Semester (CBCS)',   'badge' => 'CBCS Scheme', 'desc' => 'B.Ed. Third Semester Teaching Curriculum & Syllabus',  'url' => $BASE . 'SYLLABUS/CBCS%20SYLLABUS/Syllabus%20Education/SYBEDC_III.pdf'],
      ['name' => 'Fourth Semester (CBCS)',  'badge' => 'CBCS Scheme', 'desc' => 'B.Ed. Fourth Semester Teaching Curriculum & Syllabus', 'url' => $BASE . 'SYLLABUS/CBCS%20SYLLABUS/Syllabus%20Education/SYBEDC_IV.pdf'],
    ]
  ],
  [
    'title' => 'Bachelor of Education (B.Ed. — Non-CBCS / Yearly)',
    'icon'  => 'fa-chalkboard-user',
    'items' => [
      ['name' => 'First Semester / First Year',          'badge' => 'Non-CBCS', 'desc' => 'B.Ed. First Semester / First Year Syllabus',      'url' => $BASE . 'SYLLABUS/SYBEDNS_I.pdf'],
      ['name' => 'Second Year (III & IV Semester)',       'badge' => 'Non-CBCS', 'desc' => 'B.Ed. Second Year Teaching & Internship Modules', 'url' => $BASE . 'Curriculum/BABEd.pdf'],
    ]
  ],
  [
    'title' => 'B.A. B.Ed. — 4-Year Integrated Course (Year-wise CBCS)',
    'icon'  => 'fa-book-open-reader',
    'items' => [
      ['name' => 'First Year (Semesters I & II)',    'badge' => 'Integrated', 'desc' => 'B.A. B.Ed. Integrated 1st Year Syllabus', 'url' => $BASE . 'babed_Is_year__Ist_Sem_syllabus_2021--22_(1)_09072022_1214.pdf'],
      ['name' => 'Second Year (Semesters III & IV)', 'badge' => 'Integrated', 'desc' => 'B.A. B.Ed. Integrated 2nd Year Syllabus', 'url' => $BASE . 'SYLLABUS/CBCS%20SYLLABUS/Syllabus%20Education/SYBABed_III_IV.pdf'],
      ['name' => 'Third Year (Semesters V & VI)',    'badge' => 'Integrated', 'desc' => 'B.A. B.Ed. Integrated 3rd Year Syllabus', 'url' => $BASE . 'SYLLABUS/CBCS%20SYLLABUS/Syllabus%20Education/SYBABed_V_VI.pdf'],
      ['name' => 'Fourth Year (Semesters VII & VIII)', 'badge' => 'Integrated', 'desc' => 'B.A. B.Ed. Integrated 4th Year Syllabus', 'url' => $BASE . 'SYLLABUS/BA_BED_syllabus_VIII.pdf'],
    ]
  ],
  [
    'title' => 'B.A. B.Ed. — Semester-Wise Revised Syllabus',
    'icon'  => 'fa-list-check',
    'items' => [
      ['name' => 'First Semester (w.e.f. 2021-22)',   'badge' => 'Semester I',   'desc' => 'B.A. B.Ed. First Semester Syllabus',   'url' => $BASE . 'babed_Is_year__Ist_Sem_syllabus_2021--22_(1)_09072022_1214.pdf'],
      ['name' => 'Second Semester (w.e.f. 2021-22)',  'badge' => 'Semester II',  'desc' => 'B.A. B.Ed. Second Semester Syllabus',  'url' => $BASE . 'babed_syllabus_II_sem_2021-22_final_09072022_1214.pdf'],
      ['name' => 'Third Semester (w.e.f. 2022-23)',   'badge' => 'Semester III', 'desc' => 'B.A. B.Ed. Third Semester Syllabus',   'url' => $BASE . 'babed1_04112022_0415.pdf'],
      ['name' => 'Fourth Semester (w.e.f. 2022-23)',  'badge' => 'Semester IV',  'desc' => 'B.A. B.Ed. Fourth Semester Syllabus',  'url' => $BASE . 'SYLLABUS/babed%20II%20year%20syllabus2022-2023%20final..pdf'],
      ['name' => 'Fifth Semester (w.e.f. 2023-24)',   'badge' => 'Semester V',   'desc' => 'B.A. B.Ed. Fifth Semester Syllabus',   'url' => $BASE . 'syllabus%202023-24/babed%20III%20year%20V%20sem%20syllabus.pdf'],
      ['name' => 'Sixth Semester',                    'badge' => 'Semester VI',  'desc' => 'B.A. B.Ed. Sixth Semester Syllabus',   'url' => $BASE . 'SYLLABUS/BABED6.pdf'],
      ['name' => 'Seventh Semester',                  'badge' => 'Semester VII', 'desc' => 'B.A. B.Ed. Seventh Semester Syllabus', 'url' => $BASE . 'Curriculum/BABEd.pdf'],
      ['name' => 'Eighth Semester',                   'badge' => 'Semester VIII','desc' => 'B.A. B.Ed. Eighth Semester Syllabus',  'url' => $BASE . 'SYLLABUS/BA_BED_syllabus_VIII.pdf'],
    ]
  ]
];
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
  /* Group separator row */
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
                <i class="fa fa-graduation-cap me-1 text-secondary"></i> Course Syllabus
              </span>
              <h3 class="fw-bold mb-1" style="color: #0b2545; font-size: 1.45rem;">Faculty of Education Syllabus</h3>
              <p class="text-muted small mb-0">Official Course Curricula for B.Ed. and 4-Year Integrated B.A. B.Ed. Programmes.</p>
            </div>
            <div class="mt-2 mt-md-0">
              <span class="standard-badge text-dark">
                <i class="fa fa-check-circle text-success me-1"></i> NCTE Approved
              </span>
            </div>
          </div>

          <!-- Search & Filter Bar -->
          <div class="row g-2 mb-3 align-items-center">
            <div class="col-md-6 col-lg-5">
              <div class="input-group">
                <span class="input-group-text bg-white border-end-0" style="border-color:#cbd5e1;"><i class="fa fa-search text-muted"></i></span>
                <input type="text" id="schemeFilter" class="form-control border-start-0 ps-0 filter-input" placeholder="Search education course or semester...">
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
                    <i class="fa <?= $grp['icon'] ?> me-2"></i>
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
                    <span class="standard-badge me-2"><?= htmlspecialchars($item['badge']) ?></span>
                    <span class="text-muted small"><?= htmlspecialchars($item['desc']) ?></span>
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