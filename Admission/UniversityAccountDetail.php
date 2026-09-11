<?php
require_once __DIR__ . '/../config.php';

// Load dynamic data from JSON
$admissionData = get_json_data('admission_data.json', []);
$accData = $admissionData['UniversityAccountDetail'] ?? [
    'page_title' => 'University Account Detail',
    'bank_title' => 'Bank Detail',
    'bank_desc' => 'Sri Satya Sai Group of Institutions has a full-fledged branch of Punjab National Bank and its ATM in the college premises. It is a Nationalized Bank which has given all kinds of transactional facility to students and staff. The bank also provides zero balance accounts to students, helps them in procuring Education loan and promotes their students friendly schemes.',
    'bank_name' => 'Punjab National Bank',
    'account_name' => 'SSSUTMS',
    'account_number' => '7162002100000506',
    'ifsc_code' => 'PUNB0716200',
    'branch' => 'SSSUTMS Campus, Sehore (M.P.)',
    'online_banking_url' => 'https://sssutms.payjix.com/',
    'qr_image' => 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/WhatsApp_Image_2026-01-21_at_11.39.09_AM_21012026_1201.jpeg',
    'charges' => [
        ['instrument' => 'UPI', 'charges' => 'No Charges'],
        ['instrument' => 'Debit Card (Rupay Card)', 'charges' => 'No Charges'],
        ['instrument' => 'Debit Card (Other Cards)', 'charges' => '0.40% <= INR 2000 per transaction / 0.90% > INR 2000 per transaction'],
        ['instrument' => 'Credit Card', 'charges' => '1.1% per transaction'],
        ['instrument' => 'Netbanking', 'charges' => 'INR 15 per transaction'],
        ['instrument' => 'Wallet', 'charges' => '1.50% per transaction']
    ]
];

$page_title = ($accData['page_title'] ?? 'University Account Detail') . ' - SSSUTMS';
$banner_title = $accData['page_title'] ?? 'University Account Detail';
$banner_category = 'Admission';

require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/topbar.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/page-banner.php';
?>

<!-- Bootstrap Icons CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

<style>
.adm-card {
  background: #ffffff;
  border-radius: 16px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 8px 24px rgba(15, 23, 42, 0.04);
  overflow: hidden;
}
.adm-card-header {
  background: linear-gradient(135deg, #0b2545 0%, #1e4d8c 100%);
  padding: 1.5rem 2rem;
  border-top-left-radius: 16px;
  border-top-right-radius: 16px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  position: relative;
}
.adm-card-header::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}
.adm-card-header h2,
.adm-card-header h2 i {
  color: #ffffff !important;
  font-size: 1.45rem;
  font-weight: 700;
  letter-spacing: -0.02em;
}
.adm-card-header span,
.adm-card-header small {
  color: rgba(255, 255, 255, 0.85) !important;
}
.bank-info-box {
  background: linear-gradient(135deg, #f8fafc 0%, #edf2f7 100%);
  border: 1px solid #cbd5e1;
  border-left: 5px solid #0b2545;
  border-radius: 12px;
  padding: 1.5rem;
  margin-bottom: 2rem;
}
.qr-card {
  background: #ffffff;
  border: 2px dashed #0b2545;
  border-radius: 16px;
  padding: 1.5rem;
  text-align: center;
  box-shadow: 0 4px 16px rgba(0,0,0,0.04);
}
.charges-table th {
  background-color: #0b2545 !important;
  color: #ffffff !important;
  font-weight: 700;
  padding: 10px 14px;
}
.charges-table td {
  padding: 10px 14px;
  vertical-align: middle;
}
</style>

<section class="py-5 bg-light">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content (Left Column) -->
      <div class="col-lg-8 col-xl-9">
        <div class="adm-card">
          <div class="adm-card-header">
            <div>
              <h2 class="fs-4 mb-0 fw-bold d-flex align-items-center">
                <i class="bi bi-journal-text me-2"></i> <?php echo htmlspecialchars($accData['page_title'] ?? 'University Account Detail'); ?>
              </h2>
              <span class="text-white-50 extra-small">Official Punjab National Bank &amp; Online Payment Gateway</span>
            </div>
            <a href="<?php echo htmlspecialchars($accData['online_banking_url'] ?? '#'); ?>" target="_blank" rel="noopener" class="btn btn-warning btn-sm rounded-pill fw-bold px-3">
              <i class="fa-solid fa-lock me-1"></i> Pay Online
            </a>
          </div>

          <div class="card-body p-4 p-md-5">
            <article class="fs-5 lh-lg text-secondary">

              <!-- Section Heading -->
              <div class="text-center mb-4">
                <h3 class="fw-bold mb-1" style="color: #ff9c00;">
                  <?php echo htmlspecialchars($accData['bank_title'] ?? 'Bank Detail'); ?>
                </h3>
                <p class="text-muted small">Official Bank Particulars for Tuition Fee Deposit &amp; Electronic Transfers</p>
              </div>

              <!-- Bank Description -->
              <div class="p-3.5 p-md-4 rounded-3 mb-4 bg-light border border-slate-200">
                <p class="text-dark mb-0 fs-6 lh-base" style="text-align: justify;">
                  <?php echo nl2br(htmlspecialchars($accData['bank_desc'] ?? '')); ?>
                </p>
              </div>

              <!-- Bank Particulars Grid -->
              <div class="bank-info-box">
                <h5 class="fw-bold text-dark mb-3">
                  <i class="fa-solid fa-building-columns text-primary me-2"></i>Bank Account Detail (Punjab National Bank)
                </h5>
                <div class="row g-3">
                  <div class="col-sm-6">
                    <span class="text-muted small d-block">Account Name / Beneficiary</span>
                    <strong class="text-dark fs-5"><?php echo htmlspecialchars($accData['account_name'] ?? 'SSSUTMS'); ?></strong>
                  </div>
                  <div class="col-sm-6">
                    <span class="text-muted small d-block">Bank Name</span>
                    <strong class="text-dark fs-5"><?php echo htmlspecialchars($accData['bank_name'] ?? 'Punjab National Bank'); ?></strong>
                  </div>
                  <div class="col-sm-6">
                    <span class="text-muted small d-block">Account Number</span>
                    <strong class="text-primary fs-4 fw-bold font-monospace"><?php echo htmlspecialchars($accData['account_number'] ?? '7162002100000506'); ?></strong>
                  </div>
                  <div class="col-sm-6">
                    <span class="text-muted small d-block">IFSC Code</span>
                    <strong class="text-dark fs-4 fw-bold font-monospace"><?php echo htmlspecialchars($accData['ifsc_code'] ?? 'PUNB0716200'); ?></strong>
                  </div>
                  <div class="col-12">
                    <span class="text-muted small d-block">Branch Location</span>
                    <span class="text-dark fw-semibold"><?php echo htmlspecialchars($accData['branch'] ?? 'SSSUTMS Campus, Sehore (M.P.)'); ?></span>
                  </div>
                </div>
              </div>

              <!-- Online Banking & UPI Section -->
              <div class="row g-4 align-items-center mb-5">
                <div class="col-md-6">
                  <h4 class="fw-bold text-dark mb-3" style="color: #7b3900 !important;">
                    <i class="fa-solid fa-globe text-primary me-2"></i>Online Payment Gateway
                  </h4>
                  <p class="text-muted small mb-3">
                    Students can securely pay fees online using Debit Cards, Credit Cards, Netbanking, UPI, or Digital Wallets through our payment portal.
                  </p>
                  <div class="p-3 rounded-3 bg-light border mb-3">
                    <span class="small text-muted d-block fw-bold">Official Payment URL:</span>
                    <a href="<?php echo htmlspecialchars($accData['online_banking_url'] ?? '#'); ?>" target="_blank" rel="noopener" class="fw-bold text-primary fs-6 text-break">
                      <?php echo htmlspecialchars($accData['online_banking_url'] ?? 'https://sssutms.payjix.com/'); ?>
                      <i class="fa-solid fa-arrow-up-right-from-square ms-1"></i>
                    </a>
                  </div>
                  <a href="<?php echo htmlspecialchars($accData['online_banking_url'] ?? '#'); ?>" target="_blank" rel="noopener" class="btn btn-primary px-4 py-2 fw-bold rounded-pill">
                    <i class="fa-solid fa-credit-card me-1"></i> Proceed to Pay Online
                  </a>
                </div>

                <div class="col-md-6">
                  <div class="qr-card">
                    <h6 class="fw-bold text-dark mb-2 text-uppercase">
                      <i class="fa-solid fa-qrcode text-warning me-1"></i> SCAN &amp; PAY USING ANY BHIM UPI
                    </h6>
                    <p class="text-muted extra-small mb-3">GPay, PhonePe, Paytm, BHIM or any Banking UPI App</p>
                    <?php if (!empty($accData['qr_image'])): ?>
                      <img src="<?php echo htmlspecialchars($accData['qr_image']); ?>" 
                           alt="BHIM UPI QR Code" 
                           class="img-fluid rounded border shadow-sm"
                           style="max-height: 280px;"
                           onerror="this.src='https://www.sssutms.co.in/cms/Areas/Website/Files/Link/WhatsApp_Image_2026-01-21_at_11.39.09_AM_21012026_1201.jpeg'">
                    <?php endif; ?>
                  </div>
                </div>
              </div>

              <!-- Payment Gateway Charges Table -->
              <h5 class="fw-bold text-dark mb-3">
                <i class="fa-solid fa-receipt text-primary me-2"></i>Online Payment Transaction Charges
              </h5>
              <div class="table-responsive border rounded-3 shadow-sm mb-4">
                <table class="table table-striped table-hover align-middle mb-0 charges-table">
                  <thead>
                    <tr>
                      <th style="width: 50%;">Payment Instrument</th>
                      <th style="width: 50%;">Convenience / Processing Charges</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $charges = $accData['charges'] ?? [];
                    if (!empty($charges)):
                      foreach ($charges as $ch):
                    ?>
                      <tr>
                        <td class="fw-bold text-dark"><?php echo htmlspecialchars($ch['instrument']); ?></td>
                        <td>
                          <?php if (strpos($ch['charges'], 'No Charges') !== false): ?>
                            <span class="badge bg-success-subtle text-success fw-bold px-2 py-1">No Charges</span>
                          <?php else: ?>
                            <span class="text-dark fw-semibold"><?php echo htmlspecialchars($ch['charges']); ?></span>
                          <?php endif; ?>
                        </td>
                      </tr>
                    <?php 
                      endforeach;
                    endif; 
                    ?>
                  </tbody>
                </table>
              </div>

            </article>
          </div>
        </div>
      </div>

      <!-- Right Column: Reusable Admission Sidebar -->
      <?php require_once __DIR__ . '/includes/admission_sidebar.php'; ?>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>