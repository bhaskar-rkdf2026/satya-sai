<?php
$page_title = 'M.Tech. - Teaching & Examination Scheme - SSSUTMS';
$banner_title = 'Master of Technology (M.Tech.)';
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
          <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="eng-header-badge mb-2">
                <i class="fa-solid fa-gear me-1"></i> Faculties &amp; Departments
              </span>
              <h3 class="fw-bold text-white mb-0 fs-3">SCHOOL OF ENGINEERING &amp; TECHNOLOGY</h3>
            </div>
          </div>
        </div>

        <!-- Filter & Search Bar -->
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
          <div class="text-muted small">
            <i class="fa fa-info-circle me-1 text-primary"></i> Click any semester button to view / download syllabus scheme.
          </div>
          <div class="eng-search-box">
            <i class="fa fa-search search-icon"></i>
            <input type="text" id="mtechSearchInput" class="form-control" placeholder="Search specialization...">
            <button type="button" class="clear-btn" id="clearSearchBtn"><i class="fa fa-times"></i></button>
          </div>
        </div>

        <div id="noMatchAlert" class="no-match-box mb-4">
          <i class="fa fa-search fa-2x text-muted mb-2"></i>
          <h6 class="fw-bold mb-1">No matching specialization found</h6>
          <p class="small mb-0">Try clearing your search keyword.</p>
        </div>

        <!-- ==========================================
             M.Tech. Scheme Table
             ========================================== -->
        <div class="eng-table-wrapper" id="mtech-section">
          <div class="eng-section-header">
            <h5 class="eng-section-title">
              <i class="fa fa-graduation-cap text-primary"></i> Master of Technology (M.Tech.) Schemes
            </h5>
            <span class="eng-section-badge">Postgraduate (PG)</span>
          </div>
          <div class="table-responsive">
            <table class="eng-table">
              <thead>
                <tr>
                  <th style="width: 65px;">SR. NO.</th>
                  <th style="width: 170px;" class="text-start">COURSE</th>
                  <th class="text-start" style="width: 280px;">BRANCH / SPECIALIZATION</th>
                  <th style="width: 130px;">I SEM</th>
                  <th style="width: 130px;">II SEM</th>
                  <th style="width: 130px;">III SEM</th>
                  <th style="width: 130px;">IV SEM</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $mtech_branches = [
                  [
                    'sno' => 1,
                    'name' => 'Computer Science and Engineering',
                    'sem1' => 'SC_MCSE_I.pdf',
                    'sem2' => 'SCHMCSE_II.pdf',
                    'sem3' => 'CS_III.pdf',
                    'sem4' => '#',
                  ],
                  [
                    'sno' => 2,
                    'name' => 'Computer Technology and Application',
                    'sem1' => 'SC_MCTA_I.pdf',
                    'sem2' => 'SCHMCTA_II.pdf',
                    'sem3' => 'CTA_III.pdf',
                    'sem4' => 'CTA _Scheme.pdf',
                  ],
                  [
                    'sno' => 3,
                    'name' => 'Digital Communication',
                    'sem1' => 'SC_MTDC_I.pdf',
                    'sem2' => 'SC_MTDC_II.pdf',
                    'sem3' => 'DC_III.pdf',
                    'sem4' => 'DC.pdf',
                  ],
                  [
                    'sno' => 4,
                    'name' => 'Electrical Power System',
                    'sem1' => 'SC_MEPS_I.pdf',
                    'sem2' => 'SC_MTEPS_II.pdf',
                    'sem3' => 'EPS_III.pdf',
                    'sem4' => 'EPS.pdf',
                  ],
                  [
                    'sno' => 5,
                    'name' => 'Industrial Design',
                    'sem1' => 'SC_MTID_I.pdf',
                    'sem2' => 'SC_MTID_II.pdf',
                    'sem3' => 'ID_III.pdf',
                    'sem4' => 'ID.pdf',
                  ],
                  [
                    'sno' => 6,
                    'name' => 'Information Technology',
                    'sem1' => 'SC_MCIT_I.pdf',
                    'sem2' => 'SCHMIT_II.pdf',
                    'sem3' => 'MIT_III.pdf',
                    'sem4' => 'pe1.pdf',
                  ],
                  [
                    'sno' => 7,
                    'name' => 'Power Electronics',
                    'sem1' => 'SC_MTPE_I.pdf',
                    'sem2' => 'SC_MTPE_II.pdf',
                    'sem3' => 'PE_III.pdf',
                    'sem4' => 'PE.pdf',
                  ],
                  [
                    'sno' => 8,
                    'name' => 'Software Engineering',
                    'sem1' => 'SC_MTSE_I.pdf',
                    'sem2' => 'SCHMSE_II.pdf',
                    'sem3' => 'SE_III.pdf',
                    'sem4' => '#',
                  ],
                  [
                    'sno' => 9,
                    'name' => 'Structural Design',
                    'sem1' => 'SC_MTSD_I.pdf',
                    'sem2' => 'SC_MTSD_II.pdf',
                    'sem3' => 'SD_III.pdf',
                    'sem4' => 'CESD.pdf',
                  ],
                  [
                    'sno' => 10,
                    'name' => 'Thermal Engineering',
                    'sem1' => 'SC_MTH_I.pdf',
                    'sem2' => 'SC_MTH_II.pdf',
                    'sem3' => 'TH_III.pdf',
                    'sem4' => 'METH.pdf',
                  ],
                  [
                    'sno' => 11,
                    'name' => 'VLSI Design',
                    'sem1' => 'SC_MTVD_I.pdf',
                    'sem2' => 'SC_MTVLSI_II.pdf',
                    'sem3' => 'VL_III.pdf',
                    'sem4' => 'VLSI.pdf',
                  ],
                ];

                foreach ($mtech_branches as $b):
                  $link1 = ($b['sem1'] !== '#') ? base_url('assets/images/Files/Link/SCHEME/' . $b['sem1']) : '#';
                  $link2 = ($b['sem2'] !== '#') ? base_url('assets/images/Files/Link/SCHEME/' . $b['sem2']) : '#';
                  $link3 = ($b['sem3'] !== '#') ? base_url('assets/images/Files/Link/SCHEME/' . $b['sem3']) : '#';
                  $link4 = ($b['sem4'] !== '#') ? base_url('assets/images/Files/Link/SCHEME/' . $b['sem4']) : '#';
                ?>
                <tr class="branch-row">
                  <td class="text-center fw-bold text-muted"><?= $b['sno'] ?></td>
                  <td>
                    <span class="eng-course-chip me-1">M.Tech.</span>
                    <span class="fw-semibold text-secondary small d-none d-md-inline">M. Technology</span>
                  </td>
                  <td>
                    <span class="eng-branch-name">
                      <i class="fa fa-graduation-cap"></i> <?= htmlspecialchars($b['name']) ?>
                    </span>
                  </td>
                  <td class="text-center">
                    <a href="<?= $link1 ?>" <?= ($link1 !== '#') ? 'target="_blank"' : '' ?> class="eng-download-btn">
                      <i class="fa fa-file-pdf"></i> I Sem
                    </a>
                  </td>
                  <td class="text-center">
                    <a href="<?= $link2 ?>" <?= ($link2 !== '#') ? 'target="_blank"' : '' ?> class="eng-download-btn">
                      <i class="fa fa-file-pdf"></i> II Sem
                    </a>
                  </td>
                  <td class="text-center">
                    <a href="<?= $link3 ?>" <?= ($link3 !== '#') ? 'target="_blank"' : '' ?> class="eng-download-btn">
                      <i class="fa fa-file-pdf"></i> III Sem
                    </a>
                  </td>
                  <td class="text-center">
                    <a href="<?= $link4 ?>" <?= ($link4 !== '#') ? 'target="_blank"' : '' ?> class="eng-download-btn">
                      <i class="fa fa-file-pdf"></i> IV Sem
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
  const searchInput = document.getElementById('mtechSearchInput');
  const clearBtn = document.getElementById('clearSearchBtn');
  const noMatch = document.getElementById('noMatchAlert');
  
  function filterRows() {
    const q = searchInput.value.toLowerCase().trim();
    if (clearBtn) {
      clearBtn.style.display = q.length > 0 ? 'block' : 'none';
    }
    
    const rows = document.querySelectorAll('.eng-table tbody tr.branch-row');
    let totalVisible = 0;
    
    rows.forEach(row => {
      const branchName = row.querySelector('.eng-branch-name');
      const text = branchName ? branchName.textContent.toLowerCase() : row.textContent.toLowerCase();
      
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