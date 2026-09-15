<?php
require_once __DIR__ . '/config.php';
$db = get_db();

$desc = $db->query("SELECT description FROM admission_pages WHERE page_key = 'AdmissionProcedure'")->fetchColumn();
echo "Current DB description:\n" . $desc . "\n";

// Clean any &amp;amp; or &amp; to clean plain text
$cleanDesc = html_entity_decode($desc, ENT_QUOTES, 'UTF-8');
$cleanDesc = html_entity_decode($cleanDesc, ENT_QUOTES, 'UTF-8');
echo "\nCleaned description:\n" . $cleanDesc . "\n";

$stmt = $db->prepare("UPDATE admission_pages SET description = :d WHERE page_key = 'AdmissionProcedure'");
$stmt->execute([':d' => $cleanDesc]);
echo "Updated DB with clean description.\n";
