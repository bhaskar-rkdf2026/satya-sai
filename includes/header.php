<?php
if (!defined('SITE_NAME')) {
    require_once __DIR__ . '/../config.php';
}

$page_title = isset($page_title) ? $page_title . ' | ' . SITE_NAME : SITE_NAME . ' - Official University Portal';
$page_desc = isset($page_desc) ? $page_desc : 'Sri Satya Sai University of Technology & Medical Sciences (SSSUTMS), Sehore (M.P.). Leading institution for Engineering, Medical, Ayurveda, Pharmacy, Management, and Science.';
$current_page = basename($_SERVER['PHP_SELF'], '.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <title><?php echo htmlspecialchars($page_title); ?></title>
  <meta name="description" content="<?php echo htmlspecialchars($page_desc); ?>">
  <meta name="keywords" content="SSSUTMS, Sri Satya Sai University, Engineering Colleges in MP, Medical Colleges Sehore, Pharmacy, Ayurveda BAMS, BHMS, Admission 2026-27">
  <meta name="author" content="Sri Satya Sai University of Technology & Medical Sciences">
  <meta name="theme-color" content="#0b2545">

  <!-- Favicon -->
  <link rel="icon" type="image/jpeg" href="<?php echo BASE_URL; ?>assets/images/logo/logo.jpg">
  <link rel="apple-touch-icon" href="<?php echo BASE_URL; ?>assets/images/logo/logo.jpg">

  <!-- Preconnect to Google Fonts for Ultra Fast Loading -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

  <!-- Font Awesome 6 & Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!-- Bootstrap 5.3 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom Modern Portal CSS -->
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css">
</head>
<body>
