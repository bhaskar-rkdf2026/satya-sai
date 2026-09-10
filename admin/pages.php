<?php
require_once __DIR__ . '/../config.php';
require_admin_auth();

$pagesData = get_json_data('pages.json', []);
$msg = '';
$error = '';

// Flatten pages for easy management
$flatPages = [];
foreach ($pagesData as $catKey => $pages) {
    if (is_array($pages)) {
        foreach ($pages as $slug => $info) {
            $flatPages[] = [
                'group' => $catKey,
                'slug' => $slug,
                'title' => $info['title'] ?? ucwords(str_replace('_', ' ', $slug)),
                'category' => $info['category'] ?? ucwords(str_replace('_', ' ', $catKey)),
                'content' => $info['content'] ?? ''
            ];
        }
    }
}

// Handle Add / Edit Page
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'save_page') {
    $group = clean_input($_POST['group'] ?? 'about');
    $slug = preg_replace('/[^a-zA-Z0-9_-]/', '', trim($_POST['slug'] ?? ''));
    $title = clean_input($_POST['title'] ?? '');
    $category = clean_input($_POST['category'] ?? 'University');
    $content = trim($_POST['content'] ?? '');

    if (!empty($slug) && !empty($title)) {
        if (!isset($pagesData[$group])) {
            $pagesData[$group] = [];
        }

        $pagesData[$group][$slug] = [
            'title' => $title,
            'category' => $category,
            'content' => $content
        ];

        save_json_data('pages.json', $pagesData);
        $msg = 'Page content saved successfully! Real-time reflection is live on page.php.';

        // Re-read flattened list
        $flatPages = [];
        foreach ($pagesData as $catKey => $pages) {
            if (is_array($pages)) {
                foreach ($pages as $s => $info) {
                    $flatPages[] = [
                        'group' => $catKey,
                        'slug' => $s,
                        'title' => $info['title'] ?? $s,
                        'category' => $info['category'] ?? $catKey,
                        'content' => $info['content'] ?? ''
                    ];
                }
            }
        }
    } else {
        $error = 'Slug and page title are required.';
    }
}

// Handle Delete Page
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['group']) && isset($_GET['slug'])) {
    $delGroup = $_GET['group'];
    $delSlug = $_GET['slug'];
    if (isset($pagesData[$delGroup][$delSlug])) {
        unset($pagesData[$delGroup][$delSlug]);
        save_json_data('pages.json', $pagesData);
        $msg = 'Page removed from dynamic router.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dynamic CMS Pages - SSSUTMS Admin</title>
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
    <li><a href="notices.php" class="nav-link"><i class="fa fa-bullhorn"></i> Notices & Circulars</a></li>
    <li><a href="events.php" class="nav-link"><i class="fa fa-calendar-days"></i> Events & Workshops</a></li>
    <li><a href="schemes.php" class="nav-link"><i class="fa fa-book-open"></i> Curriculum Schemes</a></li>
    <li><a href="pages.php" class="nav-link active"><i class="fa fa-file-lines"></i> Dynamic CMS Pages</a></li>
    <li><a href="applications.php" class="nav-link"><i class="fa fa-user-graduate"></i> Student Registrations</a></li>
    <li><a href="inquiries.php" class="nav-link"><i class="fa fa-envelope-open-text"></i> Admission Leads</a></li>
    <li><a href="settings.php" class="nav-link"><i class="fa fa-sliders"></i> Portal Settings</a></li>
    <li class="mt-4 pt-3 border-top border-white border-opacity-10">
      <a href="../index.php" target="_blank" class="nav-link text-white-50"><i class="fa fa-arrow-up-right-from-square"></i> Visit Public Site</a>
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
        <h5 class="fw-bold text-dark mb-0">Dynamic CMS Page Content Editor</h5>
        <small class="text-muted d-none d-md-inline">Directly powers the official portal page router (page.php) for institutional pages</small>
      </div>
    </div>
    <div>
      <button class="btn btn-primary fw-bold rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#pageModal" onclick="resetPageForm()">
        <i class="fa fa-plus me-1"></i> Add Dynamic Page
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
        <h5 class="fw-bold text-dark mb-0">Institutional Pages (<?php echo count($flatPages); ?>)</h5>
        <span class="badge bg-success-subtle text-success fw-bold">Live Synced</span>
      </div>
      <div class="d-flex gap-2">
        <input type="text" id="pageSearch" class="form-control form-control-sm" placeholder="Search page title or slug..." style="width: 270px;">
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
            <th>Page Title & Slug</th>
            <th>Category</th>
            <th>Content Snippet</th>
            <th class="text-end">Actions</th>
          </tr>
        </thead>
        <tbody id="pagesTableBody">
          <?php foreach ($flatPages as $idx => $p): 
            $previewUrl = BASE_URL . 'page.php?cat=' . urlencode($p['group']) . '&page=' . urlencode($p['slug']);
          ?>
            <tr class="page-admin-row" data-title="<?php echo strtolower(htmlspecialchars($p['title'])); ?>" data-slug="<?php echo strtolower(htmlspecialchars($p['slug'])); ?>">
              <td><small class="text-muted fw-bold"><?php echo $idx + 1; ?></small></td>
              <td>
                <div class="fw-bold text-dark"><?php echo htmlspecialchars($p['title']); ?></div>
                <small class="text-muted"><i class="fa fa-link me-1"></i> slug: <code><?php echo htmlspecialchars($p['slug']); ?></code></small>
              </td>
              <td>
                <span class="badge bg-warning-subtle text-dark fw-semibold"><?php echo htmlspecialchars($p['category']); ?></span>
              </td>
              <td>
                <small class="text-secondary" style="max-width: 320px; display: inline-block; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                  <?php echo htmlspecialchars(strip_tags($p['content'])); ?>
                </small>
              </td>
              <td class="text-end">
                <a href="<?php echo htmlspecialchars($previewUrl); ?>" target="_blank" class="btn btn-sm btn-outline-secondary rounded-pill px-3 me-1" title="View Public Page">
                  <i class="fa fa-external-link"></i>
                </a>
                <button class="btn btn-sm btn-outline-primary rounded-pill px-3 me-1" onclick='editPage(<?php echo json_encode($p); ?>)'>
                  <i class="fa fa-pen-to-square"></i> Edit
                </button>
                <a href="pages.php?action=delete&group=<?php echo urlencode($p['group']); ?>&slug=<?php echo urlencode($p['slug']); ?>" 
                   class="btn btn-sm btn-outline-danger rounded-pill px-2"
                   onclick="return confirm('Remove this dynamic page entry?');">
                  <i class="fa fa-trash-can"></i>
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

</main>

<!-- Page Add/Edit Modal -->
<div class="modal fade" id="pageModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content border-0 shadow-lg rounded-4">
      <div class="modal-header border-0 pb-0">
        <h5 class="modal-title fw-bold text-dark" id="modalTitle">Edit Page Content</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form method="POST" action="pages.php">
        <div class="modal-body p-4">
          <input type="hidden" name="action" value="save_page">
          <input type="hidden" name="group" id="formGroup" value="about">

          <div class="row g-3 mb-3">
            <div class="col-md-6">
              <label class="form-label small fw-bold">Page Slug (URL Identifier) *</label>
              <input type="text" name="slug" id="formSlug" class="form-control" placeholder="e.g. Chancellor, VisionAndMission" required>
              <small class="text-muted">Used in URL: page.php?cat=about&page=Slug</small>
            </div>
            <div class="col-md-6">
              <label class="form-label small fw-bold">Page Display Title *</label>
              <input type="text" name="title" id="formTitle" class="form-control" placeholder="e.g. Vice Chancellor's Desk" required>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label small fw-bold">Section Category</label>
            <input type="text" name="category" id="formCategory" class="form-control" placeholder="e.g. University Officials, About University, Governance" required>
          </div>

          <div class="mb-3">
            <label class="form-label small fw-bold">Page Body Content (Text or HTML allowed) *</label>
            <textarea name="content" id="formContent" rows="7" class="form-control" placeholder="Comprehensive institutional description, statutory norms, accreditation guidelines..." required></textarea>
          </div>
        </div>
        <div class="modal-footer border-0 pt-0">
          <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary rounded-pill px-4 fw-bold">Save Page Content</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/admin.js"></script>
<script>
function resetPageForm() {
  document.getElementById('modalTitle').textContent = 'Add Dynamic Page';
  document.getElementById('formGroup').value = 'about';
  document.getElementById('formSlug').value = '';
  document.getElementById('formSlug').readOnly = false;
  document.getElementById('formTitle').value = '';
  document.getElementById('formCategory').value = 'About University';
  document.getElementById('formContent').value = '';
}

function editPage(p) {
  document.getElementById('modalTitle').textContent = 'Edit Page: ' + p.title;
  document.getElementById('formGroup').value = p.group || 'about';
  document.getElementById('formSlug').value = p.slug || '';
  document.getElementById('formSlug').readOnly = true;
  document.getElementById('formTitle').value = p.title || '';
  document.getElementById('formCategory').value = p.category || '';
  document.getElementById('formContent').value = p.content || '';
  
  const modal = new bootstrap.Modal(document.getElementById('pageModal'));
  modal.show();
}

// Instant Filter
document.addEventListener('DOMContentLoaded', function() {
  const search = document.getElementById('pageSearch');
  const rows = document.querySelectorAll('.page-admin-row');

  if (search) {
    search.addEventListener('input', function() {
      const q = (search.value || '').toLowerCase().trim();
      rows.forEach(r => {
        const title = r.getAttribute('data-title') || '';
        const slug = r.getAttribute('data-slug') || '';
        if (!q || title.includes(q) || slug.includes(q)) {
          r.style.display = '';
        } else {
          r.style.display = 'none';
        }
      });
    });
  }
});
</script>

</body>
</html>
