<?php
require_once __DIR__ . '/../config.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    // Standard Admin Authentication Credentials
    if ($username === 'admin' && $password === 'admin123') {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_user'] = 'Super Administrator';
        $_SESSION['admin_email'] = 'admin@sssutms.co.in';
        header('Location: index.php');
        exit;
    } else {
        $error = 'Invalid admin username or password. Please try again.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Portal Login - SSSUTMS</title>
  <link rel="icon" type="image/jpeg" href="../assets/images/logo/logo.jpg">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body class="d-flex align-items-center justify-content-center min-vh-100" style="background: var(--admin-sidebar);">

<div class="container" style="max-width: 440px;">
  <div class="card border-0 shadow-lg rounded-4 p-4 p-md-5 bg-white">
    
    <div class="text-center mb-4">
      <img src="../assets/images/logo/logo.jpg" alt="SSSUTMS Logo" width="60" height="60" class="rounded-circle border mb-2">
      <h4 class="fw-bold text-dark mb-0">University Admin Panel</h4>
      <small class="text-muted">Sri Satya Sai University (SSSUTMS)</small>
    </div>

    <?php if (!empty($error)): ?>
      <div class="alert alert-danger py-2 small mb-3 border-0 rounded-3">
        <i class="fa fa-triangle-exclamation me-1"></i> <?php echo htmlspecialchars($error); ?>
      </div>
    <?php endif; ?>

    <form method="POST" action="login.php">
      <div class="mb-3">
        <label class="form-label small fw-bold text-muted">Admin Username</label>
        <div class="input-group">
          <span class="input-group-text bg-light"><i class="fa fa-user-shield text-primary"></i></span>
          <input type="text" name="username" class="form-control" placeholder="Enter admin username" autocomplete="username" required>
        </div>
      </div>

      <div class="mb-3">
        <label class="form-label small fw-bold text-muted">Password</label>
        <div class="input-group">
          <span class="input-group-text bg-light"><i class="fa fa-lock text-primary"></i></span>
          <input type="password" name="password" class="form-control" placeholder="••••••••" autocomplete="current-password" required>
        </div>
      </div>

      <div class="d-flex justify-content-between align-items-center mb-3">
        <small class="text-muted"><i class="fa fa-lock me-1 text-success"></i> Authorized Personnel Only</small>
      </div>

      <button type="submit" class="btn btn-primary w-100 fw-bold py-2 rounded-pill shadow-sm" style="background: var(--admin-primary); border:none;">
        <i class="fa fa-right-to-bracket me-1"></i> Sign In to Dashboard
      </button>

      <div class="text-center mt-3">
        <a href="../index.php" class="small text-muted text-decoration-none"><i class="fa fa-arrow-left me-1"></i> Back to Public Website</a>
      </div>
    </form>

  </div>
</div>

</body>
</html>
