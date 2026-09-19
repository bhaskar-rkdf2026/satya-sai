<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/gallery_helper.php';
require_admin_auth();

$msg = '';
$error = '';

// Handle Page Info Save
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'save_page_info') {
    $infoData = [
        'page_title'       => clean_input($_POST['page_title'] ?? 'Photo & Video Gallery - SSSUTMS'),
        'banner_title'     => clean_input($_POST['banner_title'] ?? 'Campus Photo & Video Gallery'),
        'banner_category'  => clean_input($_POST['banner_category'] ?? 'Campus Life'),
        'heading'          => clean_input($_POST['heading'] ?? 'Campus Moments, Infrastructure & Life at SSSUTMS'),
        'video_heading'    => clean_input($_POST['video_heading'] ?? 'Campus Video Tour & Convocation Highlights'),
        'meta_title'       => clean_input($_POST['meta_title'] ?? ''),
        'meta_description' => clean_input($_POST['meta_description'] ?? ''),
        'meta_keywords'    => clean_input($_POST['meta_keywords'] ?? ''),
        'canonical_url'    => clean_input($_POST['canonical_url'] ?? ''),
        'og_image'         => clean_input($_POST['og_image'] ?? 'assets/images/logo/logo.jpg')
    ];
    if (save_gallery_page_info($infoData)) {
        $msg = 'Gallery page headings, SEO meta tags & information updated successfully!';
    } else {
        $error = 'Failed to update page information.';
    }
}

// Handle Save Photo (Upload or Edit Custom Photo)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'save_photo') {
    $photoId = !empty($_POST['photo_id']) ? clean_input($_POST['photo_id']) : ('cp_' . time() . '_' . rand(100, 999));
    $title = clean_input($_POST['title'] ?? '');
    $cat = clean_input($_POST['category'] ?? 'campus');
    $badge = clean_input($_POST['badge'] ?? '');
    $status = clean_input($_POST['status'] ?? 'Active');
    $imageUrl = trim($_POST['existing_url'] ?? '');

    // Handle Image Upload
    if (isset($_FILES['photo_file']) && $_FILES['photo_file']['error'] === UPLOAD_ERR_OK) {
        $allowed = ['jpg', 'jpeg', 'png', 'webp', 'gif'];
        $origName = $_FILES['photo_file']['name'];
        $ext = strtolower(pathinfo($origName, PATHINFO_EXTENSION));

        if (in_array($ext, $allowed)) {
            $destDir = __DIR__ . '/../assets/uploads/gallery';
            if (!is_dir($destDir)) {
                mkdir($destDir, 0777, true);
            }
            $newFileName = 'photo_' . time() . '_' . preg_replace('/[^a-zA-Z0-9_-]/', '_', pathinfo($origName, PATHINFO_FILENAME)) . '.' . $ext;
            if (move_uploaded_file($_FILES['photo_file']['tmp_name'], $destDir . '/' . $newFileName)) {
                $imageUrl = 'assets/uploads/gallery/' . $newFileName;
            } else {
                $error = 'Failed to upload photo to server.';
            }
        } else {
            $error = 'Invalid image format. Allowed formats: JPG, JPEG, PNG, WEBP, GIF.';
        }
    }

    if (empty($error)) {
        if (!empty($imageUrl)) {
            if (empty($title)) {
                $title = 'Campus Photograph';
            }
            $photoItem = [
                'id'     => $photoId,
                'title'  => $title,
                'cat'    => $cat,
                'badge'  => $badge,
                'url'    => $imageUrl,
                'status' => $status,
                'date'   => date('Y-m-d')
            ];
            save_gallery_photo($photoItem);
            $msg = 'Photo uploaded and added to gallery successfully!';
        } else {
            $error = 'Please upload a photo image file or specify an image URL.';
        }
    }
}

// Handle Delete Custom Photo
if (isset($_GET['action']) && $_GET['action'] === 'delete_photo' && isset($_GET['id'])) {
    $delId = clean_input($_GET['id']);
    delete_gallery_photo($delId);
    $msg = 'Photo removed from gallery.';
}

// Handle Save Category / Album
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'save_category') {
    $catKey = preg_replace('/[^a-z0-9_-]/', '', strtolower(trim($_POST['category_key'] ?? '')));
    $name = clean_input($_POST['name'] ?? '');
    $badge = clean_input($_POST['badge'] ?? '');
    $icon = clean_input($_POST['icon'] ?? 'fa-images');
    $dir = clean_input($_POST['dir'] ?? '');
    $status = clean_input($_POST['status'] ?? 'Active');

    if (!empty($catKey) && !empty($name)) {
        $catData = [
            'name'   => $name,
            'badge'  => $badge ?: $name,
            'icon'   => $icon,
            'dir'    => $dir,
            'status' => $status
        ];
        save_gallery_category($catKey, $catData);
        $msg = 'Gallery album / category updated successfully!';
    } else {
        $error = 'Category Key and Name are required.';
    }
}

// Handle Delete Category
if (isset($_GET['action']) && $_GET['action'] === 'delete_category' && isset($_GET['key'])) {
    $delKey = clean_input($_GET['key']);
    delete_gallery_category($delKey);
    $msg = 'Category album removed.';
}

// Handle Save Video Tour
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'save_video') {
    $vidId = !empty($_POST['video_id']) ? clean_input($_POST['video_id']) : ('vid_' . date('Ymd_His'));
    $title = clean_input($_POST['title'] ?? '');
    $embedUrl = trim($_POST['embed_url'] ?? '');
    $desc = clean_input($_POST['description'] ?? '');
    $status = clean_input($_POST['status'] ?? 'Active');

    // Extract YouTube ID if full URL pasted
    if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $embedUrl, $match)) {
        $embedUrl = 'https://www.youtube.com/embed/' . $match[1];
    }

    if (!empty($title) && !empty($embedUrl)) {
        $videoItem = [
            'id'          => $vidId,
            'title'       => $title,
            'embed_url'   => $embedUrl,
            'description' => $desc,
            'status'      => $status
        ];
        save_gallery_video($videoItem);
        $msg = 'Campus video highlight saved successfully!';
    } else {
        $error = 'Video Title and YouTube Embed URL are required.';
    }
}

// Handle Delete Video
if (isset($_GET['action']) && $_GET['action'] === 'delete_video' && isset($_GET['id'])) {
    $delId = clean_input($_GET['id']);
    delete_gallery_video($delId);
    $msg = 'Video highlight removed.';
}

$pageInfo = get_gallery_page_info();
$categories = get_gallery_categories();
$allPhotos = get_gallery_photos('all', false);
$videos = get_gallery_videos();

$totalPhotos = count($allPhotos);
$totalAlbums = count($categories);
$totalVideos = count($videos);
$customCount = count(array_filter($allPhotos, function($p) { return !empty($p['is_custom']); }));
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Photo &amp; Video Gallery - SSSUTMS Admin</title>
  <link rel="icon" type="image/jpeg" href="../assets/images/logo/logo.jpg">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/admin.css">
  <style>
    .custom-table th {
      background-color: #0b2545;
      color: #ffffff;
      font-weight: 600;
      font-size: 0.85rem;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }
    .nav-tabs .nav-link {
      font-weight: 600;
      color: #64748b;
      border-radius: 8px 8px 0 0;
      padding: 12px 20px;
    }
    .nav-tabs .nav-link.active {
      color: #0b2545;
      border-bottom: 3px solid #0b2545;
      background: #ffffff;
    }
    .gallery-admin-thumb {
      width: 70px;
      height: 52px;
      object-fit: cover;
      border-radius: 6px;
      border: 1px solid #e2e8f0;
      background: #000;
    }
  </style>
</head>
<body>

<!-- Admin Sidebar -->
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
    <li><a href="home.php" class="nav-link"><i class="fa fa-house-chimney-window"></i> Home Page Editor</a></li>
    <li><a href="admission.php" class="nav-link"><i class="fa fa-user-graduate"></i> Admission Cell (7)</a></li>
    <li><a href="examination.php" class="nav-link"><i class="fa fa-graduation-cap"></i> Examination Cell (5)</a></li>
    <li><a href="research.php" class="nav-link"><i class="fa fa-flask"></i> Research Cell (12)</a></li>
    <li><a href="about.php" class="nav-link"><i class="fa fa-circle-info"></i> About Pages (42)</a></li>
    <li><a href="faculties.php" class="nav-link"><i class="fa fa-chalkboard-user"></i> Faculties &amp; Depts (14)</a></li>
    <li><a href="documents.php" class="nav-link"><i class="fa fa-stamp"></i> Approvals &amp; NAAC Docs</a></li>
    <li><a href="events.php" class="nav-link"><i class="fa fa-calendar-days"></i> Events &amp; Workshops</a></li>
    <li><a href="career.php" class="nav-link"><i class="fa fa-briefcase"></i> Career &amp; Recruitment</a></li>
    <li><a href="contact.php" class="nav-link"><i class="fa fa-phone-volume"></i> Contact &amp; Helpdesk</a></li>
    <li><a href="itep.php" class="nav-link"><i class="fa fa-graduation-cap"></i> ITEP Cell</a></li>
    <li><a href="gallery.php" class="nav-link active"><i class="fa fa-camera-retro"></i> Photo &amp; Video Gallery</a></li>
    <li><a href="downloads.php" class="nav-link"><i class="fa fa-folder-arrow-down"></i> Curriculum &amp; Downloads (52)</a></li>
    <li><a href="applications.php" class="nav-link"><i class="fa fa-user-graduate"></i> Student Registrations</a></li>
    <li><a href="inquiries.php" class="nav-link"><i class="fa fa-envelope-open-text"></i> Admission Leads</a></li>
    <li><a href="settings.php" class="nav-link"><i class="fa fa-sliders"></i> Portal Settings</a></li>
    <li class="mt-4 pt-3 border-top border-white border-opacity-10">
      <a href="../gallery.php" target="_blank" class="nav-link text-white-50"><i class="fa fa-arrow-up-right-from-square"></i> View Public Gallery</a>
    </li>
    <li><a href="logout.php" class="nav-link text-danger"><i class="fa fa-right-from-bracket"></i> Sign Out</a></li>
  </ul>
</aside>

<!-- Main Admin Content -->
<main class="admin-main">
  
  <header class="admin-topbar">
    <div class="d-flex align-items-center gap-3">
      <button class="admin-sidebar-toggle d-lg-none" type="button" aria-label="Toggle Navigation">
        <i class="fa fa-bars"></i>
      </button>
      <div>
        <h5 class="fw-bold text-dark mb-0">Photo &amp; Video Gallery Management</h5>
        <small class="text-muted">Dynamic Management for Campus Albums, Photographs, Media Uploads &amp; Video Highlights</small>
      </div>
    </div>
    <div class="d-flex align-items-center gap-2">
      <a href="../gallery.php" target="_blank" class="btn btn-outline-primary btn-sm rounded-pill px-3">
        <i class="fa fa-external-link me-1"></i> Live Gallery View
      </a>
      <div class="d-flex align-items-center gap-2 ms-2">
        <img src="../assets/images/logo/logo.jpg" alt="Admin" width="34" height="34" class="rounded-circle border">
        <span class="small fw-bold text-dark d-none d-sm-inline"><?php echo htmlspecialchars($_SESSION['admin_user'] ?? 'Admin'); ?></span>
      </div>
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

  <!-- KPI Metric Cards Grid -->
  <div class="row g-3 mb-4">
    <div class="col-xl-3 col-sm-6">
      <div class="card border-0 shadow-sm rounded-3 p-3 bg-white h-100">
        <div class="d-flex align-items-center justify-content-between">
          <div>
            <span class="text-muted small fw-semibold">Total Photos</span>
            <h3 class="fw-bold text-dark mb-0 mt-1"><?php echo $totalPhotos; ?></h3>
            <span class="small text-muted">Across all campus albums</span>
          </div>
          <div class="p-3 bg-primary-subtle text-primary rounded-3">
            <i class="fa fa-camera-retro fa-2x"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card border-0 shadow-sm rounded-3 p-3 bg-white h-100">
        <div class="d-flex align-items-center justify-content-between">
          <div>
            <span class="text-muted small fw-semibold">Photo Albums</span>
            <h3 class="fw-bold text-success mb-0 mt-1"><?php echo $totalAlbums; ?></h3>
            <span class="small text-success"><i class="fa fa-check-circle me-1"></i> Categorized</span>
          </div>
          <div class="p-3 bg-success-subtle text-success rounded-3">
            <i class="fa fa-folder-open fa-2x"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card border-0 shadow-sm rounded-3 p-3 bg-white h-100">
        <div class="d-flex align-items-center justify-content-between">
          <div>
            <span class="text-muted small fw-semibold">Video Highlights</span>
            <h3 class="fw-bold text-warning mb-0 mt-1"><?php echo $totalVideos; ?></h3>
            <span class="small text-muted">Campus tours &amp; events</span>
          </div>
          <div class="p-3 bg-warning-subtle text-warning rounded-3">
            <i class="fa fa-film fa-2x"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card border-0 shadow-sm rounded-3 p-3 bg-white h-100">
        <div class="d-flex align-items-center justify-content-between">
          <div>
            <span class="text-muted small fw-semibold">Custom Uploads</span>
            <h3 class="fw-bold text-info mb-0 mt-1"><?php echo $customCount; ?></h3>
            <span class="small text-muted">Directly uploaded</span>
          </div>
          <div class="p-3 bg-info-subtle text-info rounded-3">
            <i class="fa fa-cloud-arrow-up fa-2x"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Management Tabs -->
  <div class="card border-0 shadow-sm rounded-3">
    <div class="card-header bg-white border-bottom pt-3 pb-0">
      <ul class="nav nav-tabs border-bottom-0" id="galleryTabs" role="tablist">
        <li class="nav-item">
          <button class="nav-link active" id="photos-tab" data-bs-toggle="tab" data-bs-target="#photos-pane" type="button" role="tab">
            <i class="fa fa-images me-2 text-primary"></i> Photos &amp; Media (<?php echo $totalPhotos; ?>)
          </button>
        </li>
        <li class="nav-item">
          <button class="nav-link" id="albums-tab" data-bs-toggle="tab" data-bs-target="#albums-pane" type="button" role="tab">
            <i class="fa fa-folder-tree me-2 text-warning"></i> Photo Albums &amp; Categories (<?php echo $totalAlbums; ?>)
          </button>
        </li>
        <li class="nav-item">
          <button class="nav-link" id="videos-tab" data-bs-toggle="tab" data-bs-target="#videos-pane" type="button" role="tab">
            <i class="fa fa-film me-2 text-info"></i> Video Highlights &amp; Tours (<?php echo $totalVideos; ?>)
          </button>
        </li>
        <li class="nav-item">
          <button class="nav-link" id="pageinfo-tab" data-bs-toggle="tab" data-bs-target="#pageinfo-pane" type="button" role="tab">
            <i class="fa fa-sliders me-2 text-dark"></i> Page Titles &amp; Headings
          </button>
        </li>
      </ul>
    </div>

    <div class="card-body p-4">
      <div class="tab-content" id="galleryTabsContent">
        
        <!-- TAB 1: Photos & Media Management -->
        <div class="tab-pane fade show active" id="photos-pane" role="tabpanel">
          <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
            <div>
              <h5 class="fw-bold text-dark mb-1">Campus Photographs Collection</h5>
              <p class="text-muted small mb-0">Browse and manage photographs displayed in the public gallery.</p>
            </div>
            <button class="btn btn-primary rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#photoModal" onclick="resetPhotoForm()">
              <i class="fa fa-cloud-arrow-up me-1"></i> Upload New Photograph
            </button>
          </div>

          <div class="table-responsive">
            <table class="table table-hover align-middle custom-table mb-0 border">
              <thead>
                <tr>
                  <th style="width: 80px;">Thumbnail</th>
                  <th>Photo Title / Caption</th>
                  <th>Album / Category</th>
                  <th>Type</th>
                  <th>Status</th>
                  <th class="text-end" style="width: 140px;">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php if (empty($allPhotos)): ?>
                  <tr>
                    <td colspan="6" class="text-center py-5 text-muted">
                      <i class="fa fa-images fa-3x mb-3 text-secondary opacity-50"></i>
                      <h6>No Photographs Found</h6>
                      <p class="small">Click "Upload New Photograph" to add photos to the gallery.</p>
                    </td>
                  </tr>
                <?php else: ?>
                  <?php foreach ($allPhotos as $p): 
                    $photoJson = htmlspecialchars(json_encode($p), ENT_QUOTES, 'UTF-8');
                  ?>
                  <tr>
                    <td>
                      <a href="<?php echo htmlspecialchars($p['url']); ?>" target="_blank" title="View Full Image">
                        <img src="<?php echo htmlspecialchars($p['url']); ?>" alt="" class="gallery-admin-thumb">
                      </a>
                    </td>
                    <td>
                      <div class="fw-bold text-dark"><?php echo htmlspecialchars($p['title']); ?></div>
                      <small class="text-muted text-truncate d-inline-block" style="max-width: 280px;"><?php echo htmlspecialchars($p['raw_url'] ?? ''); ?></small>
                    </td>
                    <td>
                      <span class="badge bg-primary-subtle text-primary border border-primary fw-bold">
                        <?php echo htmlspecialchars($p['catName'] ?? 'General'); ?>
                      </span>
                    </td>
                    <td>
                      <?php if (!empty($p['is_custom'])): ?>
                        <span class="badge bg-success-subtle text-success"><i class="fa fa-cloud-upload me-1"></i> Custom Upload</span>
                      <?php else: ?>
                        <span class="badge bg-secondary-subtle text-secondary"><i class="fa fa-folder me-1"></i> Asset Dir</span>
                      <?php endif; ?>
                    </td>
                    <td>
                      <?php if (($p['status'] ?? 'Active') === 'Active'): ?>
                        <span class="badge bg-success-subtle text-success">Active</span>
                      <?php else: ?>
                        <span class="badge bg-secondary-subtle text-secondary">Inactive</span>
                      <?php endif; ?>
                    </td>
                    <td class="text-end">
                      <a href="<?php echo htmlspecialchars($p['url']); ?>" target="_blank" class="btn btn-outline-secondary btn-sm rounded-circle me-1" title="View Image">
                        <i class="fa fa-external-link"></i>
                      </a>
                      <?php if (!empty($p['is_custom'])): ?>
                        <a href="gallery.php?action=delete_photo&id=<?php echo urlencode($p['id']); ?>" class="btn btn-outline-danger btn-sm rounded-circle" title="Delete" onclick="return confirm('Delete this custom uploaded photograph?');">
                          <i class="fa fa-trash"></i>
                        </a>
                      <?php endif; ?>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>

        <!-- TAB 2: Photo Albums & Categories -->
        <div class="tab-pane fade" id="albums-pane" role="tabpanel">
          <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
            <div>
              <h5 class="fw-bold text-dark mb-1">Gallery Categories &amp; Album Folders</h5>
              <p class="text-muted small mb-0">Manage albums, badges, and icon associations for filtering.</p>
            </div>
            <button class="btn btn-warning text-dark fw-bold rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#categoryModal" onclick="resetCatForm()">
              <i class="fa fa-plus-circle me-1"></i> Add New Album
            </button>
          </div>

          <div class="table-responsive">
            <table class="table table-hover align-middle custom-table mb-0 border">
              <thead>
                <tr>
                  <th>Album Key</th>
                  <th>Album Name</th>
                  <th>Badge Label</th>
                  <th>Icon</th>
                  <th>Directory Path</th>
                  <th>Status</th>
                  <th class="text-end" style="width: 140px;">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($categories as $k => $c): 
                  $catObj = array_merge($c, ['key' => $k]);
                  $catJson = htmlspecialchars(json_encode($catObj), ENT_QUOTES, 'UTF-8');
                ?>
                <tr>
                  <td><code><?php echo htmlspecialchars($k); ?></code></td>
                  <td>
                    <div class="fw-bold text-dark"><?php echo htmlspecialchars($c['name']); ?></div>
                  </td>
                  <td>
                    <span class="badge bg-warning-subtle text-dark border"><?php echo htmlspecialchars($c['badge'] ?? ''); ?></span>
                  </td>
                  <td>
                    <i class="fa <?php echo htmlspecialchars($c['icon'] ?? 'fa-images'); ?> text-primary fa-lg"></i>
                  </td>
                  <td>
                    <small class="text-muted font-monospace"><?php echo htmlspecialchars($c['dir'] ?? '—'); ?></small>
                  </td>
                  <td>
                    <?php if (($c['status'] ?? 'Active') === 'Active'): ?>
                      <span class="badge bg-success-subtle text-success">Active</span>
                    <?php else: ?>
                      <span class="badge bg-secondary-subtle text-secondary">Inactive</span>
                    <?php endif; ?>
                  </td>
                  <td class="text-end">
                    <button class="btn btn-outline-primary btn-sm rounded-circle me-1" onclick="editCategory(<?php echo $catJson; ?>)">
                      <i class="fa fa-pencil"></i>
                    </button>
                    <a href="gallery.php?action=delete_category&key=<?php echo urlencode($k); ?>" class="btn btn-outline-danger btn-sm rounded-circle" onclick="return confirm('Delete this album category?');">
                      <i class="fa fa-trash"></i>
                    </a>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>

        <!-- TAB 3: Video Tours -->
        <div class="tab-pane fade" id="videos-pane" role="tabpanel">
          <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
            <div>
              <h5 class="fw-bold text-dark mb-1">Campus Video Tours &amp; YouTube Embeds</h5>
              <p class="text-muted small mb-0">Manage convocation videos, university tour clips, and event highlights.</p>
            </div>
            <button class="btn btn-info text-white fw-bold rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#videoModal" onclick="resetVideoForm()">
              <i class="fa fa-plus-circle me-1"></i> Add Video Highlight
            </button>
          </div>

          <div class="table-responsive">
            <table class="table table-hover align-middle custom-table mb-0 border">
              <thead>
                <tr>
                  <th style="width: 120px;">Preview</th>
                  <th>Video Title &amp; Description</th>
                  <th>YouTube Embed URL</th>
                  <th>Status</th>
                  <th class="text-end" style="width: 140px;">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php if (empty($videos)): ?>
                  <tr>
                    <td colspan="5" class="text-center py-4 text-muted">No video highlights found.</td>
                  </tr>
                <?php else: ?>
                  <?php foreach ($videos as $v): 
                    $vJson = htmlspecialchars(json_encode($v), ENT_QUOTES, 'UTF-8');
                  ?>
                  <tr>
                    <td>
                      <div class="ratio ratio-16x9 rounded overflow-hidden shadow-sm" style="width: 110px;">
                        <iframe src="<?php echo htmlspecialchars($v['embed_url']); ?>" allowfullscreen loading="lazy"></iframe>
                      </div>
                    </td>
                    <td>
                      <div class="fw-bold text-dark"><?php echo htmlspecialchars($v['title']); ?></div>
                      <small class="text-muted d-block text-truncate" style="max-width: 320px;"><?php echo htmlspecialchars($v['description'] ?? ''); ?></small>
                    </td>
                    <td>
                      <code class="small text-break"><?php echo htmlspecialchars($v['embed_url']); ?></code>
                    </td>
                    <td>
                      <?php if (($v['status'] ?? 'Active') === 'Active'): ?>
                        <span class="badge bg-success-subtle text-success">Active</span>
                      <?php else: ?>
                        <span class="badge bg-secondary-subtle text-secondary">Inactive</span>
                      <?php endif; ?>
                    </td>
                    <td class="text-end">
                      <button class="btn btn-outline-primary btn-sm rounded-circle me-1" onclick="editVideo(<?php echo $vJson; ?>)">
                        <i class="fa fa-pencil"></i>
                      </button>
                      <a href="gallery.php?action=delete_video&id=<?php echo urlencode($v['id']); ?>" class="btn btn-outline-danger btn-sm rounded-circle" onclick="return confirm('Delete this video highlight?');">
                        <i class="fa fa-trash"></i>
                      </a>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>

        <!-- TAB 4: Page Meta & Headings -->
        <div class="tab-pane fade" id="pageinfo-pane" role="tabpanel">
          <div class="row justify-content-center">
            <div class="col-lg-11">
              <form action="gallery.php" method="POST" class="card border rounded-3 p-4 shadow-sm bg-light">
                <input type="hidden" name="action" value="save_page_info">

                <!-- Tab Navigation Header for Page Info -->
                <ul class="nav nav-pills mb-4 gap-2 border-bottom pb-3" id="galleryPageTabNav" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active fw-bold px-4 py-2" id="tab-gal-general" data-bs-toggle="pill" data-bs-target="#pane-gal-general" type="button" role="tab">
                      <i class="fa-solid fa-sliders me-2"></i>General Content &amp; Media
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link fw-bold px-4 py-2" id="tab-gal-seo" data-bs-toggle="pill" data-bs-target="#pane-gal-seo" type="button" role="tab" style="background: rgba(16,185,129,0.08); color: #047857; border: 1px solid rgba(16,185,129,0.3);">
                      <i class="fa-solid fa-magnifying-glass me-2"></i>SEO &amp; Meta Details <span class="badge bg-success ms-1">SEO</span>
                    </button>
                  </li>
                </ul>

                <div class="tab-content" id="galleryPageTabContent">
                  <!-- TAB 1: General Content & Media -->
                  <div class="tab-pane fade show active" id="pane-gal-general" role="tabpanel">
                    
                    <h5 class="fw-bold text-dark border-bottom pb-2 mb-3">
                      <i class="fa fa-heading me-2 text-primary"></i> Page Meta Titles &amp; Section Headings
                    </h5>

                    <div class="row g-3 mb-4">
                      <div class="col-md-6">
                        <label class="form-label fw-semibold small">Browser Page Title</label>
                        <input type="text" name="page_title" class="form-control" value="<?php echo htmlspecialchars($pageInfo['page_title'] ?? ''); ?>" required>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label fw-semibold small">Banner Top Title</label>
                        <input type="text" name="banner_title" class="form-control" value="<?php echo htmlspecialchars($pageInfo['banner_title'] ?? ''); ?>" required>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label fw-semibold small">Banner Category</label>
                        <input type="text" name="banner_category" class="form-control" value="<?php echo htmlspecialchars($pageInfo['banner_category'] ?? ''); ?>" required>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label fw-semibold small">Main Gallery Card Header Title</label>
                        <input type="text" name="heading" class="form-control" value="<?php echo htmlspecialchars($pageInfo['heading'] ?? ''); ?>" required>
                      </div>
                      <div class="col-12">
                        <label class="form-label fw-semibold small">Video Section Header</label>
                        <input type="text" name="video_heading" class="form-control" value="<?php echo htmlspecialchars($pageInfo['video_heading'] ?? ''); ?>" required>
                      </div>
                    </div>

                  </div><!-- end TAB 1 -->

                  <!-- TAB 2: SEO & Meta Details -->
                  <div class="tab-pane fade" id="pane-gal-seo" role="tabpanel">

                    <!-- Google SERP Live Snippet Preview Box -->
                    <div class="card mb-4 border-0 shadow-sm" style="background: #f8fafc; border: 1.5px solid #e2e8f0; border-radius: 14px;">
                      <div class="card-body p-4">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                          <h6 class="fw-bold text-dark mb-0"><i class="fa-brands fa-google text-danger me-2"></i>Google Search Result (SERP Live Preview)</h6>
                          <span class="badge bg-light text-secondary border px-3 py-1">Desktop &amp; Mobile SERP</span>
                        </div>

                        <div class="p-3 bg-white rounded border" style="max-width: 650px; font-family: arial, sans-serif;">
                          <div class="d-flex align-items-center gap-2 mb-1" style="font-size: 13px; color: #202124;">
                            <img src="../assets/images/logo/logo.jpg" alt="Google Favicon" width="18" height="18" class="rounded-circle border">
                            <div>
                              <span class="fw-semibold">Sri Satya Sai University</span>
                              <span class="text-muted ms-1" style="font-size: 12px;">https://sssutms.co.in › Gallery</span>
                            </div>
                          </div>
                          <h5 id="seoPreviewTitleGal" class="fw-normal mb-1 text-primary" style="color: #1a0dab !important; font-size: 20px; line-height: 1.3; cursor: pointer;">
                            <?php echo htmlspecialchars(!empty($pageInfo['meta_title']) ? $pageInfo['meta_title'] : ($pageInfo['page_title'] ?? 'Photo & Video Gallery - SSSUTMS')); ?>
                          </h5>
                          <p id="seoPreviewDescGal" class="mb-0 text-muted" style="color: #4d5156 !important; font-size: 14px; line-height: 1.58;">
                            <?php echo htmlspecialchars(!empty($pageInfo['meta_description']) ? $pageInfo['meta_description'] : 'Experience campus life, academic infrastructure, laboratories, hostel facilities, annual convocations, and cultural events at Sri Satya Sai University (SSSUTMS).'); ?>
                          </p>
                        </div>
                      </div>
                    </div>

                    <!-- SEO Form Fields -->
                    <div class="row g-3">
                      <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                          <label class="form-label small fw-bold mb-0">
                            <i class="fa-solid fa-heading text-primary me-1"></i> SEO Meta Title (Title Tag)
                          </label>
                          <small class="text-muted"><span id="metaTitleCountGal">0</span> / 60 chars <span class="badge bg-secondary ms-1">Recommended: 50-60</span></small>
                        </div>
                        <input type="text" name="meta_title" id="seoInputTitleGal" class="form-control" value="<?php echo htmlspecialchars($pageInfo['meta_title'] ?? ''); ?>" placeholder="e.g. Photo &amp; Video Gallery | Sri Satya Sai University (SSSUTMS)" oninput="updateSeoPreviewGal()">
                        <small class="text-muted">Displayed as the main clickable headline in Google search results and browser tab.</small>
                      </div>

                      <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                          <label class="form-label small fw-bold mb-0">
                            <i class="fa-solid fa-align-left text-success me-1"></i> SEO Meta Description
                          </label>
                          <small class="text-muted"><span id="metaDescCountGal">0</span> / 160 chars <span class="badge bg-secondary ms-1">Recommended: 150-160</span></small>
                        </div>
                        <textarea name="meta_description" id="seoInputDescGal" class="form-control" rows="3" placeholder="Provide a compelling 150-160 character description of this page for Google search snippets..." oninput="updateSeoPreviewGal()"><?php echo htmlspecialchars($pageInfo['meta_description'] ?? ''); ?></textarea>
                        <small class="text-muted">Google snippet description to entice visitors and media viewers to click.</small>
                      </div>

                      <div class="col-md-6">
                        <label class="form-label small fw-bold">
                          <i class="fa-solid fa-tags text-warning me-1"></i> Target SEO Keywords (Comma Separated)
                        </label>
                        <input type="text" name="meta_keywords" class="form-control" value="<?php echo htmlspecialchars($pageInfo['meta_keywords'] ?? ''); ?>" placeholder="e.g. SSSUTMS Gallery, Sri Satya Sai University Photos, Campus Tour Video">
                        <small class="text-muted">Target keywords for search engine discovery and category relevance.</small>
                      </div>

                      <div class="col-md-6">
                        <label class="form-label small fw-bold">
                          <i class="fa-solid fa-link text-info me-1"></i> Canonical URL Override (Optional)
                        </label>
                        <input type="text" name="canonical_url" class="form-control" value="<?php echo htmlspecialchars($pageInfo['canonical_url'] ?? ''); ?>" placeholder="Leave blank for automatic canonical URL">
                        <small class="text-muted">Preferred canonical page link for duplicate prevention.</small>
                      </div>

                      <div class="col-12">
                        <label class="form-label small fw-bold">
                          <i class="fa-solid fa-image text-danger me-1"></i> Social Sharing Preview Image (og:image)
                        </label>
                        <div class="input-group">
                          <span class="input-group-text bg-light"><i class="fa fa-share-nodes"></i></span>
                          <input type="text" name="og_image" class="form-control" value="<?php echo htmlspecialchars($pageInfo['og_image'] ?? 'assets/images/logo/logo.jpg'); ?>" placeholder="e.g. assets/images/logo/logo.jpg">
                        </div>
                        <small class="text-muted">Image shown when page link is shared on WhatsApp, Facebook, LinkedIn, Twitter.</small>
                      </div>
                    </div>

                  </div><!-- end TAB 2 -->
                </div>

                <!-- Sticky / Prominent Save Bar -->
                <div class="d-flex align-items-center justify-content-between pt-3 border-top mt-4 flex-wrap gap-2">
                  <div class="small text-muted">
                    <i class="fa fa-circle-check text-success me-1"></i> Changes will immediately update the live public website and search engine tags.
                  </div>
                  <button type="submit" class="btn btn-primary px-5 py-2 fw-bold shadow-sm">
                    <i class="fa fa-floppy-disk me-1"></i> Save Page Changes
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

</main>

<!-- Modal 1: Upload / Add Custom Photo -->
<div class="modal fade" id="photoModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow">
      <form action="gallery.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="action" value="save_photo">
        <input type="hidden" name="photo_id" id="p_id" value="">
        <input type="hidden" name="existing_url" id="p_existing_url" value="">

        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title fw-bold" id="photoModalLabel"><i class="fa fa-cloud-arrow-up me-2"></i> Upload New Photograph</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body p-4">
          <div class="row g-3">
            <div class="col-12">
              <label class="form-label fw-semibold small">Photo Title / Caption</label>
              <input type="text" name="title" id="p_title" class="form-control" placeholder="e.g. Modern Computer Science Lab">
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold small">Target Album / Category <span class="text-danger">*</span></label>
              <select name="category" id="p_category" class="form-select" required>
                <?php foreach ($categories as $k => $c): ?>
                  <option value="<?php echo htmlspecialchars($k); ?>"><?php echo htmlspecialchars($c['name']); ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold small">Badge Label (Optional)</label>
              <input type="text" name="badge" id="p_badge" class="form-control" placeholder="e.g. Infrastructure">
            </div>
            <div class="col-12">
              <label class="form-label fw-semibold small">Select Photo File <span class="text-danger">*</span></label>
              <input type="file" name="photo_file" class="form-control" accept=".jpg,.jpeg,.png,.webp,.gif">
              <small class="text-muted d-block mt-1">Recommended format: JPG, PNG, WEBP.</small>
            </div>
            <div class="col-12">
              <label class="form-label fw-semibold small">Status</label>
              <select name="status" id="p_status" class="form-select">
                <option value="Active">Active (Visible)</option>
                <option value="Inactive">Inactive (Hidden)</option>
              </select>
            </div>
          </div>
        </div>

        <div class="modal-footer bg-light">
          <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary rounded-pill px-4">
            <i class="fa fa-cloud-upload me-1"></i> Upload Photo
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal 2: Add / Edit Album Category -->
<div class="modal fade" id="categoryModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow">
      <form action="gallery.php" method="POST">
        <input type="hidden" name="action" value="save_category">

        <div class="modal-header bg-warning text-dark">
          <h5 class="modal-title fw-bold" id="catModalLabel"><i class="fa fa-folder-plus me-2"></i> Add Photo Album</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body p-4">
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label fw-semibold small">Album Identifier Key <span class="text-danger">*</span></label>
              <input type="text" name="category_key" id="cat_key" class="form-control" required placeholder="e.g. sports, cultural">
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold small">Album Display Name <span class="text-danger">*</span></label>
              <input type="text" name="name" id="cat_name" class="form-control" required placeholder="e.g. Sports & Athletics">
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold small">Overlay Badge Label</label>
              <input type="text" name="badge" id="cat_badge" class="form-control" placeholder="e.g. Sports Complex">
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold small">FontAwesome Icon</label>
              <input type="text" name="icon" id="cat_icon" class="form-control" value="fa-images">
            </div>
            <div class="col-12">
              <label class="form-label fw-semibold small">Asset Directory Path (Optional)</label>
              <input type="text" name="dir" id="cat_dir" class="form-control" placeholder="assets/images/gallery/...">
            </div>
            <div class="col-12">
              <label class="form-label fw-semibold small">Status</label>
              <select name="status" id="cat_status" class="form-select">
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
              </select>
            </div>
          </div>
        </div>

        <div class="modal-footer bg-light">
          <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-warning text-dark fw-bold rounded-pill px-4">
            <i class="fa fa-save me-1"></i> Save Album
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal 3: Add / Edit Video Highlight -->
<div class="modal fade" id="videoModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow">
      <form action="gallery.php" method="POST">
        <input type="hidden" name="action" value="save_video">
        <input type="hidden" name="video_id" id="v_id" value="">

        <div class="modal-header bg-info text-white">
          <h5 class="modal-title fw-bold" id="videoModalLabel"><i class="fa fa-film me-2"></i> Add Video Highlight</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body p-4">
          <div class="row g-3">
            <div class="col-12">
              <label class="form-label fw-semibold small">Video Title <span class="text-danger">*</span></label>
              <input type="text" name="title" id="v_title" class="form-control" required placeholder="e.g. University Convocation & Campus Tour">
            </div>
            <div class="col-12">
              <label class="form-label fw-semibold small">YouTube URL or Embed Link <span class="text-danger">*</span></label>
              <input type="text" name="embed_url" id="v_url" class="form-control" required placeholder="https://www.youtube.com/watch?v=... or embed URL">
            </div>
            <div class="col-12">
              <label class="form-label fw-semibold small">Description</label>
              <textarea name="description" id="v_desc" class="form-control" rows="2" placeholder="Brief summary of what this video showcases..."></textarea>
            </div>
            <div class="col-12">
              <label class="form-label fw-semibold small">Status</label>
              <select name="status" id="v_status" class="form-select">
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
              </select>
            </div>
          </div>
        </div>

        <div class="modal-footer bg-light">
          <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-info text-white fw-bold rounded-pill px-4">
            <i class="fa fa-save me-1"></i> Save Video
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Sidebar Toggle
const toggleBtn = document.querySelector('.admin-sidebar-toggle');
const closeBtn = document.querySelector('.sidebar-close-btn');
const sidebar = document.querySelector('.admin-sidebar');
if (toggleBtn && sidebar) {
  toggleBtn.addEventListener('click', () => sidebar.classList.add('show'));
}
if (closeBtn && sidebar) {
  closeBtn.addEventListener('click', () => sidebar.classList.remove('show'));
}

// Reset Photo Form
function resetPhotoForm() {
  document.getElementById('photoModalLabel').innerHTML = '<i class="fa fa-cloud-arrow-up me-2"></i> Upload New Photograph';
  document.getElementById('p_id').value = '';
  document.getElementById('p_existing_url').value = '';
  document.getElementById('p_title').value = '';
  document.getElementById('p_badge').value = '';
  document.getElementById('p_status').value = 'Active';
}

// Reset Category Form
function resetCatForm() {
  document.getElementById('catModalLabel').innerHTML = '<i class="fa fa-folder-plus me-2"></i> Add Photo Album';
  document.getElementById('cat_key').value = '';
  document.getElementById('cat_key').readOnly = false;
  document.getElementById('cat_name').value = '';
  document.getElementById('cat_badge').value = '';
  document.getElementById('cat_icon').value = 'fa-images';
  document.getElementById('cat_dir').value = '';
  document.getElementById('cat_status').value = 'Active';
}

// Edit Category Form
function editCategory(c) {
  document.getElementById('catModalLabel').innerHTML = '<i class="fa fa-pencil me-2"></i> Edit Photo Album';
  document.getElementById('cat_key').value = c.key || '';
  document.getElementById('cat_key').readOnly = true;
  document.getElementById('cat_name').value = c.name || '';
  document.getElementById('cat_badge').value = c.badge || '';
  document.getElementById('cat_icon').value = c.icon || 'fa-images';
  document.getElementById('cat_dir').value = c.dir || '';
  document.getElementById('cat_status').value = c.status || 'Active';

  const modal = new bootstrap.Modal(document.getElementById('categoryModal'));
  modal.show();
}

// Reset Video Form
function resetVideoForm() {
  document.getElementById('videoModalLabel').innerHTML = '<i class="fa fa-film me-2"></i> Add Video Highlight';
  document.getElementById('v_id').value = '';
  document.getElementById('v_title').value = '';
  document.getElementById('v_url').value = '';
  document.getElementById('v_desc').value = '';
  document.getElementById('v_status').value = 'Active';
}

// Edit Video Form
function editVideo(v) {
  document.getElementById('videoModalLabel').innerHTML = '<i class="fa fa-pencil me-2"></i> Edit Video Highlight';
  document.getElementById('v_id').value = v.id || '';
  document.getElementById('v_title').value = v.title || '';
  document.getElementById('v_url').value = v.embed_url || '';
  document.getElementById('v_desc').value = v.description || '';
  document.getElementById('v_status').value = v.status || 'Active';

  const modal = new bootstrap.Modal(document.getElementById('videoModal'));
  modal.show();
}

// SEO Live Preview & Counter for Gallery Page
function updateSeoPreviewGal() {
  const titleInput = document.getElementById('seoInputTitleGal');
  const descInput = document.getElementById('seoInputDescGal');
  const previewTitle = document.getElementById('seoPreviewTitleGal');
  const previewDesc = document.getElementById('seoPreviewDescGal');
  const titleCount = document.getElementById('metaTitleCountGal');
  const descCount = document.getElementById('metaDescCountGal');

  if (titleInput && previewTitle) {
    const val = titleInput.value.trim();
    previewTitle.textContent = val ? val : 'Photo & Video Gallery | Sri Satya Sai University (SSSUTMS)';
    if (titleCount) {
      titleCount.textContent = titleInput.value.length;
      titleCount.className = (titleInput.value.length > 60) ? 'text-danger fw-bold' : 'text-success fw-bold';
    }
  }

  if (descInput && previewDesc) {
    const val = descInput.value.trim();
    previewDesc.textContent = val ? val : 'Experience campus life, academic infrastructure, laboratories, hostel facilities, annual convocations, and cultural events at Sri Satya Sai University (SSSUTMS).';
    if (descCount) {
      descCount.textContent = descInput.value.length;
      descCount.className = (descInput.value.length > 160) ? 'text-danger fw-bold' : 'text-success fw-bold';
    }
  }
}

document.addEventListener('DOMContentLoaded', function() {
  updateSeoPreviewGal();
});
</script>

</body>
</html>
