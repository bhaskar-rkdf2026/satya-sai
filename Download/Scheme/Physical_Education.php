<?php
$page_title = 'Physical Education - Teaching & Examination Scheme - SSSUTMS';
$banner_title = 'Faculty of Physical Education (B.P.Ed. / B.P.E.S.)';
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
              <i class="fa fa-book"></i> FACULTY OF PHYSICAL EDUCATION
            </span>
            <span class="badge bg-light text-dark border px-3 py-2">
              <i class="fa fa-university me-1 text-primary"></i> SSSUTMS
            </span>
          </div>
          <h2 class="h3 fw-bold text-dark mt-2 mb-1" style="color: #0b2545 !important;">Faculty of Physical Education (B.P.Ed. / B.P.E.S.)</h2>
          <p class="text-muted mb-0">B.P.Ed. (CBCS / Non-CBCS) and B.P.E.S. Examination Schemes</p>
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
              <i class="fa fa-graduation-cap text-primary"></i> &amp;nbsp;
            </h5>
            <span class="scheme-section-badge">Examination Scheme</span>
          </div>
          <div class="p-0">
            <div class="table-responsive">
              <table class="table table-bordered table-hover align-middle scheme-table mb-0">
<thead><tr class="table-header-row">
<td class="text-center"><strong>COURSE</strong></td>
<td class="text-center"><strong>YEAR</strong></td>
</tr></thead><tbody><tr>
<td>B.P.Ed. (CBCS)</td>
<td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME/SCBPEDCBCS.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> I to IV Semester (CBCS)</a></td>
</tr>
<tr>
<td>B.P.Ed. (Non CBCS)</td>
<td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME/SCBPEDG.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> Two Year Course (old Scheme)</a></td>
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
              <i class="fa fa-graduation-cap text-primary"></i> Bachelor of Physical Education and Sports (BPES)&amp;nbsp;
            </h5>
            <span class="scheme-section-badge">Examination Scheme</span>
          </div>
          <div class="p-0">
            <div class="table-responsive">
              <table class="table table-bordered table-hover align-middle scheme-table mb-0">
<thead><tr class="table-header-row">
<td>
S.No.
</td>
<td>
Course
</td>
<td colspan="7">
Syllabus
</td>
</tr></thead><tbody><tr>
<td>
&nbsp;
1
</td>
<td>
&nbsp;
Bachelor of Physical Education and Sports&nbsp;
</td>
<td colspan="2">
<a href="<?= base_url('assets/images/Files/Link/SCHEME/SCBPE I (1).pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> B.P.Es I Year</a>
</td>
<td colspan="2">
<a href="<?= base_url('assets/images/Files/Link/SCHEME/SCBPE II (2).pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> B.P.Es II Year</a>
</td>
<td colspan="3">
<a href="<?= base_url('assets/images/Files/Link/SCHEME/SCBPE III.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> &nbsp;B.P.Es III Year</a>
</td>
</tr>
<tr>
<td>
&nbsp;2
</td>
<td>
&nbsp;Bachelor of Physical Education and Sports&nbsp;
(New)
</td>
<td colspan="7">
<a href="<?= base_url('assets/images/Files/Link/SCHEME/BPESSCH.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> &nbsp;Scheme of BPES</a>
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