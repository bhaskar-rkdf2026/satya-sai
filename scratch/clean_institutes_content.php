<?php
// Scratch script to generate clean Institutes HTML with EXACT content from live site, 2-column cards, no dummy text
$data_file = 'd:/xampp/htdocs/satya-sai/data/about_pages.json';
$json_str = file_get_contents($data_file);
$data = json_decode($json_str, true);

$clean_html = <<<'HTML'
<div class="institutes-content-wrap">
  <!-- Section Title -->
  <div class="text-center py-2 px-3 mb-4 rounded-3" style="background: rgba(11, 37, 69, 0.05); border: 1px solid rgba(11, 37, 69, 0.08);">
    <h4 class="fw-bold mb-0 text-uppercase text-center" style="color: #0b2545; letter-spacing: 1.5px; font-size: 1.15rem;">INSTITUTE</h4>
  </div>

  <!-- Intro Paragraph (Exact Live Text) -->
  <p class="text-secondary mb-4" style="font-size: 1.02rem; line-height: 1.7;">
    As per ordinance of <strong>Sri Satya Sai University of Technology &amp; Medical Sciences, Sehore</strong>, the following institutes are constituent units of the University.
  </p>

  <!-- Section 1: University Institutes -->
  <h5 class="fw-bold mb-3" style="color: #0b2545;">
    <i class="bi bi-award-fill me-2 text-warning"></i>University Institutes
  </h5>

  <div class="row g-3 mb-4 align-items-stretch">
    <!-- 1. School of Engineering -->
    <div class="col-12 col-md-6 d-flex">
      <div class="institute-grid-card">
        <div class="icon-box"><i class="bi bi-gear-wide-connected"></i></div>
        <span class="inst-title">School of Engineering</span>
      </div>
    </div>

    <!-- 2. School of Computer Application -->
    <div class="col-12 col-md-6 d-flex">
      <div class="institute-grid-card">
        <div class="icon-box"><i class="bi bi-laptop"></i></div>
        <span class="inst-title">School of Computer Application</span>
      </div>
    </div>

    <!-- 3. School of Management Studies -->
    <div class="col-12 col-md-6 d-flex">
      <div class="institute-grid-card">
        <div class="icon-box"><i class="bi bi-briefcase"></i></div>
        <span class="inst-title">School of Management Studies</span>
      </div>
    </div>

    <!-- 4. School of Hotel Management -->
    <div class="col-12 col-md-6 d-flex">
      <div class="institute-grid-card">
        <div class="icon-box"><i class="bi bi-cup-hot"></i></div>
        <span class="inst-title">School of Hotel Management</span>
      </div>
    </div>

    <!-- 5. School of Paramedical Studies -->
    <div class="col-12 col-md-6 d-flex">
      <div class="institute-grid-card">
        <div class="icon-box"><i class="bi bi-heart-pulse"></i></div>
        <span class="inst-title">School of Paramedical Studies</span>
      </div>
    </div>

    <!-- 6. Polytechnic (Engineering) -->
    <div class="col-12 col-md-6 d-flex">
      <div class="institute-grid-card">
        <div class="icon-box"><i class="bi bi-tools"></i></div>
        <span class="inst-title">Polytechnic (Engineering)</span>
      </div>
    </div>

    <!-- 7. School of Law -->
    <div class="col-12 col-md-6 d-flex">
      <div class="institute-grid-card">
        <div class="icon-box"><i class="bi bi-bank"></i></div>
        <span class="inst-title">School of Law</span>
      </div>
    </div>

    <!-- 8. School of Homoeopathy (LINKED) -->
    <div class="col-12 col-md-6 d-flex">
      <a href="http://sssutms-soh.in/" target="_blank" rel="noopener" class="institute-grid-card">
        <div class="icon-box"><i class="bi bi-hospital"></i></div>
        <span class="inst-title">School of Homoeopathy</span>
        <i class="bi bi-box-arrow-up-right action-icon"></i>
      </a>
    </div>

    <!-- 9. Faculty of Education (LINKED) -->
    <div class="col-12 col-md-6 d-flex">
      <a href="/satya-sai/About/Faculty_of_Education.php" class="institute-grid-card">
        <div class="icon-box"><i class="bi bi-journal-bookmark"></i></div>
        <span class="inst-title">Faculty of Education</span>
        <i class="bi bi-arrow-right-short action-icon fs-4"></i>
      </a>
    </div>

    <!-- 10. School of Design -->
    <div class="col-12 col-md-6 d-flex">
      <div class="institute-grid-card">
        <div class="icon-box"><i class="bi bi-palette"></i></div>
        <span class="inst-title">School of Design</span>
      </div>
    </div>

    <!-- 11. School of Ayurveda & Siddha Studies (LINKED) -->
    <div class="col-12 col-md-6 d-flex">
      <a href="http://sssutms-soa.in/" target="_blank" rel="noopener" class="institute-grid-card">
        <div class="icon-box"><i class="bi bi-flower1"></i></div>
        <span class="inst-title">School of Ayurveda &amp; Siddha Studies</span>
        <i class="bi bi-box-arrow-up-right action-icon"></i>
      </a>
    </div>

    <!-- 12. School of Agriculture (LINKED) -->
    <div class="col-12 col-md-6 d-flex">
      <a href="https://www.sssutms-soag.in/" target="_blank" rel="noopener" class="institute-grid-card">
        <div class="icon-box"><i class="bi bi-tree"></i></div>
        <span class="inst-title">School of Agriculture</span>
        <i class="bi bi-box-arrow-up-right action-icon"></i>
      </a>
    </div>

    <!-- 13. School of Medical Sciences -->
    <div class="col-12 col-md-6 d-flex">
      <div class="institute-grid-card">
        <div class="icon-box"><i class="bi bi-activity"></i></div>
        <span class="inst-title">School of Medical Sciences</span>
      </div>
    </div>

    <!-- 14. Faculty of Pharmacy -->
    <div class="col-12 col-md-6 d-flex">
      <div class="institute-grid-card">
        <div class="icon-box"><i class="bi bi-capsule"></i></div>
        <span class="inst-title">Faculty of Pharmacy</span>
      </div>
    </div>
  </div>

  <!-- Section 2: Pharmacy Institutions -->
  <h5 class="fw-bold mb-3 mt-4" style="color: #0b2545;">
    <i class="bi bi-capsule-pill me-2 text-warning"></i>Pharmacy Institutions
  </h5>

  <div class="row g-3 mb-4 align-items-stretch">
    <!-- Pharmacy Card 1 (LINKED) -->
    <div class="col-12 col-md-6 d-flex">
      <a href="/satya-sai/About/College_of_pharmacy.php" class="institute-grid-card pharmacy-unit">
        <div class="icon-box"><i class="bi bi-building-check"></i></div>
        <span class="inst-title">College of Pharmacy</span>
        <i class="bi bi-arrow-right-short action-icon fs-4"></i>
      </a>
    </div>

    <!-- Pharmacy Card 2 (LINKED) -->
    <div class="col-12 col-md-6 d-flex">
      <a href="/satya-sai/About/sop.php" class="institute-grid-card pharmacy-unit">
        <div class="icon-box"><i class="bi bi-building-gear"></i></div>
        <span class="inst-title">School of Pharmacy</span>
        <i class="bi bi-arrow-right-short action-icon fs-4"></i>
      </a>
    </div>

    <!-- Pharmacy Card 3 (LINKED) -->
    <div class="col-12 col-md-6 d-flex">
      <a href="/satya-sai/About/srkmsop.php" class="institute-grid-card pharmacy-unit">
        <div class="icon-box"><i class="bi bi-building-fill-add"></i></div>
        <span class="inst-title">Sri Ramnath Kapoor Memorial School Of Pharmacy</span>
        <i class="bi bi-arrow-right-short action-icon fs-4"></i>
      </a>
    </div>

    <!-- Pharmacy Card 4 (LINKED) -->
    <div class="col-12 col-md-6 d-flex">
      <a href="/satya-sai/About/POLP.php" class="institute-grid-card pharmacy-unit">
        <div class="icon-box"><i class="bi bi-building-fill-check"></i></div>
        <span class="inst-title">Polytechnic Pharmacy</span>
        <i class="bi bi-arrow-right-short action-icon fs-4"></i>
      </a>
    </div>
  </div>

  <!-- Regulatory Footer Note (Exact Live Text) -->
  <div class="alert rounded-3 border-0 shadow-sm p-3 d-flex align-items-center gap-3 mt-4" style="background: rgba(11, 37, 69, 0.04); border-left: 4px solid #0b2545 !important;">
    <i class="bi bi-info-circle-fill fs-5" style="color: #0b2545;"></i>
    <div class="small text-secondary fst-italic">
      As per approval accorded by Regulatory authorities, some new courses/institutions are scheduled from the coming academic years.
    </div>
  </div>
</div>
HTML;

$data['Institutes']['content_html'] = $clean_html;
file_put_contents($data_file, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
echo "SUCCESS: updated data/about_pages.json with clean exact live content.\n";
