<?php
$page_title = 'UTD - Teaching & Examination Scheme - SSSUTMS';
$banner_title = 'UTD';
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

  /* Table Customization Matching Design */
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

  /* Equal-Sized Download Buttons */
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
  .eng-download-btn.btn-wide {
    min-width: 140px;
    padding: 6px 14px;
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
          <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-2">
            <span class="eng-header-badge">
              <i class="fa fa-graduation-cap me-1"></i> Faculties &amp; Departments
            </span>
            <span class="badge bg-white text-dark px-3 py-2 fw-semibold">
              <i class="fa fa-university me-1 text-primary"></i> SSSUTMS
            </span>
          </div>
          <h2 class="h3 fw-bold text-white mb-2">UNIVERSITY TEACHING DEPARTMENTS (UTD)</h2>
          <p class="text-white-50 mb-0">Undergraduate &amp; Postgraduate Programmes - Teaching &amp; Examination Scheme</p>
        </div>

        <!-- Filter & Search Bar -->
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-3">
          <div class="eng-search-box">
            <i class="fa fa-search search-icon"></i>
            <input type="text" id="schemeSearch" class="form-control" placeholder="Search course, degree, or semester...">
            <button type="button" id="clearSearch" class="clear-btn"><i class="fa fa-times-circle"></i></button>
          </div>
          <div class="text-muted small">
            Showing <span id="visibleCount" class="fw-bold text-dark">26</span> programs
          </div>
        </div>

        <!-- Section 1: AICTE UG Schemes (Semester System) -->
        <div class="eng-table-wrapper">
          <div class="eng-section-header">
            <h5 class="eng-section-title">
              <i class="fa fa-graduation-cap text-primary"></i> AICTE Approved UG Programmes (Semester System)
            </h5>
            <span class="eng-section-badge">BBA &amp; BCA</span>
          </div>
          
          <div class="table-responsive">
            <table class="table align-middle eng-table scheme-table">
              <thead>
                <tr>
                  <th style="width: 70px;">SR. NO.</th>
                  <th class="text-start" style="min-width: 200px;">COURSE / DEGREE</th>
                  <th style="width: 120px;">I SEM</th>
                  <th style="width: 120px;">II SEM</th>
                  <th style="width: 120px;">III SEM</th>
                  <th style="width: 120px;">IV SEM</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-center fw-bold">1</td>
                  <td>
                    <div class="eng-branch-name">
                      <i class="fa fa-graduation-cap text-primary"></i>
                      <div>
                        <div>BBA</div>
                        <small class="text-muted fw-normal">Bachelor of Business Administration (AICTE Scheme)</small>
                      </div>
                    </div>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/BBA_I__SEMESTER_SCHEME_18072025_0212.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I Sem</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/BBA_II_SEMESTER_SCHEME_18072025_0212.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> II Sem</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/BBA_3__Semester_Scheme_11112025_1219.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/BBA_4_Semester_Scheme_11112025_1219.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a>
                  </td>
                </tr>

                <tr>
                  <td class="text-center fw-bold">2</td>
                  <td>
                    <div class="eng-branch-name">
                      <i class="fa fa-graduation-cap text-primary"></i>
                      <div>
                        <div>BCA</div>
                        <small class="text-muted fw-normal">Bachelor of Computer Applications (AICTE Scheme)</small>
                      </div>
                    </div>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/BBA_I_Sem_Scheme_As_Per_AICTE_21072025_1203.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I Sem</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/BBA__II_Sem_Scheme_As_Per_AICTE_21072025_1203.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> II Sem</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/BCA_3_Semester_Scheme_11112025_1101.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/BCA__4_Semester_Scheme_11112025_1101.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Section 2: NEP-2022-23 UG Programmes (Semester System) -->
        <div class="eng-table-wrapper">
          <div class="eng-section-header">
            <h5 class="eng-section-title">
              <i class="fa fa-graduation-cap text-primary"></i> NEP Scheme - Semester System (UG Courses)
            </h5>
            <span class="eng-section-badge">W.e.f. Session 2022-23</span>
          </div>
          
          <div class="table-responsive">
            <table class="table align-middle eng-table scheme-table">
              <thead>
                <tr>
                  <th style="width: 60px;">SR. NO.</th>
                  <th class="text-start" style="min-width: 180px;">COURSE / DEGREE</th>
                  <th style="width: 95px;">I SEM</th>
                  <th style="width: 95px;">II SEM</th>
                  <th style="width: 95px;">III SEM</th>
                  <th style="width: 95px;">IV SEM</th>
                  <th style="width: 95px;">V SEM</th>
                  <th style="width: 95px;">VI SEM</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-center fw-bold">1</td>
                  <td>
                    <div class="eng-branch-name">
                      <i class="fa fa-graduation-cap text-primary"></i>
                      <div>
                        <div>BA</div>
                        <small class="text-muted fw-normal">Bachelor of Arts (NEP)</small>
                      </div>
                    </div>
                  </td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEMES/UTD2023/SCHEME BA 1SEM.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEMES/UTD2023/2nd sem/BA NEP 2nd sem.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME/3 SEM NEP 2024/B A 3rd sem.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/scheme2022/SCHEME (2) BA IV sem (1) new.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEMES/SCHEME  ba v sem 2024  UPDATE (2).pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> V Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/BA_VI_Semester_SchemeUP_04072025_0258.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VI Sem</a></td>
                </tr>

                <tr>
                  <td class="text-center fw-bold">2</td>
                  <td>
                    <div class="eng-branch-name">
                      <i class="fa fa-graduation-cap text-primary"></i>
                      <div>
                        <div>B.Com.</div>
                        <small class="text-muted fw-normal">Bachelor of Commerce (NEP)</small>
                      </div>
                    </div>
                  </td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEMES/UTD2023/B.COM IST SEM 2022-23 (1).pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEMES/UTD2023/2nd sem/B.COM 2 ND SEM SCHEME.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEMES/UTD2023/3 sem/BCom III SEMESTER Scheme NEP Final (1).pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEMES/B.com IV Semester scheme NEP 2024.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEMES/B.COM VTH TH SEM SCHEME NEP 2024.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> V Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME/6 sem NEP/B.COM VI TH SEM SCHEME NEP.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VI Sem</a></td>
                </tr>

                <tr>
                  <td class="text-center fw-bold">3</td>
                  <td>
                    <div class="eng-branch-name">
                      <i class="fa fa-graduation-cap text-primary"></i>
                      <div>
                        <div>B.Sc.</div>
                        <small class="text-muted fw-normal">Bachelor of Science (NEP)</small>
                      </div>
                    </div>
                  </td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEMES/UTD2023/BSC I SEM NEP 22-23.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEMES/UTD2023/2nd sem/BSC II SEM NEP SCHEME.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEMES/UTD2023/3 sem/NEW BSC III SEM SCHEME.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEMES/UTD2023/4 TH SEM/NEW BSC  IV SEM SCHEME.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEMES/BSC NEP 5th SEM SCHEME.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> V Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME/6 sem NEP/BSC NEP 6th SEM SCHEME.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VI Sem</a></td>
                </tr>

                <tr>
                  <td class="text-center fw-bold">4</td>
                  <td>
                    <div class="eng-branch-name">
                      <i class="fa fa-graduation-cap text-primary"></i>
                      <div>
                        <div>B.B.A.</div>
                        <small class="text-muted fw-normal">Bachelor of Business Administration (NEP)</small>
                      </div>
                    </div>
                  </td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEMES/UTD2023/Syllabus/BBA/BBA Ist Semester Scheme.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEMES/UTD2023/2nd sem/BBA II Semester Scheme.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEMES/UTD2023/3 sem/BBA III Semester Scheme.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/scheme2022/BBA IV Semester Scheme.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEMES/BBA V Semester Scheme.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> V Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME/6 sem NEP/BBA VI Semester Scheme.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VI Sem</a></td>
                </tr>

                <tr>
                  <td class="text-center fw-bold">5</td>
                  <td>
                    <div class="eng-branch-name">
                      <i class="fa fa-graduation-cap text-primary"></i>
                      <div>
                        <div>B.C.A.</div>
                        <small class="text-muted fw-normal">Bachelor of Computer Applications (NEP)</small>
                      </div>
                    </div>
                  </td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEMES/UTD2023/BCA Scheme I.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEMES/UTD2023/2nd sem/BCA Scheme II NEP.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEMES/UTD2023/3 sem/BCA Scheme 3RD SEM.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEMES/UTD2023/4 TH SEM/BCA Scheme 4TH SEM.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEMES/BCA SCHEME  5th.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> V Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME/6 sem NEP/BCA SCHEME  6TH.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> VI Sem</a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Section 3: NEP UG Programmes (Yearly Pattern) -->
        <div class="eng-table-wrapper">
          <div class="eng-section-header">
            <h5 class="eng-section-title">
              <i class="fa fa-graduation-cap text-primary"></i> NEP UG Programmes (Yearly Pattern Schemes)
            </h5>
            <span class="eng-section-badge">I, II &amp; III Year</span>
          </div>
          
          <div class="table-responsive">
            <table class="table align-middle eng-table scheme-table">
              <thead>
                <tr>
                  <th style="width: 70px;">SR. NO.</th>
                  <th class="text-start" style="min-width: 220px;">COURSE / DEGREE</th>
                  <th class="text-center" style="width: 220px;">I YEAR (NEP 2021-22)</th>
                  <th class="text-center" style="width: 220px;">II YEAR (NEP 2022-23)</th>
                  <th class="text-center" style="width: 220px;">III YEAR (NEP 2023-24)</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-center fw-bold">1</td>
                  <td>
                    <div class="eng-branch-name"><i class="fa fa-graduation-cap text-primary"></i> BA</div>
                  </td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SC_R_NEP_BA_12032022_0121.pdf') ?>" target="_blank" class="eng-download-btn btn-wide"><i class="fa fa-file-pdf"></i> BA - I Year</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/scheme2022/SCHEME BA 2 year .pdf') ?>" target="_blank" class="eng-download-btn btn-wide"><i class="fa fa-file-pdf"></i> BA - II Year</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME/NEP YEARLY/SCHEME BA 3 year  new 2023-24.pdf') ?>" target="_blank" class="eng-download-btn btn-wide"><i class="fa fa-file-pdf"></i> BA - III Year</a></td>
                </tr>

                <tr>
                  <td class="text-center fw-bold">2</td>
                  <td>
                    <div class="eng-branch-name"><i class="fa fa-graduation-cap text-primary"></i> B.Com.</div>
                  </td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SC_R_NEP_BCom_12032022_0121.pdf') ?>" target="_blank" class="eng-download-btn btn-wide"><i class="fa fa-file-pdf"></i> B.Com. - I Year</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/scheme2022/BCom II Year Scheme NEP.pdf') ?>" target="_blank" class="eng-download-btn btn-wide"><i class="fa fa-file-pdf"></i> B.Com. - II Year</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME/NEP YEARLY/BCom III Year Scheme NEP  FINAL.pdf') ?>" target="_blank" class="eng-download-btn btn-wide"><i class="fa fa-file-pdf"></i> B.Com. - III Year</a></td>
                </tr>

                <tr>
                  <td class="text-center fw-bold">3</td>
                  <td>
                    <div class="eng-branch-name"><i class="fa fa-graduation-cap text-primary"></i> B.Sc.</div>
                  </td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SC_R_NEP_BSC_12032022_0121.pdf') ?>" target="_blank" class="eng-download-btn btn-wide"><i class="fa fa-file-pdf"></i> B.Sc. - I Year</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/scheme2022/BSC SCHEME  II YR.pdf') ?>" target="_blank" class="eng-download-btn btn-wide"><i class="fa fa-file-pdf"></i> B.Sc. - II Year</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME/NEP YEARLY/BSC NEP III YEARLY  SCHEME .pdf') ?>" target="_blank" class="eng-download-btn btn-wide"><i class="fa fa-file-pdf"></i> B.Sc. - III Year</a></td>
                </tr>

                <tr>
                  <td class="text-center fw-bold">4</td>
                  <td>
                    <div class="eng-branch-name"><i class="fa fa-graduation-cap text-primary"></i> B.B.A.</div>
                  </td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SC_R_NEP_BBA_12032022_0121.pdf') ?>" target="_blank" class="eng-download-btn btn-wide"><i class="fa fa-file-pdf"></i> BBA - I Year</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/scheme2022/BBA II Year Scheme NEP.pdf') ?>" target="_blank" class="eng-download-btn btn-wide"><i class="fa fa-file-pdf"></i> BBA - II Year</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME/NEP YEARLY/BBA III Year Scheme.pdf') ?>" target="_blank" class="eng-download-btn btn-wide"><i class="fa fa-file-pdf"></i> BBA - III Year</a></td>
                </tr>

                <tr>
                  <td class="text-center fw-bold">5</td>
                  <td>
                    <div class="eng-branch-name"><i class="fa fa-graduation-cap text-primary"></i> B.C.A.</div>
                  </td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SC_R_NEP_BCA_12032022_0121.pdf') ?>" target="_blank" class="eng-download-btn btn-wide"><i class="fa fa-file-pdf"></i> BCA - I Year</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/scheme2022/BCA SCHEME  II YR (1).pdf') ?>" target="_blank" class="eng-download-btn btn-wide"><i class="fa fa-file-pdf"></i> BCA - II Year</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME/NEP YEARLY/BCA SCHEME  III YR.pdf') ?>" target="_blank" class="eng-download-btn btn-wide"><i class="fa fa-file-pdf"></i> BCA - III Year</a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Section 4: M.Sc. Programmes (w.e.f. 2022-23) -->
        <div class="eng-table-wrapper">
          <div class="eng-section-header">
            <h5 class="eng-section-title">
              <i class="fa fa-graduation-cap text-primary"></i> M.Sc. Programmes (w.e.f. Session 2022-23)
            </h5>
            <span class="eng-section-badge">Master of Science</span>
          </div>
          
          <div class="table-responsive">
            <table class="table align-middle eng-table scheme-table">
              <thead>
                <tr>
                  <th style="width: 70px;">SR. NO.</th>
                  <th class="text-start" style="min-width: 200px;">BRANCH / SPECIALIZATION</th>
                  <th style="width: 120px;">I SEM</th>
                  <th style="width: 120px;">II SEM</th>
                  <th style="width: 120px;">III SEM</th>
                  <th style="width: 120px;">IV SEM</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-center fw-bold">1</td>
                  <td>
                    <div class="eng-branch-name"><i class="fa fa-graduation-cap text-primary"></i> Mathematics</div>
                  </td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME/M.SC 2023/M.Sc Mathematics Scheme (I) Semester.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME/M.SC 2023/M.Sc Mathematics Scheme (II) Semester.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME/M.SC 2023/M.Sc Mathematics Scheme (III) Semester.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME/M.SC 2023/M.Sc Mathematics Scheme (IV) Semester.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                </tr>

                <tr>
                  <td class="text-center fw-bold">2</td>
                  <td>
                    <div class="eng-branch-name"><i class="fa fa-graduation-cap text-primary"></i> Chemistry</div>
                  </td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME/M.SC 2023/CHEM/MASTER OF SCIENCE (CHEMISTRY)1.PDF') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME/M.SC 2023/CHEM/MASTER OF SCIENCE (CHEMISTRY)2.PDF') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME/M.SC 2023/CHEM/MASTER OF SCIENCE (CHEMISTRY)3.PDF') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME/M.SC 2023/CHEM/MASTER OF SCIENCE (CHEMISTRY)4.PDF') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                </tr>

                <tr>
                  <td class="text-center fw-bold">3</td>
                  <td>
                    <div class="eng-branch-name"><i class="fa fa-graduation-cap text-primary"></i> Physics</div>
                  </td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME/M.SC 2023/PHY/MASTER OF SCIENCE (PHYSICS) 1 .PDF') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME/M.SC 2023/PHY/Master of Science (physics) 2 .pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME/M.SC 2023/PHY/Master of Science (physics) 3 .pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME/M.SC 2023/PHY/Master of Science (physics) 4.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                </tr>

                <tr>
                  <td class="text-center fw-bold">4</td>
                  <td>
                    <div class="eng-branch-name"><i class="fa fa-graduation-cap text-primary"></i> Microbiology</div>
                  </td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME/M.SC 2023/MICROBIOLOGY/SCHEME MICROBIOLOGY1.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME/M.SC 2023/MICROBIOLOGY/SCHEME MICROBIOLOGY2.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME/M.SC 2023/MICROBIOLOGY/SCHEME MICROBIOLOGY3.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME/M.SC 2023/MICROBIOLOGY/SCHEME MICROBIOLOG4Y.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                </tr>

                <tr>
                  <td class="text-center fw-bold">5</td>
                  <td>
                    <div class="eng-branch-name"><i class="fa fa-graduation-cap text-primary"></i> Zoology</div>
                  </td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME/M.SC 2023/Zoology/M. Sc. Zoology SCHEME1.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME/M.SC 2023/Zoology/M. Sc. Zoology SCHEME2.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME/M.SC 2023/Zoology/M. Sc. Zoology SCHEME3.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME/M.SC 2023/Zoology/M. Sc. Zoology SCHEME4.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                </tr>

                <tr>
                  <td class="text-center fw-bold">6</td>
                  <td>
                    <div class="eng-branch-name"><i class="fa fa-graduation-cap text-primary"></i> Botany</div>
                  </td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME/M.SC 2023/BOTANY/BOTANY SCHEME 1.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME/M.SC 2023/BOTANY/BOTANY SCHEME 2.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME/M.SC 2023/BOTANY/BOTANY SCHEME 3.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME/M.SC 2023/BOTANY/BOTANY SCHEME 4.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                </tr>

                <tr>
                  <td class="text-center fw-bold">7</td>
                  <td>
                    <div class="eng-branch-name"><i class="fa fa-graduation-cap text-primary"></i> Computer Science</div>
                  </td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME/M.SC 2023/CS/MASTER OF SCIENCE (COMPUTER SCIENCE) 1.PDF') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME/M.SC 2023/CS/MASTER OF SCIENCE (COMPUTER SCIENCE) 2.PDF') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME/M.SC 2023/CS/MASTER OF SCIENCE (COMPUTER SCIENCE) 3.PDF') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME/M.SC 2023/CS/MASTER OF SCIENCE (COMPUTER SCIENCE) 4.PDF') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Section 5: M.A. Programmes (w.e.f. 2021) -->
        <div class="eng-table-wrapper">
          <div class="eng-section-header">
            <h5 class="eng-section-title">
              <i class="fa fa-graduation-cap text-primary"></i> M.A. Programmes (w.e.f. Session 2021)
            </h5>
            <span class="eng-section-badge">Master of Arts</span>
          </div>
          
          <div class="table-responsive">
            <table class="table align-middle eng-table scheme-table">
              <thead>
                <tr>
                  <th style="width: 70px;">SR. NO.</th>
                  <th class="text-start" style="min-width: 200px;">DISCIPLINE / SUBJECT</th>
                  <th style="width: 120px;">I SEM</th>
                  <th style="width: 120px;">II SEM</th>
                  <th style="width: 120px;">III SEM</th>
                  <th style="width: 120px;">IV SEM</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-center fw-bold">1</td>
                  <td>
                    <div class="eng-branch-name"><i class="fa fa-graduation-cap text-primary"></i> English</div>
                  </td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/scheme2022/MA ENG/MA_I_ENG_2022.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/scheme2022/MA ENG/MA_Il_ENG_2022.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/scheme2022/MA ENG/MA_III_ENG_2022.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/scheme2022/MA ENG/MA_IV_ENG_2022.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                </tr>

                <tr>
                  <td class="text-center fw-bold">2</td>
                  <td>
                    <div class="eng-branch-name"><i class="fa fa-graduation-cap text-primary"></i> Hindi</div>
                  </td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME2021/RSC_MA_I_HIN_2021.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME2021/RSC_MA_II_HIN_2021.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/scheme2022/M.A.HINDI III SEM SCHEME .pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME2021/RSC_MA_IV_HIN_2021.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                </tr>

                <tr>
                  <td class="text-center fw-bold">3</td>
                  <td>
                    <div class="eng-branch-name"><i class="fa fa-graduation-cap text-primary"></i> History</div>
                  </td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEMES/scheme his/ma his i sem.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEMES/scheme his/ma his ii sem.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEMES/scheme his/ma his iii sem.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/HISTORY_05042025_0442.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                </tr>

                <tr>
                  <td class="text-center fw-bold">4</td>
                  <td>
                    <div class="eng-branch-name"><i class="fa fa-graduation-cap text-primary"></i> Economics</div>
                  </td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME2021/RSC_MA_I_ECO_2021.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME2021/RSC_MA_II_ECO_2021.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/scheme2022/M.A. Economics III sem  Scheme .pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME2021/RSC_MA_IV_ECO_2021.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                </tr>

                <tr>
                  <td class="text-center fw-bold">5</td>
                  <td>
                    <div class="eng-branch-name"><i class="fa fa-graduation-cap text-primary"></i> Sociology</div>
                  </td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME2021/RRSC_MA_I_SOC_2021.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME2021/RRSC_MA_II_SOC_2021.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME2021/RRSC_MA_III_SOC_2021.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME2021/RRSC_MA_IV_SOC_2021.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                </tr>

                <tr>
                  <td class="text-center fw-bold">6</td>
                  <td>
                    <div class="eng-branch-name"><i class="fa fa-graduation-cap text-primary"></i> Political Science</div>
                  </td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME2021/RRSC_MA_I_POLS_2021.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME2021/RRSC_MA_II_POLS_2021.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME2021/RRSC_MA_III_POLS_2021.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME2021/RRSC_MA_IV_POLS_2021.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                </tr>

                <tr>
                  <td class="text-center fw-bold">7</td>
                  <td>
                    <div class="eng-branch-name"><i class="fa fa-graduation-cap text-primary"></i> Psychology</div>
                  </td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME2021/RSC_MA_I_PSY_2021.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME2021/RSC_MA_II_PSY_2021.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME2021/RSC_MA_III_PSY_2021.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME2021/RSC_MA_IV_PSY_2021.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Section 6: M.Com. Programme (w.e.f. 2021) -->
        <div class="eng-table-wrapper">
          <div class="eng-section-header">
            <h5 class="eng-section-title">
              <i class="fa fa-graduation-cap text-primary"></i> M.Com. Programme (w.e.f. Session 2021)
            </h5>
            <span class="eng-section-badge">Master of Commerce</span>
          </div>
          
          <div class="table-responsive">
            <table class="table align-middle eng-table scheme-table">
              <thead>
                <tr>
                  <th style="width: 70px;">SR. NO.</th>
                  <th class="text-start" style="min-width: 200px;">PROGRAM / DISCIPLINE</th>
                  <th style="width: 120px;">I SEM</th>
                  <th style="width: 120px;">II SEM</th>
                  <th style="width: 120px;">III SEM</th>
                  <th style="width: 120px;">IV SEM</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-center fw-bold">1</td>
                  <td>
                    <div class="eng-branch-name"><i class="fa fa-graduation-cap text-primary"></i> Master of Commerce (M.Com.)</div>
                  </td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME2021/RRSC_MCOM_I_2021.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME2021/RRSC_MCOM_II_2021.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME2021/RRSC_MCOM_III_2021.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td class="text-center"><a href="<?= base_url('assets/images/Files/Link/SCHEME2021/RRSC_MCOM_IV_2021.pdf') ?>" target="_blank" class="eng-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Section 7: Legacy & Previous Schemes (UG & PG) -->
        <div class="eng-table-wrapper">
          <div class="eng-section-header">
            <h5 class="eng-section-title">
              <i class="fa fa-graduation-cap text-primary"></i> Previous / Legacy Schemes (UG &amp; PG - CBCS &amp; Non-CBCS)
            </h5>
            <span class="eng-section-badge">Archived Schemes</span>
          </div>
          
          <div class="table-responsive">
            <table class="table align-middle eng-table scheme-table">
              <thead>
                <tr>
                  <th class="text-start" style="width: 250px;">PROGRAM CATEGORY</th>
                  <th class="text-center" style="width: 25%;">YEARLY (W.E.F. 2017-18)</th>
                  <th class="text-center" style="width: 25%;">CBCS (W.E.F. 2016-17)</th>
                  <th class="text-center" style="width: 25%;">NON-CBCS (OLD BATCHES)</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="fw-bold">
                    <div class="eng-branch-name"><i class="fa fa-book text-primary"></i> All UG Courses (BA / BCA / BBA / B.Com. / B.Sc.)</div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-column gap-2 align-items-center">
                      <a href="<?= base_url('assets/images/Files/Link/SCHEMES/UTD/UTDUG/SCUTDUG_IYwef2017.zip') ?>" target="_blank" class="eng-download-btn btn-wide"><i class="fa fa-file-archive"></i> I Year (2017)</a>
                      <a href="<?= base_url('assets/images/Files/Link/SCHEMES/UTD/SCUTD_UG_II_Year.zip') ?>" target="_blank" class="eng-download-btn btn-wide"><i class="fa fa-file-archive"></i> II Year</a>
                      <a href="<?= base_url('assets/images/Files/Link/SCHEMES/UTD/SCUTD_UG_III_Year.zip') ?>" target="_blank" class="eng-download-btn btn-wide"><i class="fa fa-file-archive"></i> III Year</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-column gap-2 align-items-center">
                      <a href="<?= base_url('assets/images/Files/Link/SCHEMES/CBCS SCHEME/SCHEMEII SEM/UTD_UGCBCSII_SH.rar') ?>" target="_blank" class="eng-download-btn btn-wide"><i class="fa fa-file-archive"></i> II Sem (CBCS)</a>
                      <a href="<?= base_url('assets/images/Files/Link/SCHEMES/CBCS SCHEME/Scheme UTD/SCUTD_UGIII2017.rar') ?>" target="_blank" class="eng-download-btn btn-wide"><i class="fa fa-file-archive"></i> III Sem (CBCS)</a>
                      <a href="<?= base_url('assets/images/Files/Link/SCHEMES/SCUTD_IV.zip') ?>" target="_blank" class="eng-download-btn btn-wide"><i class="fa fa-file-archive"></i> IV Sem (CBCS)</a>
                      <a href="<?= base_url('assets/images/Files/Link/SCHEMES/UTD V Sem Sceam.zip') ?>" target="_blank" class="eng-download-btn btn-wide"><i class="fa fa-file-archive"></i> V Sem (CBCS)</a>
                      <a href="<?= base_url('assets/images/Files/Link/SCHEMES/SCUTD_VI_Sem (2).zip') ?>" target="_blank" class="eng-download-btn btn-wide"><i class="fa fa-file-archive"></i> VI Sem (CBCS)</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-column gap-2 align-items-center">
                      <a href="<?= base_url('assets/images/Files/Link/SCHEMES/SCUTDUG_I.rar') ?>" target="_blank" class="eng-download-btn btn-wide"><i class="fa fa-file-archive"></i> I Sem (Non-CBCS)</a>
                      <a href="<?= base_url('assets/images/Files/Link/SCHEMES/SCUTDUGIII.rar') ?>" target="_blank" class="eng-download-btn btn-wide"><i class="fa fa-file-archive"></i> III Sem (Non-CBCS)</a>
                      <a href="<?= base_url('assets/images/Files/Link/SCHEMES/IVRevisUGScheme17.rar') ?>" target="_blank" class="eng-download-btn btn-wide"><i class="fa fa-file-archive"></i> IV Sem (Non-CBCS)</a>
                      <a href="<?= base_url('assets/images/Files/Link/SCHEMES/UTDUG_VSCH.rar') ?>" target="_blank" class="eng-download-btn btn-wide"><i class="fa fa-file-archive"></i> V Sem (Non-CBCS)</a>
                      <a href="<?= base_url('assets/images/Files/Link/SCHEMES/VI UG Scheme Jan 2017.zip') ?>" target="_blank" class="eng-download-btn btn-wide"><i class="fa fa-file-archive"></i> VI Sem (Non-CBCS)</a>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td class="fw-bold">
                    <div class="eng-branch-name"><i class="fa fa-book text-primary"></i> All PG Courses (MA / M.Sc. / M.Com.)</div>
                  </td>
                  <td colspan="3" class="text-center">
                    <div class="d-flex flex-wrap gap-2 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SCHEMES/SCUTDPG_Ir.zip') ?>" target="_blank" class="eng-download-btn btn-wide"><i class="fa fa-file-archive"></i> I Sem PG Scheme</a>
                      <a href="<?= base_url('assets/images/Files/Link/SCHEMES/SCUTDPG_IIr.zip') ?>" target="_blank" class="eng-download-btn btn-wide"><i class="fa fa-file-archive"></i> II Sem PG Scheme</a>
                      <a href="<?= base_url('assets/images/Files/Link/SCHEMES/SCUTDPG_IIIrr.zip') ?>" target="_blank" class="eng-download-btn btn-wide"><i class="fa fa-file-archive"></i> III Sem PG Scheme</a>
                      <a href="<?= base_url('assets/images/Files/Link/SCHEMES/SCUTDPC_IV (2).zip') ?>" target="_blank" class="eng-download-btn btn-wide"><i class="fa fa-file-archive"></i> IV Sem PG Scheme</a>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div id="noMatchBox" class="no-match-box">
          <i class="fa fa-search fa-2x mb-2 text-muted"></i>
          <h6>No schemes found matching your search.</h6>
          <p class="small text-muted mb-0">Try clearing the search query or searching with a different keyword.</p>
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
  const searchInput = document.getElementById('schemeSearch');
  const clearBtn = document.getElementById('clearSearch');
  const visibleCount = document.getElementById('visibleCount');
  const noMatchBox = document.getElementById('noMatchBox');
  const tables = document.querySelectorAll('.scheme-table');
  const allRows = document.querySelectorAll('.scheme-table tbody tr');
  const totalRows = allRows.length;

  function filterSchemes() {
    const q = searchInput.value.toLowerCase().trim();
    let count = 0;

    if (clearBtn) {
      clearBtn.style.display = q ? 'block' : 'none';
    }

    tables.forEach(table => {
      const rows = table.querySelectorAll('tbody tr');
      let tableHasVisible = false;

      rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        if (text.includes(q)) {
          row.style.display = '';
          tableHasVisible = true;
          count++;
        } else {
          row.style.display = 'none';
        }
      });

      const wrapper = table.closest('.eng-table-wrapper');
      if (wrapper) {
        wrapper.style.display = (tableHasVisible || q === '') ? '' : 'none';
      }
    });

    if (visibleCount) {
      visibleCount.textContent = count;
    }

    if (count === 0 && totalRows > 0) {
      if (noMatchBox) noMatchBox.style.display = 'block';
    } else {
      if (noMatchBox) noMatchBox.style.display = 'none';
    }
  }

  if (searchInput) {
    searchInput.addEventListener('input', filterSchemes);
  }

  if (clearBtn) {
    clearBtn.addEventListener('click', function() {
      searchInput.value = '';
      filterSchemes();
      searchInput.focus();
    });
  }
});
</script>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>