<?php
$html = file_get_contents('Research/Patents.php');

// We will parse out the 4 sections: 2023, 2022, 2021, 2020
// Let's use DOMDocument to parse all tables
$dom = new DOMDocument();
libxml_use_internal_errors(true);
$dom->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));
libxml_clear_errors();

$tables = $dom->getElementsByTagName('table');
echo "Found " . $tables->length . " tables.\n";

$years = ['2023', '2022', '2021', '2020'];
$data_by_year = [];

for ($i = 0; $i < $tables->length; $i++) {
    $table = $tables->item($i);
    $year = isset($years[$i]) ? $years[$i] : ('Table ' . ($i + 1));
    $rows = $table->getElementsByTagName('tr');
    $records = [];
    
    // First row is header
    for ($r = 1; $r < $rows->length; $r++) {
        $row = $rows->item($r);
        $cells = $row->getElementsByTagName('td');
        if ($cells->length >= 5) {
            $sno = trim(preg_replace('/\s+/', ' ', $cells->item(0)->textContent));
            $sno = rtrim($sno, '.');
            $inventor = trim(preg_replace('/\s+/', ' ', $cells->item(1)->textContent));
            $title = trim(preg_replace('/\s+/', ' ', $cells->item(2)->textContent));
            $app_no = trim(preg_replace('/\s+/', ' ', $cells->item(3)->textContent));
            $status = trim(preg_replace('/\s+/', ' ', $cells->item(4)->textContent));
            
            if (!empty($inventor) || !empty($title)) {
                $records[] = [
                    'sno' => $sno,
                    'inventor' => $inventor,
                    'title' => $title,
                    'app_no' => $app_no,
                    'status' => $status
                ];
            }
        }
    }
    $data_by_year[$year] = $records;
    echo "Year $year has " . count($records) . " records.\n";
}

// Generate the complete modernized PHP page
ob_start();
?>
<?php
$page_title = 'Patents - SSSUTMS';
$banner_title = 'Patents';
$banner_category = 'Research';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?>

<style>
.pat-section { background-color: #f8fafc; font-family: 'Inter', system-ui, -apple-system, sans-serif; }
.pat-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15,23,42,0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}
.pat-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2.2rem 2rem;
  position: relative;
}
.pat-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.pat-stat-chip {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 16px 14px;
  display: flex; align-items: center; gap: 12px;
  height: 100%;
  transition: all 0.25s ease;
  box-shadow: 0 4px 12px rgba(0,0,0,0.02);
}
.pat-stat-chip:hover {
  border-color: #cbd5e1;
  box-shadow: 0 6px 18px rgba(11,37,69,0.07);
  transform: translateY(-2px);
}
.pat-stat-icon {
  width: 48px; height: 48px;
  border-radius: 12px;
  background: rgba(245,158,11,0.12);
  color: #d97706;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.35rem; flex-shrink: 0;
}
.pat-objective-box {
  background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
  border: 1px solid #e2e8f0;
  border-left: 4px solid #f59e0b;
  border-radius: 12px;
  padding: 1.25rem 1.5rem;
  margin-bottom: 2rem;
}
.pat-year-badge {
  background: linear-gradient(135deg, #0b2545 0%, #1e4d8c 100%);
  color: #ffffff;
  padding: 6px 18px;
  border-radius: 50px;
  font-weight: 700;
  font-size: 0.95rem;
  display: inline-flex;
  align-items: center;
  gap: 8px;
  box-shadow: 0 3px 10px rgba(11,37,69,0.15);
}
.pat-modern-table {
  width: 100%;
  border-collapse: separate;
  border-spacing: 0;
  border-radius: 12px;
  overflow: hidden;
  border: 1px solid #e2e8f0;
  margin-bottom: 2.5rem;
  background: #ffffff;
  box-shadow: 0 4px 14px rgba(15,23,42,0.03);
}
.pat-modern-table thead th {
  background: #0b2545 !important;
  color: #ffffff !important;
  font-weight: 700 !important;
  font-size: 0.85rem !important;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  padding: 14px 16px !important;
  border: none !important;
  vertical-align: middle;
}
.pat-modern-table tbody td {
  padding: 14px 16px !important;
  border-bottom: 1px solid #f1f5f9 !important;
  border-right: 1px solid #f1f5f9 !important;
  font-size: 0.9rem;
  color: #334155;
  vertical-align: middle;
}
.pat-modern-table tbody tr:last-child td {
  border-bottom: none !important;
}
.pat-modern-table tbody tr:hover td {
  background-color: #f8fafc;
}
.pat-badge-status {
  padding: 5px 10px;
  border-radius: 6px;
  font-size: 0.78rem;
  font-weight: 700;
  display: inline-flex;
  align-items: center;
  gap: 5px;
  white-space: nowrap;
}
.pat-badge-published {
  background: #eff6ff;
  color: #1d4ed8;
  border: 1px solid #bfdbfe;
}
.pat-badge-granted {
  background: #ecfdf5;
  color: #047857;
  border: 1px solid #a7f3d0;
}
</style>

<section class="subpage-main-section pat-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="pat-main-card">

          <!-- Header Banner -->
          <div class="pat-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-lightbulb me-1"></i> Intellectual Property Rights (IPR)
              </span>
              <h3 class="fw-bold text-white mb-1 fs-3">PATENTS – FROM FILING TO GRANT</h3>
              <p class="text-white-50 mb-0 small">Patented Innovations &amp; Granted Technological Rights by SSSUTMS Researchers</p>
            </div>
          </div>

          <!-- Content Body -->
          <div class="p-4 pat-content-body">

            <!-- Stat Chips -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-sm-6 col-md-3">
                <div class="pat-stat-chip">
                  <div class="pat-stat-icon"><i class="fa-solid fa-certificate"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Innovations</div>
                    <div class="fw-bold text-dark fs-6">Multiple Granted</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="pat-stat-chip">
                  <div class="pat-stat-icon"><i class="fa-solid fa-microchip"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Domains</div>
                    <div class="fw-bold text-dark fs-6">IoT &amp; Engineering</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="pat-stat-chip">
                  <div class="pat-stat-icon"><i class="fa-solid fa-pills"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Pharma</div>
                    <div class="fw-bold text-dark fs-6">Medical Devices</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="pat-stat-chip">
                  <div class="pat-stat-icon"><i class="fa-solid fa-file-signature"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">IPR Cell</div>
                    <div class="fw-bold text-dark fs-6">Filing Support</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Objective Box -->
            <div class="pat-objective-box">
              <h6 class="fw-bold text-dark mb-1 d-flex align-items-center gap-2">
                <i class="fa-solid fa-bullseye text-warning"></i> Objective: Patent – From Filing to Grant
              </h6>
              <p class="mb-0 text-muted small leading-relaxed">
                The main objective is to impart greater awareness about the issue of Intellectual Property Rights (IPR), which has gained special importance for all domains of socio-economic and technological development. It aids in understanding patentability criteria in detail and the commercial and viable aspects of patent filing.
              </p>
            </div>

            <!-- Search Filter -->
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-4">
              <div class="position-relative flex-grow-1" style="max-width: 380px;">
                <i class="fa-solid fa-magnifying-glass position-absolute text-muted" style="left: 14px; top: 50%; transform: translateY(-50%); font-size: 0.9rem;"></i>
                <input type="text" id="patentSearchInput" class="form-control ps-5 py-2 rounded-pill border" placeholder="Search by inventor, title, or patent no...">
              </div>
              <span class="text-muted extra-small">
                <i class="fa-solid fa-shield-check text-success me-1"></i> Verified Official Records
              </span>
            </div>

            <?php foreach ($data_by_year as $year => $records): ?>
            <!-- Year Section: <?php echo $year; ?> -->
            <div class="pat-year-group mb-4" data-year="<?php echo $year; ?>">
              <div class="d-flex align-items-center gap-3 mb-3">
                <span class="pat-year-badge">
                  <i class="fa-regular fa-calendar-check"></i> Year <?php echo $year; ?>
                </span>
                <span class="text-muted extra-small fw-semibold"><?php echo count($records); ?> Patent Records</span>
              </div>

              <div class="table-responsive">
                <table class="pat-modern-table table mb-0">
                  <thead>
                    <tr>
                      <th class="text-center" style="width: 70px;">S. No.</th>
                      <th style="width: 24%;">Name of Inventors</th>
                      <th style="width: 42%;">Title of Invention</th>
                      <th style="width: 18%;">Application / Patent No.</th>
                      <th class="text-center" style="width: 16%;">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($records as $row): 
                      $is_granted = (stripos($row['status'], 'grant') !== false);
                    ?>
                    <tr class="patent-row">
                      <td class="text-center fw-bold text-muted"><?php echo htmlspecialchars($row['sno']); ?></td>
                      <td class="fw-semibold text-dark"><?php echo htmlspecialchars($row['inventor']); ?></td>
                      <td>
                        <strong class="text-primary-emphasis d-block"><?php echo htmlspecialchars($row['title']); ?></strong>
                      </td>
                      <td>
                        <code class="text-dark bg-light px-2 py-1 rounded border small fw-bold"><?php echo htmlspecialchars($row['app_no']); ?></code>
                      </td>
                      <td class="text-center">
                        <?php if ($is_granted): ?>
                          <span class="pat-badge-status pat-badge-granted">
                            <i class="fa-solid fa-circle-check"></i> <?php echo htmlspecialchars($row['status']); ?>
                          </span>
                        <?php else: ?>
                          <span class="pat-badge-status pat-badge-published">
                            <i class="fa-solid fa-file-lines"></i> <?php echo htmlspecialchars($row['status']); ?>
                          </span>
                        <?php endif; ?>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
            <?php endforeach; ?>

          </div><!-- end pat-content-body -->
        </div><!-- end pat-main-card -->
      </div><!-- end col-lg-8 -->

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
  var searchInput = document.getElementById('patentSearchInput');
  if (searchInput) {
    searchInput.addEventListener('input', function() {
      var query = this.value.toLowerCase().trim();
      var groups = document.querySelectorAll('.pat-year-group');
      
      groups.forEach(function(group) {
        var rows = group.querySelectorAll('.patent-row');
        var groupVisibleCount = 0;
        
        rows.forEach(function(row) {
          var text = row.textContent.toLowerCase();
          if (!query || text.indexOf(query) !== -1) {
            row.style.display = '';
            groupVisibleCount++;
          } else {
            row.style.display = 'none';
          }
        });
        
        if (groupVisibleCount === 0) {
          group.style.display = 'none';
        } else {
          group.style.display = '';
        }
      });
    });
  }
});
</script>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
<?php
$generated = ob_get_clean();
file_put_contents('Research/Patents.php', $generated);
echo "Patents.php successfully upgraded! Total length: " . strlen($generated) . "\n";
