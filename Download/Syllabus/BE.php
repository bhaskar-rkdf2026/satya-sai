<?php
$page_title   = 'Bachelor of Engineering (B.E. / B.Tech) - Course Syllabus - SSSUTMS';
$banner_title = 'Bachelor of Engineering (B.E. / B.Tech)';
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
    'title' => 'First Year Engineering — Common Curriculum (Group A & Group B)',
    'icon' => 'fa-shapes',
    'items' => 
    array (
      0 => 
      array (
        'name' => 'First Semester (Group A)',
        'badge' => 'AICTE',
        'desc' => 'B.E. Semester I (Group A: EE, ME, CM, EEE, Mining)',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/SYLLABUS/I_A_Syllabus.pdf',
      ),
      1 => 
      array (
        'name' => 'Second Semester (Group A)',
        'badge' => 'AICTE',
        'desc' => 'B.E. Semester II (Group A: EE, ME, CM, EEE, Mining)',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/SYLLABUS/II_A_Syllabus.pdf',
      ),
      2 => 
      array (
        'name' => 'First Semester (Group B)',
        'badge' => 'AICTE',
        'desc' => 'B.E. Semester I (Group B: CE, CSE, EC, EI, IT, AE)',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/SYLLABUS/I_B_Syllabus.pdf',
      ),
      3 => 
      array (
        'name' => 'Second Semester (Group B)',
        'badge' => 'AICTE',
        'desc' => 'B.E. Semester II (Group B: CE, CSE, EC, EI, IT, AE)',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/SYLLABUS/II_B_Syllabus.pdf',
      ),
    ),
  ),
  1 => 
  array (
    'title' => 'Civil Engineering (CE)',
    'icon' => 'fa-building',
    'items' => 
    array (
      0 => 
      array (
        'name' => 'Third Semester',
        'badge' => 'AICTE',
        'desc' => 'B.E. CE Semester III Syllabus',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/SYLLABUS/sesssion%202022-23/III%20SEM%20SYLLABUS.pdf',
      ),
      1 => 
      array (
        'name' => 'Fourth Semester',
        'badge' => 'AICTE',
        'desc' => 'B.E. CE Semester IV Syllabus',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/SYLLABUS/sesssion%202022-23/IV%20SEM%20SYLLABUS.pdf',
      ),
      2 => 
      array (
        'name' => 'Fifth Semester',
        'badge' => 'AICTE',
        'desc' => 'B.E. CE Semester V Syllabus',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/SYLLABUS/sesssion%202022-23/V%20SEM%20SYLLABUS.pdf',
      ),
      3 => 
      array (
        'name' => 'Sixth Semester',
        'badge' => 'AICTE',
        'desc' => 'B.E. CE Semester VI Syllabus',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/SYLLABUS/sesssion%202022-23/VI%20SEM%20SYLLABUS.pdf',
      ),
      4 => 
      array (
        'name' => 'Seventh Semester',
        'badge' => 'AICTE',
        'desc' => 'B.E. CE Semester VII Syllabus',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/SYLLABUS/sesssion%202022-23/VII%20SEM%20SYLLABUS.pdf',
      ),
      5 => 
      array (
        'name' => 'Eighth Semester',
        'badge' => 'AICTE',
        'desc' => 'B.E. CE Semester VIII Syllabus',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/SYLLABUS/sesssion%202022-23/VIII%20SEM%20SYLLABUS.pdf',
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
        'badge' => 'AICTE',
        'desc' => 'B.E. CSE Semester III Syllabus',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/SYLLABUS/CSE_III_SYLLABUS.pdf',
      ),
      1 => 
      array (
        'name' => 'Fourth Semester',
        'badge' => 'AICTE',
        'desc' => 'B.E. CSE Semester IV Syllabus',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/SYLLABUS/CSE_IV_SYLLABUS.pdf',
      ),
      2 => 
      array (
        'name' => 'Fifth Semester',
        'badge' => 'AICTE',
        'desc' => 'B.E. CSE Semester V Syllabus',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/SYLLABUS/SYLCS_V_D2020.pdf',
      ),
      3 => 
      array (
        'name' => 'Sixth Semester',
        'badge' => 'AICTE',
        'desc' => 'B.E. CSE Semester VI Syllabus',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/SYLLABUS/RSYLCS_VI_D2020.pdf',
      ),
      4 => 
      array (
        'name' => 'Seventh Semester',
        'badge' => 'AICTE',
        'desc' => 'B.E. CSE Semester VII Syllabus',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/SYLLABUS/AAICTE_BE_CSE_VII_SYL_R.pdf',
      ),
      5 => 
      array (
        'name' => 'Eighth Semester',
        'badge' => 'AICTE',
        'desc' => 'B.E. CSE Semester VIII Syllabus',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/SYLLABUS/AAICTE_BE_CSE_VIII_SYL_R.pdf',
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
        'badge' => 'AICTE',
        'desc' => 'B.E. EE Semester III Syllabus',
        'url' => $BASE . 'SYLLABUS/EE_III_SYLLABUS.pdf',
      ),
      1 => 
      array (
        'name' => 'Fourth Semester',
        'badge' => 'AICTE',
        'desc' => 'B.E. EE Semester IV Syllabus',
        'url' => $BASE . 'SYLLABUS/EE_IV_SYLLABUS.pdf',
      ),
      2 => 
      array (
        'name' => 'Fifth Semester',
        'badge' => 'AICTE',
        'desc' => 'B.E. EE Semester V Syllabus',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/SYLLABUS/SYLEE_V_D2020R.pdf',
      ),
      3 => 
      array (
        'name' => 'Sixth Semester',
        'badge' => 'AICTE',
        'desc' => 'B.E. EE Semester VI Syllabus',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/SYLLABUS/SYLEE_VI_D2020R.pdf',
      ),
      4 => 
      array (
        'name' => 'Seventh Semester',
        'badge' => 'AICTE',
        'desc' => 'B.E. EE Semester VII Syllabus',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/SYLLABUS/AAICTE_BE_EE_VII_SYL.pdf',
      ),
      5 => 
      array (
        'name' => 'Eighth Semester',
        'badge' => 'AICTE',
        'desc' => 'B.E. EE Semester VIII Syllabus',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/SYLLABUS/AAICTE_BE_EE_VIII_SYL.pdf',
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
        'badge' => 'AICTE',
        'desc' => 'B.E. ME Semester III Syllabus',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/SYLLABUS/ME_III_SYLLABUS.pdf',
      ),
      1 => 
      array (
        'name' => 'Fourth Semester',
        'badge' => 'AICTE',
        'desc' => 'B.E. ME Semester IV Syllabus',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/SYLLABUS/ME_IV_SYLLABUS.pdf',
      ),
      2 => 
      array (
        'name' => 'Fifth Semester',
        'badge' => 'AICTE',
        'desc' => 'B.E. ME Semester V Syllabus',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/SYLLABUS/SYLME_V_D2020.pdf',
      ),
      3 => 
      array (
        'name' => 'Sixth Semester',
        'badge' => 'AICTE',
        'desc' => 'B.E. ME Semester VI Syllabus',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/SYLLABUS/SYLME_VI_D2020.pdf',
      ),
      4 => 
      array (
        'name' => 'Seventh Semester',
        'badge' => 'AICTE',
        'desc' => 'B.E. ME Semester VII Syllabus',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/SYLLABUS/AAICTE_BE_ME_VII_SYL.pdf',
      ),
      5 => 
      array (
        'name' => 'Eighth Semester',
        'badge' => 'AICTE',
        'desc' => 'B.E. ME Semester VIII Syllabus',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/SYLLABUS/AAICTE_BE_ME_VIII_SYL.pdf',
      ),
    ),
  ),
  5 => 
  array (
    'title' => 'Other Engineering Branches (Aeronautical, Chemical, EC, EI, IT, Mining)',
    'icon' => 'fa-microchip',
    'items' => 
    array (
      0 => 
      array (
        'name' => 'Aeronautical Engineering (Sem III to VIII)',
        'badge' => 'AE',
        'desc' => 'Complete Syllabus for Aeronautical Engineering',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/SYLLABUS/AE_III_SYLLABUS.pdf',
      ),
      1 => 
      array (
        'name' => 'Chemical Engineering (Sem III to VIII)',
        'badge' => 'CM',
        'desc' => 'Complete Syllabus for Chemical Engineering',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/SYLLABUS/CM_III_SYLLABUS.pdf',
      ),
      2 => 
      array (
        'name' => 'Electronics & Communication (Sem III to VIII)',
        'badge' => 'EC',
        'desc' => 'Complete Syllabus for EC Engineering',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/SYLLABUS/ECE_III_SYLLABUS.pdf',
      ),
      3 => 
      array (
        'name' => 'Electronics & Instrumentation (Sem III to VIII)',
        'badge' => 'EI',
        'desc' => 'Complete Syllabus for EI Engineering',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/SYLLABUS/EI_III_SYLLABUS.pdf',
      ),
      4 => 
      array (
        'name' => 'Information Technology (Sem III to VIII)',
        'badge' => 'IT',
        'desc' => 'Complete Syllabus for IT Engineering',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/SYLLABUS/IT_III_SYLLABUS.pdf',
      ),
      5 => 
      array (
        'name' => 'Mining Engineering (Sem III to VIII)',
        'badge' => 'MI',
        'desc' => 'Complete Syllabus for Mining Engineering',
        'url' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/SYLLABUS/MI_III_SYLLABUS.pdf',
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