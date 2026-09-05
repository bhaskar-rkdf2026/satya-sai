<?php
$page_title   = 'Master of Technology (M.Tech) - Course Syllabus - SSSUTMS';
$banner_title = 'Master of Technology (M.Tech)';
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
    'title' => 'Computer Science & Engineering (CSE)',
    'icon'  => 'fa-laptop-code',
    'items' => [
      ['name' => 'Complete M.Tech CSE Syllabus', 'badge' => 'M.Tech', 'desc' => 'M.Tech CSE Complete Course Curriculum & Syllabus', 'url' => $BASE . 'Curriculum/MTECH_CSE.pdf'],
      ['name' => 'Second Semester',              'badge' => 'M.Tech', 'desc' => 'M.Tech CSE Second Semester Syllabus',               'url' => $BASE . 'SYLLABUS/SY_MCSE_II.pdf'],
      ['name' => 'Third Semester',               'badge' => 'M.Tech', 'desc' => 'M.Tech CSE Third Semester Syllabus',                'url' => $BASE . 'SYLLABUS/SYCSE_III.pdf'],
    ]
  ],
  [
    'title' => 'Computer Technology & Application (CTA)',
    'icon'  => 'fa-microchip',
    'items' => [
      ['name' => 'First Semester',               'badge' => 'M.Tech', 'desc' => 'M.Tech CTA First Semester Syllabus',                'url' => $BASE . 'SYLLABUS/SY_MTCTA_I.pdf'],
      ['name' => 'Second Semester',              'badge' => 'M.Tech', 'desc' => 'M.Tech CTA Second Semester Syllabus',               'url' => $BASE . 'SYLLABUS/SY_MCTA_II.pdf'],
      ['name' => 'Complete M.Tech CTA Syllabus', 'badge' => 'M.Tech', 'desc' => 'M.Tech CTA Complete Course Curriculum & Syllabus', 'url' => $BASE . 'Curriculum/MTECH_CTA.pdf'],
    ]
  ],
  [
    'title' => 'Digital Communication (DC)',
    'icon'  => 'fa-satellite-dish',
    'items' => [
      ['name' => 'First Semester',               'badge' => 'M.Tech', 'desc' => 'M.Tech DC First Semester Syllabus',                 'url' => $BASE . 'SYLLABUS/SY_MTDC_I.pdf'],
      ['name' => 'Second Semester',              'badge' => 'M.Tech', 'desc' => 'M.Tech DC Second Semester Syllabus',                'url' => $BASE . 'SYLLABUS/SY_DC_II.pdf'],
      ['name' => 'Third Semester',               'badge' => 'M.Tech', 'desc' => 'M.Tech DC Third Semester Syllabus',                 'url' => $BASE . 'SYLLABUS/SyllabusIIIsem/Syllabus2015/MTECH/SYDC_III.pdf'],
    ]
  ],
  [
    'title' => 'Electrical Power System (EPS)',
    'icon'  => 'fa-bolt',
    'items' => [
      ['name' => 'First Semester',               'badge' => 'M.Tech', 'desc' => 'M.Tech EPS First Semester Syllabus',                'url' => $BASE . 'SYLLABUS/SY_MTEPS_I.pdf'],
      ['name' => 'Second Semester',              'badge' => 'M.Tech', 'desc' => 'M.Tech EPS Second Semester Syllabus',               'url' => $BASE . 'SYLLABUS/SY_EPS_II.pdf'],
      ['name' => 'Third Semester',               'badge' => 'M.Tech', 'desc' => 'M.Tech EPS Third Semester Syllabus',                'url' => $BASE . 'SYLLABUS/SyllabusIIIsem/Syllabus2015/MTECH/SYEPS_III.pdf'],
    ]
  ],
  [
    'title' => 'Industrial Design (ID)',
    'icon'  => 'fa-compass-drafting',
    'items' => [
      ['name' => 'First Semester',               'badge' => 'M.Tech', 'desc' => 'M.Tech ID First Semester Syllabus',                 'url' => $BASE . 'SYLLABUS/SY_MTID_I.pdf'],
      ['name' => 'Second Semester',              'badge' => 'M.Tech', 'desc' => 'M.Tech ID Second Semester Syllabus',                'url' => $BASE . 'SYLLABUS/SY_ID_II.pdf'],
      ['name' => 'Third Semester',               'badge' => 'M.Tech', 'desc' => 'M.Tech ID Third Semester Syllabus',                 'url' => $BASE . 'SyllabusIIIsem/SYID_III.pdf'],
    ]
  ],
  [
    'title' => 'Information Technology (IT)',
    'icon'  => 'fa-network-wired',
    'items' => [
      ['name' => 'First Semester',               'badge' => 'M.Tech', 'desc' => 'M.Tech IT First Semester Syllabus',                 'url' => $BASE . 'SYLLABUS/SY_MTIT_I.pdf'],
      ['name' => 'Second Semester',              'badge' => 'M.Tech', 'desc' => 'M.Tech IT Second Semester Syllabus',                'url' => $BASE . 'SYLLABUS/SY_MIT_II.pdf'],
      ['name' => 'Third Semester',               'badge' => 'M.Tech', 'desc' => 'M.Tech IT Third Semester Syllabus',                 'url' => $BASE . 'SYLLABUS/SYIT_III.pdf'],
    ]
  ],
  [
    'title' => 'Power Electronics (PE)',
    'icon'  => 'fa-plug',
    'items' => [
      ['name' => 'First Semester',               'badge' => 'M.Tech', 'desc' => 'M.Tech PE First Semester Syllabus',                 'url' => $BASE . 'SYLLABUS/SY_MTPE_I.pdf'],
      ['name' => 'Second Semester',              'badge' => 'M.Tech', 'desc' => 'M.Tech PE Second Semester Syllabus',                'url' => $BASE . 'SYLLABUS/SY_PE_II.pdf'],
      ['name' => 'Third Semester',               'badge' => 'M.Tech', 'desc' => 'M.Tech PE Third Semester Syllabus',                 'url' => $BASE . 'SYLLABUS/SyllabusIIIsem/Syllabus2015/MTECH/SYPE_III.pdf'],
    ]
  ],
  [
    'title' => 'Structural Design (SD)',
    'icon'  => 'fa-building',
    'items' => [
      ['name' => 'First Semester',               'badge' => 'M.Tech', 'desc' => 'M.Tech SD First Semester Syllabus',                 'url' => $BASE . 'SYLLABUS/SY_MTSD_I.pdf'],
      ['name' => 'Second Semester',              'badge' => 'M.Tech', 'desc' => 'M.Tech SD Second Semester Syllabus',                'url' => $BASE . 'SYLLABUS/SY_SD_II.pdf'],
      ['name' => 'Third Semester',               'badge' => 'M.Tech', 'desc' => 'M.Tech SD Third Semester Syllabus',                 'url' => $BASE . 'SYLLABUS/SyllabusIIIsem/Syllabus2015/MTECH/SYSD_III.pdf'],
    ]
  ],
  [
    'title' => 'Software Engineering (SE)',
    'icon'  => 'fa-code-branch',
    'items' => [
      ['name' => 'First Semester',               'badge' => 'M.Tech', 'desc' => 'M.Tech SE First Semester Syllabus',                 'url' => $BASE . 'SYLLABUS/SY_MTSE_I.pdf'],
      ['name' => 'Second Semester',              'badge' => 'M.Tech', 'desc' => 'M.Tech SE Second Semester Syllabus',                'url' => $BASE . 'SYLLABUS/SY_MSE_II.pdf'],
      ['name' => 'Third Semester',               'badge' => 'M.Tech', 'desc' => 'M.Tech SE Third Semester Syllabus',                 'url' => $BASE . 'SYLLABUS/SyllabusIIIsem/Syllabus2015/MTECH/SYMSE_III.pdf'],
    ]
  ],
  [
    'title' => 'Thermal Engineering (TH)',
    'icon'  => 'fa-fire-flame-curved',
    'items' => [
      ['name' => 'First Semester',               'badge' => 'M.Tech', 'desc' => 'M.Tech TH First Semester Syllabus',                 'url' => $BASE . 'SYLLABUS/SY_MTTH_I.pdf'],
      ['name' => 'Second Semester',              'badge' => 'M.Tech', 'desc' => 'M.Tech TH Second Semester Syllabus',                'url' => $BASE . 'SYLLABUS/SY_TH_II.pdf'],
      ['name' => 'Third Semester',               'badge' => 'M.Tech', 'desc' => 'M.Tech TH Third Semester Syllabus',                 'url' => $BASE . 'SYLLABUS/SyllabusIIIsem/Syllabus2015/MTECH/SYTH_III.pdf'],
    ]
  ],
  [
    'title' => 'VLSI Design (VLSI)',
    'icon'  => 'fa-cubes',
    'items' => [
      ['name' => 'First Semester',               'badge' => 'M.Tech', 'desc' => 'M.Tech VLSI First Semester Syllabus',               'url' => $BASE . 'SYLLABUS/MTech/SY_MTVLSI_I.pdf'],
      ['name' => 'Second Semester',              'badge' => 'M.Tech', 'desc' => 'M.Tech VLSI Second Semester Syllabus',              'url' => $BASE . 'SYLLABUS/SY_VLSI_II.pdf'],
      ['name' => 'Third Semester',               'badge' => 'M.Tech', 'desc' => 'M.Tech VLSI Third Semester Syllabus',               'url' => $BASE . 'SYLLABUS/SyllabusIIIsem/Syllabus2015/MTECH/SYVL_III.pdf'],
    ]
  ],
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
                <i class="fa fa-book-open-reader me-1 text-secondary"></i> Postgraduate Engineering
              </span>
              <h3 class="fw-bold mb-1" style="color: #0b2545; font-size: 1.45rem;">Master of Technology (M.Tech)</h3>
              <p class="text-muted small mb-0">Official Course Curricula for All 11 Postgraduate Engineering Disciplines.</p>
            </div>
            <div class="mt-2 mt-md-0">
              <span class="standard-badge text-dark">
                <i class="fa fa-check-circle text-success me-1"></i> AICTE Approved
              </span>
            </div>
          </div>

          <!-- Search & Filter Bar -->
          <div class="row g-2 mb-3 align-items-center">
            <div class="col-md-6 col-lg-5">
              <div class="input-group">
                <span class="input-group-text bg-white border-end-0" style="border-color:#cbd5e1;"><i class="fa fa-search text-muted"></i></span>
                <input type="text" id="schemeFilter" class="form-control border-start-0 ps-0 filter-input" placeholder="Search M.Tech branch or semester...">
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