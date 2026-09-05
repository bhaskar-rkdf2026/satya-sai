<?php
$page_title = 'Contact Us - SSSUTMS';
$banner_title = 'Contact Us';
$banner_category = 'SSSUTMS';

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/topbar.php';
require_once __DIR__ . '/includes/navbar.php';
require_once __DIR__ . '/includes/page-banner.php';

$message_sent = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form_name'])) {
    $message_sent = true;
}
?>

<style>
  .contact-main-card {
    background: #ffffff;
    border-radius: 16px;
    border: 1px solid #e2e8f0;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(11, 37, 69, 0.06);
    transition: all 0.3s ease;
  }
  .contact-card-header {
    background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
    padding: 22px 28px;
    position: relative;
  }
  .contact-gold-line {
    height: 3px;
    background: linear-gradient(90deg, #f3752c 0%, #f6a935 50%, #f3752c 100%);
    width: 100%;
  }
  .contact-info-tile {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 14px;
    padding: 22px 20px;
    height: 100%;
    display: flex;
    gap: 16px;
    align-items: flex-start;
    box-shadow: 0 3px 12px rgba(11, 37, 69, 0.03);
    transition: all 0.25s ease;
  }
  .contact-info-tile:hover {
    border-color: #cbd5e1;
    transform: translateY(-3px);
    box-shadow: 0 8px 24px rgba(11, 37, 69, 0.08);
  }
  .contact-icon-box {
    width: 48px;
    height: 48px;
    min-width: 48px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
  }
  .icon-location {
    background: rgba(37, 99, 235, 0.1);
    color: #2563eb;
  }
  .icon-mail {
    background: rgba(243, 117, 44, 0.12);
    color: #f3752c;
  }
  .icon-phone {
    background: rgba(16, 185, 129, 0.12);
    color: #10b981;
  }
  .icon-admission {
    background: rgba(139, 92, 246, 0.12);
    color: #8b5cf6;
  }
  .section-heading-strip {
    font-size: 1.2rem;
    font-weight: 700;
    color: #0b2545;
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 20px;
    padding-bottom: 8px;
    border-bottom: 2px solid #e2e8f0;
  }
  .section-heading-strip i {
    color: #f3752c;
  }
  .contact-form-card {
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 14px;
    padding: 24px;
    margin-bottom: 30px;
  }
  .contact-form-card .form-control {
    border-radius: 8px;
    border: 1px solid #cbd5e1;
    padding: 10px 14px;
    font-size: 0.95rem;
    transition: all 0.2s ease;
  }
  .contact-form-card .form-control:focus {
    border-color: #0b2545;
    box-shadow: 0 0 0 3px rgba(11, 37, 69, 0.12);
  }
  .btn-contact-submit {
    background: linear-gradient(135deg, #f3752c 0%, #e0580a 100%);
    color: #ffffff;
    font-weight: 600;
    border-radius: 50px;
    padding: 10px 28px;
    border: none;
    box-shadow: 0 4px 14px rgba(243, 117, 44, 0.3);
    transition: all 0.25s ease;
  }
  .btn-contact-submit:hover {
    background: linear-gradient(135deg, #e0580a 0%, #c94700 100%);
    color: #ffffff;
    transform: translateY(-2px);
    box-shadow: 0 6px 18px rgba(243, 117, 44, 0.4);
  }
  .btn-contact-reset {
    border-radius: 50px;
    padding: 10px 24px;
    font-weight: 600;
    background: #ffffff;
    border: 1px solid #cbd5e1;
    color: #475569;
    transition: all 0.2s ease;
  }
  .btn-contact-reset:hover {
    background: #f1f5f9;
    color: #0f172a;
  }
  .officials-table-wrap {
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    overflow: hidden;
    margin-bottom: 30px;
    box-shadow: 0 2px 10px rgba(11, 37, 69, 0.03);
  }
  .officials-table-wrap thead {
    background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
    color: #ffffff;
  }
  .officials-table-wrap th {
    padding: 14px 18px;
    font-size: 0.92rem;
    font-weight: 600;
    border: none;
  }
  .officials-table-wrap td {
    padding: 14px 18px;
    vertical-align: middle;
    font-size: 0.95rem;
    border-color: #f1f5f9;
  }
  .map-card-wrap {
    border: 1px solid #e2e8f0;
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 3px 15px rgba(11, 37, 69, 0.05);
  }
  .map-card-wrap iframe {
    display: block;
    width: 100%;
    height: 420px;
  }
</style>

<section class="subpage-main-section py-4" style="background-color: #f8fafc;">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="contact-main-card mb-4">
          
          <!-- Card Header with Portal Theme -->
          <div class="contact-card-header text-white">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
              <div class="d-flex align-items-center gap-3">
                <div class="bg-white bg-opacity-10 p-2 rounded-circle d-flex align-items-center justify-content-center" style="width: 46px; height: 46px;">
                  <i class="fa fa-envelope-open-text text-warning fs-5"></i>
                </div>
                <div>
                  <h4 class="fw-bold mb-0 text-white">Contact Us</h4>
                  <p class="small text-white-50 mb-0">Sri Satya Sai University of Technology and Medical Sciences</p>
                </div>
              </div>
              <div>
                <span class="badge rounded-pill px-3 py-2 fw-semibold" style="background: rgba(243, 117, 44, 0.25); border: 1px solid rgba(243, 117, 44, 0.45); color: #ffd5b8;">
                  <i class="fa fa-headset me-1"></i> University Helpdesk
                </span>
              </div>
            </div>
          </div>
          <div class="contact-gold-line"></div>

          <!-- Card Body -->
          <div class="p-4">

            <!-- 1. Four Core Contact Information Tiles (From Live Site) -->
            <div class="row g-3 mb-5" id="location">
              
              <!-- Location -->
              <div class="col-md-6">
                <div class="contact-info-tile">
                  <div class="contact-icon-box icon-location">
                    <i class="fa fa-location-dot"></i>
                  </div>
                  <div>
                    <h6 class="fw-bold text-dark mb-1">Our Office Location</h6>
                    <p class="mb-1 text-secondary small" style="line-height: 1.6;">
                      <strong class="text-dark">SSSUTMS</strong><br>
                      Opp. Oilfed Plant, Bhopal-Indore Road,<br>
                      Sehore (M.P), Pin - 466001
                    </p>
                  </div>
                </div>
              </div>

              <!-- Contact Numbers -->
              <div class="col-md-6">
                <div class="contact-info-tile">
                  <div class="contact-icon-box icon-phone">
                    <i class="fa fa-phone-volume"></i>
                  </div>
                  <div>
                    <h6 class="fw-bold text-dark mb-1">Contact Number</h6>
                    <p class="mb-1 text-secondary small" style="line-height: 1.6;">
                      <a href="tel:+917562292740" class="text-decoration-none text-dark fw-semibold">+91-7562292740</a><br>
                      <span>+91-07562-292203, 07562-292204, 07562-292205</span>
                    </p>
                  </div>
                </div>
              </div>

              <!-- Email Address -->
              <div class="col-md-6">
                <div class="contact-info-tile">
                  <div class="contact-icon-box icon-mail">
                    <i class="fa fa-envelope"></i>
                  </div>
                  <div>
                    <h6 class="fw-bold text-dark mb-1">Email &amp; Web</h6>
                    <p class="mb-1 text-secondary small" style="line-height: 1.6;">
                      <span>Fax: +91-07562-292201</span><br>
                      <span>Email: <a href="mailto:info@sssutms.co.in" class="text-primary text-decoration-none fw-semibold">info@sssutms.co.in</a>, <a href="mailto:srisatyasaiuniversity2013@gmail.com" class="text-primary text-decoration-none fw-semibold">srisatyasaiuniversity2013@gmail.com</a></span><br>
                      <span>Visit us at: <a href="https://www.sssutms.co.in" target="_blank" class="text-dark text-decoration-none">www.sssutms.co.in</a>, <a href="https://www.sssutms.ac.in" target="_blank" class="text-dark text-decoration-none">www.sssutms.ac.in</a></span>
                    </p>
                  </div>
                </div>
              </div>

              <!-- For Admission -->
              <div class="col-md-6">
                <div class="contact-info-tile">
                  <div class="contact-icon-box icon-admission">
                    <i class="fa fa-graduation-cap"></i>
                  </div>
                  <div>
                    <h6 class="fw-bold text-dark mb-1">For Admission</h6>
                    <p class="mb-1 text-secondary small" style="line-height: 1.6;">
                      <a href="tel:+917748900028" class="text-decoration-none text-dark fw-semibold">+91-7748900028</a> | 
                      <a href="tel:+917562292740" class="text-decoration-none text-dark fw-semibold">+91-7562292740</a><br>
                      <span class="text-muted">Direct admission inquiry &amp; counseling helpline</span>
                    </p>
                  </div>
                </div>
              </div>

            </div>

            <!-- 2. Contact / Message Form (From Live Site) -->
            <div class="contact-form-card" id="message-form">
              <div class="section-heading-strip border-0 mb-3 p-0">
                <i class="fa fa-paper-plane"></i>
                <span>Send Your Message</span>
              </div>
              <p class="text-muted small mb-4">Feel free to reach out to us with any query or feedback. Our administrative cell will respond promptly.</p>

              <?php if ($message_sent): ?>
                <div class="alert alert-success d-flex align-items-center rounded-3 p-3 mb-4" role="alert">
                  <i class="fa fa-circle-check fs-4 me-3"></i>
                  <div>
                    <strong>Thank you!</strong> Your message has been submitted successfully. Our team will contact you shortly.
                  </div>
                </div>
              <?php endif; ?>

              <form id="contact_form" name="contact_form" action="#message-form" method="post">
                <div class="row g-3">
                  <div class="col-md-6">
                    <label class="form-label small fw-semibold text-dark">Name <span class="text-danger">*</span></label>
                    <input name="form_name" class="form-control" type="text" placeholder="Enter Name" required>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label small fw-semibold text-dark">Email <span class="text-danger">*</span></label>
                    <input name="form_email" class="form-control" type="email" placeholder="Enter Email" required>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label small fw-semibold text-dark">Subject <span class="text-danger">*</span></label>
                    <input name="form_subject" class="form-control" type="text" placeholder="Enter Subject" required>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label small fw-semibold text-dark">Phone</label>
                    <input name="form_phone" class="form-control" type="text" placeholder="Enter Phone">
                  </div>
                  <div class="col-12">
                    <label class="form-label small fw-semibold text-dark">Message <span class="text-danger">*</span></label>
                    <textarea name="form_message" class="form-control" rows="5" placeholder="Enter Message" required></textarea>
                  </div>
                  <div class="col-12 pt-2 d-flex flex-wrap gap-2">
                    <button type="submit" class="btn-contact-submit">
                      <i class="fa fa-paper-plane me-1"></i> Send your message
                    </button>
                    <button type="reset" class="btn-contact-reset">
                      <i class="fa fa-rotate-left me-1"></i> Reset
                    </button>
                  </div>
                </div>
              </form>
            </div>

            <!-- 3. Important Contact Numbers Table (From Live Site) -->
            <div class="mb-5" id="important-contacts">
              <div class="section-heading-strip">
                <i class="fa fa-address-book"></i>
                <span>Important Contact Numbers</span>
              </div>
              <div class="table-responsive officials-table-wrap">
                <table class="table table-hover align-middle mb-0">
                  <thead>
                    <tr>
                      <th style="width: 50%;">Officer &amp; Designation</th>
                      <th style="width: 50%;">Contact Number</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <div class="fw-bold text-dark">Dr. Mukesh Tiwari</div>
                        <div class="small text-muted">(Vice Chancellor)</div>
                      </td>
                      <td>
                        <a href="tel:07562292203" class="text-decoration-none fw-semibold text-primary">
                          <i class="fa fa-phone me-1"></i> 07562-292203
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="fw-bold text-dark">Dr. H. K. Sharma</div>
                        <div class="small text-muted">(Registrar)</div>
                      </td>
                      <td>
                        <a href="tel:07562292204" class="text-decoration-none fw-semibold text-primary">
                          <i class="fa fa-phone me-1"></i> 07562-292204
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="fw-bold text-dark">Dr. Kanchan Shrivastava</div>
                        <div class="small text-muted">(Dy. Registrar)</div>
                      </td>
                      <td>
                        <a href="tel:07562292202" class="text-decoration-none fw-semibold text-primary">
                          <i class="fa fa-phone me-1"></i> 07562-292202
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="fw-bold text-dark">Dr. Sanjay Rathore</div>
                        <div class="small text-muted">(Exam Controller)</div>
                      </td>
                      <td>
                        <a href="tel:07562292201" class="text-decoration-none fw-semibold text-primary">
                          <i class="fa fa-phone me-1"></i> 07562-292201
                        </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <!-- 4. Campus Location Map (From Live Site) -->
            <div id="campus-map">
              <div class="section-heading-strip">
                <i class="fa fa-map-location-dot"></i>
                <span>Campus Location Map</span>
              </div>
              <div class="map-card-wrap">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4423.9559848803465!2d77.12371640709164!3d23.21561474176524!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x397cf4c949567e4d%3A0xc7649cfdfe73a024!2sSri%20Satya%20Sai%20University%20of%20Technology%20%26%20Medical%20Sciences%2C%20Sehore!5e0!3m2!1sen!2sin!4v1700721177302!5m2!1sen!2sin" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
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