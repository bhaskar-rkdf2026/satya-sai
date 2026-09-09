<?php

// Standard Button CSS
$btn_css = <<<'CSS'
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
CSS;

// 1. BHMCT
$bhmct_code = <<<'PHP'
<?php
$page_title = 'Faculty of Hotel Management & Catering Technology Syllabus - SSSUTMS';
$banner_title = 'BHMCT';
$banner_category = 'Syllabus';

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

<section class="py-4">
  <div class="container">
    <div class="row g-4">

      <!-- Main Content Column (Left) -->
      <div class="col-lg-8 col-xl-9">

        <!-- Header Banner -->
        <div class="syl-header-banner">
          <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
            <div>
              <span class="syl-header-badge mb-2">
                <i class="fa fa-utensils"></i> Hotel Management
              </span>
              <h2 class="h3 mb-1 text-white fw-bold">Bachelor of Hotel Management & Catering Technology</h2>
              <p class="mb-0 text-white-50 small">Department of Hotel Management & Catering Technology Syllabus Scheme</p>
            </div>
            <div class="text-end">
              <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold">
                <i class="fa fa-file-pdf"></i> 16 Verified Syllabi
              </span>
            </div>
          </div>
        </div>

        <!-- Controls: Search & Live Info -->
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-3">
          <div class="syl-search-box">
            <i class="fa fa-search search-icon"></i>
            <input type="text" id="sylSearch" class="form-control" placeholder="Search semester or scheme (e.g. CBCS, Sem IV)...">
            <button class="clear-btn" id="sylClearSearch" title="Clear search">
              <i class="fa fa-times"></i>
            </button>
          </div>
          <div class="text-muted small">
            Showing <span id="sylCount" class="fw-bold text-dark">8</span> Semesters
          </div>
        </div>

        <!-- Quick Navigation -->
        <div class="syl-quick-nav">
          <a href="#bhmct-cbcs" class="syl-quick-pill"><i class="fa fa-table"></i> BHMCT (Sem I to VIII)</a>
        </div>

        <!-- Empty State -->
        <div class="syl-empty-state" id="sylEmptyState">
          <i class="fa fa-folder-open"></i>
          <h5 class="text-dark fw-bold">No Syllabus Found</h5>
          <p class="text-muted mb-0">No syllabus matches your search query. Try searching for a different keyword or semester.</p>
        </div>

        <!-- Table 1: BHMCT 8 Semesters -->
        <div class="syl-table-card" id="bhmct-cbcs">
          <div class="syl-card-header">
            <h3>
              <i class="fa fa-graduation-cap text-primary"></i>
              <span>BHMCT (Bachelor of Hotel Management & Catering Technology)</span>
            </h3>
            <span class="syl-card-badge">4-Year Degree (8 Semesters)</span>
          </div>
          <div class="syl-table-wrap">
            <table class="syl-table table">
              <thead>
                <tr>
                  <th style="width: 80px;">S.No.</th>
                  <th style="text-align: left;">Semester / Level</th>
                  <th>CBCS Scheme Syllabus</th>
                  <th>Non-CBCS Scheme Syllabus</th>
                </tr>
              </thead>
              <tbody>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">1</td>
                  <td style="text-align: left;">
                    <span class="fw-bold text-dark">First Semester (I Sem)</span>
                  </td>
                  <td>
                    <a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/BHMCT_ISYLCBCS.pdf'); ?>" target="_blank" class="syl-btn">
                      <i class="fa fa-file-pdf"></i> CBCS Syllabus (I Sem)
                    </a>
                  </td>
                  <td>
                    <a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/SyllabusIIIsem/Syllabus2015/SYHM_I.pdf'); ?>" target="_blank" class="syl-btn">
                      <i class="fa fa-file-pdf"></i> Non-CBCS (I Sem)
                    </a>
                  </td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">2</td>
                  <td style="text-align: left;">
                    <span class="fw-bold text-dark">Second Semester (II Sem)</span>
                  </td>
                  <td>
                    <a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/BHMCTII_SYL.pdf'); ?>" target="_blank" class="syl-btn">
                      <i class="fa fa-file-pdf"></i> CBCS Syllabus (II Sem)
                    </a>
                  </td>
                  <td>
                    <a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/SyllabusIIIsem/Syllabus2015/SYHM_II.pdf'); ?>" target="_blank" class="syl-btn">
                      <i class="fa fa-file-pdf"></i> Non-CBCS (II Sem)
                    </a>
                  </td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">3</td>
                  <td style="text-align: left;">
                    <span class="fw-bold text-dark">Third Semester (III Sem)</span>
                  </td>
                  <td>
                    <a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/Syllabus HMCT/SYHM_III.pdf'); ?>" target="_blank" class="syl-btn">
                      <i class="fa fa-file-pdf"></i> CBCS Syllabus (III Sem)
                    </a>
                  </td>
                  <td>
                    <a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/SyllabusIIIsem/Syllabus2015/SYHM_III.pdf'); ?>" target="_blank" class="syl-btn">
                      <i class="fa fa-file-pdf"></i> Non-CBCS (III Sem)
                    </a>
                  </td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">4</td>
                  <td style="text-align: left;">
                    <span class="fw-bold text-dark">Fourth Semester (IV Sem)</span>
                  </td>
                  <td>
                    <a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/Syllabus HMCT/SYBHMCT_IV.pdf'); ?>" target="_blank" class="syl-btn">
                      <i class="fa fa-file-pdf"></i> CBCS Syllabus (IV Sem)
                    </a>
                  </td>
                  <td>
                    <a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/syllsbus_iv_sem/BHMCT123SEM.pdf'); ?>" target="_blank" class="syl-btn">
                      <i class="fa fa-file-pdf"></i> Non-CBCS (IV Sem)
                    </a>
                  </td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">5</td>
                  <td style="text-align: left;">
                    <span class="fw-bold text-dark">Fifth Semester (V Sem)</span>
                  </td>
                  <td>
                    <a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/Syllabus HMCT/SYBHMCT_5thsem.pdf'); ?>" target="_blank" class="syl-btn">
                      <i class="fa fa-file-pdf"></i> CBCS Syllabus (V Sem)
                    </a>
                  </td>
                  <td>
                    <a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/BEVSEMSY/BHMCTSYV.pdf'); ?>" target="_blank" class="syl-btn">
                      <i class="fa fa-file-pdf"></i> Non-CBCS (V Sem)
                    </a>
                  </td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">6</td>
                  <td style="text-align: left;">
                    <span class="fw-bold text-dark">Sixth Semester (VI Sem)</span>
                  </td>
                  <td>
                    <a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/Syllabus HMCT/SYBHMCT_6thsem.pdf'); ?>" target="_blank" class="syl-btn">
                      <i class="fa fa-file-pdf"></i> CBCS Syllabus (VI Sem)
                    </a>
                  </td>
                  <td>
                    <a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/6 sem syllabus/BHMCT_VISYL.pdf'); ?>" target="_blank" class="syl-btn">
                      <i class="fa fa-file-pdf"></i> Non-CBCS (VI Sem)
                    </a>
                  </td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">7</td>
                  <td style="text-align: left;">
                    <span class="fw-bold text-dark">Seventh Semester (VII Sem)</span>
                  </td>
                  <td>
                    <a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/Syllabus HMCT/SYBHMCT_7thsem.pdf'); ?>" target="_blank" class="syl-btn">
                      <i class="fa fa-file-pdf"></i> CBCS Syllabus (VII Sem)
                    </a>
                  </td>
                  <td>
                    <a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/7 sem syllabus/SYHM_VII.pdf'); ?>" target="_blank" class="syl-btn">
                      <i class="fa fa-file-pdf"></i> Non-CBCS (VII Sem)
                    </a>
                  </td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">8</td>
                  <td style="text-align: left;">
                    <span class="fw-bold text-dark">Eighth Semester (VIII Sem)</span>
                  </td>
                  <td>
                    <a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/Syllabus HMCT/SYBHMCT_8thsem.pdf'); ?>" target="_blank" class="syl-btn">
                      <i class="fa fa-file-pdf"></i> CBCS Syllabus (VIII Sem)
                    </a>
                  </td>
                  <td>
                    <a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/7 sem syllabus/BHMCT_VIIIr.pdf'); ?>" target="_blank" class="syl-btn">
                      <i class="fa fa-file-pdf"></i> Non-CBCS (VIII Sem)
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

      </div>

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

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

      countDisplay.textContent = visibleCount;

      // Handle card empty visibility
      document.querySelectorAll('.syl-table-card').forEach(card => {
        const cardRows = card.querySelectorAll('.syl-row');
        const hasVisible = Array.from(cardRows).some(r => r.style.display !== 'none');
        card.style.display = hasVisible ? '' : 'none';
      });

      emptyState.style.display = visibleCount === 0 ? 'block' : 'none';
    }

    searchInput.addEventListener('input', filterTable);
    clearBtn.addEventListener('click', function() {
      searchInput.value = '';
      filterTable();
      searchInput.focus();
    });
  });
</script>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
PHP;

file_put_contents('Download/Syllabus/BHMCT.php', $bhmct_code);
echo "BHMCT.php updated.\n";

// 2. MBA
$mba_code = <<<'PHP'
<?php
$page_title = 'Faculty of Management Studies (MBA) Syllabus - SSSUTMS';
$banner_title = 'MBA';
$banner_category = 'Syllabus';

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
    padding: 12px 14px;
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

<section class="py-4">
  <div class="container">
    <div class="row g-4">

      <!-- Main Content Column (Left) -->
      <div class="col-lg-8 col-xl-9">

        <!-- Header Banner -->
        <div class="syl-header-banner">
          <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
            <div>
              <span class="syl-header-badge mb-2">
                <i class="fa fa-briefcase"></i> Management Studies
              </span>
              <h2 class="h3 mb-1 text-white fw-bold">Master of Business Administration (MBA)</h2>
              <p class="mb-0 text-white-50 small">MBA Regular (CBCS & Non-CBCS) and MBA Part-Time Syllabus Scheme</p>
            </div>
            <div class="text-end">
              <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold">
                <i class="fa fa-file-pdf"></i> 12 Verified Syllabi
              </span>
            </div>
          </div>
        </div>

        <!-- Controls: Search & Live Info -->
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-3">
          <div class="syl-search-box">
            <i class="fa fa-search search-icon"></i>
            <input type="text" id="sylSearch" class="form-control" placeholder="Search program, semester or scheme (e.g. CBCS, Part-Time)...">
            <button class="clear-btn" id="sylClearSearch" title="Clear search">
              <i class="fa fa-times"></i>
            </button>
          </div>
          <div class="text-muted small">
            Showing <span id="sylCount" class="fw-bold text-dark">3</span> Programs
          </div>
        </div>

        <!-- Quick Navigation -->
        <div class="syl-quick-nav">
          <a href="#mba-cbcs" class="syl-quick-pill"><i class="fa fa-star text-warning"></i> MBA (CBCS)</a>
          <a href="#mba-noncbcs" class="syl-quick-pill"><i class="fa fa-book"></i> MBA (Non-CBCS)</a>
          <a href="#mba-parttime" class="syl-quick-pill"><i class="fa fa-clock"></i> MBA (Part-Time)</a>
        </div>

        <!-- Empty State -->
        <div class="syl-empty-state" id="sylEmptyState">
          <i class="fa fa-folder-open"></i>
          <h5 class="text-dark fw-bold">No Syllabus Found</h5>
          <p class="text-muted mb-0">No syllabus matches your search query. Try searching for a different keyword or semester.</p>
        </div>

        <!-- Table 1: MBA CBCS -->
        <div class="syl-table-card" id="mba-cbcs">
          <div class="syl-card-header">
            <h3>
              <i class="fa fa-graduation-cap text-primary"></i>
              <span>MBA (CBCS Scheme) - 2-Year Program</span>
            </h3>
            <span class="syl-card-badge">Choice Based Credit System</span>
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
                </tr>
              </thead>
              <tbody>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">1</td>
                  <td style="text-align: left;">
                    <div class="fw-bold text-dark">Master of Business Administration</div>
                    <div class="text-muted small">MBA 2-Year Full-Time (CBCS Pattern)</div>
                  </td>
                  <td>
                    <a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/Syllabus MBA/SYMBA_ICBCS.pdf'); ?>" target="_blank" class="syl-btn">
                      <i class="fa fa-file-pdf"></i> I Sem
                    </a>
                  </td>
                  <td>
                    <a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/MBACII_SYL.pdf'); ?>" target="_blank" class="syl-btn">
                      <i class="fa fa-file-pdf"></i> II Sem
                    </a>
                  </td>
                  <td>
                    <a href="<?php echo base_url('assets/images/Files/Link/CBCS SYLLABUS/Syllabus MBA/SYMBACnr_III_R.pdf'); ?>" target="_blank" class="syl-btn">
                      <i class="fa fa-file-pdf"></i> III Sem
                    </a>
                  </td>
                  <td>
                    <a href="<?php echo base_url('assets/images/Files/Link/CBCS SYLLABUS/Syllabus MBA/SYMBAnr_IV_R.pdf'); ?>" target="_blank" class="syl-btn">
                      <i class="fa fa-file-pdf"></i> IV Sem
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Table 2: MBA Non-CBCS -->
        <div class="syl-table-card" id="mba-noncbcs">
          <div class="syl-card-header">
            <h3>
              <i class="fa fa-book text-secondary"></i>
              <span>MBA (Non-CBCS Scheme) - 2-Year Traditional Program</span>
            </h3>
            <span class="syl-card-badge">Non-CBCS Pattern</span>
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
                </tr>
              </thead>
              <tbody>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">1</td>
                  <td style="text-align: left;">
                    <div class="fw-bold text-dark">Master of Business Administration</div>
                    <div class="text-muted small">MBA 2-Year Full-Time (Non-CBCS Pattern)</div>
                  </td>
                  <td>
                    <a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/SY_MBA_I.pdf'); ?>" target="_blank" class="syl-btn">
                      <i class="fa fa-file-pdf"></i> I Sem
                    </a>
                  </td>
                  <td>
                    <a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/Syllabus II sem/SY_MBA_II.docx'); ?>" target="_blank" class="syl-btn">
                      <i class="fa fa-file-word"></i> II Sem
                    </a>
                  </td>
                  <td>
                    <a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/SyllabusIIIsem/Syllabus2015/Management/MBAIIISEMSS.pdf'); ?>" target="_blank" class="syl-btn">
                      <i class="fa fa-file-pdf"></i> III Sem
                    </a>
                  </td>
                  <td>
                    <a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/SyllabusIIIsem/Syllabus2015/Management/MBA4Syl.pdf'); ?>" target="_blank" class="syl-btn">
                      <i class="fa fa-file-pdf"></i> IV Sem
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Table 3: MBA Part-Time -->
        <div class="syl-table-card" id="mba-parttime">
          <div class="syl-card-header">
            <h3>
              <i class="fa fa-clock text-primary"></i>
              <span>MBA Part-Time (3-Year Program)</span>
            </h3>
            <span class="syl-card-badge">Evening / Working Professional</span>
          </div>
          <div class="syl-table-wrap">
            <table class="syl-table table">
              <thead>
                <tr>
                  <th style="width: 80px;">S.No.</th>
                  <th style="text-align: left;">Program Name</th>
                  <th>I Sem</th>
                  <th>II Sem</th>
                  <th>V Sem</th>
                  <th>VI Sem</th>
                </tr>
              </thead>
              <tbody>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">1</td>
                  <td style="text-align: left;">
                    <div class="fw-bold text-dark">Master of Business Administration (Part-Time)</div>
                    <div class="text-muted small">MBA 3-Year Extended Degree Program</div>
                  </td>
                  <td>
                    <a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/SY_MBAPT_I.pdf'); ?>" target="_blank" class="syl-btn">
                      <i class="fa fa-file-pdf"></i> I Sem
                    </a>
                  </td>
                  <td>
                    <a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/Syllabus II sem/MBAPT_II.docx'); ?>" target="_blank" class="syl-btn">
                      <i class="fa fa-file-word"></i> II Sem
                    </a>
                  </td>
                  <td>
                    <a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/6 sem syllabus/MBAP_V.pdf'); ?>" target="_blank" class="syl-btn">
                      <i class="fa fa-file-pdf"></i> V Sem
                    </a>
                  </td>
                  <td>
                    <a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/6 sem syllabus/MBAP_VI.pdf'); ?>" target="_blank" class="syl-btn">
                      <i class="fa fa-file-pdf"></i> VI Sem
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

      </div>

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

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

      countDisplay.textContent = visibleCount;

      // Handle card empty visibility
      document.querySelectorAll('.syl-table-card').forEach(card => {
        const cardRows = card.querySelectorAll('.syl-row');
        const hasVisible = Array.from(cardRows).some(r => r.style.display !== 'none');
        card.style.display = hasVisible ? '' : 'none';
      });

      emptyState.style.display = visibleCount === 0 ? 'block' : 'none';
    }

    searchInput.addEventListener('input', filterTable);
    clearBtn.addEventListener('click', function() {
      searchInput.value = '';
      filterTable();
      searchInput.focus();
    });
  });
</script>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
PHP;

file_put_contents('Download/Syllabus/MBA.php', $mba_code);
echo "MBA.php updated.\n";

// 3. MCA
$mca_code = <<<'PHP'
<?php
$page_title = 'Faculty of Computer Applications (MCA) Syllabus - SSSUTMS';
$banner_title = 'MCA';
$banner_category = 'Syllabus';

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
    padding: 12px 14px;
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

<section class="py-4">
  <div class="container">
    <div class="row g-4">

      <!-- Main Content Column (Left) -->
      <div class="col-lg-8 col-xl-9">

        <!-- Header Banner -->
        <div class="syl-header-banner">
          <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
            <div>
              <span class="syl-header-badge mb-2">
                <i class="fa fa-laptop-code"></i> Computer Applications
              </span>
              <h2 class="h3 mb-1 text-white fw-bold">Master of Computer Applications (MCA)</h2>
              <p class="mb-0 text-white-50 small">MCA 2-Year (w.e.f. 2023-24 & 2020-21) and Traditional 3-Year Syllabus Schemes</p>
            </div>
            <div class="text-end">
              <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold">
                <i class="fa fa-file-pdf"></i> 14 Verified Syllabi
              </span>
            </div>
          </div>
        </div>

        <!-- Controls: Search & Live Info -->
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-3">
          <div class="syl-search-box">
            <i class="fa fa-search search-icon"></i>
            <input type="text" id="sylSearch" class="form-control" placeholder="Search MCA scheme or semester (e.g. 2024, 2-Year, III Sem)...">
            <button class="clear-btn" id="sylClearSearch" title="Clear search">
              <i class="fa fa-times"></i>
            </button>
          </div>
          <div class="text-muted small">
            Showing <span id="sylCount" class="fw-bold text-dark">3</span> Schemes
          </div>
        </div>

        <!-- Quick Navigation -->
        <div class="syl-quick-nav">
          <a href="#mca-2024" class="syl-quick-pill"><i class="fa fa-star text-warning"></i> MCA 2-Yr (w.e.f. 2023-24)</a>
          <a href="#mca-2020" class="syl-quick-pill"><i class="fa fa-code-branch"></i> MCA 2-Yr (w.e.f. 2020-21)</a>
          <a href="#mca-3yr" class="syl-quick-pill"><i class="fa fa-history"></i> MCA 3-Yr Scheme</a>
        </div>

        <!-- Empty State -->
        <div class="syl-empty-state" id="sylEmptyState">
          <i class="fa fa-folder-open"></i>
          <h5 class="text-dark fw-bold">No Syllabus Found</h5>
          <p class="text-muted mb-0">No syllabus matches your search query. Try searching for a different keyword or semester.</p>
        </div>

        <!-- Table 1: MCA 2-Year (w.e.f. 2023-24) -->
        <div class="syl-table-card" id="mca-2024">
          <div class="syl-card-header">
            <h3>
              <i class="fa fa-code text-primary"></i>
              <span>MCA 2-Year Program (w.e.f. Academic Session 2023-24)</span>
            </h3>
            <span class="syl-card-badge">Latest Curriculum</span>
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
                </tr>
              </thead>
              <tbody>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">1</td>
                  <td style="text-align: left;">
                    <div class="fw-bold text-dark">Master of Computer Applications (MCA)</div>
                    <div class="text-muted small">2-Year Degree Course (w.e.f. 2023-24)</div>
                  </td>
                  <td>
                    <a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/MCA 2024/MCA I SEM SYLLABUS 2023-24.pdf'); ?>" target="_blank" class="syl-btn">
                      <i class="fa fa-file-pdf"></i> I Sem
                    </a>
                  </td>
                  <td>
                    <a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/MCA 2024/MCA_II_SEM SYLLABUS 2023-24.pdf'); ?>" target="_blank" class="syl-btn">
                      <i class="fa fa-file-pdf"></i> II Sem
                    </a>
                  </td>
                  <td>
                    <a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/MCA 2024/MCA_III_SEM SYLLABUS 2023-24.pdf'); ?>" target="_blank" class="syl-btn">
                      <i class="fa fa-file-pdf"></i> III Sem
                    </a>
                  </td>
                  <td>
                    <a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/MCA 2024/MCA IV SEM SYLLABUS 2023-24.pdf'); ?>" target="_blank" class="syl-btn">
                      <i class="fa fa-file-pdf"></i> IV Sem
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Table 2: MCA 2-Year (w.e.f. 2020-21) -->
        <div class="syl-table-card" id="mca-2020">
          <div class="syl-card-header">
            <h3>
              <i class="fa fa-laptop-code text-primary"></i>
              <span>MCA 2-Year Program (w.e.f. Academic Session 2020-21)</span>
            </h3>
            <span class="syl-card-badge">2-Year CBCS Scheme</span>
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
                </tr>
              </thead>
              <tbody>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">1</td>
                  <td style="text-align: left;">
                    <div class="fw-bold text-dark">Master of Computer Applications (MCA)</div>
                    <div class="text-muted small">2-Year Degree Course (w.e.f. 2020-21)</div>
                  </td>
                  <td>
                    <a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/MCA2yr_I_SYLLABUS.pdf'); ?>" target="_blank" class="syl-btn">
                      <i class="fa fa-file-pdf"></i> I Sem
                    </a>
                  </td>
                  <td>
                    <a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/MCA2yr_II_SYLLABUS.pdf'); ?>" target="_blank" class="syl-btn">
                      <i class="fa fa-file-pdf"></i> II Sem
                    </a>
                  </td>
                  <td>
                    <a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS2021/SY_MCA_III_2021.pdf'); ?>" target="_blank" class="syl-btn">
                      <i class="fa fa-file-pdf"></i> III Sem
                    </a>
                  </td>
                  <td>
                    <a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS2021/SY_MCA_IV_2021.pdf'); ?>" target="_blank" class="syl-btn">
                      <i class="fa fa-file-pdf"></i> IV Sem
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Table 3: MCA 3-Year Scheme -->
        <div class="syl-table-card" id="mca-3yr">
          <div class="syl-card-header">
            <h3>
              <i class="fa fa-history text-secondary"></i>
              <span>MCA 3-Year Traditional Scheme</span>
            </h3>
            <span class="syl-card-badge">3-Year Program</span>
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
                </tr>
              </thead>
              <tbody>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">1</td>
                  <td style="text-align: left;">
                    <div class="fw-bold text-dark">MCA (3-Year Traditional Curriculum)</div>
                    <div class="text-muted small">Semesters I to V Syllabi</div>
                  </td>
                  <td>
                    <a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/SY_MCA_I.pdf'); ?>" target="_blank" class="syl-btn">
                      <i class="fa fa-file-pdf"></i> I Sem
                    </a>
                  </td>
                  <td>
                    <a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/Syllabus II sem/SY_MCA_II.docx'); ?>" target="_blank" class="syl-btn">
                      <i class="fa fa-file-word"></i> II Sem
                    </a>
                  </td>
                  <td>
                    <div class="d-flex flex-column gap-2">
                      <a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/SyllabusIIIsem/SYMCA_IIIwef2017.pdf'); ?>" target="_blank" class="syl-btn">
                        <i class="fa fa-file-pdf"></i> III (2017)
                      </a>
                      <a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/SyllabusIIIsem/Syllabus2015/SYNMCA_III.pdf'); ?>" target="_blank" class="syl-btn">
                        <i class="fa fa-file-pdf"></i> III (2015)
                      </a>
                    </div>
                  </td>
                  <td>
                    <a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/syllsbus_iv_sem/mca_iv.pdf'); ?>" target="_blank" class="syl-btn">
                      <i class="fa fa-file-pdf"></i> IV Sem
                    </a>
                  </td>
                  <td>
                    <a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/BEVSEMSY/MCAVSY.pdf'); ?>" target="_blank" class="syl-btn">
                      <i class="fa fa-file-pdf"></i> V Sem
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

      </div>

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

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

      countDisplay.textContent = visibleCount;

      // Handle card empty visibility
      document.querySelectorAll('.syl-table-card').forEach(card => {
        const cardRows = card.querySelectorAll('.syl-row');
        const hasVisible = Array.from(cardRows).some(r => r.style.display !== 'none');
        card.style.display = hasVisible ? '' : 'none';
      });

      emptyState.style.display = visibleCount === 0 ? 'block' : 'none';
    }

    searchInput.addEventListener('input', filterTable);
    clearBtn.addEventListener('click', function() {
      searchInput.value = '';
      filterTable();
      searchInput.focus();
    });
  });
</script>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
PHP;

file_put_contents('Download/Syllabus/MCA.php', $mca_code);
echo "MCA.php updated.\n";

// 4. Physical Education
$pe_code = <<<'PHP'
<?php
$page_title = 'Faculty of Physical Education Syllabus - SSSUTMS';
$banner_title = 'Physical Education';
$banner_category = 'Syllabus';

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
    padding: 12px 14px;
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

<section class="py-4">
  <div class="container">
    <div class="row g-4">

      <!-- Main Content Column (Left) -->
      <div class="col-lg-8 col-xl-9">

        <!-- Header Banner -->
        <div class="syl-header-banner">
          <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
            <div>
              <span class="syl-header-badge mb-2">
                <i class="fa fa-running"></i> Physical Education & Sports
              </span>
              <h2 class="h3 mb-1 text-white fw-bold">Faculty of Physical Education</h2>
              <p class="mb-0 text-white-50 small">B.P.Ed. (Bachelor of Physical Education) & B.P.E.S. (Physical Education & Sports) Syllabus</p>
            </div>
            <div class="text-end">
              <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold">
                <i class="fa fa-file-pdf"></i> 6 Verified Syllabi
              </span>
            </div>
          </div>
        </div>

        <!-- Controls: Search & Live Info -->
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-3">
          <div class="syl-search-box">
            <i class="fa fa-search search-icon"></i>
            <input type="text" id="sylSearch" class="form-control" placeholder="Search program or degree (e.g. B.P.Ed, BPES, Year)...">
            <button class="clear-btn" id="sylClearSearch" title="Clear search">
              <i class="fa fa-times"></i>
            </button>
          </div>
          <div class="text-muted small">
            Showing <span id="sylCount" class="fw-bold text-dark">4</span> Program Rows
          </div>
        </div>

        <!-- Quick Navigation -->
        <div class="syl-quick-nav">
          <a href="#bped" class="syl-quick-pill"><i class="fa fa-dumbbell text-warning"></i> B.P.Ed. Programs</a>
          <a href="#bpes" class="syl-quick-pill"><i class="fa fa-medal text-warning"></i> B.P.E.S. Programs</a>
        </div>

        <!-- Empty State -->
        <div class="syl-empty-state" id="sylEmptyState">
          <i class="fa fa-folder-open"></i>
          <h5 class="text-dark fw-bold">No Syllabus Found</h5>
          <p class="text-muted mb-0">No syllabus matches your search query. Try searching for a different keyword or program.</p>
        </div>

        <!-- Table 1: B.P.Ed. -->
        <div class="syl-table-card" id="bped">
          <div class="syl-card-header">
            <h3>
              <i class="fa fa-dumbbell text-primary"></i>
              <span>B.P.Ed. (Bachelor of Physical Education) - 2-Year Program</span>
            </h3>
            <span class="syl-card-badge">NCTE Approved</span>
          </div>
          <div class="syl-table-wrap">
            <table class="syl-table table">
              <thead>
                <tr>
                  <th style="width: 80px;">S.No.</th>
                  <th style="text-align: left;">Program Name</th>
                  <th>Curriculum Pattern</th>
                  <th>Download Syllabus</th>
                </tr>
              </thead>
              <tbody>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">1</td>
                  <td style="text-align: left;">
                    <div class="fw-bold text-dark">Bachelor of Physical Education (B.P.Ed.)</div>
                    <div class="text-muted small">CBCS Semester Scheme</div>
                  </td>
                  <td>
                    <span class="badge bg-primary-subtle text-primary fw-bold px-3 py-1 rounded-pill">CBCS Scheme</span>
                  </td>
                  <td>
                    <a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/bped_cbcs.pdf'); ?>" target="_blank" class="syl-btn">
                      <i class="fa fa-file-pdf"></i> B.P.Ed. (CBCS)
                    </a>
                  </td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">2</td>
                  <td style="text-align: left;">
                    <div class="fw-bold text-dark">Bachelor of Physical Education (B.P.Ed.)</div>
                    <div class="text-muted small">General Curriculum Scheme</div>
                  </td>
                  <td>
                    <span class="badge bg-secondary-subtle text-secondary fw-bold px-3 py-1 rounded-pill">General Scheme</span>
                  </td>
                  <td>
                    <a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/SYBPEDG.pdf'); ?>" target="_blank" class="syl-btn">
                      <i class="fa fa-file-pdf"></i> B.P.Ed. (General)
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Table 2: B.P.E.S. -->
        <div class="syl-table-card" id="bpes">
          <div class="syl-card-header">
            <h3>
              <i class="fa fa-medal text-primary"></i>
              <span>B.P.E.S. (Bachelor of Physical Education and Sports) - 3-Year Program</span>
            </h3>
            <span class="syl-card-badge">UG Degree Program</span>
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
                  <th>Complete Syllabus</th>
                </tr>
              </thead>
              <tbody>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">1</td>
                  <td style="text-align: left;">
                    <div class="fw-bold text-dark">Bachelor of Physical Education and Sports (B.P.E.S.)</div>
                    <div class="text-muted small">Annual Degree Course (Year-wise Syllabus)</div>
                  </td>
                  <td>
                    <a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/SYBPE _I.pdf'); ?>" target="_blank" class="syl-btn">
                      <i class="fa fa-file-pdf"></i> I Year
                    </a>
                  </td>
                  <td>
                    <a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/SYBPE _II.pdf'); ?>" target="_blank" class="syl-btn">
                      <i class="fa fa-file-pdf"></i> II Year
                    </a>
                  </td>
                  <td>
                    <a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/SYBPE _III.pdf'); ?>" target="_blank" class="syl-btn">
                      <i class="fa fa-file-pdf"></i> III Year
                    </a>
                  </td>
                  <td>
                    <span class="text-muted small">-</span>
                  </td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">2</td>
                  <td style="text-align: left;">
                    <div class="fw-bold text-dark">Bachelor of Physical Education and Sports (New)</div>
                    <div class="text-muted small">Updated Complete BPES Curriculum</div>
                  </td>
                  <td colspan="3">
                    <span class="badge bg-light text-muted border px-3 py-1 rounded-pill">Complete 3-Year Degree Package</span>
                  </td>
                  <td>
                    <a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/Bpes_syllabus_new12-04-19r.pdf'); ?>" target="_blank" class="syl-btn">
                      <i class="fa fa-file-pdf"></i> Complete Syllabus (New)
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

      </div>

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

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

      countDisplay.textContent = visibleCount;

      // Handle card empty visibility
      document.querySelectorAll('.syl-table-card').forEach(card => {
        const cardRows = card.querySelectorAll('.syl-row');
        const hasVisible = Array.from(cardRows).some(r => r.style.display !== 'none');
        card.style.display = hasVisible ? '' : 'none';
      });

      emptyState.style.display = visibleCount === 0 ? 'block' : 'none';
    }

    searchInput.addEventListener('input', filterTable);
    clearBtn.addEventListener('click', function() {
      searchInput.value = '';
      filterTable();
      searchInput.focus();
    });
  });
</script>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
PHP;

file_put_contents('Download/Syllabus/PhysicalEducation.php', $pe_code);
echo "PhysicalEducation.php updated.\n";
