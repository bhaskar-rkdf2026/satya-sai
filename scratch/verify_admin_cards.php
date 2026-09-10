<?php
// Test admin/about.php rendering with session
session_start();
$_SESSION['admin_logged_in'] = true;
$_SESSION['admin_user'] = 'admin';

ob_start();
require_once 'd:/xampp/htdocs/satya-sai/admin/about.php';
$output = ob_get_clean();

$has_d_flex = strpos($output, 'd-flex page-card-col') !== false;
$has_stat_primary = strpos($output, 'stat-primary') !== false;
$has_equal_cards = strpos($output, 'page-card-title') !== false;
$has_card_footer = strpos($output, 'page-card-footer') !== false;

echo "d-flex on card columns: " . ($has_d_flex ? "PASS" : "FAIL") . "\n";
echo "stat-primary on stat card: " . ($has_stat_primary ? "PASS" : "FAIL") . "\n";
echo "page-card-title present: " . ($has_equal_cards ? "PASS" : "FAIL") . "\n";
echo "page-card-footer present: " . ($has_card_footer ? "PASS" : "FAIL") . "\n";
echo "Rendered length: " . strlen($output) . " bytes\n";
