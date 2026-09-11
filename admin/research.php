<?php
require_once __DIR__ . '/../config.php';
require_admin_auth();

$allData = get_json_data('page_documents.json', []);
$msg = '';
$error = '';

$validTabs = [
    'DirectorRD' => 'Director (R&D)',
    'RAndDCell' => 'R & D Cell',
    'CouncilForResearch' => 'Council For Research',
    'ResearchPolicies' => 'Research Promotion Policy',
    'ConsultancyServices' => 'Consultancy Services',
    'ResearchPatents' => 'Patents',
    'CollaborationandMou' => 'Collaboration & MoU',
    'Iic_Cell' => 'IIC Cell',
    'ResearchEResources' => 'E-Resources',
    'Exposition' => 'Exposition',
    'UGAndPGScholarsProject' => 'UG & PG Scholars Project',
    'NPTEL' => 'NPTEL'
];

$frontendPageMap = [
    'DirectorRD' => 'Director_Research_And_Development.php',
    'RAndDCell' => 'RAndDCell.php',
    'CouncilForResearch' => 'CouncilForResearch.php',
    'ResearchPolicies' => 'ResearchPromotionPolicy.php',
    'ConsultancyServices' => 'ConsultancyServices.php',
    'ResearchPatents' => 'Patents.php',
    'CollaborationandMou' => 'CollaborationandMou.php',
    'Iic_Cell' => 'Iic_Cell.php',
    'ResearchEResources' => 'E-Resources.php',
    'Exposition' => 'Exposition.php',
    'UGAndPGScholarsProject' => 'UGAndPGScholarsProject.php',
    'NPTEL' => 'NPTEL.php'
];

$tabIcons = [
    'DirectorRD' => 'fa-user-tie',
    'RAndDCell' => 'fa-atom',
    'CouncilForResearch' => 'fa-users',
    'ResearchPolicies' => 'fa-file-shield',
    'ConsultancyServices' => 'fa-briefcase',
    'ResearchPatents' => 'fa-certificate',
    'CollaborationandMou' => 'fa-handshake',
    'Iic_Cell' => 'fa-rocket',
    'ResearchEResources' => 'fa-book-bookmark',
    'Exposition' => 'fa-wand-magic-sparkles',
    'UGAndPGScholarsProject' => 'fa-graduation-cap',
    'NPTEL' => 'fa-laptop-code'
];

$tab = clean_input($_GET['tab'] ?? 'DirectorRD');
if (!array_key_exists($tab, $validTabs)) {
    $tab = 'DirectorRD';
}
$activeFrontend = $frontendPageMap[$tab] ?? 'Director_Research_And_Development.php';

// Helper to determine if current tab is a document table or custom form
$isTableTab = in_array($tab, ['CouncilForResearch', 'ResearchPolicies', 'ResearchPatents', 'ResearchEResources']);

// ==========================================
// 1. SAVE DIRECTOR (R&D)
// ==========================================
if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST' && isset($_POST['action']) && $_POST['action'] === 'save_director_rd') {
    $name = clean_input($_POST['name'] ?? '');
    $designation = clean_input($_POST['designation'] ?? 'Director (R & D)');
    $university = clean_input($_POST['university'] ?? 'Sri Satya Sai University of Technology & Medical Sciences');
    $quote = clean_input($_POST['quote'] ?? '');
    $message = trim($_POST['message'] ?? '');
    $photo = trim($_POST['existing_photo'] ?? 'assets/images/research/h.k.SHARMA_05042022_1258.jpg');

    if (isset($_FILES['photo_file']) && $_FILES['photo_file']['error'] === UPLOAD_ERR_OK) {
        $allowed = ['jpg', 'jpeg', 'png', 'webp'];
        $origName = $_FILES['photo_file']['name'];
        $ext = strtolower(pathinfo($origName, PATHINFO_EXTENSION));

        if (in_array($ext, $allowed)) {
            $newFileName = 'director_rd_' . time() . '.' . $ext;
            $destPath = ROOT_PATH . '/assets/images/research/' . $newFileName;
            if (move_uploaded_file($_FILES['photo_file']['tmp_name'], $destPath)) {
                $photo = 'assets/images/research/' . $newFileName;
            } else {
                $error = 'Failed to upload photo file.';
            }
        } else {
            $error = 'Invalid image type. Allowed: JPG, PNG, WEBP.';
        }
    }

    if (empty($error)) {
        $allData['DirectorRD'] = [
            [
                'id' => '1',
                'name' => $name,
                'designation' => $designation,
                'university' => $university,
                'photo' => $photo,
                'quote' => $quote,
                'message' => $message,
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];
        save_json_data('page_documents.json', $allData);
        $msg = 'Director (R&D) profile and message updated successfully!';
    }
}

// ==========================================
// 2. SAVE R&D CELL
// ==========================================
if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST' && isset($_POST['action']) && $_POST['action'] === 'save_rd_cell') {
    $title = clean_input($_POST['title'] ?? 'RESEARCH & DEVELOPMENT (R&D) CELL');
    $preamble = trim($_POST['preamble'] ?? '');
    $objectivesRaw = trim($_POST['objectives'] ?? '');
    $objectives = array_values(array_filter(array_map('trim', explode("\n", $objectivesRaw))));

    $allData['RAndDCell'] = [
        [
            'id' => '1',
            'title' => $title,
            'preamble' => $preamble,
            'objectives' => $objectives,
            'updated_at' => date('Y-m-d H:i:s')
        ]
    ];
    save_json_data('page_documents.json', $allData);
    $msg = 'R & D Cell details updated successfully!';
}

// ==========================================
// 3. SAVE CONSULTANCY SERVICES
// ==========================================
if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST' && isset($_POST['action']) && $_POST['action'] === 'save_consultancy') {
    $title = clean_input($_POST['title'] ?? 'CONSULTANCY SERVICES');
    $subtitle = clean_input($_POST['subtitle'] ?? 'Transferring Academic Knowledge & Infrastructure for Industrial Solutions');
    $intro = trim($_POST['intro'] ?? '');
    $resourceSharing = trim($_POST['resource_sharing'] ?? '');
    $revenueSharing = trim($_POST['revenue_sharing'] ?? '');
    $processSop = trim($_POST['process_sop'] ?? '');
    $objectivesRaw = trim($_POST['objectives'] ?? '');
    $objectives = array_values(array_filter(array_map('trim', explode("\n", $objectivesRaw))));
    $partnersRaw = trim($_POST['partners'] ?? '');
    $partners = array_values(array_filter(array_map('trim', explode("\n", $partnersRaw))));

    $allData['ConsultancyServices'] = [
        [
            'id' => '1',
            'title' => $title,
            'subtitle' => $subtitle,
            'intro' => $intro,
            'resource_sharing' => $resourceSharing,
            'revenue_sharing' => $revenueSharing,
            'process_sop' => $processSop,
            'objectives' => $objectives,
            'partners' => $partners,
            'updated_at' => date('Y-m-d H:i:s')
        ]
    ];
    save_json_data('page_documents.json', $allData);
    $msg = 'Consultancy Services details updated successfully!';
}

// ==========================================
// 4. SAVE COLLABORATION & MOU
// ==========================================
if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST' && isset($_POST['action']) && $_POST['action'] === 'save_mou') {
    $title = clean_input($_POST['title'] ?? 'COLLABORATIONS & MEMORANDUMS OF UNDERSTANDING');
    $subtitle = clean_input($_POST['subtitle'] ?? 'Fostering National & International Academic, Research, and Industrial Synergies');
    $overview = trim($_POST['overview'] ?? '');
    $jointRd = trim($_POST['joint_rd'] ?? '');
    $industrial = trim($_POST['industrial_training'] ?? '');
    $faculty = trim($_POST['faculty_exchange'] ?? '');
    $techComm = trim($_POST['tech_comm'] ?? '');

    $allData['CollaborationandMou'] = [
        [
            'id' => '1',
            'title' => $title,
            'subtitle' => $subtitle,
            'overview' => $overview,
            'joint_rd' => $jointRd,
            'industrial_training' => $industrial,
            'faculty_exchange' => $faculty,
            'tech_comm' => $techComm,
            'updated_at' => date('Y-m-d H:i:s')
        ]
    ];
    save_json_data('page_documents.json', $allData);
    $msg = 'Collaboration & MoU details updated successfully!';
}

// ==========================================
// 5. SAVE IIC CELL
// ==========================================
if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST' && isset($_POST['action']) && $_POST['action'] === 'save_iic') {
    $title = clean_input($_POST['title'] ?? 'INSTITUTION\'S INNOVATION COUNCIL (IIC) CELL');
    $subtitle = clean_input($_POST['subtitle'] ?? 'Fostering Entrepreneurship, Student Start-ups & Intellectual Property Awareness');
    $vision = trim($_POST['vision'] ?? '');
    $missionsRaw = trim($_POST['missions'] ?? '');
    $missions = array_values(array_filter(array_map('trim', explode("\n", $missionsRaw))));

    // Existing gallery items
    $existingIic = $allData['Iic_Cell'][0] ?? [];
    $gallery = $existingIic['gallery'] ?? [];

    // Check if new gallery image uploaded
    if (isset($_FILES['gallery_file']) && $_FILES['gallery_file']['error'] === UPLOAD_ERR_OK) {
        $allowed = ['jpg', 'jpeg', 'png', 'webp'];
        $origName = $_FILES['gallery_file']['name'];
        $ext = strtolower(pathinfo($origName, PATHINFO_EXTENSION));

        if (in_array($ext, $allowed)) {
            $newFileName = 'iic_' . time() . '.' . $ext;
            $destPath = ROOT_PATH . '/assets/images/research/iic/' . $newFileName;
            if (!is_dir(dirname($destPath))) {
                mkdir(dirname($destPath), 0777, true);
            }
            if (move_uploaded_file($_FILES['gallery_file']['tmp_name'], $destPath)) {
                $caption = clean_input($_POST['gallery_caption'] ?? 'IIC Certificate / Workshop');
                $gallery[] = [
                    'title' => $caption,
                    'image' => 'assets/images/research/iic/' . $newFileName
                ];
            }
        }
    }

    $allData['Iic_Cell'] = [
        [
            'id' => '1',
            'title' => $title,
            'subtitle' => $subtitle,
            'vision' => $vision,
            'missions' => $missions,
            'gallery' => $gallery,
            'updated_at' => date('Y-m-d H:i:s')
        ]
    ];
    save_json_data('page_documents.json', $allData);
    $msg = 'IIC Cell details and gallery updated successfully!';
}

// Delete IIC Gallery Image
if (isset($_GET['action']) && $_GET['action'] === 'delete_iic_photo' && isset($_GET['index'])) {
    $delIdx = intval($_GET['index']);
    if (isset($allData['Iic_Cell'][0]['gallery'][$delIdx])) {
        array_splice($allData['Iic_Cell'][0]['gallery'], $delIdx, 1);
        save_json_data('page_documents.json', $allData);
        $msg = 'Gallery photo removed successfully.';
    }
}

// ==========================================
// 6. SAVE EXPOSITION
// ==========================================
if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST' && isset($_POST['action']) && $_POST['action'] === 'save_exposition') {
    $title = clean_input($_POST['title'] ?? 'EXPOSITION: A CARNIVAL OF INNOVATION');
    $subtitle = clean_input($_POST['subtitle'] ?? 'Annual Mega Exhibition of Student Creativity, Robotics, Drones & Project Innovations');
    $intro = trim($_POST['intro'] ?? '');
    $body = trim($_POST['body'] ?? '');
    $quote = trim($_POST['quote'] ?? '');
    $nukkad = trim($_POST['highlight_nukkad'] ?? '');
    $robotics = trim($_POST['highlight_robotics'] ?? '');
    $drones = trim($_POST['highlight_drones'] ?? '');
    $stalls = trim($_POST['highlight_stalls'] ?? '');

    $allData['Exposition'] = [
        [
            'id' => '1',
            'title' => $title,
            'subtitle' => $subtitle,
            'intro' => $intro,
            'body' => $body,
            'quote' => $quote,
            'highlight_nukkad' => $nukkad,
            'highlight_robotics' => $robotics,
            'highlight_drones' => $drones,
            'highlight_stalls' => $stalls,
            'updated_at' => date('Y-m-d H:i:s')
        ]
    ];
    save_json_data('page_documents.json', $allData);
    $msg = 'Exposition event details updated successfully!';
}

// ==========================================
// 7. SAVE UG & PG SCHOLARS PROJECT
// ==========================================
if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST' && isset($_POST['action']) && $_POST['action'] === 'save_ugpg') {
    $title = clean_input($_POST['title'] ?? 'UG & PG SCHOLARS PROJECT');
    $subtitle = clean_input($_POST['subtitle'] ?? 'Nurturing Early Curiosity, Scientific Methodology & Student Research Papers');
    $philosophy = trim($_POST['philosophy'] ?? '');
    $quoteText = trim($_POST['quote_text'] ?? '');
    $quoteAuthor = trim($_POST['quote_author'] ?? '');
    $notice = trim($_POST['notice'] ?? '');

    $allData['UGAndPGScholarsProject'] = [
        [
            'id' => '1',
            'title' => $title,
            'subtitle' => $subtitle,
            'philosophy' => $philosophy,
            'quote_text' => $quoteText,
            'quote_author' => $quoteAuthor,
            'notice' => $notice,
            'updated_at' => date('Y-m-d H:i:s')
        ]
    ];
    save_json_data('page_documents.json', $allData);
    $msg = 'UG & PG Scholars Project details updated successfully!';
}

// ==========================================
// 8. SAVE NPTEL
// ==========================================
if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST' && isset($_POST['action']) && $_POST['action'] === 'save_nptel') {
    $title = clean_input($_POST['title'] ?? 'NATIONAL PROGRAMME ON TECHNOLOGY ENHANCED LEARNING (NPTEL)');
    $subtitle = clean_input($_POST['subtitle'] ?? 'SSSUTMS Local Chapter for IIT Online Certification Courses & FDPs');
    $portalUrl = trim($_POST['portal_url'] ?? 'https://onlinecourses.nptel.ac.in/');
    $aboutText = trim($_POST['about_text'] ?? '');
    $guidelinesRaw = trim($_POST['guidelines'] ?? '');
    $guidelines = array_values(array_filter(array_map('trim', explode("\n", $guidelinesRaw))));
    
    // Parse links: each line format "Title | URL"
    $linksRaw = trim($_POST['links_raw'] ?? '');
    $links = [];
    foreach (explode("\n", $linksRaw) as $lLine) {
        $lLine = trim($lLine);
        if (empty($lLine)) continue;
        $parts = explode('|', $lLine, 2);
        if (count($parts) === 2) {
            $links[] = ['title' => trim($parts[0]), 'url' => trim($parts[1])];
        } else {
            $links[] = ['title' => $lLine, 'url' => '#'];
        }
    }

    $allData['NPTEL'] = [
        [
            'id' => '1',
            'title' => $title,
            'subtitle' => $subtitle,
            'portal_url' => $portalUrl,
            'about_text' => $aboutText,
            'guidelines' => $guidelines,
            'links' => $links,
            'updated_at' => date('Y-m-d H:i:s')
        ]
    ];
    save_json_data('page_documents.json', $allData);
    $msg = 'NPTEL Local Chapter details updated successfully!';
}

// ==========================================
// 9. SAVE DOCUMENT / RECORD (FOR TABLE TABS)
// ==========================================
if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST' && isset($_POST['action']) && $_POST['action'] === 'save_doc') {
    $pageKey = clean_input($_POST['page_key'] ?? $tab);
    $section = 'Research';
    $pageTitle = $validTabs[$pageKey] ?? $pageKey;
    $docId = !empty($_POST['doc_id']) ? clean_input($_POST['doc_id']) : (time() . rand(100, 999));
    $title = clean_input($_POST['title'] ?? '');
    $category = clean_input($_POST['category'] ?? 'General');
    $status = clean_input($_POST['status'] ?? 'Active');
    $date = clean_input($_POST['date'] ?? date('Y-m-d'));
    $fileUrl = trim($_POST['file_url'] ?? '');
    $desc = clean_input($_POST['desc'] ?? '');
    $inventors = clean_input($_POST['inventors'] ?? '');
    $appNo = clean_input($_POST['app_no'] ?? '');

    // Handle File Upload
    if (isset($_FILES['doc_file']) && $_FILES['doc_file']['error'] === UPLOAD_ERR_OK) {
        $allowed = ['pdf', 'doc', 'docx', 'xls', 'xlsx', 'zip', 'jpg', 'png'];
        $origName = $_FILES['doc_file']['name'];
        $ext = strtolower(pathinfo($origName, PATHINFO_EXTENSION));

        if (in_array($ext, $allowed)) {
            $newFileName = preg_replace('/[^a-zA-Z0-9_-]/', '_', pathinfo($origName, PATHINFO_FILENAME)) . '_' . time() . '.' . $ext;
            $destPath = UPLOAD_DIR . '/documents/' . $newFileName;
            if (!is_dir(dirname($destPath))) {
                mkdir(dirname($destPath), 0777, true);
            }
            if (move_uploaded_file($_FILES['doc_file']['tmp_name'], $destPath)) {
                $fileUrl = 'assets/uploads/documents/' . $newFileName;
            } else {
                $error = 'Failed to upload document file.';
            }
        } else {
            $error = 'Invalid file type. Allowed: PDF, Word, Excel, ZIP, JPG, PNG.';
        }
    }

    if (empty($error)) {
        if (!empty($pageKey) && !empty($title)) {
            if (empty($fileUrl)) $fileUrl = '#';

            $docData = [
                'id' => $docId,
                'title' => $title,
                'category' => $category,
                'status' => $status,
                'date' => $date,
                'file' => $fileUrl,
                'desc' => $desc,
                'inventors' => $inventors,
                'app_no' => $appNo,
                'section' => $section,
                'page' => $pageTitle,
                'created_at' => date('Y-m-d H:i:s')
            ];

            if (!isset($allData[$pageKey]['documents'])) {
                $allData[$pageKey] = [
                    'title' => $pageTitle,
                    'section' => $section,
                    'documents' => []
                ];
            }

            // Check if edit or add
            $found = false;
            foreach ($allData[$pageKey]['documents'] as $i => $item) {
                if (($item['id'] ?? '') === $docId) {
                    $allData[$pageKey]['documents'][$i] = array_merge($item, $docData);
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                array_unshift($allData[$pageKey]['documents'], $docData);
            }

            save_json_data('page_documents.json', $allData);
            $msg = "Record successfully saved to {$pageTitle}!";
        } else {
            $error = 'Title is a required field.';
        }
    }
}

// Handle Delete (For Table Tabs)
if (isset($_GET['action']) && $_GET['action'] === 'delete' && !empty($_GET['id'])) {
    $delId = clean_input($_GET['id']);
    if (isset($allData[$tab]['documents'])) {
        $allData[$tab]['documents'] = array_values(array_filter($allData[$tab]['documents'], function($item) use ($delId) {
            return ($item['id'] ?? '') !== $delId;
        }));
        save_json_data('page_documents.json', $allData);
        $msg = 'Record successfully removed.';
    }
}

// Current tab's documents (for table tabs)
$currentDocs = $allData[$tab]['documents'] ?? [];

// Counts for each tab
$counts = [];
foreach ($validTabs as $k => $v) {
    if (isset($allData[$k]['documents'])) {
        $counts[$k] = count($allData[$k]['documents']);
    } else {
        $counts[$k] = 'Live';
    }
}

// Retrieve single record data for custom form tabs
$directorInfo = $allData['DirectorRD'][0] ?? [];
$rdCellInfo = $allData['RAndDCell'][0] ?? [];
$csInfo = $allData['ConsultancyServices'][0] ?? [];
$mouInfo = $allData['CollaborationandMou'][0] ?? [];
$iicInfo = $allData['Iic_Cell'][0] ?? [];
$expInfo = $allData['Exposition'][0] ?? [];
$ugpgInfo = $allData['UGAndPGScholarsProject'][0] ?? [];
$nptelInfo = $allData['NPTEL'][0] ?? [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Research Cell Management (12 Pages) - SSSUTMS Admin</title>
  <link rel="icon" type="image/jpeg" href="../assets/images/logo/logo.jpg">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/admin.css">
  <style>
    .res-nav-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(190px, 1fr));
      gap: 10px;
    }
    .res-nav-pill {
      border: 1px solid #e2e8f0;
      border-radius: 12px;
      padding: 10px 14px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 8px;
      background: #ffffff;
      color: #334155;
      text-decoration: none;
      font-weight: 600;
      font-size: 0.88rem;
      transition: all 0.2s ease;
      min-height: 48px;
    }
    .res-nav-pill:hover {
      background: #f8fafc;
      border-color: #cbd5e1;
      transform: translateY(-2px);
      color: #0b2545;
    }
    .res-nav-pill.active {
      background: linear-gradient(135deg, #0b2545 0%, #1e4d8c 100%);
      color: #ffffff;
      border-color: #0b2545;
      box-shadow: 0 4px 12px rgba(11,37,69,0.25);
    }
    .res-nav-pill.active .badge {
      background: #f59e0b !important;
      color: #000000 !important;
    }
    .form-section-title {
      font-size: 0.95rem;
      font-weight: 700;
      color: #0b2545;
      margin-bottom: 0.8rem;
      padding-bottom: 0.4rem;
      border-bottom: 2px solid #f1f5f9;
      display: flex;
      align-items: center;
      gap: 8px;
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
    <li><a href="research.php" class="nav-link active"><i class="fa fa-flask"></i> Research Cell (12)</a></li>
    <li><a href="about.php" class="nav-link"><i class="fa fa-circle-info"></i> About Pages (42)</a></li>
    <li><a href="faculties.php" class="nav-link"><i class="fa fa-chalkboard-user"></i> Faculties &amp; Depts (14)</a></li>
    <li><a href="documents.php" class="nav-link"><i class="fa fa-stamp"></i> Approvals &amp; NAAC Docs</a></li>
    <li><a href="events.php" class="nav-link"><i class="fa fa-calendar-days"></i> Events &amp; Workshops</a></li>
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

<!-- Main Admin Content Area -->
<main class="admin-main">
  
  <header class="admin-topbar">
    <div class="d-flex align-items-center gap-3">
      <button class="admin-sidebar-toggle d-lg-none" type="button" aria-label="Toggle Navigation">
        <i class="fa fa-bars"></i>
      </button>
      <div>
        <h5 class="fw-bold text-dark mb-0">Research Cell Management (All 12 Pages)</h5>
        <small class="text-muted d-none d-md-inline">Every page in the Research tab has a dedicated live dynamic editor</small>
      </div>
    </div>
    <div class="d-flex gap-2">
      <a href="../Research/<?php echo $activeFrontend; ?>" target="_blank" class="btn btn-outline-secondary rounded-pill px-3">
        <i class="fa fa-arrow-up-right-from-square me-1"></i> View Live Page
      </a>
      <?php if ($isTableTab): ?>
      <button class="btn btn-primary fw-bold rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#addDocModal">
        <i class="fa fa-plus me-1"></i> Add Record
      </button>
      <?php endif; ?>
    </div>
  </header>

  <div class="admin-content p-4">

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

    <!-- Tabs Navigation Grid (All 12 Pages) -->
    <div class="res-nav-grid mb-4">
      <?php foreach ($validTabs as $key => $title): ?>
        <a href="research.php?tab=<?php echo $key; ?>" class="res-nav-pill <?php echo ($tab === $key) ? 'active' : ''; ?>">
          <span class="text-truncate"><i class="fa-solid <?php echo $tabIcons[$key] ?? 'fa-file'; ?> me-1"></i> <?php echo $title; ?></span>
          <span class="badge bg-secondary-subtle text-secondary rounded-pill"><?php echo $counts[$key] ?? 'Live'; ?></span>
        </a>
      <?php endforeach; ?>
    </div>

    <!-- ============================================================== -->
    <!-- 1. DIRECTOR (R&D) TAB -->
    <!-- ============================================================== -->
    <?php if ($tab === 'DirectorRD'): ?>
      <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-header bg-white py-3 px-4 d-flex align-items-center justify-content-between border-bottom">
          <div>
            <h5 class="fw-bold text-dark mb-0">
              <i class="fa-solid fa-user-tie text-primary me-2"></i> Director (R&amp;D) Profile &amp; Message Editor
            </h5>
            <small class="text-muted">Live on <code>Research/Director_Research_And_Development.php</code></small>
          </div>
          <span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill">Active Live Profile</span>
        </div>
        <div class="card-body p-4">
          <form method="POST" action="research.php?tab=DirectorRD" enctype="multipart/form-data">
            <input type="hidden" name="action" value="save_director_rd">
            <input type="hidden" name="existing_photo" value="<?php echo htmlspecialchars($directorInfo['photo'] ?? ''); ?>">

            <div class="row g-4">
              <div class="col-lg-3 text-center border-end pe-lg-4">
                <label class="form-label fw-bold text-dark d-block">Director Portrait</label>
                <div class="mb-3">
                  <img src="../<?php echo htmlspecialchars(ltrim($directorInfo['photo'] ?? 'assets/images/research/h.k.SHARMA_05042022_1258.jpg', '/')); ?>" alt="Director Photo" class="img-fluid rounded-3 border shadow-sm" style="max-height: 220px; width: auto; object-fit: cover;">
                </div>
                <div class="text-start">
                  <label class="form-label small fw-bold text-secondary">Change Photo (JPG, PNG, WEBP):</label>
                  <input type="file" name="photo_file" class="form-control form-control-sm" accept=".jpg,.jpeg,.png,.webp">
                  <small class="text-muted extra-small d-block mt-1">Leave empty to keep existing photo.</small>
                </div>
              </div>

              <div class="col-lg-9 ps-lg-4">
                <div class="row g-3">
                  <div class="col-md-6">
                    <label class="form-label fw-bold text-dark">Director Full Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" required value="<?php echo htmlspecialchars($directorInfo['name'] ?? 'Dr. Hemant Kumar Sharma'); ?>">
                  </div>
                  <div class="col-md-6">
                    <label class="form-label fw-bold text-dark">Designation Title <span class="text-danger">*</span></label>
                    <input type="text" name="designation" class="form-control" required value="<?php echo htmlspecialchars($directorInfo['designation'] ?? 'Director (R & D)'); ?>">
                  </div>
                  <div class="col-12">
                    <label class="form-label fw-bold text-dark">University / Affiliation Line</label>
                    <input type="text" name="university" class="form-control" value="<?php echo htmlspecialchars($directorInfo['university'] ?? 'Sri Satya Sai University of Technology & Medical Sciences'); ?>">
                  </div>
                  <div class="col-12">
                    <label class="form-label fw-bold text-dark">Highlighted Quote / Excerpt</label>
                    <textarea name="quote" class="form-control" rows="3" placeholder="Enter key quote..."><?php echo htmlspecialchars($directorInfo['quote'] ?? ''); ?></textarea>
                  </div>
                  <div class="col-12">
                    <label class="form-label fw-bold text-dark">Full Message Content (HTML paragraphs)</label>
                    <textarea name="message" class="form-control font-monospace small" rows="10" placeholder="Detailed message paragraphs..."><?php echo htmlspecialchars($directorInfo['message'] ?? ''); ?></textarea>
                  </div>
                </div>

                <div class="mt-4 pt-3 border-top d-flex align-items-center gap-2">
                  <button type="submit" class="btn btn-primary fw-bold px-4 py-2 rounded-pill shadow-sm">
                    <i class="fa fa-save me-1"></i> Save Live Changes
                  </button>
                  <a href="../Research/Director_Research_And_Development.php" target="_blank" class="btn btn-outline-secondary rounded-pill px-3">
                    <i class="fa fa-arrow-up-right-from-square me-1"></i> View Live Page
                  </a>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>

    <!-- ============================================================== -->
    <!-- 2. R & D CELL TAB -->
    <!-- ============================================================== -->
    <?php elseif ($tab === 'RAndDCell'): ?>
      <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-header bg-white py-3 px-4 d-flex align-items-center justify-content-between border-bottom">
          <div>
            <h5 class="fw-bold text-dark mb-0">
              <i class="fa-solid fa-atom text-primary me-2"></i> R &amp; D Cell Content Editor
            </h5>
            <small class="text-muted">Live on <code>Research/RAndDCell.php</code></small>
          </div>
          <span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill">Active Live Page</span>
        </div>
        <div class="card-body p-4">
          <form method="POST" action="research.php?tab=RAndDCell">
            <input type="hidden" name="action" value="save_rd_cell">

            <div class="row g-3 mb-4">
              <div class="col-12">
                <label class="form-label fw-bold text-dark">Page Header Title</label>
                <input type="text" name="title" class="form-control" value="<?php echo htmlspecialchars($rdCellInfo['title'] ?? 'RESEARCH & DEVELOPMENT (R&D) CELL'); ?>">
              </div>
              <div class="col-12">
                <label class="form-label fw-bold text-dark">Overview of R&amp;D Operations (Preamble / HTML)</label>
                <textarea name="preamble" class="form-control font-monospace small" rows="8" placeholder="Enter overview text..."><?php echo htmlspecialchars($rdCellInfo['preamble'] ?? ''); ?></textarea>
              </div>
              <div class="col-12">
                <label class="form-label fw-bold text-dark">Objectives of the R&amp;D Cell <span class="text-muted fw-normal">(One objective per line)</span></label>
                <textarea name="objectives" class="form-control small" rows="8" placeholder="Enter each objective on a new line..."><?php 
                  $objs = $rdCellInfo['objectives'] ?? [];
                  echo htmlspecialchars(is_array($objs) ? implode("\n", $objs) : $objs);
                ?></textarea>
                <small class="text-muted">Every new line will appear numbered automatically on the live page.</small>
              </div>
            </div>

            <div class="pt-3 border-top d-flex align-items-center gap-2">
              <button type="submit" class="btn btn-primary fw-bold px-4 py-2 rounded-pill shadow-sm">
                <i class="fa fa-save me-1"></i> Save Live Changes
              </button>
              <a href="../Research/RAndDCell.php" target="_blank" class="btn btn-outline-secondary rounded-pill px-3">
                <i class="fa fa-arrow-up-right-from-square me-1"></i> View Live Page
              </a>
            </div>
          </form>
        </div>
      </div>

    <!-- ============================================================== -->
    <!-- 3. CONSULTANCY SERVICES TAB -->
    <!-- ============================================================== -->
    <?php elseif ($tab === 'ConsultancyServices'): ?>
      <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-header bg-white py-3 px-4 d-flex align-items-center justify-content-between border-bottom">
          <div>
            <h5 class="fw-bold text-dark mb-0">
              <i class="fa-solid fa-briefcase text-primary me-2"></i> Consultancy Services Editor
            </h5>
            <small class="text-muted">Live on <code>Research/ConsultancyServices.php</code></small>
          </div>
          <span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill">Active Live Page</span>
        </div>
        <div class="card-body p-4">
          <form method="POST" action="research.php?tab=ConsultancyServices">
            <input type="hidden" name="action" value="save_consultancy">

            <div class="row g-3 mb-4">
              <div class="col-md-6">
                <label class="form-label fw-bold text-dark">Page Banner Title</label>
                <input type="text" name="title" class="form-control" value="<?php echo htmlspecialchars($csInfo['title'] ?? 'CONSULTANCY SERVICES'); ?>">
              </div>
              <div class="col-md-6">
                <label class="form-label fw-bold text-dark">Subtitle / Tagline</label>
                <input type="text" name="subtitle" class="form-control" value="<?php echo htmlspecialchars($csInfo['subtitle'] ?? 'Transferring Academic Knowledge & Infrastructure for Industrial Solutions'); ?>">
              </div>
              <div class="col-12">
                <label class="form-label fw-bold text-dark">Institutional Vision &amp; Background</label>
                <textarea name="intro" class="form-control" rows="4"><?php echo htmlspecialchars($csInfo['intro'] ?? ''); ?></textarea>
              </div>
              <div class="col-md-6">
                <label class="form-label fw-bold text-dark">Resource Sharing Policy Clause</label>
                <textarea name="resource_sharing" class="form-control" rows="3"><?php echo htmlspecialchars($csInfo['resource_sharing'] ?? ''); ?></textarea>
              </div>
              <div class="col-md-6">
                <label class="form-label fw-bold text-dark">Sharing Policy (60:40 Ratio) Details</label>
                <textarea name="revenue_sharing" class="form-control" rows="3"><?php echo htmlspecialchars($csInfo['revenue_sharing'] ?? ''); ?></textarea>
              </div>
              <div class="col-12">
                <label class="form-label fw-bold text-dark">Consultancy Process &amp; Nodal Agency (SOP)</label>
                <textarea name="process_sop" class="form-control" rows="5"><?php echo htmlspecialchars($csInfo['process_sop'] ?? ''); ?></textarea>
              </div>
              <div class="col-md-6">
                <label class="form-label fw-bold text-dark">Objectives of Consultancy Services <span class="text-muted fw-normal">(One per line)</span></label>
                <textarea name="objectives" class="form-control small" rows="6"><?php 
                  $cObjs = $csInfo['objectives'] ?? [];
                  echo htmlspecialchars(is_array($cObjs) ? implode("\n", $cObjs) : $cObjs);
                ?></textarea>
              </div>
              <div class="col-md-6">
                <label class="form-label fw-bold text-dark">Partner Agencies / Organisations <span class="text-muted fw-normal">(One per line)</span></label>
                <textarea name="partners" class="form-control small" rows="6"><?php 
                  $cPartners = $csInfo['partners'] ?? [];
                  echo htmlspecialchars(is_array($cPartners) ? implode("\n", $cPartners) : $cPartners);
                ?></textarea>
              </div>
            </div>

            <div class="pt-3 border-top d-flex align-items-center gap-2">
              <button type="submit" class="btn btn-primary fw-bold px-4 py-2 rounded-pill shadow-sm">
                <i class="fa fa-save me-1"></i> Save Live Changes
              </button>
              <a href="../Research/ConsultancyServices.php" target="_blank" class="btn btn-outline-secondary rounded-pill px-3">
                <i class="fa fa-arrow-up-right-from-square me-1"></i> View Live Page
              </a>
            </div>
          </form>
        </div>
      </div>

    <!-- ============================================================== -->
    <!-- 4. COLLABORATION & MOU TAB -->
    <!-- ============================================================== -->
    <?php elseif ($tab === 'CollaborationandMou'): ?>
      <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-header bg-white py-3 px-4 d-flex align-items-center justify-content-between border-bottom">
          <div>
            <h5 class="fw-bold text-dark mb-0">
              <i class="fa-solid fa-handshake text-primary me-2"></i> Collaboration &amp; MoU Editor
            </h5>
            <small class="text-muted">Live on <code>Research/CollaborationandMou.php</code></small>
          </div>
          <span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill">Active Live Page</span>
        </div>
        <div class="card-body p-4">
          <form method="POST" action="research.php?tab=CollaborationandMou">
            <input type="hidden" name="action" value="save_mou">

            <div class="row g-3 mb-4">
              <div class="col-md-6">
                <label class="form-label fw-bold text-dark">Page Title</label>
                <input type="text" name="title" class="form-control" value="<?php echo htmlspecialchars($mouInfo['title'] ?? 'COLLABORATIONS & MEMORANDUMS OF UNDERSTANDING'); ?>">
              </div>
              <div class="col-md-6">
                <label class="form-label fw-bold text-dark">Subtitle</label>
                <input type="text" name="subtitle" class="form-control" value="<?php echo htmlspecialchars($mouInfo['subtitle'] ?? 'Fostering National & International Academic, Research, and Industrial Synergies'); ?>">
              </div>
              <div class="col-12">
                <label class="form-label fw-bold text-dark">Collaboration &amp; MoU Overview (HTML)</label>
                <textarea name="overview" class="form-control font-monospace small" rows="5"><?php echo htmlspecialchars($mouInfo['overview'] ?? ''); ?></textarea>
              </div>
              <div class="col-md-6">
                <label class="form-label fw-bold text-dark">Joint R&amp;D Projects Description</label>
                <textarea name="joint_rd" class="form-control" rows="3"><?php echo htmlspecialchars($mouInfo['joint_rd'] ?? ''); ?></textarea>
              </div>
              <div class="col-md-6">
                <label class="form-label fw-bold text-dark">Industrial Training &amp; Internships Description</label>
                <textarea name="industrial_training" class="form-control" rows="3"><?php echo htmlspecialchars($mouInfo['industrial_training'] ?? ''); ?></textarea>
              </div>
              <div class="col-md-6">
                <label class="form-label fw-bold text-dark">Faculty &amp; Scholar Exchange Description</label>
                <textarea name="faculty_exchange" class="form-control" rows="3"><?php echo htmlspecialchars($mouInfo['faculty_exchange'] ?? ''); ?></textarea>
              </div>
              <div class="col-md-6">
                <label class="form-label fw-bold text-dark">Technology Commercialization Description</label>
                <textarea name="tech_comm" class="form-control" rows="3"><?php echo htmlspecialchars($mouInfo['tech_comm'] ?? ''); ?></textarea>
              </div>
            </div>

            <div class="pt-3 border-top d-flex align-items-center gap-2">
              <button type="submit" class="btn btn-primary fw-bold px-4 py-2 rounded-pill shadow-sm">
                <i class="fa fa-save me-1"></i> Save Live Changes
              </button>
              <a href="../Research/CollaborationandMou.php" target="_blank" class="btn btn-outline-secondary rounded-pill px-3">
                <i class="fa fa-arrow-up-right-from-square me-1"></i> View Live Page
              </a>
            </div>
          </form>
        </div>
      </div>

    <!-- ============================================================== -->
    <!-- 5. IIC CELL TAB -->
    <!-- ============================================================== -->
    <?php elseif ($tab === 'Iic_Cell'): ?>
      <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-header bg-white py-3 px-4 d-flex align-items-center justify-content-between border-bottom">
          <div>
            <h5 class="fw-bold text-dark mb-0">
              <i class="fa-solid fa-rocket text-primary me-2"></i> Institution's Innovation Council (IIC) Editor
            </h5>
            <small class="text-muted">Live on <code>Research/Iic_Cell.php</code></small>
          </div>
          <span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill">Active Live Page</span>
        </div>
        <div class="card-body p-4">
          <form method="POST" action="research.php?tab=Iic_Cell" enctype="multipart/form-data">
            <input type="hidden" name="action" value="save_iic">

            <div class="row g-3 mb-4">
              <div class="col-md-6">
                <label class="form-label fw-bold text-dark">Page Title</label>
                <input type="text" name="title" class="form-control" value="<?php echo htmlspecialchars($iicInfo['title'] ?? 'INSTITUTION\'S INNOVATION COUNCIL (IIC) CELL'); ?>">
              </div>
              <div class="col-md-6">
                <label class="form-label fw-bold text-dark">Subtitle</label>
                <input type="text" name="subtitle" class="form-control" value="<?php echo htmlspecialchars($iicInfo['subtitle'] ?? 'Fostering Entrepreneurship, Student Start-ups & Intellectual Property Awareness'); ?>">
              </div>
              <div class="col-12">
                <label class="form-label fw-bold text-dark">IIC Vision</label>
                <input type="text" name="vision" class="form-control" value="<?php echo htmlspecialchars($iicInfo['vision'] ?? 'To promote innovation, entrepreneurial skills, and the growth of student start-ups.'); ?>">
              </div>
              <div class="col-12">
                <label class="form-label fw-bold text-dark">IIC Missions <span class="text-muted fw-normal">(One mission per line)</span></label>
                <textarea name="missions" class="form-control" rows="4"><?php 
                  $msns = $iicInfo['missions'] ?? [];
                  echo htmlspecialchars(is_array($msns) ? implode("\n", $msns) : $msns);
                ?></textarea>
              </div>
            </div>

            <!-- Gallery Upload Section -->
            <div class="form-section-title">
              <i class="fa-solid fa-images text-warning"></i> Upload New Certificate / Event Photo
            </div>
            <div class="row g-3 mb-4 p-3 bg-light rounded-3 border">
              <div class="col-md-6">
                <label class="form-label fw-bold small">Photo / Certificate Caption</label>
                <input type="text" name="gallery_caption" class="form-control form-control-sm" placeholder="e.g. National IP Awareness Workshop">
              </div>
              <div class="col-md-6">
                <label class="form-label fw-bold small">Choose Image File (JPG, PNG, WEBP)</label>
                <input type="file" name="gallery_file" class="form-control form-control-sm" accept=".jpg,.jpeg,.png,.webp">
              </div>
            </div>

            <!-- Existing Gallery Grid -->
            <div class="form-section-title">
              <i class="fa-solid fa-photo-film text-warning"></i> Current Gallery Items (<?php echo count($iicInfo['gallery'] ?? []); ?>)
            </div>
            <div class="row g-3 mb-4">
              <?php if (!empty($iicInfo['gallery']) && is_array($iicInfo['gallery'])): ?>
                <?php foreach ($iicInfo['gallery'] as $gIdx => $gItem): 
                  $imgSrc = !empty($gItem['image']) ? $gItem['image'] : '';
                  if (!preg_match('#^https?://#i', $imgSrc)) {
                    $imgSrc = '../' . ltrim($imgSrc, '/');
                  }
                ?>
                  <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100 border shadow-sm">
                      <img src="<?php echo htmlspecialchars($imgSrc); ?>" class="card-img-top" style="height: 140px; object-fit: cover;" alt="Gallery Photo">
                      <div class="card-body p-2 d-flex flex-column justify-content-between">
                        <small class="fw-bold text-dark text-truncate d-block mb-2"><?php echo htmlspecialchars($gItem['title'] ?? 'Event'); ?></small>
                        <a href="research.php?tab=Iic_Cell&action=delete_iic_photo&index=<?php echo $gIdx; ?>" class="btn btn-sm btn-outline-danger w-100" onclick="return confirm('Remove this photo?');">
                          <i class="fa fa-trash me-1"></i> Remove
                        </a>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              <?php endif; ?>
            </div>

            <div class="pt-3 border-top d-flex align-items-center gap-2">
              <button type="submit" class="btn btn-primary fw-bold px-4 py-2 rounded-pill shadow-sm">
                <i class="fa fa-save me-1"></i> Save Live Changes
              </button>
              <a href="../Research/Iic_Cell.php" target="_blank" class="btn btn-outline-secondary rounded-pill px-3">
                <i class="fa fa-arrow-up-right-from-square me-1"></i> View Live Page
              </a>
            </div>
          </form>
        </div>
      </div>

    <!-- ============================================================== -->
    <!-- 6. EXPOSITION TAB -->
    <!-- ============================================================== -->
    <?php elseif ($tab === 'Exposition'): ?>
      <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-header bg-white py-3 px-4 d-flex align-items-center justify-content-between border-bottom">
          <div>
            <h5 class="fw-bold text-dark mb-0">
              <i class="fa-solid fa-wand-magic-sparkles text-primary me-2"></i> Exposition: Annual Innovation Fest Editor
            </h5>
            <small class="text-muted">Live on <code>Research/Exposition.php</code></small>
          </div>
          <span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill">Active Live Page</span>
        </div>
        <div class="card-body p-4">
          <form method="POST" action="research.php?tab=Exposition">
            <input type="hidden" name="action" value="save_exposition">

            <div class="row g-3 mb-4">
              <div class="col-md-6">
                <label class="form-label fw-bold text-dark">Page Title</label>
                <input type="text" name="title" class="form-control" value="<?php echo htmlspecialchars($expInfo['title'] ?? 'EXPOSITION: A CARNIVAL OF INNOVATION'); ?>">
              </div>
              <div class="col-md-6">
                <label class="form-label fw-bold text-dark">Subtitle</label>
                <input type="text" name="subtitle" class="form-control" value="<?php echo htmlspecialchars($expInfo['subtitle'] ?? 'Annual Mega Exhibition of Student Creativity, Robotics, Drones & Project Innovations'); ?>">
              </div>
              <div class="col-12">
                <label class="form-label fw-bold text-dark">Introduction Paragraph</label>
                <textarea name="intro" class="form-control" rows="3"><?php echo htmlspecialchars($expInfo['intro'] ?? ''); ?></textarea>
              </div>
              <div class="col-12">
                <label class="form-label fw-bold text-dark">Detailed Body / Legacy Text (HTML allowed)</label>
                <textarea name="body" class="form-control font-monospace small" rows="6"><?php echo htmlspecialchars($expInfo['body'] ?? ''); ?></textarea>
              </div>
              <div class="col-12">
                <label class="form-label fw-bold text-dark">Highlight Quote</label>
                <input type="text" name="quote" class="form-control" value="<?php echo htmlspecialchars($expInfo['quote'] ?? 'Exposition is in true sense the carnival of innovations.'); ?>">
              </div>
              <div class="col-md-6">
                <label class="form-label fw-bold text-dark">Nukkad Nataks (Street Plays) Description</label>
                <textarea name="highlight_nukkad" class="form-control" rows="3"><?php echo htmlspecialchars($expInfo['highlight_nukkad'] ?? ''); ?></textarea>
              </div>
              <div class="col-md-6">
                <label class="form-label fw-bold text-dark">Robotics &amp; Robo-Wars Description</label>
                <textarea name="highlight_robotics" class="form-control" rows="3"><?php echo htmlspecialchars($expInfo['highlight_robotics'] ?? ''); ?></textarea>
              </div>
              <div class="col-md-6">
                <label class="form-label fw-bold text-dark">Drone &amp; Aero Competitions Description</label>
                <textarea name="highlight_drones" class="form-control" rows="3"><?php echo htmlspecialchars($expInfo['highlight_drones'] ?? ''); ?></textarea>
              </div>
              <div class="col-md-6">
                <label class="form-label fw-bold text-dark">Project Innovations &amp; Stalls Description</label>
                <textarea name="highlight_stalls" class="form-control" rows="3"><?php echo htmlspecialchars($expInfo['highlight_stalls'] ?? ''); ?></textarea>
              </div>
            </div>

            <div class="pt-3 border-top d-flex align-items-center gap-2">
              <button type="submit" class="btn btn-primary fw-bold px-4 py-2 rounded-pill shadow-sm">
                <i class="fa fa-save me-1"></i> Save Live Changes
              </button>
              <a href="../Research/Exposition.php" target="_blank" class="btn btn-outline-secondary rounded-pill px-3">
                <i class="fa fa-arrow-up-right-from-square me-1"></i> View Live Page
              </a>
            </div>
          </form>
        </div>
      </div>

    <!-- ============================================================== -->
    <!-- 7. UG & PG SCHOLARS PROJECT TAB -->
    <!-- ============================================================== -->
    <?php elseif ($tab === 'UGAndPGScholarsProject'): ?>
      <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-header bg-white py-3 px-4 d-flex align-items-center justify-content-between border-bottom">
          <div>
            <h5 class="fw-bold text-dark mb-0">
              <i class="fa-solid fa-graduation-cap text-primary me-2"></i> UG &amp; PG Scholars Project Editor
            </h5>
            <small class="text-muted">Live on <code>Research/UGAndPGScholarsProject.php</code></small>
          </div>
          <span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill">Active Live Page</span>
        </div>
        <div class="card-body p-4">
          <form method="POST" action="research.php?tab=UGAndPGScholarsProject">
            <input type="hidden" name="action" value="save_ugpg">

            <div class="row g-3 mb-4">
              <div class="col-md-6">
                <label class="form-label fw-bold text-dark">Page Title</label>
                <input type="text" name="title" class="form-control" value="<?php echo htmlspecialchars($ugpgInfo['title'] ?? 'UG & PG SCHOLARS PROJECT'); ?>">
              </div>
              <div class="col-md-6">
                <label class="form-label fw-bold text-dark">Subtitle</label>
                <input type="text" name="subtitle" class="form-control" value="<?php echo htmlspecialchars($ugpgInfo['subtitle'] ?? 'Nurturing Early Curiosity, Scientific Methodology & Student Research Papers'); ?>">
              </div>
              <div class="col-12">
                <label class="form-label fw-bold text-dark">Research Philosophy &amp; Objective (HTML paragraphs)</label>
                <textarea name="philosophy" class="form-control font-monospace small" rows="8"><?php echo htmlspecialchars($ugpgInfo['philosophy'] ?? ''); ?></textarea>
              </div>
              <div class="col-md-8">
                <label class="form-label fw-bold text-dark">Inspiring Quote Text</label>
                <input type="text" name="quote_text" class="form-control" value="<?php echo htmlspecialchars($ugpgInfo['quote_text'] ?? 'Excellence is a continuous process and not an accident.'); ?>">
              </div>
              <div class="col-md-4">
                <label class="form-label fw-bold text-dark">Quote Author</label>
                <input type="text" name="quote_author" class="form-control" value="<?php echo htmlspecialchars($ugpgInfo['quote_author'] ?? 'Dr. A.P.J. Abdul Kalam'); ?>">
              </div>
              <div class="col-12">
                <label class="form-label fw-bold text-dark">Compendium Notice Text</label>
                <textarea name="notice" class="form-control" rows="3"><?php echo htmlspecialchars($ugpgInfo['notice'] ?? ''); ?></textarea>
              </div>
            </div>

            <div class="pt-3 border-top d-flex align-items-center gap-2">
              <button type="submit" class="btn btn-primary fw-bold px-4 py-2 rounded-pill shadow-sm">
                <i class="fa fa-save me-1"></i> Save Live Changes
              </button>
              <a href="../Research/UGAndPGScholarsProject.php" target="_blank" class="btn btn-outline-secondary rounded-pill px-3">
                <i class="fa fa-arrow-up-right-from-square me-1"></i> View Live Page
              </a>
            </div>
          </form>
        </div>
      </div>

    <!-- ============================================================== -->
    <!-- 8. NPTEL TAB -->
    <!-- ============================================================== -->
    <?php elseif ($tab === 'NPTEL'): ?>
      <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-header bg-white py-3 px-4 d-flex align-items-center justify-content-between border-bottom">
          <div>
            <h5 class="fw-bold text-dark mb-0">
              <i class="fa-solid fa-laptop-code text-primary me-2"></i> NPTEL Local Chapter Editor
            </h5>
            <small class="text-muted">Live on <code>Research/NPTEL.php</code></small>
          </div>
          <span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill">Active Live Page</span>
        </div>
        <div class="card-body p-4">
          <form method="POST" action="research.php?tab=NPTEL">
            <input type="hidden" name="action" value="save_nptel">

            <div class="row g-3 mb-4">
              <div class="col-md-6">
                <label class="form-label fw-bold text-dark">Page Title</label>
                <input type="text" name="title" class="form-control" value="<?php echo htmlspecialchars($nptelInfo['title'] ?? 'NATIONAL PROGRAMME ON TECHNOLOGY ENHANCED LEARNING (NPTEL)'); ?>">
              </div>
              <div class="col-md-6">
                <label class="form-label fw-bold text-dark">SWAYAM / NPTEL Portal URL</label>
                <input type="url" name="portal_url" class="form-control" value="<?php echo htmlspecialchars($nptelInfo['portal_url'] ?? 'https://onlinecourses.nptel.ac.in/'); ?>">
              </div>
              <div class="col-12">
                <label class="form-label fw-bold text-dark">About NPTEL Description (HTML paragraphs)</label>
                <textarea name="about_text" class="form-control font-monospace small" rows="6"><?php echo htmlspecialchars($nptelInfo['about_text'] ?? ''); ?></textarea>
              </div>
              <div class="col-12">
                <label class="form-label fw-bold text-dark">Important Guidelines While Enrolling <span class="text-muted fw-normal">(One rule per line)</span></label>
                <textarea name="guidelines" class="form-control small" rows="5"><?php 
                  $gl = $nptelInfo['guidelines'] ?? [];
                  echo htmlspecialchars(is_array($gl) ? implode("\n", $gl) : $gl);
                ?></textarea>
              </div>
              <div class="col-12">
                <label class="form-label fw-bold text-dark">Important NPTEL Links <span class="text-muted fw-normal">(One per line in format: <code>Link Title | URL</code>)</span></label>
                <textarea name="links_raw" class="form-control font-monospace small" rows="5" placeholder="Video on How to Enroll | http://nptel.ac.in/videos.php"><?php 
                  $lnks = $nptelInfo['links'] ?? [];
                  $lines = [];
                  if (is_array($lnks)) {
                    foreach ($lnks as $lnk) {
                      $lines[] = ($lnk['title'] ?? '') . ' | ' . ($lnk['url'] ?? '#');
                    }
                  }
                  echo htmlspecialchars(implode("\n", $lines));
                ?></textarea>
              </div>
            </div>

            <div class="pt-3 border-top d-flex align-items-center gap-2">
              <button type="submit" class="btn btn-primary fw-bold px-4 py-2 rounded-pill shadow-sm">
                <i class="fa fa-save me-1"></i> Save Live Changes
              </button>
              <a href="../Research/NPTEL.php" target="_blank" class="btn btn-outline-secondary rounded-pill px-3">
                <i class="fa fa-arrow-up-right-from-square me-1"></i> View Live Page
              </a>
            </div>
          </form>
        </div>
      </div>

    <!-- ============================================================== -->
    <!-- 9. TABLE TABS (CouncilForResearch, ResearchPolicies, ResearchPatents, ResearchEResources) -->
    <!-- ============================================================== -->
    <?php else: ?>
      <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-header bg-white py-3 px-4 d-flex align-items-center justify-content-between border-bottom">
          <div>
            <h5 class="fw-bold text-dark mb-0">
              <i class="fa-solid <?php echo $tabIcons[$tab] ?? 'fa-list-check'; ?> text-primary me-2"></i> <?php echo $validTabs[$tab]; ?>
            </h5>
            <small class="text-muted">Live on <code>Research/<?php echo $activeFrontend; ?></code></small>
          </div>
          <span class="badge bg-primary px-3 py-2 rounded-pill"><?php echo count($currentDocs); ?> Entries</span>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
              <thead class="table-light">
                <tr>
                  <th style="width: 5%;">#</th>
                  <th style="width: <?php echo ($tab === 'ResearchPatents') ? '35%' : '45%'; ?>;">Title / Details</th>
                  <th style="width: 15%;">Category</th>
                  <?php if ($tab === 'ResearchPatents'): ?>
                    <th style="width: 20%;">App / Patent No.</th>
                  <?php endif; ?>
                  <th style="width: 12%;">Status</th>
                  <th style="width: 13%; text-align: center;">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php if (empty($currentDocs)): ?>
                  <tr>
                    <td colspan="<?php echo ($tab === 'ResearchPatents') ? 6 : 5; ?>" class="text-center py-5 text-muted">
                      <i class="fa-solid fa-folder-open fa-2x mb-2 d-block text-secondary"></i>
                      No records found in this section.
                    </td>
                  </tr>
                <?php else: ?>
                  <?php foreach ($currentDocs as $idx => $doc): 
                    $docId = $doc['id'] ?? $idx;
                    $title = $doc['title'] ?? '';
                    $cat = $doc['category'] ?? 'General';
                    $file = $doc['file'] ?? '#';
                    $status = $doc['status'] ?? 'Active';
                    $inventors = $doc['inventors'] ?? '';
                    $appNo = $doc['app_no'] ?? '';
                    $desc = $doc['desc'] ?? '';
                  ?>
                    <tr>
                      <td><?php echo $idx + 1; ?></td>
                      <td>
                        <div class="fw-bold text-dark"><?php echo htmlspecialchars($title); ?></div>
                        <?php if (!empty($inventors)): ?>
                          <div class="small text-muted"><i class="fa-solid fa-users me-1"></i> <?php echo htmlspecialchars($inventors); ?></div>
                        <?php endif; ?>
                        <?php if (!empty($desc) && empty($inventors)): ?>
                          <div class="small text-muted text-truncate" style="max-width: 450px;"><?php echo htmlspecialchars($desc); ?></div>
                        <?php endif; ?>
                      </td>
                      <td><span class="badge bg-light text-dark border"><?php echo htmlspecialchars($cat); ?></span></td>
                      <?php if ($tab === 'ResearchPatents'): ?>
                        <td><code><?php echo htmlspecialchars($appNo ?: 'N/A'); ?></code></td>
                      <?php endif; ?>
                      <td>
                        <span class="badge bg-success-subtle text-success"><?php echo htmlspecialchars($status); ?></span>
                      </td>
                      <td class="text-center">
                        <div class="d-inline-flex gap-1">
                          <?php if ($file !== '#' && !empty($file)): ?>
                            <a href="<?php echo (strpos($file, 'http') === 0) ? htmlspecialchars($file) : BASE_URL . ltrim($file, '/'); ?>" target="_blank" class="btn btn-sm btn-outline-primary" title="View Link / File">
                              <i class="fa fa-external-link"></i>
                            </a>
                          <?php endif; ?>
                          <button type="button" class="btn btn-sm btn-outline-secondary" onclick="editDoc(<?php echo htmlspecialchars(json_encode($doc)); ?>)" title="Edit">
                            <i class="fa fa-edit"></i>
                          </button>
                          <a href="research.php?tab=<?php echo $tab; ?>&action=delete&id=<?php echo urlencode($docId); ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to remove this item?');" title="Delete">
                            <i class="fa fa-trash"></i>
                          </a>
                        </div>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    <?php endif; ?>

  </div>
</main>

<!-- ADD / EDIT MODAL FOR TABLE TABS -->
<div class="modal fade" id="addDocModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content border-0 shadow rounded-4">
      <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="action" value="save_doc">
        <input type="hidden" name="page_key" value="<?php echo $tab; ?>">
        <input type="hidden" name="doc_id" id="modalDocId" value="">

        <div class="modal-header bg-light border-bottom">
          <h5 class="modal-title fw-bold text-dark" id="modalTitleText">
            <i class="fa fa-plus text-primary me-2"></i> Add Record to <?php echo htmlspecialchars($validTabs[$tab]); ?>
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body p-4">
          <div class="mb-3">
            <label class="form-label fw-bold">Title / Name <span class="text-danger">*</span></label>
            <input type="text" name="title" id="modalDocTitle" class="form-control" required placeholder="Enter title, member name, or patent title">
          </div>

          <div class="row g-3 mb-3">
            <div class="col-md-6">
              <label class="form-label fw-bold">Category</label>
              <input type="text" name="category" id="modalDocCategory" class="form-control" list="catSuggestions" placeholder="Select or type category">
              <datalist id="catSuggestions">
                <?php if ($tab === 'CouncilForResearch'): ?>
                  <option value="Executive Committee">
                  <option value="Advisory Board">
                <?php elseif ($tab === 'ResearchPolicies'): ?>
                  <option value="Research Promotion Policy">
                  <option value="Ethics Guidelines">
                  <option value="Seed Money Scheme">
                <?php elseif ($tab === 'ResearchPatents'): ?>
                  <option value="Granted Patents">
                  <option value="Published (2023-2024)">
                  <option value="Published (2022-2023)">
                <?php elseif ($tab === 'ResearchEResources'): ?>
                  <option value="Free Domain Books">
                  <option value="Academic E-Content">
                <?php endif; ?>
              </datalist>
            </div>
            <div class="col-md-6">
              <label class="form-label fw-bold">Status</label>
              <select name="status" id="modalDocStatus" class="form-select">
                <option value="Active">Active</option>
                <option value="Published">Published</option>
                <option value="Granted">Granted</option>
                <option value="Archived">Archived</option>
              </select>
            </div>
          </div>

          <?php if ($tab === 'ResearchPatents'): ?>
            <div class="row g-3 mb-3">
              <div class="col-md-6">
                <label class="form-label fw-bold">Inventors Name</label>
                <input type="text" name="inventors" id="modalInventors" class="form-control" placeholder="Names of inventors">
              </div>
              <div class="col-md-6">
                <label class="form-label fw-bold">Application / Patent Number</label>
                <input type="text" name="app_no" id="modalAppNo" class="form-control" placeholder="e.g. 202341012345">
              </div>
            </div>
          <?php endif; ?>

          <div class="mb-3">
            <label class="form-label fw-bold">External Link or File Path (optional)</label>
            <input type="text" name="file_url" id="modalFileUrl" class="form-control" placeholder="https://... or assets/uploads/...">
          </div>

          <div class="mb-3">
            <label class="form-label fw-bold">Or Upload PDF / Document File</label>
            <input type="file" name="doc_file" class="form-control" accept=".pdf,.doc,.docx,.xls,.xlsx,.zip,.jpg,.png">
            <div class="form-text small">Accepted: PDF, Word, Excel, JPG, PNG</div>
          </div>

          <div class="mb-3">
            <label class="form-label fw-bold">Description / Notes</label>
            <textarea name="desc" id="modalDesc" class="form-control" rows="2" placeholder="Brief notes or description"></textarea>
          </div>
        </div>
        <div class="modal-footer bg-light border-top">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary fw-bold px-4">Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
function editDoc(doc) {
  document.getElementById('modalTitleText').innerHTML = '<i class="fa fa-edit text-primary me-2"></i> Edit Record';
  document.getElementById('modalDocId').value = doc.id || '';
  document.getElementById('modalDocTitle').value = doc.title || '';
  document.getElementById('modalDocCategory').value = doc.category || '';
  document.getElementById('modalDocStatus').value = doc.status || 'Active';
  document.getElementById('modalFileUrl').value = (doc.file && doc.file !== '#') ? doc.file : '';
  if (document.getElementById('modalInventors')) {
    document.getElementById('modalInventors').value = doc.inventors || '';
  }
  if (document.getElementById('modalAppNo')) {
    document.getElementById('modalAppNo').value = doc.app_no || '';
  }
  if (document.getElementById('modalDesc')) {
    document.getElementById('modalDesc').value = doc.desc || '';
  }
  
  const modal = new bootstrap.Modal(document.getElementById('addDocModal'));
  modal.show();
}

const addModalEl = document.getElementById('addDocModal');
if (addModalEl) {
  addModalEl.addEventListener('hidden.bs.modal', function() {
    document.getElementById('modalTitleText').innerHTML = '<i class="fa fa-plus text-primary me-2"></i> Add Record';
    document.getElementById('modalDocId').value = '';
    document.getElementById('modalDocTitle').value = '';
    document.getElementById('modalFileUrl').value = '';
    if (document.getElementById('modalInventors')) document.getElementById('modalInventors').value = '';
    if (document.getElementById('modalAppNo')) document.getElementById('modalAppNo').value = '';
    if (document.getElementById('modalDesc')) document.getElementById('modalDesc').value = '';
  });
}
</script>
</body>
</html>
