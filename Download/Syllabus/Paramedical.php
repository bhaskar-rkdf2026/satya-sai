<?php
$page_title = 'Faculty of Paramedical Studies Syllabus - SSSUTMS';
$banner_title = 'Paramedical';
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