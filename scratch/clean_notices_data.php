<?php
$data = json_decode(file_get_contents('data/admission_data.json'), true);
$notices = $data['AdmissionNotice']['notices'] ?? [];

$cleanedNotices = [];
foreach ($notices as $idx => $n) {
    $title = $n['title'];
    $url = $n['url'];
    
    // Fix known empty or broken titles from live web
    if (strpos($url, 'imp_notice_16032026') !== false) {
        $title = 'आवश्यक सुचना - Important Admission Notice (2026-27)';
    } elseif (strpos($url, '03_01082025_0411') !== false) {
        $title = 'प्रवेश अधिसूचना 03 (Session 2025-26)';
    } elseif (strpos($url, 'Adobe_Scan_21_Jul_2026') !== false) {
        $title = 'Enrollment Form Open Notification (Session 2026-27)';
    } elseif (strpos($url, 'Notifica.pdf') !== false) {
        $title = 'Notification (Student Registration & Enrollment)';
    } elseif (strpos($url, 'TapScanner_08-21-2024') !== false) {
        $title = 'प्रवेश अधिसूचना - 3 (Session 2024-25)';
    } elseif (strpos($url, 'TapScanner') !== false) {
        $title = 'Admission Notification (2024-25)';
    } elseif (strpos($url, 'Notices/Entrance_20_21') !== false || strpos($url, 'Admission/Entrance_20_21') !== false) {
        $title = 'Notification for Entrance Examination (2020-21)';
    } elseif (empty(trim(str_replace('&nbsp;', '', $title)))) {
        $title = 'University Admission Notification ' . ($idx + 1);
    }
    
    // Clean html entities and extra spaces
    $title = html_entity_decode($title, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $title = str_replace(["\xc2\xa0", "\u{00a0}", "&nbsp;"], ' ', $title);
    $title = trim(preg_replace('/\s+/', ' ', $title));
    
    // Detect session
    $session = 'Archived';
    if (strpos($title, '2026-27') !== false || strpos($title, '2026') !== false) {
        $session = '2026-27';
    } elseif (strpos($title, '2025-26') !== false || strpos($title, '2025') !== false) {
        $session = '2025-26';
    } elseif (strpos($title, '2024-25') !== false || strpos($title, '2024') !== false) {
        $session = '2024-25';
    } elseif (strpos($title, '2023-24') !== false || strpos($title, '2023') !== false) {
        $session = '2023-24';
    } elseif (strpos($title, '2022-23') !== false || strpos($title, '2022') !== false) {
        $session = '2022-23';
    } elseif (strpos($title, '2021-22') !== false || strpos($title, '2021') !== false) {
        $session = '2021-22';
    } elseif (strpos($title, 'Paramedical') !== false) {
        $session = 'Paramedical';
    }
    
    $isNew = ($session === '2026-27' || $idx < 5);
    
    $cleanedNotices[] = [
        'id' => $n['id'] ?? (2000 + $idx),
        'title' => $title,
        'url' => $url,
        'date' => $n['date'] ?? '2026-07-21',
        'is_new' => $isNew,
        'session' => $session,
        'category' => (strpos($title, 'Paramedical') !== false ? 'Paramedical' : (strpos($title, 'Entrance') !== false ? 'Entrance Exam' : 'Admission'))
    ];
}

$data['AdmissionNotice']['notices'] = $cleanedNotices;
file_put_contents('data/admission_data.json', json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
echo "Successfully cleaned all " . count($cleanedNotices) . " notices!\n";
foreach (array_slice($cleanedNotices, 0, 10) as $i => $cn) {
    echo ($i+1) . ". [{$cn['session']}] {$cn['title']}\n";
}
