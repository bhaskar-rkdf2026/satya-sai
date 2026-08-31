<!-- Main Footer -->
<footer class="footer-v2">
  <div class="tricolor-bar"></div>

  <div class="container-fluid px-lg-5 py-5">
    <div class="row gy-5">

      <!-- Col 1: Brand, About, Social -->
      <div class="col-lg-4 col-md-6">
        <div class="d-flex align-items-center gap-3">
          <div class="footer-v2-logo-wrap">
            <img src="<?php echo BASE_URL; ?>assets/images/logo/logo.jpg" alt="SSSUTMS">
          </div>
          <div>
            <div class="footer-v2-brand-name">SSSUTMS</div>
            <div class="footer-v2-brand-sub">Sehore, Madhya Pradesh</div>
          </div>
        </div>
        <p class="desc">Sri Satya Sai University of Technology and Medical Sciences is acclaimed for its outstanding contribution to teaching, research, and healthcare in nation-building since 2013. Approved by UGC, AICTE, PCI, NCISM, INC &amp; NCH.</p>
        <div class="footer-v2-social">
          <a href="https://www.facebook.com/sehoresssutms" target="_blank" rel="noopener" title="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
          <a href="https://www.instagram.com/srisatyasai_universitysehore/" target="_blank" rel="noopener" title="Instagram"><i class="fa-brands fa-instagram"></i></a>
          <a href="https://www.youtube.com/@srisatyasaiuniversityoftec815" target="_blank" rel="noopener" title="YouTube"><i class="fa-brands fa-youtube"></i></a>
        </div>
      </div>

      <!-- Col 2: Quick Links -->
      <div class="col-lg-2 col-md-6 col-6">
        <h4 class="footer-v2-title">Quick Links</h4>
        <ul class="footer-v2-links">
          <li><a href="<?php echo BASE_URL; ?>about.php"><i class="fa fa-angle-right"></i> About University</a></li>
          <li><a href="<?php echo BASE_URL; ?>academics.php"><i class="fa fa-angle-right"></i> Departments</a></li>
          <li><a href="<?php echo BASE_URL; ?>Admission/AdmissionRegistration.php"><i class="fa fa-angle-right"></i> Admissions</a></li>
          <li><a href="<?php echo BASE_URL; ?>Academic/TrainingAndPlacement/TrainingAndPlacementCell.php"><i class="fa fa-angle-right"></i> Placements</a></li>
          <li><a href="<?php echo BASE_URL; ?>Research/CouncilForResearch.php"><i class="fa fa-angle-right"></i> Research</a></li>
          <li><a href="<?php echo BASE_URL; ?>gallery.php"><i class="fa fa-angle-right"></i> Campus Life</a></li>
        </ul>
      </div>

      <!-- Col 3: Student Services -->
      <div class="col-lg-3 col-md-6 col-6">
        <h4 class="footer-v2-title">Student Services</h4>
        <ul class="footer-v2-links">
          <li><a href="<?php echo BASE_URL; ?>erp-login.php"><i class="fa fa-angle-right"></i> ERP Login</a></li>
          <li><a href="<?php echo BASE_URL; ?>Examination/Interface.php"><i class="fa fa-angle-right"></i> Examination Portal</a></li>
          <li><a href="<?php echo BASE_URL; ?>Admission/UniversityAccountDetail.php"><i class="fa fa-angle-right"></i> Fee Payment</a></li>
          <li><a href="<?php echo BASE_URL; ?>Download/OutcomeBasedCurriculum/Engineering.php"><i class="fa fa-angle-right"></i> Syllabus &amp; Curriculum</a></li>
          <li><a href="<?php echo BASE_URL; ?>Academic/Committee/AntiRagging.php"><i class="fa fa-angle-right"></i> Anti-Ragging</a></li>
          <li><a href="<?php echo BASE_URL; ?>Academic/Committee/GrievanceRedressal.php"><i class="fa fa-angle-right"></i> Grievance Cell</a></li>
        </ul>
      </div>

      <!-- Col 4: Reach Us -->
      <div class="col-lg-3 col-md-6">
        <h4 class="footer-v2-title">Reach Us</h4>
        <div class="footer-v2-contact-item">
          <i class="fa fa-location-dot"></i>
          <div><?php echo CAMPUS_ADDRESS; ?></div>
        </div>
        <div class="footer-v2-contact-item">
          <i class="fa fa-phone"></i>
          <div><?php echo ADMISSION_HELPLINE; ?></div>
        </div>
        <div class="footer-v2-contact-item">
          <i class="fa fa-envelope"></i>
          <div><a href="mailto:<?php echo OFFICIAL_EMAIL; ?>" style="color: inherit; text-decoration: none;"><?php echo OFFICIAL_EMAIL; ?></a></div>
        </div>
        <button type="button" class="footer-v2-enquire-btn" data-bs-toggle="modal" data-bs-target="#enquiryModal">
          Enquire Now <i class="fa fa-arrow-right"></i>
        </button>
      </div>

    </div>
  </div>

  <!-- Bottom Copyright Bar -->
  <div class="footer-v2-bottom">
    <div class="container-fluid px-lg-5 d-flex flex-column flex-md-row align-items-center justify-content-between gap-2 text-center text-md-start">
      <div>&copy; 2026 Sri Satya Sai University of Technology &amp; Medical Sciences. All rights reserved.</div>
      <div>
        <a href="#">Privacy</a><a href="#">Terms</a><a href="#">Sitemap</a>
      </div>
    </div>
  </div>
</footer>

<!-- Include Floating Actions & Enquiry Modal -->
<?php 
require_once __DIR__ . '/floating-actions.php';
require_once __DIR__ . '/enquiry-modal.php';
?>

<!-- Bootstrap 5.3 Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Custom Main Interactive Engine -->
<script src="<?php echo BASE_URL; ?>assets/js/main.js"></script>
</body>
</html>
