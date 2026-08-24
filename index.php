<?php
$page_title = 'Sri Satya Sai University of Technology & Medical Sciences (SSSUTMS)';
$page_desc = 'Welcome to Sri Satya Sai University of Technology and Medical Sciences (SSSUTMS), Sehore (Bhopal, MP). Approved by UGC, AICTE, PCI, NCISM, INC, NCH.';

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/topbar.php';
require_once __DIR__ . '/includes/navbar.php';

$notices = get_notices('all');
$events = get_events();
?>

<!-- ==========================================================================
     HERO SLIDER SECTION (Replicated Campus Carousel)
     ========================================================================== -->
<section id="home" class="hero-slider-section">
  <div class="hero-slider-wrap">
    
    <!-- Slide 1 -->
    <div class="hero-slide active">
      <img src="<?php echo BASE_URL; ?>assets/images/slider/IMG-20260112-WA0044.jpg" loading="eager" alt="SSSUTMS Campus" class="hero-slide-img" onerror="this.src='<?php echo BASE_URL; ?>assets/images/slider/slide1.jpg'">
      <div class="hero-overlay">
        <div class="container-fluid px-lg-5">
          <div class="hero-content">
            <span class="hero-badge"><i class="fa fa-award me-1"></i> Premier University in Central India</span>
            <h1 class="hero-title">Shaping Future Leaders Through Excellence & Innovation</h1>
            <p class="hero-desc">Empowering students with world-class engineering, medical, ayurveda, pharmacy, and management education across a 100+ acre lush green campus.</p>
            <div class="d-flex flex-wrap gap-3">
              <a href="<?php echo BASE_URL; ?>Admission/AdmissionRegistration.php" class="btn btn-warning fw-bold px-4 py-2 text-dark rounded-pill shadow"><i class="fa fa-pen-nib me-1"></i> Apply Online 2026-27</a>
              <a href="<?php echo BASE_URL; ?>About/Background.php" class="btn btn-outline-light fw-bold px-4 py-2 rounded-pill"><i class="fa fa-compass me-1"></i> Explore University</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Slide 2 -->
    <div class="hero-slide">
      <img src="<?php echo BASE_URL; ?>assets/images/slider/HorizonsofAyurved.jpg" loading="lazy" decoding="async" alt="Ayurveda & Medical Sciences" class="hero-slide-img" onerror="this.src='<?php echo BASE_URL; ?>assets/images/slider/aamh(2).jpg'">
      <div class="hero-overlay">
        <div class="container-fluid px-lg-5">
          <div class="hero-content">
            <span class="hero-badge"><i class="fa fa-hospital me-1"></i> Healthcare & Medical Sciences</span>
            <h1 class="hero-title">School of Ayurveda (BAMS) & Homoeopathy (BHMS)</h1>
            <p class="hero-desc">State-of-the-art multi-speciality teaching hospitals, herbal research gardens, and experiential clinical training approved by NCISM & NCH.</p>
            <div class="d-flex flex-wrap gap-3">
              <a href="<?php echo BASE_URL; ?>Academic/FacultiesAndDepartments/Ayurveda.php" class="btn btn-warning fw-bold px-4 py-2 text-dark rounded-pill shadow"><i class="fa fa-stethoscope me-1"></i> Medical Programs</a>
              <button class="btn btn-outline-light fw-bold px-4 py-2 rounded-pill" data-bs-toggle="modal" data-bs-target="#enquiryModal"><i class="fa fa-envelope me-1"></i> Enquire Now</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Slide 3 -->
    <div class="hero-slide">
      <img src="<?php echo BASE_URL; ?>assets/images/slider/AARAMBH.jpg" loading="lazy" decoding="async" alt="Placements and Career" class="hero-slide-img" onerror="this.src='<?php echo BASE_URL; ?>assets/images/slider/IMG-20260112-WA0037.jpg'">
      <div class="hero-overlay">
        <div class="container-fluid px-lg-5">
          <div class="hero-content">
            <span class="hero-badge"><i class="fa fa-rocket me-1"></i> Placements & Industry Connect</span>
            <h1 class="hero-title">100+ Corporate Recruiters & Career Opportunities</h1>
            <p class="hero-desc">Dedicated Training & Placement Cell forging careers with top tech and healthcare giants including TCS, IBM, Infosys, Wipro, and Accenture.</p>
            <div class="d-flex flex-wrap gap-3">
              <a href="<?php echo BASE_URL; ?>Download/OutcomeBasedCurriculum/Engineering.php" class="btn btn-warning fw-bold px-4 py-2 text-dark rounded-pill shadow"><i class="fa fa-file-arrow-down me-1"></i> Download Syllabus</a>
              <a href="<?php echo BASE_URL; ?>gallery.php" class="btn btn-outline-light fw-bold px-4 py-2 rounded-pill"><i class="fa fa-image me-1"></i> Campus Gallery</a>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Slider Controls -->
  <div class="hero-controls">
    <button class="slider-btn slider-btn-prev" aria-label="Previous Slide"><i class="fa fa-chevron-left"></i></button>
    <button class="slider-btn slider-btn-next" aria-label="Next Slide"><i class="fa fa-chevron-right"></i></button>
  </div>

  <!-- Slider Dots -->
  <div class="slider-dots">
    <span class="slider-dot active"></span>
    <span class="slider-dot"></span>
    <span class="slider-dot"></span>
  </div>
</section>

<!-- ==========================================================================
     SECTION 1: ABOUT, VC DESK, EVENTS, PRESS & NOTICE BOARD (Exact Website.html layout)
     ========================================================================== -->
<section id="about" class="section-padding bg-white">
  <div class="container-fluid px-lg-5">
    <div class="row g-4">
      
      <!-- Row 1 Left: VC Message (Col-8) -->
      <div class="col-lg-8">
        <div class="heading-line-bottom mb-3">
          <h2 class="section-title mb-0">Welcome to <span style="color: #e26a2c;">Sri Satya Sai University</span></h2>
        </div>

        <div class="p-4 rounded-3 border bg-light h-100 shadow-sm">
          <h5 class="fw-bold mb-3" style="color: #e26a2c;"><i class="fa fa-comment-dots me-2"></i> Message From VC's Desk</h5>
          <p class="text-justify" style="text-align: justify; line-height: 1.7; color: #475569;">
            Since its founding in 2013 by merging of several multi-disciplinary institutions, <strong>Sri Satya Sai University of Technology and Medical Sciences Sehore, Bhopal (MP)</strong> is acclaimed for its outstanding contribution to teaching, research and service in Nation building. Today, the University stands to meet the enormous aspirations and expectations of society. Society wants us to nurture professionals and scholars of high caliber, who can offer solutions to a broad range of issues. This requires excellence in teaching and research at par with the best in the world.
          </p>
          <p class="text-justify" style="text-align: justify; line-height: 1.7; color: #475569;">
            We, at Sri Satya Sai University of Technology and Medical Sciences, continuously aspire to be a breeding ground for positive ideas and emerge as a symbol of openness of thoughts, cultural pluralism and celebrating the unity in the diversity of India. We endeavour to touch the lives of every student by inculcating prudence, efficiency, creativity and compassion to work for the betterment of the marginalized sections of society. We attempt to kindle their sense of responsibility, honesty, conscience, justice and above all commitment to human values.
          </p>
          <p class="text-justify mb-4" style="text-align: justify; line-height: 1.7; color: #475569;">
            We aim to expand our reach to the inaccessible regions through virtual presence and become a center of knowledge osmosis. We seek to empower every inquisitive soul with the best available human resources. We intend to intensify our endeavors to mobilize more resources and create conducive ambience for our faculty, students and staff to actualize their potential.
          </p>

          <div class="d-flex align-items-center justify-content-between pt-3 border-top">
            <div>
              <h6 class="fw-bold mb-0 text-primary">Dr. Mukesh Tiwari</h6>
              <small class="text-muted">Vice Chancellor, SSSUTMS</small>
            </div>
            <img src="<?php echo BASE_URL; ?>assets/images/logo/logo.jpg" alt="VC SSSUTMS" width="44" height="44" class="rounded-circle border">
          </div>
        </div>
      </div>

      <!-- Row 1 Right: Upcoming Events Box (Col-4) -->
      <div class="col-lg-4">
        <div class="heading-line-bottom mb-3">
          <h2 class="section-title mb-0">Events</h2>
        </div>

        <div class="card border-0 shadow-sm rounded-3 overflow-hidden bg-light h-100">
          <div class="p-3 bg-white border-bottom d-flex justify-content-between align-items-center">
            <span class="badge bg-danger">Upcoming Events</span>
            <a href="<?php echo BASE_URL; ?>EVENTS.php" class="text-primary small fw-bold">View more &gt;&gt;</a>
          </div>
          <div class="p-3 text-center">
            <img src="<?php echo BASE_URL; ?>assets/images/events/scienceday.jpg" alt="National Science Day" class="img-fluid rounded shadow-sm mb-3" style="max-height: 220px; width: 100%; object-fit: cover;" onerror="this.src='<?php echo BASE_URL; ?>assets/images/slider/aamh(2).jpg'">
            <h6 class="fw-bold text-dark mb-1">National Science Day Exhibition & Seminar</h6>
            <p class="small text-muted mb-2">Innovative science working models & research papers presentation by scholars.</p>
            <a class="btn btn-sm btn-outline-primary rounded-pill px-3" href="<?php echo BASE_URL; ?>EVENTS.php">View Event Details &gt;&gt;</a>
          </div>
        </div>
      </div>

    </div>

    <!-- Row 2: Press & Media + Notice Board -->
    <div class="row g-4 mt-3">
      
      <!-- Press & Media Box (Col-6) -->
      <div class="col-lg-6">
        <div class="heading-line-bottom mb-3">
          <h3 class="section-title mb-0"><span style="color: #e26a2c;">Press</span> &amp; Media</h3>
        </div>

        <div class="card border-0 shadow-sm rounded-3 overflow-hidden bg-white">
          <div class="position-relative overflow-hidden" style="max-height: 280px;">
            <img src="<?php echo BASE_URL; ?>assets/images/PressAndMedia.jpg" alt="Press & Media Coverage" class="w-100 object-fit-cover" onerror="this.src='<?php echo BASE_URL; ?>assets/images/slider/HorizonsofAyurved.jpg'">
            <div class="position-absolute bottom-0 start-0 end-0 p-3 bg-dark bg-opacity-75 text-white d-flex justify-content-between align-items-center">
              <div>
                <h6 class="mb-0 fw-bold text-white">University News & Press Releases</h6>
                <small class="text-white-50">State & National Media Coverage</small>
              </div>
              <a href="<?php echo BASE_URL; ?>PressMedia.php" class="btn btn-warning btn-sm rounded-pill fw-bold text-dark">View More &gt;&gt;</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Notice Board (Col-6) with NoticeBoard.jpg background -->
      <div class="col-lg-6">
        <div class="heading-line-bottom mb-3">
          <h3 class="section-title mb-0">Notice Board</h3>
        </div>

        <div class="card border-0 shadow-sm rounded-3 overflow-hidden" style="background-image: url('<?php echo BASE_URL; ?>assets/images/NoticeBoard.jpg'); background-size: cover; background-position: center; min-height: 280px;">
          <div class="p-3 bg-dark bg-opacity-75 text-white d-flex justify-content-between align-items-center">
            <h6 class="mb-0 fw-bold text-white"><i class="fa fa-bell text-warning me-2"></i> Official University Circulars</h6>
            <a href="<?php echo BASE_URL; ?>Examination/ExamNotifications.php" class="badge bg-warning text-dark text-decoration-none">View All Notices</a>
          </div>

          <div class="p-3" style="max-height: 230px; overflow-y: auto;">
            <?php foreach (array_slice($notices, 0, 4) as $n): ?>
              <div class="p-2 mb-2 rounded bg-white bg-opacity-95 shadow-sm d-flex justify-content-between align-items-center">
                <div class="pe-2">
                  <h6 class="fw-bold text-dark mb-1" style="font-size: 13px;">
                    <a href="<?php echo BASE_URL; ?>Examination/ExamNotifications.php" class="text-dark text-decoration-none"><?php echo htmlspecialchars($n['title']); ?></a>
                    <?php if (!empty($n['is_new'])): ?>
                      <span class="badge bg-danger" style="font-size: 9px;">NEW</span>
                    <?php endif; ?>
                  </h6>
                  <small class="text-muted"><i class="fa fa-clock me-1"></i> <?php echo date('d-m-Y', strtotime($n['date'])); ?></small>
                </div>
                <a href="<?php echo BASE_URL; ?>Examination/ExamNotifications.php" class="btn btn-sm btn-outline-primary flex-shrink-0" style="font-size: 11px;"><i class="fa fa-file-pdf text-danger me-1"></i> PDF</a>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

    </div>

  </div>
</section>

<!-- ==========================================================================
     SECTION 2: IMPORTANT LINKS, QUICK LINKS, DOWNLOAD LINKS (Exact 3-Col Widget)
     ========================================================================== -->
<section class="section-padding bg-lighter" style="background-color: #f8fafc; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0;">
  <div class="container-fluid px-lg-5">
    <div class="row g-4">
      
      <!-- Col 1: Important Links (Blue Theme #3686c9) -->
      <div class="col-lg-4 col-md-6">
        <div class="heading-line-bottom mb-3">
          <h4 class="fw-bold text-dark"><i class="fa fa-star text-primary me-2"></i> Important Links</h4>
        </div>
        <div class="link-widget-group">
          <a href="https://www.sssutms.co.in<?php echo BASE_URL; ?>assets/images/Files/Link/NEP%202020%2027%20university%2014-compressed.pdf" target="_blank" class="link-box link-box-blue">
            <i class="fa fa-link icon-theme"></i> NEP 2020-27 Policy Guidelines
          </a>
          <a href="https://samadhaan.ugc.ac.in/" target="_blank" class="link-box link-box-blue">
            <i class="fa fa-link icon-theme"></i> UGC e-Samadhan Portal
          </a>
          <a href="<?php echo BASE_URL; ?>Examination/Results.php" class="link-box link-box-blue">
            <i class="fa fa-link icon-theme"></i> B.A. B.Ed. VII Semester Examination Results
          </a>
          <a href="<?php echo BASE_URL; ?>Download/E-Content.php" class="link-box link-box-blue">
            <i class="fa fa-link icon-theme"></i> E-Content & Digital Learning Portal
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

      <!-- Col 2: Quick Links (Green Theme #25d366) -->
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
            <i class="fa fa-link icon-theme"></i> Anti-Ragging Committee & Helpline
          </a>
          <a href="<?php echo BASE_URL; ?>Academic/Committee/GrievanceRedressal.php" class="link-box link-box-green">
            <i class="fa fa-link icon-theme"></i> Grievance Redressal Mechanism
          </a>
          <a href="<?php echo BASE_URL; ?>Academic/IQACCell.php" class="link-box link-box-green">
            <i class="fa fa-link icon-theme"></i> Internal Quality Assurance Cell (IQAC)
          </a>
          <a href="<?php echo BASE_URL; ?>About/ApprovalsAndOrdinances/Approvals.php" class="link-box link-box-green">
            <i class="fa fa-link icon-theme"></i> Statutory Approvals & Ordinances
          </a>
        </div>
      </div>

      <!-- Col 3: Download Links (Orange Theme #f4a261) -->
      <div class="col-lg-4 col-md-12">
        <div class="heading-line-bottom mb-3">
          <h4 class="fw-bold text-dark"><i class="fa fa-download text-warning me-2"></i> Download Links</h4>
        </div>
        <div class="link-widget-group">
          <a href="<?php echo BASE_URL; ?>Download/OutcomeBasedCurriculum/Engineering.php" class="link-box link-box-orange">
            <i class="fa fa-download icon-theme"></i> Curriculum Schemes & Course Syllabus
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
            <i class="fa fa-download icon-theme"></i> Ph.D. Coursework Syllabus & Guidelines
          </a>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ==========================================================================
     SECTION 3: PHOTO GALLERY
     ========================================================================== -->
<section class="section-padding bg-white">
  <div class="container-fluid px-lg-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
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
     SECTION 4: OUR TOP RECRUITERS
     ========================================================================== -->
<section class="section-padding bg-light">
  <div class="container-fluid px-lg-5">
    <div class="text-center mb-4">
      <h3 class="section-title mb-1">Our Top Recruiters</h3>
      <p class="text-muted small">Leading multinational corporate & healthcare organizations hiring from SSSUTMS</p>
    </div>

    <div class="recruiters-marquee-wrap">
      <div class="recruiters-track">
        <div class="recruiter-logo-item"><img src="<?php echo BASE_URL; ?>assets/images/recruiters/TCSLogo.jpg" alt="TCS"></div>
        <div class="recruiter-logo-item"><img src="<?php echo BASE_URL; ?>assets/images/recruiters/IBM.jpg" alt="IBM"></div>
        <div class="recruiter-logo-item"><img src="<?php echo BASE_URL; ?>assets/images/recruiters/InfosysLogo.jpg" alt="Infosys"></div>
        <div class="recruiter-logo-item"><img src="<?php echo BASE_URL; ?>assets/images/recruiters/WpiroLogo.jpg" alt="Wipro"></div>
        <div class="recruiter-logo-item"><img src="<?php echo BASE_URL; ?>assets/images/recruiters/Accenture.jpg" alt="Accenture"></div>
        <div class="recruiter-logo-item"><img src="<?php echo BASE_URL; ?>assets/images/recruiters/BajajLogo.jpg" alt="Bajaj"></div>
        <!-- Duplicate set for seamless continuous marquee loop -->
        <div class="recruiter-logo-item"><img src="<?php echo BASE_URL; ?>assets/images/recruiters/TCSLogo.jpg" alt="TCS"></div>
        <div class="recruiter-logo-item"><img src="<?php echo BASE_URL; ?>assets/images/recruiters/IBM.jpg" alt="IBM"></div>
        <div class="recruiter-logo-item"><img src="<?php echo BASE_URL; ?>assets/images/recruiters/InfosysLogo.jpg" alt="Infosys"></div>
        <div class="recruiter-logo-item"><img src="<?php echo BASE_URL; ?>assets/images/recruiters/WpiroLogo.jpg" alt="Wipro"></div>
        <div class="recruiter-logo-item"><img src="<?php echo BASE_URL; ?>assets/images/recruiters/Accenture.jpg" alt="Accenture"></div>
        <div class="recruiter-logo-item"><img src="<?php echo BASE_URL; ?>assets/images/recruiters/BajajLogo.jpg" alt="Bajaj"></div>
      </div>
    </div>
  </div>
</section>

<!-- ==========================================================================
     FLOATING ADMISSION BOX (Bottom Corner Popup as in original site)
     ========================================================================== -->
<div class="floating-admission-box shadow-lg" id="floatingBox">
  <button type="button" class="close-floating-btn" onclick="document.getElementById('floatingBox').style.display='none';">&times;</button>
  <h6 class="fw-bold text-primary mb-1">🎓 <u>Admission Session 2026-27</u></h6>
  <p class="small text-muted mb-2">Online applications are open for Undergraduate, Postgraduate, and Ph.D. programs.</p>
  <a href="<?php echo BASE_URL; ?>Admission/AdmissionRegistration.php" class="btn btn-warning btn-sm w-100 fw-bold text-dark rounded-pill">Apply Online (E-Pravesh)</a>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
