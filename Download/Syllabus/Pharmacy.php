<?php
$page_title = 'Faculty of Pharmacy Syllabus - SSSUTMS';
$banner_title = 'Pharmacy';
$banner_category = 'Syllabus';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
  .pharm-page-container {
    background: #ffffff;
    border-radius: 14px;
    border: 1px solid #e2e8f0;
    box-shadow: 0 4px 20px rgba(11, 37, 69, 0.05);
    overflow: hidden;
    margin-bottom: 2rem;
  }

  .pharm-header-banner {
    background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
    color: #ffffff;
    padding: 1.75rem 2rem;
    position: relative;
    border-radius: 14px;
    margin-bottom: 1.5rem;
    box-shadow: 0 8px 24px rgba(11, 37, 69, 0.15);
  }
  .pharm-header-banner::after {
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
  .pharm-header-badge {
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

  .pharm-search-box {
    position: relative;
    max-width: 460px;
    width: 100%;
  }
  .pharm-search-box input {
    padding-left: 2.75rem;
    padding-right: 2.5rem;
    height: 44px;
    border-radius: 50px;
    border: 1.5px solid #cbd5e1;
    font-size: 0.9rem;
    transition: all 0.2s ease;
  }
  .pharm-search-box input:focus {
    border-color: #0b2545;
    box-shadow: 0 0 0 4px rgba(11, 37, 69, 0.12);
  }
  .pharm-search-box .search-icon {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: #64748b;
    font-size: 0.95rem;
  }
  .pharm-search-box .clear-btn {
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
  .pharm-search-box .clear-btn:hover {
    color: #0b2545;
  }

  .pharm-nav-pills {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-bottom: 1.25rem;
  }
  .pharm-nav-pill-btn {
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
  .pharm-nav-pill-btn:hover,
  .pharm-nav-pill-btn.active {
    background: #0b2545;
    border-color: #0b2545;
    color: #ffffff;
  }

  .pharm-table-wrapper {
    background: #ffffff;
    border-radius: 12px;
    border: 1px solid #e2e8f0;
    overflow: hidden;
    margin-bottom: 2rem;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
  }

  .pharm-section-header {
    background: #f8fafc;
    border-bottom: 2px solid #e2e8f0;
    padding: 1.1rem 1.5rem;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
  }
  .pharm-section-title {
    font-size: 1.05rem;
    font-weight: 700;
    color: #0b2545;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 8px;
  }
  .pharm-section-badge {
    font-size: 0.75rem;
    font-weight: 600;
    padding: 4px 12px;
    border-radius: 50px;
    background: rgba(11, 37, 69, 0.08);
    color: #0b2545;
    letter-spacing: 0.3px;
  }

  .pharm-table {
    margin-bottom: 0;
    width: 100%;
    vertical-align: middle;
    border-collapse: collapse;
  }
  .pharm-table thead th {
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
  .pharm-table thead th:nth-child(2) {
    text-align: left;
  }
  .pharm-table tbody tr {
    transition: background-color 0.15s ease;
    border-bottom: 1px solid #edf2f7;
  }
  .pharm-table tbody tr:hover {
    background-color: #f1f5f9;
  }
  .pharm-table tbody tr:last-child {
    border-bottom: none;
  }
  .pharm-table td {
    padding: 12px 14px;
    font-size: 0.86rem;
    color: #334155;
    vertical-align: middle;
  }

  .pharm-download-btn {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 6px 14px;
    font-size: 0.8rem;
    font-weight: 600;
    border-radius: 6px;
    background: #0b2545;
    color: #ffffff !important;
    text-decoration: none;
    transition: all 0.2s ease;
    box-shadow: 0 1px 3px rgba(11, 37, 69, 0.15);
    white-space: nowrap;
  }
  .pharm-download-btn:hover {
    background: #f59e0b;
    color: #0b2545 !important;
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(245, 158, 11, 0.35);
  }
  .pharm-download-btn i {
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
        <div class="pharm-header-banner">
          <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-2">
            <span class="pharm-header-badge">
              <i class="fa fa-pills me-1"></i> Faculty of Pharmacy
            </span>
            <span class="badge bg-white text-dark px-3 py-2 fw-semibold">
              <i class="fa fa-university me-1 text-primary"></i> SSSUTMS
            </span>
          </div>
          <h2 class="h3 fw-bold text-white mt-2 mb-1">FACULTY OF PHARMACY SYLLABUS</h2>
          <p class="text-white-50 mb-0">PCI Model Curriculum, CBCS &amp; University Syllabi for B.Pharm, M.Pharm &amp; D.Pharm</p>
        </div>

        <!-- Quick Jump Pills -->
        <div class="pharm-nav-pills">
          <a href="#bpharm-section" class="pharm-nav-pill-btn"><i class="fa fa-capsules text-warning"></i> B. Pharmacy (8 Semesters)</a>
          <a href="#mpharm-section" class="pharm-nav-pill-btn"><i class="fa fa-prescription-bottle-alt text-warning"></i> M. Pharmacy (PG Specializations)</a>
          <a href="#dpharm-section" class="pharm-nav-pill-btn"><i class="fa fa-mortar-pestle text-warning"></i> D. Pharmacy (Diploma)</a>
        </div>

        <!-- Filter & Search Bar -->
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-3">
          <div class="pharm-search-box">
            <i class="fa fa-search search-icon"></i>
            <input type="text" id="schemeSearch" class="form-control" placeholder="Search semester, program, or specialization...">
            <button id="clearSearch" class="clear-btn" type="button"><i class="fa fa-times-circle"></i></button>
          </div>
          <div class="text-muted small">
            Showing <span id="visibleCount" class="fw-bold text-dark">12</span> Records
          </div>
        </div>

        <!-- Table 1: Bachelor of Pharmacy (B. Pharm.) -->
        <div id="bpharm-section" class="pharm-table-wrapper">
          <div class="pharm-section-header">
            <h5 class="pharm-section-title">
              <i class="fa fa-capsules text-primary"></i> Bachelor of Pharmacy (B. Pharm.)
            </h5>
            <span class="pharm-section-badge">4-Year Degree (8 Semesters)</span>
          </div>
          <div class="table-responsive">
            <table class="table pharm-table scheme-table">
              <thead>
                <tr>
                  <th style="width: 70px;">SEM</th>
                  <th class="text-start">SEMESTER NAME</th>
                  <th style="width: 250px;">PCI SCHEME (w.e.f. 2017-18)</th>
                  <th style="width: 250px;">YEARLY / PREVIOUS SCHEME</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-center fw-bold">1</td>
                  <td><strong>First Semester</strong></td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/Syllabus BPharmacy/SYBPHC_I.pdf') ?>" target="_blank" class="pharm-download-btn"><i class="fa fa-file-pdf"></i> First Semester (PCI)</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SY_BPH_I.pdf') ?>" target="_blank" class="pharm-download-btn"><i class="fa fa-file-pdf"></i> First Semester</a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center fw-bold">2</td>
                  <td><strong>Second Semester</strong></td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/Syllabus BPharmacy/SYBPHC_II.pdf') ?>" target="_blank" class="pharm-download-btn"><i class="fa fa-file-pdf"></i> Second Semester (PCI)</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/Syllabus BPharmacy/SYBPHC_II.pdf') ?>" target="_blank" class="pharm-download-btn"><i class="fa fa-file-pdf"></i> Second Semester</a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center fw-bold">3</td>
                  <td><strong>Third Semester</strong></td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/Syllabus BPharmacy/SYBPHC_III.pdf') ?>" target="_blank" class="pharm-download-btn"><i class="fa fa-file-pdf"></i> Third Semester (PCI)</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SyllabusIIIsem/SY_BPH_III.pdf') ?>" target="_blank" class="pharm-download-btn"><i class="fa fa-file-pdf"></i> Third Semester</a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center fw-bold">4</td>
                  <td><strong>Fourth Semester</strong></td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/Syllabus BPharmacy/SYBPHC_IV.pdf') ?>" target="_blank" class="pharm-download-btn"><i class="fa fa-file-pdf"></i> Fourth Semester (PCI)</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/syllsbus_iv_sem/BPH4sem.pdf') ?>" target="_blank" class="pharm-download-btn"><i class="fa fa-file-pdf"></i> Fourth Semester</a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center fw-bold">5</td>
                  <td><strong>Fifth Semester</strong></td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/Syllabus BPharmacy/SYBPHC_V.pdf') ?>" target="_blank" class="pharm-download-btn"><i class="fa fa-file-pdf"></i> Fifth Semester (PCI)</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/6 sem syllabus/BPHVSYL.pdf') ?>" target="_blank" class="pharm-download-btn"><i class="fa fa-file-pdf"></i> Fifth Semester</a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center fw-bold">6</td>
                  <td><strong>Sixth Semester</strong></td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/Syllabus BPharmacy/SYBPHC_VI.pdf') ?>" target="_blank" class="pharm-download-btn"><i class="fa fa-file-pdf"></i> Sixth Semester (PCI)</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/6 sem syllabus/BPHVISY.pdf') ?>" target="_blank" class="pharm-download-btn"><i class="fa fa-file-pdf"></i> Sixth Semester</a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center fw-bold">7</td>
                  <td><strong>Seventh Semester</strong></td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/Syllabus BPharmacy/SYBPHC_VII.pdf') ?>" target="_blank" class="pharm-download-btn"><i class="fa fa-file-pdf"></i> Seventh Semester (PCI)</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/7 sem syllabus/SYBP_VII.pdf') ?>" target="_blank" class="pharm-download-btn"><i class="fa fa-file-pdf"></i> Seventh Semester</a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center fw-bold">8</td>
                  <td><strong>Eighth Semester</strong></td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/Syllabus BPharmacy/SYBPHC_VIII.pdf') ?>" target="_blank" class="pharm-download-btn"><i class="fa fa-file-pdf"></i> Eighth Semester (PCI)</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYBP_VIII.pdf') ?>" target="_blank" class="pharm-download-btn"><i class="fa fa-file-pdf"></i> Eighth Semester</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Table 2: Master of Pharmacy (M. Pharm.) -->
        <div id="mpharm-section" class="pharm-table-wrapper">
          <div class="pharm-section-header">
            <h5 class="pharm-section-title">
              <i class="fa fa-prescription-bottle-alt text-primary"></i> Master of Pharmacy (M. Pharm.)
            </h5>
            <span class="pharm-section-badge">Postgraduate Specializations</span>
          </div>
          <div class="table-responsive">
            <table class="table pharm-table scheme-table">
              <thead>
                <tr>
                  <th style="width: 60px;">SR.</th>
                  <th class="text-start">SPECIALIZATION STREAM</th>
                  <th>NEW SYLLABUS (w.e.f. 2017-18)</th>
                  <th style="width: 200px;">OLD SYLLABUS</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-center fw-bold">1</td>
                  <td>
                    <div class="d-flex align-items-center gap-2 fw-semibold">
                      <i class="fa fa-flask text-primary"></i>
                      <span>Pharmacology</span>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYWEF2017/SYMPHPCOWEF17_I.pdf') ?>" target="_blank" class="pharm-download-btn"><i class="fa fa-file-pdf"></i> I Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYWEF2017/SYPHARMACOLOGY_II.pdf') ?>" target="_blank" class="pharm-download-btn"><i class="fa fa-file-pdf"></i> II Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYWEF2017/SY_MPharmacy_IIISem.pdf') ?>" target="_blank" class="pharm-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/PHCOI_15.pdf') ?>" target="_blank" class="pharm-download-btn"><i class="fa fa-file-pdf"></i> I Year (Old)</a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center fw-bold">2</td>
                  <td>
                    <div class="d-flex align-items-center gap-2 fw-semibold">
                      <i class="fa fa-tablets text-primary"></i>
                      <span>Pharmaceutics</span>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYWEF2017/SYMPHPSEUWEF17_I.pdf') ?>" target="_blank" class="pharm-download-btn"><i class="fa fa-file-pdf"></i> I Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYWEF2017/SYPHARMACEUTICS_II.pdf') ?>" target="_blank" class="pharm-download-btn"><i class="fa fa-file-pdf"></i> II Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYWEF2017/SY_MPharmacy_IIISem.pdf') ?>" target="_blank" class="pharm-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/PHCEI_15.pdf') ?>" target="_blank" class="pharm-download-btn"><i class="fa fa-file-pdf"></i> I Year (Old)</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Table 3: Diploma in Pharmacy (D. Pharm.) -->
        <div id="dpharm-section" class="pharm-table-wrapper">
          <div class="pharm-section-header">
            <h5 class="pharm-section-title">
              <i class="fa fa-mortar-pestle text-primary"></i> Diploma in Pharmacy (D. Pharm.)
            </h5>
            <span class="pharm-section-badge">2-Year Diploma Program</span>
          </div>
          <div class="table-responsive">
            <table class="table pharm-table scheme-table">
              <thead>
                <tr>
                  <th style="width: 60px;">YEAR</th>
                  <th class="text-start">ACADEMIC YEAR</th>
                  <th style="width: 250px;">AS PER PCI (w.e.f. 2021-22)</th>
                  <th style="width: 250px;">YEARLY SCHEME (OLD)</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-center fw-bold">1</td>
                  <td><strong>First Year (D.Pharm I)</strong></td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS2021/SY_DPHARMA_I_2021.pdf') ?>" target="_blank" class="pharm-download-btn"><i class="fa fa-file-pdf"></i> I Year (PCI 2021-22)</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/DPH_I.docx') ?>" target="_blank" class="pharm-download-btn"><i class="fa fa-file-word"></i> I Year (Word)</a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center fw-bold">2</td>
                  <td><strong>Second Year (D.Pharm II)</strong></td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS2021/SY_DPHARMA_II_2021.pdf') ?>" target="_blank" class="pharm-download-btn"><i class="fa fa-file-pdf"></i> II Year (PCI 2021-22)</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/DPH_II.docx') ?>" target="_blank" class="pharm-download-btn"><i class="fa fa-file-word"></i> II Year (Word)</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div id="noResults" class="no-results-msg pharm-table-wrapper">
          <i class="fa fa-search fa-2x mb-3 text-muted"></i>
          <h5>No Pharmacy Syllabi Found</h5>
          <p class="text-muted mb-0">No matching records found. Try searching for "B.Pharm", "Pharmacology", "PCI", or "D.Pharm".</p>
        </div>

      </div>

      <!-- Right Sidebar (Navigation / Quick Links) -->
      <div class="col-lg-4 col-xl-3">
        
        <!-- Quick Downloads Widget -->
        <div class="sidebar-widget">
          <h5 class="sidebar-widget-title">
            <i class="fa fa-download text-primary"></i> Pharmacy Downloads
          </h5>
          <ul class="quick-links-list">
            <li>
              <a href="<?= base_url('Download/Scheme/Pharmacy.php') ?>">
                <span><i class="fa fa-table me-2 text-primary"></i> Pharmacy Scheme</span>
                <i class="fa fa-chevron-right text-muted small"></i>
              </a>
            </li>
            <li>
              <a href="<?= base_url('Download/Syllabus/Pharmacy.php') ?>" class="active">
                <span><i class="fa fa-book-open me-2 text-warning"></i> Pharmacy Syllabus</span>
                <i class="fa fa-chevron-right text-white small"></i>
              </a>
            </li>
            <li>
              <a href="<?= base_url('Download/Scheme/BE.php') ?>">
                <span><i class="fa fa-graduation-cap me-2 text-primary"></i> BE Scheme</span>
                <i class="fa fa-chevron-right text-muted small"></i>
              </a>
            </li>
            <li>
              <a href="<?= base_url('Download/Syllabus/BE.php') ?>">
                <span><i class="fa fa-book me-2 text-primary"></i> BE Syllabus</span>
                <i class="fa fa-chevron-right text-muted small"></i>
              </a>
            </li>
            <li>
              <a href="<?= base_url('Download/Scheme/MTech.php') ?>">
                <span><i class="fa fa-cogs me-2 text-primary"></i> M.Tech Scheme</span>
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
              <a href="<?= base_url('Download/Syllabus/Education.php') ?>">
                <span><i class="fa fa-chalkboard-teacher me-2 text-primary"></i> Education</span>
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
              <a href="<?= base_url('Download/Syllabus/BScHonsAG.php') ?>">
                <span><i class="fa fa-seedling me-2 text-primary"></i> B.Sc. (Hons.) Agriculture</span>
                <i class="fa fa-chevron-right text-muted small"></i>
              </a>
            </li>
            <li>
              <a href="<?= base_url('Download/Syllabus/Polytechnic_Engineering.php') ?>">
                <span><i class="fa fa-tools me-2 text-primary"></i> Polytechnic Engineering</span>
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
    const tableWrappers = document.querySelectorAll('.pharm-table-wrapper:not(#noResults)');
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