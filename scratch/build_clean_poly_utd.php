<?php

// Re-write Polytechnic_Engineering.php and UTD.php directly
$head_poly = <<<'PHP'
<?php
$page_title = 'Diploma Engineering (Polytechnic) Syllabus - SSSUTMS';
$banner_title = 'Diploma Engineering';
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
PHP;

$foot_poly = <<<'PHP'
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
              <p class="mb-0 text-white-50 small">School of Polytechnic & Diploma Engineering (AICTE & Traditional Schemes)</p>
            </div>
            <div class="text-end">
              <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold"><i class="fa fa-file-pdf"></i> 44 Verified Syllabi</span>
            </div>
          </div>
        </div>

        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-3">
          <div class="syl-search-box">
            <i class="fa fa-search search-icon"></i>
            <input type="text" id="sylSearch" class="form-control" placeholder="Search branch or scheme (e.g. Civil, Mechanical, AICTE, CSE)...">
            <button class="clear-btn" id="sylClearSearch" title="Clear search"><i class="fa fa-times"></i></button>
          </div>
          <div class="text-muted small">Showing <span id="sylCount" class="fw-bold text-dark">10</span> Branch Rows</div>
        </div>

        <div class="syl-quick-nav">
          <a href="#poly-aicte" class="syl-quick-pill"><i class="fa fa-star text-warning"></i> AICTE Diploma Scheme</a>
          <a href="#poly-trad" class="syl-quick-pill"><i class="fa fa-history text-warning"></i> Traditional Diploma Scheme</a>
        </div>

        <div class="syl-empty-state" id="sylEmptyState">
          <i class="fa fa-folder-open"></i>
          <h5 class="text-dark fw-bold">No Syllabus Found</h5>
          <p class="text-muted mb-0">No syllabus matches your search query.</p>
        </div>

        <!-- Table 1: AICTE Diploma Scheme -->
        <div class="syl-table-card" id="poly-aicte">
          <div class="syl-card-header">
            <h3><i class="fa fa-drafting-compass text-primary"></i><span>Diploma in Engineering (AICTE Scheme)</span></h3>
            <span class="syl-card-badge">Latest AICTE Pattern</span>
          </div>
          <div class="syl-table-wrap">
            <table class="syl-table table">
              <thead>
                <tr>
                  <th style="width: 60px;">S.No.</th>
                  <th style="text-align: left; min-width: 170px;">Branch / Specialization</th>
                  <th>I & II Year (Common)</th>
                  <th>III Sem</th>
                  <th>IV Sem</th>
                  <th>V Sem</th>
                  <th>VI Sem</th>
                </tr>
              </thead>
              <tbody>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">1</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">Chemical Engineering</div></td>
                  <td rowspan="5" style="vertical-align: middle;">
                    <a href="<?php echo base_url('assets/images/Files/Link/syllabus 2023-24/POLY SSS.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Common I & II Yr</a>
                  </td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/syllabus_chemical_III_sem_06082025_0356.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/syllabus_chemical_IVsem_06082025_0357.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/POLY(ENGINEERING)/DEngg V/SYLLABUS DIPLOMA CHEMICAL 5 SEM.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> V Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/POLY(ENGINEERING)/DEngg VI/syllabus Chemical VI sem.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> VI Sem</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">2</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">Civil Engineering</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS_III_SEMESTER_06082025_0408.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS_IV_SEMESTER_06082025_0409.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/POLY(ENGINEERING)/DEngg V/ce v sem final.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> V Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/POLY(ENGINEERING)/DEngg VI/CE VI sem syllabus.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> VI Sem</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">3</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">Computer Science & Engineering</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/CS_III_SEM_SYLLABUS_06082025_0359.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/CS_IV_SEM_SYLLABUS_06082025_0400.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/POLY(ENGINEERING)/DEngg V/CS V SEM SYLLABUS.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> V Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/CS_VI_SEM_SYLLABUS_(1)_14042026_0357.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> VI Sem</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">4</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">Electrical Engineering</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/EE_III_SEM_SYLLABUS_06082025_0404.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/EE_IV_SEM_SYLLABUS_06082025_0407.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/Poly_Ee_V__sem__SYLLABUS_-_Copy_16102025_0223.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> V Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/Syllabus_Ee_VI_15022026_0100.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> VI Sem</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">5</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">Mechanical Engineering</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/ME_III_SEM_SYLLABUS_06082025_0401.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/ME_IV_SEM_SYLLABUS_06082025_0402.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/POLY(ENGINEERING)/DEngg V/Syllabus Me V.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> V Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/POLY(ENGINEERING)/DEngg VI/Syllabus Me VI.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> VI Sem</a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Table 2: Traditional Diploma Scheme -->
        <div class="syl-table-card" id="poly-trad">
          <div class="syl-card-header">
            <h3><i class="fa fa-history text-secondary"></i><span>Diploma in Engineering (Traditional Scheme)</span></h3>
            <span class="syl-card-badge">Traditional Curriculum</span>
          </div>
          <div class="syl-table-wrap">
            <table class="syl-table table">
              <thead>
                <tr>
                  <th style="width: 60px;">S.No.</th>
                  <th style="text-align: left; min-width: 170px;">Branch / Specialization</th>
                  <th>I & II Sem (Common)</th>
                  <th>III Sem</th>
                  <th>IV Sem</th>
                  <th>V Sem</th>
                  <th>VI Sem</th>
                </tr>
              </thead>
              <tbody>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">1</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">Chemical Engineering</div></td>
                  <td rowspan="5" style="vertical-align: middle;">
                    <a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLY(ENGINEERING)/POLYR.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Common I & II Sem</a>
                  </td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLY(ENGINEERING)/DEngg_III/SYDCM_III.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLY(ENGINEERING)/DEngg_IV/SYDCM_IV.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLY(ENGINEERING)/SYDIP_5th/SYDIP_CM_5th.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> V Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLY(ENGINEERING)/SY_DIP_6th/SYDIP_CM_6th.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> VI Sem</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">2</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">Civil Engineering</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLY(ENGINEERING)/DEngg_III/SYDCE_III.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLY(ENGINEERING)/DEngg_IV/SYDCE_IV.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLY(ENGINEERING)/SYDIP_5th/SYDIP_CE_5th.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> V Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLY(ENGINEERING)/SY_DIP_6th/SYDIP_CE_6th.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> VI Sem</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">3</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">Computer Science & Engineering</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLY(ENGINEERING)/DEngg_III/SYDCS_III.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLY(ENGINEERING)/DEngg_IV/SYDCS_IV.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLY(ENGINEERING)/SYDIP_5th/SYDIP_CSE_5th.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> V Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLY(ENGINEERING)/SY_DIP_6th/SYDIP_CSE_6th.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> VI Sem</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">4</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">Electrical Engineering</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLY(ENGINEERING)/DEngg_III/SYDEE_III.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLY(ENGINEERING)/DEngg_IV/SYDEE_IV.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLY(ENGINEERING)/SYDIP_5th/SYDIP_EE_5th.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> V Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLY(ENGINEERING)/SY_DIP_6th/SYDIP_EE_6th.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> VI Sem</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">5</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">Mechanical Engineering</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLY(ENGINEERING)/DEngg_III/SYDME_III.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLY(ENGINEERING)/DEngg_IV/SYDME_IV.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLY(ENGINEERING)/SYDIP_5th/SYDIP_MEr_5th.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> V Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/POLY(ENGINEERING)/SY_DIP_6th/SYDIP_ME_6th.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> VI Sem</a></td>
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
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEMES/UTD2023/Syllabus/B.A/elective gen.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Elective</a></td>
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
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/NEP/NEP_Major_BBA_I_R.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Major</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/NEP/NEP_Minor_BBA_I_R.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Minor</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/NEP/NEP_Elective_BBA_I_R.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Elective</a></td>
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

file_put_contents('Download/Syllabus/Polytechnic_Engineering.php', $head_poly . "\n" . $poly_body . "\n" . $foot_poly);
echo "Polytechnic_Engineering.php written.\n";

$head_utd = str_replace(
    ['$page_title = \'Diploma Engineering (Polytechnic) Syllabus - SSSUTMS\';', '$banner_title = \'Diploma Engineering\';'],
    ['$page_title = \'University Teaching Departments (UTD) Syllabus - SSSUTMS\';', '$banner_title = \'University Teaching Departments\';'],
    $head_poly
);
file_put_contents('Download/Syllabus/UTD.php', $head_utd . "\n" . $utd_body . "\n" . $foot_poly);
echo "UTD.php written.\n";
