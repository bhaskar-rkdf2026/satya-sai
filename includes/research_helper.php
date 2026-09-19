<?php
/**
 * Sri Satya Sai University of Technology & Medical Sciences
 * Research Cell Dynamic Helper & SEO Manager
 * Manages all 12 Research pages with live admin editing and SEO capabilities.
 */

if (!defined('BASE_URL')) {
    require_once __DIR__ . '/../config.php';
}

/**
 * Returns the master catalog for all 12 Research pages
 */
function get_research_page_catalog() {
    return [
        'DirectorRD' => [
            'title' => 'Director (R&D)',
            'file' => 'Research/Director_Research_And_Development.php',
            'icon' => 'fa-user-tie',
            'meta_title' => 'Director (R&D) | Research & Development Cell | SSSUTMS',
            'meta_description' => 'Meet the Director of Research and Development at Sri Satya Sai University (SSSUTMS), Sehore. Explore our vision, leadership message, and research initiatives.',
            'meta_keywords' => 'Director RD SSSUTMS, Dr Hemant Kumar Sharma, SSSUTMS Research Director, Research and Development Sehore, SSSUTMS Bhopal',
            'canonical_url' => '',
            'og_image' => 'assets/images/research/h.k.SHARMA_05042022_1258.jpg'
        ],
        'RAndDCell' => [
            'title' => 'R & D Cell',
            'file' => 'Research/RAndDCell.php',
            'icon' => 'fa-atom',
            'meta_title' => 'Research & Development (R&D) Cell | SSSUTMS',
            'meta_description' => 'Explore the Research and Development (R&D) Cell at Sri Satya Sai University. Promoting innovation, scientific research, and academic excellence.',
            'meta_keywords' => 'R&D Cell SSSUTMS, Research and Development Bhopal, University Research Cell Sehore, Scientific Innovation SSSUTMS',
            'canonical_url' => '',
            'og_image' => 'assets/images/logo/logo.jpg'
        ],
        'CouncilForResearch' => [
            'title' => 'Council For Research',
            'file' => 'Research/CouncilForResearch.php',
            'icon' => 'fa-users',
            'meta_title' => 'Council for Research & Advisory Board | SSSUTMS',
            'meta_description' => 'View the official Council for Research, Executive Committee members, and Advisory Board governing scientific research activities at SSSUTMS.',
            'meta_keywords' => 'Council For Research SSSUTMS, Research Advisory Board, Executive Research Committee, Academic Research Governance',
            'canonical_url' => '',
            'og_image' => 'assets/images/logo/logo.jpg'
        ],
        'ResearchPolicies' => [
            'title' => 'Research Promotion Policy',
            'file' => 'Research/ResearchPromotionPolicy.php',
            'icon' => 'fa-file-shield',
            'meta_title' => 'Research Promotion Policy & Ethics Guidelines | SSSUTMS',
            'meta_description' => 'Official Research Promotion Policy, Seed Money Grant schemes, publication incentives, and research ethics guidelines at Sri Satya Sai University.',
            'meta_keywords' => 'SSSUTMS Research Policy, Research Promotion Scheme, Seed Money Grant, University Ethics Guidelines Sehore',
            'canonical_url' => '',
            'og_image' => 'assets/images/logo/logo.jpg'
        ],
        'ConsultancyServices' => [
            'title' => 'Consultancy Services',
            'file' => 'Research/ConsultancyServices.php',
            'icon' => 'fa-briefcase',
            'meta_title' => 'Consultancy Services & Industrial Solutions | SSSUTMS',
            'meta_description' => 'Discover industrial consultancy services, testing facilities, resource sharing policies, and collaborative solutions offered by SSSUTMS.',
            'meta_keywords' => 'SSSUTMS Consultancy Services, Industrial Testing Sehore, Academic Consultancy MP, Industrial Solutions Bhopal',
            'canonical_url' => '',
            'og_image' => 'assets/images/logo/logo.jpg'
        ],
        'ResearchPatents' => [
            'title' => 'Patents',
            'file' => 'Research/Patents.php',
            'icon' => 'fa-certificate',
            'meta_title' => 'Patents & Intellectual Property Rights (IPR) | SSSUTMS',
            'meta_description' => 'Browse the repository of granted and published patents, intellectual property disclosures, and student-faculty innovations at SSSUTMS.',
            'meta_keywords' => 'SSSUTMS Patents, Granted Patents Sehore, IPR University Bhopal, Patent Application Innovations SSSUTMS',
            'canonical_url' => '',
            'og_image' => 'assets/images/logo/logo.jpg'
        ],
        'CollaborationandMou' => [
            'title' => 'Collaboration & MoU',
            'file' => 'Research/CollaborationandMou.php',
            'icon' => 'fa-handshake',
            'meta_title' => 'Collaborations & MoUs with Industry & Academia | SSSUTMS',
            'meta_description' => 'Explore national and international MoUs, industry partnerships, faculty exchange programs, and joint research collaborations at SSSUTMS.',
            'meta_keywords' => 'SSSUTMS MoUs, University Industry Collaboration, Academic Partnerships Sehore, Joint Research MoUs',
            'canonical_url' => '',
            'og_image' => 'assets/images/logo/logo.jpg'
        ],
        'Iic_Cell' => [
            'title' => 'IIC Cell',
            'file' => 'Research/Iic_Cell.php',
            'icon' => 'fa-rocket',
            'meta_title' => 'Institution\'s Innovation Council (IIC Cell) | SSSUTMS',
            'meta_description' => 'Institution\'s Innovation Council (IIC) at SSSUTMS: Fostering student entrepreneurship, start-up incubation, hackathons, and innovation workshops.',
            'meta_keywords' => 'IIC SSSUTMS, Institution Innovation Council, Student Startups Sehore, MHRD Innovation Cell SSSUTMS',
            'canonical_url' => '',
            'og_image' => 'assets/images/logo/logo.jpg'
        ],
        'ResearchEResources' => [
            'title' => 'E-Resources',
            'file' => 'Research/E-Resources.php',
            'icon' => 'fa-book-bookmark',
            'meta_title' => 'Research E-Resources, Digital Libraries & Journals | SSSUTMS',
            'meta_description' => 'Access digital library e-resources, open access academic journals, research databases, and e-books for students and faculty at SSSUTMS.',
            'meta_keywords' => 'SSSUTMS E-Resources, Digital Library Sehore, Online Academic Journals, Research Databases SSSUTMS',
            'canonical_url' => '',
            'og_image' => 'assets/images/logo/logo.jpg'
        ],
        'Exposition' => [
            'title' => 'Exposition',
            'file' => 'Research/Exposition.php',
            'icon' => 'fa-wand-magic-sparkles',
            'meta_title' => 'Exposition: Annual Innovation Carnival & Robo-Wars | SSSUTMS',
            'meta_description' => 'Exposition at SSSUTMS: Annual student innovation carnival featuring drone competitions, robotics, robo-wars, working prototypes, and science stalls.',
            'meta_keywords' => 'SSSUTMS Exposition, Innovation Carnival Sehore, Robo-Wars SSSUTMS, Drone Competition Bhopal, Annual Tech Fest',
            'canonical_url' => '',
            'og_image' => 'assets/images/logo/logo.jpg'
        ],
        'UGAndPGScholarsProject' => [
            'title' => 'UG & PG Scholars Project',
            'file' => 'Research/UGAndPGScholarsProject.php',
            'icon' => 'fa-graduation-cap',
            'meta_title' => 'UG & PG Scholars Research Projects & Compendium | SSSUTMS',
            'meta_description' => 'Nurturing undergraduate and postgraduate student research, project methodology, paper publications, and annual project compendium at SSSUTMS.',
            'meta_keywords' => 'UG PG Projects SSSUTMS, Student Research Compendium, Capstone Projects Sehore, Scholar Papers SSSUTMS',
            'canonical_url' => '',
            'og_image' => 'assets/images/logo/logo.jpg'
        ],
        'NPTEL' => [
            'title' => 'NPTEL',
            'file' => 'Research/NPTEL.php',
            'icon' => 'fa-laptop-code',
            'meta_title' => 'NPTEL & SWAYAM Local Chapter | SSSUTMS',
            'meta_description' => 'SSSUTMS NPTEL Local Chapter: Access IIT online certification courses, SWAYAM MOOCs, faculty development programs, and exam guidelines.',
            'meta_keywords' => 'NPTEL SSSUTMS, SWAYAM Local Chapter Sehore, IIT Online Courses, NPTEL Certification Bhopal',
            'canonical_url' => '',
            'og_image' => 'assets/images/logo/logo.jpg'
        ]
    ];
}

/**
 * Get Page Info and SEO Metadata for any of the 12 Research Pages
 */
function get_research_page_info($pageKey, $defaultOverrides = []) {
    $catalog = get_research_page_catalog();
    $catInfo = $catalog[$pageKey] ?? [
        'title' => ucwords(str_replace(['_', '-'], ' ', $pageKey)),
        'file' => "Research/{$pageKey}.php",
        'meta_title' => ucwords(str_replace(['_', '-'], ' ', $pageKey)) . ' - Research | SSSUTMS',
        'meta_description' => 'Explore research initiatives, academic publications, and innovations at Sri Satya Sai University (SSSUTMS), Sehore.',
        'meta_keywords' => 'SSSUTMS, Research, ' . ucwords(str_replace(['_', '-'], ' ', $pageKey)),
        'canonical_url' => '',
        'og_image' => 'assets/images/logo/logo.jpg'
    ];

    $allData = get_json_data('page_documents.json', []);
    $stored = [];

    // Check if stored under 'page_info'
    if (isset($allData[$pageKey]['page_info']) && is_array($allData[$pageKey]['page_info'])) {
        $stored = $allData[$pageKey]['page_info'];
    } elseif (isset($allData[$pageKey][0]) && is_array($allData[$pageKey][0])) {
        // Check single-record form array
        $firstRec = $allData[$pageKey][0];
        $stored = [
            'page_title'       => $firstRec['page_title'] ?? ($firstRec['title'] ?? ''),
            'meta_title'       => $firstRec['meta_title'] ?? '',
            'meta_description' => $firstRec['meta_description'] ?? '',
            'meta_keywords'    => $firstRec['meta_keywords'] ?? '',
            'canonical_url'    => $firstRec['canonical_url'] ?? '',
            'og_image'         => $firstRec['og_image'] ?? ''
        ];
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
 * Save Page Info & SEO Metadata for any Research Page
 */
function save_research_page_info($pageKey, $info) {
    $allData = get_json_data('page_documents.json', []);
    
    // Ensure entry exists
    if (!isset($allData[$pageKey])) {
        $allData[$pageKey] = [
            'title' => $info['page_title'] ?? $pageKey,
            'section' => 'Research',
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

    // If it's a table tab with documents structure
    if (isset($allData[$pageKey]['documents'])) {
        $allData[$pageKey]['page_info'] = $cleanSeo;
        if (!empty($cleanSeo['page_title'])) {
            $allData[$pageKey]['title'] = $cleanSeo['page_title'];
        }
    } elseif (isset($allData[$pageKey][0]) && is_array($allData[$pageKey][0])) {
        // Single record structure: merge SEO directly into record 0 and page_info
        $allData[$pageKey][0] = array_merge($allData[$pageKey][0], $cleanSeo);
        $allData[$pageKey]['page_info'] = $cleanSeo;
    } else {
        $allData[$pageKey]['page_info'] = $cleanSeo;
    }

    return save_json_data('page_documents.json', $allData);
}
