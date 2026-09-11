<?php
// Extract exact live data for Council for Research, Patents, and E-Resources

// 1. Council for Research
$cfrHtml = file_get_contents(__DIR__ . '/live_research/CouncilForResearch.html');
preg_match_all('/<table[^>]*>(.*?)<\/table>/si', $cfrHtml, $cfrTables);

$committeeMembers = [];
if (!empty($cfrTables[0][0])) {
    preg_match_all('/<tr[^>]*>(.*?)<\/tr>/si', $cfrTables[0][0], $rows);
    foreach ($rows[0] as $idx => $r) {
        if ($idx === 0) continue; // skip header
        preg_match_all('/<td[^>]*>(.*?)<\/td>/si', $r, $tds);
        if (count($tds[1]) >= 2) {
            $sno = trim(strip_tags($tds[1][0]));
            $name = trim(strip_tags($tds[1][1]));
            if (!empty($name)) {
                $role = 'Member';
                if (stripos($name, 'Chairman') !== false) $role = 'Chairman';
                elseif (stripos($name, 'Convenor') !== false) $role = 'Convenor';
                
                $committeeMembers[] = [
                    'sno' => $sno,
                    'name' => $name,
                    'role' => $role,
                    'category' => 'Executive Committee'
                ];
            }
        }
    }
}

$advisoryMembers = [];
if (!empty($cfrTables[0][1])) {
    preg_match_all('/<tr[^>]*>(.*?)<\/tr>/si', $cfrTables[0][1], $rows);
    foreach ($rows[0] as $idx => $r) {
        if ($idx === 0) continue; // skip header
        preg_match_all('/<td[^>]*>(.*?)<\/td>/si', $r, $tds);
        if (count($tds[1]) >= 2) {
            $sno = trim(strip_tags($tds[1][0]));
            $name = trim(strip_tags($tds[1][1]));
            if (!empty($name)) {
                $advisoryMembers[] = [
                    'sno' => $sno,
                    'name' => $name,
                    'role' => 'Subject Expert / Advisory Board',
                    'category' => 'Advisory Board'
                ];
            }
        }
    }
}

// 2. Patents
$patHtml = file_get_contents(__DIR__ . '/live_research/Patents.html');
preg_match_all('/<table[^>]*>(.*?)<\/table>/si', $patHtml, $patTables);

$allPatents = [];
$catTitles = [
    0 => 'Published (2023-2024)',
    1 => 'Granted Patents',
    2 => 'Published (2022-2023)',
    3 => 'Other Registered Patents'
];

foreach ($patTables[0] as $tableIdx => $tbl) {
    $category = $catTitles[$tableIdx] ?? 'Patents';
    preg_match_all('/<tr[^>]*>(.*?)<\/tr>/si', $tbl, $rows);
    foreach ($rows[0] as $rIdx => $r) {
        if ($rIdx === 0) continue; // header
        preg_match_all('/<td[^>]*>(.*?)<\/td>/si', $r, $tds);
        if (count($tds[1]) >= 4) {
            $sno = trim(strip_tags($tds[1][0]));
            $inventors = trim(strip_tags($tds[1][1]));
            $title = trim(strip_tags($tds[1][2]));
            $appNo = trim(strip_tags($tds[1][3]));
            $status = isset($tds[1][4]) ? trim(strip_tags($tds[1][4])) : 'Published';

            if (!empty($title)) {
                $allPatents[] = [
                    'id' => 'pat_' . (count($allPatents) + 1),
                    'sno' => $sno,
                    'inventors' => $inventors,
                    'title' => $title,
                    'app_no' => $appNo,
                    'status' => $status,
                    'category' => $category
                ];
            }
        }
    }
}

// 3. E-Resources Links
$eResLinks = [
    ['title' => 'Project Gutenberg', 'url' => 'http://www.gutenberg.org/', 'category' => 'Free Domain Books', 'desc' => 'Over 70,000 free eBooks in public domain.'],
    ['title' => 'ManyBooks', 'url' => 'http://www.manybooks.net/', 'category' => 'Free Domain Books', 'desc' => 'Extensive digital library of downloadable classics.'],
    ['title' => 'Planet eBook', 'url' => 'http://www.planetebook.com/', 'category' => 'Free Domain Books', 'desc' => 'Free classic literature ebooks.'],
    ['title' => 'Feedbooks Public Domain', 'url' => 'http://www.feedbooks.com/publicdomin', 'category' => 'Free Domain Books', 'desc' => 'Free high quality public domain books.'],
    ['title' => 'Open Culture Free Audio & eBooks', 'url' => 'http://www.openculture.com/free_ebooks', 'category' => 'Free Domain Books', 'desc' => 'Free educational and cultural media.'],
    ['title' => 'Authorama Public Domain Books', 'url' => 'http://www.authorama.com/', 'category' => 'Free Domain Books', 'desc' => 'Completely free books from a variety of authors.'],
    ['title' => 'INDEST-AICTE Consortium', 'url' => 'http://www.indest.iitd.ac.in/', 'category' => 'Academic E-Content', 'desc' => 'Indian National Digital Library in Engineering Sciences and Technology.'],
    ['title' => 'NPTEL Online Portal', 'url' => 'http://nptel.iitm.ac.in/', 'category' => 'Academic E-Content', 'desc' => 'National Programme on Technology Enhanced Learning courses.'],
    ['title' => 'INFLIBNET Centre', 'url' => 'http://www.inflibnet.ac.in/', 'category' => 'Academic E-Content', 'desc' => 'Information and Library Network Centre - UGC autonomous inter-university centre.'],
    ['title' => 'Vidyanidhi Digital Library', 'url' => 'http://www.vidyanidhi.org.in/', 'category' => 'Academic E-Content', 'desc' => 'Indian digital library of doctoral dissertations.'],
    ['title' => 'Digital Library of India (ERNET)', 'url' => 'http://www.digitallibrary.ernet.in', 'category' => 'Academic E-Content', 'desc' => 'Digitized collection of Indian heritage and knowledge.'],
    ['title' => 'NISCAIR Online Periodicals Repository', 'url' => 'http://www.niscair.res.in', 'category' => 'Academic E-Content', 'desc' => 'National Institute of Science Communication and Information Resources.'],
    ['title' => 'Google Scholar', 'url' => 'https://scholar.google.co.in/', 'category' => 'Academic E-Content', 'desc' => 'Search across many disciplines and sources: articles, theses, books.'],
    ['title' => 'INDEST Membership Brochure (PDF)', 'url' => 'assets/uploads/documents/brochureforcoremembers.pdf', 'category' => 'PDF Brochures', 'desc' => 'Brochure for core members of INDEST-AICTE Consortium.']
];

$output = [
    'committee_count' => count($committeeMembers),
    'advisory_count' => count($advisoryMembers),
    'patents_count' => count($allPatents),
    'eresources_count' => count($eResLinks),
    'committee' => $committeeMembers,
    'advisory' => $advisoryMembers,
    'patents' => $allPatents,
    'eresources' => $eResLinks
];

file_put_contents(__DIR__ . '/extracted_research_data.json', json_encode($output, JSON_PRETTY_PRINT));
echo "Successfully extracted research data:\n";
echo "- Committee Members: " . count($committeeMembers) . "\n";
echo "- Advisory Members: " . count($advisoryMembers) . "\n";
echo "- Total Patents: " . count($allPatents) . "\n";
echo "- E-Resources: " . count($eResLinks) . "\n";
