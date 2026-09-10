<?php
require_once __DIR__ . '/../config.php';
require_admin_auth();

$schemes = get_json_data('schemes.json', []);
$msg = '';
$error = '';

// Handle Delete
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $delId = (int)$_GET['id'];
    $schemes = array_filter($schemes, function($s) use ($delId) {
        return ($s['id'] ?? 0) !== $delId;
    });
    save_json_data('schemes.json', array_values($schemes));
    $msg = 'Curriculum scheme removed successfully.';
}

// Handle Add / Edit Scheme
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $schemeId = !empty($_POST['scheme_id']) ? (int)$_POST['scheme_id'] : time();
    $course = clean_input($_POST['course'] ?? '');
    $faculty = clean_input($_POST['faculty'] ?? 'Engineering & Technology');
    $schemeTitle = clean_input($_POST['scheme'] ?? 'NEP-CBCS Scheme');
    $semester = clean_input($_POST['semester'] ?? 'All Semesters');
    $syllabusFile = clean_input($_POST['existing_syllabus'] ?? '');
    $schemeFile = clean_input($_POST['existing_scheme'] ?? '');

    // Handle Syllabus File Upload
    if (isset($_FILES['syllabus_upload']) && $_FILES['syllabus_upload']['error'] === UPLOAD_ERR_OK) {
        $origName = preg_replace('/[^a-zA-Z0-9_\.-]/', '_', $_FILES['syllabus_upload']['name']);
        $newName = 'syllabus_' . time() . '_' . $origName;
        if (move_uploaded_file($_FILES['syllabus_upload']['tmp_name'], UPLOAD_DIR . '/schemes/' . $newName)) {
            $syllabusFile = $newName;
        }
    } elseif (!empty($_POST['syllabus_custom'])) {
        $syllabusFile = clean_input($_POST['syllabus_custom']);
    }

    // Handle Scheme File Upload
    if (isset($_FILES['scheme_upload']) && $_FILES['scheme_upload']['error'] === UPLOAD_ERR_OK) {
        $origName = preg_replace('/[^a-zA-Z0-9_\.-]/', '_', $_FILES['scheme_upload']['name']);
        $newName = 'scheme_' . time() . '_' . $origName;
        if (move_uploaded_file($_FILES['scheme_upload']['tmp_name'], UPLOAD_DIR . '/schemes/' . $newName)) {
            $schemeFile = $newName;
        }
    } elseif (!empty($_POST['scheme_custom'])) {
        $schemeFile = clean_input($_POST['scheme_custom']);
    }

    if (!empty($course)) {
        $updated = false;
        foreach ($schemes as &$s) {
            if (($s['id'] ?? 0) === $schemeId) {
                $s['course'] = $course;
                $s['faculty'] = $faculty;
                $s['scheme'] = $schemeTitle;
                $s['semester'] = $semester;
                $s['syllabus_file'] = $syllabusFile;
                $s['scheme_file'] = $schemeFile;
                $updated = true;
                break;
            }
        }

        if (!$updated) {
            $newEntry = [
                'id' => $schemeId,
                'course' => $course,
                'faculty' => $faculty,
                'scheme' => $schemeTitle,
                'semester' => $semester,
                'syllabus_file' => $syllabusFile,
                'scheme_file' => $schemeFile,
                'download_count' => 0
            ];
            array_unshift($schemes, $newEntry);
            $msg = 'New curriculum scheme added & published to Downloads page!';
        } else {
            $msg = 'Scheme updated successfully!';
        }

        save_json_data('schemes.json', $schemes);
    } else {
        $error = 'Course program name is required.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Curriculum Schemes & Syllabi - SSSUTMS Admin</title>
  <link rel="icon" type="image/jpeg" href="../assets/images/logo/logo.jpg">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>

<aside class="admin-sidebar">
  <div class="sidebar-brand">
    <div class="d-flex align-items-center gap-2">
      <img src="../assets/images/logo/logo.jpg" alt="Logo" width="38" height="38" class="rounded-circle border">
      <div>
        <h6 class="text-white fw-bold mb-0">SSSUTMS Admin</h6>
        <small class="text-warning">Management Portal</small>
      </div>
    </div>
    <button class="sidebar-close-btn d-lg-none" type="button" aria-label="Close Navigation">
      <i class="fa fa-xmark"></i>
    </button>
  </div>

  <ul class="admin-nav">
    <li><a href="index.php" class="nav-link"><i class="fa fa-gauge"></i> Dashboard</a></li>
    <li><a href="documents.php" class="nav-link"><i class="fa fa-folder-open"></i> Documents & Page PDFs</a></li>
    <li><a href="notices.php" class="nav-link"><i class="fa fa-bullhorn"></i> Notices & Circulars</a></li>
    <li><a href="events.php" class="nav-link"><i class="fa fa-calendar-days"></i> Events & Workshops</a></li>
    <li><a href="schemes.php" class="nav-link active"><i class="fa fa-book-open"></i> Curriculum Schemes</a></li>
    <li><a href="pages.php" class="nav-link"><i class="fa fa-file-lines"></i> Dynamic CMS Pages</a></li>
    <li><a href="applications.php" class="nav-link"><i class="fa fa-user-graduate"></i> Student Registrations</a></li>
    <li><a href="inquiries.php" class="nav-link"><i class="fa fa-envelope-open-text"></i> Admission Leads</a></li>
    <li><a href="settings.php" class="nav-link"><i class="fa fa-sliders"></i> Portal Settings</a></li>
    <li class="mt-4 pt-3 border-top border-white border-opacity-10">
      <a href="../downloads.php" target="_blank" class="nav-link text-white-50"><i class="fa fa-arrow-up-right-from-square"></i> View Downloads Page</a>
    </li>
    <li><a href="logout.php" class="nav-link text-danger"><i class="fa fa-right-from-bracket"></i> Sign Out</a></li>
  </ul>
</aside>

<main class="admin-main">
  
  <header class="admin-topbar">
    <div class="d-flex align-items-center gap-3">
      <button class="admin-sidebar-toggle d-lg-none" type="button" aria-label="Toggle Navigation">
        <i class="fa fa-bars"></i>
      </button>
      <div>
        <h5 class="fw-bold text-dark mb-0">Curriculum Schemes & Syllabi Manager</h5>
        <small class="text-muted d-none d-md-inline">Directly powers the public search & filter matrix on the downloads.php page</small>
      </div>
    </div>
    <div>
      <button class="btn btn-primary fw-bold rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#schemeModal" onclick="resetSchemeForm()">
        <i class="fa fa-plus me-1"></i> Add Curriculum Scheme
      </button>
    </div>
  </header>

  <?php if (!empty($msg)): ?>
    <div class="alert alert-success alert-dismissible fade show rounded-3 border-0 shadow-sm" role="alert">
      <i class="fa fa-circle-check me-2"></i> <?php echo htmlspecialchars($msg); ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  <?php endif; ?>

  <?php if (!empty($error)): ?>
    <div class="alert alert-danger alert-dismissible fade show rounded-3 border-0 shadow-sm" role="alert">
      <i class="fa fa-triangle-exclamation me-2"></i> <?php echo htmlspecialchars($error); ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  <?php endif; ?>

  <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-4">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
      <div class="d-flex align-items-center gap-2">
        <h5 class="fw-bold text-dark mb-0">Active Curriculum Schemes (<?php echo count($schemes); ?>)</h5>
        <span class="badge bg-primary-subtle text-primary fw-bold">Live Synced</span>
      </div>
      <div class="d-flex gap-2">
        <input type="text" id="schemeSearch" class="form-control form-control-sm" placeholder="Search course..." style="width: 250px;">
        <select id="facultyFilter" class="form-select form-select-sm" style="width: 200px;">
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

    <div class="d-block d-md-none text-muted small mb-2">
      <i class="fa fa-arrows-left-right me-1 text-primary"></i> <span class="fw-semibold">Swipe table horizontally</span> to see full content & actions.
    </div>

    <div class="table-responsive">
      <table class="table table-hover align-middle">
        <thead class="table-light">
          <tr>
            <th style="width: 50px;">#</th>
            <th>Program / Course</th>
            <th>Faculty</th>
            <th>Curriculum Scheme</th>
            <th>Semesters</th>
            <th>Files</th>
            <th class="text-end">Actions</th>
          </tr>
        </thead>
        <tbody id="schemesTableBody">
          <?php if (empty($schemes)): ?>
            <tr><td colspan="7" class="text-center py-4 text-muted">No schemes registered. Click "Add Curriculum Scheme" above.</td></tr>
          <?php else: ?>
            <?php foreach ($schemes as $idx => $s): ?>
              <tr class="scheme-admin-row" data-course="<?php echo strtolower(htmlspecialchars($s['course'] ?? '')); ?>" data-faculty="<?php echo strtolower(htmlspecialchars($s['faculty'] ?? '')); ?>">
                <td><small class="text-muted fw-bold"><?php echo $idx + 1; ?></small></td>
                <td><span class="fw-bold text-dark"><?php echo htmlspecialchars($s['course'] ?? ''); ?></span></td>
                <td><span class="badge bg-light text-dark border"><?php echo htmlspecialchars($s['faculty'] ?? ''); ?></span></td>
                <td><span class="badge bg-primary-subtle text-primary fw-semibold"><?php echo htmlspecialchars($s['scheme'] ?? 'NEP / CBCS'); ?></span></td>
                <td><small class="text-muted"><?php echo htmlspecialchars($s['semester'] ?? 'All Semesters'); ?></small></td>
                <td>
                  <div class="d-flex gap-1">
                    <?php if (!empty($s['syllabus_file'])): ?>
                      <span class="badge bg-success-subtle text-success small" title="<?php echo htmlspecialchars($s['syllabus_file']); ?>"><i class="fa fa-file-pdf"></i> Syllabus</span>
                    <?php endif; ?>
                    <?php if (!empty($s['scheme_file'])): ?>
                      <span class="badge bg-warning-subtle text-warning small" title="<?php echo htmlspecialchars($s['scheme_file']); ?>"><i class="fa fa-file-lines"></i> Scheme</span>
                    <?php endif; ?>
                  </div>
                </td>
                <td class="text-end">
                  <button class="btn btn-sm btn-outline-primary rounded-pill px-3 me-1" onclick='editScheme(<?php echo json_encode($s); ?>)'>
                    <i class="fa fa-pen-to-square"></i> Edit
                  </button>
                  <a href="schemes.php?action=delete&id=<?php echo $s['id'] ?? 0; ?>" 
                     class="btn btn-sm btn-outline-danger rounded-pill px-2"
                     onclick="return confirm('Delete this curriculum scheme?');">
                    <i class="fa fa-trash-can"></i>
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>

</main>

<!-- Scheme Modal -->
<div class="modal fade" id="schemeModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content border-0 shadow-lg rounded-4">
      <div class="modal-header border-0 pb-0">
        <h5 class="modal-title fw-bold text-dark" id="modalTitle">Curriculum Scheme & Syllabus</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form method="POST" action="schemes.php" enctype="multipart/form-data">
        <div class="modal-body p-4">
          <input type="hidden" name="action" value="save_scheme">
          <input type="hidden" name="scheme_id" id="formSchemeId" value="">
          <input type="hidden" name="existing_syllabus" id="formExistingSyllabus" value="">
          <input type="hidden" name="existing_scheme" id="formExistingScheme" value="">

          <div class="mb-3">
            <label class="form-label small fw-bold">Course / Degree Program Name *</label>
            <input type="text" name="course" id="formCourse" class="form-control" placeholder="e.g. B.Tech (Computer Science & Engineering)" required>
          </div>

          <div class="row g-3 mb-3">
            <div class="col-md-6">
              <label class="form-label small fw-bold">Faculty Department</label>
              <select name="faculty" id="formFaculty" class="form-select" required>
                <option value="Engineering & Technology">Engineering & Technology</option>
                <option value="Pharmacy">Pharmacy</option>
                <option value="Ayurveda & Medical">Ayurveda & Medical</option>
                <option value="Homeopathy">Homeopathy</option>
                <option value="Management Studies">Management Studies</option>
                <option value="Computer Applications">Computer Applications</option>
                <option value="Nursing">Nursing</option>
                <option value="Law">Law</option>
                <option value="Basic Science">Basic Science</option>
                <option value="Education">Education</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label small fw-bold">Curriculum Structure / Scheme</label>
              <input type="text" name="scheme" id="formSchemeTitle" class="form-control" placeholder="e.g. NEP-CBCS Scheme / PCI Regulations" value="NEP-CBCS Scheme">
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label small fw-bold">Semester Coverage</label>
            <input type="text" name="semester" id="formSemester" class="form-control" placeholder="e.g. Semester I to VIII / All Semesters" value="All Semesters (I to VIII)">
          </div>

          <div class="row g-3 mb-3">
            <div class="col-md-6">
              <label class="form-label small fw-bold">Upload Syllabus Document (PDF)</label>
              <input type="file" name="syllabus_upload" class="form-control" accept=".pdf">
              <input type="text" name="syllabus_custom" id="formSyllabusCustom" class="form-control mt-1 small" placeholder="Or PDF link/filename">
            </div>
            <div class="col-md-6">
              <label class="form-label small fw-bold">Upload Scheme Matrix Document (PDF)</label>
              <input type="file" name="scheme_upload" class="form-control" accept=".pdf">
              <input type="text" name="scheme_custom" id="formSchemeCustom" class="form-control mt-1 small" placeholder="Or PDF link/filename">
            </div>
          </div>
        </div>
        <div class="modal-footer border-0 pt-0">
          <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary rounded-pill px-4 fw-bold">Save Curriculum Scheme</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/admin.js"></script>
<script>
function resetSchemeForm() {
  document.getElementById('modalTitle').textContent = 'Add Curriculum Scheme';
  document.getElementById('formSchemeId').value = '';
  document.getElementById('formExistingSyllabus').value = '';
  document.getElementById('formExistingScheme').value = '';
  document.getElementById('formCourse').value = '';
  document.getElementById('formFaculty').value = 'Engineering & Technology';
  document.getElementById('formSchemeTitle').value = 'NEP-CBCS Scheme';
  document.getElementById('formSemester').value = 'All Semesters (I to VIII)';
  document.getElementById('formSyllabusCustom').value = '';
  document.getElementById('formSchemeCustom').value = '';
}

function editScheme(s) {
  document.getElementById('modalTitle').textContent = 'Edit Curriculum Scheme';
  document.getElementById('formSchemeId').value = s.id || '';
  document.getElementById('formExistingSyllabus').value = s.syllabus_file || '';
  document.getElementById('formExistingScheme').value = s.scheme_file || '';
  document.getElementById('formCourse').value = s.course || '';
  document.getElementById('formFaculty').value = s.faculty || 'Engineering & Technology';
  document.getElementById('formSchemeTitle').value = s.scheme || 'NEP-CBCS Scheme';
  document.getElementById('formSemester').value = s.semester || 'All Semesters';
  document.getElementById('formSyllabusCustom').value = s.syllabus_file || '';
  document.getElementById('formSchemeCustom').value = s.scheme_file || '';
  
  const modal = new bootstrap.Modal(document.getElementById('schemeModal'));
  modal.show();
}

// Instant Filter
document.addEventListener('DOMContentLoaded', function() {
  const search = document.getElementById('schemeSearch');
  const fac = document.getElementById('facultyFilter');
  const rows = document.querySelectorAll('.scheme-admin-row');

  function filterSchemes() {
    const q = (search.value || '').toLowerCase().trim();
    const f = (fac.value || 'all').toLowerCase();

    rows.forEach(r => {
      const course = r.getAttribute('data-course') || '';
      const rowFac = r.getAttribute('data-faculty') || '';
      const matchSearch = !q || course.includes(q);
      const matchFac = f === 'all' || rowFac.includes(f);

      if (matchSearch && matchFac) {
        r.style.display = '';
      } else {
        r.style.display = 'none';
      }
    });
  }

  if (search) search.addEventListener('input', filterSchemes);
  if (fac) fac.addEventListener('change', filterSchemes);
});
</script>

</body>
</html>
