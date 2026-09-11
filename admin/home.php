<?php
require_once __DIR__ . '/../config.php';
require_admin_auth();

$msg = '';
$activeTab = $_GET['tab'] ?? 'hero';

$default_quick_access = [
    [
        'icon' => 'fa-credit-card',
        'title' => 'Online Fee Payment',
        'desc' => 'Secure gateway for tuition & hostel fees',
        'link' => 'Admission/UniversityAccountDetail.php'
    ],
    [
        'icon' => 'fa-file-lines',
        'title' => 'Examination Portal',
        'desc' => 'Results, timetables & re-evaluation',
        'link' => 'Examination/Interface.php'
    ],
    [
        'icon' => 'fa-book',
        'title' => 'Syllabus & Curriculum',
        'desc' => 'Course-wise updated syllabi',
        'link' => 'Download/OutcomeBasedCurriculum/Engineering.php'
    ],
    [
        'icon' => 'fa-briefcase',
        'title' => 'Placement Records',
        'desc' => 'Recruiters, packages & alumni stories',
        'link' => 'Academic/TrainingAndPlacement/TrainingAndPlacementCell.php'
    ]
];

// Load existing sections
$hero = get_home_section('hero', []);
$loaded_qa = get_home_section('quick_access', []);
$quick_access = [];
for ($i = 0; $i < 4; $i++) {
    $item = $loaded_qa[$i] ?? [];
    $quick_access[] = [
        'icon'  => !empty($item['icon']) ? $item['icon'] : $default_quick_access[$i]['icon'],
        'title' => !empty($item['title']) ? $item['title'] : $default_quick_access[$i]['title'],
        'desc'  => !empty($item['desc']) ? $item['desc'] : $default_quick_access[$i]['desc'],
        'link'  => !empty($item['link']) ? $item['link'] : $default_quick_access[$i]['link']
    ];
}
$stats = get_home_section('stats', []);
$why_sssutms = get_home_section('why_sssutms', []);
$about_vc = get_home_section('about_vc', []);
$press_media = get_home_section('press_media', []);
$institutes = get_home_section('institutes', []);
$recruiters = get_home_section('recruiters', []);
$campus_visit = get_home_section('campus_visit', []);
$latest_updates_header = get_home_section('latest_updates_header', []);
$resource_center = get_home_section('resource_center', []);
$gallery_glimpses = get_home_section('gallery_glimpses', []);
$floating_box = get_home_section('floating_box', []);
$seo = get_home_section('seo', [
    'meta_title' => 'Sri Satya Sai University of Technology & Medical Sciences (SSSUTMS)',
    'meta_description' => 'Welcome to Sri Satya Sai University of Technology and Medical Sciences (SSSUTMS), Sehore (Bhopal, MP). Approved by UGC, AICTE, PCI, NCISM, INC, NCH. Leading University for Engineering, Medical, Pharmacy & Management.',
    'meta_keywords' => 'SSSUTMS, Sri Satya Sai University, Engineering Colleges in MP, Medical Colleges Sehore, Pharmacy, Ayurveda BAMS, BHMS, Admission 2026-27',
    'canonical_url' => '',
    'og_image' => 'assets/images/logo/logo.jpg',
    'og_title' => '',
    'og_description' => '',
    'robots' => 'index, follow'
]);

// Helper for file upload
function handle_home_upload($fileKey, $defaultPath = '') {
    if (isset($_FILES[$fileKey]) && $_FILES[$fileKey]['error'] === UPLOAD_ERR_OK) {
        $allowed = ['jpg', 'jpeg', 'png', 'webp', 'svg', 'gif'];
        $ext = strtolower(pathinfo($_FILES[$fileKey]['name'], PATHINFO_EXTENSION));
        if (in_array($ext, $allowed)) {
            $filename = 'home_' . time() . '_' . rand(100, 999) . '.' . $ext;
            $dest = UPLOAD_DIR . '/home/' . $filename;
            if (move_uploaded_file($_FILES[$fileKey]['tmp_name'], $dest)) {
                return 'assets/uploads/home/' . $filename;
            }
        }
    }
    return $defaultPath;
}

// Form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    // 1. SAVE HERO & QUICK ACCESS
    if ($action === 'save_hero') {
        $activeTab = 'hero';
        $bgImg = handle_home_upload('hero_bg_file', trim($_POST['hero_bg_text'] ?? $hero['background_image']));
        
        $hero['background_image'] = !empty($bgImg) ? $bgImg : ($hero['background_image'] ?? 'assets/images/slider/IMG-20260112-WA0044.jpg');
        $hero['badge_text'] = !empty($_POST['hero_badge_text']) ? clean_input($_POST['hero_badge_text']) : ($hero['badge_text'] ?? 'Admissions Open — Session 2026-27');
        $hero['title_main'] = !empty($_POST['hero_title_main']) ? clean_input($_POST['hero_title_main']) : ($hero['title_main'] ?? 'Shaping Future Leaders Through');
        $hero['title_highlight'] = !empty($_POST['hero_title_highlight']) ? clean_input($_POST['hero_title_highlight']) : ($hero['title_highlight'] ?? 'Excellence & Innovation');
        $hero['desc'] = !empty($_POST['hero_desc']) ? clean_input($_POST['hero_desc']) : ($hero['desc'] ?? 'Empowering students with world-class engineering, medical, ayurveda, pharmacy, and management education across a 100+ acre lush green campus.');
        $hero['btn_primary_text'] = !empty($_POST['hero_btn_primary_text']) ? clean_input($_POST['hero_btn_primary_text']) : ($hero['btn_primary_text'] ?? 'Apply Online 2026-27');
        $hero['btn_primary_link'] = !empty($_POST['hero_btn_primary_link']) ? clean_input($_POST['hero_btn_primary_link']) : ($hero['btn_primary_link'] ?? 'Admission/AdmissionRegistration.php');
        $hero['btn_secondary_text'] = !empty($_POST['hero_btn_secondary_text']) ? clean_input($_POST['hero_btn_secondary_text']) : ($hero['btn_secondary_text'] ?? 'Explore University');
        $hero['btn_secondary_link'] = !empty($_POST['hero_btn_secondary_link']) ? clean_input($_POST['hero_btn_secondary_link']) : ($hero['btn_secondary_link'] ?? 'About/Background.php');
        
        // Mini stats (3 items)
        $hero['mini_stats'] = [
            [
                'icon' => clean_input($_POST['mini_stat_icon_0'] ?? 'fa-building-columns'),
                'num'  => clean_input($_POST['mini_stat_num_0'] ?? '14+'),
                'lbl'  => clean_input($_POST['mini_stat_lbl_0'] ?? 'Institutes')
            ],
            [
                'icon' => clean_input($_POST['mini_stat_icon_1'] ?? 'fa-briefcase'),
                'num'  => clean_input($_POST['mini_stat_num_1'] ?? '100+'),
                'lbl'  => clean_input($_POST['mini_stat_lbl_1'] ?? 'Recruiters')
            ],
            [
                'icon' => clean_input($_POST['mini_stat_icon_2'] ?? 'fa-award'),
                'num'  => clean_input($_POST['mini_stat_num_2'] ?? 'UGC'),
                'lbl'  => clean_input($_POST['mini_stat_lbl_2'] ?? 'Approved')
            ]
        ];

        $hero['enquiry_eyebrow'] = clean_input($_POST['hero_enquiry_eyebrow'] ?? 'Enquire Now');
        $hero['enquiry_title'] = clean_input($_POST['hero_enquiry_title'] ?? 'Admission Enquiry Form');
        $hero['enquiry_sub'] = clean_input($_POST['hero_enquiry_sub'] ?? 'Speak with our academic counselors today.');

        save_home_section('hero', $hero);

        // Quick Access Cards (4 items)
        $new_quick_access = [];
        for ($i = 0; $i < 4; $i++) {
            $inIcon  = clean_input($_POST["qa_icon_$i"] ?? '');
            $inTitle = clean_input($_POST["qa_title_$i"] ?? '');
            $inDesc  = clean_input($_POST["qa_desc_$i"] ?? '');
            $inLink  = clean_input($_POST["qa_link_$i"] ?? '');

            $new_quick_access[] = [
                'icon'  => !empty($inIcon) ? $inIcon : $default_quick_access[$i]['icon'],
                'title' => !empty($inTitle) ? $inTitle : $default_quick_access[$i]['title'],
                'desc'  => !empty($inDesc) ? $inDesc : $default_quick_access[$i]['desc'],
                'link'  => !empty($inLink) ? $inLink : $default_quick_access[$i]['link']
            ];
        }
        $quick_access = $new_quick_access;
        save_home_section('quick_access', $quick_access);
        $msg = 'Hero Section & Quick Access Strip updated successfully!';
    }

    // 2. SAVE STATS & WHY SSSUTMS
    if ($action === 'save_stats_why') {
        $activeTab = 'stats';
        
        // 4 KPI Stats
        $stats = [];
        for ($i = 0; $i < 4; $i++) {
            $stats[] = [
                'num'  => clean_input($_POST["stat_num_$i"] ?? ''),
                'plus' => clean_input($_POST["stat_plus_$i"] ?? '+'),
                'lbl'  => clean_input($_POST["stat_lbl_$i"] ?? '')
            ];
        }
        save_home_section('stats', $stats);

        // Why SSSUTMS
        $why_sssutms['eyebrow'] = clean_input($_POST['why_eyebrow'] ?? 'Why SSSUTMS');
        $why_sssutms['title_main'] = clean_input($_POST['why_title_main'] ?? 'A University Built on');
        $why_sssutms['title_highlight'] = clean_input($_POST['why_title_highlight'] ?? 'Values, Vision & Vigour');
        
        $features = [];
        for ($i = 0; $i < 6; $i++) {
            $features[] = [
                'icon'  => clean_input($_POST["feat_icon_$i"] ?? ''),
                'title' => clean_input($_POST["feat_title_$i"] ?? ''),
                'desc'  => clean_input($_POST["feat_desc_$i"] ?? '')
            ];
        }
        $why_sssutms['features'] = $features;

        $why_sssutms['badge_grade'] = clean_input($_POST['why_badge_grade'] ?? 'UGC & AICTE');
        $why_sssutms['badge_sub'] = clean_input($_POST['why_badge_sub'] ?? 'Approved University');

        $why_sssutms['media_main'] = handle_home_upload('why_media_main_file', trim($_POST['why_media_main_text'] ?? $why_sssutms['media_main']));
        $why_sssutms['media_side1'] = handle_home_upload('why_media_side1_file', trim($_POST['why_media_side1_text'] ?? $why_sssutms['media_side1']));
        $why_sssutms['media_side2'] = handle_home_upload('why_media_side2_file', trim($_POST['why_media_side2_text'] ?? $why_sssutms['media_side2']));

        save_home_section('why_sssutms', $why_sssutms);
        $msg = 'Stats Band & Why SSSUTMS section saved successfully!';
    }

    // 3. SAVE ABOUT & LEADERSHIP & PRESS
    if ($action === 'save_about_vc') {
        $activeTab = 'about';

        $about_vc['eyebrow'] = clean_input($_POST['about_eyebrow'] ?? 'About Our University');
        $about_vc['title_main'] = clean_input($_POST['about_title_main'] ?? 'Welcome to');
        $about_vc['title_highlight'] = clean_input($_POST['about_title_highlight'] ?? 'Sri Satya Sai University');
        $about_vc['intro'] = clean_input($_POST['about_intro'] ?? '');
        $about_vc['vc_kicker'] = clean_input($_POST['vc_kicker'] ?? 'Leadership Message');
        $about_vc['vc_title'] = clean_input($_POST['vc_title'] ?? "From the Vice Chancellor's Desk");
        
        $about_vc['vc_para1'] = trim($_POST['vc_para1'] ?? '');
        $about_vc['vc_para2'] = trim($_POST['vc_para2'] ?? '');
        $about_vc['vc_para3'] = trim($_POST['vc_para3'] ?? '');
        
        $about_vc['vc_name'] = clean_input($_POST['vc_name'] ?? 'Dr. Mukesh Tiwari');
        $about_vc['vc_designation'] = clean_input($_POST['vc_designation'] ?? 'Vice Chancellor, SSSUTMS');
        $about_vc['vc_emblem'] = handle_home_upload('vc_emblem_file', trim($_POST['vc_emblem_text'] ?? $about_vc['vc_emblem']));

        $about_vc['campus_image'] = handle_home_upload('campus_image_file', trim($_POST['campus_image_text'] ?? $about_vc['campus_image']));
        $about_vc['campus_location'] = clean_input($_POST['campus_location'] ?? 'Sehore, Madhya Pradesh');
        $about_vc['campus_eyebrow'] = clean_input($_POST['campus_eyebrow'] ?? 'Discover SSSUTMS');
        $about_vc['campus_heading'] = clean_input($_POST['campus_heading'] ?? 'A welcoming campus for ambitious minds');
        $about_vc['campus_desc'] = clean_input($_POST['campus_desc'] ?? '');
        $about_vc['campus_fact1_bold'] = clean_input($_POST['campus_fact1_bold'] ?? '100+');
        $about_vc['campus_fact1_text'] = clean_input($_POST['campus_fact1_text'] ?? 'acre campus');
        $about_vc['campus_fact2_bold'] = clean_input($_POST['campus_fact2_bold'] ?? 'Since 2013');
        $about_vc['campus_fact2_text'] = clean_input($_POST['campus_fact2_text'] ?? 'shaping futures');

        save_home_section('about_vc', $about_vc);

        // Press & Media Banner
        $press_media['section_pill'] = clean_input($_POST['press_section_pill'] ?? 'Media');
        $press_media['section_title_accent'] = clean_input($_POST['press_title_accent'] ?? 'Press');
        $press_media['section_title_rest'] = clean_input($_POST['press_title_rest'] ?? '& Media');
        $press_media['live_badge'] = clean_input($_POST['press_live_badge'] ?? 'LIVE');
        $press_media['image'] = handle_home_upload('press_image_file', trim($_POST['press_image_text'] ?? $press_media['image']));
        $press_media['title'] = clean_input($_POST['press_title'] ?? 'University News & Press Releases');
        $press_media['subtitle'] = clean_input($_POST['press_subtitle'] ?? 'State & National Media Coverage');
        $press_media['btn_text'] = clean_input($_POST['press_btn_text'] ?? 'View More');
        $press_media['btn_link'] = clean_input($_POST['press_btn_link'] ?? 'PressMedia.php');

        save_home_section('press_media', $press_media);
        $msg = 'About University, VC Message & Press Banner updated successfully!';
    }

    // 4. SAVE ACADEMIC INSTITUTES
    if ($action === 'save_institutes') {
        $activeTab = 'institutes';

        $institutes['eyebrow'] = clean_input($_POST['inst_eyebrow'] ?? 'Academic Excellence');
        $institutes['title'] = clean_input($_POST['inst_title'] ?? 'Institutes That Shape Careers');
        $institutes['subtitle'] = clean_input($_POST['inst_subtitle'] ?? '');

        $items = [];
        for ($i = 0; $i < 6; $i++) {
            $existingImg = $institutes['items'][$i]['image'] ?? '';
            $img = handle_home_upload("inst_img_file_$i", trim($_POST["inst_img_text_$i"] ?? $existingImg));
            $items[] = [
                'title'          => clean_input($_POST["inst_title_$i"] ?? ''),
                'desc'           => clean_input($_POST["inst_desc_$i"] ?? ''),
                'image'          => $img,
                'image_fallback' => $institutes['items'][$i]['image_fallback'] ?? 'assets/images/slider/slide1.jpg',
                'link'           => clean_input($_POST["inst_link_$i"] ?? '')
            ];
        }
        $institutes['items'] = $items;
        save_home_section('institutes', $institutes);
        $msg = '6 Academic Institute cards updated successfully!';
    }

    // 5. SAVE RECRUITERS, VISIT & FLOATING BOX
    if ($action === 'save_recruiters_visit') {
        $activeTab = 'placements';

        // Recruiters
        $recruiters['eyebrow'] = clean_input($_POST['rec_eyebrow'] ?? 'Career Success');
        $recruiters['title'] = clean_input($_POST['rec_title'] ?? 'Our Top Recruiters');
        $recruiters['report_text'] = clean_input($_POST['rec_report_text'] ?? 'View placement report →');
        $recruiters['report_link'] = clean_input($_POST['rec_report_link'] ?? 'Academic/TrainingAndPlacement/TrainingAndPlacementCell.php');

        $logos = [];
        for ($i = 0; $i < 6; $i++) {
            $existingFile = $recruiters['logos'][$i]['file'] ?? '';
            $uploaded = handle_home_upload("rec_logo_file_$i", trim($_POST["rec_logo_text_$i"] ?? $existingFile));
            $logos[] = [
                'file' => $uploaded,
                'name' => clean_input($_POST["rec_logo_name_$i"] ?? '')
            ];
        }
        $recruiters['logos'] = $logos;
        save_home_section('recruiters', $recruiters);

        // Campus Visit
        $campus_visit['eyebrow'] = clean_input($_POST['visit_eyebrow'] ?? 'Campus Visit');
        $campus_visit['title_main'] = clean_input($_POST['visit_title_main'] ?? 'Experience the');
        $campus_visit['title_highlight'] = clean_input($_POST['visit_title_highlight'] ?? 'SSSUTMS Campus');
        $campus_visit['title_end'] = clean_input($_POST['visit_title_end'] ?? 'in Person');
        $campus_visit['desc'] = clean_input($_POST['visit_desc'] ?? '');

        $info_items = [];
        for ($i = 0; $i < 3; $i++) {
            $info_items[] = [
                'icon' => clean_input($_POST["visit_info_icon_$i"] ?? ''),
                'lbl'  => clean_input($_POST["visit_info_lbl_$i"] ?? ''),
                'val'  => clean_input($_POST["visit_info_val_$i"] ?? '')
            ];
        }
        $campus_visit['info_items'] = $info_items;
        $campus_visit['btn_primary_text'] = clean_input($_POST['visit_btn1_text'] ?? 'Schedule a Visit');
        $campus_visit['btn_primary_link'] = clean_input($_POST['visit_btn1_link'] ?? 'contact.php');
        $campus_visit['btn_secondary_text'] = clean_input($_POST['visit_btn2_text'] ?? 'Virtual Tour');
        $campus_visit['btn_secondary_link'] = clean_input($_POST['visit_btn2_link'] ?? 'gallery.php');
        $campus_visit['media_tag'] = clean_input($_POST['visit_media_tag'] ?? 'Campus View');
        $campus_visit['image'] = handle_home_upload('visit_img_file', trim($_POST['visit_img_text'] ?? $campus_visit['image']));
        
        save_home_section('campus_visit', $campus_visit);

        // Floating box
        $floating_box['is_enabled'] = isset($_POST['floating_box_enabled']);
        $floating_box['title'] = clean_input($_POST['floating_box_title'] ?? '🎓 Admission Session 2026-27');
        $floating_box['desc'] = clean_input($_POST['floating_box_desc'] ?? '');
        $floating_box['btn_text'] = clean_input($_POST['floating_box_btn_text'] ?? 'Apply Online (E-Pravesh)');
        $floating_box['btn_link'] = clean_input($_POST['floating_box_btn_link'] ?? 'Admission/AdmissionRegistration.php');

        save_home_section('floating_box', $floating_box);
        $msg = 'Recruiters, Campus Visit & Floating Admission Box saved successfully!';
    }

    // 6. SAVE RESOURCE CENTER & GALLERY
    if ($action === 'save_resources_gallery') {
        $activeTab = 'resources';

        // Resource Center
        $resource_center['eyebrow'] = clean_input($_POST['rc_eyebrow'] ?? 'Academic & Institutional Portals');
        $resource_center['title'] = clean_input($_POST['rc_title'] ?? 'Quick Access & Resource Center');
        $resource_center['subtitle'] = clean_input($_POST['rc_subtitle'] ?? '');

        // Column 1
        $resource_center['column1']['title'] = clean_input($_POST['col1_title'] ?? 'Important Links');
        $resource_center['column1']['subtitle'] = clean_input($_POST['col1_subtitle'] ?? 'Government & University Portals');
        $col1_links = [];
        for ($i = 0; $i < 7; $i++) {
            $col1_links[] = [
                'icon'        => clean_input($_POST["col1_link_icon_$i"] ?? 'fa-file-shield'),
                'text'        => clean_input($_POST["col1_link_text_$i"] ?? ''),
                'url'         => clean_input($_POST["col1_link_url_$i"] ?? ''),
                'is_external' => isset($_POST["col1_link_ext_$i"])
            ];
        }
        $resource_center['column1']['links'] = $col1_links;

        // Column 2
        $resource_center['column2']['title'] = clean_input($_POST['col2_title'] ?? 'Quick Links');
        $resource_center['column2']['subtitle'] = clean_input($_POST['col2_subtitle'] ?? 'Notifications, Rankings & Results');
        $col2_links = [];
        for ($i = 0; $i < 7; $i++) {
            $col2_links[] = [
                'icon'        => clean_input($_POST["col2_link_icon_$i"] ?? 'fa-bolt'),
                'text'        => clean_input($_POST["col2_link_text_$i"] ?? ''),
                'url'         => clean_input($_POST["col2_link_url_$i"] ?? ''),
                'is_external' => isset($_POST["col2_link_ext_$i"])
            ];
        }
        $resource_center['column2']['links'] = $col2_links;

        // Column 3
        $resource_center['column3']['title'] = clean_input($_POST['col3_title'] ?? 'Download Links');
        $resource_center['column3']['subtitle'] = clean_input($_POST['col3_subtitle'] ?? 'Examination Notifications & Timetables');
        $col3_links = [];
        for ($i = 0; $i < 7; $i++) {
            $col3_links[] = [
                'icon'        => clean_input($_POST["col3_link_icon_$i"] ?? 'fa-file-arrow-down'),
                'text'        => clean_input($_POST["col3_link_text_$i"] ?? ''),
                'url'         => clean_input($_POST["col3_link_url_$i"] ?? ''),
                'is_external' => isset($_POST["col3_link_ext_$i"])
            ];
        }
        $resource_center['column3']['links'] = $col3_links;
        save_home_section('resource_center', $resource_center);

        // Campus Glimpses Gallery
        $gallery_glimpses['eyebrow'] = clean_input($_POST['gal_eyebrow'] ?? 'Campus Life & Highlights');
        $gallery_glimpses['title'] = clean_input($_POST['gal_title'] ?? 'Glimpses of SSSUTMS Campus');
        $gallery_glimpses['explore_btn_text'] = clean_input($_POST['gal_btn_text'] ?? 'Explore Full Gallery');
        $gallery_glimpses['explore_btn_link'] = clean_input($_POST['gal_btn_link'] ?? 'gallery.php');

        $gal_items = [];
        for ($i = 0; $i < 6; $i++) {
            $existingGalImg = $gallery_glimpses['items'][$i]['image'] ?? '';
            $galImg = handle_home_upload("gal_img_file_$i", trim($_POST["gal_img_text_$i"] ?? $existingGalImg));
            $gal_items[] = [
                'badge'          => clean_input($_POST["gal_badge_$i"] ?? ''),
                'icon'           => clean_input($_POST["gal_icon_$i"] ?? 'fa-building'),
                'title'          => clean_input($_POST["gal_title_$i"] ?? ''),
                'image'          => $galImg,
                'image_fallback' => $gallery_glimpses['items'][$i]['image_fallback'] ?? 'assets/images/slider/slide1.jpg',
                'link'           => clean_input($_POST["gal_link_$i"] ?? 'gallery.php')
            ];
        }
        $gallery_glimpses['items'] = $gal_items;
        save_home_section('gallery_glimpses', $gallery_glimpses);

        $msg = 'Resource Center Links & Campus Glimpses Gallery saved successfully!';
    }

    // 7. SAVE HOME PAGE SEO & META TAGS
    if ($action === 'save_seo') {
        $activeTab = 'seo';

        $existingOg = $seo['og_image'] ?? 'assets/images/logo/logo.jpg';
        $uploadedOg = handle_home_upload('og_image_file', trim($_POST['og_image_text'] ?? $existingOg));

        $seo = [
            'meta_title' => clean_input($_POST['meta_title'] ?? ''),
            'meta_description' => clean_input($_POST['meta_description'] ?? ''),
            'meta_keywords' => clean_input($_POST['meta_keywords'] ?? ''),
            'canonical_url' => clean_input($_POST['canonical_url'] ?? ''),
            'og_image' => !empty($uploadedOg) ? $uploadedOg : 'assets/images/logo/logo.jpg',
            'og_title' => clean_input($_POST['og_title'] ?? ''),
            'og_description' => clean_input($_POST['og_description'] ?? ''),
            'robots' => clean_input($_POST['robots'] ?? 'index, follow')
        ];

        save_home_section('seo', $seo);
        $msg = 'Home Page SEO Meta Tags & Social Sharing updated successfully! Changes are immediately live on the main website.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page Manager - SSSUTMS Admin</title>
  <link rel="icon" type="image/jpeg" href="../assets/images/logo/logo.jpg">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/admin.css">
  <style>
    .home-tab-btn {
      padding: 0.75rem 1.25rem;
      font-weight: 600;
      color: #64748b;
      border: none;
      background: transparent;
      border-bottom: 3px solid transparent;
      transition: all 0.2s;
      white-space: nowrap;
    }
    .home-tab-btn.active {
      color: var(--admin-primary, #0b2545);
      border-bottom-color: var(--admin-accent, #f3752c);
      background: rgba(243, 117, 44, 0.05);
      border-radius: 6px 6px 0 0;
    }
    .section-field-card {
      background: #ffffff;
      border: 1px solid #e2e8f0;
      border-radius: 10px;
      padding: 1.25rem;
      margin-bottom: 1.25rem;
      box-shadow: 0 1px 3px rgba(0,0,0,0.03);
    }
    .section-field-card h6 {
      color: #0f172a;
      font-weight: 700;
      margin-bottom: 0.75rem;
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }
    .badge-tab-indicator {
      font-size: 0.75rem;
      background: #f1f5f9;
      color: #475569;
      padding: 2px 8px;
      border-radius: 12px;
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
    <li><a href="home.php" class="nav-link active"><i class="fa fa-house-chimney-window"></i> Home Page Editor</a></li>
    <li><a href="admission.php" class="nav-link"><i class="fa fa-user-graduate"></i> Admission Cell (7)</a></li>
    <li><a href="examination.php" class="nav-link"><i class="fa fa-graduation-cap"></i> Examination Cell (5)</a></li>
    <li><a href="research.php" class="nav-link"><i class="fa fa-flask"></i> Research Cell (12)</a></li>
    <li><a href="about.php" class="nav-link"><i class="fa fa-circle-info"></i> About Pages (42)</a></li>
    <li><a href="faculties.php" class="nav-link"><i class="fa fa-chalkboard-user"></i> Faculties & Depts (14)</a></li>
    <li><a href="documents.php" class="nav-link"><i class="fa fa-stamp"></i> Approvals & NAAC Docs</a></li>
    <li><a href="events.php" class="nav-link"><i class="fa fa-calendar-days"></i> Events & Workshops</a></li>
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
  <!-- Top Bar -->
  <header class="admin-topbar">
    <div class="d-flex align-items-center gap-3">
      <button class="sidebar-toggle-btn d-lg-none" type="button" aria-label="Toggle Sidebar">
        <i class="fa fa-bars"></i>
      </button>
      <div>
        <h5 class="fw-bold mb-0 text-dark">Home Page Sections Manager</h5>
        <small class="text-muted">Directly manage banner, text, cards, and links rendered on the main website home page.</small>
      </div>
    </div>
    <div class="d-flex align-items-center gap-3">
      <a href="../index.php" target="_blank" class="btn btn-outline-primary btn-sm rounded-pill d-none d-md-inline-flex align-items-center gap-1">
        <i class="fa fa-arrow-up-right-from-square"></i> Preview Live Home
      </a>
      <div class="user-badge d-flex align-items-center gap-2">
        <div class="avatar bg-primary text-white rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 36px; height: 36px;">A</div>
        <div class="d-none d-sm-block text-start">
          <span class="d-block fw-bold small text-dark leading-none">Super Administrator</span>
          <span class="d-block text-muted" style="font-size: 11px;">Main SSSUTMS Control</span>
        </div>
      </div>
    </div>
  </header>

  <div class="admin-content-inner p-4">

    <?php if (!empty($msg)): ?>
      <div class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-2" role="alert">
        <i class="fa fa-circle-check fs-5"></i>
        <div><strong>Success!</strong> <?php echo htmlspecialchars($msg); ?></div>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    <?php endif; ?>

    <!-- Navigation Tabs -->
    <div class="card border-0 shadow-sm mb-4">
      <div class="card-body p-2 border-bottom bg-light">
        <div class="d-flex flex-nowrap overflow-x-auto gap-2" id="homeTabs" role="tablist">
          <button class="home-tab-btn <?php echo $activeTab === 'hero' ? 'active' : ''; ?>" data-tab="tab-hero" type="button">
            <i class="fa fa-flag-checkered me-1"></i> 1. Hero & Quick Access
          </button>
          <button class="home-tab-btn <?php echo $activeTab === 'stats' ? 'active' : ''; ?>" data-tab="tab-stats" type="button">
            <i class="fa fa-chart-pie me-1"></i> 2. Stats & Why SSSUTMS
          </button>
          <button class="home-tab-btn <?php echo $activeTab === 'about' ? 'active' : ''; ?>" data-tab="tab-about" type="button">
            <i class="fa fa-building-columns me-1"></i> 3. About & Leadership
          </button>
          <button class="home-tab-btn <?php echo $activeTab === 'institutes' ? 'active' : ''; ?>" data-tab="tab-institutes" type="button">
            <i class="fa fa-graduation-cap me-1"></i> 4. Academic Institutes (6)
          </button>
          <button class="home-tab-btn <?php echo $activeTab === 'placements' ? 'active' : ''; ?>" data-tab="tab-placements" type="button">
            <i class="fa fa-briefcase me-1"></i> 5. Recruiters & Visit
          </button>
          <button class="home-tab-btn <?php echo $activeTab === 'resources' ? 'active' : ''; ?>" data-tab="tab-resources" type="button">
            <i class="fa fa-link me-1"></i> 6. Resource Center & Gallery
          </button>
          <button class="home-tab-btn <?php echo $activeTab === 'seo' ? 'active' : ''; ?>" data-tab="tab-seo" type="button">
            <i class="fa-solid fa-magnifying-glass-chart text-success me-1"></i> 7. SEO &amp; Meta Tags
          </button>
        </div>
      </div>
    </div>

    <!-- =========================================================================
         TAB 1: HERO & QUICK ACCESS
         ========================================================================= -->
    <div class="tab-pane-content <?php echo $activeTab === 'hero' ? '' : 'd-none'; ?>" id="tab-hero">
      <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="action" value="save_hero">

        <div class="section-field-card">
          <h6><i class="fa fa-image text-primary"></i> Main Hero Banner & Background</h6>
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label small fw-bold">Hero Background Image File (Upload to Replace)</label>
              <input type="file" name="hero_bg_file" class="form-control" accept="image/*">
              <small class="text-muted">Recommended: 1920x800 high-res campus photograph.</small>
            </div>
            <div class="col-md-6">
              <label class="form-label small fw-bold">Or Enter Image Path / Relative URL</label>
              <input type="text" name="hero_bg_text" class="form-control" value="<?php echo htmlspecialchars($hero['background_image'] ?? ''); ?>">
            </div>
            <div class="col-12">
              <div class="p-2 border rounded bg-light d-flex align-items-center gap-3">
                <span class="small text-muted">Current Hero Image Preview:</span>
                <img src="../<?php echo htmlspecialchars($hero['background_image'] ?? 'assets/images/slider/IMG-20260112-WA0044.jpg'); ?>" style="height: 50px; border-radius: 4px; object-fit: cover;" onerror="this.src='../assets/images/slider/slide1.jpg'">
                <code class="small text-dark"><?php echo htmlspecialchars($hero['background_image'] ?? ''); ?></code>
              </div>
            </div>
          </div>
        </div>

        <div class="section-field-card">
          <h6><i class="fa fa-heading text-primary"></i> Hero Headings & Call-to-Actions</h6>
          <div class="row g-3">
            <div class="col-md-12">
              <label class="form-label small fw-bold">Pill Badge Text</label>
              <input type="text" name="hero_badge_text" class="form-control" value="<?php echo htmlspecialchars($hero['badge_text'] ?? 'Admissions Open — Session 2026-27'); ?>">
            </div>
            <div class="col-md-6">
              <label class="form-label small fw-bold">Headline (Regular Part)</label>
              <input type="text" name="hero_title_main" class="form-control" value="<?php echo htmlspecialchars($hero['title_main'] ?? 'Shaping Future Leaders Through'); ?>">
            </div>
            <div class="col-md-6">
              <label class="form-label small fw-bold">Headline (Gradient Accent Highlight Part)</label>
              <input type="text" name="hero_title_highlight" class="form-control" value="<?php echo htmlspecialchars($hero['title_highlight'] ?? 'Excellence & Innovation'); ?>">
            </div>
            <div class="col-12">
              <label class="form-label small fw-bold">Hero Subtitle Paragraph</label>
              <textarea name="hero_desc" class="form-control" rows="2"><?php echo htmlspecialchars($hero['desc'] ?? ''); ?></textarea>
            </div>
            <div class="col-md-3">
              <label class="form-label small fw-bold">Button 1 Text (Primary)</label>
              <input type="text" name="hero_btn_primary_text" class="form-control" value="<?php echo htmlspecialchars($hero['btn_primary_text'] ?? 'Apply Online 2026-27'); ?>">
            </div>
            <div class="col-md-3">
              <label class="form-label small fw-bold">Button 1 Link URL</label>
              <input type="text" name="hero_btn_primary_link" class="form-control" value="<?php echo htmlspecialchars($hero['btn_primary_link'] ?? 'Admission/AdmissionRegistration.php'); ?>">
            </div>
            <div class="col-md-3">
              <label class="form-label small fw-bold">Button 2 Text (Outline)</label>
              <input type="text" name="hero_btn_secondary_text" class="form-control" value="<?php echo htmlspecialchars($hero['btn_secondary_text'] ?? 'Explore University'); ?>">
            </div>
            <div class="col-md-3">
              <label class="form-label small fw-bold">Button 2 Link URL</label>
              <input type="text" name="hero_btn_secondary_link" class="form-control" value="<?php echo htmlspecialchars($hero['btn_secondary_link'] ?? 'About/Background.php'); ?>">
            </div>
          </div>
        </div>

        <div class="section-field-card">
          <h6><i class="fa fa-list-ol text-primary"></i> 3 Hero Mini Stats (Below Buttons)</h6>
          <div class="row g-3">
            <?php for ($i = 0; $i < 3; $i++): 
              $ms = $hero['mini_stats'][$i] ?? ['icon' => 'fa-star', 'num' => '100+', 'lbl' => 'Stat'];
            ?>
              <div class="col-md-4">
                <div class="p-3 border rounded bg-light">
                  <span class="badge bg-secondary mb-2">Mini Stat #<?php echo $i + 1; ?></span>
                  <div class="mb-2">
                    <label class="small fw-bold">FontAwesome Icon Class</label>
                    <input type="text" name="mini_stat_icon_<?php echo $i; ?>" class="form-control form-control-sm" value="<?php echo htmlspecialchars($ms['icon']); ?>">
                  </div>
                  <div class="mb-2">
                    <label class="small fw-bold">Number / Highlight</label>
                    <input type="text" name="mini_stat_num_<?php echo $i; ?>" class="form-control form-control-sm" value="<?php echo htmlspecialchars($ms['num']); ?>">
                  </div>
                  <div>
                    <label class="small fw-bold">Label</label>
                    <input type="text" name="mini_stat_lbl_<?php echo $i; ?>" class="form-control form-control-sm" value="<?php echo htmlspecialchars($ms['lbl']); ?>">
                  </div>
                </div>
              </div>
            <?php endfor; ?>
          </div>
        </div>

        <div class="section-field-card">
          <h6><i class="fa fa-envelope text-primary"></i> Hero Inline Admission Enquiry Form Labels</h6>
          <div class="row g-3">
            <div class="col-md-4">
              <label class="form-label small fw-bold">Eyebrow Tag</label>
              <input type="text" name="hero_enquiry_eyebrow" class="form-control" value="<?php echo htmlspecialchars($hero['enquiry_eyebrow'] ?? 'Enquire Now'); ?>">
            </div>
            <div class="col-md-4">
              <label class="form-label small fw-bold">Form Card Title</label>
              <input type="text" name="hero_enquiry_title" class="form-control" value="<?php echo htmlspecialchars($hero['enquiry_title'] ?? 'Admission Enquiry Form'); ?>">
            </div>
            <div class="col-md-4">
              <label class="form-label small fw-bold">Form Card Subtitle</label>
              <input type="text" name="hero_enquiry_sub" class="form-control" value="<?php echo htmlspecialchars($hero['enquiry_sub'] ?? 'Speak with our academic counselors today.'); ?>">
            </div>
          </div>
          <small class="text-muted d-block mt-2">Note: Submissions made on this form arrive instantly in <a href="inquiries.php">Admission Leads</a>.</small>
        </div>

        <div class="section-field-card">
          <h6><i class="fa fa-bolt text-primary"></i> Quick Access Strip (4 Cards Below Hero)</h6>
          <div class="row g-3">
            <?php for ($i = 0; $i < 4; $i++): 
              $qa = $quick_access[$i] ?? $default_quick_access[$i];
              $qaIcon = !empty($qa['icon']) ? $qa['icon'] : $default_quick_access[$i]['icon'];
              $qaTitle = !empty($qa['title']) ? $qa['title'] : $default_quick_access[$i]['title'];
              $qaDesc = !empty($qa['desc']) ? $qa['desc'] : $default_quick_access[$i]['desc'];
              $qaLink = !empty($qa['link']) ? $qa['link'] : $default_quick_access[$i]['link'];
            ?>
              <div class="col-lg-3 col-md-6">
                <div class="p-3 border rounded bg-light">
                  <span class="badge bg-primary mb-2">Card #<?php echo $i + 1; ?></span>
                  <div class="mb-2">
                    <label class="small fw-bold">Icon Class</label>
                    <input type="text" name="qa_icon_<?php echo $i; ?>" class="form-control form-control-sm" value="<?php echo htmlspecialchars($qaIcon); ?>">
                  </div>
                  <div class="mb-2">
                    <label class="small fw-bold">Card Title</label>
                    <input type="text" name="qa_title_<?php echo $i; ?>" class="form-control form-control-sm" value="<?php echo htmlspecialchars($qaTitle); ?>">
                  </div>
                  <div class="mb-2">
                    <label class="small fw-bold">Description</label>
                    <input type="text" name="qa_desc_<?php echo $i; ?>" class="form-control form-control-sm" value="<?php echo htmlspecialchars($qaDesc); ?>">
                  </div>
                  <div>
                    <label class="small fw-bold">Link URL</label>
                    <input type="text" name="qa_link_<?php echo $i; ?>" class="form-control form-control-sm" value="<?php echo htmlspecialchars($qaLink); ?>">
                  </div>
                </div>
              </div>
            <?php endfor; ?>
          </div>
        </div>

        <button type="submit" class="btn btn-primary px-4 py-2 fw-bold">
          <i class="fa fa-floppy-disk me-1"></i> Save Hero & Quick Access
        </button>
      </form>
    </div>

    <!-- =========================================================================
         TAB 2: STATS BAND & WHY SSSUTMS
         ========================================================================= -->
    <div class="tab-pane-content <?php echo $activeTab === 'stats' ? '' : 'd-none'; ?>" id="tab-stats">
      <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="action" value="save_stats_why">

        <div class="section-field-card">
          <h6><i class="fa fa-chart-simple text-primary"></i> Key Performance Stats Band (4 Counters)</h6>
          <div class="row g-3">
            <?php for ($i = 0; $i < 4; $i++): 
              $st = $stats[$i] ?? ['num' => '100', 'plus' => '+', 'lbl' => 'Stat'];
            ?>
              <div class="col-lg-3 col-md-6">
                <div class="p-3 border rounded bg-light">
                  <span class="badge bg-secondary mb-2">Counter #<?php echo $i + 1; ?></span>
                  <div class="row g-2 mb-2">
                    <div class="col-7">
                      <label class="small fw-bold">Number</label>
                      <input type="text" name="stat_num_<?php echo $i; ?>" class="form-control form-control-sm" value="<?php echo htmlspecialchars($st['num']); ?>">
                    </div>
                    <div class="col-5">
                      <label class="small fw-bold">Suffix</label>
                      <input type="text" name="stat_plus_<?php echo $i; ?>" class="form-control form-control-sm" value="<?php echo htmlspecialchars($st['plus']); ?>">
                    </div>
                  </div>
                  <div>
                    <label class="small fw-bold">Label Description</label>
                    <textarea name="stat_lbl_<?php echo $i; ?>" class="form-control form-control-sm" rows="2"><?php echo htmlspecialchars($st['lbl']); ?></textarea>
                  </div>
                </div>
              </div>
            <?php endfor; ?>
          </div>
        </div>

        <div class="section-field-card">
          <h6><i class="fa fa-circle-question text-primary"></i> "Why SSSUTMS" Section Headers</h6>
          <div class="row g-3">
            <div class="col-md-4">
              <label class="form-label small fw-bold">Eyebrow Tag</label>
              <input type="text" name="why_eyebrow" class="form-control" value="<?php echo htmlspecialchars($why_sssutms['eyebrow'] ?? 'Why SSSUTMS'); ?>">
            </div>
            <div class="col-md-4">
              <label class="form-label small fw-bold">Title (Main)</label>
              <input type="text" name="why_title_main" class="form-control" value="<?php echo htmlspecialchars($why_sssutms['title_main'] ?? 'A University Built on'); ?>">
            </div>
            <div class="col-md-4">
              <label class="form-label small fw-bold">Title (Gradient Highlight)</label>
              <input type="text" name="why_title_highlight" class="form-control" value="<?php echo htmlspecialchars($why_sssutms['title_highlight'] ?? 'Values, Vision & Vigour'); ?>">
            </div>
          </div>
        </div>

        <div class="section-field-card">
          <h6><i class="fa fa-award text-primary"></i> 6 Key Feature Cards</h6>
          <div class="row g-3">
            <?php for ($i = 0; $i < 6; $i++): 
              $ft = $why_sssutms['features'][$i] ?? ['icon' => 'fa-check', 'title' => '', 'desc' => ''];
            ?>
              <div class="col-md-4">
                <div class="p-3 border rounded bg-light">
                  <span class="badge bg-primary mb-2">Feature #<?php echo $i + 1; ?></span>
                  <div class="mb-2">
                    <label class="small fw-bold">FontAwesome Icon</label>
                    <input type="text" name="feat_icon_<?php echo $i; ?>" class="form-control form-control-sm" value="<?php echo htmlspecialchars($ft['icon']); ?>">
                  </div>
                  <div class="mb-2">
                    <label class="small fw-bold">Title</label>
                    <input type="text" name="feat_title_<?php echo $i; ?>" class="form-control form-control-sm" value="<?php echo htmlspecialchars($ft['title']); ?>">
                  </div>
                  <div>
                    <label class="small fw-bold">Description</label>
                    <input type="text" name="feat_desc_<?php echo $i; ?>" class="form-control form-control-sm" value="<?php echo htmlspecialchars($ft['desc']); ?>">
                  </div>
                </div>
              </div>
            <?php endfor; ?>
          </div>
        </div>

        <div class="section-field-card">
          <h6><i class="fa fa-images text-primary"></i> Why SSSUTMS Visual Collage</h6>
          <div class="row g-3">
            <div class="col-md-4">
              <label class="form-label small fw-bold">Main Showcase Image (Upload)</label>
              <input type="file" name="why_media_main_file" class="form-control form-control-sm" accept="image/*">
              <input type="text" name="why_media_main_text" class="form-control form-control-sm mt-1" value="<?php echo htmlspecialchars($why_sssutms['media_main'] ?? ''); ?>">
            </div>
            <div class="col-md-4">
              <label class="form-label small fw-bold">Side Collage Top Image</label>
              <input type="file" name="why_media_side1_file" class="form-control form-control-sm" accept="image/*">
              <input type="text" name="why_media_side1_text" class="form-control form-control-sm mt-1" value="<?php echo htmlspecialchars($why_sssutms['media_side1'] ?? ''); ?>">
            </div>
            <div class="col-md-4">
              <label class="form-label small fw-bold">Side Collage Bottom Image</label>
              <input type="file" name="why_media_side2_file" class="form-control form-control-sm" accept="image/*">
              <input type="text" name="why_media_side2_text" class="form-control form-control-sm mt-1" value="<?php echo htmlspecialchars($why_sssutms['media_side2'] ?? ''); ?>">
            </div>
            <div class="col-md-6">
              <label class="form-label small fw-bold">Floating Badge Header Text</label>
              <input type="text" name="why_badge_grade" class="form-control" value="<?php echo htmlspecialchars($why_sssutms['badge_grade'] ?? 'UGC & AICTE'); ?>">
            </div>
            <div class="col-md-6">
              <label class="form-label small fw-bold">Floating Badge Subtitle</label>
              <input type="text" name="why_badge_sub" class="form-control" value="<?php echo htmlspecialchars($why_sssutms['badge_sub'] ?? 'Approved University'); ?>">
            </div>
          </div>
        </div>

        <button type="submit" class="btn btn-primary px-4 py-2 fw-bold">
          <i class="fa fa-floppy-disk me-1"></i> Save Stats & Why SSSUTMS
        </button>
      </form>
    </div>

    <!-- =========================================================================
         TAB 3: ABOUT, LEADERSHIP & PRESS
         ========================================================================= -->
    <div class="tab-pane-content <?php echo $activeTab === 'about' ? '' : 'd-none'; ?>" id="tab-about">
      <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="action" value="save_about_vc">

        <div class="section-field-card">
          <h6><i class="fa fa-landmark text-primary"></i> University Welcome Header</h6>
          <div class="row g-3">
            <div class="col-md-4">
              <label class="form-label small fw-bold">Eyebrow</label>
              <input type="text" name="about_eyebrow" class="form-control" value="<?php echo htmlspecialchars($about_vc['eyebrow'] ?? 'About Our University'); ?>">
            </div>
            <div class="col-md-4">
              <label class="form-label small fw-bold">Title (Main)</label>
              <input type="text" name="about_title_main" class="form-control" value="<?php echo htmlspecialchars($about_vc['title_main'] ?? 'Welcome to'); ?>">
            </div>
            <div class="col-md-4">
              <label class="form-label small fw-bold">Title (Gradient Highlight)</label>
              <input type="text" name="about_title_highlight" class="form-control" value="<?php echo htmlspecialchars($about_vc['title_highlight'] ?? 'Sri Satya Sai University'); ?>">
            </div>
            <div class="col-12">
              <label class="form-label small fw-bold">Intro Paragraph</label>
              <textarea name="about_intro" class="form-control" rows="2"><?php echo htmlspecialchars($about_vc['intro'] ?? ''); ?></textarea>
            </div>
          </div>
        </div>

        <div class="section-field-card">
          <h6><i class="fa fa-user-tie text-primary"></i> Vice Chancellor's Message</h6>
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label small fw-bold">Leadership Kicker</label>
              <input type="text" name="vc_kicker" class="form-control" value="<?php echo htmlspecialchars($about_vc['vc_kicker'] ?? 'Leadership Message'); ?>">
            </div>
            <div class="col-md-6">
              <label class="form-label small fw-bold">Card Title</label>
              <input type="text" name="vc_title" class="form-control" value="<?php echo htmlspecialchars($about_vc['vc_title'] ?? "From the Vice Chancellor's Desk"); ?>">
            </div>
            <div class="col-12">
              <label class="form-label small fw-bold">Paragraph 1</label>
              <textarea name="vc_para1" class="form-control" rows="3"><?php echo htmlspecialchars($about_vc['vc_para1'] ?? ''); ?></textarea>
            </div>
            <div class="col-12">
              <label class="form-label small fw-bold">Paragraph 2</label>
              <textarea name="vc_para2" class="form-control" rows="3"><?php echo htmlspecialchars($about_vc['vc_para2'] ?? ''); ?></textarea>
            </div>
            <div class="col-12">
              <label class="form-label small fw-bold">Paragraph 3</label>
              <textarea name="vc_para3" class="form-control" rows="3"><?php echo htmlspecialchars($about_vc['vc_para3'] ?? ''); ?></textarea>
            </div>
            <div class="col-md-4">
              <label class="form-label small fw-bold">Signoff Name</label>
              <input type="text" name="vc_name" class="form-control" value="<?php echo htmlspecialchars($about_vc['vc_name'] ?? 'Dr. Mukesh Tiwari'); ?>">
            </div>
            <div class="col-md-4">
              <label class="form-label small fw-bold">Signoff Designation</label>
              <input type="text" name="vc_designation" class="form-control" value="<?php echo htmlspecialchars($about_vc['vc_designation'] ?? 'Vice Chancellor, SSSUTMS'); ?>">
            </div>
            <div class="col-md-4">
              <label class="form-label small fw-bold">Signoff Emblem / Logo</label>
              <input type="file" name="vc_emblem_file" class="form-control form-control-sm" accept="image/*">
              <input type="text" name="vc_emblem_text" class="form-control form-control-sm mt-1" value="<?php echo htmlspecialchars($about_vc['vc_emblem'] ?? 'assets/images/logo/logo.jpg'); ?>">
            </div>
          </div>
        </div>

        <div class="section-field-card">
          <h6><i class="fa fa-camera text-primary"></i> Campus Entrance Showcase Visual & Facts</h6>
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label small fw-bold">Visual Image (Upload to Replace)</label>
              <input type="file" name="campus_image_file" class="form-control" accept="image/*">
              <input type="text" name="campus_image_text" class="form-control mt-1" value="<?php echo htmlspecialchars($about_vc['campus_image'] ?? 'assets/images/home/campus-entrance-enhanced.jpg'); ?>">
            </div>
            <div class="col-md-6">
              <label class="form-label small fw-bold">Location Tag</label>
              <input type="text" name="campus_location" class="form-control" value="<?php echo htmlspecialchars($about_vc['campus_location'] ?? 'Sehore, Madhya Pradesh'); ?>">
            </div>
            <div class="col-md-4">
              <label class="form-label small fw-bold">Caption Eyebrow</label>
              <input type="text" name="campus_eyebrow" class="form-control" value="<?php echo htmlspecialchars($about_vc['campus_eyebrow'] ?? 'Discover SSSUTMS'); ?>">
            </div>
            <div class="col-md-8">
              <label class="form-label small fw-bold">Caption Heading</label>
              <input type="text" name="campus_heading" class="form-control" value="<?php echo htmlspecialchars($about_vc['campus_heading'] ?? 'A welcoming campus for ambitious minds'); ?>">
            </div>
            <div class="col-12">
              <label class="form-label small fw-bold">Caption Description</label>
              <input type="text" name="campus_desc" class="form-control" value="<?php echo htmlspecialchars($about_vc['campus_desc'] ?? ''); ?>">
            </div>
            <div class="col-md-3">
              <label class="form-label small fw-bold">Fact 1 Bold</label>
              <input type="text" name="campus_fact1_bold" class="form-control" value="<?php echo htmlspecialchars($about_vc['campus_fact1_bold'] ?? '100+'); ?>">
            </div>
            <div class="col-md-3">
              <label class="form-label small fw-bold">Fact 1 Text</label>
              <input type="text" name="campus_fact1_text" class="form-control" value="<?php echo htmlspecialchars($about_vc['campus_fact1_text'] ?? 'acre campus'); ?>">
            </div>
            <div class="col-md-3">
              <label class="form-label small fw-bold">Fact 2 Bold</label>
              <input type="text" name="campus_fact2_bold" class="form-control" value="<?php echo htmlspecialchars($about_vc['campus_fact2_bold'] ?? 'Since 2013'); ?>">
            </div>
            <div class="col-md-3">
              <label class="form-label small fw-bold">Fact 2 Text</label>
              <input type="text" name="campus_fact2_text" class="form-control" value="<?php echo htmlspecialchars($about_vc['campus_fact2_text'] ?? 'shaping futures'); ?>">
            </div>
          </div>
        </div>

        <div class="section-field-card">
          <h6><i class="fa fa-newspaper text-primary"></i> Press & Media Banner Card</h6>
          <div class="row g-3">
            <div class="col-md-3">
              <label class="form-label small fw-bold">Section Pill</label>
              <input type="text" name="press_section_pill" class="form-control" value="<?php echo htmlspecialchars($press_media['section_pill'] ?? 'Media'); ?>">
            </div>
            <div class="col-md-3">
              <label class="form-label small fw-bold">Title Accent</label>
              <input type="text" name="press_title_accent" class="form-control" value="<?php echo htmlspecialchars($press_media['section_title_accent'] ?? 'Press'); ?>">
            </div>
            <div class="col-md-3">
              <label class="form-label small fw-bold">Title Rest</label>
              <input type="text" name="press_title_rest" class="form-control" value="<?php echo htmlspecialchars($press_media['section_title_rest'] ?? '& Media'); ?>">
            </div>
            <div class="col-md-3">
              <label class="form-label small fw-bold">Live Badge Text</label>
              <input type="text" name="press_live_badge" class="form-control" value="<?php echo htmlspecialchars($press_media['live_badge'] ?? 'LIVE'); ?>">
            </div>
            <div class="col-md-6">
              <label class="form-label small fw-bold">Banner Image</label>
              <input type="file" name="press_image_file" class="form-control form-control-sm" accept="image/*">
              <input type="text" name="press_image_text" class="form-control form-control-sm mt-1" value="<?php echo htmlspecialchars($press_media['image'] ?? ''); ?>">
            </div>
            <div class="col-md-6">
              <label class="form-label small fw-bold">News Card Title</label>
              <input type="text" name="press_title" class="form-control" value="<?php echo htmlspecialchars($press_media['title'] ?? 'University News & Press Releases'); ?>">
            </div>
            <div class="col-md-6">
              <label class="form-label small fw-bold">Subtitle</label>
              <input type="text" name="press_subtitle" class="form-control" value="<?php echo htmlspecialchars($press_media['subtitle'] ?? 'State & National Media Coverage'); ?>">
            </div>
            <div class="col-md-3">
              <label class="form-label small fw-bold">Button Label</label>
              <input type="text" name="press_btn_text" class="form-control" value="<?php echo htmlspecialchars($press_media['btn_text'] ?? 'View More'); ?>">
            </div>
            <div class="col-md-3">
              <label class="form-label small fw-bold">Button Target Link</label>
              <input type="text" name="press_btn_link" class="form-control" value="<?php echo htmlspecialchars($press_media['btn_link'] ?? 'PressMedia.php'); ?>">
            </div>
          </div>
          <small class="text-muted d-block mt-2">Notice: The circulars list next to this card is managed live via <a href="notices.php">Notices & Circulars</a>.</small>
        </div>

        <button type="submit" class="btn btn-primary px-4 py-2 fw-bold">
          <i class="fa fa-floppy-disk me-1"></i> Save Leadership & About
        </button>
      </form>
    </div>

    <!-- =========================================================================
         TAB 4: ACADEMIC INSTITUTES (6)
         ========================================================================= -->
    <div class="tab-pane-content <?php echo $activeTab === 'institutes' ? '' : 'd-none'; ?>" id="tab-institutes">
      <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="action" value="save_institutes">

        <div class="section-field-card">
          <h6><i class="fa fa-header text-primary"></i> Institutes Section Header</h6>
          <div class="row g-3">
            <div class="col-md-4">
              <label class="form-label small fw-bold">Eyebrow</label>
              <input type="text" name="inst_eyebrow" class="form-control" value="<?php echo htmlspecialchars($institutes['eyebrow'] ?? 'Academic Excellence'); ?>">
            </div>
            <div class="col-md-4">
              <label class="form-label small fw-bold">Section Heading</label>
              <input type="text" name="inst_title" class="form-control" value="<?php echo htmlspecialchars($institutes['title'] ?? 'Institutes That Shape Careers'); ?>">
            </div>
            <div class="col-md-4">
              <label class="form-label small fw-bold">Subtitle</label>
              <input type="text" name="inst_subtitle" class="form-control" value="<?php echo htmlspecialchars($institutes['subtitle'] ?? ''); ?>">
            </div>
          </div>
        </div>

        <div class="row g-3">
          <?php for ($i = 0; $i < 6; $i++): 
            $card = $institutes['items'][$i] ?? ['title' => '', 'desc' => '', 'image' => '', 'link' => ''];
          ?>
            <div class="col-lg-4 col-md-6">
              <div class="section-field-card h-100">
                <span class="badge bg-primary mb-2">Institute #<?php echo $i + 1; ?></span>
                <div class="mb-2">
                  <label class="small fw-bold">Institute / Faculty Name</label>
                  <input type="text" name="inst_title_<?php echo $i; ?>" class="form-control" value="<?php echo htmlspecialchars($card['title']); ?>" required>
                </div>
                <div class="mb-2">
                  <label class="small fw-bold">Programs Offered / Tagline</label>
                  <textarea name="inst_desc_<?php echo $i; ?>" class="form-control form-control-sm" rows="2"><?php echo htmlspecialchars($card['desc']); ?></textarea>
                </div>
                <div class="mb-2">
                  <label class="small fw-bold">Card Image File (Upload)</label>
                  <input type="file" name="inst_img_file_<?php echo $i; ?>" class="form-control form-control-sm" accept="image/*">
                  <input type="text" name="inst_img_text_<?php echo $i; ?>" class="form-control form-control-sm mt-1" value="<?php echo htmlspecialchars($card['image']); ?>">
                </div>
                <div class="mb-2">
                  <label class="small fw-bold">Explore Link URL</label>
                  <input type="text" name="inst_link_<?php echo $i; ?>" class="form-control form-control-sm" value="<?php echo htmlspecialchars($card['link']); ?>">
                </div>
              </div>
            </div>
          <?php endfor; ?>
        </div>

        <div class="mt-3">
          <button type="submit" class="btn btn-primary px-4 py-2 fw-bold">
            <i class="fa fa-floppy-disk me-1"></i> Save Academic Institutes
          </button>
        </div>
      </form>
    </div>

    <!-- =========================================================================
         TAB 5: RECRUITERS, CAMPUS VISIT & FLOATING BOX
         ========================================================================= -->
    <div class="tab-pane-content <?php echo $activeTab === 'placements' ? '' : 'd-none'; ?>" id="tab-placements">
      <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="action" value="save_recruiters_visit">

        <div class="section-field-card">
          <h6><i class="fa fa-trophy text-primary"></i> Top Corporate Recruiters Marquee</h6>
          <div class="row g-3 mb-3">
            <div class="col-md-3">
              <label class="form-label small fw-bold">Eyebrow</label>
              <input type="text" name="rec_eyebrow" class="form-control" value="<?php echo htmlspecialchars($recruiters['eyebrow'] ?? 'Career Success'); ?>">
            </div>
            <div class="col-md-3">
              <label class="form-label small fw-bold">Heading</label>
              <input type="text" name="rec_title" class="form-control" value="<?php echo htmlspecialchars($recruiters['title'] ?? 'Our Top Recruiters'); ?>">
            </div>
            <div class="col-md-3">
              <label class="form-label small fw-bold">Report Button Text</label>
              <input type="text" name="rec_report_text" class="form-control" value="<?php echo htmlspecialchars($recruiters['report_text'] ?? 'View placement report →'); ?>">
            </div>
            <div class="col-md-3">
              <label class="form-label small fw-bold">Report Button Link</label>
              <input type="text" name="rec_report_link" class="form-control" value="<?php echo htmlspecialchars($recruiters['report_link'] ?? 'Academic/TrainingAndPlacement/TrainingAndPlacementCell.php'); ?>">
            </div>
          </div>
          <div class="row g-3">
            <?php for ($i = 0; $i < 6; $i++): 
              $rc = $recruiters['logos'][$i] ?? ['file' => 'TCSLogo.jpg', 'name' => 'Recruiter'];
            ?>
              <div class="col-md-4">
                <div class="p-3 border rounded bg-light">
                  <span class="badge bg-secondary mb-2">Recruiter #<?php echo $i + 1; ?></span>
                  <div class="mb-2">
                    <label class="small fw-bold">Company Name</label>
                    <input type="text" name="rec_logo_name_<?php echo $i; ?>" class="form-control form-control-sm" value="<?php echo htmlspecialchars($rc['name']); ?>">
                  </div>
                  <div>
                    <label class="small fw-bold">Logo (Filename or Upload)</label>
                    <input type="file" name="rec_logo_file_<?php echo $i; ?>" class="form-control form-control-sm" accept="image/*">
                    <input type="text" name="rec_logo_text_<?php echo $i; ?>" class="form-control form-control-sm mt-1" value="<?php echo htmlspecialchars($rc['file']); ?>">
                  </div>
                </div>
              </div>
            <?php endfor; ?>
          </div>
        </div>

        <div class="section-field-card">
          <h6><i class="fa fa-map-location-dot text-primary"></i> Campus Visit & Experience</h6>
          <div class="row g-3">
            <div class="col-md-3">
              <label class="form-label small fw-bold">Eyebrow</label>
              <input type="text" name="visit_eyebrow" class="form-control" value="<?php echo htmlspecialchars($campus_visit['eyebrow'] ?? 'Campus Visit'); ?>">
            </div>
            <div class="col-md-3">
              <label class="form-label small fw-bold">Title (Main)</label>
              <input type="text" name="visit_title_main" class="form-control" value="<?php echo htmlspecialchars($campus_visit['title_main'] ?? 'Experience the'); ?>">
            </div>
            <div class="col-md-3">
              <label class="form-label small fw-bold">Title (Highlight)</label>
              <input type="text" name="visit_title_highlight" class="form-control" value="<?php echo htmlspecialchars($campus_visit['title_highlight'] ?? 'SSSUTMS Campus'); ?>">
            </div>
            <div class="col-md-3">
              <label class="form-label small fw-bold">Title (End)</label>
              <input type="text" name="visit_title_end" class="form-control" value="<?php echo htmlspecialchars($campus_visit['title_end'] ?? 'in Person'); ?>">
            </div>
            <div class="col-12">
              <label class="form-label small fw-bold">Intro Paragraph</label>
              <textarea name="visit_desc" class="form-control" rows="2"><?php echo htmlspecialchars($campus_visit['desc'] ?? ''); ?></textarea>
            </div>
            <?php for ($i = 0; $i < 3; $i++): 
              $vi = $campus_visit['info_items'][$i] ?? ['icon' => 'fa-star', 'lbl' => '', 'val' => ''];
            ?>
              <div class="col-md-4">
                <div class="p-2 border rounded bg-light">
                  <span class="badge bg-secondary mb-1">Visit Slot #<?php echo $i + 1; ?></span>
                  <input type="text" name="visit_info_icon_<?php echo $i; ?>" class="form-control form-control-sm mb-1" placeholder="Icon" value="<?php echo htmlspecialchars($vi['icon']); ?>">
                  <input type="text" name="visit_info_lbl_<?php echo $i; ?>" class="form-control form-control-sm mb-1" placeholder="Label" value="<?php echo htmlspecialchars($vi['lbl']); ?>">
                  <input type="text" name="visit_info_val_<?php echo $i; ?>" class="form-control form-control-sm" placeholder="Value" value="<?php echo htmlspecialchars($vi['val']); ?>">
                </div>
              </div>
            <?php endfor; ?>
            <div class="col-md-3">
              <label class="form-label small fw-bold">Button 1 Text</label>
              <input type="text" name="visit_btn1_text" class="form-control" value="<?php echo htmlspecialchars($campus_visit['btn_primary_text'] ?? 'Schedule a Visit'); ?>">
            </div>
            <div class="col-md-3">
              <label class="form-label small fw-bold">Button 1 Link</label>
              <input type="text" name="visit_btn1_link" class="form-control" value="<?php echo htmlspecialchars($campus_visit['btn_primary_link'] ?? 'contact.php'); ?>">
            </div>
            <div class="col-md-3">
              <label class="form-label small fw-bold">Button 2 Text</label>
              <input type="text" name="visit_btn2_text" class="form-control" value="<?php echo htmlspecialchars($campus_visit['btn_secondary_text'] ?? 'Virtual Tour'); ?>">
            </div>
            <div class="col-md-3">
              <label class="form-label small fw-bold">Button 2 Link</label>
              <input type="text" name="visit_btn2_link" class="form-control" value="<?php echo htmlspecialchars($campus_visit['btn_secondary_link'] ?? 'gallery.php'); ?>">
            </div>
            <div class="col-md-6">
              <label class="form-label small fw-bold">Media Tag Label</label>
              <input type="text" name="visit_media_tag" class="form-control" value="<?php echo htmlspecialchars($campus_visit['media_tag'] ?? 'Campus View'); ?>">
            </div>
            <div class="col-md-6">
              <label class="form-label small fw-bold">Showcase Campus Image</label>
              <input type="file" name="visit_img_file" class="form-control form-control-sm" accept="image/*">
              <input type="text" name="visit_img_text" class="form-control form-control-sm mt-1" value="<?php echo htmlspecialchars($campus_visit['image'] ?? ''); ?>">
            </div>
          </div>
        </div>

        <div class="section-field-card">
          <h6><i class="fa fa-window-restore text-primary"></i> Floating Admission Box (Popup Widget)</h6>
          <div class="row g-3">
            <div class="col-12">
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="floating_box_enabled" id="floatingBoxSwitch" <?php echo (!empty($floating_box['is_enabled'])) ? 'checked' : ''; ?>>
                <label class="form-check-label fw-bold" for="floatingBoxSwitch">Enable Floating Admission Popup on Home Page</label>
              </div>
            </div>
            <div class="col-md-6">
              <label class="form-label small fw-bold">Popup Title</label>
              <input type="text" name="floating_box_title" class="form-control" value="<?php echo htmlspecialchars($floating_box['title'] ?? '🎓 Admission Session 2026-27'); ?>">
            </div>
            <div class="col-md-6">
              <label class="form-label small fw-bold">Button Text</label>
              <input type="text" name="floating_box_btn_text" class="form-control" value="<?php echo htmlspecialchars($floating_box['btn_text'] ?? 'Apply Online (E-Pravesh)'); ?>">
            </div>
            <div class="col-md-6">
              <label class="form-label small fw-bold">Description Text</label>
              <textarea name="floating_box_desc" class="form-control" rows="2"><?php echo htmlspecialchars($floating_box['desc'] ?? ''); ?></textarea>
            </div>
            <div class="col-md-6">
              <label class="form-label small fw-bold">Button Action URL</label>
              <input type="text" name="floating_box_btn_link" class="form-control" value="<?php echo htmlspecialchars($floating_box['btn_link'] ?? 'Admission/AdmissionRegistration.php'); ?>">
            </div>
          </div>
        </div>

        <button type="submit" class="btn btn-primary px-4 py-2 fw-bold">
          <i class="fa fa-floppy-disk me-1"></i> Save Recruiters & Visit
        </button>
      </form>
    </div>

    <!-- =========================================================================
         TAB 6: RESOURCE CENTER & CAMPUS GALLERY
         ========================================================================= -->
    <div class="tab-pane-content <?php echo $activeTab === 'resources' ? '' : 'd-none'; ?>" id="tab-resources">
      <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="action" value="save_resources_gallery">

        <div class="section-field-card">
          <h6><i class="fa fa-folder-tree text-primary"></i> Resource Center Header</h6>
          <div class="row g-3">
            <div class="col-md-4">
              <label class="form-label small fw-bold">Eyebrow</label>
              <input type="text" name="rc_eyebrow" class="form-control" value="<?php echo htmlspecialchars($resource_center['eyebrow'] ?? 'Academic & Institutional Portals'); ?>">
            </div>
            <div class="col-md-4">
              <label class="form-label small fw-bold">Section Heading</label>
              <input type="text" name="rc_title" class="form-control" value="<?php echo htmlspecialchars($resource_center['title'] ?? 'Quick Access & Resource Center'); ?>">
            </div>
            <div class="col-md-4">
              <label class="form-label small fw-bold">Subtitle Description</label>
              <input type="text" name="rc_subtitle" class="form-control" value="<?php echo htmlspecialchars($resource_center['subtitle'] ?? ''); ?>">
            </div>
          </div>
        </div>

        <!-- 3 Resource Columns -->
        <div class="row g-3">
          <!-- Column 1: Important Links -->
          <div class="col-lg-4">
            <div class="section-field-card h-100">
              <h6 class="text-primary"><i class="fa fa-star"></i> Column 1: Important Links</h6>
              <div class="mb-2">
                <label class="small fw-bold">Column Title</label>
                <input type="text" name="col1_title" class="form-control form-control-sm" value="<?php echo htmlspecialchars($resource_center['column1']['title'] ?? 'Important Links'); ?>">
              </div>
              <div class="mb-3">
                <label class="small fw-bold">Column Subtitle</label>
                <input type="text" name="col1_subtitle" class="form-control form-control-sm" value="<?php echo htmlspecialchars($resource_center['column1']['subtitle'] ?? ''); ?>">
              </div>
              <label class="small fw-bold mb-2">7 Link Rows:</label>
              <?php for ($i = 0; $i < 7; $i++): 
                $lk = $resource_center['column1']['links'][$i] ?? ['icon' => 'fa-file-shield', 'text' => '', 'url' => '', 'is_external' => false];
              ?>
                <div class="p-2 border rounded bg-light mb-2">
                  <div class="d-flex gap-1 mb-1">
                    <input type="text" name="col1_link_icon_<?php echo $i; ?>" class="form-control form-control-sm" style="width:30%;" placeholder="Icon" value="<?php echo htmlspecialchars($lk['icon']); ?>">
                    <input type="text" name="col1_link_text_<?php echo $i; ?>" class="form-control form-control-sm" style="width:70%;" placeholder="Title" value="<?php echo htmlspecialchars($lk['text']); ?>">
                  </div>
                  <div class="d-flex gap-2 align-items-center">
                    <input type="text" name="col1_link_url_<?php echo $i; ?>" class="form-control form-control-sm" placeholder="URL Link" value="<?php echo htmlspecialchars($lk['url']); ?>">
                    <div class="form-check text-nowrap">
                      <input class="form-check-input" type="checkbox" name="col1_link_ext_<?php echo $i; ?>" id="c1_ext_<?php echo $i; ?>" <?php echo (!empty($lk['is_external'])) ? 'checked' : ''; ?>>
                      <label class="form-check-label small" for="c1_ext_<?php echo $i; ?>" title="Open in new tab">Tab</label>
                    </div>
                  </div>
                </div>
              <?php endfor; ?>
            </div>
          </div>

          <!-- Column 2: Quick Links -->
          <div class="col-lg-4">
            <div class="section-field-card h-100">
              <h6 class="text-success"><i class="fa fa-bolt"></i> Column 2: Quick Links</h6>
              <div class="mb-2">
                <label class="small fw-bold">Column Title</label>
                <input type="text" name="col2_title" class="form-control form-control-sm" value="<?php echo htmlspecialchars($resource_center['column2']['title'] ?? 'Quick Links'); ?>">
              </div>
              <div class="mb-3">
                <label class="small fw-bold">Column Subtitle</label>
                <input type="text" name="col2_subtitle" class="form-control form-control-sm" value="<?php echo htmlspecialchars($resource_center['column2']['subtitle'] ?? ''); ?>">
              </div>
              <label class="small fw-bold mb-2">7 Link Rows:</label>
              <?php for ($i = 0; $i < 7; $i++): 
                $lk = $resource_center['column2']['links'][$i] ?? ['icon' => 'fa-bolt', 'text' => '', 'url' => '', 'is_external' => false];
              ?>
                <div class="p-2 border rounded bg-light mb-2">
                  <div class="d-flex gap-1 mb-1">
                    <input type="text" name="col2_link_icon_<?php echo $i; ?>" class="form-control form-control-sm" style="width:30%;" placeholder="Icon" value="<?php echo htmlspecialchars($lk['icon']); ?>">
                    <input type="text" name="col2_link_text_<?php echo $i; ?>" class="form-control form-control-sm" style="width:70%;" placeholder="Title" value="<?php echo htmlspecialchars($lk['text']); ?>">
                  </div>
                  <div class="d-flex gap-2 align-items-center">
                    <input type="text" name="col2_link_url_<?php echo $i; ?>" class="form-control form-control-sm" placeholder="URL Link" value="<?php echo htmlspecialchars($lk['url']); ?>">
                    <div class="form-check text-nowrap">
                      <input class="form-check-input" type="checkbox" name="col2_link_ext_<?php echo $i; ?>" id="c2_ext_<?php echo $i; ?>" <?php echo (!empty($lk['is_external'])) ? 'checked' : ''; ?>>
                      <label class="form-check-label small" for="c2_ext_<?php echo $i; ?>" title="Open in new tab">Tab</label>
                    </div>
                  </div>
                </div>
              <?php endfor; ?>
            </div>
          </div>

          <!-- Column 3: Download Links -->
          <div class="col-lg-4">
            <div class="section-field-card h-100">
              <h6 class="text-warning"><i class="fa fa-circle-down"></i> Column 3: Download Links</h6>
              <div class="mb-2">
                <label class="small fw-bold">Column Title</label>
                <input type="text" name="col3_title" class="form-control form-control-sm" value="<?php echo htmlspecialchars($resource_center['column3']['title'] ?? 'Download Links'); ?>">
              </div>
              <div class="mb-3">
                <label class="small fw-bold">Column Subtitle</label>
                <input type="text" name="col3_subtitle" class="form-control form-control-sm" value="<?php echo htmlspecialchars($resource_center['column3']['subtitle'] ?? ''); ?>">
              </div>
              <label class="small fw-bold mb-2">7 Link Rows:</label>
              <?php for ($i = 0; $i < 7; $i++): 
                $lk = $resource_center['column3']['links'][$i] ?? ['icon' => 'fa-file-arrow-down', 'text' => '', 'url' => '', 'is_external' => false];
              ?>
                <div class="p-2 border rounded bg-light mb-2">
                  <div class="d-flex gap-1 mb-1">
                    <input type="text" name="col3_link_icon_<?php echo $i; ?>" class="form-control form-control-sm" style="width:30%;" placeholder="Icon" value="<?php echo htmlspecialchars($lk['icon']); ?>">
                    <input type="text" name="col3_link_text_<?php echo $i; ?>" class="form-control form-control-sm" style="width:70%;" placeholder="Title" value="<?php echo htmlspecialchars($lk['text']); ?>">
                  </div>
                  <div class="d-flex gap-2 align-items-center">
                    <input type="text" name="col3_link_url_<?php echo $i; ?>" class="form-control form-control-sm" placeholder="URL Link" value="<?php echo htmlspecialchars($lk['url']); ?>">
                    <div class="form-check text-nowrap">
                      <input class="form-check-input" type="checkbox" name="col3_link_ext_<?php echo $i; ?>" id="c3_ext_<?php echo $i; ?>" <?php echo (!empty($lk['is_external'])) ? 'checked' : ''; ?>>
                      <label class="form-check-label small" for="c3_ext_<?php echo $i; ?>" title="Open in new tab">Tab</label>
                    </div>
                  </div>
                </div>
              <?php endfor; ?>
            </div>
          </div>
        </div>

        <div class="section-field-card mt-4">
          <h6><i class="fa fa-images text-primary"></i> Glimpses of SSSUTMS Campus (6 Photo Cards)</h6>
          <div class="row g-3 mb-3">
            <div class="col-md-3">
              <label class="form-label small fw-bold">Eyebrow</label>
              <input type="text" name="gal_eyebrow" class="form-control" value="<?php echo htmlspecialchars($gallery_glimpses['eyebrow'] ?? 'Campus Life & Highlights'); ?>">
            </div>
            <div class="col-md-3">
              <label class="form-label small fw-bold">Section Heading</label>
              <input type="text" name="gal_title" class="form-control" value="<?php echo htmlspecialchars($gallery_glimpses['title'] ?? 'Glimpses of SSSUTMS Campus'); ?>">
            </div>
            <div class="col-md-3">
              <label class="form-label small fw-bold">Explore Button Text</label>
              <input type="text" name="gal_btn_text" class="form-control" value="<?php echo htmlspecialchars($gallery_glimpses['explore_btn_text'] ?? 'Explore Full Gallery'); ?>">
            </div>
            <div class="col-md-3">
              <label class="form-label small fw-bold">Explore Button Link</label>
              <input type="text" name="gal_btn_link" class="form-control" value="<?php echo htmlspecialchars($gallery_glimpses['explore_btn_link'] ?? 'gallery.php'); ?>">
            </div>
          </div>
          <div class="row g-3">
            <?php for ($i = 0; $i < 6; $i++): 
              $gc = $gallery_glimpses['items'][$i] ?? ['badge' => '', 'icon' => 'fa-image', 'title' => '', 'image' => '', 'link' => 'gallery.php'];
            ?>
              <div class="col-lg-4 col-md-6">
                <div class="p-3 border rounded bg-light">
                  <span class="badge bg-secondary mb-2">Photo #<?php echo $i + 1; ?></span>
                  <div class="mb-2">
                    <label class="small fw-bold">Card Title</label>
                    <input type="text" name="gal_title_<?php echo $i; ?>" class="form-control form-control-sm" value="<?php echo htmlspecialchars($gc['title']); ?>">
                  </div>
                  <div class="row g-2 mb-2">
                    <div class="col-6">
                      <label class="small fw-bold">Badge Text</label>
                      <input type="text" name="gal_badge_<?php echo $i; ?>" class="form-control form-control-sm" value="<?php echo htmlspecialchars($gc['badge']); ?>">
                    </div>
                    <div class="col-6">
                      <label class="small fw-bold">Icon</label>
                      <input type="text" name="gal_icon_<?php echo $i; ?>" class="form-control form-control-sm" value="<?php echo htmlspecialchars($gc['icon']); ?>">
                    </div>
                  </div>
                  <div class="mb-2">
                    <label class="small fw-bold">Image (Upload or Path)</label>
                    <input type="file" name="gal_img_file_<?php echo $i; ?>" class="form-control form-control-sm" accept="image/*">
                    <input type="text" name="gal_img_text_<?php echo $i; ?>" class="form-control form-control-sm mt-1" value="<?php echo htmlspecialchars($gc['image']); ?>">
                  </div>
                  <div>
                    <label class="small fw-bold">Target Link</label>
                    <input type="text" name="gal_link_<?php echo $i; ?>" class="form-control form-control-sm" value="<?php echo htmlspecialchars($gc['link']); ?>">
                  </div>
                </div>
              </div>
            <?php endfor; ?>
          </div>
        </div>

        <button type="submit" class="btn btn-primary px-4 py-2 fw-bold">
          <i class="fa fa-floppy-disk me-1"></i> Save Resource Center & Gallery
        </button>
      </form>
    </div>

    <!-- =========================================================================
         TAB 7: SEO & META TAGS
         ========================================================================= -->
    <div class="tab-pane-content <?php echo $activeTab === 'seo' ? '' : 'd-none'; ?>" id="tab-seo">
      <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="action" value="save_seo">

        <!-- Top Overview Header Card -->
        <div class="section-field-card mb-4" style="background: linear-gradient(135deg, #0b2545 0%, #133a68 100%); color: #ffffff; border: none;">
          <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
            <div>
              <span class="badge bg-warning text-dark px-3 py-1 mb-2 fw-bold text-uppercase" style="letter-spacing: 0.5px; font-size: 11px;">
                <i class="fa-solid fa-bolt me-1"></i> Search Engine Optimization
              </span>
              <h4 class="fw-bold mb-1 text-white">Home Page SEO &amp; Social Previews</h4>
              <p class="text-white-50 mb-0 small" style="max-width: 680px;">
                Optimize your university homepage for Google, Bing, and Yahoo search snippets, as well as social media platforms (WhatsApp, Facebook, LinkedIn, X/Twitter). All changes update immediately.
              </p>
            </div>
            <div class="d-flex align-items-center gap-2">
              <button type="button" class="btn btn-sm btn-light fw-bold" onclick="populateSeoPresets()">
                <i class="fa-solid fa-wand-magic-sparkles text-primary me-1"></i> Load Recommended Presets
              </button>
              <a href="../index.php" target="_blank" class="btn btn-sm btn-outline-light fw-bold">
                <i class="fa-solid fa-arrow-up-right-from-square me-1"></i> View Live Homepage
              </a>
            </div>
          </div>
        </div>

        <div class="row g-4">
          <!-- Left Column: Live Previews -->
          <div class="col-lg-5">
            <!-- Google Search Live Snippet Card -->
            <div class="section-field-card mb-4">
              <h6 class="mb-3">
                <i class="fa-brands fa-google text-danger"></i> Google Search Snippet Preview
                <span class="badge bg-light text-dark border ms-auto small" style="font-size: 10px;">SERP Preview</span>
              </h6>
              
              <div class="p-3 bg-white border rounded-3 shadow-xs" style="font-family: Arial, sans-serif; background: #ffffff;">
                <div class="d-flex align-items-center gap-2 mb-1">
                  <div class="rounded-circle bg-light border d-flex align-items-center justify-content-center overflow-hidden" style="width: 26px; height: 26px;">
                    <img src="../assets/images/logo/logo.jpg" alt="Favicon" style="width: 100%; height: 100%; object-fit: cover;">
                  </div>
                  <div style="line-height: 1.2;">
                    <div class="text-dark fw-semibold" style="font-size: 13px;">Sri Satya Sai University</div>
                    <div class="text-muted" style="font-size: 11px;">https://sssutms.co.in</div>
                  </div>
                </div>
                <h5 id="seoGoogleTitle" class="fw-normal mb-1" style="color: #1a0dab; font-size: 19px; line-height: 1.3; cursor: pointer; text-decoration: none;">
                  <?php echo htmlspecialchars(!empty($seo['meta_title']) ? $seo['meta_title'] : 'Sri Satya Sai University of Technology & Medical Sciences (SSSUTMS)'); ?>
                </h5>
                <p id="seoGoogleDesc" class="mb-0" style="color: #4d5156; font-size: 13px; line-height: 1.55;">
                  <?php echo htmlspecialchars(!empty($seo['meta_description']) ? $seo['meta_description'] : 'Welcome to Sri Satya Sai University of Technology and Medical Sciences (SSSUTMS), Sehore (Bhopal, MP). Approved by UGC, AICTE, PCI, NCISM, INC, NCH.'); ?>
                </p>
              </div>
              <small class="text-muted d-block mt-2" style="font-size: 11px;">
                <i class="fa fa-circle-info text-info me-1"></i> Real-time emulation of how Google highlights this page in search results.
              </small>
            </div>

            <!-- Social Media Share Card Preview -->
            <div class="section-field-card mb-4">
              <h6 class="mb-3">
                <i class="fa-solid fa-share-nodes text-primary"></i> Social Share Preview (WhatsApp / FB / X)
              </h6>
              <div class="border rounded-3 overflow-hidden bg-light shadow-xs">
                <div style="height: 170px; background: #0b2545; overflow: hidden; position: relative;">
                  <img id="seoOgImgPreview" src="../<?php echo htmlspecialchars(!empty($seo['og_image']) ? $seo['og_image'] : 'assets/images/logo/logo.jpg'); ?>" alt="Social Preview" style="width: 100%; height: 100%; object-fit: cover;" onerror="this.src='../assets/images/logo/logo.jpg'">
                  <div class="position-absolute bottom-0 start-0 w-100 p-2 text-white" style="background: linear-gradient(transparent, rgba(0,0,0,0.7)); font-size: 11px;">
                    <i class="fa-solid fa-camera me-1"></i> Preview Share Image (1200x630 px)
                  </div>
                </div>
                <div class="p-3 bg-white border-top">
                  <div class="text-uppercase text-muted fw-bold mb-1" style="font-size: 10px; letter-spacing: 0.5px;">SSSUTMS.CO.IN</div>
                  <div id="seoOgTitlePreview" class="fw-bold text-dark mb-1" style="font-size: 14px; line-height: 1.35;">
                    <?php echo htmlspecialchars(!empty($seo['og_title']) ? $seo['og_title'] : (!empty($seo['meta_title']) ? $seo['meta_title'] : 'Sri Satya Sai University of Technology & Medical Sciences')); ?>
                  </div>
                  <div id="seoOgDescPreview" class="text-muted small text-truncate" style="font-size: 12px;">
                    <?php echo htmlspecialchars(!empty($seo['og_description']) ? $seo['og_description'] : (!empty($seo['meta_description']) ? $seo['meta_description'] : 'Welcome to Sri Satya Sai University of Technology and Medical Sciences')); ?>
                  </div>
                </div>
              </div>
            </div>

            <!-- Best Practices Card -->
            <div class="section-field-card bg-light border-dashed">
              <h6 class="text-dark mb-2"><i class="fa-solid fa-lightbulb text-warning me-1"></i> SEO Best Practices Tip</h6>
              <ul class="small text-muted ps-3 mb-0" style="line-height: 1.6;">
                <li>Keep Title under <strong>60 characters</strong> to prevent truncation in Google SERP.</li>
                <li>Write a compelling Meta Description between <strong>140-160 characters</strong> with high-intent keywords like <em>Admissions, Engineering, Medical, Sehore</em>.</li>
                <li>Use high quality landscape images (1200x630) for social thumbnails to drive higher click-through rates.</li>
              </ul>
            </div>
          </div>

          <!-- Right Column: SEO Form Fields -->
          <div class="col-lg-7">
            <!-- 1. Primary Meta Tags -->
            <div class="section-field-card mb-4">
              <h6><i class="fa-solid fa-heading text-primary"></i> 1. Primary Page Title &amp; Snippet</h6>
              
              <!-- Meta Title -->
              <div class="mb-3">
                <div class="d-flex justify-content-between align-items-center mb-1">
                  <label class="form-label small fw-bold mb-0">
                    SEO Meta Title (Browser &amp; Search Title) <span class="text-danger">*</span>
                  </label>
                  <small><span id="homeTitleCount" class="fw-bold text-success">0</span> / 60 chars <span id="homeTitleBadge" class="badge bg-secondary ms-1">Recommended: 50-60</span></small>
                </div>
                <input type="text" name="meta_title" id="homeInputMetaTitle" class="form-control" value="<?php echo htmlspecialchars($seo['meta_title'] ?? ''); ?>" placeholder="e.g. Sri Satya Sai University of Technology & Medical Sciences (SSSUTMS)" required oninput="updateHomeSeoLive()">
                <small class="text-muted">The main clickable headline seen in search engine results and browser tabs.</small>
              </div>

              <!-- Meta Description -->
              <div class="mb-3">
                <div class="d-flex justify-content-between align-items-center mb-1">
                  <label class="form-label small fw-bold mb-0">
                    SEO Meta Description <span class="text-danger">*</span>
                  </label>
                  <small><span id="homeDescCount" class="fw-bold text-success">0</span> / 160 chars <span id="homeDescBadge" class="badge bg-secondary ms-1">Recommended: 150-160</span></small>
                </div>
                <textarea name="meta_description" id="homeInputMetaDesc" class="form-control" rows="3" placeholder="Provide a compelling 150-160 character description of Sri Satya Sai University..." required oninput="updateHomeSeoLive()"><?php echo htmlspecialchars($seo['meta_description'] ?? ''); ?></textarea>
                <small class="text-muted">Summary snippet shown by Google beneath your title to attract student admissions &amp; visitors.</small>
              </div>

              <!-- Meta Keywords -->
              <div class="mb-0">
                <label class="form-label small fw-bold mb-1">
                  <i class="fa-solid fa-tags text-warning me-1"></i> Target Meta Keywords (Comma Separated)
                </label>
                <input type="text" name="meta_keywords" id="homeInputKeywords" class="form-control" value="<?php echo htmlspecialchars($seo['meta_keywords'] ?? ''); ?>" placeholder="SSSUTMS, Sri Satya Sai University, Engineering Colleges MP, Medical Sehore, BAMS, BHMS">
                <small class="text-muted">Relevant search terms and course keywords separated by commas.</small>
              </div>
            </div>

            <!-- 2. Social Sharing & Open Graph -->
            <div class="section-field-card mb-4">
              <h6><i class="fa-solid fa-share-from-square text-success"></i> 2. Social Sharing Media (Open Graph &amp; Twitter)</h6>
              
              <!-- OG Image Upload & URL -->
              <div class="mb-3">
                <label class="form-label small fw-bold">Social Share Image (og:image) - Upload New File</label>
                <input type="file" name="og_image_file" id="homeOgFile" class="form-control" accept="image/*" onchange="previewHomeOgFile(this)">
                <small class="text-muted">Upload high resolution image (recommended 1200x630 or 800x800, max 2MB).</small>
              </div>

              <div class="mb-3">
                <label class="form-label small fw-bold">Or Image Relative / Absolute Path</label>
                <input type="text" name="og_image_text" id="homeInputOgImg" class="form-control" value="<?php echo htmlspecialchars($seo['og_image'] ?? 'assets/images/logo/logo.jpg'); ?>" placeholder="assets/images/logo/logo.jpg" oninput="updateHomeSeoLive()">
                <small class="text-muted">Path relative to site root or external https:// image URL.</small>
              </div>

              <div class="row g-3">
                <div class="col-md-6">
                  <label class="form-label small fw-bold">Custom Social Title (Optional)</label>
                  <input type="text" name="og_title" id="homeInputOgTitle" class="form-control" value="<?php echo htmlspecialchars($seo['og_title'] ?? ''); ?>" placeholder="Leave blank to use Meta Title" oninput="updateHomeSeoLive()">
                  <small class="text-muted">Overrides title only for social cards if specified.</small>
                </div>
                <div class="col-md-6">
                  <label class="form-label small fw-bold">Custom Social Description (Optional)</label>
                  <input type="text" name="og_description" id="homeInputOgDesc" class="form-control" value="<?php echo htmlspecialchars($seo['og_description'] ?? ''); ?>" placeholder="Leave blank to use Meta Description" oninput="updateHomeSeoLive()">
                  <small class="text-muted">Overrides description only for social cards if specified.</small>
                </div>
              </div>
            </div>

            <!-- 3. Advanced Indexing & Canonical -->
            <div class="section-field-card mb-4">
              <h6><i class="fa-solid fa-gears text-secondary"></i> 3. Search Engine Directives &amp; Canonical URL</h6>
              
              <div class="row g-3">
                <div class="col-md-6">
                  <label class="form-label small fw-bold">
                    <i class="fa-solid fa-robot me-1 text-info"></i> Robots Indexing Directive
                  </label>
                  <select name="robots" class="form-select">
                    <?php $currRobots = $seo['robots'] ?? 'index, follow'; ?>
                    <option value="index, follow" <?php echo $currRobots === 'index, follow' ? 'selected' : ''; ?>>index, follow (Standard / Recommended)</option>
                    <option value="noindex, follow" <?php echo $currRobots === 'noindex, follow' ? 'selected' : ''; ?>>noindex, follow (Don't index, follow links)</option>
                    <option value="index, nofollow" <?php echo $currRobots === 'index, nofollow' ? 'selected' : ''; ?>>index, nofollow (Index, don't follow links)</option>
                    <option value="noindex, nofollow" <?php echo $currRobots === 'noindex, nofollow' ? 'selected' : ''; ?>>noindex, nofollow (Block all indexing)</option>
                  </select>
                  <small class="text-muted">Instructs search engine web crawlers whether to index this page.</small>
                </div>

                <div class="col-md-6">
                  <label class="form-label small fw-bold">
                    <i class="fa-solid fa-link me-1 text-primary"></i> Canonical URL Override (Optional)
                  </label>
                  <input type="text" name="canonical_url" class="form-control" value="<?php echo htmlspecialchars($seo['canonical_url'] ?? ''); ?>" placeholder="Auto-detected from domain if blank">
                  <small class="text-muted">Leave empty to automatically point to current domain homepage.</small>
                </div>
              </div>
            </div>

            <div class="d-flex align-items-center gap-3">
              <button type="submit" class="btn btn-success px-4 py-2 fw-bold shadow-sm">
                <i class="fa-solid fa-floppy-disk me-1"></i> Save Home Page SEO Settings
              </button>
              <button type="button" class="btn btn-outline-secondary px-3 py-2 fw-semibold" onclick="populateSeoPresets()">
                <i class="fa-solid fa-rotate-left me-1"></i> Reset to Recommended
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>

  </div><!-- /.admin-content-inner -->
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/admin.js"></script>
<script>
  // Tab switcher
  document.querySelectorAll('#homeTabs .home-tab-btn').forEach(btn => {
    btn.addEventListener('click', function() {
      document.querySelectorAll('#homeTabs .home-tab-btn').forEach(b => b.classList.remove('active'));
      document.querySelectorAll('.tab-pane-content').forEach(p => p.classList.add('d-none'));
      this.classList.add('active');
      const targetId = this.getAttribute('data-tab');
      const pane = document.getElementById(targetId);
      if (pane) pane.classList.remove('d-none');
    });
  });

  // Home Page SEO Live Preview and Character Counters
  function updateHomeSeoLive() {
    const titleInput = document.getElementById('homeInputMetaTitle');
    const descInput = document.getElementById('homeInputMetaDesc');
    const ogTitleInput = document.getElementById('homeInputOgTitle');
    const ogDescInput = document.getElementById('homeInputOgDesc');
    const ogImgInput = document.getElementById('homeInputOgImg');

    const googleTitle = document.getElementById('seoGoogleTitle');
    const googleDesc = document.getElementById('seoGoogleDesc');
    const ogTitlePreview = document.getElementById('seoOgTitlePreview');
    const ogDescPreview = document.getElementById('seoOgDescPreview');
    const ogImgPreview = document.getElementById('seoOgImgPreview');

    const titleCount = document.getElementById('homeTitleCount');
    const descCount = document.getElementById('homeDescCount');
    const titleBadge = document.getElementById('homeTitleBadge');
    const descBadge = document.getElementById('homeDescBadge');

    const defaultTitle = 'Sri Satya Sai University of Technology & Medical Sciences (SSSUTMS)';
    const defaultDesc = 'Welcome to Sri Satya Sai University of Technology and Medical Sciences (SSSUTMS), Sehore (Bhopal, MP). Approved by UGC, AICTE, PCI, NCISM, INC, NCH.';

    if (titleInput && googleTitle) {
      const val = titleInput.value.trim();
      const len = titleInput.value.length;
      googleTitle.textContent = val || defaultTitle;
      if (ogTitlePreview) {
        const ogVal = (ogTitleInput && ogTitleInput.value.trim()) ? ogTitleInput.value.trim() : (val || defaultTitle);
        ogTitlePreview.textContent = ogVal;
      }
      if (titleCount) {
        titleCount.textContent = len;
        if (len >= 45 && len <= 65) {
          titleCount.className = 'fw-bold text-success';
          if (titleBadge) { titleBadge.className = 'badge bg-success ms-1'; titleBadge.textContent = 'Optimal Length'; }
        } else if (len > 65) {
          titleCount.className = 'fw-bold text-danger';
          if (titleBadge) { titleBadge.className = 'badge bg-danger ms-1'; titleBadge.textContent = 'Too Long (Truncated)'; }
        } else {
          titleCount.className = 'fw-bold text-warning';
          if (titleBadge) { titleBadge.className = 'badge bg-warning text-dark ms-1'; titleBadge.textContent = 'A bit short'; }
        }
      }
    }

    if (descInput && googleDesc) {
      const val = descInput.value.trim();
      const len = descInput.value.length;
      googleDesc.textContent = val || defaultDesc;
      if (ogDescPreview) {
        const ogVal = (ogDescInput && ogDescInput.value.trim()) ? ogDescInput.value.trim() : (val || defaultDesc);
        ogDescPreview.textContent = ogVal;
      }
      if (descCount) {
        descCount.textContent = len;
        if (len >= 130 && len <= 165) {
          descCount.className = 'fw-bold text-success';
          if (descBadge) { descBadge.className = 'badge bg-success ms-1'; descBadge.textContent = 'Optimal Length'; }
        } else if (len > 165) {
          descCount.className = 'fw-bold text-danger';
          if (descBadge) { descBadge.className = 'badge bg-danger ms-1'; descBadge.textContent = 'Too Long (Truncated)'; }
        } else {
          descCount.className = 'fw-bold text-warning';
          if (descBadge) { descBadge.className = 'badge bg-warning text-dark ms-1'; descBadge.textContent = 'A bit short'; }
        }
      }
    }

    if (ogImgInput && ogImgPreview) {
      const path = ogImgInput.value.trim();
      if (path) {
        ogImgPreview.src = (path.startsWith('http://') || path.startsWith('https://')) ? path : ('../' + path.replace(/^\//, ''));
      }
    }
  }

  function previewHomeOgFile(input) {
    if (input.files && input.files[0]) {
      const reader = new FileReader();
      reader.onload = function(e) {
        const preview = document.getElementById('seoOgImgPreview');
        if (preview) preview.src = e.target.result;
      };
      reader.readAsDataURL(input.files[0]);
    }
  }

  function populateSeoPresets() {
    document.getElementById('homeInputMetaTitle').value = 'Sri Satya Sai University of Technology & Medical Sciences (SSSUTMS)';
    document.getElementById('homeInputMetaDesc').value = 'Welcome to Sri Satya Sai University of Technology and Medical Sciences (SSSUTMS), Sehore (Bhopal, MP). Approved by UGC, AICTE, PCI, NCISM, INC, NCH. Leading University for Engineering, Medical, Pharmacy & Management.';
    document.getElementById('homeInputKeywords').value = 'SSSUTMS, Sri Satya Sai University, Engineering Colleges in MP, Medical Colleges Sehore, Pharmacy, Ayurveda BAMS, BHMS, Admission 2026-27';
    document.getElementById('homeInputOgImg').value = 'assets/images/logo/logo.jpg';
    if (document.getElementById('homeInputOgTitle')) document.getElementById('homeInputOgTitle').value = '';
    if (document.getElementById('homeInputOgDesc')) document.getElementById('homeInputOgDesc').value = '';
    updateHomeSeoLive();
  }

  document.addEventListener('DOMContentLoaded', function() {
    updateHomeSeoLive();
    const urlParams = new URLSearchParams(window.location.search);
    const tabParam = urlParams.get('tab');
    if (tabParam === 'seo' || window.location.hash === '#seo') {
      const seoBtn = document.querySelector('[data-tab="tab-seo"]');
      if (seoBtn) seoBtn.click();
    }
  });
</script>
</body>
</html>
