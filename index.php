<?php
$page_title = 'Sri Satya Sai University of Technology & Medical Sciences (SSSUTMS)';
$page_desc = 'Welcome to Sri Satya Sai University of Technology and Medical Sciences (SSSUTMS), Sehore (Bhopal, MP). Approved by UGC, AICTE, PCI, NCISM, INC, NCH.';
$body_class = 'home-page';

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/topbar.php';
require_once __DIR__ . '/includes/navbar.php';

$notices = get_notices('all');
$events = get_events();

$news_badge_colors = [
  'Symposium'  => '#0284c7',
  'FDP'        => '#7e22ce',
  'Placement'  => '#f3752c',
  'Workshop'   => '#059669',
  'Conference' => '#0284c7',
];
?>

<!-- ==========================================================================
     HERO SECTION (Split hero + inline Admission Enquiry Form)
     ========================================================================== -->
<section id="home" class="hero-v2">
  <div style="position:absolute; inset:0; background-image:url('<?php echo BASE_URL; ?>assets/images/slider/IMG-20260112-WA0044.jpg'); background-size:cover; background-position:center;"></div>
  <div class="hero-v2-overlay"></div>
  <div class="container-fluid px-lg-5 position-relative">
    <div class="row align-items-center g-4">

      <!-- Left: Headline & CTAs -->
      <div class="col-lg-7">
        <span class="hero-v2-badge"><span class="dot"></span> Admissions Open &mdash; Session 2026-27</span>
        <h1 class="hero-v2-title">Shaping Future Leaders Through <span class="text-gradient-accent">Excellence &amp; Innovation</span></h1>
        <p class="hero-v2-desc">Empowering students with world-class engineering, medical, ayurveda, pharmacy, and management education across a 100+ acre lush green campus.</p>
        <div class="hero-v2-actions">
          <a href="<?php echo BASE_URL; ?>Admission/AdmissionRegistration.php" class="btn-hero-primary"><i class="fa fa-pen-nib me-1"></i> Apply Online 2026-27</a>
          <a href="<?php echo BASE_URL; ?>About/Background.php" class="btn-hero-outline"><i class="fa fa-compass me-1"></i> Explore University</a>
        </div>
        <div class="hero-v2-mini-stats">
          <div class="item"><i class="fa fa-building-columns"></i><div class="num">14+</div><div class="lbl">Institutes</div></div>
          <div class="item"><i class="fa fa-briefcase"></i><div class="num">100+</div><div class="lbl">Recruiters</div></div>
          <div class="item"><i class="fa fa-award"></i><div class="num">UGC</div><div class="lbl">Approved</div></div>
        </div>
      </div>

      <!-- Right: Admission Enquiry Card -->
      <div class="col-lg-5">
        <div class="hero-enquiry-card">
          <span class="hero-enquiry-eyebrow"><span class="dot"></span> Enquire Now</span>
          <h3>Admission Enquiry Form</h3>
          <p class="sub">Speak with our academic counselors today.</p>
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
      <div class="col-lg-3 col-md-6">
        <a href="<?php echo BASE_URL; ?>Admission/UniversityAccountDetail.php" class="text-decoration-none">
          <div class="quick-access-card">
            <div class="quick-access-icon"><i class="fa fa-credit-card"></i></div>
            <h6>Online Fee Payment</h6>
            <p>Secure gateway for tuition &amp; hostel fees</p>
            <span class="qa-link">Access &rarr;</span>
          </div>
        </a>
      </div>
      <div class="col-lg-3 col-md-6">
        <a href="<?php echo BASE_URL; ?>Examination/Interface.php" class="text-decoration-none">
          <div class="quick-access-card">
            <div class="quick-access-icon"><i class="fa fa-file-lines"></i></div>
            <h6>Examination Portal</h6>
            <p>Results, timetables &amp; re-evaluation</p>
            <span class="qa-link">Access &rarr;</span>
          </div>
        </a>
      </div>
      <div class="col-lg-3 col-md-6">
        <a href="<?php echo BASE_URL; ?>Download/OutcomeBasedCurriculum/Engineering.php" class="text-decoration-none">
          <div class="quick-access-card">
            <div class="quick-access-icon"><i class="fa fa-book"></i></div>
            <h6>Syllabus &amp; Curriculum</h6>
            <p>Course-wise updated syllabi</p>
            <span class="qa-link">Access &rarr;</span>
          </div>
        </a>
      </div>
      <div class="col-lg-3 col-md-6">
        <a href="<?php echo BASE_URL; ?>Academic/TrainingAndPlacement/TrainingAndPlacementCell.php" class="text-decoration-none">
          <div class="quick-access-card">
            <div class="quick-access-icon"><i class="fa fa-briefcase"></i></div>
            <h6>Placement Records</h6>
            <p>Recruiters, packages &amp; alumni stories</p>
            <span class="qa-link">Access &rarr;</span>
          </div>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- ==========================================================================
     STATS BAND
     ========================================================================== -->
<section class="stats-band-v2 mt-5">
  <div class="container-fluid px-lg-5">
    <div class="row">
      <div class="col-6 col-lg-3 stat-box-v2">
        <div class="stat-num">100<span class="plus">+</span></div>
        <div class="stat-lbl">Acres Green Campus</div>
      </div>
      <div class="col-6 col-lg-3 stat-box-v2">
        <div class="stat-num">14<span class="plus">+</span></div>
        <div class="stat-lbl">Institutes &amp; Faculties</div>
      </div>
      <div class="col-6 col-lg-3 stat-box-v2">
        <div class="stat-num">100<span class="plus">+</span></div>
        <div class="stat-lbl">Corporate Recruiters</div>
      </div>
      <div class="col-6 col-lg-3 stat-box-v2">
        <div class="stat-num">6<span class="plus">+</span></div>
        <div class="stat-lbl">Statutory Approvals (UGC, AICTE, PCI, NCISM, INC, NCH and more)</div>
      </div>
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
        <span class="eyebrow-v2">Why SSSUTMS</span>
        <h2 class="section-title-v2 mb-4">A University Built on <span class="text-gradient-accent">Values, Vision &amp; Vigour</span></h2>
        <div class="row g-3">
          <div class="col-md-6">
            <div class="why-feature-v2">
              <div class="icon"><i class="fa fa-award"></i></div>
              <div><h6>UGC &amp; AICTE Approved</h6><p>Recognized under Section 2(f) of UGC Act, 1956</p></div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="why-feature-v2">
              <div class="icon"><i class="fa fa-seedling"></i></div>
              <div><h6>100+ Acre Green Campus</h6><p>Lush, sustainable &amp; eco-friendly infrastructure</p></div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="why-feature-v2">
              <div class="icon"><i class="fa fa-building-columns"></i></div>
              <div><h6>14 Institutes &amp; Faculties</h6><p>Engineering, Medical, Ayurveda, Pharmacy &amp; Management</p></div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="why-feature-v2">
              <div class="icon"><i class="fa fa-hospital"></i></div>
              <div><h6>NCISM &amp; NCH Approved</h6><p>Multi-speciality teaching hospitals for BAMS &amp; BHMS</p></div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="why-feature-v2">
              <div class="icon"><i class="fa fa-briefcase"></i></div>
              <div><h6>100% Placement Support</h6><p>Dedicated T&amp;P Cell with 100+ recruiting partners</p></div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="why-feature-v2">
              <div class="icon"><i class="fa fa-globe"></i></div>
              <div><h6>Global Collaborations</h6><p>MoUs with universities across countries</p></div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="why-media-wrap">
          <div class="why-media-main">
            <img src="<?php echo BASE_URL; ?>assets/images/slider/IMG-20260112-WA0044.jpg" alt="SSSUTMS Campus" onerror="this.src='<?php echo BASE_URL; ?>assets/images/slider/slide1.jpg'">
            <div class="why-badge-float">
              <i class="fa fa-circle-check fs-3" style="color:#10b981;"></i>
              <div><span class="grade" style="font-size:1rem;">UGC &amp; AICTE</span><small>Approved University</small></div>
            </div>
          </div>
          <div class="why-media-side"><img src="<?php echo BASE_URL; ?>assets/images/slider/IMG-20250829-WA0023.jpg" alt="Campus Life" onerror="this.src='<?php echo BASE_URL; ?>assets/images/slider/AARAMBH.jpg'"></div>
          <div class="why-media-side"><img src="<?php echo BASE_URL; ?>assets/images/slider/IMG-20260112-WA0037.jpg" alt="Campus Events" onerror="this.src='<?php echo BASE_URL; ?>assets/images/slider/aamh(2).jpg'"></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ==========================================================================
     UNIVERSITY WELCOME + VC MESSAGE
     ========================================================================== -->
<section id="about" class="section-padding legacy-home-section campus-welcome-section">
  <div class="container-fluid px-lg-5">
    <div class="welcome-section-heading">
      <span class="eyebrow-v2">About Our University</span>
      <h2 class="section-title-v2 mb-3">Welcome to <span class="text-gradient-accent">Sri Satya Sai University</span></h2>
      <p class="welcome-section-intro mb-0">An institution where knowledge, innovation and human values come together to shape responsible professionals.</p>
    </div>

    <div class="row g-4 g-xl-5 align-items-stretch about-primary-row">

      <!-- VC Message -->
      <div class="col-lg-7 d-flex flex-column">
        <div class="vc-message-card flex-grow-1">
          <div class="vc-message-header">
            <span class="vc-message-icon" aria-hidden="true"><i class="fa fa-quote-left"></i></span>
            <div>
              <span class="vc-message-kicker">Leadership Message</span>
              <h3>From the Vice Chancellor's Desk</h3>
            </div>
          </div>
          <p>
            Since its founding in 2013 by merging of several multi-disciplinary institutions, <strong>Sri Satya Sai University of Technology and Medical Sciences Sehore, Bhopal (MP)</strong> is acclaimed for its outstanding contribution to teaching, research and service in Nation building. Today, the University stands to meet the enormous aspirations and expectations of society. Society wants us to nurture professionals and scholars of high caliber, who can offer solutions to a broad range of issues. This requires excellence in teaching and research at par with the best in the world.
          </p>
          <p>
            We, at Sri Satya Sai University of Technology and Medical Sciences, continuously aspire to be a breeding ground for positive ideas and emerge as a symbol of openness of thoughts, cultural pluralism and celebrating the unity in the diversity of India. We endeavour to touch the lives of every student by inculcating prudence, efficiency, creativity and compassion to work for the betterment of the marginalized sections of society. We attempt to kindle their sense of responsibility, honesty, conscience, justice and above all commitment to human values.
          </p>
          <p>
            We aim to expand our reach to the inaccessible regions through virtual presence and become a center of knowledge osmosis. We seek to empower every inquisitive soul with the best available human resources. We intend to intensify our endeavors to mobilize more resources and create conducive ambience for our faculty, students and staff to actualize their potential.
          </p>

          <div class="vc-message-signoff">
            <div>
              <h4>Dr. Mukesh Tiwari</h4>
              <span>Vice Chancellor, SSSUTMS</span>
            </div>
            <img src="<?php echo BASE_URL; ?>assets/images/logo/logo.jpg" alt="Sri Satya Sai University emblem" width="52" height="52">
          </div>
        </div>
      </div>

      <!-- Enhanced Campus Entrance -->
      <div class="col-lg-5 d-flex">
        <figure class="campus-welcome-visual mb-0">
          <div class="campus-welcome-image-wrap">
            <img src="<?php echo BASE_URL; ?>assets/images/home/campus-entrance-enhanced.jpg" alt="Main entrance of Sri Satya Sai University of Technology and Medical Sciences" loading="lazy" decoding="async">
            <span class="campus-location-pill"><i class="fa fa-location-dot"></i> Sehore, Madhya Pradesh</span>
            <div class="campus-image-shade" aria-hidden="true"></div>
          </div>
          <figcaption class="campus-welcome-caption">
            <span class="campus-caption-eyebrow">Discover SSSUTMS</span>
            <h3>A welcoming campus for ambitious minds</h3>
            <p>Purpose-built spaces for learning, research, healthcare and a vibrant student experience.</p>
            <div class="campus-caption-facts">
              <span><strong>100+</strong> acre campus</span>
              <span><strong>Since 2013</strong> shaping futures</span>
            </div>
          </div>
        </figure>
      </div>

    </div>

    <!-- Press & Media + Notice Board -->
    <div class="row g-4 mt-3 home-media-row">

      <div class="col-lg-6">
        <div class="heading-line-bottom mb-3">
          <h3 class="section-title mb-0"><span style="color: var(--accent);">Press</span> &amp; Media</h3>
        </div>

        <div class="card border-0 shadow-sm rounded-3 overflow-hidden bg-white press-media-card">
          <div class="position-relative overflow-hidden" style="max-height: 280px;">
            <img src="<?php echo BASE_URL; ?>assets/images/PressAndMedia.jpg" alt="Press & Media Coverage" class="w-100 object-fit-cover" onerror="this.src='<?php echo BASE_URL; ?>assets/images/slider/HorizonsofAyurved.jpg'">
            <div class="position-absolute bottom-0 start-0 end-0 p-3 bg-dark bg-opacity-75 text-white d-flex justify-content-between align-items-center press-media-overlay">
              <div>
                <h6 class="mb-0 fw-bold text-white">University News &amp; Press Releases</h6>
                <small class="text-white-50">State &amp; National Media Coverage</small>
              </div>
              <a href="<?php echo BASE_URL; ?>PressMedia.php" class="btn btn-warning btn-sm rounded-pill fw-bold text-dark">View More &gt;&gt;</a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="heading-line-bottom mb-3">
          <h3 class="section-title mb-0">Notice Board</h3>
        </div>

        <div class="card border-0 shadow-sm rounded-3 overflow-hidden notice-board-home-card" style="background-image: url('<?php echo BASE_URL; ?>assets/images/NoticeBoard.jpg'); background-size: cover; background-position: center; min-height: 280px;">
          <div class="p-3 bg-dark bg-opacity-75 text-white d-flex justify-content-between align-items-center notice-board-home-header">
            <h6 class="mb-0 fw-bold text-white"><i class="fa fa-bell text-warning me-2"></i> Official University Circulars</h6>
            <a href="<?php echo BASE_URL; ?>Examination/ExamNotifications.php" class="badge bg-warning text-dark text-decoration-none">View All Notices</a>
          </div>

          <div class="p-3 notice-board-home-list" style="max-height: 230px; overflow-y: auto;">
            <?php foreach (array_slice($notices, 0, 4) as $n): ?>
              <?php
                $pdfLink = (!empty($n['link']) && $n['link'] !== '#')
                  ? $n['link']
                  : BASE_URL . 'Examination/ExamNotifications.php';
              ?>
              <div class="p-2 mb-2 rounded bg-white bg-opacity-95 shadow-sm d-flex justify-content-between align-items-center notice-entry">
                <div class="pe-2">
                  <h6 class="fw-bold text-dark mb-1" style="font-size: 13px;">
                    <a href="<?php echo htmlspecialchars($pdfLink); ?>" class="text-dark text-decoration-none" target="<?php echo $n['link'] !== '#' ? '_blank' : '_self'; ?>"><?php echo htmlspecialchars($n['title']); ?></a>
                    <?php if (!empty($n['is_new'])): ?>
                      <span class="badge bg-danger" style="font-size: 9px;">NEW</span>
                    <?php endif; ?>
                  </h6>
                  <small class="text-muted"><i class="fa fa-clock me-1"></i> <?php echo date('d-m-Y', strtotime($n['date'])); ?></small>
                </div>
                <a href="<?php echo htmlspecialchars($pdfLink); ?>" class="btn btn-sm btn-outline-primary flex-shrink-0" style="font-size: 11px;" target="_blank"><i class="fa fa-file-pdf text-danger me-1"></i> PDF</a>
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
      <span class="eyebrow-v2">Academic Excellence</span>
      <h2 class="section-title-v2">Institutes That Shape Careers</h2>
      <p class="section-sub-v2 mx-auto">Multi-disciplinary institutes offering UG, PG, and Ph.D. programs across engineering, medical sciences, and allied disciplines.</p>
    </div>

    <div class="row g-4">
      <div class="col-lg-4 col-md-6">
        <div class="institute-card-v2">
          <div class="img-wrap"><img src="<?php echo BASE_URL; ?>assets/images/gallery/1/SSSUTMS_Building(8).jpg" alt="Engineering & Technology" onerror="this.src='<?php echo BASE_URL; ?>assets/images/slider/IMG-20260112-WA0044.jpg'"></div>
          <div class="body">
            <h5>Engineering &amp; Technology</h5>
            <p>B.Tech, M.Tech across multiple branches</p>
            <a href="<?php echo BASE_URL; ?>Academic/FacultiesAndDepartments/EngineeringAndTechnology.php" class="explore-link">Explore &rarr;</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="institute-card-v2">
          <div class="img-wrap"><img src="<?php echo BASE_URL; ?>assets/images/slider/HorizonsofAyurved.jpg" alt="Medical Sciences" onerror="this.src='<?php echo BASE_URL; ?>assets/images/slider/aamh(2).jpg'"></div>
          <div class="body">
            <h5>Medical Sciences</h5>
            <p>BAMS, BHMS &amp; Allied Health (NCISM &amp; NCH approved)</p>
            <a href="<?php echo BASE_URL; ?>Academic/FacultiesAndDepartments/Ayurveda.php" class="explore-link">Explore &rarr;</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="institute-card-v2">
          <div class="img-wrap"><img src="<?php echo BASE_URL; ?>assets/images/gallery/2/img-27.jpg" alt="Pharmacy" onerror="this.src='<?php echo BASE_URL; ?>assets/images/slider/IMG-20250829-WA0023.jpg'"></div>
          <div class="body">
            <h5>Pharmacy</h5>
            <p>B.Pharm, M.Pharm, D.Pharm</p>
            <a href="<?php echo BASE_URL; ?>Academic/FacultiesAndDepartments/Pharmacy.php" class="explore-link">Explore &rarr;</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="institute-card-v2">
          <div class="img-wrap"><img src="<?php echo BASE_URL; ?>assets/images/gallery/3/img-26.jpg" alt="Management" onerror="this.src='<?php echo BASE_URL; ?>assets/images/slider/slide1.jpg'"></div>
          <div class="body">
            <h5>Management</h5>
            <p>BBA, MBA, Executive Programs</p>
            <a href="<?php echo BASE_URL; ?>Academic/FacultiesAndDepartments/Management.php" class="explore-link">Explore &rarr;</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="institute-card-v2">
          <div class="img-wrap"><img src="<?php echo BASE_URL; ?>assets/images/gallery/4/img-19.jpg" alt="Law" onerror="this.src='<?php echo BASE_URL; ?>assets/images/slider/IMG-20260112-WA0037.jpg'"></div>
          <div class="body">
            <h5>Law</h5>
            <p>BA LLB, LLM &amp; Legal Research</p>
            <a href="<?php echo BASE_URL; ?>Academic/FacultiesAndDepartments/Law.php" class="explore-link">Explore &rarr;</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="institute-card-v2">
          <div class="img-wrap"><img src="<?php echo BASE_URL; ?>assets/images/gallery/4/img-13.jpg" alt="Computer Applications" onerror="this.src='<?php echo BASE_URL; ?>assets/images/slider/HorizonsofAyurved.jpg'"></div>
          <div class="body">
            <h5>Computer Applications</h5>
            <p>BCA, MCA, Data Science</p>
            <a href="<?php echo BASE_URL; ?>Academic/FacultiesAndDepartments/ComputerScienceAndApplication.php" class="explore-link">Explore &rarr;</a>
          </div>
        </div>
      </div>
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
          <span class="eyebrow-v2">Career Success</span>
          <h3 class="section-title-v2 mb-0" style="font-size: 1.6rem;"><i class="fa fa-trophy me-2"></i>Our Top Recruiters</h3>
        </div>
        <a href="<?php echo BASE_URL; ?>Academic/TrainingAndPlacement/TrainingAndPlacementCell.php" class="fw-bold" style="color: var(--accent);">View placement report &rarr;</a>
      </div>
      <div class="recruiters-marquee-v2">
        <div class="recruiters-marquee-v2-track">
          <?php
            $recruiter_logos = [
              ['TCSLogo.jpg', 'TCS'], ['IBM.jpg', 'IBM'], ['InfosysLogo.jpg', 'Infosys'],
              ['WpiroLogo.jpg', 'Wipro'], ['Accenture.jpg', 'Accenture'], ['BajajLogo.jpg', 'Bajaj'],
            ];
            $loop_logos = array_merge($recruiter_logos, $recruiter_logos);
            foreach ($loop_logos as $rl):
          ?>
          <div class="recruiter-box-v2" style="width:160px; flex-shrink:0;"><img src="<?php echo BASE_URL; ?>assets/images/recruiters/<?php echo $rl[0]; ?>" alt="<?php echo htmlspecialchars($rl[1]); ?>"></div>
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
          <span class="eyebrow-v2">Campus Visit</span>
          <h2 class="section-title-v2 mb-3" style="color:#ffffff;">Experience the <span class="text-gradient-accent">SSSUTMS Campus</span> in Person</h2>
          <p class="mb-4" style="color:#cbd5e1;">Walk through our 100+ acre green campus, meet faculty, tour our labs, hostels, and sports complex &mdash; schedule a personal visit and see your future unfold.</p>

          <div class="row g-2 mb-4">
            <div class="col-md-4">
              <div class="campus-visit-info-item">
                <i class="fa fa-location-dot"></i>
                <span class="lbl d-block">Location</span>
                <span class="val d-block">Sehore, Madhya Pradesh</span>
              </div>
            </div>
            <div class="col-md-4">
              <div class="campus-visit-info-item">
                <i class="fa fa-calendar-days"></i>
                <span class="lbl d-block">Open Days</span>
                <span class="val d-block">Mon &ndash; Sat</span>
              </div>
            </div>
            <div class="col-md-4">
              <div class="campus-visit-info-item">
                <i class="fa fa-clock"></i>
                <span class="lbl d-block">Visit Slots</span>
                <span class="val d-block">10 AM &ndash; 5 PM</span>
              </div>
            </div>
          </div>

          <div class="d-flex flex-wrap gap-3">
            <a href="<?php echo BASE_URL; ?>contact.php" class="btn-hero-primary"><i class="fa fa-calendar-check me-1"></i> Schedule a Visit</a>
            <a href="<?php echo BASE_URL; ?>gallery.php" class="btn-hero-outline"><i class="fa fa-photo-film me-1"></i> Virtual Tour</a>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="campus-visit-media rounded-4 overflow-hidden">
            <span class="campus-visit-media-tag">Campus View</span>
            <img src="<?php echo BASE_URL; ?>assets/images/slider/AARAMBH.jpg" alt="SSSUTMS Campus View" onerror="this.src='<?php echo BASE_URL; ?>assets/images/slider/IMG-20260112-WA0037.jpg'">
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
        <span class="eyebrow-v2">Latest Updates</span>
        <h2 class="section-title-v2 mb-0">News, Events &amp; Campus Stories</h2>
      </div>
      <a href="<?php echo BASE_URL; ?>EVENTS.php" class="fw-bold" style="color: var(--accent);">View all posts &rarr;</a>
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
            <div class="date-line"><i class="fa fa-calendar-days"></i> <?php echo date('d M Y', strtotime($ev['date'])); ?></div>
            <h5><?php echo htmlspecialchars($ev['title']); ?></h5>
            <a href="<?php echo BASE_URL; ?>EVENTS.php" class="read-more">Read more &rarr;</a>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ==========================================================================
     IMPORTANT LINKS, QUICK LINKS, DOWNLOAD LINKS
     ========================================================================== -->
<section class="section-padding bg-white resource-links-section" style="border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0;">
  <div class="container-fluid px-lg-5">
    <div class="row g-4">

      <div class="col-lg-4 col-md-6">
        <div class="heading-line-bottom mb-3">
          <h4 class="fw-bold text-dark"><i class="fa fa-star text-primary me-2"></i> Important Links</h4>
        </div>
        <div class="link-widget-group">
          <a href="<?php echo BASE_URL; ?>assets/images/Files/Link/NEP%202020%2027%20university%2014-compressed.pdf" target="_blank" class="link-box link-box-blue">
            <i class="fa fa-link icon-theme"></i> NEP 2020-27 Policy Guidelines
          </a>
          <a href="https://samadhaan.ugc.ac.in/" target="_blank" class="link-box link-box-blue">
            <i class="fa fa-link icon-theme"></i> UGC e-Samadhan Portal
          </a>
          <a href="<?php echo BASE_URL; ?>Examination/Results.php" class="link-box link-box-blue">
            <i class="fa fa-link icon-theme"></i> B.A. B.Ed. VII Semester Examination Results
          </a>
          <a href="<?php echo BASE_URL; ?>Download/E-Content.php" class="link-box link-box-blue">
            <i class="fa fa-link icon-theme"></i> E-Content &amp; Digital Learning Portal
          </a>
          <a href="https://unnatbharatabhiyan.gov.in:8443/new-website/" target="_blank" class="link-box link-box-blue">
            <i class="fa fa-link icon-theme"></i> Unnat Bharat Abhiyan Cell
          </a>
          <a href="http://www.mpbse.nic.in/" target="_blank" class="link-box link-box-blue">
            <i class="fa fa-link icon-theme"></i> Madhya Pradesh Board (MPBSE)
          </a>
          <a href="https://www.ugc.ac.in/" target="_blank" class="link-box link-box-blue">
            <i class="fa fa-link icon-theme"></i> University Grants Commission (UGC)
          </a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="heading-line-bottom mb-3">
          <h4 class="fw-bold text-dark"><i class="fa fa-bolt text-success me-2"></i> Quick Links</h4>
        </div>
        <div class="link-widget-group">
          <a href="https://www.aicte-india.org/feedback/index.php" target="_blank" class="link-box link-box-green">
            <i class="fa fa-link icon-theme"></i> AICTE Student/Faculty Feedback
          </a>
          <a href="<?php echo BASE_URL; ?>Academic/NAAC/SSR.php" class="link-box link-box-green">
            <i class="fa fa-link icon-theme"></i> NAAC Self Study Report (SSR)
          </a>
          <a href="<?php echo BASE_URL; ?>Academic/NIRF.php" class="link-box link-box-green">
            <i class="fa fa-link icon-theme"></i> National Institutional Ranking (NIRF)
          </a>
          <a href="<?php echo BASE_URL; ?>Academic/Committee/AntiRagging.php" class="link-box link-box-green">
            <i class="fa fa-link icon-theme"></i> Anti-Ragging Committee &amp; Helpline
          </a>
          <a href="<?php echo BASE_URL; ?>Academic/Committee/GrievanceRedressal.php" class="link-box link-box-green">
            <i class="fa fa-link icon-theme"></i> Grievance Redressal Mechanism
          </a>
          <a href="<?php echo BASE_URL; ?>Academic/IQACCell.php" class="link-box link-box-green">
            <i class="fa fa-link icon-theme"></i> Internal Quality Assurance Cell (IQAC)
          </a>
          <a href="<?php echo BASE_URL; ?>About/ApprovalsAndOrdinances/Approvals.php" class="link-box link-box-green">
            <i class="fa fa-link icon-theme"></i> Statutory Approvals &amp; Ordinances
          </a>
        </div>
      </div>

      <div class="col-lg-4 col-md-12">
        <div class="heading-line-bottom mb-3">
          <h4 class="fw-bold text-dark"><i class="fa fa-download text-warning me-2"></i> Download Links</h4>
        </div>
        <div class="link-widget-group">
          <a href="<?php echo BASE_URL; ?>Download/OutcomeBasedCurriculum/Engineering.php" class="link-box link-box-orange">
            <i class="fa fa-download icon-theme"></i> Curriculum Schemes &amp; Course Syllabus
          </a>
          <a href="<?php echo BASE_URL; ?>Download/Forms.php" class="link-box link-box-orange">
            <i class="fa fa-download icon-theme"></i> Migration Certificate Application Form
          </a>
          <a href="<?php echo BASE_URL; ?>Download/Forms.php" class="link-box link-box-orange">
            <i class="fa fa-download icon-theme"></i> Duplicate Marksheet Request Form
          </a>
          <a href="<?php echo BASE_URL; ?>Download/Forms.php" class="link-box link-box-orange">
            <i class="fa fa-download icon-theme"></i> Provisional Degree Application Form
          </a>
          <a href="<?php echo BASE_URL; ?>Admission/AdmissionRegistration.php" class="link-box link-box-orange">
            <i class="fa fa-download icon-theme"></i> Online Admission Registration (E-Pravesh)
          </a>
          <a href="<?php echo BASE_URL; ?>Examination/EntranceExamAlert.php" class="link-box link-box-orange">
            <i class="fa fa-download icon-theme"></i> Common Entrance Exam (CEET 2026) Form
          </a>
          <a href="<?php echo BASE_URL; ?>Academic/PHD.php" class="link-box link-box-orange">
            <i class="fa fa-download icon-theme"></i> Ph.D. Coursework Syllabus &amp; Guidelines
          </a>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ==========================================================================
     PHOTO GALLERY
     ========================================================================== -->
<section class="section-padding bg-light home-gallery-section">
  <div class="container-fluid px-lg-5">
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
      <h3 class="section-title mb-0">Photo Gallery</h3>
      <a href="<?php echo BASE_URL; ?>gallery.php" class="btn btn-outline-primary btn-sm rounded-pill px-3">View Full Gallery &gt;&gt;</a>
    </div>

    <div class="row g-3">
      <div class="col-lg-2 col-md-4 col-6">
        <a href="<?php echo BASE_URL; ?>gallery.php" class="gallery-thumb-item text-decoration-none">
          <img src="<?php echo BASE_URL; ?>assets/images/gallery/1/SSSUTMS_Building(8).jpg" alt="Building" class="img-fluid rounded shadow-sm" onerror="this.src='<?php echo BASE_URL; ?>assets/images/slider/IMG-20260112-WA0044.jpg'">
          <div class="gallery-thumb-caption">Building</div>
        </a>
      </div>

      <div class="col-lg-2 col-md-4 col-6">
        <a href="<?php echo BASE_URL; ?>gallery.php" class="gallery-thumb-item text-decoration-none">
          <img src="<?php echo BASE_URL; ?>assets/images/gallery/2/img-27.jpg" alt="Hostel" class="img-fluid rounded shadow-sm" onerror="this.src='<?php echo BASE_URL; ?>assets/images/slider/IMG-20250829-WA0023.jpg'">
          <div class="gallery-thumb-caption">Hostel</div>
        </a>
      </div>

      <div class="col-lg-2 col-md-4 col-6">
        <a href="<?php echo BASE_URL; ?>gallery.php" class="gallery-thumb-item text-decoration-none">
          <img src="<?php echo BASE_URL; ?>assets/images/gallery/3/img-26.jpg" alt="Laboratory" class="img-fluid rounded shadow-sm" onerror="this.src='<?php echo BASE_URL; ?>assets/images/slider/slide1.jpg'">
          <div class="gallery-thumb-caption">Laboratory</div>
        </a>
      </div>

      <div class="col-lg-2 col-md-4 col-6">
        <a href="<?php echo BASE_URL; ?>gallery.php" class="gallery-thumb-item text-decoration-none">
          <img src="<?php echo BASE_URL; ?>assets/images/gallery/4/img-19.jpg" alt="Library" class="img-fluid rounded shadow-sm" onerror="this.src='<?php echo BASE_URL; ?>assets/images/slider/IMG-20260112-WA0037.jpg'">
          <div class="gallery-thumb-caption">Library</div>
        </a>
      </div>

      <div class="col-lg-2 col-md-4 col-6">
        <a href="<?php echo BASE_URL; ?>gallery.php" class="gallery-thumb-item text-decoration-none">
          <img src="<?php echo BASE_URL; ?>assets/images/events/rec.jpg" alt="Rojgar Mela" class="img-fluid rounded shadow-sm" onerror="this.src='<?php echo BASE_URL; ?>assets/images/slider/HorizonsofAyurved.jpg'">
          <div class="gallery-thumb-caption">Rojgar Mela 2026</div>
        </a>
      </div>

      <div class="col-lg-2 col-md-4 col-6">
        <a href="<?php echo BASE_URL; ?>gallery.php" class="gallery-thumb-item text-decoration-none">
          <img src="<?php echo BASE_URL; ?>assets/images/slider/aamh(2).jpg" alt="Aarambh Fest" class="img-fluid rounded shadow-sm" onerror="this.src='<?php echo BASE_URL; ?>assets/images/slider/AARAMBH.jpg'">
          <div class="gallery-thumb-caption">Youth Festival</div>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- ==========================================================================
     FLOATING ADMISSION BOX
     ========================================================================== -->
<div class="floating-admission-box shadow-lg" id="floatingBox" style="display:none;">
  <button type="button" class="close-floating-btn" onclick="document.getElementById('floatingBox').style.display='none';">&times;</button>
  <h6 class="fw-bold text-primary mb-1">🎓 <u>Admission Session 2026-27</u></h6>
  <p class="small text-muted mb-2">Online applications are open for Undergraduate, Postgraduate, and Ph.D. programs.</p>
  <a href="<?php echo BASE_URL; ?>Admission/AdmissionRegistration.php" class="btn btn-warning btn-sm w-100 fw-bold text-dark rounded-pill">Apply Online (E-Pravesh)</a>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
