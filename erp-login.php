<?php
$page_title = 'ERP Portal Login - SSSUTMS';
$page_desc = 'Login to SSSUTMS Unified Student and Faculty ERP Portal for attendance, fees, hall tickets, and examination registration.';

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/topbar.php';
require_once __DIR__ . '/includes/navbar.php';
?>

<div class="py-5 bg-light min-vh-100 d-flex align-items-center">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10 col-xl-9">
        
        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
          <div class="row g-0">
            
            <!-- Left 5 Cols: Branding & Instructions -->
            <div class="col-md-5 text-white p-4 p-lg-5 d-flex flex-column justify-content-between" style="background: var(--primary-gradient);">
              <div>
                <div class="d-flex align-items-center gap-2 mb-4">
                  <img src="assets/images/logo/logo.jpg" alt="Logo" width="44" height="44" class="rounded-circle border border-white">
                  <div>
                    <h5 class="text-white fw-bold mb-0">SSSUTMS ERP</h5>
                    <small class="text-white-50">Unified Campus Automation</small>
                  </div>
                </div>

                <h4 class="fw-bold mb-3">Secure Digital Campus Gateway</h4>
                <p class="small text-white-50 mb-4">
                  Single sign-on access to Student Profile, Semester Registrations, Fee Invoices, Examination Hall Tickets, and Grade Sheets.
                </p>

                <div class="p-3 rounded-3" style="background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.12);">
                  <h6 class="fw-bold text-warning small mb-2"><i class="fa fa-circle-info me-1"></i> Important Instructions</h6>
                  <ul class="list-unstyled small text-white-50 mb-0">
                    <li class="mb-1"><i class="fa fa-lock me-1"></i> Passwords are encrypted & protected.</li>
                    <li class="mb-1"><i class="fa fa-id-card me-1"></i> Use your Enrollment No. as User ID.</li>
                    <li><i class="fa fa-envelope me-1"></i> Reset password via registered Email ID.</li>
                  </ul>
                </div>
              </div>

              <div class="mt-4 pt-3 border-top border-white border-opacity-10 small text-white-50">
                <span>Helpline: +91-7748900028 | Mon-Sat (10AM - 5PM)</span>
              </div>
            </div>

            <!-- Right 7 Cols: Login Form -->
            <div class="col-md-7 p-4 p-lg-5 bg-white">
              <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold text-primary mb-0">Portal Sign In</h4>
                <span class="badge bg-success-subtle text-success fw-bold"><i class="fa fa-shield-check me-1"></i> SSL 256-Bit</span>
              </div>

              <form id="erpLoginForm" onsubmit="event.preventDefault(); alert('Login successful! Redirecting to student dashboard...'); window.location.href='index.php';">
                
                <!-- Role Toggle Tabs -->
                <div class="btn-group w-100 mb-3" role="group">
                  <input type="radio" class="btn-check" name="user_role" id="role_student" checked>
                  <label class="btn btn-outline-primary btn-sm fw-bold" for="role_student"><i class="fa fa-user-graduate me-1"></i> Student</label>

                  <input type="radio" class="btn-check" name="user_role" id="role_faculty">
                  <label class="btn btn-outline-primary btn-sm fw-bold" for="role_faculty"><i class="fa fa-chalkboard-user me-1"></i> Faculty</label>

                  <input type="radio" class="btn-check" name="user_role" id="role_admin">
                  <label class="btn btn-outline-primary btn-sm fw-bold" for="role_admin"><i class="fa fa-user-shield me-1"></i> Staff</label>
                </div>

                <!-- User ID -->
                <div class="mb-3">
                  <label class="form-label small fw-bold text-muted">User ID / Enrollment Number *</label>
                  <div class="input-group">
                    <span class="input-group-text bg-light border-end-0"><i class="fa fa-user text-primary"></i></span>
                    <input type="text" class="form-control border-start-0" placeholder="e.g. SSS2023-1045" required>
                  </div>
                </div>

                <!-- Password -->
                <div class="mb-3">
                  <div class="d-flex justify-content-between">
                    <label class="form-label small fw-bold text-muted">Password *</label>
                    <a href="#" class="small text-primary text-decoration-none" onclick="alert('Please contact your department coordinator or use the registered email recovery.')">Forgot Password?</a>
                  </div>
                  <div class="input-group">
                    <span class="input-group-text bg-light border-end-0"><i class="fa fa-key text-primary"></i></span>
                    <input type="password" id="erpPassword" class="form-control border-start-0 border-end-0" placeholder="••••••••" required>
                    <span class="input-group-text bg-light border-start-0 cursor-pointer" onclick="toggleErpPassword()" style="cursor: pointer;"><i class="fa fa-eye text-muted" id="erpEyeIcon"></i></span>
                  </div>
                </div>

                <!-- Captcha Mock -->
                <div class="mb-4">
                  <div class="p-2 rounded bg-light border d-flex align-items-center justify-content-between mb-2">
                    <div class="font-monospace fw-bold text-primary fs-5 px-2" style="letter-spacing: 4px; text-decoration: line-through;">9X7M2P</div>
                    <button type="button" class="btn btn-sm btn-link text-primary p-0" onclick="alert('Captcha refreshed!')"><i class="fa fa-rotate-right me-1"></i> Refresh</button>
                  </div>
                  <input type="text" class="form-control form-control-sm" placeholder="Enter characters shown above" required>
                </div>

                <button type="submit" class="btn btn-primary w-100 fw-bold py-2 rounded-pill shadow-sm" style="background: var(--primary); border:none;">
                  <i class="fa fa-right-to-bracket me-1"></i> Secure Login
                </button>

                <div class="text-center mt-4">
                  <span class="small text-muted">New Student? </span>
                  <a href="student-registration.php" class="small fw-bold text-primary text-decoration-none">Register for E-Pravesh (2026-27)</a>
                </div>

              </form>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<script>
function toggleErpPassword() {
  const pwd = document.getElementById('erpPassword');
  const icon = document.getElementById('erpEyeIcon');
  if (pwd.type === 'password') {
    pwd.type = 'text';
    icon.classList.remove('fa-eye');
    icon.classList.add('fa-eye-slash');
  } else {
    pwd.type = 'password';
    icon.classList.remove('fa-eye-slash');
    icon.classList.add('fa-eye');
  }
}
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
