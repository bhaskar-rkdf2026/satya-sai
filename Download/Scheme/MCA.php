<?php
$page_title = 'MCA - Teaching & Examination Scheme - SSSUTMS';
$banner_title = 'MCA';
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
    padding: 3px 8px;
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
    padding: 6px 12px;
    text-decoration: none !important;
    transition: all 0.2s ease;
    white-space: nowrap;
    margin: 2px 2px;
    box-shadow: 0 2px 4px rgba(11, 37, 69, 0.15);
    min-width: 86px;
    text-align: center;
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
          <h2 class="h3 fw-bold text-white mb-2">FACULTY OF COMPUTER APPLICATIONS</h2>
          <p class="text-white-50 mb-0">Master of Computer Applications (MCA) - Teaching &amp; Examination Scheme</p>
        </div>

        <!-- Filter & Search Bar -->
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-3">
          <div class="eng-search-box">
            <i class="fa fa-search search-icon"></i>
            <input type="text" id="schemeSearch" class="form-control" placeholder="Search course, program, or scheme...">
            <button type="button" id="clearSearch" class="clear-btn"><i class="fa fa-times-circle"></i></button>
          </div>
          <div class="text-muted small">
            Showing <span id="visibleCount" class="fw-bold text-dark">3</span> programs
          </div>
        </div>

        <!-- Scheme Table Wrapper -->
        <div class="eng-table-wrapper">
          <div class="eng-section-header">
            <h5 class="eng-section-title">
              <i class="fa fa-graduation-cap text-primary"></i> Scheme Details - Master of Computer Applications (MCA)
            </h5>
            <span class="eng-section-badge">Examination Scheme</span>
          </div>
          
          <div class="table-responsive">
            <table class="table align-middle eng-table" id="schemeTable">
              <thead>
                <tr>
                  <th style="width: 70px;">SR. NO.</th>
                  <th class="text-start" style="min-width: 250px;">COURSE / PROGRAM</th>
                  <th style="width: 110px;">I SEM</th>
                  <th style="width: 110px;">II SEM</th>
                  <th style="width: 120px;">III SEM</th>
                  <th style="width: 110px;">IV SEM</th>
                  <th style="width: 110px;">V SEM</th>
                  <th style="width: 110px;">VI SEM</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-center fw-bold">1</td>
                  <td>
                    <div class="eng-branch-name">
                      <i class="fa fa-graduation-cap text-primary"></i>
                      <div>
                        <div>MCA (Master in Computer Application)</div>
                        <small class="text-muted fw-normal">Scheme 2023-24 (2 Year Course)</small>
                      </div>
                    </div>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SCHEMES/MCA24/MCA I SEM SCHEME 2023-24.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I Sem</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SCHEMES/MCA24/MCA II SEM SCHEME 2023-24.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> II Sem</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SCHEMES/MCA24/MCA_III SEM SCHEME 2023-24.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SCHEMES/MCA24/MCA_IV SEM SCHEME 2023-24.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a>
                  </td>
                  <td class="text-center text-muted">-</td>
                  <td class="text-center text-muted">-</td>
                </tr>

                <tr>
                  <td class="text-center fw-bold">2</td>
                  <td>
                    <div class="eng-branch-name">
                      <i class="fa fa-graduation-cap text-primary"></i>
                      <div>
                        <div>MCA (Master in Computer Application)</div>
                        <small class="text-muted fw-normal">2 Year Course (Previous Scheme)</small>
                      </div>
                    </div>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SCHEME/A_MCA2yr_I_SCHEME_R.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I Sem</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SCHEME/A_MCA2yr_II_SCHEME_R.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> II Sem</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SCHEME2021/MCA_III_2021.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SCHEME2021/MCA_IV_2021.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a>
                  </td>
                  <td class="text-center text-muted">-</td>
                  <td class="text-center text-muted">-</td>
                </tr>

                <tr>
                  <td class="text-center fw-bold">3</td>
                  <td>
                    <div class="eng-branch-name">
                      <i class="fa fa-graduation-cap text-primary"></i>
                      <div>
                        <div>MCA (Master in Computer Application)</div>
                        <small class="text-muted fw-normal">3 Year Course</small>
                      </div>
                    </div>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SCHEME/SC_MCA_I.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I Sem</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SCHEME/MCA_II.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> II Sem</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SCHEME/SCMCA_IIIwef2017.pdf') ?>" target="_blank" class="eng-download-btn" title="Third Semester (New Scheme wef July 2017)"><i class="fa fa-file-pdf"></i> III Sem (New)</a>
                    <a href="<?= base_url('assets/images/Files/Link/SCHEME/MCAIIIN.pdf') ?>" target="_blank" class="eng-download-btn mt-1" title="Third Semester (Old Scheme)"><i class="fa fa-file-pdf"></i> III Sem (Old)</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SCHEME/MCAIVSch.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SCHEME/MCAV.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> V Sem</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SCHEME/MCAVI.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VI Sem</a>
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
  const rows = document.querySelectorAll('#schemeTable tbody tr');
  const totalRows = rows.length;

  function filterSchemes() {
    const q = searchInput.value.toLowerCase().trim();
    let count = 0;

    if (clearBtn) {
      clearBtn.style.display = q ? 'block' : 'none';
    }

    rows.forEach(row => {
      const text = row.textContent.toLowerCase();
      if (text.includes(q)) {
        row.style.display = '';
        count++;
      } else {
        row.style.display = 'none';
      }
    });

    if (visibleCount) {
      visibleCount.textContent = count;
    }

    const wrapper = document.querySelector('.eng-table-wrapper');
    if (count === 0 && totalRows > 0) {
      if (wrapper) wrapper.style.display = 'none';
      if (noMatchBox) noMatchBox.style.display = 'block';
    } else {
      if (wrapper) wrapper.style.display = 'block';
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