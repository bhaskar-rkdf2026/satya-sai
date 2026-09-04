<?php
$page_title = 'University Account Detail - SSSUTMS';
$banner_title = 'University Account Detail';
$banner_category = 'Admission';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?>

<style>
.uad-section { background-color: #f8fafc; }
.uad-main-card {
  background: #ffffff;
  border-radius: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 30px rgba(15,23,42,0.05);
  overflow: hidden;
  margin-bottom: 2rem;
}
.uad-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
  color: #ffffff;
  padding: 2.2rem 2rem;
  position: relative;
}
.uad-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.uad-stat-chip {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 16px 14px;
  display: flex; align-items: center; gap: 12px;
  height: 100%;
  transition: all 0.25s ease;
  box-shadow: 0 4px 12px rgba(0,0,0,0.02);
}
.uad-stat-chip:hover {
  border-color: #cbd5e1;
  box-shadow: 0 6px 18px rgba(11,37,69,0.07);
  transform: translateY(-2px);
}
.uad-stat-icon {
  width: 48px; height: 48px;
  border-radius: 12px;
  background: rgba(245,158,11,0.12);
  color: #d97706;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.35rem; flex-shrink: 0;
}
.uad-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 16px;
  padding: 1.5rem;
  box-shadow: 0 4px 16px rgba(0,0,0,0.02);
  margin-bottom: 1.75rem;
}
.uad-card-header {
  display: flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 1.2rem;
  padding-bottom: 0.85rem;
  border-bottom: 2px solid #f1f5f9;
}
.uad-card-header i {
  color: #f59e0b;
  font-size: 1.3rem;
}
.uad-bank-box {
  background: linear-gradient(135deg, #0b2545 0%, #1e4d8c 100%);
  color: #ffffff;
  border-radius: 16px;
  padding: 1.75rem;
  box-shadow: 0 8px 24px rgba(11,37,69,0.15);
}
.uad-qr-img {
  max-width: 320px;
  width: 100%;
  border-radius: 14px;
  border: 3px solid #e2e8f0;
  box-shadow: 0 6px 18px rgba(0,0,0,0.08);
}
.uad-table {
  width: 100%;
  border-collapse: collapse;
  border-radius: 12px;
  overflow: hidden;
  border: 1px solid #e2e8f0;
}
.uad-table th {
  background: #0b2545;
  color: #ffffff;
  padding: 12px 16px;
  font-weight: 700;
  font-size: 0.9rem;
  border: 1px solid #1e3a5f;
}
.uad-table td {
  padding: 12px 16px;
  border: 1px solid #e2e8f0;
  color: #334155;
  font-size: 0.92rem;
}
.uad-table tbody tr:nth-child(even) {
  background-color: #f8fafc;
}
</style>

<section class="subpage-main-section uad-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="uad-main-card">

          <!-- Header Banner -->
          <div class="uad-header-banner d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="badge text-white fw-bold uppercase mb-2 px-3 py-2 rounded-pill" style="background:rgba(245,158,11,0.25); border:1px solid rgba(245,158,11,0.4);">
                <i class="fa-solid fa-building-columns me-1"></i> PNB On-Campus Branch &amp; Online Gateway
              </span>
              <h3 class="fw-bold text-white mb-1 fs-3">UNIVERSITY BANK &amp; ACCOUNT DETAILS</h3>
              <p class="text-white-50 mb-0 small">Official NEFT/RTGS Account Numbers, BHIM UPI QR Code &amp; Gateway Charges</p>
            </div>
            <div>
              <a href="https://sssutms.payjix.com/" target="_blank" rel="noopener" class="btn btn-warning fw-bold px-4 py-2 text-dark rounded-3">
                <i class="fa-solid fa-qrcode me-1"></i> Pay Fee Online (Payjix Portal)
              </a>
            </div>
          </div>

          <!-- Content Body -->
          <div class="p-4">

            <!-- Stat Chips -->
            <div class="row g-3 align-items-stretch mb-4">
              <div class="col-sm-6 col-md-3">
                <div class="uad-stat-chip">
                  <div class="uad-stat-icon"><i class="fa-solid fa-landmark"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Campus Bank</div>
                    <div class="fw-bold text-dark fs-6">Punjab National Bank</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="uad-stat-chip">
                  <div class="uad-stat-icon"><i class="fa-solid fa-vault"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Student Facilities</div>
                    <div class="fw-bold text-dark fs-6">Zero Balance &amp; ATM</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="uad-stat-chip">
                  <div class="uad-stat-icon"><i class="fa-solid fa-qrcode"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">UPI Mode</div>
                    <div class="fw-bold text-dark fs-6">Zero Convenience Fee</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="uad-stat-chip">
                  <div class="uad-stat-icon"><i class="fa-solid fa-credit-card"></i></div>
                  <div>
                    <div class="text-muted extra-small uppercase fw-bold">Online Gateway</div>
                    <div class="fw-bold text-dark fs-6">Netbanking &amp; Cards</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Overview & PNB Bank Card -->
            <div class="uad-card">
              <div class="uad-card-header">
                <i class="fa-solid fa-building-columns text-warning"></i>
                <h5 class="fw-bold text-dark mb-0">On-Campus Banking Facilities</h5>
              </div>
              <p class="text-dark lh-lg mb-3" style="text-align: justify;">
                Sri Satya Sai Group of Institutions has a full-fledged branch of <strong>Punjab National Bank (PNB)</strong> and an <strong>ATM</strong> within the college premises. This nationalized bank provides all transactional facilities for students and staff, including zero balance accounts, educational loan procurement support, and student-friendly schemes.
              </p>

              <!-- Bank Account Details Box -->
              <div class="uad-bank-box">
                <span class="badge bg-warning text-dark fw-bold mb-2">Official University Account for NEFT / RTGS / IMPS</span>
                <h4 class="fw-bold text-white mb-3">Sri Satya Sai University of Technology &amp; Medical Sciences (SSSUTMS)</h4>
                <div class="row g-3">
                  <div class="col-sm-6">
                    <div class="small text-white-50 uppercase fw-bold">Bank Name</div>
                    <div class="fs-6 fw-bold text-white"><i class="fa-solid fa-landmark text-warning me-1"></i> Punjab National Bank (PNB)</div>
                  </div>
                  <div class="col-sm-6">
                    <div class="small text-white-50 uppercase fw-bold">Account Name</div>
                    <div class="fs-6 fw-bold text-white"><i class="fa-solid fa-user text-warning me-1"></i> SSSUTMS</div>
                  </div>
                  <div class="col-sm-6">
                    <div class="small text-white-50 uppercase fw-bold">Account Number</div>
                    <div class="fs-5 fw-bold text-warning font-monospace"><i class="fa-solid fa-credit-card text-warning me-1"></i> 7162002100000506</div>
                  </div>
                  <div class="col-sm-6">
                    <div class="small text-white-50 uppercase fw-bold">IFSC Code</div>
                    <div class="fs-5 fw-bold text-warning font-monospace"><i class="fa-solid fa-code text-warning me-1"></i> PUNB0716200</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- UPI Scan & Pay Section -->
            <div class="uad-card">
              <div class="uad-card-header">
                <i class="fa-solid fa-qrcode text-warning"></i>
                <h5 class="fw-bold text-dark mb-0">Scan &amp; Pay Using Any BHIM UPI</h5>
              </div>
              <div class="row align-items-center g-4">
                <div class="col-md-5 text-center">
                  <img src="<?php echo BASE_URL; ?>assets/images/Files/Link/WhatsApp_Image_2026-01-21_at_11.39.09_AM_21012026_1201.jpg" alt="BHIM UPI QR Code" class="uad-qr-img">
                </div>
                <div class="col-md-7">
                  <span class="badge bg-success text-white fw-bold px-3 py-2 rounded-pill mb-2"><i class="fa-solid fa-check me-1"></i> Direct Merchant UPI Payment</span>
                  <h5 class="fw-bold text-dark mb-2">Scan QR Code via PhonePe, Google Pay, Paytm, or BHIM</h5>
                  <p class="text-muted small mb-3">Pay tuition fees directly through any UPI app with 0% extra charges for instant receipt generation.</p>
                  <a href="https://sssutms.payjix.com/" target="_blank" rel="noopener" class="btn btn-primary fw-bold px-4 py-2 rounded-3">
                    <i class="fa-solid fa-arrow-right-from-bracket me-1"></i> Open Online Payjix Portal
                  </a>
                </div>
              </div>
            </div>

            <!-- Payment Instruments & Transaction Charges Table -->
            <div class="uad-card mb-0">
              <div class="uad-card-header">
                <i class="fa-solid fa-receipt text-warning"></i>
                <h5 class="fw-bold text-dark mb-0">Online Payment Instruments &amp; Convenience Charges</h5>
              </div>
              <div class="table-responsive">
                <table class="uad-table">
                  <thead>
                    <tr>
                      <th style="width: 50%;">Payment Instrument</th>
                      <th class="text-center" style="width: 50%;">Transaction Charges</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr><td><strong>UPI (BHIM, GPay, PhonePe, Paytm)</strong></td><td class="text-center text-success fw-bold"><i class="fa-solid fa-circle-check me-1"></i> No Charges (0%)</td></tr>
                    <tr><td><strong>Debit Card (Rupay Card)</strong></td><td class="text-center text-success fw-bold"><i class="fa-solid fa-circle-check me-1"></i> No Charges (0%)</td></tr>
                    <tr><td><strong>Debit Card (Other Visa/MasterCard &lt;= ₹2000)</strong></td><td class="text-center">0.40% per transaction</td></tr>
                    <tr><td><strong>Debit Card (Other Visa/MasterCard &gt; ₹2000)</strong></td><td class="text-center">0.90% per transaction</td></tr>
                    <tr><td><strong>Credit Card (All Cards)</strong></td><td class="text-center">1.10% per transaction</td></tr>
                    <tr><td><strong>Netbanking (All Banks)</strong></td><td class="text-center">₹15 per transaction</td></tr>
                    <tr><td><strong>Digital Wallets</strong></td><td class="text-center">1.50% per transaction</td></tr>
                  </tbody>
                </table>
              </div>
            </div>

          </div>
        </div><!-- end uad-main-card -->
      </div><!-- end col-lg-8 -->

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>