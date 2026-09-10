<?php
require_once __DIR__ . '/../config.php';

echo "=== TESTING DOCUMENT REPOSITORY CRUD ===\n";

// 1. Initial count
$beforeDocs = get_page_documents('Forms');
echo "Initial Forms count: " . count($beforeDocs) . "\n";

// 2. Add Test Document
$testDoc = [
    'title' => 'Test Migration Form 2026',
    'category' => 'Admission',
    'file' => 'assets/uploads/documents/test_migration_form.pdf',
    'date' => date('Y-m-d'),
    'status' => 'New'
];
save_page_document('Forms', $testDoc, 'Download', 'University Downloadable Forms');

$afterAddDocs = get_page_documents('Forms');
echo "Forms count after addition: " . count($afterAddDocs) . "\n";

// Verify added item
$addedItem = $afterAddDocs[0];
echo "Added item title: " . $addedItem['title'] . " (ID: " . $addedItem['id'] . ")\n";

// 3. Edit Test Document
$addedItem['title'] = 'Updated Migration Form 2026';
save_page_document('Forms', $addedItem, 'Download', 'University Downloadable Forms');
$afterEditDocs = get_page_documents('Forms');
echo "Forms first item after edit: " . $afterEditDocs[0]['title'] . "\n";

// 4. Delete Test Document
delete_page_document('Forms', $addedItem['id']);
$afterDeleteDocs = get_page_documents('Forms');
echo "Forms count after deletion: " . count($afterDeleteDocs) . "\n";

if (count($beforeDocs) === count($afterDeleteDocs)) {
    echo "SUCCESS: CRUD operations test PASSED flawlessly!\n";
} else {
    echo "FAIL: Count mismatch after delete.\n";
}
