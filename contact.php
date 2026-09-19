<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/contact_helper.php';

$page_info = get_contact_page_info();
$cards = get_contact_info_cards();
$officers = get_contact_officers(true);

$page_data = $page_info;
$page_title = $page_info['meta_title'] ?? ($page_info['page_title'] ?? 'Contact Us - SSSUTMS');
$banner_title = $page_info['banner_title'] ?? 'Contact Us';
$banner_category = $page_info['banner_category'] ?? 'Contact';
$meta_description = $page_info['meta_description'] ?? '';
$meta_keywords = $page_info['meta_keywords'] ?? '';
$canonical_url = $page_info['canonical_url'] ?? '';
$og_image = $page_info['og_image'] ?? '';

require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/topbar.php';
require_once __DIR__ . '/includes/navbar.php';
require_once __DIR__ . '/includes/page-banner.php';

$loc = $cards['location'] ?? [];
$emailPortal = $cards['email_portal'] ?? [];
$helpdesk = $cards['helpdesk'] ?? [];
$adm = $cards['admission'] ?? [];
?>

<style>
.syl-card {
  background: #ffffff;
  border-radius: 16px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
  border: 1px solid #e2e8f0;
  overflow: hidden;
  margin-bottom: 2rem;
}
.syl-card-header {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 1.25rem 1.75rem;
  position: relative;
}
.syl-card-header::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.syl-card-title {
  font-size: 1.3rem;
  font-weight: 700;
  margin: 0;
  display: flex;
  align-items: center;
  gap: 12px;
  color: #ffffff;
}
.syl-card-body {
  padding: 1.75rem;
}
.syl-table {
  width: 100%;
  margin-bottom: 0;
  vertical-align: middle;
  border-collapse: separate;
  border-spacing: 0;
}
.syl-table th {
  background: #f1f5f9;
  color: #0f172a;
  font-weight: 700;
  font-size: 0.88rem;
  text-transform: uppercase;
  letter-spacing: 0.05em;
  padding: 12px 16px;
  border-top: none;
  border-bottom: 2px solid #cbd5e1;
}
.syl-table td {
  padding: 12px 16px;
  border-bottom: 1px solid #e2e8f0;
  color: #334155;
  font-size: 0.95rem;
  vertical-align: middle;
}
.syl-table tbody tr:hover {
  background-color: #f8fafc;
}
.syl-btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  background: #0b2545;
  color: #ffffff !important;
  font-weight: 700;
  font-size: 0.85rem;
  padding: 8px 18px;
  border-radius: 8px;
  text-decoration: none !important;
  transition: all 0.25s ease;
  box-shadow: 0 2px 6px rgba(11, 37, 69, 0.2);
  border: 1px solid #0b2545;
  white-space: nowrap;
}
.syl-btn:hover {
  background: #d97706;
  border-color: #d97706;
  color: #ffffff !important;
  transform: translateY(-2px);
  box-shadow: 0 6px 14px rgba(217, 119, 6, 0.35);
}
.contact-info-card {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 1.5rem;
  height: 100%;
  display: flex;
  align-items: flex-start;
  gap: 16px;
  transition: transform 0.25s ease, box-shadow 0.25s ease;
}
.contact-info-card:hover {
  transform: translateY(-3px);
  box-shadow: 0 6px 20px rgba(0, 0, 0, 0.06);
}
.contact-icon-box {
  width: 48px;
  height: 48px;
  border-radius: 10px;
  background: #0b2545;
  color: #ffffff;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.25rem;
  flex-shrink: 0;
}
.department-heading {
  background: #f8fafc;
  border-left: 4px solid #0b2545;
  padding: 10px 16px;
  margin-top: 2rem;
  margin-bottom: 1.25rem;
  font-size: 1.05rem;
  font-weight: 700;
  color: #0b2545;
  display: flex;
  align-items: center;
  gap: 10px;
  border-radius: 0 8px 8px 0;
}
.map-container {
  border-radius: 12px;
  overflow: hidden;
  border: 1px solid #cbd5e1;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
}
</style>

<section class="subpage-main-section py-4 bg-light">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="syl-card">
          <div class="syl-card-header">
            <h2 class="syl-card-title">
              <i class="fa fa-map-location-dot text-warning"></i>
              <?php echo htmlspecialchars($page_info['heading'] ?? 'Get In Touch with SSSUTMS'); ?>
            </h2>
          </div>
          
          <div class="syl-card-body">
            
            <!-- Contact Information Cards -->
            <div class="row g-4 mb-4">
              
              <!-- Location -->
              <div class="col-md-6">
                <div class="contact-info-card">
                  <div class="contact-icon-box">
                    <i class="fa <?php echo htmlspecialchars($loc['icon'] ?? 'fa-location-dot'); ?>"></i>
                  </div>
                  <div>
                    <h6 class="fw-bold text-dark mb-1"><?php echo htmlspecialchars($loc['title'] ?? 'Campus Location'); ?></h6>
                    <p class="text-secondary small mb-0">
                      <?php echo htmlspecialchars($loc['university_name'] ?? 'Sri Satya Sai University of Technology & Medical Sciences (SSSUTMS)'); ?><br>
                      <?php echo htmlspecialchars($loc['address'] ?? 'Opp. Oilfed Plant, Bhopal-Indore Road, Sehore (M.P.) – 466001'); ?>
                    </p>
                  </div>
                </div>
              </div>

              <!-- Email & Web -->
              <div class="col-md-6">
                <div class="contact-info-card">
                  <div class="contact-icon-box">
                    <i class="fa <?php echo htmlspecialchars($emailPortal['icon'] ?? 'fa-envelope-open-text'); ?>"></i>
                  </div>
                  <div>
                    <h6 class="fw-bold text-dark mb-1"><?php echo htmlspecialchars($emailPortal['title'] ?? 'Email & Portal'); ?></h6>
                    <p class="text-secondary small mb-1">
                      <strong>General:</strong> <a href="mailto:<?php echo htmlspecialchars($emailPortal['general_email'] ?? 'info@sssutms.co.in'); ?>" class="text-primary text-decoration-none"><?php echo htmlspecialchars($emailPortal['general_email'] ?? 'info@sssutms.co.in'); ?></a><br>
                      <strong>Registrar:</strong> <a href="mailto:<?php echo htmlspecialchars($emailPortal['registrar_email'] ?? 'registrar@sssutms.co.in'); ?>" class="text-primary text-decoration-none"><?php echo htmlspecialchars($emailPortal['registrar_email'] ?? 'registrar@sssutms.co.in'); ?></a>
                    </p>
                    <p class="text-muted small mb-0"><strong>Web:</strong> <?php echo htmlspecialchars($emailPortal['websites'] ?? 'www.sssutms.co.in | www.sssutms.ac.in'); ?></p>
                  </div>
                </div>
              </div>

              <!-- University Helpdesk -->
              <div class="col-md-6">
                <div class="contact-info-card">
                  <div class="contact-icon-box">
                    <i class="fa <?php echo htmlspecialchars($helpdesk['icon'] ?? 'fa-phone-volume'); ?>"></i>
                  </div>
                  <div>
                    <h6 class="fw-bold text-dark mb-1"><?php echo htmlspecialchars($helpdesk['title'] ?? 'University Helpdesk'); ?></h6>
                    <p class="text-secondary small mb-0">
                      <strong>Tel:</strong> <?php echo htmlspecialchars($helpdesk['telephone'] ?? '+91-7562-292740'); ?><br>
                      <strong>Board:</strong> <?php echo htmlspecialchars($helpdesk['board_numbers'] ?? '07562-292203, 07562-292204, 07562-292205'); ?><br>
                      <strong>Fax:</strong> <?php echo htmlspecialchars($helpdesk['fax'] ?? '+91-07562-292201'); ?>
                    </p>
                  </div>
                </div>
              </div>

              <!-- Admission Helplines -->
              <div class="col-md-6">
                <div class="contact-info-card">
                  <div class="contact-icon-box">
                    <i class="fa <?php echo htmlspecialchars($adm['icon'] ?? 'fa-headset'); ?>"></i>
                  </div>
                  <div>
                    <h6 class="fw-bold text-dark mb-1"><?php echo htmlspecialchars($adm['title'] ?? 'Admission Helplines'); ?></h6>
                    <p class="text-secondary small mb-1">
                      <strong>Toll Free / Direct:</strong> <a href="tel:<?php echo htmlspecialchars($adm['toll_free_tel'] ?? '+917748900028'); ?>" class="text-dark fw-bold text-decoration-none"><?php echo htmlspecialchars($adm['toll_free'] ?? '+91-7748900028'); ?></a><br>
                      <strong>Admission Cell:</strong> <a href="tel:<?php echo htmlspecialchars($adm['admission_cell_tel'] ?? '+917562292740'); ?>" class="text-dark fw-bold text-decoration-none"><?php echo htmlspecialchars($adm['admission_cell'] ?? '+91-7562-292740'); ?></a>
                    </p>
                    <span class="badge bg-success"><?php echo htmlspecialchars($adm['timings'] ?? 'Mon – Sat: 9:00 AM to 5:30 PM'); ?></span>
                  </div>
                </div>
              </div>

            </div>

            <!-- Important Contact Directory -->
            <div class="department-heading">
              <i class="fa fa-address-book"></i> <?php echo htmlspecialchars($page_info['directory_heading'] ?? 'University Authorities & Key Officers Directory'); ?>
            </div>

            <div class="table-responsive rounded-3 border mb-4">
              <table class="syl-table">
                <thead>
                  <tr>
                    <th style="width: 70px;" class="text-center">S.No.</th>
                    <th>Official Name &amp; Designation</th>
                    <th style="width: 200px;">Direct Telephone / Intercom</th>
                    <th style="width: 140px;" class="text-center">Contact Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (empty($officers)): ?>
                    <tr>
                      <td colspan="4" class="text-center py-4 text-muted">No directory entries currently available.</td>
                    </tr>
                  <?php else: ?>
                    <?php 
                    $index = 1;
                    foreach ($officers as $off): 
                      $sno = !empty($off['sno']) ? $off['sno'] : str_pad($index, 2, '0', STR_PAD_LEFT);
                      $cleanTel = preg_replace('/[^0-9\+]/', '', $off['phone']);
                    ?>
                    <tr>
                      <td class="text-center fw-bold text-secondary"><?php echo htmlspecialchars($sno); ?></td>
                      <td>
                        <div class="fw-bold text-dark"><?php echo htmlspecialchars($off['name']); ?></div>
                        <div class="small text-muted"><?php echo htmlspecialchars($off['designation']); ?></div>
                      </td>
                      <td class="fw-bold text-primary"><?php echo htmlspecialchars($off['phone']); ?></td>
                      <td class="text-center">
                        <a href="tel:<?php echo htmlspecialchars($cleanTel); ?>" class="syl-btn">
                          <i class="fa <?php echo htmlspecialchars($off['action_icon'] ?? 'fa-phone'); ?>"></i> <?php echo htmlspecialchars($off['action_label'] ?? 'Call Office'); ?>
                        </a>
                      </td>
                    </tr>
                    <?php 
                      $index++;
                    endforeach; 
                    ?>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>

            <!-- Quick Inquiry & Message Form -->
            <div class="department-heading">
              <i class="fa fa-paper-plane"></i> <?php echo htmlspecialchars($page_info['form_heading'] ?? 'Send Us an Inquiry / Feedback Message'); ?>
            </div>

            <div class="p-4 bg-light rounded-3 border mb-4">
              <form action="<?php echo BASE_URL; ?>submit-handler.php" method="POST">
                <input type="hidden" name="form_type" value="contact_inquiry">
                <div class="row g-3">
                  <div class="col-md-6">
                    <label class="form-label fw-bold text-dark small">Full Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" placeholder="Enter your full name" required>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label fw-bold text-dark small">Email Address <span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control" placeholder="Enter your email address" required>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label fw-bold text-dark small">Mobile Number <span class="text-danger">*</span></label>
                    <input type="tel" name="phone" class="form-control" placeholder="10-digit mobile number" required>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label fw-bold text-dark small">Course / Subject of Interest</label>
                    <input type="text" name="course" class="form-control" placeholder="e.g. B.Tech, B.Pharm, MBA, Ph.D.">
                  </div>
                  <div class="col-12">
                    <label class="form-label fw-bold text-dark small">Subject / Purpose of Inquiry <span class="text-danger">*</span></label>
                    <input type="text" name="subject" class="form-control" placeholder="Enter subject of inquiry" required>
                  </div>
                  <div class="col-12">
                    <label class="form-label fw-bold text-dark small">Your Message / Query <span class="text-danger">*</span></label>
                    <textarea name="message" class="form-control" rows="4" placeholder="Write your detailed query or message here..." required></textarea>
                  </div>
                  <div class="col-12 text-end">
                    <button type="reset" class="btn btn-outline-secondary me-2">Reset</button>
                    <button type="submit" class="syl-btn">
                      <i class="fa fa-paper-plane"></i> Send Message
                    </button>
                  </div>
                </div>
              </form>
            </div>

            <!-- Campus Interactive Map -->
            <div class="department-heading">
              <i class="fa fa-map"></i> <?php echo htmlspecialchars($page_info['map_heading'] ?? 'Campus Location on Map'); ?>
            </div>

            <div class="map-container">
              <iframe src="<?php echo htmlspecialchars($page_info['map_embed_url'] ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4423.9559848803465!2d77.12371640709164!3d23.21561474176524!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x397cf4c949567e4d%3A0xc7649cfdfe73a024!2sSri%20Satya%20Sai%20University%20of%20Technology%20%26%20Medical%20Sciences%2C%20Sehore!5e0!3m2!1sen!2sin!4v1700721177302!5m2!1sen!2sin'); ?>" width="100%" height="400" style="border:0; display:block;" allowfullscreen loading="lazy"></iframe>
            </div>

          </div>
        </div>
      </div>

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>