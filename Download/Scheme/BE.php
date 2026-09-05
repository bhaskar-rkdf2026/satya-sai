<?php
$page_title   = 'Bachelor of Engineering (B.E.) - Curriculum Scheme - SSSUTMS';
$banner_title = 'Bachelor of Engineering (B.E. / B.Tech)';
$banner_category = 'Curriculum Scheme';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/scheme_helper.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';

$BASE = 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/';

$groups = [
  [
    'title' => 'Civil Engineering (CE) — AICTE & CBCS Scheme',
    'icon'  => 'fa-building',
    'items' => [
      ['name' => 'First Semester (Group B)',   'badge' => 'AICTE', 'desc' => 'B.E. Civil Engineering Semester I Scheme',   'url' => $BASE . 'SCHEME/I_B_Scheme.pdf'],
      ['name' => 'Second Semester (Group B)',  'badge' => 'AICTE', 'desc' => 'B.E. Civil Engineering Semester II Scheme',  'url' => $BASE . 'SCHEME/II_B_Scheme.pdf'],
      ['name' => 'Third Semester',             'badge' => 'AICTE', 'desc' => 'B.E. Civil Engineering Semester III Scheme', 'url' => $BASE . 'SCHEME/sesssion%202022-23/III%20SEM%20SCHEME.pdf'],
      ['name' => 'Fourth Semester',            'badge' => 'AICTE', 'desc' => 'B.E. Civil Engineering Semester IV Scheme',  'url' => $BASE . 'SCHEME/sesssion%202022-23/IV%20SEM%20SCHEME.pdf'],
      ['name' => 'Fifth Semester',             'badge' => 'AICTE', 'desc' => 'B.E. Civil Engineering Semester V Scheme',   'url' => $BASE . 'SCHEME/sesssion%202022-23/V%20SEM%20SCHEME.pdf'],
      ['name' => 'Sixth Semester',             'badge' => 'AICTE', 'desc' => 'B.E. Civil Engineering Semester VI Scheme',  'url' => $BASE . 'SCHEME/sesssion%202022-23/VI%20SEM%20SCHEME.pdf'],
      ['name' => 'Seventh Semester',           'badge' => 'AICTE', 'desc' => 'B.E. Civil Engineering Semester VII Scheme', 'url' => $BASE . 'SCHEME/sesssion%202022-23/VII%20SEM%20SCHEME.pdf'],
      ['name' => 'Eighth Semester',            'badge' => 'AICTE', 'desc' => 'B.E. Civil Engineering Semester VIII Scheme','url' => $BASE . 'SCHEME/sesssion%202022-23/VIII%20SEM%20SCHEME.pdf'],
    ]
  ],
  [
    'title' => 'Computer Science & Engineering (CSE) — AICTE & CBCS Scheme',
    'icon'  => 'fa-laptop-code',
    'items' => [
      ['name' => 'First Semester (Group B)',   'badge' => 'AICTE', 'desc' => 'B.E. CSE Semester I Scheme',   'url' => $BASE . 'SCHEME/I_B_Scheme.pdf'],
      ['name' => 'Second Semester (Group B)',  'badge' => 'AICTE', 'desc' => 'B.E. CSE Semester II Scheme',  'url' => $BASE . 'SCHEME/II_B_Scheme.pdf'],
      ['name' => 'Third Semester',             'badge' => 'AICTE', 'desc' => 'B.E. CSE Semester III Scheme', 'url' => $BASE . 'SCHEME/CSE_III_SCHEME.pdf'],
      ['name' => 'Fourth Semester',            'badge' => 'AICTE', 'desc' => 'B.E. CSE Semester IV Scheme',  'url' => $BASE . 'SCHEME/CSE_IV_SCHEME.pdf'],
      ['name' => 'Fifth Semester',             'badge' => 'AICTE', 'desc' => 'B.E. CSE Semester V Scheme',   'url' => $BASE . 'SCHEME/SCCS_V_D2020.pdf'],
      ['name' => 'Sixth Semester',             'badge' => 'AICTE', 'desc' => 'B.E. CSE Semester VI Scheme',  'url' => $BASE . 'SCHEME/RSCCS_VI_D2020.pdf'],
      ['name' => 'Seventh Semester',           'badge' => 'AICTE', 'desc' => 'B.E. CSE Semester VII Scheme', 'url' => $BASE . 'SCHEME/AAICTE_BE_CSE_VII_SC_R.pdf'],
      ['name' => 'Eighth Semester',            'badge' => 'AICTE', 'desc' => 'B.E. CSE Semester VIII Scheme','url' => $BASE . 'SCHEME/AAICTE_BE_CSE_VIII_SC_R.pdf'],
    ]
  ],
  [
    'title' => 'Electrical Engineering (EE) — AICTE & CBCS Scheme',
    'icon'  => 'fa-bolt',
    'items' => [
      ['name' => 'First Semester (Group A)',   'badge' => 'AICTE', 'desc' => 'B.E. EE Semester I Scheme',   'url' => $BASE . 'SCHEMES/CBCS%20SCHEME/Scheme%20BE/2019/I_A_Scheme.pdf'],
      ['name' => 'Second Semester (Group A)',  'badge' => 'AICTE', 'desc' => 'B.E. EE Semester II Scheme',  'url' => $BASE . 'SCHEMES/CBCS%20SCHEME/Scheme%20BE/2019/II_A_Scheme.pdf'],
      ['name' => 'Third Semester',             'badge' => 'AICTE', 'desc' => 'B.E. EE Semester III Scheme', 'url' => $BASE . 'SCHEMES/CBCS%20SCHEME/Scheme%20BE/R2019/EE_III_SCHEME.pdf'],
      ['name' => 'Fourth Semester',            'badge' => 'AICTE', 'desc' => 'B.E. EE Semester IV Scheme',  'url' => $BASE . 'SCHEMES/CBCS%20SCHEME/Scheme%20BE/R2019/EE_IV_SCHEME.pdf'],
      ['name' => 'Fifth Semester',             'badge' => 'AICTE', 'desc' => 'B.E. EE Semester V Scheme',   'url' => $BASE . 'SCHEME/SCEE_V_D2020R.pdf'],
      ['name' => 'Sixth Semester',             'badge' => 'AICTE', 'desc' => 'B.E. EE Semester VI Scheme',  'url' => $BASE . 'SCHEME/SCEE_VI_D2020R.pdf'],
      ['name' => 'Seventh Semester',           'badge' => 'AICTE', 'desc' => 'B.E. EE Semester VII Scheme', 'url' => $BASE . 'SCHEME/AAICTE_BE_EE_VII_SC.pdf'],
      ['name' => 'Eighth Semester',            'badge' => 'AICTE', 'desc' => 'B.E. EE Semester VIII Scheme','url' => $BASE . 'SCHEME/AAICTE_BE_EE_VIII_SC.pdf'],
    ]
  ],
  [
    'title' => 'Mechanical Engineering (ME) — AICTE & CBCS Scheme',
    'icon'  => 'fa-gear',
    'items' => [
      ['name' => 'First Semester (Group A)',   'badge' => 'AICTE', 'desc' => 'B.E. ME Semester I Scheme',   'url' => $BASE . 'SCHEME/I_A_Scheme.pdf'],
      ['name' => 'Second Semester (Group A)',  'badge' => 'AICTE', 'desc' => 'B.E. ME Semester II Scheme',  'url' => $BASE . 'SCHEME/II_A_Scheme.pdf'],
      ['name' => 'Third Semester',             'badge' => 'AICTE', 'desc' => 'B.E. ME Semester III Scheme', 'url' => $BASE . 'SCHEME/ME_III_SCHEME.pdf'],
      ['name' => 'Fourth Semester',            'badge' => 'AICTE', 'desc' => 'B.E. ME Semester IV Scheme',  'url' => $BASE . 'SCHEME/ME_IV_SCHEME.pdf'],
      ['name' => 'Fifth Semester',             'badge' => 'AICTE', 'desc' => 'B.E. ME Semester V Scheme',   'url' => $BASE . 'SCHEME/SCME_V_D2020.pdf'],
      ['name' => 'Sixth Semester',             'badge' => 'AICTE', 'desc' => 'B.E. ME Semester VI Scheme',  'url' => $BASE . 'SCHEME/SCME_VI_D2020.pdf'],
      ['name' => 'Seventh Semester',           'badge' => 'AICTE', 'desc' => 'B.E. ME Semester VII Scheme', 'url' => $BASE . 'SCHEME/AAICTE_BE_ME_VII_SC.pdf'],
      ['name' => 'Eighth Semester',            'badge' => 'AICTE', 'desc' => 'B.E. ME Semester VIII Scheme','url' => $BASE . 'SCHEME/AAICTE_BE_ME_VIII_SC.pdf'],
    ]
  ],
  [
    'title' => 'Other Engineering Branches (Aeronautical, Chemical, EC, EI, IT, Mining)',
    'icon'  => 'fa-microchip',
    'items' => [
      ['name' => 'Aeronautical Engineering (Sem III to VIII)',    'badge' => 'AE Scheme', 'desc' => 'Complete Scheme for Aeronautical Engineering', 'url' => $BASE . 'SCHEME/AE_III_SCHEME.pdf'],
      ['name' => 'Chemical Engineering (Sem III to VIII)',        'badge' => 'CM Scheme', 'desc' => 'Complete Scheme for Chemical Engineering',     'url' => $BASE . 'SCHEME/CM_III_SCHEME.pdf'],
      ['name' => 'Electronics & Communication (Sem III to VIII)',  'badge' => 'EC Scheme', 'desc' => 'Complete Scheme for EC Engineering',           'url' => $BASE . 'SCHEME/ECE_III_SCHEME.pdf'],
      ['name' => 'Electronics & Instrumentation (Sem III to VIII)','badge' => 'EI Scheme', 'desc' => 'Complete Scheme for EI Engineering',           'url' => $BASE . 'SCHEME/EI_III_SCHEME.pdf'],
      ['name' => 'Information Technology (Sem III to VIII)',       'badge' => 'IT Scheme', 'desc' => 'Complete Scheme for IT Engineering',           'url' => $BASE . 'SCHEME/IT_III_SCHEME.pdf'],
      ['name' => 'Mining Engineering (Sem III to VIII)',          'badge' => 'MI Scheme', 'desc' => 'Complete Scheme for Mining Engineering',       'url' => $BASE . 'SCHEME/MI_III_SCHEME.pdf'],
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
                <i class="fa fa-graduation-cap me-1 text-secondary"></i> Engineering &amp; Technology
              </span>
              <h3 class="fw-bold mb-1" style="color: #0b2545; font-size: 1.45rem;">Bachelor of Engineering (B.E. / B.Tech)</h3>
              <p class="text-muted small mb-0">AICTE Approved 4-Year Engineering Degree Schemes for All Disciplines &amp; Batches.</p>
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
                <input type="text" id="schemeFilter" class="form-control border-start-0 ps-0 filter-input" placeholder="Search engineering branch...">
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
                  <th style="width: 32%;">Discipline / Semester</th>
                  <th style="width: 44%;">Details &amp; Structure</th>
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