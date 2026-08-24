<?php
$page_title = 'ViceChancellor - SSSUTMS';
$banner_title = 'ViceChancellor';
$banner_category = 'About';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<section class="subpage-main-section py-4 bg-light">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="content-card">
          <div class="content-card-body">
            <!-- VC Photo -->
<div class="col-md-4 text-center">
<h3 class="fw-bold text-warning mb-4">Message from VC&rsquo;s Desk</h3>
<img class="img-fluid rounded shadow-lg" style="max-height: 350px;" src="<?php echo BASE_URL; ?>assets/images/Files/Link/vc_sir_13052024_0517.jpg" alt="Vice Chancellor" />
<p class="fw-bold text-primary mt-3 mb-0">Dr Mukesh Tiwari</p>
<p class="text-muted">Vice Chancellor</p>
</div>
<!-- VC Message -->
<div class="col-md-8">
<div class="p-4 bg-light rounded shadow-sm">
<p class="fs-5 lh-lg text-secondary text-justify">Since its founding in 2013 by merging several multi-disciplinary institutions, <strong>Sri Satya Sai University of Technology and Medical Sciences, Sehore (MP)</strong> is acclaimed for its outstanding contribution to teaching, research, and service in nation building. Today, the University stands to meet the enormous aspirations and expectations of society. Society wants us to nurture professionals and scholars of high caliber, who can offer solutions to a broad range of issues. This requires excellence in teaching and research at par with the best in the world.</p>
<p class="fs-5 lh-lg text-secondary text-justify">We continuously aspire to be a breeding ground for positive ideas and emerge as a symbol of openness of thoughts, cultural pluralism, and celebrating the unity in diversity of India. We endeavour to touch the lives of every student by inculcating prudence, efficiency, creativity, and compassion to work for the betterment of marginalized sections of society. We attempt to kindle their sense of responsibility, honesty, conscience, justice, and above all commitment to human values.</p>
<p class="fs-5 lh-lg text-secondary text-justify">We aim to expand our reach to inaccessible regions through virtual presence and become a center of knowledge osmosis. We seek to empower every inquisitive soul with the best available human resources. We intend to intensify our endeavors to mobilize more resources and create a conducive ambience for our faculty, students, and staff to actualize their potential.</p>
<p class="fw-bold text-dark mt-4 mb-1">Best Wishes</p>
<p class="fw-bold text-primary fs-5">Dr Mukesh Tiwari</p>
</div>
</div>
          </div>
        </div>
      </div>

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>