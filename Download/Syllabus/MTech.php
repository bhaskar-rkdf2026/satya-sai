<?php
$page_title = 'Master of Technology (M.Tech.) Syllabus - SSSUTMS';
$banner_title = 'M.Tech';
$banner_category = 'Syllabus';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
  .mtech-page-container {
    background: #ffffff;
    border-radius: 14px;
    border: 1px solid #e2e8f0;
    box-shadow: 0 4px 20px rgba(11, 37, 69, 0.05);
    overflow: hidden;
    margin-bottom: 2rem;
  }

  .mtech-header-banner {
    background: linear-gradient(135deg, #0b2545 0%, #134074 100%);
    color: #ffffff;
    padding: 1.75rem 2rem;
    position: relative;
    border-radius: 14px;
    margin-bottom: 1.5rem;
    box-shadow: 0 8px 24px rgba(11, 37, 69, 0.15);
  }
  .mtech-header-banner::after {
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
  .mtech-header-badge {
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

  .mtech-search-box {
    position: relative;
    max-width: 460px;
    width: 100%;
  }
  .mtech-search-box input {
    padding-left: 2.75rem;
    padding-right: 2.5rem;
    height: 44px;
    border-radius: 50px;
    border: 1.5px solid #cbd5e1;
    font-size: 0.9rem;
    transition: all 0.2s ease;
  }
  .mtech-search-box input:focus {
    border-color: #0b2545;
    box-shadow: 0 0 0 4px rgba(11, 37, 69, 0.12);
  }
  .mtech-search-box .search-icon {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: #64748b;
    font-size: 0.95rem;
  }
  .mtech-search-box .clear-btn {
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
  .mtech-search-box .clear-btn:hover {
    color: #0b2545;
  }

  .mtech-table-wrapper {
    background: #ffffff;
    border-radius: 12px;
    border: 1px solid #e2e8f0;
    overflow: hidden;
    margin-bottom: 2rem;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
  }

  .mtech-section-header {
    background: #f8fafc;
    border-bottom: 2px solid #e2e8f0;
    padding: 1.1rem 1.5rem;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
  }
  .mtech-section-title {
    font-size: 1.05rem;
    font-weight: 700;
    color: #0b2545;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 8px;
  }
  .mtech-section-badge {
    font-size: 0.75rem;
    font-weight: 600;
    padding: 4px 12px;
    border-radius: 50px;
    background: rgba(11, 37, 69, 0.08);
    color: #0b2545;
    letter-spacing: 0.3px;
  }

  .mtech-table {
    margin-bottom: 0;
    width: 100%;
    vertical-align: middle;
    border-collapse: collapse;
  }
  .mtech-table thead th {
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
  .mtech-table thead th:nth-child(2) {
    text-align: left;
  }
  .mtech-table tbody tr {
    transition: background-color 0.15s ease;
    border-bottom: 1px solid #edf2f7;
  }
  .mtech-table tbody tr:hover {
    background-color: #f1f5f9;
  }
  .mtech-table tbody tr:last-child {
    border-bottom: none;
  }
  .mtech-table td {
    padding: 12px 14px;
    font-size: 0.86rem;
    color: #334155;
    vertical-align: middle;
  }

  .mtech-branch-name {
    display: flex;
    align-items: center;
    gap: 10px;
    font-weight: 600;
    color: #0f172a;
  }
  .mtech-branch-name i {
    width: 22px;
    text-align: center;
    font-size: 0.95rem;
    color: #0b2545;
    flex-shrink: 0;
  }

  .mtech-download-btn {
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
  .mtech-download-btn:hover {
    background: #f59e0b;
    color: #0b2545 !important;
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(245, 158, 11, 0.35);
  }
  .mtech-download-btn i {
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
        <div class="mtech-header-banner">
          <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-2">
            <span class="mtech-header-badge">
              <i class="fa fa-graduation-cap me-1"></i> Faculty of Engineering &amp; Technology
            </span>
            <span class="badge bg-white text-dark px-3 py-2 fw-semibold">
              <i class="fa fa-university me-1 text-primary"></i> SSSUTMS
            </span>
          </div>
          <h2 class="h3 fw-bold text-white mt-2 mb-1">MASTER OF TECHNOLOGY (M.TECH.) SYLLABUS</h2>
          <p class="text-white-50 mb-0">Postgraduate Engineering Specializations &amp; Semester-wise Course Curriculum</p>
        </div>

        <!-- Filter & Search Bar -->
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-3">
          <div class="mtech-search-box">
            <i class="fa fa-search search-icon"></i>
            <input type="text" id="schemeSearch" class="form-control" placeholder="Search specialization, semester, or branch...">
            <button id="clearSearch" class="clear-btn" type="button"><i class="fa fa-times-circle"></i></button>
          </div>
          <div class="text-muted small">
            Showing <span id="visibleCount" class="fw-bold text-dark">11</span> Specializations
          </div>
        </div>

        <!-- Table: M.Tech Programs -->
        <div class="mtech-table-wrapper">
          <div class="mtech-section-header">
            <h5 class="mtech-section-title">
              <i class="fa fa-book-open text-primary"></i> M.Tech. Semester-wise Syllabi across Specializations
            </h5>
            <span class="mtech-section-badge">2-Year PG Degree</span>
          </div>
          <div class="table-responsive">
            <table class="table mtech-table scheme-table">
              <thead>
                <tr>
                  <th style="width: 55px;">SR.</th>
                  <th class="text-start">SPECIALIZATION BRANCH</th>
                  <th style="width: 175px;">FIRST SEMESTER</th>
                  <th style="width: 175px;">SECOND SEMESTER</th>
                  <th style="width: 175px;">THIRD SEMESTER</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-center fw-bold">1</td>
                  <td>
                    <div class="mtech-branch-name">
                      <i class="fa fa-laptop-code text-primary"></i>
                      <span>Computer Science and Engineering</span>
                    </div>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SY_MTCS_I.pdf') ?>" target="_blank" class="mtech-download-btn"><i class="fa fa-file-pdf"></i> First Sem</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SY_MCSE_II.pdf') ?>" target="_blank" class="mtech-download-btn"><i class="fa fa-file-pdf"></i> Second Sem</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SyllabusIIIsem/Syllabus2015/MTECH/SYCSE_III.pdf') ?>" target="_blank" class="mtech-download-btn"><i class="fa fa-file-pdf"></i> Third Sem</a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center fw-bold">2</td>
                  <td>
                    <div class="mtech-branch-name">
                      <i class="fa fa-code-branch text-primary"></i>
                      <span>Computer Technology and Application</span>
                    </div>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SY_MTCTA_I.pdf') ?>" target="_blank" class="mtech-download-btn"><i class="fa fa-file-pdf"></i> First Sem</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SY_MCTA_II.pdf') ?>" target="_blank" class="mtech-download-btn"><i class="fa fa-file-pdf"></i> Second Sem</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/M.TECH CTA III SEM SYLLABUS 2022.pdf') ?>" target="_blank" class="mtech-download-btn"><i class="fa fa-file-pdf"></i> Third Sem</a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center fw-bold">3</td>
                  <td>
                    <div class="mtech-branch-name">
                      <i class="fa fa-satellite-dish text-primary"></i>
                      <span>Digital Communication</span>
                    </div>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SY_MTDC_I.pdf') ?>" target="_blank" class="mtech-download-btn"><i class="fa fa-file-pdf"></i> First Sem</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SY_DC_II.pdf') ?>" target="_blank" class="mtech-download-btn"><i class="fa fa-file-pdf"></i> Second Sem</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SyllabusIIIsem/Syllabus2015/MTECH/SYDC_III.pdf') ?>" target="_blank" class="mtech-download-btn"><i class="fa fa-file-pdf"></i> Third Sem</a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center fw-bold">4</td>
                  <td>
                    <div class="mtech-branch-name">
                      <i class="fa fa-bolt text-primary"></i>
                      <span>Electrical Power System</span>
                    </div>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SY_MTEPS_I.pdf') ?>" target="_blank" class="mtech-download-btn"><i class="fa fa-file-pdf"></i> First Sem</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SY_EPS_II.pdf') ?>" target="_blank" class="mtech-download-btn"><i class="fa fa-file-pdf"></i> Second Sem</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SyllabusIIIsem/Syllabus2015/MTECH/SYEPS_III.pdf') ?>" target="_blank" class="mtech-download-btn"><i class="fa fa-file-pdf"></i> Third Sem</a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center fw-bold">5</td>
                  <td>
                    <div class="mtech-branch-name">
                      <i class="fa fa-industry text-primary"></i>
                      <span>Industrial Design</span>
                    </div>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SY_MTID_I.pdf') ?>" target="_blank" class="mtech-download-btn"><i class="fa fa-file-pdf"></i> First Sem</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SY_ID_II.pdf') ?>" target="_blank" class="mtech-download-btn"><i class="fa fa-file-pdf"></i> Second Sem</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SyllabusIIIsem/SYID_III.pdf') ?>" target="_blank" class="mtech-download-btn"><i class="fa fa-file-pdf"></i> Third Sem</a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center fw-bold">6</td>
                  <td>
                    <div class="mtech-branch-name">
                      <i class="fa fa-network-wired text-primary"></i>
                      <span>Information Technology</span>
                    </div>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SY_MTIT_I.pdf') ?>" target="_blank" class="mtech-download-btn"><i class="fa fa-file-pdf"></i> First Sem</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SY_MIT_II.pdf') ?>" target="_blank" class="mtech-download-btn"><i class="fa fa-file-pdf"></i> Second Sem</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SyllabusIIIsem/Syllabus2015/MTECH/SYIT_III.pdf') ?>" target="_blank" class="mtech-download-btn"><i class="fa fa-file-pdf"></i> Third Sem</a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center fw-bold">7</td>
                  <td>
                    <div class="mtech-branch-name">
                      <i class="fa fa-plug text-primary"></i>
                      <span>Power Electronics</span>
                    </div>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SY_MTPE_I.pdf') ?>" target="_blank" class="mtech-download-btn"><i class="fa fa-file-pdf"></i> First Sem</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SY_PE_II.pdf') ?>" target="_blank" class="mtech-download-btn"><i class="fa fa-file-pdf"></i> Second Sem</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SyllabusIIIsem/Syllabus2015/MTECH/SYPE_III.pdf') ?>" target="_blank" class="mtech-download-btn"><i class="fa fa-file-pdf"></i> Third Sem</a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center fw-bold">8</td>
                  <td>
                    <div class="mtech-branch-name">
                      <i class="fa fa-laptop-file text-primary"></i>
                      <span>Software Engineering</span>
                    </div>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SY_MTSE_I.pdf') ?>" target="_blank" class="mtech-download-btn"><i class="fa fa-file-pdf"></i> First Sem</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SY_MSE_II.pdf') ?>" target="_blank" class="mtech-download-btn"><i class="fa fa-file-pdf"></i> Second Sem</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SyllabusIIIsem/Syllabus2015/MTECH/SYMSE_III.pdf') ?>" target="_blank" class="mtech-download-btn"><i class="fa fa-file-pdf"></i> Third Sem</a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center fw-bold">9</td>
                  <td>
                    <div class="mtech-branch-name">
                      <i class="fa fa-drafting-compass text-primary"></i>
                      <span>Structural Design</span>
                    </div>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SY_MTSD_I.pdf') ?>" target="_blank" class="mtech-download-btn"><i class="fa fa-file-pdf"></i> First Sem</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SY_SD_II.pdf') ?>" target="_blank" class="mtech-download-btn"><i class="fa fa-file-pdf"></i> Second Sem</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SyllabusIIIsem/Syllabus2015/MTECH/SYSD_III.pdf') ?>" target="_blank" class="mtech-download-btn"><i class="fa fa-file-pdf"></i> Third Sem</a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center fw-bold">10</td>
                  <td>
                    <div class="mtech-branch-name">
                      <i class="fa fa-fire-alt text-primary"></i>
                      <span>Thermal Engineering</span>
                    </div>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SY_MTTH_I.pdf') ?>" target="_blank" class="mtech-download-btn"><i class="fa fa-file-pdf"></i> First Sem</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SY_TH_II.pdf') ?>" target="_blank" class="mtech-download-btn"><i class="fa fa-file-pdf"></i> Second Sem</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SyllabusIIIsem/Syllabus2015/MTECH/SYTH_III.pdf') ?>" target="_blank" class="mtech-download-btn"><i class="fa fa-file-pdf"></i> Third Sem</a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center fw-bold">11</td>
                  <td>
                    <div class="mtech-branch-name">
                      <i class="fa fa-microchip text-primary"></i>
                      <span>VLSI Design</span>
                    </div>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/MTech/SY_MTVLSI_I.pdf') ?>" target="_blank" class="mtech-download-btn"><i class="fa fa-file-pdf"></i> First Sem</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SY_VLSI_II.pdf') ?>" target="_blank" class="mtech-download-btn"><i class="fa fa-file-pdf"></i> Second Sem</a>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('assets/images/Files/Link/SYLLABUS/SyllabusIIIsem/Syllabus2015/MTECH/SYVL_III.pdf') ?>" target="_blank" class="mtech-download-btn"><i class="fa fa-file-pdf"></i> Third Sem</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div id="noResults" class="no-results-msg mtech-table-wrapper">
          <i class="fa fa-search fa-2x mb-3 text-muted"></i>
          <h5>No Specializations Found</h5>
          <p class="text-muted mb-0">No matching branches found. Try searching for "VLSI", "Thermal", "Computer Science", or "Structural".</p>
        </div>

      </div>

      <!-- Right Sidebar (Navigation / Quick Links) -->
      <div class="col-lg-4 col-xl-3">
        
        <!-- Quick Downloads Widget -->
        <div class="sidebar-widget">
          <h5 class="sidebar-widget-title">
            <i class="fa fa-download text-primary"></i> M.Tech Downloads
          </h5>
          <ul class="quick-links-list">
            <li>
              <a href="<?= base_url('Download/Scheme/MTech.php') ?>">
                <span><i class="fa fa-table me-2 text-primary"></i> M.Tech Scheme</span>
                <i class="fa fa-chevron-right text-muted small"></i>
              </a>
            </li>
            <li>
              <a href="<?= base_url('Download/Syllabus/MTech.php') ?>" class="active">
                <span><i class="fa fa-book-open me-2 text-warning"></i> M.Tech Syllabus</span>
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
    const rows = document.querySelectorAll('.scheme-table tbody tr');
    const noResultsMsg = document.getElementById('noResults');

    function filterTable() {
      const q = searchInput.value.toLowerCase().trim();
      clearBtn.style.display = q.length > 0 ? 'block' : 'none';

      let totalVisible = 0;

      rows.forEach(function(row) {
        const text = row.innerText.toLowerCase();
        if (text.includes(q)) {
          row.style.display = '';
          totalVisible++;
        } else {
          row.style.display = 'none';
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