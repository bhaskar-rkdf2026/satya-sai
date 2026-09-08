<?php
$page_title = 'Polytechnic Diploma Engineering - Teaching & Examination Scheme - SSSUTMS';
$banner_title = 'Diploma Engineering (Polytechnic)';
$banner_category = 'Teaching & Examination Scheme';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
  .scheme-header-card {
    background: #ffffff;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0, 43, 91, 0.08);
    border: 1px solid #e2e8f0;
    position: relative;
    overflow: hidden;
  }
  .scheme-header-card::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #002B5B 0%, #1a569c 100%);
  }
  .scheme-badge {
    background-color: #0b2545;
    color: #ffffff;
    font-size: 0.8rem;
    font-weight: 600;
    padding: 6px 14px;
    border-radius: 50px;
    letter-spacing: 0.5px;
    display: inline-flex;
    align-items: center;
    gap: 6px;
  }
  .scheme-section-card {
    background: #ffffff;
    border-radius: 10px;
    box-shadow: 0 3px 14px rgba(0, 0, 0, 0.04);
    border: 1px solid #e2e8f0;
    overflow: hidden;
    margin-bottom: 25px;
  }
  .scheme-section-header {
    background: #f8fafc;
    border-bottom: 1px solid #e2e8f0;
    padding: 14px 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 10px;
  }
  .scheme-section-title {
    color: #0b2545;
    font-weight: 700;
    font-size: 1.05rem;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 8px;
  }
  .scheme-section-badge {
    background: #e2e8f0;
    color: #0b2545;
    font-size: 0.78rem;
    font-weight: 600;
    padding: 4px 10px;
    border-radius: 6px;
  }
  .scheme-table {
    margin-bottom: 0;
    font-size: 0.92rem;
  }
  .scheme-table thead th, .scheme-table tr.table-header-row th, .scheme-table tr.table-header-row td {
    background: #0b2545 !important;
    color: #ffffff !important;
    font-weight: 600;
    text-align: center;
    vertical-align: middle;
    padding: 12px 10px;
    border-color: #134074 !important;
    font-size: 0.88rem;
    letter-spacing: 0.3px;
  }
  .scheme-table tbody td {
    padding: 12px 10px;
    vertical-align: middle;
    border-color: #e2e8f0;
    color: #334155;
  }
  .scheme-table tbody tr:nth-of-type(even) {
    background-color: #f8fafc;
  }
  .scheme-table tbody tr:hover {
    background-color: #f1f5f9;
  }
  .course-chip {
    display: inline-block;
    background: #f1f5f9;
    color: #0b2545;
    font-weight: 600;
    font-size: 0.85rem;
    padding: 4px 10px;
    border-radius: 6px;
    border: 1px solid #cbd5e1;
  }
  .download-btn {
    background: #0b2545;
    color: #ffffff !important;
    font-weight: 500;
    font-size: 0.82rem;
    padding: 5px 12px;
    border-radius: 6px;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    text-decoration: none !important;
    transition: all 0.2s ease;
    white-space: nowrap;
    margin: 2px 2px;
    box-shadow: 0 2px 4px rgba(11,37,69,0.15);
  }
  .download-btn:hover {
    background: #134074;
    color: #ffffff !important;
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(11,37,69,0.25);
  }
  .download-btn i {
    color: #ff7675;
    font-size: 0.95rem;
  }
  .download-btn i.fa-file-archive {
    color: #fdcb6e;
  }
  .scheme-filter-bar {
    background: #ffffff;
    border-radius: 10px;
    padding: 14px 20px;
    border: 1px solid #e2e8f0;
    box-shadow: 0 2px 8px rgba(0,0,0,0.03);
  }
  .search-input-group {
    position: relative;
    max-width: 380px;
    width: 100%;
  }
  .search-input-group input {
    border-radius: 8px;
    padding-left: 38px;
    border: 1px solid #cbd5e1;
    font-size: 0.9rem;
  }
  .search-input-group input:focus {
    border-color: #002B5B;
    box-shadow: 0 0 0 3px rgba(0, 43, 91, 0.15);
  }
  .search-input-group i {
    position: absolute;
    left: 12px;
    top: 50%;
    transform: translateY(-50%);
    color: #94a3b8;
  }
</style>

<section class="subpage-main-section py-4 bg-light">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        
        <!-- Header Banner Card -->
        <div class="scheme-header-card p-4 mb-4">
          <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-2">
            <span class="scheme-badge">
              <i class="fa fa-book"></i> POLYTECHNIC DIVISION
            </span>
            <span class="badge bg-light text-dark border px-3 py-2">
              <i class="fa fa-university me-1 text-primary"></i> SSSUTMS
            </span>
          </div>
          <h2 class="h3 fw-bold text-dark mt-2 mb-1" style="color: #0b2545 !important;">Diploma Engineering (Polytechnic)</h2>
          <p class="text-muted mb-0">AICTE Curriculum Diploma Engineering Examination Schemes</p>
        </div>

        <!-- Filter & Search Bar -->
        <div class="scheme-filter-bar mb-4 d-flex flex-wrap align-items-center justify-content-between gap-3">
          <div class="search-input-group">
            <i class="fa fa-search"></i>
            <input type="text" id="schemeSearch" class="form-control" placeholder="Search branch, course, or semester...">
          </div>
          <div class="text-muted small">
            <i class="fa fa-info-circle me-1 text-primary"></i> Click any semester button to view/download syllabus scheme.
          </div>
        </div>

        <!-- Scheme Content -->
                <!-- Scheme Section Card -->
        <div class="scheme-section-card">
          <div class="scheme-section-header">
            <h5 class="scheme-section-title">
              <i class="fa fa-graduation-cap text-primary"></i> mso-fareast-language:EN-US;}
            </h5>
            <span class="scheme-section-badge">Examination Scheme</span>
          </div>
          <div class="p-0">
            <div class="table-responsive">
              <table class="table table-bordered table-hover align-middle scheme-table mb-0">
<thead><tr class="table-header-row">
<td rowspan="2">
COURSE
</td>
<td rowspan="2">
BRANCH
</td>
<td colspan="3">
SEMESTER
</td>
</tr></thead><tbody><tr>
<td>
I Year
</td>
<td>
II Year
</td>
<td>
III Year
</td>
</tr>
<tr>
<td>
&nbsp;
</td>
<td>
<strong>&nbsp;</strong>
</td>
<td>
&nbsp;
</td>
<td rowspan="2">
<a href="<?= base_url('assets/images/Files/Link/POLY(ENGINEERING)/schme aicte/SCHPOLY(CM)_III sem.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> III Sem</a>
</td>
<td rowspan="2">
<a href="<?= base_url('assets/images/Files/Link/POLY(ENGINEERING)/schme aicte/V_Semester New CM.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> V&nbsp;Sem</a>
</td>
</tr>
<tr>
<td>
&nbsp;
</td>
<td rowspan="2">
<strong>Chemical Engineering</strong>
</td>
<td>
&nbsp;
</td>
</tr>
<tr>
<td>
&nbsp;
</td>
<td>
&nbsp;
</td>
<td rowspan="2">
<a href="<?= base_url('assets/images/Files/Link/POLY(ENGINEERING)/schme aicte/SCHPOLY(CM) _IV sem.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> IV&nbsp;Sem</a>
</td>
<td rowspan="2">
<a href="<?= base_url('assets/images/Files/Link/POLY(ENGINEERING)/DEngg VI/VI CM scheme.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> VI Sem</a>
</td>
</tr>
<tr>
<td>
&nbsp;
</td>
<td>
<strong>&nbsp;</strong>
</td>
<td>
&nbsp;
</td>
</tr>
<tr>
<td>
&nbsp;
</td>
<td>
<strong>&nbsp;</strong>
</td>
<td>
<strong>&nbsp;</strong>
</td>
<td rowspan="2">
<a href="<?= base_url('assets/images/Files/Link/POLY(ENGINEERING)/schme aicte/SCHPOLY(CE)_III sem.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> III Sem</a>
</td>
<td rowspan="2">
<a href="<?= base_url('assets/images/Files/Link/POLY(ENGINEERING)/schme aicte/V_Semester New CE.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> V&nbsp;Sem</a>
</td>
</tr>
<tr>
<td>
&nbsp;
</td>
<td rowspan="2">
<strong>Civil Engineering</strong>
</td>
<td>
<strong>Common to all</strong>
</td>
</tr>
<tr>
<td>
&nbsp;
</td>
<td>
<a href="<?= base_url('assets/images/Files/Link/POLY(ENGINEERING)/SCHPOLY_I.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> I&nbsp;Sem</a>
</td>
<td rowspan="2">
<a href="<?= base_url('assets/images/Files/Link/POLY(ENGINEERING)/schme aicte/SCHPOLY(CE) _IV sem.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> IV&nbsp;Sem</a>
</td>
<td rowspan="2">
<a href="<?= base_url('assets/images/Files/Link/POLY(ENGINEERING)/DEngg VI/VI CE Scheme.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> VI Sem</a>
</td>
</tr>
<tr>
<td>
&nbsp;
</td>
<td>
<strong>&nbsp;</strong>
</td>
<td>
<strong>&amp;</strong>
</td>
</tr>
<tr>
<td>
<strong>DIPLOMA</strong>
<strong> ENGINEERING</strong>
</td>
<td>&nbsp;</td>
<td>
&nbsp;
</td>
<td rowspan="2">
<a href="<?= base_url('assets/images/Files/Link/POLY(ENGINEERING)/schme aicte/SCHPOLY(CS)_III sem.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> III Sem</a>
</td>
<td rowspan="2">
<a href="<?= base_url('assets/images/Files/Link/POLY(ENGINEERING)/schme aicte/V_Semester New Cs.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> V&nbsp;Sem</a>
</td>
</tr>
<tr>
<td>
&nbsp;
</td>
<td>
<strong>Computer Science and Engineering</strong>
</td>
<td>
&nbsp;<a href="<?= base_url('assets/images/Files/Link/POLY(ENGINEERING)/SCHPOLY_I.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> II&nbsp;Sem</a>&nbsp;
</td>
</tr>
<tr>
<td>
&nbsp;
</td>
<td>
<strong>&nbsp;</strong>
</td>
<td>
&nbsp;
</td>
<td>
<a href="<?= base_url('assets/images/Files/Link/POLY(ENGINEERING)/schme aicte/SCHPOLY(CS) _IV sem.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> IV&nbsp;Sem</a>
</td>
<td>
<a href="<?= base_url('assets/images/Files/Link/VI_Semester_New_Cs_14042026_0355.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> VI Sem</a>
</td>
</tr>
<tr>
<td>
&nbsp;
</td>
<td>
<strong>&nbsp;</strong>
</td>
<td>
&nbsp;
</td>
<td rowspan="2">
<a href="<?= base_url('assets/images/Files/Link/POLY(ENGINEERING)/schme aicte/SCHPOLY (EE)_III sem.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> III Sem</a>
</td>
<td rowspan="2">
<a href="<?= base_url('assets/images/Files/Link/Poly_Ee_V__sem_Scheme_16102025_0221.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> V&nbsp;Sem</a>
</td>
</tr>
<tr>
<td>
&nbsp;
</td>
<td>
<strong>Electrical Engineering</strong>
</td>
<td>
&nbsp;
</td>
</tr>
<tr>
<td rowspan="5">
&nbsp;
</td>
<td>
<strong>&nbsp;</strong>
</td>
<td rowspan="5">
&nbsp;
</td>
<td>
<a href="<?= base_url('assets/images/Files/Link/POLY(ENGINEERING)/schme aicte/SCHPOLY(EE) _IV sem.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> IV&nbsp;Sem</a>
</td>
<td>
<a href="<?= base_url('assets/images/Files/Link/VI_EE_scheme_15022026_1251.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> VI Sem</a>
</td>
</tr>
<tr>
<td>
<strong>&nbsp;</strong>
</td>
<td rowspan="2">
<a href="<?= base_url('assets/images/Files/Link/POLY(ENGINEERING)/schme aicte/SCHPOLY (ME)_III sem.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> III Sem</a>
</td>
<td rowspan="2">
<a href="<?= base_url('assets/images/Files/Link/POLY(ENGINEERING)/schme aicte/V_Semester New ME.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> V&nbsp;Sem</a>
</td>
</tr>
<tr>
<td>
<strong>Mechanical Engineering</strong>
</td>
</tr>
<tr>
<td>
<strong>&nbsp;</strong>
</td>
<td rowspan="2">
<a href="<?= base_url('assets/images/Files/Link/POLY(ENGINEERING)/schme aicte/SCHPOLY(ME) _IV sem.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> IV&nbsp;Sem</a>
</td>
<td rowspan="2">
<a href="<?= base_url('assets/images/Files/Link/POLY(ENGINEERING)/DEngg VI/VI ME scheme.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> VI Sem</a>
</td>
</tr>
<tr>
<td>
<strong>&nbsp;</strong>
</td>
</tr>
</tbody>
</table>
            </div>
          </div>
        </div>
        <!-- Scheme Section Card -->
        <div class="scheme-section-card">
          <div class="scheme-section-header">
            <h5 class="scheme-section-title">
              <i class="fa fa-graduation-cap text-primary"></i> &amp;nbsp;
            </h5>
            <span class="scheme-section-badge">Examination Scheme</span>
          </div>
          <div class="p-0">
            <div class="table-responsive">
              <table class="table table-bordered table-hover align-middle scheme-table mb-0">
<thead><tr class="table-header-row">
<td rowspan="2">
&nbsp;
<span style="text-rendering: optimizelegibility;">COURSE</span>
</td>
<td rowspan="2">
&nbsp;
<span style="text-rendering: optimizelegibility;">BRANCH</span>
</td>
<td colspan="3">
<span style="text-rendering: optimizelegibility;">SEMESTER</span>
</td>
</tr></thead><tbody><tr>
<td>
I Year
</td>
<td>
II Year
</td>
<td>
III Year
</td>
</tr>
<tr>
<td rowspan="5">
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
DIPLOMA ENGINEERING
</td>
<td>
<strong><span style="text-rendering: optimizelegibility;">&nbsp;</span></strong>
<strong>Chemical Engineering</strong>
</td>
<td rowspan="5">
<span style="text-rendering: optimizelegibility;">&nbsp;</span>
&nbsp;
&nbsp;
&nbsp;
&nbsp;
Common to all
<span style="text-rendering: optimizelegibility;"><a href="<?= base_url('assets/images/Files/Link/POLY(ENGINEERING)/SCHPOLY_I.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> I&nbsp;Sem</a></span>
<span style="text-rendering: optimizelegibility;"><span style="text-rendering: optimizelegibility;"><span style="text-rendering: optimizelegibility;">&amp;</span></span></span>
<a href="<?= base_url('assets/images/Files/Link/POLY(ENGINEERING)/SCHPOLY_I.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> II&nbsp;Sem</a>&nbsp;
</td>
<td>
<a href="<?= base_url('assets/images/Files/Link/SCHEMES/POLY(ENGINEERING)/SCDCM_III.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> III Sem</a>
&nbsp;
<a href="<?= base_url('assets/images/Files/Link/SCHEMES/POLY(ENGINEERING)/SCDCM_IV.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> IV&nbsp;Sem</a>
</td>
<td>
<a href="<?= base_url('assets/images/Files/Link/SCHEMES/POLY(ENGINEERING)/SCDIP_5th/SCDIP_CM_5th.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> V&nbsp;Sem</a>
&nbsp;
<a href="<?= base_url('assets/images/Files/Link/SCHEMES/POLY(ENGINEERING)/SC_DIP_6th/SCDIP_CM_6th.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> VI Sem</a>
</td>
</tr>
<tr>
<td>
<strong><span style="text-rendering: optimizelegibility;">&nbsp;</span></strong>
<strong>Civil Engineering</strong>
</td>
<td>
<a href="<?= base_url('assets/images/Files/Link/SCHEMES/POLY(ENGINEERING)/SCDCE_III.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> III Sem</a>
&nbsp;
<a href="<?= base_url('assets/images/Files/Link/SCHEMES/POLY(ENGINEERING)/SCDCE_IV.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> IV&nbsp;Sem</a>
</td>
<td>
<a href="<?= base_url('assets/images/Files/Link/SCHEMES/POLY(ENGINEERING)/SCDIP_5th/SCDIP_CE_5th.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> V&nbsp;Sem</a>
&nbsp;
<a href="<?= base_url('assets/images/Files/Link/SCHEMES/POLY(ENGINEERING)/SC_DIP_6th/SCDIP_CE_6th.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> VI Sem</a>
</td>
</tr>
<tr>
<td>
<strong><span style="text-rendering: optimizelegibility;">&nbsp;</span></strong>
<strong>Computer Science and Engineering</strong>
</td>
<td>
<a href="<?= base_url('assets/images/Files/Link/SCHEMES/POLY(ENGINEERING)/SCDCS_III.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> III Sem</a>
&nbsp;
<a href="<?= base_url('assets/images/Files/Link/SCHEMES/POLY(ENGINEERING)/SCDCS_IV.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> IV&nbsp;Sem</a>
</td>
<td>
<a href="<?= base_url('assets/images/Files/Link/SCHEMES/POLY(ENGINEERING)/SCDIP_5th/SCDIP_CSE_5th.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> V&nbsp;Sem</a>
&nbsp;
<a href="<?= base_url('assets/images/Files/Link/SCHEMES/POLY(ENGINEERING)/SC_DIP_6th/SCDIP_CSE_6th.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> VI Sem</a>
</td>
</tr>
<tr>
<td>
<strong><span style="text-rendering: optimizelegibility;">&nbsp;</span></strong>
<strong>Electrical Engineering</strong>
</td>
<td>
<a href="<?= base_url('assets/images/Files/Link/SCHEMES/POLY(ENGINEERING)/SCDEE_III.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> III Sem</a>
&nbsp;
<a href="<?= base_url('assets/images/Files/Link/SCHEMES/POLY(ENGINEERING)/SCDEE_IV.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> IV&nbsp;Sem</a>
</td>
<td>
<a href="<?= base_url('assets/images/Files/Link/SCHEMES/POLY(ENGINEERING)/SCDIP_5th/SCDIP_EEr_5th.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> V&nbsp;Sem</a>
&nbsp;
<a href="<?= base_url('assets/images/Files/Link/SCHEMES/POLY(ENGINEERING)/SC_DIP_6th/SCDIP_EE_6th.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> VI Sem</a>
</td>
</tr>
<tr>
<td>
<strong><span style="text-rendering: optimizelegibility;">&nbsp;</span></strong>
<strong>Mechanical Engineering</strong>
</td>
<td>
<a href="<?= base_url('assets/images/Files/Link/SCHEMES/POLY(ENGINEERING)/SCDME_III.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> III Sem</a>
&nbsp;
<a href="<?= base_url('assets/images/Files/Link/SCHEMES/POLY(ENGINEERING)/SCDME_IV.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> IV&nbsp;Sem</a>
</td>
<td>
<a href="<?= base_url('assets/images/Files/Link/SCHEMES/POLY(ENGINEERING)/SCDIP_5th/SCDIP_ME_5th.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> V&nbsp;Sem</a>
&nbsp;
<a href="<?= base_url('assets/images/Files/Link/SCHEMES/POLY(ENGINEERING)/SC_DIP_6th/SCDIP_ME_6th.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> VI Sem</a>
</td>
</tr>
</tbody>
</table>
            </div>
          </div>
        </div>


      </div>

      <!-- Right Sidebar (3 Cols) -->
      <div class="col-lg-4 col-xl-3">
        <?php require_once __DIR__ . '/../../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const searchInput = document.getElementById('schemeSearch');
  if (searchInput) {
    searchInput.addEventListener('input', function() {
      const q = this.value.toLowerCase().trim();
      const tables = document.querySelectorAll('.scheme-table');
      
      tables.forEach(table => {
        const rows = table.querySelectorAll('tbody tr');
        let hasVisibleRow = false;
        
        rows.forEach(row => {
          const text = row.textContent.toLowerCase();
          if (text.includes(q)) {
            row.style.display = '';
            hasVisibleRow = true;
          } else {
            row.style.display = 'none';
          }
        });
        
        // Show/hide parent section card if all rows hidden
        const card = table.closest('.scheme-section-card');
        if (card) {
          card.style.display = (hasVisibleRow || q === '') ? '' : 'none';
        }
      });
    });
  }
});
</script>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>