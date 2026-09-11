<?php
require_once __DIR__ . '/config.php';

// Dynamic SEO & Meta configuration for Home Page from Admin Panel
$home_seo = get_home_section('seo', []);

$meta_title = !empty($home_seo['meta_title']) ? $home_seo['meta_title'] : 'Sri Satya Sai University of Technology & Medical Sciences (SSSUTMS)';
$meta_description = !empty($home_seo['meta_description']) ? $home_seo['meta_description'] : 'Welcome to Sri Satya Sai University of Technology and Medical Sciences (SSSUTMS), Sehore (Bhopal, MP). Approved by UGC, AICTE, PCI, NCISM, INC, NCH. Leading University for Engineering, Medical, Pharmacy & Management.';
$meta_keywords = !empty($home_seo['meta_keywords']) ? $home_seo['meta_keywords'] : 'SSSUTMS, Sri Satya Sai University, Engineering Colleges in MP, Medical Colleges Sehore, Pharmacy, Ayurveda BAMS, BHMS, Admission 2026-27';
$canonical_url = !empty($home_seo['canonical_url']) ? $home_seo['canonical_url'] : '';
$og_image = !empty($home_seo['og_image']) ? $home_seo['og_image'] : 'assets/images/logo/logo.jpg';
$og_title = !empty($home_seo['og_title']) ? $home_seo['og_title'] : '';
$og_description = !empty($home_seo['og_description']) ? $home_seo['og_description'] : '';
$meta_robots = !empty($home_seo['robots']) ? $home_seo['robots'] : 'index, follow';

$page_title = $meta_title;
$page_desc = $meta_description;
$body_class = 'home-page';

require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/topbar.php';
require_once __DIR__ . '/includes/navbar.php';

$notices = get_notices('all');
$events = get_events();

// Load dynamic home page sections with fallbacks
$hero = get_home_section('hero', []);
$quick_access = get_home_section('quick_access', []);
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

$news_badge_colors = [
  'Symposium'  => '#0284c7',
  'FDP'        => '#7e22ce',
  'Placement'  => '#f3752c',
  'Workshop'   => '#059669',
  'Conference' => '#0284c7',
];

// Helper for relative / absolute URL resolution
if (!function_exists('home_url')) {
  function home_url($link) {
    if (empty($link)) return '#';
    if (strpos($link, 'http://') === 0 || strpos($link, 'https://') === 0) {
      return $link;
    }
    return BASE_URL . ltrim($link, '/');
  }
}
?>

<!-- ==========================================================================
     HERO SECTION (Split hero + inline Admission Enquiry Form)
     ========================================================================== -->
<?php
  $heroBg = !empty($hero['background_image']) ? $hero['background_image'] : 'assets/images/slider/IMG-20260112-WA0044.jpg';
  $heroBadge = $hero['badge_text'] ?? 'Admissions Open — Session 2026-27';
  $heroTitleMain = $hero['title_main'] ?? 'Shaping Future Leaders Through';
  $heroTitleHighlight = $hero['title_highlight'] ?? 'Excellence & Innovation';
  $heroDesc = $hero['desc'] ?? 'Empowering students with world-class engineering, medical, ayurveda, pharmacy, and management education across a 100+ acre lush green campus.';
  $heroBtn1Text = $hero['btn_primary_text'] ?? 'Apply Online 2026-27';
  $heroBtn1Link = $hero['btn_primary_link'] ?? 'Admission/AdmissionRegistration.php';
  $heroBtn2Text = $hero['btn_secondary_text'] ?? 'Explore University';
  $heroBtn2Link = $hero['btn_secondary_link'] ?? 'About/Background.php';
  $miniStats = $hero['mini_stats'] ?? [
    ['icon' => 'fa-building-columns', 'num' => '14+', 'lbl' => 'Institutes'],
    ['icon' => 'fa-briefcase', 'num' => '100+', 'lbl' => 'Recruiters'],
    ['icon' => 'fa-award', 'num' => 'UGC', 'lbl' => 'Approved']
  ];
?>
<section id="home" class="hero-v2">
  <div style="position:absolute; inset:0; background-image:url('<?php echo htmlspecialchars(home_url($heroBg)); ?>'); background-size:cover; background-position:center;"></div>
  <div class="hero-v2-overlay"></div>
  <div class="container-fluid px-lg-5 position-relative">
    <div class="row align-items-center g-4">

      <!-- Left: Headline & CTAs -->
      <div class="col-lg-7">
        <span class="hero-v2-badge"><span class="dot"></span> <?php echo htmlspecialchars($heroBadge); ?></span>
        <h1 class="hero-v2-title"><?php echo htmlspecialchars($heroTitleMain); ?> <span class="text-gradient-accent"><?php echo htmlspecialchars($heroTitleHighlight); ?></span></h1>
        <p class="hero-v2-desc"><?php echo htmlspecialchars($heroDesc); ?></p>
        <div class="hero-v2-actions">
          <a href="<?php echo htmlspecialchars(home_url($heroBtn1Link)); ?>" class="btn-hero-primary"><i class="fa fa-pen-nib me-1"></i> <?php echo htmlspecialchars($heroBtn1Text); ?></a>
          <a href="<?php echo htmlspecialchars(home_url($heroBtn2Link)); ?>" class="btn-hero-outline"><i class="fa fa-compass me-1"></i> <?php echo htmlspecialchars($heroBtn2Text); ?></a>
        </div>
        <div class="hero-v2-mini-stats">
          <?php foreach ($miniStats as $ms): ?>
            <div class="item">
              <i class="fa <?php echo htmlspecialchars($ms['icon'] ?? 'fa-star'); ?>"></i>
              <div class="num"><?php echo htmlspecialchars($ms['num'] ?? ''); ?></div>
              <div class="lbl"><?php echo htmlspecialchars($ms['lbl'] ?? ''); ?></div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Right: Admission Enquiry Card -->
      <div class="col-lg-5">
        <div class="hero-enquiry-card">
          <span class="hero-enquiry-eyebrow"><span class="dot"></span> <?php echo htmlspecialchars($hero['enquiry_eyebrow'] ?? 'Enquire Now'); ?></span>
          <h3><?php echo htmlspecialchars($hero['enquiry_title'] ?? 'Admission Enquiry Form'); ?></h3>
          <p class="sub"><?php echo htmlspecialchars($hero['enquiry_sub'] ?? 'Speak with our academic counselors today.'); ?></p>
          <form id="heroEnquiryForm" method="POST" action="<?php echo BASE_URL; ?>submit-handler.php">
            <input type="hidden" name="action" value="submit_inquiry">
            <div class="mb-2">
              <input type="text" name="name" class="form-control" placeholder="Full Name *" required>
            </div>
            <div class="row g-2 mb-2">
              <div class="col-6">
                <input type="email" name="email" class="form-control" placeholder="Email *" required>
              </div>
              <div class="col-6">
                <input type="tel" name="phone" class="form-control" placeholder="Mobile *" required>
              </div>
            </div>
            <div class="mb-2">
              <select name="course" class="form-select" required>
                <option value="">Select Program of Interest</option>
                <option value="B.Tech (Computer Science & Engg)">B.Tech (Computer Science & Engg)</option>
                <option value="B.Tech (Mechanical / Civil / EE)">B.Tech (Mechanical / Civil / EE)</option>
                <option value="BAMS (Ayurveda)">BAMS (Ayurveda)</option>
                <option value="BHMS (Homeopathy)">BHMS (Homeopathy)</option>
                <option value="B.Pharm / M.Pharm">B.Pharm / M.Pharm</option>
                <option value="B.Sc. Nursing">B.Sc. Nursing</option>
                <option value="MBA (Management)">MBA (Management)</option>
                <option value="MCA (Computer Applications)">MCA (Computer Applications)</option>
                <option value="LL.B. (Law)">LL.B. (Law)</option>
                <option value="Ph.D. Research">Ph.D. Research Program</option>
              </select>
            </div>
            <div class="mb-3">
              <textarea name="message" class="form-control" rows="2" placeholder="Message (optional)"></textarea>
            </div>
            <button type="submit" class="btn-submit-enquiry"><i class="fa fa-paper-plane me-1"></i> Submit Enquiry</button>
            <div id="heroEnquiryAlert" class="alert d-none mt-3 mb-0 py-2 small text-center"></div>
          </form>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ==========================================================================
     QUICK ACCESS STRIP
     ========================================================================== -->
<section class="quick-access-strip">
  <div class="container-fluid px-lg-5">
    <div class="row g-3">
      <?php
        $default_qa_cards = [
          ['icon' => 'fa-credit-card', 'title' => 'Online Fee Payment', 'desc' => 'Secure gateway for tuition & hostel fees', 'link' => 'Admission/UniversityAccountDetail.php'],
          ['icon' => 'fa-file-lines', 'title' => 'Examination Portal', 'desc' => 'Results, timetables & re-evaluation', 'link' => 'Examination/Interface.php'],
          ['icon' => 'fa-book', 'title' => 'Syllabus & Curriculum', 'desc' => 'Course-wise updated syllabi', 'link' => 'Download/OutcomeBasedCurriculum/Engineering.php'],
          ['icon' => 'fa-briefcase', 'title' => 'Placement Records', 'desc' => 'Recruiters, packages & alumni stories', 'link' => 'Academic/TrainingAndPlacement/TrainingAndPlacementCell.php']
        ];
        for ($i = 0; $i < 4; $i++):
          $qa = $quick_access[$i] ?? [];
          $icon = !empty($qa['icon']) ? $qa['icon'] : $default_qa_cards[$i]['icon'];
          $title = !empty($qa['title']) ? $qa['title'] : $default_qa_cards[$i]['title'];
          $desc = !empty($qa['desc']) ? $qa['desc'] : $default_qa_cards[$i]['desc'];
          $link = !empty($qa['link']) ? $qa['link'] : $default_qa_cards[$i]['link'];
      ?>
      <div class="col-lg-3 col-md-6">
        <a href="<?php echo htmlspecialchars(home_url($link)); ?>" class="text-decoration-none">
          <div class="quick-access-card">
            <div class="quick-access-icon"><i class="fa <?php echo htmlspecialchars($icon); ?>"></i></div>
            <h6><?php echo htmlspecialchars($title); ?></h6>
            <p><?php echo htmlspecialchars($desc); ?></p>
            <span class="qa-link">Access &rarr;</span>
          </div>
        </a>
      </div>
      <?php endfor; ?>
    </div>
  </div>
</section>

<!-- ==========================================================================
     STATS BAND
     ========================================================================== -->
<section class="stats-band-v2 mt-5">
  <div class="container-fluid px-lg-5">
    <div class="row">
      <?php
        $stat_items = !empty($stats) ? $stats : [
          ['num' => '100', 'plus' => '+', 'lbl' => 'Acres Green Campus'],
          ['num' => '14', 'plus' => '+', 'lbl' => 'Institutes & Faculties'],
          ['num' => '100', 'plus' => '+', 'lbl' => 'Corporate Recruiters'],
          ['num' => '6', 'plus' => '+', 'lbl' => 'Statutory Approvals (UGC, AICTE, PCI, NCISM, INC, NCH and more)']
        ];
        foreach ($stat_items as $st):
      ?>
      <div class="col-6 col-lg-3 stat-box-v2">
        <div class="stat-num"><?php echo htmlspecialchars($st['num']); ?><span class="plus"><?php echo htmlspecialchars($st['plus'] ?? '+'); ?></span></div>
        <div class="stat-lbl"><?php echo htmlspecialchars($st['lbl']); ?></div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ==========================================================================
     WHY SSSUTMS
     ========================================================================== -->
<section id="why-sssutms" class="section-padding bg-white why-section-v2">
  <div class="container-fluid px-lg-5">
    <div class="row g-5 align-items-center">
      <div class="col-lg-6">
        <span class="eyebrow-v2"><?php echo htmlspecialchars($why_sssutms['eyebrow'] ?? 'Why SSSUTMS'); ?></span>
        <h2 class="section-title-v2 mb-4"><?php echo htmlspecialchars($why_sssutms['title_main'] ?? 'A University Built on'); ?> <span class="text-gradient-accent"><?php echo htmlspecialchars($why_sssutms['title_highlight'] ?? 'Values, Vision & Vigour'); ?></span></h2>
        <div class="row g-3">
          <?php
            $why_features = !empty($why_sssutms['features']) ? $why_sssutms['features'] : [
              ['icon' => 'fa-award', 'title' => 'UGC & AICTE Approved', 'desc' => 'Recognized under Section 2(f) of UGC Act, 1956'],
              ['icon' => 'fa-seedling', 'title' => '100+ Acre Green Campus', 'desc' => 'Lush, sustainable & eco-friendly infrastructure'],
              ['icon' => 'fa-building-columns', 'title' => '14 Institutes & Faculties', 'desc' => 'Engineering, Medical, Ayurveda, Pharmacy & Management'],
              ['icon' => 'fa-hospital', 'title' => 'NCISM & NCH Approved', 'desc' => 'Multi-speciality teaching hospitals for BAMS & BHMS'],
              ['icon' => 'fa-briefcase', 'title' => '100% Placement Support', 'desc' => 'Dedicated T&P Cell with 100+ recruiting partners'],
              ['icon' => 'fa-globe', 'title' => 'Global Collaborations', 'desc' => 'MoUs with universities across countries']
            ];
            foreach ($why_features as $wf):
          ?>
          <div class="col-md-6">
            <div class="why-feature-v2">
              <div class="icon"><i class="fa <?php echo htmlspecialchars($wf['icon']); ?>"></i></div>
              <div><h6><?php echo htmlspecialchars($wf['title']); ?></h6><p><?php echo htmlspecialchars($wf['desc']); ?></p></div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="why-media-wrap">
          <div class="why-media-main">
            <img src="<?php echo htmlspecialchars(home_url($why_sssutms['media_main'] ?? 'assets/images/slider/IMG-20260112-WA0044.jpg')); ?>" alt="SSSUTMS Campus" onerror="this.src='<?php echo BASE_URL; ?>assets/images/slider/slide1.jpg'">
            <div class="why-badge-float">
              <i class="fa fa-circle-check fs-3" style="color:#10b981;"></i>
              <div><span class="grade" style="font-size:1rem;"><?php echo htmlspecialchars($why_sssutms['badge_grade'] ?? 'UGC & AICTE'); ?></span><small><?php echo htmlspecialchars($why_sssutms['badge_sub'] ?? 'Approved University'); ?></small></div>
            </div>
          </div>
          <div class="why-media-side"><img src="<?php echo htmlspecialchars(home_url($why_sssutms['media_side1'] ?? 'assets/images/slider/IMG-20250829-WA0023.jpg')); ?>" alt="Campus Life" onerror="this.src='<?php echo BASE_URL; ?>assets/images/slider/AARAMBH.jpg'"></div>
          <div class="why-media-side"><img src="<?php echo htmlspecialchars(home_url($why_sssutms['media_side2'] ?? 'assets/images/slider/IMG-20260112-WA0037.jpg')); ?>" alt="Campus Events" onerror="this.src='<?php echo BASE_URL; ?>assets/images/slider/aamh(2).jpg'"></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ==========================================================================
     UNIVERSITY WELCOME + VC MESSAGE
     ========================================================================= -->
<section id="about" class="section-padding legacy-home-section campus-welcome-section">
  <div class="container-fluid px-lg-5">
    <div class="welcome-section-heading">
      <span class="eyebrow-v2"><?php echo htmlspecialchars($about_vc['eyebrow'] ?? 'About Our University'); ?></span>
      <h2 class="section-title-v2 mb-3"><?php echo htmlspecialchars($about_vc['title_main'] ?? 'Welcome to'); ?> <span class="text-gradient-accent"><?php echo htmlspecialchars($about_vc['title_highlight'] ?? 'Sri Satya Sai University'); ?></span></h2>
      <p class="welcome-section-intro mb-0"><?php echo htmlspecialchars($about_vc['intro'] ?? 'An institution where knowledge, innovation and human values come together to shape responsible professionals.'); ?></p>
    </div>

    <div class="row g-4 g-xl-5 align-items-stretch about-primary-row">

      <!-- VC Message -->
      <div class="col-lg-7 d-flex flex-column">
        <div class="vc-message-card flex-grow-1">
          <div class="vc-message-header">
            <span class="vc-message-icon" aria-hidden="true"><i class="fa fa-quote-left"></i></span>
            <div>
              <span class="vc-message-kicker"><?php echo htmlspecialchars($about_vc['vc_kicker'] ?? 'Leadership Message'); ?></span>
              <h3><?php echo htmlspecialchars($about_vc['vc_title'] ?? "From the Vice Chancellor's Desk"); ?></h3>
            </div>
          </div>
          <p>
            <?php echo !empty($about_vc['vc_para1']) ? $about_vc['vc_para1'] : 'Since its founding in 2013 by merging of several multi-disciplinary institutions, <strong>Sri Satya Sai University of Technology and Medical Sciences Sehore, Bhopal (MP)</strong> is acclaimed for its outstanding contribution to teaching, research and service in Nation building. Today, the University stands to meet the enormous aspirations and expectations of society. Society wants us to nurture professionals and scholars of high caliber, who can offer solutions to a broad range of issues. This requires excellence in teaching and research at par with the best in the world.'; ?>
          </p>
          <p>
            <?php echo !empty($about_vc['vc_para2']) ? $about_vc['vc_para2'] : 'We, at Sri Satya Sai University of Technology and Medical Sciences, continuously aspire to be a breeding ground for positive ideas and emerge as a symbol of openness of thoughts, cultural pluralism and celebrating the unity in the diversity of India. We endeavour to touch the lives of every student by inculcating prudence, efficiency, creativity and compassion to work for the betterment of the marginalized sections of society. We attempt to kindle their sense of responsibility, honesty, conscience, justice and above all commitment to human values.'; ?>
          </p>
          <p>
            <?php echo !empty($about_vc['vc_para3']) ? $about_vc['vc_para3'] : 'We aim to expand our reach to the inaccessible regions through virtual presence and become a center of knowledge osmosis. We seek to empower every inquisitive soul with the best available human resources. We intend to intensify our endeavors to mobilize more resources and create conducive ambience for our faculty, students and staff to actualize their potential.'; ?>
          </p>

          <div class="vc-message-signoff">
            <div>
              <h4><?php echo htmlspecialchars($about_vc['vc_name'] ?? 'Dr. Mukesh Tiwari'); ?></h4>
              <span><?php echo htmlspecialchars($about_vc['vc_designation'] ?? 'Vice Chancellor, SSSUTMS'); ?></span>
            </div>
            <img src="<?php echo htmlspecialchars(home_url($about_vc['vc_emblem'] ?? 'assets/images/logo/logo.jpg')); ?>" alt="Sri Satya Sai University emblem" width="52" height="52">
          </div>
        </div>
      </div>

      <!-- Enhanced Campus Entrance -->
      <div class="col-lg-5 d-flex">
        <figure class="campus-welcome-visual mb-0">
          <div class="campus-welcome-image-wrap">
            <img src="<?php echo htmlspecialchars(home_url($about_vc['campus_image'] ?? 'assets/images/home/campus-entrance-enhanced.jpg')); ?>" alt="Main entrance of Sri Satya Sai University of Technology and Medical Sciences" loading="lazy" decoding="async">
            <span class="campus-location-pill"><i class="fa fa-location-dot"></i> <?php echo htmlspecialchars($about_vc['campus_location'] ?? 'Sehore, Madhya Pradesh'); ?></span>
            <div class="campus-image-shade" aria-hidden="true"></div>
          </div>
          <figcaption class="campus-welcome-caption">
            <span class="campus-caption-eyebrow"><?php echo htmlspecialchars($about_vc['campus_eyebrow'] ?? 'Discover SSSUTMS'); ?></span>
            <h3><?php echo htmlspecialchars($about_vc['campus_heading'] ?? 'A welcoming campus for ambitious minds'); ?></h3>
            <p><?php echo htmlspecialchars($about_vc['campus_desc'] ?? 'Purpose-built spaces for learning, research, healthcare and a vibrant student experience.'); ?></p>
            <div class="campus-caption-facts">
              <span><strong><?php echo htmlspecialchars($about_vc['campus_fact1_bold'] ?? '100+'); ?></strong> <?php echo htmlspecialchars($about_vc['campus_fact1_text'] ?? 'acre campus'); ?></span>
              <span><strong><?php echo htmlspecialchars($about_vc['campus_fact2_bold'] ?? 'Since 2013'); ?></strong> <?php echo htmlspecialchars($about_vc['campus_fact2_text'] ?? 'shaping futures'); ?></span>
            </div>
          </figcaption>
        </figure>
      </div>

    </div><!-- /.about-primary-row -->

  </div><!-- /.container-fluid -->
</section><!-- /#about -->

<!-- ==========================================================================
     PRESS & MEDIA + NOTICE BOARD
     ========================================================================== -->
<section class="section-padding bg-light home-press-notice-section">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 home-media-row-v2">

      <!-- Press & Media -->
      <div class="col-lg-6 d-flex flex-column">
        <div class="hm-section-label mb-3">
          <span class="hm-label-pill"><i class="fa fa-newspaper me-1"></i><?php echo htmlspecialchars($press_media['section_pill'] ?? 'Media'); ?></span>
          <h3 class="hm-section-heading"><span class="hm-accent-word"><?php echo htmlspecialchars($press_media['section_title_accent'] ?? 'Press'); ?></span> <?php echo htmlspecialchars($press_media['section_title_rest'] ?? '& Media'); ?></h3>
        </div>
        <div class="hm-press-card flex-grow-1">
          <span class="hm-live-badge"><span class="hm-live-dot"></span> <?php echo htmlspecialchars($press_media['live_badge'] ?? 'LIVE'); ?></span>
          <div class="hm-press-img-wrap">
            <img src="<?php echo htmlspecialchars(home_url($press_media['image'] ?? 'assets/images/PressAndMedia.jpg')); ?>"
                 alt="<?php echo htmlspecialchars($press_media['title'] ?? 'Press & Media Coverage'); ?>"
                 class="hm-press-img"
                 onerror="this.src='<?php echo BASE_URL; ?>assets/images/slider/HorizonsofAyurved.jpg'">
            <div class="hm-press-gradient"></div>
          </div>
          <div class="hm-press-footer">
            <div class="hm-press-info">
              <h6 class="hm-press-title"><?php echo htmlspecialchars($press_media['title'] ?? 'University News & Press Releases'); ?></h6>
              <small class="hm-press-sub"><?php echo htmlspecialchars($press_media['subtitle'] ?? 'State & National Media Coverage'); ?></small>
            </div>
            <a href="<?php echo htmlspecialchars(home_url($press_media['btn_link'] ?? 'PressMedia.php')); ?>" class="hm-view-more-btn">
              <?php echo htmlspecialchars($press_media['btn_text'] ?? 'View More'); ?> <i class="fa fa-arrow-right ms-1"></i>
            </a>
          </div>
        </div>
      </div>

      <!-- Notice Board -->
      <div class="col-lg-6 d-flex flex-column">
        <div class="hm-section-label mb-3">
          <span class="hm-label-pill hm-label-pill--alert"><i class="fa fa-bell me-1"></i>Notices</span>
          <h3 class="hm-section-heading">Notice Board</h3>
        </div>
        <div class="hm-notice-card flex-grow-1">
          <div class="hm-notice-header">
            <div class="hm-notice-header-left">
              <span class="hm-notice-icon-wrap"><i class="fa fa-bullhorn"></i></span>
              <span class="hm-notice-header-title">Official University Circulars</span>
            </div>
            <a href="<?php echo BASE_URL; ?>Examination/ExamNotifications.php" class="hm-view-all-btn">View All Notices</a>
          </div>
          <div class="hm-notice-list">
            <?php foreach (array_slice($notices, 0, 4) as $n): ?>
              <?php
                $pdfLink = (!empty($n['link']) && $n['link'] !== '#')
                  ? $n['link']
                  : BASE_URL . 'Examination/ExamNotifications.php';
              ?>
              <div class="hm-notice-entry">
                <div class="hm-notice-entry-dot"></div>
                <div class="hm-notice-entry-body">
                  <a href="<?php echo htmlspecialchars($pdfLink); ?>"
                     class="hm-notice-entry-title"
                     target="<?php echo $n['link'] !== '#' ? '_blank' : '_self'; ?>">
                    <?php echo htmlspecialchars($n['title']); ?>
                  </a>
                  <?php if (!empty($n['is_new'])): ?>
                    <span class="hm-new-badge">NEW</span>
                  <?php endif; ?>
                  <div class="hm-notice-entry-date">
                    <i class="fa fa-clock me-1"></i><?php echo date('d-m-Y', strtotime($n['date'])); ?>
                  </div>
                </div>
                <a href="<?php echo htmlspecialchars($pdfLink); ?>" class="hm-pdf-btn" target="_blank">
                  <i class="fa fa-file-pdf"></i> PDF
                </a>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ==========================================================================
     INSTITUTES THAT SHAPE CAREERS
     ========================================================================== -->
<section id="institutes" class="section-padding bg-white institutes-section-v2">
  <div class="container-fluid px-lg-5">
    <div class="text-center mb-5">
      <span class="eyebrow-v2"><?php echo htmlspecialchars($institutes['eyebrow'] ?? 'Academic Excellence'); ?></span>
      <h2 class="section-title-v2"><?php echo htmlspecialchars($institutes['title'] ?? 'Institutes That Shape Careers'); ?></h2>
      <p class="section-sub-v2 mx-auto"><?php echo htmlspecialchars($institutes['subtitle'] ?? 'Multi-disciplinary institutes offering UG, PG, and Ph.D. programs across engineering, medical sciences, and allied disciplines.'); ?></p>
    </div>

    <div class="row g-4">
      <?php
        $inst_cards = !empty($institutes['items']) ? $institutes['items'] : [
          ['title' => 'Engineering & Technology', 'desc' => 'B.Tech, M.Tech across multiple branches', 'image' => 'assets/images/gallery/1/SSSUTMS_Building(8).jpg', 'image_fallback' => 'assets/images/slider/IMG-20260112-WA0044.jpg', 'link' => 'Academic/FacultiesAndDepartments/EngineeringAndTechnology.php'],
          ['title' => 'Medical Sciences', 'desc' => 'BAMS, BHMS & Allied Health (NCISM & NCH approved)', 'image' => 'assets/images/slider/HorizonsofAyurved.jpg', 'image_fallback' => 'assets/images/slider/aamh(2).jpg', 'link' => 'Academic/FacultiesAndDepartments/Ayurveda.php'],
          ['title' => 'Pharmacy', 'desc' => 'B.Pharm, M.Pharm, D.Pharm', 'image' => 'assets/images/gallery/2/img-27.jpg', 'image_fallback' => 'assets/images/slider/IMG-20250829-WA0023.jpg', 'link' => 'Academic/FacultiesAndDepartments/Pharmacy.php'],
          ['title' => 'Management', 'desc' => 'BBA, MBA, Executive Programs', 'image' => 'assets/images/gallery/3/img-26.jpg', 'image_fallback' => 'assets/images/slider/slide1.jpg', 'link' => 'Academic/FacultiesAndDepartments/Management.php'],
          ['title' => 'Law', 'desc' => 'BA LLB, LLM & Legal Research', 'image' => 'assets/images/gallery/4/img-19.jpg', 'image_fallback' => 'assets/images/slider/IMG-20260112-WA0037.jpg', 'link' => 'Academic/FacultiesAndDepartments/Law.php'],
          ['title' => 'Computer Applications', 'desc' => 'BCA, MCA, Data Science', 'image' => 'assets/images/gallery/4/img-13.jpg', 'image_fallback' => 'assets/images/slider/HorizonsofAyurved.jpg', 'link' => 'Academic/FacultiesAndDepartments/ComputerScienceAndApplication.php']
        ];
        foreach ($inst_cards as $inst):
      ?>
      <div class="col-lg-4 col-md-6">
        <div class="institute-card-v2">
          <div class="img-wrap"><img src="<?php echo htmlspecialchars(home_url($inst['image'])); ?>" alt="<?php echo htmlspecialchars($inst['title']); ?>" onerror="this.src='<?php echo BASE_URL . htmlspecialchars($inst['image_fallback'] ?? 'assets/images/slider/slide1.jpg'); ?>'"></div>
          <div class="body">
            <h5><?php echo htmlspecialchars($inst['title']); ?></h5>
            <p><?php echo htmlspecialchars($inst['desc']); ?></p>
            <a href="<?php echo htmlspecialchars(home_url($inst['link'])); ?>" class="explore-link">Explore &rarr;</a>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ==========================================================================
     OUR TOP RECRUITERS
     ========================================================================== -->
<section id="placements" class="section-padding bg-light recruiters-section-v2">
  <div class="container-fluid px-lg-5">
    <div class="recruiters-panel-v2">
      <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
        <div>
          <span class="eyebrow-v2"><?php echo htmlspecialchars($recruiters['eyebrow'] ?? 'Career Success'); ?></span>
          <h3 class="section-title-v2 mb-0" style="font-size: 1.6rem;"><i class="fa fa-trophy me-2"></i><?php echo htmlspecialchars($recruiters['title'] ?? 'Our Top Recruiters'); ?></h3>
        </div>
        <a href="<?php echo htmlspecialchars(home_url($recruiters['report_link'] ?? 'Academic/TrainingAndPlacement/TrainingAndPlacementCell.php')); ?>" class="fw-bold" style="color: var(--accent);"><?php echo htmlspecialchars($recruiters['report_text'] ?? 'View placement report →'); ?></a>
      </div>
      <div class="recruiters-marquee-v2">
        <div class="recruiters-marquee-v2-track">
          <?php
            $recruiter_logos = !empty($recruiters['logos']) ? $recruiters['logos'] : [
              ['file' => 'TCSLogo.jpg', 'name' => 'TCS'], ['file' => 'IBM.jpg', 'name' => 'IBM'], ['file' => 'InfosysLogo.jpg', 'name' => 'Infosys'],
              ['file' => 'WpiroLogo.jpg', 'name' => 'Wipro'], ['file' => 'Accenture.jpg', 'name' => 'Accenture'], ['file' => 'BajajLogo.jpg', 'name' => 'Bajaj'],
            ];
            $loop_logos = array_merge($recruiter_logos, $recruiter_logos);
            foreach ($loop_logos as $rl):
              $logoFile = $rl['file'] ?? '';
              $logoUrl = (strpos($logoFile, 'assets/') === 0)
                ? BASE_URL . $logoFile
                : BASE_URL . 'assets/images/recruiters/' . $logoFile;
          ?>
          <div class="recruiter-box-v2"><img src="<?php echo htmlspecialchars($logoUrl); ?>" alt="<?php echo htmlspecialchars($rl['name'] ?? 'Recruiter'); ?>"></div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ==========================================================================
     EXPERIENCE THE CAMPUS IN PERSON
     ========================================================================== -->
<section id="campus-visit" class="section-padding bg-light campus-section-v2">
  <div class="container-fluid px-lg-5">
    <div class="campus-visit-v2 p-4 p-lg-5">
      <div class="row g-4 align-items-center">
        <div class="col-lg-6 text-white">
          <span class="eyebrow-v2"><?php echo htmlspecialchars($campus_visit['eyebrow'] ?? 'Campus Visit'); ?></span>
          <h2 class="section-title-v2 mb-3" style="color:#ffffff;"><?php echo htmlspecialchars($campus_visit['title_main'] ?? 'Experience the'); ?> <span class="text-gradient-accent"><?php echo htmlspecialchars($campus_visit['title_highlight'] ?? 'SSSUTMS Campus'); ?></span> <?php echo htmlspecialchars($campus_visit['title_end'] ?? 'in Person'); ?></h2>
          <p class="mb-4" style="color:#cbd5e1;"><?php echo htmlspecialchars($campus_visit['desc'] ?? 'Walk through our 100+ acre green campus, meet faculty, tour our labs, hostels, and sports complex — schedule a personal visit and see your future unfold.'); ?></p>

          <div class="row g-2 mb-4">
            <?php
              $visit_slots = !empty($campus_visit['info_items']) ? $campus_visit['info_items'] : [
                ['icon' => 'fa-location-dot', 'lbl' => 'Location', 'val' => 'Sehore, Madhya Pradesh'],
                ['icon' => 'fa-calendar-days', 'lbl' => 'Open Days', 'val' => 'Mon – Sat'],
                ['icon' => 'fa-clock', 'lbl' => 'Visit Slots', 'val' => '10 AM – 5 PM']
              ];
              foreach ($visit_slots as $vi):
            ?>
            <div class="col-md-4">
              <div class="campus-visit-info-item">
                <i class="fa <?php echo htmlspecialchars($vi['icon']); ?>"></i>
                <span class="lbl d-block"><?php echo htmlspecialchars($vi['lbl']); ?></span>
                <span class="val d-block"><?php echo htmlspecialchars($vi['val']); ?></span>
              </div>
            </div>
            <?php endforeach; ?>
          </div>

          <div class="d-flex flex-wrap gap-3">
            <a href="<?php echo htmlspecialchars(home_url($campus_visit['btn_primary_link'] ?? 'contact.php')); ?>" class="btn-hero-primary"><i class="fa <?php echo htmlspecialchars($campus_visit['btn_primary_icon'] ?? 'fa-calendar-check'); ?> me-1"></i> <?php echo htmlspecialchars($campus_visit['btn_primary_text'] ?? 'Schedule a Visit'); ?></a>
            <a href="<?php echo htmlspecialchars(home_url($campus_visit['btn_secondary_link'] ?? 'gallery.php')); ?>" class="btn-hero-outline"><i class="fa <?php echo htmlspecialchars($campus_visit['btn_secondary_icon'] ?? 'fa-photo-film'); ?> me-1"></i> <?php echo htmlspecialchars($campus_visit['btn_secondary_text'] ?? 'Virtual Tour'); ?></a>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="campus-visit-media rounded-4 overflow-hidden">
            <span class="campus-visit-media-tag"><?php echo htmlspecialchars($campus_visit['media_tag'] ?? 'Campus View'); ?></span>
            <img src="<?php echo htmlspecialchars(home_url($campus_visit['image'] ?? 'assets/images/slider/AARAMBH.jpg')); ?>" alt="SSSUTMS Campus View" onerror="this.src='<?php echo BASE_URL; ?>assets/images/slider/IMG-20260112-WA0037.jpg'">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ==========================================================================
     LATEST UPDATES: NEWS, EVENTS & CAMPUS STORIES
     ========================================================================== -->
<section id="latest-updates" class="section-padding bg-white news-section-v2">
  <div class="container-fluid px-lg-5">
    <div class="d-flex justify-content-between align-items-end flex-wrap gap-2 mb-4">
      <div>
        <span class="eyebrow-v2"><?php echo htmlspecialchars($latest_updates_header['eyebrow'] ?? 'Latest Updates'); ?></span>
        <h2 class="section-title-v2 mb-0"><?php echo htmlspecialchars($latest_updates_header['title'] ?? 'News, Events & Campus Stories'); ?></h2>
      </div>
      <a href="<?php echo htmlspecialchars(home_url($latest_updates_header['view_all_link'] ?? 'EVENTS.php')); ?>" class="fw-bold" style="color: var(--accent);"><?php echo htmlspecialchars($latest_updates_header['view_all_text'] ?? 'View all posts →'); ?></a>
    </div>

    <div class="row g-4">
      <?php foreach (array_slice($events, 0, 3) as $ev):
        $badge_color = $news_badge_colors[$ev['category']] ?? '#0b2545';
      ?>
      <div class="col-lg-4 col-md-6">
        <div class="news-card-v2">
          <div class="img-wrap">
            <span class="news-badge-v2" style="background: <?php echo $badge_color; ?>;"><?php echo htmlspecialchars($ev['category']); ?></span>
            <img src="<?php echo BASE_URL . htmlspecialchars($ev['image']); ?>" alt="<?php echo htmlspecialchars($ev['title']); ?>" onerror="this.src='<?php echo BASE_URL; ?>assets/images/slider/slide1.jpg'">
          </div>
          <div class="body">
            <div class="news-meta-top d-flex justify-content-between align-items-center mb-2">
              <div class="date-line mb-0"><i class="fa fa-calendar-days"></i> <?php echo date('d M Y', strtotime($ev['date'])); ?></div>
              <a href="<?php echo BASE_URL; ?>EVENTS.php" class="read-more">Read more &rarr;</a>
            </div>
            <h5><a href="<?php echo BASE_URL; ?>EVENTS.php" class="news-title-link"><?php echo htmlspecialchars($ev['title']); ?></a></h5>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ==========================================================================
     IMPORTANT LINKS, QUICK LINKS, DOWNLOAD LINKS (RESOURCE CENTER)
     ========================================================================== -->
<section class="section-padding bg-light resource-links-section-v2">
  <div class="container-fluid px-lg-5">
    <div class="text-center mb-5">
      <span class="eyebrow-v2"><?php echo htmlspecialchars($resource_center['eyebrow'] ?? 'Academic & Institutional Portals'); ?></span>
      <h2 class="section-title-v2"><?php echo htmlspecialchars($resource_center['title'] ?? 'Quick Access & Resource Center'); ?></h2>
      <p class="section-sub-v2 mx-auto"><?php echo htmlspecialchars($resource_center['subtitle'] ?? 'Instant access to regulatory guidelines, examination results, statutory bodies, syllabus downloads, and student portals.'); ?></p>
    </div>

    <div class="row g-4">
      <?php
      $colsConfig = [
        'col1' => ['key' => 'column1', 'cls' => 'resource-card-blue', 'def_title' => 'Important Links', 'def_sub' => 'Government & University Portals', 'icon' => 'fa-star', 'wrap' => 'col-lg-4 col-md-6 d-flex'],
        'col2' => ['key' => 'column2', 'cls' => 'resource-card-green', 'def_title' => 'Quick Links', 'def_sub' => 'Notifications, Rankings & Results', 'icon' => 'fa-bolt', 'wrap' => 'col-lg-4 col-md-6 d-flex'],
        'col3' => ['key' => 'column3', 'cls' => 'resource-card-orange', 'def_title' => 'Download Links', 'def_sub' => 'Examination Notifications & Timetables', 'icon' => 'fa-circle-down', 'wrap' => 'col-lg-4 col-md-12 d-flex']
      ];
      foreach ($colsConfig as $ck => $cfg):
        $cData = $resource_center[$cfg['key']] ?? [];
        $cLinks = $cData['links'] ?? [];
      ?>
      <div class="<?php echo $cfg['wrap']; ?>">
        <div class="resource-card-v2 <?php echo $cfg['cls']; ?> flex-grow-1">
          <div class="resource-card-header">
            <div class="resource-header-icon"><i class="fa <?php echo htmlspecialchars($cData['icon'] ?? $cfg['icon']); ?>"></i></div>
            <div class="resource-header-info">
              <h5><?php echo htmlspecialchars($cData['title'] ?? $cfg['def_title']); ?></h5>
              <span><?php echo htmlspecialchars($cData['subtitle'] ?? $cfg['def_sub']); ?></span>
            </div>
          </div>
          <div class="resource-card-body">
            <?php foreach ($cLinks as $row): 
              $isExternal = !empty($row['is_external']);
              $targetAttr = $isExternal ? '_blank' : '_self';
              $arrowCls = $isExternal ? 'fa-arrow-up-right-from-square' : 'fa-chevron-right';
            ?>
            <a href="<?php echo htmlspecialchars(home_url($row['url'] ?? '#')); ?>" target="<?php echo $targetAttr; ?>" class="resource-link-row">
              <span class="row-icon"><i class="fa <?php echo htmlspecialchars($row['icon'] ?? 'fa-file'); ?>"></i></span>
              <span class="row-text"><?php echo htmlspecialchars($row['text'] ?? ''); ?></span>
              <span class="row-arrow"><i class="fa-solid <?php echo $arrowCls; ?>"></i></span>
            </a>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ==========================================================================
     PHOTO GALLERY (CAMPUS GLIMPSES)
     ========================================================================== -->
<section class="section-padding bg-white home-gallery-section-v2">
  <div class="container-fluid px-lg-5">
    <div class="d-flex justify-content-between align-items-end flex-wrap gap-3 mb-4">
      <div>
        <span class="eyebrow-v2"><?php echo htmlspecialchars($gallery_glimpses['eyebrow'] ?? 'Campus Life & Highlights'); ?></span>
        <h2 class="section-title-v2 mb-0"><?php echo htmlspecialchars($gallery_glimpses['title'] ?? 'Glimpses of SSSUTMS Campus'); ?></h2>
      </div>
      <a href="<?php echo htmlspecialchars(home_url($gallery_glimpses['explore_btn_link'] ?? 'gallery.php')); ?>" class="btn-gallery-explore">
        <span><?php echo htmlspecialchars($gallery_glimpses['explore_btn_text'] ?? 'Explore Full Gallery'); ?></span> <i class="fa fa-arrow-right"></i>
      </a>
    </div>

    <div class="row g-4">
      <?php
        $gallery_items = !empty($gallery_glimpses['items']) ? $gallery_glimpses['items'] : [
          ['badge' => 'Infrastructure', 'icon' => 'fa-building', 'title' => 'Campus Infrastructure', 'image' => 'assets/images/gallery/1/SSSUTMS_Building(8).jpg', 'image_fallback' => 'assets/images/slider/IMG-20260112-WA0044.jpg', 'link' => 'gallery.php'],
          ['badge' => 'Student Living', 'icon' => 'fa-hotel', 'title' => 'Hostel Facilities', 'image' => 'assets/images/gallery/2/img-27.jpg', 'image_fallback' => 'assets/images/slider/IMG-20250829-WA0023.jpg', 'link' => 'gallery.php'],
          ['badge' => 'Research & Labs', 'icon' => 'fa-flask', 'title' => 'Modern Laboratories', 'image' => 'assets/images/gallery/3/img-26.jpg', 'image_fallback' => 'assets/images/slider/slide1.jpg', 'link' => 'gallery.php'],
          ['badge' => 'Knowledge Hub', 'icon' => 'fa-book-open', 'title' => 'Central Library', 'image' => 'assets/images/gallery/4/img-19.jpg', 'image_fallback' => 'assets/images/slider/IMG-20260112-WA0037.jpg', 'link' => 'gallery.php'],
          ['badge' => 'Placements', 'icon' => 'fa-briefcase', 'title' => 'Rojgar Mela 2026', 'image' => 'assets/images/events/rec.jpg', 'image_fallback' => 'assets/images/slider/HorizonsofAyurved.jpg', 'link' => 'gallery.php'],
          ['badge' => 'Cultural Fest', 'icon' => 'fa-masks-theater', 'title' => 'Youth Festival (Aarambh)', 'image' => 'assets/images/slider/aamh(2).jpg', 'image_fallback' => 'assets/images/slider/AARAMBH.jpg', 'link' => 'gallery.php']
        ];
        foreach ($gallery_items as $gc):
      ?>
      <div class="col-lg-4 col-md-6">
        <a href="<?php echo htmlspecialchars(home_url($gc['link'] ?? 'gallery.php')); ?>" class="gallery-card-v2">
          <div class="gallery-card-img-wrap">
            <span class="gallery-card-badge"><i class="fa <?php echo htmlspecialchars($gc['icon'] ?? 'fa-camera'); ?> me-1"></i> <?php echo htmlspecialchars($gc['badge'] ?? ''); ?></span>
            <img src="<?php echo htmlspecialchars(home_url($gc['image'] ?? '')); ?>" alt="<?php echo htmlspecialchars($gc['title'] ?? ''); ?>" onerror="this.src='<?php echo BASE_URL . htmlspecialchars($gc['image_fallback'] ?? 'assets/images/slider/slide1.jpg'); ?>'">
            <div class="gallery-card-gradient"></div>
            <div class="gallery-card-footer">
              <h5 class="gallery-card-title"><?php echo htmlspecialchars($gc['title'] ?? ''); ?></h5>
              <span class="gallery-card-action"><i class="fa fa-expand"></i> View</span>
            </div>
          </div>
        </a>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ==========================================================================
     FLOATING ADMISSION BOX
     ========================================================================== -->
<?php if (!isset($floating_box['is_enabled']) || !empty($floating_box['is_enabled'])): ?>
<div class="floating-admission-box shadow-lg" id="floatingBox" style="display:none;">
  <button type="button" class="close-floating-btn" onclick="document.getElementById('floatingBox').style.display='none';">&times;</button>
  <h6 class="fw-bold text-primary mb-1"><?php echo htmlspecialchars($floating_box['title'] ?? '🎓 Admission Session 2026-27'); ?></h6>
  <p class="small text-muted mb-2"><?php echo htmlspecialchars($floating_box['desc'] ?? 'Online applications are open for Undergraduate, Postgraduate, and Ph.D. programs.'); ?></p>
  <a href="<?php echo htmlspecialchars(home_url($floating_box['btn_link'] ?? 'Admission/AdmissionRegistration.php')); ?>" class="btn btn-warning btn-sm w-100 fw-bold text-dark rounded-pill"><?php echo htmlspecialchars($floating_box['btn_text'] ?? 'Apply Online (E-Pravesh)'); ?></a>
</div>
<?php endif; ?>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
