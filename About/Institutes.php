<?php
$page_title = 'Institutes - SSSUTMS';
$banner_title = 'Institutes';
$banner_category = 'About';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?>

<section class="subpage-main-section py-4 bg-light">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="content-card">
          <div class="content-card-body">
            <div class="col-md-12">
<!-- Header -->

<!-- Body -->
<!-- Intro -->
<p class="lead text-secondary">As per ordinance of <strong>Sri Satya Sai University of Technology &amp; Medical Sciences, Sehore</strong>, the following institutes are constituent units of the University.</p>
<!-- Institutes List -->
<h5 class="fw-bold text-primary mt-4">University Institutes</h5>
<ul class="list-group list-group-flush mb-4">
<li class="list-group-item">School of Engineering</li>
<li class="list-group-item">School of Computer Application</li>
<li class="list-group-item">School of Management Studies</li>
<li class="list-group-item">School of Hotel Management</li>
<li class="list-group-item">School of Paramedical Studies</li>
<li class="list-group-item">Polytechnic (Engineering)</li>
<li class="list-group-item">School of Law</li>
<li class="list-group-item"><a class="text-decoration-none" href="http://sssutms-soh.in/" target="_blank" rel="noopener">School of Homoeopathy</a></li>
<li class="list-group-item"><a href="Faculty_of_Education.php" target="_blank" rel="noopener">Faculty of Education</a></li>
<li class="list-group-item">School of Design</li>
<li class="list-group-item"><a class="text-decoration-none" href="http://sssutms-soa.in/" target="_blank" rel="noopener">School of Ayurveda &amp; Siddha Studies</a></li>
<li class="list-group-item"><a class="text-decoration-none" href="https://www.sssutms-soag.in/" target="_blank" rel="noopener">School of Agriculture</a></li>
<li class="list-group-item">School of Medical Sciences</li>
<li class="list-group-item">Faculty of Pharmacy</li>
</ul>
<!-- Pharmacy Subsection -->
<h6 class="fw-bold text-success">Pharmacy Institutions</h6>
<ol class="list-group list-group-numbered list-group-flush mb-4">
<li class="list-group-item"><a class="text-decoration-none text-primary" href="College_of_pharmacy" target="_blank" rel="noopener">College of Pharmacy</a></li>
<li class="list-group-item"><a class="text-decoration-none text-primary" href="sop.php" target="_blank" rel="noopener">School of Pharmacy</a></li>
<li class="list-group-item"><a class="text-decoration-none text-primary" href="srkmsop" target="_blank" rel="noopener">Sri Ramnath Kapoor Memorial School Of Pharmacy</a></li>
<li class="list-group-item"><a class="text-decoration-none text-primary" href="POLP.php" target="_blank" rel="noopener">Polytechnic Pharmacy</a></li>
</ol>
</div>
<div class="card-footer"><!-- Footer Note -->
<p class="text-muted fst-italic">As per approval accorded by Regulatory authorities, some new courses/institutions are scheduled from the coming academic years.</p>
</div>
          </div>
        </div>
      </div>

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>