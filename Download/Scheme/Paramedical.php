<?php
$page_title = 'Paramedical - Teaching & Examination Scheme - SSSUTMS';
$banner_title = 'Paramedical';
$banner_category = 'Teaching & Examination Scheme';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
  .eng-page-container {
    background: #ffffff;
    border-radius: 14px;
    border: 1px solid #e2e8f0;
    box-shadow: 0 4px 20px rgba(11, 37, 69, 0.05);
    overflow: hidden;
    margin-bottom: 2rem;
  }

  .eng-header-banner {
    background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
    color: #ffffff;
    padding: 1.75rem 2rem;
    position: relative;
    border-radius: 14px;
    margin-bottom: 1.5rem;
    box-shadow: 0 8px 24px rgba(11, 37, 69, 0.15);
  }
  .eng-header-banner::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #f59e0b, #fbbf24);
    border-bottom-left-radius: 14px;
    border-bottom-right-radius: 14px;
  }
  .eng-header-badge {
    background: rgba(245, 158, 11, 0.2);
    border: 1px solid rgba(245, 158, 11, 0.45);
    color: #ffffff;
    font-size: 0.78rem;
    font-weight: 700;
    padding: 6px 16px;
    border-radius: 50px;
    letter-spacing: 0.5px;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    text-transform: uppercase;
  }

  .eng-search-box {
    position: relative;
    width: 100%;
    max-width: 360px;
  }
  .eng-search-box input {
    padding-left: 2.4rem;
    padding-right: 2rem;
    border-radius: 8px;
    border: 1px solid #cbd5e1;
    font-size: 0.88rem;
    height: 40px;
  }
  .eng-search-box input:focus {
    border-color: #0b2545;
    box-shadow: 0 0 0 0.2rem rgba(11, 37, 69, 0.15);
  }
  .eng-search-box .search-icon {
    position: absolute;
    left: 0.85rem;
    top: 50%;
    transform: translateY(-50%);
    color: #64748b;
    font-size: 0.9rem;
  }
  .eng-search-box .clear-btn {
    position: absolute;
    right: 0.75rem;
    top: 50%;
    transform: translateY(-50%);
    color: #94a3b8;
    cursor: pointer;
    display: none;
    background: none;
    border: none;
    padding: 0;
  }

  /* Table Customization Matching Design */
  .eng-table-wrapper {
    border: 1px solid #e2e8f0;
    border-radius: 10px;
    overflow: hidden;
    background: #ffffff;
    margin-bottom: 2rem;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.02);
  }

  .eng-section-header {
    background: #f8fafc;
    border-bottom: 1px solid #e2e8f0;
    padding: 14px 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 10px;
  }
  .eng-section-title {
    color: #0b2545;
    font-weight: 700;
    font-size: 1.05rem;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 8px;
  }
  .eng-section-badge {
    background: #e2e8f0;
    color: #0b2545;
    font-size: 0.78rem;
    font-weight: 700;
    padding: 4px 12px;
    border-radius: 50px;
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
    font-size: 0.85rem;
    text-transform: uppercase;
    letter-spacing: 0.04em;
    padding: 13px 14px;
    border: 1px solid #134074;
    vertical-align: middle;
    text-align: center;
  }
  .eng-table thead th.text-start {
    text-align: left !important;
  }

  .eng-table tbody tr {
    border-bottom: 1px solid #edf2f7;
    transition: background-color 0.15s ease;
  }
  .eng-table tbody tr:hover {
    background-color: #f8fafc;
  }
  .eng-table tbody tr:last-child {
    border-bottom: none;
  }
  .eng-table td {
    padding: 12px 14px;
    font-size: 0.9rem;
    color: #334155;
    vertical-align: middle;
    border: 1px solid #edf2f7;
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
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 0.92rem;
  }
  .eng-branch-name i {
    color: #475569;
    font-size: 1rem;
  }

  /* Equal-Sized Download Buttons */
  .eng-download-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    background: #0b2545;
    color: #ffffff !important;
    border: 1px solid #0b2545;
    border-radius: 6px;
    font-size: 0.82rem;
    font-weight: 600;
    padding: 6px 14px;
    text-decoration: none !important;
    transition: all 0.2s ease;
    white-space: nowrap;
    margin: 2px 2px;
    box-shadow: 0 2px 4px rgba(11, 37, 69, 0.15);
    min-width: 100px;
    text-align: center;
  }
  .eng-download-btn.btn-wide {
    min-width: 220px;
    padding: 7px 18px;
  }
  .eng-download-btn:hover {
    background: #134074;
    border-color: #134074;
    color: #ffffff !important;
    transform: translateY(-1px);
    box-shadow: 0 4px 10px rgba(11, 37, 69, 0.25);
  }
  .eng-download-btn i {
    color: #ffffff;
    font-size: 0.88rem;
  }

  .no-match-box {
    display: none;
    text-align: center;
    padding: 30px 20px;
    color: #64748b;
    background: #ffffff;
    border-radius: 10px;
    border: 1px dashed #cbd5e1;
  }
</style>

<section class="subpage-main-section py-4 bg-light">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        
        <!-- Header Banner Card -->
        <div class="eng-header-banner">
          <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-2">
            <span class="eng-header-badge">
              <i class="fa fa-graduation-cap me-1"></i> Faculties &amp; Departments
            </span>
            <span class="badge bg-white text-dark px-3 py-2 fw-semibold">
              <i class="fa fa-university me-1 text-primary"></i> SSSUTMS
            </span>
          </div>
          <h2 class="h3 fw-bold text-white mt-2 mb-1">FACULTY OF PARAMEDICAL SCIENCES</h2>
          <p class="text-white-50 mb-0">Paramedical Degree and Diploma Teaching &amp; Examination Schemes</p>
        </div>

        <!-- Filter & Search Bar -->
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-3">
          <div class="eng-search-box">
            <i class="fa fa-search search-icon"></i>
            <input type="text" id="schemeSearch" class="form-control" placeholder="Search scheme title or session...">
            <button id="clearSearch" class="clear-btn" type="button"><i class="fa fa-times-circle"></i></button>
          </div>
          <div class="text-muted small">
            Showing <span id="visibleCount" class="fw-bold text-dark">2</span> of 2 Schemes
          </div>
        </div>

        <!-- Paramedical Schemes Table -->
        <div class="eng-table-wrapper">
          <div class="eng-section-header">
            <h5 class="eng-section-title">
              <i class="fa fa-stethoscope text-primary"></i> Paramedical Schemes &amp; Curriculum
            </h5>
            <span class="eng-section-badge">2 Schemes Available</span>
          </div>
          <div class="table-responsive">
            <table class="table eng-table scheme-table">
              <thead>
                <tr>
                  <th style="width: 80px;">SR. NO.</th>
                  <th class="text-start">COURSE / SCHEME TITLE</th>
                  <th style="width: 200px;">ACADEMIC SESSION</th>
                  <th style="width: 240px;">DOWNLOAD SCHEME</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-center fw-bold">1</td>
                  <td>
                    <div class="eng-branch-name">
                      <i class="fa fa-file-text-o text-muted"></i>
                      <span>New Scheme (Paramedical Courses)</span>
                    </div>
                  </td>
                  <td class="text-center">
                    <span class="eng-course-chip">With effect from 2016-17</span>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SCHEME/Para_SCPARA2017 .zip') ?>" target="_blank" class="eng-download-btn btn-wide">
                      <i class="fa fa-file-archive"></i> Download Scheme (ZIP)
                    </a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center fw-bold">2</td>
                  <td>
                    <div class="eng-branch-name">
                      <i class="fa fa-file-text-o text-muted"></i>
                      <span>New Scheme Dialysis (I &amp; II Year)</span>
                    </div>
                  </td>
                  <td class="text-center">
                    <span class="eng-course-chip">With effect from 2017-18</span>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SCHEME/Para_Scheme Dialysis_I_II_Year.zip') ?>" target="_blank" class="eng-download-btn btn-wide">
                      <i class="fa fa-file-archive"></i> Download Scheme (ZIP)
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div id="noMatchBox" class="no-match-box">
          <i class="fa fa-search fa-2x mb-2 text-muted"></i>
          <h6>No schemes found matching your search.</h6>
          <p class="small text-muted mb-0">Try clearing the search query or searching with a different keyword.</p>
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
  const clearBtn = document.getElementById('clearSearch');
  const visibleCount = document.getElementById('visibleCount');
  const noMatchBox = document.getElementById('noMatchBox');
  const tables = document.querySelectorAll('.scheme-table');
  const allRows = document.querySelectorAll('.scheme-table tbody tr');
  const totalRows = allRows.length;

  function filterSchemes() {
    const q = searchInput.value.toLowerCase().trim();
    let count = 0;

    if (clearBtn) {
      clearBtn.style.display = q ? 'block' : 'none';
    }

    tables.forEach(table => {
      const rows = table.querySelectorAll('tbody tr');
      let tableHasVisible = false;

      rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        if (text.includes(q)) {
          row.style.display = '';
          tableHasVisible = true;
          count++;
        } else {
          row.style.display = 'none';
        }
      });

      const wrapper = table.closest('.eng-table-wrapper');
      if (wrapper) {
        wrapper.style.display = (tableHasVisible || q === '') ? '' : 'none';
      }
    });

    if (visibleCount) {
      visibleCount.textContent = count;
    }

    if (count === 0 && totalRows > 0) {
      if (noMatchBox) noMatchBox.style.display = 'block';
    } else {
      if (noMatchBox) noMatchBox.style.display = 'none';
    }
  }

  if (searchInput) {
    searchInput.addEventListener('input', filterSchemes);
  }

  if (clearBtn) {
    clearBtn.addEventListener('click', function() {
      searchInput.value = '';
      filterSchemes();
      searchInput.focus();
    });
  }
});
</script>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>