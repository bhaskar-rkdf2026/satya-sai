<?php
$html = file_get_contents('d:/xampp/htdocs/satya-sai/Admission/FeesStructure.php');
preg_match_all('/<tr[^>]*>(.*?)<\/tr>/is', $html, $rows);

$courses = [];
foreach ($rows[1] as $idx => $rowHtml) {
    if ($idx == 0) continue;
    preg_match_all('/<td[^>]*>(.*?)<\/td>/is', $rowHtml, $cells);
    if (count($cells[1]) >= 5) {
        $sno = trim(strip_tags($cells[1][0]));
        $course = trim(preg_replace('/\s+/', ' ', strip_tags($cells[1][1])));
        $fee = trim(preg_replace('/\s+/', ' ', strip_tags($cells[1][2])));
        $eligibility = trim(preg_replace('/\s+/', ' ', strip_tags($cells[1][3])));
        $duration = trim(preg_replace('/\s+/', ' ', strip_tags($cells[1][4])));
        
        if (!empty($course) && is_numeric(str_replace('.', '', $sno))) {
            $courses[] = [
                'sno' => rtrim($sno, '.'),
                'course' => html_entity_decode($course),
                'fee' => html_entity_decode($fee),
                'eligibility' => html_entity_decode($eligibility),
                'duration' => html_entity_decode($duration)
            ];
        }
    }
}

$output = '<?php
$page_title = \'Fees Structure - SSSUTMS\';
$banner_title = \'Fees Structure\';
$banner_category = \'Admission\';

require_once __DIR__ . \'/../config.php\';
require_once __DIR__ . \'/../includes/header.php\';
require_once __DIR__ . \'/../includes/topbar.php\';
require_once __DIR__ . \'/../includes/navbar.php\';
require_once __DIR__ . \'/../includes/page-banner.php\';
?>

<style>
.fs-section { background-color: #f8fafc; font-family: \'Inter\', system-ui, -apple-system, sans-serif; }
.fs-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15,23,42,0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}
.fs-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2.2rem 2rem;
  position: relative;
}
.fs-header-banner::after {
  content: \'\';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.fs-stat-chip {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 12px 14px;
  display: flex; align-items: center; gap: 11px;
  height: 100%;
  transition: all 0.25s ease;
  box-shadow: 0 2px 8px rgba(0,0,0,0.02);
}
.fs-stat-chip:hover {
  border-color: #f59e0b;
  box-shadow: 0 6px 16px rgba(11,37,69,0.08);
  transform: translateY(-2px);
}
.fs-stat-icon {
  width: 42px; height: 42px;
  border-radius: 10px;
  background: rgba(245,158,11,0.12);
  color: #d97706;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.15rem; flex-shrink: 0;
}
.fs-table-wrap {
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  overflow: hidden;
}
.fs-table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 0;
}
.fs-table thead th {
  background: #0b2545;
  color: #ffffff;
  font-weight: 700;
  font-size: 0.88rem;
  text-transform: uppercase;
  letter-spacing: 0.03em;
  padding: 14px 16px;
  border: none;
  vertical-align: middle;
}
.fs-table tbody tr {
  transition: background-color 0.15s ease;
  border-bottom: 1px solid #f1f5f9;
}
.fs-table tbody tr:hover {
  background-color: #f8fafc;
}
.fs-table tbody tr:last-child {
  border-bottom: none;
}
.fs-table td {
  padding: 14px 16px;
  font-size: 0.92rem;
  color: #334155;
  vertical-align: middle;
}
.fs-fee-badge {
  display: inline-flex;
  align-items: center;
  gap: 4px;
  background: #ecfdf5;
  color: #065f46;
  font-weight: 700;
  font-size: 0.92rem;
  padding: 4px 12px;
  border-radius: 8px;
  border: 1px solid #a7f3d0;
  font-family: monospace;
}
.fs-duration-badge {
  display: inline-block;
  background: #f1f5f9;
  color: #475569;
  font-weight: 600;
  font-size: 0.8rem;
  padding: 4px 10px;
  border-radius: 6px;
  white-space: nowrap;
}
.fs-search-box {
  position: relative;
  max-width: 380px;
}
.fs-search-box input {
  padding-left: 2.5rem;
  border-radius: 10px;
  border: 1px solid #cbd5e1;
}
.fs-search-box i {
  position: absolute;
  left: 0.9rem;
  top: 50%;
  transform: translateY(-50%);
  color: #94a3b8;
}
</style>

<section class="subpage-main-section fs-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="fs-main-card">

          <!-- Header Banner -->
          <div class="fs-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-receipt me-1"></i> Academic Session 2026-27
              </span>
              <h3 class="fw-bold text-white mb-1 fs-3">ELIGIBILITY CRITERIA &amp; FEES STRUCTURE</h3>
              <p class="text-white-50 mb-0 small">Approved Annual Tuition Fees, Minimum Eligibility &amp; Course Duration Across All Schools</p>
            </div>
            <div>
              <a href="<?php echo BASE_URL; ?>Admission/AdmissionRegistration.php" class="btn btn-warning fw-bold px-4 py-2 text-dark rounded-3 shadow-sm">
                <i class="fa-solid fa-pen-nib me-1"></i> Apply Online
              </a>
            </div>
          </div>

          <!-- Content Body -->
          <div class="p-4">

            <!-- Stat Chips -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-sm-6 col-md-3">
                <div class="fs-stat-chip">
                  <div class="fs-stat-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                  <div>
                    <span class="text-muted extra-small uppercase fw-bold d-block">Total Programs</span>
                    <strong class="text-dark fs-6">' . count($courses) . '+ Courses</strong>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="fs-stat-chip">
                  <div class="fs-stat-icon"><i class="fa-solid fa-indian-rupee-sign"></i></div>
                  <div>
                    <span class="text-muted extra-small uppercase fw-bold d-block">Fee Structure</span>
                    <strong class="text-dark fs-6">Per Annum</strong>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="fs-stat-chip">
                  <div class="fs-stat-icon"><i class="fa-solid fa-shield-halved"></i></div>
                  <div>
                    <span class="text-muted extra-small uppercase fw-bold d-block">Regulatory</span>
                    <strong class="text-dark fs-6">UGC / AICTE / PCI</strong>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="fs-stat-chip">
                  <div class="fs-stat-icon"><i class="fa-solid fa-handshake-angle"></i></div>
                  <div>
                    <span class="text-muted extra-small uppercase fw-bold d-block">Scholarships</span>
                    <strong class="text-dark fs-6">Govt Schemes</strong>
                  </div>
                </div>
              </div>
            </div>

            <!-- Filter / Search Toolbar -->
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
              <div class="fs-search-box flex-grow-1">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" id="feeSearchInput" class="form-control" placeholder="Search course (e.g. B.Tech, BAMS, MBA, Pharmacy)...">
              </div>
              <div class="small text-muted">
                Showing <strong id="feeCount">' . count($courses) . '</strong> approved programs
              </div>
            </div>

            <!-- Responsive Modern Fees Table -->
            <div class="table-responsive fs-table-wrap">
              <table class="fs-table" id="feeTable">
                <thead>
                  <tr>
                    <th style="width: 7%;" class="text-center">S.No.</th>
                    <th style="width: 28%;">Course Name</th>
                    <th style="width: 18%;">Tuition Fees (Per Annum)</th>
                    <th style="width: 35%;">Eligibility Criteria</th>
                    <th style="width: 12%;" class="text-center">Duration</th>
                  </tr>
                </thead>
                <tbody>';

foreach ($courses as $c) {
    $feeFormatted = is_numeric(str_replace(',', '', $c['fee'])) ? '₹ ' . number_format((float)str_replace(',', '', $c['fee'])) : $c['fee'];
    $output .= '
                  <tr>
                    <td class="text-center fw-bold text-muted">' . htmlspecialchars($c['sno']) . '</td>
                    <td><strong class="text-dark">' . htmlspecialchars($c['course']) . '</strong></td>
                    <td><span class="fs-fee-badge"><i class="fa-solid fa-indian-rupee-sign small"></i> ' . htmlspecialchars(str_replace('₹ ', '', $feeFormatted)) . '</span></td>
                    <td class="small">' . htmlspecialchars($c['eligibility']) . '</td>
                    <td class="text-center"><span class="fs-duration-badge">' . htmlspecialchars($c['duration']) . '</span></td>
                  </tr>';
}

$output .= '
                </tbody>
              </table>
            </div>

          </div>
        </div><!-- end fs-main-card -->
      </div><!-- end col-lg-8 -->

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . \'/../includes/sidebar.php\'; ?>
      </div>

    </div>
  </div>
</section>

<script>
document.addEventListener(\'DOMContentLoaded\', function() {
  var searchInput = document.getElementById(\'feeSearchInput\');
  var table = document.getElementById(\'feeTable\');
  var countBadge = document.getElementById(\'feeCount\');
  if (searchInput && table) {
    var rows = table.querySelectorAll(\'tbody tr\');
    searchInput.addEventListener(\'input\', function() {
      var query = this.value.toLowerCase().trim();
      var visible = 0;
      rows.forEach(function(row) {
        var text = row.textContent.toLowerCase();
        if (text.indexOf(query) !== -1) {
          row.style.display = \'\';
          visible++;
        } else {
          row.style.display = \'none\';
        }
      });
      if (countBadge) countBadge.textContent = visible;
    });
  }
});
</script>

<?php require_once __DIR__ . \'/../includes/footer.php\'; ?>
';

file_put_contents('d:/xampp/htdocs/satya-sai/Admission/FeesStructure.php', $output);
echo "FeesStructure.php successfully upgraded!\n";
