<?php
/**
 * Master Batch Redesign Transformer for Schemes and Syllabuses
 */

$urlMap = json_decode(file_get_contents(__DIR__ . '/url_map.json'), true);

function mapLiveUrlToLocal($href, $urlMap) {
    $trimmed = trim($href);
    if (empty($trimmed) || $trimmed === '#') return '#';
    
    if (isset($urlMap[$trimmed])) {
        return '<?php echo BASE_URL; ?>' . $urlMap[$trimmed];
    }
    
    $decoded = urldecode($trimmed);
    if (isset($urlMap[$decoded])) {
        return '<?php echo BASE_URL; ?>' . $urlMap[$decoded];
    }
    
    foreach ($urlMap as $live => $local) {
        if (urldecode($live) === $decoded || basename(urldecode($live)) === basename($decoded)) {
            return '<?php echo BASE_URL; ?>' . $local;
        }
    }
    
    if (preg_match('#/cms/Areas/Website/Files/Link/(.*)$#i', $decoded, $m)) {
        $parts = explode('/', str_replace('\\', '/', $m[1]));
        $cleanParts = array_map(function($p) { return preg_replace('/[<>:"\/\\\\|?*]/', '_', $p); }, $parts);
        return '<?php echo BASE_URL; ?>assets/images/Files/Link/' . implode('/', $cleanParts);
    }
    
    return $trimmed;
}

function processSchemeOrSyllabusFile($filePath, $categoryName, $pageTitle, $urlMap) {
    if (!file_exists($filePath)) return;
    $raw = file_get_contents($filePath);
    
    // Extract everything between <div class="content-card-body"> and </div>\s*</div>\s*</div>
    $innerContent = "";
    if (preg_match('/<div class="content-card-body">([\s\S]*?)<\/div>\s*<\/div>\s*<\/div>/i', $raw, $m)) {
        $innerContent = $m[1];
    } else {
        // Fallback: strip header and footer
        $parts = explode('<section class="subpage-main-section', $raw);
        if (count($parts) > 1) {
            $innerParts = explode('<!-- Sticky Category Sidebar', $parts[1]);
            $innerContent = $innerParts[0];
            // remove content-card wrappers
            $innerContent = preg_replace('/<div[^>]*class=["\'][^"\']*content-card[^"\']*["\'][^>]*>/i', '', $innerContent);
            $innerContent = preg_replace('/<div[^>]*class=["\'][^"\']*col-lg-8[^"\']*["\'][^>]*>/i', '', $innerContent);
        }
    }
    
    // 1. Transform all <a> links to local URLs with standard minimal document button
    $innerContent = preg_replace_callback('/<a\s+([^>]*?)href=["\']([^"\']+)["\']([^>]*)>([\s\S]*?)<\/a>/i', function($m) use ($urlMap) {
        $href = $m[2];
        $label = trim(strip_tags($m[4]));
        if (empty($label)) $label = 'Download';
        $localUrl = mapLiveUrlToLocal($href, $urlMap);
        return '<a href="' . $localUrl . '" target="_blank" class="btn-standard-doc text-nowrap my-1"><i class="fa fa-file-pdf text-danger"></i> ' . $label . '</a>';
    }, $innerContent);

    // 2. Remove MS Word tags and styling
    $innerContent = preg_replace('/<o:p>[\s\S]*?<\/o:p>/i', '', $innerContent);
    $innerContent = preg_replace('/<font[^>]*>([\s\S]*?)<\/font>/i', '$1', $innerContent);
    $innerContent = preg_replace('/\s*style=["\'][^"\']*["\']/i', '', $innerContent);
    $innerContent = preg_replace('/\s*class=["\'](Mso[^"\']*|[^"\']*normal[^"\']*)["\']/i', '', $innerContent);
    $innerContent = preg_replace('/\s*(width|height|valign|nowrap|border|cellspacing|cellpadding)=["\'][^"\']*["\']/i', '', $innerContent);
    $innerContent = preg_replace('/\s*(width|height|valign|nowrap|border|cellspacing|cellpadding)=\S+/i', '', $innerContent);

    // 3. Transform tables into modern standard Bootstrap 5 tables
    $innerContent = preg_replace('/<table[^>]*>/i', '<div class="table-responsive rounded-2 border mb-4 overflow-hidden"><table class="table table-bordered table-hover align-middle mb-0 standard-table data-table">', $innerContent);
    $innerContent = preg_replace('/<\/table>/i', '</table></div>', $innerContent);

    // 4. Style table header rows
    $innerContent = preg_replace('/<tr>\s*(<td[^>]*>[\s\S]*?COURSE[\s\S]*?<\/td>)/i', '<tr style="background: #0b2545; color: #ffffff; font-weight: 600; text-align: center;">$1', $innerContent);
    $innerContent = preg_replace('/<tr>\s*(<td[^>]*>[\s\S]*?SEMESTER[\s\S]*?<\/td>)/i', '<tr style="background: #f1f5f9; color: #0b2545; font-weight: 600; text-align: center;">$1', $innerContent);
    $innerContent = preg_replace('/<tr>\s*(<td[^>]*>[\s\S]*?BRANCH[\s\S]*?<\/td>)/i', '<tr style="background: #0b2545; color: #ffffff; font-weight: 600; text-align: center;">$1', $innerContent);

    $safeTitle = htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8');
    $safeCat = htmlspecialchars($categoryName, ENT_QUOTES, 'UTF-8');
    
    // Assemble final modern PHP file
    $out = "<" . "?php\n";
    $out .= "\$page_title = '{$safeTitle} - {$safeCat} - SSSUTMS';\n";
    $out .= "\$banner_title = '{$safeTitle}';\n";
    $out .= "\$banner_category = '{$safeCat}';\n\n";
    $out .= "require_once __DIR__ . '/../../config.php';\n";
    $out .= "require_once __DIR__ . '/../../includes/header.php';\n";
    $out .= "require_once __DIR__ . '/../../includes/topbar.php';\n";
    $out .= "require_once __DIR__ . '/../../includes/navbar.php';\n";
    $out .= "require_once __DIR__ . '/../../includes/page-banner.php';\n";
    $out .= "?" . ">\n\n";

    $out .= <<<HTML
<style>
  .academic-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    transition: border-color 0.2s ease, box-shadow 0.2s ease;
  }
  .btn-standard-doc {
    background: #ffffff;
    color: #0b2545;
    border: 1px solid #cbd5e1;
    border-radius: 6px;
    font-size: 0.84rem;
    font-weight: 500;
    padding: 5px 12px;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: all 0.2s ease;
    text-decoration: none;
  }
  .btn-standard-doc:hover {
    background: #0b2545;
    color: #ffffff;
    border-color: #0b2545;
  }
  .btn-standard-doc:hover i {
    color: #ffffff !important;
  }
  .standard-table th {
    background: #0b2545;
    color: #ffffff;
    font-weight: 600;
    font-size: 0.85rem;
    padding: 12px 14px;
    letter-spacing: 0.3px;
    border: none;
  }
  .standard-table td {
    padding: 12px 14px;
    vertical-align: middle;
    border-color: #f1f5f9;
    color: #334155;
    font-size: 0.9rem;
  }
  .standard-badge {
    background: #f1f5f9;
    color: #475569;
    border: 1px solid #e2e8f0;
    font-weight: 500;
    font-size: 0.78rem;
    padding: 3px 8px;
    border-radius: 4px;
  }
</style>

<section class="subpage-main-section py-4" style="background-color: #f8fafc;">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="academic-card bg-white p-4 mb-4">
          
          <!-- Standard Document Header -->
          <div class="d-flex flex-wrap justify-content-between align-items-center pb-3 mb-4 border-bottom" style="border-color: #e2e8f0 !important;">
            <div>
              <span class="standard-badge mb-2 d-inline-block">
                <i class="fa fa-book-open-reader me-1 text-secondary"></i> {$safeCat}
              </span>
              <h3 class="fw-bold mb-1" style="color: #0b2545; font-size: 1.5rem;">{$safeTitle}</h3>
              <p class="text-muted small mb-0">Official teaching schemes, credit distributions, evaluation matrix &amp; syllabus records.</p>
            </div>
            <div class="mt-2 mt-md-0">
              <span class="standard-badge text-dark">
                <i class="fa fa-check-circle text-success me-1"></i> Active Curriculum
              </span>
            </div>
          </div>

          <!-- Quick Search Filter Box -->
          <div class="row g-3 mb-3 align-items-center">
            <div class="col-md-6 col-lg-5">
              <div class="input-group">
                <span class="input-group-text bg-white border-end-0" style="border-color: #cbd5e1;"><i class="fa fa-search text-muted"></i></span>
                <input type="text" class="form-control border-start-0 ps-0 scheme-filter-input" style="border-color: #cbd5e1; font-size: 0.88rem;" placeholder="Filter by semester, subject, branch...">
              </div>
            </div>
            <div class="col-md-6 col-lg-7 text-md-end text-muted small">
              <i class="fa fa-file-pdf text-danger me-1"></i> Official PDF documents
            </div>
          </div>

          <!-- Content Body / Tables -->
          <div class="scheme-content-body">
{$innerContent}
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
  const searchInput = document.querySelector('.scheme-filter-input, .table-filter-input');
  if (searchInput) {
    searchInput.addEventListener('keyup', function() {
      const query = this.value.toLowerCase().trim();
      const tables = document.querySelectorAll('.data-table');
      tables.forEach(table => {
        const rows = table.querySelectorAll('tbody tr, tr');
        rows.forEach(row => {
          // don't hide main headers
          if (row.classList.contains('table-primary')) return;
          const text = row.textContent.toLowerCase();
          row.style.display = (query === '' || text.includes(query)) ? '' : 'none';
        });
      });
    });
  }
});
</script>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
HTML;

    file_put_contents($filePath, $out);
    echo "Redesigned: " . basename($filePath) . " ($categoryName)\n";
}

// 1. Process all Scheme files
$schemePages = [
    'BE.php' => 'Bachelor of Engineering (B.E. / B.Tech)',
    'Pharmacy.php' => 'Faculty of Pharmacy (B.Pharm / M.Pharm / D.Pharm)',
    'MTech.php' => 'Master of Technology (M.Tech)',
    'BHMCT.php' => 'Bachelor of Hotel Management & Catering Technology',
    'MBA.php' => 'Master of Business Administration (MBA)',
    'MCA.php' => 'Master of Computer Applications (MCA)',
    'Education.php' => 'Faculty of Education (B.Ed / M.Ed)',
    'Physical_Education.php' => 'Faculty of Physical Education (B.P.Ed / M.P.Ed)',
    'BScHonsAG.php' => 'B.Sc. (Hons.) Agriculture',
    'BHMS.php' => 'Bachelor of Homeopathic Medicine & Surgery (BHMS)',
    'UTD.php' => 'University Teaching Departments (UTD)',
    'Paramedical.php' => 'Faculty of Paramedical & Allied Sciences',
    'Polytechnic_Engineering.php' => 'Polytechnic Diploma in Engineering',
    'BLibISc.php' => 'Bachelor of Library & Information Science',
    'Bachelor_Of_Laws_Llb.php' => 'Faculty of Law (LL.B. / BA LL.B.)',
    'BScHMCS.php' => 'B.Sc. Hotel Management & Catering Science'
];

foreach ($schemePages as $file => $title) {
    $path = __DIR__ . '/Download/Scheme/' . $file;
    processSchemeOrSyllabusFile($path, 'Curriculum Scheme', $title, $urlMap);
}

// 2. Process all Syllabus files
$syllabusPages = [
    'BE.php' => 'Bachelor of Engineering (B.E.) Syllabus',
    'Pharmacy.php' => 'Faculty of Pharmacy Syllabus',
    'MTech.php' => 'Master of Technology (M.Tech) Syllabus',
    'Education.php' => 'Faculty of Education Syllabus',
    'BHMCT.php' => 'BHMCT Course Syllabus',
    'MBA.php' => 'Master of Business Administration (MBA) Syllabus',
    'MCA.php' => 'Master of Computer Applications (MCA) Syllabus',
    'PhysicalEducation.php' => 'Faculty of Physical Education Syllabus',
    'BScHonsAG.php' => 'B.Sc. (Hons.) Agriculture Syllabus',
    'BHMS.php' => 'BHMS Homeopathy Syllabus',
    'UTD.php' => 'University Teaching Departments (UTD) Syllabus',
    'Paramedical.php' => 'Paramedical Courses Syllabus',
    'Polytechnic_Engineering.php' => 'Polytechnic Diploma Syllabus',
    'BLibISc.php' => 'B.Lib.I.Sc. Course Syllabus',
    'Bacheloroflaws_Llb.php' => 'Bachelor of Laws (LL.B.) Syllabus',
    'BScHMCS.php' => 'B.Sc. (HMCS) Course Syllabus'
];

foreach ($syllabusPages as $file => $title) {
    $path = __DIR__ . '/Download/Syllabus/' . $file;
    processSchemeOrSyllabusFile($path, 'Course Syllabus', $title, $urlMap);
}

echo "All 32 Scheme & Syllabus pages processed successfully.\n";
