<?php
require_once __DIR__ . '/config.php';

// Retrieve category, page title, and slug parameters
$cat = clean_input($_GET['cat'] ?? 'University');
$pageSlug = clean_input($_GET['page'] ?? $_GET['title'] ?? 'Overview');
$title = str_replace(['_', '-'], ' ', $pageSlug);

// Load structured page data if available
$pagesData = get_json_data('pages.json', []);
$pageInfo = null;

foreach ($pagesData as $c => $items) {
    if (isset($items[$pageSlug])) {
        $pageInfo = $items[$pageSlug];
        break;
    }
}

$displayTitle = $pageInfo['title'] ?? ucwords($title);
$displayCategory = $pageInfo['category'] ?? ucwords(str_replace(['_', '-'], ' ', $cat));
$displayContent = $pageInfo['content'] ?? "Welcome to the official portal page for <strong>" . htmlspecialchars($displayTitle) . "</strong> at Sri Satya Sai University of Technology & Medical Sciences (SSSUTMS), Sehore (Bhopal, MP). This section provides comprehensive academic, institutional, and regulatory information approved as per UGC and statutory council standards.";

$page_title = $displayTitle . ' - SSSUTMS';
$page_desc = 'Official ' . $displayTitle . ' information, guidelines, curriculum, and notices from Sri Satya Sai University.';

require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/topbar.php';
require_once __DIR__ . '/includes/navbar.php';
?>

<!-- Page Header Breadcrumb Banner -->
<div class="py-4 text-white" style="background: var(--primary-gradient);">
  <div class="container-fluid px-lg-5">
    <div class="row align-items-center">
      <div class="col-md-8">
        <h2 class="fw-bold text-white mb-1"><?php echo htmlspecialchars($displayTitle); ?></h2>
        <span class="badge bg-warning text-dark fw-bold"><?php echo htmlspecialchars($displayCategory); ?></span>
      </div>
      <div class="col-md-4 text-md-end mt-2 mt-md-0">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb justify-content-md-end mb-0 small">
            <li class="breadcrumb-item"><a href="index.php" class="text-warning text-decoration-none">Home</a></li>
            <li class="breadcrumb-item text-white-50"><?php echo htmlspecialchars($displayCategory); ?></li>
            <li class="breadcrumb-item active text-white" aria-current="page"><?php echo htmlspecialchars($displayTitle); ?></li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid px-lg-5 py-5">
  <div class="row g-4">
    
    <!-- Left Column: Dynamic Content & Resource Downloads -->
    <div class="col-lg-8">
      
      <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white mb-4">
        <div class="heading-line-bottom mb-4">
          <h3 class="fw-bold text-primary mb-0"><?php echo htmlspecialchars($displayTitle); ?></h3>
        </div>

        <div class="page-body-content" style="font-size: 15.5px; line-height: 1.8; color: #334155;">
          <p><?php echo $displayContent; ?></p>

          <div class="row g-3 my-4">
            <div class="col-md-6">
              <div class="p-3 border rounded-3 bg-light">
                <h6 class="fw-bold text-primary mb-1"><i class="fa fa-circle-check text-success me-2"></i> Statutory Compliance</h6>
                <small class="text-muted">Adheres to UGC, AICTE, PCI, NCISM, NCH, and INC academic standards and ordinances.</small>
              </div>
            </div>
            <div class="col-md-6">
              <div class="p-3 border rounded-3 bg-light">
                <h6 class="fw-bold text-primary mb-1"><i class="fa fa-graduation-cap text-warning me-2"></i> Quality Assurance</h6>
                <small class="text-muted">Reviewed continuously under IQAC and NAAC criteria for institutional excellence.</small>
              </div>
            </div>
          </div>

          <h5 class="fw-bold text-dark mt-4 mb-3"><i class="fa fa-file-pdf text-danger me-2"></i> Official Circulars & Document Attachments</h5>
          <div class="table-responsive">
            <table class="table table-bordered align-middle small">
              <thead class="table-light">
                <tr>
                  <th>Document Title</th>
                  <th>Published Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><strong><?php echo htmlspecialchars($displayTitle); ?> - Comprehensive Information Brochure / Circular</strong></td>
                  <td><?php echo date('d-M-Y'); ?></td>
                  <td><a href="downloads.php" class="btn btn-sm btn-outline-primary rounded-pill px-3"><i class="fa fa-download me-1"></i> Download PDF</a></td>
                </tr>
                <tr>
                  <td><strong>Academic Guidelines & Ordinances (Session 2026-27)</strong></td>
                  <td>15-Jul-2026</td>
                  <td><a href="downloads.php" class="btn btn-sm btn-outline-secondary rounded-pill px-3"><i class="fa fa-file-lines me-1"></i> View Guidelines</a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center pt-4 border-top mt-4">
          <small class="text-muted"><i class="fa fa-shield text-success me-1"></i> Official Sri Satya Sai University Verified Page</small>
          <div>
            <button type="button" class="btn btn-sm btn-outline-primary me-2" onclick="window.print()"><i class="fa fa-print me-1"></i> Print</button>
            <button type="button" class="btn btn-sm btn-warning text-dark fw-bold" data-bs-toggle="modal" data-bs-target="#enquiryModal"><i class="fa fa-paper-plane me-1"></i> Enquire for Admissions</button>
          </div>
        </div>
      </div>

    </div>

    <!-- Right Sidebar: Category Navigation & Fast Links -->
    <div class="col-lg-4">
      
      <!-- Category Fast Nav Sidebar -->
      <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-4 sticky-top" style="top: 70px;">
        <h5 class="fw-bold text-primary mb-3"><i class="fa fa-sitemap text-warning me-2"></i> Quick Directory</h5>
        <div class="list-group list-group-flush small">
          <a href="page.php?cat=About&page=Background" class="list-group-item list-group-item-action py-2">Background & History</a>
          <a href="page.php?cat=About&page=ViceChancellor" class="list-group-item list-group-item-action py-2">Vice Chancellor Message</a>
          <a href="page.php?cat=About&page=Registrar" class="list-group-item list-group-item-action py-2">Office of Registrar</a>
          <a href="page.php?cat=About&page=Approvals" class="list-group-item list-group-item-action py-2">Approvals & Ordinances</a>
          <a href="page.php?cat=Academic&page=FacultiesAndDepartments" class="list-group-item list-group-item-action py-2">Faculties & Departments</a>
          <a href="page.php?cat=Academic&page=NAAC" class="list-group-item list-group-item-action py-2">NAAC (SSR Criteria 1 to 7)</a>
          <a href="page.php?cat=Admission&page=AdmissionProcedure" class="list-group-item list-group-item-action py-2">Admission Procedure 2026-27</a>
          <a href="page.php?cat=Examination&page=Results" class="list-group-item list-group-item-action py-2">Examinations & Results</a>
          <a href="downloads.php" class="list-group-item list-group-item-action py-2">Schemes & Syllabus Matrix</a>
        </div>

        <hr class="my-3">

        <div class="p-3 bg-light rounded-3 text-center">
          <h6 class="fw-bold text-dark mb-1">Need Assistance?</h6>
          <p class="small text-muted mb-2">Speak directly with our academic desk.</p>
          <a href="https://wa.me/917748900028" target="_blank" class="btn btn-success btn-sm w-100 fw-bold rounded-pill">
            <i class="fa-brands fa-whatsapp me-1"></i> WhatsApp: +91-7748900028
          </a>
        </div>
      </div>

    </div>

  </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
