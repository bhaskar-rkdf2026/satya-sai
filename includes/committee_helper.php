<?php
/**
 * Sri Satya Sai University of Technology & Medical Sciences
 * Statutory Committees & Cells Dynamic Helper & SEO Manager
 * Manages all 9 Statutory Committee pages with live admin editing, documents, and SEO capabilities.
 */

if (!defined('BASE_URL')) {
    require_once __DIR__ . '/../config.php';
}

/**
 * Returns the master catalog for all 9 Statutory Committees & Cells
 */
function get_committee_page_catalog() {
    return [
        'AntiRagging' => [
            'key' => 'AntiRagging',
            'doc_key' => 'Committee_AntiRagging',
            'title' => 'Anti Ragging Committee',
            'banner_title' => 'Anti Ragging',
            'banner_category' => 'Academic',
            'file' => 'Academic/Committee/AntiRagging.php',
            'icon' => 'fa-shield-halved',
            'meta_title' => 'Anti Ragging Committee & Squad Guidelines | SSSUTMS',
            'meta_description' => 'Official Anti-Ragging Committee, squad monitoring, UGC compliance, zero-tolerance policy, and student safety helpline numbers at SSSUTMS, Sehore.',
            'meta_keywords' => 'Anti Ragging SSSUTMS, Anti Ragging Committee Sehore, UGC Anti Ragging Regulations, Student Safety Helpline Bhopal',
            'canonical_url' => '',
            'og_image' => 'assets/images/logo/logo.jpg'
        ],
        'ProctorialBoard' => [
            'key' => 'ProctorialBoard',
            'doc_key' => 'Committee_ProctorialBoard',
            'title' => 'Proctorial Board',
            'banner_title' => 'Proctorial Board',
            'banner_category' => 'Academic',
            'file' => 'Academic/Committee/ProctorialBoard.php',
            'icon' => 'fa-user-shield',
            'meta_title' => 'Proctorial Board & Campus Discipline Committee | SSSUTMS',
            'meta_description' => 'View the official Proctorial Board members, campus discipline rules, security protocols, and student code of conduct at Sri Satya Sai University.',
            'meta_keywords' => 'Proctorial Board SSSUTMS, Campus Discipline Committee, Student Code of Conduct Sehore, Chief Proctor SSSUTMS',
            'canonical_url' => '',
            'og_image' => 'assets/images/logo/logo.jpg'
        ],
        'InternalComplaintCommittee' => [
            'key' => 'InternalComplaintCommittee',
            'doc_key' => 'Committee_InternalComplaintCommittee',
            'title' => 'Internal Complaint Committee (ICC)',
            'banner_title' => 'Internal Complaint Committee',
            'banner_category' => 'Academic',
            'file' => 'Academic/Committee/InternalComplaintCommittee.php',
            'icon' => 'fa-scale-balanced',
            'meta_title' => 'Internal Complaint Committee (ICC) & POSH Cell | SSSUTMS',
            'meta_description' => 'Internal Complaint Committee (ICC) at SSSUTMS: Prevention of Sexual Harassment (POSH), women safety guidelines, grievance redressal, and cell members.',
            'meta_keywords' => 'ICC SSSUTMS, Internal Complaint Committee, POSH Cell Sehore, Women Grievance SSSUTMS Bhopal',
            'canonical_url' => '',
            'og_image' => 'assets/images/logo/logo.jpg'
        ],
        'GrievanceRedressal' => [
            'key' => 'GrievanceRedressal',
            'doc_key' => 'Committee_GrievanceRedressal',
            'title' => 'Grievance Redressal Committee',
            'banner_title' => 'Grievance Redressal',
            'banner_category' => 'Academic',
            'file' => 'Academic/Committee/GrievanceRedressal.php',
            'icon' => 'fa-comments',
            'meta_title' => 'Grievance Redressal Committee & Student Portal | SSSUTMS',
            'meta_description' => 'Online student and faculty grievance redressal mechanism, committee composition, resolution procedures, and ombudsman details at SSSUTMS.',
            'meta_keywords' => 'Grievance Redressal SSSUTMS, Student Grievance Portal, Ombudsman SSSUTMS Sehore, Faculty Redressal Cell',
            'canonical_url' => '',
            'og_image' => 'assets/images/logo/logo.jpg'
        ],
        'ForSCST' => [
            'key' => 'ForSCST',
            'doc_key' => 'Committee_ForSCST',
            'title' => 'Committee for SC/ST',
            'banner_title' => 'Committee for SC/ST',
            'banner_category' => 'Academic',
            'file' => 'Academic/Committee/ForSCST.php',
            'icon' => 'fa-hands-holding-child',
            'meta_title' => 'Committee for SC/ST Welfare & Cell | SSSUTMS',
            'meta_description' => 'Special cell and committee for the welfare of SC/ST students and staff, scholarship guidance, equal rights enforcement, and grievance monitoring at SSSUTMS.',
            'meta_keywords' => 'SC ST Committee SSSUTMS, SC ST Welfare Cell Sehore, Equal Opportunity SSSUTMS, Scholarship Guidance Cell',
            'canonical_url' => '',
            'og_image' => 'assets/images/logo/logo.jpg'
        ],
        'EDC' => [
            'key' => 'EDC',
            'doc_key' => 'Committee_EDC',
            'title' => 'Entrepreneurship Development Cell (EDC)',
            'banner_title' => 'EDC',
            'banner_category' => 'Academic',
            'file' => 'Academic/Committee/EDC.php',
            'icon' => 'fa-lightbulb',
            'meta_title' => 'Entrepreneurship Development Cell (EDC) | SSSUTMS',
            'meta_description' => 'Fostering innovation, enterprise mentoring, student startups, business incubation, and skill development workshops via EDC at SSSUTMS, Sehore.',
            'meta_keywords' => 'EDC SSSUTMS, Entrepreneurship Development Cell Sehore, Startup Cell Bhopal, Business Incubation SSSUTMS',
            'canonical_url' => '',
            'og_image' => 'assets/images/logo/logo.jpg'
        ],
        'InternationalHigherEducationCell' => [
            'key' => 'InternationalHigherEducationCell',
            'doc_key' => 'Committee_InternationalHigherEducationCell',
            'title' => 'International Higher Education Cell',
            'banner_title' => 'International Higher Education Cell',
            'banner_category' => 'Academic',
            'file' => 'Academic/Committee/InternationalHigherEducationCell.php',
            'icon' => 'fa-globe',
            'meta_title' => 'International Higher Education Cell & Global Partnerships | SSSUTMS',
            'meta_description' => 'Promoting international student admissions, global exchange programs, foreign university collaborations, and study abroad pathways at SSSUTMS.',
            'meta_keywords' => 'International Cell SSSUTMS, Foreign Student Admissions Sehore, Global University Partnerships, Study Abroad SSSUTMS',
            'canonical_url' => '',
            'og_image' => 'assets/images/logo/logo.jpg'
        ],
        'IncubationCell' => [
            'key' => 'IncubationCell',
            'doc_key' => 'Committee_IncubationCell',
            'title' => 'Incubation Cell',
            'banner_title' => 'Incubation Cell',
            'banner_category' => 'Academic',
            'file' => 'Academic/Committee/IncubationCell.php',
            'icon' => 'fa-rocket',
            'meta_title' => 'Innovation & Incubation Center (IIC Cell) | SSSUTMS',
            'meta_description' => 'State-of-the-art startup incubator, seed funding support, intellectual property facilitation, and technical prototype labs at SSSUTMS Sehore.',
            'meta_keywords' => 'Incubation Cell SSSUTMS, Startup Incubator Sehore, Seed Funding University Bhopal, Prototype Lab SSSUTMS',
            'canonical_url' => '',
            'og_image' => 'assets/images/logo/logo.jpg'
        ],
        'Equal_Opportunity_Cell' => [
            'key' => 'Equal_Opportunity_Cell',
            'doc_key' => 'Committee_Equal_Opportunity_Cell',
            'title' => 'Equal Opportunity Cell',
            'banner_title' => 'Equal Opportunity Cell',
            'banner_category' => 'Academic',
            'file' => 'Academic/Committee/Equal_Opportunity_Cell.php',
            'icon' => 'fa-universal-access',
            'meta_title' => 'Equal Opportunity Cell & Inclusivity Support | SSSUTMS',
            'meta_description' => 'Ensuring barrier-free education, equal opportunity, affirmative action, and specialized assistance for disadvantaged and differently-abled students at SSSUTMS.',
            'meta_keywords' => 'Equal Opportunity Cell SSSUTMS, Inclusion Cell Sehore, Barrier Free Campus, Differently Abled Support SSSUTMS',
            'canonical_url' => '',
            'og_image' => 'assets/images/logo/logo.jpg'
        ]
    ];
}

/**
 * Get Page Info and SEO Metadata for any Statutory Committee Page
 */
function get_committee_page_info($pageKey, $defaultOverrides = []) {
    $catalog = get_committee_page_catalog();
    $catInfo = $catalog[$pageKey] ?? [
        'key' => $pageKey,
        'doc_key' => 'Committee_' . $pageKey,
        'title' => ucwords(str_replace(['_', '-'], ' ', $pageKey)),
        'banner_title' => ucwords(str_replace(['_', '-'], ' ', $pageKey)),
        'banner_category' => 'Academic',
        'file' => "Academic/Committee/{$pageKey}.php",
        'icon' => 'fa-users',
        'meta_title' => ucwords(str_replace(['_', '-'], ' ', $pageKey)) . ' - Statutory Committee | SSSUTMS',
        'meta_description' => 'Learn about official statutory committee members, guidelines, safety policies, and grievance redressal at Sri Satya Sai University (SSSUTMS), Sehore.',
        'meta_keywords' => 'SSSUTMS, Statutory Committee, ' . ucwords(str_replace(['_', '-'], ' ', $pageKey)),
        'canonical_url' => '',
        'og_image' => 'assets/images/logo/logo.jpg'
    ];

    $allData = get_json_data('page_documents.json', []);
    $docKey = $catInfo['doc_key'] ?? ('Committee_' . $pageKey);

    $stored = [];
    // Check both standard key and prefixed doc_key
    if (isset($allData[$docKey]['page_info']) && is_array($allData[$docKey]['page_info'])) {
        $stored = $allData[$docKey]['page_info'];
    } elseif (isset($allData[$pageKey]['page_info']) && is_array($allData[$pageKey]['page_info'])) {
        $stored = $allData[$pageKey]['page_info'];
    } elseif (isset($allData[$docKey]['meta_title'])) {
        $stored = $allData[$docKey];
    } elseif (isset($allData[$pageKey]['meta_title'])) {
        $stored = $allData[$pageKey];
    }

    $final = [
        'page_title'       => !empty($stored['page_title']) ? $stored['page_title'] : ($defaultOverrides['page_title'] ?? $catInfo['title']),
        'meta_title'       => !empty($stored['meta_title']) ? $stored['meta_title'] : ($defaultOverrides['meta_title'] ?? $catInfo['meta_title']),
        'meta_description' => !empty($stored['meta_description']) ? $stored['meta_description'] : ($defaultOverrides['meta_description'] ?? $catInfo['meta_description']),
        'meta_keywords'    => !empty($stored['meta_keywords']) ? $stored['meta_keywords'] : ($defaultOverrides['meta_keywords'] ?? $catInfo['meta_keywords']),
        'canonical_url'    => !empty($stored['canonical_url']) ? $stored['canonical_url'] : ($defaultOverrides['canonical_url'] ?? $catInfo['canonical_url']),
        'og_image'         => !empty($stored['og_image']) ? $stored['og_image'] : ($defaultOverrides['og_image'] ?? $catInfo['og_image']),
    ];

    return array_merge($catInfo, $final);
}

/**
 * Save Page Info & SEO Metadata for any Statutory Committee Page
 */
function save_committee_page_info($pageKey, $info) {
    $catalog = get_committee_page_catalog();
    $catInfo = $catalog[$pageKey] ?? [];
    $docKey = $catInfo['doc_key'] ?? ('Committee_' . $pageKey);

    $allData = get_json_data('page_documents.json', []);
    
    // Ensure entry exists under docKey
    if (!isset($allData[$docKey])) {
        $allData[$docKey] = [
            'key' => $docKey,
            'title' => $info['page_title'] ?? ($catInfo['title'] ?? $pageKey),
            'section' => 'Academic',
            'source_file' => $catInfo['file'] ?? "Academic/Committee/{$pageKey}.php",
            'documents' => []
        ];
    }

    $cleanSeo = [
        'page_title'       => clean_input($info['page_title'] ?? ''),
        'meta_title'       => clean_input($info['meta_title'] ?? ''),
        'meta_description' => clean_input($info['meta_description'] ?? ''),
        'meta_keywords'    => clean_input($info['meta_keywords'] ?? ''),
        'canonical_url'    => clean_input($info['canonical_url'] ?? ''),
        'og_image'         => clean_input($info['og_image'] ?? 'assets/images/logo/logo.jpg'),
        'updated_at'       => date('Y-m-d H:i:s')
    ];

    $allData[$docKey]['page_info'] = $cleanSeo;
    if (!empty($cleanSeo['page_title'])) {
        $allData[$docKey]['title'] = $cleanSeo['page_title'];
    }

    // Also mirror to plain key if different
    if ($pageKey !== $docKey) {
        if (!isset($allData[$pageKey])) {
            $allData[$pageKey] = [
                'title' => $allData[$docKey]['title'],
                'section' => 'Academic',
                'documents' => []
            ];
        }
        $allData[$pageKey]['page_info'] = $cleanSeo;
    }

    return save_json_data('page_documents.json', $allData);
}

/**
 * Helper to fetch documents for a committee page
 */
function get_committee_documents($pageKey) {
    $catalog = get_committee_page_catalog();
    $docKey = $catalog[$pageKey]['doc_key'] ?? ('Committee_' . $pageKey);
    $allDocs = get_page_documents($docKey);
    if (empty($allDocs)) {
        $allDocs = get_page_documents($pageKey);
    }
    return $allDocs;
}
