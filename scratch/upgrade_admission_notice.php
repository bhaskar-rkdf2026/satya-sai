<?php
$html = file_get_contents('d:/xampp/htdocs/satya-sai/Admission/AdmissionNotice.php');

// Remove base64 data completely
$htmlClean = preg_replace('/src="data:image\/[^;]+;base64,[^"]+"/', '', $html);

preg_match_all('/<a[^>]+href=["\']([^"\']+)["\'][^>]*>(.*?)<\/a>/is', $htmlClean, $matches);

$notices = [];
$seen = [];

foreach ($matches[0] as $i => $fullTag) {
    $link = $matches[1][$i];
    $rawText = trim(strip_tags($matches[2][$i]));
    $rawText = html_entity_decode(preg_replace('/\s+/', ' ', $rawText));
    
    // Clean any residual base64 or garbage
    $rawText = preg_replace('/[a-zA-Z0-9+\/]{30,}={0,2}/', '', $rawText);
    $rawText = trim(preg_replace('/[^a-zA-Z0-9\x{0900}-\x{097F}\s\-_–—(),.:&\/]/u', '', $rawText));
    
    if (empty($rawText) || strlen($rawText) < 3) continue;
    
    $key = md5($link . $rawText);
    if (!isset($seen[$key])) {
        $seen[$key] = true;
        
        $session = 'Archive Notifications';
        if (strpos($rawText, '2026-27') !== false || strpos($link, '2026') !== false) {
            $session = 'Session 2026-27';
        } elseif (strpos($rawText, '2025-26') !== false || strpos($link, '2025') !== false) {
            $session = 'Session 2025-26';
        } elseif (strpos($rawText, '2024-25') !== false || strpos($link, '2024') !== false) {
            $session = 'Session 2024-25';
        } elseif (strpos($rawText, '2023-24') !== false || strpos($link, '2023') !== false) {
            $session = 'Session 2023-24';
        } elseif (strpos($rawText, '2022-23') !== false || strpos($link, '2022') !== false) {
            $session = 'Session 2022-23';
        } elseif (strpos($rawText, '2021-22') !== false || strpos($link, '2021') !== false) {
            $session = 'Session 2021-22';
        } elseif (strpos($rawText, 'Paramedical') !== false || strpos($link, 'paramedical') !== false || strpos($link, 'Para_') !== false) {
            $session = 'Paramedical Counseling Schedules';
        }
        
        $notices[] = [
            'title' => $rawText,
            'link' => $link,
            'session' => $session
        ];
    }
}

// Group notices by session
$grouped = [];
foreach ($notices as $n) {
    $grouped[$n['session']][] = $n;
}

$output = '<?php
$page_title = \'Admission Notice - SSSUTMS\';
$banner_title = \'Admission Notice\';
$banner_category = \'Admission\';

require_once __DIR__ . \'/../config.php\';
require_once __DIR__ . \'/../includes/header.php\';
require_once __DIR__ . \'/../includes/topbar.php\';
require_once __DIR__ . \'/../includes/navbar.php\';
require_once __DIR__ . \'/../includes/page-banner.php\';
?>

<style>
.an-section { background-color: #f8fafc; font-family: \'Inter\', system-ui, -apple-system, sans-serif; }
.an-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15,23,42,0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}
.an-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2.2rem 2rem;
  position: relative;
}
.an-header-banner::after {
  content: \'\';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.an-stat-chip {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 12px 14px;
  display: flex; align-items: center; gap: 11px;
  height: 100%;
  transition: all 0.25s ease;
  box-shadow: 0 2px 8px rgba(0,0,0,0.02);
}
.an-stat-chip:hover {
  border-color: #f59e0b;
  box-shadow: 0 6px 16px rgba(11,37,69,0.08);
  transform: translateY(-2px);
}
.an-stat-icon {
  width: 42px; height: 42px;
  border-radius: 10px;
  background: rgba(245,158,11,0.12);
  color: #d97706;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.15rem; flex-shrink: 0;
}
.an-session-block {
  margin-bottom: 2rem;
}
.an-session-title {
  display: flex;
  align-items: center;
  gap: 10px;
  font-weight: 700;
  font-size: 1.1rem;
  color: #0b2545;
  padding-bottom: 0.6rem;
  border-bottom: 2px solid #e2e8f0;
  margin-bottom: 1rem;
}
.an-session-title i {
  color: #f59e0b;
}
.an-item-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 1rem 1.25rem;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 1rem;
  margin-bottom: 0.75rem;
  transition: all 0.2s ease;
  box-shadow: 0 2px 6px rgba(0,0,0,0.02);
}
.an-item-card:hover {
  border-color: #cbd5e1;
  box-shadow: 0 6px 18px rgba(11,37,69,0.07);
  transform: translateY(-2px);
}
.an-item-title {
  font-weight: 600;
  font-size: 0.95rem;
  color: #1e293b;
  margin-bottom: 0;
}
.an-badge-new {
  background: #fee2e2;
  color: #dc2626;
  font-size: 0.72rem;
  font-weight: 700;
  padding: 3px 8px;
  border-radius: 5px;
  text-transform: uppercase;
  border: 1px solid #fca5a5;
  margin-right: 8px;
}
.an-btn {
  background: linear-gradient(135deg, #0b2545 0%, #1e4d8c 100%) !important;
  color: #ffffff !important;
  font-size: 0.82rem;
  font-weight: 700;
  padding: 7px 15px;
  border-radius: 8px;
  border: 1px solid rgba(245,158,11,0.35);
  text-decoration: none !important;
  display: inline-flex;
  align-items: center;
  gap: 6px;
  white-space: nowrap;
  box-shadow: 0 2px 6px rgba(11,37,69,0.12);
  transition: all 0.2s ease;
}
.an-btn i {
  color: #fbbf24 !important;
}
.an-btn:hover {
  background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%) !important;
  color: #ffffff !important;
  border-color: #d97706;
  box-shadow: 0 4px 12px rgba(217,119,6,0.3);
  transform: translateY(-1px);
}
.an-search-box {
  position: relative;
  max-width: 380px;
}
.an-search-box input {
  padding-left: 2.5rem;
  border-radius: 10px;
  border: 1px solid #cbd5e1;
}
.an-search-box i {
  position: absolute;
  left: 0.9rem;
  top: 50%;
  transform: translateY(-50%);
  color: #94a3b8;
}
</style>

<section class="subpage-main-section an-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="an-main-card">

          <!-- Header Banner -->
          <div class="an-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-bullhorn me-1"></i> Official Admission Circulars
              </span>
              <h3 class="fw-bold text-white mb-1 fs-3">ADMISSION NOTICES &amp; COUNSELING SCHEDULES</h3>
              <p class="text-white-50 mb-0 small">Official Announcements, Eligibility Criteria &amp; Admission Counseling Notifications</p>
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
                <div class="an-stat-chip">
                  <div class="an-stat-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                  <div>
                    <span class="text-muted extra-small uppercase fw-bold d-block">Active Session</span>
                    <strong class="text-dark fs-6">2026 – 2027</strong>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="an-stat-chip">
                  <div class="an-stat-icon"><i class="fa-solid fa-bell"></i></div>
                  <div>
                    <span class="text-muted extra-small uppercase fw-bold d-block">Total Notices</span>
                    <strong class="text-dark fs-6">' . count($notices) . ' Circulars</strong>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="an-stat-chip">
                  <div class="an-stat-icon"><i class="fa-solid fa-stethoscope"></i></div>
                  <div>
                    <span class="text-muted extra-small uppercase fw-bold d-block">Specialized</span>
                    <strong class="text-dark fs-6">Medical &amp; Allied</strong>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="an-stat-chip">
                  <div class="an-stat-icon"><i class="fa-solid fa-file-pdf"></i></div>
                  <div>
                    <span class="text-muted extra-small uppercase fw-bold d-block">Format</span>
                    <strong class="text-dark fs-6">Official PDF</strong>
                  </div>
                </div>
              </div>
            </div>

            <!-- Search Toolbar -->
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
              <div class="an-search-box flex-grow-1">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" id="noticeSearchInput" class="form-control" placeholder="Search notices (e.g. 2026, Enrollment, B.Tech, NRI)...">
              </div>
              <div class="small text-muted">
                Showing <strong id="noticeCount">' . count($notices) . '</strong> notifications
              </div>
            </div>

            <!-- Notices Grouped by Session -->
            <div id="noticeContainer">';

foreach ($grouped as $sessionName => $items) {
    $output .= '
              <div class="an-session-block">
                <h5 class="an-session-title">
                  <i class="fa-solid fa-calendar-check"></i> ' . htmlspecialchars($sessionName) . '
                </h5>
                <div class="an-items-list">';
    
    foreach ($items as $item) {
        $isNew = (strpos($sessionName, '2026') !== false);
        $output .= '
                  <div class="an-item-card">
                    <div class="d-flex align-items-center">
                      ' . ($isNew ? '<span class="an-badge-new"><i class="fa-solid fa-bolt me-1"></i> New</span>' : '') . '
                      <p class="an-item-title">' . htmlspecialchars($item['title']) . '</p>
                    </div>
                    <div>
                      <a href="' . htmlspecialchars($item['link']) . '" target="_blank" rel="noopener" class="an-btn">
                        <i class="fa-solid fa-file-pdf"></i> Download PDF
                      </a>
                    </div>
                  </div>';
    }
    
    $output .= '
                </div>
              </div>';
}

$output .= '
            </div>

          </div>
        </div><!-- end an-main-card -->
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
  var searchInput = document.getElementById(\'noticeSearchInput\');
  var container = document.getElementById(\'noticeContainer\');
  var countBadge = document.getElementById(\'noticeCount\');
  if (searchInput && container) {
    var cards = container.querySelectorAll(\'.an-item-card\');
    var blocks = container.querySelectorAll(\'.an-session-block\');
    searchInput.addEventListener(\'input\', function() {
      var query = this.value.toLowerCase().trim();
      var visible = 0;
      cards.forEach(function(card) {
        var text = card.textContent.toLowerCase();
        if (text.indexOf(query) !== -1) {
          card.style.display = \'\';
          visible++;
        } else {
          card.style.display = \'none\';
        }
      });
      // Hide empty session blocks
      blocks.forEach(function(b) {
        var visibleCards = b.querySelectorAll(\'.an-item-card[style=""]\');
        if (visibleCards.length === 0 && query !== \'\') {
          b.style.display = \'none\';
        } else {
          b.style.display = \'\';
        }
      });
      if (countBadge) countBadge.textContent = visible;
    });
  }
});
</script>

<?php require_once __DIR__ . \'/../includes/footer.php\'; ?>
';

file_put_contents('d:/xampp/htdocs/satya-sai/Admission/AdmissionNotice.php', $output);
echo "AdmissionNotice.php upgraded successfully!\n";
