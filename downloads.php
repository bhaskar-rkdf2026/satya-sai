<?php
$page_title = 'downloads - SSSUTMS';
$banner_title = 'downloads';
$banner_category = 'SSSUTMS';

require_once __DIR__ . '/./config.php';
require_once __DIR__ . '/./includes/header.php';
require_once __DIR__ . '/./includes/topbar.php';
require_once __DIR__ . '/./includes/navbar.php';
require_once __DIR__ . '/./includes/page-banner.php';
?>

<section class="subpage-main-section py-4 bg-light">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="content-card">
          <div class="content-card-body">
            <!-- Page Header Breadcrumb -->
<div class="py-5 text-white" style="background: var(--primary-gradient);">
  <div class="container-fluid px-lg-5">
    <h1 class="fw-bold text-white mb-2">Curriculum Schemes & Syllabus Downloads</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="index.php" class="text-warning">Home</a></li>
        <li class="breadcrumb-item active text-white-50" aria-current="page">Downloads & Syllabi</li>
      </ol>
    </nav>
  </div>
</div>

<div class="container-fluid px-lg-5 py-5">
  
  <!-- Section 1: Interactive Live Scheme / Syllabus Filter & Table -->
  <div class="card border-0 shadow-sm rounded-4 p-4 mb-5 bg-white">
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
      <div>
        <span class="section-subtitle">Academic Curriculum</span>
        <h3 class="section-title mb-0">Schemes & Syllabi Matrix</h3>
      </div>
      
      <!-- Filter Inputs -->
      <div class="d-flex flex-wrap gap-2 mt-3 mt-md-0">
        <input type="text" id="schemeSearchInput" class="form-control" placeholder="Search course (e.g. B.Tech, BAMS)..." style="min-width: 260px;">
        <select id="facultyFilterSelect" class="form-select" style="min-width: 200px;">
          <option value="all">All Faculties</option>
          <option value="Engineering">Engineering & Technology</option>
          <option value="Pharmacy">Pharmacy</option>
          <option value="Ayurveda">Ayurveda & Medical</option>
          <option value="Homeopathy">Homeopathy</option>
          <option value="Management">Management Studies</option>
          <option value="Computer">Computer Applications</option>
          <option value="Nursing">Nursing</option>
          <option value="Law">Law</option>
        </select>
      </div>
    </div>
    
    <div class="section-divider mb-4"></div>

    <div class="table-responsive">
      <table class="table table-hover table-bordered align-middle">
        <thead class="table-light">
          <tr>
            <th>Course / Degree Program</th>
            <th>Faculty</th>
            <th>Curriculum Scheme</th>
            <th>Semester Coverage</th>
            <th>Download Action</th>
          </tr>
        </thead>
        <tbody id="schemesTableBody">
          <?php 
          $allSchemes = get_schemes('all');
          foreach ($allSchemes as $s): 
          ?>
            <tr class="scheme-row" data-faculty="<?php echo htmlspecialchars($s['faculty'] ?? ''); ?>" data-course="<?php echo strtolower(htmlspecialchars($s['course'] ?? '')); ?>">
              <td class="fw-bold text-primary"><?php echo htmlspecialchars($s['course'] ?? ''); ?></td>
              <td><span class="badge bg-light text-dark border"><?php echo htmlspecialchars($s['faculty'] ?? ''); ?></span></td>
              <td><span class="badge bg-primary-subtle text-primary fw-semibold"><?php echo htmlspecialchars($s['scheme'] ?? 'NEP / CBCS'); ?></span></td>
              <td><small class="text-muted"><?php echo htmlspecialchars($s['semester'] ?? 'All Semesters'); ?></small></td>
              <td>
                <div class="d-flex gap-2">
                  <?php if (!empty($s['syllabus_file'])): ?>
                    <a href="<?php echo (strpos($s['syllabus_file'], 'http') === 0) ? htmlspecialchars($s['syllabus_file']) : BASE_URL . 'assets/uploads/schemes/' . htmlspecialchars($s['syllabus_file']); ?>" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill"><i class="fa fa-file-pdf me-1"></i> Syllabus</a>
                  <?php endif; ?>
                  <?php if (!empty($s['scheme_file'])): ?>
                    <a href="<?php echo (strpos($s['scheme_file'], 'http') === 0) ? htmlspecialchars($s['scheme_file']) : BASE_URL . 'assets/uploads/schemes/' . htmlspecialchars($s['scheme_file']); ?>" target="_blank" class="btn btn-sm btn-outline-warning text-dark rounded-pill"><i class="fa fa-file-lines me-1"></i> Scheme</a>
                  <?php endif; ?>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const searchInput = document.getElementById('schemeSearchInput');
  const facultySelect = document.getElementById('facultyFilterSelect');
  const rows = document.querySelectorAll('.scheme-row');

  function filterSchemes() {
    const q = (searchInput ? searchInput.value : '').toLowerCase().trim();
    const fac = (facultySelect ? facultySelect.value : 'all');

    rows.forEach(row => {
      const course = row.getAttribute('data-course') || '';
      const rowFac = row.getAttribute('data-faculty') || '';
      const matchesSearch = !q || course.includes(q);
      const matchesFac = fac === 'all' || rowFac.toLowerCase().includes(fac.toLowerCase());

      if (matchesSearch && matchesFac) {
        row.style.display = '';
      } else {
        row.style.display = 'none';
      }
    });
  }

  if (searchInput) searchInput.addEventListener('input', filterSchemes);
  if (facultySelect) facultySelect.addEventListener('change', filterSchemes);
});
</script>

            </div>
          </div>
        </div>

        <!-- Sticky Category Sidebar (Right) -->
        <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
          <?php require_once __DIR__ . '/./includes/sidebar.php'; ?>
        </div>

      </div>
    </div>
  </div>
</section>

<?php require_once __DIR__ . '/./includes/footer.php'; ?>