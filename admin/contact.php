<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/contact_helper.php';
require_admin_auth();

$msg = '';
$error = '';

// Handle Save Page Info & Map
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'save_page_info') {
    $infoData = [
        'page_title'        => clean_input($_POST['page_title'] ?? 'Contact Us - SSSUTMS'),
        'banner_title'      => clean_input($_POST['banner_title'] ?? 'Contact Us'),
        'banner_category'   => clean_input($_POST['banner_category'] ?? 'Contact'),
        'heading'           => clean_input($_POST['heading'] ?? 'Get In Touch with SSSUTMS'),
        'directory_heading' => clean_input($_POST['directory_heading'] ?? 'University Authorities & Key Officers Directory'),
        'form_heading'      => clean_input($_POST['form_heading'] ?? 'Send Us an Inquiry / Feedback Message'),
        'map_heading'       => clean_input($_POST['map_heading'] ?? 'Campus Location on Map'),
        'map_embed_url'     => trim($_POST['map_embed_url'] ?? ''),
        'meta_title'       => clean_input($_POST['meta_title'] ?? ''),
        'meta_description' => clean_input($_POST['meta_description'] ?? ''),
        'meta_keywords'    => clean_input($_POST['meta_keywords'] ?? ''),
        'canonical_url'    => clean_input($_POST['canonical_url'] ?? ''),
        'og_image'         => clean_input($_POST['og_image'] ?? 'assets/images/logo/logo.jpg')
    ];
    if (save_contact_page_info($infoData)) {
        $msg = 'Page titles, headings, SEO meta tags & Interactive Map updated successfully!';
    } else {
        $error = 'Failed to update page information.';
    }
}

// Handle Save Info Cards
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'save_info_cards') {
    $cardsData = [
        'location' => [
            'title'           => clean_input($_POST['loc_title'] ?? 'Campus Location'),
            'icon'            => clean_input($_POST['loc_icon'] ?? 'fa-location-dot'),
            'university_name' => clean_input($_POST['loc_uni'] ?? 'Sri Satya Sai University of Technology & Medical Sciences (SSSUTMS)'),
            'address'         => trim($_POST['loc_address'] ?? 'Opp. Oilfed Plant, Bhopal-Indore Road, Sehore (M.P.) – 466001')
        ],
        'email_portal' => [
            'title'           => clean_input($_POST['email_title'] ?? 'Email & Portal'),
            'icon'            => clean_input($_POST['email_icon'] ?? 'fa-envelope-open-text'),
            'general_email'   => clean_input($_POST['email_gen'] ?? 'info@sssutms.co.in'),
            'registrar_email' => clean_input($_POST['email_reg'] ?? 'registrar@sssutms.co.in'),
            'websites'        => clean_input($_POST['websites'] ?? 'www.sssutms.co.in | www.sssutms.ac.in')
        ],
        'helpdesk' => [
            'title'         => clean_input($_POST['help_title'] ?? 'University Helpdesk'),
            'icon'          => clean_input($_POST['help_icon'] ?? 'fa-phone-volume'),
            'telephone'     => clean_input($_POST['help_tel'] ?? '+91-7562-292740'),
            'board_numbers' => clean_input($_POST['help_board'] ?? '07562-292203, 07562-292204, 07562-292205'),
            'fax'           => clean_input($_POST['help_fax'] ?? '+91-07562-292201')
        ],
        'admission' => [
            'title'              => clean_input($_POST['adm_title'] ?? 'Admission Helplines'),
            'icon'               => clean_input($_POST['adm_icon'] ?? 'fa-headset'),
            'toll_free'          => clean_input($_POST['adm_toll'] ?? '+91-7748900028'),
            'toll_free_tel'      => clean_input($_POST['adm_toll_tel'] ?? '+917748900028'),
            'admission_cell'     => clean_input($_POST['adm_cell'] ?? '+91-7562-292740'),
            'admission_cell_tel' => clean_input($_POST['adm_cell_tel'] ?? '+917562292740'),
            'timings'            => clean_input($_POST['adm_timings'] ?? 'Mon – Sat: 9:00 AM to 5:30 PM')
        ]
    ];

    if (save_contact_info_cards($cardsData)) {
        $msg = 'Primary Contact Info Cards updated successfully!';
    } else {
        $error = 'Failed to update contact cards.';
    }
}

// Handle Add / Edit Officer
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'save_officer') {
    $offId = !empty($_POST['officer_id']) ? clean_input($_POST['officer_id']) : ('off_' . date('Ymd_His'));
    $sno = clean_input($_POST['sno'] ?? '');
    $name = clean_input($_POST['name'] ?? '');
    $designation = clean_input($_POST['designation'] ?? '');
    $phone = clean_input($_POST['phone'] ?? '');
    $actionLabel = clean_input($_POST['action_label'] ?? 'Call Office');
    $actionIcon = clean_input($_POST['action_icon'] ?? 'fa-phone');
    $status = clean_input($_POST['status'] ?? 'Active');

    if (!empty($name) && !empty($phone)) {
        $officer = [
            'id'           => $offId,
            'sno'          => $sno,
            'name'         => $name,
            'designation'  => $designation,
            'phone'        => $phone,
            'action_label' => $actionLabel,
            'action_icon'  => $actionIcon,
            'status'       => $status
        ];
        save_contact_officer($officer);
        $msg = 'Key Officer entry saved successfully!';
    } else {
        $error = 'Officer Name and Telephone Number are required.';
    }
}

// Handle Delete Officer
if (isset($_GET['action']) && $_GET['action'] === 'delete_officer' && isset($_GET['id'])) {
    $delId = clean_input($_GET['id']);
    delete_contact_officer($delId);
    $msg = 'Officer entry removed successfully.';
}

$pageInfo = get_contact_page_info();
$cards = get_contact_info_cards();
$officers = get_contact_officers();
$inquirySettings = get_contact_inquiry_settings();

$loc = $cards['location'] ?? [];
$emailPortal = $cards['email_portal'] ?? [];
$helpdesk = $cards['helpdesk'] ?? [];
$adm = $cards['admission'] ?? [];

$totalOfficers = count($officers);
$activeOfficers = count(array_filter($officers, function($o) { return ($o['status'] ?? 'Active') === 'Active'; }));

// Load recent inquiries if available
$recentInquiries = get_json_data('inquiries.json', []);
$contactInquiries = array_filter($recentInquiries, function($i) {
    return ($i['type'] ?? '') === 'contact_inquiry' || ($i['source'] ?? '') === 'contact';
});
$totalContactInquiries = count($contactInquiries);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Contact Us &amp; Helpdesk - SSSUTMS Admin</title>
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
    .contact-card-preview {
      background: #f8fafc;
      border: 1px solid #e2e8f0;
      border-radius: 10px;
      padding: 1.25rem;
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
    <li><a href="contact.php" class="nav-link active"><i class="fa fa-phone-volume"></i> Contact &amp; Helpdesk</a></li>
    <li><a href="itep.php" class="nav-link"><i class="fa fa-graduation-cap"></i> ITEP Cell</a></li>
    <li><a href="gallery.php" class="nav-link"><i class="fa fa-camera-retro"></i> Photo &amp; Video Gallery</a></li>
    <li><a href="downloads.php" class="nav-link"><i class="fa fa-folder-arrow-down"></i> Curriculum &amp; Downloads (52)</a></li>
    <li><a href="applications.php" class="nav-link"><i class="fa fa-user-graduate"></i> Student Registrations</a></li>
    <li><a href="inquiries.php" class="nav-link"><i class="fa fa-envelope-open-text"></i> Admission Leads</a></li>
    <li><a href="settings.php" class="nav-link"><i class="fa fa-sliders"></i> Portal Settings</a></li>
    <li class="mt-4 pt-3 border-top border-white border-opacity-10">
      <a href="../contact.php" target="_blank" class="nav-link text-white-50"><i class="fa fa-arrow-up-right-from-square"></i> View Live Contact Page</a>
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
        <h5 class="fw-bold text-dark mb-0">Contact &amp; University Helpdesk Management</h5>
        <small class="text-muted">Dynamic Management for Key Officers Directory, Helpdesk Numbers, Addresses &amp; Interactive Map</small>
      </div>
    </div>
    <div class="d-flex align-items-center gap-2">
      <a href="../contact.php" target="_blank" class="btn btn-outline-primary btn-sm rounded-pill px-3">
        <i class="fa fa-external-link me-1"></i> Live Contact View
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
            <span class="text-muted small fw-semibold">Key Officers Listed</span>
            <h3 class="fw-bold text-dark mb-0 mt-1"><?php echo $totalOfficers; ?></h3>
            <span class="small text-muted">Active in directory</span>
          </div>
          <div class="p-3 bg-primary-subtle text-primary rounded-3">
            <i class="fa fa-address-book fa-2x"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card border-0 shadow-sm rounded-3 p-3 bg-white h-100">
        <div class="d-flex align-items-center justify-content-between">
          <div>
            <span class="text-muted small fw-semibold">Active Directory Posts</span>
            <h3 class="fw-bold text-success mb-0 mt-1"><?php echo $activeOfficers; ?></h3>
            <span class="small text-success"><i class="fa fa-check-circle me-1"></i> Live on Public Site</span>
          </div>
          <div class="p-3 bg-success-subtle text-success rounded-3">
            <i class="fa fa-user-check fa-2x"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card border-0 shadow-sm rounded-3 p-3 bg-white h-100">
        <div class="d-flex align-items-center justify-content-between">
          <div>
            <span class="text-muted small fw-semibold">Contact Cards</span>
            <h3 class="fw-bold text-warning mb-0 mt-1">4</h3>
            <span class="small text-muted">Location, Email, Helpdesk, Admission</span>
          </div>
          <div class="p-3 bg-warning-subtle text-warning rounded-3">
            <i class="fa fa-id-card fa-2x"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card border-0 shadow-sm rounded-3 p-3 bg-white h-100">
        <div class="d-flex align-items-center justify-content-between">
          <div>
            <span class="text-muted small fw-semibold">Contact Inquiries</span>
            <h3 class="fw-bold text-info mb-0 mt-1"><?php echo $totalContactInquiries; ?></h3>
            <span class="small text-muted">Received from contact form</span>
          </div>
          <div class="p-3 bg-info-subtle text-info rounded-3">
            <i class="fa fa-envelope-open-text fa-2x"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Management Tabs -->
  <div class="card border-0 shadow-sm rounded-3">
    <div class="card-header bg-white border-bottom pt-3 pb-0">
      <ul class="nav nav-tabs border-bottom-0" id="contactTabs" role="tablist">
        <li class="nav-item">
          <button class="nav-link active" id="officers-tab" data-bs-toggle="tab" data-bs-target="#officers-pane" type="button" role="tab">
            <i class="fa fa-address-book me-2 text-primary"></i> Officers &amp; Authorities Directory (<?php echo $totalOfficers; ?>)
          </button>
        </li>
        <li class="nav-item">
          <button class="nav-link" id="cards-tab" data-bs-toggle="tab" data-bs-target="#cards-pane" type="button" role="tab">
            <i class="fa fa-id-card me-2 text-warning"></i> Primary Contact Info Cards
          </button>
        </li>
        <li class="nav-item">
          <button class="nav-link" id="pageinfo-tab" data-bs-toggle="tab" data-bs-target="#pageinfo-pane" type="button" role="tab">
            <i class="fa fa-map-location-dot me-2 text-info"></i> Page Titles &amp; Interactive Map
          </button>
        </li>
      </ul>
    </div>

    <div class="card-body p-4">
      <div class="tab-content" id="contactTabsContent">
        
        <!-- TAB 1: Officers Directory -->
        <div class="tab-pane fade show active" id="officers-pane" role="tabpanel">
          <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
            <div>
              <h5 class="fw-bold text-dark mb-1">University Authorities &amp; Key Officers Directory</h5>
              <p class="text-muted small mb-0">Manage Vice-Chancellor, Registrar, Examination Controller, and officer phone extensions.</p>
            </div>
            <button class="btn btn-primary rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#officerModal" onclick="resetOfficerForm()">
              <i class="fa fa-plus-circle me-1"></i> Add New Officer Entry
            </button>
          </div>

          <div class="table-responsive">
            <table class="table table-hover align-middle custom-table mb-0 border">
              <thead>
                <tr>
                  <th style="width: 70px;" class="text-center">S.No.</th>
                  <th>Official Name &amp; Designation</th>
                  <th>Direct Telephone / Intercom</th>
                  <th>Status</th>
                  <th>Action Button Preview</th>
                  <th class="text-end" style="width: 140px;">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php if (empty($officers)): ?>
                  <tr>
                    <td colspan="6" class="text-center py-5 text-muted">
                      <i class="fa fa-address-book fa-3x mb-3 text-secondary opacity-50"></i>
                      <h6>No Officers in Directory</h6>
                      <p class="small">Click "Add New Officer Entry" to list key university officials.</p>
                    </td>
                  </tr>
                <?php else: ?>
                  <?php foreach ($officers as $off): 
                    $offJson = htmlspecialchars(json_encode($off), ENT_QUOTES, 'UTF-8');
                    $cleanTel = preg_replace('/[^0-9\+]/', '', $off['phone']);
                  ?>
                  <tr>
                    <td class="text-center fw-bold text-secondary"><?php echo htmlspecialchars($off['sno'] ?? '—'); ?></td>
                    <td>
                      <div class="fw-bold text-dark"><?php echo htmlspecialchars($off['name']); ?></div>
                      <div class="small text-muted"><?php echo htmlspecialchars($off['designation']); ?></div>
                    </td>
                    <td>
                      <span class="fw-bold text-primary"><i class="fa fa-phone me-1 small"></i><?php echo htmlspecialchars($off['phone']); ?></span>
                    </td>
                    <td>
                      <?php if (($off['status'] ?? 'Active') === 'Active'): ?>
                        <span class="badge bg-success-subtle text-success px-2 py-1"><i class="fa fa-circle-check me-1"></i> Active</span>
                      <?php else: ?>
                        <span class="badge bg-secondary-subtle text-secondary px-2 py-1"><i class="fa fa-pause me-1"></i> Inactive</span>
                      <?php endif; ?>
                    </td>
                    <td>
                      <a href="tel:<?php echo htmlspecialchars($cleanTel); ?>" class="btn btn-sm btn-outline-dark rounded-pill px-3">
                        <i class="fa <?php echo htmlspecialchars($off['action_icon'] ?? 'fa-phone'); ?> me-1"></i> <?php echo htmlspecialchars($off['action_label'] ?? 'Call Office'); ?>
                      </a>
                    </td>
                    <td class="text-end">
                      <button class="btn btn-outline-primary btn-sm rounded-circle me-1" title="Edit Officer" onclick="editOfficer(<?php echo $offJson; ?>)">
                        <i class="fa fa-pencil"></i>
                      </button>
                      <a href="contact.php?action=delete_officer&id=<?php echo urlencode($off['id']); ?>" class="btn btn-outline-danger btn-sm rounded-circle" title="Delete" onclick="return confirm('Are you sure you want to delete this officer entry?');">
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

        <!-- TAB 2: Primary Contact Info Cards -->
        <div class="tab-pane fade" id="cards-pane" role="tabpanel">
          <form action="contact.php" method="POST">
            <input type="hidden" name="action" value="save_info_cards">
            
            <div class="row g-4">
              
              <!-- Card 1: Campus Location -->
              <div class="col-lg-6">
                <div class="contact-card-preview h-100 shadow-sm">
                  <div class="d-flex align-items-center gap-2 mb-3 pb-2 border-bottom">
                    <i class="fa fa-location-dot text-primary fa-lg"></i>
                    <h6 class="fw-bold text-dark mb-0">Card 1: Campus Location</h6>
                  </div>
                  <div class="row g-3">
                    <div class="col-md-8">
                      <label class="form-label fw-semibold small">Card Header Title</label>
                      <input type="text" name="loc_title" class="form-control" value="<?php echo htmlspecialchars($loc['title'] ?? 'Campus Location'); ?>" required>
                    </div>
                    <div class="col-md-4">
                      <label class="form-label fw-semibold small">Icon</label>
                      <input type="text" name="loc_icon" class="form-control" value="<?php echo htmlspecialchars($loc['icon'] ?? 'fa-location-dot'); ?>">
                    </div>
                    <div class="col-12">
                      <label class="form-label fw-semibold small">University Full Name</label>
                      <input type="text" name="loc_uni" class="form-control" value="<?php echo htmlspecialchars($loc['university_name'] ?? ''); ?>" required>
                    </div>
                    <div class="col-12">
                      <label class="form-label fw-semibold small">Campus Physical Address</label>
                      <textarea name="loc_address" class="form-control" rows="2" required><?php echo htmlspecialchars($loc['address'] ?? ''); ?></textarea>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Card 2: Email & Portal -->
              <div class="col-lg-6">
                <div class="contact-card-preview h-100 shadow-sm">
                  <div class="d-flex align-items-center gap-2 mb-3 pb-2 border-bottom">
                    <i class="fa fa-envelope-open-text text-warning fa-lg"></i>
                    <h6 class="fw-bold text-dark mb-0">Card 2: Email &amp; Portal</h6>
                  </div>
                  <div class="row g-3">
                    <div class="col-md-8">
                      <label class="form-label fw-semibold small">Card Header Title</label>
                      <input type="text" name="email_title" class="form-control" value="<?php echo htmlspecialchars($emailPortal['title'] ?? 'Email & Portal'); ?>" required>
                    </div>
                    <div class="col-md-4">
                      <label class="form-label fw-semibold small">Icon</label>
                      <input type="text" name="email_icon" class="form-control" value="<?php echo htmlspecialchars($emailPortal['icon'] ?? 'fa-envelope-open-text'); ?>">
                    </div>
                    <div class="col-md-6">
                      <label class="form-label fw-semibold small">General Information Email</label>
                      <input type="email" name="email_gen" class="form-control" value="<?php echo htmlspecialchars($emailPortal['general_email'] ?? ''); ?>" required>
                    </div>
                    <div class="col-md-6">
                      <label class="form-label fw-semibold small">Registrar Official Email</label>
                      <input type="email" name="email_reg" class="form-control" value="<?php echo htmlspecialchars($emailPortal['registrar_email'] ?? ''); ?>" required>
                    </div>
                    <div class="col-12">
                      <label class="form-label fw-semibold small">Official Portal Domains</label>
                      <input type="text" name="websites" class="form-control" value="<?php echo htmlspecialchars($emailPortal['websites'] ?? ''); ?>" required>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Card 3: University Helpdesk -->
              <div class="col-lg-6">
                <div class="contact-card-preview h-100 shadow-sm">
                  <div class="d-flex align-items-center gap-2 mb-3 pb-2 border-bottom">
                    <i class="fa fa-phone-volume text-info fa-lg"></i>
                    <h6 class="fw-bold text-dark mb-0">Card 3: University Helpdesk &amp; EPABX</h6>
                  </div>
                  <div class="row g-3">
                    <div class="col-md-8">
                      <label class="form-label fw-semibold small">Card Header Title</label>
                      <input type="text" name="help_title" class="form-control" value="<?php echo htmlspecialchars($helpdesk['title'] ?? 'University Helpdesk'); ?>" required>
                    </div>
                    <div class="col-md-4">
                      <label class="form-label fw-semibold small">Icon</label>
                      <input type="text" name="help_icon" class="form-control" value="<?php echo htmlspecialchars($helpdesk['icon'] ?? 'fa-phone-volume'); ?>">
                    </div>
                    <div class="col-md-6">
                      <label class="form-label fw-semibold small">Direct Telephone</label>
                      <input type="text" name="help_tel" class="form-control" value="<?php echo htmlspecialchars($helpdesk['telephone'] ?? ''); ?>" required>
                    </div>
                    <div class="col-md-6">
                      <label class="form-label fw-semibold small">Official Fax</label>
                      <input type="text" name="help_fax" class="form-control" value="<?php echo htmlspecialchars($helpdesk['fax'] ?? ''); ?>">
                    </div>
                    <div class="col-12">
                      <label class="form-label fw-semibold small">EPABX Board Numbers (Comma Separated)</label>
                      <input type="text" name="help_board" class="form-control" value="<?php echo htmlspecialchars($helpdesk['board_numbers'] ?? ''); ?>">
                    </div>
                  </div>
                </div>
              </div>

              <!-- Card 4: Admission Helplines -->
              <div class="col-lg-6">
                <div class="contact-card-preview h-100 shadow-sm">
                  <div class="d-flex align-items-center gap-2 mb-3 pb-2 border-bottom">
                    <i class="fa fa-headset text-success fa-lg"></i>
                    <h6 class="fw-bold text-dark mb-0">Card 4: Admission Helplines &amp; Timings</h6>
                  </div>
                  <div class="row g-3">
                    <div class="col-md-8">
                      <label class="form-label fw-semibold small">Card Header Title</label>
                      <input type="text" name="adm_title" class="form-control" value="<?php echo htmlspecialchars($adm['title'] ?? 'Admission Helplines'); ?>" required>
                    </div>
                    <div class="col-md-4">
                      <label class="form-label fw-semibold small">Icon</label>
                      <input type="text" name="adm_icon" class="form-control" value="<?php echo htmlspecialchars($adm['icon'] ?? 'fa-headset'); ?>">
                    </div>
                    <div class="col-md-6">
                      <label class="form-label fw-semibold small">Toll Free / Direct Display</label>
                      <input type="text" name="adm_toll" class="form-control" value="<?php echo htmlspecialchars($adm['toll_free'] ?? ''); ?>" required>
                    </div>
                    <div class="col-md-6">
                      <label class="form-label fw-semibold small">Toll Free Dial Link</label>
                      <input type="text" name="adm_toll_tel" class="form-control" value="<?php echo htmlspecialchars($adm['toll_free_tel'] ?? ''); ?>" placeholder="+917748900028">
                    </div>
                    <div class="col-md-6">
                      <label class="form-label fw-semibold small">Admission Cell Display</label>
                      <input type="text" name="adm_cell" class="form-control" value="<?php echo htmlspecialchars($adm['admission_cell'] ?? ''); ?>" required>
                    </div>
                    <div class="col-md-6">
                      <label class="form-label fw-semibold small">Admission Cell Dial Link</label>
                      <input type="text" name="adm_cell_tel" class="form-control" value="<?php echo htmlspecialchars($adm['admission_cell_tel'] ?? ''); ?>" placeholder="+917562292740">
                    </div>
                    <div class="col-12">
                      <label class="form-label fw-semibold small">Operating Office Hours Badge</label>
                      <input type="text" name="adm_timings" class="form-control" value="<?php echo htmlspecialchars($adm['timings'] ?? ''); ?>">
                    </div>
                  </div>
                </div>
              </div>

            </div>

            <div class="text-end mt-4">
              <button type="submit" class="btn btn-primary px-4 rounded-pill">
                <i class="fa fa-save me-1"></i> Save All Contact Cards
              </button>
            </div>
          </form>
        </div>

        <!-- TAB 3: Page Meta & Map -->
        <div class="tab-pane fade" id="pageinfo-pane" role="tabpanel">
          <div class="row justify-content-center">
            <div class="col-lg-11">
              <form action="contact.php" method="POST" class="card border rounded-3 p-4 shadow-sm bg-light">
                <input type="hidden" name="action" value="save_page_info">

                <!-- Tab Navigation Header for Page Info -->
                <ul class="nav nav-pills mb-4 gap-2 border-bottom pb-3" id="contactPageTabNav" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active fw-bold px-4 py-2" id="tab-cnt-general" data-bs-toggle="pill" data-bs-target="#pane-cnt-general" type="button" role="tab">
                      <i class="fa-solid fa-sliders me-2"></i>General Content &amp; Media
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link fw-bold px-4 py-2" id="tab-cnt-seo" data-bs-toggle="pill" data-bs-target="#pane-cnt-seo" type="button" role="tab" style="background: rgba(16,185,129,0.08); color: #047857; border: 1px solid rgba(16,185,129,0.3);">
                      <i class="fa-solid fa-magnifying-glass me-2"></i>SEO &amp; Meta Details <span class="badge bg-success ms-1">SEO</span>
                    </button>
                  </li>
                </ul>

                <div class="tab-content" id="contactPageTabContent">
                  <!-- TAB 1: General Content & Media -->
                  <div class="tab-pane fade show active" id="pane-cnt-general" role="tabpanel">
                    
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
                        <label class="form-label fw-semibold small">Main Card Header Title</label>
                        <input type="text" name="heading" class="form-control" value="<?php echo htmlspecialchars($pageInfo['heading'] ?? ''); ?>" required>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label fw-semibold small">Officers Directory Heading</label>
                        <input type="text" name="directory_heading" class="form-control" value="<?php echo htmlspecialchars($pageInfo['directory_heading'] ?? ''); ?>" required>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label fw-semibold small">Inquiry Form Heading</label>
                        <input type="text" name="form_heading" class="form-control" value="<?php echo htmlspecialchars($pageInfo['form_heading'] ?? ''); ?>" required>
                      </div>
                    </div>

                    <h5 class="fw-bold text-dark border-bottom pb-2 mb-3">
                      <i class="fa fa-map-location-dot me-2 text-info"></i> Google Maps Embed URL
                    </h5>

                    <div class="row g-3 mb-4">
                      <div class="col-12">
                        <label class="form-label fw-semibold small">Map Section Heading</label>
                        <input type="text" name="map_heading" class="form-control" value="<?php echo htmlspecialchars($pageInfo['map_heading'] ?? ''); ?>" required>
                      </div>
                      <div class="col-12">
                        <label class="form-label fw-semibold small">Google Maps Embed Source (iframe src)</label>
                        <textarea name="map_embed_url" class="form-control" rows="3" required><?php echo htmlspecialchars($pageInfo['map_embed_url'] ?? ''); ?></textarea>
                        <small class="text-muted">Direct iframe src from Google Maps (Share -> Embed a map).</small>
                      </div>
                    </div>

                  </div><!-- end TAB 1 -->

                  <!-- TAB 2: SEO & Meta Details -->
                  <div class="tab-pane fade" id="pane-cnt-seo" role="tabpanel">

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
                              <span class="text-muted ms-1" style="font-size: 12px;">https://sssutms.co.in › Contact</span>
                            </div>
                          </div>
                          <h5 id="seoPreviewTitleCnt" class="fw-normal mb-1 text-primary" style="color: #1a0dab !important; font-size: 20px; line-height: 1.3; cursor: pointer;">
                            <?php echo htmlspecialchars(!empty($pageInfo['meta_title']) ? $pageInfo['meta_title'] : ($pageInfo['page_title'] ?? 'Contact Us & Helpdesk - SSSUTMS')); ?>
                          </h5>
                          <p id="seoPreviewDescCnt" class="mb-0 text-muted" style="color: #4d5156 !important; font-size: 14px; line-height: 1.58;">
                            <?php echo htmlspecialchars(!empty($pageInfo['meta_description']) ? $pageInfo['meta_description'] : 'Get in touch with Sri Satya Sai University (SSSUTMS), Sehore. Access official contact numbers, email directory, admission helplines, and campus map directions.'); ?>
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
                          <small class="text-muted"><span id="metaTitleCountCnt">0</span> / 60 chars <span class="badge bg-secondary ms-1">Recommended: 50-60</span></small>
                        </div>
                        <input type="text" name="meta_title" id="seoInputTitleCnt" class="form-control" value="<?php echo htmlspecialchars($pageInfo['meta_title'] ?? ''); ?>" placeholder="e.g. Contact Us &amp; Helpdesk | Sri Satya Sai University (SSSUTMS)" oninput="updateSeoPreviewCnt()">
                        <small class="text-muted">Displayed as the main clickable headline in Google search results and browser tab.</small>
                      </div>

                      <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                          <label class="form-label small fw-bold mb-0">
                            <i class="fa-solid fa-align-left text-success me-1"></i> SEO Meta Description
                          </label>
                          <small class="text-muted"><span id="metaDescCountCnt">0</span> / 160 chars <span class="badge bg-secondary ms-1">Recommended: 150-160</span></small>
                        </div>
                        <textarea name="meta_description" id="seoInputDescCnt" class="form-control" rows="3" placeholder="Provide a compelling 150-160 character description of this page for Google search snippets..." oninput="updateSeoPreviewCnt()"><?php echo htmlspecialchars($pageInfo['meta_description'] ?? ''); ?></textarea>
                        <small class="text-muted">Google snippet description to entice visitors and prospective students seeking helpdesk numbers to click.</small>
                      </div>

                      <div class="col-md-6">
                        <label class="form-label small fw-bold">
                          <i class="fa-solid fa-tags text-warning me-1"></i> Target SEO Keywords (Comma Separated)
                        </label>
                        <input type="text" name="meta_keywords" class="form-control" value="<?php echo htmlspecialchars($pageInfo['meta_keywords'] ?? ''); ?>" placeholder="e.g. SSSUTMS Contact, Sri Satya Sai University Sehore Address, SSSUTMS Helpdesk">
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

<!-- Modal: Add / Edit Officer -->
<div class="modal fade" id="officerModal" tabindex="-1" aria-labelledby="officerModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow">
      <form action="contact.php" method="POST">
        <input type="hidden" name="action" value="save_officer">
        <input type="hidden" name="officer_id" id="off_id" value="">

        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title fw-bold" id="officerModalLabel"><i class="fa fa-user-plus me-2"></i> Add Key Officer Entry</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body p-4">
          <div class="row g-3">
            <div class="col-md-3">
              <label class="form-label fw-semibold small">S.No.</label>
              <input type="text" name="sno" id="off_sno" class="form-control" placeholder="01">
            </div>
            <div class="col-md-9">
              <label class="form-label fw-semibold small">Officer Name <span class="text-danger">*</span></label>
              <input type="text" name="name" id="off_name" class="form-control" placeholder="e.g. Dr. Mukesh Tiwari" required>
            </div>
            <div class="col-12">
              <label class="form-label fw-semibold small">Designation <span class="text-danger">*</span></label>
              <input type="text" name="designation" id="off_designation" class="form-control" placeholder="e.g. Vice Chancellor" required>
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold small">Direct Phone / Intercom <span class="text-danger">*</span></label>
              <input type="text" name="phone" id="off_phone" class="form-control" placeholder="e.g. 07562-292203" required>
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold small">Status</label>
              <select name="status" id="off_status" class="form-select">
                <option value="Active">Active (Visible)</option>
                <option value="Inactive">Inactive (Hidden)</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold small">Action Button Label</label>
              <input type="text" name="action_label" id="off_action_label" class="form-control" value="Call Office">
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold small">Action Icon</label>
              <select name="action_icon" id="off_action_icon" class="form-select">
                <option value="fa-phone">fa-phone (Telephone)</option>
                <option value="fa-phone-volume">fa-phone-volume (Volume)</option>
                <option value="fa-envelope">fa-envelope (Email)</option>
              </select>
            </div>
          </div>
        </div>

        <div class="modal-footer bg-light">
          <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary rounded-pill px-4">
            <i class="fa fa-save me-1"></i> Save Officer Details
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

// Reset Officer Form
function resetOfficerForm() {
  document.getElementById('officerModalLabel').innerHTML = '<i class="fa fa-user-plus me-2"></i> Add Key Officer Entry';
  document.getElementById('off_id').value = '';
  document.getElementById('off_sno').value = '';
  document.getElementById('off_name').value = '';
  document.getElementById('off_designation').value = '';
  document.getElementById('off_phone').value = '';
  document.getElementById('off_action_label').value = 'Call Office';
  document.getElementById('off_action_icon').value = 'fa-phone';
  document.getElementById('off_status').value = 'Active';
}

// Edit Officer Form
function editOfficer(off) {
  document.getElementById('officerModalLabel').innerHTML = '<i class="fa fa-pencil me-2"></i> Edit Key Officer Entry';
  document.getElementById('off_id').value = off.id || '';
  document.getElementById('off_sno').value = off.sno || '';
  document.getElementById('off_name').value = off.name || '';
  document.getElementById('off_designation').value = off.designation || '';
  document.getElementById('off_phone').value = off.phone || '';
  document.getElementById('off_action_label').value = off.action_label || 'Call Office';
  document.getElementById('off_action_icon').value = off.action_icon || 'fa-phone';
  document.getElementById('off_status').value = off.status || 'Active';

  const modal = new bootstrap.Modal(document.getElementById('officerModal'));
  modal.show();
}

// SEO Live Preview & Counter for Contact Page
function updateSeoPreviewCnt() {
  const titleInput = document.getElementById('seoInputTitleCnt');
  const descInput = document.getElementById('seoInputDescCnt');
  const previewTitle = document.getElementById('seoPreviewTitleCnt');
  const previewDesc = document.getElementById('seoPreviewDescCnt');
  const titleCount = document.getElementById('metaTitleCountCnt');
  const descCount = document.getElementById('metaDescCountCnt');

  if (titleInput && previewTitle) {
    const val = titleInput.value.trim();
    previewTitle.textContent = val ? val : 'Contact Us & Helpdesk - SSSUTMS';
    if (titleCount) {
      titleCount.textContent = titleInput.value.length;
      titleCount.className = (titleInput.value.length > 60) ? 'text-danger fw-bold' : 'text-success fw-bold';
    }
  }

  if (descInput && previewDesc) {
    const val = descInput.value.trim();
    previewDesc.textContent = val ? val : 'Get in touch with Sri Satya Sai University (SSSUTMS), Sehore. Access official contact numbers, email directory, admission helplines, and campus map directions.';
    if (descCount) {
      descCount.textContent = descInput.value.length;
      descCount.className = (descInput.value.length > 160) ? 'text-danger fw-bold' : 'text-success fw-bold';
    }
  }
}

document.addEventListener('DOMContentLoaded', function() {
  updateSeoPreviewCnt();
});
</script>

</body>
</html>
