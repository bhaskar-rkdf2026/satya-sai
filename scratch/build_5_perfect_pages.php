<?php

function get_head($page_title, $banner_title, $banner_category = 'Syllabus') {
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

function get_foot() {
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

// 1. BLibISc.php
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
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/BLIB_MLIB SYL/BLISISYLL.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> I Sem Syllabus</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">2</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">Second Semester (II Sem)</div><div class="text-muted small">Information Sources, Management & ICT in Libraries</div></td>
                  <td><span class="badge bg-primary-subtle text-primary fw-bold px-3 py-1 rounded-pill">CBCS Scheme</span></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/BLIB_MLIB SYL/BLISIISYL.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> II Sem Syllabus</a></td>
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

file_put_contents('Download/Syllabus/BLibISc.php', get_head('Bachelor of Library & Information Science (B.Lib.I.Sc.) Syllabus - SSSUTMS', 'B.Lib.I.Sc.') . "\n" . $blib_body . "\n" . get_foot());
echo "BLibISc.php written.\n";

// 2. BScHMCS.php
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
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/BSc HSCS _Syllabus_I_Sem_F.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> I Sem Syllabus</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">2</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">Second Semester (II Sem)</div><div class="text-muted small">Accommodation Operations, Food Science & Nutrition</div></td>
                  <td><span class="badge bg-primary-subtle text-primary fw-bold px-3 py-1 rounded-pill">CBCS Scheme</span></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/BSc HSCS _Syllabus_II_Sem_F.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> II Sem Syllabus</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">3</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">Third Semester (III Sem)</div><div class="text-muted small">Hotel Accountancy, Quantity Food Kitchen</div></td>
                  <td><span class="badge bg-primary-subtle text-primary fw-bold px-3 py-1 rounded-pill">CBCS Scheme</span></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/BSc HSCS _Syllabus_III_Sem_F.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> III Sem Syllabus</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">4</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">Fourth Semester (IV Sem)</div><div class="text-muted small">Industrial Training & Professional Internship</div></td>
                  <td><span class="badge bg-primary-subtle text-primary fw-bold px-3 py-1 rounded-pill">CBCS Scheme</span></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/BSc HSCS _Syllabus_IV_Sem_F.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> IV Sem Syllabus</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">5</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">Fifth Semester (V Sem)</div><div class="text-muted small">Advanced Food Production, Hospitality Marketing</div></td>
                  <td><span class="badge bg-primary-subtle text-primary fw-bold px-3 py-1 rounded-pill">CBCS Scheme</span></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/BSc HSCS _Syllabus_V_Sem_F.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> V Sem Syllabus</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">6</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">Sixth Semester (VI Sem)</div><div class="text-muted small">Facility Planning, Food & Beverage Management</div></td>
                  <td><span class="badge bg-primary-subtle text-primary fw-bold px-3 py-1 rounded-pill">CBCS Scheme</span></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/BSc HSCS _Syllabus_VI_Sem_F.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> VI Sem Syllabus</a></td>
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

file_put_contents('Download/Syllabus/BScHMCS.php', get_head('B.Sc. Hotel Management & Catering Science (HMCS) Syllabus - SSSUTMS', 'B.Sc. (HMCS)') . "\n" . $hmcs_body . "\n" . get_foot());
echo "BScHMCS.php written.\n";

// 3. BScHonsAG.php
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
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/BSCAG/I_Sem_Fifth_Dean_Syllabus.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> CBCS Syllabus (I Sem)</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/BSC(AG)In.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Non-CBCS (I Sem)</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">2</td>
                  <td style="text-align: left;"><span class="fw-bold text-dark">Second Semester (II Sem)</span></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/BSCAG/II_Sem_Fifth_Dean_Syllabus.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> CBCS Syllabus (II Sem)</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/BSC(AG)II.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Non-CBCS (II Sem)</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">3</td>
                  <td style="text-align: left;"><span class="fw-bold text-dark">Third Semester (III Sem)</span></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/BSCAG/III_Sem_Fifth_Dean_Syllabus.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> CBCS Syllabus (III Sem)</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEMES/BSCAG/SYBAG_IIIrr.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Non-CBCS (III Sem)</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">4</td>
                  <td style="text-align: left;"><span class="fw-bold text-dark">Fourth Semester (IV Sem)</span></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/BSCAG/IV_Sem_Fifth_Dean_Syllabus.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> CBCS Syllabus (IV Sem)</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/syllsbus_iv_sem/BSC_AG_IV.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Non-CBCS (IV Sem)</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">5</td>
                  <td style="text-align: left;"><span class="fw-bold text-dark">Fifth Semester (V Sem)</span></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/BSCAG/V_Sem_Fifth_Dean_Syllabus.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> CBCS Syllabus (V Sem)</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/SYBAG_V.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Non-CBCS (V Sem)</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">6</td>
                  <td style="text-align: left;"><span class="fw-bold text-dark">Sixth Semester (VI Sem)</span></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/BSCAG/VI_Sem_Fifth_Dean_Syllabus.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> CBCS Syllabus (VI Sem)</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/SYBAG_VI.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Non-CBCS (VI Sem)</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">7</td>
                  <td style="text-align: left;"><span class="fw-bold text-dark">Seventh Semester (VII Sem)</span></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/BSCAG/VII_Sem_Fifth_Dean_Syllabus.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> CBCS Syllabus (VII Sem)</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/SYBSc(Agri)_7th_ semN-CBCS.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Non-CBCS (VII Sem)</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">8</td>
                  <td style="text-align: left;"><span class="fw-bold text-dark">Eighth Semester (VIII Sem)</span></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/BSCAG/VIII_Sem_Fifth_Dean_Syllabus.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> CBCS Syllabus (VIII Sem)</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/SYAScAg_NonCBCS_8.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Non-CBCS (VIII Sem)</a></td>
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

file_put_contents('Download/Syllabus/BScHonsAG.php', get_head('Faculty of Agriculture (B.Sc. Hons. Agriculture) Syllabus - SSSUTMS', 'B.Sc. (Hons.) Agriculture') . "\n" . $ag_body . "\n" . get_foot());
echo "BScHonsAG.php written.\n";

// 4. Bacheloroflaws_Llb.php
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
          <div class="text-muted small">Showing <span id="sylCount" class="fw-bold text-dark">3</span> Law Curricula</div>
        </div>

        <div class="syl-quick-nav">
          <a href="#llb-sem" class="syl-quick-pill"><i class="fa fa-gavel text-warning"></i> LL.B. (Semester Scheme)</a>
          <a href="#ballb" class="syl-quick-pill"><i class="fa fa-university text-warning"></i> B.A. LL.B. (Hons. 5-Year)</a>
          <a href="#llb-trad" class="syl-quick-pill"><i class="fa fa-history text-warning"></i> LL.B. (Annual Scheme)</a>
        </div>

        <div class="syl-empty-state" id="sylEmptyState">
          <i class="fa fa-folder-open"></i>
          <h5 class="text-dark fw-bold">No Syllabus Found</h5>
          <p class="text-muted mb-0">No syllabus matches your search query.</p>
        </div>

        <!-- Table 1: LL.B. Semester Scheme -->
        <div class="syl-table-card" id="llb-sem">
          <div class="syl-card-header">
            <h3><i class="fa fa-gavel text-primary"></i><span>LL.B. (Bachelor of Laws) - Semester Scheme</span></h3>
            <span class="syl-card-badge">BCI Approved (Semester Pattern)</span>
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
                </tr>
              </thead>
              <tbody>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">1</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">Bachelor of Laws (LL.B.)</div><div class="text-muted small">Semester System Curriculum</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/LLB/LL.B 1SEM SYLLABUS.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> I Sem Syllabus</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/LLB/NEW 2026/LL.B. 2nd sem syllabus (New).pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> II Sem (New)</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/3_semester_syllabus_09072026_0229.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> III Sem Syllabus</a></td>
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
                  <td><a href="<?php echo base_url('assets/images/Files/Link/BALLB/1 sem.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/BALLB/2 sem.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Table 3: LL.B. Annual/Traditional Scheme -->
        <div class="syl-table-card" id="llb-trad">
          <div class="syl-card-header">
            <h3><i class="fa fa-history text-secondary"></i><span>LL.B. - 3-Year Traditional / Annual Pattern</span></h3>
            <span class="syl-card-badge">Annual Pattern</span>
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
                </tr>
              </thead>
              <tbody>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">1</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">LL.B. (3-Year Traditional Scheme)</div><div class="text-muted small">Detailed Year-wise Syllabus</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/LLB/LLB_IYEAR.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> I Year</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/LLB/LLB_IIYEAR.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> II Year</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/LLB/SYLLB_IIIRD YEAR DETAILED  SYLLABUS.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> III Year Detailed</a></td>
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

file_put_contents('Download/Syllabus/Bacheloroflaws_Llb.php', get_head('Faculty of Law (LL.B. & B.A. LL.B.) Syllabus - SSSUTMS', 'Faculty of Law') . "\n" . $law_body . "\n" . get_foot());
echo "Bacheloroflaws_Llb.php written.\n";

// 5. Paramedical.php
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
              <p class="mb-0 text-white-50 small">Paramedical Degree & Diploma Curriculum Packages</p>
            </div>
            <div class="text-end">
              <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold"><i class="fa fa-file-pdf"></i> Verified Syllabi</span>
            </div>
          </div>
        </div>

        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-3">
          <div class="syl-search-box">
            <i class="fa fa-search search-icon"></i>
            <input type="text" id="sylSearch" class="form-control" placeholder="Search program (e.g. First Year, Dialysis)...">
            <button class="clear-btn" id="sylClearSearch" title="Clear search"><i class="fa fa-times"></i></button>
          </div>
          <div class="text-muted small">Showing <span id="sylCount" class="fw-bold text-dark">2</span> Packages</div>
        </div>

        <div class="syl-empty-state" id="sylEmptyState">
          <i class="fa fa-folder-open"></i>
          <h5 class="text-dark fw-bold">No Syllabus Found</h5>
          <p class="text-muted mb-0">No syllabus matches your search query.</p>
        </div>

        <div class="syl-table-card">
          <div class="syl-card-header">
            <h3><i class="fa fa-heartbeat text-primary"></i><span>Paramedical Syllabus Packages</span></h3>
            <span class="syl-card-badge">MPPMR Approved</span>
          </div>
          <div class="syl-table-wrap">
            <table class="syl-table table">
              <thead>
                <tr>
                  <th style="width: 80px;">S.No.</th>
                  <th style="text-align: left;">Course / Package Name</th>
                  <th>Coverage</th>
                  <th>Download Syllabus</th>
                </tr>
              </thead>
              <tbody>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">1</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">Paramedical Courses First Year Package</div><div class="text-muted small">Complete First Year Syllabus for Paramedical Degree & Diploma Courses</div></td>
                  <td><span class="badge bg-primary-subtle text-primary fw-bold px-3 py-1 rounded-pill">Year 1 All Courses</span></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/PARAMEDICAL/First Year 2016-17 (2).zip'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-archive"></i> I Year Syllabus Package</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">2</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">Diploma in Dialysis Technology</div><div class="text-muted small">Complete I & II Year Syllabus Package for Dialysis Technology</div></td>
                  <td><span class="badge bg-primary-subtle text-primary fw-bold px-3 py-1 rounded-pill">I & II Year</span></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/PARAMEDICAL/Syllabus Dialysis_I_II_Year.zip'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-archive"></i> Dialysis Tech Syllabus</a></td>
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

file_put_contents('Download/Syllabus/Paramedical.php', get_head('Faculty of Paramedical Studies Syllabus - SSSUTMS', 'Paramedical') . "\n" . $para_body . "\n" . get_foot());
echo "Paramedical.php written.\n";

