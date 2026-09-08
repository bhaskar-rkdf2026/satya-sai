<?php
$page_title = 'BHMCT - Teaching & Examination Scheme - SSSUTMS';
$banner_title = 'BHMCT';
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
    gap: 8px;
    background: #0b2545;
    color: #ffffff !important;
    border: 1px solid #0b2545;
    border-radius: 6px;
    font-size: 0.82rem;
    font-weight: 600;
    padding: 7px 16px;
    text-decoration: none !important;
    transition: all 0.2s ease;
    white-space: nowrap;
    margin: 3px 2px;
    box-shadow: 0 2px 4px rgba(11, 37, 69, 0.15);
    min-width: 235px;
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
          <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="eng-header-badge mb-2">
                <i class="fa-solid fa-gear me-1"></i> Faculties &amp; Departments
              </span>
              <h3 class="fw-bold text-white mb-0 fs-3">FACULTY OF HOTEL MANAGEMENT &amp; CATERING TECHNOLOGY</h3>
            </div>
          </div>
        </div>

        <!-- Filter & Search Bar -->
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
          <div class="text-muted small">
            <i class="fa fa-info-circle me-1 text-primary"></i> Click any semester button to view / download syllabus scheme PDF.
          </div>
          <div class="eng-search-box">
            <i class="fa fa-search search-icon"></i>
            <input type="text" id="bhmctSearchInput" class="form-control" placeholder="Search semester or scheme...">
            <button type="button" class="clear-btn" id="clearSearchBtn"><i class="fa fa-times"></i></button>
          </div>
        </div>

        <div id="noMatchAlert" class="no-match-box mb-4">
          <i class="fa fa-search fa-2x text-muted mb-2"></i>
          <h6 class="fw-bold mb-1">No matching semester found</h6>
          <p class="small mb-0">Try clearing your search keyword.</p>
        </div>

        <!-- ==========================================
             BHMCT Scheme Table
             ========================================== -->
        <div class="eng-table-wrapper" id="bhmct-section">
          <div class="eng-section-header">
            <h5 class="eng-section-title">
              <i class="fa fa-graduation-cap text-primary"></i> Bachelor of Hotel Management &amp; Catering Technology (BHMCT)
            </h5>
            <span class="eng-section-badge">Undergraduate (UG)</span>
          </div>
          <div class="table-responsive">
            <table class="eng-table">
              <thead>
                <tr>
                  <th style="width: 65px;">SR. NO.</th>
                  <th style="width: 170px;" class="text-start">COURSE</th>
                  <th class="text-start" style="width: 240px;">SEMESTER</th>
                  <th style="width: 260px;">CHOICE BASED CREDIT SYSTEM (CBCS)</th>
                  <th style="width: 260px;">NON-CBCS SCHEME</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $bhmct_rows = [
                  [
                    'sno' => 1,
                    'sem' => 'First Semester (I Sem)',
                    'cbcs_file' => 'HMCT_ICBCS.pdf',
                    'cbcs_label' => 'I Semester (CBCS)',
                    'noncbcs_file' => 'HM_I.pdf',
                    'noncbcs_label' => 'I Semester (Non-CBCS)'
                  ],
                  [
                    'sno' => 2,
                    'sem' => 'Second Semester (II Sem)',
                    'cbcs_file' => 'BHMCTCII_SH.pdf',
                    'cbcs_label' => 'II Semester (CBCS)',
                    'noncbcs_file' => 'HM_II.pdf',
                    'noncbcs_label' => 'II Semester (Non-CBCS)'
                  ],
                  [
                    'sno' => 3,
                    'sem' => 'Third Semester (III Sem)',
                    'cbcs_file' => 'SCHMC_III.pdf',
                    'cbcs_label' => 'III Semester (CBCS)',
                    'noncbcs_file' => 'HM_III.pdf',
                    'noncbcs_label' => 'III Semester (Non-CBCS)'
                  ],
                  [
                    'sno' => 4,
                    'sem' => 'Fourth Semester (IV Sem)',
                    'cbcs_file' => 'SCHMC_IV.pdf',
                    'cbcs_label' => 'IV Semester (CBCS)',
                    'noncbcs_file' => 'BHMCT4.pdf',
                    'noncbcs_label' => 'IV Semester (Non-CBCS)'
                  ],
                  [
                    'sno' => 5,
                    'sem' => 'Fifth Semester (V Sem)',
                    'cbcs_file' => 'SCBHMCT 5th scheme cbcs.pdf',
                    'cbcs_label' => 'V Semester (CBCS)',
                    'noncbcs_file' => 'BHMCTV.pdf',
                    'noncbcs_label' => 'V Semester (Non-CBCS)'
                  ],
                  [
                    'sno' => 6,
                    'sem' => 'Sixth Semester (VI Sem)',
                    'cbcs_file' => 'SCBHMCT_6thsem.pdf',
                    'cbcs_label' => 'VI Semester (CBCS)',
                    'noncbcs_file' => '../SYLLABUS/6 sem syllabus/BHMCT_VISYL.pdf',
                    'noncbcs_label' => 'VI Semester (Non-CBCS)'
                  ],
                  [
                    'sno' => 7,
                    'sem' => 'Seventh Semester (VII Sem)',
                    'cbcs_file' => 'SCBHMCT_7thsem.pdf',
                    'cbcs_label' => 'VII Semester (CBCS)',
                    'noncbcs_file' => '#',
                    'noncbcs_label' => 'VII Semester (Revised)'
                  ],
                  [
                    'sno' => 8,
                    'sem' => 'Eighth Semester (VIII Sem)',
                    'cbcs_file' => 'SCBHMCT_8thsem.pdf',
                    'cbcs_label' => 'VIII Semester (CBCS)',
                    'noncbcs_file' => '#',
                    'noncbcs_label' => 'VIII Semester (Revised)'
                  ],
                ];

                foreach ($bhmct_rows as $row):
                  $cbcs_link = ($row['cbcs_file'] !== '#') ? base_url('assets/images/Files/Link/SCHEME/' . $row['cbcs_file']) : '#';
                  if ($row['noncbcs_file'] === '#') {
                    $noncbcs_link = '#';
                  } elseif (strpos($row['noncbcs_file'], '../') !== false) {
                    $noncbcs_link = base_url('assets/images/Files/Link/SYLLABUS/6 sem syllabus/BHMCT_VISYL.pdf');
                  } else {
                    $noncbcs_link = base_url('assets/images/Files/Link/SCHEME/' . $row['noncbcs_file']);
                  }
                ?>
                <tr class="bhmct-row">
                  <td class="text-center fw-bold text-muted"><?= $row['sno'] ?></td>
                  <td>
                    <span class="eng-course-chip me-1">BHMCT</span>
                    <span class="fw-semibold text-secondary small d-none d-md-inline">B.H.M.C.T.</span>
                  </td>
                  <td>
                    <span class="eng-branch-name">
                      <i class="fa fa-graduation-cap"></i> <?= htmlspecialchars($row['sem']) ?>
                    </span>
                  </td>
                  <td class="text-center">
                    <a href="<?= $cbcs_link ?>" <?= ($cbcs_link !== '#') ? 'target="_blank"' : '' ?> class="eng-download-btn">
                      <i class="fa fa-file-pdf"></i> Download <?= htmlspecialchars($row['cbcs_label']) ?>
                    </a>
                  </td>
                  <td class="text-center">
                    <a href="<?= $noncbcs_link ?>" <?= ($noncbcs_link !== '#') ? 'target="_blank"' : '' ?> class="eng-download-btn">
                      <i class="fa fa-file-pdf"></i> Download <?= htmlspecialchars($row['noncbcs_label']) ?>
                    </a>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
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
  const searchInput = document.getElementById('bhmctSearchInput');
  const clearBtn = document.getElementById('clearSearchBtn');
  const noMatch = document.getElementById('noMatchAlert');
  
  function filterRows() {
    const q = searchInput.value.toLowerCase().trim();
    if (clearBtn) {
      clearBtn.style.display = q.length > 0 ? 'block' : 'none';
    }
    
    const rows = document.querySelectorAll('.eng-table tbody tr.bhmct-row');
    let totalVisible = 0;
    
    rows.forEach(row => {
      const semName = row.querySelector('.eng-branch-name');
      const text = semName ? semName.textContent.toLowerCase() : row.textContent.toLowerCase();
      
      if (text.includes(q) || q === '') {
        row.style.display = '';
        totalVisible++;
      } else {
        row.style.display = 'none';
      }
    });
    
    if (noMatch) {
      noMatch.style.display = (totalVisible === 0 && q !== '') ? 'block' : 'none';
    }
  }

  if (searchInput) {
    searchInput.addEventListener('input', filterRows);
  }
  
  if (clearBtn) {
    clearBtn.addEventListener('click', function() {
      searchInput.value = '';
      filterRows();
      searchInput.focus();
    });
  }
});
</script>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>