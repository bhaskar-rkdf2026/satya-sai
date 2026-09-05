<?php
$page_title   = 'University Teaching Departments (UTD) - Curriculum Scheme - SSSUTMS';
$banner_title = 'University Teaching Departments (UTD)';
$banner_category = 'Curriculum Scheme';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/scheme_helper.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';

$BASE = 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/';

$groups = [
  [
    'title' => 'B.A. — Bachelor of Arts (NEP 2020)',
    'icon'  => 'fa-book-open',
    'items' => [
      ['name' => 'First Semester',   'badge' => 'NEP', 'desc' => 'B.A. Semester I Scheme',   'url' => $BASE . 'SCHEMES/UTD2023/SCHEME%20BA%201SEM.pdf'],
      ['name' => 'Second Semester',  'badge' => 'NEP', 'desc' => 'B.A. Semester II Scheme',  'url' => $BASE . 'SCHEMES/UTD2023/2nd%20sem/BA%20NEP%202nd%20sem.pdf'],
      ['name' => 'Third Semester',   'badge' => 'NEP', 'desc' => 'B.A. Semester III Scheme', 'url' => $BASE . 'SCHEME/3%20SEM%20NEP%202024/B%20A%203rd%20sem.pdf'],
      ['name' => 'Fourth Semester',  'badge' => 'NEP', 'desc' => 'B.A. Semester IV Scheme',  'url' => $BASE . 'scheme2022/SCHEME%20%282%29%20BA%20IV%20sem%20%281%29%20new.pdf'],
      ['name' => 'Fifth Semester',   'badge' => 'NEP', 'desc' => 'B.A. Semester V Scheme',   'url' => $BASE . 'SCHEMES/SCHEME%20%20ba%20v%20sem%202024%20%20UPDATE%20%282%29.pdf'],
      ['name' => 'Sixth Semester',   'badge' => 'NEP', 'desc' => 'B.A. Semester VI Scheme',  'url' => $BASE . 'BA_VI_Semester_SchemeUP_04072025_0258.pdf'],
    ]
  ],
  [
    'title' => 'B.B.A. — Bachelor of Business Administration (NEP 2020)',
    'icon'  => 'fa-briefcase',
    'items' => [
      ['name' => 'First Semester',   'badge' => 'NEP', 'desc' => 'B.B.A. Semester I Scheme',   'url' => $BASE . 'BBA_I__SEMESTER_SCHEME_18072025_0212.pdf'],
      ['name' => 'Second Semester',  'badge' => 'NEP', 'desc' => 'B.B.A. Semester II Scheme',  'url' => $BASE . 'BBA_II_SEMESTER_SCHEME_18072025_0212.pdf'],
      ['name' => 'Third Semester',   'badge' => 'NEP', 'desc' => 'B.B.A. Semester III Scheme', 'url' => $BASE . 'BBA_3__Semester_Scheme_11112025_1219.pdf'],
      ['name' => 'Fourth Semester',  'badge' => 'NEP', 'desc' => 'B.B.A. Semester IV Scheme',  'url' => $BASE . 'BBA_4_Semester_Scheme_11112025_1219.pdf'],
      ['name' => 'Fifth Semester',   'badge' => 'NEP', 'desc' => 'B.B.A. Semester V Scheme',   'url' => $BASE . 'SCHEMES/BBA%20V%20Semester%20Scheme.pdf'],
      ['name' => 'Sixth Semester',   'badge' => 'NEP', 'desc' => 'B.B.A. Semester VI Scheme',  'url' => $BASE . 'SCHEME/6%20sem%20NEP/BBA%20VI%20Semester%20Scheme.pdf'],
    ]
  ],
  [
    'title' => 'B.C.A. — Bachelor of Computer Applications (NEP 2020)',
    'icon'  => 'fa-laptop-code',
    'items' => [
      ['name' => 'First Semester',   'badge' => 'NEP', 'desc' => 'B.C.A. Semester I Scheme',   'url' => $BASE . 'SCHEMES/UTD2023/BCA%20Scheme%20I.pdf'],
      ['name' => 'Second Semester',  'badge' => 'NEP', 'desc' => 'B.C.A. Semester II Scheme',  'url' => $BASE . 'SCHEMES/UTD2023/2nd%20sem/BCA%20Scheme%20II%20NEP.pdf'],
      ['name' => 'Third Semester',   'badge' => 'NEP', 'desc' => 'B.C.A. Semester III Scheme', 'url' => $BASE . 'BCA_3_Semester_Scheme_11112025_1101.pdf'],
      ['name' => 'Fourth Semester',  'badge' => 'NEP', 'desc' => 'B.C.A. Semester IV Scheme',  'url' => $BASE . 'BCA__4_Semester_Scheme_11112025_1101.pdf'],
      ['name' => 'Fifth Semester',   'badge' => 'NEP', 'desc' => 'B.C.A. Semester V Scheme',   'url' => $BASE . 'SCHEMES/BCA%20SCHEME%20%205th.pdf'],
      ['name' => 'Sixth Semester',   'badge' => 'NEP', 'desc' => 'B.C.A. Semester VI Scheme',  'url' => $BASE . 'SCHEME/6%20sem%20NEP/BCA%20SCHEME%20%206TH.pdf'],
    ]
  ],
  [
    'title' => 'B.Com. — Bachelor of Commerce (NEP 2020)',
    'icon'  => 'fa-chart-line',
    'items' => [
      ['name' => 'First Semester',   'badge' => 'NEP', 'desc' => 'B.Com. Semester I Scheme',   'url' => $BASE . 'SCHEMES/UTD2023/B.COM%20IST%20SEM%202022-23%20%281%29.pdf'],
      ['name' => 'Second Semester',  'badge' => 'NEP', 'desc' => 'B.Com. Semester II Scheme',  'url' => $BASE . 'SCHEMES/UTD2023/2nd%20sem/B.COM%202%20ND%20SEM%20SCHEME.pdf'],
      ['name' => 'Third Semester',   'badge' => 'NEP', 'desc' => 'B.Com. Semester III Scheme', 'url' => $BASE . 'SCHEMES/UTD2023/3%20sem/BCom%20III%20SEMESTER%20Scheme%20NEP%20Final%20%281%29.pdf'],
      ['name' => 'Fourth Semester',  'badge' => 'NEP', 'desc' => 'B.Com. Semester IV Scheme',  'url' => $BASE . 'SCHEMES/B.com%20IV%20Semester%20scheme%20NEP%202024.pdf'],
      ['name' => 'Fifth Semester',   'badge' => 'NEP', 'desc' => 'B.Com. Semester V Scheme',   'url' => $BASE . 'SCHEMES/B.COM%20VTH%20TH%20SEM%20SCHEME%20NEP%202024.pdf'],
      ['name' => 'Sixth Semester',   'badge' => 'NEP', 'desc' => 'B.Com. Semester VI Scheme',  'url' => $BASE . 'SCHEME/6%20sem%20NEP/B.COM%20VI%20TH%20SEM%20SCHEME%20NEP.pdf'],
    ]
  ],
  [
    'title' => 'B.Sc. — Bachelor of Science (NEP 2020)',
    'icon'  => 'fa-flask-vial',
    'items' => [
      ['name' => 'First Semester',   'badge' => 'NEP', 'desc' => 'B.Sc. Semester I Scheme',   'url' => $BASE . 'SCHEMES/UTD2023/BSC%20I%20SEM%20NEP%2022-23.pdf'],
      ['name' => 'Second Semester',  'badge' => 'NEP', 'desc' => 'B.Sc. Semester II Scheme',  'url' => $BASE . 'SCHEMES/UTD2023/2nd%20sem/BSC%20II%20SEM%20NEP%20SCHEME.pdf'],
      ['name' => 'Third Semester',   'badge' => 'NEP', 'desc' => 'B.Sc. Semester III Scheme', 'url' => $BASE . 'SCHEMES/UTD2023/3%20sem/NEW%20BSC%20III%20SEM%20SCHEME.pdf'],
      ['name' => 'Fourth Semester',  'badge' => 'NEP', 'desc' => 'B.Sc. Semester IV Scheme',  'url' => $BASE . 'SCHEMES/UTD2023/4%20TH%20SEM/NEW%20BSC%20%20IV%20SEM%20SCHEME.pdf'],
      ['name' => 'Fifth Semester',   'badge' => 'NEP', 'desc' => 'B.Sc. Semester V Scheme',   'url' => $BASE . 'SCHEMES/BSC%20NEP%205th%20SEM%20SCHEME.pdf'],
      ['name' => 'Sixth Semester',   'badge' => 'NEP', 'desc' => 'B.Sc. Semester VI Scheme',  'url' => $BASE . 'SCHEME/6%20sem%20NEP/BSC%20NEP%206th%20SEM%20SCHEME.pdf'],
    ]
  ],
  [
    'title' => 'M.Sc. Programmes (Master of Science)',
    'icon'  => 'fa-atom',
    'items' => [
      ['name' => 'M.Sc. Mathematics (Sem I)',       'badge' => 'M.Sc.', 'desc' => 'M.Sc. Mathematics Semester I Scheme',       'url' => $BASE . 'SCHEME/M.SC%202023/M.Sc%20Mathematics%20Scheme%20%28I%29%20Semester.pdf'],
      ['name' => 'M.Sc. Mathematics (Sem II)',      'badge' => 'M.Sc.', 'desc' => 'M.Sc. Mathematics Semester II Scheme',      'url' => $BASE . 'SCHEME/M.SC%202023/M.Sc%20Mathematics%20Scheme%20%28II%29%20Semester.pdf'],
      ['name' => 'M.Sc. Mathematics (Sem III)',     'badge' => 'M.Sc.', 'desc' => 'M.Sc. Mathematics Semester III Scheme',     'url' => $BASE . 'SCHEME/M.SC%202023/M.Sc%20Mathematics%20Scheme%20%28III%29%20Semester.pdf'],
      ['name' => 'M.Sc. Mathematics (Sem IV)',      'badge' => 'M.Sc.', 'desc' => 'M.Sc. Mathematics Semester IV Scheme',      'url' => $BASE . 'SCHEME/M.SC%202023/M.Sc%20Mathematics%20Scheme%20%28IV%29%20Semester.pdf'],
      ['name' => 'M.Sc. Botany (Sem I)',            'badge' => 'M.Sc.', 'desc' => 'M.Sc. Botany Semester I Scheme',            'url' => $BASE . 'SCHEME/M.SC%202023/BOTANY/BOTANY%20SCHEME%201.pdf'],
      ['name' => 'M.Sc. Botany (Sem II)',           'badge' => 'M.Sc.', 'desc' => 'M.Sc. Botany Semester II Scheme',           'url' => $BASE . 'SCHEME/M.SC%202023/BOTANY/BOTANY%20SCHEME%202.pdf'],
      ['name' => 'M.Sc. Botany (Sem III)',          'badge' => 'M.Sc.', 'desc' => 'M.Sc. Botany Semester III Scheme',          'url' => $BASE . 'SCHEME//M.SC%202023/BOTANY/BOTANY%20SCHEME%203.pdf'],
      ['name' => 'M.Sc. Botany (Sem IV)',           'badge' => 'M.Sc.', 'desc' => 'M.Sc. Botany Semester IV Scheme',           'url' => $BASE . 'SCHEME/M.SC%202023/BOTANY/BOTANY%20SCHEME%204.pdf'],
      ['name' => 'M.Sc. Microbiology (Sem I)',      'badge' => 'M.Sc.', 'desc' => 'M.Sc. Microbiology Semester I Scheme',      'url' => $BASE . 'SCHEME/M.SC%202023/MICROBIOLOGY/SCHEME%20MICROBIOLOGY1.pdf'],
      ['name' => 'M.Sc. Microbiology (Sem II)',     'badge' => 'M.Sc.', 'desc' => 'M.Sc. Microbiology Semester II Scheme',     'url' => $BASE . 'SCHEME/M.SC%202023/MICROBIOLOGY/SCHEME%20MICROBIOLOGY2.pdf'],
      ['name' => 'M.Sc. Microbiology (Sem III)',    'badge' => 'M.Sc.', 'desc' => 'M.Sc. Microbiology Semester III Scheme',    'url' => $BASE . 'SCHEME/M.SC%202023/MICROBIOLOGY/SCHEME%20MICROBIOLOGY3.pdf'],
      ['name' => 'M.Sc. Microbiology (Sem IV)',     'badge' => 'M.Sc.', 'desc' => 'M.Sc. Microbiology Semester IV Scheme',     'url' => $BASE . 'SCHEME/M.SC%202023/MICROBIOLOGY/SCHEME%20MICROBIOLOG4Y.pdf'],
      ['name' => 'M.Sc. Zoology (Sem I)',           'badge' => 'M.Sc.', 'desc' => 'M.Sc. Zoology Semester I Scheme',           'url' => $BASE . 'SCHEME/M.SC%202023/Zoology/M.%20Sc.%20Zoology%20SCHEME1.pdf'],
      ['name' => 'M.Sc. Zoology (Sem II)',          'badge' => 'M.Sc.', 'desc' => 'M.Sc. Zoology Semester II Scheme',          'url' => $BASE . 'SCHEME/M.SC%202023/Zoology/M.%20Sc.%20Zoology%20SCHEME2.pdf'],
      ['name' => 'M.Sc. Zoology (Sem III)',         'badge' => 'M.Sc.', 'desc' => 'M.Sc. Zoology Semester III Scheme',         'url' => $BASE . 'SCHEME/M.SC%202023/Zoology/M.%20Sc.%20Zoology%20SCHEME3.pdf'],
      ['name' => 'M.Sc. Zoology (Sem IV)',          'badge' => 'M.Sc.', 'desc' => 'M.Sc. Zoology Semester IV Scheme',          'url' => $BASE . 'SCHEME/M.SC%202023/Zoology/M.%20Sc.%20Zoology%20SCHEME4.pdf'],
    ]
  ],
  [
    'title' => 'M.A. & M.Com. Postgraduate Programmes',
    'icon'  => 'fa-building-columns',
    'items' => [
      ['name' => 'M.Com. (Semester I)',             'badge' => 'M.Com.', 'desc' => 'M.Com. Semester I Scheme',                  'url' => $BASE . 'SCHEME2021/RRSC_MCOM_I_2021.pdf'],
      ['name' => 'M.Com. (Semester II)',            'badge' => 'M.Com.', 'desc' => 'M.Com. Semester II Scheme',                 'url' => $BASE . 'SCHEME2021/RRSC_MCOM_II_2021.pdf'],
      ['name' => 'M.Com. (Semester III)',           'badge' => 'M.Com.', 'desc' => 'M.Com. Semester III Scheme',                'url' => $BASE . 'SCHEME2021/RRSC_MCOM_III_2021.pdf'],
      ['name' => 'M.Com. (Semester IV)',            'badge' => 'M.Com.', 'desc' => 'M.Com. Semester IV Scheme',                 'url' => $BASE . 'SCHEME2021/RRSC_MCOM_IV_2021.pdf'],
      ['name' => 'M.A. Political Science (Sem I)',  'badge' => 'M.A.',   'desc' => 'M.A. Political Science Semester I Scheme',   'url' => $BASE . 'SCHEME2021/RRSC_MA_I_POLS_2021.pdf'],
      ['name' => 'M.A. Political Science (Sem II)', 'badge' => 'M.A.',   'desc' => 'M.A. Political Science Semester II Scheme',  'url' => $BASE . 'SCHEME2021/RRSC_MA_II_POLS_2021.pdf'],
      ['name' => 'M.A. Political Science (Sem III)','badge' => 'M.A.',   'desc' => 'M.A. Political Science Semester III Scheme', 'url' => $BASE . 'SCHEME2021/RRSC_MA_III_POLS_2021.pdf'],
      ['name' => 'M.A. Political Science (Sem IV)', 'badge' => 'M.A.',   'desc' => 'M.A. Political Science Semester IV Scheme',  'url' => $BASE . 'SCHEME2021/RRSC_MA_IV_POLS_2021.pdf'],
      ['name' => 'M.A. Sociology (Sem I)',          'badge' => 'M.A.',   'desc' => 'M.A. Sociology Semester I Scheme',          'url' => $BASE . 'SCHEME2021/RRSC_MA_I_SOC_2021.pdf'],
      ['name' => 'M.A. Sociology (Sem II)',         'badge' => 'M.A.',   'desc' => 'M.A. Sociology Semester II Scheme',         'url' => $BASE . 'SCHEME2021/RRSC_MA_II_SOC_2021.pdf'],
      ['name' => 'M.A. Sociology (Sem III)',        'badge' => 'M.A.',   'desc' => 'M.A. Sociology Semester III Scheme',        'url' => $BASE . 'SCHEME2021/RRSC_MA_III_SOC_2021.pdf'],
      ['name' => 'M.A. Sociology (Sem IV)',         'badge' => 'M.A.',   'desc' => 'M.A. Sociology Semester IV Scheme',         'url' => $BASE . 'SCHEME2021/RRSC_MA_IV_SOC_2021.pdf'],
      ['name' => 'M.A. Economics (Sem I)',          'badge' => 'M.A.',   'desc' => 'M.A. Economics Semester I Scheme',          'url' => $BASE . 'SCHEME2021/RSC_MA_I_ECO_2021.pdf'],
      ['name' => 'M.A. Economics (Sem II)',         'badge' => 'M.A.',   'desc' => 'M.A. Economics Semester II Scheme',         'url' => $BASE . 'SCHEME2021/RSC_MA_II_ECO_2021.pdf'],
      ['name' => 'M.A. Economics (Sem III)',        'badge' => 'M.A.',   'desc' => 'M.A. Economics Semester III Scheme',        'url' => $BASE . 'scheme2022/M.A.%20Economics%20III%20sem%20%20Scheme%20.pdf'],
      ['name' => 'M.A. Economics (Sem IV)',         'badge' => 'M.A.',   'desc' => 'M.A. Economics Semester IV Scheme',         'url' => $BASE . 'SCHEME2021/RSC_MA_IV_ECO_2021.pdf'],
      ['name' => 'M.A. Hindi Literature (Sem I)',   'badge' => 'M.A.',   'desc' => 'M.A. Hindi Literature Semester I Scheme',   'url' => $BASE . 'SCHEME2021/RSC_MA_I_HIN_2021.pdf'],
      ['name' => 'M.A. Hindi Literature (Sem II)',  'badge' => 'M.A.',   'desc' => 'M.A. Hindi Literature Semester II Scheme',  'url' => $BASE . 'SCHEME2021/RSC_MA_II_HIN_2021.pdf'],
      ['name' => 'M.A. Hindi Literature (Sem III)', 'badge' => 'M.A.',   'desc' => 'M.A. Hindi Literature Semester III Scheme', 'url' => $BASE . 'scheme2022/M.A.HINDI%20III%20SEM%20SCHEME%20.pdf'],
      ['name' => 'M.A. Hindi Literature (Sem IV)',  'badge' => 'M.A.',   'desc' => 'M.A. Hindi Literature Semester IV Scheme',  'url' => $BASE . 'SCHEME2021/RSC_MA_IV_HIN_2021.pdf'],
      ['name' => 'M.A. History (Sem I)',             'badge' => 'M.A.',   'desc' => 'M.A. History Semester I Scheme',            'url' => $BASE . 'SCHEMES/scheme%20his/ma%20his%20i%20sem.pdf'],
      ['name' => 'M.A. History (Sem II)',            'badge' => 'M.A.',   'desc' => 'M.A. History Semester II Scheme',           'url' => $BASE . 'SCHEMES/scheme%20his/ma%20his%20ii%20sem.pdf'],
      ['name' => 'M.A. History (Sem III)',           'badge' => 'M.A.',   'desc' => 'M.A. History Semester III Scheme',          'url' => $BASE . 'SCHEMES/scheme%20his/ma%20his%20iii%20sem.pdf'],
      ['name' => 'M.A. History (Sem IV)',            'badge' => 'M.A.',   'desc' => 'M.A. History Semester IV Scheme',           'url' => $BASE . 'SCHEMES/scheme%20his/ma%20his%20iv%20sem.pdf'],
    ]
  ]
];
?>

<style>
  .academic-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(11, 37, 69, 0.04);
  }
  .btn-standard-doc {
    background: #ffffff;
    color: #0b2545;
    border: 1px solid #cbd5e1;
    border-radius: 6px;
    font-size: 0.84rem;
    font-weight: 500;
    padding: 5px 12px;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: all 0.2s ease;
    text-decoration: none;
    white-space: nowrap;
  }
  .btn-standard-doc:hover {
    background: #0b2545;
    color: #ffffff;
    border-color: #0b2545;
    transform: translateY(-1px);
    box-shadow: 0 2px 6px rgba(11, 37, 69, 0.15);
  }
  .btn-standard-doc:hover i {
    color: #ffffff !important;
  }
  .standard-table {
    width: 100%;
    margin-bottom: 0;
    border-collapse: collapse;
  }
  .standard-table th {
    background: #0b2545;
    color: #ffffff;
    font-weight: 600;
    font-size: 0.85rem;
    padding: 12px 14px;
    letter-spacing: 0.3px;
    border: none;
  }
  .standard-table td {
    padding: 12px 14px;
    vertical-align: middle;
    border-color: #f1f5f9;
    color: #334155;
    font-size: 0.88rem;
  }
  .standard-table tbody tr:hover td {
    background: #f8fafc;
  }
  .standard-badge {
    background: #f1f5f9;
    color: #475569;
    border: 1px solid #e2e8f0;
    font-weight: 500;
    font-size: 0.76rem;
    padding: 3px 8px;
    border-radius: 4px;
    display: inline-block;
  }
  /* Group separator row */
  .group-row td {
    background: #eef4fa !important;
    color: #0b2545 !important;
    font-weight: 700 !important;
    font-size: 0.85rem !important;
    letter-spacing: 0.4px;
    padding: 10px 14px !important;
    border-top: 1px solid #cbd5e1 !important;
    border-bottom: 1px solid #cbd5e1 !important;
  }
  .group-row td i {
    color: #0b2545;
  }
  .filter-input {
    font-size: 0.85rem;
    border-color: #cbd5e1;
    border-radius: 8px;
  }
  .filter-input:focus {
    border-color: #0b2545;
    box-shadow: 0 0 0 3px rgba(11, 37, 69, 0.1);
  }
</style>

<section class="subpage-main-section py-4" style="background-color: #f8fafc;">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area -->
      <div class="col-lg-8 col-xl-9">
        <div class="academic-card bg-white p-4">

          <!-- Standard Document Header -->
          <div class="d-flex flex-wrap justify-content-between align-items-center pb-3 mb-4 border-bottom" style="border-color: #e2e8f0 !important;">
            <div>
              <span class="standard-badge mb-2 d-inline-block">
                <i class="fa fa-building-columns me-1 text-secondary"></i> University Teaching Departments
              </span>
              <h3 class="fw-bold mb-1" style="color: #0b2545; font-size: 1.45rem;">University Teaching Departments (UTD)</h3>
              <p class="text-muted small mb-0">Official Schemes of Study &amp; Examination Matrices for UG (NEP 2020) &amp; PG Programmes.</p>
            </div>
            <div class="mt-2 mt-md-0">
              <span class="standard-badge text-dark">
                <i class="fa fa-check-circle text-success me-1"></i> NEP 2020 Compliant
              </span>
            </div>
          </div>

          <!-- Search & Filter Bar -->
          <div class="row g-2 mb-3 align-items-center">
            <div class="col-md-6 col-lg-5">
              <div class="input-group">
                <span class="input-group-text bg-white border-end-0" style="border-color:#cbd5e1;"><i class="fa fa-search text-muted"></i></span>
                <input type="text" id="schemeFilter" class="form-control border-start-0 ps-0 filter-input" placeholder="Search programme or course...">
              </div>
            </div>
            <div class="col text-md-end text-muted small">
              <i class="fa fa-file-pdf text-danger me-1"></i> Click to view &amp; download PDF in new tab
            </div>
          </div>

          <!-- Schemes Table -->
          <div class="table-responsive rounded-2 border overflow-hidden">
            <table class="table standard-table" id="schemeTable">
              <thead>
                <tr>
                  <th style="width: 6%;" class="text-center">#</th>
                  <th style="width: 32%;">Programme / Semester</th>
                  <th style="width: 44%;">Details &amp; Structure</th>
                  <th style="width: 18%;" class="text-center">Download</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($groups as $grp): ?>
                <!-- Section Header Row -->
                <tr class="group-row">
                  <td colspan="4">
                    <i class="fa <?= $grp['icon'] ?> me-2"></i>
                    <?= htmlspecialchars($grp['title']) ?>
                  </td>
                </tr>

                <?php 
                $sno = 1;
                foreach ($grp['items'] as $item): 
                ?>
                <tr class="scheme-row">
                  <td class="text-center text-muted fw-semibold"><?= $sno++ ?></td>
                  <td class="fw-bold text-dark"><?= htmlspecialchars($item['name']) ?></td>
                  <td>
                    <span class="standard-badge me-2"><?= htmlspecialchars($item['badge']) ?></span>
                    <span class="text-muted small"><?= htmlspecialchars($item['desc']) ?></span>
                  </td>
                  <td class="text-center">
                    <a href="<?= scheme_local_path($item['url']) ?>" target="_blank" rel="noopener noreferrer" class="btn-standard-doc">
                      <i class="fa fa-file-pdf text-danger"></i>
                      <span>View PDF</span>
                    </a>
                  </td>
                </tr>
                <?php endforeach; ?>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>

        </div>
      </div>

      <!-- Right Sidebar Column -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top:20px;z-index:10;">
        <?php require_once __DIR__ . '/../../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const filterInput = document.getElementById('schemeFilter');
  if (!filterInput) return;

  filterInput.addEventListener('input', function () {
    const q = this.value.toLowerCase().trim();
    document.querySelectorAll('#schemeTable tbody tr.scheme-row').forEach(function (row) {
      const text = row.textContent.toLowerCase();
      row.style.display = text.includes(q) ? '' : 'none';
    });
  });
});
</script>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>