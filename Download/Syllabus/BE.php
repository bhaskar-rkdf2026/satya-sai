<?php
$page_title = 'Bachelor of Engineering (B.E.) Syllabus - SSSUTMS';
$banner_title = 'BE';
$banner_category = 'Syllabus';

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

  .eng-search-box {
    position: relative;
    max-width: 460px;
    width: 100%;
  }
  .eng-search-box input {
    padding-left: 2.75rem;
    padding-right: 2.5rem;
    height: 44px;
    border-radius: 50px;
    border: 1.5px solid #cbd5e1;
    font-size: 0.9rem;
    transition: all 0.2s ease;
  }
  .eng-search-box input:focus {
    border-color: #0b2545;
    box-shadow: 0 0 0 4px rgba(11, 37, 69, 0.12);
  }
  .eng-search-box .search-icon {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: #64748b;
    font-size: 0.95rem;
  }
  .eng-search-box .clear-btn {
    position: absolute;
    right: 1rem;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    color: #94a3b8;
    font-size: 0.9rem;
    cursor: pointer;
    display: none;
    padding: 0;
  }
  .eng-search-box .clear-btn:hover {
    color: #0b2545;
  }

  .eng-nav-pills {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-bottom: 1.25rem;
  }
  .eng-nav-pill-btn {
    padding: 7px 18px;
    font-size: 0.82rem;
    font-weight: 600;
    border-radius: 50px;
    border: 1.5px solid #cbd5e1;
    background: #ffffff;
    color: #334155;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: all 0.2s ease;
  }
  .eng-nav-pill-btn:hover,
  .eng-nav-pill-btn.active {
    background: #0b2545;
    border-color: #0b2545;
    color: #ffffff;
  }

  .eng-table-wrapper {
    background: #ffffff;
    border-radius: 12px;
    border: 1px solid #e2e8f0;
    overflow: hidden;
    margin-bottom: 2rem;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
  }

  .eng-section-header {
    background: #f8fafc;
    border-bottom: 2px solid #e2e8f0;
    padding: 1.1rem 1.5rem;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
  }
  .eng-section-title {
    font-size: 1.05rem;
    font-weight: 700;
    color: #0b2545;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 8px;
  }
  .eng-section-badge {
    font-size: 0.75rem;
    font-weight: 600;
    padding: 4px 12px;
    border-radius: 50px;
    background: rgba(11, 37, 69, 0.08);
    color: #0b2545;
    letter-spacing: 0.3px;
  }

  .eng-table {
    margin-bottom: 0;
    width: 100%;
    vertical-align: middle;
    border-collapse: collapse;
  }
  .eng-table thead th {
    background: #0b2545;
    color: #ffffff;
    font-size: 0.8rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    padding: 12px 14px;
    border: none;
    text-align: center;
    white-space: nowrap;
  }
  .eng-table thead th:nth-child(2) {
    text-align: left;
  }
  .eng-table tbody tr {
    transition: background-color 0.15s ease;
    border-bottom: 1px solid #edf2f7;
  }
  .eng-table tbody tr:hover {
    background-color: #f1f5f9;
  }
  .eng-table tbody tr:last-child {
    border-bottom: none;
  }
  .eng-table td {
    padding: 12px 14px;
    font-size: 0.86rem;
    color: #334155;
    vertical-align: middle;
  }

  .eng-branch-name {
    display: flex;
    align-items: center;
    gap: 10px;
    font-weight: 600;
    color: #0f172a;
  }
  .eng-branch-name i {
    width: 22px;
    text-align: center;
    font-size: 0.95rem;
    color: #0b2545;
    flex-shrink: 0;
  }

  .eng-download-btn {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 6px 12px;
    font-size: 0.78rem;
    font-weight: 600;
    border-radius: 6px;
    background: #0b2545;
    color: #ffffff !important;
    text-decoration: none;
    transition: all 0.2s ease;
    box-shadow: 0 1px 3px rgba(11, 37, 69, 0.15);
    white-space: nowrap;
  }
  .eng-download-btn:hover {
    background: #f59e0b;
    color: #0b2545 !important;
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(245, 158, 11, 0.35);
  }
  .eng-download-btn i {
    font-size: 0.85rem;
  }

  .sidebar-widget {
    background: #ffffff;
    border-radius: 12px;
    border: 1px solid #e2e8f0;
    padding: 1.4rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
  }
  .sidebar-widget-title {
    font-size: 1rem;
    font-weight: 700;
    color: #0b2545;
    margin-bottom: 1rem;
    padding-bottom: 0.5rem;
    border-bottom: 2px solid #e2e8f0;
    display: flex;
    align-items: center;
    gap: 8px;
  }
  .quick-links-list {
    list-style: none;
    padding: 0;
    margin: 0;
  }
  .quick-links-list li {
    margin-bottom: 8px;
  }
  .quick-links-list li:last-child {
    margin-bottom: 0;
  }
  .quick-links-list a {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 8px 12px;
    border-radius: 8px;
    color: #334155;
    font-size: 0.84rem;
    font-weight: 500;
    text-decoration: none;
    transition: all 0.2s ease;
    background: #f8fafc;
    border: 1px solid transparent;
  }
  .quick-links-list a:hover {
    background: #e2e8f0;
    color: #0b2545;
    border-color: #cbd5e1;
  }
  .quick-links-list a.active {
    background: #0b2545;
    color: #ffffff;
  }

  .no-results-msg {
    display: none;
    padding: 3rem 1rem;
    text-align: center;
    color: #64748b;
  }
</style>

<section class="subpage-main-section py-4 bg-light">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        
        <!-- Header Banner Card -->
        <div class="eng-header-banner">
          <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-2">
            <span class="eng-header-badge">
              <i class="fa fa-graduation-cap me-1"></i> Faculty of Engineering &amp; Technology
            </span>
            <span class="badge bg-white text-dark px-3 py-2 fw-semibold">
              <i class="fa fa-university me-1 text-primary"></i> SSSUTMS
            </span>
          </div>
          <h2 class="h3 fw-bold text-white mt-2 mb-1">BACHELOR OF ENGINEERING (B.E.) SYLLABUS</h2>
          <p class="text-white-50 mb-0">AICTE Model Curriculum, CBCS &amp; University Syllabi across all Engineering Branches</p>
        </div>

        <!-- Quick Scheme Jump Pills -->
        <div class="eng-nav-pills">
          <a href="#aicte-section" class="eng-nav-pill-btn"><i class="fa fa-certificate text-warning"></i> AICTE Curriculum (w.e.f. 2022-23)</a>
          <a href="#cbcs-section" class="eng-nav-pill-btn"><i class="fa fa-layer-group text-warning"></i> CBCS Curriculum Scheme</a>
          <a href="#non-cbcs-section" class="eng-nav-pill-btn"><i class="fa fa-book text-warning"></i> Non-CBCS Curriculum Scheme</a>
        </div>

        <!-- Filter & Search Bar -->
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-3">
          <div class="eng-search-box">
            <i class="fa fa-search search-icon"></i>
            <input type="text" id="schemeSearch" class="form-control" placeholder="Search branch, semester, or curriculum...">
            <button id="clearSearch" class="clear-btn" type="button"><i class="fa fa-times-circle"></i></button>
          </div>
          <div class="text-muted small">
            Showing <span id="visibleCount" class="fw-bold text-dark">33</span> Branch Syllabi
          </div>
        </div>

        <!-- Table 1: AICTE Curriculum (w.e.f. Academic Session 2022-23) -->
        <div id="aicte-section" class="eng-table-wrapper">
          <div class="eng-section-header">
            <h5 class="eng-section-title">
              <i class="fa fa-certificate text-primary"></i> As per AICTE Curriculum (w.e.f. Academic Session 2022-23)
            </h5>
            <span class="eng-section-badge">AICTE Model Scheme</span>
          </div>
          <div class="table-responsive">
            <table class="table eng-table scheme-table">
              <thead>
                <tr>
                  <th style="width: 55px;">SR.</th>
                  <th class="text-start">BRANCH NAME</th>
                  <th style="width: 180px;">I YEAR (SEM I &amp; II)</th>
                  <th style="width: 180px;">II YEAR (SEM III &amp; IV)</th>
                  <th style="width: 180px;">III YEAR (SEM V &amp; VI)</th>
                  <th style="width: 190px;">IV YEAR (SEM VII &amp; VIII)</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-center fw-bold">1</td>
                  <td>
                    <div class="eng-branch-name">
                      <i class="fa fa-plane text-primary"></i>
                      <span>Aeronautical Engineering</span>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/I_B_Syllabus.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/II_B_Syllabus.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> II Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/AE_III_SYLLABUS.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/AE_IV_SYLLABUS.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYAE_V_D2020.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> V Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYAE_VI_D2020.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VI Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/AAICTE_BE_AE_VII_SY.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VII Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/AAICTE_BE_AE_VIII_SY.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VIII Sem</a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="text-center fw-bold">2</td>
                  <td>
                    <div class="eng-branch-name">
                      <i class="fa fa-flask text-primary"></i>
                      <span>Chemical Engineering</span>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/I_B_Syllabus.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/II_B_Syllabus.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> II Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/CM_III_SYLLABUS.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/CM_IV_SYLLABUS.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYCM_V_D2020.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> V Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYCM_VI_D2020.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VI Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/AAICTE_BE_CM_VII_SY.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VII Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/AAICTE_BE_CM_VIII_SY.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VIII Sem</a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="text-center fw-bold">3</td>
                  <td>
                    <div class="eng-branch-name">
                      <i class="fa fa-building text-primary"></i>
                      <span>Civil Engineering</span>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/I_B_Syllabus.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/II_B_Syllabus.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> II Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/CE_III_SYLLABUS.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/CE_IV_SYLLABUS.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYCE_V_D2020.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> V Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYCE_VI_D2020.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VI Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/AAICTE_BE_CE_VII_SY.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VII Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/AAICTE_BE_CE_VIII_SY.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VIII Sem</a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="text-center fw-bold">4</td>
                  <td>
                    <div class="eng-branch-name">
                      <i class="fa fa-laptop-code text-primary"></i>
                      <span>Computer Science &amp; Engineering</span>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/I_B_Syllabus.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/II_B_Syllabus.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> II Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/CSE_III_SYLLABUS.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/CSE_IV_SYLLABUS.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYCS_V_D2020.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> V Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYCS_VI_D2020.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VI Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/AAICTE_BE_CS_VII_SY.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VII Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/AAICTE_BE_CS_VIII_SY.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VIII Sem</a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="text-center fw-bold">5</td>
                  <td>
                    <div class="eng-branch-name">
                      <i class="fa fa-bolt text-primary"></i>
                      <span>Electrical Engineering</span>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/I_B_Syllabus.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/II_B_Syllabus.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> II Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/EE_III_SYLLABUS.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/EE_IV_SYLLABUS.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYEE_V_D2020R.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> V Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYEE_VI_D2020R.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VI Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/AIEE-7.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VII Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/AIEE-8.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VIII Sem</a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="text-center fw-bold">6</td>
                  <td>
                    <div class="eng-branch-name">
                      <i class="fa fa-microchip text-primary"></i>
                      <span>Electrical &amp; Electronics Engineering</span>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/I_B_Syllabus.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/II_B_Syllabus.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> II Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/EEE_III_SYLLABUS.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/EEE_IV_SYLLABUS.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYEX_V_D2020R.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> V Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYEX_VI_D2020R.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VI Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/AAICTE_BE_EX_VII_SY.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VII Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/AAICTE_BE_EX_VIII_SY.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VIII Sem</a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="text-center fw-bold">7</td>
                  <td>
                    <div class="eng-branch-name">
                      <i class="fa fa-satellite-dish text-primary"></i>
                      <span>Electronics &amp; Communication</span>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/I_B_Syllabus.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/II_B_Syllabus.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> II Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/ECE_III_SYLLABUS.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/ECE_IV_SYLLABUS.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYEC_V_D2020.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> V Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYEC_VI_D2020.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VI Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/AAICTE_BE_EC_VII_SY.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VII Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/AAICTE_BE_EC_VIII_SY.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VIII Sem</a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="text-center fw-bold">8</td>
                  <td>
                    <div class="eng-branch-name">
                      <i class="fa fa-cogs text-primary"></i>
                      <span>Electronics &amp; Instrumentation</span>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/I_B_Syllabus.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/II_B_Syllabus.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> II Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/EI_III_SYLLABUS.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/EI_IV_SYLLABUS.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYEI_V_D2020.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> V Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYEI_VI_D2020.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VI Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/AAICTE_BE_EI_VII_SY.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VII Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/AAICTE_BE_EI_VIII_SY.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VIII Sem</a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="text-center fw-bold">9</td>
                  <td>
                    <div class="eng-branch-name">
                      <i class="fa fa-network-wired text-primary"></i>
                      <span>Information Technology</span>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/I_B_Syllabus.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/II_B_Syllabus.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> II Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/IT_III_SYLLABUS.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/IT_IV_SYLLABUS.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SyllabusIIIsem/syllabus 2022/BE_IT SYLLABUS V TH SEM.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> V Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SyllabusIIIsem/syllabus 2022/BE_IT SYLLABUS VI TH SEM.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VI Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/Syllabus BE VIII/BE_IT SYLLABUS VII TH SEM.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VII Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/Syllabus BE VIII/BE_IT SYLLABUS VIII TH SEM.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VIII Sem</a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="text-center fw-bold">10</td>
                  <td>
                    <div class="eng-branch-name">
                      <i class="fa fa-wrench text-primary"></i>
                      <span>Mechanical Engineering</span>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/I_B_Syllabus.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/II_B_Syllabus.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> II Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/ME_III_SYLLABUS.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/ME_IV_SYLLABUS.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYME_V_D2020.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> V Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYME_VI_D2020.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VI Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/AAICTE_BE_ME_VII_SY.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VII Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/AAICTE_BE_ME_VIII_SY.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VIII Sem</a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="text-center fw-bold">11</td>
                  <td>
                    <div class="eng-branch-name">
                      <i class="fa fa-mountain text-primary"></i>
                      <span>Mining Engineering</span>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/I_B_Syllabus.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/II_B_Syllabus.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> II Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/MI_III_SYLLABUS.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/MI_IV_SYLLABUS.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYMI_V_D2020.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> V Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYMI_VI_D2020.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VI Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/AAICTE_BE_MI_VII_SY.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VII Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/AAICTE_BE_MI_VIII_SY.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VIII Sem</a>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Table 2: CBCS Curriculum Scheme -->
        <div id="cbcs-section" class="eng-table-wrapper">
          <div class="eng-section-header">
            <h5 class="eng-section-title">
              <i class="fa fa-layer-group text-primary"></i> Choice Based Credit System (CBCS) Curriculum Scheme
            </h5>
            <span class="eng-section-badge">CBCS Scheme</span>
          </div>
          <div class="table-responsive">
            <table class="table eng-table scheme-table">
              <thead>
                <tr>
                  <th style="width: 55px;">SR.</th>
                  <th class="text-start">BRANCH NAME</th>
                  <th style="width: 180px;">I YEAR (SEM I &amp; II)</th>
                  <th style="width: 180px;">II YEAR (SEM III &amp; IV)</th>
                  <th style="width: 180px;">III YEAR (SEM V &amp; VI)</th>
                  <th style="width: 190px;">IV YEAR (SEM VII &amp; VIII)</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-center fw-bold">1</td>
                  <td>
                    <div class="eng-branch-name">
                      <i class="fa fa-plane text-primary"></i>
                      <span>Aeronautical Engineering</span>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/BEI_CBCS_SYL.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/BEII_CBCS_SYL.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> II Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYAEC_III.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYAE_IV.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYBE_AE_ 5th.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> V Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYBE_AE_ 6th.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VI Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYBEAE_CBCS7thSEM..pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VII Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYBEAE_CBCS8thSEM..pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VIII Sem</a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="text-center fw-bold">2</td>
                  <td>
                    <div class="eng-branch-name">
                      <i class="fa fa-flask text-primary"></i>
                      <span>Chemical Engineering</span>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/BEI_CBCS_SYL.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/BEII_CBCS_SYL.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> II Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYCMC_III.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/CM_IV_SYLLABUS.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYBE_CM_ 5th.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> V Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYBE_CM_ 6th.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VI Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYBECME_CBCS7thSEM..pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VII Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYBECME_CBCS8thSEM..pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VIII Sem</a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="text-center fw-bold">3</td>
                  <td>
                    <div class="eng-branch-name">
                      <i class="fa fa-building text-primary"></i>
                      <span>Civil Engineering</span>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/BEI_CBCS_SYL.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/BEII_CBCS_SYL.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> II Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYCEC_III.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYCE_IV.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYBE_CE_ 5th.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> V Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYBErr_CE_ 6th.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VI Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYBECE_CBCS7thSEM..pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VII Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYBECE_CBCS8thSEM..pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VIII Sem</a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="text-center fw-bold">4</td>
                  <td>
                    <div class="eng-branch-name">
                      <i class="fa fa-laptop-code text-primary"></i>
                      <span>Computer Science &amp; Engineering</span>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/BEI_CBCS_SYL.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/BEII_CBCS_SYL.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> II Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYCSC_III.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYCS_IV.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYBE_CSEr_ 5th.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> V Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYBE_CSEr_ 6th.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VI Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYBECS_CBCS7thSEM..pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VII Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYBECS_CBCS8thSEM..pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VIII Sem</a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="text-center fw-bold">5</td>
                  <td>
                    <div class="eng-branch-name">
                      <i class="fa fa-bolt text-primary"></i>
                      <span>Electrical Engineering</span>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/BEI_CBCS_SYL.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/BEII_CBCS_SYL.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> II Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/EE_III_SYLLABUS.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/EE_IV_SYLLABUS.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYBE_EE_ 5th.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> V Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYBE_EE_ 6th.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VI Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYBEEE_CBCS7thSEM..pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VII Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYBEEE_CBCS8thSEM..pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VIII Sem</a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="text-center fw-bold">6</td>
                  <td>
                    <div class="eng-branch-name">
                      <i class="fa fa-microchip text-primary"></i>
                      <span>Electrical &amp; Electronics Engineering</span>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/BEI_CBCS_SYL.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/BEII_CBCS_SYL.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> II Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/EEE_III_SYLLABUS.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/EEE_IV_SYLLABUS.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYBE_EX_ 5th.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> V Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYBE_EX_ 6th.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VI Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYBEEX_CBCS7thSEM..pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VII Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYBEEX_CBCS8thSEM..pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VIII Sem</a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="text-center fw-bold">7</td>
                  <td>
                    <div class="eng-branch-name">
                      <i class="fa fa-satellite-dish text-primary"></i>
                      <span>Electronics &amp; Communication</span>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/BEI_CBCS_SYL.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/BEII_CBCS_SYL.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> II Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/ECE_III_SYLLABUS.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/ECE_IV_SYLLABUS.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYBE_EC_ 5th.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> V Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYBE_ECrn_ 6th.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VI Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYBEEC_CBCS7thSEM..pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VII Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYBEEC_CBCS8thSEM..pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VIII Sem</a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="text-center fw-bold">8</td>
                  <td>
                    <div class="eng-branch-name">
                      <i class="fa fa-cogs text-primary"></i>
                      <span>Electronics &amp; Instrumentation</span>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/BEI_CBCS_SYL.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/BEII_CBCS_SYL.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> II Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/EI_III_SYLLABUS.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/EI_IV_SYLLABUS.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYEI_V_D2020.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> V Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYBE_EIrr_ 6th.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VI Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYBEEI_CBCS7thSEM..pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VII Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYBEEI_CBCS8thSEM..pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VIII Sem</a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="text-center fw-bold">9</td>
                  <td>
                    <div class="eng-branch-name">
                      <i class="fa fa-network-wired text-primary"></i>
                      <span>Information Technology</span>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/BEI_CBCS_SYL.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/BEII_CBCS_SYL.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> II Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/ITC III SEM SYLLABUS.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/ITC IV SEM SYLLABUS.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYBE_IT_ 5th.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> V Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYBE_ITr_ 6th.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VI Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYBEIT_CBCS7thSEM..pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VII Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYBEIT_CBCS8thSEM..pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VIII Sem</a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="text-center fw-bold">10</td>
                  <td>
                    <div class="eng-branch-name">
                      <i class="fa fa-wrench text-primary"></i>
                      <span>Mechanical Engineering</span>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/BEI_CBCS_SYL.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/BEII_CBCS_SYL.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> II Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYMEC_III.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYME_IVr.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYBE_ME_ 5th.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> V Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/BE_ME_VI_Sem_Syllabus_CBCS.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VI Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYBEME_CBCS7thSEM..pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VII Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYBEME_CBCS8thSEM..pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VIII Sem</a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="text-center fw-bold">11</td>
                  <td>
                    <div class="eng-branch-name">
                      <i class="fa fa-mountain text-primary"></i>
                      <span>Mining Engineering</span>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/BEI_CBCS_SYL.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/BEII_CBCS_SYL.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> II Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYMIC_III.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYMI_IV.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYBE_MI_5thR.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> V Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYBE_MIr_ 6th.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VI Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYBEMI_CBCS7thSEM..pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VII Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYBEMI_CBCS8thSEM..pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VIII Sem</a>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Table 3: Non-CBCS Curriculum Scheme (Traditional Syllabi) -->
        <div id="non-cbcs-section" class="eng-table-wrapper">
          <div class="eng-section-header">
            <h5 class="eng-section-title">
              <i class="fa fa-book text-primary"></i> Non-CBCS Curriculum Scheme (Traditional Syllabi)
            </h5>
            <span class="eng-section-badge">Non-CBCS Scheme</span>
          </div>
          <div class="table-responsive">
            <table class="table eng-table scheme-table">
              <thead>
                <tr>
                  <th style="width: 55px;">SR.</th>
                  <th class="text-start">BRANCH NAME</th>
                  <th style="width: 180px;">I YEAR (SEM I &amp; II)</th>
                  <th style="width: 180px;">II YEAR (SEM III &amp; IV)</th>
                  <th style="width: 180px;">III YEAR (SEM V &amp; VI)</th>
                  <th style="width: 190px;">IV YEAR (SEM VII &amp; VIII)</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-center fw-bold">1</td>
                  <td>
                    <div class="eng-branch-name">
                      <i class="fa fa-plane text-primary"></i>
                      <span>Aeronautical Engineering</span>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SY_BE_Inew.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I &amp; II Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/AERO.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/AER_IV.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/AEV.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> V Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/AEVISY.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VI Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYAE_VII.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VII Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYAE_VIII.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VIII Sem</a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="text-center fw-bold">2</td>
                  <td>
                    <div class="eng-branch-name">
                      <i class="fa fa-flask text-primary"></i>
                      <span>Chemical Engineering</span>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SY_BE_Inew.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I &amp; II Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYCH_III.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYBECM.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/CMV.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> V Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/CMVIS.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VI Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYCM_VII.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VII Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYCH_VIII.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VIII Sem</a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="text-center fw-bold">3</td>
                  <td>
                    <div class="eng-branch-name">
                      <i class="fa fa-building text-primary"></i>
                      <span>Civil Engineering</span>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SY_BE_Inew.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I &amp; II Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYCE_III.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/CE4SEM.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/CEV.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> V Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/CEVISY.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VI Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYCE_VII.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VII Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYCE_VIII.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VIII Sem</a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="text-center fw-bold">4</td>
                  <td>
                    <div class="eng-branch-name">
                      <i class="fa fa-laptop-code text-primary"></i>
                      <span>Computer Science &amp; Engineering</span>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SY_BE_Inew.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I &amp; II Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYCSE_III.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/CSE4.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/CSEV.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> V Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/CSVISY.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VI Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYCS_VII.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VII Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYCS_VIII.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VIII Sem</a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="text-center fw-bold">5</td>
                  <td>
                    <div class="eng-branch-name">
                      <i class="fa fa-bolt text-primary"></i>
                      <span>Electrical Engineering</span>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SY_BE_Inew.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I &amp; II Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/EE_III_SYLLABUS.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/EE_IV_SYLLABUS.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/EEV.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> V Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/EEVISY.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VI Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYEE_VII.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VII Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYEE_VIII.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VIII Sem</a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="text-center fw-bold">6</td>
                  <td>
                    <div class="eng-branch-name">
                      <i class="fa fa-microchip text-primary"></i>
                      <span>Electrical &amp; Electronics Engineering</span>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SY_BE_Inew.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I &amp; II Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYEX_III.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/EX4SEM.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/EXV.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> V Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/EXVISY.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VI Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYEX_VII.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VII Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYEX_VIII.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VIII Sem</a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="text-center fw-bold">7</td>
                  <td>
                    <div class="eng-branch-name">
                      <i class="fa fa-satellite-dish text-primary"></i>
                      <span>Electronics &amp; Communication</span>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SY_BE_Inew.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I &amp; II Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYEC_III.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/EC4SEM.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/ECV.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> V Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/ECVISY.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VI Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYEC_VII.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VII Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYEC_VIII.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VIII Sem</a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="text-center fw-bold">8</td>
                  <td>
                    <div class="eng-branch-name">
                      <i class="fa fa-cogs text-primary"></i>
                      <span>Electronics &amp; Instrumentation</span>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SY_BE_Inew.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I &amp; II Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYEI_III.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/EI4SEM.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/EIV.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> V Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/EIVISY.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VI Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYEI_VII.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VII Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYEI_VIII.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VIII Sem</a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="text-center fw-bold">9</td>
                  <td>
                    <div class="eng-branch-name">
                      <i class="fa fa-network-wired text-primary"></i>
                      <span>Information Technology</span>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SY_BE_Inew.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I &amp; II Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYIT_III.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/IT_IV_SYLLABUS.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/ITV.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> V Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/ITVISY.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VI Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYIT_VII.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VII Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYIT_VIIIr.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VIII Sem</a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="text-center fw-bold">10</td>
                  <td>
                    <div class="eng-branch-name">
                      <i class="fa fa-wrench text-primary"></i>
                      <span>Mechanical Engineering</span>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SY_BE_Inew.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I &amp; II Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYME_III.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/ME4SEM.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/ME.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> V Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/MEVISYL.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VI Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYME_VII.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VII Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYME_VIII.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VIII Sem</a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="text-center fw-bold">11</td>
                  <td>
                    <div class="eng-branch-name">
                      <i class="fa fa-mountain text-primary"></i>
                      <span>Mining Engineering</span>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SY_BE_Inew.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I &amp; II Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYMIN_III.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYBEMIN.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/MIV_SY.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> V Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/MIVI_SY.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VI Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYMI_VII.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VII Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYMI_VIII.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VIII Sem</a>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div id="noResults" class="no-results-msg eng-table-wrapper">
          <i class="fa fa-search fa-2x mb-3 text-muted"></i>
          <h5>No Branch Syllabi Found</h5>
          <p class="text-muted mb-0">No matching branches found. Try searching for "Civil", "Mechanical", "AICTE", or "CBCS".</p>
        </div>

      </div>

      <!-- Right Sidebar (Navigation / Quick Links) -->
      <div class="col-lg-4 col-xl-3">
        
        <!-- Quick Downloads Widget -->
        <div class="sidebar-widget">
          <h5 class="sidebar-widget-title">
            <i class="fa fa-download text-primary"></i> Engineering Downloads
          </h5>
          <ul class="quick-links-list">
            <li>
              <a href="<?= base_url('Download/Scheme/BE.php') ?>">
                <span><i class="fa fa-table me-2 text-primary"></i> BE Scheme</span>
                <i class="fa fa-chevron-right text-muted small"></i>
              </a>
            </li>
            <li>
              <a href="<?= base_url('Download/Syllabus/BE.php') ?>" class="active">
                <span><i class="fa fa-book-open me-2 text-warning"></i> BE Syllabus</span>
                <i class="fa fa-chevron-right text-white small"></i>
              </a>
            </li>
            <li>
              <a href="<?= base_url('Download/Scheme/Polytechnic_Engineering.php') ?>">
                <span><i class="fa fa-tools me-2 text-primary"></i> Polytechnic Scheme</span>
                <i class="fa fa-chevron-right text-muted small"></i>
              </a>
            </li>
            <li>
              <a href="<?= base_url('Download/Syllabus/Polytechnic_Engineering.php') ?>">
                <span><i class="fa fa-book me-2 text-primary"></i> Polytechnic Syllabus</span>
                <i class="fa fa-chevron-right text-muted small"></i>
              </a>
            </li>
            <li>
              <a href="<?= base_url('Download/Scheme/MTech.php') ?>">
                <span><i class="fa fa-graduation-cap me-2 text-primary"></i> M.Tech Scheme</span>
                <i class="fa fa-chevron-right text-muted small"></i>
              </a>
            </li>
            <li>
              <a href="<?= base_url('Download/Syllabus/MTech.php') ?>">
                <span><i class="fa fa-book me-2 text-primary"></i> M.Tech Syllabus</span>
                <i class="fa fa-chevron-right text-muted small"></i>
              </a>
            </li>
          </ul>
        </div>

        <!-- Other Faculty Syllabi -->
        <div class="sidebar-widget">
          <h5 class="sidebar-widget-title">
            <i class="fa fa-university text-primary"></i> Other Syllabi
          </h5>
          <ul class="quick-links-list">
            <li>
              <a href="<?= base_url('Download/Syllabus/Pharmacy.php') ?>">
                <span><i class="fa fa-pills me-2 text-primary"></i> Pharmacy</span>
                <i class="fa fa-chevron-right text-muted small"></i>
              </a>
            </li>
            <li>
              <a href="<?= base_url('Download/Syllabus/MBA.php') ?>">
                <span><i class="fa fa-chart-line me-2 text-primary"></i> MBA</span>
                <i class="fa fa-chevron-right text-muted small"></i>
              </a>
            </li>
            <li>
              <a href="<?= base_url('Download/Syllabus/MCA.php') ?>">
                <span><i class="fa fa-laptop me-2 text-primary"></i> MCA</span>
                <i class="fa fa-chevron-right text-muted small"></i>
              </a>
            </li>
            <li>
              <a href="<?= base_url('Download/Syllabus/Education.php') ?>">
                <span><i class="fa fa-chalkboard-teacher me-2 text-primary"></i> Education</span>
                <i class="fa fa-chevron-right text-muted small"></i>
              </a>
            </li>
            <li>
              <a href="<?= base_url('Download/Syllabus/BScHonsAG.php') ?>">
                <span><i class="fa fa-seedling me-2 text-primary"></i> B.Sc. (Hons.) Agriculture</span>
                <i class="fa fa-chevron-right text-muted small"></i>
              </a>
            </li>
            <li>
              <a href="<?= base_url('Download/Syllabus/UTD.php') ?>">
                <span><i class="fa fa-layer-group me-2 text-primary"></i> UTD Courses</span>
                <i class="fa fa-chevron-right text-muted small"></i>
              </a>
            </li>
          </ul>
        </div>

      </div>

    </div>
  </div>
</section>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('schemeSearch');
    const clearBtn = document.getElementById('clearSearch');
    const visibleCountEl = document.getElementById('visibleCount');
    const tableWrappers = document.querySelectorAll('.eng-table-wrapper:not(#noResults)');
    const allRows = document.querySelectorAll('.scheme-table tbody tr');
    const noResultsMsg = document.getElementById('noResults');

    function filterTable() {
      const q = searchInput.value.toLowerCase().trim();
      clearBtn.style.display = q.length > 0 ? 'block' : 'none';

      let totalVisible = 0;

      tableWrappers.forEach(function(wrapper) {
        const rows = wrapper.querySelectorAll('tbody tr');
        let wrapperVisible = 0;

        rows.forEach(function(row) {
          const text = row.innerText.toLowerCase();
          if (text.includes(q)) {
            row.style.display = '';
            wrapperVisible++;
            totalVisible++;
          } else {
            row.style.display = 'none';
          }
        });

        // Hide whole wrapper if no rows match
        if (wrapperVisible === 0 && q.length > 0) {
          wrapper.style.display = 'none';
        } else {
          wrapper.style.display = '';
        }
      });

      if (visibleCountEl) {
        visibleCountEl.textContent = totalVisible;
      }

      if (noResultsMsg) {
        noResultsMsg.style.display = (totalVisible === 0) ? 'block' : 'none';
      }
    }

    searchInput.addEventListener('input', filterTable);
    clearBtn.addEventListener('click', function() {
      searchInput.value = '';
      filterTable();
      searchInput.focus();
    });
  });
</script>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>