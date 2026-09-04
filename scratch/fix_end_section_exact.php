<?php

$fpath = 'd:/xampp/htdocs/sssu/satya-sai/Academic/NAAC/CriteriaOne.php';
$content = file_get_contents($fpath);

$pattern = '/<p class="MsoNormal"[^>]*>.*?1\.3\.2.*?<\/div\s*>\s*<\/div\s*>/is';

$new_html = <<<HTML
<div class="naac-metric-box">
  <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
    <div class="d-flex align-items-start gap-3">
      <span class="naac-metric-badge">Metric 1.3.2</span>
      <div class="naac-metric-content">
        Number of value-added courses for imparting transferable and life skills offered during last five years.
      </div>
    </div>
    <div>
      <a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/VAC UP FINAL.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a>
    </div>
  </div>
</div>

<div class="naac-metric-box">
  <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
    <div class="d-flex align-items-start gap-3">
      <span class="naac-metric-badge">Metric 1.3.3</span>
      <div class="naac-metric-content">
        Department wise Enrolled Students list of Value Added courses
      </div>
    </div>
    <div>
      <a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/1.3.3.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a>
    </div>
  </div>
</div>

<div class="naac-metric-box">
  <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
    <div class="d-flex align-items-start gap-3">
      <span class="naac-metric-badge">Metric 1.3.4</span>
      <div class="naac-metric-content">
        Percentage of students undertaking field projects / research projects / internships (Data for the latest completed academic year).
      </div>
    </div>
    <div>
      <a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/1.3.4 COMBINED PDF.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a>
    </div>
  </div>
</div>

<div class="naac-metric-box">
  <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
    <div class="d-flex align-items-start gap-3">
      <span class="naac-metric-badge">Metric 1.3.4.1</span>
      <div class="naac-metric-content">
        Number of students undertaking field project or research projects or internships
      </div>
    </div>
    <div>
      <a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/1.3.4 comby.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a>
    </div>
  </div>
</div>

<div class="naac-metric-box">
  <div class="d-flex align-items-start gap-3 mb-3">
    <span class="naac-metric-badge">Metric 1.4.1 & 1.4.2</span>
    <div class="naac-metric-content fw-bold">
      Structured feedback for design and review of syllabus &ndash; semester-wise / year-wise is received from: 1) Students, 2) Teachers, 3) Employers, 4) Alumni, 5) Professional
    </div>
  </div>
  
  <div class="row g-3 mt-1">
    <div class="col-md-6">
      <div class="p-3 bg-white border rounded-3 d-flex align-items-center justify-content-between gap-2 shadow-sm">
        <span class="fw-semibold text-dark fs-6">Action Taken Report</span>
        <a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/SCHEME2021/feedback reports Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a>
      </div>
    </div>
    <div class="col-md-6">
      <div class="p-3 bg-white border rounded-3 d-flex align-items-center justify-content-between gap-2 shadow-sm">
        <span class="fw-semibold text-dark fs-6">1.4.1.a Sample Feedback from Stakeholders</span>
        <a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/1.4.1.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a>
      </div>
    </div>
    <div class="col-md-6">
      <div class="p-3 bg-white border rounded-3 d-flex align-items-center justify-content-between gap-2 shadow-sm">
        <span class="fw-semibold text-dark fs-6">1.4.2.b Feedback Process of the Institutes</span>
        <a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/1.4.2.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a>
      </div>
    </div>
    <div class="col-md-6">
      <div class="p-3 bg-white border rounded-3 d-flex align-items-center justify-content-between gap-2 shadow-sm">
        <span class="fw-semibold text-dark fs-6">1.4.3 Applications Received Data</span>
        <a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/2021-22 students list application received.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a>
      </div>
    </div>
  </div>
</div>
HTML;

$content = preg_replace($pattern, $new_html, $content);
file_put_contents($fpath, $content);
echo "Replaced end metrics section in CriteriaOne.php successfully!\n";

