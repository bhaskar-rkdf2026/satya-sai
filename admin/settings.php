<?php
require_once __DIR__ . '/../config.php';
require_admin_auth();

$settings = get_json_data('settings.json', [
    'site_name' => SITE_NAME,
    'site_short_name' => SITE_SHORT_NAME,
    'site_tagline' => SITE_TAGLINE,
    'campus_address' => CAMPUS_ADDRESS,
    'admission_helpline' => ADMISSION_HELPLINE,
    'official_email' => OFFICIAL_EMAIL,
    'exam_email' => EXAM_EMAIL,
    'marquee_ticker' => 'Welcome to Sri Satya Sai University of Technology and Medical Sciences — the Premier University in Madhya Pradesh. • Online Admissions Open for Session 2026-27 (UG / PG / Ph.D.)',
    'admission_session' => '2026-27',
    'facebook_url' => 'https://www.facebook.com/sehoresssutms',
    'youtube_url' => 'https://www.youtube.com/@srisatyasaiuniversityoftec815',
    'instagram_url' => 'https://www.instagram.com/srisatyasai_universitysehore/',
    'phone_numbers' => "(+91) 07562-292740\n(+91) 07562-292720\n(+91) 07562-292204\n(+91) 07562-292205\n(+91) 7748900028",
    'admin_user' => 'admin',
    'admin_password' => 'admin123'
]);

$msg = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'save_settings') {
        $settings['site_name'] = clean_input($_POST['site_name'] ?? $settings['site_name']);
        $settings['site_short_name'] = clean_input($_POST['site_short_name'] ?? $settings['site_short_name']);
        $settings['site_tagline'] = clean_input($_POST['site_tagline'] ?? $settings['site_tagline']);
        $settings['campus_address'] = clean_input($_POST['campus_address'] ?? $settings['campus_address']);
        $settings['admission_helpline'] = clean_input($_POST['admission_helpline'] ?? $settings['admission_helpline']);
        $settings['official_email'] = clean_input($_POST['official_email'] ?? $settings['official_email']);
        $settings['exam_email'] = clean_input($_POST['exam_email'] ?? $settings['exam_email']);
        $settings['phone_numbers'] = trim($_POST['phone_numbers'] ?? $settings['phone_numbers']);
        $settings['marquee_ticker'] = clean_input($_POST['marquee_ticker'] ?? $settings['marquee_ticker']);
        $settings['admission_session'] = clean_input($_POST['admission_session'] ?? $settings['admission_session']);
        $settings['facebook_url'] = clean_input($_POST['facebook_url'] ?? $settings['facebook_url']);
        $settings['youtube_url'] = clean_input($_POST['youtube_url'] ?? $settings['youtube_url']);
        $settings['instagram_url'] = clean_input($_POST['instagram_url'] ?? $settings['instagram_url']);

        save_json_data('settings.json', $settings);
        $msg = 'Portal configuration and contact settings saved successfully! Live reflection is now active on the public site.';
    }

    if ($action === 'change_password') {
        $currPass = trim($_POST['current_password'] ?? '');
        $newPass = trim($_POST['new_password'] ?? '');
        $confPass = trim($_POST['confirm_password'] ?? '');
        $newAdminUser = clean_input($_POST['admin_username'] ?? $settings['admin_user']);

        $actualPass = $settings['admin_password'] ?? 'admin123';

        if ($currPass !== $actualPass) {
            $error = 'Incorrect current admin password. Please try again.';
        } elseif (empty($newPass)) {
            $error = 'New password cannot be blank.';
        } elseif ($newPass !== $confPass) {
            $error = 'New password and confirm password do not match.';
        } else {
            $settings['admin_user'] = $newAdminUser;
            $settings['admin_password'] = $newPass;
            save_json_data('settings.json', $settings);
            $msg = 'Admin credentials updated successfully!';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portal Settings - SSSUTMS Admin</title>
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
    <li><a href="pages.php" class="nav-link"><i class="fa fa-file-lines"></i> Dynamic CMS Pages</a></li>
    <li><a href="applications.php" class="nav-link"><i class="fa fa-user-graduate"></i> Student Registrations</a></li>
    <li><a href="inquiries.php" class="nav-link"><i class="fa fa-envelope-open-text"></i> Admission Leads</a></li>
    <li><a href="settings.php" class="nav-link active"><i class="fa fa-sliders"></i> Portal Settings</a></li>
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
        <h5 class="fw-bold text-dark mb-0">University Portal Settings & System Configuration</h5>
        <small class="text-muted d-none d-md-inline">Changes here update the live public site contact details, header ticker, and security credentials</small>
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

  <div class="row g-4">
    
    <!-- Main Settings Form (8 cols) -->
    <div class="col-lg-8">
      <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white mb-4">
        
        <form method="POST" action="settings.php">
          <input type="hidden" name="action" value="save_settings">

          <!-- Section 1: Live Marquee & Announcements -->
          <h5 class="fw-bold text-primary mb-3"><i class="fa fa-bullhorn text-warning me-2"></i> 1. Live Marquee Ticker & Academic Session</h5>
          <div class="mb-3">
            <label class="form-label small fw-bold">Live Emergency / Promo Marquee Announcement Ticker</label>
            <textarea name="marquee_ticker" rows="2" class="form-control" placeholder="Announcement text displayed in public topbar marquee"><?php echo htmlspecialchars($settings['marquee_ticker'] ?? ''); ?></textarea>
            <small class="text-muted">Displays in the live scrolling bar under the topbar on all public pages.</small>
          </div>

          <div class="row g-3 mb-4">
            <div class="col-md-6">
              <label class="form-label small fw-bold">Current Academic Admission Session</label>
              <input type="text" name="admission_session" class="form-control" value="<?php echo htmlspecialchars($settings['admission_session'] ?? '2026-27'); ?>">
            </div>
            <div class="col-md-6">
              <label class="form-label small fw-bold">University Short Name</label>
              <input type="text" name="site_short_name" class="form-control" value="<?php echo htmlspecialchars($settings['site_short_name'] ?? 'SSSUTMS, Sehore'); ?>">
            </div>
          </div>

          <hr class="my-4">

          <!-- Section 2: Contact Channels & Addresses -->
          <h5 class="fw-bold text-primary mb-3"><i class="fa fa-address-book text-warning me-2"></i> 2. University Contact Channels & Helpline</h5>
          
          <div class="row g-3 mb-3">
            <div class="col-md-6">
              <label class="form-label small fw-bold">Admission Helpline / WhatsApp Number</label>
              <div class="input-group">
                <span class="input-group-text bg-light"><i class="fa-brands fa-whatsapp text-success"></i></span>
                <input type="text" name="admission_helpline" class="form-control" value="<?php echo htmlspecialchars($settings['admission_helpline'] ?? '+91-7748900028'); ?>">
              </div>
            </div>
            <div class="col-md-6">
              <label class="form-label small fw-bold">Official Email Address</label>
              <div class="input-group">
                <span class="input-group-text bg-light"><i class="fa fa-envelope text-primary"></i></span>
                <input type="email" name="official_email" class="form-control" value="<?php echo htmlspecialchars($settings['official_email'] ?? 'info@sssutms.co.in'); ?>">
              </div>
            </div>
          </div>

          <div class="row g-3 mb-3">
            <div class="col-md-6">
              <label class="form-label small fw-bold">Examination Email Address</label>
              <div class="input-group">
                <span class="input-group-text bg-light"><i class="fa fa-graduation-cap text-warning"></i></span>
                <input type="email" name="exam_email" class="form-control" value="<?php echo htmlspecialchars($settings['exam_email'] ?? 'exam@sssutms.co.in'); ?>">
              </div>
            </div>
            <div class="col-md-6">
              <label class="form-label small fw-bold">Campus Full Address</label>
              <input type="text" name="campus_address" class="form-control" value="<?php echo htmlspecialchars($settings['campus_address'] ?? ''); ?>">
            </div>
          </div>

          <div class="mb-4">
            <label class="form-label small fw-bold">University Landline / Phone Numbers (Multi-line)</label>
            <textarea name="phone_numbers" rows="3" class="form-control"><?php echo htmlspecialchars($settings['phone_numbers'] ?? ''); ?></textarea>
            <small class="text-muted">Displayed in the public site footer contact section.</small>
          </div>

          <hr class="my-4">

          <!-- Section 3: Social Links -->
          <h5 class="fw-bold text-primary mb-3"><i class="fa fa-share-nodes text-warning me-2"></i> 3. Official Social Media Channels</h5>
          
          <div class="row g-3 mb-4">
            <div class="col-md-4">
              <label class="form-label small fw-bold">Facebook URL</label>
              <input type="url" name="facebook_url" class="form-control" value="<?php echo htmlspecialchars($settings['facebook_url'] ?? ''); ?>">
            </div>
            <div class="col-md-4">
              <label class="form-label small fw-bold">YouTube URL</label>
              <input type="url" name="youtube_url" class="form-control" value="<?php echo htmlspecialchars($settings['youtube_url'] ?? ''); ?>">
            </div>
            <div class="col-md-4">
              <label class="form-label small fw-bold">Instagram URL</label>
              <input type="url" name="instagram_url" class="form-control" value="<?php echo htmlspecialchars($settings['instagram_url'] ?? ''); ?>">
            </div>
          </div>

          <button type="submit" class="btn btn-primary rounded-pill px-5 fw-bold shadow-sm">
            <i class="fa fa-floppy-disk me-1"></i> Save All Portal Settings
          </button>
        </form>

      </div>
    </div>

    <!-- Security & Password Box (4 cols) -->
    <div class="col-lg-4">
      <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-4">
        <h5 class="fw-bold text-dark mb-3"><i class="fa fa-shield-halved text-success me-2"></i> Admin Security</h5>
        <p class="small text-muted mb-3">Update administrative credentials used to access this console.</p>

        <form method="POST" action="settings.php">
          <input type="hidden" name="action" value="change_password">

          <div class="mb-3">
            <label class="form-label small fw-bold">Admin Username</label>
            <input type="text" name="admin_username" class="form-control" value="<?php echo htmlspecialchars($settings['admin_user'] ?? 'admin'); ?>" required>
          </div>

          <div class="mb-3">
            <label class="form-label small fw-bold">Current Password *</label>
            <input type="password" name="current_password" class="form-control" placeholder="••••••••" required>
          </div>

          <div class="mb-3">
            <label class="form-label small fw-bold">New Password *</label>
            <input type="password" name="new_password" class="form-control" placeholder="••••••••" required>
          </div>

          <div class="mb-4">
            <label class="form-label small fw-bold">Confirm New Password *</label>
            <input type="password" name="confirm_password" class="form-control" placeholder="••••••••" required>
          </div>

          <button type="submit" class="btn btn-dark w-100 rounded-pill fw-bold">
            <i class="fa fa-key me-1"></i> Update Admin Password
          </button>
        </form>
      </div>

      <!-- Quick Info Card -->
      <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
        <h6 class="fw-bold text-primary mb-2"><i class="fa fa-circle-info text-primary me-2"></i> Real-time Sync Information</h6>
        <p class="small text-muted mb-2">Every setting saved here immediately reflects across all public website pages without requiring any server reload or build step.</p>
        <ul class="small text-secondary ps-3 mb-0">
          <li>Settings storage: <code>data/settings.json</code></li>
          <li>Default fallback enabled</li>
          <li>Zero CSS / HTML layout disruption</li>
        </ul>
      </div>
    </div>

  </div>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/admin.js"></script>
</body>
</html>
