<?php
$page_title = 'Faculty of Education Syllabus - SSSUTMS';
$banner_title = 'Education';
$banner_category = 'Syllabus';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
  .edu-page-container {
    background: #ffffff;
    border-radius: 14px;
    border: 1px solid #e2e8f0;
    box-shadow: 0 4px 20px rgba(11, 37, 69, 0.05);
    overflow: hidden;
    margin-bottom: 2rem;
  }

  .edu-header-banner {
    background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
    color: #ffffff;
    padding: 1.75rem 2rem;
    position: relative;
    border-radius: 14px;
    margin-bottom: 1.5rem;
    box-shadow: 0 8px 24px rgba(11, 37, 69, 0.15);
  }
  .edu-header-banner::after {
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
  .edu-header-badge {
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

  .edu-search-box {
    position: relative;
    max-width: 460px;
    width: 100%;
  }
  .edu-search-box input {
    padding-left: 2.75rem;
    padding-right: 2.5rem;
    height: 44px;
    border-radius: 50px;
    border: 1.5px solid #cbd5e1;
    font-size: 0.9rem;
    transition: all 0.2s ease;
  }
  .edu-search-box input:focus {
    border-color: #0b2545;
    box-shadow: 0 0 0 4px rgba(11, 37, 69, 0.12);
  }
  .edu-search-box .search-icon {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: #64748b;
    font-size: 0.95rem;
  }
  .edu-search-box .clear-btn {
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
  .edu-search-box .clear-btn:hover {
    color: #0b2545;
  }

  .edu-nav-pills {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-bottom: 1.25rem;
  }
  .edu-nav-pill-btn {
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
  .edu-nav-pill-btn:hover,
  .edu-nav-pill-btn.active {
    background: #0b2545;
    border-color: #0b2545;
    color: #ffffff;
  }

  .edu-table-wrapper {
    background: #ffffff;
    border-radius: 12px;
    border: 1px solid #e2e8f0;
    overflow: hidden;
    margin-bottom: 2rem;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
  }

  .edu-section-header {
    background: #f8fafc;
    border-bottom: 2px solid #e2e8f0;
    padding: 1.1rem 1.5rem;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
  }
  .edu-section-title {
    font-size: 1.05rem;
    font-weight: 700;
    color: #0b2545;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 8px;
  }
  .edu-section-badge {
    font-size: 0.75rem;
    font-weight: 600;
    padding: 4px 12px;
    border-radius: 50px;
    background: rgba(11, 37, 69, 0.08);
    color: #0b2545;
    letter-spacing: 0.3px;
  }

  .edu-table {
    margin-bottom: 0;
    width: 100%;
    vertical-align: middle;
    border-collapse: collapse;
  }
  .edu-table thead th {
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
  .edu-table thead th:nth-child(2) {
    text-align: left;
  }
  .edu-table tbody tr {
    transition: background-color 0.15s ease;
    border-bottom: 1px solid #edf2f7;
  }
  .edu-table tbody tr:hover {
    background-color: #f1f5f9;
  }
  .edu-table tbody tr:last-child {
    border-bottom: none;
  }
  .edu-table td {
    padding: 12px 14px;
    font-size: 0.86rem;
    color: #334155;
    vertical-align: middle;
  }

  .edu-download-btn {
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
  .edu-download-btn:hover {
    background: #f59e0b;
    color: #0b2545 !important;
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(245, 158, 11, 0.35);
  }
  .edu-download-btn i {
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
        <div class="edu-header-banner">
          <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-2">
            <span class="edu-header-badge">
              <i class="fa fa-chalkboard-teacher me-1"></i> Faculty of Education
            </span>
            <span class="badge bg-white text-dark px-3 py-2 fw-semibold">
              <i class="fa fa-university me-1 text-primary"></i> SSSUTMS
            </span>
          </div>
          <h2 class="h3 fw-bold text-white mt-2 mb-1">FACULTY OF EDUCATION SYLLABUS</h2>
          <p class="text-white-50 mb-0">NCTE Aligned &amp; University Syllabi for B.Ed. &amp; B.A. B.Ed. (Integrated 4-Year Program)</p>
        </div>

        <!-- Quick Jump Pills -->
        <div class="edu-nav-pills">
          <a href="#bed-section" class="edu-nav-pill-btn"><i class="fa fa-graduation-cap text-warning"></i> Bachelor of Education (B.Ed.)</a>
          <a href="#babed-section" class="edu-nav-pill-btn"><i class="fa fa-book-reader text-warning"></i> B.A. B.Ed. (Integrated 4-Year)</a>
        </div>

        <!-- Filter & Search Bar -->
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-3">
          <div class="edu-search-box">
            <i class="fa fa-search search-icon"></i>
            <input type="text" id="schemeSearch" class="form-control" placeholder="Search course, semester, or year...">
            <button id="clearSearch" class="clear-btn" type="button"><i class="fa fa-times-circle"></i></button>
          </div>
          <div class="text-muted small">
            Showing <span id="visibleCount" class="fw-bold text-dark">4</span> Programs
          </div>
        </div>

        <!-- Table 1: Bachelor of Education (B.Ed.) -->
        <div id="bed-section" class="edu-table-wrapper">
          <div class="edu-section-header">
            <h5 class="edu-section-title">
              <i class="fa fa-graduation-cap text-primary"></i> Bachelor of Education (B.Ed.) Syllabi
            </h5>
            <span class="edu-section-badge">2-Year Teacher Education Program</span>
          </div>
          <div class="table-responsive">
            <table class="table edu-table scheme-table">
              <thead>
                <tr>
                  <th style="width: 55px;">SR.</th>
                  <th class="text-start">COURSE &amp; SCHEME</th>
                  <th style="width: 175px;">I SEMESTER</th>
                  <th style="width: 175px;">II SEMESTER</th>
                  <th style="width: 175px;">III SEMESTER</th>
                  <th style="width: 175px;">IV SEMESTER</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-center fw-bold">1</td>
                  <td>
                    <div class="d-flex align-items-center gap-2 fw-semibold">
                      <i class="fa fa-layer-group text-primary"></i>
                      <span>Bachelor of Education (CBCS)</span>
                    </div>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/bed_cbcs.pdf') ?>" target="_blank" class="edu-download-btn"><i class="fa fa-file-pdf"></i> First Sem</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/BEDCII17SYL.pdf') ?>" target="_blank" class="edu-download-btn"><i class="fa fa-file-pdf"></i> Second Sem</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/Syllabus Education/SYBEDC_III.pdf') ?>" target="_blank" class="edu-download-btn"><i class="fa fa-file-pdf"></i> Third Sem</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/Syllabus Education/SYBEDC_IV.pdf') ?>" target="_blank" class="edu-download-btn"><i class="fa fa-file-pdf"></i> Fourth Sem</a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center fw-bold">2</td>
                  <td>
                    <div class="d-flex align-items-center gap-2 fw-semibold">
                      <i class="fa fa-book text-primary"></i>
                      <span>Bachelor of Education (Non-CBCS)</span>
                    </div>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SYBEDNS_I.pdf') ?>" target="_blank" class="edu-download-btn"><i class="fa fa-file-pdf"></i> First Sem</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/B.EdIIY.pdf') ?>" target="_blank" class="edu-download-btn"><i class="fa fa-file-pdf"></i> Second Year</a>
                  </td>
                  <td class="text-center text-muted">-</td>
                  <td class="text-center text-muted">-</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Table 2: B.A. B.Ed. Integrated 4-Year Program -->
        <div id="babed-section" class="edu-table-wrapper">
          <div class="edu-section-header">
            <h5 class="edu-section-title">
              <i class="fa fa-book-reader text-primary"></i> Bachelor of Arts &amp; Bachelor of Education (B.A. B.Ed.) Integrated
            </h5>
            <span class="edu-section-badge">4-Year Integrated Teacher Education</span>
          </div>
          <div class="table-responsive">
            <table class="table edu-table scheme-table">
              <thead>
                <tr>
                  <th style="width: 55px;">SR.</th>
                  <th class="text-start">PROGRAM CURRICULUM</th>
                  <th style="width: 180px;">I YEAR (SEM I &amp; II)</th>
                  <th style="width: 180px;">II YEAR (SEM III &amp; IV)</th>
                  <th style="width: 180px;">III YEAR (SEM V &amp; VI)</th>
                  <th style="width: 180px;">IV YEAR (SEM VII &amp; VIII)</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-center fw-bold">1</td>
                  <td>
                    <div class="d-flex align-items-center gap-2 fw-semibold">
                      <i class="fa fa-layer-group text-primary"></i>
                      <span>B.A. B.Ed. (Year-wise CBCS Curriculum)</span>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/babed_Is_year__Ist_Sem_syllabus_2021--22_(1)_09072022_1214.pdf') ?>" target="_blank" class="edu-download-btn"><i class="fa fa-file-pdf"></i> I Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/babed_syllabus_II_sem_2021-22_final_09072022_1214.pdf') ?>" target="_blank" class="edu-download-btn"><i class="fa fa-file-pdf"></i> II Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/Syllabus Education/SYBABed_III_IV.pdf') ?>" target="_blank" class="edu-download-btn"><i class="fa fa-file-pdf"></i> II Year</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/CBCS SYLLABUS/Syllabus Education/SYBABed_V_VI.pdf') ?>" target="_blank" class="edu-download-btn"><i class="fa fa-file-pdf"></i> III Year</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/BA_BED_syllabus_VIII.pdf') ?>" target="_blank" class="edu-download-btn"><i class="fa fa-file-pdf"></i> IV Year</a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center fw-bold">2</td>
                  <td>
                    <div class="d-flex align-items-center gap-2 fw-semibold">
                      <i class="fa fa-calendar-alt text-primary"></i>
                      <span>B.A. B.Ed. (Semester-wise Syllabi 2021-2025)</span>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/babed_Is_year__Ist_Sem_syllabus_2021--22_(1)_09072022_1214.pdf') ?>" target="_blank" class="edu-download-btn"><i class="fa fa-file-pdf"></i> I Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/babed_syllabus_II_sem_2021-22_final_09072022_1214.pdf') ?>" target="_blank" class="edu-download-btn"><i class="fa fa-file-pdf"></i> II Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/babed1_04112022_0415.pdf') ?>" target="_blank" class="edu-download-btn"><i class="fa fa-file-pdf"></i> III Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/babed II year syllabus2022-2023 final..pdf') ?>" target="_blank" class="edu-download-btn"><i class="fa fa-file-pdf"></i> IV Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/syllabus 2023-24/babed III year V sem syllabus.pdf') ?>" target="_blank" class="edu-download-btn"><i class="fa fa-file-pdf"></i> V Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/BABED6.pdf') ?>" target="_blank" class="edu-download-btn"><i class="fa fa-file-pdf"></i> VI Sem</a>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                      <a href="<?= base_url('assets/images/Files/Link/syllabus_7_sem_19122024_0455.pdf') ?>" target="_blank" class="edu-download-btn"><i class="fa fa-file-pdf"></i> VII Sem</a>
                      <a href="<?= base_url('assets/images/Files/Link/SCHEME/BABED/CamScanner 02-21-2025 11.52.pdf') ?>" target="_blank" class="edu-download-btn"><i class="fa fa-file-pdf"></i> VIII Sem</a>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div id="noResults" class="no-results-msg edu-table-wrapper">
          <i class="fa fa-search fa-2x mb-3 text-muted"></i>
          <h5>No Education Syllabi Found</h5>
          <p class="text-muted mb-0">No matching records found. Try searching for "B.Ed", "B.A. B.Ed", "CBCS", or "Semester".</p>
        </div>

      </div>

      <!-- Right Sidebar (Navigation / Quick Links) -->
      <div class="col-lg-4 col-xl-3">
        
        <!-- Quick Downloads Widget -->
        <div class="sidebar-widget">
          <h5 class="sidebar-widget-title">
            <i class="fa fa-download text-primary"></i> Education Downloads
          </h5>
          <ul class="quick-links-list">
            <li>
              <a href="<?= base_url('Download/Scheme/Education.php') ?>">
                <span><i class="fa fa-table me-2 text-primary"></i> Education Scheme</span>
                <i class="fa fa-chevron-right text-muted small"></i>
              </a>
            </li>
            <li>
              <a href="<?= base_url('Download/Syllabus/Education.php') ?>" class="active">
                <span><i class="fa fa-book-open me-2 text-warning"></i> Education Syllabus</span>
                <i class="fa fa-chevron-right text-white small"></i>
              </a>
            </li>
            <li>
              <a href="<?= base_url('Download/Scheme/Physical_Education.php') ?>">
                <span><i class="fa fa-running me-2 text-primary"></i> Physical Education Scheme</span>
                <i class="fa fa-chevron-right text-muted small"></i>
              </a>
            </li>
            <li>
              <a href="<?= base_url('Download/Syllabus/PhysicalEducation.php') ?>">
                <span><i class="fa fa-book me-2 text-primary"></i> Physical Education Syllabus</span>
                <i class="fa fa-chevron-right text-muted small"></i>
              </a>
            </li>
            <li>
              <a href="<?= base_url('Download/Scheme/BLibISc.php') ?>">
                <span><i class="fa fa-book-reader me-2 text-primary"></i> B.Lib.I.Sc. Scheme</span>
                <i class="fa fa-chevron-right text-muted small"></i>
              </a>
            </li>
            <li>
              <a href="<?= base_url('Download/Syllabus/BLibISc.php') ?>">
                <span><i class="fa fa-book me-2 text-primary"></i> B.Lib.I.Sc. Syllabus</span>
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
              <a href="<?= base_url('Download/Syllabus/BE.php') ?>">
                <span><i class="fa fa-cogs me-2 text-primary"></i> Bachelor of Engineering (BE)</span>
                <i class="fa fa-chevron-right text-muted small"></i>
              </a>
            </li>
            <li>
              <a href="<?= base_url('Download/Syllabus/MTech.php') ?>">
                <span><i class="fa fa-graduation-cap me-2 text-primary"></i> M.Tech</span>
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
    const tableWrappers = document.querySelectorAll('.edu-table-wrapper:not(#noResults)');
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