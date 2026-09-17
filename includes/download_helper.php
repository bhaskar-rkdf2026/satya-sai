<?php
/**
 * Sri Satya Sai University of Technology & Medical Sciences
 * Download & Curriculum Dynamic Helper
 * Manages all 52 Download tab pages seamlessly with live admin capabilities.
 */

if (!defined('BASE_URL')) {
    require_once __DIR__ . '/../config.php';
}

/**
 * Returns the full master catalog of all 52 download pages
 */
function get_download_catalog() {
    return [
        'Outcome Based Curriculum' => [
            'icon' => 'fa-graduation-cap',
            'badge' => 'OBC',
            'pages' => [
                'obc_Engineering'            => ['title' => 'Engineering', 'file' => 'Download/OutcomeBasedCurriculum/Engineering.php'],
                'obc_Pharma'                 => ['title' => 'Pharmacy', 'file' => 'Download/OutcomeBasedCurriculum/Pharma.php'],
                'obc_Education'              => ['title' => 'Education', 'file' => 'Download/OutcomeBasedCurriculum/Education.php'],
                'obc_Physical_Education'     => ['title' => 'Physical Education', 'file' => 'Download/OutcomeBasedCurriculum/Physical_Education.php'],
                'obc_Management'             => ['title' => 'Management', 'file' => 'Download/OutcomeBasedCurriculum/Management.php'],
                'obc_Computer_Application'   => ['title' => 'Computer Application', 'file' => 'Download/OutcomeBasedCurriculum/Computer_Application.php'],
                'obc_BHMCT'                  => ['title' => 'BHMCT', 'file' => 'Download/OutcomeBasedCurriculum/BHMCT.php'],
                'obc_Science'                => ['title' => 'Science', 'file' => 'Download/OutcomeBasedCurriculum/Science.php'],
                'obc_Life_Science'           => ['title' => 'Life Science', 'file' => 'Download/OutcomeBasedCurriculum/Life_Science.php'],
                'obc_Arts_And_Humanities'    => ['title' => 'Arts And Humanities', 'file' => 'Download/OutcomeBasedCurriculum/Arts_And_Humanities.php'],
                'obc_Commerce'               => ['title' => 'Commerce', 'file' => 'Download/OutcomeBasedCurriculum/Commerce.php'],
            ]
        ],
        'Curriculum Schemes' => [
            'icon' => 'fa-book-open',
            'badge' => 'Scheme',
            'pages' => [
                'scheme_BE'                      => ['title' => 'Bachelor of Engineering (B.E.)', 'file' => 'Download/Scheme/BE.php'],
                'scheme_Pharmacy'                => ['title' => 'Faculty of Pharmacy', 'file' => 'Download/Scheme/Pharmacy.php'],
                'scheme_MTech'                   => ['title' => 'Master of Technology (M.Tech.)', 'file' => 'Download/Scheme/MTech.php'],
                'scheme_BHMCT'                   => ['title' => 'BHMCT Scheme', 'file' => 'Download/Scheme/BHMCT.php'],
                'scheme_MBA'                     => ['title' => 'MBA Scheme', 'file' => 'Download/Scheme/MBA.php'],
                'scheme_MCA'                     => ['title' => 'MCA Scheme', 'file' => 'Download/Scheme/MCA.php'],
                'scheme_Education'               => ['title' => 'Faculty of Education', 'file' => 'Download/Scheme/Education.php'],
                'scheme_Physical_Education'      => ['title' => 'Physical Education Scheme', 'file' => 'Download/Scheme/Physical_Education.php'],
                'scheme_BScHonsAG'               => ['title' => 'B.Sc. (Hons.) Agriculture', 'file' => 'Download/Scheme/BScHonsAG.php'],
                'scheme_BHMS'                    => ['title' => 'BHMS Scheme', 'file' => 'Download/Scheme/BHMS.php'],
                'scheme_UTD'                     => ['title' => 'University Teaching Depts (UTD)', 'file' => 'Download/Scheme/UTD.php'],
                'scheme_Paramedical'             => ['title' => 'Faculty of Paramedical', 'file' => 'Download/Scheme/Paramedical.php'],
                'scheme_Polytechnic_Engineering' => ['title' => 'Polytechnic Engineering', 'file' => 'Download/Scheme/Polytechnic_Engineering.php'],
                'scheme_BLibISc'                 => ['title' => 'B.Lib.I.Sc. Scheme', 'file' => 'Download/Scheme/BLibISc.php'],
                'scheme_Bachelor_Of_Laws_Llb'    => ['title' => 'Bachelor of Laws (LL.B.)', 'file' => 'Download/Scheme/Bachelor_Of_Laws_Llb.php'],
                'scheme_BScHMCS'                 => ['title' => 'B.Sc. [HMCS] Scheme', 'file' => 'Download/Scheme/BScHMCS.php'],
            ]
        ],
        'Curriculum Syllabi' => [
            'icon' => 'fa-list-check',
            'badge' => 'Syllabus',
            'pages' => [
                'syllabus_BE'                      => ['title' => 'Bachelor of Engineering (B.E.) Syllabus', 'file' => 'Download/Syllabus/BE.php'],
                'syllabus_Pharmacy'                => ['title' => 'Faculty of Pharmacy Syllabus', 'file' => 'Download/Syllabus/Pharmacy.php'],
                'syllabus_MTech'                   => ['title' => 'Master of Technology (M.Tech.) Syllabus', 'file' => 'Download/Syllabus/MTech.php'],
                'syllabus_Education'               => ['title' => 'Faculty of Education Syllabus', 'file' => 'Download/Syllabus/Education.php'],
                'syllabus_BHMCT'                   => ['title' => 'BHMCT Syllabus', 'file' => 'Download/Syllabus/BHMCT.php'],
                'syllabus_MBA'                     => ['title' => 'MBA Syllabus', 'file' => 'Download/Syllabus/MBA.php'],
                'syllabus_MCA'                     => ['title' => 'MCA Syllabus', 'file' => 'Download/Syllabus/MCA.php'],
                'syllabus_PhysicalEducation'       => ['title' => 'Physical Education Syllabus', 'file' => 'Download/Syllabus/PhysicalEducation.php'],
                'syllabus_BScHonsAG'               => ['title' => 'B.Sc. (Hons.) Agriculture Syllabus', 'file' => 'Download/Syllabus/BScHonsAG.php'],
                'syllabus_BHMS'                    => ['title' => 'BHMS Syllabus', 'file' => 'Download/Syllabus/BHMS.php'],
                'syllabus_UTD'                     => ['title' => 'UTD Syllabus', 'file' => 'Download/Syllabus/UTD.php'],
                'syllabus_Paramedical'             => ['title' => 'Paramedical Syllabus', 'file' => 'Download/Syllabus/Paramedical.php'],
                'syllabus_Polytechnic_Engineering' => ['title' => 'Polytechnic Engineering Syllabus', 'file' => 'Download/Syllabus/Polytechnic_Engineering.php'],
                'syllabus_BLibISc'                 => ['title' => 'B.Lib.I.Sc. Syllabus', 'file' => 'Download/Syllabus/BLibISc.php'],
                'syllabus_Bacheloroflaws_Llb'      => ['title' => 'Bachelor of Laws (LL.B.) Syllabus', 'file' => 'Download/Syllabus/Bacheloroflaws_Llb.php'],
                'syllabus_BScHMCS'                 => ['title' => 'B.Sc. [HMCS] Syllabus', 'file' => 'Download/Syllabus/BScHMCS.php'],
            ]
        ],
        'Download Forms & Documents' => [
            'icon' => 'fa-file-pdf',
            'badge' => 'Docs',
            'pages' => [
                'doc_Forms'                    => ['title' => 'University Downloadable Forms', 'file' => 'Download/Forms.php'],
                'doc_NotificationOfPhdAward'   => ['title' => 'Notification Of Ph.D Award', 'file' => 'Download/NotificationOfPhdAward.php'],
                'doc_E-Content'                => ['title' => 'E-Content & Digital Learning', 'file' => 'Download/E-Content.php'],
                'doc_Alumni'                   => ['title' => 'Alumni Association Documents', 'file' => 'Download/Alumni.php'],
                'doc_RTI'                      => ['title' => 'Right To Information (RTI)', 'file' => 'Download/RTI.php'],
                'doc_Barrier_Free_Environment' => ['title' => 'Barrier Free Environment Policy', 'file' => 'Download/Barrier_Free_Environment.php'],
                'doc_EVENTS'                   => ['title' => 'Official Events Circulars', 'file' => 'Download/EVENTS.php'],
                'doc_Announcements'            => ['title' => 'University Announcements', 'file' => 'Download/Announcements.php'],
                'doc_NBADCS'                   => ['title' => 'NBA & DCS Compliance Reports', 'file' => 'Download/NBADCS.php'],
            ]
        ]
    ];
}

/**
 * Get dynamic page data, falling back to static default
 */
function get_download_page_data($pageKey, $defaultData = []) {
    $all = get_json_data('download_documents.json', []);
    if (isset($all[$pageKey]['data']) && !empty($all[$pageKey]['data'])) {
        return $all[$pageKey]['data'];
    }
    return $defaultData;
}

/**
 * Save dynamic page data
 */
function save_download_page_data($pageKey, $data, $title = '', $section = 'General') {
    $all = get_json_data('download_documents.json', []);
    if (!isset($all[$pageKey])) {
        $all[$pageKey] = [
            'title' => $title,
            'section' => $section,
            'updated_at' => date('Y-m-d H:i:s'),
            'data' => []
        ];
    }
    if (!empty($title)) $all[$pageKey]['title'] = $title;
    if (!empty($section)) $all[$pageKey]['section'] = $section;
    $all[$pageKey]['updated_at'] = date('Y-m-d H:i:s');
    $all[$pageKey]['data'] = $data;

    return save_json_data('download_documents.json', $all);
}

/**
 * Add / Edit an individual item inside a download page
 */
function save_download_page_item($pageKey, $itemData, $title = '', $section = 'General') {
    $all = get_json_data('download_documents.json', []);
    if (!isset($all[$pageKey])) {
        $all[$pageKey] = [
            'title' => $title,
            'section' => $section,
            'updated_at' => date('Y-m-d H:i:s'),
            'data' => []
        ];
    }

    if (!isset($itemData['id']) || empty($itemData['id'])) {
        $itemData['id'] = 'dl_' . time() . '_' . rand(100, 999);
    }

    $existingIndex = -1;
    if (is_array($all[$pageKey]['data'])) {
        foreach ($all[$pageKey]['data'] as $idx => $it) {
            if (isset($it['id']) && $it['id'] == $itemData['id']) {
                $existingIndex = $idx;
                break;
            }
        }
    } else {
        $all[$pageKey]['data'] = [];
    }

    if ($existingIndex >= 0) {
        $all[$pageKey]['data'][$existingIndex] = array_merge($all[$pageKey]['data'][$existingIndex], $itemData);
    } else {
        array_unshift($all[$pageKey]['data'], $itemData);
    }

    $all[$pageKey]['updated_at'] = date('Y-m-d H:i:s');
    return save_json_data('download_documents.json', $all);
}

/**
 * Delete an item from a download page
 */
function delete_download_page_item($pageKey, $itemId) {
    $all = get_json_data('download_documents.json', []);
    if (!isset($all[$pageKey]['data']) || !is_array($all[$pageKey]['data'])) {
        return false;
    }

    $found = false;
    foreach ($all[$pageKey]['data'] as $idx => $it) {
        if (isset($it['id']) && $it['id'] == $itemId) {
            unset($all[$pageKey]['data'][$idx]);
            $all[$pageKey]['data'] = array_values($all[$pageKey]['data']);
            $found = true;
            break;
        }
    }

    if ($found) {
        $all[$pageKey]['updated_at'] = date('Y-m-d H:i:s');
        save_json_data('download_documents.json', $all);
        return true;
    }
    return false;
}

/**
 * Get dynamic OBE page info (headings, badges, vision, mission)
 */
function get_obe_page_info($pageKey, $default = []) {
    $all = get_json_data('download_documents.json', []);
    return $all[$pageKey]['page_info'] ?? $default;
}

/**
 * Save dynamic OBE page info
 */
function save_obe_page_info($pageKey, $infoData) {
    $all = get_json_data('download_documents.json', []);
    if (!isset($all[$pageKey])) {
        $all[$pageKey] = [
            'title' => $infoData['banner_title'] ?? 'Engineering',
            'section' => 'Outcome Based Curriculum',
            'updated_at' => date('Y-m-d H:i:s'),
            'data' => []
        ];
    }
    $all[$pageKey]['page_info'] = array_merge($all[$pageKey]['page_info'] ?? [], $infoData);
    $all[$pageKey]['updated_at'] = date('Y-m-d H:i:s');
    return save_json_data('download_documents.json', $all);
}

/**
 * Get dynamic OBE curricula grouped by category
 */
function get_obe_curricula_grouped($pageKey, $defaultCurricula = []) {
    $dynamicDocs = get_download_page_data($pageKey, []);
    if (empty($dynamicDocs)) {
        return $defaultCurricula;
    }

    $grouped = [];
    foreach ($dynamicDocs as $dItem) {
        if (($dItem['status'] ?? 'Active') !== 'Active') continue;
        $cat = $dItem['category'] ?? 'General';
        if (!isset($grouped[$cat])) {
            $badge = $dItem['badge'] ?? '';
            $filter = $dItem['filter'] ?? '';
            if (empty($badge)) {
                if (stripos($cat, 'bachelor') !== false || stripos($cat, 'b.e') !== false) $badge = 'B.E.';
                elseif (stripos($cat, 'master') !== false || stripos($cat, 'm.tech') !== false) $badge = 'M.Tech.';
                elseif (stripos($cat, 'diploma') !== false) $badge = 'Diploma';
                else $badge = 'Course';
            }
            if (empty($filter)) {
                if (stripos($cat, 'bachelor') !== false || stripos($cat, 'b.e') !== false) $filter = 'be';
                elseif (stripos($cat, 'master') !== false || stripos($cat, 'm.tech') !== false) $filter = 'mtech';
                elseif (stripos($cat, 'diploma') !== false) $filter = 'diploma';
                else $filter = preg_replace('/[^a-z0-9]/', '', strtolower($cat));
            }

            $grouped[$cat] = [
                'category' => $cat,
                'badge' => $badge,
                'filter' => $filter,
                'items' => []
            ];
        }
        $grouped[$cat]['items'][] = [
            'id' => $dItem['id'] ?? '',
            'title' => $dItem['title'] ?? '',
            'file' => $dItem['file'] ?? '',
            'url' => $dItem['url'] ?? '',
            'status' => $dItem['status'] ?? 'Active',
            'date' => $dItem['date'] ?? ''
        ];
    }

    return array_values($grouped);
}

/**
 * Resolves a document/curriculum item to a working, verified URL.
 * Automatically handles local path lookups, URL encoding for spaces and special characters, and remote fallback.
 */
function get_document_download_url($item) {
    if (is_string($item)) {
        $item = ['url' => $item, 'file' => basename($item)];
    }

    $url = trim($item['url'] ?? '');
    $file = trim($item['file'] ?? '');

    // If url is empty but file contains a path, treat file as path
    if (empty($url) && !empty($file)) {
        if (strpos($file, '/') !== false || strpos($file, '\\') !== false) {
            $url = $file;
        }
    }

    if (empty($url) && empty($file)) {
        return '#';
    }

    if ($url === '#' || $file === '#') {
        return '#';
    }

    $baseDir = defined('BASE_DIR') ? BASE_DIR : realpath(__DIR__ . '/..');

    // 1. If explicit relative path provided in $url, check if it physically exists on disk
    if (!empty($url) && strpos($url, 'http') !== 0) {
        $relPath = ltrim(rawurldecode($url), '/\\');
        if (!empty($relPath) && file_exists($baseDir . '/' . $relPath)) {
            $segments = explode('/', str_replace('\\', '/', $relPath));
            return BASE_URL . implode('/', array_map('rawurlencode', $segments));
        }
    }

    // 2. If explicit path provided in $file, check if it physically exists on disk
    if (!empty($file) && strpos($file, 'http') !== 0) {
        $relPath = ltrim(rawurldecode($file), '/\\');
        if (!empty($relPath) && file_exists($baseDir . '/' . $relPath)) {
            $segments = explode('/', str_replace('\\', '/', $relPath));
            return BASE_URL . implode('/', array_map('rawurlencode', $segments));
        }
    }

    // 3. Search known local folders and subfolders by filename
    $searchFilename = !empty($file) ? basename(rawurldecode($file)) : basename(rawurldecode($url));
    if (!empty($searchFilename) && $searchFilename !== '#' && $searchFilename !== '.') {
        $possibleDirs = [
            'assets/images/Files/Link/SYLLABUS',
            'assets/images/Files/Link/SCHEME',
            'assets/images/Files/Link/Curriculum',
            'assets/images/Files/Link/ExamSchedules',
            'assets/images/Files/Link/Announcements',
            'assets/images/Files/Link',
            'assets/uploads/documents',
            'assets/uploads'
        ];

        foreach ($possibleDirs as $dir) {
            $testPath = $dir . '/' . $searchFilename;
            if (file_exists($baseDir . '/' . $testPath)) {
                $segments = explode('/', $testPath);
                return BASE_URL . implode('/', array_map('rawurlencode', $segments));
            }
        }
    }

    // 4. Fallback to external HTTP/HTTPS URL
    if (!empty($url) && strpos($url, 'http') === 0) {
        return $url;
    }

    // 5. Return formatted BASE_URL path if relative and non-empty
    if (!empty($url)) {
        $cleanUrl = ltrim(rawurldecode($url), '/\\');
        if (!empty($cleanUrl)) {
            $segments = explode('/', str_replace('\\', '/', $cleanUrl));
            return BASE_URL . implode('/', array_map('rawurlencode', $segments));
        }
    }

    return '#';
}

/**
 * Merge dynamic items into Outcome Based Curriculum array
 */
function get_dynamic_curricula($pageKey, $defaultCurricula = []) {
    $grouped = get_obe_curricula_grouped($pageKey, []);
    if (!empty($grouped)) {
        return $grouped;
    }
    return $defaultCurricula;
}

/**
 * Render dynamic scheme table if any active custom items exist
 */
function render_dynamic_scheme_table($pageKey) {
    $items = get_download_page_data($pageKey, []);
    if (empty($items)) return;

    // Filter only Active items
    $activeItems = array_filter($items, function($it) {
        return ($it['status'] ?? 'Active') === 'Active';
    });
    if (empty($activeItems)) return;
    ?>
    <div class="eng-table-wrapper mb-4" id="dynamic-documents-section">
      <div class="eng-section-header bg-warning bg-opacity-10 border-bottom border-warning border-opacity-25 d-flex justify-content-between align-items-center">
        <h5 class="eng-section-title text-dark mb-0">
          <i class="fa fa-bullhorn text-warning me-2"></i> Live Updates &amp; Dynamic Circulars (Session <?php echo htmlspecialchars(get_setting('admission_session', '2026-27')); ?>)
        </h5>
        <span class="eng-section-badge bg-primary text-white">Live Verified</span>
      </div>
      <div class="table-responsive">
        <table class="eng-table">
          <thead>
            <tr>
              <th style="width: 60px;" class="text-center">#</th>
              <th class="text-start">DOCUMENT / CURRICULUM TITLE</th>
              <th style="width: 220px;">CATEGORY / BRANCH</th>
              <th style="width: 150px;" class="text-center">ACTION</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $i = 1;
            foreach ($activeItems as $doc): 
              $fileUrl = $doc['url'] ?? $doc['file'] ?? '#';
              if (strpos($fileUrl, 'http') !== 0 && strpos($fileUrl, '/') !== 0) {
                  $fileUrl = BASE_URL . ltrim($fileUrl, '/');
              }
            ?>
              <tr>
                <td class="text-center fw-bold text-muted"><?php echo $i++; ?></td>
                <td>
                  <div class="fw-bold text-dark"><?php echo htmlspecialchars($doc['title']); ?></div>
                  <?php if (!empty($doc['date'])): ?>
                    <small class="text-muted"><i class="fa fa-calendar-day me-1"></i> <?php echo htmlspecialchars($doc['date']); ?></small>
                  <?php endif; ?>
                </td>
                <td>
                  <span class="fw-semibold text-secondary"><?php echo htmlspecialchars($doc['category'] ?? 'General'); ?></span>
                </td>
                <td class="text-center">
                  <a href="<?php echo htmlspecialchars($fileUrl); ?>" target="_blank" class="eng-download-btn">
                    <i class="fa fa-file-pdf"></i> Download PDF
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <?php
}
