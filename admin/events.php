<?php
require_once __DIR__ . '/../config.php';
require_admin_auth();

$events = get_events();
$msg = '';
$error = '';

// Handle Delete
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $delId = (int)$_GET['id'];
    $events = array_filter($events, function($e) use ($delId) {
        return ($e['id'] ?? 0) !== $delId;
    });
    save_json_data('events.json', array_values($events));
    $msg = 'Event removed successfully.';
}

// Handle Add / Edit Event
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $eventId = !empty($_POST['event_id']) ? (int)$_POST['event_id'] : time();
    $title = clean_input($_POST['title'] ?? '');
    $category = clean_input($_POST['category'] ?? 'Workshop');
    $date = clean_input($_POST['date'] ?? date('Y-m-d'));
    $desc = clean_input($_POST['description'] ?? '');
    $loc = clean_input($_POST['location'] ?? 'SSSUTMS Campus');
    $image = clean_input($_POST['existing_image'] ?? 'assets/images/events/scienceday.jpg');

    // Handle Image Upload
    if (isset($_FILES['event_image']) && $_FILES['event_image']['error'] === UPLOAD_ERR_OK) {
        $tmpName = $_FILES['event_image']['tmp_name'];
        $origName = preg_replace('/[^a-zA-Z0-9_\.-]/', '_', $_FILES['event_image']['name']);
        $ext = strtolower(pathinfo($origName, PATHINFO_EXTENSION));
        
        $allowed = ['jpg', 'jpeg', 'png', 'webp'];
        if (in_array($ext, $allowed)) {
            $newName = 'event_' . time() . '_' . $origName;
            $dest = UPLOAD_DIR . '/events/' . $newName;
            if (move_uploaded_file($tmpName, $dest)) {
                $image = 'assets/uploads/events/' . $newName;
            } else {
                $error = 'Failed to upload event photo to server.';
            }
        } else {
            $error = 'Invalid image format. Allowed: JPG, JPEG, PNG, WEBP.';
        }
    }

    if (empty($error)) {
        if (!empty($title)) {
            $updated = false;
            foreach ($events as &$e) {
                if (($e['id'] ?? 0) === $eventId) {
                    $e['title'] = $title;
                    $e['category'] = $category;
                    $e['date'] = $date;
                    $e['description'] = $desc;
                    $e['location'] = $loc;
                    $e['image'] = $image;
                    $updated = true;
                    break;
                }
            }

            if (!$updated) {
                $newEvent = [
                    'id' => $eventId,
                    'title' => $title,
                    'category' => $category,
                    'date' => $date,
                    'description' => $desc,
                    'location' => $loc,
                    'image' => $image
                ];
                array_unshift($events, $newEvent);
                $msg = 'New event created & published successfully!';
            } else {
                $msg = 'Event details updated successfully!';
            }

            save_json_data('events.json', $events);
        } else {
            $error = 'Event title is mandatory.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Events & Workshops - SSSUTMS Admin</title>
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
    <li><a href="events.php" class="nav-link active"><i class="fa fa-calendar-days"></i> Events & Workshops</a></li>
    <li><a href="schemes.php" class="nav-link"><i class="fa fa-book-open"></i> Curriculum Schemes</a></li>
    <li><a href="pages.php" class="nav-link"><i class="fa fa-file-lines"></i> Dynamic CMS Pages</a></li>
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
        <h5 class="fw-bold text-dark mb-0">University Events, Seminars & Workshops</h5>
        <small class="text-muted d-none d-md-inline">Live synchronization with Homepage 'News, Events & Campus Stories' and EVENTS page</small>
      </div>
    </div>
    <div>
      <button class="btn btn-primary fw-bold rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#eventModal" onclick="resetEventForm()">
        <i class="fa fa-plus me-1"></i> Add New Event
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
        <h5 class="fw-bold text-dark mb-0">Upcoming & Past Events (<?php echo count($events); ?>)</h5>
        <span class="badge bg-success-subtle text-success fw-bold">Active Public Grid</span>
      </div>
      <div class="d-flex gap-2">
        <input type="text" id="eventSearch" class="form-control form-control-sm" placeholder="Search events..." style="width: 260px;">
      </div>
    </div>

    <div class="row g-4" id="eventsGrid">
      <?php if (empty($events)): ?>
        <div class="col-12 text-center py-5 text-muted">No events currently scheduled. Click "Add New Event" above to create one.</div>
      <?php else: ?>
        <?php foreach ($events as $ev): 
          $img = $ev['image'] ?? 'assets/images/events/scienceday.jpg';
          $imgUrl = (strpos($img, 'http') === 0) ? $img : BASE_URL . $img;
        ?>
          <div class="col-md-6 col-xl-4 event-card-item" data-title="<?php echo strtolower(htmlspecialchars($ev['title'] ?? '')); ?>" data-cat="<?php echo strtolower(htmlspecialchars($ev['category'] ?? '')); ?>">
            <div class="card h-100 border rounded-4 overflow-hidden shadow-sm">
              <div style="height: 180px; overflow: hidden; position: relative; background: #e2e8f0;">
                <img src="<?php echo htmlspecialchars($imgUrl); ?>" alt="<?php echo htmlspecialchars($ev['title'] ?? ''); ?>" style="width: 100%; height: 100%; object-fit: cover;" onerror="this.src='<?php echo BASE_URL; ?>assets/images/slider/HorizonsofAyurved.jpg'">
                <span class="badge bg-primary text-white position-absolute top-0 start-0 m-3 fw-bold">
                  <?php echo htmlspecialchars($ev['category'] ?? 'Event'); ?>
                </span>
              </div>
              <div class="card-body p-4 d-flex flex-column justify-content-between">
                <div>
                  <div class="text-muted small mb-1">
                    <i class="fa fa-calendar-day me-1 text-warning"></i> <?php echo date('d M Y', strtotime($ev['date'] ?? 'now')); ?>
                    <span class="mx-2">&bull;</span>
                    <i class="fa fa-location-dot me-1 text-danger"></i> <?php echo htmlspecialchars($ev['location'] ?? 'Campus'); ?>
                  </div>
                  <h6 class="fw-bold text-dark mb-2"><?php echo htmlspecialchars($ev['title'] ?? ''); ?></h6>
                  <p class="text-secondary small mb-3" style="line-height: 1.6;">
                    <?php echo htmlspecialchars(mb_strimwidth($ev['description'] ?? '', 0, 110, '...')); ?>
                  </p>
                </div>
                <div class="d-flex justify-content-between align-items-center pt-2 border-top">
                  <button class="btn btn-sm btn-outline-primary rounded-pill px-3" 
                    onclick='editEvent(<?php echo json_encode($ev); ?>)'>
                    <i class="fa fa-pen-to-square me-1"></i> Edit
                  </button>
                  <a href="events.php?action=delete&id=<?php echo $ev['id'] ?? 0; ?>" 
                     class="btn btn-sm btn-outline-danger rounded-pill px-3"
                     onclick="return confirm('Delete this event?');">
                    <i class="fa fa-trash-can me-1"></i> Delete
                  </a>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>

</main>

<!-- Event Add/Edit Modal -->
<div class="modal fade" id="eventModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content border-0 shadow-lg rounded-4">
      <div class="modal-header border-0 pb-0">
        <h5 class="modal-title fw-bold text-dark" id="modalTitle">Publish Campus Event</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form method="POST" action="events.php" enctype="multipart/form-data">
        <div class="modal-body p-4">
          <input type="hidden" name="action" value="add_event">
          <input type="hidden" name="event_id" id="formEventId" value="">
          <input type="hidden" name="existing_image" id="formExistingImage" value="">

          <div class="mb-3">
            <label class="form-label small fw-bold">Event Title *</label>
            <input type="text" name="title" id="formTitle" class="form-control" placeholder="e.g. National Symposium on AI in Healthcare" required>
          </div>

          <div class="row g-3 mb-3">
            <div class="col-md-6">
              <label class="form-label small fw-bold">Category Badge</label>
              <select name="category" id="formCategory" class="form-select" required>
                <option value="Workshop">Workshop</option>
                <option value="Symposium">Symposium</option>
                <option value="FDP">FDP</option>
                <option value="Placement">Placement Drive</option>
                <option value="Conference">Conference</option>
                <option value="Sports">Sports</option>
                <option value="Cultural">Cultural</option>
                <option value="General">General</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label small fw-bold">Event Date</label>
              <input type="date" name="date" id="formDate" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label small fw-bold">Location / Venue</label>
            <input type="text" name="location" id="formLocation" class="form-control" placeholder="e.g. University Central Auditorium" value="SSSUTMS Campus">
          </div>

          <div class="mb-3">
            <label class="form-label small fw-bold">Description / Details</label>
            <textarea name="description" id="formDescription" class="form-control" rows="3" placeholder="Summary of the event, key speakers, participant guidelines..."></textarea>
          </div>

          <div class="mb-3">
            <label class="form-label small fw-bold">Upload Event Banner / Photograph</label>
            <input type="file" name="event_image" class="form-control" accept="image/*">
            <small class="text-muted">High resolution JPG/PNG recommended. Leave empty to retain current banner.</small>
          </div>
        </div>
        <div class="modal-footer border-0 pt-0">
          <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary rounded-pill px-4 fw-bold">Save & Publish Event</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/admin.js"></script>
<script>
function resetEventForm() {
  document.getElementById('modalTitle').textContent = 'Publish Campus Event';
  document.getElementById('formEventId').value = '';
  document.getElementById('formExistingImage').value = 'assets/images/events/scienceday.jpg';
  document.getElementById('formTitle').value = '';
  document.getElementById('formCategory').value = 'Workshop';
  document.getElementById('formDate').value = '<?php echo date('Y-m-d'); ?>';
  document.getElementById('formLocation').value = 'SSSUTMS Campus';
  document.getElementById('formDescription').value = '';
}

function editEvent(ev) {
  document.getElementById('modalTitle').textContent = 'Edit Event Details';
  document.getElementById('formEventId').value = ev.id || '';
  document.getElementById('formExistingImage').value = ev.image || '';
  document.getElementById('formTitle').value = ev.title || '';
  document.getElementById('formCategory').value = ev.category || 'Workshop';
  document.getElementById('formDate').value = ev.date || '<?php echo date('Y-m-d'); ?>';
  document.getElementById('formLocation').value = ev.location || 'SSSUTMS Campus';
  document.getElementById('formDescription').value = ev.description || '';
  
  const modal = new bootstrap.Modal(document.getElementById('eventModal'));
  modal.show();
}

// Instant Filter
document.addEventListener('DOMContentLoaded', function() {
  const search = document.getElementById('eventSearch');
  const cards = document.querySelectorAll('.event-card-item');

  if (search) {
    search.addEventListener('input', function() {
      const q = (search.value || '').toLowerCase().trim();
      cards.forEach(c => {
        const title = c.getAttribute('data-title') || '';
        const cat = c.getAttribute('data-cat') || '';
        if (!q || title.includes(q) || cat.includes(q)) {
          c.style.display = '';
        } else {
          c.style.display = 'none';
        }
      });
    });
  }
});
</script>

</body>
</html>
