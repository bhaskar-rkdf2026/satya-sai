<?php
$page_title = 'Bachelor of Engineering (B.E.) - Teaching & Examination Scheme - SSSUTMS';
$banner_title = 'Bachelor of Engineering (B.E.)';
$banner_category = 'Teaching & Examination Scheme';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
  .eng-page-container {
    background: #ffffff;
    border-radius: 14px;
    border: 1px solid #e2e8f0;
    box-shadow: 0 4px 20px rgba(11, 37, 69, 0.05);
    overflow: hidden;
    margin-bottom: 2rem;
  }

  .eng-header-banner {
    background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
    color: #ffffff;
    padding: 1.75rem 2rem;
    position: relative;
    border-radius: 14px;
    margin-bottom: 1.5rem;
    box-shadow: 0 8px 24px rgba(11, 37, 69, 0.15);
  }
  .eng-header-banner::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #f59e0b, #fbbf24);
    border-bottom-left-radius: 14px;
    border-bottom-right-radius: 14px;
  }
  .eng-header-badge {
    background: rgba(245, 158, 11, 0.2);
    border: 1px solid rgba(245, 158, 11, 0.45);
    color: #ffffff;
    font-size: 0.78rem;
    font-weight: 700;
    padding: 6px 16px;
    border-radius: 50px;
    letter-spacing: 0.5px;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    text-transform: uppercase;
  }

  .eng-tab-btn {
    background: #f1f5f9;
    color: #0b2545;
    border: 1px solid #cbd5e1;
    font-weight: 600;
    font-size: 0.85rem;
    padding: 7px 18px;
    border-radius: 20px;
    transition: all 0.2s ease;
    cursor: pointer;
    text-decoration: none !important;
    display: inline-flex;
    align-items: center;
    gap: 6px;
  }
  .eng-tab-btn:hover,
  .eng-tab-btn.active {
    background: #0b2545;
    color: #ffffff !important;
    border-color: #0b2545;
    box-shadow: 0 4px 10px rgba(11, 37, 69, 0.2);
  }

  .eng-search-box {
    position: relative;
    width: 100%;
    max-width: 360px;
  }
  .eng-search-box input {
    padding-left: 2.4rem;
    padding-right: 2rem;
    border-radius: 8px;
    border: 1px solid #cbd5e1;
    font-size: 0.88rem;
    height: 40px;
  }
  .eng-search-box input:focus {
    border-color: #0b2545;
    box-shadow: 0 0 0 0.2rem rgba(11, 37, 69, 0.15);
  }
  .eng-search-box .search-icon {
    position: absolute;
    left: 0.85rem;
    top: 50%;
    transform: translateY(-50%);
    color: #64748b;
    font-size: 0.9rem;
  }
  .eng-search-box .clear-btn {
    position: absolute;
    right: 0.75rem;
    top: 50%;
    transform: translateY(-50%);
    color: #94a3b8;
    cursor: pointer;
    display: none;
    background: none;
    border: none;
    padding: 0;
  }

  /* Table Customization Matching Attached Design */
  .eng-table-wrapper {
    border: 1px solid #e2e8f0;
    border-radius: 10px;
    overflow: hidden;
    background: #ffffff;
    margin-bottom: 2rem;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.02);
  }

  .eng-section-header {
    background: #f8fafc;
    border-bottom: 1px solid #e2e8f0;
    padding: 14px 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 10px;
  }
  .eng-section-title {
    color: #0b2545;
    font-weight: 700;
    font-size: 1.05rem;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 8px;
  }
  .eng-section-badge {
    background: #e2e8f0;
    color: #0b2545;
    font-size: 0.78rem;
    font-weight: 700;
    padding: 4px 12px;
    border-radius: 50px;
  }

  .eng-table {
    width: 100%;
    margin-bottom: 0;
    border-collapse: collapse;
  }
  .eng-table thead th {
    background: #0b2545 !important;
    color: #ffffff !important;
    font-weight: 700;
    font-size: 0.85rem;
    text-transform: uppercase;
    letter-spacing: 0.04em;
    padding: 13px 14px;
    border: 1px solid #134074;
    vertical-align: middle;
    text-align: center;
  }
  .eng-table thead th.text-start {
    text-align: left !important;
  }

  .eng-table tbody tr {
    border-bottom: 1px solid #edf2f7;
    transition: background-color 0.15s ease;
  }
  .eng-table tbody tr:hover {
    background-color: #f8fafc;
  }
  .eng-table tbody tr:last-child {
    border-bottom: none;
  }
  .eng-table td {
    padding: 12px 14px;
    font-size: 0.9rem;
    color: #334155;
    vertical-align: middle;
    border: 1px solid #edf2f7;
  }

  .eng-course-chip {
    display: inline-flex;
    align-items: center;
    background: #e2e8f0;
    color: #0b2545;
    font-weight: 700;
    font-size: 0.78rem;
    padding: 3px 8px;
    border-radius: 6px;
    border: 1px solid #cbd5e1;
  }

  .eng-branch-name {
    font-weight: 600;
    color: #0b2545;
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 0.92rem;
  }
  .eng-branch-name i {
    color: #475569;
    font-size: 1rem;
  }

  /* Exact Download Button Style with Equal Width */
  .eng-download-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    background: #0b2545;
    color: #ffffff !important;
    border: 1px solid #0b2545;
    border-radius: 6px;
    font-size: 0.82rem;
    font-weight: 600;
    padding: 6px 12px;
    text-decoration: none !important;
    transition: all 0.2s ease;
    white-space: nowrap;
    margin: 2px 2px;
    box-shadow: 0 2px 4px rgba(11, 37, 69, 0.15);
    min-width: 86px;
    text-align: center;
  }
  .eng-download-btn:hover {
    background: #134074;
    border-color: #134074;
    color: #ffffff !important;
    transform: translateY(-1px);
    box-shadow: 0 4px 10px rgba(11, 37, 69, 0.25);
  }
  .eng-download-btn i {
    color: #ffffff;
    font-size: 0.88rem;
  }

  .common-all-box {
    background: #f8fafc;
    border: 1px dashed #cbd5e1;
    border-radius: 8px;
    padding: 10px;
    text-align: center;
  }

  .no-match-box {
    display: none;
    text-align: center;
    padding: 30px 20px;
    color: #64748b;
    background: #ffffff;
    border-radius: 10px;
    border: 1px dashed #cbd5e1;
  }
</style>

<section class="subpage-main-section py-4 bg-light">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        
        <!-- Header Banner Card -->
        <div class="eng-header-banner">
          <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
              <span class="eng-header-badge mb-2">
                <i class="fa-solid fa-gear me-1"></i> Faculties &amp; Departments
              </span>
              <h3 class="fw-bold text-white mb-0 fs-3">SCHOOL OF ENGINEERING &amp; TECHNOLOGY</h3>
            </div>
          </div>
        </div>

        <!-- Controls: Quick Filter Tabs & Search Bar -->
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
          <div class="d-flex flex-wrap align-items-center gap-2" id="schemeFilters">
            <a href="#aicte-section" class="eng-tab-btn active"><i class="fa fa-layer-group"></i> AICTE Scheme (2022-23)</a>
            <a href="#cbcs-section" class="eng-tab-btn"><i class="fa fa-check-circle"></i> CBCS Scheme</a>
            <a href="#noncbcs-section" class="eng-tab-btn"><i class="fa fa-history"></i> Non-CBCS Scheme</a>
          </div>
          <div class="eng-search-box">
            <i class="fa fa-search search-icon"></i>
            <input type="text" id="branchSearchInput" class="form-control" placeholder="Search branch / specialization...">
            <button type="button" class="clear-btn" id="clearSearchBtn"><i class="fa fa-times"></i></button>
          </div>
        </div>

        <div id="noMatchAlert" class="no-match-box mb-4">
          <i class="fa fa-search fa-2x text-muted mb-2"></i>
          <h6 class="fw-bold mb-1">No matching branch found</h6>
          <p class="small mb-0">Try clearing your search keyword.</p>
        </div>

        <!-- ==========================================
             TABLE 1: AICTE Curriculum (Session 2022-23)
             ========================================== -->
        <div class="eng-table-wrapper" id="aicte-section">
          <div class="eng-section-header">
            <h5 class="eng-section-title">
              <i class="fa fa-graduation-cap text-primary"></i> AICTE Curriculum Scheme (Session 2022-23)
            </h5>
            <span class="eng-section-badge">AICTE Approved</span>
          </div>
          <div class="table-responsive">
            <table class="eng-table">
              <thead>
                <tr>
                  <th style="width: 65px;">SR. NO.</th>
                  <th style="width: 170px;" class="text-start">COURSE</th>
                  <th class="text-start" style="width: 250px;">BRANCH / SPECIALIZATION</th>
                  <th style="width: 140px;">I YEAR</th>
                  <th style="width: 140px;">II YEAR</th>
                  <th style="width: 140px;">III YEAR</th>
                  <th style="width: 140px;">IV YEAR</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $aicte_branches = [
                  [
                    'sno' => 1,
                    'name' => 'Aeronautical Engineering',
                    'sem1' => ['I_B_Scheme.pdf', 'I Sem'],
                    'sem2' => ['II_B_Scheme.pdf', 'II Sem'],
                    'sem3' => ['AE_III_SCHEME.pdf', 'III Sem'],
                    'sem4' => ['AE_IV_SCHEME.pdf', 'IV Sem'],
                    'sem5' => ['SCAE_V_D2020.pdf', 'V Sem'],
                    'sem6' => ['SCAE_VI_D2020.pdf', 'VI Sem'],
                    'sem7' => ['AAICTE_BE_AE_VII_SC.pdf', 'VII Sem'],
                    'sem8' => ['AAICTE_BE_AE_VIII_SC.pdf', 'VIII Sem'],
                  ],
                  [
                    'sno' => 2,
                    'name' => 'Chemical Engineering',
                    'sem1' => ['I_A_Scheme.pdf', 'I Sem'],
                    'sem2' => ['II_A_Scheme.pdf', 'II Sem'],
                    'sem3' => ['CM_III_SCHEME.pdf', 'III Sem'],
                    'sem4' => ['CM_IV_SCHEME.pdf', 'IV Sem'],
                    'sem5' => ['SCCM_V_D2020.pdf', 'V Sem'],
                    'sem6' => ['SCCM_VI_D2020.pdf', 'VI Sem'],
                    'sem7' => ['AAICTE_BE_CM_VII_SC.pdf', 'VII Sem'],
                    'sem8' => ['AAICTE_BE_CM_VIII_SC.pdf', 'VIII Sem'],
                  ],
                  [
                    'sno' => 3,
                    'name' => 'Civil Engineering',
                    'sem1' => ['I_B_Scheme.pdf', 'I Sem'],
                    'sem2' => ['II_B_Scheme.pdf', 'II Sem'],
                    'sem3' => ['sesssion 2022-23/III SEM SCHEME.pdf', 'III Sem'],
                    'sem4' => ['sesssion 2022-23/IV SEM SCHEME.pdf', 'IV Sem'],
                    'sem5' => ['sesssion 2022-23/V SEM SCHEME.pdf', 'V Sem'],
                    'sem6' => ['sesssion 2022-23/VI SEM SCHEME.pdf', 'VI Sem'],
                    'sem7' => ['sesssion 2022-23/VII SEM SCHEME.pdf', 'VII Sem'],
                    'sem8' => ['sesssion 2022-23/VIII SEM SCHEME.pdf', 'VIII Sem'],
                  ],
                  [
                    'sno' => 4,
                    'name' => 'Computer Science and Engineering',
                    'sem1' => ['I_B_Scheme.pdf', 'I Sem'],
                    'sem2' => ['II_B_Scheme.pdf', 'II Sem'],
                    'sem3' => ['CSE_III_SCHEME.pdf', 'III Sem'],
                    'sem4' => ['CSE_IV_SCHEME.pdf', 'IV Sem'],
                    'sem5' => ['SCCS_V_D2020.pdf', 'V Sem'],
                    'sem6' => ['RSCCS_VI_D2020.pdf', 'VI Sem'],
                    'sem7' => ['AAICTE_BE_CSE_VII_SC_R.pdf', 'VII Sem'],
                    'sem8' => ['AAICTE_BE_CSE_VIII_SC_R.pdf', 'VIII Sem'],
                  ],
                  [
                    'sno' => 5,
                    'name' => 'Electrical Engineering',
                    'sem1' => ['I_A_Scheme.pdf', 'I Sem'],
                    'sem2' => ['II_A_Scheme.pdf', 'II Sem'],
                    'sem3' => ['SCHEMES/CBCS SCHEME/Scheme BE/R2019/EE_III_SCHEME.pdf', 'III Sem'],
                    'sem4' => ['SCHEMES/CBCS SCHEME/Scheme BE/R2019/EE_IV_SCHEME.pdf', 'IV Sem'],
                    'sem5' => ['SCEE_V_D2020R.pdf', 'V Sem'],
                    'sem6' => ['SCEE_VI_D2020R.pdf', 'VI Sem'],
                    'sem7' => ['AAICTE_BE_EE_VII_SC.pdf', 'VII Sem'],
                    'sem8' => ['AAICTE_BE_EE_VIII_SC.pdf', 'VIII Sem'],
                  ],
                  [
                    'sno' => 6,
                    'name' => 'Electrical and Electronics Engineering',
                    'sem1' => ['I_A_Scheme.pdf', 'I Sem'],
                    'sem2' => ['II_A_Scheme.pdf', 'II Sem'],
                    'sem3' => ['EEE_III_SCHEME.pdf', 'III Sem'],
                    'sem4' => ['EEE_IV_SCHEME.pdf', 'IV Sem'],
                    'sem5' => ['SCEX_V_D2020R.pdf', 'V Sem'],
                    'sem6' => ['SCEX_VI_D2020R.pdf', 'VI Sem'],
                    'sem7' => ['AAICTE_BE_EX_VII_SC_R.pdf', 'VII Sem'],
                    'sem8' => ['AAICTE_BE_EX_VIII_SC_R.pdf', 'VIII Sem'],
                  ],
                  [
                    'sno' => 7,
                    'name' => 'Electronics and Communication',
                    'sem1' => ['I_A_Scheme.pdf', 'I Sem'],
                    'sem2' => ['II_A_Scheme.pdf', 'II Sem'],
                    'sem3' => ['ECE_III_SCHEME.pdf', 'III Sem'],
                    'sem4' => ['ECE_IV_SCHEME.pdf', 'IV Sem'],
                    'sem5' => ['SCEC_V_D2020.pdf', 'V Sem'],
                    'sem6' => ['SCEC_VI_D2020.pdf', 'VI Sem'],
                    'sem7' => ['AAICTE_BE_EC_VII_SC.pdf', 'VII Sem'],
                    'sem8' => ['AAICTE_BE_EC_VIII_SC.pdf', 'VIII Sem'],
                  ],
                  [
                    'sno' => 8,
                    'name' => 'Electronics and Instrumentation',
                    'sem1' => ['I_B_Scheme.pdf', 'I Sem'],
                    'sem2' => ['II_B_Scheme.pdf', 'II Sem'],
                    'sem3' => ['EI_III_SCHEME.pdf', 'III Sem'],
                    'sem4' => ['EI_IV_SCHEME.pdf', 'IV Sem'],
                    'sem5' => ['SCEI_V_D2020.pdf', 'V Sem'],
                    'sem6' => ['SCEI_VI_D2020.pdf', 'VI Sem'],
                    'sem7' => ['AAICTE_BE_EI_VII_SC_R.pdf', 'VII Sem'],
                    'sem8' => ['AAICTE_BE_EI_VIII_SC_R.pdf', 'VIII Sem'],
                  ],
                  [
                    'sno' => 9,
                    'name' => 'Information Technology',
                    'sem1' => ['I_A_Scheme.pdf', 'I Sem'],
                    'sem2' => ['II_A_Scheme.pdf', 'II Sem'],
                    'sem3' => ['IT_III_SCHEME.pdf', 'III Sem'],
                    'sem4' => ['IT_IV_SCHEME.pdf', 'IV Sem'],
                    'sem5' => ['IT_V_SCHEME NEW.pdf', 'V Sem'],
                    'sem6' => ['AAICTE_BE_IT_VI_SC updated.pdf', 'VI Sem'],
                    'sem7' => ['AAICTE_BE_IT_VII_SC.pdf', 'VII Sem'],
                    'sem8' => ['AAICTE_BE_IT_VIII_SC.pdf', 'VIII Sem'],
                  ],
                  [
                    'sno' => 10,
                    'name' => 'Mechanical Engineering',
                    'sem1' => ['I_B_Scheme.pdf', 'I Sem'],
                    'sem2' => ['II_B_Scheme.pdf', 'II Sem'],
                    'sem3' => ['ME_III_SCHEME.pdf', 'III Sem'],
                    'sem4' => ['ME_IV_SCHEME.pdf', 'IV Sem'],
                    'sem5' => ['SCME_V_D2020.pdf', 'V Sem'],
                    'sem6' => ['SCME_VI_D2020.pdf', 'VI Sem'],
                    'sem7' => ['AAICTE_BE_ME_VII_SC.pdf', 'VII Sem'],
                    'sem8' => ['AAICTE_BE_ME_VIII_SC.pdf', 'VIII Sem'],
                  ],
                  [
                    'sno' => 11,
                    'name' => 'Mining Engineering',
                    'sem1' => ['I_B_Scheme.pdf', 'I Sem'],
                    'sem2' => ['II_B_Scheme.pdf', 'II Sem'],
                    'sem3' => ['MI_III_SCHEME.pdf', 'III Sem'],
                    'sem4' => ['MI_IV_SCHEME.pdf', 'IV Sem'],
                    'sem5' => ['SCMI_V_D2020.pdf', 'V Sem'],
                    'sem6' => ['SCMI_VI_D2020.pdf', 'VI Sem'],
                    'sem7' => ['AAICTE_BE_MI_VII_SC.pdf', 'VII Sem'],
                    'sem8' => ['AAICTE_BE_MI_VIII_SC_R.pdf', 'VIII Sem'],
                  ],
                ];

                foreach ($aicte_branches as $b):
                  $p1 = (strpos($b['sem1'][0], '/') !== false) ? $b['sem1'][0] : 'SCHEME/' . $b['sem1'][0];
                  $p2 = (strpos($b['sem2'][0], '/') !== false) ? $b['sem2'][0] : 'SCHEME/' . $b['sem2'][0];
                  $p3 = (strpos($b['sem3'][0], '/') !== false) ? $b['sem3'][0] : 'SCHEME/' . $b['sem3'][0];
                  $p4 = (strpos($b['sem4'][0], '/') !== false) ? $b['sem4'][0] : 'SCHEME/' . $b['sem4'][0];
                  $p5 = (strpos($b['sem5'][0], '/') !== false) ? $b['sem5'][0] : 'SCHEME/' . $b['sem5'][0];
                  $p6 = (strpos($b['sem6'][0], '/') !== false) ? $b['sem6'][0] : 'SCHEME/' . $b['sem6'][0];
                  $p7 = (strpos($b['sem7'][0], '/') !== false) ? $b['sem7'][0] : 'SCHEME/' . $b['sem7'][0];
                  $p8 = (strpos($b['sem8'][0], '/') !== false) ? $b['sem8'][0] : 'SCHEME/' . $b['sem8'][0];
                ?>
                <tr class="branch-row">
                  <td class="text-center fw-bold text-muted"><?= $b['sno'] ?></td>
                  <td>
                    <span class="eng-course-chip me-1">B.E.</span>
                    <span class="fw-semibold text-secondary small d-none d-md-inline">Bachelor of Engineering</span>
                  </td>
                  <td>
                    <span class="eng-branch-name">
                      <i class="fa fa-graduation-cap"></i> <?= htmlspecialchars($b['name']) ?>
                    </span>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/' . $p1) ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> <?= $b['sem1'][1] ?></a>
                    <a href="<?= base_url('assets/images/Files/Link/' . $p2) ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> <?= $b['sem2'][1] ?></a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/' . $p3) ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> <?= $b['sem3'][1] ?></a>
                    <a href="<?= base_url('assets/images/Files/Link/' . $p4) ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> <?= $b['sem4'][1] ?></a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/' . $p5) ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> <?= $b['sem5'][1] ?></a>
                    <a href="<?= base_url('assets/images/Files/Link/' . $p6) ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> <?= $b['sem6'][1] ?></a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/' . $p7) ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> <?= $b['sem7'][1] ?></a>
                    <a href="<?= base_url('assets/images/Files/Link/' . $p8) ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> <?= $b['sem8'][1] ?></a>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>

        <!-- ==========================================
             TABLE 2: CBCS Scheme
             ========================================== -->
        <div class="eng-table-wrapper" id="cbcs-section">
          <div class="eng-section-header">
            <h5 class="eng-section-title">
              <i class="fa fa-graduation-cap text-primary"></i> Choice Based Credit System (CBCS Scheme)
            </h5>
            <span class="eng-section-badge">CBCS Curriculum</span>
          </div>
          <div class="table-responsive">
            <table class="eng-table">
              <thead>
                <tr>
                  <th style="width: 65px;">SR. NO.</th>
                  <th style="width: 170px;" class="text-start">COURSE</th>
                  <th class="text-start" style="width: 250px;">BRANCH / SPECIALIZATION</th>
                  <th style="width: 160px;">I YEAR</th>
                  <th style="width: 140px;">II YEAR</th>
                  <th style="width: 140px;">III YEAR</th>
                  <th style="width: 140px;">IV YEAR</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $cbcs_branches = [
                  [
                    'sno' => 1,
                    'name' => 'Aeronautical Engineering',
                    'sem3' => 'SCAEC_III.pdf', 'sem4' => 'SCAE_IV.pdf',
                    'sem5' => 'SC_BEAE_VSem_CBCS.pdf', 'sem6' => 'SCBEAE_VISem_CBCS.pdf',
                    'sem7' => 'SCBEAE_CBCS7thSEM..pdf', 'sem8' => 'SCBEAE_CBCS8thSEM..pdf',
                  ],
                  [
                    'sno' => 2,
                    'name' => 'Chemical Engineering',
                    'sem3' => 'SCCMC_III.pdf', 'sem4' => 'SCCH_IV.pdf',
                    'sem5' => 'SCBE_CMrVSem_CBCS.pdf', 'sem6' => 'SCBE_CMrVISem_CBCS.pdf',
                    'sem7' => 'SCBECME_CBCS7thSEM..pdf', 'sem8' => 'SCBECME_CBCS8thSEM..pdf',
                  ],
                  [
                    'sno' => 3,
                    'name' => 'Civil Engineering',
                    'sem3' => 'SCCEC_III.pdf', 'sem4' => 'SCCE_IV_CBCSr.pdf',
                    'sem5' => 'SCBE_CErVSem_CBCS.pdf', 'sem6' => 'SCBE_CErrVISem_CBCS.pdf',
                    'sem7' => 'SCBECE_CBCS7thSEM..pdf', 'sem8' => 'SCBECE_CBCS8thSEM..pdf',
                  ],
                  [
                    'sno' => 4,
                    'name' => 'Computer Science and Engineering',
                    'sem3' => 'SCCSC_III.pdf', 'sem4' => 'SCCS_IV.pdf',
                    'sem5' => 'SCBE_rCSEVSem_CBCS.pdf', 'sem6' => 'SCBE_rCSEVISem_CBCS.pdf',
                    'sem7' => 'SCBECS_CBCS7thSEM..pdf', 'sem8' => 'SCBECS_CBCS8thSEM..pdf',
                  ],
                  [
                    'sno' => 5,
                    'name' => 'Electrical Engineering',
                    'sem3' => 'SCEEC_III.pdf', 'sem4' => 'SCEE_IV.pdf',
                    'sem5' => 'SCBE_EEVSem_CBCS.pdf', 'sem6' => 'SCHEMES/CBCS SCHEME/Scheme BE/SCBE_EEVISem_CBCS.pdf',
                    'sem7' => 'SCBEEE_CBCS7thSEM..pdf', 'sem8' => 'SCBEEE_CBCS8thSEM..pdf',
                  ],
                  [
                    'sno' => 6,
                    'name' => 'Electrical and Electronics Engineering',
                    'sem3' => 'SCEXC_III.pdf', 'sem4' => 'SCEX_IV.pdf',
                    'sem5' => 'SCBE_EXVSem_CBCS.pdf', 'sem6' => 'SCBE_EXVISem_CBCS.pdf',
                    'sem7' => 'SCBEEX_CBCS7thSEM..pdf', 'sem8' => 'SCBEEX_CBCS8thSEM..pdf',
                  ],
                  [
                    'sno' => 7,
                    'name' => 'Electronics and Communication',
                    'sem3' => 'SCECC_III.pdf', 'sem4' => 'SCEC_IV.pdf',
                    'sem5' => 'SCBE_ECVSem_CBCS.pdf', 'sem6' => 'SCBE_ECVISem_CBCS.pdf',
                    'sem7' => 'SCBEEC_CBCS7thSEM..pdf', 'sem8' => 'SCBEEC_CBCS8thSEM..pdf',
                  ],
                  [
                    'sno' => 8,
                    'name' => 'Electronics and Instrumentation',
                    'sem3' => 'SCEIC_III.pdf', 'sem4' => 'SCEI_IV.pdf',
                    'sem5' => 'SCBE_EIVSem_CBCS.pdf', 'sem6' => 'SCBE_EIVISem_CBCS.pdf',
                    'sem7' => 'SCBEEI_CBCS7thSEM..pdf', 'sem8' => 'SCBEEI_CBCS8thSEM..pdf',
                  ],
                  [
                    'sno' => 9,
                    'name' => 'Information Technology',
                    'sem3' => 'SCITC_III.pdf', 'sem4' => 'SCIT_IV.pdf',
                    'sem5' => 'SCBE_ITrVSem_CBCS.pdf', 'sem6' => 'SCBE_ITrVISem_CBCS.pdf',
                    'sem7' => 'SCBEIT_CBCS7thSEM..pdf', 'sem8' => 'SCBEIT_CBCS8thSEM..pdf',
                  ],
                  [
                    'sno' => 10,
                    'name' => 'Mechanical Engineering',
                    'sem3' => 'SCMEC_III.pdf', 'sem4' => 'SCME_IVr.pdf',
                    'sem5' => 'B.E. ME  V Sem Scheme.pdf', 'sem6' => 'B.E. ME VI  Sem Scheme.pdf',
                    'sem7' => 'SCBEME_CBCS7thSEM..pdf', 'sem8' => 'SCBEME_CBCS8thSEM..pdf',
                  ],
                  [
                    'sno' => 11,
                    'name' => 'Mining Engineering',
                    'sem3' => 'SCMIC_III.pdf', 'sem4' => 'SCMI_IV_R.pdf',
                    'sem5' => 'SCBE_MI_V.pdf', 'sem6' => 'SCBE_MI_VI.pdf',
                    'sem7' => 'SCBEMI_CBCS7thSEM..pdf', 'sem8' => 'SCBEMI_CBCS8thSEM..pdf',
                  ],
                ];

                foreach ($cbcs_branches as $idx => $b):
                  $p3 = (strpos($b['sem3'], '/') !== false) ? $b['sem3'] : 'SCHEME/' . $b['sem3'];
                  $p4 = (strpos($b['sem4'], '/') !== false) ? $b['sem4'] : 'SCHEME/' . $b['sem4'];
                  $p5 = (strpos($b['sem5'], '/') !== false) ? $b['sem5'] : 'SCHEME/' . $b['sem5'];
                  $p6 = (strpos($b['sem6'], '/') !== false) ? $b['sem6'] : 'SCHEME/' . $b['sem6'];
                  $p7 = (strpos($b['sem7'], '/') !== false) ? $b['sem7'] : 'SCHEME/' . $b['sem7'];
                  $p8 = (strpos($b['sem8'], '/') !== false) ? $b['sem8'] : 'SCHEME/' . $b['sem8'];
                ?>
                <tr class="branch-row">
                  <td class="text-center fw-bold text-muted"><?= $b['sno'] ?></td>
                  <td>
                    <span class="eng-course-chip me-1">B.E.</span>
                    <span class="fw-semibold text-secondary small d-none d-md-inline">Bachelor of Engineering</span>
                  </td>
                  <td>
                    <span class="eng-branch-name">
                      <i class="fa fa-graduation-cap"></i> <?= htmlspecialchars($b['name']) ?>
                    </span>
                  </td>
                  <?php if ($idx === 0): ?>
                  <td rowspan="11" class="text-center align-middle bg-light">
                    <div class="common-all-box">
                      <a href="<?= base_url('assets/images/Files/Link/SCHEMES/CBCS SCHEME/BECBCS_I.pdf') ?>" target="_blank" class="eng-download-btn mb-1"><i class="fa fa-file-pdf"></i> I Sem</a>
                      <div class="small text-muted fw-bold my-1">and</div>
                      <a href="<?= base_url('assets/images/Files/Link/SCHEMES/CBCS SCHEME/SCHEMEII SEM/BECII_SH.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> II Sem</a>
                      <div class="small text-secondary fw-semibold mt-2"><i class="fa fa-users me-1"></i> Common to All</div>
                    </div>
                  </td>
                  <?php endif; ?>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/' . $p3) ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a>
                    <a href="<?= base_url('assets/images/Files/Link/' . $p4) ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/' . $p5) ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> V Sem</a>
                    <a href="<?= base_url('assets/images/Files/Link/' . $p6) ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VI Sem</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/' . $p7) ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VII Sem</a>
                    <a href="<?= base_url('assets/images/Files/Link/' . $p8) ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VIII Sem</a>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>

        <!-- ==========================================
             TABLE 3: Non-CBCS Scheme
             ========================================== -->
        <div class="eng-table-wrapper" id="noncbcs-section">
          <div class="eng-section-header">
            <h5 class="eng-section-title">
              <i class="fa fa-graduation-cap text-primary"></i> Non CBCS Scheme (For 2014 & 2015 Admitted Students)
            </h5>
            <span class="eng-section-badge">Old Scheme</span>
          </div>
          <div class="table-responsive">
            <table class="eng-table">
              <thead>
                <tr>
                  <th style="width: 65px;">SR. NO.</th>
                  <th style="width: 170px;" class="text-start">COURSE</th>
                  <th class="text-start" style="width: 250px;">BRANCH / SPECIALIZATION</th>
                  <th style="width: 160px;">I YEAR</th>
                  <th style="width: 140px;">II YEAR</th>
                  <th style="width: 140px;">III YEAR</th>
                  <th style="width: 140px;">IV YEAR</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $noncbcs_branches = [
                  [
                    'sno' => 1,
                    'name' => 'Aeronautical Engineering',
                    'sem3' => 'SCAE_III.pdf', 'sem4' => 'BEAEIV.pdf',
                    'sem5' => 'AEVS.pdf', 'sem6' => 'AEVI.pdf',
                    'sem7' => 'SCAE_VII.pdf', 'sem8' => 'SCAE_VIII.pdf',
                  ],
                  [
                    'sno' => 2,
                    'name' => 'Chemical Engineering',
                    'sem3' => 'CMIIISem.pdf', 'sem4' => 'BECMI.pdf',
                    'sem5' => 'CMVS.pdf', 'sem6' => 'CMVI.pdf',
                    'sem7' => 'SCCM_VII.pdf', 'sem8' => 'SCCH_VIII.pdf',
                  ],
                  [
                    'sno' => 3,
                    'name' => 'Civil Engineering',
                    'sem3' => 'SCCE_III.pdf', 'sem4' => 'CEivSCHEM.pdf',
                    'sem5' => 'CEVS.pdf', 'sem6' => 'SCCE_VIr.pdf',
                    'sem7' => 'SCCE_VII.pdf', 'sem8' => 'SCCE_VIII.pdf',
                  ],
                  [
                    'sno' => 4,
                    'name' => 'Computer Science and Engineering',
                    'sem3' => 'SCHCSE_III.pdf', 'sem4' => 'cse4schem.pdf',
                    'sem5' => 'CSEVS.pdf', 'sem6' => 'BECSEVI.pdf',
                    'sem7' => 'SCCS_VII.pdf', 'sem8' => 'SCCS_VIII.pdf',
                  ],
                  [
                    'sno' => 5,
                    'name' => 'Electrical Engineering',
                    'sem3' => 'SCEE_III.pdf', 'sem4' => 'EEIVScheme.pdf',
                    'sem5' => 'EEVS.pdf', 'sem6' => 'EEVI.pdf',
                    'sem7' => 'SCEE_VII.pdf', 'sem8' => 'SCEE_VIII.pdf',
                  ],
                  [
                    'sno' => 6,
                    'name' => 'Electrical and Electronics Engineering',
                    'sem3' => 'SCEX_III.pdf', 'sem4' => 'EX-IVScheme.pdf',
                    'sem5' => 'EXVS.pdf', 'sem6' => 'EXVI.pdf',
                    'sem7' => 'SCEX_VII.pdf', 'sem8' => 'SCEX_VIII.pdf',
                  ],
                  [
                    'sno' => 7,
                    'name' => 'Electronics and Communication',
                    'sem3' => 'SCEC_III.pdf', 'sem4' => 'EC4SEMSCHM.pdf',
                    'sem5' => 'ECVS.pdf', 'sem6' => 'ECVI.pdf',
                    'sem7' => 'SCEC_VII.pdf', 'sem8' => 'SCEC_VIII.pdf',
                  ],
                  [
                    'sno' => 8,
                    'name' => 'Electronics and Instrumentation',
                    'sem3' => 'SCEI_III.pdf', 'sem4' => 'BE _IV/EI-IV Scheme.pdf',
                    'sem5' => 'EIVS.pdf', 'sem6' => 'EIVI.pdf',
                    'sem7' => 'SCEI_VII.pdf', 'sem8' => 'SCEI_VIII.pdf',
                  ],
                  [
                    'sno' => 9,
                    'name' => 'Information Technology',
                    'sem3' => 'IT_III.pdf', 'sem4' => 'BEITIVSch.pdf',
                    'sem5' => 'ITVS.pdf', 'sem6' => 'ITVI.pdf',
                    'sem7' => 'SCIT_VII.pdf', 'sem8' => 'SCIT_VIII.pdf',
                  ],
                  [
                    'sno' => 10,
                    'name' => 'Mechanical Engineering',
                    'sem3' => 'SCME_III.pdf', 'sem4' => 'me4schem.pdf',
                    'sem5' => 'MEVS.pdf', 'sem6' => 'MEVI.pdf',
                    'sem7' => 'SCME_VII.pdf', 'sem8' => 'SCME_VIII.pdf',
                  ],
                  [
                    'sno' => 11,
                    'name' => 'Mining Engineering',
                    'sem3' => 'SCMIN_III.pdf', 'sem4' => 'BEMIIV.pdf',
                    'sem5' => 'MIV_SH.pdf', 'sem6' => 'MIVI_SH.pdf',
                    'sem7' => 'SCMI_VII.pdf', 'sem8' => 'SCMI_VIII.pdf',
                  ],
                ];

                foreach ($noncbcs_branches as $idx => $b):
                  $p3 = (strpos($b['sem3'], '/') !== false) ? $b['sem3'] : 'SCHEME/' . $b['sem3'];
                  $p4 = (strpos($b['sem4'], '/') !== false) ? $b['sem4'] : 'SCHEME/' . $b['sem4'];
                  $p5 = (strpos($b['sem5'], '/') !== false) ? $b['sem5'] : 'SCHEME/' . $b['sem5'];
                  $p6 = (strpos($b['sem6'], '/') !== false) ? $b['sem6'] : 'SCHEME/' . $b['sem6'];
                  $p7 = (strpos($b['sem7'], '/') !== false) ? $b['sem7'] : 'SCHEME/' . $b['sem7'];
                  $p8 = (strpos($b['sem8'], '/') !== false) ? $b['sem8'] : 'SCHEME/' . $b['sem8'];
                ?>
                <tr class="branch-row">
                  <td class="text-center fw-bold text-muted"><?= $b['sno'] ?></td>
                  <td>
                    <span class="eng-course-chip me-1">B.E.</span>
                    <span class="fw-semibold text-secondary small d-none d-md-inline">Bachelor of Engineering</span>
                  </td>
                  <td>
                    <span class="eng-branch-name">
                      <i class="fa fa-graduation-cap"></i> <?= htmlspecialchars($b['name']) ?>
                    </span>
                  </td>
                  <?php if ($idx === 0): ?>
                  <td rowspan="11" class="text-center align-middle bg-light">
                    <div class="common-all-box">
                      <a href="<?= base_url('assets/images/Files/Link/SCHEMES/SC_BE_I.pdf') ?>" target="_blank" class="eng-download-btn mb-1"><i class="fa fa-file-pdf"></i> I Sem</a>
                      <div class="small text-muted fw-bold my-1">and</div>
                      <a href="<?= base_url('assets/images/Files/Link/SCHEMES/SC_BE_I.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> II Sem</a>
                      <div class="small text-secondary fw-semibold mt-2"><i class="fa fa-history me-1"></i> Old Scheme Common to All</div>
                    </div>
                  </td>
                  <?php endif; ?>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/' . $p3) ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a>
                    <a href="<?= base_url('assets/images/Files/Link/' . $p4) ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/' . $p5) ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> V Sem</a>
                    <a href="<?= base_url('assets/images/Files/Link/' . $p6) ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VI Sem</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/' . $p7) ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VII Sem</a>
                    <a href="<?= base_url('assets/images/Files/Link/' . $p8) ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VIII Sem</a>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>

      </div>

      <!-- Right Sidebar (3 Cols) -->
      <div class="col-lg-4 col-xl-3">
        <?php require_once __DIR__ . '/../../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const searchInput = document.getElementById('branchSearchInput');
  const clearBtn = document.getElementById('clearSearchBtn');
  const noMatch = document.getElementById('noMatchAlert');
  
  function filterRows() {
    const q = searchInput.value.toLowerCase().trim();
    if (clearBtn) {
      clearBtn.style.display = q.length > 0 ? 'block' : 'none';
    }
    
    const tables = document.querySelectorAll('.eng-table');
    let totalVisible = 0;
    
    tables.forEach(table => {
      const rows = table.querySelectorAll('tbody tr.branch-row');
      let tableHasVisible = false;
      
      rows.forEach(row => {
        const branchName = row.querySelector('.eng-branch-name');
        const text = branchName ? branchName.textContent.toLowerCase() : row.textContent.toLowerCase();
        
        if (text.includes(q) || q === '') {
          row.style.display = '';
          tableHasVisible = true;
          totalVisible++;
        } else {
          row.style.display = 'none';
        }
      });
      
      const wrapper = table.closest('.eng-table-wrapper');
      if (wrapper) {
        wrapper.style.display = (tableHasVisible || q === '') ? '' : 'none';
      }
    });
    
    if (noMatch) {
      noMatch.style.display = (totalVisible === 0 && q !== '') ? 'block' : 'none';
    }
  }

  if (searchInput) {
    searchInput.addEventListener('input', filterRows);
  }
  
  if (clearBtn) {
    clearBtn.addEventListener('click', function() {
      searchInput.value = '';
      filterRows();
      searchInput.focus();
    });
  }
});
</script>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>