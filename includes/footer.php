<!-- Main Footer -->
<footer class="footer-v2">
  <div class="tricolor-bar"></div>

  <div class="container-fluid px-lg-5 py-5">
    <div class="row gy-5">

      <!-- Col 1: University Identity & Contact Details -->
      <div class="col-lg-3 col-md-6">
        <div class="d-flex align-items-center gap-3 mb-3">
          <div class="footer-v2-logo-wrap">
            <img src="<?php echo BASE_URL; ?>assets/images/logo/logo.jpg" alt="SSSUTMS Logo">
          </div>
          <div>
            <div class="footer-v2-brand-name">SRI SATYA SAI UNIVERSITY</div>
            <div class="footer-v2-brand-sub text-warning" style="font-size: 11px; font-weight: 600;">OF TECHNOLOGY AND MEDICAL SCIENCES</div>
          </div>
        </div>
        
        <div class="footer-v2-contact-item mb-2">
          <i class="fa fa-location-dot"></i>
          <div><?php echo htmlspecialchars(CAMPUS_ADDRESS); ?></div>
        </div>
        
        <div class="footer-v2-contact-item mb-2">
          <i class="fa fa-phone"></i>
          <div>
            <?php 
            $phones = get_setting('phone_numbers', "(+91) 07562-292740<br>(+91) 07562-292720<br>(+91) 07562-292204<br>(+91) 07562-292205<br>(+91) 7748900028");
            echo nl2br(htmlspecialchars($phones)); 
            ?><br>
            <small class="text-white-50">(From 10:00 AM to 5:00 PM only)</small>
          </div>
        </div>

        <div class="footer-v2-contact-item mb-2">
          <i class="fa fa-envelope"></i>
          <div><a href="mailto:<?php echo htmlspecialchars(OFFICIAL_EMAIL); ?>" style="color: inherit; text-decoration: none;"><?php echo htmlspecialchars(OFFICIAL_EMAIL); ?></a></div>
        </div>

        <div class="footer-v2-contact-item mb-3">
          <i class="fa fa-globe"></i>
          <div><a href="<?php echo BASE_URL; ?>" style="color: inherit; text-decoration: none;">www.sssutms.co.in</a></div>
        </div>

        <div class="footer-v2-social">
          <a href="<?php echo htmlspecialchars(get_setting('facebook_url', 'https://www.facebook.com/sehoresssutms')); ?>" target="_blank" rel="noopener" title="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
          <a href="<?php echo htmlspecialchars(get_setting('instagram_url', 'https://www.instagram.com/srisatyasai_universitysehore/')); ?>" target="_blank" rel="noopener" title="Instagram"><i class="fa-brands fa-instagram"></i></a>
          <a href="<?php echo htmlspecialchars(get_setting('youtube_url', 'https://www.youtube.com/@srisatyasaiuniversityoftec815')); ?>" target="_blank" rel="noopener" title="YouTube"><i class="fa-brands fa-youtube"></i></a>
        </div>
      </div>

      <!-- Col 2: Useful Links -->
      <div class="col-lg-3 col-md-6 col-6">
        <h4 class="footer-v2-title">Useful Links</h4>
        <ul class="footer-v2-links">
          <li><a href="<?php echo BASE_URL; ?>About/ApprovalsAndOrdinances/Approvals.php"><i class="fa fa-angle-right"></i> Approvals</a></li>
          <li><a href="<?php echo BASE_URL; ?>About/Public_Self_Disclosure.php"><i class="fa fa-angle-right"></i> Mandatory Disclosures</a></li>
          <li><a href="<?php echo BASE_URL; ?>Admission/UniversityAccountDetail.php"><i class="fa fa-angle-right"></i> Pay Fees</a></li>
          <li><a href="<?php echo BASE_URL; ?>Examination/Interface.php"><i class="fa fa-angle-right"></i> Examination Notification</a></li>
          <li><a href="<?php echo BASE_URL; ?>Career/index.php"><i class="fa fa-angle-right"></i> Career</a></li>
          <li><a href="https://www.aicte-india.org/feedback/students.php" target="_blank" rel="noopener"><i class="fa fa-angle-right"></i> AICTE Feedback</a></li>
          <li><a href="<?php echo BASE_URL; ?>Examination/Results.php"><i class="fa fa-angle-right"></i> Results</a></li>
          <li><a href="<?php echo BASE_URL; ?>Research/NIRF.php"><i class="fa fa-angle-right"></i> NIRF</a></li>
          <li><a href="https://samadhan.ugc.ac.in/" target="_blank" rel="noopener"><i class="fa fa-angle-right"></i> UGC e-Samadhan portal</a></li>
          <li><a href="<?php echo BASE_URL; ?>Download/NBADCS.php"><i class="fa fa-angle-right"></i> NBA - DCS</a></li>
        </ul>
      </div>

      <!-- Col 3: Logins -->
      <div class="col-lg-3 col-md-6 col-6">
        <h4 class="footer-v2-title">Logins</h4>
        <ul class="footer-v2-links">
          <li><a href="<?php echo BASE_URL; ?>erp-login.php"><i class="fa fa-angle-right"></i> Student Login</a></li>
          <li><a href="<?php echo BASE_URL; ?>erp-login.php"><i class="fa fa-angle-right"></i> Admin Login</a></li>
          <li><a href="<?php echo BASE_URL; ?>verify-marksheet.php"><i class="fa fa-angle-right"></i> Verify Marksheet</a></li>
          <li><a href="<?php echo BASE_URL; ?>Admission/AdmissionRegistration.php"><i class="fa fa-angle-right"></i> E-Pravesh 2026</a></li>
          <li><a href="<?php echo BASE_URL; ?>Download/Forms.php"><i class="fa fa-angle-right"></i> Entrance Exam Form</a></li>
          <li><a href="<?php echo BASE_URL; ?>Download/Alumni.php"><i class="fa fa-angle-right"></i> Alumni Registration Form</a></li>
          <li><a href="<?php echo BASE_URL; ?>Academic/Committee/GrievanceRedressal.php"><i class="fa fa-angle-right"></i> Online Grievance for Student</a></li>
        </ul>
      </div>

      <!-- Col 4: Help Desk -->
      <div class="col-lg-3 col-md-6">
        <h4 class="footer-v2-title">Help Desk</h4>
        
        <div class="footer-v2-contact-item mb-2">
          <i class="fa fa-fax"></i>
          <div><strong>Fax No:</strong> +91-07562-292201</div>
        </div>

        <div class="footer-v2-contact-item mb-2">
          <i class="fa fa-phone"></i>
          <div>
            <div>(+91) 07562-292740 | (+91) 07562-292720</div>
            <div class="mt-1">(+91) 07562-292204 | (+91) 07562-292205</div>
          </div>
        </div>

        <div class="footer-v2-contact-item mb-3">
          <i class="fa fa-clock"></i>
          <div>
            <span class="text-white-50 small">Last Updated On:</span><br>
            <strong>Fri Oct, 06 2024</strong>
          </div>
        </div>

        <button type="button" class="footer-v2-enquire-btn mt-2" data-bs-toggle="modal" data-bs-target="#enquiryModal">
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
        <a href="<?php echo BASE_URL; ?>About/Public_Self_Disclosure.php">Privacy &amp; Mandatory Disclosure</a>
        <a href="<?php echo BASE_URL; ?>Contact.php">Contact</a>
        <a href="<?php echo BASE_URL; ?>Career/index.php">Careers</a>
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
