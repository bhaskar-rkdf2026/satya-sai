<?php
$page_title = 'Faculty of Pharmacy - Teaching & Examination Scheme - SSSUTMS';
$banner_title = 'Faculty of Pharmacy (B.Pharm / M.Pharm / D.Pharm)';
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

  .eng-tab-btn {
    background: #f1f5f9;
    color: #0b2545;
    border: 1px solid #cbd5e1;
    font-weight: 600;
    font-size: 0.85rem;
    padding: 7px 18px;
    border-radius: 20px;
    transition: all 0.2s ease;
    cursor: pointer;
    text-decoration: none !important;
    display: inline-flex;
    align-items: center;
    gap: 6px;
  }
  .eng-tab-btn:hover,
  .eng-tab-btn.active {
    background: #0b2545;
    color: #ffffff !important;
    border-color: #0b2545;
    box-shadow: 0 4px 10px rgba(11, 37, 69, 0.2);
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

  /* Table Customization Matching Attached Design */
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

  /* Exact Download Button Style with Equal Width */
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
  .eng-download-btn-sm {
    min-width: 90px !important;
    padding: 6px 12px !important;
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
              <h3 class="fw-bold text-white mb-0 fs-3">SCHOOL OF PHARMACY</h3>
            </div>
          </div>
        </div>

        <!-- Controls: Quick Filter Tabs & Search Bar -->
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
          <div class="d-flex flex-wrap align-items-center gap-2" id="schemeFilters">
            <a href="#bpharm-section" class="eng-tab-btn active"><i class="fa fa-pills"></i> B. Pharmacy (B.Pharm)</a>
            <a href="#mpharm-section" class="eng-tab-btn"><i class="fa fa-flask"></i> M. Pharmacy (M.Pharm)</a>
            <a href="#dpharm-section" class="eng-tab-btn"><i class="fa fa-mortar-pestle"></i> D. Pharmacy (D.Pharm)</a>
          </div>
          <div class="eng-search-box">
            <i class="fa fa-search search-icon"></i>
            <input type="text" id="pharmacySearchInput" class="form-control" placeholder="Search semester or specialization...">
            <button type="button" class="clear-btn" id="clearSearchBtn"><i class="fa fa-times"></i></button>
          </div>
        </div>

        <div id="noMatchAlert" class="no-match-box mb-4">
          <i class="fa fa-search fa-2x text-muted mb-2"></i>
          <h6 class="fw-bold mb-1">No matching program or semester found</h6>
          <p class="small mb-0">Try clearing your search keyword.</p>
        </div>

        <!-- ==========================================
             TABLE 1: Bachelor of Pharmacy (B.Pharm)
             ========================================== -->
        <div class="eng-table-wrapper" id="bpharm-section">
          <div class="eng-section-header">
            <h5 class="eng-section-title">
              <i class="fa fa-pills text-primary"></i> Bachelor of Pharmacy (B. Pharm)
            </h5>
            <span class="eng-section-badge">Undergraduate (UG)</span>
          </div>
          <div class="table-responsive">
            <table class="eng-table">
              <thead>
                <tr>
                  <th style="width: 65px;">SR. NO.</th>
                  <th style="width: 170px;" class="text-start">COURSE</th>
                  <th class="text-start" style="width: 220px;">SEMESTER</th>
                  <th style="width: 260px;">CHOICE BASED CREDIT SYSTEM (CBCS)</th>
                  <th style="width: 240px;">NON-CBCS SCHEME</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $bpharm_semesters = [
                  [
                    'sno' => 1,
                    'sem' => 'First Semester (I Sem)',
                    'noncbcs_file' => 'SC_BPH_I.pdf',
                    'noncbcs_label' => 'First Semester'
                  ],
                  [
                    'sno' => 2,
                    'sem' => 'Second Semester (II Sem)',
                    'noncbcs_file' => 'SCBP_II.pdf',
                    'noncbcs_label' => 'Second Semester'
                  ],
                  [
                    'sno' => 3,
                    'sem' => 'Third Semester (III Sem)',
                    'noncbcs_file' => 'SCBP_III.pdf',
                    'noncbcs_label' => 'Third Semester'
                  ],
                  [
                    'sno' => 4,
                    'sem' => 'Fourth Semester (IV Sem)',
                    'noncbcs_file' => 'SHMbph_ivsem.pdf',
                    'noncbcs_label' => 'Fourth Semester'
                  ],
                  [
                    'sno' => 5,
                    'sem' => 'Fifth Semester (V Sem)',
                    'noncbcs_file' => 'SCH_BPHV.pdf',
                    'noncbcs_label' => 'Fifth Semester'
                  ],
                  [
                    'sno' => 6,
                    'sem' => 'Sixth Semester (VI Sem)',
                    'noncbcs_file' => 'SCH_BPHVI.pdf',
                    'noncbcs_label' => 'Sixth Semester'
                  ],
                  [
                    'sno' => 7,
                    'sem' => 'Seventh Semester (VII Sem)',
                    'noncbcs_file' => 'SCBP_VII.pdf',
                    'noncbcs_label' => 'Seventh Semester'
                  ],
                  [
                    'sno' => 8,
                    'sem' => 'Eighth Semester (VIII Sem)',
                    'noncbcs_file' => 'SCBP_VIII.pdf',
                    'noncbcs_label' => 'Eighth Semester'
                  ],
                ];

                foreach ($bpharm_semesters as $idx => $s):
                ?>
                <tr class="pharm-row">
                  <td class="text-center fw-bold text-muted"><?= $s['sno'] ?></td>
                  <td>
                    <span class="eng-course-chip me-1">B.Pharm</span>
                    <span class="fw-semibold text-secondary small d-none d-md-inline">B. Pharmacy</span>
                  </td>
                  <td>
                    <span class="eng-branch-name">
                      <i class="fa fa-graduation-cap"></i> <?= htmlspecialchars($s['sem']) ?>
                    </span>
                  </td>
                  <?php if ($idx === 0): ?>
                  <td rowspan="8" class="text-center align-middle bg-light">
                    <div class="p-3">
                      <div class="fw-bold text-dark mb-2">Scheme of B. Pharma (All Semesters)</div>
                      <a href="<?= base_url('assets/images/Files/Link/SCHEME/SCBPHC_I_VIII.pdf') ?>" target="_blank" class="eng-download-btn">
                        <i class="fa fa-file-pdf"></i> Download Complete Scheme
                      </a>
                      <div class="small text-muted mt-2">w.e.f. Session 2016-17 (CBCS)</div>
                    </div>
                  </td>
                  <?php endif; ?>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SCHEME/' . $s['noncbcs_file']) ?>" target="_blank" class="eng-download-btn">
                      <i class="fa fa-file-pdf"></i> Download <?= htmlspecialchars($s['noncbcs_label']) ?>
                    </a>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>

        <!-- ==========================================
             TABLE 2: Master of Pharmacy (M.Pharm)
             ========================================== -->
        <div class="eng-table-wrapper" id="mpharm-section">
          <div class="eng-section-header">
            <h5 class="eng-section-title">
              <i class="fa fa-flask text-primary"></i> Master of Pharmacy (M. Pharm)
            </h5>
            <span class="eng-section-badge">Postgraduate (PG)</span>
          </div>
          <div class="table-responsive">
            <table class="eng-table">
              <thead>
                <tr>
                  <th style="width: 65px;">SR. NO.</th>
                  <th style="width: 170px;" class="text-start">COURSE</th>
                  <th class="text-start" style="width: 250px;">BRANCH / SPECIALIZATION</th>
                  <th style="width: 250px;">NEW SCHEME (W.E.F. 2017-18)</th>
                  <th style="width: 320px;">OLD SCHEME (W.E.F. 2015-16)</th>
                </tr>
              </thead>
              <tbody>
                <tr class="pharm-row">
                  <td class="text-center fw-bold text-muted">1</td>
                  <td>
                    <span class="eng-course-chip me-1">M.Pharm</span>
                    <span class="fw-semibold text-secondary small d-none d-md-inline">M. Pharmacy</span>
                  </td>
                  <td>
                    <span class="eng-branch-name">
                      <i class="fa fa-graduation-cap"></i> Pharmacology
                    </span>
                  </td>
                  <td class="text-center align-middle" rowspan="2">
                    <div class="d-flex flex-column gap-2 p-2">
                      <div>
                        <a href="<?= base_url('assets/images/Files/Link/SCHEME/SCMPWEF17_I_II.pdf') ?>" target="_blank" class="eng-download-btn">
                          <i class="fa fa-file-pdf"></i> First & Second Semester
                        </a>
                      </div>
                      <div>
                        <a href="<?= base_url('assets/images/Files/Link/SCHEME/SC_MPharmacyr_III_IVSem.pdf') ?>" target="_blank" class="eng-download-btn">
                          <i class="fa fa-file-pdf"></i> Third & Fourth Semester
                        </a>
                      </div>
                      <div class="small text-muted">Common New Scheme (w.e.f. 2017-18)</div>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex flex-column gap-2">
                      <a href="<?= base_url('assets/images/Files/Link/SCHEME/SCMPCO_I.pdf') ?>" target="_blank" class="eng-download-btn">
                        <i class="fa fa-file-pdf"></i> First Year (Pharmacology)
                      </a>
                      <a href="<?= base_url('assets/images/Files/Link/SCHEME/COLOGY.pdf') ?>" target="_blank" class="eng-download-btn">
                        <i class="fa fa-file-pdf"></i> Second Year (Pharmacology)
                      </a>
                      <div class="d-flex flex-wrap gap-1 mt-1">
                        <a href="<?= base_url('assets/images/Files/Link/SCHEME/SCMP_III.pdf') ?>" target="_blank" class="eng-download-btn eng-download-btn-sm"><i class="fa fa-file-pdf"></i> III Sem</a>
                        <a href="<?= base_url('assets/images/Files/Link/SCHEME/mphar.pdf') ?>" target="_blank" class="eng-download-btn eng-download-btn-sm"><i class="fa fa-file-pdf"></i> IV Sem</a>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr class="pharm-row">
                  <td class="text-center fw-bold text-muted">2</td>
                  <td>
                    <span class="eng-course-chip me-1">M.Pharm</span>
                    <span class="fw-semibold text-secondary small d-none d-md-inline">M. Pharmacy</span>
                  </td>
                  <td>
                    <span class="eng-branch-name">
                      <i class="fa fa-graduation-cap"></i> Pharmaceutics
                    </span>
                  </td>
                  <td>
                    <div class="d-flex flex-column gap-2">
                      <a href="<?= base_url('assets/images/Files/Link/SCHEME/SCMPCE_I.pdf') ?>" target="_blank" class="eng-download-btn">
                        <i class="fa fa-file-pdf"></i> First Year (Pharmaceutics)
                      </a>
                      <a href="<?= base_url('assets/images/Files/Link/SCHEME/MPHARMACEUTICS.pdf') ?>" target="_blank" class="eng-download-btn">
                        <i class="fa fa-file-pdf"></i> Second Year (Pharmaceutics)
                      </a>
                      <div class="d-flex flex-wrap gap-1 mt-1">
                        <a href="<?= base_url('assets/images/Files/Link/SCHEME/SCMP_III.pdf') ?>" target="_blank" class="eng-download-btn eng-download-btn-sm"><i class="fa fa-file-pdf"></i> III Sem</a>
                        <a href="<?= base_url('assets/images/Files/Link/SCHEME/mphar.pdf') ?>" target="_blank" class="eng-download-btn eng-download-btn-sm"><i class="fa fa-file-pdf"></i> IV Sem</a>
                      </div>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- ==========================================
             TABLE 3: Diploma in Pharmacy (D.Pharm)
             ========================================== -->
        <div class="eng-table-wrapper" id="dpharm-section">
          <div class="eng-section-header">
            <h5 class="eng-section-title">
              <i class="fa fa-mortar-pestle text-primary"></i> Diploma in Pharmacy (D. Pharm)
            </h5>
            <span class="eng-section-badge">Diploma (PCI Scheme)</span>
          </div>
          <div class="table-responsive">
            <table class="eng-table">
              <thead>
                <tr>
                  <th style="width: 65px;">SR. NO.</th>
                  <th style="width: 170px;" class="text-start">COURSE</th>
                  <th class="text-start" style="width: 250px;">YEAR</th>
                  <th style="width: 280px;">AS PER PCI SCHEME (W.E.F. 2021-22)</th>
                  <th style="width: 280px;">OLD SCHEME</th>
                </tr>
              </thead>
              <tbody>
                <tr class="pharm-row">
                  <td class="text-center fw-bold text-muted">1</td>
                  <td>
                    <span class="eng-course-chip me-1">D.Pharm</span>
                    <span class="fw-semibold text-secondary small d-none d-md-inline">Diploma in Pharmacy</span>
                  </td>
                  <td>
                    <span class="eng-branch-name">
                      <i class="fa fa-graduation-cap"></i> First Year (I Year)
                    </span>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SCHEME2021/SC_DPHARMA_I_2021.pdf') ?>" target="_blank" class="eng-download-btn">
                      <i class="fa fa-file-pdf"></i> Download I Year (PCI Scheme)
                    </a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SCHEME/DPH_Sch_I.pdf') ?>" target="_blank" class="eng-download-btn">
                      <i class="fa fa-file-pdf"></i> Download I Year (Old Scheme)
                    </a>
                  </td>
                </tr>
                <tr class="pharm-row">
                  <td class="text-center fw-bold text-muted">2</td>
                  <td>
                    <span class="eng-course-chip me-1">D.Pharm</span>
                    <span class="fw-semibold text-secondary small d-none d-md-inline">Diploma in Pharmacy</span>
                  </td>
                  <td>
                    <span class="eng-branch-name">
                      <i class="fa fa-graduation-cap"></i> Second Year (II Year)
                    </span>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SCHEME2021/SC_DPHARMA_II_2021.pdf') ?>" target="_blank" class="eng-download-btn">
                      <i class="fa fa-file-pdf"></i> Download II Year (PCI Scheme)
                    </a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SCHEME/DPH_Sch_II.pdf') ?>" target="_blank" class="eng-download-btn">
                      <i class="fa fa-file-pdf"></i> Download II Year (Old Scheme)
                    </a>
                  </td>
                </tr>
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
  const searchInput = document.getElementById('pharmacySearchInput');
  const clearBtn = document.getElementById('clearSearchBtn');
  const noMatch = document.getElementById('noMatchAlert');
  
  function filterPharmacy() {
    const q = searchInput.value.toLowerCase().trim();
    if (clearBtn) {
      clearBtn.style.display = q.length > 0 ? 'block' : 'none';
    }
    
    const tables = document.querySelectorAll('.eng-table');
    let totalVisible = 0;
    
    tables.forEach(table => {
      const rows = table.querySelectorAll('tbody tr.pharm-row');
      let tableHasVisible = false;
      
      rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        
        if (text.includes(q) || q === '') {
          row.style.display = '';
          tableHasVisible = true;
          totalVisible++;
        } else {
          row.style.display = 'none';
        }
      });
      
      const wrapper = table.closest('.eng-table-wrapper');
      if (wrapper) {
        wrapper.style.display = (tableHasVisible || q === '') ? '' : 'none';
      }
    });
    
    if (noMatch) {
      noMatch.style.display = (totalVisible === 0 && q !== '') ? 'block' : 'none';
    }
  }

  if (searchInput) {
    searchInput.addEventListener('input', filterPharmacy);
  }
  
  if (clearBtn) {
    clearBtn.addEventListener('click', function() {
      searchInput.value = '';
      filterPharmacy();
      searchInput.focus();
    });
  }
});
</script>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>