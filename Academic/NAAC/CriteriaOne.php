<?php $page_title = 'Criteria 1 - Curriculum Design & Development - SSSUTMS';
$banner_title = 'Criteria 1 – Curriculum Design & Development';
$banner_category = 'Academic';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?><style>
.naac-section { 
  background-color: #f8fafc;
  font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
}
.naac-main-card {
  background: #ffffff;
  border-radius: 16px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 10px 25px rgba(15,23,42,0.06);
  overflow: hidden;
  margin-bottom: 2rem;
}
.naac-header-banner {
  background: linear-gradient(135deg, #0b2545 0%, #134074 100%) !important;
  color: #ffffff !important;
  padding: 1.8rem 2rem;
  position: relative;
}
.naac-header-banner h3,
.naac-header-banner h2,
.naac-header-banner h1,
.naac-header-banner p {
  color: #ffffff !important;
  text-shadow: 0 1px 2px rgba(0,0,0,0.2);
}
.naac-header-banner p {
  color: rgba(255, 255, 255, 0.85) !important;
}
.naac-header-banner::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #f59e0b, #fbbf24);
}

/* Card Body & Typography Enhancements */
.naac-card-body { 
  padding: 2rem; 
  color: #1e293b !important;
  font-size: 0.975rem !important;
  line-height: 1.65 !important;
}
.naac-card-body p {
  color: #1e293b !important;
  font-size: 0.975rem !important;
  line-height: 1.65 !important;
  margin-bottom: 1rem;
}
.naac-card-body strong,
.naac-card-body b {
  color: #0f172a !important;
  font-weight: 700 !important;
}

/* Metric Callout Box Component */
.naac-metric-box {
  background: #f8fafc;
  border-left: 4px solid #0b2545;
  border-radius: 12px;
  border: 1px solid #e2e8f0;
  padding: 1.25rem 1.5rem;
  margin-top: 1.5rem;
  margin-bottom: 1.5rem;
  box-shadow: 0 2px 8px rgba(15, 23, 42, 0.04);
}
.naac-metric-badge {
  background: linear-gradient(135deg, #0b2545 0%, #1e3a8a 100%);
  color: #ffffff !important;
  font-size: 0.825rem;
  font-weight: 700;
  padding: 5px 12px;
  border-radius: 6px;
  letter-spacing: 0.5px;
  text-transform: uppercase;
  white-space: nowrap;
  box-shadow: 0 2px 4px rgba(11, 37, 69, 0.2);
}
.naac-metric-content {
  color: #1e293b !important;
  font-size: 0.975rem !important;
  font-weight: 500 !important;
  line-height: 1.6 !important;
}

/* Custom Table Container */
.table-responsive {
  border-radius: 12px;
  overflow-x: auto;
  border: 1px solid #cbd5e1;
  margin-top: 0.5rem;
  margin-bottom: 1.5rem;
}
.naac-custom-table {
  margin-bottom: 0 !important;
  width: 100% !important;
  border-collapse: collapse !important;
}

/* Unified Dark Navy Header Bar */
.naac-custom-table tr.naac-table-header,
.naac-custom-table thead tr {
  background-color: #0b2545 !important;
}
.naac-custom-table th,
.naac-custom-table tr.naac-table-header td,
.naac-custom-table tr.naac-table-header th {
  background-color: #0b2545 !important;
  color: #ffffff !important;
  font-weight: 700 !important;
  font-size: 0.88rem !important;
  text-transform: uppercase !important;
  letter-spacing: 0.5px !important;
  text-align: center !important;
  vertical-align: middle !important;
  padding: 15px 16px !important;
  border: 1px solid #134074 !important;
  border-right: 1px solid rgba(255, 255, 255, 0.15) !important;
}
.naac-custom-table th *,
.naac-custom-table tr.naac-table-header td *,
.naac-custom-table tr.naac-table-header th * {
  color: #ffffff !important;
  font-weight: 700 !important;
  background: transparent !important;
}

/* 100% Center Alignment for ALL Cells, Rows, Headers & Buttons */
.naac-custom-table th,
.naac-custom-table td,
.naac-custom-table tr td,
.naac-custom-table tr th {
  text-align: center !important;
  vertical-align: middle !important;
}
.naac-custom-table td * {
  text-align: center !important;
}
.naac-custom-table td {
  padding: 14px 18px !important;
  border: 1px solid #e2e8f0 !important;
  font-size: 0.925rem !important;
  color: #334155 !important;
  line-height: 1.5 !important;
  font-family: inherit !important;
}

/* Merged Faculty / School Name Columns Centering */
.naac-custom-table td[colspan],
.naac-custom-table td[rowspan] {
  font-weight: 600 !important;
  color: #0b2545 !important;
  text-align: center !important;
  vertical-align: middle !important;
  background-color: #ffffff !important;
}

/* Refined Row Hover Effects - Preserve Dark Text & Solid Dark Navy Button */
.naac-custom-table tbody tr:nth-child(even) td {
  background-color: #f8fafc !important;
}
.naac-custom-table tbody tr:hover td {
  background-color: #f1f5f9 !important;
  transition: background-color 0.15s ease-in-out !important;
}
.naac-custom-table tbody tr:hover td,
.naac-custom-table tbody tr:hover td span,
.naac-custom-table tbody tr:hover td div,
.naac-custom-table tbody tr:hover td p,
.naac-custom-table tbody tr:hover td strong {
  color: #0f172a !important;
  background-color: transparent !important;
}

/* Exact Button Styling (Dark Navy Pill + Golden Border + Yellow Icon) - Locked Against Row Hover Overrides */
.btn-naac-pdf,
.naac-custom-table tbody tr td .btn-naac-pdf,
.naac-custom-table tbody tr:hover td .btn-naac-pdf,
.naac-custom-table tbody tr:hover td a.btn-naac-pdf {
  background: linear-gradient(135deg, #0b2545 0%, #173866 100%) !important;
  color: #ffffff !important;
  border: 1.5px solid #d97706 !important;
  padding: 7px 18px !important;
  border-radius: 50px !important;
  font-weight: 700 !important;
  font-size: 0.85rem !important;
  text-decoration: none !important;
  display: inline-flex !important;
  align-items: center !important;
  justify-content: center !important;
  gap: 8px !important;
  transition: all 0.25s ease-in-out !important;
  box-shadow: 0 4px 12px rgba(11, 37, 69, 0.25) !important;
  white-space: nowrap !important;
}
.btn-naac-pdf i,
.naac-custom-table tbody tr td .btn-naac-pdf i,
.naac-custom-table tbody tr:hover td .btn-naac-pdf i,
.naac-custom-table tbody tr:hover td a.btn-naac-pdf i {
  color: #f59e0b !important;
  font-size: 0.9rem !important;
}

/* Direct Button Hover State */
.btn-naac-pdf:hover,
.naac-custom-table tbody tr td .btn-naac-pdf:hover,
.naac-custom-table tbody tr:hover td .btn-naac-pdf:hover,
.naac-custom-table tbody tr:hover td a.btn-naac-pdf:hover {
  background: linear-gradient(135deg, #173866 0%, #1e4b8a 100%) !important;
  border-color: #f59e0b !important;
  color: #ffffff !important;
  transform: translateY(-2px) !important;
  box-shadow: 0 6px 16px rgba(11, 37, 69, 0.35) !important;
}
.btn-naac-pdf:hover i,
.naac-custom-table tbody tr td .btn-naac-pdf:hover i,
.naac-custom-table tbody tr:hover td .btn-naac-pdf:hover i,
.naac-custom-table tbody tr:hover td a.btn-naac-pdf:hover i {
  color: #fbbf24 !important;
}
</style><section class="subpage-main-section naac-section py-4">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-9 col-md-8">
        <div class="naac-main-card">
          <div class="naac-header-banner">
            <h3 class="fw-bold mb-1">Criteria 1 – Curriculum Design &amp; Development</h3>
            <p class="mb-0 text-white-50">Sri Satya Sai University of Technology and Medical Sciences</p>
          </div>
          
          <div class="naac-card-body">
            <article class="fs-5 lh-lg text-secondary">
                        

<div class="table-responsive"><table class="table table-bordered  align-middle naac-custom-table">
<tbody>
<tr class="naac-table-header">
<th><strong>S.No.</strong></th>
<th><strong> Facilities</strong></th>
<th><strong> Session</strong></th>
<th colspan="2"><strong> Report</strong></th>
</tr>
<tr>
<td>1</td>
<td>Academic Council Meeting</td>
<td>2017-18 To 2021-22</td>
<td colspan="2"><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/AC FINAL.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>2</td>
<td>Board of Management Meetings</td>
<td>2017-18 To 2021-22</td>
<td colspan="2"><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/BOM FINAL.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>3</td>
<td>Board of Governance&nbsp;Meetings</td>
<td>2017-18 To 2021-22</td>
<td colspan="2"><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/BOG FINAL.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
</tbody>
</table></div>
<p><span style="color: #000000;"><strong>&nbsp;Minutes of Relevant Board of Studies</strong></span></p>
<div class="table-responsive"><table class="table table-bordered  align-middle naac-custom-table">
<tbody>
<tr class="naac-table-header">
<th colspan="2"><strong>School Name</strong></th>
<th><strong>Department </strong></th>
<th><strong>Program </strong></th>
<th colspan="2"><strong>Session (2017-18 To 2021-22) / Report</strong></th></tr>
<tr>
<td colspan="2" rowspan="21"><strong>School of Engineering</strong></td>
<td>Aeronautical Engineering</td>
<td>Bachelor of Engineering</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/AERONAUTICAL/AERO BOS Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>Chemical Engineering</td>
<td>Bachelor of Engineering</td>
<td>&nbsp;<a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/CHEMICAL/BOS Chemical-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>Civil Engineering</td>
<td>Bachelor of Engineering</td>
<td>&nbsp;<a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/CIVIL/BOS CIVIL-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>Structural Design</td>
<td>Master of Technology</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/CIVIL/BOS CIVIL-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td>Computer Science and Engineering</td>
<td>Bachelor of Engineering</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/CS/BOS -CS- Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>Computer Science and Engineering</td>
<td>Master of Technology</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/CS/BOS -CS- Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td></td>
<td>Master of Technology</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/CS/BOS -CS- Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td>Electrical and Electronics Engineering</td>
<td>Bachelor of Engineering</td>
<td>&nbsp; <a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/EX/BOS -EX(EEE)-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>Electrical Engineering</td>
<td>Bachelor of Engineering</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/EE/BOS -EE-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>Electrical Power System</td>
<td>Master of Technology</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/EE/BOS -EE-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td>Power Electronics</td>
<td>Master of Technology</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/EE/BOS -EE-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td>Electronic &amp; Communication Engineering</td>
<td>Bachelor of Engineering</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/EC/BOS-EC-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>Digital Communication</td>
<td>Master of Technology</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/EC/BOS-EC-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td></td>
<td>Master of Technology</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/EC/BOS-EC-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td>Electronics &amp; Instrumentation Engineering</td>
<td>Bachelor of Engineering</td>
<td>&nbsp; <a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/EI/BOS-EI-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>Information Technology</td>
<td>Bachelor of Engineering</td>
<td>&nbsp;<a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/IT/BOS-IT-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>Information Technology</td>
<td>Master of Technology</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/IT/BOS-IT-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td>Mechanical Engineering</td>
<td>Bachelor of Engineering</td>
<td>&nbsp; <a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/MECHANICAL/BOS Mechanical-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>Industrial Design</td>
<td>Master of Technology</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/MECHANICAL/BOS Mechanical-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td>Thermal Engineering</td>
<td>Master of Technology</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/MECHANICAL/BOS Mechanical-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td>Mining Engineering&nbsp;</td>
<td>Bachelor of Engineering</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/MINING/BOS Mining-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td colspan="2" rowspan="3"><strong>&nbsp;</strong>  Faculty of Pharmacy <strong>&nbsp;</strong> &nbsp;</td>
<td>Pharmacy</td>
<td>Bachelor of Pharmacy</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/PHARMACY/BOS-PHARMACY-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>Pharmacology</td>
<td>Master of Pharmacy</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/PHARMACY/BOS-PHARMACY-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td>Pharmaceutics</td>
<td>Master of Pharmacy</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/PHARMACY/BOS-PHARMACY-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td colspan="2" rowspan="2">School of Management Studies</td>
<td rowspan="2">Management</td>
<td>BBA</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/BBA-MBA/BOS-MANAGEMENT Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>MBA</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/BBA-MBA/BOS-MANAGEMENT Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td colspan="2">School of Law</td>
<td>Law</td>
<td>Law</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/LLB/BOS-LAW-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td colspan="2" rowspan="9"> Faculty of Education  </td>
<td rowspan="2">Arts &nbsp;</td>
<td>Bachelor of Arts</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/ARTS/ARTS- BOS Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>Master of Arts</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/ARTS/ARTS- BOS Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td rowspan="2">Science &nbsp;</td>
<td>Bachelor of Science</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/SCIENCE/SCIENCE- BOS Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>Master of Science</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/SCIENCE/SCIENCE- BOS Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td rowspan="2">Commerce &nbsp;</td>
<td>Bachelor of Commerce</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/COMMERCE/COMMERCE- BOS Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>Master of Commerce</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/COMMERCE/COMMERCE- BOS Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td rowspan="2">Education &nbsp;</td>
<td>B.A. Ed</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/BA-BeD/BOS-Bed Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>B.Ed</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/BA-BeD/BOS-Bed Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td>&nbsp;Physical Education</td>
<td>Bachelor of Physical Education</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/BPeD/bped bos final.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td colspan="2" rowspan="3"><strong>School of Computer Application</strong></td>
<td rowspan="3"><strong>Computer Application</strong></td>
<td>P.G.D.C.A</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/COMPUTER APPLICATION/BOS- ALL Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>B.C.A</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/COMPUTER APPLICATION/BOS- ALL Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td>M.C.A</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/COMPUTER APPLICATION/BOS- ALL Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td colspan="2"><strong>School of Hotel Management</strong></td>
<td><strong>Hotel Management & Catering</strong></td>
<td>Bachelor of HOTEL MANAGEMENT AND CATERING</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/HOTEL MANAGEMENT/BOS-HOTEL MANAGEMENT-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td colspan="2"><strong>School of Homeopathy</strong></td>
<td><strong>Homeopathy</strong></td>
<td>B.H.M.S</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/BHMS/BHMS-BOS Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td colspan="2"><strong>School of Agriculture</strong></td>
<td><strong>Agriculture</strong></td>
<td>Bachelor of Agriculture</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/AGRICULTURE/BOS AG Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td colspan="2"><strong>School of Ayurveda &amp; Siddha Studies</strong></td>
<td><strong>Ayurveda</strong></td>
<td>B.A.M.S</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/AYURVEDA/AYURVEDA -BOS Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td colspan="2" rowspan="2">School of Management Studies</td>
<td rowspan="2">Management</td>
<td>Bachelor of Nursing</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/NURSING/BSC NURSING (B0S)Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>P.B.Sc (Nursing)</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/NURSING/BSC NURSING (B0S)Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td colspan="2"><strong>School of Paramedical Sciences</strong></td>
<td><strong>Paramedical Sciences</strong></td>
<td>B.P.T</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/PARAMEDICAL/pera bos combine final.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td colspan="2"><strong>Faculty of Education</strong></td>
<td></td>
<td>Arts</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/PHD BOSAND SY/PHD/PHD ARTS/artphd combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td colspan="2"><strong>Faculty of Education</strong></td>
<td><strong>Ph .D. </strong></td>
<td>Science</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/PHD BOSAND SY/PHD/PHD-SCIENCE/phd science final.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td colspan="2"><strong>Faculty of Education</strong></td>
<td><strong>Ph .D. </strong></td>
<td>Commerce</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/PHD BOSAND SY/PHD/PHD-COMMERCE/phd commerce combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td colspan="2"><strong>School of Management Studies</strong> &nbsp;</td>
<td><strong>Ph .D. </strong></td>
<td>Mangement</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/PHD BOSAND SY/PHD/PHD-MANAGEMENT/mgt final merge.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td colspan="2"><strong>Faculty of Education</strong></td>
<td><strong>Ph .D. </strong></td>
<td>Physical Education</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/PHD BOSAND SY/PHD/PHD-PHYSICAL-EDU/physical education final.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td colspan="2"><strong>Faculty of Education</strong></td>
<td><strong>Ph .D. </strong></td>
<td>Education</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/PHD BOSAND SY/PHD/PHD BED/phd education combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td colspan="2">School of Engineering</td>
<td><strong>Ph .D. </strong></td>
<td>Engineering</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/PHD BOSAND SY/PHD/PHD-ENG/engg. combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td colspan="2"><strong>Faculty of Education</strong></td>
<td><strong>Ph .D. </strong></td>
<td>Library Science</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/PHD BOSAND SY/PHD/PHD-LIBRARY/library  com.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td colspan="2">&nbsp; Faculty of Pharmacy &nbsp;</td>
<td><strong>Ph .D. </strong></td>
<td>Pharmacy</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/PHD BOSAND SY/PHD/PHD-PHARMACY/pharmacy final merge.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
</tbody>
</table></div>


<div class="naac-metric-box">
  <div class="d-flex align-items-start gap-3">
    <span class="naac-metric-badge">Metric 1.1.1</span>
    <div class="naac-metric-content">
      Curriculum developed and implemented have relevance to the local, national, regional and global developmental needs which is reflected in Programme Outcomes (POs), Programme Specific Outcomes (PSOs) and Course Outcomes (COs) of the Programmes offered by the Institution.
    </div>
  </div>
</div>


<div class="table-responsive"><table class="table table-bordered  align-middle naac-custom-table">
<tbody>
<tr class="naac-table-header">
<th colspan="2"><strong>School Name</strong></th>
<th><strong>Department </strong></th>
<th><strong>Program </strong></th>
<th colspan="2"><strong>Session (2017-18 To 2021-22) / Report</strong></th></tr>
<tr>
<td colspan="2" rowspan="21"><strong>School of Engineering</strong></td>
<td>Aeronautical Engineering</td>
<td>Bachelor of Engineering</td>
<td rowspan="21"><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/COPO mapping/co-po-engineering-final.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>Chemical Engineering</td>
<td>Bachelor of Engineering</td>
</tr>
<tr>
<td>Civil Engineering</td>
<td>Bachelor of Engineering</td>
</tr>
<tr>
<td>Structural Design</td>
<td>Master of Technology</td>
</tr>
<tr>
<td>Computer Science and Engineering</td>
<td>Bachelor of Engineering</td>
</tr>
<tr>
<td>Computer Science and Engineering</td>
<td>Master of Technology</td>
</tr>
<tr>
<td></td>
<td>Master of Technology</td>
</tr>
<tr>
<td>Electrical and Electronics Engineering</td>
<td>Bachelor of Engineering</td>
</tr>
<tr>
<td>Electrical Engineering</td>
<td>Bachelor of Engineering</td>
</tr>
<tr>
<td>Electrical Power System</td>
<td>Master of Technology</td>
</tr>
<tr>
<td>Power Electronics</td>
<td>Master of Technology</td>
</tr>
<tr>
<td>Electronic &amp; Communication Engineering</td>
<td>Bachelor of Engineering</td>
</tr>
<tr>
<td>Digital Communication</td>
<td>Master of Technology</td>
</tr>
<tr>
<td></td>
<td>Master of Technology</td>
</tr>
<tr>
<td>Electronics &amp; Instrumentation Engineering</td>
<td>Bachelor of Engineering</td>
</tr>
<tr>
<td>Information Technology</td>
<td>Bachelor of Engineering</td>
</tr>
<tr>
<td>Information Technology</td>
<td>Master of Technology</td>
</tr>
<tr>
<td>Mechanical Engineering</td>
<td>Bachelor of Engineering</td>
</tr>
<tr>
<td>Industrial Design</td>
<td>Master of Technology</td>
</tr>
<tr>
<td>Thermal Engineering</td>
<td>Master of Technology</td>
</tr>
<tr>
<td>Mining Engineering&nbsp;</td>
<td>Bachelor of Engineering</td>
</tr>
<tr>
<td colspan="2" rowspan="3"><strong>&nbsp;</strong>  Faculty of Pharmacy <strong>&nbsp;</strong> &nbsp;</td>
<td>Pharmacy</td>
<td>Bachelor of Pharmacy</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/COPO mapping/co-po-pharmacy-final.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>Pharmacology</td>
<td>Master of Pharmacy</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/COPO mapping/co-po-pharmacy-final.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td>Pharmaceutics</td>
<td>Master of Pharmacy</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/COPO mapping/co-po-pharmacy-final.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td colspan="2" rowspan="2">School of Management Studies</td>
<td rowspan="2">Management</td>
<td>BBA</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/COPO mapping/co-po-managemant-final.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>MBA</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/COPO mapping/co-po-managemant-final.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td colspan="2">School of Law</td>
<td>Law</td>
<td>Law</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/COPO mapping/co-po-law-final.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td colspan="2" rowspan="9"> Faculty of Education  </td>
<td rowspan="2">Arts &nbsp;</td>
<td>Bachelor of Arts</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/COPO mapping/co-po atrs-final.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>Master of Arts</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/COPO mapping/co-po atrs-final.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td rowspan="2">Science &nbsp;</td>
<td>Bachelor of Science</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/COPO mapping/co-po-science final.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>Master of Science</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/COPO mapping/co-po-science final.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td rowspan="2">Commerce &nbsp;</td>
<td>Bachelor of Commerce</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/COPO mapping/co-po-commerce-final.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>Master of Commerce</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/COPO mapping/co-po-commerce-final.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td rowspan="2">Education &nbsp;</td>
<td>B.A. Ed</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/COPO mapping/co-po-bed final.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>B.Ed</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/COPO mapping/co-po-bed final.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td>&nbsp;Physical Education</td>
<td>Bachelor of Physical Education</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/COPO mapping/co-po-phy edu final.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td colspan="2" rowspan="3"><strong>School of Computer Application</strong></td>
<td rowspan="3"><strong>Computer Application</strong></td>
<td>P.G.D.C.A</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/COPO mapping/co-po-computer application-final.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>B.C.A</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/COPO mapping/co-po-computer application-final.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td>M.C.A</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/COPO mapping/co-po-computer application-final.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td colspan="2"><strong>School of Hotel Management</strong></td>
<td><strong>Hotel Management & Catering</strong></td>
<td>Bachelor of HOTEL MANAGEMENT AND CATERING</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/COPO mapping/co-po-bhmct-final.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td colspan="2"><strong>School of Homeopathy</strong></td>
<td><strong>Homeopathy</strong></td>
<td>B.H.M.S</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/COPO mapping/co-po-bhms-final.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td colspan="2"><strong>School of Agriculture</strong></td>
<td><strong>Agriculture</strong></td>
<td>Bachelor of Agriculture</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/COPO mapping/CO-PO-AGRICULTURE-FINAL.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td colspan="2"><strong>School of Ayurveda &amp; Siddha Studies</strong></td>
<td><strong>Ayurveda</strong></td>
<td>B.A.M.S</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/COPO mapping/CO-PO-AYURVEDA-FINAL.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td colspan="2" rowspan="2">School of Management Studies</td>
<td rowspan="2">Management</td>
<td>Bachelor of Nursing</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/COPO mapping/co-po-nursing final.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>P.B.Sc (Nursing)</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/COPO mapping/co-po-nursing final.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td colspan="2"><strong>School of Paramedical Sciences</strong></td>
<td><strong>Paramedical Sciences</strong></td>
<td>B.P.T</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/COPO mapping/co-po-paramadical-final.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
</tbody>
</table></div>

<div class="naac-metric-box">
  <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
    <div class="d-flex align-items-center gap-3">
      <span class="naac-metric-badge">Document</span>
      <div class="naac-metric-content fw-bold text-dark fs-5 mb-0">
        University Prospectus
      </div>
    </div>
    <div>
      <a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/prospectus  Final.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a>
    </div>
  </div>
</div>


<div class="naac-metric-box">
  <div class="d-flex align-items-start gap-3">
    <span class="naac-metric-badge">Metric 1.1.3</span>
    <div class="naac-metric-content">
      Percentage of Programmes where syllabus revision was carried out during the last five years. Response
    </div>
  </div>
</div>

<div class="table-responsive"><table class="table table-bordered  align-middle naac-custom-table">
<tbody style="box-sizing: border-box;">
<tr class="naac-table-header"><th colspan="2">School Name</th><th>Department</th><th>Program</th><th colspan="2">Session (2017-18 To 2021-22) / Report</th></tr>
<tr>
<td colspan="2" rowspan="21"><strong style="box-sizing: border-box; font-weight: bold;">School of Engineering</strong></td>
<td>Aeronautical Engineering</td>
<td>Bachelor of Engineering</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/syllabus/AERONAUTICAL/AREO SY- Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>Chemical Engineering</td>
<td>Bachelor of Engineering</td>
<td>&nbsp;<a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/syllabus/CHEMICAL/CHEMICAL SY Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>Civil Engineering</td>
<td>Bachelor of Engineering</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/syllabus/CIVIL/CIVIL SY Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>Structural Design</td>
<td>Master of Technology</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/syllabus/CIVIL/CIVIL SY Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td>Computer Science and Engineering</td>
<td>Bachelor of Engineering</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/syllabus/CS/CS SY-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>Computer Science and Engineering</td>
<td>Master of Technology</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/syllabus/CS/CS SY-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td></td>
<td>Master of Technology</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/syllabus/CS/CS SY-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td>Electrical and Electronics Engineering</td>
<td>Bachelor of Engineering</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/syllabus/EX/EX SY Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>Electrical Engineering</td>
<td>Bachelor of Engineering</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/syllabus/EE/EE SY Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>Electrical Power System</td>
<td>Master of Technology</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/syllabus/EE/EE SY Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td>Power Electronics</td>
<td>Master of Technology</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/syllabus/EE/EE SY Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td>Electronic &amp; Communication Engineering</td>
<td>Bachelor of Engineering</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/syllabus/EC/EC SY-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>Digital Communication</td>
<td>Master of Technology</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/syllabus/EC/EC SY-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td></td>
<td>Master of Technology</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/syllabus/EC/EC SY-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td>Electronics &amp; Instrumentation Engineering</td>
<td>Bachelor of Engineering</td>
<td> <a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/syllabus/EI/SY EI-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>Information Technology</td>
<td>Bachelor of Engineering</td>
<td>&nbsp;<a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/syllabus/IT/IT SY-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>Information Technology</td>
<td>Master of Technology</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/syllabus/IT/IT SY-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td>Mechanical Engineering</td>
<td>Bachelor of Engineering</td>
<td> <a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/syllabus/MECHANICAL/ME-SY-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>Industrial Design</td>
<td>Master of Technology</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/syllabus/MECHANICAL/ME-SY-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td>Thermal Engineering</td>
<td>Master of Technology</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/syllabus/MECHANICAL/ME-SY-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td>Mining Engineering&nbsp;</td>
<td>Bachelor of Engineering</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/syllabus/MINING/MINING SY-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td colspan="2" rowspan="3"><strong>&nbsp;</strong>  Faculty of Pharmacy <strong>&nbsp;</strong> &nbsp;</td>
<td>Pharmacy</td>
<td>Bachelor of Pharmacy</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/syllabus/PHARMACY/PHARMACY-SY Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>Pharmacology</td>
<td>Master of Pharmacy</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/syllabus/PHARMACY/PHARMACY-SY Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td>Pharmaceutics</td>
<td>Master of Pharmacy</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/syllabus/PHARMACY/PHARMACY-SY Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td colspan="2" rowspan="2">School of Management Studies</td>
<td rowspan="2">Management</td>
<td>BBA</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/syllabus/BBA-MBA/BBA MBA SY-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>MBA</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/syllabus/BBA-MBA/BBA MBA SY-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td colspan="2">School of Law</td>
<td>Law</td>
<td>Law</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/syllabus/LLB/LLB SY-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td colspan="2" rowspan="9"> Faculty of Education  </td>
<td rowspan="2">Arts &nbsp;</td>
<td>Bachelor of Arts</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/syllabus/ARTS/ARTS SY- Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>Master of Arts</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/syllabus/ARTS/ARTS SY- Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td rowspan="2">Science &nbsp;</td>
<td>Bachelor of Science</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/syllabus/SCIENCE/SCIENCE- SY Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>Master of Science</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/syllabus/SCIENCE/SCIENCE- SY Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td rowspan="2">Commerce &nbsp;</td>
<td>Bachelor of Commerce</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/syllabus/COMMERCE/COMMERCE- SY Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>Master of Commerce</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/syllabus/COMMERCE/COMMERCE- SY Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td rowspan="2">Education &nbsp;</td>
<td>B.A. Ed</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/syllabus/BA-BeD/BA BED SY-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>B.Ed</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/syllabus/BA-BeD/BA BED SY-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td>&nbsp;Physical Education</td>
<td>Bachelor of Physical Education</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/syllabus/BPeD/bped syllabus final.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td colspan="2" rowspan="3"><strong>School of Computer Application</strong></td>
<td rowspan="3"><strong>Computer Application</strong></td>
<td>P.G.D.C.A</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/syllabus/COMPUTER APPLICATION/SY Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>B.C.A</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/syllabus/COMPUTER APPLICATION/SY Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td>M.C.A</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/syllabus/COMPUTER APPLICATION/SY Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td colspan="2"><strong>School of Hotel Management</strong></td>
<td><strong>Hotel Management & Catering</strong></td>
<td>Bachelor of&nbsp;HOTEL MANAGEMENT AND CATERING</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/syllabus/HOTEL MANAGEMENT/SY-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td colspan="2"><strong>School of Homeopathy</strong></td>
<td><strong>Homeopathy</strong></td>
<td>B.H.M.S</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/syllabus/BHMS/BHMS SY Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td colspan="2"><strong>School of Agriculture</strong></td>
<td><strong>Agriculture</strong></td>
<td>Bachelor of Agriculture</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/syllabus/AGRICULTURE/SY-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td colspan="2"><strong style="box-sizing: border-box; font-weight: bold;">School of Ayurveda &amp; Siddha Studies</strong></td>
<td><strong style="box-sizing: border-box; font-weight: bold;">Ayurveda</strong></td>
<td>B.A.M.S</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/syllabus/AYURVEDA/Ayurveda SY Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td colspan="2" rowspan="2">School of Management Studies</td>
<td rowspan="2">Management</td>
<td>Bachelor of Nursing</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/syllabus/NURSING/NURSING-SY Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>P.B.Sc (Nursing)</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/syllabus/NURSING/NURSING-SY Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td colspan="2"><strong>School of Paramedical Sciences</strong></td>
<td><strong>Paramedical Sciences</strong></td>
<td>B.P.T</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/syllabus/PARAMEDICAL/para syllabus combine final.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td colspan="2"><strong>Faculty of Education</strong></td>
<td></td>
<td>Arts</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/PHD BOSAND SY/PHD/PHD ARTS/artphd combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td colspan="2"><strong>Faculty of Education</strong></td>
<td><strong style="box-sizing: border-box; font-weight: bold;">Ph .D.</strong></td>
<td>Science</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/PHD BOSAND SY/PHD/PHD-SCIENCE/phd science final.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td colspan="2"><strong>Faculty of Education</strong></td>
<td><strong style="box-sizing: border-box; font-weight: bold;">Ph .D.</strong></td>
<td>Commerce</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/PHD BOSAND SY/PHD/PHD-COMMERCE/phd commerce combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td colspan="2"><strong>School of Management Studies</strong> &nbsp;</td>
<td><strong style="box-sizing: border-box; font-weight: bold;">Ph .D.</strong></td>
<td>Mangement</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/PHD BOSAND SY/PHD/PHD-MANAGEMENT/mgt final merge.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td colspan="2"><strong>Faculty of Education</strong></td>
<td><strong style="box-sizing: border-box; font-weight: bold;">Ph .D.</strong></td>
<td>Physical Education</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/PHD BOSAND SY/PHD/PHD-PHYSICAL-EDU/physical education final.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td colspan="2"><strong>Faculty of Education</strong></td>
<td><strong style="box-sizing: border-box; font-weight: bold;">Ph .D.</strong></td>
<td>Education</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/PHD BOSAND SY/PHD/PHD BED/phd education combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td colspan="2">School of Engineering</td>
<td><strong style="box-sizing: border-box; font-weight: bold;">Ph .D.</strong></td>
<td>Engineering</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/PHD BOSAND SY/PHD/PHD-ENG/engg. combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td colspan="2"><strong>Faculty of Education</strong></td>
<td><strong style="box-sizing: border-box; font-weight: bold;">Ph .D.</strong></td>
<td>Library Science</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/PHD BOSAND SY/PHD/PHD-LIBRARY/library  com.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td colspan="2">&nbsp; Faculty of Pharmacy &nbsp;</td>
<td><strong style="box-sizing: border-box; font-weight: bold;">Ph .D.</strong></td>
<td>Pharmacy</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/BOS/PHD BOSAND SY/PHD/PHD-PHARMACY/pharmacy final merge.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
</tbody>
</table></div>



<div class="naac-metric-box">
  <div class="d-flex align-items-start gap-3">
    <span class="naac-metric-badge">Metric 1.1.3</span>
    <div class="naac-metric-content">
      Average percentage of courses having focus on employability/ entrepreneurship/ skill development offered by the institution during the last five years
    </div>
  </div>
</div>


<div class="table-responsive"><table class="table table-bordered  align-middle naac-custom-table">
<tbody style="box-sizing: border-box;">
<tr class="naac-table-header"><th colspan="2">School Name</th><th>Department</th><th>Program</th><th colspan="2">Session (2017-18 To 2021-22) / Report</th></tr>
<tr>
<td colspan="2" rowspan="21"><strong style="box-sizing: border-box; font-weight: bold;">School of Engineering</strong></td>
<td>Aeronautical Engineering</td>
<td>Bachelor of Engineering</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/AERONAUTICAL/AREO SY- Combine FINAL.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>Chemical Engineering</td>
<td>Bachelor of Engineering</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/CHEMICAL/CHEMICAL SY Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>Civil Engineering</td>
<td>Bachelor of Engineering</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/CIVIL/CIVIL SY Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>Structural Design</td>
<td>Master of Technology</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/CIVIL/CIVIL SY Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td>Computer Science and Engineering</td>
<td>Bachelor of Engineering</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/CS/cse syllabus updated file.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>Computer Science and Engineering</td>
<td>Master of Technology</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/CS/cse syllabus updated file.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td></td>
<td>Master of Technology</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/CS/cse syllabus updated file.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td>Electrical and Electronics Engineering</td>
<td>Bachelor of Engineering</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/EX/EX SY Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>Electrical Engineering</td>
<td>Bachelor of Engineering</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/EE/EE SY Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>Electrical Power System</td>
<td>Master of Technology</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/EE/EE SY Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td>Power Electronics</td>
<td>Master of Technology</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/EE/EE SY Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td>Electronic &amp; Communication Engineering</td>
<td>Bachelor of Engineering</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/EC/EC SY-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>Digital Communication</td>
<td>Master of Technology</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/EC/EC SY-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td></td>
<td>Master of Technology</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/EC/EC SY-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td>Electronics &amp; Instrumentation Engineering</td>
<td>Bachelor of Engineering</td>
<td> <a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/EI/SY EI-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>Information Technology</td>
<td>Bachelor of Engineering</td>
<td>&nbsp;<a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/syllabus/IT/IT SY-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>Information Technology</td>
<td>Master of Technology</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/syllabus/IT/IT SY-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td>Mechanical Engineering</td>
<td>Bachelor of Engineering</td>
<td> <a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/MECHANICAL/FINAL MECHANICAL -color-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>Industrial Design</td>
<td>Master of Technology</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/MECHANICAL/FINAL MECHANICAL -color-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td>Thermal Engineering</td>
<td>Master of Technology</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/MECHANICAL/FINAL MECHANICAL -color-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td>Mining Engineering&nbsp;</td>
<td>Bachelor of Engineering</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/MINING/MINING SY-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td colspan="2" rowspan="3"><strong>&nbsp;</strong>  Faculty of Pharmacy <strong>&nbsp;</strong> &nbsp;</td>
<td>Pharmacy</td>
<td>Bachelor of Pharmacy</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/PHARMACY/PHARMACY-SY Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>Pharmacology</td>
<td>Master of Pharmacy</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/PHARMACY/PHARMACY-SY Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td>Pharmaceutics</td>
<td>Master of Pharmacy</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/PHARMACY/PHARMACY-SY Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td colspan="2" rowspan="2">School of Management Studies</td>
<td rowspan="2">Management</td>
<td>BBA</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/BBA-MBA/BBA MBA SY-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>MBA</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/BBA-MBA/BBA MBA SY-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td colspan="2">School of Law</td>
<td>Law</td>
<td>Law</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/LLB/LLB SY-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td colspan="2" rowspan="9"> Faculty of Education  </td>
<td rowspan="2">Arts &nbsp;</td>
<td>Bachelor of Arts</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/ARTS/ARTS SY- Combine (1) - Copy.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>Master of Arts</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/ARTS/ARTS SY- Combine (1) - Copy.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td rowspan="2">Science &nbsp;</td>
<td>Bachelor of Science</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/SCIENCE/SCIENCE NEW- SY Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>Master of Science</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/SCIENCE/SCIENCE NEW- SY Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td rowspan="2">Commerce &nbsp;</td>
<td>Bachelor of Commerce</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/COMMERCE/edited pdf commerce.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>Master of Commerce</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/COMMERCE/edited pdf commerce.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td rowspan="2">Education &nbsp;</td>
<td>B.A. Ed</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/BA-BeD/BA BED SY-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>B.Ed</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/BA-BeD/BA BED SY-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td>&nbsp;Physical Education</td>
<td>Bachelor of Physical Education</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/BPeD/bped syllabus final (2).pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td colspan="2" rowspan="3"><strong>School of Computer Application</strong></td>
<td rowspan="3"><strong>Computer Application</strong></td>
<td>P.G.D.C.A</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/COMPUTER APPLICATION/mca Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>B.C.A</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/COMPUTER APPLICATION/mca Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td>M.C.A</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/COMPUTER APPLICATION/mca Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td colspan="2"><strong>School of Hotel Management</strong></td>
<td><strong>Hotel Management & Catering</strong></td>
<td>Bachelor of&nbsp;HOTEL MANAGEMENT AND CATERING</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/HOTEL MANAGEMENT/SY-Combine final f1.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td colspan="2"><strong>School of Homeopathy</strong></td>
<td><strong>Homeopathy</strong></td>
<td>B.H.M.S</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/syllabus/BHMS/BHMS SY Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td colspan="2"><strong>School of Agriculture</strong></td>
<td><strong>Agriculture</strong></td>
<td>Bachelor of Agriculture</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/syllabus/AGRICULTURE/SY-Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td colspan="2"><strong style="box-sizing: border-box; font-weight: bold;">School of Ayurveda &amp; Siddha Studies</strong></td>
<td><strong style="box-sizing: border-box; font-weight: bold;">Ayurveda</strong></td>
<td>B.A.M.S</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/AYURVEDA/Ayurveda SY Combine.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td colspan="2" rowspan="2">School of Management Studies</td>
<td rowspan="2">Management</td>
<td>Bachelor of Nursing</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/NURSING/NURSING-SY Combine CORRECT.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
<tr>
<td>P.B.Sc (Nursing)</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/NURSING/NURSING-SY Combine CORRECT.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td></tr>
<tr>
<td colspan="2"><strong>School of Paramedical Sciences</strong></td>
<td><strong>Paramedical Sciences</strong></td>
<td>B.P.T</td>
<td><a class="btn btn-sm btn-naac-pdf" href="<?php echo BASE_URL; ?>assets/images/Files/Link/IQAC/NAAC/Criteria 1/PARAMEDICAL/para syllabus combine final - Copy.pdf" target="_blank" rel="noopener"><i class="fa-solid fa-file-pdf me-1"></i> View PDF</a></td>
</tr>
</tbody>
</table></div>


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
      Structured feedback for design and review of syllabus – semester-wise / year-wise is received from: 1) Students, 2) Teachers, 3) Employers, 4) Alumni, 5) Professional
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
</article>
</div>
</div>
</div>
      
      <!-- Sidebar (Right) -->
      <div class="col-lg-3 col-md-4">
        <?php require_once __DIR__ . '/../../includes/sidebar.php'; ?>
      </div>
      
    </div>
  </div>
</section><?php require_once __DIR__ . '/../../includes/footer.php'; ?>
