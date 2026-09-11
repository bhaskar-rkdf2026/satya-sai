<?php
$pageDocsFile = __DIR__ . '/../data/page_documents.json';
$allData = json_decode(file_get_contents($pageDocsFile), true) ?: [];

$extracted = json_decode(file_get_contents(__DIR__ . '/extracted_research_data.json'), true);

// 1. Research Policies
$allData['ResearchPolicies'] = [
    'title' => 'Research Promotion Policies & Guidelines',
    'section' => 'Research',
    'source_file' => 'Research/ResearchPromotionPolicy.php',
    'documents' => [
        [
            'id' => 'rpol_01',
            'title' => 'Policies and Regulations for Conducting Research and Consultancy (Policy 3.1.1)',
            'category' => 'Research Promotion Policy',
            'file' => 'assets/uploads/documents/RESEARCH_POLICIES_3.1.1_(1)_24062024_1034.pdf',
            'date' => '2024-06-24',
            'status' => 'Active',
            'desc' => 'Official statutory policy covering seed money grants, research ethics, incentive scheme, patent filing support, and consultancy revenue sharing.'
        ]
    ]
];

// 2. Council For Research
$allData['CouncilForResearch'] = [
    'title' => 'Council for Research Members & Advisory Board',
    'section' => 'Research',
    'source_file' => 'Research/CouncilForResearch.php',
    'documents' => []
];

foreach ($extracted['committee'] as $c) {
    $allData['CouncilForResearch']['documents'][] = [
        'id' => 'cfr_c_' . $c['sno'],
        'title' => $c['name'],
        'category' => 'Executive Committee',
        'role' => $c['role'],
        'file' => '#',
        'date' => '2024-01-01',
        'status' => 'Active',
        'desc' => 'Member of Council for Research Executive Committee'
    ];
}

foreach ($extracted['advisory'] as $a) {
    $allData['CouncilForResearch']['documents'][] = [
        'id' => 'cfr_a_' . $a['sno'],
        'title' => $a['name'],
        'category' => 'Advisory Board',
        'role' => 'Subject Expert / Advisory Member',
        'file' => '#',
        'date' => '2024-01-01',
        'status' => 'Active',
        'desc' => 'Subject Expert & Advisory Board Member for Interdisciplinary Research'
    ];
}

// 3. Research Patents
$allData['ResearchPatents'] = [
    'title' => 'Intellectual Property Rights & Patents',
    'section' => 'Research',
    'source_file' => 'Research/Patents.php',
    'documents' => []
];

foreach ($extracted['patents'] as $p) {
    $allData['ResearchPatents']['documents'][] = [
        'id' => $p['id'],
        'title' => $p['title'],
        'category' => $p['category'],
        'inventors' => $p['inventors'],
        'app_no' => $p['app_no'],
        'status' => $p['status'],
        'file' => '#',
        'date' => '2024-01-01',
        'desc' => 'Inventors: ' . $p['inventors'] . ' | App/Patent No: ' . $p['app_no'] . ' | Status: ' . $p['status']
    ];
}

// 4. Research E-Resources
$allData['ResearchEResources'] = [
    'title' => 'Digital Libraries & Research E-Resources',
    'section' => 'Research',
    'source_file' => 'Research/E-Resources.php',
    'documents' => []
];

foreach ($extracted['eresources'] as $idx => $er) {
    $allData['ResearchEResources']['documents'][] = [
        'id' => 'eres_' . ($idx + 1),
        'title' => $er['title'],
        'category' => $er['category'],
        'file' => $er['url'],
        'date' => '2024-01-01',
        'status' => 'Active',
        'desc' => $er['desc']
    ];
}

file_put_contents($pageDocsFile, json_encode($allData, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
echo "MERGED ALL RESEARCH DATA INTO page_documents.json SUCCESSFULLY.\n";
