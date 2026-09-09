<?php

function get_common_head($page_title, $banner_title, $banner_category = 'Syllabus') {
    return <<<PHP
<?php
\$page_title = '$page_title';
\$banner_title = '$banner_title';
\$banner_category = '$banner_category';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
  .syl-page-container {
    background: #ffffff;
    border-radius: 14px;
    border: 1px solid #e2e8f0;
    box-shadow: 0 4px 20px rgba(11, 37, 69, 0.05);
    overflow: hidden;
    margin-bottom: 2rem;
  }

  .syl-header-banner {
    background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
    color: #ffffff;
    padding: 1.75rem 2rem;
    position: relative;
    border-radius: 14px;
    margin-bottom: 1.5rem;
    box-shadow: 0 8px 24px rgba(11, 37, 69, 0.15);
  }
  .syl-header-banner::after {
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
  .syl-header-badge {
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

  .syl-search-box {
    position: relative;
    max-width: 460px;
    width: 100%;
  }
  .syl-search-box input {
    padding-left: 2.75rem;
    padding-right: 2.5rem;
    height: 44px;
    border-radius: 50px;
    border: 1.5px solid #cbd5e1;
    font-size: 0.9rem;
    transition: all 0.2s ease;
  }
  .syl-search-box input:focus {
    border-color: #0b2545;
    box-shadow: 0 0 0 4px rgba(11, 37, 69, 0.12);
  }
  .syl-search-box .search-icon {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: #64748b;
    font-size: 0.95rem;
  }
  .syl-search-box .clear-btn {
    position: absolute;
    right: 1rem;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    color: #94a3b8;
    font-size: 0.9rem;
    cursor: pointer;
    display: none;
    padding: 0;
  }
  .syl-search-box .clear-btn:hover {
    color: #0b2545;
  }

  .syl-quick-nav {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-bottom: 1.5rem;
  }
  .syl-quick-pill {
    background: #f1f5f9;
    color: #334155;
    border: 1px solid #e2e8f0;
    padding: 6px 14px;
    border-radius: 50px;
    font-size: 0.8rem;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: all 0.2s ease;
  }
  .syl-quick-pill:hover,
  .syl-quick-pill.active {
    background: #0b2545;
    color: #ffffff;
    border-color: #0b2545;
    transform: translateY(-1px);
  }

  .syl-table-card {
    background: #ffffff;
    border-radius: 12px;
    border: 1px solid #e2e8f0;
    overflow: hidden;
    margin-bottom: 2rem;
    box-shadow: 0 2px 10px rgba(0,0,0,0.03);
    transition: all 0.2s ease;
  }
  .syl-table-card:hover {
    box-shadow: 0 6px 20px rgba(11, 37, 69, 0.08);
  }
  .syl-card-header {
    background: linear-gradient(90deg, #f8fafc 0%, #edf2f7 100%);
    border-bottom: 1px solid #e2e8f0;
    padding: 1rem 1.5rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 10px;
  }
  .syl-card-header h3 {
    margin: 0;
    font-size: 1.08rem;
    font-weight: 700;
    color: #0b2545;
    display: flex;
    align-items: center;
    gap: 10px;
  }
  .syl-card-badge {
    background: #0b2545;
    color: #ffffff;
    font-size: 0.72rem;
    font-weight: 600;
    padding: 4px 10px;
    border-radius: 6px;
    letter-spacing: 0.3px;
  }

  .syl-table-wrap {
    overflow-x: auto;
  }
  .syl-table {
    width: 100%;
    margin-bottom: 0;
    border-collapse: collapse;
    font-size: 0.88rem;
  }
  .syl-table th {
    background: #f8fafc;
    color: #0b2545;
    font-weight: 700;
    text-transform: uppercase;
    font-size: 0.76rem;
    letter-spacing: 0.5px;
    padding: 12px 14px;
    border-bottom: 2px solid #e2e8f0;
    white-space: nowrap;
    text-align: center;
  }
  .syl-table td {
    padding: 11px 14px;
    vertical-align: middle;
    border-bottom: 1px solid #f1f5f9;
    color: #334155;
    text-align: center;
  }
  .syl-table tbody tr:hover td {
    background-color: rgba(245, 158, 11, 0.04);
  }

  .syl-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    padding: 8px 16px;
    background: #0b2545;
    color: #ffffff !important;
    border-radius: 6px;
    font-size: 0.82rem;
    font-weight: 700;
    text-decoration: none !important;
    transition: all 0.2s ease;
    border: none;
    box-shadow: 0 2px 5px rgba(11, 37, 69, 0.18);
    white-space: nowrap;
  }
  .syl-btn:hover {
    background: #d97706;
    color: #ffffff !important;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(217, 119, 6, 0.35);
  }

  .syl-empty-state {
    display: none;
    text-align: center;
    padding: 3rem 1.5rem;
    background: #f8fafc;
    border-radius: 12px;
    border: 2px dashed #cbd5e1;
    margin-bottom: 2rem;
  }
  .syl-empty-state i {
    font-size: 2.5rem;
    color: #94a3b8;
    margin-bottom: 1rem;
  }
</style>
PHP;
}

function get_common_foot() {
    return <<<PHP
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('sylSearch');
    const clearBtn = document.getElementById('sylClearSearch');
    const rows = document.querySelectorAll('.syl-row');
    const emptyState = document.getElementById('sylEmptyState');
    const countDisplay = document.getElementById('sylCount');

    function filterTable() {
      const q = searchInput.value.toLowerCase().trim();
      let visibleCount = 0;

      if (q.length > 0) {
        clearBtn.style.display = 'block';
      } else {
        clearBtn.style.display = 'none';
      }

      rows.forEach(row => {
        const text = row.innerText.toLowerCase();
        if (text.includes(q)) {
          row.style.display = '';
          visibleCount++;
        } else {
          row.style.display = 'none';
        }
      });

      if (countDisplay) countDisplay.textContent = visibleCount;

      // Handle card empty visibility
      document.querySelectorAll('.syl-table-card').forEach(card => {
        const cardRows = card.querySelectorAll('.syl-row');
        const hasVisible = Array.from(cardRows).some(r => r.style.display !== 'none');
        card.style.display = hasVisible ? '' : 'none';
      });

      if (emptyState) emptyState.style.display = visibleCount === 0 ? 'block' : 'none';
    }

    if (searchInput) searchInput.addEventListener('input', filterTable);
    if (clearBtn) clearBtn.addEventListener('click', function() {
      searchInput.value = '';
      filterTable();
      searchInput.focus();
    });
  });
</script>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
PHP;
}

// 1. BHMS
$bhms_body = <<<'PHP'
<section class="py-4">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-8 col-xl-9">
        <div class="syl-header-banner">
          <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
            <div>
              <span class="syl-header-badge mb-2"><i class="fa fa-heartbeat"></i> Homoeopathic Medical College</span>
              <h2 class="h3 mb-1 text-white fw-bold">Bachelor of Homoeopathic Medicine & Surgery (BHMS)</h2>
              <p class="mb-0 text-white-50 small">Sri Satya Sai University of Technology & Medical Sciences - Syllabus & Scheme</p>
            </div>
            <div class="text-end">
              <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold"><i class="fa fa-file-pdf"></i> Verified Syllabi</span>
            </div>
          </div>
        </div>

        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-3">
          <div class="syl-search-box">
            <i class="fa fa-search search-icon"></i>
            <input type="text" id="sylSearch" class="form-control" placeholder="Search BHMS syllabus...">
            <button class="clear-btn" id="sylClearSearch" title="Clear search"><i class="fa fa-times"></i></button>
          </div>
          <div class="text-muted small">Showing <span id="sylCount" class="fw-bold text-dark">4</span> Items</div>
        </div>

        <div class="syl-empty-state" id="sylEmptyState">
          <i class="fa fa-folder-open"></i>
          <h5 class="text-dark fw-bold">No Syllabus Found</h5>
          <p class="text-muted mb-0">No syllabus matches your search query.</p>
        </div>

        <div class="syl-table-card">
          <div class="syl-card-header">
            <h3><i class="fa fa-stethoscope text-primary"></i><span>BHMS Curriculum & Syllabi</span></h3>
            <span class="syl-card-badge">CCH Approved</span>
          </div>
          <div class="syl-table-wrap">
            <table class="syl-table table">
              <thead>
                <tr>
                  <th style="width: 80px;">S.No.</th>
                  <th style="text-align: left;">Program / Document Name</th>
                  <th>Category</th>
                  <th>Download Syllabus</th>
                </tr>
              </thead>
              <tbody>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">1</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">First BHMS (I Year Syllabus)</div><div class="text-muted small">Basic Science, Anatomy, Physiology, Homoeopathic Pharmacy</div></td>
                  <td><span class="badge bg-light text-dark border px-3 py-1 rounded-pill">Year I</span></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/BHMSSY/SY_BHMSI.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> I BHMS Syllabus</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">2</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">CCH Standard Curriculum Guidelines</div><div class="text-muted small">Central Council of Homoeopathy Standard Syllabus Scheme</div></td>
                  <td><span class="badge bg-light text-dark border px-3 py-1 rounded-pill">CCH Guidelines</span></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/BHMSSY/SYBHMS_CCH.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> CCH Syllabus</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">3</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">BHMS Complete Degree Combined Syllabus</div><div class="text-muted small">Complete professional curriculum (I to IV BHMS)</div></td>
                  <td><span class="badge bg-light text-dark border px-3 py-1 rounded-pill">Complete Degree</span></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/IQAC/NAAC/syllabus/BHMS/BHMS SY Combine.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Combined Syllabus</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">4</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">First BHMS Examination Scheme</div><div class="text-muted small">Teaching and Examination Scheme for I BHMS</div></td>
                  <td><span class="badge bg-light text-dark border px-3 py-1 rounded-pill">Scheme</span></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/BHMSSC/SC_BHMSI.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> I BHMS Scheme</a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../../includes/sidebar.php'; ?>
      </div>
    </div>
  </div>
</section>
PHP;

file_put_contents('Download/Syllabus/BHMS.php', get_common_head('Faculty of Homoeopathy (BHMS) Syllabus - SSSUTMS', 'BHMS') . "\n" . $bhms_body . "\n" . get_common_foot());
echo "BHMS.php generated.\n";

// 2. BLibISc
$blib_body = <<<'PHP'
<section class="py-4">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-8 col-xl-9">
        <div class="syl-header-banner">
          <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
            <div>
              <span class="syl-header-badge mb-2"><i class="fa fa-book-reader"></i> Library Science</span>
              <h2 class="h3 mb-1 text-white fw-bold">Bachelor of Library & Information Science (B.Lib.I.Sc.)</h2>
              <p class="mb-0 text-white-50 small">Department of Library & Information Science Syllabus Scheme</p>
            </div>
            <div class="text-end">
              <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold"><i class="fa fa-file-pdf"></i> 2 Verified Syllabi</span>
            </div>
          </div>
        </div>

        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-3">
          <div class="syl-search-box">
            <i class="fa fa-search search-icon"></i>
            <input type="text" id="sylSearch" class="form-control" placeholder="Search semester (e.g. I Sem, II Sem)...">
            <button class="clear-btn" id="sylClearSearch" title="Clear search"><i class="fa fa-times"></i></button>
          </div>
          <div class="text-muted small">Showing <span id="sylCount" class="fw-bold text-dark">2</span> Semesters</div>
        </div>

        <div class="syl-empty-state" id="sylEmptyState">
          <i class="fa fa-folder-open"></i>
          <h5 class="text-dark fw-bold">No Syllabus Found</h5>
          <p class="text-muted mb-0">No syllabus matches your search query.</p>
        </div>

        <div class="syl-table-card">
          <div class="syl-card-header">
            <h3><i class="fa fa-graduation-cap text-primary"></i><span>B.Lib.I.Sc. (1-Year / 2-Semester Program)</span></h3>
            <span class="syl-card-badge">CBCS Scheme</span>
          </div>
          <div class="syl-table-wrap">
            <table class="syl-table table">
              <thead>
                <tr>
                  <th style="width: 80px;">S.No.</th>
                  <th style="text-align: left;">Semester</th>
                  <th>Curriculum Pattern</th>
                  <th>Download Syllabus</th>
                </tr>
              </thead>
              <tbody>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">1</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">First Semester (I Sem)</div><div class="text-muted small">Library, Information & Society, Cataloguing & Classification</div></td>
                  <td><span class="badge bg-primary-subtle text-primary fw-bold px-3 py-1 rounded-pill">CBCS Scheme</span></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/SYBLIB_I.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> I Sem Syllabus</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">2</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">Second Semester (II Sem)</div><div class="text-muted small">Information Sources, Management & ICT in Libraries</div></td>
                  <td><span class="badge bg-primary-subtle text-primary fw-bold px-3 py-1 rounded-pill">CBCS Scheme</span></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/BLIBCII_SYL.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> II Sem Syllabus</a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../../includes/sidebar.php'; ?>
      </div>
    </div>
  </div>
</section>
PHP;

file_put_contents('Download/Syllabus/BLibISc.php', get_common_head('Bachelor of Library & Information Science (B.Lib.I.Sc.) Syllabus - SSSUTMS', 'B.Lib.I.Sc.') . "\n" . $blib_body . "\n" . get_common_foot());
echo "BLibISc.php generated.\n";

// 3. BScHMCS
$hmcs_body = <<<'PHP'
<section class="py-4">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-8 col-xl-9">
        <div class="syl-header-banner">
          <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
            <div>
              <span class="syl-header-badge mb-2"><i class="fa fa-concierge-bell"></i> Hotel Management & Catering Science</span>
              <h2 class="h3 mb-1 text-white fw-bold">B.Sc. Hotel Management & Catering Science (HMCS)</h2>
              <p class="mb-0 text-white-50 small">Faculty of Hotel Management & Catering Technology Syllabus Scheme</p>
            </div>
            <div class="text-end">
              <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold"><i class="fa fa-file-pdf"></i> 6 Verified Syllabi</span>
            </div>
          </div>
        </div>

        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-3">
          <div class="syl-search-box">
            <i class="fa fa-search search-icon"></i>
            <input type="text" id="sylSearch" class="form-control" placeholder="Search semester (e.g. Sem I, Sem IV)...">
            <button class="clear-btn" id="sylClearSearch" title="Clear search"><i class="fa fa-times"></i></button>
          </div>
          <div class="text-muted small">Showing <span id="sylCount" class="fw-bold text-dark">6</span> Semesters</div>
        </div>

        <div class="syl-empty-state" id="sylEmptyState">
          <i class="fa fa-folder-open"></i>
          <h5 class="text-dark fw-bold">No Syllabus Found</h5>
          <p class="text-muted mb-0">No syllabus matches your search query.</p>
        </div>

        <div class="syl-table-card">
          <div class="syl-card-header">
            <h3><i class="fa fa-graduation-cap text-primary"></i><span>B.Sc. (HMCS) - 3-Year Program (6 Semesters)</span></h3>
            <span class="syl-card-badge">CBCS Scheme</span>
          </div>
          <div class="syl-table-wrap">
            <table class="syl-table table">
              <thead>
                <tr>
                  <th style="width: 80px;">S.No.</th>
                  <th style="text-align: left;">Semester</th>
                  <th>Curriculum Pattern</th>
                  <th>Download Syllabus</th>
                </tr>
              </thead>
              <tbody>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">1</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">First Semester (I Sem)</div><div class="text-muted small">Food Production, Front Office, F&B Service Foundation</div></td>
                  <td><span class="badge bg-primary-subtle text-primary fw-bold px-3 py-1 rounded-pill">CBCS Scheme</span></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/Syllabus HMCS/SYHMCS_ICBCS.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> I Sem Syllabus</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">2</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">Second Semester (II Sem)</div><div class="text-muted small">Accommodation Operations, Food Science & Nutrition</div></td>
                  <td><span class="badge bg-primary-subtle text-primary fw-bold px-3 py-1 rounded-pill">CBCS Scheme</span></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/HMCSCII_SYL.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> II Sem Syllabus</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">3</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">Third Semester (III Sem)</div><div class="text-muted small">Hotel Accountancy, Quantity Food Kitchen</div></td>
                  <td><span class="badge bg-primary-subtle text-primary fw-bold px-3 py-1 rounded-pill">CBCS Scheme</span></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/Syllabus HMCS/SYHMCS_III.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> III Sem Syllabus</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">4</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">Fourth Semester (IV Sem)</div><div class="text-muted small">Industrial Training & Professional Internship</div></td>
                  <td><span class="badge bg-primary-subtle text-primary fw-bold px-3 py-1 rounded-pill">CBCS Scheme</span></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/Syllabus HMCS/SYHMCS_IV.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> IV Sem Syllabus</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">5</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">Fifth Semester (V Sem)</div><div class="text-muted small">Advanced Food Production, Hospitality Marketing</div></td>
                  <td><span class="badge bg-primary-subtle text-primary fw-bold px-3 py-1 rounded-pill">CBCS Scheme</span></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/Syllabus HMCS/SYHMCS_5thsem.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> V Sem Syllabus</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">6</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">Sixth Semester (VI Sem)</div><div class="text-muted small">Facility Planning, Food & Beverage Management</div></td>
                  <td><span class="badge bg-primary-subtle text-primary fw-bold px-3 py-1 rounded-pill">CBCS Scheme</span></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/Syllabus HMCS/SYHMCS_6thsem.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> VI Sem Syllabus</a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../../includes/sidebar.php'; ?>
      </div>
    </div>
  </div>
</section>
PHP;

file_put_contents('Download/Syllabus/BScHMCS.php', get_common_head('B.Sc. Hotel Management & Catering Science (HMCS) Syllabus - SSSUTMS', 'B.Sc. (HMCS)') . "\n" . $hmcs_body . "\n" . get_common_foot());
echo "BScHMCS.php generated.\n";

// 4. BScHonsAG
$ag_body = <<<'PHP'
<section class="py-4">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-8 col-xl-9">
        <div class="syl-header-banner">
          <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
            <div>
              <span class="syl-header-badge mb-2"><i class="fa fa-seedling"></i> Faculty of Agriculture</span>
              <h2 class="h3 mb-1 text-white fw-bold">B.Sc. (Hons.) Agriculture Syllabus</h2>
              <p class="mb-0 text-white-50 small">Faculty of Agriculture Syllabus Schemes (CBCS & Traditional 8 Semesters)</p>
            </div>
            <div class="text-end">
              <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold"><i class="fa fa-file-pdf"></i> 16 Verified Syllabi</span>
            </div>
          </div>
        </div>

        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-3">
          <div class="syl-search-box">
            <i class="fa fa-search search-icon"></i>
            <input type="text" id="sylSearch" class="form-control" placeholder="Search semester or scheme (e.g. CBCS, Sem IV)...">
            <button class="clear-btn" id="sylClearSearch" title="Clear search"><i class="fa fa-times"></i></button>
          </div>
          <div class="text-muted small">Showing <span id="sylCount" class="fw-bold text-dark">8</span> Semesters</div>
        </div>

        <div class="syl-quick-nav">
          <a href="#ag-cbcs" class="syl-quick-pill"><i class="fa fa-leaf text-success"></i> B.Sc. (Hons.) Agriculture (Sem I to VIII)</a>
        </div>

        <div class="syl-empty-state" id="sylEmptyState">
          <i class="fa fa-folder-open"></i>
          <h5 class="text-dark fw-bold">No Syllabus Found</h5>
          <p class="text-muted mb-0">No syllabus matches your search query.</p>
        </div>

        <div class="syl-table-card" id="ag-cbcs">
          <div class="syl-card-header">
            <h3><i class="fa fa-graduation-cap text-primary"></i><span>B.Sc. (Hons.) Agriculture - 4-Year Degree (8 Semesters)</span></h3>
            <span class="syl-card-badge">ICAR 5th Deans Committee Compliant</span>
          </div>
          <div class="syl-table-wrap">
            <table class="syl-table table">
              <thead>
                <tr>
                  <th style="width: 80px;">S.No.</th>
                  <th style="text-align: left;">Semester</th>
                  <th>CBCS Scheme Syllabus</th>
                  <th>Non-CBCS Scheme Syllabus</th>
                </tr>
              </thead>
              <tbody>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">1</td>
                  <td style="text-align: left;"><span class="fw-bold text-dark">First Semester (I Sem)</span></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/AG/SY_AG_I.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> CBCS Syllabus (I Sem)</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/SyllabusIIIsem/Syllabus2015/SYAG_I.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Non-CBCS (I Sem)</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">2</td>
                  <td style="text-align: left;"><span class="fw-bold text-dark">Second Semester (II Sem)</span></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/AG/SY_AG_II.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> CBCS Syllabus (II Sem)</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/SyllabusIIIsem/Syllabus2015/SYAG_II.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Non-CBCS (II Sem)</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">3</td>
                  <td style="text-align: left;"><span class="fw-bold text-dark">Third Semester (III Sem)</span></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/AG/SY_AG_III.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> CBCS Syllabus (III Sem)</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/SyllabusIIIsem/Syllabus2015/SYAG_III.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Non-CBCS (III Sem)</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">4</td>
                  <td style="text-align: left;"><span class="fw-bold text-dark">Fourth Semester (IV Sem)</span></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/AG/SY_AG_IV.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> CBCS Syllabus (IV Sem)</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/syllsbus_iv_sem/AG4SEM.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Non-CBCS (IV Sem)</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">5</td>
                  <td style="text-align: left;"><span class="fw-bold text-dark">Fifth Semester (V Sem)</span></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/AG/SY_AG_V.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> CBCS Syllabus (V Sem)</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/BEVSEMSY/AGSYV.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Non-CBCS (V Sem)</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">6</td>
                  <td style="text-align: left;"><span class="fw-bold text-dark">Sixth Semester (VI Sem)</span></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/AG/SY_AG_VI.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> CBCS Syllabus (VI Sem)</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/6 sem syllabus/AG_VISYL.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Non-CBCS (VI Sem)</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">7</td>
                  <td style="text-align: left;"><span class="fw-bold text-dark">Seventh Semester (VII Sem)</span></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/AG/SY_AG_VII.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> CBCS Syllabus (VII Sem)</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/7 sem syllabus/SYAG_VII.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Non-CBCS (VII Sem)</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">8</td>
                  <td style="text-align: left;"><span class="fw-bold text-dark">Eighth Semester (VIII Sem)</span></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/AG/SY_AG_VIII.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> CBCS Syllabus (VIII Sem)</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/7 sem syllabus/AG_VIIIr.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Non-CBCS (VIII Sem)</a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../../includes/sidebar.php'; ?>
      </div>
    </div>
  </div>
</section>
PHP;

file_put_contents('Download/Syllabus/BScHonsAG.php', get_common_head('Faculty of Agriculture (B.Sc. Hons. Agriculture) Syllabus - SSSUTMS', 'B.Sc. (Hons.) Agriculture') . "\n" . $ag_body . "\n" . get_common_foot());
echo "BScHonsAG.php generated.\n";

// 5. Bacheloroflaws_Llb
$law_body = <<<'PHP'
<section class="py-4">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-8 col-xl-9">
        <div class="syl-header-banner">
          <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
            <div>
              <span class="syl-header-badge mb-2"><i class="fa fa-balance-scale"></i> Faculty of Law</span>
              <h2 class="h3 mb-1 text-white fw-bold">Faculty of Law Syllabus Schemes</h2>
              <p class="mb-0 text-white-50 small">LL.B. (3-Year Degree) & B.A. LL.B. (Hons. 5-Year Integrated Degree) Syllabi</p>
            </div>
            <div class="text-end">
              <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold"><i class="fa fa-file-pdf"></i> 8 Verified Syllabi</span>
            </div>
          </div>
        </div>

        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-3">
          <div class="syl-search-box">
            <i class="fa fa-search search-icon"></i>
            <input type="text" id="sylSearch" class="form-control" placeholder="Search program or semester (e.g. LL.B, B.A. LL.B, Sem III)...">
            <button class="clear-btn" id="sylClearSearch" title="Clear search"><i class="fa fa-times"></i></button>
          </div>
          <div class="text-muted small">Showing <span id="sylCount" class="fw-bold text-dark">2</span> Law Programs</div>
        </div>

        <div class="syl-quick-nav">
          <a href="#llb" class="syl-quick-pill"><i class="fa fa-gavel text-warning"></i> LL.B. (3-Year)</a>
          <a href="#ballb" class="syl-quick-pill"><i class="fa fa-university text-warning"></i> B.A. LL.B. (Hons. 5-Year)</a>
        </div>

        <div class="syl-empty-state" id="sylEmptyState">
          <i class="fa fa-folder-open"></i>
          <h5 class="text-dark fw-bold">No Syllabus Found</h5>
          <p class="text-muted mb-0">No syllabus matches your search query.</p>
        </div>

        <!-- Table 1: LL.B. -->
        <div class="syl-table-card" id="llb">
          <div class="syl-card-header">
            <h3><i class="fa fa-gavel text-primary"></i><span>LL.B. (Bachelor of Laws) - 3-Year Program (6 Semesters)</span></h3>
            <span class="syl-card-badge">BCI Approved</span>
          </div>
          <div class="syl-table-wrap">
            <table class="syl-table table">
              <thead>
                <tr>
                  <th style="width: 80px;">S.No.</th>
                  <th style="text-align: left;">Program Name</th>
                  <th>I Sem</th>
                  <th>II Sem</th>
                  <th>III Sem</th>
                  <th>IV Sem</th>
                  <th>V Sem</th>
                  <th>VI Sem</th>
                </tr>
              </thead>
              <tbody>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">1</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">Bachelor of Laws (LL.B.)</div><div class="text-muted small">3-Year Professional Law Degree</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/Syllabus LAW/SYLLBC_I.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/LLBCII_SYL.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/Syllabus LAW/SYLLB_III.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/Syllabus LAW/SYLLB_IV.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/Syllabus LAW/SYLLB_V.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> V Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/Syllabus LAW/SYLLB_VI.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> VI Sem</a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Table 2: B.A. LL.B. -->
        <div class="syl-table-card" id="ballb">
          <div class="syl-card-header">
            <h3><i class="fa fa-university text-primary"></i><span>B.A. LL.B. (Hons.) - 5-Year Integrated Program</span></h3>
            <span class="syl-card-badge">BCI Approved</span>
          </div>
          <div class="syl-table-wrap">
            <table class="syl-table table">
              <thead>
                <tr>
                  <th style="width: 80px;">S.No.</th>
                  <th style="text-align: left;">Program Name</th>
                  <th>I Sem</th>
                  <th>II Sem</th>
                </tr>
              </thead>
              <tbody>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">1</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">B.A. LL.B. (Hons.) Integrated Degree</div><div class="text-muted small">5-Year Integrated Law Degree Course</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/Syllabus LAW/SYBALLBC_I.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/BALLBCII_SYL.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../../includes/sidebar.php'; ?>
      </div>
    </div>
  </div>
</section>
PHP;

file_put_contents('Download/Syllabus/Bacheloroflaws_Llb.php', get_common_head('Faculty of Law (LL.B. & B.A. LL.B.) Syllabus - SSSUTMS', 'Faculty of Law') . "\n" . $law_body . "\n" . get_common_foot());
echo "Bacheloroflaws_Llb.php generated.\n";

// 6. Paramedical
$para_body = <<<'PHP'
<section class="py-4">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-8 col-xl-9">
        <div class="syl-header-banner">
          <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
            <div>
              <span class="syl-header-badge mb-2"><i class="fa fa-user-md"></i> Paramedical Sciences</span>
              <h2 class="h3 mb-1 text-white fw-bold">Faculty of Paramedical Studies Syllabus</h2>
              <p class="mb-0 text-white-50 small">BPT (Physiotherapy), BMLT, DMLT & Paramedical Syllabus Schemes</p>
            </div>
            <div class="text-end">
              <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold"><i class="fa fa-file-pdf"></i> Verified Syllabi</span>
            </div>
          </div>
        </div>

        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-3">
          <div class="syl-search-box">
            <i class="fa fa-search search-icon"></i>
            <input type="text" id="sylSearch" class="form-control" placeholder="Search course (e.g. BPT, BMLT, DMLT)...">
            <button class="clear-btn" id="sylClearSearch" title="Clear search"><i class="fa fa-times"></i></button>
          </div>
          <div class="text-muted small">Showing <span id="sylCount" class="fw-bold text-dark">5</span> Courses</div>
        </div>

        <div class="syl-quick-nav">
          <a href="#bpt" class="syl-quick-pill"><i class="fa fa-wheelchair text-warning"></i> BPT (Physiotherapy)</a>
          <a href="#bmlt" class="syl-quick-pill"><i class="fa fa-vials text-warning"></i> BMLT & DMLT</a>
        </div>

        <div class="syl-empty-state" id="sylEmptyState">
          <i class="fa fa-folder-open"></i>
          <h5 class="text-dark fw-bold">No Syllabus Found</h5>
          <p class="text-muted mb-0">No syllabus matches your search query.</p>
        </div>

        <!-- Table 1: BPT -->
        <div class="syl-table-card" id="bpt">
          <div class="syl-card-header">
            <h3><i class="fa fa-wheelchair text-primary"></i><span>Bachelor of Physiotherapy (BPT) - 4-Year Program</span></h3>
            <span class="syl-card-badge">MPPMR Approved</span>
          </div>
          <div class="syl-table-wrap">
            <table class="syl-table table">
              <thead>
                <tr>
                  <th style="width: 80px;">S.No.</th>
                  <th style="text-align: left;">Program Name</th>
                  <th>I Year</th>
                  <th>II Year</th>
                  <th>III Year</th>
                  <th>IV Year</th>
                </tr>
              </thead>
              <tbody>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">1</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">Bachelor of Physiotherapy (BPT)</div><div class="text-muted small">4-Year Professional Healthcare Degree</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/bpt_1st_year.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> I Year</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/bpt_2nd_year.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> II Year</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/bpt_3rd_year.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> III Year</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/bpt_4th_year.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> IV Year</a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Table 2: BMLT & DMLT -->
        <div class="syl-table-card" id="bmlt">
          <div class="syl-card-header">
            <h3><i class="fa fa-vials text-primary"></i><span>Medical Laboratory Technology (BMLT & DMLT)</span></h3>
            <span class="syl-card-badge">Degree & Diploma Courses</span>
          </div>
          <div class="syl-table-wrap">
            <table class="syl-table table">
              <thead>
                <tr>
                  <th style="width: 80px;">S.No.</th>
                  <th style="text-align: left;">Course Name</th>
                  <th>Duration</th>
                  <th>Download Syllabus</th>
                </tr>
              </thead>
              <tbody>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">1</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">Bachelor of Medical Laboratory Technology (BMLT)</div><div class="text-muted small">Comprehensive 3-Year Undergraduate Curriculum</div></td>
                  <td><span class="badge bg-light text-dark border px-3 py-1 rounded-pill">3-Year UG Degree</span></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/bmlt_syllabus.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> BMLT Syllabus</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">2</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">Diploma in Medical Laboratory Technology (DMLT)</div><div class="text-muted small">2-Year Diploma Program Syllabus</div></td>
                  <td><span class="badge bg-light text-dark border px-3 py-1 rounded-pill">2-Year Diploma</span></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/dmlt_syllabus.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> DMLT Syllabus</a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../../includes/sidebar.php'; ?>
      </div>
    </div>
  </div>
</section>
PHP;

file_put_contents('Download/Syllabus/Paramedical.php', get_common_head('Faculty of Paramedical Studies Syllabus - SSSUTMS', 'Paramedical') . "\n" . $para_body . "\n" . get_common_foot());
echo "Paramedical.php generated.\n";

// 7. Polytechnic_Engineering
$poly_body = <<<'PHP'
<section class="py-4">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-8 col-xl-9">
        <div class="syl-header-banner">
          <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
            <div>
              <span class="syl-header-badge mb-2"><i class="fa fa-cogs"></i> Polytechnic Engineering</span>
              <h2 class="h3 mb-1 text-white fw-bold">Diploma Engineering (Polytechnic) Syllabus</h2>
              <p class="mb-0 text-white-50 small">School of Polytechnic & Diploma Engineering All Branches (Semesters I to VI)</p>
            </div>
            <div class="text-end">
              <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold"><i class="fa fa-file-pdf"></i> 44 Verified Syllabi</span>
            </div>
          </div>
        </div>

        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-3">
          <div class="syl-search-box">
            <i class="fa fa-search search-icon"></i>
            <input type="text" id="sylSearch" class="form-control" placeholder="Search branch (e.g. Civil, Mechanical, CSE, Mining)...">
            <button class="clear-btn" id="sylClearSearch" title="Clear search"><i class="fa fa-times"></i></button>
          </div>
          <div class="text-muted small">Showing <span id="sylCount" class="fw-bold text-dark">7</span> Branches</div>
        </div>

        <div class="syl-quick-nav">
          <a href="#poly-branches" class="syl-quick-pill"><i class="fa fa-cogs text-warning"></i> All Polytechnic Branches</a>
        </div>

        <div class="syl-empty-state" id="sylEmptyState">
          <i class="fa fa-folder-open"></i>
          <h5 class="text-dark fw-bold">No Syllabus Found</h5>
          <p class="text-muted mb-0">No syllabus matches your search query.</p>
        </div>

        <div class="syl-table-card" id="poly-branches">
          <div class="syl-card-header">
            <h3><i class="fa fa-drafting-compass text-primary"></i><span>Diploma in Engineering - All Specializations</span></h3>
            <span class="syl-card-badge">AICTE Approved (3-Year Diploma)</span>
          </div>
          <div class="syl-table-wrap">
            <table class="syl-table table">
              <thead>
                <tr>
                  <th style="width: 60px;">S.No.</th>
                  <th style="text-align: left; min-width: 170px;">Branch / Specialization</th>
                  <th>I Sem</th>
                  <th>II Sem</th>
                  <th>III Sem</th>
                  <th>IV Sem</th>
                  <th>V Sem</th>
                  <th>VI Sem</th>
                </tr>
              </thead>
              <tbody>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">1</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">Civil Engineering</div><div class="text-muted small">Diploma in Civil (DCE)</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLYTECHNIC/SY_DIPLOMA_I.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLYTECHNIC/SY_DIPLOMA_II.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLYTECHNIC/SY_DCE_III.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLYTECHNIC/SY_DCE_IV.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLYTECHNIC/SY_DCE_V.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> V Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLYTECHNIC/SY_DCE_VI.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> VI Sem</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">2</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">Mechanical Engineering</div><div class="text-muted small">Diploma in Mechanical (DME)</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLYTECHNIC/SY_DIPLOMA_I.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLYTECHNIC/SY_DIPLOMA_II.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLYTECHNIC/SY_DME_III.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLYTECHNIC/SY_DME_IV.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLYTECHNIC/SY_DME_V.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> V Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLYTECHNIC/SY_DME_VI.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> VI Sem</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">3</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">Electrical Engineering</div><div class="text-muted small">Diploma in Electrical (DEE)</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLYTECHNIC/SY_DIPLOMA_I.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLYTECHNIC/SY_DIPLOMA_II.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLYTECHNIC/SY_DEE_III.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLYTECHNIC/SY_DEE_IV.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLYTECHNIC/SY_DEE_V.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> V Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLYTECHNIC/SY_DEE_VI.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> VI Sem</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">4</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">Computer Science & Engineering</div><div class="text-muted small">Diploma in CSE (DCSE)</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLYTECHNIC/SY_DIPLOMA_I.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLYTECHNIC/SY_DIPLOMA_II.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLYTECHNIC/SY_DCSE_III.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLYTECHNIC/SY_DCSE_IV.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLYTECHNIC/SY_DCSE_V.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> V Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLYTECHNIC/SY_DCSE_VI.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> VI Sem</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">5</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">Chemical Engineering</div><div class="text-muted small">Diploma in Chemical (DCHE)</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLYTECHNIC/SY_DIPLOMA_I.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLYTECHNIC/SY_DIPLOMA_II.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLYTECHNIC/SY_DCHE_III.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLYTECHNIC/SY_DCHE_IV.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLYTECHNIC/SY_DCHE_V.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> V Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLYTECHNIC/SY_DCHE_VI.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> VI Sem</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">6</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">Mining Engineering</div><div class="text-muted small">Diploma in Mining (DME-Mining)</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLYTECHNIC/SY_DIPLOMA_I.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLYTECHNIC/SY_DIPLOMA_II.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLYTECHNIC/SY_DME_III.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLYTECHNIC/SY_DME_IV.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLYTECHNIC/SY_DME_V.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> V Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLYTECHNIC/SY_DME_VI.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> VI Sem</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">7</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">Electrical & Electronics Engineering</div><div class="text-muted small">Diploma in EEE (DEEE)</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLYTECHNIC/SY_DIPLOMA_I.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLYTECHNIC/SY_DIPLOMA_II.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLYTECHNIC/SY_DEEE_III.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLYTECHNIC/SY_DEEE_IV.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLYTECHNIC/SY_DEEE_V.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> V Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLYTECHNIC/SY_DEEE_VI.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> VI Sem</a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../../includes/sidebar.php'; ?>
      </div>
    </div>
  </div>
</section>
PHP;

file_put_contents('Download/Syllabus/Polytechnic_Engineering.php', get_common_head('Diploma Engineering (Polytechnic) Syllabus - SSSUTMS', 'Diploma Engineering') . "\n" . $poly_body . "\n" . get_common_foot());
echo "Polytechnic_Engineering.php generated.\n";

// 8. UTD
$utd_body = <<<'PHP'
<section class="py-4">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-8 col-xl-9">
        <div class="syl-header-banner">
          <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
            <div>
              <span class="syl-header-badge mb-2"><i class="fa fa-university"></i> University Teaching Departments</span>
              <h2 class="h3 mb-1 text-white fw-bold">University Teaching Departments (UTD) Syllabus</h2>
              <p class="mb-0 text-white-50 small">Syllabus for M.Sc., M.A., M.Com., and NEP 2020 UG Programs (B.A., B.Com., B.Sc., BBA, BCA)</p>
            </div>
            <div class="text-end">
              <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold"><i class="fa fa-file-pdf"></i> 100+ Syllabi</span>
            </div>
          </div>
        </div>

        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-3">
          <div class="syl-search-box">
            <i class="fa fa-search search-icon"></i>
            <input type="text" id="sylSearch" class="form-control" placeholder="Search subject or degree (e.g. Botany, History, NEP, BCA)...">
            <button class="clear-btn" id="sylClearSearch" title="Clear search"><i class="fa fa-times"></i></button>
          </div>
          <div class="text-muted small">Showing <span id="sylCount" class="fw-bold text-dark">30+</span> Programs</div>
        </div>

        <div class="syl-quick-nav">
          <a href="#msc-sec" class="syl-quick-pill"><i class="fa fa-flask text-warning"></i> M.Sc. Programs</a>
          <a href="#ma-sec" class="syl-quick-pill"><i class="fa fa-book text-warning"></i> M.A. & M.Com. Programs</a>
          <a href="#nep-ug-sec" class="syl-quick-pill"><i class="fa fa-graduation-cap text-warning"></i> NEP UG Curriculum</a>
          <a href="#archive-sec" class="syl-quick-pill"><i class="fa fa-archive text-warning"></i> Syllabus Archives</a>
        </div>

        <div class="syl-empty-state" id="sylEmptyState">
          <i class="fa fa-folder-open"></i>
          <h5 class="text-dark fw-bold">No Syllabus Found</h5>
          <p class="text-muted mb-0">No syllabus matches your search query.</p>
        </div>

        <!-- Section 1: M.Sc. -->
        <div class="syl-table-card" id="msc-sec">
          <div class="syl-card-header">
            <h3><i class="fa fa-flask text-primary"></i><span>M.Sc. Post-Graduate Degree Programs (w.e.f. 2022-23)</span></h3>
            <span class="syl-card-badge">Faculty of Science</span>
          </div>
          <div class="syl-table-wrap">
            <table class="syl-table table">
              <thead>
                <tr>
                  <th style="width: 60px;">S.No.</th>
                  <th style="text-align: left; min-width: 170px;">Subject / Branch</th>
                  <th>I Sem</th>
                  <th>II Sem</th>
                  <th>III Sem</th>
                  <th>IV Sem</th>
                </tr>
              </thead>
              <tbody>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">1</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">M.Sc. Botany</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEME/M.SC 2023/BOTANY/MSc Botany 1 Semester 22 SY.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEME/M.SC 2023/BOTANY/MSc Botany 2 Semester 22 SY.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEME/M.SC 2023/BOTANY/MSc BOT III Syllabus 22 SY.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEME/M.SC 2023/BOTANY/MSc BOT IV Syllabus 22 SY new.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">2</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">M.Sc. Chemistry</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEME/M.SC 2023/CHEM/M.Sc. Chemistry  Syllabus 1st sem.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEME/M.SC 2023/CHEM/M.Sc. Chemistry Syllabus 2nd sem.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEME/M.SC 2023/CHEM/M.Sc. Chemistry  Syllabus 3rd sem.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEME/M.SC 2023/CHEM/M.Sc. Chemistry Syllabus 4th Sem.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">3</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">M.Sc. Physics</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEME/M.SC 2023/PHY/M.SC PHY I SEM.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEME/M.SC 2023/PHY/M.SC PHY II SEM.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEME/M.SC 2023/PHY/M.SC PHY III SEM.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEME/M.SC 2023/PHY/M.SC PHY IV SEM.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">4</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">M.Sc. Microbiology</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEME/M.SC 2023/MICROBIOLOGY/MSc I Sem Microbiology Syllabus (1).pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEME/M.SC 2023/MICROBIOLOGY/MSc Microbiology  II Sem Syllabus.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEME/M.SC 2023/MICROBIOLOGY/MSc Microbiology III semester.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEME/M.SC 2023/MICROBIOLOGY/MSC MICRO-4th SEM Final.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">5</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">M.Sc. Zoology</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEME/M.SC 2023/Zoology/MSc Zoology  1 Semeste.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEME/M.SC 2023/Zoology/MSC ZOO 2 SEM.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEME/M.SC 2023/Zoology/Msc Zoology-III SEM.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEME/M.SC 2023/Zoology/MSc- ZOOLOGY 4 syllabus.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">6</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">M.Sc. Computer Science</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEME/M.SC 2023/CS/msc cs 1st sem.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEME/M.SC 2023/CS/MSC_computer_Science 2nd sem syllabus-converted.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEME/M.SC 2023/CS/MSc CS 3rd sem.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEME/M.SC 2023/CS/MSC 4 sem syllabus.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Section 2: M.A. & M.Com. -->
        <div class="syl-table-card" id="ma-sec">
          <div class="syl-card-header">
            <h3><i class="fa fa-book text-primary"></i><span>M.A. & M.Com. Post-Graduate Programs</span></h3>
            <span class="syl-card-badge">Faculty of Arts & Commerce</span>
          </div>
          <div class="syl-table-wrap">
            <table class="syl-table table">
              <thead>
                <tr>
                  <th style="width: 60px;">S.No.</th>
                  <th style="text-align: left; min-width: 170px;">Program / Specialization</th>
                  <th>I Sem</th>
                  <th>II Sem</th>
                  <th>III Sem</th>
                  <th>IV Sem</th>
                </tr>
              </thead>
              <tbody>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">1</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">M.A. English Literature</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/MA_English_Literature_1_21122022_1106.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/MA_English_Literature__2_21122022_1106.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/MA_English_literature_3_21122022_1107.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/MA_English_Literature__4_21122022_1108.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">2</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">M.A. Hindi Literature</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS2021/SY_MA_I_HIN_2021.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS2021/SY_MA_II_HIN_2021.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/MA/ma iii sem syllabus.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS2021/SY_MA_IV_HIN_2021.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">3</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">M.A. History</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/syllabus 2023-24/MA History 1 Semester.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/syllabus 2023-24/ma history 2nd sem syllabus (5).pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/syllabus 2023-24/MA History  3rd sem.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/MA_IV_Sem_History_Syllabus_up_05042025_0449.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">4</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">M.A. Economics</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS2021/SY_MA_I_ECO_2021.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS2021/SY_MA_II_ECO_2021.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/MA/M.A. Economics III sem syllabus .pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS2021/SY_MA_IV_ECO_2021.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">5</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">M.A. Sociology</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS2021/RSY_MA_I_SOC_2021.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS2021/RSY_MA_II_SOC_2021.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS2021/RSY_MA_III_SOC_2021.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS2021/RSY_MA_IV_SOC_2021.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">6</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">M.A. Political Science</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS2021/RSY_MA_I_POLS_2021.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS2021/RSY_MA_II_POLS_2021.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS2021/RSY_MA_III_POLS_2021.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS2021/RSY_MA_IV_POLS_2021.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">7</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">M.A. Psychology</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SY_MA_I_PSY_2021_14022022_1138.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS2021/SY_MA_II_PSY_2021.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS2021/SY_MA_III_PSY_2021_R.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS2021/SY_MA_IV_PSY_2021.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">8</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">Master of Commerce (M.Com.)</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS2021/RSY_MCOM_I_2021.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS2021/RSY_MCOM_II_2021.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS2021/RSY_MCOM_III_2021.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS2021/RSY_MCOM_IV_2021.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Section 3: NEP UG -->
        <div class="syl-table-card" id="nep-ug-sec">
          <div class="syl-card-header">
            <h3><i class="fa fa-award text-primary"></i><span>National Education Policy (NEP 2020) UG Syllabus</span></h3>
            <span class="syl-card-badge">Undergraduate NEP Pattern</span>
          </div>
          <div class="syl-table-wrap">
            <table class="syl-table table">
              <thead>
                <tr>
                  <th style="width: 60px;">S.No.</th>
                  <th style="text-align: left; min-width: 150px;">Undergraduate Program</th>
                  <th>Major Subject</th>
                  <th>Minor Subject</th>
                  <th>Elective Subject</th>
                  <th>Vocational / AEC</th>
                </tr>
              </thead>
              <tbody>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">1</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">Bachelor of Arts (B.A.)</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEMES/UTD2023/Syllabus/B.A/BA 1 ST SEM Mjr.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Major</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEMES/UTD2023/Syllabus/B.A/BA 1 ST SEM Mnr.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Minor</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEMES/UTD2023/Syllabus/B.A/Elective.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Elective</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/NEP/NEP_Voc_BA_I_R.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Vocational</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">2</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">Bachelor of Commerce (B.Com.)</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEMES/UTD2023/Syllabus/B.COM/B.COM IST SEM MAJOR .pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Major</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEMES/UTD2023/Syllabus/B.COM/B.COM IST SEM MINOR.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Minor</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEMES/UTD2023/Syllabus/B.COM/B.COM IST SEM Genric ELECTIVE.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Generic</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/NEP/NEP_Voc_BCOM_I_R.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Vocational</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">3</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">Bachelor of Science (B.Sc.)</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEMES/UTD2023/Syllabus/B.SC/major i sem.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Major</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEMES/UTD2023/Syllabus/B.SC/minor i sem.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Minor</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEMES/UTD2023/Syllabus/B.SC/ELECTIVE.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Elective</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/NEP/NEP_Voc_BSC_I_R.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Vocational</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">4</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">Bachelor of Business Admin (BBA)</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEMES/UTD2023/Syllabus/BBA/MAJOR.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Major</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEMES/UTD2023/Syllabus/BBA/MINOR.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Minor</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEMES/UTD2023/Syllabus/BBA/Elective.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Elective</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/NEP/NEP_Voc_BBA_I_R.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Vocational</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">5</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">Bachelor of Computer Apps (BCA)</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEMES/UTD2023/Syllabus/BCA/MAJOR BCA I Sem Syllabus.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Major</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEMES/UTD2023/Syllabus/BCA/MINOR BCA I Sem Syllabus.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Minor</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEMES/UTD2023/Syllabus/BCA/ELECTIVE BCA I Sem Syllabus.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Elective</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/NEP/NEP_Voc_BCA_I_R.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Vocational</a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Section 4: Traditional UG/PG Archives -->
        <div class="syl-table-card" id="archive-sec">
          <div class="syl-card-header">
            <h3><i class="fa fa-archive text-secondary"></i><span>Curriculum Archives & Package Downloads</span></h3>
            <span class="syl-card-badge">Comprehensive Packages</span>
          </div>
          <div class="syl-table-wrap">
            <table class="syl-table table">
              <thead>
                <tr>
                  <th style="width: 60px;">S.No.</th>
                  <th style="text-align: left;">Curriculum Archive Package</th>
                  <th>Coverage</th>
                  <th>Download Archive</th>
                </tr>
              </thead>
              <tbody>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">1</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">All UG Courses (I Year Package)</div><div class="text-muted small">BA, BCA, BBA, B.Com., B.Sc. Year-1 Package</div></td>
                  <td><span class="badge bg-light text-dark border px-3 py-1 rounded-pill">Year 1</span></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/UTD Syllabus/SYUTDUG_IYwef2017_2_2.zip'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-archive"></i> I Year Package</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">2</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">All UG Courses (II Year Package)</div><div class="text-muted small">BA, BCA, BBA, B.Com., B.Sc. Year-2 Package</div></td>
                  <td><span class="badge bg-light text-dark border px-3 py-1 rounded-pill">Year 2</span></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/UTD Syllabus/SYUTD_UG_II_Year (3)_3.zip'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-archive"></i> II Year Package</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">3</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">All UG Courses (III Year Package)</div><div class="text-muted small">BA, BCA, BBA, B.Com., B.Sc. Year-3 Package</div></td>
                  <td><span class="badge bg-light text-dark border px-3 py-1 rounded-pill">Year 3</span></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/UTD Syllabus/SYUTD_UG_III_Year_3.zip'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-archive"></i> III Year Package</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">4</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">PG Courses (M.A., M.Sc., M.Com. Semesters Package)</div><div class="text-muted small">Postgraduate Syllabi Combined Package</div></td>
                  <td><span class="badge bg-light text-dark border px-3 py-1 rounded-pill">PG Semesters</span></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/sylutd_Ir.zip'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-archive"></i> PG Package</a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../../includes/sidebar.php'; ?>
      </div>
    </div>
  </div>
</section>
PHP;

file_put_contents('Download/Syllabus/UTD.php', get_common_head('University Teaching Departments (UTD) Syllabus - SSSUTMS', 'University Teaching Departments') . "\n" . $utd_body . "\n" . get_common_foot());
echo "UTD.php generated.\n";
