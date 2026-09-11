<?php
if (!defined('SITE_NAME')) {
    require_once __DIR__ . '/../config.php';
}

// 1. Resolve dynamic data object if present ($faculty_page, $about_page, $page_data, $page, $home_seo)
$active_meta = [];
if (isset($faculty_page) && is_array($faculty_page)) {
    $active_meta = $faculty_page;
} elseif (isset($about_page) && is_array($about_page)) {
    $active_meta = $about_page;
} elseif (isset($page_data) && is_array($page_data)) {
    $active_meta = $page_data;
} elseif (isset($page) && is_array($page)) {
    $active_meta = $page;
} elseif (isset($home_seo) && is_array($home_seo)) {
    $active_meta = $home_seo;
}

// 2. Resolve Meta Title
if (!empty($meta_title)) {
    $final_title = $meta_title;
} elseif (!empty($active_meta['meta_title'])) {
    $final_title = $active_meta['meta_title'];
} elseif (!empty($page_title)) {
    $final_title = $page_title;
} elseif (!empty($active_meta['title'])) {
    $final_title = $active_meta['title'];
} else {
    $final_title = SITE_NAME . ' - Official University Portal';
}

// Ensure clean brand suffix on title
$has_brand = (strpos($final_title, SITE_NAME) !== false) ||
             (strpos($final_title, SITE_SHORT_NAME) !== false) ||
             (stripos($final_title, 'SSSUTMS') !== false) ||
             (stripos($final_title, 'Satya Sai') !== false);

if (!$has_brand) {
    $final_title = $final_title . ' | ' . SITE_NAME;
}

// 3. Resolve Meta Description
if (!empty($meta_description)) {
    $final_desc = $meta_description;
} elseif (!empty($active_meta['meta_description'])) {
    $final_desc = $active_meta['meta_description'];
} elseif (!empty($page_desc)) {
    $final_desc = $page_desc;
} else {
    $final_desc = 'Sri Satya Sai University of Technology & Medical Sciences (SSSUTMS), Sehore (M.P.). Leading institution for Engineering, Medical, Ayurveda, Pharmacy, Management, and Science.';
}

// 4. Resolve Meta Keywords
if (!empty($meta_keywords)) {
    $final_keywords = $meta_keywords;
} elseif (!empty($active_meta['meta_keywords'])) {
    $final_keywords = $active_meta['meta_keywords'];
} elseif (!empty($page_keywords)) {
    $final_keywords = $page_keywords;
} else {
    $final_keywords = 'SSSUTMS, Sri Satya Sai University, Engineering Colleges in MP, Medical Colleges Sehore, Pharmacy, Ayurveda BAMS, BHMS, Admission 2026-27';
}

// 5. Canonical URL
$curr_protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? 'https://' : 'http://';
$curr_host = $_SERVER['HTTP_HOST'] ?? 'localhost';
$curr_uri = $_SERVER['REQUEST_URI'] ?? '';
$default_canonical = $curr_protocol . $curr_host . $curr_uri;

if (!empty($canonical_url)) {
    $final_canonical = $canonical_url;
} elseif (!empty($active_meta['canonical_url'])) {
    $final_canonical = $active_meta['canonical_url'];
} else {
    $final_canonical = $default_canonical;
}

// 6. Social Share / OG Image
$default_og_image = BASE_URL . 'assets/images/logo/logo.jpg';
if (!empty($og_image)) {
    $final_og_image = (strpos($og_image, 'http') === 0) ? $og_image : BASE_URL . ltrim($og_image, '/');
} elseif (!empty($active_meta['og_image'])) {
    $final_og_image = (strpos($active_meta['og_image'], 'http') === 0) ? $active_meta['og_image'] : BASE_URL . ltrim($active_meta['og_image'], '/');
} else {
    $final_og_image = $default_og_image;
}

// 7. Social Titles & Directives
$final_og_title = !empty($og_title) ? $og_title : (!empty($active_meta['og_title']) ? $active_meta['og_title'] : $final_title);
$final_og_desc = !empty($og_description) ? $og_description : (!empty($og_desc) ? $og_desc : (!empty($active_meta['og_description']) ? $active_meta['og_description'] : $final_desc));
$final_robots = !empty($meta_robots) ? $meta_robots : (!empty($active_meta['robots']) ? $active_meta['robots'] : 'index, follow');

$current_page = basename($_SERVER['PHP_SELF'], '.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <!-- Primary Meta Tags -->
  <title><?php echo htmlspecialchars($final_title); ?></title>
  <meta name="title" content="<?php echo htmlspecialchars($final_title); ?>">
  <meta name="description" content="<?php echo htmlspecialchars($final_desc); ?>">
  <meta name="keywords" content="<?php echo htmlspecialchars($final_keywords); ?>">
  <meta name="author" content="Sri Satya Sai University of Technology &amp; Medical Sciences">
  <meta name="robots" content="<?php echo htmlspecialchars($final_robots); ?>">
  <meta name="theme-color" content="#0b2545">

  <?php if (!empty($final_canonical)): ?>
  <link rel="canonical" href="<?php echo htmlspecialchars($final_canonical); ?>">
  <?php endif; ?>

  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?php echo htmlspecialchars($final_canonical); ?>">
  <meta property="og:title" content="<?php echo htmlspecialchars($final_og_title); ?>">
  <meta property="og:description" content="<?php echo htmlspecialchars($final_og_desc); ?>">
  <meta property="og:image" content="<?php echo htmlspecialchars($final_og_image); ?>">
  <meta property="og:site_name" content="<?php echo htmlspecialchars(SITE_NAME); ?>">

  <!-- Twitter -->
  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:url" content="<?php echo htmlspecialchars($final_canonical); ?>">
  <meta property="twitter:title" content="<?php echo htmlspecialchars($final_og_title); ?>">
  <meta property="twitter:description" content="<?php echo htmlspecialchars($final_og_desc); ?>">
  <meta property="twitter:image" content="<?php echo htmlspecialchars($final_og_image); ?>">

  <!-- Favicon -->
  <link rel="icon" type="image/jpeg" href="<?php echo BASE_URL; ?>assets/images/logo/logo.jpg">
  <link rel="apple-touch-icon" href="<?php echo BASE_URL; ?>assets/images/logo/logo.jpg">

  <!-- Preconnect to Google Fonts for Ultra Fast Loading -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Montserrat:wght@600;700;800;900&display=swap" rel="stylesheet">

  <!-- Font Awesome 6 & Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!-- Bootstrap 5.3 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom Modern Portal CSS -->
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css?v=<?php echo filemtime(__DIR__ . '/../assets/css/style.css'); ?>">
</head>
<body<?php echo !empty($body_class) ? ' class="' . htmlspecialchars($body_class, ENT_QUOTES, 'UTF-8') . '"' : ''; ?>>
