<?php
$baseDir = "d:/xampp/htdocs/sssu/satya-sai/assets/images/Files/Link/";

$urls = [
    // Criteria 1
    "IQAC/NAAC/Criteria 1/AC FINAL.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria%201/AC%20FINAL.pdf",
    "IQAC/NAAC/Criteria 1/BOM FINAL.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria%201/BOM%20FINAL.pdf",
    "IQAC/NAAC/Criteria 1/VAC UP FINAL.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria%201/VAC%20UP%20FINAL.pdf",
    "IQAC/NAAC/Criteria 1/1.3.4 COMBINED PDF.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria%201/1.3.4%20COMBINED%20PDF.pdf",
    "SCHEME2021/feedback reports  Combine.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/SCHEME2021/feedback%20reports%20%20Combine.pdf",
    "IQAC/NAAC/Criteria 1/AERONAUTICAL/AREO SY- Combine FINAL.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria%201/AERONAUTICAL/AREO%20SY-%20Combine%20FINAL.pdf",
    "IQAC/NAAC/Criteria 1/CHEMICAL/CHEMICAL SY Combine.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria%201/CHEMICAL/CHEMICAL%20SY%20Combine.pdf",
    "IQAC/NAAC/Criteria 1/CIVIL/CIVIL SY Combine.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria%201/CIVIL/CIVIL%20SY%20Combine.pdf",
    "IQAC/NAAC/Criteria 1/CS/cse syllabus updated file.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria%201/CS/cse%20syllabus%20updated%20file.pdf",
    "IQAC/NAAC/Criteria 1/EX/EX SY Combine.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria%201/EX/EX%20SY%20Combine.pdf",
    "IQAC/NAAC/Criteria 1/EE/EE SY Combine.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria%201/EE/EE%20SY%20Combine.pdf",
    "IQAC/NAAC/Criteria 1/EC/EC SY-Combine.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria%201/EC/EC%20SY-Combine.pdf",
    "IQAC/NAAC/Criteria 1/EI/SY EI-Combine.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria%201/EI/SY%20EI-Combine.pdf",
    "IQAC/NAAC/syllabus/IT/IT SY-Combine.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/syllabus/IT/IT%20SY-Combine.pdf",
    "IQAC/NAAC/Criteria 1/MECHANICAL/FINAL MECHANICAL -color-Combine.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria%201/MECHANICAL/FINAL%20MECHANICAL%20-color-Combine.pdf",
    "IQAC/NAAC/Criteria 1/MINING/MINING SY-Combine.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria%201/MINING/MINING%20SY-Combine.pdf",
    "IQAC/NAAC/Criteria 1/PHARMACY/PHARMACY-SY Combine.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria%201/PHARMACY/PHARMACY-SY%20Combine.pdf",
    "IQAC/NAAC/Criteria 1/BBA-MBA/BBA MBA SY-Combine.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria%201/BBA-MBA/BBA%20MBA%20SY-Combine.pdf",
    "IQAC/NAAC/Criteria 1/LLB/LLB SY-Combine.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria%201/LLB/LLB%20SY-Combine.pdf",
    "IQAC/NAAC/Criteria 1/ARTS/ARTS SY- Combine (1) - Copy.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria%201/ARTS/ARTS%20SY-%20Combine%20%281%29%20-%20Copy.pdf",
    "IQAC/NAAC/Criteria 1/SCIENCE/SCIENCE NEW- SY Combine.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria%201/SCIENCE/SCIENCE%20NEW-%20SY%20Combine.pdf",
    "IQAC/NAAC/Criteria 1/COMMERCE/edited pdf commerce.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria%201/COMMERCE/edited%20pdf%20commerce.pdf",
    "IQAC/NAAC/Criteria 1/BA-BeD/BA BED SY-Combine.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria%201/BA-BeD/BA%20BED%20SY-Combine.pdf",
    "IQAC/NAAC/Criteria 1/BPeD/bped syllabus final (2).pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria%201/BPeD/bped%20syllabus%20final%20%282%29.pdf",
    "IQAC/NAAC/Criteria 1/COMPUTER APPLICATION/mca Combine.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria%201/COMPUTER%20APPLICATION/mca%20Combine.pdf",
    "IQAC/NAAC/Criteria 1/HOTEL MANAGEMENT/SY-Combine final f1.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria%201/HOTEL%20MANAGEMENT/SY-Combine%20final%20f1.pdf",
    "IQAC/NAAC/syllabus/BHMS/BHMS SY Combine.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/syllabus/BHMS/BHMS%20SY%20Combine.pdf",
    "IQAC/NAAC/syllabus/AGRICULTURE/SY-Combine.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/syllabus/AGRICULTURE/SY-Combine.pdf",
    "IQAC/NAAC/Criteria 1/AYURVEDA/Ayurveda SY Combine.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria%201/AYURVEDA/Ayurveda%20SY%20Combine.pdf",
    "IQAC/NAAC/Criteria 1/NURSING/NURSING-SY Combine CORRECT.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria%201/NURSING/NURSING-SY%20Combine%20CORRECT.pdf",
    "IQAC/NAAC/Criteria 1/PARAMEDICAL/para syllabus combine final - Copy.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria%201/PARAMEDICAL/para%20syllabus%20combine%20final%20-%20Copy.pdf",

    // Criteria 2
    "IQAC/NAAC/Criteria 2/combined 2.2.1 final.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria%202/combined%202.2.1%20final.pdf",
    "IQAC/NAAC/Criteria 2/combined 2.3.1 final.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria%202/combined%202.3.1%20final.pdf",
    "IQAC/NAAC/Criteria 2/combined 2.3.2 final.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria%202/combined%202.3.2%20final.pdf",
    "IQAC/NAAC/Criteria 2/combined 2.3.3 final.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria%202/combined%202.3.3%20final.pdf",

    // Criteria 3
    "IQAC/NAAC/Criteria 3/3.1 research Policies and Regulations.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/3.1%20research%20Policies%20and%20Regulations.pdf",
    "IQAC/NAAC/Criteria 3/3.1.2 additional uploading.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria%203/3.1.2%20additional%20uploading.pdf",
    "IQAC/NAAC/Criteria 3/3.1.3 additional uploading final.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria%203/3.1.3%20additional%20uploading%20final.pdf",
    "IQAC/NAAC/Criteria 3/3.2.1.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria%203/3.2.1.pdf",
    "IQAC/NAAC/Criteria 3/MODERN.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/MODERN.pdf",
    "IQAC/NAAC/Criteria 3/solar.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/solar.pdf",
    "IQAC/NAAC/Criteria 3/icasea 17.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/icasea%2017.pdf",
    "IQAC/NAAC/Criteria 3/Activity_Report_IPR_17022023_1145.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/Activity_Report_IPR_17022023_1145.pdf",
    "IQAC/NAAC/Criteria 3/Commonly neglected cleaning areas in Hotel Guest Room.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Commonly%20neglected%20cleaning%20areas%20in%20Hotel%20Guest%20Room%E2%80%9D.pdf",
    "IQAC/NAAC/Criteria 3/Guidelines_on_Consultancy_and_Testing_Projects final.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria%203/Guidelines_on_Consultancy_and_Testing_Projects%20final.pdf",
    "IQAC/NAAC/Criteria 3/BLOOD_DONATION_17022023_1148.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/BLOOD_DONATION_(4)_(1)_17022023_1148.pdf",
    "IQAC/NAAC/Criteria 3/Commonly Neglected Cleaning Areas in Hotel Guest Rooms.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Commonly%20Neglected%20Cleaning%20Areas%20in%20Hotel%20Guest%20Rooms.pdf",

    // Criteria 4
    "IQAC/NAAC/Criteria 4/sssutms.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria%204/sssutms.pdf",
    "IQAC/NAAC/Criteria 4/Criteria 4sports activ.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria%204sports%20activ.pdf",
    "IQAC/NAAC/Criteria 4/4.1.3.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria%204/4.1.2/4.1.3.pdf",
    "IQAC/NAAC/Criteria 4/LIBRARY AS A LEARNING RESOURESE.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria%204/LIBRARY%20AS%20A%20LEARNING%20RESOURESE.pdf",
    "IQAC/NAAC/Criteria 4/Criteria 4.3.1.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria%204/Criteria%204.3.1.pdf",

    // Criteria 5
    "IQAC/NAAC/Criteria 5/5.2.1 Score Card.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria%205/5.2.1%20Score%20Card.pdf",
    "IQAC/NAAC/Criteria 5/5.2.2.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria%205/5.2.2.pdf",
    "IQAC/NAAC/Criteria 5/5.2.2 offerlatter.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria%205/5.2.2%20offerlatter%20.pdf",
    "IQAC/NAAC/Criteria 5/5.2.3.pdf" => "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/NAAC/Criteria%205/5.2.3.pdf"
];

foreach ($urls as $rel => $url) {
    $target = $baseDir . $rel;
    $dir = dirname($target);
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }

    if (file_exists($target) && filesize($target) > 500) {
        echo "EXISTS: $rel (" . filesize($target) . " bytes)\n";
        continue;
    }

    echo "Fetching: $rel ...\n";
    $ch = curl_init($url);
    $fp = fopen($target, 'wb');
    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64)");
    curl_setopt($ch, CURLOPT_TIMEOUT, 300);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    $success = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    fclose($fp);

    if ($success && $httpCode >= 200 && $httpCode < 300 && filesize($target) > 500) {
        echo "SUCCESS: $rel (" . filesize($target) . " bytes)\n";
    } else {
        echo "FAILED: $rel (HTTP $httpCode, Size: " . filesize($target) . " bytes)\n";
        if (filesize($target) < 500) {
            @unlink($target);
        }
    }
}
echo "ALL DONE!\n";
