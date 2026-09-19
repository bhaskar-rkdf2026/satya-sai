<?php
/**
 * Global SEO & Page Indexing Helper for SSSUTMS
 * Manages robots meta indexing directives, global search engine verification, canonical URLs, and per-page indexing rules.
 */

if (!defined('SITE_NAME')) {
    require_once __DIR__ . '/../config.php';
}

/**
 * Return the supported Robots Indexing Directives
 */
function get_robots_directive_options() {
    return [
        'noindex, nofollow' => [
            'value'       => 'noindex, nofollow',
            'label'       => 'noindex, nofollow (Block all indexing)',
            'short_label' => 'noindex, nofollow',
            'desc'        => 'Prevents search engines from indexing the page and crawling any links on it.',
            'badge_class' => 'bg-danger-subtle text-danger border-danger-subtle',
            'icon'        => 'fa-ban'
        ],
        'index, follow' => [
            'value'       => 'index, follow',
            'label'       => 'index, follow (Standard / Recommended)',
            'short_label' => 'index, follow',
            'desc'        => 'Allows search engines to index the page and follow all links for ranking.',
            'badge_class' => 'bg-success-subtle text-success border-success-subtle',
            'icon'        => 'fa-circle-check'
        ],
        'noindex, follow' => [
            'value'       => 'noindex, follow',
            'label'       => "noindex, follow (Don't index, follow links)",
            'short_label' => 'noindex, follow',
            'desc'        => 'Prevents the page from appearing in search results but crawls outbound links.',
            'badge_class' => 'bg-warning-subtle text-warning-emphasis border-warning-subtle',
            'icon'        => 'fa-link'
        ],
        'index, nofollow' => [
            'value'       => 'index, nofollow',
            'label'       => "index, nofollow (Index, don't follow links)",
            'short_label' => 'index, nofollow',
            'desc'        => 'Indexes the page in search results but blocks bots from crawling links.',
            'badge_class' => 'bg-info-subtle text-info border-info-subtle',
            'icon'        => 'fa-eye'
        ]
    ];
}

/**
 * Fetch Global SEO & Indexing Settings from MySQL Database (with JSON fallback & static caching)
 */
function get_global_seo_settings($forceRefresh = false) {
    static $cached = null;
    if ($cached !== null && !$forceRefresh) {
        return $cached;
    }

    $defaults = [
        'global_robots_default'  => 'noindex, nofollow', // Default is noindex, nofollow as requested
        'google_verification'    => '',
        'bing_verification'      => '',
        'canonical_base'         => 'https://www.sssutms.ac.in',
        'meta_author'            => 'Sri Satya Sai University of Technology and Medical Sciences',
        'sitemap_url'            => 'https://www.sssutms.ac.in/sitemap.xml',
        'custom_robots_txt'      => "User-agent: *\nDisallow: /admin/\nDisallow: /includes/\nDisallow: /scratch/\nSitemap: https://www.sssutms.ac.in/sitemap.xml",
        'page_rules'             => [],
        'page_schemas'           => []
    ];

    try {
        $db = get_db();
        if ($db) {
            // Fetch global settings record
            $stmt = $db->query("SELECT * FROM `seo_global_settings` ORDER BY id ASC LIMIT 1");
            $row = $stmt ? $stmt->fetch() : null;

            $settings = $defaults;
            if ($row) {
                $settings['global_robots_default'] = !empty($row['global_robots_default']) ? $row['global_robots_default'] : $defaults['global_robots_default'];
                $settings['google_verification']   = $row['google_verification'] ?? '';
                $settings['bing_verification']     = $row['bing_verification'] ?? '';
                $settings['canonical_base']        = !empty($row['canonical_base']) ? $row['canonical_base'] : $defaults['canonical_base'];
                $settings['meta_author']           = !empty($row['meta_author']) ? $row['meta_author'] : $defaults['meta_author'];
                $settings['sitemap_url']           = !empty($row['sitemap_url']) ? $row['sitemap_url'] : $defaults['sitemap_url'];
                $settings['custom_robots_txt']     = $row['custom_robots_txt'] ?? $defaults['custom_robots_txt'];
            }

            // Fetch per-page rules and custom schemas
            $rulesStmt = $db->query("SELECT page_url, directive, custom_schema FROM `seo_page_rules`");
            if ($rulesStmt) {
                $rulesRows = $rulesStmt->fetchAll();
                $pageRules = [];
                $pageSchemas = [];
                foreach ($rulesRows as $r) {
                    $url = ltrim(str_replace('\\', '/', $r['page_url']), '/');
                    $pageRules[$url] = $r['directive'];
                    if (!empty($r['custom_schema'])) {
                        $pageSchemas[$url] = $r['custom_schema'];
                    }
                }
                $settings['page_rules'] = $pageRules;
                $settings['page_schemas'] = $pageSchemas;
            }

            $cached = $settings;
            return $settings;
        }
    } catch (Exception $e) {
        error_log("SEO DB Fetch Error: " . $e->getMessage());
    }

    // Graceful fallback to JSON if DB fails
    $saved = get_json_data('seo_indexing.json', $defaults);
    $cached = array_merge($defaults, is_array($saved) ? $saved : []);
    return $cached;
}

/**
 * Save Global SEO & Indexing Settings to MySQL Database and sync to JSON backup
 */
function save_global_seo_settings($settings) {
    $db = get_db();
    $dbSuccess = false;

    if ($db) {
        try {
            $db->beginTransaction();

            // 1. Update or Insert Global Settings
            $stmt = $db->query("SELECT id FROM `seo_global_settings` LIMIT 1");
            $existing = $stmt ? $stmt->fetch() : null;

            if ($existing) {
                $up = $db->prepare("
                    UPDATE `seo_global_settings` 
                    SET `global_robots_default` = :global_robots_default,
                        `google_verification`   = :google_verification,
                        `bing_verification`     = :bing_verification,
                        `canonical_base`        = :canonical_base,
                        `meta_author`           = :meta_author,
                        `sitemap_url`           = :sitemap_url,
                        `custom_robots_txt`     = :custom_robots_txt
                    WHERE `id` = :id
                ");
                $up->execute([
                    ':global_robots_default' => $settings['global_robots_default'] ?? 'noindex, nofollow',
                    ':google_verification'   => $settings['google_verification'] ?? '',
                    ':bing_verification'     => $settings['bing_verification'] ?? '',
                    ':canonical_base'        => $settings['canonical_base'] ?? 'https://www.sssutms.ac.in',
                    ':meta_author'           => $settings['meta_author'] ?? 'Sri Satya Sai University of Technology and Medical Sciences',
                    ':sitemap_url'           => $settings['sitemap_url'] ?? 'https://www.sssutms.ac.in/sitemap.xml',
                    ':custom_robots_txt'     => $settings['custom_robots_txt'] ?? '',
                    ':id'                    => $existing['id']
                ]);
            } else {
                $ins = $db->prepare("
                    INSERT INTO `seo_global_settings` 
                    (`global_robots_default`, `google_verification`, `bing_verification`, `canonical_base`, `meta_author`, `sitemap_url`, `custom_robots_txt`)
                    VALUES (:global_robots_default, :google_verification, :bing_verification, :canonical_base, :meta_author, :sitemap_url, :custom_robots_txt)
                ");
                $ins->execute([
                    ':global_robots_default' => $settings['global_robots_default'] ?? 'noindex, nofollow',
                    ':google_verification'   => $settings['google_verification'] ?? '',
                    ':bing_verification'     => $settings['bing_verification'] ?? '',
                    ':canonical_base'        => $settings['canonical_base'] ?? 'https://www.sssutms.ac.in',
                    ':meta_author'           => $settings['meta_author'] ?? 'Sri Satya Sai University of Technology and Medical Sciences',
                    ':sitemap_url'           => $settings['sitemap_url'] ?? 'https://www.sssutms.ac.in/sitemap.xml',
                    ':custom_robots_txt'     => $settings['custom_robots_txt'] ?? ''
                ]);
            }

            // 2. Sync page rules & schemas in DB
            if (isset($settings['page_rules']) && is_array($settings['page_rules'])) {
                // Delete existing rules and re-insert for accurate state
                $db->exec("DELETE FROM `seo_page_rules`");
                $insRule = $db->prepare("
                    INSERT INTO `seo_page_rules` (`page_url`, `directive`, `custom_schema`)
                    VALUES (:page_url, :directive, :custom_schema)
                ");
                foreach ($settings['page_rules'] as $url => $dir) {
                    $cleanUrl = ltrim(str_replace('\\', '/', $url), '/');
                    if (!empty($cleanUrl)) {
                        $schema = $settings['page_schemas'][$cleanUrl] ?? null;
                        $insRule->execute([
                            ':page_url'      => $cleanUrl,
                            ':directive'     => $dir,
                            ':custom_schema' => $schema
                        ]);
                    }
                }
            }

            $db->commit();
            $dbSuccess = true;
        } catch (Exception $e) {
            if ($db->inTransaction()) {
                $db->rollBack();
            }
            error_log("SEO DB Save Error: " . $e->getMessage());
        }
    }

    // Invalidate and refresh memory cache
    get_global_seo_settings(true);

    // Sync JSON backup
    save_json_data('seo_indexing.json', $settings);

    return $dbSuccess || true;
}

/**
 * Resolve the exact Robots Indexing Directive for a given page or current URL
 */
function get_page_indexing_directive($pagePath = null, $fallbackDirective = null) {
    $settings = get_global_seo_settings();
    $defaultDirective = !empty($settings['global_robots_default']) ? $settings['global_robots_default'] : 'noindex, nofollow';

    if ($pagePath === null) {
        // Attempt 1: From SCRIPT_FILENAME vs BASE_DIR
        if (!empty($_SERVER['SCRIPT_FILENAME']) && defined('BASE_DIR')) {
            $normScript = str_replace('\\', '/', realpath($_SERVER['SCRIPT_FILENAME']) ?: $_SERVER['SCRIPT_FILENAME']);
            $normBase = str_replace('\\', '/', realpath(BASE_DIR) ?: BASE_DIR);
            if (strpos($normScript, $normBase) === 0) {
                $pagePath = ltrim(substr($normScript, strlen($normBase)), '/');
            }
        }

        // Attempt 2: From SCRIPT_NAME / PHP_SELF vs BASE_URL
        if (empty($pagePath)) {
            $script = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? $_SERVER['PHP_SELF'] ?? '');
            if (defined('BASE_URL') && BASE_URL !== '/' && strpos($script, BASE_URL) === 0) {
                $pagePath = ltrim(substr($script, strlen(BASE_URL)), '/');
            } else {
                $pagePath = ltrim(preg_replace('/^\/[^\/]+\//', '', $script), '/');
                if (empty($pagePath)) {
                    $pagePath = ltrim($script, '/');
                }
            }
        }

        if (empty($pagePath)) {
            $pagePath = 'index.php';
        }
    }

    $pagePath = ltrim(str_replace('\\', '/', $pagePath), '/');

    // 1. Exact match in page_rules
    if (isset($settings['page_rules'][$pagePath])) {
        return $settings['page_rules'][$pagePath];
    }

    // 2. Case-insensitive match in page_rules
    $lowerPagePath = strtolower($pagePath);
    foreach ($settings['page_rules'] as $rUrl => $rDir) {
        if (strtolower(ltrim(str_replace('\\', '/', $rUrl), '/')) === $lowerPagePath) {
            return $rDir;
        }
    }

    // 3. Known Aliases and alternative paths
    $aliases = [
        'career.php'            => 'Career/index.php',
        'career/index.php'      => 'career.php',
        'career/events.php'     => 'EVENTS.php',
        'career/announcements.php' => 'Announcements.php',
        'itep.php'              => 'ITEP/index.php',
        'itep/index.php'        => 'itep.php',
        'itep/events.php'       => 'EVENTS.php',
        'itep/announcements.php'=> 'Announcements.php',
    ];
    if (isset($aliases[$lowerPagePath])) {
        $target = $aliases[$lowerPagePath];
        if (isset($settings['page_rules'][$target])) {
            return $settings['page_rules'][$target];
        }
        foreach ($settings['page_rules'] as $rUrl => $rDir) {
            if (strtolower(ltrim(str_replace('\\', '/', $rUrl), '/')) === strtolower($target)) {
                return $rDir;
            }
        }
    }

    // 4. Base filename fallback ONLY for subpages that are NOT 'index.php'
    // (Crucial: never let Career/index.php or ITEP/index.php inherit index.php homepage directive!)
    $baseName = basename($pagePath);
    if (strtolower($baseName) !== 'index.php') {
        if (isset($settings['page_rules'][$baseName])) {
            return $settings['page_rules'][$baseName];
        }
        foreach ($settings['page_rules'] as $rUrl => $rDir) {
            if (strtolower(basename($rUrl)) === strtolower($baseName)) {
                return $rDir;
            }
        }
    }

    // 5. If a fallback directive was explicitly passed (e.g. from page's own meta), use it if non-empty
    if (!empty($fallbackDirective)) {
        return $fallbackDirective;
    }

    // 6. Return global robots default directive
    return $defaultDirective;
}

/**
 * Master catalog of all indexable website pages categorized
 */
function get_master_page_catalog() {
    $pages = [];

    // Helper to register page
    $add = function($url, $title, $category, $icon = 'fa-file') use (&$pages) {
        $cleanUrl = ltrim(str_replace('\\', '/', $url), '/');
        $pages[$cleanUrl] = [
            'url'      => $cleanUrl,
            'title'    => $title,
            'category' => $category,
            'icon'     => $icon
        ];
    };

    // 1. Core Gateway Pages
    $add('index.php', 'Home Page (Main Portal)', 'Core Portal', 'fa-house');
    $add('about.php', 'About Us Section Hub', 'Core Portal', 'fa-circle-info');
    $add('academics.php', 'Academics Section Hub', 'Core Portal', 'fa-graduation-cap');
    $add('admissions.php', 'Admissions Section Hub', 'Core Portal', 'fa-user-graduate');
    $add('examinations.php', 'Examinations Section Hub', 'Core Portal', 'fa-file-signature');
    $add('research.php', 'Research Section Hub', 'Core Portal', 'fa-flask');
    $add('contact.php', 'Contact Us & Helpdesk', 'Core Portal', 'fa-phone');
    $add('Career/index.php', 'Career & Recruitment Hub', 'Core Portal', 'fa-briefcase');
    $add('ITEP/index.php', 'ITEP Cell Portal', 'Core Portal', 'fa-graduation-cap');
    $add('gallery.php', 'Photo & Video Gallery', 'Core Portal', 'fa-camera-retro');
    $add('EVENTS.php', 'Official University Events & Circulars', 'Core Portal', 'fa-calendar-days');
    $add('UpCommingEvents.php', 'Upcoming Events & Campus Life', 'Core Portal', 'fa-bullhorn');
    $add('student-registration.php', 'Online Student Registration (E-Pravesh)', 'Core Portal', 'fa-user-plus');
    $add('erp-login.php', 'University ERP Portal Login', 'Core Portal', 'fa-lock');
    $add('verify-marksheet.php', 'Online Marksheet Verification', 'Core Portal', 'fa-certificate');
    $add('PressMedia.php', 'Press & Media Coverage', 'Core Portal', 'fa-newspaper');
    $add('DownloadLinks.php', 'Curriculum & Schemes Downloads Hub', 'Core Portal', 'fa-download');
    $add('ImportantLinks.php', 'Important University Links', 'Core Portal', 'fa-link');
    $add('QuickLinks.php', 'Quick Links Portal', 'Core Portal', 'fa-bolt');
    $add('RTI.php', 'Right to Information (RTI)', 'Core Portal', 'fa-scale-balanced');
    $add('NotificationOfPhdAward.php', 'Ph.D. Award Notifications', 'Core Portal', 'fa-award');
    $add('Barrier_Free_Environment.php', 'Barrier Free Environment Policy', 'Core Portal', 'fa-wheelchair');
    $add('E-Content.php', 'E-Learning & Digital Content', 'Core Portal', 'fa-laptop');
    $add('Alumni.php', 'Alumni Association Portal', 'Core Portal', 'fa-users');
    $add('Announcements.php', 'Official Announcements & Circulars', 'Core Portal', 'fa-bullhorn');
    $add('NBADCS.php', 'NBA Data Capture System (DCS)', 'Core Portal', 'fa-database');
    $add('Forms.php', 'Student & Faculty Downloadable Forms', 'Core Portal', 'fa-file-lines');

    // 2. About Pages (42 pages)
    if (function_exists('get_all_about_pages')) {
        $aboutCatalog = get_all_about_pages('all');
        foreach ($aboutCatalog as $key => $data) {
            $slug = 'About/' . $key . '.php';
            $add($slug, $data['title'] ?? $key, 'About University', 'fa-circle-info');
        }
    }

    // 3. Academic Programs & NAAC (46 pages)
    if (function_exists('get_academic_page_catalog')) {
        $acadCatalog = get_academic_page_catalog();
        foreach ($acadCatalog as $key => $data) {
            $slug = $data['slug'] ?? ('Academic/' . $key . '.php');
            $cat = $data['category'] ?? 'Academic';
            $add($slug, $data['title'] ?? $key, $cat, $data['icon'] ?? 'fa-graduation-cap');
        }
    }

    // 4. Admission Cell (7 pages)
    $admissionPages = [
        'Admission/AdmissionNotice.php'    => 'Admission Notices & Circulars',
        'Admission/AdmissionBrochure.php'  => 'University Admission Brochure',
        'Admission/AdmissionCharges.php'   => 'Fee Structure & Admission Charges',
        'Admission/AdmissionPolicy.php'    => 'University Admission Policy & Rules',
        'Admission/AdmissionProcedure.php' => 'Step-by-Step Admission Procedure',
        'Admission/BankDetails.php'        => 'Official Bank Account Details for Fee Payment',
        'Admission/SeatMatrix.php'         => 'Approved Seat Matrix & Intake Capacity'
    ];
    foreach ($admissionPages as $url => $title) {
        $add($url, $title, 'Admission Cell', 'fa-user-graduate');
    }

    // 5. Examination Cell (5 pages)
    $examPages = [
        'Examination/ExamNotifications.php' => 'Examination Notifications & Alerts',
        'Examination/EntranceExamAlert.php' => 'Ph.D. & Course Entrance Exam Alerts',
        'Examination/ExamSchedule.php'      => 'Mid & End Semester Exam Schedules / Timetables',
        'Examination/Results.php'           => 'Official Examination Results Portal',
        'Examination/Interface.php'         => 'Student & Exam Portal Interface'
    ];
    foreach ($examPages as $url => $title) {
        $add($url, $title, 'Examination Cell', 'fa-file-signature');
    }

    // 6. Research Cell (12 pages)
    if (function_exists('get_research_page_catalog')) {
        $researchCatalog = get_research_page_catalog();
        foreach ($researchCatalog as $key => $data) {
            $slug = $data['slug'] ?? ('Research/' . $key . '.php');
            $add($slug, $data['title'] ?? $key, 'Research Cell', $data['icon'] ?? 'fa-flask');
        }
    }

    // 7. Schemes & Downloads (Grouped representative schemes)
    if (function_exists('get_download_page_catalog')) {
        $downloadCatalog = get_download_page_catalog();
        foreach ($downloadCatalog as $key => $data) {
            $slug = $data['slug'] ?? ('Download/Scheme/' . str_replace('doc_', '', $key) . '.php');
            $add($slug, $data['title'] ?? $key, 'Curriculum & Schemes', 'fa-folder-open');
        }
    }

    return $pages;
}

/**
 * Clean & normalize JSON Schema string (removes accidental <script> tags, validates JSON)
 */
function clean_schema_json($rawJson) {
    if (empty($rawJson)) return '';
    
    // If it's an array, encode as pretty JSON
    if (is_array($rawJson)) {
        return json_encode($rawJson, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }
    
    $clean = trim((string)$rawJson);
    // Strip <script...> and </script> tags if user pasted them
    $clean = preg_replace('/^<script\b[^>]*>/i', '', $clean);
    $clean = preg_replace('/<\/script>$/i', '', $clean);
    $clean = trim($clean);
    
    // Check JSON validity
    $decoded = json_decode($clean, true);
    if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
        return json_encode($decoded, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }
    
    return $clean;
}

/**
 * Get Schema JSON-LD Templates Library
 */
function get_schema_templates() {
    $baseUrl = defined('BASE_URL') ? (isset($_SERVER['HTTP_HOST']) ? (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . BASE_URL : 'https://www.sssutms.ac.in/') : 'https://www.sssutms.ac.in/';
    $baseUrl = rtrim($baseUrl, '/') . '/';

    return [
        'EducationalOrganization' => [
            'name'        => 'University / Educational Organization',
            'icon'        => 'fa-university',
            'badge'       => 'Default & Institutional',
            'desc'        => 'Ideal for Homepage, About Us, Governance, and general institutional portals.',
            'schema'      => [
                '@context'      => 'https://schema.org',
                '@type'         => 'EducationalOrganization',
                'name'          => 'Sri Satya Sai University of Technology & Medical Sciences',
                'alternateName' => 'SSSUTMS',
                'url'           => 'https://www.sssutms.ac.in',
                'logo'          => $baseUrl . 'assets/images/logo/logo.jpg',
                'description'   => 'Premier private university in Madhya Pradesh offering approved undergraduate, postgraduate, and research degree programs in Engineering, Medical, Ayurveda, Pharmacy, and Management.',
                'address'       => [
                    '@type'           => 'PostalAddress',
                    'streetAddress'   => 'Opp. Oilfed Plant, Bhopal-Indore Road',
                    'addressLocality' => 'Sehore',
                    'addressRegion'   => 'Madhya Pradesh',
                    'postalCode'      => '466001',
                    'addressCountry'  => 'IN'
                ],
                'contactPoint'  => [
                    '@type'             => 'ContactPoint',
                    'telephone'         => '+91-7748900028',
                    'contactType'       => 'admissions',
                    'areaServed'        => 'IN',
                    'availableLanguage' => ['English', 'Hindi']
                ],
                'sameAs'        => [
                    'https://www.facebook.com/SSSUTMSOfficial/',
                    'https://www.instagram.com/sssutms_official/',
                    'https://twitter.com/sssutms_sehore',
                    'https://www.linkedin.com/school/sssutms/'
                ]
            ]
        ],
        'Course' => [
            'name'        => 'Course / Academic Degree Program',
            'icon'        => 'fa-graduation-cap',
            'badge'       => 'Academics & Faculty',
            'desc'        => 'Ideal for Engineering, Pharmacy, Medical, MBA, MCA, BAMS, and degree syllabus pages.',
            'schema'      => [
                '@context'                     => 'https://schema.org',
                '@type'                        => 'Course',
                'name'                         => 'Bachelor of Technology (B.Tech) in Computer Science & Engineering',
                'description'                  => 'Comprehensive 4-year undergraduate degree program accredited and approved by AICTE & UGC focusing on modern computing, AI, algorithms, and software development.',
                'provider'                     => [
                    '@type' => 'EducationalOrganization',
                    'name'  => 'Sri Satya Sai University of Technology and Medical Sciences',
                    'url'   => 'https://www.sssutms.ac.in'
                ],
                'educationalCredentialAwarded' => 'Bachelor of Technology (B.Tech)',
                'timeRequired'                 => 'P4Y',
                'occupationalCategory'         => 'Software Engineer, Data Analyst, Cloud Architect',
                'hasCourseInstance'            => [
                    '@type'      => 'CourseInstance',
                    'courseMode' => 'Full-time, On-campus',
                    'startDate'  => '2026-08-01',
                    'location'   => 'SSSUTMS Sehore Campus, Bhopal-Indore Road'
                ]
            ]
        ],
        'FAQPage' => [
            'name'        => 'FAQ Page (Rich Questions & Answers)',
            'icon'        => 'fa-circle-question',
            'badge'       => 'Admissions & Helpdesk',
            'desc'        => 'Ideal for Admissions FAQs, Exam policies, Student inquiries, and Helpdesk.',
            'schema'      => [
                '@context'   => 'https://schema.org',
                '@type'      => 'FAQPage',
                'mainEntity' => [
                    [
                        '@type'          => 'Question',
                        'name'           => 'What is the admission procedure at SSSUTMS for the 2026-27 session?',
                        'acceptedAnswer' => [
                            '@type' => 'Answer',
                            'text'  => 'Candidates can apply online through the official E-Pravesh registration portal at https://www.sssutms.ac.in/student-registration.php or visit the admission cell on campus.'
                        ]
                    ],
                    [
                        '@type'          => 'Question',
                        'name'           => 'Is Sri Satya Sai University approved by UGC and statutory councils?',
                        'acceptedAnswer' => [
                            '@type' => 'Answer',
                            'text'  => 'Yes, SSSUTMS is established under Madhya Pradesh Niji Vishwavidyalaya Adhiniyam and recognized by UGC, AICTE, PCI, NCISM, INC, and NCH.'
                        ]
                    ]
                ]
            ]
        ],
        'JobPosting' => [
            'name'        => 'Job Vacancy / Faculty Recruitment',
            'icon'        => 'fa-briefcase',
            'badge'       => 'Career & Recruitment',
            'desc'        => 'Ideal for Career portal, Professor vacancies, and Staff recruitment notices.',
            'schema'      => [
                '@context'           => 'https://schema.org',
                '@type'              => 'JobPosting',
                'title'              => 'Professor / Associate Professor / Assistant Professor',
                'description'        => 'Sri Satya Sai University invites applications for teaching faculty and research positions in Engineering, Pharmacy, Ayurveda (BAMS), Computer Science, and Management.',
                'datePosted'         => date('Y-m-d'),
                'validThrough'       => date('Y-m-d', strtotime('+90 days')),
                'employmentType'     => 'FULL_TIME',
                'hiringOrganization' => [
                    '@type'  => 'EducationalOrganization',
                    'name'   => 'Sri Satya Sai University of Technology and Medical Sciences',
                    'sameAs' => 'https://www.sssutms.ac.in',
                    'logo'   => $baseUrl . 'assets/images/logo/logo.jpg'
                ],
                'jobLocation'        => [
                    '@type'   => 'Place',
                    'address' => [
                        '@type'           => 'PostalAddress',
                        'streetAddress'   => 'Bhopal-Indore Road',
                        'addressLocality' => 'Sehore',
                        'addressRegion'   => 'Madhya Pradesh',
                        'postalCode'      => '466001',
                        'addressCountry'  => 'IN'
                    ]
                ]
            ]
        ],
        'Event' => [
            'name'        => 'Event / Seminar / Conference',
            'icon'        => 'fa-calendar-days',
            'badge'       => 'Events & Campus Life',
            'desc'        => 'Ideal for University Events, Workshops, Seminars, and Annual Fests.',
            'schema'      => [
                '@context'            => 'https://schema.org',
                '@type'               => 'Event',
                'name'                => 'National Conference on Emerging Trends in Engineering & Medical Sciences',
                'description'         => 'Flagship multidisciplinary research and technical conference hosted at SSSUTMS campus.',
                'startDate'           => date('Y-m-d', strtotime('+30 days')) . 'T09:30:00+05:30',
                'endDate'             => date('Y-m-d', strtotime('+31 days')) . 'T17:00:00+05:30',
                'eventStatus'         => 'https://schema.org/EventScheduled',
                'eventAttendanceMode' => 'https://schema.org/OfflineEventAttendanceMode',
                'location'            => [
                    '@type'   => 'Place',
                    'name'    => 'University Central Auditorium',
                    'address' => [
                        '@type'           => 'PostalAddress',
                        'streetAddress'   => 'Bhopal-Indore Road',
                        'addressLocality' => 'Sehore',
                        'addressRegion'   => 'Madhya Pradesh',
                        'postalCode'      => '466001',
                        'addressCountry'  => 'IN'
                    ]
                ],
                'organizer'           => [
                    '@type' => 'EducationalOrganization',
                    'name'  => 'Sri Satya Sai University of Technology & Medical Sciences',
                    'url'   => 'https://www.sssutms.ac.in'
                ]
            ]
        ],
        'Article' => [
            'name'        => 'Article / Press / Official Circular',
            'icon'        => 'fa-newspaper',
            'badge'       => 'Press & News',
            'desc'        => 'Ideal for Press Releases, Media Coverage, and Official University Circulars.',
            'schema'      => [
                '@context'         => 'https://schema.org',
                '@type'            => 'NewsArticle',
                'headline'         => 'Sri Satya Sai University Announces Admission Notification 2026-27',
                'image'            => [$baseUrl . 'assets/images/logo/logo.jpg'],
                'datePublished'    => date('Y-m-d') . 'T08:00:00+05:30',
                'dateModified'     => date('Y-m-d') . 'T08:00:00+05:30',
                'author'           => [
                    '@type' => 'Organization',
                    'name'  => 'Sri Satya Sai University'
                ],
                'publisher'        => [
                    '@type' => 'EducationalOrganization',
                    'name'  => 'Sri Satya Sai University of Technology & Medical Sciences',
                    'logo'  => [
                        '@type' => 'ImageObject',
                        'url'   => $baseUrl . 'assets/images/logo/logo.jpg'
                    ]
                ],
                'description'      => 'Official circular and press release regarding academic programs, admissions, and institutional initiatives.'
            ]
        ],
        'WebPage' => [
            'name'        => 'Standard WebPage & Breadcrumbs',
            'icon'        => 'fa-file-lines',
            'badge'       => 'General Content',
            'desc'        => 'Standard structured data representation for general content, policy, and information pages.',
            'schema'      => [
                '@context'    => 'https://schema.org',
                '@type'       => 'WebPage',
                'name'        => 'Sri Satya Sai University of Technology and Medical Sciences',
                'description' => 'Official information, schemes, and student resources portal of SSSUTMS, Sehore.',
                'url'         => 'https://www.sssutms.ac.in',
                'publisher'   => [
                    '@type' => 'EducationalOrganization',
                    'name'  => 'Sri Satya Sai University of Technology and Medical Sciences',
                    'url'   => 'https://www.sssutms.ac.in'
                ]
            ]
        ]
    ];
}

/**
 * Fetch custom Page Schema from seo_indexing.json
 */
function get_page_schema($pagePath) {
    $settings = get_global_seo_settings();
    $cleanPath = ltrim(str_replace('\\', '/', $pagePath), '/');

    if (!empty($settings['page_schemas'][$cleanPath])) {
        return $settings['page_schemas'][$cleanPath];
    }

    $lower = strtolower($cleanPath);
    if (!empty($settings['page_schemas'])) {
        foreach ($settings['page_schemas'] as $p => $s) {
            if (strtolower(ltrim(str_replace('\\', '/', $p), '/')) === $lower) {
                return $s;
            }
        }
    }

    return '';
}

/**
 * Save custom Page Schema to seo_indexing.json
 */
function save_page_schema($pagePath, $schemaJson) {
    $settings = get_global_seo_settings();
    $cleanPath = ltrim(str_replace('\\', '/', $pagePath), '/');
    $cleanedJson = clean_schema_json($schemaJson);

    if (empty($cleanedJson)) {
        unset($settings['page_schemas'][$cleanPath]);
    } else {
        $settings['page_schemas'][$cleanPath] = $cleanedJson;
    }

    return save_global_seo_settings($settings);
}

/**
 * Delete custom Page Schema
 */
function delete_page_schema($pagePath) {
    $settings = get_global_seo_settings();
    $cleanPath = ltrim(str_replace('\\', '/', $pagePath), '/');
    if (isset($settings['page_schemas'][$cleanPath])) {
        unset($settings['page_schemas'][$cleanPath]);
        return save_global_seo_settings($settings);
    }
    return true;
}

/**
 * Generate Smart Default Structured Data (JSON-LD) for a page
 */
function get_default_page_schema($pagePath = null, $pageTitle = null, $pageDesc = null, $pageUrl = null) {
    $settings = get_global_seo_settings();
    $baseUrl = !empty($settings['canonical_base']) ? rtrim($settings['canonical_base'], '/') : 'https://www.sssutms.ac.in';
    
    $cleanPath = ltrim(str_replace('\\', '/', $pagePath ?? 'index.php'), '/');
    $isHome = ($cleanPath === 'index.php' || empty($cleanPath));
    
    $fullUrl = !empty($pageUrl) ? $pageUrl : ($isHome ? $baseUrl : $baseUrl . '/' . $cleanPath);
    $title = !empty($pageTitle) ? $pageTitle : 'Sri Satya Sai University of Technology and Medical Sciences';
    $desc = !empty($pageDesc) ? $pageDesc : 'Official Portal of Sri Satya Sai University of Technology & Medical Sciences (SSSUTMS), Sehore (Bhopal, MP). Approved by UGC, AICTE, PCI, NCISM, INC, NCH.';

    $schema = [
        '@context' => 'https://schema.org',
        '@graph'   => [
            [
                '@type'           => 'EducationalOrganization',
                '@id'             => $baseUrl . '/#organization',
                'name'            => 'Sri Satya Sai University of Technology and Medical Sciences',
                'alternateName'   => 'SSSUTMS',
                'url'             => $baseUrl,
                'logo'            => [
                    '@type'      => 'ImageObject',
                    '@id'        => $baseUrl . '/#logo',
                    'url'        => $baseUrl . '/assets/images/logo/logo.jpg',
                    'caption'    => 'Sri Satya Sai University Logo'
                ],
                'address'         => [
                    '@type'           => 'PostalAddress',
                    'streetAddress'   => 'Opp. Oilfed Plant, Bhopal-Indore Road',
                    'addressLocality' => 'Sehore',
                    'addressRegion'   => 'Madhya Pradesh',
                    'postalCode'      => '466001',
                    'addressCountry'  => 'IN'
                ],
                'contactPoint'    => [
                    '@type'             => 'ContactPoint',
                    'telephone'         => '+91-7748900028',
                    'contactType'       => 'admissions',
                    'areaServed'        => 'IN',
                    'availableLanguage' => ['English', 'Hindi']
                ]
            ],
            [
                '@type'       => 'WebSite',
                '@id'         => $baseUrl . '/#website',
                'url'         => $baseUrl,
                'name'        => 'Sri Satya Sai University of Technology & Medical Sciences',
                'description' => 'Official website of Sri Satya Sai University of Technology and Medical Sciences, Sehore',
                'publisher'   => ['@id' => $baseUrl . '/#organization']
            ],
            [
                '@type'          => 'WebPage',
                '@id'            => $fullUrl . '/#webpage',
                'url'            => $fullUrl,
                'name'           => $title,
                'description'    => $desc,
                'isPartOf'       => ['@id' => $baseUrl . '/#website'],
                'breadcrumb'     => [
                    '@type'           => 'BreadcrumbList',
                    'itemListElement' => [
                        [
                            '@type'    => 'ListItem',
                            'position' => 1,
                            'name'     => 'Home',
                            'item'     => $baseUrl
                        ],
                        [
                            '@type'    => 'ListItem',
                            'position' => 2,
                            'name'     => $title,
                            'item'     => $fullUrl
                        ]
                    ]
                ]
            ]
        ]
    ];

    return json_encode($schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
}

/**
 * Resolve the final JSON-LD schema string to output on public pages
 */
function get_resolved_page_schema($explicitSchema = null, $pagePath = null) {
    // 1. If explicit schema string passed and is non-empty, clean and return
    if (!empty($explicitSchema)) {
        $clean = clean_schema_json($explicitSchema);
        if (!empty($clean)) {
            return $clean;
        }
    }

    // 2. Detect page path if null
    if ($pagePath === null) {
        if (!empty($_SERVER['SCRIPT_FILENAME']) && defined('BASE_DIR')) {
            $normScript = str_replace('\\', '/', realpath($_SERVER['SCRIPT_FILENAME']) ?: $_SERVER['SCRIPT_FILENAME']);
            $normBase = str_replace('\\', '/', realpath(BASE_DIR) ?: BASE_DIR);
            if (strpos($normScript, $normBase) === 0) {
                $pagePath = ltrim(substr($normScript, strlen($normBase)), '/');
            }
        }
        if (empty($pagePath)) {
            $script = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? $_SERVER['PHP_SELF'] ?? '');
            if (defined('BASE_URL') && BASE_URL !== '/' && strpos($script, BASE_URL) === 0) {
                $pagePath = ltrim(substr($script, strlen(BASE_URL)), '/');
            } else {
                $pagePath = ltrim(preg_replace('/^\/[^\/]+\//', '', $script), '/');
            }
        }
        if (empty($pagePath)) {
            $pagePath = 'index.php';
        }
    }

    // 3. Check custom schema from seo_indexing.json
    $customSchema = get_page_schema($pagePath);
    if (!empty($customSchema)) {
        return clean_schema_json($customSchema);
    }

    // 4. Return smart default schema
    return get_default_page_schema($pagePath);
}

