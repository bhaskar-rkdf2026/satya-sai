<?php
// Smart synchronization script between UI-Change-Ayush and main

$files_to_sync = [
    // Examination
    'Examination/Announcements.php',
    'Examination/EVENTS.php',
    'Examination/EntranceExamAlert.php',
    'Examination/ExamNotifications.php',
    'Examination/ExamSchedule.php',
    'Examination/Examinations/Interface.php',
    'Examination/Interface.php',
    'Examination/Results.php',

    // Research
    'Research/CollaborationandMou.php',
    'Research/ConsultancyServices.php',
    'Research/CouncilForResearch.php',
    'Research/Director_Research_And_Development.php',
    'Research/E-Resources.php',
    'Research/EVENTS.php',
    'Research/Exposition.php',
    'Research/Iic_Cell.php',
    'Research/NIRF.php',
    'Research/NPTEL.php',
    'Research/Patents.php',
    'Research/RAndDCell.php',
    'Research/ResearchPromotionPolicy.php',
    'Research/UGAndPGScholarsProject.php',

    // Admission (sync non-conflicting ones, keep our upgraded ones if they are superior)
    'Admission/AdmissionRegistration.php',
    'Admission/Admission_Enquiry.php',
    'Admission/Admissions/FeesStructure.php',
    'Admission/Announcements.php',
    'Admission/EVENTS.php',
    'Admission/UniversityAccountDetail.php',

    // Academic
    'Academic/AcademicCalendar.php',
    'Academic/Activities/EVENTS-2.php',
    'Academic/EVENTS.php',
    'Academic/NAAC/CriteriaFive.php',
    'Academic/PHD.php',

    // Download (all 52 files)
    'Download/Alumni.php',
    'Download/Announcements.php',
    'Download/Barrier_Free_Environment.php',
    'Download/E-Content.php',
    'Download/EVENTS.php',
    'Download/Forms.php',
    'Download/NBADCS.php',
    'Download/NotificationOfPhdAward.php',
    'Download/OutcomeBasedCurriculum/Arts_And_Humanities.php',
    'Download/OutcomeBasedCurriculum/BHMCT.php',
    'Download/OutcomeBasedCurriculum/Commerce.php',
    'Download/OutcomeBasedCurriculum/Computer_Application.php',
    'Download/OutcomeBasedCurriculum/Education.php',
    'Download/OutcomeBasedCurriculum/Engineering.php',
    'Download/OutcomeBasedCurriculum/Life_Science.php',
    'Download/OutcomeBasedCurriculum/Management.php',
    'Download/OutcomeBasedCurriculum/Pharma.php',
    'Download/OutcomeBasedCurriculum/Physical_Education.php',
    'Download/OutcomeBasedCurriculum/Science.php',
    'Download/RTI.php',
    'Download/Scheme/BE.php',
    'Download/Scheme/BHMCT.php',
    'Download/Scheme/BHMS.php',
    'Download/Scheme/BLibISc.php',
    'Download/Scheme/BScHMCS.php',
    'Download/Scheme/BScHonsAG.php',
    'Download/Scheme/Bachelor_Of_Laws_Llb.php',
    'Download/Scheme/Education.php',
    'Download/Scheme/MBA.php',
    'Download/Scheme/MCA.php',
    'Download/Scheme/MTech.php',
    'Download/Scheme/Paramedical.php',
    'Download/Scheme/Pharmacy.php',
    'Download/Scheme/Physical_Education.php',
    'Download/Scheme/Polytechnic_Engineering.php',
    'Download/Scheme/UTD.php',
    'Download/Syllabus/BE.php',
    'Download/Syllabus/BHMCT.php',
    'Download/Syllabus/BHMS.php',
    'Download/Syllabus/BLibISc.php',
    'Download/Syllabus/BScHMCS.php',
    'Download/Syllabus/BScHonsAG.php',
    'Download/Syllabus/Bacheloroflaws_Llb.php',
    'Download/Syllabus/Education.php',
    'Download/Syllabus/MBA.php',
    'Download/Syllabus/MCA.php',
    'Download/Syllabus/MTech.php',
    'Download/Syllabus/Paramedical.php',
    'Download/Syllabus/Pharmacy.php',
    'Download/Syllabus/PhysicalEducation.php',
    'Download/Syllabus/Polytechnic_Engineering.php',
    'Download/Syllabus/UTD.php',

    // Galleries
    'Galleries/ImageGallery/1.php',
    'Galleries/ImageGallery/2.php',
    'Galleries/ImageGallery/3.php',
    'Galleries/ImageGallery/4.php',
    'Galleries/ImageGallery/6.php',
    'gallery.php',

    // Root & Misc
    'About/EVENTS.php',
    'Announcements.php',
    'Career/index.php',
    'EVENTS.php',
    'about.php',
    'contact.php',
];

$root = dirname(__DIR__);
$synced_count = 0;

foreach ($files_to_sync as $rel_path) {
    $target_file = $root . '/' . str_replace('/', DIRECTORY_SEPARATOR, $rel_path);
    $dir = dirname($target_file);
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }

    // Fetch content from origin/UI-Change-Ayush
    $cmd = "git show origin/UI-Change-Ayush:\"$rel_path\"";
    $content = shell_exec($cmd);

    if ($content !== null && strlen($content) > 0) {
        // Strip UTF-8 BOM if present at the beginning
        $content = preg_replace('/^\xEF\xBB\xBF/', '', $content);
        
        file_put_contents($target_file, $content);
        echo "✓ Synced: $rel_path (" . strlen($content) . " bytes)\n";
        $synced_count++;
    } else {
        echo "✗ Failed to fetch: $rel_path\n";
    }
}

echo "\n============================================\n";
echo "Total files synced successfully: $synced_count / " . count($files_to_sync) . "\n";
